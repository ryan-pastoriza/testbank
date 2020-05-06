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
		$sql=mysql_query("SELECT * FROM shs_tos WHERE shs_tq_id = '".$tq_id."'");
		
		while ($row=mysql_fetch_array($sql)) {
			$tos_id=$row['shs_tos_id'];
			$totali=$row['shs_kno_ni']+$row['shs_com_ni']+$row['shs_app_ni']+$row['shs_ana_ni']+$row['shs_eva_ni']+$row['shs_syn_ni'];
		  	$kno_ni= $row['shs_kno_ni'];
		  	$com_ni= $row['shs_com_ni'];
		  	$app_ni= $row['shs_app_ni'];
		  	$ana_ni= $row['shs_ana_ni'];
		  	$eva_ni= $row['shs_eva_ni'];
		  	$syn_ni= $row['shs_syn_ni'];
		  	$tpointstos=$row['shs_kno_np']+$row['shs_com_np']+$row['shs_app_np']+$row['shs_ana_np']+$row['shs_eva_np']+$row['shs_syn_np'];
		  	$kno_np= $row['shs_kno_np'];
		  	$com_np= $row['shs_com_np'];
		  	$app_np= $row['shs_app_np'];
		  	$ana_np= $row['shs_ana_np'];
		  	$eva_np= $row['shs_eva_np'];
		  	$syn_np= $row['shs_syn_np'];
			
		}
		$sql1=mysql_query("SELECT * FROM shs_tos_topic WHERE shs_tos_id = '".$tos_id."'");
		while ($row=mysql_fetch_array($sql1)) {
			$num_of_hours=$row['shs_num_of_hours'];
			$topic_desc=$row['shs_topic_desc'];
			$td[]=$topic_desc;
			$noh[]=$num_of_hours;
			$totalh+=$num_of_hours;
			$sql2=mysql_query("SELECT Count(shs_testquestions.shs_number) AS count FROM shs_test_number INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id INNER JOIN shs_topics ON shs_testquestions.shs_topics_id = shs_topics.shs_topics_id WHERE shs_test_number.shs_tq_id = '".$tq_id."' AND shs_topics.shs_topic_description ='".$topic_desc."'");
			while ($rows=mysql_fetch_array($sql2)) {
				$count=$rows['count'];
			}
			$count1[]=$count;
		}
		$cog1=mysql_query("SELECT Count(shs_testquestions.cognitive_level_id) AS c1 FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_tq.shs_tq_id = '".$tq_id."' AND shs_testquestions.cognitive_level_id = '1'");
		while ($row1=mysql_fetch_array($cog1)) {
			$c1=$row1['c1'];
		}
		$cog2=mysql_query("SELECT Count(shs_testquestions.cognitive_level_id) AS c2 FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_tq.shs_tq_id = '".$tq_id."' AND shs_testquestions.cognitive_level_id = '2'");
		while ($row2=mysql_fetch_array($cog2)) {
			$c2=$row2['c2'];
		}
		$cog3=mysql_query("SELECT Count(shs_testquestions.cognitive_level_id) AS c3 FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_tq.shs_tq_id = '".$tq_id."' AND shs_testquestions.cognitive_level_id = '3' ");
		while ($row3=mysql_fetch_array($cog3)) {
			$c3=$row3['c3'];
		}
		$cog4=mysql_query("SELECT Count(shs_testquestions.cognitive_level_id) AS c4 FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_tq.shs_tq_id = '".$tq_id."' AND shs_testquestions.cognitive_level_id = '4'");
		while ($row4=mysql_fetch_array($cog4)) {
			$c4=$row4['c4'];
		}
		$cog5=mysql_query("SELECT Count(shs_testquestions.cognitive_level_id) AS c5 FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_tq.shs_tq_id = '".$tq_id."' AND shs_testquestions.cognitive_level_id = '5'");
		while ($row5=mysql_fetch_array($cog5)) {
			$c5=$row5['c5'];
		}
		$cog6=mysql_query("SELECT Count(shs_testquestions.cognitive_level_id) AS c6 FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_tq.shs_tq_id = '".$tq_id."' AND shs_testquestions.cognitive_level_id = '6'");
		while ($row6=mysql_fetch_array($cog6)) {
			$c6=$row6['c6'];
		}
		$cog7=mysql_query("SELECT Sum(shs_testquestions.shs_points) AS c7 FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_tq.shs_tq_id = '".$tq_id."' AND shs_testquestions.cognitive_level_id = '1' ");
		while ($row7=mysql_fetch_array($cog7)) {
			$c7=$row7['c7'];
			if ($c7== null) {
				$c7=0;
			}
		}
		$cog8=mysql_query("SELECT Sum(shs_testquestions.shs_points) AS c8 FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_tq.shs_tq_id = '".$tq_id."' AND shs_testquestions.cognitive_level_id = '2'");
		while ($row8=mysql_fetch_array($cog8)) {
			$c8=$row8['c8'];
			if ($c8== null) {
				$c8=0;
			}
		}
		$cog9=mysql_query("SELECT Sum(shs_testquestions.shs_points) AS c9 FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_tq.shs_tq_id = '".$tq_id."' AND shs_testquestions.cognitive_level_id = '3'");
		while ($row9=mysql_fetch_array($cog9)) {
			$c9=$row9['c9'];
			if ($c9== null) {
				$c9=0;
			}
		}
		$cog10=mysql_query("SELECT Sum(shs_testquestions.shs_points) AS c10 FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_tq.shs_tq_id = '".$tq_id."' AND shs_testquestions.cognitive_level_id = '4'");
		while ($row10=mysql_fetch_array($cog10)) {
			$c10=$row10['c10'];
			if ($c10== null) {
				$c10=0;
			}
		}
		$cog11=mysql_query("SELECT Sum(shs_testquestions.shs_points) AS c11 FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_tq.shs_tq_id = '".$tq_id."' AND shs_testquestions.cognitive_level_id = '5'");
		while ($row11=mysql_fetch_array($cog11)) {
			$c11=$row11['c11'];
			if ($c11== null) {
				$c11=0;
			}
		}
		$cog12=mysql_query("SELECT Sum(shs_testquestions.shs_points) AS c12 FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_tq.shs_tq_id = '".$tq_id."' AND shs_testquestions.cognitive_level_id = '6' ");
		while ($row12=mysql_fetch_array($cog12)) {
			$c12=$row12['c12'];
			if ($c12== null) {
				$c12=0;
			}
		}
		foreach ($noh as $key => $value) {
			$finalnh[]=$totali / $totalh * $value;
		}
		$sqlp=mysql_query("SELECT Sum(shs_testquestions.shs_points) AS shs_tpoints FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_tq.shs_tq_id = '".$tq_id."'");
		while ($row=mysql_fetch_array($sqlp)) {
			$tpointstq=$row['shs_tpoints'];
			if ($tpointstq== null) {
				$tpointstq=0;
			}
		}
		$sqli=mysql_query("SELECT Count(shs_testquestions.shs_number) AS shs_titems FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_tq.shs_tq_id = '".$tq_id."'");
		while ($row=mysql_fetch_array($sqli)) {
			$titemstq=$row['shs_titems'];
			if ($titemstq== null) {
				$titemstq=0;
			}
		}
		$sqlst=mysql_query("SELECT shs_tqstatus.shs_status_desc FROM shs_tqstatus WHERE shs_tqstatus.shs_tq_id ='".$tq_id."'");
		while ($row=mysql_fetch_array($sqlst)) {
			$status_desc=$row['shs_status_desc'];
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

		$sql=mysql_query("SELECT Count(shs_test_number.shs_test_number) AS count FROM shs_test_number WHERE shs_test_number.shs_tq_id ='".$tq_id."'");
		while ($row=mysql_fetch_array($sql)) {
			$tnum+=$row['count'];
		}
		$sql1=mysql_query("SELECT shs_topics.shs_topic_description, shs_topics.shs_topics_id FROM shs_tq INNER JOIN shs_syll ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN shs_topics ON shs_topics.shs_subj_id = shs_subject.shs_subj_id WHERE shs_syll.shs_syll_id = '".$syllabus_id."' AND shs_tq.shs_tq_id = '".$tq_id."' ORDER BY shs_topics.shs_topics_id ASC");
		while ($row1=mysql_fetch_array($sql1)) {
			$topic_description[]=$row1['shs_topic_description'];
			$topics_id[]=$row1['shs_topics_id'];
		}
		$sql2=mysql_query("SELECT shs_tq.shs_tq_id, shs_tq.shs_main_direction, shs_tq.shs_num_copies, shs_tq.shs_main_attach, shs_tq.exam_id, shs_tq.shs_syll_id, shs_tq.shs_upload_tq, shs_tq.shs_upload_tos, shs_tqstatus.shs_status_desc FROM shs_tq INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id WHERE shs_tq.shs_syll_id ='".$syllabus_id."' AND shs_tq.exam_id = '".$period."'");
		while ($row2=mysql_fetch_array($sql2)) {
			$main_direction=$row2['shs_main_direction'];
			$main_attach=$row2['shs_main_attach'];
			$num_copies=$row2['shs_num_copies'];
			$upload_tq=utf8_encode($row2['shs_upload_tq']);
			$upload_tos=utf8_encode($row2['shs_upload_tos']);
			$shs_status_desc=$row2['shs_status_desc'];
		}
		$data[]=['data'=>$tnum,"topic"=>$topic_description,"topicid"=>$topics_id,"nos"=>$num_copies,"maindirection"=>$main_direction,"main_attach"=>$main_attach,"upload_tq"=>$upload_tq,"upload_tos"=>$upload_tos,"status_desc"=>$shs_status_desc];
		echo json_encode($data);
	}else if ($page=='loadqnum') {
		$data=array();
		$qnum=0;
		$tdesc="";
		$attachment="";
		$question_type_name="";
		$tq_id=$_POST['tq_id'];
		$tnum=$_POST['tnum'];
		$sql=mysql_query("SELECT Count(shs_testquestions.shs_number) AS count FROM shs_test_number INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_test_number.shs_tq_id = '".$tq_id."' AND shs_test_number.shs_test_number ='".$tnum."'");
		while ($row=mysql_fetch_array($sql)) {
			$qnum+=$row['count'];
		}
		$sql1=mysql_query("SELECT shs_question_type.shs_question_type_name, shs_test_number.shs_test_desc, shs_test_number.shs_attachment FROM shs_test_number INNER JOIN shs_question_type ON shs_question_type.shs_test_id = shs_test_number.shs_test_id WHERE shs_test_number.shs_tq_id = '".$tq_id."' AND shs_test_number.shs_test_number ='".$tnum."'");
		while ($row1=mysql_fetch_array($sql1)) {
			$tdesc=html_entity_decode($row1['shs_test_desc']);
			$question_type_name=html_entity_decode($row1['shs_question_type_name']);
			$attachment=$row1['shs_attachment'];
		}
		$sqlst=mysql_query("SELECT shs_tqstatus.shs_status_desc FROM shs_tqstatus WHERE shs_tqstatus.shs_tq_id ='".$tq_id."'");
		while ($row=mysql_fetch_array($sqlst)) {
			$status_desc=$row['shs_status_desc'];
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

		$sql=mysql_query("SELECT shs_testquestions.shs_q_id, shs_testquestions.shs_question_desc, shs_testquestions.shs_points, shs_testquestions.shs_attachment, shs_testquestions.cognitive_level_id, shs_testquestions.shs_topics_id FROM shs_test_number INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_test_number.shs_tq_id = '".$tq_id."' AND shs_test_number.shs_test_number ='".$tnum."' AND shs_testquestions.shs_number ='".$qnum."'");
		while ($row=mysql_fetch_array($sql)) {
			$q_id=$row['shs_q_id'];
			$question_desc=html_entity_decode($row['shs_question_desc']);
			$points=$row['shs_points'];
			$attachment=$row['shs_attachment'];
			$cognitive_level_id=$row['cognitive_level_id'];
			$topics_id=$row['shs_topics_id'];
		}
		$sql1=mysql_query("SELECT shs_answer.shs_answer_desc FROM shs_answer WHERE shs_answer.shs_q_id ='".$q_id."'");
		while ($row1=mysql_fetch_array($sql1)) {
			$answer_desc[]=html_entity_decode($row1['shs_answer_desc']);
		}
		$sql2=mysql_query("SELECT shs_answer_choices.shs_answer_choice_desc FROM shs_answer_choices WHERE shs_answer_choices.shs_q_id ='".$q_id."'");
		while ($row2=mysql_fetch_array($sql2)) {
			$answer_choice_desc[]=html_entity_decode($row2['shs_answer_choice_desc']);
		}
		$sql3=mysql_query("SELECT shs_tqstatus.shs_status_desc FROM shs_tqstatus WHERE shs_tqstatus.shs_tq_id ='".$tq_id."'");
		while ($row3=mysql_fetch_array($sql3)) {
			$status_desc=$row3['shs_status_desc'];
			
		}
		
		$data[]=['question_desc'=>$question_desc,"cognitive_level_id"=>$cognitive_level_id, "topics_id"=>$topics_id, "points"=>$points, "answer_desc"=>$answer_desc, "answer_choice_desc"=>$answer_choice_desc,'status_desc'=>$status_desc ,'attachment'=>$attachment];
		echo json_encode($data);
	}else if ($page=="checkstatus") {
		$data=array();
		$tq_id=$_POST['tq_id'];
		$syllabus_id=$_POST['syllabus_id'];
		$sql=mysql_query("SELECT shs_tqstatus.shs_status_desc FROM shs_tqstatus WHERE shs_tqstatus.shs_tq_id ='".$tq_id."'");
		while ($row=mysql_fetch_array($sql)) {
			$status_desc=$row['shs_status_desc'];
			
		}
		$data[]=['status_desc'=>$status_desc];
		echo json_encode($data);
	}else if ($page=="submitph") {
		$syllabus_id=$_POST['syllabus_id'];
		$position=$_POST['position'];
		$tq_id=$_POST['tq_id'];
		$period=$_POST['period'];
		$ph_id=$_POST['ph_id'];
		$depart =$_POST['depart'];
		$data=array();
		$msg="";
		$deadline="";
		$sql1="SELECT shs_tq.shs_num_copies FROM shs_tq WHERE shs_tq.shs_tq_id = '".$tq_id."'";
        $result1= mysql_query($sql1);
        while($row=mysql_fetch_array($result1)){
            $num_copies=$row['shs_num_copies'];
        }
        // $sql="SELECT Sum(shs_testquestions.shs_points) AS total FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_tq.shs_tq_id ='".$tq_id."'";
        // $result= mysql_query($sql);
        // while($row=mysql_fetch_array($result)){
        //     $total=$row['total'];
        // }
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
		            $query="UPDATE shs_tqstatus SET shs_status_desc='for printing' , shs_ph='".$ph_id."', shs_late='no', shs_date_time ='".$now."', shs_notif_status = 'unread' WHERE shs_tq_id='".$tq_id."'";
		                $result = mysql_query($query) or die("Query Failed update update status: ".mysql_error());
		        }else{
		            if ($today>$deadline) {
		                $query1="UPDATE shs_tqstatus SET shs_status_desc='for printing' , shs_ph='".$ph_id."', shs_late='yes', shs_date_time = '".$today."<".$deadline."', shs_notif_status = 'unread' WHERE shs_tq_id='".$tq_id."'";
		                $result1 = mysql_query($query1) or die("Query Failed update update status: ".mysql_error());
		            }else{
		                $query="UPDATE shs_tqstatus SET shs_status_desc='for printing' , shs_ph='".$ph_id."', shs_late='no', shs_date_time ='".$now."', shs_notif_status = 'unread' WHERE shs_tq_id='".$tq_id."'";
		                $result = mysql_query($query) or die("Query Failed update update status: ".mysql_error());
		            }
		        }	
		        $sqll=mysql_query("SELECT shs_testquestions.shs_q_id FROM shs_testquestions INNER JOIN shs_test_number ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_test_number.shs_tq_id ='".$tq_id."'");
		        while ($rowl=mysql_fetch_array($sqll)) {
		        	$qidd=$rowl['shs_q_id'];
		        	$queryl="UPDATE shs_question_status SET shs_status='checked' WHERE shs_q_id='".$qidd."'";
			        $result = mysql_query($queryl) or die("Query Failed question_status: ".mysql_error());
		        }
		        $querys="UPDATE shs_syll SET status='approved' WHERE shs_syll_id='".$syllabus_id."'";
			    $results = mysql_query($querys) or die("Query Failed question_status: ".mysql_error());

		        $msg="Test Questionnaire Sent!";
	        }
	        else if ($position=="Dean" AND $depart == "SHS") {
	        	if ($deadline == "" or $deadline == null) {
		            $query="UPDATE shs_tqstatus SET shs_status_desc='queue for daa' , shs_ph='".$ph_id."', shs_late='no', shs_date_time ='".$now."', shs_notif_status = 'unread' WHERE shs_tq_id='".$tq_id."'";
		                $result = mysql_query($query) or die("Query Failed update update status: ".mysql_error());
		        }else{
		            if ($today>$deadline) {
		                $query1="UPDATE shs_tqstatus SET shs_status_desc='queue for daa' , shs_ph='".$ph_id."', shs_late='yes', shs_date_time = '".$today."<".$deadline."', shs_notif_status = 'unread' WHERE shs_tq_id='".$tq_id."'";
		                $result1 = mysql_query($query1) or die("Query Failed update update status: ".mysql_error());
		            }else{
		                $query="UPDATE shs_tqstatus SET shs_status_desc='queue for daa' , shs_ph='".$ph_id."', shs_late='no', shs_date_time ='".$now."', shs_notif_status = 'unread' WHERE shs_tq_id='".$tq_id."'";
		                $result = mysql_query($query) or die("Query Failed update update status: ".mysql_error());
		            }
		        }	
		        $sqll=mysql_query("SELECT shs_testquestions.shs_q_id FROM shs_testquestions INNER JOIN shs_test_number ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_test_number.shs_tq_id ='".$tq_id."'");
		        while ($rowl=mysql_fetch_array($sqll)) {
		        	$qidd=$rowl['shs_q_id'];
		        	$queryl="UPDATE shs_question_status SET shs_status='checked' WHERE shs_q_id='".$qidd."'";
			        $result = mysql_query($queryl) or die("Query Failed question_status: ".mysql_error());
		        }
		        $querys="UPDATE shs_syll SET status='approved' WHERE shs_syll_id='".$syllabus_id."'";
			    $results = mysql_query($querys) or die("Query Failed question_status: ".mysql_error());

		        $msg="Test Questionnaire Sent!";
	        }
	        else if ($position=="Program Head" AND ($depart == "SHS" OR $depart == "GENED")) {
	        	if ($deadline == "" or $deadline == null) {
		            $query="UPDATE shs_tqstatus SET shs_status_desc='queue for dean' , shs_ph='".$ph_id."', shs_late='no', shs_date_time ='".$now."', shs_notif_status = 'unread' WHERE shs_tq_id='".$tq_id."'";
		                $result = mysql_query($query) or die("Query Failed update update status: ".mysql_error());
		        }else{
		            if ($today>$deadline) {
		                $query1="UPDATE shs_tqstatus SET shs_status_desc='queue for dean' , shs_ph='".$ph_id."', shs_late='yes', shs_date_time = '".$now."', shs_notif_status = 'unread' WHERE shs_tq_id='".$tq_id."'";
		                $result1 = mysql_query($query1) or die("Query Failed update update status: ".mysql_error());
		            }else{
		                $query="UPDATE shs_tqstatus SET shs_status_desc='queue for dean' , shs_ph='".$ph_id."', shs_late='no', shs_date_time ='".$now."', shs_notif_status = 'unread' WHERE shs_tq_id='".$tq_id."'";
		                $result = mysql_query($query) or die("Query Failed update update status: ".mysql_error());
		            }
		        }	
		        $sqll=mysql_query("SELECT shs_testquestions.shs_q_id FROM shs_testquestions INNER JOIN shs_test_number ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_test_number.shs_tq_id ='".$tq_id."'");
		        while ($rowl=mysql_fetch_array($sqll)) {
		        	$qidd=$rowl['shs_q_id'];
		        	$queryl="UPDATE shs_question_status SET shs_status='checked' WHERE shs_q_id='".$qidd."'";
			        $result = mysql_query($queryl) or die("Query Failed question_status: ".mysql_error());
		        }
		        $msg="Test Questionnaire Sent!";
	        }
	        else if ($position=="Instructor" OR ($position=="Dean" AND $depart != "SHS") OR ($position=="Program Head" AND $depart != "SHS")) {
	        	if ($deadline == "" or $deadline == null) {
		            $query="UPDATE shs_tqstatus SET shs_status_desc='queue for dean' , shs_ph='".$ph_id."', shs_late='no', shs_date_time ='".$now."', shs_notif_status = 'unread' WHERE shs_tq_id='".$tq_id."'";
		           
		            $result = mysql_query($query) or die("Query Failed update update status: ".mysql_error());
		        }else{
		            if ($today>$deadline) {
		                $query1="UPDATE shs_tqstatus SET shs_status_desc='queue for dean' , shs_ph='".$ph_id."', shs_late='yes', shs_date_time = '".$now."', shs_notif_status = 'unread' WHERE shs_tq_id='".$tq_id."'";
		                
		                $result1 = mysql_query($query1) or die("Query Failed update update status: ".mysql_error());
		            }else{
		                $query="UPDATE shs_tqstatus SET shs_status_desc='queue for dean' , shs_ph='".$ph_id."', shs_late='no', shs_date_time ='".$now."', shs_notif_status = 'unread' WHERE shs_tq_id='".$tq_id."'";
		               
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
		$sql=mysql_query("SELECT shs_testquestions.shs_q_id FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_tq.shs_tq_id = '".$tq_id."' AND shs_test_number.shs_test_number = '".$tnum."' AND shs_testquestions.shs_number = '".$qnum."'");
		if (mysql_num_rows($sql)==0) {
			$msg="error1";
		}else{
			while ($row=mysql_fetch_array($sql)) {
				$q_id=$row['shs_q_id'];

				$d1 = "DELETE FROM shs_answer WHERE shs_q_id='".$q_id."'";
	            $resulta1=mysql_query($d1) or die("Query Failed answer: ".mysql_error());
	            $d2 = "DELETE FROM shs_remarks WHERE shs_q_id='".$q_id."'";
	            $resulta2=mysql_query($d2) or die("Query Failed remarks: ".mysql_error());
	            $d3 = "DELETE FROM shs_answer_choices WHERE shs_q_id='".$q_id."'";
	            $resulta3=mysql_query($d3) or die("Query Failed answer_choices: ".mysql_error());
	            $d4 = "DELETE FROM shs_question_status WHERE shs_q_id='".$q_id."'";
	            $resulta4=mysql_query($d4) or die("Query Failed question_status: ".mysql_error());
	            $d5 = "DELETE FROM shs_testquestions WHERE shs_q_id='".$q_id."'";
	            $resulta5=mysql_query($d5) or die("Query Failed question_status: ".mysql_error());
	            $msg="success";
			}
			

            $sql1=mysql_query("SELECT shs_testquestions.shs_q_id FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_tq.shs_tq_id = '".$tq_id."' AND shs_test_number.shs_test_number = '".$tnum."' ORDER BY shs_testquestions.shs_number ASC");
			if (mysql_num_rows($sql1)==0) {
			}else{
				$i=1;
				while ($row=mysql_fetch_array($sql1)) {
					
					$q_id=$row['shs_q_id'];
					$querytd= "UPDATE shs_testquestions SET shs_testquestions.shs_number='".$i."' WHERE shs_q_id='".$q_id."'";
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
		$querytd= "UPDATE shs_tq SET shs_tq.shs_main_attach='' WHERE shs_tq_id='".$tq_id."'";
        $result1 = mysql_query($querytd) or die("Query Failed update tq: ".mysql_error());

		$data[]=['msg'=>"Attachment deleted!"];
		echo json_encode($data);
	}else if ($page=="deletetos") {
		$tq_id=$_POST['tq_id'];
		$data=array();
		$query="SELECT shs_upload_tos FROM shs_tq WHERE shs_tq_id='".$tq_id."'";
		$results2 = mysql_query($query);
        if($results2){
        	while ($row=mysql_fetch_array($results2)) {
				unlink("shs_upload_tos/".$row['shs_upload_tos']);
			}
        }
			
		$querytd= "UPDATE shs_tq SET shs_tq.shs_upload_tos='' WHERE shs_tq_id='".$tq_id."'";
        $result1 = mysql_query($querytd) or die("Query Failed update tos: ".mysql_error());

		$data[]=['msg'=>"TOS deleted!"];

		echo json_encode($data);
	}else if ($page=="deletetq") {
		$tq_id=$_POST['tq_id'];
		$data=array();
		$query="SELECT shs_upload_tq FROM shs_tq WHERE shs_tq_id='".$tq_id."'";
		$results1 = mysql_query($query);
        if($results1){
        	while ($row=mysql_fetch_array($results1)) {
				unlink("shs_upload_tq/".$row['shs_upload_tq']);
			}
        }
			
		$querytd= "UPDATE shs_tq SET shs_tq.shs_upload_tq='' WHERE shs_tq_id='".$tq_id."'";
        $result1 = mysql_query($querytd) or die("Query Failed update tq: ".mysql_error());

		$data[]=['msg'=>"TQ deleted! "];

		echo json_encode($data);
	}else if ($page=="delattdirect") {
		$tq_id=$_POST['tq_id'];
		$tnum=$_POST['tnum'];
		$data=array();
		$querytd= "UPDATE shs_test_number SET shs_test_number.shs_attachment='' WHERE shs_test_number.shs_test_number = '".$tnum."' AND shs_test_number.shs_tq_id ='".$tq_id."'";
        $result1 = mysql_query($querytd) or die("Query Failed update test_number: ".mysql_error());

		$data[]=['msg'=>"Attachment deleted!"];
		echo json_encode($data);
	}else if ($page=="delattquest") {
		$tq_id=$_POST['tq_id'];
		$tnum=$_POST['tnum'];
		$qnum=$_POST['qnum'];
		$test_id="";
		$sql=mysql_query("SELECT shs_test_number.shs_test_id FROM shs_test_number WHERE shs_test_number.shs_tq_id = '".$tq_id."' AND shs_test_number.shs_test_number = '".$tnum."'");
		if (mysql_num_rows($sql)==0) {
		}else{
			while ($row=mysql_fetch_array($sql)) {
				$test_id=$row['shs_test_id'];
			}
		}
		$data=array();
		$querytd= "UPDATE shs_testquestions SET shs_testquestions.shs_attachment='' WHERE shs_testquestions.shs_number = '".$qnum."' AND shs_testquestions.shs_test_id = '".$test_id."'";
        $result1 = mysql_query($querytd) or die("Query Failed update testquestions: ".mysql_error());

		$data[]=['msg'=>"Attachment deleted!"];
		echo json_encode($data);
	}else if ($page=="savestud") {
		$num=$_POST['num'];
		$tqid=$_POST['tqid'];
		mysql_query("UPDATE shs_tq SET shs_num_copies='".$num."' WHERE shs_tq_id='".$tqid."'");
	}
}


?>