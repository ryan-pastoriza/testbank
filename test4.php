<?php
include('db.php');

	// $week=8;
	// $syllabus_id=6;

	$week=$_POST['week'];
	$syllabus_id=$_POST['syll'];

	$sql_res=mysql_query("SELECT topics.topic_description, topics.topics_id, topics.tla, topics.resources, topics.oba, topics.syllabus_id, topics.ilo, topics.exam_id FROM topics WHERE topics.syllabus_id = '$syllabus_id' AND topics.week = '$week'");

		$data = array();
		while($row = mysql_fetch_array($sql_res)){
			$topics_id=$row['topics_id'];
			$sql_res1=mysql_query("SELECT subtopic.subtopic_description FROM subtopic WHERE subtopic.topics_id ='$topics_id'");
			$r=mysql_num_rows($sql_res1);
			$subtopic = array();
				while($rows = mysql_fetch_array($sql_res1)){
					$subtopic[]= $rows['subtopic_description'];
				}
			$data[]=['topic_description'=>$row['topic_description'], 'tla'=>$row['tla'],'ilo'=>$row['ilo'], 'resources'=>$row['resources'], 'oba'=>$row['oba'],'period'=>$row['exam_id'], 'subtopic'=>$subtopic];
		}      
	echo json_encode($data);
	

?>
