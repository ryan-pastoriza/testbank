<?php
	require_once("testcon.php");
	if(isset($_POST['message'])){
		$message = mysqli_real_escape_string($connection, $_POST['message']);
		$conver_id = mysqli_real_escape_string($connection, $_POST['conver_id']);
		$from_user = mysqli_real_escape_string($connection, $_POST['from_user']);
		$to_user = mysqli_real_escape_string($connection, $_POST['to_user']);

		$conver_id = base64_decode($conver_id);
		$from_user = base64_decode($from_user);
		$to_user = base64_decode($to_user);

		$q = mysqli_query($connection, "INSERT INTO messages VALUES ('','$conver_id','$from_user','$to_user','$message', 'unread', now())");
		if($q){
			echo "Posted";
		}else{
			echo "Error";
		}
	}
?>