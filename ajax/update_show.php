<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$idtin   = getValue("idtin","int","POST",0);
$idtin   = (int)$idtin;
$userid = getValue("iduser","int","POST",0);
$userid = (int)$userid;
$code = getValue("code","str","POST","");
$code = replaceMQ(trim($code));
$db_qrcheck = new db_query("SELECT use_id FROM user WHERE use_id = '".$userid."' AND use_pass = '".$code."' LIMIT 1");
if(mysql_num_rows($db_qrcheck->result) > 0)
{
   if($idtin > 0)
   {
      $db_ex2 = new db_execute("UPDATE hoso SET hs_active = 0 WHERE hs_use_id = '".$userid."'");
      $db_ex = new db_execute("UPDATE hoso SET hs_active = 1 WHERE hs_id = '".$idtin."' AND hs_use_id = '".$userid."'");
      unset($db_ex,$db_ex2);
   }
}
unset($userid,$code,$idtin);
?>