<?php
header("Content-Type: application/json");

$con = mysqli_connect("localhost", "root", "newpassword", "patakitambulisho");

if (mysqli_connect_errno()) {
    echo json_encode([
        "success" => false,
        "message" => "Database connection failed: " . mysqli_connect_error()
    ]);
    exit();
}
?>
