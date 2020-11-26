<? 
include("config.php"); 

$db_seo = new db_query("SELECT * FROM seo_tt WHERE name_page = 'lh'");
$row_seo = mysql_fetch_assoc($db_seo->result);
$index = "noodp,index,follow";
?>
<!doctype html>
<html lang="vi" class="no-js">
   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
      <link rel="canonical" href="https://timviec365.com/lien-he" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title><?=$row_seo['seo_tt'] ?></title>
      <meta name="description" content="<?=$row_seo['seo_des'] ?>"/>
      <meta name="Keywords" content="<?=$row_seo['seo_key'] ?>"/>
      <meta name="robots" content="<?=$index?>"/>
      <link rel='dns-prefetch' href='//s.w.org' />
      <link rel="stylesheet" href="/css/font-awesome.min.css" media='all' onload="if(media!='all')media='all'">
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
   <body id="contact">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header>
      <? include('../includes/inc_header.php'); ?>
      <div id="banner">
        <h1 class="headding-tag">Liên hệ với timviec365.com</h1>
        <p><span>Địa chỉ: </span>Số 206 Định Công Hạ , Phường Định Công, Quận Hoàng Mai, Thành phố Hà Nội</p>
        <p><span>Email hỗ trợ: </span>Timviec365com@gmail.com</p>
      </div>
      </header>
      <div class="box_contact">
      <div class="main_contact">
        <div class="top">
          <div class="item hotline text-center">
            <a class="icon"><i class="fa"></i></a>
            <a class="name">Holine</a>
            <p class="infor"><span> 0971.335.869</span><span>024 36.36.66.99</span></p>
          </div>
          <div class="item fanpage text-center">
            <a class="icon"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a class="name">Fanpage</a>
            <p class="infor"><span>Theo dõi</span></p>
          </div>
          <div class="item youtube text-center">
            <a class="icon"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
            <a class="name">Youtube </a>
            <p class="infor"><span>Đăng ký</span></p>
          </div>
          <div class="item linkedin text-center">
            <a class="icon"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            <a class="name">Linkedin</a>
            <p class="infor"><span>Kết nối</span></p>
          </div>
          <div class="item pinterest text-center">
            <a class="icon"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
            <a class="name">pinterest</a>
            <p class="infor"><span>Kết nối</span></p>
          </div>
        </div>
        <div class="form">
          <p class="text-center td">gửi thông tin</p>
          <form onsubmit="return false">
            <div class="form-group">
              <input type="text" class="form-control" id="txtName" placeholder="Họ tên">
            </div>
            <div class="form-group">
              <input type="email" class="form-control" id="txtEmail" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" class="form-control Captcha" id="txtCaptcha" placeholder="Mã xác nhận"> <img src="/classes/securitycode.php" />
              </div>
              <div class="form-group full">
                <textarea class="form-control" rows="5" id="txtNoidung" placeholder="Nội dung" ></textarea>
              </div>
              <button type="submit" name="send" class="btn btn-primary"> Gửi </button>
              <h5 id="kq" style="color: red; display: inline-block;"></h5>
              <p id="txtUrl" style="visibility: hidden;"><?=$_SERVER['SERVER_NAME']; ?></p>
            </form>
          </div>              
          </div>
          
      </div>
      <div class="box_map">
        <p class="text-center td">Ghé thăm chúng tôi tại:</p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.216244101124!2d105.82254701403215!3d20.98396718602267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135acf4f519986f%3A0x4f06d8bb4745a590!2zMjA2IMSQ4buLbmggQ8O0bmcgSOG6oSwgxJDhu4tuaCBDw7RuZywgVGhhbmggWHXDom4sIEjDoCBO4buZaSwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1592991499152!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>


      
    </div>
  </div>
  <? 
      include("../includes/inc_footer.php");
      include("../includes/inc_script_footer.php");
    ?>
      <script type="text/javascript">
            $(document).ready(function(){
                $("button.btn-primary").click(function(){
                    $.post("../functions/contact1.php",
                    {
                      name: $("#txtName").val(),
                      phone: $("#txtPhone").val(),
                      mail: $("#txtEmail").val(),
                      nd: $("#txtNoidung").val(),
                      capcha: $("#txtCaptcha").val(),
                      url: $("#txtUrl").html()
                    },
                    function(data,status){
                        $("h5#kq").html(data);
                        $("#txtName").val("");
                        $("#txtPhone").val("");
                        $("#txtEmail").val("");
                        $("#txtNoidung").val("");
                        $("#txtCaptcha").val("");
                    });
                });
            });
          </script>
   </body>
</html>