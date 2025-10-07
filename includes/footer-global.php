<?php
// Global Footer Component
// Usage: include 'includes/footer-global.php';

// Include URL helper if not already included
if (!function_exists('url')) {
    require_once __DIR__ . '/../config/url_helper.php';
}

// Include company helper if not already included
if (!function_exists('getCompanyEmail')) {
    require_once __DIR__ . '/../config/company_helper.php';
}

// Ensure products array is available
if (!isset($products)) {
    try {
        require_once 'config/database.php';
        $pdo = getDBConnection();
        $stmt = $pdo->prepare("SELECT * FROM products WHERE status = 'active' ORDER BY display_order ASC, created_at ASC");
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        $products = [];
        error_log("Error fetching products for footer: " . $e->getMessage());
    }
}

// Get current page for active state
$current_page = basename($_SERVER['PHP_SELF'], '.php');
$current_path = $_SERVER['REQUEST_URI'];

// Determine active states
$is_home = ($current_page === 'index' || $current_path === '/' || $current_path === '/dmt.lk/' || $current_path === '/dmt.lk');
$is_about = (strpos($current_path, '/about-us') !== false || $current_page === 'about-us');
$is_products = (strpos($current_path, '/our-products') !== false || strpos($current_path, '/product') !== false || $current_page === 'our-products');
$is_contact = (strpos($current_path, '/contact-us') !== false || $current_page === 'contact-us');
?>

<footer class="footer1_component color-scheme-1">
  <div class="padding-global">
    <div class="container-large">
      <div class="padding-vertical padding-xxlarge">
        <div class="padding-bottom padding-xxlarge">
          <div class="w-layout-grid footer1_top-wrapper">
            <div class="footer1_left-wrapper">
              <div class="margin-bottom margin-small">
                <a href="<?= url() ?>" class="footer1_logo-link w-nav-brand">
                  <img loading="lazy" src="<?= asset('images/DMT-LOGO-Main.avif') ?>" alt="DMT Logo" class="footer1_logo">
                </a>
              </div>
              <div class="margin-bottom margin-small">
                <div>Sri Lanka's premier softball cricket gear brand. Built for performance, durability, and affordability.</div>
              </div>
            </div>
            <div class="w-layout-grid footer1_menu-wrapper">
              <div class="footer1_link-column">
                <div class="margin-bottom margin-xsmall">
                  <div class="footer-menu-titile">Quick Links</div>
                </div>
                <div class="footer1_link-list">
                  <a href="<?= url() ?>" class="footer1_link <?= $is_home ? 'w--current' : '' ?>">Home</a>
                  <a href="<?= url('about-us') ?>" class="footer1_link <?= $is_about ? 'w--current' : '' ?>">About</a>
                  <a href="<?= url('our-products') ?>" class="footer1_link <?= $is_products ? 'w--current' : '' ?>">Products</a>
                  <a href="<?= url('contact-us') ?>" class="footer1_link <?= $is_contact ? 'w--current' : '' ?>">Contact</a>
                </div>
              </div>
              <div class="footer1_link-column">
                <div class="margin-bottom margin-xsmall">
                  <div class="footer-menu-titile">Products</div>
                </div>
                <div class="footer1_link-list">
                  <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                      <?php 
                      // Use title_black + title_green if available, otherwise use title
                      $displayTitle = !empty($product['title_black']) ? 
                        $product['title_black'] . ' ' . $product['title_green'] : 
                        $product['title'];
                      ?>
                      <a href="<?= productUrl($product['slug']) ?>" class="footer1_link"><?= htmlspecialchars($displayTitle) ?></a>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <!-- Fallback links when no products are available -->
                        <a href="<?= productUrl('cricket-softball') ?>" class="footer1_link">DMT Cricket Softball</a>
                        <a href="<?= productUrl('cricket-bat') ?>" class="footer1_link">DMT Cricket Bat</a>
                        <a href="<?= productUrl('cricket-gloves') ?>" class="footer1_link">DMT Cricket Gloves</a>
                  <?php endif; ?>
                </div>
              </div>
              <div class="footer1_link-column">
                <div class="margin-bottom margin-xsmall">
                  <div class="footer-menu-titile">Contact Info</div>
                </div>
                <div class="footer1_link-list">
                  <a href="<?= getCompanyPhoneHref() ?>" class="footer1_social-link w-inline-block">
                    <img src="<?= asset('images/Phone.avif') ?>" loading="lazy" alt="Phone" class="icon-embed-xsmall">
                    <div class="conatct-info"><?= getCompanyPhone() ?></div>
                  </a>
                  <a href="<?= getCompanyEmailHref() ?>" class="footer1_social-link w-inline-block">
                    <img src="<?= asset('images/Email.avif') ?>" loading="lazy" alt="Email" class="icon-embed-xsmall">
                    <div class="conatct-info"><?= getCompanyEmail() ?></div>
                  </a>
                  <a href="<?= getFacebookUrl() ?>" class="footer1_social-link w-inline-block" target="_blank">
                    <div class="icon-embed-xsmall w-embed">
                      <svg width="100%" height="100%" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22 12.0611C22 6.50451 17.5229 2 12 2C6.47715 2 2 6.50451 2 12.0611C2 17.0828 5.65684 21.2452 10.4375 22V14.9694H7.89844V12.0611H10.4375V9.84452C10.4375 7.32296 11.9305 5.93012 14.2146 5.93012C15.3088 5.93012 16.4531 6.12663 16.4531 6.12663V8.60261H15.1922C13.95 8.60261 13.5625 9.37822 13.5625 10.1739V12.0611H16.3359L15.8926 14.9694H13.5625V22C18.3432 21.2452 22 17.083 22 12.0611Z" fill="CurrentColor"></path>
                      </svg>
                    </div>
                    <div class="conatct-info">Facebook</div>
                  </a>
                  <a href="<?= getInstagramUrl() ?>" class="footer1_social-link w-inline-block" target="_blank">
                    <div class="icon-embed-xsmall w-embed">
                      <svg width="100%" height="100%" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M16 3H8C5.23858 3 3 5.23858 3 8V16C3 18.7614 5.23858 21 8 21H16C18.7614 21 21 18.7614 21 16V8C21 5.23858 18.7614 3 16 3ZM19.25 16C19.2445 17.7926 17.7926 19.2445 16 19.25H8C6.20735 19.2445 4.75549 17.7926 4.75 16V8C4.75549 6.20735 6.20735 4.75549 8 4.75H16C17.7926 4.75549 19.2445 6.20735 19.25 8V16ZM16.75 8.25C17.3023 8.25 17.75 7.80228 17.75 7.25C17.75 6.69772 17.3023 6.25 16.75 6.25C16.1977 6.25 15.75 6.69772 15.75 7.25C15.75 7.80228 16.1977 8.25 16.75 8.25ZM12 7.5C9.51472 7.5 7.5 9.51472 7.5 12C7.5 14.4853 9.51472 16.5 12 16.5C14.4853 16.5 16.5 14.4853 16.5 12C16.5027 10.8057 16.0294 9.65957 15.1849 8.81508C14.3404 7.97059 13.1943 7.49734 12 7.5ZM9.25 12C9.25 13.5188 10.4812 14.75 12 14.75C13.5188 14.75 14.75 13.5188 14.75 12C14.75 10.4812 13.5188 9.25 12 9.25C10.4812 9.25 9.25 10.4812 9.25 12Z" fill="CurrentColor"></path>
                      </svg>
                    </div>
                    <div class="conatct-info">Instagram</div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="divider-horizontal"></div>
        <div class="padding-top padding-medium">
          <div class="footer1_bottom-wrapper">
            <div class="footer1_credit-text">© 2025 DMT - Dimath Sports (Private) Limited. All rights reserved.</div>
            <div class="w-layout-grid footer1_legal-list">
              <a href="<?= url('privacy-policies') ?>" class="footer1_legal-link">Privacy Policy</a>
              <a href="<?= url('terms-conditions') ?>" class="footer1_legal-link">Terms & Conditions</a>
              <a href="https://solluton.com" target="_blank" class="footer1_legal-link">A website by Solluton</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- Global Scripts -->
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=68ac3916626e46cbd1a97ae5" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="<?= asset('js/webflow.js') ?>" type="text/javascript"></script>