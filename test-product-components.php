<?php
// Test product page components
echo "<h1>Product Page Component Test</h1>";

echo "<h2>1. Basic PHP Test</h2>";
echo "PHP Version: " . phpversion() . "<br>";
echo "Current time: " . date('Y-m-d H:i:s') . "<br>";

echo "<h2>2. Environment Test</h2>";
try {
    require_once 'config/env.php';
    echo "<p style='color: green;'>✓ Environment loaded</p>";
    echo "<p>SITE_URL: " . env('SITE_URL', 'NOT SET') . "</p>";
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Environment failed: " . $e->getMessage() . "</p>";
}

echo "<h2>3. URL Helper Test</h2>";
try {
    require_once 'config/url_helper.php';
    echo "<p style='color: green;'>✓ URL helper loaded</p>";
    echo "<p>Base URL: " . getBaseUrl() . "</p>";
    echo "<p>Asset test: " . asset('css/test.css') . "</p>";
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ URL helper failed: " . $e->getMessage() . "</p>";
}

echo "<h2>4. Database Test</h2>";
try {
    require_once 'config/database.php';
    $pdo = getDBConnection();
    echo "<p style='color: green;'>✓ Database connection successful</p>";
    
    // Test product query
    $stmt = $pdo->prepare("SELECT slug FROM products WHERE status = 'active' LIMIT 1");
    $stmt->execute();
    $product = $stmt->fetch();
    
    if ($product) {
        echo "<p>Sample product slug: " . htmlspecialchars($product['slug']) . "</p>";
    } else {
        echo "<p>No active products found</p>";
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Database failed: " . $e->getMessage() . "</p>";
}

echo "<h2>5. Company Helper Test</h2>";
try {
    require_once 'config/company_helper.php';
    echo "<p style='color: green;'>✓ Company helper loaded</p>";
    echo "<p>Company name: " . getCompanyName() . "</p>";
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Company helper failed: " . $e->getMessage() . "</p>";
}

echo "<h2>6. GET Parameters Test</h2>";
echo "<p>Slug parameter: " . ($_GET['slug'] ?? 'NOT SET') . "</p>";
echo "<p>ID parameter: " . ($_GET['id'] ?? 'NOT SET') . "</p>";
echo "<p>All GET params: " . print_r($_GET, true) . "</p>";
?>
