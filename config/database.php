<?php
// Load environment variables
require_once __DIR__ . '/env.php';
require_once __DIR__ . '/security.php';

// Database configuration
define('DB_HOST', env('DB_HOST', 'localhost'));
define('DB_USER', env('DB_USER', 'root'));
define('DB_PASS', env('DB_PASS', ''));
define('DB_NAME', env('DB_NAME', 'dmt'));

// Secure session configuration
function secureSession() {
    // Prevent session fixation
    ini_set('session.use_strict_mode', 1);
    
    // Secure session cookies
    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_secure', 1); // Enable for HTTPS
    ini_set('session.cookie_samesite', 'Strict');
    ini_set('session.cookie_lifetime', 0); // Session cookie expires when browser closes
    
    // Session security settings
    ini_set('session.use_only_cookies', 1);
    ini_set('session.use_trans_sid', 0);
    
    // Regenerate session ID periodically
    if (!isset($_SESSION['last_regeneration'])) {
        $_SESSION['last_regeneration'] = time();
    } elseif (time() - $_SESSION['last_regeneration'] > 300) { // 5 minutes
        session_regenerate_id(true);
        $_SESSION['last_regeneration'] = time();
    }
}

// Initialize secure session
if (session_status() === PHP_SESSION_NONE) {
    secureSession();
    session_start();
}

// Create database connection
function getDBConnection() {
    try {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch(PDOException $e) {
        handleDatabaseError($e, 'database connection');
        return false;
    }
}

// Initialize database and create users table if it doesn't exist
function initializeDatabase() {
    try {
        // First connect without database to create it if needed
        $pdo = new PDO("mysql:host=" . DB_HOST, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Create database if it doesn't exist
        $pdo->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME);
        $pdo->exec("USE " . DB_NAME);
        
        // Create users table
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) UNIQUE NOT NULL,
            username VARCHAR(50) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            role ENUM('admin', 'user') DEFAULT 'user',
            remember_token VARCHAR(255) NULL,
            reset_token VARCHAR(255) NULL,
            reset_token_expiry DATETIME NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        
        $pdo->exec($sql);
        
        // Create blog posts table
        $sql = "CREATE TABLE IF NOT EXISTS blog_posts (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            slug VARCHAR(191) UNIQUE NOT NULL,
            content LONGTEXT NOT NULL,
            excerpt TEXT NULL,
            featured_image VARCHAR(255) NULL,
            category_id INT NULL,
            popular BOOLEAN DEFAULT FALSE,
            status ENUM('draft', 'published') DEFAULT 'draft',
            author_id INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE CASCADE,
            FOREIGN KEY (category_id) REFERENCES blog_categories(id) ON DELETE SET NULL
        )";
        
        $pdo->exec($sql);
        
        // Create blog categories table
        $sql = "CREATE TABLE IF NOT EXISTS blog_categories (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL UNIQUE,
            slug VARCHAR(100) NOT NULL UNIQUE,
            description TEXT NULL,
            color VARCHAR(7) DEFAULT '#007bff',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        
        $pdo->exec($sql);
        
        // Insert default categories
        $defaultCategories = [
            ['Research Insights', 'research-insights', 'Latest research findings and scientific insights', '#28a745'],
            ['Laboratory Best Practices', 'laboratory-best-practices', 'Best practices for laboratory operations', '#17a2b8'],
            ['Innovation & Technology', 'innovation-technology', 'Technology innovations and advancements', '#6f42c1'],
            ['Industry Trends', 'industry-trends', 'Current trends in the pharmaceutical industry', '#fd7e14'],
            ['Sustainability in Science', 'sustainability-science', 'Environmental sustainability in scientific practices', '#20c997'],
            ['Events & Workshops', 'events-workshops', 'Upcoming events and educational workshops', '#dc3545'],
            ['Educational Resources', 'educational-resources', 'Learning materials and educational content', '#6c757d']
        ];
        
        foreach ($defaultCategories as $category) {
            $stmt = $pdo->prepare("INSERT IGNORE INTO blog_categories (name, slug, description, color) VALUES (?, ?, ?, ?)");
            $stmt->execute($category);
        }
        
        // Create contact leads table
        $sql = "CREATE TABLE IF NOT EXISTS contact_leads (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            phone VARCHAR(20) NULL,
            company VARCHAR(100) NULL,
            subject VARCHAR(191) NULL,
            message TEXT NOT NULL,
            status ENUM('new', 'read', 'replied', 'closed') DEFAULT 'new',
            ip_address VARCHAR(45) NULL,
            user_agent TEXT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        
        $pdo->exec($sql);
        
        // Add category column if it doesn't exist (migration)
        try {
            $pdo->exec("ALTER TABLE blog_posts ADD COLUMN category VARCHAR(100) NULL");
        } catch(PDOException $e) {
            // Column already exists, ignore error
        }
        
        // Add popular column if it doesn't exist (migration)
        try {
            $pdo->exec("ALTER TABLE blog_posts ADD COLUMN popular BOOLEAN DEFAULT FALSE");
        } catch(PDOException $e) {
            // Column already exists, ignore error
        }
        
        // Migrate category column to category_id (migration)
        try {
            // First, add the new category_id column
            $pdo->exec("ALTER TABLE blog_posts ADD COLUMN category_id INT NULL");
            
            // Add foreign key constraint
            $pdo->exec("ALTER TABLE blog_posts ADD CONSTRAINT fk_blog_posts_category FOREIGN KEY (category_id) REFERENCES blog_categories(id) ON DELETE SET NULL");
            
            // Note: We'll keep the old category column for now to avoid data loss
            // You can manually migrate data and drop the old column later if needed
        } catch(PDOException $e) {
            // Migration already applied or failed, ignore error
        }
        
        // Create products table
        $sql = "CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            subtitle VARCHAR(255) NULL,
            description TEXT NOT NULL,
            tagline VARCHAR(500) NULL,
            main_image VARCHAR(255) NULL,
            gallery_images TEXT NULL,
            features_section_title VARCHAR(255) NULL,
            features_section_subtitle VARCHAR(255) NULL,
            meta_title VARCHAR(255) NULL,
            meta_description TEXT NULL,
            slug VARCHAR(191) UNIQUE NULL,
            status ENUM('active', 'inactive') DEFAULT 'active',
            display_order INT DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        
        $pdo->exec($sql);
        
        // Create product_features table for the 'Why Choose' section
        $sql = "CREATE TABLE IF NOT EXISTS product_features (
            id INT AUTO_INCREMENT PRIMARY KEY,
            product_id INT NOT NULL,
            title VARCHAR(255) NOT NULL,
            description TEXT NOT NULL,
            icon VARCHAR(255) NULL,
            display_order INT DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
        )";
        
        $pdo->exec($sql);
        
        // Check if admin user exists (no hardcoded credentials)
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE role = 'admin'");
        $stmt->execute();
        
        if ($stmt->fetchColumn() == 0) {
            // No admin user exists - this should be created manually or through a setup script
            error_log("No admin user found. Please create an admin user manually.");
        }
        
        return true;
    } catch(PDOException $e) {
        handleDatabaseError($e, 'database initialization');
        return false;
    }
}

// Session management
function startSecureSession() {
    if (session_status() == PHP_SESSION_NONE) {
        ini_set('session.cookie_httponly', 1);
        ini_set('session.use_only_cookies', 1);
        ini_set('session.cookie_secure', 0); // Set to 1 for HTTPS
        session_start();
    }
}

// Check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

// Get current user data
function getCurrentUser() {
    if (!isLoggedIn()) {
        return null;
    }
    
    try {
        $pdo = getDBConnection();
        $stmt = $pdo->prepare("SELECT id, name, email, username, role FROM users WHERE id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return null;
    }
}

// Redirect to login if not authenticated
function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: ./admin/login');
        exit();
    }
}

// Redirect to dashboard if already logged in
function redirectIfLoggedIn() {
    if (isLoggedIn()) {
        header('Location: ./admin/dashboard');
        exit();
    }
}

// Set timezone to match database
date_default_timezone_set('Asia/Colombo');

// Initialize database on include
initializeDatabase();
startSecureSession();
?>
