<?php
declare(strict_types=1);

/**
 * Test remaining uncrawled pages
 */

error_reporting(E_ALL);
ini_set('display_errors', '0');
ini_set('log_errors', '1');
ini_set('memory_limit', '256M');

define('ROOT_URL', 'https://www.websitetalkingheads.com/');
define('OUTPUT_DIR', __DIR__);

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

// Get all internal pages from report (both as links and as sources)
$allPages = [];
if (file_exists(OUTPUT_DIR . '/link_report_simple.json')) {
    $data = json_decode(file_get_contents(OUTPUT_DIR . '/link_report_simple.json'), true);
    if ($data && isset($data['links'])) {
        foreach ($data['links'] as $link) {
            // Add the link itself
            if (strpos($link['normalized_url'], ROOT_URL) === 0) {
                $path = str_replace(ROOT_URL, '', $link['normalized_url']);
                $path = rtrim($path, '/');
                if ($path && 
                    $path !== '/' &&
                    strpos($path, 'includes/') === false &&
                    strpos($path, '../') === false &&
                    strpos($path, 'mrss') === false &&
                    !preg_match('/\.(rss|xml|json|css|js|jpg|jpeg|png|gif|svg|ico|pdf)$/i', $path)) {
                    $allPages[$path] = true;
                }
            }
            
            // Add all source pages
            if (isset($link['sources'])) {
                foreach ($link['sources'] as $source) {
                    if (strpos($source, ROOT_URL) === 0) {
                        $path = str_replace(ROOT_URL, '', $source);
                        $path = rtrim($path, '/');
                        if ($path && 
                            $path !== '/' &&
                            strpos($path, 'includes/') === false &&
                            strpos($path, '../') === false &&
                            strpos($path, 'mrss') === false &&
                            !preg_match('/\.(rss|xml|json|css|js|jpg|jpeg|png|gif|svg|ico|pdf)$/i', $path)) {
                            $allPages[$path] = true;
                        }
                    }
                }
            }
        }
    }
}

// Already crawled pages
$crawledPages = [
    'index.php', 'spokespeople/index.php', 'website-spokesperson/index.php',
    'youtube-ready/index.php', 'green-screen-video/index.php',
    'videopresentations/custom-presentations.php', 'whiteboard/index.php',
    'videopresentations/animation.php', 'styles/app-walkthrough/index.php',
    'styles/3d/index.php', 'styles/elearning/index.php',
    'styles/motion-design/index.php', 'styles/typography/index.php',
    'styles/animation/index.php', 'styles/product-demonstrations/index.php',
    'styles/whiteboard/index.php', 'styles/custom-presentations/index.php',
    'styles/viral-commercials/index.php', 'styles/index.php',
    'contact.php', 'spokespeople/men.php', 'spokespeople/women.php',
    'spokespeople/female-carousel.php', 'spokespeople/male-carousel.php',
    'actors/index.php', 'contact-us/index.php', 'orderform/index.php',
    'videopresentations/index.php', 'specials/index.php', 'sitemap.php',
    'privacy-policy.php', 'orderform/', 'whiteboard/', 'videopresentations/',
    'specials/', 'awards', 'spokespeople/', 'website-spokesperson/',
    'youtube-ready/', 'green-screen-video/', 'styles/app-walkthrough',
    'styles/elearning', 'styles/motion-design', 'styles/typography',
    'styles/animation', 'styles/product-demonstrations', 'styles/whiteboard',
    'styles/custom-presentations', 'styles/viral-commercials', 'order.php',
    'awards/', 'youtube-ready/backgrounds.php', 'whiteboard/animation.php',
    'styles/3d', 'articles/pros_vs_cons', 'support',
    'videopresentations/viral-commercials.php', 'spanish',
    'specialty-players/slider', 'specialty-players/popup', 'mvp', 'jumper',
    'fidget', 'Random_Player', 'features', 'faq-html5', 'contact-us',
    'spokespeople', 'product-demonstrations', 'choosing_a_video_spokesperson',
    'index.html', 'sitemap.xml'
];

// Normalize crawled pages for comparison
$crawledNormalized = [];
foreach ($crawledPages as $crawled) {
    $clean = trim($crawled, '/');
    $crawledNormalized[$clean] = true;
    // Also add without trailing slash variations
    if (substr($clean, -10) === '/index.php') {
        $crawledNormalized[substr($clean, 0, -10)] = true;
    }
}

// Find uncrawled pages
$uncrawledPages = [];
foreach (array_keys($allPages) as $path) {
    $pathClean = trim($path, '/');
    $isCrawled = false;
    
    // Check exact match
    if (isset($crawledNormalized[$pathClean])) {
        $isCrawled = true;
    }
    
    // Check if path with /index.php was crawled
    if (!$isCrawled && isset($crawledNormalized[$pathClean . '/index.php'])) {
        $isCrawled = true;
    }
    
    // Check if parent directory was crawled
    if (!$isCrawled) {
        foreach ($crawledNormalized as $crawled => $val) {
            if ($crawled === $pathClean . '/' || $crawled . '/' === $pathClean) {
                $isCrawled = true;
                break;
            }
        }
    }
    
    if (!$isCrawled) {
        $uncrawledPages[] = $path;
    }
}

echo "Found " . count($uncrawledPages) . " uncrawled pages to test.\n\n";

function testPage(string $url): array {
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_MAXREDIRS => 5,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_USERAGENT => 'Mozilla/5.0',
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_NOBODY => true
    ]);
    
    curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curlError = curl_error($ch);
    curl_close($ch);
    
    if ($curlError) {
        return ['status' => 'error', 'code' => 0, 'error' => $curlError];
    }
    
    if ($httpCode >= 400) {
        return ['status' => 'broken', 'code' => $httpCode, 'error' => "HTTP $httpCode"];
    }
    
    return ['status' => 'ok', 'code' => $httpCode];
}

$tested = 0;
$broken = 0;
foreach ($uncrawledPages as $path) {
    $url = ROOT_URL . ltrim($path, '/');
    echo "Testing: $url\n";
    $result = testPage($url);
    $tested++;
    
    if ($result['status'] !== 'ok') {
        $broken++;
        echo "  ❌ {$result['error']}\n";
        
        if (!isset($brokenLinks[$url])) {
            $brokenLinks[$url] = [
                'url' => $path,
                'normalized_url' => $url,
                'http_code' => $result['code'] ?? null,
                'error' => $result['error'],
                'count' => 1,
                'sources' => []
            ];
        }
    } else {
        echo "  ✓ OK ({$result['code']})\n";
    }
}

// Update broken links report
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

echo "\nDone! Tested $tested pages, found $broken broken.\n";
echo "Total broken links: " . count($brokenLinks) . "\n";

