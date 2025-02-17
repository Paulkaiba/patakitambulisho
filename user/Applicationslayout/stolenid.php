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

        function validateForm() {
        var isValid = true;

               // Validate full name
        var fullname = document.forms["submit"]["fullname"].value;
        if (fullname === "") {
            document.getElementById("fullnameError").style.display = "block";

            isValid = false;
        }

        // Validate citizen picture
        var citizenpic = document.forms["submit"]["citizenpic"].value;
        if (citizenpic === "") {
            document.getElementById("citizenpicError").style.display = "block";
            isValid = false;
        }

        // Validate date of birth
        var dob = document.forms["submit"]["dob"].value;
        if (dob === "") {
            document.getElementById("dobError").style.display = "block";
            isValid = false;
        }

        // Validate gender
        var gender = document.forms["submit"]["gender"].value;
        if (gender === "") {
            document.getElementById("genderError").style.display = "block";
            isValid = false;
        }

        // Validate fathers name
        var fathername = document.forms["submit"]["fathername"].value;
        if (fathername === "") {
            document.getElementById("fathernameError").style.display = "block";
            isValid = false;
        }

        // Validate mothers name
        var mothername = document.forms["submit"]["mothername"].value;
        if (mothername === "") {
            document.getElementById("mothernameError").style.display = "block";
            isValid = false;
        }

        // Validate marital status
        var maritalstatus = document.forms["submit"]["maritalstatus"].value;
        if (maritalstatus === "") {
            isValid = false;
        }

        // Validate partners name if marital status is Married
        var partnername = document.forms["submit"]["partnername"].value;
        if (maritalstatus === "Married" && partnername === "") {
            document.getElementById("partnernameError").style.display = "block";
            isValid = false;
        }

        // Validate partners ID number if marital status is Married
        var partnerid = document.forms["submit"]["partnerid"].value;
        if (maritalstatus === "Married" && partnerid === "") {
            document.getElementById("partneridError").style.display = "block";
            isValid = false;
        }

        // Validate district of birth
        var districtofbirth = document.forms["submit"]["districtofbirth"].value;
        if (districtofbirth === "") {
            document.getElementById("districtofbirthError").style.display = "block";
            isValid = false;
        }

        // Validate tribe
        var tribe = document.forms["submit"]["tribe"].value;
        if (tribe === "") {
            document.getElementById("tribeError").style.display = "block";
            isValid = false;
        }

        // Validate clan
        var clan = document.forms["submit"]["clan"].value;
        if (clan === "") {
            document.getElementById("clanError").style.display = "block";
            isValid = false;
        }

        // Validate family
        var family = document.forms["submit"]["family"].value;
        if (family === "") {
            document.getElementById("familyError").style.display = "block";
            isValid = false;
        }

        // Validate home district
        var homedistrict = document.forms["submit"]["homedistrict"].value;
        if (homedistrict === "") {
            document.getElementById("homedistrictError").style.display = "block";
            isValid = false;
        }

        // Validate constituency
        var constituency = document.forms["submit"]["constituency"].value;
        if (constituency === "") {
            document.getElementById("constituencyError").style.display = "block";
            isValid = false;
        }

        // Validate location
        var location = document.forms["submit"]["location"].value;
        if (location === "") {
            document.getElementById("locationError").style.display = "block";
            isValid = false;
        }

        // Validate sub location
        var sublocation = document.forms["submit"]["sublocation"].value;
        if (sublocation === "") {
            document.getElementById("sublocationError").style.display = "block";
            isValid = false;
        }

        // Validate occupation
        var occupation = document.forms["submit"]["occupation"].value;
        if (occupation === "") {
            document.getElementById("occupationError").style.display = "block";
            isValid = false;
        }

        // Validate signature
        var signature = document.getElementById("Signature").value.trim();
        var signatureError = document.getElementById("signatureError");

        // Check if signature is empty
        if (signature === '') {
            signatureError.style.display = 'block';
            isValid = false; // Set isValid to false if signature is empty
        } else {
            signatureError.style.display = 'none';
        }

        return isValid; // Return the isValid flag
    }

    function removeError(field) {
        document.getElementById(field + 'Error').style.display = 'none';
    }

    function showSubmissionMessage() {
        alert("Form submitted successfully!");
        // You can also use a notification library or custom HTML element to display the message
    }

    </script>';
?>