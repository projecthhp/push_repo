<?
include("config.php");
$alias_cv = '';

if (isset($_GET['alias_cv'])) {
  $alias_cv = $_GET['alias_cv'];
  $alias_cv = replaceMQ($alias_cv);
}
$id        = getValue("id","str","GET","0");
$id         = replaceMQ($id);

$code         = getValue("code","str","GET","");
$code         = replaceMQ($code);

if ($id !=0 && $code != ""){
  $db_qr = new db_query("SELECT use_mail,use_name,use_city FROM user  WHERE use_id = ".$id." AND use_authentic = 0 ");
  $row_uv_a   = mysql_fetch_assoc($db_qr->result);
  if(empty($row_uv_a)){
    redirect("/thong-tin-tai-khoan-ung-vien.html");
  }
  if(mysql_num_rows($db_qr->result) > 0){

    $email = $row_uv_a['use_mail'];
    if($code == md5($email)){
      $updata = new db_execute("UPDATE user SET use_authentic = 1 WHERE use_id = ".$id);
      if ($alias_cv !='') {
        redirect('/tao-cv-online/'.$alias_cv.'.html');
      }else{
        $txt_cv = "Tạo CV Online";
        $url_cv = "/mau-cv.html";
      }
    }else{
      redirect("/");
    }
  }
  else{

    redirect("/");
  }
}
else{
  redirect("/");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
  <title>Thông tin ứng viên</title>
  <meta name="descripton" content="Đăng ký ứng viên. Tìm việc làm nhanh chóng, hiệu quả nhất,  đăng tin tìm việc làm tốt 24h, tuyển dụng việc làm tất cả ngành nghề nhanh nhất, tìm kiếm việc làm tại Timviec365.vn"/>
  <meta name="Keywords" content="tim viec lam, viec lam nhanh, tìm việc làm nhanh, tuyển dụng việc làm, tuyen dung, kiem viec lam, tim viec lam, tim viec">
  <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui">
  <meta name="robots" content="noodp,noindex,nofollow"/>
  <link rel="stylesheet" href="/css/font-awesome.min.css" media='all' onload="if(media!='all')media='all'">
  <link rel="stylesheet" href="/css/style_candi_manager.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->
</head>
<body class="manager">
  <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<? require('../includes/inc_menu_uv.php') ?>
<div class="main_right">
  <? include('../includes/inc_header_candi_manager.php') ?>


<div class="right confirm text-center">
  <img src="/images/load.gif" class="lazyload" data-src="/images/qc_5.png" alt="Confirm">
  <div class="first">XÁC THỰC EMAIL THÀNH CÔNG</div>
  <p>Xin chào <b class="Medium name"><?=$row_uv_a['use_name']?></b></p>
  <p class="p">Tài khoản đăng nhập của bạn đã được xác thực email thành công trên Timviec365.com</p>
  <p class="p">Timviec365.com cung cấp hàng triệu việc làm tại Việt Nam và hoàn toàn <b>MIỄN PHÍ</b></p>
  <p class="p">Chúc bạn sớm tìm được công việc mong muốn !!!</p>
  <p class="p">Hãy bắt đầu khám phá thế giới việc làm của Timviec365.com ngay !!</p>
  <ul>
  <li class="search_job"><a href="/">Tìm việc làm</a></li>
  <li class="complete_profile"><a href="/ung-vien/ho-so-online.html">Hoàn thiện hồ sơ</a></li>
  <li class="create_cv"><a href="<?=$url_cv?>"><?=$txt_cv?></a></li>
  </ul>
</div>
</div>

<?include('../includes/inc_chuyenvienmb.php');?>
</section>
<?
include('../includes/inc_footer.php');
include('../includes/inc_script_footer.php');
?>
<script async src="/js/js_manager_uv.js?v=<?=$version?>"></script>
</body>