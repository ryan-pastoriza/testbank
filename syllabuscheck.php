<html>
<?php
$department=$class->getdepartment($syllabus_id);
?>
<head>
  <title></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
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
        <td colspan="3"><?php echo $subj_name;?></td>
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
      <!-- <tr>
        <td class="col-md-3">Critical and Logical Thinker</td>
        <td class="col-md-1">IGO01</td>
        <td class="col-md-8"><p>Critically analyze and evaluate the application of fundamental knowledge and disciplinal principles in defined problem or requirements to the abstraction, conceptualization, and generation of comprehensive conclusion and substantiated recommendation</p></td>
      </tr>
      <tr>
        <td class="col-md-3">Ingenuity</td>
        <td class="col-md-1">IGO02</td>
        <td class="col-md-8"><p>Incorporate legal, environmental, scientific, technological, economic, cultural, professional, and other disciplinal requirements in the conceptualization, proposal, formulation, creation, development, innovation, and sustainability of cost-effective tangible and intangible products and solution models that improve competitive advantages of Filipino talents, goods and services</p></td>
      </tr>
      <tr>
        <td class="col-md-3">Collaborative Governance</td>
        <td class="col-md-1">IGO03</td>
        <td class="col-md-8"><p>Demonstrate committed leadership in the achievement of team goals and collaboratively function as a responsible and effective member or leader in different teams and multidisciplinary settings reflective of Filipino cultural heritage and values of family, optimism, and happiness</p></td>
      </tr>
      <tr>
        <td class="col-md-3">Effective Communicator</td>
        <td class="col-md-1">Effective Communicator IGO04</td>
        <td class="col-md-8"><p>Effectively communicate with English fluency in narrative, logical, tabular, graphical, verbal, and electronic formats that meet user and audience requirements </p></td>
      </tr>
      <tr>
        <td class="col-md-3">Ethics</td>
        <td class="col-md-1">IGO05</td>
        <td class="col-md-8"><p>Demonstrate with understanding and commitment to adhere oneself to professional norms and ethics in the practice of discipline </p></td>
      </tr>
      <tr>
        <td class="col-md-3">Lifelong Learning</td>
        <td class="col-md-1">IGO06</td>
        <td class="col-md-8"><p>Evaluate and reflects critically on own assumptions and values, thinking, performance, and behavior, and well-being that result with the recognition of the need for continual learning as a foundation for professional development, as well as the sustainable growth of the Philippine economy</p></td>
      </tr> -->
    </table>
    <br>
    <?php
    if ($department=='SHS' OR $department=='GEN') {
      
    }else{
      ?>
      <table border="solid" width="800">
        <tr bgcolor="#659EC7" id="color1">
          <td  align="center" colspan="2"><h4><b>PROGRAM INFORMATION</b></h4></td>
        </tr>
        <tr>
          <td class="col-md-4"><b>Program Vision</b></td>
          <td class="col-md-8"><p>The Information Technology Education Program leads in the education for technology-driven, policy abiding, social responsibility  and provide the high quality technology-based services for students, partners and stakeholders, in the most cost-effective manner, to facilitate the institution mission as it applies to the teaching, learning, management, and community service.</p></td>
        </tr>
        <tr>
          <td class="col-md-4"><b>Program Mission</b></td>
          <td class="col-md-8"><p>Our program mission is to add value to company and its stakeholders by creating a synergy in its structures and activities of education consumers with industry-relevant and is committed to leadership role of fostering the value of the institutional goals through being the partner of choice for technology, innovation and values.</p></td>
        </tr>
        <tr>
          <td class="col-md-4"><b>Program Description</b></td>
          <td class="col-md-8"><p>The program is a study of the utilization of computers and computer software to plan, install, customize, operate, manage, administer and maintain information technology infrastructure.  It prepares students to be IT professionals well versed on application, installation, operation, development, maintenance and administration of IT hardware and software.</p></td>
        </tr>
        <tr>
          <td class="col-md-4"><b>Program Vision</b></td>
          <td class="col-md-8"><p>1.  Demonstrate professional Information Technology competence through:<br>
            <ul>
              <li>Building his/her expertise in a specific area in IT,</li>
              <li>Providing innovative IT services and solutions responsive to the sustainable development needs of his/her clients, and the community in general, aligned to Ethical principles.</li>
            </ul>
            2.  Exhibit capability to manage, lead, interact, motivate, encourage, influence and collaborate with a broad range of people (in diverse and multi-cultural environments) to achieve goals and effect positive changes, recognizing the individuality and diversity of needs, ideas, opinions and cultures; preferably at mid-management levels.<br>
            3.  Able to adapt to technological, organizational and societal changes by engaging actively in IT professional activities, learning and professional development opportunities.
            </p></td>
        </tr>
      </table>
      <?php
    }
    ?>
    
    
    <br>
    <br>
    <?php
    if ($department=='SHS' OR $department=='GEN') {
      
    }else{
      ?>
      <table border="solid" width="800">
        <tr bgcolor="#89C35C" id="color2">
          <td  align="center" colspan="3"><h4><b>PROGRAM GRADUATE OUTCOMES</b></h4></td>
        </tr>
        <tr>
          <th class="col-md-3"><b>Graduate Attributes</b></th>
          <th class="col-md-1"><b>Graduate Outcomes Code</b></th>
          <th class="col-md-8"><b>Graduate Outcomes</b></th>
        </tr>
        <?php $class->getprogram($depart); ?>
      </table>
      <?php
    }
    ?>
        
    <br>
    <br>
    <table border="solid" width="800">
      <tr bgcolor="#659EC7" id="color1">
        <td  align="center" colspan="2" class="col-md-12" style="width: 1000px;"><h4><b>COURSE INFORMATION</b></h4></td>
      </tr>
      <tr>
        <td class="col-md-4"><b>Course Name</b></td>
        <td class="col-md-8"><p><?php echo $subj_name; ?></p></td>
      </tr>
      <tr>
        <td class="col-md-4"><b>Course Code</b></td>
        <td class="col-md-8"><p><?php echo $subj_code; ?></p></td>
      </tr>
      <tr>
        <td class="col-md-4"><b>Pre-requisites / Co-requisites</b></td>
        <td class="col-md-8"><p><?php echo $pre_req; ?></p></td>
      </tr>
      <tr>
        <td class="col-md-4"><b>Course Description</b></td>
        <td class="col-md-8"><p><?php echo $subj_desc; ?></p></td>
      </tr>
      <tr>
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
      <?php $class->getdepsyllcheck3($syllabus_id); ?>
      <?php $class->ref($syllabus_id); ?>
      </tr>
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
        <b><?php echo strtoupper($name); ?></b><br/>
        <small>Faculty</small>
        </td>
        <td width="10%">Date:</td>
        <td width="15%"></td>
      </tr>
      <tr>
        <td width="25%">References verified by:</td>
        <td width="50%"><br/><b>LIBRARIAN</b>
          <br/><small>Librarian </small>
        </td>
        <td width="10%">Date:</td>
        <td width="15%"></td>
      </tr>
      <tr>
        <td width="25%">Reviewed by:</td>
        <td width="50%"><b><?php $class->checkdean($department); ?></b><br/>
        <?php
          if ($department=='ITE' OR $department=='CS') {
            $tit='Head, Information Technology Education Unit';
          }if ($department=='SHS' OR $department=='GEN') {
            $tit='Head, General Education Unit';
          }else{
            $tit='Head, Business Education Unit';
          }
          echo $tit;
        ?>
        <br/></td>
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
    <table border="solid" width="800">
       <!-- <tr>
        <td align="center" class="col-xs-6"><b>Main Author</b></td>
        <td align="center" class="col-xs-6"><b><?php echo $fullname_session; ?></b></td>
      </tr>
      <tr bgcolor="#FFCBA4" id="color3">
        <td align="center">Main Author</td>
        <td align="center">Co-Author</td>
      </tr> -->
      <?php $class->loadauthor($syllabus_id); ?>
    </table>
  </div>
    <div class="row">
      <div class="col-xs-9">
        <table width="800">
          <tr>
            <th class="col-xs-2">Date</th>
            <th class="col-xs-7">Remarks</th>
          </tr>
          <?php $class->loadsylrem($syllabus_id); ?>
        </table>
        <br>
        <textarea spellcheck='true' name='remark' placeholder='Remarks' style='width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;'></textarea>
        <?php $class->storedsyll($syllabus_id); ?>
      </div>
    </div>
  </div>
</body>
<style>
.createsyllabus .createsyllabustext {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 10px;
    visibility: hidden;
    width: 100px;
    background-color: #3c8dbc;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 60;
}
.editsyllabus .editsyllabustext {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 10px;
    visibility: hidden;
    width: 100px;
    background-color: #3c8dbc;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 60;
}

.createsyllabus:hover .createsyllabustext {
    visibility: visible;
}
.editsyllabus:hover .editsyllabustext {
    visibility: visible;
}
</style>
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
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
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</html>

