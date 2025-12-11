#!/bin/bash
# Download missing PHP files from websitetalkingheads.com
# Usage: ./download_script.sh

BASE_URL="https://www.websitetalkingheads.com"
OUTPUT_DIR="./downloaded_files"

# Create output directory
mkdir -p "$OUTPUT_DIR"

# Function to download and preserve directory structure
download_file() {
    local url=$1
    local relative_path=$(echo "$url" | sed "s|$BASE_URL/||")
    local local_path="$OUTPUT_DIR/$relative_path"
    local dir=$(dirname "$local_path")
    
    # Create directory structure
    mkdir -p "$dir"
    
    # Download file
    echo "Downloading: $url"
    wget -q -O "$local_path" "$url" || curl -s -o "$local_path" "$url"
    
    if [ -f "$local_path" ]; then
        echo "  ✓ Saved to: $local_path"
    else
        echo "  ✗ Failed to download: $url"
    fi
}

# Read URLs from download_missing_files.txt and download each
while IFS= read -r line; do
    # Skip comments and empty lines
    [[ "$line" =~ ^#.*$ ]] && continue
    [[ -z "$line" ]] && continue
    
    # If line ends with /, it's a directory - try index.php
    if [[ "$line" == */ ]]; then
        download_file "${line}index.php"
    else
        download_file "$line"
    fi
done < "plan/links/download_missing_files.txt"

echo ""
echo "Download complete! Files saved to: $OUTPUT_DIR"

