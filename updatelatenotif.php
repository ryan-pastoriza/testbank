<?php
include 'helperfunction.php';
echo updateFunction("notif","`notif_status` = 'read'", "late = 'yes' AND revise_count = 0");
?>