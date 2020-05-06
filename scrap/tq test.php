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
          <a href="index2.php">
            <i class="glyphicon glyphicon-list-alt"></i> <span>Test Questionnaire</span>
          </a>
        </li>
        <li>
        <li>
          <a href="notifications.php">
            <i class="fa fa-bell-o"></i> 
            <span class="pull-right-container">
              <small class="label label-primary">1</small>
              <small class="label label-success">2</small>
              <small class="label label-warning">1</small>
              <small class="label label-danger">1</small>
            </span>
            <span>Notifications</span>
          </a>
        </li>
        <li>
          <a href="queue.php">
            <i class="fa fa-book"></i> 
            <span class="pull-right-container">
              <small class="label label-warning">3</small>
            </span>
            <span>Queue</span>
          </a>
        </li>
        <li>
          <a href="reports.php">
            <i class="fa fa-folder"></i> <span>Reports</span></a></li>
        <li>
          <a href="accessibility.php"><i class="glyphicon glyphicon-lock">
            </i> <span>Accessibilty</span></a></li>
        <li>
          <a href="setdate.php"><i class="glyphicon glyphicon-calendar">
            </i> <span>Set Date Submission</span>
          </a>
        </li>
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
                  <div class="col-lg-5">
                    <label>Subject Code</label>
                    <input type="text" disabled="disable" class="form-control" name="subject" style="width: 100%">
                  </div>
                  <div class="col-lg-7">
                    <label>Subject Description</label>
                    <input type="text" disabled="disable" class="form-control" name="subject" style="width: 100%">
                  </div>
                </div>
                <br>
                <div class="btn-group col-xs-12">
                    <div class="btn btn-primary btn-file col-xs-3" id="identification">
                      Identification
                    </div>
                    <div class="btn btn-primary btn-file col-xs-3" id="enumeration">
                      Enumeration
                    </div>
                    <div class="btn btn-primary btn-file col-xs-3" id="multiplechoice">
                      Multiple Choice
                    </div>
                    <div class="btn btn-primary btn-file col-xs-3" id="trueorfalse">
                      True or False
                    </div>
                </div>
                <div class="btn-group col-xs-12">
                    <div class="btn btn-primary btn-file col-xs-3" id="matchingtype">
                      Matching Type
                    </div>
                    <div class="btn btn-primary btn-file col-xs-3" id="problemsolving">
                      Problem Solving
                    </div>
                    <div class="btn btn-primary btn-file col-xs-3" id="essay">
                      Essay
                    </div>
                    <div class="btn btn-primary btn-file col-xs-3" id="fillintheblank">
                      Fill in the Blank
                    </div>
                </div>
                <div class="col-lg-12" id="testparent" style="overflow-y:scroll; overflow-x:hidden; height:400px;" >
                  <table class=" table table-bordered" id="testtable">

















                  <!-- fill in the blank form -->

                    <!-- <tr id="row'+test_count+'">
                    <td>
                      <div class="row">
                        <div class="col-lg-12">
                          <a href="#" role="button" class="btn btn-warning disabled">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>'+test_count+' Fill In The Blank
                          </a>
                        </div>
                      </div>
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
                        <tr>
                          <td>
                            <div class="row">
                              <div class="col-xs-12">
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">1.</span>
                                  <input type="text" name="fitbquestion'+fitb_num+'" class="form-control" placeholder="Question" id="fitbquestion'+fitb_num+'" aria-describedby="basic-addon1">
                                  <span class="input-group-btn">
                                  <button class="btn btn-default fitbnumimport" id="fitbnumimport" name="fitbnumimport" type="button"> 
                                    <i class="fa fa-paperclip"></i>
                                  </button>
                              </span>
                                </div>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-xs-4">
                                <label for="topic">Topic</label>
                                <input type="text" name="fitbtopic'+fitb_num+'" class="form-control" id="fitbtopic'+fitb_num+'" placeholder="Enter Topic">
                              </div>
                              <div class="col-xs-4">
                                <form role="form">
                                  <label name="" for="fitbcognitive'+fitb_num+'">Cognitive Domain</label>
                                  <select class="form-control" id="fitbcognitive'+fitb_num+'">
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
                                <input type="text" name="fitbpoints'+fitb_num+'" class="form-control" id="fitbpoints'+fitb_num+'" placeholder="Enter Points">
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-xs-12">
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1"> Answer</span>
                                  <input type="text" name="fitbanswer'+fitb_num+'" class="form-control" placeholder="Enter  Answer" id="fitbanswer'+fitb_num+'" aria-describedby="basic-addon1">
                                </div>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-xs-12">
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">Remarks</span>
                                  <input type="text" name="fitbremarks'+fitb_num+'" class="form-control" placeholder="" disabled="disable" id="fitbremarks'+fitb_num+'" aria-describedby="basic-addon1">
                                </div>
                              </div>
                            </div>
                            <br>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr> -->















                  <!-- essay form -->
                    <!-- <tr id="row'+test_count+'">
                    <td>
                      <div class="row">
                        <div class="col-lg-12">
                          <a href="#" role="button" class="btn btn-warning disabled">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>'+test_count+' Essay
                          </a>
                        </div>
                      </div>
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
                        <tr>
                          <td>
                            <div class="row">
                              <div class="col-xs-12">
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">1.</span>
                                  <input type="text" name="essayquestion'+essay_num+'" class="form-control" placeholder="Question" id="essayquestion'+essay_num+'" aria-describedby="basic-addon1">
                                  <span class="input-group-btn">
                                  <button class="btn btn-default essaynumimport" id="essaynumimport" name="essaynumimport" type="button"> 
                                    <i class="fa fa-paperclip"></i>
                                  </button>
                              </span>
                                </div>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-xs-4">
                                <label for="topic">Topic</label>
                                <input type="text" name="essaytopic'+essay_num+'" class="form-control" id="essaytopic'+essay_num+'" placeholder="Enter Topic">
                              </div>
                              <div class="col-xs-4">
                                <form role="form">
                                  <label name="" for="essaycognitive'+essay_num+'">Cognitive Domain</label>
                                  <select class="form-control" id="essaycognitive'+essay_num+'">
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
                                <input type="text" name="essaypoints'+essay_num+'" class="form-control" id="essaypoints'+essay_num+'" placeholder="Enter Points">
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-xs-12">
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1"> Answer</span>
                                  <input type="text" name="essayanswer'+essay_num+'" class="form-control" placeholder="Enter  Answer" id="essayanswer'+essay_num+'" aria-describedby="basic-addon1">
                                </div>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-xs-12">
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">Remarks</span>
                                  <input type="text" name="essayremarks'+essay_num+'" class="form-control" placeholder="" disabled="disable" id="essayremarks'+essay_num+'" aria-describedby="basic-addon1">
                                </div>
                              </div>
                            </div>
                            <br>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr> -->













                 <!--  problem solving form -->
                  <!-- <tr id="row'+test_count+'">
                    <td>
                      <div class="row">
                        <div class="col-lg-12">
                          <a href="#" role="button" class="btn btn-warning disabled">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>'+test_count+' Problem Solving
                          </a>
                        </div>
                      </div>
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
                        <tr>
                          <td>
                            <div class="row">
                              <div class="col-xs-12">
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">1.</span>
                                  <input type="text" name="probquestion'+prob_num+'" class="form-control" placeholder="Question" id="probquestion'+prob_num+'" aria-describedby="basic-addon1">
                                  <span class="input-group-btn">
                                  <button class="btn btn-default probnumimport" id="probnumimport" name="probnumimport" type="button"> 
                                    <i class="fa fa-paperclip"></i>
                                  </button>
                              </span>
                                </div>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-xs-4">
                                <label for="topic">Topic</label>
                                <input type="text" name="probtopic'+prob_num+'" class="form-control" id="probtopic'+prob_num+'" placeholder="Enter Topic">
                              </div>
                              <div class="col-xs-4">
                                <form role="form">
                                  <label name="" for="probcognitive'+prob_num+'">Cognitive Domain</label>
                                  <select class="form-control" id="probcognitive'+prob_num+'">
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
                                <input type="text" name="probpoints'+prob_num+'" class="form-control" id="probpoints'+prob_num+'" placeholder="Enter Points">
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-xs-12">
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1"> Answer</span>
                                  <input type="text" name="probanswer'+prob_num+'" class="form-control" placeholder="Enter  Answer" id="probanswer'+prob_num+'" aria-describedby="basic-addon1">
                                </div>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-xs-12">
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">Remarks</span>
                                  <input type="text" name="probremarks'+prob_num+'" class="form-control" placeholder="" disabled="disable" id="probremarks'+prob_num+'" aria-describedby="basic-addon1">
                                </div>
                              </div>
                            </div>
                            <br>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>

 -->













                <!--   matching type form -->
                    <!-- <tr id="row'+test_count+'">
                      <td>
                        <div class="row">
                          <div class="col-lg-12">
                            <a href="#" role="button" class="btn btn-warning disabled">
                              <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>'+test_count+' Matching Type
                            </a>
                          </div>
                        </div>
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
                          <tr>
                            <td>
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">1.</span>
                                    <input type="text" name="matchquestion'+match_num+'" class="form-control" placeholder="Question" id="matchquestion'+match_num+'" aria-describedby="basic-addon1">
                                    <span class="input-group-btn">
                                      <button class="btn btn-default matchnumimport" id="matchnumimport" name="matchnumimport" type="button"> 
                                        <i class="fa fa-paperclip"></i>
                                      </button>
                                    </span>
                                  </div>
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="col-xs-4">
                                  <label for="topic">Topic</label>
                                  <input type="text" name="matchtopic'+match_num+'" class="form-control" id="matchtopic'+match_num+'" placeholder="Enter Topic">
                                </div>
                                <div class="col-xs-4">
                                  <form role="form">
                                    <label name="" for="matchcognitive'+match_num+'">Cognitive Domain</label>
                                    <select class="form-control" id="matchcognitive'+match_num+'">
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
                                  <input type="text" name="matchpoints'+match_num+'" class="form-control" id="matchpoints'+match_num+'" placeholder="Enter Points">
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"> Answer</span>
                                    <input type="text" name="matchanswer'+match_num+'" class="form-control" placeholder="Enter  Answer" id="matchanswer'+match_num+'" aria-describedby="basic-addon1">
                                  </div>
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Remarks</span>
                                    <input type="text" name="matchremarks'+match_num+'" class="form-control" placeholder="" disabled="disable" id="matchremarks'+match_num+'" aria-describedby="basic-addon1">
                                  </div>
                                </div>
                              </div>
                              <br>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr> -->












                 <!--  true or false form -->
                  <!-- <tr id="row'+test_count+'">
                    <td>
                      <div class="row">
                        <div class="col-lg-12">
                          <a href="#" role="button" class="btn btn-warning disabled">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>'+test_count+' True or False
                          </a>
                        </div>
                      </div>
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
                        <tr>
                          <td>
                            <div class="row">
                              <div class="col-xs-12">
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">1.</span>
                                  <input type="text" name="tofquestion'+tof_num+'" class="form-control" placeholder="Question" id="tofquestion'+tof_num+'" aria-describedby="basic-addon1">
                                  <span class="input-group-btn">
                                    <button class="btn btn-default multinumimport" id="multinumimport" name="multinumimport" type="button"> 
                                  <i class="fa fa-paperclip"></i>
                                </button>
                              </span>
                                </div>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-xs-4">
                                <label for="topic">Topic</label>
                                <input type="text" name="toftopic'+tof_num+'" class="form-control" id="toftopic'+tof_num+'" placeholder="Enter Topic">
                              </div>
                              <div class="col-xs-4">
                                <form role="form">
                                  <label name="" for="tofcognitive'+tof_num+'">Cognitive Domain</label>
                                  <select class="form-control" id="tofcognitive'+tof_num+'">
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
                                <input type="text" name="tofpoints'+tof_num+'" class="form-control" id="tofpoints'+tof_num+'" placeholder="Enter Points">
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-xs-12">
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">Answer</span>
                                  <input type="text" name="tofanswer'+tof_num+'" class="form-control" placeholder="Enter  Answer" id="tofanswer'+tof_num+'" aria-describedby="basic-addon1">
                                </div>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-xs-12">
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">Remarks</span>
                                  <input type="text" name="tofremarks'+tof_num+'" class="form-control" placeholder="" disabled="disable" id="tofremarks'+tof_num+'" aria-describedby="basic-addon1">
                                </div>
                              </div>
                            </div>
                            <br>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr> -->



















                    <!-- multiple choice form -->
                    <!-- <tr id="row'+test_count+'">
                      <td>
                        <div class="row">
                          <div class="col-lg-12">
                            <a href="#" role="button" class="btn btn-warning disabled">
                              <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>'+test_count+' Multiple Choice
                            </a>
                          </div>
                        </div>
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
                          <tr>
                            <td>
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">1.</span>
                                    <input type="text" name="multiquestion'+multi_num+'" class="form-control" placeholder="Question" id="multiquestion'+multi_num+'" aria-describedby="basic-addon1">
                                    <span class="input-group-btn">
                                      <button class="btn btn-default multinumimport" id="multinumimport" name="multinumimport" type="button"> 
                                        <i class="fa fa-paperclip"></i>
                                      </button>
                                    </span>
                                  </div>
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="col-xs-4">
                                  <label for="topic">Topic</label>
                                  <input type="text" name="multitopic'+multi_num+'" class="form-control" id="multitopic'+multi_num+'" placeholder="Enter Topic">
                                </div>
                                <div class="col-xs-4">
                                  <form role="form">
                                    <label name="" for="multicognitive'+multi_num+'">Cognitive Domain</label>
                                    <select class="form-control" id="multicognitive'+multi_num+'">
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
                                  <input type="text" name="multipoints'+multi_num+'" class="form-control" id="multipoints'+multi_num+'" placeholder="Enter Points">
                                </div>
                              </div>
                              <br>
                              <table class="table table-bordered" id="multiplechoice'+multi_num+'_field">
                                <tr>
                                  <td>
                                    <div class="row">
                                      <div class="col-xs-9">
                                        <div class="input-group">
                                          <span class="input-group-addon" id="basic-addon1">Choice '+choice_num+'.</span>
                                          <input type="text" name="multichoice'+multi_num+','+choice_num+'" class="form-control" placeholder="Enter Choice '+choice_num+'" id="choice'+multi_num+','+choice_num+'" aria-describedby="basic-addon1">
                                        </div>
                                      </div>
                                      <div class="col-xs-1">
                                        <label>
                                          <input type="radio" name="r1" class="minimal" checked>
                                        </label>
                                      </div>
                                      <div class="col-lg-1">
                                        <button type="button" id="'+multi_num+'" name="choiceadd" class="btn btn-primary choiceadd"><i class="glyphicon glyphicon-plus choiceadd"></i></button>                                      </div>
                                    </div>
                                  </td>
                                </tr>
                              </table>
                              <br>
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Remarks</span>
                                    <input type="text" name="multiremarks'+multi_num+'" class="form-control" placeholder="" disabled="disable" id="multiremarks'+iden_num+'" aria-describedby="basic-addon1">
                                  </div>
                                </div>
                              </div>
                              <br>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr> -->








                    <!--  enumeration form -->
                  <!-- <tr id="row'+test_count+'">
                    <td>
                      <div class="row">
                        <div class="col-lg-12">
                          <a href="#" role="button" class="btn btn-warning disabled">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>'+test_count+' Enumeration
                          </a>
                        </div>
                      </div>
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
                        <tr>
                          <td>
                            <div class="row">
                              <div class="col-xs-12">
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">1.</span>
                                  <input type="text" name="enuquestion'+enu_num+'" class="form-control" placeholder="Question" id="enuquestion'+enu_num+'" aria-describedby="basic-addon1">
                                  <span class="input-group-btn">
                                    <button class="btn btn-default enunumimport" id="enunumimport" name="enunumimport" type="button"> 
                                      <i class="fa fa-paperclip"></i>
                                    </button>
                                  </span>
                                </div>
                              </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-xs-4">
                                <label for="topic">Topic</label>
                                <input type="text" name="enutopic'+enu_num+'" class="form-control" id="enutopic'+enu_num+'" placeholder="Enter Topic">
                              </div>
                              <div class="col-xs-4">
                                <form role="form">
                                  <label name="" for="enucognitive'+enu_num+'">Cognitive Domain</label>
                                  <select class="form-control" id="enucognitive'+enu_num+'">
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
                                <input type="text" name="enupoints'+enu_num+'" class="form-control" id="enupoints'+enu_num+'" placeholder="Enter Points">
                              </div>
                            </div>
                            <br>
                            <table class="table table-bordered" id="enumeration_answer_field">
                              <tr>
                                <td>
                                  <div class="row">
                                    <div class="col-xs-12">
                                      <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon1">Answer '+enu_num+'_'+enu_ans+'</span>
                                        <input type="text" name="enuanswer'+enu_num+'" class="form-control" placeholder="Enter  Answer" id="enuanswer'+enu_num+'" aria-describedby="basic-addon1">
                                      </div>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                            <br>
                            <div class="row">
                              <div class="col-xs-12">
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">Remarks</span>
                                  <input type="text" name="enuremarks'+enu_num+'" class="form-control" placeholder="" disabled="disable" id="enuremarks'+enu_num+'" aria-describedby="basic-addon1">
                                </div>
                              </div>
                            </div>
                            <br>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr> -->









                  <!-- identification form -->
                   <!-- <tr id="row'+test_count+'">
                      <td>
                        <div class="row">
                          <div class="col-lg-12">
                            <a href="#" role="button" class="btn btn-warning disabled">
                              <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> '+test_count+' Identification
                            </a>
                          </div>
                        </div>
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
                          <tr>
                            <td>
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">1.</span>
                                    <input type="text" name="idenquestion'+iden_num+'" class="form-control" placeholder="Question" id="idenquestion'+iden_num+'" aria-describedby="basic-addon1">
                                    <span class="input-group-btn">
                                      <button class="btn btn-default idennumimport" id="idennumimport" name="idenimport" type="button"> 
                                        <i class="fa fa-paperclip"></i>
                                      </button>
                                    </span>
                                  </div>
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="col-xs-4">
                                  <label for="topic">Topic</label>
                                  <input type="text" name="identopic'+iden_num+'" class="form-control" id="identopic'+iden_num+'" placeholder="Enter Topic">
                                </div>
                                <div class="col-xs-4">
                                  <form role="form">
                                    <label name="" for="idencognitive'+iden_num+'">Cognitive Domain</label>
                                    <select class="form-control" id="idencognitive'+iden_num+'">
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
                                  <input type="text" name="idenpoints'+iden_num+'" class="form-control" id="idenpoints'+iden_num+'" placeholder="Enter Points">
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"> Answer</span>
                                    <input type="text" name="idenanswer'+iden_num+'" class="form-control" placeholder="Enter  Answer" id="idenanswer'+iden_num+'" aria-describedby="basic-addon1">
                                  </div>
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">Remarks</span>
                                    <textarea class="form-control" name="idenremarks'+iden_num+'" class="form-control" placeholder="" disabled="disable" id="idenremarks'+iden_num+'" rows="1" placeholder="Enter re-requisites / Co-requisites"></textarea>
                                  </div>
                                </div>
                              </div>
                              <br>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr> -->







                  </table>
                </div>
              </form>
            </div>
            <div class="box-footer clearfix">
              <button type="button" class="pull-right btn btn-default" id="save">
                <i class="glyphicon glyphicon-floppy-save"></i> Save </button>
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
<script src="dist/js/demo.js"></script>
<script>  
  var test_count=0;  
  var iden_num=1; 
  var enu_num=1;
  var multi_num=1;
  var tof_num=1; 
  var match_num=1; 
  var prob_num=1; 
  var essay_num=1;
  var fitb_num=1;
$('.btn-file').draggable({
  helper: "clone",
  drag: function(){
    $(this).css("z-index","100");
  }
});
$('#testparent').droppable({
  drop: function(event,ui){ 
  var iden=$(ui.draggable).attr("id");
    if(iden=="identification"){  
      test_count++;
      $('#testtable').append('<tr id="row'+test_count+'"><td><div class="row"><div class="col-lg-3"><a href="#" role="button" class="btn btn-warning disabled"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> '+test_count+' Identification</a></div><div class="col-lg-6"></div><div class="col-lg-3"><a href="#" role="button" name="identificationremove" id="'+test_count+'" class="pull-right btn btn-danger identest_remove"> Remove test </a></div><div class="row"><div class="col-lg-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Direction</span><input type="text" class="form-control" placeholder="Enter Test Direction" id="identd" aria-describedby="basic-addon1">  <span class="input-group-btn">    <button class="btn btn-default" type="button">Import</button></span></div></div></div></div><br><table class="table table-bordered" id="identification_field"><tr><td><div class="row"><div class="col-xs-9"><div class="input-group"><span class="input-group-addon" id="basic-addon1">1.</span><input type="text" name="idenquestion'+iden_num+'" class="form-control" placeholder="Question" id="idenquestion'+iden_num+'" aria-describedby="basic-addon1"></div></div><div class="col-lg-3"><button type="button" name="add" class="btn btn-primary identificationadd">Add Number</button></div></div><br><div class="row"><div class="col-xs-4"><label for="topic">Topic</label><input type="text" name="identopic'+iden_num+'" class="form-control" id="identopic'+iden_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="idencognitive'+iden_num+'">Cognitive Domain</label><select class="form-control" id="idencognitive'+iden_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="idenpoints'+iden_num+'" class="form-control" id="idenpoints'+iden_num+'" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Best Answer</span><input type="text" name="idenanswer'+iden_num+'" class="form-control" placeholder="Enter Best Answer" id="idenanswer'+iden_num+'" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="idenremarks'+iden_num+'" class="form-control" placeholder="" disabled="disable" id="idenremarks'+iden_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr></table></td></tr>');   
    }
    else if (iden=="enumeration") {
      test_count++;  
      $('#testtable').append('<tr id="row'+test_count+'"><td><div class="row"><div class="col-lg-3"><a href="#" role="button" class="btn btn-warning disabled"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> '+test_count+' Enumeration</a></div><div class="col-lg-6"><input type="text" class="form-control" placeholder="Enter Test Direction" id="enutd" aria-describedby="basic-addon1"></div><div class="col-lg-3"><a href="#" role="button" name="enumerationremove" id="'+test_count+'" class="pull-right btn btn-danger enutest_remove"> Remove test </a></div></div><br><table class="table table-bordered" id="enumeration_field"><tr><td><div class="row"><div class="col-xs-9"><div class="input-group"><span class="input-group-addon" id="basic-addon1">1.</span><input type="text" name="enuquestion'+enu_num+'" class="form-control" placeholder="Question" id="enuquestion'+enu_num+'" aria-describedby="basic-addon1"></div></div><div class="col-lg-3"><button type="button" name="add" class="btn btn-primary enumerationadd">Add Number</button></div></div><br><div class="row"><div class="col-xs-4"><label for="topic">Topic</label><input type="text" name="enutopic'+enu_num+'" class="form-control" id="enutopic'+enu_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="enucognitive'+enu_num+'">Cognitive Domain</label><select class="form-control" id="enucognitive'+enu_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="enupoints'+enu_num+'" class="form-control" id="enupoints'+enu_num+'" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Best Answer</span><input type="text" name="enuanswer'+enu_num+'" class="form-control" placeholder="Enter Best Answer" id="enuanswer'+enu_num+'" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="enuremarks'+enu_num+'" class="form-control" placeholder="" disabled="disable" id="enuremarks'+enu_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr></table></td></tr>');   
    }
    else if (iden=="multiplechoice") {
      test_count++;  
      $('#testtable').append('<tr id="row'+test_count+'"><td><div class="row"><div class="col-lg-3"><a href="#" role="button" class="btn btn-warning disabled"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> '+test_count+' Multiple Choice</a></div><div class="col-lg-6"><input type="text" class="form-control" placeholder="Enter Test Direction" id="multitd" aria-describedby="basic-addon1"></div><div class="col-lg-3"><a href="#" role="button" name="multiplechoiceremove" id="'+test_count+'" class="pull-right btn btn-danger multitest_remove"> Remove test </a></div></div><br><table class="table table-bordered" id="multiplechoice_field"><tr><td><div class="row"><div class="col-xs-9"><div class="input-group"><span class="input-group-addon" id="basic-addon1">1.</span><input type="text" name="multiquestion'+multi_num+'" class="form-control" placeholder="Question" id="multiquestion'+multi_num+'" aria-describedby="basic-addon1"></div></div><div class="col-lg-3"><button type="button" name="add" class="btn btn-primary multiplechoiceadd">Add Number</button></div></div><br><div class="row"><div class="col-xs-4"><label for="topic">Topic</label><input type="text" name="multitopic'+multi_num+'" class="form-control" id="multitopic'+multi_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="multicognitive'+multi_num+'">Cognitive Domain</label><select class="form-control" id="multicognitive'+multi_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="multipoints'+multi_num+'" class="form-control" id="multipoints'+multi_num+'" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Best Answer</span><input type="text" name="multianswer'+multi_num+'" class="form-control" placeholder="Enter Best Answer" id="multianswer'+multi_num+'" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="multiremarks'+multi_num+'" class="form-control" placeholder="" disabled="disable" id="multiremarks'+multi_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr></table></td></tr>');   

    }
    else if (iden=="trueorfalse") {
      test_count++;  
      $('#testtable').append('<tr id="row'+test_count+'"><td><div class="row"><div class="col-lg-3"><a href="#" role="button" class="btn btn-warning disabled"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> '+test_count+' True or False</a></div><div class="col-lg-6"><input type="text" class="form-control" placeholder="Enter Test Direction" id="toftd" aria-describedby="basic-addon1"></div><div class="col-lg-3"><a href="#" role="button" name="trueorfalseremove" id="'+test_count+'" class="pull-right btn btn-danger toftest_remove"> Remove test </a></div></div><br><table class="table table-bordered" id="trueorfalse_field"><tr><td><div class="row"><div class="col-xs-9"><div class="input-group"><span class="input-group-addon" id="basic-addon1">1.</span><input type="text" name="tofquestion'+tof_num+'" class="form-control" placeholder="Question" id="tofquestion'+tof_num+'" aria-describedby="basic-addon1"></div></div><div class="col-lg-3"><button type="button" name="add" class="btn btn-primary trueorfalseadd">Add Number</button></div></div><br><div class="row"><div class="col-xs-4"><label for="topic">Topic</label><input type="text" name="toftopic'+tof_num+'" class="form-control" id="toftopic'+tof_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="tofcognitive'+tof_num+'">Cognitive Domain</label><select class="form-control" id="tofcognitive'+tof_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="tofpoints'+tof_num+'" class="form-control" id="tofpoints'+tof_num+'" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Best Answer</span><input type="text" name="tofanswer'+tof_num+'" class="form-control" placeholder="Enter Best Answer" id="tofanswer'+tof_num+'" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="tofremarks'+tof_num+'" class="form-control" placeholder="" disabled="disable" id="tofremarks'+tof_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr></table></td></tr>');   

    }
    else if (iden=="matchingtype") {
      test_count++;  
      $('#testtable').append('<tr id="row'+test_count+'"><td><div class="row"><div class="col-lg-3"><a href="#" role="button" class="btn btn-warning disabled"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> '+test_count+' Matching Type</a></div><div class="col-lg-6"><input type="text" class="form-control" placeholder="Enter Test Direction" id="matchtd" aria-describedby="basic-addon1"></div><div class="col-lg-3"><a href="#" role="button" name="matchingtyperemove" id="'+test_count+'" class="pull-right btn btn-danger matchtest_remove"> Remove test </a></div></div><br><table class="table table-bordered" id="matchingtype_field"><tr><td><div class="row"><div class="col-xs-9"><div class="input-group"><span class="input-group-addon" id="basic-addon1">1.</span><input type="text" name="matchquestion'+match_num+'" class="form-control" placeholder="Question" id="matchquestion'+match_num+'" aria-describedby="basic-addon1"></div></div><div class="col-lg-3"><button type="button" name="add" class="btn btn-primary matchingtypeadd">Add Number</button></div></div><br><div class="row"><div class="col-xs-4"><label for="topic">Topic</label><input type="text" name="matchtopic'+match_num+'" class="form-control" id="matchtopic'+match_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="matchcognitive'+match_num+'">Cognitive Domain</label><select class="form-control" id="matchcognitive'+match_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="matchpoints'+match_num+'" class="form-control" id="matchpoints'+match_num+'" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Best Answer</span><input type="text" name="matchanswer'+match_num+'" class="form-control" placeholder="Enter Best Answer" id="matchanswer'+match_num+'" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="matchremarks'+match_num+'" class="form-control" placeholder="" disabled="disable" id="matchremarks'+match_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr></table></td></tr>');   

    }
    else if (iden=="problemsolving") {
      test_count++;  
      $('#testtable').append('<tr id="row'+test_count+'"><td><div class="row"><div class="col-lg-3"><a href="#" role="button" class="btn btn-warning disabled"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> '+test_count+' Problem Solving</a></div><div class="col-lg-6"><input type="text" class="form-control" placeholder="Enter Test Direction" id="probtd" aria-describedby="basic-addon1"></div><div class="col-lg-3"><a href="#" role="button" name="probingtyperemove" id="'+test_count+'" class="pull-right btn btn-danger probtest_remove"> Remove test </a></div></div><br><table class="table table-bordered" id="problemsolving_field"><tr><td><div class="row"><div class="col-xs-9"><div class="input-group"><span class="input-group-addon" id="basic-addon1">1.</span><input type="text" name="probquestion'+prob_num+'" class="form-control" placeholder="Question" id="probquestion'+prob_num+'" aria-describedby="basic-addon1"></div></div><div class="col-lg-3"><button type="button" name="add" class="btn btn-primary problemsolvingadd">Add Number</button></div></div><br><div class="row"><div class="col-xs-4"><label for="topic">Topic</label><input type="text" name="probtopic'+prob_num+'" class="form-control" id="probtopic'+prob_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="probcognitive'+prob_num+'">Cognitive Domain</label><select class="form-control" id="probcognitive'+prob_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="probpoints'+prob_num+'" class="form-control" id="probpoints'+prob_num+'" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Best Answer</span><input type="text" name="probanswer'+prob_num+'" class="form-control" placeholder="Enter Best Answer" id="probanswer'+prob_num+'" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="probremarks'+prob_num+'" class="form-control" placeholder="" disabled="disable" id="probremarks'+prob_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr></table></td></tr>');   

    }
    else if (iden=="essay") {
      test_count++;  
      $('#testtable').append('<tr id="row'+test_count+'"><td><div class="row"><div class="col-lg-3"><a href="#" role="button" class="btn btn-warning disabled"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> '+test_count+' Essay</a></div><div class="col-lg-6"><input type="text" class="form-control" placeholder="Enter Test Direction" id="essaytd" aria-describedby="basic-addon1"></div><div class="col-lg-3"><a href="#" role="button" name="essayremove" id="'+test_count+'" class="pull-right btn btn-danger essaytest_remove"> Remove test </a></div></div><br><table class="table table-bordered" id="essay_field"><tr><td><div class="row"><div class="col-xs-9"><div class="input-group"><span class="input-group-addon" id="basic-addon1">1.</span><input type="text" name="essayquestion'+essay_num+'" class="form-control" placeholder="Question" id="essayquestion'+essay_num+'" aria-describedby="basic-addon1"></div></div><div class="col-lg-3"><button type="button" name="add" class="btn btn-primary essayadd">Add Number</button></div></div><br><div class="row"><div class="col-xs-4"><label for="topic">Topic</label><input type="text" name="essaytopic'+essay_num+'" class="form-control" id="essaytopic'+essay_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="essaycognitive'+essay_num+'">Cognitive Domain</label><select class="form-control" id="essaycognitive'+essay_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="essaypoints'+essay_num+'" class="form-control" id="essaypoints'+essay_num+'" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Best Answer</span><input type="text" name="essayanswer'+essay_num+'" class="form-control" placeholder="Enter Best Answer" id="essayanswer'+essay_num+'" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="essayremarks'+essay_num+'" class="form-control" placeholder="" disabled="disable" id="essayremarks'+essay_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr></table></td></tr>');   

    }
    else if (iden=="fillintheblank") {
      test_count++;  
      $('#testtable').append('<tr id="row'+test_count+'"><td><div class="row"><div class="col-lg-3"><a href="#" role="button" class="btn btn-warning disabled"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> '+test_count+' Fill in the Blank</a></div><div class="col-lg-6"><input type="text" class="form-control" placeholder="Enter Test Direction" id="fitbtd" aria-describedby="basic-addon1"></div><div class="col-lg-3"><a href="#" role="button" name="fitbremove" id="'+test_count+'" class="pull-right btn btn-danger fillintheblanktest_remove"> Remove test </a></div></div><br><table class="table table-bordered" id="fillintheblank_field"><tr><td><div class="row"><div class="col-xs-9"><div class="input-group"><span class="input-group-addon" id="basic-addon1">1.</span><input type="text" name="fitbquestion'+fitb_num+'" class="form-control" placeholder="Question" id="fitbquestion'+fitb_num+'" aria-describedby="basic-addon1"></div></div><div class="col-lg-3"><button type="button" name="add" class="btn btn-primary fillintheblankadd">Add Number</button></div></div><br><div class="row"><div class="col-xs-4"><label for="topic">Topic</label><input type="text" name="fitbtopic'+fitb_num+'" class="form-control" id="fitbtopic'+fitb_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="fitbcognitive'+fitb_num+'">Cognitive Domain</label><select class="form-control" id="fitbcognitive'+fitb_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="fitbpoints'+fitb_num+'" class="form-control" id="fitbpoints'+fitb_num+'" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Best Answer</span><input type="text" name="fitbanswer'+fitb_num+'" class="form-control" placeholder="Enter Best Answer" id="fitbanswer'+fitb_num+'" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="fitbremarks'+fitb_num+'" class="form-control" placeholder="" disabled="disable" id="fitbremarks'+fitb_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr></table></td></tr>');   
    }
  }
});
  $(document).on('click', '.identest_remove', function(){  
    var button_id = $(this).attr("id");   
    $('#row'+button_id+'').remove(); 
    test_count--; 
    iden_num =1;
  });  
  $(document).on('click', '.enutest_remove', function(){  
    var button_id = $(this).attr("id");   
    $('#row'+button_id+'').remove(); 
    test_count--; 
    enu_num =1;
  });  
  $(document).on('click', '.multitest_remove', function(){  
    var button_id = $(this).attr("id");   
    $('#row'+button_id+'').remove(); 
    test_count--; 
    multi_num =1;
  });  
  $(document).on('click', '.toftest_remove', function(){  
    var button_id = $(this).attr("id");   
    $('#row'+button_id+'').remove(); 
    test_count--; 
    tof_num =1;
  });  
  $(document).on('click', '.matchtest_remove', function(){  
    var button_id = $(this).attr("id");   
    $('#row'+button_id+'').remove(); 
    test_count--; 
    match_num =1;
  });  
  $(document).on('click', '.probtest_remove', function(){  
    var button_id = $(this).attr("id");   
    $('#row'+button_id+'').remove(); 
    test_count--; 
    prob_num =1;
  });  
  $(document).on('click', '.essaytest_remove', function(){  
    var button_id = $(this).attr("id");   
    $('#row'+button_id+'').remove(); 
    test_count--; 
    essay_num =1;
  });  
  $(document).on('click', '.fillintheblanktest_remove', function(){  
    var button_id = $(this).attr("id");   
    $('#row'+button_id+'').remove(); 
    test_count--; 
    fitb_num =1;
  });  

  $(document).on('click', '.identificationadd', function(){  
           iden_num++;  
           $('#identification_field').append('<tr id="idennum'+iden_num+'"><td><div class="row"><div class="col-xs-9"><div class="input-group"><span class="input-group-addon" id="basic-addon1">'+iden_num+'.</span><input type="text" name="idenquestion'+iden_num+'" class="form-control" placeholder="Question" id="idenquestion'+iden_num+'" aria-describedby="basic-addon1"></div></div><div class="col-lg-3"><a href="#" role="button" name="identificationremove" id="'+iden_num+'" class="btn btn-danger identificationnum_remove"> Remove Num </span></a></div></div><br><div class="row"><div class="col-xs-4"><label for="usr">Topic</label><input type="text" name="identopic'+iden_num+'" class="form-control" id="identopic'+iden_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="idencognitive'+iden_num+'">Cognitive Domain</label><select class="form-control" id="idencognitive'+iden_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="idenpoints'+iden_num+'" class="form-control" id="idenpoints'+iden_num+'" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Best Answer</span><input type="text" name="idenanswer'+iden_num+'" class="form-control" placeholder="Enter Best Answer" id="idenanswer'+iden_num+'" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="idenremarks'+iden_num+'" class="form-control" placeholder="" disabled="disable" id="idenremarks'+iden_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr>');  
      });
  $(document).on('click', '.enumerationadd', function(){  
           enu_num++;  
           $('#enumeration_field').append('<tr id="enunum'+enu_num+'"><td><div class="row"><div class="col-xs-9"><div class="input-group"><span class="input-group-addon" id="basic-addon1">'+enu_num+'.</span><input type="text" name="enuquestion'+enu_num+'" class="form-control" placeholder="Question" id="enuquestion'+enu_num+'" aria-describedby="basic-addon1"></div></div><div class="col-lg-3"><a href="#" role="button" name="enumerationremove" id="'+enu_num+'" class="btn btn-danger enumerationnum_remove"> Remove Num </span></a></div></div><br><div class="row"><div class="col-xs-4"><label for="usr">Topic</label><input type="text" name="enutopic'+enu_num+'" class="form-control" id="enutopic'+enu_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="enucognitive'+enu_num+'">Cognitive Domain</label><select class="form-control" id="enucognitive'+enu_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="enupoints'+enu_num+'" class="form-control" id="enupoints'+enu_num+'" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Best Answer</span><input type="text" name="enuanswer'+enu_num+'" class="form-control" placeholder="Enter Best Answer" id="enuanswer'+enu_num+'" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="enuremarks'+enu_num+'" class="form-control" placeholder="" disabled="disable" id="enuremarks'+enu_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr>');  
      });
  $(document).on('click', '.multiplechoiceadd', function(){  
           multi_num++;  
           $('#multiplechoice_field').append('<tr id="multinum'+multi_num+'"><td><div class="row"><div class="col-xs-9"><div class="input-group"><span class="input-group-addon" id="basic-addon1">'+multi_num+'.</span><input type="text" name="multiquestion'+multi_num+'" class="form-control" placeholder="Question" id="multiquestion'+multi_num+'" aria-describedby="basic-addon1"></div></div><div class="col-lg-3"><a href="#" role="button" name="multiplechoiceremove" id="'+multi_num+'" class="btn btn-danger multiplechoicenum_remove"> Remove Num </span></a></div></div><br><div class="row"><div class="col-xs-4"><label for="usr">Topic</label><input type="text" name="multitopic'+multi_num+'" class="form-control" id="multitopic'+multi_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="multicognitive'+multi_num+'">Cognitive Domain</label><select class="form-control" id="multicognitive'+multi_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="multipoints'+multi_num+'" class="form-control" id="multipoints'+multi_num+'" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Best Answer</span><input type="text" name="multianswer'+multi_num+'" class="form-control" placeholder="Enter Best Answer" id="idenanswer'+multi_num+'" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="multiremarks'+multi_num+'" class="form-control" placeholder="" disabled="disable" id="multiremarks'+multi_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr>');  
      });
  $(document).on('click', '.trueorfalseadd', function(){  
           tof_num++;  
           $('#trueorfalse_field').append('<tr id="tofnum'+tof_num+'"><td><div class="row"><div class="col-xs-9"><div class="input-group"><span class="input-group-addon" id="basic-addon1">'+tof_num+'.</span><input type="text" name="tofquestion'+tof_num+'" class="form-control" placeholder="Question" id="tofquestion'+tof_num+'" aria-describedby="basic-addon1"></div></div><div class="col-lg-3"><a href="#" role="button" name="tofplechoiceremove" id="'+tof_num+'" class="btn btn-danger trueorfalsenum_remove"> Remove Num </span></a></div></div><br><div class="row"><div class="col-xs-4"><label for="usr">Topic</label><input type="text" name="toftopic'+tof_num+'" class="form-control" id="toftopic'+tof_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="tofcognitive'+tof_num+'">Cognitive Domain</label><select class="form-control" id="tofcognitive'+tof_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="tofpoints'+tof_num+'" class="form-control" id="tofpoints'+tof_num+'" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Best Answer</span><input type="text" name="tofanswer'+tof_num+'" class="form-control" placeholder="Enter Best Answer" id="tofanswer'+tof_num+'" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="tofremarks'+tof_num+'" class="form-control" placeholder="" disabled="disable" id="tofremarks'+tof_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr>');  
      });
  $(document).on('click', '.matchingtypeadd', function(){  
           match_num++;  
           $('#matchingtype_field').append('<tr id="matchnum'+match_num+'"><td><div class="row"><div class="col-xs-9"><div class="input-group"><span class="input-group-addon" id="basic-addon1">'+match_num+'.</span><input type="text" name="matchquestion'+match_num+'" class="form-control" placeholder="Question" id="matchquestion'+match_num+'" aria-describedby="basic-addon1"></div></div><div class="col-lg-3"><a href="#" role="button" name="matchingtyperemove" id="'+match_num+'" class="btn btn-danger matchingtypenum_remove"> Remove Num </span></a></div></div><br><div class="row"><div class="col-xs-4"><label for="usr">Topic</label><input type="text" name="matchtopic'+match_num+'" class="form-control" id="matchtopic'+match_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="matchcognitive'+match_num+'">Cognitive Domain</label><select class="form-control" id="matchcognitive'+match_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="matchpoints'+match_num+'" class="form-control" id="matchpoints'+match_num+'" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Best Answer</span><input type="text" name="matchanswer'+match_num+'" class="form-control" placeholder="Enter Best Answer" id="matchanswer'+match_num+'" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="matchremarks'+match_num+'" class="form-control" placeholder="" disabled="disable" id="matchremarks'+match_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr>');  
      });
  $(document).on('click', '.problemsolvingadd', function(){  
           prob_num++;  
           $('#problemsolving_field').append('<tr id="probnum'+prob_num+'"><td><div class="row"><div class="col-xs-9"><div class="input-group"><span class="input-group-addon" id="basic-addon1">'+prob_num+'.</span><input type="text" name="probquestion'+prob_num+'" class="form-control" placeholder="Question" id="probquestion'+prob_num+'" aria-describedby="basic-addon1"></div></div><div class="col-lg-3"><a href="#" role="button" name="problemsolvingremove" id="'+prob_num+'" class="btn btn-danger problemsolvingnum_remove"> Remove Num </span></a></div></div><br><div class="row"><div class="col-xs-4"><label for="usr">Topic</label><input type="text" name="probtopic'+prob_num+'" class="form-control" id="probtopic'+prob_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="probcognitive'+prob_num+'">Cognitive Domain</label><select class="form-control" id="probcognitive'+prob_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="probpoints'+prob_num+'" class="form-control" id="probpoints'+prob_num+'" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Best Answer</span><input type="text" name="probanswer'+prob_num+'" class="form-control" placeholder="Enter Best Answer" id="probanswer'+prob_num+'" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="probremarks'+prob_num+'" class="form-control" placeholder="" disabled="disable" id="probremarks'+prob_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr>');  
      });
  $(document).on('click', '.essayadd', function(){  
           essay_num++;  
           $('#essay_field').append('<tr id="essaynum'+essay_num+'"><td><div class="row"><div class="col-xs-9"><div class="input-group"><span class="input-group-addon" id="basic-addon1">'+essay_num+'.</span><input type="text" name="essayquestion'+essay_num+'" class="form-control" placeholder="Question" id="essayquestion'+essay_num+'" aria-describedby="basic-addon1"></div></div><div class="col-lg-3"><a href="#" role="button" name="essayremove" id="'+essay_num+'" class="btn btn-danger essaynum_remove"> Remove Num </span></a></div></div><br><div class="row"><div class="col-xs-4"><label for="usr">Topic</label><input type="text" name="essaytopic'+essay_num+'" class="form-control" id="essaytopic'+essay_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="essaycognitive'+essay_num+'">Cognitive Domain</label><select class="form-control" id="essaycognitive'+essay_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="essaypoints'+essay_num+'" class="form-control" id="essaypoints'+essay_num+'" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Best Answer</span><input type="text" name="essayanswer'+essay_num+'" class="form-control" placeholder="Enter Best Answer" id="essayanswer'+essay_num+'" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="essayremarks'+essay_num+'" class="form-control" placeholder="" disabled="disable" id="essayremarks'+essay_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr>');  
      });
  $(document).on('click', '.fillintheblankadd', function(){  
           fitb_num++;  
           $('#fillintheblank_field').append('<tr id="fitbnum'+fitb_num+'"><td><div class="row"><div class="col-xs-9"><div class="input-group"><span class="input-group-addon" id="basic-addon1">'+fitb_num+'.</span><input type="text" name="fitbquestion'+fitb_num+'" class="form-control" placeholder="Question" id="fitbquestion'+fitb_num+'" aria-describedby="basic-addon1"></div></div><div class="col-lg-3"><a href="#" role="button" name="fitbremove" id="'+fitb_num+'" class="btn btn-danger fillintheblanknum_remove"> Remove Num </span></a></div></div><br><div class="row"><div class="col-xs-4"><label for="usr">Topic</label><input type="text" name="fitbtopic'+fitb_num+'" class="form-control" id="fitbtopic'+fitb_num+'" placeholder="Enter Topic"></div><div class="col-xs-4"><form role="form"><label name="" for="fitbcognitive'+fitb_num+'">Cognitive Domain</label><select class="form-control" id="fitbcognitive'+fitb_num+'"><option>Knowledge</option><option>Comprehension</option><option>Application</option><option>Analysis</option><option>Evaluation</option><option>Synthesis</option></select></form></div><div class="col-xs-4"><label for="usr">Points</label><input type="text" name="fitbpoints'+fitb_num+'" class="form-control" id="fitbpoints'+fitb_num+'" placeholder="Enter Points"></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Best Answer</span><input type="text" name="fitbanswer'+fitb_num+'" class="form-control" placeholder="Enter Best Answer" id="fitbanswer'+fitb_num+'" aria-describedby="basic-addon1"></div></div></div><br><div class="row"><div class="col-xs-12"><div class="input-group"><span class="input-group-addon" id="basic-addon1">Remarks</span><input type="text" name="fitbremarks'+fitb_num+'" class="form-control" placeholder="" disabled="disable" id="fitbremarks'+fitb_num+'" aria-describedby="basic-addon1"></div></div></div><br></td></tr>');  
      });

  $(document).on('click', '.identificationnum_remove', function(){  
    var button_id = $(this).attr("id");   
    $('#idennum'+button_id+'').remove(); 
    iden_num--; 
  });  
  $(document).on('click', '.enumerationnum_remove', function(){  
    var button_id = $(this).attr("id");   
    $('#enunum'+button_id+'').remove(); 
    enu_num--; 
  });  
  $(document).on('click', '.multiplechoicenum_remove', function(){  
    var button_id = $(this).attr("id");   
    $('#multinum'+button_id+'').remove(); 
    multi_num--; 
  });  
  $(document).on('click', '.trueorfalsenum_remove', function(){  
    var button_id = $(this).attr("id");   
    $('#tofnum'+button_id+'').remove(); 
    tof_num--; 
  });  
  $(document).on('click', '.matchingtypenum_remove', function(){  
    var button_id = $(this).attr("id");   
    $('#matchnum'+button_id+'').remove(); 
    match_num--; 
  });  
  $(document).on('click', '.problemsolvingnum_remove', function(){  
    var button_id = $(this).attr("id");   
    $('#probnum'+button_id+'').remove(); 
    prob_num--; 
  });  
  $(document).on('click', '.essaynum_remove', function(){  
    var button_id = $(this).attr("id");   
    $('#essaynum'+button_id+'').remove(); 
    essay_num--; 
  });  
  $(document).on('click', '.fillintheblanknum_remove', function(){  
    var button_id = $(this).attr("id");   
    $('#fitbnum'+button_id+'').remove(); 
    fitb_num--; 
  });  

</script>  
</body>
</html>
