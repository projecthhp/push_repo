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
      $db_qr_exits = new db_query("SELECT * FROM user WHERE use_mail = '".$user_uv."' LIMIT 1");
      if(mysql_num_rows($db_qr_exits->result) > 0)
      {
         $db_qr = new db_query("SELECT * FROM user WHERE use_mail = '".$user_uv."' AND use_pass = '".$password."' LIMIT 1");
         if(mysql_num_rows($db_qr->result) > 0)
         {
            $r = array();
            if($row = mysql_fetch_assoc($db_qr->result))
            {
               $r["id"] = $row["use_id"];
               $r["email"] = $row["use_mail"];
               $r["cv_title"] = $row["use_job_name"];
               $r["name"] = $row["use_name"];
               $r["password"] = $row["use_pass"];
               $r["image"] = $row["use_logo"];
               $r["mobile"] = $row["use_phone"];
               $r["address"] = $row["address"];
               $r["birthday"] = date("Y-m-d", $row["birthday"]);
               $r["sex"] = $row["gender"];
               $r["marry"] = $row["lg_honnhan"];
               $r["created_day"] = date("Y-m-d H:i:s", $row["use_create_time"]);
               $r["edit_day"] = date("Y-m-d H:i:s", $row["use_update_time"]);
               $r["status"] = $row["use_authentic"];
               $r["security"] = "";
               $r["uv_show"] = $row["use_show"];
            }
            echo json_encode($r);
         }
         else
         {
            echo "Sai thông tin tài khoản hoặc mật khẩu";
         }
      } else {
         echo "Tài khoản không tồn tại trên hệ thống. Vui lòng đăng ký";
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