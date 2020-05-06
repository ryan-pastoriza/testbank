<?php
include 'helperfunction.php';
$depart = $_SESSION['department_name'];
$id= $_SESSION['login_id'];
	echo updateFunction("notif","`notif_status` = 'read'", "status_desc = 'queue for dean'");
?>