<?php
// Database connection test for hosting
echo "<h1>Database Connection Test</h1>";

// Test different database configurations
$configs = [
    'Config 1: User = DB Name' => [
        'host' => 'localhost',
        'user' => 'sollvctb_dmtlk',
        'pass' => 'your_password_here', // You need to add the actual password
        'db' => 'sollvctb_dmtlk'
    ],
    'Config 2: Different DB Name' => [
        'host' => 'localhost',
        'user' => 'sollvctb_dmtlk',
        'pass' => 'your_password_here',
        'db' => 'sollvctb_dmt'
    ],
    'Config 3: Different User' => [
        'host' => 'localhost',
        'user' => 'sollvctb_dmt',
        'pass' => 'your_password_here',
        'db' => 'sollvctb_dmtlk'
    ]
];

foreach ($configs as $name => $config) {
    echo "<h2>$name</h2>";
    echo "<p>Host: {$config['host']}</p>";
    echo "<p>User: {$config['user']}</p>";
    echo "<p>Database: {$config['db']}</p>";
    
    try {
        $dsn = "mysql:host={$config['host']};dbname={$config['db']}";
        $pdo = new PDO($dsn, $config['user'], $config['pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Test a simple query
        $stmt = $pdo->query("SELECT 1 as test");
        $result = $stmt->fetch();
        
        echo "<p style='color: green;'>✓ Connection successful! Test query result: {$result['test']}</p>";
        
        // Test if we can access tables
        $stmt = $pdo->query("SHOW TABLES");
        $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
        if ($tables) {
            echo "<p style='color: green;'>✓ Tables found: " . implode(', ', $tables) . "</p>";
        } else {
            echo "<p style='color: orange;'>⚠ No tables found</p>";
        }
        
    } catch (PDOException $e) {
        echo "<p style='color: red;'>✗ Connection failed: " . $e->getMessage() . "</p>";
    }
    
    echo "<hr>";
}

// Test environment variables
echo "<h2>Environment Variables</h2>";
echo "<p>DB_HOST: " . ($_ENV['DB_HOST'] ?? 'NOT SET') . "</p>";
echo "<p>DB_USER: " . ($_ENV['DB_USER'] ?? 'NOT SET') . "</p>";
echo "<p>DB_NAME: " . ($_ENV['DB_NAME'] ?? 'NOT SET') . "</p>";
echo "<p>DB_PASS: " . (isset($_ENV['DB_PASS']) ? '[SET]' : 'NOT SET') . "</p>";

// Test without database name (just connection)
echo "<h2>Test Connection Without Database</h2>";
try {
    $pdo = new PDO("mysql:host=localhost", 'sollvctb_dmtlk', 'your_password_here');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<p style='color: green;'>✓ MySQL connection successful</p>";
    
    // List available databases
    $stmt = $pdo->query("SHOW DATABASES");
    $databases = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    echo "<p>Available databases:</p><ul>";
    foreach ($databases as $db) {
        echo "<li>$db</li>";
    }
    echo "</ul>";
    
} catch (PDOException $e) {
    echo "<p style='color: red;'>✗ MySQL connection failed: " . $e->getMessage() . "</p>";
}
?>
