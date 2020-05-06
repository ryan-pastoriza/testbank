<!DOCTYPE html>
<?php
include 'class.php';
$class = new testbank();
include('login2.php'); 
if (isset($_SESSION['login_user'])) {
  $user_check=$_SESSION['login_user'];
  if($user_check=="print"){
  header('Location: print_index.php');
  }else if($user_check=="admin"){
  header('Location: admin_index.php');
  }else if ($user_check != 'admin' or $user_check != 'print') {
    if($_SESSION["role"]=="Instructor"){
      header("Location: instructor_index.php");
    }elseif($_SESSION["role"]=="Program Head"){
      header("Location: ph_index.php");
    }elseif($_SESSION["role"]=="Dean" or $_SESSION["role"]=="Academic Head"){
      header("Location: dean_index.php");
    }
  }
}

?>
<html lang="en">
<head>
  <title>ACLC | TestBank</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="plugins/jQuery/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="js/login.js"></script>
  
  <!-- http://smallenvelop.com/display-loading-icon-page-loads-completely/ -->
  <link rel="stylesheet" href="style.css"> 
  
  <style type="text/css">

/* Paste this css to your style sheet file or under head tag */
/* This only works with JavaScript, 
if it's not present, don't show loader */
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url(image/Preloader_2.gif) center no-repeat #fff;
}


/*Base Style*/
footer{
  bottom:0px;
  left:0px;
  width:100%;
  line-height: 35px;
  text-align: center;
  font-weight: bold;
  background-color: #CCC;
}

/* Setting the background image*/

#background{
position: fixed;
top: 0;
left: 0;
width: 10000px;
  height: 100%;
 /*background: url('image/college_1.jpg') ;*/
  background-repeat: no-repeat;
  background-position:center;
  background-attachment: fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  z-index: -1;
 }

 .background-image-blur{
  -webkit-filter: blur(45px);
    -moz-filter: blur(45px);
    -o-filter: blur(45px);
    -ms-filter: blur(45px);
    filter: blur(45px);

    -webkit-transition: all 1s ease-out;
    -moz-transition: all 1s ease-out;
    -o-transition: all 1s ease-out;
    -ms-transition: all 1s ease-out;

    transition: all 1s ease-out;
 }



#header{
  width:100%;
  /*height:100px;*/
}

  .desktop-header{
    height: 100px;
  }

  .mobile-header{
    height: 0px;
  }

/* These 2 are temp styles. Get rid of them later*/
  #header-text h3{
    text-align: center;
    font-size: 30px;
  }

  #header-text p{
    text-align: center;
    font-size:20px;
  }

.form-body{
    margin:25px;
}

.form-top-right{
  width : 25%;
  float:left;
  font-size: 66px;
}
.form-top-left{
  width : 75%;
  float:left;
}

.form-element{
  display: inline;
  width:100%;
}
  button.form-element{
    margin-bottom: 20px;
  }

.module-form{
  /*border:1px solid blue;*/
  background-color: #ECF0F1;
  display: inline-block;
    vertical-align: middle;
    padding-left: 0px;
    padding-right: 0px;
    opacity: 0; /*We are going to animate this */
}
  .module-heading{
    margin:20px 0px;
  }


@media (min-width:768px){


  .middle-border {
      min-height: 300px;
      margin-top: 100px;
      border-right: 1px solid #000;
      border-right: 1px solid rgba(0, 0, 0, 0.6);
  }

  .mobile{
    display: none;
  }

  .desktop{
    display: inline;
  }

  .glyphicon-validation{
    font-size:15px;
    margin: 7px;
  }

}
@media (max-width:767px){


  .middle-border {
      min-height: auto;
      margin: 65px 30px 0 30px;
      border-right: 0;
  }

  .mobile{
    display: inline;
    margin:20px 0px;
  }

  .desktop{
    display: none;
  }

  .glyphicon-validation{
    font-size:10px;
    margin: 7px;
  }
}

/* Just to remove the default padding of bootstrap's col-*-* 
* mainly need this for the form-heading*/

/*#main-login{
  padding-left:0px;
  padding-right: 0px;
}*/

.form-header{
  width:100%;
  padding: 30px;
}

.multi-form-wrapper{
  /*margin-bottom:20px;*/
}
#hd{
  height: 100px;
}
</style>
<style type="text/css">
  #msgalert{
    color: red;
  }
</style>
<script type="text/javascript">
  $(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("fast");;
  });
</script>
</head>
<body>
  <div id="background"></div>
  <div id="hd"> </div>

  

    <div class="col-sm-4"></div>
    <div class="container multi-form-wrapper">
     <div class="form-container row">
      <div id="main-login" class="module-form   col-sm-4">
      


      <div class="form-content">
        <div class="form-header bg-primary text-white">
          <div class="form-top-left">
              <h3><strong>ACLC</strong> Test Bank</h3>
              <p>Login</p>
          </div>
          <div class="form-top-right">
              <span class="glyphicon glyphicon-lock"></span>
          </div>
          <br style="clear:both"/>
        </div>
        <div class="form-body">
          <form method="post">
            <div >
              <label for="USN"> <span class="glyphicon glyphicon-user"> </span> Username</label>
              <input type="username" class="form-control" placeholder="Username" name="username">
            </div>

            <div >
              <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <div id="loginalert">
              <p id="msgalert"><?php echo $message;?></p>
            </div>
            <br>
            <button type="submit" class="btn btn-default btn-primary btn-block submit-btn login-btn" name="login"><span class="glyphicon glyphicon-lock"></span>&nbsp; Login</button>
          </form>
        </div>
      </div>

  </div>



</body>
<div class="se-pre-con"></div>

</html>