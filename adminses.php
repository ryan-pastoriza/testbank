<?php
$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("testbank", $connection);
session_start();
$user_check=$_SESSION['login_user'];
if($user_check=="admin"){
	$ses_sql=mysql_query("select * from super_user where username='$user_check'", $connection);
	$row = mysql_fetch_assoc($ses_sql);
	$login_session =$row['username'];
	$id_session =$row['id'];
	
// }else{
// 	$ses_sql=mysql_query("select * from user_access where username='$user_check'", $connection);
// 	$row = mysql_fetch_assoc($ses_sql);
// 	$login_session =$row['username'];
// 	$syllabus_session =$row['syllabus'];
// 	$tq_session =$row['tq'];
// 	$notification_session =$row['notification'];
// 	$queue_session =$row['queue'];
// 	$reports_session =$row['reports'];
// 	$setdate_session =$row['setdate'];
}else{
	$ses_sql=mysql_query("select * from user_access where username='$user_check'", $connection);
	$row = mysql_fetch_assoc($ses_sql);
	$login_session =$row['username'];
	$syllabus_session =$row['syllabus'];
	$tq_session =$row['tq'];
	$notification_session =$row['notification'];
	$queue_session =$row['queue'];
	$reports_session =$row['reports'];
	$setdate_session =$row['setdate'];
	$position_session =$row['position'];

}

if(!isset($login_session)){
mysql_close($connection);
header('Location: login.php'); 
}
?>