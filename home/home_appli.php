<?
include("config.php"); 
$cano = "/don-xin-viec.html";
$is_cv = '';
if ( $cano != $_SERVER['REQUEST_URI']) {
  header("HTTP/1.1 301 Moved Permanently"); 
  header("Location: ".$cano);
  exit();
}
//phân trang
$page  = getValue('page','int','GET',1,2);
$page  = intval(@$page);
if($page == 0)
{
  $page = 1;
}
$curentPage = 18;
$pageab = abs($page - 1);
$start = $pageab * $curentPage;
$start = intval(@$start);
$start = abs($start);

$url = "don-xin-viec";

$listseo = new db_query("SELECT * FROM seo_tt WHERE name_page = '".$url."' ");
$rowseo = mysql_fetch_assoc($listseo->result);
if($rowseo['seo_h1']!=''){
  $seo_h1 = $rowseo['seo_h1'];
}else{
  $seo_h1 = 'Đơn xin việc';
}

if($rowseo['seo_tt']!=''){
  $seo_tt = $rowseo['seo_tt'];
}else{
  $seo_tt = '';
}

if($rowseo['seo_tt']!=''){
  $seo_tt = $rowseo['seo_tt'];
}else{
  $seo_tt = 'Đơn xin việc';
}

if($rowseo['seo_key']!=''){
  $seo_key = $rowseo['seo_key'];
}else{
  $seo_key = '';
}

if($rowseo['seo_des']!=''){
  $seo_des = $rowseo['seo_des'];
}else{
  $seo_des = '';
}
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
  <meta name="robots" content="noindex,nofollow" />
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:image" content="https://timviec365.com/images/no-image.png" />
  <meta name="twitter:site" content="@timviec365com">
  <meta name="twitter:title" content="<?=$seo_tt?>" />
  <meta name="twitter:description" content="<?=$seo_des?>" />

  <meta property="og:image:url" content="https://timviec365.com/images/no-image.png" />
  <meta property="og:image:width" content="333" />
  <meta property="og:image:height" content="426" />
  <meta property="og:site_name" content="Timviec365.com" />
  
  <meta property="og:title" content="<?=$seo_tt?>" />
  <meta property="og:description" content="<?=$seo_des?>" />
  <meta property="og:url" content="https://timviec365.com<?=$cano?>" />
  <meta property="og:locale" content="vi_VN" />
  <meta property="og:type" content="website" />
  <link rel="stylesheet" href="/css/font-awesome.min.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
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
<body class="template_cv mau_cv">
<header>
    <? include("../includes/inc_header_cv.php");?>
    <div id="banner">
        <span id="first">Top Mẫu Đơn Xin Việc 365 Online</span>
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
      <li class="active"><a>Đơn xin việc</a></li>
    </ul>
  </div>
  <div class="main main_appli">
    <div class="box_cv main">
      <h1 class="suggest-title text-center"><?=$seo_h1?></h1>
      <p class="text-center p">Tổng hợp mẫu đơn xin việc ấn tượng nhất - thu hút nhà tuyển dụng.</p>
      <div class="main list_cv">
        <?
          $list_cv = new db_query("SELECT * FROM sample_appli WHERE status = 1 ORDER BY serial DESC, timecreated DESC LIMIT $start, $curentPage");
          while($row = mysql_fetch_assoc($list_cv->result)) {
        ?>
          <div class="item">
            <div class="cv_top">
              <img src="/images/load.gif" class="lazyload" data-src="../upload/appli/<?=$row['alias']."/".$row['image']?>" alt="<?=$row['name']?>" title="<?=$row['name']?>" class="img-responsive">
              <div class="cv-overlay">
                  <!-- <a class="show_Cv">Xem trước</a> -->
                  <?
                  if((!isset($_COOKIE['UT']) || $_COOKIE['UT'] == 1))
                    echo '<a class="use_cv login_modal" onclick="hanld_login(this)" rel="nofollow" data-href="'.rewriteCreateAppli($row["alias"],$row["id"]).'"> Dùng mẫu này</a>';
                  else echo '<a class="use_cv" rel="nofollow" href="'.rewriteCreateAppli($row["alias"],$row["id"]).'"> Dùng mẫu này</a>';
                  ?>
              </div>
            </div>
            <div class="cv-bottom main">
              <h3 class="cv-title">
                <?=$row['name']?>
              </h3>
              <span class="label label-info">Miễn phí</span>
            </div>
          </div>
        <?}?>
      </div>
      <!-- <div class="main text-center" id="xemthemCV" data-id="<?=$page+1?>">
          <a>Xem thêm CV <i class="fa fa-angle-double-down" aria-hidden="true"></i></a>
      </div> -->
      <div class="title_appli text-center"><h2 class="head2">Đơn xin việc theo ngành nghề</h2></div>
      <div class="list_cate_CV text-center main">
        <?
         $db_qrs = new db_query("SELECT * FROM category_appli ORDER BY cat_id DESC ");
         While($rowcat = mysql_fetch_assoc($db_qrs->result)){
          $url = "/don-xin-viec/".$rowcat['cat_alias'].".html";
        ?>
        <a class="item" href="<?=$url?>"><?=$rowcat['cat_name']?></a>
        <?
        }
        ?>
      </div>
      <div class="main_language appli main">
      <div class="title_appli text-center"><h2 class="head2">Đơn xin việc theo ngôn ngữ</h2></div>
        <div class="list_language appli">
          <a class="item" id="vi" href="/don-xin-viec/don-xin-viec-tieng-viet-l1.html"><img src="/images/load.gif" class="lazyload" data-src="/images/vi.png" alt="Tiếng việt">Đơn xin việc Tiếng Việt</a>
          <a class="item" id="kr" href="/don-xin-viec/don-xin-viec-tieng-han-l5.html"><img src="/images/load.gif" class="lazyload" data-src="/images/kr.png" alt="Tiếng hàn">Đơn xin việc Tiếng Hàn</a>
          <a class="item" id="jv" href="/don-xin-viec/don-xin-viec-tieng-nhat-l3.html"><img src="/images/load.gif" class="lazyload" data-src="/images/jp.png" alt="Tiếng nhật">Đơn xin việc Tiếng Nhật</a>
          <a class="item" id="en" href="/don-xin-viec/don-xin-viec-tieng-anh-l2.html"><img src="/images/load.gif" class="lazyload" data-src="/images/en.png" alt="Tiếng anh">Đơn xin việc Tiếng Anh</a>
          <a class="item" id="cn" href="/don-xin-viec/don-xin-viec-tieng-trung-l4.html"><img src="/images/load.gif" class="lazyload" data-src="/images/cn.png" alt="Tiếng trung">Đơn xin việc Tiếng Trung</a>
        </div>
    </div>
    </div>
  </div>
  <?
  if($rowseo['seo_text']!=''){
  ?>
  <div class="box_text_seo">
    <div class="menu">
    <? makeML($rowseo['seo_text'],'',''); ?>
    </div>
    <div class="content">
        <div class="nd"><?= makeML_content(str_replace('src=', 'class="lazyload" src="/images/load.gif" data-src=', $rowseo['seo_text']),'','') ?></div>
        <div class="read">
        Xem thêm <i class="fa fa-angle-double-down" aria-hidden="true"></i>
        </div>
    </div>
  </div>
  <?}?>
  <?
  include('../includes/inc_footer.php');
  include('../includes/inc_script_footer.php');
  ?>
  <script src="/js/jscv/custom_cv.js" defer></script>
</body>
</html>