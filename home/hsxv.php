<?
include("config.php"); 
// hsxv

$db_seo = new db_query("SELECT * FROM seo_tt WHERE name_page = 'hsxv'");
$rowseo = mysql_fetch_assoc($db_seo->result);
$index = "noindex, nofollow";
$title = ($rowseo['seo_tt']!='')?$rowseo['seo_tt']:"Hồ sơ xin việc - Mẫu hồ sơ xin việc đầy đủ 2020 | Timviec365.com";
$desc = ($rowseo['seo_des']!='')?$rowseo['seo_des']:"Hồ sơ xin việc gồm những gì? Bộ hồ sơ xin việc đầy đủ mua ở đâu? Cách làm ra sao? Cùng timviec365.com tìm hiểu ngay bộ hồ sơ hoàn chỉnh 2020. Truy cập ngay";
$nd = ($rowseo['seo_text']!="")?$rowseo['seo_text']:"";
$key = "";
$ogImage = "";
$canonical = $domain."/ho-so-xin-viec.html";
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?=$title?></title>    
  <link rel="canonical" href="<?=$canonical?>" />
  <link href="" rel="shortcut icon"/>
  <meta name="keywords" content="<?=$key?>" />
  <meta name="description" content="<?=$desc?>" />
  <meta name="robots" content="<?=$index?>" />
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:image" content="<?=$ogImage?>" />
  <meta name="twitter:site" content="@timviec365com">
  <meta name="twitter:title" content="<?=$title?>" />
  <meta name="twitter:description" content="<?=$desc?>" />

  <meta property="og:image:url" content="<?=$ogImage?>" />
  <meta property="og:image:width" content="333" />
  <meta property="og:image:height" content="426" />
  <meta property="og:site_name" content="Timviec365.com" />
  
  <meta property="og:title" content="<?=$title?>" />
  <meta property="og:description" content="<?=$title?>" />
  <meta property="og:url" content="<?=$canonical?>" />
  <meta property="og:locale" content="vi_VN" />
  <meta property="og:type" content="website" />
  <link rel="stylesheet" href="/css/font-awesome.min.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
  <link rel="stylesheet" href="/css/select2.min.css" media="all" onload="if(media!='all')media='all'">
  <link rel="stylesheet" href="/css/slick-theme.css" media='all' onload="if(media!='all')media='all'">
  <link rel="stylesheet" href="/css/slick.css" media='all' onload="if(media!='all')media='all'">
  <link rel="stylesheet" href="/css/style.min.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
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
</head>
<style>
@font-face{font-family:OpenSans-Semibold;display:swap;src:url(../fonts/OpenSans-Semibold.ttf)}.home_hsxv.mau_cv #banner{background:url(../images/banner_hsxv.png) no-repeat}.hsxv_main{padding:60px 125px 71px}.hsxv_main .div_left{float:left;width:calc(100% - 485px);padding-right:68px}.hsxv_main .div_left_title:after{content:"";display:inline-block;width:61px;height:4px;background:#f89820}.hsxv_main .h2{font-size:22px;line-height:35px;font-family:OpenSans-Bold;letter-spacing:.03em;color:#2767a5}.hsxv_main .div_left ul{margin-top:21px}.hsxv_main .div_left ul h3 span{font-size:16px;line-height:32px;color:#333;font-family:OpenSans}.hsxv_main .div_left ul h3 .span{font-size:30px;line-height:32px;font-family:OpenSans-Bold;color:#f1f1f1;vertical-align:sub;margin-right:13px}.div_center ul{display:inline-flex;margin-top:71px}.div_center ul li{text-align:center}.div_center li a{display:inline-block;background:#fff;border:1px solid #f89820;box-sizing:border-box;border-radius:3px;padding:0 31px;margin-top:20px;font-size:16px;line-height:35px;font-family:OpenSans-Semibold}.div_center li a:hover{background:#f89820;color:#fff}.txt_tt{margin:90px 0 60px;font-size:24px;line-height:24px;text-align:center;letter-spacing:.03em;text-transform:uppercase;color:#2767a5;font-family:OpenSans-Bold}#bn_bot_hsxv{padding:0 125px;margin-bottom:30px}@media only screen and (max-width:1024px){.home_hsxv.mau_cv #banner{background:url(../images/bgtop_tab_hsxv.png) no-repeat}.hsxv_main{padding:26px 24px;position:relative}.hsxv_main .div_left{width:100%}.imgRight{width:392px;height:270px;position:absolute;right:0;top:93px}.hsxv_main .h2{font-size:18px;line-height:30px}.hsxv_main .div_left ul h3{font-size:14px}.div_center ul li img{width:150px;height:192px}.div_center li a{font-size:14px;line-height:24px;padding:0 13px}.txt_tt{margin:53px 0 33px;font-family:OpenSans-Semibold;font-size:18px}#bn_bot_hsxv{padding:0;margin-bottom:5px}}@media only screen and (max-width:480px){.home_hsxv.mau_cv #banner{background:url(../images/bgtop_mb_hsxv.png) no-repeat;background-position-y:80%}.hsxv_main{padding:0 13px}.imgRight{width:365px;height:244px;position:unset;margin-bottom:24px;margin-top:20px}.hsxv_main .div_left{padding-right:0}.hsxv_main .h2{font-size:17px;line-height:28px}.hsxv_main .div_left ul h3{font-size:14px;line-height:18px}.hsxv_main .div_left ul h3 .span{width:auto;vertical-align:top}.hsxv_main .div_left ul h3 span{width:90%;display:inline-block;font-size:14px;line-height:25px}.div_center ul{display:inline-block;margin-top:28px}.div_center ul li img{width:240px;height:306px}.div_center li a{margin-bottom:34px}}
</style>
<body class="template_cv mau_cv home_hsxv">
  <header>
    <? include("../includes/inc_header_cv.php");?>
    <div id="banner">
        <span id="first">Top Mẫu CV Xin Việc 365 Online</span>
        <span>Tải ngay ứng dụng timviec365 và cv365+ trên điện thoại để trải nghiệm tốt nhất</span>
        <div class="download_appCV">
          <img src="/images/qr_app_cv.png" alt="QR tải app">
          <a target="_blank" class="link_android" rel="nofollow" href="https://play.google.com/store/apps/details?id=vn.hungviet.cv365com"><i class="fa fa-android" aria-hidden="true"></i>Tải cho Android</a>
          <a target="_blank" class="link_ios" rel="nofollow" href="https://apps.apple.com/us/app/timviec365-com-cv-xin-vi%E1%BB%87c/id1513694297?l=vi#?platform=iphone"><i class="fa fa-apple" aria-hidden="true"></i>Tải cho IOS</a>
        </div>
    </div>
  </header>
  <div class="breakcrumb">
    <ul>
      <li><a href="/">Trang chủ</a></li>
      <li class="active"><a><h1>Hồ sơ xin việc</h1></a></li>
    </ul>
  </div>
    <div class="hsxv_main main">
    <img class="imgRight lazyload" src="/images/load.gif" data-src="/images/right_hsxv.png" alt="Bộ hồ sơ xin việc">
    <div class="div_left">
        <div class="div_left_title">
        <h2 class="h2 main">Bộ hồ sơ xin việc đầy đủ gồm những gì?</h2>
        </div>
        <ul>
            <li><h3><span class="span">1</span><span>Sơ yếu lý lịch tự thuật có dấu xác nhận của địa phương</span></h3></li>
            <li><h3><span class="span">2</span><span>Đơn xin việc</span></h3></li>
            <li><h3><span class="span">3</span><span>CV xin việc</span></h3></li>
            <li><h3><span class="span">4</span><span>Giấy khám sức khỏe</span></h3></li>
            <li><h3><span class="span">5</span><span>Bằng cấp, chứng chỉ</span></h3></li>
            <li><h3><span class="span">6</span><span>Bản photo chứng minh thư có công chứng</span></h3></li>
            <li><h3><span class="span">7</span><span>Ảnh 3×4 hoặc 4×6 (nếu nhà tuyển dụng yêu cầu)</span></h3></li>
        </ul>
    </div>
    <div class="div_center">
      <ul>
        <li>
          <img src="/images/load.gif" class="lazyload" data-src="/images/cv_hsxv.png" alt="CV - hồ sơ xin việc">
          <a href="/mau-cv.html">Mẫu CV xin việc</a>
        </li>
        <li>
          <img src="/images/load.gif" class="lazyload" data-src="/images/appli_hsxv.png" alt="Thư - hồ sơ xin việc">
          <a rel="nofollow" href="/mau-thu-xin-viec.html">Mẫu thư xin việc</a></li>
        <li>
          <img src="/images/load.gif" class="lazyload" data-src="/images/letter_hsxv.png" alt="Đơn - hồ sơ xin việc">
          <a href="/don-xin-viec.html">Mẫu đơn xin việc</a></li>
        <li>
          <img src="/images/load.gif" class="lazyload" data-src="/images/syll_hsxv.png" alt="Sơ yếu lý lịch - hồ sơ xin việc">
          <a>Mẫu sơ yếu lý lịch</a>
        </li>
      </ul>
    </div>
    <div class="div_center main text-center">
      <p class="main txt_tt">CV theo ngành nghề</p>
      <div class="list_cate_CV main">
        <?
        foreach ($db_catCV as $key => $value) {
        ?>
        <a class="item" href="<?=rewriteNNCV($value['alias'])?>">Cv <?=str_replace("CV","",$value['name'])?></a>
        <?
        }
        ?>
      </div>
    </div>
  </div>
  <div class="main text-center">
  <img id="bn_bot_hsxv" src="/images/load.gif" class="lazyload" data-src="/images/bn_bot_hsxv.png" alt="Hồ sơ xin việc 2020">
  </div>
  <?
    if($nd!=''){
  ?>
  <div class="box_text_seo">
    <div class="menu">
      <div class="main_menu main">
      <? makeML($nd,'',''); ?>
      </div>
      <a rel="nofollow" class="banner_timviec365" target="_blank" href="https://timviec365.vn/cv-xin-viec"><img style="margin:20px 0;height:auto" src="/images/load.gif" class="lazyload" data-src="/images/bannerBlog2.gif" alt="Tạo CV Online"></a>
    </div>
    
    <div class="content">
       <div class="nd"><?= makeML_content(str_replace('src=', 'class="lazyload" src="/images/load.gif" data-src=', $nd),'','') ?></div>
       <div class="read">
        Xem thêm <i class="fa fa-angle-double-down" aria-hidden="true"></i>
       </div>
    </div>
  </div>
  <?
    }
  ?>
  <?
  include('../includes/inc_footer.php');
  include('../includes/inc_script_footer.php');
  ?>
  <script src="../js/jscv/custom_cv.js?v=<?=$version?>" defer></script>
    <script>
      $(document).ready(function(){
        if($(window).width() <= 480){
          $('#bn_bot_hsxv').attr('data-src','/images/bn_mb_hsxv.png');
        }
      });
    </script>
</body>
</html>