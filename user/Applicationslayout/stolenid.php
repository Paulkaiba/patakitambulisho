<?php

function scriptheader() {
    echo <<<EOT
    <head>
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
    </head>
    EOT;
}

function scriptmwisho() {
    echo <<<EOT
    <script src="assets/app-assets/vendors/js/vendors.min.js"></script>
    <script src="assets/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js"></script>
    <script src="assets/app-assets/js/core/app-menu.min.js"></script>
    <script src="assets/app-assets/js/core/app.min.js"></script>
    <script src="assets/app-assets/js/scripts/customizer.min.js"></script>
    EOT;
}

function scriptJS() {
    echo <<<EOT
    <script>
        function showHidePartnerFields(select) {
            var partnerFields = document.getElementById("partnerFields");
            partnerFields.style.display = (select.value === "Married") ? "block" : "none";
        }

        function validateForm() {
            var isValid = true;
            var formElements = document.forms["submit"];
            var fields = ["fullname", "citizenpic", "dob", "gender", "fathername", "mothername", 
                          "maritalstatus", "districtofbirth", "tribe", "clan", "family", 
                          "homedistrict", "constituency", "location", "sublocation", "occupation"];

            fields.forEach(field => {
                if (formElements[field].value.trim() === "") {
                    document.getElementById(field + "Error").style.display = "block";
                    isValid = false;
                } else {
                    document.getElementById(field + "Error").style.display = "none";
                }
            });

            var maritalstatus = formElements["maritalstatus"].value;
            if (maritalstatus === "Married") {
                if (formElements["partnername"].value.trim() === "") {
                    document.getElementById("partnernameError").style.display = "block";
                    isValid = false;
                }
                if (formElements["partnerid"].value.trim() === "") {
                    document.getElementById("partneridError").style.display = "block";
                    isValid = false;
                }
            }

            // Validate signature
            var signature = document.getElementById("Signature").value.trim();
            if (signature === '') {
                document.getElementById("signatureError").style.display = "block";
                isValid = false;
            }

            return isValid;
        }

        function removeError(field) {
            document.getElementById(field + "Error").style.display = "none";
        }

        function showSubmissionMessage() {
            alert("Form submitted successfully!");
        }
    </script>
    EOT;
}
?>
