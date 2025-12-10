<?php
declare(strict_types=1);

/**
 * Simple Tier Crawler - Uses cURL to extract exact links
 * No browser automation, no over-complication
 */

error_reporting(E_ALL);
ini_set('display_errors', '0');
ini_set('log_errors', '1');
ini_set('memory_limit', '256M');

define('ROOT_URL', 'https://www.websitetalkingheads.com/');
define('TARGET_DOMAIN', 'websitetalkingheads.com');
define('OUTPUT_DIR', __DIR__);

// Tier URLs
$tierUrls = [
    'index.php',
    'spokespeople/index.php',
    'website-spokesperson/index.php',
    'youtube-ready/index.php',
    'green-screen-video/index.php',
    'videopresentations/custom-presentations.php',
    'whiteboard/index.php',
    'videopresentations/animation.php',
    'styles/app-walkthrough/index.php',
    'styles/3d/index.php',
    'styles/elearning/index.php',
    'styles/motion-design/index.php',
    'styles/typography/index.php',
    'styles/animation/index.php',
    'styles/product-demonstrations/index.php',
    'styles/whiteboard/index.php',
    'styles/custom-presentations/index.php',
    'styles/viral-commercials/index.php',
    'styles/index.php',
    'contact.php',
    'includes/header25.php',
    'includes/footer_b4.php',
    'spokespeople/men.php',
    'spokespeople/women.php',
    'spokespeople/female-carousel.php',
    'spokespeople/male-carousel.php',
    'actors/index.php',
    'contact-us/index.php',
    'orderform/index.php',
    'videopresentations/index.php',
    'specials/index.php',
    'sitemap.php',
    'privacy-policy.php'
];

$allLinks = [];
$brokenLinks = [];

function getLinksFromUrl(string $url): array {
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_MAXREDIRS => 5,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_USERAGENT => 'Mozilla/5.0',
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false
    ]);
    
    $html = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($httpCode !== 200 || !$html) {
        return [];
    }
    
    $links = [];
    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    
    $nodes = $xpath->query('//a[@href]');
    foreach ($nodes as $node) {
        $href = $node->getAttribute('href');
        if ($href) {
            $links[] = trim($href);
        }
    }
    
    return $links;
}

function isInternal(string $url): bool {
    $host = parse_url($url, PHP_URL_HOST);
    if (!$host) return false;
    return strtolower($host) === TARGET_DOMAIN || strtolower($host) === 'www.' . TARGET_DOMAIN;
}

function normalizeUrl(string $link, string $baseUrl): string {
    // Skip # links
    if ($link === '#' || strpos($link, '#') === 0) {
        return '';
    }
    
    // Skip non-HTTP protocols
    if (preg_match('/^(tel:|mailto:|javascript:|data:|file:|ftp:)/i', $link)) {
        return '';
    }
    
    // Already absolute
    if (preg_match('/^https?:\/\//i', $link)) {
        return $link;
    }
    
    // Relative URL - resolve against base
    $parsed = parse_url($baseUrl);
    $base = $parsed['scheme'] . '://' . $parsed['host'];
    
    if (strpos($link, '/') === 0) {
        // Absolute path
        return $base . $link;
    } else {
        // Relative path
        $basePath = $parsed['path'] ?? '/';
        $lastSlash = strrpos($basePath, '/');
        $baseDir = $lastSlash !== false ? substr($basePath, 0, $lastSlash + 1) : '/';
        return $base . $baseDir . $link;
    }
}

function testLink(string $url): ?int {
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_MAXREDIRS => 5,
        CURLOPT_TIMEOUT => 5,
        CURLOPT_USERAGENT => 'Mozilla/5.0',
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_NOBODY => true, // HEAD request only
        CURLOPT_HEADER => true
    ]);
    
    curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);
    
    if ($curlError) {
        return null; // Network error
    }
    
    return $httpCode;
}

echo "Crawling " . count($tierUrls) . " pages...\n\n";

foreach ($tierUrls as $path) {
    $url = ROOT_URL . ltrim($path, '/');
    echo "Crawling: $url\n";
    
    $links = getLinksFromUrl($url);
    
    foreach ($links as $link) {
        // Skip # links immediately
        if ($link === '#' || strpos($link, '#') === 0) {
            continue;
        }
        
        // Skip non-HTTP protocols
        if (preg_match('/^(tel:|mailto:|javascript:|data:|file:|ftp:)/i', $link)) {
            continue;
        }
        
        // Normalize URL for testing
        $normalized = normalizeUrl($link, $url);
        if (empty($normalized)) {
            continue;
        }
        
        // Store exact link as found
        if (!isset($allLinks[$link])) {
            $allLinks[$link] = [
                'url' => $link, // EXACT as found in HTML
                'normalized_url' => $normalized,
                'count' => 0,
                'sources' => []
            ];
        }
        $allLinks[$link]['count']++;
        if (!in_array($url, $allLinks[$link]['sources'])) {
            $allLinks[$link]['sources'][] = $url;
        }
        
        // Test if link is broken (only test once per unique normalized URL)
        if (!isset($brokenLinks[$normalized])) {
            echo "  Testing: $normalized\n";
            $httpCode = testLink($normalized);
            
            if ($httpCode === null) {
                // Network error
                $brokenLinks[$normalized] = [
                    'url' => $link,
                    'normalized_url' => $normalized,
                    'error' => 'Network error',
                    'count' => 0,
                    'sources' => []
                ];
            } elseif ($httpCode >= 400) {
                // 404, 500, etc.
                $brokenLinks[$normalized] = [
                    'url' => $link,
                    'normalized_url' => $normalized,
                    'http_code' => $httpCode,
                    'error' => $httpCode === 404 ? '404 Not Found' : ($httpCode === 500 ? '500 Server Error' : "HTTP $httpCode"),
                    'count' => 0,
                    'sources' => []
                ];
            }
        }
        
        // If broken, record this occurrence
        if (isset($brokenLinks[$normalized])) {
            $brokenLinks[$normalized]['count']++;
            if (!in_array($url, $brokenLinks[$normalized]['sources'])) {
                $brokenLinks[$normalized]['sources'][] = $url;
            }
        }
    }
}

// Generate main report
$report = [
    'links' => array_values($allLinks),
    'summary' => [
        'total_links' => count($allLinks),
        'pages_crawled' => count($tierUrls)
    ]
];

file_put_contents(OUTPUT_DIR . '/link_report_simple.json', json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

// Generate separate broken links file
$brokenReport = [
    'broken_links' => array_values($brokenLinks),
    'summary' => [
        'total_broken' => count($brokenLinks),
        'broken_by_code' => [
            '404' => count(array_filter($brokenLinks, fn($b) => ($b['http_code'] ?? 0) === 404)),
            '500' => count(array_filter($brokenLinks, fn($b) => ($b['http_code'] ?? 0) === 500)),
            'other_errors' => count(array_filter($brokenLinks, fn($b) => isset($b['http_code']) && $b['http_code'] >= 400 && $b['http_code'] !== 404 && $b['http_code'] !== 500)),
            'network_errors' => count(array_filter($brokenLinks, fn($b) => !isset($b['http_code'])))
        ]
    ]
];

file_put_contents(OUTPUT_DIR . '/broken_links.json', json_encode($brokenReport, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

echo "\nDone! Found " . count($allLinks) . " unique links\n";
echo "Found " . count($brokenLinks) . " broken links (404/500/errors)\n";
echo "Reports saved to:\n";
echo "  - " . OUTPUT_DIR . "/link_report_simple.json\n";
echo "  - " . OUTPUT_DIR . "/broken_links.json\n";

