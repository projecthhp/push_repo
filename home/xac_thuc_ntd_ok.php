<?
include("config.php");

$id        = getValue("id","str","GET","0");
$id         = replaceMQ($id);

$code         = getValue("code","str","GET","");
$code         = replaceMQ($code);

if ($id !=0 && $code != "") {

  $db_qr = new db_query("SELECT usc_email,usc_name,usc_city,usc_company FROM user_company  WHERE usc_id = ".$id." AND usc_authentic = 0 ");
      $row_uv_a   = mysql_fetch_assoc($db_qr->result);
    if(empty($row_uv_a)){
        redirect("/");
    }
    if(count($row_uv_a) > 0){
       $email = $row_uv_a['usc_email'];
       if($code == md5($email)){
           $updata = new db_execute("UPDATE user_company SET usc_authentic = 1 WHERE usc_id = ".$id);
       }else{
           redirect("/nha-tuyen-dung/thong-tin-chung.html");
       }
    }else{
        redirect("/nha-tuyen-dung/thong-tin-chung.html");
    }
}else{
    redirect("/");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
  <title>Thông tin ứng viên</title>
  <meta name="descripton" content="Đăng ký ứng viên. Tìm việc làm nhanh chóng, hiệu quả nhất,  đăng tin tìm việc làm tốt 24h, tuyển dụng việc làm tất cả ngành nghề nhanh nhất, tìm kiếm việc làm tại Timviec365.vn"/>
  <meta name="Keywords" content="tim viec lam, viec lam nhanh, tìm việc làm nhanh, tuyển dụng việc làm, tuyen dung, kiem viec lam, tim viec lam, tim viec">
  <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui">
  <meta name="robots" content="noodp,noindex,nofollow"/>
  <link rel="stylesheet" href="/css/font-awesome.min.css" media="all">
	<link rel="stylesheet" href="/css/style.min.css?v=<?=$version?>" media="all">
	<link rel="stylesheet" href="/css/style_company_manager.css?v=<?=$version?>" media='all' onload="if(media!='all')media='all'">
  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
</head class="manager">
<body>
<? include('../includes/inc_left_ntdmanager.php') ?>
<div class="right_manager">
<? include('../includes/inc_header_ntd_manager.php'); ?>
<div class="main confirm_register text-center">
  <img src="/images/load.gif" class="lazyload" data-src="/images/qc_5.png" alt="Confirm">
  <div class="blue weight-500 Roboto-Medium first">Xác thực email thành công</div>
  
        <p>Xin chào <b class="orange"><?=$row_uv_a['usc_company']?></b></p>
        <p>Tài khoản đăng nhập của bạn đã được xác thực email thành công trên Timviec365.com.</p>
        <p>Timviec365.com cung cấp hàng triệu ứng viên tại Việt Nam và hoàn toàn <b class="blue">MIỄN PHÍ.</b></p>
        <p>Chúc bạn sớm tìm được ứng viên mong muốn !!!</p>
        <ul>
          <li><a id="qltt" href="/thong-tin-tai-khoan-nha-tuyen-dung.html">Quản lý thông tin</a></li>
          <li><a id="dttd" href="/nha-tuyen-dung/dang-tin.html">Đăng tin tuyển dụng</a></li>
          <li><a id="tuv" href="/ung-vien-tim-viec.html">Tìm ứng viên</a></li>
        </ul>
</div>
</div>

<? if($detect->isMobile() || $detect->isTablet()) include('../includes/inc_chuyenvienmb.php');
    include('../includes/inc_footer.php');
    include('../includes/inc_script_footer.php');
    ?>
<script src="/js/update_uv.js?v=<?=$version?>"></script>
</body>