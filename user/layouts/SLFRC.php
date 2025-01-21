<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
  <title><?php echo $page_title ?? 'Pata Kitambulisho Management System'; ?></title>
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <!-- Vendor CSS -->
  <link rel="stylesheet" type="text/css" href="../app-assets/css/vendors.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/forms/icheck/icheck.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/forms/icheck/custom.css">
  <!-- App CSS -->
  <link rel="stylesheet" type="text/css" href="../app-assets/css/app.css">
  <!-- Page Level CSS -->
  <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-menu.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/core/colors/palette-gradient.css">
  <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/login-register.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>

<body class="vertical-layout vertical-menu 1-column bg-cyan bg-lighten-2 menu-expanded fixed-navbar" 
      data-open="click" data-menu="vertical-menu" data-col="1-column">

  <!-- Navbar -->
  <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-shadow">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto">
            <a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu font-large-1"></i></a>
          </li>
          <li class="nav-item">
            <a class="navbar-brand" href="../index.php">
              <h3 class="brand-text">Pata Kitambulisho Management System</h3>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="app-content content">
    <div class="content-wrapper">
      <?php 
      // Placeholder for the main page content
      if (isset($page_content)) {
        echo $page_content; 
      } else {
        echo '<div class="text-center mt-5"><h2>Welcome to the System</h2></div>';
      }
      ?>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix text-muted text-sm-center px-2">
      <span>Copyright © <?php echo date('Y'); ?> 
        <a href="#" target="_blank" class="text-bold-800 primary">Pata Kitambulisho</a>, All rights reserved. 
      </span>
    </p>
  </footer>

  <!-- Vendor JS -->
  <script src="../app-assets/vendors/js/vendors.min.js"></script>
  <script src="../app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
  <script src="../app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
  <!-- App JS -->
  <script src="../app-assets/js/core/app-menu.js"></script>
  <script src="../app-assets/js/core/app.js"></script>
  <script src="../app-assets/js/scripts/forms/form-login-register.js"></script>
</body>

</html>
