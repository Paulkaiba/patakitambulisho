<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_POST['login'])) {
  $emailcon = $_POST['emailcont'];
  $password = md5($_POST['password']);
  $query = mysqli_query($con, "select ID from tbluser where  (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password' ");
  if (!$query) {
    die("Query Failed: " . mysqli_error($con));
  }
  $ret = mysqli_fetch_array($query);
  if ($ret) {
    $_SESSION['uid'] = $ret['ID'];
    echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
    exit;
  } else {
    echo "<script>alert('Invalid Details');</script>";
  }
}

include('layouts/SLFRC.php');
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
  <title>User Login</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <?php includefavicon() ?>  
  <?php includeVendorCSS() ?>
  <?php includemodernCSS() ?>
  <?php includePageLevelCSS() ?>
</head>

<body class="vertical-layout vertical-menu 1-column  bg-cyan bg-lighten-2 menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="1-column">
  <!-- fixed-top-->
  <?php includeNavbar() ?>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <section class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0 pb-0">
                  <div class="card-title text-center">
                    <h4 style="font-weight: bold"> PKMS User Login</h4>
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Login</span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">

                    <form class="form-horizontal" action="" name="login" method="post">
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" name="emailcont" id="email" class="form-control input-lg" placeholder="Registered Email or Contact Number" required="true">
                        <div class="form-control-position">
                          <i class="ft-mail"></i>
                        </div>
                        <div class="help-block font-small-3"></div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5" required>
                        <div class="form-control-position">
                          <i class="la la-key"></i>
                        </div>
                        <div class="help-block font-small-3"></div>
                      </fieldset>
                      <div class="row">
                        <div class="col-6 col-sm-6 col-md-6">
                          <button type="submit" name="login" class="btn btn-info btn-lg btn-block"><i class="ft-user"></i> Login</button>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6">
                          <a href="signup.php" class="btn btn-danger btn-lg btn-block" name="login" type="text"><i class="ft-unlock"></i> Register</a>
                        </div>
                      </div>
                      <br>
                      <div class="col-6 col-sm-6 col-md-6">
                        <p><a href="forget-password.php">Forgot password?</a></p>
                      </div>
                      <div class="col-6 col-sm-6 col-md-6">
                        <p><a href="../index.php">Back Home</a></p>
                      </div>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
      </div>
      </section>
    </div>
  </div>
  </div>
  <footer class="footer fixed-bottom footer-dark navbar-border navbar-shadow">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
      <span class="float-md-left d-block d-md-inline-block">Copyright &copy; <?php echo date('Y'); ?> <a class="text-bold-800 grey darken-2">PKMS </a>, All rights reserved. </span>
    </p>
  </footer>
  <script src="../app-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
  <script src="../app-assets/vendors/js/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>
  <script src="../app-assets/vendors/js/forms/icheck/icheck.min.js" type="text/javascript"></script>
  <script src="../app-assets/js/core/app-menu.js" type="text/javascript"></script>
  <script src="../app-assets/js/core/app.js" type="text/javascript"></script>
  <script src="../app-assets/js/scripts/customizer.js" type="text/javascript"></script>
  <script src="../app-assets/js/scripts/forms/form-login-register.js" type="text/javascript"></script>

</body>

</html>
