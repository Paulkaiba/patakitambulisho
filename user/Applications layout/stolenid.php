<?php

function scriptheader(){
   echo '<head>
    <title>Pata Kitambulisho Management System || Replace ID Application Form</title>
    <!-- CSS -->
    <style>
        /* Add CSS styles here */
        .errorWrap {
            padding: 10px;
            margin: 20px 0 0px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }
    </style>
</head>';
}
function scriptmwisho(){
    echo '<script src="assets/app-assets/vendors/js/vendors.min.js"></script>
    <script src="assets/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js"></script>
    <script src="assets/app-assets/js/core/app-menu.min.js"></script>
    <script src="assets/app-assets/js/core/app.min.js"></script>
    <script src="assets/app-assets/js/scripts/customizer.min.js"></script>';
}
echo '<script>
        function showSubmissionMessage() {
            alert("Form submitted successfully!");
        }

        function showHidePartnerFields(select) {
            var selectedOption = select.value;
            var partnerFields = document.getElementById("partnerFields");
            if (selectedOption === "Married") {
                partnerFields.style.display = "block";
            } else {
                partnerFields.style.display = "none";
            }
        }
    </script>';
?>