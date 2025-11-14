<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
session_start(); // not required for DB flow but harmless

// Adjust these include paths if your structure differs:
include('includes/dbconnection.php'); // must set $con
include('2F/otp_generator.php');      // must define generateOTP()
include('../PHPMailer/mailer_demo.php'); // must define sendMail($to,$subject,$body)
date_default_timezone_set('Africa/Nairobi');


$response = ['success' => false, 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method. Use POST.']);
    exit;
}

// Accept both form-urlencoded and JSON bodies:
$input = $_POST;
if (empty($input)) {
    $raw = file_get_contents('php://input');
    $json = json_decode($raw, true);
    if (is_array($json)) $input = $json;
}

$email = trim($input['email'] ?? '');
$mobilenumber = trim($input['mobilenumber'] ?? '');

if ($email === '' || $mobilenumber === '') {
    echo json_encode(['success'=>false, 'message'=>'Email and Mobile Number are required.']);
    exit;
}

// Verify user exists
$q = mysqli_query($con, "SELECT ID, FirstName FROM tbluser WHERE Email='".mysqli_real_escape_string($con,$email)."' AND MobileNumber='".mysqli_real_escape_string($con,$mobilenumber)."'");
$user = mysqli_fetch_assoc($q);
if (!$user) {
    echo json_encode(['success'=>false, 'message'=>'Invalid details. No matching user found.']);
    exit;
}

// Generate OTP and expiry
$otp = generateOTP(); // e.g. "123456"
$expiry = date('Y-m-d H:i:s', strtotime('+10 minutes'));

// Store in otp_verification table (delete existing then insert)
$safeEmail = mysqli_real_escape_string($con, $email);
mysqli_query($con, "DELETE FROM otp_verification WHERE email='$safeEmail'");
$insertSql = "INSERT INTO otp_verification (email, otp, expiry) VALUES ('$safeEmail', '".mysqli_real_escape_string($con,$otp)."', '$expiry')";
$ok = mysqli_query($con, $insertSql);

if (!$ok) {
    echo json_encode(['success'=>false, 'message'=>'Failed to generate OTP.']);
    exit;
}

// Send email
$fname = $user['FirstName'] ?? '';
$subject = "Your OTP for PKMS Password Reset";
$body = "<p>Dear ".htmlspecialchars($fname).",</p>
         <p>Your One-Time Password (OTP) for password reset is <strong>$otp</strong>.</p>
         <p>This code expires in 10 minutes.</p>
         <p>PKMS Team</p>";

if (!function_exists('sendMail')) {
    // If mailer_demo uses different function, adjust above include
    // For now, try mail() fallback (not recommended for production).
    $mailOk = mail($email, $subject, strip_tags($body));
} else {
    $mailOk = sendMail($email, $subject, $body);
}

if ($mailOk) {
    // Useful for testing only: you may remove 'otp' from response in production
    echo json_encode([
        'success' => true,
        'message' => 'OTP sent successfully to your email.',
        'email' => $email
        // 'otp' => $otp   // DON'T return in production; ok for local testing
    ]);
} else {
    echo json_encode(['success'=>false, 'message'=>'Failed to send OTP email.']);
}
?>
