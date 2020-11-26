<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$tkpassword = getValue("tkpassword","str","POST","");
$tkpassword = replaceMQ(trim($tkpassword));
$tkpassword = md5($tkpassword);
$tk_email = getValue("tk_email","str","POST","");
$tk_email = replaceMQ(trim($tk_email));
$tk_phone = getValue("tk_phone","str","POST","");
$tk_phone = replaceMQ(trim($tk_phone));
$userid = getValue("iduser","int","POST",0);
$userid = (int)$userid;
$code = getValue("code","str","POST","");
$code = replaceMQ(trim($code));
$db_qrcheck = new db_query("SELECT use_id FROM user WHERE use_id = '".$userid."' AND use_pass = '".$code."' LIMIT 1");
if(mysql_num_rows($db_qrcheck->result) > 0)
{
   if($code != '')
   {
      $db_ex1 = new db_execute("UPDATE user SET use_pass = '".$tkpassword."',use_email = '".$tk_email."',use_phone = '".$tk_phone."' WHERE use_id = '".$userid."'");
      unset($db_ex);
   }
}
unset($tkpassword,$tk_email,$tk_phone,$userid,$code,$db_qrcheck);
?>