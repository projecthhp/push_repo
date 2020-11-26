<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$userid = getValue("iduser","int","POST",0);
$userid = (int)$userid;
$idtin = getValue("idtin","int","POST",0);
$idtin = (int)$idtin;
$code = getValue("code","str","POST","");
$code = replaceMQ(trim($code));
if($userid > 0 && $code != '')
{
   $db_ex = new db_execute("UPDATE new SET new_update_time = ".time().",new_renew = new_renew + 1 WHERE new_user_id = '".$userid."' AND new_id = '".$idtin."'");
   unset($db_ex);
}
unset($userid,$code,$idtin);
?>