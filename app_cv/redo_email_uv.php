<?
include("../home/config.php");
include("../functions/send_mail.php");

$email         = getValue("email","str","GET","");
$email         = replaceMQ($email);
$result = array('data' => null, 'code' => 0, 'kq' => false);

if($email != '')
{
   $db_qr = new db_query("SELECT use_id,use_name FROM user WHERE use_authentic=0 AND use_mail = '".$email."'");
   if(mysql_num_rows($db_qr->result) > 0)
   {
      $secu = md5($email);
      $row = mysql_fetch_assoc($db_qr->result);  
      $link = "https://timviec365.com/xac-thuc-tai-khoan-ung-vien-thanh-cong.html?code=".$secu."&id=".$row['use_id'];
  
      SendRegisterTVC($email,$row['use_name'],$link);
      $result = array('data' => null, 'code' => 1, 'kq' => true);
      echo json_encode($result);
   }else{
      echo json_encode($result);
   }
}else{
   echo json_encode($result);
}
?>