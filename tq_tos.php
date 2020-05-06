<?php
$connection = mysql_connect('localhost','root','') or die(mysql_error());
$database = mysql_select_db('testbank') or die(mysql_error());

if (!empty($_GET)) {
	$page=$_GET['p'];
	if ($page=='savetos') {
		$tq_id=$_POST['tq_id1'];
		$kno_ni=$_POST['kno_ni1'];
		$com_ni=$_POST['com_ni1'];
		$app_ni=$_POST['app_ni1'];
		$ana_ni=$_POST['ana_ni1'];
		$eva_ni=$_POST['eva_ni1'];
		$eva_ni=$_POST['eva_ni1'];
		$syn_ni=$_POST['syn_ni1'];
		$kno_np=$_POST['kno_np1'];
		$com_np=$_POST['com_np1'];
		$app_np=$_POST['app_np1'];
		$ana_np=$_POST['ana_np1'];
		$eva_np=$_POST['eva_np1'];
		$syn_np=$_POST['syn_np1'];
		$totalnh=$_POST['totalnh1'];
		$topicd=$_POST['topicd1'];
		
		
		$sql=mysql_query("SELECT * FROM tos WHERE tq_id = '".$tq_id."'");
		if (mysql_num_rows($sql)==0) {
			$query = "INSERT INTO `tos` (`tos_id`,`kno_ni`,`com_ni`,`app_ni`,`ana_ni`,`eva_ni`,`syn_ni`,`kno_np`,`com_np`,`app_np`,`ana_np`,`eva_np`,`syn_np`,`tq_id`) VALUES ('','".$kno_ni."','".$com_ni."','".$app_ni."','".$ana_ni."','".$eva_ni."','".$syn_ni."','".$kno_np."','".$com_np."','".$app_np."','".$ana_np."','".$eva_np."','".$syn_np."','".$tq_id."')";
			$result=mysql_query($query) or die("Query Failed tos: ".mysql_error());
			$tos_id =mysql_insert_id();
			foreach($totalnh as $i => $value){
				$query1 = "INSERT INTO `tos_topic` (`tostopic_id`,`topic_desc`,`num_of_hours`,`tos_id`) VALUES ('','".$topicd[$i]."','".$totalnh[$i]."','".$tos_id."')";
				$result1=mysql_query($query1) or die("Query Failed tos topic: ".mysql_error());
			}
		}else{
			while ($row1=mysql_fetch_array($sql)) {
				$tos_id=$row1['tos_id'];
			}
			$query1 = "UPDATE tos SET kno_ni='".$kno_ni."', com_ni='".$com_ni."', app_ni='".$app_ni."', ana_ni='".$ana_ni."', eva_ni='".$eva_ni."',syn_ni='".$syn_ni."', kno_np='".$kno_np."', com_np='".$com_np."', app_np='".$app_np."', ana_np='".$ana_np."', eva_np='".$eva_np."',syn_np='".$syn_np."'  WHERE tos_id='".$tos_id."'";
			$result1=mysql_query($query1) or die("Query Failed UPDATE TOS: ".mysql_error());
			$delete1 = "DELETE FROM tos_topic WHERE tos_id='".$tos_id."'";
			$resultb=mysql_query($delete1) or die("Query Failed DELETE TOS: ".mysql_error());
			
			foreach($totalnh as $i => $value){
				$query1 = "INSERT INTO `tos_topic` (`tostopic_id`,`topic_desc`,`num_of_hours`,`tos_id`) VALUES ('','".$topicd[$i]."','".$totalnh[$i]."','".$tos_id."')";
				$result1=mysql_query($query1) or die("Query Failed tos topic: ".mysql_error());
			}
			

		}

	}else if ($page=='shssavetos') {
		$tq_id=$_POST['tq_id1'];
		$kno_ni=$_POST['kno_ni1'];
		$com_ni=$_POST['com_ni1'];
		$app_ni=$_POST['app_ni1'];
		$ana_ni=$_POST['ana_ni1'];
		$eva_ni=$_POST['eva_ni1'];
		$eva_ni=$_POST['eva_ni1'];
		$syn_ni=$_POST['syn_ni1'];
		$kno_np=$_POST['kno_np1'];
		$com_np=$_POST['com_np1'];
		$app_np=$_POST['app_np1'];
		$ana_np=$_POST['ana_np1'];
		$eva_np=$_POST['eva_np1'];
		$syn_np=$_POST['syn_np1'];
		$totalnh=$_POST['totalnh1'];
		$topicd=$_POST['topicd1'];
		
		
		$sql=mysql_query("SELECT * FROM shs_tos WHERE shs_tq_id = '".$tq_id."'");
		if (mysql_num_rows($sql)==0) {
			$query = "INSERT INTO `shs_tos` (`shs_tos_id`,`shs_kno_ni`,`shs_com_ni`,`shs_app_ni`,`shs_ana_ni`,`shs_eva_ni`,`shs_syn_ni`,`shs_kno_np`,`shs_com_np`,`shs_app_np`,`shs_ana_np`,`shs_eva_np`,`shs_syn_np`,`shs_tq_id`) VALUES ('','".$kno_ni."','".$com_ni."','".$app_ni."','".$ana_ni."','".$eva_ni."','".$syn_ni."','".$kno_np."','".$com_np."','".$app_np."','".$ana_np."','".$eva_np."','".$syn_np."','".$tq_id."')";
			$result=mysql_query($query) or die("Query Failed shs_tos: ".mysql_error());
			$tos_id =mysql_insert_id();
			foreach($totalnh as $i => $value){
				$query1 = "INSERT INTO `shs_tos_topic` (`shs_tostopic_id`,`shs_topic_desc`,`shs_num_of_hours`,`shs_tos_id`) VALUES ('','".$topicd[$i]."','".$totalnh[$i]."','".$tos_id."')";
				$result1=mysql_query($query1) or die("Query Failed tos topic: ".mysql_error());
			}
		}else{
			while ($row1=mysql_fetch_array($sql)) {
				$tos_id=$row1['shs_tos_id'];
			}
			$query1 = "UPDATE shs_tos SET shs_kno_ni='".$kno_ni."', shs_com_ni='".$com_ni."', shs_app_ni='".$app_ni."', shs_ana_ni='".$ana_ni."', shs_eva_ni='".$eva_ni."', shs_syn_ni='".$syn_ni."', shs_kno_np='".$kno_np."', shs_com_np='".$com_np."', shs_app_np='".$app_np."', shs_ana_np='".$ana_np."', shs_eva_np='".$eva_np."', shs_syn_np='".$syn_np."'  WHERE shs_tos_id='".$tos_id."'";
			$result1=mysql_query($query1) or die("Query Failed shs_tos TOS: ".mysql_error());
			$delete1 = "DELETE FROM shs_tos_topic WHERE shs_tos_id='".$tos_id."'";
			$resultb=mysql_query($delete1) or die("Query Failed DELETE shs_TOS: ".mysql_error());
			
			foreach($totalnh as $i => $value){
				$query1 = "INSERT INTO `shs_tos_topic` (`shs_tostopic_id`,`shs_topic_desc`,`shs_num_of_hours`,`shs_tos_id`) VALUES ('','".$topicd[$i]."','".$totalnh[$i]."','".$tos_id."')";
				$result1=mysql_query($query1) or die("Query Failed shs_tos topic: ".mysql_error());
			}
			

		}

	}else if ($page=='checktos') {
		$data= array();
		$td= array();
		$td1= array();
		$noh= array();
		$tq_id=$_POST['tq_id'];
		$period=$_POST['period'];
		$syllabus_id=$_POST['syllabus_id'];
		$sql=mysql_query('SELECT * FROM topics WHERE topics.syllabus_id = '.$syllabus_id.' AND topics.exam_id <= "4" AND topics.idsa <> "Examination Week" AND topics.idsa <> "Examination Week" AND topics.idsa <> "Examination Week" AND topics.idsa <> "Examination Week"');
			while ($row=mysql_fetch_array($sql)) {
				$td1[]=$row['topic_description'];
				
			}
		$sql=mysql_query("SELECT * FROM tos WHERE tq_id = '".$tq_id."'");
		if (mysql_num_rows($sql)>0) {
			while ($row=mysql_fetch_array($sql)) {
				$tos_id=$row['tos_id'];
				$kno_ni=$row['kno_ni'];
				$com_ni=$row['com_ni'];
				$app_ni=$row['app_ni'];
				$ana_ni=$row['ana_ni'];
				$eva_ni=$row['eva_ni'];
				$syn_ni=$row['syn_ni'];
				$kno_np=$row['kno_np'];
				$com_np=$row['com_np'];
				$app_np=$row['app_np'];
				$ana_np=$row['ana_np'];
				$eva_np=$row['eva_np'];
				$syn_np=$row['syn_np'];
			}
			$sql1=mysql_query("SELECT * FROM tos_topic WHERE tos_id = '".$tos_id."'");
			while ($row=mysql_fetch_array($sql1)) {
				$num_of_hours=$row['num_of_hours'];
				$topic_desc=$row['topic_desc'];
				$td[]=$topic_desc;
				$noh[]=$num_of_hours;
			}
			$sqlst=mysql_query("SELECT tqstatus.status_desc FROM tqstatus WHERE tqstatus.tq_id ='".$tq_id."'");
			while ($row=mysql_fetch_array($sqlst)) {
				$status_desc=$row['status_desc'];
			}

			$sqlst2=mysql_query("SELECT sched_subj.department FROM syllabus INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id WHERE syllabus.syllabus_id = '".$syllabus_id."'");
			while ($row=mysql_fetch_array($sqlst2)) {
				$department=$row['department'];
			}

			$data[]=['data'=>"true",'kno_ni'=>$kno_ni,'com_ni'=>$com_ni,'app_ni'=>$app_ni,'ana_ni'=>$ana_ni,'eva_ni'=>$eva_ni,'syn_ni'=>$syn_ni,'kno_np'=>$kno_np,'com_np'=>$com_np,'app_np'=>$app_np,'ana_np'=>$ana_np,'eva_np'=>$eva_np,'syn_np'=>$syn_np,'topic_desc'=>$td,'num_of_hours'=>$noh, 'selecttopic'=>$td1, 'status_desc'=>$status_desc, 'department'=>$department ];
		}else{
			$sqlst=mysql_query("SELECT tqstatus.status_desc FROM tqstatus WHERE tqstatus.tq_id ='".$tq_id."'");
			while ($row=mysql_fetch_array($sqlst)) {
				$status_desc=$row['status_desc'];
			}
			$sqlst2=mysql_query("SELECT sched_subj.department FROM syllabus INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id WHERE syllabus.syllabus_id = '".$syllabus_id."'");
			while ($row=mysql_fetch_array($sqlst2)) {
				$department=$row['department'];
			}
			$data[]=['data'=>"false", 'selecttopic'=>$td1 , 'status_desc'=>$status_desc , 'department'=>$department  ];
		}

	echo json_encode($data);
	}else if ($page=='shschecktos') {
		$data= array();
		$td= array();
		$td1= array();
		$noh= array();
		$tq_id=$_POST['tq_id'];
		$syllabus_id=$_POST['syllabus_id'];
		$sql=mysql_query("SELECT shs_topics.shs_topic_description, shs_syll.shs_syll_id, shs_subject.shs_subj_id FROM shs_syll INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN shs_topics ON shs_topics.shs_subj_id = shs_subject.shs_subj_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id WHERE shs_syll.shs_syll_id = '".$syllabus_id."' AND shs_tq.shs_tq_id = '".$tq_id."'");
			while ($row=mysql_fetch_array($sql)) {
				$td1[]=$row['shs_topic_description'];
				
			}
		$sql=mysql_query("SELECT shs_tos.shs_tos_id, shs_tos.shs_kno_ni, shs_tos.shs_com_ni, shs_tos.shs_app_ni, shs_tos.shs_ana_ni, shs_tos.shs_eva_ni, shs_tos.shs_syn_ni, shs_tos.shs_kno_np, shs_tos.shs_com_np, shs_tos.shs_app_np, shs_tos.shs_ana_np, shs_tos.shs_eva_np, shs_tos.shs_syn_np, shs_tos.shs_tq_id FROM shs_tos WHERE shs_tos.shs_tq_id = '".$tq_id."'");
		if (mysql_num_rows($sql)>0) {
			while ($row=mysql_fetch_array($sql)) {
				$tos_id=$row['shs_tos_id'];
				$kno_ni=$row['shs_kno_ni'];
				$com_ni=$row['shs_com_ni'];
				$app_ni=$row['shs_app_ni'];
				$ana_ni=$row['shs_ana_ni'];
				$eva_ni=$row['shs_eva_ni'];
				$syn_ni=$row['shs_syn_ni'];
				$kno_np=$row['shs_kno_np'];
				$com_np=$row['shs_com_np'];
				$app_np=$row['shs_app_np'];
				$ana_np=$row['shs_ana_np'];
				$eva_np=$row['shs_eva_np'];
				$syn_np=$row['shs_syn_np'];
			}
			$sql1=mysql_query("SELECT * FROM shs_tos_topic WHERE shs_tos_id = '".$tos_id."'");
			while ($row=mysql_fetch_array($sql1)) {
				$num_of_hours=$row['shs_num_of_hours'];
				$topic_desc=$row['shs_topic_desc'];
				$td[]=$topic_desc;
				$noh[]=$num_of_hours;
			}
			$sqlst=mysql_query("SELECT shs_tqstatus.shs_status_desc FROM shs_tqstatus WHERE shs_tqstatus.shs_tq_id ='".$tq_id."'");
			while ($row=mysql_fetch_array($sqlst)) {
				$status_desc=$row['shs_status_desc'];
			}
			$data[]=['data'=>"true",'kno_ni'=>$kno_ni,'com_ni'=>$com_ni,'app_ni'=>$app_ni,'ana_ni'=>$ana_ni,'eva_ni'=>$eva_ni,'syn_ni'=>$syn_ni,'kno_np'=>$kno_np,'com_np'=>$com_np,'app_np'=>$app_np,'ana_np'=>$ana_np,'eva_np'=>$eva_np,'syn_np'=>$syn_np,'topic_desc'=>$td,'num_of_hours'=>$noh, 'selecttopic'=>$td1, 'status_desc'=>$status_desc ];
		}else{
			$sqlst=mysql_query("SELECT shs_tqstatus.shs_status_desc FROM shs_tqstatus WHERE shs_tqstatus.shs_tq_id ='".$tq_id."'");
			while ($row=mysql_fetch_array($sqlst)) {
				$status_desc=$row['shs_status_desc'];
			}
			$data[]=['data'=>"false", 'selecttopic'=>$td1 , 'status_desc'=>$status_desc ];
		}

	echo json_encode($data);
	}else if ($page=='shsaddsub') {
		$subj=$_POST['subj'];
		$sy=$_POST['sy'];
		$sem=$_POST['sem'];
		$emp_id=$_POST['emp_id'];
		$data=array();
		// $addsubyear=date("Y");
		// $addsubmonth=date("F");
		// if ($addsubmonth=="May" or$addsubmonth=="June" or $addsubmonth=="July" or $addsubmonth=="August" or $addsubmonth=="September" or $addsubmonth=="October" or $addsubmonth=="November" or $addsubmonth=="December"){
		//     $addsubyear1=$addsubyear;
		//     $addsubyear2=$addsubyear+1;
		    
		//     if ($addsubmonth=="May" or$addsubmonth=="June" or $addsubmonth=="July" or $addsubmonth=="August" or $addsubmonth=="September" or $addsubmonth=="October"){
		// 		$sem=1;
		//     }else{
		//     	$sem=2;
		//     }
		// }else{
		//     $addsubyear1=$addsubyear-1;
		//     $addsubyear2=$addsubyear;
		//     if ($addsubmonth=="May" or$addsubmonth=="June" or $addsubmonth=="July" or $addsubmonth=="August" or $addsubmonth=="September" or $addsubmonth=="October"){
		// 		$sem=1;
		//     }else{
		//     	$sem=2;
		//     }
		// }
		// $sy=$addsubyear1."-".$addsubyear2;
		$sqlds = "SELECT shs_syll.`shs_syll_id`, shs_syll.`status` FROM shs_syll INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id WHERE shs_syll.employment_id = '".$emp_id."' AND shs_syll.sem_id = '".$sem."' AND school_year.sy = '".$sy."' AND shs_syll.shs_subj_id ='".$subj."'";
        $resultds = mysql_query($sqlds);

        if (mysql_num_rows($resultds)==0) {
        	$sql = "SELECT school_year.sy_id FROM school_year WHERE school_year.sy = '".$sy."'";
	        $result = mysql_query($sql);
	        if (mysql_num_rows($result)==0) {
	        	$insert1 = "INSERT INTO `school_year` (`sy`) VALUES ('".$sy."')";
				$ins1=mysql_query($insert1) or die("Query Failed : ".mysql_error());
				$sy_id=mysql_insert_id();
	        }else{
	        	while($row=mysql_fetch_array($result)){
		        	$sy_id=$row['sy_id'];
		        }
	        }
	        $insert = "INSERT INTO `shs_syll` (`shs_syll_id`,status,`shs_subj_id`,`sem_id`,`sy_id`,`employment_id`) VALUES ('','pending','".$subj."','".$sem."','".$sy_id."','".$emp_id."')";
			$exe=mysql_query($insert) or die("Query Failed : ".mysql_error());
			$shs_syll_id=mysql_insert_id();
	        $sqlper= mysql_query("SELECT DISTINCT shs_topics.exam_id, major_exams.exam_period FROM shs_subject INNER JOIN shs_topics ON shs_topics.shs_subj_id = shs_subject.shs_subj_id INNER JOIN major_exams ON shs_topics.exam_id = major_exams.exam_id WHERE shs_subject.shs_subj_id = '".$subj."'");
	        while ($rowper=mysql_fetch_array($sqlper)) {
	        	$exam_id=$rowper['exam_id'];
	        	$exam_period=$rowper['exam_period'];

	        	$insert1 = "INSERT INTO `shs_tq` (`shs_tq_id`,`exam_id`,`shs_syll_id`) VALUES ('','".$exam_id."','".$shs_syll_id."')";
				$exe1=mysql_query($insert1) or die("Query Failed : ".mysql_error());
				$shs_tq_id1=mysql_insert_id();
				$insert2 = "INSERT INTO `shs_tqstatus` (`shs_status_id`,`shs_status_desc`,`shs_notif_status`,`shs_tq_id`) VALUES ('','pending','unread','".$shs_tq_id1."')";
				$exe2=mysql_query($insert2) or die("Query Failed : ".mysql_error());
	        	
	        }
        }else{
        	while ($row3=mysql_fetch_array($resultds)) {
	        	$shs_syll_id=$row3['shs_syll_id'];
	        	$status=$row3['status'];
	        }
	        $sql1=mysql_query("SELECT shs_tq.shs_tq_id FROM shs_tq WHERE shs_tq.shs_syll_id ='".$shs_syll_id."'");
	        if (mysql_num_rows($sql1)==0) {
	        	$sqlper= mysql_query("SELECT DISTINCT shs_topics.exam_id, major_exams.exam_period FROM shs_subject INNER JOIN shs_topics ON shs_topics.shs_subj_id = shs_subject.shs_subj_id INNER JOIN major_exams ON shs_topics.exam_id = major_exams.exam_id WHERE shs_subject.shs_subj_id = '".$subj."'");
		        while ($rowper=mysql_fetch_array($sqlper)) {
		        	$exam_id=$rowper['exam_id'];
		        	$exam_period=$rowper['exam_period'];

		        	$insert1 = "INSERT INTO `shs_tq` (`shs_tq_id`,`exam_id`,`shs_syll_id`) VALUES ('','".$exam_id."','".$shs_syll_id."')";
					$exe1=mysql_query($insert1) or die("Query Failed : ".mysql_error());
					$shs_tq_id1=mysql_insert_id();
					$insert2 = "INSERT INTO `shs_tqstatus` (`shs_status_id`,`shs_status_desc`,`shs_notif_status`,`shs_tq_id`) VALUES ('','pending','unread','".$shs_tq_id1."')";
					$exe2=mysql_query($insert2) or die("Query Failed : ".mysql_error());
	        	}
        	}
        }

			
        
	}else if($page=='getsub') {
		$data=array();
		$msg=array();
		$id=array();
		$sy=$_POST['sy'];
		$sem=$_POST['sem'];
		$shs_syll_id="";
		$emp_id=$_POST['emp_id'];
		// $addsubyear=date("Y");
		// $addsubmonth=date("F");
		// if ($addsubmonth=="May" or$addsubmonth=="June" or $addsubmonth=="July" or $addsubmonth=="August" or $addsubmonth=="September" or $addsubmonth=="October" or $addsubmonth=="November" or $addsubmonth=="December"){
		//     $addsubyear1=$addsubyear;
		//     $addsubyear2=$addsubyear+1;
		    
		//     if ($addsubmonth=="May" or$addsubmonth=="June" or $addsubmonth=="July" or $addsubmonth=="August" or $addsubmonth=="September" or $addsubmonth=="October"){
		// 		$sem=1;
		//     }else{
		//     	$sem=2;
		//     }
		// }else{
		//     $addsubyear1=$addsubyear-1;
		//     $addsubyear2=$addsubyear;
		//     if ($addsubmonth=="May" or$addsubmonth=="June" or $addsubmonth=="July" or $addsubmonth=="August" or $addsubmonth=="September" or $addsubmonth=="October"){
		// 		$sem=1;
		//     }else{
		//     	$sem=2;
		//     }
		// }
		// $sy=$addsubyear1."-".$addsubyear2;
		$sql = "SELECT shs_subject.shs_subj_name, shs_syll.shs_syll_id FROM shs_syll INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id WHERE shs_syll.employment_id = '".$emp_id."' AND shs_syll.sem_id = '".$sem."' AND school_year.sy = '".$sy."' AND shs_syll.`status` = 'pending' ";
        $result = mysql_query($sql);
        if(!$result){
            $msg[]='Error Database';
        }else{
            if (mysql_num_rows($result)==0) {
                $msg[]='No subject found';            
            }else{
                while($row=mysql_fetch_array($result)){
                    $subj_name=$row['shs_subj_name'];
                    $shs_syll_id=$row['shs_syll_id'];
                    $msg[]=$subj_name;
                    $id[]=$shs_syll_id;
                }
            }
        }
	    $data[]=['msg'=>$msg, 'emp_id'=>$emp_id, 'sem'=>$sem, 'sy'=>$sy, 'id'=>$id];
		echo json_encode($data);
	}elseif ($page=='deletesub') {
		$delt=$_GET['del'];
		$sql=mysql_query("SELECT shs_tq_id FROM shs_tq WHERE shs_syll_id='".$delt."'");
		while ($row=mysql_fetch_array($sql)) {
			$shs_tq_id=$row['shs_tq_id'];
			$sql2=mysql_query("SELECT shs_test_number.shs_test_id FROM shs_test_number WHERE shs_test_number.shs_tq_id ='".$shs_tq_id."'");

			while ($row2=mysql_fetch_array($sql2)) {
				$shs_test_id=$row2['shs_test_id'];
				$sql2=mysql_query("SELECT shs_testquestions.shs_q_id FROM shs_testquestions WHERE shs_testquestions.shs_test_id ='".$shs_test_id."'");
				while ($row2=mysql_fetch_array($sql2)) {
					$shs_q_id=$row2['shs_q_id'];
					$del3 = "DELETE FROM shs_question_status WHERE shs_q_id='".$shs_q_id."'";
					$result3=mysql_query($del3) or die("shs_question_status: ".mysql_error());
					$del4 = "DELETE FROM shs_answer_choices WHERE shs_q_id='".$shs_q_id."'";
					$result4=mysql_query($del4) or die("shs_answer_choices: ".mysql_error());
					$del5 = "DELETE FROM shs_remarks WHERE shs_q_id='".$shs_q_id."'";
					$result5=mysql_query($del5) or die("shs_remarks: ".mysql_error());
					$del6 = "DELETE FROM shs_answer WHERE shs_q_id='".$shs_q_id."'";
					$result6=mysql_query($del6) or die("shs_answer: ".mysql_error());
					$del7 = "DELETE FROM shs_testquestions WHERE shs_q_id='".$shs_q_id."'";
					$result7=mysql_query($del7) or die("shs_testquestions: ".mysql_error());
					
				}
				$del2 = "DELETE FROM shs_question_type WHERE shs_test_id='".$shs_test_id."'";
				$result2=mysql_query($del2) or die("shs_question_type: ".mysql_error());
				$del9 = "DELETE FROM shs_test_number WHERE shs_test_id='".$shs_test_id."'";
				$result9=mysql_query($del9) or die("shs_test_number: ".mysql_error());
			}
			$del = "DELETE FROM shs_tqstatus WHERE shs_tq_id='".$shs_tq_id."'";
			$result=mysql_query($del) or die("shs_tqstatus: ".mysql_error());
			$sql1=mysql_query("SELECT shs_tos_id FROM shs_tos WHERE shs_tq_id='".$shs_tq_id."'");
			while ($row1=mysql_fetch_array($sql1)) {
				$shs_tos_id=$row1['shs_tos_id'];
				$del1 = "DELETE FROM shs_tos_topic WHERE shs_tos_id='".$shs_tos_id."'";
				$result1=mysql_query($del1) or die("shs_tos_topic: ".mysql_error());
				$del1 = "DELETE FROM shs_tos WHERE shs_tos_id='".$shs_tos_id."'";
				$result2=mysql_query($del1) or die("shs_tos: ".mysql_error());
			}
			$del8 = "DELETE FROM shs_tq WHERE shs_tq_id='".$shs_tq_id."'";
			$result8=mysql_query($del8) or die("shs_tq: ".mysql_error());


		}
		$del6 = "DELETE FROM shs_syll WHERE shs_syll_id='".$delt."'";
		$result6=mysql_query($del6) or die("syllabus_remarks: ".mysql_error());
			
	}elseif ($page=='loadshs') {
		$emp_id=$_POST['emp_id'];
		$data=array();
		$sub=array();
		$sy=array();
		$sem=array();
		$syllid=array();
		$tqid1=array();
		$tqid2=array();
		$period1=array();
		$period2=array();
		$status1=array();
		$status2=array();
		$id=array();
		// $addsubyear=date("Y");
		// $addsubmonth=date("F");
		// if ($addsubmonth=="May" or$addsubmonth=="June" or $addsubmonth=="July" or $addsubmonth=="August" or $addsubmonth=="September" or $addsubmonth=="October" or $addsubmonth=="November" or $addsubmonth=="December"){
		//     $addsubyear1=$addsubyear;
		//     $addsubyear2=$addsubyear+1;
		    
		//     if ($addsubmonth=="May" or$addsubmonth=="June" or $addsubmonth=="July" or $addsubmonth=="August" or $addsubmonth=="September" or $addsubmonth=="October"){
		// 		$sem=1;
		//     }else{
		//     	$sem=2;
		//     }
		// }else{
		//     $addsubyear1=$addsubyear-1;
		//     $addsubyear2=$addsubyear;
		//     if ($addsubmonth=="May" or$addsubmonth=="June" or $addsubmonth=="July" or $addsubmonth=="August" or $addsubmonth=="September" or $addsubmonth=="October"){
		// 		$sem=1;
		//     }else{
		//     	$sem=2;
		//     }
		// }
		// $sy=$addsubyear1."-".$addsubyear2;
		$sql = "SELECT shs_subject.shs_subj_name, shs_syll.shs_syll_id, school_year.sy, semester.semester FROM shs_syll INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id WHERE shs_syll.employment_id ='".$emp_id."' ORDER BY school_year.sy DESC, semester.semester DESC ";
        $result = mysql_query($sql);
        if(!$result){
            $sub[]='Error Database';
        }else{
            if (mysql_num_rows($result)==0) {
                $sub[]='No subject found';            
            }else{
                while($row=mysql_fetch_array($result)){
                    $subj_name=$row['shs_subj_name'];
                    $shs_syll_id=$row['shs_syll_id'];
                    $sy1=$row['sy'];
                    $sem1=$row['semester'];
                    $sem[]=$sem1;
                    $sy[]=$sy1;
                    $sub[]=$subj_name;
                    $syllid[]=$shs_syll_id;
                    $sql1 = mysql_query("SELECT shs_tq.shs_tq_id, shs_tqstatus.shs_status_desc, major_exams.exam_period, major_exams.exam_period FROM shs_tq INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id WHERE shs_tq.shs_syll_id ='".$shs_syll_id."'");
                    $i=0;
                    if (!$sql1) {
                    	# code...
                    }else{
                    	while($row=mysql_fetch_array($sql1)){
	                    	$i++;
	                    	$shs_tq_id=$row['shs_tq_id'];
	                    	$shs_status_desc=$row['shs_status_desc'];
	                    	$exam_period=$row['exam_period'];
	                    	if ($i=="1") {
	                    		$tqid1[]=$shs_tq_id;
	                    		$period1[]=$exam_period;
	                    		$status1[]=$shs_status_desc;
	                    	}else{
	                    		$tqid2[]=$shs_tq_id;
	                    		$period2[]=$exam_period;
	                    		$status2[]=$shs_status_desc;
	                    	}
	                    }
                    }
	                    
                }
            }
        }
	    $data[]=['sy'=>$sy,'sem'=>$sem,'syll'=>$syllid, 'sub'=>$sub, 'tqid1'=>$tqid1, 'period1'=>$period1, 'status1'=>$status1, 'tqid2'=>$tqid2, 'period2'=>$period2, 'status2'=>$status2];
		echo json_encode($data);
			
	}




}


?>