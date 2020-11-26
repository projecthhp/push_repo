<?
include("../home/config.php");
require_once("../functions/functions.php"); 
require_once("../functions/send_mail.php"); 

require_once("../classes/database.php");

function rand_string( $length ) {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$size = strlen( $chars );
$str = '';
for( $i = 0; $i < $length; $i++ ) {
$str .= $chars[ rand( 0, $size - 1 ) ];
 }
return $str;
}
$email = getValue("email","str","POST","");
$email = replaceMQ($email);
$ntd = getValue("ntd","str","POST",0);
$ntd = replaceMQ($ntd);
$uv = getValue("uv","str","POST",0);
$uv = replaceMQ($uv);
$user = '';
$id   = '';
$user_email = '';
$type = '';
$or   = '';
$time = '';
if($ntd == 1){
   $user = 'user_company';
   $id  = 'usc_id';
   $user_email = 'usc_email';
   $type = 'usc_type';
   $pass = 'usc_pass';
   $or   = 'ntd=';
   $time = 'usc_create_time';
}else if($uv == 1){
   $user = 'user';
   $id  = 'use_id';
   $user_email = 'use_email';
   $type = 'use_type';
   $or   = 'uv=';
   $pass = 'use_pass';
   $time = 'use_create_time';
}
if($email != '')
{
   $db_qr = new db_query("SELECT ".$id.",".$time.",".$pass." FROM ".$user." WHERE ".$user_email." = '".$email."' AND ".$type." = 0");
   $cout_id  = mysql_num_rows($db_qr->result);
   if($cout_id == 0)
   {
      echo 0;
   }
   else
   {
      echo 1;
      $data = mysql_fetch_assoc($db_qr->result);
      $id = $data[$id];
      $time    = $data[$time];
      $token = $data[$pass];
      $company_name = 

      Send_QMK_NTD($email,$email,$token,$or,$id);
      header('Location: /nha-tuyen-dung/tai-khoan.html'); 
   }
}
else
{
   redirect('http://google.com.vn');
}
?>