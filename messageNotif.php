<?php
session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "testbank";
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$user_id = $_SESSION['user_id'];
	$sql = "SELECT employees.*, messages.* FROM employees, employment, user_access, messages WHERE employees.employee_id = employment.employee_id
	AND employment.employment_id = user_access.employment_id
	AND messages.to_user = '$user_id'
	AND messages.from_user != '$user_id'
	AND messages.from_user = user_access.user_id
	ORDER BY message_date_time DESC";

	$arr = [];

	$result = $conn->query($sql);
	$messages = "";

	$msgArr = [];
	$existence = [];
	if($result->num_rows != null){
		while ($row = $result->fetch_assoc()){

			if(!in_array($row['employee_id'], $existence)){
				$existence [] = $row['employee_id'];
				$msgArr[] = "<li>
										<a href=\"#\">
											<h4 style=\"margin-left:0px\">
												".ucwords($row['employee_fname']." ".$row['employee_mname'])." ".$row['employee_lname']." ".$row['employee_ext']." 
											</h4> 
										</a>
									</li>";
			}
			// $messages .= "<li>
			// 							<a href=\"#\">
			// 								<h4 style=\"margin-left:0px\">
			// 									".ucwords($row['employee_fname']." ".$row['employee_mname'])." ".$row['employee_lname']." ".$row['employee_ext']." 
			// 								</h4> 
			// 							</a>
			// 						</li>";
		}
		echo json_encode(["msg"=>$msgArr]);
		// echo "<pre>";
		// print_r($msgArr);
	}else {
		echo json_encode(["msg"=>" "]);
	}
	$conn->close();
?>