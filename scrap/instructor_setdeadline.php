<?php
include('header.php'); 
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="index.php" class="logo">

      <span class="logo-mini"><b>T</b>B</span>

      <span class="logo-lg"><b>Test </b>Bank</span>
    </a>

    <nav class="navbar navbar-static-top">

      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-print"></i>
              <span class="label label-info">1</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 1 printed TQ</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <h4>
                        Mr. E
                        <small><i class="fa fa-clock-o"></i> 15 mins</small>
                      </h4>
                      <p>Multimedia</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Printed TQ</a></li>
            </ul>
          </li>
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-check"></i>
              <span class="label label-success">2</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 2 approved Tq & TOS</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <h4>
                        Mr. A
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>IT Major 4</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <h4>
                        Mr. C
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Network Security</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Approved</a></li>
            </ul>
          </li>
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-share"></i>
              <span class="label label-warning">1</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 1 pending Tq & TOS</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <h4>
                        Mr. B
                        <small><i class="fa fa-clock-o"></i> 7 mins</small>
                      </h4>
                      <p>Current Trends</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Pending</a></li>
            </ul>
          </li>
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-edit"></i>
              <span class="label label-danger">1</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 1 rejected Tq & TOS</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <h4>
                        Mr. D
                        <small><i class="fa fa-clock-o"></i> 1 mins</small>
                      </h4>
                      <p>Multimedia</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Rejected</a></li>
            </ul>
          </li>
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-time"></i>
              <span class="label bg-orange-active">1</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 1 late Tq & TOS</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <h4>
                        Mr. D
                        <small><i class="fa fa-clock-o"></i> 29 mins</small>
                      </h4>
                      <p>Multimedia</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Late</a></li>
            </ul>
          </li>
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
        <li id="syllabus_tab">
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
              <small class="label label-primary">6</small>
            </span>
            <span>Notifications</span>
          </a>
        </li>
        <li id="reports_tab">
          <a href="instructor_reports.php">
            <i class="fa fa-folder"></i> <span>Reports</span>
          </a>
        </li>
        <li  class="active" id="setdate_tab">
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><b>Set Exam Schedule</b></h3>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding" style="height:230px;">
              <table class="table table-hover">
                <tr>
                  <td>Prelim</td>
                  <td>From</td>
                  <td><input type='date' name='date' class='form-control' min='1950-01-02' required></td>
                  <td>To</td>
                  <td><input type='date' name='date' class='form-control' min='1950-01-02' required></td>
                  <td>
                <button class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Save Schedule</button>
                
                <button class="btn btn-default"><i class="glyphicon glyphicon-edit"></i> Update Schedule</button>
                </td>
                
                
                </tr>
                <tr>
                  <td>Midterm</td>
                  <td>From</td>
                  <td><input type='date' name='date' class='form-control' min='1950-01-02' required></td>
                  <td>To</td>
                  <td><input type='date' name='date' class='form-control' min='1950-01-02' required></td>
                  
                  <td>
                <button class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Save Schedule</button>
                
                <button class="btn btn-default"><i class="glyphicon glyphicon-edit"></i> Update Schedule</button>
                </td>
               
                 
                </tr>
                <tr>
                  <td>Prefinal</td>
                  <td>From</td>
                  <td><input type='date' name='date' class='form-control' min='1950-01-02' required></td>
                  <td>To</td>
                  <td><input type='date' name='date' class='form-control' min='1950-01-02' required></td>
                  <td>
                <button class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Save Schedule</button>
                
                <button class="btn btn-default"><i class="glyphicon glyphicon-edit"></i> Update Schedule</button>
                </td>
               
          
                </tr>
                <tr>
                  <td>Final</td>
                  <td>From</td>
                  <td><input type='date' name='date' class='form-control' min='1950-01-02' required></td>
                  <td>To</td>
                  <td><input type='date' name='date' class='form-control' min='1950-01-02' required></td>
                  <td>
                <button class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Save Schedule</button>
                
                <button class="btn btn-default"><i class="glyphicon glyphicon-edit"></i> Update Schedule</button>
                </td>
           
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><b>Set Deadline Submission of TQ & TOS</b></h3>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding" style="height:230px;">
              <table class="table table-hover">
                <tr>
                  <td>Prelim</td>
                  <td>Deadline</td>
                  <td><input type='date' name='date' class='form-control' min='1950-01-02' required></td>
                  <td>
                <button class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Save Deadline</button>
                
                <button class="btn btn-default"><i class="glyphicon glyphicon-edit"></i> Update Deadline</button>
                </td>
                
                
                </tr>
                <tr>
                  <td>Midterm</td>
                  <td>Deadline</td>
                  <td><input type='date' name='date' class='form-control' min='1950-01-02' required></td>
                  
                  <td>
                <button class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Save Deadline</button>
                
                <button class="btn btn-default"><i class="glyphicon glyphicon-edit"></i> Update Deadline</button>
                </td>
               
                 
                </tr>
                <tr>
                  <td>Prefinal</td>
                  <td>Deadline</td>
                  <td><input type='date' name='date' class='form-control' min='1950-01-02' required></td>
                  <td>
                <button class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Save Deadline</button>
                
                <button class="btn btn-default"><i class="glyphicon glyphicon-edit"></i> Update Deadline</button>
                </td>
               
          
                </tr>
                <tr>
                  <td>Final</td>
                  <td>Deadline</td>
                  <td><input type='date' name='date' class='form-control' min='1950-01-02' required></td>
                  <td>
                <button class="btn btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> Save Deadline</button>
                
                <button class="btn btn-default"><i class="glyphicon glyphicon-edit"></i> Update Deadline</button>
                </td>
           
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
  </div>
  <?php
include('footer.php'); 
?>
</body>
</html>
