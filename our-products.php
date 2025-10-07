<?php
require_once 'config/database.php';

try {
    // Get database connection using the function from database.php
    $pdo = getDBConnection();
    
    // Fetch all active products ordered by display_order
    $stmt = $pdo->prepare("SELECT * FROM products WHERE status = 'active' ORDER BY display_order ASC, created_at ASC");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $products = [];
    error_log("Error fetching products: " . $e->getMessage());
}
?>
<!DOCTYPE html><!--  This site was created in Webflow. https://webflow.com  --><!--  Last Published: Fri Oct 03 2025 05:25:13 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="68ac3ee366d2683e625bfee1" data-wf-site="68ac3916626e46cbd1a97ae5">
<head>
  <meta charset="utf-8">
  <title>DMT Softball Cricket Gear | Cricket Balls, Bats &amp; Gloves Sri Lanka</title>
  <meta content="Explore DMT's softball cricket gear—Sri Lanka's best-quality cricket balls, designed for performance, durability, and affordability. Soon expanding with bats and gloves for every player." name="description">
  <meta content="DMT Softball Cricket Gear | Cricket Balls, Bats &amp; Gloves Sri Lanka" property="og:title">
  <meta content="Explore DMT's softball cricket gear—Sri Lanka's best-quality cricket balls, designed for performance, durability, and affordability. Soon expanding with bats and gloves for every player." property="og:description">
  <meta content="DMT Softball Cricket Gear | Cricket Balls, Bats &amp; Gloves Sri Lanka" property="twitter:title">
  <meta content="Explore DMT's softball cricket gear—Sri Lanka's best-quality cricket balls, designed for performance, durability, and affordability. Soon expanding with bats and gloves for every player." property="twitter:description">
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
      <header class="section_header65 text-color-white">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large-custom">
              <div class="header65_component">
                <div class="text-align-center">
                  <div class="max-width-large align-center">
                    <div class="margin-bottom margin-small">
                      <h1 data-w-id="056f7a5b-5010-39d5-6576-6e7471c38a6e" style="opacity:0" class="heading-style-h1">The DMT <span class="text-color-primery">Lineup</span></h1>
                    </div>
                    <p data-w-id="056f7a5b-5010-39d5-6576-6e7471c38a70" style="opacity:0" class="text-size-medium">Built for legends in the making. Here&#x27;s what&#x27;s in play and what&#x27;s coming next.<br>In Stock Coming Soon</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="header65_background-image-wrapper">
          <div class="image-overlay-layer"></div><img sizes="(max-width: 1440px) 100vw, 1440px" srcset="images/line-up-dmt_1line-up-dmt.avif 500w, images/line-up-dmt_1.avif 1440w" alt="" src="images/line-up-dmt_1.avif" loading="eager" class="header65_background-image">
        </div>
      </header>
      
      <?php if (!empty($products)): ?>
        <?php foreach ($products as $index => $product): ?>
          <?php 
          // Determine background color based on array index (0-based)
          // If total count is even, ensure last section is white
          $totalProducts = count($products);
          $isLastProduct = ($index === $totalProducts - 1);
          $isEvenCount = ($totalProducts % 2) == 0;
          
          // Normal alternating pattern for layout
          $isOdd = ($index % 2) == 0; // 0, 2, 4... are "odd" positions (first, third, fifth...)
          
          // Determine section class (background color)
          if ($isLastProduct && $isEvenCount) {
            // Last product with even total count should have white background but keep navy layout
            $sectionClass = 'section_layout192 color-scheme-6'; // Navy layout with white background
          } else {
            // Normal alternating pattern
            $sectionClass = $isOdd ? 'section_layout1 color-scheme-6' : 'section_layout192 color-scheme-5';
          }
          
          $layoutClass = $isOdd ? 'layout1_content' : 'layout192_content';
          
          // Parse features from JSON
          $features = json_decode($product['features_json'] ?? '[]', true) ?: [];
          $tags = array_slice($features, 0, 3); // Take first 3 features as tags
          
          // Parse tags from comma-separated string
          $productTags = !empty($product['tags']) ? explode(',', $product['tags']) : [];
          $productTags = array_map('trim', $productTags);
          $productTags = array_slice($productTags, 0, 3); // Take first 3 tags
          ?>
          
          <section class="<?= $sectionClass ?>">
            <div class="padding-global">
              <div class="container-large">
                <div class="padding-section-large">
                  <div class="<?= $isOdd ? 'layout1_component' : 'layout192_component' ?>">
                    <div class="w-layout-grid <?= $layoutClass ?>">
                      <?php if ($isOdd): ?>
                        <!-- Left content for odd display_order -->
                        <div data-w-id="056f7a5b-5010-39d5-6576-6e7471c38a83" style="opacity:0" class="layout1_content-left">
                          <div class="margin-bottom margin-small">
                            <h2 class="heading-style-h1"><?= htmlspecialchars($product['title_black'] ?? '') ?> <span class="text-color-primery-dark"><?= htmlspecialchars($product['title_green'] ?? '') ?></span></h2>
                          </div>
                          <?php if (!empty($productTags)): ?>
                            <div class="margin-bottom margin-small">
                              <div class="products-tag-wrapper">
                                <?php foreach ($productTags as $tag): ?>
                                  <div class="product-tag">
                                    <div><?= htmlspecialchars($tag) ?></div>
                                  </div>
                                <?php endforeach; ?>
                              </div>
                            </div>
                          <?php endif; ?>
                          <?php if (!empty($product['tagline'])): ?>
                            <div class="margin-bottom margin-small">
                              <div class="is-product-tagline">"<?= htmlspecialchars($product['tagline']) ?>"</div>
                            </div>
                          <?php endif; ?>
                          <p class="text-size-medium"><?= htmlspecialchars($product['description'] ?? '') ?></p>
                          <div class="margin-top margin-medium">
                            <div class="button-group">
                              <a href="./product/<?= htmlspecialchars($product['slug']) ?>" class="button w-button">View Details</a>
                              <?php if ($product['enable_order_now'] ?? true): ?>
                              <a href="./contact-us" class="button is-link is-icon w-inline-block">
                                <div>Order now</div>
                                <div class="icon-embed-xxsmall w-embed"><svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 3L11 8L6 13" stroke="CurrentColor" stroke-width="1.5"></path>
                                  </svg></div>
                              </a>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>
                        <div data-w-id="056f7a5b-5010-39d5-6576-6e7471c38aa2" style="opacity:0" class="layout1_image-wrapper">
                          <img loading="lazy" src="<?= htmlspecialchars($product['main_image'] ?? 'images/dmt-line-up_1.avif') ?>" alt="<?= htmlspecialchars($product['title'] ?? 'Product Image') ?>" class="layout1_image">
                        </div>
                      <?php else: ?>
                        <!-- Right content for even display_order -->
                        <div data-w-id="056f7a5b-5010-39d5-6576-6e7471c38aaa" style="opacity:0" class="layout192_image-wrapper">
                          <img loading="lazy" src="<?= htmlspecialchars($product['main_image'] ?? 'images/dmt-bat_1.avif') ?>" alt="<?= htmlspecialchars($product['title'] ?? 'Product Image') ?>" class="layout192_image">
                        </div>
                        <div id="w-node-_056f7a5b-5010-39d5-6576-6e7471c38aac-625bfee1" data-w-id="056f7a5b-5010-39d5-6576-6e7471c38aac" style="opacity:0" class="layout192_content-right">
                          <div class="margin-bottom margin-small">
                            <h2 class="heading-style-h1"><?= htmlspecialchars($product['title_black'] ?? '') ?> <span class="text-color-primery"><?= htmlspecialchars($product['title_green'] ?? '') ?></span></h2>
                          </div>
                          <?php if (!empty($productTags)): ?>
                            <div class="margin-bottom margin-small">
                              <div class="products-tag-wrapper">
                                <?php foreach ($productTags as $tag): ?>
                                  <div class="product-tag is-alternate">
                                    <div><?= htmlspecialchars($tag) ?></div>
                                  </div>
                                <?php endforeach; ?>
                              </div>
                            </div>
                          <?php endif; ?>
                          <?php if (!empty($product['tagline'])): ?>
                            <div class="margin-bottom margin-small">
                              <div class="is-product-tagline">"<?= htmlspecialchars($product['tagline']) ?>"</div>
                            </div>
                          <?php endif; ?>
                          <p class="text-size-medium"><?= htmlspecialchars($product['description'] ?? '') ?></p>
                          <div class="margin-top margin-medium">
                            <div class="button-group">
                              <a href="./product/<?= htmlspecialchars($product['slug']) ?>" class="button w-button">View Details</a>
                              <?php if ($product['enable_order_now'] ?? true): ?>
                              <a href="./contact-us" class="button is-link is-icon w-inline-block">
                                <div>Order now</div>
                                <div class="icon-embed-xxsmall w-embed"><svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 3L11 8L6 13" stroke="CurrentColor" stroke-width="1.5"></path>
                                  </svg></div>
                              </a>
                              <?php endif; ?>
                            </div>
                          </div>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        <?php endforeach; ?>
      <?php else: ?>
        <!-- Fallback content when no products are available -->
        <section class="section_layout1 color-scheme-6">
          <div class="padding-global">
            <div class="container-large">
              <div class="padding-section-large">
                <div class="layout1_component">
                  <div class="w-layout-grid layout1_content">
                    <div data-w-id="056f7a5b-5010-39d5-6576-6e7471c38a83" style="opacity:0" class="layout1_content-left">
                      <div class="margin-bottom margin-small">
                        <h2 class="heading-style-h1">DMT Cricket <span class="text-color-primery-dark">Softball</span></h2>
                      </div>
                      <div class="margin-bottom margin-small">
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
                      <div class="margin-bottom margin-small">
                        <div class="is-product-tagline">"The Ball That Never Quits"</div>
                      </div>
                      <p class="text-size-medium">Designed for durability and enhanced playability, the DMT Cricket Softball is oxygenated for long-lasting bounce and consistency. From dusty streets to proper grounds, this ball keeps its shape, feel, and performance match after match. It's the best in the market for players who refuse to settle.</p>
                      <div class="margin-top margin-medium">
                        <div class="button-group">
                          <a href="/product/cricket-softball" class="button w-button">View Details</a>
                          <a href="./contact-us" class="button is-link is-icon w-inline-block">
                            <div>Order now</div>
                            <div class="icon-embed-xxsmall w-embed"><svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6 3L11 8L6 13" stroke="CurrentColor" stroke-width="1.5"></path>
                              </svg></div>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div data-w-id="056f7a5b-5010-39d5-6576-6e7471c38aa2" style="opacity:0" class="layout1_image-wrapper"><img loading="lazy" src="images/dmt-line-up_1.avif" alt="" class="layout1_image"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      <?php endif; ?>
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
                            <div class="testimonial19_client-image-wrapper"><img loading="lazy" src="images/feedback--4.avif" alt="" class="testimonial19_customer-image"></div>
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
                            <div class="testimonial19_client-image-wrapper"><img loading="lazy" src="images/feedback--2.avif" alt="" class="testimonial19_customer-image"></div>
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
                            <div class="testimonial19_client-image-wrapper"><img loading="lazy" src="images/feedback-.avif" alt="" class="testimonial19_customer-image"></div>
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
                            <div class="testimonial19_client-image-wrapper"><img loading="lazy" src="images/feedback--3.avif" alt="" class="testimonial19_customer-image"></div>
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
                            <div class="testimonial19_client-image-wrapper"><img loading="lazy" src="images/feedback--1.avif" alt="" class="testimonial19_customer-image"></div>
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
      <section class="section_layout237 color-scheme-6">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="layout237_component">
                <div class="margin-bottom margin-xxlarge">
                  <div class="text-align-center">
                    <div data-w-id="056f7a5b-5010-39d5-6576-6e7471c38b99" style="opacity:0" class="max-width-large align-center">
                      <div class="margin-bottom margin-small">
                        <h2 class="heading-style-h1">Why DMT <span class="text-color-primery-dark">Products Stand Out</span></h2>
                      </div>
                      <p class="text-size-medium">Engineered for excellence, built for champions</p>
                    </div>
                  </div>
                </div>
                <div class="w-layout-grid layout237_list">
                  <div class="layout237_item">
                    <div class="margin-bottom margin-small">
                      <div class="layout237_item-icon-wrapper"><img loading="lazy" src="images/Specialized-for-Softball-Cricket.avif" alt="" class="icon-1x1-medium"></div>
                    </div>
                    <div class="margin-bottom margin-small">
                      <h3 class="heading-style-h4">Specialized for Softball Cricket</h3>
                    </div>
                    <p>Every DMT product is specifically designed for the unique demands of softball cricket, not generic cricket gear.</p>
                  </div>
                  <div class="layout237_item">
                    <div class="margin-bottom margin-small">
                      <div class="layout237_item-icon-wrapper"><img loading="lazy" src="images/Best-Grade-Quality.avif" alt="" class="icon-1x1-medium"></div>
                    </div>
                    <div class="margin-bottom margin-small">
                      <h3 class="heading-style-h4">Best-Grade Quality</h3>
                    </div>
                    <p>Our cricket softball is currently regarded as the best in Sri Lanka, with unmatched durability and performance.</p>
                  </div>
                  <div class="layout237_item">
                    <div class="margin-bottom margin-small">
                      <div class="layout237_item-icon-wrapper"><img loading="lazy" src="images/International-Standards.avif" alt="" class="icon-1x1-medium"></div>
                    </div>
                    <div class="margin-bottom margin-small">
                      <h3 class="heading-style-h4">International Standards</h3>
                    </div>
                    <p>Manufactured in Thailand with superior quality, combining international standards with local insights.</p>
                  </div>
                  <div class="layout237_item">
                    <div class="margin-bottom margin-small">
                      <div class="layout237_item-icon-wrapper"><img loading="lazy" src="images/Expanding-Range.avif" alt="" class="icon-1x1-medium"></div>
                    </div>
                    <div class="margin-bottom margin-small">
                      <h3 class="heading-style-h4">Expanding Range</h3>
                    </div>
                    <p>Creating a complete ecosystem of DMT softball cricket gear - balls, bats, and gloves working together.</p>
                  </div>
                  <div class="layout237_item">
                    <div class="margin-bottom margin-small">
                      <div class="layout237_item-icon-wrapper"><img loading="lazy" src="images/Affordable-Premium.avif" alt="" class="icon-1x1-medium"></div>
                    </div>
                    <div class="margin-bottom margin-small">
                      <h3 class="heading-style-h4">Affordable Premium</h3>
                    </div>
                    <p>Premium quality doesn&#x27;t mean premium prices. DMT gear is accessible to players at every level.</p>
                  </div>
                  <div class="layout237_item">
                    <div class="margin-bottom margin-small">
                      <div class="layout237_item-icon-wrapper"><img loading="lazy" src="images/Local-Support.avif" alt="" class="icon-1x1-medium"></div>
                    </div>
                    <div class="margin-bottom margin-small">
                      <h3 class="heading-style-h4">Local Support</h3>
                    </div>
                    <p>Backed by the Dimath Group&#x27;s legacy in sports gear, trusted across Sri Lanka for quality and performance.</p>
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
                        <a href="./our-products" aria-current="page" class="button is-100--in-mobile w-button w--current">View All Products</a>
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
</body>
</html>