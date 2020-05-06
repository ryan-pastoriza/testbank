
<?php
    require_once("testcon.php");
    if(isset($_GET['conver_id'])){
        $conver_id = base64_decode($_GET['conver_id']);
        $q = mysqli_query($connection, "SELECT * FROM `messages` WHERE conver_id='$conver_id' limit 50");
        if(mysqli_num_rows($q) > 0){
            while ($m = mysqli_fetch_assoc($q)) {
                $from_user = $m['from_user'];
                $to_user = $m['to_user'];
                $message = $m['message'];
                $user = mysqli_query($connection, "SELECT * FROM `user_access` INNER JOIN `employment` ON user_access.employment_id = employment.employment_id INNER JOIN `employees` ON employment.employee_id = employees.employee_id INNER JOIN `department` ON employment.department_id = department.department_id WHERE user_id='$from_user'");
                $user_fetch = mysqli_fetch_assoc($user);
                $user_fname = utf8_encode($user_fetch['employee_fname']);
                $user_mname = utf8_encode($user_fetch['employee_mname']);
                $user_lname = utf8_encode($user_fetch['employee_lname']);
                $user_ext = utf8_encode($user_fetch['employee_ext']);
                $user_from_username = $user_fname." ".$user_mname." ".$user_lname." ".$user_ext;
                echo    "<div class='message'>
                            <div class='direct-chat-info clearfix' id='scroll'>
                                <a href='#'><h4>{$user_from_username}</h4></a>
                                <p><h5>{$message}</h5></p>
                            </div>
                        </div>";
            }
        }else{
            echo "No Messages";
        }
    }

?>