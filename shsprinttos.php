
<table style="font-family:arial; font-size:	10px;"  face="Courier New">
	<thead>
		<tr>
			<td width="220"></td>
			<td width="60"><img src="image/tos img.png"></td>
			<td width="400" style="padding: 0px 0px 0px 120px;">
				Senior High School Department                                
        	</td>
        	<td width="220"></td>
		</tr>
		<tr>
			<td colspan="4" style="text-align: center;" width="980"><h4><b>TABLE OF SPECIFICATION</b></h4></td>
		</tr>
		<tr>
			<td width="220">Name of Teacher: </td>
			<td colspan="4" width="760" class="name"><?php echo $fullname_session; ?></td>
		</tr>
		<?php $class->shsgettoshead($tq_id)?>
	</thead>
</table>
<br/>
<table cellpadding="5" border="solid" class="table table-bordered" style="font-family:arial; font-size:	10px;"  face="Courier New">
	<thead class="tostbody">
		<tr>
			<td width="220" style="text-align: center;">Topic Covered</td>
			<td width="95" style="text-align: center;">Number of Hours</td>
			<td width="95" style="text-align: center;">Number of Items</td>
			<td width="95" style="text-align: center;">Knowledge</td>
			<td width="95" style="text-align: center;">Comprehension</td>
			<td width="95" style="text-align: center;">Application</td>
			<td width="95" style="text-align: center;">Analysis</td>
			<td width="95" style="text-align: center;">Evaluation</td>
			<td width="95" style="text-align: center;">Synthesis</td>
		</tr>
		<?php $class->shsgettostopic($tq_id)?>
	</thead>
</table>
<table style="font-family:arial; font-size:	12px;"  face="Courier New">
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
					<?php $class->shsgettestn($tq_id)?>
				</tr>
			</table>
		</td>
	</tr>
</table>
