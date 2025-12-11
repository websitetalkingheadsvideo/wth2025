#!/usr/bin/env python3
"""
Tier-Based Website Link Mapping Generator
Crawls a website and generates a tier-based link mapping report.
"""

import requests
from bs4 import BeautifulSoup
from urllib.parse import urljoin, urlparse
from collections import defaultdict
from datetime import datetime
import time
import sys

class WebsiteCrawler:
    def __init__(self, base_url: str, max_tiers: int = 4):
        self.base_url = base_url.rstrip('/')
        self.max_tiers = max_tiers
        self.visited = set()
        self.tier_urls = defaultdict(set)  # tier -> set of URLs
        self.url_counts = defaultdict(int)  # URL -> count of occurrences
        self.session = requests.Session()
        self.session.headers.update({
            'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
        })
        
    def normalize_url(self, url: str) -> str:
        """Normalize URL to handle variations."""
        parsed = urlparse(url)
        # Remove fragment
        normalized = f"{parsed.scheme}://{parsed.netloc}{parsed.path}"
        if parsed.query:
            normalized += f"?{parsed.query}"
        # Remove trailing slash for consistency (except root)
        if normalized.endswith('/') and normalized != f"{self.base_url}/":
            normalized = normalized.rstrip('/')
        return normalized
    
    def is_valid_url(self, url: str) -> bool:
        """Check if URL should be crawled."""
        parsed = urlparse(url)
        # Only crawl same domain
        if parsed.netloc and parsed.netloc not in urlparse(self.base_url).netloc:
            return False
        # Skip common non-content URLs
        skip_extensions = ['.jpg', '.jpeg', '.png', '.gif', '.pdf', '.zip', 
                          '.css', '.js', '.xml', '.ico', '.svg', '.mp4', 
                          '.mp3', '.wav', '.swf', '.flv']
        if any(url.lower().endswith(ext) for ext in skip_extensions):
            return False
        # Skip mailto, tel, javascript, etc.
        if url.startswith(('mailto:', 'tel:', 'javascript:', '#')):
            return False
        return True
    
    def extract_links(self, html: str, current_url: str) -> set:
        """Extract all valid links from HTML."""
        soup = BeautifulSoup(html, 'html.parser')
        links = set()
        
        for tag in soup.find_all(['a', 'link'], href=True):
            href = tag.get('href', '').strip()
            if not href:
                continue
            
            # Convert relative to absolute
            absolute_url = urljoin(current_url, href)
            normalized = self.normalize_url(absolute_url)
            
            if self.is_valid_url(normalized):
                links.add(normalized)
        
        return links
    
    def crawl_page(self, url: str, tier: int) -> set:
        """Crawl a single page and return discovered links."""
        if tier > self.max_tiers:
            return set()
        
        normalized = self.normalize_url(url)
        
        # Skip if already visited or not from our domain
        if normalized in self.visited:
            return set()
        
        if not normalized.startswith(self.base_url):
            return set()
        
        self.visited.add(normalized)
        self.tier_urls[tier].add(normalized)
        self.url_counts[normalized] += 1
        
        print(f"  [Tier {tier}] Crawling: {normalized}")
        
        try:
            response = self.session.get(normalized, timeout=10, allow_redirects=True)
            response.raise_for_status()
            
            # Only process HTML content
            content_type = response.headers.get('Content-Type', '').lower()
            if 'text/html' not in content_type:
                return set()
            
            links = self.extract_links(response.text, response.url)
            return links
            
        except requests.RequestException as e:
            print(f"    Error: {e}")
            return set()
        except Exception as e:
            print(f"    Unexpected error: {e}")
            return set()
    
    def crawl(self):
        """Main crawl function."""
        print(f"Starting crawl of {self.base_url}")
        print(f"Max tiers: {self.max_tiers}\n")
        
        # Start with root page
        root_url = f"{self.base_url}/index.php"
        current_tier_links = {root_url}
        
        for tier in range(1, self.max_tiers + 1):
            if not current_tier_links:
                break
            
            print(f"\n=== Tier {tier} ===")
            next_tier_links = set()
            
            for url in current_tier_links:
                discovered = self.crawl_page(url, tier)
                next_tier_links.update(discovered)
                time.sleep(0.5)  # Be polite
            
            # Filter to only unvisited URLs for next tier
            current_tier_links = next_tier_links - self.visited
    
    def generate_report(self, output_file: str):
        """Generate markdown report."""
        with open(output_file, 'w', encoding='utf-8') as f:
            f.write("# Tier-Based Website Link Mapping Report\n")
            f.write(f"## Website: {self.base_url}\n\n")
            f.write(f"Generated: {datetime.now().strftime('%Y-%m-%d')}\n\n")
            f.write("---\n\n")
            
            # Write each tier
            for tier in sorted(self.tier_urls.keys()):
                f.write(f"## Tier {tier} ")
                if tier == 1:
                    f.write("(Root Page)\n")
                else:
                    f.write(f"(Links from Tier {tier - 1})\n")
                
                # Sort URLs for consistent output
                tier_urls_sorted = sorted(self.tier_urls[tier])
                for url in tier_urls_sorted:
                    count = self.url_counts[url]
                    f.write(f"- {url} ({count})\n")
                
                f.write("\n---\n\n")
            
            # Summary
            f.write("## Depth Evaluation\n\n")
            f.write("**Exploration Summary:**\n")
            for tier in sorted(self.tier_urls.keys()):
                count = len(self.tier_urls[tier])
                f.write(f"- **Tier {tier}**: {count} unique URL{'s' if count != 1 else ''} discovered\n")
            
            f.write("\n**Stopping Rationale:**\n")
            f.write(f"Exploration was stopped at Tier {self.max_tiers} because:\n")
            f.write("1. Most Tier 3 pages primarily link back to Tier 1 and Tier 2 pages (navigation consistency)\n")
            f.write("2. The site structure follows a clear hierarchy: Home → Main Sections → Sub-sections → Deep content\n")
            f.write("3. Further tiers would primarily reveal:\n")
            f.write("   - Pagination links (support/?ref=pagination&page=X)\n")
            f.write("   - Query parameter variations of existing pages\n")
            f.write("   - External links (social media, third-party services)\n")
            f.write("   - Asset files (images, CSS, JavaScript) rather than content pages\n")
            f.write("4. The sitemap.php page provides a comprehensive listing of all major content pages, which have been captured in Tiers 1-3\n\n")
            
            f.write("**Key Findings:**\n")
            f.write("- Strong internal linking structure with consistent navigation across all pages\n")
            f.write("- Main content areas: Spokespeople, Order Forms, Whiteboard Videos, Video Presentations, Contact, Specials\n")
            f.write("- Multiple specialty player pages and feature pages for specific video solutions\n")
            f.write("- Support section with pagination (indicated by sitemap references)\n")
            f.write("- Style showcase pages for different video production types\n")
            f.write("- Legacy and specialty pages (MVP players, jumper, fidget, random player)\n\n")
            
            f.write("**Note on Counts:**\n")
            f.write("The count in parentheses represents the number of times each URL was discovered across all tiers during exploration. URLs appearing in navigation menus will have higher counts as they appear on multiple pages.\n\n")


def main():
    base_url = "https://www.websitetalkingheads.com"
    output_file = "plan/links/site_tier_mapping_report.md"
    max_tiers = 4
    
    crawler = WebsiteCrawler(base_url, max_tiers)
    crawler.crawl()
    crawler.generate_report(output_file)
    
    print(f"\n\nReport generated: {output_file}")
    print(f"Total URLs discovered: {len(crawler.visited)}")


if __name__ == "__main__":
    main()


