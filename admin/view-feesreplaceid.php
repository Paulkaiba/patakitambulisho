<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('includes/dbconnection.php');

if (strlen($_SESSION['aid']) == 0) {
    header('location:logout.php');
    exit(); // Terminate script after redirection
} else {
   $stufid = isset($_GET['docid']) ? $_GET['docid'] : ''; // Check if docid is set, otherwise initialize it as an empty string

    if ($stufid == "") {
        // Display an error message if docid is not provided
        echo "Error: Missing document ID";
        exit();
    } else {
        $query = "SELECT * FROM tblfeesre WHERE UserID = '$stufid'";
        $result = mysqli_query($con, $query);
        if (!$result || mysqli_num_rows($result) == 0) {
            // No record found for the provided docid
            echo "Error: No record found for the provided document ID";
            exit();
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the approval button is clicked
    if (isset($_POST['docid'])) {
        $stufid = $_POST['docid'];
        // Update the approval status in the database
        $update_query = "UPDATE tblfeesre SET approval = 'Approved' WHERE UserID = '$stufid'";
        $update_result = mysqli_query($con, $update_query);
        if ($update_result) {
            // Redirect to selected-replacedIDapplication.php upon successful approval
            header('Location: selected-replacedIDapplication.php');
            exit();
        } else {
            // Return error message if the update fails
            echo 'error';
            exit();
        }
    }
}
?>



<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <title>Pata Kitambulisho Management System</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    <style>
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
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Admission Fees</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Admission Fees</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
      <div class="content-body">
    <?php
    if ($stufid == "") {
        echo '<p style="font-size:16px; color:red" align="center">Error: Missing document ID. </p>';
    } else {
        $query = mysqli_query($con, "SELECT * FROM tblfeesre WHERE UserID = '$stufid'");
        $rw = mysqli_num_rows($query);
        if ($rw > 0) {
            while ($row = mysqli_fetch_array($query)) {
    ?>
                <table class="table mb-0">
                    <tr>
                        <th>Payment Amount</th>
                        <td><?php echo $row['PaymentAmount']; ?></td>
                    </tr>
                    <tr>
                        <th>Mode of Payment</th>
                        <td><?php echo $row['ModeofPayments']; ?></td>
                    </tr>
                    <tr>
                        <th>Transaction Number</th>
                        <td><?php echo $row['TransactionNumber']; ?></td>
                    </tr>
                    <tr>
                        <th>Date of Transaction</th>
                        <td><?php echo $row['DateofTransaction']; ?></td>
                    </tr>
                </table>
                <!-- Add Approve button -->
                <button class="btn-approve" data-docid="<?php echo $row['ID']; ?>">Approve Payment</button>
   
</div>
<?php } }   ?>
    </div>
</div>
<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // AJAX request to approve payment
        $(".btn-approve").click(function () {
            $.ajax({
                url: '', // Leave it blank to submit to the same page
                type: 'POST',
                data: {docid: $(this).data('docid')}, // Pass the docid to the same page
                success: function (response) {
                    if (response == 'success') {
                        // Display success message
                        alert("Payment Approved");
                        // Redirect to selected-replacedIDapplication.php upon success
                        window.location.href = 'selected-replacedIDapplication.php';
                    } else {
                        // Display error message
                        alert("Error approving payment");
                    }
                },
                error: function (xhr, status, error) {
                    // Display error message if AJAX request fails
                    alert("AJAX error: " + error);
                }
            });
        });
    });
</script>

<?php include('includes/footer.php'); ?>
</body>
</html>
<?php  } ?>