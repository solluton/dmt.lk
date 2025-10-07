<?php
// Global sidebar component for admin pages
// This file should be included in all admin pages for consistency
// Make sure $user variable is available from the calling page

// Get current page name for active state
$current_page = basename($_SERVER['PHP_SELF']);

// Determine the correct path prefix based on current directory
$is_admin_page = strpos($_SERVER['PHP_SELF'], '/admin/') !== false;
$path_prefix = $is_admin_page ? '../' : '';
?>

<!-- Main Menu -->
<aside class="edash-menu position-fixed z-1030 start-0 top-0 end-0 bottom-0 bg-body-tertiary border-end" id="edash-menu">
  <!-- Logo -->
  <div class="edash-menu-header ht-80 d-flex align-items-center px-4 py-4 position-relative">
    <a href="<?= $path_prefix ?>admin/dashboard.php" class="edash-logo">
      <img src="<?= $path_prefix ?>images/DMT-LOGO-Main.avif" alt="DMT Cricket" class="img-fluid edash-logo-main" style="max-width: 150px;" />
    </a>
  </div>
  
  <!-- Sidebar Nav -->
  <nav class="edash-sidebar-nav position-relative z-2" id="edash-sidebar-nav" style="height: calc(100vh - 5rem)">
    <ul class="edash-metismenu" id="edash-metismenu">
      <li class="nav-label mb-2 mt-4 px-6 fs-11 fw-semibold text-muted text-uppercase" style="letter-spacing: 1px">
        Main Menu
      </li>
      <li class="<?= ($current_page == 'dashboard.php') ? 'mm-active' : '' ?>">
        <a href="<?= $path_prefix ?>admin/dashboard.php">
          <i class="fi fi-rr-dashboard"></i>
          <span class="mm-text">Dashboard</span>
        </a>
      </li>
      
      <li class="nav-label mb-2 mt-4 px-6 fs-11 fw-semibold text-muted text-uppercase" style="letter-spacing: 1px">
        Content Management
      </li>
      <li class="<?= (in_array($current_page, ['products.php', 'product-create.php', 'product-edit.php'])) ? 'mm-active' : '' ?>">
        <a class="has-arrow" href="javascript:void(0);">
          <i class="fi fi-rr-cricket"></i>
          <span class="mm-text">Products</span>
        </a>
        <ul>
          <li><a class="sub-menu <?= ($current_page == 'products.php') ? 'mm-active' : '' ?>" href="<?= $path_prefix ?>admin/products.php">All Products</a></li>
          <li><a class="sub-menu <?= ($current_page == 'product-create.php') ? 'mm-active' : '' ?>" href="<?= $path_prefix ?>admin/product-create.php">Create Product</a></li>
        </ul>
      </li>
      
      <li class="nav-label mb-2 mt-4 px-6 fs-11 fw-semibold text-muted text-uppercase" style="letter-spacing: 1px">
        Communication
      </li>
      <li class="<?= ($current_page == 'contact-leads.php') ? 'mm-active' : '' ?>">
        <a href="<?= $path_prefix ?>admin/contact-leads.php">
          <i class="fi fi-rr-envelope"></i>
          <span class="mm-text">Contact Leads</span>
        </a>
      </li>
      <li class="<?= ($current_page == 'email-queue.php') ? 'mm-active' : '' ?>">
        <a href="<?= $path_prefix ?>admin/email-queue.php">
          <i class="fi fi-rr-clock"></i>
          <span class="mm-text">Email Queue</span>
        </a>
      </li>
      
      <li class="nav-label mb-2 mt-4 px-6 fs-11 fw-semibold text-muted text-uppercase" style="letter-spacing: 1px">
        System
      </li>
      <li class="<?= (in_array($current_page, ['settings.php', 'slug-redirects.php', 'legal-pages.php', 'custom-scripts.php'])) ? 'mm-active' : '' ?>">
        <a class="has-arrow" href="javascript:void(0);">
          <i class="fi fi-rr-settings"></i>
          <span class="mm-text">Settings</span>
        </a>
        <ul>
          <li><a class="sub-menu <?= ($current_page == 'settings.php') ? 'mm-active' : '' ?>" href="<?= $path_prefix ?>admin/settings.php">General Settings</a></li>
          <li><a class="sub-menu <?= ($current_page == 'slug-redirects.php') ? 'mm-active' : '' ?>" href="<?= $path_prefix ?>admin/slug-redirects.php">URL Redirects</a></li>
          <li><a class="sub-menu <?= ($current_page == 'legal-pages.php') ? 'mm-active' : '' ?>" href="<?= $path_prefix ?>admin/legal-pages.php">Legal Pages</a></li>
          <li><a class="sub-menu <?= ($current_page == 'custom-scripts.php') ? 'mm-active' : '' ?>" href="<?= $path_prefix ?>admin/custom-scripts.php">Custom Scripts</a></li>
        </ul>
      </li>
      <li class="<?= ($current_page == 'profile.php') ? 'mm-active' : '' ?>">
        <a href="<?= $path_prefix ?>admin/profile.php">
          <i class="fi fi-rr-user"></i>
          <span class="mm-text">Profile</span>
        </a>
      </li>
    </ul>
  </nav>
</aside>
