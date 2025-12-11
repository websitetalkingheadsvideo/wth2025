<?php
/**
 * Content Security Policy header for pages using Google reCAPTCHA
 * 
 * This CSP allows:
 * - Scripts from Google domains (reCAPTCHA, Google Analytics, etc.)
 * - Inline scripts (required by reCAPTCHA)
 * - Frames from Google (reCAPTCHA widget)
 * - Workers from Google (reCAPTCHA workers)
 * 
 * Note: Only set if headers haven't been sent and no CSP header already exists
 */
if (!headers_sent()) {
    // Check if CSP header already exists
    $headers = headers_list();
    $cspExists = false;
    foreach ($headers as $header) {
        if (stripos($header, 'Content-Security-Policy') !== false) {
            $cspExists = true;
            break;
        }
    }
    
    // Only set CSP if one doesn't already exist
    if (!$cspExists) {
        // CSP policy that allows reCAPTCHA and common third-party scripts
        $csp = "default-src 'self'; " .
               "script-src 'self' 'unsafe-inline' 'unsafe-eval' " .
               "https://www.google.com https://www.gstatic.com " .
               "https://www.googletagmanager.com https://www.google-analytics.com " .
               "https://cdn.jsdelivr.net https://code.jquery.com " .
               "https://cdnjs.cloudflare.com https://webforms.pipedrive.com " .
               "https://cdn.was-1.pipedriveassets.com; " .
               "style-src 'self' 'unsafe-inline' " .
               "https://cdn.jsdelivr.net https://cdnjs.cloudflare.com " .
               "https://use.typekit.net; " .
               "frame-src 'self' " .
               "https://www.google.com https://webforms.pipedrive.com " .
               "https://player.vimeo.com; " .
               "worker-src 'self' https://www.gstatic.com; " .
               "connect-src 'self' " .
               "https://www.google.com https://www.google-analytics.com " .
               "https://www.gstatic.com https://webforms.pipedrive.com " .
               "https://cdn.was-1.pipedriveassets.com; " .
               "img-src 'self' data: https:; " .
               "font-src 'self' data: https://use.typekit.net https://cdnjs.cloudflare.com;";
        
        header("Content-Security-Policy: " . $csp, false);
    }
}
?>

