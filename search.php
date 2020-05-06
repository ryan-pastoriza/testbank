<?php
include('db.php');
if($_POST){

	$q=$_POST['search'];
	$w=$_POST['cognitive'];
	$e=$_POST['topic'];
	$r=$_POST['ttype'];

	if ($w!='' AND $e!='') {
		$sql_res=mysql_query("SELECT testquestions.question_desc FROM testquestions INNER JOIN test_number ON test_number.test_id = testquestions.test_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id INNER JOIN tq ON test_number.tq_id = tq.tq_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id WHERE question_type.question_type_name = '$r' AND tqstatus.status_desc = 'printed' AND cognitive_level_id='$w' AND topics_id='$e' AND question_desc LIKE '%{$q}%'");
	}else if ($w!='' AND empty($e)) {
		$sql_res=mysql_query("SELECT testquestions.question_desc FROM testquestions INNER JOIN test_number ON test_number.test_id = testquestions.test_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id INNER JOIN tq ON test_number.tq_id = tq.tq_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id WHERE question_type.question_type_name = '$r' AND tqstatus.status_desc = 'printed' AND cognitive_level_id='$w' AND question_desc LIKE '%{$q}%'");
	}else if ($e!='' AND empty($w)) {
		$sql_res=mysql_query("SELECT testquestions.question_desc FROM testquestions INNER JOIN test_number ON test_number.test_id = testquestions.test_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id INNER JOIN tq ON test_number.tq_id = tq.tq_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id WHERE question_type.question_type_name = '$r' AND tqstatus.status_desc = 'printed' topics_id='$e' AND question_desc LIKE '%{$q}%'");
	}else{
		$sql_res=mysql_query("SELECT testquestions.question_desc FROM testquestions INNER JOIN test_number ON test_number.test_id = testquestions.test_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id INNER JOIN tq ON test_number.tq_id = tq.tq_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id WHERE question_type.question_type_name = '$r' AND tqstatus.status_desc = 'printed' AND question_desc LIKE '%{$q}%'");
	}



		// echo "<script type='text/javascript'>alert('$q $w $e');</script>";
	
	if (!$sql_res) {
		die(mysql_error());
	}else{
		while($row=mysql_fetch_array($sql_res)){	
	$array = $row['question_desc'];

	?>
	<div class="show" align="left">
	<b class="name"><?php echo $array; ?></b>
	</div>
	<?php
	}
	}
	
}
?>
