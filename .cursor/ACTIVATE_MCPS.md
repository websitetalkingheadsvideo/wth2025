# Activating MCP Servers in Cursor

Your MCP configuration is in `.cursor/mcp.json` with the following servers:

## Configured MCP Servers

1. **task-master-ai** - Task management and project planning
2. **context7** - Upstash Context7 for enhanced context
3. **github** - GitHub Copilot integration

## Activation Steps

1. **Restart Cursor IDE**
   - Close and reopen Cursor to load the MCP configuration

2. **Check MCP Status**
   - Open Cursor Settings (Ctrl+, or Cmd+,)
   - Navigate to "Features" > "Model Context Protocol"
   - Verify the servers are listed and active

3. **Verify Environment Variables**
   The following API keys are referenced (set as environment variables):
   - `ANTHROPIC_API_KEY`
   - `PERPLEXITY_API_KEY`
   - `OPENAI_API_KEY`
   - `GOOGLE_API_KEY`
   - `XAI_API_KEY`
   - `OPENROUTER_API_KEY`
   - `MISTRAL_API_KEY`
   - `AZURE_OPENAI_API_KEY`
   - `OLLAMA_API_KEY`
   - `CONTEXT7_API_KEY`

4. **Test MCP Resources**
   - After restart, you should see MCP resources available
   - Try asking me to list available resources or use task-master commands

## Troubleshooting

- If MCPs don't appear, check Cursor's output panel for MCP-related errors
- Ensure all required environment variables are set
- Verify npx is available in your PATH


