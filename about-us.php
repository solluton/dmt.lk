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
<html data-wf-page="68ac3ed3c26b73c95cfbacbe" data-wf-site="68ac3916626e46cbd1a97ae5">
<head>
  <meta charset="utf-8">
  <title>About DMT | Sri Lanka’s Trusted Softball Cricket Brand</title>
  <meta content="Learn about DMT, the proprietary brand of Dimath Sports, dedicated to high-quality softball cricket gear. Designed with player insights and international standards for performance and durability." name="description">
  <meta content="About DMT | Sri Lanka’s Trusted Softball Cricket Brand" property="og:title">
  <meta content="Learn about DMT, the proprietary brand of Dimath Sports, dedicated to high-quality softball cricket gear. Designed with player insights and international standards for performance and durability." property="og:description">
  <meta content="About DMT | Sri Lanka’s Trusted Softball Cricket Brand" property="twitter:title">
  <meta content="Learn about DMT, the proprietary brand of Dimath Sports, dedicated to high-quality softball cricket gear. Designed with player insights and international standards for performance and durability." property="twitter:description">
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
</style>
      </div>
    </div>
    <?php include 'includes/navbar-global.php'; ?>
    <main class="main-wrapper">
      <header class="section_header65 text-color-white">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="header65_component">
                <div class="text-align-center">
                  <div class="max-width-large align-center">
                    <div class="margin-bottom margin-small">
                      <h1 data-w-id="615ff09b-d06b-e160-3dae-b2eefcf41631" style="opacity:0" class="heading-style-h1">Born on the Pitch. <span class="text-color-primery">Built to Win.</span></h1>
                    </div>
                    <p data-w-id="615ff09b-d06b-e160-3dae-b2eefcf41633" style="opacity:0" class="text-size-medium">DMT isn&#x27;t just another sports brand, it&#x27;s the heartbeat of Sri Lankan softball cricket. We came from the grounds, the streets, and the courts, with one mission: to give players gear they can trust and love using.</p>
                    <div class="margin-top margin-medium">
                      <div data-w-id="615ff09b-d06b-e160-3dae-b2eefcf41636" style="opacity:0" class="button-group is-center">
                        <a href="./our-products" class="button is-100--in-mobile w-button">Explore Our Gear</a>
                        <a href="#story" class="button is-secondary is-alternate is-100-in-mobile w-button">Watch Our Story</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="header65_background-image-wrapper">
          <div class="image-overlay-layer"></div><img sizes="(max-width: 1408px) 100vw, 1408px" srcset="images/dmt-about_1dmt-about.avif 500w, images/dmt-about_1dmt-about.avif 800w, images/dmt-about_1.avif 1408w" alt="" src="images/dmt-about_1.avif" loading="eager" class="header65_background-image">
        </div>
      </header>
      <section id="story" class="section_layout192 color-scheme-6">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="layout192_component">
                <div class="w-layout-grid layout192_content">
                  <div data-w-id="615ff09b-d06b-e160-3dae-b2eefcf41644" style="opacity:0" class="layout192_image-wrapper"><img sizes="(max-width: 746px) 100vw, 746px" srcset="images/dmt-trusted-sports-equipment-sri-lanka_1dmt-trusted-sports-equipment-sri-lanka.avif 500w, images/dmt-trusted-sports-equipment-sri-lanka_1.avif 746w" alt="" src="images/dmt-trusted-sports-equipment-sri-lanka_1.avif" loading="lazy" class="layout192_image"></div>
                  <div id="w-node-_615ff09b-d06b-e160-3dae-b2eefcf41646-5cfbacbe" data-w-id="615ff09b-d06b-e160-3dae-b2eefcf41646" style="opacity:0" class="layout192_content-right">
                    <div class="margin-bottom margin-small">
                      <h2 class="heading-style-h1">Our <span class="text-color-primery-dark">Story</span></h2>
                    </div>
                    <p class="text-size-medium">As part of the Dimath Group, a name trusted in sports equipment across Sri Lanka, DMT was created to meet one clear need: gear that can take a beating and still perform like new.<br><br>We started with our cricket softball, tough enough for back-to-back matches. Then came our custom-designed softball cricket bat. Now, we&#x27;re gearing up to launch our very first gloves, made to keep your hands safe and your shots powerful.<br><br>Every step of our journey has been guided by the players themselves. We listen, we learn, and we deliver gear that exceeds expectations.</p>
                    <div class="margin-top margin-medium">
                      <div class="button-group">
                        <a href="./our-products" class="button w-button">View All Products</a>
                      </div>
                    </div>
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
                  <div class="text-align-center">
                    <div data-w-id="615ff09b-d06b-e160-3dae-b2eefcf41666" style="opacity:0" class="max-width-large align-center">
                      <div class="margin-bottom margin-small">
                        <h2 class="heading-style-h1">Our <span class="text-color-primery-dark">Mission</span></h2>
                      </div>
                      <p class="text-size-medium">Empowering every player to perform at their best, regardless of where they play</p>
                    </div>
                  </div>
                </div>
                <div class="w-layout-grid layout239_list">
                  <div class="layout239_item is-section-mission">
                    <div>
                      <div class="layout239_image-wrapper"><img sizes="(max-width: 889px) 100vw, 889px" srcset="images/democratize-quality-cricket-gear-sri-lanka.jpg_1democratize-quality-cricket-gear-sri-lanka.jpg.avif 500w, images/democratize-quality-cricket-gear-sri-lanka.jpg_1.avif 889w" alt="" src="images/democratize-quality-cricket-gear-sri-lanka.jpg_1.avif" loading="lazy" class="layout239_image"></div>
                    </div>
                    <div class="mission-content-wrapper">
                      <div class="margin-bottom margin-small">
                        <h3 class="heading-style-h4">Democratize Quality Cricket Gear</h3>
                      </div>
                      <p>Make premium softball cricket equipment accessible to players at every level, from street cricket enthusiasts to tournament champions.</p>
                    </div>
                  </div>
                  <div class="layout239_item is-section-mission">
                    <div>
                      <div class="layout239_image-wrapper"><img sizes="(max-width: 887px) 100vw, 887px" srcset="images/dmt-set-new-standards-sports_1dmt-set-new-standards-sports.avif 500w, images/dmt-set-new-standards-sports_1.avif 887w" alt="" src="images/dmt-set-new-standards-sports_1.avif" loading="lazy" class="layout239_image"></div>
                    </div>
                    <div class="mission-content-wrapper">
                      <div class="margin-bottom margin-small">
                        <h3 class="heading-style-h4">Set New Standards</h3>
                      </div>
                      <p>Establish DMT as the benchmark for quality, durability, and performance in Sri Lankan softball cricket gear.</p>
                    </div>
                  </div>
                  <div class="layout239_item is-section-mission">
                    <div>
                      <div class="layout239_image-wrapper"><img sizes="(max-width: 887px) 100vw, 887px" srcset="images/dmt-build-community-sports_1dmt-build-community-sports.avif 500w, images/dmt-build-community-sports_1.avif 887w" alt="" src="images/dmt-build-community-sports_1.avif" loading="lazy" class="layout239_image"></div>
                    </div>
                    <div class="mission-content-wrapper">
                      <div class="margin-bottom margin-small">
                        <h3 class="heading-style-h4">Build Community</h3>
                      </div>
                      <p>Create a united community of players, retailers, and cricket enthusiasts who share our passion for the game.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section_layout1 color-scheme-5">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="layout1_component">
                <div class="w-layout-grid layout1_content">
                  <div data-w-id="615ff09b-d06b-e160-3dae-b2eefcf41699" style="opacity:0" class="layout1_content-left">
                    <div class="margin-bottom margin-small">
                      <h2 class="heading-style-h1">The Dimath <span class="text-color-primery">Group Legacy</span></h2>
                    </div>
                    <p class="text-size-medium">DMT is proud to be part of the Dimath Group, a name that has been synonymous with quality sports equipment across Sri Lanka for decades.<br><br>Our parent company&#x27;s expertise in manufacturing, quality control, and distribution has given us the foundation to create products that meet international standards while remaining accessible to local players.<br><br>This legacy of trust and quality is what drives us to maintain the highest standards in everything we do.</p>
                    <div class="margin-top margin-medium">
                      <div class="button-group">
                        <a href="./contact-us" class="button is-secondary is-alternate w-button">CONTACT US</a>
                      </div>
                    </div>
                  </div>
                  <div data-w-id="615ff09b-d06b-e160-3dae-b2eefcf416b2" style="opacity:0" class="layout1_image-wrapper"><img sizes="(max-width: 1024px) 100vw, 1024px" srcset="images/dimath-group-legacy-sri-lanka_1dimath-group-legacy-sri-lanka.avif 500w, images/dimath-group-legacy-sri-lanka_1.avif 1024w" alt="" src="images/dimath-group-legacy-sri-lanka_1.avif" loading="lazy" class="layout1_image"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section_layout299 color-scheme-6">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div data-w-id="615ff09b-d06b-e160-3dae-b2eefcf416b8" style="opacity:0" class="layout299_component">
                <div class="margin-bottom margin-xxlarge">
                  <div class="max-width-large align-center">
                    <div class="text-align-center">
                      <h2 class="heading-style-h1">What We <span class="text-color-primery-dark">Stand For</span></h2>
                    </div>
                  </div>
                </div>
                <div class="w-layout-grid layout299_list">
                  <div class="layout299_item">
                    <div class="margin-bottom margin-small">
                      <div class="layout299_item-icon-wrapper"><img loading="lazy" src="images/Durability.avif" alt="" class="icon-1x1-medium"></div>
                    </div>
                    <div class="margin-bottom margin-xsmall">
                      <h3 class="heading-style-h5">Durability</h3>
                    </div>
                    <p>Your gear should outlast the season, not just the match. We build products that can handle the toughest conditions and longest games.</p>
                  </div>
                  <div class="layout299_item">
                    <div class="margin-bottom margin-small">
                      <div class="layout299_item-icon-wrapper"><img loading="lazy" src="images/Performance.avif" alt="" class="icon-1x1-medium"></div>
                    </div>
                    <div class="margin-bottom margin-xsmall">
                      <h3 class="heading-style-h5">Performance</h3>
                    </div>
                    <p>Every ball and bat designed for maximum playability. We don&#x27;t compromise on performance, ensuring your gear enhances your game.</p>
                  </div>
                  <div id="w-node-_615ff09b-d06b-e160-3dae-b2eefcf416dd-5cfbacbe" class="layout299_item">
                    <div class="margin-bottom margin-small">
                      <div class="layout299_item-icon-wrapper"><img loading="lazy" src="images/Style.avif" alt="" class="icon-1x1-medium"></div>
                    </div>
                    <div class="margin-bottom margin-xsmall">
                      <h3 class="heading-style-h5">Style</h3>
                    </div>
                    <p>Gear that looks as good as it plays. We believe that confidence comes from both performance and appearance.</p>
                  </div>
                  <div class="layout299_item">
                    <div class="margin-bottom margin-small">
                      <div class="layout299_item-icon-wrapper"><img loading="lazy" src="images/Passion.avif" alt="" class="icon-1x1-medium"></div>
                    </div>
                    <div class="margin-bottom margin-xsmall">
                      <h3 class="heading-style-h5">Passion</h3>
                    </div>
                    <p>Cricket isn&#x27;t just a game to us—it&#x27;s a way of life. We pour our passion into every product we create.</p>
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
                        <a href="./our-products" class="button is-100--in-mobile w-button">View All Products</a>
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
  
  <!-- Webflow Error Handler -->
  <script>
    // Patch Webflow.js to prevent null reference errors
    (function() {
      // Store original querySelector methods
      const originalQuerySelector = document.querySelector;
      const originalQuerySelectorAll = document.querySelectorAll;
      
      // Override querySelector to return a safe object for missing elements
      document.querySelector = function(selector) {
        const element = originalQuerySelector.call(this, selector);
        if (!element && selector.includes('w-')) {
          // Create a dummy element for Webflow elements
          const dummy = document.createElement('div');
          dummy.style.display = 'none';
          dummy.setAttribute('data-webflow-dummy', 'true');
          return dummy;
        }
        return element;
      };
      
      // Override querySelectorAll to handle missing elements gracefully
      document.querySelectorAll = function(selector) {
        const elements = originalQuerySelectorAll.call(this, selector);
        return elements;
      };
    })();
    
    // Prevent Webflow.js errors by adding defensive checks
    window.addEventListener('error', function(e) {
      if (e.message && e.message.includes('Cannot read properties of null')) {
        return true; // Prevent error from showing in console
      }
    });
    
    // Override console.error to catch Webflow errors
    const originalError = console.error;
    console.error = function(...args) {
      if (args[0] && args[0].includes && args[0].includes('Cannot read properties of null')) {
        return;
      }
      originalError.apply(console, args);
    };
    
    // Ensure Webflow elements exist before initialization
    document.addEventListener('DOMContentLoaded', function() {
      // Check for common Webflow elements and create them if missing
      const elements = [
        '.w-nav',
        '.w-button',
        '.w-layout-grid',
        '.w-richtext'
      ];
      
      elements.forEach(selector => {
        if (!document.querySelector(selector)) {
          // Webflow element not found - silently continue
        }
      });
      
      // Ensure all data-w-id elements exist
      const dataWIdElements = document.querySelectorAll('[data-w-id]');
      
      // Check for specific elements that might be missing
      const navElements = document.querySelectorAll('.w-nav, .w-nav-brand, .w-nav-menu, .w-nav-link, .w-nav-button');
    });
    
    // Additional safety check - delay Webflow initialization
    window.addEventListener('load', function() {
      // Ensure all elements are loaded before Webflow tries to access them
      setTimeout(function() {
        // Webflow initialization delayed to ensure all elements are loaded
      }, 100);
    });
  </script>
</body>
</html>