<?php
include('header.php'); 
include ('class.php');
$class = new testbank();
?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php
  include('headernotification.php');
  ?>
  
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
      <?php include 'sidebar.php'; ?>
    </section>
    <!-- /.sidebar -->
  </aside>
  
  <div class="content-wrapper">
    
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">TQ Submission Report</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="areaChart" style="height:250px"></canvas>
              </div>
            </div>
            
          </div>
          
        </div>
        <div class="col-md-6">
          
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Test Type Usage</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <canvas id="pieChart" style="height:250px"></canvas>
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
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/chartjs/Chart.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/demo.js"></script>
<?php 
  include('dash.php');
?>
<script src="plugins/morris/morris.min.js"></script>
</html>
