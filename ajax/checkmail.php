<?
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$email = getValue("email","str","POST","");
$email = replaceMQ($email);
if($email != '')
{
      $db_qr = new db_query("SELECT COUNT(*) as total FROM user WHERE use_mail = '".$email."'");
      $data  = mysql_fetch_assoc($db_qr->result);
      if($data['total'] == 0)
      {
         echo 0;
      }
      else
      {
         echo 1;
      }
}
else
{
   redirect('http://google.com.vn');
}
?>