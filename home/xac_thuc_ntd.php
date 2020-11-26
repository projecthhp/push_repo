<?
include("config.php");
if (isset($_COOKIE['UT']) && isset($_COOKIE['UID']) && isset($_COOKIE['PHPSESPASS'])) {
    $userid = $_COOKIE['UID'];
    $userpass = $_COOKIE['PHPSESPASS'];
    if ($_COOKIE['UT'] == 1) {
        $db_qrlogin = new db_query("SELECT * FROM user_company WHERE usc_authentic = 0 AND usc_id = '" . $userid . "'  LIMIT 1");
        $rowlogin = mysql_fetch_assoc($db_qrlogin->result);
        if(empty($rowlogin)){
            redirect("/");
        }
    } else {
        redirect("/");
    }
} else {
    redirect("/dang-nhap-nha-tuyen-dung.html");
}
$xt = 1;
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
      <link rel="canonical" href="https://timviec365.com/thong-tin-can-biet.html" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="robots" content="noodp,noindex,nofollow"/>
      <title>Xác thực tài khoản nhà tuyển dụng</title>

      <link rel="stylesheet" href="/css/font-awesome.min.css" media='all' onload="if(media!='all')media='all'">
      <link rel="stylesheet" href="/css/select2.min.css" media="all" onload="if(media!='all')media='all'">
      <link rel="stylesheet" href="/css/style.min.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">

      <meta name="google-site-verification" content="EIV7wHDvaTZkVpsLjmM4_neYDyPLTmjV9du0A8ho4TU" />
      <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->
   </head>
   <body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
      <div class="register main register_2">
  <div class="back">
  <!-- <a href="/dang-ky-ung-vien.html"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a> -->
  </div>
  <div class="main">
    <div class="left">
      <div class="main_item">
        <div class="item"></div>
        <div class="item"></div>
        <div class="item"></div>
      </div>
      <p class="text-center hotro">Hỗ trợ đăng ký</p>
      <p class="text-center holine">Hotline dành cho nhà tuyển dụng và ứng viên</p>
      <p class="text-center sdt_hotline"><span>0971.335.869</span>  hoặc  <span>024 36.36.66.99</span></p>
      <p class="text-center email"><b>Email:</b> timviec365com@gmail.com</p>
      <p class="text-center address"><b>Địa chỉ:</b> Số 206 Định Công Hạ , Phường Định Công, Quận Hoàng Mai, Hà Nội</p>
      <div class="left-bottom">
        <div class="item">
          <img src="/images/load.gif" class="lazyload" data-src="/images/qr_app_job.png" alt="Qr app timviec">
          <a class="downLoad_App Timviec365" rel ="nofollow" href="/ung-dung-tim-viec-lam.html"><i class="icon"></i>Tải app Timviec365</a>
        </div>
        <div class="item">
          <img src="/images/load.gif" class="lazyload" data-src="/images/qr_app_job.png" alt="Qr app CV">
          <a class="downLoad_App CV365" rel ="nofollow" href="/ung-dung-tao-cv.html"><i class="icon"></i>Tải app CV365</a>
        </div>
      </div>
      </div>
      
    <div class="right">
      <div class="main main_xt text-center">
        <img src="/images/load.gif" class="lazyload" data-src="/images/img_xacthuc.png" alt="Images xac thuc">
        <p id="td" class="text-center">xác thực tài khoản</p>
        <form method="POST">
           <p>Chúc mừng bạn đã đăng ký tài khoản thành công. Vui lòng kiểm tra hòm thư email cá nhân để xác thực tài khoản!</p>
           <p><span>Nếu bạn chưa nhận được Email xác thực, hãy bấm nút gửi lại Email dưới đây:</span></p>
           <input type="button" id="xacthuc" data-id="<?= $_COOKIE['UID']?>" data-email="<?= $rowlogin['usc_email'] ?>" data-name="<?= $rowlogin['usc_company'] ?>" name="Submit" value="Gửi lại Mail">
       </form>
     </div>
   </div>
  </div>
</div>
      <? include('../includes/inc_script_footer.php'); ?>
      <script src="/js/validate_uv.js"></script>
   </body>
   </html>
   <script>
   $(document).ready(function(){
      $('#xacthuc').click(function () {
          $.ajax({
              type: "POST",
              url: "../codelogin/email_redo.php",
              data: {
                  email: $(this).attr('data-email'),
                  name: $(this).attr('data-name'),
                  id: $(this).attr('data-id')
              },
              success: function (data)
              {
                if(data == 1){
                    window.location.reload();
                }
              }
          });
      });
      height = $(window).height();
      $('.register').css('height',height);
    });
</script>