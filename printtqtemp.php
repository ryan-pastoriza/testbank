
    
    <table width="800">
      <tr>
        <td rowspan="4" style="width:160px; height:80px;" align="right"></td><td rowspan="4" align="right"><img src="img/amalogo.png" style='width:60px;height:80px;'></td>
      </tr>
      <tr>
      	 <td align="center" ><b>ACLC College of Butuan</b></td>
         <td style="width:200px;"></td>
      </tr>
      <tr>
      	<td align="center" ><b>Butuan Information Technology Services, Inc</b></td>
        <td style="width:200px;"></td>
      </tr>
      <tr>
      	<td align="center" >HDS Bldg. 999 J.C. Aquino Avenue, Butuan City</td>
        <td style="width:200px;"></td>
      </tr>
      <tr>
        <td colspan="4" align="center"><h5><b><?php $class->checkperiod($tq_id); ?> Examinition</b></h5></td>
      </tr>
      <tr>
      	<td colspan="4" align="center"><h5><b><?php $class->checksub($tq_id); ?></b></h5></td>
      </tr>
      <tr>
        <td><br></td>
      </tr>
      <?php $class->loadinstruction($tq_id); ?>
    </table>
    
      <?php $class->previewtq($tq_id); ?>
    <br>


