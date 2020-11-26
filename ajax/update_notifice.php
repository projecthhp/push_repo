<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$idvalu   = getValue("idvalu","int","POST",0);
$idvalu   = (int)$idvalu;
$userid = getValue("iduser","int","POST",0);
$userid = (int)$userid;
$code = getValue("code","str","POST","");
$code = replaceMQ(trim($code));
$db_qrcheck = new db_query("SELECT use_id FROM user WHERE use_id = '".$userid."' AND use_pass = '".$code."' LIMIT 1");
if(mysql_num_rows($db_qrcheck->result) > 0)
{
   $db_ex = new db_execute("UPDATE user SET use_noti = '".$idvalu."' WHERE use_id = '".$userid."'");
   unset($db_ex);
}
unset($userid,$code,$idvalu);
?>