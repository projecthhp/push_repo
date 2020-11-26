<?
include("../home/config.php");
include("../functions/send_mail.php");

$email         = getValue("email","str","GET","");
$email         = replaceMQ($email);
$result = array('data' => null, 'code' => 0, 'kq' => false);

if($email != '')
{
    $db_qr = new db_query("SELECT usc_id,usc_security FROM user_company WHERE usc_authentic=0 AND usc_email = '".$email."'");
    if(mysql_num_rows($db_qr->result) > 0)
    {
        $secu = md5($email);
        $row = mysql_fetch_assoc($db_qr->result);  
        $link = "https://timviec365.com/xac-thuc-tai-khoan-nha-tuyen-dung-thanh-cong.html?code=".$secu."&id=".$row['usc_id'];
        SendRegisterNTD($email,$row['usc_name'],$link);
        $result = array('data' => null, 'code' => 1, 'kq' => true);
        echo json_encode($result);
    }else{
        echo json_encode($result);
    }
}else{
    echo json_encode($result);
}
?>