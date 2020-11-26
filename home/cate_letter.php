<?
include("config.php"); 
$cano = $cano = $_SERVER['REQUEST_URI'];
$cat_alias = getValue('cat_alias','str','GET','');
$is_cv = '';
$fail = 0;
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

$listseo = new db_query("SELECT * FROM category_letter WHERE cat_alias = '".$cat_alias."' ");
if(mysql_num_rows($listseo->result)==0){
  redirect('/mau-thu-xin-viec.html');
}
$rowseo = mysql_fetch_assoc($listseo->result);
$canonical = "";
if($rowseo['meta_h1']!=''){
  $seo_h1 = $rowseo['meta_h1'];
}else{
  $seo_h1 = 'Thư xin việc theo ngành nghề';
}

if($rowseo['meta_tit']!=''){
  $seo_tt = $rowseo['meta_tit'];
}else{
  $seo_tt = '';
}

if($rowseo['meta_des']!=''){
  $seo_des = $rowseo['meta_des'];
}else{
  $seo_des = 'Thư xin việc theo ngành nghề';
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
$index = ($rowseo['cat_index'])?"index,follow":"noindex,nofollow";
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
        <span id="first">Top Mẫu Thư Xin Việc 365 Online</span>
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
      <li><a>Thư xin việc</a></li>
      <li class="active"><a><?=$rowseo['cat_name']?></a></li>
    </ul>
  </div>
  <div class="main main_appli">
    <div class="box_cv main">
      <h1 class="suggest-title text-center"><?=$seo_h1?></h1>
      <p class="text-center p"><?=$seo_sapo?></p>
      <div class="main list_cv">
        <?
          $list_cv = new db_query("SELECT * FROM sample_letter WHERE status = 1 AND idnganh = ".$rowseo['cat_id']." ORDER BY serial DESC, timecreated DESC LIMIT $start, $curentPage");
          $db_count = new db_query("SELECT count(*) FROM sample_letter WHERE status = 1");
          $count = mysql_fetch_assoc($db_count->result);
          $count = $count['count(*)'];
          while($row = mysql_fetch_assoc($list_cv->result)) {
        ?>
          <div class="item">
            <div class="cv_top">
              <img src="/images/load.gif" class="lazyload" data-src="../upload/letter/<?=$row['alias']."/".$row['image']?>" alt="<?=$row['name']?>" title="<?=$row['name']?>" class="img-responsive">
              <div class="cv-overlay">
                  <!-- <a class="show_Cv" data-id="<?=$row['id']?>">Xem trước</a> -->
                  <?
                  if((!isset($_COOKIE['UT']) || $_COOKIE['UT'] == 1))
                    echo '<a class="use_cv login_modal" onclick="hanld_login(this)" rel="nofollow" data-href="'.rewriteCreateLetter($row["alias"],$row["id"]).'"> Dùng mẫu này</a>';
                  else echo '<a class="use_cv" rel="nofollow" href="'.rewriteCreateLetter($row["alias"],$row["id"]).'"> Dùng mẫu này</a>';
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
      <?
      if($count > 18){
      ?>
       <div class="main text-center" id="xemthemCV" data-id="<?=$page+1?>">
          <a>Xem thêm <i class="fa fa-angle-double-down" aria-hidden="true"></i></a>
      </div>
      <?
      }
      ?>
      <div class="title_appli text-center"><p class="head2">Thư xin việc theo ngành nghề</p></div>
      <div class="list_cate_CV text-center main">
        <?
         $db_qrs = new db_query("SELECT * FROM category_letter ORDER BY cat_id DESC ");
         While($rowcat = mysql_fetch_assoc($db_qrs->result)){
          $url = rewriteCateLetter($rowcat['cat_alias']);
          $cat_name = $rowcat['cat_name'];
          echo '<a class="item" href="'.$url.'">'.$cat_name.'</a>';
          }
        ?>
      </div>
      <?
      $db_lang = new db_query("SELECT languagecv.name, languagecv.alias,languagecv.id FROM new_lang_letter JOIN languagecv ON id_lang = id ORDER BY id_lang ASC");
      if(mysql_num_rows($db_lang->result)){
        echo '<div class="main_language appli main">';
        echo '<div class="title_appli text-center"><h2 class="head2">Thư xin việc theo ngôn ngữ</h2></div>
          <div class="list_language appli">';
        While($rowLang = mysql_fetch_assoc($db_lang->result)){
            $key = $rowLang['id'];
            echo '<a class="item" id="vi" href="'.rewriteLangLetter($rowLang['id'],$rowLang['alias']).'"><img src="/images/load.gif" class="lazyload" data-src="/images/'.$array_images_country[$key].'" alt="Tiếng việt">Thư xin việc '.$rowLang['name'].'</a>';
        }
        echo '</div>';
        echo '</div>';
      }
      ?>
    </div>
  </div>
  <div class="box_text_seo">
    <div class="menu">
    <div class="main_menu main">
        <? makeML($rowseo['content'],'',''); ?>
        </div>
        <a rel="nofollow" class="banner_timviec365" target="_blank" href="https://timviec365.vn/cv-xin-viec"><img style="margin:20px 0;height:auto" src="/images/load.gif" class="lazyload" data-src="/images/bannerBlog2.gif" alt="Tạo CV Online"></a>
    </div>
    <div class="content">
        <div class="nd">
        <?
        $content = $rowseo['content'];
        $content = str_replace('style="font-size:14px;"','',$content);
        $content = str_replace('style="font-family:arial,helvetica,sans-serif;"','',$content);
          echo makeML_content(str_replace('src=', 'class="lazyload" src="/images/load.gif" data-src=', $content),'','') 
        ?>
        </div>
        <div class="read">
        Xem thêm <i class="fa fa-angle-double-down" aria-hidden="true"></i>
        </div>
    </div>
  </div>
  <?
  include('../includes/inc_footer.php');
  include('../includes/inc_script_footer.php');
  ?>
  <script src="/js/jscv/custom_cv.js" defer></script>
</>
</html>