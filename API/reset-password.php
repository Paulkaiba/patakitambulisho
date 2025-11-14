<?php
header('Content-Type: application/json');
require_once __DIR__ . '/includes/dbconnection.php';

$response = array();

// ✅ Only accept POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
    exit;
}

// ✅ Read JSON input
$input = json_decode(file_get_contents('php://input'), true);
$email = trim($input['email'] ?? '');
$new_password = trim($input['new_password'] ?? '');
$confirm_password = trim($input['confirm_password'] ?? '');

// ✅ Validate input
if (empty($email) || empty($new_password) || empty($confirm_password)) {
    echo json_encode(['success' => false, 'message' => 'Email, new password, and confirm password are required.']);
    exit;
}

// ✅ Check if new and confirm passwords match
if ($new_password !== $confirm_password) {
    echo json_encode(['success' => false, 'message' => 'Passwords do not match. Please try again.']);
    exit;
}

try {
    // ✅ Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

    // ✅ Update password
    $sql = "UPDATE users SET password = :password WHERE email = :email";
    $query = $dbh->prepare($sql);
    $query->bindParam(':password', $hashed_password, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();

    if ($query->rowCount() > 0) {
        // Optional: delete OTP entry after successful reset
        $delete_otp = $dbh->prepare("DELETE FROM otp_table WHERE email = :email");
        $delete_otp->bindParam(':email', $email, PDO::PARAM_STR);
        $delete_otp->execute();

        echo json_encode([
            'success' => true,
            'message' => 'Password reset successful. You can now log in with your new password.'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Password reset failed. Email not found or no changes made.'
        ]);
    }

} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $e->getMessage()]);
}
?>
