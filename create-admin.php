<?php
/**
 * Admin User Creation Script
 * Use this script to create a secure admin user
 * Run: php create-admin.php
 */

require_once 'config/database.php';

function createAdminUser() {
    echo "=== DMT Cricket Admin User Creation ===\n\n";
    
    // Get admin details
    echo "Enter admin details:\n";
    $name = readline("Full Name: ");
    $email = readline("Email: ");
    $username = readline("Username: ");
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "❌ Invalid email address!\n";
        return false;
    }
    
    // Check if user already exists
    try {
        $pdo = getDBConnection();
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ? OR username = ?");
        $stmt->execute([$email, $username]);
        
        if ($stmt->fetchColumn() > 0) {
            echo "❌ User with this email or username already exists!\n";
            return false;
        }
        
        // Get password
        echo "\nPassword requirements:\n";
        echo "- At least 8 characters\n";
        echo "- Must contain uppercase, lowercase, number, and special character\n";
        echo "- Cannot be common passwords like 'admin123', 'password', etc.\n\n";
        
        $password = readline("Password: ");
        $confirmPassword = readline("Confirm Password: ");
        
        if ($password !== $confirmPassword) {
            echo "❌ Passwords do not match!\n";
            return false;
        }
        
        // Validate password strength
        if (!validatePasswordStrength($password)) {
            echo "❌ Password does not meet security requirements!\n";
            return false;
        }
        
        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Create user
        $stmt = $pdo->prepare("INSERT INTO users (name, email, username, password, role) VALUES (?, ?, ?, ?, ?)");
        $result = $stmt->execute([$name, $email, $username, $hashedPassword, 'admin']);
        
        if ($result) {
            echo "\n✅ Admin user created successfully!\n";
            echo "Email: $email\n";
            echo "Username: $username\n";
            echo "Role: admin\n\n";
            echo "You can now login to the admin panel.\n";
            return true;
        } else {
            echo "❌ Failed to create admin user!\n";
            return false;
        }
        
    } catch (PDOException $e) {
        echo "❌ Database error: " . $e->getMessage() . "\n";
        return false;
    }
}

function validatePasswordStrength($password) {
    // Check minimum length
    if (strlen($password) < 8) {
        echo "❌ Password must be at least 8 characters long\n";
        return false;
    }
    
    // Check for common weak passwords
    $weakPasswords = [
        'admin123', 'password', '123456', 'admin', 'root', 'user',
        'test123', 'qwerty', 'abc123', 'password123', 'admin123456'
    ];
    
    if (in_array(strtolower($password), $weakPasswords)) {
        echo "❌ Password is too common. Please choose a stronger password.\n";
        return false;
    }
    
    // Check for uppercase letter
    if (!preg_match('/[A-Z]/', $password)) {
        echo "❌ Password must contain at least one uppercase letter\n";
        return false;
    }
    
    // Check for lowercase letter
    if (!preg_match('/[a-z]/', $password)) {
        echo "❌ Password must contain at least one lowercase letter\n";
        return false;
    }
    
    // Check for number
    if (!preg_match('/[0-9]/', $password)) {
        echo "❌ Password must contain at least one number\n";
        return false;
    }
    
    // Check for special character
    if (!preg_match('/[^A-Za-z0-9]/', $password)) {
        echo "❌ Password must contain at least one special character\n";
        return false;
    }
    
    return true;
}

// Run the script
if (php_sapi_name() === 'cli') {
    createAdminUser();
} else {
    echo "This script must be run from the command line.\n";
    echo "Usage: php create-admin.php\n";
}
?>
