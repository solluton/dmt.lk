<?php
require_once 'config/database.php';
require_once 'config/url_helper.php';
require_once 'config/company_helper.php';

// Get product slug or ID from URL
$product_slug = $_GET['slug'] ?? null;
$product_id = $_GET['id'] ?? null;

// Check for redirects first
if ($product_slug) {
    try {
        $pdo = getDBConnection();
        $stmt = $pdo->prepare("
            SELECT new_slug FROM slug_redirects 
            WHERE old_slug = ? AND redirect_type = 'product'
        ");
        $stmt->execute([$product_slug]);
        $redirect_info = $stmt->fetch();
        
        if ($redirect_info) {
            // Get the current URL structure to build correct redirect
            $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
            $host = $_SERVER['HTTP_HOST'];
            $script_name = dirname($_SERVER['SCRIPT_NAME']);
            
            // Build the correct redirect URL
            $new_url = $protocol . '://' . $host . $script_name . '/product/' . $redirect_info['new_slug'];
            header('Location: ' . $new_url, true, 301); // 301 permanent redirect
            exit;
        }
    } catch (Exception $e) {
        error_log("Redirect check error: " . $e->getMessage());
    }
}

try {
    $pdo = getDBConnection();
    
    // Fetch all active products for footer
    $stmt = $pdo->prepare("SELECT * FROM products WHERE status = 'active' ORDER BY display_order ASC, created_at ASC");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $product = null;
    
    // Get product by slug or ID, or show default product
    if (!empty($product_slug)) {
        // Get product by slug
        $stmt = $pdo->prepare("SELECT * FROM products WHERE slug = ? AND status = 'active'");
        $stmt->execute([$product_slug]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // If slug doesn't exist, return 404
        if (!$product) {
            http_response_code(404);
            include '404.php';
            exit();
        }
    } elseif (is_numeric($product_id)) {
        // Get product by ID
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ? AND status = 'active'");
        $stmt->execute([$product_id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // If ID doesn't exist, return 404
        if (!$product) {
            http_response_code(404);
            include '404.php';
            exit();
        }
    } else {
        // No slug or ID provided, return 404
        http_response_code(404);
        include '404.php';
        exit();
    }
    
    // Parse JSON data
    $features = json_decode($product['features_json'] ?? '[]', true) ?: [];
    
    // Ensure we have 6 features (pad with empty if needed)
    while (count($features) < 6) {
        $features[] = ['title' => '', 'description' => ''];
    }
    
} catch (Exception $e) {
    // Fallback if database fails
    error_log("Error fetching product: " . $e->getMessage());
    $product = [
        'title' => 'DMT Cricket Softball',
        'title_black' => 'DMT Cricket',
        'title_green' => 'Softball',
        'subtitle' => '"The Ball That Never Quits"',
        'description' => 'Experience the best cricket ball in Sri Lanka.',
        'main_image' => 'images/dmt_1.avif',
        'why_choose_title_black' => 'Why Choose DMT',
        'why_choose_title_green' => 'Cricket Softball?',
        'why_choose_subtitle' => 'Engineered for champions',
        'meta_title' => 'DMT Cricket Ball',
        'meta_description' => 'Sri Lanka\'s premier cricket ball'
    ];
    $features = [];
    $products = [];
}

// Set page meta data
$page_title = $product['meta_title'] ?? $product['title'];
$page_description = $product['meta_description'] ?? $product['description'];
?>
<!DOCTYPE html><!--  This site was created in Webflow. https://webflow.com  --><!--  Last Published: Fri Oct 03 2025 05:25:13 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="68ac3ef6e77757623453c016" data-wf-site="68ac3916626e46cbd1a97ae5">
<head>
  <meta charset="utf-8">
  <title><?php echo htmlspecialchars($page_title); ?></title>
  <meta content="<?php echo htmlspecialchars($page_description); ?>" name="description">
  <meta content="<?php echo htmlspecialchars($page_title); ?>" property="og:title">
  <meta content="<?php echo htmlspecialchars($page_description); ?>" property="og:description">
  <meta content="<?php echo htmlspecialchars($page_title); ?>" property="twitter:title">
  <meta content="<?php echo htmlspecialchars($page_description); ?>" property="twitter:description">
  <meta property="og:type" content="website">
  <meta content="summary_large_image" name="twitter:card">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="/dmt.lk/css/normalize.css" rel="stylesheet" type="text/css">
  <link href="/dmt.lk/css/webflow.css" rel="stylesheet" type="text/css">
  <link href="/dmt.lk/css/dmt-lk.webflow.css" rel="stylesheet" type="text/css">
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="/dmt.lk/images/favicon.png" rel="shortcut icon" type="image/x-icon">
  <link href="/dmt.lk/images/webclip.png" rel="apple-touch-icon"><!--  Keep this css code to improve the font quality -->
        <style>
        * {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        -o-font-smoothing: antialiased;
        }
        
        /* Fix button text color in color schemes */
        .color-scheme-5 .button,
        .color-scheme-5 .button.w-button {
          color: var(--color-scheme-1--text) !important;
        }
        
        .color-scheme-8 .button,
        .color-scheme-8 .button.w-button {
          color: var(--color-scheme-1--text) !important;
        }
        </style>
</head>
<body>
  <div class="page-wrapper">
    <div class="global-styles">
      <div class="style-overrides w-embed">
        <style>
/* Ensure all elements inherit the color from its parent */
a,
.w-input,
.w-select,
.w-tab-link,
.w-nav-link:not(.navbar1_link),
.w-nav-brand,
.w-dropdown-btn,
.w-dropdown-toggle,
.w-slider-arrow-left,
.w-slider-arrow-right,
.w-dropdown-link {
  color: inherit;
  text-decoration: inherit;
  font-size: inherit;
}
/* Focus state style for keyboard navigation for the focusable elements */
*[tabindex]:focus-visible,
  input[type="file"]:focus-visible {
   outline: 0.125rem solid #4d65ff;
   outline-offset: 0.125rem;
}
/* Get rid of top margin on first element in any rich text element */
.w-richtext > :not(div):first-child, .w-richtext > div:first-child > :first-child {
  margin-top: 0 !important;
}
/* Get rid of bottom margin on last element in any rich text element */
.w-richtext>:last-child, .w-richtext ol li:last-child, .w-richtext ul li:last-child {
	margin-bottom: 0 !important;
}
/* Prevent all click and hover interaction with an element */
.pointer-events-off {
	pointer-events: none;
}
/* Enables all click and hover interaction with an element */
.pointer-events-on {
  pointer-events: auto;
}
/* Create a class of .div-square which maintains a 1:1 dimension of a div */
.div-square::after {
	content: "";
	display: block;
	padding-bottom: 100%;
}
/* Make sure containers never lose their center alignment */
.container-medium,.container-small, .container-large {
	margin-right: auto !important;
  margin-left: auto !important;
}
/* Apply "..." after 3 lines of text */
.text-style-3lines {
	display: -webkit-box;
	overflow: hidden;
	-webkit-line-clamp: 3;
	-webkit-box-orient: vertical;
}
/* Apply "..." after 2 lines of text */
.text-style-2lines {
	display: -webkit-box;
	overflow: hidden;
	-webkit-line-clamp: 2;
	-webkit-box-orient: vertical;
}
/* Adds inline flex display */
.display-inlineflex {
  display: inline-flex;
}
/* These classes are never overwritten */
.hide {
  display: none !important;
}
/* Remove default Webflow chevron from form select */
select{
  -webkit-appearance:none;
}
@media screen and (max-width: 991px) {
    .hide, .hide-tablet {
        display: none !important;
    }
}
  @media screen and (max-width: 767px) {
    .hide-mobile-landscape{
      display: none !important;
    }
}
  @media screen and (max-width: 479px) {
    .hide-mobile{
      display: none !important;
    }
}
.margin-0 {
  margin: 0rem !important;
}
.padding-0 {
  padding: 0rem !important;
}
.spacing-clean {
padding: 0rem !important;
margin: 0rem !important;
}
.margin-top {
  margin-right: 0rem !important;
  margin-bottom: 0rem !important;
  margin-left: 0rem !important;
}
.padding-top {
  padding-right: 0rem !important;
  padding-bottom: 0rem !important;
  padding-left: 0rem !important;
}
.margin-right {
  margin-top: 0rem !important;
  margin-bottom: 0rem !important;
  margin-left: 0rem !important;
}
.padding-right {
  padding-top: 0rem !important;
  padding-bottom: 0rem !important;
  padding-left: 0rem !important;
}
.margin-bottom {
  margin-top: 0rem !important;
  margin-right: 0rem !important;
  margin-left: 0rem !important;
}
.padding-bottom {
  padding-top: 0rem !important;
  padding-right: 0rem !important;
  padding-left: 0rem !important;
}
.margin-left {
  margin-top: 0rem !important;
  margin-right: 0rem !important;
  margin-bottom: 0rem !important;
}
.padding-left {
  padding-top: 0rem !important;
  padding-right: 0rem !important;
  padding-bottom: 0rem !important;
}
.margin-horizontal {
  margin-top: 0rem !important;
  margin-bottom: 0rem !important;
}
.padding-horizontal {
  padding-top: 0rem !important;
  padding-bottom: 0rem !important;
}
.margin-vertical {
  margin-right: 0rem !important;
  margin-left: 0rem !important;
}
.padding-vertical {
  padding-right: 0rem !important;
  padding-left: 0rem !important;
}
/* Apply "..." at 100% width */
.truncate-width { 
		width: 100%; 
    white-space: nowrap; 
    overflow: hidden; 
    text-overflow: ellipsis; 
}
/* Removes native scrollbar */
.no-scrollbar {
    -ms-overflow-style: none;
    overflow: -moz-scrollbars-none; 
}
.no-scrollbar::-webkit-scrollbar {
    display: none;
}
</style>
      </div>
      <div class="fonts w-embed">
        <style>@import url('https://fonts.googleapis.com/css?family=Anton:400')</style>
        <style>@import url('https://fonts.googleapis.com/css?family=Inter:400,500')</style>
      </div>
      <div class="color-schemes w-embed">
        <style>
.color-scheme-1 {}
  .color-scheme-2 {
    --color-scheme-1--text: var(--color-scheme-2--text);
    --color-scheme-1--background: var(--color-scheme-2--background);
    --color-scheme-1--foreground: var(--color-scheme-2--foreground);
    --color-scheme-1--border: var(--color-scheme-2--border);
    --color-scheme-1--accent: var(--color-scheme-2--accent);
  }
  .color-scheme-3 {
    --color-scheme-1--text: var(--color-scheme-3--text);
    --color-scheme-1--background: var(--color-scheme-3--background);
    --color-scheme-1--foreground: var(--color-scheme-3--foreground);
    --color-scheme-1--border: var(--color-scheme-3--border);
    --color-scheme-1--accent: var(--color-scheme-3--accent);
  }
  .color-scheme-4 {
    --color-scheme-1--text: var(--color-scheme-4--text);
    --color-scheme-1--background: var(--color-scheme-4--background);
    --color-scheme-1--foreground: var(--color-scheme-4--foreground);
    --color-scheme-1--border: var(--color-scheme-4--border);
    --color-scheme-1--accent: var(--color-scheme-4--accent);
  }
  .color-scheme-5 {
    --color-scheme-1--text: var(--color-scheme-5--text);
    --color-scheme-1--background: var(--color-scheme-5--background);
    --color-scheme-1--foreground: var(--color-scheme-5--foreground);
    --color-scheme-1--border: var(--color-scheme-5--border);
    --color-scheme-1--accent: var(--color-scheme-5--accent);
  }
  .color-scheme-6 {
    --color-scheme-1--text: var(--color-scheme-6--text);
    --color-scheme-1--background: var(--color-scheme-6--background);
    --color-scheme-1--foreground: var(--color-scheme-6--foreground);
    --color-scheme-1--border: var(--color-scheme-6--border);
    --color-scheme-1--accent: var(--color-scheme-6--accent);
  }
  .color-scheme-7 {
    --color-scheme-1--text: var(--color-scheme-7--text);
    --color-scheme-1--background: var(--color-scheme-7--background);
    --color-scheme-1--foreground: var(--color-scheme-7--foreground);
    --color-scheme-1--border: var(--color-scheme-7--border);
    --color-scheme-1--accent: var(--color-scheme-7--accent);
  }
  .color-scheme-8 {
    --color-scheme-1--text: var(--color-scheme-8--text);
    --color-scheme-1--background: var(--color-scheme-8--background);
    --color-scheme-1--foreground: var(--color-scheme-8--foreground);
    --color-scheme-1--border: var(--color-scheme-8--border);
    --color-scheme-1--accent: var(--color-scheme-8--accent);
  }
.w-slider-dot {
  background-color: var(--color-scheme-1--text);
  opacity: 0.20;
}
.w-slider-dot.w-active {
  background-color: var(--color-scheme-1--text);
  opacity: 1;
}
/* Override .w-slider-nav-invert styles */
.w-slider-nav-invert .w-slider-dot {
  background-color: var(--color-scheme-1--text) !important;
  opacity: 0.20 !important;
}
.w-slider-nav-invert .w-slider-dot.w-active {
  background-color: var(--color-scheme-1--text) !important;
  opacity: 1 !important;
}
</style>
      </div>
    </div>
    <?php include 'includes/navbar-global.php'; ?>
    <main class="main-wrapper">
      <section class="section_layout1 color-scheme-6">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="layout1_component">
                <div class="w-layout-grid layout1_content">
                  <div class="layout1_content-left">
                    <div class="margin-bottom margin-small">
                      <h2 data-w-id="7ce207f1-4f29-2d49-14c5-5a1554d042a2" style="opacity:0" class="heading-style-h1">
                        <?php echo htmlspecialchars($product['title_black'] ?? ''); ?> 
                        <?php if (!empty($product['title_green'])): ?>
                          <span class="text-color-primery-dark"><?php echo htmlspecialchars($product['title_green']); ?></span>
                        <?php endif; ?>
                      </h2>
                    </div>
                    <?php if (!empty($product['subtitle'])): ?>
                    <div class="margin-bottom margin-small">
                      <p data-w-id="7ce207f1-4f29-2d49-14c5-5a1554d042a4" style="opacity:0" class="text-size-medium">
                        "<?php echo htmlspecialchars($product['subtitle']); ?>"
                      </p>
                    </div>
                    <?php endif; ?>
                    <p data-w-id="00d32e95-7424-77ef-4615-40298a938473" style="opacity:0" class="text-size-medium">
                      <?php echo htmlspecialchars($product['description'] ?? ''); ?>
                    </p>
                    <div class="margin-top margin-medium">
                      <div data-w-id="7ce207f1-4f29-2d49-14c5-5a1554d042ab" style="opacity:0" class="button-group">
                        <?php if ($product['enable_order_now'] ?? true): ?>
                        <a href="../contact-us" class="button w-button">Order Now</a>
                        <?php endif; ?>
                        <a href="../contact-us" class="button is-link is-icon w-inline-block">
                          <div>For Retailers</div>
                          <div class="icon-embed-xxsmall w-embed"><svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M6 3L11 8L6 13" stroke="CurrentColor" stroke-width="1.5"></path>
                            </svg></div>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div data-w-id="7ce207f1-4f29-2d49-14c5-5a1554d042b2" style="opacity:0" class="layout1_image-wrapper">
                    <?php 
                    $mainImage = $product['main_image'] ?? '/dmt.lk/images/dmt_1.avif';
                    // Ensure proper path prefix for uploaded images
                    if (!empty($product['main_image']) && !str_starts_with($product['main_image'], '/') && !str_starts_with($product['main_image'], 'http')) {
                        $mainImage = '/dmt.lk/' . ltrim($product['main_image'], '/');
                    }
                    $altText = !empty($product['title']) ? htmlspecialchars($product['title']) : 'Product Image';
                    ?>
                    <img sizes="(max-width: 2000px) 100vw, 2000px" 
                         src="<?php echo htmlspecialchars($mainImage); ?>" 
                         alt="<?php echo $altText; ?>" 
                         loading="lazy" 
                         class="layout1_image">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php if ($product['enable_order_now'] ?? true): ?>
      <!-- Why Choose Section -->
      <section class="section_layout298 color-scheme-8">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="layout298_component">
                <div class="margin-bottom margin-xxlarge">
                  <div data-w-id="7ce207f1-4f29-2d49-14c5-5a1554d042ba" style="opacity:0" class="text-align-center">
                    <div class="max-width-large align-center">
                      <div class="margin-bottom margin-small">
                        <h2 class="heading-style-h1">
                          <?php echo htmlspecialchars($product['why_choose_title_black'] ?? 'Why Choose DMT'); ?> 
                          <?php if (!empty($product['why_choose_title_green'])): ?>
                            <span class="text-color-primery-dark"><?php echo htmlspecialchars($product['why_choose_title_green']); ?></span>
                          <?php endif; ?>
                        </h2>
                      </div>
                      <?php if (!empty($product['why_choose_subtitle'])): ?>
                      <p class="text-size-medium"><?php echo htmlspecialchars($product['why_choose_subtitle']); ?></p>
                      <?php else: ?>
                      <p class="text-size-medium">Engineered for excellence, built for champions</p>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <!-- Dynamic 6 Feature Boxes -->
                <div class="w-layout-grid layout298_list">
                  <?php for ($i = 0; $i < 6; $i++): 
                    $feature = $features[$i] ?? ['title' => '', 'description' => ''];
                  ?>
                  <div class="layout298_item is-why-choos-section">
                    <?php if (!empty($feature['title'])): ?>
                    <div class="margin-bottom margin-xsmall">
                      <h3 class="heading-style-h5"><?php echo htmlspecialchars($feature['title']); ?></h3>
                    </div>
                    <?php endif; ?>
                    <?php if (!empty($feature['description'])): ?>
                    <p><?php echo htmlspecialchars($feature['description']); ?></p>
                    <?php endif; ?>
                  </div>
                  <?php endfor; ?>
                </div>
                <div class="margin-top margin-xxlarge">
                  <div data-w-id="7ce207f1-4f29-2d49-14c5-5a1554d042ea" style="opacity:0" class="button-group is-center">
                    <?php if ($product['enable_order_now'] ?? true): ?>
                    <a href="../contact-us" class="button w-button">Order Now</a>
                    <?php endif; ?>
                    <a href="../contact-us" class="button is-link is-icon w-inline-block">
                      <div>FOR RETAILERS</div>
                      <div class="icon-embed-xxsmall w-embed"><svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M6 3L11 8L6 13" stroke="CurrentColor" stroke-width="1.5"></path>
                        </svg></div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section_testimonial19 color-scheme-5">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="testimonial19_component">
                <div class="margin-bottom margin-xxlarge">
                  <div data-w-id="0ee1ac73-2a21-526a-3eea-568dd996ae2c" class="text-align-center">
                    <div class="max-width-large align-center">
                      <div class="margin-bottom margin-small">
                        <h2 class="heading-style-h1">What Players <span class="text-color-primery">Say About DMT</span></h2>
                      </div>
                      <p class="text-size-medium">Real feedback from real players across Sri Lanka</p>
                    </div>
                  </div>
                </div>
                <div data-delay="4000" data-animation="slide" class="testimonial19_slider w-slider" data-autoplay="false" data-easing="ease" data-hide-arrows="false" data-disable-swipe="false" data-w-id="0ee1ac73-2a21-526a-3eea-568dd996ae33" data-autoplay-limit="0" data-nav-spacing="3" data-duration="500" data-infinite="false">
                  <div class="testimonial19_mask w-slider-mask">
                    <div class="testimonial19_slide w-slide">
                      <div class="testimonial19_card">
                        <div class="testimonial19_content-top">
                          <div class="margin-bottom margin-small">
                            <div class="testimonial19_rating-wrapper">
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                            </div>
                          </div>
                          <div class="text-size-medium">“Best ball we’ve ever used for softball cricket. Perfect bounce, great grip, and lasts way longer than others on the market.”<br></div>
                        </div>
                        <div class="margin-top margin-small">
                          <div class="testimonial19_client">
                            <div class="testimonial19_client-image-wrapper"><img loading="lazy" src="/dmt.lk/images/feedback--4.avif" alt="" class="testimonial19_customer-image"></div>
                            <div class="testimonial19_client-info">
                              <div class="testamonial-name">Rajiv Perera</div>
                              <div>Colombo Lions SC<br></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="testimonial19_slide w-slide">
                      <div class="testimonial19_card">
                        <div class="testimonial19_content-top">
                          <div class="margin-bottom margin-small">
                            <div class="testimonial19_rating-wrapper">
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                            </div>
                          </div>
                          <div class="text-size-medium">“The DMT ball is game-changing. It feels premium, plays smooth, and performs consistently even after heavy use.”<br></div>
                        </div>
                        <div class="margin-top margin-small">
                          <div class="testimonial19_client">
                            <div class="testimonial19_client-image-wrapper"><img loading="lazy" src="/dmt.lk/images/feedback--2.avif" alt="" class="testimonial19_customer-image"></div>
                            <div class="testimonial19_client-info">
                              <div class="testamonial-name">Tharindu Lakshan</div>
                              <div>Kandy Softball Association<br></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="testimonial19_slide w-slide">
                      <div class="testimonial19_card">
                        <div class="testimonial19_content-top">
                          <div class="margin-bottom margin-small">
                            <div class="testimonial19_rating-wrapper">
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                            </div>
                          </div>
                          <div class="text-size-medium">“We use the DMT ball for school tournaments great for both beginners and experienced players. Safe and high quality.”<br></div>
                        </div>
                        <div class="margin-top margin-small">
                          <div class="testimonial19_client">
                            <div class="testimonial19_client-image-wrapper"><img loading="lazy" src="/dmt.lk/images/feedback-.avif" alt="" class="testimonial19_customer-image"></div>
                            <div class="testimonial19_client-info">
                              <div class="testamonial-name">Sajith Gunasekara</div>
                              <div>Softball Coach<br></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="testimonial19_slide w-slide">
                      <div class="testimonial19_card">
                        <div class="testimonial19_content-top">
                          <div class="margin-bottom margin-small">
                            <div class="testimonial19_rating-wrapper">
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                            </div>
                          </div>
                          <div class="text-size-medium">“As a retailer, DMT balls are our fastest-moving product. Players love the quality and we rarely get any complaints.”<br></div>
                        </div>
                        <div class="margin-top margin-small">
                          <div class="testimonial19_client">
                            <div class="testimonial19_client-image-wrapper"><img loading="lazy" src="/dmt.lk/images/feedback--3.avif" alt="" class="testimonial19_customer-image"></div>
                            <div class="testimonial19_client-info">
                              <div class="testamonial-name">Chamil Fernando</div>
                              <div>Softball Coach<br></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="testimonial19_slide w-slide">
                      <div class="testimonial19_card">
                        <div class="testimonial19_content-top">
                          <div class="margin-bottom margin-small">
                            <div class="testimonial19_rating-wrapper">
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                              <div class="testimonial19_rating-icon">
                                <div class="icon-embed-xsmall w-embed"><svg width="100%" viewbox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.16379 0.551109C8.47316 -0.183704 9.52684 -0.183703 9.83621 0.551111L11.6621 4.88811C11.7926 5.19789 12.0875 5.40955 12.426 5.43636L17.1654 5.81173C17.9684 5.87533 18.294 6.86532 17.6822 7.38306L14.0713 10.4388C13.8134 10.6571 13.7007 10.9996 13.7795 11.3259L14.8827 15.8949C15.0696 16.669 14.2172 17.2809 13.5297 16.8661L9.47208 14.4176C9.18225 14.2427 8.81775 14.2427 8.52793 14.4176L4.47029 16.8661C3.7828 17.2809 2.93036 16.669 3.11727 15.8949L4.22048 11.3259C4.29928 10.9996 4.18664 10.6571 3.92873 10.4388L0.317756 7.38306C-0.294046 6.86532 0.0315611 5.87533 0.834562 5.81173L5.57402 5.43636C5.91255 5.40955 6.20744 5.19789 6.33786 4.88811L8.16379 0.551109Z" fill="currentColor"></path>
                                  </svg></div>
                              </div>
                            </div>
                          </div>
                          <div class="text-size-medium">From casual games to weekend matches, the DMT ball delivers every time. Great flight, solid bounce, and doesn’t wear out.<br></div>
                        </div>
                        <div class="margin-top margin-small">
                          <div class="testimonial19_client">
                            <div class="testimonial19_client-image-wrapper"><img loading="lazy" src="/dmt.lk/images/feedback--1.avif" alt="" class="testimonial19_customer-image"></div>
                            <div class="testimonial19_client-info">
                              <div class="testamonial-name">Nuwan De Silva</div>
                              <div>Community Club Player</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="slider-arrow is-centre-previous w-slider-arrow-left">
                    <div class="slider-arrow-icon_default w-embed"><svg width="100%" height="100%" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.31066 8.75001L9.03033 14.4697L7.96967 15.5303L0.439339 8.00001L7.96967 0.469676L9.03033 1.53034L3.31066 7.25001L15.5 7.25L15.5 8.75L3.31066 8.75001Z" fill="currentColor"></path>
                      </svg></div>
                  </div>
                  <div class="slider-arrow is-centre-next w-slider-arrow-right">
                    <div class="slider-arrow-icon_default w-embed"><svg width="100%" height="100%" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.6893 7.25L6.96967 1.53033L8.03033 0.469666L15.5607 8L8.03033 15.5303L6.96967 14.4697L12.6893 8.75H0.5V7.25H12.6893Z" fill="currentColor"></path>
                      </svg></div>
                  </div>
                  <div class="testimonial19_slide-nav w-slider-nav w-slider-nav-invert w-round"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section_layout34 color-scheme-6">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="layout34_component">
                <div class="w-layout-grid layout34_content">
                  <div id="w-node-_7ce207f1-4f29-2d49-14c5-5a1554d043a7-3453c016" class="layout34_content-left">
                    <div data-w-id="7ce207f1-4f29-2d49-14c5-5a1554d043a8" style="opacity:0" class="w-layout-grid layout34_item-list">
                      <?php 
                      // Parse specifications from JSON
                      $specifications = json_decode($product['specifications_json'] ?? '[]', true) ?: [];
                      
                      // If no specifications, show default content
                      if (empty($specifications) || (empty($specifications[0]['title']) && empty($specifications[0]['description']))) {
                        echo '
                        <div id="w-node-_7ce207f1-4f29-2d49-14c5-5a1554d043a9-3453c016" class="layout34_item">
                          <div class="layout34_item-icon-wrapper"><img loading="lazy" src="/dmt.lk/images/bullot.png" alt="" class="icon-1x1-medium"></div>
                          <div class="layout34_item-text-wrapper">
                            <div class="margin-bottom margin-xsmall">
                              <h3 class="heading-style-h5">Specifications Coming Soon</h3>
                            </div>
                            <p>Detailed product specifications will be available soon. Contact us for more information.</p>
                          </div>
                        </div>';
                      } else {
                        // Display actual specifications
                        foreach ($specifications as $index => $spec) {
                          if (!empty($spec['title']) || !empty($spec['description'])) {
                            $nodeId = $index === 0 ? 'w-node-_7ce207f1-4f29-2d49-14c5-5a1554d043a9-3453c016' : 
                                     ($index === 1 ? 'w-node-_7ce207f1-4f29-2d49-14c5-5a1554d043b8-3453c016' : 
                                      'w-node-_7ce207f1-4f29-2d49-14c5-5a1554d043c7-3453c016');
                            echo '
                            <div id="' . $nodeId . '" class="layout34_item">
                              <div class="layout34_item-icon-wrapper"><img loading="lazy" src="/dmt.lk/images/bullot.png" alt="" class="icon-1x1-medium"></div>
                              <div class="layout34_item-text-wrapper">
                                <div class="margin-bottom margin-xsmall">
                                  <h3 class="heading-style-h5">' . htmlspecialchars($spec['title'] ?: 'Specification') . '</h3>
                                </div>
                                <p>' . htmlspecialchars($spec['description'] ?: 'No description available.') . '</p>
                              </div>
                            </div>';
                          }
                        }
                      }
                      ?>
                    </div>
                  </div>
                  <div data-w-id="7ce207f1-4f29-2d49-14c5-5a1554d043d6" style="opacity:0" class="layout34_image-wrapper">
                    <?php if (!empty($product['specifications_image'])): ?>
                      <?php 
                      $specImage = $product['specifications_image'];
                      // Ensure the image path is absolute
                      if (!str_starts_with($specImage, '/') && !str_starts_with($specImage, 'http')) {
                          $specImage = '/dmt.lk/' . ltrim($specImage, '/');
                      }
                      ?>
                      <img loading="lazy" src="<?= htmlspecialchars($specImage) ?>" alt="Product Specifications" class="layout34_image">
                    <?php else: ?>
                      <img loading="lazy" src="/dmt.lk/images/placeholder-image.svg" alt="" class="layout34_image">
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php endif; ?>
      <!-- Ready to Order Section -->
      <section class="section_layout238 color-scheme-8">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="layout238_component">
                <div class="margin-bottom margin-xxlarge">
                  <div class="text-align-center">
                    <div data-w-id="7ce207f1-4f29-2d49-14c5-5a1554d043df" style="opacity:0" class="max-width-large align-center">
                      <div class="margin-bottom margin-small">
                        <h2 class="heading-style-h1">Ready <span class="text-color-primery-dark">to Order?</span><br></h2>
                      </div>
                      <p class="text-size-medium">Engineered for excellence, built for champions</p>
                    </div>
                  </div>
                </div>
                <div class="w-layout-grid layout238_list">
                  <div class="layout238_item is-card">
                    <div class="margin-bottom margin-small">
                      <div class="layout238_item-icon-wrapper"><img loading="lazy" src="/dmt.lk/images/For-Individual-Players.avif" alt="" class="icon-1x1-medium"></div>
                    </div>
                    <div class="margin-bottom margin-small">
                      <h3 class="heading-style-h5">For Individual Players</h3>
                    </div>
                    <p>Order directly from us and experience the DMT difference in your next game.</p>
                    <div class="margin-top margin-medium">
                      <div class="button-group is-center">
                        <a href="tel:+94769175175" class="button w-button">+94 769 175 175</a>
                      </div>
                    </div>
                  </div>
                  <div class="layout238_item is-card">
                    <div class="margin-bottom margin-small">
                      <div class="layout238_item-icon-wrapper"><img loading="lazy" src="/dmt.lk/images/For-Retailers.avif" alt="" class="icon-1x1-medium"></div>
                    </div>
                    <div class="margin-bottom margin-small">
                      <h3 class="heading-style-h5">For Retailers</h3>
                    </div>
                    <p>Partner with us to stock DMT products in your store. Bulk pricing available.</p>
                    <div class="margin-top margin-medium">
                      <div class="button-group is-center">
                        <a href="tel:+94769175175" class="button w-button">+94 769 175 175</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer class="footer1_component color-scheme-1">
      <div class="padding-global">
        <div class="container-large">
          <div class="padding-vertical padding-xxlarge">
            <div class="padding-bottom padding-xxlarge">
              <div class="w-layout-grid footer1_top-wrapper">
                <div class="footer1_left-wrapper">
                  <div class="margin-bottom margin-small">
                    <a href="<?= url() ?>" class="footer1_logo-link w-nav-brand"><img loading="lazy" src="<?= asset('images/DMT-LOGO-Main.avif') ?>" alt="" class="footer1_logo"></a>
                  </div>
                  <div class="margin-bottom margin-small">
                    <div>Sri Lanka&#x27;s premier softball cricket gear brand. Built for performance, durability, and affordability.</div>
                  </div>
                </div>
                <div class="w-layout-grid footer1_menu-wrapper">
                  <div class="footer1_link-column">
                    <div class="margin-bottom margin-xsmall">
                      <div class="footer-menu-titile">Quick Links</div>
                    </div>
                    <div class="footer1_link-list">
                      <a href="<?= url() ?>" class="footer1_link">Home</a>
                      <a href="<?= url('about-us') ?>" class="footer1_link">About</a>
                      <a href="<?= url('our-products') ?>" class="footer1_link">Products</a>
                      <a href="<?= url('contact-us') ?>" class="footer1_link">Contact</a>
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
                      <a href="<?= getCompanyPhoneHref() ?>" class="footer1_social-link w-inline-block"><img src="<?= asset('images/Phone.avif') ?>" loading="lazy" alt="" class="icon-embed-xsmall">
                        <div class="conatct-info"><?= getCompanyPhone() ?></div>
                      </a>
                      <a href="<?= getCompanyEmailHref() ?>" class="footer1_social-link w-inline-block"><img src="<?= asset('images/Email.avif') ?>" loading="lazy" alt="" class="icon-embed-xsmall">
                        <div class="conatct-info"><?= getCompanyEmail() ?></div>
                      </a>
                      <a href="#" class="footer1_social-link w-inline-block">
                        <div class="icon-embed-xsmall w-embed"><svg width="100%" height="100%" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22 12.0611C22 6.50451 17.5229 2 12 2C6.47715 2 2 6.50451 2 12.0611C2 17.0828 5.65684 21.2452 10.4375 22V14.9694H7.89844V12.0611H10.4375V9.84452C10.4375 7.32296 11.9305 5.93012 14.2146 5.93012C15.3088 5.93012 16.4531 6.12663 16.4531 6.12663V8.60261H15.1922C13.95 8.60261 13.5625 9.37822 13.5625 10.1739V12.0611H16.3359L15.8926 14.9694H13.5625V22C18.3432 21.2452 22 17.083 22 12.0611Z" fill="CurrentColor"></path>
                          </svg></div>
                        <div class="conatct-info">Facebook</div>
                      </a>
                      <a href="#" class="footer1_social-link w-inline-block">
                        <div class="icon-embed-xsmall w-embed"><svg width="100%" height="100%" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16 3H8C5.23858 3 3 5.23858 3 8V16C3 18.7614 5.23858 21 8 21H16C18.7614 21 21 18.7614 21 16V8C21 5.23858 18.7614 3 16 3ZM19.25 16C19.2445 17.7926 17.7926 19.2445 16 19.25H8C6.20735 19.2445 4.75549 17.7926 4.75 16V8C4.75549 6.20735 6.20735 4.75549 8 4.75H16C17.7926 4.75549 19.2445 6.20735 19.25 8V16ZM16.75 8.25C17.3023 8.25 17.75 7.80228 17.75 7.25C17.75 6.69772 17.3023 6.25 16.75 6.25C16.1977 6.25 15.75 6.69772 15.75 7.25C15.75 7.80228 16.1977 8.25 16.75 8.25ZM12 7.5C9.51472 7.5 7.5 9.51472 7.5 12C7.5 14.4853 9.51472 16.5 12 16.5C14.4853 16.5 16.5 14.4853 16.5 12C16.5027 10.8057 16.0294 9.65957 15.1849 8.81508C14.3404 7.97059 13.1943 7.49734 12 7.5ZM9.25 12C9.25 13.5188 10.4812 14.75 12 14.75C13.5188 14.75 14.75 13.5188 14.75 12C14.75 10.4812 13.5188 9.25 12 9.25C10.4812 9.25 9.25 10.4812 9.25 12Z" fill="CurrentColor"></path>
                          </svg></div>
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
                  <a href="<?= url('terms-conditions') ?>" class="footer1_legal-link">Terms of Service</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=68ac3916626e46cbd1a97ae5" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="/dmt.lk/js/webflow.js" type="text/javascript"></script>
</body>
</html>