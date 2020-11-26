<?
include("../home/config.php");
require_once("../functions/functions.php"); 
include("../email/config.php");
function rand_string( $length ) {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$size = strlen( $chars );
$str = '';
for( $i = 0; $i < $length; $i++ ) {
$str .= $chars[ rand( 0, $size - 1 ) ];
 }
return $str;
}
$email = getValue("email","str","POST","");
$email = replaceMQ($email);
$ntd = getValue("ntd","str","POST",0);
$ntd = replaceMQ($ntd);
$uv = getValue("uv","str","POST",0);
$uv = replaceMQ($uv);
$user = '';
$id   = '';
$user_email = '';
$type = '';
$or   = '';
$time = '';
if($ntd == 1){
   $user = 'user_company';
   $id  = 'usc_id';
   $user_email = 'usc_email';
   $type = 'usc_type';
   $name = 'usc_company';
   $pass = 'usc_pass';
   $or   = 'ntd=';
   $time = 'usc_create_time';
   $url = 'doi-mat-khau-nha-tuyen-dung.html';
}else if($uv == 1){
   $user = 'user';
   $id  = 'use_id';
   $user_email = 'use_mail';
   $type = 'use_type';
   $name = 'use_name';
   $or   = 'uv=';
   $pass = 'use_pass';
   $time = 'use_create_time';
   $url = 'doi-mat-khau.html';
}
$result = array('data' => null, 'code' => 0, 'kq' => false);
if($email != '')
{
   $db_qr = new db_query("SELECT ".$id.",".$name.",".$time.",".$pass." FROM ".$user." WHERE ".$user_email." = '".$email."'");
//   $db_qr = new db_query("SELECT ".$id.",".$time.",".$pass." FROM ".$user." WHERE ".$user_email." = '".$email."' AND ".$type." = 0");
   $cout_id  = mysql_num_rows($db_qr->result);
   if($cout_id == 0)
   {
      $result = array('data' => null, 'code' => 3, 'kq' => false);
      echo json_encode($result);
   }
   else
   {
//      echo 1;
      $data = mysql_fetch_assoc($db_qr->result);
      $id = $data[$id];
      $user_name = $data[$name];
      $time    = $data[$time];
      $token = $data[$pass];
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->SMTPDebug  = 0;
      $mail->Debugoutput = "html";
      $mail->Host       = "mail.24hpay.net";
      $mail->Port       = 587;
      $mail->SMTPAuth   = true;   
      $mail->SMTPSecure = 'tls'; 
      $mail->IsHTML(true);
      $mail->Username   = 'timviec365-noreply@timviec365.vn'; // Tên đăng nhập tài khoản Gmail
      $mail->Password   = 'Bbz123'; //Mật khẩu của gmail
      $mail->SetFrom("admin@timviec365.com", "Timviec365.com"); // Thông tin người gửi
      $mail->AddReplyTo("admin@timviec365.com","reply");// Ấn định email sẽ nhận khi người dùng reply lại.
      $htmlbody = '<body style="width: 100%;text-align: center;background-color: #eeeeee;padding: 0;margin: 0;font-family: Arial,sans-serif;padding-top: 20px;padding-bottom: 20px;">
      <table style="width: 600px;background: #fff;margin: 0 auto;border-collapse: collapse;">
         <tr style="background: #fff;border-bottom: 5px solid #18744d;height: 81px;">
            <td style="width: 218px;padding-left: 33px;text-align: left;">
            <a href="https://timviec365.com" title="Tìm việc làm nhanh nhất, việc làm thêm" style="text-decoration: none;">
               <img src="https://timviec365.com/images/logo.png" alt="Tìm việc làm nhanh nhất, việc làm thêm" title="Tìm việc làm nhanh, việc làm thêm" />
            </a>
            <a style="text-decoration: none;color:#f47c48;font-size:14px;float:right;padding-top:36px;padding-right:45px;" href="https://timviec365.com" title="Tìm việc làm nhanh, việc làm thêm">Timviec365.com</a>
            </td>
         </tr>
         <tbody >
         <tr>
            <td style="width: 100%;padding: 0 33px;">
               <h1 style="color: #3a4c56;font-size: 16px;padding-top: 10px;text-align: left;margin: 15px 0 7px 0;">Xin chào '.$user_name.'.</h1>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;">Bạn đã yêu cầu khôi phục mật khẩu tại <a style="color: #269b91;font-size: 14px;font-weight: 600;" href="https://timviec365.com" title="Tìm việc 365" >timviec365.com</a></p>
               <p style="margin: 0;margin-top:10px;font-size: 14px;text-align: left;color: #3a4c56;">Để hoàn tất việc lấy lại mật khẩu, vui lòng nhấn vào đường dẫn dưới đây hoặc chép và dán vào trình duyệt</p>
               <h2 style="font-size: 14px;margin-top: 20px;font-weight: 400;line-height: 24px;padding-bottom: 8px;height: 60px;box-sizing: border-box;">
               <p style="height:50px;padding:0;margin: 0;background: #269b91;color: #fff;line-height: 52px;font-size: 14px;font-weight: 500;margin: 30px auto; width:170px;text-align: center;"><a style="color:#fff;text-align:center;font-size: 14px;font-weight: 600" target="_blank" href="https://timviec365.com/'.$url.'?reset_token='.$token.'&id='.$id.'"">ĐỔI MẬT KHẨU</a></p></h2>
               <p style="margin-bottom: 5px;color: #000;font-weight: bold;color: #3a4c56;font-size: 14px;">Để được tư vấn và hỗ trợ tốt nhất, quý khách vui lòng liên hệ:</p>
               <p style="margin: 0;font-size: 14px;color: #3a4c56;line-height: 25px;opacity: 0.99;">
               Hotline: <span style="color: #f05e5e;">0165 3600 146</span> LiveChat: <a href="https://timviec365.com" style="color: #269b91;text-decoration: none;"> https://timviec365.com/</a><br>
               Email: <span style="color: #f05e5e;">timviec365com@gmail.com</span></p>
            </td>
         </tr>
         <tr>
         <td style="margin-top: 30px;display: block;background-color: #d8dbdd;padding: 10px 0;font-size: 14px;color: #3a4c56;border-bottom: 36px solid #18744d;">
            <p style="font-weight: bold;margin-bottom: 10px;">Trân trọng! Chúc anh/chị một ngày làm việc hiệu quả!</p>
            <p style="margin-top: 0;margin-bottom: 10px;">Timviec365 luôn đồng hành cùng bạn 24/24h. Cam kết đem lại những hồ sơ chất</span></p>
            <p style="margin-top: 0;">lượng để quý công ty tuyển dụng trong thời gian nhanh nhất.</p>
         </td>
         </tr>
         </tbody>
      </table>
      </body>';
      $mail->AddAddress($email, 'Timviec365.com');//Email của người nhận
      $mail->Subject = "Timviec365 - Yêu cầu khôi phục mật khẩu!"; //Tiêu đề của thư
      $mail->CharSet = "utf-8";
      $mail->Body     = $htmlbody;   
      if(!$mail->Send()) {
         $result = array('data' => null, 'code' => 2, 'kq' => false);
         echo json_encode($result);
        //echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
      } else {
         $result = array('data' => null, 'code' => 1, 'kq' => true);
         echo json_encode($result);
      }
      /** Kết thúc gửi email **/
//      unset($username,$password,$company_name,$company_address,$phone,$timeaway,$query,$db_ex,$last_id,$db_exciu);
   }
}
else
{
   echo json_encode($result);
}
?>