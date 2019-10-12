<?php require('inc/checklogin.php'); ?>
<?php require('inc/connect.php'); ?>
<?php require('inc/functions.php'); ?>

<?php

$page_title = "View User";
?>

<?php require('layout/header.php'); ?>


<?php

$error = false;

if(!isset($_GET['user_id'])||!is_admin()){
    $user = current_user();
}
else {
    $user_id = (int) $_GET['user_id'];

    if(get_user_by_id($user_id)){
        $user = get_user_by_id($user_id);
    }
    else {
        $error = true;
    }
}

if(!isset($_GET['date'])){
    $date = date('Y-m-d');
}
else {
    $date = $_GET['date'];
    $date = date('Y-m-d', strtotime($date));
}

$now    = date('Y-m-d');
$start  = date('Y-m-01', strtotime($date));
$end    = date('Y-m-t', strtotime($date));


$sql = "SELECT date, user_id, in_time, out_time FROM attendance WHERE user_id = '$user->id' AND date >= '$start' AND date <= '$end'";

$result = $conn->query($sql);

echo "<h6><b>User:</b> $user->name</h6>";
echo "<h6><b>Month:</b> " . date('F Y', strtotime($date)) . "</h6>";

$previous = date('Y-m-d', strtotime("$start -1 month"));
$next = date('Y-m-d', strtotime("$start +1 month"));

echo '<a href="view_user.php?user_id='.$user->id.'&date='.$previous.'"><< Previous</a> ||
        <a href="view_user.php?user_id='.$user->id.'&date='.$now.'">Current</a> ||
        <a href="view_user.php?user_id='.$user->id.'&date='.$next.'">Next >></a>';

if ($result->num_rows > 0) {
    // output data of each row
    $attendance = array();
    while($row = $result->fetch_assoc()) {
        $attendance[$row["date"]] = array(
            'in_time'   => date('h:i A', strtotime($row["in_time"])),
            'out_time'  => date('h:i A', strtotime($row["out_time"]))
        );
    }
} else {
    echo '<div class="alert alert-warning" role="alert">No Record Found</div>';
}

$month_days = date('t', strtotime($date));

echo '<table class="table table-bordered">';
echo '<thead><tr><th>Day</th><th>Status</th><th>In Time</th><th>Out Time</th></tr></thead>';

for ($i=1; $i <= $month_days; $i++) {

    $day = str_pad($i, 2, '0', STR_PAD_LEFT);

    $date = date('Y-m-'.$day, strtotime($date));

    if(isset($attendance[$date])){
        $status = "Present";
        $in_time = $attendance[$date]['in_time'];
        $out_time = $attendance[$date]['out_time'];
        $status_class = 'text-success';
    }
    elseif($date > date('Y-m-d')){
        $status = "";
        $in_time = '';
        $out_time = '';
        $status_class = '';
    }
    else {
        $status = "Absent";
        $in_time = '';
        $out_time = '';
        $status_class = 'text-danger';
    }


    echo '<tr><td width="30">'. $day .'</td> <td class="'.$status_class.'">'. $status .'</td><td>'.$in_time.'</td><td>'.$out_time.'</td></tr>';
}
echo '</table>';

//print $month_days;

?>







<?php require('layout/footer.php') ?>