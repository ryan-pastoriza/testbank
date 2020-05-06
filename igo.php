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
<body class="hold-transition skin-blue sidebar-mini" >
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
       <li id="access_tab">
          <a href="accessibility.php"><i class="glyphicon glyphicon-lock">
            </i> <span>Accessibilty</span></a>
        </li>
        <li id="access_tab">
          <a href="Institutional.php"><i class="glyphicon glyphicon-folder-open">
            </i> <span>Institutional</span></a>
        </li>
        <li class="active" id="access_tab">
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
              <h3 class="box-title"><strong>Institutional Graduate Outcomes</strong></h3>
            </div>
            <!-- /.box-header -->
            
            <div class="box-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="box-body" style="height:450px;">
                    <div class="row">
                      <div class="col-lg-12" >
                        <table class="table table-hover table-striped table-bordered" id="cigo">
                          <thead>
                            <tr>
                              <th width="20">ID</th>
                              <th width="50">Attributes</th>
                              <th width="50">Code</th>
                              <th>Institutional Graduate Outcomes</th>
                              <th>Date</th>
                              <th width="30">Revise</th>
                              <th width="60">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $class->getigo();?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer clearfix">
              <button class="pull-right btn btn-primary" data-toggle="modal" data-target="#addnew">New IGO</button>
            </div>
            <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><strong>New IGO</strong></h4>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="form-group">
                        <label for="name">Institutional Graduate Attributes</label>
                        <input type="text" class="form-control" id="iga" placeholder="Attributes" name="igan">
                      </div>
                      <div class="form-group">
                        <label for="lname">Institutional Graduate Code</label>
                        <input type="text" class="form-control" id="igc" placeholder="Code" name="igcn">
                      </div>
                      <div class="form-group">
                        <label for="lname">Institutional Graduate Outcomes</label>
                        <textarea rows="4" style="width: 570px; resize: vertical;" class="form-control" id="igo" placeholder="Outcomes"  name="igon"></textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" onclick="save()" data-dismiss="modal" class="btn btn-primary">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>
<?php
include('footer.php'); 
?>
</body>
</html>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script>
  $('#cigo').dataTable();
</script>
<script>
$( window ).load(function() {
  date_time('date_time');
});
  function save() {
    var id = "<?php echo $id_session;?>";
    var igan = $('#iga').val();
    var igcn = $('#igc').val();
    var igon = $('#igo').val();
    $.ajax({
      type:"POST",
      url:"crud.php?p=createigo",
      data:{id1: id, igan1: igan, igcn1: igcn, igon1: igon},
      success: function(data){
        $('.modal-backdrop').remove()
        $("#iga").val("");
        $("#igc").val("");
        $("#igo").val("");
        location.reload();

      }
    });
  }
  function update(str) {
    var update_id = str;
    var id = "<?php echo $id_session;?>";
    var igan = $('#iga'+str).val();
    var igcn = $('#igc'+str).val();
    var igon = $('#igo'+str).val();
    var rev = $('#rev'+str).val();
    $.ajax({
      type:"POST",
      url:"crud.php?p=updateigo",
      data:{id1: id, updateid: update_id, igan1: igan, igcn1: igcn, igon1: igon, revn: rev},
      success: function(data){
        $('.modal-backdrop').remove()
        location.reload();
      }
    });
  }
</script>
