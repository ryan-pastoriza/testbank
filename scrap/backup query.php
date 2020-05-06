<?php 
class testbank {


	function loaddb(){
		$server	    = 'localhost';
		$username	= 'root';
		$password	= '';
		$database	= 'testbank';

		if(!mysql_connect($server, $username, $password))
		{
 			exit('Error: could not establish database connection');
		}
		if(!mysql_select_db($database))
		{
 			exit('Error: could not select the database');
		}
	}

	function loademp(){
		$this->loaddb();
		$sql = "SELECT employees.employee_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, employment.employment_job_title, employment.employment_id, employment.employee_id, sched_subj.ss_id FROM employees , employment , sched_subj WHERE sched_subj.ss_id = employees.employee_id AND sched_subj.employment_id = employment.employment_id ORDER BY employees.employee_lname ASC";
		$result = mysql_query($sql);
		if(!$result){
			echo 'The categories could not be displayed, please try again later.';
		}else{
			while($row=mysql_fetch_array($result)){
				echo '<tr><td><input type="hidden" name="id[]" class="form-control" id="id[]" value="'.$cdno=$row['ss_id'].'">'.$cdno=$row['employee_fname'].' '.$cdno=$row['employee_mname'].' '.$cdno=$row['employee_lname'].' '.$cdno=$row['employee_ext'].'</td>
                  <td><input type="text" name="username[]" class="form-control" id="username[]" placeholder="Enter username"></td>
                  <td><input type="text" name="password[]" class="form-control" id="password[]" placeholder="Enter password"></td>
                  <td><input type="hidden" name="position[]" class="form-control" id="position[]" value="'.$cdno=$row['employment_job_title'].'"><span class="col-xs-12 label label-primary">'.$cdno=$row['employment_job_title'].'</span></td>
                  <td><input type="checkbox" class="minimal" name="checkb[]" value="sylabus"></td>
                  <td><input type="checkbox" class="minimal" name="checkb[]" value="tq"></td>
                  <td><input type="checkbox" class="minimal" name="checkb[]" value="notification"></td>
                  <td><input type="checkbox" class="minimal" name="checkb[]" value="queue"></td>
                  <td><input type="checkbox" class="minimal" name="checkb[]" value="reports"></td>
                  <td><input type="checkbox" class="minimal" name="checkb[]" value="setdate"></td></tr>';				
			}										
		}
	}
	function addemp(){
		$this->loaddb();
		$sql = "SELECT employees.employee_id, employees.employee_fname, employees.employee_mname, employees.employee_lname, employees.employee_ext, employment.employment_job_title, employment.employment_id, employment.employee_id, sched_subj.ss_id FROM employees , employment , sched_subj WHERE sched_subj.ss_id = employees.employee_id AND sched_subj.employment_id = employment.employment_id ORDER BY employees.employee_lname ASC";
		$result = mysql_query($sql);
		if(!$result){
			echo 'The categories could not be displayed, please try again later.';
		}else{
			while($row=mysql_fetch_array($result)){
				$sql = "SELECT * FROM user_access WHERE ss_id = '".$row['ss_id']."'";
				$result = mysql_query($sql);
				if(!$result){
					$id=$row['id'];
	            	$username=$row['username'];
	            	$password=$row['password'];
	            	$position=$row['position'];
	                    
	            	$query = "INSERT INTO `user_access` (`username`, `password`,`position`, `ss_id`) VALUES ('".$username."','".$password."','".$position."','".$id."')";
					$result=mysql_query($query) or die("Query Failed : ".mysql_error());
					echo "saved!";	
				}else{
					echo "Exist!";	
			}										
		}
	}
	function saveaccess(){
		$this->loaddb();
		if (isset($_POST['username'])){   
        	foreach($_POST['id'] as $row => $value){
            	$id=$_POST['id'][$row];
            	$username=$_POST['username'][$row];
            	$password=$_POST['password'][$row];
            	$position=$_POST['position'][$row];
                    
            	$query = "INSERT INTO `user_access` (`username`, `password`,`position`, `ss_id`) VALUES ('".$username."','".$password."','".$position."','".$id."')";
				$result=mysql_query($query) or die("Already added to cart");
				echo " saved!";

				$query = "UPDATE user_access SET username='".$username."',password='".$password."',position='".$position."' WHERE rollno='$value'";
				$result=mysql_query($query) or die("Query Failed : ".mysql_error());
				echo "Successfully Updated";		
				        		
        	}


    	}
	
	}
}

?>
