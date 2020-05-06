<?php
include('db.php');
include('class.php');
$class = new testbank();
	$q_id=$_POST['qid'];
	$tq_id=$_POST['tqid'];
	if (isset($q_id)) {
		$sql="SELECT testquestions.question_desc, testquestions.points, testquestions.attachment, testquestions.cognitive_level_id, testquestions.topics_id, testquestions.test_id, question_type.question_type_name FROM testquestions INNER JOIN test_number ON testquestions.test_id = test_number.test_id INNER JOIN tq ON test_number.tq_id = tq.tq_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE testquestions.q_id = '".$q_id."' "; 
		$result = mysql_query($sql);
		while($row=mysql_fetch_array($result)){
			$question_desc=$row['question_desc'];
			$points=$row['points'];
			$attachment=$row['attachment'];
			$cognitive_level_id=$row['cognitive_level_id'];
			$tpid=$row['topics_id'];
			$topics_id=$class->gettopicid($tpid,$tq_id);
			$question_type_name=$row['question_type_name'];
			$sql1="SELECT Max(testquestions.number) AS max FROM testquestions INNER JOIN test_number ON testquestions.test_id = test_number.test_id INNER JOIN tq ON test_number.tq_id = tq.tq_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE '".$question_type_name."' AND tq.tq_id ='".$tq_id."' "; 	
			$result1 = mysql_query($sql1);
			while ($rw=mysql_fetch_array($result1)) {
				$number=$rw['max'];
				if ($number==0) {
					$number++;
					$sql2="SELECT test_number.test_number, test_number.test_id FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE '".$question_type_name."' AND tq.tq_id ='".$tq_id."' ";		
					$result2 = mysql_query($sql2);
					while($row2=mysql_fetch_array($result2)){
						$test_number=$row2['test_number'];
						$tid=$row2['test_id'];
					}
					if (!$test_number) {
						$sql3="SELECT Max(test_number.test_number) AS maxtn FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id WHERE tq.tq_id ='".$tq_id."' ";		
						$result3 = mysql_query($sql3);
						while($row3=mysql_fetch_array($result3)){
							$maxtn=$row3['maxtn'];
							$maxtn++;
						}
						$insert = "INSERT INTO `test_number` (`test_number`,`test_desc`, `tq_id`) VALUES ('".$maxtn."','Edit Me','".$tq_id."')";
						$insertres=mysql_query($insert) or die("Query insert test_number: ".mysql_error());
						$tid=mysql_insert_id();
						$inserts2 = "INSERT INTO `question_type` (`question_type_id`, `question_type_name`, `test_id`) VALUES ('','".$question_type_name."','".$tid."')";
            			$insertress2=mysql_query($inserts2) or die("Query Failed INSERT INTO `question_type`: ".mysql_error());
						$inset2 = "INSERT INTO `testquestions` (`number`, `question_desc`, `points`, `attachment`, `cognitive_level_id`, `topics_id`, `test_id`) VALUES ('".$number."','".$question_desc."','".$points."','".$attachment."','".$cognitive_level_id."','".$topics_id."','".$tid."')";
						$insertres2=mysql_query($inset2) or die("Query Failed1 : ".mysql_error());
						$qid=mysql_insert_id();
						$inserte4 = "INSERT INTO `question_status` (`status`, `q_id`) VALUES ('checked','".$qid."')";
                		$insertrese4=mysql_query($inserte4) or die("Query Failed INSERT INTO `question_status`: ".mysql_error());
						$sql5="SELECT answer_choices.ac_id, answer_choices.answer_choice_desc, answer_choices.q_id FROM answer_choices WHERE answer_choices.q_id ='".$q_id."'";
						$result5 = mysql_query($sql5);
						while($row5=mysql_fetch_array($result5)){
							$ac_id1=$row5['ac_id'];
							$answer_choice_desc=$row5['answer_choice_desc'];
							$inset3 = "INSERT INTO `answer_choices` (`answer_choice_desc`, `q_id`) VALUES ('".$answer_choice_desc."','".$qid."')";
							$insertres3=mysql_query($inset3) or die("Query Failed1 : ".mysql_error());
						}
						$sql6="SELECT answer.answer_desc FROM answer WHERE answer.q_id ='".$q_id."'";
						$result6 = mysql_query($sql6);
						while($row6=mysql_fetch_array($result6)){
							$answer_desc=$row6['answer_desc'];
							$inset6 = "INSERT INTO `answer` (`answer_desc`, `q_id`) VALUES ('".$answer_desc."','".$qid."')";
							$insertres6=mysql_query($inset6) or die("Query Failed1 : ".mysql_error());
						}
						$inset7 = "INSERT INTO `question_status` (`status`, `q_id`) VALUES ('checked','".$qid."')";
						$insertres7=mysql_query($inset7) or die("Query Failed1 : ".mysql_error());

					}else{
						$inset2 = "INSERT INTO `testquestions` (`number`, `question_desc`, `points`, `attachment`, `cognitive_level_id`, `topics_id`, `test_id`) VALUES ('".$number."','".$question_desc."','".$points."','".$attachment."','".$cognitive_level_id."','".$topics_id."','".$tid."')";
						$insertres2=mysql_query($inset2) or die("Query Failed1 : ".mysql_error());
						$qid=mysql_insert_id();
						$inserte4 = "INSERT INTO `question_status` (`status`, `q_id`) VALUES ('checked','".$qid."')";
                		$insertrese4=mysql_query($inserte4) or die("Query Failed INSERT INTO `question_status`: ".mysql_error());
						$sql5="SELECT answer_choices.ac_id, answer_choices.answer_choice_desc, answer_choices.q_id FROM answer_choices WHERE answer_choices.q_id ='".$q_id."'";
						$result5 = mysql_query($sql5);
						while($row5=mysql_fetch_array($result5)){
							$ac_id1=$row5['ac_id'];
							$answer_choice_desc=$row5['answer_choice_desc'];
							$inset3 = "INSERT INTO `answer_choices` (`answer_choice_desc`, `q_id`) VALUES ('".$answer_choice_desc."','".$qid."')";
							$insertres3=mysql_query($inset3) or die("Query Failed1 : ".mysql_error());
						}
						$sql6="SELECT answer.answer_desc FROM answer WHERE answer.q_id ='".$q_id."'";
						$result6 = mysql_query($sql6);
						while($row6=mysql_fetch_array($result6)){
							$answer_desc=$row6['answer_desc'];
							$inset6 = "INSERT INTO `answer` (`answer_desc`, `q_id`) VALUES ('".$answer_desc."','".$qid."')";
							$insertres6=mysql_query($inset6) or die("Query Failed1 : ".mysql_error());
						}
						$inset7 = "INSERT INTO `question_status` (`status`, `q_id`) VALUES ('checked','".$qid."')";
						$insertres7=mysql_query($inset7) or die("Query Failed1 : ".mysql_error());
					}
					
				}else{
					$number++;
					$sql2a="SELECT test_number.test_number, test_number.test_id FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE '".$question_type_name."' AND tq.tq_id ='".$tq_id."' ";		
						$result2a = mysql_query($sql2a);
						while($row2=mysql_fetch_array($result2a)){
							$test_number=$row2['test_number'];
							$tid=$row2['test_id'];
						

						}
						$insert1 = "INSERT INTO `testquestions` (`number`, `question_desc`, `points`, `attachment`, `cognitive_level_id`, `topics_id`, `test_id`) VALUES ('".$number."','".$question_desc."','".$points."','".$attachment."','".$cognitive_level_id."','".$topics_id."','".$tid."')";
						$insertres1=mysql_query($insert1) or die("Query insert TestQuestions2: ".mysql_error());
						$qid=mysql_insert_id();
						$inserte4 = "INSERT INTO `question_status` (`status`, `q_id`) VALUES ('checked','".$qid."')";
                		$insertrese4=mysql_query($inserte4) or die("Query Failed INSERT INTO `question_status`: ".mysql_error());
						$sql5="SELECT answer_choices.ac_id, answer_choices.answer_choice_desc, answer_choices.q_id FROM answer_choices WHERE answer_choices.q_id ='".$q_id."'";
						$result5 = mysql_query($sql5);
						while($row5=mysql_fetch_array($result5)){
							$ac_id1=$row5['ac_id'];
							$answer_choice_desc=$row5['answer_choice_desc'];
							$inset3 = "INSERT INTO `answer_choices` (`answer_choice_desc`, `q_id`) VALUES ('".$answer_choice_desc."','".$qid."')";
							$insertres3=mysql_query($inset3) or die("Query Failed1 : ".mysql_error());
						}
						$sql6="SELECT answer.answer_desc FROM answer WHERE answer.q_id ='".$q_id."'";
						$result6 = mysql_query($sql6);
						while($row6=mysql_fetch_array($result6)){
							$answer_desc=$row6['answer_desc'];
							$inset6 = "INSERT INTO `answer` (`answer_desc`, `q_id`) VALUES ('".$answer_desc."','".$qid."')";
							$insertres6=mysql_query($inset6) or die("Query Failed1 : ".mysql_error());
						}
						$inset7 = "INSERT INTO `question_status` (`status`, `q_id`) VALUES ('checked','".$qid."')";
						$insertres7=mysql_query($inset7) or die("Query Failed1 : ".mysql_error());
				}
			}
			
		}
		echo "<script type='text/javascript'>alert('Successfully Copied');'</script>";	
	}
	

?>