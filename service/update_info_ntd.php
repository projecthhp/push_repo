<?
include("../home/config.php");
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
$userid = getValue("iduser","int","POST",0);
$userid = (int)$userid;
$result = array('data' => null, 'code' => 0, 'kq' => false);

$db_qrcheck = new db_query("SELECT usc_id FROM user_company WHERE usc_id = '".$userid."' LIMIT 1");
if(mysql_num_rows($db_qrcheck->result) > 0)
{
   if($name != '')
   {
      $db_ex = new db_execute("UPDATE user_company SET usc_company='".$name."',usc_size = '".$quymo."',usc_address = '".$address."',usc_city = '".$city."',usc_phone = '".$phone."',usc_website = '".$website."',usc_mst = '".$mst."' WHERE usc_id = '".$userid."'");
      $db_ex2 = new db_execute("UPDATE user_company_multi SET usc_company_info='".$info."' WHERE usc_id = '".$userid."'");
      $result = array('data' => null, 'code' => 1, 'kq' => true);
      echo json_encode($result);
   } else {
      echo json_encode($result);
   }
}
else
{
   echo json_encode($result);
}
?>