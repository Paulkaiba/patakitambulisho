<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
    if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
$cid=$_GET['aticid'];
$admrmk=$_POST['AdminRemark'];
$admsta=$_POST['status'];
$feeamt=$_POST['feeamt'];
$toemail=$_POST['useremail'];
$query=mysqli_query($con, "UPDATE tblstolenid SET AdminRemark='$admrmk', FeeAmount='$feeamt', AdminStatus='$admsta' WHERE UserId='$cid'");
if ($query) {
$subj="Admission Application Status";       
$heade .= "MIME-Version: 1.0"."\r\n";
$heade .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
$heade .= 'From:CAMS<noreply@yourdomain.com>'."\r\n";    // Put your sender email here
$msgec.="<html></body><div><div>Hello,</div></br></br>";
$msgec.="<div style='padding-top:8px;'>Your Admission application has been $$admsta ) </br>
<strong>Admin Remark: </strong> $admrmk </div><div></div></body></html>";
mail($toemail,$subj,$msgec,$heade);
echo "<script>alert('Admin Remark and  Status has been updated.');</script>";
echo "<script>window.location.href ='pending-stolenIDapplication.php'</script>";

}else{
   echo "<script>alert('Something Went Wrong. Please try again.');</script>";
   echo "<script>window.location.href ='pending-replaceIDapplication.php'</script>";
    }

  
}
  

  ?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>

  <title>Pata Kitambulisho Management System|| View Form</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
  rel="stylesheet">
  <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
  rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
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
           View Replace ID Application Form
          </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                </li>
            
                </li>
                <li class="breadcrumb-item active">Application Form
                </li>
                
              </ol>
            </div>
          </div>
        </div>
   
      </div>
      <div class="content-body">
        <!-- Input Mask start -->
   
        <!-- Formatter start -->
 <div  id="exampl">  
<?php
$cid=$_GET['aticid'];
$userid = isset($_GET['userid']) ? intval($_GET['userid']) : 0;
$ret = mysqli_query($con, "SELECT tblstolenid.*, tbluser.FirstName, tbluser.LastName, tbluser.MobileNumber, tbluser.Email FROM tblstolenid INNER JOIN tbluser ON tbluser.ID = tblstolenid.UserId WHERE tblstolenid.UserId = '$cid' OR tblstolenid.UserId = '$userid'");
$cnt=1;
$count=mysqli_num_rows($ret);
if($count==0){ ?>
<p style="color:red">Not applied Yet </p>
<?php } else {
while ($row=mysqli_fetch_array($ret)) {
?>




<table border="1" width="100%" class="table table-bordered mg-b-0">
    <tr>
        <th>Citizen's Name</th>
        <td><?php echo isset($row['FirstName']) && isset($row['LastName']) ? $row['FirstName'] . " " . $row['LastName'] : ''; ?></td>
        <th>Reg Date</th>
        <td><?php echo isset($row['CourseApplieddate']) ? $row['CourseApplieddate'] : ''; ?></td>
    </tr>
    <tr>
        <th>Citizen's Mob Number</th>
        <td><?php echo isset($row['MobileNumber']) ? $row['MobileNumber'] : ''; ?></td>
        <th>Citizen's Email</th>
        <td><?php echo isset($row['Email']) ? $row['Email'] : ''; ?></td>
    </tr>
    <tr>
        <th>Citizen's Pic</th>
       <td><img src="../user/userimages/<?php echo $row['userpic'];?>" width="200" height="150"></td>

        <th>Citizen's DOB</th>
        <td><?php echo isset($row['dob']) ? $row['dob'] : ''; ?></td>
    </tr>
    <tr>
        <th>Citizen's Gender</th>
        <td><?php echo isset($row['Gender']) ? $row['Gender'] : ''; ?></td>
        <th>Father Name</th>
        <td><?php echo isset($row['fathername']) ? $row['fathername'] : ''; ?></td>
    </tr>
    <tr>
        <th>Mother Name</th>
        <td><?php echo isset($row['mothername']) ? $row['mothername'] : ''; ?></td>
        <th>Citizen's Marital Status</th>
        <td><?php echo isset($row['maritalstatus']) ? $row['maritalstatus'] : ''; ?></td>
    </tr>
    <tr>
        <th>Citizen's Partner's Name</th>
        <td><?php echo isset($row['partnername']) ? $row['partnername'] : ''; ?></td>
        <th>Citizen's Partner's ID Number</th>
        <td><?php echo isset($row['partnerid']) ? $row['partnerid'] : ''; ?></td>
    </tr>
    <tr>
        <th>Citizen's District of Birth</th>
        <td><?php echo isset($row['districtofbirth']) ? $row['districtofbirth'] : ''; ?></td>
        <th>Citizen's Tribe</th>
        <td><?php echo isset($row['tribe']) ? $row['tribe'] : ''; ?></td>
    </tr>
    <tr>
        <th>Citizen's Clan</th>
        <td><?php echo isset($row['clan']) ? $row['clan'] : ''; ?></td>
        <th>Citizen's Family</th>
        <td><?php echo isset($row['family']) ? $row['family'] : ''; ?></td>
    </tr>
    <tr>
        <th>Citizen's Home District</th>
        <td><?php echo isset($row['homedistrict']) ? $row['homedistrict'] : ''; ?></td>
        <th>Citizen's Constituency</th>
        <td><?php echo isset($row['constituency']) ? $row['constituency'] : ''; ?></td>
    </tr>
    <tr>
        <th>Citizen's Location</th>
        <td><?php echo isset($row['location']) ? $row['location'] : ''; ?></td>
        <th>Citizen's Sublocation</th>
        <td><?php echo isset($row['sublocation']) ? $row['sublocation'] : ''; ?></td>
    </tr>
    <tr>
        <th>Citizen's Occupation</th>
        <td><?php echo isset($row['occupation']) ? $row['occupation'] : ''; ?></td>
    </tr>
</table>

<table border="1" width="100%" class="table table-bordered mg-b-0">
    <tr>
        <th>Police Abstract</th>
        <td><img src="../user/userimages/<?php echo isset($row['UploadAbstract']) ? $row['UploadAbstract'] : ''; ?>" width="200" height="150"></td>
    </tr>
      
</table>
 
<table class="table mb-0" border="1" width="100%">

<?php if($row['AdminRemark']==""){ ?>


<form name="submit" method="post" enctype="multipart/form-data"> 
<input type="hidden" name="useremail" value="<?php  echo $row['Email'];?>">
  <tr>
    <th>Application Status :</th>
    <td>
   <select name="status" id="status"  class="form-control wd-450" required="true" >
    <option value="">Select Option</option>
     <option value="1">Selected</option>
     <option value="2">Rejected</option>
   </select></td>
  </tr>

<tr>
    <th>Admin Remark :</th>
    <td>
    <textarea name="AdminRemark" placeholder="" rows="6" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr>
<tr id="fee">
    <th>Fee Amount :</th>
    <td>
    <input name="feeamt" id="feeamt" placeholder="" class="form-control wd-450"></td>
  </tr>


  <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn-primary">Update</button></td>
  </tr>
  </form>
<?php } else { ?>

<tr>
    <th>Admin Remark</th>
    <td><?php echo $row['AdminRemark']; ?></td>
  </tr>
<tr>
    <th>Fee Amount</th>
    <td><?php echo $row['FeeAmount']; ?></td>
  </tr>

<tr>
<th>Admin Remark date</th>
<td><?php echo $row['AdminRemarkDate']; ?>  </td>

<tr>
    <th>Application Status</th>
    <td><?php  
if($row['AdminStatus']=="1")
{
  echo "Selected";
}

if($row['AdminStatus']=="2")
{
  echo "Rejected";
}

     ;?></td>
  </tr>

  </tr>

  <?php } ?>
 




</table>

<?php }}?>

      </div>
  <div style="float:right;">
  <button class="btn btn-primary" style="cursor: pointer;"  OnClick="CallPrint(this.value)" >Print</button></div>      


            





<div class="row" style="margin-top: 2%">
<div class="col-xl-6 col-lg-12">
</div>
</div>



 </div>
                </div>
              </div>
            
     

<?php include('includes/footer.php');?>
  <!-- BEGIN VENDOR JS-->
 
       <script>
function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
}

</script>
<script type="text/javascript">

  //For report file
  $('#fee').hide();
  $(document).ready(function(){
  $('#status').change(function(){
  if($('#status').val()=='1')
  {
  $('#fee').show();
  jQuery("#feeamt").prop('required',true);  
  }
  else{
  $('#fee').hide();
  }
})}) 
</script>
</body>
</html>
<?php  } ?>
