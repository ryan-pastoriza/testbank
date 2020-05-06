<?php
include('header.php'); 
include 'class.php';
$class = new testbank();
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
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $fullname_session; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a><a href="logout.php">logout</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"><b>MAIN NAVIGATION</b></li>
        <li id="dashboard_tab">
          <a href="instructor_index.php">
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
          </a>
        </li>
        <li class="active" id="syllabus_tab">
          <a href="syllabus_index.php">
            <i class="glyphicon glyphicon-pencil"></i><span>Syllabus</span>
          </a>
        </li>
        <li id="tq_tab">
          <a href="tq_index.php">
            <i class="glyphicon glyphicon-list-alt"></i> <span>Test Questionnaire</span>
          </a>
        </li>
        <li id="notification_tab">
          <a href="instructor_notifications.php">
            <i class="fa fa-bell-o"></i> 
            <span class="pull-right-container">
              <small class="label label-primary" id="count5"></small>
            </span>
            <span>Notifications</span>
          </a>
        </li>
        <li id="reports_tab">
          <a href="instructor_reports.php">
            <i class="fa fa-folder"></i> <span>Reports</span>
          </a>
        </li>
        <li id="setdate_tab">
          <a href="instructor_setdeadline.php"><i class="glyphicon glyphicon-calendar">
            </i> <span>Set Date Submission</span></a>
        </li>
        <li>
          <a href="instructor_chat.php"><i class="fa fa-wechat">
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
        <section class="col-lg-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Subject List</b></h3>
            </div>
            <div class="box-body table-responsive no-padding" style="overflow-y:scroll; overflow-x:hidden; height:500px;">
              <table class="table table-hover">

              <?php $class->loadsub($login_id); ?>


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
</html>
