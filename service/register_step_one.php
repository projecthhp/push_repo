<?
include("../home/config.php");
include("../functions/send_mail.php");
$email         = getValue("email", "str", "POST", "");
$email         = replaceMQ($email);
$birthday      = getValue("birthday","str","POST","");
$birthday      = replaceMQ($birthday);
$birthday      = strtotime($birthday);
$gender        = getValue("gender","int","POST","");
$gender        = replaceMQ($gender);
$lg_honnhan    = getValue("lg_honnhan","int","POST","");
$lg_honnhan    = replaceMQ($lg_honnhan);
$school_name   = getValue("school_name","str","POST","");
$school_name   = replaceMQ($school_name);
$rank          = getValue("rank","int","POST","");
$rank          = replaceMQ($rank);
$exp_years     = getValue("exp_years","int","POST","");
$exp_years     = replaceMQ($exp_years);
$salary        = getValue("salary","int","POST","");
$salary        = replaceMQ($salary);
$work_option   = getValue("work_option","int","POST","");
$work_option   = replaceMQ($work_option);
$cap_bac_mong_muon   = getValue("cap_bac_mong_muon","int","POST","");
$cap_bac_mong_muon   = replaceMQ($cap_bac_mong_muon);
$muc_tieu_nghe_nghiep   = getValue("targer_job", "str", "POST", "");
$muc_tieu_nghe_nghiep   = replaceMQ($muc_tieu_nghe_nghiep);
$ki_nang_ban_than        = getValue("skill", "str", "POST", "");
$ki_nang_ban_than        = replaceMQ($ki_nang_ban_than);

$timeaway     = time();
$result = array('data' => null, 'code' => 0, 'kq' => false);

$db = new db_query("SELECT * FROM tmp_user WHERE tmp_email = '".$email."'");   
if(mysql_num_rows($db->result)>0){
    $data = mysql_fetch_assoc($db->result);
    $password = $data['tmp_pass'];
    $user_name = $data['tmp_name'];
    $timeaway = $data['tmp_time'];
    $phone = $data['tmp_phone'];
    $user_city = $data['tmp_city'];
    //$quanhuyen  = $data['use_qh'];
    $address = $data['tmp_address'];
    $jobname = $data['tmp_job_name'];
    $job_address = $data['tmp_job_city'];
    $nganh_nghe = $data['tmp_nganh_nghe'];
    //$use_create_time = $data['use_create_time'];
}else {
    $result = array('data' => null, 'code' => 1, 'kq' => false);
    echo json_encode($result);
    exit();
}

if ($email != '' && $password != '' && $phone != '' && $user_name != '') {
    $db_qr = new db_query("SELECT use_id FROM user WHERE use_mail = '".$email."'");
   if(mysql_num_rows($db_qr->result) == 0)
   {
        $query = "INSERT INTO `user`(`use_mail`, `use_phone`, `use_pass`, `use_time`, `use_authentic`,`use_name`,`use_city`,`use_district`,`address`,`use_job_name`,`use_district_job`,`use_nganh_nghe`,`birthday`,`gender`,`lg_honnhan`,`school_name`,`rank`,`exp_years`,`salary`,`work_option`,`cap_bac_mong_muon`,`muc_tieu_nghe_nghiep`,`ki_nang_ban_than`,`use_create_time`,`use_update_time`, `register`) VALUES ('".$email."','".$phone."','".$password."','".$timeaway."','0','".$user_name."','".$user_city."','".$district."','".$address."','".$jobname."','".$job_address."','".$nganh_nghe."','".$birthday."','".$gender."','".$lg_honnhan."','".$school_name."','".$rank."','".$exp_years."','".$salary."','".$work_option."','".$cap_bac_mong_muon."','".$muc_tieu_nghe_nghiep."','".$ki_nang_ban_than."','".time()."','".time()."',2)";
        $db_ex = new db_execute_return();
        $last_id = $db_ex->db_execute($query);

        $query_nguoi_tham_chieu = new db_query("INSERT INTO `user_tham_chieu`(`id_user`) VALUES ('".$last_id."')");

        $secu = md5($email);
        $link = "https://timviec365.com/xac-thuc-tai-khoan-ung-vien-thanh-cong.html?code=".$secu."&id=".$last_id;
        
        // unset($_COOKIE['UT']);
        // setcookie('UT', null, -1, '/');
        // setcookie('UT', 0 ,time() + 7*6000,'/');
        // setcookie('UID', $last_id ,time() + 7*6000,'/');
        // setcookie('PHPSESPASS', $password ,time() + 7*6000,'/');
        /** Gửi email khi đăng ký thành công **/
        SendRegisterTVC($email,$user_name,$link);

        //xoa ttuv bang tam
        $del_tmp = new db_query("DELETE FROM tmp_user WHERE tmp_email = '".$email."'");
        $result = array('data' => null, 'code' => (int)$last_id, 'kq' => true);
        echo json_encode($result);
    } else {
        echo json_encode($result);
    }
} else {
    echo json_encode($result);
}
