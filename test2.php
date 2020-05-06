<?php
include('db.php');

	//$num=1;
	//$qt="Enumeration";
	//$tq=1;

	 $num=$_POST['num'];
	 $qt=$_POST['tt'];
	 $tq=$_POST['tq_id'];

		$sql_res=mysql_query("SELECT testquestions.question_desc, testquestions.points, testquestions.cognitive_level_id, testquestions.topics_id, testquestions.q_id FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id WHERE question_type.question_type_name = '$qt' AND tq.tq_id = '$tq' AND testquestions.number = '$num' ");
		
		$data = array();
		while($row = mysql_fetch_array($sql_res)){
			$q_id=$row['q_id'];
			$sql_res1=mysql_query("SELECT answer.answer_desc FROM answer WHERE answer.q_id ='$q_id'");
			$r=mysql_num_rows($sql_res1);
			$num=1;
			$answer = array();
				while($rows = mysql_fetch_array($sql_res1)){

					$answer[]= $rows['answer_desc'];
					
				}
		$data[]=['question_desc'=>$row['question_desc'], 'points'=>$row['points'], 'cognitive_level_id'=>$row['cognitive_level_id'], 'topics_id'=>$row['topics_id'],'answer'=>$answer];
		}      
        

	echo json_encode($data);
	

?>
