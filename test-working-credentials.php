<?php
// Test with your working credentials
echo "<h1>Database Connection Test with Working Credentials</h1>";

// Your working credentials
$servername = "premium5.web-hosting.com";
$db = "sollvctb_dmtlk";
$username = "sollvctb_dmtlk";
$password = "F640Vk=l}lKK";

echo "<h2>Testing with your working credentials:</h2>";
echo "<p>Host: $servername</p>";
echo "<p>Database: $db</p>";
echo "<p>Username: $username</p>";
echo "<p>Password: [SET]</p>";

// Test with PDO (what the main app uses)
try {
    $dsn = "mysql:host=$servername;dbname=$db";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<p style='color: green;'>✓ PDO Connection successful!</p>";
    
    // Test if tables exist
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    if ($tables) {
        echo "<p style='color: green;'>✓ Tables found: " . implode(', ', $tables) . "</p>";
        
        // Test products table
        if (in_array('products', $tables)) {
            $stmt = $pdo->query("SELECT COUNT(*) as count FROM products");
            $result = $stmt->fetch();
            echo "<p style='color: green;'>✓ Products table has {$result['count']} records</p>";
            
            // Show first few products
            $stmt = $pdo->query("SELECT id, title, slug, status FROM products LIMIT 5");
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if ($products) {
                echo "<h3>Sample Products:</h3><ul>";
                foreach ($products as $product) {
                    echo "<li>ID: {$product['id']}, Title: " . htmlspecialchars($product['title']) . ", Slug: " . htmlspecialchars($product['slug']) . ", Status: {$product['status']}</li>";
                }
                echo "</ul>";
            }
        }
    } else {
        echo "<p style='color: orange;'>⚠ No tables found</p>";
    }
    
} catch (PDOException $e) {
    echo "<p style='color: red;'>✗ PDO Connection failed: " . $e->getMessage() . "</p>";
}

// Test with mysqli (your working method)
echo "<h2>Testing with mysqli (your working method):</h2>";
$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    echo "<p style='color: red;'>✗ mysqli Connection failed: " . mysqli_connect_error() . "</p>";
} else {
    echo "<p style='color: green;'>✓ mysqli Connection successful!</p>";
    mysqli_close($conn);
}

// Test the main app's database connection
echo "<h2>Testing main app database connection:</h2>";
try {
    require_once 'config/database.php';
    $pdo = getDBConnection();
    
    if ($pdo) {
        echo "<p style='color: green;'>✓ Main app database connection successful!</p>";
        
        // Test a simple query
        $stmt = $pdo->query("SELECT 1 as test");
        $result = $stmt->fetch();
        echo "<p style='color: green;'>✓ Test query result: {$result['test']}</p>";
        
    } else {
        echo "<p style='color: red;'>✗ Main app database connection failed!</p>";
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Main app error: " . $e->getMessage() . "</p>";
}
?>
