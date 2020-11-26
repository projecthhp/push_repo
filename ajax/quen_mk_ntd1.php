<?
include("../home/config.php");
require_once("../functions/functions.php"); 
require_once("../functions/send_mail.php"); 

require_once("../classes/database.php");


$email = getValue("email","str","POST","");
$email = replaceMQ($email);


if($email != '')
{
   $db_qr = new db_query("SELECT usc_id, usc_company, usc_pass FROM user_company WHERE usc_email = '".$email."'");
   $cout_id  = mysql_num_rows($db_qr->result);
   if($cout_id == 0)
   {
      echo 0;
   }
   else
   {
      echo 1;
      $data = mysql_fetch_assoc($db_qr->result);
      $id = $data['usc_id'];
      $name = $data['usc_company'];
      $token = $data['usc_pass'];

      Send_QMKNTD($email,$name,$token,$id);
   }
}
else
{
   redirect('http://google.com.vn');
}
?>