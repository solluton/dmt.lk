-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 06, 2025 at 04:26 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmt_deta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_settings`
--

DROP TABLE IF EXISTS `admin_settings`;
CREATE TABLE IF NOT EXISTS `admin_settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text,
  `setting_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting_key` (`setting_key`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_settings`
--

INSERT INTO `admin_settings` (`id`, `setting_key`, `setting_value`, `setting_description`, `created_at`, `updated_at`) VALUES
(1, 'contact_email', 'praneethmadush@gmail.com', 'Email address to receive contact form submissions', '2025-09-30 08:27:17', '2025-10-01 11:12:02'),
(9, 'email_enabled', '1', 'Enable/disable email notifications (1=enabled, 0=disabled)', '2025-09-30 08:27:17', '2025-09-30 08:27:17'),
(10, 'order_buttons_enabled', '1', 'Enable/disable Order Now buttons on product pages (1=enabled, 0=disabled)', '2025-10-05 03:06:07', '2025-10-05 03:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

DROP TABLE IF EXISTS `blog_categories`;
CREATE TABLE IF NOT EXISTS `blog_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` text,
  `color` varchar(7) DEFAULT '#007bff',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `description`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Research Insights', 'research-insights', 'Latest research findings and scientific insights', '#28a745', '2025-10-03 16:23:37', '2025-10-03 16:23:37'),
(2, 'Laboratory Best Practices', 'laboratory-best-practices', 'Best practices for laboratory operations', '#17a2b8', '2025-10-03 16:23:37', '2025-10-03 16:23:37'),
(3, 'Innovation & Technology', 'innovation-technology', 'Technology innovations and advancements', '#6f42c1', '2025-10-03 16:23:37', '2025-10-03 16:23:37'),
(4, 'Industry Trends', 'industry-trends', 'Current trends in the pharmaceutical industry', '#fd7e14', '2025-10-03 16:23:37', '2025-10-03 16:23:37'),
(5, 'Sustainability in Science', 'sustainability-science', 'Environmental sustainability in scientific practices', '#20c997', '2025-10-03 16:23:37', '2025-10-03 16:23:37'),
(6, 'Events & Workshops', 'events-workshops', 'Upcoming events and educational workshops', '#dc3545', '2025-10-03 16:23:37', '2025-10-03 16:23:37'),
(7, 'Educational Resources', 'educational-resources', 'Learning materials and educational content', '#6c757d', '2025-10-03 16:23:37', '2025-10-03 16:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

DROP TABLE IF EXISTS `blog_posts`;
CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `content` longtext NOT NULL,
  `excerpt` text,
  `featured_image` varchar(255) DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `popular` tinyint(1) DEFAULT '0',
  `status` enum('draft','published') DEFAULT 'draft',
  `author_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `author_id` (`author_id`),
  KEY `category_id` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_leads`
--

DROP TABLE IF EXISTS `contact_leads`;
CREATE TABLE IF NOT EXISTS `contact_leads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `message` text NOT NULL,
  `status` enum('new','read','replied','closed') DEFAULT 'new',
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_leads`
--

INSERT INTO `contact_leads` (`id`, `name`, `email`, `phone`, `company`, `subject`, `message`, `status`, `ip_address`, `user_agent`, `created_at`, `updated_at`, `deleted_at`) VALUES
(79, 'Chathuri Nisansala', 'kumarasisila99@gmail.com', '+94760477947', 'DMT Cricket Contact', 'Book A Call', 'sadadasdadasdda', 'new', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', '2025-10-06 04:17:13', '2025-10-06 04:17:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_queue`
--

DROP TABLE IF EXISTS `email_queue`;
CREATE TABLE IF NOT EXISTS `email_queue` (
  `id` int NOT NULL AUTO_INCREMENT,
  `to_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_html` tinyint(1) DEFAULT '0',
  `priority` int DEFAULT '1',
  `attempts` int DEFAULT '0',
  `max_attempts` int DEFAULT '3',
  `status` enum('pending','processing','sent','failed') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `error_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `scheduled_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `processed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_status` (`status`),
  KEY `idx_scheduled_at` (`scheduled_at`),
  KEY `idx_priority` (`priority`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_queue`
--

INSERT INTO `email_queue` (`id`, `to_email`, `from_email`, `from_name`, `subject`, `body`, `is_html`, `priority`, `attempts`, `max_attempts`, `status`, `error_message`, `scheduled_at`, `processed_at`, `created_at`, `updated_at`) VALUES
(85, 'praneethmadush@gmail.com', 'leads@solluton.com', 'Neomed | Website', 'New Cricket Equipment Inquiry from Chathuri - DMT Cricket', '<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n    <meta charset=\"UTF-8\">\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n    <title>New Lead Notification</title>\n    <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">\n    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>\n    <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap\" rel=\"stylesheet\">\n    <style>\n        /* Reset styles for email compatibility */\n        body, table, td, p, a, li, blockquote {\n            -webkit-text-size-adjust: 100%;\n            -ms-text-size-adjust: 100%;\n        }\n        \n        table, td {\n            mso-table-lspace: 0pt;\n            mso-table-rspace: 0pt;\n        }\n        \n        img {\n            -ms-interpolation-mode: bicubic;\n            border: 0;\n            height: auto;\n            line-height: 100%;\n            outline: none;\n            text-decoration: none;\n        }\n        \n        /* Main container styles */\n        .email-container {\n            max-width: 600px;\n            margin: 0 auto;\n            background-color: #ffffff;\n            font-family: \'Inter\', Arial, sans-serif;\n            border: 1px solid #e0e0e0;\n            border-radius: 8px;\n            overflow: hidden;\n        }\n        \n        .top-logo {\n            text-align: center;\n            padding: 40px 20px 0px 20px;\n            background-color: #ffffff;\n        }\n        \n        .logo-image {\n            max-width: 120px;\n            height: auto;\n        }\n        \n        .header {\n            background-color: #ffffff;\n            padding: 30px 20px;\n            border-bottom: 1px solid #e0e0e0;\n        }\n        \n        .logo-section {\n            display: flex;\n            align-items: center;\n            margin-bottom: 20px;\n        }\n        \n        .logo-bar {\n            width: 4px;\n            height: 30px;\n            background-color: #007bff;\n            margin-right: 10px;\n        }\n        \n        .logo-text {\n            font-size: 24px;\n            font-weight: bold;\n            color: #000000;\n            text-decoration: none;\n        }\n        \n        .main-message {\n            font-size: 18px;\n            color: #000000;\n            margin: 20px 0;\n            line-height: 1.4;\n            text-align: center;\n        }\n        \n        .form-data-section {\n            background-color: #f8f9fa;\n            margin: 30px 20px;\n            padding: 30px;\n            border-radius: 4px;\n            border-left: 4px solid #007bff;\n        }\n        \n        .section-title {\n            font-size: 16px;\n            font-weight: bold;\n            color: #000000;\n            margin-bottom: 25px;\n        }\n        \n        /* Table-based layout for form fields */\n        .form-field-table {\n            width: 100%;\n        }\n\n        .form-field-row td {\n            padding: 15px 0;\n            border-bottom: 1px solid #e0e0e0;\n        }\n\n        .form-field-row:last-child td {\n            border-bottom: none;\n        }\n\n        .field-label {\n            font-weight: 600;\n            color: #000000;\n            vertical-align: top;\n            padding-right: 20px;\n            width: 30%; /* Adjust as needed */\n        }\n\n        .field-value {\n            color: #000000;\n            text-align: right;\n            vertical-align: top;\n            width: 70%; /* Adjust as needed */\n        }\n        \n        .email-link {\n            color: #007bff;\n            text-decoration: underline;\n        }\n        \n        .cta-section {\n            text-align: center;\n            margin: 30px 20px;\n        }\n        \n        .cta-button {\n            display: inline-block;\n            background-color: #007bff;\n            color: #ffffff;\n            padding: 15px 30px;\n            text-decoration: none;\n            border-radius: 4px;\n            font-weight: bold;\n            font-size: 16px;\n        }\n        \n        .cta-button:hover {\n            background-color: #0056b3;\n        }\n        \n        .footer {\n            background-color: #f8f9fa;\n            padding: 20px;\n            text-align: center;\n            border-top: 1px solid #e0e0e0;\n        }\n        \n        .footer-logo {\n            max-width: 120px;\n            height: auto;\n            margin-bottom: 10px;\n        }\n        \n        .powered-by {\n            font-size: 12px;\n            color: #007bff;\n            margin-bottom: 5px;\n            font-weight: 600;\n        }\n        \n        .company-details {\n            font-size: 11px;\n            color: #888888;\n            line-height: 1.4;\n        }\n        \n        .company-details a {\n            color: #888888;\n            text-decoration: none;\n        }\n        \n        .company-details a:hover {\n            color: #666666;\n        }\n        \n        .contact-item {\n            display: inline-flex;\n            align-items: center;\n            margin: 0 5px;\n        }\n        \n        .contact-icon {\n            width: 12px;\n            height: 12px;\n            margin-right: 5px;\n        }\n        \n        /* Responsive styles */\n        @media only screen and (max-width: 600px) {\n            .email-container {\n                width: 100% !important;\n            }\n            \n            .form-data-section {\n                margin: 10px;\n                padding: 15px;\n            }\n            \n            .form-field-row td {\n                display: block;\n                text-align: left;\n                padding: 5px 0;\n            }\n\n            .field-label {\n                width: 100%;\n                text-align: left;\n                padding-right: 0;\n                padding-bottom: 8px;\n            }\n\n            .field-value {\n                width: 100%;\n                text-align: left;\n            }\n            \n        }\n    </style>\n</head>\n<body>\n    <div class=\"email-container\">\n        <!-- Top Logo Section -->\n        <div class=\"top-logo\">\n            <img src=\"https://cdn.prod.website-files.com/67d10e4228040e1cc62a4ccb/68d10a76ffd3b4b453893773_neomed-logo.avif\" alt=\"Solluton Logo\" class=\"logo-image\">\n        </div>\n        \n        <!-- Header Section -->\n        <div class=\"header\">\n            <div class=\"main-message\">\n                🏏 Great! A new cricket equipment inquiry has been received!\n            </div>\n        </div>\n        \n        <!-- Form Data Section -->\n        <div class=\"form-data-section\">\n            <div class=\"section-title\">📋 Customer Inquiry Details</div>\n            \n            <table role=\"presentation\" class=\"form-field-table\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n                <tr class=\"form-field-row\">\n                    <td class=\"field-label\">First Name:</td>\n                    <td class=\"field-value\">Chathuri</td>\n                </tr>\n                <tr class=\"form-field-row\">\n                    <td class=\"field-label\">Last Name:</td>\n                    <td class=\"field-value\">Nisansala</td>\n                </tr>\n                <tr class=\"form-field-row\">\n                    <td class=\"field-label\">Email:</td>\n                    <td class=\"field-value\">\n                        <a href=\"mailto:kumarasisila99@gmail.com\" class=\"email-link\">kumarasisila99@gmail.com</a>\n                    </td>\n                </tr>\n                <tr class=\"form-field-row\">\n                    <td class=\"field-label\">Phone Number:</td>\n                    <td class=\"field-value\">+94760477947</td>\n                </tr><tr class=\"form-field-row\">\n                    <td class=\"field-label\">Company:</td>\n                    <td class=\"field-value\">DMT Cricket Contact</td>\n                </tr><tr class=\"form-field-row\">\n                    <td class=\"field-label\">Subject:</td>\n                    <td class=\"field-value\">Book A Call</td>\n                </tr><tr class=\"form-field-row\">\n                    <td class=\"field-label\">Message:</td>\n                    <td class=\"field-value\">\n                        <p>sadadasdadasdda</p>\n                    </td>\n                </tr>\n            </table>\n        </div>\n        \n        \n        <div class=\"cta-section\">\n            <a href=\"/admin/contact-leads\" class=\"cta-button\">View Inquiry in Dashboard</a>\n        </div>\n        \n        \n        <!-- Footer Section -->\n        <div class=\"footer\">\n            <div class=\"powered-by\">Powered by</div>\n            <a href=\"https://solluton.com\" target=\"_blank\">\n                <img src=\"https://protal.solluton.com/storage/logos/app/logo.png?v=1759119343\" alt=\"Solluton Logo\" class=\"footer-logo\">\n            </a>\n            <div class=\"company-details\">\n                <span class=\"contact-item\">\n                    <svg class=\"contact-icon\" viewBox=\"0 0 24 24\" fill=\"currentColor\">\n                        <path d=\"M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z\"/>\n                    </svg>\n                    <a href=\"tel:+94774562340\">+94 77 456 2340</a>\n                </span>\n                <span class=\"contact-item\">\n                    <svg class=\"contact-icon\" viewBox=\"0 0 24 24\" fill=\"currentColor\">\n                        <path d=\"M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z\"/>\n                    </svg>\n                    <a href=\"mailto:hello@solluton.com\">hello@solluton.com</a>\n                </span>\n            </div>\n        </div>\n    </div>\n</body>\n</html>', 1, 1, 1, 3, 'sent', NULL, '2025-10-06 04:17:13', '2025-10-06 04:19:49', '2025-10-06 04:17:13', '2025-10-06 04:19:49'),
(86, 'kumarasisila99@gmail.com', 'leads@solluton.com', 'Neomed | Website', 'Chathuri, thank you for your cricket equipment inquiry - DMT Cricket', '<!DOCTYPE html>\n<html lang=\"en\">\n<head>\n    <meta charset=\"UTF-8\">\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n    <title>Thank You - DMT Cricket</title>\n    <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">\n    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>\n    <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap\" rel=\"stylesheet\">\n    <style>\n        /* Reset styles for email compatibility */\n        body, table, td, p, a, li, blockquote {\n            -webkit-text-size-adjust: 100%;\n            -ms-text-size-adjust: 100%;\n        }\n\n        table, td {\n            mso-table-lspace: 0pt;\n            mso-table-rspace: 0pt;\n        }\n\n        img {\n            -ms-interpolation-mode: bicubic;\n            border: 0;\n            height: auto;\n            line-height: 100%;\n            outline: none;\n            text-decoration: none;\n        }\n\n        /* Main container styles */\n        .email-container {\n            max-width: 600px;\n            margin: 0 auto;\n            background-color: #ffffff;\n            font-family: \'Inter\', Arial, sans-serif;\n            border: 1px solid #e0e0e0;\n            border-radius: 8px;\n            overflow: hidden;\n        }\n\n        .header {\n            padding: 40px 20px;\n            text-align: center;\n            color: #333;\n        }\n\n        .logo-image {\n            max-width: 120px;\n            height: auto;\n            margin-bottom: 20px;\n        }\n\n        .header-title {\n            font-size: 28px;\n            font-weight: 700;\n            margin: 0 0 10px 0;\n            line-height: 1.2;\n        }\n\n        .header-subtitle {\n            font-size: 16px;\n            margin: 0;\n            opacity: 0.9;\n        }\n\n        .content-section {\n            padding: 40px 30px;\n        }\n\n        .greeting {\n            font-size: 20px;\n            font-weight: 600;\n            color: #333;\n            margin-bottom: 20px;\n        }\n\n        .message-text {\n            font-size: 16px;\n            line-height: 1.6;\n            color: #555;\n            margin-bottom: 25px;\n        }\n\n        .info-box {\n            border-left: 4px solid #007bff;\n            padding: 20px;\n            margin: 25px 0;\n            border-radius: 0 4px 4px 0;\n            border: 1px solid #e0e0e0;\n        }\n\n        .info-title {\n            font-weight: 600;\n            color: #333;\n            margin-bottom: 10px;\n        }\n\n        .contact-info {\n            padding: 25px;\n            border-radius: 8px;\n            margin: 25px 0;\n            border: 1px solid #e0e0e0;\n        }\n\n        .contact-title {\n            font-size: 18px;\n            font-weight: 600;\n            color: #333;\n            margin-bottom: 15px;\n        }\n\n        .contact-item {\n            display: flex;\n            align-items: center;\n            margin-bottom: 10px;\n            font-size: 14px;\n        }\n\n        .contact-icon {\n            width: 16px;\n            height: 16px;\n            margin-right: 10px;\n            color: #007bff;\n        }\n\n        .contact-link {\n            color: #007bff;\n            text-decoration: none;\n        }\n\n        .contact-link:hover {\n            text-decoration: underline;\n        }\n\n        .business-hours {\n            margin-top: 15px;\n        }\n\n        .hours-item {\n            display: flex;\n            justify-content: space-between;\n            padding: 5px 0;\n            font-size: 14px;\n        }\n\n        .footer {\n            color: #666;\n            padding: 30px 20px;\n            text-align: center;\n            border-top: 1px solid #e0e0e0;\n        }\n\n        .footer-text {\n            font-size: 14px;\n            margin-bottom: 15px;\n        }\n\n        .social-links {\n            margin: 20px 0;\n        }\n\n        .social-link {\n            display: inline-block;\n            margin: 0 10px;\n            color: #007bff;\n            text-decoration: none;\n            font-size: 14px;\n        }\n\n        .social-link:hover {\n            color: #0056b3;\n        }\n\n        .copyright {\n            font-size: 12px;\n            color: #999;\n            margin-top: 20px;\n        }\n\n        /* Responsive styles */\n        @media only screen and (max-width: 600px) {\n            .email-container {\n                width: 100% !important;\n            }\n            \n            .content-section {\n                padding: 20px 15px;\n            }\n            \n            .contact-info {\n                padding: 15px;\n            }\n        }\n    </style>\n</head>\n<body>\n    <div class=\"email-container\">\n        <!-- Header -->\n        <div class=\"header\">\n            <img src=\"/images/DMT-LOGO-Main.avif\" alt=\"DMT Cricket\" class=\"logo-image\">\n            <h1 class=\"header-title\">Thank you for your interest in DMT Cricket equipment!</h1>\n            <p class=\"header-subtitle\">Your cricket equipment inquiry has been received</p>\n        </div>\n\n        <!-- Main Content -->\n        <div class=\"content-section\">\n            <div class=\"greeting\">Hello Chathuri,</div>\n            \n            <div class=\"message-text\">\n                Good morning Chathuri! We have successfully received your cricket equipment inquiry and our team will review your message carefully. We strive to respond within 48 hours with detailed information about our cricket gear.\n            </div>\n\n            <div class=\"info-box\">\n                <div class=\"info-title\">📋 Your Inquiry Details:</div>\n                <strong>Subject:</strong> Book A Call<br>\n                <strong>Submitted:</strong> October 6, 2025 at 9:47 AM<br>\n                <strong>Expected Response:</strong> Within 24 hours\n            </div>\n\n            <div class=\"message-text\">\n                We appreciate your interest in DMT Cricket equipment and look forward to helping you find the perfect cricket gear.\n            </div>\n\n            <!-- Contact Information -->\n            <div class=\"contact-info\">\n                <div class=\"contact-title\">📞 Contact Information</div>\n                \n                <div class=\"contact-item\">\n                    <svg class=\"contact-icon\" viewBox=\"0 0 24 24\" fill=\"currentColor\">\n                        <path d=\"M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z\"/>\n                    </svg>\n                    <a href=\"mailto:info@dmtcricket.com\" class=\"contact-link\">info@dmtcricket.com</a>\n                </div>\n                \n                <div class=\"contact-item\">\n                    <svg class=\"contact-icon\" viewBox=\"0 0 24 24\" fill=\"currentColor\">\n                        <path d=\"M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z\"/>\n                    </svg>\n                    <a href=\"tel:+94771234567\" class=\"contact-link\">+94 77 123 4567</a>\n                </div>\n                \n                \n                <div class=\"contact-item\">\n                    <svg class=\"contact-icon\" viewBox=\"0 0 24 24\" fill=\"currentColor\">\n                        <path d=\"M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z\"/>\n                    </svg>\n                    <a href=\"https://dmtcricket.com\" class=\"contact-link\" target=\"_blank\">https://dmtcricket.com</a>\n                </div>\n                \n\n                \n                <div class=\"business-hours\">\n                    <div style=\"font-weight: 600; margin-bottom: 10px; color: #333;\">🕒 Business Hours:</div>\n                    <div class=\"hours-item\"><span>Monday - Friday:</span><span>9:00 AM - 6:00 PM</span></div>\n                    <div class=\"hours-item\"><span>Saturday:</span><span>9:00 AM - 4:00 PM</span></div>\n                    <div class=\"hours-item\"><span>Sunday:</span><span>10:00 AM - 2:00 PM</span></div>\n                </div>\n                \n            </div>\n        </div>\n\n        <!-- Footer -->\n        <div class=\"footer\" style=\"background: transparent;\">\n            <div class=\"footer-text\">\n                Thank you for choosing DMT Cricket\n            </div>\n            \n            \n            <div class=\"social-links\">\n                <a href=\"https://facebook.com/dmtcricket\" class=\"social-link\" target=\"_blank\">Facebook</a>\n                <a href=\"https://linkedin.com/company/dmtcricket\" class=\"social-link\" target=\"_blank\">LinkedIn</a>\n                <a href=\"https://twitter.com/dmtcricket\" class=\"social-link\" target=\"_blank\">Twitter</a>\n            </div>\n            \n            \n            <div class=\"copyright\">\n                © 2025 DMT Cricket. All rights reserved.\n            </div>\n        </div>\n    </div>\n</body>\n</html>', 1, 2, 1, 3, 'sent', NULL, '2025-10-06 04:17:13', '2025-10-06 04:19:53', '2025-10-06 04:17:13', '2025-10-06 04:19:53');

-- --------------------------------------------------------

--
-- Table structure for table `legal_pages`
--

DROP TABLE IF EXISTS `legal_pages`;
CREATE TABLE IF NOT EXISTS `legal_pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `page_type` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_type` (`page_type`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `legal_pages`
--

INSERT INTO `legal_pages` (`id`, `page_type`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'terms-conditions', 'Terms and Conditions', '<h2>Terms and Conditions</h2>\r\n<p>Welcome to NEO MED PHARMACEUTICALS. These terms and conditions outline the rules and regulations for the use of our website and services.</p>\r\n\r\n<h3>1. Acceptance of Terms</h3>\r\n<p>By accessing and using this website, you accept and agree to be bound by the terms and provision of this agreement.</p>\r\n\r\n<h3>2. Use License</h3>\r\n<p>Permission is granted to temporarily download one copy of the materials on NEO MED PHARMACEUTICALS website for personal, non-commercial transitory viewing only.</p>\r\n\r\n<h3>3. Disclaimer</h3>\r\n<p>The materials on NEO MED PHARMACEUTICALS website are provided on an \"as is\" basis. NEO MED PHARMACEUTICALS makes no warranties, expressed or implied.</p>\r\n\r\n<h3>4. Limitations</h3>\r\n<p>In no event shall NEO MED PHARMACEUTICALS or its suppliers be liable for any damages arising out of the use or inability to use the materials on our website.</p>\r\n\r\n<h3>5. Contact Information</h3>\r\n<p>If you have any questions about these Terms and Conditions, please contact us at connect@neomed.lk</p>', '2025-10-02 09:39:22', '2025-10-05 04:01:53'),
(2, 'privacy-policy', 'Privacy Policy', '<h2>Privacy Policy</h2>\r\n<p>At NEO MED PHARMACEUTICALS, we are committed to protecting your privacy and ensuring the security of your personal information.</p>\r\n\r\n<h3>1. Information We Collect&nbsp;</h3>\r\n<p>We collect information you provide directly to us, such as when you contact us through our website forms or communicate with us via email.</p>\r\n\r\n<h3>2. How We Use Your Information</h3>\r\n<p>We use the information we collect to:</p>\r\n<ul>\r\n<li>Respond to your inquiries and provide customer support</li>\r\n<li>Improve our services and website functionality</li>\r\n<li>Send you important updates about our services</li>\r\n</ul>\r\n\r\n<h3>3. Information Sharing</h3>\r\n<p>We do not sell, trade, or otherwise transfer your personal information to third parties without your consent, except as described in this policy.</p>\r\n\r\n<h3>4. Data Security</h3>\r\n<p>We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.</p>\r\n\r\n<h3>5. Contact Us</h3>\r\n<p>If you have any questions about this Privacy Policy, please contact us at connect@neomed.lk</p>', '2025-10-02 09:39:22', '2025-10-05 04:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `tagline` varchar(500) DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `featured_home_image` varchar(500) DEFAULT NULL,
  `gallery_images` text,
  `features_section_title` varchar(255) DEFAULT NULL,
  `features_section_subtitle` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `tags` text COMMENT 'Comma-separated product tags',
  `slug` varchar(191) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `display_order` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `title_parts` text,
  `title_black` varchar(255) DEFAULT NULL COMMENT 'First part - black text',
  `title_green` varchar(255) DEFAULT NULL COMMENT 'Second part - green text',
  `why_choose_title_black` varchar(255) DEFAULT NULL COMMENT 'Why choose title black part',
  `why_choose_title_green` varchar(255) DEFAULT NULL COMMENT 'Why choose title green part',
  `why_choose_subtitle` varchar(500) DEFAULT NULL COMMENT 'Why choose section subtitle',
  `features_json` text COMMENT 'JSON array of why choose features',
  `specifications_json` text COMMENT 'JSON array of product specifications',
  `specifications_image` varchar(500) DEFAULT NULL COMMENT 'Specifications section image path',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'Soft delete timestamp',
  `enable_order_now` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `subtitle`, `description`, `tagline`, `main_image`, `featured_home_image`, `gallery_images`, `features_section_title`, `features_section_subtitle`, `meta_title`, `meta_description`, `tags`, `slug`, `status`, `display_order`, `created_at`, `updated_at`, `title_parts`, `title_black`, `title_green`, `why_choose_title_black`, `why_choose_title_green`, `why_choose_subtitle`, `features_json`, `specifications_json`, `specifications_image`, `deleted_at`, `enable_order_now`) VALUES
(5, 'DMT Cricket Softball', 'The Ball That Never Quits', 'Designed for durability and enhanced playability, the DMT Cricket Softball is oxygenated for long-lasting bounce and consistency. From dusty streets to proper grounds, this ball keeps its shape, feel, and performance match after match. It\'s the best in the market for players who refuse to settle.', 'The Ball That Never Quits', 'uploads/main/68e24157b525f_1759658327.avif', 'uploads/featured-home/68e29d6e16e07_1759681902.avif', NULL, NULL, NULL, 'DMT Cricket Softball | Best Softball Cricket Ball in Sri Lanka', 'Experience the DMT softball cricket ball—Sri Lanka\'s #1 choice for quality, performance, and availability.', 'Oxygenated,Durable,Consistent', 'dmt-cricket-softball', 'active', 1, '2025-10-04 16:28:08', '2025-10-05 16:31:48', NULL, 'DMT Cricket', 'Softball', 'Why Choose DMT', 'Cricket Softball?', 'Engineered for excellence, built for champions', '[{\"title\":\"Oxygenated Technology\",\"description\":\"Designed for durability and enhanced playability, the DMT Cricket Softball is oxygenated for long-lasting bounce and consistency.\"},{\"title\":\"Street-Tested Durability\",\"description\":\"\"},{\"title\":\"Enhanced Performance\",\"description\":\"Designed for durability and enhanced playability, the DMT Cricket Softball is oxygenated for long-lasting bounce and consistency.\"},{\"title\":\"Best in Sri Lanka\",\"description\":\"Designed for durability and enhanced playability, the DMT Cricket Softball is oxygenated for long-lasting bounce and consistency.\"},{\"title\":\"Street-Tested Durability\",\"description\":\"Designed for durability and enhanced playability, the DMT Cricket Softball is oxygenated for long-lasting bounce and consistency.\"},{\"title\":\"Street-Tested Durability\",\"description\":\"Designed for durability and enhanced playability, the DMT Cricket Softball is oxygenated for long-lasting bounce and consistency.\"}]', '[{\"title\":\"Specification Title\",\"description\":\"Specification Title\"},{\"title\":\"Specification Title\",\"description\":\"Specification Title\"},{\"title\":\"Specification Title\",\"description\":\"Specification Title\"}]', 'uploads/spec/68e2415e817f1_1759658334.avif', NULL, 1),
(6, 'DMT Cricket Bat', '', 'Professional-grade cricket bat designed for softball cricket with optimal weight distribution and superior grip.', NULL, 'uploads/main/68e292c5babc9_1759679173.avif', 'uploads/featured-home/68e29ef7eab62_1759682295.avif', NULL, NULL, NULL, 'DMT Cricket Bat | Professional Softball Cricket Bat Sri Lanka', 'Professional DMT cricket bat designed for softball cricket with optimal performance and durability.', '', 'cricket-bat', 'active', 2, '2025-10-04 16:28:08', '2025-10-05 16:40:00', NULL, 'DMT Cricket', 'Bat', '', '', '', '[{\"title\":\"\",\"description\":\"\"},{\"title\":\"\",\"description\":\"\"},{\"title\":\"\",\"description\":\"\"},{\"title\":\"\",\"description\":\"\"},{\"title\":\"\",\"description\":\"\"},{\"title\":\"\",\"description\":\"\"}]', '[{\"title\":\"\",\"description\":\"\"},{\"title\":\"\",\"description\":\"\"},{\"title\":\"\",\"description\":\"\"}]', 'uploads/spec/68e292d348b51_1759679187.avif', NULL, 0),
(7, 'DMT Cricket Gloves', '', 'Premium cricket gloves with enhanced protection and flexibility for optimal performance on the field.', NULL, 'uploads/main/68e292ea41fa5_1759679210.avif', 'uploads/featured-home/68e29f73f26ff_1759682419.avif', NULL, NULL, NULL, 'DMT Cricket Gloves | Premium Cricket Gloves Sri Lanka', 'Premium DMT cricket gloves with enhanced protection and flexibility for optimal performance.', '', 'cricket-gloves', 'active', 3, '2025-10-04 16:28:08', '2025-10-05 16:40:51', NULL, 'DMT Cricket', 'Gloves', '', '', '', '[{\"title\":\"\",\"description\":\"\"},{\"title\":\"\",\"description\":\"\"},{\"title\":\"\",\"description\":\"\"},{\"title\":\"\",\"description\":\"\"},{\"title\":\"\",\"description\":\"\"},{\"title\":\"\",\"description\":\"\"}]', '[{\"title\":\"\",\"description\":\"\"},{\"title\":\"\",\"description\":\"\"},{\"title\":\"\",\"description\":\"\"}]', 'uploads/spec/68e292f21b4c8_1759679218.avif', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_features`
--

DROP TABLE IF EXISTS `product_features`;
CREATE TABLE IF NOT EXISTS `product_features` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `display_order` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slug_redirects`
--

DROP TABLE IF EXISTS `slug_redirects`;
CREATE TABLE IF NOT EXISTS `slug_redirects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `old_slug` varchar(191) NOT NULL,
  `new_slug` varchar(191) NOT NULL,
  `post_id` int NOT NULL,
  `redirect_type` enum('blog','product') NOT NULL DEFAULT 'blog',
  `product_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_old_slug` (`old_slug`),
  KEY `post_id` (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `slug_redirects`
--

INSERT INTO `slug_redirects` (`id`, `old_slug`, `new_slug`, `post_id`, `redirect_type`, `product_id`, `created_at`) VALUES
(8, 'dmt-cricket-sdffs-softball', 'dmt-cricket-softball', 0, 'product', 5, '2025-10-05 06:58:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `remember_token` varchar(255) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expiry` datetime DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `role`, `remember_token`, `reset_token`, `reset_token_expiry`, `profile_picture`, `created_at`, `updated_at`) VALUES
(1, 'DMT', 'admin@neomed.lk', 'admin', '$2y$10$qt7q7rOpDanHcl8LH..Jw.XxZlZ6r3lDikMBsZDXoexLuamPTxt6S', 'admin', '619ad11c2bd5a322edb939629db74e7517c91ec4d1fe405d54bf5d5b16d91574', NULL, NULL, NULL, '2025-09-24 10:05:06', '2025-10-04 15:00:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
