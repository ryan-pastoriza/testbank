<?php
include 'helperfunction.php';
$hate = $_SESSION['login_user'];
echo countFunction("username = '$hate' AND revise_count > 0 AND notif_status = 'unread' AND (status_desc = 'queue for ph' OR status_desc = 'queue for dean')", 'notif');
?>