<?php
include('header.php'); 
include 'class.php';
$class = new testbank();
if ( !empty ( $_GET ) ) {
  $ss_id=$_GET['ss_id1'];
  $subj_id=$_GET['subj_id'];
  $emp_id=$_GET['emp_id'];
  $class->loaddb();
  $sql = "SELECT sched_subj.ss_id, `subject`.subj_id, `subject`.subj_code, `subject`.subj_name, `subject`.subj_desc, syllabus.syllabus_id, syllabus.course_info_id FROM sched_subj INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id WHERE sched_subj.employment_id = $emp_id AND `subject`.subj_id = $subj_id AND sched_subj.ss_id = $ss_id  ";
  $result = mysql_query($sql);
    if(!$result){
      echo 'Database Error!';
    }else{
      while($row=mysql_fetch_array($result)){
        $ss_id=$row['ss_id'];
        $subj_id1=$row['subj_id'];
        $subj_code1=$row['subj_code'];
        $subj_name1=$row['subj_name'];
        $subj_desc1=$row['subj_desc'];
        $syllabus_id=$row['syllabus_id'];
        $course_info_id=$row['course_info_id'];
        $sqlsub = "SELECT * FROM subject_info INNER JOIN syllabus ON syllabus.course_info_id = subject_info.subject_info_id WHERE syllabus.syllabus_id = $syllabus_id";
        $resultsub1 = mysql_query($sqlsub);
          while($row=mysql_fetch_array($resultsub1)){
            $pre_req=$row['pre_requisites'];
          }
      }
        
        $sqla1 = "SELECT * FROM policies WHERE syllabus_id = $syllabus_id ";
        $resulta1 = mysql_query($sqla1);
        if(mysql_num_rows($resulta1)==0){
          $querya1 = "INSERT INTO `policies` (`syllabus_id`) VALUES ('".$syllabus_id."')";
          $resultwa1=mysql_query($querya1) or die("Query Failed policies: ".mysql_error());     
        }else{
          while($row=mysql_fetch_array($resulta1)){
            $policy_id=$row['policy_id'];
            $lt=$row['late_tardiness'];
            $absence=$row['absence'];
            $mq=$row['miss_quiz'];
            $permits=$row['permits'];
            $cheating=$row['cheating'];
            $cm=$row['class_misbehavior'];
          }
        }

        $sqla2 = "SELECT * FROM course_req WHERE syllabus_id = $syllabus_id ";
        $resulta2 = mysql_query($sqla2);
        if(mysql_num_rows($resulta2)==0){
          $querya2 = "INSERT INTO `course_req` (`syllabus_id`) VALUES ('".$syllabus_id."')";
          $resultwa2=mysql_query($querya2) or die("Query Failed course_req: ".mysql_error());     
        }else{
          while($row=mysql_fetch_array($resulta2)){
            $cr_output=$row['cr_output'];
            $cr_desc=$row['cr_desc'];
          }
        }

        $sqla3 = "SELECT * FROM reference WHERE syllabus_id = $syllabus_id ";
        $resulta3 = mysql_query($sqla3);
        if(mysql_num_rows($resulta3)==0){
          $querya3 = "INSERT INTO `reference` (`syllabus_id`) VALUES ('".$syllabus_id."')";
          $resultwa3=mysql_query($querya3) or die("Query Failed reference: ".mysql_error());     
        }else{
          while($row=mysql_fetch_array($resulta3)){
            $ref=$row['ref_desc'];
          }
        }
             
    }        
    $class->sqlclose();   
}
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php
  include('headernotification.php');
  ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div style="hieght:50px;">
          <p><a><h4><?php echo $fullname_session; ?></h4></a></p>
          <i class="fa fa-circle text-success"></i><a href="logout.php"> logout</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"><b>MAIN NAVIGATION</b></li>
        <li id="dashboard_tab">
          <?php 
          if ($position_session=="Instructor") {
            echo '<a href="instructor_index.php">';
          }else if ($position_session=="Program Head") {
            echo '<a href="ph_index.php">';
          }else if ($position_session=="Dean") {
            echo '<a href="dean_index.php">';
          }
          ?>
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
          </a>
        </li>
        <li class="active" id="syllabus_tab">
          <a href="syllabus_index.php">
            <i class="glyphicon glyphicon-pencil"></i><span>Syllabus</span>
          </a>
        </li>
        <li id="tq_tab">
          <a href="tq_index.php">
            <i class="glyphicon glyphicon-list-alt"></i> <span>Test Questionnaire</span>
          </a>
        </li>
        <?php 
          if ($position_session=="Instructor") {
            
          }else if ($position_session=="Program Head") {
            echo ' <li id="queue_tab"><a href="ph_queue.php" id="notificationLink" onclick="getNotification10()"><i class="fa fa-book"></i> 
            <span class="pull-right-container">
              <small class="label label-primary" id="count16_2"></small>
            </span>
            <span>Queue</span>
          </a>
        </li>';
          }else if ($position_session=="Dean") {
            echo '<li id="queue_tab"><a href="dean_queue.php" id="notificationLink" onclick="getNotification10()"><i class="fa fa-book"></i> 
            <span class="pull-right-container">
              <small class="label label-primary" id="count16_2"></small>
            </span>
            <span>Queue</span>
          </a>
        </li>';
          }
          ?>
        <li id="notification_tab">
          <?php 
          if ($position_session=="Instructor") {
            echo '<a href="instructor_notifications.php">';
          }else if ($position_session=="Program Head") {
            echo '<a href="ph_notifications.php">';
          }else if ($position_session=="Dean") {
            echo '<a href="dean_notifications.php">';
          }
          ?>
            <i class="fa fa-bell-o"></i> 
            <span class="pull-right-container">
              <small class="label label-primary" id="count5"></small>
            </span>
            <span>Notifications</span>
          </a>
        </li>
        <li id="reports_tab">
          <?php 
          if ($position_session=="Instructor") {
            echo '<a href="instructor_reports.php">';
          }else if ($position_session=="Program Head") {
            echo '<a href="ph_reports.php">';
          }else if ($position_session=="Dean") {
            echo '<a href="dean_reports.php">';
          }
          ?>
            <i class="fa fa-folder"></i> <span>Reports</span>
          </a>
        </li>
        <?php
        if ($position_session=="Dean") {
            echo '<li id="setdate_tab">
          <a href="dean_setdeadline.php">
          <i class="glyphicon glyphicon-calendar">
            </i> <span>Set Date Submission</span></a>
        </li>';
          }
          ?>
        <li>
          <?php 
          if ($position_session=="Instructor") {
            echo '<a href="instructor_chat.php">';
          }else if ($position_session=="Program Head") {
            echo '<a href="ph_chat.php">';
          }else if ($position_session=="Dean") {
            echo '<a href="dean_chat.php">';
          }
          ?>
        <i class="fa fa-wechat">
            </i> <span>Messenger</span></a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row" >
        <!-- Left col -->
        <section class="col-lg-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Syllabus</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-lg-2">
                    <a href="#" role="button" class="btn btn-warning disabled">
                      <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Course Information</a>
                  </div>
                </div>
              <form role="form-sm" method="post">
                <div class="row">
                  <div class="col-lg-4">
                    <label>Course Name</label>
                    <input type="text" class="form-control" name="subj_name1" disabled="disable" value="<?php echo $subj_name1; ?>">
                  </div>
                  <div class="col-lg-4">
                    <label>Course Code</label>
                    <input type="text" class="form-control" name="subj_code1" disabled="disable" value="<?php echo $subj_code1; ?>">
                  </div>
                  <div class="col-lg-4"> 
                    <label>Course Description</label>
                    <input type="text" class="form-control" name="subj_desc1" disabled="disable" value="<?php echo $subj_desc1; ?>">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <br/>
                    <label>Pre-requisites / Co-requisites</label>
                    <input type="text" class="form-control" name="prereq1" placeholder="Enter Pre-requisites / Co-requisites" value="<?php echo $pre_req; ?>">
                  </div>
                </div>
                <div class="row">
                  
                </div>
                <div class="row">
                  <div class="col-lg-3">
                    <br/>
                    <?php 
                    $class->loaddb();
                    $query = "SELECT * FROM program_graduate_outcomes";
                    $result=mysql_query($query) or die("Query Failed : ".mysql_error());
                    $i=0;
                    while($rows=mysql_fetch_array($result)){
                    $roll2[$i]=$rows['graduate_outcome_code'];
                    $i++;
                    }
                    $total_elmt=count($roll2);
                    $class->sqlclose();
                    ?>
                    <label>Program Graduate Outcome (BSIT)</label>
                    <!-- <textarea class="form-control" rows="2" value="Enter PGO"></textarea> -->
                      <select multiple class="form-control input-sm pgo1" id="pgo1" name="pgo1[]" >
                        <?php 
                        for($j=0;$j<$total_elmt;$j++)
                        { 
                        ?><option value="<?php 
                        echo $roll2[$j];
                        ?>"><?php 
                        echo $roll2[$j];
                        ?></option><?php
                        }
                        ?>
                      </select>
                      <br>
                      <button type="submit" class="pull-right btn-xs btn-primary" name="submitpgo"></i>Select PGO</button>
                  </div>
                  <div class="col-lg-3">
                    <br/>
                    <label>Selected Program Graduate Outcome</label>
                    <br/>
                    <?php 
                    if(isset($_POST['submitpgo'])){
                      if(isset($_POST['pgo1'])) {
                        foreach ($_POST['pgo1'] as $key => $value) {
                          $r[]=$_POST['pgo1'][$key];
                        }
                        $m=count($r);
                        if ($m>=2 AND $m<=4) {
                          $class->loaddb();

                          $sql="SELECT syllabusstatus.syll_status_desc FROM syllabus INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id WHERE syllabus.syllabus_id ='".$syllabus_id."'";
                          $result=mysql_query($sql);
                          while($row=mysql_fetch_array($result)){
                            $status_desc=$row['syll_status_desc'];
                          }
                          if ($status_desc=="pending") {
                             $prereq=$_POST['prereq1']; 
                            $query1 = "UPDATE subject_info SET pre_requisites='".$prereq."' WHERE subject_info_id='".$course_info_id."'";
                            $result1=mysql_query($query1) or die("Query Failed subject_info: ".mysql_error());
                            $del = "DELETE FROM syllabus_pgo WHERE syllabus_id='".$syllabus_id."'";
                            $result2=mysql_query($del) or die("Query Failed 7: ".mysql_error());
                            foreach ($_POST['pgo1'] as $select){
                              $sqlpgo = "SELECT * FROM program_graduate_outcomes WHERE graduate_outcome_code = '".$select."'";
                              $resultpgo1 = mysql_query($sqlpgo);
                              if(mysql_num_rows($resultpgo1)==1){
                                while($row1=mysql_fetch_array($resultpgo1)){
                                  $pgo_id=$row1['pgo_id'];
                                  $query = "INSERT INTO `syllabus_pgo` (`pgo_id`,`syllabus_id`) VALUES ('".$pgo_id."','".$syllabus_id."')";
                                  $result=mysql_query($query) or die("Query Failed spgo: ".mysql_error());
                                  
                                }
                              }
                            }
                          }else if ($status_desc=="queue for dean") {
                            echo "<script type='text/javascript'>alert('Cannot edit: Syllabus is being check.');</script>";
                          }else if ($status_desc=="approved") {
                            echo "<script type='text/javascript'>alert('Cannot edit: Syllabus already approved.');</script>";
                          }
                          $class->sqlclose();
                        }else{
                          echo "<script type='text/javascript'>alert('You can only select 2-4 PGO');</script>";
                        }
                        
                      }
                    }
                    $class->loaddb();
                    $sqlpgo="SELECT testbank.program_graduate_outcomes.graduate_outcome_code FROM testbank.program_graduate_outcomes INNER JOIN testbank.syllabus_pgo ON testbank.syllabus_pgo.pgo_id = testbank.program_graduate_outcomes.pgo_id WHERE testbank.syllabus_pgo.syllabus_id = '".$syllabus_id."' AND testbank.syllabus_pgo.pgo_id = testbank.program_graduate_outcomes.pgo_id ";
                    $resultpgo = mysql_query($sqlpgo);
                    if(!$resultpgo){
                      echo 'No PGO Selected';
                    }else{
                      while($row1=mysql_fetch_array($resultpgo)){
                        $goc=$row1['graduate_outcome_code'];
                        echo $goc."<br>";
                      }
                    }
                    $class->sqlclose();

                    ?>
                  </div>
                  <div class="col-lg-3">
                    <br/>
                    <?php 
                    $class->loaddb();
                    $query = "SELECT * FROM ilo";
                    $result=mysql_query($query) or die("Query Failed : ".mysql_error());
                    $i=0;
                    while($rows=mysql_fetch_array($result)){
                    $roll4[$i]=$rows['ILO_code'];
                    $i++;
                    }
                    $total_elmt=count($roll4);
                    $class->sqlclose();
                    ?>
                    <label>Course Learning Outcome</label>
                    <br/>
                      <select multiple class="form-control input-sm select" name="clo[]">
                        <?php 
                        for($j=0;$j<$total_elmt;$j++)
                        { 
                        ?><option value="<?php 
                        echo $roll4[$j];
                        ?>"><?php 
                        echo $roll4[$j];
                        ?></option><?php
                        }
                        ?>
                      </select>
                      <br>
                      <button type="submit" class="pull-right btn-xs btn-primary" name="submitclo"></i> Select CLO </button>
                  </div>
                  <div class="col-lg-3">
                    <br/>
                    <label>Selected Course Learning Outcome</label>
                    <br/>
                    <?php 
                    if(isset($_POST['submitclo'])){
                      if(isset($_POST['clo'])) {
                        foreach ($_POST['clo'] as $key => $value) {
                          $r1[]=$_POST['clo'][$key];
                        }
                        $sqlll="SELECT course_learning_outcomes.CLO_id, course_learning_outcomes.ILO_ID, course_learning_outcomes.syllabus_id FROM syllabus INNER JOIN course_learning_outcomes ON course_learning_outcomes.syllabus_id = syllabus.syllabus_id WHERE syllabus.syllabus_id ='".$syllabus_id."'";
                        $resultll=mysql_query($sqlll);
                        
                          $m1=count($r1);
                          if ($m1>=2 AND $m1<=4) {
                            $class->loaddb();
                            $sql="SELECT syllabusstatus.syll_status_desc FROM syllabus INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id WHERE syllabus.syllabus_id ='".$syllabus_id."'";
                            $result=mysql_query($sql);
                            while($row=mysql_fetch_array($result)){
                              $status_desc=$row['syll_status_desc'];
                            }
                            if ($status_desc=="pending"){
                              $prereq=$_POST['prereq1']; 
                              $query1 = "UPDATE subject_info SET pre_requisites='".$prereq."' WHERE subject_info_id='".$course_info_id."'";
                              $result1=mysql_query($query1) or die("Query Failed subject_info: ".mysql_error());

                              $querysel="SELECT topics.topics_id FROM topics WHERE topics.syllabus_id = '".$syllabus_id."'";
                              $ressel=mysql_query($querysel) or die("Query Failed sel: ".mysql_error());
                                while($rowsa=mysql_fetch_array($ressel)){
                                  $topics_id=$rowsa['topics_id'];
                                  $querydel1="DELETE FROM topic_ilo WHERE topic_ilo.topics_id = '".$topics_id."'";
                                  $resultdel1=mysql_query($querydel1) or die("Query Failed topic_ilo: ".mysql_error());
                                  $querydel2="DELETE FROM subtopic WHERE subtopic.topics_id = '".$topics_id."'";
                                  $resultdel2=mysql_query($querydel2) or die("Query Failed subtopic: ".mysql_error());
                                  $querydel="DELETE FROM topics WHERE topics.syllabus_id = '".$syllabus_id."'";
                                  $resultdel=mysql_query($querydel) or die("Query Failed deltopic: ".mysql_error());
                                  $del = "DELETE FROM course_learning_outcomes WHERE syllabus_id='".$syllabus_id."'";
                                  $result2=mysql_query($del) or die("Query Failed clo1: ".mysql_error());
                                }

                                $querydel="DELETE FROM course_learning_outcomes WHERE  course_learning_outcomes.syllabus_id='".$syllabus_id."'";;
                                $resdel=mysql_query($querydel) or die("Query Failed sel: ".mysql_error());
                                  
                                foreach ($_POST['clo'] as $select){
                                $sqlpgo = "SELECT * FROM ILO WHERE ILO_code = '".$select."'";
                                $resultpgo1 = mysql_query($sqlpgo);
                                if(mysql_num_rows($resultpgo1)==1){
                                  while($row1=mysql_fetch_array($resultpgo1)){
                                    $ILO_id=$row1['ILO_ID'];
                                    $query = "INSERT INTO `course_learning_outcomes` (`ILO_ID`,`syllabus_id`) VALUES ('".$ILO_id."','".$syllabus_id."')";
                                    $result=mysql_query($query) or die("Query Failed ILO: ".mysql_error());
                                    
                                  }
                                }
                              }
                            }else if ($status_desc=="queue for dean") {
                              echo "<script type='text/javascript'>alert('Cannot edit: Syllabus is being check.');</script>";
                            }else if ($status_desc=="approved") {
                              echo "<script type='text/javascript'>alert('Cannot edit: Syllabus already approved.');</script>";
                            }
                            $class->sqlclose();
                          }else{
                            echo "<script type='text/javascript'>alert('You can only select 2-4 CLO');</script>";
                          }
                        
                      }
                    }
                    $class->loaddb();
                    $sqlpgo="SELECT testbank.ilo.ILO_code FROM testbank.ilo INNER JOIN testbank.course_learning_outcomes ON testbank.course_learning_outcomes.ILO_ID = testbank.ilo.ILO_ID WHERE testbank.course_learning_outcomes.syllabus_id = '".$syllabus_id."'  AND testbank.ilo.ILO_ID = testbank.course_learning_outcomes.ILO_ID";
                    $resultpgo = mysql_query($sqlpgo);
                    if(!$resultpgo){
                      echo "<script type='text/javascript'>alert('Please select PGO before creating a topic');</script>";
                    }else{
                      while($row1=mysql_fetch_array($resultpgo)){
                        $ilod=$row1['ILO_code'];
                        echo $ilod."<br>";
                      }

                    }
                    $sqlpgo="SELECT testbank.ilo.ILO_code FROM testbank.ilo INNER JOIN testbank.course_learning_outcomes ON testbank.course_learning_outcomes.ILO_ID = testbank.ilo.ILO_ID WHERE testbank.course_learning_outcomes.syllabus_id = '".$syllabus_id."'  AND testbank.ilo.ILO_ID = testbank.course_learning_outcomes.ILO_ID";
                    $resultpgo = mysql_query($sqlpgo);
                    if(mysql_num_rows($resultpgo)==0){
                      echo "<script type='text/javascript'>alert('Please select PGO and CLO before creating a topic');</script>";
                    }
                    $class->sqlclose();
                    ?>
                  </div>
                </div>
              </form>
                <br>
              <form role="form-sm" method="post">
                <div class="row">
                  <div class="col-lg-2">
                    <a href="#" role="button" class="btn btn-warning disabled">
                      <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Course Requirements And Policies</a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-3">
                    <label>Course Requirement Output</label>
                    <input type="text" class="form-control" placeholder="Enter Course Requirement Output" value="<?php echo $cr_output; ?>" name="croutput">
                  </div>
                  <div class="col-lg-9">
                    <label>Course Requirement Description</label>
                    <input type="text" class="form-control" placeholder="Enter Course Requirement Description" value="<?php echo $cr_desc; ?>" name="crdesc">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <label>Late / Tardiness Policy</label>
                    <textarea rows="1" class="form-control" placeholder="Enter Late / Tardiness Policy"  name="lt"><?php echo $lt; ?></textarea>
                  </div>
                  <div class="col-lg-12">
                    <label>Absence</label>
                    <textarea rows="1" class="form-control" placeholder="Enter Absence Policy"  name="absence"><?php echo $absence; ?></textarea>
                  </div>
                  <div class="col-lg-12">
                    <label>Missed Quizzes</label>
                    <textarea rows="1" class="form-control" placeholder="Enter Missed Quizzes Policy"  name="mq"><?php echo $mq; ?></textarea>
                  </div>
                  <div class="col-lg-12">
                    <label>ME Permits Policy</label>
                    <textarea rows="1" class="form-control" placeholder="Enter ME Permits Policy"  name="permits"><?php echo $permits; ?></textarea>
                  </div>
                  <div class="col-lg-12">
                    <label>Cheating Policy</label>
                    <textarea rows="1" class="form-control" placeholder="Enter Cheating Policy"  name="cheating"><?php echo $cheating; ?></textarea>
                  </div>
                  <div class="col-lg-12">
                    <label>Classrooms Misbehavior Policy</label>
                    <textarea rows="1" class="form-control" placeholder="Enter Classrooms Misbehavior Policy"  name="cm"><?php echo $cm; ?></textarea>
                  </div>
                  <div class="col-lg-12">
                    <label>References</label>
                    <textarea rows="1" class="form-control" placeholder="Enter References"  name="ref"><?php echo $ref; ?></textarea>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-md-12">
                   <button type="submit" class="pull-right btn btn-default" name="savecrp">
                    <i class="glyphicon glyphicon-floppy-save"></i> Save CRP </button>
                    <?php
                    if(isset($_POST['savecrp'])){
                      $class->loaddb();
                        $sql="SELECT syllabusstatus.syll_status_desc FROM syllabus INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id WHERE syllabus.syllabus_id ='".$syllabus_id."'";
                        $result=mysql_query($sql);
                        while($row=mysql_fetch_array($result)){
                          $status_desc=$row['syll_status_desc'];
                        }
                        if ($status_desc=="pending") {
                           $cr_output=$_POST['croutput'];
                          $cr_desc=$_POST['crdesc'];  
                          $class_misbehavior=$_POST['cm'];
                          $late_tardiness=$_POST['lt']; 
                          $absence=$_POST['absence']; 
                          $miss_quiz=$_POST['mq'];  
                          $permits=$_POST['permits']; 
                          $cheating=$_POST['cheating']; 
                          $class_misbehavior=$_POST['cm'];  
                          $ref_desc=$_POST['ref'];
                          $query2 = "UPDATE course_req SET cr_output='".$cr_output."',cr_desc='".$cr_desc."' WHERE syllabus_id='".$syllabus_id."'";
                            $result2=mysql_query($query2) or die("Query Failed course_req: ".mysql_error());
                          $query3 = "UPDATE policies SET late_tardiness='".$late_tardiness."',absence='".$absence."',miss_quiz='".$miss_quiz."',permits='".$permits."',cheating='".$cheating."',class_misbehavior='".$class_misbehavior."' WHERE syllabus_id='".$syllabus_id."'";
                            $result3=mysql_query($query3) or die("Query Failed policies: ".mysql_error());
                          $query4 = "UPDATE reference SET ref_desc='".$ref_desc."' WHERE syllabus_id='".$syllabus_id."'";
                        $result4=mysql_query($query4) or die("Query Failed reference: ".mysql_error());
                        echo "<script type='text/javascript'>alert('Saved!');</script>";
                        echo "<meta http-equiv='refresh' content='0'>";
                        }else if ($status_desc=="queue for dean") {
                          echo "<script type='text/javascript'>alert('Cannot edit: Syllabus is being check.');</script>";
                        }else if ($status_desc=="approved") {
                          echo "<script type='text/javascript'>alert('Cannot edit: Syllabus already approved.');</script>";
                        }
                        $class->sqlclose();
                    }
                    ?>
                  </div>
                </div>
              </form>
              <form role="form-sm" method="post" data-toggle="validator">
                <div class="row">
                  <div class="col-lg-2">
                    <a href="#" role="button" class="btn btn-warning disabled">
                      <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Contact Hours</a>
                  </div>
                </div>
                <div class="box-body" style="overflow-y:scroll; overflow-x:hidden; height:450px;">
                  <input type="hidden" class="form-control" name="syllabus_id" value="<?php echo $syllabus_id; ?>">
                  <input type="hidden" class="form-control" name="subj_id1" value="<?php echo $subj_id1; ?>">
                  <table class="table table-bordered" id="dynamic_field">
                    <tr>
                      <td>
                        <div class="row">
                          <div class="col-lg-2">
                            <label>Week No</label>
                            <select class="form-control input-sm select" name="week" id="week" onchange="getval(this,<?php echo $syllabus_id; ?>);" required>
                              <option value=""></option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="3" disabled>4 (Prelim Exam)</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8" disabled>8 (Midterm Exam)</option>
                              <option value="9">9</option>
                              <option value="10">10</option>
                              <option value="11" disabled>11 (Pre-final Exam)</option>
                              <option value="12">12</option>
                              <option value="13">13</option>  
                              <option value="14" disabled>14 (Final Exam)</option>                          
                            </select>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <label>Topics</label>
                            <input type="text" class="form-control" placeholder="Enter Topics" name="maintopics" id="maintopics" required>
                          </div>
                          <!-- <div class="col-lg-2">
                            <label>Period</label>
                            <select class="form-control input-sm select" name="period" required>
                            <option value=""></option>
                            <option value="1">Prelim</option>
                            <option value="2">Midterm</option>
                            <option value="3">Pre-Final</option>
                            <option value="4">Final</option>
                            </select>
                          </div> -->
                          <div class="col-lg-12">
                          <label>Sub Topics</label>
                            <table class="table table-bordered" id="dynamic_subtopic1">
                              <tr>
                                <td>
                                  <div class="input-group">
                                    <input type="text" name="subtopics[]" class="form-control" placeholder="Enter Sub Topic" id="subtopics0" aria-describedby="basic-addon1">
                                    <span class="input-group-addon" id="basic-addon1">
                                      <a>
                                        <i id="subtopicsadd" class="glyphicon glyphicon-plus subtopics">
                                          <span class="subtopicstext">Add</span>
                                        </i>
                                      </a>
                                    </span>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </div>
                          <div class="col-lg-12">
                            <label>Intended Learning Outcome</label>
                            <?php 
                            $class->loaddb();
                            $query = "SELECT ilo.ILO_description, course_learning_outcomes.CLO_id FROM ilo INNER JOIN course_learning_outcomes ON course_learning_outcomes.ILO_ID = ilo.ILO_ID WHERE course_learning_outcomes.syllabus_id = '".$syllabus_id."' AND ilo.ILO_ID = course_learning_outcomes.ILO_ID";
                            $result=mysql_query($query) or die("Query Failed : ".mysql_error());
                            $i=0;
                            while($rows=mysql_fetch_array($result)){
                            $cloid[$i]=$rows['CLO_id'];
                            $ilodes[$i]=$rows['ILO_description'];
                            $i++;
                            }
                            if (empty($cloid)) {
                             echo "Please select Course learning outcome";
                            }else{
                            $total_elmt=count($cloid);
                            $class->sqlclose();
                            ?>
                              <select class="form-control input-sm select" name="ilo"  id="ilo" required>
                              <option value=""></option>
                                <?php 
                                for($j=0;$j<$total_elmt;$j++)
                                { 
                                ?><option value="<?php 
                                echo $cloid[$j];
                                ?>"><?php 
                                echo $ilodes[$j];
                                ?></option><?php
                                }}
                                ?>
                              </select>
                          </div>
                          <div class="col-lg-12">
                            <label>Teaching and Learning Activities</label>
                            <textarea class="form-control" rows="2" name="tla" id="tla" placeholder="Enter TLA" required></textarea>
                          </div>
                          <div class="col-lg-12">
                            <label>Resources</label>
                            <textarea class="form-control" rows="2" name="resource" id="resource" placeholder="Enter Resources" required></textarea>
                          </div>
                          <div class="col-lg-12">
                            <label>Outcome Based Assessment</label>
                            <textarea class="form-control" rows="2" name="oba" id="oba" placeholder="Enter OBA" required></textarea>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="box-footer clearfix">
                  <div class="row">
                    <div class="col-md-9">
                      <button type="button" class="pull-right btn btn-primary" id="print" onclick="PrintPreview(printableArea)" style="width:85px;">
                      <i class="fa fa-print"></i> Preview </button>
                      
                    </div>
                    <div class="col-md-1">
                      <button type="button" class="pull-right btn btn-primary" id="print" onclick="printDiv('printableArea')" style="width:85px;">
                      <i class="fa fa-print"></i> Print </button>
                    </div>
                    <div class="col-md-1">
                     <button type="submit" class="pull-right btn btn-default" name="save" style="width:85px;">
                      <i class="glyphicon glyphicon-floppy-save"></i> Save </button>
                      <?php
                      if(isset($_POST['save'])){
                        $class->loaddb();
                        $sql="SELECT syllabusstatus.syll_status_desc FROM syllabus INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id WHERE syllabus.syllabus_id ='".$syllabus_id."'";
                        $result=mysql_query($sql);
                        while($row=mysql_fetch_array($result)){
                          $status_desc=$row['syll_status_desc'];
                        }
                        if ($status_desc=="pending") {
                           $class->createsyl();
                        }else if ($status_desc=="queue for dean") {
                          echo "<script type='text/javascript'>alert('Cannot edit: Syllabus is being check.');</script>";
                        }else if ($status_desc=="approved") {
                          echo "<script type='text/javascript'>alert('Cannot edit: Syllabus already approved.');</script>";
                        }
                        $class->sqlclose();
                      }
                      ?>
                    </div>
                    </form> 
                    <form method="post">
                    <div class="col-md-1">
                     <button type="submit" name="submittodean" class="pull-right btn btn-success" id="submittodean" style="width:85px;">
                      <i class="glyphicon glyphicon glyphicon-ok"></i> Submit </button>
                      <?php
                      if(isset($_POST['submittodean'])){
                        $class->submittodean($syllabus_id);
                      }
                      ?>
                    </div>
                  </div>
                    
                    <?php $class->syllremarks($syllabus_id); ?>
                  
                </div>
              </form> 
            </div> 
        </section>
      </div>
    </section>
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2016 <a href="#">ACLC</a>.</strong> All rights
    reserved.
  </footer>
  <div id="printableArea1" style="display:none">
    <?php include('printsyllabus.php'); ?>
  </div>
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="dist/js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>  
var subtopic=1;
function getval(sel,syllabus_id)
{
   val1=sel.value;   
   val2=syllabus_id; 

    $.ajax({
              type: "Post",
              data: {week: val1, syll: val2},
              url: "test4.php",
              dataType: "json",
              success: function(data) {

                    var topic_description;
                    var tla;
                    var resources;
                    var oba;
                    var CLO_id;
                    var sub;
                    var numItems = $('.subtopicsdel').length;
                    if (numItems>0) {
                      for (var i = numItems; i > 0; i--) {
                        $('#subtopic'+i+'').remove();
                        subtopic--;
                      };
                        
                    };
                    
                    $("#subtopics0").val("");
                    $.each(data , function(key , value) {
                        topic_description=this['topic_description'];
                        tla=this['tla'];  
                        resources=this['resources'];
                        oba=this['oba'];
                        CLO_id=this['CLO_id'];
                        $.each(value.subtopic , function(k , v ){ 
                        if (k==0) {
                          sub=v;
                          $("#subtopics0").val(sub);
                        };
                        if (k>0) {
                          sub=v;
                          
                          $('#dynamic_subtopic1').append('<tr id="subtopic'+subtopic+'"><td><div class="input-group"><input type="text" name="subtopics[]" class="form-control" placeholder="Enter Sub Topic" id="subtopics'+subtopic+'" value="'+sub+'" aria-describedby="basic-addon1"><span class="input-group-addon" id="basic-addon1"><a><i id="'+subtopic+'" class="glyphicon glyphicon-minus subtopicsdel"><span class="subtopicsdeltext">Delete</span></i></a></span></div></td></tr>'); 
                          subtopic++;
                        };
                      
                      });     
                    });
                    $("#maintopics").val(topic_description);
                    $("#tla").val(tla);
                    $("#oba").val(oba);
                    $("#tla").val(tla);
                    $("#ilo").val(CLO_id);
                    $("#resource").val(resources);
              }
        }); 
}
 $(document).ready(function(){  
      

      // $('#addweek').click(function(){  
      //      i++;  
      //      $('#dynamic_field').append('<tr><td><div class="row"><div class="col-lg-12"><label>Week No. 1</label></div><div class="col-lg-12"><label>Topics</label><input type="text" class="form-control" placeholder="Enter Topics"></div><div class="col-lg-12"><label>Sub Topics</label><table class="table table-bordered" id="dynamic_subtopic1"><tr><td><div class="input-group"><input type="text" name="" class="form-control" placeholder="Enter Sub Topic" id="" aria-describedby="basic-addon1"><span class="input-group-addon" id="basic-addon1"><a><i id="1" class="glyphicon glyphicon-plus subtopics"><span class="subtopicstext">Add</span></i></a></span></div></td></tr></table></div><div class="col-lg-12"><label>Intended Learning Outcome</label><textarea class="form-control" rows="2" placeholder="Enter ILO"></textarea></div><div class="col-lg-12"><label>Teaching and Learning Activities</label><textarea class="form-control" rows="2" placeholder="Enter TLA"></textarea></div><div class="col-lg-12"><label>Resources</label><textarea class="form-control" rows="2" placeholder="Enter Resources"></textarea></div><div class="col-lg-12"><label>Outcome Based Assessment</label><textarea class="form-control" rows="2" placeholder="Enter OBA"></textarea></div></div></td></tr>');
      // });
      
      // $(document).on('click', '.btn_remove', function(){  
      //      var button_id = $(this).attr("id");   
      //      $('#row'+button_id+'').remove(); 
      //      i--; 
      // });
      $('#subtopicsadd').click(function(){ 
        subtopic++;
      // $(document).on('click', '.subtopics', function(){  
      //      var button_id = $(this).attr("id"); 
           $('#dynamic_subtopic1').append('<tr id="subtopic'+subtopic+'"><td><div class="input-group"><input type="text" name="subtopics[]" class="form-control" placeholder="Enter Sub Topic" id="subtopics'+subtopic+'" aria-describedby="basic-addon1"><span class="input-group-addon" id="basic-addon1"><a><i id="'+subtopic+'" class="glyphicon glyphicon-minus subtopicsdel"><span class="subtopicsdeltext">Delete</span></i></a></span></div></td></tr>');  
            
      });
      $(document).on('click', '.subtopicsdel', function(){  
          var button_id = $(this).attr("id");   
          $('#subtopic'+button_id+'').remove(); 
          subtopic--;
      });  
 }); 


</script>  
  <script type="text/javascript">
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
  <script type="text/javascript">
function PrintPreview() {
        var toPrint = document.getElementById('printableArea');
        var popupWin = window.open('', '_blank', 'width=800,height=650,location=no,left=200px');
        popupWin.document.open();
        popupWin.document.write('<html><title>::Print Preview::</title></head><body">');
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');
        popupWin.document.close();
    }
  </script>
</body>
<style type="text/css">
  .subtopics .subtopicstext {
    visibility: hidden;
    width: 60px;
    background-color: #3c8dbc;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 100;
}
  .subtopicsdel .subtopicsdeltext {
    visibility: hidden;
    width: 60px;
    background-color: #f56954;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 100;
}
.subtopicsdeltext,.subtopicsdel {
  color: #f56954;
}


.subtopics:hover .subtopicstext {
    visibility: visible;
}
.subtopicsdel:hover .subtopicsdeltext {
    visibility: visible;
}

</style>
</html>
