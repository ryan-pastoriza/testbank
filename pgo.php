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
      <?php include 'sidebar.php'; ?>
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content">
      <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="nav-tabs-custom">
                <ul class="nav nav-pills">
                  <li class="nav-item active"><a href="#a" class="nav-link" data-toggle="tab"><strong>Program Graduate Outcomes</strong></a></li>
                  <li class="nav-item"><a href="#b" class="nav-link" data-toggle="tab"><strong>Program Information</strong></a></li>
                </ul>
              <div class="tab-content " id="testtable">

                <div class="active tab-pane box-primary" id="a" style="height:500px;">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="box-body" style="height:450px;">
                        <div class="row">
                          <div class="col-lg-12" >
                            <table class="table table-hover table-striped table-bordered" id="cpgo">
                              <thead>
                                <tr>
                                  <th width="20">ID</th>
                                  <th width="20">Attributes</th>
                                  <th width="20">PG Code</th>
                                  <th>Program Graduate Outcomes</th>
                                  <th >School Year</th>
                                  <th >Date</th>
                                  <th width="20">Revise</th>
                                  <th width="20">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $class->getpgo($depart); ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="box-footer clearfix">
                    <button class="pull-right btn btn-primary" data-toggle="modal" data-target="#addnew">New PGO</button>
                  </div>
                  <div class="modal fade bd-example-modal-lg" id="addnew" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel"><strong>New PGO</strong></h4>
                        </div>
                        <div class="modal-body">
                          <form>
                            <div class="form-group">
                              <div class="col-xs-4">
                                <label for="pga">Program Graduate Attributes</label>
                                <input type="text" class="form-control" id="pga" placeholder="Attributes" name="pgan">
                              </div>
                              <div class="col-xs-4">
                                <label for="pgc">Program Graduate Code</label>
                                <input type="text" class="form-control" id="pgc" placeholder="Code" name="pgcn">
                              </div>
                              <div class="col-xs-4">
                                <label for="course">School Year</label>
                                <input type="text" class="form-control" id="pgoyear" placeholder="School Year">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-xs-12">
                                <label for="pgo">Program Graduate Outcomes</label>
                                <textarea rows="1" style="width: 845px; resize: vertical;" class="form-control" id="pgo" placeholder="Outcomes"  name="pgon"></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="col-xs-12">
                                <label for="course">IGO</label>
                                <?php $class->getpgodata(); ?>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="button" onclick="save()" data-dismiss="modal" class="btn btn-primary">Save</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane box-primary" id="b" >
                  <div id="alertsuccess1" class="alert alert-success collapse">
                    <strong><h4 id="txt1"></h4></strong> 
                  </div>
                  <div id="alertsuccess2" class="alert alert-warning collapse">
                    <strong><h4 id="txt2"></h4></strong> 
                  </div>
                  <div id="alertsuccess3" class="alert alert-danger collapse">
                    <strong><h4 id="txt3"></h4></strong> 
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <br/>
                      <label>Program Vision</label>
                      <textarea rows="2" class="form-control" placeholder="Enter Program Vision" style=" max-width: 100%;" id="pv"></textarea>
                    </div>
                    <div class="col-lg-12">
                      <br/>
                      <label>Program Mission</label>
                      <textarea rows="2" class="form-control" placeholder="Enter Program Mission" style=" max-width: 100%;" id="pm"></textarea>
                    </div>
                    <?php
                      if ($depart!="BA") {
                    ?>
                    <div class="col-lg-12">
                      <br/>
                      <label>Program Description</label>
                      <textarea rows="2" class="form-control" placeholder="Enter Program Description" style=" max-width: 100%;" id="pd"></textarea>
                    </div>
                    <?php
                      }
                    ?>
                    <div class="col-lg-12">
                      <br/>
                      <button type="button"  class="btn pull-right btn-primary" onclick="savepi()">Save</button>
                    </div>
                    <div class="col-lg-12">
                      <br/>
                      <label>Program Educational Objectives</label>
                    </div>
                    <table class="table table-hover table-striped table-bordered" id="ob">
                      <thead>
                        <tr>
                          <th width="90%">Objectives</th>
                          <th width="10%">Action</th>
                        </tr>
                      </thead>
                      <tbody id="peo">
                      </tbody>
                    </table>
                  </div>
                  <div class="box-footer clearfix">
                    <button class="pull-right btn btn-primary glyphicon glyphicon-edit" id="editobj" onclick="loadobj()" data-toggle="modal" data-target="#addnewob"></button>
                  </div>
                  <div class="modal fade bd-example-modal-lg" id="addnewob" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel"><strong>Objectives</strong></h4>
                        </div>
                        <form>
                          <div class="modal-body">
                            <div class="form-group">
                              <div class="col-xs-12">
                                <label for="pgc">Objectives</label>
                                <textarea rows="1" style="width: 100%; resize: vertical;" class="form-control" id="objectives" placeholder="Enter Objective"  name="obj"></textarea>
                              </div>
                            </div>
                            <br/>
                            <br/>
                            <br/>
                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" data-dismiss="modal" onclick="saveob()" class="btn btn-primary">Save</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  
                </div>
      </div>
    </section>
  </div>
<?php
include('footer.php'); 
?>
</body>
</html>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>

<script>
$(document).ready(function () {
    showData();
    $('#cpgo').dataTable();
});
function showData() {
  var numItems = $('.tbob').length;
  if (numItems>0) {
    for (var i = numItems; i > 0; i--) {
      $('#tbob'+i).remove();
    };
  };
  var id = "<?php echo $user_id; ?>";
  var dep = "<?php echo $depart; ?>";
  $.ajax({
    type: "Post",
    url: "pgo_crud.php?p=read",
    data: {id: id, dep: dep},
    success: function(data) { 
          var pv;
          var pm;
          var pd;
          var obj1
          var id
          var obj = $.parseJSON(data);
          $.each(obj, function(key , value) {
            pv=this['pv'];
            pm=this['pm'];
            pd=this['pd'];
            id=this['d'];
            obj1=this['obj'];

            $.each(obj1 , function(k , v ) {
              if (v=="No data") {
              }else{
                t=k;
                t++;
                $('#peo').append('<tr id="tbob'+t+'" class="tbob"><td>'+v+'</td><td><button type="button" class="btn btn-danger btn-xs glyphicon glyphicon-trash objdelete" data-toggle="modal" data-target="#deleteobj'+id[k]+'"></button><div class="modal fade" id="deleteobj'+id[k]+'" tabindex="-1" role="dialog" aria-labelledby="addnewLabel"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title" id="myModalLabel"><strong>Warning</strong></h4></div><div class="modal-body"><form>Are you sure you want to delete this Objective?<div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">No</button><button type="button" onclick="deleteobj('+id[k]+')" data-dismiss="modal" class="btn btn-primary">Yes</button></div></form></div></div></div></div></td></tr>');
              };
                
              });
          });
          $("#pv").val(pv);
          $("#pm").val(pm);
          $("#pd").val(pd);
          if (pv=="No data") {
            $('#editobj').hide();
          }else{
            $('#editobj').show();
          };
          
  $('#ob').dataTable();
    }
  }); 
}
  function saveob(){
    var dep = "<?php echo $depart;?>";
    var ob = $('#objectives').val();
    if (ob=="") {
      alert1("Please fill up the required data")
    }else{
      
      $.ajax({
        type:"POST",
        url:"pgo_crud.php?p=saveob",
        data:{dep: dep, ob: ob},
        success: function(data){
          var obj = $.parseJSON(data); 
          var msg;
          $.each(obj, function() {
            msg=this['msg'];
          });
          alert1(msg)
          showData()
        }
      });
    };
    
    
  }
  function loadobj(){
    $("#objectives").val("");
    // var numItems = $('.obop').length;
    // if (numItems>0) {
    //   for (var i = numItems; i > 0; i--) {
    //     $('#obop'+i).remove();
    //   };
    // };  
    // $("#objectives").val("");
    // var dep = "<?php echo $depart;?>";
    // $.ajax({
    //   type:"POST",
    //   url:"pgo_crud.php?p=loadobj",
    //   data:"dep="+dep,
    //   success: function(data){
    //     var obj = $.parseJSON(data); 
    //     var num;
    //     $.each(obj, function() {
    //       num=this['num'];
    //     });
    //     num++;
    //     for (var i = 1; i <= num; i++) {
    //       $("#num1").append("<option class='obop' id='obop"+i+"' value='"+i+"'>"+i+"</option>");
    //     };
    //   }
    // });
  }
  // function loadob(val){
  //   var dep = "<?php echo $depart;?>";
  //   var num = val.value;
  //   $.ajax({
  //     type:"POST",
  //     url:"pgo_crud.php?p=loadob",
  //     data:{dep: dep, num: num},
  //     success: function(data){
  //       var obj = $.parseJSON(data); 
  //       var ob;
  //       $.each(obj, function() {
  //         ob=this['ob'];
  //       });
  //       $("#objectives").val(ob);
  //     }
  //   });
  // }
  function savepi(){
    var id = "<?php echo $user_id;?>";
    var dep = "<?php echo $depart;?>";
    var pv = $('#pv').val();
    var pm = $('#pm').val();
    var pd = $('#pd').val();
    if (pd === undefined || pd === null){
      pd="none";
    };

    $.ajax({
      type:"POST",
      url:"pgo_crud.php?p=savepi",
      data:{id: id,dep: dep, pv: pv, pm: pm, pd: pd},
      success: function(data){
        var obj = $.parseJSON(data); 
        var msg;
        $.each(obj, function() {
          msg=this['msg'];
        });
        alert1(msg)
        showData()
      }
    });
  }
  function alert1(val){
    var msg= val;
    if (msg=="Saved!" || msg=="Updated!" || msg=="Deleted!") {
      $('#txt1').empty();
      $('#txt1').text(msg);
      $('#alertsuccess1').show('fade').delay(2000).fadeOut();
    }else if (msg=="Please set the number of student." || msg=="Please fill up the required data") {
      $('#txt2').empty();
      $('#txt2').text(msg);
      $('#alertsuccess2').show('fade').delay(2000).fadeOut();
    }else{
      $('#txt3').empty();
      $('#txt3').text(msg);
      $('#alertsuccess3').show('fade').delay(2000).fadeOut();
    };
    
  }
  function deleteobj(var1){
    var id = var1;
    $.ajax({
      type:"POST",
      url:"pgo_crud.php?p=deleteobj",
      data:"id="+id,
      success: function(data){
        var obj = $.parseJSON(data); 
        var msg;
        $.each(obj, function() {
          msg=this['msg'];
        });
        $('.modal-backdrop').remove()
        alert1(msg)
        showData()
      }
    });
  }
  function save() {
    var igoval = [];
    $('.checkb:checked').each(function(i){
      igoval[i] = $(this).val();
    });
    var id = "<?php echo $user_id;?>";
    var course = "<?php echo $depart;?>";
    var pga = $('#pga').val();
    var pgc = $('#pgc').val();
    var pgo = $('#pgo').val();
    var year = $('#pgoyear').val();
    $.ajax({
      type:"POST",
      url:"pgo_crud.php?p=createpgo",
      data:{id1: id, course1: course, pga1: pga, pgc1: pgc, pgo1: pgo, year1: year, igoval1: igoval},
      success: function(data){
        $('.modal-backdrop').remove()
        $("#pga").val("");
        $("#pgc").val("");
        $("#pgo").val("");
        $("#pgoyear").val("");
        location.reload();
      }
    });
  }
  function updatepgo(str) {
    var igoval = [];
    $('.checkb'+str+':checked').each(function(i){
      igoval[i] = $(this).val();
    });
    var update_id = str;
    var id = "<?php echo $user_id;?>";
    var uppga = $('#uppga'+str).val();
    var uppgc = $('#uppgc'+str).val();
    var uppgo = $('#uppgo'+str).val();
    var pgoyear= $('#uppgoyear'+str).val();
    var rev = $('#rev'+str).val();

    $.ajax({
      type:"POST",
      url:"pgo_crud.php?p=updatepgo",
      data:{id1: id, updateid: update_id, uppga1: uppga, uppgc1: uppgc, uppgo1: uppgo, pgoyear1: pgoyear, rev1: rev, igoval1: igoval},
      success: function(data){
        $('.modal-backdrop').remove()
        location.reload();
      }
    });
  }
</script>