<header class="main-header">
    <a href="dean_index.php" class="logo">

      <span class="logo-mini"><b>T</b>B</span>

      <span class="logo-lg"><b>Test </b>Bank</span>
    </a>
    <nav class="navbar navbar-static-top">
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown messages-menu">
						<a href="#" class="dropdown-toggle" onclick="return getNotification37()" data-toggle="dropdown">
							<i class="glyphicon glyphicon-envelope"></i>
							<span class="label label-warning" id="count"></span>
						</a>
						<ul class="dropdown-menu">
							<li class="header">You have <span id="count_1"></span> messages</li>
							<li>
								<ul id="messageNotification" class="menu messageNotification">
									
								</ul>
							</li>
							<li class="footer"><a href="dean_chat.php">See All Messages</a></li>
						</ul>
					</li>
          <li class="dropdown messages-menu">
            <a href="javascript:;" id="notificationLink10" onclick="return getNotification10()" class="dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-folder-open"></i>
              <span class="label label-info deanqueueTQ" ></span>
            </a>
            <ul class="dropdown-menu" id="deanqueueTQ">
              <li class="header">You have <span class="deanqueueTQ-span"></span> queue TQ</li>
              <li>
              <ul class="menu">
                  <li>
                    <span ></span>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="dean_queue.php">See All Queue TQ</a></li>
            </ul>
          </li>
          <li class="dropdown messages-menu">
            <a href="javascript:;" id="notificationLink13" onclick="return getNotification13()" class="dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-briefcase"></i>
              <span class="label bg-blue deanqueueSYLL"></span>
            </a>
            <ul class="dropdown-menu" id="deanqueueSYLL">
              <li class="header">You have <span class = "deanqueueSYLL-span"></span> queue Syllabus</li>
              <li>
              <ul class="menu">
                  <li>
                    <span ></span>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="dean_queue.php">See All Queue Syllabus</a></li>
            </ul>
          </li>
          <li class="dropdown messages-menu">
            <a href="javascript:;" id="notificationLink14" onclick="return getNotification18()" data-toggle="dropdown">
              <i class="glyphicon glyphicon-briefcase"></i>
              <span class="label label-success syllapp"></span>
            </a>
            <ul class="dropdown-menu" id="syllapp">
              <li class="header">You have <span class="syllapp-span"></span> approved syllabus notification!</li>
              <li>
               <ul class="menu">
                  <li>
                    <span ></span>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="syllabus_index.php">See All Syllabus</a></li>
            </ul>
          </li>
          <li class="dropdown messages-menu">
            <a href="javascript:;" id="notificationLink14" onclick="return getNotification20()" data-toggle="dropdown">
              <i class="glyphicon glyphicon-briefcase"></i>
              <span class="label label-danger syllrev"></span>
            </a>
            <ul class="dropdown-menu" id="syllrev">
              <li class="header">You have <span class="syllrev-span"></span> rejected syllabus notification!</li>
              <li>
               <ul class="menu">
                  <li>
                    <span ></span>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="syllabus_index.php">See All Syllabus</a></li>
            </ul> 
          </li>
          <li class="dropdown messages-menu">
            <a href="javascript:;" id="notificationLink" onclick="return getNotification1()" class="dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-print"></i>
              <span class="label label-info printed"></span>
            </a>
            <ul class="dropdown-menu" id="printed">
              <li class="header">You have <span class="printed-span"></span> printed TQ</li>
              <li>
              <ul class="menu">
                  <li>
                    <span ></span>
                  </li>
              </ul>
              </li>
              <li class="footer"><a href="instructor_notifications.php">See All TQ</a></li>
            </ul>
          </li>
          <li class="dropdown messages-menu">
            <a href="javascript:;" id="notificationLink1" onclick="return getNotification2()" class="dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-check"></i>
              <span class="label label-success approved"></span>
            </a>
            <ul class="dropdown-menu" id="approved">
              <li class="header">You have <span class="approved-span"></span> approved Tq & TOS</li>
              <li>
                <ul class="menu">
                  <li>
                        <span></span>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="instructor_notifications.php">See All TQ</a></li>
            </ul>
          </li>
          <li class="dropdown messages-menu">
            <a href="javascript:;" id="notificationLink3" onclick="getNotification4()" data-toggle="dropdown">
              <i class="glyphicon glyphicon-edit"></i>
              <span class="label label-danger revise"></span>
            </a>
            <ul class="dropdown-menu" id="revise">
              <li class="header">You have <span class="revise-span"></span> revised Tq & TOS</li>
              <li>
               <ul class="menu">
                  <li>
                        <span ></span>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="instructor_notifications.php">See All TQ</a></li>
            </ul>
          </li>
          <li class="dropdown messages-menu">
            <a data-toggle="dropdown">
              <i class="fa fa-calendar"></i>
              <span class="label label-danger"></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Examination Date and Submission Deadline</li>
              <li>
                <ul class="menu">
                  <li><a>Prelim: <?php $class->loaddl(1); ?></a></li>
                  <li><a>Midtern: <?php $class->loaddl(2); ?></a></li>
                  <li><a>Pre-Final: <?php $class->loaddl(3); ?></a></li>
                  <li><a>Final: <?php $class->loaddl(4); ?></a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li>
          <a href="" style="pointer-events: none;cursor: default;">
              <span id="date_time"></span>
              <script type="text/javascript">window.onload = date_time('date_time');</script>
            </a> 
          </li>
        </ul>
      </div>
    </nav>
  </header>

<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/dateandtime.js"></script>
<script type="text/javascript" src="bootstrap/js/deanretrieveajax.js"></script>
<script type="text/javascript" src="bootstrap/js/messageNotif.js"></script>
<script type="text/javascript" src="bootstrap/js/counter.js"></script>
<script type="text/javascript" src="bootstrap/js/getNotification.js"></script>