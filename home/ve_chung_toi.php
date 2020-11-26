<? 
include("config.php"); 

$db_seo = new db_query("SELECT * FROM seo_tt WHERE name_page = 'vct'");
$row_seo = mysql_fetch_assoc($db_seo->result);
$index = "index,follow";
?>
<!doctype html>
<html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js">
   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
      <link rel="canonical" href="https://timviec365.com/ve-chung-toi.html" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title><?=$row_seo['seo_tt'] ?></title>
      <meta name="description" content="<?=$row_seo['seo_des'] ?>"/>
      <meta name="Keywords" content="<?=$row_seo['seo_key'] ?>"/>
      <meta name="robots" content="<?=$index?>"/>

      <link rel="stylesheet" href="/css/font-awesome.min.css" media='all' onload="if(media!='all')media='all'">
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
      <meta name="google-site-verification" content="EIV7wHDvaTZkVpsLjmM4_neYDyPLTmjV9du0A8ho4TU" />

   </head>
   <body class="lienhe vechungtoi">
      <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
      <header>
      <?include('../includes/inc_header.php')?>
         <div id="banner">
            <h1 class="banner_heading">Timviec365.com - Giải pháp việc làm kết nối người tìm việc với doanh nghiệp tốt nhất</h1>
         </div>
      </header>
          <div class="main_vct">
         <div class="top">
            <div class="img">
               <img class="lazyload" src="/images/load.gif" data-src="/images/img_vct.png" alt="VCT 1">
            </div>
             <div class="top_right">
                <h2 class="heading_vct">CHÚNG TÔI LÀ AI?</h2>
                <div class="nd">Timviec365.com là tập hợp của những thành viên trẻ, tài năng, tràn trề nhiệt huyết, máu lửa và khát khao cống hiến. Chúng tôi yêu thích công việc có thể tạo ra các sản phẩm việc làm uy tín và review công ty hiện đại giúp mọi người tìm được việc làm phù hợp cùng nơi làm việc tuyệt vời</div>
             </div>
             <div class="bot_right">
                <h2 class="heading_vct">CHÚNG TÔI MANG LẠI ĐIỀU GÌ?</h2>
                <div class="nd">
                  <p><span>Người tìm việc: </span>Tìm được công việc phù hợp nhất, giúp cuộc sống trở nên hạnh phúc hơn. Tìm được kiến thức lộ trình học tập phát triển của bản thân. Tìm được nơi tư vấn, hỗ trợ, hỏi đáp</p>
                  <p><span>Nhà tuyển dụng: </span>Tuyển dụng, kết nối những nhân sự tốt, phù hợp về: đạo đức, chuyên môn, cùng mục tiêu, kết nối với ứng viên tiện lợi và nhanh chóng</p>
                  <p><span>Xã hội: </span>Giúp cho con người hạnh phúc vì tìm được đam mê của mình trong công việc, tiết kiệm thời gian cho tất cả mọi người kết nối với nhau</p>
               </div>
             </div>
         </div>
         <div class="csat">
            <h2 class="heading_vct text-center">Những con số ấn tượng </h2>
            <div class="main_csat">
               <div class="item">
                  <a class="thongso">1.000.000+</a>
                  <p class="note">Lượt truy cập hàng tháng</p>
               </div>
            <div class="item">
                 <a class="thongso">2000+</a>
                 <p class="note">Thành viên mới tạo tài khoản mỗi ngày</p>
               </div>
               <div class="item">
                  <a class="thongso">500.000+</a>
                  <p class="note">Ứng viên sử dụng công cụ tạo CV xin việc online</p>
               </div>
               <div class="item">
                  <a class="thongso">2.500 +</a>
                  <p class="note">Đối tác sử dụng dịch vụ, đăng tin tuyển dụng</p>
               </div>
            </div>
         </div>
         <div class="box_vct">
            <h2 class="text-center heading_vct">Về chúng tôi </h2>
            <div class="item tamnhin">
               <div class="img text-center">
                  <img src="/images/vct1.png" alt="vct">
               </div>
               <div class="nd">
                  <h3 class="h3"><i class="icon"></i>tầm nhìn</h3>
                  <ul>
                     <li><i class="fa fa-check" aria-hidden="true"></i><a>Trở thành một trang mạng xã hội chuyên hỗ trợ và cung cấp tiện ích kép là tìm việc và tuyển dụng</a></li>
                     <li><i class="fa fa-check" aria-hidden="true"></i><a>Vừa đáp ứng nhu cầu tìm kiếm việc làm của các ứng viên lại vừa thỏa mãn nhu cầu từ phía nhà tuyển dụng</a></li>
                     <li><i class="fa fa-check" aria-hidden="true"></i><a>Thúc đẩy sự phát triển hơn nữa cho trang web</a></li>
                  </ul>
               </div>
            </div>
            <div class="item sumenh">
               <div class="img text-center">
                  <img src="/images/su_menh.png" alt="vct">
               </div>
               <div class="nd">
                  <h3 class="h3"><i class="icon"></i>Sứ mệnh</h3>
                  <ul>
                     <li><i class="fa fa-check" aria-hidden="true"></i><a>Cung cấp những tin tức về dịch vụ tư vấn tuyển dụng, các thông tin việc làm từ các nguồn tin chính thống, đảm bảo chính xác, chất lượng cho ứng viên và nhà tuyển dụng</a></li>
                     <li><i class="fa fa-check" aria-hidden="true"></i><a>Cam kết sẽ trở thành một người bạn đồng hành đáng tin cậy nhất với các đối tác</a></li>
                     <li><i class="fa fa-check" aria-hidden="true"></i><a>Thúc đẩy sự phát triển hơn nữa cho trang web</a></li>
                     <li><i class="fa fa-check" aria-hidden="true"></i><a>Xây dựng môi trường làm việc chuyên nghiệp, năng động, sáng tạo và cơ hội phát triển công bằng cho tất cả nhân viên</a></li>
                     <li><i class="fa fa-check" aria-hidden="true"></i><a>Đóng góp tích cực vào các hoạt động hướng nghiệp, hỗ trợ tuyển dụng, giới thiệu việc làm cho ứng viênb</a></li>
                  </ul>
                  </div>
            </div>
            <div class="item giatri">
                  <div class="img text-center">
                     <img src="/images/cot_loi.png" alt="vct">
                  </div>
                  <div class="nd">
                     <h3 class="h3"><i class="icon"></i>giá trị cốt lõi</h3>
                     <ul>
                        <li><i class="fa fa-check" aria-hidden="true"></i><a>Cung cấp những tin tức về dịch vụ tư vấn tuyển dụng, các thông tin việc làm từ các nguồn tin chính thống, đảm bảo chính xác, chất lượng cho ứng viên và nhà tuyển dụng</a></li>
                        <li><i class="fa fa-check" aria-hidden="true"></i><a>Cam kết sẽ trở thành một người bạn đồng hành đáng tin cậy nhất với các đối tác</a></li>
                        <li><i class="fa fa-check" aria-hidden="true"></i><a>Thúc đẩy sự phát triển hơn nữa cho trang web</a></li>
                        <li><i class="fa fa-check" aria-hidden="true"></i><a>Xây dựng môi trường làm việc chuyên nghiệp, năng động, sáng tạo và cơ hội phát triển công bằng cho tất cả nhân viên</a></li>
                        <li><i class="fa fa-check" aria-hidden="true"></i><a>Đóng góp tích cực vào các hoạt động hướng nghiệp, hỗ trợ tuyển dụng, giới thiệu việc làm cho ứng viênb</a></li>
                     </ul>
                  </div>  
            </div>
         </div>
         <div class="box_tienich">
            <h2 class="heading_vct text-center">tiện ích website</h2>
            <p class="text-center txt1">Nền tảng và giải pháp việc làm thời 4.0 kết nối người tìm việc và nhà tuyển dụng</p>
            <div class="main_tienich">
               <div id="img-xs"><img src="/images/vct5.png" alt="vct 5"></div>
               <div class="item" id="tienich_timvieclam">
                  <h3 class="h3">Tìm Việc làm</h3>
                  <ul>
                     <li><i class="icon"></i><a>Tìm kiếm việc làm uy tín, chất lượng, thu nhập cao.</a></li>
                     <li><i class="icon"></i><a>Đa dạng tin tuyển dụng việc làm từ các công ty, doanh nghiệp hàng đầu.</a></li>
                     <li><i class="icon"></i><a>Dễ dàng ứng tuyển vị trí công việc phù hợp</a></li>
                  </ul>
               </div>
               <div class="item" id="tienich_hsuv">
                  <h3 class="h3">Hồ sơ ứng viên</h3>
                  <ul>
                     <li><i class="icon"></i><a>Tìm kiếm ứng viên nhanh chóng, chất lượng, đáp ứng tốt nhất nhu cầu tuyển dụng</a></li>
                     <li><i class="icon"></i><a>Đăng tin tuyển dụng hoàn toàn miễn phí. Tiếp cận tối đa lượng ứng viên.</a></li>
                  </ul>
               </div>
               <div class="clear"></div>
               <div class="item" id="tienich_camnang">
                  <h3 class="h3">Cẩm nang tìm việc</h3>
                  <ul>
                     <li><i class="icon"></i><a>Chia sẻ kinh nghiệm tìm việc trên các lĩnh vực khác nhau</a></li>
                     <li><i class="icon"></i><a>Kinh nghiệm chinh phục những buổi phỏng vấn dễ dàng nhất.</a></li>
                  </ul>
               </div>
               <div class="item" id="tienich_cv">
                  <h3 class="h3">CV xin việc</h3>
                  <ul>
                     <li><i class="icon"></i><a>Tạo CV xin việc online hoàn toàn miễn phí</a></li>
                     <li><i class="icon"></i><a>Công cụ tạo CV xin việc thông minh, dễ dàng sử dụng</a></li>
                     <li><i class="icon"></i><a>Hàng trăm mẫu CV theo ngành nghề, với 5 ngôn ngữ thiết kế chuyên nghiệp.</a></li>
                     <li><i class="icon"></i><a>Dễ dàng kết nối với nhà tuyển dụng phù hợp thông qua CV ấn tượng.</a></li>
                  </ul>
               </div>

            </div>
         </div>
         <div class="box-slide main">
            <h2 class="text-center heading_vct">Người dùng nói gì về timviec365.com</h2>
            <div class="main main_slide">
               <? for($i = 0; $i < 5; $i++){ ?>
               <div class="item">
                  <div class="img"><img src="/images/vct6.png" alt="1"></div>
                  <h3 class="h3">Trần Thanh Huyền</h3>
                  <div class="comment">
                     “Mình thấy ứng dụng khá hữu ích trong việc tìm kiếm một công việc phù hợp với bản thân, đặc biệt là trong lĩnh vực CNTT. Nhờ chức năng tìm kiếm công việc xung quanh mà mình đã tìm được một công việc phù hợp.”
                  </div>
                  <div class="text-center"><img src="/images/vct7.png" alt=""></div>
               </div>
               <?}?>
            </div>
         </div>
         <div class="main box_doitac">
            <h2 class="text-center heading_vct">đối tác của timviec365.com</h2>
            <div class="main_doitac">
            <div class="item"><img class="lazyload" src="/images/load.gif" data-src="/images/vingroup_tc.png" alt="Vingroup"></div>
				<div class="item"><img class="lazyload" src="/images/load.gif" data-src="/images/daichi_tc.png" alt="Daichi"></div>
				<div class="item"><img class="lazyload" src="/images/load.gif" data-src="/images/manulife_tc.png" alt="Manulife"></div>
				<div class="item"><img class="lazyload" src="/images/load.gif" data-src="/images/viettel_tc.png" alt="Viettel"></div>
				<div class="item"><img class="lazyload" src="/images/load.gif" data-src="/images/fpt_tc.png" alt="FPT"></div>
				<div class="item"><img class="lazyload" src="/images/load.gif" data-src="/images/sapo_tc.png" alt="Sapo"></div>
				<div class="item"><img class="lazyload" src="/images/load.gif" data-src="/images/doji_tc.png" alt="Doji"></div>
				<div class="item"><img class="lazyload" src="/images/load.gif" data-src="/images/j&t_tc.png" alt="J&T"></div>
            </div>
         </div>
      </div>
      <? include("../includes/inc_footer.php") ?>
      </div>
      <? include("../includes/inc_script_footer.php") ?>
      <script>
         $('.main_slide').slick({
            dots:false
         });
         width = $(window).width();
         if(width <= 480){
             $(".main_doitac").slick({
               infinite:true,
               slidesToShow:3,
               slidesToScroll:3,
               autoplay:true,
               speed:1000
            });
         }
      </script>
   </body>
</html>