$(document).ready(function () {
    $("#approveBtn").click(function () {
        let docid = $(this).data("docid");

        $.ajax({
            url: 'includes/generate_attachment.php',
            type: 'POST',
            data: { docid: docid },
            success: function (response) {
                if (response.trim() === 'success') {
                    alert("Payment Approved & Document Generated");
                    window.location.href = 'selected-stolenIDapplication.php';
                } else {
                    alert("Error: " + response);
                }
            },
            error: function (xhr, status, error) {
                alert("AJAX Error: " + error);
            }
        });
    });
});
