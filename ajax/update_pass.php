<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$pass = getValue("pass","str","POST","");
$pass = replaceMQ(trim($pass));
$pass = md5($pass);
$userid = getValue("iduser","int","POST",0);
$userid = (int)$userid;
$code = getValue("code","str","POST","");
$code = replaceMQ(trim($code));
$db_qrcheck = new db_query("SELECT usc_id FROM user_company WHERE usc_id = '".$userid."' AND usc_pass = '".$code."' LIMIT 1");
if(mysql_num_rows($db_qrcheck->result) > 0)
{
   if($pass != '')
   {
      $db_ex1 = new db_execute("UPDATE user_company SET usc_pass = '".$pass."', usc_update_time = '".time()."' WHERE usc_id = '".$userid."'");
      unset($db_ex);
   }
}
unset($pass,$userid,$code,$db_qrcheck);
?>