<?php
include('header.php'); 
include 'class.php';
$class = new testbank();
if ( !empty ( $_GET ) ) {
  $tq_id=$_GET['shstq_id'];
  $syllabus_id=$_GET['shssyllabus_id'];
  $sql=mysql_query("SELECT shs_subject.shs_subj_name, shs_subject.shs_subj_id, shs_tq.exam_id, major_exams.exam_period, school_year.sy, semester.semester FROM shs_tq INNER JOIN shs_syll ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id WHERE shs_tq.shs_tq_id ='".$tq_id."'");
  while ($row=mysql_fetch_array($sql)) {
    $subj_id=$row['shs_subj_id'];
    $period=$row['exam_id'];
    $subject=$row['shs_subj_name']."(".$row['exam_period'].")";
    $subject1=$row['shs_subj_name'];
    $department="SHS";
    $sy=$row['sy'];
    $sem=$row['semester'];
    $exam_period=$row['exam_period'];
  }
  date_default_timezone_set('Asia/Manila');
}
$position=$position_session;
?>
<style type="text/css">
  #alertsuccess1{
    position: absolute;
    top: 10px;
    margin-left: 100px;
    right: 20px;
    z-index: 999;
    width: 250px;
    opacity: 0.8;
  }
  #alertsuccess2{
    position: absolute;
    top: 10px;
    margin-left: 100px;
    right: 20px;
    z-index: 999;
    opacity: 0.8;
  }#alertsuccess3{
    position: absolute;
    top: 10px;
    margin-left: 100px;
    right: 20px;
    z-index: 999;
    opacity: 0.8;
  }
  #alertsuccess4{
    position: absolute;
    top: 10px;
    margin-left: 100px;
    right: 20px;
    z-index: 999;
    width: 250px;
    opacity: 0.8;
  }
  #alertsuccess5{
    position: absolute;
    top: 10px;
    margin-left: 100px;
    right: 20px;
    z-index: 999;
    opacity: 0.8;
  }#alertsuccess6{
    position: absolute;
    top: 10px;
    margin-left: 100px;
    right: 20px;
    z-index: 999;
    opacity: 0.8;
  }#alertsuccess7{
    position: absolute;
    top: 10px;
    margin-left: 100px;
    right: 20px;
    z-index: 999;
    opacity: 0.8;
  }
</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<script src="js/jquery.min.js"></script>
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
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Main row -->
      <div class="row" >

        <!-- Left col -->
        <section class="col-lg-8">
            <!-- Create TQ widget -->
            <div class="box  box-primary" id="div1">
              
              <div class="box-header">
                <h3 class="box-title"><b>Create TQ  for <?php echo $subject; ?></b></h3>
                <a href="#" id="utt" class="pull-right uptqtos">Upload TQ and TOS</a>
              </div>
              <div class="box-body">
              
              <form method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Directions</span>
                      <textarea rows="2" placeholder="Enter Exam Directions" style="width: 100%; resize: vertical; " name="maindirection" id="maindirection" required></textarea>   
                      <span class="input-group-btn">
                      <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                            <i class="fa fa-asterisk"></i>
                          </span>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenu1" style="width:350px">
                            <div class="col-xs-12">
                              <div class="row">
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('<b></b>')">
                                    <i class="fa"></i><b>B</b>
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('<i></i>')">
                                    <i class="fa"></i><b><i>i</i></b>
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('<u></u>')">
                                    <i class="fa"></i><b><u>U</u></b>
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8733;')">
                                    <i class="fa"></i>&#8733;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8734;')">
                                    <i class="fa"></i>&infin;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8736;')">
                                    <i class="fa"></i>&#8736;
                                  </span>
                                </div>
                              </div>
                              
                              
                              <div class="row">
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8745;')">
                                    <i class="fa"></i>&#8745;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8746;')">
                                    <i class="fa"></i>&#8746;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8747;')">
                                    <i class="fa"></i>&#8747;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8756;')">
                                    <i class="fa"></i>&#8756;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8764;')">
                                    <i class="fa"></i>&#8764;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8773;')">
                                    <i class="fa"></i>&#8773;
                                  </span>
                                </div>
                              </div>
                              
                              
                              <div class="row">
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8776;')">
                                    <i class="fa"></i>&#8776;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8800;')">
                                    <i class="fa"></i>&#8800;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8801;')">
                                    <i class="fa"></i>&#8801;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8804;')">
                                    <i class="fa"></i>&#8804;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8805;')">
                                    <i class="fa"></i>&#8805;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8834;')">
                                    <i class="fa"></i>&#8834;
                                  </span>
                                </div>
                              </div>
                              
                              
                              <div class="row">
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8835;')">
                                    <i class="fa"></i>&#8835;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8836;')">
                                    <i class="fa"></i>&#8836;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8838;')">
                                    <i class="fa"></i>&#8838;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8839;')">
                                    <i class="fa"></i>&#8839;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8869;')">
                                    <i class="fa"></i>&#8869;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8482;')">
                                    <i class="fa"></i>&#8482;
                                  </span>
                                </div>
                              </div>
                              
                              
                              <div class="row">
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#937;')">
                                    <i class="fa"></i>&#937;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#934;')">
                                    <i class="fa"></i>&#934;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#982;')">
                                    <i class="fa"></i>&#982;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#188;')">
                                    <i class="fa"></i>&#188;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#189;')">
                                    <i class="fa"></i>&#189;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#190;')">
                                    <i class="fa"></i>&#190;
                                  </span>
                                </div>
                              </div>
                                           
                                                      
                              <div class="row">
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#209;')">
                                    <i class="fa"></i>&#209;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#241;')">
                                    <i class="fa"></i>&#241;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8369;')">
                                    <i class="fa"></i>&#8369;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#169;')">
                                    <i class="fa"></i>&#169;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#174;')">
                                    <i class="fa"></i>&#174;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialmd('&#8706;')">
                                    <i class="fa"></i>&#8706;
                                  </span>
                                </div>
                              </div>

                            </div>
                          </div>
                      <span class="btn btn-file" id="attmain"><i class="fa fa-paperclip" ></i><input type="file" name="maindirectionfile"></span><span class="btn" id="delattmain"><i class="glyphicon glyphicon-erase" onclick="delatt()" ></i></span></span>  
                    </div>
                  </div>
                </div>
                <br/>
                <div class="row">
                  <div class="col-xs-2">
                    <label>Test no.</label>
                    <select class="form-control form-control-sm tnum" id="tnum" name="tnum" onchange="loadnum()" required>
                    <option></option>
                    </select>
                  </div>
                  <div class="col-xs-4" >
                    <label>Test Type</label>
                    <select class="form-control form-control-sm qtype" id="qtype" name="qtype" onchange="dis()"  required>
                      <option></option>
                      <option value="Identification">Identification</option>
                      <option value="Enumeration">Enumeration</option>
                      <option value="Multiple Choice">Multiple Choice</option>
                      <option value="Matching Type">Matching Type</option>
                      <option value="Fill in the Blank">Fill in the Blank</option>
                      <option value="True or False">True or False</option>
                      <option value="Modified True or False">Modified True or False</option>
                      <option value="Problem Solving">Problem Solving</option>
                      <option value="Essay">Essay</option>
                      <option value="Analogy">Analogy</option>
                      <option value="Short-Response Test">Short-Response Test</option>
                      <option value="Proving">Proving</option>
                      <option value="Sentence Completion Test">Sentence Completion Test</option>
                    </select>
                  </div>
                </div>
                <br/>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Direction</span>
                      <textarea placeholder="Enter Test Direction" style="width: 100%; height: 33px; resize: vertical; " id="direction" name="direction" required></textarea>
                      <span class="input-group-btn">
                      <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                            <i class="fa fa-asterisk"></i>
                          </span>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenu1" style="width:350px">
                            <div class="col-xs-12">
                              <div class="row">
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('<b></b>')">
                                    <i class="fa"></i><b>B</b>
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('<i></i>')">
                                    <i class="fa"></i><b><i>i</i></b>
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('<u></u>')">
                                    <i class="fa"></i><b><u>U</u></b>
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8733;')">
                                    <i class="fa"></i>&#8733;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8734;')">
                                    <i class="fa"></i>&infin;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8736;')">
                                    <i class="fa"></i>&#8736;
                                  </span>
                                </div>
                              </div>
                              
                              
                              <div class="row">
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8745;')">
                                    <i class="fa"></i>&#8745;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8746;')">
                                    <i class="fa"></i>&#8746;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8747;')">
                                    <i class="fa"></i>&#8747;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8756;')">
                                    <i class="fa"></i>&#8756;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8764;')">
                                    <i class="fa"></i>&#8764;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8773;')">
                                    <i class="fa"></i>&#8773;
                                  </span>
                                </div>
                              </div>
                              
                              
                              <div class="row">
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8776;')">
                                    <i class="fa"></i>&#8776;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8800;')">
                                    <i class="fa"></i>&#8800;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8801;')">
                                    <i class="fa"></i>&#8801;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8804;')">
                                    <i class="fa"></i>&#8804;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8805;')">
                                    <i class="fa"></i>&#8805;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8834;')">
                                    <i class="fa"></i>&#8834;
                                  </span>
                                </div>
                              </div>
                              
                              
                              <div class="row">
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8835;')">
                                    <i class="fa"></i>&#8835;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8836;')">
                                    <i class="fa"></i>&#8836;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8838;')">
                                    <i class="fa"></i>&#8838;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8839;')">
                                    <i class="fa"></i>&#8839;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8869;')">
                                    <i class="fa"></i>&#8869;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8482;')">
                                    <i class="fa"></i>&#8482;
                                  </span>
                                </div>
                              </div>
                              
                              
                              <div class="row">
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#937;')">
                                    <i class="fa"></i>&#937;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#934;')">
                                    <i class="fa"></i>&#934;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#982;')">
                                    <i class="fa"></i>&#982;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#188;')">
                                    <i class="fa"></i>&#188;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#189;')">
                                    <i class="fa"></i>&#189;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#190;')">
                                    <i class="fa"></i>&#190;
                                  </span>
                                </div>
                              </div>
                                           
                                                      
                              <div class="row">
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#209;')">
                                    <i class="fa"></i>&#209;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#241;')">
                                    <i class="fa"></i>&#241;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8369;')">
                                    <i class="fa"></i>&#8369;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#169;')">
                                    <i class="fa"></i>&#169;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#174;')">
                                    <i class="fa"></i>&#174;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="speciald('&#8706;')">
                                    <i class="fa"></i>&#8706;
                                  </span>
                                </div>
                              </div>

                            </div>
                          </div>
                      <span class="btn btn-file" id="attdirect"><i class="fa fa-paperclip"></i><input type="file" name="directionfile"></span><span class="btn" id="delattdirect" style="display:none"><i class="glyphicon glyphicon-erase" onclick="delattdirect()" ></i></span></span>  
                    </div>
                  </div>
                </div>
                <br/>
                <div class="row">
                  <div class="col-xs-2">
                    <label>Number</label>
                    <select class="form-control form-control-sm qnum" id="qnum" name="qnum" onchange="loadq()" required>
                    <option></option>
                    </select>
                  </div>
                  <div class="col-xs-4">
                    <label>Topics</label>
                    <select class="form-control form-control-sm topic" id="topic" name="topic" required>
                      <option></option>
                    </select>
                  </div>
                  <div class="col-xs-4">
                    <label>Domains</label>
                    <select class="form-control form-control-sm" id="cognitive" name="cognitive" required>
                      <option></option>
                      <option value="1">Knowledge</option>
                      <option value="2">Comprehension</option>
                      <option value="3">Application</option>
                      <option value="4">Analysis</option>
                      <option value="5">Evaluation</option>
                      <option value="6">Synthesis</option>
                    </select>
                  </div>
                  <div class="col-xs-2">
                    <label>Points</label>
                    <input type="text" name="points" list="exampleList" id="points" class="form-control form-control-sm points" required>
                      <datalist id="exampleList">
                        <option value="1">
                        <option value="2">
                        <option value="3">
                        <option value="4">
                        <option value="5">
                        <option value="10">
                        <option value="15">
                        <option value="20">
                        <option value="25">
                        <option value="30">
                        <option value="35">
                        <option value="40">
                        <option value="45">
                        <option value="50">
                    </datalist>
                  </div>
                </div>
                <br/>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Question</span>
                      <textarea placeholder="Enter Question " style="width: 100%; height: 33px; resize: vertical; " name="question" id="question" required></textarea> 
                      <span class="input-group-btn">
                          <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" >
                            <i class="fa fa-asterisk"></i>
                          </span>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenu1" style="width:350px">
                            <div class="col-xs-12">
                              <div class="row">
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('<b></b>')">
                                    <i class="fa"></i><b>B</b>
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('<i></i>')">
                                    <i class="fa"></i><b><i>i</i></b>
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('<u></u>')">
                                    <i class="fa"></i><b><u>U</u></b>
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8733;')">
                                    <i class="fa"></i>&#8733;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8734;')">
                                    <i class="fa"></i>&infin;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8736;')">
                                    <i class="fa"></i>&#8736;
                                  </span>
                                </div>
                              </div>
                              
                              
                              <div class="row">
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8745;')">
                                    <i class="fa"></i>&#8745;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8746;')">
                                    <i class="fa"></i>&#8746;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8747;')">
                                    <i class="fa"></i>&#8747;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8756;')">
                                    <i class="fa"></i>&#8756;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8764;')">
                                    <i class="fa"></i>&#8764;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8773;')">
                                    <i class="fa"></i>&#8773;
                                  </span>
                                </div>
                              </div>
                              
                              
                              <div class="row">
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8776;')">
                                    <i class="fa"></i>&#8776;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8800;')">
                                    <i class="fa"></i>&#8800;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8801;')">
                                    <i class="fa"></i>&#8801;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8804;')">
                                    <i class="fa"></i>&#8804;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8805;')">
                                    <i class="fa"></i>&#8805;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8834;')">
                                    <i class="fa"></i>&#8834;
                                  </span>
                                </div>
                              </div>
                              
                              
                              <div class="row">
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8835;')">
                                    <i class="fa"></i>&#8835;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8836;')">
                                    <i class="fa"></i>&#8836;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8838;')">
                                    <i class="fa"></i>&#8838;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8839;')">
                                    <i class="fa"></i>&#8839;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8869;')">
                                    <i class="fa"></i>&#8869;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8482;')">
                                    <i class="fa"></i>&#8482;
                                  </span>
                                </div>
                              </div>
                              
                              
                              <div class="row">
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#937;')">
                                    <i class="fa"></i>&#937;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#934;')">
                                    <i class="fa"></i>&#934;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#982;')">
                                    <i class="fa"></i>&#982;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#188;')">
                                    <i class="fa"></i>&#188;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#189;')">
                                    <i class="fa"></i>&#189;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#190;')">
                                    <i class="fa"></i>&#190;
                                  </span>
                                </div>
                              </div>
                                           
                                                      
                              <div class="row">
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#209;')">
                                    <i class="fa"></i>&#209;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#241;')">
                                    <i class="fa"></i>&#241;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8369;')">
                                    <i class="fa"></i>&#8369;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#169;')">
                                    <i class="fa"></i>&#169;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#174;')">
                                    <i class="fa"></i>&#174;
                                  </span>
                                </div>
                                <div class="col-xs-2">
                                  <span class="btn dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" onclick="specialq('&#8706;')">
                                    <i class="fa"></i>&#8706;
                                  </span>
                                </div>
                              </div>

                            </div>
                          </div>
                        <span class="btn btn-file" id="attquest">
                          <i class="fa fa-paperclip"></i>
                          <input type="file" name="questionfile">
                        </span>
                        <span class="btn" id="delattquest" style="display:none"><i class="glyphicon glyphicon-erase" onclick="delattquest()" ></i>
                        </span>
                      </span>
                      
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <table class="table table-bordered" id="answer1_field">
                        <tr>
                          <td>
                            <div class="row">
                              <div class="col-xs-12">
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">Answer 1.</span>
                                  <input type="text" name="enuans[0]" class="form-control" placeholder="Enter Answer" id="enuanswer0" aria-describedby="basic-addon1" required>
                                  <span class="input-group-addon enumcount" id="basic-addon1">
              
                                    <a href="#"><i id="1" class="glyphicon glyphicon-plus enuaddans">
                                    <span class="enuaddanstext">Add</span></i></a>
                                  </span>
                                  <!-- <span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="answerfile[0]"></span></span> -->
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                    </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <table class="table table-bordered collapse" id="multiplechoice1_field">
                      <tr>
                        <td>
                          <div class="row">
                            <div class="col-xs-12">
                              <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Choice 1.</span>
                                <input type="text" name="multians[0]" class="form-control choices" placeholder="Enter Choice" id="answer0" aria-describedby="basic-addon1" >
                                <span class="input-group-addon multicount" id="basic-addon1"><a href="#"><i id="1" class="glyphicon glyphicon-plus multiaddans"><span class="multiaddanstext">Add</span></i></a></span><!-- <span class="input-group-btn"><span class="btn btn-file"><i class="fa fa-paperclip"></i><input type="file" name="choicefile[0]"></span></span> -->
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="box-footer clearfix">
                <div class="row">
                  <div class="col-md-2">
                    <button type="button" class="pull-right btn btn-primary" id="print" onclick="PrintPreview2(printableArea2)" style="width:90px;">
                    <i class="glyphicon glyphicon-search"></i> Remarks </button>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="pull-right btn btn-primary" id="print" onclick="PrintPreview1()" style="width:90px;">
                    <i class="glyphicon glyphicon-search"></i> Preview  </button>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="pull-right btn btn-primary" id="print" onclick="printDiv('printableArea3')" style="width:90px;">
                    <i class="fa fa-print"></i> Print </button>
                  </div>
                  <div class="col-md-2">
                    <button type="submit" class="pull-right btn btn-primary" id="save" name="save" style="width:90px;">
                    <i class="glyphicon glyphicon-floppy-disk"></i> Save </button>
                  </div>
                  </form>
                  <?php 
                    if (isset($_POST['save'])){
                        $location = 'uploads/';
                        $max_size = 20000000;

                        $quest1 = rand();
                        $name1 = $_FILES['maindirectionfile']['name'];
                        $extension1 = strtolower(substr($name1, strpos($name1, '.')+1));
                        $size1 = $_FILES['maindirectionfile']['size'];
                        $type1 = $_FILES['maindirectionfile']['type'];
                        $tmp_name1 = $_FILES['maindirectionfile']['tmp_name'];
                        $q1="";

                        
                        if (isset($name1)) {
                          if (!empty($name1)) {
                            if (($extension1=='jpg'||$extension1=='jpeg'||$extension1=='png') && ($type1=='image/jpeg'||$type1=='image/png' ) && $size1<=$max_size) {
                              $q1 = $quest1."-".$name1;
                              if (move_uploaded_file($tmp_name1, $location.$q1)) {
                              }else{
                                echo "There was an error.";
                              }
                            }else{
                              echo "<script type='text/javascript'>alert('File must be jpeg or png and must be 2mb or less.');</script>";
                            }
                          }else{
                          }
                            
                        }

                        $quest2 = rand();
                        $name2 = $_FILES['directionfile']['name'];
                        $extension2 = strtolower(substr($name2, strpos($name2, '.')+1));
                        $size2 = $_FILES['directionfile']['size'];
                        $type2 = $_FILES['directionfile']['type'];
                        $tmp_name2 = $_FILES['directionfile']['tmp_name'];
                        $q2="";

                        
                        if (isset($name2)) {
                          if (!empty($name2)) {
                            if (($extension2=='jpg'||$extension2=='jpeg'||$extension2=='png') && ($type2=='image/jpeg'||$type2=='image/png') && $size2<=$max_size) {
                              $q2 = $quest2."-".$name2;
                              if (move_uploaded_file($tmp_name2, $location.$q2)) {
                              }else{
                                echo "There was an error.";
                              }
                            }else{
                              echo "<script type='text/javascript'>alert('File must be jpeg or png and must be 2mb or less.');</script>";
                            }
                          }else{
                          }
                            
                        }

                        $quest3 = rand();
                        $name3 = $_FILES['questionfile']['name'];
                        $extension3 = strtolower(substr($name3, strpos($name3, '.')+1));
                        $size3 = $_FILES['questionfile']['size'];
                        $type3 = $_FILES['questionfile']['type'];
                        $tmp_name3 = $_FILES['questionfile']['tmp_name'];
                        $q3="";

                        
                        if (isset($name3)) {
                          if (!empty($name3)) {
                            if (($extension3=='jpg'||$extension3=='jpeg'||$extension3=='png') && ($type3=='image/jpeg'||$type3=='image/png') && $size3<=$max_size) {
                              $q3 = $quest3."-".$name3;
                              if (move_uploaded_file($tmp_name3, $location.$q3)) {
                              }else{
                                echo "There was an error.";
                              }
                            }else{
                              echo "<script type='text/javascript'>alert('File must be jpeg or png and must be 2mb or less.');</script>";
                            }
                          }else{
                          }
                            
                        }


                        $class->shssaveq($tq_id,$q1,$q2,$q3);
                        ?>
                          <script type="text/javascript">
                          </script>
                        <?php
                        } 
                        ?>  

                  <div class="col-xs-2">
                    <!-- <button type="submit" class="pull-right btn btn-success" name="submittoph" id="submittoph" style="width:90px;">
                  <i class="glyphicon glyphicon-floppy-save"></i> Submit </button> -->
                  <!-- <?php if($position_session=="Instructor" OR $position_session=="Program Head" AND ($depart != "SHS" OR $depart != "GENED" ) OR $position_session=="Dean" AND ($depart != "SHS" OR $depart != "GENED" )){
                    ?>
                    <button class="pull-right btn btn-success subtoph" data-toggle="modal" data-target="#submitph" style="width:90px;">Submit</button>
                    <div class="modal fade bd-example-modal-xs" id="submitph" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
                      <div class="modal-dialog modal-xs" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <div id="alertsuccess1" class="alert alert-success collapse">
                              <button type="button" class="close" onclick="close1()">×</button>
                              <strong><h4 id="txt1"></h4></strong> 
                            </div>
                            <div id="alertsuccess12" class="alert alert-warning collapse">
                              <strong><h4 id="txt12"></h4></strong> 
                            </div>
                            <div id="alertsuccess3" class="alert alert-danger collapse">
                              <strong><h4 id="txt3"></h4></strong> 
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><strong>Program Heads</strong></h4>
                          </div>
                          <div class="modal-body">
                            
                            <table class="table table-bordered">
                             <?php $class->loadph($department); ?>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php
                  }else if ($position_session=="Program Head" AND ($depart == "SHS" OR $depart == "GENED" )) {
                    ?>
                      <button class="pull-right btn btn-success subtoph" style="width:90px;" onclick="submitph('ph','<?php echo $position;?>')">Submit</button>
                    <?php
                  }else if ($position_session=="Dean" AND ($depart == "SHS" OR $depart == "GENED" )) {
                    ?>
                      <button class="pull-right btn btn-success subtoph" style="width:90px;" onclick="submitph('dean','<?php echo $position;?>')">Submit</button>
                    <?php
                  }
                  ?> -->
                  <button class="pull-right btn btn-success subtoph" style="width:90px;" onclick="submitph('instructor','<?php echo $position;?>')">Submit</button>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="pull-right btn btn-danger" id="deletenum" onclick="delnum()" style="width:90px;">
                    <i class="fa fa-trash"></i> Delete </button>
                  </div>
                  <div  id="printableArea" style="display:none">
                    <?php include('shsprinttos.php'); ?>
                  </div>
                  <div  id="printableArea2" style="display:none">
                    <?php include('shspreviewrem.php'); ?>
                  </div>
                  <div  id="printableArea3" style="display:none">
                    <?php include('shsprinttqtemp.php'); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="box  box-primary" id="div2">
              <div class="box-header">
                <h3 class="box-title"><b>Upload TQ and TOS for <?php echo $subject; ?></b></h3>
                <a href="#" class="pull-right crtq">Create TQ</a>
              </div>
              <div class="box-body">
                <form method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-xs-12">
                      <b><p id="uploadtqp"></p></b>
                      <div class="input-group">
                        <span class="btn btn-file" id="upload_tq"><i class="fa fa-paperclip" ></i><input type="file" name="upload_tq"></span><span class="btn" id="deluploadtq"><i class="glyphicon glyphicon-erase" onclick="deluploadtq()" ></i></span></span>  
                        <button class="pull-right btn btn-primary" style="width:120px;" id="upload" name="upload" >
                        <i class="glyphicon glyphicon-upload"></i> Upload TQ</button>
                        <button class="pull-right btn btn-primary" style="width:120px;" id="downloadtq" name="downloadtq" >
                        <i class="glyphicon glyphicon-download"></i> download TQ</button>

                        <?php
                        if (isset($_POST['upload'])){
                          $location = 'shs_upload_tq/';
                          $max_size = 50000000;
                          $dt=date("mdYhis");
                          $quest1 = rand();
                          $name1 = $_FILES['upload_tq']['name'];
                          $extension1 = strtolower(substr($name1, strpos($name1, '.')+1));
                          $size1 = $_FILES['upload_tq']['size'];
                          $type1 = $_FILES['upload_tq']['type'];
                          $tmp_name1 = $_FILES['upload_tq']['tmp_name'];
                          $tqup="";
                          if (isset($name1)) {
                            if (!empty($name1)) {
                              $tqup = "TQ-".$fullname_session1."-".$subject1."-".$sy."-".$sem."-".$exam_period."-".$dt.".".$extension1;
                              if (move_uploaded_file($tmp_name1, $location.$tqup)) {
                                $class->insertup($tqup,"tq1",$tq_id);
                              }else{
                                echo "There was an error.";
                              }
                            }else{

                            }
                          }
                        }
                        ?>
                      </div>
                      <br/>
                      <b><p id="uploadtosp"></p></b>
                      <div class="input-group">
                        <span class="btn btn-file" id="upload_tos"><i class="fa fa-paperclip" ></i><input type="file" name="upload_tos"></span><span class="btn" id="deluploadtos"><i class="glyphicon glyphicon-erase" onclick="deluploadtos()" ></i></span></span>  
                        <button class="pull-right btn btn-primary" style="width:120px;" id="uploadtos" name="uploadtos" >
                        <i class="glyphicon glyphicon-upload"></i> Upload TOS</button>
                        <button class="pull-right btn btn-primary" style="width:120px;" id="downloadtos" name="downloadtos" >
                        <i class="glyphicon glyphicon-download"></i> DownloadTOS</button>
                        <?php
                        if (isset($_POST['uploadtos'])){
                          $location = 'shs_upload_tos/';
                          $max_size = 50000000;
                          $dt=date("mdYhis");
                          $quest1 = rand();
                          $name1 = $_FILES['upload_tos']['name'];
                          $extension1 = strtolower(substr($name1, strpos($name1, '.')+1));
                          $size1 = $_FILES['upload_tos']['size'];
                          $type1 = $_FILES['upload_tos']['type'];
                          $tmp_name1 = $_FILES['upload_tos']['tmp_name'];
                          $tosup="";

                          
                          if (isset($name1)) {
                            if (!empty($name1)) {
                              $tosup = "TOS-".$fullname_session1."-".$subject1."-".$sy."-".$sem."-TOS-".$exam_period."-".$dt.".".$extension1;
                              if (move_uploaded_file($tmp_name1, $location.$tosup)) {
                                $class->insertup($tosup,"tos1",$tq_id);
                              }else{
                                echo "There was an error.";
                              }
                            }else{

                            }
                          }
                        }
                        ?>
                      </div>
                       </form>
                      <a class="pull-right btn btn-success subtoph2" style="width:90px;" onclick="submitph('instructor','<?php echo $position;?>')">Submit</a>
                    </div>
                  </div>
               
                <table class="table table-hover table-striped table-bordered" id="qstored">
                  <thead>
                    <tr>
                       <th>Instructor</th>
                      <th>Date Stored</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $class->shsloaduploadedtq($subject1,$tq_id);
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
        </section>
        <section class="col-lg-4" >

          <div class="box box-primary" id="div3">
            <div class="box-header">
              <h3 class="box-title">Table of Specification</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="alertsuccess4" class="alert alert-success collapse">
                <button type="button" class="close" onclick="close1()">×</button>
                <strong><h4 id="txt4"></h4></strong> 
              </div>
              <div id="alertsuccess5" class="alert alert-warning collapse">
                <strong><h4 id="txt5"></h4></strong> 
              </div>
              <div id="alertsuccess6" class="alert alert-danger collapse">
                <strong><h4 id="txt6"></h4></strong> 
              </div>
              <div id="alertsuccess7" class="alert alert-success collapse">
                <strong><h7 id="txt7"></h4></strong> 
              </div>
              <table class="table table-striped" style="text-align: center;" >
                <tbody class="tabletos">
                </tbody>
              </table>
              <br/>
              <div class="row">
                <div class="col-md-8">
                  <button type="button" class="pull-right btn btn-primary" id="print" onclick="PrintPreview()" style="width:90px;">
                  <i class="glyphicon glyphicon-search"></i> Preview  </button>
                </div>
                <div class="col-md-4">
                  <button type="button" class="pull-left btn btn-primary" id="print" onclick="printDiv('printableArea')" style="width:90px;">
                  <i class="fa fa-print"></i> Print </button>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box box-primary">
            <div class="box-header">
              <div id="alertsuccess2" class="alert alert-warning collapse">
                <strong><h4 id="txt2"></h4></strong> 
              </div>
              <h3 class="box-title">Number of Students</h3><h3 id="snum"></h3>
            </div>
            <div class="box-body no-padding" style=" height:100px;">
            <form method="post">
            <table class="table table-bordered">
              <tr>
                <td>
                 <b><p class="nos"></p></b>
                </td>
                <td>
                  <select class="form-control " name="num" id="num" required>
                     <option></option>
                   <?php 
                   for ($i=1; $i < 50; $i++) { 
                     echo "<option>$i</option>";
                   }
                   ?>
                   </select>
                </td>
                <td>
                  <button type="submit" class="pull-right btn btn-primary numcop" name="submit" onclick="fun(<?php echo $tq_id; ?>);">Save</button>
                </td>
                
                </tr>
              </tr>
            </table>
           
            
            </form>
            
          </div>
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
      <div class="row" id="div4">
        <div class="col-xs-12">
          <div class="box" >
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tq" data-toggle="tab">Test Questionnaire</a></li>
                <li><a href="#q" data-toggle="tab">Questions</a></li>
              </ul>
              <div class="tab-content" style="overflow-y:scroll; overflow-x:hidden; height:375px;">
                <div class="active tab-pane" id="tq">
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table class="table table-hover table-striped table-bordered" id="tqstored">
                        <thead>
                          <tr>
                            <th>Instructor</th>
                            <th>Date Stored</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- <tr>
                            <td>Divine Grace G. Romaguera</td>
                            <td>06-16-2017</td>
                            <td><button id="'+tn+'" class="btn btn-success btn-md glyphicon glyphicon-copy "></button></td>
                          </tr> -->
                          <?php $class->shschecktopic($tq_id,$syllabus_id); ?>
                        </tbody>
                      </table>
                      <!-- /.table -->
                    </div>
                    <!-- /.box-body -->
                  </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="q">
                  
                  <div class="col-md-12">
                    <div class="box box">
                       <!-- /.box-header -->
                      <div class="box-body no-padding">
                      </div>
                    </div>
                    <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped table-bordered" id="qstored">
                        <thead>
                          <tr>
                            <th class="col-md-1">Test Type</th>
                            <th class="col-md-1">Topic</th>
                            <th class="col-md-1">Domain</th>
                            <th class="col-md-6">Question</th>
                            <th class="col-md-1">Answer</th>
                            <th class="col-md-1">Points</th>
                            <th class="col-md-1">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- <tr>
                            <td>Identification</td>
                            <td>Topic1</td>
                            <td>Knowledge</td>
                            <td>10</td>
                            <td>1.  It is a symbol or a letter used to represent numbers.</td>
                            <td>Variables</td>
                            <td><button id="'+tn+'" class="btn btn-success btn-md glyphicon glyphicon-copy "></button></td>
                          </tr> -->
                          <?php $class->shsqbank($tq_id,$subj_id,$syllabus_id);?>
                        </tbody>
                      </table>
                      <!-- /.table -->
                      <script type="text/javascript">
                        $(document).on('click', '.copyq', function(){  
                          var button_id = $(this).attr("id");
                          var q_id = $('#qid'+button_id+'').attr("value");
                          var tq_id = '<?php echo "$tq_id"; ?>';
                          var syll = $('#syll').attr("value");
                          console.log(q_id)
                          console.log(tq_id)
                          console.log(syll)
                          $.ajax({
                              type: "POST",
                              data: {qid: q_id, tqid: tq_id, syll: syll},
                              url: "shscopyq.php",
                              success: function(data) {
                                window.location.href='shscreatetq.php?shstq_id='+tq_id+'&shssyllabus_id='+syll;
                              }
                          }); 
                        });
                      </script>
                    </div>
                    <!-- /.box-body -->
                   
                  </div>
                </div>
                <!-- /.tab-pane -->
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
        </div>
      </div>
    </section>
  </div>
<?php
include('footer.php'); 
?>
</body>
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="dist/js/jquery-ui.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<style>
.createtq .createtqtext {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 10px;
    visibility: hidden;
    width: 100px;
    background-color: #3c8dbc;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 60;
}
.edittq .edittqtext {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 10px;
    visibility: hidden;
    width: 50px;
    background-color: #3c8dbc;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 1;
}

.createtq:hover .createtqtext {
    visibility: visible;
}
.edittq:hover .edittqtext {
    visibility: visible;
}
.dltos .dltostext {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 10px;
    visibility: hidden;
    width: 60px;
    background-color: #e7e7e7;
    color: #3c8dbc;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 60;
}
.dltos:hover .dltostext {
    visibility: visible;
}
.dltq .dltqtext {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 10px;
    visibility: hidden;
    width: 60px;
    background-color: #e7e7e7;
    color: #3c8dbc;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 60;
}
.dltq:hover .dltqtext {
    visibility: visible;
}
.copyup .copyuptext {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 10px;
    visibility: hidden;
    width: 60px;
    background-color: #e7e7e7;
    color: #3c8dbc;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 60;
}
.copyup:hover .copyuptext {
    visibility: visible;
}
</style>
<script>
  var status_d;
// $('#deluploadtq').hide();
// $('#downloadtq').hide();
// $('#deluploadtos').hide();
// $('#downloadtos').hide();
$('#downloadtq').click(function(e) {
    e.preventDefault();  //stop the browser from following
    var file = $('#uploadtqp').text();
    window.location.href = 'shs_upload_tq/'+file;
});
$('#downloadtos').click(function(e) {
    e.preventDefault();  //stop the browser from following
    file = $('#uploadtosp').text();
    window.location.href = 'shs_upload_tos/'+file;
});
$('#dltq').click(function(e) {
    e.preventDefault();  //stop the browser from following
    file = $('#dltqname').val();
    window.location.href = 'shs_upload_tq/'+file;
});
$('#dltos').click(function(e) {
    e.preventDefault();  //stop the browser from following
    file = $('#dltosname').val();
    window.location.href = 'shs_upload_tos/'+file;
});
$('.uptqtos').click(function(e) {
    e.preventDefault();  //stop the browser from following
    $('#div1').hide();
    $('#div2').show();
    $('#div3').hide();
    $('#div4').hide();
});
$('.crtq').click(function(e) {
    e.preventDefault();  //stop the browser from following
    $('#div1').show();
    $('#div2').hide();
    $('#div3').show();
    $('#div4').show();
});
$('#tqstored').dataTable();
$('#qstored').dataTable();


function dis(){
   val1= $('#qtype').val();  
  if (val1=="Multiple Choice") {
    $('#multiplechoice1_field').show();
  }else{
    $('#multiplechoice1_field').hide();
  };
}


function fun(tqid){
   val1= $('#num').val();  
   val2=tqid;
    $.ajax({
              type: "Post",
              data: {num: val1, tqid: val2},
              url: "shstqcrud.php?p=savestud",
              success: function(data) {
                    $("#snum").val(d);
                   
              }
        }); 
}
var tn=0;
var multi_ans=1;
var enuans=1;
$(document).on('click', '.enuaddans', function(){  
           var button_id = $(this).attr("id");
           enuans++; 
           tn++; 
           $('#answer'+button_id+'_field').append('<tr id="enuansnum'+enuans+'" class="answerd"><td><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Answer '+enuans+'.</span><input type="text" name="enuans['+tn+']" class="form-control" placeholder="Enter Answer" id="" aria-describedby="basic-addon1"><span class="input-group-addon enumcount" id="basic-addon1"><a href="#"><i id="'+enuans+'" class="glyphicon glyphicon-minus enudelans"><span class="enudelanstext">Remove</span></i></a></span></div></div></div></td></tr>');  
      });
  $(document).on('click', '.enudelans', function(){  
    var button_id = $(this).attr("id");   
    $('#enuansnum'+button_id+'').remove(); 
    enuans--; 
    tn--;
  });  

var ch=0;
var choices=1;
$(document).on('click', '.multiaddans', function(){  
           var button_id = $(this).attr("id");
           choices++;  
           ch++; 
           $('#multiplechoice'+button_id+'_field').append('<tr id="multians'+choices+'" class="choiced"><td><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Choice '+choices+'.</span><input type="text" name="multians['+ch+']" class="form-control" placeholder="Enter Choice" id="" aria-describedby="basic-addon1"><span class="input-group-addon enumcount" id="basic-addon1"><a href="#"><i id="'+choices+'" class="glyphicon glyphicon-minus multidelnum"><span class="multidelnumtext">Remove</span></i></a></span></div></div></div></td></tr>');  
      });
  $(document).on('click', '.multidelnum', function(){  
    var button_id = $(this).attr("id");   
    $('#multians'+button_id+'').remove(); 
    choices--; 
    ch--; 
  });  

$( window ).load(function() {
  var status_desc;
  $("#deletenum").hide();
  var tq_id=<?php echo $tq_id;?>;
  var period=<?php echo $period;?>;
  var syllabus_id=<?php echo $syllabus_id;?>;
  $.ajax({
    type:"POST",
    url:"shstqcrud.php?p=checkstatus",
    data:{tq_id: tq_id, syllabus_id:syllabus_id},
    success: function(data){
      var obj = $.parseJSON(data);
      $.each(obj, function(key , value) {
        status_desc=this['status_desc'];
      });
      
    }
  });
  $.ajax({

    type:"POST",
    url:"shstqcrud.php?p=loadtos",
    data:"tq_id="+tq_id,
    success: function(data){
      
      var total_ni;
      var total;
      var noh;
      var knowledge;
      var comprehension;
      var application;
      var analysis;
      var evaluation;
      var synthesis;
      var knowledge1;
      var comprehension1;
      var application1;
      var analysis1;
      var evaluation1;
      var synthesis1;
      var totalnumi; 
      var topic;
      var tpoints;
      var status_desc
      var obj = $.parseJSON(data);
        $.each(obj, function(key , value) {
          tpointstq=parseInt(this['tpointstq']);
          titemstq=parseInt(this['titemstq']);
          topic=parseInt(this['topic_desc']);
          topicn=parseInt(this['topicn']);
          tpoints=parseInt(this['tpoints']);
          noh=parseInt(this['num_of_hours']);
          knowledge=parseInt(this['kno_ni']);
          comprehension=parseInt(this['com_ni']);
          application=parseInt(this['app_ni']);
          analysis=parseInt(this['ana_ni']);
          evaluation=parseInt(this['eva_ni']);
          synthesis=parseInt(this['syn_ni']);
          ti=parseInt(knowledge)+parseInt(comprehension)+parseInt(application)+parseInt(analysis)+parseInt(evaluation)+parseInt(synthesis);
          knowledgep=parseInt(this['kno_np']);
          comprehensionp=parseInt(this['com_np']);
          applicationp=parseInt(this['app_np']);
          analysisp=parseInt(this['ana_np']);
          evaluationp=parseInt(this['eva_np']);
          synthesisp=parseInt(this['syn_np']);
          tp=parseInt(knowledgep)+parseInt(comprehensionp)+parseInt(applicationp)+parseInt(analysisp)+parseInt(evaluationp)+parseInt(synthesisp);
          knowledge1=parseInt(this['c1']);
          comprehension1=parseInt(this['c2']);
          application1=parseInt(this['c3']);
          analysis1=parseInt(this['c4']);
          evaluation1=parseInt(this['c5']);
          synthesis1=parseInt(this['c6']);
          knowledge2=parseInt(this['c7']);
          comprehension2=parseInt(this['c8']);
          application2=parseInt(this['c9']);
          analysis2=parseInt(this['c10']);
          evaluation2=parseInt(this['c11']);
          synthesis2=parseInt(this['c12']);
          status_desc=this['status_desc'];
          if (status_desc!=='pending') {
            $("#utt").hide("fadeOut");
            $(".subtoph").hide("fadeOut");
            $("#save").hide("fadeOut");
            $(".opentq").hide("fadeOut");
            $(".copyq").hide("fadeOut");
            $(".numcop").hide("fadeOut");
            $(".subtoph2").hide("fadeOut");

          }else{
            if (knowledge2==knowledgep && comprehension2==comprehensionp && application2==applicationp && analysis2==analysisp && evaluation2==evaluationp && synthesis2==synthesisp){
              $(".subtoph").show("fadeOut");
            }else{
              $(".subtoph").hide("fadeOut");
            };
          };
          
          $.each(value.num_of_hours , function(k , v ){ 
            $(".tabletos").append('<tr><td>'+value.topic_desc[k]+' No. of Items:</td><td colspan="2"><p class="top'+v+'">'+value.topicn[k]+'/'+v.toFixed(2)+'</p></td></tr>');
            if (value.topicn[k]>v) {
              $(".top"+v).css('color', 'red');
            }else if (value.topicn[k]==v){
              $(".top"+v).css('color', 'green');
            };
          });

          if (status_desc!=='pending') {
            $("#delattmain").hide("fadeOut");
          };

            $(".tabletos").append('<tr><td></td><td>Items</td><td>Points</td></tr>');
            $(".tabletos").append('<tr><td>Knowledge:</td><td><p class="kno">'+knowledge1+'/'+knowledge+'</p></td><td><p class="kno1">'+knowledge2+'/'+knowledgep+'</p></td></tr>');
            $(".tabletos").append('<tr><td>Comprehension:</td><td><p class="com">'+comprehension1+'/'+comprehension+'</p></td><td><p class="com1">'+comprehension2+'/'+comprehensionp+'</p></td></tr>');
            $(".tabletos").append('<tr><td>Application:</td><td><p class="app">'+application1+'/'+application+'</p></td><td><p class="app1">'+application2+'/'+applicationp+'</p></td></tr>');
            $(".tabletos").append('<tr><td>Analysis:</td><td><p class="ana">'+analysis1+'/'+analysis+'</p></td><td><p class="ana1">'+analysis2+'/'+analysisp+'</p></td></tr>');
            $(".tabletos").append('<tr><td>Evaluation:</td><td><p class="eva">'+evaluation1+'/'+evaluation+'</p></td><td><p class="eva1">'+evaluation2+'/'+evaluationp+'</p></td></tr>');
            $(".tabletos").append('<tr><td>Synthesis:</td><td><p class="syn">'+synthesis1+'/'+synthesis+'</p></td><td><p class="syn1">'+synthesis2+'/'+synthesisp+'</p></td></tr>');
            $(".tabletos").append('<tr><td>Total :</td><td><p class="titem">'+titemstq+'/'+ti+'</p></td><td><p class="tpoint">'+tpointstq+'/'+tp+'</p></td></tr>');
          if (knowledge2>knowledgep) {
            $(".kno1").css('color', 'red');
          }else if (knowledge2==knowledgep){
            $(".kno1").css('color', 'green');
          };
          if (comprehension2>comprehensionp) {
            $(".com1").css('color', 'red');
          }else if (comprehension2==comprehensionp){
            $(".com1").css('color', 'green');
          };
          if (application2>applicationp) {
            $(".app1").css('color', 'red');
          }else if (application2==applicationp){
            $(".app1").css('color', 'green');
          };
          if (analysis2>analysisp) {
            $(".ana1").css('color', 'red');
          }else if (analysis2==analysisp){
            $(".ana1").css('color', 'green');
          };
          if (evaluation2>evaluationp) {
            $(".eva1").css('color', 'red');
          }else if (evaluation2==evaluationp){
            $(".eva1").css('color', 'green');
          };
          if (synthesis2>synthesisp) {
            $(".syn1").css('color', 'red');
          }else if (synthesis2==synthesisp){
            $(".syn1").css('color', 'green');
          };
          if (tpointstq>tp) {
            $(".tpoint").css('color', 'red');
          }else if (tpointstq==tp){
            $(".tpoint").css('color', 'green');
          };

          if (knowledge1>knowledge) {
            $(".kno").css('color', 'red');
          }else if (knowledge1==knowledge){
            $(".kno").css('color', 'green');
          };
          if (comprehension1>comprehension) {
            $(".com").css('color', 'red');
          }else if (comprehension1==comprehension){
            $(".com").css('color', 'green');
          };
          if (application1>application) {
            $(".app").css('color', 'red');
          }else if (application1==application){
            $(".app").css('color', 'green');
          };
          if (analysis1>analysis) {
            $(".ana").css('color', 'red');
          }else if (analysis1==analysis){
            $(".ana").css('color', 'green');
          };
          if (evaluation1>evaluation) {
            $(".eva").css('color', 'red');
          }else if (evaluation1==evaluation){
            $(".eva").css('color', 'green');
          };
          if (synthesis1>synthesis) {
            $(".syn").css('color', 'red');
          }else if (synthesis1==synthesis){
            $(".syn").css('color', 'green');
          };
          if (titemstq>ti) {
            $(".titem").css('color', 'red');
          }else if (titemstq==ti){
            $(".titem").css('color', 'green');
          };
        });
    }
  });
  $.ajax({
    type:"POST",
    url:"shstqcrud.php?p=loadtnum",
    data:{tq_id: tq_id, period: period, syllabus_id:syllabus_id},
    success: function(data){
      var nos;
      var maindirection;
      var tnum;
      var topic;
      var topicid;
      var last;
      var main_attach;
      var status_desc;
      var obj = $.parseJSON(data);
      $.each(obj, function(key , value) {
        tnum=this['data'];
        topicid=this['topicid'];
        topic=this['topic'];
        maindirection=this['maindirection'];
        main_attach=this['main_attach'];
        upload_tq=this['upload_tq'];
        upload_tos=this['upload_tos'];
        status_desc=this['status_desc'];
        nos=this['nos'];
        if (!main_attach) {
          $("#delattmain").hide();
          $("#attmain").show();
        }else{
          $("#delattmain").show();
          $("#attmain").hide();
        };
        
        if(nos==null){
          nos=0;
        }
        $.each(value.topic , function(k , v ){ 
            $("#topic").append('<option value="'+topicid[k]+'">'+v+'</option>');
        });
      });
      for (var i = 1; i <= tnum + 1; i++) {
           $(".tnum").append('<option value="'+i+'">'+i+'</option>');
           last=i;
      };
      $('#maindirection').text(maindirection);
      $('#uploadtqp').text(upload_tq);
      $('#uploadtosp').text(upload_tos);
      $('.nos').text("Number of students: "+nos);
      status_d = status_desc;
      if (status_desc!=="pending") {
       $('.subtoph2').hide();
      }else{
        if (upload_tq!=null && upload_tos!=null && upload_tq.length>0 && upload_tos.length>0) {
          $('.subtoph2').show();
        }else{
          $('.subtoph2').hide();
        }
      }
      check()
    }
  });
  
});
$(document).ready(function(){


  
    $("#btn1").click(function(){
        tn++;
        var topic = $('#pgocourse').val();
        $("#topicfield").append('<div class="row" id="topic'+tn+'"><div class="col-xs-6"><b>'+topic+'</b></div><div class="col-xs-2"><input type="text" class="form-control" id="" placeholder="No. of Hours"></div><div class="col-xs-2">0</div><div class="col-xs-2"><button id="'+tn+'" class="btn btn-danger btn-xs glyphicon glyphicon-trash delt"></button></div></div><br/></div>');
    });
}); 
$(document).on('click', '.delt', function(){
  var button_id = $(this).attr("id");  
        $('#topic'+button_id+'').remove();
        tn--;
});
</script>
<script type="text/javascript">
function check(){
var tqp = $('#uploadtqp').text();
var tosp = $('#uploadtosp').text();
  if(tqp.length==0 && tosp.length==0){
    $('#div1').show();
    $('#div2').hide();
    $('#div3').show();
    $('#div4').show();
    $('.crtq').show();
  }else{
    $('#div1').hide();
    $('#div2').show();
    $('#div3').hide();
    $('#div4').hide();
    $('.crtq').hide();
  }


  if (status_d!=="pending") {
      $('#upload_tq').hide();
      $('#deluploadtq').hide();
      $('#upload').hide();
      $('#downloadtq').show();
      $('#upload_tos').hide();
      $('#deluploadtos').hide();
      $('#uploadtos').hide();
      $('#downloadtos').show();
  }else{
    if(tqp.length==0){
       $('#upload_tq').show();
       $('#deluploadtq').hide();
       $('#upload').show();
       $('#downloadtq').hide();
           
    }else{
      $('#upload_tq').hide();
      $('#deluploadtq').show();
      $('#upload').hide();
      $('#downloadtq').show();
            
    }
    if(tosp.length==0){
       $('#upload_tos').show();
       $('#deluploadtos').hide();
       $('#uploadtos').show();
       $('#downloadtos').hide();
    }else{
      $('#upload_tos').hide();
      $('#deluploadtos').show();
      $('#uploadtos').hide();
      $('#downloadtos').show();
      
    }
  }
}
function deluploadtos(){
  var tq_id=<?php echo $tq_id;?>;
  $('#uploadtosp').text("");
  $.ajax({
    type: "POST",
    url:"shstqcrud.php?p=deletetos",
    data:"tq_id="+tq_id,
    success: function(data){
      var msg;
      var obj = $.parseJSON(data);
      $.each(obj, function(key , value) {
        msg=this['msg'];
      });
      alert2(msg)
      $('#upload_tos').show();
      $('#deluploadtos').hide();
      $('#uploadtos').show();
      $('#downloadtos').hide();
      $('#uploadtosp').empty();
      $('.subtoph2').hide();
    }
  });
  check()
}
function deluploadtq(){
  var tq_id=<?php echo $tq_id;?>;
  $('#uploadtqp').text("");
  $.ajax({
    type: "POST",
    url:"shstqcrud.php?p=deletetq",
    data:"tq_id="+tq_id,
    success: function(data){
      var msg;
      var obj = $.parseJSON(data);
      $.each(obj, function(key , value) {
        msg=this['msg'];
      });
      alert2(msg)
      $('#upload_tq').show();
      $('#deluploadtq').hide();
      $('#upload').show();
      $('#downloadtq').hide();
      $('#uploadtqp').empty();
      $('.subtoph2').hide();
    }
  });
  check()
}
function delatt(){
  var tq_id=<?php echo $tq_id;?>;
  $.ajax({
    type: "POST",
    url:"shstqcrud.php?p=delattmain",
    data:"tq_id="+tq_id,
    success: function(data){
      var msg;
      var obj = $.parseJSON(data);
      $.each(obj, function(key , value) {
        msg=this['msg'];
      });
      alert2(msg)
      $("#delattmain").hide();
      $("#attmain").show();
    }
  });
}
function delattdirect(){
  var tq_id=<?php echo $tq_id;?>;
  var tnum = $('#tnum').val();
  $.ajax({
    type: "POST",
    url:"shstqcrud.php?p=delattdirect",
    data:{tq_id: tq_id,tnum: tnum},
    success: function(data){
      var msg;
      var obj = $.parseJSON(data);
      $.each(obj, function(key , value) {
        msg=this['msg'];
      });
      alert2(msg)
      $("#delattdirect").hide();
      $("#attdirect").show();
    }
  });
}
function delattquest(){
    var tq_id=<?php echo $tq_id;?>;
    var tnum = $('#tnum').val();
    var qnum = $('#qnum').val();
    $.ajax({
      type: "POST",
      url:"shstqcrud.php?p=delattquest",
      data:{tq_id: tq_id,tnum: tnum, qnum: qnum},
      success: function(data){
        var msg;
        var obj = $.parseJSON(data);
        $.each(obj, function(key , value) {
          msg=this['msg'];
        });
        alert2(msg)
        $("#delattquest").hide();
        $("#attquest").show();
      }
    });
}
function alert2(val){
  var msg= val;
  if (msg=="Test Questionnaire Sent!") {
    // $('#txt1').empty();
    // $('#txt1').text(msg);
    // $('#alertsuccess1').show('fade');
    // $('.subph').attr('disabled',true);
    window.location.href='shstq_index.php';
  }else if (msg=="Please set the number of student.") {
    $('#txt5').empty();
    $('#txt5').text(msg);
    $('#alertsuccess5').show('fade').delay(2000).fadeOut();
  }else if (msg=="Test Questionnaire must have 100 points.") {
    $('#txt6').empty();
    $('#txt6').text(msg);
    $('#alertsuccess6').show('fade').delay(2000).fadeOut();
  }else if(msg=="Attachment deleted!") {
    $('#txt7').empty();
    $('#txt7').text(msg);
    $('#alertsuccess7').show('fade').delay(2000).fadeOut();
  };
  
}
function alert1(val){
  var msg= val;
  if (msg=="Test Questionnaire Sent!") {
    // $('#txt1').empty();
    // $('#txt1').text(msg);
    // $('#alertsuccess1').show('fade');
    // $('.subph').attr('disabled',true);
    window.location.href='shstq_index.php';
  }else if (msg=="Please set the number of student.") {
    $('#txt2').empty();
    $('#txt2').text(msg);
    $('#alertsuccess2').show('fade').delay(2000).fadeOut();
  }else if (msg=="Test Questionnaire must have 100 points." || msg=="error") {
    $('#txt3').empty();
    $('#txt3').text(msg);
    $('#alertsuccess3').show('fade').delay(2000).fadeOut();
  };
  
}
function close1(){
  $('#txt1').empty();
  $('#alertsuccess1').hide('fade');
  $('.subph').attr('disabled',false);
   window.location.href='tq_index.php';
}
function delnum(){
  var tq_id=<?php echo $tq_id;?>;
  var tnum = $('#tnum').val();
  var qnum = $('#qnum').val();
  $.ajax({
    type: "POST",
    url:"shstqcrud.php?p=delnum",
    data:{tq_id: tq_id,tnum: tnum, qnum: qnum},
    success: function(data){
      var msg;
      var obj = $.parseJSON(data);
      $.each(obj, function(key , value) {
        msg=this['msg'];
      });
      if (msg=="success") {
        loadnum()
      }else{
        alert1(msg);
      };
    }
  });
  
}
function loadnum(){
  $("#deletenum").hide("fadeOut");
  $('#direction').text("");
  $('#qtype').val("");
  $('.qnum').children().remove();
  $(".qnum").append('<option></option>');
  var tnum = $('.tnum').val();
  var tq_id=<?php echo $tq_id;?>;
  $.ajax({
    type:"POST",
    url:"shstqcrud.php?p=loadqnum",
    data:{tq_id: tq_id, tnum: tnum},
    success: function(data){
      var qnum;
      var tdesc;
      var qtype;
      var attachment;
      var status_desc;
      var obj = $.parseJSON(data);
      $.each(obj, function(key , value) {
        qnum=this['data'];
        tdesc=this['tdesc'];
        qtype=this['qtype'];
        attachment=this['attachment'];
        status_desc=this['status_desc'];
      });
      if (!attachment) {
        $("#delattdirect").hide();
        $("#attdirect").show();
      }else{
        $("#delattdirect").show();
        $("#attdirect").hide();
      };
      if (status_desc!=='pending') {
          $("#delattdirect").hide("fadeOut");
          $("#attdirect").show();
      };
      for (var i = 1; i <= qnum + 1; i++) {
           $(".qnum").append('<option value="'+i+'">'+i+'</option>');
      };
      $('#direction').text(tdesc);
      $('#qtype').val(qtype);
      dis();
      loadq();
    }
  });
}
function loadq(){
  $('#question').text("");
  $('#cognitive').val("");
  $('#points').val("");
  $('#topic').val("");
  $('#enuanswer0').val("");
  $('#answer0').val("");
  var numItems = $('.answerd').length;
  numItems++;
  if (numItems>0) {
    for (var i = numItems; i > 0; i--) {
      $('#enuansnum'+i).remove();
    };
  };
  var numItems2 = $('.choiced').length;
  numItems2++;
  if (numItems2>0) {
    for (var i = numItems2; i > 0; i--) {
      $('#multians'+i).remove();
    };
  };
  enuans=1; 
  tn=0; 
  choices=1; 
  ch=0; 
  var tnum = $('.tnum').val();
  var qnum = $('.qnum').val();
  var tq_id=<?php echo $tq_id;?>;
  $.ajax({
    type:"POST",
    url:"shstqcrud.php?p=loadq",
    data:{tq_id: tq_id, tnum: tnum, qnum: qnum},
    success: function(data){
      var question_desc;
      var topics_id;
      var cognitive_level_id;
      var points;
      var answer_desc;
      var answer_choice_desc;
      var status_desc;
      var attachment;
      var obj = $.parseJSON(data);
      $.each(obj, function(key , value) {
        question_desc=this['question_desc'];
        topics_id=this['topics_id'];
        points=this['points'];
        answer_desc=this['answer_desc'];
        answer_choice_desc=this['answer_choice_desc'];
        cognitive_level_id=this['cognitive_level_id'];
        status_desc=this['status_desc'];
        attachment=this['attachment'];
        $.each(value.answer_desc , function(k , v ){ 
          
          if (k>0) {
            enuans++; 
            tn++; 
            $('#answer1_field').append('<tr id="enuansnum'+enuans+'" class="answerd"><td><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Answer '+enuans+'.</span><input type="text" name="enuans['+tn+']" class="form-control" placeholder="Enter Answer" id="" value="'+v+'" aria-describedby="basic-addon1"><span class="input-group-addon enumcount" id="basic-addon1"><a href="#"><i id="'+enuans+'" class="glyphicon glyphicon-minus enudelans"><span class="enudelanstext">Remove</span></i></a></span></div></div></div></td></tr>'); 
          }else{
            $('#enuanswer0').val(answer_desc[k]);
          };
        });
        $.each(value.answer_choice_desc , function(k , v ){ 
          
          if (k>0) {
            choices++; 
            ch++; 
            $('#multiplechoice1_field').append('<tr id="multians'+choices+'"  class="choiced"><td><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Choice '+choices+'.</span><input type="text" name="multians['+ch+']" class="form-control" placeholder="Enter Choice" id="" value="'+v+'" aria-describedby="basic-addon1"><span class="input-group-addon enumcount" id="basic-addon1"><a href="#"><i id="'+choices+'" class="glyphicon glyphicon-minus multidelnum"><span class="multidelnumtext">Remove</span></i></a></span></div></div></div></td></tr>'); 
          }else{
            $('#answer0').val(answer_choice_desc[k]);
          };
        });
      });
      if (!attachment) {
        $("#delattquest").hide();
        $("#attquest").show();
      }else{
        $("#delattquest").show();
        $("#attquest").hide();
      };
      if (question_desc.length>0) {
        if (status_desc!=='pending') {
          $("#deletenum").hide("fadeOut");
          $("#delattquest").hide("fadeOut");
          $("#attquest").show();
        }else{
          $("#deletenum").show("fadeOut");
        };
      }else{
        $("#deletenum").hide("fadeOut");
      };
      $('#question').text(question_desc);
      $('#cognitive').val(cognitive_level_id);
      $('#points').val(points);
      $('#topic').val(topics_id);
    }
  });
}

function submitph(val,pos){
  var ph_id = val;
  var tq_id=<?php echo $tq_id;?>;
  var depart="<?php echo $depart;?>";
  var period=<?php echo $period;?>;
  var syllabus_id=<?php echo $syllabus_id;?>;
  var position=pos;
  $.ajax({
    type:"POST",
    url:"shstqcrud.php?p=submitph",
    data:{tq_id: tq_id, ph_id: ph_id, position: position, period: period, syllabus_id: syllabus_id, depart: depart},
    success: function(data){
      var msg;
      var obj = $.parseJSON(data);
      $.each(obj, function(key , value) {
        msg=this['msg'];
      });
        alert1(msg)
        //alert2(msg)
    }
  });
}

function specialq(val){
  var a = val;
  var b = $('#question').val();
  var c = b+a;
  $('#question').val(c);
}
function speciald(val){
  var a = val;
  var b = $('#direction').val();
  var c = b+a;
  $('#direction').val(c);
}
function specialmd(val){
  var a = val;
  var b = $('#maindirection').val();
  var c = b+a;
  $('#maindirection').val(c);
}

function PrintPreview() {
        var toPrint = document.getElementById('printableArea');
        var popupWin = window.open('', '_blank', 'width=1000,height=600,location=no,left=100px');
        popupWin.document.open();
        popupWin.document.write('<html><title>::Print Preview::</title></head><body">');
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');
        popupWin.document.close();
    }
    function PrintPreview1() {
        var toPrint = document.getElementById('printableArea3');
        var popupWin = window.open('', '_blank', 'width=800,height=650,location=no,left=100px');
        popupWin.document.open();
        popupWin.document.write('<html><title>::Print Preview::</title></head><body">');
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');
        popupWin.document.close();
    }
  </script>
  <script type="text/javascript">
function PrintPreview2() {
        var toPrint = document.getElementById('printableArea2');
        var popupWin = window.open('', '_blank', 'width=800,height=650,location=no,left=200px');
        popupWin.document.open();
        popupWin.document.write('<html><title>::Print Preview::</title></head><body">');
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');
        popupWin.document.close();
    }

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

  </script>
</html>