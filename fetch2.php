<?php
 $connect = mysqli_connect("localhost", "root", "", "testbank");

if (!empty($_GET)) {
	$page=$_GET['p'];
	if ($page=='updateappsyllstat') {
		$emp_id=$_POST["emp_id"];
		$query = "SELECT syllabusstatus.sstatus_id FROM syllabusstatus INNER JOIN syllabus ON syllabusstatus.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id WHERE syllabusstatus.syll_status = 'unread' AND sched_subj.employment_id = '".$emp_id."'";
 		$result = mysqli_query($connect, $query);
 		if(mysqli_num_rows($result) > 0){
 			while($row = mysqli_fetch_array($result)){
 				$sstatus_id=$row["sstatus_id"];
 				$update_query = "UPDATE syllabusstatus SET syll_status='read' WHERE syll_status='unread' AND sstatus_id = '".$sstatus_id."'";
  				mysqli_query($connect, $update_query);
 			}

 		}
  		
	}else if ($page=='updaterevsyllstat') {
		$emp_id=$_POST["emp_id"];
		$query = "SELECT syllabusstatus.sstatus_id FROM syllabusstatus INNER JOIN syllabus ON syllabusstatus.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id WHERE syllabusstatus.syll_status = 'unread' AND syllabusstatus.syll_status_desc = 'pending' AND syllabusstatus.syll_rev_count > '0' AND sched_subj.employment_id = '".$emp_id."'";
 		$result = mysqli_query($connect, $query);
 		if(mysqli_num_rows($result) > 0){
 			while($row = mysqli_fetch_array($result)){
 				$sstatus_id=$row["sstatus_id"];
 				$update_query = "UPDATE syllabusstatus SET syll_status='read' WHERE syll_status='unread' AND sstatus_id = '".$sstatus_id."'";
  				mysqli_query($connect, $update_query);
 			}

 		}
  		
	}else if ($page=='updateprintedtq') {
		$emp_id=$_POST["emp_id"];
		$query = "SELECT tqstatus.status_id FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON semester.sem_id = sched_subj.sem_id INNER JOIN school_year ON school_year.sy_id = sched_subj.sy_id WHERE tqstatus.status_desc = 'printed' AND sched_subj.employment_id = '".$emp_id."' AND tqstatus.notif_status = 'unread'";
 		$result = mysqli_query($connect, $query);
 		if(mysqli_num_rows($result) > 0){
 			while($row = mysqli_fetch_array($result)){
 				$status_id=$row["status_id"];
 				$update_query = "UPDATE tqstatus SET notif_status='read' WHERE notif_status='unread' AND status_id = '".$status_id."'";
  				mysqli_query($connect, $update_query);
 			}

 		}
 		$query1 = "SELECT shs_tqstatus.shs_status_id, shs_tqstatus.shs_notif_status FROM shs_syll INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id WHERE shs_syll.employment_id = '".$emp_id."' AND shs_tqstatus.shs_status_desc = 'printed' AND shs_tqstatus.shs_notif_status = 'unread' ";
 		$result1 = mysqli_query($connect, $query1);
 		if(mysqli_num_rows($result1) > 0){
 			while($row = mysqli_fetch_array($result1)){
 				$status_id=$row["shs_status_id"];
 				$update_query1 = "UPDATE shs_tqstatus SET shs_notif_status='read' WHERE shs_notif_status='unread' AND shs_status_id = '".$status_id."'";
  				mysqli_query($connect, $update_query1);
 			}

 		}

	}else if ($page=='updateapptq') {
		$emp_id=$_POST["emp_id"];
		$query = "SELECT tqstatus.status_id FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON semester.sem_id = sched_subj.sem_id INNER JOIN school_year ON school_year.sy_id = sched_subj.sy_id WHERE tqstatus.status_desc = 'for printing' AND sched_subj.employment_id = '".$emp_id."' AND tqstatus.notif_status = 'unread'";
 		$result = mysqli_query($connect, $query);
 		if(mysqli_num_rows($result) > 0){
 			while($row = mysqli_fetch_array($result)){
 				$status_id=$row["status_id"];
 				$update_query = "UPDATE tqstatus SET notif_status='read' WHERE notif_status='unread' AND status_id = '".$status_id."'";
  				mysqli_query($connect, $update_query);
 			}

 		}
 		$query1 = "SELECT shs_tqstatus.shs_status_id, shs_tqstatus.shs_notif_status FROM shs_syll INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id WHERE shs_syll.employment_id = '".$emp_id."' AND shs_tqstatus.shs_status_desc = 'for printing' AND shs_tqstatus.shs_notif_status = 'unread' ";
 		$result1 = mysqli_query($connect, $query1);
 		if(mysqli_num_rows($result1) > 0){
 			while($row = mysqli_fetch_array($result1)){
 				$status_id=$row["shs_status_id"];
 				$update_query1 = "UPDATE shs_tqstatus SET shs_notif_status='read' WHERE shs_notif_status='unread' AND shs_status_id = '".$status_id."'";
  				mysqli_query($connect, $update_query1);
 			}

 		}

	}else if ($page=='updaterevtq') {
		$emp_id=$_POST["emp_id"];
		$query = "SELECT tqstatus.status_id FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON semester.sem_id = sched_subj.sem_id INNER JOIN school_year ON school_year.sy_id = sched_subj.sy_id WHERE tqstatus.status_desc = 'pending' AND sched_subj.employment_id = '".$emp_id."' AND tqstatus.notif_status = 'unread' AND tqstatus.revise_count > '0'";
 		$result = mysqli_query($connect, $query);
 		if(mysqli_num_rows($result) > 0){
 			while($row = mysqli_fetch_array($result)){
 				$status_id=$row["status_id"];
 				$update_query = "UPDATE tqstatus SET notif_status='read' WHERE notif_status='unread' AND status_id = '".$status_id."'";
  				mysqli_query($connect, $update_query);
 			}

 		}

 		$query1 = "SELECT shs_tqstatus.shs_status_id FROM shs_syll INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id WHERE shs_syll.employment_id = '".$emp_id."' AND shs_tqstatus.shs_status_desc = 'pending' AND shs_tqstatus.shs_revise_count > '0' AND  shs_tqstatus.shs_notif_status = 'unread' ";
 		$result1 = mysqli_query($connect, $query1);
 		if(mysqli_num_rows($result1) > 0){
 			while($row1 = mysqli_fetch_array($result1)){
 				$status_id=$row1["shs_status_id"];
 				$update_query1 = "UPDATE shs_tqstatus SET shs_notif_status='read' WHERE shs_notif_status='unread' AND shs_status_id = '".$status_id."'";
  				mysqli_query($connect, $update_query1);
 			}

 		}

	}else if ($page=='updatesyllque') {
		$dep=$_POST["dep"];
		if ($dep=="SHS") {
			$dep="GEN";
		}
		$query = "SELECT syllabusstatus.sstatus_id FROM syllabusstatus INNER JOIN syllabus ON syllabusstatus.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE syllabusstatus.syll_status_desc = 'queue for dean' AND sched_subj.department = '".$dep."'";
 		$result = mysqli_query($connect, $query);
 		if(mysqli_num_rows($result) > 0){
 			while($row = mysqli_fetch_array($result)){
 				$sstatus_id=$row["sstatus_id"];
 				$update_query = "UPDATE syllabusstatus SET syll_status='read' WHERE syll_status='unread' AND sstatus_id = '".$sstatus_id."'";
  				mysqli_query($connect, $update_query);
 			}

 		}

	}else if ($page=='updatesyllque1') {
		$dep=$_POST["dep"];
		$query = "SELECT syllabusstatus.sstatus_id FROM syllabusstatus INNER JOIN syllabus ON syllabusstatus.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE syllabusstatus.syll_status_desc = 'queue for daa'";
 		$result = mysqli_query($connect, $query);
 		if(mysqli_num_rows($result) > 0){
 			while($row = mysqli_fetch_array($result)){
 				$sstatus_id=$row["sstatus_id"];
 				$update_query = "UPDATE syllabusstatus SET syll_status='read' WHERE syll_status='unread' AND sstatus_id = '".$sstatus_id."'";
  				mysqli_query($connect, $update_query);
 			}

 		}

	}else if ($page=='updatequetq') {
		$dep=$_POST["dep"];
		$pos=$_POST['pos'];
		$whre="";
		if ($pos=="Academic Head") {
			$whre="queue for daa";
			
			$query1 = "SELECT shs_tqstatus.shs_status_id FROM shs_tqstatus WHERE shs_tqstatus.shs_status_desc = '".$whre."'";
	 		$result1 = mysqli_query($connect, $query1);
	 		if(mysqli_num_rows($result1) > 0){
	 			while($row1 = mysqli_fetch_array($result1)){
	 				$shs_status_id=$row1["shs_status_id"];
	 				$update_query1 = "UPDATE shs_tqstatus SET shs_notif_status='read' WHERE shs_notif_status='unread' AND shs_status_id = '".$shs_status_id."'";
	  				mysqli_query($connect, $update_query1);
	 			}

	 		}
			$query = "SELECT tqstatus.status_id FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id WHERE tqstatus.status_desc = '".$whre."'";
			$result = mysqli_query($connect, $query);
	 		if(mysqli_num_rows($result) > 0){
	 			while($row = mysqli_fetch_array($result)){
	 				$status_id=$row["status_id"];
	 				$update_query = "UPDATE tqstatus SET notif_status='read' WHERE notif_status='unread' AND status_id = '".$status_id."'";
	  				mysqli_query($connect, $update_query);
	 			}

	 		}
			
		}else if ($pos=="Dean") {
			$whre="queue for dean";
			if ($dep=="SHS") {
			// $query = "SELECT tqstatus.status_id FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id WHERE tqstatus.status_desc = '".$whre."' AND (sched_subj.department = 'GEN' OR sched_subj.department = 'SHS')";
			$query1 = "SELECT shs_tqstatus.shs_status_id FROM shs_tqstatus WHERE shs_tqstatus.shs_status_desc = '".$whre."'";
	 		$result1 = mysqli_query($connect, $query1);
	 		if(mysqli_num_rows($result1) > 0){
	 			while($row1 = mysqli_fetch_array($result1)){
	 				$shs_status_id=$row1["shs_status_id"];
	 				$update_query1 = "UPDATE shs_tqstatus SET shs_notif_status='read' WHERE shs_notif_status='unread' AND shs_status_id = '".$shs_status_id."'";
	  				mysqli_query($connect, $update_query1);
	 			}

	 		}

		}else{
			$query = "SELECT tqstatus.status_id FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id WHERE tqstatus.status_desc = '".$whre."' AND sched_subj.department = '".$dep."'";
			$result = mysqli_query($connect, $query);
	 		if(mysqli_num_rows($result) > 0){
	 			while($row = mysqli_fetch_array($result)){
	 				$status_id=$row["status_id"];
	 				$update_query = "UPDATE tqstatus SET notif_status='read' WHERE notif_status='unread' AND status_id = '".$status_id."'";
	  				mysqli_query($connect, $update_query);
	 			}

	 		}
		}
		}
		
		
	 		
 		
	}else if ($page=='updatephquetq') {
		$dep=$_POST["dep"];
		$emp_id=$_POST["emp_id"];
		
		if ($dep=="SHS") {
			$query = "SELECT tqstatus.status_id FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id WHERE tqstatus.status_desc = 'queue for ph' AND (sched_subj.department = 'GEN' OR sched_subj.department = 'SHS') AND tqstatus.ph = '".$emp_id."'";
		}else{
			$query = "SELECT tqstatus.status_id FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id WHERE tqstatus.status_desc = 'queue for ph' AND sched_subj.department = '".$dep."'  AND tqstatus.ph = '".$emp_id."'";
		}
		
 		$result = mysqli_query($connect, $query);
 		if(mysqli_num_rows($result) > 0){
 			while($row = mysqli_fetch_array($result)){
 				$status_id=$row["status_id"];
 				$update_query = "UPDATE tqstatus SET notif_status='read' WHERE notif_status='unread' AND status_id = '".$status_id."'";
  				mysqli_query($connect, $update_query);
 			}

 		}
 		$query1 = "SELECT shs_tqstatus.shs_status_id FROM shs_tqstatus WHERE shs_tqstatus.shs_status_desc = 'queue for ph' AND shs_tqstatus.shs_ph = '".$emp_id."'";
 		$result1 = mysqli_query($connect, $query1);
 		if(mysqli_num_rows($result1) > 0){
 			while($row1 = mysqli_fetch_array($result1)){
 				$shs_status_id=$row1["shs_status_id"];
 				$update_query1 = "UPDATE shs_tqstatus SET shs_notif_status='read' WHERE shs_notif_status='unread' AND shs_status_id = '".$shs_status_id."'";
  				mysqli_query($connect, $update_query1);
 			}

 		}

	}else if ($page=='updateprinterque') {
		$query = "SELECT tqstatus.status_id FROM tqstatus WHERE tqstatus.status_desc = 'for printing'";
		
 		$result = mysqli_query($connect, $query);
 		if(mysqli_num_rows($result) > 0){
 			while($row = mysqli_fetch_array($result)){
 				$status_id=$row["status_id"];
 				$update_query = "UPDATE tqstatus SET notif_status='read' WHERE notif_status='unread' AND status_id = '".$status_id."'";
  				mysqli_query($connect, $update_query);
 			}

 		}
 		$query1 = "SELECT shs_tqstatus.shs_status_id FROM shs_tqstatus WHERE shs_tqstatus.shs_status_desc = 'for printing'";
 		$result1 = mysqli_query($connect, $query1);
 		if(mysqli_num_rows($result1) > 0){
 			while($row1 = mysqli_fetch_array($result1)){
 				$shs_status_id=$row1["shs_status_id"];
 				$update_query1 = "UPDATE shs_tqstatus SET shs_notif_status='read' WHERE shs_notif_status='unread' AND shs_status_id = '".$shs_status_id."'";
  				mysqli_query($connect, $update_query1);
 			}

 		}

	}
	else if ($page=='updatechat') {
	$emp_id=$_POST['emp_id'];
	$query = "SELECT DISTINCT messages.conver_id FROM user_access INNER JOIN messages ON user_access.user_id = messages.from_user WHERE messages.to_user = '".$emp_id."' AND messages.message_status = 'unread'";
	$result = mysqli_query($connect, $query);
 		if(mysqli_num_rows($result) > 0){
 			while($row = mysqli_fetch_array($result)){
 				$conver_id=$row["conver_id"];
 				$update_query = "UPDATE messages SET message_status='read' WHERE message_status='unread' AND conver_id = '".$conver_id."'";
  				mysqli_query($connect, $update_query);
 			}

 		}

	}













	else if ($page=='unreadappsyll') {
		$emp_id=$_POST['emp_id'];
  		$query = "SELECT syllabusstatus.syll_status_desc, `subject`.subj_name, school_year.sy, semester.semester, `subject`.subj_id, sched_subj.ss_id FROM syllabusstatus INNER JOIN syllabus ON syllabusstatus.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE sched_subj.employment_id = '".$emp_id."' AND syllabusstatus.syll_status_desc = 'approved' ORDER BY school_year.sy DESC, semester.semester DESC LIMIT 10";
	    $result = mysqli_query($connect, $query);
	    $output = '<li>&nbsp&nbsp&nbspApproved Syllabus</li>';
	 
	    if(mysqli_num_rows($result) > 0){
	        while($row = mysqli_fetch_array($result)){
	               $output .= '<li><a href="syllabus.php?ss_id1='.$row["ss_id"].'&emp_id='.$emp_id.'&subj_id='.$row["subj_id"].'&create="><strong>'.$row["subj_name"].'</strong><br /><small><em>'.$row["sy"].' '.$row["semester"].'</em></small></a></li><li class="divider"></li>';
	        }
	    }else{
	        $output .= '<li>&nbsp&nbsp&nbsp<small>No Approved Syllabus</small></li>';
	    }
	 
	    $query_1 = "SELECT sched_subj.employment_id, syllabusstatus.syll_status FROM syllabusstatus INNER JOIN syllabus ON syllabusstatus.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id WHERE syllabusstatus.syll_status = 'unread' AND sched_subj.employment_id = '".$emp_id."' AND syllabusstatus.syll_status_desc = 'approved'";
	    $result_1 = mysqli_query($connect, $query_1);
	    $count = mysqli_num_rows($result_1);
	    $data = array('notification'   => $output,'unseen_notification' => $count);
	    echo json_encode($data);
	}else if ($page=='unreadrevsyll') {
		$emp_id=$_POST['emp_id'];
  		$query = "SELECT syllabusstatus.syll_status_desc, `subject`.subj_name, school_year.sy, semester.semester, `subject`.subj_id, sched_subj.ss_id FROM syllabusstatus INNER JOIN syllabus ON syllabusstatus.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE sched_subj.employment_id = '".$emp_id."' AND syllabusstatus.syll_status_desc = 'pending' AND syllabusstatus.syll_rev_count > 0 ORDER BY school_year.sy DESC, semester.semester DESC LIMIT 10";
	    $result = mysqli_query($connect, $query);
	    $output = '<li>&nbsp&nbsp&nbspRevised Syllabus</li>';
	 
	    if(mysqli_num_rows($result) > 0){
	        while($row = mysqli_fetch_array($result)){
	               $output .= '<li><a href="syllabus.php?ss_id1='.$row["ss_id"].'&emp_id='.$emp_id.'&subj_id='.$row["subj_id"].'&create="><strong>'.$row["subj_name"].'</strong><br /><small><em>'.$row["sy"].' '.$row["semester"].'</em></small></a></li><li class="divider"></li>';
	        }
	    }else{
	        $output .= '<li>&nbsp&nbsp&nbsp<small>No Revised Syllabus</small></li>';
	    }
	 
	    $query_1 = "SELECT sched_subj.employment_id, syllabusstatus.syll_status FROM syllabusstatus INNER JOIN syllabus ON syllabusstatus.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id WHERE syllabusstatus.syll_status = 'unread' AND sched_subj.employment_id = '".$emp_id."' AND syllabusstatus.syll_status_desc = 'pending' AND syllabusstatus.syll_rev_count > 0";
	    $result_1 = mysqli_query($connect, $query_1);
	    $count = mysqli_num_rows($result_1);
	    $data = array('notification'   => $output,'unseen_notification' => $count);
	    echo json_encode($data);
	}else if ($page=='unreadprintedtq') {
		$count=0;
		$emp_id=$_POST['emp_id'];
  		$query = "SELECT tq.tq_id, `subject`.subj_name, tq.num_copies, tqstatus.date_time, school_year.sy, semester.semester, tq.exam_id, syllabus.syllabus_id, major_exams.exam_period FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON semester.sem_id = sched_subj.sem_id INNER JOIN school_year ON school_year.sy_id = sched_subj.sy_id INNER JOIN major_exams ON major_exams.exam_id = tq.exam_id WHERE tqstatus.status_desc = 'printed' AND sched_subj.employment_id = '".$emp_id."' ORDER BY school_year.sy DESC, semester.semester DESC LIMIT 10";
	    $result = mysqli_query($connect, $query);
	    $output = '<li>&nbsp&nbsp&nbspApproved College TQ</li>';
	 
	    if(mysqli_num_rows($result) > 0){
	        while($row = mysqli_fetch_array($result)){
	               $output .= '<li><a href="createtq.php?tq_id='.$row["tq_id"].'&syllabus_id='.$row["syllabus_id"].'&period='.$row["exam_id"].'"><strong>'.$row["subj_name"].'</strong><br /><small><em>'.$row["sy"].' '.$row["semester"].' ('.$row["exam_period"].')</em></small></a></li><li class="divider"></li>';
	        }
	    }else{
	        $output .= '<li>&nbsp&nbsp&nbsp<small>No Approved College TQ</small></li>';
	    }

  		$query1 = "SELECT shs_syll.shs_syll_id, shs_tq.shs_tq_id, shs_subject.shs_subj_name, school_year.sy, semester.semester, shs_tqstatus.shs_status_desc, shs_tqstatus.shs_notif_status, major_exams.exam_period FROM shs_syll INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id WHERE shs_syll.employment_id = '".$emp_id."' AND shs_tqstatus.shs_status_desc = 'printed' ORDER BY school_year.sy DESC, semester.semester DESC LIMIT 10 ";
	    $result1 = mysqli_query($connect, $query1);
	    $output .= '<li>&nbsp&nbsp&nbspApproved SHS TQ</li>';
	 
	    if(mysqli_num_rows($result1) > 0){
	        while($row1 = mysqli_fetch_array($result1)){
	               $output .= '<li><a href="shscreatetq.php?shstq_id='.$row1["shs_tq_id"].'&shssyllabus_id='.$row1["shs_syll_id"].'"><strong>'.$row1["shs_subj_name"].'</strong><br /><small><em>'.$row1["sy"].' '.$row1["semester"].' ('.$row1["exam_period"].')</em></small></a></li><li class="divider"></li>';
	        }
	    }else{
	        $output .= '<li>&nbsp&nbsp&nbsp<small>No Approved SHS TQ</small></li>';
	    }



	 
	    $query_1 = "SELECT tqstatus.notif_status FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON semester.sem_id = sched_subj.sem_id INNER JOIN school_year ON school_year.sy_id = sched_subj.sy_id WHERE tqstatus.status_desc = 'printed' AND sched_subj.employment_id = '".$emp_id."' AND tqstatus.notif_status = 'unread' ";
	    $result_1 = mysqli_query($connect, $query_1);
	    $count += mysqli_num_rows($result_1);
	    $query_2 = "SELECT shs_tqstatus.shs_status_desc, shs_tqstatus.shs_notif_status FROM shs_syll INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id WHERE shs_syll.employment_id = '".$emp_id."' AND shs_tqstatus.shs_status_desc = 'printed' AND shs_tqstatus.shs_notif_status = 'unread' ";
	    $result_2 = mysqli_query($connect, $query_2);
	    $count += mysqli_num_rows($result_2);

	    $data = array('notification'   => $output,'unseen_notification' => $count);
	    echo json_encode($data);
	}else if ($page=='unreadapptq') {
		$count=0;
		$emp_id=$_POST['emp_id'];
  		$query = "SELECT tq.tq_id, `subject`.subj_name, tq.num_copies, tqstatus.date_time, school_year.sy, semester.semester, tq.exam_id, syllabus.syllabus_id, major_exams.exam_period FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON semester.sem_id = sched_subj.sem_id INNER JOIN school_year ON school_year.sy_id = sched_subj.sy_id INNER JOIN major_exams ON major_exams.exam_id = tq.exam_id WHERE tqstatus.status_desc = 'for printing' AND sched_subj.employment_id = '".$emp_id."' ORDER BY school_year.sy DESC, semester.semester DESC LIMIT 10";
	    $result = mysqli_query($connect, $query);
	    $output = '<li>&nbsp&nbsp&nbspApproved College TQ</li>';
	 
	    if(mysqli_num_rows($result) > 0){
	        while($row = mysqli_fetch_array($result)){
	               $output .= '<li><a href="createtq.php?tq_id='.$row["tq_id"].'&syllabus_id='.$row["syllabus_id"].'&period='.$row["exam_id"].'"><strong>'.$row["subj_name"].'</strong><br /><small><em>'.$row["sy"].' '.$row["semester"].' ('.$row["exam_period"].')</em></small></a></li><li class="divider"></li>';
	        }
	    }else{
	        $output .= '<li>&nbsp&nbsp&nbsp<small>No Approved College TQ</small></li>';
	    }

  		$query1 = "SELECT shs_syll.shs_syll_id, shs_tq.shs_tq_id, shs_subject.shs_subj_name, school_year.sy, semester.semester, shs_tqstatus.shs_status_desc, shs_tqstatus.shs_notif_status, major_exams.exam_period FROM shs_syll INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id WHERE shs_syll.employment_id = '".$emp_id."' AND shs_tqstatus.shs_status_desc = 'for printing' ORDER BY school_year.sy DESC, semester.semester DESC LIMIT 10 ";
	    $result1 = mysqli_query($connect, $query1);
	    $output .= '<li>&nbsp&nbsp&nbspApproved SHS TQ</li>';
	 
	    if(mysqli_num_rows($result1) > 0){
	        while($row1 = mysqli_fetch_array($result1)){
	               $output .= '<li><a href="shscreatetq.php?shstq_id='.$row1["shs_tq_id"].'&shssyllabus_id='.$row1["shs_syll_id"].'"><strong>'.$row1["shs_subj_name"].'</strong><br /><small><em>'.$row1["sy"].' '.$row1["semester"].' ('.$row1["exam_period"].')</em></small></a></li><li class="divider"></li>';
	        }
	    }else{
	        $output .= '<li>&nbsp&nbsp&nbsp<small>No Approved SHS TQ</small></li>';
	    }



	 
	    $query_1 = "SELECT tqstatus.notif_status FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON semester.sem_id = sched_subj.sem_id INNER JOIN school_year ON school_year.sy_id = sched_subj.sy_id WHERE tqstatus.status_desc = 'for printing' AND sched_subj.employment_id = '".$emp_id."' AND tqstatus.notif_status = 'unread' ";
	    $result_1 = mysqli_query($connect, $query_1);
	    $count += mysqli_num_rows($result_1);
	    $query_2 = "SELECT shs_tqstatus.shs_status_desc, shs_tqstatus.shs_notif_status FROM shs_syll INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id WHERE shs_syll.employment_id = '".$emp_id."' AND shs_tqstatus.shs_status_desc = 'for printing' AND shs_tqstatus.shs_notif_status = 'unread' ";
	    $result_2 = mysqli_query($connect, $query_2);
	    $count += mysqli_num_rows($result_2);

	    $data = array('notification'   => $output,'unseen_notification' => $count);
	    echo json_encode($data);
	}else if ($page=='unreadrevtq') {
		$count=0;
		$emp_id=$_POST['emp_id'];
  		$query = "SELECT tq.tq_id, `subject`.subj_name, tq.num_copies, tqstatus.date_time, school_year.sy, semester.semester, tq.exam_id, syllabus.syllabus_id, major_exams.exam_period FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON semester.sem_id = sched_subj.sem_id INNER JOIN school_year ON school_year.sy_id = sched_subj.sy_id INNER JOIN major_exams ON major_exams.exam_id = tq.exam_id WHERE tqstatus.status_desc = 'pending' AND sched_subj.employment_id = '".$emp_id."' AND tqstatus.revise_count > '0' ORDER BY school_year.sy DESC, semester.semester DESC LIMIT 10";
	    $result = mysqli_query($connect, $query);
	    $output = '<li>&nbsp&nbsp&nbspRevised TQ</li>';
	 
	    if(mysqli_num_rows($result) > 0){
	        while($row = mysqli_fetch_array($result)){
	               $output .= '<li><a href="createtq.php?tq_id='.$row["tq_id"].'&syllabus_id='.$row["syllabus_id"].'&period='.$row["exam_id"].'"><strong>'.$row["subj_name"].'</strong><br /><small><em>'.$row["sy"].' '.$row["semester"].' ('.$row["exam_period"].')</em></small></a></li><li class="divider"></li>';
	        }
	    }else{
	        $output .= '<li>&nbsp&nbsp&nbsp<small>No Revised TQ</small></li>';
	    }

	    $query1 = "SELECT DISTINCT shs_syll.shs_syll_id, shs_tq.shs_tq_id, shs_subject.shs_subj_name, school_year.sy, semester.semester, shs_tqstatus.shs_status_desc, shs_tqstatus.shs_notif_status, major_exams.exam_period, major_exams.exam_id FROM shs_syll INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id WHERE shs_syll.employment_id = '".$emp_id."' AND shs_tqstatus.shs_status_desc = 'pending' AND shs_tqstatus.shs_revise_count > '0' ORDER BY school_year.sy DESC, semester.semester DESC LIMIT 10 ";
	    $result1 = mysqli_query($connect, $query1);
	    $output .= '<li>&nbsp&nbsp&nbspRevised SHS TQ</li>';
	 
	    if(mysqli_num_rows($result1) > 0){
	        while($row1 = mysqli_fetch_array($result1)){
	               $output .= '<li><a href="shscreatetq.php?shstq_id='.$row1["shs_tq_id"].'&shssyllabus_id='.$row1["shs_syll_id"].'"><strong>'.$row1["shs_subj_name"].'</strong><br /><small><em>'.$row1["sy"].' '.$row1["semester"].' ('.$row1["exam_period"].')</em></small></a></li><li class="divider"></li>';
	        }
	    }else{
	        $output .= '<li>&nbsp&nbsp&nbsp<small>No Revised SHS TQ</small></li>';
	    }
	 
	    $query_1 = "SELECT tqstatus.notif_status FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON semester.sem_id = sched_subj.sem_id INNER JOIN school_year ON school_year.sy_id = sched_subj.sy_id WHERE tqstatus.status_desc = 'pending' AND sched_subj.employment_id = '".$emp_id."' AND tqstatus.notif_status = 'unread' AND tqstatus.revise_count > '0' ";
	    $result_1 = mysqli_query($connect, $query_1);
	    $count += mysqli_num_rows($result_1);
	    $query_2 = "SELECT shs_tqstatus.shs_status_desc, shs_tqstatus.shs_notif_status FROM shs_syll INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id WHERE shs_syll.employment_id = '".$emp_id."' AND shs_tqstatus.shs_status_desc = 'pending' AND shs_tqstatus.shs_notif_status = 'unread' AND shs_tqstatus.shs_revise_count > '0'";
	    $result_2 = mysqli_query($connect, $query_2);
	    $count += mysqli_num_rows($result_2);

	    $data = array('notification'   => $output,'unseen_notification' => $count);
	    echo json_encode($data);
	}else if ($page=='unreadsyllque') {
		$dep=$_POST['dep'];
		if ($dep=="SHS") {
			$dep="GEN";
		}
  		$query = "SELECT syllabusstatus.syll_status_desc, `subject`.subj_name, school_year.sy, semester.semester, `subject`.subj_id, sched_subj.ss_id, syllabus.syllabus_id, employees.employee_lname, employees.employee_fname FROM syllabusstatus INNER JOIN syllabus ON syllabusstatus.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id WHERE syllabusstatus.syll_status_desc = 'queue for dean' AND sched_subj.department = '".$dep."' ORDER BY syllabusstatus.syll_date_time ASC LIMIT 10";
	    $result = mysqli_query($connect, $query);
	    $output = '<li>&nbsp&nbsp&nbspQueued Syllabus</li>';
	 	$a=0;
	    if(mysqli_num_rows($result) > 0){
	        while($row = mysqli_fetch_array($result)){
	        	if ($a==0) {
	        		$link='<a href="deancheck1.php?syllabus_id='.$row["syllabus_id"].'&create=">';
	        	}else{
	        		$link='<a href="dean_queue.php">';
	        	}
	               $output .= '<li>'.$link.'<strong>'.utf8_encode($row["employee_lname"]).', '.utf8_encode($row["employee_fname"]).'</strong><br /><small>'.$row["subj_name"].' <em>'.$row["sy"].' '.$row["semester"].'</em></small></a></li><li class="divider"></li>';
	        	
	        $a++;
	        }
	    }else{
	        $output .= '<li>&nbsp&nbsp&nbsp<small>No Queued Syllabus</small></li>';
	    }
	 
	    $query_1 = "SELECT syllabusstatus.syll_status_desc, `subject`.subj_name, school_year.sy, semester.semester, `subject`.subj_id, sched_subj.ss_id, syllabus.syllabus_id FROM syllabusstatus INNER JOIN syllabus ON syllabusstatus.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE syllabusstatus.syll_status_desc = 'queue for dean' AND sched_subj.department = '".$dep."' AND syllabusstatus.syll_status = 'unread'";
	    $result_1 = mysqli_query($connect, $query_1);
	    $count = mysqli_num_rows($result_1);
	    $data = array('notification'   => $output,'unseen_notification' => $count);
	    echo json_encode($data);
	}else if ($page=='unreadsyllque1') {
		$dep=$_POST['dep'];
		$query = "SELECT syllabusstatus.syll_status_desc, `subject`.subj_name, school_year.sy, semester.semester, `subject`.subj_id, sched_subj.ss_id, syllabus.syllabus_id, employees.employee_lname, employees.employee_fname FROM syllabusstatus INNER JOIN syllabus ON syllabusstatus.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id WHERE syllabusstatus.syll_status_desc = 'queue for daa' ORDER BY syllabusstatus.syll_date_time ASC LIMIT 10";
	    $result = mysqli_query($connect, $query);
	    $output = '<li>&nbsp&nbsp&nbspQueued Syllabus</li>';
	 	$a=0;
	    if(mysqli_num_rows($result) > 0){
	        while($row = mysqli_fetch_array($result)){
	        	if ($a==0) {
	        		$link='<a href="deancheck1.php?syllabus_id='.$row["syllabus_id"].'&create=">';
	        	}else{
	        		$link='<a href="dean_queue.php">';
	        	}
	               $output .= '<li>'.$link.'<strong>'.utf8_encode($row["employee_lname"]).', '.utf8_encode($row["employee_fname"]).'</strong><br /><small>'.$row["subj_name"].' <em>'.$row["sy"].' '.$row["semester"].'</em></small></a></li><li class="divider"></li>';
	        	
	        $a++;
	        }
	    }else{
	        $output .= '<li>&nbsp&nbsp&nbsp<small>No Queued Syllabus</small></li>';
	    }
	 
	    $query_1 = "SELECT syllabusstatus.syll_status_desc, `subject`.subj_name, school_year.sy, semester.semester, `subject`.subj_id, sched_subj.ss_id, syllabus.syllabus_id FROM syllabusstatus INNER JOIN syllabus ON syllabusstatus.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE syllabusstatus.syll_status_desc = 'queue for daa' AND syllabusstatus.syll_status = 'unread'";
	    $result_1 = mysqli_query($connect, $query_1);
	    $count = mysqli_num_rows($result_1);
	    $data = array('notification'   => $output,'unseen_notification' => $count);
	    echo json_encode($data);
	}else if ($page=='unreadquetq') {
		$count=0;
		$dep=$_POST['dep'];
		$pos=$_POST['pos'];
		$whre="";
		if ($pos=="Academic Head") {
			$whre="queue for daa";
			$query = "SELECT tq.tq_id, `subject`.subj_name, tq.num_copies, tqstatus.date_time, school_year.sy, semester.semester, tq.exam_id, syllabus.syllabus_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON semester.sem_id = sched_subj.sem_id INNER JOIN school_year ON school_year.sy_id = sched_subj.sy_id INNER JOIN major_exams ON major_exams.exam_id = tq.exam_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id WHERE tqstatus.status_desc = '".$whre."' ORDER BY tqstatus.date_time ASC LIMIT 10";
		}else if ($pos=="Dean") {
			$whre="queue for dean";
			if ($dep=="SHS") {
				$query = "SELECT tq.tq_id, `subject`.subj_name, tq.num_copies, tqstatus.date_time, school_year.sy, semester.semester, tq.exam_id, syllabus.syllabus_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON semester.sem_id = sched_subj.sem_id INNER JOIN school_year ON school_year.sy_id = sched_subj.sy_id INNER JOIN major_exams ON major_exams.exam_id = tq.exam_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id WHERE tqstatus.status_desc = '".$whre."' AND (sched_subj.department = 'SHS'  OR sched_subj.department = 'GEN') ORDER BY tqstatus.date_time ASC LIMIT 10";
			}else{
				$query = "SELECT tq.tq_id, `subject`.subj_name, tq.num_copies, tqstatus.date_time, school_year.sy, semester.semester, tq.exam_id, syllabus.syllabus_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON semester.sem_id = sched_subj.sem_id INNER JOIN school_year ON school_year.sy_id = sched_subj.sy_id INNER JOIN major_exams ON major_exams.exam_id = tq.exam_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id WHERE tqstatus.status_desc = '".$whre."' AND sched_subj.department = '".$dep."' ORDER BY tqstatus.date_time ASC LIMIT 10";
			}
		}
		
	  	
	    $result = mysqli_query($connect, $query);
	    $output = '<li>&nbsp&nbsp&nbspQueued College TQ</li>';
	 	$a=0;
	    if(mysqli_num_rows($result) > 0){
	        while($row = mysqli_fetch_array($result)){
	        	if ($a==0) {
	        		$link='<a href="deancheck.php?tq_id='.$row["tq_id"].'&create=">';
	        	}else{
	        		$link='<a href="dean_queue.php">';
	        	}
	               $output .= '<li>'.$link.'<strong>'.utf8_encode($row["employee_lname"]).', '.utf8_encode($row["employee_fname"]).'</strong><br /><small>'.$row["subj_name"].' <em>'.$row["sy"].' '.$row["semester"].'</em></small></a></li><li class="divider"></li>';
	        $a++;
	        }
	    }else{
	        $output .= '<li>&nbsp&nbsp&nbsp<small>No Queued College TQ</small></li>';
	    }
	    if ($dep=="SHS") {
		  	$query1 = "SELECT school_year.sy, semester.semester, shs_subject.shs_subj_name, employees.employee_lname, employees.employee_fname, shs_tqstatus.shs_status_desc, shs_tqstatus.shs_notif_status, shs_tq.shs_tq_id FROM shs_syll INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN employment ON shs_syll.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id WHERE shs_tqstatus.shs_status_desc = '".$whre."' ORDER BY shs_tqstatus.shs_date_time ASC LIMIT 10";
		    $result1 = mysqli_query($connect, $query1);
		    $output .= '<li>&nbsp&nbsp&nbspQueued SHS TQ</li>';
		 	$a1=0;
		    if(mysqli_num_rows($result1) > 0){
		        while($row1 = mysqli_fetch_array($result1)){
		        	if ($a1==0) {
		        		$link='<a href="shsdeancheck.php?tq_id='.$row1["shs_tq_id"].'&create=">';
		        	}else{
		        		$link='<a href="dean_queue.php">';
		        	}
		               $output .= '<li>'.$link.'<strong>'.utf8_encode($row1["employee_lname"]).', '.utf8_encode($row1["employee_fname"]).'</strong><br /><small>'.$row1["shs_subj_name"].' <em>'.$row1["sy"].' '.$row1["semester"].'</em></small></a></li><li class="divider"></li>';
		        $a1++;
		        }
		    }else{
		        $output .= '<li>&nbsp&nbsp&nbsp<small>No Queued SHS TQ </small></li>';
		    }
	    }

	 	if($pos=="Academic Head"){
	 		$query_1 = "SELECT tq.tq_id, `subject`.subj_name, tq.num_copies, tqstatus.date_time, school_year.sy, semester.semester, tq.exam_id, syllabus.syllabus_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON semester.sem_id = sched_subj.sem_id INNER JOIN school_year ON school_year.sy_id = sched_subj.sy_id INNER JOIN major_exams ON major_exams.exam_id = tq.exam_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id WHERE tqstatus.status_desc = '".$whre."' AND tqstatus.notif_status = 'unread' ORDER BY tqstatus.date_time ASC ";
	 	
		    if ($dep=="SHS") {
				$query_2 = "SELECT shs_tqstatus.shs_status_id FROM shs_tqstatus WHERE shs_tqstatus.shs_status_desc = '".$whre."' AND shs_tqstatus.shs_notif_status = 'unread'";
				$result_2 = mysqli_query($connect, $query_2);
				$count += mysqli_num_rows($result_2);
		    }
		    $result_1 = mysqli_query($connect, $query_1);
		    $count += mysqli_num_rows($result_1);


	 	}else{
	 		$query_1 = "SELECT tq.tq_id, `subject`.subj_name, tq.num_copies, tqstatus.date_time, school_year.sy, semester.semester, tq.exam_id, syllabus.syllabus_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON semester.sem_id = sched_subj.sem_id INNER JOIN school_year ON school_year.sy_id = sched_subj.sy_id INNER JOIN major_exams ON major_exams.exam_id = tq.exam_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id WHERE tqstatus.status_desc = '".$whre."' AND sched_subj.department = '".$dep."' AND tqstatus.notif_status = 'unread' ORDER BY tqstatus.date_time ASC ";
	 	
		    if ($dep=="SHS") {
				$query_2 = "SELECT shs_tqstatus.shs_status_id FROM shs_tqstatus WHERE shs_tqstatus.shs_status_desc = '".$whre."' AND shs_tqstatus.shs_notif_status = 'unread'";
				$result_2 = mysqli_query($connect, $query_2);
				$count += mysqli_num_rows($result_2);
		    }
		    $result_1 = mysqli_query($connect, $query_1);
		    $count += mysqli_num_rows($result_1);

	 	}
	 	
	    

	    
	    $data = array('notification'   => $output,'unseen_notification' => $count);
	    echo json_encode($data);
	}else if ($page=='unreadphquetq') {
		$count=0;
		$dep=$_POST['dep'];
		$emp_id=$_POST['emp_id'];
		if ($dep=="SHS") {
			$query = "SELECT tq.tq_id, `subject`.subj_name, tq.num_copies, tqstatus.date_time, school_year.sy, semester.semester, tq.exam_id, syllabus.syllabus_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON semester.sem_id = sched_subj.sem_id INNER JOIN school_year ON school_year.sy_id = sched_subj.sy_id INNER JOIN major_exams ON major_exams.exam_id = tq.exam_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id WHERE tqstatus.status_desc = 'queue for ph' AND (sched_subj.department = 'SHS'  OR sched_subj.department = 'GEN') ORDER BY tqstatus.date_time ASC LIMIT 10";
		}else{
			$query = "SELECT tq.tq_id, `subject`.subj_name, tq.num_copies, tqstatus.date_time, school_year.sy, semester.semester, tq.exam_id, syllabus.syllabus_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN semester ON semester.sem_id = sched_subj.sem_id INNER JOIN school_year ON school_year.sy_id = sched_subj.sy_id INNER JOIN major_exams ON major_exams.exam_id = tq.exam_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id WHERE tqstatus.status_desc = 'queue for ph' AND sched_subj.department = '".$dep."' AND tqstatus.ph = '".$emp_id."' ORDER BY tqstatus.date_time ASC LIMIT 10";
		}
	  	
	    $result = mysqli_query($connect, $query);
	    $output = '<li>&nbsp&nbsp&nbspQueued College TQ</li>';
	 	$a=0;
	    if(mysqli_num_rows($result) > 0){
	        while($row = mysqli_fetch_array($result)){
	        	if ($a==0) {
	        		$link='<a href="tqcheck.php?tq_id='.$row["tq_id"].'&create=">';
	        	}else{
	        		$link='<a href="ph_queue.php">';
	        	}
	               $output .= '<li>'.$link.'<strong>'.utf8_encode($row["employee_lname"]).', '.utf8_encode($row["employee_fname"]).'</strong><br /><small>'.$row["subj_name"].' <em>'.$row["sy"].' '.$row["semester"].'</em></small></a></li><li class="divider"></li>';
	        $a++;
	        }
	    }else{
	        $output .= '<li>&nbsp&nbsp&nbsp<small>No Queued College TQ</small></li>';
	    }
	    if ($dep=="SHS") {
		  	$query1 = "SELECT school_year.sy, semester.semester, shs_subject.shs_subj_name, employees.employee_lname, employees.employee_fname, shs_tqstatus.shs_status_desc, shs_tqstatus.shs_notif_status, shs_tq.shs_tq_id FROM shs_syll INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN employment ON shs_syll.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id WHERE shs_tqstatus.shs_status_desc = 'queue for ph' AND shs_tqstatus.shs_ph = '".$emp_id."' ORDER BY shs_tqstatus.shs_date_time ASC LIMIT 10";
		    $result1 = mysqli_query($connect, $query1);
		    $output .= '<li>&nbsp&nbsp&nbspQueued SHS TQ</li>';
		 	$a=0;
		    if(mysqli_num_rows($result1) > 0){
		        while($row1 = mysqli_fetch_array($result1)){
		        	if ($a==0) {
		        		$link='<a href="shstqcheck.php?tq_id='.$row1["shs_tq_id"].'&create=">';
		        	}else{
		        		$link='<a href="ph_queue.php">';
		        	}
		               $output .= '<li>'.$link.'<strong>'.utf8_encode($row1["employee_lname"]).', '.utf8_encode($row1["employee_fname"]).'</strong><br /><small>'.$row1["shs_subj_name"].' <em>'.$row1["sy"].' '.$row1["semester"].'</em></small></a></li><li class="divider"></li>';
		        $a++;
		        }
		    }else{
		        $output .= '<li>&nbsp&nbsp&nbsp<small>No Queued SHS TQ</small></li>';
		    }
	    }
	 	if ($dep=="SHS") {
	 		$query_1 = "SELECT tqstatus.status_id FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id WHERE tqstatus.status_desc = 'queue for ph' AND (sched_subj.department = 'SHS' OR sched_subj.department = 'GEN') AND tqstatus.notif_status = 'unread'";
	 	}else{
	 		$query_1 = "SELECT tqstatus.status_id FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id WHERE tqstatus.status_desc = 'queue for ph' AND sched_subj.department = '".$dep."' AND tqstatus.ph = '".$emp_id."' AND tqstatus.notif_status = 'unread'";
	 	}
	    
	    $result_1 = mysqli_query($connect, $query_1);
	    $count += mysqli_num_rows($result_1);
	    $query_2 = "SELECT shs_tqstatus.shs_status_id FROM shs_tqstatus WHERE shs_tqstatus.shs_status_desc = 'queue for ph' AND shs_tqstatus.SHS_ph = '".$emp_id."' AND shs_tqstatus.shs_notif_status = 'unread'";
	    $result_2 = mysqli_query($connect, $query_2);
	    $count += mysqli_num_rows($result_2);

	    
	    $data = array('notification'   => $output,'unseen_notification' => $count);
	    echo json_encode($data);
	}else if ($page=='unreadprinterque') {
		$count=0;
		
		$query = "SELECT syllabus.syllabus_id, tq.tq_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, semester.semester, school_year.sy, `subject`.subj_name, tq.num_copies FROM syllabus INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id WHERE tqstatus.status_desc = 'for printing' ORDER BY tqstatus.date_time ASC LIMIT 5";
		
	  	
	    $result = mysqli_query($connect, $query);
	    $output = '<li>&nbsp&nbsp&nbspQueued College TQ</li>';
	 	$a=0;
	    if(mysqli_num_rows($result) > 0){
	        while($row = mysqli_fetch_array($result)){
	        	if ($a==0) {
	        		$link='<a href="printtq.php?tq_id='.$row["tq_id"].'&syllabus_id='.$row["syllabus_id"].'&num_copies='.$row["num_copies"].'&Open=">';
	        	}else{
	        		$link='<a href="print_queue.php">';
	        	}
	               $output .= '<li>'.$link.'<strong>'.utf8_encode($row["employee_lname"]).', '.utf8_encode($row["employee_fname"]).'</strong><br /><small>'.$row["subj_name"].' <em>'.$row["sy"].' '.$row["semester"].'</em></small></a></li><li class="divider"></li>';
	        $a++;
	        }
	    }else{
	        $output .= '<li>&nbsp&nbsp&nbsp<small>No Queued College TQ</small></li>';
	    }
	    
	  	$query1 = "SELECT shs_tq.shs_num_copies,shs_tq.shs_tq_id, shs_syll.shs_syll_id, shs_subject.shs_subj_name, semester.semester, school_year.sy, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext FROM shs_syll INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN employment ON shs_syll.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id WHERE shs_tqstatus.shs_status_desc = 'for printing' ORDER BY shs_tqstatus.shs_date_time ASC LIMIT 5";
	    $result1 = mysqli_query($connect, $query1);
	    $output .= '<li>&nbsp&nbsp&nbspQueued SHS TQ</li>';
	 	$a=0;
	    if(mysqli_num_rows($result1) > 0){
	        while($row1 = mysqli_fetch_array($result1)){
	        	if ($a==0) {
	        		$link='<a href="shsprinttq.php?tq_id='.$row1["shs_tq_id"].'&syllabus_id='.$row1["shs_syll_id"].'&num_copies='.$row1["shs_num_copies"].'&Open=">';
	        	}else{
	        		$link='<a href="print_queue.php">';
	        	}
	               $output .= '<li>'.$link.'<strong>'.utf8_encode($row1["employee_lname"]).', '.utf8_encode($row1["employee_fname"]).'</strong><br /><small>'.$row1["shs_subj_name"].' <em>'.$row1["sy"].' '.$row1["semester"].'</em></small></a></li><li class="divider"></li>';
	        $a++;
	        }
	    }else{
	        $output .= '<li>&nbsp&nbsp&nbsp<small>No Queued SHS TQ</small></li>';
	    }
	    
	 	
 		$query_1 = "SELECT shs_tqstatus.shs_status_desc FROM shs_tqstatus WHERE shs_tqstatus.shs_status_desc = 'for printing' AND shs_tqstatus.shs_notif_status = 'unread'";
 	
	    
	    $result_1 = mysqli_query($connect, $query_1);
	    $count += mysqli_num_rows($result_1);
	    $query_2 = "SELECT tqstatus.status_desc FROM tqstatus WHERE tqstatus.status_desc = 'for printing' AND tqstatus.notif_status = 'unread'";
	    $result_2 = mysqli_query($connect, $query_2);
	    $count += mysqli_num_rows($result_2);

	    
	    $data = array('notification'   => $output,'unseen_notification' => $count);
	    echo json_encode($data);
	}else if ($page=='unreadchat') {
		$emp_id=$_POST['emp_id'];
  		$query = "SELECT DISTINCT employees.employee_lname, employees.employee_fname, employees.employee_mname, user_access.user_id, Max(messages.message_date_time) as date1 FROM employees INNER JOIN employment ON employment.employee_id = employees.employee_id INNER JOIN user_access ON user_access.employment_id = employment.employment_id INNER JOIN messages ON user_access.user_id = messages.from_user WHERE messages.to_user = '".$emp_id."' GROUP BY messages.from_user,employees.employee_lname, employees.employee_fname, employees.employee_mname, user_access.user_id ORDER BY message_date_time DESC LIMIT 20";
	    $result = mysqli_query($connect, $query);
	    $output = '<li>&nbsp&nbsp&nbspNew Message</li>';
	 
	    if(mysqli_num_rows($result) > 0){
	        while($row = mysqli_fetch_array($result)){
	               $output .= '<li><a href="instructor_chat.php?id='.$row["user_id"].'"><strong>'.utf8_encode($row["employee_fname"]).' '.utf8_encode($row["employee_mname"]).' '.utf8_encode($row["employee_lname"]).'</strong><br /><small><em>'.$row["date1"].'</em></small></a></li><li class="divider"></li>';
	        }
	    }else{
	        $output .= '<li>&nbsp&nbsp&nbsp<small>No New Message</small></li>';
	    }
	 
	    $query_1 = "SELECT DISTINCT employees.employee_lname, employees.employee_fname, employees.employee_mname, user_access.user_id, messages.message_date_time FROM employees INNER JOIN employment ON employment.employee_id = employees.employee_id INNER JOIN user_access ON user_access.employment_id = employment.employment_id INNER JOIN messages ON user_access.user_id = messages.from_user WHERE messages.to_user = '".$emp_id."' AND messages.message_status = 'unread' GROUP BY messages.from_user,employees.employee_lname, employees.employee_fname, employees.employee_mname, user_access.user_id";
	    $result_1 = mysqli_query($connect, $query_1);
	    $count = mysqli_num_rows($result_1);
	    $data = array('notification'   => $output,'unseen_notification' => $count);
	    echo json_encode($data);
	}
}
?>