<?php
include 'helperfunction.php';
$hate = $_SESSION['login_user'];
echo liFunction("username = '$hate' AND late = 'yes' AND revise_count = 0 AND (status_desc = 'queue for dean' OR status_desc = 'queue for ph')", 'notif');
?>