<?php 

// var_dump($_POST);

// echo $_POST["name"];
// echo $_POST["email"];

if(isset($_POST["username"]) && isset($_POST["password"])){

	$username = $_POST["username"];
	$password = $_POST["password"];

	define("USERNAME", "Sterk");
	define("PASSWORD", "tony");

	if($username == USERNAME && $password == PASSWORD){
		setcookie("user_name", $username, time() + 3600, "/dashboard");
		header('Location: http://localhost/dashboard/welcome.php');
		exit;
	}
	else {
		echo 'Invalid user <a href="/dashboard">login</a>';
	}
}
else die("Invalid Request");
?>