
<?php
  $sqle = "SELECT sched_subj.department FROM syllabus INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id WHERE syllabus.syllabus_id ='".$syllabus_id."'";
  $resulte = mysql_query($sqle);
    if(!$resulte){
      echo 'Database Error!';
    }else{
      while($row=mysql_fetch_array($resulte)){
        $department=$row['department'];
      }
    }
?>
  <div  id="printableArea">
  <!-- style="display:none" -->
    <table  width="800">
      <tr>
        <td width="200" ></td>
        <td>
          <img src="img/amalogo.png" width="60">
        </td>
        <td align="center">
            ACLC College of Butuan<br/>
                Butuan City
        </td>
        <td width="300" ></td>
      </tr>
      <tr>
        <td align="center" colspan="4">
          <h4><b>COURSE SYLLABUS</b></h4>
        </td>
      </tr>
    </table>
    <table border="solid" width="800">
      <tr>
        <td class="col-md-10" align="center" colspan="4"><?php
          if ($department=='ITE' OR $department=='CS') {
            $dep1='Information Technology Education Departmentment
          Bachelor of Science in Information Technology';
          }if ($department=='SHS' OR $department=='GEN') {
            $dep1='General Education Departmentment';
          }else{
            $dep1='Business Education Program';
          }
          echo $dep1; 
        ?></td>
      </tr>
      <tr>
        <td><b>Course Name</b></td>
        <td colspan="3"><?php echo $subj_name1;?></td>
      </tr>
      <tr>
        <td width="150"><b>Curriculum</b></td>
        <td width="350"><?php $class->getdocinfo($syllabus_id,"cur");?></td>
        <td ><b>Revision Status</b></td>
        <td width="150"><?php $class->getdocinfo($syllabus_id,"rev");?></td>
      </tr>
      <tr>
        <td width="150"><b>Academic Year</b></td>
        <td width="350"><?php $class->checksy($syllabus_id); ?></td>
        <td><b>Term</b></td>
        <td width="150"><?php $class->checksem($syllabus_id); ?></td>
      </tr>
    </table>
    <br>
    <table border="solid" width="800">
      <tr bgcolor="#659EC7" id="color1">
        <td align="center" colspan="2"><h4><b>INSTITUTIONAL INFORMATION</b></h4></td>
      </tr>
      <tr>
        <td class="col-md-4"><b>Institutional Vision</b></td>
        <td class="col-md-8"><p><?php $class->getinstitutional("iv"); ?> </p></td>
      </tr>
      <tr>
        <td class="col-md-4"><b>Institutional Mission</b></td>
        <td class="col-md-8"><p><?php $class->getinstitutional("im"); ?> </p></td>
      </tr>
      <tr>
        <td class="col-md-4"><b>Quality Policy Statement</b></td>
        <td class="col-md-8"><p><?php $class->getinstitutional("qps"); ?> </p></td>
      </tr>
      <tr>
        <td class="col-md-4"><b>Institutional Goals</b></td>
        <td class="col-md-8"><p><?php $class->getinstitutional("ig"); ?> </p></td>
      </tr>
      <tr>
        <td class="col-md-4"><b>Institutional Core Values</b></td>
        <td class="col-md-8"><p><?php $class->getinstitutional("icv"); ?> </p></td>
      </tr>
      </table>
      <br>
      <table border="solid" width="800">
       <tr bgcolor="#89C35C" id="color2">
        <td align="center" colspan="3"><h4><b>Institutional Graduate Outcomes</b></h4></td>
      </tr>
      <tr>
        <th class="col-md-3"><b>Graduate Attributes</b></th>
        <th class="col-md-1"><b>Graduate Outcomes Code</b></th>
        <th class="col-md-8"><b>Graduate Outcomes</b></th>
      </tr>
      <?php $class->getinstitutional1(); ?>      
    </table>
    <br>
    <?php 
      if ($department!="GEN") {
    ?>
    <table border="solid" width="800">
      <tr bgcolor="#659EC7" id="color1">
        <td  align="center" colspan="2"><h4><b>PROGRAM INFORMATION</b></h4></td>
      </tr>
      <tr>
        <td class="col-md-4"><b>Program Vision</b></td>
        <td class="col-md-8"><p><?php $class->getpi($department,"vision"); ?></p></td>
      </tr>
      <tr>
        <td class="col-md-4"><b>Program Mission</b></td>
        <td class="col-md-8"><p><?php $class->getpi($department,"mission"); ?></p></td>
      </tr>
      <?php 
        if ($department!="BA") {
      ?>
      <tr>
        <td class="col-md-4"><b>Program Description</b></td>
        <td class="col-md-8"><p><?php $class->getpi($department,"desc"); ?></p></td>
      </tr>
      <?php
        }
      ?>
      <tr>
        <td class="col-md-4"><b>Program Educational Objectives</b></td>
        <td class="col-md-8"><p>
        <?php 
          if ($department=="BA") {
            echo "The Bachelor of Science in Business Administration program aims to achieve the following objectives:<br>";
          }
          $class->getpi($department,"objectives"); 
        ?></p></td>
      </tr>
    </table>
    <br>
    <br>
    <table border="solid" width="800">
      <tr bgcolor="#89C35C" id="color2">
        <td  align="center" colspan="3"><h4><b>PROGRAM GRADUATE OUTCOMES</b></h4></td>
      </tr>
      <tr>
        <th class="col-md-3"><b>Graduate Attributes</b></th>
        <th class="col-md-1"><b>Graduate Outcomes Code</b></th>
        <th class="col-md-8"><b>Graduate Outcomes</b></th>
      </tr>
      <?php $class->getprogram($department); ?>
      
    </table>
    <br>
    <?php
      }
    ?>
    <br>
    <table border="solid" width="800">
      <tr bgcolor="#659EC7" id="color1">
        <td  align="center" colspan="3" class="col-md-12" style="width: 1000px;"><h4><b>COURSE INFORMATION</b></h4></td>
      </tr>
      <tr>
        <td class="col-md-4"><b>Course Name</b></td>
        <td class="col-md-8"><p><?php echo $subj_name1; ?></p></td>
      </tr>
      <tr>
        <td class="col-md-4"><b>Course Code</b></td>
        <td class="col-md-8"><p><?php echo $subj_code1; ?></p></td>
      </tr>
      <tr>
        <td class="col-md-4"><b>Course Unit</b></td>
        <td class="col-md-8"><p><?php echo $unit; ?></p></td>
      </tr>
      <tr>
        <td class="col-md-4"><b>Pre-requisites / Co-requisites</b></td>
        <td class="col-md-8"><p><?php echo $pre_req; ?></p></td>
      </tr>
      <tr>
        <td class="col-md-4"><b>Course Description</b></td>
        <td class="col-md-8"><p><?php echo $subj_desc1; ?></p></td>
      </tr>
        <?php 
          if ($department=="BA" OR $department=="GEN" OR $department=="SHS") {
            
          }else{
            $class->loadprintpgo($syllabus_id);
          } 
        ?>
        <?php $class->loadprintclo($syllabus_id,$department);?>
      
    </table>
    <br>
      <?php $class->loadweek1($syllabus_id); ?>
    <br>
    <table border="solid" width="800">
      <tr bgcolor="#659EC7" id="color1">
        <td align="center" colspan="8"><h4><b>Course Requirements and Policies</b></h4></td>
      </tr>
        <?php $class->coursereq($syllabus_id); ?>
      <tr>
        <th class="col-xs-2" rowspan="7">Class Policy</th>
        <th bgcolor="#89C35C" id="color2" class="col-xs-3">Deviations</th>
        <th bgcolor="#89C35C" id="color2" class="col-xs-7" colspan="5">Policies</th>
      </tr>
      <?php $class->classpolicy($syllabus_id); ?>
     
      <?php
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
      ?>
      
        <?php $class->ref($syllabus_id); ?>
      
    </table>
    <br>
    <table border="solid" width="800">
      <tr bgcolor="#659EC7" id="color1">
        <td  class="col-xs-12" align="center" colspan="4"><h4><b>SYLLABUS HISTORY LOG:</b></h4></td>
      </tr>
      <tr bgcolor="#659EC7" id="color1">
        <td  class="col-xs-12" colspan="4"><h4><b>SYLLABUS CREATION </b></h4></td>
      </tr>
      <tr>
        <td width="25%">Prepared by:</td>
        <td width="50%"><br/>
          <b><?php echo mb_strtoupper($fullname_session); ?></b><br/>
          <small>Faculty</small>
        </td>
        <td width="10%">Date:</td>
        <td width="15%"></td>
      </tr>
      <tr>
        <td width="25%">References verified by:</td>
        <td width="50%">
          <br/><b>LIBRARIAN</b>
          <br/><small>Librarian </small>
        </td>
        <td width="10%">Date:</td>
        <td width="15%"></td>
      </tr>
      <tr>
        <td width="25%">Reviewed by:</td>
        <td width="50%"><br/><b><?php $class->checkdean($department); ?></b><br/>
          <?php
            if ($department=='ITE' OR $department=='CS') {
              $tit='<small>Head, Information Technology Education Unit</small>';
            }if ($department=='SHS' OR $department=='GEN') {
              $tit='<small>Head, General Education Unit</small>';
            }else{
              $tit='<small>Head, Business Education Unit</small>';
            }
            echo $tit;
          ?><br/>
        </td>
        <td width="10%">Date:</td>
        <td width="15%"></td>
      </tr>
      <tr>
        <td width="25%">Approved:</td>
        <td width="50%"><br/>
          <b>ROBERT L. CASTRO, LPT, MAEd</b>
          <br/><small>Director for Academic Affairs</small>
        </td>
        <td width="10%">Date:</td>
        <td width="15%"></td>
      </tr>
    </table>
    <br/>
    <table border="solid" width="800">
      <?php $class->loadauthor($syllabus_id); ?>
    </table>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <table border="solid" width="800">
      <tr>
        <td colspan="7"><h4>REVISION STATUS TRACKING</h4></td>
      </tr>
      <tr>
        <td rowspan="2">Rev. No.</td>
        <td rowspan="2">Issued Date</td>
        <td colspan="4">Authority on Issuance</td>
        <td rowspan="2">Effective Date:</td>
      </tr>
      <tr>
        <td>Prepared by:</td>
        <td>Reviewed by:</td>
        <td>References verified by:</td>
        <td>Approved:</td>
      </tr>
        <?php $class->loadrev($syllabus_id); ?>
    </table>
  </div>
