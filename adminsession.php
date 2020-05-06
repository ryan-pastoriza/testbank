<?php
include('login2.php');
		$connection = mysql_connect("localhost","root","");

		$db = mysql_select_db("testbank",$connection);

		$user_check = $_SESSION['login_user'];

		$ses_sql = mysql_query("select * from super_user where username='$user_check'", $connection);

		$row = mysql_fetch_assoc($ses_sql);

		$login_session = $row['username'];

		if(!isset($login_session)){

			mysql_close($connection);
			header('location:login.php');

		}
		if(empty($user_check)){
			header('location:login.php');
						mysql_close($connection);

			}


	?>		
