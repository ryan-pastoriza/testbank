<header class="main-header">
  <a href="index.php" class="logo">
    <span class="logo-mini"><b>T</b>B</span>
    <span class="logo-lg"><b>Test </b>Bank</span>
  </a>
  <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown">
              <a href="#" class="dropdown-toggle printerque" data-toggle="dropdown"><span class="label label-pill label-info printerquecount" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-print" ></span></a>
              <ul class="dropdown-menu printerquemenu">

              </ul>
            </li>
        <li>
        <a href="" style="pointer-events: none;cursor: default;">
          <i class=" fa fa-calendar">
            <span id="date_time"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
          </i></a> 
        </li>
      </ul>
        
    </div>
  </nav>
</header>

<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/dateandtime.js"></script>
<script type="text/javascript" src="bootstrap/js/printretrieveajax.js"></script>
<script type="text/javascript" src="bootstrap/js/getNotification.js"></script>
<script>
  function unreadprinterque(){
    
      $.ajax({
        url:"fetch2.php?p=unreadprinterque",
        method:"POST",
        dataType:"json",
        success:function(data){
          $('.printerquemenu').html(data.notification);
          if(data.unseen_notification > 0){
            $('.printerquecount').html(data.unseen_notification);
          }
        }
      });
  }
   
  unreadprinterque();
   
  $(document).on('click', '.printerque', function(){
      $('.printerquecount').html('');
      updateprinterque();
  });
   
  setInterval(function(){ 
      unreadprinterque(); 
  }, 5000);
  function updateprinterque(){
      $.ajax({
        type:"POST",
        url:"fetch2.php?p=updateprinterque",
        success: function(data){
          unreadprinterque();
        }
      });
  }
</script>