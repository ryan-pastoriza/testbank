<?php
include 'ses.php';
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "testbank";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$user_id = $_SESSION['user_id'];
	$sql = "UPDATE messages SET `message_status` = 'read' WHERE messages.to_user = '$user_id' AND messages.from_user != '$user_id' AND message_status = 'unread'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$count = $result->num_rows;
	echo $count;
	$conn->close();
?>