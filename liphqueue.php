<?php
include 'helperfunction.php';
$depart = $_SESSION['department_name'];
if($depart == "ITE") {
  echo liFunction("status_desc = 'queue for ph' AND (department_name = 'ITE')", 'notif');
}elseif ($depart == "CS") {
  echo liFunction("status_desc = 'queue for ph' AND (department_name = 'CS')", 'notif');
}elseif ($depart == "BA") {
  echo liFunction("status_desc = 'queue for ph' AND (department_name = 'BA')", 'notif');
}
?>