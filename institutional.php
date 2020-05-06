<?php
include('header.php'); 
include 'class.php';
if($user_check=="admin"){
}else{
  if ($position_session=="Instructor") {
    header('Location: instructor_index.php'); 
  }else if ($position_session=="Program Head") {
    header('Location: ph_index.php'); 
  }else if ($position_session=="Dean") {
    header('Location: dean_index.php');  
  }
}
$class = new testbank();
$class->loaddb();
  $sql = "SELECT employment.employment_id, employees.employee_id, department.department_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, department.department_name, employment.employment_status, employment.employment_job_title FROM employment INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id ";
  if (isset($_POST['search'])) {
    $searchterm = $_POST['searchbox'];
    $sql .=" WHERE employee_fname LIKE '%{$searchterm}%'";
    $sql .=" OR employee_mname LIKE '%{$searchterm}%'";
    $sql .=" OR employee_lname LIKE '%{$searchterm}%'";
  }
    $sql .=" ORDER BY employees.employee_lname ASC";
  
  
  $result = mysql_query($sql) or die(mysql_error());

?>
<style type="text/css">
  #alertsuccess{
    position: absolute;
    top: 10px;
    margin-left: 1000px;
    right: 20px;
    float: left;
    width: 200px;
    z-index: 999;
  }
</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="index.php" class="logo">

      <span class="logo-mini"><b>T</b>B</span>

      <span class="logo-lg"><b>Test </b>Bank</span>
    </a>

    <nav class="navbar navbar-static-top">


      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
          <a href="" style="pointer-events: none;cursor: default;">
            <i class=" fa fa-calendar">
              <span id="date_time" form-control></span>
              <script type="text/javascript">window.onload = date_time('date_time');</script>
            </i>
          </a>  
          </li>
        </ul>
          
      </div>
    </nav>
  </header>
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
          <a href="admin_index.php">
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
          </a>
        </li>
       <li  id="access_tab">
          <a href="accessibility.php"><i class="glyphicon glyphicon-lock">
            </i> <span>Accessibilty</span></a>
        </li>
        <li class="active" id="access_tab">
          <a href="Institutional.php"><i class="glyphicon glyphicon-folder-open">
            </i> <span>Institutional</span></a>
        </li>
        <li id="access_tab">
          <a href="igo.php"><i class="glyphicon glyphicon-list-alt">
            </i> <span>IGO</span></a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><strong>Institutional Information</strong></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="alertsuccess" class="alert alert-success collapse">
                <strong><h4>Successfully Saved!</h4></strong> 
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="box-body" style="height:450px;">
                    <div class="row">
                      <div class="col-lg-12">
                        <br/>
                        <label>Institutional Vision</label>
                        <textarea rows="3" class="form-control" placeholder="Enter Institutional Vision"  id="iv"></textarea>
                      </div>
                      <div class="col-lg-12">
                        <br/>
                        <label>Institutional Mission</label>
                        <textarea rows="3" class="form-control" placeholder="Enter Institutional Mission"  id="im"></textarea>
                      </div>
                      <div class="col-lg-12">
                        <br/>
                        <label>Quality Policy Statement</label>
                        <textarea rows="3" class="form-control" placeholder="Enter Quality Policy Statement"  id="qps"></textarea>
                      </div>
                      <div class="col-lg-12">
                        <br/>
                        <label>Institutional Goals</label>
                        <textarea rows="3" class="form-control" placeholder="Enter Institutional Goals"  id="ig"></textarea>
                      </div>
                      <div class="col-lg-12">
                        <br/>
                        <label>Institutional Core Values</label>
                        <textarea rows="3" class="form-control" placeholder="Enter CInstitutional Core Values" id="icv"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <div class="box-footer clearfix">
                <button type="submit" class="pull-right btn btn-primary" onclick="save()" name="save">
                  <i class="glyphicon glyphicon-floppy-save"></i> Save 
                </button>
              </div>
        </div>
    </section>
  </div>
<?php
include('footer.php'); 
?>
</body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
<script>
$(document).ready(function () {
    showData();

});

    function showData() {
      $.ajax({
        type: "Post",
        url: "crud.php?p=read",
        success: function(data) {
              var obj = $.parseJSON(data); 
              var iv;
              var im;
              var qps;
              var ig;
              var icv;
              $.each(obj, function() {
                  iv=this['iv'];
                  im=this['im'];
                  qps=this['qps'];
                  ig=this['ig'];
                  icv=this['icv'];
                  });
              $("#iv").val(iv);
              $("#im").val(im);
              $("#qps").val(qps);
              $("#ig").val(ig);
              $("#icv").val(icv);
        }
      }); 
    }

    function save() {
      var id = "<?php echo $id_session;?>";
      var iv = $('#iv').val();
      var im = $('#im').val();
      var qps = $('#qps').val();
      var ig = $('#ig').val();
      var icv = $('#icv').val();
      $.ajax({
        type:"POST",
        url:"crud.php?p=create",
        data:{id1: id, iv1: iv, im1: im, qps1: qps, ig1: ig, icv1: icv},
        success: function(data){
          $("#iv").val("");
          $("#im").val("");
          $("#qps").val("");
          $("#ig").val("");
          $("#icv").val("");

          showData();
          $('#alertsuccess').show('fade').delay(1000).fadeOut();
        }
      });

    }
</script>
</html>
