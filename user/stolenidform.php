<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start session
session_start();

// Include database connection
include('includes/dbconnection.php');

// Check if session UID is empty
if (empty($_SESSION['uid'])) {
    echo '<script>alert("Session UID is empty. Redirecting to logout.php.");</script>';
    echo '<script>setTimeout(function(){ window.location.href = "logout.php"; }, 2000);</script>'; // Delay for 2 seconds
    exit();
}

// Check if session UID exists in tbladmapplications
$query_check_uid = mysqli_query($con, "SELECT * FROM tbladmapplications WHERE UserId = '{$_SESSION['uid']}'");

// Check if query executed successfully
if (!$query_check_uid) {
    echo 'Error checking UID: ' . mysqli_error($con);
    exit();
}

// Fetch the user details
$user_details_check_uid = mysqli_fetch_assoc($query_check_uid);

// Check if user details are fetched
if (!$user_details_check_uid) {
    echo '<script>alert("You need to apply for a new ID first. Redirecting to newIDparentsconfirm.php.");</script>';
    echo '<script>setTimeout(function(){ window.location.href = "newIDparentsconfirm.php"; }, 2000);</script>'; // Delay for 2 seconds
    exit();
}

// Continue with the rest of the code if UID exists

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define folder to store uploaded images
    $targetDir = "userimages/";

    $userpicName = $_FILES["userpic"]["name"];
    $uploadAbstractName = isset($_FILES["uploadAbstract"]) ? $_FILES["uploadAbstract"]["name"] : null;

    // Check if both files are uploaded
    if (!empty($userpicName) && !empty($uploadAbstractName)) {
        $userpicPath = $targetDir . $userpicName;
        $uploadAbstractPath = $targetDir . $uploadAbstractName;

        // Move uploaded files to the defined folder with their original names
        if (move_uploaded_file($_FILES["userpic"]["tmp_name"], $userpicPath) && move_uploaded_file($_FILES["uploadAbstract"]["tmp_name"], $uploadAbstractPath)) {
            // Prepare SQL statement to insert image data into the database
            $sql = "INSERT INTO tblstolenid (UserId, fullname, userpic, dob, gender, fathername, mothername, maritalstatus, partnername, partnerid, districtofbirth, tribe, clan, family, homedistrict, constituency, location, subLocation, Occupation, UploadAbstract, Declaration, Signature) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            // Initialize a prepared statement
            $stmt = mysqli_stmt_init($con);

            // Check if the SQL statement is prepared successfully
            if (mysqli_stmt_prepare($stmt, $sql)) {
                // Bind parameters and execute statement
                mysqli_stmt_bind_param($stmt, "ssssssssssssssssssssss", $uid, $fullname, $userpicName, $dob, $gender, $fathername, $mothername, $maritalstatus, $partnername, $partnerid, $districtofbirth, $tribe, $clan, $family, $homedistrict, $constituency, $location, $subLocation, $occupation, $uploadAbstractName, $Declaration, $Signature);

                // Assign values to parameters
                $uid = $_SESSION['uid'];
                $fullname = $_POST['fullname'];
                $dob = $_POST['dob'];
                $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
                $fathername = $_POST['fathername'];
                $mothername = $_POST['mothername'];
                $maritalstatus = $_POST['maritalstatus'];
                $partnername = $_POST['partnername'];
                $partnerid = $_POST['partnerid'];
                $districtofbirth = $_POST['districtofbirth'];
                $tribe = $_POST['tribe'];
                $clan = $_POST['clan'];
                $family = $_POST['family'];
                $homedistrict = $_POST['homedistrict'];
                $constituency = $_POST['constituency'];
                $location = isset($_POST['location']) ? $_POST['location'] : null;
                $subLocation = isset($_POST['sublocation']) ? $_POST['sublocation'] : null;
                $occupation = isset($_POST['occupation']) ? $_POST['occupation'] : null;
                $Declaration = $_POST['Declaration'];
                $Signature = $_POST['Signature'];

                // Execute statement
                if (mysqli_stmt_execute($stmt)) {
                    echo '<script>alert("Form submitted successfully!");</script>';
                    // Redirect or perform any other action after successful submission
                    echo '<script>window.location.href = "stolenidform.php";</script>';
                } else {
                    echo "Error inserting data into database: " . mysqli_stmt_error($stmt);
                }
            } else {
                echo "Error preparing SQL statement: " . mysqli_error($con);
            }
        } else {
            echo "Error uploading files.";
        }
    } else {
        echo "Please upload both userpic and uploadAbstract.";
    }
}

// Fetch user details from tbladmapplications
$query = mysqli_query($con, "SELECT * FROM tbladmapplications WHERE UserId = '{$_SESSION['uid']}'");

// Check if query executed successfully
if (!$query) {
    echo 'Error fetching user details: ' . mysqli_error($con);
    exit();
}

// Fetch the user details
$user_details = mysqli_fetch_assoc($query);

// Check if user details are fetched
if (!$user_details) {
    echo 'User details not found.';
    exit();
}

// Assign fetched user details to specific variables
$fullname = $user_details['fullname'];
$dob = $user_details['dob'];
$gender = isset($user_details['gender']) ? $user_details['gender'] : null;
$fatherName = $user_details['fathername'];
$motherName = $user_details['mothername'];
$maritalStatus = $user_details['maritalstatus'];
$partnerName = $user_details['partnername'];
$partnerID = $user_details['partnerid'];
$districtOfBirth = $user_details['districtofbirth'];
$tribe = $user_details['tribe'];
$clan = $user_details['clan'];
$family = $user_details['family'];
$homeDistrict = $user_details['homedistrict'];
$constituency = $user_details['constituency'];
$location =  $user_details['location'];
$subLocation = $user_details['sublocation'];
$occupation = $user_details['occupation'];

include('Applications layout/stolenid.php');
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<?php scriptheader() ?>

<body class="vertical-layout vertical-menu-modern 2-columns menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <?php include('includes/header.php'); ?>
    <?php include('includes/leftbar.php'); ?>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Replace ID Form</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Application</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section class="formatter" id="formatter">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Admission Form</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                      <form name="submit" action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">



                                          <!-- Form body here -->
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
<tbody>
                                                    <tr>
                                                        <td>Full Name</td>
                                                        <td>
                                                           <input class="form-control white_bg" id="fullname" name="fullname" type="text" required oninput="removeError('fullname');" value="<?php echo $fullname; ?>">
                                                            <span id="fullnameError" class="errorWrap" style="display:none;">Please enter a valid full name.</span>
                                                        </td>
                                                        <td>Citizen Picture</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="userpic" name="userpic" type="file" value="<?php echo $upic; ?>">
                                                            <span id="citizenpicError" class="errorWrap" style="display:none;">Please upload a citizen picture.</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date of Birth</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="dob" name="dob" type="text" required oninput="removeError('dob');" value="<?php echo $dob; ?>">
                                                            <span id="dobError" class="errorWrap" style="display:none;">Please enter a valid date of birth.</span>
                                                        </td>
                                                        <td>Gender</td>
                                                        <td>
    <select class="form-control white_bg" id="gender" name="gender" required oninput="removeError('gender');">
    <option value="">Select Gender</option>
    <option value="Male" <?php echo ($gender == 'Male') ? 'selected' : ''; ?>>Male</option>
    <option value="Female" <?php echo ($gender == 'Female') ? 'selected' : ''; ?>>Female</option>
</select>
    <span id="genderError" class="errorWrap" style="display:none;">Please select a gender.</span>
</td>

                                                    </tr>
                                                    <tr>
                                                        <td>Father's Name</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="fathername" name="fathername" type="text" required oninput="removeError('fathername');" value="<?php echo $fatherName; ?>">
                                                            <span id="fathernameError" class="errorWrap" style="display:none;">Please enter a valid father's name.</span>
                                                        </td>
                                                        <td>Mother's Name</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="mothername" name="mothername" type="text" required oninput="removeError('mothername');"value="<?php echo $motherName; ?>">
                                                            <span id="mothernameError" class="errorWrap" style="display:none;">Please enter a valid mother's name.</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                       <td>Marital Status</td>
<td>
    <select class="form-control white_bg" id="maritalstatus" name="maritalstatus" onchange="showHidePartnerFields(this);" required oninput="removeError('maritalstatus');">
        <option value="">Select Marital Status</option>
        <option value="Married" <?php echo ($maritalStatus == 'Married') ? 'selected' : ''; ?>>Married</option>
        <option value="Single" <?php echo ($maritalStatus == 'Single') ? 'selected' : ''; ?>>Single</option>
    </select>
</td>
<td>Partner's Name</td>
<td>
    <div id="partnerFields" style="display: <?php echo ($maritalStatus == 'Married') ? 'block' : 'none'; ?>">
        <input class="form-control white_bg" id="partnername" name="partnername" type="text" style="display: <?php echo ($maritalStatus == 'Married') ? 'block' : 'none'; ?>" oninput="removeError('partnername');" value="<?php echo $partnerName; ?>">
        <span id="partnernameError" class="errorWrap" style="display:none;">Please enter a valid partner's name.</span>
    </div>
</td>
</tr>
<tr>
<td>Partner's ID Number</td>
<td>
    <div id="partnerFields" style="display: <?php echo ($maritalStatus == 'Married') ? 'block' : 'none'; ?>">
        <input class="form-control white_bg" id="partnerid" name="partnerid" type="number" style="display: <?php echo ($maritalStatus == 'Married') ? 'block' : 'none'; ?>" oninput="removeError('partnerid');" value="<?php echo $partnerID; ?>">
        <span id="partneridError" class="errorWrap" style="display:none;">Please enter a valid partner's ID number.</span>
    </div>
</td>

                                                        <td>District of Birth</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="districtofbirth" name="districtofbirth" type="text" required oninput="removeError('districtofbirth');" value="<?php echo $districtOfBirth; ?>">
                                                            <span id="districtofbirthError" class="errorWrap" style="display:none;">Please enter a valid district of birth.</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tribe</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="tribe" name="tribe" type="text" required oninput="removeError('tribe');" value="<?php echo $tribe; ?>">
                                                            <span id="tribeError" class="errorWrap" style="display:none;">Please enter a valid tribe.</span>
                                                        </td>
                                                        <td>Clan</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="clan" name="clan" type="text" required oninput="removeError('clan');" value="<?php echo $clan; ?>">
                                                            <span id="clanError" class="errorWrap" style="display:none;">Please enter a valid clan.</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Family</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="family" name="family" type="text" required oninput="removeError('family');" value="<?php echo $family; ?>">
                                                            <span id="familyError" class="errorWrap" style="display:none;">Please enter a valid family name.</span>
                                                        </td>
                                                        <td>Home District</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="homedistrict" name="homedistrict" type="text" required oninput="removeError('homedistrict');" value="<?php echo $homeDistrict; ?>">
                                                            <span id="homedistrictError" class="errorWrap" style="display:none;">Please enter a valid home district.</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Constituency</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="constituency" name="constituency" type="text" required oninput="removeError('constituency');" value="<?php echo $constituency; ?>">
                                                            <span id="constituencyError" class="errorWrap" style="display:none;">Please enter a valid constituency.</span>
                                                        </td>
                                                        <td>Location</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="location" name="location" type="text" required oninput="removeError('location');" value="<?php echo $location; ?>">
                                                            <span id="locationError" class="errorWrap" style="display:none;">Please enter a valid location.</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sub Location</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="sublocation" name="sublocation" type="text" required oninput="removeError('sublocation');" value="<?php echo $subLocation; ?>">
                                                            <span id="sublocationError" class="errorWrap" style="display:none;">Please enter a valid sub location.</span>
                                                        </td>
                                                        <td>Occupation</td>
                                                        <td>
                                                            <input class="form-control white_bg" id="occupation" name="occupation" type="text" required oninput="removeError('occupation');"value="<?php echo $occupation; ?>">
                                                            <span id="occupationError" class="errorWrap" style="display:none;">Please enter a valid occupation.</span>
                                                        </td>
                                                    </tr>
                                                    <!-- Add more rows for additional fields -->
                                                    <tr>
                                                       
														 
<tr>
    <td>Upload Abstract</td>
    <td colspan="3">
        <input class="form-control white_bg" id="abstract_document" name="uploadAbstract" type="file" required>

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
                I <input type="text" name="Declaration" class="form-control" required="true"> declare that the information provided in this
                application is true to the best of my knowledge and belief. In case any information is found
                incorrect or false, my application can be rejected, and necessary action can be taken against me.
            </p>
        </div>
    </td>
	 <td>Signature:</td>
        <td colspan="3">
            <input type="text" name="Signature" id="Signature" class="form-control" required>
            <span id="signatureError" class="errorWrap" style="display:none;">Please provide your signature.</span>
        </td>
</tr>
<tr>
    <td colspan="4" align="center">
   <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Do you really want to submit the form?');">Submit</button>


</td>
</tr>
</tbody>
</table>
                                            <!-- Add the submit button within the form -->
                                            
											</tbody>
											</table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php'); ?>
    <!-- BEGIN VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN STACK JS-->
    <?php scriptmwisho() ?>
    <!-- END STACK JS-->
    <!-- BEGIN PAGE LEVEL JS-->

   
    <?php showSubmissionMessage() ?>
    <?php showHidePartnerFields(select) ?>
    
<?php validateForm() ?>
<?php removeError(field) ?>
<?php showSubmissionMessage() ?>

    <!-- END PAGE LEVEL JS-->
</body>

</html>
