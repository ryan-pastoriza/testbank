<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysql_connect("localhost","root","");
    $db=mysql_select_db("testbank",$con);
    $query=mysql_query("select * from testquestions where question_desc LIKE '%{$key}%'");
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row['question_desc'];
    }
    echo json_encode($array);
?>
