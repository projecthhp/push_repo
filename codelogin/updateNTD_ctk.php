<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$userid = $_COOKIE["UID"];
$userid = (int)replaceMQ(trim($userid));
$name_us = getValue("name_us","str","POST","");
$name_us = replaceMQ(trim($name_us));
$add_us = getValue("add_us","str","POST","");
$add_us = replaceMQ(trim($add_us));
$phone_us = getValue("phone_us","str","POST","");
$phone_us = replaceMQ(trim($phone_us));
$email_us = getValue("email_us","str","POST","");
$email_us = replaceMQ(trim($email_us));

   if($name_us != '' && $add_us != '' && $phone_us != '' && $email_us != '')
   {
      $db_ex = new db_execute("UPDATE user_company SET usc_name='".$name_us."',usc_name_add = '".$add_us."',usc_name_phone = '".$phone_us."',usc_name_email = '".$email_us."', usc_update_time = '".time()."' WHERE usc_id = '".$userid."'");
      unset($db_ex);
      unset($name_us,$add_us,$phone_us,$email_us,$userid,$code,$db_qrcheck,$db_ex);
      redirect('/thong-tin-tai-khoan-nha-tuyen-dung.html');
   }

?>