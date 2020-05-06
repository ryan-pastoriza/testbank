<?php
include('header.php'); 
include 'class.php';
$class = new testbank();
if ( !empty ( $_GET ) ) {
  $syllabus_id=$_GET['syllabus_id'];
  $subj_id=$_GET['subj_id'];
  $emp_id=$_GET['emp_id'];
  $class->loaddb();
  $sql = "SELECT `sched_subj`.ss_id,`subject`.subj_id, `subject`.subj_code, `subject`.subj_name, `subject`.subj_desc, unit_lecture.unit FROM sched_subj INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN unit_lecture ON unit_lecture.subj_id = `subject`.subj_id WHERE sched_subj.employment_id = $emp_id AND subject.subj_id= $subj_id";
  $result = mysql_query($sql);
    if(!$result){
      echo 'Database Error!';
    }else{
      while($row=mysql_fetch_array($result)){
        $ss_id=$row['ss_id'];
        $subj_id1=$row['subj_id'];
        $subj_code1=$row['subj_code'];
        $subj_name1=$row['subj_name'];
        $subj_desc1=$row['subj_desc'];
        $unit1=$row['unit'];
      }
    }
  $sqltopic="SELECT DISTINCT topics.topic_description FROM sched_subj INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN unit_lecture ON unit_lecture.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN topics ON topics.syllabus_id = syllabus.syllabus_id WHERE sched_subj.employment_id = 888 AND subject.subj_id= 2 ";
  $result = mysql_query($sqltopic);
    if(!$result){
      echo 'Database Error!';
    }else{
      while($row=mysql_fetch_array($result)){
        $topic_description=$row['topic_description'];
      }
    }
}
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="index.php" class="logo">

      <span class="logo-mini"><b>T</b>B</span>

      <span class="logo-lg"><b>Test</b>Bank</span>
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
        <li class="active" id="tq_tab">
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
        <section class="col-lg-7">
         
          <!-- Create TQ widget -->
          <div class="box  box-primary">
            <div class="box-header">
              <i  class="glyphicon glyphicon-list-alt"></i>
              <h3 class="box-title">Create TQ</h3>
            </div>
            <div class="box-body">
              <form action="#" method="post">
                <div class="row">
                  <div class="col-sm-5">
                    <label>Subject Code</label>
                    <input type="text" disabled="disable" class="form-control input-sm" value="<?php echo $subj_code1;?>" name="subject" >
                  </div>
                  <div class="col-sm-7">
                    <label>Subject Description</label>
                    <input type="text" disabled="disable" class="form-control input-sm" value="<?php echo $subj_desc1;?>" name="subject" >
                  </div>
                </div>
                <br>
                <div class="nav-tabs-custom">
                  <ul class="nav nav-tabs">
                    <li class="active" style="width:145px;"><a class="btn" href="#identab" data-toggle="tab">
                    <b>Identification</b>
                    <table>
                      <tr>
                        <td>
                          <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;
                        </td>
                        <td>
                          <b>&nbsp; Test &nbsp;</b>
                        </td>
                        <td>
                          <form role="form-sm">
                            <select class="form-control input-sm select" name="name[]" onchange="change(this)" id="identest">
                              <option value="">None</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                            </select>
                          </form>
                        </td>
                      </tr>
                    </table>
                    </a></li>
                    <li class="" style="width:145px;"><a class="btn" href="#enutab" data-toggle="tab">
                    <b>Enumeration</b>
                     <table>
                      <tr>
                        <td>
                          <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;
                        </td>
                        <td>
                          <b>&nbsp; Test &nbsp;</b>
                        </td>
                        <td>
                          <form role="form-sm">
                            <select class="form-control input-sm select" name="name[]" onchange="change(this)" id="enutest">
                              <option value="">None</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                            </select>
                          </form>
                        </td>
                      </tr>
                    </table>
                    </a></li>
                    <li class="" style="width:145px;"><a class="btn" href="#multitab" data-toggle="tab">
                    <b>Multiple Choice</b>
                    <table>
                      <tr>
                        <td>
                          <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;
                        </td>
                        <td>
                          <b>&nbsp; Test &nbsp;</b>
                        </td>
                        <td>
                          <form role="form-sm">
                           <select class="form-control input-sm select" name="name[]" onchange="change(this)" id="multitest">
                              <option value="">None</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option value="7">7</option>
                              <option value="8">8</option>
                            </select>
                          </form>
                        </td>
                      </tr>
                    </table>
                    </a></li>
                    <li class="" style="width:145px;"><a class="btn" href="#toftab" data-toggle="tab">
                    <b>True or False</b>
                      <table>
                        <tr>
                          <td>
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;
                          </td>
                          <td>
                            <b>&nbsp; Test &nbsp;</b>
                          </td>
                          <td>
                            <form role="form-sm">
                              <select class="form-control input-sm select" name="name[]" onchange="change(this)" id="toftest">
                                <option value="">None</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                              </select>
                            </form>
                          </td>
                        </tr>
                      </table>
                    </a></li>
                    <li class="" style="width:145px;"><a class="btn" href="#matchtab" data-toggle="tab">
                    <b>Matching Type</b>
                      <table>
                        <tr>
                          <td>
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;
                          </td>
                          <td>
                            <b>&nbsp; Test &nbsp;</b>
                          </td>
                          <td>
                            <form role="form-sm">
                              <select class="form-control input-sm select" name="name[]" onchange="change(this)" id="matchtest">
                                <option value="">None</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                              </select>
                            </form>
                          </td>
                        </tr>
                      </table>
                    </a></li>
                    <li class="" style="width:145px;"><a class="btn" href="#probtab" data-toggle="tab">
                    <b> Problem Solving</b>
                      <table>
                        <tr>
                          <td>
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;
                          </td>
                          <td>
                            <b>&nbsp; Test &nbsp;</b>
                          </td>
                          <td>
                            <form role="form-sm">
                              <select class="form-control input-sm select" name="name[]" onchange="change(this)" id="probtest">
                                <option value="">None</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                              </select>
                            </form>
                          </td>
                        </tr>
                      </table>
                    </a></li>
                    <li class="" style="width:145px;"><a class="btn" href="#essaytab" data-toggle="tab">
                    <b>Essay</b>
                      <table>
                        <tr>
                          <td>
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;
                          </td>
                          <td>
                            <b>&nbsp; Test &nbsp;</b>
                          </td>
                          <td>
                            <form role="form-sm">
                              <select class="form-control input-sm select" name="name[]" onchange="change(this)" id="essaytest">
                                <option value="">None</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                              </select>
                            </form>
                          </td>
                        </tr>
                      </table>
                    </a></li>
                    <li class="" style="width:145px;"><a class="btn" href="#fitbtab" data-toggle="tab">
                    <b>Fill in the Blank</b>
                      <table>
                        <tr>
                          <td>
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;
                          </td>
                          <td>
                            <b>&nbsp; Test &nbsp;</b>
                          </td>
                          <td>
                            <form role="form-sm">
                              <select class="form-control input-sm select" name="name[]" onchange="change(this)" id="fitbtest">
                                <option value="">None</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                              </select>
                            </form>
                          </td>
                        </tr>
                      </table>
                    </a></li>
                  </ul>
                  <div class="box box default">
                    <div class="tab-content " id="testtable">
                      <div class="active tab-pane box-primary" id="identab">
                        <div class="col-lg-12" style="overflow-y:scroll; overflow-x:hidden; height:340px;">
                          <br>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Direction</span>
                                <input type="text" class="form-control" placeholder="Enter Test Direction" id="identd" aria-describedby="basic-addon1">
                                <span class="input-group-btn">
                                  <button class="btn btn-default idendirectimport" id="idendirectimport" name="idendirectimport" type="button"> 
                                    <i class="fa fa-paperclip"></i>
                                  </button>
                                </span>
                              </div>
                            </div>
                          </div>
                          <br>
                          <table class="table table-bordered" id="identification_field">
                            
                          </table>
                        </div>
                        <div class="box-body">
                          <table class="col-xs-12">
                            <tr>
                              <td class="col-xs-10">
                              </td>
                              <td class="col-xs-1">
                                <a href="#"><i class="glyphicon glyphicon-plus idenaddnum"><span class="idenaddnumtext">Add number</span></i></a>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <div class="tab-pane " id="enutab">
                        <div class="col-lg-12" style="overflow-y:scroll; overflow-x:hidden; height:340px;">
                          <br>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Direction</span>
                                <input type="text" class="form-control" placeholder="Enter Test Direction" id="enutd" aria-describedby="basic-addon1">
                                <span class="input-group-btn">
                                  <button class="btn btn-default enudirectimport" id="enudirectimport" name="enudirectimport" type="button"> 
                                    <i class="fa fa-paperclip"></i>
                                  </button>
                                </span>
                              </div>
                            </div>
                          </div>
                          <br>
                          <table class="table table-bordered" id="enumeration_field">
                            
                          </table>
                        </div>
                        <div class="box-body">
                          <table class="col-xs-12">
                            <tr>
                              <td class="col-xs-10">
                               
                              </td>
                              <td class="col-xs-1">
                                <a href="#"><i class="glyphicon glyphicon-plus enuaddnum"><span class="enuaddnumtext">Add number</span></i></a>
                              </td>
                              
                            </tr>
                          </table>
                        </div>
                      </div>
                      <div class="tab-pane " id="multitab">
                        <div class="col-lg-12" style="overflow-y:scroll; overflow-x:hidden; height:340px;">
                          <br>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Direction</span>
                                <input type="text" class="form-control" placeholder="Enter Test Direction" id="multitd" aria-describedby="basic-addon1">
                                <span class="input-group-btn">
                                  <button class="btn btn-default multidirectimport" id="multidirectimport" name="multidirectimport" type="button"> 
                                    <i class="fa fa-paperclip"></i>
                                  </button>
                                </span>
                              </div>
                            </div>
                          </div>
                          <br>
                          <table class="table table-bordered" id="multiplechoice_field">
                            
                          </table>
                        </div>
                        <div class="box-body">
                          <table class="col-xs-12">
                            <tr>
                              <td class="col-xs-10">
                                
                              </td>
                              <td class="col-xs-1">
                                <a href="#"><i class="glyphicon glyphicon-plus multiaddnum"><span class="multiaddnumtext">Add number</span></i></a>
                              </td>
                              
                            </tr>
                          </table>
                        </div>
                      </div>
                      <div class="tab-pane " id="toftab">
                        <div class="col-lg-12" style="overflow-y:scroll; overflow-x:hidden; height:340px;">
                          <br>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Direction</span>
                                <input type="text" class="form-control" placeholder="Enter Test Direction" id="toftd" aria-describedby="basic-addon1">
                                <span class="input-group-btn">
                                  <button class="btn btn-default tosdirectimport" id="tosdirectimport" name="tosdirectimport" type="button"> 
                                    <i class="fa fa-paperclip"></i>
                                  </button>
                                </span>
                              </div>
                            </div>
                          </div>
                          <br>
                          <table class="table table-bordered" id="trueorfalse_field">
                            
                          </table>
                        </div>
                        <div class="box-body">
                          <table class="col-xs-12">
                            <tr>
                              <td class="col-xs-10">
                                
                              </td>
                              <td class="col-xs-1">
                                <a href="#"><i class="glyphicon glyphicon-plus tofaddnum"><span class="tofaddnumtext">Add number</span></i></a>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <div class="tab-pane " id="matchtab">
                        <div class="col-lg-12" style="overflow-y:scroll; overflow-x:hidden; height:340px;">
                          <br>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Direction</span>
                                <input type="text" class="form-control" placeholder="Enter Test Direction" id="matchtd" aria-describedby="basic-addon1">
                                <span class="input-group-btn">
                                  <button class="btn btn-default matchdirectimport" id="matchdirectimport" name="matchdirectimport" type="button"> 
                                    <i class="fa fa-paperclip"></i>
                                  </button>
                                </span>
                              </div>
                            </div>
                          </div>
                          <br>
                          <table class="table table-bordered" id="matchingtype_field">

                          </table>
                        </div>
                        <div class="box-body">
                          <table class="col-xs-12">
                            <tr>
                              <td class="col-xs-10">
                                
                              </td>
                              <td class="col-xs-1">
                                <a href="#"><i class="glyphicon glyphicon-plus matchaddnum"><span class="matchaddnumtext">Add number</span></i></a>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <div class="tab-pane " id="probtab">
                        <div class="col-lg-12" style="overflow-y:scroll; overflow-x:hidden; height:340px;">
                          <br>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Direction</span>
                                <input type="text" class="form-control" placeholder="Enter Test Direction" id="probtd" aria-describedby="basic-addon1">
                                <span class="input-group-btn">
                                  <button class="btn btn-default probdirectimport" id="probdirectimport" name="probdirectimport" type="button"> 
                                    <i class="fa fa-paperclip"></i>
                                  </button>
                                </span>
                              </div>
                            </div>
                          </div>
                          <br>
                          <table class="table table-bordered" id="problemsolving_field">

                          </table>
                        </div>
                        <div class="box-body">
                          <table class="col-xs-12">
                            <tr>
                              <td class="col-xs-10">
                                
                              </td>
                              <td class="col-xs-1">
                                <a href="#"><i class="glyphicon glyphicon-plus probaddnum"><span class="probaddnumtext">Add number</span></i></a>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <div class="tab-pane " id="essaytab">
                        <div class="col-lg-12" style="overflow-y:scroll; overflow-x:hidden; height:340px;">
                          <br>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Direction</span>
                                <input type="text" class="form-control" placeholder="Enter Test Direction" id="probtd" aria-describedby="basic-addon1">
                                <span class="input-group-btn">
                                  <button class="btn btn-default essaydirectimport" id="essaydirectimport" name="essaydirectimport" type="button"> 
                                    <i class="fa fa-paperclip"></i>
                                  </button>
                                </span>
                              </div>
                            </div>
                          </div>
                          <br>
                          <table class="table table-bordered" id="essay_field">

                          </table>
                        </div>
                        <div class="box-body">
                          <table class="col-xs-12">
                            <tr>
                              <td class="col-xs-10">
                                
                              </td>
                              <td class="col-xs-1">
                                <a href="#"><i class="glyphicon glyphicon-plus essayaddnum"><span class="essayaddnumtext">Add number</span></i></a>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <div class=" tab-pane " id="fitbtab">
                        <div class="col-lg-12" style="overflow-y:scroll; overflow-x:hidden; height:340px;">
                          <br>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Direction</span>
                                <input type="text" class="form-control" placeholder="Enter Test Direction" id="probtd" aria-describedby="basic-addon1">
                                <span class="input-group-btn">
                                  <button class="btn btn-default fitbdirectimport" id="fitbdirectimport" name="fitbdirectimport" type="button"> 
                                    <i class="fa fa-paperclip"></i>
                                  </button>
                                </span>
                              </div>
                            </div>
                          </div>
                          <br>
                          <table class="table table-bordered" id="fitb_field">
                            
                          </table>
                        </div>
                        <div class="box-body">
                          <table class="col-xs-12">
                            <tr>
                              <td class="col-xs-10">
                                
                              </td>
                              <td class="col-xs-1">
                                <a href="#"><i class="glyphicon glyphicon-plus fitbaddnum"><span class="fitbaddnumtext">Add number</span></i></a>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="box-footer clearfix">
              <div class="row">
                <div class="col-xs-8">
                  <button type="button" class="pull-right btn btn-default" id="save">
                <i class="glyphicon glyphicon-floppy-save"></i> Save </button>
                </div>
                <div class="col-xs-2">
                  <button type="button" class="pull-right btn btn-primary" id="print" onclick="printDiv('testtable')">
                <i class="fa fa-print"></i> Print </button>
                </div>
                <div class="col-xs-2">
                  <button type="button" class="pull-right btn btn-success" id="submittoph">
                <i class="glyphicon glyphicon-floppy-save"></i> Submit </button>
                </div>
              </div>
            </div>
          </div>

        </section>
 <?php
include('tos.php'); 
?>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.4
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="dist/js/jquery-ui.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<!-- <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script> -->
<script src="plugins/morris/morris.min.js"></script>

<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script> -->
<!-- <script src="plugins/daterangepicker/daterangepicker.js"></script>
datepicker
<script src="plugins/datepicker/bootstrap-datepicker.js"></script> -->
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script type="text/javascript">
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
  </script>
<script>  
  var test_count=0;  
  var iden_num=0; 
  var enu_num=0;
  var enu_ans=1;
  var multi_num=0;
  var tof_num=0; 
  var match_num=0; 
  var prob_num=0; 
  var essay_num=0;
  var fitb_num=0;
  var multi_ans=1;

  $(document).on('click', '.idenaddnum', function(){  
           iden_num++;  
           $('#identification_field').append('<tr id="idennum'+iden_num+'"><td><div class="box-header idendel" ><a href="#" class="pull-right"><i class="glyphicon glyphicon-remove idendelnum" id="'+iden_num+'"><span class="idendelnumtext">Delete Number</span></i></a></div><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">'+iden_num+'.</span><input type="text" name="idenquestion'+iden_num+'" class="form-control" placeholder="Question" id="idenquestion'+iden_num+'" aria-describedby="basic-addon1"><span class="input-group-btn"><button class="btn btn-default idennumimport'+iden_num+'" id="idennumimport'+iden_num+'" name="idenimport'+iden_num+'" type="button"><i class="fa fa-paperclip"></i></button></span></div></div></div><br><div class="row"><div class="col-xs-4"><label for="topic">Topic</label><input type="text" name="identopic'+iden_num+'" class="form-control" id="identopic'+iden_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="idencognitive'+iden_num+'">Cognitive Domain</label><select class="form-control" id="idencognitive'+iden_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="idenpoints'+iden_num+'" class="form-control" id="idenpoints'+iden_num+'" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1"> Answer</span><input type="text" name="idenanswer'+iden_num+'" class="form-control" placeholder="Enter  Answer" id="idenanswer'+iden_num+'" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><textarea class="form-control" name="idenremarks'+iden_num+'" class="form-control" placeholder="" disabled="disable" id="idenremarks'+iden_num+'" rows="1" placeholder="Enter re-requisites / Co-requisites"></textarea></div></div></div><br></td></tr>');  
      });



  $(document).on('click', '.enuaddnum', function(){  
           enu_num++;  
           $('#enumeration_field').append('<tr id="enunum'+enu_num+'"><td><div class="col-xs-12 idendel"><a href="#" class="pull-right"><i class="glyphicon glyphicon-remove enudelnum" id="'+enu_num+'"><span class="enudelnumtext">Delete Number</span></i></a></div><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">'+enu_num+'.</span><input type="text" name="enuquestion'+enu_num+'" class="form-control" placeholder="Question" id="enuquestion'+enu_num+'" aria-describedby="basic-addon1"><span class="input-group-btn"><button class="btn btn-default enunumimport'+enu_num+'" id="enunumimport'+enu_num+'" name="enunumimport'+enu_num+'" type="button"><i class="fa fa-paperclip"></i></button></span></div></div></div><br><div class="row"><div class="col-xs-4"><label for="topic">Topic</label><input type="text" name="enutopic'+enu_num+'" class="form-control" id="enutopic'+enu_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="enucognitive'+enu_num+'">Cognitive Domain</label><select class="form-control" id="enucognitive'+enu_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="enupoints'+enu_num+'" class="form-control" id="enupoints'+enu_num+'" placeholder="Enter Points"></div></div><br><table class="table table-bordered" id="enumeration_answer_field'+enu_num+'"><tr><td><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Answer 1</span><input type="text" name="enuanswer'+enu_num+'" class="form-control" placeholder="Enter  Answer" id="enuanswer'+enu_num+'" aria-describedby="basic-addon1"><span class="input-group-addon" id="basic-addon1"><a href="#"><i id="'+enu_num+'" class="glyphicon glyphicon-plus enuaddans"><span class="enuaddanstext">Add</span></i></a></span></div></div></div></td></tr></table><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="enuremarks'+enu_num+'" class="form-control" placeholder="" disabled="disable" id="enuremarks'+enu_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr>');  
      });

  $(document).on('click', '.enuaddans', function(){  
           var button_id = $(this).attr("id");
           enu_ans++;  
           $('#enumeration_answer_field'+button_id+'').append('<tr id="enuansnum'+enu_ans+'"><td><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Answer '+enu_ans+'</span><input type="text" name="enuanswer'+enu_num+'" class="form-control" placeholder="Enter  Answer" id="enuanswer'+enu_num+'" aria-describedby="basic-addon1"><span class="input-group-addon" id="basic-addon1"><a href="#"><i id="'+enu_ans+'" class="glyphicon glyphicon-minus enudelans"><span class="enudelanstext">Remove</span></i></a></span></div></div></div></td></tr>');  
      });
  $(document).on('click', '.enudelans', function(){  
    var button_id = $(this).attr("id");   
    $('#enuansnum'+button_id+'').remove(); 
    enu_ans--; 
  });  





  $(document).on('click', '.multiaddnum', function(){  
           multi_num++;  
           $('#multiplechoice_field').append('<tr id="multinum'+multi_num+'"><td><div class="box-header" ><a href="#" class="pull-right"><i class="glyphicon glyphicon-remove multidelnum" id="'+multi_num+'"><span class="multidelnumtext">Delete Number</span></i></a></div><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">'+multi_num+'.</span><input type="text" name="multiquestion'+multi_num+'" class="form-control" placeholder="Question" id="multiquestion'+multi_num+'" aria-describedby="basic-addon1"><span class="input-group-btn"><button class="btn btn-default multinumimport" id="multinumimport" name="multinumimport" type="button"><i class="fa fa-paperclip"></i></button></span></div></div></div><br><div class="row"><div class="col-xs-4"><label for="topic">Topic</label><input type="text" name="multitopic'+multi_num+'" class="form-control" id="multitopic'+multi_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="multicognitive'+multi_num+'">Cognitive Domain</label><select class="form-control" id="multicognitive'+multi_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="multipoints'+multi_num+'" class="form-control" id="multipoints'+multi_num+'" placeholder="Enter Points"></div></div><br><table class="table table-bordered" id="multiplechoice'+multi_num+'_field"><tr><td><div class="row"><div class="col-xs-10"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Choice 1.</span><input type="text" name="multians1" class="form-control" placeholder="Enter Choice" id="" aria-describedby="basic-addon1"><span class="input-group-addon" id="basic-addon1"><a href="#"><i id="'+multi_ans+'" class="glyphicon glyphicon-plus multiaddans"><span class="multiaddanstext">Add</span></i></a></span></div></div><div class="col-xs-2"><label class="radio"><input type="radio" name="r1" class="minimal">Answer</label></div></div></td></tr></table><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="multiremarks'+multi_num+'" class="form-control" placeholder="" disabled="disable" id="multiremarks'+iden_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr>');  
      });

   $(document).on('click', '.multiaddans', function(){  
           var button_id = $(this).attr("id");
           multi_ans++;  
           $('#multiplechoice'+button_id+'_field').append('<tr id="multiansnum'+multi_ans+'"><td><div class="row"><div class="col-xs-10"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Choice '+multi_ans+'.</span><input type="text" name="multians1" class="form-control" placeholder="Enter Choice" id="" aria-describedby="basic-addon1"><span class="input-group-addon" id="basic-addon1"><a href="#"><i id="'+multi_ans+'" class="glyphicon glyphicon-minus multidelans"><span class="multidelanstext">Remove</span></i></a></span></div></div><div class="col-xs-2"><label class="radio"><input type="radio" name="r1" class="minimal">Answer</label></div></div></td></tr>');  
      });
  $(document).on('click', '.multidelans', function(){  
    var button_id = $(this).attr("id");   
    $('#multiansnum'+button_id+'').remove(); 
    multi_ans--; 
  });  





  $(document).on('click', '.tofaddnum', function(){  
           tof_num++;  
           $('#trueorfalse_field').append('<tr id="tofnum'+tof_num+'"><td> <div class="box-header" ><a href="#" class="pull-right"><i class="glyphicon glyphicon-remove tofdelnum" id="'+tof_num+'"><span class="tofdelnumtext">Delete Number</span></i></a></div><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">'+tof_num+'.</span><input type="text" name="tofquestion'+tof_num+'" class="form-control" placeholder="Question" id="tofquestion'+tof_num+'" aria-describedby="basic-addon1"><span class="input-group-btn"><button class="btn btn-default multinumimport" id="multinumimport" name="multinumimport" type="button"><i class="fa fa-paperclip"></i></button></span></div></div></div><br><div class="row"><div class="col-xs-4"><label for="topic">Topic</label><input type="text" name="toftopic'+tof_num+'" class="form-control" id="toftopic'+tof_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="tofcognitive'+tof_num+'">Cognitive Domain</label><select class="form-control" id="tofcognitive'+tof_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="tofpoints'+tof_num+'" class="form-control" id="tofpoints'+tof_num+'" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Answer</span><input type="text" name="tofanswer'+tof_num+'" class="form-control" placeholder="Enter  Answer" id="tofanswer'+tof_num+'" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="tofremarks'+tof_num+'" class="form-control" placeholder="" disabled="disable" id="tofremarks'+tof_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr>');  
      });
  $(document).on('click', '.matchaddnum', function(){  
           match_num++;  
           $('#matchingtype_field').append('<tr id="matchnum'+match_num+'"><td><div class="box-header" ><a href="#" class="pull-right"><i class="glyphicon glyphicon-remove matchdelnum" id="'+match_num+'"><span class="matchdelnumtext">Delete Number</span></i></a></div><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">'+match_num+'.</span><input type="text" name="matchquestion'+match_num+'" class="form-control" placeholder="Question" id="matchquestion'+match_num+'" aria-describedby="basic-addon1"><span class="input-group-btn"><button class="btn btn-default matchnumimport" id="matchnumimport" name="matchnumimport" type="button"><i class="fa fa-paperclip"></i></button></span></div></div></div><br><div class="row"><div class="col-xs-4"><label for="topic">Topic</label><input type="text" name="matchtopic'+match_num+'" class="form-control" id="matchtopic'+match_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="matchcognitive'+match_num+'">Cognitive Domain</label><select class="form-control" id="matchcognitive'+match_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="matchpoints'+match_num+'" class="form-control" id="matchpoints'+match_num+'" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1"> Answer</span><input type="text" name="matchanswer'+match_num+'" class="form-control" placeholder="Enter  Answer" id="matchanswer'+match_num+'" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="matchremarks'+match_num+'" class="form-control" placeholder="" disabled="disable" id="matchremarks'+match_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr>');  
      });
  $(document).on('click', '.probaddnum', function(){  
           prob_num++;  
           $('#problemsolving_field').append('<tr id="probnum'+prob_num+'"><td><div class="box-header" ><a href="#" class="pull-right"><i class="glyphicon glyphicon-remove probdelnum" id="'+prob_num+'"><span class="probdelnumtext">Delete Number</span></i></a></div><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">'+prob_num+'.</span><input type="text" name="probquestion'+prob_num+'" class="form-control" placeholder="Question" id="probquestion'+prob_num+'" aria-describedby="basic-addon1"><span class="input-group-btn"><button class="btn btn-default probnumimport" id="probnumimport" name="probnumimport" type="button"><i class="fa fa-paperclip"></i></button></span></div></div></div><br><div class="row"><div class="col-xs-4"><label for="topic">Topic</label><input type="text" name="probtopic'+prob_num+'" class="form-control" id="probtopic'+prob_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="probcognitive'+prob_num+'">Cognitive Domain</label><select class="form-control" id="probcognitive'+prob_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="probpoints'+prob_num+'" class="form-control" id="probpoints'+prob_num+'" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1"> Answer</span><input type="text" name="probanswer'+prob_num+'" class="form-control" placeholder="Enter  Answer" id="probanswer'+prob_num+'" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="probremarks'+prob_num+'" class="form-control" placeholder="" disabled="disable" id="probremarks'+prob_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr>');  
      });
  $(document).on('click', '.essayaddnum', function(){  
           essay_num++;  
           $('#essay_field').append('<tr id="essaynum'+essay_num+'"><td><div class="box-header" ><a href="#" class="pull-right"><i class="glyphicon glyphicon-remove essaydelnum" id="'+essay_num+'"><span class="essaydelnumtext">Delete Number</span></i></a></div><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">'+essay_num+'.</span><input type="text" name="essayquestion'+essay_num+'" class="form-control" placeholder="Question" id="essayquestion'+essay_num+'" aria-describedby="basic-addon1"><span class="input-group-btn"><button class="btn btn-default essaynumimport" id="essaynumimport" name="essaynumimport" type="button"><i class="fa fa-paperclip"></i></button></span></div></div></div><br><div class="row"><div class="col-xs-4"><label for="topic">Topic</label><input type="text" name="essaytopic'+essay_num+'" class="form-control" id="essaytopic'+essay_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="essaycognitive'+essay_num+'">Cognitive Domain</label><select class="form-control" id="essaycognitive'+essay_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="essaypoints'+essay_num+'" class="form-control" id="essaypoints'+essay_num+'" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1"> Answer</span><input type="text" name="essayanswer'+essay_num+'" class="form-control" placeholder="Enter  Answer" id="essayanswer'+essay_num+'" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="essayremarks'+essay_num+'" class="form-control" placeholder="" disabled="disable" id="essayremarks'+essay_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr>');  
      });
  $(document).on('click', '.fitbaddnum', function(){  
           fitb_num++;  
           $('#fitb_field').append('<tr id="fitbnum'+fitb_num+'"><td><div class="box-header" ><a href="#" class="pull-right"><i class="glyphicon glyphicon-remove fitbdelnum" id="'+fitb_num+'"><span class="fitbdelnumtext">Delete Number</span></i></a></div><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">'+fitb_num+'.</span><input type="text" name="fitbquestion'+fitb_num+'" class="form-control" placeholder="Question" id="fitbquestion'+fitb_num+'" aria-describedby="basic-addon1"><span class="input-group-btn"><button class="btn btn-default fitbnumimport" id="fitbnumimport" name="fitbnumimport" type="button"><i class="fa fa-paperclip"></i></button></span></div></div></div><br><div class="row"><div class="col-xs-4"><label for="topic">Topic</label><input type="text" name="fitbtopic'+fitb_num+'" class="form-control" id="fitbtopic'+fitb_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="fitbcognitive'+fitb_num+'">Cognitive Domain</label><select class="form-control" id="fitbcognitive'+fitb_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="fitbpoints'+fitb_num+'" class="form-control" id="fitbpoints'+fitb_num+'" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1"> Answer</span><input type="text" name="fitbanswer'+fitb_num+'" class="form-control" placeholder="Enter  Answer" id="fitbanswer'+fitb_num+'" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="fitbremarks'+fitb_num+'" class="form-control" placeholder="" disabled="disable" id="fitbremarks'+fitb_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr>');  
      });



  $(document).on('click', '.idendelnum', function(){
    if (iden_num>0){
      var button_id = $(this).attr("id");
      $('#idennum'+button_id+'').remove(); 
    iden_num--; 
    } 
    else{
    }
  });  
  $(document).on('click', '.enudelnum', function(){  
    if (enu_num>0){
      var button_id = $(this).attr("id");   
      $('#enunum'+button_id+'').remove(); 
    enu_num--; 
    } 
    else{
    } 
  });  
  $(document).on('click', '.multidelnum', function(){  
    if (multi_num>0){
      var button_id = $(this).attr("id");
      $('#multinum'+button_id+'').remove(); 
    multi_num--; 
    } 
    else{
    } 
  });  
  $(document).on('click', '.tofdelnum', function(){  
    if (tof_num>0){
      var button_id = $(this).attr("id");
      $('#tofnum'+button_id+'').remove(); 
    tof_num--; 
    } 
    else{
    }
  });  
  $(document).on('click', '.matchdelnum', function(){  
    if (match_num>0){
      var button_id = $(this).attr("id");
      $('#matchnum'+button_id+'').remove(); 
    match_num--; 
    } 
    else{
    } 
  });  
  $(document).on('click', '.probdelnum', function(){  
    if (prob_num>0){
      var button_id = $(this).attr("id");
      $('#probnum'+button_id+'').remove(); 
    prob_num--; 
    } 
    else{
    }
  });  
  $(document).on('click', '.essaydelnum', function(){  
    if (essay_num>0){
      var button_id = $(this).attr("id");
      $('#essaynum'+button_id+'').remove(); 
    essay_num--; 
    } 
    else{
    }
  });  
  $(document).on('click', '.fitbdelnum', function(){  
    if (fitb_num>0){
      var button_id = $(this).attr("id");
      $('#fitbnum'+button_id+'').remove(); 
    fitb_num--; 
    } 
    else{
    } 
  });  

</script>  
<script>
  var date = new Date();
  var n = date.toDateString();
  var time = date.toLocaleTimeString();

  document.getElementById('time').innerHTML = n + ' ' + time;


$('select[name="name[]"]').change(function() {
    var myName = '[name="name[]"]';
    var myOpt = [];
    $("select"+ myName).each(function () {
        myOpt.push($(this).val());
    });
    $("select"+ myName).each(function () {
        $(this).find("option").prop('hidden', false);
        var sel = $(this);
        $.each(myOpt, function(key, value) {
            if((value != "") && (value != sel.val())) {
                sel.find("option").filter('[value="' + value +'"]').prop('hidden', true);
            }
        });
    });
});
</script>
</body>
<link rel="stylesheet" href="style.css">
</html>
