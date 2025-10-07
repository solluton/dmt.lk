<?php
// Contact form will be handled by contact-handler.php
$successMessage = '';
$errorMessage = '';
$successClass = '';
$errorClass = '';

// Check for success/error messages from contact handler redirect
if (isset($_GET['success'])) {
    $successMessage = 'Thank you! Your inquiry has been received and we will get back to you within 24 hours.';
    $successClass = 'w-form-done';
} elseif (isset($_GET['error'])) {
    $errorMessage = 'Sorry, there was an error submitting your inquiry. Please try again or contact us directly.';
    $errorClass = 'w-form-fail';
}

require_once 'config/database.php';
require_once 'config/company_helper.php';

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
<html data-wf-page="68ac3f0649ea72245c72595e" data-wf-site="68ac3916626e46cbd1a97ae5">
<head>
  <meta charset="utf-8">
  <title>Contact DMT | Buy Softball Cricket Gear in Sri Lanka</title>
  <meta content="Get in touch with DMT for softball cricket gear. Find retailers across Sri Lanka or contact us via phone, WhatsApp, or email. Your trusted partner for cricket equipment." name="description">
  <meta content="Contact DMT | Buy Softball Cricket Gear in Sri Lanka" property="og:title">
  <meta content="Get in touch with DMT for softball cricket gear. Find retailers across Sri Lanka or contact us via phone, WhatsApp, or email. Your trusted partner for cricket equipment." property="og:description">
  <meta content="Contact DMT | Buy Softball Cricket Gear in Sri Lanka" property="twitter:title">
  <meta content="Get in touch with DMT for softball cricket gear. Find retailers across Sri Lanka or contact us via phone, WhatsApp, or email. Your trusted partner for cricket equipment." property="twitter:description">
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
                      <h1 data-w-id="8ee10165-4d4f-c81d-706c-a7740c7afa57" style="opacity:0" class="heading-style-h1">Let&#x27;s Talk <span class="text-color-primery">Cricket</span></h1>
                    </div>
                    <p data-w-id="8ee10165-4d4f-c81d-706c-a7740c7afa59" style="opacity:0" class="text-size-medium">Retailer? Player? Fan? We&#x27;d love to hear from you. Whether you have questions about our products, want to partner with us, or just want to say hello, we&#x27;re here to help.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="header65_background-image-wrapper">
          <div class="image-overlay-layer"></div><img sizes="(max-width: 1792px) 100vw, 1792px" srcset="images/cta-dmt_1cta-dmt.avif 500w, images/cta-dmt_1cta-dmt.avif 800w, images/cta-dmt_1.avif 1792w" alt="" src="images/cta-dmt_1.avif" loading="eager" class="header65_background-image">
        </div>
      </header>
      <section class="section_contact8 color-scheme-6">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="contact8_component">
                <div class="w-layout-grid contact8_content">
                  <div data-w-id="8ee10165-4d4f-c81d-706c-a7740c7afa6a" style="opacity:0" class="contact8_content-left">
                    <div class="margin-bottom margin-medium">
                      <div class="contact8_heading-wrapper">
                        <div class="margin-bottom margin-small">
                          <h2 class="heading-style-h1">Contact <span class="text-color-primery-dark">us</span></h2>
                        </div>
                        <p class="text-size-medium">Use our contact form to get in touch with us directly.</p>
                        
                        <?php if (!empty($successMessage) || !empty($errorMessage)): ?>
                        <div style="background: <?= !empty($successMessage) ? '#d4edda' : '#f8d7da' ?>; padding: 15px; margin: 20px 0; border: 1px solid <?= !empty($successMessage) ? '#c3e6cb' : '#f5c6cb' ?>; border-radius: 5px;">
                            <?php if (!empty($successMessage)): ?>
                            <p style="color: #155724; margin: 0;"><strong>✅ Success!</strong> <?= htmlspecialchars($successMessage) ?></p>
                            <?php endif; ?>
                            <?php if (!empty($errorMessage)): ?>
                            <p style="color: #721c24; margin: 0;"><strong>❌ Error:</strong> <?= htmlspecialchars($errorMessage) ?></p>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="contact8_form-block w-form">
                      <!-- Message Container -->
                      <div id="form-message" class="form-message" style="display: none; margin-bottom: 20px; padding: 15px; border-radius: 5px;"></div>
                      
                      <form id="contact-form" name="contact-form" data-name="DMT Inquiry" class="contact8_form">
                        <?php 
                        // Add CSRF token for security
                        require_once 'config/csrf.php';
                        echo getCSRFTokenField();
                        ?>
                        <div class="form_field-wrapper"><label for="Name" class="form_field-label">Name<span class="text-color-red">*</span></label><input class="form_input w-input" maxlength="100" name="Name" data-name="Name" placeholder="Your full name" type="text" id="Name" required="" pattern="[a-zA-Z\s\.\-\']+" title="Name can only contain letters, spaces, dots, hyphens, and apostrophes"></div>
                        <div class="form_field-wrapper"><label for="Email" class="form_field-label">Email<span class="text-color-red">*</span></label><input class="form_input w-input" maxlength="255" name="Email" data-name="Email" placeholder="you@example.com" type="email" id="Email" required=""></div>
                        <div class="form_field-wrapper"><label for="Phone" class="form_field-label">Phone<span class="text-color-red">*</span></label><input class="form_input w-input" maxlength="20" name="Phone" data-name="Phone" placeholder="<?= getCompanyPhone() ?>" type="tel" id="Phone" required="" pattern="[\d\+\-\s\(\)]+" title="Please enter a valid phone number"></div>
                        <div class="form_field-wrapper"><label for="Reason" class="form_field-label">Reason</label><select id="Reason" name="Reason" data-name="Reason" class="form_input is-select-input w-select">
                            <option value="">Select one...</option>
                            <option value="Request Sample">Request Sample</option>
                            <option value="Book A Call">Book A Call</option>
                            <option value="Custom Order">Custom Order</option>
                            <option value="Other">Other</option>
                          </select></div>
                        <div class="form_field-wrapper"><label for="Message" class="form_field-label">Message<span class="text-color-red">*</span></label><textarea id="Message" name="Message" maxlength="5000" data-name="Message" placeholder="Write your message here…" required="" class="form_input is-text-area w-input" minlength="10" title="Message must be at least 10 characters long"></textarea></div>
                        <div class="margin-bottom margin-xsmall"><label id="Contact-8-Checkbox" class="w-checkbox form_checkbox">
                            <div class="w-checkbox-input w-checkbox-input--inputType-custom form_checkbox-icon"></div><input type="checkbox" name="Contact-8-Checkbox" id="Contact 8 Checkbox" data-name="Contact 8 Checkbox" required="" style="opacity:0;position:absolute;z-index:-1"><span for="Contact-8-Checkbox" class="form_checkbox-label w-form-label">I accept the <a href="./terms-conditions" class="text-style-link">Terms</a></span>
                          </label></div><input type="submit" data-wait="Please wait..." id="w-node-_8ee10165-4d4f-c81d-706c-a7740c7afa8a-5c72595e" class="button w-button" value="SEND MESSAGE">
                      </form>
                    </div>
                  </div>
                  <div class="contact8_map-wrapper">
                    <div data-w-id="80a21315-38db-36cf-2512-5ff69134107f" style="opacity:0" class="contact8_map w-embed w-iframe"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6993.245610544371!2d80.11945492287171!3d6.228988356205903!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae179538814d855%3A0xbcb7bf34a6da9e9!2sFactory%20-%20Dimath%20Sports%20(Private)%20Limited!5e0!3m2!1sen!2slk!4v1757915297881!5m2!1sen!2slk" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section_contact22 color-scheme-5">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="contact22_component">
                <div class="w-layout-grid contact22_grid-list">
                  <div class="contact22_item">
                    <div class="margin-bottom margin-small">
                      <div class="contact22_icon-wrapper">
                        <div class="text-color-primery">
                          <div class="icon-embed-medium w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 24 24" fill="none" preserveaspectratio="xMidYMid meet" aria-hidden="true" role="img">
                              <path d="M3.05359 5.74219V18.9463H20.9462V6.13867L20.1708 6.64844L12.2147 11.8867C12.1544 11.9184 12.102 11.944 12.0565 11.9619C12.0534 11.9629 12.0366 11.9678 11.9999 11.9678C11.9626 11.9678 11.946 11.9628 11.9432 11.9619C11.8975 11.9439 11.8448 11.9186 11.7841 11.8867L4.05359 6.7959V6.39648L11.7264 11.4219L11.9999 11.6016L12.2733 11.4229L20.62 5.97266L21.6307 5.31152C21.6464 5.38933 21.6551 5.46973 21.6552 5.55371V18.4463C21.6552 18.7675 21.5429 19.041 21.2938 19.2891C21.0449 19.5371 20.7701 19.6494 20.4462 19.6494H3.55359C3.23187 19.6494 2.95869 19.5371 2.71082 19.2891L2.6239 19.1953C2.43623 18.9725 2.35046 18.7279 2.35046 18.4463V5.55371C2.35048 5.46519 2.35953 5.38047 2.37683 5.29883L3.05359 5.74219ZM3.55359 4.34473H20.4462C20.7696 4.34473 21.0438 4.4579 21.2928 4.70703H21.2938C21.4035 4.81669 21.485 4.93216 21.5438 5.05371H2.46082C2.5195 4.93172 2.60127 4.81595 2.71082 4.70605H2.71179C2.95976 4.45718 3.23251 4.34476 3.55359 4.34473Z" fill="currentColor" stroke="currentColor"></path>
                            </svg></div>
                        </div>
                      </div>
                    </div>
                    <div class="margin-bottom margin-xsmall">
                      <h3 class="heading-style-h4">Email</h3>
                    </div>
                    <p>Reach out to us anytime with your questions or concerns.</p>
                    <div class="margin-top margin-small">
                      <a href="mailto:contact@dmt.lk" class="text-style-link">contact@dmt.lk</a>
                    </div>
                  </div>
                  <div class="contact22_item">
                    <div class="margin-bottom margin-small">
                      <div class="contact22_icon-wrapper">
                        <div class="text-color-primery">
                          <div class="icon-embed-medium w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 24 24" fill="none" preserveaspectratio="xMidYMid meet" aria-hidden="true" role="img">
                              <path d="M4.11902 3.34473H7.61902C7.80275 3.34474 7.93038 3.39945 8.03503 3.49805C8.12854 3.58614 8.20705 3.70059 8.2655 3.85156L8.31726 4.01465L8.9823 7.02832C9.01497 7.26011 9.00744 7.44511 8.97253 7.5918C8.94139 7.72276 8.8796 7.83104 8.78015 7.92578L8.77332 7.93164L6.25574 10.415L5.97644 10.6904L6.17664 11.0264C6.60337 11.7435 7.05685 12.416 7.53699 13.042C8.01981 13.6715 8.55599 14.2696 9.14441 14.8369C9.75779 15.4701 10.399 16.0453 11.0682 16.5605C11.7434 17.0804 12.4488 17.5353 13.1844 17.9248L13.5155 18.0996L13.7762 17.832L16.1815 15.3643L16.1913 15.3535C16.3309 15.2021 16.4775 15.111 16.6337 15.0645C16.7647 15.0256 16.8944 15.012 17.0253 15.0215L17.1571 15.0391L19.9774 15.6631C20.1431 15.7092 20.2749 15.7806 20.3817 15.875L20.4813 15.9775C20.5981 16.1186 20.6552 16.2764 20.6552 16.4707V19.8809C20.6552 20.1178 20.581 20.2895 20.4374 20.4316C20.2909 20.5766 20.1181 20.6494 19.8866 20.6494C18.0114 20.6494 16.0911 20.1991 14.1219 19.2842C12.1538 18.3698 10.3229 17.0691 8.62976 15.376C7.0427 13.7889 5.79967 12.0798 4.89539 10.249L4.71863 9.88086C3.80159 7.90938 3.35046 5.99008 3.35046 4.11914C3.35048 3.94128 3.39174 3.79881 3.47351 3.67773L3.56921 3.56348C3.71327 3.41863 3.88502 3.34473 4.11902 3.34473ZM4.06628 4.5752C4.09721 5.28818 4.20923 6.0365 4.39929 6.81836C4.59086 7.60639 4.89058 8.47618 5.2948 9.4248L5.58386 10.1035L6.1073 9.58301L8.12683 7.5752L8.32019 7.38281L8.26257 7.11621L7.69421 4.44922L7.60925 4.05371H4.04382L4.06628 4.5752ZM19.9462 16.377L19.5477 16.2949L17.0624 15.7803L16.7909 15.7246L16.5985 15.9248L14.6356 17.9824L14.1542 18.4863L14.787 18.7812C15.4818 19.1045 16.2353 19.3664 17.0448 19.5693C17.8555 19.7725 18.6477 19.8945 19.4208 19.9336L19.9462 19.96V16.377Z" fill="currentColor" stroke="currentColor"></path>
                            </svg></div>
                        </div>
                      </div>
                    </div>
                    <div class="margin-bottom margin-xsmall">
                      <h3 class="heading-style-h4">Phone</h3>
                    </div>
                    <p>Call us for immediate assistance or inquiries.</p>
                    <div class="margin-top margin-small">
                      <a href="<?= getCompanyPhoneHref() ?>" class="text-style-link"><?= getCompanyPhone() ?></a>
                    </div>
                  </div>
                  <div class="contact22_item">
                    <div class="margin-bottom margin-small">
                      <div class="contact22_icon-wrapper">
                        <div class="text-color-primery">
                          <div class="icon-embed-medium w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 48 48" fill="none" preserveaspectratio="xMidYMid meet" aria-hidden="true" role="img">
                              <path d="M7.10742 4.18945H40.8926C41.7095 4.18945 42.3892 4.47028 42.96 5.04102C43.5306 5.61172 43.8115 6.29158 43.8115 7.1084V32.875C43.8115 33.6784 43.5314 34.3539 42.959 34.9277C42.3881 35.5003 41.709 35.7822 40.8926 35.7822H29.0645L28.917 36.0049L25.002 41.8828L24.999 41.8877C24.8725 42.0816 24.7232 42.2186 24.5527 42.3125C24.3775 42.4089 24.1955 42.4561 24 42.4561C23.8006 42.456 23.6177 42.4085 23.4434 42.3125C23.2737 42.2191 23.1271 42.0829 23.0039 41.8906L22.999 41.8838L19.085 36.0049L18.9365 35.7822H7.10742C6.29515 35.7822 5.61932 35.5008 5.05078 34.9287H5.0498C4.47958 34.355 4.20117 33.6789 4.20117 32.875V7.1084L4.21387 6.80762C4.27528 6.12219 4.55231 5.53928 5.0498 5.04004C5.61825 4.46966 6.29461 4.18951 7.10742 4.18945ZM6.5957 33.375H20.2148L23.583 38.458L24 39.0869L24.417 38.458L27.7852 33.375H41.4043V6.5957H6.5957V33.375Z" fill="currentColor" stroke="currentColor"></path>
                            </svg></div>
                        </div>
                      </div>
                    </div>
                    <div class="margin-bottom margin-xsmall">
                      <h3 class="heading-style-h4">Follow Us</h3>
                    </div>
                    <p>Stay updated with the latest DMT news and cricket content</p>
                    <div class="margin-top margin-small">
                      <div class="social-links-wrpper">
                        <a href="#" class="text-style-link">Facebook</a>
                        <a href="#" class="text-style-link">Instagram</a>
                      </div>
                    </div>
                  </div>
                  <div class="contact22_item">
                    <div class="margin-bottom margin-small">
                      <div class="contact22_icon-wrapper">
                        <div class="text-color-primery">
                          <div class="icon-embed-medium w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 24 24" fill="none" preserveaspectratio="xMidYMid meet" aria-hidden="true" role="img">
                              <path d="M11.9999 2.34473C14.0242 2.34473 15.8029 3.04933 17.3553 4.47754C18.8789 5.87913 19.6552 7.7626 19.6552 10.1826C19.6551 11.1679 19.4382 12.1526 18.996 13.1406C18.5425 14.154 17.9734 15.1246 17.288 16.0527C16.5966 16.9889 15.8458 17.8627 15.035 18.6738C14.212 19.4974 13.4447 20.2259 12.7333 20.8594L12.7274 20.8643L12.7225 20.8691C12.632 20.9548 12.5274 21.017 12.4052 21.0566C12.2587 21.1041 12.1215 21.126 11.9921 21.126C11.8628 21.126 11.7292 21.104 11.5897 21.0576C11.474 21.0191 11.3759 20.959 11.2899 20.875L11.2811 20.8662L11.2714 20.8584C10.5564 20.2252 9.78741 19.497 8.96472 18.6738C8.15398 17.8627 7.40315 16.9889 6.71179 16.0527C6.02653 15.1248 5.45811 14.1547 5.00671 13.1416C4.56634 12.1534 4.35052 11.1682 4.35046 10.1826C4.35046 7.76231 5.12659 5.8791 6.64832 4.47754C8.19864 3.04953 9.9756 2.34475 11.9999 2.34473ZM11.9999 3.05371C10.0646 3.05371 8.40981 3.72261 7.06824 5.05664C5.71865 6.39887 5.05359 8.12233 5.05359 10.1826C5.0537 11.6021 5.6475 13.1413 6.75183 14.7861C7.85668 16.4317 9.49736 18.2606 11.6591 20.2715L11.996 20.585L12.3358 20.2764C14.5486 18.2689 16.2062 16.4381 17.2889 14.7852C18.3677 13.138 18.9461 11.5989 18.9462 10.1826C18.9462 8.12228 18.2812 6.39888 16.9315 5.05664V5.05566C15.5897 3.72177 13.935 3.05375 11.9999 3.05371ZM11.9979 8.70215C12.3641 8.7022 12.6619 8.82522 12.9188 9.08105C13.175 9.33617 13.2977 9.63248 13.2977 9.99805C13.2977 10.3642 13.1747 10.6605 12.9198 10.915C12.6649 11.1694 12.3682 11.292 12.0018 11.292C11.6348 11.2919 11.3391 11.169 11.0848 10.916C10.8313 10.6634 10.708 10.3691 10.7079 10.0029C10.7079 9.68146 10.8022 9.41279 10.996 9.17871L11.0848 9.08105C11.3378 8.82567 11.6324 8.70215 11.9979 8.70215Z" fill="currentColor" stroke="currentColor"></path>
                            </svg></div>
                        </div>
                      </div>
                    </div>
                    <div class="margin-bottom margin-xsmall">
                      <h3 class="heading-style-h4">Office</h3>
                    </div>
                    <p>Visit us at our headquarters for personalized support.</p>
                    <div class="margin-top margin-small">
                      <a href="https://share.google/n9iM82vyn45EJQbOd" class="text-style-link">Dimath Sports (Private) Limited<br>Suhada Mawatha, Sadamulla,<br>Batapola, 80320<br>Sri Lanka.</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section_faq10 color-scheme-6">
        <div class="padding-global">
          <div class="container-large">
            <div class="padding-section-large">
              <div class="faq10_component">
                <div class="margin-bottom margin-xxlarge">
                  <div data-w-id="8ee10165-4d4f-c81d-706c-a7740c7afad7" style="opacity:0" class="text-align-center">
                    <div class="max-width-large align-center">
                      <div class="margin-bottom margin-small">
                        <h2 class="heading-style-h1">Frequently <span class="text-color-primery-dark">Asked Questions</span></h2>
                      </div>
                      <p class="text-size-medium">Quick answers to common questions about DMT products and services</p>
                    </div>
                  </div>
                </div>
                <div data-w-id="8ee10165-4d4f-c81d-706c-a7740c7afade" style="opacity:0" class="w-layout-grid faq10_content">
                  <div class="faq10_list first-col">
                    <div class="faq10_accordion">
                      <div data-w-id="8ee10165-4d4f-c81d-706c-a7740c7afae1" class="faq10_question">
                        <div class="faq-header">How can I order DMT cricket gear?</div>
                        <div class="faq10_icon-wrapper">
                          <div class="icon-embed-small w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 24 24" fill="none" preserveaspectratio="xMidYMid meet" aria-hidden="true" role="img">
                              <path d="M7.08691 9.02344C7.18774 9.02344 7.26471 9.05385 7.34277 9.13184L11.6455 13.459L11.999 13.8145L16.6816 9.13184C16.7593 9.05424 16.8257 9.03227 16.9062 9.03516C17.0005 9.0386 17.0819 9.07117 17.168 9.15723C17.246 9.23531 17.2764 9.31223 17.2764 9.41309C17.2763 9.51371 17.2458 9.59001 17.168 9.66797L12.249 14.5869C12.1949 14.6411 12.1522 14.667 12.124 14.6787C12.0885 14.6935 12.0486 14.7021 12 14.7021C11.9755 14.7021 11.9532 14.6993 11.9326 14.6953L11.875 14.6787L11.8223 14.6484C11.8015 14.634 11.7779 14.6138 11.751 14.5869L6.80664 9.64355C6.7328 9.56972 6.70662 9.50009 6.70996 9.40527C6.71375 9.29797 6.74977 9.2141 6.83203 9.13184C6.90996 9.05403 6.98632 9.02351 7.08691 9.02344Z" fill="currentColor" stroke="currentColor"></path>
                            </svg></div>
                        </div>
                      </div>
                      <div style="width:100%;height:0px" class="faq10_answer">
                        <div class="margin-bottom margin-small">
                          <p>You can order directly through our contact form, email us at <?= getCompanyEmail() ?>, or call us at <?= getCompanyPhone() ?>. We&#x27;ll get back to you within 24 hours with pricing and delivery information.</p>
                        </div>
                      </div>
                    </div>
                    <div class="faq10_accordion">
                      <div data-w-id="f1e28236-6893-9708-1330-07b366d74e9e" class="faq10_question">
                        <div class="faq-header">What payment methods do you accept?</div>
                        <div class="faq10_icon-wrapper">
                          <div class="icon-embed-small w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 24 24" fill="none" preserveaspectratio="xMidYMid meet" aria-hidden="true" role="img">
                              <path d="M7.08691 9.02344C7.18774 9.02344 7.26471 9.05385 7.34277 9.13184L11.6455 13.459L11.999 13.8145L16.6816 9.13184C16.7593 9.05424 16.8257 9.03227 16.9062 9.03516C17.0005 9.0386 17.0819 9.07117 17.168 9.15723C17.246 9.23531 17.2764 9.31223 17.2764 9.41309C17.2763 9.51371 17.2458 9.59001 17.168 9.66797L12.249 14.5869C12.1949 14.6411 12.1522 14.667 12.124 14.6787C12.0885 14.6935 12.0486 14.7021 12 14.7021C11.9755 14.7021 11.9532 14.6993 11.9326 14.6953L11.875 14.6787L11.8223 14.6484C11.8015 14.634 11.7779 14.6138 11.751 14.5869L6.80664 9.64355C6.7328 9.56972 6.70662 9.50009 6.70996 9.40527C6.71375 9.29797 6.74977 9.2141 6.83203 9.13184C6.90996 9.05403 6.98632 9.02351 7.08691 9.02344Z" fill="currentColor" stroke="currentColor"></path>
                            </svg></div>
                        </div>
                      </div>
                      <div style="width:100%;height:0px" class="faq10_answer">
                        <div class="margin-bottom margin-small">
                          <p>We accept bank transfers, cash on delivery (for local orders), and are working on adding online payment options. Contact us for payment details.</p>
                        </div>
                      </div>
                    </div>
                    <div class="faq10_accordion">
                      <div data-w-id="253030d7-d2d7-2db5-3a20-35713a95740a" class="faq10_question">
                        <div class="faq-header">Can I become a DMT retailer?</div>
                        <div class="faq10_icon-wrapper">
                          <div class="icon-embed-small w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 24 24" fill="none" preserveaspectratio="xMidYMid meet" aria-hidden="true" role="img">
                              <path d="M7.08691 9.02344C7.18774 9.02344 7.26471 9.05385 7.34277 9.13184L11.6455 13.459L11.999 13.8145L16.6816 9.13184C16.7593 9.05424 16.8257 9.03227 16.9062 9.03516C17.0005 9.0386 17.0819 9.07117 17.168 9.15723C17.246 9.23531 17.2764 9.31223 17.2764 9.41309C17.2763 9.51371 17.2458 9.59001 17.168 9.66797L12.249 14.5869C12.1949 14.6411 12.1522 14.667 12.124 14.6787C12.0885 14.6935 12.0486 14.7021 12 14.7021C11.9755 14.7021 11.9532 14.6993 11.9326 14.6953L11.875 14.6787L11.8223 14.6484C11.8015 14.634 11.7779 14.6138 11.751 14.5869L6.80664 9.64355C6.7328 9.56972 6.70662 9.50009 6.70996 9.40527C6.71375 9.29797 6.74977 9.2141 6.83203 9.13184C6.90996 9.05403 6.98632 9.02351 7.08691 9.02344Z" fill="currentColor" stroke="currentColor"></path>
                            </svg></div>
                        </div>
                      </div>
                      <div style="width:100%;height:0px" class="faq10_answer">
                        <div class="margin-bottom margin-small">
                          <p>Absolutely! We&#x27;re always looking for quality retailers to partner with. Contact us through the form above or email us directly to discuss partnership opportunities.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="faq10_list">
                    <div class="faq10_accordion">
                      <div data-w-id="98d01c80-f48a-bf24-6f84-23df1a99eed4" class="faq10_question">
                        <div class="faq-header">Do you ship outside Sri Lanka?</div>
                        <div class="faq10_icon-wrapper">
                          <div class="icon-embed-small w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 24 24" fill="none" preserveaspectratio="xMidYMid meet" aria-hidden="true" role="img">
                              <path d="M7.08691 9.02344C7.18774 9.02344 7.26471 9.05385 7.34277 9.13184L11.6455 13.459L11.999 13.8145L16.6816 9.13184C16.7593 9.05424 16.8257 9.03227 16.9062 9.03516C17.0005 9.0386 17.0819 9.07117 17.168 9.15723C17.246 9.23531 17.2764 9.31223 17.2764 9.41309C17.2763 9.51371 17.2458 9.59001 17.168 9.66797L12.249 14.5869C12.1949 14.6411 12.1522 14.667 12.124 14.6787C12.0885 14.6935 12.0486 14.7021 12 14.7021C11.9755 14.7021 11.9532 14.6993 11.9326 14.6953L11.875 14.6787L11.8223 14.6484C11.8015 14.634 11.7779 14.6138 11.751 14.5869L6.80664 9.64355C6.7328 9.56972 6.70662 9.50009 6.70996 9.40527C6.71375 9.29797 6.74977 9.2141 6.83203 9.13184C6.90996 9.05403 6.98632 9.02351 7.08691 9.02344Z" fill="currentColor" stroke="currentColor"></path>
                            </svg></div>
                        </div>
                      </div>
                      <div style="width:100%;height:0px" class="faq10_answer">
                        <div class="margin-bottom margin-small">
                          <p>Currently, we focus on serving customers within Sri Lanka. However, we&#x27;re working on expanding our reach to other countries. Contact us for specific inquiries.</p>
                        </div>
                      </div>
                    </div>
                    <div class="faq10_accordion">
                      <div data-w-id="462ef2a0-74c6-328c-95cb-c7de7a7ab32b" class="faq10_question">
                        <div class="faq-header">How long does delivery take?</div>
                        <div class="faq10_icon-wrapper">
                          <div class="icon-embed-small w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 24 24" fill="none" preserveaspectratio="xMidYMid meet" aria-hidden="true" role="img">
                              <path d="M7.08691 9.02344C7.18774 9.02344 7.26471 9.05385 7.34277 9.13184L11.6455 13.459L11.999 13.8145L16.6816 9.13184C16.7593 9.05424 16.8257 9.03227 16.9062 9.03516C17.0005 9.0386 17.0819 9.07117 17.168 9.15723C17.246 9.23531 17.2764 9.31223 17.2764 9.41309C17.2763 9.51371 17.2458 9.59001 17.168 9.66797L12.249 14.5869C12.1949 14.6411 12.1522 14.667 12.124 14.6787C12.0885 14.6935 12.0486 14.7021 12 14.7021C11.9755 14.7021 11.9532 14.6993 11.9326 14.6953L11.875 14.6787L11.8223 14.6484C11.8015 14.634 11.7779 14.6138 11.751 14.5869L6.80664 9.64355C6.7328 9.56972 6.70662 9.50009 6.70996 9.40527C6.71375 9.29797 6.74977 9.2141 6.83203 9.13184C6.90996 9.05403 6.98632 9.02351 7.08691 9.02344Z" fill="currentColor" stroke="currentColor"></path>
                            </svg></div>
                        </div>
                      </div>
                      <div style="width:100%;height:0px" class="faq10_answer">
                        <div class="margin-bottom margin-small">
                          <p>Local delivery typically takes 2-3 business days. For bulk orders or special requests, delivery time may vary. We&#x27;ll provide specific timelines when you place your order.</p>
                        </div>
                      </div>
                    </div>
                    <div class="faq10_accordion">
                      <div data-w-id="157ea299-69e2-5075-b35a-349792efceed" class="faq10_question">
                        <div class="faq-header">Do you offer bulk pricing?</div>
                        <div class="faq10_icon-wrapper">
                          <div class="icon-embed-small w-embed"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewbox="0 0 24 24" fill="none" preserveaspectratio="xMidYMid meet" aria-hidden="true" role="img">
                              <path d="M7.08691 9.02344C7.18774 9.02344 7.26471 9.05385 7.34277 9.13184L11.6455 13.459L11.999 13.8145L16.6816 9.13184C16.7593 9.05424 16.8257 9.03227 16.9062 9.03516C17.0005 9.0386 17.0819 9.07117 17.168 9.15723C17.246 9.23531 17.2764 9.31223 17.2764 9.41309C17.2763 9.51371 17.2458 9.59001 17.168 9.66797L12.249 14.5869C12.1949 14.6411 12.1522 14.667 12.124 14.6787C12.0885 14.6935 12.0486 14.7021 12 14.7021C11.9755 14.7021 11.9532 14.6993 11.9326 14.6953L11.875 14.6787L11.8223 14.6484C11.8015 14.634 11.7779 14.6138 11.751 14.5869L6.80664 9.64355C6.7328 9.56972 6.70662 9.50009 6.70996 9.40527C6.71375 9.29797 6.74977 9.2141 6.83203 9.13184C6.90996 9.05403 6.98632 9.02351 7.08691 9.02344Z" fill="currentColor" stroke="currentColor"></path>
                            </svg></div>
                        </div>
                      </div>
                      <div style="width:100%;height:0px" class="faq10_answer">
                        <div class="margin-bottom margin-small">
                          <p>Yes, we offer competitive bulk pricing for retailers, schools, clubs, and tournament organizers. Contact us for bulk order quotes and special pricing.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="margin-top margin-xxlarge">
                  <div class="text-align-center">
                    <div data-w-id="8ee10165-4d4f-c81d-706c-a7740c7afb47" style="opacity:0" class="max-width-medium align-center">
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
  
  <!-- Enhanced Form Validation -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('contact-form');
      const nameField = document.getElementById('Name');
      const emailField = document.getElementById('Email');
      const phoneField = document.getElementById('Phone');
      const messageField = document.getElementById('Message');
      const checkboxField = document.getElementById('Contact 8 Checkbox');
      
      // Real-time validation functions
      function validateName(name) {
        if (name.length < 2) return 'Name must be at least 2 characters long.';
        if (name.length > 100) return 'Name must not exceed 100 characters.';
        if (!/^[a-zA-Z\s\.\-\']+$/.test(name)) return 'Name can only contain letters, spaces, dots, hyphens, and apostrophes.';
        return '';
      }
      
      function validateEmail(email) {
        if (!email) return 'Email address is required.';
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) return 'Please enter a valid email address.';
        if (email.length > 255) return 'Email address is too long.';
        return '';
      }
      
      function validatePhone(phone) {
        if (!phone) return 'Phone number is required.';
        const digitsOnly = phone.replace(/\D/g, '');
        if (digitsOnly.length < 7 || digitsOnly.length > 15) return 'Invalid phone number.';
        if (!/^[\d\+\-\s\(\)]+$/.test(phone)) return 'Invalid phone number format.';
        return '';
      }
      
      function validateMessage(message) {
        if (!message) return 'Message is required.';
        if (message.length < 10) return 'Message must be at least 10 characters long.';
        if (message.length > 5000) return 'Message must not exceed 5000 characters.';
        return '';
      }
      
      function validateCheckbox(checked) {
        if (!checked) return 'You must accept the Terms and Conditions.';
        return '';
      }
      
      // Show error message
      function showError(field, message) {
        // Remove existing error
        const existingError = field.parentNode.querySelector('.field-error');
        if (existingError) {
          existingError.remove();
        }
        
        if (message) {
          const errorDiv = document.createElement('div');
          errorDiv.className = 'field-error';
          errorDiv.style.color = '#dc3545';
          errorDiv.style.fontSize = '0.875rem';
          errorDiv.style.marginTop = '0.25rem';
          errorDiv.textContent = message;
          field.parentNode.appendChild(errorDiv);
          field.style.borderColor = '#dc3545';
        } else {
          field.style.borderColor = '';
        }
      }
      
      // Real-time validation
      nameField.addEventListener('blur', function() {
        const error = validateName(this.value.trim());
        showError(this, error);
      });
      
      emailField.addEventListener('blur', function() {
        const error = validateEmail(this.value.trim());
        showError(this, error);
      });
      
      phoneField.addEventListener('blur', function() {
        const error = validatePhone(this.value.trim());
        showError(this, error);
      });
      
      messageField.addEventListener('blur', function() {
        const error = validateMessage(this.value.trim());
        showError(this, error);
      });
      
      checkboxField.addEventListener('change', function() {
        const error = validateCheckbox(this.checked);
        showError(this, error);
      });
      
      // Form submission validation
      form.addEventListener('submit', function(e) {
        let hasErrors = false;
        
        // Validate all fields
        const nameError = validateName(nameField.value.trim());
        const emailError = validateEmail(emailField.value.trim());
        const phoneError = validatePhone(phoneField.value.trim());
        const messageError = validateMessage(messageField.value.trim());
        const checkboxError = validateCheckbox(checkboxField.checked);
        
        // Show all errors
        showError(nameField, nameError);
        showError(emailField, emailError);
        showError(phoneField, phoneError);
        showError(messageField, messageError);
        showError(checkboxField, checkboxError);
        
        if (nameError || emailError || phoneError || messageError || checkboxError) {
          hasErrors = true;
        }
        
        if (hasErrors) {
          e.preventDefault();
          
          // Scroll to first error
          const firstError = form.querySelector('.field-error');
          if (firstError) {
            firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
          }
          
          return false;
        }
        
        // Show loading state
        const submitBtn = form.querySelector('input[type="submit"]');
        const originalValue = submitBtn.value;
        submitBtn.value = 'Sending...';
        submitBtn.disabled = true;
        
        // Re-enable button after 5 seconds (in case of network issues)
        setTimeout(function() {
          submitBtn.value = originalValue;
          submitBtn.disabled = false;
        }, 5000);
      });
      
      // Clear errors on input
      [nameField, emailField, phoneField, messageField].forEach(function(field) {
        field.addEventListener('input', function() {
          if (this.style.borderColor === 'rgb(220, 53, 69)') {
            this.style.borderColor = '';
            const error = this.parentNode.querySelector('.field-error');
            if (error) {
              error.remove();
            }
          }
        });
      });
    });

    // Handle contact form submission via AJAX
    document.getElementById('contact-form').addEventListener('submit', function(e) {
      e.preventDefault();
      
      const form = this;
      const formData = new FormData(form);
      const messageContainer = document.getElementById('form-message');
      const submitButton = form.querySelector('input[type="submit"]');
      
      // Get CSRF token from form
      const csrfToken = form.querySelector('input[name="csrf_token"]')?.value || '';
      
      // Show loading state
      const originalValue = submitButton.value;
      submitButton.value = 'Sending...';
      submitButton.disabled = true;
      
      // Hide any previous messages
      messageContainer.style.display = 'none';
      
      // Submit via AJAX
      fetch('./contact-handler', {
        method: 'POST',
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'X-CSRF-Token': csrfToken
        },
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        // Reset button
        submitButton.value = originalValue;
        submitButton.disabled = false;
        
        // Show message
        messageContainer.style.display = 'block';
        
        if (data.success) {
          messageContainer.innerHTML = '<div style="color: #28a745; background: #d4edda; border: 1px solid #c3e6cb; padding: 15px; border-radius: 5px;"><strong>Success!</strong> ' + (data.message || 'Your message has been sent successfully. We will get back to you soon!') + '</div>';
          form.reset(); // Clear the form
        } else {
          messageContainer.innerHTML = '<div style="color: #721c24; background: #f8d7da; border: 1px solid #f5c6cb; padding: 15px; border-radius: 5px;"><strong>Error!</strong> ' + (data.message || 'There was an error sending your message. Please try again.') + '</div>';
        }
        
        // Scroll to message
        messageContainer.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        
        // Auto-hide success message after 10 seconds
        if (data.success) {
          setTimeout(() => {
            messageContainer.style.display = 'none';
          }, 10000);
        }
      })
      .catch(error => {
        // Reset button
        submitButton.value = originalValue;
        submitButton.disabled = false;
        
        // Show error message
        messageContainer.style.display = 'block';
        messageContainer.innerHTML = '<div style="color: #721c24; background: #f8d7da; border: 1px solid #f5c6cb; padding: 15px; border-radius: 5px;"><strong>Error!</strong> There was a network error. Please check your connection and try again.</div>';
        
      });
    });
  </script>
</body>
</html>