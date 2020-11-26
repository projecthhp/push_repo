<? 
include("config.php"); 
$catid = getValue("catid","int","GET",0);
$catid = (int)$catid;
if($catid == 2){
	header("HTTP/1.1 301 Moved Permanently"); 
	header("Location: /bi-quyet-viet-cv.html");
	exit();
}
$page  = getValue('page','int','GET',1,2);
$page  = intval(@$page);
$curentPage = 14;
$pageab = abs($page - 1);
$start = $pageab * $curentPage;
$start = intval(@$start);
$start = abs($start);
$url_query ='';
if($page == 0)
{
   $page = 1;
}
if($page > 1)
{
  $url_query = "?page=".$page;
}
if($catid == 0)
{
   redirect("/blog");
} 
else
{
   $db_qrcat = new db_query("SELECT `cat_id`, `admin_id`, `cat_name`, `cat_title`, `cat_keyword`, `cat_name_rewrite`, `cat_picture`, `cat_description`, `cat_active`,`cat_link` FROM categories_multi WHERE cat_id = ".$catid." LIMIT 1");
   $rowcat = mysql_fetch_assoc($db_qrcat->result);
}
$urlcano = "https://timviec365.com/blog/c".$rowcat['cat_id']."/".replaceTitle($rowcat['cat_link']);

if ($rowcat['cat_title'] != '') {
    $title = $rowcat['cat_title'];
}else{
    $title = $rowcat['cat_name'];
}

if ($rowcat['cat_keyword'] != '') {
    $keywords = $rowcat['cat_keyword'];
}else{
    $keywords = ""; //đợi anh Đạt
}

if ($rowcat['cat_description'] != '') {
    $description = $rowcat['cat_description'];
}else{
    $description = ""; //đợi anh Đạt
}

if($rowcat['cat_active'] == 1 && $page == 1){
	$index = "noodp,index,follow";
}else{
	$index = "noodp,noindex,nofollow";
}
$h1 = 'Bí quyết tìm việc làm nhanh chóng - hiệu quả';
$bg_mota = '';
if($catid == 53){
	$h1 = 'mô tả chính xác nhất công việc của bạn!';
	$rowcat['cat_name'] = 'Mô tả công việc';
	$bg_mota = 'bg_mota';
}
if($catid == 3){
	$bg_mota = 'bg_bm';
	$h1 = "Timviec365.com cung cấp trên 236000 TÀI LIỆU MIỄN PHÍ";
}
$url_check = "/blog/c".$rowcat['cat_id']."/".replaceTitle($rowcat['cat_link']).$url_query;
$urluri = $_SERVER['REQUEST_URI'];

if($url_check != $urluri)
{
   header("HTTP/1.1 301 Moved Permanently"); 
   header("Location: $url_check");
   exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link rel="canonical" href="<?= $urlcano?>" />
		<meta name="p:domain_verify" content=""/>
		<link href="" rel="shortcut icon"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title><?=$title ?></title>
		<meta name="description" content="<?= $description ?>"/>
		<meta name="keywords" content="<?= $keywords ?>"/>
		
		<meta name="robots" content="<?=$index?>"/>
		
		<meta property="og:locale" content="vi_VN" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="<?=$title ?>" />
		<meta property="og:description" content="<?=$description ?>" />
		<meta property="og:site_name" content="tìm việc làm" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:description" content="<?=$description ?>" />
		<meta name="twitter:title" content="<?=$title ?>" />
		<link rel='dns-prefetch' href='//fonts.googleapis.com' />
		<link rel='dns-prefetch' href='//s.w.org' />
		<link rel="stylesheet" href="/css/font-awesome.min.css" onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/slick-theme.css" media='all' onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/slick.css" media='all' onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/style.min.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
		<meta name="google-site-verification" content="EIV7wHDvaTZkVpsLjmM4_neYDyPLTmjV9du0A8ho4TU" />
		<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->
		
	</head>
	<body class="blog">
		<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
		<header>
			<?include('../includes/blog/inc_header.php');?>
			<div id="banner_cv" class="main text-center category">
				<h1><?=$h1?></h1>
				<?include('../includes/blog/inc_blog_search.php');?>
			</div>
		</header>
		<div class="breakcrumb blog <?=$bg_mota?>">
			<ul>
				<li><a href="/">Trang chủ</a></li>
				<li><a href="/blog">Blog</a></li>
				<li class="active"><span><?= $rowcat['cat_name'] ?></span></li>
			</ul>
		</div>
		<?
			if($catid == 53){
				include('../includes/blog/inc_main_mota.php');
			}else if($catid == 3){
				include('../includes/blog/inc_main_bieumau.php');
			}else{
				include('../includes/blog/inc_main_category.php');
			}
		?>		
		<? include('../includes/inc_footer.php'); ?>
		<? include('../includes/inc_script_footer.php') ?>
		<?
		if($catid != 53){
		?>
		<script>
			$(document).ready(function(){
				width = $(window).width();
				if(width <= 480){
					$(window).scroll(function(){
						if($(this).scrollTop() > 80){
							if($('.main_show.category .main_top .main_slick').hasClass('slick') == false){
								$('.main_show.category .main_top .main_slick').addClass('slick');
								$('.main_slick').slick();
							}
						}
					});
				}
			});
		</script>
		<?}?>
	</body>
</html>