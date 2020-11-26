<?
include("../home/config.php");
$name_us = getValue("name_us","str","POST","");
$name_us = replaceMQ(trim($name_us));
$add_us = getValue("add_us","str","POST","");
$add_us = replaceMQ(trim($add_us));
$phone_us = getValue("phone_us","str","POST","");
$phone_us = replaceMQ(trim($phone_us));
$email_us = getValue("email_us","str","POST","");
$email_us = replaceMQ(trim($email_us));
$userid = getValue("iduser","int","POST",0);
$userid = (int)$userid;
$result = array('data' => null, 'code' => 0, 'kq' => false);

$db_qrcheck = new db_query("SELECT usc_id FROM user_company WHERE usc_id = '".$userid."' LIMIT 1");
if(mysql_num_rows($db_qrcheck->result) > 0)
{
   if($name_us != '' && $add_us != '' && $phone_us != '' && $email_us != '')
   {
      $db_ex = new db_execute("UPDATE user_company SET usc_name='".$name_us."',usc_name_add = '".$add_us."',usc_name_phone = '".$phone_us."',usc_name_email = '".$email_us."' WHERE usc_id = '".$userid."'");
      $result = array('data' => null, 'code' => 1, 'kq' => true);
		echo json_encode($result);
   }else{
      echo json_encode($result);
   }
}
else
{
   echo json_encode($result);
}
?>