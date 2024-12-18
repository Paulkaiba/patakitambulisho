<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

include('includes/dbconnection.php');

if (strlen($_SESSION['uid'] == 0)) {
    header('location:logout.php');
} else {

    // Check if user has ever submitted an application form
    $uid = $_SESSION['uid'];
    $query = mysqli_query($con, "SELECT * FROM tbladmapplications WHERE UserId = '$uid'");
    $row_count = mysqli_num_rows($query);

    if ($row_count == 0) {
        // If user has never submitted an application form, redirect
        header('location:newIDparentsconfirm.php');
        exit();
    }

    // Fetch user details if available
    $user_details = mysqli_fetch_assoc($query);
}

// Coding for form submission
if (isset($_POST['submit'])) {
    $uid = $_SESSION['uid'];
    $reason = $_POST['reason'];
    $image = isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : '';

    // Validate reason for change
    if (empty($reason)) {
        $error_reason = "Please enter a reason for the change.";
    }

    // Validate uploaded image
    if (empty($image)) {
        $error_image = "Please upload an image.";
    }

    if (empty($error_reason) && empty($error_image)) {
        // Process the form and save data to tblreplaceid table
        $image_name = md5($image);
        move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $image_name);

        // Insert data into tblreplaceid table
        $sql = "INSERT INTO tblreplaceid (UserId, Reason, Image) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($con);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            // Bind parameters and execute statement
            mysqli_stmt_bind_param($stmt, "sss", $uid, $reason, $image_name);
            if (mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Data has been added successfully.")</script>';
                // Redirect to a success page or do further processing
            } else {
                echo '<script>alert("Error: ' . mysqli_stmt_error($stmt) . '")</script>';
            }
        } else {
            echo '<script>alert("SQL Error: ' . mysqli_error($con) . '")</script>';
        }
        mysqli_stmt_close($stmt);
    }
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

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

<body class="vertical-layout vertical-menu-modern 2-columns menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<?php include('includes/header.php'); ?>
<?php include('includes/leftbar.php'); ?>
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
           <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
          <h3 class="content-header-title mb-0 d-inline-block">
           New ID Application Form
          </h3>
          <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a>
                </li>
            
                </li>
                <li class="breadcrumb-item active">Application
                </li>
              </ol>
            </div>
          </div>
        </div>
        </div>
        <div class="content-body">
          
            <!-- Form here -->
          
                <section class="formatter" id="formatter">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Admission Form</h4>
									
                                    <!-- Card header here -->
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <!-- Form body here -->
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
<tbody>
                                                    <tr>
                                                        <td>Full Name</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="fullname" name="fullname" type="text" required oninput="removeError('fullname');">
                                                            <span id="fullnameError" class="errorWrap" style="display:none;">Please enter a valid full name.</span>
                                                        </td>
                                                        <td>Citizen Picture</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="userpic" name="userpic" type="file" required>
                                                            <span id="citizenpicError" class="errorWrap" style="display:none;">Please upload a citizen picture.</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date of Birth</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="dob" name="dob" type="text" required oninput="removeError('dob');">
                                                            <span id="dobError" class="errorWrap" style="display:none;">Please enter a valid date of birth.</span>
                                                        </td>
                                                        <td>Gender</td>
                                                        <td>
                                                            <select class="form-control white_bg" id="gender" name="gender" required>
                                                                <option value="">Select Gender</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                            <span id="genderError" class="errorWrap" style="display:none;">Please select a gender.</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Father's Name</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="fathername" name="fathername" type="text" required oninput="removeError('fathername');">
                                                            <span id="fathernameError" class="errorWrap" style="display:none;">Please enter a valid father's name.</span>
                                                        </td>
                                                        <td>Mother's Name</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="mothername" name="mothername" type="text" required oninput="removeError('mothername');">
                                                            <span id="mothernameError" class="errorWrap" style="display:none;">Please enter a valid mother's name.</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Marital Status</td>
                                                        <td>
                                                            <select class="form-control white_bg" id="maritalstatus" name="maritalstatus" onchange="showHidePartnerFields(this);" required>
                                                                <option value="">Select Marital Status</option>
                                                                <option value="Married">Married</option>
                                                                <option value="Single">Single</option>
                                                            </select>
                                                        </td>
                                                        <td>Partner's Name</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="partnername" name="partnername" type="text" style="display: none;" oninput="removeError('partnername');">
                                                            <span id="partnernameError" class="errorWrap" style="display:none;">Please enter a valid partner's name.</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Partner's ID Number</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="partnerid" name="partnerid" type="number" style="display: none;" oninput="removeError('partnerid');">
                                                            <span id="partneridError" class="errorWrap" style="display:none;">Please enter a valid partner's ID number.</span>
                                                        </td>
                                                        <td>District of Birth</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="districtofbirth" name="districtofbirth" type="text" required oninput="removeError('districtofbirth');">
                                                            <span id="districtofbirthError" class="errorWrap" style="display:none;">Please enter a valid district of birth.</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tribe</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="tribe" name="tribe" type="text" required oninput="removeError('tribe');">
                                                            <span id="tribeError" class="errorWrap" style="display:none;">Please enter a valid tribe.</span>
                                                        </td>
                                                        <td>Clan</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="clan" name="clan" type="text" required oninput="removeError('clan');">
                                                            <span id="clanError" class="errorWrap" style="display:none;">Please enter a valid clan.</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Family</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="family" name="family" type="text" required oninput="removeError('family');">
                                                            <span id="familyError" class="errorWrap" style="display:none;">Please enter a valid family name.</span>
                                                        </td>
                                                        <td>Home District</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="homedistrict" name="homedistrict" type="text" required oninput="removeError('homedistrict');">
                                                            <span id="homedistrictError" class="errorWrap" style="display:none;">Please enter a valid home district.</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Constituency</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="constituency" name="constituency" type="text" required oninput="removeError('constituency');">
                                                            <span id="constituencyError" class="errorWrap" style="display:none;">Please enter a valid constituency.</span>
                                                        </td>
                                                        <td>Location</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="location" name="location" type="text" required oninput="removeError('location');">
                                                            <span id="locationError" class="errorWrap" style="display:none;">Please enter a valid location.</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sub Location</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="sublocation" name="sublocation" type="text" required oninput="removeError('sublocation');">
                                                            <span id="sublocationError" class="errorWrap" style="display:none;">Please enter a valid sub location.</span>
                                                        </td>
                                                        <td>Occupation</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="occupation" name="occupation" type="text" required oninput="removeError('occupation');">
                                                            <span id="occupationError" class="errorWrap" style="display:none;">Please enter a valid occupation.</span>
                                                        </td>
                                                    </tr>
                                                    <!-- Add more rows for additional fields -->
                                                    <tr>
                                                        <td colspan="4">
                                                            <fieldset>
                                                                <h5>Education Qualifications</h5>
                                                                <div class="form-group">
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" name="BirthCertificate" value="1"> Birth Certificate
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" name="religiouscard" value="2"> Religious Card
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" name="passportorregistrationcertificate" value="3"> Passport or Registration Certificate
                                                                    </label>
                                                                    <label class="checkbox-inline">
                                                                        <input type="checkbox" name="schoolleavingcertificate" value="4"> School Leaving Certificate (Primary School)
                                                                    </label>
                                                                    <!-- Add checkboxes for other qualifications -->
                                                                </div>
                                                            </fieldset>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                            <fieldset>
                                                                <h5>Upload Documents</h5>
                                                                <div class="form-group">
																<label>Birth Certificate</label>
                                                                    <input class="form-control white_bg" id="birthcertificatepic" name="Birth Certificate" type="file" placeholder="Birth Certificate"> 
                                                                </div>
                                                                <div class="form-group">
																<label>Religious Card</label>
                                                                    <input class="form-control white_bg" id="religiouscard" name="Religious Card" type="file" > 
                                                                </div>
                                                                <div class="form-group">
																<label>Passport or Registration Certificate</label>
                                                                    <input class="form-control white_bg" id="passportorregistrationcertificate" name="Passport or Registration Certificate" type="file">
                                                                </div>
                                                                <div class="form-group">
																<label>School Leaving Certificate (Primary School)</label>
                                                                    <input class="form-control white_bg" id="schoolleavingcertificate" name="School Leaving Certificate" type="file">
                                                                </div>
                                                                <!-- Add file upload inputs for other documents -->
                                                            </fieldset>
                                                        </td>
                                                    </tr>
                                                          <tr>
														  
														  </tr>
														  <tr>
    <td>Reason for Change</td>
    <td colspan="3">
        <textarea class="form-control white_bg" id="reason" name="reason" rows="3" required oninput="removeError('reason');"></textarea>
        <span id="reasonError" class="errorWrap" style="display:none;">Please enter a reason for change.</span>
    </td>
</tr>
<tr>
    <td>Upload Court Document</td>
    <td colspan="3">
        <input class="form-control white_bg" id="court_document" name="court_document" type="file" required>
        <span id="courtDocumentError" class="errorWrap" style="display:none;">Please upload a court document.</span>
    </td>
</tr>
														  <tr>
    <td colspan="4">
        <div class="col-xl-12 col-lg-12">
            <h4 class="card-title"><b>Declaration</b></h4>
            <hr />
        </div>
    </td>
</tr>
<tr>
    <td colspan="4">
        <div class="col-xl-12 col-lg-12">
            <p>
                I <input type="text" name="applicantname" class="form-control" required="true"> declare that the information provided in this
                application is true to the best of my knowledge and belief. In case any information is found
                incorrect or false, my application can be rejected, and necessary action can be taken against me.
            </p>
        </div>
    </td>
</tr>
<tr>
    <td colspan="4" align="center">
        <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Do you really want to submit the form?'); showSubmissionMessage();">Submit</button>
    </td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>

                </section>
            </form>
        </div>
    </div>
</div>
</div>
<?php include('includes/footer.php'); ?>
<!-- BEGIN VENDOR JS-->
<!-- END PAGE VENDOR JS-->
<!-- BEGIN STACK JS-->
<!-- BEGIN STACK JS-->
<script src="assets/app-assets/vendors/js/vendors.min.js"></script>
<script src="assets/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js"></script>
<script src="assets/app-assets/js/core/app-menu.min.js"></script>
<script src="assets/app-assets/js/core/app.min.js"></script>
<script src="assets/app-assets/js/scripts/customizer.min.js"></script>
<!-- END STACK JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->
<script>
    function showHidePartnerFields(select) {
        var selectedOption = select.options[select.selectedIndex].value;
        var partnerNameField = document.getElementById('partnername');
        var partnerIdField = document.getElementById('partnerid');
        if (selectedOption === 'Married') {
            partnerNameField.style.display = 'block';
            partnerIdField.style.display = 'block';
        } else {
            partnerNameField.style.display = 'none';
            partnerIdField.style.display = 'none';
        }
    }

    function validateForm() {
        var isValid = true;

        // Validate full name
        var fullname = document.forms["submit"]["fullname"].value;
        if (fullname === "") {
            document.getElementById('fullnameError').style.display = 'block';
            isValid = false;
        }

        // Validate citizen picture
        var citizenpic = document.forms["submit"]["citizenpic"].value;
        if (citizenpic === "") {
            document.getElementById('citizenpicError').style.display = 'block';
            isValid = false;
        }

        // Validate date of birth
        var dob = document.forms["submit"]["dob"].value;
        if (dob === "") {
            document.getElementById('dobError').style.display = 'block';
            isValid = false;
        }

        // Validate gender
        var gender = document.forms["submit"]["gender"].value;
        if (gender === "") {
            document.getElementById('genderError').style.display = 'block';
            isValid = false;
        }

        // Validate father's name
        var fathername = document.forms["submit"]["fathername"].value;
        if (fathername === "") {
            document.getElementById('fathernameError').style.display = 'block';
            isValid = false;
        }

        // Validate mother's name
        var mothername = document.forms["submit"]["mothername"].value;
        if (mothername === "") {
            document.getElementById('mothernameError').style.display = 'block';
            isValid = false;
        }

        // Validate marital status
        var maritalstatus = document.forms["submit"]["maritalstatus"].value;
        if (maritalstatus === "") {
            isValid = false;
        }

        // Validate partner's name if marital status is Married
        var partnername = document.forms["submit"]["partnername"].value;
        if (maritalstatus === "Married" && partnername === "") {
            document.getElementById('partnernameError').style.display = 'block';
            isValid = false;
        }

        // Validate partner's ID number if marital status is Married
        var partnerid = document.forms["submit"]["partnerid"].value;
        if (maritalstatus === "Married" && partnerid === "") {
            document.getElementById('partneridError').style.display = 'block';
            isValid = false;
        }

        // Validate district of birth
        var districtofbirth = document.forms["submit"]["districtofbirth"].value;
        if (districtofbirth === "") {
            document.getElementById('districtofbirthError').style.display = 'block';
            isValid = false;
        }

        // Validate tribe
        var tribe = document.forms["submit"]["tribe"].value;
        if (tribe === "") {
            document.getElementById('tribeError').style.display = 'block';
            isValid = false;
        }

        // Validate clan
        var clan = document.forms["submit"]["clan"].value;
        if (clan === "") {
            document.getElementById('clanError').style.display = 'block';
            isValid = false;
        }

        // Validate family
        var family = document.forms["submit"]["family"].value;
        if (family === "") {
            document.getElementById('familyError').style.display = 'block';
            isValid = false;
        }

        // Validate home district
        var homedistrict = document.forms["submit"]["homedistrict"].value;
        if (homedistrict === "") {
            document.getElementById('homedistrictError').style.display = 'block';
            isValid = false;
        }

        // Validate constituency
        var constituency = document.forms["submit"]["constituency"].value;
        if (constituency === "") {
            document.getElementById('constituencyError').style.display = 'block';
            isValid = false;
        }

        // Validate location
        var location = document.forms["submit"]["location"].value;
        if (location === "") {
            document.getElementById('locationError').style.display = 'block';
            isValid = false;
        }

        // Validate sub location
        var sublocation = document.forms["submit"]["sublocation"].value;
        if (sublocation === "") {
            document.getElementById('sublocationError').style.display = 'block';
            isValid = false;
        }

        // Validate occupation
        var occupation = document.forms["submit"]["occupation"].value;
        if (occupation === "") {
            document.getElementById('occupationError').style.display = 'block';
            isValid = false;
        }

        // Validate reason for change
        var reason = document.forms["submit"]["reason"].value;
        if (reason === "") {
            document.getElementById('reasonError').style.display = 'block';
            isValid = false;
        }

        // Validate court document
        var courtDocument = document.forms["submit"]["court_document"].value;
        if (courtDocument === "") {
            document.getElementById('courtDocumentError').style.display = 'block';
            isValid = false;
        }

        return isValid;
    }

    function removeError(field) {
        document.getElementById(field + 'Error').style.display = 'none';
    }

    function showSubmissionMessage() {
        alert("Form submitted successfully!");
        // You can also use a notification library or custom HTML element to display the message
    }
</script>
</body>

</html>