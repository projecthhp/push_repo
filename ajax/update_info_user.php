<?
require_once("../functions/functions.php"); 
require_once("../functions/array_front_end.php");
require_once("../classes/database.php");

$userid = $_COOKIE["UID"];
$userid = (int)replaceMQ($userid);
$ho_ten = getValue("ho_ten","str","POST","");
$ho_ten = replaceMQ(trim($ho_ten));
$sdt_user = getValue("sdt_user","int","POST",0);
$sdt_user = (int)$sdt_user;
$ngay_sinh = getValue("ngay_sinh","str","POST","");
$ngay_sinh = replaceMQ($ngay_sinh);
$dia_chi_hien_tai = getValue("dia_chi_hien_tai","str","POST","");
$dia_chi_hien_tai = replaceMQ(trim($dia_chi_hien_tai));
$user_gender = getValue("user_gender","int","POST",0);
$user_gender = (int)$user_gender;
$tinh_trang_hon_nhan = getValue("tinh_trang_hon_nhan","str","POST","");
$tinh_trang_hon_nhan = replaceMQ(trim($tinh_trang_hon_nhan));
$use_thanh_pho = getValue("use_thanh_pho","int","POST","");
$use_thanh_pho = replaceMQ($use_thanh_pho);
   // if($ho_ten != '' && $sdt_user != '' && $dia_chi_hien_tai != '' && $user_gender > 0 && $tinh_trang_hon_nhan > 0 && $ngay_sinh != null)
   // {
      $db_ex = new db_execute("UPDATE user SET use_name ='".$ho_ten."',use_phone = '".$sdt_user."',birthday = '".strtotime($ngay_sinh)."',gender = '".$user_gender."',lg_honnhan = '".$tinh_trang_hon_nhan."',address = '".$dia_chi_hien_tai."',use_city = '".$use_thanh_pho."', use_update_time = '".time()."' WHERE use_id = '".$userid."'");
      $db_thongbao = new db_query("SELECT user.use_name,user.use_phone,user.birthday,user.gender,user.lg_honnhan,user. address,user.use_city,city.cit_name FROM user JOIN city ON city.cit_id = user.use_city WHERE use_id = ".$userid);
      $row = mysql_fetch_array($db_thongbao->result);
      $result = array(
      				'use_name' => $row['use_name'],
      				'use_phone' => $row['use_phone'],
      				'birthday' => date('d/m/Y',$row['birthday']),
      				'gender' => $array_gioi_tinh_tt[$row['gender']],
      				'lg_honnhan' => $array_hon_nhan[$row['lg_honnhan']],
      				'address' => $row['address'],
                  'use_city' => $row['cit_name']
      			);
     echo json_encode($result);
   // }
   // else{
   //    echo 'ko vao dc day';
   // }
?>