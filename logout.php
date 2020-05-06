<?php
$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("testbank", $connection);
session_start();
$username=$_SESSION["login_user"];
$id=$_SESSION['login_user_id'];
if ($username=="admin" OR $username=="print") {
	$query1 = "UPDATE super_user SET status='offline' WHERE username='".$username."' AND id='".$id."'";
    if (mysql_query($query1)) {
    	session_destroy();
		header("Location: login.php");
	}
}else{
	$query1 = "UPDATE user_access SET status='offline' WHERE username='".$username."' AND user_id='".$id."'";
    if (mysql_query($query1)) {
    	session_destroy();
		header("Location: login.php");
	}
}



?>