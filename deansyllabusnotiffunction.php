<?php
include 'helperfunction.php';
$depart = $_SESSION['department_name'];
if ($depart == 'ITE' || $depart == 'CS') {
	echo deanSyllabusNotifFunction("syll_status='unread' AND syll_status_desc = 'queue for dean' AND (department = 'ITE' OR department= 'CS')", 'syll');
}else if ($depart == 'BA') {
	echo deanSyllabusNotifFunction("syll_status='unread' AND syll_status_desc = 'queue for dean' AND department = 'BA'", 'syll');
}else if ($depart == 'SHS') {
	echo deanSyllabusNotifFunction("syll_status='unread' AND syll_status_desc = 'queue for dean' AND department = 'SHS'", 'syll');
}else if ($depart == 'GEN') {
	echo deanSyllabusNotifFunction("syll_status='unread' AND syll_status_desc = 'queue for dean' AND department = 'GEN'", 'syll');
}
?>