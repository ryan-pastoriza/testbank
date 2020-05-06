<?php
include 'helperfunction.php';
$depart = $_SESSION['department_name'];
$hate = $_SESSION['login_user'];
if ($depart == "ITE" || $depart == "CS") {
	$deanqueueTQ = countFunction("notif_status = 'unread' AND status_desc = 'queue for dean' AND (department_name = 'ITE' OR department_name = 'CS')", 'notif');
	$LideanqueueTQ = LiFunction("status_desc = 'queue for dean' AND (department_name = 'ITE' OR department_name ='CS')", 'notif');
	$deanqueueSYLL = deanSyllabusNotifFunction("syll_status='unread' AND syll_status_desc = 'queue for dean' AND (department_name = 'ITE' OR department_name ='CS')", 'syll');
	$LideanqueueSYLL = deanSyllabusLiFunction("syll_status_desc = 'queue for dean' AND (department_name = 'ITE' OR department_name = 'CS')", 'syll');
}elseif ($depart == "BA") {
	$deanqueueTQ = countFunction("notif_status = 'unread' AND status_desc = 'queue for dean' AND (department_name = 'BA')", 'notif');
	$LideanqueueTQ = LiFunction("status_desc = 'queue for dean' AND (department_name = 'BA')", 'notif');
	$deanqueueSYLL = deanSyllabusNotifFunction("syll_status='unread' AND syll_status_desc = 'queue for dean' AND (department_name = 'BA')", 'syll');
	$LideanqueueSYLL = deanSyllabusLiFunction("syll_status_desc = 'queue for dean' AND (department_name = 'BA')", 'syll');
}elseif ($depart == "SHS" || $depart == "GEN") {
	$deanqueueTQ = countFunction("notif_status = 'unread' AND status_desc = 'queue for dean' AND (department_name = 'SHS' OR department_name = 'GEN')", 'notif');
	$LideanqueueTQ = LiFunction("status_desc = 'queue for dean' AND (department_name = 'SHS' OR department_name ='GEN')", 'notif');
	$deanqueueSYLL = deanSyllabusNotifFunction("syll_status='unread' AND syll_status_desc = 'queue for dean' AND (department_name = 'SHS' OR department_name ='GEN')", 'syll');
	$LideanqueueSYLL = deanSyllabusLiFunction("syll_status_desc = 'queue for dean' AND (department_name = 'SHS' OR department_name = 'GEN')", 'syll');
}

$printed = countFunction("username = '$hate' AND status_desc = 'printed' AND notif_status='unread'", 'notif');
$pending = countFunction("username = '$hate' AND late = 'no' AND notif_status='unread' AND (status_desc = 'pending') AND (revise_count = 0)", 'notif');
$revise = countFunction("username = '$hate' AND revise_count > 0 AND notif_status = 'unread' AND (status_desc = 'pending')", 'notif');
$approved = countFunction("username = '$hate' AND status_desc = 'for printing' AND notif_status = 'unread'", 'notif');
$late = countFunction("username = '$hate' AND notif_status = 'unread' AND late = 'yes' AND revise_count = 0 AND (status_desc = 'pending')", 'notif');
$syllapp =  syllabusCountFunction("username = '$hate' AND (syll_status_desc = 'approved') AND syll_status = 'unread'", "syll");
$syllpen =  syllabusCountFunction("username = '$hate' AND (syll_status_desc = 'pending') AND syll_status = 'unread'", "syll");
$syllrev =  syllabusCountFunction("username = '$hate' AND (syll_status_desc = 'pending' AND syll_rev_count > 0) AND syll_status = 'unread'", "syll");

$liprinted = liFunction("username = '$hate' AND status_desc = 'printed'", 'notif');
$liapproved = liFunction("username = '$hate' AND status_desc = 'for printing'", 'notif');
$lipending = liFunction("username = '$hate' AND revise_count = 0 AND late = 'no' AND (status_desc = 'pending')", 'notif');
$lirevise = liFunction("username = '$hate' AND revise_count > 0 AND (status_desc = 'pending')", 'notif'); 
$lilate = liFunction("username = '$hate' AND late = 'yes' AND revise_count = 0 AND (status_desc = 'pending')", 'notif');
$Lisyllapp = syllabusLiFunction("username = '$hate' AND (syll_status_desc = 'approved')", "syll");
$Lisyllpen = syllabusLiFunction("username = '$hate' AND (syll_status_desc = 'pending')", "syll");
$Lisyllrev = syllabusLiFunction("username = '$hate' AND (syll_status_desc = 'pending' AND syll_rev_count > 0)", "syll");
$result = [
	'syllapp' => [
		'count' => $syllapp,
		'message' => $Lisyllapp
	],
	'syllpen' => [
		'count' => $syllpen,
		'message' => $Lisyllpen
	],
	'syllrev' => [
		'count' => $syllrev,
		'message' => $Lisyllrev
	],
	'printed' => [
		'count' => $printed,
		'message' => $liprinted
	],
	'approved' => [
		'count' => $approved,
		'message' => $liapproved
	],
	'pending' => [
		'count' => $pending,
		'message' => $lipending
	],
	'revise' => [
		'count' => $revise,
		'message' => $lirevise
	],
	'late' => [
		'count' => $late,
		'message' => $lilate
	],
	'deanqueueTQ' => [
		'count' => $deanqueueTQ,
		'message' => $LideanqueueTQ
	],
	'deanqueueSYLL' => [
		'count' => $deanqueueSYLL,
		'message' => $LideanqueueSYLL
	]
];
echo json_encode($result);
?>