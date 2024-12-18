<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']) == 0) {
  header('location:logout.php');
} else {
?>
  <!DOCTYPE html>
  <html class="loading" lang="en" data-textdirection="ltr">

  <head>
    <title>ADMIN || Patakitambulisho Management System | Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- Favicons -->
    <link rel="icon" href="../assets/images/favicon/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon/favicon-16x16.png">
  </head>

  <body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <?php include_once('includes/header.php'); ?>
    <?php include_once('includes/leftbar.php'); ?>
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <!-- Revenue, Hit Rate & Deals -->
          <div class="row">
            <div class="col-xl-4 col-lg-6 col-12">
              <div class="card pull-up">
                <div class="card-content">
                  <a href="manage-course.php">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          <?php
                          $sql = mysqli_query($con, "SELECT ID from tblservice");
                          $cntcourse = mysqli_num_rows($sql);

                          ?>
                          <h3 class="info"><?php echo $cntcourse; ?></h3>
                          <h6>List of services</h6>
                        </div>
                        <div>
                          <i class="icon-file success font-large-2 float-right"></i>
                        </div>
                      </div>
                      <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12">
              <div class="card pull-up">
                <div class="card-content">
                  <a href="user-detail.php">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          <?php
                          $wer = mysqli_query($con, "SELECT ID from tbluser");
                          $cntuser = mysqli_num_rows($wer);
                          ?>
                          <h3 class="warning"><?php echo $cntuser; ?></h3>
                          <h6>Registered Users</h6>
                        </div>
                        <div>
                          <i class="icon-user-follow success font-large-2 float-right"></i>
                        </div>
                      </div>
                      <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 100%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-12">
              <div class="card pull-up">
                <div class="card-content">
                  <a href="all-application.php">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
<?php
    // Assuming $con is already defined elsewhere in your code

    // Query to count the total rows from all three tables
    $query = "SELECT 
                (SELECT COUNT(*) FROM tbladmapplications) +
                (SELECT COUNT(*) FROM tblstolenid) +
                (SELECT COUNT(*) FROM tblreplaceid) 
              AS total";

    // Execute the query
    $result = mysqli_query($con, $query);

    // Fetch the result
    $row = mysqli_fetch_assoc($result);

    // Get the total count
    $total = $row['total'];

    // Now $total contains the total count of rows from all three tables
?>



                          <h3 class="success"><?php echo $total; ?></h3>
                          <h6>Total Applications</h6>
                        </div>
                        <div>
                          <i class="icon-user-follow success font-large-2 float-right"></i>
                        </div>
                      </div>
                      <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
		    <div class="row">

        <div class="col-xl-4 col-lg-6 col-12">
              <div class="card pull-up">
                <div class="card-content">
                
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          <?php
                          $sql = mysqli_query($con, "SELECT ID from tbladmapplications");
                          $cntcourse = mysqli_num_rows($sql);

                          ?>
                          <h3 class="info"><?php echo $cntcourse; ?></h3>
                          <h6>List of new registered citizens</h6>
                        </div>
                        <div>
                          <i class="icon-file success font-large-2 float-right"></i>
                        </div>
                      </div>
                      <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                 
                </div>
              </div>
            </div>
            
		     <div class="col-xl-4 col-lg-6 col-12">
              <div class="card pull-up">
                <div class="card-content">
                
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
<?php
    // Assuming $con is already defined elsewhere in your code

    // Query to count the total rows from tblreplaceid
    $wer = mysqli_query($con, "SELECT COUNT(*) AS total FROM tblreplaceid");
    if ($wer) {
        $row = mysqli_fetch_assoc($wer);
        $cntuser = $row['total'];
    } else {
        $cntuser = 0; // Default value if the query fails
    }
?>
<h3 class="warning"><?php echo $cntuser; ?></h3>

                          <h6>List of replaced IDs</h6>
                        </div>
                        <div>
                          <i class="icon-user-follow success font-large-2 float-right"></i>
                        </div>
                      </div>
                      <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 100%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                 
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-12">
              <div class="card pull-up">
                <div class="card-content">
                 
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
<?php
    // Assuming $con is already defined elsewhere in your code

    // Query to count the total rows from tblstolenid
    $ter = mysqli_query($con, "SELECT COUNT(*) AS total FROM tblstolenid");
    if ($ter) {
        $row = mysqli_fetch_assoc($ter);
        $cntapp = $row['total'];
    } else {
        $cntapp = 0; // Default value if the query fails
    }
?>


                          <h3 class="success"><?php echo $cntapp; ?></h3>
                          <h6>List of new IDs which where stolen </h6>
                        </div>
                        <div>
                          <i class="icon-user-follow success font-large-2 float-right"></i>
                        </div>
                      </div>
                      <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  
                </div>
              </div>
            </div>
          </div>
			   </div>
          <div class="row">
            <div class="col-xl-4 col-lg-6 col-12">
              <div class="card pull-up">
                <div class="card-content">
                 <a href="pending-application.php">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
<?php
    // Assuming $con is already defined elsewhere in your code

    // Initialize total count
    $total_count = 0;

    // Query to count the total rows from tblstolenid where AdminStatus is null
    $query_stolen = "SELECT COUNT(*) AS total FROM tblstolenid WHERE AdminStatus IS NULL";
    $result_stolen = mysqli_query($con, $query_stolen);
    $row_stolen = mysqli_fetch_assoc($result_stolen);
    $cnt_stolen = $row_stolen['total'];
    $total_count += $cnt_stolen;

    // Query to count the total rows from tblreplaceid where AdminStatus is null
    $query_replace = "SELECT COUNT(*) AS total FROM tblreplaceid WHERE AdminStatus IS NULL";
    $result_replace = mysqli_query($con, $query_replace);
    $row_replace = mysqli_fetch_assoc($result_replace);
    $cnt_replace = $row_replace['total'];
    $total_count += $cnt_replace;

    // Query to count the total rows from tbladmapplications where AdminStatus is null
    $query_adm = "SELECT COUNT(*) AS total FROM tbladmapplications WHERE AdminStatus IS NULL";
    $result_adm = mysqli_query($con, $query_adm);
    $row_adm = mysqli_fetch_assoc($result_adm);
    $cnt_adm = $row_adm['total'];
    $total_count += $cnt_adm;

    // Output the total count
    echo '<h3 class="success">' . $total_count . '</h3>';
?>

                          <h6>Pending Applications</h6>
                        </div>
                        <div>
                          <i class="icon-file success font-large-2 float-right"></i>
                        </div>
                      </div>
                      <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                 </a>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12">
              <div class="card pull-up">
                <div class="card-content">
                  
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                          <?php
    // Assuming $con is already defined elsewhere in your code

    // Initialize total count
    $total_count = 0;

    // Query to count the total rows from tbladmapplications where AdminStatus is 1
    $query_adm = "SELECT COUNT(*) AS total FROM tbladmapplications WHERE AdminStatus='1'";
    $result_adm = mysqli_query($con, $query_adm);
    $row_adm = mysqli_fetch_assoc($result_adm);
    $cnt_adm = $row_adm['total'];
    $total_count += $cnt_adm;

    // Query to count the total rows from tblreplaceid where AdminStatus is 1
    $query_replace = "SELECT COUNT(*) AS total FROM tblreplaceid WHERE AdminStatus='1'";
    $result_replace = mysqli_query($con, $query_replace);
    $row_replace = mysqli_fetch_assoc($result_replace);
    $cnt_replace = $row_replace['total'];
    $total_count += $cnt_replace;

    // Query to count the total rows from tblstolenid where AdminStatus is 1
    $query_stolen = "SELECT COUNT(*) AS total FROM tblstolenid WHERE AdminStatus='1'";
    $result_stolen = mysqli_query($con, $query_stolen);
    $row_stolen = mysqli_fetch_assoc($result_stolen);
    $cnt_stolen = $row_stolen['total'];
    $total_count += $cnt_stolen;

    // Output the total count
    echo '<h3 class="success">' . $total_count . '</h3>';
?>

                          <h6>Selected Application</h6>
                        </div>
                        <div>
                          <i class="icon-user-follow success font-large-2 float-right"></i>
                        </div>
                      </div>
                      <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 100%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12">
              <div class="card pull-up">
                <div class="card-content">
                  
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="media-body text-left">
                      
<?php
// Assuming $con is already defined elsewhere in your code

// Query to count the total rows from tblfees
$query_fees = "SELECT COUNT(*) AS total FROM tblfees";
$result_fees = mysqli_query($con, $query_fees);
$row_fees = mysqli_fetch_assoc($result_fees);
$cnt_fees = $row_fees['total'];

// Query to count the total rows from tblfeesre
$query_feesre = "SELECT COUNT(*) AS total FROM tblfeesre";
$result_feesre = mysqli_query($con, $query_feesre);
$row_feesre = mysqli_fetch_assoc($result_feesre);
$cnt_feesre = $row_feesre['total'];

// Query to count the total rows from tblfeesst
$query_feesst = "SELECT COUNT(*) AS total FROM tblfeesst";
$result_feesst = mysqli_query($con, $query_feesst);
$row_feesst = mysqli_fetch_assoc($result_feesst);
$cnt_feesst = $row_feesst['total'];

// Calculate the total count
$total_count = $cnt_fees + $cnt_feesre + $cnt_feesst;

// Output the total count
echo '<h3 class="success">' . $total_count . '</h3>';
?>


                          <h6>List of Payments</h6>
                        </div>
                        <div>
                          <i class="icon-user-follow success font-large-2 float-right"></i>
                        </div>
                      </div>
                      <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                        <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 100%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

    <?php include('includes/footer.php'); ?>
  </body>

  </html>
<?php } ?>