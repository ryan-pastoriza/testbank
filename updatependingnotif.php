<?php
include 'helperfunction.php';
echo updateFunction("notif","notif_status = 'read'", "late = 'no' AND revise_count = 0 AND (status_desc = 'queue for ph' OR status_desc = 'queue for dean')");
?>