<?
include("config.php"); 
$fail = 0;
$is_cv = '';
$alias = getValue('alias','str','GET','');
if($alias == ''){
  Header( "Location: https://timviec365.com/home/404.php" );
}else{
  $listseo = new db_query("SELECT nganhcv.*,news_nganhnghe.seo_des,news_nganhnghe.seo_key,news_nganhnghe.seo_tt,news_nganhnghe.noidung,news_nganhnghe.mota,news_nganhnghe.title FROM news_nganhnghe JOIN nganhcv ON nganhcv.id = news_nganhnghe.idnganh WHERE nganhcv.alias = '".$alias."'");
  if(mysql_num_rows($listseo->result)>0){
    $rowseo = mysql_fetch_assoc($listseo->result);
  }else{
    Header( "Location: https://timviec365.com/home/404.php" );
  }
}
$idnganh = $rowseo['id'];
$ogImage = GetImageOG($rowseo['noidung']);
$array_seo = [19,4];
$index = "noodp,index,follow";
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title><?=$rowseo['seo_tt']?></title>    
  <link rel="canonical" href="https://timviec365.com<?=$_SERVER['REQUEST_URI']?>" />
  <link href="" rel="shortcut icon"/>
  <meta name="keywords" content="<?=$rowseo['seo_key']?>" />
  <meta name="description" content="<?=$rowseo['seo_des']?>" />
  <meta name="robots" content="<?=$index?>" />
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:image" content="<?=$ogImage?>" />
  <meta name="twitter:site" content="@timviec365com">
  <meta name="twitter:title" itemprop="name"  content="<?=$rowseo['seo_tt']?>" />
  <meta name="twitter:description" content="<?=$rowseo['seo_des']?>" />

  <meta property="og:image:url" content="<?=$ogImage?>" />
  <meta property="og:image:width" content="333" />
  <meta property="og:image:height" content="426" />

  <meta property="og:title" content="<?=$rowseo['seo_tt']?>" />
  <meta property="og:description" content="<?=$rowseo['seo_des']?>" />
  <meta property="og:url" content="https://timviec365.com<?=$_SERVER['REQUEST_URI']?>" />
  <meta property="og:locale" content="vi_VN" />
  <meta property="og:type" content="website" />

  <link rel="stylesheet" href="/css/font-awesome.min.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
  <link rel="stylesheet" href="/css/select2.min.css" media="all" onload="if(media!='all')media='all'">
  <link rel="stylesheet" href="/css/style.min.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->
<? if(in_array($idnganh, $array_seo)) {?>
 <script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "BreadcrumbList", 
  "itemListElement": [{
    "@type": "ListItem", 
    "position": 1, 
    "name": "Trang chủ",
    "item": "https://timviec365.com/"  
  },{
    "@type": "ListItem", 
    "position": 2, 
    "name": "CV xin việc",
    "item": "https://timviec365.com/mau-cv.html"  
  },{
    "@type": "ListItem", 
    "position": 3, 
    "name": "Mẫu CV <?=($idnganh==4)?"":"Ngành "?><?= $rowseo['name'] ?>",
    "item": "https://timviec365.com/mau-cv/<?=$alias?>.html"  
  }]
}
</script> 
<?}?>
  <style>
    a.download{padding:5px;background:#6cc9ff;display:inline-block;position:relative;height:50px;overflow:hidden;width:130px}
    a.download::after{content:'Tải tài liệu';position:absolute;top:0;right:0;left:0;bottom:0;background-color:green;color:#fff;line-height:50px;text-align:center}
  </style>
</head>
<body class="template_cv cv_cate">
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header>
    <? include("../includes/inc_header_cv.php");?>
    <div id="banner">
      <div class="text-center">
        <span id="first">Top Mẫu CV Xin Việc 365 Online</span>
        <span>Tải ngay ứng dụng timviec365 và cv365+ trên điện thoại để trải nghiệm tốt nhất</span>
        <div class="download_appCV">
          <img src="/images/qr_app_cv.png" alt="QR tải app">
          <a target="_blank" class="link_android" rel="nofollow" href="https://play.google.com/store/apps/details?id=vn.hungviet.cv365com"><i class="fa fa-android" aria-hidden="true"></i>Tải cho Android</a>
          <a target="_blank" class="link_ios" rel="nofollow" href="https://apps.apple.com/us/app/timviec365-com-cv-xin-vi%E1%BB%87c/id1513694297?l=vi#?platform=iphone"><i class="fa fa-apple" aria-hidden="true"></i>Tải cho IOS</a>
        </div>
        </div>
    </div>
  </header>
  <div class="breakcrumb">
    <ul>
      <li><a href="/">Trang chủ</a></li>
      <li><a href="/mau-cv.html">CV xin việc</a></li>
      <li class="active"><span>Mẫu CV <?=($idnganh==4)?"":"Ngành "?><?= $rowseo['name'] ?></span></li>
    </ul>
  </div>
  <div class="main main_cvonline">
    <? include('../includes/inc_menu_cv.php') ?>
    <div class="box_cv">
      <h1 class="suggest-title text-center"><?=$rowseo['title']?></h1>
      <p class="text-center" id="text-after-h1"><?=$rowseo['mota']?></p>
      <? if(in_array($idnganh, $array_seo)){?><h2 class="h2 text-center">Danh sách mẫu CV <?=($idnganh==4)?"":"ngành"?> <?=$rowseo['name']?></h2><?} ?>
      <div class="main list_cv">
          <?
          $list_cv = new db_query("SELECT * FROM samplecv WHERE idnganh = '".$rowseo['id']."' AND idlang = 0 AND status = 1 ORDER BY timecreated DESC ");
          while($row = mysql_fetch_assoc($list_cv->result)) {
            if($rowseo['id'] == 7){
                $alt = "CV ".str_replace('CV', '', $row['name']);
              }else{
                $alt = $row['name'];
              }
              if(in_array($idnganh, $array_seo)){
                if($idnganh == 4){
                  $alt = "Mẫu CV ".str_replace('CV', '', $row['name']);
                }
                else{
                  $alt = "Mẫu CV ngành ".str_replace('CV', '', $row['name']);
                }
              }
          ?>
          <div class="item">
              <div class="cv_top">
                <img src="/images/load.gif" class="lazyload" data-src="../upload/maucv/<?=$row['alias']."/".$row['image']?>" alt="<?=$row['name']?>" title="<?=$row['name']?>" class="img-responsive">
                <div class="cv-overlay">
                    <a onclick="showCV(<?=$row['id']?>)" class="show_Cv">Xem trước</a>
                    <?
                    if((!isset($_COOKIE['UT']) || $_COOKIE['UT'] == 1))
                      echo '<a class="use_cv login_modal" onclick="hanld_login(this)" rel="nofollow" data-href="'.rewriteCreateCV($row["alias"],$row["id"]).'"> Dùng mẫu này</a>';
                    else echo '<a class="use_cv" rel="nofollow" href="'.rewriteCreateCV($row["alias"],$row["id"]).'"> Dùng mẫu này</a>';
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
    </div>
    <div class="box_qc">
      <div class="item about_hsxv main">
            <img src="/images/load.gif" data-src="/images/qc_6.png" class="lazyload" alt="Qc 6">
            <div class="div_content">
              <p class="title">Tự động kết nối với NTD sau khi tạo</p>
              <ul>
                <li><a>Sơ yếu lý lịch tự thuật</a></li>
                <li><a>Đơn xin việc</a></li>
                <li><a>CV xin việc</a></li>
                <li><a>Giấy khám sức khỏe (photo công chứng)</a></li>
                <li><a>Bằng cấp, chứng chỉ (photo công chứng)</a></li>
                <li><a>Bản photo chứng minh thư (photo công chứng)</a></li>
                <li><a>Ảnh 3 x 4 hoặc 4 x 6 (nếu NTD có yêu cầu)</a></li>
              </ul>
              <div class="flex">
                <div class="a letter">Thư xin việc</div>
                <div class="a appli">Đơn xin việc</div>
                <div class="a syll">Sơ yếu lý lịch</div>
              </div>
            </div>
          </div>
    </div>
    <a href="/mau-cv.html" rel="nofollow"><img src="/images/load.gif" class="lazyload" data-src="" id="banner_cate" alt=""></a>
    <div class="showImage hidden"></div> <!-- div chứa cv xem trước -->
    <div class="loader_xt hidden">
      <span class="fa fa-spinner xoay load_cv"></span>
    </div> <!-- div chứa hiệu ứng load -->
    <div class="box_text_seo">
      <div class="menu">
        <div class="main_menu main">
        <? makeML($rowseo['noidung'],'',''); ?>
        </div>
        <a rel="nofollow" class="banner_timviec365" target="_blank" href="https://timviec365.vn/cv-xin-viec"><img style="margin:20px 0;height:auto" src="/images/load.gif" class="lazyload" data-src="/images/bannerBlog2.gif" alt="Tạo CV Online"></a>
      </div>
      <div class="content">
         <div class="nd"><?= makeML_content(str_replace('src=', 'class="lazyload" src="/images/load.gif" data-src=', $rowseo['noidung']),'','') ?></div>
         <div class="read">
          Xem thêm <i class="fa fa-angle-double-down" aria-hidden="true"></i>
         </div>
      </div>
    </div>
  </div>
  <?
  include('../includes/inc_footer.php');
  include('../includes/inc_script_footer.php');
  ?>
  <script src="../js/jscv/custom_cv.js?v=<?=$version?>" defer></script>
</body>
</html>