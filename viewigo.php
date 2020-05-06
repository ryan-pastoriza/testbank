<?php
$db = new PDO('mysql:host=localhost;dbname=testbank','root','');

$stmt = $db->prepare("select * from igo");
$stmt->execute();
while ($row = $stmt->fetch()) {
	?>
			<tr>
				<td><?php echo $row['iga']; ?></td>
				<td><?php echo $row['igc']; ?></td>
				<td><?php echo $row['igo']; ?></td>
				<td><?php echo $row['igo_datetime']; ?></td>
				<td><?php echo $row['revise']; ?></td>
				<td>
					 <button class="btn btn-warning btn-xs glyphicon glyphicon-edit"></button>
				</td>
			</tr>
			<?php
}

?>
