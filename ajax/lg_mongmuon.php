<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$lgtitle = getValue("tt","str","POST","");
$lgtitle = replaceMQ(trim($lgtitle));
$lgcapbac = getValue("cb","int","POST",0);
$lgcapbac = (int)$lgcapbac;
$lgcity = getValue("ct","arr","POST",0);
$lgcity = implode(",", $lgcity);
$lgcate = getValue("ca","int","POST",0);
$lgcate = (int)$lgcate;
$lgmoney = getValue("mn","int","POST",0);
$lgmoney = (int)$lgmoney;
$lghinhthuc = getValue("ht","int","POST",0);
$lghinhthuc = (int)$lghinhthuc;
$lgkinhnghiem = getValue("kn","int","POST",0);
$lgkinhnghiem = (int)$lgkinhnghiem;
$userid = $_COOKIE['UID'];
$code = $_COOKIE['PHPSESPASS'];
$db_qrcheck = new db_query("SELECT use_id FROM user WHERE use_id = '".$userid."' AND use_pass = '".$code."' LIMIT 1");
if(mysql_num_rows($db_qrcheck->result) > 0)
{
   if($lgtitle != '' && $lgcity != 0)
   { 
      $db_ex = new db_execute("UPDATE cv SET cv_title='".$lgtitle."',cv_capbac_id='".$lgcapbac."',cv_city_id='".$lgcity."',cv_cate_id='".$lgcate."',cv_money_id='".$lgmoney."',cv_loaihinh_id='".$lghinhthuc."',cv_exp ='".$lgkinhnghiem."' WHERE cv_user_id = '".$userid."'");
      unset($db_ex);
   }
}
unset($lgtitle,$lgcapbac,$lgcity,$lgcate,$lgmoney,$lghinhthuc,$userid,$code,$db_qrcheck,$db_ex);
?>