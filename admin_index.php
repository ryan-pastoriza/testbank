<?php
include('header.php'); 
include ('class.php');
if($user_check=="admin"){
}else{
  if ($position_session=="Instructor") {
    header('Location: instructor_index.php'); 
  }else if ($position_session=="Program Head") {
    header('Location: ph_index.php'); 
  }else if ($position_session=="Dean") {
    header('Location: dean_index.php');  
  }
}
$class = new testbank();
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <a href="admin_index.php" class="logo">

      <span class="logo-mini"><b>T</b>B</span>

      <span class="logo-lg"><b>Test </b>Bank</span>
    </a>

    <nav class="navbar navbar-static-top">


      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
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
        <div style="hieght:50px;">
          <p><a><h4><?php echo $fullname_session; ?></h4></a></p>
          <i class="fa fa-circle text-success"></i><a href="logout.php"> logout</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"><b>MAIN NAVIGATION</b></li>
        <li class="active" id="dashboard_tab">
          <a href="admin_index.php">
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
          </a>
        </li>
        <li id="access_tab">
          <a href="accessibility.php"><i class="glyphicon glyphicon-lock">
            </i> <span>Accessibilty</span></a>
        </li>
        <li id="access_tab">
          <a href="Institutional.php"><i class="glyphicon glyphicon-folder-open">
            </i> <span>Institutional</span></a>
        </li>
        <li id="access_tab">
          <a href="igo.php"><i class="glyphicon glyphicon-list-alt">
            </i> <span>IGO</span></a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <i class="fa fa-circle" style="color:#5e96ad"> </i>Submitted
                <i class="fa fa-circle" style="color:#ff5425"> </i>Not Submitted
                <i class="fa fa-circle" style="color:#C0392B"> </i>For Revise
                <i class="fa fa-circle" style="color:#349640"> </i>Approved
                <i class="fa fa-circle" style="color:#b1b1b1"> </i>Population
    </section>
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-6">
          <!-- AREA CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">ITE TQ Submission Report</h3>

              <div class="box-tools pull-right">
                
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart1" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>

          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">BA TQ Submission Report</h3>

              <div class="box-tools pull-right">
                
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart2" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>


          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Overall TQ Submission Report</h3>

              <div class="box-tools pull-right">
                
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart5" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>

          

        </div>
        <div class="col-md-6">

        <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">GEN-ED TQ Submission Report</h3>


              <div class="box-tools pull-right">
                
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart3" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>

          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">SHS TQ Submission Report</h3>
              <div class="box-tools pull-right">
                
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="barChart4" style="height:230px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- DONUT CHART -->
          <div class="box box-danger" style="display:none">
            <div class="box-header with-border" >
              <h3 class="box-title">Test Type Usage</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChart" style="height:230px"></canvas>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>

      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <div class="box-tools pull-right">
            <button type="submit" class="pull-right btn btn-primary" onclick="printDiv('printableArea')" name="print">
              <i class="glyphicon glyphicon-print "></i> Print Report 
            </button>
            <div  id="printableArea" style="display:none">
              
    
              <table width="800">
                
                <tr>
                  <td align="center" ><h3><b>TEST BANK TQ SUBMISSION REPORT</b></h3></td>
                </tr>
                <tr>
                  <td><h4><b>ITE</b></h4></td>
                </tr>
                <tr>
                  <td><h4>Total Population: <i class="itepo"></i></h4></td>
                </tr>
                <tr>
                  <td>
                    <table width="800" border="1" >
                      <tr>
                        <td align="center"><b>Period</b></td>
                        <td align="center"><b>Submitted</b></td>
                        <td align="center"><b>Not Submitted</b></td>
                        <td align="center"><b>For Revise</b></td>
                        <td align="center"><b>Approved</b></td>
                      </tr>
                      <tr>
                        <td align="center"><b>Prelim</b></td>
                        <td align="center"><p class="prelimsub"></p></td>
                        <td align="center"><p class="prelimnot"></p></td>
                        <td align="center"><p class="prelimrev"></p></td>
                        <td align="center"><p class="prelimapp"></p></td>
                      </tr>
                      <tr>
                        <td align="center"><b>Midterm</b></td>
                        <td align="center"><p class="midtermsub1"></p></td>
                        <td align="center"><p class="midtermnot1"></p></td>
                        <td align="center"><p class="midtermrev1"></p></td>
                        <td align="center"><p class="midtermapp1"></p></td>
                      </tr>
                      <tr>
                        <td align="center"><b>Prefinal</b></td>
                        <td align="center"><p class="prefinalsub2"></p></td>
                        <td align="center"><p class="prefinalnot2"></p></td>
                        <td align="center"><p class="prefinalrev2"></p></td>
                        <td align="center"><p class="prefinalapp2"></p></td>
                      </tr>
                      <tr>
                        <td align="center"><b>Final</b></td>
                        <td align="center"><p class="finalsub3"></p></td>
                        <td align="center"><p class="finalnot3"></p></td>
                        <td align="center"><p class="finalrev3"></p></td>
                        <td align="center"><p class="finalapp3"></p></td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td><h4><b>BA</b></h4></td>
                </tr>
                <tr>
                  <td><h4>Total Population: <i class="bapo"></i></h4></td>
                </tr>
                <tr>
                  <td>
                    <table width="800" border="1" >
                      <tr>
                        <td align="center"><b>Period</b></td>
                        <td align="center"><b>Submitted</b></td>
                        <td align="center"><b>Not Submitted</b></td>
                        <td align="center"><b>For Revise</b></td>
                        <td align="center"><b>Approved</b></td>
                      </tr>
                      <tr>
                        <td align="center"><b>Prelim</b></td>
                        <td align="center"><p class="baprelimsub"></p></td>
                        <td align="center"><p class="baprelimnot"></p></td>
                        <td align="center"><p class="baprelimrev"></p></td>
                        <td align="center"><p class="baprelimapp"></p></td>
                      </tr>
                      <tr>
                        <td align="center"><b>Midterm</b></td>
                        <td align="center"><p class="bamidtermsub1"></p></td>
                        <td align="center"><p class="bamidtermnot1"></p></td>
                        <td align="center"><p class="bamidtermrev1"></p></td>
                        <td align="center"><p class="bamidtermapp1"></p></td>
                      </tr>
                      <tr>
                        <td align="center"><b>Prefinal</b></td>
                        <td align="center"><p class="baprefinalsub2"></p></td>
                        <td align="center"><p class="baprefinalnot2"></p></td>
                        <td align="center"><p class="baprefinalrev2"></p></td>
                        <td align="center"><p class="baprefinalapp2"></p></td>
                      </tr>
                      <tr>
                        <td align="center"><b>Final</b></td>
                        <td align="center"><p class="bafinalsub3"></p></td>
                        <td align="center"><p class="bafinalnot3"></p></td>
                        <td align="center"><p class="bafinalrev3"></p></td>
                        <td align="center"><p class="bafinalapp3"></p></td>
                      </tr>
                    </table>
                  </td>
                </tr>


                <tr>
                  <td><h4><b>GEN-ED</b></h4></td>
                </tr>
                <tr>
                  <td><h4>Total Population: <i class="genpo"></i></h4></td>
                </tr>
                <tr>
                  <td>
                    <table width="800" border="1" >
                      <tr>
                        <td align="center"><b>Period</b></td>
                        <td align="center"><b>Submitted</b></td>
                        <td align="center"><b>Not Submitted</b></td>
                        <td align="center"><b>For Revise</b></td>
                        <td align="center"><b>Approved</b></td>
                      </tr>
                      <tr>
                        <td align="center"><b>Prelim</b></td>
                        <td align="center"><p class="genprelimsub"></p></td>
                        <td align="center"><p class="genprelimnot"></p></td>
                        <td align="center"><p class="genprelimrev"></p></td>
                        <td align="center"><p class="genprelimapp"></p></td>
                      </tr>
                      <tr>
                        <td align="center"><b>Midterm</b></td>
                        <td align="center"><p class="genmidtermsub1"></p></td>
                        <td align="center"><p class="genmidtermnot1"></p></td>
                        <td align="center"><p class="genmidtermrev1"></p></td>
                        <td align="center"><p class="genmidtermapp1"></p></td>
                      </tr>
                      <tr>
                        <td align="center"><b>Prefinal</b></td>
                        <td align="center"><p class="genprefinalsub2"></p></td>
                        <td align="center"><p class="genprefinalnot2"></p></td>
                        <td align="center"><p class="genprefinalrev2"></p></td>
                        <td align="center"><p class="genprefinalapp2"></p></td>
                      </tr>
                      <tr>
                        <td align="center"><b>Final</b></td>
                        <td align="center"><p class="genfinalsub3"></p></td>
                        <td align="center"><p class="genfinalnot3"></p></td>
                        <td align="center"><p class="genfinalrev3"></p></td>
                        <td align="center"><p class="genfinalapp3"></p></td>
                      </tr>
                    </table>
                  </td>
                </tr>


                <tr>
                  <td><h4><b>SHS</b></h4></td>
                </tr>
                <tr>
                  <td><h4>Total Population: <i class="shspo"></i></h4></td>
                </tr>
                <tr>
                  <td>
                    <table width="800" border="1" >
                      <tr>
                        <td align="center"><b>Period</b></td>
                        <td align="center"><b>Submitted</b></td>
                        <td align="center"><b>Not Submitted</b></td>
                        <td align="center"><b>For Revise</b></td>
                        <td align="center"><b>Approved</b></td>
                      </tr>
                      <tr>
                        <td align="center"><b>1st Quarter</b></td>
                        <td align="center"><p class="shsprelimsub"></p></td>
                        <td align="center"><p class="shsprelimnot"></p></td>
                        <td align="center"><p class="shsprelimrev"></p></td>
                        <td align="center"><p class="shsprelimapp"></p></td>
                      </tr>
                      <tr>
                        <td align="center"><b>2nd Quarter</b></td>
                        <td align="center"><p class="shsmidtermsub1"></p></td>
                        <td align="center"><p class="shsmidtermnot1"></p></td>
                        <td align="center"><p class="shsmidtermrev1"></p></td>
                        <td align="center"><p class="shsmidtermapp1"></p></td>
                      </tr>
                      <tr>
                        <td align="center"><b>3rd Quarter</b></td>
                        <td align="center"><p class="shsprefinalsub2"></p></td>
                        <td align="center"><p class="shsprefinalnot2"></p></td>
                        <td align="center"><p class="shsprefinalrev2"></p></td>
                        <td align="center"><p class="shsprefinalapp2"></p></td>
                      </tr>
                      <tr>
                        <td align="center"><b>4th Quarter</b></td>
                        <td align="center"><p class="shsfinalsub3"></p></td>
                        <td align="center"><p class="shsfinalnot3"></p></td>
                        <td align="center"><p class="shsfinalrev3"></p></td>
                        <td align="center"><p class="shsfinalapp3"></p></td>
                      </tr>
                    </table>
                  </td>
                </tr>

                
              </table>



            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.4
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
</body>
<style type="text/css">
#time{
  font-family: Arial, Helvetica, sans-serif;
  font-size: 11px;
  }
</style>
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="plugins/chartjs/Chart.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<?php 
  include('dash1.php');
?>
<script src="plugins/morris/morris.min.js"></script>
</html>
