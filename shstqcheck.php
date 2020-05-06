<?php
include('header.php');
include 'class.php';
$class = new testbank(); 
if ( !empty ( $_GET ) ) {
  $tq_id=$_GET['tq_id'];
  // $instructor=$_GET['instructor'];
  // $subject=$_GET['subject'];
  }
$sql = "SELECT major_exams.exam_id, shs_tqstatus.shs_ph, shs_subject.shs_subj_name, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext FROM shs_tq INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_syll ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN employment ON shs_syll.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id WHERE shs_tq.shs_tq_id ='". $tq_id."' ";
  $result = mysql_query($sql);
    if(!$result){
      echo 'Database Error!';
    }else{
      while($row=mysql_fetch_array($result)){
        $period=$row['exam_id'];
        $ph=$row['shs_ph'];
        $fname=utf8_encode($row['employee_fname']);
        $mname=utf8_encode($row['employee_mname']);
        $lname=utf8_encode($row['employee_lname']);
        $employee_ext=$row['employee_ext'];
        $subject=$row['shs_subj_name'];
        $instructor=$fname." ".$mname." ".$lname." ".$employee_ext;
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Main row -->
      <div class="row" >

        <!-- Left col -->
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
                <form method='post'>
                 <?php         
                  $class->shstqcheck($tq_id); 
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
                    $class->shsremarks();
                    $class->shscheckqstat($ph,$tq_id,"ph","revise");
                      
                   } ?>
                </div>
                <div class="col-xs-2"> 
                  <button type="submit" name="approve" class="pull-right btn btn-success" id="save" style="width:85px;">
                  <i class="glyphicon glyphicon glyphicon-ok"></i> Approve </button>
                   <?php 
                  if (isset($_POST['approve'])) {
                  $class->shsremarks();
                   $class->shscheckqstat($ph,$tq_id,"ph","approve");
                      
                  } ?>
                  
                </div>
              </div>
            </div>
             <div  id="printableArea" style="display:none">
                  <?php include('shsprinttqtemp.php'); ?>
                </div>
                <div  id="printableArea2" style="display:none">
                  <?php include('shspreviewrem.php'); ?>
                </div>
                <div  id="printableArea3" style="display:none">
                  <?php include('shsprinttqtemp.php'); ?>
                </div>
            </form>
        </section>
       
       <?php
include('shstos1.php'); 
?>
        <!-- right col -->
      </div>
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
<style>
.createsyllabus .createsyllabustext {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 10px;
    visibility: hidden;
    width: 100px;
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
    width: 100px;
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
</body>
</html>
