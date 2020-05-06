<?php
include('db.php');

	$num=$_POST['num'];
	$qt=$_POST['tt'];
	$tq=$_POST['tq_id'];

		$sql_res=mysql_query("SELECT
testquestions.question_desc,
testquestions.points,
testquestions.cognitive_level_id,
testquestions.topics_id,
answer.answer_desc,
tq.tq_id,
testquestions.number,
question_type.question_type_name
FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN answer ON answer.q_id = testquestions.q_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id
WHERE question_type.question_type_name = 'Identification' AND tq.tq_id = 1 AND testquestions.number = 1");
	
		$data = array();
		while($row = mysql_fetch_array($sql_res)){
			$a=$row['question_desc'];
			$b=$row['points'];
			$c=$row['cognitive_level_id'];
			$d=$row['topics_id'];
			$e=$row['answer_desc'];
		$data[]=array('question_desc'=>$a, 'points'=>$b, 'cognitive_level_id'=>$c, 'topics_id'=>$d, 'answer_desc'=>$e);
		}      
        

	echo json_encode($data);
	

?>
