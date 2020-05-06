<?php
include 'helperfunction.php';
$depart = $_SESSION['department_name'];
$id=$_SESSION['login_id'];
  echo countFunction("notif_status = 'unread' AND status_desc = 'queue for ph' AND ph = '".$id."'", 'notif');
?>