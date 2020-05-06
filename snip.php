login:

$sql="SELECT employment.employment_id, user_access.user_id, department.department_id, user_access.username, user_access.`password`, user_access.position, department.department_name, department.department_status FROM employment INNER JOIN user_access ON user_access.employment_id = employment.employment_id INNER JOIN department ON employment.department_id = department.department_id where password='$password' AND username='$username'";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);

	if($count==1){
		$result=mysql_fetch_array($result);
		$_SESSION["login_user"] = $username;
		$role = $result['position'];
		$_SESSION["user_position"] = $role;
		

		if($role =='Instructor'){
		 header("Location: instructor_index.php");
		 }
		elseif($role =='Program Head'){
		header("Location: ph_index.php");
		 }
		elseif($role =='Dean'){
		 header("Location: dean_index.php");
		 }


Accessibility load emp:

$sql2 = "SELECT * FROM user_access WHERE employment_id = '".$emp_id."'";
				$result2 = mysql_query($sql2);
				if(mysql_num_rows($result2)==0){
					echo '<tr><td><input type="hidden" name="id[]" class="form-control" value="'.$emp_id.'">'.$emp_fname.' '.$emp_mname.' '.$emp_lname.' '.$emp_ext.'</td>
			               <td><input type="text" name="username[]" class="form-control" id="username[]" placeholder="Enter username"></td>
			               <td><input type="text" name="password[]" class="form-control" id="password[]" placeholder="Enter password"></td>
			               <td><input type="hidden" name="position[]" class="form-control" id="position[]" value="'.$emp_job.'"><span class="col-xs-12 label label-'.$lblcolor.'">'.$emp_job.'</span></td>
						   <td><input type="checkbox" class="minimal" name="syllabus'.$emp_id.'" value="checked"></td>
				           <td><input type="checkbox" class="minimal" name="tq'.$emp_id.'" value="checked"></td>
				           <td><input type="checkbox" class="minimal" name="notification'.$emp_id.'" value="checked"></td>
				           <td><input type="checkbox" class="minimal" name="queue'.$emp_id.'" value="checked"></td>
				           <td><input type="checkbox" class="minimal" name="reports'.$emp_id.'" value="checked"></td>
				           <td><input type="checkbox" class="minimal" name="setdate'.$emp_id.'" value="checked"></td></tr>';			
				}

Accessibility save Access:

$sql = "SELECT employment_id FROM user_access WHERE employment_id = '".$id."'";
				$result = mysql_query($sql);
					if(mysql_num_rows($result)==0){
			           	$query = "INSERT INTO `user_access` (`username`, `password`,`position`,`syllabus`, `tq`, `notification`, `queue`,`reports`, `setdate`, `employment_id`, `id`) VALUES ('".$username."','".$password."','".$position."','".$syllabus."','".$tq."','".$notification."','".$queue."','".$reports."','".$setdate."','".$id."','".$_POST['admin_id']."')";
						$result=mysql_query($query) or die("Query Failed : ".mysql_error());						
					}else{
						$query = "UPDATE user_access SET username='".$username."',password='".$password."',position='".$position."',syllabus='".$syllabus."',tq='".$tq."',notification='".$notification."',queue='".$queue."',reports='".$reports."',setdate='".$setdate."' WHERE employment_id='".$id."'";
						$result=mysql_query($query) or die("Query Failed : ".mysql_error());
						$message = "Successfully Updated";
						echo "<script type='text/javascript'>alert('$message');</script>";
					}

Syllabus, TQ load subject:

$sql = "SELECT `subject`.subj_id, `subject`.subj_code, `subject`.subj_name, `subject`.subj_desc, unit_lecture.unit FROM sched_subj INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN unit_lecture ON unit_lecture.subj_id = `subject`.subj_id WHERE sched_subj.employment_id = $emp_id";
		$result = mysql_query($sql);
		if(!$result){
			echo 'Database Error!';
		}else{
			while($row=mysql_fetch_array($result)){
				$subj_id=$row['subj_id'];
				$subj_code=$row['subj_code'];
				$subj_name=$row['subj_name'];
				$subj_desc=$row['subj_desc'];
				$unit=$row['unit'];
				
				
				echo '<tr>
                  <td class="col-lg-10">
                  	<form action="syllabus.php" method="get" >
                  	<input type="hidden" name="emp_id" class="form-control" value="'.$emp_id.'">
                  	<input type="hidden" name="subj_id" class="form-control" value="'.$subj_id.'">
                  	<a >'.$subj_name.'</a>
                  </td>
                  <td class="col-lg-2"><button type="submit" class="btn btn-default" id="" name="create"><a><i class="glyphicon glyphicon-pencil createsyllabus"><span class="createsyllabustext">Create / Edit<br>Syllabus</span></i></a></button></form></td>
               	  
                </tr>';
					
			}										
		}

Syllabus create:

$sqlweek = "SELECT testbank.topics.topics_id FROM testbank.syllabus INNER JOIN testbank.topics ON testbank.topics.syllabus_id = testbank.syllabus.syllabus_id WHERE testbank.topics.`week` = '".$week."' AND testbank.syllabus.syllabus_id = testbank.topics.syllabus_id ";
    	$resultweek= mysql_query($sqlweek);

    	if(mysql_num_rows($resultweek)==0){
			$querytopic = "INSERT INTO `topics` (`topic_description`,`week`,`tla`,`resources`,`oba`,`syllabus_id`,`exam_id`) VALUES ('".$maintopics."','".$week."','".$tla."','".$resource."','".$oba."','".$syllabus_id."','".$period."')";
			$resultb1=mysql_query($querytopic) or die("Query Failed 5: ".mysql_error());
			$sqltopic = "SELECT topics_id FROM topics WHERE topic_description = '".$maintopics."' AND syllabus_id = '".$syllabus_id."'";
			$resulttopics= mysql_query($sqltopic);
			if(mysql_num_rows($resulttopics)==1){
				while($row2=mysql_fetch_array($resulttopics)){
					$topics_id=$row2['topics_id'];
				}
			}
			if (isset($_POST['subtopics'])) {
				foreach($_POST['subtopics'] as $row => $value){
					$subtopics=$_POST['subtopics'][$row];
					$querysubt = "INSERT INTO `subtopic` (`subtopic_description`,`topics_id`) VALUES ('".$subtopics."','".$topics_id."')";
					$resultb1=mysql_query($querysubt) or die("Query Failed 6: ".mysql_error());
				}
			}

			echo "<script type='text/javascript'>alert('Saved!');</script>";
		}else{
    		$resultweek2= mysql_query($sqlweek);
			while($row=mysql_fetch_array($resultweek2)){
				$topics_id=$row['topics_id'];

			}
			$del = "DELETE FROM subtopic WHERE topics_id='".$topics_id."'";
			$result2=mysql_query($del) or die("Query Failed 7: ".mysql_error());
			$query = "UPDATE topics SET topic_description='".$maintopics."',week='".$week."',tla='".$tla."',resources='".$resource."',oba='".$oba."' WHERE topics_id='".$topics_id."'";
			$result=mysql_query($query) or die("Query Failed 8: ".mysql_error());

			if (isset($_POST['subtopics'])) {
				foreach($_POST['subtopics'] as $row => $value){
					$subtopics=$_POST['subtopics'][$row];
					$querysubt = "INSERT INTO `subtopic` (`subtopic_description`,`topics_id`) VALUES ('".$subtopics."','".$topics_id."')";
					$resultb1=mysql_query($querysubt) or die("Query Failed 6: ".mysql_error());
				}
			}
			echo "<script type='text/javascript'>alert('Updated!');</script>";
		}
		$sqltopica = "DELETE FROM topic_ilo WHERE topics_id='".$topics_id."'";
		$resulttopics2= mysql_query($sqltopica);

		$querysubt = "INSERT INTO `topic_ilo` (`CLO_id`,`topics_id`) VALUES ('".$ILO_ID."','".$topics_id."')";
		$resultb1=mysql_query($querysubt) or die("Query Failed 6: ".mysql_error());


TQ:

$(document).on('click', '.enuaddnum', function(){  
           enu_num++;  
           $('#enumeration_field').append('<tr id="enunum'+enu_num+'"><td><div class="col-xs-12 idendel"><a href="#" class="pull-right"><i class="glyphicon glyphicon-remove enudelnum" id="'+enu_num+'"><span class="enudelnumtext">Delete Number</span></i></a></div><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">'+enu_num+'.</span><input type="text" name="enuquestion'+enu_num+'" class="form-control" placeholder="Question" id="enuquestion'+enu_num+'" aria-describedby="basic-addon1"><span class="input-group-btn"><button class="btn btn-default enunumimport'+enu_num+'" id="enunumimport'+enu_num+'" name="enunumimport'+enu_num+'" type="button"><i class="fa fa-paperclip"></i></button></span></div></div></div><br><div class="row"><div class="col-xs-4"><label for="topic">Topic</label><input type="text" name="enutopic'+enu_num+'" class="form-control" id="enutopic'+enu_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="enucognitive'+enu_num+'">Cognitive Domain</label><select class="form-control" id="enucognitive'+enu_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="enupoints'+enu_num+'" class="form-control" id="enupoints'+enu_num+'" placeholder="Enter Points"></div></div><br><table class="table table-bordered" id="enumeration_answer_field'+enu_num+'"><tr><td><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Answer 1</span><input type="text" name="enuanswer'+enu_num+'" class="form-control" placeholder="Enter  Answer" id="enuanswer'+enu_num+'" aria-describedby="basic-addon1"><span class="input-group-addon" id="basic-addon1"><a href="#"><i id="'+enu_num+'" class="glyphicon glyphicon-plus enuaddans"><span class="enuaddanstext">Add</span></i></a></span></div></div></div></td></tr></table><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="enuremarks'+enu_num+'" class="form-control" placeholder="" disabled="disable" id="enuremarks'+enu_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr>');  
      });

  $(document).on('click', '.enuaddans', function(){  
           var button_id = $(this).attr("id");
           enu_ans++;  
           $('#enumeration_answer_field'+button_id+'').append('<tr id="enuansnum'+enu_ans+'"><td><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Answer '+enu_ans+'</span><input type="text" name="enuanswer'+enu_num+'" class="form-control" placeholder="Enter  Answer" id="enuanswer'+enu_num+'" aria-describedby="basic-addon1"><span class="input-group-addon" id="basic-addon1"><a href="#"><i id="'+enu_ans+'" class="glyphicon glyphicon-minus enudelans"><span class="enudelanstext">Remove</span></i></a></span></div></div></div></td></tr>');  
      });
  $(document).on('click', '.enudelans', function(){  
    var button_id = $(this).attr("id");   
    $('#enuansnum'+button_id+'').remove(); 
    enu_ans--; 
  });  

  $(document).on('click', '.enudelnum', function(){  
    if (enu_num>0){
      var button_id = $(this).attr("id");   
      $('#enunum'+button_id+'').remove(); 
    enu_num--; 
    } 
    else{
    } 
  });  

  
