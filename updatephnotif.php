<?php
include 'helperfunction.php';
$depart = $_SESSION['department_name'];
if($depart == "ITE"){
	echo updateFunction("notif","`notif_status` = 'read'", "status_desc = 'queue for ph' AND (department_name = 'ITE')");
}elseif($depart == "CS"){
	echo updateFunction("notif","`notif_status` = 'read'", "status_desc = 'queue for ph' AND (department_name = 'CS')");
}elseif($depart == "BA"){
	echo updateFunction("notif","`notif_status` = 'read'", "status_desc = 'queue for ph' AND (department_name = 'BA')");
}
?>