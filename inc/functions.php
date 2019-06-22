<?php

function get_user($email){
	global $conn;

	$sql = "SELECT id, name, email FROM users WHERE email = '$email' LIMIT 0,1";
	$result = $conn->query($sql);

	if($result)
		return $result->fetch_object();
	else return false;
}


function current_user(){
	$email = $_COOKIE["user_name"];
	return get_user($email);
}

function get_ip_lists(){

	ob_start();
		system('arp -a');
		$cmd_result = ob_get_contents();
	ob_clean();

	$ip_list = explode("\n", $cmd_result); //Create array for each entry

	unset($ip_list[0], $ip_list[1], $ip_list[2]); //Remove unecessary values

	//Process each entry
	foreach ($ip_list as $value) {
		//Remove extra blank spaces & explode by single space
		$value = explode(" ", preg_replace('/\s+/', ' ', trim($value)));

		//Check if the exploded entry has a mac address
		if(isset($value[1])){

			$ip = $value[0];
			$mac = strtoupper($value[1]); //Uppercase all mac addresses

			$ip_list_new[$ip] = $mac;
		}
	}

	return $ip_list_new;
}

function is_device_online($ip){
	ob_start();
		system('ping -n 1 '.$ip);
		$cmd_result = ob_get_contents();
	ob_clean();

	if (strpos($cmd_result, 'Received = 1') != FALSE) {
		return true;
	}
	else {
		return false;
	}
}