<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('includes/dbconnection.php');

if (strlen($_SESSION['aid']) == 0) {
    header('location:logout.php');
    exit();
} else {
    if (isset($_GET['userid']) && !empty($_GET['userid'])) {
        $userid = $_GET['userid'];
        $_SESSION['userid'] = $userid;

        $query = "SELECT * FROM tblfeesst WHERE UserID = '$userid'";
        $result = mysqli_query($con, $query);

        if (!$result) {
            echo "Error in SQL Query: " . mysqli_error($con);
            exit();
        }

        if (mysqli_num_rows($result) == 0) {
            echo "Error: No record found for UserID " . $userid;
            exit();
        }

        $row = mysqli_fetch_assoc($result);
        $stufid = $row['ID'];
    } else {
        echo "Error: Missing UserID";
        exit();
    }
}


?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <title>Pata Kitambulisho Management System</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <style>
        .errorWrap {
            padding: 10px;
            margin: 20px 0 0px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
    </style>
</head>
<body class="vertical-layout vertical-menu-modern 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
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
            <?php if (empty($stufid)) {
                echo '<p style="font-size:16px; color:red" align="center">Citizen not submitted fees yet.</p>';
            } else {
                $query = mysqli_query($con, "SELECT * FROM tblfeesst WHERE ID=$stufid");
                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_array($query)) { ?>
                        <table class="table mb-0">
                            <tr><th>Payment Amount</th><td><?php echo $row['PaymentAmount']; ?></td></tr>
                            <tr><th>Mode of Payment</th><td><?php echo $row['ModeofPayments']; ?></td></tr>
                            <tr><th>Transaction Number</th><td><?php echo $row['TransactionNumber']; ?></td></tr>
                            <tr><th>Date of Transaction</th><td><?php echo $row['DateofTransaction']; ?></td></tr>
                        </table>
                        <button type="button" class="btn-approve" data-userid="<?php echo $_SESSION['userid']; ?>">
    Approve & Generate Document
</button>

                    <?php }
                }
            }
            echo "Debug: Stored docid in session - " . ($_SESSION['userid'] ?? 'Not set'); ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script> 
$(document).ready(function () {
    $(".btn-approve").click(function () {
        let userid = $(this).data('userid');

        // Step 1: Generate Document
        $.ajax({
            url: 'includes/printAttachment.php',
            type: 'POST',
            data: { userid: userid },
            success: function (response) {
                if (response.trim() === 'success') {
                    alert("✅ Document Generated Successfully!");

                    // Step 2: Approve Payment in the Database
                    $.ajax({
                        url: 'includes/approve_payment.php',
                        type: 'POST',
                        data: { userid: userid },
                        success: function (approveResponse) {
                            if (approveResponse.trim() === 'success') {
                                alert("✅ Payment Approved Successfully!");

                                // Step 3: Refresh the page dynamically to reflect changes
                                $("#feesTable").load("view-feesstolenid.php #feesTable");
                            } else {
                                alert("❌ Error Updating Payment: " + approveResponse);
                            }
                        },
                        error: function (xhr, status, error) {
                            alert("❌ AJAX Error (Approval): " + error);
                        }
                    });

                } else {
                    alert("❌ Error Generating Document: " + response);
                }
            },
            error: function (xhr, status, error) {
                alert("❌ AJAX Error (Document Generation): " + error);
            }
        });
    });
});
</script>


<?php include('includes/footer.php'); ?>
</body>
</html>
