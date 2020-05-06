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
        <li class="active" id="syllabus_tab">
          <a href="index.php">
            <i class="glyphicon glyphicon-pencil"></i><span>Syllabus</span>
          </a>
        </li>
        <li id="tq_tab">
          <a href="index2.php">
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
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row" >
        <!-- Left col -->
        <section class="col-lg-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Syllabus</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-lg-4">
                  <label>Course Name</label>
                  <input type="text" class="form-control" disabled="disable" placeholder="Enter Course Name">
                </div>
                <div class="col-lg-4">
                  <label>Course Code</label>
                  <input type="text" class="form-control" disabled="disable" placeholder="Enter Course Code">
                </div>
                <div class="col-lg-4">
                  <label>Course Unit</label>
                  <input type="text" class="form-control" disabled="disable" placeholder="Enter Course Name">
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3">
                  <br/>
                  <label>Pre-requisites / Co-requisites</label>
                  <textarea class="form-control" rows="2" placeholder="Enter re-requisites / Co-requisites"></textarea>
                </div>
                <div class="col-lg-3">
                  <br/>
                  <label>Course Description</label>
                  <textarea class="form-control" rows="2" placeholder="Enter Course Description"></textarea>
                </div>
                <div class="col-lg-3">
                  <br/>
                  <label>Program Graduate Outcome (BSIT)</label>
                  <textarea class="form-control" rows="2" placeholder="Enter PGO"></textarea>
                </div>
                <div class="col-lg-3">
                  <br/>
                  <label>Course Learning Outcome</label>
                  <textarea class="form-control" rows="2" placeholder="Enter ILO"></textarea>
                  <br/>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-2">
                  <a href="#" role="button" class="btn btn-warning disabled">
                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Contact Hours</a>
                </div>
                <div class="col-lg-10">
                  <button type="button" name="addweek" id="addweek" class="pull-right btn btn-primary">Add Week</button>
                </div>
              </div>
            </div>
            <div class="box-body" style="overflow-y:scroll; overflow-x:hidden; height:450px;">
            <form role="form">
              <table class="table table-bordered" id="dynamic_field">
                <tr>
                  <td>
                    <div class="row">
                      <div class="col-lg-12">
                        <label>Week No. 1</label>
                      </div>
                      <div class="col-lg-12">
                        <label>Topics</label>
                        <textarea class="form-control" rows="2" placeholder="Enter Topics"></textarea>
                      </div>
                      <div class="col-lg-12">
                        <label>Integrated Learning Outcome</label>
                        <textarea class="form-control" rows="2" placeholder="Enter ILO"></textarea>
                      </div>
                      <div class="col-lg-12">
                        <label>Teaching and Learning Activities</label>
                        <textarea class="form-control" rows="2" placeholder="Enter TLA"></textarea>
                      </div>
                      <div class="col-lg-12">
                        <label>Resources</label>
                        <textarea class="form-control" rows="2" placeholder="Enter Resources"></textarea>
                      </div>
                      <div class="col-lg-12">
                        <label>Outcome Based Assessment</label>
                        <textarea class="form-control" rows="2" placeholder="Enter OBA"></textarea>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </form>
            </div>
            <div class="box-footer clearfix">
              <div class="row">
                <div class="col-md-10">
                  <button type="button" class="pull-right btn btn-primary" id="print" onclick="PrintPreview(printableArea)">
                  <i class="fa fa-print"></i> Preview </button>
                  
                </div>
                <div class="col-md-1">
                  <button type="button" class="pull-right btn btn-primary" id="print" onclick="printDiv('printableArea')">
                  <i class="fa fa-print"></i> Print </button>
                </div>
                <div class="col-md-1">
                  <button type="button" class="pull-right btn btn-default" id="save">
                  <i class="glyphicon glyphicon-floppy-save"></i> Save </button>
                </div>
              </div>
              
            </div>
          </div>       
        </section>
      </div>
    </section>
  </div>
  <div  id="printableArea" style="display:none">
<?php 
include('printsyllabus.php') ?>
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2016 <a href="#">ACLC</a>.</strong> All rights
    reserved.
  </footer>
<script src="plugins/jQuery/jquery.min.js"></script>
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
      $('#addweek').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><div class="row"><div class="col-lg-12"><label>Week No. '+i+'</label></div><div class="col-lg-12"><label>Topics</label><textarea class="form-control" rows="2" placeholder="Enter Topics" name="topics'+i+'"></textarea></div><div class="col-lg-12"><label>Integrated Learning Outcome</label><textarea class="form-control" rows="2" placeholder="Enter ILO" name="ilo'+i+'"></textarea></div><div class="col-lg-12"><label>Teaching and Learning Activities</label><textarea class="form-control" rows="2" placeholder="Enter TLA" name="tla'+i+'"></textarea></div><div class="col-lg-12"><label>Resources</label><textarea class="form-control" rows="2" placeholder="Enter Resources" name="resources'+i+'"></textarea></div><div class="col-lg-12"><label>Outcome Based Assessment</label><textarea class="form-control" rows="2" placeholder="Enter OBA" name="oba'+i+'"></textarea></div><div class="col-lg-12"><br><a href="#" role="button" name="identificationremove" id="'+i+'" onClick="removeidennum(This)" class="pull-right btn btn-danger btn_remove"> Remove Week </span></a></div></div></td></tr>');
      });
      
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove(); 
           i--; 
      });
 }); 


</script>  
  <script type="text/javascript">
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
  <script type="text/javascript">
function PrintPreview() {
        var toPrint = document.getElementById('printableArea');
        var popupWin = window.open('', '_blank', 'width=800,height=650,location=no,left=200px');
        popupWin.document.open();
        popupWin.document.write('<html><title>::Print Preview::</title></head><body">');
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');
        popupWin.document.close();
    }
  </script>
<script>
  var date = new Date();
  var n = date.toDateString();
  var time = date.toLocaleTimeString();

  document.getElementById('time').innerHTML = n + ' ' + time;
</script>
</body>
</html>
