<?
	include_once('../home/config.php');

	$username         = getValue("user_name","str","POST","");
	$username         = replaceMQ($username);
	$password         = getValue("password","str","POST","");
	$password         = replaceMQ($password);
	$password         = md5($password);


	if($username != '' && $password != '')
	{
      $db_qr    = new db_query("SELECT usc_id FROM user_company WHERE usc_email = '".$username."' AND usc_pass  = '".$password."'");
      
      if(mysql_num_rows($db_qr->result) > 0)
      {
         $row = mysql_fetch_assoc($db_qr->result);
         setcookie('UT', 1 ,time() + 7*6000,'/');
         setcookie('UID', $row['usc_id'] ,time() + 7*6000,'/');
         setcookie('PHPSESPASS', $password ,time() + 7*6000,'/');
         unset($db_qr,$row,$username,$password);
         echo '1';
      }
      else{
      	echo '0';
      }
   }
?>