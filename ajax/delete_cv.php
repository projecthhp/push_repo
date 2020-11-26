<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$idtin   = getValue("idtin","int","POST",0);
$idtin   = (int)$idtin;
$userid = getValue("iduser","int","POST",0);
$userid = (int)$userid;
$code = getValue("code","str","POST","");
$code = replaceMQ(trim($code));
$db_qrcheck = new db_query("SELECT usc_id FROM user_company WHERE usc_id = '".$userid."' AND usc_pass = '".$code."' LIMIT 1");
if(mysql_num_rows($db_qrcheck->result) > 0)
{
   if($idtin > 0)
   {
      $db_ex = new db_execute("DELETE FROM new WHERE new_id = '".$idtin."' AND new_user_id = '".$userid."'");
      unset($db_ex);
   }
}
unset($userid,$code,$idtin);
?>