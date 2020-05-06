<?php 
  $class->loaddb();
  $month=date("F");
  $year=date("Y");
  $var=100;
  $prelimtotal=0;
  $prelimtotal1=0;
  $prelimtotal2=0;
  $prelimtotal3=0;
  $midtermtotal=0;
  $midtermtotal1=0;
  $midtermtotal2=0;
  $midtermtotal3=0;
  $prefinaltotal=0;
  $prefinaltotal1=0;
  $prefinaltotal2=0;
  $prefinaltotal3=0;
  $finaltotal=0;
  $finaltotal1=0;
  $finaltotal2=0;
  $finaltotal3=0;
  $poptotal=0;

  if ($month=="August" or $month=="September" or $month=="October" or $month=="November" or $month=="December") {
    $semester= 1;
    $yr=$year."-";
  }else if ( $month=="January" or $month=="February" or $month=="March" or $month=="April" or $month=="May") {
    $semester= 2;
    $yr="-".$year;
  }
    $sql1="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '1' AND (tqstatus.status_desc = 'for printing' OR tqstatus.status_desc = 'Printed') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'ITE'";
    $result1=mysql_query($sql1);
    if (mysql_num_rows($result1)==0) {
      $ITEPrelim=0;
    }else{
      $ITEPrelim=mysql_num_rows($result1);
    }
    $prelimtotal+=$ITEPrelim;

    $sql2="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '2' AND (tqstatus.status_desc = 'for printing' OR tqstatus.status_desc = 'Printed') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'ITE'";
    $result2=mysql_query($sql2);
    if (mysql_num_rows($result2)==0) {
      $ITEMidterm=0;
    }else{
      $ITEMidterm=mysql_num_rows($result2);
    }
    $midtermtotal+=$ITEMidterm;
    $sql3="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '3' AND (tqstatus.status_desc = 'for printing' OR tqstatus.status_desc = 'Printed') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'ITE'";
    $result3=mysql_query($sql3);
    if (mysql_num_rows($result3)==0) {
      $ITEPrefinal=0;
    }else{
      $ITEPrefinal=mysql_num_rows($result3);
    }
    $prefinaltotal+=$ITEPrefinal;
    $sql4="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '4' AND (tqstatus.status_desc = 'for printing' OR tqstatus.status_desc = 'Printed') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'ITE'";
    $result4=mysql_query($sql4);
    if (mysql_num_rows($result4)==0) {
      $ITEFinal=0;
    }else{
      $ITEFinal=mysql_num_rows($result4);
    }
    $finaltotal+=$ITEFinal;


    $sql1="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '1' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count = 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'ITE'";
    $result1=mysql_query($sql1);
    if (mysql_num_rows($result1)==0) {
      $ITEPrelim1=0;
    }else{
      $ITEPrelim1=mysql_num_rows($result1);
    }
    $prelimtotal1+=$ITEPrelim1;
    $sql2="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '2' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count = 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'ITE'";
    $result2=mysql_query($sql2);
    if (mysql_num_rows($result2)==0) {
      $ITEMidterm1=0;
    }else{
      $ITEMidterm1=mysql_num_rows($result2);
    }
    $midtermtotal1+=$ITEMidterm1;
    $sql3="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '3' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count = 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'ITE'";
    $result3=mysql_query($sql3);
    if (mysql_num_rows($result3)==0) {
      $ITEPrefinal1=0;
    }else{
      $ITEPrefinal1=mysql_num_rows($result3);
    }
    $prefinaltotal1+=$ITEPrefinal1;
    $sql4="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '4' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count = 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'ITE'";
    $result4=mysql_query($sql4);
    if (mysql_num_rows($result4)==0) {
      $ITEFinal1=0;
    }else{
      $ITEFinal1=mysql_num_rows($result4);
    }
    $finaltotal1+=$ITEFinal1;

    
    $sql1="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '1' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count > 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'ITE'";
    $result1=mysql_query($sql1);
    if (mysql_num_rows($result1)==0) {
      $ITEPrelim2=0;
    }else{
      $ITEPrelim2=mysql_num_rows($result1);
    }
    $prelimtotal2+=$ITEPrelim2;
    $sql2="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '2' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count > 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'ITE'";
    $result2=mysql_query($sql2);
    if (mysql_num_rows($result2)==0) {
      $ITEMidterm2=0;
    }else{
      $ITEMidterm2=mysql_num_rows($result2);
    }
    $midtermtotal2+=$ITEMidterm2;
    $sql3="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '3' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count > 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'ITE'";
    $result3=mysql_query($sql3);
    if (mysql_num_rows($result3)==0) {
      $ITEPrefinal2=0;
    }else{
      $ITEPrefinal2=mysql_num_rows($result3);
    }
    $prefinaltotal2+=$ITEPrefinal2;
    $sql4="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '4' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count > 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'ITE'";
    $result4=mysql_query($sql4);
    if (mysql_num_rows($result4)==0) {
      $ITEFinal2=0;
    }else{
      $ITEFinal2=mysql_num_rows($result4);
    }
    $finaltotal2+=$ITEFinal2;
    $sql1="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '1' AND (tqstatus.status_desc = 'queue for ph' OR tqstatus.status_desc = 'queue for dean') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'ITE'";
    $result1=mysql_query($sql1);
    if (mysql_num_rows($result1)==0) {
      $ITEPrelim3=0;
    }else{
      $ITEPrelim3=mysql_num_rows($result1);
    }
    $prelimtotal3+=$ITEPrelim3;
    $sql2="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '2' AND (tqstatus.status_desc = 'queue for ph' OR tqstatus.status_desc = 'queue for dean') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'ITE'";
    $result2=mysql_query($sql2);
    if (mysql_num_rows($result2)==0) {
      $ITEMidterm3=0;
    }else{
      $ITEMidterm3=mysql_num_rows($result2);
    }
    $midtermtotal3+=$ITEMidterm3;
    $sql3="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '3' AND (tqstatus.status_desc = 'queue for ph' OR tqstatus.status_desc = 'queue for dean') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'ITE'";
    $result3=mysql_query($sql3);
    if (mysql_num_rows($result3)==0) {
      $ITEPrefinal3=0;
    }else{
      $ITEPrefinal3=mysql_num_rows($result3);
    }
    $prefinaltotal3+=$ITEPrefinal3;
    $sql4="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '4' AND (tqstatus.status_desc = 'queue for ph' OR tqstatus.status_desc = 'queue for dean') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'ITE'";
    $result4=mysql_query($sql4);
    if (mysql_num_rows($result4)==0) {
      $ITEFinal3=0;
    }else{
      $ITEFinal3=mysql_num_rows($result4);
    }
    $finaltotal3+=$ITEFinal3;

    $sql5="SELECT employees.employee_id FROM employees INNER JOIN employment ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id WHERE department.department_name = 'ITE' AND employment.employment_status = 'active'";
    $result5=mysql_query($sql5);
    if (mysql_num_rows($result5)==0) {
      $ITEpop=0;
    }else{
      $ITEpop=mysql_num_rows($result5);
    }

    $sql51="SELECT employees.employee_id FROM employees INNER JOIN employment ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE department.department_name <> 'ITE' AND employment.employment_status = 'active' AND school_year.sy LIKE '%$yr%' AND sched_subj.sy_id = '".$semester."' AND sched_subj.department = 'ITE'";
    $result51=mysql_query($sql51);
    if (mysql_num_rows($result51)==0) {
      $ITEpop+=0;
    }else{
      $ITEpop+=mysql_num_rows($result51);
    }

    $tsql51="SELECT employees.employee_id FROM employees INNER JOIN employment ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id WHERE (department.department_name = 'ITE' OR department.department_name = 'BA' OR department.department_name = 'GEN' OR department.department_name = 'SHS') AND employment.employment_status = 'active' ";
    $tresult51=mysql_query($tsql51);
    if (mysql_num_rows($tresult51)==0) {
      $poptotal+=0;
    }else{
      $poptotal+=mysql_num_rows($tresult51);
    }




    $sql1="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '1' AND (tqstatus.status_desc = 'for printing' OR tqstatus.status_desc = 'Printed') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'BA'";
    $result1=mysql_query($sql1);
    if (mysql_num_rows($result1)==0) {
      $BAPrelim=0;
    }else{
      $BAPrelim=mysql_num_rows($result1);
    }
    $prelimtotal+=$BAPrelim;
    $sql2="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '2' AND (tqstatus.status_desc = 'for printing' OR tqstatus.status_desc = 'Printed') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'BA'";
    $result2=mysql_query($sql2);
    if (mysql_num_rows($result2)==0) {
      $BAMidterm=0;
    }else{
      $BAMidterm=mysql_num_rows($result2);
    }
    $midtermtotal+=$BAMidterm;
    $sql3="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '3' AND (tqstatus.status_desc = 'for printing' OR tqstatus.status_desc = 'Printed') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'BA'";
    $result3=mysql_query($sql3);
    if (mysql_num_rows($result3)==0) {
      $BAPrefinal=0;
    }else{
      $BAPrefinal=mysql_num_rows($result3);
    }
    $prefinaltotal+=$BAPrefinal;
    $sql4="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '4' AND (tqstatus.status_desc = 'for printing' OR tqstatus.status_desc = 'Printed') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'BA'";
    $result4=mysql_query($sql4);
    if (mysql_num_rows($result4)==0) {
      $BAFinal=0;
    }else{
      $BAFinal=mysql_num_rows($result4);
    }
    $finaltotal+=$BAFinal;


    $sql1="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '1' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count = 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'BA'";
    $result1=mysql_query($sql1);
    if (mysql_num_rows($result1)==0) {
      $BAPrelim1=0;
    }else{
      $BAPrelim1=mysql_num_rows($result1);
    }
    $prelimtotal1+=$BAPrelim1;
    $sql2="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '2' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count = 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'BA'";
    $result2=mysql_query($sql2);
    if (mysql_num_rows($result2)==0) {
      $BAMidterm1=0;
    }else{
      $BAMidterm1=mysql_num_rows($result2);
    }
    $midtermtotal1+=$BAMidterm1;
    $sql3="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '3' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count = 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'BA'";
    $result3=mysql_query($sql3);
    if (mysql_num_rows($result3)==0) {
      $BAPrefinal1=0;
    }else{
      $BAPrefinal1=mysql_num_rows($result3);
    }
    $prefinaltotal1+=$BAPrefinal1;
    $sql4="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '4' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count = 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'BA'";
    $result4=mysql_query($sql4);
    if (mysql_num_rows($result4)==0) {
      $BAFinal1=0;
    }else{
      $BAFinal1=mysql_num_rows($result4);
    }
    $finaltotal1+=$BAFinal1;

    
    $sql1="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '1' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count > 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'BA'";
    $result1=mysql_query($sql1);
    if (mysql_num_rows($result1)==0) {
      $BAPrelim2=0;
    }else{
      $BAPrelim2=mysql_num_rows($result1);
    }
    $prelimtotal2+=$BAPrelim2;
    $sql2="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '2' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count > 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'BA'";
    $result2=mysql_query($sql2);
    if (mysql_num_rows($result2)==0) {
      $BAMidterm2=0;
    }else{
      $BAMidterm2=mysql_num_rows($result2);
    }
    $midtermtotal2+=$BAMidterm2;
    $sql3="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '3' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count > 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'BA'";
    $result3=mysql_query($sql3);
    if (mysql_num_rows($result3)==0) {
      $BAPrefinal2=0;
    }else{
      $BAPrefinal2=mysql_num_rows($result3);
    }
    $prefinaltotal2+=$BAPrefinal2;
    $sql4="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '4' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count > 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'BA'";
    $result4=mysql_query($sql4);
    if (mysql_num_rows($result4)==0) {
      $BAFinal2=0;
    }else{
      $BAFinal2=mysql_num_rows($result4);
    }
    $finaltotal2+=$BAFinal2;
        
    $sql1="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '1' AND (tqstatus.status_desc = 'queue for ph' OR tqstatus.status_desc = 'queue for dean') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'BA'";
    $result1=mysql_query($sql1);
    if (mysql_num_rows($result1)==0) {
      $BAPrelim3=0;
    }else{
      $BAPrelim3=mysql_num_rows($result1);
    }
    $prelimtotal3+=$BAPrelim3;
    $sql2="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '2' AND (tqstatus.status_desc = 'queue for ph' OR tqstatus.status_desc = 'queue for dean') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'BA'";
    $result2=mysql_query($sql2);
    if (mysql_num_rows($result2)==0) {
      $BAMidterm3=0;
    }else{
      $BAMidterm3=mysql_num_rows($result2);
    }
    $midtermtotal3+=$BAMidterm3;

    $sql3="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '3' AND (tqstatus.status_desc = 'queue for ph' OR tqstatus.status_desc = 'queue for dean') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'BA'";
    $result3=mysql_query($sql3);
    if (mysql_num_rows($result3)==0) {
      $BAPrefinal3=0;
    }else{
      $BAPrefinal3=mysql_num_rows($result3);
    }
    $prefinaltotal3+=$BAPrefinal3;
    $sql4="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '4' AND (tqstatus.status_desc = 'queue for ph' OR tqstatus.status_desc = 'queue for dean') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'BA'";
    $result4=mysql_query($sql4);
    if (mysql_num_rows($result4)==0) {
      $BAFinal3=0;
    }else{
      $BAFinal3=mysql_num_rows($result4);
    }
    $finaltotal3+=$BAFinal3;
    $sql6="SELECT employees.employee_id FROM employees INNER JOIN employment ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id WHERE department.department_name = 'BA' AND employment.employment_status = 'active'";
    $result6=mysql_query($sql6);
    if (mysql_num_rows($result6)==0) {
      $BApop=0;
    }else{
      $BApop=mysql_num_rows($result6);
    }

    $sql61="SELECT employees.employee_id FROM employees INNER JOIN employment ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE department.department_name <> 'BA' AND employment.employment_status = 'active' AND school_year.sy LIKE '%$yr%' AND sched_subj.sy_id = '".$semester."' AND sched_subj.department = 'BA'";
    $result61=mysql_query($sql61);
    if (mysql_num_rows($result61)==0) {
      $BApop+=0;
    }else{
      $BApop+=mysql_num_rows($result61);
    }









    $sql1="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '1' AND (tqstatus.status_desc = 'for printing' OR tqstatus.status_desc = 'Printed') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'GEN'";
    $result1=mysql_query($sql1);
    if (mysql_num_rows($result1)==0) {
      $GENPrelim=0;
    }else{
      $GENPrelim=mysql_num_rows($result1);
    }
    $prelimtotal+=$GENPrelim;
    $sql2="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '2' AND (tqstatus.status_desc = 'for printing' OR tqstatus.status_desc = 'Printed') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'GEN'";
    $result2=mysql_query($sql2);
    if (mysql_num_rows($result2)==0) {
      $GENMidterm=0;
    }else{
      $GENMidterm=mysql_num_rows($result2);
    }
    $midtermtotal+=$GENMidterm;
    $sql3="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '3' AND (tqstatus.status_desc = 'for printing' OR tqstatus.status_desc = 'Printed') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'GEN'";
    $result3=mysql_query($sql3);
    if (mysql_num_rows($result3)==0) {
      $GENPrefinal=0;
    }else{
      $GENPrefinal=mysql_num_rows($result3);
    }
    $prefinaltotal+=$GENPrefinal;
    $sql4="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '4' AND (tqstatus.status_desc = 'for printing' OR tqstatus.status_desc = 'Printed') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'GEN'";
    $result4=mysql_query($sql4);
    if (mysql_num_rows($result4)==0) {
      $GENFinal=0;
    }else{
      $GENFinal=mysql_num_rows($result4);
    }
    $finaltotal+=$GENFinal;


    $sql1="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '1' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count = 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'GEN'";
    $result1=mysql_query($sql1);
    if (mysql_num_rows($result1)==0) {
      $GENPrelim1=0;
    }else{
      $GENPrelim1=mysql_num_rows($result1);
    }
    $prelimtotal1+=$GENPrelim1;
    $sql2="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '2' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count = 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'GEN'";
    $result2=mysql_query($sql2);
    if (mysql_num_rows($result2)==0) {
      $GENMidterm1=0;
    }else{
      $GENMidterm1=mysql_num_rows($result2);
    }
    $midtermtotal1+=$GENMidterm1;
    $sql3="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '3' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count = 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'GEN'";
    $result3=mysql_query($sql3);
    if (mysql_num_rows($result3)==0) {
      $GENPrefinal1=0;
    }else{
      $GENPrefinal1=mysql_num_rows($result3);
    }
    $prefinaltotal1+=$GENPrefinal1;
    $sql4="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '4' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count = 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'GEN'";
    $result4=mysql_query($sql4);
    if (mysql_num_rows($result4)==0) {
      $GENFinal1=0;
    }else{
      $GENFinal1=mysql_num_rows($result4);
    }
    $finaltotal1+=$GENFinal1;

    
    $sql1="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '1' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count > 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'GEN'";
    $result1=mysql_query($sql1);
    if (mysql_num_rows($result1)==0) {
      $GENPrelim2=0;
    }else{
      $GENPrelim2=mysql_num_rows($result1);
    }
    $prelimtotal2+=$BAPrelim2;
    $sql2="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '2' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count > 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'GEN'";
    $result2=mysql_query($sql2);
    if (mysql_num_rows($result2)==0) {
      $GENMidterm2=0;
    }else{
      $GENMidterm2=mysql_num_rows($result2);
    }
    $midtermtotal2+=$GENMidterm2;
    $sql3="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '3' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count > 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'GEN'";
    $result3=mysql_query($sql3);
    if (mysql_num_rows($result3)==0) {
      $GENPrefinal2=0;
    }else{
      $GENPrefinal2=mysql_num_rows($result3);
    }
    $prefinaltotal2+=$GENPrefinal2;
    $sql4="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '4' AND (tqstatus.status_desc = 'Pending' AND tqstatus.revise_count > 0) AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'GEN'";
    $result4=mysql_query($sql4);
    if (mysql_num_rows($result4)==0) {
      $GENFinal2=0;
    }else{
      $GENFinal2=mysql_num_rows($result4);
    }
    $finaltotal2+=$GENFinal2;

        
    $sql1="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '1' AND (tqstatus.status_desc = 'queue for ph' OR tqstatus.status_desc = 'queue for dean') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'GEN'";
    $result1=mysql_query($sql1);
    if (mysql_num_rows($result1)==0) {
      $GENPrelim3=0;
    }else{
      $GENPrelim3=mysql_num_rows($result1);
    }
    $prelimtotal3+=$GENPrelim3;
    $sql2="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '2' AND (tqstatus.status_desc = 'queue for ph' OR tqstatus.status_desc = 'queue for dean') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'GEN'";
    $result2=mysql_query($sql2);
    if (mysql_num_rows($result2)==0) {
      $GENMidterm3=0;
    }else{
      $GENMidterm3=mysql_num_rows($result2);
    }
    $midtermtotal3+=$GENMidterm3;
    $sql3="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '3' AND (tqstatus.status_desc = 'queue for ph' OR tqstatus.status_desc = 'queue for dean') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'GEN'";
    $result3=mysql_query($sql3);
    if (mysql_num_rows($result3)==0) {
      $GENPrefinal3=0;
    }else{
      $GENPrefinal3=mysql_num_rows($result3);
    }
    $prefinaltotal3+=$GENPrefinal3;
    $sql4="SELECT tqstatus.status_desc AS count FROM tqstatus INNER JOIN tq ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE major_exams.exam_id = '4' AND (tqstatus.status_desc = 'queue for ph' OR tqstatus.status_desc = 'queue for dean') AND sched_subj.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%' AND sched_subj.department = 'GEN'";
    $result4=mysql_query($sql4);
    if (mysql_num_rows($result4)==0) {
      $GENFinal3=0;
    }else{
      $GENFinal3=mysql_num_rows($result4);
    }
    $finaltotal3+=$GENFinal3;
    $sql6="SELECT employees.employee_id FROM employees INNER JOIN employment ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id WHERE department.department_name = 'GEN' AND employment.employment_status = 'active'";
    $result6=mysql_query($sql6);
    if (mysql_num_rows($result6)==0) {
      $GENpop=0;
    }else{
      $GENpop=mysql_num_rows($result6);
    }

    $sql61="SELECT employees.employee_id FROM employees INNER JOIN employment ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id INNER JOIN sched_subj ON sched_subj.employment_id = employment.employment_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE department.department_name <> 'GEN' AND employment.employment_status = 'active' AND school_year.sy LIKE '%$yr%' AND sched_subj.sy_id = '".$semester."' AND sched_subj.department = 'GEN'";
    $result61=mysql_query($sql61);
    if (mysql_num_rows($result61)==0) {
      $GENpop+=0;
    }else{
      $GENpop+=mysql_num_rows($result61);
    }

    
      



    







    $sqli1="SELECT shs_tq.shs_tq_id as count FROM shs_tq INNER JOIN shs_syll ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id WHERE major_exams.exam_id = '9' AND (shs_tqstatus.shs_status_desc = 'for printing' OR shs_tqstatus.shs_status_desc = 'Printed') AND school_year.sy LIKE '%$yr%'";
    $resulti1=mysql_query($sqli1);
    if (mysql_num_rows($resulti1)==0) {
      $firstq=0;
    }else{
      $firstq=mysql_num_rows($resulti1);
    }
    $prelimtotal+=$firstq;
    $sqli2="SELECT shs_tq.shs_tq_id as count FROM shs_tq INNER JOIN shs_syll ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id WHERE major_exams.exam_id = '10' AND (shs_tqstatus.shs_status_desc = 'for printing' OR shs_tqstatus.shs_status_desc = 'Printed') AND school_year.sy LIKE '%$yr%'";
    $resulti2=mysql_query($sqli2);
    if (mysql_num_rows($resulti2)==0) {
      $secondq=0;
    }else{
      $secondq=mysql_num_rows($resulti2);
    }
    $midtermtotal+=$secondq;
    $sqli3="SELECT shs_tq.shs_tq_id as count FROM shs_tq INNER JOIN shs_syll ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id WHERE major_exams.exam_id = '11' AND (shs_tqstatus.shs_status_desc = 'for printing' OR shs_tqstatus.shs_status_desc = 'Printed') AND school_year.sy LIKE '%$yr%'";
    $resulti3=mysql_query($sqli3);
    if (mysql_num_rows($resulti3)==0) {
      $thirdq=0;
    }else{
      $thirdq=mysql_num_rows($resulti3);
    }
    $prefinaltotal+=$thirdq;
    $sqli4="SELECT shs_tq.shs_tq_id as count FROM shs_tq INNER JOIN shs_syll ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id WHERE major_exams.exam_id = '12' AND (shs_tqstatus.shs_status_desc = 'for printing' OR shs_tqstatus.shs_status_desc = 'Printed') AND school_year.sy LIKE '%$yr%'";
    $resulti4=mysql_query($sqli4);
    if (mysql_num_rows($resulti4)==0) {
      $fourthq=0;
    }else{
      $fourthq=mysql_num_rows($resulti4);
    }
    $finaltotal+=$fourthq;


    $sqli1="SELECT shs_tq.shs_tq_id as count FROM shs_tq INNER JOIN shs_syll ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id WHERE major_exams.exam_id = '9' AND (shs_tqstatus.shs_status_desc = 'pending' OR shs_tqstatus.shs_revise_count = 0) AND school_year.sy LIKE '%$yr%'";
    $resulti1=mysql_query($sqli1);
    if (mysql_num_rows($resulti1)==0) {
      $firstq1=0;
    }else{
      $firstq1=mysql_num_rows($resulti1);
    }
    $prelimtotal1+=$firstq1;
    $sqli2="SELECT shs_tq.shs_tq_id as count FROM shs_tq INNER JOIN shs_syll ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id WHERE major_exams.exam_id = '10' AND (shs_tqstatus.shs_status_desc = 'pending' OR shs_tqstatus.shs_revise_count = 0) AND school_year.sy LIKE '%$yr%'";
    $resulti2=mysql_query($sqli2);
    if (mysql_num_rows($resulti2)==0) {
      $secondq1=0;
    }else{
      $secondq1=mysql_num_rows($resulti2);
    }
    $midtermtotal1+=$secondq1;
    $sqli3="SELECT shs_tq.shs_tq_id as count FROM shs_tq INNER JOIN shs_syll ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id WHERE major_exams.exam_id = '11' AND (shs_tqstatus.shs_status_desc = 'pending' OR shs_tqstatus.shs_revise_count = 0) AND school_year.sy LIKE '%$yr%'";
    $resulti3=mysql_query($sqli3);
    if (mysql_num_rows($resulti3)==0) {
      $thirdq1=0;
    }else{
      $thirdq1=mysql_num_rows($resulti3);
    }
    $prefinaltotal1+=$thirdq1;
    $sqli4="SELECT shs_tq.shs_tq_id as count FROM shs_tq INNER JOIN shs_syll ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id WHERE major_exams.exam_id = '12' AND (shs_tqstatus.shs_status_desc = 'pending' OR shs_tqstatus.shs_revise_count = 0) AND school_year.sy LIKE '%$yr%'";
    $resulti4=mysql_query($sqli4);
    if (mysql_num_rows($resulti4)==0) {
      $fourthq1=0;
    }else{
      $fourthq1=mysql_num_rows($resulti4);
    }
    $finaltotal1+=$fourthq1;

    $sqli1="SELECT shs_tq.shs_tq_id as count FROM shs_tq INNER JOIN shs_syll ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id WHERE major_exams.exam_id = '9' AND (shs_tqstatus.shs_status_desc = 'pending' OR shs_tqstatus.shs_revise_count > 0) AND school_year.sy LIKE '%$yr%'";
    $resulti1=mysql_query($sqli1);
    if (mysql_num_rows($resulti1)==0) {
      $firstq2=0;
    }else{
      $firstq2=mysql_num_rows($resulti1);
    }
    $prelimtotal2+=$firstq2;
    $sqli2="SELECT shs_tq.shs_tq_id as count FROM shs_tq INNER JOIN shs_syll ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id WHERE major_exams.exam_id = '10' AND (shs_tqstatus.shs_status_desc = 'pending' OR shs_tqstatus.shs_revise_count > 0) AND school_year.sy LIKE '%$yr%'";
    $resulti2=mysql_query($sqli2);
    if (mysql_num_rows($resulti2)==0) {
      $secondq2=0;
    }else{
      $secondq2=mysql_num_rows($resulti2);
    }
    $midtermtotal2+=$secondq2;
    $sqli3="SELECT shs_tq.shs_tq_id as count FROM shs_tq INNER JOIN shs_syll ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id WHERE major_exams.exam_id = '11' AND (shs_tqstatus.shs_status_desc = 'pending' OR shs_tqstatus.shs_revise_count > 0) AND school_year.sy LIKE '%$yr%'";
    $resulti3=mysql_query($sqli3);
    if (mysql_num_rows($resulti3)==0) {
      $thirdq2=0;
    }else{
      $thirdq2=mysql_num_rows($resulti3);
    }
   $prefinaltotal2+=$thirdq2;
    $sqli4="SELECT shs_tq.shs_tq_id as count FROM shs_tq INNER JOIN shs_syll ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id WHERE major_exams.exam_id = '12' AND (shs_tqstatus.shs_status_desc = 'pending' OR shs_tqstatus.shs_revise_count > 0) AND school_year.sy LIKE '%$yr%'";
    $resulti4=mysql_query($sqli4);
    if (mysql_num_rows($resulti4)==0) {
      $fourthq2=0;
    }else{
      $fourthq2=mysql_num_rows($resulti4);
    }
    $finaltotal2+=$fourthq2;



    $sqli1="SELECT shs_tq.shs_tq_id as count FROM shs_tq INNER JOIN shs_syll ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id WHERE major_exams.exam_id = '9' AND (shs_tqstatus.shs_status_desc = 'queue for ph' OR shs_tqstatus.shs_status_desc = 'queue for dean') AND school_year.sy LIKE '%$yr%'";
    $resulti1=mysql_query($sqli1);
    if (mysql_num_rows($resulti1)==0) {
      $firstq3=0;
    }else{
      $firstq3=mysql_num_rows($resulti1);
    }
    $prelimtotal3+=$firstq3;
    $sqli2="SELECT shs_tq.shs_tq_id as count FROM shs_tq INNER JOIN shs_syll ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id WHERE major_exams.exam_id = '10' AND (shs_tqstatus.shs_status_desc = 'queue for ph' OR shs_tqstatus.shs_status_desc = 'queue for dean') AND school_year.sy LIKE '%$yr%'";
    $resulti2=mysql_query($sqli2);
    if (mysql_num_rows($resulti2)==0) {
      $secondq3=0;
    }else{
      $secondq3=mysql_num_rows($resulti2);
    }
    $midtermtotal3+=$secondq3;
    $sqli3="SELECT shs_tq.shs_tq_id as count FROM shs_tq INNER JOIN shs_syll ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id WHERE major_exams.exam_id = '11' AND (shs_tqstatus.shs_status_desc = 'queue for ph' OR shs_tqstatus.shs_status_desc = 'queue for dean') AND school_year.sy LIKE '%$yr%'";
    $resulti3=mysql_query($sqli3);
    if (mysql_num_rows($resulti3)==0) {
      $thirdq3=0;
    }else{
      $thirdq3=mysql_num_rows($resulti3);
    }
    $prefinaltotal3+=$thirdq3;
    $sqli4="SELECT shs_tq.shs_tq_id as count FROM shs_tq INNER JOIN shs_syll ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id WHERE major_exams.exam_id = '12' AND (shs_tqstatus.shs_status_desc = 'queue for ph' OR shs_tqstatus.shs_status_desc = 'queue for dean') AND school_year.sy LIKE '%$yr%'";
    $resulti4=mysql_query($sqli4);
    if (mysql_num_rows($resulti4)==0) {
      $fourthq3=0;
    }else{
      $fourthq3=mysql_num_rows($resulti4);
    }
    $finaltotal3+=$fourthq3;







    $sql6="SELECT employees.employee_id FROM employees INNER JOIN employment ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id WHERE department.department_name = 'SHS' AND department.department_status = 'active'";
    $result6=mysql_query($sql6);
    if (mysql_num_rows($result6)==0) {
      $SHSpop=0;
    }else{
      $SHSpop=mysql_num_rows($result6);
    }

    $sql61="SELECT employees.employee_id FROM employees INNER JOIN employment ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id INNER JOIN shs_syll ON shs_syll.employment_id = employment.employment_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id WHERE department.department_name <> 'SHS' AND department.department_status = 'active' AND shs_syll.sem_id = '".$semester."' AND school_year.sy LIKE '%$yr%'";
    $result61=mysql_query($sql61);
    if (mysql_num_rows($result61)==0) {
      $SHSpop+=0;
    }else{
      $SHSpop+=mysql_num_rows($result61);
    }
    



    $sqlq1="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE '%Identification%'";
    $resultq1=mysql_query($sqlq1);
    while ($row=mysql_fetch_array($resultq1)) {
      $iden=$row['count'];
    }
    $sqlq2="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE '%Enumeration%'";
    $resultq2=mysql_query($sqlq2);
    while ($row=mysql_fetch_array($resultq2)) {
      $enu=$row['count'];
    }
    $sqlq3="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE '%Matching Type%'";
    $resultq3=mysql_query($sqlq3);
    while ($row=mysql_fetch_array($resultq3)) {
      $match=$row['count'];
    }
    $sqlq4="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE '%Problem Solving%'";
    $resultq4=mysql_query($sqlq4);
    while ($row=mysql_fetch_array($resultq4)) {
      $prob=$row['count'];
    }
    $sqlq5="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE '%Essay%'";
    $resultq5=mysql_query($sqlq5);
    while ($row=mysql_fetch_array($resultq5)) {
      $essay=$row['count'];
    }
    $sqlq6="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE 'True or False'";
    $resultq6=mysql_query($sqlq6);
    while ($row=mysql_fetch_array($resultq6)) {
      $tof=$row['count'];
    }
    $sqlq7="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE '%Fill in the Blank%'";
    $resultq7=mysql_query($sqlq7);
    while ($row=mysql_fetch_array($resultq7)) {
      $fitb=$row['count'];
    }
    $sqlq8="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE '%Multiple Choice%'";
    $resultq8=mysql_query($sqlq8);
    while ($row=mysql_fetch_array($resultq8)) {
      $multi=$row['count'];
    }
    $sqlq9="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE '%Analogy%'";
    $resultq9=mysql_query($sqlq9);
    while ($row=mysql_fetch_array($resultq9)) {
      $ana=$row['count'];
    }
    $sqlq11="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE 'Modified True or False'";
    $resultq11=mysql_query($sqlq11);
    while ($row=mysql_fetch_array($resultq11)) {
      $mtof=$row['count'];
    }
    $sqlq12="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE 'Short-Response Test'";
    $resultq12=mysql_query($sqlq12);
    while ($row=mysql_fetch_array($resultq12)) {
      $srt=$row['count'];
    }
    $sqlq13="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE 'Proving'";
    $resultq13=mysql_query($sqlq13);
    while ($row=mysql_fetch_array($resultq13)) {
      $prov=$row['count'];
    }
    $sqlq11="SELECT Count(test_number.test_id) AS count, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE question_type.question_type_name LIKE 'Sentence Completion Test'";
    $resultq11=mysql_query($sqlq11);
    while ($row=mysql_fetch_array($resultq11)) {
      $sct=$row['count'];
    }



    



    
    
?>
<script>
  $(".prelimsub").text("<?php echo $ITEPrelim; ?>");
  $(".prelimnot").text("<?php echo $ITEPrelim1; ?>");
  $(".prelimrev").text("<?php echo $ITEPrelim2; ?>");
  $(".prelimapp").text("<?php echo $ITEPrelim3; ?>");
  $(".midtermsub1").text("<?php echo $ITEMidterm; ?>");
  $(".midtermnot1").text("<?php echo $ITEMidterm1; ?>");
  $(".midtermrev1").text("<?php echo $ITEMidterm2; ?>");
  $(".midtermapp1").text("<?php echo $ITEMidterm3; ?>");
  $(".Prefinalsub2").text("<?php echo $ITEPrefinal; ?>");
  $(".Prefinalnot2").text("<?php echo $ITEPrefinal1; ?>");
  $(".Prefinalrev2").text("<?php echo $ITEPrefinal2; ?>");
  $(".Prefinalapp2").text("<?php echo $ITEPrefinal3; ?>");
  $(".finalsub3").text("<?php echo $ITEFinal; ?>");
  $(".finalnot3").text("<?php echo $ITEFinal1; ?>");
  $(".finalrev3").text("<?php echo $ITEFinal2; ?>");
  $(".finalapp3").text("<?php echo $ITEFinal3; ?>");
  $(".itepo").text("<?php echo $ITEpop; ?>");

  $(".baprelimsub").text("<?php echo $BAPrelim; ?>");
  $(".baprelimnot").text("<?php echo $BAPrelim1; ?>");
  $(".baprelimrev").text("<?php echo $BAPrelim2; ?>");
  $(".baprelimapp").text("<?php echo $BAPrelim3; ?>");
  $(".bamidtermsub1").text("<?php echo $BAMidterm; ?>");
  $(".bamidtermnot1").text("<?php echo $BAMidterm1; ?>");
  $(".bamidtermrev1").text("<?php echo $BAMidterm2; ?>");
  $(".bamidtermapp1").text("<?php echo $BAMidterm3; ?>");
  $(".baPrefinalsub2").text("<?php echo $BAPrefinal; ?>");
  $(".baPrefinalnot2").text("<?php echo $BAPrefinal1; ?>");
  $(".baPrefinalrev2").text("<?php echo $BAPrefinal2; ?>");
  $(".baPrefinalapp2").text("<?php echo $BAPrefinal3; ?>");
  $(".bafinalsub3").text("<?php echo $BAFinal; ?>");
  $(".bafinalnot3").text("<?php echo $BAFinal1; ?>");
  $(".bafinalrev3").text("<?php echo $BAFinal2; ?>");
  $(".bafinalapp3").text("<?php echo $BAFinal3; ?>");
  $(".bapo").text("<?php echo $BApop; ?>");

  $(".genprelimsub").text("<?php echo $GENPrelim; ?>");
  $(".genprelimnot").text("<?php echo $GENPrelim1; ?>");
  $(".genprelimrev").text("<?php echo $GENPrelim2; ?>");
  $(".genprelimapp").text("<?php echo $GENPrelim3; ?>");
  $(".genmidtermsub1").text("<?php echo $GENMidterm; ?>");
  $(".genmidtermnot1").text("<?php echo $GENMidterm1; ?>");
  $(".genmidtermrev1").text("<?php echo $GENMidterm2; ?>");
  $(".genmidtermapp1").text("<?php echo $GENMidterm3; ?>");
  $(".genPrefinalsub2").text("<?php echo $GENPrefinal; ?>");
  $(".genPrefinalnot2").text("<?php echo $GENPrefinal1; ?>");
  $(".genPrefinalrev2").text("<?php echo $GENPrefinal2; ?>");
  $(".genPrefinalapp2").text("<?php echo $GENPrefinal3; ?>");
  $(".genfinalsub3").text("<?php echo $GENFinal; ?>");
  $(".genfinalnot3").text("<?php echo $GENFinal1; ?>");
  $(".genfinalrev3").text("<?php echo $GENFinal2; ?>");
  $(".genfinalapp3").text("<?php echo $GENFinal3; ?>");
  $(".genpo").text("<?php echo $GENpop; ?>");


  $(".shsprelimsub").text("<?php echo $firstq; ?>");
  $(".shsprelimnot").text("<?php echo $firstq1; ?>");
  $(".shsprelimrev").text("<?php echo $firstq2; ?>");
  $(".shsprelimapp").text("<?php echo $firstq3; ?>");
  $(".shsmidtermsub1").text("<?php echo $secondq; ?>");
  $(".shsmidtermnot1").text("<?php echo $secondq1; ?>");
  $(".shsmidtermrev1").text("<?php echo $secondq2; ?>");
  $(".shsmidtermapp1").text("<?php echo $secondq3; ?>");
  $(".shsPrefinalsub2").text("<?php echo $thirdq; ?>");
  $(".shsPrefinalnot2").text("<?php echo $thirdq1; ?>");
  $(".shsPrefinalrev2").text("<?php echo $thirdq2; ?>");
  $(".shsPrefinalapp2").text("<?php echo $thirdq3; ?>");
  $(".shsfinalsub3").text("<?php echo $fourthq; ?>");
  $(".shsfinalnot3").text("<?php echo $fourthq1; ?>");
  $(".shsfinalrev3").text("<?php echo $fourthq2; ?>");
  $(".shsfinalapp3").text("<?php echo $fourthq3; ?>");
  $(".shspo").text("<?php echo $SHSpop; ?>");

  $(function () {
    var areaChartDataite = {
      labels: ["Prelim", "Midterm", "Prefinal", "Final"],
      datasets: [
        {
          label: "Submitted TQ & TOS",
          fillColor: "#5e96ad",
          strokeColor: "#5e96ad",
          pointColor: "#5e96ad",
          pointStrokeColor: "#5e96ad",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $ITEPrelim3; ?>,<?php echo $ITEMidterm3; ?>,<?php echo $ITEPrefinal3; ?>,<?php echo $ITEFinal3; ?>]
        },{
          label: "Not Submitted TQ & TOS",
          fillColor: "#ff5425",
          strokeColor: "#ff5425",
          pointColor: "#ff5425",
          pointStrokeColor: "#ff5425",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $ITEPrelim1; ?>,<?php echo $ITEMidterm1; ?>,<?php echo $ITEPrefinal1; ?>,<?php echo $ITEFinal1; ?>]
        },{
          label: "For Revise",
          fillColor: "#C0392B",
          strokeColor: "#C0392B",
          pointColor: "#C0392B",
          pointStrokeColor: "#C0392B",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $ITEPrelim2; ?>,<?php echo $ITEMidterm2; ?>,<?php echo $ITEPrefinal2; ?>,<?php echo $ITEFinal2; ?>]
        },
        {
          label: "Approved TQ & TOS",
          fillColor: "#349640",
          strokeColor: "#349640",
          pointColor: "#349640",
          pointStrokeColor: "#349640",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [<?php echo $ITEPrelim; ?>,<?php echo $ITEMidterm; ?>,<?php echo $ITEPrefinal; ?>,<?php echo $ITEFinal; ?>]
        },
        {
          label: "Total Population",
          fillColor: "#b1b1b1",
          strokeColor: "#b1b1b1",
          pointColor: "#b1b1b1",
          pointStrokeColor: "#b1b1b1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $ITEpop; ?>,<?php echo $ITEpop; ?>,<?php echo $ITEpop; ?>,<?php echo $ITEpop; ?>]
        }

      ]
    };
    var barChartCanvasite                   = $('#barChart1').get(0).getContext('2d')
    var barChartite                         = new Chart(barChartCanvasite)
    var barChartDataite                     = areaChartDataite
    var barChartOptionsite                 = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptionsite.datasetFill = false
    barChartite.Bar(barChartDataite, barChartOptionsite)





    var areaChartDataBA = {
      labels: ["Prelim", "Midterm", "Prefinal", "Final"],
      datasets: [
        {
          label: "Submitted TQ & TOS",
          fillColor: "#5e96ad",
          strokeColor: "#5e96ad",
          pointColor: "#5e96ad",
          pointStrokeColor: "#5e96ad",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $BAPrelim3; ?>,<?php echo $BAMidterm3; ?>,<?php echo $BAPrefinal3; ?>,<?php echo $BAFinal3; ?>]
        },{
          label: "Not Submitted TQ & TOS",
          fillColor: "#ff5425",
          strokeColor: "#ff5425",
          pointColor: "#ff5425",
          pointStrokeColor: "#ff5425",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $BAPrelim1; ?>,<?php echo $BAMidterm1; ?>,<?php echo $BAPrefinal1; ?>,<?php echo $BAFinal1; ?>]
        },{
          label: "For Revise",
          fillColor: "#C0392B",
          strokeColor: "#C0392B",
          pointColor: "#C0392B",
          pointStrokeColor: "#C0392B",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $BAPrelim2; ?>,<?php echo $BAMidterm2; ?>,<?php echo $BAPrefinal2; ?>,<?php echo $BAFinal2; ?>]
        },
        {
          label: "Approved TQ & TOS",
          fillColor: "#349640",
          strokeColor: "#349640",
          pointColor: "#349640",
          pointStrokeColor: "#349640",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [<?php echo $BAPrelim; ?>,<?php echo $BAMidterm; ?>,<?php echo $BAPrefinal; ?>,<?php echo $BAFinal; ?>]
        },
        {
          label: "Total Population",
          fillColor: "#b1b1b1",
          strokeColor: "#b1b1b1",
          pointColor: "#b1b1b1",
          pointStrokeColor: "#b1b1b1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $BApop; ?>,<?php echo $BApop; ?>,<?php echo $BApop; ?>,<?php echo $BApop; ?>]
        }

      ]
    };
    var barChartCanvasBA                   = $('#barChart2').get(0).getContext('2d')
    var barChartBA                         = new Chart(barChartCanvasBA)
    var barChartDataBA                     = areaChartDataBA
    var barChartOptionsBA                 = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptionsBA.datasetFill = false
    barChartBA.Bar(barChartDataBA, barChartOptionsBA)




    var areaChartDataGEN = {
      labels: ["Prelim", "Midterm", "Prefinal", "Final"],
      datasets: [
        {
          label: "Submitted TQ & TOS",
          fillColor: "#5e96ad",
          strokeColor: "#5e96ad",
          pointColor: "#5e96ad",
          pointStrokeColor: "#5e96ad",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $GENPrelim3; ?>,<?php echo $GENMidterm3; ?>,<?php echo $GENPrefinal3; ?>,<?php echo $GENFinal3; ?>]
        },{
          label: "Not Submitted TQ & TOS",
          fillColor: "#ff5425",
          strokeColor: "#ff5425",
          pointColor: "#ff5425",
          pointStrokeColor: "#ff5425",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $GENPrelim1; ?>,<?php echo $GENMidterm1; ?>,<?php echo $GENPrefinal1; ?>,<?php echo $GENFinal1; ?>]
        },{
          label: "For Revise",
          fillColor: "#C0392B",
          strokeColor: "#C0392B",
          pointColor: "#C0392B",
          pointStrokeColor: "#C0392B",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $GENPrelim2; ?>,<?php echo $GENMidterm2; ?>,<?php echo $GENPrefinal2; ?>,<?php echo $GENFinal2; ?>]
        },
        {
          label: "Approved TQ & TOS",
          fillColor: "#349640",
          strokeColor: "#349640",
          pointColor: "#349640",
          pointStrokeColor: "#349640",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [<?php echo $GENPrelim; ?>,<?php echo $GENMidterm; ?>,<?php echo $GENPrefinal; ?>,<?php echo $GENFinal; ?>]
        },
        {
          label: "Total Population",
          fillColor: "#b1b1b1",
          strokeColor: "#b1b1b1",
          pointColor: "#b1b1b1",
          pointStrokeColor: "#b1b1b1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $GENpop; ?>,<?php echo $GENpop; ?>,<?php echo $GENpop; ?>,<?php echo $GENpop; ?>]
        }

      ]
    };
    var barChartCanvasGEN                   = $('#barChart3').get(0).getContext('2d')
    var barChartGEN                         = new Chart(barChartCanvasGEN)
    var barChartDataGEN                     = areaChartDataGEN
    var barChartOptionsGEN                 = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptionsGEN.datasetFill = false
    barChartGEN.Bar(barChartDataGEN, barChartOptionsGEN)



    


    var areaChartDataSHS = {
      labels: ["Prelim", "Midterm", "Prefinal", "Final"],
      datasets: [
        {
          label: "Submitted TQ & TOS",
          fillColor: "#5e96ad",
          strokeColor: "#5e96ad",
          pointColor: "#5e96ad",
          pointStrokeColor: "#5e96ad",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $firstq3; ?>,<?php echo $secondq3; ?>,<?php echo $thirdq3; ?>,<?php echo $fourthq3; ?>]
        },{
          label: "Not Submitted TQ & TOS",
          fillColor: "#ff5425",
          strokeColor: "#ff5425",
          pointColor: "#ff5425",
          pointStrokeColor: "#ff5425",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $firstq1; ?>,<?php echo $secondq1; ?>,<?php echo $thirdq1; ?>,<?php echo $fourthq1; ?>]
        },{
          label: "For Revise",
          fillColor: "#C0392B",
          strokeColor: "#C0392B",
          pointColor: "#C0392B",
          pointStrokeColor: "#C0392B",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $firstq2; ?>,<?php echo $secondq2; ?>,<?php echo $thirdq2; ?>,<?php echo $fourthq2; ?>]
        },
        {
          label: "Approved TQ & TOS",
          fillColor: "#349640",
          strokeColor: "#349640",
          pointColor: "#349640",
          pointStrokeColor: "#349640",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [<?php echo $firstq; ?>,<?php echo $secondq; ?>,<?php echo $thirdq; ?>,<?php echo $fourthq; ?>]
        },
        {
          label: "Total Population",
          fillColor: "#b1b1b1",
          strokeColor: "#b1b1b1",
          pointColor: "#b1b1b1",
          pointStrokeColor: "#b1b1b1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $SHSpop; ?>,<?php echo $SHSpop; ?>,<?php echo $SHSpop; ?>,<?php echo $SHSpop; ?>]
        }

      ]
    };
    var barChartCanvasSHS                   = $('#barChart4').get(0).getContext('2d')
    var barChartSHS                         = new Chart(barChartCanvasSHS)
    var barChartDataSHS                     = areaChartDataSHS
    var barChartOptionsSHS                 = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A leSHSd template
      leSHSdTemplate          : '<ul class="<%=name.toLowerCase()%>-leSHSd"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptionsSHS.datasetFill = false
    barChartSHS.Bar(barChartDataSHS, barChartOptionsSHS)






    var areaChartDataover = {
      labels: ["Prelim", "Midterm", "Prefinal", "Final"],
      datasets: [
        {
          label: "Submitted TQ & TOS",
          fillColor: "#5e96ad",
          strokeColor: "#5e96ad",
          pointColor: "#5e96ad",
          pointStrokeColor: "#5e96ad",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $prelimtotal3; ?>,<?php echo $midtermtotal3; ?>,<?php echo $prefinaltotal3; ?>,<?php echo $finaltotal3; ?>]
        },{
          label: "Not Submitted TQ & TOS",
          fillColor: "#ff5425",
          strokeColor: "#ff5425",
          pointColor: "#ff5425",
          pointStrokeColor: "#ff5425",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $prelimtotal1; ?>,<?php echo $midtermtotal1; ?>,<?php echo $prefinaltotal1; ?>,<?php echo $finaltotal1; ?>]
        },{
          label: "For Revise",
          fillColor: "#C0392B",
          strokeColor: "#C0392B",
          pointColor: "#C0392B",
          pointStrokeColor: "#C0392B",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $prelimtotal2; ?>,<?php echo $midtermtotal2; ?>,<?php echo $prefinaltotal2; ?>,<?php echo $finaltotal2; ?>]
        },
        {
          label: "Approved TQ & TOS",
          fillColor: "#349640",
          strokeColor: "#349640",
          pointColor: "#349640",
          pointStrokeColor: "#349640",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [<?php echo $prelimtotal; ?>,<?php echo $midtermtotal; ?>,<?php echo $prefinaltotal; ?>,<?php echo $finaltotal; ?>]
        },
        {
          label: "Total Population",
          fillColor: "#b1b1b1",
          strokeColor: "#b1b1b1",
          pointColor: "#b1b1b1",
          pointStrokeColor: "#b1b1b1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [<?php echo $poptotal; ?>,<?php echo $poptotal; ?>,<?php echo $poptotal; ?>,<?php echo $poptotal; ?>]
        }

      ]
    };
    var barChartCanvasover                   = $('#barChart5').get(0).getContext('2d')
    var barChartover                         = new Chart(barChartCanvasover)
    var barChartDataover                     = areaChartDataover
    var barChartOptionsover                 = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A leshsd template
      leshsdTemplate          : '<ul class="<%=name.toLowerCase()%>-leshsd"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptionsover.datasetFill = false
    barChartover.Bar(barChartDataover, barChartOptionsover)




    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: <?php echo $essay; ?>,
        color: "#C0392B",
        highlight: "#C0392B",
        label: "Essay"
      },
      {
        value: <?php echo $prob; ?>,
        color: "#E74C3C",
        highlight: "#E74C3C",
        label: "Problem Solving"
      },
      {
        value: <?php echo $multi; ?>,
        color: "#9B59B6",
        highlight: "#9B59B6",
        label: "Multiple Choice"
      },
      {
        value: <?php echo $enu; ?>,
        color: "#8E44AD",
        highlight: "#8E44AD",
        label: "Enumeration"
      },
      {
        value: <?php echo $iden; ?>,
        color: "#2980B9",
        highlight: "#2980B9",
        label: "Identification"
      },
      {
        value: <?php echo $tof; ?>,
        color: "#3498DB",
        highlight: "#3498DB",
        label: "True or False"
      },
      {
        value: <?php echo $match; ?>,
        color: "#1ABC9C",
        highlight: "#1ABC9C",
        label: "Matching Type"
      },
      {
        value: <?php echo $fitb; ?>,
        color: "#16A085",
        highlight: "#16A085",
        label: "Fill in the Blank"
      },
      {
        value: <?php echo $ana; ?>,
        color: "#27AE60",
        highlight: "#27AE60",
        label: "Analogy"
      },
      {
        value: <?php echo $mtof; ?>,
        color: "#2ECC71",
        highlight: "#2ECC71",
        label: "Modified True or False"
      },
      {
        value: <?php echo $srt; ?>,
        color: "#F1C40F",
        highlight: "#F1C40F",
        label: "Short-Response Test"
      },
      {
        value: <?php echo $prov; ?>,
        color: "#F39C12",
        highlight: "#F39C12",
        label: "Proving"
      },
      {
        value: <?php echo $sct; ?>,
        color: "#E67E22",
        highlight: "#E67E22",
        label: "Sentence Completion Test"
      }
    ];
    var pieOptions = {
      segmentShowStroke: true,
      segmentStrokeColor: "#fff",
      segmentStrokeWidth: 2,
      animationSteps: 100,
      animationEasing: "easeOutBounce",
      animateRotate: true,
      animateScale: false,
      responsive: true,
      maintainAspectRatio: true,
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    pieChart.Doughnut(PieData, pieOptions);



    

  });

    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>