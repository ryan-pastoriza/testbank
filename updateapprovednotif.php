<?php
include 'helperfunction.php';
echo updateFunction("notif","`notif_status` = 'read'", "status_desc = 'for printing'");
?>