<?php
function printAttachment($docid) {
    // Example: Generate a document path (Modify as needed)
    $filePath = __DIR__ . '/../documents/document_3.pdf'; 
    file_put_contents($filePath, $pdfContent);
    
    
    // Simulating document generation (Replace with actual logic)
    file_put_contents($filePath, "Generated document for DocID: $docid");

    return $filePath;
}
?>
