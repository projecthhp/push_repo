<?
include("../home/config.php");
header("Content-Type:application/json");
//Url mẫu https://timviec365.vn/service/detail_ungvien.php?useid=123
$useid = getValue("useid","int","GET",0);
$useid = (int)$useid;
$pass = getValue("pass","str","GET","");
$pass = md5($pass);
if($useid != 0)
{
    $qr_personal = new db_query("SELECT * FROM  user WHERE use_id = ".$useid." AND use_pass = '".$pass."' LIMIT 1");
    if(mysql_num_rows($qr_personal->result) > 0)
         {
            $r = array();
            if($row = mysql_fetch_assoc($qr_personal->result))
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
}
else
{
    echo "Ứng viên này không tồn tại trên hệ thống!";
}
