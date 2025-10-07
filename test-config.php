<?php
// Test database connection
echo "<h2>Database Connection Test</h2>";

try {
    require_once 'config/database.php';
    $pdo = getDBConnection();
    echo "<p style='color: green;'>✓ Database connection successful</p>";
    
    // Test a simple query
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM products");
    $result = $stmt->fetch();
    echo "<p>Products in database: " . $result['count'] . "</p>";
    
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Database connection failed: " . $e->getMessage() . "</p>";
}

echo "<h2>Environment Test</h2>";
try {
    require_once 'config/env.php';
    echo "<p style='color: green;'>✓ Environment loaded</p>";
    echo "<p>SITE_URL: " . env('SITE_URL', 'NOT SET') . "</p>";
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Environment failed: " . $e->getMessage() . "</p>";
}

echo "<h2>URL Helper Test</h2>";
try {
    require_once 'config/url_helper.php';
    echo "<p style='color: green;'>✓ URL helper loaded</p>";
    echo "<p>Base URL: " . getBaseUrl() . "</p>";
    echo "<p>Asset test: " . asset('css/test.css') . "</p>";
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ URL helper failed: " . $e->getMessage() . "</p>";
}
?>
