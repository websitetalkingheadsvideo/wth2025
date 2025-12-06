# MCP Server Setup

To configure MCP servers in Cursor, you'll need to add them to your Cursor settings.

## Recommended MCP Servers

1. **Filesystem Server** - File system operations
   ```json
   {
     "command": "npx",
     "args": ["-y", "@modelcontextprotocol/server-filesystem", "."]
   }
   ```

2. **Git Server** - Git operations
   ```json
   {
     "command": "npx",
     "args": ["-y", "@modelcontextprotocol/server-git", "--repository", "."]
   }
   ```

3. **Brave Search** - Web search (requires API key)
   ```json
   {
     "command": "npx",
     "args": ["-y", "@modelcontextprotocol/server-brave-search"],
     "env": {
       "BRAVE_API_KEY": "your-key-here"
     }
   }
   ```

4. **Puppeteer** - Browser automation
   ```json
   {
     "command": "npx",
     "args": ["-y", "@modelcontextprotocol/server-puppeteer"]
   }
   ```

5. **GitHub** - GitHub integration (requires token)
   ```json
   {
     "command": "npx",
     "args": ["-y", "@modelcontextprotocol/server-github"],
     "env": {
       "GITHUB_PERSONAL_ACCESS_TOKEN": "your-token-here"
     }
   }
   ```

## Setup Instructions

Add these to your Cursor MCP configuration (usually in Settings > Features > Model Context Protocol).

