<?php
include('db.php');
$tpid =1;
$tq_id =6;
		$res2=mysql_query("SELECT topics.topic_description FROM topics WHERE topics.topics_id = '".$tpid."'");
		while ($row=mysql_fetch_array($res2)) {
			$topic_description=$row['topic_description'];
			echo "string".$topic_description;
			
		}
		
		$result = mysql_query("SELECT topics.topics_id FROM topics INNER JOIN syllabus ON topics.syllabus_id = syllabus.syllabus_id INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id WHERE topics.topic_description = '".$topic_description."' AND tq.tq_id = '".$tq_id."' ");
			
		while ($row2=mysql_fetch_array($result)) {
			$topics_id=$row2['topics_id'];
			echo "string".$topics_id;
		}
		
		
?>