<?php
include('header.php'); 
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>T</b>B</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Test </b>Banking</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
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
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="index.php">
            <i class="glyphicon glyphicon-pencil"></i><span>Syllabus</span>
          </a>
        </li>
        <li class="active">
          <a href="tq.php">
            <i class="glyphicon glyphicon-list-alt"></i> <span>Test Questionnaire</span>
          </a>
        </li>
        <li>
        <li>
          <a href="notifications.php">
            <i class="fa fa-bell-o"></i> 
            <span class="pull-right-container">
              <small class="label pull-right bg-blue">12</small>
            </span>
            <span>Notifications</span>
          </a>
        </li>
        <li>
          <a href="queue.php">
            <i class="fa fa-book"></i> 
            <span class="pull-right-container">
              <small class="label pull-right bg-blue">3</small>
            </span>
            <span>Queue</span>
          </a>
        </li>
        <li>
          <a href="reports.php">
            <i class="fa fa-folder"></i> <span>Reports</span></a></li>
        <li>
          <a href="security.php"><i class="glyphicon glyphicon-lock">
            </i> <span>Security</span></a></li>
        <li>
          <a href="setdate.php"><i class="glyphicon glyphicon-calendar">
            </i> <span>Set Date Submission</span></a></li>
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
          <div class="box  box-primary" style="overflow-y:scroll; overflow-x:hidden; height:600px;">
            <div class="box-header">
              <i  class="glyphicon glyphicon-list-alt"></i>
              <h3 class="box-title">Create TQ</h3>
            </div>
            <div class="box-body">
              <form action="#" method="post">
                <div class="row">
                  <div class="col-lg-5">
                    <label>Subject Code</label>
                    <select class="form-control select2 " style="width: 100%;">
                      <option selected="selected">ITMAJEL4</option>
                      <option>IT304B</option>
                      <option>IT303A</option>
                      <option>IT302A</option>
                      <option>GE312A</option>
                      <option>IT600B</option>
                    </select>
                  </div>
                  <div class="col-lg-7">
                    <label>Subject Description</label>
                    <input type="text" disabled="disable" class="form-control" name="subject" style="width: 100%">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-3">
                    <label>Test Number</label>
                    <select class="form-control select2 " style="width: 100%;">
                      <option selected="selected">I</option>
                      <option>II</option>
                      <option>III</option>
                      <option>IV</option>
                      <option>V</option>
                      <option>VI</option>
                      <option>VII</option>
                      <option>VII</option>
                      <option>IX</option>
                      <option>XI</option>
                    </select>
                  </div>
                  <div class="col-lg-3">
                    <label>Test Type</label>
                    <select class="form-control select2 " style="width: 100%;">
                      <option selected="selected">Identification</option>
                      <option>Enumeration</option>
                      <option>Multiple Choice</option>
                      <option>True or False</option>
                      <option>Matching Type</option>
                      <option>Problem Solving</option>
                      <option>Essay</option>
                      <option>Fill in the Blank</option>
                    </select>
                  </div>
                  <div class="col-lg-2">
                  <label>&nbsp;</label>
                    <button type="button" class="btn btn-primary" id="add22" style="width: 100%;">
                    <i class="glyphicon glyphicon-plus"></i> Add </button>
                  </div>
                </div><br>
                <!-- Test I -->
                <div class="row">
                  <div class="col-lg-3">
                    <a href="#" role="button" class="btn btn-warning disabled">
                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> I. Identification</a>
                  </div>
                  <div class="col-lg-9">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Direction</span>
                      <input type="text" class="form-control" placeholder="Enter Test Direction" id="inputdefault" aria-describedby="basic-addon1">
                    </div>
                  </div>
                </div><br>
                <!-- /Test I -->
                <!-- I Number -->
                <table class="table table-bordered" id="dynamic_field">
                  <tr>
                    <td>
                      <div class="row">
                        <div class="col-xs-9">
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">1.</span>
                            <input type="text" name="question_1" class="form-control" placeholder="Question" id="inputdefault" aria-describedby="basic-addon1">
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <button type="button" name="add" id="add" class="btn btn-primary">Add Number</button>
                        </div>
                      </div><br>
                      <div class="row">
                        <div class="col-xs-4">
                          <label for="usr">Topic</label>
                          <input type="text" name="topic_1" class="form-control" id="usr" placeholder="Enter Topic">
                        </div>
                        <div class="col-xs-4">
                          <form role="form">
                            <label name="cognitive_1" for="sel1">Cognitive Domain</label>
                            <select class="form-control" id="sel1">
                              <option>Knowledge</option>
                              <option>Comprehension</option>
                              <option>Application</option>
                              <option>Analysis</option>
                              <option>Evaluation</option>
                              <option>Synthesis</option>
                            </select>
                          </form>     
                        </div>
                        <div class="col-xs-4">
                          <label for="usr">Points</label>
                          <input type="text" name="points_1" class="form-control" id="usr" placeholder="Enter Points">
                        </div>
                      </div><br>
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Best Answer</span>
                            <input type="text" name="answer_1" class="form-control" placeholder="Enter Best Answer" id="inputdefault" aria-describedby="basic-addon1">
                          </div>
                        </div>
                      </div><br>
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Remarks</span>
                            <input type="text" name="remarks_1" class="form-control" placeholder="" disabled="disable" id="inputdefault" aria-describedby="basic-addon1">
                          </div>
                        </div>
                      </div><br>
                    </td>
                  </tr>
                </table>
                <!-- /I Number -->
                <!--II number -->
                <div class="row">
                  <div class="col-lg-3">
                    <a href="#" role="button" class="btn btn-warning disabled">
                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> II. Enumeration</a>
                  </div>
                  <div class="col-lg-9">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Direction</span>
                      <input type="text" class="form-control" placeholder="Enter Test Direction" id="inputdefault" aria-describedby="basic-addon1">
                    </div>
                  </div>
                </div><br>
                <!-- /Test II -->
                <!-- II Number -->
                <table class="table table-bordered" id="dynamic_field2">
                  <tr>
                    <td>
                      <div class="row">
                        <div class="col-xs-9">
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">1.</span>
                            <input type="text" name="question_1" class="form-control" placeholder="Question" id="inputdefault" aria-describedby="basic-addon1">
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <button type="button" name="add2" id="add2" class="btn btn-primary">Add Number</button>
                        </div>
                      </div><br>
                      <div class="row">
                        <div class="col-xs-4">
                          <label for="usr">Topic</label>
                          <input type="text" name="topic_1" class="form-control" id="usr" placeholder="Enter Topic">
                        </div>
                        <div class="col-xs-4">
                          <form role="form">
                            <label name="cognitive_1" for="sel1">Cognitive Domain</label>
                            <select class="form-control" id="sel1">
                              <option>Knowledge</option>
                              <option>Comprehension</option>
                              <option>Application</option>
                              <option>Analysis</option>
                              <option>Evaluation</option>
                              <option>Synthesis</option>
                            </select>
                          </form>     
                        </div>
                        <div class="col-xs-4">
                          <label for="usr">Points</label>
                          <input type="text" name="points_1" class="form-control" id="usr" placeholder="Enter Points">
                        </div>
                      </div><br>
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Best Answer</span>
                            <input type="text" name="answer_1" class="form-control" placeholder="Enter Best Answer" id="inputdefault" aria-describedby="basic-addon1">
                          </div>
                        </div>
                      </div><br>
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Remarks</span>
                            <input type="text" name="remarks_1" class="form-control" placeholder="" disabled="disable" id="inputdefault" aria-describedby="basic-addon1">
                          </div>
                        </div>
                      </div><br>
                    </td>
                  </tr>
                </table>
                <!-- /II Number -->
                <!--III number -->
                <div class="row">
                  <div class="col-lg-3">
                    <a href="#" role="button" class="btn btn-warning disabled">
                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> III. True or False</a>
                  </div>
                  <div class="col-lg-9">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Direction</span>
                      <input type="text" class="form-control" placeholder="Enter Test Direction" id="inputdefault" aria-describedby="basic-addon1">
                    </div>
                  </div>
                </div><br>
                <!-- /Test III -->
                <!-- III Number -->
                <table class="table table-bordered" id="dynamic_field3">
                  <tr>
                    <td>
                      <div class="row">
                        <div class="col-xs-9">
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">1.</span>
                            <input type="text" name="question_1" class="form-control" placeholder="Question" id="inputdefault" aria-describedby="basic-addon1">
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <button type="button" name="add3" id="add3" class="btn btn-primary">Add Number</button>
                        </div>
                      </div><br>
                      <div class="row">
                        <div class="col-xs-4">
                          <label for="usr">Topic</label>
                          <input type="text" name="topic_1" class="form-control" id="usr" placeholder="Enter Topic">
                        </div>
                        <div class="col-xs-4">
                          <form role="form">
                            <label name="cognitive_1" for="sel1">Cognitive Domain</label>
                            <select class="form-control" id="sel1">
                              <option>Knowledge</option>
                              <option>Comprehension</option>
                              <option>Application</option>
                              <option>Analysis</option>
                              <option>Evaluation</option>
                              <option>Synthesis</option>
                            </select>
                          </form>     
                        </div>
                        <div class="col-xs-4">
                          <label for="usr">Points</label>
                          <input type="text" name="points_1" class="form-control" id="usr" placeholder="Enter Points">
                        </div>
                      </div><br>
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Best Answer</span>
                            <input type="text" name="answer_1" class="form-control" placeholder="Enter Best Answer" id="inputdefault" aria-describedby="basic-addon1">
                          </div>
                        </div>
                      </div><br>
                      <div class="row">
                        <div class="col-xs-12">
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Remarks</span>
                            <input type="text" name="remarks_1" class="form-control" placeholder="" disabled="disable" id="inputdefault" aria-describedby="basic-addon1">
                          </div>
                        </div>
                      </div><br>
                    </td>
                  </tr>
                </table>
              </form>
            </div>
            <div class="box-footer clearfix">
              <button type="button" class="pull-right btn btn-default" id="save">
                <i class="glyphicon glyphicon-floppy-save"></i> Save </button>
            </div>
          </div>

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5">

          <div class="box box-primary" style="overflow-y:hidden; overflow-x:scroll; height:300px;">
            <div class="box-header">
              <h3 class="box-title">Table of Specification</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped" style="text-align: center;">
                <thead>
                    <tr>
                        <th rowspan="3">Content Dimension</th>
                        <th>Knowledge</th>
                        <th>Comprehension</th>
                        <th>Application</th>
                        <th>Analysis</th>
                        <th>Evaluation</th>
                        <th>Synthesis</th>
                        <th rospan="3">Total Items</th>
                        <th rowspan="3">No. of Points</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td colspan="3">30%</td>
                        <td colspan="3">70%</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Item No.</td>
                        <td>Item No.</td>
                        <td>Item No.</td>
                        <td>Item No.</td>
                        <td>Item No.</td>
                        <td>Item No.</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                     <tr>
                        <th>Total</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box" style="overflow-y:scroll; overflow-x:hidden; height:300px;">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tq" data-toggle="tab">Test Questionnaire</a></li>
                <li><a href="#q" data-toggle="tab">Questions</a></li>
              </ul>
              <div class="tab-content">
                <div class="active tab-pane" id="tq">
                  <div class="col-md-12">
                    <div class="box box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Banked TQ</h3>
                      </div>
                       <!-- /.box-header -->
                      <div class="box-body no-padding">
                        <div class="mailbox-controls">
                          1-50/200
                          <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                          </div>
                          <!-- /.btn-group -->
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive mailbox-messages">
                      <table class="table table-hover table-striped">
                        <tbody>
                          <tr>
                            <td class="mailbox-name"><a href="read-mail.php">IT Major 4</a></td>
                            <td class="mailbox-subject"><b>ITMJ4</b> - Alexander Pierce
                            </td>
                          </tr>
                          <tr>
                            <td class="mailbox-name"><a href="read-mail.php">IT Major 4</a></td>
                            <td class="mailbox-subject"><b>ITMJ4</b> - James Pricce
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!-- /.table -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                      <div class="mailbox-controls">
                        1-50/200
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                        </div>
                        <!-- /.btn-group -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="q">
                  <form role="form">
                    <label name="cognitive_1" for="sel1">Cognitive Domain</label>
                    <select class="form-control" id="sel1">
                      <option>Knowledge</option>
                      <option>Comprehension</option>
                      <option>Application</option>
                      <option>Analysis</option>
                      <option>Evaluation</option>
                      <option>Synthesis</option>
                    </select>
                  </form> 
                  <div class="col-md-12">
                    <div class="box box">
                      <div class="box-header with-border">
                        <h3 class="box-title">Banked TQ</h3>
                      </div>
                       <!-- /.box-header -->
                      <div class="box-body no-padding">
                        <div class="mailbox-controls">
                          1-50/200
                          <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                          </div>
                          <!-- /.btn-group -->
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive mailbox-messages">
                      <table class="table table-hover table-striped">
                        <tbody>
                          <tr>
                            <td class="mailbox-name"><a href="">Write a method which will remove any given character from a String?</a></td>
                            </td>
                          </tr>
                          <tr>
                            <td class="mailbox-name"><a href="">Write a function to find out longest palindrome in a given string?</a></td>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!-- /.table -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                      <div class="mailbox-controls">
                        1-50/200
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                        </div>
                        <!-- /.btn-group -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.tab-pane -->
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.box-body -->
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.4
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>  
 $(document).ready(function(){  
      var i=1; 
      var i2=1;
      var i3=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><div class="row"><div class="col-xs-9"><div class="input-group"><span class="input-group-addon" id="basic-addon1">'+i+'.</span><input type="text" name="question'+i+'" class="form-control" placeholder="Question" id="inputdefault" aria-describedby="basic-addon1"></div></div><div class="col-lg-3"><a href="#" role="button" name="identificationremove" id="'+i+'" onClick="removeidennum(This)" class="btn btn-danger btn_remove"> Remove Number </span></a></div></div><br><div class="row"><div class="col-xs-4"><label for="usr">Topic</label><input type="text" name="topic_'+i+'" class="form-control" id="usr" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="cognitive_'+i+'" for="sel1">Cognitive Domain</label><select class="form-control" id="sel1"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="points_'+i+'" class="form-control" id="usr" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Best Answer</span><input type="text" name="answer_'+i+'" class="form-control" placeholder="Enter Best Answer" id="inputdefault" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="remarks_'+i+'" class="form-control" placeholder="" disabled="disable" id="inputdefault" aria-describedby="basic-addon1"></div></div></div><br></td></tr>');  
      });
      $('#add2').click(function(){  
           i2++;  
           $('#dynamic_field2').append('<tr id="row'+i2+'"><td><div class="row"><div class="col-xs-9"><div class="input-group"><span class="input-group-addon" id="basic-addon1">'+i2+'.</span><input type="text" name="question'+i2+'" class="form-control" placeholder="Question" id="inputdefault" aria-describedby="basic-addon1"></div></div><div class="col-lg-3"><a href="#" role="button" name="identificationremove" id="'+i2+'" onClick="removeidennum(This)" class="btn btn-danger btn_remove2"> Remove Number </span></a></div></div><br><div class="row"><div class="col-xs-4"><label for="usr">Topic</label><input type="text" name="topic_'+i2+'" class="form-control" id="usr" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="cognitive_'+i2+'" for="sel1">Cognitive Domain</label><select class="form-control" id="sel1"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="points_'+i2+'" class="form-control" id="usr" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Best Answer</span><input type="text" name="answer_'+i2+'" class="form-control" placeholder="Enter Best Answer" id="inputdefault" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="remarks_'+i2+'" class="form-control" placeholder="" disabled="disable" id="inputdefault" aria-describedby="basic-addon1"></div></div></div><br></td></tr>');  
      }); 
      $('#add3').click(function(){  
           i3++;  
           $('#dynamic_field3').append('<tr id="row'+i3+'"><td><div class="row"><div class="col-xs-9"><div class="input-group"><span class="input-group-addon" id="basic-addon1">'+i3+'.</span><input type="text" name="question'+i3+'" class="form-control" placeholder="Question" id="inputdefault" aria-describedby="basic-addon1"></div></div><div class="col-lg-3"><a href="#" role="button" name="identificationremove" id="'+i3+'" onClick="removeidennum(This)" class="btn btn-danger btn_remove3"> Remove Number </span></a></div></div><br><div class="row"><div class="col-xs-4"><label for="usr">Topic</label><input type="text" name="topic_'+i3+'" class="form-control" id="usr" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="cognitive_'+i3+'" for="sel1">Cognitive Domain</label><select class="form-control" id="sel1"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="points_'+i3+'" class="form-control" id="usr" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Best Answer</span><input type="text" name="answer_'+i3+'" class="form-control" placeholder="Enter Best Answer" id="inputdefault" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="remarks_'+i3+'" class="form-control" placeholder="" disabled="disable" id="inputdefault" aria-describedby="basic-addon1"></div></div></div><br></td></tr>');  
      });   
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove(); 
           i--; 


      });  
      $(document).on('click', '.btn_remove2', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove(); 
           i2--; 
      }); 
            $(document).on('click', '.btn_remove3', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove(); 
           i3--; 
      });   
 }); 


</script>  
</body>
</html>
