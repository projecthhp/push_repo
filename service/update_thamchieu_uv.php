<?
include("../home/config.php");
require_once("../functions/functions.php"); 
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
$result = array('data' => null, 'code' => 0, 'kq' => false);

$db_qrcheck = new db_query("SELECT id_thamchieu FROM user_tham_chieu WHERE id_user = '".$userid."' LIMIT 1");
if(mysql_num_rows($db_qrcheck->result) > 0)
{
   if($tc_name != '')
   { 
      $db_ex = new db_execute("UPDATE user_tham_chieu SET ho_ten = '".$tc_name."',sdt = '".$tc_phone."',chuc_vu = '".$tc_cv."',tinh_thanh = '".$tc_dc."' WHERE id_user = '".$userid."'");
      $result = array('data' => null, 'code' => 1, 'kq' => true);
		echo json_encode($result);
   } else {
      echo json_encode($result);
   }
} else {
   echo json_encode($result);
}
?>