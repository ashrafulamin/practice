<?php require('inc/checklogin.php'); ?>
<?php require('inc/connect.php'); ?>
<?php require('inc/functions.php'); ?>

<?php
admin_only();
$page_title = "Add Device";
?>

<?php
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('Location: http://localhost/dashboard');
	die();
}

$errors = array();

if(empty($_POST['name'])){
	$errors[] = 'Name is required.';
}
elseif(strlen($_POST['name']) < 3){
	$errors[] = 'Name is too short.';
}


if(empty($_POST['mac_address'])){
	$errors[] = 'Mac address is required.';
}
elseif(strlen($_POST['mac_address']) != 20){
	$errors[] = 'Mac address is invalid.';
}


if(empty($_POST['user_id'])){
	$errors[] = 'User ID is required.';
}
elseif(!is_int($_POST['user_id']) || $_POST['user_id'] < 1){
	$errors[] = 'User ID is invalid.';
}
elseif(!get_user_by_id($_POST['user_id'])){
	$errors[] = 'User ID is invalid.';
}





foreach ($errors as $error) {
	echo '<li>' . $error . '</li>';
}

if(!empty($errors)){
	echo 'Please correct the errors';
	die();
}

$name		= addslashes($_POST['name']);
$email		= $_POST['email'];
$password 	= md5($_POST['password']);
$role		= $_POST['role'];

$insert = $conn->query("INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', '$role')");

if(!$insert)
	die('database error');

header('Location: http://localhost/dashboard');
