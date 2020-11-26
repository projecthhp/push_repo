<?
include("../home/config.php");
require_once("../functions/functions.php"); 
require_once("../functions/send_mail.php"); 
include("../email/config.php");
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
   $name = 'usc_company';
   $pass = 'usc_pass';
   $or   = 'ntd=';
   $time = 'usc_create_time';
   $url = 'doi-mat-khau-nha-tuyen-dung.html';
}else if($uv == 1){
   $user = 'user';
   $id  = 'use_id';
   $user_email = 'use_mail';
   $type = 'use_type';
   $name = 'use_name';
   $or   = 'uv=';
   $pass = 'use_pass';
   $time = 'use_create_time';
   $url = 'doi-mat-khau.html';
}
$result = array('data' => null, 'code' => 0, 'kq' => false);
if($email != '')
{
   $db_qr = new db_query("SELECT ".$id.",".$name.",".$time.",".$pass." FROM ".$user." WHERE ".$user_email." = '".$email."'");
//   $db_qr = new db_query("SELECT ".$id.",".$time.",".$pass." FROM ".$user." WHERE ".$user_email." = '".$email."' AND ".$type." = 0");
   $cout_id  = mysql_num_rows($db_qr->result);
   if ($cout_id == 0) {
      $result = array('data' => null, 'code' => 3, 'kq' => false);
      echo 0;
      // echo json_encode($result);
   } else {
      //      echo 1;
      $data = mysql_fetch_assoc($db_qr->result);
      $id = $data['use_id'];
      $name = $data['use_name'];
      $token = $data['use_pass'];

      Send_QMK($email, $name, $token, $id);
      $result = array('data' => null, 'code' => 1, 'kq' => true);
      echo 1;
      // echo json_encode($result);
      /** Kết thúc gửi email **/
//      unset($username,$password,$company_name,$company_address,$phone,$timeaway,$query,$db_ex,$last_id,$db_exciu);
   }
}
else
{
   echo 0;
   // echo json_encode($result);
}
?>