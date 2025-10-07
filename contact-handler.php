<?php
require_once 'config/env.php';
require_once 'config/database.php';
require_once 'config/csrf.php';
require_once 'config/email_queue.php';

// Check if this is an AJAX request (keep JSON) or form submission (redirect)
$is_ajax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
           strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';

if (!$is_ajax) {
    // Regular form submission - will redirect after processing
} else {
    // AJAX request - return JSON
    header('Content-Type: application/json');

    $response = [
        'success' => false,
        'message' => '',
        'errors' => [],
        'data' => []
    ];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate CSRF token for AJAX requests
    if ($is_ajax) {
        $csrf_token = $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
        if (!validateCSRFToken($csrf_token)) {
            http_response_code(403);
            echo json_encode(['success' => false, 'message' => 'CSRF token validation failed']);
            exit();
        }
    }
    
    // Handle both old and new website field names
    $name = trim($_POST['name'] ?? $_POST['Name'] ?? '');
    $email = trim($_POST['email'] ?? $_POST['Email'] ?? '');
    $phone = trim($_POST['phone'] ?? $_POST['Phone'] ?? '');
    $company = trim($_POST['company'] ?? 'DMT Cricket Contact');
    $subject = trim($_POST['subject'] ?? $_POST['Reason'] ?? 'Website Contact');
    $message_text = trim($_POST['message'] ?? $_POST['Message'] ?? '');
    
    // Comprehensive validation
    $validation_errors = [];
    
    // Name validation
    if (empty($name)) {
        $validation_errors['name'] = 'Name is required.';
    } elseif (strlen($name) < 2) {
        $validation_errors['name'] = 'Name must be at least 2 characters long.';
    } elseif (strlen($name) > 100) {
        $validation_errors['name'] = 'Name must not exceed 100 characters.';
    } elseif (!preg_match('/^[a-zA-Z\s\.\-\']+$/', $name)) {
        $validation_errors['name'] = 'Name can only contain letters, spaces, dots, hyphens, and apostrophes.';
    }
    
    // Email validation
    if (empty($email)) {
        $validation_errors['email'] = 'Email address is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $validation_errors['email'] = 'Please enter a valid email address.';
    } elseif (strlen($email) > 255) {
        $validation_errors['email'] = 'Email address is too long.';
    } elseif (preg_match('/[<>"\']/', $email)) {
        $validation_errors['email'] = 'Email address contains invalid characters.';
    }
    
    // Phone validation
    if (empty($phone)) {
        $validation_errors['phone'] = 'Phone number is required.';
    } else {
        // Remove all non-digit characters for validation
        $digits_only = preg_replace('/\D/', '', $phone);
        
        // Check if it has at least 7 digits and not more than 15
        if (strlen($digits_only) < 7 || strlen($digits_only) > 15) {
            $validation_errors['phone'] = 'Phone number must be between 7 and 15 digits.';
        }
        
        // Check if it contains valid characters (digits, +, -, spaces, parentheses)
        if (!preg_match('/^[\d\+\-\s\(\)]+$/', $phone)) {
            $validation_errors['phone'] = 'Phone number contains invalid characters.';
        }
        
        // Check for suspicious patterns
        if (preg_match('/(.)\1{4,}/', $phone)) {
            $validation_errors['phone'] = 'Phone number appears to be invalid.';
        }
    }
    
    // Company validation (optional but validate if provided)
    if (!empty($company) && strlen($company) > 255) {
        $validation_errors['company'] = 'Company name is too long.';
    } elseif (!empty($company) && preg_match('/[<>"\']/', $company)) {
        $validation_errors['company'] = 'Company name contains invalid characters.';
    }
    
    // Subject validation (optional but validate if provided)
    if (!empty($subject) && strlen($subject) > 255) {
        $validation_errors['subject'] = 'Subject is too long.';
    } elseif (!empty($subject) && preg_match('/[<>"\']/', $subject)) {
        $validation_errors['subject'] = 'Subject contains invalid characters.';
    }
    
    // Message validation
    if (empty($message_text)) {
        $validation_errors['message'] = 'Message is required.';
    } elseif (strlen($message_text) < 10) {
        $validation_errors['message'] = 'Message must be at least 10 characters long.';
    } elseif (strlen($message_text) > 5000) {
        $validation_errors['message'] = 'Message must not exceed 5000 characters.';
    } elseif (preg_match('/[<>"\']/', $message_text)) {
        $validation_errors['message'] = 'Message contains invalid characters.';
    }
    
    // Check for spam patterns
    $spam_keywords = ['viagra', 'casino', 'lottery', 'winner', 'congratulations', 'click here', 'free money', 'bitcoin', 'cryptocurrency', 'investment', 'loan', 'debt', 'refinance'];
    $message_lower = strtolower($message_text);
    foreach ($spam_keywords as $keyword) {
        if (strpos($message_lower, $keyword) !== false) {
            $validation_errors['message'] = 'Your message contains content that appears to be spam.';
            break;
        }
    }
    
    // Check for excessive repetition
    if (preg_match('/(.)\1{10,}/', $message_text)) {
        $validation_errors['message'] = 'Message contains excessive repetition.';
    }
    
    // Check for suspicious URL patterns
    if (preg_match('/https?:\/\/[^\s]+/', $message_text)) {
        $validation_errors['message'] = 'Messages cannot contain URLs.';
    }
    
    // Rate limiting - check for too many submissions from same IP
    $ip_address = $_SERVER['REMOTE_ADDR'] ?? '';
    if (!empty($ip_address)) {
        try {
            $pdo = getDBConnection();
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM contact_leads WHERE ip_address = ? AND created_at > DATE_SUB(NOW(), INTERVAL 1 HOUR)");
            $stmt->execute([$ip_address]);
            $recent_submissions = $stmt->fetchColumn();
            
            if ($recent_submissions >= 5) {
                $validation_errors['general'] = 'Too many submissions from your IP address. Please try again later.';
            }
        } catch(PDOException $e) {
            // Continue with submission if rate limiting check fails
            error_log("Rate limiting check failed: " . $e->getMessage());
        }
    }
    
    // Check for duplicate submissions (same email and message within 24 hours)
    if (!empty($email) && !empty($message_text)) {
        try {
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM contact_leads WHERE email = ? AND message = ? AND created_at > DATE_SUB(NOW(), INTERVAL 24 HOUR)");
            $stmt->execute([$email, $message_text]);
            $duplicate_submissions = $stmt->fetchColumn();
            
            if ($duplicate_submissions > 0) {
                $validation_errors['general'] = 'You have already submitted this message recently.';
            }
        } catch(PDOException $e) {
            // Continue with submission if duplicate check fails
            error_log("Duplicate check failed: " . $e->getMessage());
        }
    }
    
    // Set validation errors to response
    if (!empty($validation_errors)) {
        $response['errors'] = $validation_errors;
    }
    
    if (empty($response['errors'])) {
        try {
            $pdo = getDBConnection();
            
            // Clean phone number (keep original format for storage)
            $clean_phone = !empty($phone) ? trim($phone) : '';
            
            // Get client IP and user agent
            $ip_address = $_SERVER['REMOTE_ADDR'] ?? '';
            $user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';
            
            // Sanitize inputs
            $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            $company = htmlspecialchars($company, ENT_QUOTES, 'UTF-8');
            $subject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
            $message_text = htmlspecialchars($message_text, ENT_QUOTES, 'UTF-8');
            
            $stmt = $pdo->prepare("INSERT INTO contact_leads (name, email, phone, company, subject, message, ip_address, user_agent) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            
            $execute_result = $stmt->execute([$name, $email, $clean_phone, $company, $subject, $message_text, $ip_address, $user_agent]);
            
            if ($execute_result) {
                $lead_id = $pdo->lastInsertId();
                
                // Queue email notification for background processing
                $lead_data = [
                    'name' => $name,
                    'email' => $email,
                    'phone' => $clean_phone,
                    'company' => $company,
                    'subject' => $subject,
                    'message' => $message_text,
                    'ip_address' => $ip_address
                ];
                
                $queue_result = queueContactEmailNotification($lead_data);
                if (!$queue_result['success']) {
                    error_log("Contact email queue failed: " . $queue_result['message']);
                }
                
                if ($is_ajax) {
                    $response['success'] = true;
                    $response['message'] = 'Thank you for your ' . $subject . ' inquiry! Our team will review your message and get back to you within 24 hours.';
                    $response['data'] = [
                        'lead_id' => $lead_id,
                        'email_queued' => $queue_result['success'] ?? false,
                        'queue_id' => $queue_result['queue_id'] ?? null
                    ];
                } else {
                    // Set success flag for redirect
                    $success = true;
                }
            } else {
                $errorInfo = $stmt->errorInfo();
                $response['message'] = 'Database insert failed: ' . $errorInfo[2];
                $response['debug'] = [
                    'sql_state' => $errorInfo[0],
                    'error_code' => $errorInfo[1],
                    'error_message' => $errorInfo[2]
                ];
            }
        } catch(PDOException $e) {
            error_log("Database error in contact handler: " . $e->getMessage());
            $response['message'] = 'Database error: ' . $e->getMessage();
            $response['debug'] = [
                'error_code' => $e->getCode(),
                'error_message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ];
        } catch(Exception $e) {
            error_log("General error in contact handler: " . $e->getMessage());
            $response['message'] = 'General error: ' . $e->getMessage();
            $response['debug'] = [
                'error_code' => $e->getCode(),
                'error_message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ];
        }
    }
} else {
    if ($is_ajax) {
        $response['message'] = 'This endpoint only accepts POST requests. Please use the contact form to submit your message.';
        $response['errors']['general'] = 'Direct access to this endpoint is not allowed.';
    } else {
        // Redirect to contact page with error
        header('Location: ./contact-us?error=1');
        exit();
    }
}

if ($is_ajax) {
    // Return JSON response for AJAX
    echo json_encode($response);
    exit();
} else {
    // Redirect for regular form submission
    if (isset($success)) {
        // Redirect to success page
        header('Location: ./contact-us?success=1');
        exit();
    } else {
        // Redirect to contact page with error
        header('Location: ./contact-us?error=1');
        exit();
    }
}

// Old function removed - now using PHPMailer from config/email.php
?>
