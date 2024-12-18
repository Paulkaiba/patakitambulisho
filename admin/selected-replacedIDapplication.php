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
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <title>Pata Kitambulisho Management System|| Selected Application</title>
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
<?php include('includes/header.php');?>
<?php include('includes/leftbar.php');?>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">
                    View Application
                </h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Selected Replaced ID Application</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <table class="table mb-0">
                <thead>
                <tr>
                    <th>C.NO</th>
                    <th>Full Name</th>
                    <th>Last Name</th>
                    <th>Mobile Number</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
              <?php
    $ret = mysqli_query($con, "SELECT tblreplaceid.AdminStatus, tblreplaceid.UserId AS apid, tbluser.FirstName, tbluser.LastName, tbluser.MobileNumber, tbluser.Email 
                                FROM tblreplaceid 
                                INNER JOIN tbluser ON tbluser.ID = tblreplaceid.UserId
                                LEFT JOIN tblfeesre ON tblfeesre.UserID = tbluser.ID AND tblfeesre.approval IS NULL");

    $cnt = 1;
    while ($row = mysqli_fetch_array($ret)) {
        // Process each row
    
?>

                    <tr>
                        <td><?php echo $cnt;?></td>
                        <td><?php echo $row['FirstName'];?></td>
                        <td><?php echo $row['LastName'];?></td>
                        <td><?php echo $row['MobileNumber'];?></td>
                        <td><?php echo $row['Email'];?></td>
                        <td><?php echo ($row['AdminStatus'] == '1') ? 'Selected' : $row['AdminStatus']; ?></td>

                        <td>
                            <a href="view-replaceIDappform.php?aticid=<?php echo $row['apid'];?>" target="_blank">View Details</a> 
							|
                            <a href="view-feesreplaceid.php?docid=<?php echo $row['apid'];?>" target="_blank">View Fees</a>
                        </td>
                    </tr>
                    <?php
                    $cnt++;
                }?>
            </table>
        </div>
    </div>
</div>
<?php include('includes/footer.php');?>
</body>
</html>
<?php } ?>
