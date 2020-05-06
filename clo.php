<?php
include('header.php'); 
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
      <ul class="sidebar-menu">
        <li class="header"><b>MAIN NAVIGATION</b></li>
        <li id="dashboard_tab">
          <a href="ph_index.php">
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
          </a>
        </li>
        <li id="syllabus_tab">
          <a href="syllabus_index.php" >
            <i class="glyphicon glyphicon-pencil"></i><span>Syllabus</span>
          </a>
        </li>
        <li id="tq_tab">
          <a href="tq_index.php">
            <i class="glyphicon glyphicon-list-alt"></i> <span>Test Questionnaire</span>
          </a>
        </li>
        <li id="queue_tab">
          <a href="ph_queue.php">
            <i class="fa fa-book"></i> 
            <span class="pull-right-container">
              <small class="label label-primary" id="15_2"></small>
            </span>
            <span>Queue</span>
          </a>
        </li>
        <li id="notification_tab">
          <a href="ph_notifications.php" id="notificationLink" onclick="getNotification()">
            <i class="fa fa-bell-o"></i> 
            <span class="pull-right-container">
              <small class="label label-primary" id="count5_1"></small>
            </span>
            <span>Notifications</span>
          </a>
        </li>
        <li id="reports_tab">
          <a href="ph_reports.php">
            <i class="fa fa-folder"></i> <span>Reports</span></a>
        </li>
        <li id="pgo_tab">
          <a href="pgo.php">
            <i class="glyphicon glyphicon-list"></i> <span>PGO</span>
          </a>
        </li>
        <li id="clo_tab" class="active">
          <a href="clo.php">
            <i class="glyphicon glyphicon-list"></i> <span>CLO</span>
          </a>
        </li>
        <li>
          <a href="ph_chat.php"><i class="fa fa-wechat">
            </i> <span>Messenger</span></a>
        </li>
      </ul>
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content">
    <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><strong>Course Learning Outcomes</strong></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="box-body" style="height:450px;">
                    <div class="row">
                      <div class="col-lg-12" >
                        <table class="table table-hover table-striped table-bordered" id="cpgo">
                          <thead>
                            <tr>
                              <th>CL Attributes</th>
                              <th>CL Code</th>
                              <th>ourse LearningOutcomes</th>
                              <th>Subject</th>
                              <th>Date</th>
                              <th>Revise</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>SUBJ</td>
                              <td>IT01</td>
                              <td>Apply Knowledge of computing, science, and mathematics appropriate to the discipline.</td>
                              <td>Computer Programmer</td>
                              <td>2017-06-06 07:01:14</td>
                              <td>0</td>
                              <td>
                                <button class="btn btn-warning btn-xs glyphicon glyphicon-edit" data-toggle="modal" data-target="#addnew"></button>
                                <button class="btn btn-danger btn-xs glyphicon glyphicon-trash"></button>
                              </td>
                            </tr>
                            <tr>
                              <td>GHNS</td>
                              <td>IT02</td>
                              <td>Understand best practice and standards and their applications.</td>
                              <td>Computer Programmer</td>
                              <td>2017-06-06 07:01:14</td>
                              <td>0</td>
                              <td>
                                <button class="btn btn-warning btn-xs glyphicon glyphicon-edit" data-toggle="modal" data-target="#addnew"></button>
                                <button class="btn btn-danger btn-xs glyphicon glyphicon-trash"></button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
              <div class="box-footer clearfix">
              <button class="pull-right btn btn-primary" data-toggle="modal" data-target="#addnew">New CLO</button>
            </div>
            <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><strong>New CLO</strong></h4>
                  </div>
                  <form>
                  <div class="modal-body">
                    <form>
                      <div class="form-group">
                        <label for="pga">Course Learning Attributes</label>
                        <input type="text" class="form-control" id="pga" placeholder="Attributes" name="pgan">
                      </div>
                      <div class="form-group">
                        <label for="pgc">Course Learning Code</label>
                        <input type="text" class="form-control" id="pgc" placeholder="Code" name="pgcn">
                      </div>
                      <div class="form-group">
                        <label for="pgo">Course Learning Outcomes</label>
                        <textarea rows="1" class="form-control" id="pgo" placeholder="Outcomes"  name="pgon"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="course">Subject</label>
                        <select class="form-control input-xs pgocourse" name="pgocourse" id="pgocourse" required>
                          <option></option>
                          <option>Computer Programmer</option>
                          <option>Computer Fundamentals</option>
                          <option>Network Security</option>
                        </select>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" onclick="add()" class="btn btn-primary">Save</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
  </div>
<?php
include('footer.php'); 
?>
</body>
</html>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script>
  $('#cpgo').dataTable();
</script>