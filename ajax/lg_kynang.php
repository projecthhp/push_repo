<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$lgtitle = getValue("lgtitle","str","POST","");
$lgtitle = replaceMQ(trim($lgtitle));
$userid = getValue("iduser","int","POST",0);
$userid = (int)$userid;
$code = getValue("code","str","POST","");
$code = replaceMQ(trim($code));
$db_qrcheck = new db_query("SELECT use_id FROM user WHERE use_id = '".$userid."' AND use_pass = '".$code."' LIMIT 1");
if(mysql_num_rows($db_qrcheck->result) > 0)
{
   if($lgtitle != '')
   { 
      $db_ex = new db_execute("UPDATE cv SET cv_kynang = '".$lgtitle."' WHERE cv_user_id = '".$userid."'");
      unset($db_ex);
   }
}
unset($lgtitle,$userid,$code,$db_qrcheck,$db_ex);
?>