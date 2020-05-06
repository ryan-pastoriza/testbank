<?php
include('db.php');
include('class.php');
$class = new testbank();
	$q_id=$_POST['qid'];
	$tq_id=$_POST['tqid'];
	$syll=$_POST['syll'];
	if (isset($q_id)) {
		$sql="SELECT shs_testquestions.shs_question_desc, shs_testquestions.shs_points, shs_testquestions.shs_attachment, shs_testquestions.cognitive_level_id, shs_testquestions.shs_topics_id, shs_testquestions.shs_test_id, shs_question_type.shs_question_type_name FROM shs_testquestions INNER JOIN shs_test_number ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id INNER JOIN shs_tq ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_syll ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_question_type ON shs_question_type.shs_test_id = shs_test_number.shs_test_id WHERE shs_testquestions.shs_q_id ='".$q_id."' "; 
		$result = mysql_query($sql);
		while($row=mysql_fetch_array($result)){
			$question_desc=$row['shs_question_desc'];
			$points=$row['shs_points'];
			$attachment=$row['shs_attachment'];
			$cognitive_level_id=$row['cognitive_level_id'];
			$topics_id=$row['shs_topics_id'];
			$question_type_name=$row['shs_question_type_name'];
			$sql1="SELECT Max(shs_testquestions.shs_number) AS max FROM shs_testquestions INNER JOIN shs_test_number ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id INNER JOIN shs_tq ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_question_type ON shs_question_type.shs_test_id = shs_test_number.shs_test_id WHERE shs_question_type.shs_question_type_name LIKE '".$question_type_name."' AND shs_tq.shs_tq_id ='".$tq_id."' "; 	
			$result1 = mysql_query($sql1);
			while ($rw=mysql_fetch_array($result1)) {
				$number=$rw['max'];
				if ($number==0) {
					$number++;
					$sql2="SELECT shs_test_number.shs_test_number, shs_test_number.shs_test_id FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_question_type ON shs_question_type.shs_test_id = shs_test_number.shs_test_id WHERE shs_question_type.shs_question_type_name LIKE '".$question_type_name."' AND shs_tq.shs_tq_id ='".$tq_id."' ";		
					$result2 = mysql_query($sql2);
					while($row2=mysql_fetch_array($result2)){
						$test_number=$row2['shs_test_number'];
						$tid=$row2['shs_test_id'];
					}
					if (!$test_number) {
						$sql3="SELECT Max(shs_test_number.shs_test_number) AS maxtn FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id WHERE shs_tq.shs_tq_id ='".$tq_id."' ";		
						$result3 = mysql_query($sql3);
						while($row3=mysql_fetch_array($result3)){
							$maxtn=$row3['maxtn'];
							$maxtn++;
						}
						$insert = "INSERT INTO `shs_test_number` (`shs_test_number`,`shs_test_desc`, `shs_tq_id`) VALUES ('".$maxtn."','Edit Me','".$tq_id."')";
						$insertres=mysql_query($insert) or die("Query insert test_number: ".mysql_error());
						$tid=mysql_insert_id();
						$inserts2 = "INSERT INTO `shs_question_type` (`shs_question_type_id`, `shs_question_type_name`, `shs_test_id`) VALUES ('','".$question_type_name."','".$tid."')";
            			$insertress2=mysql_query($inserts2) or die("Query Failed INSERT INTO `question_type`: ".mysql_error());
						$inset2 = "INSERT INTO `shs_testquestions` (`shs_number`, `shs_question_desc`, `shs_points`, `shs_attachment`, `cognitive_level_id`, `shs_topics_id`, `shs_test_id`) VALUES ('".$number."','".$question_desc."','".$points."','".$attachment."','".$cognitive_level_id."','".$topics_id."','".$tid."')";
						$insertres2=mysql_query($inset2) or die("Query Failed1 : ".mysql_error());
						$qid=mysql_insert_id();
						$inserte4 = "INSERT INTO `shs_question_status` (`shs_status`, `shs_q_id`) VALUES ('checked','".$qid."')";
                		$insertrese4=mysql_query($inserte4) or die("Query Failed INSERT INTO `question_status`: ".mysql_error());
						$sql5="SELECT shs_answer_choices.shs_ac_id, shs_answer_choices.shs_answer_choice_desc, shs_answer_choices.shs_q_id FROM shs_answer_choices WHERE shs_answer_choices.shs_q_id ='".$q_id."'";
						$result5 = mysql_query($sql5);
						while($row5=mysql_fetch_array($result5)){
							$ac_id1=$row5['shs_ac_id'];
							$answer_choice_desc=$row5['shs_answer_choice_desc'];
							$inset3 = "INSERT INTO `shs_answer_choices` (`shs_answer_choice_desc`, `shs_q_id`) VALUES ('".$answer_choice_desc."','".$qid."')";
							$insertres3=mysql_query($inset3) or die("Query Failed1 : ".mysql_error());
						}
						$sql6="SELECT shs_answer.shs_answer_desc FROM shs_answer WHERE shs_answer.shs_q_id ='".$q_id."'";
						$result6 = mysql_query($sql6);
						while($row6=mysql_fetch_array($result6)){
							$answer_desc=$row6['shs_answer_desc'];
							$inset6 = "INSERT INTO `shs_answer` (`shs_answer_desc`, `shs_q_id`) VALUES ('".$answer_desc."','".$qid."')";
							$insertres6=mysql_query($inset6) or die("Query Failed1 : ".mysql_error());
						}
						$inset7 = "INSERT INTO `shs_question_status` (`shs_status`, `shs_q_id`) VALUES ('checked','".$qid."')";
						$insertres7=mysql_query($inset7) or die("Query Failed1 : ".mysql_error());

					}else{
						$inset2 = "INSERT INTO `shs_testquestions` (`shs_number`, `shs_question_desc`, `shs_points`, `shs_attachment`, `cognitive_level_id`, `shs_topics_id`, `shs_test_id`) VALUES ('".$number."','".$question_desc."','".$points."','".$attachment."','".$cognitive_level_id."','".$topics_id."','".$tid."')";
						$insertres2=mysql_query($inset2) or die("Query Failed1 : ".mysql_error());
						$qid=mysql_insert_id();
						$inserte4 = "INSERT INTO `shs_question_status` (`shs_status`, `shs_q_id`) VALUES ('checked','".$qid."')";
                		$insertrese4=mysql_query($inserte4) or die("Query Failed INSERT INTO `question_status`: ".mysql_error());
						$sql5="SELECT shs_answer_choices.shs_ac_id, shs_answer_choices.shs_answer_choice_desc, shs_answer_choices.shs_q_id FROM shs_answer_choices WHERE shs_answer_choices.shs_q_id ='".$q_id."'";
						$result5 = mysql_query($sql5);
						while($row5=mysql_fetch_array($result5)){
							$ac_id1=$row5['shs_ac_id'];
							$answer_choice_desc=$row5['shs_answer_choice_desc'];
							$inset3 = "INSERT INTO `shs_answer_choices` (`shs_answer_choice_desc`, `shs_q_id`) VALUES ('".$answer_choice_desc."','".$qid."')";
							$insertres3=mysql_query($inset3) or die("Query Failed1 : ".mysql_error());
						}
						$sql6="SELECT shs_answer.shs_answer_desc FROM shs_answer WHERE shs_answer.shs_q_id ='".$q_id."'";
						$result6 = mysql_query($sql6);
						while($row6=mysql_fetch_array($result6)){
							$answer_desc=$row6['shs_answer_desc'];
							$inset6 = "INSERT INTO `shs_answer` (`shs_answer_desc`, `shs_q_id`) VALUES ('".$answer_desc."','".$qid."')";
							$insertres6=mysql_query($inset6) or die("Query Failed1 : ".mysql_error());
						}
						$inset7 = "INSERT INTO `shs_question_status` (`shs_status`, `shs_q_id`) VALUES ('checked','".$qid."')";
						$insertres7=mysql_query($inset7) or die("Query Failed1 : ".mysql_error());
					}
					
				}else{
					$number++;
					$sql2a="SELECT shs_test_number.shs_test_number, shs_test_number.shs_test_id FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_question_type ON shs_question_type.shs_test_id = shs_test_number.shs_test_id WHERE shs_question_type.shs_question_type_name LIKE '".$question_type_name."' AND shs_tq.shs_tq_id ='".$tq_id."' ";		
						$result2a = mysql_query($sql2a);
						while($row2=mysql_fetch_array($result2a)){
							$test_number=$row2['shs_test_number'];
							$tid=$row2['shs_test_id'];
						

						}
						$insert1 = "INSERT INTO `shs_testquestions` (`shs_number`, `shs_question_desc`, `shs_points`, `shs_attachment`, `cognitive_level_id`, `shs_topics_id`, `shs_test_id`) VALUES ('".$number."','".$question_desc."','".$points."','".$attachment."','".$cognitive_level_id."','".$topics_id."','".$tid."')";
						$insertres1=mysql_query($insert1) or die("Query insert TestQuestions2: ".mysql_error());
						$qid=mysql_insert_id();
						$inserte4 = "INSERT INTO `shs_question_status` (`shs_status`, `shs_q_id`) VALUES ('checked','".$qid."')";
                		$insertrese4=mysql_query($inserte4) or die("Query Failed INSERT INTO `question_status`: ".mysql_error());
						$sql5="SELECT shs_answer_choices.shs_ac_id, shs_answer_choices.shs_answer_choice_desc, shs_answer_choices.shs_q_id FROM shs_answer_choices WHERE shs_answer_choices.shs_q_id ='".$q_id."'";
						$result5 = mysql_query($sql5);
						while($row5=mysql_fetch_array($result5)){
							$ac_id1=$row5['shs_ac_id'];
							$answer_choice_desc=$row5['shs_answer_choice_desc'];
							$inset3 = "INSERT INTO `shs_answer_choices` (`shs_answer_choice_desc`, `shs_q_id`) VALUES ('".$answer_choice_desc."','".$qid."')";
							$insertres3=mysql_query($inset3) or die("Query Failed1 : ".mysql_error());
						}
						$sql6="SELECT shs_answer.shs_answer_desc FROM shs_answer WHERE shs_answer.shs_q_id ='".$q_id."'";
						$result6 = mysql_query($sql6);
						while($row6=mysql_fetch_array($result6)){
							$answer_desc=$row6['shs_answer_desc'];
							$inset6 = "INSERT INTO `shs_answer` (`shs_answer_desc`, `shs_q_id`) VALUES ('".$answer_desc."','".$qid."')";
							$insertres6=mysql_query($inset6) or die("Query Failed1 : ".mysql_error());
						}
						$inset7 = "INSERT INTO `shs_question_status` (`shs_status`, `shs_q_id`) VALUES ('checked','".$qid."')";
						$insertres7=mysql_query($inset7) or die("Query Failed1 : ".mysql_error());
				}
			}
			
		}
		// echo "<script type='text/javascript'> window.location.href='shscreatetq.php?shstq_id=".$tq_id."&shssyllabus_id=".$syll."'</script>";
	}
	

?>