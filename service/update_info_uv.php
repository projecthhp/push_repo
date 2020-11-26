<?
include("../home/config.php");
$ho_ten = getValue("lgname","str","POST","");
$ho_ten = replaceMQ(trim($ho_ten));
$ngay_sinh = getValue("lgbirthday","str","POST","");
$ngay_sinh = replaceMQ(trim($ngay_sinh));
$ngay_sinh = str_replace("/","-",$ngay_sinh);
$ngay_sinh = strtotime($ngay_sinh);
$dia_chi_hien_tai = getValue("lgaddress","str","POST","");
$dia_chi_hien_tai = replaceMQ(trim($dia_chi_hien_tai));
$user_gender = getValue("lg_gioitinh","int","POST",0);
$user_gender = (int)$user_gender;
$tinh_trang_hon_nhan = getValue("lg_honnhan","int","POST",0);
$tinh_trang_hon_nhan = (int)$tinh_trang_hon_nhan;
$use_thanh_pho = getValue("lg_thanhpho","int","POST",0);
//$lg_thanhpho = implode(',', $lg_thanhpho);
$sdt_user = getValue("lg_sdt","str","POST",'');
$sdt_user = (int)$sdt_user;
$userid = getValue("iduser","int","POST",0);
$userid = (int)$userid;
$result = array('data' => null, 'code' => 0, 'kq' => false);

$db_qrcheck = new db_query("SELECT use_id FROM user WHERE use_id = '".$userid."' LIMIT 1");
if(mysql_num_rows($db_qrcheck->result) > 0)
{
   $db_ex = new db_execute("UPDATE user SET use_name ='".$ho_ten."',use_phone = '".$sdt_user."',birthday = '".$ngay_sinh."',gender = '".$user_gender."',lg_honnhan = '".$tinh_trang_hon_nhan."',address = '".$dia_chi_hien_tai."',use_city = '".$use_thanh_pho."', use_update_time = '".time()."' WHERE use_id = '".$userid."'");
   $result = array('data' => null, 'code' => 1, 'kq' => true);
   echo json_encode($result);
}
else
{
   echo json_encode($result);
}
?>