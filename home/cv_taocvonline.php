<?
include("config.php"); 
$is_cv = '';

//phân trang
$page  = getValue('page','int','GET',1,2);
$page  = intval(@$page);
if($page == 0)
{
  $page = 1;
}
$curentPage = 3;
$pageab = abs($page - 1);
$start = $pageab * $curentPage;
$start = intval(@$start);
$start = abs($start);
$result = new db_query('select count(id) as total from samplecv');
$row = mysql_fetch_assoc($result->result);
$total_records = $row['total'];

$limit = 12;
$url = "tao-cv-online";

$listseo = new db_query("SELECT * FROM seo_tt WHERE name_page = '".$url."' ");
$rowseo = mysql_fetch_assoc($listseo->result);
$ogImage = GetImageOG($rowseo['seo_text']);
$index = "index, follow";
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
  <meta name="keywords" content="<?=trim($rowseo['seo_key'])?>"/>
  <meta name="description" content="<?=$rowseo['seo_des']?>" />
  <meta name="robots" content="<?=$index?>" />
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:image" content="<?=$ogImage?>" />
  <meta name="twitter:site" content="@timviec365com">
  <meta name="twitter:title" content="<?=$rowseo['seo_tt']?>" />
  <meta name="twitter:description" content="<?=$rowseo['seo_des']?>" />

  <meta property="og:image:url" content="<?=$ogImage?>" />
  <meta property="og:image:width" content="333" />
  <meta property="og:image:height" content="426" />

  <meta property="og:title" content="<?=$rowseo['seo_tt']?>" />
  <meta property="og:description" content="<?=$rowseo['seo_des']?>" />
  <meta property="og:url" content="https://timviec365.com<?=$_SERVER['REQUEST_URI']?>" />
  <meta property="og:locale" content="vi_VN" />
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="Timviec365.com" />

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
<script type="application/ld+json">
{
  "@context": "https://schema.org/", 
  "@type": "BreadcrumbList", 
  "itemListElement": [{
    "@type": "ListItem", 
    "position": 1, 
    "name": "Trang chủ",
    "item": "http://timviec365.com/"  
  },{
    "@type": "ListItem", 
    "position": 2, 
    "name": "Tạo CV online",
    "item": "https://timviec365.com/tao-cv-online.html"  
  }]
}
</script>
</head>
<body class="template_cv tao_cvonline">
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header>
    <? include("../includes/inc_header_cv.php");?>
    <div id="banner">
      <div class="pull-right">
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
      <li class="active"><span>Tạo CV online</span></li>
    </ul>
  </div>
  <div class="main main_cvonline">
    <? include('../includes/inc_menu_cv.php') ?>
    <div class="box_cv">
      <h1 class="suggest-title text-center"><?=$rowseo['seo_h1']?></h1>
      <p class="text-center" id="text-after-h1">Tạo CV online free, đơn giản và chuyên nghiệp. Tải xuống nhanh chóng, dễ dàng. Bạn đã từng Tạo CV online? Liệt kê một chút như tạo cv online free, tạo cv online đơn giản, tạo cv online miễn phí, tạo cv online đẹp, tạo cv online tiếng anh, tạo hồ sơ xin việc online,... Đây chắc hẳn là những truy vấn thường xuyên của mỗi ứng viên.</p>
      <h2 class="text-center h2">Danh sách mẫu CV online đẹp 2020</h2>
      <div class="main list_cv">
        <?
        $listnn2 = new db_query("SELECT * FROM nganhcv ORDER BY serial DESC,id DESC LIMIT ".$start.",".$curentPage." ");
        while ($nn = mysql_fetch_assoc($listnn2->result)) {
          $list_cv = new db_query("SELECT * FROM samplecv WHERE idnganh = '".$nn['id']."' AND status = 1 ORDER BY serial_CvOnl DESC, timecreated DESC LIMIT 6");
          if ($num = mysql_num_rows($list_cv->result)>3) {            
        ?>
          <div class="cvonl_tt main" rel="nofollow" target="_blank" href="<?=rewriteNNCV($nn['alias'],$nn['id'])?>">
            <h3 class="h3">Mẫu CV online ngành <?=$nn['name'];?></h3>
          </div>
          <div class="box-item main">
          <?while($row = mysql_fetch_assoc($list_cv->result)) {?>
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
        <?
          }
        }
        ?>
      </div>
      <div class="text-center box_xemthem main">
          <a id="xemthemCV" data-id="<?=$page+1?>">Xem thêm mẫu CV online</a>
      </div>
      <div class="list_cate_CV main">
        <?
        foreach ($db_catCV as $key => $value) {
        ?>
        <a class="item" href="<?=rewriteNNCV($value['alias'])?>"><?=$value['name']?></a>
        <?
        }
        ?>
      </div>
    </div>
    <div class="main_language main">
      <img src="/images/load.gif" class="lazyload" data-src="/images/computer.png" alt="Computer">
      <div class="banner">
        <p>CV theo ngôn ngữ</p>
        <p>Tổng hợp những mẫu CV ngôn ngữ chuẩn, đẹp nhất 2020!</p>
      </div>
      <div class="list_language">
        <a class="item" id="vi" href="/mau-cv/tieng-viet.html"><img src="/images/load.gif" class="lazyload" data-src="/images/vi.png" alt="Tiếng việt">CV Tiếng Việt</a>
        <a class="item" id="kr" href="/mau-cv/tieng-han.html"><img src="/images/load.gif" class="lazyload" data-src="/images/kr.png" alt="Tiếng hàn">CV Tiếng Hàn</a>
        <a class="item" id="jv" href="/mau-cv/tieng-nhat.html"><img src="/images/load.gif" class="lazyload" data-src="/images/jp.png" alt="Tiếng nhật">CV Tiếng Nhật</a>
        <a class="item" id="en" href="/mau-cv/tieng-anh.html"><img src="/images/load.gif" class="lazyload" data-src="/images/en.png" alt="Tiếng anh">CV Tiếng Anh</a>
        <a class="item" id="cn" href="/mau-cv/tieng-trung.html"><img src="/images/load.gif" class="lazyload" data-src="/images/cn.png" alt="Tiếng trung">CV Tiếng Trung</a>
      </div>
    </div>
    <div class="showImage hidden"></div> <!-- div chứa cv xem trước -->
    <div class="loader_xt hidden">
      <span class="fa fa-spinner xoay load_cv"></span>
    </div> <!-- div chứa hiệu ứng load -->
    <div class="box_text_seo">
      <div class="menu">
        <div class="main_menu main">
        <? makeML($rowseo['seo_text'],'',''); ?>
        </div>
        <a rel="nofollow" class="banner_timviec365" target="_blank" href="https://timviec365.vn/cv-xin-viec"><img style="margin:20px 0;height:auto" src="/images/load.gif" class="lazyload" data-src="/images/bannerBlog2.gif" alt="Tạo CV Online"></a>
      </div>
      <div class="content">
         <div class="nd"><?= makeML_content(str_replace('src=', 'class="lazyload" src="/images/load.gif" data-src=', $rowseo['seo_text']),'','') ?></div>
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
<script type="text/javascript">
  $(document).ready(function(){
     $('#xemthemCV').click(function(){
      var page = $(this).attr('data-id');
      $.ajax({
        type:'POST',
        url :'/ajax/load_more_cv.php',
        data:{
          page : page
        },
        success:function(data){
          if(data != ''){
            $('#xemthemCV').attr('data-id',Number(page)+1);
            $('.list_cv').append(data);
          }
          else{
            $('#xemthemCV').remove();
          }
        }
      });
    });
 });
</script>

</body>
</html>