<?php
include('dbconnection.php');
include('path/to/printAttachment.php'); // Ensure the function is included

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['docid'])) {
    $docid = $_POST['docid'];
    $filePath = printAttachment($docid);

    if ($filePath) {
        echo "Document saved at: " . $filePath;
    } else {
        echo "Error generating document.";
    }
} else {
    echo "Invalid request.";
}
?>
