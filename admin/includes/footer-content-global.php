<?php
// Global footer component for admin pages
// This file should be included in all admin pages for consistency

// Determine the correct path prefix based on current directory
$is_admin_page = strpos($_SERVER['PHP_SELF'], '/admin/') !== false;
$path_prefix = $is_admin_page ? '../' : '';
?>

      <!-- Footer -->
      <footer class="edash-footer-container d-flex align-items-center justify-content-between p-4 ht-64 bg-body-tertiary" id="edash-footer-container">
        <div class="hstack gap-1">
          <span class="text-muted">© 2025 DMT.LK All rights reserved</span>
        </div>
        <div class="d-flex align-items-center gap-3">
          <a href="<?= $path_prefix ?>privacy-policies.php" class="text-muted text-decoration-none" style="transition: color 0.3s ease;" onmouseover="this.style.color='#0d6efd'" onmouseout="this.style.color='#6c757d'">Privacy Policy</a>
          <a href="<?= $path_prefix ?>terms-conditions.php" class="text-muted text-decoration-none" style="transition: color 0.3s ease;" onmouseover="this.style.color='#0d6efd'" onmouseout="this.style.color='#6c757d'">Terms & Conditions</a>
          <a href="https://solluton.com" target="_blank" class="text-muted text-decoration-none" style="transition: color 0.3s ease;" onmouseover="this.style.color='#0d6efd'" onmouseout="this.style.color='#6c757d'">A website by Solluton</a>
        </div>
      </footer>
