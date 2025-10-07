<?php
require_once 'config/database.php';
require_once 'config/company_helper.php';

try {
    // Get database connection using the function from database.php
    $pdo = getDBConnection();
    
    // Fetch terms and conditions content from database
    $stmt = $pdo->prepare("SELECT * FROM legal_pages WHERE page_type = 'terms-conditions'");
    $stmt->execute();
    $terms_conditions = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Fetch all active products ordered by display_order for footer
    $stmt = $pdo->prepare("SELECT * FROM products WHERE status = 'active' ORDER BY display_order ASC, created_at ASC");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $terms_conditions = null;
    $products = [];
    error_log("Error fetching data: " . $e->getMessage());
}

// Set default content if not found in database
if (!$terms_conditions) {
    $terms_conditions = [
        'title' => 'Terms and Conditions',
        'content' => '<h3>Terms and Conditions</h3>
                    <p>Welcome to DMT Cricket. These terms and conditions outline the rules and regulations for the use of our website and services.</p>
                    
                    <h3>Acceptance of Terms</h3>
                    <p>By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement.</p>
                    
                    <h3>Use License</h3>
                    <p>Permission is granted to temporarily download one copy of the materials on DMT Cricket\'s website for personal, non-commercial transitory viewing only.</p>
                    
                    <h3>Disclaimer</h3>
                    <p>The materials on DMT Cricket\'s website are provided on an \'as is\' basis. DMT Cricket makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</p>
                    
                    <h3>Limitations</h3>
                    <p>In no event shall DMT Cricket or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on DMT Cricket\'s website, even if DMT Cricket or a DMT Cricket authorized representative has been notified orally or in writing of the possibility of such damage.</p>
                    
                    <h3>Accuracy of Materials</h3>
                    <p>The materials appearing on DMT Cricket\'s website could include technical, typographical, or photographic errors. DMT Cricket does not warrant that any of the materials on its website are accurate, complete, or current.</p>
                    
                    <h3>Links</h3>
                    <p>DMT Cricket has not reviewed all of the sites linked to our website and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by DMT Cricket of the site.</p>
                    
                    <h3>Modifications</h3>
                    <p>DMT Cricket may revise these terms of service for its website at any time without notice. By using this website you are agreeing to be bound by the then current version of these terms of service.</p>
                    
                    <h3>Contact Information</h3>
                    <p>If you have any questions about these Terms and Conditions, please contact us at:</p>
                    <p><strong>Email:</strong> <?= getCompanyEmail() ?><br>
                    <strong>Phone:</strong> <?= getCompanyPhone() ?><br>
                    <strong>Address:</strong> <?= getCompanyAddress() ?></p>'
    ];
}
?>
<!DOCTYPE html><!--  This site was created in Webflow. https://webflow.com  --><!--  Last Published: Fri Oct 03 2025 05:25:13 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="68de32e69fa68252e418724c" data-wf-site="68ac3916626e46cbd1a97ae5">
<head>
  <meta charset="utf-8">
  <title><?php echo htmlspecialchars($terms_conditions['title']); ?> - DMT Cricket</title>
  <meta content="<?php echo htmlspecialchars(strip_tags($terms_conditions['content'])); ?>" name="description">
  <meta content="<?php echo htmlspecialchars($terms_conditions['title']); ?>" property="og:title">
  <meta content="<?php echo htmlspecialchars(strip_tags($terms_conditions['content'])); ?>" property="og:description">
  <meta content="<?php echo htmlspecialchars($terms_conditions['title']); ?>" property="twitter:title">
  <meta content="<?php echo htmlspecialchars(strip_tags($terms_conditions['content'])); ?>" property="twitter:description">
  <meta property="og:type" content="website">
  <meta content="summary_large_image" name="twitter:card">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/webflow.css" rel="stylesheet" type="text/css">
  <link href="css/dmt-lk.webflow.css" rel="stylesheet" type="text/css">
  <script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
  <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon"><!--  Keep this css code to improve the font quality -->
  <style>
  * {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  -o-font-smoothing: antialiased;
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
  padding-bottom: 0rem !important;
  padding-left: 0rem !important;
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
      <section class="section_faq10 color-scheme-6">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="faq10_component">
                <div class="margin-bottom margin-xxlarge">
                  <div data-w-id="8ee10165-4d4f-c81d-706c-a7740c7afad7" class="text-align-center">
                    <div class="max-width-large align-center">
                      <div class="margin-bottom margin-small">
                        <h2 class="heading-style-h1"><?php echo htmlspecialchars($terms_conditions['title']); ?></h2>
                      </div>
                      <p class="text-size-medium">Please read these terms and conditions carefully before using our website</p>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="w-richtext">
                    <?php echo $terms_conditions['content']; ?>
            </div>
                </div>
                <div class="margin-top margin-xxlarge">
                  <div class="text-align-center">
                    <div data-w-id="8ee10165-4d4f-c81d-706c-a7740c7afb47" class="max-width-medium align-center">
                      <div class="margin-bottom margin-xsmall">
                        <h3 class="heading-style-h4">Still have <span class="text-color-primery-dark">questions?</span></h3>
            </div>
                      <p class="text-size-medium">Call us today, one of our immediate assistants</p>
                      <div class="margin-top margin-medium">
                        <div class="button-group is-center">
                          <a href="<?= getCompanyPhoneHref() ?>" class="button is-secondary w-button">CALL NOW</a>
            </div>
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
    <?php include 'includes/footer-global.php'; ?>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=68ac3916626e46cbd1a97ae5" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
</body>
</html>