<?php
include 'helperfunction.php';
$hate = $_SESSION['login_user'];
echo liFunction("username = '$hate' AND status_desc = 'for printing'", 'notif');
?>