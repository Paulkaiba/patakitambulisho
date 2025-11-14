<?php
header('Content-Type: application/json');
error_reporting(E_ALL);

// includes
include(__DIR__ . '/includes/dbconnection.php');
date_default_timezone_set('Africa/Nairobi');


$response = ['success'=>false, 'message'=>''];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success'=>false, 'message'=>'Invalid request method. Use POST.']);
    exit;
}

// Accept form or JSON
$input = $_POST;
if (empty($input)) {
    $raw = file_get_contents('php://input');
    $json = json_decode($raw, true);
    if (is_array($json)) $input = $json;
}

$email = trim($input['email'] ?? '');
$otp = trim($input['otp'] ?? '');

if ($email === '' || $otp === '') {
    echo json_encode(['success'=>false, 'message'=>'Email and OTP are required.']);
    exit;
}

// Lookup OTP in DB
$safeEmail = mysqli_real_escape_string($con, $email);
$safeOtp   = mysqli_real_escape_string($con, $otp);

$sql = "SELECT id, otp, expiry FROM otp_verification WHERE email='$safeEmail' AND otp='$safeOtp' AND expiry > NOW() LIMIT 1";
$res = mysqli_query($con, $sql);

if ($res && mysqli_num_rows($res) > 0) {
    // valid; remove the OTP record so it can't be reused
    mysqli_query($con, "DELETE FROM otp_verification WHERE email='$safeEmail'");
    echo json_encode(['success'=>true, 'message'=>'OTP verification successful. Proceed to reset password.']);
} else {
    echo json_encode(['success'=>false, 'message'=>'Invalid or expired OTP.']);
}
?>
