<?php
// fetch_notifications.php

include('includes/dbconnection.php');

$notifications = array();

// Check for new rows in tbladmapplications
$query = "SELECT * FROM tbladmapplications ORDER BY ID DESC LIMIT 1"; 
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $applicantName = $row['fullname'];
    $notification = array(
        'name' => $applicantName,
        'link' => 'view-appform.php' // Assuming this is the link to view the application form
    );
    $notifications[] = $notification;
}

// Check for new rows in tblreplaceid
$query = "SELECT * FROM tblreplaceid ORDER BY UserId DESC LIMIT 1"; // Assuming the most recent replacement ID is the newest
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $applicantName = $row['fullname'];
    $notification = array(
        'name' => $applicantName,
        'link' => 'view-feesreplaceid.php' // Assuming this is the link to view the application form for replacement ID
    );
    $notifications[] = $notification;
}

// Check for new rows in tblstolenid
$query = "SELECT * FROM tblstolenid ORDER BY UserId DESC LIMIT 1"; // Assuming the most recent stolen ID is the newest
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $applicantName = $row['fullname'];
    $notification = array(
        'name' => $applicantName,
        'link' => 'view-feesstolenid.php' // Assuming this is the link to view the application form for stolen ID
    );
    $notifications[] = $notification;
}

// Function to fetch notifications for fee payments
function fetchFeePaymentNotifications($table, $notificationName, $paymentType) {
    global $con, $notifications;
    
    $query = "SELECT $table.*, tbluser.FirstName FROM $table
              INNER JOIN tbluser ON $table.UserID = tbluser.ID
              ORDER BY $table.ID DESC LIMIT 1";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $firstName = $row['FirstName'];
        $submissionDate = $row['SubmissionDate'];
        $notification = array(
            'name' => $firstName,
            'message' => "New $paymentType payment made on $submissionDate",
            'link' => "view-$table.php?userID=" . $row['UserID'] // Assuming this is the link to view fee details
        );
        $notifications[] = $notification;
    }
}
// Check for new rows in tblfees
fetchFeePaymentNotifications('tblfees', 'New ID payment', 'ID');

// Check for new rows in tblfeesre
fetchFeePaymentNotifications('tblfeesre', 'Replaced ID payment', 'Replacement ID');

// Check for new rows in tblfeesst
fetchFeePaymentNotifications('tblfeesst', 'Stolen ID payment', 'Stolen ID');


echo json_encode($notifications);
?>
