<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('includes/dbconnection.php');
include('2F/otp_generator.php');

// Only include mailer_demo.php if the form is submitted and the OTP needs to be sent
if (isset($_POST['submit'])) {
    include('../PHPMailer/mailer_demo.php');

    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $contno = $_POST['contactno'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // Check if email or contact already exists
    $ret = mysqli_query($con, "SELECT Email FROM tbluser WHERE Email='$email' || MobileNumber='$contno'");
    $result = mysqli_fetch_array($ret);

    if ($result > 0) {
        echo "<script>alert('This email or Contact Number is already associated with another account');</script>";
    } else {
        // Insert user data into the database
        $query = mysqli_query($con, "INSERT INTO tbluser (FirstName, LastName, MobileNumber, Email, Password) 
                                     VALUES ('$fname', '$lname', '$contno', '$email', '$password')");
        if ($query) {
          // Generate OTP
          $otp = generateOTP();

          $_SESSION['otp'] = $otp;
          $_SESSION['email'] = $email;

          //Send OTP via email
          $subject = "Your OTP for PKMS Registration";
          $body = "<p>Dear $fname,</p>
                   <p>Your One-Time Password (OTP) for completing the registration process is <strong>$otp</strong>.</p>
                   <p>This OTP is valid for 10 minutes.</p>
                   <p>Thank you,<br>PKMS Team</p>";

                   if (sendMail($email, $Subject, $Body)) {
                    echo "<script>
                            alert('OTP sent to your email. Redirecting to the verification page...');
                            window.location.href = 'twofactor.php';
                          </script>";
                } else {
                    echo "<script>alert('Unable to send OTP. Please try again.');</script>";
                }
            } else {
                echo "<script>alert('Something went wrong. Please try again.');</script>";
            }
    }
}

include('layouts/SLFRC.php');
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>

  <title>Pata kitambulisho Management System|| User Signup
  </title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
  <!-- BEGIN VENDOR CSS-->
  <?php includeVendorCSS() ?>
 
  <!-- BEGIN MODERN CSS-->
  <?php includemodernCSS() ?>
   
  <!-- BEGIN Page Level CSS-->
  <?php includePageLevelCSS() ?>  
  
  <!-- BEGIN Custom CSS-->
 <?php includeCustomCSS() ?>  
 
  <script type="text/javascript">
    function checkpass() {
      if (document.signup.password.value != document.signup.repeatpassword.value) {
        alert('Password and Repeat Password field does not match');
        document.signup.repeatpassword.focus();
        return false;
      }
      return true;
    }
  </script>

</head>

<body class="vertical-layout vertical-menu 1-column  bg-cyan bg-lighten-2 menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="1-column">
  <!-- fixed-top-->
  <?php includeNavbar()?>
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
                    <h4 style="font-weight: bold"> PKMS User Signup</h4>
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
                        <input type="text" name="contactno" id="contactno" class="form-control input-lg" placeholder="Contact Number" required="true" maxlength="10" tabindex="3" required data-validation-required-message="Please enter display name.">
                        <div class="form-control-position">
                          <i class="ft-user"></i>
                        </div>
                        <div class="help-block font-small-3"></div>
                      </fieldset>
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4" required="true" required data-validation-required-message="Please enter email address.">
                        <div class="form-control-position">
                          <i class="ft-mail"></i>
                        </div>
                        <div class="help-block font-small-3"></div>
                      </fieldset>
                      <div class="row">
                        <div class="col-12 col-sm-6 col-md-6">
                          <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5" required>
                            <div class="form-control-position">
                              <i class="la la-key"></i>
                            </div>
                            <div class="help-block font-small-3"></div>
                          </fieldset>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                          <fieldset class="form-group position-relative has-icon-left">
                            <input type="password" name="repeatpassword" id="repeatpassword" class="form-control input-lg" placeholder="Repeat Password" tabindex="6" data-validation-matches-match="password" required="true" data-validation-matches-message="Password & Confirm Password must be the same.">
                            <div class="form-control-position">
                              <i class="la la-key"></i>
                            </div>
                            <div class="help-block font-small-3"></div>
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
                        <div class="col-6 col-sm-6 col-md-6">


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
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <?php includeFooter()?>
  <?php includeVendorJS()?>
  <?php includeAppJS() ?>
</body>

</html>