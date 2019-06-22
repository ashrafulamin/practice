<?php require('inc/checklogin.php'); ?>
<?php require('inc/connect.php'); ?>
<?php require('inc/functions.php'); ?>

<?php
admin_only();
$page_title = "Add user";
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


if(empty($_POST['email'])){
	$errors[] = 'Email is required.';
}
elseif(strlen($_POST['email']) < 8){
	$errors[] = 'Email is too short.';
}
elseif(get_user($_POST['email'])){
	$errors[] = 'Email is already being used.';
}


if(empty($_POST['password'])){
	$errors[] = 'Password is required.';
}
elseif(strlen($_POST['password']) < 4){
	$errors[] = 'Password is too short.';
}


if(empty($_POST['role'])){
	$errors[] = 'Role is required.';
}
elseif(($_POST['role'] != 'user')&&($_POST['role'] != 'admin') ){
	$errors[] = 'Role is invalid.';
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
