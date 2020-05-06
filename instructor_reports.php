<?php
include 'header.php'; 
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php 
include 'headernotification.php';
?>
<aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div style="hieght:50px;">
          <p><a><h4><?php echo $fullname_session; ?></h4></a></p>
          <i class="fa fa-circle text-success"></i><a href="logout.php"> logout</a>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="header"><b>MAIN NAVIGATION</b></li>
        <li class="" id="dashboard_tab">
          <a href="instructor_index.php">
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
          </a>
        </li>
        <li id="syllabus_tab">
          <a href="syllabus_index.php">
            <i class="glyphicon glyphicon-pencil"></i><span>Syllabus</span>
          </a>
        </li>
        <li id="tq_tab">
          <a href="tq_index.php">
            <i class="glyphicon glyphicon-list-alt"></i> <span>Test Questionnaire</span>
          </a>
        </li>
        <li id="notification_tab">
          <a href="instructor_notifications.php">
            <i class="fa fa-bell-o"></i> 
            <span class="pull-right-container">
              <small class="label label-primary" id="count5"></small>
            </span>
            <span>Notifications</span>
          </a>
        </li>
        <li id="reports_tab" class="active">
          <a href="instructor_reports.php">
            <i class="fa fa-folder"></i> <span>Reports</span></a>
        </li>
        <li>
          <a href="instructor_chat.php"><i class="fa fa-wechat">
            </i> <span>Messenger</span></a>
        </li>
      </ul>
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
                    <a href="#sylapp" data-toggle="tab"><button type="button" class="btn bg-green color-palette btn-xs" style="width:114px;">Approved Syllabus</button></a>
                    <a href="#sylpen" data-toggle="tab"><button type="button" class="btn btn-warning btn-xs" style="width:114px;">Pending Syllabus</button></a>
                    <a href="#sylrej" data-toggle="tab"><button type="button" class="btn btn-danger btn-xs" style="width:114px;">Rejected Syllabus</button></a>
                    <a href="#atq" data-toggle="tab"><button type="button" class="btn bg-green color-palette btn-xs" style="width:114px;">Approved TQ/TOS</button></a>
                    <a href="#rtq" data-toggle="tab"><button type="button" class="btn btn-danger btn-xs" style="width:114px;">Revised TQ/TOS</button></a>
                    <a href="#prtq" data-toggle="tab"><button type="button" class="btn btn-primary btn-xs" style="width:114px;">Printed TQ</button></a>
                    <a href="#ptq" data-toggle="tab"><button type="button" class="btn btn-warning btn-xs" style="width:114px;">Pending TQ/TOS</button></a>
                    <a href="#ltq" data-toggle="tab"><button type="button" class="btn bg-orange-active btn-xs" style="width:114px;">Late TQ/TOS</button></a>
                  </div>
              </ul>
              <div class="tab-content">
              <div class="tab-pane" id="sylapp"  style="overflow-y:scroll; overflow-x:hidden; height:470px;">
								<div class="col-md-12">
									<div class="table-responsive mailbox-messages">
										<div class="box-header with-border">
											<h3 class="box-title">Approved Syllabus</h3>
										</div>
										<?php
										$datab = mysqli_connect("localhost", "root", "", "testbank");
										if($datab === false){
											die("ERROR: Could not connect. " . mysqli_connect_error());
										}
                    $hate = $_SESSION['login_user'];
											$sql = "SELECT employment.employment_status, employment.employment_job_title, employment.employee_id, employment.department_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, department.department_name, department.department_status, semester.semester, school_year.sy, syllabusstatus.syll_status_desc, syllabusstatus.syll_date_time, syllabusstatus.syll_status, syllabusstatus.syll_rev_count, `subject`.subj_code, `subject`.subj_name, user_access.username FROM employment INNER JOIN employees ON employment.employee_id = employees.employee_id 
                      INNER JOIN department ON employment.department_id = department.department_id
                      INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id
                      INNER JOIN semester ON sched_subj.sem_id = semester.sem_id
                      INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id
                      INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id
                      INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id
                      INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id
                      INNER JOIN user_access ON user_access.employment_id = employment.employment_id
											WHERE username = '$hate' AND syll_status_desc = 'approved'
											ORDER BY syllabusstatus.syll_date_time DESC";
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
															echo "<td>" . $row['syll_rev_count'] . "</td>";
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
                  <div class="tab-pane" id="sylpen"  style="overflow-y:scroll; overflow-x:hidden; height:470px;">
								<div class="col-md-12">
									<div class="table-responsive mailbox-messages">
										<div class="box-header with-border">
											<h3 class="box-title">Pending Syllabus</h3>
										</div>
										<?php
										$datab = mysqli_connect("localhost", "root", "", "testbank");
										if($datab === false){
											die("ERROR: Could not connect. " . mysqli_connect_error());
										}
                    $hate = $_SESSION['login_user'];
											$sql = "SELECT employment.employment_status, employment.employment_job_title, employment.employee_id, employment.department_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, department.department_name, department.department_status, semester.semester, school_year.sy, syllabusstatus.syll_status_desc, syllabusstatus.syll_date_time, syllabusstatus.syll_status, syllabusstatus.syll_rev_count, `subject`.subj_code, `subject`.subj_name, user_access.username FROM employment INNER JOIN employees ON employment.employee_id = employees.employee_id 
                      INNER JOIN department ON employment.department_id = department.department_id
                      INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id
                      INNER JOIN semester ON sched_subj.sem_id = semester.sem_id
                      INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id
                      INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id
                      INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id
                      INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id
                      INNER JOIN user_access ON user_access.employment_id = employment.employment_id
											WHERE username = '$hate' AND syll_status_desc = 'pending' AND syll_rev_count = 0
											ORDER BY syllabusstatus.syll_date_time DESC";
											if($result = mysqli_query($datab, $sql)){
												if(mysqli_num_rows($result) > 0){
													echo "<table class='table table-hover table-striped'>";
													echo "<tr>";
													echo "<th>Subject Code</th>";
													echo "<th>Subject Name</th>";
													echo "<th>Instructor</th>";
													echo "<th>Revise Count</th>";
													echo "<th>Semester</th>";
													echo "</tr>";
														while($row = mysqli_fetch_array($result)){
															echo "<tr>";
															echo "<td>" . $row['subj_code'] . "</td>";
															echo "<td>" . $row['subj_name'] . "</td>";
															echo "<td>" . $row['employee_fname']." ".$row['employee_mname']." ".$row['employee_lname']." ".$row['employee_ext'] . "</td>";
															echo "<td>" . $row['syll_rev_count'] . "</td>";
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
                  <div class="tab-pane" id="sylrej"  style="overflow-y:scroll; overflow-x:hidden; height:470px;">
								<div class="col-md-12">
									<div class="table-responsive mailbox-messages">
										<div class="box-header with-border">
											<h3 class="box-title">Rejected Syllabus</h3>
										</div>
										<?php
										$datab = mysqli_connect("localhost", "root", "", "testbank");
										if($datab === false){
											die("ERROR: Could not connect. " . mysqli_connect_error());
										}
                    $hate = $_SESSION['login_user'];
											$sql = "SELECT employment.employment_status, employment.employment_job_title, employment.employee_id, employment.department_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, department.department_name, department.department_status, semester.semester, school_year.sy, syllabusstatus.syll_status_desc, syllabusstatus.syll_date_time, syllabusstatus.syll_status, syllabusstatus.syll_rev_count, `subject`.subj_code, `subject`.subj_name, user_access.username FROM employment INNER JOIN employees ON employment.employee_id = employees.employee_id 
                      INNER JOIN department ON employment.department_id = department.department_id
                      INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id
                      INNER JOIN semester ON sched_subj.sem_id = semester.sem_id
                      INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id
                      INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id
                      INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id
                      INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id
                      INNER JOIN user_access ON user_access.employment_id = employment.employment_id
											WHERE username = '$hate' AND syll_status_desc = 'pending' AND syll_rev_count > 0
											ORDER BY syllabusstatus.syll_date_time DESC";
											if($result = mysqli_query($datab, $sql)){
												if(mysqli_num_rows($result) > 0){
													echo "<table class='table table-hover table-striped'>";
													echo "<tr>";
													echo "<th>Subject Code</th>";
													echo "<th>Subject Name</th>";
													echo "<th>Instructor</th>";
													echo "<th>Revise Count</th>";
													echo "<th>Semester</th>";
													echo "</tr>";
														while($row = mysqli_fetch_array($result)){
															echo "<tr>";
															echo "<td>" . $row['subj_code'] . "</td>";
															echo "<td>" . $row['subj_name'] . "</td>";
															echo "<td>" . $row['employee_fname']." ".$row['employee_mname']." ".$row['employee_lname']." ".$row['employee_ext'] . "</td>";
															echo "<td>" . $row['syll_rev_count'] . "</td>";
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
                      $hate = $_SESSION['login_user'];
                      $sql = "SELECT * FROM sched_subj
                      INNER JOIN semester ON sched_subj.sem_id = semester.sem_id
                      INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id
                      INNER JOIN employment ON sched_subj.employment_id = employment.employment_id
                      INNER JOIN employees ON employment.employee_id = employees.employee_id
                      INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id
                      INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id
                      INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id
                      INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id
                      INNER JOIN user_access ON user_access.employment_id = employment.employment_id
                      WHERE username = '$hate' AND status_desc = 'for printing' OR status_desc = 'printed'
                      ORDER BY tqstatus.date_time DESC";
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
                          } else{
                          echo "No records match your query were found.";
                        }
                      } else{
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
                        <h3 class="box-title">Revised TQ/TOS</h3>
                      </div>
                      <?php
                      $datab = mysqli_connect("localhost", "root", "", "testbank");
                      if($datab === false){
                        die("ERROR: Could not connect. " . mysqli_connect_error());
                        }
                        $sql = "SELECT * FROM sched_subj
                      INNER JOIN semester ON sched_subj.sem_id = semester.sem_id
                      INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id
                      INNER JOIN employment ON sched_subj.employment_id = employment.employment_id
                      INNER JOIN employees ON employment.employee_id = employees.employee_id
                      INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id
                      INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id
                      INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id
                      INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id
                      INNER JOIN user_access ON user_access.employment_id = employment.employment_id
                      WHERE username = '$hate' AND revise_count > 0 AND (status_desc = 'pending')
                      ORDER BY tqstatus.date_time DESC";
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
                          } else{
                            echo "No records match your query were found.";
                          }
                        } else{
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
                      $sql = "SELECT * FROM sched_subj
                      INNER JOIN semester ON sched_subj.sem_id = semester.sem_id
                      INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id
                      INNER JOIN employment ON sched_subj.employment_id = employment.employment_id
                      INNER JOIN employees ON employment.employee_id = employees.employee_id
                      INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id
                      INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id
                      INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id
                      INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id
                      INNER JOIN user_access ON user_access.employment_id = employment.employment_id
                      WHERE username = '$hate' AND status_desc = 'printed'
                      ORDER BY tqstatus.date_time DESC";
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
                      $sql = "SELECT * FROM sched_subj
                      INNER JOIN semester ON sched_subj.sem_id = semester.sem_id
                      INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id
                      INNER JOIN employment ON sched_subj.employment_id = employment.employment_id
                      INNER JOIN employees ON employment.employee_id = employees.employee_id
                      INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id
                      INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id
                      INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id
                      INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id
                      INNER JOIN user_access ON user_access.employment_id = employment.employment_id
                      WHERE username = '$hate' AND revise_count = 0 AND late = 'no' AND (status_desc = 'pending')
                      ORDER BY tqstatus.date_time DESC";
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
                      $sql = "SELECT * FROM sched_subj
                      INNER JOIN semester ON sched_subj.sem_id = semester.sem_id
                      INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id
                      INNER JOIN employment ON sched_subj.employment_id = employment.employment_id
                      INNER JOIN employees ON employment.employee_id = employees.employee_id
                      INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id
                      INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id
                      INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id
                      INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id
                      INNER JOIN user_access ON user_access.employment_id = employment.employment_id
                      WHERE username = '$hate' AND late = 'yes' AND (status_desc = 'pending') 
                      ORDER BY tqstatus.date_time DESC";
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
                        } else{
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
