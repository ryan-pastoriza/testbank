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
	$sql = "SELECT employees.*, messages.* FROM employees, employment, user_access, messages WHERE employees.employee_id = employment.employee_id
	AND employment.employment_id = user_access.employment_id
	AND messages.to_user = '$user_id'
	AND messages.from_user != '$user_id'
	AND messages.from_user = user_access.user_id
	AND messages.message_status = 'unread'
	GROUP BY employee_id
	ORDER BY message_date_time DESC";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$count = $result->num_rows;
	$conn->close();
	echo $count;
?>