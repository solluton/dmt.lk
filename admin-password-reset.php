<?php
require_once 'config/database.php';
require_once 'config/csrf.php';
require_once 'config/password_security.php';

// Require login
requireLogin();

$user = getCurrentUser();
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate CSRF token
    requireCSRFValidation();
    
    $currentPassword = $_POST['current_password'] ?? '';
    $newPassword = $_POST['new_password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    
    if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
        $error = 'All fields are required.';
    } elseif ($newPassword !== $confirmPassword) {
        $error = 'New passwords do not match.';
    } else {
        // Validate password strength
        $passwordValidation = validatePasswordStrength($newPassword);
        if (!$passwordValidation['valid']) {
            $error = 'Password requirements not met:<br>' . implode('<br>', $passwordValidation['errors']);
        } else {
            try {
                $pdo = getDBConnection();
                
                // Verify current password
                $stmt = $pdo->prepare("SELECT password FROM users WHERE id = ?");
                $stmt->execute([$user['id']]);
                $userData = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if (!$userData || !password_verify($currentPassword, $userData['password'])) {
                    $error = 'Current password is incorrect.';
                } else {
                    // Update password
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
                    
                    if ($stmt->execute([$hashedPassword, $user['id']])) {
                        $message = 'Password updated successfully! Your new password meets all security requirements.';
                        // Clear form
                        $currentPassword = $newPassword = $confirmPassword = '';
                    } else {
                        $error = 'Failed to update password.';
                    }
                }
            } catch(PDOException $e) {
                $error = 'An error occurred. Please try again.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="NeoMed Pharma - Password Reset" />
  <meta name="keyword" content="neomed, pharma, password, reset, admin" />
  <meta name="author" content="NeoMed Pharma" />
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
  
  <!-- Favicon -->
  <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
  
  <!-- Title -->
  <title>Password Reset | DMT Cricket - Admin Dashboard</title>
  
  <!-- Dashboard UI CSS -->
  <link rel="stylesheet" href="dashboard ui/dist/assets/vendors/metismenu/metisMenu.min.css">
  <link rel="stylesheet" href="dashboard ui/dist/assets/vendors/@flaticon/flaticon-uicons/css/all/all.css">
  <link rel="stylesheet" type="text/css" href="dashboard ui/dist/assets/css/theme.min.css">
  
  <!-- DMT Custom Dashboard Colors -->
  <link rel="stylesheet" type="text/css" href="css/dashboard-custom.css">
  
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <!-- Color Modes JS - DISABLED to force light mode -->
  <!-- <script src="dashboard ui/dist/assets/js/color-modes.min.js"></script> -->
  
  <!-- Force Light Mode Script -->
  <script>
    // Force light mode and prevent dark mode
    document.documentElement.setAttribute('data-bs-theme', 'light');
    localStorage.setItem('theme', 'light');
  </script>
  
  <!-- HTML5 shim and Respond.js for IE8 support -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>
  <!-- Main Wrapper -->
  <div class="main-wrapper">
    <?php include 'admin/includes/sidebar-global.php'; ?>
    
    <!-- Main Content -->
    <main id="edash-main">
      <?php include 'admin/includes/header-global.php'; ?>
      
      <!-- Page Content -->
      <div class="edash-page-container container" id="edash-page-container">
        <!-- Breadcrumb -->
        <div class="edash-breadcrumb d-flex align-items-center justify-content-between mb-4">
          <div class="edash-breadcrumb-left">
            <h4 class="mb-0">Password Reset</h4>
            <p class="text-muted mb-0">Change your account password</p>
          </div>
          <div class="edash-breadcrumb-right">
            <a href="admin/dashboard.php" class="btn btn-outline-secondary">
              <i class="fi fi-rr-arrow-left me-2"></i>Back to Dashboard
            </a>
          </div>
        </div>
        
        <!-- Messages -->
        <?php if ($message): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fi fi-rr-check me-2"></i><?php echo htmlspecialchars($message); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        <?php endif; ?>
        
        <?php if ($error): ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fi fi-rr-exclamation me-2"></i><?php echo htmlspecialchars($error); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          </div>
        <?php endif; ?>
        
        <!-- Password Reset Form -->
        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">Change Password</h5>
          </div>
          <div class="card-body">
            <form method="POST" action="" onsubmit="return confirmPasswordUpdate()">
              <?= getCSRFTokenField() ?>
              <div class="row">
                <div class="col-md-8">
                  <div class="mb-4">
                    <label for="current_password" class="form-label">Current Password *</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter your current password" required />
                  </div>
                  
                  <div class="mb-4">
                    <label for="new_password" class="form-label">New Password *</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter your new password" required />
                    <div class="form-text">Password must meet all security requirements listed on the right.</div>
                  </div>
                  
                  <div class="mb-4">
                    <label for="confirm_password" class="form-label">Confirm New Password *</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm your new password" required />
                  </div>
                </div>
                
                <div class="col-md-4">
                  <div class="card bg-light">
                    <div class="card-body">
                      <h6 class="card-title">Password Requirements</h6>
                      <ul class="list-unstyled mb-0">
                        <li><i class="fi fi-rr-check text-success me-2"></i>At least 8 characters</li>
                        <li><i class="fi fi-rr-check text-success me-2"></i>One uppercase letter (A-Z)</li>
                        <li><i class="fi fi-rr-check text-success me-2"></i>One lowercase letter (a-z)</li>
                        <li><i class="fi fi-rr-check text-success me-2"></i>One number (0-9)</li>
                        <li><i class="fi fi-rr-check text-success me-2"></i>One special character (!@#$%^&*)</li>
                        <li><i class="fi fi-rr-check text-success me-2"></i>No common passwords</li>
                        <li><i class="fi fi-rr-check text-success me-2"></i>No repeated characters</li>
                        <li><i class="fi fi-rr-check text-success me-2"></i>No sequential patterns</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                  <i class="fi fi-rr-settings me-2"></i>Update Password
                </button>
                <a href="admin/dashboard.php" class="btn btn-outline-secondary">
                  <i class="fi fi-rr-cross me-2"></i>Cancel
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      <?php include 'admin/includes/footer-content-global.php'; ?>
    </main>
  </div>
  
  <!-- Scripts -->
  <script src="dashboard ui/dist/assets/js/vendors.min.js"></script>
  <script src="dashboard ui/dist/assets/js/common-init.min.js"></script>
  
  <script>
    // Password confirmation validation
    document.getElementById('confirm_password').addEventListener('input', function() {
      const newPassword = document.getElementById('new_password').value;
      const confirmPassword = this.value;
      
      if (newPassword !== confirmPassword) {
        this.setCustomValidity('Passwords do not match');
      } else {
        this.setCustomValidity('');
      }
    });
    
    document.getElementById('new_password').addEventListener('input', function() {
      const confirmPassword = document.getElementById('confirm_password');
      if (confirmPassword.value) {
        confirmPassword.dispatchEvent(new Event('input'));
      }
    });
    
    // Password update confirmation
    function confirmPasswordUpdate() {
      Swal.fire({
        title: 'Change Password?',
        text: 'Are you sure you want to change your password? You will need to login again with your new password.',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, change password!',
        cancelButtonText: 'Cancel',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          // Submit the form
          event.target.submit();
        } else {
          // Prevent form submission
          return false;
        }
      });
      return false; // Prevent default form submission
    }
  </script>
  
  <!-- Menu Backdrop -->
  <div class="edash-menu-backdrop" id="edash-menu-hide"></div>
</body>
</html>
