<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{
  
  if(isset($_POST['docid'])){
    $docid = $_POST['docid'];
    // Update tblfees to set approval as 'Approved' for the given docid
    $query = "UPDATE tblfees SET approval = 'Approved' WHERE ID = '$docid'";
    $result = mysqli_query($con, $query);
    if ($result) {
      echo "success";
      exit(); // Exit to avoid further execution
    } else {
      echo "error";
      exit(); // Exit to avoid further execution
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
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>

</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<?php include('includes/header.php');?>
<?php include('includes/leftbar.php');?>
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">
           Admission Fees
          </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                </li>
            
                </li>
                <li class="breadcrumb-item active">Admission Fees
                </li>
                
              </ol>
            </div>
          </div>
        </div>
   
      </div>
      <div class="content-body">
        <!-- Input Mask start -->
   
        <!-- Formatter start -->
<?php 
$stufid=$_GET['docid'];
if($stufid=="")
{ ?>
  <p style="font-size:16px; color:red" align="center">Citizen not submitted fees yet. </p>

<?php  } else { 

$query=mysqli_query($con,"select * from tblfees where  ID=$stufid");
$rw=mysqli_num_rows($query);
if($rw>0)
{
while($row=mysqli_fetch_array($query)){
?>


<table class="table mb-0">
<tr>
  <th>Payment Amount</th>
  <td><?php echo $row['PaymentAmount'];?></td>
</tr>
<tr>
  <th>Mode of Payment</th>
  <td><?php echo $row['ModeofPayments'];?></td>
</tr>
<tr>
  <th>Transaction Number</th>
  <td><?php echo $row['TransactionNumber'];?></td>
</tr>
<tr>
  <th>Date of Transaction</th>
  <td><?php echo $row['DateofTransaction'];?></td>
</tr>
</table>
<!-- Add Approve button -->
<button id="btn-approve">Approve Payment</button>
<?php } } }  ?>

<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // AJAX request to approve payment
    $("#btn-approve").click(function() {
      $.ajax({
        url: '',
        type: 'POST',
        data: {docid: <?php echo $stufid; ?>}, // Pass the docid to approve_payment.php
        success: function(response) {
          if(response == 'success') {
            // Display success message
            alert("Payment Approved");
            // Redirect to selected-application.php after the alert
            window.location.href = 'selected-application.php';
          } else {
            // Display error message
            alert("Error approving payment");
          }
        }
      });
    });
  });
</script>
 
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
<?php include('includes/footer.php');?>
  <!-- BEGIN VENDOR JS-->
 

</body>
</html>
<?php  } ?>
