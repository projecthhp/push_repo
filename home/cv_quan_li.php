<?
include("config.php"); 
$cano = "/mau-cv.html";
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
$result = new db_query('select count(id) as total from samplecv');
$row = mysql_fetch_assoc($result->result);
$total_records = $row['total'];

$url = "mau-cv";

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
  <link rel="canonical" href="https://timviec365.com<?=$cano?>" />
  <link href="" rel="shortcut icon"/>
  <meta name="keywords" content="<?=$rowseo['seo_key']?>" />
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
  <meta property="og:site_name" content="Timviec365.com" />
  
  <meta property="og:title" content="<?=$rowseo['seo_tt']?>" />
  <meta property="og:description" content="<?=$rowseo['seo_des']?>" />
  <meta property="og:url" content="https://timviec365.com<?=$cano?>" />
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
  }]
}
</script>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
</head>
<body class="template_cv mau_cv">
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
      <li class="active"><span>CV xin việc</span></li>
    </ul>
  </div>
  <div class="main maucv">
    <? include('../includes/inc_menu_cv.php') ?>
      <div class="box_cv main">
        <h1 class="suggest-title text-center"><?=$rowseo['seo_h1']?></h1>
        <p class="text-center" id="text-after-h1">Chọn một mẫu CV xin việc, điền đầy đủ thông tin và tải xuống trong vài giây. Tạo một sơ yếu lý lịch chuyên nghiệp thông qua một vài cú click chuột. Lựa chọn miễn phí trong hàng trăm mẫu phía dưới, cùng với những gợi ý có sẵn sẽ giúp bạn có một bản CV ấn tượng.</p>
        <div class="main list_cv">
          <?
            $list_cv = new db_query("SELECT * FROM samplecv WHERE status = 1 ORDER BY serial DESC, timecreated DESC LIMIT $start, $curentPage");
            while($row = mysql_fetch_assoc($list_cv->result)) {
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
        <div class="main text-center" id="xemthemCV" data-id="<?=$page+1?>">
            <a>Xem thêm CV <i class="fa fa-angle-double-down" aria-hidden="true"></i></a>
        </div>
      </div>
      <div class="box_qc main">
          <div class="item design main">
            <img src="/images/load.gif" class="lazyload" data-src="/images/qc_1.png" alt="Qc 1">
            <div class="div_content">
              <p class="title">Đa dạng phong cách thiết kế</p>
              <p class="content">Kho CV của timviec365.com có khả năng thỏa mãn tất cả các gu thẩm mỹ của người dùng. Từ những chiếc CV mang phong cách tối giản, sang trọng Minimalism cho đến những kiểu cách tiểu tiết hơn như Illustrated, Typographic, Vintage đều hiện diện tại đây. </p>
            </div>
          </div>
          <div class="item category main">
            <img src="/images/load.gif" class="lazyload" data-src="/images/qc_2.png" alt="Qc 2">
            <div class="div_content">
              <p class="title">Đặc trưng CV theo ngành nghề</p>
              <p class="content">CV của timviec365.com cực kỳ tỉ mỉ trong lối thiết kế khi để ý đến thể hiện đặc trưng của từng ngành nghề trên mỗi CV. Nghĩa là CV của ngành nghề sẽ gợi lên hình ảnh, tính chất, môi trường làm việc của đúng ngành nghề đó. Từ đó tạo ra sự tương hỗ giữa hình thức và nội dung bên trong CV.</p>
            </div>
          </div>
          <div class="item edit_cv main">
            <img src="/images/load.gif" class="lazyload" data-src="/images/qc_7.png" alt="Qc 7">
            <div class="div_content">
              <p class="title">Tùy chọn chỉnh sửa CV dễ dàng</p>
              <p class="content">Ứng viên có thể tự do sáng tạo trên nền tảng tạo CV sẵn có thông qua việc tùy chỉnh màu sắc chủ đạo, phông chữ, cỡ chữ, thêm bớt bố cục nội dung sao cho phù hợp nhất. Bằng cách này, CV của bạn sẽ giống như tự bạn thiết kế hơn là những sự cứng nhắc từ bản CV soạn sẵn.</p>
            </div>
          </div>
          <div class="item create_by_language main">
            <img data-src="/images/qc_4.png" class="lazyload" src="/images/load.gif" alt="Qc 4">
            <div class="div_content">
              <p class="title">Tự tạo CV bằng 5 ngôn ngữ </p>
              <p class="content">Ứng viên có thể tự do sáng tạo trên nền tảng tạo CV sẵn có thông qua việc tùy chỉnh màu sắc chủ đạo, phông chữ, cỡ chữ, thêm bớt bố cục nội dung sao cho phù hợp nhất. Bằng cách này, CV của bạn sẽ giống như tự bạn thiết kế hơn là những sự cứng nhắc từ bản CV soạn sẵn.</p>
            </div>
          </div>
          <div class="item connect_company main">
            <img src="/images/load.gif" data-src="/images/qc_5.png" class="lazyload" alt="Qc 5">
            <div class="div_content">
              <p class="title">Tự động kết nối với NTD sau khi tạo</p>
              <p class="content">ĐẶC BIỆT sau khi tạo và lưu lại CV trên website, hệ thống sẽ tự động kết nối CV của bạn đến những nhà tuyển dụng có nhu cầu trùng khớp. Nhờ vậy mà cơ hội việc làm có thể sẽ tự đến với bạn mà các bạn không cần phải cất công đi tìm. Những việc hấp dẫn nhất sẽ đến ngay với bạn!</p>
            </div>
          </div>
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
      <div class="box_nx main">
        <div class="title text-center ">
          Nhận xét của người dùng
        </div>
        <div class="main_nx">
          <div class="item">
            <img src="/images/load.gif" class="lazyload" data-src="/images/nx_1.png" alt="Nx 1">
            <p class="name">Trần Thanh Huyền</p>
            <div class="stars">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
            </div>
            <div class="content">
              Timviec365.com giúp tôi tiết kiệm thời gian tìm việc, tạo CV 1 cách dễ dàng, tiếp cận doanh nghiệp nhanh chóng. Nhờ có Timviec365.com tôi đã tìm được công việc như ý với mức lương mong muốn.
            </div>
          </div>
          <div class="item">
            <img src="/images/load.gif" class="lazyload" data-src="/images/nx_2.png" alt="Nx 2">
            <p class="name">Lan Hương</p>
            <div class="stars">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
            </div>
            <div class="content">
              CV Timviec365.com chuyên nghiệp, mới lạ, gây ấn tượng và chinh phục nhà tuyển dụng ngay từ ban đầu.Việc nộp đơn và quá trình ứng tuyển nhanh chóng hơn quá trình ứng tuyển thông thường.
            </div>
          </div>
          <div class="item">
            <img src="/images/load.gif" class="lazyload" data-src="/images/nx_3.png" alt="Nx 3">
            <p class="name">Hoàng Duy</p>
            <div class="stars">
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
              <i class="fa fa-star" aria-hidden="true"></i>
            </div>
            <div class="content">
              Đa dạng mẫu CV xin việc đẹp, miễn phí, tiết kiệm thời gian tìm việc, ứng tuyển nhanh chóng. Timviec365.com giúp tôi tìm được công việc mơ ước!!!
            </div>
          </div>
        </div>   
      </div>
      <div class="box_banner2 main">
          <p class="first">Tạo CV xin việc miễn phí</p>
          <p class="second">CV xin việc 365 với thiết kế đẹp, chuẩn theo từng ngành. Top 365 mẫu CV Online của timviec365.com được nhà tuyển dụng đánh giá cao. Tạo dễ dàng và tải miễn phí.</p>
          <a href="/tao-cv-online.html" rel="nofollow">Tạo CV ngay</a>
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
          url :'/ajax/load_more_ql.php',
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

      width = $(window).width();
      if(width<=480){
        $('.main_nx').slick({
          autoplay: true,
          autoplaySpeed: 2000,
          dots: true
        });
      }
    });
  </script>

</body>
</html>