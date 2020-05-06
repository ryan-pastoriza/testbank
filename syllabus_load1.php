<?php
include('header.php'); 
include 'class.php';
$class = new testbank();
if ( !empty ( $_GET ) ) {
  $ss_id=$_GET['ss_id1'];
  $subj_id=$_GET['subj_id'];
  $emp_id=$_GET['emp_id'];
  $subj_name=$_GET['subj_name'];
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
              <h3 class="box-title"><b>Syllabus in <?php echo $subj_name; ?></b></h3>
            </div>
            <div class="box-body table-responsive no-padding" style="overflow-y:scroll; overflow-x:hidden; height:600px;">
              <table class="table table-hover">
                <tr>
                  <th class="col-lg-2">Author</th>
                  <th class="col-lg-2">Semester</th>
                  <th class="col-lg-7">Year</th>
                </tr>
              <?php $class->loadprevioussyll($subj_id,$emp_id,$ss_id); ?>


                <!-- <tr>
                  <td><a>IT Major 4</a></td>
                  <td class="col-lg-1"><a href="syllabus.php"><i class="glyphicon glyphicon-pencil createsyllabus"><span class="createsyllabustext">Create Syllabus</span></i></a></td>
                  <td class="col-lg-1"><a href="syllabus2.php"><i class="glyphicon glyphicon-edit editsyllabus"><span class="editsyllabustext">Edit Syllabus</span></i></a></td>
                </tr>
                <tr>
                  <td><a>Current Trends</a></td>
                  <td class="col-lg-1"><a href="syllabus.php"><i class="glyphicon glyphicon-pencil createsyllabus"><span class="createsyllabustext">Create Syllabus</span></i></a></td>
                  <td class="col-lg-1"><a href="syllabus2.php"><i class="glyphicon glyphicon-edit editsyllabus"><span class="editsyllabustext">Edit Syllabus</span></i></a></td>
                </tr>
                <tr>
                  <td><a>Network Security</a></td>
                  <td class="col-lg-1"><a href="syllabus.php"><i class="glyphicon glyphicon-pencil createsyllabus"><span class="createsyllabustext">Create Syllabus</span></i></a></td>
                  <td class="col-lg-1"><a href="syllabus2.php"><i class="glyphicon glyphicon-edit editsyllabus"><span class="editsyllabustext">Edit Syllabus</span></i></a></td>
                </tr>
                <tr>
                  <td><a>Multimedia</a></td>
                  <td class="col-lg-1"><a href="syllabus.php"><i class="glyphicon glyphicon-pencil createsyllabus"><span class="createsyllabustext">Create Syllabus</span></i></a></td>
                  <td class="col-lg-1"><a href="syllabus2.php"><i class="glyphicon glyphicon-edit editsyllabus"><span class="editsyllabustext">Edit Syllabus</span></i></a></td>
                </tr> -->
              </table>
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
</html>
