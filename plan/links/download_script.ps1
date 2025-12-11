# PowerShell script to download missing PHP files
# Usage: .\download_script.ps1

$baseUrl = "https://www.websitetalkingheads.com"
$outputDir = ".\downloaded_files"
$urlList = "plan\links\download_missing_files.txt"

# Create output directory
New-Item -ItemType Directory -Force -Path $outputDir | Out-Null

function Download-File {
    param(
        [string]$Url,
        [string]$OutputPath
    )
    
    $dir = Split-Path -Parent $OutputPath
    New-Item -ItemType Directory -Force -Path $dir | Out-Null
    
    try {
        Write-Host "Downloading: $Url" -ForegroundColor Cyan
        Invoke-WebRequest -Uri $Url -OutFile $OutputPath -UseBasicParsing -ErrorAction Stop
        Write-Host "  ✓ Saved to: $OutputPath" -ForegroundColor Green
    }
    catch {
        Write-Host "  ✗ Failed to download: $Url" -ForegroundColor Red
        Write-Host "    Error: $_" -ForegroundColor Red
    }
}

# Read URLs from file and download each
Get-Content $urlList | ForEach-Object {
    $line = $_.Trim()
    
    # Skip comments and empty lines
    if ($line -match '^#' -or [string]::IsNullOrWhiteSpace($line)) {
        return
    }
    
    # If line ends with /, it's a directory - try index.php
    if ($line.EndsWith('/')) {
        $url = "$line" + "index.php"
    }
    else {
        $url = $line
    }
    
    # Convert URL to local path
    $relativePath = $url.Replace($baseUrl + '/', '')
    $localPath = Join-Path $outputDir $relativePath
    
    Download-File -Url $url -OutputPath $localPath
}

Write-Host ""
Write-Host "Download complete! Files saved to: $outputDir" -ForegroundColor Green

