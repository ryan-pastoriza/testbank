<?php
include 'helperfunction.php';
echo updateFunction("tqstatus","`notif_status` = 'read'", "revise_count > 0");
?>