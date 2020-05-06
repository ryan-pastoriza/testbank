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
        <li id="notification_tab">
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
          <a href="queue.php">
            <i class="fa fa-book"></i> 
            <span class="pull-right-container">
              <small class="label label-primary">3</small>
            </span>
            <span>Queue</span>
          </a>
        </li>
        <li class="active" id="reports_tab">
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
    <section class="content">
      <div class="row">
        <section class="col-lg-12">
          <div class="box ">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <!-- <div class="row"> -->
                  <div class="col-xs-12">
                    <a href="#atq" data-toggle="tab"><button type="button" class="btn bg-green color-palette btn-xs" style="width:114px;">Approved TQ</button></a>
                    <a href="#atos" data-toggle="tab"><button type="button" class="btn bg-green color-palette btn-xs" style="width:114px;">Approved TOS</button></a>
                    <a href="#rtq" data-toggle="tab"><button type="button" class="btn btn-danger btn-xs" style="width:114px;">Rejected TQ</button></a>
                    <a href="#rtos" data-toggle="tab"><button type="button" class="btn btn-danger btn-xs" style="width:114px;">Rejected TOS</button></a>
                    <a href="#prtq" data-toggle="tab"><button type="button" class="btn btn-primary btn-xs" style="width:114px;">Printed TQ</button></a>
                    <a href="#ptq" data-toggle="tab"><button type="button" class="btn btn-warning btn-xs" style="width:114px;">Pending TQ</button></a>
                    <a href="#ptos" data-toggle="tab"><button type="button" class="btn btn-warning btn-xs" style="width:114px;">Pending TOS</button></a>
                    <a href="#ltq" data-toggle="tab"><button type="button" class="btn bg-orange-active btn-xs" style="width:114px;">Late TQ</button></a>
                    <a href="#ltos" data-toggle="tab"><button type="button" class="btn bg-orange-active btn-xs" style="width:114px;">Late TOS</button></a>
                  </div>
                <!-- </div>  -->
              </ul>
              <div class="tab-content">
                <div class="active tab-pane " id="atq"  style="overflow-y:scroll; overflow-x:hidden; height:470px;">
                  <div class="col-md-12">
                    <div class="table-responsive mailbox-messages">
                      <div class="box-header with-border">
                        <h3 class="box-title">Approved TQ</h3>
                      </div>
                      <table class="table table-hover table-striped">
                        <tr>
                          <th>Subject Code</th>
                          <th>Subject Name</th>
                          <th>Instructor</th>
                          <th>Rejected Count</th>
                          <th>Term</th>
                          <th>Semester</th>
                        </tr>
                        <tr>
                          <td>ITMAJE3</td>
                          <td>IT Major 3</td>
                          <td>John Smith</td>
                          <td>1</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                        <tr>
                          <td>OOPIT2A</td>
                          <td>Object Oriented Programming</td>
                          <td>Paul Runner</td>
                          <td>3</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                        <tr>
                          <td>PE2</td>
                          <td>Physical Education 2</td>
                          <td>John Lee Davis</td>
                          <td>4</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="atos"  style="overflow-y:scroll; overflow-x:hidden; height:470px;">
                  <div class="col-md-12">
                    <div class="table-responsive mailbox-messages">
                      <div class="box-header with-border">
                        <h3 class="box-title">Approved TOS</h3>
                      </div>
                      <table class="table table-hover table-striped">
                        <tr>
                          <th>Subject Code</th>
                          <th>Subject Name</th>
                          <th>Instructor</th>
                          <th>Rejected Count</th>
                          <th>Term</th>
                          <th>Semester</th>
                        </tr>
                        <tr>
                          <td>ITPIT2A</td>
                          <td>Intro to Programming</td>
                          <td>Mr. B</td>
                          <td>3</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                        <tr>
                          <td>ITMAJE3</td>
                          <td>IT Major 1</td>
                          <td>Mr. A</td>
                          <td>4</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                        <tr>
                          <td>PE3</td>
                          <td>Physical Education 3</td>
                          <td>Mr. C</td>
                          <td>3</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="rtq"  style="overflow-y:scroll; overflow-x:hidden; height:470px;">
                  <div class="col-md-12">
                    <div class="table-responsive mailbox-messages">
                      <div class="box-header with-border">
                        <h3 class="box-title">Rejected TQ</h3>
                      </div>
                      <table class="table table-hover table-striped">
                        <tr>
                          <th>Subject Code</th>
                          <th>Subject Name</th>
                          <th>Instructor</th>
                          <th>Rejected Count</th>
                          <th>Term</th>
                          <th>Semester</th>
                        </tr>
                        <tr>
                          <td>PE3</td>
                          <td>Physical Education 3</td>
                          <td>Mr. C</td>
                          <td>2</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                        <tr>
                          <td>OOPIT2A</td>
                          <td>Object Oriented Programming</td>
                          <td>Paul Runner</td>
                          <td>3</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                        <tr>
                          <td>PE2</td>
                          <td>Physical Education 2</td>
                          <td>John Lee Davis</td>
                          <td>4</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="rtos"  style="overflow-y:scroll; overflow-x:hidden; height:470px;">
                  <div class="col-md-12">
                    <div class="table-responsive mailbox-messages">
                      <div class="box-header with-border">
                        <h3 class="box-title">Rejected TQ</h3>
                      </div>
                      <table class="table table-hover table-striped">
                        <tr>
                          <th>Subject Code</th>
                          <th>Subject Name</th>
                          <th>Instructor</th>
                          <th>Rejected Count</th>
                          <th>Term</th>
                          <th>Semester</th>
                        </tr>
                        <tr>
                          <td>ITPIT2A</td>
                          <td>Intro to Programming</td>
                          <td>Mr. B</td>
                          <td>2</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                        <tr>
                          <td>OOPIT2A</td>
                          <td>Object Oriented Programming</td>
                          <td>Paul Runner</td>
                          <td>3</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                        <tr>
                          <td>PE3</td>
                          <td>Physical Education 3</td>
                          <td>Mr. C</td>
                          <td>3</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="prtq"  style="overflow-y:scroll; overflow-x:hidden; height:470px;">
                  <div class="col-md-12">
                    <div class="table-responsive mailbox-messages">
                      <div class="box-header with-border">
                        <h3 class="box-title">Printed TQ</h3>
                      </div>
                      <table class="table table-hover table-striped">
                        <tr>
                          <th>Subject Code</th>
                          <th>Subject Name</th>
                          <th>Instructor</th>
                          <th>Rejected Count</th>
                          <th>Term</th>
                          <th>Semester</th>
                        </tr>
                        <tr>
                          <td>ITMAJE3</td>
                          <td>IT Major 3</td>
                          <td>John Smith</td>
                          <td>2</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                        <tr>
                          <td>ITPIT2A</td>
                          <td>Intro to Programming</td>
                          <td>Mr. B</td>
                          <td>6</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                        <tr>
                          <td>PE2</td>
                          <td>Physical Education 2</td>
                          <td>John Lee Davis</td>
                          <td>3</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="ptq"  style="overflow-y:scroll; overflow-x:hidden; height:470px;">
                  <div class="col-md-12">
                    <div class="table-responsive mailbox-messages">
                      <div class="box-header with-border">
                        <h3 class="box-title">Pending TQ</h3>
                      </div>
                      <table class="table table-hover table-striped">
                        <tr>
                          <th>Subject Code</th>
                          <th>Subject Name</th>
                          <th>Instructor</th>
                          <th>Rejected Count</th>
                          <th>Term</th>
                          <th>Semester</th>
                        </tr>
                        <tr>
                          <td>ITPIT2A</td>
                          <td>Intro to Programming</td>
                          <td>Mr. B</td>
                          <td>3</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                        <tr>
                          <td>OOPIT2A</td>
                          <td>Object Oriented Programming</td>
                          <td>Paul Runner</td>
                          <td>3</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                        <tr>
                          <td>PE3</td>
                          <td>Physical Education 3</td>
                          <td>Mr. C</td>
                          <td>3</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="ptos"  style="overflow-y:scroll; overflow-x:hidden; height:470px;">
                  <div class="col-md-12">
                    <div class="table-responsive mailbox-messages">
                      <div class="box-header with-border">
                        <h3 class="box-title">Pending TQ</h3>
                      </div>
                      <table class="table table-hover table-striped">
                        <tr>
                          <th>Subject Code</th>
                          <th>Subject Name</th>
                          <th>Instructor</th>
                          <th>Rejected Count</th>
                          <th>Term</th>
                          <th>Semester</th>
                        </tr>
                        <tr>
                          <td>ITMAJE3</td>
                          <td>IT Major 3</td>
                          <td>John Smith</td>
                          <td>3</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                        <tr>
                          <td>PE3</td>
                          <td>Physical Education 3</td>
                          <td>Mr. C</td>
                          <td>3</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                        <tr>
                          <td>ITPIT2A</td>
                          <td>Intro to Programming</td>
                          <td>Mr. B</td>
                          <td>3</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="ltq"  style="overflow-y:scroll; overflow-x:hidden; height:470px;">
                  <div class="col-md-12">
                    <div class="table-responsive mailbox-messages">
                      <div class="box-header with-border">
                        <h3 class="box-title">Late TQ</h3>
                      </div>
                      <table class="table table-hover table-striped">
                        <tr>
                          <th>Subject Code</th>
                          <th>Subject Name</th>
                          <th>Instructor</th>
                          <th>Rejected Count</th>
                          <th>Term</th>
                          <th>Semester</th>
                        </tr>
                        <tr>
                          <td>ITMAJE3</td>
                          <td>IT Major 3</td>
                          <td>John Smith</td>
                          <td>2</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                        <tr>
                          <td>OOPIT2A</td>
                          <td>Object Oriented Programming</td>
                          <td>Paul Runner</td>
                          <td>2</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                        <tr>
                          <td>PE3</td>
                          <td>Physical Education 3</td>
                          <td>Mr. C</td>
                          <td>2</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="ltos"  style="overflow-y:scroll; overflow-x:hidden; height:470px;">
                  <div class="col-md-12">
                    <div class="table-responsive mailbox-messages">
                      <div class="box-header with-border">
                        <h3 class="box-title">Late TQ</h3>
                      </div>
                      <table class="table table-hover table-striped">
                        <tr>
                          <th>Subject Code</th>
                          <th>Subject Name</th>
                          <th>Instructor</th>
                          <th>Rejected Count</th>
                          <th>Term</th>
                          <th>Semester</th>
                        </tr>
                        <tr>
                          <td>ITMAJE3</td>
                          <td>IT Major 3</td>
                          <td>John Smith</td>
                          <td>2</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                        <tr>
                          <td>OOPIT2A</td>
                          <td>Object Oriented Programming</td>
                          <td>Paul Runner</td>
                          <td>2</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                        <tr>
                          <td>PE2</td>
                          <td>Physical Education 2</td>
                          <td>John Lee Davis</td>
                          <td>2</td>
                          <td>Midterm</td>
                          <td>2nd Semester</td>
                        </tr>
                      </table>
                    </div>
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
