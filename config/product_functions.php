<?php
/**
 * Product management functions
 */

function getProductBySlug($slug) {
    try {
        $pdo = getDBConnection();
        $stmt = $pdo->prepare("SELECT * FROM products WHERE slug = ? AND status = 'active'");
        $stmt->execute([$slug]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return null;
    }
}

function getProductById($id) {
    try {
        $pdo = getDBConnection();
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ? AND status = 'active'");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return null;
    }
}

function getDefaultProduct() {
    try {
        $pdo = getDBConnection();
        $stmt = $pdo->query("SELECT * FROM products WHERE status = 'active' ORDER BY display_order ASC, created_at DESC LIMIT 1");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return null;
    }
}

function getProductFeatures($productId) {
    try {
        $pdo = getDBConnection();
        $stmt = $pdo->prepare("SELECT * FROM product_features WHERE product_id = ? ORDER BY display_order ASC");
        $stmt->execute([$productId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return [];
    }
}

function getAllActiveProducts() {
    try {
        $pdo = getDBConnection();
        $stmt = $pdo->query("SELECT * FROM products WHERE status = 'active' ORDER BY display_order ASC, created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return [];
    }
}

// Generate SEO-friendly meta data
function generateProductMeta($product) {
    if (!$product) {
        return [
            'title' => 'DMT Softball Cricket Ball | Best Softball Cricket Gear in Sri Lanka',
            'description' => 'Experience the DMT softball cricket ball—Sri Lanka\'s #1 choice for quality, performance, and affordability. Manufactured to international standards.',
            'og_title' => 'DMT Softball Cricket Ball | Best Softball Cricket Gear in Sri Lanka',
            'og_description' => 'Experience the DMT softball cricket ball—Sri Lanka\'s #1 choice for quality, performance, and affordability.'
        ];
    }
    
    return [
        'title' => $product['meta_title'] ?: $product['title'] . ' | DMT Cricket',
        'description' => $product['meta_description'] ?: substr($product['description'], 0, 160),
        'og_title' => $product['meta_title'] ?: $product['title'] . ' | DMT Cricket',
        'og_description' => $product['meta_description'] ?: substr($product['description'], 0, 160)
    ];
}

// Parse gallery images string into array
function parseGalleryImages($galleryString) {
    if (empty($galleryString)) {
        return [];
    }
    return array_map('trim', explode(',', $galleryString));
}
?>
