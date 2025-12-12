# MCP Environment Variables Setup

The `.cursor/mcp.json` file now uses environment variables instead of hardcoded API keys for security.

## Setup Options

### Option 1: Use .env file (Recommended)

1. Copy `.env.example` to `.env` in the project root:
   ```powershell
   Copy-Item .env.example .env
   ```

2. Edit `.env` and add your actual API keys:
   ```
   ANTHROPIC_API_KEY="sk-ant-api03-..."
   PERPLEXITY_API_KEY="pplx-..."
   OPENAI_API_KEY="sk-proj-..."
   GOOGLE_API_KEY="AIzaSy..."
   CONTEXT7_API_KEY="your_context7_key"
   GITHUB_TOKEN="ghp_..." or "github_pat_..."
   ```

3. Run the setup script to populate `mcp.json`:
   ```powershell
   .\.cursor\setup-mcp-env.ps1
   ```

### Option 2: System Environment Variables

Set the following environment variables in your system:

- `ANTHROPIC_API_KEY`
- `PERPLEXITY_API_KEY`
- `OPENAI_API_KEY`
- `GOOGLE_API_KEY`
- `MISTRAL_API_KEY`
- `GROQ_API_KEY`
- `OPENROUTER_API_KEY`
- `XAI_API_KEY`
- `AZURE_OPENAI_API_KEY`
- `OLLAMA_API_KEY`
- `CONTEXT7_API_KEY`
- `GITHUB_TOKEN` or `GITHUB_PERSONAL_ACCESS_TOKEN`

Then run the setup script:
```powershell
.\.cursor\setup-mcp-env.ps1
```

### Option 3: Manual Edit (Not Recommended)

You can manually edit `.cursor/mcp.json` and add your API keys directly, but this file should remain in `.gitignore` to prevent committing secrets.

## Security Notes

- **Never commit `.env` or `.cursor/mcp.json` with real API keys**
- The `.env` file is already in `.gitignore`
- The `mcp.json` file is ignored via `*.json` pattern in `.gitignore`
- Use `.cursor/mcp.json.example` as a template for the structure

## Required API Keys

Based on your MCP server configuration:

- **ANTHROPIC_API_KEY**: Required for task-master-ai (Claude models)
- **PERPLEXITY_API_KEY**: Optional, for research features
- **OPENAI_API_KEY**: Optional, for OpenAI models
- **GOOGLE_API_KEY**: Optional, for Google Gemini models
- **CONTEXT7_API_KEY**: Optional, for Context7 MCP server
- **GITHUB_TOKEN**: Optional, for GitHub MCP server

See `.env.example` for all available API key options and formats.
