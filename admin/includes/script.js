function approvePayment(docid) {
    console.log("Sending docid:", docid); // Debugging log

    let formData = new FormData();
    formData.append('docid', docid);

    fetch('generate_attachment.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        console.log("Response received:", response);
        return response.text();
    })
    .then(data => {
        console.log("Server response:", data);
        alert(data);
    })
    .catch(error => console.error('Error:', error));
}
