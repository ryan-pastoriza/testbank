<?php
include('header.php'); 
include('class.php');
if($user_check=="print"){
}else{
  if ($position_session=="Instructor") {
    header('Location: instructor_index.php'); 
  }else if ($position_session=="Program Head") {
    header('Location: ph_index.php'); 
  }else if ($position_session=="Dean") {
    header('Location: dean_index.php');  
  }
}
$class= new testbank();
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
    <section class="content">
      <div class="box-body table-responsive no-padding" >
        <section class="col-lg-6">
          <div class="box table-responsive" >
            <div class="box-header">
                <h5><b>Ready to Print TQ</b></h5>
            </div>
            <div class="box-body no-padding">
              <div class="nav-tabs-custom">
                <ul class="nav nav-pills">
                  <li class="nav-item active"><a href="#a" class="nav-link" data-toggle="tab">College</a></li>
                  <li class="nav-item"><a href="#b" class="nav-link" data-toggle="tab">SHS</a></li>
                </ul>
                <div class="tab-content " id="testtable">
                  <div class=" active tab-pane box-primary" id="a" style="height:470px;">
                    <table class="table table-bordered">
                      <tr>
                        <th class="col-xs-5">Name</th>
                        <th class="col-xs-4">Subject</th>
                        <th class="col-xs-1">Copies</th>
                        <th class="col-xs-2"></th>
                      </tr>
                        <?php $class->loadprint1(); ?>
                    </table>
                  </div>
                  <div class="tab-pane box-primary" id="b" style="height:470px;">
                    <table class="table table-bordered">
                      <tr>
                        <th class="col-xs-5">Name</th>
                        <th class="col-xs-4">Subject</th>
                        <th class="col-xs-1">Copies</th>
                        <th class="col-xs-2"></th>
                      </tr>
                        <?php $class->shsloadprint1(); ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="col-lg-6">
          <div class="box table-responsive " >
            <div class="box-header">
                <h5><b>Printed TQ</b></h5>
            </div>
            <div class="box-body no-padding">
              <div class="nav-tabs-custom">
                <ul class="nav nav-pills">
                  <li class="nav-item active"><a href="#c" class="nav-link" data-toggle="tab">College</a></li>
                  <li class="nav-item"><a href="#d" class="nav-link" data-toggle="tab">SHS</a></li>
                </ul>
                <div class="tab-content " id="testtable">
                  <div class=" active tab-pane box-primary" id="c" style="height:470px;">
                    <table class="table table-bordered">
                      <tr>
                        <th class="col-xs-5">Name</th>
                        <th class="col-xs-4">Subject</th>
                        <th class="col-xs-1">Copies</th>
                        <th class="col-xs-2"></th>
                      </tr>
                        <?php $class->loadprint2(); ?>
                    </table>
                  </div>
                  <div class="tab-pane box-primary" id="d" style="height:470px;">
                    <table class="table table-bordered">
                      <tr>
                        <th class="col-xs-5">Name</th>
                        <th class="col-xs-4">Subject</th>
                        <th class="col-xs-1">Copies</th>
                        <th class="col-xs-2"></th>
                      </tr>
                        <?php $class->shsloadprint2(); ?>
                    </table>
                  </div>
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
</html>
