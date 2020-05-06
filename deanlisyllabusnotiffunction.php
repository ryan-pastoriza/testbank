 <?php
include 'helperfunction.php';
$depart = $_SESSION['department_name'];
if ($depart == "ITE" || $depart == "CS") {
	echo syllabusLiFunction("syll_status_desc = 'queue for dean' AND (department_name = 'ITE' OR department_name = 'CS')", 'syll');
}elseif ($depart == "BA") {
	echo syllabusLiFunction("syll_status_desc = 'queue for dean' AND (department_name = 'BA')", 'syll');
}
?>