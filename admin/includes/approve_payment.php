<?php
session_start();
include('../includes/dbconnection.php');

if (!isset($_POST['userid']) || empty($_POST['userid'])) {
    echo "error: Missing UserID";
    exit();
}

$userid = mysqli_real_escape_string($con, $_POST['userid']);

$update_query = "UPDATE tblfeesst SET approval = 'Approved' WHERE UserID = '$userid'";
if (mysqli_query($con, $update_query)) {
    echo "success";
} else {
    echo "error: " . mysqli_error($con);
}
exit();
?>
