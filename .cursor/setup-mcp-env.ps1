# PowerShell script to populate mcp.json from environment variables
# Run this script to update .cursor/mcp.json with values from your .env file or system environment

$mcpJsonPath = Join-Path $PSScriptRoot "mcp.json"
$envFile = Join-Path (Split-Path $PSScriptRoot -Parent) ".env"

# Load .env file if it exists
if (Test-Path $envFile) {
    Get-Content $envFile | ForEach-Object {
        if ($_ -match '^\s*([^#=]+)=(.*)$') {
            $key = $matches[1].Trim()
            $value = $matches[2].Trim().Trim('"').Trim("'")
            [Environment]::SetEnvironmentVariable($key, $value, "Process")
        }
    }
}

# Read current mcp.json
$mcpConfig = Get-Content $mcpJsonPath -Raw | ConvertFrom-Json

# Function to get env var, only replace if set
function Get-EnvVar {
    param([string]$VarName)
    $value = [Environment]::GetEnvironmentVariable($VarName, "Process")
    if ([string]::IsNullOrEmpty($value)) {
        return "`${$VarName}"
    }
    return $value
}

# Update environment variables from system/env file
if ($mcpConfig.mcpServers."task-master-ai".env) {
    $mcpConfig.mcpServers."task-master-ai".env.ANTHROPIC_API_KEY = Get-EnvVar "ANTHROPIC_API_KEY"
    $mcpConfig.mcpServers."task-master-ai".env.PERPLEXITY_API_KEY = Get-EnvVar "PERPLEXITY_API_KEY"
    $mcpConfig.mcpServers."task-master-ai".env.OPENAI_API_KEY = Get-EnvVar "OPENAI_API_KEY"
    $mcpConfig.mcpServers."task-master-ai".env.GOOGLE_API_KEY = Get-EnvVar "GOOGLE_API_KEY"
    $mcpConfig.mcpServers."task-master-ai".env.MISTRAL_API_KEY = Get-EnvVar "MISTRAL_API_KEY"
    $mcpConfig.mcpServers."task-master-ai".env.GROQ_API_KEY = Get-EnvVar "GROQ_API_KEY"
    $mcpConfig.mcpServers."task-master-ai".env.OPENROUTER_API_KEY = Get-EnvVar "OPENROUTER_API_KEY"
    $mcpConfig.mcpServers."task-master-ai".env.XAI_API_KEY = Get-EnvVar "XAI_API_KEY"
    $mcpConfig.mcpServers."task-master-ai".env.AZURE_OPENAI_API_KEY = Get-EnvVar "AZURE_OPENAI_API_KEY"
    $mcpConfig.mcpServers."task-master-ai".env.OLLAMA_API_KEY = Get-EnvVar "OLLAMA_API_KEY"
}

if ($mcpConfig.mcpServers."context7".headers) {
    $mcpConfig.mcpServers."context7".headers.CONTEXT7_API_KEY = Get-EnvVar "CONTEXT7_API_KEY"
}

if ($mcpConfig.mcpServers."github".headers) {
    $githubToken = [Environment]::GetEnvironmentVariable("GITHUB_TOKEN", "Process")
    if ([string]::IsNullOrEmpty($githubToken)) {
        $githubToken = [Environment]::GetEnvironmentVariable("GITHUB_PERSONAL_ACCESS_TOKEN", "Process")
    }
    if ([string]::IsNullOrEmpty($githubToken)) {
        $mcpConfig.mcpServers."github".headers.Authorization = "`${GITHUB_TOKEN}"
    } else {
        $mcpConfig.mcpServers."github".headers.Authorization = "Bearer $githubToken"
    }
}

# Save updated mcp.json
$mcpConfig | ConvertTo-Json -Depth 10 | Set-Content $mcpJsonPath -Encoding UTF8

Write-Host "Updated mcp.json with environment variables from .env file or system environment" -ForegroundColor Green
