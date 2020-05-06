<?php
include 'helperfunction.php';
$depart = $_SESSION['department_name'];
if ($depart == "ITE" || $depart == "CS") {
	echo updateSyllabusNotifFunction("syll","syll_status = 'read'","syll_status_desc = 'queue for dean' AND (department_name = 'ITE' OR department_name = 'CS')");
}else {
	echo updateSyllabusNotifFunction("syll","syll_status = 'read'","syll_status_desc = 'queue for dean' AND (department_name = 'BA')");
}else{
	echo updateSyllabusNotifFunction("syll","syll_status = 'read'","syll_status_desc = 'queue for dean' AND (department_name = 'SHS' OR department_name = 'GEN')");
}
?>