<?php
/**
 * One-time Admin Setup Script
 * Run this once to create your initial admin user
 * Usage: php setup-admin.php
 */

require_once 'config/database.php';
require_once 'config/password_security.php';

echo "=== DMT Cricket Admin Setup ===\n\n";

// Check if admin already exists
try {
    $pdo = getDBConnection();
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE role = 'admin'");
    $stmt->execute();
    
    if ($stmt->fetchColumn() > 0) {
        echo "❌ Admin user already exists!\n";
        echo "If you need to reset the admin password, use the admin panel.\n";
        exit;
    }
    
    // Create admin user with secure defaults
    $adminName = "DMT Admin";
    $adminEmail = "admin@dmtcricket.com";
    $adminUsername = "admin";
    $adminPassword = generateSecurePassword(12); // Generate secure password
    
    // Hash the password
    $hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT);
    
    // Insert admin user
    $stmt = $pdo->prepare("INSERT INTO users (name, email, username, password, role) VALUES (?, ?, ?, ?, ?)");
    $result = $stmt->execute([$adminName, $adminEmail, $adminUsername, $hashedPassword, 'admin']);
    
    if ($result) {
        echo "✅ Admin user created successfully!\n\n";
        echo "Login Details:\n";
        echo "==============\n";
        echo "Email: $adminEmail\n";
        echo "Username: $adminUsername\n";
        echo "Password: $adminPassword\n\n";
        echo "🔐 IMPORTANT: Save this password securely!\n";
        echo "🔐 Change this password immediately after first login!\n\n";
        echo "You can now login to the admin panel at:\n";
        echo "http://your-domain.com/admin/login\n\n";
        echo "⚠️  Delete this setup file after use for security!\n";
    } else {
        echo "❌ Failed to create admin user!\n";
    }
    
} catch (PDOException $e) {
    echo "❌ Database error: " . $e->getMessage() . "\n";
}
?>
