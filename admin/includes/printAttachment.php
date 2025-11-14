<?php
session_start(); // Ensure session is started
include('../includes/dbconnection.php'); // Database connection
include('C:/Apache24/htdocs/patakitambulisho/PHPMailer/mailer_demo.php'); // Mailer

// Check if UserID is provided
if (!isset($_POST['userid']) || empty($_POST['userid']) || !is_numeric($_POST['userid'])) {
    echo "error: Missing or invalid UserID";
    exit();
}

$userid = $_POST['userid'];

// Simulate document generation delay
sleep(2); 

function printAttachment($userid) {
    global $con;

    // Fetch payment details
    $query = "SELECT PaymentAmount, ModeofPayments, TransactionNumber, DateofTransaction FROM tblfeesst WHERE UserID = ?";
    $stmt = mysqli_prepare($con, $query);
    
    if (!$stmt) {
        return "❌ Error preparing payment query: " . mysqli_error($con);
    }

    mysqli_stmt_bind_param($stmt, "i", $userid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result || mysqli_num_rows($result) === 0) {
        return "❌ No payment record found for UserID $userid.";
    }

    $row = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);

    // Assign payment details
    $paymentAmount = $row['PaymentAmount'];
    $modeOfPayment = $row['ModeofPayments'];
    $transactionNumber = $row['TransactionNumber'];
    $dateOfTransaction = $row['DateofTransaction'];

    // Fetch user details
    $queryUser = "SELECT FirstName, LastName, Email FROM tbluser WHERE ID = ?";
    $stmtUser = mysqli_prepare($con, $queryUser);

    if (!$stmtUser) {
        return "❌ Error preparing user query: " . mysqli_error($con);
    }

    mysqli_stmt_bind_param($stmtUser, "i", $userid);
    mysqli_stmt_execute($stmtUser);
    $resultUser = mysqli_stmt_get_result($stmtUser);

    if (!$resultUser || mysqli_num_rows($resultUser) === 0) {
        return "❌ No user record found for UserID $userid.";
    }

    $userRow = mysqli_fetch_assoc($resultUser);
    mysqli_stmt_close($stmtUser);

    // Assign user details
    $firstName = $userRow['FirstName'];
    $lastName = $userRow['LastName'];
    $email = $userRow['Email'];
    $citizenName = preg_replace('/[^a-zA-Z0-9]/', '_', "{$firstName}_{$lastName}");

    // Define file path
    $filePath = __DIR__ . "/../documents/{$citizenName}.txt";

    // Document content
    $content = "
    Pata Kitambulisho Management System

    Payment Details
    ----------------------------------
    Citizen Name: {$firstName} {$lastName}
    Payment Amount: {$paymentAmount}
    Mode of Payment: {$modeOfPayment}
    Transaction Number: {$transactionNumber}
    Date of Transaction: {$dateOfTransaction}
    ";

    // Save the file
    if (file_put_contents($filePath, $content) !== false) {
        // ✅ Send email notification
        $subject = "Your Payment Receipt";
        $body = "<p>Dear {$firstName} {$lastName},</p><p>Please find attached your payment receipt.</p>";

        if (sendMailWithAttachment($email, $subject, $body, $filePath)) {
            // ✅ Update the database after successful email
            $update_query = "UPDATE tblfeesst SET approval = 'Approved' WHERE UserID = ?";
            $stmtUpdate = mysqli_prepare($con, $update_query);

            if ($stmtUpdate) {
                mysqli_stmt_bind_param($stmtUpdate, "i", $userid);
                if (mysqli_stmt_execute($stmtUpdate)) {
                    mysqli_stmt_close($stmtUpdate);
                    return "1"; // Success response (file saved, email sent, and database updated)
                } else {
                    return "❌ Error updating approval: " . mysqli_error($con);
                }
            } else {
                return "❌ Error preparing approval update query: " . mysqli_error($con);
            }
        } else {
            return "2"; // Failure response (email not sent)
        }
    } else {
        return "error"; // Failure response (file not created)
    }
}

// Execute function and return response
echo printAttachment($userid);
exit();
?>
