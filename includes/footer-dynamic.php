<?php
// Dynamic Footer with Social Links from JSON
function getCompanyDetails() {
    $jsonFile = __DIR__ . '/../config/company_details.json';
    if (file_exists($jsonFile)) {
        $jsonContent = file_get_contents($jsonFile);
        return json_decode($jsonContent, true);
    }
    return null;
}

$company_details = getCompanyDetails();
$social_media = $company_details['social_media'] ?? [];
?>

<!-- Global Footer -->
<section class="section footer">
  <div class="container">
    <div class="footer-content">
      <div data-w-id="e66f247d-44b3-1cc7-b84b-ae0ea672d4b3" class="footer-details-menu-wrapper">
        <div class="footer-details">
          <a href="/" class="footer-logo-link w-inline-block"><img src="images/logo-neomed.svg" loading="lazy" alt="" class="footer-logo-image"></a>
          <div class="footer-details-description-wrap">
            <p class="footer-details-description-text">At NEO MED PHARMACEUTICALS, we are dedicated to providing high-quality pharmaceutical distribution solutions tailored to meet the needs of healthcare providers. Your trust is our priority.</p>
          </div>
          <div class="footer-social-media-wrapper">
            <?php if (!empty($social_media['linkedin'])): ?>
            <a href="<?php echo htmlspecialchars($social_media['linkedin']); ?>" target="_blank" class="footer-social-media-link w-inline-block">
              <div class="footer-social-media-icon"></div>
            </a>
            <?php endif; ?>
            
            <?php if (!empty($social_media['facebook'])): ?>
            <a href="<?php echo htmlspecialchars($social_media['facebook']); ?>" target="_blank" class="footer-social-media-link w-inline-block">
              <div class="footer-social-media-icon"></div>
            </a>
            <?php endif; ?>
            
            <?php if (!empty($social_media['twitter'])): ?>
            <a href="<?php echo htmlspecialchars($social_media['twitter']); ?>" target="_blank" class="footer-social-media-link w-inline-block">
              <div class="footer-social-media-icon"></div>
            </a>
            <?php endif; ?>
            
            <?php if (!empty($social_media['instagram'])): ?>
            <a href="<?php echo htmlspecialchars($social_media['instagram']); ?>" target="_blank" class="footer-social-media-link w-inline-block">
              <div class="footer-social-media-icon"></div>
            </a>
            <?php endif; ?>
          </div>
        </div>
        <div class="footer-menu-wrapper">
          <div class="footer-menu-column">
            <div class="footer-menu-title">Quick Links</div>
            <a href="/" class="footer-menu-link">Home</a>
            <a href="about-us" class="footer-menu-link">About Us</a>
            <a href="services" class="footer-menu-link">Services</a>
            <a href="partnership" class="footer-menu-link">Partnership</a>
            <a href="quality-assurance" class="footer-menu-link">Quality Assurance</a>
          </div>
          <div class="footer-menu-column">
            <div class="footer-menu-title">Services</div>
            <a href="service/pharmaceutical-product-distribution" class="footer-menu-link">Pharmaceutical Distribution</a>
            <a href="service/warehousing-inventory-management" class="footer-menu-link">Warehousing &amp; Inventory</a>
            <a href="service/cold-chain-logistics" class="footer-menu-link">Cold Chain Logistics</a>
            <a href="service/order-fulfillment-delivery" class="footer-menu-link">Order Fulfillment</a>
            <a href="service/customer-support-after-sales-services" class="footer-menu-link">Customer Support</a>
          </div>
          <div class="footer-menu-column">
            <div class="footer-menu-title">Resources</div>
            <a href="blog" class="footer-menu-link">Blog</a>
            <a href="contact-us" class="footer-menu-link">Contact Us</a>
            <a href="privacy-policies" class="footer-menu-link">Privacy Policy</a>
            <a href="terms-conditions" class="footer-menu-link">Terms &amp; Conditions</a>
          </div>
        </div>
      </div>
      <div class="footer-copyright-wrapper">
        <div class="footer-copyright-text">© <?php echo date('Y'); ?> <?php echo htmlspecialchars($company_details['company_name'] ?? 'NEO MED PHARMACEUTICALS'); ?>. All rights reserved.</div>
      </div>
    </div>
  </div>
</section>
