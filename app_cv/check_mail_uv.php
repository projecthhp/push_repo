<?
include("../home/config.php");

$email         = getValue("email","str","GET","");
$email         = replaceMQ($email);

if($email != '')
{
   $db_qr = new db_query("SELECT use_id FROM user WHERE use_mail = '".$email."'");
   if(mysql_num_rows($db_qr->result)>0)
   {
      echo '1';
   }
   else
   {
      echo '0';
   }
   
}
?>