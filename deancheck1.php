<?php
include('header.php');
include 'class.php';
$class = new testbank(); 
if ( !empty ( $_GET ) ) {
  $syllabus_id=$_GET['syllabus_id'];
  }

$sql = "SELECT sched_subj.ss_id, `subject`.subj_id, `subject`.subj_code, `subject`.subj_name, `subject`.subj_desc, syllabus.course_info_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext FROM sched_subj INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN employees ON employees.employee_id = employment.employee_id WHERE syllabus.syllabus_id = '".$syllabus_id."'";
  $result = mysql_query($sql);
    if(!$result){
      echo 'Database Error!';
    }else{
      while($row=mysql_fetch_array($result)){
        $ss_id=$row['ss_id'];
        $subj_id=$row['subj_id'];
        $subj_code=$row['subj_code'];
        $subj_name=$row['subj_name'];
        $subj_desc=$row['subj_desc'];
        $course_info_id=$row['course_info_id'];
        $name=utf8_encode($row['employee_fname'])." ".utf8_encode($row['employee_mname'])." ".utf8_encode($row['employee_lname'])." ".$row['employee_ext']." ";
        $subject=$subj_name;
        $sqlsub = "SELECT * FROM subject_info INNER JOIN syllabus ON syllabus.course_info_id = subject_info.subject_info_id WHERE syllabus.syllabus_id = $syllabus_id";
        $resultsub1 = mysql_query($sqlsub);
          while($row=mysql_fetch_array($resultsub1)){
            $pre_req=$row['pre_requisites'];
          }
      }
    }
  $pos = $position_session;
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
      <?php include 'sidebar.php'; ?>
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
         
          <div class="box box-primary" >
            <!-- start -->


            <div class="box-header with-border">
            <h3 class="box-title"><?php echo "<b>".$subject."</b> <br>by: ".$name ?></h3>
            </div>
            <div class="box-body">
              <table class="table table-border">
              <form method='post' >
                 <?php include('syllabuscheck.php'); ?>
                
              </table>
            </div>
            <div class="box-footer clearfix">
              <div class="row">
                <div class="col-xs-7"> 
                  <button type="submit" name="revise" class="pull-right btn btn-danger" id="revise" style="width:85px;">
                  <i class="glyphicon glyphicon glyphicon-remove"></i> Revise </button>
                  <?php 
                  if (isset($_POST['revise'])) {
                    $class->syllabusremarks($syllabus_id);
                   } ?>
                </div>
                <div class="col-xs-2"> 
                  <button type="submit" name="approve" class="pull-right btn btn-success" id="approve" style="width:85px;">
                  <i class="glyphicon glyphicon glyphicon-ok"></i> Approve </button>
                   <?php 
                  if (isset($_POST['approve'])) {
                    if($pos=="Dean"){
                      $class->presyllabusapprove($syllabus_id);
                    }else if($pos=="Academic Head"){
                      if (isset($_POST['rcheck'])) {
                      $class->syllabusapprove($syllabus_id);
                      }else{
                        echo "<script type='text/javascript'>alert('Please check the approve syllabus checkbox');</script>";
                      }
                    }
                      
                  } ?>
                </div>
              </div>
            </div>
            </form>
        </section>
      </div>
      <!-- /.row (main row) -->
    </section>
  </div>
  <!-- /.content-wrapper -->
<?php
include('footer.php'); 
?>
</body>
</html>
