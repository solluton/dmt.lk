<?php
// Simple dashboard test
echo "<h1>Admin Dashboard Test</h1>";

// Test database connection
try {
    require_once '../config/database.php';
    $pdo = getDBConnection();
    echo "<p style='color: green;'>✓ Database connection successful</p>";
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Database connection failed: " . $e->getMessage() . "</p>";
}

// Test URL helper
try {
    require_once '../config/url_helper.php';
    echo "<p style='color: green;'>✓ URL helper loaded successfully</p>";
    echo "<p>Base URL: " . getBaseUrl() . "</p>";
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ URL helper failed: " . $e->getMessage() . "</p>";
}

// Test environment
try {
    require_once '../config/env.php';
    echo "<p style='color: green;'>✓ Environment loaded successfully</p>";
    echo "<p>SITE_URL: " . env('SITE_URL', 'NOT SET') . "</p>";
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Environment failed: " . $e->getMessage() . "</p>";
}

// Test authentication
try {
    require_once '../config/database.php';
    requireLogin();
    echo "<p style='color: green;'>✓ Authentication check passed</p>";
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Authentication failed: " . $e->getMessage() . "</p>";
}

echo "<hr>";
echo "<h2>Server Information</h2>";
echo "<p>PHP Version: " . phpversion() . "</p>";
echo "<p>Server Software: " . $_SERVER['SERVER_SOFTWARE'] . "</p>";
echo "<p>Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "</p>";
echo "<p>Script Name: " . $_SERVER['SCRIPT_NAME'] . "</p>";
echo "<p>Request URI: " . $_SERVER['REQUEST_URI'] . "</p>";
?>
