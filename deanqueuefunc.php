<?php
include 'helperfunction.php';
$depart = $_SESSION['department_name'];
if ($depart == "ITE" || $depart == "CS") {
	echo countFunction("notif_status = 'unread' AND status_desc = 'queue for dean' AND (department_name = 'ITE' OR department_name = 'CS')", 'notif');
}elseif ($depart == "BA") {
	echo countFunction("notif_status = 'unread' AND status_desc = 'queue for dean' AND (department_name = 'BA')", 'notif');

}

?>