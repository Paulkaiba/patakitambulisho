<?php
include('dbconnection.php'); // Ensure database connection is included
include('C:/Apache24/htdocs/patakitambulisho/PHPMailer/mailer_demo.php'); // Include mailer functions

function printAttachment($docid) {
    global $con; // Use the existing database connection

    // Fetch payment details from the database
    $query = "SELECT PaymentAmount, ModeofPayments, TransactionNumber, DateofTransaction FROM tblfeesst WHERE ID = ?";
    $stmt = mysqli_prepare($con, $query);
    
    if (!$stmt) {
        die("Error preparing payment query: " . mysqli_error($con));
    }

    mysqli_stmt_bind_param($stmt, "i", $docid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result || mysqli_num_rows($result) === 0) {
        die("Error: No payment record found for ID $docid.");
    }

    $row = mysqli_fetch_assoc($result);
    $paymentAmount = $row['PaymentAmount'];
    $modeOfPayment = $row['ModeofPayments'];
    $transactionNumber = $row['TransactionNumber'];
    $dateOfTransaction = $row['DateofTransaction'];

    // Fetch user details (first name, last name, email)
    $queryUser = "SELECT FirstName, LastName, Email FROM tbluser WHERE ID = ?";
    $stmtUser = mysqli_prepare($con, $queryUser);

    if (!$stmtUser) {
        die("Error preparing user query: " . mysqli_error($con));
    }

    mysqli_stmt_bind_param($stmtUser, "i", $docid);
    mysqli_stmt_execute($stmtUser);
    $resultUser = mysqli_stmt_get_result($stmtUser);

    if (!$resultUser || mysqli_num_rows($resultUser) === 0) {
        die("Error: No user record found for ID $docid.");
    }

    $userRow = mysqli_fetch_assoc($resultUser);
    $firstName = $userRow['FirstName'];
    $lastName = $userRow['LastName'];
    $email = $userRow['Email']; // User's email for sending the receipt
    $citizenName = preg_replace('/[^a-zA-Z0-9]/', '_', "{$firstName}_{$lastName}"); // Sanitize filename

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

    // Save the file and check if it's written successfully
    if (file_put_contents($filePath, $content) !== false) {
        // ✅ Call the sendMailWithAttachment function to email the document
        $subject = "Your Payment Receipt";
        $body = "<p>Dear {$firstName} {$lastName},</p><p>Please find attached your payment receipt.</p>";

        if (sendMailWithAttachment($email, $subject, $body, $filePath)) {
            return "✅ Email with attachment sent successfully!";
        } else {
            return "❌ Failed to send email with attachment.";
        }
    } else {
        die("Error: Unable to generate document.");
    }
}

if (isset($_GET['docid']) && is_numeric($_GET['docid'])) {
    $docId = $_GET['docid'];
    echo printAttachment($docId);
} else {
    die("Error: Missing or invalid document ID.");
}

?>
