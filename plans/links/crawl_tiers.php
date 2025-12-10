<?php
declare(strict_types=1);

/**
 * Tier-Based Focused Link Crawler
 * 
 * Crawls only the first 3 tiers of pages as specified in plan/docs/pages-by-tier.md
 * Stops after completing tier 3 for review.
 */

error_reporting(E_ALL);
ini_set('display_errors', '0');
ini_set('log_errors', '1');
ini_set('memory_limit', '512M');

// Define constant FIRST to prevent main execution in crawl_links.php
define('CRAWL_TIERS_MODE', true);

// Override STATE_FILE BEFORE including crawl_links.php to avoid redefinition warning
if (!defined('STATE_FILE')) {
    define('STATE_FILE', __DIR__ . '/crawl_state_tiers.json');
}

// Include crawl_links.php to get constants and classes
require_once __DIR__ . '/crawl_links.php';

// Tier URLs from pages-by-tier.md
$TIER_URLS = [
    // Tier 1
    'tier1' => [
        'index.php'
    ],
    
    // Tier 2
    'tier2' => [
        'spokespeople/index.php',
        'website-spokesperson/index.php',
        'youtube-ready/index.php',
        'green-screen-video/index.php',
        'videopresentations/custom-presentations.php',
        'whiteboard/index.php',
        'videopresentations/animation.php',
        'styles/app-walkthrough/index.php', // Directory resolves to index.php
        'styles/3d/index.php',
        'styles/elearning/index.php', // Directory resolves to index.php
        'styles/motion-design/index.php', // Directory resolves to index.php
        'styles/typography/index.php', // Directory resolves to index.php
        'styles/animation/index.php', // Directory resolves to index.php
        'styles/product-demonstrations/index.php', // Directory resolves to index.php
        'styles/whiteboard/index.php', // Directory resolves to index.php
        'styles/custom-presentations/index.php', // Directory resolves to index.php
        'styles/viral-commercials/index.php', // Directory resolves to index.php
        'styles/index.php',
        'contact.php',
        'includes/header25.php',
        'includes/footer_b4.php'
    ],
    
    // Tier 3
    'tier3' => [
        'spokespeople/men.php',
        'spokespeople/women.php',
        'spokespeople/female-carousel.php',
        'spokespeople/male-carousel.php',
        'spokespeople/index.php', // Already in tier 2, but listed in tier 3
        'videopresentations/animation.php', // Already in tier 2
        'spokespeople/index.php', // Directory reference
        'actors/index.php', // Directory reference
        'styles/custom-presentations/index.php', // Already in tier 2
        'styles/viral-commercials/index.php', // Already in tier 2
        'styles/whiteboard/index.php', // Already in tier 2
        'styles/product-demonstrations/index.php', // Already in tier 2
        'styles/animation/index.php', // Already in tier 2
        'styles/elearning/index.php', // Already in tier 2
        'styles/3d/index.php', // Already in tier 2
        'styles/app-walkthrough/index.php', // Already in tier 2
        'styles/motion-design/index.php', // Already in tier 2
        'styles/typography/index.php', // Already in tier 2
        'contact-us/index.php',
        'orderform/index.php',
        'videopresentations/index.php',
        'specials/index.php',
        'sitemap.php',
        'privacy-policy.php'
    ]
];

// High-risk TLDs for suspicious detection
$HIGH_RISK_TLDS = [
    '.xyz', '.top', '.click', '.loan', '.download', '.science', '.racing',
    '.online', '.stream', '.review', '.bid', '.faith', '.accountant',
    '.date', '.trade', '.win', '.website', '.space', '.press', '.site',
    '.cricket', '.science', '.tk', '.ml', '.ga', '.cf', '.gq', '.men',
    '.adult', '.porn', '.sex', '.xxx', '.casino', '.bet', '.poker'
];

// Spam patterns in URLs
$SPAM_PATTERNS = [
    '/\b(pharma|pharmacy|viagra|cialis|pills?|meds?|prescription)\b/i',
    '/\b(casino|poker|betting|gambling|lottery)\b/i',
    '/\b(weight.?loss|diet.?pills?|lose.?weight)\b/i',
    '/\b(make.?money|earn.?online|work.?from.?home|get.?rich)\b/i',
    '/\b(click.?here|buy.?now|limited.?time|act.?now)\b/i'
];

// crawl_links.php already included above

/**
 * Convert relative path to absolute URL
 */
function pathToUrl(string $path): string {
    $path = ltrim($path, '/');
    return ROOT_URL . $path;
}

/**
 * Main execution
 */
function main(): void {
    global $TIER_URLS, $HIGH_RISK_TLDS, $SPAM_PATTERNS;
    
    echo "=== Tier-Based Focused Link Crawler ===\n";
    echo "Crawling first 3 tiers only\n\n";
    
    // Load existing state or create new
    $state = new CrawlState(STATE_FILE);
    
    // Create analyzer and crawler
    $analyzer = new UrlAnalyzer(TARGET_DOMAIN, $HIGH_RISK_TLDS, $SPAM_PATTERNS);
    $crawler = new LinkCrawler($state, $analyzer);
    
    // Collect all unique URLs from tiers
    $allUrls = [];
    foreach ($TIER_URLS as $tier => $urls) {
        echo "Processing $tier URLs...\n";
        foreach ($urls as $url) {
            $absoluteUrl = pathToUrl($url);
            if (!in_array($absoluteUrl, $allUrls)) {
                $allUrls[] = $absoluteUrl;
            }
        }
    }
    
    echo "\nTotal unique URLs to crawl: " . count($allUrls) . "\n";
    echo "Starting crawl...\n\n";
    
    // Crawl each URL by tier
    $tierNum = 1;
    foreach ($TIER_URLS as $tier => $urls) {
        echo "\n=== CRAWLING $tier (Tier $tierNum) ===\n";
        foreach ($urls as $url) {
            $absoluteUrl = pathToUrl($url);
            
            if ($state->isVisited($absoluteUrl)) {
                echo "Skipping (already visited): $absoluteUrl\n";
                continue;
            }
            
            echo "Crawling: $absoluteUrl\n";
            try {
                $crawler->crawlPage($absoluteUrl);
                $state->markVisited($absoluteUrl);
                $state->pagesCrawled++;
            } catch (Exception $e) {
                echo "ERROR: " . $e->getMessage() . "\n";
                $state->addError($absoluteUrl, $e->getMessage());
            }
            
            // Save state periodically
            if ($state->pagesCrawled % 5 === 0) {
                $state->save();
            }
        }
        $tierNum++;
    }
    
    // Final save
    $state->save();
    
    // Generate final reports
    echo "\n=== Generating Final Reports ===\n";
    $crawler->generateReports();
    
    echo "\n=== TIER CRAWL COMPLETE ===\n";
    echo "Crawled " . $state->pagesCrawled . " pages\n";
    echo "Found " . count($state->links) . " unique links\n";
    echo "Reports saved to:\n";
    echo "  - " . OUTPUT_DIR . "/link_report.json\n";
    echo "  - " . OUTPUT_DIR . "/http_links.json\n";
}

// Run
main();

