 <ul class="sidebar-menu">
        <li class="header"><b>MAIN NAVIGATION</b></li>
        <li id="dashboard_tab">
          <?php 
          if ($position_session=="Instructor") {
            echo '<a href="instructor_index.php">';
          }else if ($position_session=="Program Head") {
            echo '<a href="ph_index.php">';
          }else if ($position_session=="Dean" or $position_session=="Academic Head") {
            echo '<a href="dean_index.php">';
          }
          ?>
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
          </a>
        </li>
        <li id="syllabus_tab">
          <a href="syllabus_index.php">
            <i class="glyphicon glyphicon-pencil"></i><span>Syllabus</span>
          </a>
        </li>
        <li id="tq_tab">
          <a href="tq_index.php">
            <i class="glyphicon glyphicon-list-alt"></i> <span>College TQ</span>
          </a>
        </li>
        <li id="tq_tab">
          <a href="shstq_index.php">
            <i class="glyphicon glyphicon-list-alt"></i> <span>SHS TQ</span>
          </a>
        </li>
        <?php 
          if ($position_session=="Instructor") {
            
          }else if ($position_session=="Program Head") {
            echo ' <li id="queue_tab"><a href="ph_queue.php" id="notificationLink" onclick="getNotification10()"><i class="fa fa-book"></i> 
            <span class="pull-right-container">
              <small class="label label-primary" id="count16_2"></small>
            </span>
            <span>Queue</span>
          </a>
        </li>';
          }else if ($position_session=="Dean" or $position_session=="Academic Head") {
            echo '<li id="queue_tab"><a href="dean_queue.php" id="notificationLink" onclick="getNotification10()"><i class="fa fa-book"></i> 
            <span class="pull-right-container">
              <small class="label label-primary" id="count16_2"></small>
            </span>
            <span>Queue</span>
          </a>
        </li>';
          }
          ?>
        <li id="notification_tab">
           <?php 
          if ($position_session=="Instructor") {
            echo '<a href="instructor_notifications.php" id="notificationLink10" onclick="getNotification()">';
          }else if ($position_session=="Program Head") {
            echo '<a href="ph_notifications.php" id="notificationLink10" onclick="getNotification()">';
          }else if ($position_session=="Dean" or $position_session=="Academic Head") {
            echo '<a href="dean_notifications.php" id="notificationLink10" onclick="getNotification()">';
          }
          ?>
            <i class="fa fa-bell-o"></i> 
            <span class="pull-right-container">
              <small class="label label-primary" id="count5_1_1"></small>
            </span>
            <span>Notifications</span>
          </a>
        </li>
        <li id="reports_tab">
        <?php 
          if ($position_session=="Instructor") {
            echo '<a href="instructor_reports.php">';
          }else if ($position_session=="Program Head") {
            echo '<a href="ph_reports.php">';
          }else if ($position_session=="Dean" or $position_session=="Academic Head") {
            echo '<a href="dean_reports.php">';
          }
          ?>
            <i class="fa fa-folder"></i> <span>Reports</span>
          </a>
        </li>
        <?php
        if ($position_session=="Academic Head") {
            echo '<li id="setdate_tab">
          <a href="dean_setdeadline.php">
          <i class="glyphicon glyphicon-calendar">
            </i> <span>Set Date Submission</span></a>
        </li>
        ';
        }
        if (($position_session=="Dean" or $position_session=="Academic Head") or ($position_session=="Program Head")) {
            echo '<li id="pgo_tab" >
          <a href="pgo.php">
            <i class="fa fa-folder"></i> <span>PGO</span>
          </a>
        </li>
        ';
        }
        if (($position_session=="Instructor") or ($position_session=="Program Head") or ($position_session=="Dean" or $position_session=="Academic Head")) {
          if ($depart=="SHS"||$depart=="GEN") {
            echo '<li id="shs_tab">
              <a href="shs.php">
              <i class="glyphicon glyphicon-book">
                </i> <span>SHS</span></a>
            </li>
            ';
          }
        }
        ?>
        <li id="quiz_tab">
          <a href="quiz.php">
            <i class="glyphicon glyphicon-edit"></i> <span>Quiz</span>
          </a>
        </li>
        <li>
          <?php 
            echo '<a href="instructor_chat.php">';
          ?>
          <i class="fa fa-wechat">
            </i> <span>Messenger</span></a>
        </li>
      </ul>