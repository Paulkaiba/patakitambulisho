<?php
error_reporting(E_ALL);
include('dbconnection.php');
include('printAttachment.php'); // Ensure the function is included

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['docid'])) {
    $docid = intval($_POST['docid']); // Ensure it's an integer
    $filePath = printAttachment($docid);

    if ($filePath) {
        echo "Document saved at: " . $filePath;
    } else {
        echo "Error: Unable to generate document.";
    }
} else {
    echo "Invalid request.";
}
?>
