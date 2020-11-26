<?
require_once("../functions/functions.php"); 
require_once("../functions/array_front_end.php");
require_once("../classes/database.php");
$userid = $_COOKIE["UID"];
$userid = (int)replaceMQ($userid);
$name = getValue("name","str","POST","");
$name = replaceMQ(trim($name));
$quymo = getValue("quymo","int","POST",0);
$quymo = (int)$quymo;
$mst = getValue("mst","int","POST",0);
$mst = (int)$mst;
$address = getValue("address","str","POST","");
$address = replaceMQ(trim($address));
$city = getValue("city","int","POST",0);
$city = (int)$city;
$phone = getValue("phone","str","POST","");
$phone = replaceMQ(trim($phone));
$website = getValue("website","str","POST","");
$website = replaceMQ(trim($website));
$info = getValue("info","str","POST","");
$info = replaceMQ(trim($info));
   if($name != '' && $quymo > 0 && $address != '' && $city > 0 && $phone != '')
   {
      $db_ex = new db_execute("UPDATE user_company SET usc_company='".$name."',usc_size = '".$quymo."',usc_address = '".$address."',usc_city = '".$city."',usc_phone = '".$phone."',usc_website = '".$website."',usc_mst = '".$mst."', usc_update_time = '".time()."' WHERE usc_id = '".$userid."'");
      $db_ex2 = new db_execute("UPDATE user_company_multi SET usc_company_info='".$info."', usc_update_time = '".time()."' WHERE usc_id = '".$userid."'");
      unset($db_ex,$db_ex2);
      $db_thongbao = new db_query("SELECT user_company_multi.usc_company_info,usc_company,usc_size,usc_address,usc_city,usc_phone,usc_website,usc_mst FROM user_company JOIN user_company_multi ON user_company.usc_id = user_company_multi.usc_id WHERE user_company.usc_id = ".$userid);
      $row = mysql_fetch_array($db_thongbao->result);
      $row['usc_size'] = $array_quy_mo[$row['usc_size']];
      $result = array(
      				'usc_company' => $row['usc_company'],
      				'usc_size' => $row['usc_size'],
      				'usc_address' => $row['usc_address'],
      				'usc_phone' => $row['usc_phone'],
      				'usc_website' => $row['usc_website'],
      				'usc_mst' => $row['usc_mst'],
      				'usc_company_info' => $row['usc_company_info']
      			);
     echo json_encode($result);
   }
unset($name,$quymo,$address,$city,$phone,$website,$info,$userid,$code,$db_qrcheck,$db_ex,$db_ex2,$mst);
?>