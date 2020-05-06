<?php 
  $class->loaddb();
    $sqlf="SELECT DISTINCT topics.topic_description FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN topics ON testquestions.topics_id = topics.topics_id WHERE tq.tq_id = $tq_id";
    $resd = mysql_query($sqlf);
    while($row=mysql_fetch_array($resd)){
        $topic_description1[]=$row['topic_description'];
    }
 
  // echo "<script type='text/javascript'>alert('$period');</script>";
  
  $sqlsum="SELECT Sum(testquestions.points) AS sumpoints FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE tq.tq_id = $tq_id";
  $resum = mysql_query($sqlsum);
  while($row=mysql_fetch_array($resum)){
      $sum=$row['sumpoints'];
      // echo "<script type='text/javascript'>alert('$sum');</script>";
  }
  $sqlcog1="SELECT Sum(testquestions.points) AS sumpoints FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE tq.tq_id = $tq_id AND (cognitive_level.cognitive_desc = 'Knowledge' OR cognitive_level.cognitive_desc = 'Comprehension' OR cognitive_level.cognitive_desc = 'Application')";
  $recog1 = mysql_query($sqlcog1);
  while($row=mysql_fetch_array($recog1)){
      $cog1=$row['sumpoints'];
  }
  $sqlcog2="SELECT Sum(testquestions.points) AS sumpoints FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE tq.tq_id = $tq_id AND (cognitive_level.cognitive_desc = 'Analysis' OR cognitive_level.cognitive_desc = 'Evaluation' OR cognitive_level.cognitive_desc = 'Synthesis')";
  $recog2 = mysql_query($sqlcog2);
  while($row=mysql_fetch_array($recog2)){
      $cog2=$row['sumpoints'];
  }
  if ($sum!=0) {
    if ($cog1!=0){
    $cogni1=$cog1/$sum*100;
    }
    if ($cog2!=0){
      $cogni2=$cog2/$sum*100;
    }
  }
  $class->sqlclose();
?>

       <section class="col-lg-5" >

          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Table of Specification</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding" style="overflow-y:scroll; overflow-x:scroll; height:285px;">
              <table class="table table-striped" style="text-align: center;" border="solid">
                <thead>
                  <tr>
                    <th rowspan="3">Content Dimension</th>
                    <th>Knowledge</th>
                    <th>Comprehension</th>
                    <th>Application</th>
                    <th>Analysis</th>
                    <th>Evaluation</th>
                    <th>Synthesis</th>
                    <th rospan="3">Total Items</th>
                    <th rowspan="3">No. of Points</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td colspan="3"><b>30%</b></td>
                    <td colspan="3"><b>70%</b></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td colspan="3"><?php if (!empty($cogni1)) {
                      echo round($cogni1, 2)."%";
                    }else{
                      echo "0%";
                      }   ?></td>
                    <td colspan="3"><?php if (!empty($cogni2)) {
                      echo round($cogni2, 2)."%";
                    }else{
                      echo "0%";
                      }   ?></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td>Item No.</td>
                    <td>Item No.</td>
                    <td>Item No.</td>
                    <td>Item No.</td>
                    <td>Item No.</td>
                    <td>Item No.</td>
                    <td></td>
                    <td></td>
                  </tr>
                    <?php 
                      $class->loaddb();
                      if (!empty($topic_description1)) {
                        foreach ($topic_description1 as $rowt => $value) {
                          echo "<tr>";
                          $a=$topic_description1[$rowt];
                          echo "<td>".$a."</td>";
                          echo"<td>";
                              $class->gettest($a,$tq_id,1);
                          echo"</td>";
                          echo"<td>";
                              $class->gettest($a,$tq_id,2);
                          echo"</td>";
                          echo"<td>"; 
                              $class->gettest($a,$tq_id,3);
                          echo"</td>";
                          echo"<td>"; 
                              $class->gettest($a,$tq_id,4);
                          echo"</td>";
                          echo"<td>"; 
                              $class->gettest($a,$tq_id,5);
                          echo"</td>";
                          echo"<td>"; 
                              $class->gettest($a,$tq_id,6);
                          echo"</td>";
                          echo"<td>"; 
                              $class->totalii($a,$tq_id);
                          echo"</td>";
                          echo"<td>"; 
                              $class->totalpp($a,$tq_id);
                          echo"</td>";
                        }
                      }
                      $class->sqlclose();
                    ?>
                  <tr>
                    <th>Total</th>
                    <td>
                        <?php $class->total($tq_id,1); ?>
                    </td>
                    <td>
                        <?php $class->total($tq_id,2); ?>
                    </td>
                    <td>
                        <?php $class->total($tq_id,3); ?>
                    </td>
                    <td>
                        <?php $class->total($tq_id,4); ?>
                    </td>
                    <td>
                        <?php $class->total($tq_id,5); ?>
                    </td>
                    <td>
                        <?php $class->total($tq_id,6); ?>
                    </td>
                    <td>
                        <?php $class->totali($tq_id); ?>
                    </td>
                    <td>
                        <?php $class->totalp($tq_id); ?>
                    </td>
                  </tr>
                </tbody>
              </table>
             <!--  <div class="col-xs-12">
                <div class="input-group">
                  <span class="input-group-addon" id="basic-addon1">Remarks</span>
                  <input type="text" name="tosremarks" class="form-control" placeholder="" disabled="disable" id="tosremarks" aria-describedby="basic-addon1">
                </div>
              </div> -->
            </div>
            <!-- /.box-body -->
          </div>
          <div class="box" >
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tq" data-toggle="tab">Test Questionnaire</a></li>
                <li><a href="#q" data-toggle="tab">Questions</a></li>
              </ul>
              <div class="tab-content" style="overflow-y:scroll; overflow-x:hidden; height:375px;">
                <div class="active tab-pane" id="tq">
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table class="table table-hover table-striped table-bordered" id="tqstored">
                        <thead>
                          <tr>
                            <th>Instructor</th>
                            <th>Date Stored</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $class->checktopic($tq_id);?>
                        </tbody>
                      </table>
                      <!-- /.table -->
                    </div>
                    <!-- /.box-body -->
                  </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="q">
                  
                  <div class="col-md-12">
                    <div class="box box">
                       <!-- /.box-header -->
                      <div class="box-body no-padding">
                      </div>
                    </div>
                    <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped table-bordered" id="qstored">
                        <thead>
                          <tr>
                            <th>Test Type</th>
                            <th>Question</th>
                            <th>Cognitive</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $class->qbank($tq_id,$subj_id); ?>
                        </tbody>
                      </table>
                      <!-- /.table -->
                      <script type="text/javascript">
                        $(document).on('click', '.copyq', function(){  
                          var button_id = $(this).attr("id");
                          var q_id = $('#qid'+button_id+'').attr("value");
                          var tq_id = '<?php echo "$tq_id"; ?>';
                          $.ajax({
                              type: "POST",
                              data: {qid: q_id, tqid: tq_id},
                              url: "copyq.php",
                              success: function(data) {
                                window.location.reload();
                              }
                          }); 
                        });
                      </script>
                    </div>
                    <!-- /.box-body -->
                   
                  </div>
                </div>
                <!-- /.tab-pane -->
              </div>
            </div>
            <!-- /.tab-content -->
          </div>
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Number of Students</h3>
            </div>
            <div class="box-body no-padding" style=" height:100px;">
            <form method="post">
            <table class="table table-bordered">
              <tr>
                <td>
                  <?php  
                    if (!empty($num_copies)) {
                      echo "<b> Number of student: ".$num_copies."</b>";
                    }else{
                      echo "<b>Number of student: 0</b>";
                    }
                  ?>
                </td>
                <td>
                  <select class="form-control " name="num" id="num" required>
                     <option></option>
                   <?php 
                   for ($i=1; $i < 50; $i++) { 
                     echo "<option>$i</option>";
                   }
                   ?>
                   </select>
                </td>
                <td>
                  <button type="submit" class="pull-right btn btn-default" name="submit" id="submit" onclick="fun(<?php echo $tq_id; ?>);">Save</button>
                </td>
                
                </tr>
              </tr>
            </table>
           
            
            </form>
            
          </div>
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </section>
