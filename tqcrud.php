<?php
$connection = mysql_connect('localhost','root','') or die(mysql_error());
$database = mysql_select_db('testbank') or die(mysql_error());

if (!empty($_GET)) {
	$page=$_GET['p'];
	if ($page=='loadtos') {		
		$data=array();
		$td=array();
		$noh= array();
		$count1= array();
		$totalh=0;
		$count=0;
		$tq_id=$_POST['tq_id'];
		$finalnh= array();
		$sql=mysql_query("SELECT * FROM tos WHERE tq_id = '".$tq_id."'");
		
		while ($row=mysql_fetch_array($sql)) {
			$tos_id=$row['tos_id'];
			$totali=$row['kno_ni']+$row['com_ni']+$row['app_ni']+$row['ana_ni']+$row['eva_ni']+$row['syn_ni'];
		  	$kno_ni= $row['kno_ni'];
		  	$com_ni= $row['com_ni'];
		  	$app_ni= $row['app_ni'];
		  	$ana_ni= $row['ana_ni'];
		  	$eva_ni= $row['eva_ni'];
		  	$syn_ni= $row['syn_ni'];
		  	$tpointstos=$row['kno_np']+$row['com_np']+$row['app_np']+$row['ana_np']+$row['eva_np']+$row['syn_np'];
		  	$kno_np= $row['kno_np'];
		  	$com_np= $row['com_np'];
		  	$app_np= $row['app_np'];
		  	$ana_np= $row['ana_np'];
		  	$eva_np= $row['eva_np'];
		  	$syn_np= $row['syn_np'];
			
		}
		$sql1=mysql_query("SELECT * FROM tos_topic WHERE tos_id = '".$tos_id."'");
		while ($row=mysql_fetch_array($sql1)) {
			$num_of_hours=$row['num_of_hours'];
			$topic_desc=$row['topic_desc'];
			$td[]=$topic_desc;
			$noh[]=$num_of_hours;
			$totalh+=$num_of_hours;
			$sql2=mysql_query("SELECT Count(testquestions.number) AS count FROM test_number INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN topics ON testquestions.topics_id = topics.topics_id WHERE test_number.tq_id = '".$tq_id."' AND topics.topic_description = '".$topic_desc."'");
			while ($rows=mysql_fetch_array($sql2)) {
				$count=$rows['count'];
			}
			$count1[]=$count;
		}
		$cog1=mysql_query("SELECT Count(testquestions.cognitive_level_id) AS c1 FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.tq_id = '".$tq_id."' AND testquestions.cognitive_level_id = 1 ");
		while ($row1=mysql_fetch_array($cog1)) {
			$c1=$row1['c1'];
		}
		$cog2=mysql_query("SELECT Count(testquestions.cognitive_level_id) AS c2 FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.tq_id = '".$tq_id."' AND testquestions.cognitive_level_id = 2 ");
		while ($row2=mysql_fetch_array($cog2)) {
			$c2=$row2['c2'];
		}
		$cog3=mysql_query("SELECT Count(testquestions.cognitive_level_id) AS c3 FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.tq_id = '".$tq_id."' AND testquestions.cognitive_level_id = 3 ");
		while ($row3=mysql_fetch_array($cog3)) {
			$c3=$row3['c3'];
		}
		$cog4=mysql_query("SELECT Count(testquestions.cognitive_level_id) AS c4 FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.tq_id = '".$tq_id."' AND testquestions.cognitive_level_id = 4 ");
		while ($row4=mysql_fetch_array($cog4)) {
			$c4=$row4['c4'];
		}
		$cog5=mysql_query("SELECT Count(testquestions.cognitive_level_id) AS c5 FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.tq_id = '".$tq_id."' AND testquestions.cognitive_level_id = 5 ");
		while ($row5=mysql_fetch_array($cog5)) {
			$c5=$row5['c5'];
		}
		$cog6=mysql_query("SELECT Count(testquestions.cognitive_level_id) AS c6 FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.tq_id = '".$tq_id."' AND testquestions.cognitive_level_id = 6 ");
		while ($row6=mysql_fetch_array($cog6)) {
			$c6=$row6['c6'];
		}
		$cog7=mysql_query("SELECT Sum(testquestions.points) AS c7 FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.tq_id = '".$tq_id."' AND testquestions.cognitive_level_id = 1 ");
		while ($row7=mysql_fetch_array($cog7)) {
			$c7=$row7['c7'];
			if ($c7== null) {
				$c7=0;
			}
		}
		$cog8=mysql_query("SELECT Sum(testquestions.points) AS c8 FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.tq_id = '".$tq_id."' AND testquestions.cognitive_level_id = 2 ");
		while ($row8=mysql_fetch_array($cog8)) {
			$c8=$row8['c8'];
			if ($c8== null) {
				$c8=0;
			}
		}
		$cog9=mysql_query("SELECT Sum(testquestions.points) AS c9 FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.tq_id = '".$tq_id."' AND testquestions.cognitive_level_id = 3 ");
		while ($row9=mysql_fetch_array($cog9)) {
			$c9=$row9['c9'];
			if ($c9== null) {
				$c9=0;
			}
		}
		$cog10=mysql_query("SELECT Sum(testquestions.points) AS c10 FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.tq_id = '".$tq_id."' AND testquestions.cognitive_level_id = 4 ");
		while ($row10=mysql_fetch_array($cog10)) {
			$c10=$row10['c10'];
			if ($c10== null) {
				$c10=0;
			}
		}
		$cog11=mysql_query("SELECT Sum(testquestions.points) AS c11 FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.tq_id = '".$tq_id."' AND testquestions.cognitive_level_id = 5 ");
		while ($row11=mysql_fetch_array($cog11)) {
			$c11=$row11['c11'];
			if ($c11== null) {
				$c11=0;
			}
		}
		$cog12=mysql_query("SELECT Sum(testquestions.points) AS c12 FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.tq_id = '".$tq_id."' AND testquestions.cognitive_level_id = 6 ");
		while ($row12=mysql_fetch_array($cog12)) {
			$c12=$row12['c12'];
			if ($c12== null) {
				$c12=0;
			}
		}
		foreach ($noh as $key => $value) {
			$finalnh[]=$totali / $totalh * $value;
		}
		$sqlp=mysql_query("SELECT Sum(testquestions.points) AS tpoints FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.tq_id = '".$tq_id."'");
		while ($row=mysql_fetch_array($sqlp)) {
			$tpointstq=$row['tpoints'];
			if ($tpointstq== null) {
				$tpointstq=0;
			}
		}
		$sqli=mysql_query("SELECT Count(testquestions.number) AS titems FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.tq_id = '".$tq_id."'");
		while ($row=mysql_fetch_array($sqli)) {
			$titemstq=$row['titems'];
			if ($titemstq== null) {
				$titemstq=0;
			}
		}
		$sqlst=mysql_query("SELECT tqstatus.status_desc FROM tqstatus WHERE tqstatus.tq_id ='".$tq_id."'");
		while ($row=mysql_fetch_array($sqlst)) {
			$status_desc=$row['status_desc'];
		}
		$data[]=['tpointstq'=>$tpointstq,'tpointstos'=>$tpointstos,'titemstq'=>$titemstq,'titemstos'=>$totali,'data'=>"true",'totali'=>$totali,'topic_desc'=>$td,'num_of_hours'=>$finalnh,'kno_ni'=>$kno_ni, 'com_ni'=>$com_ni, 'app_ni'=>$app_ni, 'ana_ni'=>$ana_ni, 'eva_ni'=>$eva_ni, 'syn_ni'=>$syn_ni,'kno_np'=>$kno_np, 'com_np'=>$com_np, 'app_np'=>$app_np, 'ana_np'=>$ana_np, 'eva_np'=>$eva_np, 'syn_np'=>$syn_np, 'c1'=>$c1, 'c2'=>$c2, 'c3'=>$c3, 'c4'=>$c4, 'c5'=>$c5, 'c6'=>$c6, 'c7'=>$c7, 'c8'=>$c8, 'c9'=>$c9, 'c10'=>$c10, 'c11'=>$c11, 'c12'=>$c12,'topicn'=>$count1,'status_desc'=>$status_desc];

		
		echo json_encode($data);
	}else if ($page=='loadtnum') {
		$data=array();
		$tnum=0;
		$main_direction;
		$num_copies;
		$topic_description=array();
		$topics_id=array();
		$tq_id=$_POST['tq_id'];
		$period=$_POST['period'];
		$syllabus_id=$_POST['syllabus_id'];

		$sql=mysql_query("SELECT Count(test_number.test_number) AS count FROM test_number WHERE test_number.tq_id ='".$tq_id."'");
		while ($row=mysql_fetch_array($sql)) {
			$tnum+=$row['count'];
		}
		$sql1=mysql_query("SELECT topics.topics_id, topics.topic_description FROM topics INNER JOIN tos_topic ON tos_topic.topic_desc = topics.topic_description INNER JOIN tos ON tos_topic.tos_id = tos.tos_id WHERE topics.syllabus_id = '".$syllabus_id."' AND tos.tq_id = '".$tq_id."' AND topics.idsa <> 'Examination Week' AND topics.idsa <> 'Examination Week' AND topics.idsa <> 'Examination Week' AND topics.idsa <> 'Examination Week' ORDER BY topics.topics_id ASC");
		while ($row1=mysql_fetch_array($sql1)) {
			$topic_description[]=$row1['topic_description'];
			$topics_id[]=$row1['topics_id'];
		}
		$sql2=mysql_query("SELECT tq.tq_id, tq.main_direction, tq.num_copies, tq.main_attach, tq.syllabus_id, tq.exam_id, tq.upload_tq, tq.upload_tos, tqstatus.status_desc FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id WHERE tq.syllabus_id ='".$syllabus_id."' AND tq.exam_id = '".$period."'");
		while ($row2=mysql_fetch_array($sql2)) {
			$main_direction=$row2['main_direction'];
			$main_attach=$row2['main_attach'];
			$num_copies=$row2['num_copies'];
			$upload_tq=utf8_encode($row2['upload_tq']);
			$upload_tos=utf8_encode($row2['upload_tos']);
			$status_desc=$row2['status_desc'];
		}
		$data[]=['data'=>$tnum,"topic"=>$topic_description,"topicid"=>$topics_id,"nos"=>$num_copies,"maindirection"=>$main_direction,"main_attach"=>$main_attach,"upload_tq"=>$upload_tq,"upload_tos"=>$upload_tos,"status_desc"=>$status_desc];
		echo json_encode($data);
	}else if ($page=='loadqnum') {
		$data=array();
		$qnum=0;
		$tdesc="";
		$attachment="";
		$question_type_name="";
		$tq_id=$_POST['tq_id'];
		$tnum=$_POST['tnum'];
		$sql=mysql_query("SELECT Count(testquestions.number) AS count FROM test_number INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE test_number.tq_id = '".$tq_id."' AND test_number.test_number ='".$tnum."'");
		while ($row=mysql_fetch_array($sql)) {
			$qnum+=$row['count'];
		}
		$sql1=mysql_query("SELECT question_type.question_type_name, test_number.test_desc, test_number.attachment FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE test_number.tq_id = '".$tq_id."' AND test_number.test_number ='".$tnum."'");
		while ($row1=mysql_fetch_array($sql1)) {
			$tdesc=html_entity_decode($row1['test_desc']);
			$question_type_name=html_entity_decode($row1['question_type_name']);
			$attachment=$row1['attachment'];
		}
		$sqlst=mysql_query("SELECT tqstatus.status_desc FROM tqstatus WHERE tqstatus.tq_id ='".$tq_id."'");
		while ($row=mysql_fetch_array($sqlst)) {
			$status_desc=$row['status_desc'];
		}
		$data[]=['data'=>$qnum,"tdesc"=>$tdesc, "qtype"=>$question_type_name, "attachment"=>$attachment, "status_desc"=>$status_desc];
		echo json_encode($data);
	}else if ($page=="loadq") {
		$data=array();
		$tq_id=$_POST['tq_id'];
		$qnum=$_POST['qnum'];
		$tnum=$_POST['tnum'];
		$answer_desc=array();
		$answer_choice_desc=array();

		$q_id="";
		$question_desc="";
		$points="";
		$attachment="";
		$cognitive_level_id="";
		$topics_id="";

		$sql=mysql_query("SELECT testquestions.q_id, testquestions.question_desc, testquestions.points, testquestions.attachment, testquestions.cognitive_level_id, testquestions.topics_id FROM test_number INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE test_number.tq_id = '".$tq_id."' AND test_number.test_number ='".$tnum."' AND testquestions.number ='".$qnum."'");
		while ($row=mysql_fetch_array($sql)) {
			$q_id=$row['q_id'];
			$question_desc=html_entity_decode($row['question_desc']);
			$points=$row['points'];
			$attachment=$row['attachment'];
			$cognitive_level_id=$row['cognitive_level_id'];
			$topics_id=$row['topics_id'];
		}
		$sql1=mysql_query("SELECT answer.answer_desc FROM answer WHERE answer.q_id ='".$q_id."'");
		while ($row1=mysql_fetch_array($sql1)) {
			$answer_desc[]=html_entity_decode($row1['answer_desc']);
		}
		$sql2=mysql_query("SELECT answer_choices.answer_choice_desc FROM answer_choices WHERE answer_choices.q_id ='".$q_id."'");
		while ($row2=mysql_fetch_array($sql2)) {
			$answer_choice_desc[]=html_entity_decode($row2['answer_choice_desc']);
		}
		$sql3=mysql_query("SELECT tqstatus.status_desc FROM tqstatus WHERE tqstatus.tq_id ='".$tq_id."'");
		while ($row3=mysql_fetch_array($sql3)) {
			$status_desc=$row3['status_desc'];
			
		}
		
		$data[]=['question_desc'=>$question_desc,"cognitive_level_id"=>$cognitive_level_id, "topics_id"=>$topics_id, "points"=>$points, "answer_desc"=>$answer_desc, "answer_choice_desc"=>$answer_choice_desc,'status_desc'=>$status_desc,'attachment'=>$attachment];
		echo json_encode($data);
	}else if ($page=="checkstatus") {
		$data=array();
		$tq_id=$_POST['tq_id'];
		$syllabus_id=$_POST['syllabus_id'];
		$sql=mysql_query("SELECT tqstatus.status_desc FROM tqstatus WHERE tqstatus.tq_id ='".$tq_id."'");
		while ($row=mysql_fetch_array($sql)) {
			$status_desc=$row['status_desc'];
			
		}
		$data[]=['status_desc'=>$status_desc];
		echo json_encode($data);
	}else if ($page=="submitph") {
		$position=$_POST['position'];
		$tq_id=$_POST['tq_id'];
		$period=$_POST['period'];
		$ph_id=$_POST['ph_id'];
		$data=array();
		$msg="";
		$deadline="";
		$sql1="SELECT tq.num_copies FROM tq WHERE tq.tq_id = '".$tq_id."'";
        $result1= mysql_query($sql1);
        while($row=mysql_fetch_array($result1)){
            $num_copies=$row['num_copies'];
        }
        $sql="SELECT Sum(testquestions.points) AS total FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.tq_id ='".$tq_id."'";
        $result= mysql_query($sql);
        while($row=mysql_fetch_array($result)){
            $total=$row['total'];
        }
        if (!empty($num_copies)) {
            $sql="SELECT submission_sched.deadline FROM major_exams INNER JOIN submission_sched ON submission_sched.exam_id = major_exams.exam_id WHERE major_exams.exam_id = '".$period."'";
	        $result= mysql_query($sql);
	        while($row=mysql_fetch_array($result)){
	            $deadline=$row['deadline'];
	        }
	        $today=date("Y-m-d");
	        $now=date("Y-m-d H:i:s");
	        if ($position=="Academic Head") {
	        	if ($deadline == "" or $deadline == null) {
		            $query="UPDATE tqstatus SET status_desc='for printing' , ph='".$ph_id."', late='no', date_time = NOW(), notif_status = 'unread' WHERE tq_id='".$tq_id."'";
		                $result = mysql_query($query) or die("Query Failed update update status: ".mysql_error());
		        }else{
		            if ($today>$deadline) {
		                $query1="UPDATE tqstatus SET status_desc='for printing' , ph='".$ph_id."', late='yes', date_time = NOW(), notif_status = 'unread' WHERE tq_id='".$tq_id."'";
		                $result1 = mysql_query($query1) or die("Query Failed update update status: ".mysql_error());
		            }else{
		                $query="UPDATE tqstatus SET status_desc='for printing' , ph='".$ph_id."', late='no', date_time = NOW(), notif_status = 'unread' WHERE tq_id='".$tq_id."'";
		                $result = mysql_query($query) or die("Query Failed update update status: ".mysql_error());
		            }
		        }	
		        $sqll=mysql_query("SELECT testquestions.q_id FROM testquestions INNER JOIN test_number ON testquestions.test_id = test_number.test_id WHERE test_number.tq_id ='".$tq_id."'");
		        while ($rowl=mysql_fetch_array($sqll)) {
		        	$qidd=$rowl['q_id'];
		        	$queryl="UPDATE question_status SET status='checked' WHERE q_id='".$qidd."'";
			        $result = mysql_query($queryl) or die("Query Failed question_status: ".mysql_error());
		        }
		        $msg="Test Questionnaire Sent!";
	        }else if ($position=="Dean") {
	        	if ($deadline == "" or $deadline == null) {
		            $query="UPDATE tqstatus SET status_desc='queue for daa' , ph='".$ph_id."', late='no', date_time = NOW(), notif_status = 'unread' WHERE tq_id='".$tq_id."'";
		                $result = mysql_query($query) or die("Query Failed update update status: ".mysql_error());
		        }else{
		            if ($today>$deadline) {
		                $query1="UPDATE tqstatus SET status_desc='queue for daa' , ph='".$ph_id."', late='yes', date_time = NOW(), notif_status = 'unread' WHERE tq_id='".$tq_id."'";
		                $result1 = mysql_query($query1) or die("Query Failed update update status: ".mysql_error());
		            }else{
		                $query="UPDATE tqstatus SET status_desc='queue for daa' , ph='".$ph_id."', late='no', date_time = NOW(), notif_status = 'unread' WHERE tq_id='".$tq_id."'";
		                $result = mysql_query($query) or die("Query Failed update update status: ".mysql_error());
		            }
		        }	
		        $sqll=mysql_query("SELECT testquestions.q_id FROM testquestions INNER JOIN test_number ON testquestions.test_id = test_number.test_id WHERE test_number.tq_id ='".$tq_id."'");
		        while ($rowl=mysql_fetch_array($sqll)) {
		        	$qidd=$rowl['q_id'];
		        	$queryl="UPDATE question_status SET status='checked' WHERE q_id='".$qidd."'";
			        $result = mysql_query($queryl) or die("Query Failed question_status: ".mysql_error());
		        }
		        $msg="Test Questionnaire Sent!";
	        }else if ($position=="Program Head") {
	        	if ($deadline == "" or $deadline == null) {
		            $query="UPDATE tqstatus SET status_desc='queue for dean' , ph='".$ph_id."', late='no', date_time = NOW(), notif_status = 'unread' WHERE tq_id='".$tq_id."'";
		                $result = mysql_query($query) or die("Query Failed update update status: ".mysql_error());
		        }else{
		            if ($today>$deadline) {
		                $query1="UPDATE tqstatus SET status_desc='queue for dean' , ph='".$ph_id."', late='yes', date_time = NOW(), notif_status = 'unread' WHERE tq_id='".$tq_id."'";
		                $result1 = mysql_query($query1) or die("Query Failed update update status: ".mysql_error());
		            }else{
		                $query="UPDATE tqstatus SET status_desc='queue for dean' , ph='".$ph_id."', late='no', date_time = NOW(), notif_status = 'unread' WHERE tq_id='".$tq_id."'";
		                $result = mysql_query($query) or die("Query Failed update update status: ".mysql_error());
		            }
		        }	
		        $sqll=mysql_query("SELECT testquestions.q_id FROM testquestions INNER JOIN test_number ON testquestions.test_id = test_number.test_id WHERE test_number.tq_id ='".$tq_id."'");
		        while ($rowl=mysql_fetch_array($sqll)) {
		        	$qidd=$rowl['q_id'];
		        	$queryl="UPDATE question_status SET status='checked' WHERE q_id='".$qidd."'";
			        $result = mysql_query($queryl) or die("Query Failed question_status: ".mysql_error());
		        }
		        $msg="Test Questionnaire Sent!";
	        }else if ($position=="Instructor") {
	        	if ($deadline == "" or $deadline == null) {
		            $query="UPDATE tqstatus SET status_desc='queue for dean' , ph='".$ph_id."', late='no', date_time = NOW(), notif_status = 'unread' WHERE tq_id='".$tq_id."'";
		            $result = mysql_query($query) or die("Query Failed update update status: ".mysql_error());
		        }else{
		            if ($today>$deadline) {
		                $query1="UPDATE tqstatus SET status_desc='queue for dean' , ph='".$ph_id."', late='yes', date_time = NOW(), notif_status = 'unread' WHERE tq_id='".$tq_id."'";
		                $result1 = mysql_query($query1) or die("Query Failed update update status: ".mysql_error());
		            }else{
		                $query="UPDATE tqstatus SET status_desc='queue for dean' , ph='".$ph_id."', late='no', date_time = NOW(), notif_status = 'unread' WHERE tq_id='".$tq_id."'";
		                $result = mysql_query($query) or die("Query Failed update update status: ".mysql_error());
		            }
		        }	
		        $msg="Test Questionnaire Sent!";
	        }
	    
        }else{
            $msg="Please set the number of student.";
        }
        
		$data[]=['msg'=>$msg];
		echo json_encode($data);
	}else if ($page=="delnum") {
		$data=array();
		$msg="";
		$tq_id=$_POST['tq_id'];
		$tnum=$_POST['tnum'];
		$qnum=$_POST['qnum'];
		$sql=mysql_query("SELECT testquestions.q_id FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.tq_id = '".$tq_id."' AND test_number.test_number = '".$tnum."' AND testquestions.number = '".$qnum."'");
		if (mysql_num_rows($sql)==0) {
			$msg="error1";
		}else{
			while ($row=mysql_fetch_array($sql)) {
				$q_id=$row['q_id'];

				$d1 = "DELETE FROM answer WHERE q_id='".$q_id."'";
	            $resulta1=mysql_query($d1) or die("Query Failed answer: ".mysql_error());
	            $d2 = "DELETE FROM remarks WHERE q_id='".$q_id."'";
	            $resulta2=mysql_query($d2) or die("Query Failed remarks: ".mysql_error());
	            $d3 = "DELETE FROM answer_choices WHERE q_id='".$q_id."'";
	            $resulta3=mysql_query($d3) or die("Query Failed answer_choices: ".mysql_error());
	            $d4 = "DELETE FROM question_status WHERE q_id='".$q_id."'";
	            $resulta4=mysql_query($d4) or die("Query Failed question_status: ".mysql_error());
	            $d5 = "DELETE FROM testquestions WHERE q_id='".$q_id."'";
	            $resulta5=mysql_query($d5) or die("Query Failed question_status: ".mysql_error());
	            $msg="success";
			}
			

            $sql1=mysql_query("SELECT testquestions.q_id FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.tq_id = '".$tq_id."' AND test_number.test_number = '".$tnum."' ORDER BY testquestions.number ASC");
			if (mysql_num_rows($sql1)==0) {
			}else{
				$i=1;
				while ($row=mysql_fetch_array($sql1)) {
					
					$q_id=$row['q_id'];
					$querytd= "UPDATE testquestions SET testquestions.number='".$i."' WHERE q_id='".$q_id."'";
                 	$result1 = mysql_query($querytd) or die("Query Failed update testquestions: ".mysql_error());
                 	$i++;
				}
				
	            
			}
			
		}
		$data[]=['msg'=>$msg];
		echo json_encode($data);
	}else if ($page=="delattmain") {
		$tq_id=$_POST['tq_id'];
		$data=array();
		$query="SELECT main_attach FROM tq WHERE tq_id='".$tq_id."'";
			while ($row=mysql_fetch_array($query)) {
				$main_attach=$row['main_attach'];
				unlink("uploads/".$main_attach);
			}
		$querytd= "UPDATE tq SET tq.main_attach='' WHERE tq_id='".$tq_id."'";
        $result1 = mysql_query($querytd) or die("Query Failed update tq: ".mysql_error());

		$data[]=['msg'=>"Attachment deleted!"];

		echo json_encode($data);
	}else if ($page=="deletetos") {
		$tq_id=$_POST['tq_id'];
		$data=array();
		$query="SELECT upload_tos FROM tq WHERE tq_id='".$tq_id."'";
		$results2 = mysql_query($query);
        if($results2){
        	while ($row=mysql_fetch_array($results2)) {
				unlink("upload_tos/".$row['upload_tos']);
			}
        }
			
		$querytd= "UPDATE tq SET tq.upload_tos='' WHERE tq_id='".$tq_id."'";
        $result1 = mysql_query($querytd) or die("Query Failed update tos: ".mysql_error());

		$data[]=['msg'=>"TOS deleted!"];

		echo json_encode($data);
	}else if ($page=="deletetq") {
		$tq_id=$_POST['tq_id'];
		$data=array();
		$query="SELECT upload_tq FROM tq WHERE tq_id='".$tq_id."'";
		$results1 = mysql_query($query);
        if($results1){
        	while ($row=mysql_fetch_array($results1)) {
				unlink("upload_tq/".$row['upload_tq']);
			}
        }
			
		$querytd= "UPDATE tq SET tq.upload_tq='' WHERE tq_id='".$tq_id."'";
        $result1 = mysql_query($querytd) or die("Query Failed update tq: ".mysql_error());

		$data[]=['msg'=>"TQ deleted! "];

		echo json_encode($data);
	}else if ($page=="delattdirect") {
		$tq_id=$_POST['tq_id'];
		$tnum=$_POST['tnum'];
		$data=array();
		$query="SELECT attachment FROM test_number WHERE test_number.tq_id='".$tq_id."'";
			while ($row=mysql_fetch_array($query)) {
				$attachment=$row['attachment'];
				unlink("uploads/".$attachment);
			}
		$querytd= "UPDATE test_number SET test_number.attachment='' WHERE test_number.test_number = '".$tnum."' AND test_number.tq_id ='".$tq_id."'";
        $result1 = mysql_query($querytd) or die("Query Failed update test_number: ".mysql_error());

		$data[]=['msg'=>"Attachment deleted!"];
		echo json_encode($data);
	}else if ($page=="delattquest") {
		$tq_id=$_POST['tq_id'];
		$tnum=$_POST['tnum'];
		$qnum=$_POST['qnum'];
		$test_id="";

		$sql=mysql_query("SELECT test_number.test_id FROM test_number WHERE test_number.tq_id = '".$tq_id."' AND test_number.test_number = '".$tnum."'");
		if (mysql_num_rows($sql)==0) {
		}else{
			while ($row=mysql_fetch_array($sql)) {
				$test_id=$row['test_id'];
			}
		}
		$data=array();
		$query="SELECT attachment FROM testquestions WHERE testquestions.number = '".$qnum."' AND testquestions.test_id = '".$test_id."'";
			while ($row=mysql_fetch_array($query)) {
				$attachment=$row['attachment'];
				unlink("uploads/".$attachment);
			}
		$querytd= "UPDATE testquestions SET testquestions.attachment='' WHERE testquestions.number = '".$qnum."' AND testquestions.test_id = '".$test_id."'";
        $result1 = mysql_query($querytd) or die("Query Failed update testquestions: ".mysql_error());

		$data[]=['msg'=>"Attachment deleted!"];
		echo json_encode($data);
	}
}


?>