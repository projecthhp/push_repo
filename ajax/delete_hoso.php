<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$idtin   = getValue("idtin","int","POST",0);
$idtin   = (int)$idtin;
$time   = getValue("time","int","POST",0);
$time   = (int)$time;
$name   = getValue("name","str","POST",'');
$name   = replaceMQ(trim($name));
$userid = getValue("iduser","int","POST",0);
$userid = (int)$userid;
$code = getValue("code","str","POST","");
$code = replaceMQ(trim($code));
$db_qrcheck = new db_query("SELECT use_id FROM user WHERE use_id = '".$userid."' AND use_pass = '".$code."' LIMIT 1");
if(mysql_num_rows($db_qrcheck->result) > 0)
{
   if($idtin > 0 && $time > 0 && $name != '')
   {
      $db_ex = new db_execute("DELETE FROM hoso WHERE hs_id = '".$idtin."' AND hs_use_id = '".$userid."'");
      unlink($_SERVER['DOCUMENT_ROOT'].getcvuv2($time).$name);
      unset($db_ex);
   }
}
unset($userid,$code,$idtin);
?>