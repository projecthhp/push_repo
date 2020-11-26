<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$tc_name = getValue("tc_name","str","POST","");
$tc_name = replaceMQ(trim($tc_name));
$tc_phone = getValue("tc_phone","str","POST","");
$tc_phone = replaceMQ(trim($tc_phone));
$tc_cv = getValue("tc_cv","str","POST","");
$tc_cv = replaceMQ(trim($tc_cv));
$tc_dc = getValue("tc_dc","str","POST","");
$tc_dc = replaceMQ(trim($tc_dc));
$userid = getValue("iduser","int","POST",0);
$userid = (int)$userid;
$code = getValue("code","str","POST","");
$code = replaceMQ(trim($code));
$db_qrcheck = new db_query("SELECT use_id FROM user WHERE use_id = '".$userid."' AND use_pass = '".$code."' LIMIT 1");
if(mysql_num_rows($db_qrcheck->result) > 0)
{
   if($tc_name != '')
   { 
      $db_ex = new db_execute("UPDATE cv SET cv_tc_name = '".$tc_name."',cv_tc_phone = '".$tc_phone."',cv_tc_cv = '".$tc_cv."',cv_tc_dc = '".$tc_dc."' WHERE cv_user_id = '".$userid."'");
      unset($db_ex);
   }
}
unset($tc_dc,$tc_phone,$tc_cv,$tc_dc,$userid,$code,$db_qrcheck,$db_ex);
?>