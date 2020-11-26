<?include('config.php')?>
<!DOCTYPE html>
<html>
<head>
   <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
   <title>Đăng ký tài khoản tại website Timviec365.com</title>
   <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui">
   <meta name="robots" content="noodp,noindex,nofollow"/>
   
   <link rel="stylesheet" href="/css/font-awesome.min.css" media='all' onload="if(media!='all')media='all'">
   <link rel="stylesheet" href="/css/style.min.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
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
<section class="login_general main">
   <div class="back"><a href="/"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></div>
   <div class="right_top">
      <div class="item company">
         <i class="icon"></i>
         <a href="/dang-ky-nha-tuyen-dung.html">ĐĂNG KÝ NHÀ TUYỂN DỤNG</a>
      </div>
      <div class="item candidate">
         <i class="icon"></i>
         <a href="/dang-ky-ung-vien.html">ĐĂNG KÝ ỨNG VIÊN</a>
      </div>
      <p class="text-center">Bạn đã có tài khoản?<a href="/dang-nhap-chung.html">Đăng nhập</a></p>
   </div>
   <div class="left_top">
      <img src="/images/load.gif" class="lazyload" data-src="/images/img_sign_general.png" alt="Banner General">
   </div>
   <div class="left-bottom">
      <div class="item">
         <img src="/images/load.gif" class="lazyload" data-src="/images/qr_app_job.png" alt="Qr app CV">
         <a class="downLoad_App CV365" href="/ung-dung-tao-cv.html"><i class="icon"></i>Tải app CV365</a>
      </div>
      <div class="item">
         <img src="/images/load.gif" class="lazyload" data-src="/images/qr_app_job.png" alt="Qr app timviec">
         <a class="downLoad_App Timviec365" href="/ung-dung-tim-viec-lam.html"><i class="icon"></i>Tải app Timviec365</a>
      </div>
   </div>
</section>
<? include('../includes/inc_script_footer.php') ?>
<script>
   $(document).ready(function(){
      width = $(window).width();
      if(width > 1024){
         height = $(window).height();
         $('.login_general').css('height',height);
      }
   });
</script>
   </body>
</html>