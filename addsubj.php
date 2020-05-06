<?php
$connection = mysql_connect('localhost','root','') or die(mysql_error());
$database = mysql_select_db('testbank') or die(mysql_error());

if (!empty($_GET)) {
	$page=$_GET['p'];
	if ($page=='addsub') {
		$subj=$_POST['subj'];
		$dep=$_POST['dep'];
		$emp_id=$_POST['emp_id'];
		$sy=$_POST['sy'];
		$sem=$_POST['sem'];
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
		$insert = "INSERT INTO `sched_subj` (`employment_id`,`department`,`subj_id`,`sem_id`,`sy_id`) VALUES ('".$emp_id."','".$dep."','".$subj."','".$sem."','".$sy_id."')";
		$exe=mysql_query($insert) or die("Query Failed : ".mysql_error());
		$insertid=mysql_insert_id();
		$sql1 = "SELECT `subject`.subj_id, `subject`.subj_code, `subject`.subj_name, `subject`.subj_desc, sched_subj.ss_id, `subject`.lec_unit, `subject`.lab_unit, `subject`.pre_requisite FROM sched_subj INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id WHERE sched_subj.ss_id = $insertid";
        $result1 = mysql_query($sql1);
        while($row=mysql_fetch_array($result1)){
            $subj_id1=$row['subj_id'];
            $subj_code1=$row['subj_code'];
            $subj_name1=$row['subj_name'];
            $subj_desc1=$row['subj_desc'];
            $lec_unit=$row['lec_unit'];
            $lab_unit=$row['lab_unit'];
            $unit=$lec_unit+$lab_unit;
            $pre_requisite=$row['pre_requisite'];
            $sql2 = "SELECT * FROM subject_info WHERE subject_code = '".$subj_code1."'";
            $result2 = mysql_query($sql2);
            if(mysql_num_rows($result2)==0){
                $query = "INSERT INTO `subject_info` (`subject_name`, `subject_code`,`subject_unit`,`pre_requisites`,`subject_description`) VALUES ('".$subj_name1."','".$subj_code1."','".$unit."','".$pre_requisite."','".$subj_desc1."')";
                $resultw1=mysql_query($query) or die("Query Failed :1 subject_info ".mysql_error());   
                $insinfo=mysql_insert_id();
                $sql3 = "SELECT * FROM syllabus WHERE course_info_id = '".$insinfo."' AND ss_id = '".$insertid."'";
                    $result3 = mysql_query($sql3);
                    if(mysql_num_rows($result3)==0){
                        $querysy = "INSERT INTO `syllabus` (`course_info_id`, `ss_id`) VALUES ('".$insinfo."','".$insertid."')";
                        $resultw2=mysql_query($querysy) or die("Query Failed :2 ".mysql_error());  
                        $syl_id=mysql_insert_id();
                        $querysy1 = "INSERT INTO `syllabusstatus` (`syll_status_desc`,`syll_status`,`syll_rev_count`,`syllabus_id`) VALUES ('pending','unread',0,'".$syl_id."')";
                        $resultw1=mysql_query($querysy1) or die("Query Failed :s2 ".mysql_error()); 
                        
                    }
            }else{
                while($row1=mysql_fetch_array($result2)){
                    $subject_info_id=$row1['subject_info_id'];
                    $sql3 = "SELECT * FROM syllabus WHERE course_info_id = '".$subject_info_id."' AND ss_id = '".$insertid."'";
                    $result3 = mysql_query($sql3);
                    if(mysql_num_rows($result3)==0){
                        $querysy = "INSERT INTO `syllabus` (`course_info_id`, `ss_id`) VALUES ('".$subject_info_id."','".$insertid."')";
                        $resultw2=mysql_query($querysy) or die("Query Failed :2 ".mysql_error());  
                        $syl_id=mysql_insert_id();
                        $querysy1 = "INSERT INTO `syllabusstatus` (`syll_status_desc`,`syll_status`,`syll_rev_count`,`syllabus_id`) VALUES ('pending','unread',0,'".$syl_id."')";
                        $resultw1=mysql_query($querysy1) or die("Query Failed :s2 ".mysql_error()); 
                        
                    }
                }
            }
        }
        
	}elseif ($page=='getsub') {
		$data=array();
		$msg=array();
		$department=array();
		$id=array();
		$emp_id=$_POST['emp_id'];
		$sy=$_POST['sy'];
		$sem=$_POST['sem'];
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
		$sql = "SELECT sched_subj.ss_id, school_year.sy, semester.semester, `subject`.subj_name, `subject`.subj_code, `subject`.subj_desc, sched_subj.department FROM sched_subj INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id WHERE sched_subj.employment_id = '".$emp_id."' AND semester.sem_id = '".$sem."' AND school_year.sy = '".$sy."'";
        $result = mysql_query($sql);
        $count=0;
        if(!$result){
            $msg[]='Error Database';
        }else{
            if (mysql_num_rows($result)==0) {
                $msg[]='No subject found';            
            }else{
                while($row=mysql_fetch_array($result)){
                    $ss_id=$row['ss_id'];
                    $sy=$row['sy'];
                    $department[]=$row['department'];
                    $semester=$row['semester'];
                    $subj_name=$row['subj_name'];
                    $subj_code=$row['subj_code'];
                    $subj_desc=$row['subj_desc'];
                    $msg[]=$subj_name;
                    $id[]=$ss_id;
                }
                $count=mysql_num_rows($result);
            }
        }

	    $data[]=['msg'=>$msg, 'id'=>$id, 'count'=>$count, 'department'=>$department];
		echo json_encode($data);
	}elseif ($page=='deletesub') {
		$data[]=array();
		$msg[]=array();
		$del=$_GET['del'];
		$sql1=mysql_query("SELECT syllabus.syllabus_id, syllabusstatus.syll_status_desc FROM syllabusstatus INNER JOIN syllabus ON syllabusstatus.syllabus_id = syllabus.syllabus_id WHERE syllabus.ss_id = $del");
		if (mysql_num_rows($sql1)==0) {
			# code...
		}else{
			while ($row=mysql_fetch_array($sql1)) {
				$syllabus_id=$row['syllabus_id'];
				$status=$row['syll_status_desc'];

			}

			if($status!="approved"){
				$sql2=mysql_query("SELECT topics.topics_id FROM topics WHERE topics.syllabus_id = $syllabus_id");
				while ($row2=mysql_fetch_array($sql2)) {
					$topics_id=$row2['topics_id'];
					$del3 = "DELETE FROM subtopic WHERE topics_id='".$topics_id."'";
					$result3=mysql_query($del3) or die("Query Failed DELETE FROM subtopic: ".mysql_error());
					$del4 = "DELETE FROM topics WHERE topics_id='".$topics_id."'";
					$result4=mysql_query($del4) or die("Query Failed DELETE FROM topics: ".mysql_error());
				}
				$sql3=mysql_query("SELECT clo_ilo.clo_id FROM clo_ilo WHERE clo_ilo.syllabus_id = $syllabus_id");
				while ($row3=mysql_fetch_array($sql3)) {
					$clo_id=$row3['clo_id'];
					$del1 = "DELETE FROM pgo_clo WHERE clo_id='".$clo_id."'";
					$result1=mysql_query($del1) or die("Query Failed DELETE FROM pgo_clo: ".mysql_error());
					$del2 = "DELETE FROM clo_ilo WHERE clo_id='".$clo_id."'";
					$result2=mysql_query($del2) or die("Query Failed DELETE FROM clo_ilo: ".mysql_error());
				}
				
				
				$del5 = "DELETE FROM syllabus_remarks WHERE syllabus_id='".$syllabus_id."'";
				$result5=mysql_query($del5) or die("Query Failed DELETE FROM syllabus_remarks: ".mysql_error());
				$del6 = "DELETE FROM author WHERE syllabus_id='".$syllabus_id."'";
				$result6=mysql_query($del6) or die("Query Failed DELETE FROM author: ".mysql_error());
				$del7 = "DELETE FROM policies WHERE syllabus_id='".$syllabus_id."'";
				$result7=mysql_query($del7) or die("Query Failed DELETE FROM policies: ".mysql_error());
				$del8 = "DELETE FROM course_req WHERE syllabus_id='".$syllabus_id."'";
				$result8=mysql_query($del8) or die("Query Failed DELETE FROM course_req: ".mysql_error());
				$del9 = "DELETE FROM reference WHERE syllabus_id='".$syllabus_id."'";
				$result9=mysql_query($del9) or die("Query Failed DELETE FROM reference: ".mysql_error());
				$del10 = "DELETE FROM syllabusstatus WHERE syllabus_id='".$syllabus_id."'";
				$result10=mysql_query($del10) or die("Query Failed DELETE FROM syllabusstatus: ".mysql_error());
				$del11 = "DELETE FROM syllabus WHERE ss_id='".$del."'";
				$result11=mysql_query($del11) or die("Query Failed DELETE FROM syllabus: ".mysql_error());
				$del12 = "DELETE FROM sched_subj WHERE ss_id='".$del."'";
				$result12=mysql_query($del12) or die("Query Failed DELETE FROM sched_subj: ".mysql_error());
				$msg[]="Deleted!";
			}else{
				$msg[]="Delete Failed! Syllabus status approved.";
			}
		}
			


		$data[]=['msg'=>$msg];
		echo json_encode($data);
	}
}
?>