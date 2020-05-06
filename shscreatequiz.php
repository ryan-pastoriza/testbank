<?php
include('header.php'); 
include 'class.php';
$class = new testbank();
if ( !empty ( $_GET ) ) {
  $quiz_id=$_GET['quiz_id'];
  $subj_id=$_GET['subj_id'];
  $subj_name=$_GET['subj_name'];
  $quiz_name=$_GET['quiz_name'];
  $q_date=$_GET['q_date'];
}
$position=$position_session;
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
  #alertsuccess5{
    position: absolute;
    top: 10px;
    margin-left: 100px;
    right: 20px;
    z-index: 999;
    opacity: 0.8;
  }#alertsuccess6{
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
<script src="js/jquery.min.js"></script>
  <?php
    if ($position_session=="Instructor") {
      include('headernotification.php');
    }else if ($position_session=="Program Head") {
      include('phqueuenotifheader.php');
    }else if ($position_session=="Dean") {
      include('deanqueuenotifheader.php');
    }
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
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

      <!-- Main row -->
      <div class="row" >

        <!-- Left col -->
        <section class="col-lg-6">
            <!-- Create TQ widget -->
            <div class="box  box-primary">
              
              <div class="box-header">
                <h3 class="box-title"><b>Create quiz  for <?php echo $subj_name." :</b> ".$quiz_name; ?></h3>
              </div>
              <div class="box-body">
                <table class="table table-hover table-striped table-bordered" id="quizs">
                  <thead>
                    <tr>
                      <th class="col-md-1">No.</th>
                      <th class="col-md-6">Question</th>
                      <th class="col-md-2">Choice</th>
                      <th class="col-md-2">Answer</th>
                      <th class="col-md-1">Action</th>
                    </tr>
                  </thead>
                  <tbody id="quizs">

                  </tbody>
                </table>
              </div>
              <div class="box-footer clearfix">
                <div class="row">
                  <div class="col-md-10">
                    <button type="button" class="pull-right btn btn-primary" id="print" onclick="PrintPreview1()" style="width:90px;">
                    <i class="glyphicon glyphicon-search"></i> Preview  </button>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="pull-right btn btn-primary" id="print" onclick="printDiv('printableArea3')" style="width:90px;">
                    <i class="fa fa-print"></i> Print </button>
                  </div>
                  <div  id="printableArea3" style="display:none">
                    <table width="800">
                      <thead>
                      <tr>
                        <th align="left" colspan="2"><strong>Direction: </strong><?php echo $quiz_name; ?></th>
                      </tr>
                      <tr>
                        <th align="left" colspan="2"><br/></th>
                      </tr>
                      </thead>
                      <tbody id="quizs2" >
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </section>
        <!-- right col -->
        <section class="col-lg-6">
            <div class="col-md-12">
                    <div class="box box-primary">
                      <div id="alertsuccess1" class="alert alert-success collapse">
                        <strong><h4 id="txt1"></h4></strong> 
                      </div>
                      <div id="alertsuccess2" class="alert alert-warning collapse">
                        <strong><h4 id="txt2"></h4></strong> 
                      </div>
                      <div id="alertsuccess3" class="alert alert-danger collapse">
                        <strong><h4 id="txt3"></h4></strong> 
                      </div>
                       <!-- /.box-header -->
                      <div class="box-body no-padding">
                      </div>
                    </div>
                    <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped table-bordered" id="qstored">
                        <thead>
                          <tr>
                            <th class="col-md-1">Topic</th>
                            <th class="col-md-9">Question</th>
                            <th class="col-md-1">Answer</th>
                            <th class="col-md-1">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $class->shsqbank1($subj_id);?>
                        </tbody>
                      </table>
                      <!-- /.table -->
                      <script type="text/javascript">
                        $(document).on('click', '.shscopyq', function(){  
                          button_id = $(this).attr("id");
                          q_id = $('#qid'+button_id).attr("value");
                          quiz_id = '<?php echo $quiz_id; ?>';
                          $.ajax({
                              type: "POST",
                              data: {qid: q_id, quiz_id: quiz_id},
                              url: "quizphp.php?p=shscopyq",
                              success: function(data) {
                                var msg;
                                var obj = $.parseJSON(data);
                                $.each(obj, function(key , value) {
                                  msg=this['msg'];
                                });
                                  alert1(msg);
                                  loadq()
                              }
                          }); 
                        });
                      </script>
                    </div>
                    <!-- /.box-body -->
                   
                  </div>
        </section>
      </div>
      <!-- /.row (main row) -->
      
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
    z-index: 60;
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
    z-index: 1;
}

.createtq:hover .createtqtext {
    visibility: visible;
}
.edittq:hover .edittqtext {
    visibility: visible;
}
</style>
<script>
$('#qstored').dataTable();
</script>
<script type="text/javascript">


function PrintPreview() {
        var toPrint = document.getElementById('printableArea');
        var popupWin = window.open('', '_blank', 'width=1000,height=600,location=no,left=100px');
        popupWin.document.open();
        popupWin.document.write('<html><title>::Print Preview::</title></head><body">');
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');
        popupWin.document.close();
    }
    function PrintPreview1() {
        var toPrint = document.getElementById('printableArea3');
        var popupWin = window.open('', '_blank', 'width=800,height=650,location=no,left=100px');
        popupWin.document.open();
        popupWin.document.write('<html><title>::Print Preview::</title></head><body">');
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');
        popupWin.document.close();
    }
  </script>
  <script type="text/javascript">
function PrintPreview2() {
        var toPrint = document.getElementById('printableArea2');
        var popupWin = window.open('', '_blank', 'width=800,height=650,location=no,left=200px');
        popupWin.document.open();
        popupWin.document.write('<html><title>::Print Preview::</title></head><body">');
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');
        popupWin.document.close();
    }

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

function alert1(val){
  var msg= val;
  if (msg=="Copied!" || msg=="Deleted!") {
    $('#txt1').empty();
    $('#txt1').text(msg);
    $('#alertsuccess1').show('fade').delay(2000).fadeOut();
    // $('.subph').attr('disabled',true);
    // window.location.href='tq_index.php';
  }else if (msg=="Please set the number of student.") {
    $('#txt2').empty();
    $('#txt2').text(msg);
    $('#alertsuccess2').show('fade').delay(2000).fadeOut();
  }else if (msg=="Cannot copy! Duplicate data."|| msg=="No data to delete!") {
    $('#txt3').empty();
    $('#txt3').text(msg);
    $('#alertsuccess3').show('fade').delay(2000).fadeOut();
  };
  
}
function loadq(){
  $('.qzs').remove();
  quiz_id = '<?php echo $quiz_id; ?>';
  $.ajax({
      type: "POST",
      data:"quiz_id="+quiz_id,
      url: "quizphp.php?p=shsloadq",
      success: function(data) {
        var q_id;
        var quiz_num;
        var question_desc;
        var choice;
        var attachment;
        var choice1="";
        var answer;
        var answer1="";
        var obj = $.parseJSON(data);
        $.each(obj, function(key , value) {
          q_id=this['q_id'];
          quiz_num=this['quiz_num'];
          question_desc=this['question_desc'];
          attachment=this['attachment'];
          console.log(attachment)
          choice=this['choice'];
          $.each(choice, function(key1 , value1) {
            if (value1 != undefined) {
              choice1=choice1+value1+"<br/>";
            };
          });
          answer=this['answer'];
          $.each(answer, function(key2 , value2) {
            if (value2 != undefined) {
              answer1=answer1+value2+"<br/>";
            };
            
          });
          if (quiz_num != undefined) {
            $('#quizs').append("<tr class='qzs'><td width='20px'>"+quiz_num+".</td><td>"+question_desc+"</td><td>"+choice1+"</td><td>"+answer1+"</td><td><button type='button' class='btn btn-danger btn-xs glyphicon glyphicon-trash' onclick='deleteq("+q_id+")'></button></td></tr>");

            if (!attachment) {
            }else{
              $('#quizs2').append("<tr class='qzs'><td colspan='2' align='center'><img src='uploads/"+attachment+"' style='width:400px;height:150px;'></td></tr>");
            };
            $('#quizs2').append("<tr class='qzs'><td width='20px'>"+quiz_num+".</td><td>"+question_desc+"</td></tr>");
              $.each(choice, function(keys , values) {
                if (keys==0) {
                  var i="a.";
                }else if(keys==1) {
                  var i="b.";
                }else if(keys==2) {
                  var i="c.";
                }else if(keys==3) {
                  var i="d.";
                }else if(keys==4) {
                  var i="e.";
                }else if(keys==5) {
                  var i="f.";
                }else if(keys==6) {
                  var i="g.";
                }else if(keys==7) {
                  var i="h.";
                }else if(keys==8) {
                  var i="i.";
                }else if(keys==9) {
                  var i="j.";
                }else if(keys==10) {
                  var i="k.";
                }else if(keys==11) {
                  var i="l.";
                }else if(keys==12) {
                  var i="m.";
                }else if(keys==13) {
                  var i="n.";
                }else if(keys==14) {
                  var i="o.";
                }else if(keys==15) {
                  var i="p.";
                }else if(keys==16) {
                  var i="q.";
                }else if(keys==17) {
                  var i="r.";
                }else if(keys==18) {
                  var i="s.";
                }else if(keys==19) {
                  var i="t.";
                }else if(keys==20) {
                  var i="u.";
                }else if(keys==21) {
                  var i="v.";
                }else if(keys==22) {
                  var i="w.";
                }else if(keys==23) {
                  var i="x.";
                }else if(keys==24) {
                  var i="y.";
                }else if(keys==25) {
                  var i="z.";
                };
                $('#quizs2').append("<tr class='qzs'><td width='20px'>"+i+"</td><td>"+keys+"</td></tr>");
              });
          };
          choice1="";
          answer1="";
        });

      }
  }); 
}
function deleteq(val){
  var q_id= val;
  var quiz_id = "<?php echo $quiz_id;?>";
  $.ajax({
    type:"GET",
    url:"quizphp.php?p=shsdeleteq",
    data:{q_id: q_id, quiz_id: quiz_id},
    success: function(data){
      var obj = $.parseJSON(data);
      var msg;
      $.each(obj, function() {
        msg=this['msg'];
      });
      alert1(msg);
      loadq()
    }
  });
}
$( window ).load(function() {
  loadq()
});
</script>
</html>