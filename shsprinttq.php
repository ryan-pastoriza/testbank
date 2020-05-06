<?php
include('header.php'); 
include 'class.php';
$class = new testbank();
if ( !empty ( $_GET ) ) {
  $tq_id=$_GET['tq_id'];
  $num_copies=$_GET['num_copies'];
  $syllabus_id=$_GET['syllabus_id'];
  $sql = "SELECT employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, shs_tq.exam_id, shs_tqstatus.shs_ph, shs_tq.shs_upload_tq, shs_tq.shs_upload_tos, shs_subject.shs_subj_name FROM employees INNER JOIN employment ON employment.employee_id = employees.employee_id INNER JOIN shs_syll ON shs_syll.employment_id = employment.employment_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id WHERE shs_tq.shs_tq_id ='". $tq_id."' ";
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
        $upload_tq=$row['shs_upload_tq'];
        $upload_tos=$row['shs_upload_tos'];
        $subject=$row['shs_subj_name'];
        $instructor=$fname." ".$mname." ".$lname." ".$employee_ext;
      }
    }
}
  $class->loaddb();
    $que="SELECT user_access.contact FROM user_access INNER JOIN employment ON user_access.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN shs_syll ON shs_syll.employment_id = employment.employment_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id WHERE shs_tq.shs_tq_id = '".$tq_id."' ";
    $res=mysql_query($que);
    while($row=mysql_fetch_array($res)){
      $contact=$row['contact'];
      $msg="ACLC TestBank: TQ Approved! Please approach the printing in-charge. This is an automatically generated message, please do not reply ";
      $debug = true;
    }
 ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php
  include('printheadernotif.php');
  ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <div class="user-panel">
        <div style="hieght:50px;">
          <p><a><h4><?php echo $fullname_session; ?></h4></a></p>
          <i class="fa fa-circle text-success"></i><a href="logout.php"> logout</a>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="header"><b>MAIN NAVIGATION</b></li>
        <li id="dashboard_tab">
          <a href="print_index.php">
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
          </a>
        </li>
        <li id="queue_tab" class="active">
          <a href="print_queue.php" onclick="getNotification8()">
            <i class="fa fa-book"></i> 
            <span class="pull-right-container">
              <small class="label label-primary" id="count8"></small>
            </span>
            <span>Queue</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <?php
            if (strlen($upload_tq)>0 AND strlen($upload_tos)>0) {
              ?>
              <?php 
                $class->loaddb();
                  $que="SELECT user_access.contact FROM tq INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN user_access ON user_access.employment_id = employment.employment_id WHERE tq.tq_id = '".$tq_id."' ";
                  $res=mysql_query($que);
                  while($row=mysql_fetch_array($res)){
                    $contact=$row['contact'];
                    $msg="ACLC TestBank: TQ Approved! Please approach the printing in-charge. This is an automatically generated message, please do not reply ";
                    $debug = true;
                  }
               ?>
              <section class="col-lg-12">
                <div class="box  box-primary" id="div2">
                  <div class="box-header">
                    <h3 class="box-title"><?php echo "<b>".$subject."</b> <br>by: ".$instructor."<br>Copies: ".$num_copies ?></h3>
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
                        <!-- <div class="input-group">
                          <button class="pull-right btn btn-primary" style="width:150px;" id="downloadtos" name="downloadtos" >
                          <i class="glyphicon glyphicon-download"></i> download TOS</button>
                        </div> -->
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </section>
              <?php
            }else{
              ?>

      <div class="row" >
        <!-- Left col -->
        <section class="col-lg-12 ">
            <div class="box box-primary ">
              <div class="box-body">
                <div class="row">
                  <div class="col-lg-2" id="printableAreaa">
                    <?php include('shsprinttqtemp.php'); ?>
                  </div>
                </div>
              </div>
              <div class="box-footer clearfix">
                <div class="row">
                  <div class="col-md-12">
                    <form method="post" >
                   
                     <input type="hidden" name="tq_id" class="form-control" value="<?php echo "$tq_id"; ?>">
                     <input type="hidden" name="recipient" class="form-control" value="<?php echo "$contact"; ?>">
                     <input type="hidden" name="message" class="form-control" value="<?php echo "$msg"; ?>">
                      <button type="submit" class="pull-right btn btn-primary" id="print" name="print" onclick="shsprintDiv('printableAreaa', '<?php echo $tq_id; ?>', '<?php echo $contact; ?>', '<?php echo $msg; ?>')">
                      <i class="fa fa-print"></i> Print </button>
                    </form>
             
                  </div>
                </div>
              </div>
            </div>
        </section>
      </div>
      <?php
            }
          ?>
    </section>
  </div>
<?php
include('footer.php'); 
?>
</body>
</html>
<script type="text/javascript">
  $('#downloadtq').click(function(e) {
    e.preventDefault();  //stop the browser from following
    var file = "<?php echo $upload_tq;?>";
    window.location.href = 'shs_upload_tq/'+file;
    val1="<?php echo $tq_id;?>";
     val2="<?php echo $contact;?>";
     val3="<?php echo $msg;?>";
     $.ajax({
              type: "Post",
              data: {tq_id: val1, recipient: val2, message: val3},
              url: "shssendsms.php",
              success: function(data) {
              window.location.href='print_queue.php';
                   
              }
        }); 

});
    function printDiv(divName, tqid, contact, msg) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
     val1=tqid;
     val2=contact;
     val3=msg;
     $.ajax({
              type: "Post",
              data: {tq_id: val1, recipient: val2, message: val3},
              url: "sendsms.php",
              success: function(data) {
              window.location.href='print_queue.php';
                   
              }
        }); 
}
function shsprintDiv(divName, tqid, contact, msg) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
     val1=tqid;
     val2=contact;
     val3=msg;
     $.ajax({
              type: "Post",
              data: {tq_id: val1, recipient: val2, message: val3},
              url: "shssendsms.php",
              success: function(data) {
              window.location.href='print_queue.php';
                   
              }
        }); 
}
</script>
