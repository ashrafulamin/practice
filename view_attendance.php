<?php require('inc/checklogin.php'); ?>
<?php require('inc/connect.php'); ?>
<?php require('inc/functions.php'); ?>

<?php
admin_only();
$page_title = "View Attendance";
?>

<?php require('layout/header.php'); ?>


<?php

$sql = "SELECT date, user_id, in_time, out_time FROM attendance";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row

    echo '<table class="table">';
    echo '<tr> <th>Date</th> <th>Name</th> <th>In Time</th> <th>Out Time</th> </tr>';
    while($row = $result->fetch_assoc()) {
    	echo '<tr>';
    	echo '<td>' . $row["date"] . '</td>';
    	echo '<td>' . get_user_by_id($row["user_id"])->name . '</td>';
    	echo '<td>' . date('h:i A', strtotime($row["in_time"])) . '</td>';
    	echo '<td>' . date('h:i A', strtotime($row["out_time"])) . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo '<div class="alert alert-warning" role="alert">No Record Found</div>';
}

?>







<?php require('layout/footer.php') ?>