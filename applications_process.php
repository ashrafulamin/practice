<?php require('inc/checklogin.php'); ?>
<?php require('inc/connect.php'); ?>
<?php require('inc/functions.php');?>

<?php
$page_title = "Form";
?>

<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	header('Location: http://localhost/dashboard/');
	die();
	
}

//FORM VALIDATION
$errors = array();

if (empty($_POST['type'])) {
	$errors[] = 'Type is required.';
}
if (empty($_POST['date_start'])) {
	$errors[] = ' Start Date is required.';
}
if (empty($_POST['date_end'])) {
	$errors[] = ' End Date is required.';
}
if (empty($_POST['desc'])){
	$errors[] = 'Description is required.'; 
}

if($_POST['date_start'] > $_POST['date_end']){
	$errors[] = "Start date should be greater than end Date ";
}

foreach ($errors as $error) {
	echo '<li>' . $error. '</li>';
}
if (!empty($errors)) {
	echo 'Please correct the errors';
	die();
}


//FORM PROCESS
$user_id		= current_user()->id;
$type 			= $_POST['type'];
$date_start		= $_POST['date_start'];
$date_end 		= $_POST['date_end'];		 	
$description 	= $_POST['desc'];


//DATABASE INSERT
$insert = $conn->query("INSERT INTO leave_applications (user_id, type, date_start, date_end, description) VALUES('$user_id', '$type', '$date_start', '$date_end', '$description')");

if (!$insert) 
	die('database error:'. mysqli_error($conn));

header('Location: http://localhost/dashboard/applications_view.php?success=true');