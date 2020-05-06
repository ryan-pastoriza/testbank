<?php
include('header.php'); 
include 'class.php';
$class = new testbank();
if ( !empty ( $_GET ) ) {
  $ss_id=$_GET['ss_id1'];
  $subj_id=$_GET['subj_id'];
  $emp_id=$_GET['emp_id'];
  $class->loaddb();
  $sql = "SELECT sched_subj.ss_id, `subject`.subj_id, `subject`.subj_code, `subject`.subj_name, `subject`.subj_desc, syllabus.syllabus_id, syllabus.course_info_id, `subject`.lec_unit, `subject`.lab_unit,`subject`.pre_requisite, sched_subj.department FROM sched_subj INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id WHERE sched_subj.employment_id = $emp_id AND `subject`.subj_id = $subj_id AND sched_subj.ss_id = $ss_id  ";
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
        $syllabus_id=$row['syllabus_id'];
        $course_info_id=$row['course_info_id'];
        $lec_unit=$row['lec_unit'];
        $lab_unit=$row['lab_unit'];
        $unit=$lec_unit+$lab_unit;
        $pre_req=$row['pre_requisite'];
        $subdept=$row['department'];
      }
        
        // $sqla1 = "SELECT * FROM policies WHERE syllabus_id = $syllabus_id ";
        // $resulta1 = mysql_query($sqla1);
        // if(mysql_num_rows($resulta1)==0){
        //   $querya1 = "INSERT INTO `policies` (`syllabus_id`) VALUES ('".$syllabus_id."')";
        //   $resultwa1=mysql_query($querya1) or die("Query Failed policies: ".mysql_error());     
        // }else{
        //   while($row=mysql_fetch_array($resulta1)){
        //     $policy_id=$row['policy_id'];
        //     $lt=$row['late_tardiness'];
        //     $absence=$row['absence'];
        //     $mq=$row['miss_quiz'];
        //     $permits=$row['permits'];
        //     $cheating=$row['cheating'];
        //     $cm=$row['class_misbehavior'];
        //   }
        // }


        $sqla3 = "SELECT * FROM reference WHERE syllabus_id = $syllabus_id ";
        $resulta3 = mysql_query($sqla3);
        if(mysql_num_rows($resulta3)==0){
          $querya3 = "INSERT INTO `reference` (`syllabus_id`) VALUES ('".$syllabus_id."')";
          $resultwa3=mysql_query($querya3) or die("Query Failed reference: ".mysql_error());     
        }else{
          while($row=mysql_fetch_array($resulta3)){
            $ref=$row['ref_desc'];
          }
        }
             
    }        
    $class->sqlclose();   
}
?>
<style type="text/css">
  #alertsuccess1{
    position: fixed;
    top: 5%;
    margin-left: 800px;
    right: 20px;
    float: left;
    z-index: 9999;
    opacity: 0.8;
  }
  #alertsuccess2{
    position: fixed;
    top: 5%;
    margin-left: 800px;
    right: 20px;
    float: left;
    z-index: 9999;
    opacity: 0.8;
  }#alertsuccess3{
    position: fixed;
    top: 5%;
    margin-left: 800px;
    right: 20px;
    float: left;
    z-index: 9999;
    opacity: 0.8;
  }
</style>
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
      <!-- sidebar menu: : style can be found in sidebar.less -->
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
        <section class="col-xs-12">
          <div class="box box-primary">
            <div id="alertsuccess1" class="alert alert-success collapse">
              <strong><h4 id="txt1"></h4></strong> 
            </div>
            <div id="alertsuccess2" class="alert alert-warning collapse">
              <strong><h4 id="txt2"></h4></strong> 
            </div>
            <div id="alertsuccess3" class="alert alert-danger collapse">
              <strong><h4 id="txt3"></h4></strong> 
            </div>
            <div class="box-header with-border">
              <?php echo " <h4><b>Syllabus for ".$subj_name1."</b><h4>"; ?>
            </div>
            <div class="box-body">
              <div class="nav-tabs-custom">
                <ul class="nav nav-pills">
                  <li class="nav-item active"><a href="#a" class="nav-link" data-toggle="tab">CLO</a></li>
                  <li class="nav-item"><a href="#b" class="nav-link" data-toggle="tab">Contact Hours</a></li>
                  <li class="nav-item"><a href="#c" class="nav-link" data-toggle="tab">Requirements and Policies</a></li>
                  <li class="nav-item"><a href="#e" class="nav-link" data-toggle="tab">Revision Status Tracking</a></li>
                  <li class="nav-item"><a href="#d" class="nav-link rem" onclick="checkrem2()" data-toggle="tab">Remarks</a></li>
                </ul>
                <div class="tab-content " id="testtable">
                  
                  <div class=" active tab-pane box-primary" id="a" style="height:500px;">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="box-body" style="height:450px;">
                          <div class="row">
                            <div class="col-lg-12" >
                              <table class="table table-hover table-striped table-bordered" id="clot">
                                <thead>
                                  <tr>
                                    <th width="20">ID</th>
                                    <th width="20">CLO Code</th>
                                    <th>Course learning Outcomes</th>
                                    <th width="20">Date</th>
                                    <th width="20">Revise</th>
                                    <th width="20">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $class->getclo($syllabus_id,$subdept); ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="box-footer clearfix">
                      <button class="pull-right btn btn-primary newclo" data-toggle="modal" data-target="#addnewclo">New CLO</button>
                    </div>
                    <div class="modal fade bd-example-modal-lg" id="addnewclo" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><strong>New CLO</strong></h4>
                          </div>
                          <form>
                          <div class="modal-body">

                            <form>
                            <?php
                              if ($subdept=="ITE" OR $subdept=="CS") {
                              echo'<div class="row">
                                <div class="col-xs-12">
                                  <div class="form-group">
                                    <label for="name">CLO code</label><br/>
                                    <input type="text" class="form-control" id="cloc"  placeholder="CLO code">
                                  </div>
                                </div>
                              </div>';
                              }
                            ?>
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="form-group">
                                    <label for="pgo">Course learning Outcomes</label>
                                    <textarea rows="2" style=" resize: vertical;" class="form-control" id="clod" placeholder="Course learning Outcomes"  name="pgon"></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-xs-12">
                                  <label for="course">PGO</label>
                                  <?php $class->getclodata($subdept); ?>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" onclick="saveclo()" data-dismiss="modal" class="btn btn-primary">Save</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane box-primary" id="b" style="height:600px;">
                    <div class="box-body" style="height:450px;">
                      <div class="row">
                        <div class="col-lg-12" >
                          <table class="table table-hover table-striped table-bordered" id="weektb">
                            <thead>
                              <tr>
                                <th>Week</th>
                                <th>Period</th>
                                <th>Topics</th>
                                <th>Instructional Delivery/Strategies/Activities</th>
                                <th>Assessment</th>
                                <th>Evidence of Performance</th>
                                <th>Action</th>

                              </tr>
                            </thead>
                            <tbody id="tableweek">
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="box-footer clearfix">
                      <div class="row">
                        <div class="col-xs-9">
                          <button type="button" class="pull-right btn btn-primary" id="printPreview" onclick="PrintPreview(printableArea)" style="width:85px;">
                          <i class="fa fa-print"></i> Preview </button>
                          
                        </div>
                        <div class="col-xs-1">
                          <button type="button" class="pull-right btn btn-primary" id="print" onclick="printDiv('printableArea')" style="width:85px;">
                          <i class="fa fa-print"></i> Print </button>
                        </div>
                        <div class="col-xs-1">
                         <button type="button" name="submittodean" onclick="submittodean1()" class="pull-right btn btn-success submitsyll" id="submittodean" style="width:85px;">
                          <i class="glyphicon glyphicon glyphicon-ok"></i> Submit </button>
                        </div>
                        <div class="col-xs-1">
                         <button class="pull-right btn btn-primary newclo" data-toggle="modal" data-target="#addtopic">New Topic</button>
                        </div>
                      </div>
                    </div>
                    <div class="modal fade bd-example-modal-lg" id="addtopic" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><strong>New Topic</strong></h4>
                          </div>
                          <form>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-xs-2">
                                <label>Week No</label>
                                <select class="form-control input-xs select" name="week" id="week" required>
                                  <option value=""></option>
                                  <?php for ($i=1; $i <= 20; $i++) { 
                                    echo "<option value='".$i."''>".$i."</option>";
                                  }?>                       
                                </select>
                              </div>
                              <div class="col-xs-2">
                                <label>Period</label>
                                <select class="form-control input-xs select" onchange="createexam()" name="period" id="period" required>
                                  <option value=""></option>
                                  <option value="1" >Prelim Period</option>
                                  <option value="5" >Prelim Exam</option>
                                  <option value="2" >Midterm Period</option>
                                  <option value="6" >Midterm Exam</option>
                                  <option value="3" >Pre-Final Period</option>
                                  <option value="7" >Pre-Final Exam</option>
                                  <option value="4" >Final Period</option>
                                  <option value="8" >Final Exam</option>
                                </select>
                              </div>
                              <!-- <div class="col-xs-1">
                                <button type="button" class=" btn btn-primary" onclick="createexam()" id="createwk" style="margin-top:27px;">Create Examination Week</button>
                              </div> -->
                            </div>
                            <div class="row">
                              <div class="col-xs-12">
                                <label>Topics</label>
                                <input type="text" class="form-control" placeholder="Enter Topics" name="maintopics" id="maintopics" required>
                              </div>
                              <div class="col-xs-12">
                              <label>Sub Topics</label>
                                <table class="table table-bordered" id="dynamic_subtopic1">
                                  <tr>
                                    <td>
                                      <div class="input-group">
                                        <input type="text" name="subtopics[]" class="form-control subtopics1" placeholder="Enter Sub Topic" id="subtopics0" aria-describedby="basic-addon1">
                                        <span class="input-group-addon" id="basic-addon1">
                                          <a>
                                            <i id="subtopicsadd" class="glyphicon glyphicon-plus subtopics">
                                              <span class="subtopicstext">Add</span>
                                            </i>
                                          </a>
                                        </span>
                                      </div>
                                    </td>
                                  </tr>
                                </table>
                              </div>
                              
                              <div class="col-xs-12">
                                <label>Instructional Delivery/Strategies/Activities</label>
                                <textarea class="form-control" rows="2" name="idsa" id="idsa" placeholder="Enter Instructional Delivery/Strategies/Activities" required></textarea>
                              </div>
                              <div class="col-xs-12">
                                <label>Assessment</label>
                                <textarea class="form-control" rows="2" name="ass" id="ass" placeholder="Enter Assessment" required></textarea>
                              </div>
                              <div class="col-xs-12">
                                <label>Evidence of Performance</label>
                                <textarea class="form-control" rows="2" name="ep" id="ep" placeholder="Enter Evidence of Performance" required></textarea>
                              </div>
                              <!-- <div class="col-xs-12">
                                <label>Outcome Based Assessment</label>
                                <textarea class="form-control" rows="2" name="oba" id="oba" placeholder="Enter OBA" required></textarea>
                              </div> -->
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="button" onclick="savetopic()" data-dismiss="modal" class="btn btn-primary">Save</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- edit modal -->
                    <form role="form-xs" method="post">
                      <div class="modal fade bd-example-modal-lg" id="openmodal" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <input type="hidden" id="topicid2" name="topicid2">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel"><strong>Edit Topic</strong></h4>
                            </div>
                            <input type="hidden" name="weekid" id="weekid">
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-xs-2">
                                  <label>Week No</label>
                                  <select class="form-control input-xs select" name="week2" id="week2" required>
                                    <option value=""></option>
                                    <?php for ($i=1; $i <= 18; $i++) { 
                                      echo "<option value='".$i."''>".$i."</option>";
                                    }?>                       
                                  </select>
                                </div>
                                <div class="col-xs-2">
                                  <label>Period</label>
                                  <select class="form-control input-xs select" onchange="createexam2()" name="period2" id="period2" required>
                                    <option value=""></option>
                                    <option value="1" >Prelim Period</option>
                                    <option value="5" >Prelim Exam</option>
                                    <option value="2" >Midterm Period</option>
                                    <option value="6" >Midterm Exam</option>
                                    <option value="3" >Pre-Final Period</option>
                                    <option value="7" >Pre-Final Exam</option>
                                    <option value="4" >Final Period</option>
                                    <option value="8" >Final Exam</option>
                                  </select>
                                </div>
                                <!-- <div class="col-xs-1">
                                  <button type="button" class=" btn btn-primary" onclick="createexam()" id="createwk" style="margin-top:27px;">Create Examination Week</button>
                                </div> -->
                              </div>
                              <div class="row">
                                <div class="col-xs-12">
                                  <label>Topics</label>
                                  <input type="text" class="form-control" placeholder="Enter Topics" name="maintopics2" id="maintopics2" required>
                                </div>
                                <div class="col-xs-12">
                                <label>Sub Topics</label>
                                  <table class="table table-bordered" id="dynamic_subtopic2">
                                    <tr>
                                      <td>
                                        <div class="input-group">
                                          <input type="text" name="subtopics2[]" class="form-control subtopics2" placeholder="Enter Sub Topic" id="subtopics2" aria-describedby="basic-addon1">
                                          <span class="input-group-addon" id="basic-addon1">
                                            <a>
                                              <i id="subtopicsadd2" class="glyphicon glyphicon-plus subtopics">
                                                <span class="subtopicstext">Add</span>
                                              </i>
                                            </a>
                                          </span>
                                        </div>
                                      </td>
                                    </tr>
                                  </table>
                                </div>
                                
                                <div class="col-xs-12">
                                  <label>Instructional Delivery/Strategies/Activities</label>
                                  <textarea class="form-control" rows="2" name="idsa2" id="idsa2" placeholder="Enter Instructional Delivery/Strategies/Activities" required></textarea>
                                </div>
                                <div class="col-xs-12">
                                  <label>Assessment</label>
                                  <textarea class="form-control" rows="2" name="ass2" id="ass2" placeholder="Enter Assessment" required></textarea>
                                </div>
                                <div class="col-xs-12">
                                  <label>Evidence of Performance</label>
                                  <textarea class="form-control" rows="2" name="ep2" id="ep2" placeholder="Enter Evidence of Performance" required></textarea>
                                </div>
                              </div>
                              
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" onclick="update()" data-dismiss="modal" class="btn btn-primary">Save</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>


                  <div class=" tab-pane box-primary" id="c" >
                      <div class="row">
                        <div class="col-xs-12">
                          <label>Late / Tardiness Policy</label>
                          <textarea rows="1" class="form-control" placeholder="Enter Late / Tardiness Policy"  id="lt"></textarea>
                        </div>
                        <div class="col-xs-12">
                          <label>Absence</label>
                          <textarea rows="1" class="form-control" placeholder="Enter Absence Policy"  id="absence"></textarea>
                        </div>
                        <div class="col-xs-12">
                          <label>Missed Quizzes</label>
                          <textarea rows="1" class="form-control" placeholder="Enter Missed Quizzes Policy"  id="mq"></textarea>
                        </div>
                        <div class="col-xs-12">
                          <label>ME Permits Policy</label>
                          <textarea rows="1" class="form-control" placeholder="Enter ME Permits Policy"  id="permits"></textarea>
                        </div>
                        <div class="col-xs-12">
                          <label>Cheating Policy</label>
                          <textarea rows="1" class="form-control" placeholder="Enter Cheating Policy"  id="cheating"></textarea>
                        </div>
                        <div class="col-xs-12">
                          <label>Classrooms Misbehavior Policy</label>
                          <textarea rows="1" class="form-control" placeholder="Enter Classrooms Misbehavior Policy" id="cm"></textarea>
                        </div>
                        <div class="col-xs-12">
                          <label>References</label>
                          <textarea rows="1" class="form-control" placeholder="Enter References" id="ref"></textarea>
                        </div>
                        <div class="row-xs-12">
                          
                        </div>
                          <div class="col-xs-6">
                            <label>Curriculum</label>
                            <input type="text" class="form-control" placeholder="Enter Curriculum" id="curriculum">
                          </div>
                          <div class="col-xs-6">
                            <label>Revision Status</label>
                            <input type="text" class="form-control" placeholder="Enter Revision Status" id="revision">
                          </div>
                         <!--  <div class="col-xs-3">
                            <label>Version</label>
                            <input type="text" class="form-control" placeholder="Enter Version" id="version">
                          </div>
                          <div class="col-xs-3">
                            <label>QMS Document Code</label>
                            <input type="text" class="form-control" placeholder="Enter QMS Document Code" id="qms">
                          </div> -->
                        
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-xs-10">
                         <button type="button" onclick="savecrp1()" class="pull-right btn btn-default savecpr" name="savecrp">
                          <i class="glyphicon glyphicon-floppy-save"></i> Save CRP </button>
                        </div>                        
                        <div class="col-xs-2">
                         <button class="pull-right btn btn-primary" data-toggle="modal" data-target="#addcoursereq">New Requirement</button>
                        </div>
                        <div class="modal fade bd-example-modal-lg" id="addcoursereq" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><strong>New Course Requirement</strong></h4>
                              </div>
                              <form>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-xs-12">
                                    <label>Course Requirement Output</label>
                                    <input type="text" class="form-control" placeholder="Enter Course Requirement Output" id="croutput">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-xs-12">
                                    <label>Course Requirement Description</label>
                                    <input type="text" class="form-control" placeholder="Enter Course Requirement Description" id="crdesc">
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="button" onclick="savecr()" data-dismiss="modal" class="btn btn-primary">Save</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br/>
                      <div class="row">
                        <label><h4><b>Course Requirements</b></h4></label>
                        <table class="table table-hover table-striped table-bordered" id="crequirement">
                          <thead>
                            <tr>
                              <th width="100">Output</th>
                              <th >Description</th>
                              <th width="100">Action</th>
                            </tr>
                          </thead>
                          <tbody id="creq">
                          </tbody>
                        </table>
                        <div class="modal fade bd-example-modal-lg" id="editcoursereq" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel"><strong>New Course Requirement</strong></h4>
                            </div>
                            <form>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-xs-12">
                                  <input type="hidden" id="cr_id2" name="cr_id2">
                                  <label>Course Requirement Output</label>
                                  <input type="text" class="form-control"  id="croutput2">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-xs-12">
                                  <label>Course Requirement Description</label>
                                  <input type="text" class="form-control"  id="crdesc2">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" onclick="updatereq()" data-dismiss="modal" class="btn btn-primary">Update</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
                  </div>
                  <div class=" tab-pane box-primary" id="e" >
                    <div class="row">
                      <div class="col-xs-12">
                        <label>Revision No.</label>
                        <input type="text" class="form-control" placeholder="Revision No." id="rev_no">
                      </div>
                      <div class="col-xs-12">
                       <label>Issued Date</label>
                        <input type="date" class="form-control" placeholder="Issued Date" id="issued_date">
                      </div>
                      <div class="col-xs-12">
                        <label>Prepared by</label>
                        <input type="text" class="form-control" placeholder="Prepared by" id="preparedby">
                      </div>
                      <div class="col-xs-12">
                        <label>Reviewed by</label>
                        <input type="text" class="form-control" placeholder="Reviewed by" id="reviewedby">
                      </div>
                      <div class="col-xs-12">
                        <label>References verified by</label>
                        <input type="text" class="form-control" placeholder="References verified by" id="verifiedby">
                      </div>
                      <div class="col-xs-12">
                        <label>Approved</label>
                        <input type="text" class="form-control" placeholder="Approved" id="approvedby">
                      </div>
                      <div class="col-xs-12">
                        <label>Effective Date</label>
                        <input type="date" class="form-control" placeholder="Effective Date" id="effectivity_date">
                      </div>
                    </div>
                      <br>
                    <div class="row">
                      <div class="col-xs-12">
                        <button type="button" onclick="saverevstat()" class="pull-right btn btn-default savecpr" name="savecrp">
                        <i class="glyphicon glyphicon-floppy-save"></i> Save Revision Status </button>
                      </div>  
                    </div>
                    <div class="row">
                    <div class="col-lg-12" >
                        <table class="table table-hover table-striped table-bordered" id="weektb">
                          <thead>
                            <tr>
                              <th>Rev. No.</th>
                              <th>Issued Date</th>
                              <th>Prepared by</th>
                              <th>Reviewed by</th>
                              <th>References verified by</th>
                              <th>Approved</th>
                              <th>Effective Date</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody id="tablerev">
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                      
                  </div>


                  

                  <div class=" tab-pane box-primary" id="d" style="height:500px;">
                    <div class="row">
                      <div class="col-xs-12">
                        <?php $class->syllremarks($syllabus_id); ?>
                      </div>
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
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2016 <a href="#">ACLC</a>.</strong> All rights
    reserved.
  </footer>
  <div id="printableArea1" style="display:none">
    <?php include('printsyllabus.php'); ?>
  </div>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script>
  // $('#clot').dataTable();
  // $('#weektb').dataTable();
  // $('#crequirement').dataTable();
</script>
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="dist/js/jquery-ui.min.js"></script>
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
var prop=0;
var subtopic=1;
var subtopics=1;
$( window ).load(function() {
  loaddoc()
  loadcrp()
  checkrem()
  loadweek()
  loadreq()
  loadrev()

});
$(document).ready(function(){
  var id ="<?php echo $syllabus_id; ?>";
  $.ajax({
    type:"POST",
    url:"syllphp.php?p=checkstatus",
    data: "syllabus_id="+id,
    success: function(data){
      var status_desc;
      var obj = $.parseJSON(data);
      $.each(obj, function(key , value) {
        status_desc=this['status_desc'];
      });
      if (status_desc=='approved') {
        $(".cloedit").hide("fadeOut");
        $(".clodelete").hide("fadeOut");
        $(".newclo").hide("fadeOut");
        $(".savetopic").hide("fadeOut");
        $(".submitsyll").hide("fadeOut");
        $(".savecpr").hide("fadeOut");
      };
    }
  });
});
function loadweek(){
  $(".tbwk").remove();
  $(".odd").remove();
  var id ="<?php echo $syllabus_id; ?>";
  $.ajax({
    type: "POST",
    url: "syllphp.php?p=loadweek",
    data: "syll="+id,
    success: function(data){
      var topics_id;
      var week;
      var exam_period;
      var topic_description;
      var idsa;
      var ass;
      var ep;
      var obj =  $.parseJSON(data);
      $.each(obj, function(key , value){
        topics_id=this['topics_id'];
        week=this['week'];
        exam_period=this['exam_period'];
        topic_description=this['topic_description'];
        idsa=this['idsa'];
        ass=this['ass'];
        ep=this['ep'];
      });
       $.each(topics_id , function(k , v ){ 
          $('#tableweek').append('<tr class="tbwk"><td>'+week[k]+'</td><td>'+exam_period[k]+'</td><td>'+topic_description[k]+'</td><td>'+idsa[k]+'</td><td>'+ass[k]+'</td><td>'+ep[k]+'</td><td><button type="button" onclick="openmodal('+topics_id[k]+')" class="btn btn-warning btn-xs glyphicon glyphicon-edit weekedit" data-toggle="modal" data-target="#weekedit'+topics_id[k]+'"></button>  <button type="button" class="btn btn-danger btn-xs glyphicon glyphicon-trash weekdelete" data-toggle="modal" data-target="#deleteweek'+topics_id[k]+'"></button><div class="modal fade" id="deleteweek'+topics_id[k]+'" tabindex="-1" role="dialog" aria-labelledby="addnewLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel"><strong>Warning</strong></h4></div><div class="modal-body">Are you sure you want to delete this Topic?<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">No</button><button type="button" onclick="deletetopic('+topics_id[k]+')" data-dismiss="modal"  class="btn btn-primary">Yes</button></div></div></div></div></div></td>'); 
        });
    }
  });
}
function loadrev(){
  $(".tbrv").remove();
  var id ="<?php echo $syllabus_id; ?>";
  $.ajax({
    type: "POST",
    url: "syllphp.php?p=loadrev",
    data: "syll="+id,
    success: function(data){
      var id;
      var rev_no;
      var issued_date;
      var preparedby;
      var reviewedby;
      var verifiedby;
      var approvedby;
      var effectivity_date;
      var obj =  $.parseJSON(data);
      $.each(obj, function(key , value){
        issued_date=this['issued_date'];
        preparedby=this['preparedby'];
        reviewedby=this['reviewedby'];
        verifiedby=this['verifiedby'];
        approvedby=this['approvedby'];
        effectivity_date=this['effectivity_date'];
        rev_no=this['rev_no'];
        id=this['id'];
      });
       $.each(id , function(k , v ){ 
          $('#tablerev').append('<tr class="tbrv"><td>'+rev_no[k]+'</td><td>'+issued_date[k]+'</td><td>'+preparedby[k]+'</td><td>'+reviewedby[k]+'</td><td>'+verifiedby[k]+'</td><td>'+approvedby[k]+'</td><td>'+effectivity_date[k]+'</td><td><button type="button" class="btn btn-danger btn-xs glyphicon glyphicon-trash weekdelete" data-toggle="modal" data-target="#deleteweek'+id[k]+'"></button><div class="modal fade" id="deleteweek'+id[k]+'" tabindex="-1" role="dialog" aria-labelledby="addnewLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel"><strong>Warning</strong></h4></div><div class="modal-body">Are you sure you want to delete this revision status?<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">No</button><button type="button" onclick="deleterev('+id[k]+')" data-dismiss="modal"  class="btn btn-primary">Yes</button></div></div></div></div></div></td>'); 
        });
    }
  });
}
function loadreq(){
  $(".tbreq").remove();
  $(".odd").remove();
  var id ="<?php echo $syllabus_id; ?>";
  $.ajax({
    type: "POST",
    url: "syllphp.php?p=loadreq",
    data: "syll="+id,
    success: function(data){
      var cr_id;
      var cr_output;
      var cr_desc;
      var obj =  $.parseJSON(data);
      $.each(obj, function(key , value){
        cr_id=this['cr_id'];
        cr_output=this['cr_output'];
        cr_desc=this['cr_desc'];
      });
       $.each(cr_id , function(k , v ){ 
          $('#creq').append('<tr class="tbreq"><td>'+cr_output[k]+'</td><td>'+cr_desc[k]+'</td><td><button type="button" onclick="openmodal2('+cr_id[k]+')" class="btn btn-warning btn-xs glyphicon glyphicon-edit creqedit" data-toggle="modal"></button>   <button type="button" class="btn btn-danger btn-xs glyphicon glyphicon-trash deletecreq" data-toggle="modal" data-target="#deletecreq'+cr_id[k]+'"></button><div class="modal fade" id="deletecreq'+cr_id[k]+'" tabindex="-1" role="dialog" aria-labelledby="addnewLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel"><strong>Warning</strong></h4></div><div class="modal-body">Are you sure you want to delete this requirement?<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">No</button><button type="button" onclick="deletecreq('+cr_id[k]+')" data-dismiss="modal"  class="btn btn-primary">Yes</button></div></div></div></div></div></td>'); 
        });
    }
  });
}
function openmodal2(id){
  var cr_id = id;
  $.ajax({
    type: "POST",
    url: "syllphp.php?p=openmodal2",
    data: "cr_id="+cr_id,
    success: function(data){
      var cr_id;
      var cr_output;
      var cr_desc;
      var obj =  $.parseJSON(data);
      $.each(obj, function(key , value){
        cr_id=this['cr_id'];
        cr_output=this['cr_output'];
        cr_desc=this['cr_desc'];
      });
      $("#cr_id2").val(cr_id);
      $("#croutput2").val(cr_output);
      $("#crdesc2").val(cr_desc);
      
      $('#editcoursereq').modal('show'); 
    }
  });
  
}

function updatereq() {
    var id = $('#cr_id2').val();
    var out = $('#croutput2').val();
    var desc = $('#crdesc2').val();
    $.ajax({
      type:"POST",
      url:"syllphp.php?p=updatereq",
      data:{id: id, out: out, desc: desc},
      success: function(data){
        var obj = $.parseJSON(data);
        var msg;
        $.each(obj, function(key , value) {
          msg=this['msg'];
        });
        alert1(msg);
        $("#cr_id2").val("");
        $("#croutput2").val("");
        $("#crdesc2").val("");
        $('.modal-backdrop').remove()
        loadreq()
      }
    });
  }

function openmodal(id){
  var topicid = id;
  $(".delsub").remove();
  subtopics=1;
  $.ajax({
    type: "POST",
    url: "syllphp.php?p=openmodal",
    data: "topicid="+id,
    success: function(data){
      var topic_description;
      var idsa;
      var ass;
      var ep;
      var sub;
      var period;
      var week;
      // var numItems = $('.subtopicsdel2').length;
      
      var obj =  $.parseJSON(data);
      // if (subtopics>1) {
      //   for (var i = subtopics; i > 0; i--) {
      //     $('#subtopictbl2'+i).remove();
      //     subtopics--;
      //   };
      // };

      $("#subtopics2").val("");
      $.each(obj , function(key , value) {
        topic_description=this['topic_description'];
        idsa=this['idsa']; 
        ass=this['ass'];  
        week=this['week'];
        ep=this['ep'];
        period=this['period'];
        $.each(value.subtopic , function(k , v ){ 
          if (k==0) {
            sub=v;
            $("#subtopics2").val(sub);
          };
          if (k>0) {
            sub=v;
            
            $('#dynamic_subtopic2').append('<tr id="subtopictbl2'+subtopics+'" class="delsub"><td><div class="input-group"><input type="text" name="subtopics2[]" class="form-control subtopics2" placeholder="Enter Sub Topic" id="subtopics2'+subtopics+'" value="'+sub+'" aria-describedby="basic-addon1"><span class="input-group-addon" id="basic-addon1"><a><i id="'+subtopics+'" class="glyphicon glyphicon-minus subtopicsdel2"><span class="subtopicsdeltext">Delete</span></i></a></span></div></td></tr>'); 
            subtopics++;
          };
      
        });     
      });
      $("#topicid2").val(topicid);
      $('select[name="week2"]').val(week);
      $("#maintopics2").val(topic_description);
      $("#idsa2").val(idsa);
      $("#ass2").val(ass);
      $("#ep2").val(ep);
      $('select[name="period2"]').val(period);
      if (topic_description=="5" && ilo=="Examination Week" ||  topic_description=="6" && ilo=="Examination Week" || topic_description=="7" && ilo=="Examination Week" || topic_description=="8" && ilo=="Examination Week") {
        $('#period2 option[value="'+period+'"]').prop("disabled", false );
        $('#maintopics2').prop("disabled", true );
        $('.subtopics2').prop("disabled", true );
        $('#idsa2').prop("disabled", true );
        $('#ass2').prop("disabled", true );
        $('#ep2').prop("disabled", true );
       
      };
      $('#openmodal').modal('show'); 
    }
  });
  
}
function checkrem(){
  var id ="<?php echo $syllabus_id; ?>";
  $.ajax({
    type: "POST",
    url: "syllphp.php?p=checkr",
    data: "syll="+id,
    success: function(data){
      var rem;
      var obj =  $.parseJSON(data);
      $.each(obj, function(){
        rem=this['rem'];
      });
      if (rem=="true") {
        $(".rem").append("<span style='color:red' id='rem2'><i class='glyphicon glyphicon-exclamation-sign  remalert'></i></span>");
      }else{
        $("#rem2").remove();
      };
      
    }
  });
}
function checkrem2(){
  var id ="<?php echo $syllabus_id; ?>";
  $.ajax({
    type: "POST",
    url: "syllphp.php?p=checkr2",
    data: "syll="+id,
    success: function(data){
      checkrem()
    }
  });
}
// function loadperiod(){
//   var id = "<?php echo $syllabus_id;?>";
//    $.ajax({
//       type:"POST",
//       url:"syllphp.php?p=loadperiod",
//       data:"syll="+id,
//       success: function(data){
//         var prelim;
//         var midterm;
//         var prefinal;
//         var finall;
//         var obj = $.parseJSON(data);
//         $.each(obj, function() {
//           prelim=this['prelim'];
//           midterm=this['midterm'];
//           prefinal=this['prefinal'];
//           finall=this['final'];
//         });
//         if (prelim == "true") {
//           $('#period option[value="1"]').prop("disabled", true );
//           $('#period option[value="5"]').prop("disabled", true );
//         };
//         if (midterm == "true") {
//           $('#period option[value="2"]').prop("disabled", true );
//           $('#period option[value="6"]').prop("disabled", true );
//         };
//         if (prefinal == "true") {
//           $('#period option[value="3"]').prop("disabled", true );
//           $('#period option[value="7"]').prop("disabled", true );
//         };
//         if (finall == "true") {
//           $('#period option[value="4"]').prop("disabled", true );
//           $('#period option[value="8"]').prop("disabled", true );
//         };
//       }
//   });
// }

function submittodean1(){
  var id = "<?php echo $syllabus_id;?>";
  var position ="<?php echo $position_session; ?>";
  var sdep ="<?php echo $subdept; ?>";
  var edep ="<?php echo $depart; ?>";
  console.log(edep)
  console.log(sdep)
  $.ajax({
      type:"POST",
      url:"syllphp.php?p=submit",
      data:{syll: id, position: position, sdep: sdep, edep: edep},
      success: function(data){
        var msg;
        var obj = $.parseJSON(data);
        $.each(obj, function() {
          msg=this['data'];
        });
        alert1(msg)
      }
  });
}

function update(){
  var topicid = $('#topicid2').val();
  var week = $('#week2').val();
  var period = $('#period2').val();
  var maintopics = $('#maintopics2').val();
  var idsa = $('#idsa2').val();
  var ass = $('#ass2').val();
  var ep = $('#ep2').val();
  // var ilo = $('#ilo2').val();
  // var tla = $('#tla2').val();
  // var resource = $('#resource2').val();
  // var oba = $('#oba2').val();
  var subtopics2 = [];
  var sub;
  if (period == 'undefined' || maintopics == 'undefined' || idsa == 'undefined' || ass == 'undefined' || ep == 'undefined' || period == '' || maintopics == '' || idsa == '' || ass == '' || ep == '' ) {
    alert1("Please fill up all the required data.");
  }else{
    $('.subtopics2').each(function(i){
      subtopics2[i] = $(this).val();
      sub = $(this).val();
    });
    $.ajax({
      type:"POST",
      url:"syllphp.php?p=updatetopic",
      data:{period1: period, week1: week, maintopics1: maintopics, idsa1: idsa, ass1: ass, ep1: ep, subtopics1: subtopics2, id1: topicid},
      success: function(data){
        var obj = $.parseJSON(data);
        var msg;
        $.each(obj, function() {
          msg=this['msg'];
        });
        alert1(msg);
        $('#maintopics2').val("");
        $('.subtopics2').val("");
        $('#idsa2').val("");
        $('#ass2').val("");
        $('#ep2').val("");
        $('#week2').val("");
        $('#period2').val("");
        $('#subtopics2').val("");
        $("#b").tab('show');
        loadweek()
      }
    });
  };
}

function savetopic(){
  var id = "<?php echo $syllabus_id;?>";
  var week = $('#week').val();
  var period = $('#period').val();
  var maintopics = $('#maintopics').val();
  var idsa = $('#idsa').val();
  var ass = $('#ass').val();
  var ep = $('#ep').val();
  //var ilo = $('#ilo').val();
  //var tla = $('#tla').val();
  //var resource = $('#resource').val();
  //var oba = $('#oba').val();
  var subtopics = [];
  var sub;
  if (period == 'undefined' || maintopics == 'undefined' || idsa == 'undefined' || ass == 'undefined' || ep == 'undefined' || period == '' || maintopics == '' || idsa == '' || ass == '' || ep == '' ) {
    alert1("Please fill up all the required data.");
  }else{
    $('.subtopics1').each(function(i){
      subtopics[i] = $(this).val();
      sub = $(this).val();
    });
    $.ajax({
      type:"POST",
      url:"syllphp.php?p=savetopic",
      data:{period1: period, week1: week, maintopics1: maintopics, idsa1: idsa, ass1: ass, ep1: ep, subtopics1: subtopics, id1: id},
      success: function(data){
        
        var obj = $.parseJSON(data);
        var msg;
        $.each(obj, function() {
          msg=this['msg'];
        });
        alert1(msg);
        clearsub()
       $('#maintopics').val("");
        $('.subtopics1').val("");
        $('#idsa').val("");
        $('#ass').val("");
        $('#ep').val("");
        $('#week').val("");
        $('#period').val("");
        $('#subtopics0').val("");
        $('#maintopics').prop("disabled", false );
        $('.subtopics1').prop("disabled", false );
        $('#idsa').prop("disabled", true );
        $('#ass').prop("disabled", true );
        $('#ep').prop("disabled", true );
        $('#week').prop("disabled", false );
        $('#period').prop("disabled", false );
        loadweek()
      }
    });
  };
    
}
function alert1(val){
  var msg= val;
  if (msg=="Successfully Saved!" || msg=="Successfully Updated!" || msg=="Submitted to Dean" || msg=="Syllabus Approved!") {
    $('#txt1').empty();
    $('#txt1').text(msg);
    $('#alertsuccess1').show('fade').delay(2000).fadeOut();
  }else if (msg=="Syllabus is still in queue!" || msg=="Syllabus is already approved!" ) {
    $('#txt2').empty();
    $('#txt2').text(msg);
    $('#alertsuccess2').show('fade').delay(2000).fadeOut();
  }else if (msg=="Please fill up all the required data." || msg=="Please complete your topics for the semester." || msg=="Cannot create CLO! Syllabus is still in queue!" || msg=="Cannot create CLO! Syllabus is already approved!"|| msg=="Cannot Delete! Syllabus is already approved." || msg=="Cannot Delete! Syllabus is still in queue." || msg=="Cannot Update! Syllabus is already approved." || msg=="Cannot Update! Syllabus is still in queue!") {
    $('#txt3').empty();
    $('#txt3').text(msg);
    $('#alertsuccess3').show('fade').delay(2000).fadeOut();
  };
  
}

function createexam(){
  var week=$('#week').val();
  var period=$('#period').val();
  if (!week) {
    alert("Please select a week number.")
  }else{
    var numItems = $('.subtopicsdel').length;
      if (numItems>0) {
        for (var i = numItems; i > 0; i--) {
          $('#subtopic'+i).remove();
          subtopic--;
        };
      };
    var pt=$("#period [value='"+period+"']").text();
    if (pt=="Prelim Exam" || pt=="Midterm Exam" || pt=="Pre-Final Exam" || pt=="Final Exam") {
      $('#maintopics').val(period);
      $('.subtopics1').val("Examination Week");
      $('#idsa').val("Examination Week");
      $('#ass').val("Examination Week");
      $('#ep').val("Examination Week");
      $("#createwk").text("Undo");
      $('#maintopics').prop("disabled", true );
      $('.subtopics1').prop("disabled", true );
      $('#idsa').prop("disabled", true );
      $('#ass').prop("disabled", true );
      $('#ep').prop("disabled", true );
    }else{
      $('#maintopics').val("");
      $('.subtopics1').val("");
      $('#idsa').val("");
      $('#ass').val("");
      $('#ep').val("");
      $("#createwk").text("Create Examination Week");
      $('#maintopics').prop("disabled", false );
      $('.subtopics1').prop("disabled", false );
      $('#idsa').prop("disabled", false );
      $('#ass').prop("disabled", false );
      $('#ep').prop("disabled", false );
    };
  };
}

function createexam2(){
  var week=$('#week2').val();
  var period=$('#period2').val();
  if (!week) {
    alert("Please select a week number.")
  }else{
    $(".delsub").remove();
    var pt=$("#period2 [value='"+period+"']").text();
    if (pt=="Prelim Exam" || pt=="Midterm Exam" || pt=="Pre-Final Exam" || pt=="Final Exam") {
      $('#maintopics2').val(period);
      $('.subtopics2').val("Examination Week");
      $('#ilo2').val("Examination Week");
      $('#tla2').val("Examination Week");
      $('#resource2').val("Examination Week");
      $('#oba2').val("Examination Week");
      $('#maintopics2').prop("disabled", true );
      $('.subtopics2').prop("disabled", true );
      $('#ilo2').prop("disabled", true );
      $('#tla2').prop("disabled", true );
      $('#resource2').prop("disabled", true );
      $('#oba2').prop("disabled", true );
    }else{
      $('#maintopics2').val("");
      $('.subtopics2').val("");
      $('#ilo2').val("");
      $('#tla2').val("");
      $('#resource2').val("");
      $('#oba2').val("");
      $('#maintopics2').prop("disabled", false );
      $('.subtopics2').prop("disabled", false );
      $('#ilo2').prop("disabled", false );
      $('#tla2').prop("disabled", false );
      $('#resource2').prop("disabled", false );
      $('#oba2').prop("disabled", false );
    };
  };
}

function loadcrp(){
  var id = "<?php echo $syllabus_id;?>";
  $.ajax({
    type:"POST",
    url:"syllphp.php?p=loadcrp",
    data:"syll="+id,
    success: function(data){
      var obj = $.parseJSON(data); 
      var lt;
      var absence;
      var mq;
      var permits;
      var cheating;
      var cm;
      var ref;
      $.each(obj, function() {
        lt=this['late_tardiness'];
        absence=this['absence'];
        mq=this['miss_quiz'];
        permits=this['permits'];
        cheating=this['cheating'];
        cm=this['class_misbehavior'];
        ref=this['ref_desc'];
      });
      $('#lt').val(lt);
      $('#absence').val(absence)
      $('#mq').val(mq);
      $('#permits').val(permits);
      $('#cheating').val(cheating);
      $('#cm').val(cm);
      $('#ref').val(ref);
    }
  });
}
function loaddoc(){
  var id = "<?php echo $syllabus_id;?>";
  $.ajax({
    type:"POST",
    url:"syllphp.php?p=loaddoc",
    data:"syll="+id,
    success: function(data){
      var obj = $.parseJSON(data); 
      var revision;
      var curriculum;
      var qms;
      var version;
      $.each(obj, function() {
        revision=this['revision'];
        curriculum=this['curriculum'];
      });
      $('#revision').val(revision);
      $('#curriculum').val(curriculum)
    }
  });
}
function savecrp1(){
  var id = "<?php echo $syllabus_id;?>";
  var lt = $('#lt').val();
  var absence = $('#absence').val();
  var mq = $('#mq').val();
  var permits = $('#permits').val();
  var cheating = $('#cheating').val();
  var cm = $('#cm').val();
  var ref = $('#ref').val();
  var curriculum = $('#curriculum').val();
  var revision = $('#revision').val();
  //var version = $('#version').val();
  //var qms = $('#qms').val();
  if (lt == 'undefined' || absence == 'undefined' || mq == 'undefined' || permits == 'undefined' || cheating == 'undefined' || cm == 'undefined' || ref == 'undefined' || lt == '' || absence == '' || mq == '' || permits == '' || cheating == '' || cm == '' || ref == '') {
     alert1("Please fill up all the required data.");
  }else{
    $.ajax({
        type:"POST",
        url:"syllphp.php?p=savecrp",
        data:{id1: id, lt1: lt, absence1: absence, mq1: mq, permits1: permits, cheating1: cheating, cm1: cm, ref1: ref, curriculum1: curriculum, revision1: revision},
        success: function(data){
          var obj = $.parseJSON(data);
          var msg;
          $.each(obj, function() {
            msg=this['msg'];
          });
          alert1(msg);
          $('.modal-backdrop').remove()
          loadcrp();
        }
    });
  };
   
}
function saverevstat(){
  var id = "<?php echo $syllabus_id;?>";
  var rev_no = $('#rev_no').val();
  var issued_date = $('#issued_date').val();
  var preparedby = $('#preparedby').val();
  var reviewedby = $('#reviewedby').val();
  var verifiedby = $('#verifiedby').val();
  var approvedby = $('#approvedby').val();
  var effectivity_date = $('#effectivity_date').val();
  //var version = $('#version').val();
  //var qms = $('#qms').val();
  if (rev_no == 'undefined' || issued_date == 'undefined' || preparedby == 'undefined' || reviewedby == 'undefined' || verifiedby == 'undefined' || approvedby == 'undefined' || effectivity_date == 'undefined' || rev_no == '' || issued_date == '' || preparedby == '' || reviewedby == '' || verifiedby == '' || approvedby == '' || effectivity_date == '') {
     alert1("Please fill up all the required data.");
  }else{
    $.ajax({
        type:"POST",
        url:"syllphp.php?p=saverevstat",
        data:{id1: id, rev_no1: rev_no, issued_date1: issued_date, preparedby1: preparedby, reviewedby1: reviewedby, verifiedby1: verifiedby, approvedby1: approvedby, effectivity_date1: effectivity_date},
        success: function(data){
          var obj = $.parseJSON(data);
          var msg;
          $.each(obj, function() {
            msg=this['msg'];
          });
          alert1(msg);
          //$('.modal-backdrop').remove()
          loadrev();
          $('#rev_no').val("");
          $('#issued_date').val("");
          $('#preparedby').val("");
          $('#reviewedby').val("");
          $('#verifiedby').val("");
          $('#approvedby').val("");
          $('#effectivity_date').val("");
        }
    });
  };
   
}
function savecr(){
  var id = "<?php echo $syllabus_id;?>";
  var croutput = $('#croutput').val();
  var crdesc = $('#crdesc').val();
  if (croutput == 'undefined' || crdesc == 'undefined' || croutput == '' || crdesc == '' ) {
     alert1("Please fill up all the required data.");
  }else{
    $.ajax({
        type:"POST",
        url:"syllphp.php?p=savecr",
        data:{id1: id, croutput1: croutput, crdesc1: crdesc},
        success: function(data){
          var obj = $.parseJSON(data);
          var msg;
          $.each(obj, function() {
            msg=this['msg'];
          });
          alert1(msg);
          $('.modal-backdrop').remove()
          loadcrp()
          loadreq()
          $('#croutput').val("");
          $('#crdesc').val("");
        }
    });
  };
   
}
function deleteclo(str) {
  var id = "<?php echo $syllabus_id;?>";
    var delete_id = str;
    $.ajax({
      type:"GET",
      url:"syllphp.php?p=deleteclo",
      data:{id1: id, del: delete_id},
      success: function(data){
        $('.modal-backdrop').remove()
        var obj = $.parseJSON(data);
        var msg;
        $.each(obj, function() {
          msg=this['msg'];
        });
        alert1(msg);
        location.reload();
      }
    });
  }
  function deleterev(str) {
  var id = "<?php echo $syllabus_id;?>";
    var delete_id = str;
    $.ajax({
      type:"GET",
      url:"syllphp.php?p=deleterev",
      data:{id1: id, del: delete_id},
      success: function(data){
        $('.modal-backdrop').remove()
        var obj = $.parseJSON(data);
        var msg;
        $.each(obj, function() {
          msg=this['msg'];
        });
        alert1(msg);
        loadrev()
      }
    });
  }
function deletetopic(str){
  console.log(str)
    var id = "<?php echo $syllabus_id;?>";
    var delete_id = str;
    $.ajax({
      type:"GET",
      url:"syllphp.php?p=deletetopic",
      data:{id1: id, del: delete_id},
      success: function(data){
        $('.modal-backdrop').remove()
        var obj = $.parseJSON(data);
        var msg;
        $.each(obj, function() {
          msg=this['msg'];
        });
        alert1(msg);
        loadweek()
      }
    });
}
function deletecreq(str){
    var id = "<?php echo $syllabus_id;?>";
    var delete_id = str;
    $.ajax({
      type:"GET",
      url:"syllphp.php?p=deletereq",
      data:{id1: id, del: delete_id},
      success: function(data){
        $('.modal-backdrop').remove()
        var obj = $.parseJSON(data);
        var msg;
        $.each(obj, function() {
          msg=this['msg'];
        });
        alert1(msg);
        loadreq()
      }
    });
}
  function updateclo(str) {
    var cloval = [];
    $('.checkclo'+str+':checked').each(function(i){
      cloval[i] = $(this).val();
    });
    var update_id = str;
    var cloc = $('#cloc'+str).val();
    var clod = $('#clod'+str).val();
    var rev = $('#rev'+str).val();

    $.ajax({
      type:"POST",
      url:"syllphp.php?p=updateclo",
      data:{updateid: update_id, cloc1: cloc, clod1: clod, rev1: rev, cloval1: cloval},
      success: function(data){
        $('.modal-backdrop').remove()
        location.reload();
      }
    });
  }
  function saveclo() {
    var pgoval = [];
    $('.checkpgo:checked').each(function(i){
      pgoval[i] = $(this).val();
    });
    if (pgoval.length==0) {
      pgoval[1] ="none";
    };
    console.log(pgoval)
    var id = "<?php echo $syllabus_id;?>";
    var cloc = $('#cloc').val();
    var clod = $('#clod').val();
    if (cloc === undefined || cloc === null){
      cloc="none";
    };
    if (clod == 'undefined' || clod == '' ) {
    alert1("Please fill up all the required data.");
    }else{

      $.ajax({
        type:"POST",
        url:"syllphp.php?p=createclo",
        data:{id1: id, cloc1: cloc, clod1: clod, pgoval1: pgoval},
        success: function(data){
          var obj = $.parseJSON(data);
          var msg;
          $.each(obj, function(i) {
            msg=this['msg'];
          });
          
          $("#cloc").val("");
          $("#clod").val("");
          location.reload();
          alert1(msg)
        }
      });
    }
  }
</script>
<script>  
function clearsub(){
  var numItems = $('.subtopicsdel').length;
  if (numItems>0) {
    for (var i = numItems; i > 0; i--) {
      $('#subtopic'+i).remove();
      
      subtopic=1;
    };
  };
}
function getval(sel,syllabus_id)
{
  clearsub();
   val1=sel.value;   
   val2=syllabus_id; 
      $('#maintopics').val("");
      $('.subtopics1').val("");
      $('#ilo').val("");
      $('#tla').val("");
      $('#resource').val("");
      $('#oba').val("");
      $('#maintopics').prop("disabled", false );
      $('.subtopics1').prop("disabled", false );
      $('#ilo').prop("disabled", false );
      $('#tla').prop("disabled", false );
      $('#resource').prop("disabled", false );
      $('#oba').prop("disabled", false );
      $('#week').prop("disabled", false );
      $('#period').prop("disabled", false );
      

    $.ajax({
              type: "Post",
              data: {week: val1, syll: val2},
              url: "test4.php",
              dataType: "json",
              success: function(data) {

                    var topic_description;
                    var ilo;
                    var tla;
                    var resources;
                    var oba;
                    var sub;
                    var period;
                    var numItems = $('.subtopicsdel').length;
                    if (numItems>0) {
                      for (var i = numItems; i > 0; i--) {
                        $('#subtopic'+i).remove();
                        
                        subtopic--;
                      };
                    };
                    $("#subtopics0").val("");
                    $.each(data , function(key , value) {
                        topic_description=this['topic_description'];
                        ilo=this['ilo']; 
                        tla=this['tla'];  
                        resources=this['resources'];
                        oba=this['oba'];
                        period=this['period'];
                        $.each(value.subtopic , function(k , v ){ 
                        if (k==0) {
                          sub=v;
                          $("#subtopics0").val(sub);
                        };
                        if (k>0) {
                          sub=v;
                          
                          $('#dynamic_subtopic1').append('<tr id="subtopic'+subtopic+'"><td><div class="input-group"><input type="text" name="subtopics[]" class="form-control subtopics1" placeholder="Enter Sub Topic" id="subtopics'+subtopic+'" value="'+sub+'" aria-describedby="basic-addon1"><span class="input-group-addon" id="basic-addon1"><a><i id="'+subtopic+'" class="glyphicon glyphicon-minus subtopicsdel"><span class="subtopicsdeltext">Delete</span></i></a></span></div></td></tr>'); 
                          subtopic++;
                        };
                      
                      });     
                    });
                    $("#maintopics").val(topic_description);
                    $("#tla").val(tla);
                    $("#oba").val(oba);
                    $("#tla").val(tla);
                    $("#ilo").val(ilo);
                    $("#resource").val(resources);
                    $('select[name="period"]').val(period);
                    if (topic_description=="5" && ilo=="Examination Week" ||  topic_description=="6" && ilo=="Examination Week" || topic_description=="7" && ilo=="Examination Week" || topic_description=="8" && ilo=="Examination Week") {
                      $('#period option[value="'+period+'"]').prop("disabled", false );
                      $('#maintopics').prop("disabled", true );
                      $('.subtopics1').prop("disabled", true );
                      $('#ilo').prop("disabled", true );
                      $('#tla').prop("disabled", true );
                      $('#resource').prop("disabled", true );
                      $('#oba').prop("disabled", true );
                    };
                    
              }
        }); 
}
 $(document).ready(function(){  
      

      // $('#addweek').click(function(){  
      //      i++;  
      //      $('#dynamic_field').append('<tr><td><div class="row"><div class="col-xs-12"><label>Week No. 1</label></div><div class="col-xs-12"><label>Topics</label><input type="text" class="form-control" placeholder="Enter Topics"></div><div class="col-xs-12"><label>Sub Topics</label><table class="table table-bordered" id="dynamic_subtopic1"><tr><td><div class="input-group"><input type="text" name="" class="form-control" placeholder="Enter Sub Topic" id="" aria-describedby="basic-addon1"><span class="input-group-addon" id="basic-addon1"><a><i id="1" class="glyphicon glyphicon-plus subtopics"><span class="subtopicstext">Add</span></i></a></span></div></td></tr></table></div><div class="col-xs-12"><label>Intended Learning Outcome</label><textarea class="form-control" rows="2" placeholder="Enter ILO"></textarea></div><div class="col-xs-12"><label>Teaching and Learning Activities</label><textarea class="form-control" rows="2" placeholder="Enter TLA"></textarea></div><div class="col-xs-12"><label>Resources</label><textarea class="form-control" rows="2" placeholder="Enter Resources"></textarea></div><div class="col-xs-12"><label>Outcome Based Assessment</label><textarea class="form-control" rows="2" placeholder="Enter OBA"></textarea></div></div></td></tr>');
      // });
      
      // $(document).on('click', '.btn_remove', function(){  
      //      var button_id = $(this).attr("id");   
      //      $('#row'+button_id+'').remove(); 
      //      i--; 
      // });
      $('#subtopicsadd2').click(function(){ 
        
      // $(document).on('click', '.subtopics', function(){  
      //      var button_id = $(this).attr("id"); 
           $('#dynamic_subtopic2').append('<tr id="subtopictbl2'+subtopics+'" class="delsub"><td><div class="input-group"><input type="text" name="subtopics2[]" class="form-control subtopics2" placeholder="Enter Sub Topic" id="subtopics2'+subtopics+'" aria-describedby="basic-addon1"><span class="input-group-addon" id="basic-addon1"><a><i id="'+subtopics+'" class="glyphicon glyphicon-minus subtopicsdel2"><span class="subtopicsdeltext">Delete</span></i></a></span></div></td></tr>'); 
            subtopics++;
      });
      $('#subtopicsadd').click(function(){ 
        
      // $(document).on('click', '.subtopics', function(){  
      //      var button_id = $(this).attr("id"); 
           $('#dynamic_subtopic1').append('<tr id="subtopic'+subtopic+'"><td><div class="input-group"><input type="text" name="subtopics[]" class="form-control subtopics1" placeholder="Enter Sub Topic" id="subtopics'+subtopic+'" aria-describedby="basic-addon1"><span class="input-group-addon" id="basic-addon1"><a><i id="'+subtopic+'" class="glyphicon glyphicon-minus subtopicsdel"><span class="subtopicsdeltext">Delete</span></i></a></span></div></td></tr>');  
            subtopic++;
      });

      $(document).on('click', '.subtopicsdel', function(){  
          var button_id = $(this).attr("id");   
          $('#subtopic'+button_id+'').remove(); 
          subtopic--;
      });  
      $(document).on('click', '.subtopicsdel2', function(){  
          var button_id = $(this).attr("id");  
          $("#subtopictbl2"+button_id).remove(); 
          subtopics--;
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
</body>
<style type="text/css">
  .subtopics .subtopicstext {
    visibility: hidden;
    width: 60px;
    background-color: #3c8dbc;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 100;
}
.subt .subtopicstext {
    visibility: hidden;
    width: 60px;
    background-color: #3c8dbc;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 100;
}
  .subtopicsdel .subtopicsdeltext {
    visibility: hidden;
    width: 60px;
    background-color: #f56954;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 100;
}
  .subtopicsdel2 .subtopicsdeltext {
    visibility: hidden;
    width: 60px;
    background-color: #f56954;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 100;
}
.subtopicsdeltext,.subtopicsdel {
  color: #f56954;
}


.subtopics:hover .subtopicstext {
    visibility: visible;
}
.subt:hover .subtopicstext {
    visibility: visible;
}
.subtopicsdel:hover .subtopicsdeltext {
    visibility: visible;
}
.subtopicsdel2:hover .subtopicsdeltext {
    visibility: visible;
}
.subtopicsdeltext,.subtopicsdel2 {
  color: #f56954;
}

</style>
</html>
