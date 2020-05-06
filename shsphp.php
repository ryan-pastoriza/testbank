<?php
$connection = mysql_connect('localhost','root','') or die(mysql_error());
$database = mysql_select_db('testbank') or die(mysql_error());

if (!empty($_GET)) {
	$page=$_GET['p'];
	if ($page=='addtopic') {
		$sid=$_POST['sid'];
		$period=$_POST['period'];
		$topic=$_POST['topic'];

		$insert = "INSERT INTO `shs_topics` (`shs_topics_id`,`shs_topic_description`,`exam_id`,`shs_subj_id`) VALUES ('','".$topic."','".$period."','".$sid."')";
		$exe=mysql_query($insert) or die("Query Failed : ".mysql_error());
	}elseif ($page=='loadtopic') {
		$topics_id=array();
		$topic_description=array();
		$exam_period=array();
		$exam_id=array();
		$subj_id=array();
		$data=array();
		$sid=$_POST['sid'];
	 	$sql = "SELECT shs_topics.shs_topics_id, shs_topics.shs_topic_description, major_exams.exam_period, shs_topics.exam_id, shs_topics.shs_subj_id FROM shs_topics INNER JOIN major_exams ON shs_topics.exam_id = major_exams.exam_id WHERE shs_topics.shs_subj_id = '".$sid."'";
        $result = mysql_query($sql);
        if(!$result){
            $msg[]='Error Database';
        }else{
            if (mysql_num_rows($result)==0) {
                $msg[]='No Topic found';            
            }else{
                while($row=mysql_fetch_array($result)){
                    $topics_id[]=$row['shs_topics_id'];
                    $topic_description[]=$row['shs_topic_description'];
                    $exam_period[]=$row['exam_period'];
                    $exam_id[]=$row['exam_id'];
                    $subj_id[]=$row['shs_subj_id'];
                }
            }
        }
	    $data[]=['topics_id'=>$topics_id, 'topic_description'=>$topic_description, 'exam_period'=>$exam_period, 'exam_id'=>$exam_id, 'subj_id'=>$subj_id];
		echo json_encode($data);
	}else if ($page=="deletetopic") {
		$del=$_GET['del'];
		$subid=$_GET['subid'];
		$delete = "DELETE FROM shs_topics WHERE shs_subj_id='".$subid."' AND shs_topics_id='".$del."'";
		$resulta=mysql_query($delete) or die("Query Failed subtopics: ".mysql_error());
		$data[]=['msg'=>"Deleted!"];
		echo json_encode($data);

	}else if ($page=='openmodal') {
		$topics_id="";
		$topic_description="";
		$exam_period="";
		$exam_id="";
		$subj_id="";
		$data=array();
		$topicid=$_POST['topicid'];
		$subid=$_POST['subid'];
	 	$sql = "SELECT shs_topics.shs_topics_id, shs_topics.shs_topic_description, major_exams.exam_period, shs_topics.exam_id, shs_topics.shs_subj_id FROM shs_topics INNER JOIN major_exams ON shs_topics.exam_id = major_exams.exam_id WHERE shs_topics.shs_topics_id = '".$topicid."'";
        $result = mysql_query($sql);
        if(!$result){
            $msg[]='Error Database';
        }else{
            if (mysql_num_rows($result)==0) {
                $msg[]='No Topic found';            
            }else{
                while($row=mysql_fetch_array($result)){
                    $topics_id=$row['shs_topics_id'];
                    $topic_description=$row['shs_topic_description'];
                    $exam_period=$row['exam_period'];
                    $exam_id=$row['exam_id'];
                    $subj_id=$row['shs_subj_id'];
                }
            }
        }
	    $data[]=['topics_id'=>$topics_id, 'topic_description'=>$topic_description, 'exam_period'=>$exam_period, 'exam_id'=>$exam_id, 'subj_id'=>$subj_id];
		echo json_encode($data);
	}else if ($page=="updatetopic") {
		$topicid=$_POST['topicid'];
		$period=$_POST['period'];
		$topic = mysql_real_escape_string($_POST['topic']);
		$data=array();
		$query1 = "UPDATE shs_topics SET shs_topic_description='".$topic."', exam_id='".$period."' WHERE shs_topics_id='".$topicid."'";
		$result1=mysql_query($query1) or die("Query Failed update shs_topics: ".mysql_error());
		
		$data[]=['msg'=>"updated"];
		echo json_encode($data);
	}
}
?>