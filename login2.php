<?php
session_start();
$message="";
if (isset($_POST['login'])) {
  if (empty($_POST['username']) || empty($_POST['password'])) {
    $message = "Username or Password is invalid";
  }else{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $connection = mysql_connect("localhost", "root", "");
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);
    $db = mysql_select_db("testbank", $connection);
    if ($username=="admin" OR $username=="print") {
      $query = mysql_query("select * from super_user where password='".$password."' AND username='".$username."'", $connection);
      while ($row=mysql_fetch_array($query)) {
        $id=$row['id'];
        $user=$row['username'];
        $pass=$row['password'];
        $role =$row['position'];
        $status=$row['status'];
        if ($status=="offline") {
          if (strcmp($username, $user) == 0 AND strcmp($password, $pass)== 0) {
            $query1 = "UPDATE super_user SET status='offline' WHERE username='".$user."' AND id='".$id."'";
            if (mysql_query($query1)) {
              $_SESSION['login_user']=$user;
              $_SESSION["role"]=$role;
              $_SESSION['login_user_id']=$id;
            }
          }else {
           $message = "Username or Password is invalid";
          }
        }else{
         $message = "User is already logged in";
        }
          
      }
    }else{
      
      $query = mysql_query("select * from user_access where password='".$password."' AND username='".$username."'", $connection);
      if (mysql_num_rows($query)==0) {
           $message = "Username or Password is invalid";
      }else{
        while ($row=mysql_fetch_array($query)) {
          $user=$row['username'];
          $pass=$row['password'];
          $status=$row['status'];
          $id=$row['user_id'];
          $role = $row['position'];
          
          if ($status=="offline") {
            
            if (strcmp($username, $user) == 0 AND strcmp($password, $pass)== 0){
              $query1 = "UPDATE user_access SET status='offline' WHERE username='".$user."' AND user_id='".$id."'";
              if (mysql_query($query1)) {
                $_SESSION['login_user']=$user;
                $_SESSION["role"]=$role;
                $_SESSION['login_user_id']=$id;
              }
                
            }else {
                $message = "Username or Password is invalid";
            }
          }else{
              $message = "User is already logged in";
          }
        }
      }
    }
  }
}
?>