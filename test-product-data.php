<?php
// Test specific product data
require_once 'config/database.php';

$test_slug = 'cricket-gloves'; // Change this to test different products

try {
    $pdo = getDBConnection();
    
    echo "<h1>Product Data Test for: $test_slug</h1>";
    
    // Get the product
    $stmt = $pdo->prepare("SELECT * FROM products WHERE slug = ?");
    $stmt->execute([$test_slug]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($product) {
        echo "<h2>Product Found:</h2>";
        echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
        foreach ($product as $key => $value) {
            echo "<tr>";
            echo "<td><strong>$key</strong></td>";
            echo "<td>" . htmlspecialchars($value ?: 'NULL/EMPTY') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        // Test the specific fields used in the template
        echo "<h2>Template Field Test:</h2>";
        echo "<p><strong>title_black:</strong> " . ($product['title_black'] ?? 'NOT SET') . "</p>";
        echo "<p><strong>title_green:</strong> " . ($product['title_green'] ?? 'NOT SET') . "</p>";
        echo "<p><strong>title:</strong> " . ($product['title'] ?? 'NOT SET') . "</p>";
        echo "<p><strong>subtitle:</strong> " . ($product['subtitle'] ?? 'NOT SET') . "</p>";
        echo "<p><strong>description:</strong> " . ($product['description'] ?? 'NOT SET') . "</p>";
        echo "<p><strong>main_image:</strong> " . ($product['main_image'] ?? 'NOT SET') . "</p>";
        
    } else {
        echo "<p style='color: red;'>Product not found with slug: $test_slug</p>";
        
        // Show available products
        $stmt = $pdo->query("SELECT slug, title FROM products LIMIT 10");
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<h2>Available Products:</h2>";
        echo "<ul>";
        foreach ($products as $p) {
            echo "<li><a href='?slug={$p['slug']}'>" . htmlspecialchars($p['title']) . " (slug: {$p['slug']})</a></li>";
        }
        echo "</ul>";
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
}
?>
