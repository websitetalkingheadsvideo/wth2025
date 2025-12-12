# Clear API keys from mcp.json (set to empty strings)
$mcpJsonPath = Join-Path $PSScriptRoot "mcp.json"

$json = Get-Content $mcpJsonPath -Raw | ConvertFrom-Json

# Clear all API keys
$json.mcpServers.'task-master-ai'.env.ANTHROPIC_API_KEY = ''
$json.mcpServers.'task-master-ai'.env.PERPLEXITY_API_KEY = ''
$json.mcpServers.'task-master-ai'.env.OPENAI_API_KEY = ''
$json.mcpServers.'task-master-ai'.env.GOOGLE_API_KEY = ''
$json.mcpServers.'task-master-ai'.env.MISTRAL_API_KEY = ''
$json.mcpServers.'task-master-ai'.env.GROQ_API_KEY = ''
$json.mcpServers.'task-master-ai'.env.OPENROUTER_API_KEY = ''
$json.mcpServers.'task-master-ai'.env.XAI_API_KEY = ''
$json.mcpServers.'task-master-ai'.env.AZURE_OPENAI_API_KEY = ''
$json.mcpServers.'task-master-ai'.env.OLLAMA_API_KEY = ''

if ($json.mcpServers.context7.headers) {
    $json.mcpServers.context7.headers.CONTEXT7_API_KEY = ''
}

if ($json.mcpServers.github.headers) {
    $json.mcpServers.github.headers.Authorization = ''
}

# Save with proper formatting
$json | ConvertTo-Json -Depth 10 | Set-Content $mcpJsonPath -Encoding UTF8

Write-Host "Cleared API keys from mcp.json" -ForegroundColor Green
Write-Host "Run .cursor\setup-mcp-env.ps1 to populate from .env file" -ForegroundColor Yellow
