<?php
$connection = mysql_connect('localhost','root','') or die(mysql_error());
$database = mysql_select_db('testbank') or die(mysql_error());

if (!empty($_GET)) {
	$page=$_GET['p'];
	if ($page=='addsub') {
		$subj=$_POST['subj'];
		$emp_id=$_POST['emp_id'];
		$qname=$_POST['qname'];

		$insert = "INSERT INTO `quiz` (`quiz_id`,`quiz_name`,`q_date`,`user_id`,`subj_id`) VALUES ('','".$qname."',NOW(),'".$emp_id."','".$subj."')";
		$exe=mysql_query($insert) or die("Query Failed : ".mysql_error());

	}
	if ($page=='shsaddsub') {
		$subj=$_POST['subj'];
		$emp_id=$_POST['emp_id'];
		$qname=$_POST['qname'];

		$insert = "INSERT INTO `shs_quiz` (`shs_quiz_id`,`shs_quiz_name`,`shs_q_date`,`user_id`,`shs_subj_id`) VALUES ('','".$qname."',NOW(),'".$emp_id."','".$subj."')";
		$exe=mysql_query($insert) or die("Query Failed : ".mysql_error());

	}elseif ($page=='getsub') {
		$data=array();
		$msg=array();
		$qname=array();
		$id=array();
		$emp_id=$_POST['emp_id'];
	 	$sql = "SELECT quiz.quiz_name, quiz.quiz_id, `subject`.subj_name FROM quiz INNER JOIN `subject` ON quiz.subj_id = `subject`.subj_id WHERE quiz.user_id = $emp_id";
        $result = mysql_query($sql);
        if(!$result){
            $msg[]='Error Database';
        }else{
            if (mysql_num_rows($result)==0) {
                $msg[]='No subject found';            
            }else{
                while($row=mysql_fetch_array($result)){
                    $quiz_id=$row['quiz_id'];
                    $quiz_name=$row['quiz_name'];
                    $subj_name=$row['subj_name'];
                    $msg[]=$subj_name;
                    $qname[]=$quiz_name;
                    $id[]=$quiz_id;
                }
            }
        }
	    $data[]=['msg'=>$msg, 'qname'=>$qname, 'id'=>$id];
		echo json_encode($data);
	}elseif ($page=='shsgetsub') {
		$data=array();
		$msg=array();
		$qname=array();
		$id=array();
		$emp_id=$_POST['emp_id'];
	 	$sql = "SELECT shs_quiz.shs_quiz_name, shs_quiz.shs_quiz_id, `shs_subject`.shs_subj_name FROM shs_quiz INNER JOIN `shs_subject` ON shs_quiz.shs_subj_id = `shs_subject`.shs_subj_id WHERE shs_quiz.user_id = $emp_id";
        $result = mysql_query($sql);
        if(!$result){
            $msg[]='Error Database';
        }else{
            if (mysql_num_rows($result)==0) {
                $msg[]='No subject found';            
            }else{
                while($row=mysql_fetch_array($result)){
                    $quiz_id=$row['shs_quiz_id'];
                    $quiz_name=$row['shs_quiz_name'];
                    $subj_name=$row['shs_subj_name'];
                    $msg[]=$subj_name;
                    $qname[]=$quiz_name;
                    $id[]=$quiz_id;
                }
            }
        }
	    $data[]=['msg'=>$msg, 'qname'=>$qname, 'id'=>$id];
		echo json_encode($data);
	}elseif ($page=='shsgetsub2') {
		$data=array();
		$quiz_id=array();
		$subj_id=array();
		$subj_name=array();
		$quiz_name=array();
		$q_date=array();
		$emp_id=$_POST['emp_id'];
	 	$sql=mysql_query("SELECT shs_quiz.shs_quiz_id, shs_quiz.shs_quiz_name, shs_quiz.shs_q_date, `shs_subject`.shs_subj_name,`shs_subject`.shs_subj_id FROM shs_quiz INNER JOIN `shs_subject` ON shs_quiz.shs_subj_id = `shs_subject`.shs_subj_id WHERE shs_quiz.user_id ='".$emp_id."'");
        if(!$sql){
            $subj_name[]='Error Database';
        }else{
            if (mysql_num_rows($sql)==0) {
                $subj_name[]='No subject found';            
            }else{
                while($row=mysql_fetch_array($sql)){
                    $quiz_id[]=$row['shs_quiz_id'];
		            $subj_id[]=$row['shs_subj_id'];
		            $subj_name[]=$row['shs_subj_name'];
		            $quiz_name[]=$row['shs_quiz_name'];
		            $q_date[]=$row['shs_q_date'];
                }
            }
        }
	    $data[]=['quiz_id'=>$quiz_id, 'subj_id'=>$subj_id, 'subj_name'=>$subj_name, 'quiz_name'=>$quiz_name, 'q_date'=>$q_date];
		echo json_encode($data);
	}elseif ($page=='deletesub') {
		$data[]=array();
		$msg[]=array();
		$del=$_GET['del'];
		$del1 = "DELETE FROM quiz_q WHERE quiz_id='".$del."'";
		$result1=mysql_query($del1) or die("Query Failed DELETE FROM quiz_q: ".mysql_error());
		$del2 = "DELETE FROM quiz WHERE quiz_id='".$del."'";
		$result2=mysql_query($del2) or die("Query Failed DELETE FROM quiz: ".mysql_error());

		$msg[]="Deleted!";
		$data[]=['msg'=>$msg];
		echo json_encode($data);
	}
	elseif ($page=='shsdeletesub') {
		$data[]=array();
		$msg[]=array();
		$del=$_GET['del'];
		$del1 = "DELETE FROM shs_quiz_q WHERE shs_quiz_id='".$del."'";
		$result1=mysql_query($del1) or die("Query Failed DELETE FROM shs_quiz_q: ".mysql_error());
		$del2 = "DELETE FROM shs_quiz WHERE shs_quiz_id='".$del."'";
		$result2=mysql_query($del2) or die("Query Failed DELETE FROM shs_quiz: ".mysql_error());

		$msg[]="Deleted!";
			


		$data[]=['msg'=>$msg];
		echo json_encode($data);
	}elseif ($page=='viewquiz') {
		$data[]=array();
		$msg[]=array();
		$subjid=$_POST['subjid'];
		$sql = "SELECT testquestions.q_id, testquestions.question_desc, testquestions.points, testquestions.attachment FROM `subject` INNER JOIN sched_subj ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN topics ON topics.syllabus_id = syllabus.syllabus_id INNER JOIN testquestions ON testquestions.topics_id = topics.topics_id WHERE `subject`.subj_id = $subjid";
        $result = mysql_query($sql);
        if(!$result){
            $msg[]='Error Database';
        }else{
            if (mysql_num_rows($result)==0) {
                $msg[]='No question found';            
            }else{
                while($row=mysql_fetch_array($result)){
                    $quiz_id=$row['q_id'];
                    $question_desc=$row['question_desc'];
                    $points=$row['points'];
                    $msg[]=$subj_name;
                    $qname[]=$quiz_name;
                    $id[]=$quiz_id;
                }
            }
        }

		$data[]=['msg'=>$msg];
		echo json_encode($data);
	}elseif ($page=='copyq') {
		$data[]=array();
		$msg[]=array();
		$q_id=$_POST['qid'];
		$quiz_id=$_POST['quiz_id'];
		$num=0;
		$sql1=mysql_query("SELECT Count(quiz_q.qq_id) AS num FROM quiz_q WHERE quiz_q.quiz_id ='".$quiz_id."'");
		while ($row1=mysql_fetch_array($sql1)) {
			$num=$row1['num'];
		}
		$num++;
		$sql=mysql_query("SELECT quiz_q.qq_id FROM quiz INNER JOIN quiz_q ON quiz_q.quiz_id = quiz.quiz_id WHERE quiz_q.q_id ='".$q_id."' AND quiz.quiz_id ='".$quiz_id."'");
		

        if(mysql_num_rows($sql)==0){
	        $insert = "INSERT INTO `quiz_q` (`qq_id`,`quiz_num`,`q_id`,`quiz_id`) VALUES ('','".$num."','".$q_id."','".$quiz_id."')";
			$exe=mysql_query($insert) or die("Query Failed : ".mysql_error());
			$msg="Copied!"; 
        }else{
        	$msg="Cannot copy! Duplicate data."; 
        }

		$data[]=['msg'=>$msg];
		echo json_encode($data);
	}elseif ($page=='shscopyq') {
		$data[]=array();
		$msg[]=array();
		$q_id=$_POST['qid'];
		$quiz_id=$_POST['quiz_id'];
		$num=0;
		$sql1=mysql_query("SELECT Count(shs_quiz_q.shs_qq_id) AS num FROM shs_quiz_q WHERE shs_quiz_q.shs_quiz_id ='".$quiz_id."'");
		while ($row1=mysql_fetch_array($sql1)) {
			$num=$row1['num'];
		}
		$num++;
		$sql=mysql_query("SELECT shs_quiz_q.shs_qq_id FROM shs_quiz INNER JOIN shs_quiz_q ON shs_quiz_q.shs_quiz_id = shs_quiz.shs_quiz_id WHERE shs_quiz_q.shs_q_id ='".$q_id."' AND shs_quiz.shs_quiz_id ='".$quiz_id."'");
		

        if(mysql_num_rows($sql)==0){
	        $insert = "INSERT INTO `shs_quiz_q` (`shs_qq_id`,`shs_quiz_num`,`shs_q_id`,`shs_quiz_id`) VALUES ('','".$num."','".$q_id."','".$quiz_id."')";
			$exe=mysql_query($insert) or die("Query Failed : ".mysql_error());
			$msg="Copied!"; 
        }else{
        	$msg="Cannot copy! Duplicate data."; 
        }

		$data[]=['msg'=>$msg];
		echo json_encode($data);
	}elseif ($page=='loadq') {
		$data[]=array();
		$choice=array();
		$answer=array();
		$quiz_id=$_POST['quiz_id'];
		// $quiz_id=1;
		$sql=mysql_query("SELECT * FROM quiz_q INNER JOIN testquestions ON quiz_q.q_id = testquestions.q_id WHERE quiz_q.quiz_id ='".$quiz_id."' ORDER BY quiz_q.quiz_num ASC ");
		$i=0;
		while ($row1=mysql_fetch_array($sql)) {
			$q_id=$row1['q_id'];
			$quiz_num=$row1['quiz_num'];
			$question_desc=$row1['question_desc'];
			$attachment=$row1['attachment'];
			$sql1=mysql_query("SELECT answer_choices.answer_choice_desc FROM answer_choices WHERE answer_choices.q_id ='".$q_id."'");
			if (mysql_num_rows($sql1)==0) {
				# code...
			}else{
				while ($rows=mysql_fetch_array($sql1)) {
					$answer_choice_desc=$rows['answer_choice_desc'];
					$choice[]=$answer_choice_desc;
				}
				
			}
			$sql2=mysql_query("SELECT answer.answer_desc FROM answer WHERE answer.q_id ='".$q_id."'");
			if (mysql_num_rows($sql2)==0) {
				# code...	
			}else{
				while ($rowe=mysql_fetch_array($sql2)) {
					$answer_desc=$rowe['answer_desc'];
					$answer[]=$answer_desc;
				}
				
			}
			$data[$i]=['q_id'=>$q_id,'quiz_num'=>$quiz_num,'attachment'=>$attachment,'question_desc'=>$question_desc,'choice'=>$choice,'answer'=>$answer];
			unset($choice);
			$choice= array();
			unset($answer);
			$answer= array();
			$i++;
		}
		echo json_encode($data);
	}elseif ($page=='shsloadq') {
		$data[]=array();
		$choice=array();
		$answer=array();
		$quiz_id=$_POST['quiz_id'];
		// $quiz_id=1;
		$sql=mysql_query("SELECT * FROM shs_quiz_q INNER JOIN shs_testquestions ON shs_quiz_q.shs_q_id = shs_testquestions.shs_q_id WHERE shs_quiz_q.shs_quiz_id ='".$quiz_id."' ORDER BY shs_quiz_q.shs_quiz_num ASC ");
		$i=0;
		while ($row1=mysql_fetch_array($sql)) {
			$q_id=$row1['shs_q_id'];
			$quiz_num=$row1['shs_quiz_num'];
			$question_desc=$row1['shs_question_desc'];
			$attachment=$row1['shs_attachment'];
			$sql1=mysql_query("SELECT shs_answer_choices.shs_answer_choice_desc FROM shs_answer_choices WHERE shs_answer_choices.shs_q_id ='".$q_id."'");
			if (mysql_num_rows($sql1)==0) {
				# code...
			}else{
				while ($rows=mysql_fetch_array($sql1)) {
					$answer_choice_desc=$rows['shs_answer_choice_desc'];
					$choice[]=$answer_choice_desc;
				}
				
			}
			$sql2=mysql_query("SELECT shs_answer.shs_answer_desc FROM shs_answer WHERE shs_answer.shs_q_id ='".$q_id."'");
			if (mysql_num_rows($sql2)==0) {
				# code...	
			}else{
				while ($rowe=mysql_fetch_array($sql2)) {
					$answer_desc=$rowe['shs_answer_desc'];
					$answer[]=$answer_desc;
				}
				
			}
			$data[$i]=['q_id'=>$q_id,'quiz_num'=>$quiz_num,'attachment'=>$attachment,'question_desc'=>$question_desc,'choice'=>$choice,'answer'=>$answer];
			unset($choice);
			$choice= array();
			unset($answer);
			$answer= array();
			$i++;
		}
		echo json_encode($data);
	}else if($page=='deleteq'){
		$q_id=$_GET['q_id'];
		$quiz_id=$_GET['quiz_id'];
		$i=0;
			$delete = "DELETE FROM quiz_q WHERE q_id ='".$q_id."'";
			$resulta=mysql_query($delete) or die("Query Failed quiz_q: ".mysql_error());

			$sql=mysql_query("SELECT * FROM quiz_q WHERE quiz_q.quiz_id = '".$quiz_id."' ORDER BY quiz_q.quiz_num ASC");
			if (mysql_num_rows($sql)==0) {
				$data[]=['msg'=>"No data to delete!"];
			}else{
				while ($row=mysql_fetch_array($sql)) {
					$i++;
					$id=$row['q_id'];
					$query = "UPDATE quiz_q SET quiz_num='".$i."' WHERE q_id='".$id."'";
	                $result=mysql_query($query) or die("Query Failed : 1".mysql_error());
				}
			}
			$data[]=['msg'=>"Deleted!"];
		echo json_encode($data);

	}else if($page=='shsdeleteq'){
		$q_id=$_GET['q_id'];
		$quiz_id=$_GET['quiz_id'];
		$i=0;
			$delete = "DELETE FROM shs_quiz_q WHERE shs_q_id ='".$q_id."'";
			$resulta=mysql_query($delete) or die("Query Failed quiz_q: ".mysql_error());

			$sql=mysql_query("SELECT * FROM shs_quiz_q WHERE shs_quiz_q.shs_quiz_id = '".$quiz_id."' ORDER BY shs_quiz_q.shs_quiz_num ASC");
			if (mysql_num_rows($sql)==0) {
				$data[]=['msg'=>"No data to delete!"];
			}else{
				while ($row=mysql_fetch_array($sql)) {
					$i++;
					$id=$row['shs_q_id'];
					$query = "UPDATE shs_quiz_q SET shs_quiz_num='".$i."' WHERE shs_q_id='".$id."'";
	                $result=mysql_query($query) or die("Query Failed : 1".mysql_error());
				}
			}
			$data[]=['msg'=>"Deleted!"];
		echo json_encode($data);

	}
}
?>