<?php

$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("testbank", $connection);
session_start();
$user_check = $_SESSION['login_user'];
if($user_check=="admin" OR $user_check=="print"){
	$ses_sql=mysql_query("select * from super_user where username='$user_check'", $connection);
	$row = mysql_fetch_assoc($ses_sql);
	$login_session =$row['username'];
	$id_session =$row['id'];
	$fullname_session=$row['position'];
	
	
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
	
	$ses_sql=mysql_query("SELECT employment.employee_id,user_access.user_id, user_access.username, user_access.syllabus, user_access.tq, user_access.notification, user_access.queue, user_access.reports, user_access.setdate, user_access.syllabus, user_access.position, employment.employment_id, employment.employment_status, employment.employment_job_title, employees.employee_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, department.department_id, department.department_name, department.department_status FROM user_access INNER JOIN employment ON user_access.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id WHERE username='$user_check'", $connection);
	$row = mysql_fetch_assoc($ses_sql);
	$user_id = $row['user_id'];
	$employee_id = $row['employee_id'];
	$login_session =$row['username'];
	$login_id=$row['employment_id'];
	$a=$row['employee_fname'];
	$b=$row['employee_lname'];
	$fullname_session1 = $a[0].$b[0];
	$fullname_session=utf8_encode($row['employee_fname'])." ".utf8_encode($row['employee_mname'])." ".utf8_encode($row['employee_lname'])." ".utf8_encode($row['employee_ext']);
	$fname_session=$row['employee_fname'];
	$lname_session=$row['employee_mname']." ".$row['employee_lname']." ".$row['employee_ext'];
	$syllabus_session =$row['syllabus'];
	$tq_session =$row['tq'];
	$notification_session =$row['notification'];
	$queue_session =$row['queue'];
	$reports_session =$row['reports'];
	$setdate_session =$row['setdate'];
	$position_session =$row['position'];
	$depart=$row['department_name'];
	$_SESSION['department_name']=$depart;
	$_SESSION['user_id'] = $user_id;
	$_SESSION['login_id'] =$login_id;
	$dep;
	if ($depart=="ITE" or $depart=="CS") {
          $dep ="Dean, Information Technology Education Program";
        } if ($depart=="BA") {
          $dep ="Dean, Business Education Program";
        }
		if ($syllabus_session=="checked") {
			?>
			<style type="text/css">
				#syllabus_tab{
					display: block;
				}
			</style>
			<?php
		}else{
			?>
			<style type="text/css">
				#syllabus_tab{
					display: none;
				}
			</style>
			<?php
		}
		if ($tq_session=="checked") {
			?>
			<style type="text/css">
				#tq_tab{
					display: block;
				}
			</style>
			<?php
		}else{
			?>
			<style type="text/css">
				#tq_tab{
					display: none;
				}
			</style>
			<?php
		}
		if ($notification_session=="checked") {
			?>
			<style type="text/css">
				#notification_tab{
					display: block;
				}
			</style>
			<?php
		}else{
			?>
			<style type="text/css">
				#notification_tab{
					display: none;
				}
			</style>
			<?php
		}
		if ($queue_session=="checked") {
			?>
			<style type="text/css">
				#queue_tab{
					display: block;
				}
			</style>
			<?php
		}else{
			?>
			<style type="text/css">
				#queue_tab{
					display: none;
				}
			</style>
			<?php
		}
		if ($reports_session=="checked") {
			?>
			<style type="text/css">
				#reports_tab{
					display: block;
				}
			</style>
			<?php
		}else{
			?>
			<style type="text/css">
				#reports_tab{
					display: none;
				}
			</style>
			<?php
		}
		if ($setdate_session=="checked") {
			?>
			<style type="text/css">
				#setdate_tab{
					display: block;
				}
			</style>
			<?php
		}else{
			?>
			<style type="text/css">
				#setdate_tab{
					display: none;
				}
			</style>
			<?php
		}

}

if(isset($_POST['create'])){
	$subj_id=$_POST['subj_id'];
	$subj_code=$_POST['subj_code'];
	$subj_name=$_POST['subj_name'];
	$subj_desc=$_POST['subj_desc'];
	$unit=$_POST['unit'];
}
    



if(!isset($login_session)){

mysql_close($connection);
header('Location: login.php'); 
}
?>