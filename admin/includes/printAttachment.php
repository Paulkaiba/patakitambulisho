<?php
function printAttachment($docid) {
    // Example: Generate a document path (Modify as needed)
    $filePath = "documents/document_$docid.pdf";  
    
    // Simulating document generation (Replace with actual logic)
    file_put_contents($filePath, "Generated document for DocID: $docid");

    return $filePath;
}
?>
