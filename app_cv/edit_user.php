<?
include("../home/config.php");
$ho_ten = getValue("first_name","str","POST","");
$ho_ten = replaceMQ(trim($ho_ten));
$ngay_sinh = getValue("birth_day","str","POST","");
$ngay_sinh = replaceMQ(trim($ngay_sinh));
$ngay_sinh = str_replace("/","-",$ngay_sinh);
$ngay_sinh = strtotime($ngay_sinh);
$dia_chi_hien_tai = getValue("address","str","POST","");
$dia_chi_hien_tai = replaceMQ(trim($dia_chi_hien_tai));
$user_gender = getValue("sex","int","POST",0);
$user_gender = (int)$user_gender;
$tinh_trang_hon_nhan = getValue("marry","int","POST",0);
$tinh_trang_hon_nhan = (int)$tinh_trang_hon_nhan;
$sdt_user = getValue("phone","int","POST",0);
$sdt_user = (int)$sdt_user;
$userid = getValue("id_user","int","POST",0);
$userid = (int)$userid;
$password         = getValue("password", "str", "POST", "");
$password         = replaceMQ($password);
$password         = md5($password);
$result = array('data' => null, 'code' => 0, 'kq' => false);

$db_qrcheck = new db_query("SELECT use_id FROM user WHERE use_id = '".$userid."' AND use_pass = '".$password."' LIMIT 1");
if(mysql_num_rows($db_qrcheck->result) > 0)
{
   $db_ex = new db_execute("UPDATE user SET use_name ='".$ho_ten."',use_phone = '".$sdt_user."',birthday = '".$ngay_sinh."',gender = '".$user_gender."',lg_honnhan = '".$tinh_trang_hon_nhan."',address = '".$dia_chi_hien_tai."', use_update_time = '".time()."' WHERE use_id = '".$userid."'");
   $result = array('data' => null, 'code' => 1, 'kq' => true);
   echo json_encode($result);
}
else
{
   echo json_encode($result);
}
?>