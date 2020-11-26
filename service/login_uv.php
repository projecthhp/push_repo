<?
include("../home/config.php");
$email = getValue("email","str","POST","");
$pass = getValue("pass","str","POST","");
if($email != "")
{   
   $user_uv = $email;
   $password = md5($pass);
   if($user_uv != "" && $password != "")
   {
      $db_qr = new db_query("SELECT user.*,cv.id_upload,cv.link FROM user LEFT JOIN user_cv_upload as cv ON user.use_id = cv.use_id WHERE use_mail = '".$user_uv."' AND use_pass = '".$password."' LIMIT 1");
      if(mysql_num_rows($db_qr->result) > 0)
      {
         $r = array();
         if($row = mysql_fetch_assoc($db_qr->result))
         {
            $r = $row;
         }
         echo json_encode($r);
      }
      else
      {
         echo "Mật khẩu hoặc Email !";
      }
   }
   else
   {
      echo "Mật khẩu hoặc Email đăng nhập không đúng!";
   }   
}
else
{
   echo "Vui lòng nhập mật khẩu hoặc tài khoản!";
}
?>