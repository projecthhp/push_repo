<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$userid = getValue("iduser","int","POST",0);
$userid = (int)$userid;
$code = getValue("code","str","POST","");
$code = replaceMQ(trim($code));
if($userid > 0 && $code != '')
{
   $db_ex = new db_execute("UPDATE user SET use_update_time = ".time()." WHERE use_id = '".$userid."'");
   unset($db_ex);
}
unset($userid,$code);
?>