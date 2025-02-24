<?php


<script>
function approvePayment(docid) {
    let formData = new FormData();
    formData.append('docid', docid);

    fetch('includes/generate_attachment.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => alert(data)) // Show success message
    .catch(error => console.error('Error:', error));
}
</script>
?>