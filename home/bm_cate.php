<?
include("config.php"); 
$alias = getValue("cate_alias","str","GET",'');
$alias = trim($alias);

$page  = getValue('page','int','GET',1,2);
$page  = intval(@$page);
$curentPage = 9;
$pageab = abs($page - 1);
$start = $pageab * $curentPage;
$start = intval(@$start);
$start = abs($start);
if($page == 0)
{
   $page = 1;
}
$index = "noodp,noindex,nofollow";
$bg_mota = 'bg_mota';
$h1 = "Timviec365.com cung cấp trên 236000 TÀI LIỆU MIỄN PHÍ";
$db_qrs = new db_query("SELECT cate_name, cate_alias FROM cate_bieumau WHERE cate_alias = '".$alias."'");
$rows = mysql_fetch_assoc($db_qrs->result);
$db_qrbm = new db_query("SELECT * FROM cate_bieumau JOIN news ON cate_bieumau.cate_id = news.new_cate_bm JOIN admin_user ON news.admin_id = admin_user.adm_id WHERE cate_bieumau.cate_alias = '".$alias."' LIMIT ".$start.",".$curentPage." ");
// if(mysql_num_rows($db_qrbm->result)==0){
// 	redirect('/blog/c3/bieu-mau');
// }
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
		
		<meta property="og:locale" content="en_US" />
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
		<div class="breakcrumb blog">
			<ul>
				<li><a href="/">Trang chủ</a></li>
				<li><a href="/blog">Blog</a></li>
				<li><a href="/blog/c3/bieu-mau">Biểu mẫu</a></li>
				<li class="active"><span><?=$rows['cate_name']?></span></li>
			</ul>
		</div>
		<div class="main_show main main_bieumau cate">
			<div class="right">
				<?include('../includes/blog/inc_menu_bm.php')?>
			</div>
			<div class="left" <?= (mysql_num_rows($db_qrbm->result)==0)?'style="clear:both"':"" ?>>
				<?
				While($row = mysql_fetch_assoc($db_qrbm->result)){
					if($row['new_title_rewrite']!=''){
						$title_new = $row['new_title_rewrite'];
					}else{
						$title_new = replaceTitle($row['new_title']);
					}
				?>
					<div class="item_bm">
						<div class="images">
							<img src="/pictures/news/<?=$row['new_picture']?>" alt="<?=$row['new_title']?>">
							<div class="view">
								<i class="fa fa-eye" aria-hidden="true"></i>
								<?=$row['new_view']?>
							</div>
						</div>
						<a href="<?= rewriteTacgia($row['adm_id'],$row['adm_name']); ?>" class="author_bm"><?=$row['adm_name']?></a>
						<a href="<?=rewriteBlog($row['new_id'],$title_new)?>" class="title_bm"><?=$row['new_title']?></a>
						<div class="sapo_bm">
							<?=$row['new_des']?>
						</div>
						<div class="link_detailBm"><a href="<?=rewriteBlog($row['new_id'],$title_new)?>">Xem biểu mẫu<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
					</div>
				<?}?>
				<div class="pagination_wrap cv text-right clr">
				      <div class="clr">
				      <?
				      	$db_count = new db_query("SELECT count(*) FROM cate_bieumau JOIN news ON cate_bieumau.cate_id = news.new_cate_bm JOIN admin_user ON news.admin_id = admin_user.adm_id WHERE cate_bieumau.cate_alias = '".$alias."' LIMIT ".$start.",".$curentPage." ");
				      	$count = mysql_fetch_assoc($db_count->result);
						$count = $count['count(*)'];
						$domain = $_SERVER['REQUEST_URI'];
						$domain = str_replace("?page=".$page, "", $domain);
						$domain = str_replace("&page=".$page, "", $domain);
						$domain = str_replace("page=".$page, "", $domain);
						echo generatePageBar2('',$page,$curentPage,$count,$domain,'?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
				      ?>
				      </div>
				   </div>
			</div>
			<div class="right">
				<?include('../includes/blog/inc_right_bm.php')?>
			</div>
		</div>
		<? include('../includes/inc_footer.php'); ?>
		<? include('../includes/inc_script_footer.php') ?>
	</body>
</html>