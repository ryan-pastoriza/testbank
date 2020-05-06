<?php
       $servername = "localhost";
       $username = "root";
       $password = "";
       $dbname = "testbank";
       $conn = new mysqli($servername, $username, $password, $dbname);
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }
       $sql = "SELECT * FROM syllabus
                INNER JOIN tq ON tq.syllabus_id = syllabus.syllabus_id
                INNER JOIN tqstatus ON tqstatus.tq_id = tq.tq_id
                INNER JOIN sched_subj ON syllabus.ss_id = sched_subj.ss_id
                INNER JOIN employment ON sched_subj.employment_id = employment.employment_id
                INNER JOIN employees ON employment.employee_id = employees.employee_id
                INNER JOIN `subject` ON sched_subj.subj_id = `subject`.subj_id
                WHERE status_desc = 'queue for dean' AND status_desc='unread'";
       $result = $conn->query($sql);
       $row = $result->fetch_assoc();
       $count = $result->num_rows;
       echo $count;
       $conn->close();
?>