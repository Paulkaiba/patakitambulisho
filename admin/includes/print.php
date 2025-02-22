<script>
function CallPrint(strid) {
var prtContent = document.getElementById("exampl");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
}


function printAttachment($docid)
{
    include('includes/dbconnection.php');

    // Fetch citizen's name from database
    $query = "SELECT FullName FROM tblfeesst WHERE ID = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $docid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $citizenName = preg_replace('/[^a-zA-Z0-9]/', '_', $row['FullName']); // Sanitize filename
    } else {
        return false; // User not found
    }

    // Define file path
    $filePath = "includes/attachments/{$citizenName}.html";

    // Document content
    $content = "
    <!DOCTYPE html>
    <html>
    <head>
        <title>Payment Approval</title>
    </head>
    <body>
        <h2>Payment Approval Document</h2>
        <p>Citizen Name: {$row['FullName']}</p>
        <p>Document ID: {$docid}</p>
        <p>Status: Approved</p>
        <p>Date: " . date("Y-m-d H:i:s") . "</p>
    </body>
    </html>";

    // Save the file
    file_put_contents($filePath, $content);

    return $filePath;
}

</script>