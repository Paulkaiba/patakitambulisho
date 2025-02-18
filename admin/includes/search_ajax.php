<?php
include('../includes/dbconnection.php');

if (isset($_GET['q'])) {
    $searchTerm = mysqli_real_escape_string($con, $_GET['q']);

    $query = "SELECT tbluser.ID as UserId, tbluser.FirstName, tbluser.LastName, tbluser.MobileNumber, tbluser.Email 
              FROM tbluser 
              WHERE tbluser.FirstName LIKE '%$searchTerm%' 
                 OR tbluser.MobileNumber LIKE '%$searchTerm%' 
                 OR tbluser.Email LIKE '%$searchTerm%' 
              LIMIT 10";

    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
        echo '<ul class="list-group">';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<li class="list-group-item"><a href="view-appform.php?aticid=' . $row['UserId'] . '">' . 
                 $row['FirstName'] . ' ' . $row['LastName'] . ' (' . $row['Email'] . ')</a></li>';
        }
        echo '</ul>';
    } else {
        echo '<p class="text-muted">No results found</p>';
    }
}
?>
