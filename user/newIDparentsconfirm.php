<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Start the session
session_start();

// Include database connection file
include('includes/dbconnection.php');

// Initialize variables
$error = '';

// Check if user is logged in
if(isset($_SESSION['uid'])){
    // Retrieve user information from the database
    $stuid = $_SESSION['uid'];
    $query = "SELECT * FROM tblidnumbers WHERE Userid = '$stuid'"; // Modified column name 'UserID' to 'Userid'
    $result = mysqli_query($con, $query);

    // Check if query was successful
    if($result){
        // Fetch user data
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $idnumber = $row['idnumber'];
            $idfullname = $row['idfullname'];
       
        }
    } else {
        // Handle query error
        $error = "Error fetching user information from the database: " . mysqli_error($con);
    }
} else {
    // Handle case when user is not logged in
    // You can redirect the user to the login page or display a message indicating that they need to log in
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verify'])) {
    // Retrieve form data if set
    $entered_idnumber = isset($_POST['idnumber']) ? $_POST['idnumber'] : '';
    $entered_idfullname = isset($_POST['idfullname']) ? $_POST['idfullname'] : '';

    // Validate if form fields are not empty
    if (!empty($entered_idnumber) && !empty($entered_idfullname)) {
        // Query to check if ID number and full name match any records in the database
        $validationQuery = "SELECT * FROM tblidnumbers WHERE idnumber = '$entered_idnumber' AND idfullname = '$entered_idfullname'";
        $validationResult = mysqli_query($con, $validationQuery);

        // Check if any matching records found
        if (mysqli_num_rows($validationResult) > 0) {
            // Redirect to the admission form page if match found
            header("Location: addmission-form.php");
            exit();
        } else {
            // Display error message if no match found
            $error = "ID number and full name do not match any records.";
        }
    } else {
        // Display error message if form fields are empty
        $error = "ID number and full name are required fields.";
    }
}
?>


<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <title>Pata Kitambulisho Management System || New ID Application Form</title>
    <!-- CSS -->
    <style>
        /* Add CSS styles here */
        .errorWrap {
            padding: 10px;
            margin: 20px 0 0px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
    </style>
</head>
<body class="vertical-layout vertical-menu-modern 2-columns menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<?php include('includes/header.php'); ?>
<?php include('includes/leftbar.php'); ?>
<div class="app-content content">
    <divclass="content-wrapper">
        <div class="content-header row">
           <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">
New ID Application Form
          </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                </li>
<li class="breadcrumb-item active">Application
                </li>
              </ol>
            </div>
          </div>
        </div>
        </div>
        <div class="content-body">
            <!-- Your existing content goes here -->
            <!-- ID Number Verification Form -->
            <form name="idVerificationForm" method="post" action="">
                <section class="formatter" id="formatter">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">ID Number Verification</h4>
									<p> Please put your parent or gurdian ID number and their name as it appears on the ID</p>
                                    <!-- Card header here -->
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <!-- Error message display -->
                                        <?php
                                        // Display error message if any
                                        if ($error) {
                                            echo '<p style="color: red;">' . $error . '</p>';
                                        }
                                        ?>
                                        <!-- Form body here -->
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
<td>ID Number</td>
                                                        <td><input class="form-control white_bg" id="idnumber" name="idnumber" type="text" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Full Name</td>
                              <td><input class="form-control white_bg" id="idfullname" name="idfullname" type="text" required></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div class="form-group col-md-12" align="center">
                                                                <button type="submit" class="btn btn-success" name="verify">Verify</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
</div>
</body>
</html>