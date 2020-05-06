
<table style="font-family:arial; font-size:	10px;"  face="Courier New">
	<thead>
		<tr>
			<td width="220"></td>
			<td width="60"><img src="image/tos img.png"></td>
			<td width="410" style="text-align: center;">
				<?php
		          if ($department=='ITE' OR $department=='CS') {
		            $dep1='<h5><b>Information Technology Education Department
		          Bachelor of Science in Information Technology</b></h5>';
		          }else if ($department=='GEN') {
		          	$dep1='<h5><b>General Education Department</b></h5>';
		          }else if ($department=='BA'){
		            $dep1='<h5><b>Business Education Program Department</b></h5>';
		          }
		          echo $dep1; 
		        ?>
        	</td>
        	<td width="290"></td>
		</tr>
		<tr>
			<td colspan="4" style="text-align: center;" width="980"><h4><b>TABLE OF SPECIFICATION</b></h4></td>
		</tr>
		<tr>
			<td width="220">Name of Teacher: </td>
			<td colspan="4" width="760" class="name"><?php echo $fullname_session; ?></td>
		</tr>
		<?php $class->gettoshead($tq_id,$department)?>
	</thead>
</table>
<br/>
<table cellpadding="5" border="solid" class="table table-bordered" style="font-family:arial; font-size:	10px;"  face="Courier New">
	<thead class="tostbody">
		<tr>
			<td width="220" style="text-align: center;" rowspan="2">Topic Covered</td>
			<td width="95" style="text-align: center;" rowspan="2">Number of Hours</td>
			<td width="95" style="text-align: center;" rowspan="2">Number of Items</td>
			<td width="95" style="text-align: center;">Knowledge</td>
			<td width="95" style="text-align: center;">Comprehension</td>
			<td width="95" style="text-align: center;">Application</td>
			<td width="95" style="text-align: center;">Analysis</td>
			<td width="95" style="text-align: center;">Evaluation</td>
			<td width="95" style="text-align: center;">Synthesis</td>
		</tr>
		<tr>
			<td height="10" ="95" style="text-align: center;">Remembering</td>
			<td height="10" style="text-align: center;">Understanding</td>
			<td height="10" style="text-align: center;">Applying</td>
			<td height="10" style="text-align: center;">Analysing</td>
			<td height="10" style="text-align: center;">Evaluating</td>
			<td height="10" style="text-align: center;">Creating</td>
		</tr>
		<?php $class->gettostopic($tq_id)?>
	</thead>
</table>
<table style="font-family:arial; font-size:	12px;"  face="Courier New" >
	<tr>
		<td colspan="9"></td>
	</tr>
	<tr>
		<td width="185">Prepared and Submitted:</td>
		<td width="185">Checked:</td>
		<td width="250">Approved:</td>	
		<td></td>
	</tr>
	<tr>
		<td height="15"></td>
		<td height="15"></td>
		<td height="15"></td>	
		<td height="15"></td>
	</tr>
	<tr valign="top">
		<td><b><?php echo $fullname_session; ?></b></td>
		<td><b><?php $class->checkdean($depart); ?></b></td>
		<td><b>ALAN L. ATEGA</b></td>
		<td rowspan="2">
			<table style="font-family:arial; font-size:	12px; text-align: center;"  border="solid" class="table table-bordered"  face="Courier New">
				<tr>
					<td width="250">Test #</td>
					<td width="250">Type of Test</td>
					<?php $class->gettestn($tq_id)?>
				</tr>
			</table>
		</td>
	</tr>
</table>