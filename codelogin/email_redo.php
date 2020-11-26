<?
include("../home/config.php");
include("../functions/send_mail.php");

$email         = getValue("email","str","POST","");
$email         = replaceMQ($email);
$id         = getValue("id","str","POST","0");
$id         = replaceMQ($id);
$lastname      = getValue("name","str","POST","");
$lastname      = replaceMQ($lastname);

if($email != '' && $id != '0' && $lastname != '')
{
	$check = new db_query("SELECT use_id FROM user WHERE use_id = ".$id." AND use_mail = '".$email."' AND use_name = '".$lastname."' ");
	if(mysql_num_rows($check->result) > 0){
		$secu = md5($email);
		$link = $domain."/xac-thuc-tai-khoan-ung-vien-thanh-cong.html?code=".$secu."&id=".$id;
		SendRegisterTVC($email,$lastname,$link);
		unset($email,$lastname,$id);
		echo 1;
	}
	else{
		$secu = md5($email);
		$link = $domain."/xac-thuc-tai-khoan-nha-tuyen-dung-thanh-cong.html?code=".$secu."&id=".$id;
		SendRegisterNTD($email,$lastname,$link);
		unset($email,$lastname,$id);
		echo 1;
	}
}
else
{
  echo 0; 
}
?>