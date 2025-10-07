<?php
/**
 * URL Helper Functions
 * Provides functions to generate correct URLs for the site
 */

/**
 * Get the base URL for the site
 * Automatically detects the correct base URL based on the current environment
 */
function getBaseUrl() {
    // Check if we're running from command line
    if (php_sapi_name() === 'cli') {
        // Default fallback for command line
        return 'http://localhost/dmt.lk';
    }
    
    // Check if we're in a subdirectory (like localhost/dmt.lk)
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    $script_name = dirname($_SERVER['SCRIPT_NAME'] ?? '');
    
    // Remove trailing slash and normalize
    $script_name = rtrim($script_name, '/');
    
    // Build base URL
    $base_url = $protocol . '://' . $host . $script_name;
    
    return $base_url;
}

/**
 * Generate a URL relative to the base URL
 */
function url($path = '') {
    $base_url = getBaseUrl();
    $path = ltrim($path, '/');
    
    if (empty($path)) {
        return $base_url . '/';
    }
    
    return $base_url . '/' . $path;
}

/**
 * Generate an asset URL (for images, CSS, JS)
 */
function asset($path) {
    return url($path);
}

/**
 * Generate a product URL
 */
function productUrl($slug) {
    return url('product/' . $slug);
}

/**
 * Generate a page URL
 */
function pageUrl($page) {
    return url($page);
}
?>
