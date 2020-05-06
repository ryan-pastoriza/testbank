<?php
$connection = mysql_connect('localhost','root','') or die(mysql_error());
$database = mysql_select_db('testbank') or die(mysql_error());

if (!empty($_GET)) {
	$page=$_GET['p'];
	if ($page=='createclo') {
		$id=$_POST['id1'];
		$cloc1=mysql_real_escape_string($_POST['cloc1']);
		$clod1=mysql_real_escape_string($_POST['clod1']);
		$pgoval=$_POST['pgoval1'];
		
		$status="checked";
		$data = array();
		$sql1=mysql_query("SELECT syllabusstatus.syll_status_desc FROM syllabus INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id WHERE syllabusstatus.syllabus_id = '".$id."'");
		
		while ($row1=mysql_fetch_array($sql1)) {
			$status_desc=$row1['syll_status_desc'];
		}
		if ($status_desc=="pending") {
			$insert = "INSERT INTO `clo_ilo` (`clo_id`,`cloc`,`clod`,`clo_datetime`,`revise`,`syllabus_id`) VALUES ('','".$cloc1."','".$clod1."',NOW(),0,'".$id."')";
			$exe=mysql_query($insert) or die("Query Failed : ".mysql_error());
			$clo_id=mysql_insert_id();

			if ($pgoval[1]=="none") {
				
			}else{
				$sql=mysql_query("SELECT * from pgo");
				while($row = mysql_fetch_array($sql)){
					$pgo_id=$row['pgo_id'];
					$insert1 = "INSERT INTO `pgo_clo` (`pgoclo_id`,`pgo_id`,`clo_id`,`status`) VALUES ('','".$pgo_id."','".$clo_id."','')";
					$exe=mysql_query($insert1) or die("Query Failed : ".mysql_error());
				}
				foreach ($pgoval as $pgoid) {
					$query= 'UPDATE pgo_clo SET status="'.$status.'" WHERE pgo_id="'.$pgoid.'" AND clo_id="'.$clo_id.'"';
					$result = mysql_query($query) or die("Query Failed".mysql_error());
				}
			}
				
			$data[]=['msg'=>"Successfully Saved!"];
			
		}else if ($status_desc=="queue for dean") {
			$data[]=['msg'=>"Cannot create CLO! Syllabus is still in queue!"];
			
		}else if ($status_desc=="approved") {
			$data[]=['msg'=>"Cannot create CLO! Syllabus is already approved!"];
			
		}
		
		echo json_encode($data);
			
		
	}else if($page=='updateclo'){
		$updateid=$_POST['updateid'];
		$cloc1=mysql_real_escape_string($_POST['cloc1']);
		$clod1=mysql_real_escape_string($_POST['clod1']);
		$rev=$_POST['rev1'];
		$cloval=$_POST['cloval1'];
		$status="checked";
		$rev2=$rev+1;

		$query= 'UPDATE clo_ilo SET cloc="'.$cloc1.'", clod="'.$clod1.'", revise="'.$rev2.'" WHERE clo_id="'.$updateid.'"';
		$result = mysql_query($query) or die("Query Failed update insertemp: ".mysql_error());

		$query1= 'UPDATE pgo_clo SET status=" " WHERE clo_id="'.$updateid.'"';
		$result1 = mysql_query($query1) or die("Query Failed".mysql_error());

		foreach ($cloval as $pgoid) {
			$query= 'UPDATE pgo_clo SET status="'.$status.'" WHERE clo_id="'.$updateid.'" AND pgo_id="'.$pgoid.'"';
			$result = mysql_query($query) or die("Query Failed".mysql_error());
		}
	}else if($page=='deleteclo'){
		$del=$_GET['del'];
		$syllabus_id=$_GET['id1'];
		$sqlcheck=mysql_query("SELECT syllabusstatus.syll_status_desc FROM syllabusstatus WHERE syllabusstatus.syllabus_id = $syllabus_id");
		while ($row1=mysql_fetch_array($sqlcheck)) {
			$status_desc=$row1['syll_status_desc'];
		}
		if ($status_desc=="pending") {
			$delete = "DELETE FROM pgo_clo WHERE clo_id='".$del."'";
			$resulta=mysql_query($delete) or die("Query Failed subtopics: ".mysql_error());
			$delete1 = "DELETE FROM clo_ilo WHERE clo_id='".$del."'";
			$resultb=mysql_query($delete1) or die("Query Failed subtopics: ".mysql_error());
			$data[]=['msg'=>"Deleted!"];
		}else if ($status_desc=="queue for dean") {
			$data[]=['msg'=>"Cannot Delete! Syllabus is still in queue."];
		}else if ($status_desc=="approved") {
			$data[]=['msg'=>"Cannot Delete! Syllabus is already approved."];
		}
		echo json_encode($data);

	}else if($page=='deleterev'){
		$del=$_GET['del'];
		$syllabus_id=$_GET['id1'];
		$delete = "DELETE FROM revision WHERE id='".$del."'";
		$resulta=mysql_query($delete) or die("Query Failed subtopics: ".mysql_error());
		$data[]=['msg'=>"Deleted!"];
		echo json_encode($data);

	}else if($page=="submit"){
		$data= array();
		$syllabus_id=$_POST['syll'];
		$position=$_POST['position'];
		$edep=$_POST['edep'];
		$sdep=$_POST['sdep'];
		$sql1=mysql_query("SELECT syllabusstatus.syll_status_desc FROM syllabus INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id WHERE syllabusstatus.syllabus_id = '".$syllabus_id."'");
		
		if ($position=="Dean") {
			while ($row1=mysql_fetch_array($sql1)) {
				$status_desc=$row1['syll_status_desc'];
				if ($status_desc=="pending") {
					$sql=mysql_query("SELECT * FROM topics WHERE topics.syllabus_id = '".$syllabus_id."' AND ((topics.topic_description = 5 AND topics.idsa = 'Examination Week') OR (topics.topic_description = 6 AND topics.idsa = 'Examination Week') OR (topics.topic_description = 7 AND topics.idsa = 'Examination Week') OR (topics.topic_description = 8 AND topics.idsa = 'Examination Week')) ");
					if (mysql_num_rows($sql)==4) {
						$query = "UPDATE syllabusstatus SET syll_status_desc='queue for daa', syll_date_time= NOW(), syll_status='unread' WHERE syllabus_id='".$syllabus_id."'";
						$result1=mysql_query($query) or die("Query Failed UPDATEsyllabusstatus: ".mysql_error());
						$data[]=['data'=>"Submitted to Acadamic Head"];
					}else{
						$data[]=['data'=>"Please complete your topics for the semester."];
					}
					
				}else if ($status_desc=="queue for daa") {
					$data[]=['data'=>"Syllabus is still in queue!"];
					
				}else if ($status_desc=="approved") {
					$data[]=['data'=>"Syllabus is already approved!"];
					
				}
			}

			// while ($row1=mysql_fetch_array($sql1)) {
			// 	$status_desc=$row1['syll_status_desc'];
			// 	if ($status_desc=="pending") {
			// 		$sql=mysql_query("SELECT * FROM topics WHERE topics.syllabus_id = '".$syllabus_id."' AND ((topics.topic_description = 5 AND topics.ilo = 'Examination Week') OR (topics.topic_description = 6 AND topics.ilo = 'Examination Week') OR (topics.topic_description = 7 AND topics.ilo = 'Examination Week') OR (topics.topic_description = 8 AND topics.ilo = 'Examination Week')) ");
			// 		if (mysql_num_rows($sql)==4) {
			// 			$query = "UPDATE syllabusstatus SET syll_status_desc='approved', syll_date_time= NOW(), syll_status='unread' WHERE syllabus_id='".$syllabus_id."'";
			// 			$result1=mysql_query($query) or die("Query Failed UPDATEsyllabusstatus: ".mysql_error());
			// 			$data[]=['data'=>"Syllabus Approved!"];
			// 		}else{
			// 			$data[]=['data'=>"Please complete your topics for the semester."];
			// 		}
			// 	}else if ($status_desc=="approved") {
			// 		$data[]=['data'=>"Syllabus is already approved!"];
					
			// 	}
			// }
		}else{
			while ($row1=mysql_fetch_array($sql1)) {
				$status_desc=$row1['syll_status_desc'];
				if ($status_desc=="pending") {
					$sql=mysql_query("SELECT * FROM topics WHERE topics.syllabus_id = '".$syllabus_id."' AND ((topics.topic_description = 5 AND topics.idsa = 'Examination Week') OR (topics.topic_description = 6 AND topics.idsa = 'Examination Week') OR (topics.topic_description = 7 AND topics.idsa = 'Examination Week') OR (topics.topic_description = 8 AND topics.idsa = 'Examination Week')) ");
					if (mysql_num_rows($sql)==4) {
						$query = "UPDATE syllabusstatus SET syll_status_desc='queue for dean', syll_date_time= NOW(), syll_status='unread' WHERE syllabus_id='".$syllabus_id."'";
						$result1=mysql_query($query) or die("Query Failed UPDATEsyllabusstatus: ".mysql_error());
						$data[]=['data'=>"Submitted to Dean"];
					}else{
						$data[]=['data'=>"Please complete your topics for the semester."];
					}
					
				}else if ($status_desc=="queue for dean") {
					$data[]=['data'=>"Syllabus is still in queue!"];
					
				}else if ($status_desc=="approved") {
					$data[]=['data'=>"Syllabus is already approved!"];
					
				}
			}
		}
		
		
		echo json_encode($data);
		
	}else if($page=='loadcrp'){

		$syllabus_id=$_POST['syll'];

		$sql_res=mysql_query("SELECT policies.late_tardiness, policies.absence, policies.miss_quiz, policies.permits, policies.cheating, policies.class_misbehavior, reference.ref_desc, syllabus.syllabus_id FROM syllabus INNER JOIN policies ON policies.syllabus_id = syllabus.syllabus_id INNER JOIN reference ON reference.syllabus_id = syllabus.syllabus_id WHERE syllabus.syllabus_id ='".$syllabus_id."' ");

		$data = array();
		while($row = mysql_fetch_array($sql_res)){
			$late_tardiness=$row['late_tardiness'];
			$absence=$row['absence'];
			$miss_quiz=$row['miss_quiz'];
			$permits=$row['permits'];
			$cheating=$row['cheating'];
			$class_misbehavior=$row['class_misbehavior'];
			$ref_desc=$row['ref_desc'];
			
			$data[]=['late_tardiness'=>$late_tardiness, 'absence'=>$absence, 'miss_quiz'=>$miss_quiz, 'permits'=>$permits,'cheating'=>$cheating, 'class_misbehavior'=>$class_misbehavior, 'ref_desc'=>$ref_desc];
		}      
		echo json_encode($data);
	}else if($page=='loaddoc'){

		$syllabus_id=$_POST['syll'];

		$sql_res=mysql_query("SELECT doc_info.revision_status, doc_info.curriculum FROM doc_info WHERE doc_info.syllabus_id ='".$syllabus_id."' ");

		$data = array();
		while($row = mysql_fetch_array($sql_res)){
			$revision_status=$row['revision_status'];
			$curriculum=$row['curriculum'];
			// $qms=$row['qms'];
			// $version=$row['version'];
			
			$data[]=['revision'=>$revision_status, 'curriculum'=>$curriculum];
		}      
		echo json_encode($data);
	}else if($page=='savecrp'){
		$syllabus_id=$_POST['id1'];
		$lt1=mysql_real_escape_string($_POST['lt1']);
		$absence1=mysql_real_escape_string($_POST['absence1']);
		$mq1=mysql_real_escape_string($_POST['mq1']);
		$permits1=mysql_real_escape_string($_POST['permits1']);
		$cheating1=mysql_real_escape_string($_POST['cheating1']);
		$cm1=mysql_real_escape_string($_POST['cm1']);
		$ref1=mysql_real_escape_string($_POST['ref1']);
		$curriculum1=$_POST['curriculum1'];
		$revision1=$_POST['revision1'];
		//$version1=$_POST['version1'];
		//$qms1=$_POST['qms1'];
		$data = array();
		$sql1=mysql_query("SELECT syllabusstatus.syll_status_desc FROM syllabus INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id WHERE syllabusstatus.syllabus_id = '".$syllabus_id."'");
		
		while ($row1=mysql_fetch_array($sql1)) {
			$status_desc=$row1['syll_status_desc'];
		}
		if ($status_desc=="pending") {			

			$sql_res=mysql_query("SELECT policies.late_tardiness, policies.absence, policies.miss_quiz, policies.permits, policies.cheating, policies.class_misbehavior FROM policies WHERE policies.syllabus_id ='".$syllabus_id."' ");
			if (mysql_num_rows($sql_res)==0) {
				
				$insert1 = "INSERT INTO `policies` (`policy_id`,`late_tardiness`,`absence`,`miss_quiz`,`permits`,`cheating`,`class_misbehavior`,`syllabus_id`) VALUES ('','".$lt1."','".$absence1."','".$mq1."','".$permits1."','".$cheating1."','".$cm1."','".$syllabus_id."')";
				$exe=mysql_query($insert1) or die("Query Failed : ".mysql_error());
			}else{
				$query= 'UPDATE policies SET late_tardiness="'.$lt1.'",absence="'.$absence1.'",miss_quiz="'.$mq1.'",permits="'.$permits1.'",cheating="'.$cheating1.'", class_misbehavior="'.$cm1.'" WHERE syllabus_id="'.$syllabus_id.'"';
				$result = mysql_query($query) or die("Query Failed update insertemp: ".mysql_error());

			}

			$sql_res1=mysql_query("SELECT reference.ref_desc FROM reference WHERE reference.syllabus_id ='".$syllabus_id."' ");
			if (mysql_num_rows($sql_res1)==0) {
				
				$insert2 = "INSERT INTO `reference` (`ref_id`,`ref_desc`,`syllabus_id`) VALUES ('','".$lt1."','".$syllabus_id."')";
				$exe2=mysql_query($insert2) or die("Query Failed : ".mysql_error());
			}else{
				$query2= 'UPDATE reference SET ref_desc="'.$ref1.'" WHERE syllabus_id="'.$syllabus_id.'"';
				$result2 = mysql_query($query2) or die("Query Failed update insertemp: ".mysql_error());
			}

			$sql_res2=mysql_query("SELECT doc_info.doc_id FROM doc_info WHERE doc_info.syllabus_id ='".$syllabus_id."' ");
			if (mysql_num_rows($sql_res2)==0) {
				
				$insert3 = "INSERT INTO `doc_info` (`doc_id`,`curriculum`,`revision_status`,`syllabus_id`) VALUES ('','".$curriculum1."','".$revision1."','".$syllabus_id."')";
				$exe2=mysql_query($insert3) or die("Query Failed : ".mysql_error());
			}else{
				$query3= 'UPDATE doc_info SET revision_status="'.$revision1.'",curriculum="'.$curriculum1.'" WHERE syllabus_id="'.$syllabus_id.'"';
				$result2 = mysql_query($query3) or die("Query Failed update insertemp: ".mysql_error());
			}


			
			$data[]=['msg'=>"Successfully Saved!"];
		}else if ($status_desc=="queue for dean") {
			$data[]=['msg'=>"Syllabus is still in queue!"];
			
		}else if ($status_desc=="approved") {
			$data[]=['msg'=>"Syllabus is already approved!"];
			
		}
		
		echo json_encode($data);

	}else if($page=='saverevstat'){
		$syllabus_id=$_POST['id1'];
		$rev_no1=mysql_real_escape_string($_POST['rev_no1']);
		$issued_date1=mysql_real_escape_string($_POST['issued_date1']);
		$preparedby1=mysql_real_escape_string($_POST['preparedby1']);
		$reviewedby1=mysql_real_escape_string($_POST['reviewedby1']);
		$verifiedby1=mysql_real_escape_string($_POST['verifiedby1']);
		$approvedby1=mysql_real_escape_string($_POST['approvedby1']);
		$effectivity_date1=mysql_real_escape_string($_POST['effectivity_date1']);
		$data = array();
		$insert1 = "INSERT INTO `revision` (`id`,`rev_no`,`issued_date`,`preparedby`,`reviewedby`,`verifiedby`,`approvedby`,`effectivity_date`,`syllabus_id`) VALUES ('','".$rev_no1."','".$issued_date1."','".$preparedby1."','".$reviewedby1."','".$verifiedby1."','".$approvedby1."','".$effectivity_date1."','".$syllabus_id."')";
		$exe=mysql_query($insert1) or die("Query Failed : ".mysql_error());
		$data[]=['msg'=>"Successfully Saved!"];
		echo json_encode($data);

	}else if($page=="savetopic"){
		$week=$_POST['week1'];
		$period=$_POST['period1'];
		$maintopics = mysql_real_escape_string($_POST['maintopics1']);
		$idsa = mysql_real_escape_string($_POST['idsa1']);
		$ass = mysql_real_escape_string($_POST['ass1']);
		$ep = mysql_real_escape_string($_POST['ep1']);
		//$oba = mysql_real_escape_string($_POST['oba1']);
		$subtopics = $_POST['subtopics1'];
		$data=array();
		$syllabus_id=$_POST['id1'];
		$sqlcheck=mysql_query("SELECT syllabusstatus.syll_status_desc FROM syllabusstatus WHERE syllabusstatus.syllabus_id = $syllabus_id");
		while ($row1=mysql_fetch_array($sqlcheck)) {
			$status_desc=$row1['syll_status_desc'];
		}
		if ($status_desc=="pending") {
			// $sql=mysql_query("SELECT topics.topics_id FROM topics WHERE testbank.topics.`week` = ".$week." AND testbank.topics.syllabus_id = '".$syllabus_id."'");
			// if (mysql_num_rows($sql)==0) {
				$querytopic = "INSERT INTO `topics` (`topic_description`,`idsa`,`week`,`assessment`,`ep`,`syllabus_id`,`exam_id`) VALUES ('".$maintopics."','".$idsa."','".$week."','".$ass."','".$ep."','".$syllabus_id."','".$period."')";
				$resultb1=mysql_query($querytopic) or die("Query Failed 5: ".mysql_error());
				$topics_id =mysql_insert_id();
				
				foreach($subtopics as $value){
					if ($value != "") {
						$querysubt = "INSERT INTO `subtopic` (`subtopic_description`,`topics_id`) VALUES ('".mysql_real_escape_string($value)."','".$topics_id."')";
						$resultb1=mysql_query($querysubt) or die($syllabus_id."Query Failed 6: ".mysql_error());
					}
				}
			$data[]=['msg'=>"Successfully Saved!"];
			// }
			// else{
			// 	while($row=mysql_fetch_array($sql)){
			// 		$topics_id=$row['topics_id'];
			// 		$query1 = "UPDATE topics SET topic_description='".$maintopics."' WHERE topics_id='".$topics_id."'";
			// 		$result1=mysql_query($query1) or die("Query Failed UPDATEtopics: ".mysql_error());
				
			// 		$query2 = "UPDATE topics SET exam_id='".$period."' WHERE topics_id='".$topics_id."'";
			// 		$result2=mysql_query($query2) or die("Query Failed UPDATEperiod: ".mysql_error());
				
			// 		$query3 = "UPDATE topics SET tla='".$tla."' WHERE topics_id='".$topics_id."'";
			// 		$result3=mysql_query($query3) or die("Query Failed UPDATEtla: ".mysql_error());
				
			// 		$query4 = "UPDATE topics SET resources='".$resource."' WHERE topics_id='".$topics_id."'";
			// 		$result4=mysql_query($query4) or die("Query Failed UPDATEresources: ".mysql_error());
				
			// 		$query5 = "UPDATE topics SET oba='".$oba."' WHERE topics_id='".$topics_id."'";
			// 		$result5=mysql_query($query5) or die("Query Failed UPDATEoba: ".mysql_error());

			// 		$query5 = "UPDATE topics SET ilo='".$ilo."' WHERE topics_id='".$topics_id."'";
			// 		$result5=mysql_query($query5) or die("Query Failed UPDATEilo: ".mysql_error());
				
			// 		$del = "DELETE FROM subtopic WHERE topics_id='".$topics_id."'";
			// 		$result6=mysql_query($del) or die("Query Failed subtopics: ".mysql_error());
				
			// 		foreach($subtopics as $value){
			// 			if ($value != "") {
			// 				$querysubt = "INSERT INTO `subtopic` (`subtopic_description`,`topics_id`) VALUES ('".$value."','".$topics_id."')";
			// 				$resultb1=mysql_query($querysubt) or die($syllabus_id."Query Failed 6: ".mysql_error());
			// 			}
			// 		}
					
			// 	}
			
			// $data[]=['msg'=>"Successfully Updated!"];

			// }
		}else if ($status_desc=="queue for dean") {
			$data[]=['msg'=>"Syllabus is still in queue!"];
			
		}else if ($status_desc=="approved") {
			$data[]=['msg'=>"Syllabus is already approved!"];
			
		}
	echo json_encode($data);
	}else if($page=="loadperiod"){
		$syllabus_id=$_POST['syll'];
		$set1="false";
	    $set2="false";
	    $set3="false";
	    $set4="false";
	    $data=array();
	    $sql=mysql_query("SELECT topics.topic_description FROM topics WHERE topics.ilo = 'Examination Week' AND topics.syllabus_id ='".$syllabus_id."'");
	    while ($row=mysql_fetch_array($sql)) {
	      	$dl=$row['topic_description'];
	      	if ($dl=="5") {
	      	  $set1="true";
	      	}else if ($dl=="6") {
	      	  $set2="true";
	      	}else if ($dl=="7") {
	      	  $set3="true";
	      	}else if ($dl=="8") {
	      	  $set4="true";
	      	}
	    }
	    $data[]=['prelim'=>$set1, 'midterm'=>$set2, 'prefinal'=>$set3, 'final'=>$set4];
	    echo json_encode($data);
	}else if($page=="checkr"){
		$syllabus_id=$_POST['syll'];
	    $data=array();
	    $sql=mysql_query("SELECT Count(syllabus_remarks.remark_stat) AS count FROM syllabus_remarks WHERE syllabus_remarks.remark_stat = 'unread' AND syllabus_remarks.syllabus_id ='".$syllabus_id."'");
	    while ($row=mysql_fetch_array($sql)) {
	      	$dl=$row['count'];
	      	if ($dl>"0") {
	      		$set="true";
	      	}else{
	      		$set="false";
	      	}
	    }
	    $data[]=['rem'=>$set];
	    echo json_encode($data);
	}else if($page=="checkr2"){
		$syllabus_id=$_POST['syll'];
	    $query1 = "UPDATE syllabus_remarks SET remark_stat='read' WHERE syllabus_id='".$syllabus_id."'";
		$result1=mysql_query($query1) or die("Query Failed UPDATE syllabus_remarks: ".mysql_error());
	}else if ($page=="checkstatus") {
		$data=array();
		$syllabus_id=$_POST['syllabus_id'];
		$sql=mysql_query("SELECT syllabusstatus.syll_status_desc FROM syllabusstatus WHERE syllabusstatus.syllabus_id ='".$syllabus_id."'");
		while ($row=mysql_fetch_array($sql)) {
			$status_desc=$row['syll_status_desc'];
			
		}
		$data[]=['status_desc'=>$status_desc];
		echo json_encode($data);
	}else if ($page=="openmodal") {
		$topicid=$_POST['topicid'];
		$sql_res=mysql_query("SELECT topics.`week`, topics.topic_description, topics.topics_id, topics.idsa, topics.assessment, topics.ep, topics.syllabus_id, topics.exam_id FROM topics WHERE topics.topics_id ='".$topicid."'");

		$data = array();
		while($row = mysql_fetch_array($sql_res)){
			$topics_id=$row['topics_id'];
			$sql_res1=mysql_query("SELECT subtopic.subtopic_description FROM subtopic WHERE subtopic.topics_id ='".$topics_id."'");
			$r=mysql_num_rows($sql_res1);
			$subtopic = array();
				while($rows = mysql_fetch_array($sql_res1)){
					$subtopic[]= $rows['subtopic_description'];
				}
			$data[]=['week'=>$row['week'],'topic_description'=>$row['topic_description'], 'idsa'=>$row['idsa'],'ass'=>$row['assessment'], 'ep'=>$row['ep'],'period'=>$row['exam_id'], 'subtopic'=>$subtopic];
		}      
	echo json_encode($data);
	}else if ($page=="updatetopic") {
		$week=$_POST['week1'];
		$period=$_POST['period1'];
		$maintopics = mysql_real_escape_string($_POST['maintopics1']);
		$idsa = mysql_real_escape_string($_POST['idsa1']);
		$ass = mysql_real_escape_string($_POST['ass1']);
		$ep = mysql_real_escape_string($_POST['ep1']);
		// $ilo = mysql_real_escape_string($_POST['ilo1']);
		// $tla = mysql_real_escape_string($_POST['tla1']);
		// $resource = mysql_real_escape_string($_POST['resource1']);
		// $oba = mysql_real_escape_string($_POST['oba1']);
		$subtopics = $_POST['subtopics1'];
		$data=array();
		$topics_id=$_POST['id1'];
		$sqlcheck=mysql_query("SELECT syllabusstatus.syll_status_desc FROM syllabus INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id INNER JOIN topics ON topics.syllabus_id = syllabus.syllabus_id WHERE topics.topics_id = '".$topics_id."'");
		while ($row1=mysql_fetch_array($sqlcheck)) {
			$status_desc=$row1['syll_status_desc'];
		}
		if ($status_desc=="pending") {
				$query1 = "UPDATE topics SET topic_description='".$maintopics."' WHERE topics_id='".$topics_id."'";
				$result1=mysql_query($query1) or die("Query Failed UPDATEtopics: ".mysql_error());
			
				$query2 = "UPDATE topics SET exam_id='".$period."' WHERE topics_id='".$topics_id."'";
				$result2=mysql_query($query2) or die("Query Failed UPDATEperiod: ".mysql_error());
			
				$query3 = "UPDATE topics SET assessment='".$ass."' WHERE topics_id='".$topics_id."'";
				$result3=mysql_query($query3) or die("Query Failed UPDATEtla: ".mysql_error());
			
				// $query4 = "UPDATE topics SET resources='".$resource."' WHERE topics_id='".$topics_id."'";
				// $result4=mysql_query($query4) or die("Query Failed UPDATEresources: ".mysql_error());
			
				$query5 = "UPDATE topics SET ep='".$ep."' WHERE topics_id='".$topics_id."'";
				$result5=mysql_query($query5) or die("Query Failed UPDATEoba: ".mysql_error());

				$query5 = "UPDATE topics SET idsa='".$idsa."' WHERE topics_id='".$topics_id."'";
				$result5=mysql_query($query5) or die("Query Failed UPDATEilo: ".mysql_error());
			
				$del = "DELETE FROM subtopic WHERE topics_id='".$topics_id."'";
				$result6=mysql_query($del) or die("Query Failed subtopics: ".mysql_error());
			
				foreach($subtopics as $value){
					if ($value != "") {
						$querysubt = "INSERT INTO `subtopic` (`subtopic_description`,`topics_id`) VALUES ('".$value."','".$topics_id."')";
						$resultb1=mysql_query($querysubt) or die($syllabus_id."Query Failed 6: ".mysql_error());
					}
				}
			$data[]=['msg'=>"Successfully Updated!"];
			
		}else if ($status_desc=="queue for dean") {
			$data[]=['msg'=>"Syllabus is still in queue!"];
			
		}else if ($status_desc=="approved") {
			$data[]=['msg'=>"Syllabus is already approved!"];
			
		}
		echo json_encode($data);
	}else if ($page=="deletetopic") {
		$del=$_GET['del'];
		$syllabus_id=$_GET['id1'];
		$sqlcheck=mysql_query("SELECT syllabusstatus.syll_status_desc FROM syllabusstatus WHERE syllabusstatus.syllabus_id = $syllabus_id");
		while ($row1=mysql_fetch_array($sqlcheck)) {
			$status_desc=$row1['syll_status_desc'];
		}
		if ($status_desc=="pending") {
			$delete = "DELETE FROM subtopic WHERE topics_id='".$del."'";
			$resulta=mysql_query($delete) or die("Query Failed subtopics: ".mysql_error());
			$delete = "DELETE FROM topics WHERE topics_id='".$del."'";
			$resulta=mysql_query($delete) or die("Query Failed topics: ".mysql_error());
			$data[]=['msg'=>"Deleted!"];
		}else if ($status_desc=="queue for dean") {
			$data[]=['msg'=>"Cannot Delete! Syllabus is still in queue."];
		}else if ($status_desc=="approved") {
			$data[]=['msg'=>"Cannot Delete! Syllabus is already approved."];
		}
		echo json_encode($data);

	}else if ($page=="loadweek") {
		$data = array();
		$topics_id = array();
		$week = array();
		$exam_period = array();
		$topic_description = array();
		$idsa = array();
		$ass = array();
		$ep = array();
		$syll=$_POST['syll'];
		$sql=mysql_query("SELECT topics.topics_id, topics.topic_description, topics.idsa, topics.`week`, topics.assessment, topics.ep, topics.exam_id, major_exams.exam_period FROM topics INNER JOIN major_exams ON topics.exam_id = major_exams.exam_id WHERE topics.syllabus_id ='".$syll."' ORDER BY topics.`week` ASC");
        while ($row=mysql_fetch_array($sql)) {
            
            $topics_id[]=$row['topics_id'];
            $week[]=$row['week'];
            $exam_period[]=$row['exam_period'];
            $topic_description[]=mysql_real_escape_string($row['topic_description']);
            $idsa[]=mysql_real_escape_string($row['idsa']);
            $ass[]=mysql_real_escape_string($row['assessment']);
            $ep[]=mysql_real_escape_string($row['ep']);
           
            // $sql1=mysql_query("SELECT subtopic.subtopic_description FROM subtopic WHERE subtopic.topics_id ='".$topics_id."'");
            // while ($row1=mysql_fetch_array($sql1)) {
            //     $subt[] = $row1['subtopic_description'];
            // }
            

            
        }
        $data[]=['topics_id'=>$topics_id,'week'=>$week,'exam_period'=>$exam_period,'topic_description'=>$topic_description,'idsa'=>$idsa,'ass'=>$ass,'ep'=>$ep];
		echo json_encode($data);

	}else if ($page=="loadrev") {
		$data = array();
		$rev_no = array();
		$id = array();
		$issued_date = array();
		$preparedby = array();
		$reviewedby = array();
		$verifiedby = array();
		$approvedby = array();
		$effectivity_date = array();
		$syll=$_POST['syll'];
		$sql=mysql_query("SELECT * FROM revision WHERE revision.syllabus_id ='".$syll."' ORDER BY revision.`id` ASC");
        while ($row=mysql_fetch_array($sql)) {
        	$id[]=mysql_real_escape_string($row['id']);
            $rev_no[]=mysql_real_escape_string($row['rev_no']);
            $issued_date[]=mysql_real_escape_string($row['issued_date']);
            $preparedby[]=mysql_real_escape_string($row['preparedby']);
            $reviewedby[]=mysql_real_escape_string($row['reviewedby']);
            $verifiedby[]=mysql_real_escape_string($row['verifiedby']);
            $approvedby[]=mysql_real_escape_string($row['approvedby']);
            $effectivity_date[]=mysql_real_escape_string($row['effectivity_date']);
            
        }
        $data[]=['id'=>$id,'rev_no'=>$rev_no,'issued_date'=>$issued_date,'preparedby'=>$preparedby,'reviewedby'=>$reviewedby,'verifiedby'=>$verifiedby,'approvedby'=>$approvedby,'effectivity_date'=>$effectivity_date];
		echo json_encode($data);

	}else if($page=='savecr'){
		$syllabus_id=$_POST['id1'];
		$croutput1=mysql_real_escape_string($_POST['croutput1']);
		$crdesc1=mysql_real_escape_string($_POST['crdesc1']);
		$data = array();
		$sql1=mysql_query("SELECT syllabusstatus.syll_status_desc FROM syllabus INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id WHERE syllabusstatus.syllabus_id = '".$syllabus_id."'");
		
		while ($row1=mysql_fetch_array($sql1)) {
			$status_desc=$row1['syll_status_desc'];
		}
		if ($status_desc=="pending") {
				$insert3 = "INSERT INTO `course_req` (`cr_id`,`cr_output`,`cr_desc`,`syllabus_id`) VALUES ('','".$croutput1."','".$crdesc1."','".$syllabus_id."')";
				$exe3=mysql_query($insert3) or die("Query Failed : ".mysql_error());
			$data[]=['msg'=>"Successfully Saved!"];
		}else if ($status_desc=="queue for dean") {
			$data[]=['msg'=>"Syllabus is still in queue!"];
			
		}else if ($status_desc=="approved") {
			$data[]=['msg'=>"Syllabus is already approved!"];
			
		}
		echo json_encode($data);

	}else if($page=='loadreq'){
		$data = array();
		$cr_id = array();
		$cr_output = array();
		$cr_desc = array();
		$syll=$_POST['syll'];
		$sql=mysql_query("SELECT course_req.cr_id, course_req.cr_output, course_req.cr_desc FROM course_req WHERE course_req.syllabus_id = '".$syll."'");
        while ($row=mysql_fetch_array($sql)) {
            
            $cr_id[]=$row['cr_id'];
            $cr_output[]=mysql_real_escape_string($row['cr_output']);
            $cr_desc[]=mysql_real_escape_string($row['cr_desc']);
                       
        }
        $data[]=['cr_id'=>$cr_id,'cr_output'=>$cr_output,'cr_desc'=>$cr_desc];
		echo json_encode($data);
	}else if ($page=="openmodal2") {
		$cr_id=$_POST['cr_id'];
		$sql_res=mysql_query("SELECT course_req.cr_id, course_req.cr_output, course_req.cr_desc FROM course_req WHERE course_req.cr_id ='".$cr_id."'");

		$data = array();
		while($row = mysql_fetch_array($sql_res)){
			$cr_id2=$row['cr_id'];
            $cr_output=mysql_real_escape_string($row['cr_output']);
            $cr_desc=mysql_real_escape_string($row['cr_desc']);
			
		}
		$data[]=['cr_id'=>$cr_id2,'cr_output'=>$cr_output,'cr_desc'=>$cr_desc];  
	echo json_encode($data);
	}else if ($page=="updatereq") {
		$id=$_POST['id'];
		$out = mysql_real_escape_string($_POST['out']);
		$desc = mysql_real_escape_string($_POST['desc']);
		$data=array();
		$sqlcheck=mysql_query("SELECT syllabusstatus.syll_status_desc FROM syllabus INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id INNER JOIN course_req ON course_req.syllabus_id = syllabus.syllabus_id WHERE course_req.cr_id = '".$id."'");
		while ($row1=mysql_fetch_array($sqlcheck)) {
			$status_desc=$row1['syll_status_desc'];
		}
		if ($status_desc=="pending") {
			$query1 = "UPDATE course_req SET cr_output='".$out."', cr_desc='".$desc."' WHERE cr_id='".$id."'";
			$result1=mysql_query($query1) or die("Query Failed course_req: ".mysql_error());
				
			$data[]=['msg'=>"Successfully Updated!"];
			
		}else if ($status_desc=="queue for dean") {
			$data[]=['msg'=>"Cannot Update! Syllabus is still in queue!"];
			
		}else if ($status_desc=="approved") {
			$data[]=['msg'=>"Cannot Update! Syllabus is already approved."];
			
		}
		echo json_encode($data);
	}else if ($page=="deletereq") {
		$del=$_GET['del'];
		$syllabus_id=$_GET['id1'];
		$sqlcheck=mysql_query("SELECT syllabusstatus.syll_status_desc FROM syllabusstatus WHERE syllabusstatus.syllabus_id ='".$syllabus_id."'");
		while ($row1=mysql_fetch_array($sqlcheck)) {
			$status_desc=$row1['syll_status_desc'];
		}
		if ($status_desc=="pending") {
			$delete = "DELETE FROM course_req WHERE cr_id='".$del."'";
			$resulta=mysql_query($delete) or die("Query Failed subtopics: ".mysql_error());
			$data[]=['msg'=>"Deleted!"];
		}else if ($status_desc=="queue for dean") {
			$data[]=['msg'=>"Cannot Delete! Syllabus is still in queue."];
		}else if ($status_desc=="approved") {
			$data[]=['msg'=>"Cannot Delete! Syllabus is already approved."];
		}
		echo json_encode($data);

	}
}
?>	