<?php
header('Content-Type: application/json');
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('includes/dbconnection.php');
include('2F/otp_generator.php');
include('../PHPMailer/mailer_demo.php'); // Adjust path if needed

$response = array();

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method. Use POST.'
    ]);
    exit();
}

// Get the raw POST data
$input = json_decode(file_get_contents('php://input'), true);

$fname = trim($input['firstName'] ?? '');
$lname = trim($input['lastName'] ?? '');
$contno = trim($input['contactNumber'] ?? '');
$email = trim($input['email'] ?? '');
$password = trim($input['password'] ?? '');

// Validate required fields
if (empty($fname) || empty($lname) || empty($contno) || empty($email) || empty($password)) {
    echo json_encode([
        'success' => false,
        'message' => 'All fields are required.'
    ]);
    exit();
}

// Hash password with MD5 (like your website)
$hashedPassword = md5($password);

// Check if email or contact already exists
$query = "SELECT Email FROM tbluser WHERE Email=? OR MobileNumber=?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "ss", $email, $contno);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    echo json_encode([
        'success' => false,
        'message' => 'Email or contact number already exists.'
    ]);
    exit();
}

// Insert user into database
$insertQuery = "INSERT INTO tbluser (FirstName, LastName, MobileNumber, Email, Password) VALUES (?, ?, ?, ?, ?)";
$insertStmt = mysqli_prepare($con, $insertQuery);
mysqli_stmt_bind_param($insertStmt, "sssss", $fname, $lname, $contno, $email, $hashedPassword);

// After successful insert of user
if (mysqli_stmt_execute($insertStmt)) {
    // Generate OTP
    $otp = generateOTP();
    $expiry = date('Y-m-d H:i:s', strtotime('+10 minutes')); // 10 min validity

    // Save OTP in otp_verification table
    $safeEmail = mysqli_real_escape_string($con, $email);
    mysqli_query($con, "DELETE FROM otp_verification WHERE email='$safeEmail'");
    $insertOtpSql = "INSERT INTO otp_verification (email, otp, expiry) VALUES ('$safeEmail', '".mysqli_real_escape_string($con,$otp)."', '$expiry')";
    mysqli_query($con, $insertOtpSql);

    // Send OTP via email
    $subject = "Your OTP for PKMS Registration";
    $body = "<p>Dear $fname,</p>
             <p>Your One-Time Password (OTP) for completing the registration process is <strong>$otp</strong>.</p>
             <p>This OTP is valid for 10 minutes.</p>
             <p>Thank you,<br>PKMS Team</p>";

    if (sendMail($email, $subject, $body)) {
        echo json_encode([
            'success' => true,
            'message' => 'Registration successful. OTP sent to your email.'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Registration successful but failed to send OTP.'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Failed to register user. Please try again.'
    ]);
}


mysqli_stmt_close($stmt);
mysqli_stmt_close($insertStmt);
mysqli_close($con);
?>
