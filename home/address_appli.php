<?
include("config.php"); 
$cano = $_SERVER['REQUEST_URI'];
$new_id = getValue('newid','int','GET','');
$is_cv = '';

$fail = 0;
if(isset($_POST['Submit']))
{
 $username         = getValue("email","str","POST","");
 $username         = replaceMQ($username);
 $password         = getValue("password_first","str","POST","");
 $password         = replaceMQ($password);
 $password         = md5($password);
 if($username != '' && $password != '')
 {
  $db_qr    = new db_query("SELECT use_id FROM user WHERE use_mail = '".$username."' AND use_pass  = '".$password."'");
  if(mysql_num_rows($db_qr->result) > 0)
  {
   $row = mysql_fetch_assoc($db_qr->result);
         /////////////////
   setcookie('UT', 0 ,time() + 7*6000,'/');
   setcookie('UID', $row['use_id'] ,time() + 7*6000,'/');
   setcookie('PHPSESPASS', $password ,time() + 7*6000,'/');
   header('Location: /home/cv_quan_li.php');
   $fail = 0;
 }  
}
else
{
  $fail = 0;
}
}

$listseo = new db_query("SELECT * FROM new_address_appli WHERE new_id = '".$new_id."' ");
$rowseo = mysql_fetch_assoc($listseo->result);
if($rowseo['meta_h1']!=''){
  $seo_h1 = $rowseo['meta_h1'];
}else{
  $seo_h1 = 'Đơn xin việc theo ngành nghề';
}

if($rowseo['meta_tit']!=''){
  $seo_tt = $rowseo['meta_tit'];
}else{
  $seo_tt = '';
}

if($rowseo['meta_des']!=''){
  $seo_des = $rowseo['meta_des'];
}else{
  $seo_des = 'Đơn xin việc theo ngành nghề';
}

if($rowseo['meta_key']!=''){
  $seo_key = $rowseo['meta_key'];
}else{
  $seo_key = '';
}
if($rowseo['meta_sapo']!=''){
  $seo_sapo = $rowseo['meta_sapo'];
}else{
  $seo_sapo = '';
}
$index = ($rowseo['add_index'])?"index,follow":"noindex,nofollow";
$ogImage = GetImageOG($rowseo['content']);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!-- SEO -->
  <title><?=$seo_tt?></title>    
  <link rel="canonical" href="https://timviec365.com<?=$cano?>" />
  <link href="" rel="shortcut icon"/>
  <meta name="keywords" content="<?=$seo_key?>" />
  <meta name="description" content="<?=$seo_des?>" />
  <meta name="robots" content="<?=$index?>" />
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:image" content="<?=$ogImage?>" />
  <meta name="twitter:site" content="@timviec365com">
  <meta name="twitter:title" content="<?=$seo_tt?>" />
  <meta name="twitter:description" content="<?=$seo_des?>" />

  <meta property="og:image:url" content="<?=$ogImage?>" />
  <meta property="og:image:width" content="333" />
  <meta property="og:image:height" content="426" />
  <meta property="og:site_name" content="Timviec365.com" />
  
  <meta property="og:title" content="<?=$seo_tt?>" />
  <meta property="og:description" content="<?=$seo_des?>" />
  <meta property="og:url" content="https://timviec365.com<?=$cano?>" />
  <meta property="og:locale" content="vi_VN" />
  <meta property="og:type" content="website" />

  <!-- SEO -->


  <link rel='stylesheet' id='bootstrap.min-css'  href='/css/bootstrap.min.css' media='all'  />
  <link rel='stylesheet' id='owl.themecss-css'  href='/css/select2.css' media='all' onload="if(media!='all')media='all'" />
  <link rel="stylesheet" href="/css/slick.css" media='all' onload="if(media!='all')media='all'">
  <link rel="stylesheet" href="/css/slick-theme.css" media='all' onload="if(media!='all')media='all'">
  <link rel="stylesheet" href="/css/css_cv.css?v=<?$version?>"  media='all' onload="if(media!='all')media='all'">
  <link rel="stylesheet" href="/css/style.css?v=<?$version?>" media='all' onload="if(media!='all')media='all'">
  <link rel="stylesheet" href="/css/notification.css"  media='all' onload="if(media!='all')media='all'">
  <link rel="stylesheet" href="/css/font-awesome.min.css?v=<?= $version ?>">
  <link rel="stylesheet" href="/css/support-ticket.css"  media='all' onload="if(media!='all')media='all'">
  <link rel="stylesheet" href="/css/choose-template.css"  media='all' onload="if(media!='all')media='all'">
  <link rel="stylesheet" href="/css/reponsive.css?v=<?$version?>" media='all' onload="if(media!='all')media='all'">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->

  <style>

    .pagination {
      text-align: center;
      width: 100%;
      clear: both;
    }
    .pagination span {
      background: #17aaf3;
      padding: 5px 12px;
      color: #fff;
      font-size: 18px;
      border-radius: 6px;
    }
    .pagination a {
      background: #00d6c4;
      padding: 5px 12px;
      color: #fff;
      font-size: 18px;
      border-radius: 6px;
    }
/*    .cv_quanly .cv_ngonngu .slick-initialized .slick-slide{
      width: 1140px !important;
    }*/
    .slick-slider .slick-track{
      width: 9065px  !important;
    }

  </style>
</head>
<body class="cv_quanly">
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <header class="cv_container">
    <div class="container">
      <div class="row nosearch">
        <? 
        include("../includes/inc_header_cv.php");
        include("../includes/inc_endheader.php");
        ?>
       <!--  <div class="text">
          <p><span><i class="fa fa-check-square-o" aria-hidden="true"></i></span>tạo cv <span>nhanh chóng</span></p>
          <p><span><i class="fa fa-check-square-o" aria-hidden="true"></i></span>Tải cv <span>dễ dàng</span></p>
        </div> -->
        <!-- <div class="text">
          <p>Các mẫu CV đuợc thiết kế theo chuẩn, theo các ngành nghề. <br>Phù hợp với sinh viên và người đi làm.</p>
        </div> -->
      </div>
    </div>
  </header>
  <div id="main">
    <div class="heading">
      <div class="container">
        <h1 class="suggest-title text-center"><?=$seo_h1?></h1>
        <p style="text-align: center;"><?=$seo_sapo?></p>
      </div>
    </div>

    <div>
<div class="clr"></div>
<div class="container">

  <div class="baiviet_cv">
   <div class="muc_luc_cv">
    <?
    makeML($rowseo['content'],'','');
    ?>
  </div>
  <div id="mota"><br>
   <div><?= makeML_content(str_replace('src=', 'class="lazyload" src="/images/load.gif" data-src=', $rowseo['content']),'','') ?></div>
 </div>
</div>
</div>
<?
include('../includes/inc_footer.php');
include('../includes/inc_script_footer.php');
?>
<script src="/js/jscv/cropper.js"></script>
<script type="text/javascript">
 $('.nav-item').click(function(){
  $('.nav-item').removeClass('active');
  $(this).addClass('active');
});

</script>

</body>
</html>