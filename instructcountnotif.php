<?php
include 'helperfunction.php';
$addsubyear=date("Y");
$addsubmonth=date("F");
if ($addsubmonth=="May" or$addsubmonth=="June" or $addsubmonth=="July" or $addsubmonth=="August" or $addsubmonth=="September" or $addsubmonth=="October" or $addsubmonth=="November" or $addsubmonth=="December"){
    $addsubyear1=$addsubyear;
    $addsubyear2=$addsubyear+1;
    
    if ($addsubmonth=="May" or$addsubmonth=="June" or $addsubmonth=="July" or $addsubmonth=="August" or $addsubmonth=="September" or $addsubmonth=="October"){
		$sem="1st";
    }else{
    	$sem="2nd";
    }
}else{
    $addsubyear1=$addsubyear-1;
    $addsubyear2=$addsubyear;
    if ($addsubmonth=="May" or$addsubmonth=="June" or $addsubmonth=="July" or $addsubmonth=="August" or $addsubmonth=="September" or $addsubmonth=="October"){
		$sem="1st";
    }else{
    	$sem="2nd";
    }
}
$sy=$addsubyear1."-".$addsubyear2;
$user_id = $_SESSION['user_id'];

$printed = countFunction("user_id = '$user_id' AND status_desc = 'printed' AND notif_status='unread' AND sy = '$sy' AND semester = '$sem'", 'notif');
$revise = countFunction("user_id = '$user_id' AND revise_count > 0 AND notif_status = 'unread' AND (status_desc = 'pending' AND sy = '$sy' AND semester = '$sem')", 'notif');
$approved = countFunction("user_id = '$user_id' AND status_desc = 'for printing' AND notif_status = 'unread'", 'notif');
$syllapp =  syllabusCountFunction("user_id = '$user_id' AND (syll_status_desc = 'approved' AND sy = '$sy' AND semester = '$sem') AND syll_status = 'unread'", "syll");
$syllrev =  syllabusCountFunction("user_id = '$user_id' AND (syll_status_desc = 'pending' AND syll_rev_count > 0 AND sy = '$sy' AND semester = '$sem') AND syll_status = 'unread'", "syll");

$liprinted = liFunction("user_id = '$user_id' AND status_desc = 'printed' AND sy = '$sy' AND semester = '$sem'", "notif");
$liapproved = liFunction("user_id = '$user_id' AND status_desc = 'for printing' AND sy = '$sy' AND semester = '$sem'" , "notif");
$lirevise = liFunction("user_id = '$user_id' AND revise_count > 0 AND (status_desc = 'pending' AND sy = '$sy' AND semester = '$sem')", "notif"); 
$Lisyllapp = syllabusLiFunction("user_id = '$user_id' AND (syll_status_desc = 'approved' AND sy = '$sy' AND semester = '$sem')", "syll");
$Lisyllrev = syllabusLiFunction("user_id = '$user_id' AND (syll_status_desc = 'pending' AND syll_rev_count > 0 AND sy = '$sy' AND semester = '$sem')", "syll");

$result = [
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