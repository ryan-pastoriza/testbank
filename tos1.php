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
  $sqlcog1="SELECT Sum(testquestions.points) AS sumpoints FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE tq.tq_id = $tq_id AND (cognitive_level.cognitive_desc = 'Knowledge' OR cognitive_level.cognitive_desc = 'Comprehension' )";
  $recog1 = mysql_query($sqlcog1);
  while($row=mysql_fetch_array($recog1)){
      $cog1=$row['sumpoints'];
  }
  $sqlcog2="SELECT Sum(testquestions.points) AS sumpoints FROM tq INNER JOIN test_number ON test_number.tq_id = tq.tq_id INNER JOIN testquestions ON testquestions.test_id = test_number.test_id INNER JOIN cognitive_level ON testquestions.cognitive_level_id = cognitive_level.cognitive_level_id WHERE tq.tq_id = $tq_id AND (cognitive_level.cognitive_desc = 'Application' OR cognitive_level.cognitive_desc = 'Analysis' OR cognitive_level.cognitive_desc = 'Evaluation' OR cognitive_level.cognitive_desc = 'Synthesis')";
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
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </section>