<?php
include('dbconnection.php');

// Fetch notifications for fee payments
$notifications = array();

// Fetch notifications for new fee payments
$query_fees = "SELECT tblfees.*, tbluser.FirstName, tbluser.LastName FROM tblfees
               INNER JOIN tbluser ON tblfees.ID = tbluser.ID
               ORDER BY tblfees.ID DESC LIMIT 1";
$result_fees = mysqli_query($con, $query_fees);
if (mysqli_num_rows($result_fees) > 0) {
    $row_fees = mysqli_fetch_assoc($result_fees);
    $notification_fees = array(
        'name' => $row_fees['FirstName'] . ' ' . $row_fees['LastName'] . ' made a fee payment',
        'link' => 'view-fees.php?userID=' . $row_fees['UserID'],
        'timestamp' => $row_fees['SubmissionDate']
    );
    $notifications[] = $notification_fees;
}

// Fetch the ID of the last fetched row, if available
$last_fetched_id = isset($row_feesre['ID']) ? $row_feesre['ID'] : 0;

// Fetch notifications for new fee payments (Replacement ID)
$query_feesre = "SELECT tblfeesre.*, tbluser.FirstName, tbluser.LastName FROM tblfeesre
                 INNER JOIN tbluser ON tblfeesre.UserID = tbluser.ID
                 WHERE tblfeesre.ID > $last_fetched_id
                 ORDER BY tblfeesre.ID DESC";
$result_feesre = mysqli_query($con, $query_feesre);
if ($result_feesre && mysqli_num_rows($result_feesre) > 0) {
    while ($row_feesre = mysqli_fetch_assoc($result_feesre)) {
        $notification_feesre = array(
            'name' => $row_feesre['FirstName'] . ' ' . $row_feesre['LastName'] . ' made a fee payment (Replacement ID)',
            'link' => 'view-feesreplaceid.php?docid=' . $row_feesre['ID'],
            'timestamp' => $row_feesre['SubmissionDate']
        );
        $notifications[] = $notification_feesre;
    }
}



// Fetch notifications for new fee payments (Stolen ID)
$query_feesst = "SELECT tblfeesst.*, tbluser.FirstName, tbluser.LastName FROM tblfeesst
                 INNER JOIN tbluser ON tblfeesst.UserID = tbluser.ID
                 ORDER BY tblfeesst.ID DESC LIMIT 1";
$result_feesst = mysqli_query($con, $query_feesst);
if (mysqli_num_rows($result_feesst) > 0) {
    $row_feesst = mysqli_fetch_assoc($result_feesst);
    $notification_feesst = array(
        'name' => $row_feesst['FirstName'] . ' ' . $row_feesst['LastName'] . ' made a fee payment (Stolen ID)',
        'link' => 'view-feesstolenid.php?userid=' . $row_feesst['UserID'],
        'timestamp' => $row_feesst['SubmissionDate']
    );
    $notifications[] = $notification_feesst;
}



// Fetch notifications for new admissions
$query_adm = "SELECT tbladmapplications.ID as appid, tbluser.FirstName, tbladmapplications.CourseApplieddate FROM tbladmapplications 
              JOIN tbluser ON tbluser.ID = tbladmapplications.UserId 
              WHERE tbladmapplications.AdminStatus IS NULL";
$result_adm = mysqli_query($con, $query_adm);
$num_adm = mysqli_num_rows($result_adm);

// Fetch notifications for stolen ID 
$query_stolen = "SELECT tblstolenid.*, tbluser.FirstName, tblstolenid.CourseApplieddate FROM tblstolenid
                 JOIN tbluser ON tbluser.ID = tblstolenid.UserId 
                 WHERE tblstolenid.AdminStatus IS NULL";
$result_stolen = mysqli_query($con, $query_stolen);


// Fetch notifications for replaced ID 
$query_replace = "SELECT tblreplaceid.*, tbluser.FirstName, tblreplaceid.CourseApplieddate FROM tblreplaceid
                  JOIN tbluser ON tbluser.ID = tblreplaceid.UserId 
                  WHERE tblreplaceid.AdminStatus IS NULL";
$result_replace = mysqli_query($con, $query_replace);


// Combine notifications for stolen IDs and replaced IDs
$notifications = array();

if ($result_stolen && mysqli_num_rows($result_stolen) > 0) {
    while ($row_stolen = mysqli_fetch_assoc($result_stolen)) {
        $notification_stolen = array(
            'name' => $row_stolen['FirstName'] . ' reported a stolen ID',
            'link' => 'view-stolenIDappform.php?userid=' . $row_stolen['UserId'],
            'timestamp' => $row_stolen['CourseApplieddate'] // 
        );
        $notifications[] = $notification_stolen;
    }
}

// Check if $result_replace is not null and has rows
if ($result_replace && mysqli_num_rows($result_replace) > 0) {
    while ($row_replace = mysqli_fetch_assoc($result_replace)) {
        $notification_replace = array(
            'name' => $row_replace['FirstName'] . ' applied for ID replacement',
            'link' => 'view-replaceIDappform.php?userid=' . $row_replace['UserId'],
            'timestamp' => $row_replace['CourseApplieddate'] //
        );
        $notifications[] = $notification_replace;
    }
}

?>

<link rel="stylesheet" type="text/css" href="../app-assets/css/vendors.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/app.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/core/colors/palette-gradient.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/plugins/forms/extended/form-extended.css">

<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="dashboard.php">
                        <h3 class="brand-text">PKMS Admin</h3>
                    </a>
                </li>
                <li class="nav-item d-none d-md-block float-right"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <span class="mr-1">Hello,
                                <?php
                                $admid = $_SESSION['aid'];
                                $ret = mysqli_query($con, "select AdminName from tbladmin where ID='$admid'");
                                $row = mysqli_fetch_array($ret);
                                $name = $row['AdminName'];
                                ?>
                                <span class="user-name text-bold-700"><?php echo $name; ?></span>
                            </span>
                            <span class="avatar avatar-online">
                                <img src="../app-assets/images/user.png" alt="avatar"><i></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="adminprofile.php"><i class="ft-user"></i> Edit Profile</a>
                            <a class="dropdown-item" href="change-password.php"><i class="ft-user"></i> Change Pass</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php"><i class="ft-power"></i> Logout</a>
                        </div>
                    </li>
                    <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                            <i class="ficon ft-bell"></i>
                            <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow" id="notification-count"><?php echo count($notifications) + $num_adm; ?></span>

                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right" id="notification-list">
                            <li class="dropdown dropdown-notification nav-item">
    <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
        <i class="ficon ft-bell"></i>
        <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow"><?php echo count($notifications) + $num_adm; ?></span>
    </a>
    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
        <li class="dropdown-menu-header">
            <h6 class="dropdown-header m-0">
                <span class="grey darken-2">Notifications</span>
            </h6>
            <span class="notification-tag badge badge-default badge-danger float-right m-0"><?php echo count($notifications) + $num_adm; ?> New</span>
        </li>
        <li class="scrollable-container media-list w-100">

         
            <?php foreach ($notifications as $notification) { ?>
                <a href="<?php echo $notification['link']; ?>">
                    <div class="media">
                        <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                        <div class="media-body">
                            <h6 class="media-heading"><b><?php echo $notification['name']; ?></b> made a payment</h6>
                        </div>
                    </div>
                </a>
            <?php } ?>

            
            <?php while ($row_adm = mysqli_fetch_array($result_adm)) { ?>
                <a href="view-appform.php?aticid=<?php echo $row_adm['appid']; ?>">
                    <div class="media">
                        <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                        <div class="media-body">
                            <h6 class="media-heading"><b><?php echo $row_adm['FirstName']; ?></b> applied for a New ID</h6>
                            <small><time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">at <?php echo $row_adm['CourseApplieddate']; ?></time></small>
                        </div>
                    </div>
                </a>
            <?php } ?>
        
<?php while ($row_replace = mysqli_fetch_array($result_replace)) { ?>
    <a href="view-replaceid.php?userid=<?php echo $row_replace['UserId']; ?>">
        <div class="media">
            <div class="media-left align-self-center"><i class="ft-refresh-cw icon-bg-circle bg-blue"></i></div>
            <div class="media-body">
                <h6 class="media-heading"><b><?php echo $row_replace['FirstName']; ?></b> applied for ID replacement</h6>
                <small><time class="media-meta text-muted" datetime="<?php echo $row_replace['CreationDate']; ?>">at <?php echo $row_replace['CreationDate']; ?></time></small>
            </div>
        </div>
    </a>
<?php } ?>


<?php while ($row_stolen = mysqli_fetch_array($result_stolen)) { ?>
    <a href="view-stolenid.php?userid=<?php echo $row_stolen['UserId']; ?>">
        <div class="media">
            <div class="media-left align-self-center"><i class="ft-alert-triangle icon-bg-circle bg-red"></i></div>
            <div class="media-body">
                <h6 class="media-heading"><b><?php echo $row_stolen['FirstName']; ?></b>  applied for a stolen ID</h6>
                <small><time class="media-meta text-muted" datetime="<?php echo $row_stolen['CreationDate']; ?>">at <?php echo $row_stolen['CreationDate']; ?></time></small>
            </div>
        </div>
    </a>
<?php } ?>

<?php while ($row_fees = mysqli_fetch_array($result_fees)) { ?>
    <a href="view-fees.php?userID=<?php echo $row_fees['UserID']; ?>">
        <div class="media">
            <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
            <div class="media-body">
                <h6 class="media-heading"><b><?php echo $row_fees['FirstName'] . ' ' . $row_fees['LastName']; ?></b> made a fee for New ID payment</h6>
                <small><time class="media-meta text-muted" datetime="<?php echo $row_fees['SubmissionDate']; ?>">at <?php echo $row_fees['SubmissionDate']; ?></time></small>
            </div>
        </div>
    </a>
<?php } ?>
<?php while ($row_feesst = mysqli_fetch_array($result_feesst)) { ?>
    <a href="view-feesstolenid.php?userid=<?php echo $row_feesst['UserID']; ?>">
        <div class="media">
            <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
            <div class="media-body">
                <h6 class="media-heading"><b><?php echo $row_feesst['FirstName'] . ' ' . $row_feesst['LastName']; ?></b> made a fee payment (Stolen ID)</h6>
                <small><time class="media-meta text-muted" datetime="<?php echo $row_feesst['SubmissionDate']; ?>">at <?php echo $row_feesst['SubmissionDate']; ?></time></small>
            </div>
        </div>
    </a>
<?php } ?>
<?php while ($row_feesre = mysqli_fetch_array($result_feesre)) { ?>
    <a href="view-feesreplaceid.php?docid=<?php echo $row_feesre['ID']; ?>">
        <div class="media">
            <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
            <div class="media-body">
                <h6 class="media-heading"><b><?php echo $row_feesre['FirstName'] . ' ' . $row_feesre['LastName']; ?></b> made a fee payment (Replacement ID)</h6>
                <small><time class="media-meta text-muted" datetime="<?php echo $row_feesre['SubmissionDate']; ?>">at <?php echo $row_feesre['SubmissionDate']; ?></time></small>
            </div>
        </div>
    </a>
<?php } ?>



        </li>
    </ul>
</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    function checkNotifications() {
        $.ajax({
            url: 'fetch_notifications.php', // Changed URL to new PHP file
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#notification-count').text(response.length); // Assuming response is an array
                $('#notification-list').empty();
                $.each(response, function(index, notification) {
                    $('#notification-list').append(
                        '<a href="' + notification.link + '">' +
                        '<div class="media">' +
                        '<div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>' +
                        '<div class="media-body">' +
                        '<h6 class="media-heading"><b>' + notification.name + '</b>' +
                        '<small><time class="media-meta text-muted" datetime="' + notification.timestamp + '">at ' + notification.timestamp + '</time></small>' +
                        '</h6>' +
                        '</div></div></a>'
                    );
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText); // Log the error to the console
                // Display error message to the user if needed
            }
        });
    }

    checkNotifications();

    setInterval(checkNotifications, 60000); // Check every 60 seconds
</script>


