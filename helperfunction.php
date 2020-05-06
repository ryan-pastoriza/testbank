<?php
session_start();
function liFunction($where,$tablename){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "testbank";
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM $tablename WHERE $where ORDER BY date_time DESC";
  $arr = [];

  $fullname = '';
  $content = '';

  $result = $conn->query($sql);

  if($result->num_rows != null){
    while ($row = $result->fetch_assoc()){
      $fullname = $row['employee_fname'].' '.$row['employee_mname'].' '.$row['employee_lname'];
      $content = $row['subj_name'];

      $arr[] = [
        'username' => $fullname,
        'content' => $content
      ];
    }
  } else {
    while ($row = $result->fetch_assoc()){
      $arr[] = [
        'username' => $fullname,
        'content' => $content
      ];
    }
  }

 
  $conn->close();
  return $arr;
  
}

function countFunction($where,$tablename){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "testbank";
    $conn = new mysqli($servername, $username, $password, $dbname);
    

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM $tablename WHERE $where"; 
    
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    $count = $result->num_rows;
    $conn->close();
    return $count;  
}

function updateFunction($tablename,$columnname,$where){
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "testbank";
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $sql = "UPDATE $tablename SET $columnname WHERE $where";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $count = $result->num_rows;
      $conn->close();
      return $count;     
}

function otherUpdateFunction($tablename,$columnname){
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "testbank";
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $sql = "UPDATE $tablename SET $columnname";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      
      $count = $result->num_rows;
      $conn->close();
      return $count;   
}

function deanSyllabusNotifFunction($where,$tablename){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "testbank";
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM $tablename WHERE $where"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    $count = $result->num_rows;
    
    $conn->close();
    return $count; 
}

function deanSyllabusLiFunction($where,$tablename){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "testbank";
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM $tablename WHERE $where ORDER BY syll_date_time DESC";
  $arr = [];

  $fullname = '';
  $content = '';

  $result = $conn->query($sql);

  if($result->num_rows != null){
    while ($row = $result->fetch_assoc()){
      $fullname = $row['employee_fname'].' '.$row['employee_mname'].' '.$row['employee_lname'];
      $content = $row['subj_name'];

      $arr[] = [
        'username' => $fullname,
        'content' => $content
      ];
    }
  } else {
    while ($row = $result->fetch_assoc()){
      $arr[] = [
        'username' => $fullname,
        'content' => $content
      ];
    }
  }

 
  $conn->close();
  return $arr;
  
}

function updateSyllabusNotifFunction($tablename,$columnname,$where){
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "testbank";
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $sql = "UPDATE $tablename SET $columnname WHERE $where";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $count = $result->num_rows;
      $conn->close();
      return $count;  
}

function syllabusLiFunction($where,$tablename){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "testbank";
  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM $tablename WHERE $where ORDER BY syll_date_time DESC";
  $arr = [];

  $fullname = '';
  $content = '';

  $result = $conn->query($sql);

  if($result->num_rows != null){
    while ($row = $result->fetch_assoc()){
      $fullname = $row['employee_fname'].' '.$row['employee_mname'].' '.$row['employee_lname'];
      $content = $row['subj_name'];

      $arr[] = [
        'username' => $fullname,
        'content' => $content
      ];
    }
  } else {
    while ($row = $result->fetch_assoc()){
      $arr[] = [
        'username' => $fullname,
        'content' => $content
      ];
    }
  }

 
  $conn->close();
  return $arr;
  
}

function syllabusCountFunction($where,$tablename){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "testbank";
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM $tablename WHERE $where"; 
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    $count = $result->num_rows;
    
    $conn->close();
    return $count;    
}
?>
