<?php
include('header.php'); 
include 'class.php';
$class = new testbank();
?>
<style type="text/css">
  #alertsuccess{
    position: absolute;
    top: 10px;
    margin-left: 1000px;
    right: 20px;
    float: left;
    width: 200px;
    z-index: 999;
  }
  #alertsuccess2{
    position: absolute;
    top: 10px;
    margin-left: 1000px;
    right: 20px;
    float: left;
    width: 200px;
    z-index: 999;
  }
  #alerterror{
    position: absolute;
    top: 10px;
    margin-left: 1000px;
    right: 20px;
    float: left;
    width: 200px;
    z-index: 999;
  }
  #alertdelete{
    position: absolute;
    top: 10px;
    margin-left: 1000px;
    right: 20px;
    float: left;
    width: 200px;
    z-index: 999;
  }
</style>
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
              <h3 class="box-title"><b>SHS</b></h3>
            </div>
            <div class="box-body table-responsive no-padding" style="overflow-y:scroll; overflow-x:hidden; height:450px;">
              <div id="alertsuccess" class="alert alert-success collapse">
                <strong><h4>Successfully Saved!</h4></strong> 
              </div>
              <div id="alertsuccess2" class="alert alert-success collapse">
                <strong><h4>Updated!</h4></strong> 
              </div>
              <div id="alerterror" class="alert alert-warning collapse">
                <strong><h4>Please fill-up the required data</h4></strong> 
              </div>
              <div id="alertdelete" class="alert alert-success collapse">
                <strong><h4>Deleted!</h4></strong> 
              </div>
              <form method="POST" enctype="multipart/form-data">
                <div class="col-xs-12">
                  <div class="row">
                    <div class="col-xs-4">
                      <label>Subject</label>
                      <select class="form-control form-control-sm shssub" id="shssub" name="shssub" onchange="loadtopic()" required>
                        <option></option>
                        <?php  
                          $sql=mysql_query("SELECT shs_subject.shs_subj_code, shs_subject.shs_subj_name, shs_subject.shs_subj_desc, shs_subject.shs_lec_unit, shs_subject.shs_lab_unit, shs_subject.shs_pre_requisite, shs_subject.shs_subj_id FROM shs_subject ORDER BY shs_subject.shs_subj_name ASC");
                          while ($row=mysql_fetch_array($sql)) {
                            echo"<option value='".$row['shs_subj_id']."'>".$row['shs_subj_name']."</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="col-xs-2">
                      <label>Period</label>
                      <select class="form-control form-control-sm period" id="period" name="period" required>
                        <option></option>
                        <?php  
                          $sql1=mysql_query("SELECT major_exams.exam_id, major_exams.exam_period FROM major_exams WHERE major_exams.exam_period LIKE '%QUARTER'");
                          while ($row1=mysql_fetch_array($sql1)) {
                            if ($row1['exam_id']=="9" OR $row1['exam_id']=="10") {
                              $sems = "1st Sem";
                            }else{
                              $sems = "2nd Sem";
                            }
                            echo"<option value='".$row1['exam_id']."'>".$row1['exam_period']." (".$sems.")</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <div class="col-xs-6">
                      <label>Topic</label>
                      <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Topic</span>
                        <input type="text" name="topic" list="exampleList" id="topic" class="form-control form-control-sm topic" required>   
                        <span class="input-group-addon multicount" id="basic-addon1"><a href="#" onclick="addtopic()" ><i id="1" class="glyphicon glyphicon-floppy-disk"></i></a></span>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
              <table class="table table-hover table-striped table-bordered" id="weektb" >
                <thead>
                  <tr>
                    <th width="60%">Topic</th>
                    <th width="20%">Period</th>
                    <th width="20%">Action</th>
                  </tr>
                </thead>
                <tbody id="tabletopic">
                  
                </tbody>
              </table>
              <div class="modal fade bd-example-modal-xs" id="openmodal" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
                <div class="modal-dialog modal-xs" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <input type="hidden" id="topicid2" name="topicid2">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel"><strong>Edit Topic</strong></h4>
                    </div>
                    <input type="hidden" name="weekid" id="weekid">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-xs-4">
                          <label>Period</label>
                          <select class="form-control form-control-sm period2" id="period2" name="period" required>
                            <option></option>
                            <?php  
                              $sql1=mysql_query("SELECT major_exams.exam_id, major_exams.exam_period FROM major_exams WHERE major_exams.exam_period LIKE '%QUARTER'");
                              while ($row1=mysql_fetch_array($sql1)) {
                                echo"<option value='".$row1['exam_id']."'>".$row1['exam_period']."</option>";
                              }
                            ?>
                          </select>
                        </div>
                        <div class="col-xs-8">
                          <label>Topic</label>
                          <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">Topic</span>
                            <input type="text" name="topic2" list="exampleList" id="topic2" class="form-control form-control-sm topic2" required>   
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" onclick="update()" data-dismiss="modal" class="btn btn-primary">Save</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer clearfix">
              
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
<script>

function addsubject(){
  var subj1 = $('#subject').val();
  var emp_id1=<?php echo $user_id;?>;
  var qname = $('#quizname').val();
  if (qname=="") {
    qname="quiz";
  };
  $.ajax({
    type:"POST",
    url:"quizphp.php?p=addsub",
    data:{subj: subj1, emp_id: emp_id1, qname: qname},
    success: function(data){
      getsub()
    }
  });
}
function getsub(){
  $('.subdata').remove();
  var emp_id=<?php echo $user_id;?>;
  $.ajax({
    type:"POST",
    url:"quizphp.php?p=getsub",
    data:"emp_id="+emp_id,
    success: function(data){
      var id;
      var msg;
      var qname;
      var obj = $.parseJSON(data);
      $.each(obj, function(key , value) {
        qname=this['qname'];
        id=this['id'];
        $.each(value.msg , function(k , v ){ 
          if (!(v=='No subject found' || v=='Error Database')) {
            $("#tbsub").append('<tr class="subdata"><td>'+ v+'</td><td>'+qname[k]+'</td><td><button type="button" onclick="delsub('+id[k]+')" class="btn btn-danger btn-xs glyphicon glyphicon-trash" ></button></td></tr>');
          }else{
            $("#tbsub").append('<tr class="subdata"><td>'+ v+'</td><td></td></tr>');
          };
            
        });
      });
      
    }
  });
}
function ref(){
  window.location.reload();
}
function delsub(val){
  var delete_id = val;
    $.ajax({
      type:"GET",
      url:"quizphp.php?p=deletesub",
      data:"del="+delete_id,
      success: function(data){
      var msg;
      var obj = $.parseJSON(data);
      $.each(obj, function(key , value) {
        var msg=this['msg'];
        $.each(value.msg , function(k , v ){ 
          if(v=="Deleted!" || v=="Delete Failed! Syllabus status approved."){
          };
        });
      });
        getsub()
      }
    });
}
function loadtopic(){
  $(".tabletop").remove();
  var sid = $('.shssub').val();
   $.ajax({
      type:"POST",
      url:"shsphp.php?p=loadtopic",
      data:"sid="+sid,
      success: function(data){
        var topics_id;
        var topic_description;
        var exam_period;
        var exam_id;
        var subj_id;
        var obj =  $.parseJSON(data);
        $.each(obj, function(key , value){
          topics_id=this['topics_id'];
          exam_id=this['exam_id'];
          exam_period=this['exam_period'];
          topic_description=this['topic_description'];
          subj_id=this['subj_id'];
        });
        $.each(topics_id , function(k , v ){ 
            $('#tabletopic').append('<tr class="tabletop"><td>'+topic_description[k]+'</td><td>'+exam_period[k]+'</td><td><button type="button" onclick="openmodal('+topics_id[k]+','+subj_id[k]+')" class="btn btn-warning btn-xs glyphicon glyphicon-edit topicedit"></button>  <button type="button" class="btn btn-danger btn-xs glyphicon glyphicon-trash topicdelete" data-toggle="modal" data-target="#deletetopic'+topics_id[k]+'"></button><div class="modal fade" id="deletetopic'+topics_id[k]+'" tabindex="-1" role="dialog" aria-labelledby="addnewLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel"><strong>Warning</strong></h4></div><div class="modal-body">Are you sure you want to delete this topic?<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">No</button><button type="button" onclick="deletetopic('+topics_id[k]+','+subj_id[k]+')" data-dismiss="modal"  class="btn btn-primary">Yes</button></div></div></div></div></div></td></tr>'); 
        });

      }
    });
}
function addtopic(){
  var sid = $('.shssub').val();
  var period = $('.period').val();
  var topic = $('.topic').val();
  if (sid === 'undefined' || period === 'undefined' || topic === 'undefined' || sid === '' || period === '' || topic === ''){
    $('#alerterror').show('fade').delay(1000).fadeOut();
  }else{
    $.ajax({
      type:"POST",
      url:"shsphp.php?p=addtopic",
      data:{sid: sid, topic: topic, period: period},
      success: function(data){
        $('#alertsuccess').show('fade').delay(1000).fadeOut();
        $('.period').val("");
        $('.topic').val("");
        loadtopic()
      }
    });
  }
}
function deletetopic(str,str2){
    var subid = str2;
    var delete_id = str;
    $.ajax({
      type:"GET",
      url:"shsphp.php?p=deletetopic",
      data:{subid: subid, del: delete_id},
      success: function(data){
        $('.modal-backdrop').remove()
        var obj = $.parseJSON(data);
        var msg;
        $.each(obj, function() {
          msg=this['msg'];
        });
        $('#alertdelete').show('fade').delay(1000).fadeOut();
        loadtopic()
      }
    });
}
function openmodal(id,sub){
  var topicid = id;
  var subid = sub;
  $(".delsub").remove();
  subtopics=1;
  $.ajax({
    type: "POST",
    url: "shsphp.php?p=openmodal",
    data:{topicid: topicid, subid: subid},
    success: function(data){
      var topics_id;
      var topic_description;
      var exam_period;
      var exam_id;
      var subj_id;
      var obj =  $.parseJSON(data);
      $.each(obj, function(key , value){
        topics_id=this['topics_id'];
        exam_id=this['exam_id'];
        exam_period=this['exam_period'];
        topic_description=this['topic_description'];
        subj_id=this['subj_id'];
      });
      $('#period2').val(exam_id);
      $('#topic2').val(topic_description);
      $('#topicid2').val(topics_id);
      $('#openmodal').modal('show'); 
    }
  });
}
function update(){
  var period2 = $('#period2').val();
  console.log(period2)
  var topic2 = $('#topic2').val();
  var topicid2 = $('#topicid2').val();
    $.ajax({
      type:"POST",
      url:"shsphp.php?p=updatetopic",
      data:{period: period2, topic: topic2, topicid: topicid2},
      success: function(data){
        var obj = $.parseJSON(data);
        var msg;
        $.each(obj, function() {
          msg=this['msg'];
        });
        if (msg=="updated") {
          $('#alertsuccess2').show('fade').delay(1000).fadeOut();
        };
        loadtopic()
      }
    });
}
</script>
</html>
