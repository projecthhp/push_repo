<?php
include("../home/config.php");
include("../functions/send_mail.php");

$email = getValue("email","str","POST","");
$email = replaceMQ(trim($email));
$password         = getValue("password","str","POST","");
$password         = replaceMQ($password);
$password = md5($password);
$lgname = getValue("first_name","str","POST","");
$lgname = replaceMQ(trim($lgname));
$phone            = getValue("phone","str","POST","");
$phone            = replaceMQ($phone);
$use_city     = getValue("city","int","POST","0");
$use_city     = replaceMQ($use_city);
$lgaddress = getValue("address","str","POST","");
$lgaddress = replaceMQ(trim($lgaddress));
$cv_title = getValue("cv_title","str","POST","");
$cv_title = replaceMQ(trim($cv_title));
$lg_thanhpho = getValue("city_work","str","POST","");
$lg_thanhpho = replaceMQ(trim($lg_thanhpho));
$lg_nganhnghe = getValue("cate","str","POST","");
$lg_nganhnghe = replaceMQ(trim($lg_nganhnghe));

$user_name = $lgname;
$timeaway = time();
//$quanhuyen  = $data['use_qh'];
$address = $lgaddress;
$jobname = $cv_title;
$job_address = $lg_thanhpho;
$nganh_nghe = $lg_nganhnghe;
if($email != '' && $password != '' && $user_name != '' && $phone != '')
{
   $db_qr = new db_query("SELECT use_id FROM user WHERE use_mail = '".$email."'");
   if(mysql_num_rows($db_qr->result) == 0)
   {

    $insert = new db_query("INSERT INTO `user`(`use_mail`, `use_phone`, `use_pass`, `use_time`, `use_authentic`, `use_name`, `use_city`,`address`,`use_district`,`use_job_name`,`use_district_job`,`use_nganh_nghe`,`use_create_time`,`use_update_time`, `register`) VALUES ('" . $email . "','" . $phone . "','" . $password . "'," . $timeaway . ",'0','" . $user_name . "','" . $user_city . "','" . $address . "','" . $district . "','" . $jobname . "','" . $job_address . "','" . $nganh_nghe . "','" . time() . "','" . time() . "',4)");
    $last_id = mysql_insert_id();
    $query_nguoi_tham_chieu = new db_query("INSERT INTO `user_tham_chieu`(`id_user`) VALUES ('" . $last_id . "')");
    $secu = md5($email);

    $link = "https://timviec365.com/xac-thuc-tai-khoan-ung-vien-thanh-cong.html?code=" . $secu . "&id=" . $last_id;
    /** Gửi email khi đăng ký thành công **/
    SendRegisterTVC($email, $user_name, $link);
    $result = array('data' => null, 'code' => (int) $last_id, 'kq' => true);
    echo json_encode($result);
   }
   else
   {
    echo json_encode($result);
   }
}else{
  echo json_encode($result);
}

?>
