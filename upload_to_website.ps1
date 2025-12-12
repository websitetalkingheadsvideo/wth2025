# PowerShell script to upload project files to website via FTP
# Usage: .\upload_to_website.ps1

param(
    [switch]$DryRun = $false,
    [int]$Limit = 0,  # Limit number of files to upload (0 = all)
    [string[]]$IncludePaths = @(),
    [string[]]$ExcludePaths = @()
)

# Log file path (in .cursor which is excluded)
$logDir = ".cursor\logs"
if (-not (Test-Path $logDir)) {
    New-Item -ItemType Directory -Path $logDir -Force | Out-Null
}
$logFile = Join-Path $logDir "upload_log_$(Get-Date -Format 'yyyyMMdd_HHmmss').txt"

# Default exclusions - files that shouldn't be uploaded to production
$defaultExcludes = @(
    '.cursor/**',
    '.git/**',
    '.taskmaster/**',
    'sync_config.jsonc',
    '.env*',
    '*.log',
    'upload_log*.txt',
    'upload_to_website.ps1',
    'plan/**',
    'docs/**',
    '.gitignore',
    '.gitattributes',
    '.cursorrules',
    'console-error-audit-tier1-4.md',
    'UNUSED_CSS_JS_REPORT.md'
)

# Read sync configuration
$configPath = "sync_config.jsonc"
if (-not (Test-Path $configPath)) {
    Write-Host "Error: sync_config.jsonc not found!" -ForegroundColor Red
    exit 1
}

# Parse JSONC (remove comments)
$configContent = Get-Content $configPath -Raw
# Remove single-line comments (// ...)
$configContent = $configContent -replace '(?m)//.*$', ''
# Remove multi-line comments (/* ... */)
$configContent = $configContent -replace '(?s)/\*.*?\*/', ''
# Remove trailing commas before closing braces/brackets
$configContent = $configContent -replace ',\s*}', '}' -replace ',\s*]', ']'
$config = $configContent | ConvertFrom-Json

$ftpConfig = $config.wth
if (-not $ftpConfig) {
    Write-Host "Error: 'wth' configuration not found in sync_config.jsonc!" -ForegroundColor Red
    exit 1
}

$ftpHost = $ftpConfig.host
$ftpPort = $ftpConfig.port
$ftpUser = $ftpConfig.username
$ftpPass = $ftpConfig.password
$remotePath = $ftpConfig.remotePath

Write-Host "FTP Upload Configuration:" -ForegroundColor Cyan
Write-Host "  Host: $ftpHost`:$ftpPort" -ForegroundColor Gray
Write-Host "  User: $ftpUser" -ForegroundColor Gray
Write-Host "  Remote Path: $remotePath" -ForegroundColor Gray
Write-Host "  Dry Run: $DryRun" -ForegroundColor Gray
Write-Host ""

# Function to upload a file via FTP
function Upload-File {
    param(
        [string]$LocalPath,
        [string]$RemotePath
    )
    
    try {
        $uri = "ftp://${ftpHost}:${ftpPort}${RemotePath}"
        $ftpRequest = [System.Net.FtpWebRequest]::Create($uri)
        $ftpRequest.Credentials = New-Object System.Net.NetworkCredential($ftpUser, $ftpPass)
        $ftpRequest.Method = [System.Net.WebRequestMethods+Ftp]::UploadFile
        $ftpRequest.UseBinary = $true
        $ftpRequest.UsePassive = $false  # Try active mode
        
        $fileContent = [System.IO.File]::ReadAllBytes($LocalPath)
        $ftpRequest.ContentLength = $fileContent.Length
        
        if ($DryRun) {
            Write-Host "    [DRY RUN] Would upload: $LocalPath" -ForegroundColor Yellow
            return $true
        }
        
        $requestStream = $ftpRequest.GetRequestStream()
        $requestStream.Write($fileContent, 0, $fileContent.Length)
        $requestStream.Close()
        
        $response = $ftpRequest.GetResponse()
        $response.Close()
        Write-Host "    [OK]" -ForegroundColor Green
        return $true
    }
    catch {
        Write-Host "  [FAIL] Failed: $LocalPath" -ForegroundColor Red
        Write-Host "    Error: $_" -ForegroundColor Red
        return $false
    }
}

# Function to ensure remote directory exists
function Ensure-RemoteDirectory {
    param(
        [string]$RemoteDir
    )
    
    try {
        $uri = "ftp://${ftpHost}:${ftpPort}${RemoteDir}"
        $ftpRequest = [System.Net.FtpWebRequest]::Create($uri)
        $ftpRequest.Credentials = New-Object System.Net.NetworkCredential($ftpUser, $ftpPass)
        $ftpRequest.Method = [System.Net.WebRequestMethods+Ftp]::MakeDirectory
        $ftpRequest.UsePassive = $true
        
        if ($DryRun) {
            Write-Host "  [DRY RUN] Would create directory: $RemoteDir" -ForegroundColor Yellow
            return $true
        }
        
        $response = $ftpRequest.GetResponse()
        $response.Close()
        return $true
    }
    catch {
        # Directory might already exist, which is fine
        return $true
    }
}

# Get list of files to upload (from git)
Write-Host "Getting list of tracked files from git..." -ForegroundColor Cyan
$gitFiles = @()
$gitOutput = & git ls-files 2>&1
if ($LASTEXITCODE -ne 0) {
    Write-Host "Error: git ls-files failed!" -ForegroundColor Red
    exit 1
}

# Convert output to array and filter excluded files IMMEDIATELY
Write-Host "Filtering excluded files..." -ForegroundColor Cyan
$allFiles = @()
foreach ($line in $gitOutput) {
    $line = $line.ToString().Trim()
    if ($line -ne '') {
        $allFiles += $line
    }
}

# Filter out excluded files BEFORE processing
$gitFiles = @()
foreach ($file in $allFiles) {
    $file = $file.Trim()
    $shouldExclude = $false
    
    # Check default exclusions
    foreach ($exclude in $defaultExcludes) {
        if ($file -like $exclude) {
            $shouldExclude = $true
            break
        }
    }
    
    # Check user-specified exclusions
    if (-not $shouldExclude -and $ExcludePaths.Count -gt 0) {
        foreach ($exclude in $ExcludePaths) {
            if ($file -like $exclude) {
                $shouldExclude = $true
                break
            }
        }
    }
    
    # Check include filters (if specified)
    if (-not $shouldExclude -and $IncludePaths.Count -gt 0) {
        $matched = $false
        foreach ($include in $IncludePaths) {
            if ($file -like $include) {
                $matched = $true
                break
            }
        }
        if (-not $matched) {
            $shouldExclude = $true
        }
    }
    
    # Only add files that should be uploaded
    if (-not $shouldExclude) {
        $gitFiles += $file
    }
}

# Remove duplicates and sort
$gitFiles = $gitFiles | Select-Object -Unique | Sort-Object

if ($gitFiles.Count -eq 0) {
    Write-Host "Error: No files to upload after filtering!" -ForegroundColor Red
    exit 1
}

Write-Host "Found $($gitFiles.Count) files to upload (excluded $($allFiles.Count - $gitFiles.Count) files)" -ForegroundColor Cyan
Write-Host ""

$uploadCount = 0
$successCount = 0
$failCount = 0

# Process each file (already filtered, no need to check exclusions again)
foreach ($file in $gitFiles) {
    $file = $file.Trim()
    
    # Skip if file doesn't exist locally
    if (-not (Test-Path $file)) {
        Write-Host "  [SKIP] File not found: $file" -ForegroundColor Gray
        continue
    }
    
    # Convert local path to remote path
    $remoteFile = $remotePath + "/" + $file.Replace('\', '/')
    $remoteDir = Split-Path -Parent $remoteFile
    
    # Ensure remote directory exists
    Ensure-RemoteDirectory -RemoteDir $remoteDir
    
    # Check limit
    if ($Limit -gt 0 -and $uploadCount -ge $Limit) {
        Write-Host "Reached upload limit of $Limit files. Stopping." -ForegroundColor Yellow
        break
    }
    
    # Upload file
    $uploadCount++
    $totalFiles = $gitFiles.Count
    $progress = [math]::Round(($uploadCount / $totalFiles) * 100, 1)
    Write-Host "[$uploadCount/$totalFiles - $progress%] $file" -ForegroundColor Cyan
    
    try {
        $result = Upload-File -LocalPath $file -RemotePath $remoteFile
        if ($result) {
            $successCount++
        } else {
            $failCount++
        }
    }
    catch {
        Write-Host "  [ERROR] Exception: $_" -ForegroundColor Red
        $failCount++
    }
    
    # Small delay to prevent overwhelming the server
    if (-not $DryRun -and $uploadCount % 10 -eq 0) {
        Start-Sleep -Milliseconds 100
    }
}

Write-Host ""
Write-Host ""
Write-Host "Upload Summary:" -ForegroundColor Cyan
Write-Host "  Total processed: $uploadCount" -ForegroundColor Gray
Write-Host "  Successful: $successCount" -ForegroundColor Green
Write-Host "  Failed: $failCount" -ForegroundColor $(if ($failCount -gt 0) { "Red" } else { "Gray" })

if ($DryRun) {
    Write-Host ""
    Write-Host "This was a DRY RUN. No files were actually uploaded." -ForegroundColor Yellow
    Write-Host "Run without -DryRun to perform actual upload." -ForegroundColor Yellow
} else {
    Write-Host ""
    Write-Host "Log file saved to: $logFile" -ForegroundColor Gray
}

