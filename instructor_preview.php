<?php
include('header.php'); 
include 'class.php';
$class = new testbank();
if ( !empty ( $_GET ) ) {
  $syllabus_id=$_GET['syllabus_id'];
  $tq_id=$_GET['tq_id'];
  $tq_idupdate=$_GET['tq_id1'];
 
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
      <?php include 'sidebar.php'; ?>
    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row" >
        <!-- Left col -->
        <section class="col-lg-12 ">
            <div class="box box-primary ">
              <div class="box-body">
                <div class="row">
                  <div class="col-lg-2">
                    <?php include('printtqtemp.php'); ?>
                  </div>
                </div>
              </div>
              <div class="box-footer clearfix">
                <div class="row">
                  <div class="col-md-12">
                    <form method="post">
                      <button type="submit" class="pull-right btn btn-primary opentq" id="copy" name="copy">
                      <i class="glyphicon glyphicon-copy"></i></button>
                    </form>
                    <?php 
                      if (isset($_POST['copy'])) {
                        $class->copytq($tq_id,$tq_idupdate);
                      }
                     ?>
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
<script>
$( window ).load(function() {
  var tq_id=<?php echo $tq_idupdate;?>;
  var syllabus_id=<?php echo $syllabus_id;?>;
  $.ajax({
    type:"POST",
    url:"tqcrud.php?p=checkstatus",
    data:{tq_id: tq_id, syllabus_id:syllabus_id},
    success: function(data){
      var status_desc;
      var obj = $.parseJSON(data);
      $.each(obj, function(key , value) {
        status_desc=this['status_desc'];
      });
      if (status_desc=='printed') {
        $(".opentq").hide("fadeOut");
      };
    }
  });
});
</script>
</html>
