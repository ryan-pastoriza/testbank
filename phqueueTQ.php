<?php
include 'helperfunction.php';
$depart = $_SESSION['department_name'];
$hate = $_SESSION['login_user'];
$id=$_SESSION['login_id'];
$queue = countFunction("notif_status='unread' AND status_desc = 'queue for ph'", 'notif');
$liqueue = liFunction("status_desc = 'queue for ph'", 'notif');

$printed = countFunction("username = '$hate' AND status_desc = 'printed' AND notif_status='unread'", 'notif');
$revise = countFunction("username = '$hate' AND revise_count > 0 AND notif_status = 'unread' AND (status_desc = 'pending')", 'notif');
$approved = countFunction("username = '$hate' AND status_desc = 'for printing' AND notif_status = 'unread'", 'notif');
$syllapp =  syllabusCountFunction("username = '$hate' AND (syll_status_desc = 'approved') AND syll_status = 'unread'", "syll");
$syllrev =  syllabusCountFunction("username = '$hate' AND (syll_status_desc = 'pending' AND syll_rev_count > 0) AND syll_status = 'unread'", "syll");

$liprinted = liFunction("username = '$hate' AND status_desc = 'printed'", 'notif');
$liapproved = liFunction("username = '$hate' AND status_desc = 'for printing'", 'notif');
$lirevise = liFunction("username = '$hate' AND revise_count > 0 AND (status_desc = 'pending')", 'notif'); 
$Lisyllapp = syllabusLiFunction("username = '$hate' AND (syll_status_desc = 'approved')", "syll");
$Lisyllrev = syllabusLiFunction("username = '$hate' AND (syll_status_desc = 'pending' AND syll_rev_count > 0)", "syll");

$result = [
	'phqueueTQ' => [
		'count' => $queue,
		'message' => $liqueue
	],
	'syllapp' => [
		'count' => $syllapp,
		'message' => $Lisyllapp
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
	'revise' => [
		'count' => $revise,
		'message' => $lirevise
	]
];

echo json_encode($result);
?>