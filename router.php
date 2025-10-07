<?php
// Router for clean URLs and static assets
// This handles clean URLs when .htaccess is not available

$request_uri = $_SERVER['REQUEST_URI'];
$path = parse_url($request_uri, PHP_URL_PATH);

// Handle admin login URL
if ($path === '/admin/login' || $path === '/admin/login/') {
    include 'login.php';
    exit;
}

// Block /login route (only /admin/login is allowed)
if ($path === '/login' || $path === '/login/') {
    http_response_code(404);
    include '404.php';
    exit;
}

// Block forgot password route (not needed)
if ($path === '/forgot-password' || $path === '/forgot-password/') {
    http_response_code(404);
    include '404.php';
    exit;
}

// Block admin password reset route (not needed)
if ($path === '/admin-password-reset' || $path === '/admin-password-reset/') {
    http_response_code(404);
    include '404.php';
    exit;
}

// Handle contact us URL
if ($path === '/contact-us' || $path === '/contact-us/') {
    include 'contact-us.php';
    exit;
}

// Handle contact handler URL
if ($path === '/contact-handler' || $path === '/contact-handler/') {
    include 'contact-handler.php';
    exit;
}

// Handle process email queue URL
if ($path === '/process-email-queue' || $path === '/process-email-queue/') {
    include 'process_email_queue.php';
    exit;
}

// Handle admin dashboard URL (must be before admin exclusion)
if ($path === '/admin/dashboard' || $path === '/admin/dashboard/') {
    include 'dashboard.php';
    exit;
}

// Handle admin profile URL
if ($path === '/admin/profile' || $path === '/admin/profile/') {
    include 'admin/profile.php';
    exit;
}

// Handle admin products URLs
if ($path === '/admin/products' || $path === '/admin/products/') {
    include 'admin/products.php';
    exit;
}
if ($path === '/admin/product-create' || $path === '/admin/product-create/') {
    include 'admin/product-create.php';
    exit;
}
if ($path === '/admin/product-edit' || $path === '/admin/product-edit/') {
    include 'admin/product-edit.php';
    exit;
}

// Handle admin contact leads URL
if ($path === '/admin/contact-leads' || $path === '/admin/contact-leads/') {
    include 'admin/contact-leads.php';
    exit;
}

// Handle admin email queue URL
if ($path === '/admin/email-queue' || $path === '/admin/email-queue/') {
    include 'admin/email-queue.php';
    exit;
}

// Handle admin settings URLs
if ($path === '/admin/settings' || $path === '/admin/settings/') {
    include 'admin/settings.php';
    exit;
}
if ($path === '/admin/slug-redirects' || $path === '/admin/slug-redirects/') {
    include 'admin/slug-redirects.php';
    exit;
}
if ($path === '/admin/legal-pages' || $path === '/admin/legal-pages/') {
    include 'admin/legal-pages.php';
    exit;
}

// Block /dashboard route (only /admin/dashboard is allowed)
if ($path === '/dashboard' || $path === '/dashboard/') {
    http_response_code(404);
    include '404.php';
    exit;
}

// Let static assets pass through to PHP built-in server
if (preg_match('#^/(css|js|images|fonts|uploads|documents|phpmailer|config|admin)/#', $path)) {
    return false; // Let PHP built-in server handle these
}

// Handle dashboard UI assets (with space in directory name)
if (preg_match('#^/dashboard%20ui/#', $path)) {
    return false; // Let PHP built-in server handle these
}

// Handle sitemap and robots files
if ($path === '/sitemap.xml' || $path === '/robots.txt') {
    return false; // Let PHP built-in server handle these
}

// Handle favicon requests
if ($path === '/favicon.ico' || $path === '/images/favicon.png') {
    return false; // Let PHP built-in server handle these
}

// Handle product URLs
if (preg_match('#^/product/([^/]+)/?$#', $path, $matches)) {
    $slug = $matches[1];
    $_GET['slug'] = $slug;
    include 'product.php';
    exit;
}

// Handle other clean URLs
if (preg_match('#^/([^/]+)/?$#', $path, $matches)) {
    $page = $matches[1];
    $php_file = $page . '.php';
    
    if (file_exists($php_file)) {
        include $php_file;
        exit;
    }
}

// Handle root URL
if ($path === '/' || $path === '') {
    include 'index.php';
    exit;
}

// 404 for everything else
http_response_code(404);
include '404.php';
exit;
?>
