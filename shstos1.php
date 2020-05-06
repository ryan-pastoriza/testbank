<?php 
  $class->loaddb();
  $sqlf="SELECT DISTINCT shs_topics.shs_topic_description FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id INNER JOIN shs_topics ON shs_testquestions.shs_topics_id = shs_topics.shs_topics_id WHERE shs_tq.shs_tq_id = $tq_id";
    $resd = mysql_query($sqlf);
    while($row=mysql_fetch_array($resd)){
        $topic_description1[]=$row['shs_topic_description'];
    }
 
  // echo "<script type='text/javascript'>alert('$period');</script>";
  
  $sqlsum="SELECT Sum(shs_testquestions.shs_points) AS sumpoints FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id INNER JOIN cognitive_level ON shs_testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE shs_tq.shs_tq_id = $tq_id";
  $resum = mysql_query($sqlsum);
  while($row=mysql_fetch_array($resum)){
      $sum=$row['sumpoints'];
      // echo "<script type='text/javascript'>alert('$sum');</script>";
  }
  $sqlcog1="SELECT Sum(shs_testquestions.shs_points) AS sumpoints FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id INNER JOIN cognitive_level ON shs_testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE shs_tq.shs_tq_id = $tq_id AND (cognitive_level.cognitive_desc = 'Knowledge' OR cognitive_level.cognitive_desc = 'Comprehension' )";
  $recog1 = mysql_query($sqlcog1);
  while($row=mysql_fetch_array($recog1)){
      $cog1=$row['sumpoints'];
  }
  $sqlcog2="SELECT Sum(shs_testquestions.shs_points) AS sumpoints FROM shs_tq INNER JOIN shs_test_number ON shs_test_number.shs_tq_id = shs_tq.shs_tq_id INNER JOIN shs_testquestions ON shs_testquestions.shs_test_id = shs_test_number.shs_test_id INNER JOIN cognitive_level ON shs_testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE shs_tq.shs_tq_id = $tq_id AND (cognitive_level.cognitive_desc = 'Application' OR cognitive_level.cognitive_desc = 'Analysis' OR cognitive_level.cognitive_desc = 'Evaluation' OR cognitive_level.cognitive_desc = 'Synthesis')";
  $recog2 = mysql_query($sqlcog2);
  while($row=mysql_fetch_array($recog2)){
      $cog2=$row['sumpoints'];
  }
  if ($cog1!=0) {
    $cogni1=$cog1/$sum*100;
  }
  if ($cog2!=0) {
    $cogni2=$cog2/$sum*100;
  }
  
  $class->sqlclose();
?>

       <section class="col-lg-5">

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
                    <td colspan="2"><?php if (!empty($cogni1)) {
                      echo number_format($cogni1,2)."%";
                    }else{
                      echo "0%";
                      }   ?></td>
                    <td colspan="4"><?php if (!empty($cogni2)) {
                      echo number_format($cogni2,2)."%";
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
                    foreach ($topic_description1 as $rowt => $value) {
                        echo "<tr>";
                        $a=$topic_description1[$rowt];
                        echo "<td>".$a."</td>";
                        echo"<td>";
                            $class->shsgettest($a,$tq_id,1);
                        echo"</td>";
                        echo"<td>";
                            $class->shsgettest($a,$tq_id,2);
                        echo"</td>";
                        echo"<td>"; 
                            $class->shsgettest($a,$tq_id,3);
                        echo"</td>";
                        echo"<td>"; 
                            $class->shsgettest($a,$tq_id,4);
                        echo"</td>";
                        echo"<td>"; 
                            $class->shsgettest($a,$tq_id,5);
                        echo"</td>";
                        echo"<td>"; 
                            $class->shsgettest($a,$tq_id,6);
                        echo"</td>";
                        echo"<td>"; 
                            $class->shstotalii($a,$tq_id);
                        echo"</td>";
                        echo"<td>"; 
                            $class->shstotalpp($a,$tq_id);
                        echo"</td>";
                      }
                      $class->sqlclose();
                    ?>
                  <tr>
                    <th>Total</th>
                    <td>
                        <?php $class->shstotal($tq_id,1); ?>
                    </td>
                    <td>
                        <?php $class->shstotal($tq_id,2); ?>
                    </td>
                    <td>
                        <?php $class->shstotal($tq_id,3); ?>
                    </td>
                    <td>
                        <?php $class->shstotal($tq_id,4); ?>
                    </td>
                    <td>
                        <?php $class->shstotal($tq_id,5); ?>
                    </td>
                    <td>
                        <?php $class->shstotal($tq_id,6); ?>
                    </td>
                    <td>
                        <?php $class->shstotali($tq_id); ?>
                    </td>
                    <td>
                        <?php $class->shstotalp($tq_id); ?>
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
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </section>