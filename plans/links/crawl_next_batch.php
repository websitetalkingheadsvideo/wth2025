<?php
declare(strict_types=1);

/**
 * Crawl Next Batch - Crawls next 20 pages from discovered links
 */

error_reporting(E_ALL);
ini_set('display_errors', '0');
ini_set('log_errors', '1');
ini_set('memory_limit', '256M');

define('ROOT_URL', 'https://www.websitetalkingheads.com/');
define('TARGET_DOMAIN', 'websitetalkingheads.com');
define('OUTPUT_DIR', __DIR__);

// Already crawled pages
$crawledPages = [
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
    'privacy-policy.php',
    'orderform/',
    'whiteboard/',
    'videopresentations/',
    'specials/',
    'awards',
    'spokespeople/',
    'website-spokesperson/',
    'youtube-ready/',
    'green-screen-video/',
    'styles/app-walkthrough',
    'styles/elearning',
    'styles/motion-design',
    'styles/typography',
    'styles/animation',
    'styles/product-demonstrations',
    'styles/whiteboard',
    'styles/custom-presentations',
    'styles/viral-commercials',
    'order.php',
    'awards/'
];

// Find all uncrawled pages from link report
$allPagesFromReport = [];
if (file_exists(OUTPUT_DIR . '/link_report_simple.json')) {
    $data = json_decode(file_get_contents(OUTPUT_DIR . '/link_report_simple.json'), true);
    if ($data && isset($data['links'])) {
        foreach ($data['links'] as $link) {
            if (strpos($link['normalized_url'], ROOT_URL) === 0) {
                $path = str_replace(ROOT_URL, '', $link['normalized_url']);
                $path = rtrim($path, '/');
                if ($path && 
                    $path !== '/' &&
                    strpos($path, 'includes/') === false &&
                    strpos($path, '../') === false &&
                    strpos($path, 'mrss') === false &&
                    !preg_match('/\.(rss|xml|json|css|js|jpg|jpeg|png|gif|svg|ico|pdf)$/i', $path)) {
                    $allPagesFromReport[$path] = true;
                }
            }
        }
    }
}

// Find uncrawled pages
$nextPages = [];
foreach (array_keys($allPagesFromReport) as $path) {
    $isCrawled = false;
    foreach ($crawledPages as $crawled) {
        if ($crawled === $path || 
            $crawled === $path . '/' ||
            $crawled === $path . '/index.php' ||
            rtrim($crawled, '/') === $path) {
            $isCrawled = true;
            break;
        }
    }
    if (!$isCrawled) {
        $nextPages[] = $path;
    }
}

// Limit to 50 pages
$nextPages = array_slice($nextPages, 0, 50);

echo "Found " . count($nextPages) . " uncrawled pages to process.\n";

// Load existing data
$existingLinks = [];
$existingBroken = [];
if (file_exists(OUTPUT_DIR . '/link_report_simple.json')) {
    $data = json_decode(file_get_contents(OUTPUT_DIR . '/link_report_simple.json'), true);
    if ($data && isset($data['links'])) {
        foreach ($data['links'] as $link) {
            $existingLinks[$link['url']] = $link;
        }
    }
}
if (file_exists(OUTPUT_DIR . '/broken_links.json')) {
    $data = json_decode(file_get_contents(OUTPUT_DIR . '/broken_links.json'), true);
    if ($data && isset($data['broken_links'])) {
        foreach ($data['broken_links'] as $link) {
            $existingBroken[$link['normalized_url']] = $link;
        }
    }
}

$allLinks = $existingLinks;
$brokenLinks = $existingBroken;

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

function normalizeUrl(string $link, string $baseUrl): string {
    if ($link === '#' || strpos($link, '#') === 0) {
        return '';
    }
    
    if (preg_match('/^(tel:|mailto:|javascript:|data:|file:|ftp:)/i', $link)) {
        return '';
    }
    
    if (preg_match('/^https?:\/\//i', $link)) {
        return $link;
    }
    
    $parsed = parse_url($baseUrl);
    $base = $parsed['scheme'] . '://' . $parsed['host'];
    
    if (strpos($link, '/') === 0) {
        return $base . $link;
    } else {
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
        CURLOPT_NOBODY => true,
        CURLOPT_HEADER => true
    ]);
    
    curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);
    
    if ($curlError) {
        return null;
    }
    
    return $httpCode;
}

echo "Crawling next batch of pages...\n\n";

$discoveredPages = [];
$pagesToCrawl = $nextPages;
$maxPages = 50;
$crawledCount = 0;

while ($crawledCount < $maxPages && !empty($pagesToCrawl)) {
    $path = array_shift($pagesToCrawl);
    if (in_array($path, $crawledPages)) {
        continue;
    }
    
    $url = ROOT_URL . ltrim($path, '/');
    echo "Crawling [$crawledCount/$maxPages]: $url\n";
    $crawledCount++;
    
    $links = getLinksFromUrl($url);
    
    foreach ($links as $link) {
        if ($link === '#' || strpos($link, '#') === 0) {
            continue;
        }
        
        if (preg_match('/^(tel:|mailto:|javascript:|data:|file:|ftp:)/i', $link)) {
            continue;
        }
        
        $normalized = normalizeUrl($link, $url);
        if (empty($normalized)) {
            continue;
        }
        
        if (!isset($allLinks[$link])) {
            $allLinks[$link] = [
                'url' => $link,
                'normalized_url' => $normalized,
                'count' => 0,
                'sources' => []
            ];
        }
        $allLinks[$link]['count']++;
        if (!in_array($url, $allLinks[$link]['sources'])) {
            $allLinks[$link]['sources'][] = $url;
        }
        
        if (!isset($brokenLinks[$normalized])) {
            echo "  Testing: $normalized\n";
            $httpCode = testLink($normalized);
            
            if ($httpCode === null) {
                $brokenLinks[$normalized] = [
                    'url' => $link,
                    'normalized_url' => $normalized,
                    'error' => 'Network error',
                    'count' => 0,
                    'sources' => []
                ];
            } elseif ($httpCode >= 400) {
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
        
        if (isset($brokenLinks[$normalized])) {
            $brokenLinks[$normalized]['count']++;
            if (!in_array($url, $brokenLinks[$normalized]['sources'])) {
                $brokenLinks[$normalized]['sources'][] = $url;
            }
        }
        
        // Discover new internal pages to crawl
        if ($crawledCount < $maxPages && strpos($normalized, ROOT_URL) === 0) {
            $internalPath = str_replace(ROOT_URL, '', $normalized);
            $internalPath = rtrim($internalPath, '/');
            if ($internalPath && 
                strpos($internalPath, 'includes/') === false &&
                strpos($internalPath, '../') === false &&
                strpos($internalPath, 'mrss') === false &&
                !preg_match('/\.(rss|xml|json|css|js|jpg|jpeg|png|gif|svg|ico|pdf)$/i', $internalPath) &&
                !in_array($internalPath, $crawledPages) &&
                !in_array($internalPath, $pagesToCrawl) &&
                !in_array($internalPath, $discoveredPages)) {
                $discoveredPages[] = $internalPath;
                $pagesToCrawl[] = $internalPath;
            }
        }
    }
    
    $crawledPages[] = $path;
}

// Update reports
$report = [
    'links' => array_values($allLinks),
    'summary' => [
        'total_links' => count($allLinks),
        'pages_crawled' => count($crawledPages) + count($nextPages)
    ]
];

file_put_contents(OUTPUT_DIR . '/link_report_simple.json', json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

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

echo "\nDone! Total links: " . count($allLinks) . "\n";
echo "Total broken: " . count($brokenLinks) . "\n";
echo "Reports updated.\n";

