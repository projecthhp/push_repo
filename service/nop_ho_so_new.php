<?
include("../home/config.php");
require_once("../functions/functions.php"); 
include("../email/config.php");

$idtin   = getValue("idtin","int","POST",0);
$idtin   = (int)$idtin;
$iduse   = getValue("iduse","int","POST",0);
$iduse   = (int)$iduse;
$iduser  = getValue("iduser","int","POST",0);
$iduser   = (int)$iduser;
$result = array('data' => null, 'code' => 0, 'kq' => false);
if($idtin > 0 && $iduse > 0)
{
   $db_qr = new db_query("SELECT new_title,usc_email,usc_company,usc_id FROM new JOIN user_company ON new.new_user_id = user_company.usc_id 
                          WHERE new_id = $idtin LIMIT 1");
      $row = mysql_fetch_assoc($db_qr->result);
   if ($iduser == 0){
      $iduser = $row['usc_id'];
   }
   $check = new db_query("SELECT * FROM nop_ho_so WHERE nhs_use_id = ".$iduse." AND nhs_com_id = ".$iduser." AND nhs_new_id = ".$idtin." ");
   if (mysql_num_rows($check->result) == 0) {
      $db_ex = new db_execute("INSERT INTO nop_ho_so(nhs_use_id,nhs_new_id,nhs_com_id,nhs_time) VALUES ('" . $iduse . "','" . $idtin . "','" . $iduser . "','" . time() . "')");

      $db_uvnhs = new db_execute("INSERT INTO uv_nophoso(`id_uv`,`id_com`,`id_new`,`time`) 
                              VALUES ('" . $iduse . "','" . $iduser . "','" . $idtin . "','" . time() . "')");

      $db_qrs = new db_query("SELECT use_mail,exp_years,use_name,address FROM user 
                              WHERE use_id = $iduse LIMIT 1");
      $rows = mysql_fetch_assoc($db_qrs->result);
      //echo "Nộp hồ sơ thành công";
      $check_noti = new db_query("SELECT UserID,AffectedID FROM notify WHERE UserID = '" . $iduser . "' AND AffectedID = '" . $iduse . "' AND UserType = 2  AND NotifyType = 1");
      if (mysql_num_rows($check_noti->result) == 0) {
         $description = "đã nộp hồ sơ cho vị trí " . $row['new_title'];
         //user type là type của user nhận thông báo
         //user type = 2 là ntd sẽ nhận dc thông báo
         //notify type là type của thông báo
         //vd: 1 là thông báo loại 1 (bao gồm đề lưu tin, nộp hồ sơ...), 2 là thông báo hệ thống
         $user_type = 2;
         $notify_type = 1;
         $CreateDate = date("Y-m-d H:i:s", time());
         $query_notify = "INSERT INTO notify(UserID,AffectedID,DescNotify,UserType,NotifyType,CreateDateNotify,url_notification)VALUES('" . $iduser . "','" . $iduse . "','" . $description . "','" . $user_type . "','" . $notify_type . "','" . $CreateDate . "','')";
         $db_ex_noti = new db_execute($query_notify);
      }
      if ($row['usc_email'] != '') {
         if ($rows['use_name'] != "") {
            $firstna = $rows['use_name'];
         } else {
            $firstna = 'Chưa cập nhật';
         }
         if ($rows['address'] != "") {
            $addna = $rows['address'];
         } else {
            $addna = 'Chưa cập nhật';
         }
         $link_uri = rewriteUV($iduse, $rows['use_name']);
         if ($rows['exp_years'] != '') $kinh_nghiem = $array_kinh_nghiem_uv[$rows['exp_years']];
         else $kinh_nghiem = "Xem trong CV";

         $mail = new PHPMailer();
         $mail->IsSMTP();
         //Tắt mở kiểm tra lỗi trả về, chấp nhận các giá trị 0 1 2
         // 0 = off không thông báo bất kì gì, tốt nhất nên dùng khi đã hoàn thành.
         // 1 = Thông báo lỗi ở client
         // 2 = Thông báo lỗi cả client và lỗi ở server
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
         $mail->AddReplyTo("admin@timviec365.com", "reply"); // Ấn định email sẽ nhận khi người dùng reply lại.
         $htmlbody = '<body style="width: 100%;text-align: center;background-color: #eeeeee;padding: 0;margin: 0;font-family: Arial,sans-serif;padding-top: 20px;padding-bottom: 20px;">
      <table style="width: 600px;background: #fff;margin: 0 auto;border-collapse: collapse;">
         <tr style="background: #3a4c56;border-bottom: 5px solid #2befca;height: 81px;">
            <td style="width: 218px;padding-left: 33px;text-align: left;">
            <a href="https://timviec365.vn" title="Tìm việc làm nhanh, việc làm thêm" style="text-decoration: none;">
               <img src="https://timviec365.com/images/logo.png" alt="Tìm việc làm nhanh, việc làm thêm" title="Tìm việc làm nhanh, việc làm thêm" />
            </a>
            <a style="text-decoration: none;color:#dfdfdf;color:#dfdfdf;font-size:14px;float:right;padding-top:25px;padding-right:34px;" href="https://timviec365.com" title="Tìm việc làm nhanh, việc làm thêm">Timviec365.com</a>
            </td>
         </tr>
         <tbody>
         <tr>
            <td style="width: 100%;padding: 0 33px;">
               <h1 style="color: #2befca;font-size: 25px;padding-top: 10px;margin: 15px 0 7px 0;text-transform: uppercase;">Timviec365.com</h1>
               <p style="margin: 0;font-size: 14px;color: #3a4c56;opacity: 0.99;">Cầu nối giữa ứng viên và các nhà tuyển dụng</a></p>
               <img style="margin-top: 4px;" src="https://timviec365.vn/images/hoavan.png" />
               <h2 style="font-size: 14px;color: #000000;font-weight: 400;line-height: 24px;padding-bottom: 8px;box-sizing: border-box;margin-top: 0;">
               Xin chào ' . $row['usc_company'] . '<br />
               Hệ thống ứng tuyển trực tuyến <a href="https://timviec365.com" style="text-decoration: none;" title="Timviec365.com"><b style="color: #269b91;">Timviec365.vn</b></a> nhận được hồ sơ ứng tuyển<br /> vào vị trí <span style="color: #269b91;">' . $row['new_title'] . '.</span> Thông tin chi tiết về ứng viên như sau:
               </h2>
               <h2 style="font-size: 14px;margin-top: 20px;color: #fff;font-weight: 400;line-height: 28px;padding-bottom: 8px;background: #269b91;height: 138px;padding-top: 28px;box-sizing: border-box;">
               Họ và tên: ' . $firstna . '<br />
               Địa chỉ: ' . $addna . '<br />
               Kinh nghiệm: ' . $kinh_nghiem . '<br />
               </h2>
               <p style="font-size: 14px;color: #000000;line-height: 24px;">Đây là file đính kèm Người tìm việc gửi đến Nhà tuyển dụng và không qua<br />
               sự kiểm duyệt của <span style="color: #269b91;">Timviec365.vn.</span> Quý công ty bấm xem hoặc <span style="color:#269b91">tải về.</span></p>
               <div style="height: 131px;background: #f2f3f4;">
               <img style="margin-top: 11px;" src="https://timviec365.vn/images/icon_x.png" />
               <p style="font-size: 14px;color: #000000;opacity: 0.99;margin: 0;margin-top: 8px;margin-bottom: 18px;"><span style="color: #fa3a47;">Vui lòng click</span> vào link để xem hồ sơ ứng viên:</p>
               <a href="https://timviec365.com' . $link_uri . '" style="cursor: pointer;width: 140px;height: 40px;line-height: 41px;margin: 0 auto;border-radius: 5px;background: #269b91;font-size: 14px;color: #ffffff;display: inline-block;text-decoration: none;">HỒ SƠ ỨNG VIÊN</a>
               </div>
               <p style="margin-bottom: 5px;color: #000;font-weight: bold;margin-top: 25px;color: #3a4c56;font-size: 14px;">Để được tư vấn và hỗ trợ tốt nhất, quý khách vui lòng liên hệ</p>
               <p style="margin: 0;font-size: 14px;color: #3a4c56;line-height: 25px;opacity: 0.99;"><span style="font-weight:bold;color:#3a4c56;font-style:italic">Thời gian hành chính:</span><br />
               (Từ 7h30’ đến 22h hàng ngày, kể cả chủ nhật, thứ 7, lễ tết, ...)<br />
               Hotline: <span style="color: #f05e5e;">1900 633 682</span> LiveChat: <a href="https://timviec365.vn" style="color: #269b91;text-decoration: none;"> https://timviec365.vn/</a><br />
               <span style="font-weight: bold;color: #3a4c56;font-style: italic;">Ngoài thời gian hành chính:</span><br />
               Số điện thoại: <span style="color: #f05e5e;">0972 319 116</span>  Email: <span style="color: #f05e5e;">Timviec365@gmail.com</span></p>
               <b style="font-size: 14px;color: #000000;margin-top: 15px;display: block;margin-bottom: 15px;"><span style="color: #269b91;">Timviec365.vn</span> chúc quý khách tuyển dụng nhân tài thành công!</b>
            </td>
         </tr>
         <tr>
         <td style="background: #d8dbdd url(https://timviec365.vn/images/bgimg_n.png)no-repeat;padding: 10px 0;font-size: 14px;color: #3a4c56;border-bottom: 36px solid #3a4c56;background-position: 0 30px;">
            <p style="margin-bottom: 10px;">Timviec365.com luôn đồng hành cùng bạn 24/24h. </p>
            <p style="margin-top: 0;margin-bottom: 10px;">Cam kết đem lại những hồ sơ chất lượng để quý công ty tuyển dụng </span></p>
            <p style="margin-top: 0;">trong thời gian nhanh nhất.</p>
         </td>
         </tr>
         </tbody>
      </table>
      </body>';
         // echo $row['usc_email'].$row['usc_company'].$row['new_title'];
         // die();
         $mail->AddAddress($row['usc_email'], name_company(mb_strtolower($row['usc_company'], 'UTF-8'))); //Email của người nhận
         $mail->Subject = $rows['use_name'] . " đã ứng tuyển vào vị trí " . $row['new_title']; //Tiêu đề của thư
         $mail->CharSet = "utf-8";
         $mail->Body    = $htmlbody;
         //Tiến hành gửi email và kiểm tra lỗi
         if (!$mail->Send()) {
            //echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
            $result = array('data' => null, 'code' => 2, 'kq' => false);
            echo json_encode($result);
         } else {
            //echo "Đã gửi thư thành công!"."<br/>";
            $result = array('data' => null, 'code' => 1, 'kq' => true);
            echo json_encode($result);
         }
      } else {
         //ntd lay ve, ko co email
         $result = array('data' => null, 'code' => 2, 'kq' => true);
         echo json_encode($result);
      }
   } else {
       //da nop ho so roi;
       $result = array('data' => null, 'code' => 3, 'kq' => true);
       echo json_encode($result);
   }
}else{
   echo json_encode($result);
}
?>
