<?
include("../home/config.php");

$user_tencv = getValue("user_tencv", "str", "POST", "");
$user_tencv = replaceMQ(trim($user_tencv));
$cap_bac = getValue("cap_bac", "str", "POST", "");
$cap_bac = replaceMQ(trim($cap_bac));
$dia_diem_lam_viec = getValue("dia_diem_lam_viec", "str", "POST", "");
$dia_diem_lam_viec = replaceMQ(trim($dia_diem_lam_viec));
$sl_nganh_nghe = getValue("sl_nganh_nghe", "str", "POST", "");
$sl_nganh_nghe = replaceMQ(trim($sl_nganh_nghe));
$use_muc_luong = getValue("use_muc_luong", "str", "POST", "");
$use_muc_luong = replaceMQ(trim($use_muc_luong));
$use_hinh_thuc = getValue("use_hinh_thuc", "str", "POST", "");
$use_hinh_thuc = replaceMQ(trim($use_hinh_thuc));
$use_kinh_nghiem = getValue("use_kinh_nghiem", "str", "POST", "");
$use_kinh_nghiem = replaceMQ(trim($use_kinh_nghiem));
$userid = getValue("iduser", "int", "POST", 0);
$userid = (int) $userid;
$result = array('data' => null, 'code' => 0, 'kq' => false);

$db_qrcheck = new db_query("SELECT use_id FROM user WHERE use_id = '" . $userid . "' LIMIT 1");
if (mysql_num_rows($db_qrcheck->result) > 0) {
   $db_ex = new db_execute("UPDATE user SET use_job_name='".$user_tencv."',cap_bac_mong_muon = '".$cap_bac."',use_district_job = '".$dia_diem_lam_viec."',use_nganh_nghe = '".$sl_nganh_nghe."',salary = '".$use_muc_luong."', work_option = '".$use_hinh_thuc."', exp_years = '".$use_kinh_nghiem."', use_update_time = '".time()."' WHERE use_id = '".$userid."'");
   $result = array('data' => null, 'code' => 1, 'kq' => true);
   echo json_encode($result);
} else {
   echo json_encode($result);
}
