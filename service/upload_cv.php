<?php
include("../home/config.php");
include("../functions/send_mail.php");
require_once("../classes/resize-class.php");
$email         = getValue("email","str","POST",0);
$email         = replaceMQ($email);
$namefile         = getValue("namefile","str","POST",0);
$time = time();
$result = array('data' => null, 'code' => 0, 'kq' => false);

if(isset($_FILES) and $_SERVER['REQUEST_METHOD'] == "POST"){

$type = end(explode('.', $namefile));    
$name = 'app_'.$time.".".$type;
$namefile = 'app'.$time."_".$namefile;

$targetDir = '../upload/uv/';
$year = date('Y',time());
  $month = date('m',time());
  $day = date('d',time());

  if(!file_exists($targetDir.$year))
  {
    mkdir($targetDir.$year);
  }
  if(!file_exists($targetDir.$year.'/'.$month))
  {
    mkdir($targetDir.$year.'/'.$month);
  }
  if(!file_exists($targetDir.$year.'/'.$month.'/'.$day))
  {
    mkdir($targetDir.$year.'/'.$month.'/'.$day);
  }

  $targetFilePath = $targetDir.$year.'/'.$month.'/'.$day.'/'. $namefile;

file_put_contents($targetFilePath, file_get_contents($_FILES['file']['tmp_name']));  

move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath);

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
}
$city_name = $arrcity[$user_city]['cit_name'];
if($email != '' && $password != '' && $user_name != '' && $phone != '')
{
   $db_qr = new db_query("SELECT use_id FROM user WHERE use_mail = '".$email."'");
   if(mysql_num_rows($db_qr->result) == 0)
   {

      $insert = new db_query("INSERT INTO `user`(`use_mail`, `use_phone`, `use_pass`, `use_time`, `use_authentic`, `use_name`, `use_city`,`address`,`use_district`,`use_job_name`,`use_district_job`,`use_nganh_nghe`,`use_create_time`,`use_update_time`, `register`) VALUES ('".$email."','".$phone."','".$password."',".$timeaway.",'0','".$user_name."','".$user_city."','".$address."','".$district."','".$jobname."','".$job_address."','".$nganh_nghe."','".time()."','".time()."',2)");
      $last_id = mysql_insert_id();
      $insert_upload = new db_query("INSERT INTO user_cv_upload(`use_id`,`link`) VALUES ('".$last_id."','".$targetFilePath."')");
        // unset($_SESSION['email'],$_SESSION['password'],$_SESSION['phone'],$_SESSION['user_name'],$_SESSION['user_city'],$_SESSION['district'],$_SESSION['address'],$_SESSION['jobname'],$_SESSION['nganh_nghe']);
        $query_nguoi_tham_chieu = new db_query("INSERT INTO `user_tham_chieu`(`id_user`) VALUES ('".$last_id."')");
        $secu = md5($email);
        
        $link = "https://timviec365.com/xac-thuc-tai-khoan-ung-vien-thanh-cong.html?code=".$secu."&id=".$last_id;
        setcookie('UT', 0 ,time() + 7*6000,'/');
        setcookie('UID', $last_id ,time() + 7*6000,'/');
        setcookie('PHPSESPASS', $password ,time() + 7*6000,'/');

        /** Gửi email khi đăng ký thành công **/
        SendRegisterTVC($email,$user_name,$link);
        $del_tmp = new db_query("DELETE FROM tmp_user WHERE tmp_email = '".$email."'");

      setcookie('UT', 0 ,time() + 7*6000,'/');
      setcookie('UID', $last_id ,time() + 7*6000,'/');
      setcookie('PHPSESPASS', $password ,time() + 7*6000,'/');

      $result = array('data' => null, 'code' => (int)$last_id, 'kq' => true);
      echo json_encode($result);
   }
   else
   {
    echo json_encode($result);
   }
}   
}else{
  echo json_encode($result);
}

?>
