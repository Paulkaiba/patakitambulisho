<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit'])) {
    $mobno = $_SESSION['mobilenumber'];
    $email = $_SESSION['email'];
    $newpassword = md5($_POST['newpassword']);
    $query = mysqli_query($con, "UPDATE tbluser SET Password ='$newpassword' WHERE Email='$email' AND MobileNumber = '$mobno'");
    if($query) {
        echo "<script>alert('Password successfully changed');</script>";
        session_destroy();
        echo "<script>window.location.href='login.php';</script>";
        exit;
    } else {
        echo "<script>alert('Failed to reset password');</script>";
    }
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <title>User Login</title>
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/forms/icheck/custom.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/app.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/login-register.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <!-- END Custom CSS-->
    <script type="text/javascript">
        function checkpass() {
            if(document.resetpassword.newpassword.value != document.resetpassword.confirmpassword.value) {
                alert('New Password and Confirm Password field does not match');
                document.resetpassword.confirmpassword.focus();
                return false;
            }
            return true;
        } 
    </script>
</head>
<body class="vertical-layout vertical-menu 1-column  bg-cyan bg-lighten-2 menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu" data-col="1-column">
    <!-- fixed-top-->
    <?php includeNavbar() ?>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <!-- Content header -->
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-4 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0 pb-0">
                                    <div class="card-title text-center">
                                        <h4 style="font-weight: bold"> PKMS Reset Password</h4>
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                        <span>Reset</span>
                                    </h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <p style="font-size:16px; color:red" align="center">
                                            <?php if($msg){
                                                echo $msg;
                                            } ?>
                                        </p>
                                        <form class="form-horizontal" name="resetpassword" method="post" onsubmit="return checkpass();">
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" name="newpassword" id="newpassword" class="form-control input-lg"
                                                       placeholder="Enter New Password" tabindex="5" required>
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                                <div class="help-block font-small-3"></div>
                                            </fieldset>

                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" name="confirmpassword" id="confirmpassword" class="form-control input-lg"
                                                       placeholder="Enter Confirm Password" tabindex="5" required>
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                                <div class="help-block font-small-3"></div>
                                            </fieldset>

                                            <div class="row">
                                                <div class="col-6 col-sm-6 col-md-6">
                                                    <button type="submit" name="submit" class="btn btn-info btn-lg btn-block"><i class="ft-user"></i>Reset</button>
                                                </div>

                                                <div class="col-6 col-sm-6 col-md-6">
                                                    <a href="login.php" class="btn btn-danger btn-lg btn-block"><i class="ft-unlock"></i> Login</a>
                                                </div>
                                            </div>
                                            <div class="col-6 col-sm-6 col-md-6">
                                                <p><a href="signup.php">New User can register ?</a></p>
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
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <?php includeFooter() ?>
    <!-- BEGIN VENDOR JS-->
   <?php  includeVendorJS() ?>
       <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
   <?php includeAppJS() ?>
</body>
</html>
