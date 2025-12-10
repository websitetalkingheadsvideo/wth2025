<?php
/**
 * Centralized Footer Loader
 * 
 * Configuration Rule:
 * - All pages load footer_b4.php by default
 * - Pages in /whiteboard/ directory are excluded from this system
 *   (they maintain their own footer implementation)
 * 
 * Usage: Replace direct footer includes with:
 * <?php include(__DIR__ . '/footer-loader.php'); ?>
 * 
 * Or from subdirectories (adjust path as needed):
 * <?php include(__DIR__ . '/../includes/footer-loader.php'); ?>
 * 
 * Note: This loader only applies to non-whiteboard pages.
 * Whiteboard pages should continue using their existing footer includes.
 */

declare(strict_types=1);

/**
 * Determines if current script is in whiteboard directory
 * 
 * @return bool True if script is in /whiteboard/ directory
 */
function is_whiteboard_page(): bool {
    $script_file = $_SERVER['SCRIPT_FILENAME'] ?? '';
    $document_root = $_SERVER['DOCUMENT_ROOT'] ?? '';
    
    // Normalize paths for Windows compatibility
    $script_file = str_replace('\\', '/', $script_file);
    $document_root = str_replace('\\', '/', $document_root);
    
    // Get relative path from document root
    $relative_path = str_replace($document_root, '', $script_file);
    $relative_path = ltrim($relative_path, '/');
    
    // Check if script is in /whiteboard/ directory (at any depth)
    return preg_match('#^whiteboard/#', $relative_path) === 1;
}

// Only load footer_b4.php for non-whiteboard pages
// Whiteboard pages are excluded and maintain their own footer implementation
if (!is_whiteboard_page()) {
    $footer_path = __DIR__ . '/footer_b4.php';
    if (file_exists($footer_path)) {
        include $footer_path;
    } else {
        error_log("Footer loader: Could not locate footer_b4.php at {$footer_path}");
    }
}