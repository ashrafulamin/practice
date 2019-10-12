<?php require('inc/checklogin.php'); ?>
<?php require('inc/connect.php'); ?>
<?php require('inc/functions.php');?>

<?php
$page_title = "Leave Applications";
?>

<?php require('layout/header.php'); ?>
<?php if (isset($_GET['success'])): 
  echo '<div class="alert alert-success" role="alert">Application Sent</div>';
endif;
?>

<a href="applications_form.php" class="btn btn-primary btn-sm mb-4">Application Form</a>

<?php

$user_id = current_user()->id;

$sql = "SELECT user_id, type, date_start, date_end, status FROM leave_applications where user_id='$user_id'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    echo'<table class="table">';
    echo '<tr><th>Start Date</th><th>End Date</th><th>Type</th><th>Status</th></tr>';
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["date_start"] . '</td>';
        echo '<td>' . $row["date_end"] . '</td>';
        echo '<td>' . $row["type"] . '</td>';
        echo '<td>' . $row["status"] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo '<div class="alert alert-warning" role="alert">No Record Found</div>';
}
?>

<?php require('layout/footer.php'); ?>