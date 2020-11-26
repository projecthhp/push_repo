<?
include("../home/config.php");
require_once("../functions/functions.php"); 
require_once("../functions/send_mail.php"); 

require_once("../classes/database.php");


$email = getValue("email","str","POST","");
$email = replaceMQ($email);


if($email != '')
{
   $db_qr = new db_query("SELECT use_id, use_name, use_pass FROM user WHERE use_mail = '".$email."'");
   $cout_id  = mysql_num_rows($db_qr->result);
   if($cout_id == 0)
   {
      echo 0;
   }
   else
   {
      echo 1;
      $data = mysql_fetch_assoc($db_qr->result);
      $id = $data['use_id'];
      $name = $data['use_name'];
      $token = $data['use_pass'];

      Send_QMK($email,$name,$token,$id);
   }
}
else
{
   redirect('http://google.com.vn');
}
?>