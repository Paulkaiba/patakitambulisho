<?php
session_start();

// Debugging session values
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

// Handle OTP resend via a GET request
if (isset($_GET['resend'])) {
    // Include the OTP generator and mailer files
    include('2F/otp_generator.php');
    include('../PHPMailer/mailer_demo.php');

    // Generate a new OTP and save it to the session
    $_SESSION['otp'] = generateOTP();

    // Ensure email exists in the session
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $otp = $_SESSION['otp'];

        $query = mysqli_query($con, "SELECT FirstName FROM tbluser WHERE Email = $email"); 

        $FirstName = $fname;

        $Subject = "Your OTP for PKMS Registration";
        $Body = "<p>Dear $fname,</p>
                 <p>Your One-Time Password (OTP) for resending process is <strong>$otp</strong>.</p>
                 
                 <p>Thank you,<br>PKMS Team</p>";

        // Call the sendMail function
        if (sendMail($email, $Subject, $Body)) {
            echo "<script>alert('A new OTP has been sent to your registered email.');</script>";
        } else {
            echo "<script>alert('Failed to send OTP. Please try again later.');</script>";
        }
    } else {
        echo "<script>alert('No email address found in session.');</script>";
    }
}

// Verify OTP when the "Verify" button is pressed
if (isset($_POST['verify'])) {
    $inputOtp = $_POST['otp'];

    // Check if the input OTP matches the session OTP
    if (isset($_SESSION['otp']) && $inputOtp == $_SESSION['otp']) {
        // Clear OTP from session to prevent reuse
        unset($_SESSION['otp']);

        // Successful OTP verification
        // Fetch the user ID from the database
        if (isset($_SESSION['email'])) {
            include('includes/dbconnection.php');

            $email = $_SESSION['email'];
            $query = "SELECT ID FROM tbluser WHERE Email='$email'";
            $result = mysqli_query($con, $query);

            // Check if the user exists
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['uid'] = $row['ID']; // Store the user ID in session

                // Redirect to dashboard.php
                echo "<script>alert('OTP verification successful. Redirecting to change password..');</script>";
                echo "<script>window.location.href='reset-password.php';</script>";
                exit();
            } else {
                echo "<script>alert('User not found in database. Please try again.');</script>";
            }
        } else {
            echo "<script>alert('No email address found in session.');</script>";
        }
    } else {
        // OTP verification failed
        echo "<script>alert('Invalid OTP. Please try again.');</script>";
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
 <?php includeVendorCSS() ?>  <!-- END VENDOR CSS-->
  <!-- BEGIN MODERN CSS-->
 <?php includemodernCSS() ?>  
  <!-- BEGIN Page Level CSS-->
  <?php includePageLevelCSS()?>  <!-- END Page Level CSS-->
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
                    <h4 style="font-weight: bold"> PKMS Two Factor Authenticator</h4>
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span>Please Sign Up</span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">

                  <form method="post">
                      <label for="otp">Enter OTP:</label>
                      <input type="text" name="otp" id="otp" required>
                      <button type="submit" name="verify">Verify OTP</button>
                    </form>
                    <p>
                      <a href="?resend=true">Resend the OTP</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <p>
    </p>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <?php includeFooter() ?>
  <?php includeVendorJS()?>
  <?php includeAppJS()?>
</body>

</html>