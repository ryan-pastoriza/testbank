<?php
include('header.php');
include 'class.php';
$class = new testbank(); 
if ( !empty ( $_GET ) ) {
  $tq_id=$_GET['tq_id'];
  // $instructor=$_GET['instructor'];
  // $subject=$_GET['subject'];
  }
$sql = "SELECT sched_subj.department, tq.upload_tq, tq.upload_tos, major_exams.exam_id, tqstatus.ph, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, subject_info.subject_name, user_access.user_id FROM tq INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN subject_info ON syllabus.course_info_id = subject_info.subject_info_id INNER JOIN user_access ON user_access.employment_id = employment.employment_id WHERE tq.tq_id ='".$tq_id."' ";
  $result = mysql_query($sql);
    if(!$result){
      echo 'Database Error!';
    }else{
      while($row=mysql_fetch_array($result)){
        $userchat=$row['user_id'];
        $period=$row['exam_id'];
        $ph=$row['ph'];
        $dep=$row["department"];
        $fname=utf8_encode($row['employee_fname']);
        $mname=utf8_encode($row['employee_mname']);
        $lname=utf8_encode($row['employee_lname']);
        $employee_ext=$row['employee_ext'];
        $upload_tq=$row['upload_tq'];
        $upload_tos=$row['upload_tos'];
        $subject=$row['subject_name'];
        $instructor=$fname." ".$mname." ".$lname." ".$employee_ext;
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
    <section class="sidebar">
      <div class="user-panel">
        <div style="hieght:50px;">
          <p><a><h4><?php echo $fullname_session.$tq_id; ?></h4></a></p>
          <i class="fa fa-circle text-success"></i><a href="logout.php"> logout</a>
        </div>
      </div>
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
        
          <?php
            if (strlen($upload_tq)>0 AND strlen($upload_tos)>0) {
              ?>
              <section class="col-lg-12">
                <div class="box  box-primary" id="div2">
                  <div class="box-header">
                    <h3 class="box-title"><?php echo "<b>".$subject."</b> <br>by: ".$instructor ?></h3>
                  </div>
                  <div class="box-body">
                    <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-xs-12">
                        <div class="input-group">
                          <button class="pull-right btn btn-primary" style="width:150px;" id="downloadtq" name="downloadtq" >
                          <i class="glyphicon glyphicon-download"></i> download TQ</button>
                        </div>
                        <br/>
                        <div class="input-group">
                          <button class="pull-right btn btn-primary" style="width:150px;" id="downloadtos" name="downloadtos" >
                          <i class="glyphicon glyphicon-download"></i> download TOS</button>
                        </div>
                        <br/>
                        <div class="input-group">
                          <button class="pull-right btn btn-primary" style="width:150px;" id="chatuser" name="chatuser" >
                          <i class="glyphicon glyphicon-user"></i> Comment to user</button>
                        </div>
                        <div class="col-xs-10"> 
                          <button type="submit" name="revise" class="pull-right btn btn-danger" id="save" style="width:85px;">
                            <i class="glyphicon glyphicon glyphicon-remove"></i> Revise </button>
                          <?php 
                          if (isset($_POST['revise'])) {
                            //$class->remarks();
                            $class->deanuploadstatus($tq_id,"revise",$position_session,"col");
                            if ($position_session=="Academic Head") {
                              $class->notifdean($dep,$user_id,$instructor);
                            }
                           } ?>
                        </div>
                        <div class="col-xs-2"> 
                          <button type="submit" name="approve" class="pull-right btn btn-success" id="save" style="width:85px;">
                          <i class="glyphicon glyphicon glyphicon-ok"></i> Approve </button>
                           <?php 
                          if (isset($_POST['approve'])) {
                            //$class->remarks();
                            $class->deanuploadstatus($tq_id,"approve",$position_session,"col");
                           } ?>
                        </div>
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </section>
              <?php
            }else{
              ?>
              <section class="col-lg-7">
                <div class="box box-primary" >
                  <!-- start -->
                  <div class="box-header with-border">
                  <h3 class="box-title"><?php echo "<b>".$subject."</b> <br>by: ".$instructor ?></h3>
                  </div>
                  <div class="box-body">
                    <table class="table table-border">
                    <tr>
                        <td>
                          <input type="checkbox" onclick="toggle(this);" /> Check all<br />
                        </td>
                      </tr>
                      <form method='post' >
                       <?php         
                        $class->tqcheck($tq_id); 
                       ?>
                      
                    </table>
                  </div>
                  <div class="box-footer clearfix">
                    <div class="row">
                      <!-- <div class="col-xs-2">
                        <button type="submit" name="save" class="pull-right btn btn-default" id="save" style="width:80px;">
                        <i class="glyphicon glyphicon-floppy-disk"></i> Save </button>
                        
                      </div> -->
                     <div class="col-md-4">
                        <button type="button" class="pull-right btn btn-primary" id="print" onclick="PrintPreview2(printableArea2)" style="width:90px;">
                        <i class="glyphicon glyphicon-search"></i> Remarks </button>
                      </div>
                      <div class="col-md-2">
                        <button type="button" class="pull-right btn btn-primary" id="print" onclick="PrintPreview(printableArea)" style="width:90px;">
                        <i class="glyphicon glyphicon-search"></i> Preview  </button>
                      </div>
                      <div class="col-md-2">
                        <button type="button" class="pull-right btn btn-primary" id="print" onclick="printDiv('printableArea3')" style="width:85px;">
                        <i class="fa fa-print"></i> Print </button>
                      </div>
                      <div class="col-xs-2"> 
                        <button type="submit" name="revise" class="pull-right btn btn-danger" id="save" style="width:85px;">
                        <i class="glyphicon glyphicon glyphicon-remove"></i> Revise </button>
                        <?php 
                        if (isset($_POST['revise'])) {
                          $class->remarks($ph,$tq_id,$position_session,"revise");
                          // $class->checkqstat($ph,$tq_id,$position_session,"revise");
                          if ($position_session=="Academic Head") {
                              $class->notifdean($dep,$user_id,$instructor);
                            }
                         } ?>
                      </div>
                      <div class="col-xs-2"> 
                        <button type="submit" name="approve" class="pull-right btn btn-success" id="save" style="width:85px;">
                        <i class="glyphicon glyphicon glyphicon-ok"></i> Approve </button>
                         <?php 
                        if (isset($_POST['approve'])) {
                          $class->remarks($ph,$tq_id,$position_session,"approve");
                          // $class->checkqstat();

                         } ?>
                      </div>
                    </div>
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
                  </form>
                </section>
       
              <?php
              include('tos1.php'); 
              ?>
            </div>
              <?php
            }
          ?>
         
          
        
      <!-- /.row (main row) -->
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2016 <a href="#">ACLC</a>.</strong> All rights
    reserved.
  </footer>
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
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
<script type="text/javascript">
$('#downloadtq').click(function(e) {
    e.preventDefault();  //stop the browser from following
    var file = "<?php echo $upload_tq;?>";
    window.location.href = 'upload_tq/'+file;
    console.log(file)
});
$('#downloadtos').click(function(e) {
    e.preventDefault();  //stop the browser from following
    var file = "<?php echo $upload_tos;?>";
    window.location.href = 'upload_tos/'+file;
    console.log(file)
});
$('#chatuser').click(function(e) {
    e.preventDefault(); 
    var user="<?php echo $userchat;?>";
    window.open('instructor_chat.php?id='+user, '_blank', 'width=1300,height=600,');
    return false;
});
function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}
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
<script type="text/javascript">
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</body>
</html>
