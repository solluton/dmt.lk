<?php
/**
 * Environment Configuration Loader
 * Loads environment variables from .env file
 */

function loadEnv($path = null) {
    if ($path === null) {
        $path = __DIR__ . '/../.env';
    }
    
    if (!file_exists($path)) {
        return false;
    }
    
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    foreach ($lines as $line) {
        // Skip comments
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        
        // Parse key=value pairs
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            
            // Remove quotes if present
            if ((substr($value, 0, 1) === '"' && substr($value, -1) === '"') ||
                (substr($value, 0, 1) === "'" && substr($value, -1) === "'")) {
                $value = substr($value, 1, -1);
            }
            
            // Always set environment variable (override existing)
            $_ENV[$key] = $value;
            putenv("$key=$value");
        }
    }
    
    return true;
}

/**
 * Get environment variable with default value
 */
function env($key, $default = null) {
    global $_ENV;
    return isset($_ENV[$key]) ? $_ENV[$key] : $default;
}

// Load environment variables
loadEnv();
?>
