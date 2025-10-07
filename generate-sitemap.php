<?php
/**
 * Generate Dynamic Sitemap XML
 * This script generates a fresh sitemap.xml file with current product data
 */

require_once 'config/database.php';
require_once 'config/url_helper.php';

try {
    $pdo = getDBConnection();
    
    // Fetch all active products
    $stmt = $pdo->prepare("SELECT title, slug, updated_at FROM products WHERE status = 'active' ORDER BY display_order ASC, created_at ASC");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get base URL
    $base_url = getBaseUrl();
    
    // Start XML output
    header('Content-Type: application/xml; charset=utf-8');
    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    
    // Static pages
    $static_pages = [
        ['url' => '', 'priority' => '1.0', 'changefreq' => 'weekly'],
        ['url' => 'about-us', 'priority' => '0.8', 'changefreq' => 'monthly'],
        ['url' => 'our-products', 'priority' => '0.9', 'changefreq' => 'weekly'],
        ['url' => 'contact-us', 'priority' => '0.7', 'changefreq' => 'monthly'],
        ['url' => 'privacy-policies', 'priority' => '0.5', 'changefreq' => 'yearly'],
        ['url' => 'terms-conditions', 'priority' => '0.5', 'changefreq' => 'yearly'],
        ['url' => 'sitemap', 'priority' => '0.6', 'changefreq' => 'monthly']
    ];
    
    foreach ($static_pages as $page) {
        echo "  <url>\n";
        echo "    <loc>" . htmlspecialchars($base_url . '/' . $page['url']) . "</loc>\n";
        echo "    <priority>" . $page['priority'] . "</priority>\n";
        echo "    <changefreq>" . $page['changefreq'] . "</changefreq>\n";
        echo "  </url>\n";
    }
    
    // Product pages
    foreach ($products as $product) {
        echo "  <url>\n";
        echo "    <loc>" . htmlspecialchars($base_url . '/product/' . $product['slug']) . "</loc>\n";
        echo "    <lastmod>" . date('Y-m-d', strtotime($product['updated_at'])) . "</lastmod>\n";
        echo "    <priority>0.8</priority>\n";
        echo "    <changefreq>weekly</changefreq>\n";
        echo "  </url>\n";
    }
    
    echo '</urlset>' . "\n";
    
} catch (Exception $e) {
    // Fallback to static sitemap if database fails
    http_response_code(500);
    echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    echo '  <url><loc>' . getBaseUrl() . '/</loc><priority>1.0</priority><changefreq>weekly</changefreq></url>' . "\n";
    echo '</urlset>' . "\n";
}
?>
