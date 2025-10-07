<?php
/**
 * Dynamic Sitemap Generator
 * This script generates a fresh sitemap.xml file with current product data
 * Run this script whenever products are added or modified
 */

require_once 'config/database.php';

// Base URL - update this for production
$base_url = 'http://localhost/dmt.lk';

// Get current date in ISO format
$current_date = date('Y-m-d');

try {
    $pdo = getDBConnection();
    
    // Fetch all active products
    $stmt = $pdo->prepare("SELECT slug, updated_at FROM products WHERE status = 'active' ORDER BY display_order ASC, created_at ASC");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $products = [];
    error_log("Error fetching products for sitemap: " . $e->getMessage());
}

// Static pages with their priorities and change frequencies
$static_pages = [
    '/' => ['priority' => '1.0', 'changefreq' => 'weekly'],
    '/about-us' => ['priority' => '0.8', 'changefreq' => 'monthly'],
    '/our-products' => ['priority' => '0.9', 'changefreq' => 'weekly'],
    '/contact-us' => ['priority' => '0.7', 'changefreq' => 'monthly'],
    '/privacy-policies' => ['priority' => '0.3', 'changefreq' => 'yearly'],
    '/terms-conditions' => ['priority' => '0.3', 'changefreq' => 'yearly'],
    '/sitemap' => ['priority' => '0.5', 'changefreq' => 'monthly']
];

// Generate XML content
$xml_content = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
$xml_content .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n\n";

// Add static pages
$xml_content .= "    <!-- Static Pages -->\n";
foreach ($static_pages as $url => $settings) {
    $xml_content .= "    <url>\n";
    $xml_content .= "        <loc>" . htmlspecialchars($base_url . $url) . "</loc>\n";
    $xml_content .= "        <lastmod>" . $current_date . "</lastmod>\n";
    $xml_content .= "        <changefreq>" . $settings['changefreq'] . "</changefreq>\n";
    $xml_content .= "        <priority>" . $settings['priority'] . "</priority>\n";
    $xml_content .= "    </url>\n";
}

// Add product pages
if (!empty($products)) {
    $xml_content .= "\n    <!-- Product Pages -->\n";
    foreach ($products as $product) {
        $xml_content .= "    <url>\n";
        $xml_content .= "        <loc>" . htmlspecialchars($base_url . '/product/' . $product['slug']) . "</loc>\n";
        $xml_content .= "        <lastmod>" . date('Y-m-d', strtotime($product['updated_at'])) . "</lastmod>\n";
        $xml_content .= "        <changefreq>weekly</changefreq>\n";
        $xml_content .= "        <priority>0.8</priority>\n";
        $xml_content .= "    </url>\n";
    }
}

$xml_content .= "\n</urlset>\n";

// Write to sitemap.xml file
$result = file_put_contents('sitemap.xml', $xml_content);

if ($result !== false) {
    echo "✅ Sitemap generated successfully!\n";
    echo "📄 File: sitemap.xml\n";
    echo "📊 Static pages: " . count($static_pages) . "\n";
    echo "🛍️ Product pages: " . count($products) . "\n";
    echo "🔗 Total URLs: " . (count($static_pages) + count($products)) . "\n";
    echo "📅 Generated: " . $current_date . "\n";
} else {
    echo "❌ Error: Could not write sitemap.xml file\n";
    echo "🔍 Check file permissions\n";
}
?>
