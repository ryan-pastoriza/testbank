<?php
include('header.php'); 
include 'class.php';
$class = new testbank();
?>
<style type="text/css">
  #alertsuccess1{
    position: absolute;
    top: 10px;
    margin-left: 100px;
    right: 20px;
    z-index: 999;
    
    opacity: 0.8;
  }
  #alertsuccess2{
    position: absolute;
    top: 10px;
    margin-left: 100px;
    right: 20px;
    z-index: 999;
    opacity: 0.8;
  }#alertsuccess3{
    position: absolute;
    top: 10px;
    margin-left: 100px;
    right: 20px;
    z-index: 999;
    opacity: 0.8;
  }
  #alertsuccess4{
    position: absolute;
    top: 10px;
    margin-left: 100px;
    right: 20px;
    z-index: 999;
    
    opacity: 0.8;
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
          <p><a><h4><?php echo $fullname_session.$login_id; ?></h4></a></p>
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
              <h3 class="box-title"><b>Syllabus</b></h3>
            </div>
            <div class="box-body table-responsive no-padding" style="overflow-y:scroll; overflow-x:hidden; height:450px;">
              <table class="table table-hover table-striped table-bordered" id="syllsub">
                <thead>
                  <tr>
                    <th>Subject</th>
                    <th>Subject Department</th>
                    <th>Year</th>
                    <th>Sem</th>
                    <th>Status</th>
                    <th>Create</th>
                    <th>Stored</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $class->loadsub($login_id); ?>
                </tbody>
              </table>
            </div>
            <div class="box-footer clearfix">
              <div class="row" style="float:right;">
                <div class="col-xs-12">
                  <button class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#addsub" ></button>
                </div>

                <div class="modal fade" id="addsub" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <div id="alertsuccess1" class="alert alert-success collapse">
                          <strong><h4 id="txt1"></h4></strong> 
                        </div>
                        <div id="alertsuccess2" class="alert alert-warning collapse">
                          <strong><h4 id="txt2"></h4></strong> 
                        </div>
                        <div id="alertsuccess3" class="alert alert-danger collapse">
                          <strong><h4 id="txt3"></h4></strong> 
                        </div>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><strong>Subjects</strong></h4>
                      </div>
                      <div class="modal-body">
                        
                        <div class="row">
                          <div class="col-xs-2">
                            <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">S.Y.</span>
                              <select class="form-control input-xs " name="subsy" id="subsy" onchange="getsub()" required>
                                <option value=""></option>
                                <?php
                                $y1=2017;
                                $y2=date("Y");
                                for ($i=$y2; $i >= $y1; $i--) { 
                                  $sy2=$i+1;
                                  $sy1=$i;
                                  $sy3=$sy1."-".$sy2;
                                  echo '<option value="'.$sy3.'">'.$sy3.'</option>';
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">Sem</span>
                              <select class="form-control input-xs " name="subsem" id="subsem" onchange="getsub()" required>
                                <option value=""></option>
                                <option value="1st">1st</option>
                                <option value="2nd">2nd</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-xs-4">
                            <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">Subject</span>
                              <select class="form-control input-xs " name="subject" id="subject" required>
                                <option value=""></option> 
                                <?php $class->getsub2(); ?>          
                              </select>
                            </div>
                          </div>
                          <div class="col-xs-2">
                            <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">Dep</span>
                              <select class="form-control input-xs " name="subdep" id="subdep" required>
                                <option value=""></option>
                                <option value="GEN">GEN-ED</option>
                                <option value="ITE">ITE</option>
                                <option value="BA">BA</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-xs-2">
                             <button type="button" class="btn btn-primary addsub" onclick="addsubject()">Add</button>
                          </div>
                        </div>
                        <br/>
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Subject</th>
                              <th>Department</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody id="tbsub">
                          </tbody>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <form action="createtq.php" method="get">
                          <button type="button" class="btn btn-default" data-dismiss="modal" style="width: 100px;" onclick="ref()">Close</button>
                        </form>
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
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
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
$('#syllsub').dataTable();
function addsubject(){
  var subj1 = $('#subject').val();
  var dep1 = $('#subdep').val();
  var sy = $('#subsy').val();
  var sem = $('#subsem').val();
  if ((subj1 == null || subj1 == undefined || subj1 == "") || (dep1 == null || dep1 == undefined || dep1 == "") || (sy == null || sy == undefined || sy == "") || (sem == null || sem == undefined || sem == "")) {
    alert1("Please fill the required data.")
  }else{
    var emp_id1=<?php echo $login_id;?>;
    $.ajax({
      type:"POST",
      url:"addsubj.php?p=addsub",
      data:{subj: subj1,dep: dep1, emp_id: emp_id1, sy: sy, sem: sem},
      success: function(data){
        getsub()
      }
    });
  };
    
}
function alert1(val){
  var msg= val;
  if (msg=="Deleted!") {
    $('#txt1').empty();
    $('#txt1').text(msg);
    $('#alertsuccess1').show('fade').delay(2000).fadeOut();;
    // $('.subph').attr('disabled',true);
  }else if (msg=="Please set the number of student.") {
    $('#txt2').empty();
    $('#txt2').text(msg);
    $('#alertsuccess2').show('fade').delay(2000).fadeOut();
  }else if (msg=="Delete Failed! Syllabus status approved.") {
    $('#txt3').empty();
    $('#txt3').text(msg);
    $('#alertsuccess3').show('fade').delay(2000).fadeOut();
  }else{
    $('#txt3').empty();
    $('#txt3').text(msg);
    $('#alertsuccess3').show('fade').delay(2000).fadeOut();
  };
  
}
function getsub(){
  var sy = $('#subsy').val();
  var sem = $('#subsem').val();
  $('.subdata').remove();
  var emp_id=<?php echo $login_id;?>;
  $.ajax({
    type:"POST",
    url:"addsubj.php?p=getsub",
    data:{emp_id: emp_id, sy: sy, sem: sem},
    success: function(data){
      var id;
      var msg;
      var count;
      var department;
      var obj = $.parseJSON(data);
      $.each(obj, function(key , value) {
        var id=this['id'];
        count=this['count'];
        department=this['department'];
        $.each(value.msg , function(k , v ){ 
          if (!(v=='No subject found' || v=='Error Database')) {
            $("#tbsub").append('<tr class="subdata"><td>'+ v+'</td><td>'+department[k]+'</td><td><button type="button" onclick="delsub('+id[k]+')" class="btn btn-danger btn-xs glyphicon glyphicon-trash" ></button></td></tr>');
          }else{
            $("#tbsub").append('<tr class="subdata"><td>'+ v+'</td><td></td><td></td></tr>');
          };
            
        });
      });
      if (count>9) {
        $('.addsub').hide('fade');
      }else{
        $('.addsub').show('fade');
      };
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
      url:"addsubj.php?p=deletesub",
      data:"del="+delete_id,
      success: function(data){
      var msg;
      var obj = $.parseJSON(data);
      $.each(obj, function(key , value) {
        var msg=this['msg'];
        $.each(value.msg , function(k , v ){ 
          if(v=="Deleted!" || v=="Delete Failed! Syllabus status approved."){
            alert1(v)
          };
        });
      });
        getsub()
      }
    });
}
</script>
</html>
