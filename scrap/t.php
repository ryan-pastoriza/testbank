<?php
include('header.php'); 
include 'class.php';
$class = new testbank();
if ( !empty ( $_GET ) ) {
  $subj_id=$_GET['subj_id'];
  $emp_id=$_GET['emp_id'];
  $class->loaddb();
  $sql = "SELECT sched_subj.ss_id, `subject`.subj_id, `subject`.subj_code, `subject`.subj_name, `subject`.subj_desc, unit_lecture.unit, syllabus.syllabus_id FROM sched_subj INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN unit_lecture ON unit_lecture.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id WHERE sched_subj.employment_id = $emp_id AND subject.subj_id = $subj_id ";
  $result = mysql_query($sql);
      while($row=mysql_fetch_array($result)){
        $ss_id=$row['ss_id'];
        $subj_id1=$row['subj_id'];
        $subj_code1=$row['subj_code'];
        $subj_name1=$row['subj_name'];
        $subj_desc1=$row['subj_desc'];
        $unit1=$row['unit'];
        $syllabus_id=$row2['syllabus_id'];
        echo $syllabus_id."dfgdf";
      }
       
}
?>