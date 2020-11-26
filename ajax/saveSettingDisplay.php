<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$idtin   = getValue("setting","int","POST",0);
$idtin   = (int)$idtin;
$userid = getValue("iduser","int","POST",0);
$userid = (int)$userid;
$code = getValue("code","str","POST","");
$code = replaceMQ(trim($code));
if($userid > 0 && $code != '')
{
   $db_ex = new db_execute("UPDATE user SET use_show = ".$idtin." WHERE use_id = '".$userid."' AND use_pass = '".$code."'");
   unset($db_ex);
}
unset($userid,$code,$idtin);
?>