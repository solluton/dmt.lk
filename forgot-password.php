<?php
require_once 'config/database.php';

// Redirect if already logged in
redirectIfLoggedIn();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email'] ?? '');
    
    if (empty($email)) {
        $error = 'Please enter your email address.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        try {
            $pdo = getDBConnection();
            $stmt = $pdo->prepare("SELECT id, name FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user) {
                // Generate reset token
                $resetToken = bin2hex(random_bytes(32));
                $expiryTime = date('Y-m-d H:i:s', time() + 3600); // 1 hour from now
                
                // Store reset token in database
                $stmt = $pdo->prepare("UPDATE users SET reset_token = ?, reset_token_expiry = ? WHERE id = ?");
                $stmt->execute([$resetToken, $expiryTime, $user['id']]);
                
                // In a real application, you would send an email here
                // For demo purposes, we'll just show a success message
                $success = 'Password reset instructions have been sent to your email address.';
            } else {
                $error = 'No account found with that email address.';
            }
        } catch(PDOException $e) {
            $error = 'An error occurred. Please try again.';
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
  <meta name="description" content="NeoMed Pharma - Forgot Password" />
  <meta name="keyword" content="neomed, pharma, forgot, password" />
  <meta name="author" content="NeoMed Pharma" />
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
  
  <!-- Favicon -->
  <link href="images/favicon.png" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
  
  <!-- Title -->
  <title>Forgot Password | DMT Cricket - Admin Dashboard</title>
  
  <!-- Dashboard UI CSS -->
  <link rel="stylesheet" href="dashboard ui/dist/assets/vendors/metismenu/metisMenu.min.css">
  <link rel="stylesheet" href="dashboard ui/dist/assets/vendors/@flaticon/flaticon-uicons/css/all/all.css">
  <link rel="stylesheet" type="text/css" href="dashboard ui/dist/assets/css/theme.min.css">
  
  <!-- DMT Custom Dashboard Colors -->
  <link rel="stylesheet" type="text/css" href="css/dashboard-custom.css">
  
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
    <main class="min-vh-100 overflow-y-auto d-flex flex-column justify-content-center px-4 m-0" id="edash-main">
      <div class="card max-wd-400 max-wd-sm-450 mx-auto my-5 bg-body-tertiary">
        <div class="card-body p-sm-8 p-4">
          <!-- Logo -->
          <div class="text-center mb-4">
            <img src="images/DMT-LOGO-Main.avif" alt="DMT Cricket" style="max-width: 150px;">
          </div>
          
          <h4 class="mb-2 fw-semibold">Forgot Password?</h4>
          <p class="fs-14 fw-medium text-muted mb-6">
            No worries! Enter your email address and we'll send you instructions to reset your password for DMT Cricket admin dashboard.
          </p>
          
          <!-- Error/Success Messages -->
          <?php if ($error): ?>
            <div class="alert alert-danger" role="alert">
              <i class="fi fi-rr-exclamation"></i> <?php echo htmlspecialchars($error); ?>
            </div>
          <?php endif; ?>
          
          <?php if ($success): ?>
            <div class="alert alert-success" role="alert">
              <i class="fi fi-rr-check"></i> <?php echo htmlspecialchars($success); ?>
            </div>
          <?php endif; ?>
          
          <!-- Forgot Password Form -->
          <form method="POST" action="">
            <div class="mb-4">
              <input type="email" class="form-control" placeholder="Email" value="<?php echo htmlspecialchars($email ?? ''); ?>" name="email" required />
            </div>
            
            <div class="d-grid mt-5">
              <button type="submit" class="btn btn-lg btn-primary w-100">
                Send Reset Instructions
              </button>
            </div>
          </form>
          
          <!-- Back to Login -->
          <div class="mt-5 text-muted">
            <span>Remember your password?</span>
            <a href="admin/login.php" class="fw-semibold text-dark">Back to Login</a>
          </div>
          
          <!-- Back to Website -->
          <div class="mt-3 text-center">
            <a href="index.php" class="text-muted">
              <i class="fi fi-rr-arrow-left me-1"></i>Back to Website
            </a>
          </div>
        </div>
      </div>
    </main>
  </div>
  
  <!-- Scripts -->
  <script src="dashboard ui/dist/assets/js/vendors.min.js"></script>
  <script src="dashboard ui/dist/assets/js/common-init.min.js"></script>
  
  <!-- Custom Script -->
  <script>
    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
      const alerts = document.querySelectorAll('.alert');
      alerts.forEach(function(alert) {
        alert.style.transition = 'opacity 0.5s';
        alert.style.opacity = '0';
        setTimeout(function() {
          alert.remove();
        }, 500);
      });
    }, 5000);
  </script>
</body>
</html>
