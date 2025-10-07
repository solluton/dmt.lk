<?php
// Global Navbar Component
// Usage: include 'includes/navbar-global.php';

// Include URL helper if not already included
if (!function_exists('url')) {
    require_once __DIR__ . '/../config/url_helper.php';
}

// Include company helper if not already included
if (!function_exists('getCompanyEmail')) {
    require_once __DIR__ . '/../config/company_helper.php';
}

// Get current page for active state
$current_page = basename($_SERVER['PHP_SELF'], '.php');
$current_path = $_SERVER['REQUEST_URI'];

// Get base URL for comparison
$base_url = getBaseUrl();
$base_path = parse_url($base_url, PHP_URL_PATH) ?: '';

// Determine active states
$is_home = ($current_page === 'index' || $current_path === '/' || $current_path === $base_path . '/' || $current_path === $base_path);
$is_about = (strpos($current_path, '/about-us') !== false || $current_page === 'about-us');
$is_products = (strpos($current_path, '/our-products') !== false || strpos($current_path, '/product') !== false || $current_page === 'our-products');
$is_contact = (strpos($current_path, '/contact-us') !== false || $current_page === 'contact-us');
?>

<div data-collapse="medium" data-animation="default" data-duration="400" fs-scrolldisable-element="smart-nav" data-easing="ease" data-easing2="ease" role="banner" class="navbar1_component color-scheme-6 w-nav">
  <div class="navbar1_container">
    <a href="<?= url() ?>" class="navbar1_logo-link w-nav-brand <?= $is_home ? 'w--current' : '' ?>">
      <img loading="lazy" src="<?= asset('images/DMT-LOGO-Main.avif') ?>" alt="DMT Logo" class="navbar1_logo">
    </a>
    <nav role="navigation" class="navbar1_menu is-page-height-tablet w-nav-menu">
      <div class="navbar1_menu-links">
        <a href="<?= url() ?>" class="navbar1_link is-mobile-animation w-nav-link <?= $is_home ? 'w--current' : '' ?>">Home</a>
        <a href="<?= url('about-us') ?>" class="navbar1_link is-mobile-animation w-nav-link <?= $is_about ? 'w--current' : '' ?>">About</a>
        <a href="<?= url('our-products') ?>" class="navbar1_link is-mobile-animation w-nav-link <?= $is_products ? 'w--current' : '' ?>">Products</a>
        <a href="<?= url('contact-us') ?>" class="navbar1_link is-mobile-animation w-nav-link <?= $is_contact ? 'w--current' : '' ?>">Contact</a>
      </div>
      <div class="navbar1_menu-buttons">
        <a href="<?= url('contact-us') ?>" class="button is-small w-button">ORDER NOW</a>
      </div>
    </nav>
    <div class="navbar1_menu-button w-nav-button">
      <div class="menu-icon1">
        <div class="menu-icon1_line-top"></div>
        <div class="menu-icon1_line-middle">
          <div class="menu-icon1_line-middle-inner"></div>
        </div>
        <div class="menu-icon1_line-bottom"></div>
      </div>
    </div>
  </div>
</div>
