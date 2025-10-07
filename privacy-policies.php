<?php
require_once 'config/database.php';
require_once 'config/company_helper.php';

try {
    // Get database connection using the function from database.php
    $pdo = getDBConnection();
    
    // Fetch privacy policy content from database
    $stmt = $pdo->prepare("SELECT * FROM legal_pages WHERE page_type = 'privacy-policy'");
    $stmt->execute();
    $privacy_policy = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Fetch all active products ordered by display_order for footer
    $stmt = $pdo->prepare("SELECT * FROM products WHERE status = 'active' ORDER BY display_order ASC, created_at ASC");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $privacy_policy = null;
    $products = [];
    error_log("Error fetching data: " . $e->getMessage());
}

// Set default content if not found in database
if (!$privacy_policy) {
    $privacy_policy = [
        'title' => 'Privacy Policy',
        'content' => '<h3>Information We Collect</h3>
                    <p>We collect information you provide directly to us, such as when you create an account, make a purchase, contact us for support, or communicate with us. This may include your name, email address, phone number, shipping address, and payment information.</p>
                    
                    <h3>How We Use Your Information</h3>
                    <p>We use the information we collect to:</p>
                    <ul role="list">
                      <li>Process and fulfill your orders</li>
                      <li>Provide customer support</li>
                      <li>Send you important updates about your orders</li>
                      <li>Improve our products and services</li>
                      <li>Comply with legal obligations</li>
                    </ul>
                    
                    <h3>Information Sharing</h3>
                    <p>We do not sell, trade, or otherwise transfer your personal information to third parties without your consent, except as described in this policy. We may share your information with trusted third parties who assist us in operating our website, conducting our business, or servicing you.</p>
                    
                    <h3>Data Security</h3>
                    <p>We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. However, no method of transmission over the internet or electronic storage is 100% secure.</p>
                    
                    <h3>Cookies and Tracking</h3>
                    <p>We use cookies and similar tracking technologies to enhance your experience on our website. You can control cookie settings through your browser preferences.</p>
                    
                    <h3>Your Rights</h3>
                    <p>You have the right to access, update, or delete your personal information. You may also opt out of certain communications from us. To exercise these rights, please contact us using the information provided below.</p>
                    
                    <h3>Changes to This Policy</h3>
                    <p>We may update this privacy policy from time to time. We will notify you of any changes by posting the new privacy policy on this page and updating the "Last Updated" date.</p>
                    
                    <h3>Contact Us</h3>
                    <p>If you have any questions about this privacy policy, please contact us at:</p>
                    <p><strong>Email:</strong> <?= getCompanyEmail() ?><br>
                    <strong>Phone:</strong> <?= getCompanyPhone() ?><br>
                    <strong>Address:</strong> <?= getCompanyAddress() ?></p>'
    ];
}
?>
<!DOCTYPE html><!--  This site was created in Webflow. https://webflow.com  --><!--  Last Published: Fri Oct 03 2025 05:25:13 GMT+0000 (Coordinated Universal Time)  -->
<html data-wf-page="68de34a8d08b3d33bc5c56aa" data-wf-site="68ac3916626e46cbd1a97ae5">
<head>
  <meta charset="utf-8">
  <title><?php echo htmlspecialchars($privacy_policy['title']); ?></title>
  <meta content="<?php echo htmlspecialchars(strip_tags($privacy_policy['content'])); ?>" name="description">
  <meta content="<?php echo htmlspecialchars($privacy_policy['title']); ?>" property="og:title">
  <meta content="<?php echo htmlspecialchars(strip_tags($privacy_policy['content'])); ?>" property="og:description">
  <meta content="<?php echo htmlspecialchars($privacy_policy['title']); ?>" property="twitter:title">
  <meta content="<?php echo htmlspecialchars(strip_tags($privacy_policy['content'])); ?>" property="twitter:description">
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
      <section class="section_faq10 color-scheme-6">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="faq10_component">
                <div class="margin-bottom margin-xxlarge">
                  <div data-w-id="8ee10165-4d4f-c81d-706c-a7740c7afad7" class="text-align-center">
                    <div class="max-width-large align-center">
                      <div class="margin-bottom margin-small">
                        <h2 class="heading-style-h1"><?php echo htmlspecialchars($privacy_policy['title']); ?></h2>
                      </div>
                      <p class="text-size-medium">Learn how we protect your personal information and data privacy</p>
                    </div>
                  </div>
                </div>
                <div>
                  <div class="w-richtext">
                    <?php echo $privacy_policy['content']; ?>
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
                          <a href="tel:+94769175175" class="button is-secondary w-button">CALL NOW</a>
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
    <footer class="footer1_component color-scheme-1">
      <div class="padding-global">
        <div class="container-large">
          <div class="padding-vertical padding-xxlarge">
            <div class="padding-bottom padding-xxlarge">
              <div class="w-layout-grid footer1_top-wrapper">
                <div class="footer1_left-wrapper">
                  <div class="margin-bottom margin-small">
                    <a href="/" class="footer1_logo-link w-nav-brand"><img loading="lazy" src="/images/DMT-LOGO-Main.avif" alt="" class="footer1_logo"></a>
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
                      <a href="/" class="footer1_link">Home</a>
                      <a href="/about-us" class="footer1_link">About</a>
                      <a href="/our-products" class="footer1_link">Products</a>
                      <a href="/contact-us" class="footer1_link">Contact</a>
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
                          <a href="/product/<?= htmlspecialchars($product['slug']) ?>" class="footer1_link"><?= htmlspecialchars($displayTitle) ?></a>
                        <?php endforeach; ?>
                      <?php else: ?>
                        <!-- Fallback links when no products are available -->
                        <a href="/product/cricket-softball" class="footer1_link">Cricket Softball</a>
                        <a href="#" class="footer1_link">Cricket Bat</a>
                        <a href="#" class="footer1_link">Cricket Gloves</a>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="footer1_link-column">
                    <div class="margin-bottom margin-xsmall">
                      <div class="footer-menu-titile">Contact Info</div>
                    </div>
                    <div class="footer1_link-list">
                      <a href="tel:+94769175175" class="footer1_social-link w-inline-block"><img src="images/Phone.avif" loading="lazy" alt="" class="icon-embed-xsmall">
                        <div class="conatct-info">+94 769 175 175</div>
                      </a>
                      <a href="mailto:contact@dmt.lk" class="footer1_social-link w-inline-block"><img src="images/Email.avif" loading="lazy" alt="" class="icon-embed-xsmall">
                        <div class="conatct-info">contact@dmt.lk</div>
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
                  <a href="/privacy-policies" aria-current="page" class="footer1_legal-link w--current">Privacy Policy</a>
                  <a href="/terms-conditions" class="footer1_legal-link">Terms of Service</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=68ac3916626e46cbd1a97ae5" type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="js/webflow.js" type="text/javascript"></script>
</body>
</html>