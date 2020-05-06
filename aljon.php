<?php


switch ($act) {


	case 'getCollectibles':

		$start = 2006;
		$end = date("Y");
		
		$grandtotal = 0;
		$mustcollected = 0;

		for($j=$start;$j<$end;$j++){

			//$sy = $_POST['fy'];
			$sy = $j."-".($j+1);
			//echo $sy."<br>";
			$sem = array( "1st","2nd","Summer" );

			$total = 0;
			$totald = 0;
			$syTotal = 0; //get the total per sy
			$strr1 = "";
			foreach ($sem as $key => $val) {

				//get the COLLECTED AMOUNT
				$sql = "SELECT sum(amt) FROM payment WHERE sy`='{$sy}' AND `sem`='{$val}' AND `MODE = 'cash'";
				$a = mysql_query($sql,$dbase->db2());
				$paid = array();

				if($row=mysql_fetch_array($a)){
					//echo $val;
					$paid[$val] = $row[0];
				}

				//END OF COLLECTED AMOUNT



				$sql = "select sum(tbl_assessment_copy.amt) from tbl_assessment_copy where  tbl_assessment_copy.sem = '{$val}' and tbl_assessment_copy.sy = '{$sy}'";
				$a = mysql_query($sql,$dbase->db2());
				if($row=mysql_fetch_array($a))
					$total = $row[0];

				$sqls = "SELECT sum(amt) from tbl_discount2 where sy = '{$sy}' and sem = '{$val}'";
				$as = mysql_query($sqls,$dbase->db2());

				if($rows=mysql_fetch_array($as))
					$totald = $rows[0];
					$mustcollected = $total-$totald;

					$t = ($total-$totald)-$paid[$val];
					
					$amt = nega($t);
					if($t<0) $t = 0;
					$syTotal += $t;

				

				$strr1 .="<div class='ccHolder'>
						<div class='txtdLabel'>SEM:</div> 
					 	 <div class='txtdvalue total1'>{$val}</div>";

				$strr1 .="<div class='txtdLabel'>COLLECTIBLES:</div>
					     <div class='txtdvalue total1'>".number_format($mustcollected,2)."</div>";

				$strr1 .="<div class='txtdLabel'>COLLECTED:</div>
					     <div class='txtdvalue total1'>".number_format($paid[$val],2)."</div>";

				$strr1 .="<div class='txtdLabel'>REMAINING:</div>
						 <div class='txtdvalue total2'>{$amt}</div>
						 </div>";



				$grandtotal += $t;
				$musttotal += $mustcollected;

			}
			$fromsy = $start."-".($start+1);
			$strr .="<br>
					<a href='#{$sy}_' id='{$sy}_' style='text-decoration:none'>
						<div class='txtcaption' id='txtsy' onclick=\"toogleDiv('#{$sy}')\">
							{$sy}
							<span style='float:right; padding-right: 10px;' title='Total Collectibles from {$fromsy} to {$sy}'>".number_format($grandtotal,2)."</span>
						</div>
					</a>";
					
			// $strr .= "<div id='{$sy}' class='syholder'>".$strr1."<br>
			// 			<div class='txtbox' style='border:none;'>
			// 				<div class='txtlabel'>TOTAL:</div> 
			// 				<div class='txtcaption' style='font-size:20px;color:red'>".number_format($syTotal,2)."</div>
			// 			</div>
			// 			<br>
			// 		  </div>";
					
			$strr .= "<div id='{$sy}' class='syholder'>".$strr1."<br>
						  <div class='ccTotal' >
							<div class='cclbltotal'>TOTAL:</div>
						  	<div class='ccctotal total2'>".number_format($syTotal,2)."</div>
						  </div>
						  <br>
					  </div>";

		}

			if($_GET['get']=="overall")
				echo number_format($grandtotal,2);
			else
				echo $strr;

	break;


	default:
		# code...
		echo "hellow";
		break;
}

function nega($val){
	if($val<0) 
		return "(".number_format(abs($val),2).")";
	else
		return number_format($val,2);
}

function getCategory($acct){
	$dbase = new dbase();

	$sql = "SELECT category FROM voucheracct WHERE acctnum = '{$acct}'";
	$res = mysql_query($sql,$dbase->db1());
	if($row = mysql_fetch_array($res))
		return strtolower($row[0]);
	else
		return "";

}

?>