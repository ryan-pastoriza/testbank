<?php
include('header.php'); 
include 'class.php';
$class = new testbank();
if ( !empty ( $_GET ) ) {
  $syllabus_id=$_GET['syllabus_id'];
  $subj_id=$_GET['subj_id'];
  $emp_id=$_GET['emp_id'];
  $class->loaddb();
  $period=3;
  $sql = "SELECT sched_subj.ss_id, `subject`.subj_id, `subject`.subj_code, `subject`.subj_name, `subject`.subj_desc FROM sched_subj INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id";
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
      }
    }
  $sqltopic="SELECT DISTINCT topics.topic_description FROM sched_subj INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN unit_lecture ON unit_lecture.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN topics ON topics.syllabus_id = syllabus.syllabus_id WHERE sched_subj.employment_id = $emp_id AND subject.subj_id= $subj_id ";
  $result = mysql_query($sqltopic);
    if(!$result){
      echo 'Database Error!';
    }else{
      while($row=mysql_fetch_array($result)){
        $topic_description=$row['topic_description'];
      }
    }
  $sqltq = "SELECT * FROM tq WHERE tq.syllabus_id = $syllabus_id AND tq.exam_id = '".$period."'";
  $resulttq = mysql_query($sqltq);
  if(mysql_num_rows($resulttq)==0){
    $query = "INSERT INTO `tq` (`tos_remarks`, `syllabus_id`,`exam_id`) VALUES ('none','".$syllabus_id."','1')";
    $resultw1=mysql_query($query) or die("Query Failed :1 ".mysql_error()); 
    $tqid=mysql_insert_id();
    $query32 = "INSERT INTO `tqstatus` (`status_desc`, `revise_count`,`date_time`,`notif_status`,`tq_id`) VALUES ('pending',0,NOW(),'notif','".$tqid."')";
    $resultw132=mysql_query($query32) or die("Query Failed :2 ".mysql_error()); 
    $sqltq1 = "SELECT * FROM tq WHERE tq.syllabus_id = $syllabus_id";
    $resulttq1 = mysql_query($sqltq1);
    while($rows=mysql_fetch_array($resulttq1)){
        $tq_id=$rows['tq_id'];
        $tosremarks=$rows['tos_remarks'];
      }

  }else{
      while($row=mysql_fetch_array($resulttq)){
        $tq_id=$row['tq_id'];
        $num_copies=$row['num_copies'];
      }
  }
}
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php
include('headernotification.php');
  ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" >
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
        <li id="syllabus_tab">
          <a href="syllabus_index.php">
            <i class="glyphicon glyphicon-pencil"></i><span>Syllabus</span>
          </a>
        </li>
        <li class="active" id="tq_tab">
          <a href="tq_index.php">
            <i class="glyphicon glyphicon-list-alt"></i> <span>Test Questionnaire</span>
          </a>
        </li>
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
        <section class="col-lg-7">
         
          <!-- Create TQ widget -->
          <div class="box  box-primary">
            <div class="box-header">
              <i  class="glyphicon glyphicon-list-alt"></i>
              <h3 class="box-title">Create TQ <?php echo " for ".$subj_name1;?></h3>
            </div>
            <div class="box-body">
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li class="active" style="width:145px;"><a class="btn" href="#identab" data-toggle="tab">
                    <b>Identification</b>
                    </a></li>
                    <li class="" style="width:145px;"><a class="btn" href="#enutab" data-toggle="tab">
                    <b>Enumeration</b>
                    </a></li>
                    <li class="" style="width:145px;"><a class="btn" href="#multitab" data-toggle="tab">
                    <b>Multiple Choice</b>
                    </a></li>
                    <li class="" style="width:145px;"><a class="btn" href="#toftab" data-toggle="tab">
                    <b>True or False</b>
                    </a></li>
                    <li class="" style="width:145px;"><a class="btn" href="#matchtab" data-toggle="tab">
                    <b>Matching Type</b>
                    </a></li>
                    <li class="" style="width:145px;"><a class="btn" href="#probtab" data-toggle="tab">
                    <b>Problem Solving</b>
                    </a></li>
                    <li class="" style="width:145px;"><a class="btn" href="#essaytab" data-toggle="tab">
                    <b>Essay</b>
                    </a></li>
                    <li class="" style="width:145px;"><a class="btn" href="#fitbtab" data-toggle="tab">
                    <b>Fill in the Blank</b>
                    </a></li>
                  </ul>
                  <div class="box box default">
                    <div class="tab-content " id="testtable">
                      <div class="active tab-pane box-primary" id="identab">
                        <form method="post" enctype="multipart/form-data" >
                        <br>
                        <div class="row ">
                          <div class="col-lg-12 ">
                            <table>
                              <tr>
                                <td>
                                  <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;
                                </td>
                                <td>
                                    &nbsp; Test &nbsp;
                                </td>
                                <td>
                                <?php
                                  $class->loaddb();
                                  $querytniden = "SELECT test_number.test_number FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id WHERE question_type.question_type_name = 'Identification' AND tq.tq_id = $tq_id ";
                                   $resulttniden=mysql_query($querytniden) or die("Query Failed : ".mysql_error());
                                  if(mysql_num_rows($resulttniden)==0){
                                    $querytniden2 = "SELECT test_number.test_number FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id WHERE tq.tq_id = $tq_id ORDER BY test_number.test_number ASC";
                                    $resulttniden2=mysql_query($querytniden2) or die("Query Failed : ".mysql_error());
                                    if (mysql_num_rows($resulttniden2)==0) {
                                      $tniden=1;
                                    }else{
                                      while($rows=mysql_fetch_array($resulttniden2)){
                                        $tniden=$rows['test_number'];
                                     }
                                      $tniden++;
                                    }
                                  }else{
                                    while($rows=mysql_fetch_array($resulttniden)){
                                    $tniden=$rows['test_number'];
                                     }
                                   }
                                   $class->sqlclose();
                                   ?>
                                  <select class="form-control input-xs" name="identn" required>
                                  <option value="<?php echo $tniden;?>">
                                  <?php echo $tniden;?></option>
                                  </select>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">Direction</span>
                              <textarea name="idendirect" placeholder="Enter direction ..." style="width: 100%; height: 30px"></textarea>
                              <span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="directionfile"></span></span>
                            </div>
                          </div>
                        </div>
                        <br>
                        
                              <div class="row">

                                <div class="col-xs-1">
                                No.
                                </div>
                                <div class="col-xs-2">
                                  <?php 
                                  $class->loaddb();
                                  $queryidennum = "SELECT testquestions.number FROM testquestions INNER JOIN test_number ON testquestions.test_id = test_number.test_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id INNER JOIN tq ON tq.tq_id = test_number.tq_id INNER JOIN major_exams ON major_exams.exam_id = tq.exam_id WHERE question_type.question_type_name = 'Identification' AND tq.exam_id = '".$period."' AND tq.syllabus_id = '".$syllabus_id."'";
                                   $resultidennum=mysql_query($queryidennum) or die("Query Failed : ".mysql_error());
                                   $i=0;
                                  if(!$resultidennum){
                                    $idennum[$i]=1;
                                  }else{
                                    while($rows=mysql_fetch_array($resultidennum)){
                                    $idennum[$i]=$rows['number'];
                                    $i++;
                                     }
                                     $idennum[$i]=$i+1;
                                   }
                                   $total_elmtidennum=count($idennum);
                                   $class->sqlclose();
                                   ?>
                                  <select class="form-control input-xs" name="idennumbers" onchange="getval1(this,'Identification',<?php echo $tq_id; ?>);" required>
                                  <option></option>
                                  <?php 
                                    for($j=0;$j<$total_elmtidennum;$j++){ 
                                  ?><option value="<?php echo $idennum[$j];?>">
                                  <?php echo $idennum[$j];?></option><?php
                                  }?>
                                  </select>
                                </div>
                              </div>
                                <br>
                                <div class="row">
                                  <div class="col-xs-12">
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Question</span><textarea  name="idenquestion" id="idenquestionid" placeholder="Enter question ..." style="width: 100%; height: 30px" required></textarea><span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="questionfile"></span></span>
                                  </div>
                                  <div id="resultidenquestion">
                                  </div>
                                </div>
                              </div>
                                <br>
                                <div class="row">
                                  <div class="col-xs-4">
                                    <label for="topic">Topic</label>
                                    <?php 
                                    $class->loaddb();
                                    $querytopic = "SELECT * FROM topics WHERE topics.syllabus_id = $syllabus_id AND (topics.exam_id = $period OR topics.exam_id = 1 OR topics.exam_id = 2)  ";
                                     $resulttopics=mysql_query($querytopic) or die("Query Failed : ".mysql_error());
                                    if(!$resulttopics){
                                    }else{
                                      $i=0;
                                      while($rows=mysql_fetch_array($resulttopics)){ 
                                      $topicsroll[$i]=$rows['topic_description'];
                                      $topicsroll2[$i]=$rows['topics_id'];
                                      $i++;
                                       }
                                     }
                                     $total_elmttopic=count($topicsroll);
                                     $class->sqlclose();
                                     ?>
                                    <select class="form-control input-xs identopics" name="identopics" id="identopics" required>
                                    <option></option>
                                    <?php 
                                      for($j=0;$j<$total_elmttopic;$j++){ 
                                    ?><option value="<?php echo $topicsroll2[$j];?>">
                                    <?php echo $topicsroll[$j];?></option><?php
                                    }?>
                                    </select>
                                  </div>
                                  <div class="col-xs-4">
                                    <label name="" for="idencognitive">Cognitive Domain</label>
                                    <select class="form-control idencognitive" name="idencognitive" id="idencognitive" required>
                                      <option></option>
                                      <option value="1">Knowledge</option>
                                      <option value="2">Comprehension</option>
                                      <option value="3">Application</option>
                                      <option value="4">Analysis</option>
                                      <option value="5">Evaluation</option>
                                      <option value="6">Synthesis</option>
                                    </select>
                                  </div>
                                  <div class="col-xs-4">
                                    <label for="idenpoints">Points</label>
                                    <select class="form-control" name="idenpoints" id="idenpoints" required>
                                      <option></option>
                                      <?php for ($i=1; $i <= 100; $i++) { 
                                        echo "<option value=".$i.">".$i."</option>";
                                      } ?>
                                    </select>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-xs-12">
                                    <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1"> Answer</span>
                                      <textarea name="idenanswer" id="idenanswer" placeholder="Enter direction ..." style="width: 100%; height: 30px"></textarea>
                                    </div>
                                  </div>
                                </div>
                                <br>
                        <div class="col-xs-12">
                          <button type="submit" class="pull-right btn btn-default" name="idensave">
                          <i class="glyphicon glyphicon-floppy-save"></i> Save </button>
                          <?php 
                          if (isset($_POST['idensave'])){
                              $location = 'uploads/';
                              $max_size = 20000000;
                              $ttype = "Identification";
                              $quest = rand();
                              $name1 = $_FILES['questionfile']['name'];
                              $extension1 = strtolower(substr($name1, strpos($name1, '.')+1));
                              $size1 = $_FILES['questionfile']['size'];
                              $type1 = $_FILES['questionfile']['type'];
                              $tmp_name1 = $_FILES['questionfile']['tmp_name'];
                              $q="";

                              $direct = rand();
                              $name2 = $_FILES['directionfile']['name'];
                              $extension2 = strtolower(substr($name2, strpos($name2, '.')+1));
                              $size2 = $_FILES['directionfile']['size'];
                              $type2 = $_FILES['directionfile']['type'];
                              $tmp_name2 = $_FILES['directionfile']['tmp_name'];
                              $d="";

                              if (isset($name2)) {
                                if (!empty($name2)) {
                                  if (($extension2=='jpg'||$extension2=='jpeg') && ($type2=='image/jpeg') && $size2<=$max_size) {
                                    $d = $direct."-".$name2;
                                    if (move_uploaded_file($tmp_name2, $location.$d)) {
                                    }else{
                                      echo "There was an error.";
                                    }
                                  }else{
                                    echo "File must be jpg/jpeg and must be 2mb or less.";
                                  }
                                }else{
                                }
                                  
                              }
                              if (isset($name1)) {
                                if (!empty($name1)) {
                                  if (($extension1=='jpg'||$extension1=='jpeg') && ($type1=='image/jpeg') && $size1<=$max_size) {
                                    $q = $quest."-".$name1;
                                    if (move_uploaded_file($tmp_name1, $location.$q)) {
                                    }else{
                                      echo "There was an error.";
                                    }
                                  }else{
                                    echo "File must be jpg/jpeg and must be 2mb or less.";
                                  }
                                }else{
                                }
                                  
                              }
                              $class->saveiden($syllabus_id,$tq_id,$ttype,$q ,$d);
                          } 
                          ?>
                        </div>
                        </form>

                      <div class="col-lg-12" style="overflow-y:scroll; overflow-x:hidden; height:340px;">
                      <table class="table table-bordered">
                        <?php 
                        $class->showtest($tq_id, "Identification"); 
                        ?>
                      </table>
                      </div>
                      </div>
                      <div class="tab-pane " id="enutab">
                        <form method="post" enctype="multipart/form-data">
                        <br>
                        <div class="row">
                          <div class="col-lg-12">
                            <table>
                              <tr>
                                <td>
                                  <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;
                                </td>
                                <td>
                                    &nbsp; Test &nbsp;
                                </td>
                                <td>
                                <?php
                                  $class->loaddb();
                                  $querytnenu = "SELECT test_number.test_number FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id WHERE question_type.question_type_name = 'Enumeration' AND tq.tq_id = $tq_id ";
                                   $resulttnenu=mysql_query($querytnenu) or die("Query Failed : ".mysql_error());
                                  if(mysql_num_rows($resulttnenu)==0){
                                    $querytnenu2 = "SELECT test_number.test_number FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id WHERE tq.tq_id = $tq_id ORDER BY test_number.test_number ASC";
                                    $resulttnenu2=mysql_query($querytnenu2) or die("Query Failed : ".mysql_error());
                                    if (mysql_num_rows($resulttnenu2)==0) {
                                      $tnenu=1;
                                    }else{
                                      while($rows=mysql_fetch_array($resulttnenu2)){
                                        $tnenu=$rows['test_number'];
                                     }
                                      $tnenu++;
                                    }
                                  }else{
                                    while($rows=mysql_fetch_array($resulttnenu)){
                                    $tnenu=$rows['test_number'];
                                     }
                                   }
                                   $class->sqlclose();
                                   ?>
                                  <select class="form-control input-xs" name="enutn" required>
                                  <option value="<?php echo $tnenu;?>">
                                  <?php echo $tnenu;?></option>
                                  </select>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">Direction</span>
                              <textarea name="enudirect" placeholder="Enter direction ..." style="width: 100%; height: 30px"></textarea>
                              <span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="directionfile"></span></span>
                            </div>
                          </div>
                        </div>
                        <br>
                        
                              <div class="row">

                                <div class="col-xs-1">
                                No.
                                </div>
                                <div class="col-xs-2">
                                  <?php 
                                  $class->loaddb();
                                  $queryenunum = "SELECT testquestions.number FROM testquestions INNER JOIN test_number ON testquestions.test_id = test_number.test_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id INNER JOIN tq ON tq.tq_id = test_number.tq_id INNER JOIN major_exams ON major_exams.exam_id = tq.exam_id WHERE question_type.question_type_name = 'Enumeration' AND tq.exam_id = '".$period."' AND tq.syllabus_id = '".$syllabus_id."'";
                                   $resultenunum=mysql_query($queryenunum) or die("Query Failed : ".mysql_error());
                                   $p=0;
                                  if(!$resultenunum){
                                    $enunum[$p]=1;
                                  }else{
                                    while($rows=mysql_fetch_array($resultenunum)){
                                      $enunum[$p]=$rows['number'];
                                      $p++;
                                     }
                                     $enunum[$p]=$p+1;
                                   }
                                   $total_elmtenunum=count($enunum);
                                   $class->sqlclose();
                                   ?>
                                  <select class="form-control input-xs" name="enunumbers" onchange="getval7(this,'Enumeration',<?php echo $tq_id; ?>);" required>
                                  <option></option>
                                  <?php 
                                    for($j=0;$j<$total_elmtenunum;$j++){ 
                                  ?><option value="<?php echo $enunum[$j];?>">
                                  <?php echo $enunum[$j];?></option><?php
                                  }?>
                                  </select>
                                </div>
                              </div>
                                <br>
                                <div class="row">
                                  <div class="col-xs-12">
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Question</span><textarea  name="enuquestion" id="enuquestionid" placeholder="Enter question ..." style="width: 100%; height: 30px" required></textarea><span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="questionfile"></span></span>
                                  </div>
                                  <div id="resultenuquestion">
                                  </div>
                                </div>
                              </div>
                                <br>
                                <div class="row">
                                  <div class="col-xs-4">
                                    <label for="topic">Topic</label>
                                    <?php 
                                    $class->loaddb();
                                    $querytopic = "SELECT * FROM topics WHERE topics.syllabus_id = $syllabus_id AND (topics.exam_id = $period OR topics.exam_id = 1 OR topics.exam_id = 2)";
                                     $resulttopics=mysql_query($querytopic) or die("Query Failed : ".mysql_error());
                                    if(!$resulttopics){
                                    }else{
                                      $i=0;
                                      while($rows=mysql_fetch_array($resulttopics)){ 
                                      $topicsroll[$i]=$rows['topic_description'];
                                      $topicsroll2[$i]=$rows['topics_id'];
                                      $i++;
                                       }
                                     }
                                     $total_elmttopic=count($topicsroll);
                                     $class->sqlclose();
                                     ?>
                                    <select class="form-control input-xs enutopics" name="enutopics" id="enutopics" required>
                                    <option></option>
                                    <?php 
                                      for($j=0;$j<$total_elmttopic;$j++){ 
                                    ?><option value="<?php echo $topicsroll2[$j];?>">
                                    <?php echo $topicsroll[$j];?></option><?php
                                    }?>
                                    </select>
                                  </div>
                                  <div class="col-xs-4">
                                    <label name="" for="enucognitive">Cognitive Domain</label>
                                    <select class="form-control enucognitive" name="enucognitive" id="enucognitive" required>
                                      <option></option>
                                      <option value="1">Knowledge</option>
                                      <option value="2">Comprehension</option>
                                      <option value="3">Application</option>
                                      <option value="4">Analysis</option>
                                      <option value="5">Evaluation</option>
                                      <option value="6">Synthesis</option>
                                    </select>
                                  </div>
                                  <div class="col-xs-4">
                                    <label for="usr">Points</label>
                                    <select class="form-control enupoints" name="enupoints" id="enupoints" required>
                                      <option></option>
                                      <?php for ($i=1; $i <= 100; $i++) { 
                                        echo "<option value=".$i.">".$i."</option>";
                                      } ?>
                                    </select>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-xs-12">
                                    <table class="table table-bordered" id="answer1_field">
                                        <tr>
                                          <td>
                                            <div class="row">
                                              <div class="col-xs-12">
                                                <div class="input-group">
                                                  <span class="input-group-addon" id="basic-addon1">Answer 1.</span>
                                                  <input type="text" name="enuans[0]" class="form-control" placeholder="Enter Answer" id="enuanswer0" aria-describedby="basic-addon1" required>
                                                  <span class="input-group-addon enumcount" id="basic-addon1"><a href="#"><i id="1" class="glyphicon glyphicon-plus enuaddans"><span class="enuaddanstext">Add</span></i></a></span>
                                                </div>
                                              </div>
                                            </div>
                                          </td>
                                        </tr>
                                    </table>
                                  </div>
                                </div>
                                <br>
                          <div class="col-xs-12">
                            <button type="submit" class="pull-right btn btn-default" name="enusave">
                          <i class="glyphicon glyphicon-floppy-save"></i> Save </button>
                          <?php 
                          if (isset($_POST['enusave'])){
                              $location = 'uploads/';
                              $max_size = 20000000;
                              $ttype = "Enumeration";
                              $quest = rand();
                              $name1 = $_FILES['questionfile']['name'];
                              $extension1 = strtolower(substr($name1, strpos($name1, '.')+1));
                              $size1 = $_FILES['questionfile']['size'];
                              $type1 = $_FILES['questionfile']['type'];
                              $tmp_name1 = $_FILES['questionfile']['tmp_name'];
                              $q="";

                              $direct = rand();
                              $name2 = $_FILES['directionfile']['name'];
                              $extension2 = strtolower(substr($name2, strpos($name2, '.')+1));
                              $size2 = $_FILES['directionfile']['size'];
                              $type2 = $_FILES['directionfile']['type'];
                              $tmp_name2 = $_FILES['directionfile']['tmp_name'];
                              $d="";

                              if (isset($name2)) {
                                if (!empty($name2)) {
                                  if (($extension2=='jpg'||$extension2=='jpeg') && ($type2=='image/jpeg') && $size2<=$max_size) {
                                    $d = $direct."-".$name2;
                                    if (move_uploaded_file($tmp_name2, $location.$d)) {
                                    }else{
                                      echo "There was an error.";
                                    }
                                  }else{
                                    echo "File must be jpg/jpeg and must be 2mb or less.";
                                  }
                                }else{
                                }
                                  
                              }
                              if (isset($name1)) {
                                if (!empty($name1)) {
                                  if (($extension1=='jpg'||$extension1=='jpeg') && ($type1=='image/jpeg') && $size1<=$max_size) {
                                    $q = $quest."-".$name1;
                                    if (move_uploaded_file($tmp_name1, $location.$q)) {
                                    }else{
                                      echo "There was an error.";
                                    }
                                  }else{
                                    echo "File must be jpg/jpeg and must be 2mb or less.";
                                  }
                                }else{
                                }
                                  
                              }
                              $class->saveenu($syllabus_id,$tq_id,$ttype,$q ,$d);
                             } 
                          ?>
                          </div>
                        </form>
                      <div class="col-lg-12" style="overflow-y:scroll; overflow-x:hidden; height:340px;">
                      <table class="table table-bordered">
                        <?php 
                        $class->showtest($tq_id, "Enumeration"); 
                        ?>
                      </table>
                      </div>
                      </div>
                      <div class="tab-pane " id="multitab">
                        <form method="post" enctype="multipart/form-data">
                         <br>
                          <div class="row">
                            <div class="col-lg-12">
                              <table>
                                <tr>
                                  <td>
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;
                                  </td>
                                  <td>
                                      &nbsp; Test &nbsp;
                                  </td>
                                  <td>
                                  <?php
                                    $class->loaddb();
                                    $querytnmulti = "SELECT test_number.test_number FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id WHERE question_type.question_type_name = 'Multiple Choice' AND tq.tq_id = $tq_id ";
                                     $resulttnmulti=mysql_query($querytnmulti) or die("Query Failed : ".mysql_error());
                                    if(mysql_num_rows($resulttnmulti)==0){
                                      $querytnmulti2 = "SELECT test_number.test_number FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id WHERE tq.tq_id = $tq_id ORDER BY test_number.test_number ASC";
                                      $resulttnmulti2=mysql_query($querytnmulti2) or die("Query Failed : ".mysql_error());
                                      if (mysql_num_rows($resulttnmulti2)==0) {
                                        $tnmulti=1;
                                      }else{
                                        while($rows=mysql_fetch_array($resulttnmulti2)){
                                          $tnmulti=$rows['test_number'];
                                       }
                                        $tnmulti++;
                                      }
                                    }else{
                                      while($rows=mysql_fetch_array($resulttnmulti)){
                                      $tnmulti=$rows['test_number'];
                                       }
                                     }
                                     $class->sqlclose();
                                     ?>
                                    <select class="form-control input-xs" name="multitn" required>
                                    <option value="<?php echo $tnmulti;?>">
                                    <?php echo $tnmulti;?></option>
                                    </select>
                                  </td>
                                </tr>
                              </table>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Direction</span>
                                <textarea name="multidirect" placeholder="Enter direction ..." style="width: 100%; height: 30px"></textarea>
                              <span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="directionfile"></span></span>
                              </div>
                            </div>
                          </div>
                          <br>
                         
                                <div class="row">
                                  <div class="col-xs-1">
                                    No.
                                  </div>
                                  <div class="col-xs-2">
                                    <?php 
                                  $class->loaddb();
                                  $querymultinum = "SELECT testquestions.number FROM testquestions INNER JOIN test_number ON testquestions.test_id = test_number.test_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id INNER JOIN tq ON tq.tq_id = test_number.tq_id INNER JOIN major_exams ON major_exams.exam_id = tq.exam_id WHERE question_type.question_type_name = 'Multiple Choice' AND tq.exam_id = '".$period."' AND tq.syllabus_id = '".$syllabus_id."'";
                                   $resultmultinum=mysql_query($querymultinum) or die("Query Failed : ".mysql_error());
                                   $p=0;
                                  if(!$resultmultinum){
                                    $multinum[$p]=1;
                                  }else{
                                    while($rows=mysql_fetch_array($resultmultinum)){
                                      $multinum[$p]=$rows['number'];
                                      $p++;
                                     }
                                     $multinum[$p]=$p+1;
                                   }
                                   $total_elmtmultinum=count($multinum);
                                   $class->sqlclose();
                                   ?>
                                  <select class="form-control input-xs" name="multinumbers" onchange="getval8(this,'Multiple Choice',<?php echo $tq_id; ?>);" required>
                                  <option></option>
                                  <?php 
                                    for($j=0;$j<$total_elmtmultinum;$j++){ 
                                  ?><option value="<?php echo $multinum[$j];?>">
                                  <?php echo $multinum[$j];?></option><?php
                                  }?>
                                    </select>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-xs-12">
                                    <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Question</span><textarea  name="multiquestion" id="multiquestionid" class="multiquestion" placeholder="Enter question ..." style="width: 100%; height: 30px" required></textarea><span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="questionfile"></span></span>
                                  </div>
                                    <div id="resultmultiquestion">
                                  </div>
                                  </div>
                                </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-xs-4">
                                      <label for="topic">Topic</label>
                                      <?php 
                                      $class->loaddb();
                                      $querytopic = "SELECT * FROM topics WHERE topics.syllabus_id = $syllabus_id AND (topics.exam_id = $period OR topics.exam_id = 1 OR topics.exam_id = 2)";
                                       $resulttopics=mysql_query($querytopic) or die("Query Failed : ".mysql_error());
                                      if(!$resulttopics){
                                      }else{
                                        $i=0;
                                        while($rows=mysql_fetch_array($resulttopics)){
                                        $topicsroll[$i]=$rows['topic_description'];
                                        $topicsroll2[$i]=$rows['topics_id'];
                                        $i++;
                                         }
                                       }
                                       $total_elmttopic=count($topicsroll);
                                       $class->sqlclose();
                                       ?>
                                      <select class="form-control input-xs multitopics" name="multitopics" id="multitopics" required>
                                      <option></option>
                                      <?php 
                                        for($j=0;$j<$total_elmttopic;$j++){ 
                                      ?><option value="<?php echo $topicsroll2[$j];?>">
                                      <?php echo $topicsroll[$j];?></option><?php
                                      }?>
                                      </select>
                                    </div>
                                    <div class="col-xs-4">
                                      <label name="" for="multicognitive">Cognitive Domain</label>
                                      <select class="form-control multicognitive" name="multicognitive" id="multicognitive" required>
                                        <option></option>
                                        <option value="1">Knowledge</option>
                                        <option value="2">Comprehension</option>
                                        <option value="3">Application</option>
                                        <option value="4">Analysis</option>
                                        <option value="5">Evaluation</option>
                                        <option value="6">Synthesis</option>
                                      </select>
                                    </div>
                                    <div class="col-xs-4">
                                      <label for="usr">Points</label>
                                      <select class="form-control" name="multipoints" id="multipoints" required>
                                        <option></option>
                                        <?php for ($i=1; $i <= 100; $i++) { 
                                          echo "<option value=".$i.">".$i."</option>";
                                        } ?>
                                      </select>
                                    </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-xs-12">
                                      <table class="table table-bordered" id="multiplechoice1_field">
                                        <tr>
                                          <td>
                                            <div class="row">
                                              <div class="col-xs-10">
                                                <div class="input-group">
                                                  <span class="input-group-addon" id="basic-addon1">Choice 1.</span>
                                                  <input type="text" name="multians[0]" class="form-control" placeholder="Enter Choice" id="answer0" aria-describedby="basic-addon1" required>
                                                  <span class="input-group-addon multicount" id="basic-addon1"><a href="#"><i id="1" class="glyphicon glyphicon-plus multiaddans"><span class="multiaddanstext">Add</span></i></a></span><span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="answerfile[0]"></span>
                                                </div>
                                              </div>
                                              <div class="col-xs-2">
                                                <label class="radio">
                                                <input type="radio" name="radiob" id="rb0" value="0" class="minimal" required>Answer</label>
                                              </div>
                                            </div>
                                          </td>
                                        </tr>
                                      </table>
                                    </div>
                                  </div>
                                  <br>
                                
                            <div class="col-xs-12">
                              <button type="submit" class="pull-right btn btn-default" name="multisave">
                            <i class="glyphicon glyphicon-floppy-save"></i> Save </button>
                            <?php 
                            if (isset($_POST['multisave'])){
                                $location = 'uploads/';
                                $max_size = 20000000;
                                $ttype = "Multiple Choice";
                                $quest = rand();
                                $name1 = $_FILES['questionfile']['name'];
                                $extension1 = strtolower(substr($name1, strpos($name1, '.')+1));
                                $size1 = $_FILES['questionfile']['size'];
                                $type1 = $_FILES['questionfile']['type'];
                                $tmp_name1 = $_FILES['questionfile']['tmp_name'];
                                $q="";

                                $direct = rand();
                                $name2 = $_FILES['directionfile']['name'];
                                $extension2 = strtolower(substr($name2, strpos($name2, '.')+1));
                                $size2 = $_FILES['directionfile']['size'];
                                $type2 = $_FILES['directionfile']['type'];
                                $tmp_name2 = $_FILES['directionfile']['tmp_name'];
                                $d="";

                              $answer = rand();
                              $name3 = $_FILES['answerfile']['name'];
                              $extension3 = strtolower(substr($name3, strpos($name3, '.')+1));
                              $size3 = $_FILES['answerfile']['size'];
                              $type3 = $_FILES['answerfile']['type'];
                              $tmp_name3 = $_FILES['answerfile']['tmp_name'];
                              $f="";

                              if (isset($name3)) {
                                if (!empty($name3)) {
                                  if (($extension3=='jpg'||$extension3=='jpeg') && ($type3=='image/jpeg') && $size3<=$max_size) {
                                    $f = $quest."-".$name3;
                                    if (move_uploaded_file($tmp_name3, $location.$f)) {
                                    }else{
                                      echo "There was an error.";
                                    }
                                  }else{
                                    echo "File must be jpg/jpeg and must be 2mb or less.";
                                  }
                                }else{
                                }
                                  
                              }

                                if (isset($name2)) {
                                  if (!empty($name2)) {
                                    if (($extension2=='jpg'||$extension2=='jpeg') && ($type2=='image/jpeg') && $size2<=$max_size) {
                                      $d = $direct."-".$name2;
                                      if (move_uploaded_file($tmp_name2, $location.$d)) {
                                      }else{
                                        echo "There was an error.";
                                      }
                                    }else{
                                      echo "File must be jpg/jpeg and must be 2mb or less.";
                                    }
                                  }else{
                                  }
                                    
                                }
                                if (isset($name1)) {
                                  if (!empty($name1)) {
                                    if (($extension1=='jpg'||$extension1=='jpeg') && ($type1=='image/jpeg') && $size1<=$max_size) {
                                      $q = $quest."-".$name1;
                                      if (move_uploaded_file($tmp_name1, $location.$q)) {
                                      }else{
                                        echo "There was an error.";
                                      }
                                    }else{
                                      echo "File must be jpg/jpeg and must be 2mb or less.";
                                    }
                                  }else{
                                  }
                                    
                                }

                                $class->multisave($syllabus_id,$tq_id,$ttype,$q ,$d,$f);
                               } 
                            ?>
                            </div>                  
                        </form>
                        <div class="col-lg-12" style="overflow-y:scroll; overflow-x:hidden; height:340px;">
                        <table class="table table-bordered">
                          <?php 
                          $class->showtest($tq_id, "Multiple Choice"); 
                          ?>
                        </table>
                        </div>
                      </div>
                      <div class="tab-pane " id="toftab">
                        <form method="post" enctype="multipart/form-data">
                        <br>
                        <div class="row">
                          <div class="col-lg-12">
                            <table>
                              <tr>
                                <td>
                                  <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;
                                </td>
                                <td>
                                    &nbsp; Test &nbsp;
                                </td>
                                <td>
                                <?php
                                  $class->loaddb();
                                  $querytntof = "SELECT test_number.test_number FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id WHERE question_type.question_type_name = 'True or False' AND tq.tq_id = $tq_id ";
                                   $resulttntof=mysql_query($querytntof) or die("Query Failed : ".mysql_error());
                                  if(mysql_num_rows($resulttntof)==0){
                                    $querytntof2 = "SELECT test_number.test_number FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id WHERE tq.tq_id = $tq_id ORDER BY test_number.test_number ASC";
                                    $resulttntof2=mysql_query($querytntof2) or die("Query Failed : ".mysql_error());
                                    if (mysql_num_rows($resulttntof2)==0) {
                                      $tntof=1;
                                    }else{
                                      while($rows=mysql_fetch_array($resulttntof2)){
                                        $tntof=$rows['test_number'];
                                     }
                                      $tntof++;
                                    }
                                  }else{
                                    while($rows=mysql_fetch_array($resulttntof)){
                                    $tntof=$rows['test_number'];
                                     }
                                   }
                                   $class->sqlclose();
                                   ?>
                                  <select class="form-control input-xs" name="toftn" required>
                                  <option value="<?php echo $tntof;?>">
                                  <?php echo $tntof;?></option>
                                  </select>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">Direction</span>
                              <textarea name="tofdirect" placeholder="Enter direction ..." style="width: 100%; height: 30px"></textarea>
                              <span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="directionfile"></span></span>
                            </div>
                          </div>
                        </div>
                        <br>
                        
                              <div class="row">
                                <div class="col-xs-1">
                                No.
                                </div>
                                <div class="col-xs-2">
                                  <?php 
                                  $class->loaddb();
                                  $querytofnum = "SELECT testquestions.number FROM testquestions INNER JOIN test_number ON testquestions.test_id = test_number.test_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id INNER JOIN tq ON tq.tq_id = test_number.tq_id INNER JOIN major_exams ON major_exams.exam_id = tq.exam_id WHERE question_type.question_type_name = 'True or False' AND tq.exam_id = '".$period."' AND tq.syllabus_id = '".$syllabus_id."'";
                                   $resulttofnum=mysql_query($querytofnum) or die("Query Failed : ".mysql_error());
                                   $n=0;
                                  if(!$resulttofnum){
                                    $tofnum[$n]=1;
                                  }else{
                                    while($rows=mysql_fetch_array($resulttofnum)){
                                    $tofnum[$n]=$rows['number'];
                                    $n++;
                                     }
                                     $tofnum[$n]=$n+1;
                                   }
                                   $total_elmttofnum=count($tofnum);
                                   $class->sqlclose();
                                   ?>
                                  <select class="form-control input-xs" name="tofnumbers" onchange="getval2(this,'True or False',<?php echo $tq_id; ?>);" required>
                                  <option></option>
                                  <?php 
                                    for($j=0;$j<$total_elmttofnum;$j++){ 
                                  ?><option value="<?php echo $tofnum[$j];?>">
                                  <?php echo $tofnum[$j];?></option><?php
                                  }?>
                                  </select>
                                </div>
                              </div>
                                <br>
                                <div class="row">
                                  <div class="col-xs-12">
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Question</span><textarea  name="tofquestion" id="tofquestionid" placeholder="Enter question ..." style="width: 100%; height: 30px" required></textarea><span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="questionfile"></span></span>
                                  </div>
                                  <div id="resulttofquestion">
                                  </div>
                                </div>
                              </div>
                                <br>
                                <div class="row">
                                  <div class="col-xs-4">
                                    <label for="topic">Topic</label>
                                    <?php 
                                    $class->loaddb();
                                    $querytopic = "SELECT * FROM topics WHERE topics.syllabus_id = $syllabus_id AND (topics.exam_id = $period OR topics.exam_id = 1 OR topics.exam_id = 2)";
                                     $resulttopics=mysql_query($querytopic) or die("Query Failed : ".mysql_error());
                                    if(!$resulttopics){
                                    }else{
                                      $i=0;
                                      while($rows=mysql_fetch_array($resulttopics)){ 
                                      $topicsroll[$i]=$rows['topic_description'];
                                      $topicsroll2[$i]=$rows['topics_id'];
                                      $i++;
                                       }
                                     }
                                     $total_elmttopic=count($topicsroll);
                                     $class->sqlclose();
                                     ?>
                                    <select class="form-control input-xs toftopics" name="toftopics" id="toftopics" required>
                                    <option></option>
                                    <?php 
                                      for($j=0;$j<$total_elmttopic;$j++){ 
                                    ?><option value="<?php echo $topicsroll2[$j];?>">
                                    <?php echo $topicsroll[$j];?></option><?php
                                    }?>
                                    </select>
                                  </div>
                                  <div class="col-xs-4">
                                    <label name="" for="tofcognitive">Cognitive Domain</label>
                                    <select class="form-control tofcognitive" name="tofcognitive" id="tofcognitive" required>
                                      <option></option>
                                      <option value="1">Knowledge</option>
                                      <option value="2">Comprehension</option>
                                      <option value="3">Application</option>
                                      <option value="4">Analysis</option>
                                      <option value="5">Evaluation</option>
                                      <option value="6">Synthesis</option>
                                    </select>
                                  </div>
                                  <div class="col-xs-4">
                                    <label for="usr">Points</label>
                                    <select class="form-control" name="tofpoints" id="tofpoints" required>
                                      <option></option>
                                      <?php for ($i=1; $i <= 100; $i++) { 
                                        echo "<option value=".$i.">".$i."</option>";
                                      } ?>
                                    </select>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-xs-12">
                                    <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1"> Answer</span>
                                      <select class="form-control" name="tofanswer" id="tofanswer" required>
                                        <option value=""></option>
                                        <option value="True">True</option>
                                        <option value="False">False</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <br>
                          <div class="col-xs-12">
                            <button type="submit" class="pull-right btn btn-default" name="tofsave">
                          <i class="glyphicon glyphicon-floppy-save"></i> Save </button>
                          <?php 
                          if (isset($_POST['tofsave'])){
                              $location = 'uploads/';
                              $max_size = 20000000;
                              $ttype = "True or False";
                              $quest = rand();
                              $name1 = $_FILES['questionfile']['name'];
                              $extension1 = strtolower(substr($name1, strpos($name1, '.')+1));
                              $size1 = $_FILES['questionfile']['size'];
                              $type1 = $_FILES['questionfile']['type'];
                              $tmp_name1 = $_FILES['questionfile']['tmp_name'];
                              $q="";

                              $direct = rand();
                              $name2 = $_FILES['directionfile']['name'];
                              $extension2 = strtolower(substr($name2, strpos($name2, '.')+1));
                              $size2 = $_FILES['directionfile']['size'];
                              $type2 = $_FILES['directionfile']['type'];
                              $tmp_name2 = $_FILES['directionfile']['tmp_name'];
                              $d="";

                              if (isset($name2)) {
                                if (!empty($name2)) {
                                  if (($extension2=='jpg'||$extension2=='jpeg') && ($type2=='image/jpeg') && $size2<=$max_size) {
                                    $d = $direct."-".$name2;
                                    if (move_uploaded_file($tmp_name2, $location.$d)) {
                                    }else{
                                      echo "There was an error.";
                                    }
                                  }else{
                                    echo "File must be jpg/jpeg and must be 2mb or less.";
                                  }
                                }else{
                                }
                                  
                              }
                              if (isset($name1)) {
                                if (!empty($name1)) {
                                  if (($extension1=='jpg'||$extension1=='jpeg') && ($type1=='image/jpeg') && $size1<=$max_size) {
                                    $q = $quest."-".$name1;
                                    if (move_uploaded_file($tmp_name1, $location.$q)) {
                                    }else{
                                      echo "There was an error.";
                                    }
                                  }else{
                                    echo "File must be jpg/jpeg and must be 2mb or less.";
                                  }
                                }else{
                                }
                                  
                              }
                              $class->savetof($syllabus_id,$tq_id,$ttype,$q ,$d);
                             } 
                          ?>
                          </div>
                        </form>
                      <div class="col-lg-12" style="overflow-y:scroll; overflow-x:hidden; height:340px;">
                        <table class="table table-bordered">
                          <?php 
                          $class->showtest($tq_id, "True or False"); 
                          ?>
                        </table>
                      </div>
                      </div>
                      <div class="tab-pane " id="matchtab">
                        <form method="post" enctype="multipart/form-data">
                          <br>
                          <div class="row">
                            <div class="col-lg-12">
                              <table>
                                <tr>
                                  <td>
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;
                                  </td>
                                  <td>
                                      &nbsp; Test &nbsp;
                                  </td>
                                  <td>
                                  <?php
                                    $class->loaddb();
                                    $querytnmatch = "SELECT test_number.test_number FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id WHERE question_type.question_type_name = 'Matching Type' AND tq.tq_id = $tq_id ";
                                     $resulttnmatch=mysql_query($querytnmatch) or die("Query Failed : ".mysql_error());
                                    if(mysql_num_rows($resulttnmatch)==0){
                                      $querytnmatch2 = "SELECT test_number.test_number FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id WHERE tq.tq_id = $tq_id ORDER BY test_number.test_number ASC";
                                      $resulttnmatch2=mysql_query($querytnmatch2) or die("Query Failed : ".mysql_error());
                                      if (mysql_num_rows($resulttnmatch2)==0) {
                                        $tnmatch=1;
                                      }else{
                                        while($rows=mysql_fetch_array($resulttnmatch2)){
                                          $tnmatch=$rows['test_number'];
                                       }
                                        $tnmatch++;
                                      }
                                    }else{
                                      while($rows=mysql_fetch_array($resulttnmatch)){
                                      $tnmatch=$rows['test_number'];
                                       }
                                     }
                                     $class->sqlclose();
                                     ?>
                                    <select class="form-control input-xs" name="matchtn" required>
                                    <option value="<?php echo $tnmatch;?>">
                                    <?php echo $tnmatch;?></option>
                                    </select>
                                  </td>
                                </tr>
                              </table>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Direction</span>
                                <textarea name="matchdirect" placeholder="Enter direction ..." style="width: 100%; height: 30px"></textarea>
                              <span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="directionfile"></span></span>
                              </div>
                            </div>
                          </div>
                          <br>
                          
                                <div class="row">
                                  <div class="col-xs-1">
                                    No.
                                  </div>
                                  <div class="col-xs-2">
                                   <?php 
                                  $class->loaddb();
                                  $querymatchnum = "SELECT testquestions.number FROM testquestions INNER JOIN test_number ON testquestions.test_id = test_number.test_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id INNER JOIN tq ON tq.tq_id = test_number.tq_id INNER JOIN major_exams ON major_exams.exam_id = tq.exam_id WHERE question_type.question_type_name = 'Matching Type' AND tq.exam_id = '".$period."' AND tq.syllabus_id = '".$syllabus_id."'";
                                   $resultmatchnum=mysql_query($querymatchnum) or die("Query Failed : ".mysql_error());
                                   $m=0;
                                  if(!$resultmatchnum){
                                    $matchnum[$m]=1;
                                  }else{
                                    while($rows=mysql_fetch_array($resultmatchnum)){
                                    $matchnum[$m]=$rows['number'];
                                    $m++;
                                     }
                                     $matchnum[$m]=$m+1;
                                   }
                                   $total_elmtmatchnum=count($matchnum);
                                   $class->sqlclose();
                                   ?>
                                  <select class="form-control input-xs" name="matchnumbers" onchange="getval3(this,'Matching Type',<?php echo $tq_id; ?>);" required>
                                  <option></option>
                                  <?php 
                                    for($j=0;$j<$total_elmtmatchnum;$j++){ 
                                  ?><option value="<?php echo $matchnum[$j];?>">
                                  <?php echo $matchnum[$j];?></option><?php
                                  }?>
                                    </select>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-xs-12">
                                    <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1">Question</span><textarea  name="matchquestion" id="matchquestionid" placeholder="Enter question ..." style="width: 100%; height: 30px" required></textarea><span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="questionfile"></span></span>
                                    </div>
                                    <div id="resultmatchquestion">
                                  </div>
                                  </div>
                                </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-xs-4">
                                      <label for="topic">Topic</label>
                                      <?php 
                                      $class->loaddb();
                                      $querytopic = "SELECT * FROM topics WHERE topics.syllabus_id = $syllabus_id AND (topics.exam_id = $period OR topics.exam_id = 1 OR topics.exam_id = 2)";
                                       $resulttopics=mysql_query($querytopic) or die("Query Failed : ".mysql_error());
                                      if(!$resulttopics){
                                      }else{
                                        $i=0;
                                        while($rows=mysql_fetch_array($resulttopics)){
                                        $topicsroll[$i]=$rows['topic_description'];
                                        $topicsroll2[$i]=$rows['topics_id'];
                                        $i++;
                                         }
                                       }
                                       $total_elmttopic=count($topicsroll);
                                       $class->sqlclose();
                                       ?>
                                      <select class="form-control input-xs matchtopics" name="matchtopics" id="matchtopics" required>
                                      <option></option>
                                      <?php 
                                        for($j=0;$j<$total_elmttopic;$j++){ 
                                      ?><option value="<?php echo $topicsroll2[$j];?>">
                                      <?php echo $topicsroll[$j];?></option><?php
                                      }?>
                                      </select>
                                    </div>
                                    <div class="col-xs-4">
                                      <label name="" for="matchcognitive">Cognitive Domain</label>
                                      <select class="form-control matchcognitive" name="matchcognitive" id="matchcognitive" required>
                                        <option></option>
                                        <option value="1">Knowledge</option>
                                        <option value="2">Comprehension</option>
                                        <option value="3">Application</option>
                                        <option value="4">Analysis</option>
                                        <option value="5">Evaluation</option>
                                        <option value="6">Synthesis</option>
                                      </select>
                                    </div>
                                    <div class="col-xs-4">
                                      <label for="usr">Points</label>
                                      <select class="form-control" name="matchpoints" id="matchpoints" required>
                                        <option></option>
                                        <?php for ($i=1; $i <= 100; $i++) { 
                                          echo "<option value=".$i.">".$i."</option>";
                                        } ?>
                                      </select>
                                    </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                  <div class="col-xs-12">
                                    <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1"> Answer</span>
                                      <textarea name="matchanswer" id="matchanswer" placeholder="Enter answer ..." style="width: 100%; height: 30px"></textarea><span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="answerfile"></span></span>
                                    </div>
                                  </div>
                                </div>
                                  <br>
                            <div class="col-xs-12">
                              <button type="submit" class="pull-right btn btn-default" name="matchsave">
                            <i class="glyphicon glyphicon-floppy-save"></i> Save </button>
                            <?php 
                            if (isset($_POST['matchsave'])){
                                $location = 'uploads/';
                                $max_size = 20000000;
                                $ttype = "Matching Type";
                                $quest = rand();
                                $name1 = $_FILES['questionfile']['name'];
                                $extension1 = strtolower(substr($name1, strpos($name1, '.')+1));
                                $size1 = $_FILES['questionfile']['size'];
                                $type1 = $_FILES['questionfile']['type'];
                                $tmp_name1 = $_FILES['questionfile']['tmp_name'];
                                $q="";

                                $direct = rand();
                                $name2 = $_FILES['directionfile']['name'];
                                $extension2 = strtolower(substr($name2, strpos($name2, '.')+1));
                                $size2 = $_FILES['directionfile']['size'];
                                $type2 = $_FILES['directionfile']['type'];
                                $tmp_name2 = $_FILES['directionfile']['tmp_name'];
                                $d="";

                                $answer = rand();
                                $name3 = $_FILES['answerfile']['name'];
                                $extension3 = strtolower(substr($name3, strpos($name3, '.')+1));
                                $size3 = $_FILES['answerfile']['size'];
                                $type3 = $_FILES['answerfile']['type'];
                                $tmp_name3 = $_FILES['answerfile']['tmp_name'];
                                $f="";

                                if (isset($name3)) {
                                  if (!empty($name3)) {
                                    if (($extension3=='jpg'||$extension3=='jpeg') && ($type3=='image/jpeg') && $size3<=$max_size) {
                                      $f = $quest."-".$name3;
                                      if (move_uploaded_file($tmp_name3, $location.$f)) {
                                      }else{
                                        echo "There was an error.";
                                      }
                                    }else{
                                      echo "File must be jpg/jpeg and must be 2mb or less.";
                                    }
                                  }else{
                                  }
                                    
                                }

                                if (isset($name2)) {
                                  if (!empty($name2)) {
                                    if (($extension2=='jpg'||$extension2=='jpeg') && ($type2=='image/jpeg') && $size2<=$max_size) {
                                      $d = $direct."-".$name2;
                                      if (move_uploaded_file($tmp_name2, $location.$d)) {
                                      }else{
                                        echo "There was an error.";
                                      }
                                    }else{
                                      echo "File must be jpg/jpeg and must be 2mb or less.";
                                    }
                                  }else{
                                  }
                                    
                                }
                                if (isset($name1)) {
                                  if (!empty($name1)) {
                                    if (($extension1=='jpg'||$extension1=='jpeg') && ($type1=='image/jpeg') && $size1<=$max_size) {
                                      $q = $quest."-".$name1;
                                      if (move_uploaded_file($tmp_name1, $location.$q)) {
                                      }else{
                                        echo "There was an error.";
                                      }
                                    }else{
                                      echo "File must be jpg/jpeg and must be 2mb or less.";
                                    }
                                  }else{
                                  }
                                    
                                }

                                $class->matchsave($syllabus_id,$tq_id,$ttype,$q ,$d, $f);
                               } 
                            ?>
                            </div>    
                        </form>
                        <div class="col-lg-12" style="overflow-y:scroll; overflow-x:hidden; height:340px;">
                        <table class="table table-bordered">
                          <?php 
                          $class->showtest($tq_id, "Matching Type"); 
                          ?>
                        </table>
                        </div>
                      </div>
                      <div class="tab-pane " id="probtab">
                        <form method="post" enctype="multipart/form-data">
                          <br>
                          <div class="row">
                            <div class="col-lg-12">
                              <table>
                                <tr>
                                  <td>
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;
                                  </td>
                                  <td>
                                      &nbsp; Test &nbsp;
                                  </td>
                                  <td>
                                  <?php
                                    $class->loaddb();
                                    $querytnprob = "SELECT test_number.test_number FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id WHERE question_type.question_type_name = 'Problem Solving' AND tq.tq_id = $tq_id ";
                                     $resulttnprob=mysql_query($querytnprob) or die("Query Failed : ".mysql_error());
                                    if(mysql_num_rows($resulttnprob)==0){
                                      $querytnprob2 = "SELECT test_number.test_number FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id WHERE tq.tq_id = $tq_id ORDER BY test_number.test_number ASC";
                                      $resulttnprob2=mysql_query($querytnprob2) or die("Query Failed : ".mysql_error());
                                      if (mysql_num_rows($resulttnprob2)==0) {
                                        $tnprob=1;
                                      }else{
                                        while($rows=mysql_fetch_array($resulttnprob2)){
                                          $tnprob=$rows['test_number'];
                                       }
                                        $tnprob++;
                                      }
                                    }else{
                                      while($rows=mysql_fetch_array($resulttnprob)){
                                      $tnprob=$rows['test_number'];
                                       }
                                     }
                                     $class->sqlclose();
                                     ?>
                                    <select class="form-control input-xs" name="probtn">
                                    <option value="<?php echo $tnprob;?>">
                                    <?php echo $tnprob;?></option>
                                    </select>
                                  </td>
                                </tr>
                              </table>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Direction</span>
                                <textarea name="probdirect" placeholder="Enter direction ..." style="width: 100%; height: 30px"></textarea>
                              <span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="directionfile"></span></span>
                              </div>
                            </div>
                          </div>
                          <br>
                          
                                <div class="row">
                                  <div class="col-xs-1">
                                    No.
                                  </div>
                                  <div class="col-xs-2">
                                    <?php 
                                    $class->loaddb();
                                    $queryprobnum = "SELECT testquestions.number FROM testquestions INNER JOIN test_number ON testquestions.test_id = test_number.test_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id INNER JOIN tq ON tq.tq_id = test_number.tq_id INNER JOIN major_exams ON major_exams.exam_id = tq.exam_id WHERE question_type.question_type_name = 'Problem Solving' AND tq.exam_id = '".$period."' AND tq.syllabus_id = '".$syllabus_id."'";
                                     $resultprobnum=mysql_query($queryprobnum) or die("Query Failed : ".mysql_error());
                                    if(!$resultprobnum){
                                      $probnum[0]=1;
                                    }else{
                                      $i=0;
                                      while($rows=mysql_fetch_array($resultprobnum)){
                                      $probnum[$i]=$rows['number'];
                                      $i++;
                                       }
                                       $probnum[$i]=$i+1;
                                     }
                                     $total_elmtprobnum=count($probnum);
                                     $class->sqlclose();
                                     ?>
                                    <select class="form-control input-xs" name="probnumbers" onchange="getval4(this,'Problem Solving',<?php echo $tq_id; ?>);" required>
                                    <option></option>
                                    <?php 
                                      for($j=0;$j<$total_elmtprobnum;$j++){ 
                                    ?><option value="<?php echo $probnum[$j];?>">
                                    <?php echo $probnum[$j];?></option><?php
                                    }?>
                                    </select>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-xs-12">
                                    <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1">Question</span><textarea  name="probquestion" id="probquestionid" placeholder="Enter question ..." style="width: 100%; height: 30px" required></textarea><span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="questionfile"></span></span>
                                    </div>
                                    <div id="resultprobquestion">
                                    </div>
                                  </div>
                                </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-xs-4">
                                      <label for="topic">Topic</label>
                                      <?php 
                                      $class->loaddb();
                                      $querytopic = "SELECT * FROM topics WHERE topics.syllabus_id = $syllabus_id AND (topics.exam_id = $period OR topics.exam_id = 1 OR topics.exam_id = 2)";
                                       $resulttopics=mysql_query($querytopic) or die("Query Failed : ".mysql_error());
                                      if(!$resulttopics){
                                      }else{
                                        $i=0;
                                        while($rows=mysql_fetch_array($resulttopics)){
                                        $topicsroll[$i]=$rows['topic_description'];
                                        $topicsroll2[$i]=$rows['topics_id'];
                                        $i++;
                                         }
                                       }
                                       $total_elmttopic=count($topicsroll);
                                       $class->sqlclose();
                                       ?>
                                      <select class="form-control input-xs probtopics" name="probtopics" id="probtopics" required>
                                      <option></option>
                                      <?php 
                                        for($j=0;$j<$total_elmttopic;$j++){ 
                                      ?><option value="<?php echo $topicsroll2[$j];?>">
                                      <?php echo $topicsroll[$j];?></option><?php
                                      }?>
                                      </select>
                                    </div>
                                    <div class="col-xs-4">
                                      <label name="" for="probcognitive">Cognitive Domain</label>
                                      <select class="form-control probcognitive" name="probcognitive" id="probcognitive" required>
                                        <option></option>
                                        <option value="1">Knowledge</option>
                                        <option value="2">Comprehension</option>
                                        <option value="3">Application</option>
                                        <option value="4">Analysis</option>
                                        <option value="5">Evaluation</option>
                                        <option value="6">Synthesis</option>
                                      </select>
                                    </div>
                                    <div class="col-xs-4">
                                      <label for="usr">Points</label>
                                      <select class="form-control" name="probpoints" id="probpoints" required>
                                        <option></option>
                                        <?php for ($i=1; $i <= 100; $i++) { 
                                          echo "<option value=".$i.">".$i."</option>";
                                        } ?>
                                      </select>
                                    </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                  <div class="col-xs-12">
                                    <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1"> Answer</span>
                                      <textarea name="probanswer" id="probanswer" placeholder="Enter answer ..." style="width: 100%; height: 30px"></textarea><span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="answerfile"></span></span>
                                    </div>
                                  </div>
                                </div>
                                  <br>
                                
                            <div class="col-xs-12">
                              <button type="submit" class="pull-right btn btn-default" name="probsave">
                            <i class="glyphicon glyphicon-floppy-save"></i> Save </button>
                            <?php 
                            if (isset($_POST['probsave'])){
                                $location = 'uploads/';
                                $max_size = 20000000;
                                $ttype = "Problem Solving";
                                $quest = rand();
                                $name1 = $_FILES['questionfile']['name'];
                                $extension1 = strtolower(substr($name1, strpos($name1, '.')+1));
                                $size1 = $_FILES['questionfile']['size'];
                                $type1 = $_FILES['questionfile']['type'];
                                $tmp_name1 = $_FILES['questionfile']['tmp_name'];
                                $q="";

                                $direct = rand();
                                $name2 = $_FILES['directionfile']['name'];
                                $extension2 = strtolower(substr($name2, strpos($name2, '.')+1));
                                $size2 = $_FILES['directionfile']['size'];
                                $type2 = $_FILES['directionfile']['type'];
                                $tmp_name2 = $_FILES['directionfile']['tmp_name'];
                                $d="";

                              $answer = rand();
                              $name3 = $_FILES['answerfile']['name'];
                              $extension3 = strtolower(substr($name3, strpos($name3, '.')+1));
                              $size3 = $_FILES['answerfile']['size'];
                              $type3 = $_FILES['answerfile']['type'];
                              $tmp_name3 = $_FILES['answerfile']['tmp_name'];
                              $f="";

                              if (isset($name3)) {
                                if (!empty($name3)) {
                                  if (($extension3=='jpg'||$extension3=='jpeg') && ($type3=='image/jpeg') && $size3<=$max_size) {
                                    $f = $quest."-".$name3;
                                    if (move_uploaded_file($tmp_name3, $location.$f)) {
                                    }else{
                                      echo "There was an error.";
                                    }
                                  }else{
                                    echo "File must be jpg/jpeg and must be 2mb or less.";
                                  }
                                }else{
                                }
                                  
                              }

                                if (isset($name2)) {
                                  if (!empty($name2)) {
                                    if (($extension2=='jpg'||$extension2=='jpeg') && ($type2=='image/jpeg') && $size2<=$max_size) {
                                      $d = $direct."-".$name2;
                                      if (move_uploaded_file($tmp_name2, $location.$d)) {
                                      }else{
                                        echo "There was an error.";
                                      }
                                    }else{
                                      echo "File must be jpg/jpeg and must be 2mb or less.";
                                    }
                                  }else{
                                  }
                                    
                                }
                                if (isset($name1)) {
                                  if (!empty($name1)) {
                                    if (($extension1=='jpg'||$extension1=='jpeg') && ($type1=='image/jpeg') && $size1<=$max_size) {
                                      $q = $quest."-".$name1;
                                      if (move_uploaded_file($tmp_name1, $location.$q)) {
                                      }else{
                                        echo "There was an error.";
                                      }
                                    }else{
                                      echo "File must be jpg/jpeg and must be 2mb or less.";
                                    }
                                  }else{
                                  }
                                    
                                }
                               

                                $class->probsave($syllabus_id,$tq_id,$ttype,$q , $d, $f);
                               } 
                            ?>
                            </div>
                        </form>
                        <div class="col-lg-12" style="overflow-y:scroll; overflow-x:hidden; height:340px;">
                        <table class="table table-bordered">
                          <?php 
                          $class->showtest($tq_id, "Problem Solving"); 
                          ?>
                        </table>
                      </div>
                      </div>
                      <div class="tab-pane " id="essaytab">
                        <form method="post" enctype="multipart/form-data">
                         <br>
                          <div class="row">
                            <div class="col-lg-12">
                              <table>
                                <tr>
                                  <td>
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;
                                  </td>
                                  <td>
                                      &nbsp; Test &nbsp;
                                  </td>
                                  <td>
                                  <?php
                                    $class->loaddb();
                                    $querytnessay = "SELECT test_number.test_number FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id WHERE question_type.question_type_name = 'Essay' AND tq.tq_id = $tq_id ";
                                     $resulttnessay=mysql_query($querytnessay) or die("Query Failed : ".mysql_error());
                                    if(mysql_num_rows($resulttnessay)==0){
                                      $querytnessay2 = "SELECT test_number.test_number FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id WHERE tq.tq_id = $tq_id ORDER BY test_number.test_number ASC";
                                      $resulttnessay2=mysql_query($querytnessay2) or die("Query Failed : ".mysql_error());
                                      if (mysql_num_rows($resulttnessay2)==0) {
                                        $tnessay=1;
                                      }else{
                                        while($rows=mysql_fetch_array($resulttnessay2)){
                                          $tnessay=$rows['test_number'];
                                       }
                                        $tnessay++;
                                      }
                                    }else{
                                      while($rows=mysql_fetch_array($resulttnessay)){
                                      $tnessay=$rows['test_number'];
                                       }
                                     }
                                     $class->sqlclose();
                                     ?>
                                    <select class="form-control input-xs" name="essaytn" required>
                                    <option value="<?php echo $tnessay;?>">
                                    <?php echo $tnessay;?></option>
                                    </select>
                                  </td>
                                </tr>
                              </table>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Direction</span>
                                <textarea name="essaydirect" placeholder="Enter direction ..." style="width: 100%; height: 30px"></textarea>
                              <span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="directionfile"></span></span>
                              </div>
                            </div>
                          </div>
                          <br>
                          
                                <div class="row">
                                  <div class="col-xs-1">
                                    No.
                                  </div>
                                  <div class="col-xs-2">
                                    <?php 
                                    $class->loaddb();
                                    $queryessaynum = "SELECT testquestions.number FROM testquestions INNER JOIN test_number ON testquestions.test_id = test_number.test_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id INNER JOIN tq ON tq.tq_id = test_number.tq_id INNER JOIN major_exams ON major_exams.exam_id = tq.exam_id WHERE question_type.question_type_name = 'Essay' AND tq.exam_id = '".$period."' AND tq.syllabus_id = '".$syllabus_id."'";
                                     $resultessaynum=mysql_query($queryessaynum) or die("Query Failed : ".mysql_error());
                                    if(!$resultessaynum){
                                      $essaynum[0]=1;
                                    }else{
                                      $i=0;
                                      while($rows=mysql_fetch_array($resultessaynum)){
                                      $essaynum[$i]=$rows['number'];
                                      $i++;
                                       }
                                       $essaynum[$i]=$i+1;
                                     }
                                     $total_elmtessaynum=count($essaynum);
                                     $class->sqlclose();
                                     ?>
                                    <select class="form-control input-xs" name="essaynumbers" onchange="getval5(this,'Essay',<?php echo $tq_id; ?>);" required>
                                    <option></option>
                                    <?php 
                                      for($j=0;$j<$total_elmtessaynum;$j++){ 
                                    ?><option value="<?php echo $essaynum[$j];?>">
                                    <?php echo $essaynum[$j];?></option><?php
                                    }?>
                                    </select>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-xs-12">
                                    <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1">Question</span><textarea  name="essayquestion" id="essayquestionid" placeholder="Enter question ..." style="width: 100%; height: 30px" required></textarea><span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="questionfile"></span></span>
                                    </div>
                                    <div id="resultessayquestion">
                                    </div>
                                  </div>
                                </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-xs-4">
                                      <label for="topic">Topic</label>
                                      <?php 
                                      $class->loaddb();
                                      $querytopic = "SELECT * FROM topics WHERE topics.syllabus_id = $syllabus_id AND (topics.exam_id = $period OR topics.exam_id = 1 OR topics.exam_id = 2)";
                                       $resulttopics=mysql_query($querytopic) or die("Query Failed : ".mysql_error());
                                      if(!$resulttopics){
                                      }else{
                                        $i=0;
                                        while($rows=mysql_fetch_array($resulttopics)){
                                        $topicsroll[$i]=$rows['topic_description'];
                                        $topicsroll2[$i]=$rows['topics_id'];
                                        $i++;
                                         }
                                       }
                                       $total_elmttopic=count($topicsroll);
                                       $class->sqlclose();
                                       ?>
                                      <select class="form-control input-xs essaytopics" name="essaytopics" id="essaytopics" required>
                                      <option></option>
                                      <?php 
                                        for($j=0;$j<$total_elmttopic;$j++){ 
                                      ?><option value="<?php echo $topicsroll2[$j];?>">
                                      <?php echo $topicsroll[$j];?></option><?php
                                      }?>
                                      </select>
                                    </div>
                                    <div class="col-xs-4">
                                      <label name="" for="essaycognitive">Cognitive Domain</label>
                                      <select class="form-control essaycognitive" name="essaycognitive" id="essaycognitive" required>
                                        <option></option>
                                        <option value="1">Knowledge</option>
                                        <option value="2">Comprehension</option>
                                        <option value="3">Application</option>
                                        <option value="4">Analysis</option>
                                        <option value="5">Evaluation</option>
                                        <option value="6">Synthesis</option>
                                      </select>
                                    </div>
                                    <div class="col-xs-4">
                                      <label for="usr">Points</label>
                                      <select class="form-control" name="essaypoints" id="essaypoints" required>
                                        <option></option>
                                        <?php for ($i=1; $i <= 100; $i++) { 
                                          echo "<option value=".$i.">".$i."</option>";
                                        } ?>
                                      </select>
                                    </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                  <div class="col-xs-12">
                                    <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1"> Answer</span>
                                      <textarea name="essayanswer" id="essayanswer" placeholder="Enter answer ..." style="width: 100%; height: 30px"></textarea><span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="answerfile"></span></span>
                                    </div>
                                  </div>
                                </div>
                                  <br>
                            <div class="col-xs-12">
                              <button type="submit" class="pull-right btn btn-default" name="essaysave">
                            <i class="glyphicon glyphicon-floppy-save"></i> Save </button>
                            <?php 
                            if (isset($_POST['essaysave'])){
                                $location = 'uploads/';
                                $max_size = 20000000;
                                $ttype = "Essay";
                                $quest = rand();
                                $name1 = $_FILES['questionfile']['name'];
                                $extension1 = strtolower(substr($name1, strpos($name1, '.')+1));
                                $size1 = $_FILES['questionfile']['size'];
                                $type1 = $_FILES['questionfile']['type'];
                                $tmp_name1 = $_FILES['questionfile']['tmp_name'];
                                $q="";

                                $direct = rand();
                                $name2 = $_FILES['directionfile']['name'];
                                $extension2 = strtolower(substr($name2, strpos($name2, '.')+1));
                                $size2 = $_FILES['directionfile']['size'];
                                $type2 = $_FILES['directionfile']['type'];
                                $tmp_name2 = $_FILES['directionfile']['tmp_name'];
                                $d="";

                              $answer = rand();
                              $name3 = $_FILES['answerfile']['name'];
                              $extension3 = strtolower(substr($name3, strpos($name3, '.')+1));
                              $size3 = $_FILES['answerfile']['size'];
                              $type3 = $_FILES['answerfile']['type'];
                              $tmp_name3 = $_FILES['answerfile']['tmp_name'];
                              $f="";

                              if (isset($name3)) {
                                if (!empty($name3)) {
                                  if (($extension3=='jpg'||$extension3=='jpeg') && ($type3=='image/jpeg') && $size3<=$max_size) {
                                    $f = $quest."-".$name3;
                                    if (move_uploaded_file($tmp_name3, $location.$f)) {
                                    }else{
                                      echo "There was an error.";
                                    }
                                  }else{
                                    echo "File must be jpg/jpeg and must be 2mb or less.";
                                  }
                                }else{
                                }
                                  
                              }

                                if (isset($name2)) {
                                  if (!empty($name2)) {
                                    if (($extension2=='jpg'||$extension2=='jpeg') && ($type2=='image/jpeg') && $size2<=$max_size) {
                                      $d = $direct."-".$name2;
                                      if (move_uploaded_file($tmp_name2, $location.$d)) {
                                      }else{
                                        echo "There was an error.";
                                      }
                                    }else{
                                      echo "File must be jpg/jpeg and must be 2mb or less.";
                                    }
                                  }else{
                                  }
                                    
                                }
                                if (isset($name1)) {
                                  if (!empty($name1)) {
                                    if (($extension1=='jpg'||$extension1=='jpeg') && ($type1=='image/jpeg') && $size1<=$max_size) {
                                      $q = $quest."-".$name1;
                                      if (move_uploaded_file($tmp_name1, $location.$q)) {
                                      }else{
                                        echo "There was an error.";
                                      }
                                    }else{
                                      echo "File must be jpg/jpeg and must be 2mb or less.";
                                    }
                                  }else{
                                  }
                                    
                                }

                                $class->essaysave($syllabus_id,$tq_id,$ttype,$q ,$d,$f);
                               } 
                            ?>
                            </div>
                        </form>
                        <div class="col-lg-12" style="overflow-y:scroll; overflow-x:hidden; height:340px;">
                        <table class="table table-bordered">
                          <?php 
                          $class->showtest($tq_id, "Essay"); 
                          ?>
                        </table>
                        </div>
                      </div>
                      <div class=" tab-pane " id="fitbtab">
                        <form method="post" enctype="multipart/form-data">
                          <br>
                          <div class="row">
                            <div class="col-lg-12">
                              <table>
                                <tr>
                                  <td>
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;
                                  </td>
                                  <td>
                                      &nbsp; Test &nbsp;
                                  </td>
                                  <td>
                                  <?php
                                    $class->loaddb();
                                    $querytnfitb = "SELECT test_number.test_number FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id WHERE question_type.question_type_name = 'Fill in the Blank' AND tq.tq_id = $tq_id ";
                                     $resulttnfitb=mysql_query($querytnfitb) or die("Query Failed : ".mysql_error());
                                    if(mysql_num_rows($resulttnfitb)==0){
                                      $querytnfitb2 = "SELECT test_number.test_number FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id WHERE tq.tq_id = $tq_id ORDER BY test_number.test_number ASC";
                                      $resulttnfitb2=mysql_query($querytnfitb2) or die("Query Failed : ".mysql_error());
                                      if (mysql_num_rows($resulttnfitb2)==0) {
                                        $tnfitb=1;
                                      }else{
                                        while($rows=mysql_fetch_array($resulttnfitb2)){
                                          $tnfitb=$rows['test_number'];
                                       }
                                        $tnfitb++;
                                      }
                                    }else{
                                      while($rows=mysql_fetch_array($resulttnfitb)){
                                      $tnfitb=$rows['test_number'];
                                       }
                                     }
                                     $class->sqlclose();
                                     ?>
                                    <select class="form-control input-xs" name="fitbtn" required>
                                    <option value="<?php echo $tnfitb;?>">
                                    <?php echo $tnfitb;?></option>
                                    </select>
                                  </td>
                                </tr>
                              </table>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Direction</span>
                                <textarea name="fitbdirect" placeholder="Enter direction ..." style="width: 100%; height: 30px"></textarea>
                              <span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="directionfile"></span></span>
                              </div>
                            </div>
                          </div>
                          <br>
                         
                                <div class="row">
                                  <div class="col-xs-1">
                                    No.
                                  </div>
                                  <div class="col-xs-2">
                                    <?php 
                                    $class->loaddb();
                                    $queryfitbnum = "SELECT testquestions.number FROM testquestions INNER JOIN test_number ON testquestions.test_id = test_number.test_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id INNER JOIN tq ON tq.tq_id = test_number.tq_id INNER JOIN major_exams ON major_exams.exam_id = tq.exam_id WHERE question_type.question_type_name = 'Fill in the Blank' AND tq.exam_id = '".$period."' AND tq.syllabus_id = '".$syllabus_id."'";
                                     $resultfitbnum=mysql_query($queryfitbnum) or die("Query Failed : ".mysql_error());
                                    if(!$resultfitbnum){
                                      $fitbnum[0]=1;
                                    }else{
                                      $i=0;
                                      while($rows=mysql_fetch_array($resultfitbnum)){
                                      $fitbnum[$i]=$rows['number'];
                                      $i++;
                                       }
                                       $fitbnum[$i]=$i+1;
                                     }
                                     $total_elmtfitbnum=count($fitbnum);
                                     $class->sqlclose();
                                     ?>
                                    <select class="form-control input-xs" name="fitbnumbers" onchange="getval6(this,'Fill in the Blank',<?php echo $tq_id; ?>);" required>
                                    <option></option>
                                    <?php 
                                      for($j=0;$j<$total_elmtfitbnum;$j++){ 
                                    ?><option value="<?php echo $fitbnum[$j];?>">
                                    <?php echo $fitbnum[$j];?></option><?php
                                    }?>
                                    </select>
                                  </div>
                                </div>
                                <br>
                                <div class="row">
                                  <div class="col-xs-12">
                                    <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1">Question</span><textarea  name="fitbquestion" id="fitbquestionid" placeholder="Enter question ..." style="width: 100%; height: 30px" required></textarea><span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="questionfile"></span></span>
                                    </div>
                                    <div id="resultfitbquestion">
                                    </div>
                                  </div>
                                </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-xs-4">
                                      <label for="topic">Topic</label>
                                      <?php 
                                      $class->loaddb();
                                      $querytopic = "SELECT * FROM topics WHERE topics.syllabus_id = $syllabus_id AND (topics.exam_id = $period OR topics.exam_id = 1 OR topics.exam_id = 2)";
                                       $resulttopics=mysql_query($querytopic) or die("Query Failed : ".mysql_error());
                                      if(!$resulttopics){
                                      }else{
                                        $i=0;
                                        while($rows=mysql_fetch_array($resulttopics)){
                                        $topicsroll[$i]=$rows['topic_description'];
                                        $topicsroll2[$i]=$rows['topics_id'];
                                        $i++;
                                         }
                                       }
                                       $total_elmttopic=count($topicsroll);
                                       $class->sqlclose();
                                       ?>
                                      <select class="form-control input-xs fitbtopics" name="fitbtopics" id="fitbtopics" required>
                                      <option></option>
                                      <?php 
                                        for($j=0;$j<$total_elmttopic;$j++){ 
                                      ?><option value="<?php echo $topicsroll2[$j];?>">
                                      <?php echo $topicsroll[$j];?></option><?php
                                      }?>
                                      </select>
                                    </div>
                                    <div class="col-xs-4">
                                      <label name="" for="fitbcognitive">Cognitive Domain</label>
                                      <select class="form-control fitbcognitive" name="fitbcognitive" id="fitbcognitive" required>
                                        <option></option>
                                        <option value="1">Knowledge</option>
                                        <option value="2">Comprehension</option>
                                        <option value="3">Application</option>
                                        <option value="4">Analysis</option>
                                        <option value="5">Evaluation</option>
                                        <option value="6">Synthesis</option>
                                      </select>
                                    </div>
                                    <div class="col-xs-4">
                                      <label for="usr">Points</label>
                                      <select class="form-control" name="fitbpoints" id="fitbpoints" required>
                                        <option></option>
                                        <?php for ($i=1; $i <= 100; $i++) { 
                                          echo "<option value=".$i.">".$i."</option>";
                                        } ?>
                                      </select>
                                    </div>
                                  </div>
                                  <br>
                                  <div class="row">
                                  <div class="col-xs-12">
                                    <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1"> Answer</span>
                                      <input type="text" name="fitbanswer" class="form-control" placeholder="Enter  Answer" id="fitbanswer" aria-describedby="basic-addon1" required>
                                    </div>
                                  </div>
                                </div>
                                  <br>
                               
                            <div class="col-xs-12">
                              <button type="submit" class="pull-right btn btn-default" name="fitbsave">
                            <i class="glyphicon glyphicon-floppy-save"></i> Save </button>
                            <?php 
                            if (isset($_POST['fitbsave'])){
                                $location = 'uploads/';
                                $max_size = 20000000;
                                $ttype = "Fill in the Blank";
                                $quest = rand();
                                $name1 = $_FILES['questionfile']['name'];
                                $extension1 = strtolower(substr($name1, strpos($name1, '.')+1));
                                $size1 = $_FILES['questionfile']['size'];
                                $type1 = $_FILES['questionfile']['type'];
                                $tmp_name1 = $_FILES['questionfile']['tmp_name'];
                                $q="";

                                $direct = rand();
                                $name2 = $_FILES['directionfile']['name'];
                                $extension2 = strtolower(substr($name2, strpos($name2, '.')+1));
                                $size2 = $_FILES['directionfile']['size'];
                                $type2 = $_FILES['directionfile']['type'];
                                $tmp_name2 = $_FILES['directionfile']['tmp_name'];
                                $d="";

                                if (isset($name2)) {
                                  if (!empty($name2)) {
                                    if (($extension2=='jpg'||$extension2=='jpeg') && ($type2=='image/jpeg') && $size2<=$max_size) {
                                      $d = $direct."-".$name2;
                                      if (move_uploaded_file($tmp_name2, $location.$d)) {
                                      }else{
                                        echo "There was an error.";
                                      }
                                    }else{
                                      echo "File must be jpg/jpeg and must be 2mb or less.";
                                    }
                                  }else{
                                  }
                                    
                                }
                                if (isset($name1)) {
                                  if (!empty($name1)) {
                                    if (($extension1=='jpg'||$extension1=='jpeg') && ($type1=='image/jpeg') && $size1<=$max_size) {
                                      $q = $quest."-".$name1;
                                      if (move_uploaded_file($tmp_name1, $location.$q)) {
                                      }else{
                                        echo "There was an error.";
                                      }
                                    }else{
                                      echo "File must be jpg/jpeg and must be 2mb or less.";
                                    }
                                  }else{
                                  }
                                    
                                }

                                $class->fitbsave($syllabus_id,$tq_id,$ttype,$q ,$d);
                               } 
                            ?>
                            </div>
                        </form>
                        <div class="col-lg-12" style="overflow-y:scroll; overflow-x:hidden; height:340px;">
                        <table class="table table-bordered">
                          <?php 
                          $class->showtest($tq_id, "Fill in the Blank"); 
                          ?>
                        </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="box-footer clearfix">
              <div class="row">
                <div class="col-md-6">
                  <button type="button" class="pull-right btn btn-primary" id="print" onclick="PrintPreview2(printableArea2)" style="width:90px;">
                  <i class="glyphicon glyphicon-search"></i> Remarks </button>
                </div>
                <div class="col-md-2">
                  <button type="button" class="pull-right btn btn-primary" id="print" onclick="PrintPreview(printableArea)" style="width:90px;">
                  <i class="glyphicon glyphicon-search"></i> Preview  </button>
                </div>
                <div class="col-md-2">
                  <button type="button" class="pull-right btn btn-primary" id="print" onclick="printDiv('printableArea3')" style="width:90px;">
                  <i class="fa fa-print"></i> Print </button>
                </div>
                <div class="col-xs-2">
                <form method="post">
                  <button type="submit" class="pull-right btn btn-success" name="submittoph" style="width:90px;">
                <i class="glyphicon glyphicon-floppy-save"></i> Submit </button>
                </form>
                <?php 
                if (isset($_POST['submittoph'])){
                  
                  $class->submitph($tq_id);
                } 
                ?>
                </div>
                <div  id="printableArea" style="display:none">
                  <?php include('previewtq.php'); ?>
                </div>
                <div  id="printableArea2" style="display:none">
                  <?php include('previewrem.php'); ?>
                </div>
                <div  id="printableArea3" style="display:none">
                  <?php include('printtqtemp.php'); ?>
                </div>
              </div>
            </div>
          </div>

        </section>

 <?php
include('tos.php'); 
?>
  </div>
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.4
    </div>
    <strong>Copyright &copy; 2016 <a href="#">ACLC</a>.</strong> All rights
    reserved.
  </footer>

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
  <script type="text/javascript">
function PrintPreview2() {
        var toPrint = document.getElementById('printableArea2');
        var popupWin = window.open('', '_blank', 'width=800,height=650,location=no,left=200px');
        popupWin.document.open();
        popupWin.document.write('<html><title>::Print Preview::</title></head><body">');
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');
        popupWin.document.close();
    }
  </script>
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="dist/js/jquery-ui.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script>
  $('#tqstored').dataTable();
  $('#qstored').dataTable();
</script>
<!-- jQuery UI 1.11.4 -->
<!-- <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script type="text/javascript">
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
  </script>
<script>  
  var multi_ans=1;
  var enuans=1;
function getval7(sel,tt,tq)
{
   val1=sel.value;   
   val2=tt;
   val3=tq;    
    $.ajax({
              type: "Post",
              data: {num: val1, tt: val2, tq_id: val3},
              url: "test2.php",
              dataType: "json",
              success: function(data) {
                    var question_desc;
                    var topics_id;
                    var cognitive_level_id;
                    var points;
                    var answer_desc;
                    var n;
                    var numItems = $('.enumcount').length;
                    if (numItems>0) {
                      for (var i = numItems; i > 0; i--) {
                        $('#enuansnum'+enuans+'').remove();
                        $('#enuanswer0').val(''); 
                        if (enuans>1) {
                          enuans--;
                        };
                      };
                    };
                    $.each(data , function(key , value) {
                        question_desc=this['question_desc'];
                        topics_id=this['topics_id'];
                        cognitive_level_id=this['cognitive_level_id'];
                        points=this['points'];
                        $.each(value.answer , function(k , v ){ 
                          if (k==0) {
                            answer_desc=v;
                            $("#enuanswer0").val(answer_desc);
                          };
                          if (k>0) {
                            answer_desc=v;
                            enuans++;
                            $('#answer1_field').append('<tr id="enuansnum'+enuans+'"><td><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Answer '+enuans+'.</span><input type="text" name="enuans['+enuans+']" class="form-control" placeholder="Enter Answer" id="enuanswer'+enuans+'" value="'+answer_desc+'" aria-describedby="basic-addon1"><span class="input-group-addon enumcount" id="basic-addon1"><a href="#"><i id="'+enuans+'" class="glyphicon glyphicon-minus enudelans"><span class="enudelanstext">Remove</span></i></a></span></div></div></div></td></tr>');
                            
                          };
                        });     
                    });
                    $("#enuquestionid").val(question_desc);
                    $("#enutopics").val(topics_id);
                    $("#enucognitive").val(cognitive_level_id);
                    $("#enupoints").val(points);
              }
        }); 
}
function getval8(sel,tt,tq)
{
   val1=sel.value;   
   val2=tt;
   val3=tq;    
    $.ajax({
              type: "Post",
              data: {num: val1, tt: val2, tq_id: val3},
              url: "test3.php",
              dataType: "json",
              success: function(data) {
                    var question_desc;
                    var topics_id;
                    var cognitive_level_id;
                    var points;
                    var answer_desc;
                    var choice;
                    var i;
                    var numItems = $('.multicount').length;
                    console.log(multi_ans)
                    if (numItems>0) {
                      for (var i = numItems; i > 0; i--) {
                        $('#multiansnum'+i+'').remove();
                        $('#answer0').val('');   
                        if (multi_ans>1) {
                          multi_ans--;
                        };
                      };
                    };
                    $.each(data , function(key , value) {
                        question_desc=this['question_desc'];
                        topics_id=this['topics_id'];
                        cognitive_level_id=this['cognitive_level_id'];
                        points=this['points'];
                        answer_desc=this['answer'];
                        $.each(value.choices , function(k , v ){ 
                        if (k==0) {
                          choice=v;
                          $("#answer0").val(choice);
                          if (answer_desc==choice) {
                            $('#rb0').attr('checked', 'checked');
                          };
                        console.log(v);
                        };
                        if (k>0) {
                          console.log(k);
                          choice=v;
                          multi_ans++;
                          $('#multiplechoice1_field').append('<tr id="multiansnum'+multi_ans+'"><td><div class="row"><div class="col-xs-10"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Choice '+multi_ans+'.</span><input type="text" name="multians['+multi_ans+']" class="form-control" placeholder="Enter Choice" id="answer'+multi_ans+'" value="'+choice+'" aria-describedby="basic-addon1"><span class="input-group-addon multicount" id="basic-addon1"><a href="#"><i id="'+multi_ans+'" class="glyphicon glyphicon-minus multidelans"><span class="multidelanstext">Remove</span></i></a></span><span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="answerfile['+multi_ans+']"></span></div></div><div class="col-xs-2"><label class="radio"><input type="radio" id="rb'+multi_ans+'" name="radiob" value="'+multi_ans+'" class="minimal">Answer</label></div></div></td></tr>');
                          if (answer_desc==choice) {
                            $('#rb'+multi_ans).attr('checked', 'checked');
                          };
                        };
                      
                      });     
                    });
                    $("#multiquestionid").val(question_desc);
                    $("#multitopics").val(topics_id);
                    $("#multicognitive").val(cognitive_level_id);
                    $("#multipoints").val(points);
              }
        }); 
}
   $(document).on('click', '.multiaddans', function(){  
           var button_id = $(this).attr("id");
           multi_ans++;  
           $('#multiplechoice'+button_id+'_field').append('<tr id="multiansnum'+multi_ans+'"><td><div class="row"><div class="col-xs-10"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Choice '+multi_ans+'.</span><input type="text" name="multians['+multi_ans+']" class="form-control" placeholder="Enter Choice" id="answer'+multi_ans+'"" aria-describedby="basic-addon1"><span class="input-group-addon multicount" id="basic-addon1"><a href="#"><i id="'+multi_ans+'" class="glyphicon glyphicon-minus multidelans"><span class="multidelanstext">Remove</span></i></a></span><span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="answerfile['+multi_ans+']"></span></div></div><div class="col-xs-2"><label class="radio"><input type="radio" id="rb'+multi_ans+'" name="radiob" value="'+multi_ans+'" class="minimal">Answer</label></div></div></td></tr>');  
      });
  $(document).on('click', '.multidelans', function(){  
    var button_id = $(this).attr("id");   
    $('#multiansnum'+button_id+'').remove(); 
    multi_ans--; 
  });  

   $(document).on('click', '.enuaddans', function(){  
           var button_id = $(this).attr("id");
           enuans++;  
           $('#answer'+button_id+'_field').append('<tr id="enuansnum'+enuans+'"><td><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Answer '+enuans+'.</span><input type="text" name="enuans['+enuans+']" class="form-control" placeholder="Enter Answer" id="" aria-describedby="basic-addon1"><span class="input-group-addon enumcount" id="basic-addon1"><a href="#"><i id="'+enuans+'" class="glyphicon glyphicon-minus enudelans"><span class="enudelanstext">Remove</span></i></a></span></div></div></div></td></tr>');  
      });
  $(document).on('click', '.enudelans', function(){  
    var button_id = $(this).attr("id");   
    $('#enuansnum'+button_id+'').remove(); 
    enuans--; 
  });  

</script>  
<script>
function getval1(sel,tt,tq)
{
   val1=sel.value;   
   val2=tt;
   val3=tq;    
    $.ajax({
              type: "Post",
              data: {num: val1, tt: val2, tq_id: val3},
              url: "test1.php",
              success: function(data) {
                    var obj = $.parseJSON(data); 
                    var question_desc;
                    var topics_id;
                    var cognitive_level_id;
                    var points;
                    var answer_desc;
                    $.each(obj, function() {
                      console.log(val1);
                        question_desc=this['question_desc'];
                        topics_id=this['topics_id'];
                        cognitive_level_id=this['cognitive_level_id'];
                        points=this['points'];
                        answer_desc=this['answer_desc'];
                        });
                    if (!question_desc) {question_desc=""};
                    if (!answer_desc) {answer_desc=""};
                    document.getElementById("idenquestionid").value = question_desc;
                    $("#identopics").val(topics_id);
                    $("#idencognitive").val(cognitive_level_id);
                    $("#idenpoints").val(points);
                    document.getElementById("idenanswer").value =answer_desc;
              }
        }); 
}
function getval2(sel,tt,tq)
{
   val1=sel.value;   
   val2=tt;
   val3=tq;    
    $.ajax({
              type: "Post",
              data: {num: val1, tt: val2, tq_id: val3},
              url: "test1.php",
              success: function(data) {
                    var obj = $.parseJSON(data); 
                    var question_desc;
                    var topics_id;
                    var cognitive_level_id;
                    var points;
                    var answer_desc;
                    $.each(obj, function() {
                        question_desc=this['question_desc'];
                        topics_id=this['topics_id'];
                        cognitive_level_id=this['cognitive_level_id'];
                        points=this['points'];
                        answer_desc=this['answer_desc'];
                        });
                    $("#tofquestionid").val(question_desc);
                    $("#toftopics").val(topics_id);
                    $("#tofcognitive").val(cognitive_level_id);
                    $("#tofpoints").val(points);
                    $("#tofanswer").val(answer_desc);
              }
        }); 
}

function getval3(sel,tt,tq)
{
   val1=sel.value;   
   val2=tt;
   val3=tq;    
    $.ajax({
              type: "Post",
              data: {num: val1, tt: val2, tq_id: val3},
              url: "test1.php",
              success: function(data) {
                    var obj = $.parseJSON(data); 
                    var question_desc;
                    var topics_id;
                    var cognitive_level_id;
                    var points;
                    var answer_desc;
                    $.each(obj, function() {
                        question_desc=this['question_desc'];
                        topics_id=this['topics_id'];
                        cognitive_level_id=this['cognitive_level_id'];
                        points=this['points'];
                        answer_desc=this['answer_desc'];
                        });
                    $("#matchquestionid").val(question_desc);
                    $("#matchtopics").val(topics_id);
                    $("#matchcognitive").val(cognitive_level_id);
                    $("#matchpoints").val(points);
                    $("#matchanswer").val(answer_desc);
              }
        }); 
}
function getval4(sel,tt,tq)
{
   val1=sel.value;   
   val2=tt;
   val3=tq;    
    $.ajax({
              type: "Post",
              data: {num: val1, tt: val2, tq_id: val3},
              url: "test1.php",
              success: function(data) {
                    var obj = $.parseJSON(data); 
                    var question_desc;
                    var topics_id;
                    var cognitive_level_id;
                    var points;
                    var answer_desc;
                    $.each(obj, function() {
                        question_desc=this['question_desc'];
                        topics_id=this['topics_id'];
                        cognitive_level_id=this['cognitive_level_id'];
                        points=this['points'];
                        answer_desc=this['answer_desc'];
                        });
                    $("#probquestionid").val(question_desc);
                    $("#probtopics").val(topics_id);
                    $("#probcognitive").val(cognitive_level_id);
                    $("#probpoints").val(points);
                    $("#probanswer").val(answer_desc);
              }
        }); 
}
function getval5(sel,tt,tq)
{
   val1=sel.value;   
   val2=tt;
   val3=tq;    
    $.ajax({
              type: "Post",
              data: {num: val1, tt: val2, tq_id: val3},
              url: "test1.php",
              success: function(data) {
                    var obj = $.parseJSON(data); 
                    var question_desc;
                    var topics_id;
                    var cognitive_level_id;
                    var points;
                    var answer_desc;
                    $.each(obj, function() {
                        question_desc=this['question_desc'];
                        topics_id=this['topics_id'];
                        cognitive_level_id=this['cognitive_level_id'];
                        points=this['points'];
                        answer_desc=this['answer_desc'];
                        });
                    $("#essayquestionid").val(question_desc);
                    $("#essaytopics").val(topics_id);
                    $("#essaycognitive").val(cognitive_level_id);
                    $("#essaypoints").val(points);
                    $("#essayanswer").val(answer_desc);
              }
        }); 
}
function getval6(sel,tt,tq)
{
   val1=sel.value;   
   val2=tt;
   val3=tq;    
    $.ajax({
              type: "Post",
              data: {num: val1, tt: val2, tq_id: val3},
              url: "test1.php",
              success: function(data) {
                    var obj = $.parseJSON(data); 
                    var question_desc;
                    var topics_id;
                    var cognitive_level_id;
                    var points;
                    var answer_desc;
                    $.each(obj, function() {
                        question_desc=this['question_desc'];
                        topics_id=this['topics_id'];
                        cognitive_level_id=this['cognitive_level_id'];
                        points=this['points'];
                        answer_desc=this['answer_desc'];
                        });
                    $("#fitbquestionid").val(question_desc);
                    $("#fitbtopics").val(topics_id);
                    $("#fitbcognitive").val(cognitive_level_id);
                    $("#fitbpoints").val(points);
                    $("#fitbanswer").val(answer_desc);
              }
        }); 
}

</script>
<script type="text/javascript">
            function fun(tqid){
   val1= $('#num').val();  
   val2=tqid;
    $.ajax({
              type: "Post",
              data: {num: val1, tqid: val2},
              url: "numcopies.php",
              success: function(data) {
                    $("#sub").val(d);
                   
              }
        }); 
}
            </script>
<script>
  var date = new Date();
  var n = date.toDateString();
  var time = date.toLocaleTimeString();

  document.getElementById('time').innerHTML = n + ' ' + time;


$('select[name="name[]"]').change(function() {
    var myName = '[name="name[]"]';
    var myOpt = [];
    $("select"+ myName).each(function () {
        myOpt.push($(this).val());
    });
    $("select"+ myName).each(function () {
        $(this).find("option").prop('hidden', false);
        var sel = $(this);
        $.each(myOpt, function(key, value) {
            if((value != "") && (value != sel.val())) {
                sel.find("option").filter('[value="' + value +'"]').prop('hidden', true);
            }
        });
    });
});
</script>
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<script type="text/javascript">
$(function(){
$(".idenquestion").keyup(function() 
{ 
var searchid = $(this).val();
var cognitive = $(".idencognitive").val();
var topic = $(".identopics").val();
var ttype='Identification'

if(searchid!='')
{
  $.ajax({
  type: "POST",
  url: "search.php",
  data: {search: searchid, cognitive: cognitive, topic: topic, ttype: ttype},
  cache: false,
  success: function(html)
  {
  $("#resultidenquestion").html(html).show();
  }
  });
}return false;    
});

jQuery("#resultidenquestion").live("click",function(e){ 
  var $clicked = $(e.target);
  var $name = $clicked.find('.name').html();
  var decoded = $("<div/>").html($name).text();
  $('#idenquestionid').val(decoded);
});
jQuery(document).live("click", function(e) { 
  var $clicked = $(e.target);
  if (! $clicked.hasClass("idenquestion")){
  jQuery("#resultidenquestion").fadeOut(); 
  } 

});
$('#idenquestionid').click(function(){
  jQuery("#resultidenquestion").fadeIn();
});
});
</script>
<script type="text/javascript">
$(function(){
$(".enuquestion").keyup(function() 
{ 
var searchid = $(this).val();
var cognitive = $(".enucognitive").val();
var topic = $(".enutopics").val();
var ttype='Enumeration'

if(searchid!='')
{
  $.ajax({
  type: "POST",
  url: "search.php",
  data: {search: searchid, cognitive: cognitive, topic: topic, ttype: ttype},
  cache: false,
  success: function(html)
  {
  $("#resultenuquestion").html(html).show();
  }
  });
}return false;    
});

jQuery("#resultenuquestion").live("click",function(e){ 
  var $clicked = $(e.target);
  var $name = $clicked.find('.name').html();
  var decoded = $("<div/>").html($name).text();
  $('#enuquestionid').val(decoded);
});
jQuery(document).live("click", function(e) { 
  var $clicked = $(e.target);
  if (! $clicked.hasClass("enuquestion")){
  jQuery("#resultenuquestion").fadeOut(); 
  } 

});
$('#enuquestionid').click(function(){
  jQuery("#resultenuquestion").fadeIn();
});
});
</script>

<script type="text/javascript">
$(function(){
$(".multiquestion").keyup(function() 
{ 
var searchid = $(this).val();
var cognitive = $(".multicognitive").val();
var topic = $(".multitopics").val();
var ttype='Multiple Choice'

if(searchid!='')
{
  $.ajax({
  type: "POST",
  url: "search.php",
  data: {search: searchid, cognitive: cognitive, topic: topic, ttype: ttype},
  cache: false,
  success: function(html)
  {
  $("#resultmultiquestion").html(html).show();
  }
  });
}return false;    
});

jQuery("#resultmultiquestion").live("click",function(e){ 
  var $clicked = $(e.target);
  var $name = $clicked.find('.name').html();
  var decoded = $("<div/>").html($name).text();
  $('#multiquestionid').val(decoded);
});
jQuery(document).live("click", function(e) { 
  var $clicked = $(e.target);
  if (! $clicked.hasClass("multiquestion")){
  jQuery("#resultmultiquestion").fadeOut(); 
  } 

});
$('#multiquestionid').click(function(){
  jQuery("#resultmultiquestion").fadeIn();
});
});
</script>

<script type="text/javascript">
$(function(){
$(".tofquestion").keyup(function() 
{ 
var searchid = $(this).val();
var cognitive = $(".tofcognitive").val();
var topic = $(".toftopics").val();
var ttype='True or False'

if(searchid!='')
{
  $.ajax({
  type: "POST",
  url: "search.php",
  data: {search: searchid, cognitive: cognitive, topic: topic, ttype: ttype},
  cache: false,
  success: function(html)
  {
  $("#resulttofquestion").html(html).show();
  }
  });
}return false;    
});

jQuery("#resulttofquestion").live("click",function(e){ 
  var $clicked = $(e.target);
  var $name = $clicked.find('.name').html();
  var decoded = $("<div/>").html($name).text();
  $('#tofquestionid').val(decoded);
});
jQuery(document).live("click", function(e) { 
  var $clicked = $(e.target);
  if (! $clicked.hasClass("tofquestion")){
  jQuery("#resulttofquestion").fadeOut(); 
  } 

});
$('#tofquestionid').click(function(){
  jQuery("#resulttofquestion").fadeIn();
});
});
</script>

<script type="text/javascript">
$(function(){
$(".matchquestion").keyup(function() 
{ 
var searchid = $(this).val();
var cognitive = $(".matchcognitive").val();
var topic = $(".matchtopics").val();
var ttype='Matching Type'

if(searchid!='')
{
  $.ajax({
  type: "POST",
  url: "search.php",
  data: {search: searchid, cognitive: cognitive, topic: topic, ttype: ttype},
  cache: false,
  success: function(html)
  {
  $("#resultmatchquestion").html(html).show();
  }
  });
}return false;    
});

jQuery("#resultmatchquestion").live("click",function(e){ 
  var $clicked = $(e.target);
  var $name = $clicked.find('.name').html();
  var decoded = $("<div/>").html($name).text();
  $('#matchquestionid').val(decoded);
});
jQuery(document).live("click", function(e) { 
  var $clicked = $(e.target);
  if (! $clicked.hasClass("matchquestion")){
  jQuery("#resultmatchquestion").fadeOut(); 
  } 

});
$('#matchquestionid').click(function(){
  jQuery("#resultmatchquestion").fadeIn();
});
});
</script>

<script type="text/javascript">
$(function(){
$(".probquestion").keyup(function() 
{ 
var searchid = $(this).val();
var cognitive = $(".probcognitive").val();
var topic = $(".probtopics").val();
var ttype='Problem Solving'

if(searchid!='')
{
  $.ajax({
  type: "POST",
  url: "search.php",
  data: {search: searchid, cognitive: cognitive, topic: topic, ttype: ttype},
  cache: false,
  success: function(html)
  {
  $("#resultprobquestion").html(html).show();
  }
  });
}return false;    
});

jQuery("#resultprobquestion").live("click",function(e){ 
  var $clicked = $(e.target);
  var $name = $clicked.find('.name').html();
  var decoded = $("<div/>").html($name).text();
  $('#probquestionid').val(decoded);
});
jQuery(document).live("click", function(e) { 
  var $clicked = $(e.target);
  if (! $clicked.hasClass("probquestion")){
  jQuery("#resultprobquestion").fadeOut(); 
  } 

});
$('#probquestionid').click(function(){
  jQuery("#resultprobquestion").fadeIn();
});
});
</script>

<script type="text/javascript">
$(function(){
$(".essayquestion").keyup(function() 
{ 
var searchid = $(this).val();
var cognitive = $(".essaycognitive").val();
var topic = $(".essaytopics").val();
var ttype='Essay'

if(searchid!='')
{
  $.ajax({
  type: "POST",
  url: "search.php",
  data: {search: searchid, cognitive: cognitive, topic: topic, ttype: ttype},
  cache: false,
  success: function(html)
  {
  $("#resultessayquestion").html(html).show();
  }
  });
}return false;    
});

jQuery("#resultessayquestion").live("click",function(e){ 
  var $clicked = $(e.target);
  var $name = $clicked.find('.name').html();
  var decoded = $("<div/>").html($name).text();
  $('#essayquestionid').val(decoded);
});
jQuery(document).live("click", function(e) { 
  var $clicked = $(e.target);
  if (! $clicked.hasClass("essayquestion")){
  jQuery("#resultessayquestion").fadeOut(); 
  } 

});
$('#essayquestionid').click(function(){
  jQuery("#resultessayquestion").fadeIn();
});
});
</script>

<script type="text/javascript">
$(function(){
$(".fitbquestion").keyup(function() 
{ 
var searchid = $(this).val();
var cognitive = $(".fitbcognitive").val();
var topic = $(".fitbtopics").val();
var ttype='Fill in the Blank'

if(searchid!='')
{
  $.ajax({
  type: "POST",
  url: "search.php",
  data: {search: searchid, cognitive: cognitive, topic: topic, ttype: ttype},
  cache: false,
  success: function(html)
  {
    console.log(html)
  $("#resultfitbquestion").html(html).show();
  }
  });
}return false;    
});

jQuery("#resultfitbquestion").live("click",function(e){ 
  var $clicked = $(e.target);
  var $name = $clicked.find('.name').html();
  var decoded = $("<div/>").html($name).text();
  $('#fitbquestionid').val(decoded);
});
jQuery(document).live("click", function(e) { 
  var $clicked = $(e.target);
  if (! $clicked.hasClass("fitbquestion")){
  jQuery("#resultfitbquestion").fadeOut(); 
  } 

});
$('#fitbquestionid').click(function(){
  jQuery("#resultfitbquestion").fadeIn();
});
});
</script>
</body>
<link rel="stylesheet" href="style.css">
</html>
