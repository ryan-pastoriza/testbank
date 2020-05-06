<?php
include 'helperfunction.php';
$hate = $_SESSION['login_user'];
echo updateFunction("user_messages","`message_status` = 'read'", "username = '$hate'");
?>