<?php
/**
 * URL Helper Functions
 * Provides functions to generate correct URLs for the site
 */

/**
 * Get the base URL for the site
 * Uses SITE_URL from environment or auto-detects based on current environment
 */
function getBaseUrl() {
    // Check if we're running from command line
    if (php_sapi_name() === 'cli') {
        // Use SITE_URL from environment or fallback
        $site_url = env('SITE_URL', 'localhost/dmt.lk');
        return 'http://' . $site_url;
    }
    
    // Use SITE_URL from environment if available
    $site_url = env('SITE_URL');
    if ($site_url) {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        return $protocol . '://' . $site_url;
    }
    
    // Fallback: Auto-detect based on current environment
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
