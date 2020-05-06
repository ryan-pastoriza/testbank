<?php
include 'helperfunction.php';
$hate = $_SESSION['login_user'];
echo liFunction("username = '$hate' AND revise_count > 0 AND (status_desc = 'queue for ph' OR status_desc = 'queue for dean')", 'notif'); 
?>