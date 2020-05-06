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
        <li id="dashboard_tab">
          <a href="index3.php">
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
          </a>
        </li>
        <li id="syllabus_tab">
          <a href="index.php">
            <i class="glyphicon glyphicon-pencil"></i><span>Syllabus</span>
          </a>
        </li>
        <li id="tq_tab">
          <a href="index2.php">
            <i class="glyphicon glyphicon-list-alt"></i> <span>Test Questionnaire</span>
          </a>
        </li>
        <li id="tqcheck_tab">
          <a href="tqcheck.php">
            <i class="glyphicon glyphicon-list-alt"></i> <span>Test Questionnaire</span>
          </a>
        </li>
        <li class="active" id="notification_tab">
          <a href="notifications.php">
            <i class="fa fa-bell-o"></i> 
            <span class="pull-right-container">
              <small class="label label-primary">6</small>
            </span>
            <span>Notifications</span>
          </a>
        </li>
        <li id="queue_tab">
          <a href="queue.php">
            <i class="fa fa-book"></i> 
            <span class="pull-right-container">
              <small class="label label-primary">3</small>
            </span>
            <span>Queue</span>
          </a>
        </li>
        <li id="phqueue_tab">
          <a href="phqueue.php">
            <i class="fa fa-book"></i> 
            <span class="pull-right-container">
              <small class="label label-primary">3</small>
            </span>
            <span>Queue</span>
          </a>
        </li>
        <li id="deanqueue_tab">
          <a href="deanqueue.php">
            <i class="fa fa-book"></i> 
            <span class="pull-right-container">
              <small class="label label-primary">3</small>
            </span>
            <span>Queue</span>
          </a>
        </li>
        <li id="reports_tab">
          <a href="reports.php">
            <i class="fa fa-folder"></i> <span>Reports</span></a></li>
        <li id="access_tab">
          <a href="accessibility.php"><i class="glyphicon glyphicon-lock">
            </i> <span>Accessibilty</span></a></li>
        <li id="setdate_tab">
          <a href="setdeadline.php"><i class="glyphicon glyphicon-calendar">
            </i> <span>Set Date Submission</span></a>
        </li>
        <li>
          <a href="chat.php"><i class="fa fa-wechat">
            </i> <span>Messenger</span></a>
        </li>
      </ul>
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
              <h3 class="box-title"><b>Notifications</b></h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <!-- <input type="text" name="table_search" class="form-control pull-right" placeholder="Search"> -->

                  <div class="input-group-btn">
                    <!-- <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button> -->
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding" style="overflow-y:scroll; overflow-x:hidden; height:500px;">
              <table class="table table-hover">
                <tr>
                  <th class="col-xs-2">Subject</th>
                  <!-- <th class="col-xs-2">Instructor</th> -->
                  <th class="col-xs-2">Rejected Count</th>
                  <th class="col-xs-1">Date</th>
                  <th class="col-xs-1">Status</th>
                  <th class="col-xs-6">Remarks</th>
                </tr>
                <tr>
                  <td><a>IT Major 4</a></td>
                  <!-- <td>Mr. A</td> -->
                  <td>1</td>
                  <td>11-7-2014</td>
                  <td><span class="col-xs-12 label label-success">Approved</span></td>
                  <td>Done</td>
                </tr>
                <tr>
                  <td><a>Current Trends</a></td>
                  <!-- <td>Mr. B</td> -->
                  <td>1</td>
                  <td>11-7-2014</td>
                  <td><span class="col-xs-12 label label-warning">Pending</span></td>
                  <td>Waiting</td>
                </tr>
                <tr>
                  <td><a>Network Security</a></td>
                  <!-- <td>Mr. C</td> -->
                  <td>2</td>
                  <td>11-7-2014</td>
                  <td><span class="col-xs-12 label label-success">Approved</span></td>
                  <td>Done</td>
                </tr>
                <tr>
                  <td><a>Multimedia</a></td>
                  <!-- <td>Mr. D</td> -->
                  <td>1</td>
                  <td>11-7-2014</td>
                  <td><span class="col-xs-12 label label-danger">Rejected</span></td>
                  <td>restate test 2 number 3</td>
                </tr>
                <tr>
                  <td><a>Comfund</a></td>
                  <!-- <td>Mr. E</td> -->
                  <td>3</td>
                  <td>11-7-2014</td>
                  <td><span class="col-xs-12 label label-primary">Printed</span></td>
                  <td>Claim</td>
                </tr>
                <tr>
                  <td><a>Environmental Science</a></td>
                  <!-- <td>Mr. E</td> -->
                  <td>3</td>
                  <td>11-7-2014</td>
                  <td><span class="col-xs-12 label bg-orange-active">Late</span></td>
                  <td>late</td>
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
