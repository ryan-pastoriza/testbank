<?php 
class testbank {
    function loaddb(){
        $server     = 'localhost';
        $username   = 'root';
        $password   = '';
        $database   = 'testbank';

        if(!mysql_connect($server, $username, $password))
        {
            exit('Error: could not establish database connection');
        }
        if(!mysql_select_db($database))
        {
            exit('Error: could not select the database');
        }
    }
    function updatestatus(){
        $this->loaddb();
        $query= 'UPDATE super_user SET status="offline" WHERE status="online"';
        $result = mysql_query($query) or die("Query Failed update super_user: ".mysql_error());
        $query1= 'UPDATE user_access SET status="offline" WHERE status="online"';
        $result1 = mysql_query($query1) or die("Query Failed update user_access: ".mysql_error());
    }
    function connectcur(){
        $server     = '192.168.1.207';
        $username   = 'redz';
        $password   = '12345';
        $database   = 'curriculum_final';

        if(!mysql_connect($server, $username, $password))
        {   
            exit('Error: could not establish database connection');
        }
        if(!mysql_select_db($database))
        {
            exit('Error: could not select the database');
        }
    }
    function connectdtrps(){
        $server     = 'localhost';
        $username   = 'root';
        $password   = '';
        $database   = 'dtrps_update';

        if(!mysql_connect($server, $username, $password))
        {
            exit('Error: could not establish database connection');
        }
        if(!mysql_select_db($database))
        {
            exit('Error: could not select the database');
        }
    }
    function getpi($depart,$var){
        $this->loaddb();
        if ($var=="vision") {
            $sql=mysql_query("SELECT * FROM program_information WHERE program_information.course ='".$depart."'");
            if (mysql_num_rows($sql)==0) {
                echo "Please inform the Dean or Program Head to set the data for Program Vision.";
            }else{
                while ($row=mysql_fetch_array($sql)) {
                    $a=$row['prog_vision'];
                    echo $a;
                }
            }
        }else if ($var=="mission") {
            $sql=mysql_query("SELECT * FROM program_information WHERE program_information.course ='".$depart."'");
            if (mysql_num_rows($sql)==0) {
                echo "Please inform the Dean or Program Head to set the data for Program Mission.";
            }else{
                while ($row=mysql_fetch_array($sql)) {
                    $a=$row['prog_mission'];
                    echo $a;
                }
            }
        }else if ($var=="desc") {
            $sql=mysql_query("SELECT * FROM program_information WHERE program_information.course ='".$depart."'");
            if (mysql_num_rows($sql)==0) {
                echo "Please inform the Dean or Program Head to set the data for Program Description.";
            }else{
                while ($row=mysql_fetch_array($sql)) {
                    $a=$row['prog_desc'];
                    echo $a;
                }
            }
        }else if ($var=="objectives") {
            $sql=mysql_query("SELECT prog_ed_objectives.ob_desc FROM program_information INNER JOIN prog_ed_objectives ON prog_ed_objectives.p_i_id = program_information.p_i_id WHERE program_information.course = '".$depart."' ORDER BY prog_ed_objectives.ob_id ASC");
            if (mysql_num_rows($sql)==0) {
                echo "Please inform the Dean or Program Head to set the data for Program Objectives.";
            }else{
                $i=1;
                while ($row=mysql_fetch_array($sql)) {
                    $a=$row['ob_desc'];
                    echo $i.".  ".$a."<br/><br/>";
                    $i++;
                }
            }
        }

    }
    function sqlclose(){
    }

    function getinstitutional($a){
        $this->loaddb();
        $sql=mysql_query("SELECT ".$a." FROM ii");
        while ($row=mysql_fetch_array($sql)) {
            echo $row[$a];
        }
    }
    function getinstitutional1(){
        $this->loaddb();
        $sql=mysql_query("SELECT * FROM igo");
        while ($row=mysql_fetch_array($sql)) {
            $iga=html_entity_decode($row['iga']);
            $igc=html_entity_decode($row['igc']);
            $igo=html_entity_decode($row['igo']);
            echo '
            <tr>
                <td class="col-md-3">'.$iga.'</td>
                <td class="col-md-1">'.$igc.'</td>
                <td class="col-md-8"><p>'.$igo.'</p></td>
            </tr>';
        }
    }
    function getprogram($a){
        $this->loaddb();
        $year=date("Y");
        $month=date("F");
        // if ($month=="May" or $month=="June" or $month=="July" or $month=="August" or $month=="September" or $month=="October" or $month=="November" or $month=="December"){
        //     $year1=$year;
        //     $year2=$year+1;
        // }else{
        //     $year1=$year-1;
        //     $year2=$year;
        // }
        
        $sql=mysql_query("SELECT * FROM pgo WHERE course='".$a."'");
        while ($row=mysql_fetch_array($sql)) {
            $pga=html_entity_decode($row['pga']);
            $pgc=$row['pgc'];
            $pgo=html_entity_decode($row['pgo']);
            echo '
            <tr>
                <td class="col-md-3">'.$pga.'</td>
                <td class="col-md-1">'.$pgc.'</td>
                <td class="col-md-8"><p>'.$pgo.'</p></td>
            </tr>';
        }
    }

    function getcur(){
        $this->connectcur();
        $sql=mysql_query("SELECT`subject`.subj_id, `subject`.subj_code, `subject`.subj_name, `subject`.subj_desc, `subject`.lec_unit, `subject`.lab_unit, `subject`.subj_type FROM `subject`");
        $subj_code2="";
        while ($row=mysql_fetch_array($sql)) {
            $id=mysql_real_escape_string($row['subj_id']);
            $code=mysql_real_escape_string($row['subj_code']);
            $name=mysql_real_escape_string($row['subj_name']);
            $desc=mysql_real_escape_string($row['subj_desc']);
            $lec=mysql_real_escape_string($row['lec_unit']);
            $lab=mysql_real_escape_string($row['lab_unit']);
            $subj_type=mysql_real_escape_string($row['subj_type']);
            
            $query1="SELECT DISTINCT `subject`.subj_code FROM cur_subject INNER JOIN pre_requisite ON pre_requisite.cs_id = cur_subject.cs_id INNER JOIN `subject` ON pre_requisite.subj_id = `subject`.subj_id WHERE cur_subject.subj_id = '".$id."'";
            $sql1=mysql_query($query1);
        
            if($sql1 === FALSE) { 
                mysql_error();
            }else{
                while ($row1=mysql_fetch_array($sql1)) {
                    $subj_code2=$row1['subj_code'];
                }
            }
            $this->insertcur($id,$code,$name,$desc,$lec,$lab,$subj_code2,$subj_type);
        }

        $this->getdep();
    }
    function updatemobile(){
        $this->loaddb();
        $sql=mysql_query("SELECT employment.employment_id, employees.employee_mobile FROM employees INNER JOIN employment ON employment.employee_id = employees.employee_id");
        while ($row=mysql_fetch_array($sql)) {
            $employment_id=$row['employment_id'];
            $employee_mobile=$row['employee_mobile'];
            $query1= 'UPDATE user_access SET contact="'.$employee_mobile.'" WHERE employment_id="'.$employment_id.'"';
            $result1 = mysql_query($query1) or die("Query Failed update user_access: ".mysql_error());
        }
    }
    function loaddl($period,$dep){
        $this->loaddb();
        $sq=mysql_query("SELECT major_exams.exam_period FROM major_exams WHERE major_exams.exam_id ='".$period."'");
        if (mysql_num_rows($sq)==0) {
            echo '<small><em>ERROR!!!</em></small><br/>';
        }else{
            while ($rows=mysql_fetch_array($sq)) {
                $exam_period=$rows['exam_period'];
                echo '<strong>'.$exam_period.'</strong><br />';

            }
        }
        $sql=mysql_query("SELECT exam_schedule.`start`, exam_schedule.`end` FROM exam_schedule WHERE exam_schedule.exam_id ='".$period."'AND exam_schedule.dep ='".$dep."'");
        if (mysql_num_rows($sql)==0) {
            echo '&nbsp&nbsp&nbsp<small><em>Examination:</em></small><br/>';
        }else{
            while ($row=mysql_fetch_array($sql)) {
                $date=strtotime($row['start']);
                $date2=strtotime($row['end']);
                echo '&nbsp&nbsp&nbsp<small><em>Examination: '.date("M d Y", $date).'-'.date("M d Y", $date2).'</em></small><br/>';

            }
        }
        $sql1=mysql_query("SELECT submission_sched.deadline FROM submission_sched WHERE submission_sched.exam_id ='".$period."' AND submission_sched.dep ='".$dep."'");
        if (mysql_num_rows($sql1)==0) {
            echo '&nbsp&nbsp&nbsp<small><em>Deadline:</em></small>';
        }else{
            while ($row1=mysql_fetch_array($sql1)) {
                $date3=strtotime($row1['deadline']);
                echo '&nbsp&nbsp&nbsp<small><em>Deadline: '.date("M d Y", $date3).'</em></small>';
            }
        }
        
    }
    function getdep(){
        $this->connectdtrps();
        
        $sql1=mysql_query('SELECT * FROM `departments`');
        if (!$sql1) {
            echo "string";
        }else{
            while ($row1=mysql_fetch_array($sql1)) {

                $dep_status=$row1['department_status'];
                $department_id=$row1['department_id'];
                if(stripos($row1['department_name'],"ITEP") !== false){
                    $dep_name="ITE";
                    $this->insertdep($department_id,$dep_name,$dep_status);
                }
                elseif(stripos($row1['department_name'],"BEP") !== false){
                    $dep_name="BA";
                    $this->insertdep($department_id,$dep_name,$dep_status);
                }
                elseif(stripos($row1['department_name'],"SHS") !== false){
                    $dep_name="SHS";
                    $this->insertdep($department_id,$dep_name,$dep_status);
                }else if (stripos($row1['department_name'],"General Education Program") !== false) {
                    $dep_name="GEN";
                    $this->insertdep($department_id,$dep_name,$dep_status);
                }else{
                    $dep_name=$row1['department_name'];
                    $this->insertdep($department_id,$dep_name,$dep_status);
                }
                
            }
        }
        $this->getemp();
    }

    function getclo($syll,$a){
        $this->loaddb();
        $sql=mysql_query("SELECT * From clo_ilo WHERE syllabus_id ='".$syll."'");
        while ($row=mysql_fetch_array($sql)) {
            $clo_id=$row['clo_id'];
            $cloc=html_entity_decode($row['cloc']);
            $clod=html_entity_decode($row['clod']);
            $clo_datetime=$row['clo_datetime'];
            $revise=$row['revise'];
            echo'<tr>
                <td>'.$clo_id.'</td>';
            if ($a=="BA" OR $a=="SHS" OR $a=="GEN") {
                echo'<td></td>'; 
            }else{
                echo '<td>'.$cloc.'</td>';
            }
            echo'<td>'.$clod.'</td>
                <td>'.$clo_datetime.'</td>
                <td>'.$revise.'</td>
                <td>
                    <button type="button" class="btn btn-warning btn-xs glyphicon glyphicon-edit cloedit" data-toggle="modal" data-target="#editclo'.$clo_id.'"></button>
                    <button type="button" class="btn btn-danger btn-xs glyphicon glyphicon-trash clodelete" data-toggle="modal" data-target="#deleteclo'.$clo_id.'"></button>
                    <div class="modal fade" id="deleteclo'.$clo_id.'" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><strong>Warning</strong></h4>
                          </div>
                          <div class="modal-body">
                            <form>
                              Are you sure you want to delete this CLO?
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                <button type="button" onclick="deleteclo('.$clo_id.')" data-dismiss="modal"  class="btn btn-primary">Yes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal fade bd-example-modal-lg" id="editclo'.$clo_id.'" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><strong>Edit CLO</strong></h4>
                          </div>
                          <div class="modal-body">
                            <form>
                            <div class="row">
                                <div class="col-xs-12">
                                  <div class="form-group">';
                                     if ($a=="BA" OR $a=="SHS" OR $a=="GEN") {
                                }else{
                                    echo'<label for="name">CLO code</label><br/>
                                    <input type="text" style="width:850px;" class="form-control" id="cloc'.$clo_id.'" value="'.$cloc.'">';
                                }
                                echo '<input type="hidden" class="form-control" id="rev'.$clo_id.'" value="'.$revise.'">
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                  <div class="form-group">
                                    <label for="lname">Course learning Outcomes</label><br/>
                                    <input type="text" style="width:850px;" class="form-control" id="clod'.$clo_id.'" value="'.$clod.'">
                                  </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                  <label for="course">IGO</label>
                                 ';
                                 $this->getclodata($a);
                            echo'
                                </div>
                             </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" onclick="updateclo('.$clo_id.')" data-dismiss="modal" class="btn btn-primary" id="'.$clo_id.'">Save</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                </td>
            </tr>
            ';
        }
        echo '
                
                    
                    
                </td>
            </tr>';
    }

    function getweek($syll){
        $this->loaddb();
        
        $sql=mysql_query("SELECT topics.topics_id, topics.topic_description, topics.ilo, topics.`week`, topics.tla, topics.resources, topics.oba, topics.exam_id, major_exams.exam_period FROM topics INNER JOIN major_exams ON topics.exam_id = major_exams.exam_id WHERE topics.syllabus_id ='".$syll."'");
        while ($row=mysql_fetch_array($sql)) {
            $subt = array();
            $topics_id=$row['topics_id'];
            $week=$row['week'];
            $exam_period=$row['exam_period'];
            $topic_description=mysql_real_escape_string($row['topic_description']);
            $ilo=mysql_real_escape_string($row['ilo']);
            $tla=mysql_real_escape_string($row['tla']);
            $resources=mysql_real_escape_string($row['resources']);
            $oba=mysql_real_escape_string($row['oba']);
            $a="";
            $b="";
            $c="";
            $d="";
            $e="";
            $f="";
            $g="";
            $h="";
            $sql1=mysql_query("SELECT subtopic.subtopic_description FROM subtopic WHERE subtopic.topics_id ='".$topics_id."'");
            while ($row1=mysql_fetch_array($sql1)) {
                $subt[] = $row1['subtopic_description'];
            }
            if ($exam_period=="PRELIM") {
                $a="selected";
            }else if ($exam_period=="PRELIM EXAM") {
                $b="selected";
            }else if ($exam_period=="MIDTERM") {
                $c="selected";
            }else if ($exam_period=="MIDTERM EXAM") {
                $d="selected";
            }else if ($exam_period=="PRE-FINAL") {
                $e="selected";
            }else if ($exam_period=="PRE-FINAL EXAM") {
                $f="selected";
            }else if ($exam_period=="FINAL") {
                $g="selected";
            }else if ($exam_period=="FINAL EXAM") {
                $h="selected";
            }

            echo'<tr><td>'.$week.'</td>
                <td>'.$exam_period.'</td>
                <td>'.$topic_description.'</td>
                <td>'.$ilo.'</td>
                <td>'.$tla.'</td>
                <td>'.$resources.'</td>
                <td>'.$oba.'</td>
                <td>
                <button type="button" onclick="openmodal('.$topics_id.')" class="btn btn-warning btn-xs glyphicon glyphicon-edit weekedit" data-toggle="modal" data-target="#weekedit'.$topics_id.'"></button>
                    <button type="button" class="btn btn-danger btn-xs glyphicon glyphicon-trash clodelete" data-toggle="modal" data-target="#deleteweek'.$topics_id.'"></button>
                    <div class="modal fade" id="deleteweek'.$topics_id.'" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><strong>Warning</strong></h4>
                          </div>
                          <div class="modal-body">
                            <form>
                              Are you sure you want to delete this Topic?
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                <button type="button" onclick="deletetopic('.$topics_id.')" data-dismiss="modal"  class="btn btn-primary">Yes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div></td>';
                    

        }
         echo '
            </tr>';
    }

    function gettosnum($tq,$topic,$cog){
        $this->loaddb();
        $sql=mysql_query("SELECT test_number.test_number,test_number.test_id FROM test_number WHERE test_number.tq_id = $tq ORDER BY test_number.test_number ASC");
        while ($row=mysql_fetch_array($sql)) {
            $test_id=$row['test_id'];
            $test_number=$row['test_number'];
            $sql1=mysql_query("SELECT testquestions.number, topics.topic_description FROM testquestions INNER JOIN topics ON testquestions.topics_id = topics.topics_id WHERE testquestions.test_id = '".$test_id."' AND testquestions.cognitive_level_id = '".$cog."' AND topics.topic_description = '".$topic."' ORDER BY testquestions.number ASC");
            $count=mysql_num_rows($sql1);
            $count1=mysql_num_rows($sql1);
            while ($row1=mysql_fetch_array($sql1)) {
                if ($count==$count1) {
                    echo $test_number."[";
                }
                $count--;
                $test_number=$row1['number'];
                echo $test_number;
                if ($count>0) {
                   echo ",";
                }else{
                    echo "]";
                }
            }

        }
        
    }
    function getdepartment($ss_id){
        $this->loaddb();
        $sql=mysql_query("SELECT sched_subj.department FROM syllabus INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id WHERE syllabus.syllabus_id ='".$ss_id."'");
        while ($row=mysql_fetch_array($sql)) {
            $department=$row['department'];

        }
        return $department;
    }
    function getdepsyllcheck($ss_id){
        $this->loaddb();
        $sql=mysql_query("SELECT sched_subj.department FROM syllabus INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id WHERE syllabus.syllabus_id ='".$ss_id."'");
        while ($row=mysql_fetch_array($sql)) {
            $department=$row['department'];
            if ($department=='ITE' OR $department=='CS') {
            $dep1='<h4><b>Information Technology Education Departmentment
            Bachelor of Science in Information Technology</b></h4>';
            }if ($department=='SHS' OR $department=='GEN') {
            $dep1='<h4><b>General Education Departmentment</b></h4>';
            }else{
            $dep1='<h4><b>Business Education Program</b></h4>';
            }
            echo $dep1;

        }
        
    }
    function getdepsyllcheck1($ss_id){
        $this->loaddb();
        $sql=mysql_query("SELECT sched_subj.department FROM syllabus INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id WHERE syllabus.syllabus_id ='".$ss_id."'");
        while ($row=mysql_fetch_array($sql)) {
            $department=$row['department'];
            if ($department=='ITE' OR $department=='CS') {
                $this->loadprintpgo($ss_id); 
            }else if($department=='SHS' OR $department=='GEN'){
                
            }else{
                $this->loadprintpgo($ss_id); 
            }

        }
        
    }
    function getdepsyllcheck2($ss_id){
        $this->loaddb();
        $sql=mysql_query("SELECT sched_subj.department FROM syllabus INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id WHERE syllabus.syllabus_id ='".$ss_id."'");
        while ($row=mysql_fetch_array($sql)) {
            $department=$row['department'];
            if ($department=='ITE' OR $department=='CS') {
                $dep1='ITE Dean';
            }else if($department=='SHS' OR $department=='GEN'){
                $dep1='OIC-Dean, General Education Department';
            }else{
                $dep1='BA Dean';
            }
            echo $dep1;

        }
        
    }
    function getdepsyllcheck3($ss_id){
        $this->loaddb();
        $sql=mysql_query("SELECT sched_subj.department FROM syllabus INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id WHERE syllabus.syllabus_id ='".$ss_id."'");
        while ($row=mysql_fetch_array($sql)) {
            $department=$row['department'];
            if ($department=="ITE" OR $department=="GEN") {
          echo '<tr>
        <th class="col-xs-2" rowspan="7">Grading System</th>
        <th bgcolor="#89C35C" id="color2" align="center" class="col-xs-3">Items</th>
        <th bgcolor="#89C35C" id="color2" align="center" class="col-xs-1">Prelim</th>
        <th bgcolor="#89C35C" id="color2" align="center" class="col-xs-1">Midterm</th>
        <th bgcolor="#89C35C" id="color2" align="center" class="col-xs-1">Pre-Final</th>
        <th bgcolor="#89C35C" id="color2" align="center" class="col-xs-1">Final</th>
        <th bgcolor="#89C35C" id="color2" align="center" class="col-xs-1">Semester</th>
      </tr>
      <tr>
        <td class="col-xs-3">Class Standing</td>
        <td align="center">10%</td>
        <td align="center">10%</td>
        <td align="center">10%</td>
        <td align="center">10%</td>
        <td align="center">10%</td>
      </tr>
      <tr>
        <td class="col-xs-3">Quizzes</td>
        <td align="center">40%</td>
        <td align="center">40%</td>
        <td align="center">40%</td>
        <td align="center">40%</td>
        <td align="center">40%</td>
      </tr>
      <tr>
        <td class="col-xs-3">Major Examinations</td>
        <td align="center">50%</td>
        <td align="center">50%</td>
        <td align="center">50%</td>
        <td align="center">50%</td>
        <td align="center">50%</td>
      </tr>
      <tr>
        <td class="col-xs-3">Total</td>
        <td align="center">100%</td>
        <td align="center">100%</td>
        <td align="center">100%</td>
        <td align="center">100%</td>
        <td align="center">100%</td>
      </tr>
      <tr>
        <td class="col-xs-3"><b>Semester</b></td>
        <td align="center"><b>20%</b></td>
        <td align="center"><b>20%</b></td>
        <td align="center"><b>20%</b></td>
        <td align="center"><b>40%</b></td>
        <td align="center"><b>100%</b></td>
      </tr>';
        }else if ($department=="BA") {
          echo '<tr>
        <th class="col-xs-2" rowspan="7">Grading System</th>
        <th bgcolor="#89C35C" id="color2" align="center" class="col-xs-3">Items</th>
        <th bgcolor="#89C35C" id="color2" align="center" class="col-xs-1">Prelim</th>
        <th bgcolor="#89C35C" id="color2" align="center" class="col-xs-1">Midterm</th>
        <th bgcolor="#89C35C" id="color2" align="center" class="col-xs-1">Pre-Final</th>
        <th bgcolor="#89C35C" id="color2" align="center" class="col-xs-1">Final</th>
        <th bgcolor="#89C35C" id="color2" align="center" class="col-xs-1">Semester</th>
      </tr>
      <tr>
        <td class="col-xs-3">Class Standing</td>
        <td align="center">10%</td>
        <td align="center">40%</td>
        <td align="center">50%</td>
        <td align="center">100%</td>
        <td align="center">20%</td>
      </tr>
      <tr>
        <td class="col-xs-3">Quizzes</td>
        <td align="center">10%</td>
        <td align="center">40%</td>
        <td align="center">50%</td>
        <td align="center">100%</td>
        <td align="center">20%</td>
      </tr>
      <tr>
        <td class="col-xs-3">Major Examinations</td>
        <td align="center">10%</td>
        <td align="center">40%</td>
        <td align="center">50%</td>
        <td align="center">100%</td>
        <td align="center">20%</td>
      </tr>
      <tr>
        <td class="col-xs-3">Total</td>
        <td align="center">10%</td>
        <td align="center">40%</td>
        <td align="center">50%</td>
        <td align="center">100%</td>
        <td align="center">40%</td>
      </tr>
      <tr>
        <td class="col-xs-3"><b>Semester</b></td>
        <td align="center"><b></b></td>
        <td align="center"><b></b></td>
        <td align="center"><b></b></td>
        <td align="center"><b></b></td>
        <td align="center"><b>100%</b></td>
      </tr>';
        }

        }
        
    }
    function shsgettosnum($tq,$topic,$cog){
        $this->loaddb();
        $sql=mysql_query("SELECT shs_test_number.shs_test_number,shs_test_number.shs_test_id FROM shs_test_number WHERE shs_test_number.shs_tq_id = $tq ORDER BY shs_test_number.shs_test_number ASC");
        while ($row=mysql_fetch_array($sql)) {
            $test_id=$row['shs_test_id'];
            $test_number=$row['shs_test_number'];
            $sql1=mysql_query("SELECT shs_testquestions.shs_number, shs_topics.shs_topic_description FROM shs_testquestions INNER JOIN shs_topics ON shs_testquestions.shs_topics_id = shs_topics.shs_topics_id WHERE shs_testquestions.shs_test_id = '".$test_id."' AND shs_testquestions.cognitive_level_id = '".$cog."' AND shs_topics.shs_topic_description = '".$topic."' ORDER BY shs_testquestions.shs_number ASC");
            $count=mysql_num_rows($sql1);
            $count1=mysql_num_rows($sql1);
            while ($row1=mysql_fetch_array($sql1)) {
                if ($count==$count1) {
                    echo $test_number."[";
                }
                $count--;
                $test_number=$row1['shs_number'];
                echo $test_number;
                if ($count>0) {
                   echo ",";
                }else{
                    echo "]";
                }
            }

        }
        
    }
    function gettestn($tq){
        $this->loaddb();
        $sql=mysql_query("SELECT test_number.test_number, question_type.question_type_name FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE tq.tq_id = $tq");
        while ($row1=mysql_fetch_array($sql)) {
            $test_number=$row1['test_number'];
            $question_type_name=$row1['question_type_name'];
            echo "<tr>
                <td>".$test_number."</td>
                <td>".$question_type_name."</td>
            </tr>";
        }
    }
    function shsgettestn($tq){
        $this->loaddb();
        $sql=mysql_query("SELECT shs_test_number.shs_test_number, shs_question_type.shs_question_type_name FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_question_type ON shs_question_type.shs_test_id = shs_test_number.shs_test_id WHERE shs_tq.shs_tq_id = $tq");
        while ($row1=mysql_fetch_array($sql)) {
            $test_number=$row1['shs_test_number'];
            $question_type_name=$row1['shs_question_type_name'];
            echo "<tr>
                <td>".$test_number."</td>
                <td>".$question_type_name."</td>
            </tr>";
        }
    }
    function gettostopic($tq){
        $this->loaddb();
        $totalni=0;
        $totalh=0;
        $totalni=0;
        $totalnp=0;
        $kno_ni=0;
        $com_ni=0;
        $app_ni=0;
        $ana_ni=0;
        $eva_ni=0;
        $syn_ni=0;
        $kno_np=0;
        $com_np=0;
        $app_np=0;
        $ana_np=0;
        $eva_np=0;
        $syn_np=0;
        $sql=mysql_query("SELECT tos_topic.topic_desc, tos_topic.num_of_hours FROM tos INNER JOIN tos_topic ON tos_topic.tos_id = tos.tos_id WHERE tos.tq_id = $tq");
        $sql2=mysql_query("SELECT DISTINCT tos.kno_np, tos.com_np, tos.app_np, tos.eva_np, tos.ana_np, tos.syn_np, tos.kno_ni, tos.com_ni, tos.app_ni, tos.ana_ni, tos.eva_ni,  tos.syn_ni FROM tos INNER JOIN tos_topic ON tos_topic.tos_id = tos.tos_id WHERE tos.tq_id = $tq");
        $sql3=mysql_query("SELECT Sum(tos_topic.num_of_hours)  AS totalh FROM tos INNER JOIN tos_topic ON tos_topic.tos_id = tos.tos_id WHERE tos.tq_id = $tq");
        while ($row1=mysql_fetch_array($sql2)) {
            $totalni=$row1['kno_ni']+$row1['com_ni']+$row1['app_ni']+$row1['ana_ni']+$row1['eva_ni']+$row1['syn_ni'];
            $totalnp=$row1['kno_np']+$row1['com_np']+$row1['app_np']+$row1['ana_np']+$row1['eva_np']+$row1['syn_np'];
            $kno_ni=$row1['kno_ni'];
            $com_ni=$row1['com_ni'];
            $app_ni=$row1['app_ni'];
            $ana_ni=$row1['ana_ni'];
            $eva_ni=$row1['eva_ni'];
            $syn_ni=$row1['syn_ni'];
            $kno_np=$row1['kno_np'];
            $com_np=$row1['com_np'];
            $app_np=$row1['app_np'];
            $ana_np=$row1['ana_np'];
            $eva_np=$row1['eva_np'];
            $syn_np=$row1['syn_np'];
        }
        while ($row2=mysql_fetch_array($sql3)) {
            $totalh=$row2['totalh'];
        }
        while ($row=mysql_fetch_array($sql)) {
            $topic_desc=$row['topic_desc'];
            $num_of_hours=$row['num_of_hours'];
            echo "<tr>
                    <td>
                        <b>".$topic_desc."</b>
                    </td>
                    <td align='center'>
                        ".$num_of_hours."
                    </td>
                    <td align='center'>
                        ".number_format($totalni / $totalh * $num_of_hours,2)."
                    </td>
                    <td>";$this->gettosnum($tq,$topic_desc,1); 
                    echo"</td><td>";$this->gettosnum($tq,$topic_desc,2); 
                    echo"</td><td>";$this->gettosnum($tq,$topic_desc,3); 
                    echo"</td><td>";$this->gettosnum($tq,$topic_desc,4); 
                    echo"</td><td>";$this->gettosnum($tq,$topic_desc,5); 
                    echo"</td><td>";$this->gettosnum($tq,$topic_desc,6); 
                    echo"</td>
                </tr>";
        }
        echo "<tr>
                <td align='right'>
                    Total Number of Hours
                </td>
                <td align='center'>
                    ".$totalh."
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
        </tr>";
        echo "<tr>
                <td align='right'>
                    Total Number of Items
                </td>
                <td align='center'>
                    ".$totalni."
                </td>
                <td align='center'>
                    ".$totalni."
                </td>
                <td align='center'>".$kno_ni."</td>
                <td align='center'>".$com_ni."</td>
                <td align='center'>".$app_ni."</td>
                <td align='center'>".$ana_ni."</td>
                <td align='center'>".$eva_ni."</td>
                <td align='center'>".$syn_ni."</td>
        </tr>";
        echo "<tr>
                <td align='right'>
                    Total Number of Points
                </td>
                <td align='center'>
                    ".$totalnp."
                </td>
                <td align='center'></td>
                <td align='center'>".$kno_np."</td>
                <td align='center'>".$com_np."</td>
                <td align='center'>".$app_np."</td>
                <td align='center'>".$ana_np."</td>
                <td align='center'>".$eva_np."</td>
                <td align='center'>".$syn_np."</td>
        </tr>";
        echo "<tr>
                <td colspan='3'></td>
                <td align='center'>".number_format($kno_np / $totalnp * 100,2)."%</td>
                <td align='center'>".number_format($com_np / $totalnp * 100,2)."%</td>
                <td align='center'>".number_format($app_np / $totalnp * 100,2)."%</td>
                <td align='center'>".number_format($ana_np / $totalnp * 100,2)."%</td>
                <td align='center'>".number_format($eva_np / $totalnp * 100,2)."%</td>
                <td align='center'>".number_format($syn_np / $totalnp * 100,2)."%</td>
        </tr>";
        $kno_npp=$kno_np / $totalnp * 100;
        $com_npp=$com_np / $totalnp * 100;
        $app_npp=$app_np / $totalnp * 100;
        $ana_npp=$ana_np / $totalnp * 100;
        $eva_npp=$eva_np / $totalnp * 100;
        $syn_npp=$syn_np / $totalnp * 100;
        $lots=$kno_npp+$com_npp;
        $hots=$app_npp+$ana_npp+$eva_npp+$syn_npp;
        echo "<tr>
                <td>TOTAL%</td>
                <td colspan='2'>100%</td>
                <td align='center'>LOTS:</td>
                <td align='center'>".number_format($lots,2)."%</td>
                <td align='center'>HOTS:</td>
                <td align='center' colspan='3'>".number_format($hots,2)."%</td>
        </tr>";
    }

    function shsgettostopic($tq){
        $this->loaddb();
        $totalni=0;
        $totalh=0;
        $sql=mysql_query("SELECT shs_tos_topic.shs_topic_desc, shs_tos_topic.shs_num_of_hours FROM shs_tos INNER JOIN shs_tos_topic ON shs_tos_topic.shs_tos_id = shs_tos.shs_tos_id WHERE shs_tos.shs_tq_id = $tq");
        $sql2=mysql_query("SELECT DISTINCT shs_tos.shs_kno_np, shs_tos.shs_com_np, shs_tos.shs_app_np, shs_tos.shs_eva_np, shs_tos.shs_ana_np, shs_tos.shs_syn_np, shs_tos.shs_kno_ni, shs_tos.shs_com_ni, shs_tos.shs_app_ni, shs_tos.shs_ana_ni, shs_tos.shs_eva_ni, shs_tos.shs_syn_ni FROM shs_tos INNER JOIN shs_tos_topic ON shs_tos_topic.shs_tos_id = shs_tos.shs_tos_id WHERE shs_tos.shs_tq_id = $tq");
        $sql3=mysql_query("SELECT Sum(shs_tos_topic.shs_num_of_hours)  AS totalh FROM shs_tos INNER JOIN shs_tos_topic ON shs_tos_topic.shs_tos_id = shs_tos.shs_tos_id WHERE shs_tos.shs_tq_id = $tq");
        while ($row1=mysql_fetch_array($sql2)) {
            $totalni=$row1['shs_kno_ni']+$row1['shs_com_ni']+$row1['shs_app_ni']+$row1['shs_ana_ni']+$row1['shs_eva_ni']+$row1['shs_syn_ni'];
            $totalnp=$row1['shs_kno_np']+$row1['shs_com_np']+$row1['shs_app_np']+$row1['shs_ana_np']+$row1['shs_eva_np']+$row1['shs_syn_np'];
            $kno_ni=$row1['shs_kno_ni'];
            $com_ni=$row1['shs_com_ni'];
            $app_ni=$row1['shs_app_ni'];
            $ana_ni=$row1['shs_ana_ni'];
            $eva_ni=$row1['shs_eva_ni'];
            $syn_ni=$row1['shs_syn_ni'];
            $kno_np=$row1['shs_kno_np'];
            $com_np=$row1['shs_com_np'];
            $app_np=$row1['shs_app_np'];
            $ana_np=$row1['shs_ana_np'];
            $eva_np=$row1['shs_eva_np'];
            $syn_np=$row1['shs_syn_np'];
        }
        while ($row2=mysql_fetch_array($sql3)) {
            $totalh=$row2['totalh'];
        }
        while ($row=mysql_fetch_array($sql)) {
            $topic_desc=$row['shs_topic_desc'];
            $num_of_hours=$row['shs_num_of_hours'];
            echo "<tr>
                    <td>
                        <b>".$topic_desc."</b>
                    </td>
                    <td align='center'>
                        ".$num_of_hours."
                    </td>
                    <td align='center'>
                        ".number_format($totalni / $totalh * $num_of_hours,2)."
                    </td>
                    <td>";$this->shsgettosnum($tq,$topic_desc,1); 
                    echo"</td><td>";$this->shsgettosnum($tq,$topic_desc,2); 
                    echo"</td><td>";$this->shsgettosnum($tq,$topic_desc,3); 
                    echo"</td><td>";$this->shsgettosnum($tq,$topic_desc,4); 
                    echo"</td><td>";$this->shsgettosnum($tq,$topic_desc,5); 
                    echo"</td><td>";$this->shsgettosnum($tq,$topic_desc,6); 
                    echo"</td>
                </tr>";
        }
        echo "<tr>
                <td align='right'>
                    Total Number of Hours
                </td>
                <td align='center'>
                    ".$totalh."
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
        </tr>";
        echo "<tr>
                <td align='right'>
                    Total Number of Items
                </td>
                <td align='center'>
                    ".$totalni."
                </td>
                <td align='center'>
                    ".$totalni."
                </td>
                <td align='center'>".$kno_ni."</td>
                <td align='center'>".$com_ni."</td>
                <td align='center'>".$app_ni."</td>
                <td align='center'>".$ana_ni."</td>
                <td align='center'>".$eva_ni."</td>
                <td align='center'>".$syn_ni."</td>
        </tr>";
        echo "<tr>
                <td align='right'>
                    Total Number of Points
                </td>
                <td align='center'>
                    ".$totalnp."
                </td>
                <td align='center'></td>
                <td align='center'>".$kno_np."</td>
                <td align='center'>".$com_np."</td>
                <td align='center'>".$app_np."</td>
                <td align='center'>".$ana_np."</td>
                <td align='center'>".$eva_np."</td>
                <td align='center'>".$syn_np."</td>
        </tr>";
        echo "<tr>
                <td colspan='3'></td>
                <td align='center'>".number_format($kno_np / $totalnp * 100,2)."%</td>
                <td align='center'>".number_format($com_np / $totalnp * 100,2)."%</td>
                <td align='center'>".number_format($app_np / $totalnp * 100,2)."%</td>
                <td align='center'>".number_format($ana_np / $totalnp * 100,2)."%</td>
                <td align='center'>".number_format($eva_np / $totalnp * 100,2)."%</td>
                <td align='center'>".number_format($syn_np / $totalnp * 100,2)."%</td>
        </tr>";
        $kno_npp=$kno_np / $totalnp * 100;
        $com_npp=$com_np / $totalnp * 100;
        $app_npp=$app_np / $totalnp * 100;
        $ana_npp=$ana_np / $totalnp * 100;
        $eva_npp=$eva_np / $totalnp * 100;
        $syn_npp=$syn_np / $totalnp * 100;
        $lots=$kno_npp+$com_npp;
        $hots=$app_npp+$ana_npp+$eva_npp+$syn_npp;
        echo "<tr>
                <td>TOTAL%</td>
                <td colspan='2'>100%</td>
                <td align='center'>LOTS:</td>
                <td align='center'>".number_format($lots,2)."%</td>
                <td align='center'>HOTS:</td>
                <td align='center' colspan='3'>".number_format($hots,2)."%</td>
        </tr>";
    }

    function gettoshead($tq,$dep){
        $this->loaddb();
        
        $sql=mysql_query("SELECT semester.semester, school_year.sy, major_exams.exam_period, subject_info.subject_name FROM tq INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN subject_info ON syllabus.course_info_id = subject_info.subject_info_id WHERE tq.tq_id = $tq");
        while ($row=mysql_fetch_array($sql)) {
            $semester=$row['semester'];
            $sy=$row['sy'];
            $exam_period=$row['exam_period'];
            $subject_name1=$row['subject_name'];
            
        }
        $sql1=mysql_query("SELECT exam_schedule.`start`, exam_schedule.`end` FROM tq INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id INNER JOIN exam_schedule ON exam_schedule.exam_id = major_exams.exam_id WHERE tq.tq_id = '".$tq."' AND exam_schedule.dep= '".$dep."'");
        while ($row1=mysql_fetch_array($sql1)) {
            $start=strtotime($row1['start']);
            $end=strtotime($row1['end']);
            $sstart=date('M d, Y',$start);
            $eend=date('M d, Y',$end);
            $date=$sstart." to ".$eend;
        }
        if (empty($start) AND empty($end)) {
            $date="Date not set ";
        }
        
        echo '
            <tr>
                <td>Subject: </td>
                <td colspan="8" class="subject"> '.$subject_name1.'</td>
            </tr>
            <tr>
                <td>Exam Date: </td>
                <td colspan="8">'.$date.'</td>
            </tr>
            <tr>
                <td>Period: </td>
                <td colspan="8">'.$exam_period.'</td>
            </tr>
            <tr>
                <td>Semester: </td>
                <td colspan="8">'.$semester.'</td>
            </tr>
            <tr>
                <td>School Year: </td>
                <td colspan="8">'.$sy.'</td>
            </tr>';
    }
    function shsgettoshead($tq){
        $this->loaddb();
        
        $sql=mysql_query("SELECT shs_subject.shs_subj_name, semester.semester, school_year.sy, major_exams.exam_period FROM shs_syll INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id WHERE shs_tq.shs_tq_id = '".$tq."'");
        while ($row=mysql_fetch_array($sql)) {
            $semester=$row['semester'];
            $sy=$row['sy'];
            $exam_period=$row['exam_period'];
            $subject_name1=$row['shs_subj_name'];
            
        }
        $sql1=mysql_query("SELECT exam_schedule.`start`, exam_schedule.`end` FROM major_exams INNER JOIN exam_schedule ON exam_schedule.exam_id = major_exams.exam_id INNER JOIN shs_tq ON shs_tq.exam_id = major_exams.exam_id WHERE shs_tq.shs_tq_id = $tq");
        while ($row1=mysql_fetch_array($sql1)) {
            $start=strtotime($row1['start']);
            $end=strtotime($row1['end']);
            $sstart=date('M d, Y',$start);
            $eend=date('M d, Y',$end);
            $date=$sstart." to ".$eend;
        }
        if (empty($start) AND empty($end)) {
            $date="Date not set ";
        }
        
        echo '
            <tr>
                <td>Subject: </td>
                <td colspan="8" class="subject"> '.$subject_name1.'</td>
            </tr>
            <tr>
                <td>Exam Date: </td>
                <td colspan="8">'.$date.'</td>
            </tr>
            <tr>
                <td>Period: </td>
                <td colspan="8">'.$exam_period.'</td>
            </tr>
            <tr>
                <td>Semester: </td>
                <td colspan="8">'.$semester.'</td>
            </tr>
            <tr>
                <td>School Year: </td>
                <td colspan="8">'.$sy.'</td>
            </tr>';
    }

    function getigo(){
        $this->loaddb();
        $sql=mysql_query("SELECT * From igo");
        while ($row=mysql_fetch_array($sql)) {
            $igo_id=$row['igo_id'];
            $iga=html_entity_decode($row['iga']);
            $igc=html_entity_decode($row['igc']);
            $igo=html_entity_decode($row['igo']);
            $igo_datetime=$row['igo_datetime'];
            $revise=$row['revise'];
            echo'<tr>
                <td>'.$igo_id.'</td>
                <td>'.$iga.'</td>
                <td>'.$igc.'</td>
                <td>'.$igo.'</td>
                <td>'.$igo_datetime.'</td>
                <td>'.$revise.'</td>
                <td>
                    <button type="button" class="btn btn-warning btn-xs glyphicon glyphicon-edit" data-toggle="modal" data-target="#editigo'.$igo_id.'"></button>
                    <div class="modal fade" id="del'.$igo_id.'" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><strong>Warning</strong></h4>
                          </div>
                          <div class="modal-body">
                            <form>
                              Are you sure you want to delete this IGO?
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                <button type="button" onclick="deleteigo('.$igo_id.')" data-dismiss="modal"  class="btn btn-primary">Yes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal fade" id="editigo'.$igo_id.'" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><strong>Edit IGO</strong></h4>
                          </div>
                          <div class="modal-body">
                            <form>
                            <div class="row">
                                <div class="col-xs-12">
                                  <div class="form-group">
                                    <label for="name">Institutional Graduate Attributes</label><br/>
                                    <input type="text" style="width:570px;" class="form-control" id="iga'.$igo_id.'" value="'.$iga.'">
                                    <input type="hidden" class="form-control" id="rev'.$igo_id.'" value="'.$revise.'">
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                  <div class="form-group">
                                    <label for="lname">Institutional Graduate Code</label><br/>
                                    <input type="text" style="width:570px;" class="form-control" id="igc'.$igo_id.'" value="'.$igc.'">
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                  <div class="form-group">
                                    <label for="lname">Institutional Graduate Outcomes</label><br/>
                                    <textarea rows="4"  style="width:570px; resize: vertical;"class="form-control" id="igo'.$igo_id.'" placeholder="Outcomes"  name="igon">'.$igo.'</textarea>
                                  </div>
                                </div>
                            </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" onclick="update('.$igo_id.')" data-dismiss="modal" class="btn btn-primary" id="'.$igo_id.'">Save</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                </td>
            </tr>
            ';
        }
        echo '
                
                    
                    
                </td>
            </tr>';
    }

    function getpgo($course){
        $this->loaddb();
        $sql=mysql_query("SELECT * From pgo WHERE course ='".$course."'");
        while ($row=mysql_fetch_array($sql)) {
            $pgo_id=$row['pgo_id'];
            $pga=html_entity_decode($row['pga']);
            $pgc=html_entity_decode($row['pgc']);
            $pgo=html_entity_decode($row['pgo']);
            $course=$row['course'];
            $year=$row['year'];
            $pgo_datetime=$row['pgo_datetime'];
            $revise=$row['revise'];
            $rev1= $revise+1;
            echo '<tr>      
                    <td>'.$pgo_id.'</td>
                    <td>'.$pga.'</td>
                    <td>'.$pgc.'</td>
                    <td>'.$pgo.'</td>
                    <td>'.$year.'</td>
                    <td>'.$pgo_datetime.'</td>
                    <td>'.$revise.'</td>
                    <td>
                        <button class="btn btn-warning btn-xs glyphicon glyphicon-edit" data-toggle="modal" data-target="#editpgo'.$pgo_id.'"></button>
                    </td>
                  </tr>
                    <div class="modal fade bd-example-modal-lg" id="editpgo'.$pgo_id.'" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><strong>Update PGO</strong></h4>
                          </div>
                          <form>
                          <div class="modal-body">
                            <form>
                              <div class="form-group">
                                <div class="col-xs-4">
                                  <label for="pga">Program Graduate Attributes</label>
                                  <input type="text" class="form-control" id="uppga'.$pgo_id.'" value="'.$pga.'">
                                  <input type="hidden" class="form-control" id="rev'.$pgo_id.'" value="'.$rev1.'">
                                </div>
                                <div class="col-xs-4">
                                  <label for="pgc">Program Graduate Code</label>
                                  <input type="text" class="form-control" id="uppgc'.$pgo_id.'" value="'.$pgc.'">
                                </div>
                                <div class="col-xs-4">
                                  <label for="course">Year</label>
                                  <input type="text" class="form-control" id="uppgoyear'.$pgo_id.'" value="'.$year.'">
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-xs-12">
                                  <label for="pgo">Program Graduate Outcomes</label>
                                  <textarea rows="4" style="width: 845px; resize: vertical;" class="form-control" id="uppgo'.$pgo_id.'" placeholder="Outcomes"  name="pgon">'.$pgo.'</textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-xs-12">
                                  <label for="course">IGO</label>
                                 ';
                                 $this->getpgodata2($pgo_id);
                            echo'
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" onclick="updatepgo('.$pgo_id.') " data-dismiss="modal" class="btn btn-primary">Update</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>';
        }
    }

    function getclodata($course){
        $this->loaddb();
        if ($course=="GEN") {
            $course="SHS";
        }
        $sql=mysql_query("SELECT * From pgo WHERE course ='".$course."'");
        echo "<div class='col-xs-12'>
                <div class='row'>
                    <div class='col-xs-2'><b><h5>Code</h5></b></div>
                    <div class='col-xs-2'><b><h5>Attributes</h5></b></div>
                    <div class='col-xs-8'><b><h5>Program Graduate Outcomes</h5></b></div>
                </div>
        ";

        while ($row=mysql_fetch_array($sql)) {
            $pgo_id=$row['pgo_id'];
            $pga=$row['pga'];
            $pgo=$row['pgo'];
            $pgc=$row['pgc'];
            echo "
                <div class='row'>
                    <div class='col-xs-2'>
                        <input type='checkbox' id='pgo1[]' class='checkpgo' value='".$pgo_id."' checked> ".$pgc."

                    </div>
                    <div class='col-xs-2'>
                        ".$pga."
                    </div>
                    <div class='col-xs-8'>
                        ".$pgo."
                    </div>
                </div>
                <br/>
            ";

        }
        echo "</div>";
    }

    function getpgodata(){
        $this->loaddb();
        $sql=mysql_query("SELECT * From igo");
        echo "<div class='col-xs-12'>
                <div class='row'>
                    <div class='col-xs-2'><b><h5>Code</h5></b></div>
                    <div class='col-xs-2'><b><h5>Attributes</h5></b></div>
                    <div class='col-xs-8'><b><h5>Institutional Graduate Outcomes</h5></b></div>
                </div>
        ";

        while ($row=mysql_fetch_array($sql)) {
            $igo_id=$row['igo_id'];
            $iga=$row['iga'];
            $igc=$row['igc'];
            $igo=$row['igo'];
            echo "
                <div class='row'>
                    <div class='col-xs-2'>
                        <input type='checkbox' id='pgo1[]' class='checkb' value='".$igo_id."' checked> ".$igc."

                    </div>
                    <div class='col-xs-2'>
                        ".$iga."
                    </div>
                    <div class='col-xs-8'>
                        ".$igo."
                    </div>
                </div>
                <br/>
            ";

        }
        echo "</div>";
    }
    function getpgodata2($pgo_id){
        $this->loaddb();
        $sql=mysql_query("SELECT * From igo");
        echo "<div class='col-xs-12'>
                <div class='row'>
                    <div class='col-xs-2'><b><h5>Code</h5></b></div>
                    <div class='col-xs-2'><b><h5>Attributes</h5></b></div>
                    <div class='col-xs-8'><b><h5>Institutional Graduate Outcomes</h5></b></div>
                </div>";

        while ($row=mysql_fetch_array($sql)) {
            $igo_id=$row['igo_id'];
            $iga=$row['iga'];
            $igc=$row['igc'];
            $igo=$row['igo'];
            $sql1=mysql_query("SELECT * From igo_pgo WHERE pgo_id='".$pgo_id."' AND igo_id='".$igo_id."'");
            while ($row1=mysql_fetch_array($sql1)) {
                $stat=$row1['status'];
                if ($stat=="checked") {
                    echo "
                        <div class='row'>
                            <div class='col-xs-2'>
                                <input type='checkbox' id='pgo[]' class='checkb".$pgo_id."' value='".$igo_id."' checked> ".$igc."

                            </div>
                            <div class='col-xs-2'>
                                ".$iga."
                            </div>
                            <div class='col-xs-8'>
                                ".$igo."
                            </div>
                        </div>
                        <br/>
                    ";

                }else{
                    echo "
                        <div class='row'>
                            <div class='col-xs-2'>
                                <input type='checkbox' id='pgo[]' class='checkb".$pgo_id."' value='".$igo_id."' > ".$igc."

                            </div>
                            <div class='col-xs-2'>
                                ".$iga."
                            </div>
                            <div class='col-xs-8'>
                                ".$igo."
                            </div>
                        </div>
                        <br/>
                    ";
                }
            }
            
            
        }
        echo "</div>";
    }

    function getclodata2($clo_id){
        $this->loaddb();
        $sql=mysql_query("SELECT * From pgo");
        echo "<div class='col-xs-12'>
                <div class='row'>
                    <div class='col-xs-4'><b><h5>Attributes</h5></b></div>
                    <div class='col-xs-8'><b><h5>Course Learning Outcomes</h5></b></div>
                </div>
        ";

        while ($row=mysql_fetch_array($sql)) {
            $pgo_id=$row['pgo_id'];
            $pga=$row['pga'];
            $pgo=$row['pgo'];
            $sql1=mysql_query("SELECT * From pgo_clo WHERE pgo_id='".$pgo_id."' AND clo_id='".$clo_id."'");
            while ($row1=mysql_fetch_array($sql1)) {
                $stat=$row1['status'];
                if ($stat=="checked") {
                    echo "
                        <div class='row'>
                            <div class='col-xs-4'>
                                <input type='checkbox' id='pgo[]' class='checkclo".$clo_id."' value='".$pgo_id."' checked> ".$pga."

                            </div>
                            <div class='col-xs-8'>
                                ".$pgo."
                            </div>
                        </div>
                        <br/>
                    ";

                }else{
                    echo "
                        <div class='row'>
                            <div class='col-xs-4'>
                                <input type='checkbox' id='pgo[]' class='checkclo".$clo_id."' value='".$pgo_id."' > ".$pga."

                            </div>
                            <div class='col-xs-8'>
                                ".$pgo."
                            </div>
                        </div>
                        <br/>
                    ";
                }
            }
            
            
        }
        echo "</div>";
    }

    function getemp(){
        ini_set('max_execution_time', 300);
        $this->connectdtrps();
        $emp_mobile="";
        $sql=mysql_query('SELECT employees.employee_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, employees.employee_mobile, employment.employment_job_title FROM employees INNER JOIN employment ON employment.employee_id = employees.employee_id');
        while ($row=mysql_fetch_array($sql)) {
            $emp_id=$row['employee_id'];
            $emp_fname=$row['employee_fname'];
            $emp_mname=$row['employee_mname'];
            $emp_lname=$row['employee_lname'];
            $emp_ext=$row['employee_ext'];
            $emp_mobile=$row['employee_mobile'];
            $this->insertemp($emp_id,$emp_fname,$emp_mname,$emp_lname,$emp_ext,$emp_mobile);
            $emp_mobile="";
        }
        $this->getemploy();
    }
    function insertemp($emp_id,$emp_fname,$emp_mname,$emp_lname,$emp_ext,$emp_mobile){
        $this->loaddb();
        $sql=mysql_query("SELECT employee_id FROM `employees` WHERE employee_id='".$emp_id."'");
        if (mysql_num_rows($sql)==0) {
            $query = 'INSERT INTO `employees` (`employee_id`, `employee_fname`,`employee_mname`, `employee_lname`, `employee_ext`, `employee_mobile`) VALUES ("'.$emp_id.'","'.$emp_fname.'","'.$emp_mname.'","'.$emp_lname.'", "'.$emp_ext.'", "'.$emp_mobile.'")';
            $result=mysql_query($query) or die("Query Failed employees: ".mysql_error());
        }else{
            $query= 'UPDATE employees SET employee_fname="'.$emp_fname.'", employee_mname="'.$emp_mname.'", employee_lname="'.$emp_lname.'", employee_ext="'.$emp_ext.'", employee_mobile="'.$emp_mobile.'" WHERE employee_id="'.$emp_id.'"';
            $result = mysql_query($query) or die("Query Failed update employees: ".mysql_error());
        }
    }

    function insertcur($id,$code,$name,$desc,$lec,$lab,$subj_code,$subj_type){
        $this->loaddb();
        if ($subj_type=="College") {
            $sql=mysql_query("SELECT subj_id FROM `subject` WHERE subj_id='".$id."'");
            if (mysql_num_rows($sql)==0) {
                $query = 'INSERT INTO `subject` (`subj_id`, `subj_code`,`subj_name`,`subj_desc`,`lec_unit`,`lab_unit`,`pre_requisite`) VALUES ("'.$id.'","'.$code.'","'.$name.'","'.$desc.'","'.$lec.'","'.$lab.'","'.$subj_code.'")';
                $result=mysql_query($query) or die("Query Failed 1insertcur: ".mysql_error());
            }else{
                $query= 'UPDATE subject SET subj_code="'.$code.'", subj_name="'.$name.'", subj_desc="'.$desc.'", lec_unit="'.$lec.'", lab_unit="'.$lab.'", pre_requisite="'.$subj_code.'" WHERE subj_id="'.$id.'"';
                $result = mysql_query($query) or die("Query Failed update insertcur: ".mysql_error());
            }
        }elseif ($subj_type=="Senior High"){
            $sql=mysql_query("SELECT shs_subj_id FROM `shs_subject` WHERE shs_subj_id='".$id."'");
            if (mysql_num_rows($sql)==0) {
                $query = 'INSERT INTO `shs_subject` (`shs_subj_id`, `shs_subj_code`,`shs_subj_name`,`shs_subj_desc`,`shs_lec_unit`,`shs_lab_unit`,`shs_pre_requisite`) VALUES ("'.$id.'","'.$code.'","'.$name.'","'.$desc.'","'.$lec.'","'.$lab.'","'.$subj_code.'")';
                $result=mysql_query($query) or die("Query Failed 1insertcur: ".mysql_error());
            }else{
                $query= 'UPDATE shs_subject SET shs_subj_code="'.$code.'", shs_subj_name="'.$name.'", shs_subj_desc="'.$desc.'", shs_lec_unit="'.$lec.'", shs_lab_unit="'.$lab.'", shs_pre_requisite="'.$subj_code.'" WHERE shs_subj_id="'.$id.'"';
                $result = mysql_query($query) or die("Query Failed update insertcur: ".mysql_error());
            }
        }
            
        $this->setsy();
    }
    function setsy(){
        $this->loaddb();
        $year=date("Y");
        $month=date("F");
        if ($month=="May" or$month=="June" or $month=="July" or $month=="August" or $month=="September" or $month=="October" or $month=="November" or $month=="December"){
            $year1=$year;
            $year2=$year+1;
        }else{
            $year1=$year-1;
            $year2=$year;
        }
        $effsy=$year1."-".$year2;
        $sql=mysql_query("SELECT school_year.sy FROM school_year WHERE school_year.sy = '".$effsy."'");
        if(mysql_num_rows($sql)==0){
            $query = 'INSERT INTO `school_year` (`sy`) VALUES ("'.$effsy.'")';
            $result=mysql_query($query) or die("Query Failed school_year: ".mysql_error());
        }
    }

    function insertdep($department_id,$dep_name,$dep_status){
        $this->loaddb();
        $sql=mysql_query("SELECT * FROM `department` WHERE department_id='".$department_id."'");
        if (mysql_num_rows($sql)==0) {
            $query = 'INSERT INTO `department` (`department_id`, `department_name`,`department_status`) VALUES ("'.$department_id.'","'.$dep_name.'","'.$dep_status.'")';
            $result=mysql_query($query) or die("Query Failed 1insertdep: ".mysql_error());
        }else{
            $query= 'UPDATE department SET department_name="'.$dep_name.'", department_status="'.$dep_status.'" WHERE department_id="'.$department_id.'"';
            $result = mysql_query($query) or die("Query Failed update insertdep: ".mysql_error());
        }
    }
    function insertup($up,$stat,$tq){
        $this->loaddb();
        if ($stat=="tq") {
            $query= 'UPDATE tq SET upload_tq="'.$up.'" WHERE tq_id="'.$tq.'"';
            $result = mysql_query($query) or die("Query Failed UPDATE tq SET upload_tq: ".mysql_error());
        }else if($stat=="tos"){
            $query= 'UPDATE tq SET upload_tos="'.$up.'" WHERE tq_id="'.$tq.'"';
            $result = mysql_query($query) or die("Query Failed UPDATE tq SET upload_tq: ".mysql_error());
        }else if ($stat=="tq1") {
            $query= 'UPDATE shs_tq SET shs_upload_tq="'.$up.'" WHERE shs_tq_id="'.$tq.'"';
            $result = mysql_query($query) or die("Query Failed UPDATE tq SET upload_tq: ".mysql_error());
        }else if($stat=="tos1"){
            $query= 'UPDATE shs_tq SET shs_upload_tos="'.$up.'" WHERE shs_tq_id="'.$tq.'"';
            $result = mysql_query($query) or die("Query Failed UPDATE tq SET upload_tq: ".mysql_error());
        }        
        
    }


    function getexamdate($period,$dep){
        $this->loaddb();
        $sql=mysql_query("SELECT exam_schedule.`start`, exam_schedule.`end` FROM exam_schedule INNER JOIN major_exams ON exam_schedule.exam_id = major_exams.exam_id WHERE major_exams.exam_period ='".$period."' AND exam_schedule.dep ='".$dep."'");
        if (mysql_num_rows($sql)==0) {
            echo "Date not set.";
        }else{
            while ($row=mysql_fetch_array($sql)) {
                $date="Exam date: ".$row['start']." to ".$row['end'];
                echo $date;
            }
        }
            
        
    }

    function getemploy(){
        $this->connectdtrps();
        $sql=mysql_query('SELECT employment.employment_job_title, employment.employment_id, employment.employment_status, employment.employee_id, employment.department_id FROM employees INNER JOIN employment ON employment.employee_id = employees.employee_id ');
        // WHERE employment.employment_job_title LIKE "%instructor%" OR employment.employment_job_title LIKE "%Program Head%" OR employment.employment_job_title LIKE "%Dean%" OR employment.employment_job_title LIKE "%Head- SHS%"
        while ($row=mysql_fetch_array($sql)) {
            $employ_id=$row['employment_id'];
            $employ_status=$row['employment_status'];
            
            if(stripos($row['employment_job_title'],"Dean") !== false){
                //$employ_job_title="Dean";
                $employ_job_title="Instructor";
            }
            elseif(stripos($row['employment_job_title'],"Program Head") !== false){
                //$employ_job_title="Program Head";
                $employ_job_title="Instructor";
            }
            elseif(stripos($row['employment_job_title'],"Instructor") !== false){
                $employ_job_title="Instructor";
            }
            elseif(stripos($row['employment_job_title'],"Head- SHS") !== false){
                //$employ_job_title="Dean";
                $employ_job_title="Instructor";
            }
            elseif(stripos($row['employment_job_title'],"Teacher") !== false){
                //$employ_job_title="Instructor";
                $employ_job_title="Instructor";
            }else{
                $employ_job_title=$row['employment_job_title'];
            }
            $emp_id=$row['employee_id'];
            $depart_id=$row['department_id'];
            $this->insertemploy($employ_id,$employ_status,$employ_job_title,$emp_id,$depart_id);
        }
        // $this->getss();
    }
    function getspemploy($empid,$depart_id){
        $this->connectdtrps();
        $sql=mysql_query('SELECT employment.employment_job_title, employment.employment_id, employment.employment_status, employment.employee_id, employment.department_id FROM employees INNER JOIN employment ON employment.employee_id = employees.employee_id WHERE employees.employee_id="'.$empid.'" ');
        while ($row=mysql_fetch_array($sql)) {
            $employ_id=$row['employment_id'];
            $employ_status=$row['employment_status'];
            $employ_job_title="Instructor";
            $emp_id=$row['employee_id'];
            
            $this->insertemploy($employ_id,$employ_status,$employ_job_title,$emp_id,$depart_id);
        }
    }
    function insertemploy($employ_id,$employ_status,$employ_job_title,$emp_id,$depart_id){
        $this->loaddb();
        $sql=mysql_query("SELECT employment_id FROM `employment` WHERE employment_id='".$employ_id."'");
        if (mysql_num_rows($sql)==0) {
            $query = 'INSERT INTO `employment` (`employment_id`, `employment_status`,`employment_job_title`, `employee_id`, `department_id`) VALUES ("'.$employ_id.'","'.$employ_status.'","'.$employ_job_title.'","'.$emp_id.'", "'.$depart_id.'")';
            $result=mysql_query($query) or die("Query Failed 1insertemploy: ".$employ_id.'","'.$employ_status.'","'.$employ_job_title.'","'.$emp_id.'", "'.$depart_id."".mysql_error());
        }else{
            $query= 'UPDATE employment SET employment_status="'.$employ_status.'", employment_job_title="'.$employ_job_title.'", employee_id="'.$emp_id.'", department_id="'.$depart_id.'" WHERE employment_id="'.$employ_id.'"';
            $result = mysql_query($query) or die("Query Failed update insertemploy: ".mysql_error());
        }
    }

    // function getss(){
    //     $this->connectcur();
    //     $sql=mysql_query('SELECT sched_subj.ss_id, sched_subj.employee_id, sched_subj.sem, sched_subj.sy, sched_subj.time_start, sched_subj.time_end, sched_day.abbreviation, sched_subj.subj_id FROM sched_subj INNER JOIN sched_day ON sched_subj.sd_id = sched_day.sd_id ');
    //     while ($row=mysql_fetch_array($sql)) {
    //         $ss_id=$row['ss_id'];
    //         $employee_id=$row['employee_id'];
    //         $subj_id=$row['subj_id'];
    //         $sem=$row['sem'];
    //         $sy=$row['sy'];
    //         $time_start=$row['time_start'];
    //         $time_end=$row['time_end'];
    //         $abbreviation=$row['abbreviation'];
    //         $ext=$abbreviation."-".$time_start."-".$time_end;
    //         $this->insertss1($ss_id,$employee_id,$subj_id,$sem,$sy,$ext);
    //     }
    // }

    // function insertss1($ss_id,$employee_id,$subj_id,$sem,$sy,$ext){
    //     $this->connectdtrps();
    //     $sql=mysql_query("SELECT * FROM `employment` WHERE employee_id = '".$employee_id."'");
    //     while ($row=mysql_fetch_array($sql)) {
    //         $employee_id1=$row['employment_id'];
    //         $this->insertss($ss_id,$employee_id1,$subj_id,$sem,$sy,$ext);
    //     }
    // }

    // function insertss($ss_id,$employee_id,$subj_id,$sem,$sy,$ext){
        
    //     $this->loaddb();
    //     $sql=mysql_query("SELECT ss_id FROM `sched_subj` WHERE ss_id='".$ss_id."'");
    //     if (mysql_num_rows($sql)==0) {
    //         $sql1=mysql_query("SELECT * FROM `school_year` WHERE sy='".$sy."'");
    //         if (mysql_num_rows($sql1)==0) {
    //             $query1 = 'INSERT INTO `school_year` (`sy`) VALUES ("'.$sy.'")';
    //             $result1=mysql_query($query1) or die("Query Failed 11: ".mysql_error());
    //             $sy_id=mysql_insert_id();
    //         }else{
    //             while ($row=mysql_fetch_array($sql1)) {
    //                 $sy_id=$row['sy_id'];
    //             }
    //         }
    //         $sql2=mysql_query("SELECT * FROM `semester` WHERE semester='".$sem."'");
    //         if (mysql_num_rows($sql2)==0) {
    //             $query2 = 'INSERT INTO `semester` (`semester`) VALUES ("'.$sem.'")';
    //             $result2=mysql_query($query2) or die("Query Failed 2: ".mysql_error());
    //             $sem_id=mysql_insert_id();
    //         }else{
    //             while ($row=mysql_fetch_array($sql2)) {
    //                 $sem_id=$row['sem_id'];
    //             }
    //         }
    //         if (empty($employee_id)) {
    //             $query = 'INSERT INTO `sched_subj` (`ss_id`,`sched`, `employment_id`,`subj_id`, `sem_id`, `sy_id`) VALUES ("'.$ss_id.'","'.$ext.'", NULL,"'.$subj_id.'","'.$sem_id.'", "'.$sy_id.'")';
    //             $result=mysql_query($query) or die("Query Failed 1sched_subj: ".mysql_error());
    //         }else{
    //             $query = 'INSERT INTO `sched_subj` (`ss_id`,`sched`, `employment_id`,`subj_id`, `sem_id`, `sy_id`) VALUES ("'.$ss_id.'","'.$ext.'","'.$employee_id.'","'.$subj_id.'","'.$sem_id.'", "'.$sy_id.'")';
    //             $result=mysql_query($query) or die("Query Failed 1sched_subj2: ".mysql_error());
    //         }
    //     }else{
    //         $sql1=mysql_query("SELECT * FROM `school_year` WHERE sy='".$sy."'");
    //         if (mysql_num_rows($sql1)==0) {
    //             $query1 = 'INSERT INTO `school_year` (`sy`) VALUES ("'.$sy.'")';
    //             $result1=mysql_query($query1) or die("Query Failed 1school_year: ".mysql_error());
    //             $sy_id=mysql_insert_id();
    //         }else{
    //             while ($row=mysql_fetch_array($sql1)) {
    //                 $sy_id=$row['sy_id'];
    //             }
    //         }
    //         $sql2=mysql_query("SELECT * FROM `semester` WHERE semester='".$sem."'");
    //         if (mysql_num_rows($sql2)==0) {
    //             $query2 = 'INSERT INTO `semester` (`semester`) VALUES ("'.$sem.'")';
    //             $result2=mysql_query($query2) or die("Query Failed 2: ".mysql_error());
    //             $sem_id=mysql_insert_id();
    //         }else{
    //             while ($row=mysql_fetch_array($sql2)) {
    //                 $sem_id=$row['sem_id'];
    //             }
    //         }
    //         if (empty($employee_id)) {
    //             $query= 'UPDATE sched_subj SET employment_id="NULL", subj_id="'.$subj_id.'", sem_id="'.$sem_id.'", sched="'.$ext.'", sy_id="'.$sy_id.'" WHERE ss_id="'.$ss_id.'"';
    //             $result = mysql_query($query) or die("Query Failed update insertss1: ".mysql_error());
    //         }else{
    //             $query= 'UPDATE sched_subj SET employment_id="'.$employee_id.'", subj_id="'.$subj_id.'", sem_id="'.$sem_id.'", sched="'.$ext.'", sy_id="'.$sy_id.'" WHERE ss_id="'.$ss_id.'"';
    //             $result = mysql_query($query) or die("Query Failed update insertss2: ".mysql_error());
    //         }
    //     }
    // }
    function getdeadlinedate($period,$dep){
        $this->loaddb();
        $sql=mysql_query("SELECT submission_sched.deadline FROM major_exams INNER JOIN submission_sched ON submission_sched.exam_id = major_exams.exam_id WHERE major_exams.exam_period ='".$period."' AND submission_sched.dep ='".$dep."'");
        if (mysql_num_rows($sql)==0) {
            echo "Date not set.";
        }else{
            while ($row=mysql_fetch_array($sql)) {
                $date="Deadline date: ".$row['deadline'];
                echo $date;
            }
        }
            
        
    }

    function saveaccess(){
        $this->loaddb();
        // var_dump($_POST);
        foreach($_POST['id'] as $row => $value){
            if (empty($_POST['username'][$row])){
            }else{
                $id=$_POST['id'][$row];
                $contact=$_POST['contact'][$row];
                $username=$_POST['username'][$row];
                $password=$_POST['password'][$row];
                $position=$_POST['position'][$row];
                if (isset($_POST['syllabus'.$id.''])) {
                    $syllabus=$_POST['syllabus'.$id.''];
                } else {
                    $syllabus="";
                }
                if (isset($_POST['tq'.$id.''])) {
                    $tq=$_POST['tq'.$id.''];
                } else {
                    $tq="";
                }
                if (isset($_POST['notification'.$id.''])) {
                    $notification=$_POST['notification'.$id.''];
                } else {
                    $notification="";
                }
                if (isset($_POST['queue'.$id.''])) {
                    $queue=$_POST['queue'.$id.''];
                } else {
                    $queue="";
                }
                if (isset($_POST['reports'.$id.''])) {
                    $reports=$_POST['reports'.$id.''];
                } else {
                    $reports="";
                }
                if (isset($_POST['setdate'.$id.''])) {
                    $setdate=$_POST['setdate'.$id.''];
                } else {
                    $setdate="";
                }
                $sql = "SELECT employment_id FROM user_access WHERE employment_id = '".$id."'";
                $result = mysql_query($sql);
                    if(mysql_num_rows($result)==0){
                        $query = "INSERT INTO `user_access` (`username`, `password`,`position`,`syllabus`, `tq`, `notification`, `queue`,`reports`, `setdate`, `employment_id`, `id`, `contact`, `status`) VALUES ('".$username."','".$password."','".$position."','".$syllabus."','".$tq."','".$notification."','".$queue."','".$reports."','".$setdate."','".$id."','".$_POST['admin_id']."','".$contact."','offline')";
                        $result=mysql_query($query) or die("Query Failed 1user_access: ".mysql_error());                        
                    }else{
                        $query = "UPDATE user_access SET username='".$username."',password='".$password."',position='".$position."',syllabus='".$syllabus."',tq='".$tq."',notification='".$notification."',queue='".$queue."',reports='".$reports."',setdate='".$setdate."', contact='".$contact."', status='offline' WHERE employment_id='".$id."'";
                        $result=mysql_query($query) or die("Query Failed 2: ".mysql_error());
                    }
                    
            }
        }
        echo "<meta http-equiv='refresh' content='0'>";
        
    }

    function copysyllabus($a,$b){
        $this->loaddb();
        $sql="SELECT syllabusstatus.syll_status_desc FROM syllabus INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id WHERE syllabus.syllabus_id ='".$a."'";
        $results = mysql_query($sql);
        while($row=mysql_fetch_array($results)){
            $syll_status_desc=$row['syll_status_desc'];
        }
        if ($syll_status_desc=="approved") {
            echo "<script type='text/javascript'>alert('Cannot copy syllabus, current syllabus already approved.');</script>";
        }else{
            $this->copysyllabus1($a,$b);
        }
        
    }

    function copysyllabus1($a,$b){
        $this->loaddb();
        $sqls1="SELECT topics.topics_id FROM topics WHERE topics.syllabus_id = $a";
        $results1 = mysql_query($sqls1);
        if(!$results1){
            
        }else{
            while($row=mysql_fetch_array($results1)){
                $topics_id=$row['topics_id'];
                $del1 = "DELETE FROM subtopic WHERE topics_id='".$topics_id."'";
                $resulta1=mysql_query($del1) or die("Query Failed subtopics: ".mysql_error());
            }
        }
        // $sql4a="SELECT syllabus.ss_id FROM syllabus WHERE syllabus.syllabus_id = $a";
        // $res4a = mysql_query($sql4a);
        // while($row=mysql_fetch_array($res4a)){
        //     $main1=$row['ss_id'];
            $del8 = "DELETE FROM author WHERE syllabus_id='".$a."'";
            $result8=mysql_query($del8) or die("Query Failed author: ".mysql_error());
            // $dela8 = "DELETE FROM author WHERE ss_id='".$main1."'";
            // $resulta8=mysql_query($dela8) or die("Query Failed author: ".mysql_error());
        // }

        $del3 = "DELETE FROM topics WHERE syllabus_id='".$a."'";
        $result3=mysql_query($del3) or die("Query Failed topics: ".mysql_error());
        $del4 = "DELETE FROM course_req WHERE syllabus_id='".$a."'";
        $result4=mysql_query($del4) or die("Query Failed course_req: ".mysql_error());
        $del6 = "DELETE FROM reference WHERE syllabus_id='".$a."'";
        $result6=mysql_query($del6) or die("Query Failed reference: ".mysql_error());
        $del9 = "DELETE FROM policies WHERE syllabus_id='".$a."'";
        $result9=mysql_query($del9) or die("Query Failed policies: ".mysql_error());
        $sqld= mysql_query("SELECT clo_ilo.clo_id FROM clo_ilo WHERE clo_ilo.syllabus_id = '".$a."'");
        if(!$sqld){
            
        }else{
            while ($rowf=mysql_fetch_array($sqld)) {
                $clo_id=$rowf['clo_id'];
                $sql= mysql_query("SELECT pgo_clo.pgoclo_id FROM pgo_clo WHERE pgo_clo.clo_id = $clo_id");
                while ($row1=mysql_fetch_array($sql)) {
                    $pgoclo_id1=$row1['pgoclo_id'];
                    $del7 = "DELETE FROM pgo_clo WHERE pgoclo_id ='".$pgoclo_id1."'";
                    $result7=mysql_query($del7) or die("Query Failed syllabus_pgo: ".mysql_error());
                }
                $del8 = "DELETE FROM clo_ilo WHERE clo_id ='".$clo_id."'";
                $result8=mysql_query($del8) or die("Query Failed syllabus_pgo: ".mysql_error());

            }
        }
            
        // $del7 = "DELETE pgo_clo, clo_ilo FROM clo_ilo INNER JOIN pgo_clo ON pgo_clo.clo_id = clo_ilo.clo_id WHERE clo_ilo.syllabus_id ='".$a."'";
        // $result7=mysql_query($del7) or die("Query Failed syllabus_pgo: ".mysql_error());


        // $sql2="SELECT course_learning_outcomes.ILO_ID FROM course_learning_outcomes WHERE course_learning_outcomes.syllabus_id = $b";
        // $res2 = mysql_query($sql2);
        // while($row=mysql_fetch_array($res2)){
        //  $ILO_ID=$row['ILO_ID'];
        //  $query = "INSERT INTO `course_learning_outcomes` (`ILO_ID`, `syllabus_id`) VALUES ('".$ILO_ID."','".$a."')";
        //  $res=mysql_query($query) or die("Query Failed :INSERT INTO `course_learning_outcomes` ".mysql_error()); 
        // }
        // $sql3="SELECT syllabus_pgo.pgo_id FROM syllabus_pgo WHERE syllabus_pgo.syllabus_id = $b";
        // $res3 = mysql_query($sql3);
        // while($row=mysql_fetch_array($res3)){
        //  $pgo_id=$row['pgo_id'];
        //  $query = "INSERT INTO `syllabus_pgo` (`pgo_id`, `syllabus_id`) VALUES ('".$pgo_id."','".$a."')";
        //  $res=mysql_query($query) or die("Query Failed :INSERT INTO `syllabus_pgo` ".mysql_error()); 
        // }
        $sqlclo =mysql_query("SELECT clo_ilo.clo_id, clo_ilo.cloc, clo_ilo.clod, clo_ilo.clo_datetime, clo_ilo.revise FROM clo_ilo WHERE clo_ilo.syllabus_id = $b");
        while ($row=mysql_fetch_array($sqlclo)) {
            $clo_id=$row['clo_id'];
            $cloc=mysql_real_escape_string($row['cloc']);
            $clod=mysql_real_escape_string($row['clod']);
            $clo_datetime=$row['clo_datetime'];
            $revise=$row['revise'];
            $query1 = "INSERT INTO `clo_ilo` (`cloc`, `clod`, `clo_datetime`, `revise`, `syllabus_id`) VALUES ('".$cloc."','".$clod."','".$clo_datetime."','".$revise."','".$a."')";
            $res1=mysql_query($query1) or die("Query Failed :INSERT INTO `clo_ilo` ".mysql_error());
            $insertid=mysql_insert_id();

            $sqlm= mysql_query("SELECT pgo_clo.pgoclo_id, pgo_clo.pgo_id, pgo_clo.`status` FROM pgo_clo WHERE pgo_clo.clo_id = '".$clo_id."'");
            while ($row1m=mysql_fetch_array($sqlm)) {
                $pgoclo_id=$row1m['pgoclo_id'];
                $pgo_id=$row1m['pgo_id'];
                $status=$row1m['status'];
                $query11 = "INSERT INTO `pgo_clo` (`pgo_id`,clo_id, `status`) VALUES ('".$pgo_id."','".$insertid."','".$status."')";
                $res11=mysql_query($query11) or die("Query Failed :INSERT INTO `pgo_clo` ".mysql_error());
            }
        }
        $sql5="SELECT policies.late_tardiness, policies.absence, policies.miss_quiz, policies.permits, policies.cheating, policies.class_misbehavior, reference.ref_desc, course_req.cr_output, course_req.cr_desc FROM syllabus INNER JOIN policies ON policies.syllabus_id = syllabus.syllabus_id INNER JOIN reference ON reference.syllabus_id = syllabus.syllabus_id INNER JOIN course_req ON course_req.syllabus_id = syllabus.syllabus_id WHERE syllabus.syllabus_id = $b";
        $res5 = mysql_query($sql5);
        while($row=mysql_fetch_array($res5)){
            $late_tardiness=mysql_real_escape_string($row['late_tardiness']);
            $absence=mysql_real_escape_string($row['absence']);
            $miss_quiz=mysql_real_escape_string($row['miss_quiz']);
            $permits=mysql_real_escape_string($row['permits']);
            $cheating=mysql_real_escape_string($row['cheating']);
            $class_misbehavior=mysql_real_escape_string($row['class_misbehavior']);
            $ref_desc=mysql_real_escape_string($row['ref_desc']);
            $cr_output=mysql_real_escape_string($row['cr_output']);
            $cr_desc=mysql_real_escape_string($row['cr_desc']);
            $query1 = "INSERT INTO `policies` (`late_tardiness`, `absence`, `miss_quiz`, `permits`, `cheating`, `class_misbehavior`, `syllabus_id`) VALUES ('".$late_tardiness."','".$absence."','".$miss_quiz."','".$permits."','".$cheating."','".$class_misbehavior."','".$a."')";
            $res1=mysql_query($query1) or die("Query Failed :INSERT INTO `policies` ".mysql_error()); 
            $query2 = "INSERT INTO `reference` (`ref_desc`, `syllabus_id`) VALUES ('".$ref_desc."','".$a."')";
            $res2=mysql_query($query2) or die("Query Failed :INSERT INTO `reference` ".mysql_error());
            $query3 = "INSERT INTO `course_req` (`cr_output`, `cr_desc`, `syllabus_id`) VALUES ('".$cr_output."','".$cr_desc."','".$a."')";
            $res3=mysql_query($query3) or die("Query Failed :INSERT INTO `course_req` ".mysql_error());
        }
        $sql6="SELECT topics.topics_id, topics.topic_description, topics.`week`, topics.tla, topics.resources, topics.oba, topics.exam_id, topics.ilo, topics.idsa, topics.assessment, topics.ep FROM topics WHERE topics.syllabus_id = $b";
        $res6 = mysql_query($sql6);
        if(!$res6){
            
        }else{
            while($row=mysql_fetch_array($res6)){
                $topics_id=$row['topics_id'];
                $topic_description=mysql_real_escape_string($row['topic_description']);
                $week=mysql_real_escape_string($row['week']);
                $tla=mysql_real_escape_string($row['tla']);
                $resources=mysql_real_escape_string($row['resources']);
                $oba=mysql_real_escape_string($row['oba']);
                $ilo=mysql_real_escape_string($row['ilo']);
                $idsa=mysql_real_escape_string($row['idsa']);
                $assessment=mysql_real_escape_string($row['assessment']);
                $ep=mysql_real_escape_string($row['ep']);
                $exam_id=$row['exam_id'];
                $query = "INSERT INTO `topics` (`topic_description`, `ilo`, `week`, `tla`, `resources`, `oba`, `syllabus_id`, `exam_id`, `idsa`, `assessment`, `ep`) VALUES ('".$topic_description."','".$ilo."','".$week."','".$tla."','".$resources."','".$oba."','".$a."','".$exam_id."','".$idsa."','".$assessment."','".$ep."')";
                $res=mysql_query($query) or die("Query Failed :INSERT INTO `topics` ".mysql_error()); 
                $sql6a="SELECT topics.topics_id FROM topics WHERE topics.syllabus_id = $a AND topics.`week` = $week";
                $res6a = mysql_query($sql6a);
                if(!$res6a){
            
                }else{
                    while($row=mysql_fetch_array($res6a)){
                        $topics_idnew=$row['topics_id'];
                        $sql7="SELECT subtopic.subtopic_description FROM subtopic WHERE subtopic.topics_id = $topics_id";
                        $res7 = mysql_query($sql7);
                        if(!$res7){
            
                        }else{
                            while($row=mysql_fetch_array($res7)){
                                $subtopic_description=mysql_real_escape_string($row['subtopic_description']);
                                $query2 = "INSERT INTO `subtopic` (`subtopic_description`,`topics_id`) VALUES ('".$subtopic_description."','".$topics_idnew."')";
                                $res2=mysql_query($query2) or die("Query Failed :INSERT INTO `subtopic` ".mysql_error());
                            }
                        }
                        // $sql8="SELECT course_learning_outcomes.ILO_ID FROM topics INNER JOIN topic_ilo ON topic_ilo.topics_id = topics.topics_id INNER JOIN course_learning_outcomes ON topic_ilo.CLO_id = course_learning_outcomes.CLO_id WHERE topics.topics_id = $topics_id";
                        // $res8 = mysql_query($sql8);
                        // if(!$res8){
            
                        // }else{
                        //  while($row=mysql_fetch_array($res8)){
                        //      $ILO_ID=$row['ILO_ID'];
                        //  }
                        //  $sql9="SELECT course_learning_outcomes.CLO_id FROM course_learning_outcomes WHERE course_learning_outcomes.ILO_ID = $ILO_ID AND course_learning_outcomes.syllabus_id = $a";
                        //  $res9 = mysql_query($sql9);
                        //  while($row=mysql_fetch_array($res9)){
                        //      $CLO_id=$row['CLO_id'];
                        //  }

                        //  $query2 = "INSERT INTO `topic_ilo` (`CLO_id`,`topics_id`) VALUES ('".$CLO_id."','".$topics_idnew."')";
                        //  $res2=mysql_query($query2) or die("Query Failed :INSERT INTO `topic_ilo` ".mysql_error());
                        // }

                    }
                }
            }
        }
        $sqldoc="SELECT doc_info.revision, doc_info.effectivity, doc_info.version, doc_info.qms FROM doc_info WHERE doc_info.syllabus_id = $b";
        $resdoc = mysql_query($sqldoc);
        while($row=mysql_fetch_array($resdoc)){
            $revision=$row['revision'];
            $effectivity=$row['effectivity'];
            $version=$row['version'];
            $qms=$row['qms'];
            $sqldoc1="SELECT doc_info.doc_id FROM doc_info WHERE doc_info.syllabus_id = $a";
            $resdoc1 = mysql_query($sqldoc1);
           if (mysql_num_rows($resdoc1)==0) {
                $query = "INSERT INTO `doc_info` (`doc_id`, `revision`, `effectivity`, `version`, `qms`, `syllabus_id`) VALUES ('','".$revision."','".$effectivity."','".$version."','".$qms."','".$a."')";
                $res=mysql_query($query) or die("Query Failed :INSERT INTO `doc_info` ".mysql_error()); 
            }else{
                $query = "UPDATE doc_info SET revision='".$revision."', effectivity='".$effectivity."', version='".$version."', qms='".$qms."' WHERE syllabus_id='".$a."'";
                $result=mysql_query($query) or die("Query Failed UPDATEtopics: ".mysql_error());
            }
            
        }

        $sql4a="SELECT employees.employee_id FROM syllabus INNER JOIN sched_subj ON sched_subj.ss_id = syllabus.ss_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id WHERE syllabus.syllabus_id = $a";
        $res4a = mysql_query($sql4a);
        while($row=mysql_fetch_array($res4a)){
            $co=$row['employee_id'];
        }
        $sql4="SELECT employees.employee_id FROM syllabus INNER JOIN sched_subj ON sched_subj.ss_id = syllabus.ss_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id WHERE syllabus.syllabus_id = $b";
        $res4 = mysql_query($sql4);
        while($row=mysql_fetch_array($res4)){
                $main=$row['employee_id'];
        }
        $sql5="SELECT author.author_id FROM author WHERE author.syllabus_id = $a";
        $res5 = mysql_query($sql5);
        while($row=mysql_fetch_array($res5)){
                $author_id=$row['author_id'];
        }
        if (mysql_num_rows($res5)==0) {
            $queryd = "INSERT INTO `author` (`syllabus_id`, `main_author`, `co_author`) VALUES ('".$a."','".$main."','".$co."')";
            $resd=mysql_query($queryd) or die("Query Failed :INSERT INTO `authora` ".mysql_error()); 
        }else{
            $query = "UPDATE author SET syllabus_id='".$a."', main_author= '".$main."', co_author='".$co."' WHERE author_id='".$author_id."'";
        }
        
        echo "<script type='text/javascript'>alert('Copied Successfully!'); window.location.href='syllabus_index.php'</script>";
        

    }

    function loadauthor($syllabus_id){
        $this->loaddb();
        $sql="SELECT author.syllabus_id, author.main_author, author.co_author FROM author WHERE author.syllabus_id = '".$syllabus_id."'";
        $res = mysql_query($sql);
        if (mysql_num_rows($res)==1) {
            while($row=mysql_fetch_array($res)){
                $main_author=$row['main_author'];
                $co_author=$row['co_author'];
            }
            $sql1="SELECT employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, employees.employee_id FROM employees WHERE employees.employee_id = '".$main_author."'";
            $res1 = mysql_query($sql1);
            if($res1 === FALSE) {

            }else{
                while($row1=mysql_fetch_array($res1)){
                    $main=utf8_encode($row1['employee_fname'])." ".utf8_encode($row1['employee_mname'])." ".utf8_encode($row1['employee_lname'])." ".utf8_encode($row1['employee_ext']);
                }
            }
                
            $sql2="SELECT employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, employees.employee_id FROM employees WHERE employees.employee_id = '".$co_author."'";
            $res2 = mysql_query($sql2);
            if($res2 === FALSE) {

            }else{
                while($row2=mysql_fetch_array($res2)){
                    $co=utf8_encode($row2['employee_fname'])." ".utf8_encode($row2['employee_mname'])." ".utf8_encode($row2['employee_lname'])." ".utf8_encode($row2['employee_ext']);
                }
            }
                
            
            if ($main_author==$co_author) {
                
            }else{
                echo '<tr>
                <td align="center" class="col-xs-6"><b>'.$main.'</b></td>';
                echo '
                <td align="center" class="col-xs-6"><b>'.$co.'</b></td>';
                echo '<tr bgcolor="#FFCBA4" id="color3">
                <td align="center">Main Author</td>
                <td align="center">Co-Author</td>';
            }
        }
            
        
        
    }
    function loadrev($syllabus_id){
        $this->loaddb();
        $sql="SELECT * FROM revision WHERE revision.syllabus_id = '".$syllabus_id."'";
        $res = mysql_query($sql);
        if (mysql_num_rows($res)>0) {
            while($row=mysql_fetch_array($res)){
                $rev_no=mysql_real_escape_string($row['rev_no']);
                $issued_date=mysql_real_escape_string($row['issued_date']);
                $preparedby=mysql_real_escape_string($row['preparedby']);
                $reviewedby=mysql_real_escape_string($row['reviewedby']);
                $verifiedby=mysql_real_escape_string($row['verifiedby']);
                $approvedby=mysql_real_escape_string($row['approvedby']);
                $effectivity_date=mysql_real_escape_string($row['effectivity_date']);

                echo "<tr>
                    <td>".$rev_no."</td>
                    <td>".$issued_date."</td>
                    <td>".$preparedby."</td>
                    <td>".$reviewedby."</td>
                    <td>".$verifiedby."</td>
                    <td>".$approvedby."</td>
                    <td>".$effectivity_date."</td>
                </tr>";
            }
            
        }
            
        
        
    }

    function storedsyll($syllabus_id){
        $this->loaddb();
        $sql="SELECT author.syllabus_id, author.main_author, author.co_author FROM author WHERE author.syllabus_id = $syllabus_id";
        $result=mysql_query($sql);
        if (!$result) {
        }else{
            if (mysql_num_rows($result)==0) {
                echo "<i class=' createsyllabus'><input type='checkbox' name='rcheck' value='checked'> <span class='createsyllabustext'>Approve Syllabus</span></i>I hereby approve the above content of this syllabus.";
            }else{
                echo "<i class=' createsyllabus'><input type='checkbox' name='rcheck' value='checked' checked><span class='createsyllabustext'>Approve Syllabus</span></i>I hereby approve the above content of this syllabus.";
            }
        }
        
    }

    function syllremarks($syllabus_id){
        $this->loaddb();
        $sql="SELECT syllabus_remarks.remarks_desc, syllabus_remarks.date_time FROM syllabus_remarks WHERE syllabus_remarks.syllabus_id ='".$syllabus_id."'";
        $result=mysql_query($sql);
            echo '<div class="row">
                  <div class="col-lg-2">
                      <b>Date</b>
                    </div>
                    <div class="col-lg-10">
                      <b>Remarks</b>
                    </div>
                    </div><br/>';
            while ($row=mysql_fetch_array($result)) {
                $remarks_desc=$row['remarks_desc'];
                $date_time=$row['date_time'];
                    echo '<div class="row">
                      <div class="col-lg-2">
                          '.$date_time.'
                        </div>
                        <div class="col-lg-10">
                          '.$remarks_desc.'
                        </div>
                        </div><br/>';
                
            }
        
    }

    function loadprevioussyll($subj_id,$emp_id,$ss_id){
        $this->loaddb();
        $sql2 = "SELECT syllabus.syllabus_id FROM sched_subj INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id WHERE sched_subj.employment_id =  $emp_id AND subject.subj_id = $subj_id AND sched_subj.ss_id = $ss_id";
        $result2 = mysql_query($sql2);
            while($row1=mysql_fetch_array($result2)){
                $syllabus_del=$row1['syllabus_id'];
            }
        $sql ="SELECT syllabus.syllabus_id, syllabus.course_info_id, syllabus.ss_id, syllabusstatus.syll_status_desc, school_year.sy, semester.semester, employees.employee_fname, employees.employee_mname, employees.employee_lname, `subject`.subj_name FROM syllabus INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id WHERE sched_subj.subj_id = $subj_id AND syllabusstatus.syll_status_desc = 'approved' AND syllabus.syllabus_id <> $syllabus_del";
        $result = mysql_query($sql);
        
        if(!$result){
            echo 'Database Error!';
        }else{
            while($row=mysql_fetch_array($result)){
                $syllabus_id=$row['syllabus_id'];
                $course_info_id=$row['course_info_id'];
                $ss_id=$row['ss_id'];
                $semester =$row['semester'];
                $sy =$row['sy'];
                $employee_fname =utf8_encode($row['employee_fname']);
                $employee_mname =utf8_encode($row['employee_mname']);
                $employee_lname =utf8_encode($row['employee_lname']);
                $subj_name =$row['subj_name'];
                $fullname=$employee_fname." ".$employee_mname." ".$employee_lname;

                echo '<tr>
                  <td class="col-lg-2">
                    <form action="previewsyllabus.php" method="get" >
                    <input type="hidden" name="syllabus_del" class="form-control" value="'.$syllabus_del.'">
                    <input type="hidden" name="syllabus_id" class="form-control" value="'.$syllabus_id.'">
                    <input type="hidden" name="subject_name" class="form-control" value="'.$subj_name.'">
                    <input type="hidden" name="semester" class="form-control" value="'.$semester.'">
                    <input type="hidden" name="sy" class="form-control" value="'.$sy.'">
                    <a >'.$fullname.'</a>
                  </td>
                  <td class="col-lg-2">
                    <a >'.$semester.'</a>
                  </td>
                  <td class="col-lg-4">
                    <a >'.$sy.'</a>
                  </td>
                  <td class="col-lg-4">
                    <button type="submit" class="btn btn-default" name="preview"><a><i class="glyphicon glyphicon-eye-open createsyllabus"><span class="createsyllabustext">Preview</span></i></a></button>
                  </form>
                  </td>                  
                  </tr>';
            }

        }
        
    }

    function loadprevioussyll2($subj_id,$emp_id){
        $this->loaddb();
        $sql ="SELECT syllabus.syllabus_id, syllabus.course_info_id, syllabus.ss_id, syllabusstatus.syll_status_desc, school_year.sy, semester.semester, employees.employee_fname, employees.employee_mname, employees.employee_lname FROM syllabus INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id WHERE sched_subj.subj_id = $subj_id AND syllabusstatus.syll_status_desc = 'not printed' AND employment.employment_id != $emp_id";
        $result = mysql_query($sql);
        $sql2 = "SELECT syllabus.syllabus_id FROM sched_subj INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN unit_lecture ON unit_lecture.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id WHERE sched_subj.employment_id =  $emp_id AND subject.subj_id = $subj_id ";
        $result2 = mysql_query($sql2);
            while($row1=mysql_fetch_array($result2)){
                $syllabus_del=$row1['syllabus_id'];
            }
        if(!$result){
            echo 'Database Error!';
        }else{
            while($row=mysql_fetch_array($result)){
                $syllabus_id=$row['syllabus_id'];
                $course_info_id=$row['course_info_id'];
                $ss_id=$row['ss_id'];
                $semester =$row['semester'];
                $sy =$row['sy'];
                $employee_fname =utf8_encode($row['employee_fname']);
                $employee_mname =utf8_encode($row['employee_mname']);
                $employee_lname =utf8_encode($row['employee_lname']);
                $fullname=$employee_fname." ".$employee_mname." ".$employee_lname;

                echo '<tr>
                  <td class="col-lg-2">
                    <form action="previewsyllabus.php" method="get" >
                    <input type="hidden" name="syllabus_del" class="form-control" value="'.$syllabus_del.'">
                    <input type="hidden" name="syllabus_id" class="form-control" value="'.$syllabus_id.'">
                    <input type="hidden" name="semester" class="form-control" value="'.$semester.'">
                    <input type="hidden" name="sy" class="form-control" value="'.$sy.'">
                    <a >'.$semester.'</a>
                  </td>
                  <td class="col-lg-2">
                    <a >'.$sy.'</a>
                  </td>
                  <td class="col-lg-4">
                    <a >'.$fullname.'</a>
                  </td>
                  <td class="col-lg-4">
                    <button type="submit" class="btn btn-default" name="preview"><a><i class="glyphicon glyphicon-eye-open createsyllabus"><span class="createsyllabustext">Preview</span></i></a></button>
                  </form>
                  </td>                  
                  </tr>';
            }

        }
        
    }
    function getsub($emp_id){
        $this->loaddb();
        $sql = "SELECT sched_subj.ss_id, school_year.sy, semester.semester, `subject`.subj_name, `subject`.subj_code, `subject`.subj_desc FROM sched_subj INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id WHERE sched_subj.employment_id = $emp_id";
        $result = mysql_query($sql);
        if(!$result){
            echo '<tr><td>Error Database</td></tr>';
        }else{
            if (mysql_num_rows($result)==0) {
                echo '<tr><td>No subject found</td><td></td></tr>';            
            }else{
                while($row=mysql_fetch_array($result)){
                    $ss_id=$row['ss_id'];
                    $sy=$row['sy'];
                    $semester=$row['semester'];
                    $subj_name=$row['subj_name'];
                    $subj_code=$row['subj_code'];
                    $subj_desc=$row['subj_desc'];
                    echo '<tr>
                        <td>'.$subj_name.'</td>
                        <td><button type="button" class="btn btn-danger btn-xs glyphicon glyphicon-trash" ></button></td>
                    </tr>';
                }
            }
            
        }

    }
    function getsub2(){
        $this->loaddb();
        $sql = "SELECT * FROM `subject` ORDER BY `subject`.subj_name ASC  ";
        $result = mysql_query($sql);
        if(!$result){
            echo '<option value="">No Database</option>';
        }else{
            if (mysql_num_rows($result)==0) {
                echo '<option value="">No subject found</option>';            
            }else{
                while($row=mysql_fetch_array($result)){
                    $subj_id=$row['subj_id'];
                    $subj_name=$row['subj_name'];
                    $subj_code=$row['subj_code'];
                    echo '<option value="'.$subj_id.'">'.$subj_name.' ['.$subj_code.']</option>';
                }
            }
            
        }

    }
    function shsgetsub2(){
        $this->loaddb();
        $sql = "SELECT * FROM `shs_subject` ORDER BY `shs_subject`.shs_subj_name ASC  ";
        $result = mysql_query($sql);
        if(!$result){
            echo '<option value="">No Database</option>';
        }else{
            if (mysql_num_rows($result)==0) {
                echo '<option value="">No subject found</option>';            
            }else{
                while($row=mysql_fetch_array($result)){
                    $subj_id=$row['shs_subj_id'];
                    $subj_name=$row['shs_subj_name'];
                    $subj_code=$row['shs_subj_code'];
                    echo '<option value="'.$subj_id.'">'.$subj_name.' ['.$subj_code.']</option>';
                }
            }
            
        }

    }
    function getsub3(){
        $this->loaddb();
        $sql = "SELECT shs_subject.shs_subj_code, shs_subject.shs_subj_name, shs_subject.shs_subj_desc, shs_subject.shs_lec_unit, shs_subject.shs_lab_unit, shs_subject.shs_pre_requisite, shs_subject.shs_subj_id FROM shs_subject ORDER BY shs_subject.shs_subj_name ASC  ";
        $result = mysql_query($sql);
        if(!$result){
            echo '<option value="">No Database</option>';
        }else{
            if (mysql_num_rows($result)==0) {
                echo '<option value="">No subject found</option>';            
            }else{
                while($row=mysql_fetch_array($result)){
                    $subj_id=$row['shs_subj_id'];
                    $subj_name=$row['shs_subj_name'];
                    $subj_code=$row['shs_subj_code'];
                    echo '<option value="'.$subj_id.'">'.$subj_name.' ['.$subj_code.']</option>';
                }
            }
            
        }

    }

    function loadsub($emp_id){
        $this->loaddb();
        $month=date("F");
        $year=date("Y");
        $sql = "SELECT `subject`.subj_id, `subject`.subj_code, `subject`.subj_name, `subject`.subj_desc, school_year.sy_id, school_year.sy, sched_subj.ss_id, semester.semester, `subject`.lec_unit, `subject`.lab_unit, `subject`.pre_requisite, syllabusstatus.syll_status_desc, syllabusstatus.syll_rev_count, sched_subj.department FROM sched_subj INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN school_year ON school_year.sy_id = sched_subj.sy_id INNER JOIN semester ON semester.sem_id = sched_subj.sem_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id WHERE sched_subj.employment_id = $emp_id ";
        $result = mysql_query($sql);
        if(!$result){
            echo '<tr><td>No Subject</td></tr>';
        }else{
            while($row=mysql_fetch_array($result)){
                $ss_id=$row['ss_id'];
                $subj_id=$row['subj_id'];
                $subj_code=$row['subj_code'];
                $subj_name=$row['subj_name'];
                $subj_desc=$row['subj_desc'];
                $lec_unit=$row['lec_unit'];
                $lab_unit=$row['lab_unit'];
                $pre_requisite=$row['pre_requisite'];
                $sy=$row['sy'];
                $syll_status_desc=$row['syll_status_desc'];
                $syll_rev_count=$row['syll_rev_count'];
                $department=$row['department'];
                // $sy1=substr($sy, 0, -5);
                // $sy2=substr($sy, 5);
                
                $sem=$row['semester'];
                if ($syll_status_desc!="pending") {
                    $status=$syll_status_desc;
                }else{
                    if ($syll_rev_count>0) {
                        $status="revise";
                    }else{
                        $status=$syll_status_desc;
                    }
                }
                $lblcolor="";
                if ($status=="revise") {
                  $lblcolor="danger";
                }
                elseif ($status=="queue for ph" || $status=="queue for dean" ) {
                  $lblcolor="warning";
                }
                elseif ($status=="pending") {
                  $lblcolor="primary";
                }else{
                  $lblcolor="success";
                }
                
                echo '<tr>
                              <td class="col-lg-4">
                                <form action="syllabus.php" method="get" >
                                <input type="hidden" name="ss_id1" class="form-control" value="'.$ss_id.'">
                                <input type="hidden" name="emp_id" class="form-control" value="'.$emp_id.'">
                                <input type="hidden" name="subj_id" class="form-control" value="'.$subj_id.'">
                                <a >'.$subj_name.'</a>
                              </td>
                              <td class="col-lg-1">'.$department.'</td>
                              <td class="col-lg-1">'.$sy.'</td>
                              <td class="col-lg-1">'.$sem.'</td>
                              <td class="col-lg-2"><span class="col-xs-12 label label-'.$lblcolor.'">'.$status.'</span></td>
                              <td class="col-lg-1"><button type="submit" class="btn btn-default" id="" name="create"><a><i class="glyphicon glyphicon-pencil createsyllabus"><span class="createsyllabustext">Create / Edit<br>Syllabus</span></i></a></button></form></td>
                              <td class="col-lg-2">
                              <form action="syllabus_load1.php" method="get" >
                                <input type="hidden" name="ss_id1" class="form-control" value="'.$ss_id.'">
                                <input type="hidden" name="emp_id" class="form-control" value="'.$emp_id.'">
                                <input type="hidden" name="subj_id" class="form-control" value="'.$subj_id.'">
                                <input type="hidden" name="subj_name" class="form-control" value="'.$subj_name.'">
                                <button type="submit" class="btn btn-default" name="create"><a><i class="glyphicon glyphicon-download-alt createsyllabus"><span class="createsyllabustext">Copy <br>Syllabus</span></i></a></button></form>
                              </td>
                            </tr>';   

                // if ($month=="May" or $month=="June" or $month=="July" or $month=="August" or $month=="September" or $month=="October") {
                //     $semester= "First Semester";    
                //     if ($semester==$sem_id or $sem_id=="1st") {
                //         if ($sy1==$year) {
                //             echo '<tr>
                //               <td class="col-lg-7">
                //                 <form action="syllabus.php" method="get" >
                //                 <input type="hidden" name="ss_id1" class="form-control" value="'.$ss_id.'">
                //                 <input type="hidden" name="emp_id" class="form-control" value="'.$emp_id.'">
                //                 <input type="hidden" name="subj_id" class="form-control" value="'.$subj_id.'">
                //                 <a >'.$subj_name.'</a>
                //               </td>
                //               <td class="col-lg-2"><span class="col-xs-12 label label-'.$lblcolor.'">'.$status.'</span></td>
                //               <td class="col-lg-1"><button type="submit" class="btn btn-default" id="" name="create"><a><i class="glyphicon glyphicon-pencil createsyllabus"><span class="createsyllabustext">Create / Edit<br>Syllabus</span></i></a></button></form></td>
                //               <td class="col-lg-2">
                //               <form action="syllabus_load1.php" method="get" >
                //                 <input type="hidden" name="ss_id1" class="form-control" value="'.$ss_id.'">
                //                 <input type="hidden" name="emp_id" class="form-control" value="'.$emp_id.'">
                //                 <input type="hidden" name="subj_id" class="form-control" value="'.$subj_id.'">
                //                 <input type="hidden" name="subj_name" class="form-control" value="'.$subj_name.'">
                //                 <button type="submit" class="btn btn-default" name="create"><a><i class="glyphicon glyphicon-download-alt createsyllabus"><span class="createsyllabustext">Copy <br>Syllabus</span></i></a></button></form>
                //               </td>
                //             </tr>';                 
                //         }
                //     }
                                
                // }else if ($month=="November" or $month=="December" or $month=="January" or $month=="February" or $month=="March" or $month=="April") {
                //     $semester= "Second Semester";
                //     if ($semester==$sem_id or $sem_id=="2nd") {
                //         if ($sy2==$year) {
                //             echo '<tr>
                //               <td class="col-lg-7">
                //                 <form action="syllabus.php" method="get" >
                //                 <input type="hidden" name="ss_id1" class="form-control" value="'.$ss_id.'">
                //                 <input type="hidden" name="emp_id" class="form-control" value="'.$emp_id.'">
                //                 <input type="hidden" name="subj_id" class="form-control" value="'.$subj_id.'">
                //                 <a >'.$subj_name.'</a>
                //               </td>
                //               <td class="col-lg-2"><span class="col-xs-12 label label-'.$lblcolor.'">'.$status.'</span></td>
                //               <td class="col-lg-1"><button type="submit" class="btn btn-default" id="" name="create"><a><i class="glyphicon glyphicon-pencil createsyllabus"><span class="createsyllabustext">Create / Edit<br>Syllabus</span></i></a></button></form></td>
                //               <td class="col-lg-2">
                //               <form action="syllabus_load1.php" method="get" >
                //                 <input type="hidden" name="ss_id1" class="form-control" value="'.$ss_id.'">
                //                 <input type="hidden" name="emp_id" class="form-control" value="'.$emp_id.'">
                //                 <input type="hidden" name="subj_id" class="form-control" value="'.$subj_id.'">
                //                 <input type="hidden" name="subj_name" class="form-control" value="'.$subj_name.'">
                //                 <button type="submit" class="btn btn-default" name="create"><a><i class="glyphicon glyphicon-download-alt createsyllabus"><span class="createsyllabustext">Copy <br>Syllabus</span></i></a></button></form>
                //               </td>
                //             </tr>';                 
                //         }else if ($sy1==$year){
                //             echo '<tr>
                //               <td class="col-lg-7">
                //                 <form action="syllabus.php" method="get" >
                //                 <input type="hidden" name="ss_id1" class="form-control" value="'.$ss_id.'">
                //                 <input type="hidden" name="emp_id" class="form-control" value="'.$emp_id.'">
                //                 <input type="hidden" name="subj_id" class="form-control" value="'.$subj_id.'">
                //                 <a >'.$subj_name.'</a>
                //               </td><td class="col-lg-2"><span class="col-xs-12 label label-'.$lblcolor.'">'.$status.'</span></td>
                //               <td class="col-lg-1"><button type="submit" class="btn btn-default" id="" name="create"><a><i class="glyphicon glyphicon-pencil createsyllabus"><span class="createsyllabustext">Create / Edit<br>Syllabus</span></i></a></button></form></td>
                //               <td class="col-lg-2">
                //               <form action="syllabus_load1.php" method="get" >
                //                 <input type="hidden" name="ss_id1" class="form-control" value="'.$ss_id.'">
                //                 <input type="hidden" name="emp_id" class="form-control" value="'.$emp_id.'">
                //                 <input type="hidden" name="subj_id" class="form-control" value="'.$subj_id.'">
                //                 <input type="hidden" name="subj_name" class="form-control" value="'.$subj_name.'">
                //                 <button type="submit" class="btn btn-default" name="create"><a><i class="glyphicon glyphicon-download-alt createsyllabus"><span class="createsyllabustext">Copy <br>Syllabus</span></i></a></button></form>
                //               </td>
                //             </tr>';   
                //         }
                //     }
                // }
            }                                       
        }
        
    }
     function loaduploadedtq($subj_id,$tq_id1){
        $this->loaddb();
        $tq="tq";
        $tos="tos";
        $sql=mysql_query("SELECT tq.upload_tq, tq.upload_tos, tq.tq_id, employees.employee_lname, employees.employee_fname, employees.employee_mname, tqstatus.date_time, `subject`.subj_name FROM tq INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id WHERE tq.tq_id <> '".$tq_id1."' AND `subject`.subj_name LIKE '%".$subj_id."%' AND tq.upload_tq IS NOT NULL AND tq.upload_tos IS NOT NULL AND tqstatus.status_desc = 'printed' ORDER BY tqstatus.date_time ASC ");
        if(!$sql){
             echo "<tr><td>error</td><td>error</td><td></td></tr>";
        }else{
            while ($row=mysql_fetch_array($sql)) {
                $upload_tq=$row['upload_tq'];
                $upload_tos=$row['upload_tos'];
                $tq_id2=$row['tq_id'];
                $employee_fname=$row['employee_fname'];
                $employee_lname=$row['employee_lname'];
                $date_time=$row['date_time'];
                $full=$employee_fname." ".$employee_lname;
                echo "
                <tr>
                    <td>
                        ".$full."
                    </td>
                    <td>
                        ".$date_time."
                    </td>
                    <td>
                        <input type='hidden' name='dltqname' id='dltqname' class='form-control' value='".$upload_tq."'>
                        <input type='hidden' name='dltosname' id='dltosname' class='form-control' value='".$upload_tos."'>
                        <button class='btn btn-primary' id='dltq' name='dltq'>
                        <i class='glyphicon glyphicon-save-file dltq'><span class='dltqtext'>Download <br>TQ</span></i></button>
                        <button class='center btn btn-primary' id='dltos' name='dltos'>
                        <i class='glyphicon glyphicon-download dltos'><span class='dltostext'>Download <br>TOS</span></i></button>
                    </td>
                </tr>";

            }
        }
            
    }
    function shsloaduploadedtq($subj_id,$tq_id1){
        $this->loaddb();
        $tq="tq";
        $tos="tos";
        $sql=mysql_query("SELECT shs_tq.shs_tq_id, employees.employee_fname, employees.employee_lname, shs_tq.shs_upload_tos, shs_tq.shs_upload_tq, shs_tqstatus.shs_date_time FROM shs_syll INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN employment ON shs_syll.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id WHERE shs_tqstatus.shs_status_desc = 'printed' AND shs_tq.shs_tq_id <> '14' AND `shs_subject`.shs_subj_name LIKE '%".$subj_id."%' AND shs_tq.shs_upload_tq IS NOT NULL AND shs_tq.shs_upload_tos IS NOT NULL AND shs_tqstatus.shs_status_desc = 'printed' ORDER BY shs_tqstatus.shs_date_time ASC");
        if(!$sql){
             echo "<tr><td>error</td><td>error</td><td></td></tr>";
        }else{
            while ($row=mysql_fetch_array($sql)) {
                $upload_tq=$row['shs_upload_tq'];
                $upload_tos=$row['shs_upload_tos'];
                $tq_id2=$row['shs_tq_id'];
                $employee_fname=$row['employee_fname'];
                $employee_lname=$row['employee_lname'];
                $date_time=$row['shs_date_time'];
                $full=$employee_fname." ".$employee_lname;
                echo "
                <tr>
                    <td>
                        ".$full."
                    </td>
                    <td>
                        ".$date_time."
                    </td>
                    <td>
                        <input type='hidden' name='dltqname' id='dltqname' class='form-control' value='".$upload_tq."'>
                        <input type='hidden' name='dltosname' id='dltosname' class='form-control' value='".$upload_tos."'>
                        <button class='btn btn-primary' id='dltq' name='dltq'>
                        <i class='glyphicon glyphicon-save-file dltq'><span class='dltqtext'>Download <br>TQ</span></i></button>
                        <button class='center btn btn-primary' id='dltos' name='dltos'>
                        <i class='glyphicon glyphicon-download dltos'><span class='dltostext'>Download <br>TOS</span></i></button>
                    </td>
                </tr>";

            }
        }
            
    }
    function loadquiz($emp_id){
        $this->loaddb();
        $sql=mysql_query("SELECT quiz.quiz_id, quiz.quiz_name, quiz.q_date, `subject`.subj_name,`subject`.subj_id FROM quiz INNER JOIN `subject` ON quiz.subj_id = `subject`.subj_id WHERE quiz.user_id ='".$emp_id."'");
        while ($row=mysql_fetch_array($sql)) {
            $quiz_id=$row['quiz_id'];
            $subj_id=$row['subj_id'];
            $subj_name=$row['subj_name'];
            $quiz_name=$row['quiz_name'];
            $q_date=$row['q_date'];
            echo '<tr>
                <td class="col-lg-3">
                    '.$subj_name.'
                </td>
                <td class="col-lg-3">
                    '.$quiz_name.'
                </td>
                <td class="col-lg-3">
                    '.$q_date.'
                </td>
                <td class="col-lg-3">
                    <form action="createquiz.php" method="get" >
                        <input type="hidden" name="quiz_id" class="form-control" value="'.$quiz_id.'">
                        <input type="hidden" name="subj_id" class="form-control" value="'.$subj_id.'">
                        <input type="hidden" name="subj_name" class="form-control" value="'.$subj_name.'">
                        <input type="hidden" name="quiz_name" class="form-control" value="'.$quiz_name.'">
                        <input type="hidden" name="q_date" class="form-control" value="'.$q_date.'">
                        <button type="submit" class="btn btn-default" name="create"><a><i class="glyphicon glyphicon-pencil createsyllabus"><span class="createsyllabustext">Create <br>Quiz</span></i></a></button>
                    </form>
                   
                </td>
            </tr>';
        }
    }
    function shsloadquiz($emp_id){
        $this->loaddb();
        $sql=mysql_query("SELECT shs_quiz.shs_quiz_id, shs_quiz.shs_quiz_name, shs_quiz.shs_q_date, `shs_subject`.shs_subj_name,`shs_subject`.shs_subj_id FROM shs_quiz INNER JOIN `shs_subject` ON shs_quiz.shs_subj_id = `shs_subject`.shs_subj_id WHERE shs_quiz.user_id ='".$emp_id."'");
        while ($row=mysql_fetch_array($sql)) {
            $quiz_id=$row['shs_quiz_id'];
            $subj_id=$row['shs_subj_id'];
            $subj_name=$row['shs_subj_name'];
            $quiz_name=$row['shs_quiz_name'];
            $q_date=$row['shs_q_date'];
            echo '<tr>
                <td class="col-lg-3">
                    '.$subj_name.'
                </td>
                <td class="col-lg-3">
                    '.$quiz_name.'
                </td>
                <td class="col-lg-3">
                    '.$q_date.'
                </td>
                <td class="col-lg-3">
                    <form action="shscreatequiz.php" method="get" >
                        <input type="hidden" name="quiz_id" class="form-control" value="'.$quiz_id.'">
                        <input type="hidden" name="subj_id" class="form-control" value="'.$subj_id.'">
                        <input type="hidden" name="subj_name" class="form-control" value="'.$subj_name.'">
                        <input type="hidden" name="quiz_name" class="form-control" value="'.$quiz_name.'">
                        <input type="hidden" name="q_date" class="form-control" value="'.$q_date.'">
                        <button type="submit" class="btn btn-default" name="create"><a><i class="glyphicon glyphicon-pencil createsyllabus"><span class="createsyllabustext">Create <br>Quiz</span></i></a></button>
                    </form>
                   
                </td>
            </tr>';
        }
    }
// <button class="btn btn-primary glyphicon glyphicon-list-alt" data-toggle="modal" data-target="#addq1" onclick=""></button>

//                         <div class="modal fade" id="addq1" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
//                           <div class="modal-dialog modal-xs" role="document">
//                             <div class="modal-content">
//                               <div class="modal-header">
//                                 <button type="button" onclick="hidemodal()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
//                                 <h4 class="modal-title" id="myModalLabel"></h4>
//                               </div>
//                               <div class="modal-body">
//                               this is modal
                                
//                               </div>
//                               <div class="modal-footer">
//                                 <button type="button" class="btn btn-default" onclick="hidemodal()" style="width: 100px;" >Close</button>
//                               </div>
//                             </div>
//                           </div>
//                         </div>

    function submittodean($syllabus_id){
        $this->loaddb();
        $sql1="SELECT syllabusstatus.syll_status_desc FROM syllabus INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id WHERE syllabusstatus.syllabus_id = '".$syllabus_id."'";
        $result1=mysql_query($sql1);
        while ($row1=mysql_fetch_array($result1)) {
            $status_desc=$row1['syll_status_desc'];
            if ($status_desc=="pending") {
                $sql="SELECT topics.topics_id, topics.topic_description, topics.ilo, topics.`week`, topics.tla, topics.resources, topics.oba, topics.syllabus_id, topics.exam_id FROM topics WHERE topics.syllabus_id = '".$syllabus_id."' AND (topics.topic_description = 1 AND topics.ilo = 'Examination Week') OR (topics.topic_description = 2 AND topics.ilo = 'Examination Week') OR (topics.topic_description = 3 AND topics.ilo = 'Examination Week') OR (topics.topic_description = 4 AND topics.ilo = 'Examination Week')";
                $result=mysql_query($sql);
                if (mysql_num_rows($result)==4) {
                    $query = "UPDATE syllabusstatus SET syll_status_desc='queue for dean', syll_date_time= NOW(), syll_status=unread' WHERE syllabus_id='".$syllabus_id."'";
                    $result=mysql_query($query) or die("Query Failed UPDATEsyllabusstatus: ".mysql_error());
                    echo "<script type='text/javascript'>alert('Syllabus queued for checking'); window.locationhref='syllabus_index.php'</script>";
                }else{
                    echo "<script type='text/javascript'>alert('Please complete your topics for the semester');</script>";
                }
                
            }else if ($status_desc=="queue for dean") {
                echo "<script type='text/javascript'>alert('Syllabus is still in queue!');</script>";
            }else if ($status_desc=="approved") {
                echo "<script type='text/javascript'>alert('Syllabus is already approved!');</script>";
            }
        }
        
            

        
        
    }

    function loadsub2($emp_id){
        $this->loaddb();
        $month=date("F");
        $year=date("Y");
        $sql = "SELECT DISTINCT `subject`.subj_code, `subject`.subj_name, `subject`.subj_desc, syllabus.syllabus_id, `subject`.subj_id, school_year.sy, sched_subj.sem_id, semester.semester,sched_subj.department FROM sched_subj INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN topics ON topics.syllabus_id = syllabus.syllabus_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id WHERE syllabusstatus.syll_status_desc = 'approved' AND sched_subj.employment_id = $emp_id ORDER BY school_year.sy DESC, semester.semester DESC";
        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{
            if(mysql_num_rows($result)==0){
               
            }
            while($row=mysql_fetch_array($result)){
                $syllabus_id1=$row['syllabus_id'];
                $subj_id=$row['subj_id'];
                $subj_code=$row['subj_code'];
                $subj_name=$row['subj_name'];
                $subj_desc=$row['subj_desc'];
                $department=$row['department'];
                $sy=$row['sy'];
                $sy1=substr($sy, 0, -5);
                $sy2=substr($sy, 5);
                $sem=$row['semester'];
                $syllabus_id=$syllabus_id1;
                $this->loadsub3($syllabus_id,$subj_name,$emp_id,$subj_id,$sy,$sem,$department);
                // if ($month=="June" or $month=="July" or $month=="August" or $month=="September" or $month=="October") {
                //     $semester= "First Semester";    
                //     if ($semester==$sem_id OR $sem_id=="1st") {
                //         if ($sy1==$year) {
                //             $syllabus_id=$syllabus_id1;
                //             $this->loadsub3($syllabus_id,$subj_name,$emp_id,$subj_id);
                //         }
                //     }
                                
                // }else if ($month=="November" or $month=="December" or $month=="January" or $month=="February" or $month=="March") {
                //     $semester= "Second Semester";
                //     if ($semester==$sem_id OR $sem_id=="2nd") {
                //         if ($sy2==$year) {
                //             $syllabus_id=$syllabus_id1;
                //             $this->loadsub3($syllabus_id,$subj_name,$emp_id,$subj_id);
                //         }else if ($sy1==$year){
                //             $syllabus_id=$syllabus_id1;
                //             $this->loadsub3($syllabus_id,$subj_name,$emp_id,$subj_id);
                //         }
                //     }
                // }

            }                                       
        }
        
    }
    function loadsub4($emp_id){
        $this->loaddb();
        $sql = "SELECT shs_subject.shs_subj_name, shs_syll.shs_syll_id, school_year.sy, semester.semester FROM shs_syll INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN school_year ON shs_syll.sy_id = school_year.sy_id INNER JOIN semester ON shs_syll.sem_id = semester.sem_id WHERE shs_syll.employment_id ='".$emp_id."' ORDER BY school_year.sy DESC, semester.semester DESC ";
        $result = mysql_query($sql);
        if(!$result){
            $sub[]='Error Database';
        }else{
            if (mysql_num_rows($result)==0) {
                $sub[]='No subject found';            
            }else{
                while($row=mysql_fetch_array($result)){
                    $subj_name=$row['shs_subj_name'];
                    $shs_syll_id=$row['shs_syll_id'];
                    $sy1=$row['sy'];
                    $sem1=$row['semester'];
                    echo '<tr>
                            <td class="col-lg-4">'.$subj_name.'</td>
                            <td class="col-lg-2">'.$sy1.'</td>
                            <td class="col-lg-2">'.$sem1.'</td>';
                    $sql1 = mysql_query("SELECT shs_tq.shs_tq_id, shs_tqstatus.shs_status_desc, major_exams.exam_period FROM shs_tq INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN major_exams ON shs_tq.exam_id  = major_exams.exam_id WHERE shs_tq.shs_syll_id ='".$shs_syll_id."'");
                    $i=0;
                    if (!$sql1) {
                    }else{
                        while($row=mysql_fetch_array($sql1)){
                            $i++;
                            $shs_tq_id=$row['shs_tq_id'];
                            $shs_status_desc=$row['shs_status_desc'];
                            $exam_period=$row['exam_period'];
                            if ($i=="1") {
                                echo '<td class="col-lg-2"><button type="button" class="btn btn-default" onclick="shschecktos('.$shs_tq_id.','.$shs_syll_id.')" name="create" style="width: 150px;" data-toggle="modal" data-target="#shstosmodal"><a><i class="createtq"><b>'.$exam_period.'</b><span class="createtqtext">'.$shs_status_desc.'</span></i></a></button></td>';
                            }else{
                                echo '<td class="col-lg-2"><button type="button" class="btn btn-default" onclick="shschecktos('.$shs_tq_id.','.$shs_syll_id.')" name="create" style="width: 150px;" data-toggle="modal" data-target="#shstosmodal"><a><i class="createtq"><b>'.$exam_period.'</b><span class="createtqtext">'.$shs_status_desc.'</span></i></a></button></td>';
                                echo '<td class="col-lg-2"><form action="shssyllabus.php" method="get" >
                                <input type="hidden" name="shs_tq_id" class="form-control" value="'.$shs_tq_id.'">
                                <input type="hidden" name="shs_syll_id" class="form-control" value="'.$shs_syll_id.'">
                                <button type="submit" disabled style="width: 50px; height:33px;" class="btn btn-default" name="create"><a><i class="glyphicon glyphicon-print createsyllabus"><span class="createtqtext"></i></a></button></form>
                              </td></td>';

                            }
                            
                        }
                    }
                    echo '</tr>';    
                }
            }
        }
        
    }

    function loadtopic1($syllabus_id,$period){
        $this->loaddb();
        $sql=mysql_query("SELECT * FROM topics WHERE topics.syllabus_id =$syllabus_id AND topics.exam_id <=$period.");
        
            while ($row=mysql_fetch_array($sql)) {
                $td=$row['topic_description'];
                echo '<option value="'.$td.'">'.$td.'</option>';
            }
        
            
    }

    function loadsub3($syllabus_id,$subj_name,$emp_id,$subj_id,$sy,$sem,$dep){
        $this->loaddb();
        $sqltq = "SELECT * FROM tq WHERE tq.syllabus_id ='".$syllabus_id."'";
                $resulttq = mysql_query($sqltq);
                if(mysql_num_rows($resulttq)==0){
                    for ($i=1; $i < 5; $i++) { 
                        $query = "INSERT INTO `tq` (`syllabus_id`,`exam_id`) VALUES ('".$syllabus_id."','".$i."')";
                        $resultw1=mysql_query($query) or die("Query Failed :1 ".mysql_error()); 
                        $tqid=mysql_insert_id();
                        $query32 = "INSERT INTO `tqstatus` (`status_desc`, `revise_count`,`date_time`,`notif_status`,`tq_id`) VALUES ('pending',0,NOW(),'unread','".$tqid."')";
                        $resultw132=mysql_query($query32) or die("Query Failed :2 ".mysql_error());
                    }
                }
                $sql1 ="SELECT tqstatus.status_desc, major_exams.exam_period, tq.tq_id FROM syllabus INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN major_exams ON major_exams.exam_id = tq.exam_id WHERE syllabus.syllabus_id ='".$syllabus_id."' ORDER BY major_exams.exam_id ASC ";
                $result1 = mysql_query($sql1);
                $status1="";
                $status2="";
                echo '<tr>
                        <td class="col-lg-4">
                            <a >'.$subj_name.'</a>
                        </td><td class="col-lg-2">
                            <a >'.$dep.'</a>
                        </td><td class="col-lg-2">
                            <a >'.$sy.'</a>
                        </td><td class="col-lg-2">
                            <a >'.$sem.'</a>
                        </td>';
                    while($rows=mysql_fetch_array($result1)){
                        $status_desc=$rows['status_desc'];
                        $exam_period=$rows['exam_period'];
                        $tq_id=$rows['tq_id'];
                            
                        if ($status_desc=="pending") {
                            $status1="";
                            $status2="Create / Edit<br>Prelim TOS";
                        }else if ($status_desc=="printed") {
                            $status1="disabled";
                            $status2="TQ Printed";
                        }else if($status_desc=="queue for ph"){
                            $status1="disabled";
                            $status2="Queued for ph";
                        }else if($status_desc=="queue for dean"){
                            $status1="disabled";
                            $status2="Queued for dean";
                        }else if ($status_desc=="for printing") {
                            $status1="disabled";
                            $status2="Queued for printing";
                        }
                        if ($exam_period=="PRELIM") {
                            echo'<td class="col-lg-1">
                                        <button type="button" class="btn btn-default" onclick="checktos('.$tq_id.',1,'.$syllabus_id.')" name="create" style="width: 100px;" data-toggle="modal" data-target="#tosmodal">
                                          <a><i class="createtq"><b>Prelim</b><span class="createtqtext">'.$status2.'</span></i></a>
                                        </button>
                                      </td>';
                        }else if ($exam_period=="MIDTERM") {
                            echo'<td class="col-lg-1">
                                        <button type="button" class="btn btn-default" onclick="checktos('.$tq_id.',2,'.$syllabus_id.')" name="create" style="width: 100px;" data-toggle="modal" data-target="#tosmodal">
                                          <a><i class="createtq"><b>Midterm</b><span class="createtqtext">'.$status2.'</span></i></a>
                                        </button>
                                      </td>';
                        }else if ($exam_period=="PRE-FINAL") {
                            echo'<td class="col-lg-1">
                                        <button type="button" class="btn btn-default" onclick="checktos('.$tq_id.',3,'.$syllabus_id.')" name="create" style="width: 100px;" data-toggle="modal" data-target="#tosmodal">
                                          <a><i class="createtq"><b>Prefinal</b><span class="createtqtext">'.$status2.'</span></i></a>
                                        </button>
                                      </td>';
                        }else if ($exam_period=="FINAL") {
                            echo'<td class="col-lg-1">
                                        <button type="button" class="btn btn-default" onclick="checktos('.$tq_id.',4,'.$syllabus_id.')" name="create" style="width: 100px;" data-toggle="modal" data-target="#tosmodal">
                                          <a><i class="createtq"><b>Final</b><span class="createtqtext">'.$status2.'</span></i></a>
                                        </button>
                                      </td>
                                    </tr>';
                        }
                    }
                    echo '<div class="modal fade" id="tosmodal" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="myModalLabel"><strong> Create TOS</strong></h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                  <div class="col-xs-1">
                                    <label for="name">Topic</label>
                                  </div>
                                  <div class="col-xs-4">
                                    <select class="form-control input-xs pgocourse" name="pgocourse" id="pgocourse" required>
                                      <option></option>
                                     
                                    </select>
                                  </div>
                                  <div class="col-xs-5">
                                    <button type="button" class="btn btn-primary" style="width: 100px;" id="btn1">Add</button>
                                  </div>  
                                  <div class="col-xs-2">
                                    <button type="button" class="btn btn-primary" style="width: 100px;" onclick="calc()">Refresh</button>
                                  </div>  
                                </div>
                                <br/>
                                
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div id="topicfield">
                                      <div class="row" id="topic">
                                        <div class="col-xs-3">
                                          <b>Topic</b>
                                        </div>
                                        <div class="col-xs-1">
                                          <b>No. of Hours</b>
                                        </div>
                                        <div class="col-xs-1">
                                          <b>No. of Items</b>
                                        </div>
                                        <div class="col-xs-1">
                                          <b>Action</b>
                                        </div>
                                        <div class="col-xs-1">
                                          <b>Kno</b>
                                        </div>
                                        <div class="col-xs-1">
                                          <b>Com</b>
                                        </div>
                                        <div class="col-xs-1">
                                          <b>App</b>
                                        </div>
                                        <div class="col-xs-1">
                                          <b>Ana</b>
                                        </div>
                                        <div class="col-xs-1">
                                          <b>Eva</b>
                                        </div>
                                        <div class="col-xs-1">
                                          <b>Syn</b>
                                        </div>
                                      </div>
                                      <br/>
                                    </div>
                                  </div>
                                </div>
                                <br/>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div>
                                      <div class="row">
                                        <div class="col-xs-3">
                                          <b>Total No. of Hours:</b>
                                        </div>
                                        <div class="col-xs-1">
                                          <b><p class="totalh"></p></b>
                                        </div>
                                        <div class="col-xs-1">
                                          
                                        </div>
                                        <div class="col-xs-1">
                                          
                                        </div>
                                        <div class="col-xs-1">
                                          
                                        </div>
                                        <div class="col-xs-1">
                                          
                                        </div>
                                        <div class="col-xs-1">
                                          
                                        </div>
                                        <div class="col-xs-1">
                                          
                                        </div>
                                        <div class="col-xs-1">
                                          
                                        </div>
                                        <div class="col-xs-1">
                                          
                                        </div>
                                      </div>
                                      <br/>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div>
                                      <div class="row">
                                        <div class="col-xs-3">
                                          <b>Total No. of Items:</b>
                                        </div>
                                        <div class="col-xs-1">
                                          <b><p class="totalni"></p></b>
                                        </div>
                                        <div class="col-xs-1">
                                        </div>
                                        <div class="col-xs-1">
                                        </div>
                                        <div class="col-xs-1">
                                          <input type="text" class="form-control ni1" onchange="calc()" placeholder="No. of Items" >
                                        </div>
                                        <div class="col-xs-1">
                                          <input type="text" class="form-control ni2" onchange="calc()" placeholder="No. of Items" >
                                        </div>
                                        <div class="col-xs-1">
                                          <input type="text" class="form-control ni3" onchange="calc()" placeholder="No. of Items" >
                                        </div>
                                        <div class="col-xs-1">
                                          <input type="text" class="form-control ni4" onchange="calc()" placeholder="No. of Items" >
                                        </div>
                                        <div class="col-xs-1">
                                          <input type="text" class="form-control ni5" onchange="calc()" placeholder="No. of Items" >
                                        </div>
                                        <div class="col-xs-1">
                                          <input type="text" class="form-control ni6" onchange="calc()" placeholder="No. of Items" >
                                        </div>
                                      </div>
                                      <br/>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div>
                                      <div class="row">
                                        <div class="col-xs-3">
                                          <b>Total No. of Points:</b>
                                        </div>
                                        <div class="col-xs-1">
                                          <b><p class="totalnp"></p></b>
                                        </div>
                                        <div class="col-xs-1">
                                        </div>
                                        <div class="col-xs-1">
                                        </div>
                                        <div class="col-xs-1">
                                          <input type="text" class="form-control np1" onchange="calc()" placeholder="No. of Items" >
                                        </div>
                                        <div class="col-xs-1">
                                          <input type="text" class="form-control np2" onchange="calc()" placeholder="No. of Items" >
                                        </div>
                                        <div class="col-xs-1">
                                          <input type="text" class="form-control np3" onchange="calc()" placeholder="No. of Items" >
                                        </div>
                                        <div class="col-xs-1">
                                          <input type="text" class="form-control np4" onchange="calc()" placeholder="No. of Items" >
                                        </div>
                                        <div class="col-xs-1">
                                          <input type="text" class="form-control np5" onchange="calc()" placeholder="No. of Items" >
                                        </div>
                                        <div class="col-xs-1">
                                          <input type="text" class="form-control np6" onchange="calc()" placeholder="No. of Items" >
                                        </div>
                                      </div>
                                      <br/>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div>
                                      <div class="row">
                                        <div class="col-xs-3">
                                        </div>
                                        <div class="col-xs-1">
                                        </div>
                                        <div class="col-xs-1">
                                        </div>
                                        <div class="col-xs-1">
                                        </div>
                                        <div class="col-xs-1">
                                          <p class="knp"></p>
                                        </div>
                                        <div class="col-xs-1">
                                          <p class="cop"></p>
                                        </div>
                                        <div class="col-xs-1">
                                          <p class="app"></p>
                                        </div>
                                        <div class="col-xs-1">
                                          <p class="anp"></p>
                                        </div>
                                        <div class="col-xs-1">
                                          <p class="evp"></p>
                                        </div>
                                        <div class="col-xs-1">
                                          <p class="syp"></p>
                                        </div>
                                      </div>
                                      <br/>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <div>
                                      <div class="row">
                                        <div class="col-xs-3">
                                            <b>TOTAL:</b>
                                        </div>
                                        <div class="col-xs-1">
                                            <p class="ttal"></p>
                                        </div>
                                        <div class="col-xs-1">
                                          
                                        </div>
                                        <div class="col-xs-1">
                                          
                                        </div>
                                        <div class="col-xs-1">
                                            <i class="createtq"><b>LOTS:</b><span class="createtqtext">
                                            GEN-ED: LOTS percentage must be 35% - 45%.
                                            <br/> ITE & BA: LOTS <br/>percentage must be equal to 30%.
                                            </span></i>
                                        </div>
                                        <div class="col-xs-1">
                                            <b><p class="lots"></p></b>
                                        </div>
                                        <div class="col-xs-1">
                                            <i class="createtq"><b>HOTS:</b><span class="createtqtext">
                                            GEN-ED: HOTS percentage must be 55% - 65%
                                            <br/> ITE & BA: HOTS <br/>percentage must be equal to 70%.
                                            </span></i>
                                        </div>
                                        <div class="col-xs-1">
                                            <b><p class="hots"></p></b>
                                        </div>
                                        <div class="col-xs-1">
                                          
                                        </div>
                                        <div class="col-xs-1">
                                          
                                        </div>
                                      </div>
                                      <br/>
                                    </div>
                                  </div>
                                </div>
                                <br/>
                                
                                <div class="modal-footer">
                                  <form action="createtq.php" method="get">
                                    <button type="button" class="btn btn-default" data-dismiss="modal" style="width: 100px;">Close</button>
                                    <button type="button" onclick="saveprelimtos1()"  class="btn btn-primary" id="saveprelimtos" style="width: 100px;">Save</button>
                                    <input type="hidden" id="dep" class="dep" name="dep">
                                    <input type="hidden" id="tq_id" class="tq_id" name="tq_id">
                                    <input type="hidden" id="syllabus_id" class="syllabus_id" name="syllabus_id">
                                    <input type="hidden" id="period" class="period" name="period">
                                    <button type="submit" class="btn btn-primary" id="createtq" style="width: 100px;">Create TQ</button>
                                  </form>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>';
                }

    function createtq($syl){
        $this->loaddb();
        $sql = "SELECT sched_subj.ss_id, `subject`.subj_id, `subject`.subj_code, `subject`.subj_name, `subject`.subj_desc, `subject`.lec_unit, `subject`.lab_unit, `subject`.pre_requisite FROM sched_subj INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id WHERE sched_subj.employment_id = $emp_id AND subject.subj_id= $subj_id";
        $result = mysql_query($sql);
            while($row=mysql_fetch_array($result)){
                $ss_id=$row['ss_id'];
                $subj_id1=$row['subj_id'];
                $subj_code1=$row['subj_code'];
                $subj_name1=$row['subj_name'];
                $subj_desc1=$row['subj_desc'];
                $sql2 = "SELECT * FROM subject_info WHERE subject_name = '".$subj_name1."' AND subject_code = '".$subj_code1."'";
                $result2 = mysql_query($sql2);
                if(mysql_num_rows($result2)==0){
                    $query = "INSERT INTO `subject_info` (`subject_name`, `subject_code`,`subject_unit`,`subject_description`) VALUES ('".$subj_name1."','".$subj_code1."','".$subj_desc1."')";
                    $resultw1=mysql_query($query) or die("Query Failed :1 ".mysql_error());     
                }else{
                    while($row1=mysql_fetch_array($result2)){
                        $subj_id1=$row1['subject_info_id'];
                        $subj_name1=$row1['subject_name'];
                        $subj_code1=$row1['subject_code'];
                        $subj_desc1=$row1['subject_description'];
                        $pre_req=$row1['pre_requisites'];
                    }
                    $sql3 = "SELECT * FROM syllabus WHERE course_info_id = '".$subj_id1."' AND ss_id = '".$ss_id."'";
                    $result3 = mysql_query($sql3);
                    if(mysql_num_rows($result3)==0){
                      $querysy = "INSERT INTO `syllabus` (`course_info_id`, `ss_id`) VALUES ('".$subj_id1."','".$ss_id."')";
                      $resultw2=mysql_query($querysy) or die("Query Failed :2 ".mysql_error());     
                    
                    }
                }
            }
          
    }

    function createsyl(){
        $this->loaddb();
        $subj_id1=$_POST['subj_id1'];
        $syllabus_id=$_POST['syllabus_id'];
        $topics_id="";
        $maintopics=$_POST['maintopics'];
        $week=$_POST['week'];
        if ($week==1 OR $week==2 OR $week==3) {
            $period="1";
        }else if ($week==5 OR $week==6 OR $week==7) {
            $period="2";
        }else if ($week==9 OR $week==10) {
            $period="3";
        }else if ($week==12 OR $week==13) {
            $period="4";
        }
        $ILO_ID=$_POST['ilo'];
        $tla=$_POST['tla'];
        $resource=$_POST['resource'];
        $oba=$_POST['oba'];
        // echo "string".$syllabus_id;
        $sqlweek = "SELECT testbank.topics.topics_id FROM testbank.syllabus INNER JOIN testbank.topics ON testbank.topics.syllabus_id = testbank.syllabus.syllabus_id WHERE testbank.topics.`week` = '".$week."' AND testbank.topics.syllabus_id = '".$syllabus_id."' ";
        $resultweek= mysql_query($sqlweek);
        if(mysql_num_rows($resultweek)==0){
            $querytopic = "INSERT INTO `topics` (`topic_description`,`week`,`tla`,`resources`,`oba`,`syllabus_id`,`exam_id`) VALUES ('".$maintopics."','".$week."','".$tla."','".$resource."','".$oba."','".$syllabus_id."','".$period."')";
            $resultb1=mysql_query($querytopic) or die("Query Failed 5: ".mysql_error());
            $topics_id =mysql_insert_id();
            // $sqltopic = "SELECT topics_id FROM topics WHERE topic_description = '".$maintopics."' AND syllabus_id = '".$syllabus_id."'";
            // $resulttopics= mysql_query($sqltopic);
            // if(mysql_num_rows($resulttopics)==1){
            //  while($row2=mysql_fetch_array($resulttopics)){
            //      $topics_id=$row2['topics_id'];
            //  }
            // }
            if (isset($_POST['subtopics'][0])) {

                foreach($_POST['subtopics'] as $row => $value){
                    $subtopics=$_POST['subtopics'][$row];
                    if ($subtopics != "") {
                        $querysubt = "INSERT INTO `subtopic` (`subtopic_description`,`topics_id`) VALUES ('".$subtopics."','".$topics_id."')";
                        $resultb1=mysql_query($querysubt) or die($syllabus_id."Query Failed 6: ".mysql_error());
                    }
                    
                }
            }
            $querysubt = "INSERT INTO `topic_ilo` (`CLO_id`,`topics_id`) VALUES ('".$ILO_ID."','".$topics_id."')";
            $resultb1=mysql_query($querysubt) or die("Query Failed 6: ".mysql_error());
            echo "<script type='text/javascript'>alert('Saved!');</script>";
        }else{
            $resultweek2= mysql_query($sqlweek);
            while($row=mysql_fetch_array($resultweek2)){
                $topics_id=$row['topics_id'];

            }
            if (!empty($_POST['maintopics'])) {
                $query = "UPDATE topics SET topic_description='".$maintopics."' WHERE topics_id='".$topics_id."'";
                $result=mysql_query($query) or die("Query Failed UPDATEtopics: ".mysql_error());
            }
            if (!empty($_POST['period'])) {
                $query = "UPDATE topics SET exam_id='".$period."' WHERE topics_id='".$topics_id."'";
                $result=mysql_query($query) or die("Query Failed UPDATEperiod: ".mysql_error());
            }
            if (!empty($_POST['tla'])) {
                $query = "UPDATE topics SET tla='".$tla."' WHERE topics_id='".$topics_id."'";
                $result=mysql_query($query) or die("Query Failed UPDATEtla: ".mysql_error());
            }
            if (!empty($_POST['resource'])) {
                $query = "UPDATE topics SET resources='".$resource."' WHERE topics_id='".$topics_id."'";
                $result=mysql_query($query) or die("Query Failed UPDATEresources: ".mysql_error());
            }
            if (!empty($_POST['oba'])) {
                $query = "UPDATE topics SET oba='".$oba."' WHERE topics_id='".$topics_id."'";
                $result=mysql_query($query) or die("Query Failed UPDATEoba: ".mysql_error());
            }
            if (!empty($_POST['subtopics'][0])) {
                $del = "DELETE FROM subtopic WHERE topics_id='".$topics_id."'";
                $result2=mysql_query($del) or die("Query Failed subtopics: ".mysql_error());
            }
            if (isset($_POST['subtopics'][0])) {
                foreach($_POST['subtopics'] as $row => $value){
                    $subtopics=$_POST['subtopics'][$row];
                    if ($subtopics != "") {
                        $querysubt = "INSERT INTO `subtopic` (`subtopic_description`,`topics_id`) VALUES ('".$subtopics."','".$topics_id."')";
                        $resultb1=mysql_query($querysubt) or die($syllabus_id."Query Failed 6: ".mysql_error());
                    }
                }
            }
            if (!empty($_POST['ilo'])) {
                $sql = "SELECT * FROM topic_ilo WHERE topics_id='".$topics_id."'";
                $result= mysql_query($sql);
                if (!$result) {
                    $querysubt = "INSERT INTO `topic_ilo` (`CLO_id`,`topics_id`) VALUES ('".$ILO_ID."','".$topics_id."')";
                    $resultb1=mysql_query($querysubt) or die("Query Failed 6: ".mysql_error());
                }else{
                    $sqltopica = "DELETE FROM topic_ilo WHERE topics_id='".$topics_id."'";
                    $resulttopics2= mysql_query($sqltopica);
                    $querysubt = "INSERT INTO `topic_ilo` (`CLO_id`,`topics_id`) VALUES ('".$ILO_ID."','".$topics_id."')";
                    $resultb1=mysql_query($querysubt) or die("Query Failed 6: ".mysql_error());
                }
                
                
            }
            echo "<script type='text/javascript'>alert('Updated!');</script>";
        }
    }
    function loadweek1($syl){
        $this->loaddb();
        $sql="SELECT DISTINCT topics.`week` FROM topics WHERE topics.syllabus_id = ".$syl." ORDER BY topics.`week` ASC";
        //$sql="SELECT * FROM topics WHERE topics.syllabus_id = ".$syl." ORDER BY testbank.topics.`week` ASC, topics.topics_id ASC";
        $result= mysql_query($sql);
        while($row=mysql_fetch_array($result)){
            
            $no=$row['week'];
            $ses=0;
            $sql1="SELECT * FROM topics WHERE topics.syllabus_id = ".$syl." AND topics.`week` = '".$no."' ORDER BY topics.topics_id ASC";
            $result1= mysql_query($sql1);
            while($row1=mysql_fetch_array($result1)){
                $ses++;
                $id=$row1['topics_id'];
                $maintopics=$row1['topic_description'];
                $idsa=$row1['idsa'];
                $week=$row1['week'];
                $ass=$row1['assessment'];
                $ep=$row1['ep'];
                $period=$row1['exam_id'];
                $sub=$this->loadsubt($id);
                $p;
                if($period=="5"){
                    $p="Prelim";
                }else if($period=="6"){
                    $p="Midterm";
                }else if($period=="7"){
                    $p="Pre-Final";
                }else if($period=="8"){
                    $p="Final";
                }
                if ($maintopics=="5" and $idsa=="Examination Week" or  $maintopics=="6" and $idsa=="Examination Week" or $maintopics=="7" and $idsa=="Examination Week" or $maintopics=="8" and $idsa=="Examination Week") {
                    echo '<table border="solid" width="800"><tr bgcolor="#89C35C" id="color2">
                        <td colspan="5" align="center">'.$p.' Examination</td>
                      </tr>';
                }else{
                    if ($ses==1) {
                        echo "<table border='solid' width='800'>
                        <tr bgcolor='#89C35C' id='color2'>
                            <td align='center' width='15%'> Week No.".$week."</td>
                            <td width='25%'>Topic / Content</td>
                            <td align='center' width='20%'>Instructional Delivery/Strategies/Activities</td>
                            <td align='center' width='20%'>Assessment</td>
                            <td align='center' width='20%'>Evidence of Performance</td>
                        </tr>";
                    }
                    echo"
                    <tr>
                        <td align='center' width='15%'> Session ".$ses."</td>
                        <td width='25%'>".$maintopics."<br>".$sub."</td>
                        <td align='center' width='20%'>".$idsa."</td>
                        <td align='center' width='20%'>".$ass."</td>
                        <td align='center' width='20%'>".$ep."</td>
                    </tr>";

                }
            }
            echo "</table><br/>";
                
        }
        // while($row=mysql_fetch_array($result)){
        //     $id=$row['topics_id'];
        //     $maintopics=$row['topic_description'];
        //     $idsa=$row['idsa'];
        //     $week=$row['week'];
        //     $ass=$row['assessment'];
        //     $ep=$row['ep'];
        //     $period=$row['exam_id'];
        //     $sub=$this->loadsubt($id);
        //     $p;
        //     if($period=="5"){
        //         $p="Prelim";
        //     }else if($period=="6"){
        //         $p="Midterm";
        //     }else if($period=="7"){
        //         $p="Pre-Final";
        //     }else if($period=="8"){
        //         $p="Final";
        //     }
        //     if ($maintopics=="5" and $idsa=="Examination Week" or  $maintopics=="6" and $idsa=="Examination Week" or $maintopics=="7" and $idsa=="Examination Week" or $maintopics=="8" and $idsa=="Examination Week") {
        //         echo '<tr bgcolor="#89C35C" id="color2">
        //                 <td colspan="5" align="center">'.$p.' Examination</td>
        //               </tr>';
        //     }else{
        //         echo "<tr><td align='center'>".$week."</td>
        //          <td width='20%'>".$maintopics."<br>".$sub."<br></td>
        //          <td>".$idsa."</td>
        //          <td align='center'>".$ass."</td>
        //          <td align='center'>".$ep."</td></tr>"; 
        //     }
             
        // }
            
    }

    function loadweek($syl){
        $this->loaddb();
        $sql="SELECT DISTINCT topics.`week` FROM topics WHERE topics.syllabus_id = ".$syl." ORDER BY topics.`week` ASC";
        //$sql="SELECT * FROM topics WHERE topics.syllabus_id = ".$syl." ORDER BY testbank.topics.`week` ASC, topics.topics_id ASC";
        $result= mysql_query($sql);
        while($row=mysql_fetch_array($result)){
            
            $no=$row['week'];
            $ses=0;
            $sql1="SELECT * FROM topics WHERE topics.syllabus_id = ".$syl." AND topics.`week` = '".$no."' ORDER BY topics.topics_id ASC";
            $result1= mysql_query($sql1);
            while($row1=mysql_fetch_array($result1)){
                $ses++;
                $id=$row1['topics_id'];
                $maintopics=$row1['topic_description'];
                $idsa=$row1['idsa'];
                $week=$row1['week'];
                $ass=$row1['assessment'];
                $ep=$row1['ep'];
                $period=$row1['exam_id'];
                $sub=$this->loadsubt($id);
                $p;
                if($period=="5"){
                    $p="Prelim";
                }else if($period=="6"){
                    $p="Midterm";
                }else if($period=="7"){
                    $p="Pre-Final";
                }else if($period=="8"){
                    $p="Final";
                }
                if ($maintopics=="5" and $idsa=="Examination Week" or  $maintopics=="6" and $idsa=="Examination Week" or $maintopics=="7" and $idsa=="Examination Week" or $maintopics=="8" and $idsa=="Examination Week") {
                    echo '<table border="solid" width="800"><tr bgcolor="#89C35C" id="color2">
                        <td colspan="5" align="center">'.$p.' Examination</td>
                      </tr>';
                }else{
                    if ($ses==1) {
                        echo "<table border='solid' width='800'>
                        <tr bgcolor='#89C35C' id='color2'>
                            <td align='center' width='15%'> Week No.".$week."</td>
                            <td width='25%'>Topic / Content</td>
                            <td align='center' width='20%'>Instructional Delivery/Strategies/Activities</td>
                            <td align='center' width='20%'>Assessment</td>
                            <td align='center' width='20%'>Evidence of Performance</td>
                        </tr>";
                    }
                    echo"
                    <tr>
                        <td align='center' width='15%'> Session ".$ses."</td>
                        <td width='25%'>".$maintopics."<br>".$sub."</td>
                        <td align='center' width='20%'>".$idsa."</td>
                        <td align='center' width='20%'>".$ass."</td>
                        <td align='center' width='20%'>".$ep."</td>
                    </tr>";

                }
            }
            echo "</table><br/>";
                
        }
    }

    function shsloadweek($id){
        $this->loaddb();
        $sql="SELECT shs_topics.shs_topic_description FROM shs_topics WHERE shs_topics.shs_subj_id = '555' ORDER BY shs_topics.exam_id ASC, shs_topics.shs_topics_id ASC";
        $result= mysql_query($sql);
            while($row=mysql_fetch_array($result)){
                $shs_topic_description=$row['shs_topic_description'];
                    echo "<tr><td align='center'></td>
                     <td width='20%'>".$shs_topic_description."<br></td>
                     <td></td>
                     <td align='center'></td>
                     <td align='center'></td>
                     <td align='center'></td></tr>"; 
            }
            
    }
    
    

    function loadpgo($a){
        $this->loaddb();
        $sql="SELECT testbank.program_graduate_outcomes.graduate_attributes, testbank.program_graduate_outcomes.graduate_outcome_code, testbank.program_graduate_outcomes.graduate_outcome_description FROM testbank.program_graduate_outcomes INNER JOIN testbank.syllabus_pgo ON testbank.syllabus_pgo.pgo_id = testbank.program_graduate_outcomes.pgo_id WHERE testbank.syllabus_pgo.syllabus_id = $a AND testbank.syllabus_pgo.pgo_id = testbank.program_graduate_outcomes.pgo_id ";
        $result= mysql_query($sql);
        if(!$result){
            
        }else{
            while($row=mysql_fetch_array($result)){
                $graduate_attributes=$row['graduate_attributes'];
                $graduate_outcome_code=$row['graduate_outcome_code'];
                $graduate_outcome_description=$row['graduate_outcome_description'];

                 echo "<tr><td>".$graduate_attributes."</td>
                 <td>".$graduate_outcome_code."</td>
                 <td>".$graduate_outcome_description."</td></tr>";
            }
            
        }
    }

    function loadclo($a){
        $this->loaddb();
        $sql="SELECT testbank.ilo.ILO_description FROM testbank.ilo INNER JOIN testbank.course_learning_outcomes ON testbank.course_learning_outcomes.ILO_ID = testbank.ilo.ILO_ID WHERE testbank.course_learning_outcomes.syllabus_id = $a AND testbank.ilo.ILO_ID = testbank.course_learning_outcomes.ILO_ID";
        $result= mysql_query($sql);
        if(!$result){
            
        }else{
            while($row=mysql_fetch_array($result)){
                $ILO_description=$row['ILO_description'];

                 echo "<tr><td>".$ILO_description."</td></tr>";
            }
            
        }
    }

    function loadsubt($id2){
        $this->loaddb();
        $sql="SELECT subtopic.subtopic_id, subtopic.subtopic_description, subtopic.topics_id, topics.topics_id FROM topics INNER JOIN subtopic ON subtopic.topics_id = topics.topics_id WHERE subtopic.topics_id = '".$id2."'";
        $result= mysql_query($sql);
        $ret="";
        while($row=mysql_fetch_array($result)){
            $subtopic_description=$row['subtopic_description'];
            $ret=$ret.'&#8226;&nbsp;&nbsp;'.$subtopic_description.'<br>';
        }
        
        return $ret;
        
    }

    function checksub($tq_id){
        $this->loaddb();
        $sql="SELECT subject_info.subject_name FROM subject_info INNER JOIN syllabus ON syllabus.course_info_id = subject_info.subject_info_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id WHERE tq.tq_id = '".$tq_id."'";
        $result= mysql_query($sql);
        if (!$result) {
            
        }else{
            while($row=mysql_fetch_array($result)){
                $subject_name=$row['subject_name'];
                echo $subject_name."<br>";
            }
        }
        
    }
    function shschecksub($tq_id){
        $this->loaddb();
        $sql="SELECT shs_subject.shs_subj_name FROM shs_syll INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id WHERE shs_tq.shs_tq_id =  '".$tq_id."'";
        $result= mysql_query($sql);
        if (!$result) {
            
        }else{
            while($row=mysql_fetch_array($result)){
                $subject_name=$row['shs_subj_name'];
                echo $subject_name."<br>";
            }
        }
        
    }
    function checksub1($syllabus_id){
        $this->loaddb();
        $sql="SELECT subject_info.subject_name FROM syllabus INNER JOIN subject_info ON syllabus.course_info_id = subject_info.subject_info_id WHERE syllabus.syllabus_id = '".$syllabus_id."'";
        $result= mysql_query($sql);
        if (!$result) {
            
        }else{
            while($row=mysql_fetch_array($result)){
                $subject_name=$row['subject_name'];
                echo "<b>".$subject_name."</b><br>";
                echo "Version:";
            }
        }
        
    }
    function getdocinfo($syllabus_id,$type){
        $this->loaddb();
        if ($type=="rev") {
            $sql="SELECT doc_info.revision_status AS typ FROM doc_info WHERE doc_info.syllabus_id = '".$syllabus_id."'";
        }else if ($type=="eff") {
            $sql="SELECT doc_info.effectivity AS typ FROM doc_info WHERE doc_info.syllabus_id = '".$syllabus_id."'";
        }else if ($type=="qms") {
            $sql="SELECT doc_info.qms AS typ FROM doc_info WHERE doc_info.syllabus_id = '".$syllabus_id."'";
        }else if ($type=="ver") {
            $sql="SELECT doc_info.version AS typ FROM doc_info WHERE doc_info.syllabus_id = '".$syllabus_id."'";
        }else if ($type=="cur") {
            $sql="SELECT doc_info.curriculum AS typ FROM doc_info WHERE doc_info.syllabus_id = '".$syllabus_id."'";
        }
        $result= mysql_query($sql);
        if (!$result) {
            
        }else{
            while($row=mysql_fetch_array($result)){
                $typ=$row['typ'];
                echo $typ;
            }
        }
        
    }
    function checksubcode($syl){
        $this->loaddb();
        $sql="SELECT subject_info.subject_name, subject_info.subject_code, subject_info.subject_unit, subject_info.pre_requisites, subject_info.subject_description, subject_info.subject_info_id FROM subject_info INNER JOIN syllabus ON syllabus.course_info_id = subject_info.subject_info_id WHERE syllabus.syllabus_id = '".$syl."' AND syllabus.course_info_id = subject_info.subject_info_id ";
        $result= mysql_query($sql);
        while($row=mysql_fetch_array($result)){
            $subject_code=$row['subject_code'];
            echo $subject_code."<br>";
        }
        
    }

    function loadprintpgo($a){
        $this->loaddb();
        $sql="SELECT DISTINCT pgo.pgc, pgo.pgo  FROM clo_ilo INNER JOIN pgo_clo ON pgo_clo.clo_id = clo_ilo.clo_id INNER JOIN pgo ON pgo_clo.pgo_id = pgo.pgo_id WHERE clo_ilo.syllabus_id = '".$a."' AND pgo_clo.`status` = 'checked' ORDER BY pgo.pgc ASC ";
        $result= mysql_query($sql);
        $num=mysql_num_rows($result);
        echo "<tr><td rowspan='".$num."''><b>Program Graduate Outcomes</b></td>";
        if(!$result){
            
        }else{
            if (mysql_num_rows($result)==0) {
               echo "<td></td></tr>";
            }
            while($row=mysql_fetch_array($result)){
                $pgc=$row['pgc'];
                $pgo=$row['pgo'];
                 echo "<td>".$pgc.'&#58; &nbsp;'.$pgo."</td></tr>";
            }
            
        }
    }

    function loadprintclo($a,$b){
        $this->loaddb();
        $sql="SELECT DISTINCT clo_ilo.cloc, clo_ilo.clod FROM clo_ilo WHERE clo_ilo.syllabus_id = $a";
        $result= mysql_query($sql);
        $num=mysql_num_rows($result);
        if ($b=="GEN") {
            
        }else{
            echo "<tr><td rowspan='".$num."''><b>Course Learning Outcomes</b></td>";
            if(!$result){
                
            }else{
                if (mysql_num_rows($result)==0) {
                   echo "<td></td></tr>";
                }
                $i=1;
                while($row=mysql_fetch_array($result)){
                    $cloc=$row['cloc'];
                    $clod=$row['clod'];
                    if ($b=="ITE") {
                        echo "<td>".$cloc.'&#58; &nbsp;'.$clod."</td></tr>";
                    }else{
                        echo "<td>".$i.'. &nbsp;'.$clod."</td></tr>";
                    }
                    $i++;
                }
                
            }
        }
       
            
    }
    function coursereq($syl){
        $cr_output="";
        $cr_desc="";
        $this->loaddb();
        $sql="SELECT * FROM testbank.course_req  WHERE  testbank.course_req.syllabus_id = '".$syl."'";
        $result= mysql_query($sql);
        if(!$result){
            
        }else{
            $r=mysql_num_rows($result);
            $r++;
            echo '<tr>
            <th class="col-xs-2" rowspan="'.$r.'">Course Requirements</th>
            <th bgcolor="#89C35C" id="color2" class="col-xs-3">Output</th>
            <th bgcolor="#89C35C" id="color2" class="col-xs-7" colspan="5">Description</th></tr>';
            while($row=mysql_fetch_array($result)){
                $cr_output=$row['cr_output'];
                $cr_desc=$row['cr_desc'];
                echo '<tr><td class="col-xs-2">'.$cr_output.'</td>
                    <td class="col-xs-10" colspan="5">'.$cr_desc.'</td>';
            }
            echo '</tr>';
            
        }
        
    }
    function classpolicy($syl){
        $this->loaddb();
        $sql="SELECT policies.late_tardiness, policies.absence, policies.miss_quiz, policies.permits, policies.cheating, policies.class_misbehavior FROM policies WHERE policies.syllabus_id = '".$syl."'";
        $result= mysql_query($sql);
        if(!$result){
           
        }else{
            if (mysql_num_rows($result)==0) {
                echo "<tr>
                        <td class='col-xs-3'>Late / Tardiness</td>
                        <td class='col-xs-3' colspan='6'></td>
                      </tr>
                      <tr>
                        <td class='col-xs-3'>Absence</td>
                        <td class='col-xs-3' colspan='6'></td>
                      </tr>
                      <tr>
                        <td class='col-xs-3'>Missed Quizzes</td>
                        <td class='col-xs-3' colspan='6'></td>
                      </tr>
                      <tr>
                        <td class='col-xs-3'>ME Permits</td>
                        <td class='col-xs-3' colspan='6'></td>
                      </tr>
                      <tr>
                        <td class='col-xs-3'>Cheating</td>
                        <td class='col-xs-3' colspan='6'></td>
                      </tr>
                      <tr>
                        <td class='col-xs-3'>Classrooms Misbehavior</td>
                        <td class='col-xs-3' colspan='6'></td>
                      </tr>";
            }
            while($row=mysql_fetch_array($result)){
                $late_tardiness=$row['late_tardiness'];
                $absence=$row['absence'];
                $miss_quiz=$row['miss_quiz'];
                $permits=$row['permits'];
                $cheating=$row['cheating'];
                $class_misbehavior=$row['class_misbehavior'];
                echo "<tr>
                        <td class='col-xs-3'>Late / Tardiness</td>
                        <td class='col-xs-3' colspan='6'>".$late_tardiness."</td>
                      </tr>
                      <tr>
                        <td class='col-xs-3'>Absence</td>
                        <td class='col-xs-3' colspan='6'>".$absence."</td>
                      </tr>
                      <tr>
                        <td class='col-xs-3'>Missed Quizzes</td>
                        <td class='col-xs-3' colspan='6'>".$miss_quiz."</td>
                      </tr>
                      <tr>
                        <td class='col-xs-3'>ME Permits</td>
                        <td class='col-xs-3' colspan='6'>".$permits."</td>
                      </tr>
                      <tr>
                        <td class='col-xs-3'>Cheating</td>
                        <td class='col-xs-3' colspan='6'>".$cheating."</td>
                      </tr>
                      <tr>
                        <td class='col-xs-3'>Classrooms Misbehavior</td>
                        <td class='col-xs-3' colspan='6'>".$class_misbehavior."</td>
                      </tr>";
            }
            
        }
        
    }
    function ref($syl){
        $this->loaddb();
        $sql="SELECT * FROM testbank.reference  WHERE  testbank.reference.syllabus_id = '".$syl."'";
        $result= mysql_query($sql);
        if(!$result){
            
        }else{
            while($row=mysql_fetch_array($result)){
                $ref_desc=$row['ref_desc'];
                
                
                }
                echo "<tr><td class='col-xs-2'><b>References</b></td>
                      <td class='col-xs-10' colspan='6'>".$ref_desc."</td></tr>";
            
        }
        
    }

    function checksy($syllabus_id){
        $this->loaddb();
        $sql="SELECT school_year.sy FROM syllabus INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN school_year ON sched_subj.sy_id = school_year.sy_id WHERE syllabus.syllabus_id = $syllabus_id";
        $result=mysql_query($sql);
        while ($row=mysql_fetch_array($result)) {
            $sy=$row['sy'];
            echo " ".$sy;
        }
        
    }
    function checksem($syllabus_id){
        $this->loaddb();
        $sql="SELECT semester.semester FROM syllabus INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN semester ON sched_subj.sem_id = semester.sem_id WHERE syllabus.syllabus_id = $syllabus_id";
        $result=mysql_query($sql);
        while ($row=mysql_fetch_array($result)) {
            $semester=$row['semester'];
            echo " ".$semester;
        }
        
    }

    function checkdean($dep){
        if ($dep=='ITE' OR $dep=='CS') {
            $dep1='ITE';
        }else if($dep=='SHS'){
            $dep1='SHS';
        }else if($dep=='GEN'){
            $dep1='GEN';
        }else{  
            $dep1='BA';
        }
        $this->loaddb();
        $sql="SELECT employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext FROM employees INNER JOIN employment ON employment.employee_id = employees.employee_id INNER JOIN user_access ON user_access.employment_id = employment.employment_id INNER JOIN department ON employment.department_id = department.department_id WHERE user_access.position = 'Dean' AND department.department_name = '".$dep1."'";
        $result= mysql_query($sql);
        if(!$result){
            
        }else{
            while($row=mysql_fetch_array($result)){
                $fullname=utf8_encode($row['employee_fname'])." ".utf8_encode($row['employee_mname'])." ".utf8_encode($row['employee_lname'])." ".utf8_encode($row['employee_ext']);
                
                echo mb_strtoupper($fullname);
                }
            
        }
    }
    function setedate($period,$start,$end,$dep){
        $this->loaddb();
        $sql="SELECT exam_schedule.exam_id, exam_schedule.exam_schedule_id, exam_schedule.`start`, exam_schedule.`end` FROM exam_schedule WHERE exam_schedule.exam_id = '".$period."' AND exam_schedule.dep='".$dep."'";
            $result= mysql_query($sql);
            if(mysql_num_rows($result)==0){
                $query1 = "INSERT INTO `exam_schedule` (`exam_id`, `start`,`end`,`dep`) VALUES ('".$period."','".$start."','".$end."','".$dep."')";
                $result1=mysql_query($query1) or die("Query Failed : ".mysql_error());
            }else{
                $query2 = "UPDATE exam_schedule SET start='".$start."',end='".$end."' WHERE exam_id='".$period."' AND dep='".$dep."'";
                $result2=mysql_query($query2) or die("Query Failed : ".mysql_error());
            }

        
    }
    function setddate($period,$ddate,$dep){
        $this->loaddb();
        $sql="SELECT submission_sched.sub_sched_id, submission_sched.deadline, submission_sched.exam_id FROM submission_sched WHERE submission_sched.exam_id = '".$period."' AND submission_sched.dep='".$dep."'";
            $result= mysql_query($sql);
            if(mysql_num_rows($result)==0){
                $query1 = "INSERT INTO `submission_sched` (`exam_id`, `deadline`,`dep`) VALUES ('".$period."','".$ddate."','".$dep."')";
                $result1=mysql_query($query1) or die("Query Failed : ".mysql_error());
            }else{
                $query2 = "UPDATE submission_sched SET deadline='".$ddate."' WHERE exam_id='".$period."' AND dep='".$dep."'";
                $result2=mysql_query($query2) or die("Query Failed : ".mysql_error());
            }


        
    }

    function saveq($tq_id,$name1,$name2,$name3){
        $this->loaddb();
        $i=1;
        $maindirection=mysql_real_escape_string($_POST['maindirection']);
        $direction=mysql_real_escape_string($_POST['direction']);
        $tnum=mysql_real_escape_string($_POST['tnum']);
        $qtype=mysql_real_escape_string($_POST['qtype']);
        $qnum=mysql_real_escape_string($_POST['qnum']);
        $question=mysql_real_escape_string($_POST['question']);
        $topic=mysql_real_escape_string($_POST['topic']);
        $cognitive=mysql_real_escape_string($_POST['cognitive']);
        $points=mysql_real_escape_string($_POST['points']);
        $question=mysql_real_escape_string($_POST['question']);
        $enuans=$_POST['enuans'][0];
        $multians=$_POST['multians'][0];
        $test_id;
        $sql1="UPDATE tq SET main_direction ='".$maindirection."' WHERE tq_id='".$tq_id."'";
        $result1 = mysql_query($sql1) or die("Query Failed UPDATE tq SET main_direction: ".mysql_error());

        if (isset($name1) AND $name1!= "") {
            $sql1="UPDATE tq SET  main_attach ='".$name1."' WHERE tq_id='".$tq_id."'";
            $result1 = mysql_query($sql1) or die("Query Failed UPDATE tq SET  main_attach: ".mysql_error());
        }
        
        $sql2=mysql_query("SELECT test_number.test_id FROM test_number WHERE test_number.tq_id ='".$tq_id."' AND test_number.test_number = '".$tnum."'");
        if (mysql_num_rows($sql2)==1) {
            while ($row=mysql_fetch_array($sql2)) {
                $test_id=$row['test_id'];
            }
            $sql3="UPDATE test_number SET test_desc ='".$direction."' WHERE test_id='".$test_id."'";
            $result3 = mysql_query($sql3) or die("Query Failed UPDATE test_number SET test_desc: ".mysql_error());

            if (isset($name2) AND $name2!= "") {
                $sql4="UPDATE test_number SET attachment ='".$name2."' WHERE test_id='".$test_id."'";
                $result4 = mysql_query($sql4) or die("Query Failed UPDATE test_number SET attachment: ".mysql_error());
            }
            if (isset($qtype)) {
                $sql5=mysql_query("SELECT * FROM question_type WHERE question_type.test_id ='".$test_id."'");
                if (mysql_num_rows($sql5)==1) {
                    $sql6="UPDATE question_type SET question_type_name ='".$qtype."' WHERE test_id='".$test_id."'";
                    $result6 = mysql_query($sql6) or die("Query Failed UPDATE question_type SET question_type_name: ".mysql_error());
                }else{
                    $insert1 = "INSERT INTO `question_type` (`question_type_id`, `question_type_name`, `test_id`) VALUES ('','".$qtype."','".$test_id."')";
                    $result1=mysql_query($insert1) or die("Query INSERT INTO `question_type` : ".mysql_error());
                }
            }
                
        }else{
            $insert2 = "INSERT INTO `test_number` (`test_id`, `test_number`, `test_desc`, `attachment`,tq_id) VALUES ('','".$tnum."','".$direction."','".$name2."','".$tq_id."')";
            $result2=mysql_query($insert2) or die("Query INSERT INTO `test_number` : ".mysql_error());
            $test_id=mysql_insert_id();
            
            $insert3 = "INSERT INTO `question_type` (`question_type_id`, `question_type_name`, `test_id`) VALUES ('','".$qtype."','".$test_id."')";
            $result3=mysql_query($insert3) or die("Query INSERT INTO `question_type` : ".mysql_error());
        }

        $sql3=mysql_query("SELECT testquestions.q_id, testquestions.number, testquestions.question_desc, testquestions.points, testquestions.attachment, testquestions.cognitive_level_id, testquestions.topics_id, testquestions.test_id FROM testquestions WHERE testquestions.test_id ='".$test_id."' AND testquestions.number ='".$qnum."'");
        if (mysql_num_rows($sql3)==1) {
            while ($row=mysql_fetch_array($sql3)) {
                $q_id=$row['q_id'];
            }
            $sql11="UPDATE question_status SET status ='uncheck' WHERE q_id='".$q_id."'";
            $result11 = mysql_query($sql11) or die("Query Failed UPDATE testquestions SET question_status: ".mysql_error());

            if (isset($question)) {
                $sql7="UPDATE testquestions SET question_desc ='".$question."' WHERE q_id='".$q_id."'";
                $result7 = mysql_query($sql7) or die("Query Failed UPDATE testquestions SET question_desc: ".mysql_error());
            }
            if (isset($topic)) {
                $sql8="UPDATE testquestions SET topics_id ='".$topic."' WHERE q_id='".$q_id."'";
                $result8 = mysql_query($sql8) or die("Query Failed UPDATE testquestions SET topics_id: ".mysql_error());
            }
            if (isset($cognitive)) {
                $sql9="UPDATE testquestions SET cognitive_level_id ='".$cognitive."' WHERE q_id='".$q_id."'";
                $result9 = mysql_query($sql9) or die("Query Failed UPDATE testquestions SET cognitive_level_id: ".mysql_error());
            }
            if (isset($points)) {
                $sql10="UPDATE testquestions SET points ='".$points."' WHERE q_id='".$q_id."'";
                $result10 = mysql_query($sql10) or die("Query Failed UPDATE testquestions SET points: ".mysql_error());
            }
            if (isset($name3) AND $name3!= "") {
                $sql10="UPDATE testquestions SET attachment ='".$name3."' WHERE q_id='".$q_id."'";
                $result10 = mysql_query($sql10) or die("Query Failed UPDATE testquestions SET attachment: ".mysql_error());
            }
            if (!empty($enuans)) {
                $del = "DELETE FROM answer WHERE q_id='".$q_id."'";
                $delete= mysql_query($del);
                
                foreach ($_POST['enuans'] as $key => $value1) {

                    $a=mysql_real_escape_string($_POST['enuans'][$key]);
                    $insert6 = "INSERT INTO `answer` (`answer_id`, `cols`, `answer_desc`, `answer_attach`, `q_id`) VALUES ('','".$i."','".$a."','','".$q_id."')";
                    $result6=mysql_query($insert6) or die("Query INSERT INTO `answer` : ".mysql_error());
                    $i++;
                }
            }
            if (!empty($multians)) {
                $del = "DELETE FROM answer_choices WHERE q_id='".$q_id."'";
                $delete= mysql_query($del);
                foreach ($_POST['multians'] as $rowd => $value2) {
                    $b=mysql_real_escape_string($_POST['multians'][$rowd]);
                    $insert7 = "INSERT INTO `answer_choices` (`ac_id`, `answer_choice_desc`, `choice_attach`, `q_id`) VALUES ('','".$b."','','".$q_id."')";
                    $result7=mysql_query($insert7) or die("Query INSERT INTO `answer_choices` : ".mysql_error());
                }
                
            }

        }else{
            $insert4 = "INSERT INTO `testquestions` (`q_id`, `number`, `question_desc`, `points`, `attachment`, `cognitive_level_id`, `topics_id`, `test_id`) VALUES ('','".$qnum."','".$question."','".$points."','".$name3."','".$cognitive."','".$topic."','".$test_id."')";
            $result4=mysql_query($insert4) or die("Query INSERT INTO `testquestions` : ".mysql_error());
            $q_id=mysql_insert_id();

            $insert5 = "INSERT INTO `question_status` (`status`, `q_id`) VALUES ('uncheck','".$q_id."')";
            $result5=mysql_query($insert5) or die("Query Failed INSERT INTO `question_status`: ".mysql_error());

            if (!empty($_POST['enuans'][0])) {
                foreach ($_POST['enuans'] as $rowd => $value1) {
                    $a=mysql_real_escape_string($value1);
                    $insert6 = "INSERT INTO `answer` (`answer_id`, `answer_desc`, `answer_attach`, `q_id`) VALUES ('','".$a."','','".$q_id."')";
                    $result6=mysql_query($insert6) or die("Query INSERT INTO `answer` : ".mysql_error());
                }
                
            }
            if (!empty($_POST['multians'][0])) {
                foreach ($_POST['multians'] as $rowd => $value2) {
                    $b=mysql_real_escape_string($value2);
                    $insert7 = "INSERT INTO `answer_choices` (`ac_id`, `answer_choice_desc`, `choice_attach`, `q_id`) VALUES ('','".$b."','','".$q_id."')";
                    $result7=mysql_query($insert7) or die("Query INSERT INTO `answer_choices` : ".mysql_error());
                }
                
            }
            



        }
        
    }


    function shssaveq($tq_id,$name1,$name2,$name3){
        $this->loaddb();
        $i=1;
        $maindirection=mysql_real_escape_string($_POST['maindirection']);
        $direction=mysql_real_escape_string($_POST['direction']);
        $tnum=mysql_real_escape_string($_POST['tnum']);
        $qtype=mysql_real_escape_string($_POST['qtype']);
        $qnum=mysql_real_escape_string($_POST['qnum']);
        $question=mysql_real_escape_string($_POST['question']);
        $topic=mysql_real_escape_string($_POST['topic']);
        $cognitive=mysql_real_escape_string($_POST['cognitive']);
        $points=mysql_real_escape_string($_POST['points']);
        $question=mysql_real_escape_string($_POST['question']);
        $enuans=$_POST['enuans'][0];
        $multians=$_POST['multians'][0];
        $test_id;
        $sql1="UPDATE shs_tq SET shs_main_direction ='".$maindirection."' WHERE shs_tq_id='".$tq_id."'";
        $result1 = mysql_query($sql1) or die("Query Failed UPDATE tq SET main_direction: ".mysql_error());

        if (isset($name1) AND $name1!= "") {
            $sql1="UPDATE shs_tq SET  shs_main_attach ='".$name1."' WHERE shs_tq_id='".$tq_id."'";
            $result1 = mysql_query($sql1) or die("Query Failed UPDATE tq SET  main_attach: ".mysql_error());
        }
        
        $sql2=mysql_query("SELECT shs_test_number.shs_test_id FROM shs_test_number WHERE shs_test_number.shs_tq_id ='".$tq_id."' AND shs_test_number.shs_test_number = '".$tnum."'");
        if (mysql_num_rows($sql2)==1) {
            while ($row=mysql_fetch_array($sql2)) {
                $test_id=$row['shs_test_id'];
            }
            $sql3="UPDATE shs_test_number SET shs_test_desc ='".$direction."' WHERE shs_test_id='".$test_id."'";
            $result3 = mysql_query($sql3) or die("Query Failed UPDATE test_number SET test_desc: ".mysql_error());

            if (isset($name2) AND $name2!= "") {
                $sql4="UPDATE shs_test_number SET shs_attachment ='".$name2."' WHERE shs_test_id='".$test_id."'";
                $result4 = mysql_query($sql4) or die("Query Failed UPDATE test_number SET attachment: ".mysql_error());
            }
            if (isset($qtype)) {
                $sql5=mysql_query("SELECT * FROM shs_question_type WHERE shs_question_type.shs_test_id ='".$test_id."'");
                if (mysql_num_rows($sql5)==1) {
                    $sql6="UPDATE shs_question_type SET shs_question_type_name ='".$qtype."' WHERE shs_test_id='".$test_id."'";
                    $result6 = mysql_query($sql6) or die("Query Failed UPDATE question_type SET shs_question_type_name: ".mysql_error());
                }else{
                    $insert1 = "INSERT INTO `shs_question_type` (`shs_question_type_id`, `shs_question_type_name`, `shs_test_id`) VALUES ('','".$qtype."','".$test_id."')";
                    $result1=mysql_query($insert1) or die("Query INSERT INTO `question_type` : ".mysql_error());
                }
            }
                
        }else{
            $insert2 = "INSERT INTO `shs_test_number` (`shs_test_id`, `shs_test_number`, `shs_test_desc`, `shs_attachment`,shs_tq_id) VALUES ('','".$tnum."','".$direction."','".$name2."','".$tq_id."')";
            $result2=mysql_query($insert2) or die("Query INSERT INTO `test_number` : ".mysql_error());
            $test_id=mysql_insert_id();
            
            $insert3 = "INSERT INTO `shs_question_type` (`shs_question_type_id`, `shs_question_type_name`, `shs_test_id`) VALUES ('','".$qtype."','".$test_id."')";
            $result3=mysql_query($insert3) or die("Query INSERT INTO `question_type` : ".mysql_error());
        }

        $sql3=mysql_query("SELECT * FROM shs_testquestions WHERE shs_testquestions.shs_test_id ='".$test_id."' AND shs_testquestions.shs_number ='".$qnum."'");
        if (mysql_num_rows($sql3)==1) {
            while ($row=mysql_fetch_array($sql3)) {
                $q_id=$row['shs_q_id'];
            }
            $sql11="UPDATE shs_question_status SET shs_status ='uncheck' WHERE shs_q_id='".$q_id."'";
            $result11 = mysql_query($sql11) or die("Query Failed UPDATE testquestions SET question_status: ".mysql_error());

            if (isset($question)) {
                $sql7="UPDATE shs_testquestions SET shs_question_desc ='".$question."' WHERE shs_q_id='".$q_id."'";
                $result7 = mysql_query($sql7) or die("Query Failed UPDATE testquestions SET question_desc: ".mysql_error());
            }
            if (isset($topic)) {
                $sql8="UPDATE shs_testquestions SET shs_topics_id ='".$topic."' WHERE shs_q_id='".$q_id."'";
                $result8 = mysql_query($sql8) or die("Query Failed UPDATE testquestions SET topics_id: ".mysql_error());
            }
            if (isset($cognitive)) {
                $sql9="UPDATE shs_testquestions SET cognitive_level_id ='".$cognitive."' WHERE shs_q_id='".$q_id."'";
                $result9 = mysql_query($sql9) or die("Query Failed UPDATE testquestions SET cognitive_level_id: ".mysql_error());
            }
            if (isset($points)) {
                $sql10="UPDATE shs_testquestions SET shs_points ='".$points."' WHERE shs_q_id='".$q_id."'";
                $result10 = mysql_query($sql10) or die("Query Failed UPDATE testquestions SET points: ".mysql_error());
            }
            if (isset($name3) AND $name3!= "") {
                $sql10="UPDATE shs_testquestions SET shs_attachment ='".$name3."' WHERE shs_q_id='".$q_id."'";
                $result10 = mysql_query($sql10) or die("Query Failed UPDATE testquestions SET attachment: ".mysql_error());
            }
            if (!empty($enuans)) {
                $del = "DELETE FROM shs_answer WHERE shs_q_id='".$q_id."'";
                $delete= mysql_query($del);
                
                foreach ($_POST['enuans'] as $key => $value1) {

                    $a=mysql_real_escape_string($_POST['enuans'][$key]);
                    $insert6 = "INSERT INTO `shs_answer` (`shs_answer_id`, `shs_cols`, `shs_answer_desc`, `shs_answer_attach`, `shs_q_id`) VALUES ('','".$i."','".$a."','','".$q_id."')";
                    $result6=mysql_query($insert6) or die("Query INSERT INTO `answer` : ".mysql_error());
                    $i++;
                }
            }
            if (!empty($multians)) {
                $del = "DELETE FROM shs_answer_choices WHERE shs_q_id='".$q_id."'";
                $delete= mysql_query($del);
                foreach ($_POST['multians'] as $rowd => $value2) {
                    $b=mysql_real_escape_string($_POST['multians'][$rowd]);
                    $insert7 = "INSERT INTO `shs_answer_choices` (`shs_ac_id`, `shs_answer_choice_desc`, `shs_choice_attach`, `shs_q_id`) VALUES ('','".$b."','','".$q_id."')";
                    $result7=mysql_query($insert7) or die("Query INSERT INTO `answer_choices` : ".mysql_error());
                }
                
            }

        }else{
            $insert4 = "INSERT INTO `shs_testquestions` (`shs_q_id`, `shs_number`, `shs_question_desc`, `shs_points`, `shs_attachment`, `cognitive_level_id`, `shs_topics_id`, `shs_test_id`) VALUES ('','".$qnum."','".$question."','".$points."','".$name3."','".$cognitive."','".$topic."','".$test_id."')";
            $result4=mysql_query($insert4) or die("Query INSERT INTO `testquestions` : ".mysql_error());
            $q_id=mysql_insert_id();

            $insert5 = "INSERT INTO `shs_question_status` (`shs_status`, `shs_q_id`) VALUES ('uncheck','".$q_id."')";
            $result5=mysql_query($insert5) or die("Query Failed INSERT INTO `question_status`: ".mysql_error());

            if (!empty($_POST['enuans'][0])) {
                foreach ($_POST['enuans'] as $rowd => $value1) {
                    $a=mysql_real_escape_string($value1);
                    $insert6 = "INSERT INTO `shs_answer` (`shs_answer_id`, `shs_answer_desc`, `shs_answer_attach`, `shs_q_id`) VALUES ('','".$a."','','".$q_id."')";
                    $result6=mysql_query($insert6) or die("Query INSERT INTO `answer` : ".mysql_error());
                }
                
            }
            if (!empty($_POST['multians'][0])) {
                foreach ($_POST['multians'] as $rowd => $value2) {
                    $b=mysql_real_escape_string($value2);
                    $insert7 = "INSERT INTO `shs_answer_choices` (`shs_ac_id`, `shs_answer_choice_desc`, `shs_choice_attach`, `shs_q_id`) VALUES ('','".$b."','','".$q_id."')";
                    $result7=mysql_query($insert7) or die("Query INSERT INTO `answer_choices` : ".mysql_error());
                }
                
            }
            



        }
        
    }


    

    // function saveenu($syl,$tq_id,$ttype,$name2,$name2){
    //  $this->loaddb();
    //  $testnum=$_POST['enutn'];
    //  $testdirection=$_POST['enudirect'];
    //  $testimport=$name2;
    //  $number=$_POST['enunumbers'];
    //  $question=$_POST['enuquestion'];
    //  $questionimport=$name1;
    //  $topic=$_POST['enutopics'];
    //  $cognitive=$_POST['enucognitive'];
    //  $points=$_POST['enupoints'];
    //  $answer=$_POST['enuans'][0];
    

    //  $sql="SELECT test_number.test_id FROM test_number INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id WHERE question_type.question_type_name = '".$ttype."' AND test_number.test_number = '".$testnum."' AND test_number.tq_id = '".$tq_id."'";
    //  $result= mysql_query($sql);

    //  if(mysql_num_rows($result)==0){
            
    //      $queryinsert = "INSERT INTO `test_number` (`test_number`, `test_desc`, `attachment`, `tq_id`, `question_type_id`) VALUES ('".$testnum."','".$testdirection."','".$testimport."','".$tq_id."','2')";
    //      $resultinsert=mysql_query($queryinsert) or die("Query Failed1 : ".mysql_error());
    //      $test_id=mysql_insert_id();
    //      $resultinsert1 = "INSERT INTO `TestQuestions` (`number`, `question_desc`, `points`, `attachment`, `cognitive_level_id`, `topics_id`, `test_id`) VALUES ('".$number."','".$question."','".$points."','".$questionimport."','".$cognitive."','".$topic."','".$test_id."')";
    //      $resultinsert2=mysql_query($resultinsert1) or die("Query Failed2 : ".mysql_error());
    //      $quest_id=mysql_insert_id();
    //      foreach ($_POST['enuans'] as $rowd => $value) {
    //          $insertq = "INSERT INTO `answer` (`answer_desc`, `q_id`) VALUES ('".$_POST['enuans'][$rowd]."','".$quest_id."')";
    //          $resultinsertq=mysql_query($insertq) or die("Query Failed answer : ".mysql_error());
    //      }
    //      $insertstat = "INSERT INTO `question_status` (`status`, `q_id`) VALUES ('uncheck','".$quest_id."')";
    //      $resultstat=mysql_query($insertstat) or die("Query Failed qstat: ".mysql_error());
    //      $message = "Successfully Saved!";
    //      echo "<script type='text/javascript'>alert('$message');</script>";

    //  }else{
    //      while($row=mysql_fetch_array($result)){
    //          $test_id=$row['test_id'];
    //          if (!empty($_POST['enudirect'])) {
    //              $querytd= "UPDATE test_number SET test_desc='".$testdirection."' WHERE test_id='".$test_id."'";
    //              $result1 = mysql_query($querytd) or die("Query Failed update tid: ".mysql_error());
    //          }   
    //          if (!empty($testimport)) {
    //              $queryatt = "UPDATE test_number SET attachment='".$testimport."' WHERE test_id='".$test_id."'";
    //              $result2 = mysql_query($queryatt) or die("Query Failed update tid: ".mysql_error());
    //          }
    //          $sql1="SELECT test_number.test_id, testquestions.number, testquestions.q_id  FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.syllabus_id = '".$syl."' AND question_type.question_type_name = '".$ttype."' AND test_number.test_number = '".$testnum."' AND testquestions.number = '".$number."'";
    //          $resulta= mysql_query($sql1);
    //          if(mysql_num_rows($resulta)==0){
    //              $resultinsert1 = "INSERT INTO `TestQuestions` (`number`, `question_desc`, `points`, `attachment`, `cognitive_level_id`, `topics_id`, `test_id`) VALUES ('".$number."','".$question."','".$points."','".$questionimport."','".$cognitive."','".$topic."','".$test_id."')";
    //              $resultinsert2=mysql_query($resultinsert1) or die("Query Failed2 : ".mysql_error());
    //              $quest_id=mysql_insert_id();
    //              foreach ($_POST['enuans'] as $rowd => $value) {
    //                  $insertq = "INSERT INTO `answer` (`answer_desc`, `q_id`) VALUES ('".$_POST['enuans'][$rowd]."','".$quest_id."')";
    //                  $resultinsertq=mysql_query($insertq) or die("Query Failed answer : ".mysql_error());
    //              }
    //              $insertstat = "INSERT INTO `question_status` (`status`, `q_id`) VALUES ('uncheck','".$quest_id."')";
    //              $resultstat=mysql_query($insertstat) or die("Query Failed qstat: ".mysql_error());
    //              $message = "Successfully Saved!";
    //              echo "<script type='text/javascript'>alert('$message');</script>";
    //          }else{
    //              while($row=mysql_fetch_array($resulta)){
    //                  $q_idq=$row['q_id'];
    //              }
    //              if (!empty($question)) {
    //                  $query4 = "UPDATE TestQuestions SET question_desc='".$question."' WHERE number='".$number."' AND test_id='".$test_id."'";
    //                  $result4 = mysql_query($query4) or die("Query Failed update tid4: ".mysql_error());
    //              }
    //              if (!empty($points)) {
    //                  $query5 = "UPDATE TestQuestions SET points='".$points."' WHERE number='".$number."' AND test_id='".$test_id."'";
    //                  $result5 = mysql_query($query5) or die("Query Failed update tid5: ".mysql_error());
    //              }
    //              if (!empty($answer)) {
    //                  $query = "DELETE FROM answer WHERE q_id='".$q_idq."'";
    //                  $delete= mysql_query($query);
    //                  foreach ($_POST['enuans'] as $rowd => $value) {
    //                      $insertq = "INSERT INTO `answer` (`answer_desc`, `q_id`) VALUES ('".$_POST['enuans'][$rowd]."','".$q_idq."')";
    //                      $resultinsertq=mysql_query($insertq) or die("Query Failed answer : ".mysql_error());
    //                  }
    //              }
    //              if (!empty($questionimport)) {
    //                  $query7 = "UPDATE TestQuestions SET attachment='".$questionimport."' WHERE number='".$number."'  AND test_id='".$test_id."'";
    //                  $result7 = mysql_query($query7) or die("Query Failed update tid7: ".mysql_error());
    //              }
    //              if (!empty($cognitive)) {
    //                  $query8= "UPDATE TestQuestions SET cognitive_level_id='".$cognitive."' WHERE number='".$number."'  AND test_id='".$test_id."'";
    //                  $result8 = mysql_query($query8) or die("Query Failed update tid8: ".mysql_error());
    //              }
    //              if (!empty($topic)) {
    //                  $query9 = "UPDATE TestQuestions SET topics_id='".$topic."' WHERE number='".$number."'  AND test_id='".$test_id."'";
    //                  $result9 = mysql_query($query9) or die("Query Failed update tid9: ".mysql_error());
    //              }
    //              $query10 = "UPDATE question_status SET status='uncheck' WHERE q_id='".$q_idq."'";
    //              $result10 = mysql_query($query10) or die("Query Failed update tid9: ".mysql_error());
    //              $message = "Successfully Updated!";
    //              echo "<script type='text/javascript'>alert('$message');</script>";
    //          }
    //      }
    //  }
    //  echo "<meta http-equiv='refresh' content='0'>";
    //  
    // }

    // function multisave($syl,$tq_id,$ttype,$name1,$name2){
    //  $this->loaddb();
    //  $testnum=$_POST['multitn'];
    //  $testdirection=$_POST['multidirect'];
    //  $testimport=$name2;
    //  $ansch=$_POST['multians'][0];
    //  $number=$_POST['multinumbers'];
    //  $question=$_POST['multiquestion'];
    //  $questionimport=$name1;
    //  $topic=$_POST['multitopics'];
    //  $cognitive=$_POST['multicognitive'];
    //  $points=$_POST['multipoints'];
    //  $radiob=$_POST['radiob'];
    //  $answer=$_POST['multians'][$radiob];

        
    //  $sql="SELECT test_number.test_id FROM test_number INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id WHERE question_type.question_type_name = '".$ttype."' AND test_number.test_number = '".$testnum."' AND test_number.tq_id = '".$tq_id."'";
    //  $result= mysql_query($sql);

    //  if(mysql_num_rows($result)==0){
            
    //      $queryinsert = "INSERT INTO `test_number` (`test_number`, `test_desc`, `attachment`, `tq_id`, `question_type_id`) VALUES ('".$testnum."','".$testdirection."','".$testimport."','".$tq_id."','3')";
    //      $resultinsert=mysql_query($queryinsert) or die("Query Failed1 : ".mysql_error());
    //      $test_id=mysql_insert_id();
    //      $resultinsert1 = "INSERT INTO `TestQuestions` (`number`, `question_desc`, `points`, `attachment`, `cognitive_level_id`, `topics_id`, `test_id`) VALUES ('".$number."','".$question."','".$points."','".$questionimport."','".$cognitive."','".$topic."','".$test_id."')";
    //      $resultinsert2=mysql_query($resultinsert1) or die("Query Failed2 : ".mysql_error());
    //      $quest_id=mysql_insert_id();
    //      $insertq = "INSERT INTO `answer` (`answer_desc`, `q_id`) VALUES ('".$answer."','".$quest_id."')";
    //      $resultinsertq=mysql_query($insertq) or die("Query Failed answer : ".mysql_error());
    //      $insertstat = "INSERT INTO `question_status` (`status`, `q_id`) VALUES ('uncheck','".$quest_id."')";
    //      $resultstat=mysql_query($insertstat) or die("Query Failed qstat: ".mysql_error());
    //      foreach($_POST['multians'] as $row => $value){
    //          if (empty($_POST['multians'][$row])){
    //          }else{
    //              $multians=$_POST['multians'][$row];
    //              $resultinsert2 = "INSERT INTO `answer_choices` (`answer_choice_desc`, `q_id`) VALUES ('".$multians."','".$quest_id."')";
    //              $resultinsert3=mysql_query($resultinsert2) or die("Query Failed2 : ".mysql_error());                    
    //          }               
    //      }
    //      $message = "Successfully Saved!";
    //      echo "<script type='text/javascript'>alert('$message');</script>";
    //  }else{
    //      while($row=mysql_fetch_array($result)){
    //          $test_id=$row['test_id'];
    //          if (!empty($testdirection)) {
    //              $querytd= "UPDATE test_number SET test_desc='".$testdirection."' WHERE test_id='".$test_id."'";
    //              $resultdirectupdate = mysql_query($querytd) or die("Query Failed update tid: ".mysql_error());
    //          }   
    //          if (!empty($testimport)) {
    //              $queryatt = "UPDATE test_number SET attachment='".$testimport."' WHERE test_id='".$test_id."'";
    //              $result2 = mysql_query($queryatt) or die("Query Failed update tid: ".mysql_error());
    //          }
    //          $sql1="SELECT test_number.test_id, testquestions.number, testquestions.q_id  FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.syllabus_id = '".$syl."' AND question_type.question_type_name = '".$ttype."' AND test_number.test_number = '".$testnum."' AND testquestions.number = '".$number."'";
    //          $resulta= mysql_query($sql1);
    //          if(mysql_num_rows($resulta)==0){
    //              $resultinsert1 = "INSERT INTO `TestQuestions` (`number`, `question_desc`, `points`, `attachment`, `cognitive_level_id`, `topics_id`, `test_id`) VALUES ('".$number."','".$question."','".$points."','".$questionimport."','".$cognitive."','".$topic."','".$test_id."')";
    //              $resultinsert2=mysql_query($resultinsert1) or die("Query Failed2 : ".mysql_error());
    //              $quest_id=mysql_insert_id();
    //              $insertq = "INSERT INTO `answer` (`answer_desc`, `q_id`) VALUES ('".$answer."','".$quest_id."')";
    //              $resultinsertq=mysql_query($insertq) or die("Query Failed answer : ".mysql_error());
    //              $insertstat = "INSERT INTO `question_status` (`status`, `q_id`) VALUES ('uncheck','".$quest_id."')";
    //              $resultstat=mysql_query($insertstat) or die("Query Failed qstat: ".mysql_error());
    //              foreach($_POST['multians'] as $row => $value){
    //                  if (empty($_POST['multians'][$row])){
    //                  }else{
    //                      $multians=$_POST['multians'][$row];
    //                      $resultinsert2 = "INSERT INTO `answer_choices` (`answer_choice_desc`, `q_id`) VALUES ('".$multians."','".$quest_id."')";
    //                      $resultinsert3=mysql_query($resultinsert2) or die("Query Failed2 : ".mysql_error());                    
    //                  }               
    //              }
    //              $message = "Successfully Saved!";
    //              echo "<script type='text/javascript'>alert('$message');</script>";
    //          }else{
    //              while($row=mysql_fetch_array($resulta)){
    //                  $q_idq=$row['q_id'];
    //              }
    //              if (!empty($question)) {
    //                  $query4 = "UPDATE TestQuestions SET question_desc='".$question."' WHERE number='".$number."' AND test_id='".$test_id."'";
    //                  $result4 = mysql_query($query4) or die("Query Failed update tid4: ".mysql_error());
    //              }
    //              if (!empty($points)) {
    //                  $query5 = "UPDATE TestQuestions SET points='".$points."' WHERE number='".$number."' AND test_id='".$test_id."'";
    //                  $result5 = mysql_query($query5) or die("Query Failed update tid5: ".mysql_error());
    //              }
    //              if (!empty($answer)) {
    //                  $query6 = "UPDATE answer SET answer_desc='".$answer."' WHERE q_id='".$q_idq."'";
    //                  $result6 = mysql_query($query6) or die("Query Failed update tid6: ".mysql_error());
    //              }
    //              if (!empty($questionimport)) {
    //                  $query7 = "UPDATE TestQuestions SET attachment='".$questionimport."' WHERE number='".$number."' AND test_id='".$test_id."'";
    //                  $result7 = mysql_query($query7) or die("Query Failed update tid7: ".mysql_error());
    //              }
    //              if (!empty($cognitive)) {
    //                  $query8= "UPDATE TestQuestions SET cognitive_level_id='".$cognitive."' WHERE number='".$number."' AND test_id='".$test_id."'";
    //                  $result8 = mysql_query($query8) or die("Query Failed update tid8: ".mysql_error());
    //              }
    //              if (!empty($topic)) {
    //                  $query9 = "UPDATE TestQuestions SET topics_id='".$topic."' WHERE number='".$number."' AND test_id='".$test_id."'";
    //                  $result9 = mysql_query($query9) or die("Query Failed update tid9: ".mysql_error());
    //              }
    //              if (!empty($ansch)) {
    //                  $query2 = "DELETE FROM answer_choices WHERE q_id='".$q_idq."'";
    //                  $delete2= mysql_query($query2);
    //                  foreach($_POST['multians'] as $row => $value){
    //                      if (empty($_POST['multians'][$row])){
    //                      }else{
    //                          $multians=$_POST['multians'][$row];
    //                          $resultinsert2 = "INSERT INTO `answer_choices` (`answer_choice_desc`, `q_id`) VALUES ('".$multians."','".$q_idq."')";
    //                          $resultinsert3=mysql_query($resultinsert2) or die("Query Failed2 : ".mysql_error());                    
    //                      }               
    //                  }
    //              }
    //              $query10 = "UPDATE question_status SET status='uncheck' WHERE q_id='".$q_idq."'";
    //              $result10 = mysql_query($query10) or die("Query Failed update tid9: ".mysql_error());
    //              $message = "Successfully Updated!";
    //              echo "<script type='text/javascript'>alert('$message');</script>";
    //          }
    //      }
    //  }
    //  echo "<meta http-equiv='refresh' content='0'>";
    //  
    // }

    // function savetof($syl,$tq_id,$ttype,$name1,$name2){
    //  $this->loaddb();
    //  $testnum=$_POST['toftn'];
    //  $testdirection=$_POST['tofdirect'];
    //  $testimport=$name2;
    //  $number=$_POST['tofnumbers'];
    //  $question=$_POST['tofquestion'];
    //  $questionimport=$name1;
    //  $topic=$_POST['toftopics'];
    //  $cognitive=$_POST['tofcognitive'];
    //  $points=$_POST['tofpoints'];
    //  $answer=$_POST['tofanswer'];
        
    //  $sql="SELECT test_number.test_id FROM test_number INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id WHERE question_type.question_type_name = '".$ttype."' AND test_number.test_number = '".$testnum."' AND test_number.tq_id = '".$tq_id."'";
    //  $result= mysql_query($sql);

    //  if(mysql_num_rows($result)==0){
            
    //      $queryinsert = "INSERT INTO `test_number` (`test_number`, `test_desc`, `attachment`, `tq_id`, `question_type_id`) VALUES ('".$testnum."','".$testdirection."','".$testimport."','".$tq_id."','4')";
    //      $resultinsert=mysql_query($queryinsert) or die("Query Failed1 : ".mysql_error());
    //      $test_id=mysql_insert_id();
    //      $resultinsert1 = "INSERT INTO `TestQuestions` (`number`, `question_desc`, `points`, `attachment`, `cognitive_level_id`, `topics_id`, `test_id`) VALUES ('".$number."','".$question."','".$points."','".$questionimport."','".$cognitive."','".$topic."','".$test_id."')";
    //      $resultinsert2=mysql_query($resultinsert1) or die("Query Failed2 : ".mysql_error());
    //      $quest_id=mysql_insert_id();
    //      $insertq = "INSERT INTO `answer` (`answer_desc`, `q_id`) VALUES ('".$answer."','".$quest_id."')";
    //      $resultinsertq=mysql_query($insertq) or die("Query Failed answer : ".mysql_error());
    //      $insertstat = "INSERT INTO `question_status` (`status`, `q_id`) VALUES ('uncheck','".$quest_id."')";
    //      $resultstat=mysql_query($insertstat) or die("Query Failed qstat: ".mysql_error());
    //      $message = "Successfully Saved!";
    //      echo "<script type='text/javascript'>alert('$message');</script>";

    //  }else{
    //      while($row=mysql_fetch_array($result)){
    //          $test_id=$row['test_id'];
    //          if (!empty($_POST['tofdirect'])) {
    //              $querytd= "UPDATE test_number SET test_desc='".$testdirection."' WHERE test_id='".$test_id."'";
    //              $result1 = mysql_query($querytd) or die("Query Failed update tid: ".mysql_error());
    //          }   
    //          if (!empty($testimport)) {
    //              $queryatt = "UPDATE test_number SET attachment='".$testimport."' WHERE test_id='".$test_id."'";
    //              $result2 = mysql_query($queryatt) or die("Query Failed update tid: ".mysql_error());
    //          }
    //          $sql1="SELECT test_number.test_id, testquestions.number, testquestions.q_id  FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.syllabus_id = '".$syl."' AND question_type.question_type_name = '".$ttype."' AND test_number.test_number = '".$testnum."' AND testquestions.number = '".$number."'";
    //          $resulta= mysql_query($sql1);
    //          if(mysql_num_rows($resulta)==0){
    //              $resultinsert1 = "INSERT INTO `TestQuestions` (`number`, `question_desc`, `points`, `attachment`, `cognitive_level_id`, `topics_id`, `test_id`) VALUES ('".$number."','".$question."','".$points."','".$questionimport."','".$cognitive."','".$topic."','".$test_id."')";
    //              $resultinsert2=mysql_query($resultinsert1) or die("Query Failed2 : ".mysql_error());
    //              $quest_id=mysql_insert_id();
    //              $insertq = "INSERT INTO `answer` (`answer_desc`, `q_id`) VALUES ('".$answer."','".$quest_id."')";
    //              $resultinsertq=mysql_query($insertq) or die("Query Failed answer : ".mysql_error());
    //              $insertstat = "INSERT INTO `question_status` (`status`, `q_id`) VALUES ('uncheck','".$quest_id."')";
    //              $resultstat=mysql_query($insertstat) or die("Query Failed qstat: ".mysql_error());
    //              $message = "Successfully Saved!";
    //              echo "<script type='text/javascript'>alert('$message');</script>";
    //          }else{
    //              while($row=mysql_fetch_array($resulta)){
    //                  $q_idq=$row['q_id'];
    //              }
    //              if (!empty($question)) {
    //                  $query4 = "UPDATE TestQuestions SET question_desc='".$question."' WHERE number='".$number."' AND test_id='".$test_id."'";
    //                  $result4 = mysql_query($query4) or die("Query Failed update tid4: ".mysql_error());
    //              }
    //              if (!empty($points)) {
    //                  $query5 = "UPDATE TestQuestions SET points='".$points."' WHERE number='".$number."' AND test_id='".$test_id."'";
    //                  $result5 = mysql_query($query5) or die("Query Failed update tid5: ".mysql_error());
    //              }
    //              if (!empty($answer)) {
    //                  $query6 = "UPDATE answer SET answer_desc='".$answer."' WHERE q_id='".$q_idq."'";
    //                  $result6 = mysql_query($query6) or die("Query Failed update tid6: ".mysql_error());
    //              }
    //              if (!empty($questionimport)) {
    //                  $query7 = "UPDATE TestQuestions SET attachment='".$questionimport."' WHERE number='".$number."'  AND test_id='".$test_id."'";
    //                  $result7 = mysql_query($query7) or die("Query Failed update tid7: ".mysql_error());
    //              }
    //              if (!empty($cognitive)) {
    //                  $query8= "UPDATE TestQuestions SET cognitive_level_id='".$cognitive."' WHERE number='".$number."'  AND test_id='".$test_id."'";
    //                  $result8 = mysql_query($query8) or die("Query Failed update tid8: ".mysql_error());
    //              }
    //              if (!empty($topic)) {
    //                  $query9 = "UPDATE TestQuestions SET topics_id='".$topic."' WHERE number='".$number."'  AND test_id='".$test_id."'";
    //                  $result9 = mysql_query($query9) or die("Query Failed update tid9: ".mysql_error());
    //              }
    //              $query10 = "UPDATE question_status SET status='uncheck' WHERE q_id='".$q_idq."'";
    //              $result10 = mysql_query($query10) or die("Query Failed update tid9: ".mysql_error());
    //              $message = "Successfully Updated!";
    //              echo "<script type='text/javascript'>alert('$message');</script>";
    //          }
    //      }
    //  }
    //  echo "<meta http-equiv='refresh' content='0'>";
    //  
    // }

    // function matchsave($syl,$tq_id,$ttype,$name1,$name2, $name3){
    //  $this->loaddb();
    //  $testnum=$_POST['matchtn'];
    //  $testdirection=$_POST['matchdirect'];
    //  $testimport=$name2;
    //  $number=$_POST['matchnumbers'];
    //  $question=$_POST['matchquestion'];
    //  $questionimport=$name1;
    //  $answerimport=$name3;
    //  $topic=$_POST['matchtopics'];
    //  $cognitive=$_POST['matchcognitive'];
    //  $points=$_POST['matchpoints'];
    //  $answer=$_POST['matchanswer'];
        
    //  $sql="SELECT test_number.test_id FROM test_number INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id WHERE question_type.question_type_name = '".$ttype."' AND test_number.test_number = '".$testnum."' AND test_number.tq_id = '".$tq_id."'";
    //  $result= mysql_query($sql);

    //  if(mysql_num_rows($result)==0){
            
    //      $queryinsert = "INSERT INTO `test_number` (`test_number`, `test_desc`, `attachment`, `tq_id`, `question_type_id`) VALUES ('".$testnum."','".$testdirection."','".$testimport."','".$tq_id."','5')";
    //      $resultinsert=mysql_query($queryinsert) or die("Query Failed1 : ".mysql_error());
    //      $test_id=mysql_insert_id();
    //      $resultinsert1 = "INSERT INTO `TestQuestions` (`number`, `question_desc`, `points`, `attachment`, `cognitive_level_id`, `topics_id`, `test_id`) VALUES ('".$number."','".$question."','".$points."','".$questionimport."','".$cognitive."','".$topic."','".$test_id."')";
    //      $resultinsert2=mysql_query($resultinsert1) or die("Query Failed2 : ".mysql_error());
    //      $quest_id=mysql_insert_id();
    //      $insertq = "INSERT INTO `answer` (`answer_desc`, `answer_attach`, `q_id`) VALUES ('".$answer."','".$answerimport."','".$quest_id."')";
    //      $resultinsertq=mysql_query($insertq) or die("Query Failed answer : ".mysql_error());
    //      $insertstat = "INSERT INTO `question_status` (`status`, `q_id`) VALUES ('uncheck','".$quest_id."')";
    //      $resultstat=mysql_query($insertstat) or die("Query Failed qstat: ".mysql_error());
    //      $message = "Successfully Saved!";
    //      echo "<script type='text/javascript'>alert('$message');</script>";

    //  }else{
    //      while($row=mysql_fetch_array($result)){
    //          $test_id=$row['test_id'];
    //          if (!empty($_POST['matchdirect'])) {
    //              $querytd= "UPDATE test_number SET test_desc='".$testdirection."' WHERE test_id='".$test_id."'";
    //              $result1 = mysql_query($querytd) or die("Query Failed update tid: ".mysql_error());
    //          }   
    //          if (!empty($testimport)) {
    //              $queryatt = "UPDATE test_number SET attachment='".$testimport."' WHERE test_id='".$test_id."'";
    //              $result2 = mysql_query($queryatt) or die("Query Failed update tid: ".mysql_error());
    //          }
    //          $sql1="SELECT test_number.test_id, testquestions.number, testquestions.q_id  FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.syllabus_id = '".$syl."' AND question_type.question_type_name = '".$ttype."' AND test_number.test_number = '".$testnum."' AND testquestions.number = '".$number."'";
    //          $resulta= mysql_query($sql1);
    //          if(mysql_num_rows($resulta)==0){
    //              $resultinsert1 = "INSERT INTO `TestQuestions` (`number`, `question_desc`, `points`, `attachment`, `cognitive_level_id`, `topics_id`, `test_id`) VALUES ('".$number."','".$question."','".$points."','".$questionimport."','".$cognitive."','".$topic."','".$test_id."')";
    //              $resultinsert2=mysql_query($resultinsert1) or die("Query Failed2 : ".mysql_error());
    //              $quest_id=mysql_insert_id();
    //              $insertq = "INSERT INTO `answer` (`answer_desc`, `answer_attach`, `q_id`) VALUES ('".$answer."','".$answerimport."','".$quest_id."')";
    //              $resultinsertq=mysql_query($insertq) or die("Query Failed answer : ".mysql_error());
    //              $insertstat = "INSERT INTO `question_status` (`status`, `q_id`) VALUES ('uncheck','".$quest_id."')";
    //              $resultstat=mysql_query($insertstat) or die("Query Failed qstat: ".mysql_error());
    //              $message = "Successfully Saved!";
    //              echo "<script type='text/javascript'>alert('$message');</script>";
    //          }else{
    //              while($row=mysql_fetch_array($resulta)){
    //                  $q_idq=$row['q_id'];
    //              }
    //              if (!empty($question)) {
    //                  $query4 = "UPDATE TestQuestions SET question_desc='".$question."' WHERE number='".$number."' AND test_id='".$test_id."'";
    //                  $result4 = mysql_query($query4) or die("Query Failed update tid4: ".mysql_error());
    //              }
    //              if (!empty($points)) {
    //                  $query5 = "UPDATE TestQuestions SET points='".$points."' WHERE number='".$number."' AND test_id='".$test_id."'";
    //                  $result5 = mysql_query($query5) or die("Query Failed update tid5: ".mysql_error());
    //              }
    //              if (!empty($answer)) {
    //                  $query6 = "UPDATE answer SET answer_desc='".$answer."', answer_attach='".$answerimport."'  WHERE q_id='".$q_idq."'";
    //                  $result6 = mysql_query($query6) or die("Query Failed update tid6: ".mysql_error());
    //              }
    //              if (!empty($questionimport)) {
    //                  $query7 = "UPDATE TestQuestions SET attachment='".$questionimport."' WHERE number='".$number."'  AND test_id='".$test_id."'";
    //                  $result7 = mysql_query($query7) or die("Query Failed update tid7: ".mysql_error());
    //              }
    //              if (!empty($cognitive)) {
    //                  $query8= "UPDATE TestQuestions SET cognitive_level_id='".$cognitive."' WHERE number='".$number."'  AND test_id='".$test_id."'";
    //                  $result8 = mysql_query($query8) or die("Query Failed update tid8: ".mysql_error());
    //              }
    //              if (!empty($topic)) {
    //                  $query9 = "UPDATE TestQuestions SET topics_id='".$topic."' WHERE number='".$number."'  AND test_id='".$test_id."'";
    //                  $result9 = mysql_query($query9) or die("Query Failed update tid9: ".mysql_error());
    //              }
    //              $query10 = "UPDATE question_status SET status='uncheck' WHERE q_id='".$q_idq."'";
    //              $result10 = mysql_query($query10) or die("Query Failed update tid9: ".mysql_error());
    //              $message = "Successfully Updated!";
    //              echo "<script type='text/javascript'>alert('$message');</script>";
    //          }
    //      }
    //  }   
    //  echo "<meta http-equiv='refresh' content='0'>";
    //  
    // }
    // function probsave($syl,$tq_id,$ttype,$name1,$name2,$name3){
    //  $this->loaddb();
    //  $testnum=$_POST['probtn'];
    //  $testdirection=$_POST['probdirect'];
    //  $testimport=$name2;
    //  $number=$_POST['probnumbers'];
    //  $question=$_POST['probquestion'];
    //  $questionimport=$name1;
    //  $answerimport=$name3;
    //  $topic=$_POST['probtopics'];
    //  $cognitive=$_POST['probcognitive'];
    //  $points=$_POST['probpoints'];
    //  $answer=$_POST['probanswer'];
        
    //  $sql="SELECT test_number.test_id FROM test_number INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id WHERE question_type.question_type_name = '".$ttype."' AND test_number.test_number = '".$testnum."' AND test_number.tq_id = '".$tq_id."'";
    //  $result= mysql_query($sql);

    //  if(mysql_num_rows($result)==0){
            
    //      $queryinsert = "INSERT INTO `test_number` (`test_number`, `test_desc`, `attachment`, `tq_id`, `question_type_id`) VALUES ('".$testnum."','".$testdirection."','".$testimport."','".$tq_id."','6')";
    //      $resultinsert=mysql_query($queryinsert) or die("Query Failed1 : ".mysql_error());
    //      $test_id=mysql_insert_id();
    //      $resultinsert1 = "INSERT INTO `TestQuestions` (`number`, `question_desc`, `points`, `attachment`, `cognitive_level_id`, `topics_id`, `test_id`) VALUES ('".$number."','".$question."','".$points."','".$questionimport."','".$cognitive."','".$topic."','".$test_id."')";
    //      $resultinsert2=mysql_query($resultinsert1) or die("Query Failed2 : ".mysql_error());
    //      $quest_id=mysql_insert_id();
    //      $insertq = "INSERT INTO `answer` (`answer_desc`, `answer_attach`, `q_id`) VALUES ('".$answer."','".$answerimport."','".$quest_id."')";
    //      $resultinsertq=mysql_query($insertq) or die("Query Failed answer : ".mysql_error());
    //      $insertstat = "INSERT INTO `question_status` (`status`, `q_id`) VALUES ('uncheck','".$quest_id."')";
    //      $resultstat=mysql_query($insertstat) or die("Query Failed qstat: ".mysql_error());
    //      $message = "Successfully Saved!";
    //      echo "<script type='text/javascript'>alert('$message');</script>";

    //  }else{
    //      while($row=mysql_fetch_array($result)){
    //          $test_id=$row['test_id'];
    //          if (!empty($_POST['probdirect'])) {
    //              $querytd= "UPDATE test_number SET test_desc='".$testdirection."' WHERE test_id='".$test_id."'";
    //              $result1 = mysql_query($querytd) or die("Query Failed update tid: ".mysql_error());
    //          }   
    //          if (!empty($testimport)) {
    //              $queryatt = "UPDATE test_number SET attachment='".$testimport."' WHERE test_id='".$test_id."'";
    //              $result2 = mysql_query($queryatt) or die("Query Failed update tid: ".mysql_error());
    //          }
    //          $sql1="SELECT test_number.test_id, testquestions.number, testquestions.q_id  FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.syllabus_id = '".$syl."' AND question_type.question_type_name = '".$ttype."' AND test_number.test_number = '".$testnum."' AND testquestions.number = '".$number."'";
    //          $resulta= mysql_query($sql1);
    //          if(mysql_num_rows($resulta)==0){
    //              $resultinsert1 = "INSERT INTO `TestQuestions` (`number`, `question_desc`, `points`, `attachment`, `cognitive_level_id`, `topics_id`, `test_id`) VALUES ('".$number."','".$question."','".$points."','".$questionimport."','".$cognitive."','".$topic."','".$test_id."')";
    //              $resultinsert2=mysql_query($resultinsert1) or die("Query Failed2 : ".mysql_error());
    //              $quest_id=mysql_insert_id();
    //              $insertq = "INSERT INTO `answer` (`answer_desc`, `answer_attach`, `q_id`) VALUES ('".$answer."','".$answerimport."','".$quest_id."')";
    //              $resultinsertq=mysql_query($insertq) or die("Query Failed answer : ".mysql_error());
    //              $insertstat = "INSERT INTO `question_status` (`status`, `q_id`) VALUES ('uncheck','".$quest_id."')";
    //              $resultstat=mysql_query($insertstat) or die("Query Failed qstat: ".mysql_error());
    //              $message = "Successfully Saved!";
    //              echo "<script type='text/javascript'>alert('$message');</script>";
    //          }else{
    //              while($row=mysql_fetch_array($resulta)){
    //                  $q_idq=$row['q_id'];
    //              }
    //              if (!empty($question)) {
    //                  $query4 = "UPDATE TestQuestions SET question_desc='".$question."' WHERE number='".$number."' AND test_id='".$test_id."'";
    //                  $result4 = mysql_query($query4) or die("Query Failed update tid4: ".mysql_error());
    //              }
    //              if (!empty($points)) {
    //                  $query5 = "UPDATE TestQuestions SET points='".$points."' WHERE number='".$number."' AND test_id='".$test_id."'";
    //                  $result5 = mysql_query($query5) or die("Query Failed update tid5: ".mysql_error());
    //              }
    //              if (!empty($answer)) {
    //                  $query6 = "UPDATE answer SET answer_desc='".$answer."',answer_attach='".$answerimport."' WHERE q_id='".$q_idq."'";
    //                  $result6 = mysql_query($query6) or die("Query Failed update tid6: ".mysql_error());
    //              }
    //              if (!empty($questionimport)) {
    //                  $query7 = "UPDATE TestQuestions SET attachment='".$questionimport."' WHERE number='".$number."'  AND test_id='".$test_id."'";
    //                  $result7 = mysql_query($query7) or die("Query Failed update tid7: ".mysql_error());
    //              }
    //              if (!empty($cognitive)) {
    //                  $query8= "UPDATE TestQuestions SET cognitive_level_id='".$cognitive."' WHERE number='".$number."'  AND test_id='".$test_id."'";
    //                  $result8 = mysql_query($query8) or die("Query Failed update tid8: ".mysql_error());
    //              }
    //              if (!empty($topic)) {
    //                  $query9 = "UPDATE TestQuestions SET topics_id='".$topic."' WHERE number='".$number."'  AND test_id='".$test_id."'";
    //                  $result9 = mysql_query($query9) or die("Query Failed update tid9: ".mysql_error());
    //              }
    //              $query10 = "UPDATE question_status SET status='uncheck' WHERE q_id='".$q_idq."'";
    //              $result10 = mysql_query($query10) or die("Query Failed update tid9: ".mysql_error());
    //              $message = "Successfully Updated!";
    //              echo "<script type='text/javascript'>alert('$message');</script>";
    //          }
    //      }
    //  }
    //  echo "<meta http-equiv='refresh' content='0'>";
    //  
    // }
    // function essaysave($syl,$tq_id,$ttype,$name1,$name2,$name3){
    //  $this->loaddb();
    //  $testnum=$_POST['essaytn'];
    //  $testdirection=$_POST['essaydirect'];
    //  $testimport=$name2;
    //  $number=$_POST['essaynumbers'];
    //  $question=$_POST['essayquestion'];
    //  $questionimport=$name1;
    //  $answerimport=$name3;
    //  $topic=$_POST['essaytopics'];
    //  $cognitive=$_POST['essaycognitive'];
    //  $points=$_POST['essaypoints'];
    //  $answer=$_POST['essayanswer'];
        
    //  $sql="SELECT test_number.test_id FROM test_number INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id WHERE question_type.question_type_name = '".$ttype."' AND test_number.test_number = '".$testnum."' AND test_number.tq_id = '".$tq_id."'";
    //  $result= mysql_query($sql);

    //  if(mysql_num_rows($result)==0){
            
    //      $queryinsert = "INSERT INTO `test_number` (`test_number`, `test_desc`, `attachment`, `tq_id`, `question_type_id`) VALUES ('".$testnum."','".$testdirection."','".$testimport."','".$tq_id."','7')";
    //      $resultinsert=mysql_query($queryinsert) or die("Query Failed1 : ".mysql_error());
    //      $test_id=mysql_insert_id();
    //      $resultinsert1 = "INSERT INTO `TestQuestions` (`number`, `question_desc`, `points`, `attachment`, `cognitive_level_id`, `topics_id`, `test_id`) VALUES ('".$number."','".$question."','".$points."','".$questionimport."','".$cognitive."','".$topic."','".$test_id."')";
    //      $resultinsert2=mysql_query($resultinsert1) or die("Query Failed2 : ".mysql_error());
    //      $quest_id=mysql_insert_id();
    //      $insertq = "INSERT INTO `answer` (`answer_desc`, `answer_attach`, `q_id`) VALUES ('".$answer."','".$answerimport."','".$quest_id."')";
    //      $resultinsertq=mysql_query($insertq) or die("Query Failed answer : ".mysql_error());
    //      $insertstat = "INSERT INTO `question_status` (`status`, `q_id`) VALUES ('uncheck','".$quest_id."')";
    //      $resultstat=mysql_query($insertstat) or die("Query Failed qstat: ".mysql_error());
    //      $message = "Successfully Saved!";
    //      echo "<script type='text/javascript'>alert('$message');</script>";

    //  }else{
    //      while($row=mysql_fetch_array($result)){
    //          $test_id=$row['test_id'];
    //          if (!empty($_POST['essaydirect'])) {
    //              $querytd= "UPDATE test_number SET test_desc='".$testdirection."' WHERE test_id='".$test_id."'";
    //              $result1 = mysql_query($querytd) or die("Query Failed update tid: ".mysql_error());
    //          }   
    //          if (!empty($testimport)) {
    //              $queryatt = "UPDATE test_number SET attachment='".$testimport."' WHERE test_id='".$test_id."'";
    //              $result2 = mysql_query($queryatt) or die("Query Failed update tid: ".mysql_error());
    //          }
    //          $sql1="SELECT test_number.test_id, testquestions.number, testquestions.q_id  FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.syllabus_id = '".$syl."' AND question_type.question_type_name = '".$ttype."' AND test_number.test_number = '".$testnum."' AND testquestions.number = '".$number."'";
    //          $resulta= mysql_query($sql1);
    //          if(mysql_num_rows($resulta)==0){
    //              $resultinsert1 = "INSERT INTO `TestQuestions` (`number`, `question_desc`, `points`, `attachment`, `cognitive_level_id`, `topics_id`, `test_id`) VALUES ('".$number."','".$question."','".$points."','".$questionimport."','".$cognitive."','".$topic."','".$test_id."')";
    //              $resultinsert2=mysql_query($resultinsert1) or die("Query Failed2 : ".mysql_error());
    //              $quest_id=mysql_insert_id();
    //              $insertq = "INSERT INTO `answer` (`answer_desc`, `answer_attach`, `q_id`) VALUES ('".$answer."','".$answerimport."','".$quest_id."')";
    //              $resultinsertq=mysql_query($insertq) or die("Query Failed answer : ".mysql_error());
    //              $insertstat = "INSERT INTO `question_status` (`status`, `q_id`) VALUES ('uncheck','".$quest_id."')";
    //              $resultstat=mysql_query($insertstat) or die("Query Failed qstat: ".mysql_error());
    //              $message = "Successfully Saved!";
    //              echo "<script type='text/javascript'>alert('$message');</script>";
    //          }else{
    //              while($row=mysql_fetch_array($resulta)){
    //                  $q_idq=$row['q_id'];
    //              }
    //              if (!empty($question)) {
    //                  $query4 = "UPDATE TestQuestions SET question_desc='".$question."' WHERE number='".$number."' AND test_id='".$test_id."'";
    //                  $result4 = mysql_query($query4) or die("Query Failed update tid4: ".mysql_error());
    //              }
    //              if (!empty($points)) {
    //                  $query5 = "UPDATE TestQuestions SET points='".$points."' WHERE number='".$number."' AND test_id='".$test_id."'";
    //                  $result5 = mysql_query($query5) or die("Query Failed update tid5: ".mysql_error());
    //              }
    //              if (!empty($answer)) {
    //                  $query6 = "UPDATE answer SET answer_desc='".$answer."',answer_attach='".$answerimport."' WHERE q_id='".$q_idq."'";
    //                  $result6 = mysql_query($query6) or die("Query Failed update tid6: ".mysql_error());
    //              }
    //              if (!empty($questionimport)) {
    //                  $query7 = "UPDATE TestQuestions SET attachment='".$questionimport."' WHERE number='".$number."'  AND test_id='".$test_id."'";
    //                  $result7 = mysql_query($query7) or die("Query Failed update tid7: ".mysql_error());
    //              }
    //              if (!empty($cognitive)) {
    //                  $query8= "UPDATE TestQuestions SET cognitive_level_id='".$cognitive."' WHERE number='".$number."'  AND test_id='".$test_id."'";
    //                  $result8 = mysql_query($query8) or die("Query Failed update tid8: ".mysql_error());
    //              }
    //              if (!empty($topic)) {
    //                  $query9 = "UPDATE TestQuestions SET topics_id='".$topic."' WHERE number='".$number."'  AND test_id='".$test_id."'";
    //                  $result9 = mysql_query($query9) or die("Query Failed update tid9: ".mysql_error());
    //              }
    //              $query10 = "UPDATE question_status SET status='uncheck' WHERE q_id='".$q_idq."'";
    //              $result10 = mysql_query($query10) or die("Query Failed update tid9: ".mysql_error());
    //              $message = "Successfully Updated!";
    //              echo "<script type='text/javascript'>alert('$message');</script>";
    //          }
    //      }
    //  }
    //  echo "<meta http-equiv='refresh' content='0'>";
    //  
    // }
    // function fitbsave($syl,$tq_id,$ttype,$name1,$name2){
    //  $this->loaddb();
    //  $testnum=$_POST['fitbtn'];
    //  $testdirection=$_POST['fitbdirect'];
    //  $testimport=$name2;
    //  $number=$_POST['fitbnumbers'];
    //  $question=$_POST['fitbquestion'];
    //  $questionimport=$name1;
    //  $topic=$_POST['fitbtopics'];
    //  $cognitive=$_POST['fitbcognitive'];
    //  $points=$_POST['fitbpoints'];
    //  $answer=$_POST['fitbanswer'];
        
    //  $sql="SELECT test_number.test_id FROM test_number INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id WHERE question_type.question_type_name = '".$ttype."' AND test_number.test_number = '".$testnum."' AND test_number.tq_id = '".$tq_id."'";
    //  $result= mysql_query($sql);

    //  if(mysql_num_rows($result)==0){
            
    //      $queryinsert = "INSERT INTO `test_number` (`test_number`, `test_desc`, `attachment`, `tq_id`, `question_type_id`) VALUES ('".$testnum."','".$testdirection."','".$testimport."','".$tq_id."','8 ')";
    //      $resultinsert=mysql_query($queryinsert) or die("Query Failed1 : ".mysql_error());
    //      $test_id=mysql_insert_id();
    //      $resultinsert1 = "INSERT INTO `TestQuestions` (`number`, `question_desc`, `points`, `attachment`, `cognitive_level_id`, `topics_id`, `test_id`) VALUES ('".$number."','".$question."','".$points."','".$questionimport."','".$cognitive."','".$topic."','".$test_id."')";
    //      $resultinsert2=mysql_query($resultinsert1) or die("Query Failed2 : ".mysql_error());
    //      $quest_id=mysql_insert_id();
    //      $insertq = "INSERT INTO `answer` (`answer_desc`, `q_id`) VALUES ('".$answer."','".$quest_id."')";
    //      $resultinsertq=mysql_query($insertq) or die("Query Failed answer : ".mysql_error());
    //      $insertstat = "INSERT INTO `question_status` (`status`, `q_id`) VALUES ('uncheck','".$quest_id."')";
    //      $resultstat=mysql_query($insertstat) or die("Query Failed qstat: ".mysql_error());
    //      $message = "Successfully Saved!";
    //      echo "<script type='text/javascript'>alert('$message');</script>";

    //  }else{
    //      while($row=mysql_fetch_array($result)){
    //          $test_id=$row['test_id'];
    //          if (!empty($_POST['fitbdirect'])) {
    //              $querytd= "UPDATE test_number SET test_desc='".$testdirection."' WHERE test_id='".$test_id."'";
    //              $result1 = mysql_query($querytd) or die("Query Failed update tid: ".mysql_error());
    //          }   
    //          if (!empty($testimport)) {
    //              $queryatt = "UPDATE test_number SET attachment='".$testimport."' WHERE test_id='".$test_id."'";
    //              $result2 = mysql_query($queryatt) or die("Query Failed update tid: ".mysql_error());
    //          }
    //          $sql1="SELECT test_number.test_id, testquestions.number, testquestions.q_id  FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.syllabus_id = '".$syl."' AND question_type.question_type_name = '".$ttype."' AND test_number.test_number = '".$testnum."' AND testquestions.number = '".$number."'";
    //          $resulta= mysql_query($sql1);
    //          if(mysql_num_rows($resulta)==0){
    //              $resultinsert1 = "INSERT INTO `TestQuestions` (`number`, `question_desc`, `points`, `attachment`, `cognitive_level_id`, `topics_id`, `test_id`) VALUES ('".$number."','".$question."','".$points."','".$questionimport."','".$cognitive."','".$topic."','".$test_id."')";
    //              $resultinsert2=mysql_query($resultinsert1) or die("Query Failed2 : ".mysql_error());
    //              $quest_id=mysql_insert_id();
    //              $insertq = "INSERT INTO `answer` (`answer_desc`, `q_id`) VALUES ('".$answer."','".$quest_id."')";
    //              $resultinsertq=mysql_query($insertq) or die("Query Failed answer : ".mysql_error());
    //              $insertstat = "INSERT INTO `question_status` (`status`, `q_id`) VALUES ('uncheck','".$quest_id."')";
    //              $resultstat=mysql_query($insertstat) or die("Query Failed qstat: ".mysql_error());
    //              $message = "Successfully Saved!";
    //              echo "<script type='text/javascript'>alert('$message');</script>";
    //          }else{
    //              while($row=mysql_fetch_array($resulta)){
    //                  $q_idq=$row['q_id'];
    //              }
    //              if (!empty($question)) {
    //                  $query4 = "UPDATE TestQuestions SET question_desc='".$question."' WHERE number='".$number."' AND test_id='".$test_id."'";
    //                  $result4 = mysql_query($query4) or die("Query Failed update tid4: ".mysql_error());
    //              }
    //              if (!empty($points)) {
    //                  $query5 = "UPDATE TestQuestions SET points='".$points."' WHERE number='".$number."' AND test_id='".$test_id."'";
    //                  $result5 = mysql_query($query5) or die("Query Failed update tid5: ".mysql_error());
    //              }
    //              if (!empty($answer)) {
    //                  $query6 = "UPDATE answer SET answer_desc='".$answer."' WHERE q_id='".$q_idq."'";
    //                  $result6 = mysql_query($query6) or die("Query Failed update tid6: ".mysql_error());
    //              }
    //              if (!empty($questionimport)) {
    //                  $query7 = "UPDATE TestQuestions SET attachment='".$questionimport."' WHERE number='".$number."'  AND test_id='".$test_id."'";
    //                  $result7 = mysql_query($query7) or die("Query Failed update tid7: ".mysql_error());
    //              }
    //              if (!empty($cognitive)) {
    //                  $query8= "UPDATE TestQuestions SET cognitive_level_id='".$cognitive."' WHERE number='".$number."'  AND test_id='".$test_id."'";
    //                  $result8 = mysql_query($query8) or die("Query Failed update tid8: ".mysql_error());
    //              }
    //              if (!empty($topic)) {
    //                  $query9 = "UPDATE TestQuestions SET topics_id='".$topic."' WHERE number='".$number."'  AND test_id='".$test_id."'";
    //                  $result9 = mysql_query($query9) or die("Query Failed update tid9: ".mysql_error());
    //              }
    //              $query10 = "UPDATE question_status SET status='uncheck' WHERE q_id='".$q_idq."'";
    //              $result10 = mysql_query($query10) or die("Query Failed update tid10: ".mysql_error());
    //              $message = "Successfully Updated!";
    //              echo "<script type='text/javascript'>alert('$message');</script>";
    //          }
    //      }
    //  }
    //  echo "<meta http-equiv='refresh' content='0'>";
    //  
    // }
    function loadph($depart){
        if ($depart=="GEN") {
            $depart="SHS";
        }
        $this->loaddb();
        $sql=mysql_query("SELECT employment.employment_id, employment.employment_job_title, employees.employee_fname, employees.employee_mname, employees.employee_lname FROM employment INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id WHERE employment.employment_job_title = 'program head' AND department.department_name ='".$depart."'");
        while ($row=mysql_fetch_array($sql)) {
            $employment_id=$row['employment_id'];
            $employment_job_title=$row['employment_job_title'];
            $employee_fname=utf8_encode($row['employee_fname']);
            $employee_mname=utf8_encode($row['employee_mname']);
            $employee_lname=utf8_encode($row['employee_lname']);
            $fname= $employee_fname." ".$employee_lname;
            $ins="'Instructor'";
            echo '<tr><td>'.$fname.'</td><td><button class="pull-right btn btn-success subph" onclick="submitph('.$employment_id.','.$ins.')">Send</button></td><tr>';

        }
    }
    function submitph($tq_id){
        $this->loaddb();
        $sql1="SELECT tq.num_copies FROM tq WHERE tq.tq_id = '".$tq_id."'";
        $result1= mysql_query($sql1);
        while($row=mysql_fetch_array($result1)){
            $num_copies=$row['num_copies'];
        }
        $sql="SELECT Sum(testquestions.points) AS total FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.tq_id ='".$tq_id."'";
        $result= mysql_query($sql);
        while($row=mysql_fetch_array($result)){
            $total=$row['total'];
        }
        if (!empty($num_copies)) {
            if ($total>=100) {
                $this->submitph1($tq_id);
            }else{
                echo "<script type='text/javascript'>alert('Test Questionnaire must have 100 points.');</script>";
            }
        }else{
            echo "<script type='text/javascript'>alert('Please set the number of student.');</script>";
        }
        
        
    }

    function submitph1($tq_id){
        $this->loaddb();
        $sql="SELECT submission_sched.deadline FROM major_exams INNER JOIN submission_sched ON submission_sched.exam_id = major_exams.exam_id WHERE major_exams.exam_period = 'prelim'";
        $result= mysql_query($sql);
        while($row=mysql_fetch_array($result)){
            $deadline=$row['deadline'];
        }
        $today=date("Y-m-d");
        if (!$deadline) {
            $query="UPDATE tqstatus SET status_desc='queue for ph' , late='no', date_time = NOW(), notif_status = 'unread' WHERE tq_id='".$tq_id."'";
                $result = mysql_query($query) or die("Query Failed update update status: ".mysql_error());
        }else{
            if ($today>$deadline) {
                $query1="UPDATE tqstatus SET status_desc='queue for ph', late='yes', date_time = '".$today."<".$deadline."', notif_status = 'unread' WHERE tq_id='".$tq_id."'";
                $result1 = mysql_query($query1) or die("Query Failed update update status: ".mysql_error());
            }else{
                $query="UPDATE tqstatus SET status_desc='queue for ph', late='no', date_time = NOW(), notif_status = 'unread' WHERE tq_id='".$tq_id."'";
                $result = mysql_query($query) or die("Query Failed update update status: ".mysql_error());
            }
        }

        echo "<script type='text/javascript'>alert('Test Questionnaire Sent!!! QUE FOR PH'); window.location.href='tq_index.php'</script>";
        
    }

    function showtest($tq_id,$ttype){
        $this->loaddb();
        $sql = "SELECT test_number.test_number, test_number.test_desc, test_number.attachment, test_number.test_id FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN question_type ON test_number.question_type_id = question_type.question_type_id WHERE tq.tq_id = '".$tq_id."' AND question_type.question_type_name = '".$ttype."'";
        $result = mysql_query($sql);
        if(!$result){
            echo 'No Data for this Test Type';
        }else{
            while($row=mysql_fetch_array($result)){
                $test_number=$row['test_number'];
                $test_desc=$row['test_desc'];
                $test_id=$row['test_id'];
                $attachment=$row['attachment'];
                if ($test_number==1) {
                    $tn="I.";
                }else if ($test_number==2) {
                    $tn="II.";
                }else if ($test_number==3) {
                    $tn="III.";
                }else if ($test_number==4) {
                    $tn="IV.";
                }else if ($test_number==5) {
                    $tn="V.";
                }else if ($test_number==6) {
                    $tn="VI.";
                }else if ($test_number==7) {
                    $tn="VII.";
                }else if ($test_number==8) {
                    $tn="VIII.";
                }else if ($test_number==9) {
                    $tn="IX.";
                }else if ($test_number==10) {
                    $tn="X.";
                }
            echo "
                <tr>
                    <td class='col-xs-12'><b>".$tn." ".$ttype."</b></td>
                </tr>
                <tr>
                    <td><b> Direction: </b>".$test_desc."</td>
                </tr>";
                if (!empty($attachment)) {
                    echo "<tr>
                    <td><img src='uploads/".$attachment."' style='max-width:auto; height:auto'</td>
                </tr>";
                }
                $this->showanswer($test_id);
            }                                       
        }
        
    }

    function showanswer($test_id){
        $this->loaddb();
        $sql = "SELECT testquestions.number, testquestions.q_id, testquestions.question_desc, testquestions.points, testquestions.test_id, topics.topic_description, cognitive_level.cognitive_desc, testquestions.attachment FROM testquestions INNER JOIN topics ON testquestions.topics_id = topics.topics_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE testquestions.test_id = '".$test_id."' ORDER BY testquestions.number ASC";
                

        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{

            while($row=mysql_fetch_array($result)){
                $q_id=$row['q_id'];
                $number=$row['number'];
                $question_desc=$row['question_desc'];
                $points=$row['points'];
                $topic_description=$row['topic_description'];
                $cognitive_desc=$row['cognitive_desc'];
                $attachment=$row['attachment'];
                
            echo "<tr><td>
                
                <div class='col-xs-12'>
                    ".$number." . <input type='text' class='form-control' name='question_desc' disabled='disable' value='".$question_desc."''>
                </div>
                </td></tr>";
                if (!empty($attachment)) {
                    echo "<tr>
                    <td><img src='uploads/".$attachment."' style='max-width:auto; height:auto'</td>
                </tr>";
            }
            echo"
                <tr><td>
                <div class='col-xs-4'>
                    Points: <input type='text' class='form-control' name='points' disabled='disable' value='".$points."''>
                </div>
                <div class='col-xs-4'`>
                    Topic: <input type='text' class='form-control' name='topic_description' disabled='disable' value='".$topic_description."''>
                </div>
                <div class='col-xs-4'`>
                    Cognitive Level: <input type='text' class='form-control' name='cognitive_desc' disabled='disable' value='".$cognitive_desc."''>
                </div>
                </td></tr><tr><td>";
                $this->answerload($q_id);
                echo "</td></tr><tr><td>";
                $this->loadchoices($q_id);
                echo "</td></tr>";
                echo"<tr><td>";
                $this->loadremarks($q_id);
                echo "</td></tr>";
                
                
            }   
        }
        
    }

    function answerload($q_id){
        $this->loaddb();
        $query="SELECT * FROM answer WHERE answer.q_id = '".$q_id."'";
        $result = mysql_query($query);
        $count=1;
        while($row=mysql_fetch_array($result)){
                $answer_desc=$row['answer_desc'];
                $answer_attach=$row['answer_attach'];

        echo "<div class='col-xs-12'>
                    Answer ".$count.": <textarea type='text' class='form-control' name='answer' disabled='disable'>".$answer_desc."</textarea>
                </div>
                ";
                if (!empty($answer_attach)) {
                    echo "
                    <div class='col-xs-12'><img src='uploads/".$answer_attach."' style='width:90%;height:200px;'></div>";
                
            }
        $count++;
        }
        
    }

    function loadremarks($q_id){
        $this->loaddb();
        $query="SELECT * FROM remarks WHERE remarks.q_id = '".$q_id."'";
        $result = mysql_query($query);
        $count=1;
        while($row=mysql_fetch_array($result)){
            $remark_desc=$row['remark_desc'];
            $date_time=$row['date_time'];
            if ($remark_desc!="none") {
                echo "<div class='col-xs-12'`>
                    <b>Remarks".$count.": <b/> ".$date_time.": <p>".$remark_desc."</p></div>";
            }               
            $count++;
        }
        
    }
    
    function loadprint1(){
        $this->loaddb();
        $sql="SELECT tq.tq_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, `subject`.subj_name, syllabus.syllabus_id, tq.num_copies FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id WHERE tqstatus.status_desc = 'for printing' ORDER BY tqstatus.date_time ASC";
        $result=mysql_query($sql);
        if (mysql_num_rows($result)==0) {
        }else{
            $i=0;
            while ($row=mysql_fetch_array($result)) {
                $tq_id=$row['tq_id'];
                $num_copies=$row['num_copies'];
                $syllabus_id=$row['syllabus_id'];
                $fullname_session=utf8_encode($row['employee_fname'])." ".utf8_encode($row['employee_mname'])." ".utf8_encode($row['employee_lname'])." ".utf8_encode($row['employee_ext']);
                $subj_name=$row['subj_name'];
                echo '<tr>
                        <form action="printtq.php" method="get" >
                            <td><input type="hidden" name="tq_id" class="form-control" value="'.$tq_id.'">
                            <input type="hidden" name="syllabus_id" class="form-control" value="'.$syllabus_id.'">
                            <input type="hidden" name="num_copies" class="form-control" value="'.$num_copies.'">
                            <a>'.$fullname_session.'</a></td>
                            <td><a>'.$subj_name.'</a></td>
                            <td><a>'.$num_copies.'</a></td>';
                    if ($i==0) {
                        echo '<td><button type="submit" class="btn btn-default" id="" name="Open">
                            <a><i class="glyphicon glyphicon-folder-open createtq"><span class="createtqtext"></span></i></a>
                            </button></td>
                            </form>
                        </tr>'; 
                    }else{
                        echo "</form><tr></tr>";
                    }
                $i++;
            }
        }
        
    }
    function shsloadprint1(){
        $this->loaddb();
        $sql="SELECT shs_subject.shs_subj_name, shs_tq.shs_tq_id, shs_tq.shs_num_copies, shs_syll.shs_syll_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext FROM shs_syll INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN employment ON shs_syll.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id WHERE shs_tqstatus.shs_status_desc = 'for printing' ORDER BY shs_tqstatus.shs_date_time ASC ";
        $result=mysql_query($sql);
        if (mysql_num_rows($result)==0) {
        }else{
            $i=0;
            while ($row=mysql_fetch_array($result)) {
                $tq_id=$row['shs_tq_id'];
                $num_copies=$row['shs_num_copies'];
                $syllabus_id=$row['shs_syll_id'];
                $fullname_session=utf8_encode($row['employee_fname'])." ".utf8_encode($row['employee_mname'])." ".utf8_encode($row['employee_lname'])." ".utf8_encode($row['employee_ext']);
                $subj_name=$row['shs_subj_name'];
                echo '<tr>
                        <form action="shsprinttq.php" method="get" >
                            <td><input type="hidden" name="tq_id" class="form-control" value="'.$tq_id.'">
                            <input type="hidden" name="syllabus_id" class="form-control" value="'.$syllabus_id.'">
                            <input type="hidden" name="num_copies" class="form-control" value="'.$num_copies.'">
                            <a>'.$fullname_session.'</a></td>
                            <td><a>'.$subj_name.'</a></td>
                            <td><a>'.$num_copies.'</a></td>';
                    if ($i==0) {
                        echo '<td><button type="submit" class="btn btn-default" id="" name="Open">
                            <a><i class="glyphicon glyphicon-folder-open createtq"><span class="createtqtext"></span></i></a>
                            </button></td>
                            </form>
                        </tr>'; 
                    }else{
                        echo "</form><tr></tr>";
                    }
                $i++;
            }
        }
        
    }
    function loadprint2(){
        $this->loaddb();
        $sql="SELECT tq.tq_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, `subject`.subj_name, syllabus.syllabus_id, tq.num_copies FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id WHERE tqstatus.status_desc = 'printed' ORDER BY tqstatus.date_time DESC";
        $result=mysql_query($sql);
        if (mysql_num_rows($result)==0) {
        }else{
            while ($row=mysql_fetch_array($result)) {
                $tq_id=$row['tq_id'];
                $num_copies=$row['num_copies'];
                $syllabus_id=$row['syllabus_id'];
                $fullname_session=utf8_encode($row['employee_fname'])." ".utf8_encode($row['employee_mname'])." ".utf8_encode($row['employee_lname'])." ".utf8_encode($row['employee_ext']);
                $subj_name=$row['subj_name'];
                echo '<tr>
                        <form action="printtq.php" method="get" >
                            <td><input type="hidden" name="tq_id" class="form-control" value="'.$tq_id.'">
                            <input type="hidden" name="syllabus_id" class="form-control" value="'.$syllabus_id.'">
                            <input type="hidden" name="num_copies" class="form-control" value="'.$num_copies.'">
                            <a>'.$fullname_session.'</a></td>
                            <td><a>'.$subj_name.'</a></td>
                            <td><a>'.$num_copies.'</a></td>';
                        echo '<td><button type="submit" class="btn btn-default" id="" name="Open">
                            <a><i class="glyphicon glyphicon-folder-open createtq"><span class="createtqtext"></span></i></a>
                            </button></td>
                            </form>
                        </tr>'; 
            }
        }
        
    }
    function shsloadprint2(){
        $this->loaddb();
         $sql="SELECT shs_subject.shs_subj_name, shs_tq.shs_tq_id, shs_tq.shs_num_copies, shs_syll.shs_syll_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext FROM shs_syll INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN employment ON shs_syll.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id WHERE shs_tqstatus.shs_status_desc = 'Printed' ORDER BY shs_tqstatus.shs_date_time DESC ";
        $result=mysql_query($sql);
        if (mysql_num_rows($result)==0) {
        }else{
            while ($row=mysql_fetch_array($result)) {
                $tq_id=$row['shs_tq_id'];
                $num_copies=$row['shs_num_copies'];
                $syllabus_id=$row['shs_syll_id'];
                $fullname_session=utf8_encode($row['employee_fname'])." ".utf8_encode($row['employee_mname'])." ".utf8_encode($row['employee_lname'])." ".utf8_encode($row['employee_ext']);
                $subj_name=$row['shs_subj_name'];
                echo '<tr>
                        <form action="shsprinttq.php" method="get" >
                            <td><input type="hidden" name="tq_id" class="form-control" value="'.$tq_id.'">
                            <input type="hidden" name="syllabus_id" class="form-control" value="'.$syllabus_id.'">
                            <input type="hidden" name="num_copies" class="form-control" value="'.$num_copies.'">
                            <a>'.$fullname_session.'</a></td>
                            <td><a>'.$subj_name.'</a></td>
                            <td><a>'.$num_copies.'</a></td>';
                        echo '<td><button type="submit" class="btn btn-default" id="" name="Open">
                            <a><i class="glyphicon glyphicon-folder-open createtq"><span class="createtqtext"></span></i></a>
                            </button></td>
                            </form>
                        </tr>'; 
            }
        }
    }

    function previewtq($test){
        $this->loaddb();
        $sql = "SELECT test_number.test_id, test_number.test_number, test_number.attachment, test_number.test_desc, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE test_number.tq_id = '".$test."' ORDER BY test_number.test_number ASC";
        

        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{
            while($row=mysql_fetch_array($result)){
                $test_number=$row['test_number'];
                $question_type_name=html_entity_decode($row['question_type_name']);
                $test_desc=html_entity_decode($row['test_desc']);
                $test_id=$row['test_id'];
                $attachment=$row['attachment'];

                echo'<table>';
                if ($test_number==1) {
                    $tn="I.";
                } 
                else if ($test_number==2) {
                    $tn="II.";
                }
                else if ($test_number==3) {
                    $tn="III.";
                }
                else if ($test_number==4) {
                    $tn="IV.";
                }
                
                else if ($test_number==5) {
                    $tn="V.";
                }
                
                else if ($test_number==6) {
                    $tn="VI.";
                }
                
                else if ($test_number==7) {
                    $tn="VII.";
                }
                
                else if ($test_number==8) {
                    $tn="VIII.";
                }
                
                else if ($test_number==9) {
                    $tn="IX.";
                }
                
                else if ($test_number==10) {
                    $tn="X.";
                }
                
            echo "<tr><td><br></tr></td>
                <tr>
                    <td colspan='4'><b>".$tn." ".$question_type_name.". </b>".$test_desc."</td>
                </tr>";
                if (!empty($attachment)) {
                    echo "<tr>
                    <td colspan='4'><img src='uploads/".$attachment."' style='max-width:auto; height:auto'></td>
                </tr>";
                }

                if ($question_type_name=="Matching Type") {
                    $sqlcolnum=mysql_query("SELECT Max(answer.cols) AS col FROM test_number INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN answer ON answer.q_id = testquestions.q_id INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE testquestions.test_id = '".$test_id."' AND question_type.question_type_name = 'Matching Type' GROUP BY testquestions.test_id");
                    while($rowcol=mysql_fetch_array($sqlcolnum)){
                        $col=$rowcol['col'];
                    }
                    echo "<tr colspan='2'><td colspan='4'><br><table>";
                    echo "<tr>";
                    echo "<td>";
                    $this->printquestions1($test_id);
                    echo "</td>";
                    for ($i=1; $i <= $col; $i++) { 
                        $this->loadmchoice($test_id,$i);
                    }
                    
                    echo "</tr>";
                    echo "</table></td></tr>";
                    
                }else{
                    $this->printquestions($test_id);
                }
              echo '</table>';  
            }                                       
        }
        
    }
    function shspreviewtq($test){
        $this->loaddb();
        $sql = "SELECT shs_test_number.shs_test_id, shs_test_number.shs_test_number, shs_test_number.shs_attachment, shs_test_number.shs_test_desc, shs_question_type.shs_question_type_name FROM shs_test_number INNER JOIN shs_question_type ON shs_question_type.shs_test_id = shs_test_number.shs_test_id WHERE shs_test_number.shs_tq_id = '".$test."' ORDER BY shs_test_number.shs_test_number ASC";
        

        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{
            while($row=mysql_fetch_array($result)){
                $test_number=$row['shs_test_number'];
                $question_type_name=html_entity_decode($row['shs_question_type_name']);
                $test_desc=html_entity_decode($row['shs_test_desc']);
                $test_id=$row['shs_test_id'];
                $attachment=$row['shs_attachment'];

                echo'<table>';
                if ($test_number==1) {
                    $tn="I.";
                } 
                else if ($test_number==2) {
                    $tn="II.";
                }
                else if ($test_number==3) {
                    $tn="III.";
                }
                else if ($test_number==4) {
                    $tn="IV.";
                }
                
                else if ($test_number==5) {
                    $tn="V.";
                }
                
                else if ($test_number==6) {
                    $tn="VI.";
                }
                
                else if ($test_number==7) {
                    $tn="VII.";
                }
                
                else if ($test_number==8) {
                    $tn="VIII.";
                }
                
                else if ($test_number==9) {
                    $tn="IX.";
                }
                
                else if ($test_number==10) {
                    $tn="X.";
                }
                
            echo "<tr><td><br></tr></td>
                <tr>
                    <td colspan='4'><b>".$tn." ".$question_type_name.". </b>".$test_desc."</td>
                </tr>";
                if (!empty($attachment)) {
                    echo "<tr>
                    <td colspan='4'><img src='uploads/".$attachment."' style='max-width:auto; height:auto></td>
                </tr>";
                }

                if ($question_type_name=="Matching Type") {
                    $sqlcolnum=mysql_query("SELECT Max(shs_answer.shs_cols) AS col FROM shs_test_number INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id INNER JOIN shs_answer ON shs_answer.shs_q_id = shs_testquestions.shs_q_id INNER JOIN shs_question_type ON shs_question_type.shs_test_id = shs_test_number.shs_test_id WHERE shs_testquestions.shs_test_id = '".$test_id."' AND shs_question_type.shs_question_type_name = 'Matching Type' GROUP BY shs_testquestions.shs_test_id");
                    while($rowcol=mysql_fetch_array($sqlcolnum)){
                        $col=$rowcol['col'];
                    }
                    echo "<tr colspan='2'><td colspan='4'><br><table>";
                    echo "<tr>";
                    echo "<td>";
                    $this->shsprintquestions1($test_id);
                    echo "</td>";
                    for ($i=1; $i <= $col; $i++) { 
                        $this->shsloadmchoice($test_id,$i);
                    }
                    
                    echo "</tr>";
                    echo "</table></td></tr>";
                    
                }else{
                    $this->shsprintquestions($test_id);
                }
              echo '</table>';  
            }                                       
        }
        
    }

    function loadmchoice($test_id,$col){
        $this->loaddb();
        $sql="SELECT answer.answer_desc FROM test_number INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN answer ON answer.q_id = testquestions.q_id WHERE test_number.test_id ='".$test_id."' AND answer.cols ='".$col."'";
        $result= mysql_query($sql);
        $count=0;
        $answer_desc = array();
        echo "<td>";
        while($row=mysql_fetch_array($result)){
            $answer_desc[]=html_entity_decode($row['answer_desc']);
            
        }
        shuffle($answer_desc);
        foreach ($answer_desc as $key => $value) {
            $count++;
            if ($count==1) {
                $l="a.";
            }else if ($count==2) {
                $l="b.";
            }else if ($count==3) {
                $l="c.";
            }else if ($count==4) {
                $l="d.";
            }else if ($count==5) {
                $l="e.";
            }else if ($count==6) {
                $l="f.";
            }else if ($count==7) {
                $l="g.";
            }else if ($count==8) {
                $l="h.";
            }else if ($count==9) {
                $l="i.";
            }else if ($count==10) {
                $l="j.";
            }else if ($count==11) {
                $l="k.";
            }else if ($count==12) {
                $l="l.";
            }else if ($count==13) {
                $l="m.";
            }else if ($count==14) {
                $l="n.";
            }else if ($count==15) {
                $l="o.";
            }else if ($count==16) {
                $l="p.";
            }else if ($count==17) {
                $l="q.";
            }else if ($count==18) {
                $l="r.";
            }else if ($count==19) {
                $l="s.";
            }else if ($count==20) {
                $l="t.";
            }else if ($count==21) {
                $l="u.";
            }else if ($count==22) {
                $l="v.";
            }else if ($count==23) {
                $l="w.";
            }else if ($count==24) {
                $l="x.";
            }else if ($count==25) {
                $l="y.";
            }else if ($count==26) {
                $l="z.";
            }
            echo "
            <div class='col-xs-12'>".$l." ".$answer_desc[$key]."
            </div>";
        }
        echo "</td>";
        
    }
    function shsloadmchoice($test_id,$col){
        $this->loaddb();
        $sql="SELECT shs_answer.shs_answer_desc FROM shs_test_number INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id INNER JOIN shs_answer ON shs_answer.shs_q_id = shs_testquestions.shs_q_id WHERE shs_test_number.shs_test_id ='".$test_id."' AND shs_answer.shs_cols ='".$col."'";
        $result= mysql_query($sql);
        $count=0;
        $answer_desc = array();
        echo "<td>";
        while($row=mysql_fetch_array($result)){
            $answer_desc[]=html_entity_decode($row['shs_answer_desc']);
            
        }
        shuffle($answer_desc);
        foreach ($answer_desc as $key => $value) {
            $count++;
            if ($count==1) {
                $l="a.";
            }else if ($count==2) {
                $l="b.";
            }else if ($count==3) {
                $l="c.";
            }else if ($count==4) {
                $l="d.";
            }else if ($count==5) {
                $l="e.";
            }else if ($count==6) {
                $l="f.";
            }else if ($count==7) {
                $l="g.";
            }else if ($count==8) {
                $l="h.";
            }else if ($count==9) {
                $l="i.";
            }else if ($count==10) {
                $l="j.";
            }else if ($count==11) {
                $l="k.";
            }else if ($count==12) {
                $l="l.";
            }else if ($count==13) {
                $l="m.";
            }else if ($count==14) {
                $l="n.";
            }else if ($count==15) {
                $l="o.";
            }else if ($count==16) {
                $l="p.";
            }else if ($count==17) {
                $l="q.";
            }else if ($count==18) {
                $l="r.";
            }else if ($count==19) {
                $l="s.";
            }else if ($count==20) {
                $l="t.";
            }else if ($count==21) {
                $l="u.";
            }else if ($count==22) {
                $l="v.";
            }else if ($count==23) {
                $l="w.";
            }else if ($count==24) {
                $l="x.";
            }else if ($count==25) {
                $l="y.";
            }else if ($count==26) {
                $l="z.";
            }
            echo "
            <div class='col-xs-12'>".$l." ".$answer_desc[$key]."
            </div>";
        }
        echo "</td>";
        
    }

    function checkperiod($tq_id){
        $this->loaddb();
        $sql="SELECT major_exams.exam_period FROM tq INNER JOIN major_exams ON tq.exam_id = major_exams.exam_id WHERE tq.tq_id = '".$tq_id."'";
        $result= mysql_query($sql);
        while($row=mysql_fetch_array($result)){
            $exam_period=$row['exam_period'];
            echo $exam_period."";
        }
        
    }
    function shscheckperiod($tq_id){
        $this->loaddb();
        $sql="SELECT major_exams.exam_period FROM shs_tq INNER JOIN major_exams ON shs_tq.exam_id = major_exams.exam_id WHERE shs_tq.shs_tq_id = '".$tq_id."'";
        $result= mysql_query($sql);
        while($row=mysql_fetch_array($result)){
            $exam_period=$row['exam_period'];
            echo $exam_period."";
        }
        
    }

    function printquestions($test_id){
        $this->loaddb();
        $sql = "SELECT testquestions.number, testquestions.q_id, testquestions.question_desc, testquestions.points, testquestions.test_id, topics.topic_description, cognitive_level.cognitive_desc, testquestions.attachment FROM testquestions INNER JOIN topics ON testquestions.topics_id = topics.topics_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE testquestions.test_id = '".$test_id."' ORDER BY testquestions.number ASC";;
                
        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{

            while($row=mysql_fetch_array($result)){
                $q_id=$row['q_id'];
                $number=$row['number'];
                $question_desc=html_entity_decode($row['question_desc']);
                $points=$row['points'];
                $topic_description=$row['topic_description'];
                $cognitive_desc=$row['cognitive_desc'];
                $attachment=$row['attachment'];
                
            echo "<tr><td></tr></td><tr><td colspan='4'>
                
                <div class='col-xs-12'>
                    ".$number." . ".$question_desc."
                </div>
                </td></tr>";
                if (!empty($attachment)) {
                    echo "<tr>
                    <td colspan='4'align='center'><img src='uploads/".$attachment."' style='max-width:auto; height:auto'></td>
                </tr>";
            }
                echo "<tr><td colspan='4' style='padding-right: 40px;'>";
                $this->loadchoices1($q_id);
                echo "</td></tr colspan='4'>";
                echo"
                <tr><td colspan='4'>
                <div class='col-xs-12'`>";
            }   
        }
        
    }
    function shsprintquestions($test_id){
        $this->loaddb();
        $sql = "SELECT shs_testquestions.shs_number, shs_testquestions.shs_q_id, shs_testquestions.shs_question_desc, shs_testquestions.shs_points, shs_testquestions.shs_test_id, shs_topics.shs_topic_description, cognitive_level.cognitive_desc, shs_testquestions.shs_attachment FROM shs_testquestions INNER JOIN shs_topics ON shs_testquestions.shs_topics_id = shs_topics.shs_topics_id INNER JOIN cognitive_level ON shs_testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE shs_testquestions.shs_test_id = '".$test_id."' ORDER BY shs_testquestions.shs_number ASC";
                
        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{

            while($row=mysql_fetch_array($result)){
                $q_id=$row['shs_q_id'];
                $number=$row['shs_number'];
                $question_desc=html_entity_decode($row['shs_question_desc']);
                $points=$row['shs_points'];
                $topic_description=$row['shs_topic_description'];
                $cognitive_desc=$row['cognitive_desc'];
                $attachment=$row['shs_attachment'];
                
            echo "<tr><td></tr></td><tr><td colspan='4'>
                
                <div class='col-xs-12'>
                    ".$number." . ".$question_desc."
                </div>
                </td></tr>";
                if (!empty($attachment)) {
                    echo "<tr>
                    <td colspan='4'align='center'><img src='uploads/".$attachment."' style='width:auto;height:auto;'></td>
                </tr>";
            }
                echo "<tr><td colspan='4' style='padding-right: 40px;'>";
                $this->shsloadchoices1($q_id);
                echo "</td></tr colspan='4'>";
                echo"
                <tr><td colspan='4'>
                <div class='col-xs-12'`>";
            }   
        }
        
    }
    function printquestions1($test_id){
        $this->loaddb();
        $sql = "SELECT testquestions.number, testquestions.q_id, testquestions.question_desc, testquestions.points, testquestions.test_id, topics.topic_description, cognitive_level.cognitive_desc, testquestions.attachment FROM testquestions INNER JOIN topics ON testquestions.topics_id = topics.topics_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE testquestions.test_id = '".$test_id."' ORDER BY testquestions.number ASC";
                
        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{

            while($row=mysql_fetch_array($result)){
                $q_id=$row['q_id'];
                $number=$row['number'];
                $question_desc=html_entity_decode($row['question_desc']);
                $points=$row['points'];
                $topic_description=$row['topic_description'];
                $cognitive_desc=$row['cognitive_desc'];
                $attachment=$row['attachment'];
                
            echo "<div class='col-xs-12'>
                    ".$number." . ".$question_desc."
                </div>";
                if (!empty($attachment)) {
                    echo "<div class='col-xs-12'><img src='uploads/".$attachment."' style='width:auto;height:auto;'></div>";
                }
            }   
        }
        
    }
    function shsprintquestions1($test_id){
        $this->loaddb();
        $sql = "SELECT shs_testquestions.shs_number, shs_testquestions.shs_q_id, shs_testquestions.shs_question_desc, shs_testquestions.shs_points, shs_testquestions.shs_test_id, shs_topics.shs_topic_description, cognitive_level.cognitive_desc, shs_testquestions.shs_attachment FROM shs_testquestions INNER JOIN shs_topics ON shs_testquestions.shs_topics_id = shs_topics.shs_topics_id INNER JOIN cognitive_level ON shs_testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE shs_testquestions.shs_test_id = '".$test_id."' ORDER BY shs_testquestions.shs_number ASC";
                
        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{

            while($row=mysql_fetch_array($result)){
                $q_id=$row['shs_q_id'];
                $number=$row['shs_number'];
                $question_desc=html_entity_decode($row['shs_question_desc']);
                $points=$row['shs_points'];
                $topic_description=$row['shs_topic_description'];
                $cognitive_desc=$row['cognitive_desc'];
                $attachment=$row['shs_attachment'];
                
            echo "<div class='col-xs-12'>
                    ".$number." . ".$question_desc."
                </div>";
                if (!empty($attachment)) {
                    echo "<div class='col-xs-12'><img src='uploads/".$attachment."' style='width:auto;height:auto;'></div>";
                }
            }   
        }
        
    }

    function gettest($a,$tq_id,$cog){
        $a1=$a;
        $tq_id1=$tq_id;
        $cog1=$cog;
        $this->loaddb();
        $sqlf="SELECT DISTINCT test_number.test_number FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN topics ON testquestions.topics_id = topics.topics_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE tq.tq_id = '".$tq_id."' AND cognitive_level.cognitive_level_id = '".$cog."' AND topics.topic_description = '".$a."'";
        $resd = mysql_query($sqlf);
        while($row=mysql_fetch_array($resd)){
            $test_number=$row['test_number'];
            if ($test_number==1) {
                    $tn="I.";
                } 
                else if ($test_number==2) {
                    $tn="II.";
                }
                else if ($test_number==3) {
                    $tn="III.";
                }
                else if ($test_number==4) {
                    $tn="IV.";
                }
                
                else if ($test_number==5) {
                    $tn="V.";
                }
                
                else if ($test_number==6) {
                    $tn="VI.";
                }
                
                else if ($test_number==7) {
                    $tn="VII.";
                }
                
                else if ($test_number==8) {
                    $tn="VIII.";
                }
                
                else if ($test_number==9) {
                    $tn="IX.";
                }
                
                else if ($test_number==10) {
                    $tn="X.";
                }
            echo $tn."[";
            $this->getnumm($a1,$tq_id1,$cog1,$test_number);
            echo "]";
        }
        
    }
    function shsgettest($a,$tq_id,$cog){
        $a1=$a;
        $tq_id1=$tq_id;
        $cog1=$cog;
        $this->loaddb();
        $sqlf="SELECT DISTINCT shs_test_number.shs_test_number FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id INNER JOIN shs_topics ON shs_testquestions.shs_topics_id = shs_topics.shs_topics_id INNER JOIN cognitive_level ON shs_testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE shs_tq.shs_tq_id = '".$tq_id."' AND cognitive_level.cognitive_level_id = '".$cog."' AND shs_topics.shs_topic_description = '".$a."'";
        $resd = mysql_query($sqlf);
        while($row=mysql_fetch_array($resd)){
            $test_number=$row['shs_test_number'];
            if ($test_number==1) {
                    $tn="I.";
                } 
                else if ($test_number==2) {
                    $tn="II.";
                }
                else if ($test_number==3) {
                    $tn="III.";
                }
                else if ($test_number==4) {
                    $tn="IV.";
                }
                
                else if ($test_number==5) {
                    $tn="V.";
                }
                
                else if ($test_number==6) {
                    $tn="VI.";
                }
                
                else if ($test_number==7) {
                    $tn="VII.";
                }
                
                else if ($test_number==8) {
                    $tn="VIII.";
                }
                
                else if ($test_number==9) {
                    $tn="IX.";
                }
                
                else if ($test_number==10) {
                    $tn="X.";
                }
            echo $tn."[";
            $this->shsgetnumm($a1,$tq_id1,$cog1,$test_number);
            echo "]";
        }
        
    }

    function getnumm($a,$tq_id,$cog,$test_number){
        $this->loaddb();
        $sqlf="SELECT testquestions.number FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN topics ON testquestions.topics_id = topics.topics_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE tq.tq_id = '".$tq_id."' AND cognitive_level.cognitive_level_id = '".$cog."' AND topics.topic_description = '".$a."' AND test_number.test_number ='".$test_number."'";
        $resd = mysql_query($sqlf);
        $i=0;
        while($row=mysql_fetch_array($resd)){
            $number=$row['number'];
            if ($i>0) {
                echo ", ";
            }
            echo $number;
            $i++;
        }
        
    }
    function shsgetnumm($a,$tq_id,$cog,$test_number){
        $this->loaddb();
        $sqlf="SELECT shs_testquestions.shs_number FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id INNER JOIN shs_topics ON shs_testquestions.shs_topics_id = shs_topics.shs_topics_id INNER JOIN cognitive_level ON shs_testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE shs_tq.shs_tq_id = '".$tq_id."' AND cognitive_level.cognitive_level_id = '".$cog."' AND shs_topics.shs_topic_description = '".$a."' AND shs_test_number.shs_test_number ='".$test_number."'";
        $resd = mysql_query($sqlf);
        $i=0;
        while($row=mysql_fetch_array($resd)){
            $number=$row['shs_number'];
            if ($i>0) {
                echo ", ";
            }
            echo $number;
            $i++;
        }
        
    }

    function total($tq_id,$cog){
        $this->loaddb();
        $sqlf="SELECT Count(testquestions.number) AS count FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE cognitive_level.cognitive_level_id = '".$cog."' AND tq.tq_id ='".$tq_id."'";
        $resd = mysql_query($sqlf);
        while($row=mysql_fetch_array($resd)){
            $count=$row['count'];
            echo $count;
        }
        
    }
    function shstotal($tq_id,$cog){
        $this->loaddb();
        $sqlf="SELECT Count(shs_testquestions.shs_number) AS count FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id INNER JOIN cognitive_level ON shs_testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE cognitive_level.cognitive_level_id = '".$cog."' AND shs_tq.shs_tq_id ='".$tq_id."'";
        $resd = mysql_query($sqlf);
        while($row=mysql_fetch_array($resd)){
            $count=$row['count'];
            echo $count;
        }
        
    }

    function totalp($tq_id){
        $this->loaddb();
        $sqlf="SELECT Sum(testquestions.points) AS sum FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.tq_id ='".$tq_id."'";
        $resd = mysql_query($sqlf);
        while($row=mysql_fetch_array($resd)){
            $sum=$row['sum'];
            echo $sum;
        }
        
    }
    function shstotalp($tq_id){
        $this->loaddb();
        $sqlf="SELECT Sum(shs_testquestions.shs_points) AS sum FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_tq.shs_tq_id ='".$tq_id."'";
        $resd = mysql_query($sqlf);
        while($row=mysql_fetch_array($resd)){
            $sum=$row['sum'];
            echo $sum;
        }
        
    }

    function totali($tq_id){
        $this->loaddb();
        $sqlf="SELECT Count(testquestions.number) AS count FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id WHERE tq.tq_id ='".$tq_id."'";
        $resd = mysql_query($sqlf);
        while($row=mysql_fetch_array($resd)){
            $count=$row['count'];
            echo $count;
        }
        
    }
    function shstotali($tq_id){
        $this->loaddb();
        $sqlf="SELECT Count(shs_testquestions.shs_number) AS count FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id WHERE shs_tq.shs_tq_id ='".$tq_id."'";
        $resd = mysql_query($sqlf);
        while($row=mysql_fetch_array($resd)){
            $count=$row['count'];
            echo $count;
        }
        
    }
    function totalii($a,$tq_id){
        $this->loaddb();
        $sqlf="SELECT Count(testquestions.number) AS count FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN topics ON testquestions.topics_id = topics.topics_id WHERE topics.topic_description = '".$a."' AND tq.tq_id ='".$tq_id."'";
        $resd = mysql_query($sqlf);
        while($row=mysql_fetch_array($resd)){
            $count=$row['count'];
            echo $count;
        }
        
    }
    function shstotalii($a,$tq_id){
        $this->loaddb();
        $sqlf="SELECT Count(shs_testquestions.shs_number) AS count FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id INNER JOIN shs_topics ON shs_testquestions.shs_topics_id = shs_topics.shs_topics_id WHERE shs_topics.shs_topic_description = '".$a."' AND shs_tq.shs_tq_id ='".$tq_id."'";
        $resd = mysql_query($sqlf);
        while($row=mysql_fetch_array($resd)){
            $count=$row['count'];
            echo $count;
        }
        
    }
    function totalpp($a,$tq_id){
        $this->loaddb();
        $sqlf="SELECT Sum(testquestions.points) AS sum FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN topics ON testquestions.topics_id = topics.topics_id WHERE topics.topic_description = '".$a."' AND tq.tq_id ='".$tq_id."'";
        $resd = mysql_query($sqlf);
        while($row=mysql_fetch_array($resd)){
            $sum=$row['sum'];
            echo $sum;
        }
        
    }
    function shstotalpp($a,$tq_id){
        $this->loaddb();
        $sqlf="SELECT Sum(shs_testquestions.shs_points) AS sum FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id INNER JOIN shs_topics ON shs_testquestions.shs_topics_id = shs_topics.shs_topics_id WHERE shs_topics.shs_topic_description = '".$a."' AND shs_tq.shs_tq_id ='".$tq_id."'";
        $resd = mysql_query($sqlf);
        while($row=mysql_fetch_array($resd)){
            $sum=$row['sum'];
            echo $sum;
        }
        
    }

    function checktopic($tq_id1){
        $this->loaddb();
        $finalsyll = array();
        $topic_description= array();
        $sql="SELECT syllabus.course_info_id, topics.topic_description FROM tq INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN topics ON topics.syllabus_id = syllabus.syllabus_id WHERE tq.tq_id = '".$tq_id1."' AND topics.idsa <> 'Examination Week'";
        $result=mysql_query($sql);
        while ($row=mysql_fetch_array($result)){
            $topic_description[]=$row['topic_description'];
            $course_info_id=$row['course_info_id'];
        }
        $count = count($topic_description);
        $sql1="SELECT syllabus.syllabus_id FROM syllabus INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id WHERE syllabusstatus.syll_status_desc = 'approved' AND syllabus.course_info_id ='".$course_info_id."'";
        $result1=mysql_query($sql1);
        while ($row1=mysql_fetch_array($result1)){
            $syllabus_id=$row1['syllabus_id'];
            $i=0;
            foreach ($topic_description as $key => $value) {
                $sql2="SELECT topics.topic_description FROM syllabus INNER JOIN topics ON topics.syllabus_id = syllabus.syllabus_id WHERE topics.topic_description = '".mysql_real_escape_string($topic_description[$key])."' AND syllabus.syllabus_id = '".$syllabus_id."' AND topics.idsa <> 'Examination Week'";
                $result2=mysql_query($sql2);
                while ($row2=mysql_fetch_array($result2)){
                    $topic_description2=$row2['topic_description'];
                    if (!empty($topic_description2)) {
                        $i++;
                    }
                }
            }
            if ($i==$count) {
                $finalsyll[]=$syllabus_id;
            }
        }
        foreach ($finalsyll as $key1 => $value1) {
            $sql3="SELECT tq.tq_id FROM syllabus INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id WHERE syllabus.syllabus_id = '".$finalsyll[$key1]."'";
            $result3=mysql_query($sql3);
            if (!$result3) {
            }else{
                while ($row3=mysql_fetch_array($result3)){
                    
                    $tq_id=$row3['tq_id'];
                    $sql="SELECT DISTINCT employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, tq.tq_id, tqstatus.date_time, syllabus.syllabus_id FROM syllabus INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id WHERE tqstatus.status_desc = 'printed' AND tq.tq_id ='".$tq_id."'";
                    $result=mysql_query($sql);
            
                    while ($row=mysql_fetch_array($result)){
                        $fullname=utf8_encode($row['employee_fname'])." ".utf8_encode($row['employee_mname'])." ".utf8_encode($row['employee_lname'])." ".utf8_encode($row['employee_ext']);
                        $tq_id=$row['tq_id'];
                        $date_time=$row['date_time'];
                        $syllabus_id=$row['syllabus_id'];
                        echo "<tr><td>
                            ".$fullname."</td><td>".$date_time."</td><td><form action='instructor_preview.php' method='get'><input type='hidden' name='tq_id' class='form-control' value='".$tq_id."'><input type='hidden' name='tq_id1' class='form-control' value='".$tq_id1."'><input type='hidden' name='syllabus_id' class='form-control' value='".$syllabus_id."'> <button type='submit' class='btn btn-primary btn-md glyphicon glyphicon-folder-open' name='Open' ></button></form>";
                    }
                }
            }
        }

        
    }
    function shschecktopic($tq_id1,$syll){
        $this->loaddb();
        $sq=mysql_query("SELECT shs_subject.shs_subj_id FROM shs_syll INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id WHERE shs_tq.shs_tq_id ='".$tq_id1."'");
        while ($row1=mysql_fetch_array($sq)){
            $shs_subj_id=$row1['shs_subj_id'];
        }
        $sql="SELECT shs_syll.shs_syll_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, shs_tq.shs_tq_id, shs_tqstatus.shs_date_time FROM shs_syll INNER JOIN employment ON shs_syll.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id WHERE shs_syll.shs_subj_id = '".$shs_subj_id."' AND shs_tqstatus.shs_status_desc = 'printed' AND shs_tq.shs_upload_tq IS NULL AND shs_tq.shs_upload_tos IS NULL ";
        $result=mysql_query($sql);

        while ($row=mysql_fetch_array($result)){
            $fullname=utf8_encode($row['employee_fname'])." ".utf8_encode($row['employee_mname'])." ".utf8_encode($row['employee_lname'])." ".utf8_encode($row['employee_ext']);
            $tq_id=$row['shs_tq_id'];
            $date_time=$row['shs_date_time'];
            $syllabus_id=$row['shs_syll_id'];
            echo "<tr><td>
                ".$fullname."</td><td>".$date_time."</td><td><form action='shsinstructor_preview.php' method='get'><input type='hidden' name='tq_id' class='form-control' value='".$tq_id."'><input type='hidden' name='syll' class='form-control' value='".$syll."'><input type='hidden' name='tq_id1' class='form-control' value='".$tq_id1."'><input type='hidden' name='syllabus_id' class='form-control' value='".$syllabus_id."'> <button type='submit' class='btn btn-primary btn-md glyphicon glyphicon-folder-open' name='Open' ></button></form></td></tr>";
        }

        
    }
    function checktopic1($tq_id1){
        $this->loaddb();
        $finalsyll = array();
        $topic_description= array();
        $sql="SELECT DISTINCT topics.topic_description FROM tq INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN topics ON topics.syllabus_id = syllabus.syllabus_id WHERE tq.tq_id ='".$tq_id1."'";
        $result=mysql_query($sql);
        while ($row=mysql_fetch_array($result)){
            $topic_description[]=$row['topic_description'];
        }
        $count = count($topic_description);
        $sql1="SELECT syllabus.syllabus_id FROM syllabus INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id WHERE syllabusstatus.syll_status_desc = 'approved'";
        $result1=mysql_query($sql1);
        while ($row1=mysql_fetch_array($result1)){
            $syllabus_id=$row1['syllabus_id'];
            $i=0;
            foreach ($topic_description as $key => $value) {
                $sql2="SELECT topics.topic_description FROM syllabus INNER JOIN topics ON topics.syllabus_id = syllabus.syllabus_id WHERE topics.topic_description = '".$topic_description[$key]."' AND syllabus.syllabus_id = '".$syllabus_id."'";
                $result2=mysql_query($sql2);
                while ($row2=mysql_fetch_array($result2)){
                    $topic_description2=$row2['topic_description'];
                    if (!empty($topic_description2)) {
                        $i++;
                    }
                }
            }
            if ($i==$count) {
                $finalsyll[]=$syllabus_id;
            }
        }
        foreach ($finalsyll as $key1 => $value1) {
            $sql3="SELECT tq.tq_id FROM syllabus INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id WHERE syllabus.syllabus_id = '".$finalsyll[$key1]."'";
            $result3=mysql_query($sql3);
            if (!$result3) {
            }else{
                while ($row3=mysql_fetch_array($result3)){
                    $tq_id=$row3['tq_id'];
                    $sql="SELECT DISTINCT testquestions.question_desc, question_type.question_type_name, answer.answer_desc, cognitive_level.cognitive_desc, testquestions.points, testquestions.q_id, topics.topic_description FROM syllabus INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id INNER JOIN question_type ON question_type.test_id = test_number.test_id INNER JOIN answer ON answer.q_id = testquestions.q_id INNER JOIN topics ON topics.syllabus_id = syllabus.syllabus_id WHERE syllabus.syllabus_id ='".$tq_id."'";
                    $result=mysql_query($sql);
            
                    while ($row=mysql_fetch_array($result)){
                        $q_id=$row['q_id'];
                        $question_desc=$row['question_desc'];
                        $question_type_name=$row['question_type_name'];
                        $answer_desc=$row['answer_desc'];
                        $cognitive_desc=$row['cognitive_desc'];
                        $points=$row['points'];
                        $topic_description=$row['topic_description'];
                        echo "<tr><td>
                            ".$question_type_name."</td><td>".$topic_description."</td><td>".$cognitive_desc."</td><td>".$points."</td><td>".$question_desc."</td><td>".$answer_desc."</td><td><form action='instructor_preview.php' method='get'><input type='hidden' name='tq_id' class='form-control' value='".$tq_id."'><input type='hidden' name='tq_id1' class='form-control' value='".$tq_id1."'><input type='hidden' name='syllabus_id' class='form-control' value='".$syllabus_id."'> <button type='submit' class='btn btn-primary btn-md glyphicon glyphicon-folder-open' name='Open'></button></form>";
                    }
                }
            }
        }

        
    }

    function copytq($tq_idcopy, $tq_idupdate){
        $this->loaddb();
        $sql=mysql_query("SELECT tos.tos_id FROM tos WHERE tos.tq_id = '".$tq_idupdate."'");
        $result3=mysql_query($sql);
        if (!$result3) {
            $sqll=mysql_query("SELECT tos.tos_id, tos.kno_ni, tos.com_ni, tos.app_ni, tos.ana_ni, tos.eva_ni, tos.syn_ni, tos.kno_np, tos.com_np, tos.app_np, tos.ana_np, tos.eva_np, tos.syn_np FROM tos WHERE tos.tq_id = '".$tq_idcopy."'");
            while ($rows=mysql_fetch_array($sqll)) {
                $tos_id1=$rows['tos_id'];
                $kno_ni=$rows['kno_ni'];
                $com_ni=$rows['com_ni'];
                $app_ni=$rows['app_ni'];
                $ana_ni=$rows['ana_ni'];
                $eva_ni=$rows['eva_ni'];
                $syn_ni=$rows['syn_ni'];
                $kno_np=$rows['kno_np'];
                $com_np=$rows['com_np'];
                $app_np=$rows['app_np'];
                $ana_np=$rows['ana_np'];
                $eva_np=$rows['eva_np'];
                $syn_np=$rows['syn_np'];
                $ins = "INSERT INTO `tos` (`tos_id`, `kno_ni`, `com_ni`, `app_ni`, `ana_ni`, `eva_ni`, `syn_ni`, `kno_np`, `com_np`, `app_np`, `ana_np`, `eva_np`, `syn_np`, `tq_id`) VALUES ('','".$kno_ni."','".$com_ni."','".$app_ni."','".$ana_ni."','".$eva_ni."','".$syn_ni."','".$kno_np."','".$com_np."','".$app_np."','".$ana_np."','".$eva_np."','".$syn_np."','".$tq_idupdate."')";
                $in=mysql_query($ins) or die("Query Failed INSERT INTO `tos_topic`: ".mysql_error());
                $insert_id=mysql_insert_id();
                $sqll1=mysql_query("SELECT tos_topic.topic_desc, tos_topic.num_of_hours FROM tos_topic WHERE tos_topic.tos_id ='".$tos_id1."'");
                while ($rows1=mysql_fetch_array($sqll1)) {
                    $topic_desc=$rows1['topic_desc'];
                    $num_of_hour=$rows1['num_of_hours'];
                    $ins = "INSERT INTO `tos_topic` (`tostopic_id`, `topic_desc`, `num_of_hours`, tos_id) VALUES ('','".$topic_desc."','".$num_of_hour."','".$insert_id."')";
                    $in=mysql_query($ins) or die("Query Failed INSERT INTO `tos_topic`: ".mysql_error());
                }
                
            }
        }else{
            while ($row=mysql_fetch_array($sql)) {
                $tos_id=$row['tos_id'];
                $query = "DELETE FROM tos_topic WHERE tos_id='".$tos_id."'";
                $delete= mysql_query($query);
                $sqll=mysql_query("SELECT tos.tos_id, tos.kno_ni, tos.com_ni, tos.app_ni, tos.ana_ni, tos.eva_ni, tos.syn_ni, tos.kno_np, tos.com_np, tos.app_np, tos.ana_np, tos.eva_np, tos.syn_np FROM tos WHERE tos.tq_id = '".$tq_idcopy."'");
                while ($rows=mysql_fetch_array($sqll)) {
                    $tos_id1=$rows['tos_id'];
                    $kno_ni=$rows['kno_ni'];
                    $com_ni=$rows['com_ni'];
                    $app_ni=$rows['app_ni'];
                    $ana_ni=$rows['ana_ni'];
                    $eva_ni=$rows['eva_ni'];
                    $syn_ni=$rows['syn_ni'];
                    $kno_np=$rows['kno_np'];
                    $com_np=$rows['com_np'];
                    $app_np=$rows['app_np'];
                    $ana_np=$rows['ana_np'];
                    $eva_np=$rows['eva_np'];
                    $syn_np=$rows['syn_np'];
                    $upd = "UPDATE tos SET kno_ni='".$kno_ni."', com_ni='".$com_ni."',app_ni='".$app_ni."',ana_ni='".$ana_ni."',eva_ni='".$eva_ni."',syn_ni='".$syn_ni."',kno_np='".$kno_np."',com_np='".$com_np."',app_np='".$app_np."',ana_np='".$ana_np."',eva_np='".$eva_np."',syn_np='".$syn_np."' WHERE tq_id='".$tq_idupdate."'";
                    $up=mysql_query($upd) or die("Query Failed : UPDATE tos SET kno_ni".mysql_error());
                    $sqll1=mysql_query("SELECT tos_topic.topic_desc, tos_topic.num_of_hours FROM tos_topic WHERE tos_topic.tos_id ='".$tos_id1."'");
                    while ($rows1=mysql_fetch_array($sqll1)) {
                        $topic_desc=$rows1['topic_desc'];
                        $num_of_hour=$rows1['num_of_hours'];
                        $ins = "INSERT INTO `tos_topic` (`tostopic_id`, `topic_desc`, `num_of_hours`, tos_id) VALUES ('','".$topic_desc."','".$num_of_hour."','".$tos_id."')";
                        $in=mysql_query($ins) or die("Query Failed INSERT INTO `tos_topic`: ".mysql_error());
                    }
                    
                }
            }
        }
            
        
                
        $sql1=mysql_query("SELECT test_number.test_id FROM test_number WHERE test_number.tq_id ='".$tq_idupdate."'");
        while ($row1=mysql_fetch_array($sql1)) {
            $test_id=$row1['test_id'];
            if (!empty($test_id)) {
                $sql2=mysql_query("SELECT testquestions.q_id FROM testquestions WHERE testquestions.test_id ='".$test_id."'");
                while ($row2=mysql_fetch_array($sql2)) {
                    $q_id=$row2['q_id'];
                    if (!empty($q_id)) {
                        $query1 = "DELETE FROM question_status WHERE q_id='".$q_id."'";
                        $delete1= mysql_query($query1);
                        $query2 = "DELETE FROM answer_choices WHERE q_id='".$q_id."'";
                        $delete2= mysql_query($query2);
                        $query3 = "DELETE FROM remarks WHERE q_id='".$q_id."'";
                        $delete3= mysql_query($query3);
                        $query4 = "DELETE FROM answer WHERE q_id='".$q_id."'";
                        $delete4= mysql_query($query4);
                        $query5 = "DELETE FROM TestQuestions WHERE q_id='".$q_id."'";
                        $delete5= mysql_query($query5);
                    }
                }
                $query6 = "DELETE FROM question_type WHERE test_id='".$test_id."'";
                $delete6= mysql_query($query6);
                $query7 = "DELETE FROM test_number WHERE tq_id='".$tq_idupdate."'";
                $delete7= mysql_query($query7);
            }
        }
        $sql3=mysql_query("SELECT tq.main_direction, tq.num_copies, tq.main_attach, tq.exam_id FROM tq WHERE tq.tq_id ='".$tq_idcopy."'");
        while ($row3=mysql_fetch_array($sql3)) {
            $main_direction=mysql_real_escape_string($row3['main_direction']);
            $num_copies=$row3['num_copies'];
            $main_attach=$row3['main_attach'];
            $exam_id=$row3['exam_id'];
            $query1 = "UPDATE tq SET main_direction='".$main_direction."', num_copies='".$num_copies."', main_attach='".$main_attach."' WHERE tq_id='".$tq_idupdate."'";
            $result1=mysql_query($query1) or die("Query Failed : UPDATE tq SET main_direction".mysql_error());
        }
        $sql4=mysql_query("SELECT test_number.attachment, test_number.test_desc, test_number.test_number, question_type.question_type_name, test_number.test_id FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE test_number.tq_id ='".$tq_idcopy."' ORDER BY test_number.test_number ASC");
        while ($row4=mysql_fetch_array($sql4)) {
            $test_id=$row4['test_id'];
            $test_number=$row4['test_number'];
            $test_desc=mysql_real_escape_string($row4['test_desc']);
            $attachment=$row4['attachment'];
            $question_type_name=$row4['question_type_name'];
            $insert1 = "INSERT INTO `test_number` (`test_number`, `test_desc`, `attachment`, `tq_id`) VALUES ('".$test_number."','".$test_desc."','".$attachment."','".$tq_idupdate."')";
            $insertres1=mysql_query($insert1) or die("Query Failed INSERT INTO `test_number`: ".mysql_error());
            $insert_id=mysql_insert_id();
            $insert2 = "INSERT INTO `question_type` (`question_type_id`, `question_type_name`, `test_id`) VALUES ('','".$question_type_name."','".$insert_id."')";
            $insertres2=mysql_query($insert2) or die("Query Failed INSERT INTO `question_type`: ".mysql_error());
            $sql5=mysql_query("SELECT testquestions.number, testquestions.question_desc, testquestions.points, testquestions.attachment, testquestions.cognitive_level_id, testquestions.q_id, topics.topic_description FROM testquestions INNER JOIN topics ON topics.topics_id = testquestions.topics_id WHERE testquestions.test_id ='".$test_id."' ORDER BY testquestions.number ASC ");
            while ($row5=mysql_fetch_array($sql5)) {
                $q_id=$row5['q_id'];
                $number=$row5['number'];
                $question_desc=mysql_real_escape_string($row5['question_desc']);
                $points=$row5['points'];
                $attachment=$row5['attachment'];
                $cognitive_level_id=$row5['cognitive_level_id'];
                $topic_description=$row5['topic_description'];

                $sqlt=mysql_query("SELECT topics.topics_id FROM tq INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN topics ON topics.syllabus_id = syllabus.syllabus_id WHERE tq.tq_id = '".$tq_idupdate."' AND topics.topic_description = '".$topic_description."'");
                while ($rowt=mysql_fetch_array($sqlt)) {
                    $topics_id=$rowt['topics_id'];
                }

                $insert3 = "INSERT INTO `testquestions` (`number`, `question_desc`, `points`, `attachment`, `cognitive_level_id`, `topics_id`, `test_id`) VALUES ('".$number."','".$question_desc."','".$points."','".$attachment."','".$cognitive_level_id."','".$topics_id."','".$insert_id."')";
                $insertres3=mysql_query($insert3) or die("Query Failed INSERT INTO `testquestions`: ".mysql_error());
                $insert_id1=mysql_insert_id();
                $insert4 = "INSERT INTO `question_status` (`status`, `q_id`) VALUES ('checked','".$insert_id1."')";
                $insertres4=mysql_query($insert4) or die("Query Failed INSERT INTO `question_status`: ".mysql_error());
                $sql6=mysql_query("SELECT answer_choices.answer_choice_desc, answer_choices.choice_attach FROM answer_choices WHERE answer_choices.q_id = $q_id");
                while ($row6=mysql_fetch_array($sql6)) {
                    $answer_choice_desc=mysql_real_escape_string($row6['answer_choice_desc']);
                    $choice_attach=$row6['choice_attach'];
                    $insert5 = "INSERT INTO `answer_choices` (`answer_choice_desc`, `choice_attach`, `q_id`) VALUES ('".$answer_choice_desc ."','".$choice_attach."','".$insert_id1."')";
                    $insertres5=mysql_query($insert5) or die("Query Failed INSERT INTO `answer_choices`: ".mysql_error());
                }
                $sql7=mysql_query("SELECT answer.answer_desc, answer.answer_attach FROM answer WHERE answer.q_id = $q_id");
                while ($row7=mysql_fetch_array($sql7)) {
                    $answer_desc=mysql_real_escape_string($row7['answer_desc']);
                    $answer_attach=$row7['answer_attach'];
                    $insert6 = "INSERT INTO `answer` (`answer_desc`, `answer_attach`, `q_id`) VALUES ('".$answer_desc ."','".$answer_attach."','".$insert_id1."')";
                    $insertres6=mysql_query($insert6) or die("Query Failed INSERT INTO `answer`: ".mysql_error());
                }

            }
        }
            
        echo "<script type='text/javascript'> window.location.href='tq_index.php'</script>";
        
    }
    function shscopytq($tq_idcopy, $tq_idupdate,$syll){
        $this->loaddb();
        $sql=mysql_query("SELECT shs_tos.shs_tos_id FROM shs_tos WHERE shs_tos.shs_tq_id = '".$tq_idupdate."'");
        while ($row=mysql_fetch_array($sql)) {
            $tos_id=$row['shs_tos_id'];
            $query = "DELETE FROM shs_tos_topic WHERE shs_tos_id='".$tos_id."'";
            $delete= mysql_query($query);
            $sqll=mysql_query("SELECT shs_tos.shs_tos_id, shs_tos.shs_kno_ni, shs_tos.shs_com_ni, shs_tos.shs_app_ni, shs_tos.shs_ana_ni, shs_tos.shs_eva_ni, shs_tos.shs_syn_ni, shs_tos.shs_kno_np, shs_tos.shs_com_np, shs_tos.shs_app_np, shs_tos.shs_ana_np, shs_tos.shs_eva_np, shs_tos.shs_syn_np FROM shs_tos WHERE shs_tos.shs_tq_id = '".$tq_idcopy."'");
            while ($rows=mysql_fetch_array($sqll)) {
                $tos_id1=$rows['shs_tos_id'];
                $kno_ni=$rows['shs_kno_ni'];
                $com_ni=$rows['shs_com_ni'];
                $app_ni=$rows['shs_app_ni'];
                $ana_ni=$rows['shs_ana_ni'];
                $eva_ni=$rows['shs_eva_ni'];
                $syn_ni=$rows['shs_syn_ni'];
                $kno_np=$rows['shs_kno_np'];
                $com_np=$rows['shs_com_np'];
                $app_np=$rows['shs_app_np'];
                $ana_np=$rows['shs_ana_np'];
                $eva_np=$rows['shs_eva_np'];
                $syn_np=$rows['shs_syn_np'];
                $upd = "UPDATE shs_tos SET shs_kno_ni='".$kno_ni."', shs_com_ni='".$com_ni."',shs_app_ni='".$app_ni."',shs_ana_ni='".$ana_ni."',shs_eva_ni='".$eva_ni."',shs_syn_ni='".$syn_ni."',shs_kno_np='".$kno_np."',shs_com_np='".$com_np."',shs_app_np='".$app_np."',shs_ana_np='".$ana_np."',shs_eva_np='".$eva_np."',shs_syn_np='".$syn_np."' WHERE shs_tq_id='".$tq_idupdate."'";
                $up=mysql_query($upd) or die("Query Failed : UPDATE tos SET kno_ni".mysql_error());
                $sqll1=mysql_query("SELECT shs_tos_topic.shs_topic_desc, shs_tos_topic.shs_num_of_hours FROM shs_tos_topic WHERE shs_tos_topic.shs_tos_id ='".$tos_id1."'");
                while ($rows1=mysql_fetch_array($sqll1)) {
                    $topic_desc=$rows1['shs_topic_desc'];
                    $num_of_hour=$rows1['shs_num_of_hours'];
                    $ins = "INSERT INTO `shs_tos_topic` (`shs_tostopic_id`, `shs_topic_desc`, `shs_num_of_hours`, shs_tos_id) VALUES ('','".$topic_desc."','".$num_of_hour."','".$tos_id."')";
                    $in=mysql_query($ins) or die("Query Failed INSERT INTO `tos_topic`: ".mysql_error());
                }
                
            }
        }
        
                
        $sql1=mysql_query("SELECT shs_test_number.shs_test_id FROM shs_test_number WHERE shs_test_number.shs_tq_id ='".$tq_idupdate."'");
        while ($row1=mysql_fetch_array($sql1)) {
            $test_id=$row1['shs_test_id'];
            if (!empty($test_id)) {
                $sql2=mysql_query("SELECT shs_testquestions.shs_q_id FROM shs_testquestions WHERE shs_testquestions.shs_test_id ='".$test_id."'");
                while ($row2=mysql_fetch_array($sql2)) {
                    $q_id=$row2['shs_q_id'];
                    if (!empty($q_id)) {
                        $query1 = "DELETE FROM shs_question_status WHERE shs_q_id='".$q_id."'";
                        $delete1= mysql_query($query1);
                        $query2 = "DELETE FROM shs_answer_choices WHERE shs_q_id='".$q_id."'";
                        $delete2= mysql_query($query2);
                        $query3 = "DELETE FROM shs_remarks WHERE shs_q_id='".$q_id."'";
                        $delete3= mysql_query($query3);
                        $query4 = "DELETE FROM shs_answer WHERE shs_q_id='".$q_id."'";
                        $delete4= mysql_query($query4);
                        $query5 = "DELETE FROM shs_TestQuestions WHERE shs_q_id='".$q_id."'";
                        $delete5= mysql_query($query5);
                    }
                }
                $query6 = "DELETE FROM shs_question_type WHERE shs_test_id='".$test_id."'";
                $delete6= mysql_query($query6);
                $query7 = "DELETE FROM shs_test_number WHERE shs_tq_id='".$tq_idupdate."'";
                $delete7= mysql_query($query7);
            }
        }
        $sql3=mysql_query("SELECT shs_tq.shs_main_direction, shs_tq.shs_num_copies, shs_tq.shs_main_attach, shs_tq.exam_id FROM shs_tq WHERE shs_tq.shs_tq_id ='".$tq_idcopy."'");
        while ($row3=mysql_fetch_array($sql3)) {
            $main_direction=mysql_real_escape_string($row3['shs_main_direction']);
            $num_copies=$row3['shs_num_copies'];
            $main_attach=$row3['shs_main_attach'];
            $exam_id=$row3['exam_id'];
            $query1 = "UPDATE shs_tq SET shs_main_direction='".$main_direction."', shs_num_copies='".$num_copies."', shs_main_attach='".$main_attach."' WHERE shs_tq_id='".$tq_idupdate."'";
            $result1=mysql_query($query1) or die("Query Failed : UPDATE tq SET main_direction".mysql_error());
        }
        $sql4=mysql_query("SELECT shs_test_number.shs_attachment, shs_test_number.shs_test_desc, shs_test_number.shs_test_number, shs_question_type.shs_question_type_name, shs_test_number.shs_test_id FROM shs_test_number INNER JOIN shs_question_type ON shs_question_type.shs_test_id = shs_test_number.shs_test_id WHERE shs_test_number.shs_tq_id ='".$tq_idcopy."' ORDER BY shs_test_number.shs_test_number ASC");
        while ($row4=mysql_fetch_array($sql4)) {
            $test_id=$row4['shs_test_id'];
            $test_number=$row4['shs_test_number'];
            $test_desc=mysql_real_escape_string($row4['shs_test_desc']);
            $attachment=$row4['shs_attachment'];
            $question_type_name=$row4['shs_question_type_name'];
            $insert1 = "INSERT INTO `shs_test_number` (`shs_test_number`, `shs_test_desc`, `shs_attachment`, `shs_tq_id`) VALUES ('".$test_number."','".$test_desc."','".$attachment."','".$tq_idupdate."')";
            $insertres1=mysql_query($insert1) or die("Query Failed INSERT INTO `test_number`: ".mysql_error());
            $insert_id=mysql_insert_id();
            $insert2 = "INSERT INTO `shs_question_type` (`shs_question_type_id`, `shs_question_type_name`, `shs_test_id`) VALUES ('','".$question_type_name."','".$insert_id."')";
            $insertres2=mysql_query($insert2) or die("Query Failed INSERT INTO `question_type`: ".mysql_error());
            $sql5=mysql_query("SELECT shs_testquestions.shs_number, shs_testquestions.shs_question_desc, shs_testquestions.shs_points, shs_testquestions.shs_attachment, shs_testquestions.cognitive_level_id, shs_testquestions.shs_q_id, shs_topics.shs_topics_id FROM shs_testquestions INNER JOIN shs_topics ON shs_topics.shs_topics_id = shs_testquestions.shs_topics_id WHERE shs_testquestions.shs_test_id ='".$test_id."' ORDER BY shs_testquestions.shs_number ASC ");
            while ($row5=mysql_fetch_array($sql5)) {
                $q_id=$row5['shs_q_id'];
                $number=$row5['shs_number'];
                $question_desc=mysql_real_escape_string($row5['shs_question_desc']);
                $points=$row5['shs_points'];
                $attachment=$row5['shs_attachment'];
                $cognitive_level_id=$row5['cognitive_level_id'];
                $topics_id=$row5['shs_topics_id'];

                $insert3 = "INSERT INTO `shs_testquestions` (`shs_number`, `shs_question_desc`, `shs_points`, `shs_attachment`, `cognitive_level_id`, `shs_topics_id`, `shs_test_id`) VALUES ('".$number."','".$question_desc."','".$points."','".$attachment."','".$cognitive_level_id."','".$topics_id."','".$insert_id."')";
                $insertres3=mysql_query($insert3) or die("Query Failed INSERT INTO `testquestions`: ".mysql_error());
                $insert_id1=mysql_insert_id();
                $insert4 = "INSERT INTO `shs_question_status` (`shs_status`, `shs_q_id`) VALUES ('checked','".$insert_id1."')";
                $insertres4=mysql_query($insert4) or die("Query Failed INSERT INTO `question_status`: ".mysql_error());
                $sql6=mysql_query("SELECT shs_answer_choices.shs_answer_choice_desc, shs_answer_choices.shs_choice_attach FROM shs_answer_choices WHERE shs_answer_choices.shs_q_id = $q_id");
                while ($row6=mysql_fetch_array($sql6)) {
                    $answer_choice_desc=mysql_real_escape_string($row6['shs_answer_choice_desc']);
                    $choice_attach=$row6['shs_choice_attach'];
                    $insert5 = "INSERT INTO `shs_answer_choices` (`shs_answer_choice_desc`, `shs_choice_attach`, `shs_q_id`) VALUES ('".$answer_choice_desc ."','".$choice_attach."','".$insert_id1."')";
                    $insertres5=mysql_query($insert5) or die("Query Failed INSERT INTO `answer_choices`: ".mysql_error());
                }
                $sql7=mysql_query("SELECT shs_answer.shs_answer_desc, shs_answer.shs_answer_attach FROM shs_answer WHERE shs_answer.shs_q_id = $q_id");
                while ($row7=mysql_fetch_array($sql7)) {
                    $answer_desc=mysql_real_escape_string($row7['shs_answer_desc']);
                    $answer_attach=$row7['shs_answer_attach'];
                    $insert6 = "INSERT INTO `shs_answer` (`shs_answer_desc`, `shs_answer_attach`, `shs_q_id`) VALUES ('".$answer_desc ."','".$answer_attach."','".$insert_id1."')";
                    $insertres6=mysql_query($insert6) or die("Query Failed INSERT INTO `answer`: ".mysql_error());
                }

            }
        }
        echo "<script type='text/javascript'> window.location.href='shscreatetq.php?shstq_id=".$tq_idupdate."&shssyllabus_id=".$syll."'</script>";
        
    }
    function getaswer($qid){
        $this->loaddb();
        $sql=mysql_query("SELECT answer.answer_desc FROM answer WHERE answer.q_id ='".$qid."'");
        $num=mysql_num_rows($sql);
        while ($row=mysql_fetch_array($sql)) {
            $answer_desc=$row['answer_desc'];
            echo $answer_desc;
            $num--;
            if ($num>0) {
                echo " ,<br/>";
            }
        }
    }
    function shsgetaswer($qid){
        $this->loaddb();
        $sql=mysql_query("SELECT shs_answer.shs_answer_desc FROM shs_answer WHERE shs_answer.shs_q_id ='".$qid."'");
        $num=mysql_num_rows($sql);
        while ($row=mysql_fetch_array($sql)) {
            $answer_desc=$row['shs_answer_desc'];
            echo $answer_desc;
            $num--;
            if ($num>0) {
                echo " ,<br/>";
            }
        }
    }
    function qbank1($subj_id){
        $this->loaddb();
        $i=1;
        $sql=mysql_query("SELECT DISTINCT testquestions.q_id, testquestions.question_desc, testquestions.attachment, topics.topic_description FROM `subject` INNER JOIN sched_subj ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN topics ON topics.syllabus_id = syllabus.syllabus_id INNER JOIN testquestions ON testquestions.topics_id = topics.topics_id INNER JOIN test_number ON testquestions.test_id = test_number.test_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id AND test_number.tq_id = tq.tq_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id WHERE tqstatus.status_desc = 'printed' AND `subject`.subj_id ='".$subj_id."'");

            while($row=mysql_fetch_array($sql)){
                $question_desc=$row['question_desc'];
                $topic_description=$row['topic_description'];
                $q_id=$row['q_id'];
                echo "<tr><td>".$topic_description."</td><td>".$question_desc."</td><td>"; 
                $this->getaswer($q_id);
                echo"</td><td><div class='center'><button data-toggle='modal' data-target='#squarespaceModal".$i."' class='btn btn-primary glyphicon glyphicon-folder-open center-block'></button></div>";
                echo 
                '<div class="modal fade bd-example-modal-md" id="squarespaceModal'.$i.'" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <h3 class="modal-title" id="lineModalLabel">Stored Question</h3>
                            </div>
                            <div class="modal-body">
                                <table width="800px">';
                                    $this->previewquestion1($q_id);
                                echo'</table>
                            </div>
                            <div class="modal-footer">
                                <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
                                    </div>
                                    <div class="btn-group btn-delete hidden" role="group">
                                        <button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <input type="hidden" id="qid'.$i.'" class="form-control" value="'.$q_id.'">
                                        <button type="button" id="'.$i.'" class="btn btn-default btn-hover-green copyq
                                        " data-dismiss="modal" role="button">Copy</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                $i++; 
            }
    }
    function shsqbank1($subj_id){
        $this->loaddb();
        $i=1;
        $sql=mysql_query("SELECT shs_topics.shs_topic_description, shs_testquestions.shs_q_id, shs_testquestions.shs_question_desc FROM shs_subject INNER JOIN shs_topics ON shs_topics.shs_subj_id = shs_subject.shs_subj_id INNER JOIN shs_syll ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id AND shs_testquestions.shs_topics_id = shs_topics.shs_topics_id WHERE shs_tqstatus.shs_status_desc = 'printed' AND shs_subject.shs_subj_id = '".$subj_id."'");

            while($row=mysql_fetch_array($sql)){
                $question_desc=$row['shs_question_desc'];
                $topic_description=$row['shs_topic_description'];
                $q_id=$row['shs_q_id'];
                echo "<tr><td>".$topic_description."</td><td>".$question_desc."</td><td>"; 
                $this->shsgetaswer($q_id);
                echo"</td><td><div class='center'><button data-toggle='modal' data-target='#squarespaceModal".$i."' class='btn btn-primary glyphicon glyphicon-folder-open center-block'></button></div>";
                echo 
                '<div class="modal fade bd-example-modal-md" id="squarespaceModal'.$i.'" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <h3 class="modal-title" id="lineModalLabel">Stored Question</h3>
                            </div>
                            <div class="modal-body">
                                <table width="800px">';
                                    $this->shspreviewquestion1($q_id);
                                echo'</table>
                            </div>
                            <div class="modal-footer">
                                <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
                                    </div>
                                    <div class="btn-group btn-delete hidden" role="group">
                                        <button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <input type="hidden" id="qid'.$i.'" class="form-control" value="'.$q_id.'">
                                        <button type="button" id="'.$i.'" class="btn btn-default btn-hover-green shscopyq
                                        " data-dismiss="modal" role="button">Copy</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                $i++; 
            }
    }
    function qbank($tq_id,$subj_id){
        $this->loaddb();
        $sqlck=mysql_query("SELECT tos_topic.topic_desc FROM tq INNER JOIN tos ON tos.tq_id = tq.tq_id INNER JOIN tos_topic ON tos_topic.tos_id = tos.tos_id WHERE tq.tq_id ='".$tq_id."'");
        $i=1;
        while ($row1=mysql_fetch_array($sqlck)) {
            $this->loaddb();
            $topic_desc=$row1['topic_desc'];
            $sql=mysql_query("SELECT testquestions.q_id, testquestions.question_desc, tqstatus.date_time, cognitive_level.cognitive_desc, question_type.question_type_name, topics.topic_description, testquestions.points, answer.answer_desc FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id INNER JOIN question_type ON question_type.test_id = test_number.test_id INNER JOIN topics ON testquestions.topics_id = topics.topics_id INNER JOIN syllabus ON tq.syllabus_id = syllabus.syllabus_id AND topics.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN answer ON answer.q_id = testquestions.q_id WHERE tqstatus.status_desc = 'printed' AND `subject`.subj_id ='".$subj_id."' AND topics.topic_description ='".$topic_desc."' AND tq.tq_id <>'".$tq_id."'");

            if($sql === FALSE) { 
                echo mysql_error(); // TODO: better error handling
            }
            while($row=mysql_fetch_array($sql)){
                $question_type_name=$row['question_type_name'];
                $topic_description=$row['topic_description'];
                $cognitive_desc=$row['cognitive_desc'];
                $question_desc=$row['question_desc'];
                $answer_desc=$row['answer_desc']; 
                $points=$row['points']; 
                $date_time=$row['date_time']; 
                $q_id=$row['q_id'];
                echo "<tr><td>
                    ".$question_type_name."</td><td>".$topic_description."</td><td>".$cognitive_desc."</td><td>".$question_desc."</td><td>".$answer_desc."</td><td>".$points."</td><td><div class='center'><button data-toggle='modal' data-target='#squarespaceModal".$i."' class='btn btn-primary glyphicon glyphicon-folder-open center-block'></button></div>";
                echo 
                '<div class="modal fade bd-example-modal-lg" id="squarespaceModal'.$i.'" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <h3 class="modal-title" id="lineModalLabel">Stored Question</h3>
                            </div>
                            <div class="modal-body">
                                <table width="800px">';
                                    $this->previewquestion($q_id);
                        
                                echo'</table>
                            </div>
                            <div class="modal-footer">
                                <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
                                    </div>
                                    <div class="btn-group btn-delete hidden" role="group">
                                        <button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
                                    </div>
                                    <div class="btn-group" role="group">
                                        <input type="hidden" id="qid'.$i.'" class="form-control" value="'.$q_id.'">
                                        <button type="button" id="'.$i.'" class="btn btn-default btn-hover-green copyq" data-dismiss="modal" role="button">Copy</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                $i++;
            }
        }
            
            

         
        
    }
    function shsqbank($tq_id,$subj_id,$syll){
        $this->loaddb();
        $i=0;
        $sql=mysql_query("SELECT shs_topics.shs_topic_description, shs_question_type.shs_question_type_name, shs_testquestions.shs_q_id, shs_testquestions.shs_question_desc, shs_testquestions.shs_points,shs_tqstatus.shs_date_time, cognitive_level.cognitive_desc, shs_answer.shs_answer_desc FROM shs_syll INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN shs_topics ON shs_topics.shs_subj_id = shs_subject.shs_subj_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_question_type ON shs_question_type.shs_test_id = shs_test_number.shs_test_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id AND shs_testquestions.shs_topics_id = shs_topics.shs_topics_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN cognitive_level ON shs_testquestions.cognitive_level_id = cognitive_level.cognitive_level_id INNER JOIN shs_answer ON shs_answer.shs_q_id = shs_testquestions.shs_q_id WHERE shs_tqstatus.shs_status_desc = 'printed' AND shs_subject.shs_subj_id ='".$subj_id."'");

        if($sql === FALSE) { 
            echo mysql_error(); // TODO: better error handling
        }
        while($row=mysql_fetch_array($sql)){
            $question_type_name=$row['shs_question_type_name'];
            $topic_description=$row['shs_topic_description'];
            $cognitive_desc=$row['cognitive_desc'];
            $question_desc=$row['shs_question_desc'];
            $answer_desc=$row['shs_answer_desc']; 
            $points=$row['shs_points']; 
            $date_time=$row['shs_date_time']; 
            $q_id=$row['shs_q_id'];
            echo "<tr><td>
                ".$question_type_name."</td><td>".$topic_description."</td><td>".$cognitive_desc."</td><td>".$question_desc."</td><td>".$answer_desc."</td><td>".$points."</td><td><div class='center'><button data-toggle='modal' data-target='#squarespaceModal".$i."' class='btn btn-primary glyphicon glyphicon-folder-open center-block'></button></div>";
            echo 
            '<div class="modal fade bd-example-modal-lg" id="squarespaceModal'.$i.'" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <h3 class="modal-title" id="lineModalLabel">Stored Question</h3>
                        </div>
                        <div class="modal-body">
                            <table width="800px">';
                                $this->shspreviewquestion($q_id);
                    
                            echo'</table>
                        </div>
                        <div class="modal-footer">
                            <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
                                </div>
                                <div class="btn-group btn-delete hidden" role="group">
                                    <button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
                                </div>
                                <div class="btn-group" role="group">
                                    <input type="hidden" id="qid'.$i.'" class="form-control" value="'.$q_id.'">
                                    <input type="hidden" id="syll" class="form-control" value="'.$syll.'">
                                    <button type="button" id="'.$i.'" class="btn btn-default btn-hover-green copyq" data-dismiss="modal" role="button">Copy</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            $i++;
        }
            
            

         
        
    }
    function gettopicid($tpid,$tq_id){
        $this->loaddb();
        $res2=mysql_query("SELECT topics.topic_description FROM topics WHERE topics.topics_id = '".$tpid."'");
        while ($row=mysql_fetch_array($res2)) {
            $topic_description=$row['topic_description'];
            
        }
        
        $result = mysql_query("SELECT topics.topics_id FROM topics INNER JOIN syllabus ON topics.syllabus_id = syllabus.syllabus_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id WHERE topics.topic_description = '".$topic_description."' AND tq.tq_id = '".$tq_id."' ");
            
        while ($row2=mysql_fetch_array($result)) {
            $topics_id=$row2['topics_id'];
        }
        
        return $topics_id;
        
    }

    function previewquestion1($q_id){
        $this->loaddb();
        $sql="SELECT testquestions.q_id, testquestions.number, testquestions.question_desc, testquestions.points, testquestions.attachment, cognitive_level.cognitive_desc, topics.topic_description FROM testquestions INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id INNER JOIN topics ON testquestions.topics_id = topics.topics_id WHERE testquestions.q_id ='".$q_id."'"; 
        $result = mysql_query($sql);
        while($row=mysql_fetch_array($result)){
            $q_id=$row['q_id'];
            $number=$row['number'];
            $question_desc=$row['question_desc'];
            $points=$row['points'];
            $attachment=$row['attachment'];
            $cognitive_desc=$row['cognitive_desc'];
            $topic_description=$row['topic_description'];

            echo "<tr><td>
                
                <div class='col-xs-12'>
                    <b>Question: </b> . ".$question_desc."
                </div>
                </td></tr>";
                if (!empty($attachment)) {
                    echo "<tr>
                    <td><img src='uploads/".$attachment."' style='width:90%;height:200px;'</td>
                </tr>";
                }
            echo"
                
                <tr><td>";
                    $this->loadanswer($q_id);
                echo"
                </td></tr>";
                echo "<tr><td>";
                $this->loadchoices($q_id);
                echo "</td></tr>";
                echo"
                <tr><td>";
                
        }
    }
    function shspreviewquestion1($q_id){
        $this->loaddb();
        $sql="SELECT shs_testquestions.shs_q_id, shs_testquestions.shs_number, shs_testquestions.shs_question_desc, shs_testquestions.shs_points, shs_testquestions.shs_attachment, cognitive_level.cognitive_desc, shs_topics.shs_topic_description FROM shs_testquestions INNER JOIN cognitive_level ON shs_testquestions.cognitive_level_id = cognitive_level.cognitive_level_id INNER JOIN shs_topics ON shs_testquestions.shs_topics_id = shs_topics.shs_topics_id WHERE shs_testquestions.shs_q_id ='".$q_id."'"; 
        $result = mysql_query($sql);
        while($row=mysql_fetch_array($result)){
            $q_id=$row['shs_q_id'];
            $number=$row['shs_number'];
            $question_desc=$row['shs_question_desc'];
            $points=$row['shs_points'];
            $attachment=$row['shs_attachment'];
            $cognitive_desc=$row['cognitive_desc'];
            $topic_description=$row['shs_topic_description'];

            echo "<tr><td>
                
                <div class='col-xs-12'>
                    <b>Question: </b> . ".$question_desc."
                </div>
                </td></tr>";
                if (!empty($attachment)) {
                    echo "<tr>
                    <td><img src='uploads/".$attachment."' style='width:90%;height:200px;'</td>
                </tr>";
                }
            echo"
                
                <tr><td>";
                    $this->shsloadanswer($q_id);
                echo"
                </td></tr>";
                echo "<tr><td>";
                $this->shsloadchoices($q_id);
                echo "</td></tr>";
                echo"
                <tr><td>";
                
        }
    }

    function previewquestion($q_id){
        $this->loaddb();
        $sql="SELECT testquestions.q_id, testquestions.number, testquestions.question_desc, testquestions.points, testquestions.attachment, cognitive_level.cognitive_desc, topics.topic_description FROM testquestions INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id INNER JOIN topics ON testquestions.topics_id = topics.topics_id WHERE testquestions.q_id ='".$q_id."'"; 
        $result = mysql_query($sql);
        while($row=mysql_fetch_array($result)){
            $q_id=$row['q_id'];
            $number=$row['number'];
            $question_desc=$row['question_desc'];
            $points=$row['points'];
            $attachment=$row['attachment'];
            $cognitive_desc=$row['cognitive_desc'];
            $topic_description=$row['topic_description'];

            echo "<tr><td>
                
                <div class='col-xs-12'>
                    <b>Question: </b> . ".$question_desc."
                </div>
                </td></tr>";
                if (!empty($attachment)) {
                    echo "<tr>
                    <td><img src='uploads/".$attachment."' style='width:90%;height:200px;'</td>
                </tr>";
                }
            echo"
                <tr><td>
                <div class='col-xs-4'>
                    <b>Points: </b>".$points."
                </div>
                <div class='col-xs-4'`>
                    <b>Topic: </b>".$topic_description."
                </div>
                <div class='col-xs-4'`>
                    <b>Cognitive Level: </b>".$cognitive_desc."
                </div>
                </td></tr>
                <tr><td>";
                    $this->loadanswer($q_id);
                echo"
                </td></tr>";
                echo "<tr><td>";
                $this->loadchoices($q_id);
                echo "</td></tr>";
                echo"
                <tr><td>";
                
        }
    }
    function shspreviewquestion($q_id){
        $this->loaddb();
        $sql="SELECT shs_testquestions.shs_q_id, shs_testquestions.shs_number, shs_testquestions.shs_question_desc, shs_testquestions.shs_points, shs_testquestions.shs_attachment, cognitive_level.cognitive_desc, shs_topics.shs_topic_description FROM shs_testquestions INNER JOIN cognitive_level ON shs_testquestions.cognitive_level_id = cognitive_level.cognitive_level_id INNER JOIN shs_topics ON shs_testquestions.shs_topics_id = shs_topics.shs_topics_id WHERE shs_testquestions.shs_q_id ='".$q_id."'"; 
        $result = mysql_query($sql);
        while($row=mysql_fetch_array($result)){
            $q_id=$row['shs_q_id'];
            $number=$row['shs_number'];
            $question_desc=$row['shs_question_desc'];
            $points=$row['shs_points'];
            $attachment=$row['shs_attachment'];
            $cognitive_desc=$row['cognitive_desc'];
            $topic_description=$row['shs_topic_description'];

            echo "<tr><td>
                
                <div class='col-xs-12'>
                    <b>Question: </b> . ".$question_desc."
                </div>
                </td></tr>";
                if (!empty($attachment)) {
                    echo "<tr>
                    <td><img src='uploads/".$attachment."' style='width:90%;height:200px;'</td>
                </tr>";
                }
            echo"
                <tr><td>
                <div class='col-xs-4'>
                    <b>Points: </b>".$points."
                </div>
                <div class='col-xs-4'`>
                    <b>Topic: </b>".$topic_description."
                </div>
                <div class='col-xs-4'`>
                    <b>Cognitive Level: </b>".$cognitive_desc."
                </div>
                </td></tr>
                <tr><td>";
                    $this->shsloadanswer($q_id);
                echo"
                </td></tr>";
                echo "<tr><td>";
                $this->shsloadchoices($q_id);
                echo "</td></tr>";
                echo"
                <tr><td>";
                
        }
    }

    function phque($dept,$login_id){
        $this->loaddb();
        $sql = "SELECT employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, `subject`.subj_name, tq.tq_id, tqstatus.date_time FROM sched_subj INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN department ON employment.department_id = department.department_id WHERE tqstatus.status_desc = 'queue for ph' AND tqstatus.ph = '".$login_id."' ORDER BY tqstatus.date_time ASC";
        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{
            $i=0;
            while($row=mysql_fetch_array($result)){

                $tq_id=$row['tq_id'];
                $fname=utf8_encode($row['employee_fname']);
                $mname=utf8_encode($row['employee_mname']);
                $lname=utf8_encode($row['employee_lname']);
                $employee_ext=$row['employee_ext'];
                $subject=$row['subj_name'];
                $date=$row['date_time'];
                $name=$fname." ".$mname." ".$lname." ".$employee_ext;
                
                echo '<tr>
                  <td>
                    <form action="tqcheck.php" method="get" >
                    <input type="hidden" name="tq_id" class="form-control" value="'.$tq_id.'">
                    
                    <a >'.$fname.'</a>
                    <a >'.$mname.'</a>
                    <a >'.$lname.'</a></td>
                    <td><a >'.$subject.'</a></td>
                    <td><a >'.$date.'</a></td>';
                    if ($i==0) {
                        echo '<td><button type="submit" class="btn btn-default" name="Open"><a><i class="glyphicon glyphicon-folder-open createsyllabus"><span class="createsyllabustext"></span></i></a></button></form></td> ';      
                    }
                    $i++;
                echo'</tr>';
                
            }                                       
        }
        
    }
    function shsphque($dept,$login_id){
        $this->loaddb();
        $sql = "SELECT employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, shs_subject.shs_subj_name, shs_tq.shs_tq_id, shs_tqstatus.shs_date_time FROM employment INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN shs_syll ON shs_syll.employment_id = employment.employment_id INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id INNER JOIN department ON employment.department_id = department.department_id WHERE shs_tqstatus.shs_status_desc = 'queue for ph' AND shs_tqstatus.shs_ph = '".$login_id."' ORDER BY shs_tqstatus.shs_date_time ASC";
        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{
            $i=0;
            while($row=mysql_fetch_array($result)){

                $tq_id=$row['shs_tq_id'];
                $fname=utf8_encode($row['employee_fname']);
                $mname=utf8_encode($row['employee_mname']);
                $lname=utf8_encode($row['employee_lname']);
                $employee_ext=$row['employee_ext'];
                $subject=$row['shs_subj_name'];
                $date=$row['shs_date_time'];
                $name=$fname." ".$mname." ".$lname." ".$employee_ext;
                
                echo '<tr>
                  <td>
                    <form action="shstqcheck.php" method="get" >
                    <input type="hidden" name="tq_id" class="form-control" value="'.$tq_id.'">
                    
                    <a >'.$fname.'</a>
                    <a >'.$mname.'</a>
                    <a >'.$lname.'</a></td>
                    <td><a >'.$subject.'</a></td>
                    <td><a >'.$date.'</a></td>';
                    if ($i==0) {
                        echo '<td><button type="submit" class="btn btn-default" name="Open"><a><i class="glyphicon glyphicon-folder-open createsyllabus"><span class="createsyllabustext"></span></i></a></button></form></td> ';      
                    }
                    $i++;
                echo'</tr>';
                
            }                                       
        }
        
    }
    function deanque($dept,$pos){
        $this->loaddb();
        $whre="";
        if ($pos=="Academic Head") {
            $whre="queue for daa";
             $sql = "SELECT employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, `subject`.subj_name, tq.tq_id, tqstatus.date_time FROM sched_subj INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN department ON employment.department_id = department.department_id WHERE tqstatus.status_desc = '".$whre."' ORDER BY tqstatus.date_time ASC";
        }else if ($pos=="Dean") {
            $whre="queue for dean";
            if ($dept === "ITE") {
            $sql = "SELECT employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, `subject`.subj_name, tq.tq_id, tqstatus.date_time FROM sched_subj INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN department ON employment.department_id = department.department_id WHERE tqstatus.status_desc = '".$whre."' AND (sched_subj.department = 'CS' OR sched_subj.department = 'ITE') ORDER BY tqstatus.date_time ASC";
            }else if ($dept === "SHS"||$dept === "GEN"){
                $sql = "SELECT employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, `subject`.subj_name, tq.tq_id, tqstatus.date_time FROM sched_subj INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN department ON employment.department_id = department.department_id WHERE tqstatus.status_desc = '".$whre."' AND (sched_subj.department = 'GEN' OR sched_subj.department = 'SHS') ORDER BY tqstatus.date_time ASC";
            }else{
                $sql = "SELECT employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, `subject`.subj_name, tq.tq_id, tqstatus.date_time FROM sched_subj INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id INNER JOIN syllabus ON syllabus.ss_id = sched_subj.ss_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id INNER JOIN department ON employment.department_id = department.department_id WHERE tqstatus.status_desc = '".$whre."' AND sched_subj.department = '".$dept."' ORDER BY tqstatus.date_time ASC";
            }
        }
        
        
        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{
            $i=0;
            while($row=mysql_fetch_array($result)){
                $tq_id=$row['tq_id'];
                $fname=utf8_encode($row['employee_fname']);
                $mname=utf8_encode($row['employee_mname']);
                $lname=utf8_encode($row['employee_lname']);
                $employee_ext=$row['employee_ext'];
                $subject=$row['subj_name'];
                $date=$row['date_time'];
                $name=$fname." ".$mname." ".$lname." ".$employee_ext;
                
                echo '<tr>
                  <td>
                    <form action="deancheck.php" method="get" >
                    <input type="hidden" name="tq_id" class="form-control" value="'.$tq_id.'">
                    
                    <a >'.$fname.'</a>
                    <a >'.$mname.'</a>
                    <a >'.$lname.'</a></td>
                    <td><a >'.$subject.'</a></td>
                    <td><a >'.$date.'</a></td>';
                    if ($i==0) {
                        echo '<td><button type="submit" class="btn btn-default" name="Open"><a><i class="glyphicon glyphicon-folder-open createsyllabus"></i></a></button></td>';
                    }
                echo "</form></tr>";
                $i++;
            }                                       
        }
        
    }
    
    function shsdeanque($dept,$pos){
        $this->loaddb();
        $whre="";
        if ($pos=="Academic Head") {
            $whre="queue for daa";
        }else if ($pos=="Dean") {
            $whre="queue for dean";
        }
        $sql = "SELECT employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, shs_subject.shs_subj_name, shs_tq.shs_tq_id, shs_tqstatus.shs_date_time FROM shs_syll INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN employment ON shs_syll.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN department ON employment.department_id = department.department_id INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id WHERE shs_tqstatus.shs_status_desc = '".$whre."' ORDER BY shs_tqstatus.shs_date_time ASC";
        
        
        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{
            $i=0;
            while($row=mysql_fetch_array($result)){
                $tq_id=$row['shs_tq_id'];
                $fname=utf8_encode($row['employee_fname']);
                $mname=utf8_encode($row['employee_mname']);
                $lname=utf8_encode($row['employee_lname']);
                $employee_ext=$row['employee_ext'];
                $subject=$row['shs_subj_name'];
                $date=$row['shs_date_time'];
                $name=$fname." ".$mname." ".$lname." ".$employee_ext;
                
                echo '<tr>
                  <td>
                    <form action="shsdeancheck.php" method="get" >
                    <input type="hidden" name="tq_id" class="form-control" value="'.$tq_id.'">
                    
                    <a >'.$fname.'</a>
                    <a >'.$mname.'</a>
                    <a >'.$lname.'</a></td>
                    <td><a >'.$subject.'</a></td>
                    <td><a >'.$date.'</a></td>';
                    if ($i==0) {
                        echo '<td><button type="submit" class="btn btn-default" name="Open"><a><i class="glyphicon glyphicon-folder-open createsyllabus"></i></a></button></td>';
                    }
                echo "</form></tr>";
                $i++;
            }                                       
        }
        
    }

    function deanque1($dept){
        $this->loaddb();
        if ($dept == "ITE") {
            $sql = "SELECT DISTINCT employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, syllabusstatus.syll_status_desc, syllabusstatus.syll_date_time, syllabus.syllabus_id, `subject`.subj_name, sched_subj.department FROM syllabus INNER JOIN topics ON topics.syllabus_id = syllabus.syllabus_id INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id WHERE syllabusstatus.syll_status_desc = 'queue for dean' AND (sched_subj.department = 'CS' OR sched_subj.department = 'ITE') ORDER BY syllabusstatus.syll_date_time ASC ";
        }else if ($dept == "SHS" || $dept == "SHS") {
            $sql = "SELECT DISTINCT employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, syllabusstatus.syll_status_desc, syllabusstatus.syll_date_time, syllabus.syllabus_id, `subject`.subj_name, sched_subj.department FROM syllabus INNER JOIN topics ON topics.syllabus_id = syllabus.syllabus_id INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id WHERE syllabusstatus.syll_status_desc = 'queue for dean' AND (sched_subj.department = 'GEN' OR sched_subj.department = 'SHS') ORDER BY syllabusstatus.syll_date_time ASC";
        }else{
            $sql = "SELECT DISTINCT employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, syllabusstatus.syll_status_desc, syllabusstatus.syll_date_time, syllabus.syllabus_id, `subject`.subj_name, sched_subj.department FROM syllabus INNER JOIN topics ON topics.syllabus_id = syllabus.syllabus_id INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id WHERE syllabusstatus.syll_status_desc = 'queue for dean' AND sched_subj.department = '".$dept."' ORDER BY syllabusstatus.syll_date_time ASC";
        }
        
        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{
            $i=0;
            while($row=mysql_fetch_array($result)){
                $syllabus_id=$row['syllabus_id'];
                $fname=utf8_encode($row['employee_fname']);
                $mname=utf8_encode($row['employee_mname']);
                $lname=utf8_encode($row['employee_lname']);
                $employee_ext=$row['employee_ext'];
                $subject=$row['subj_name'];
                $date=$row['syll_date_time'];
                $name=$fname." ".$mname." ".$lname." ".$employee_ext;
                
                echo '<tr>
                  <td>
                    <form action="deancheck1.php" method="get" >
                    <input type="hidden" name="syllabus_id" class="form-control" value="'.$syllabus_id.'">
                    
                    <a >'.$fname.'</a>
                    <a >'.$mname.'</a>
                    <a >'.$lname.'</a></td>
                    <td><a >'.$subject.'</a></td>
                    <td><a >'.$date.'</a></td>';
                    if ($i==0) {
                        echo '<td><button type="submit" class="btn btn-default" name="Open"><a><i class="glyphicon glyphicon-folder-open createsyllabus"></i></a></button></td> ';
                    }
                echo'</form></tr>';
                $i++;
            }                                       
        }
        
    }
    function daaque($dept){
        $this->loaddb();
        $sql = "SELECT DISTINCT employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, syllabusstatus.syll_status_desc, syllabusstatus.syll_date_time, syllabus.syllabus_id, `subject`.subj_name, sched_subj.department FROM syllabus INNER JOIN topics ON topics.syllabus_id = syllabus.syllabus_id INNER JOIN syllabusstatus ON syllabusstatus.syllabus_id = syllabus.syllabus_id INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id INNER JOIN employment ON sched_subj.employment_id = employment.employment_id INNER JOIN employees ON employment.employee_id = employees.employee_id INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id WHERE syllabusstatus.syll_status_desc = 'queue for daa' ORDER BY syllabusstatus.syll_date_time ASC";
        
        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{
            $i=0;
            while($row=mysql_fetch_array($result)){
                $syllabus_id=$row['syllabus_id'];
                $fname=utf8_encode($row['employee_fname']);
                $mname=utf8_encode($row['employee_mname']);
                $lname=utf8_encode($row['employee_lname']);
                $employee_ext=$row['employee_ext'];
                $subject=$row['subj_name'];
                $date=$row['syll_date_time'];
                $name=$fname." ".$mname." ".$lname." ".$employee_ext;
                
                echo '<tr>
                  <td>
                    <form action="deancheck1.php" method="get" >
                    <input type="hidden" name="syllabus_id" class="form-control" value="'.$syllabus_id.'">
                    
                    <a >'.$fname.'</a>
                    <a >'.$mname.'</a>
                    <a >'.$lname.'</a></td>
                    <td><a >'.$subject.'</a></td>
                    <td><a >'.$date.'</a></td>';
                    if ($i==0) {
                        echo '<td><button type="submit" class="btn btn-default" name="Open"><a><i class="glyphicon glyphicon-folder-open createsyllabus"></i></a></button></td> ';
                    }
                echo'</form></tr>';
                $i++;
            }                                       
        }
        
    }

    function syllabusremarks($syllabus_id){
        $this->loaddb();
        $remarks_desc=$_POST['remark'];
        if (!empty($remarks_desc)) {
            $insert = "INSERT INTO `syllabus_remarks` (`remarks_desc`, `remark_stat`, `date_time`, `syllabus_id`) VALUES ('".$remarks_desc."','unread',NOW(),'".$syllabus_id."')";
        $insertres=mysql_query($insert) or die("Query insert syllabus_remarks: ".mysql_error());
        }
        
        $this->syllabusrevise($syllabus_id);
        
    }

    function loadsylrem($syllabus_id){
        $this->loaddb();
        $sql = "SELECT syllabus_remarks.remarks_desc, syllabus_remarks.date_time FROM syllabus_remarks WHERE syllabus_remarks.syllabus_id ='".$syllabus_id."' ORDER BY syllabus_remarks.date_time ASC";
        $result=mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{
            while($row=mysql_fetch_array($result)){
                $remarks_desc=$row['remarks_desc'];
                $date_time=$row['date_time'];
                
                echo "<tr>
                        <td valign='top' >".$date_time."</td>
                        <td valign='top'>".$remarks_desc."</td>
                    </tr>
                    <tr><td colspan='2'><br/></td></tr>";
            }
        }
        
    }

    function tqcheck2($test){
        $this->loaddb();
        $sql = "SELECT DISTINCT question_type.question_type_name, test_number.test_number, test_number.test_id, test_number.test_desc,  test_number.attachment FROM  test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE test_number.tq_id = '".$test."' ORDER BY test_number.test_number ASC";
        

        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{
            while($row=mysql_fetch_array($result)){
                $test_number=$row['test_number'];
                $question_type_name=$row['question_type_name'];
                $test_desc=$row['test_desc'];
                $test_id=$row['test_id'];
                $attachment=$row['attachment'];

                if ($test_number==1) {
                    $tn="I.";
                } 
                else if ($test_number==2) {
                    $tn="II.";
                }
                else if ($test_number==3) {
                    $tn="III.";
                }
                else if ($test_number==4) {
                    $tn="IV.";
                }
                
                else if ($test_number==5) {
                    $tn="V.";
                }
                
                else if ($test_number==6) {
                    $tn="VI.";
                }
                
                else if ($test_number==7) {
                    $tn="VII.";
                }
                
                else if ($test_number==8) {
                    $tn="VIII.";
                }
                
                else if ($test_number==9) {
                    $tn="IX.";
                }
                
                else if ($test_number==10) {
                    $tn="X.";
                }
                

                
            echo "
                <tr>
                    <td colspan='2'><b>".$tn." ".$question_type_name."</b> ".$test_desc."</td>
                </tr>";
                if (!empty($attachment)) {
                    echo "<tr>
                    <td colspan='2'><img src='uploads/".$attachment."' style='width:90%;height:200px;'</td>
                </tr>";
                }
                $this->questions2($test_id);
                
            }                                       
        }
        
    }
    function shstqcheck2($test){
        $this->loaddb();
        $sql = "SELECT DISTINCT shs_question_type.shs_question_type_name, shs_test_number.shs_test_number, shs_test_number.shs_test_id, shs_test_number.shs_test_desc,  shs_test_number.shs_attachment FROM  shs_test_number INNER JOIN shs_question_type ON shs_question_type.shs_test_id = shs_test_number.shs_test_id WHERE shs_test_number.shs_tq_id = '".$test."' ORDER BY shs_test_number.shs_test_number ASC";
        

        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{
            while($row=mysql_fetch_array($result)){
                $test_number=$row['shs_test_number'];
                $question_type_name=$row['shs_question_type_name'];
                $test_desc=$row['shs_test_desc'];
                $test_id=$row['shs_test_id'];
                $attachment=$row['shs_attachment'];

                if ($test_number==1) {
                    $tn="I.";
                } 
                else if ($test_number==2) {
                    $tn="II.";
                }
                else if ($test_number==3) {
                    $tn="III.";
                }
                else if ($test_number==4) {
                    $tn="IV.";
                }
                
                else if ($test_number==5) {
                    $tn="V.";
                }
                
                else if ($test_number==6) {
                    $tn="VI.";
                }
                
                else if ($test_number==7) {
                    $tn="VII.";
                }
                
                else if ($test_number==8) {
                    $tn="VIII.";
                }
                
                else if ($test_number==9) {
                    $tn="IX.";
                }
                
                else if ($test_number==10) {
                    $tn="X.";
                }
                

                
            echo "
                <tr>
                    <td colspan='2'><b>".$tn." ".$question_type_name."</b> ".$test_desc."</td>
                </tr>";
                if (!empty($attachment)) {
                    echo "<tr>
                    <td colspan='2'><img src='uploads/".$attachment."' style='width:90%;height:200px;'</td>
                </tr>";
                }
                $this->shsquestions2($test_id);
                
            }                                       
        }
        
    }

    function questions2($test_id){
        $this->loaddb();
        $sql = "SELECT cognitive_level.cognitive_desc, topics.topic_description, testquestions.number, testquestions.question_desc, testquestions.points, testquestions.attachment, testquestions.q_id, question_status.`status` FROM testquestions INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id INNER JOIN topics ON testquestions.topics_id = topics.topics_id INNER JOIN question_status ON question_status.q_id = testquestions.q_id WHERE testquestions.test_id = '".$test_id."' ORDER BY testquestions.number ASC";
        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{

            while($row=mysql_fetch_array($result)){
                $q_id=$row['q_id'];
                $number=$row['number'];
                $question_desc=$row['question_desc'];
                $points=$row['points'];
                $topic_description=$row['topic_description'];
                $cognitive_desc=$row['cognitive_desc'];
                $attachment=$row['attachment'];
                $status=$row['status'];
                if ($status=="checked") {
                    echo "<tr><td style='width:50px;' valign='top'>
                    <div style='height:20px;'><button type='button' class='btn-xs btn-success' disabled>
                     Approved </button></div>
                    </td>";
                }else{
                    echo "<tr><td style='width:50px;' valign='top'>
                    <div style='height:20px;'><button type='button' class='btn-xs btn-danger' disabled>
                     Pending </button></div></td>";
                }
            
            echo "<td><b> ".$number.".</b> ".$question_desc."
                
                </td></tr>";
                if (!empty($attachment)) {
                    echo "<tr>
                    <td colspan='2'><img src='uploads/".$attachment."' style='width:90%;height:200px;'</td>
                </tr>";
            }
            echo"<tr><td></td><td>
                <div class='col-xs-3'>
                    <b>Points:</b> ".$points."
                </div>
                <div class='col-xs-4'`>
                    <b>Topic:</b> ".$topic_description."
                </div>
                <div class='col-xs-5'`>
                    <b>Cognitive Level:</b> ".$cognitive_desc."
                </div>
                </td></tr>
                <tr><td></td><td>";
                $this->loadanswer($q_id);
                echo"
                </td></tr>";
                echo "<tr><td></td><td>";
                $this->loadchoices($q_id);
                echo "</td></tr>";
                echo"
                <tr><td><br></td></tr><tr><td></td><td>
                <div class='col-xs-12'`>";
                $this->loadremarks1($q_id);
                echo"
                <tr><td><br></td></tr></td></tr>";
                
            }   

        }
        
        
    }
    function shsquestions2($test_id){
        $this->loaddb();
        $sql = "SELECT cognitive_level.cognitive_desc, shs_topics.shs_topic_description, shs_testquestions.shs_number, shs_testquestions.shs_question_desc, shs_testquestions.shs_points, shs_testquestions.shs_attachment, shs_testquestions.shs_q_id, shs_question_status.`shs_status` FROM shs_testquestions INNER JOIN cognitive_level ON shs_testquestions.cognitive_level_id = cognitive_level.cognitive_level_id INNER JOIN shs_topics ON shs_testquestions.shs_topics_id = shs_topics.shs_topics_id INNER JOIN shs_question_status ON shs_question_status.shs_q_id = shs_testquestions.shs_q_id WHERE shs_testquestions.shs_test_id = '".$test_id."' ORDER BY shs_testquestions.shs_number ASC";
        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{

            while($row=mysql_fetch_array($result)){
                $q_id=$row['shs_q_id'];
                $number=$row['shs_number'];
                $question_desc=$row['shs_question_desc'];
                $points=$row['shs_points'];
                $topic_description=$row['shs_topic_description'];
                $cognitive_desc=$row['cognitive_desc'];
                $attachment=$row['shs_attachment'];
                $status=$row['shs_status'];
                if ($status=="checked") {
                    echo "<tr><td style='width:50px;' valign='top'>
                    <div style='height:20px;'><button type='button' class='btn-xs btn-success' disabled>
                     Approved </button></div>
                    </td>";
                }else{
                    echo "<tr><td style='width:50px;' valign='top'>
                    <div style='height:20px;'><button type='button' class='btn-xs btn-danger' disabled>
                     Pending </button></div></td>";
                }
            
            echo "<td><b> ".$number.".</b> ".$question_desc."
                
                </td></tr>";
                if (!empty($attachment)) {
                    echo "<tr>
                    <td colspan='2'><img src='uploads/".$attachment."' style='width:90%;height:200px;'</td>
                </tr>";
            }
            echo"<tr><td></td><td>
                <div class='col-xs-3'>
                    <b>Points:</b> ".$points."
                </div>
                <div class='col-xs-4'`>
                    <b>Topic:</b> ".$topic_description."
                </div>
                <div class='col-xs-5'`>
                    <b>Cognitive Level:</b> ".$cognitive_desc."
                </div>
                </td></tr>
                <tr><td></td><td>";
                $this->shsloadanswer($q_id);
                echo"
                </td></tr>";
                echo "<tr><td></td><td>";
                $this->shsloadchoices($q_id);
                echo "</td></tr>";
                echo"
                <tr><td><br></td></tr><tr><td></td><td>
                <div class='col-xs-12'`>";
                $this->shsloadremarks1($q_id);
                echo"
                <tr><td><br></td></tr></td></tr>";
                
            }   

        }
        
        
    }

    function tqcheck($test){
        $this->loaddb();
        $sql = "SELECT test_number.test_id, test_number.test_number, test_number.test_desc, test_number.attachment, question_type.question_type_name FROM test_number INNER JOIN question_type ON question_type.test_id = test_number.test_id WHERE test_number.tq_id = '".$test."' ORDER BY test_number.test_number ASC";
        

        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{
            while($row=mysql_fetch_array($result)){
                $test_number=$row['test_number'];
                $question_type_name=$row['question_type_name'];
                $test_desc=$row['test_desc'];
                $test_id=$row['test_id'];
                $attachment=$row['attachment'];

                if ($test_number==1) {
                    $tn="I.";
                } 
                else if ($test_number==2) {
                    $tn="II.";
                }
                else if ($test_number==3) {
                    $tn="III.";
                }
                else if ($test_number==4) {
                    $tn="IV.";
                }
                
                else if ($test_number==5) {
                    $tn="V.";
                }
                
                else if ($test_number==6) {
                    $tn="VI.";
                }
                
                else if ($test_number==7) {
                    $tn="VII.";
                }
                
                else if ($test_number==8) {
                    $tn="VIII.";
                }
                
                else if ($test_number==9) {
                    $tn="IX.";
                }
                
                else if ($test_number==10) {
                    $tn="X.";
                }
                

                
            echo "
             </tr>

                <tr>
                    <td class='col-xs-12'><b>".$tn." ".$question_type_name."</b></td>
                </tr>
                <tr>
                    <td colspan='2 '><b> Direction: </b>".$test_desc."</td>
                </tr>";
                if (!empty($attachment)) {
                    echo "<tr>
                    <td><img src='uploads/".$attachment."' style='width:90%;height:200px;'></td>
                </tr>";
                }
                $this->questions($test_id);
                
            }                                       
        }
        
    }
    function shstqcheck($test){
        $this->loaddb();
        $sql = "SELECT shs_test_number.shs_test_id, shs_test_number.shs_test_number, shs_test_number.shs_test_desc, shs_test_number.shs_attachment, shs_question_type.shs_question_type_name FROM shs_test_number INNER JOIN shs_question_type ON shs_question_type.shs_test_id = shs_test_number.shs_test_id WHERE shs_test_number.shs_tq_id = '".$test."' ORDER BY shs_test_number.shs_test_number ASC";
        

        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{
            while($row=mysql_fetch_array($result)){
                $test_number=$row['shs_test_number'];
                $question_type_name=$row['shs_question_type_name'];
                $test_desc=$row['shs_test_desc'];
                $test_id=$row['shs_test_id'];
                $attachment=$row['shs_attachment'];

                if ($test_number==1) {
                    $tn="I.";
                } 
                else if ($test_number==2) {
                    $tn="II.";
                }
                else if ($test_number==3) {
                    $tn="III.";
                }
                else if ($test_number==4) {
                    $tn="IV.";
                }
                
                else if ($test_number==5) {
                    $tn="V.";
                }
                
                else if ($test_number==6) {
                    $tn="VI.";
                }
                
                else if ($test_number==7) {
                    $tn="VII.";
                }
                
                else if ($test_number==8) {
                    $tn="VIII.";
                }
                
                else if ($test_number==9) {
                    $tn="IX.";
                }
                
                else if ($test_number==10) {
                    $tn="X.";
                }
                

                
            echo "
             </tr>

                <tr>
                    <td class='col-xs-12'><b>".$tn." ".$question_type_name."</b></td>
                </tr>
                <tr>
                    <td colspan='2 '><b> Direction: </b>".$test_desc."</td>
                </tr>";
                if (!empty($attachment)) {
                    echo "<tr>
                    <td><img src='uploads/".$attachment."' style='width:90%;height:auto;'></td>
                </tr>";
                }
                $this->shsquestions($test_id);
                
            }                                       
        }
        
    }

    function questions($test_id){
        $this->loaddb();
        $sql = "SELECT DISTINCT testquestions.number, testquestions.q_id, testquestions.question_desc, testquestions.points, testquestions.test_id, topics.topic_description, cognitive_level.cognitive_desc, testquestions.attachment, question_status.`status` FROM testquestions INNER JOIN topics ON testquestions.topics_id = topics.topics_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id INNER JOIN question_status ON question_status.q_id = testquestions.q_id WHERE testquestions.test_id ='".$test_id."' ORDER BY testquestions.number ASC";
        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{

            while($row=mysql_fetch_array($result)){
                $q_id=$row['q_id'];
                $number=$row['number'];
                $question_desc=$row['question_desc'];
                $points=$row['points'];
                $topic_description=$row['topic_description'];
                $cognitive_desc=$row['cognitive_desc'];
                $attachment=$row['attachment'];
                $status=$row['status'];
                if ($status=="checked") {
                    echo "<tr><td>
                
                <div class='col-xs-12'>
                    <input type='hidden' class='form-control' name='numqid[]'  value='".$q_id."'>
                    <i class=' createsyllabus'><input type='checkbox' name='chbox".$q_id."' value='checked' ".$status."><span class='createsyllabustext'>Approve Test 
                    Question</span></i>   ";
                }else{
                    echo "<tr><td>
                
                <div class='col-xs-12'>
                    <input type='hidden' class='form-control' name='numqid[]'  value='".$q_id."'>
                    <i class=' createsyllabus'><input type='checkbox' name='chbox".$q_id."' value='uncheck' ><span class='createsyllabustext'>Approve Test 
                    Question</span></i> ";
                }
            
            echo "<b>".$number.".</b> ".$question_desc."
                </div>
                </td></tr>";
                if (!empty($attachment)) {
                    echo "<tr>
                    <td><img src='uploads/".$attachment."' style='width:90%;height:200px;'></td>
                </tr>";
            }
            echo"
                <tr><td>
                <div class='col-xs-4'>
                    <b>Points:</b> ".$points."
                </div>
                <div class='col-xs-4'`>
                    <b>Topic:</b> ".$topic_description."
                </div>
                <div class='col-xs-4'`>
                    <b>Cognitive Level:</b> ".$cognitive_desc."
                </div>
                </td></tr>
                <tr><td>
                <div class='col-xs-12'`>";
                $this->loadanswer($q_id);
                echo"</div>
                </td></tr>";
                echo "<tr><td>";
                $this->loadchoices($q_id);
                echo "</td></tr>";
                echo"
                <tr><td>
                <div class='col-xs-12'`>";
                echo "<div class='col-xs-12'`>";
                $this->loadremarks1($q_id);
                echo"</div>
                </td></tr>";
                
                
                echo "<tr><td><input type='hidden' class='form-control' name='updatenumber[]'  value='".$q_id."'>
                        <textarea  name='remark[]' placeholder='Remarks' style='width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea></td></tr>";

            }   

        }
        
        
    }
    function shsquestions($test_id){
        $this->loaddb();
        $sql = "SELECT shs_testquestions.shs_number, shs_testquestions.shs_q_id, shs_testquestions.shs_question_desc, shs_testquestions.shs_points, shs_testquestions.shs_test_id, shs_topics.shs_topic_description, cognitive_level.cognitive_desc, shs_testquestions.shs_attachment, shs_question_status.`shs_status` FROM shs_testquestions INNER JOIN shs_topics ON shs_testquestions.shs_topics_id = shs_topics.shs_topics_id INNER JOIN cognitive_level ON shs_testquestions.cognitive_level_id = cognitive_level.cognitive_level_id INNER JOIN shs_question_status ON shs_question_status.shs_q_id = shs_testquestions.shs_q_id WHERE shs_testquestions.shs_test_id ='".$test_id."' ORDER BY shs_testquestions.shs_number ASC";
        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{

            while($row=mysql_fetch_array($result)){
                $q_id=$row['shs_q_id'];
                $number=$row['shs_number'];
                $question_desc=$row['shs_question_desc'];
                $points=$row['shs_points'];
                $topic_description=$row['shs_topic_description'];
                $cognitive_desc=$row['cognitive_desc'];
                $attachment=$row['shs_attachment'];
                $status=$row['shs_status'];
                if ($status=="checked") {
                    echo "<tr><td>
                
                <div class='col-xs-12'>
                    <input type='hidden' class='form-control' name='numqid[]'  value='".$q_id."'>
                    <i class=' createsyllabus'><input type='checkbox' name='chbox".$q_id."' value='checked' ".$status."><span class='createsyllabustext'>Approve Test 
                    Question</span></i>   ";
                }else{
                    echo "<tr><td>
                
                <div class='col-xs-12'>
                    <input type='hidden' class='form-control' name='numqid[]'  value='".$q_id."'>
                    <i class=' createsyllabus'><input type='checkbox' name='chbox".$q_id."' value='uncheck' ><span class='createsyllabustext'>Approve Test 
                    Question</span></i> ";
                }
            
            echo "<b>".$number.".</b> ".$question_desc."
                </div>
                </td></tr>";
                if (!empty($attachment)) {
                    echo "<tr>
                    <td><img src='uploads/".$attachment."' style='width:90%;height:auto;'></td>
                </tr>";
            }
            echo"
                <tr><td>
                <div class='col-xs-4'>
                    <b>Points:</b> ".$points."
                </div>
                <div class='col-xs-4'`>
                    <b>Topic:</b> ".$topic_description."
                </div>
                <div class='col-xs-4'`>
                    <b>Cognitive Level:</b> ".$cognitive_desc."
                </div>
                </td></tr>
                <tr><td>
                <div class='col-xs-12'`>";
                $this->shsloadanswer($q_id);
                echo"</div>
                </td></tr>";
                echo "<tr><td>";
                $this->shsloadchoices($q_id);
                echo "</td></tr>";
                echo"
                <tr><td>
                <div class='col-xs-12'`>";
                echo "<div class='col-xs-12'`>";
                $this->shsloadremarks1($q_id);
                echo"</div>
                </td></tr>";
                
                
                echo "<tr><td><input type='hidden' class='form-control' name='updatenumber[]'  value='".$q_id."'>
                        <textarea  name='remark[]' placeholder='Remarks' style='width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea></td></tr>";

            }   

        }
        
        
    }

    function loadanswer($q_id){
        $this->loaddb();
        $sql = "SELECT answer.answer_desc, answer.answer_attach FROM answer WHERE answer.q_id ='".$q_id."'";
        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{
            $i=1;
            while($row=mysql_fetch_array($result)){
                $answer_desc=$row['answer_desc'];
                $answer_attach=$row['answer_attach'];
                echo "
                <div class='col-xs-12'>
                <p ><b>Answer ".$i.": </b>".$answer_desc."</p></div>";
                if (!empty($answer_attach)) {
                    echo "<div class='col-xs-12'><img src='uploads/".$attachment."' style='width:90%;height:200px;'></div>";
            }
                $i++;
            }
        }
        
    }
    function shsloadanswer($q_id){
        $this->loaddb();
        $sql = "SELECT shs_answer.shs_answer_desc, shs_answer.shs_answer_attach FROM shs_answer WHERE shs_answer.shs_q_id ='".$q_id."'";
        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{
            $i=1;
            while($row=mysql_fetch_array($result)){
                $answer_desc=$row['shs_answer_desc'];
                $answer_attach=$row['shs_answer_attach'];
                echo "
                <div class='col-xs-12'>
                <p ><b>Answer ".$i.": </b>".$answer_desc."</p></div>";
                if (!empty($answer_attach)) {
                    echo "<div class='col-xs-12'><img src='uploads/".$attachment."' style='width:90%;height:200px;'></div>";
            }
                $i++;
            }
        }
        
    }
    
    function loadremarks1($q_id){
        $this->loaddb();
        $sql = "SELECT remarks.remark_desc, remarks.date_time FROM remarks WHERE remarks.q_id ='".$q_id."' ORDER BY remarks.date_time ASC";
        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{
            $i=1;
            echo "<table style='width:540px;'>";
            while($row=mysql_fetch_array($result)){
                $remark_desc=$row['remark_desc'];
                $date_time=$row['date_time'];
                echo "<tr>";
                echo "<td><b>Remarks ".$i.": </td> <td>".$date_time."</b></td></tr>";
                echo "<tr><td colspan='2'><p>".$remark_desc."</p></td>";
                echo "</tr>";
                $i++;
            }
            echo "</table>";
        }
        
    }
    function shsloadremarks1($q_id){
        $this->loaddb();
        $sql = "SELECT shs_remarks.shs_remark_desc, shs_remarks.shs_date_time FROM shs_remarks WHERE shs_remarks.shs_q_id ='".$q_id."' ORDER BY shs_remarks.shs_date_time ASC";
        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';
        }else{
            $i=1;
            echo "<table style='width:540px;'>";
            while($row=mysql_fetch_array($result)){
                $remark_desc=$row['shs_remark_desc'];
                $date_time=$row['shs_date_time'];
                echo "<tr>";
                echo "<td><b>Remarks ".$i.": </td> <td>".$date_time."</b></td></tr>";
                echo "<tr><td colspan='2'><p>".$remark_desc."</p></td>";
                echo "</tr>";
                $i++;
            }
            echo "</table>";
        }
        
    }

    function checkqstat($ph,$tq_id,$usr,$stat){
        $this->loaddb();
        $sql="SELECT question_status.`status` FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN question_status ON question_status.q_id = testquestions.q_id WHERE tq.tq_id = '".$tq_id."'";
        $uncheck=0;
        $result=mysql_query($sql);
            while ($row=mysql_fetch_array($result)) {
                $status=$row['status'];
                if ($status=="checked") {
                    
                }else{
                    $uncheck++;
                }
            }
            if ($stat=="approve") {
                if ($uncheck==0) {
                    if ($usr=="Dean") {
                        $this->appph($tq_id,$ph);
                    }else if ($usr=="Academic Head") {
                        $this->approve($tq_id);
                    }
                    
                }else{
                    echo "<script type='text/javascript'>alert('You still have questions to check');</script>";
                }
            }else if($stat=="revise"){
                if ($uncheck==0) {
                    echo "<script type='text/javascript'>alert('Revise error! all questions are checked.');</script>";
                }else{
                    // if ($usr=="dean") {
                        $this->reviseph($tq_id);
                    // }else if ($usr=="Academic Head") {
                    //     $this->revise($tq_id,$ph);
                    // }
                }
            }
        
        
    }
    function shscheckqstat($ph,$tq_id,$usr,$stat){
        $this->loaddb();
        $sql="SELECT shs_question_status.`shs_status` FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id INNER JOIN shs_question_status ON shs_question_status.shs_q_id = shs_testquestions.shs_q_id WHERE shs_tq.shs_tq_id = '".$tq_id."'";
        $uncheck=0;
        $result=mysql_query($sql);
            while ($row=mysql_fetch_array($result)) {
                $status=$row['shs_status'];
                if ($status=="checked") {
                    
                }else{
                    $uncheck++;
                }
            }
            if ($stat=="approve") {
                if ($uncheck==0) {
                    if ($usr=="Dean") {
                        $this->shsappph($tq_id,$ph);
                    }else if ($usr=="Academic Head") {
                        $this->shsapprove($tq_id);
                        $this->shaappsyll($tq_id);
                    }
                    
                }else{
                    echo "<script type='text/javascript'>alert('You still have questions to check');</script>";
                }
            }else if($stat=="revise"){
                if ($uncheck==0) {
                    echo "<script type='text/javascript'>alert('Revise error! all questions are checked.');</script>";
                }else{
                    if ($usr=="Dean") {
                        $this->shsreviseph($tq_id);
                    }else if ($usr=="Academic Head") {
                        $this->shsrevise($tq_id,$ph);
                    }
                }
            }
        
        
    }
    function shaappsyll($tq){
        $this->loaddb();
        $sql=mysql_query("");
    }

    function  remarks($ph,$tq_id,$position_session,$stat){
        $this->loaddb();
        foreach($_POST['remark'] as $row => $value){

            if (empty($_POST['remark'][$row])){
            }else{
                $remark=$_POST['remark'][$row];
                $updatenumber=$_POST['updatenumber'][$row];
                $insert = "INSERT INTO `remarks` (`remark_desc`, `date_time`, `q_id`) VALUES ('".$remark."',NOW(),'".$updatenumber."')";
                $insertres=mysql_query($insert) or die("Query remarks1: ".mysql_error());
            }
            
        }
        foreach($_POST['numqid'] as $row1 => $value1){
            $updatenumber1=$_POST['numqid'][$row1];
            if (isset($_POST['chbox'.$updatenumber1.''])){
                $query = "UPDATE question_status SET status='checked' WHERE q_id='".$updatenumber1."'";
                $result=mysql_query($query) or die("Query Failed : 1".mysql_error());
            }else{ 
                $query = "UPDATE question_status SET status='uncheck' WHERE q_id='".$updatenumber1."'";
                $result=mysql_query($query) or die("Query Failed : 2".mysql_error());
            }
            
        }
        $this->checkqstat($ph,$tq_id,$position_session,$stat);
       
  //       $message = "Successfully SAVED!!!!";
        // echo "<script type='text/javascript'>alert('$message');</script>";
        // echo "<meta http-equiv='refresh' content='0'>";
        
    }
    function  shsremarks(){
        $this->loaddb();
        foreach($_POST['remark'] as $row => $value){

            if (empty($_POST['remark'][$row])){
            }else{
                $remark=$_POST['remark'][$row];
                $updatenumber=$_POST['updatenumber'][$row];
                $insert = "INSERT INTO `shs_remarks` (`shs_remark_desc`, `shs_date_time`, `shs_q_id`) VALUES ('".$remark."',NOW(),'".$updatenumber."')";
                $insertres=mysql_query($insert) or die("Query remarks1: ".mysql_error());
            }
            

            
        }
        foreach($_POST['numqid'] as $row1 => $value){
            $updatenumber1=$_POST['numqid'][$row1];
            if (isset($_POST['chbox'.$updatenumber1.''])){
                $query = "UPDATE shs_question_status SET shs_status='checked' WHERE shs_q_id='".$updatenumber1."'";
                $result=mysql_query($query) or die("Query Failed : 1".mysql_error());
            }else{
                $query = "UPDATE shs_question_status SET shs_status='uncheck' WHERE shs_q_id='".$updatenumber1."'";
                $result=mysql_query($query) or die("Query Failed : 2".mysql_error());
            }
            
        }
       
  //       $message = "Successfully SAVED!!!!";
        // echo "<script type='text/javascript'>alert('$message');</script>";
        // echo "<meta http-equiv='refresh' content='0'>";
        
    }

    function syllabusrevise($syllabus_id){
        $this->loaddb();
        $query = "UPDATE syllabusstatus SET syll_status_desc='pending', syll_date_time=NOW(), syll_status='unread', syll_rev_count= syll_rev_count+1 WHERE syllabus_id='".$syllabus_id."'";
        $result=mysql_query($query) or die("Query Failed : ".mysql_error());
        $message = "Remark saved, Syllabus Denied!!!";
        echo "<script type='text/javascript'>window.location.href='dean_queue.php'</script>";
        
    }
    function presyllabusapprove($syllabus_id){
        $this->loaddb();
        $query = "UPDATE syllabusstatus SET syll_status_desc='queue for daa', syll_date_time=NOW(), syll_status='unread' WHERE syllabus_id='".$syllabus_id."'";
        $result=mysql_query($query) or die("Query Failed : ".mysql_error());
        $message = "Syllabus Approved! Sent to Academic Head";
        echo "<script type='text/javascript'>window.location.href='dean_queue.php'</script>";
        
    }

    function syllabusapprove($syllabus_id){
        $this->loaddb();
        $query = "UPDATE syllabusstatus SET syll_status_desc='approved', syll_date_time=NOW(), syll_status='unread' WHERE syllabus_id='".$syllabus_id."'";
        $result=mysql_query($query) or die("Query Failed : ".mysql_error());
        $message = "Syllabus Approved!!!";
        echo "<script type='text/javascript'>window.location.href='dean_queue.php'</script>";
        
    }

        function  approve($tq_id){
        $this->loaddb();
            $query = "UPDATE tqstatus SET status_desc='for printing', notif_status = 'unread'WHERE tq_id='".$tq_id."'";
                        $result=mysql_query($query) or die("Query Failed : ".mysql_error());
                        $message = "Test Questionnaire Approved!!! READY FOR PRINTING";
        
        echo "<script type='text/javascript'>window.location.href='dean_queue.php'</script>";

        }
        function  shsapprove($tq_id){
        $this->loaddb();
            $query = "UPDATE shs_tqstatus SET shs_status_desc='for printing', shs_notif_status = 'unread'WHERE shs_tq_id='".$tq_id."'";
                        $result=mysql_query($query) or die("Query Failed : ".mysql_error());
                        $message = "Test Questionnaire Approved!!! READY FOR PRINTING";
        
        echo "<script type='text/javascript'>window.location.href='dean_queue.php'</script>";

        }
        function  revise($tq_id,$ph){
        $this->loaddb();
            $sql=mysql_query("");
            $que = "SELECT tqstatus.status_desc, tqstatus.revise_count,tqstatus.ph FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id WHERE tq.tq_id ='".$tq_id."'";
            $res=mysql_query($que) or die("Query Failed : ".mysql_error());
            while($row=mysql_fetch_array($res)){
                $count= 1+$row['revise_count'];
                $ph=$row['ph'];
        
            }
            if ($ph=="ph") {
                $query = "UPDATE tqstatus SET status_desc='pending', revise_count='".$count."', date_time = NOW(), notif_status = 'unread' WHERE tq_id='".$tq_id."'";
                $result=mysql_query($query) or die("Query Failed : ".mysql_error());
                $message = "TEST QUESTIONNAIRE REVISED!";
            }else{
                $query = "UPDATE tqstatus SET status_desc='queue for ph', revise_count='".$count."', date_time = NOW(), notif_status = 'unread' WHERE tq_id='".$tq_id."'";
                $result=mysql_query($query) or die("Query Failed : ".mysql_error());
                $message = "TEST QUESTIONNAIRE REVISED!";
            }
        echo "<script type='text/javascript'>window.location.href='dean_queue.php'</script>";
        
        }
        function  shsrevise($tq_id,$ph){
        $this->loaddb();
            $sql=mysql_query("");
            $que = "SELECT shs_tqstatus.shs_status_desc, shs_tqstatus.shs_revise_count,shs_tqstatus.shs_ph FROM shs_tq INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id WHERE shs_tq.shs_tq_id ='".$tq_id."'";
            $res=mysql_query($que) or die("Query Failed : ".mysql_error());
            while($row=mysql_fetch_array($res)){
                $count= 1+$row['shs_revise_count'];
                $ph=$row['shs_ph'];
        
            }
            if ($ph=="ph") {
                $query = "UPDATE shs_tqstatus SET shs_status_desc='pending', shs_revise_count='".$count."', shs_date_time = NOW(), shs_notif_status = 'unread' WHERE shs_tq_id='".$tq_id."'";
                $result=mysql_query($query) or die("Query Failed : ".mysql_error());
                $message = "TEST QUESTIONNAIRE REVISED!";
            }else{
                $query = "UPDATE shs_tqstatus SET shs_status_desc='pending', shs_revise_count='".$count."', shs_date_time = NOW(), shs_notif_status = 'unread' WHERE shs_tq_id='".$tq_id."'";
                $result=mysql_query($query) or die("Query Failed : ".mysql_error());
                $message = "TEST QUESTIONNAIRE REVISED!";
            }
        echo "<script type='text/javascript'>window.location.href='dean_queue.php'</script>";
        
        }
        function getdean($dep){
            $this->loaddb();
            $que = "SELECT user_access.user_id FROM user_access INNER JOIN employment ON user_access.employment_id = employment.employment_id INNER JOIN department ON employment.department_id = department.department_id WHERE department.department_name = '".$dep."' AND user_access.position = 'dean'";
            $res=mysql_query($que) or die("Query Failed : ".mysql_error());
            while($row=mysql_fetch_array($res)){
                $user_id= $row['user_id'];
            }
            return $user_id;
        }
        function notifdean($dep,$fromid,$name){
            $connection = mysqli_connect("localhost","root","","testbank");
            $user_two = $this->getdean($dep);
            $q = mysqli_query($connection, "SELECT `user_id` FROM `user_access` WHERE user_id='$user_two' AND user_id!='$fromid'");
              if(mysqli_num_rows($q) == 1){
                $conver = mysqli_query($connection, "SELECT * FROM `conversation` WHERE (user_id='$fromid' AND user_two='$user_two') OR (user_id='$user_two' AND user_two='$fromid')");
                if(mysqli_num_rows($conver) == 1){
                  $fetch = mysqli_fetch_assoc($conver);
                  $conver_id = $fetch['conver_id'];
                }else{ 
                $q = mysqli_query($connection, "INSERT INTO `conversation` VALUES ('', '$fromid', '$user_two')");
                $conver_id = mysqli_insert_id($connection);
              }
            }else{
              die("Invalid $_GET user_id.");
            } 
            $this->sendmsg($conver_id,$fromid,$user_two,$name);

        }
        function sendmsg($conver_id,$fromid,$toid,$name){
            $this->loaddb();
            $insert = "INSERT INTO `messages` (`conver_id`, `from_user`, `to_user`, `message`, `message_status`, `message_date_time`) VALUES ('".$conver_id."','".$fromid."','".$toid."','Notice: TQ of ".$name." is sent back for revise.','unread',NOW())";
            $insertres=mysql_query($insert) or die("Query remarks1: ".mysql_error());
        }

        function  deanuploadstatus($tq_id, $stat,$pos,$dep){
        $this->loaddb();
        $whre="";
        if ($pos=="Academic Head") {
            $whre="for printing";
        }else if ($pos=="Dean") {
            $whre="queue for daa";
        }
        if ($dep=="col") {
            if ($stat == "approve") {
                $query = "UPDATE tqstatus SET status_desc='".$whre."', date_time = NOW(), notif_status = 'unread' WHERE tq_id='".$tq_id."'";
                $result=mysql_query($query) or die("Query Failed : ".mysql_error());
            }else{
                $que = "SELECT tqstatus.status_desc, tqstatus.revise_count FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id WHERE tq.tq_id ='".$tq_id."'";
                        $res=mysql_query($que) or die("Query Failed : ".mysql_error());
                            while($row=mysql_fetch_array($res)){
                                $count= 1+$row['revise_count'];
                        
                            }
                $query = "UPDATE tqstatus SET status_desc='pending', revise_count='".$count."', date_time = NOW(), notif_status = 'unread' WHERE tq_id='".$tq_id."'";
                            $result=mysql_query($query) or die("Query Failed : ".mysql_error());
            }
        }else{

            if ($stat == "approve") {
                $query = "UPDATE shs_tqstatus SET shs_status_desc='".$whre."', shs_date_time = NOW(), shs_notif_status = 'unread' WHERE shs_tq_id='".$tq_id."'";

                $result=mysql_query($query) or die("Query Failed : ".mysql_error());
            }else{
                $que = "SELECT shs_tqstatus.shs_status_desc, shs_tqstatus.shs_revise_count FROM shs_tq INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id WHERE shs_tq.shs_tq_id ='".$tq_id."'";
                        $res=mysql_query($que) or die("Query Failed : ".mysql_error());
                            while($row=mysql_fetch_array($res)){
                                $count= 1+$row['shs_revise_count'];
                            }
                $query = "UPDATE shs_tqstatus SET shs_status_desc='pending', shs_revise_count='".$count."', shs_date_time = NOW(), shs_notif_status = 'unread' WHERE shs_tq_id='".$tq_id."'";
                            $result=mysql_query($query) or die("Query Failed : ".mysql_error());

            }

        }
            //echo "<script type='text/javascript'>alert('$query');</script>";
            
        echo "<script type='text/javascript'>window.location.href='dean_queue.php'</script>";
        }

        function  appph($tq_id,$ph){
        $this->loaddb();
            $query = "UPDATE tqstatus SET status_desc='queue for daa', date_time = NOW(), notif_status = 'unread' WHERE tq_id='".$tq_id."'";
                        $result=mysql_query($query) or die("Query Failed : ".mysql_error());
                        $message = "Test Questionnaire Approved!!! QUE FOR DEAN";
        echo "<script type='text/javascript'>window.location.href='ph_queue.php'</script>";
        }
        function  shsappph($tq_id,$ph){
        $this->loaddb();
            $query = "UPDATE shs_tqstatus SET shs_status_desc='queue for daa', shs_date_time = NOW(), shs_notif_status = 'unread' WHERE shs_tq_id='".$tq_id."'";
                        $result=mysql_query($query) or die("Query Failed : ".mysql_error());
                        $message = "Test Questionnaire Approved!!! QUE FOR DEAN";
        echo "<script type='text/javascript'>window.location.href='ph_queue.php'</script>";
        }

        function  reviseph($tq_id){
        $this->loaddb();

            $que = "SELECT tqstatus.status_desc, tqstatus.revise_count FROM tq INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id WHERE tq.tq_id ='".$tq_id."'";
                        $res=mysql_query($que) or die("Query Failed : ".mysql_error());
                            while($row=mysql_fetch_array($res)){
                                $count= 1+$row['revise_count'];
                        
                            }
            $query = "UPDATE tqstatus SET status_desc='pending', revise_count='".$count."', date_time = NOW(), notif_status = 'unread' WHERE tq_id='".$tq_id."'";
                        $result=mysql_query($query) or die("Query Failed : ".mysql_error());
                        $message = "TEST QUESTIONNAIRE REVISED!";
                        
                        
            

        
    echo "<script type='text/javascript'>window.location.href='ph_queue.php'</script>";
    
        }
    function  shsreviseph($tq_id){
        $this->loaddb();

            $que = "SELECT shs_tqstatus.shs_status_desc, shs_tqstatus.shs_revise_count FROM shs_tq INNER JOIN shs_tqstatus ON shs_tqstatus.shs_tq_id = shs_tq.shs_tq_id WHERE shs_tq.shs_tq_id ='".$tq_id."'";
                        $res=mysql_query($que) or die("Query Failed : ".mysql_error());
                            while($row=mysql_fetch_array($res)){
                                $count= 1+$row['revise_count'];
                        
                            }
            $query = "UPDATE shs_tqstatus SET shs_status_desc='pending', shs_revise_count='".$count."', shs_date_time = NOW(), shs_notif_status = 'unread' WHERE shs_tq_id='".$tq_id."'";
                        $result=mysql_query($query) or die("Query Failed : ".mysql_error());
                        $message = "TEST QUESTIONNAIRE REVISED!";
                        
                        
            

        
    echo "<script type='text/javascript'>window.location.href='ph_queue.php'</script>";
    
        }
    function loadchoices($q_id){

        $this->loaddb();
        
        $sql2 = "SELECT testquestions.number, answer_choices.answer_choice_desc FROM test_number INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN answer_choices ON answer_choices.q_id = testquestions.q_id WHERE testquestions.q_id ='".$q_id."'";;
        $result2 = mysql_query($sql2);
        $count=0;
                while($row=mysql_fetch_array($result2)){
                    $count++;
                    $answer_choice_desc=$row['answer_choice_desc'];
                    echo "
                    <div class='col-xs-3'>
                        <b>choice ".$count.": </b>".$answer_choice_desc."
                    </div>";
                }
            
        
    }
    function shsloadchoices($q_id){

        $this->loaddb();
        
        $sql2 = "SELECT shs_testquestions.shs_number, shs_answer_choices.shs_answer_choice_desc FROM shs_test_number INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id INNER JOIN shs_answer_choices ON shs_answer_choices.shs_q_id = shs_testquestions.shs_q_id WHERE shs_testquestions.shs_q_id ='".$q_id."'";;
        $result2 = mysql_query($sql2);
        $count=0;
                while($row=mysql_fetch_array($result2)){
                    $count++;
                    $answer_choice_desc=$row['shs_answer_choice_desc'];
                    echo "
                    <div class='col-xs-3'>
                        <b>choice ".$count.": </b>".$answer_choice_desc."
                    </div>";
                }
            
        
    }

    function loadinstruction($tq_id){
        $this->loaddb();
        $sql=mysql_query("SELECT tq.main_direction, tq.main_attach FROM tq WHERE tq.tq_id ='".$tq_id."'");
        while ($row=mysql_fetch_array($sql)) {
            $main_attach=$row['main_attach'];
            echo '<tr><td valign="top" style="width:100px;"><b>General Instructions:</td><td colspan="4">'.html_entity_decode($row['main_direction']).'</b></td></tr>';
            if (!empty($main_attach)) {
                echo "<tr><td colspan='4'><img src='uploads/".$main_attach."' style='width:auto;height:auto;'></td></tr>";
            }
            

        }
        
    }
    function shsloadinstruction($tq_id){
        $this->loaddb();
        $sql=mysql_query("SELECT shs_tq.shs_main_direction, shs_tq.shs_main_attach FROM shs_tq WHERE shs_tq.shs_tq_id ='".$tq_id."'");
        while ($row=mysql_fetch_array($sql)) {
            $main_attach=$row['shs_main_attach'];
            echo '<tr><td valign="top" style="width:100px;"><b>General Instructions:</td><td colspan="4">'.html_entity_decode($row['shs_main_direction']).'</b></td></tr>';
            if (!empty($main_attach)) {
                echo "<tr><td colspan='4'><img src='uploads/".$main_attach."' style='width:auto;height:auto;'></td></tr>";
            }
            

        }
        
    }

    function loadchoices1($q_id){

        $this->loaddb();
        $sql3= "SELECT answer_choices.ac_id, answer_choices.answer_choice_desc, answer_choices.choice_attach, answer_choices.q_id FROM answer_choices WHERE answer_choices.q_id = '".$q_id."'";
        $result3 = mysql_query($sql3);
        if (mysql_num_rows($result3)>=1) {
            $sql2 = "SELECT testquestions.number, answer_choices.answer_choice_desc FROM test_number INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN answer_choices ON answer_choices.q_id = testquestions.q_id WHERE testquestions.q_id ='".$q_id."'";;
            $result2 = mysql_query($sql2);
            $count=0;
            while($row=mysql_fetch_array($result2)){
                $count++;
                if ($count==1) {
                    $l="a.";
                }else if ($count==2) {
                    $l="b.";
                }else if ($count==3) {
                    $l="c.";
                }else if ($count==4) {
                    $l="d.";
                }else if ($count==5) {
                    $l="e.";
                }else if ($count==6) {
                    $l="f.";
                }else if ($count==7) {
                    $l="g.";
                }else if ($count==8) {
                    $l="h.";
                }else if ($count==9) {
                    $l="i.";
                }else if ($count==10) {
                    $l="j.";
                }
                $answer_choice_desc=html_entity_decode($row['answer_choice_desc']);
                echo "
                <div class='col-xs-6' style=' width: 350px;'>".$l." ".$answer_choice_desc."
                </div>";
            }
         
        }else{ 

        }
        
    }
    function shsloadchoices1($q_id){

        $this->loaddb();
        $sql3= "SELECT shs_answer_choices.shs_ac_id, shs_answer_choices.shs_answer_choice_desc, shs_answer_choices.shs_choice_attach, shs_answer_choices.shs_q_id FROM shs_answer_choices WHERE shs_answer_choices.shs_q_id = '".$q_id."'";
        $result3 = mysql_query($sql3);
        if (mysql_num_rows($result3)>=1) {
            $sql2 = "SELECT shs_testquestions.shs_number, shs_answer_choices.shs_answer_choice_desc FROM shs_test_number INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id INNER JOIN shs_answer_choices ON shs_answer_choices.shs_q_id = shs_testquestions.shs_q_id WHERE shs_testquestions.shs_q_id ='".$q_id."'";
            $result2 = mysql_query($sql2);
            $count=0;
            while($row=mysql_fetch_array($result2)){
                $count++;
                if ($count==1) {
                    $l="a.";
                }else if ($count==2) {
                    $l="b.";
                }else if ($count==3) {
                    $l="c.";
                }else if ($count==4) {
                    $l="d.";
                }else if ($count==5) {
                    $l="e.";
                }else if ($count==6) {
                    $l="f.";
                }else if ($count==7) {
                    $l="g.";
                }else if ($count==8) {
                    $l="h.";
                }else if ($count==9) {
                    $l="i.";
                }else if ($count==10) {
                    $l="j.";
                }
                $answer_choice_desc=html_entity_decode($row['shs_answer_choice_desc']);
                echo "
                <div class='col-xs-6' style=' width: 350px;'>".$l." ".$answer_choice_desc."
                </div>";
            }
         
        }else{ 

        }
        
    }

    function getpoints($tq_id){
        $this->loaddb();
        $sql = "SELECT DISTINCT topics.topic_description, topics.topics_id, cognitive_level.cognitive_level_id, cognitive_level.cognitive_desc FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id INNER JOIN topics ON testquestions.topics_id = topics.topics_id WHERE tq.tq_id = '".$tq_id."' AND testquestions.topics_id = topics.topics_id";
        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';

        }else{
            
                    

            while($row=mysql_fetch_array($result)){
                $topics_id=$row['topics_id'];
                $topic_description=$row['topic_description'];
                $cognitive_level_id=$row['cognitive_level_id'];
                $cognitive_desc=$row['cognitive_desc'];
                

                echo "<tr>
                    <td class='col-xs-12'><b>".$topic_description."</b></td>";
                $sql2 = "SELECT Sum(testquestions.points) AS points FROM testquestions INNER JOIN topics ON testquestions.topics_id = topics.topics_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE cognitive_level.cognitive_level_id = 1 AND topics.topics_id = '".$topics_id."'";
                $result2 = mysql_query($sql2);
                    while($rows=mysql_fetch_array($result2)){
                        $points=$rows['points'];
                        echo"
                        <td class='col-xs-12'><b>".$points."</b></td>";
                        //echo "<script type='text/javascript'>alert('$points');</script>";
                    
                    }
                
                $sql3 = "SELECT Sum(testquestions.points) AS points FROM testquestions INNER JOIN topics ON testquestions.topics_id = topics.topics_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE cognitive_level.cognitive_level_id = 2 AND topics.topics_id = '".$topics_id."'";
                $result3 = mysql_query($sql3);
                    while($rows=mysql_fetch_array($result3)){
                        $points2=$rows['points'];
                        echo"
                        <td class='col-xs-12'><b>".$points2."</b></td>";
                        //  echo "<script type='text/javascript'>alert('$points');</script>";
                    
                    }
                $sql4 = "SELECT Sum(testquestions.points) AS points FROM testquestions INNER JOIN topics ON testquestions.topics_id = topics.topics_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE cognitive_level.cognitive_level_id = 3 AND topics.topics_id = '".$topics_id."'";
                $result4 = mysql_query($sql4);
                    while($rows=mysql_fetch_array($result4)){
                        $points3=$rows['points'];
                        echo"
                        <td class='col-xs-12'><b>".$points3."</b></td>";
                        //  echo "<script type='text/javascript'>alert('$points');</script>";
                    
                    }
                $sql5 = "SELECT Sum(testquestions.points) AS points FROM testquestions INNER JOIN topics ON testquestions.topics_id = topics.topics_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE cognitive_level.cognitive_level_id = 4 AND topics.topics_id = '".$topics_id."'";
                $result5 = mysql_query($sql5);
                    while($rows=mysql_fetch_array($result5)){
                        $points4=$rows['points'];
                        echo"
                        <td class='col-xs-12'><b>".$points4."</b></td>";
                        //  echo "<script type='text/javascript'>alert('$points');</script>";
                    
                    }   
                $sql6 = "SELECT Sum(testquestions.points) AS points FROM testquestions INNER JOIN topics ON testquestions.topics_id = topics.topics_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE cognitive_level.cognitive_level_id = 5 AND topics.topics_id = '".$topics_id."'";
                $result6 = mysql_query($sql6);
                    while($rows=mysql_fetch_array($result6)){
                        $points5=$rows['points'];
                        echo"
                        <td class='col-xs-12'><b>".$points5."</b></td>";
                        //  echo "<script type='text/javascript'>alert('$points');</script>";
                    
                    }
                $sql7 = "SELECT Sum(testquestions.points) AS points FROM testquestions INNER JOIN topics ON testquestions.topics_id = topics.topics_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE cognitive_level.cognitive_level_id = 6 AND topics.topics_id = '".$topics_id."'";
                $result7 = mysql_query($sql7);
                    while($rows=mysql_fetch_array($result7)){
                        $points6=$rows['points'];
                        echo"
                        <td class='col-xs-12'><b>".$points6."</b></td>";
                        //  echo "<script type='text/javascript'>alert('$points');</script>";
                    
                    }
                
            }

            echo "</tr>";


        }
        
        
    }
    
    function getitems($tq_id){
        $this->loaddb();
        $sql = "SELECT DISTINCT topics.topic_description, topics.topics_id, cognitive_level.cognitive_level_id, cognitive_level.cognitive_desc FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id INNER JOIN topics ON testquestions.topics_id = topics.topics_id WHERE tq.tq_id = '".$tq_id."' AND testquestions.topics_id = topics.topics_id AND cognitive_level.cognitive_level_id=1";
        $result = mysql_query($sql);
        if(!$result){
            echo 'Database Error!';

        }else{
            
                    

            while($row=mysql_fetch_array($result)){
                $topics_id=$row['topics_id'];
                $topic_description=$row['topic_description'];
                $cognitive_level_id=$row['cognitive_level_id'];
                $cognitive_desc=$row['cognitive_desc'];
                

                echo "<tr>
                    <td class='col-xs-12'><b>".$topic_description."</b></td>";
                $sql2 = "SELECT DISTINCT test_number.test_number FROM test_number INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id INNER JOIN topics ON testquestions.topics_id = topics.topics_id WHERE topics.topics_id = '".$topics_id."' AND cognitive_level.cognitive_level_id = 1";
                $result2 = mysql_query($sql2);
                    while($rows=mysql_fetch_array($result2)){
                        $test_number=$rows['test_number'];
                        echo"
                        <td class='col-xs-12'>".$test_number."[";

                        $sql3 = "SELECT DISTINCT testquestions.number FROM testquestions  INNER JOIN test_number ON testquestions.test_id = test_number.test_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id INNER JOIN topics ON testquestions.topics_id = topics.topics_id WHERE topics.topics_id = '".$topics_id."' AND cognitive_level.cognitive_level_id = 1";
                        $result3 = mysql_query($sql3);
                            while($rows=mysql_fetch_array($result3)){
                                $number=$rows['number'];
                                echo $number;
                            }
echo " ]";

                    }   
                    echo "</td></tr>";
            }

            
            $this->getitems2($tq_id);
        }
        
    }

    //asddxed

    function getitems2($tq_id){
        $this->loaddb();
        $sql1 = "SELECT DISTINCT topics.topic_description, topics.topics_id, cognitive_level.cognitive_level_id, cognitive_level.cognitive_desc FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id INNER JOIN topics ON testquestions.topics_id = topics.topics_id WHERE tq.tq_id = '".$tq_id."' AND testquestions.topics_id = topics.topics_id AND cognitive_level.cognitive_level_id=2";
        $result1 = mysql_query($sql1);
        if(!$result1){
            echo 'Database Error!';

        }else{
            
                    

            while($row=mysql_fetch_array($result1)){
                $topics_id=$row['topics_id'];
                $topic_description=$row['topic_description'];
                $cognitive_level_id=$row['cognitive_level_id'];
                $cognitive_desc=$row['cognitive_desc'];
                

                echo "<tr>
                    <td class='col-xs-12'><b>".$topic_description."</b></td>";
                $sql21 = "SELECT DISTINCT test_number.test_number FROM test_number INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id INNER JOIN topics ON testquestions.topics_id = topics.topics_id WHERE topics.topics_id = '".$topics_id."' AND cognitive_level.cognitive_level_id = 2";
                $result21 = mysql_query($sql21);
                    while($rows=mysql_fetch_array($result21)){
                        $test_number=$rows['test_number'];
                        echo"
                        <td class='col-xs-12'>".$test_number."[";

                        $sql31 = "SELECT DISTINCT testquestions.number FROM testquestions  INNER JOIN test_number ON testquestions.test_id = test_number.test_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id INNER JOIN topics ON testquestions.topics_id = topics.topics_id WHERE topics.topics_id = '".$topics_id."' AND cognitive_level.cognitive_level_id = 2";
                        $result31 = mysql_query($sql31);
                            while($rows=mysql_fetch_array($result31)){
                                $number=$rows['number'];
                                echo $number;
                            }
echo " ]";
                    }   
                    echo "</td></tr>";
            }
        }
        
    }



}
?>
