<?php
$connection = mysql_connect('localhost','root','') or die(mysql_error());
$database = mysql_select_db('testbank') or die(mysql_error());

if (!empty($_GET)) {
	$page=$_GET['p'];
	if ($page=='createpgo') {
		$id=$_POST['id1'];
		$course=$_POST['course1'];
		$pga=htmlspecialchars($_POST['pga1']);
		$pgc=htmlspecialchars($_POST['pgc1']);
		$pgo=htmlspecialchars($_POST['pgo1']);
		$year=$_POST['year1'];
		$igoval=$_POST['igoval1'];
		$status="checked";

		$insert = "INSERT INTO `pgo` (`pgo_id`,`pga`,`pgc`,`pgo`,`course`,`year`,`pgo_datetime`,`revise`,`user_id`) VALUES ('','".$pga."','".$pgc."','".$pgo."','".$course."','".$year."',NOW(),0,'".$id."')";
		$exe=mysql_query($insert) or die("Query Failed : ".mysql_error());
		$pgo_id=mysql_insert_id();
		$sql=mysql_query("SELECT * from igo");
		while($row = mysql_fetch_array($sql)){
			$igo_id=$row['igo_id'];
			$insert = "INSERT INTO `igo_pgo` (`igo_pgo_id`,`igo_id`,`pgo_id`,`status`) VALUES ('','".$igo_id."','".$pgo_id."','')";
			$exe=mysql_query($insert) or die("Query Failed : ".mysql_error());
		}
		foreach ($igoval as $igoid) {
			$query= 'UPDATE igo_pgo SET status="'.$status.'" WHERE pgo_id="'.$pgo_id.'" AND igo_id="'.$igoid.'"';
			$result = mysql_query($query) or die("Query Failed".mysql_error());
		}

	}else if($page=='updatepgo'){
		$id=$_POST['id1'];
		$updateid=$_POST['updateid'];
		$uppga=htmlspecialchars($_POST['uppga1']);
		$uppgc=htmlspecialchars($_POST['uppgc1']);
		$uppgo=htmlspecialchars($_POST['uppgo1']);
		$pgoyear=$_POST['pgoyear1'];
		$rev=$_POST['rev1'];
		$igoval=$_POST['igoval1'];
		$status="checked";

		$query= 'UPDATE pgo SET pga="'.$uppga.'", pgc="'.$uppgc.'", pgo="'.$uppgo.'", year="'.$pgoyear.'", pgo_datetime=NOW(), revise="'.$rev.'", user_id="'.$id.'" WHERE pgo_id="'.$updateid.'"';
		$result = mysql_query($query) or die("Query Failed update insertemp: ".mysql_error());

		$query1= 'UPDATE igo_pgo SET status=" " WHERE pgo_id="'.$updateid.'"';
		$result1 = mysql_query($query1) or die("Query Failed".mysql_error());

		foreach ($igoval as $igoid) {
			$query= 'UPDATE igo_pgo SET status="'.$status.'" WHERE pgo_id="'.$updateid.'" AND igo_id="'.$igoid.'"';
			$result = mysql_query($query) or die("Query Failed".mysql_error());
		}
	}else if($page=='read'){
		$id =$_POST['id'];
		$dep =$_POST['dep'];
		$i = array();
		$obj = array();
		$data = array();
		$sql=mysql_query("SELECT * FROM program_information WHERE program_information.course ='".$dep."'");
		if (mysql_num_rows($sql)==0) {
			$a="No data";
			$b="No data";
			$c="No data";
			$obj[]="No data";
			$i[]="No data";
		}else{
			while($row = mysql_fetch_array($sql)){
				$a=$row['prog_vision'];
				$b=$row['prog_mission'];
				$c=$row['prog_desc'];
				$d=$row['p_i_id'];
			}
			$sql1=mysql_query("SELECT * FROM prog_ed_objectives WHERE prog_ed_objectives.p_i_id ='".$d."' ORDER BY prog_ed_objectives.num ASC");
			if (mysql_num_rows($sql1)==0) {
				$obj[]="No data";
				$i="No data";
			}else{
				while($row = mysql_fetch_array($sql1)){
					$b1=$row['ob_desc'];
					$i[]=$row['ob_id'];
					$obj[]=$b1;
				}
			}
		}
		
		$data[]=array('pv'=>$a, 'pm'=>$b, 'pd'=>$c, 'obj'=>$obj, 'd'=>$i);
		echo json_encode($data);
	}else if($page=='savepi'){
		$data = array();
		$year=date("Y");
		$id=$_POST['id'];
		$dep=$_POST['dep'];
		$pv=$_POST['pv'];
		$pm=$_POST['pm'];
		$pd=$_POST['pd'];

		$sql=mysql_query("SELECT program_information.p_i_id FROM program_information WHERE program_information.course ='".$dep."'");
		if (mysql_num_rows($sql)==0) {
			$insert = "INSERT INTO `program_information` (`p_i_id`,`prog_vision`,`prog_mission`,`prog_desc`,`course`,`year`,`user_id`) VALUES ('','".$pv."','".$pm."','".$pd."','".$dep."','".$year."','".$id."')";
			$exe=mysql_query($insert) or die("Query Failed : ".mysql_error());
			$data[]=array('msg'=>'Saved!');
		}else{
			$query= 'UPDATE program_information SET prog_vision="'.$pv.'",prog_mission="'.$pm.'",prog_desc="'.$pd.'",year="'.$year.'",user_id="'.$id.'" WHERE course="'.$dep.'"';
			$result = mysql_query($query) or die("Query Failed".mysql_error());
			$data[]=array('msg'=>'Updated!');
		}
		echo json_encode($data);
	}else if($page=='deleteobj'){
		$data = array();
		$id=$_POST['id'];
		$del1 = "DELETE FROM prog_ed_objectives WHERE ob_id='".$id."'";
        $resulta1=mysql_query($del1) or die("Query Failed prog_ed_objectives: ".mysql_error());
        $data[]=array('msg'=>'Deleted!');
        echo json_encode($data);
	}else if($page=='loadobj'){
		$data = array();
		$dep=$_POST['dep'];
		$sql1=mysql_query("SELECT prog_ed_objectives.num FROM program_information INNER JOIN prog_ed_objectives ON prog_ed_objectives.p_i_id = program_information.p_i_id WHERE program_information.course ='".$dep."'");
		if (mysql_num_rows($sql1)==0) {
			$num=0;
		}else{
			$num=mysql_num_rows($sql1);
		}
		$data[]=array('num'=>$num);
        echo json_encode($data);
	}else if($page=='loadob'){
		$data = array();
		$dep=$_POST['dep'];
		$num=$_POST['num'];
		$sql1=mysql_query("SELECT prog_ed_objectives.ob_desc FROM program_information INNER JOIN prog_ed_objectives ON prog_ed_objectives.p_i_id = program_information.p_i_id WHERE program_information.course = '".$dep."' AND prog_ed_objectives.num ='".$num."'");
		if (mysql_num_rows($sql1)==0) {
			$ob="";
		}else{
			while($row = mysql_fetch_array($sql1)){
				$ob=$row['ob_desc'];
			}
		}
		$data[]=array('ob'=>$ob);
        echo json_encode($data);
	}else if($page=='saveob'){
		$data = array();
		$dep=$_POST['dep'];
		$ob=$_POST['ob'];
		$sql=mysql_query("SELECT program_information.p_i_id FROM program_information WHERE program_information.course ='".$dep."'");
		if (mysql_num_rows($sql)==0) {
			$data[]=array('msg'=>'No Data!');
		}else{
			while($row = mysql_fetch_array($sql)){
					$p_i_id=$row['p_i_id'];
			}
			$insert = "INSERT INTO `prog_ed_objectives` (`ob_id`,`num`,`ob_desc`,`p_i_id`) VALUES ('','','".$ob."','".$p_i_id."')";
			$exe=mysql_query($insert) or die("Query Failed : ".mysql_error());
			$data[]=array('msg'=>'Saved!');
			
		}
			
		echo json_encode($data);
	}
}

?>