
<?php
include('class.php'); 
$class= new testbank();
########################################################
# Login information for the SMS Gateway
########################################################

$ozeki_user = "admin";
$ozeki_password = "12345";
// $ip=getLocalIP();
// for Server ip
$ip = $_SERVER['REMOTE_ADDR']; 
// for client ip
$ipq=str_replace(' ', '', $ip);
$ozeki_url = "http://".$ipq.":9501/api?";

########################################################
# Functions used to send the SMS message
########################################################
function getLocalIP(){
    exec("ipconfig /all", $output);
        foreach($output as $line){
            if (preg_match("/(.*)IPv4 Address(.*)/", $line)){
                $ip = $line;
                $ip = str_replace("IPv4 Address. . . . . . . . . . . :","",$ip);
                $ip = str_replace("(Preferred)","",$ip);
            }
        }
    return $ip;
}
function httpRequest($url){
    $pattern = "/http...([0-9a-zA-Z-.]*).([0-9]*).(.*)/";
    preg_match($pattern,$url,$args);
    $in = "";
    $fp = fsockopen("$args[1]", $args[2], $errno, $errstr, 30);
    if (!$fp) {
       return("$errstr ($errno)");
    } else {
        $out = "GET /$args[3] HTTP/1.1\r\n";
        $out .= "Host: $args[1]:$args[2]\r\n";
        $out .= "User-agent: Ozeki PHP client\r\n";
        $out .= "Accept: */*\r\n";
        $out .= "Connection: Close\r\n\r\n";

        fwrite($fp, $out);
        while (!feof($fp)) {
           $in.=fgets($fp, 128);
        }
    }
    fclose($fp);
    return($in);

}



function ozekiSend($phone, $msg, $debug=false){
      global $ozeki_user,$ozeki_password,$ozeki_url;

      $url = 'username='.$ozeki_user;
      $url.= '&password='.$ozeki_password;
      $url.= '&action=sendmessage';
      $url.= '&messagetype=SMS:TEXT';
      $url.= '&recipient='.urlencode($phone);
      $url.= '&messagedata='.urlencode($msg);

      $urltouse =  $ozeki_url.$url;
      if ($debug) { echo "Request: <br>$urltouse<br><br>"; }

      //Open the URL to send the message
      $response = httpRequest($urltouse);
      if ($debug) {
           echo "Response: <br><pre>".
           str_replace(array("<",">"),array("&lt;","&gt;"),$response).
           "</pre><br>"; }
           
      return($response);
      
}

function printed($tq_id){
    $server     = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'testbank';

    if(!mysql_connect($server, $username, $password))
    {
      exit('Error: could not establish database connection');
    }
    if(!mysql_select_db($database))
    {
      exit('Error: could not select the database');
    }
    $query = "UPDATE shs_tqstatus SET shs_status_desc='printed',shs_notif_status='unread', shs_date_time = NOW()   WHERE shs_tq_id='".$tq_id."'";
    $result=mysql_query($query) or die("Query Failed : ".mysql_error());
  
  }
########################################################
# GET data from sendsms.html
########################################################
$tq_id = $_POST['tq_id'];
$phonenum1 = $_POST['recipient'];
$ph2=str_replace(' ', '', $phonenum1);
$ph=substr($ph2,-10);
$phonenum="+63".$ph;
$message = $_POST['message'];
$debug = true;

ozekiSend($phonenum,$message,$debug);
printed($tq_id);

?>