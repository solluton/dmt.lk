<?php
require_once 'config/database.php';

try {
    // Get database connection using the function from database.php
    $pdo = getDBConnection();
    
    // Fetch all active products ordered by display_order
    $stmt = $pdo->prepare("SELECT * FROM products WHERE status = 'active' ORDER BY display_order ASC, created_at ASC");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Fetch products with featured home images for the "Gear That Hits Different" section
    $stmt_featured = $pdo->prepare("SELECT * FROM products WHERE status = 'active' AND enable_featured_home = 1 AND featured_home_image IS NOT NULL AND featured_home_image != '' ORDER BY display_order ASC, created_at ASC LIMIT 3");
    $stmt_featured->execute();
    $featured_products = $stmt_featured->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $products = [];
    $featured_products = [];
    error_log("Error fetching products: " . $e->getMessage());
}
?>
<!DOCTYPE html><!--  This site was created in Webflow. https://webflow.com  --><!--  Last Published: Fri Oct 03 2025 05:25:13 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="68ac3917626e46cbd1a97b45" data-wf-site="68ac3916626e46cbd1a97ae5">
<head>
  <meta charset="utf-8">
  <title>DMT Softball Cricket Gear Sri Lanka | Premium Balls, Bats &amp; Gloves</title>
  <meta content="Discover DMT, Sri Lanka’s leading brand for softball cricket gear. Shop the best-quality softball cricket balls, bats, and gloves—affordable, durable, and trusted by players nationwide." name="description">
  <meta content="DMT Softball Cricket Gear Sri Lanka | Premium Balls, Bats &amp; Gloves" property="og:title">
  <meta content="Discover DMT, Sri Lanka’s leading brand for softball cricket gear. Shop the best-quality softball cricket balls, bats, and gloves—affordable, durable, and trusted by players nationwide." property="og:description">
  <meta content="DMT Softball Cricket Gear Sri Lanka | Premium Balls, Bats &amp; Gloves" property="twitter:title">
  <meta content="Discover DMT, Sri Lanka’s leading brand for softball cricket gear. Shop the best-quality softball cricket balls, bats, and gloves—affordable, durable, and trusted by players nationwide." property="twitter:description">
  <meta property="og:type" content="website">
  <meta content="summary_large_image" name="twitter:card">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <?php include 'includes/scripts-global.php'; ?>
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
      </div>
    </div>
    <?php include 'includes/navbar-global.php'; ?>
    <main class="main-wrapper">
      <header class="section_header83 text-color-white">
        <div class="header83_component">
          <div class="header83_content-wrapper">
            <div class="header83_content">
              <div class="padding-global">
                <div class="container-large">
                  <div class="padding-section-large">
                    <div class="header83_content-block">
                      <div class="text-align-center">
                        <div class="max-width-large align-center">
                          <div data-w-id="d6e953d3-cbee-d118-f75e-b6a6813049a9" style="opacity:0" class="margin-bottom margin-small">
                            <div class="max-width-medium align-center">
                              <h1 class="heading-style-h1">Play Bold. Play Long. <span class="text-color-primery">Play DMT.</span></h1>
                            </div>
                          </div>
                          <div class="margin-bottom margin-medium">
                            <p data-w-id="d6e953d3-cbee-d118-f75e-b6a6813049ac" style="opacity:0" class="hero-tag-line">Built for the streets, the grounds, and the champions in the making.<br></p>
                          </div>
                          <p data-w-id="f0989c72-6e9c-20a2-f7de-655db2568f27" style="opacity:0" class="text-size-medium">Smash sixes or chase the final over, DMT has your back. Tough cricket gear built for harder, longer, better play. Street style meets pro performance.</p>
                          <div class="margin-top margin-medium">
                            <div data-w-id="d6e953d3-cbee-d118-f75e-b6a6813049b3" style="opacity:0" class="button-group is-center">
                              <a href="./our-products" class="button is-100--in-mobile w-button" style="color:white !important;">View All Products</a>
                              <a href="./about-us" class="button is-secondary is-alternate is-100-in-mobile w-button">Our Story</a>
                            </div>
                          </div>
              </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
            </div>
            <div class="header83_background-images">
              <div class="image-overlay-layer"></div>
              <div class="header83_images-layout">
                <div id="w-node-d6e953d3-cbee-d118-f75e-b6a6813049bb-d1a97b45" class="header83_image-wrapper hide-mobile-landscape"><img id="w-node-d6e953d3-cbee-d118-f75e-b6a6813049bc-d1a97b45" sizes="(max-width: 1408px) 100vw, 1408px" alt="" src="images/dmt-sport_1.avif" loading="eager" srcset="images/dmt-sport_1dmt-sport.avif 500w, images/dmt-sport_1dmt-sport.avif 800w, images/dmt-sport_1.avif 1408w" class="header83_image"></div>
                <div id="w-node-d6e953d3-cbee-d118-f75e-b6a6813049bd-d1a97b45" class="header83_image-wrapper"><img id="w-node-d6e953d3-cbee-d118-f75e-b6a6813049be-d1a97b45" sizes="(max-width: 2446px) 100vw, 2446px" alt="" src="images/dmt-ball-6_1.avif" loading="eager" srcset="images/dmt-ball-6_1dmt-ball-6.avif 500w, images/dmt-ball-6_1dmt-ball-6.avif 800w, images/dmt-ball-6_1.avif 2446w" class="header83_image"></div>
                <div id="w-node-d6e953d3-cbee-d118-f75e-b6a6813049bf-d1a97b45" class="header83_image-wrapper hide-mobile-landscape"><img id="w-node-d6e953d3-cbee-d118-f75e-b6a6813049c0-d1a97b45" sizes="(max-width: 2445px) 100vw, 2445px" alt="" src="images/dmt-ball-1_1.avif" loading="eager" srcset="images/dmt-ball-1_1dmt-ball-1.avif 500w, images/dmt-ball-1_1dmt-ball-1.avif 800w, images/dmt-ball-1_1dmt-ball-1.avif 1080w, images/dmt-ball-1_1.avif 2445w" class="header83_image"></div>
                <div id="w-node-d6e953d3-cbee-d118-f75e-b6a6813049c1-d1a97b45" class="header83_image-wrapper hide-mobile-landscape"><img id="w-node-d6e953d3-cbee-d118-f75e-b6a6813049c2-d1a97b45" sizes="(max-width: 2445px) 100vw, 2445px" alt="" src="images/dmt-ball-8_1.avif" loading="eager" srcset="images/dmt-ball-8_1dmt-ball-8.avif 500w, images/dmt-ball-8_1dmt-ball-8.avif 800w, images/dmt-ball-8_1dmt-ball-8.avif 1080w, images/dmt-ball-8_1.avif 2445w" class="header83_image"></div>
                <div id="w-node-d6e953d3-cbee-d118-f75e-b6a6813049c3-d1a97b45" class="header83_image-wrapper"><img id="w-node-d6e953d3-cbee-d118-f75e-b6a6813049c4-d1a97b45" sizes="(max-width: 2446px) 100vw, 2446px" alt="" src="images/dmt-ball-4_1.avif" loading="eager" srcset="images/dmt-ball-4_1dmt-ball-4.avif 500w, images/dmt-ball-4_1dmt-ball-4.avif 800w, images/dmt-ball-4_1dmt-ball-4.avif 1080w, images/dmt-ball-4_1.avif 2446w" class="header83_image"></div>
                <div id="w-node-d6e953d3-cbee-d118-f75e-b6a6813049c5-d1a97b45" class="header83_image-wrapper hide-mobile-landscape"><img id="w-node-d6e953d3-cbee-d118-f75e-b6a6813049c6-d1a97b45" sizes="(max-width: 2445px) 100vw, 2445px" alt="" src="images/dmt-ball-3_1.avif" loading="eager" srcset="images/dmt-ball-3_1dmt-ball-3.avif 500w, images/dmt-ball-3_1dmt-ball-3.avif 800w, images/dmt-ball-3_1dmt-ball-3.avif 1080w, images/dmt-ball-3_1.avif 2445w" class="header83_image"></div>
                <div id="w-node-d6e953d3-cbee-d118-f75e-b6a6813049c7-d1a97b45" class="header83_image-wrapper hide-mobile-landscape"><img id="w-node-d6e953d3-cbee-d118-f75e-b6a6813049c8-d1a97b45" sizes="(max-width: 2445px) 100vw, 2445px" alt="" src="images/dmt-ball-7_1.avif" loading="eager" srcset="images/dmt-ball-7_1dmt-ball-7.avif 500w, images/dmt-ball-7_1dmt-ball-7.avif 800w, images/dmt-ball-7_1dmt-ball-7.avif 1080w, images/dmt-ball-7_1.avif 2445w" class="header83_image"></div>
                <div id="w-node-d6e953d3-cbee-d118-f75e-b6a6813049c9-d1a97b45" class="header83_image-wrapper"><img id="w-node-d6e953d3-cbee-d118-f75e-b6a6813049ca-d1a97b45" sizes="(max-width: 1280px) 100vw, 1280px" alt="" src="images/dmt-image_1.avif" loading="eager" srcset="images/dmt-image_1dmt-image.avif 500w, images/dmt-image_1.avif 1280w" class="header83_image"></div>
                <div id="w-node-d6e953d3-cbee-d118-f75e-b6a6813049cb-d1a97b45" class="header83_image-wrapper hide-mobile-landscape"><img id="w-node-d6e953d3-cbee-d118-f75e-b6a6813049cc-d1a97b45" sizes="(max-width: 2444px) 100vw, 2444px" alt="" src="images/dmt-ball-2_1.avif" loading="eager" srcset="images/dmt-ball-2_1dmt-ball-2.avif 500w, images/dmt-ball-2_1dmt-ball-2.avif 800w, images/dmt-ball-2_1dmt-ball-2.avif 1080w, images/dmt-ball-2_1.avif 2444w" class="header83_image"></div>
            </div>
            </div>
          </div>
          <div data-w-id="d6e953d3-cbee-d118-f75e-b6a6813049cd" class="header83_ix-trigger"></div>
        </div>
      </header>
      <section class="section_layout458 color-scheme-6">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="layout458_component">
                <div class="margin-bottom margin-xxlarge">
                  <div class="w-layout-grid layout458_content">
                    <div class="layout458_content-left">
                      <h2 data-w-id="d6e953d3-cbee-d118-f75e-b6a6813049d9" style="opacity:0" class="heading-style-h1">Because Softball Cricket <span class="text-color-primery-dark">Deserves Hardcore Gear</span></h2>
                    </div>
                    <div data-w-id="d6e953d3-cbee-d118-f75e-b6a6813049db" style="opacity:0" class="layout458_content-right">
                      <p class="text-size-medium">Designed specifically for urban environments, this product is crafted to meet the demands of champions. It&#x27;s a perfect blend of durability and performance, ensuring that you can conquer the streets with confidence and style.</p>
                      <div class="margin-top margin-medium">
                        <div class="button-group">
                          <a href="./about-us" class="button is-secondary w-button">About Us</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="layout458_list">
                  <div class="layout458_item1">
                    <div class="margin-bottom margin-medium">
                      <div class="layout458_image-wrapper"><img sizes="(max-width: 840px) 100vw, 840px" srcset="images/Street-Tested-Durability_1Street-Tested-Durability.avif 500w, images/Street-Tested-Durability_1.avif 840w" alt="" src="images/Street-Tested-Durability_1.avif" loading="eager" class="layout458_image"></div>
                    </div>
                    <div class="margin-bottom margin-xsmall">
                      <h3 class="heading-style-h4">Street-Tested Durability</h3>
              </div>
                    <p>Designed to survive the roughest pitches and the longest matches. Every piece of DMT gear is built to last.</p>
                  </div>
                  <div data-w-id="d6e953d3-cbee-d118-f75e-b6a6813049f0" style="opacity:0" class="layout458_item2">
                    <div class="margin-bottom margin-medium">
                      <div class="layout458_image-wrapper"><img sizes="(max-width: 1248px) 100vw, 1248px" srcset="images/dmt-ball-02_1dmt-ball-02.avif 500w, images/dmt-ball-02_1.avif 1248w" alt="" src="images/dmt-ball-02_1.avif" loading="eager" class="layout458_image"></div>
                    </div>
                    <div class="margin-bottom margin-xsmall">
                      <h3 class="heading-style-h4">Performance Engineered</h3>
                    </div>
                    <p>Engineered with street cricket in mind, for players who hustle hard and demand the best.</p>
                  </div>
                  <div data-w-id="d6e953d3-cbee-d118-f75e-b6a6813049f9" style="opacity:0" class="layout458_item3">
                    <div class="margin-bottom margin-medium">
                      <div class="layout458_image-wrapper"><img sizes="(max-width: 2446px) 100vw, 2446px" srcset="images/dmt-ball-6_1dmt-ball-6.avif 500w, images/dmt-ball-6_1dmt-ball-6.avif 800w, images/dmt-ball-6_1.avif 2446w" alt="" src="images/dmt-ball-6_1.avif" loading="eager" class="layout458_image"></div>
                        </div>
                    <div class="margin-bottom margin-xsmall">
                      <h3 class="heading-style-h4">Proven Legacy</h3>
                    </div>
                    <p>Backed by the Dimath Group&#x27;s legacy in sports gear, trusted across Sri Lanka for quality and performance.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section_layout239 color-scheme-8">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="layout239_component">
                <div class="margin-bottom margin-xxlarge">
                  <div data-w-id="d6e953d3-cbee-d118-f75e-b6a681304a08" style="opacity:0" class="text-align-center">
                    <div class="max-width-large align-center">
                      <div class="margin-bottom margin-small">
                        <h2 class="heading-style-h1">Gear That <span class="text-color-primery-dark">Hits Different</span></h2>
                      </div>
                      <p class="text-size-medium">From our oxygenated cricket softball to our upcoming bat and gloves, every piece of DMT gear is crafted for power, control, and style.</p>
                    </div>
                  </div>
                </div>
                <div class="w-layout-grid layout239_list">
                  <?php if (!empty($featured_products)): ?>
                    <?php foreach ($featured_products as $product): ?>
                      <?php
                      // Parse tags from comma-separated string
                      $product_tags = !empty($product['tags']) ? explode(',', $product['tags']) : [];
                      $product_tags = array_map('trim', $product_tags);
                      $product_tags = array_slice($product_tags, 0, 3); // Show first 3 tags
                      
                      // Determine stock label based on enable_order_now setting
                      $stock_label = ($product['enable_order_now'] == 1) ? 'In Stock' : 'Coming Soon';
                      $stock_class = ($product['enable_order_now'] == 1) ? 'in-stock' : '';
                      ?>
                      <div class="layout239_item">
                        <div class="margin-bottom margin-medium">
                          <div class="layout239_image-wrapper">
                            <a href="./product/<?= htmlspecialchars($product['slug']) ?>">
                              <img sizes="(max-width: 1024px) 100vw, 1024px" 
                                   srcset="<?= htmlspecialchars($product['featured_home_image']) ?> 500w, <?= htmlspecialchars($product['featured_home_image']) ?> 1024w" 
                                   alt="<?= htmlspecialchars($product['title']) ?>" 
                                   src="<?= htmlspecialchars($product['featured_home_image']) ?>" 
                                   loading="eager" 
                                   class="layout239_image is-square">
                            </a>
                            <div class="product-commingsoon-tag <?= $stock_class ?>">
                              <div><?= $stock_label ?></div>
                            </div>
                          </div>
                        </div>
                        <div>
                          <div class="product-content-wrapper">
                            <div class="product-title-wrapper">
                              <h3 class="heading-style-h4">
                                <a href="./product/<?= htmlspecialchars($product['slug']) ?>" style="color: inherit; text-decoration: none;">
                                  <?= htmlspecialchars($product['title']) ?>
                                </a>
                              </h3>
                              <?php if (!empty($product['subtitle'])): ?>
                                <div class="is-product-tagline">"<?= htmlspecialchars($product['subtitle']) ?>"</div>
                              <?php endif; ?>
                            </div>
                            <p><?= htmlspecialchars($product['description']) ?></p>
                            <?php if (!empty($product_tags)): ?>
                              <div class="products-tag-wrapper">
                                <?php foreach ($product_tags as $tag): ?>
                                  <div class="product-tag">
                                    <div><?= htmlspecialchars($tag) ?></div>
                                  </div>
                                <?php endforeach; ?>
                              </div>
                            <?php endif; ?>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <!-- Fallback content if no featured products -->
                    <div class="layout239_item">
                      <div class="margin-bottom margin-medium">
                        <div class="layout239_image-wrapper"><img sizes="(max-width: 1024px) 100vw, 1024px" srcset="images/dmt-cricket-softball-sri-lanka_1dmt-cricket-softball-sri-lanka.avif 500w, images/dmt-cricket-softball-sri-lanka_1.avif 1024w" alt="" src="images/dmt-cricket-softball-sri-lanka_1.avif" loading="eager" class="layout239_image is-square">
                          <div class="product-commingsoon-tag in-stock">
                            <div>In Stock</div>
                          </div>
                        </div>
                      </div>
                      <div>
                        <div class="product-content-wrapper">
                          <div class="product-title-wrapper">
                            <h3 class="heading-style-h4">DMT Cricket Softball</h3>
                            <div class="is-product-tagline">"The Ball That Never Quits"</div>
                          </div>
                          <p>Oxygenated for long-lasting bounce and consistency. From dusty streets to proper grounds, this ball keeps its shape, feel, and performance match after match.</p>
                          <div class="products-tag-wrapper">
                            <div class="product-tag">
                              <div>Oxygenated</div>
                            </div>
                            <div class="product-tag">
                              <div>Durable</div>
                            </div>
                            <div class="product-tag">
                              <div>Consistent</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
                <div class="margin-top margin-xxlarge">
                  <div data-w-id="d6e953d3-cbee-d118-f75e-b6a681304a3b" style="opacity:0" class="button-group is-center">
                    <a href="./our-products" class="button w-button" style="color:white !important;">View All Products</a>
              </div>
            </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section_layout530 color-scheme-5">
        <div class="w-layout-grid layout530_component">
          <div id="w-node-d6e953d3-cbee-d118-f75e-b6a681304a44-d1a97b45" class="padding-section-large">
            <div data-w-id="d6e953d3-cbee-d118-f75e-b6a681304a45" style="opacity:0" class="layout530_content">
              <div class="margin-bottom margin-small">
                <div class="max-width-xsmall">
                  <h2 class="heading-style-h1">Join the <span class="text-color-primery">DMT Squad</span></h2>
        </div>
      </div>
              <div class="margin-bottom margin-medium">
                <p class="text-size-medium">Want to stock DMT? Or just want to be part of something bigger? Let&#x27;s team up and grow the game together.</p>
              </div>
              <div class="w-layout-grid layout530_item-list">
                <div class="layout530_text-wrapper">
                  <div class="margin-bottom margin-xsmall"><img src="images/retailers.avif" loading="lazy" alt="" class="icon-1x1-medium"></div>
                  <div class="margin-bottom margin-xsmall">
                    <h3 class="heading-style-h6">For Retailers</h3>
                  </div>
                  <p>Stock the best softball cricket gear in Sri Lanka</p>
                  <div class="margin-top margin-medium">
                    <div class="button-group">
                      <a href="./contact-us" class="button is-secondary is-alternate w-button">Partner With Us</a>
                    </div>
                  </div>
                </div>
                <div class="layout530_text-wrapper">
                  <div class="margin-bottom margin-xsmall">
                    <div class="margin-bottom margin-xsmall"><img src="images/players.avif" loading="lazy" alt="" class="icon-1x1-medium"></div>
                    <h3 class="heading-style-h6">For Players</h3>
                  </div>
                  <p>Join our community of champions</p>
                  <div class="margin-top margin-medium">
                    <div class="button-group">
                      <a href="./contact-us" class="button is-secondary is-alternate w-button">get in touch</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="layout530_image-wrapper"><img class="layout530_image" src="images/join-dmt-squad_1.avif" alt="" style="opacity:0" sizes="(max-width: 1024px) 100vw, 1024px" data-w-id="d6e953d3-cbee-d118-f75e-b6a681304a65" loading="eager" srcset="images/join-dmt-squad_1join-dmt-squad.avif 500w, images/join-dmt-squad_1.avif 1024w"></div>
        </div>
      </section>
      <section class="section_testimonial19 color-scheme-6 section-overflow-hidden">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="testimonial19_component">
                <div class="margin-bottom margin-xxlarge">
                  <div class="text-align-center">
                    <div data-w-id="d6e953d3-cbee-d118-f75e-b6a681304a6d" style="opacity:0" class="max-width-large align-center">
                      <div class="margin-bottom margin-small">
                        <h2 class="heading-style-h1">What Players <span class="text-color-primery-dark">Say About DMT</span></h2>
                      </div>
                      <p class="text-size-medium">Real feedback from real players across Sri Lanka</p>
                    </div>
                  </div>
                </div>
                <div data-delay="4000" data-animation="slide" class="testimonial19_slider w-slider" data-autoplay="false" data-easing="ease" style="opacity:0" data-hide-arrows="false" data-disable-swipe="false" data-w-id="d6e953d3-cbee-d118-f75e-b6a681304a73" data-autoplay-limit="0" data-nav-spacing="3" data-duration="500" data-infinite="false">
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
                          <div class="text-size-medium">“Best ball we’ve ever used for softball cricket. Perfect bounce, great grip, and lasts way longer than others on the market.”</div>
                        </div>
                        <div class="margin-top margin-small">
                          <div class="testimonial19_client">
                            <div class="testimonial19_client-image-wrapper"><img loading="eager" src="images/feedback--4.avif" alt="" class="testimonial19_customer-image"></div>
                            <div class="testimonial19_client-info">
                              <div class="testimonial-name">Rajiv Perera</div>
                              <div>Colombo Lions SC</div>
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
                          <div class="text-size-medium">“The DMT ball is game-changing. It feels premium, plays smooth, and performs consistently even after heavy use.”</div>
                        </div>
                        <div class="margin-top margin-small">
                          <div class="testimonial19_client">
                            <div class="testimonial19_client-image-wrapper"><img loading="eager" src="images/feedback--2.avif" alt="" class="testimonial19_customer-image"></div>
                            <div class="testimonial19_client-info">
                              <div class="testimonial-name">Tharindu Lakshan</div>
                              <div>Kandy Softball Association</div>
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
                          <div class="text-size-medium">“We use the DMT ball for school tournaments great for both beginners and experienced players. Safe and high quality.”</div>
                        </div>
                        <div class="margin-top margin-small">
                          <div class="testimonial19_client">
                            <div class="testimonial19_client-image-wrapper"><img loading="eager" src="images/feedback-.avif" alt="" class="testimonial19_customer-image"></div>
                            <div class="testimonial19_client-info">
                              <div class="testimonial-name">Sajith Gunasekara</div>
                              <div>Softball Coach</div>
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
                          <div class="text-size-medium">“As a retailer, DMT balls are our fastest-moving product. Players love the quality and we rarely get any complaints.”</div>
                        </div>
                        <div class="margin-top margin-small">
                          <div class="testimonial19_client">
                            <div class="testimonial19_client-image-wrapper"><img loading="eager" src="images/feedback--3.avif" alt="" class="testimonial19_customer-image"></div>
                            <div class="testimonial19_client-info">
                              <div class="testimonial-name">Chamil Fernando</div>
                              <div>Softball Coach</div>
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
                          <div class="text-size-medium">From casual games to weekend matches, the DMT ball delivers every time. Great flight, solid bounce, and doesn’t wear out.</div>
                        </div>
                        <div class="margin-top margin-small">
                          <div class="testimonial19_client">
                            <div class="testimonial19_client-image-wrapper"><img loading="eager" src="images/feedback--1.avif" alt="" class="testimonial19_customer-image"></div>
                            <div class="testimonial19_client-info">
                              <div class="testimonial-name">Nuwan De Silva</div>
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
      <section class="section_layout303 color-scheme-5">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="layout303_component">
                <div class="margin-bottom margin-xxlarge">
                  <div data-w-id="ef33eacd-f648-0793-1b5d-5e89b046dbe1" style="opacity:0" class="layout303-content">
                    <div class="max-width-large is-custom">
                      <h2 class="heading-style-h1">Built for Champions <span class="text-color-primery">Like You</span></h2>
                    </div>
                    <div>
                      <p class="text-size-medium">Whether you&#x27;re a street player or a tournament organizer, DMT has your back</p>
                    </div>
                  </div>
                </div>
                <div class="w-layout-grid layout303_list">
                  <div class="layout303_item">
                    <div class="margin-bottom margin-small">
                      <div class="layout303_item-icon-wrapper"><img loading="lazy" src="images/Softball-Cricket-Players--Teams.avif" alt="" class="icon-1x1-medium"></div>
                    </div>
                    <div class="margin-bottom margin-xsmall">
                      <h3 class="heading-style-h5">Softball Cricket Players &amp; Teams</h3>
                    </div>
                    <p>From casual street games to competitive tournaments, our gear is designed to elevate your performance and last through every match.</p>
                  </div>
                  <div class="layout303_item">
                    <div class="margin-bottom margin-small">
                      <div class="layout303_item-icon-wrapper"><img loading="lazy" src="images/Sports-Retailers.avif" alt="" class="icon-1x1-medium"></div>
                    </div>
                    <div class="margin-bottom margin-xsmall">
                      <h3 class="heading-style-h5">Sports Retailers</h3>
                    </div>
                    <p>Partner with us to offer the best softball cricket gear in Sri Lanka. Quality products that your customers will love and trust.</p>
                  </div>
                  <div class="layout303_item">
                    <div class="margin-bottom margin-small">
                      <div class="layout303_item-icon-wrapper"><img loading="lazy" src="images/Schools--Colleges.avif" alt="" class="icon-1x1-medium"></div>
                    </div>
                    <div class="margin-bottom margin-xsmall">
                      <h3 class="heading-style-h5">Schools &amp; Colleges</h3>
                    </div>
                    <p>Equip your cricket teams with durable, high-performance gear that can handle the rigors of daily practice and competitive matches.</p>
                  </div>
                  <div class="layout303_item">
                    <div class="margin-bottom margin-small">
                      <div class="layout303_item-icon-wrapper"><img loading="lazy" src="images/Sports-Clubs--Tournaments.avif" alt="" class="icon-1x1-medium"></div>
                    </div>
                    <div class="margin-bottom margin-xsmall">
                      <h3 class="heading-style-h5">Community Sports Clubs &amp; Tournament Organizers</h3>
                    </div>
                    <p>Create memorable cricket experiences with gear that performs consistently and looks professional on every pitch.</p>
      </div>
          </div>
            </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section_layout254 color-scheme-6">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="layout254_component">
                <div class="margin-bottom margin-xxlarge">
                  <div data-w-id="d6e953d3-cbee-d118-f75e-b6a681304b64" style="opacity:0" class="text-align-center">
                    <div class="max-width-large align-center">
                      <div class="margin-bottom margin-small">
                        <h2 class="heading-style-h1">What Makes <span class="text-color-primery-dark">DMT Different</span></h2>
      </div>
                      <p class="text-size-medium">Five reasons why DMT stands out in the softball cricket world</p>
          </div>
        </div>
                </div>
                <div class="w-layout-grid layout254_content-bottom">
                  <div class="w-layout-grid layout254_left">
                    <div class="layout254_item">
                      <div class="margin-bottom margin-small">
                        <div class="layout254_item-icon-wrapper">
                          <h3 class="grid-number">01</h3>
                        </div>
                      </div>
                      <div class="margin-bottom margin-xsmall">
                        <h3 class="heading-style-h5">Specialized Focus on Softball Cricket</h3>
                      </div>
                      <p>We don’t make generic cricket gear. Every DMT product is designed for the unique demands of softball cricket, ensuring players get the best experience.</p>
                    </div>
                    <div class="layout254_item">
                      <div class="margin-bottom margin-small">
                        <div class="layout254_item-icon-wrapper">
                          <h3 class="grid-number">03</h3>
            </div>
          </div>
                      <div class="margin-bottom margin-xsmall">
                        <h3 class="heading-style-h5">Manufactured with International Standards</h3>
                      </div>
                      <p>Produced in Thailand under strict international standards, DMT gear ensures superior quality that exceeds expectations.</p>
                    </div>
                  </div>
                  <div id="w-node-d6e953d3-cbee-d118-f75e-b6a681304b82-d1a97b45" data-w-id="d6e953d3-cbee-d118-f75e-b6a681304b82" style="opacity:0" class="layout254_image-wrapper"><img sizes="(max-width: 2000px) 100vw, 2000px" srcset="images/dmt_1dmt.avif 500w, images/dmt_1dmt.avif 800w, images/dmt_1.avif 2000w" alt="" src="images/dmt_1.avif" loading="eager" class="layout254_image"></div>
                  <div class="w-layout-grid layout254_right">
                    <div class="layout254_item">
                      <div class="margin-bottom margin-small">
                        <div class="layout254_item-icon-wrapper">
                          <h3 class="grid-number">02</h3>
                        </div>
                      </div>
                      <div class="margin-bottom margin-xsmall">
                        <h3 class="heading-style-h5">Best-Grade Softball Cricket Ball in Sri Lanka</h3>
                      </div>
                      <p>Our softball cricket ball is widely regarded as the best in Sri Lanka, delivering unmatched durability and performance.</p>
                    </div>
                    <div class="layout254_item">
                      <div class="margin-bottom margin-small">
                        <div class="layout254_item-icon-wrapper">
                          <h3 class="grid-number">04</h3>
                        </div>
                      </div>
                      <div class="margin-bottom margin-xsmall">
                        <h3 class="heading-style-h5">Expanding, Accessible, and Affordable Range</h3>
                      </div>
                      <p>From balls to bats and gloves, DMT is building a complete ecosystem of softball cricket gear. Premium quality does not mean high prices and our products remain accessible to all players.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section_cta27 text-color-white">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="cta27_component">
                <div class="text-align-center">
                  <div data-w-id="74a84069-f096-5630-a1ea-cb5e5a741caf" class="max-width-large align-center">
                    <div class="margin-bottom margin-small">
                      <h2 class="heading-style-h1">Ready to Play Like <span class="text-color-primery">Never Before?</span></h2>
                    </div>
                    <p class="text-size-medium">Join thousands of players across Sri Lanka who trust DMT for their cricket gear. Whether you&#x27;re looking to buy, partner, or just learn more, we&#x27;re here to help.</p>
                    <div class="margin-top margin-medium">
                      <div class="button-group is-center">
                        <a href="./our-products" class="button is-100--in-mobile w-button" style="color:white !important;">View All Products</a>
                        <a href="./contact-us" class="button is-secondary is-alternate is-100-in-mobile w-button">Get in Touch</a>
                  </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="cta27_background-image-wrapper">
          <div class="image-overlay-layer--cta"></div><img sizes="(max-width: 1248px) 100vw, 1248px" srcset="images/dmt-ball_1dmt-ball.avif 500w, images/dmt-ball_1.avif 1248w" alt="" src="images/dmt-ball_1.avif" loading="eager" class="cta27_background-image">
        </div>
      </section>
    </main>
    <?php include 'includes/footer-global.php'; ?>
  </div>
  <?php include 'includes/scripts-global.php'; ?>
  
  <!-- Custom Body Scripts -->
  <?php outputBodyScripts(); ?>
</body>
</html>