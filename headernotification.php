<header class="main-header">
		<a href="instructor_index.php" class="logo">
			<span class="logo-mini"><b>T</b>B</span>
			<span class="logo-lg"><b>Test </b>Bank</span>
		</a>
		<nav class="navbar navbar-static-top">
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
					<li class="dropdown">
					    <a href="#" class="dropdown-toggle chat" data-toggle="dropdown"><span class="label label-pill label-info chatcount" style="padding:4px;"></span> <span class="fa fa-wechat" ></span></a>
					    <ul class="dropdown-menu chatmenu">

					    </ul>
				    </li>
					<?php
					if ($position_session=="Dean") {
						echo '<li class="dropdown">
					    <a href="#" class="dropdown-toggle syllque" data-toggle="dropdown"><span class="label label-pill label-info syllquecount" style="padding:4px;"></span> <span class="glyphicon glyphicon-briefcase" ></span></a>
					    <ul class="dropdown-menu syllquemenu">

					    </ul>
				    </li>';
					}
					?>
					<?php
					if ($position_session=="Academic Head") {
						echo '<li class="dropdown">
					    <a href="#" class="dropdown-toggle syllque1" data-toggle="dropdown"><span class="label label-pill label-info syllque1count" style="padding:4px;"></span> <span class="glyphicon glyphicon-briefcase" ></span></a>
					    <ul class="dropdown-menu syllque1menu">

					    </ul>
				    </li>';
					}
					?>
					<li class="dropdown">
					    <a href="#" class="dropdown-toggle syllapp" data-toggle="dropdown"><span class="label badge-pill label-success syllappcount" style="padding:4px;"></span> <span class="glyphicon glyphicon-saved" ></span></a>
					    <ul class="dropdown-menu syllappmenu">

					    </ul>
				    </li>
				    <li class="dropdown">
					    <a href="#" class="dropdown-toggle syllrev" data-toggle="dropdown"><span class="label label-pill label-danger syllrevcount" style="padding:4px;"></span> <span class="glyphicon glyphicon-retweet" ></span></a>
					    <ul class="dropdown-menu syllrevmenu">

					    </ul>
				    </li>
				    <?php
					if ($position_session=="Dean" or $position_session=="Academic Head") {
						echo '<li class="dropdown">
					    <a href="#" class="dropdown-toggle quetq" data-toggle="dropdown"><span class="label label-pill label-info quetqcount" style="padding:4px;"></span> <span class="glyphicon glyphicon-file" ></span></a>
					    <ul class="dropdown-menu quetqmenu">

					    </ul>
				    </li>';
					}else if($position_session=="Program Head") {
						echo '<li class="dropdown">
					    <a href="#" class="dropdown-toggle phquetq" data-toggle="dropdown"><span class="label label-pill label-info phquetqcount" style="padding:4px;"></span> <span class="glyphicon glyphicon-file" ></span></a>
					    <ul class="dropdown-menu phquetqmenu">

					    </ul>
				    </li>';
					}
					?>
				    
				    <li class="dropdown">
					    <a href="#" class="dropdown-toggle printedtq" data-toggle="dropdown"><span class="label label-pill label-info printedtqcount" style="padding:4px;"></span> <span class="glyphicon glyphicon-print" ></span></a>
					    <ul class="dropdown-menu printedtqmenu">

					    </ul>
				    </li>
				    <li class="dropdown">
					    <a href="#" class="dropdown-toggle apptq" data-toggle="dropdown"><span class="label label-pill label-success apptqcount" style="padding:4px;"></span> <span class="glyphicon glyphicon-check" ></span></a>
					    <ul class="dropdown-menu apptqmenu">

					    </ul>
				    </li>
				    <li class="dropdown">
					    <a href="#" class="dropdown-toggle revtq" data-toggle="dropdown"><span class="label label-pill label-danger revtqcount" style="padding:4px;"></span> <span class="glyphicon glyphicon-edit" ></span></a>
					    <ul class="dropdown-menu revtqmenu">

					    </ul>
				    </li>
				    <li class="dropdown">
					    <a href="#" class="dropdown-toggle date" data-toggle="dropdown"><span class="label label-pill label-danger datecount" style="padding:4px;"></span> <span class="fa fa-calendar" ></span></a>
					    <ul class="dropdown-menu datemenu" style="height: auto; max-height: 200px; overflow-x: hidden;">
					    	<li>&nbsp<strong>ITE & BA Examination</strong></li>
		                  	<li>&nbsp&nbsp&nbsp<?php $class->loaddl(1,"ITE"); ?></li>
		                  	<li>&nbsp&nbsp&nbsp<?php $class->loaddl(2,"ITE"); ?></li>
		                  	<li>&nbsp&nbsp&nbsp<?php $class->loaddl(3,"ITE"); ?></li>
		                  	<li>&nbsp&nbsp&nbsp<?php $class->loaddl(4,"ITE"); ?></li>
		                  	<li class="divider"></li>
		                  	<li>&nbsp<strong>SHS Examination</strong></li>
		                  	<li>&nbsp&nbsp&nbsp<?php $class->loaddl(9,"SHS"); ?></li>
		                  	<li>&nbsp&nbsp&nbsp<?php $class->loaddl(10,"SHS"); ?></li>
		                  	<li>&nbsp&nbsp&nbsp<?php $class->loaddl(11,"SHS"); ?></li>
		                  	<li>&nbsp&nbsp&nbsp<?php $class->loaddl(12,"SHS"); ?></li>
		                  	<li class="divider"></li>
		                  	<li>&nbsp<strong>GEN-ED Examination</strong></li>
		                  	<li>&nbsp&nbsp&nbsp<?php $class->loaddl(1,"GENED"); ?></li>
		                  	<li>&nbsp&nbsp&nbsp<?php $class->loaddl(2,"GENED"); ?></li>
		                  	<li>&nbsp&nbsp&nbsp<?php $class->loaddl(3,"GENED"); ?></li>
		                  	<li>&nbsp&nbsp&nbsp<?php $class->loaddl(4,"GENED"); ?></li>
					    </ul>
				    </li>
	          		<li>
	          			<a href="" style="pointer-events: none;cursor: default;"><span id="date_time"></span>
	              		<script type="text/javascript">window.onload = date_time('date_time');</script></i></a> 
	          		</li>
				</ul>
			</div>
		</nav>
	</header>
<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
<!-- <script type="text/javascript" src="bootstrap/js/dateandtime.js"></script>
<script type="text/javascript" src="bootstrap/js/messageNotif.js"></script>
<script type="text/javascript" src="bootstrap/js/retrieveajax.js"></script>
<script type="text/javascript" src="bootstrap/js/counter.js"></script>
<script type="text/javascript" src="bootstrap/js/getNotification.js"></script> -->
<script>
var id ="<?php echo $user_id;?>";
var emp_id="<?php echo $login_id;?>";
var dep='<?php echo $depart;?>';
var pos='<?php echo $position_session;?>';
$(document).ready(function(){
 
	function unreadappsyll(){
		
	  	$.ajax({
		   	url:"fetch2.php?p=unreadappsyll",
		   	method:"POST",
		   	data:{emp_id:emp_id},
		   	dataType:"json",
		   	success:function(data){
		    	$('.syllappmenu').html(data.notification);
		    	if(data.unseen_notification > 0){
		     		$('.syllappcount').html(data.unseen_notification);
		    	}
		   	}
	  	});
	}
	 
	unreadappsyll();
	 
	$(document).on('click', '.syllapp', function(){
	  	$('.syllappcount').html('');
	  	updateappsyllstat();
	});
	 
	setInterval(function(){ 
	  	unreadappsyll(); 
	}, 5000);
	function updateappsyllstat(){
	    $.ajax({
		    type:"POST",
		    url:"fetch2.php?p=updateappsyllstat",
		    data:{emp_id:emp_id},
		    success: function(data){
		    	unreadappsyll();
		    }
	    });
	}

	//////////
	function unreadrevsyll(){
		
	  	$.ajax({
		   	url:"fetch2.php?p=unreadrevsyll",
		   	method:"POST",
		   	data:{emp_id:emp_id},
		   	dataType:"json",
		   	success:function(data){
		    	$('.syllrevmenu').html(data.notification);
		    	if(data.unseen_notification > 0){
		     		$('.syllrevcount').html(data.unseen_notification);
		    	}
		   	}
	  	});
	}
	 
	unreadrevsyll();
	 
	$(document).on('click', '.syllrev', function(){
	  	$('.syllrevcount').html('');
	  	updaterevsyllstat();
	});
	 
	setInterval(function(){ 
	  	unreadrevsyll(); 
	}, 5000);
	function updaterevsyllstat(){
	    $.ajax({
		    type:"POST",
		    url:"fetch2.php?p=updaterevsyllstat",
		    data:{emp_id:emp_id},
		    success: function(data){
		    	unreadrevsyll();
		    }
	    });
	}
	//////
	function unreadprintedtq(){
		
	  	$.ajax({
		   	url:"fetch2.php?p=unreadprintedtq",
		   	method:"POST",
		   	data:{emp_id:emp_id},
		   	dataType:"json",
		   	success:function(data){
		    	$('.printedtqmenu').html(data.notification);
		    	if(data.unseen_notification > 0){
		     		$('.printedtqcount').html(data.unseen_notification);
		    	}
		   	}
	  	});
	}
	 
	unreadprintedtq();
	 
	$(document).on('click', '.printedtq', function(){
	  	$('.printedtqcount').html('');
	  	updateprintedtq();
	});
	 
	setInterval(function(){ 
	  	unreadprintedtq(); 
	}, 5000);
	function updateprintedtq(){
	    $.ajax({
		    type:"POST",
		    url:"fetch2.php?p=updateprintedtq",
		    data:{emp_id:emp_id},
		    success: function(data){
		    	unreadprintedtq();
		    }
	    });
	}
	/////
	function unreadapptq(){
		
	  	$.ajax({
		   	url:"fetch2.php?p=unreadapptq",
		   	method:"POST",
		   	data:{emp_id:emp_id},
		   	dataType:"json",
		   	success:function(data){
		    	$('.apptqmenu').html(data.notification);
		    	if(data.unseen_notification > 0){
		     		$('.apptqcount').html(data.unseen_notification);
		    	}
		   	}
	  	});
	}
	 
	unreadapptq();
	 
	$(document).on('click', '.apptq', function(){
	  	$('.apptqcount').html('');
	  	updateapptq();
	});
	 
	setInterval(function(){ 
	  	unreadapptq(); 
	}, 5000);
	function updateapptq(){
	    $.ajax({
		    type:"POST",
		    url:"fetch2.php?p=updateapptq",
		    data:{emp_id:emp_id},
		    success: function(data){
		    	unreadapptq();
		    }
	    });
	}
	//////
	function unreadrevtq(){
		
	  	$.ajax({
		   	url:"fetch2.php?p=unreadrevtq",
		   	method:"POST",
		   	data:{emp_id:emp_id},
		   	dataType:"json",
		   	success:function(data){
		    	$('.revtqmenu').html(data.notification);
		    	if(data.unseen_notification > 0){
		     		$('.revtqcount').html(data.unseen_notification);
		    	}
		   	}
	  	});
	}
	 
	unreadrevtq();
	 
	$(document).on('click', '.revtq', function(){
	  	$('.revtqcount').html('');
	  	updaterevtq();
	});
	 
	setInterval(function(){ 
	  	unreadrevtq(); 
	}, 5000);
	function updaterevtq(){
	    $.ajax({
		    type:"POST",
		    url:"fetch2.php?p=updaterevtq",
		    data:{dep:dep, emp_id },
		    success: function(data){
		    	unreadrevtq();
		    }
	    });
	}
	////
	function unreadsyllque(){
		
	  	$.ajax({
		   	url:"fetch2.php?p=unreadsyllque",
		   	method:"POST",
		   	data:{dep:dep},
		   	dataType:"json",
		   	success:function(data){
		    	$('.syllquemenu').html(data.notification);
		    	if(data.unseen_notification > 0){
		     		$('.syllquecount').html(data.unseen_notification);
		    	}
		   	}
	  	});
	}
	 
	unreadsyllque();
	 
	$(document).on('click', '.syllque', function(){
	  	$('.syllquecount').html('');
	  	updatesyllque();
	});
	 
	setInterval(function(){ 
	  	unreadsyllque(); 
	}, 5000);
	function updatesyllque(){
	    $.ajax({
		    type:"POST",
		    url:"fetch2.php?p=updatesyllque",
		    data:{dep:dep},
		    success: function(data){
		    	unreadsyllque();
		    }
	    });
	}
	////
	function unreadsyllque1(){
		
		$.ajax({
			 url:"fetch2.php?p=unreadsyllque1",
			 method:"POST",
			 data:{dep:dep},
			 dataType:"json",
			 success:function(data){
			  $('.syllque1menu').html(data.notification);
			  if(data.unseen_notification > 0){
				   $('.syllque1count').html(data.unseen_notification);
			  }
			 }
		});
  }
   
  unreadsyllque1();
   
  $(document).on('click', '.syllque1', function(){
		$('.syllque1count').html('');
		updatesyllque1();
  });
   
  setInterval(function(){ 
		unreadsyllque1(); 
  }, 5000);
  function updatesyllque1(){
	  $.ajax({
		  type:"POST",
		  url:"fetch2.php?p=updatesyllque1",
		  data:{dep:dep},
		  success: function(data){
			  unreadsyllque1();
		  }
	  });
  }
	////
	function unreadquetq(){
		var pos = "<?php echo $position_session;?>";
	  	$.ajax({
		   	url:"fetch2.php?p=unreadquetq",
		   	method:"POST",
		   	data:{dep:dep,pos:pos},
		   	dataType:"json",
		   	success:function(data){
		    	$('.quetqmenu').html(data.notification);
		    	if(data.unseen_notification > 0){
		     		$('.quetqcount').html(data.unseen_notification);
		    	}
		   	}
	  	});
	}
	 
	unreadquetq();
	 
	$(document).on('click', '.quetq', function(){
	  	$('.quetqcount').html('');
	  	updatequetq();
	});
	 
	setInterval(function(){ 
	  	unreadquetq(); 
	}, 5000);
	function updatequetq(){
		var pos = "<?php echo $position_session;?>";
	    $.ajax({
		    type:"POST",
		    url:"fetch2.php?p=updatequetq",
		    data:{dep:dep,pos:pos},
		    success: function(data){
		    	unreadquetq();
		    }
	    });
	}
	/////
	function unreadphquetq(){
		
	  	$.ajax({
		   	url:"fetch2.php?p=unreadphquetq",
		   	method:"POST",
		   	data:{dep:dep,emp_id:emp_id},
		   	dataType:"json",
		   	success:function(data){
		    	$('.phquetqmenu').html(data.notification);
		    	if(data.unseen_notification > 0){
		     		$('.phquetqcount').html(data.unseen_notification);
		    	}
		   	}
	  	});
	}
	 
	unreadphquetq();
	 
	$(document).on('click', '.phquetq', function(){
	  	$('.phquetqcount').html('');
	  	updatephquetq();
	});
	 
	setInterval(function(){ 
	  	unreadphquetq(); 
	}, 5000);
	function updatephquetq(){
	    $.ajax({
		    type:"POST",
		    url:"fetch2.php?p=updatephquetq",
		    data:{dep:dep ,emp_id:emp_id},
		    success: function(data){
		    	unreadphquetq();
		    }
	    });
	}
});

//
function unreadchat(){
	  	$.ajax({
		   	url:"fetch2.php?p=unreadchat",
		   	method:"POST",
		   	data:{emp_id:id},
		   	dataType:"json",
		   	success:function(data){
		    	$('.chatmenu').html(data.notification);
		    	if(data.unseen_notification > 0){
		     		$('.chatcount').html(data.unseen_notification);
		    	}
		   	}
	  	});
	}
	 
	unreadchat();
	 
	$(document).on('click', '.chat', function(){
	  	$('.chatcount').html('');
	  	updatechat();
	});
	 
	setInterval(function(){ 
	  	unreadchat(); 
	}, 5000);
	function updatechat(){
	    $.ajax({
		    type:"POST",
		    url:"fetch2.php?p=updatechat",
		    data:{emp_id:id},
		    success: function(data){
		    	unreadchat();
		    }
	    });
	}


</script>