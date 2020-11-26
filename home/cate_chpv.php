<? 
include("config.php"); 
$catid = getValue("catid","str","GET",'');

$page  = getValue('page','int','GET',1,2);
$page  = intval(@$page);
$curentPage = 10;
$pageab = abs($page - 1);
$start = $pageab * $curentPage;
$start = intval(@$start);
$start = abs($start);
if($page == 0)
{
   $page = 1;
}

else
{
   $db_qrcat = new db_query("SELECT * FROM tbl_chpv WHERE ch_alias = '".$catid."' LIMIT 1");
   if(mysql_num_rows($db_qrcat->result)==0){
   	redirect('/home/404.php');
   }
   $rowcat = mysql_fetch_assoc($db_qrcat->result);
}

$urlcano =  "https://timviec365.com/cau-hoi-phong-van/".$catid.".html";
if($rowcat['meta_tit']!=''){
	$title = $rowcat['meta_tit'];
}else{
	$title = "Câu hỏi phỏng vấn";
}

if($rowcat['meta_des']!=''){
	$description = $rowcat['meta_des'];
}else{
	$description = "";
}

if($rowcat['meta_key']!=''){
	$keywords = $rowcat['meta_key'];
}else{
	$keywords = "";
}
$index = "noodp,noindex,nofollow";
$h1 = "Timviec365.com giúp bạn tự tin trả lời phỏng vấn";
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
		<meta property="og:site_name" content="Timviec365.com" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:description" content="<?=$description ?>" />
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
			<div id="banner_cv" class="main text-center category">
				<h1><?=$h1?></h1>
				<?include('../includes/blog/inc_blog_search.php');?>
			</div>
		</header>
		<div class="breakcrumb blog bg_mota chpv">
			<ul>
				<li><a href="/">Trang chủ</a></li>
				<li><a href="/blog">Blog</a></li>
				<li><a href="/cau-hoi-phong-van">Câu hỏi phỏng vấn</a></li>
				<li class="active"><a><?=$rowcat['ch_name']?></a></li>
			</ul>
		</div>
		<div class="box_cate_chpv">
			<div class="right">
				<div class="main menu_chpv">
					<?
					$db_qr = new db_query("SELECT ch_alias,ch_name FROM tbl_chpv");
					While($row = mysql_fetch_assoc($db_qr->result)){
						$link = '/cau-hoi-phong-van/'.$row['ch_alias'].".html";
					?>
					<div class="item_menu main">
						<i class="fa fa-angle-right" aria-hidden="true"></i><a href="<?=$link?>"><?=$row['ch_name']?></a>
					</div>
					<?
					}
					unset($db_qr,$row,$link);
					?>
				</div>
			</div>
			<div class="maincate_chpv">
				<?
				$db_qrs = new db_query("SELECT new_id,new_title,new_title_rewrite,new_picture,new_des,new_date FROM new_chpv WHERE new_category_id = ".$rowcat['ch_id']." ORDER BY new_date DESC LIMIT ".$start.",".$curentPage);
				While ($rows = mysql_fetch_assoc($db_qrs->result)) {
					if($rows['new_title_rewrite']!=''){
						$title_new = $rows['new_title_rewrite'];
					}else{
						$title_new = replaceTitle($rows['new_title']);
					}
					$url = "/cau-hoi-phong-van/".$title_new."-pv".$rows['new_id'].".html";
				?>
				<div class="item main">
					<div class="images"><img src="/images/load.gif" class="lazyload" data-src="/pictures/news/<?=$rows['new_picture']?>" alt="<?=$rows['new_title']?>"></div>
					<div class="content">
						<a href="<?=$url?>" class="title_catech"><?=$rows['new_title']?></a>
						<p class="time_ch"><i class="fa fa-clock-o" aria-hidden="true"></i> <?=date('d - m - Y',$rows['new_date'])?></p>
						<div class="sapo_ch">
							<?=$rows['new_des']?>
						</div>
						<a href="<?=$url?>" class="box_showmore">
							Xem chi tiết <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
						</a>
					</div>
				</div>
				<?
				}
				unset($db_qrs,$rows,$new_title,$url);
				?>
				<div class="pagination_wrap cv text-left clr">
					<div class="clr">
				 	<?
					 	$db_qr = new db_query("SELECT count(*) FROM new_chpv WHERE new_category_id = ".$rowcat['ch_id']." ");
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
			</div>
			<div class="right">
				<div class="main main_right">
					<div class="head">
						<h2 class="headding_bm">Câu hỏi tuyển dụng tiêu biểu</h2>
						<!-- <i class="fa fa-folder-open" aria-hidden="true"></i> -->
					</div>
					<ul>
						<?
						$db_qr = new db_query("SELECT new_id, new_title, new_title_rewrite FROM new_chpv ORDER BY new_view DESC LIMIT 6");
						While($row = mysql_fetch_assoc($db_qr->result)){
							if($row['new_title_rewrite']!=''){
								$title_new = $row['new_title_rewrite'];
							}else{
								$title_new = replaceTitle($row['new_title']);
							}
							$url = "/cau-hoi-phong-van/".$title_new."-pv".$row['new_id'].".html";
						?>
						<li><a href="<?=$url?>"><?=$row['new_title']?></a></li>
						<?}
						unset($db_qr,$row);
						?>
					</ul>
				</div>
			</div>
		</div>
		<? include('../includes/inc_footer.php'); ?>
		<? include('../includes/inc_script_footer.php') ?>
	</body>
	
</html>