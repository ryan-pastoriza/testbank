<?php
include('header.php'); 
include 'class.php';
$class = new testbank();
$var;
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<script src="js/jquery.min.js"></script>
  <?php
  include('headernotification.php');
  ?>
  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div style="hieght:50px;">
          <p><a><h4><?php echo $fullname_session;?></h4></a></p>
          <i class="fa fa-circle text-success"></i><a href="logout.php"> logout</a>
        </div>
      </div>
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
              <h3 class="box-title"><b>SHS TQ</b></h3>
            </div>
            <div class="box-body">
              <table class="table table-hover" id="shsloadtq">
                <thead>
                  <tr>
                    <th>Subject</th>
                    <th>Year</th>
                    <th>Sem</th>
                    <th>1st Examination</th>
                    <th>2nd Examination</th>
                    <th>Print Syllabus</th>
                  </tr>
                </thead>
                <tbody>
                <?php $class->loadsub4($login_id); ?>
                </tbody>
                <div class="modal fade" id="shstosmodal" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
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
                              <select class="form-control input-xs shspgocourse" name="shspgocourse" id="shspgocourse" required>
                                <option></option>
                               
                              </select>
                            </div>
                            <div class="col-xs-5">
                              <button type="button" class="btn btn-primary" style="width: 100px;" id="shsbtn1">Add</button>
                            </div>  
                            <div class="col-xs-2">
                              <button type="button" class="btn btn-primary" style="width: 100px;" onclick="shscalc()">Refresh</button>
                            </div>  
                          </div>
                          <br/>
                          
                          <div class="row">
                            <div class="col-lg-12">
                              <div id="shstopicfield">
                                <div class="row" id="shstopic">
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
                                    <b><p class="shstotalh"></p></b>
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
                                    <b><p class="shstotalni"></p></b>
                                  </div>
                                  <div class="col-xs-1">
                                  </div>
                                  <div class="col-xs-1">
                                  </div>
                                  <div class="col-xs-1">
                                    <input type="text" class="form-control shsni1" onchange="shscalc()" placeholder="No. of Items" >
                                  </div>
                                  <div class="col-xs-1">
                                    <input type="text" class="form-control shsni2" onchange="shscalc()" placeholder="No. of Items" >
                                  </div>
                                  <div class="col-xs-1">
                                    <input type="text" class="form-control shsni3" onchange="shscalc()" placeholder="No. of Items" >
                                  </div>
                                  <div class="col-xs-1">
                                    <input type="text" class="form-control shsni4" onchange="shscalc()" placeholder="No. of Items" >
                                  </div>
                                  <div class="col-xs-1">
                                    <input type="text" class="form-control shsni5" onchange="shscalc()" placeholder="No. of Items" >
                                  </div>
                                  <div class="col-xs-1">
                                    <input type="text" class="form-control shsni6" onchange="shscalc()" placeholder="No. of Items" >
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
                                    <b><p class="shstotalnp"></p></b>
                                  </div>
                                  <div class="col-xs-1">
                                  </div>
                                  <div class="col-xs-1">
                                  </div>
                                  <div class="col-xs-1">
                                    <input type="text" class="form-control shsnp1" onchange="shscalc()" placeholder="No. of Items" >
                                  </div>
                                  <div class="col-xs-1">
                                    <input type="text" class="form-control shsnp2" onchange="shscalc()" placeholder="No. of Items" >
                                  </div>
                                  <div class="col-xs-1">
                                    <input type="text" class="form-control shsnp3" onchange="shscalc()" placeholder="No. of Items" >
                                  </div>
                                  <div class="col-xs-1">
                                    <input type="text" class="form-control shsnp4" onchange="shscalc()" placeholder="No. of Items" >
                                  </div>
                                  <div class="col-xs-1">
                                    <input type="text" class="form-control shsnp5" onchange="shscalc()" placeholder="No. of Items" >
                                  </div>
                                  <div class="col-xs-1">
                                    <input type="text" class="form-control shsnp6" onchange="shscalc()" placeholder="No. of Items" >
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
                                    <p class="shsknp"></p>
                                  </div>
                                  <div class="col-xs-1">
                                    <p class="shscop"></p>
                                  </div>
                                  <div class="col-xs-1">
                                    <p class="shsapp"></p>
                                  </div>
                                  <div class="col-xs-1">
                                    <p class="shsanp"></p>
                                  </div>
                                  <div class="col-xs-1">
                                    <p class="shsevp"></p>
                                  </div>
                                  <div class="col-xs-1">
                                    <p class="shssyp"></p>
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
                                      <p class="shsttal"></p>
                                  </div>
                                  <div class="col-xs-1">
                                    
                                  </div>
                                  <div class="col-xs-1">
                                    
                                  </div>
                                  <div class="col-xs-1">
                                      <i class="createtq"><b>LOTS:</b><span class="createtqtext">LOTS percentage must be 35% - 45%.
                                           </span></i>
                                  </div>
                                  <div class="col-xs-1">
                                      <b><p class="shslots"></p></b>
                                  </div>
                                  <div class="col-xs-1">
                                      <i class="createtq"><b>HOTS:</b><span class="createtqtext">HOTS percentage must be 55% - 65%</span></i>
                                  </div>
                                  <div class="col-xs-1">
                                      <b><p class="shshots"></p></b>
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
                            <form action="shscreatetq.php" method="get">
                              <button type="button" class="btn btn-default" data-dismiss="modal" style="width: 100px;">Close</button>
                              <button type="button" onclick="shssaveprelimtos1()"  class="btn btn-primary" id="shssaveprelimtos" style="width: 100px;">Save</button>
                              <input type="hidden" id="shstq_id" class="shstq_id" name="shstq_id">
                              <input type="hidden" id="shssyllabus_id" class="shssyllabus_id" name="shssyllabus_id">
                              <button type="submit" class="btn btn-primary" id="shscreatetq" style="width: 100px;">Create TQ</button>
                            </form>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>





              </table>
              <div class="box-footer clearfix">
                <div class="row" style="float:right;">
                  <div class="col-xs-12">
                    <button class="btn btn-primary glyphicon glyphicon-pencil" data-toggle="modal" data-target="#addsub" onclick="getsub()"></button>
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
                                  <option value="1">1st</option>
                                  <option value="2">2nd</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-xs-6">
                              <div class="input-group">
                                <span class="input-group-addon" id="basic-addon1">Subject</span>
                                <select class="form-control input-xs " name="subject" id="subject" required>
                                  <option value=""></option> 
                                  <?php $class->getsub3(); ?>          
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
                                <th width="80%">Subject</th>
                                <th width="20%">Action</th>
                              </tr>
                            </thead>
                            <tbody id="tbsub">
                            </tbody>

                          </table>
        
                        </div>
                        <div class="modal-footer">
                          <form action="createtq.php" method="get">
                            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="ref()" style="width: 100px;">Close</button>
                          </form>
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
<script type="text/javascript" src="jquery-1.8.0.min.js"></script>
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="dist/js/jquery-ui.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<style>
.createtq .createtqtext {
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
    z-index: -1;
}
.edittq .edittqtext {
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
    z-index: -1;
}

.createtq:hover .createtqtext {
    visibility: visible;
    z-index: 1;
}
.edittq:hover .edittqtext {
    visibility: visible;
    z-index: 1;
}
</style>

<script>
$('#tqsub').dataTable();
$('#shsloadtq').dataTable();

var shstn=0;
var shstn1=0;
var tn=0;
var tn1=0;
$(document).ready(function(){
  
    $("#btn1").click(function(){
        
        var topic = $('#pgocourse').val();
        if (topic == null || topic =='') {
        }else{
          
          $("#topicfield").append('<div class="row" id="topic'+tn+'"><div class="col-xs-3"><b>'+topic+'</b></div><div class="col-xs-1"><input id="nh" onchange="calc()" type="text" class="form-control nh"><input id="topicdesc'+tn+'"  type="hidden" class="form-control topicdesc'+tn+'" value="'+topic+'"></div><div class="col-xs-1"><p class="nh'+tn1+'"></p></div><div class="col-xs-1"><button id="'+tn+'" data-id="'+topic+'" class="btn btn-danger btn-xs glyphicon glyphicon-trash delt"></button></div><div class="col-xs-1"></div><div class="col-xs-1"></div><div class="col-xs-1"></div><div class="col-xs-1"></div><div class="col-xs-1"></div><div class="col-xs-1"></div></div></div>');
          $("#pgocourse option:selected").attr('disabled',true);
          tn1++;
          tn++;
          
        };
    });
    $("#shsbtn1").click(function(){
        
        var topic = $('#shspgocourse').val();
        if (topic == null || topic =='') {
        }else{
          
          $("#shstopicfield").append('<div class="row" id="shstopic'+shstn+'"><div class="col-xs-3"><b>'+topic+'</b></div><div class="col-xs-1"><input id="shsnh" onchange="shscalc()" type="text" class="form-control shsnh"><input id="shstopicdesc'+shstn+'"  type="hidden" class="form-control shstopicdesc'+shstn+'" value="'+topic+'"></div><div class="col-xs-1"><p class="shsnh'+shstn1+'"></p></div><div class="col-xs-1"><button id="'+shstn+'" data-id="'+topic+'" class="btn btn-danger btn-xs glyphicon glyphicon-trash shsdelt"></button></div><div class="col-xs-1"></div><div class="col-xs-1"></div><div class="col-xs-1"></div><div class="col-xs-1"></div><div class="col-xs-1"></div><div class="col-xs-1"></div></div></div>');
          $("#shspgocourse option:selected").attr('disabled',true);
          shstn1++;
          shstn++;
          
        };
    });
}); 

$(document).on('click', '.delt', function(){
  var button_id = $(this).attr("id");
  var did = $(this).attr("data-id");
        $('#topic'+button_id+'').remove();
        $("#pgocourse option[value='"+did+"']").attr('disabled', false);
        tn--;
        tn1--;
});
$(document).on('click', '.shsdelt', function(){
  var button_id = $(this).attr("id");
  var did = $(this).attr("data-id");
        $('#shstopic'+button_id+'').remove();
        $("#shspgocourse option[value='"+did+"']").attr('disabled', false);
        shstn--;
        shstn1--;
});

 

function calc(){
  var kno_ni=parseFloat($('.ni1').val());
  var com_ni=parseFloat($('.ni2').val());
  var app_ni=parseFloat($('.ni3').val());
  var ana_ni=parseFloat($('.ni4').val());
  var eva_ni=parseFloat($('.ni5').val());
  var syn_ni=parseFloat($('.ni6').val());
  var total_ni= parseFloat(kno_ni+com_ni+app_ni+ana_ni+eva_ni+syn_ni);
  var kno_np=parseFloat($('.np1').val());
  var com_np=parseFloat($('.np2').val());
  var app_np=parseFloat($('.np3').val());
  var ana_np=parseFloat($('.np4').val());
  var eva_np=parseFloat($('.np5').val());
  var syn_np=parseFloat($('.np6').val());
  var total_np=parseFloat(kno_np+com_np+app_np+ana_np+eva_np+syn_np);
  var kno_npp= kno_np / total_np * 100;
  var com_npp= com_np / total_np * 100;
  var app_npp= app_np / total_np * 100;
  var ana_npp= ana_np / total_np * 100;
  var eva_npp= eva_np / total_np * 100;
  var syn_npp= syn_np / total_np * 100;
  var lots=kno_npp+com_npp;
  var hots=app_npp+ana_npp+eva_npp+syn_npp;
  var total =parseFloat(0);
  var totalnumi =parseFloat(0);
  var totalnipt = [];
  var ttal=lots+hots
  
  $('.nh').each(function(i){
    total += parseFloat($(this).val());
    totalnipt[i] =$(this).val();
    if(isNaN(total)) {
      $('.totalh').text("0");
    }else{
      $('.totalh').text(total);
    };
  
  });
  $(totalnipt).each(function(i){
    totalnumi=parseFloat(total_ni / total * totalnipt[i]);
     if(isNaN(totalnumi)) {
      $('.nh'+i).text("0");
     }else{
      $('.nh'+i).text(totalnumi.toFixed(2));
     };
      
  });
  
  if(isNaN(ttal)) {
    $('.ttal').text("0%");
  }else{
    $('.ttal').text(ttal.toFixed(2)+"%");
  };
  if(isNaN(total_ni)) {
    $('.totalni').text("0");
  }else{
    $('.totalni').text(total_ni);
  };
  if(isNaN(total_np)) {
    $('.totalnp').text("0");
  }else{
    $('.totalnp').text(total_np);
  };
  if(isNaN(lots)) {
    $('.lots').text("0%");
  }else{
    $('.lots').text(lots.toFixed(2)+"%");
  };
  if(isNaN(hots)) {
    $('.hots').text("0%");
  }else{
    $('.hots').text(hots.toFixed(2)+"%");
  };
  if(isNaN(kno_npp)) {
    $('.knp').text("0%");
  }else{
    $('.knp').text(kno_npp.toFixed(2)+"%");
  };
  if(isNaN(com_npp)) {
    $('.cop').text("0%");
  }else{
    $('.cop').text(com_npp.toFixed(2)+"%");
  };
  if(isNaN(app_npp)) {
    $('.app').text("0%");
  }else{
    $('.app').text(app_npp.toFixed(2)+"%");
  };
  if(isNaN(ana_npp)) {
    $('.anp').text("0%");
  }else{
    $('.anp').text(ana_npp.toFixed(2)+"%");
  };
  if(isNaN(eva_npp)) {
    $('.evp').text("0%");
  }else{
    $('.evp').text(eva_npp.toFixed(2)+"%");
  };
  if(isNaN(syn_npp)) {
    $('.syp').text("0%");
  }else{
    $('.syp').text(syn_npp.toFixed(2)+"%");
  };
  if (lots>40) {
    $(".lots").css('color', 'red');
  }else{
    $(".lots").css('color', 'green');
  };
  if (hots<60) {
    $(".hots").css('color', 'red');
  }else{
    $(".hots").css('color', 'green');
  };
  if (lots<40 && hots>60) {
    saveprelimtos
    $("#saveprelimtos").prop('disabled', false);
  }else{
    $("#saveprelimtos").prop('disabled', true);
  };

}
function shscalc(){
  var shskno_ni=parseFloat($('.shsni1').val());
  var shscom_ni=parseFloat($('.shsni2').val());
  var shsapp_ni=parseFloat($('.shsni3').val());
  var shsana_ni=parseFloat($('.shsni4').val());
  var shseva_ni=parseFloat($('.shsni5').val());
  var shssyn_ni=parseFloat($('.shsni6').val());
  var shstotal_ni= parseFloat(shskno_ni+shscom_ni+shsapp_ni+shsana_ni+shseva_ni+shssyn_ni);
  var shskno_np=parseFloat($('.shsnp1').val());
  var shscom_np=parseFloat($('.shsnp2').val());
  var shsapp_np=parseFloat($('.shsnp3').val());
  var shsana_np=parseFloat($('.shsnp4').val());
  var shseva_np=parseFloat($('.shsnp5').val());
  var shssyn_np=parseFloat($('.shsnp6').val());
  var shstotal_np=parseFloat(shskno_np+shscom_np+shsapp_np+shsana_np+shseva_np+shssyn_np);
  var shskno_npp= shskno_np / shstotal_np * 100;
  var shscom_npp= shscom_np / shstotal_np * 100;
  var shsapp_npp= shsapp_np / shstotal_np * 100;
  var shsana_npp= shsana_np / shstotal_np * 100;
  var shseva_npp= shseva_np / shstotal_np * 100;
  var shssyn_npp= shssyn_np / shstotal_np * 100;
  var shslots=shskno_npp+shscom_npp;
  var shshots=shsapp_npp+shsana_npp+shseva_npp+shssyn_npp;
  var shstotal =parseFloat(0);
  var shstotalnumi =parseFloat(0);
  var shstotalnipt = [];
  var shsttal=shslots+shshots
  
  $('.shsnh').each(function(i){
    shstotal += parseFloat($(this).val());
    shstotalnipt[i] =$(this).val();
    if(isNaN(shstotal)) {
      $('.shstotalh').text("0");
    }else{
      $('.shstotalh').text(shstotal);
    };
  
  });
  $(shstotalnipt).each(function(i){
    shstotalnumi=parseFloat(shstotal_ni / shstotal * shstotalnipt[i]);
     if(isNaN(shstotalnumi)) {
      $('.shsnh'+i).text("0");
     }else{
      $('.shsnh'+i).text(shstotalnumi.toFixed(2));
     };
      
  });
  
  if(isNaN(shsttal)) {
    $('.shsttal').text("0%");
  }else{
    $('.shsttal').text(shsttal.toFixed(2)+"%");
  };
  if(isNaN(shstotal_ni)) {
    $('.shstotalni').text("0");
  }else{
    $('.shstotalni').text(shstotal_ni);
  };
  if(isNaN(shstotal_np)) {
    $('.shstotalnp').text("0");
  }else{
    $('.shstotalnp').text(shstotal_np);
  };
  if(isNaN(shslots)) {
    $('.shslots').text("0%");
  }else{
    $('.shslots').text(shslots.toFixed(2)+"%");
  };
  if(isNaN(shshots)) {
    $('.shshots').text("0%");
  }else{
    $('.shshots').text(shshots.toFixed(2)+"%");
  };
  if(isNaN(shskno_npp)) {
    $('.shsknp').text("0%");
  }else{
    $('.shsknp').text(shskno_npp.toFixed(2)+"%");
  };
  if(isNaN(shscom_npp)) {
    $('.shscop').text("0%");
  }else{
    $('.shscop').text(shscom_npp.toFixed(2)+"%");
  };
  if(isNaN(shsapp_npp)) {
    $('.shsapp').text("0%");
  }else{
    $('.shsapp').text(shsapp_npp.toFixed(2)+"%");
  };
  if(isNaN(shsana_npp)) {
    $('.shsanp').text("0%");
  }else{
    $('.shsanp').text(shsana_npp.toFixed(2)+"%");
  };
  if(isNaN(shseva_npp)) {
    $('.shsevp').text("0%");
  }else{
    $('.shsevp').text(shseva_npp.toFixed(2)+"%");
  };
  if(isNaN(shssyn_npp)) {
    $('.shssyp').text("0%");
  }else{
    $('.shssyp').text(shssyn_npp.toFixed(2)+"%");
  };
  if (shslots>=35 && shslots<=45) {
    $(".shslots").css('color', 'green');
  }else{
    $(".shslots").css('color', 'red');
  };

  if (shshots>=55 && shshots<=65 ) {
    $(".shshots").css('color', 'green');
  }else{
    $(".shshots").css('color', 'red');
  };
  if ((shslots>=35 && shslots<=45) && (shshots>=55 && shshots<=65)) {
    
    $("#shssaveprelimtos").prop('disabled', false);
  }else{
    $("#shssaveprelimtos").prop('disabled', true);
  };

}
function saveprelimtos1(){
  var tq_id=$('#tq_id').val();
  var period=$(".period").val();
  var syllabus_id=$(".syllabus_id").val();
  var kno_ni=$('.ni1').val();
  var com_ni=$('.ni2').val();
  var app_ni=$('.ni3').val();
  var ana_ni=$('.ni4').val();
  var eva_ni=$('.ni5').val();
  var syn_ni=$('.ni6').val();
  var kno_np=$('.np1').val();
  var com_np=$('.np2').val();
  var app_np=$('.np3').val();
  var ana_np=$('.np4').val();
  var eva_np=$('.np5').val();
  var syn_np=$('.np6').val();
  var totalnh=[];
  var topicd =[];
  $('.nh').each(function(i){
    totalnh[i] =$(this).val();
    topicd[i] =$(".topicdesc"+i).val(); 
  });
  console.log(topicd)
  $.ajax({
    type:"POST",
    url:"tq_tos.php?p=savetos",
    data:{tq_id1: tq_id, kno_ni1: kno_ni, com_ni1: com_ni, app_ni1: app_ni, ana_ni1: ana_ni, eva_ni1: eva_ni, syn_ni1: syn_ni, kno_np1: kno_np, com_np1: com_np, app_np1: app_np, ana_np1: ana_np, eva_np1: eva_np, syn_np1: syn_np, totalnh1: totalnh, topicd1: topicd},
    success: function(data){
      checktos(tq_id,period,syllabus_id)
    }
  });
}
function ref(){
  location.reload();
}
function shssaveprelimtos1(){
  var tq_id=$('#shstq_id').val();
  var syllabus_id=$(".shssyllabus_id").val();
  var kno_ni=$('.shsni1').val();
  var com_ni=$('.shsni2').val();
  var app_ni=$('.shsni3').val();
  var ana_ni=$('.shsni4').val();
  var eva_ni=$('.shsni5').val();
  var syn_ni=$('.shsni6').val();
  var kno_np=$('.shsnp1').val();
  var com_np=$('.shsnp2').val();
  var app_np=$('.shsnp3').val();
  var ana_np=$('.shsnp4').val();
  var eva_np=$('.shsnp5').val();
  var syn_np=$('.shsnp6').val();
  var totalnh=[];
  var topicd =[];
  $('.shsnh').each(function(i){
    totalnh[i] =$(this).val();
    topicd[i] =$(".shstopicdesc"+i).val(); 
  });
  console.log(topicd)
  $.ajax({
    type:"POST",
    url:"tq_tos.php?p=shssavetos",
    data:{tq_id1: tq_id, kno_ni1: kno_ni, com_ni1: com_ni, app_ni1: app_ni, ana_ni1: ana_ni, eva_ni1: eva_ni, syn_ni1: syn_ni, kno_np1: kno_np, com_np1: com_np, app_np1: app_np, ana_np1: ana_np, eva_np1: eva_np, syn_np1: syn_np, totalnh1: totalnh, topicd1: topicd},
    success: function(data){
      shschecktos(tq_id,syllabus_id)
    }
  });
}

function checktos(tq_id,period,syllabus){
  var tq_id=tq_id;
  var period=period;
  var syllabus_id= syllabus;
  console.log(syllabus_id)
  $(".tq_id").val(tq_id);
  $(".period").val(period);
  $(".syllabus_id").val(syllabus_id);
  $("#pgocourse   option").remove();
  $(".ni1").val("");
  $(".ni2").val("");
  $(".ni3").val("");
  $(".ni4").val("");
  $(".ni5").val("");
  $(".ni6").val("");
  $(".np1").val("");
  $(".np2").val("");
  $(".np3").val("");
  $(".np4").val("");
  $(".np5").val("");
  $(".np6").val("");
  $('.nh').each(function(i){
    $('#topic'+i).remove();
  });
  tn=0;
  tn1=0;
  calc();
  $.ajax({
    type:"POST",
    url:"tq_tos.php?p=checktos",
    data:{tq_id: tq_id, period: period, syllabus_id: syllabus_id},
    success: function(data){
      $('.totalh').text("0");
      var msg;
      var kno_ni;
      var com_ni;
      var app_ni;
      var ana_ni;
      var eva_ni;
      var syn_ni;
      var kno_np;
      var com_np;
      var app_np;
      var ana_np;
      var eva_np;
      var syn_np;
      var noh;
      var selop;
      var status_desc;
        var obj = $.parseJSON(data);
        $.each(obj, function(key , value) {
          msg=this['data'];
          kno_ni=this['kno_ni'];
          com_ni=this['com_ni'];
          app_ni=this['app_ni'];
          ana_ni=this['ana_ni'];
          eva_ni=this['eva_ni'];
          syn_ni=this['syn_ni'];
          kno_np=this['kno_np'];
          com_np=this['com_np'];
          app_np=this['app_np'];
          ana_np=this['ana_np'];
          eva_np=this['eva_np'];
          syn_np=this['syn_np'];
          status_desc=this['status_desc'];
          noh=this['num_of_hours'];
          $("#pgocourse").append('<option value=""></option>');
          $.each(value.selecttopic , function(k , v ){ 
            $("#pgocourse").append('<option value="'+v+'">'+v+'</option>');
          });
          $.each(value.topic_desc , function(k , v ){   
            $("#pgocourse option[value='"+v+"']").attr('disabled', true);
            $("#topicfield").append('<div class="row" id="topic'+tn+'"><div class="col-xs-3"><b>'+v+'</b></div><div class="col-xs-1"><input id="nh" onchange="calc()" type="text" value="'+value.num_of_hours[k]+'"class="form-control nh"><input id="topicdesc'+tn+'"  type="hidden" class="form-control topicdesc'+tn+'" value="'+v+'"></div><div class="col-xs-1"><p class="nh'+tn1+'"></p></div><div class="col-xs-1"><button id="'+tn+'" data-id="'+v+'" class="btn btn-danger btn-xs glyphicon glyphicon-trash delt"></button></div><div class="col-xs-1"></div><div class="col-xs-1"></div><div class="col-xs-1"></div><div class="col-xs-1"></div><div class="col-xs-1"></div><div class="col-xs-1"></div></div></div>');
            tn1++;
            tn++;
          });

        });
        $(".ni1").val(kno_ni);
        $(".ni2").val(com_ni);
        $(".ni3").val(app_ni);
        $(".ni4").val(ana_ni);
        $(".ni5").val(eva_ni);
        $(".ni6").val(syn_ni);
        $(".np1").val(kno_np);
        $(".np2").val(com_np);
        $(".np3").val(app_np);
        $(".np4").val(ana_np);
        $(".np5").val(eva_np);
        $(".np6").val(syn_np);
        calc();
        if (msg=="true") {
          $("#createtq").prop('disabled', false);
        }else{
          $("#createtq").prop('disabled', true);
        };
        // console.log(status_desc)
        if (status_desc==='pending') {
          $("#saveprelimtos").show("fadeOut");
        }else{
          $("#saveprelimtos").hide("fadeOut");
        };
    }
  });
}
function shschecktos(tq_id,syllabus){
  var tq_id=tq_id;
  var syllabus_id= syllabus;
  console.log(tq_id)
  $(".shstq_id").val(tq_id);
  $(".shssyllabus_id").val(syllabus_id);
  $("#shspgocourse   option").remove();
  $(".shsni1").val("");
  $(".shsni2").val("");
  $(".shsni3").val("");
  $(".shsni4").val("");
  $(".shsni5").val("");
  $(".shsni6").val("");
  $(".shsnp1").val("");
  $(".shsnp2").val("");
  $(".shsnp3").val("");
  $(".shsnp4").val("");
  $(".shsnp5").val("");
  $(".shsnp6").val("");
  $('.shsnh').each(function(i){
    $('#shstopic'+i).remove();
  });
  tn=0;
  tn1=0;
  shscalc();
  $.ajax({
    type:"POST",
    url:"tq_tos.php?p=shschecktos",
    data:{tq_id: tq_id, syllabus_id: syllabus_id},
    success: function(data){
      $('.shstotalh').text("0");
      var msg;
      var kno_ni;
      var com_ni;
      var app_ni;
      var ana_ni;
      var eva_ni;
      var syn_ni;
      var kno_np;
      var com_np;
      var app_np;
      var ana_np;
      var eva_np;
      var syn_np;
      var noh;
      var selop;
      var status_desc;
        var obj = $.parseJSON(data);
        $.each(obj, function(key , value) {
          msg=this['data'];
          kno_ni=this['kno_ni'];
          com_ni=this['com_ni'];
          app_ni=this['app_ni'];
          ana_ni=this['ana_ni'];
          eva_ni=this['eva_ni'];
          syn_ni=this['syn_ni'];
          kno_np=this['kno_np'];
          com_np=this['com_np'];
          app_np=this['app_np'];
          ana_np=this['ana_np'];
          eva_np=this['eva_np'];
          syn_np=this['syn_np'];
          status_desc=this['status_desc'];
          noh=this['num_of_hours'];
          $("#shspgocourse").append('<option value=""></option>');
          $.each(value.selecttopic , function(k , v ){ 
            $("#shspgocourse").append('<option value="'+v+'">'+v+'</option>');
          });
          $.each(value.topic_desc , function(k , v ){   
            $("#shspgocourse option[value='"+v+"']").attr('disabled', true);
            $("#shstopicfield").append('<div class="row" id="shstopic'+shstn+'"><div class="col-xs-3"><b>'+v+'</b></div><div class="col-xs-1"><input id="shsnh" onchange="shscalc()" type="text" value="'+value.num_of_hours[k]+'"class="form-control shsnh"><input id="shstopicdesc'+shstn+'"  type="hidden" class="form-control shstopicdesc'+shstn+'" value="'+v+'"></div><div class="col-xs-1"><p class="shsnh'+shstn1+'"></p></div><div class="col-xs-1"><button id="'+shstn+'" data-id="'+v+'" class="btn btn-danger btn-xs glyphicon glyphicon-trash shsdelt"></button></div><div class="col-xs-1"></div><div class="col-xs-1"></div><div class="col-xs-1"></div><div class="col-xs-1"></div><div class="col-xs-1"></div><div class="col-xs-1"></div></div></div>');
            shstn1++;
            shstn++;
          });

        });
        $(".shsni1").val(kno_ni);
        $(".shsni2").val(com_ni);
        $(".shsni3").val(app_ni);
        $(".shsni4").val(ana_ni);
        $(".shsni5").val(eva_ni);
        $(".shsni6").val(syn_ni);
        $(".shsnp1").val(kno_np);
        $(".shsnp2").val(com_np);
        $(".shsnp3").val(app_np);
        $(".shsnp4").val(ana_np);
        $(".shsnp5").val(eva_np);
        $(".shsnp6").val(syn_np);
        shscalc();
        // if (msg=="true") {
        //   $("#shscreatetq").prop('disabled', false);
        // }else{
        //   $("#shscreatetq").prop('disabled', true);
        // };
        // console.log(status_desc)
        if (status_desc==='pending') {
          $("#shssaveprelimtos").show("fadeOut");
        }else{
          $("#shssaveprelimtos").hide("fadeOut");
        };
    }
  });
}
function addsubject(){
  var sy = $('#subsy').val();
  var sem = $('#subsem').val();
  var subj1 = $('#subject').val();
  var emp_id1=<?php echo $login_id;?>;
  $.ajax({
    type:"POST",
    url:"tq_tos.php?p=shsaddsub",
    data:{subj: subj1, emp_id: emp_id1, sy: sy, sem: sem},
    success: function(data){
      getsub()
    }
  });
}
function getsub(){
  var sy = $('#subsy').val();
  var sem = $('#subsem').val();
  $('#subject').val("");
  $('.subdata').remove();
  var emp_id1=<?php echo $login_id;?>;
  $.ajax({
    type:"POST",
    url:"tq_tos.php?p=getsub",
    data:{emp_id: emp_id1, sy: sy, sem: sem},
    success: function(data){
      var msg;
      var emp_id;
      var syllid;
      var sem;
      var sy;
      var obj = $.parseJSON(data);
      $.each(obj, function(key , value) {
         msg=this['msg'];
         emp_id=this['emp_id'];
         sem=this['sem'];
         sy=this['sy'];
         syllid=this['id'];
        department=this['department'];
        $.each(value.msg , function(k , v ){ 
          if (!(v=='No subject found' || v=='Error Database')) {
            $("#tbsub").append('<tr class="subdata"><td>'+ v+'</td><td><button type="button" onclick="delsub('+syllid[k]+')" class="btn btn-danger btn-xs glyphicon glyphicon-trash" ></button></td></tr>');
          }else{
            $("#tbsub").append('<tr class="subdata"><td>'+ v+'</td><td></td></tr>');
          };
            
        });
      });
      
    }
  });
}
function delsub(val){
  var syll = val;
    $.ajax({
      type:"GET",
      url:"tq_tos.php?p=deletesub",
      data:"del="+syll,
      success: function(data){
        
        getsub()
      }
    });
}
// function loadshs(){
//   $('.shsdata').remove();
//   var emp_id1=<?php echo $login_id;?>;
//   $.ajax({
//     type:"POST",
//     url:"tq_tos.php?p=loadshs",
//     data:"emp_id="+emp_id1,
//     success: function(data){
//       var sub;
//       var syll;
//       var tq1;
//       var tq2;
//       var sy;
//       var sem;
//       var per1;
//       var per2;
//       var stat1;
//       var stat2;
//       var obj = $.parseJSON(data);
//       $.each(obj, function(key , value) {
//         syll=this['syll'];
//         sub=this['sub'];
//         tq1=this['tqid1'];
//         tq2=this['tqid2'];
//         sy=this['sy'];
//         sem=this['sem'];
//         per1=this['period1'];
//         per2=this['period2'];
//         stat1=this['status1'];
//         stat2=this['status2'];  
//         $.each(value.sub , function(k , v ){ 
//           if (v=="No subject found") {

//           }else{
//             $("#shstab").append('<tr class="shsdata"><td class="col-lg-4">'+ v+'</td><td class="col-lg-4">'+sy[k]+'</td><td class="col-lg-4">'+sem[k]+'</td><td class="col-lg-2"><button type="button" class="btn btn-default" onclick="shschecktos('+tq1[k]+','+syll[k]+')" name="create" style="width: 150px;" data-toggle="modal" data-target="#shstosmodal"><a><i class="createtq"><b>'+per1[k]+'</b><span class="createtqtext">'+stat1[k]+'</span></i></a></button></td><td class="col-lg-2"><button type="button" class="btn btn-default" onclick="shschecktos('+tq2[k]+','+syll[k]+')" name="create" style="width: 150px;" data-toggle="modal" data-target="#shstosmodal"><a><i class="createtq"><b>'+per2[k]+'</b><span class="createtqtext">'+stat2[k]+'</span></i></a></button></td>');
//           };
          
//         });
//       });
//     }
//   });
// }
</script>
</html>