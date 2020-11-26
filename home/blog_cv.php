<? 
include("config.php"); 
$page  = getValue('page','int','GET',0);
$page  = intval(@$page);

if($page == 1)
{
   redirect('/bi-quyet-viet-cv.html');
}
if($page == 0)
{
   $page = 1;
}
$curentPage = 11;
$pageab = abs($page - 1);
$start = $pageab * $curentPage;
$start = intval(@$start);
$start = abs($start);

$db_seo = new db_query("SELECT * FROM seo_tt WHERE name_page = 'bi-quyet-cv'");
$row_seo = mysql_fetch_assoc($db_seo->result);

$urlcano = 'https://timviec365.com/bi-quyet-viet-cv.html';

// $h1 = $row_seo['seo_h1'];
$h1 = "Bí quyết viết CV ấn tượng nhất!";

if ($row_seo['seo_tt'] != '') {
    $title = $row_seo['seo_tt'];
}else{
    $title = 'Trang cẩm nang bí quyết CV xin việc | Timviec365.com';
}
$index = "noodp,index,follow";
?>
<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="UTF-8">
		<link rel="canonical" href="<?= $urlcano?>" />
		<meta name="p:domain_verify" content=""/>
		<link href="" rel="shortcut icon"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<title><?=$title ?></title>
		<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui"/>
		<meta name="description" content="<?=$row_seo['seo_des'] ?>"/>
		<meta name="Keywords" content="<?=$row_seo['seo_key'] ?>"/>

		<meta name="robots" content="<?=$index?>"/>
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="<?=$title ?>" />
		<meta property="og:description" content="<?=$row_seo['seo_des'] ?>" />
		<meta property="og:site_name" content="tìm việc làm" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:description" content="<?=$row_seo['seo_des'] ?>" />
		<meta name="twitter:title" content="<?=$title ?>" />
		<link rel='dns-prefetch' href='//fonts.googleapis.com' />
		<link rel='dns-prefetch' href='//s.w.org' />
		<link rel="stylesheet" href="/css/font-awesome.min.css" onload="if(media!='all')media='all'">
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
			<div id="banner_cv" class="main text-center">
				<h1><?=$h1?></h1>
				<?include('../includes/blog/inc_blog_search.php');?>
			</div>
		</header>
		<div class="breakcrumb blog">
			<ul>
				<li><a href="/">Trang chủ</a></li>
				<li><a href="/blog">Blog</a></li>
				<li class="active"><span>Bí quyết viết CV</span></li>
			</ul>
		</div>
		<div class="main_show main cv">
			<div class="main_top main">
				<div class="top">
			<?
			$db_qr = new db_query("SELECT * FROM news JOIN admin_user ON news.admin_id = admin_user.adm_id WHERE news.new_category_id = 2 ORDER BY news.new_id DESC LIMIT ".$start.",".$curentPage." ");
			$i = 0;
			while($row = mysql_fetch_array($db_qr->result)){
				if ($row['new_title_rewrite'] != '') {
				    $title_news = $row['new_title_rewrite'];
				}else{
				    $title_news = $row['new_title'];
				}
				if($i < 3){
			?>
			<div class="item top">
				<a href="<?=rewriteBlog($row['new_id'],$title_news)?>" class="img"><img src="/images/load.gif" class="lazyload" data-src="https://timviec365.com/pictures/news/<?=$row['new_picture'] ?>" alt="<?=$row['new_title']?>"></a>
				<a href="<?=rewriteBlog($row['new_id'],$title_news)?>"><h2 class="cate_title"><?=$row['new_title']?></h2></a>
			</div>
			<?
				}
				else{
					if($i == 3) echo '</div></div><p class="td">BÍ QUYẾT VIẾT CV</p>';
			?>
			<div class="item bottom">
				<a href="<?=rewriteBlog($row['new_id'],$title_news)?>" class="img">
					<img src="/images/load.gif" class="lazyload" data-src="https://timviec365.com/pictures/news/<?=$row['new_picture'] ?>" alt="<?=$row['new_title']?>">
				</a>
				<a href="<?=rewriteBlog($row['new_id'],$title_news)?>"><h2 class="cate_title"><?=$row['new_title']?></h2></a>
				<p class="author_bl"><a href="<?= rewriteTacgia($row['adm_id'],$row['adm_name']); ?>"><?= $row['adm_name']?></a> <?= date('d - m - Y',$row['new_date']) ?></p>
				<div class="cate_sapo">
					<?=$row['new_des']?>
				</div>
			</div>
			<?
				}
				$i++;
			}
			unset($db_qr,$row);
			?>
			<div class="pagination_wrap cv text-right clr">
				<div class="clr">
			 	<?
				 	$db_qr = new db_query("SELECT count(*) FROM news JOIN admin_user ON news.admin_id = admin_user.adm_id WHERE news.new_category_id = 2");
				 	$row = mysql_fetch_assoc($db_qr->result);
				 	$count = $row['count(*)'];
					$domain = $_SERVER['REQUEST_URI'];
					$domain = str_replace("?page=".$page, "", $domain);
					$domain = str_replace("&page=".$page, "", $domain);
					$domain = str_replace("page=".$page, "", $domain);
					echo generatePageBar2('',$page,$curentPage,$count,$domain,'?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
				  ?>
			  	</div>
			</div>
			<? include('../includes/blog/inc_best_view.php') ?>
			<? include('../includes/blog/inc_blog_hot.php') ?>
		</div>
		<? include('../includes/inc_footer.php'); ?>
		<? include('../includes/inc_script_footer.php') ?>
	</body>
	
</html>