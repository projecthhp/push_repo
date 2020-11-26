<?
	include_once('../home/config.php');

	$username         = getValue("user_name","str","POST","");
	$username         = replaceMQ($username);
	$password         = getValue("password","str","POST","");
	$password         = replaceMQ($password);
	$password         = md5($password);


	if($username != '' && $password != '')
	{
      $db_qr    = new db_query("SELECT use_id FROM user WHERE use_mail = '".$username."' AND use_pass  = '".$password."'");
      
      if(mysql_num_rows($db_qr->result) > 0)
      {
         $row = mysql_fetch_assoc($db_qr->result);
         setcookie('UT', 0 ,time() + 7*6000,'/');
         setcookie('UID', $row['use_id'] ,time() + 7*6000,'/');
         setcookie('PHPSESPASS', $password ,time() + 7*6000,'/');
         echo '1';
      }
      else{
      	echo '0';
      }
   }
?>