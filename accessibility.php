<?php
include('header.php'); 
include 'class.php';
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
$class->loaddb();
$sql = 'SELECT employment.employment_id, employees.employee_id, department.department_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, employees.employee_mobile, department.department_name, employment.employment_status, employment.employment_job_title
FROM employment INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id';
  if (isset($_POST['search'])) {
    $searchterm = $_POST['searchbox'];
    $sql .=" WHERE employee_fname LIKE '%{$searchterm}%'";
    $sql .=" OR employee_mname LIKE '%{$searchterm}%'";
    $sql .=" OR employee_lname LIKE '%{$searchterm}%'";
  }
    $sql .=" ORDER BY department.department_name ASC";
  
  
  $result = mysql_query($sql) or die(mysql_error());

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
        <li id="dashboard_tab">
          <a href="admin_index.php">
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
          </a>
        </li>
       <li class="active" id="access_tab">
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
    <section class="content">
        <div class="box box-primary">
        
            <div class="box-header">
              <h3 class="box-title"><strong>Accessibilty</strong></h3>

              <div class="box-tools">
              <form action="accessibility.php" method="post" >
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="searchbox" class="form-control pull-right" placeholder="Search last name">

                  <div class="input-group-btn">
                    <button type="submit" name="search" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding" >
                
              <input type="hidden" name="admin_id" class="form-control" value="<?php echo "$id_session"; ?>">
              <table class="table table-hover">
                <tr>
                  <th class="col-xs-2">Name</th>
                  <th class="col-xs-1">Contact</th>
                  <th class="col-xs-1">Username</th>
                  <th class="col-xs-1">Password</th>
                  <th class="col-xs-1">Position</th>
                  <th class="col-xs-1">Sylabus</th>
                  <th class="col-xs-1">TQ</th>
                  <th class="col-xs-1">Notification</th>
                  <th class="col-xs-1">Queue</th>
                  <th class="col-xs-1">Reports</th>
                  <th class="col-xs-1">Set Date</th>
                </tr>

                <?php
                
                  while($row=mysql_fetch_array($result)){
                    $emp_id=$row['employment_id'];
                    $emp_fname=utf8_encode($row['employee_fname']);
                    $emp_mname=utf8_encode($row['employee_mname']);
                    $emp_lname=utf8_encode($row['employee_lname']);
                    $emp_ext=$row['employee_ext'];
                    $emp_mobile=$row['employee_mobile'];
                    $department_name=$row['department_name'];
                    $emp_job=$row['employment_job_title'];
                    $emp_status=$row['employment_status'];
                    if (stripos($emp_job,"Dean") !== false) {
                      $lblcolor="danger";
                    }
                    elseif (stripos($emp_job,"Program Head") !== false) {
                      $lblcolor="warning";
                    }
                    elseif (stripos($emp_job,"Instructor") !== false) {
                      $lblcolor="primary";
                    }else{
                      $lblcolor="success";
                    }

                    $sql2 = "SELECT * FROM user_access WHERE employment_id = '".$emp_id."'";
                    $result2 = mysql_query($sql2);
                    if(mysql_num_rows($result2)==0){
                      echo '<tr><td><input type="hidden" name="id[]" class="form-control" value="'.$emp_id.'">'.$emp_lname.', '.$emp_fname.'  ('.$department_name.')</td>
                                 <td><input type="text" name="contact[]" class="form-control" id="contact[]" value="'.$emp_mobile.'"></td>
                                 <td><input type="text" name="username[]" class="form-control" id="username[]" placeholder="username"></td>
                                 <td><input type="text" name="password[]" class="form-control" id="password[]" placeholder="password"></td>
                                 <td><input type="hidden" name="position[]" class="form-control" id="position[]" value="'.$emp_job.'"><span class="col-xs-12 label label-'.$lblcolor.'">'.$emp_job.'</span></td>
                           <td><input type="checkbox" class="minimal" name="syllabus'.$emp_id.'" value="checked"></td>
                               <td><input type="checkbox" class="minimal" name="tq'.$emp_id.'" value="checked"></td>
                               <td><input type="checkbox" class="minimal" name="notification'.$emp_id.'" value="checked"></td>';
                      if (strpos($emp_job, 'Instructor') !== false) {
                        echo '<td></td>
                               <td></td>
                               <td></td></tr>';
                      }else if(strpos($emp_job, 'Program Head') !== false){
                        echo '<td><input type="checkbox" class="minimal" name="queue'.$emp_id.'" value="checked"></td>
                               <td><input type="checkbox" class="minimal" name="reports'.$emp_id.'" value="checked"></td>
                               <td></td></tr>'; 
                      }else if(strpos($emp_job, 'Dean') !== false){
                        echo '<td><input type="checkbox" class="minimal" name="queue'.$emp_id.'" value="checked"></td>
                               <td><input type="checkbox" class="minimal" name="reports'.$emp_id.'" value="checked"></td>
                               <td><input type="checkbox" class="minimal" name="setdate'.$emp_id.'" value="checked"></td></tr>';
                      }

                        
                    }else{
                      $sql3 = "SELECT * FROM user_access WHERE employment_id = '".$emp_id."'";
                      $result3 = mysql_query($sql3);
                      while($rows=mysql_fetch_array($result3)){
                        $syllabus=$rows['syllabus'];
                        $tq=$rows['tq'];
                        $notification=$rows['notification'];
                        $queue=$rows['queue'];
                        $reports=$rows['reports'];
                        $setdate=$rows['setdate'];
                        $position=$rows['position'];
                        $lblcolor="";
                        if (strpos($emp_job, 'Instructor') !== false) {
                          $lblcolor="primary";
                        }
                        elseif(strpos($emp_job, 'Program Head') !== false) {
                          $lblcolor="warning";
                        }
                        elseif (strpos($emp_job, 'Dean') !== false) {
                          $lblcolor="danger";
                        }else{
                          $lblcolor="success";
                        }

                        
                        echo '<tr><td><input type="hidden" name="id[]" class="form-control" value="'.$emp_id.'">'.$emp_lname.', '.$emp_fname.'  ('.$department_name.')</td>
                                     <td><input type="text" name="contact[]" class="form-control" id="contact[]" value="'.$rows['contact'].' "></td>
                                   <td><input type="text" name="username[]" class="form-control" id="username[]" value="'.$rows['username'].'"></td>
                                   <td><input type="text" name="password[]" class="form-control" id="password[]" value="'.$rows['password'].'"></td>
                                   <td><input type="hidden" name="position[]" class="form-control" id="position[]" value="'.$emp_job.'"><span class="col-xs-12 label label-'.$lblcolor.'">'.$rows['position'].'</span></td>
                             <td><input type="checkbox" class="minimal" name="syllabus'.$emp_id.'" value="checked" '.$syllabus.'></td>
                                 <td><input type="checkbox" class="minimal" name="tq'.$emp_id.'" value="checked" '.$tq.'></td>
                                 <td><input type="checkbox" class="minimal" name="notification'.$emp_id.'" value="checked" '.$notification.'></td>';
                                if (strpos($emp_job, 'Instructor') !== false) {
                                  echo'<td></td>
                                 <td></td>
                                 <td></td></tr>';
                                }else if(strpos($emp_job, 'Program Head') !== false){
                                 echo'<td><input type="checkbox" class="minimal" name="queue'.$emp_id.'" value="checked" '.$queue.'></td>
                                 <td><input type="checkbox" class="minimal" name="reports'.$emp_id.'" value="checked" '.$reports.'></td>
                                 <td></td></tr>';
                                }else if(strpos($emp_job, 'Dean') !== false){
                                  echo'<td><input type="checkbox" class="minimal" name="queue'.$emp_id.'" value="checked" '.$queue.'></td>
                                 <td><input type="checkbox" class="minimal" name="reports'.$emp_id.'" value="checked" '.$reports.'></td>
                                 <td><input type="checkbox" class="minimal" name="setdate'.$emp_id.'" value="checked" '.$setdate.'></td></tr>';
                                }
                      }
                    
                    }
                  }                   
                
                
                $class->sqlclose();
                ?>

              </table>
            </div>
            <div class="box-footer clearfix">
              <button type="submit" class="pull-right btn btn-default" name="save">
                <i class="glyphicon glyphicon-floppy-save"></i> Save </button>
                <?php
                if(isset($_POST['save'])){
                   $class->saveaccess();
                }
                ?>
            </form>
              
            </div>
        </div>
    </section>
  </div>
<?php
include('footer.php'); 
?>
</body>
</html>
