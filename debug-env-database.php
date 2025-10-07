<?php
// Comprehensive environment and database debugging
echo "<h1>Environment & Database Debug</h1>";

echo "<h2>1. File System Check</h2>";
echo "<p>Current directory: " . getcwd() . "</p>";
echo "<p>.env file exists: " . (file_exists('.env') ? 'YES' : 'NO') . "</p>";
echo "<p>.env file path: " . realpath('.env') . "</p>";
echo "<p>.env file readable: " . (is_readable('.env') ? 'YES' : 'NO') . "</p>";

if (file_exists('.env')) {
    echo "<p>.env file size: " . filesize('.env') . " bytes</p>";
    echo "<p>.env file permissions: " . substr(sprintf('%o', fileperms('.env')), -4) . "</p>";
}

echo "<h2>2. Environment Variables Before Loading</h2>";
echo "<p>DB_HOST: " . ($_ENV['DB_HOST'] ?? 'NOT SET') . "</p>";
echo "<p>DB_USER: " . ($_ENV['DB_USER'] ?? 'NOT SET') . "</p>";
echo "<p>DB_NAME: " . ($_ENV['DB_NAME'] ?? 'NOT SET') . "</p>";
echo "<p>DB_PASS: " . (isset($_ENV['DB_PASS']) ? '[SET]' : 'NOT SET') . "</p>";

echo "<h2>3. Manual .env Loading Test</h2>";
if (file_exists('.env')) {
    $lines = file('.env', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    echo "<p>Lines in .env file: " . count($lines) . "</p>";
    echo "<h3>.env file contents:</h3>";
    echo "<pre>";
    foreach ($lines as $i => $line) {
        echo ($i + 1) . ": " . htmlspecialchars($line) . "\n";
    }
    echo "</pre>";
    
    // Manual parsing
    echo "<h3>Manual parsing results:</h3>";
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            if ((substr($value, 0, 1) === '"' && substr($value, -1) === '"') ||
                (substr($value, 0, 1) === "'" && substr($value, -1) === "'")) {
                $value = substr($value, 1, -1);
            }
            echo "<p>$key = " . htmlspecialchars($value) . "</p>";
        }
    }
} else {
    echo "<p style='color: red;'>No .env file found!</p>";
}

echo "<h2>4. Test env.php Loading</h2>";
try {
    require_once 'config/env.php';
    echo "<p style='color: green;'>✓ env.php loaded successfully</p>";
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ env.php failed: " . $e->getMessage() . "</p>";
}

echo "<h2>5. Environment Variables After Loading</h2>";
echo "<p>DB_HOST: " . ($_ENV['DB_HOST'] ?? 'NOT SET') . "</p>";
echo "<p>DB_USER: " . ($_ENV['DB_USER'] ?? 'NOT SET') . "</p>";
echo "<p>DB_NAME: " . ($_ENV['DB_NAME'] ?? 'NOT SET') . "</p>";
echo "<p>DB_PASS: " . (isset($_ENV['DB_PASS']) ? '[SET]' : 'NOT SET') . "</p>";

echo "<h2>6. Test env() Function</h2>";
echo "<p>env('DB_HOST'): " . (function_exists('env') ? env('DB_HOST', 'NOT SET') : 'env() function not available') . "</p>";
echo "<p>env('DB_USER'): " . (function_exists('env') ? env('DB_USER', 'NOT SET') : 'env() function not available') . "</p>";
echo "<p>env('DB_NAME'): " . (function_exists('env') ? env('DB_NAME', 'NOT SET') : 'env() function not available') . "</p>";
echo "<p>env('DB_PASS'): " . (function_exists('env') ? (env('DB_PASS') ? '[SET]' : 'NOT SET') : 'env() function not available') . "</p>";

echo "<h2>7. Direct Database Connection Test</h2>";
// Test with hardcoded values (your working credentials)
$servername = "premium5.web-hosting.com";
$db = "sollvctb_dmtlk";
$username = "sollvctb_dmtlk";
$password = "4ytth0llm#E";

try {
    $dsn = "mysql:host=$servername;dbname=$db";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<p style='color: green;'>✓ Direct PDO connection successful!</p>";
    
    // Test if tables exist
    $stmt = $pdo->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    if ($tables) {
        echo "<p style='color: green;'>✓ Tables found: " . implode(', ', $tables) . "</p>";
    } else {
        echo "<p style='color: orange;'>⚠ No tables found</p>";
    }
    
} catch (PDOException $e) {
    echo "<p style='color: red;'>✗ Direct PDO connection failed: " . $e->getMessage() . "</p>";
}

echo "<h2>8. Test Main App Database Connection</h2>";
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

echo "<h2>9. PHP Configuration</h2>";
echo "<p>PHP Version: " . phpversion() . "</p>";
echo "<p>Current working directory: " . getcwd() . "</p>";
echo "<p>Script filename: " . $_SERVER['SCRIPT_FILENAME'] . "</p>";
echo "<p>Document root: " . $_SERVER['DOCUMENT_ROOT'] . "</p>";
?>
