<?php
include('db.php');
	

	if(isset($_POST['num'])){	
		$num=$_POST['num'];
		$tqid=$_POST['tqid'];
		mysql_query("UPDATE tq SET num_copies='$num' WHERE tq_id='$tqid'");
	}
?>