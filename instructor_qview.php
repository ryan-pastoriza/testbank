<?php
include('header.php'); 
include 'class.php';
$class = new testbank();
if ( !empty ( $_GET ) ) {
  $q_id=$_GET['q_id'];
  $tq_id=$_GET['tq_id'];
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
      <ul class="sidebar-menu">
        <li class="header"><b>MAIN NAVIGATION</b></li>
        <li id="dashboard_tab">
          <?php 
          if ($position_session=="Instructor") {
            echo '<a href="instructor_index.php">';
          }else if ($position_session=="Program Head") {
            echo '<a href="ph_index.php">';
          }else if ($position_session=="Dean") {
            echo '<a href="dean_index.php">';
          }
          ?>
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
          </a>
        </li>
        <li id="syllabus_tab">
          <a href="syllabus_index.php">
            <i class="glyphicon glyphicon-pencil"></i><span>Syllabus</span>
          </a>
        </li>
        <li class="active" id="tq_tab">
          <a href="tq_index.php">
            <i class="glyphicon glyphicon-list-alt"></i> <span>Test Questionnaire</span>
          </a>
        </li>
        <?php 
          if ($position_session=="Instructor") {
            
          }else if ($position_session=="Program Head") {
            echo ' <li id="queue_tab"><a href="ph_queue.php" id="notificationLink" onclick="getNotification10()"><i class="fa fa-book"></i> 
            <span class="pull-right-container">
              <small class="label label-primary" id="count16_2"></small>
            </span>
            <span>Queue</span>
          </a>
        </li>';
          }else if ($position_session=="Dean") {
            echo '<li id="queue_tab"><a href="dean_queue.php" id="notificationLink" onclick="getNotification10()"><i class="fa fa-book"></i> 
            <span class="pull-right-container">
              <small class="label label-primary" id="count16_2"></small>
            </span>
            <span>Queue</span>
          </a>
        </li>';
          }
          ?>
        <li id="notification_tab">
          <?php 
          if ($position_session=="Instructor") {
            echo '<a href="instructor_notifications.php">';
          }else if ($position_session=="Program Head") {
            echo '<a href="ph_notifications.php">';
          }else if ($position_session=="Dean") {
            echo '<a href="dean_notifications.php">';
          }
          ?>
            <i class="fa fa-bell-o"></i> 
            <span class="pull-right-container">
              <small class="label label-primary" id="count5"></small>
            </span>
            <span>Notifications</span>
          </a>
        </li>
        <li id="reports_tab">
          <?php 
          if ($position_session=="Instructor") {
            echo '<a href="instructor_reports.php">';
          }else if ($position_session=="Program Head") {
            echo '<a href="ph_reports.php">';
          }else if ($position_session=="Dean") {
            echo '<a href="dean_reports.php">';
          }
          ?>
            <i class="fa fa-folder"></i> <span>Reports</span>
          </a>
        </li>
        <?php
        if ($position_session=="Dean") {
            echo '<li id="setdate_tab">
          <a href="dean_setdeadline.php">
          <i class="glyphicon glyphicon-calendar">
            </i> <span>Set Date Submission</span></a>
        </li>';
          }
          ?>
        <li>
          <?php 
          if ($position_session=="Instructor") {
            echo '<a href="instructor_chat.php">';
          }else if ($position_session=="Program Head") {
            echo '<a href="ph_chat.php">';
          }else if ($position_session=="Dean") {
            echo '<a href="dean_chat.php">';
          }
          ?>
        <i class="fa fa-wechat">
            </i> <span>Messenger</span></a>
        </li>
      </ul>
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
                  <div class="col-lg-12" style="overflow-y:scroll; overflow-x:hidden; height:400px;">
                    <?php include('qtemp.php'); ?>
                  </div>
                </div>
              </div>
              <div class="box-footer clearfix">
                <div class="row">
                  <div class="col-md-12">
                    <form method="post">
                      <button type="submit" class="pull-right btn btn-primary" id="copy" name="copy">
                      <i class="glyphicon glyphicon-download-alt"></i> Copy Question </button>
                    </form>
                    <?php 
                      if (isset($_POST['copy'])) {
                        $class->copyq($q_id, $tq_id);
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
</html>
