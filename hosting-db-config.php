<?php
// Hosting Database Configuration
// Update these values with your actual hosting database details

// Database configuration for hosting
define('DB_HOST', 'localhost');
define('DB_USER', 'sollvctb_dmtlk');  // Your database username
define('DB_PASS', 'YOUR_DATABASE_PASSWORD_HERE');  // Your database password
define('DB_NAME', 'sollvctb_dmtlk');  // Your database name

// Alternative configurations to try:
// Option 1: If database name is different
// define('DB_NAME', 'sollvctb_dmt');

// Option 2: If username is different
// define('DB_USER', 'sollvctb_dmt');

// Option 3: If using different host
// define('DB_HOST', 'premium5.web-hosting.com');

// Create database connection
function getDBConnection() {
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
        $pdo = new PDO($dsn, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $e) {
        error_log("Database connection error: " . $e->getMessage());
        return false;
    }
}

// Test connection
try {
    $pdo = getDBConnection();
    if ($pdo) {
        echo "<p style='color: green;'>✓ Database connection successful!</p>";
        
        // Test if tables exist
        $stmt = $pdo->query("SHOW TABLES");
        $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
        if ($tables) {
            echo "<p style='color: green;'>✓ Tables found: " . implode(', ', $tables) . "</p>";
        } else {
            echo "<p style='color: orange;'>⚠ No tables found. You may need to run the database initialization.</p>";
        }
    } else {
        echo "<p style='color: red;'>✗ Database connection failed!</p>";
    }
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Error: " . $e->getMessage() . "</p>";
}
?>
