<?
include("../home/config.php");
include("../functions/send_mail.php");

$username         = getValue("email","str","POST","");
$username         = replaceMQ($username);
$password         = getValue("password_first","str","POST","");
$password         = replaceMQ($password);
$password         = md5($password);
$user_name     = getValue("user_name","str","POST","");
$user_name     = replaceMQ($user_name);
$user_name_md5 = md5($user_name);
$address  = getValue("address","str","POST","");
$address  = replaceMQ($address);
$user_city     = getValue("user_city","str","POST","0");
$user_city     = replaceMQ($user_city);
$phone            = getValue("phone","str","POST","");
$phone            = replaceMQ($phone);
$usc_info     = getValue("usc_info","str","POST","");
$usc_info     = replaceMQ($usc_info);
$timeaway         = time();
$result = array('data' => null, 'code' => 0, 'kq' => false);

if( $username != '' && $password != '' && $phone != '')
{
   $usc_check_phone = new db_query("SELECT usc_id FROM user_company WHERE usc_phone = '".$phone."'");
   if(mysql_num_rows($usc_check_phone->result) == 0)
	{
      $usc_check_name = new db_query("SELECT usc_id FROM user_company WHERE BINARY LOWER(`usc_company`) = '".$user_name."' ");
      if(mysql_num_rows($usc_check_name->result) == 0)
      {
         $usc_check = new db_query("SELECT usc_id,usc_security FROM user_company WHERE usc_email = '".$username."'");
         if(mysql_num_rows($usc_check->result) == 0)
         {
            $alias = replaceTitle($user_name);
            $alias = substr($alias,0,55);
            if($alias == ''){
               $alias = 'tuyen-dung-viec-lam-quoc-te';
            } else {
               $alias = replaceTitle($user_name);
            }
            $query = "INSERT INTO `user_company`(`usc_email`, `usc_phone`, `usc_pass`, `usc_create_time`, `usc_security`,`usc_authentic`,`usc_company`,`usc_md5`,`usc_city`,`usc_address`,`usc_alias`, `register`) VALUES ('".$username."','".$phone."','".$password."','".$timeaway."','0','0','".$user_name."','".$user_name_md5."','".$user_city."','".$address."','".$alias."', 2)";
            $db_ex = new db_execute_return();
            $last_id = $db_ex->db_execute($query);
            $qr_com_multi = new db_query("INSERT INTO `user_company_multi`(`usc_id`,`usc_company_info`) VALUES ('".$last_id."','".$usc_info."')");
            $secu = md5($username);
            $link = "https://timviec365.com/xac-thuc-tai-khoan-nha-tuyen-dung-thanh-cong.html?code=".$secu."&id=".$last_id;
   
            setcookie('UT', 1 ,time() + 7*6000,'/');
            setcookie('UID', $last_id ,time() + 7*6000,'/');
            setcookie('PHPSESPASS', $password ,time() + 7*6000,'/');
   
            /** Gửi email khi đăng ký thành công **/
            SendRegisterNTD($username,$user_name,$link);
            $result = array('data' => null, 'code' => (int)$last_id, 'kq' => true);
            echo json_encode($result);
            exit();
         }else{
            $result = array('data' => null, 'code' => 0, 'kq' => true);
            echo json_encode($result);
            exit();
         }
      }
      //Tên công ty đã tồn tại. Vui lòng nhập tên khác
      $result = array('data' => null, 'code' => 2, 'kq' => false);
      echo json_encode($result);
      exit();
   }
   //Số điện thoại đã tồn tại. Vui lòng nhập số điện thoại khác
   $result = array('data' => null, 'code' => 3, 'kq' => false);
   echo json_encode($result);
   exit();
} else {
   echo json_encode($result);
}
?>