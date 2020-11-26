<?
include("config.php");
if (isset($_COOKIE['UT']) && isset($_COOKIE['UID'])) {
    $userid = $_COOKIE['UID'];
    
    if ($_COOKIE['UT'] == 2) {
        $db_qrlogin = new db_query("SELECT * FROM tmp_user WHERE tmp_authentic = 0 AND tmp_id = '" . $userid . "' LIMIT 1");
        $rowlogin = mysql_fetch_assoc($db_qrlogin->result);
        if(empty($rowlogin)){
            redirect("/");
        }
    } else {
        redirect("/");
    }
} else {
    redirect("/dang-nhap.html");
}
$xt = 1;
?>
<!doctype html>
<html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js">
   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
      <link rel="canonical" href="https://timviec365.com/thong-tin-can-biet.html" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta name="robots" content="noodp,noindex,nofollow"/>

      <link rel='dns-prefetch' href='//fonts.googleapis.com' />
      <link rel='dns-prefetch' href='//s.w.org' />
      <link rel='stylesheet' id='wpb-google-fonts-css'  href='https://fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C700italic%2C400%2C700%2C300&#038;ver=4.6.5' media='all' />
      <link rel='stylesheet' id='bootstrap.min-css'  href='/css/bootstrap.min.css' media='all' />
      <link rel='stylesheet' id='font-awesome-css'  href='/fonts/font-awesome.min.css' media='all' />
      <link rel='stylesheet' id='owl.themecss-css'  href='/css/owl.theme.css' media='all' />
      <link rel='stylesheet' id='owl.themecss-css'  href='/css/select2.css' media='all' />
      <link rel='stylesheet' id='style-css'  href='/css/style.min.css?v=1' media='all' />
      <link href="/css/responsive.css" rel="stylesheet"/>


      <script type='text/javascript' src='/js/jquery.min.js'></script>
      <script type='text/javascript' src='/js/select2.min.js'></script>

      <meta name="google-site-verification" content="EIV7wHDvaTZkVpsLjmM4_neYDyPLTmjV9du0A8ho4TU" />
      <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->

   </head>
   <body class="home">
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
      <div id="wapper">
         <? include('../includes/inc_header.php') ?>
         <? include("../includes/inc_search.php") ?>

         <section id="content" class="site-content">
            <main role="main" style="background: #fff;">
               <div class="container">
                  <div class="row">
                         <content class="cap_nhat col-12">
                             <div class="c_xt row">
                              <div class="col-md-12 pull-left title_b2">
                                <span>Bước 2: Hoàn thiện hồ sơ : </span>
                                <span>Bạn chọn 1 trong 2 cách sau để hoàn thiện bộ hồ sơ</span>
                              </div>
                                 <div class="c_xt_left pull-left col-md-6 col-12 col-xs-12">
                                     <div class="xt_right_tit" style="background: #19b578; padding: 0; text-align:center;border: none;border-radius: 7px">
                                        <a href="dang-ky-ung-vien-truc-tuyen.html" style="color:#fff!important">
                                          Tạo hồ sơ bằng form khai trực tuyến
                                        </a>
                                     </div>
                                     <div class="cap_nhat_main">
                                         <p>
                                           Tạo hồ sơ bằng form khai trực tuyến: <span>Bạn tạo đầy đủ các thông tin của bạn để các nhà tuyển dụng có cơ sở tuyển chọn. Thông tin càng chi tiết cơ hội việc làm của bạn tăng lên</span>
                                         </p>
                                     </div>
                                 </div>
                                 <div class="c_xt_right col-md-6 col-12 col-xs-12">
                                     <div class="xt_right_tit" style="background: #1abc9c; padding: 0; text-align:center;border: none;border-radius: 7px">
                                         <a href="up-load-cv.html" style="color:#fff!important">Tải CV từ máy tính của bạn</a>
                                     </div>
                                     <div class="cap_nhat_main">
                                       <p>
                                         Tải CV từ máy tính của bạn: <span>Bạn đã có sẵn bản CV xin việc từ máy tính của bạn, bạn chỉ cần upload CV lên và xác nhận email là hoàn thiện quá trình đăng ký</span>
                                       </p>
                                     </div>
                                     <uv>
                                     </uv>
                                 </div>
                                 <!-- <div class="c_xt_right col-md-4 col-12 col-xs-12">
                                     <div class="xt_right_tit" style="background: #f05e5e;padding: 0; text-align:center;border: none;border-radius: 7px">
                                         <a href="up-load-cv.html" style="color:#fff!important">Tạo CV từ timviec365.com</a>
                                     </div>
                                     <div class="cap_nhat_main">
                                       <p>
                                         Tạo CV từ timviec365.vn: <span>Bạn có thể lựa chọn hơn 1000 mẫu CV xin việc ấn tượng của chúng tôi để tạo CV cho riêng bạn. Chỉnh sửa xong bạn nhớ ấn nút lưu CV và sau đó là xác nhận email hoàn tất quá trình đăng ký; CV bạn tạo có thể dùng để nộp hồ sơ, tải về máy cá nhân, in mang đi nộp cho Nhà tuyển dụng, ...</span>
                                       </p>
                                     </div>
                                     <uv>
                                     </uv>
                                 </div> -->
                             </div>
                         </content>
                  </div>
               </div>
            </main>
         </section>
         <? include("../includes/inc_footer.php") ?>
      </div>
      <? include("../includes/inc_script_footer.php") ?>
   </body>
</html>