<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$email = getValue("email","str","POST","");
$email = replaceMQ($email);
$pass = getValue("pass","str","POST","");
$pass = replaceMQ(trim($pass));
$pass = md5($pass);
$db_qrcheck = new db_query("SELECT usc_id FROM user_company WHERE usc_email = '".$email."' AND usc_pass = '".$pass."' LIMIT 1");
if(mysql_num_rows($db_qrcheck->result) == 1)
{
   $row = mysql_fetch_assoc($db_qrcheck->result);
   unset($_COOKIE['UID']);
   unset($_COOKIE['UT']);
   unset($_COOKIE['PHPSESPASS']);
   setcookie('UID', null, -1, '/');
   setcookie('UT', null, -1, '/');
   setcookie('PHPSESPASS', null, -1, '/');
   setcookie('UT', 1 ,time() + 7*6000,'/');
   setcookie('UID', $row['usc_id'] ,time() + 7*6000,'/');
   setcookie('PHPSESPASS', $pass ,time() + 7*6000,'/');
}
echo mysql_num_rows($db_qrcheck->result);
unset($email,$pass);
?>