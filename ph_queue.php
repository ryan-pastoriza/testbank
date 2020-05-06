<?php
include('header.php'); 
include 'class.php';
$class = new testbank();
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php
 include('headernotification.php');
  ?>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div style="hieght:50px;">
          <p><a><h4><?php echo $fullname_session; ?></h4></a></p>
          <i class="fa fa-circle text-success"></i><a href="logout.php"> logout</a>
        </div>
      </div>
      <?php include 'sidebar.php'; ?>
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content">
      <div class="row" >
        <section class="col-lg-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Queue</h3>
            </div>
            <div class="box-body ">
              <div class="nav-tabs-custom">
                <ul class="nav nav-pills">
                  <li class="nav-item active"><a href="#a" class="nav-link" data-toggle="tab">College</a></li>
                  <li class="nav-item"><a href="#b" class="nav-link" data-toggle="tab">SHS</a></li>
                </ul>
                <div class="tab-content " id="testtable">
                  <div class=" active tab-pane box-primary" id="a" style="height:500px;">
                    <table class="table table-hover">
                      <tr>
                        <th class="col-xs-2">Instructor</th>
                        <th class="col-xs-3">Subject</th>
                        <th class="col-xs-6">Date</th>
                        <th class="col-xs-1"></th>
                      </tr>
                      <?php
                      $class->phque($depart,$login_id); ?>
                    </table>
                  </div>
                  <div class="tab-pane box-primary" id="b" style="height:500px;">
                     <table class="table table-hover">
                      <tr>
                        <th class="col-xs-2">Instructor</th>
                        <th class="col-xs-3">Subject</th>
                        <th class="col-xs-6">Date</th>
                        <th class="col-xs-1"></th>
                      </tr>
                      <?php
                      $class->shsphque($depart,$login_id); ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            
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
