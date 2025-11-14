<?php 
session_start();
error_reporting(E_ALL);
include('dbconnection.php');

echo "Debug: Session docid - " . ($_SESSION['docid'] ?? 'Not set') . "<br>";
echo "Debug: POST docid - " . ($_POST['docid'] ?? 'Not set') . "<br>";

// Determine the correct docid (prefer POST, fallback to SESSION)
$docid = (int) ($_POST['docid'] ?? $_SESSION['docid'] ?? 0);

if ($docid <= 0) {
    die(" Error: Missing or invalid document ID. Final value: " . var_export($docid, true));
}

echo "✅ Debug: Final docid - $docid <br>";

// Now continue with processing...
include('printAttachment.php'); // Ensure this file exists and is correctly included

$filePath = printAttachment($docid);

if ($filePath) {
    echo "<p>Document saved at: " . htmlspecialchars($filePath) . "</p>";
} else {
    echo "<p>Error: Unable to generate document.</p>";
}
?>
