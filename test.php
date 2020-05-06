<?php
$connection = mysql_connect('localhost','root','') or die(mysql_error());
$database = mysql_select_db('testbank') or die(mysql_error());
$data= array();
		$td= array();
		$td1= array();
		$noh= array();
		$tq_id="13";
		$period="1";
		$syllabus_id="23";
		$sql=mysql_query('SELECT * FROM topics WHERE topics.syllabus_id = '.$syllabus_id.' AND topics.exam_id <= "4" AND topics.ilo <> "Examination Week" AND topics.ilo <> "Examination Week" AND topics.ilo <> "Examination Week" AND topics.ilo <> "Examination Week"');
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
			$data[]=['data'=>"false", 'selecttopic'=>$td1 , 'status_desc'=>$status_desc ];
		}
		echo json_encode($data);
?>
