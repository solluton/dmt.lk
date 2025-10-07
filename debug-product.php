<?php
// Debug product page data loading
echo "<h1>Product Page Debug</h1>";

// Test database connection
echo "<h2>1. Database Connection Test</h2>";
try {
    require_once 'config/database.php';
    $pdo = getDBConnection();
    echo "<p style='color: green;'>✓ Database connection successful</p>";
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Database connection failed: " . $e->getMessage() . "</p>";
    exit;
}

// Test URL parameters
echo "<h2>2. URL Parameters</h2>";
echo "<p>GET parameters: " . print_r($_GET, true) . "</p>";
echo "<p>REQUEST_URI: " . $_SERVER['REQUEST_URI'] . "</p>";
echo "<p>SCRIPT_NAME: " . $_SERVER['SCRIPT_NAME'] . "</p>";

// Test product slug extraction
echo "<h2>3. Product Slug Extraction</h2>";
$product_slug = $_GET['slug'] ?? null;
$product_id = $_GET['id'] ?? null;
echo "<p>Product slug: " . ($product_slug ?: 'NOT SET') . "</p>";
echo "<p>Product ID: " . ($product_id ?: 'NOT SET') . "</p>";

// Test products in database
echo "<h2>4. Products in Database</h2>";
try {
    $stmt = $pdo->query("SELECT id, title, slug, status FROM products ORDER BY id LIMIT 10");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if ($products) {
        echo "<p style='color: green;'>✓ Found " . count($products) . " products in database:</p>";
        echo "<ul>";
        foreach ($products as $product) {
            echo "<li>ID: {$product['id']}, Title: " . htmlspecialchars($product['title']) . ", Slug: " . htmlspecialchars($product['slug']) . ", Status: {$product['status']}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p style='color: red;'>✗ No products found in database</p>";
    }
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Error querying products: " . $e->getMessage() . "</p>";
}

// Test specific product lookup
if ($product_slug) {
    echo "<h2>5. Specific Product Lookup (by slug: $product_slug)</h2>";
    try {
        $stmt = $pdo->prepare("SELECT * FROM products WHERE slug = ? AND status = 'active'");
        $stmt->execute([$product_slug]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($product) {
            echo "<p style='color: green;'>✓ Product found:</p>";
            echo "<ul>";
            echo "<li>ID: {$product['id']}</li>";
            echo "<li>Title: " . htmlspecialchars($product['title']) . "</li>";
            echo "<li>Slug: " . htmlspecialchars($product['slug']) . "</li>";
            echo "<li>Status: {$product['status']}</li>";
            echo "<li>Main Image: " . htmlspecialchars($product['main_image'] ?: 'NOT SET') . "</li>";
            echo "</ul>";
        } else {
            echo "<p style='color: red;'>✗ Product not found with slug: $product_slug</p>";
            
            // Check if product exists but is inactive
            $stmt = $pdo->prepare("SELECT * FROM products WHERE slug = ?");
            $stmt->execute([$product_slug]);
            $inactive_product = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($inactive_product) {
                echo "<p style='color: orange;'>⚠ Product exists but status is: {$inactive_product['status']}</p>";
            }
        }
    } catch (Exception $e) {
        echo "<p style='color: red;'>✗ Error looking up product: " . $e->getMessage() . "</p>";
    }
}

// Test redirects
echo "<h2>6. Redirect Check</h2>";
if ($product_slug) {
    try {
        $stmt = $pdo->prepare("SELECT new_slug FROM slug_redirects WHERE old_slug = ? AND redirect_type = 'product'");
        $stmt->execute([$product_slug]);
        $redirect_info = $stmt->fetch();
        
        if ($redirect_info) {
            echo "<p style='color: orange;'>⚠ Redirect found: $product_slug → {$redirect_info['new_slug']}</p>";
        } else {
            echo "<p style='color: green;'>✓ No redirect found for slug: $product_slug</p>";
        }
    } catch (Exception $e) {
        echo "<p style='color: red;'>✗ Error checking redirects: " . $e->getMessage() . "</p>";
    }
}

// Test URL helper
echo "<h2>7. URL Helper Test</h2>";
try {
    require_once 'config/url_helper.php';
    echo "<p style='color: green;'>✓ URL helper loaded</p>";
    echo "<p>Base URL: " . getBaseUrl() . "</p>";
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ URL helper failed: " . $e->getMessage() . "</p>";
}

// Test company helper
echo "<h2>8. Company Helper Test</h2>";
try {
    require_once 'config/company_helper.php';
    echo "<p style='color: green;'>✓ Company helper loaded</p>";
    echo "<p>Company name: " . getCompanyName() . "</p>";
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Company helper failed: " . $e->getMessage() . "</p>";
}
?>
