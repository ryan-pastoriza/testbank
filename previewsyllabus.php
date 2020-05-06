<?php
include('header.php'); 
include 'class.php';
$class = new testbank();
if ( !empty ( $_GET ) ) {
  $syllabus_del=$_GET['syllabus_del'];
  $syllabus_id1=$_GET['syllabus_id'];
  $subject_name=$_GET['subject_name'];
  $semester=$_GET['semester'];
  $sy=$_GET['sy'];
  }

  $sql = "SELECT sched_subj.ss_id, `subject`.subj_id, `subject`.subj_code, `subject`.subj_name, `subject`.subj_desc, syllabus.course_info_id FROM sched_subj INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id WHERE syllabus.syllabus_id = '".$syllabus_id1."'";
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
        $sqlsub = "SELECT * FROM subject_info INNER JOIN syllabus ON syllabus.course_info_id = subject_info.subject_info_id WHERE syllabus.syllabus_id = $syllabus_id1";
        $resultsub1 = mysql_query($sqlsub);
          while($row=mysql_fetch_array($resultsub1)){
            $pre_req=$row['pre_requisites'];
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
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><b><?php echo $subject_name." (".$semester." Semester ".$sy.")"; ?></b></h3>
            </div>
            <div class="box-body table-responsive no-padding" style="overflow-y:scroll; overflow-x:hidden; ">
              <!-- <table border="solid" width="800">
                <tr bgcolor="#659EC7" id="color1">
                  <td  align="center" colspan="3" class="col-md-12" style="width: 1000px;"><h4><b>COURSE INFORMATION</b></h4></td>
                </tr>
                <tr>
                  <td class="col-md-4"><b>Course Name</b></td>
                  <td class="col-md-8"><p><?php echo $subj_name; ?></p></td>
                </tr>
                <tr>
                  <td class="col-md-4"><b>Course Code</b></td>
                  <td class="col-md-8"><p><?php echo $subj_code; ?></p></td>
                </tr>
                <tr>
                  <td class="col-md-4"><b>Pre-requisites / Co-requisites</b></td>
                  <td class="col-md-8"><p><?php echo $pre_req; ?></p></td>
                </tr>
                <tr>
                  <td class="col-md-4"><b>Course Description</b></td>
                  <td class="col-md-8"><p><?php echo $subj_desc; ?></p></td>
                </tr>
                <tr>
                  <td class="col-md-4"><b>Program Graduate Outcomes</b></td>
                  <td class="col-md-8"><p><?php $class->loadprintpgo($syllabus_id1); ?></p></td>
                </tr>
                <tr>
                  <td class="col-md-4"><b>Course Learning Outcomes</b></td>
                  <td class="col-md-8"><p><?php $class->loadprintclo($syllabus_id1,$depart);?></p></td>
                </tr>
              </table> -->
              <br>
              <br>
              <br>
                <?php  $class->loadweek($syllabus_id1); ?>
                
              <table border="solid" width="800">
                <tr bgcolor="#659EC7" id="color1">
                  <td align="center" colspan="8"><h4><b>Course Requirements and Policies</b></h4></td>
                </tr>
                
                  <?php $class->coursereq($syllabus_id1); ?>
                
                <tr>
                  <th class="col-xs-2" rowspan="7">Class Policy</th>
                  <th bgcolor="#89C35C" id="color2" class="col-xs-3">Deviations</th>
                  <th bgcolor="#89C35C" id="color2" class="col-xs-7" colspan="5">Policies</th>
                </tr>
                <?php $class->classpolicy($syllabus_id1); ?>
                <tr>
                  <th class="col-xs-2" rowspan="7">Grading System</th>
                  <th bgcolor="#89C35C" id="color2" align="center" class="col-xs-3">Items</th>
                  <th bgcolor="#89C35C" id="color2" align="center" class="col-xs-1">Prelim</th>
                  <th bgcolor="#89C35C" id="color2" align="center" class="col-xs-1">Midterm</th>
                  <th bgcolor="#89C35C" id="color2" align="center" class="col-xs-1">Pre-Final</th>
                  <th bgcolor="#89C35C" id="color2" align="center" class="col-xs-1">Final</th>
                  <th bgcolor="#89C35C" id="color2" align="center" class="col-xs-1">Semester</th>
                </tr>
                <tr>
                  <td class="col-xs-3">Class Standing</td>
                  <td align="center">10%</td>
                  <td align="center">10%</td>
                  <td align="center">10%</td>
                  <td align="center">-</td>
                  <td align="center">6%</td>
                </tr>
                <tr>
                  <td class="col-xs-3">Quizzes</td>
                  <td align="center">40%</td>
                  <td align="center">40%</td>
                  <td align="center">40%</td>
                  <td align="center">-</td>
                  <td align="center">24%</td>
                </tr>
                <tr>
                  <td class="col-xs-3">Major Examinations</td>
                  <td align="center">50%</td>
                  <td align="center">50%</td>
                  <td align="center">50%</td>
                  <td align="center">50%</td>
                  <td align="center">50%</td>
                </tr>
                <tr>
                  <td class="col-xs-3">Comprehensive Examinations</td>
                  <td align="center">-</td>
                  <td align="center">-</td>
                  <td align="center">-</td>
                  <td align="center">50%</td>
                  <td align="center">20%</td>
                </tr>
                <tr>
                  <td class="col-xs-3">Total</td>
                  <td align="center">100%</td>
                  <td align="center">100%</td>
                  <td align="center">100%</td>
                  <td align="center">100%</td>
                  <td align="center">100%</td>
                </tr>
                <tr>
                  <td class="col-xs-3"><b>Semester</b></td>
                  <td align="center"><b>20%</b></td>
                  <td align="center"><b>20%</b></td>
                  <td align="center"><b>20%</b></td>
                  <td align="center"><b>40%</b></td>
                  <td align="center"><b>100%</b></td>
                </tr>
                <tr>
                  <?php $class->ref($syllabus_id1); ?>
                </tr>
              </table>
            </div>
              <div class="box-footer clearfix">
                <div class="row">
                  <form method="post">
                    <div class="col-md-11">
                      <button type="submit" name="copysyl" class="pull-right btn btn-primary copysyl" id="print" ><i class="glyphicon glyphicon-copy"></i> Copy Syllabus </button>
                    </div>
                  </form>
                    
                  <?php
                  if (isset($_POST['copysyl'])) {
                    $class->copysyllabus($syllabus_del,$syllabus_id1);
                  }
                  ?>
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
<style>
.createsyllabus .createsyllabustext {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 10px;
    visibility: hidden;
    width: 50px;
    background-color: #3c8dbc;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 60;
}
.editsyllabus .editsyllabustext {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 10px;
    visibility: hidden;
    width: 50px;
    background-color: #3c8dbc;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 60;
}

.createsyllabus:hover .createsyllabustext {
    visibility: visible;
}
.editsyllabus:hover .editsyllabustext {
    visibility: visible;
}
</style>
<script>
$(document).ready(function(){
  var id ="<?php echo $syllabus_del; ?>";
  $.ajax({
    type:"POST",
    url:"syllphp.php?p=checkstatus",
    data: "syllabus_id="+id,
    success: function(data){
      var status_desc;
      var obj = $.parseJSON(data);
      $.each(obj, function(key , value) {
        status_desc=this['status_desc'];
      });
      if (status_desc=='approved') {
        $(".copysyl").attr('disabled',true);
      };
    }
  });
});
</script>
</html>

 