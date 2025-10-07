<?php
// Quick database check
require_once 'config/database.php';

try {
    $pdo = getDBConnection();
    
    echo "<h1>Database Products Check</h1>";
    
    // Check all products
    $stmt = $pdo->query("SELECT id, title, slug, status, main_image FROM products ORDER BY id");
    $all_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<h2>All Products (" . count($all_products) . "):</h2>";
    if ($all_products) {
        echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
        echo "<tr><th>ID</th><th>Title</th><th>Slug</th><th>Status</th><th>Main Image</th></tr>";
        foreach ($all_products as $p) {
            echo "<tr>";
            echo "<td>{$p['id']}</td>";
            echo "<td>" . htmlspecialchars($p['title']) . "</td>";
            echo "<td>" . htmlspecialchars($p['slug']) . "</td>";
            echo "<td style='color: " . ($p['status'] === 'active' ? 'green' : 'red') . ";'>{$p['status']}</td>";
            echo "<td>" . htmlspecialchars($p['main_image'] ?: 'NOT SET') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='color: red;'>No products found in database!</p>";
    }
    
    // Check active products only
    $stmt = $pdo->query("SELECT id, title, slug FROM products WHERE status = 'active'");
    $active_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<h2>Active Products (" . count($active_products) . "):</h2>";
    if ($active_products) {
        echo "<ul>";
        foreach ($active_products as $p) {
            echo "<li><a href='/product/{$p['slug']}' target='_blank'>" . htmlspecialchars($p['title']) . " (slug: {$p['slug']})</a></li>";
        }
        echo "</ul>";
    } else {
        echo "<p style='color: red;'>No active products found!</p>";
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'>Database error: " . $e->getMessage() . "</p>";
}
?>
