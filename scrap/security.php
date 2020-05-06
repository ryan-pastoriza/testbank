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
              <span id="time"></span>
            </i></a> 
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
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a><a href="logout.php">logout</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"><b>MAIN NAVIGATION</b></li>
        <li>
          <a href="index3.php">
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="index.php">
            <i class="glyphicon glyphicon-pencil"></i><span>Syllabus</span>
          </a>
        </li>
        <li>
          <a href="index2.php">
            <i class="glyphicon glyphicon-list-alt"></i> <span>Test Questionnaire</span>
          </a>
        </li>
        <li>
        <li>
          <a href="notifications.php">
           <i class="fa fa-bell-o"></i> 
            <span class="pull-right-container">
              <small class="label label-primary">1</small>
              <small class="label label-success">2</small>
              <small class="label label-warning">1</small>
              <small class="label label-danger">1</small>
            </span>
            <span>Notifications</span>
          </a>
        </li>
        <li>
          <a href="queue.php">
            <i class="fa fa-book"></i> 
            <span class="pull-right-container">
              <small class="label label-warning">3</small>
            </span>
            <span>Queue</span>
          </a>
        </li>
        <li>
          <a href="reports.php">
            <i class="fa fa-folder"></i> <span>Reports</span></a></li>
        <li class="active">
          <a href="accessibility.php"><i class="glyphicon glyphicon-lock">
            </i> <span>Accessibilty</span></a></li>
        <li>
          <a href="setdate.php"><i class="glyphicon glyphicon-calendar">
            </i> <span>Set Date Submission</span></a></li>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Security</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th class="col-xs-2">Name</th>
                  <th class="col-xs-2">Username</th>
                  <th class="col-xs-2">Password</th>
                  <th class="col-xs-1">Position</th>
                  <th class="col-xs-1">Sylabus</th>
                  <th class="col-xs-1">TQ</th>
                  <th class="col-xs-1">Notification</th>
                  <th class="col-xs-1">Queue</th>
                  <th class="col-xs-1">Reports</th>
                </tr>
                <tr>
                  <td>Mr. A</td>
                  <td><input type="text" name="username" class="form-control" id="username" placeholder="Enter username"></td>
                  <td><input type="text" name="password" class="form-control" id="password" placeholder="Enter password"></td>
                  <td><span class="col-xs-12 label label-primary">Instructor</span></td>
                  <td><input type="checkbox" class="minimal"></td>
                  <td><input type="checkbox" class="minimal"></td>
                  <td><input type="checkbox" class="minimal"></td>
                  <td><input type="checkbox" class="minimal"></td>
                  <td><input type="checkbox" class="minimal"></td>
                </tr>
                <tr>
                  <td>Mr. D</td>
                  <td><input type="text" name="username" class="form-control" id="username" placeholder="Enter username"></td>
                  <td><input type="text" name="password" class="form-control" id="password" placeholder="Enter password"></td>
                  <td><span class="col-xs-12 label label-danger">Dean</span></td>
                  <td><input type="checkbox" class="minimal"></td>
                  <td><input type="checkbox" class="minimal"></td>
                  <td><input type="checkbox" class="minimal"></td>
                  <td><input type="checkbox" class="minimal"></td>
                  <td><input type="checkbox" class="minimal"></td>
                </tr>
                <tr>
                  <td>Mr. C</td>
                  <td><input type="text" name="username" class="form-control" id="username" placeholder="Enter username"></td>
                  <td><input type="text" name="password" class="form-control" id="password" placeholder="Enter password"></td>
                  <td><span class="col-xs-12 label label-warning">Program Head</span></td>
                  <td><input type="checkbox" class="minimal"></td>
                  <td><input type="checkbox" class="minimal"></td>
                  <td><input type="checkbox" class="minimal"></td>
                  <td><input type="checkbox" class="minimal"></td>
                  <td><input type="checkbox" class="minimal"></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="box-footer clearfix">
              <button type="button" class="pull-right btn btn-default" id="save">
                <i class="glyphicon glyphicon-floppy-save"></i> Save </button>
            </div>
      </div>
    </section>
  </div>
<?php
include('footer.php'); 
?>
</body>
</html>
