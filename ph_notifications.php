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
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h3 class="box-title">TQ Notification</h3>
            </div>
            <div class="box-body no-padding">
              <?php
              // $addsubyear=date("Y");
              // $addsubmonth=date("F");
              // if ($addsubmonth=="May" or$addsubmonth=="June" or $addsubmonth=="July" or $addsubmonth=="August" or $addsubmonth=="September" or $addsubmonth=="October" or $addsubmonth=="November" or $addsubmonth=="December"){
              //     $addsubyear1=$addsubyear;
              //     $addsubyear2=$addsubyear+1;
                  
              //     if ($addsubmonth=="May" or$addsubmonth=="June" or $addsubmonth=="July" or $addsubmonth=="August" or $addsubmonth=="September" or $addsubmonth=="October"){
              //     $sem="1st";
              //     }else{
              //       $sem="2nd";
              //     }
              // }else{
              //     $addsubyear1=$addsubyear-1;
              //     $addsubyear2=$addsubyear;
              //     if ($addsubmonth=="May" or$addsubmonth=="June" or $addsubmonth=="July" or $addsubmonth=="August" or $addsubmonth=="September" or $addsubmonth=="October"){
              //     $sem="1st";
              //     }else{
              //       $sem="2nd";
              //     }
              // }
              // $sy=$addsubyear1."-".$addsubyear2;
              $datab = mysqli_connect("localhost", "root", "", "testbank");
              if($datab === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
              }
              $sql = "SELECT semester.semester, school_year.sy, `subject`.subj_code, `subject`.subj_name, tqstatus.status_desc, tqstatus.date_time, tqstatus.revise_count, major_exams.exam_period FROM employment INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id WHERE employment.employment_id = '$login_id' ORDER BY school_year.sy DESC, semester.semester ASC";
              if($result = mysqli_query($datab, $sql)){
                if(mysqli_num_rows($result) > 0){
                  echo "<table class='table table-hover table-striped'>";
                  echo "<tr>";
                  echo "<th>Subject Name</th>";
                  echo "<th>S.Y.</th>";
                  echo "<th>Semester</th>";
                  echo "<th>Revise Count</th>";
                  echo "<th>Period</th>";
                  echo "<th>TQ/TOS Status</th>";
                  echo "</tr>";
                  while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>" . $row['subj_name'] . "</td>";
                    echo "<td>" . $row['sy'] . "</td>";
                    echo "<td>" . $row['semester'] . "</td>";
                    echo "<td>" . $row['revise_count'] . "</td>";
                    echo "<td>" . $row['exam_period'] . "</td>";
                    echo "<td>" . $row['status_desc'] . "</td>";   
                    echo "</tr>";
                  }
                  echo "</table>";
                  mysqli_free_result($result);
                  }else{
                    echo "No records match your query were found.";
                  }
                }else{
                  echo "ERROR: Could not able to execute $sql. " . mysqli_error($datab);
                }
                mysqli_close($datab);
              ?>
            </div>
          </div>       
        </section>
        <section class="col-lg-6">
          <div class="box box-primary" >
            <div class="box-header with-border">
              <h3 class="box-title">Syllabus Notification</h3>
            </div>
            <div class="box-body no-padding">
              <?php
             // $addsubyear=date("Y");
             //  $addsubmonth=date("F");
             //  if ($addsubmonth=="May" or$addsubmonth=="June" or $addsubmonth=="July" or $addsubmonth=="August" or $addsubmonth=="September" or $addsubmonth=="October" or $addsubmonth=="November" or $addsubmonth=="December"){
             //      $addsubyear1=$addsubyear;
             //      $addsubyear2=$addsubyear+1;
                  
             //      if ($addsubmonth=="May" or$addsubmonth=="June" or $addsubmonth=="July" or $addsubmonth=="August" or $addsubmonth=="September" or $addsubmonth=="October"){
             //      $sem="1st";
             //      }else{
             //        $sem="2nd";
             //      }
             //  }else{
             //      $addsubyear1=$addsubyear-1;
             //      $addsubyear2=$addsubyear;
             //      if ($addsubmonth=="May" or$addsubmonth=="June" or $addsubmonth=="July" or $addsubmonth=="August" or $addsubmonth=="September" or $addsubmonth=="October"){
             //      $sem="1st";
             //      }else{
             //        $sem="2nd";
             //      }
             //  }
             //  $sy=$addsubyear1."-".$addsubyear2;
              $datab = mysqli_connect("localhost", "root", "", "testbank");
              if($datab === false){
                die("ERROR: Could not connect. " . mysqli_connect_error());
              }
              $sql = "SELECT semester.semester, school_year.sy, `subject`.subj_code, `subject`.subj_name, syllabusstatus.syll_date_time, syllabusstatus.syll_rev_count, syllabusstatus.syll_status_desc FROM employment INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id WHERE employment.employment_id = '$login_id' ORDER BY school_year.sy DESC, semester.semester ASC";
              if($result = mysqli_query($datab, $sql)){
                if(mysqli_num_rows($result) > 0){
                  echo "<table class='table table-hover table-striped'>";
                  echo "<tr>";
                  echo "<th>Subject Name</th>";
                  echo "<th>S.Y.</th>";
                  echo "<th>Semester</th>";
                  echo "<th>Revise Count</th>";
                  echo "<th>Syllabus Status</th>";
                  echo "</tr>";
                  while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>" . $row['subj_name'] . "</td>";
                    echo "<td>" . $row['sy'] . "</td>";
                    echo "<td>" . $row['semester'] . "</td>";
                    echo "<td>" . $row['syll_rev_count'] . "</td>";
                    echo "<td>" . $row['syll_status_desc'] . "</td>";   
                    echo "</tr>";
                  }
                  echo "</table>";
                  mysqli_free_result($result);
                  }else{
                    echo "No records match your query were found.";
                  }
                }else{
                  echo "ERROR: Could not able to execute $sql. " . mysqli_error($datab);
                }
                mysqli_close($datab);
              ?>
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