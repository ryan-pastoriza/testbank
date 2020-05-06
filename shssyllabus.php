<?php
include('header.php'); 
include 'class.php';
$class = new testbank();
if ( !empty ( $_GET ) ) {
  $shs_tq_id=$_GET['shs_tq_id'];
  $shs_syll_id=$_GET['shs_syll_id'];
  $sq=mysql_query("SELECT shs_subject.shs_subj_id, shs_subject.shs_subj_name, school_year.sy, shs_subject.shs_subj_code, shs_subject.shs_lec_unit, shs_subject.shs_lab_unit, shs_subject.shs_pre_requisite, shs_subject.shs_subj_desc FROM shs_syll INNER JOIN shs_tq ON shs_tq.shs_syll_id = shs_syll.shs_syll_id INNER JOIN shs_subject ON shs_syll.shs_subj_id = shs_subject.shs_subj_id INNER JOIN school_year ON school_year.sy_id = shs_syll.sy_id WHERE shs_tq.shs_tq_id = '".$shs_tq_id."' AND shs_syll.shs_syll_id = '".$shs_syll_id."'");
    if (mysql_num_rows($sq)==0) {

    }else{
        while ($rows=mysql_fetch_array($sq)) {
            $shs_subj_id=$rows['shs_subj_id'];
            $shs_subj_name=$rows['shs_subj_name'];
            $sy=$rows['sy'];
            $shs_subj_code=$rows['shs_subj_code'];
            $shs_lec_unit=$rows['shs_lec_unit'];
            $shs_lab_unit=$rows['shs_lab_unit'];
            $unit=$shs_lec_unit+$shs_lab_unit;
            $shs_pre_requisite=$rows['shs_pre_requisite'];
            $shs_subj_desc=$rows['shs_subj_desc'];
        }
    }
  }
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php
  include('headernotification.php');
  ?>
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
      <?php include 'sidebar.php'; ?>
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
        <section class="col-lg-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><b>Syllabus in <?php echo $shs_subj_name; ?></b></h3>
            </div>
            <div class="box-body table-responsive no-padding" style="overflow-y:scroll; overflow-x:hidden; height:800px;">
              <div  id="printableArea">
  <!-- style="display:none" -->
    <table border="solid" width="800">
      <tr>
        <td class="col-md-2" width="100"><img src="img/syllogo.png"></td>
        <td class="col-md-10" align="center" colspan="3"><?php
          echo "SHS Departmentment"; 
        ?></td>
      </tr>
      <tr>
        <td class="col-md-2">SY <?php echo $sy; ?></td>
        <td class="col-md-2" rowspan="2">Revision<br/> Date: </td>
        <td class="col-md-6" rowspan="2">Syllabus<br/> Version: </td>
        <td class="col-md-2" rowspan="2">QMS Document<br/> Code:  </td>
      </tr>
      <tr>
        <td class="col-md-2">Effectivity:  </td>
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
    
    <br>
    <table border="solid" width="800">
      <tr bgcolor="#659EC7" id="color1">
        <td  align="center" colspan="3" class="col-md-12" style="width: 1000px;"><h4><b>COURSE INFORMATION</b></h4></td>
      </tr>
      <tr>
        <td class="col-md-4"><b>Course Name</b></td>
        <td class="col-md-8"><p><?php echo $shs_subj_name; ?></p></td>
      </tr>
      <tr>
        <td class="col-md-4"><b>Course Code</b></td>
        <td class="col-md-8"><p><?php echo $shs_subj_code; ?></p></td>
      </tr>
      <tr>
        <td class="col-md-4"><b>Course Unit</b></td>
        <td class="col-md-8"><p><?php echo $unit; ?></p></td>
      </tr>
      <tr>
        <td class="col-md-4"><b>Pre-requisites / Co-requisites</b></td>
        <td class="col-md-8"><p><?php echo $shs_pre_requisite; ?></p></td>
      </tr>
      <tr>
        <td class="col-md-4"><b>Course Description</b></td>
        <td class="col-md-8"><p><?php echo $shs_subj_desc; ?></p></td>
      </tr>
    </table>
    <br>
    <table border="solid" width="800">
      <tr>
        <td colspan="6"><h4><b>Contact Hours</b></h4></td>
      </tr>
      <tr bgcolor="#89C35C" id="color2">
        <th class="col-xs-1">Week No.</th>
        <th class="col-xs-3">Topics</th>
        <th class="col-xs-2">Intended Learning Outcomes</th>
        <th class="col-xs-2">Teaching and Learning Activities</th>
        <th class="col-xs-2">Resources</th>
        <th class="col-xs-2">Outcomes-Based Assessment</th>
      </tr>
      <?php  $class->shsloadweek($shs_subj_id); ?>
      
    </table>
    <br>
    
    <br>
    <table border="solid" width="800">
      <tr bgcolor="#659EC7" id="color1">
        <td  class="col-xs-12" align="center" colspan="3"><h4><b>Authority on Issuance</b></h4></td>
      </tr>
      <tr bgcolor="#89C35C" id="color2" >
        <td class="col-xs-4">Prepared by:</td>
        <td class="col-xs-4">Checked by:</td>
        <td class="col-xs-4">Approved:</td>
      </tr>
      <tr>
        <td align="center" height="70" valign="Bottom"><b><?php echo strtoupper($fullname_session); ?></b></td>
        <td align="center" height="70" valign="Bottom"><b><?php $class->checkdean("GEN"); ?></b></td>
        <td align="center" height="70" valign="Bottom"><b>ALAN L. ATEGA, MBA</b></td>
      </tr>
      <tr bgcolor="#FFCBA4" id="color3">
        <td align="center">Faculty Member</td>
        <td align="center">
        <?php
            $dep1='OIC-Dean, General Education Department';
            echo $dep1; 
        ?>
        </td>
        <td align="center">School Director</td>
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
    </table>
  </div>
  <div class="box-footer clearfix">
                      <div class="row">
                        <div class="col-xs-12">
                          <button type="button" class="pull-right btn btn-primary" id="print" onclick="printDiv('printableArea')" style="width:85px;">
                          <i class="fa fa-print"></i> Print </button>
                        </div>
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
<style>
.createsyllabus .createsyllabustext {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 10px;
    visibility: hidden;
    width: 50px;
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
    width: 50px;
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
<script type="text/javascript">
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</html>
