<?php
include 'helperfunction.php';
$hate = $_SESSION['login_user'];
echo updateDeanSyllabusNotifFunction("syll","syll_status = 'read'", "username = '$hate' AND syll_status_desc = 'pending'");
?>