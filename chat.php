<?php
include('header.php'); 
require_once('testcon.php');
include 'class.php';
$class = new testbank();
?>




<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php

include ('headernotification.php');
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
          <a href="instructor_index.php">
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
          </a>
        </li>
        <li id="syllabus_tab">
          <a href="syllabus_index.php">
            <i class="glyphicon glyphicon-pencil"></i><span>Syllabus</span>
          </a>
        </li>
        <li id="tq_tab">
          <a href="tq_index.php">
            <i class="glyphicon glyphicon-list-alt"></i> <span>Test Questionnaire</span>
          </a>
        </li>
        <li id="notification_tab">
          <a href="instructor_notifications.php">
            <i class="fa fa-bell-o"></i> 
            <span class="pull-right-container">
              <small class="label label-primary" id="count5"></small>
            </span>
            <span>Notifications</span>
          </a>
        </li>
        <li id="reports_tab">
          <a href="instructor_reports.php">
            <i class="fa fa-folder"></i> <span>Reports</span>
          </a>
        </li>
        <li id="setdate_tab">
          <a href="instructor_setdeadline.php"><i class="glyphicon glyphicon-calendar">
            </i> <span>Set Date Submission</span></a>
        </li>
        <li class="active" >
          <a href="chat.php"><i class="fa fa-wechat">
            </i> <span>Messenger</span></a>
        </li>
      </ul>
    </section>
  </aside>
    <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <section class="col-lg-3">
        <div class="row"> 
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">User List </h3>
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding" >
              <ul class="nav nav-stacked" >
              

              <?php
              $id = $user_id;
         
         $q = mysqli_query($conn, "SELECT
user_access.user_id,
user_access.username,
user_access.`password`,
user_access.position,
user_access.employment_id,
employment.employment_id,
employment.employment_status,
employment.employment_job_title,
employment.employee_id,
employment.department_id,
employees.employee_id,
employees.employee_fname,
employees.employee_mname,
employees.employee_lname,
employees.employee_ext,
department.department_id,
department.department_name,
department.department_status
FROM
user_access
INNER JOIN employment ON user_access.employment_id = employment.employment_id
INNER JOIN employees ON employment.employee_id = employees.employee_id
INNER JOIN department ON employment.department_id = department.department_id
 WHERE user_id!='$user_id'");
        
          while($row = mysqli_fetch_assoc($q)){
            
            echo "<li><a href='chat.php?id={$row['user_id']}'>{$row['employee_fname']} {$row['employee_mname']} {$row['employee_lname']} {$row['employee_ext']} {$row['employment_job_title']}</a></li>";
          }
?>
            </ul>
            </div>
          </div>
        </div>
      </div>
      
        </section>
        <section class="col-lg-9">
          <div class="box">
            <div class="row">
        <div class="col-md-12">
          <div class="box box-danger direct-chat direct-chat-primary" >
            <div class="box-header with-border" >
              <h3 class="box-title">
          <?php 
          if(isset($_GET['id'])){
          $user_id2 = $_GET['id'];
         $q = mysqli_query($conn, "SELECT
user_access.user_id,
user_access.username,
user_access.`password`,
user_access.position,
user_access.employment_id,
employment.employment_id,
employment.employment_status,
employment.employment_job_title,
employment.employee_id,
employment.department_id,
employees.employee_id,
employees.employee_fname,
employees.employee_mname,
employees.employee_lname,
employees.employee_ext,
department.department_id,
department.department_name,
department.department_status
FROM
user_access
INNER JOIN employment ON user_access.employment_id = employment.employment_id
INNER JOIN employees ON employment.employee_id = employees.employee_id
INNER JOIN department ON employment.department_id = department.department_id
 WHERE user_id='$user_id2'");
        
          while($row = mysqli_fetch_assoc($q)){
            
            echo "{$row['employee_fname']} {$row['employee_mname']} {$row['employee_lname']} {$row['employee_ext']} {$row['employment_job_title']}</a>";
          } } ?></h3>

              <div class="box-tools pull-right">
                
              </div>
            </div>
            <div class="box-body">
              <div class="direct-chat-messages"style="height:375px">
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix" id="display" >
                    <?php
        if(isset($_GET['id'])){
            $user_id;
            $user_two = trim(mysqli_real_escape_string($conn, $_GET['id']));
            $q = mysqli_query($conn, "SELECT `user_id` FROM `user_access` WHERE user_id='$user_two' AND user_id!='$user_id'");
            if(mysqli_num_rows($q) == 1){
                $conver = mysqli_query($conn, "SELECT * FROM `conversation` WHERE (user_id='$user_id' AND user_two='$user_two') OR (user_id='$user_two' AND user_two='$user_id')");
                if(mysqli_num_rows($conver) == 1){

                    $fetch = mysqli_fetch_assoc($conver);
                    $conver_id = $fetch['conver_id'];
                }else{ 
                    $q = mysqli_query($conn, "INSERT INTO `conversation` VALUES ('', '$user_two', '$user_id')");
                    $conver_id = mysqli_insert_id($conn);
                }
            }else{
                die("Invalid $_GET user_id.");
            } 
         }else{
          echo("Click Users On The List To Start Chatting!");
         }
?>
                </div>
              <div >
            </div>
          </div>
        </div>
          <div class="box-footer">
            <div class="input-group">
              <input type="hidden" id="conver_id" value="<?php echo base64_encode($conver_id); ?>">
              <input type="hidden" id="from" value="<?php echo base64_encode($user_id); ?>">
              <input type="hidden" id="to" value="<?php echo base64_encode($user_two); ?>">
              <textarea class="form-control" id="message" placeholder="Enter Your Message"></textarea>
              <span class="input-group-btn">
              <button class="btn btn-primary" id="reply">Send</button> 
              </span>
              </div>
            </div>
          <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
          <script type="text/javascript" src="bootstrap/js/script.js"></script> 
        </div>
      </div>  
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

