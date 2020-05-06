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
              <h3 class="box-title"><b>Quiz</b></h3>
            </div>
            <div class="nav-tabs-custom">
                <ul class="nav nav-pills">
                  <li class="nav-item active"><a href="#a" class="nav-link" data-toggle="tab">College</a></li>
                  <li class="nav-item"><a href="#b" class="nav-link" data-toggle="tab">SHS</a></li>
                </ul>
                <div class="tab-content " id="testtable">
                  <div class=" active tab-pane box-primary" id="a" style="height:500px;">
                    <div class="box-body table-responsive no-padding" style="overflow-y:scroll; overflow-x:hidden; height:450px;">
                      <table class="table table-hover">
                        <thead>
                          <th>Subject</th>
                          <th>Quiz Direction</th>
                          <th>Date</th>
                          <th>Action</th>
                        </thead>
                        <tbody>
                          <?php $class->loadquiz($user_id); ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="box-footer clearfix">
                      <div class="row" style="float:right;">
                        <div class="col-xs-12">
                          <button class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#addsub" onclick="getsub()"></button>
                        </div>

                        <div class="modal fade" id="addsub" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><strong>Subjects</strong></h4>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-xs-12">
                                    <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1">Quiz Directon</span>
                                      <input type="text" id="quizname" name="quizname" class="form-control quizname" placeholder="Enter quiz directon" aria-describedby="basic-addon1">
                                    </div>
                                  </div>
                                </div>
                                <br/>
                                <div class="row">
                                  <div class="col-xs-11">
                                    <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1">Subject</span>
                                      <select class="form-control input-xs " name="sy" id="subject" required>
                                        <option value=""></option> 
                                        <?php $class->getsub2(); ?>          
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-xs-1">
                                     <button type="button" class="btn btn-primary" onclick="addsubject()">Add</button>
                                  </div>
                                </div>
                                <br/>
                                <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th>Subject</th>
                                      <th>Quiz Direction</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody id="tbsub">
                                  </tbody>
                                </table>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal" style="width: 100px;" onclick="ref()">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane box-primary" id="b" style="height:500px;">
                    <div class="box-body table-responsive no-padding" style="overflow-y:scroll; overflow-x:hidden; height:450px;">
                      <table class="table table-hover">
                        <thead>
                          <th>Subject</th>
                          <th>Quiz Direction</th>
                          <th>Date</th>
                          <th>Action</th>
                        </thead>
                        <tbody id="shstbsub1">
                          
                        </tbody>
                      </table>
                    </div>
                    <div class="box-footer clearfix">
                      <div class="row" style="float:right;">
                        <div class="col-xs-12">
                          <button class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#shsaddsub" onclick="shsgetsub()"></button>
                        </div>

                        <div class="modal fade" id="shsaddsub" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><strong>Subjects</strong></h4>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-xs-12">
                                    <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1">Quiz Directon</span>
                                      <input type="text" id="shsquizname" name="shsquizname" class="form-control shsquizname" placeholder="Enter quiz directon" aria-describedby="basic-addon1">
                                    </div>
                                  </div>
                                </div>
                                <br/>
                                <div class="row">
                                  <div class="col-xs-11">
                                    <div class="input-group">
                                      <span class="input-group-addon" id="basic-addon1">Subject</span>
                                      <select class="form-control input-xs " name="sy" id="shssubject" required>
                                        <option value=""></option> 
                                        <?php $class->shsgetsub2(); ?>          
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-xs-1">
                                     <button type="button" class="btn btn-primary" onclick="shsaddsubject()">Add</button>
                                  </div>
                                </div>
                                <br/>
                                <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th>Subject</th>
                                      <th>Quiz Direction</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody id="shstbsub">
                                  </tbody>
                                </table>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal" style="width: 100px;" onclick="shsref()">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
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
function shsaddsubject(){
  var subj1 = $('#shssubject').val();
  var emp_id1=<?php echo $user_id;?>;
  var qname = $('#shsquizname').val();
  if (qname=="") {
    qname="quiz";
  };
  $.ajax({
    type:"POST",
    url:"quizphp.php?p=shsaddsub",
    data:{subj: subj1, emp_id: emp_id1, qname: qname},
    success: function(data){
      shsref()
      shsgetsub()
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
function shsgetsub(){
  $('.subdata').remove();
  var emp_id=<?php echo $user_id;?>;
  $.ajax({
    type:"POST",
    url:"quizphp.php?p=shsgetsub",
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
            $("#shstbsub").append('<tr class="subdata"><td>'+ v+'</td><td>'+qname[k]+'</td><td><button type="button" onclick="shsdelsub('+id[k]+')" class="btn btn-danger btn-xs glyphicon glyphicon-trash" ></button></td></tr>');
          }else{
            $("#shstbsub").append('<tr class="subdata"><td>'+ v+'</td><td></td></tr>');
          };
            
        });
      });
      
    }
  });
}
$( window ).load(function() {
  shsref()
});
function ref(){
  window.location.reload();
}
function shsref(){
  $('.subdata1').remove();
  var emp_id=<?php echo $user_id;?>;
  $.ajax({
    type:"POST",
    url:"quizphp.php?p=shsgetsub2",
    data:"emp_id="+emp_id,
    success: function(data){
      var quiz_id;
      var subj_id;
      var subj_name;
      var quiz_name;
      var q_date;
      var obj = $.parseJSON(data);
      $.each(obj, function(key , value) {
        quiz_id=this['quiz_id'];
        subj_id=this['subj_id'];
        subj_name=this['subj_name'];
        quiz_name=this['quiz_name'];
        q_date=this['q_date'];
        $.each(value.subj_name , function(k , v ){ 
          if (!(v=='No subject found' || v=='Error Database')) {

            $("#shstbsub1").append('<tr class="subdata1"><td class="col-lg-3">'+subj_name[k]+'</td><td class="col-lg-3">'+quiz_name[k]+'</td><td class="col-lg-3">'+q_date[k]+'</td><td class="col-lg-3"><form action="shscreatequiz.php" method="get" ><input type="hidden" name="quiz_id" class="form-control" value="'+quiz_id[k]+'"><input type="hidden" name="subj_id" class="form-control" value="'+subj_id[k]+'"><input type="hidden" name="subj_name" class="form-control" value="'+subj_name[k]+'"><input type="hidden" name="quiz_name" class="form-control" value="'+quiz_name[k]+'"><input type="hidden" name="q_date" class="form-control" value="'+q_date[k]+'"><button type="submit" class="btn btn-default" name="create"><a><i class="glyphicon glyphicon-pencil createsyllabus"><span class="createsyllabustext">Create <br>Quiz</span></i></a></button></form></td></tr>');
          };
        });
      });
      
    }
  });
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
function shsdelsub(val){
  var delete_id = val;
    $.ajax({
      type:"GET",
      url:"quizphp.php?p=shsdeletesub",
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
        shsref()
        shsgetsub()
      }
    });
}
</script>
</html>
