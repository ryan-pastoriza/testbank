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
      <?php include 'sidebar.php'; ?>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php
        // if ($depart=="SHS") {
          ?>
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"><b>Set Exam Schedule for SHS</b></h3>
                </div>
                
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding" style="height:230px;">
                  <table class="table table-hover">
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>First Quarter</strong></td>
                      <td>From</td>
                      <td><input type='date' name='firstquarterstart' class='form-control' min='1950-01-02' required></td>
                      <td>To</td>
                      <td><input type='date' name='firstquarterend' class='form-control' min='1950-01-02' required></td>
                      <td>
                    <button type="submit" class="btn btn-primary" name="bfirstquarter"><i class="glyphicon glyphicon-floppy-save"></i> Save Schedule</button>
                    <?php 
                    if(isset($_POST['bfirstquarter'])){
                      $period=9;
                      $start=$_POST['firstquarterstart'];
                      $end=$_POST['firstquarterend'];
                      $class->setedate($period,$start,$end,$depart);
                    }
                    ?> 
                    
                    </td>
                    <td>
                      <?php $class->getexamdate('FIRST QUARTER',$depart); ?>
                    </td>

                    </form>
                    </tr>
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>SecondQuarter</strong></td>
                      <td>From</td>
                      <td><input type='date' name='SecondQuarterstart' class='form-control' min='1950-01-02' required></td>
                      <td>To</td>
                      <td><input type='date' name='SecondQuarterend' class='form-control' min='1950-01-02' required></td>
                      
                      <td>
                    <button type="submit" class="btn btn-primary" name="bSecondQuarter"><i class="glyphicon glyphicon-floppy-save"></i> Save Schedule</button>
                    <?php 
                    if(isset($_POST['bSecondQuarter'])){
                      $period=10;
                      $start=$_POST['SecondQuarterstart'];
                      $end=$_POST['SecondQuarterend'];
                      $class->setedate($period,$start,$end,$depart);
                    }
                    ?>
                    
                    </td>
                    <td>
                      <?php $class->getexamdate('Second Quarter',$depart); ?>
                    </td>

                    </form>
                    </tr>
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>ThirdQuarter</strong></td>
                      <td>From</td>
                      <td><input type='date' name='ThirdQuarterstart' class='form-control' min='1950-01-02' required></td>
                      <td>To</td>
                      <td><input type='date' name='ThirdQuarterend' class='form-control' min='1950-01-02' required></td>
                      <td>
                    <button type="submit" class="btn btn-primary" name="bThirdQuarter"><i class="glyphicon glyphicon-floppy-save"></i> Save Schedule</button>
                    <?php 
                    if(isset($_POST['bThirdQuarter'])){
                      $period=11;
                      $start=$_POST['ThirdQuarterstart'];
                      $end=$_POST['ThirdQuarterend'];
                      $class->setedate($period,$start,$end,$depart);
                    }
                    ?>
                    
                    </td>
                    <td>
                      <?php $class->getexamdate('Third Quarter',$depart); ?>
                    </td>

                    </form>
                    </tr>
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>Forth Quarter</strong></td>
                      <td>From</td>
                      <td><input type='date' name='ForthQuarterstart' class='form-control' min='1950-01-02' required></td>
                      <td>To</td>
                      <td><input type='date' name='ForthQuarterend' class='form-control' min='1950-01-02' required></td>
                      <td>
                    <button type="submit" class="btn btn-primary" name="bForthQuarter"><i class="glyphicon glyphicon-floppy-save"></i> Save Schedule</button>
                    <?php 
                    if(isset($_POST['bForthQuarter'])){
                      $period=12;
                      $start=$_POST['ForthQuarterstart'];
                      $end=$_POST['ForthQuarterend'];
                      $class->setedate($period,$start,$end,$depart);
                    }
                    ?>
                    
                    </td>
                    <td>
                      <?php $class->getexamdate('Fourth Quarter',$depart); ?>
                    </td>

                    </form>
                    </tr>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"><b>Set Deadline Submission of TQ & TOS for SHS</b></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding" style="height:230px;">
                  <table class="table table-hover">
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>First Quarter</strong></td>
                      <td>Deadline</td>
                      <td><input type='date' name='firstquarterddate' class='form-control' min='1950-01-02' required></td>
                      <td>
                    <button type="submit" class="btn btn-primary" name="bfirstquarterd"><i class="glyphicon glyphicon-floppy-save"></i> Save Deadline</button>
                    <?php 
                    if(isset($_POST['bfirstquarterd'])){
                      $period=9;
                      $date=$_POST['firstquarterddate'];
                      $class->setddate($period,$date,$depart);
                    }
                    ?>
                    
                    </td>
                    <td>
                      <?php $class->getdeadlinedate('FIRST QUARTER',$depart); ?>
                    </td>
                    
                    </form>
                    </tr>
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>Second Quarter</strong></td>
                      <td>Deadline</td>
                      <td><input type='date' name='SecondQuarterddate' class='form-control' min='1950-01-02' required></td>
                      
                      <td>
                    <button type="submit" class="btn btn-primary" name="bSecondQuarterd"><i class="glyphicon glyphicon-floppy-save"></i> Save Deadline</button>
                    <?php 
                    if(isset($_POST['bSecondQuarterd'])){
                      $period=10;
                      $date=$_POST['SecondQuarterddate'];
                      $class->setddate($period,$date,$depart);
                    }
                    ?>
                    
                    </td>
                    <td>
                      <?php $class->getdeadlinedate('Second Quarter',$depart); ?>
                    </td>

                    </form>
                    </tr>
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>Third Quarter</strong></td>
                      <td>Deadline</td>
                      <td><input type='date' name='ThirdQuarterddate' class='form-control' min='1950-01-02' required></td>
                      <td>
                    <button type="submit" class="btn btn-primary" name="bThirdQuarterd"><i class="glyphicon glyphicon-floppy-save"></i> Save Deadline</button>
                    <?php 
                    if(isset($_POST['bThirdQuarterd'])){
                      $period=11;
                      $date=$_POST['ThirdQuarterddate'];
                      $class->setddate($period,$date,$depart);
                    }
                    ?>
                    
                    </td>
                    <td>
                      <?php $class->getdeadlinedate('Third Quarter',$depart); ?>
                    </td>

                    </form>
                    </tr>
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>Forth Quarter</strong></td>
                      <td>Deadline</td>
                      <td><input type='date' name='ForthQuarterddate' class='form-control' min='1950-01-02' required></td>
                      <td>
                    <button type="submit" class="btn btn-primary" name="bForthQuarterd"><i class="glyphicon glyphicon-floppy-save"></i> Save Deadline</button>
                    <?php 
                    if(isset($_POST['bForthQuarterd'])){
                      $period=12;
                      $date=$_POST['ForthQuarterddate'];
                      $class->setddate($period,$date,$depart);
                    }
                    ?>
                    
                    </td>
                    <td>
                      <?php $class->getdeadlinedate('Fourth Quarter',$depart); ?>
                    </td>

                    </form>
                    </tr>
                  </table>
                </div>
                </form>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>




          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"><b>Set Exam Schedule for GEN-ED</b></h3>
                </div>
                
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding" style="height:230px;">
                  <table class="table table-hover">
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>Prelim</strong></td>
                      <td>From</td>
                      <td><input type='date' name='genprelinstart' class='form-control' min='1950-01-02' required></td>
                      <td>To</td>
                      <td><input type='date' name='genprelinend' class='form-control' min='1950-01-02' required></td>
                      <td>
                    <button type="submit" class="btn btn-primary" name="genprelin"><i class="glyphicon glyphicon-floppy-save"></i> Save Schedule</button>
                    <?php 
                    if(isset($_POST['genprelin'])){
                      $period=1;
                      $start=$_POST['genprelinstart'];
                      $end=$_POST['genprelinend'];
                      $class->setedate($period,$start,$end,'GENED');
                    }
                    ?> 
                    
                    </td>
                    <td>
                      <?php $class->getexamdate('PRELIM','GENED'); ?>
                    </td>

                    </form>
                    </tr>
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>Midterm</strong></td>
                      <td>From</td>
                      <td><input type='date' name='genmitermstart' class='form-control' min='1950-01-02' required></td>
                      <td>To</td>
                      <td><input type='date' name='genmitermend' class='form-control' min='1950-01-02' required></td>
                      
                      <td>
                    <button type="submit" class="btn btn-primary" name="genmiterm"><i class="glyphicon glyphicon-floppy-save"></i> Save Schedule</button>
                    <?php 
                    if(isset($_POST['genmiterm'])){
                      $period=2;
                      $start=$_POST['genmitermstart'];
                      $end=$_POST['genmitermend'];
                      $class->setedate($period,$start,$end,'GENED');
                    }
                    ?>
                    
                    </td>
                    <td>
                      <?php $class->getexamdate('MIDTERM','GENED'); ?>
                    </td>

                    </form>
                    </tr>
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>Pre-Final</strong></td>
                      <td>From</td>
                      <td><input type='date' name='genprefinalstart' class='form-control' min='1950-01-02' required></td>
                      <td>To</td>
                      <td><input type='date' name='genprefinalend' class='form-control' min='1950-01-02' required></td>
                      <td>
                    <button type="submit" class="btn btn-primary" name="genprefinal"><i class="glyphicon glyphicon-floppy-save"></i> Save Schedule</button>
                    <?php 
                    if(isset($_POST['genprefinal'])){
                      $period=3;
                      $start=$_POST['genprefinalstart'];
                      $end=$_POST['genprefinalend'];
                      $class->setedate($period,$start,$end,'GENED');
                    }
                    ?>
                    
                    </td>
                    <td>
                      <?php $class->getexamdate('PRE-FINAL','GENED'); ?>
                    </td>

                    </form>
                    </tr>
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>Final</strong></td>
                      <td>From</td>
                      <td><input type='date' name='genfinalstart' class='form-control' min='1950-01-02' required></td>
                      <td>To</td>
                      <td><input type='date' name='genfinalend' class='form-control' min='1950-01-02' required></td>
                      <td>
                    <button type="submit" class="btn btn-primary" name="genfinal"><i class="glyphicon glyphicon-floppy-save"></i> Save Schedule</button>
                    <?php 
                    if(isset($_POST['genfinal'])){
                      $period=4;
                      $start=$_POST['genfinalstart'];
                      $end=$_POST['genfinalend'];
                      $class->setedate($period,$start,$end,'GENED');
                    }
                    ?>
                    
                    </td>
                    <td>
                      <?php $class->getexamdate('FINAL','GENED'); ?>
                    </td>

                    </form>
                    </tr>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"><b>Set Deadline Submission of TQ & TOS for GEN-ED</b></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding" style="height:230px;">
                  <table class="table table-hover">
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>Prelim</strong></td>
                      <td>Deadline</td>
                      <td><input type='date' name='genprelimdate' class='form-control' min='1950-01-02' required></td>
                      <td>
                    <button type="submit" class="btn btn-primary" name="genprelimd"><i class="glyphicon glyphicon-floppy-save"></i> Save Deadline</button>
                    <?php 
                    if(isset($_POST['genprelimd'])){
                      $period=1;
                      $date=$_POST['genprelimdate'];
                      $class->setddate($period,$date,'GENED');
                    }
                    ?>
                    
                    </td>
                    <td>
                      <?php $class->getdeadlinedate('PRELIM','GENED'); ?>
                    </td>
                    
                    </form>
                    </tr>
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>Midterm</strong></td>
                      <td>Deadline</td>
                      <td><input type='date' name='genmidtemdate' class='form-control' min='1950-01-02' required></td>
                      
                      <td>
                    <button type="submit" class="btn btn-primary" name="genmidtemd"><i class="glyphicon glyphicon-floppy-save"></i> Save Deadline</button>
                    <?php 
                    if(isset($_POST['genmidtemd'])){
                      $period=2;
                      $date=$_POST['genmidtemdate'];
                      $class->setddate($period,$date,'GENED');
                    }
                    ?>
                    
                    </td>
                    <td>
                      <?php $class->getdeadlinedate('MIDTERM','GENED'); ?>
                    </td>

                    </form>
                    </tr>
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>Pre-Final</strong></td>
                      <td>Deadline</td>
                      <td><input type='date' name='genprefinaldate' class='form-control' min='1950-01-02' required></td>
                      <td>
                    <button type="submit" class="btn btn-primary" name="genprefinald"><i class="glyphicon glyphicon-floppy-save"></i> Save Deadline</button>
                    <?php 
                    if(isset($_POST['genprefinald'])){
                      $period=3;
                      $date=$_POST['genprefinaldate'];
                      $class->setddate($period,$date,'GENED');
                    }
                    ?>
                    
                    </td>
                    <td>
                      <?php $class->getdeadlinedate('PRE-FINAL','GENED'); ?>
                    </td>

                    </form>
                    </tr>
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>Final</strong></td>
                      <td>Deadline</td>
                      <td><input type='date' name='genfinaldate' class='form-control' min='1950-01-02' required></td>
                      <td>
                    <button type="submit" class="btn btn-primary" name="genfinald"><i class="glyphicon glyphicon-floppy-save"></i> Save Deadline</button>
                    <?php 
                    if(isset($_POST['genfinald'])){
                      $period=4;
                      $date=$_POST['genfinaldate'];
                      $class->setddate($period,$date,'GENED');
                    }
                    ?>
                    
                    </td>
                    <td>
                      <?php $class->getdeadlinedate('FINAL','GENED'); ?>
                    </td>

                    </form>
                    </tr>
                  </table>
                </div>
                </form>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
         

           <?php
        // }else{
          ?>


          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"><b>Set Exam Schedule for College</b></h3>
                </div>
                
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding" style="height:230px;">
                  <table class="table table-hover">
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>Prelim</strong></td>
                      <td>From</td>
                      <td><input type='date' name='prelimstart' class='form-control' min='1950-01-02' required></td>
                      <td>To</td>
                      <td><input type='date' name='prelimend' class='form-control' min='1950-01-02' required></td>
                      <td>
                    <button type="submit" class="btn btn-primary" name="bprelim"><i class="glyphicon glyphicon-floppy-save"></i> Save Schedule</button>
                    <?php 
                    if(isset($_POST['bprelim'])){
                      $period=1;
                      $start=$_POST['prelimstart'];
                      $end=$_POST['prelimend'];
                      $class->setedate($period,$start,$end,$depart);
                    }
                    ?> 
                    
                    </td>
                    <td>
                      <?php $class->getexamdate('PRELIM',$depart); ?>
                    </td>

                    </form>
                    </tr>
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>Midterm</strong></td>
                      <td>From</td>
                      <td><input type='date' name='midtermstart' class='form-control' min='1950-01-02' required></td>
                      <td>To</td>
                      <td><input type='date' name='midtermend' class='form-control' min='1950-01-02' required></td>
                      
                      <td>
                    <button type="submit" class="btn btn-primary" name="bmidterm"><i class="glyphicon glyphicon-floppy-save"></i> Save Schedule</button>
                    <?php 
                    if(isset($_POST['bmidterm'])){
                      $period=2;
                      $start=$_POST['midtermstart'];
                      $end=$_POST['midtermend'];
                      $class->setedate($period,$start,$end,$depart);
                    }
                    ?>
                    
                    </td>
                    <td>
                      <?php $class->getexamdate('MIDTERM',$depart); ?>
                    </td>

                    </form>
                    </tr>
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>Prefinal</strong></td>
                      <td>From</td>
                      <td><input type='date' name='prefinalstart' class='form-control' min='1950-01-02' required></td>
                      <td>To</td>
                      <td><input type='date' name='prefinalend' class='form-control' min='1950-01-02' required></td>
                      <td>
                    <button type="submit" class="btn btn-primary" name="bprefinal"><i class="glyphicon glyphicon-floppy-save"></i> Save Schedule</button>
                    <?php 
                    if(isset($_POST['bprefinal'])){
                      $period=3;
                      $start=$_POST['prefinalstart'];
                      $end=$_POST['prefinalend'];
                      $class->setedate($period,$start,$end,$depart);
                    }
                    ?>
                    
                    </td>
                    <td>
                      <?php $class->getexamdate('PRE-FINAL',$depart); ?>
                    </td>

                    </form>
                    </tr>
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>Final</strong></td>
                      <td>From</td>
                      <td><input type='date' name='finalstart' class='form-control' min='1950-01-02' required></td>
                      <td>To</td>
                      <td><input type='date' name='finalend' class='form-control' min='1950-01-02' required></td>
                      <td>
                    <button type="submit" class="btn btn-primary" name="bfinal"><i class="glyphicon glyphicon-floppy-save"></i> Save Schedule</button>
                    <?php 
                    if(isset($_POST['bfinal'])){
                      $period=4;
                      $start=$_POST['finalstart'];
                      $end=$_POST['finalend'];
                      $class->setedate($period,$start,$end,$depart);
                    }
                    ?>
                    
                    </td>
                    <td>
                      <?php $class->getexamdate('FINAL',$depart); ?>
                    </td>

                    </form>
                    </tr>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"><b>Set Deadline Submission of TQ & TOS for College</b></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding" style="height:230px;">
                  <table class="table table-hover">
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>Prelim</strong></td>
                      <td>Deadline</td>
                      <td><input type='date' name='prelimddate' class='form-control' min='1950-01-02' required></td>
                      <td>
                    <button type="submit" class="btn btn-primary" name="bprelimd"><i class="glyphicon glyphicon-floppy-save"></i> Save Deadline</button>
                    <?php 
                    if(isset($_POST['bprelimd'])){
                      $period=1;
                      $date=$_POST['prelimddate'];
                      $class->setddate($period,$date,$depart);
                    }
                    ?>
                    
                    </td>
                    <td>
                      <?php $class->getdeadlinedate('PRELIM',$depart); ?>
                    </td>
                    
                    </form>
                    </tr>
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>Midterm</strong></td>
                      <td>Deadline</td>
                      <td><input type='date' name='midtermddate' class='form-control' min='1950-01-02' required></td>
                      
                      <td>
                    <button type="submit" class="btn btn-primary" name="bmidtermd"><i class="glyphicon glyphicon-floppy-save"></i> Save Deadline</button>
                    <?php 
                    if(isset($_POST['bmidtermd'])){
                      $period=2;
                      $date=$_POST['midtermddate'];
                      $class->setddate($period,$date,$depart);
                    }
                    ?>
                    
                    </td>
                    <td>
                      <?php $class->getdeadlinedate('MIDTERM',$depart); ?>
                    </td>

                    </form>
                    </tr>
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>Prefinal</strong></td>
                      <td>Deadline</td>
                      <td><input type='date' name='prefinalddate' class='form-control' min='1950-01-02' required></td>
                      <td>
                    <button type="submit" class="btn btn-primary" name="bprefinald"><i class="glyphicon glyphicon-floppy-save"></i> Save Deadline</button>
                    <?php 
                    if(isset($_POST['bprefinald'])){
                      $period=3;
                      $date=$_POST['prefinalddate'];
                      $class->setddate($period,$date,$depart);
                    }
                    ?>
                    
                    </td>
                    <td>
                      <?php $class->getdeadlinedate('PRE-FINAL',$depart); ?>
                    </td>

                    </form>
                    </tr>
                    <tr>
                    <form role="form-sm" method="post">
                      <td><strong>Final</strong></td>
                      <td>Deadline</td>
                      <td><input type='date' name='finalddate' class='form-control' min='1950-01-02' required></td>
                      <td>
                    <button type="submit" class="btn btn-primary" name="bfinald"><i class="glyphicon glyphicon-floppy-save"></i> Save Deadline</button>
                    <?php 
                    if(isset($_POST['bfinald'])){
                      $period=4;
                      $date=$_POST['finalddate'];
                      $class->setddate($period,$date,$depart);
                    }
                    ?>
                    
                    </td>
                    <td>
                      <?php $class->getdeadlinedate('FINAL',$depart); ?>
                    </td>

                    </form>
                    </tr>
                  </table>
                </div>
                </form>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
          </div> 
          <?php
        // }
      ?>
    </section>
  </div>
  <?php
include('footer.php'); 
?>
</body>
</html>
