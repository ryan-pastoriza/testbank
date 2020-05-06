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
        <section class="col-lg-6">
          <div class="box box-primary" style="height:500px;">
            <div class="box-header with-border">
              <h3 class="box-title">TQ Queue</h3>
            </div>
            <div class="box-body no-padding">
              <div class="nav-tabs-custom">
                <ul class="nav nav-pills">
                  <li class="nav-item active"><a href="#a" class="nav-link" data-toggle="tab">College</a></li>
                  <li class="nav-item"><a href="#b" class="nav-link" data-toggle="tab">SHS</a></li>
                </ul>
                <div class="tab-content " id="testtable">
                  <div class=" active tab-pane box-primary" id="a" style="height:500px;">
                    <table class="table table-hover">
                      <tr>
                        <th class="col-xs-4">Instructor</th>
                        <th class="col-xs-3">Subject</th>
                        <th class="col-xs-4">Date</th>
                        <th class="col-xs-1"></th>
                      </tr>
                      <?php
                      $class->deanque($depart,$position_session); ?>
                    </table>
                  </div>
                  <div class="tab-pane box-primary" id="b" style="height:500px;">
                     <table class="table table-hover">
                      <tr>
                        <th class="col-xs-4">Instructor</th>
                        <th class="col-xs-3">Subject</th>
                        <th class="col-xs-4">Date</th>
                        <th class="col-xs-1"></th>
                      </tr>
                      <?php
                      if ($depart=="SHS") {
                        $class->shsdeanque($depart,$position_session);
                      }
                      ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>       
        </section>
        <section class="col-lg-6">
          <div class="box box-primary" style="height:500px;">
            <div class="box-header with-border">
              <h3 class="box-title">Syllabus Queue</h3>
            </div>
            <div class="box-body no-padding">
              <table class="table table-hover">
                <tr>
                  <th class="col-xs-4">Instructor</th>
                  <th class="col-xs-4">Subject</th>
                  <th class="col-xs-4">Date</th>
                  <th class="col-xs-1"></th>
                </tr>
                <?php 
                if($position_session=="Academic Head"){
                  $class->daaque($depart);
                }else{
                  $class->deanque1($depart); 
                }
                

                ?>
              </table>
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
