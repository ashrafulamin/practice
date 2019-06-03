<?php require('inc/connect.php'); ?>
<?php require('inc/functions.php'); ?>

<?php

$ip_list = get_ip_lists();

$sql = "SELECT id, name, mac_add, user_id FROM devices";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {

	$id 		=	$row['id'];
	$mac_add	=	$row['mac_add'];
	$user_id	=	$row['user_id'];
	$date		=	date("Y-m-d H:i:s", time());

	$ip 		=	array_search($mac_add, $ip_list);

	if(is_device_online($ip)){
		$conn->query("UPDATE devices SET last_seen = '$date' WHERE id = '$id'");
	}
	else echo $row['name'] . ': Offline <br/>';
}