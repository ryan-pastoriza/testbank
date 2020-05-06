<?php
include('header.php');
include 'class.php';
$class = new testbank(); 
$year=date("Y");
$month=date("F");
$yr1=$year-1;
$yr2=$year+1;

if ($month=="May" or $month=="June" or $month=="July" or $month=="August" or $month=="September" or $month=="October") {
	$semester= "1st";   
}else if ($month=="November" or $month=="December" or $month=="January" or $month=="February" or $month=="March" or $month=="April") {
	$semester= "2nd";
}
if ($semester=="1st") {
	$sy=$year."-".$yr2;
}else if ($semester=="2nd"){
	if ($month=="November" or $month=="December"){
		$sy=$year."-".$yr2;
	}else if ($month=="January" or $month=="February" or $month=="March" or $month=="April"){

		$sy=$yr1."-".$year;
	}
}
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php 
include('headernotification.php');
?>
<aside class="main-sidebar">
		<section class="sidebar">
			<div class="user-panel">
				<div style="hieght:50px;">
          <p><a><h4><?php echo $fullname_session; ?></h4></a></p>
          <i class="fa fa-circle text-success"></i><a href="logout.php"> logout</a>
        </div>
			</div>
			<?php include 'sidebar.php'; ?>
		</section>
	</aside>
	<div class="content-wrapper">
		<section class="content">
      <div class="row">
        <section class="col-lg-12">
          <div class="box ">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                  <div class="col-xs-12">
                    <a href="#atq" data-toggle="tab"><button type="button" class="btn bg-green color-palette btn-xs" style="width:114px;">Approved TQ/TOS</button></a>
                    <a href="#rtq" data-toggle="tab"><button type="button" class="btn btn-danger btn-xs" style="width:114px;">Revised TQ/TOS</button></a>
                    <a href="#prtq" data-toggle="tab"><button type="button" class="btn btn-primary btn-xs" style="width:114px;">Printed TQ</button></a>
                    <a href="#ptq" data-toggle="tab"><button type="button" class="btn btn-warning btn-xs" style="width:114px;">Pending TQ/TOS</button></a>
                    <a href="#ltq" data-toggle="tab"><button type="button" class="btn bg-orange-active btn-xs" style="width:114px;">Late TQ/TOS</button></a>
                  </div>
              </ul>
              <div class="tab-content">
                <div class="active tab-pane " id="atq"  style="overflow-y:scroll; overflow-x:hidden; height:470px;">
									<div class="col-md-12">
										<div class="table-responsive mailbox-messages">
											<div class="box-header with-border">
												<h3 class="box-title">Approved TQ and TOS</h3>
											</div>
											<?php
											$datab = mysqli_connect("localhost", "root", "", "testbank");
											if($datab === false){
												die("ERROR: Could not connect. " . mysqli_connect_error());
											}
											if ($depart == "ITE") {
												$sql = "SELECT * FROM employment INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN user_access ON user_access.employment_id = employment.employment_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE (tqstatus.status_desc = 'for printing' OR tqstatus.status_desc = 'printed') AND  (department.department_name = 'ITE') AND school_year.sy = '".$sy."' AND semester.semester = '".$semester."' ORDER BY tqstatus.date_time DESC ";
						                    }else if($depart == "SHS"){
						                    	$sql = "SELECT * FROM employment INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN user_access ON user_access.employment_id = employment.employment_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE (tqstatus.status_desc = 'for printing' or tqstatus.status_desc = 'printed') AND (department.department_name = 'GEN') AND school_year.sy = '".$sy."' AND semester.semester = '".$semester."' ORDER BY tqstatus.date_time DESC";
											}elseif($depart == "BA"){
												$sql = "SELECT * FROM employment INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN user_access ON user_access.employment_id = employment.employment_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE (tqstatus.status_desc = 'for printing' or tqstatus.status_desc = 'printed') AND (department.department_name = 'BA') AND school_year.sy = '".$sy."' AND semester.semester = '".$semester."' ORDER BY tqstatus.date_time DESC";
											}
											if($result = mysqli_query($datab, $sql)){
												if(mysqli_num_rows($result) > 0){
													echo "<table class='table table-hover table-striped'>";
													echo "<tr>";
													echo "<th>Subject Code</th>";
													echo "<th>Subject Name</th>";
													echo "<th>Instructor</th>";
													echo "<th>Revise Count</th>";
													echo "<th>Term</th>";
													echo "<th>Semester</th>";
													echo "<th>Status</th>";
													echo "</tr>";
													while($row = mysqli_fetch_array($result)){
													echo "<tr>";
													echo "<td>" . $row['subj_code'] . "</td>";
													echo "<td>" . $row['subj_name'] . "</td>";
													echo "<td>" . $row['employee_fname']." ".$row['employee_mname']." ".$row['employee_lname']. " " .$row['employee_ext'] . "</td>";
													echo "<td>" . $row['revise_count'] . "</td>";
													echo "<td>" . $row['exam_period'] . "</td>";
													echo "<td>" . $row['semester'] . "</td>";
													echo "<td>" . $row['status_desc'] . "</td>";
													echo "</tr>";
													}
													echo "</table>";
													mysqli_free_result($result);
												}else{
													echo "No records match your query were found.";
												}
											}else{
												echo "ERROR: Could not able to execute $sql. " . mysqli_error($datab);
											}
											mysqli_close($datab);
											?>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="rtq"  style="overflow-y:scroll; overflow-x:hidden; height:470px;">
									<div class="col-md-12">
										<div class="table-responsive mailbox-messages">
											<div class="box-header with-border">
												<h3 class="box-title">Revised TQ and TOS</h3>
											</div>
											<?php
											$datab = mysqli_connect("localhost", "root", "", "testbank");
											if($datab === false){
												die("ERROR: Could not connect. " . mysqli_connect_error());
											}
											if ($depart == "ITE") {
											$sql = "SELECT * FROM employment INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN user_access ON user_access.employment_id = employment.employment_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE revise_count > 0 AND (status_desc = 'pending') AND (department.department_name = 'ITE') AND school_year.sy = '".$sy."' AND semester.semester = '".$semester."' ORDER BY tqstatus.date_time DESC";  
											}elseif($depart == "SHS"){
											$sql = "SELECT * FROM employment INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN user_access ON user_access.employment_id = employment.employment_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE revise_count > 0 AND (status_desc = 'pending') AND (department.department_name = 'GEN') AND school_year.sy = '".$sy."' AND semester.semester = '".$semester."' ORDER BY tqstatus.date_time DESC";
											}elseif($depart == "BA"){
											$sql = "SELECT * FROM employment INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN user_access ON user_access.employment_id = employment.employment_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE revise_count > 0 AND (status_desc = 'pending') AND (department.department_name = 'BA') AND school_year.sy = '".$sy."' AND semester.semester = '".$semester."' ORDER BY tqstatus.date_time DESC";
											}
											if($result = mysqli_query($datab, $sql)){
											if(mysqli_num_rows($result) > 0){
											echo "<table class='table table-hover table-striped'>";
											echo "<tr>";
											echo "<th>Subject Code</th>";
											echo "<th>Subject Name</th>";
											echo "<th>Instructor</th>";
											echo "<th>Revise Count</th>";
											echo "<th>Term</th>";
											echo "<th>Semester</th>";
											echo "</tr>";
											while($row = mysqli_fetch_array($result)){
												echo "<tr>";
												echo "<td>" . $row['subj_code'] . "</td>";
												echo "<td>" . $row['subj_name'] . "</td>";
												echo "<td>" . $row['employee_fname']." ".$row['employee_mname']." ".$row['employee_lname']." ".$row['employee_ext'] . "</td>";
												echo "<td>" . $row['revise_count'] . "</td>";
												echo "<td>" . $row['exam_period'] . "</td>";
												echo "<td>" . $row['semester'] . "</td>";
												echo "</tr>";
											}
											echo "</table>";
											mysqli_free_result($result);
										}else{
											echo "No records match your query were found.";
										}
									}else{
										echo "ERROR: Could not able to execute $sql. " . mysqli_error($datab);
									}
									mysqli_close($datab);
									?>
								</div>
							</div>
						</div>
							<div class="tab-pane" id="prtq"  style="overflow-y:scroll; overflow-x:hidden; height:470px;">
								<div class="col-md-12">
									<div class="table-responsive mailbox-messages">
										<div class="box-header with-border">
											<h3 class="box-title">Printed TQ</h3>
										</div>
										<?php
										$datab = mysqli_connect("localhost", "root", "", "testbank");
										if($datab === false){
											die("ERROR: Could not connect. " . mysqli_connect_error());
										}
										if ($depart == "ITE") {
											$sql = "SELECT * FROM employment INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN user_access ON user_access.employment_id = employment.employment_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE status_desc = 'printed' AND (department.department_name = 'ITE') AND school_year.sy = '".$sy."' AND semester.semester = '".$semester."' ORDER BY tqstatus.date_time DESC";
											}elseif($depart == "SHS"){
												$sql = "SELECT * FROM employment INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN user_access ON user_access.employment_id = employment.employment_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE status_desc = 'printed' AND (department.department_name = 'GEN') AND school_year.sy = '".$sy."' AND semester.semester = '".$semester."' ORDER BY tqstatus.date_time DESC";
											}elseif($depart == "BA"){
												$sql = "SELECT * FROM employment INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN user_access ON user_access.employment_id = employment.employment_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE status_desc = 'printed' AND (department.department_name = 'BA') AND school_year.sy = '".$sy."' AND semester.semester = '".$semester."' ORDER BY tqstatus.date_time DESC";
											}
											if($result = mysqli_query($datab, $sql)){
												if(mysqli_num_rows($result) > 0){
													echo "<table class='table table-hover table-striped'>";
													echo "<tr>";
													echo "<th>Subject Code</th>";
													echo "<th>Subject Name</th>";
													echo "<th>Instructor</th>";
													echo "<th>Revise Count</th>";
													echo "<th>Term</th>";
													echo "<th>Semester</th>";
													echo "</tr>";
														while($row = mysqli_fetch_array($result)){
															echo "<tr>";
															echo "<td>" . $row['subj_code'] . "</td>";
															echo "<td>" . $row['subj_name'] . "</td>";
															echo "<td>" . $row['employee_fname']." ".$row['employee_mname']." ".$row['employee_lname']." ".$row['employee_ext'] . "</td>";
															echo "<td>" . $row['revise_count'] . "</td>";
															echo "<td>" . $row['exam_period'] . "</td>";
															echo "<td>" . $row['semester'] . "</td>";
															echo "</tr>";
														}
														echo "</table>";
														mysqli_free_result($result);
													}else{
														echo "No records match your query were found.";
													}
												}else{
													echo "ERROR: Could not able to execute $sql. " . mysqli_error($datab);
												}
												mysqli_close($datab);
												?>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="ptq"  style="overflow-y:scroll; overflow-x:hidden; height:470px;">
										<div class="col-md-12">
											<div class="table-responsive mailbox-messages">
												<div class="box-header with-border">
													<h3 class="box-title">Pending TQ and TOS</h3>
												</div>
												<?php
												$datab = mysqli_connect("localhost", "root", "", "testbank");
												if($datab === false){
													die("ERROR: Could not connect. " . mysqli_connect_error());
												}
												if ($depart == "ITE") {
													$sql = "SELECT * FROM employment INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN user_access ON user_access.employment_id = employment.employment_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE (status_desc = 'pending' or status_desc = 'queue for ph' or status_desc = 'queue for dean') AND (department.department_name = 'ITE') AND school_year.sy = '".$sy."' AND semester.semester = '".$semester."' ORDER BY tqstatus.date_time DESC";
													}elseif($depart == "SHS"){
														$sql = "SELECT * FROM employment INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN user_access ON user_access.employment_id = employment.employment_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE (status_desc = 'pending' or status_desc = 'queue for ph' or status_desc = 'queue for dean') AND (department.department_name = 'GEN') AND school_year.sy = '".$sy."' AND semester.semester = '".$semester."' ORDER BY tqstatus.date_time DESC";
													}elseif($depart == "BA"){
														$sql = "SELECT * FROM employment INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN user_access ON user_access.employment_id = employment.employment_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE (status_desc = 'pending' or status_desc = 'queue for ph' or status_desc = 'queue for dean') AND (department.department_name = 'BA') AND school_year.sy = '".$sy."' AND semester.semester = '".$semester."' ORDER BY tqstatus.date_time DESC";
													}
													if($result = mysqli_query($datab, $sql)){
														if(mysqli_num_rows($result) > 0){
															echo "<table class='table table-hover table-striped'>";
															echo "<tr>";
															echo "<th>Subject Code</th>";
															echo "<th>Subject Name</th>";
															echo "<th>Instructor</th>";
															echo "<th>Revise Count</th>";
															echo "<th>Term</th>";
															echo "<th>Semester</th>";
															echo "<th>status</th>";
															echo "</tr>";
															while($row = mysqli_fetch_array($result)){
																echo "<tr>";
																echo "<td>" . $row['subj_code'] . "</td>";
																echo "<td>" . $row['subj_name'] . "</td>";
																echo "<td>" . $row['employee_fname']." ".$row['employee_mname']." ".$row['employee_lname']." ".$row['employee_ext'] . "</td>";
																echo "<td>" . $row['revise_count'] . "</td>";
																echo "<td>" . $row['exam_period'] . "</td>";
																echo "<td>" . $row['semester'] . "</td>"; 
																echo "<td>" . $row['status_desc'] . "</td>"; 
																echo "</tr>";
															}
															echo "</table>";
															mysqli_free_result($result);
														}else{
															echo "No records match your query were found.";
														}
													}else{
														echo "ERROR: Could not able to execute $sql. " . mysqli_error($datab);
													}
													mysqli_close($datab);
													?>
												</div>
											</div>
										</div>
										<div class="tab-pane" id="ltq"  style="overflow-y:scroll; overflow-x:hidden; height:470px;">
										<div class="col-md-12">
											<div class="table-responsive mailbox-messages">
												<div class="box-header with-border">
													<h3 class="box-title">Late TQ and TOS</h3>
												</div>
												<?php
												$datab = mysqli_connect("localhost", "root", "", "testbank");
												if($datab === false){
													die("ERROR: Could not connect. " . mysqli_connect_error());
												}
												if ($depart == "ITE") {
													$sql = "SELECT * FROM employment INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN user_access ON user_access.employment_id = employment.employment_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE late = 'yes' AND (department.department_name = 'ITE') AND school_year.sy = '".$sy."' AND semester.semester = '".$semester."' ORDER BY tqstatus.date_time DESC";
												}elseif($depart == "SHS"){
													$sql = "SELECT * FROM employment INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN user_access ON user_access.employment_id = employment.employment_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE late = 'yes' AND (department.department_name = 'GEN') AND school_year.sy = '".$sy."' AND semester.semester = '".$semester."' ORDER BY tqstatus.date_time DESC";
												}elseif($depart == "BA"){
													$sql = "SELECT * FROM employment INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN user_access ON user_access.employment_id = employment.employment_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE late = 'yes' AND (department.department_name = 'BA') AND school_year.sy = '".$sy."' AND semester.semester = '".$semester."' ORDER BY tqstatus.date_time DESC";
												}
												if($result = mysqli_query($datab, $sql)){
													if(mysqli_num_rows($result) > 0){
														echo "<table class='table table-hover table-striped'>";
														echo "<tr>";
														echo "<th>Subject Code</th>";
														echo "<th>Subject Name</th>";
														echo "<th>Instructor</th>";
														echo "<th>Revise Count</th>";
														echo "<th>Term</th>";
														echo "<th>Semester</th>";
														echo "<th>Status</th>";
														echo "</tr>";
														while($row = mysqli_fetch_array($result)){
															echo "<tr>";
															echo "<td>" . $row['subj_code'] . "</td>";
															echo "<td>" . $row['subj_name'] . "</td>";
															echo "<td>" . $row['employee_fname']." ".$row['employee_mname']." ".$row['employee_lname']." ".$row['employee_ext'] . "</td>";
															echo "<td>" . $row['revise_count'] . "</td>";
															echo "<td>" . $row['exam_period'] . "</td>";
															echo "<td>" . $row['semester'] . "</td>"; 
															echo "<td>" . $row['status_desc'] . "</td>"; 
															echo "</tr>";
														}
														echo "</table>";
														mysqli_free_result($result);
													}else{
														echo "No records match your query were found.";
													}
												}else{
													echo "ERROR: Could not able to execute $sql. " . mysqli_error($datab);
												}
												mysqli_close($datab);
												?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</section>
		</div>
<?php
include('footer.php'); 
?>
</body>
</html>
