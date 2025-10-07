<?php
/**
 * Redirect Management Functions
 * Handles both blog and product redirects
 */

require_once __DIR__ . '/database.php';

/**
 * Create or update a redirect entry
 * @param string $old_slug The old slug
 * @param string $new_slug The new slug
 * @param string $type 'blog' or 'product'
 * @param int $item_id The ID of the blog post or product
 * @return bool Success status
 */
function createOrUpdateRedirect($old_slug, $new_slug, $type, $item_id) {
    try {
        $pdo = getDBConnection();
        
        // Check if redirect already exists
        $stmt = $pdo->prepare("
            SELECT id FROM slug_redirects 
            WHERE old_slug = ? AND redirect_type = ?
        ");
        $stmt->execute([$old_slug, $type]);
        $existing = $stmt->fetch();
        
        if ($existing) {
            // Update existing redirect
            $stmt = $pdo->prepare("
                UPDATE slug_redirects 
                SET new_slug = ?, " . ($type == 'blog' ? 'post_id' : 'product_id') . " = ?, created_at = NOW()
                WHERE id = ?
            ");
            return $stmt->execute([$new_slug, $item_id, $existing['id']]);
        } else {
            // Create new redirect
            $stmt = $pdo->prepare("
                INSERT INTO slug_redirects (old_slug, new_slug, redirect_type, " . ($type == 'blog' ? 'post_id' : 'product_id') . ", created_at)
                VALUES (?, ?, ?, ?, NOW())
            ");
            return $stmt->execute([$old_slug, $new_slug, $type, $item_id]);
        }
    } catch (Exception $e) {
        error_log("Error creating redirect: " . $e->getMessage());
        return false;
    }
}

/**
 * Delete redirects for a specific item
 * @param int $item_id The ID of the blog post or product
 * @param string $type 'blog' or 'product'
 * @return bool Success status
 */
function deleteRedirectsForItem($item_id, $type) {
    try {
        $pdo = getDBConnection();
        $column = $type == 'blog' ? 'post_id' : 'product_id';
        
        $stmt = $pdo->prepare("
            DELETE FROM slug_redirects 
            WHERE $column = ? AND redirect_type = ?
        ");
        return $stmt->execute([$item_id, $type]);
    } catch (Exception $e) {
        error_log("Error deleting redirects: " . $e->getMessage());
        return false;
    }
}

/**
 * Handle product slug change
 * @param int $product_id The product ID
 * @param string $old_slug The old slug
 * @param string $new_slug The new slug
 * @return bool Success status
 */
function handleProductSlugChange($product_id, $old_slug, $new_slug) {
    if ($old_slug && $new_slug && $old_slug !== $new_slug) {
        return createOrUpdateRedirect($old_slug, $new_slug, 'product', $product_id);
    }
    return true;
}

/**
 * Handle product deletion
 * @param int $product_id The product ID
 * @return bool Success status
 */
function handleProductDeletion($product_id) {
    return deleteRedirectsForItem($product_id, 'product');
}

/**
 * Handle blog post slug change
 * @param int $post_id The post ID
 * @param string $old_slug The old slug
 * @param string $new_slug The new slug
 * @return bool Success status
 */
function handleBlogSlugChange($post_id, $old_slug, $new_slug) {
    if ($old_slug && $new_slug && $old_slug !== $new_slug) {
        return createOrUpdateRedirect($old_slug, $new_slug, 'blog', $post_id);
    }
    return true;
}

/**
 * Handle blog post deletion
 * @param int $post_id The post ID
 * @return bool Success status
 */
function handleBlogDeletion($post_id) {
    return deleteRedirectsForItem($post_id, 'blog');
}
?>
