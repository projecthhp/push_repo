<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$lgname = getValue("lgname","str","POST","");
$lgname = replaceMQ(trim($lgname));
$lgbirthday = getValue("lgbirthday","str","POST","");
$lgbirthday = replaceMQ(trim($lgbirthday));
$lgbirthday = str_replace("/","-",$lgbirthday);
$lgbirthday = strtotime($lgbirthday);
$lgaddress = getValue("lgaddress","str","POST","");
$lgaddress = replaceMQ(trim($lgaddress));
$lg_gioitinh = getValue("lg_gioitinh","int","POST",0);
$lg_gioitinh = (int)$lg_gioitinh;
$lg_honnhan = getValue("lg_honnhan","int","POST",0);
$lg_honnhan = (int)$lg_honnhan;
$lg_thanhpho = getValue("lg_thanhpho","arr","POST",0);
$lg_thanhpho = implode(",", $lg_thanhpho);
$userid = getValue("iduser","int","POST",0);
$userid = (int)$userid;
$code = getValue("code","str","POST","");
$code = replaceMQ(trim($code));
$db_qrcheck = new db_query("SELECT use_id FROM user WHERE use_id = '".$userid."' AND use_pass = '".$code."' LIMIT 1");
if(mysql_num_rows($db_qrcheck->result) > 0)
{
   if($lgname != '' && $lg_thanhpho > 0)
   { 
      $db_ex = new db_execute("UPDATE user SET use_first_name='".$lgname."',use_birth_day = '".$lgbirthday."',use_address = '".$lgaddress."',use_gioi_tinh = '".$lg_gioitinh."',use_hon_nhan = '".$lg_honnhan."',use_city = '".$lg_thanhpho."' WHERE use_id = '".$userid."'");
      unset($db_ex);
   }
}
unset($lgname,$lgbirthday,$lgaddress,$lg_gioitinh,$lg_honnhan,$lg_thanhpho,$userid,$code,$db_qrcheck,$db_ex);
?>