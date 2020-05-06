<?php
include 'helperfunction.php';
$id=$_SESSION['login_id'];
echo countFunction("notif_status='unread' AND (status_desc = 'queue for ph".$id."')", 'notif');
?>