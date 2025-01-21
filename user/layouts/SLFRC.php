<?php
// Function to include Vendor CSS files
function includeVendorCSS() {
  echo '
    <link rel="stylesheet" type="text/css" href="../app-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/forms/icheck/custom.css">
  ';
}
// Function to include favicon images files
function includefavicon() {
    echo '
      <link rel="icon" href="../assets/images/favicon/favicon.ico" type="image/x-icon" />
  <link rel="apple-touch-icon" sizes="180x180" href="../assets/images/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon/favicon-16x16.png">
    ';
  }
// Function to include Page Level CSS files
function includePageLevelCSS() {
  echo '
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/login-register.css">
  ';
}
function includemodernCSS() {
    echo '
       <link rel="stylesheet" type="text/css" href="../app-assets/css/app.css">
    ';
  }
// Function to include Custom CSS files
function includeCustomCSS() {
  echo '<link rel="stylesheet" type="text/css" href="../assets/css/style.css">';
}

// Function to include Navbar
function includeNavbar() {
  echo '
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item">
              <a class="navbar-brand" href="../index.php">
                <h3 class="brand-text">Pata Kitambulisho Management System | User Signup</h3>
              </a>
            </li>
            <li class="nav-item d-md-none">
              <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
            </li>
          </ul>
        </div>
        <div class="navbar-container">
          <div class="collapse navbar-collapse justify-content-end" id="navbar-mobile">
            <ul class="nav navbar-nav">
              <li class="nav-item"><a class="nav-link mr-2 nav-link-label" href="../index.php"><i class="ficon ft-arrow-left"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  ';
}

// Function to include the Signup Form
function includeSignupForm() {
  echo '
    <section class="flexbox-container">
      <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-md-4 col-10 box-shadow-2 p-0">
          <div class="card border-grey border-lighten-3 m-0">
            <div class="card-header border-0 pb-0">
              <div class="card-title text-center">
                <h4 style="font-weight: bold">PKMS User Signup</h4>
              </div>
              <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                <span>Please Sign Up</span>
              </h6>
            </div>
            <div class="card-content">
              <div class="card-body">
                <form method="post" name="signup" onSubmit="return checkpass();">
                  <div class="row">
                    <div class="col-12 col-sm-6 col-md-6">
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" name="firstname" id="firstname" required="true" class="form-control input-lg" placeholder="First Name" tabindex="1">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                      </fieldset>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" name="lastname" id="lastname" required="true" class="form-control input-lg" placeholder="Last Name" tabindex="2">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                      </fieldset>
                    </div>
                  </div>
                  <fieldset class="form-group position-relative has-icon-left">
                    <input type="text" name="contactno" id="contactno" class="form-control input-lg" placeholder="Contact Number" required="true" maxlength="10" tabindex="3">
                    <div class="form-control-position">
                      <i class="ft-user"></i>
                    </div>
                  </fieldset>
                  <fieldset class="form-group position-relative has-icon-left">
                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4" required="true">
                    <div class="form-control-position">
                      <i class="ft-mail"></i>
                    </div>
                  </fieldset>
                  <div class="row">
                    <div class="col-12 col-sm-6 col-md-6">
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5" required>
                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                      </fieldset>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" name="repeatpassword" id="repeatpassword" class="form-control input-lg" placeholder="Repeat Password" tabindex="6" data-validation-matches-match="password" required="true">
                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                      </fieldset>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6 col-sm-6 col-md-6">
                      <button type="submit" name="submit" class="btn btn-info btn-lg btn-block"><i class="ft-user"></i> Register</button>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6">
                      <a href="login.php" class="btn btn-danger btn-lg btn-block"><i class="ft-unlock"></i> Login</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  ';
}

// Function to include Footer
function includeFooter() {
  echo '
    <footer class="footer fixed-bottom footer-dark navbar-border navbar-shadow">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block">Copyright &copy; ' . date('Y') . ' <a class="text-bold-800 grey darken-2">PKMS</a>, All rights reserved. </span>
      </p>
    </footer>
  ';
}

// Function to include Vendor JS files
function includeVendorJS() {
  echo '
    <script src="../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="../app-assets/vendors/js/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>
    <script src="../app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  ';
}

// Function to include App JS files
function includeAppJS() {
  echo '
    <script src="../app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="../app-assets/js/core/app.js" type="text/javascript"></script>
    <script src="../app-assets/js/scripts/customizer.js" type="text/javascript"></script>
    <script src="../app-assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>
  ';
}
?>
