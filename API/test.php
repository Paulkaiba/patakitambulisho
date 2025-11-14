<?php
header('Content-Type: application/json');

$url = "http://localhost/patakitambulisho/API/reset-password.php";

$data = [
    'email' => 'orangecrucsh@gmail.com',
    'new_password' => 'newpass123',
    'confirm_password' => 'newpass123'
];

$options = [
    'http' => [
        'header'  => "Content-Type: application/json\r\n",
        'method'  => 'POST',
        'content' => json_encode($data)
    ]
];

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
echo $result ?: json_encode(['success' => false, 'message' => 'Request failed.']);
?>
