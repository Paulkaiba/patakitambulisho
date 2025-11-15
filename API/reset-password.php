<?php
// --------------------------------------
// Reset Password API (MD5 + MySQLi)
// --------------------------------------

// Show all errors for debugging (remove in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Allow CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

// Include database connection
include(__DIR__ . '/includes/dbconnection.php');

// Read JSON input
$input = json_decode(file_get_contents('php://input'), true);

// Extract fields
$email = trim($input['email'] ?? '');
$new_password = trim($input['new_password'] ?? '');
$confirm_password = trim($input['confirm_password'] ?? '');

// Validate input
if (empty($email) || empty($new_password) || empty($confirm_password)) {
    echo json_encode([
        'success' => false,
        'message' => 'Email, new password, and confirm password are required.'
    ]);
    exit;
}

if ($new_password !== $confirm_password) {
    echo json_encode([
        'success' => false,
        'message' => 'Passwords do not match.'
    ]);
    exit;
}

try {
    // Hash password with MD5
    $hashed_password = md5($new_password);

    // Build SQL query
    if (!empty($mobile_number)) {
        $sql = "UPDATE tbluser SET Password='$hashed_password' WHERE Email='$email' AND MobileNumber='$mobile_number'";
    } else {
        $sql = "UPDATE tbluser SET Password='$hashed_password' WHERE Email='$email'";
    }

    $result = mysqli_query($con, $sql);

    if ($result && mysqli_affected_rows($con) > 0) {
        // Optional: delete OTP entry if exists
        if (!empty($email)) {
            $deleteOtpSql = "DELETE FROM otp_verification WHERE email='$email'";
            mysqli_query($con, $deleteOtpSql);
        }

        echo json_encode([
            'success' => true,
            'message' => 'Password reset successful. You can now log in with your new password.'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Password reset failed. Email (or mobile) not found or no changes made.'
        ]);
    }

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Server error: ' . $e->getMessage()
    ]);
    exit;
}

?>
