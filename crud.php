<?php
$connection = mysql_connect('localhost','root','') or die(mysql_error());
$database = mysql_select_db('testbank') or die(mysql_error());

if (!empty($_GET)) {
	$page=$_GET['p'];
	if ($page=='create') {
		$id=htmlspecialchars($_POST['id1']);
		$iv=htmlspecialchars($_POST['iv1']);
		$im=htmlspecialchars($_POST['im1']);
		$qps=htmlspecialchars($_POST['qps1']);
		$ig=htmlspecialchars($_POST['ig1']);
		$icv=htmlspecialchars($_POST['icv1']);

		$sql=mysql_query("SELECT iid FROM `ii` WHERE iid='1'");
		if (mysql_num_rows($sql)==0) {
			$insert = "INSERT INTO `ii` (`iid`,`iv`,`im`,`qps`,`ig`, `icv`,`id`) VALUES ('1','".$iv."','".$im."','".$qps."','".$ig."','".$icv."','".$id."')";
			$exe=mysql_query($insert) or die("Query Failed1 : ".mysql_error());
		}else{
			$query= 'UPDATE ii SET iv="'.$iv.'", im="'.$im.'", qps="'.$qps.'", ig="'.$ig.'", icv="'.$icv.'", id="'.$id.'" WHERE iid="1"';
			$result = mysql_query($query) or die("Query Failed update insertemp: ".mysql_error());
		}
	}else if($page=='read'){
		$data = array();
		$sql=mysql_query("SELECT * FROM `ii` WHERE iid='1'");
		if (mysql_num_rows($sql)==0) {
			$a="No data";
			$b="No data";
			$c="No data";
			$d="No data";
			$e="No data";
			$data[]=array('iv'=>$a, 'im'=>$b, 'qps'=>$c, 'ig'=>$d, 'icv'=>$e);
			echo json_encode($data);
			
		}else{
			while($row = mysql_fetch_array($sql)){
				$a=html_entity_decode($row['iv']);
				$b=html_entity_decode($row['im']);
				$c=html_entity_decode($row['qps']);
				$d=html_entity_decode($row['ig']);
				$e=html_entity_decode($row['icv']);
				$data[]=array('iv'=>$a, 'im'=>$b, 'qps'=>$c, 'ig'=>$d, 'icv'=>$e);
				echo json_encode($data);
			}
		}
		
	}else if ($page=='createigo') {
		$id=$_POST['id1'];
		$igan=htmlspecialchars($_POST['igan1']);
		$igcn=htmlspecialchars($_POST['igcn1']);
		$igon=htmlspecialchars($_POST['igon1']);

		$insert = "INSERT INTO `igo` (`igo_id`,`iga`,`igc`,`igo`,`igo_datetime`,`revise`,`id`) VALUES ('','".$igan."','".$igcn."','".$igon."',NOW(),0,'".$id."')";
		$exe=mysql_query($insert) or die("Query Failed1 : ".mysql_error());

	}else if($page=='updateigo'){
		$id=$_POST['id1'];
		$updateid=$_POST['updateid'];
		$iga=$_POST['igan1'];
		$igc=$_POST['igcn1'];
		$igo=$_POST['igon1'];
		$rev=$_POST['revn'];
		$rev1=$rev+1;
		$query= 'UPDATE igo SET iga="'.$iga.'", igc="'.$igc.'", igo="'.$igo.'", igo_datetime=NOW(), revise="'.$rev1.'", id="'.$id.'" WHERE igo_id="'.$updateid.'"';
		$result = mysql_query($query) or die("Query Failed update insertemp: ".mysql_error());

	}else if($page=='delete'){
		$del=$_GET['del'];
		$delete = "DELETE FROM igo WHERE igo_id='".$del."'";
		$resulta=mysql_query($delete) or die("Query Failed subtopics: ".mysql_error());
	
	}
}else{
		$db = new PDO('mysql:host=localhost;dbname=testbank','root','');

$stmt = $db->prepare("select * from igo");
$stmt->execute();
while ($row = $stmt->fetch()) {
	?>
			<tr>
				<td><?php echo html_entity_decode($row['igo_id']); ?></td>
				<td><?php echo html_entity_decode($row['iga']); ?></td>
				<td><?php echo html_entity_decode($row['igc']); ?></td>
				<td><?php echo html_entity_decode($row['igo']); ?></td>
				<td><?php echo html_entity_decode($row['igo_datetime']); ?></td>
				<td><?php echo html_entity_decode($row['revise']); ?></td>
				<td>
					<button type="button" class="btn btn-warning btn-xs glyphicon glyphicon-edit" data-toggle="modal" data-target="#editigo<?php echo $row['igo_id']; ?>"></button>
					<button class="btn btn-danger btn-xs glyphicon glyphicon-trash" data-toggle="modal" data-target="#del<?php echo $row['igo_id']; ?>"></button>
					<div class="modal fade" id="del<?php echo $row['igo_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel"><strong>Warning</strong></h4>
					      </div>
					      <div class="modal-body">
					        <form>
					          Are you sure you want to delete this IGO?
					          <div class="modal-footer">
					            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
					            <button type="button" onclick="deleteigo(<?php echo $row['igo_id']; ?>)" data-dismiss="modal"  class="btn btn-primary">Yes</button>
					          </div>
					        </form>
					      </div>
					    </div>
					  </div>
					</div>
					<div class="modal fade" id="editigo<?php echo $row['igo_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addnewLabel">
		              <div class="modal-dialog" role="document">
		                <div class="modal-content">
		                  <div class="modal-header">
		                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                    <h4 class="modal-title" id="myModalLabel"><strong>Edit IGO</strong></h4>
		                  </div>
		                  <div class="modal-body">
		                    <form>
		                    <div class="row">
		                    	<div class="col-xs-12">
			                      <div class="form-group">
			                      <input type="hidden" id="rev<?php echo $row['igo_id']; ?>" value="<?php $revn = $row['revise']+1; echo $revn; ?>" >
			                        <label for="name">Institutional Graduate Attributes</label><br/>
			                        <input type="text" style="width:570px;" class="form-control" id="iga<?php echo $row['igo_id']; ?>" value="<?php echo $row['iga']; ?>">
			                      </div>
			                    </div>
		                    </div>
		                    <div class="row">
		                    	<div class="col-xs-12">
			                      <div class="form-group">
			                        <label for="lname">Institutional Graduate Code</label><br/>
			                        <input type="text" style="width:570px;" class="form-control" id="igc<?php echo $row['igo_id']; ?>" value="<?php echo $row['igc']; ?>">
			                      </div>
			                    </div>
		                    </div>
		                    <div class="row">
		                    	<div class="col-xs-12">
			                      <div class="form-group">
			                        <label for="lname">Institutional Graduate Outcomes</label><br/>
			                        <textarea rows="1"  style="width:570px; resize: vertical;"class="form-control" id="igo<?php echo $row['igo_id']; ?>" placeholder="Outcomes"  name="igon"><?php echo $row['igo']; ?></textarea>
			                      </div>
			                    </div>
		                    </div>
		                      <div class="modal-footer">
		                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		                        <button type="button" onclick="update(<?php echo $row['igo_id']; ?>)" data-dismiss="modal" class="btn btn-primary" id="<?php echo $row['igo_id']; ?>">Save</button>
		                      </div>
		                    </form>
		                  </div>
		                </div>
		              </div>
		            </div>
				</td>
			</tr>
			<?php
}

	}
	