<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

include('includes/dbconnection.php');

// Read POST fields
$emailcont = $_POST['emailcont'] ?? $_GET['emailcont'] ?? '';
$password  = $_POST['password'] ?? $_GET['password'] ?? '';


if ($emailcont == '' || $password == '') {
    echo json_encode([
        "success" => false,
        "message" => "Missing email/phone or password"
    ]);
    exit;
}

// Hash password like your system
$password = md5($password);

// Query database
$query = mysqli_query($con, 
    "SELECT ID FROM tbluser 
     WHERE (Email='$emailcont' OR MobileNumber='$emailcont')
     AND Password='$password'"
);

if (!$query) {
    echo json_encode([
        "success" => false,
        "message" => "Database error: " . mysqli_error($con)
    ]);
    exit;
}

$ret = mysqli_fetch_array($query);

if ($ret) {
    echo json_encode([
        "success" => true,
        "message" => "Login successful",
        "user_id" => $ret['ID']
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Invalid email/phone or password"
    ]);
}
?>
