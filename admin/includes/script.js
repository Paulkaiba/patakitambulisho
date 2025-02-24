document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("approveForm");
    const approveBtn = document.getElementById("approveBtn");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission

        let docid = document.getElementById("docidInput").value;
        approveBtn.disabled = true; // Disable button to prevent multiple clicks

        let formData = new FormData();
        formData.append('docid', docid);

        fetch('includes/generate_attachment.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log("Server Response:", data);
            alert(data); // Show success message
            approveBtn.disabled = false; // Re-enable button
        })
        .catch(error => {
            console.error('Fetch Error:', error);
            alert("An error occurred. Please try again.");
            approveBtn.disabled = false;
        });
    });
});
