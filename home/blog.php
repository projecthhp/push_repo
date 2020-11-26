<? 
include("config.php"); 
$db_seo = new db_query("SELECT * FROM seo_tt WHERE name_page = 'blog'");
$row_seo = mysql_fetch_assoc($db_seo->result);

$page  = getValue('page','int','GET',0);
$page  = intval(@$page);

if($page == 1)
{
   redirect('/blog');
}
if($page == 0)
{
   $page = 1;
}

$url_query= ($page > 1)?"?page=".$page:"";

$curentPage = 5;
$pageab = abs($page - 1);
$start = $pageab * $curentPage;
$start = intval(@$start);
$start = abs($start);

$urlcano = $domain.'/blog';

if ($row_seo['seo_tt'] != '') {
    $title = $row_seo['seo_tt'];
}else{
    $title = 'Trang cẩm nang tin tức của timviec365.com';
}

$urluri = $urlcano.$url_query;
$urlcheck = $domain.$_SERVER['REQUEST_URI'];

if($urlcheck != $urluri)
{
   header("HTTP/1.1 301 Moved Permanently"); 
   header("Location: $urluri");
   exit();
}
$index = ($page==1)?"noodp,index,follow":"noodp,noindex,nofollow";
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
		<meta property="og:locale" content="vi_VN" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="<?=$title ?>" />
		<meta property="og:description" content="<?=$row_seo['seo_des'] ?>" />
		<meta property="og:site_name" content="Timviec365.com" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:description" content="<?=$row_seo['seo_des'] ?>" />
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
		</header>
		<div class="breakcrumb blog">
			<ul>
				<li><a href="/">Trang chủ</a></li>
				<li class="active"><a><h1>Blog</h1></a></li>
			</ul>
		</div>
		<div class="home_blog main">
			<div class="left">
				<div class="box_news_new main">
					<div class="slick">
						<?
						$i = 0;
						$db_qr = new db_query("SELECT * FROM news JOIN admin_user ON news.admin_id = admin_user.adm_id WHERE news.new_category_id != 2 AND new_active = 1 ORDER BY news.new_id DESC LIMIT ".$start.",".$curentPage."");
						while($row_bl = mysql_fetch_array($db_qr->result)){
							if ($row_bl['new_title_rewrite'] != '') {
							    $title_news = $row_bl['new_title_rewrite'];
							}else{
							    $title_news = $row_bl['new_title'];
							}
							if($i < 3){
						?>
						<div class="item">
							<img data-src="https://timviec365.com/pictures/news/<?=$row_bl['new_picture'] ?>" class="lazyload" src="/images/lazyload.gif" alt="<?=$row_bl['new_title']?>">
							<div class="div_content">
								<span class="spannote">Tin mới</span>
								<a href="<?=rewriteBlog($row_bl['new_id'],$title_news)?>" class="title_bl"><?=$row_bl['new_title']?></a>
								<p class="author_bl">Tác giả: <a href="<?= rewriteTacgia($row_bl['adm_id'],$row_bl['adm_name']); ?>"><?= $row_bl['adm_name']?></a><?= date('d/m/Y',$row_bl['new_date']) ?></p>
							</div>
						</div>
						<?
						}
						else{
							if($i == 3) echo '</div><div class="bottom_news_new main">';
						?>
						<div class="item">
							<a href="<?=rewriteBlog($row_bl['new_id'],$title_news)?>" class="images">
								<img data-src="https://timviec365.com/pictures/news/<?=$row_bl['new_picture'] ?>" class="lazyload" src="/images/lazyload.gif" alt="<?=$row_bl['new_title']?>">
							</a>
							<a href="<?=rewriteBlog($row_bl['new_id'],$title_news)?>" class="title_bl"><?=$row_bl['new_title']?></a>
							<p class="author_bl">Tác giả: <a href="<?= rewriteTacgia($row_bl['adm_id'],$row_bl['adm_name']); ?>"><?= $row_bl['adm_name']?></a><?= date('d/m/Y',$row_bl['new_date']) ?></p>
						</div>
						<?
						}
							$i++;
							}
						?>
					</div>
					<div class="pagination_wrap cv text-right clr">
						<div class="clr">
						<?
							$numrow = new db_query("SELECT count(1) FROM news JOIN admin_user ON news.admin_id = admin_user.adm_id WHERE news.new_category_id != 2 AND new_active = 1");
							$count = mysql_fetch_assoc($numrow->result);
							$count = $count['count(1)'];
							$domain = $_SERVER['REQUEST_URI'];
							$domain = str_replace("?page=".$page, "", $domain);
							$domain = str_replace("&page=".$page, "", $domain);
							$domain = str_replace("page=".$page, "", $domain);
							echo generatePageBar2('',$page,$curentPage,$count,$domain,'?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
						?>
						</div>
					</div>
				</div>
				<?
				$array_cate = [
					['cate_name'=>'Bí quyết viết CV','id'=>'2','limit'=>'4','order'=>'first','link'=>'/bi-quyet-viet-cv.html'],
					['cate_name'=>'Cẩm nang tìm việc','id'=>'1','limit'=>'6','order'=>'second','link'=>'/blog/c1/cam-nang-tim-viec'],
					['cate_name'=>'Biểu mẫu','id'=>'3','limit'=>'5','order'=>'third','link'=>'/blog/c3/bieu-mau']
				];
				$j = 0;
				foreach ($array_cate as $key => $cate) {
				?>
				<div class="box_cate_blog main <?=$cate['order']?>">
					<div class="head main">
						<h2 class="head_blog"><?=$cate['cate_name']?></h2>
						<a class="pull-right showAllCate" href="<?=$cate['link']?>">Xem tất cả<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
					</div>
					<div class="main">
					<?
					$db_qr = new db_query("SELECT new_id, new_title, new_title_rewrite, new_picture,adm_id,adm_name,new_date,new_des FROM news JOIN admin_user ON news.admin_id = admin_user.adm_id WHERE news.new_category_id = ".$cate['id']." AND new_active = 1 ORDER BY news.new_id DESC LIMIT ".$cate['limit']."");
						While($row = mysql_fetch_assoc($db_qr->result)){
							if ($row['new_title_rewrite'] != '') {
							    $title_news = $row['new_title_rewrite'];
							}else{
							    $title_news = $row['new_title'];
							}
					?>
					<div class="item <?=($cate['order']==='first'&&$j==0)?"first_item":""?>">
						<a href="<?=rewriteBlog($row['new_id'],$title_news)?>" class="images">
							<img src="/images/load.gif" class="lazyload" data-src="https://timviec365.com/pictures/news/<?=$row['new_picture']?>" alt="<?=$row['new_title']?>">
						</a>
						<a href="<?=rewriteBlog($row['new_id'],$title_news)?>" class="title_bl"><?=$row['new_title']?></a>
						<?if($cate['order']==='first'&&$j!=0){
							echo '<p class="author_bl none_after_author">Tác giả: <a href="'.rewriteTacgia($row['adm_id'],$row['adm_name']).'">'.$row['adm_name'].'</a></p>
							<p class="time_blog"><i class="fa fa-clock-o" aria-hidden="true"></i>'.date('d - m - Y',$row['new_date']).
							'</p>';
						}else{
							echo '<p class="author_bl">Tác giả: <a href="'.rewriteTacgia($row['adm_id'],$row['adm_name']).'">'.$row['adm_name'].'</a>'.date('d - m - Y',$row['new_date']).'</p>';
						?>
						
						<?
						}?>
						<?if($cate['order']==='first' && $j==0 || $cate['order']==='third'){?>
						<div class="sapo_bl">
							<?=$row['new_des']?>
						</div>
						<?}?>
					</div>
					<?
						$j++;
						}
						unset($db_qr,$row);
					?>
					</div>
				</div>
				<?
				
				}
				?>
			</div>
			<div class="right">
				<form action="/search-blog" method="GET">
					<input type="text" placeholder="Search..." name="keyword">
					<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				</form>
				<div class="cate_blog main">
					<div class="head main">
						<h2 class="head_blog">Tiêu biểu tuần</h2>
					</div>
					<div class="main">
						<?
						$day = date('w');
						$week_start = strtotime('-'.$day.' days');
						$week_end = strtotime('+'.(6-$day).' days');
						$db_qr = new db_query("SELECT * FROM news JOIN admin_user ON news.admin_id = admin_user.adm_id WHERE new_date BETWEEN ".$week_start." AND ".$week_end." ORDER BY news.new_view DESC LIMIT 6");
						while($row_bl = mysql_fetch_array($db_qr->result)){
							if ($row_bl['new_title_rewrite'] != '') {
							    $title_news = $row_bl['new_title_rewrite'];
							}else{
							    $title_news = $row_bl['new_title'];
							}
						?>
						<div class="item main">
							<div class="images">
								<img src="/images/load.gif" class="lazyload" data-src="https://timviec365.com/pictures/news/<?=$row_bl['new_picture'] ?>" alt="<?=$row_bl['new_title'] ?>">
							</div>
							<a href="<?=rewriteBlog($row_bl['new_id'],$title_news)?>" class="title_bl"><?= $row_bl['new_title']?></a>
						</div>
						<?
						}
						?>
					</div>
				</div>
				<div class="category main">
					<div class="head main">
						<h2 class="head_blog">Chuyên mục</h2>
					</div>
					<div class="main_cate main">
						<div class="item-slick">
						<?
						$db_qrs = new db_query("SELECT `cat_id`, `cat_name`, `cat_title`,`cat_name_rewrite`,`cat_link`,`cat_count` FROM categories_multi ORDER BY cat_count DESC");
						$k = 1;
						While ($row = mysql_fetch_assoc($db_qrs->result)) {
							$url = ($row['cat_link']!='')?$row['cat_link']:replaceTitle($row['cat_name']);
							$url = "/blog/c".$row['cat_id']."/".$url;
						?>
						<div class="item main">
							<i class="fa fa-link" aria-hidden="true"></i>
							<a rel="nofollow" class="name_category" href="<?=$url?>"><?=$row['cat_name']?></a>
							<span class="count pull-right"><?=$row['cat_count']?></span>
						</div>
						<?
						if($k % 14 == 0){echo '</div><div class="item-slick">';}
						$k++;
						}
						?>
						</div>
					</div>
				</div>
				<div class="question main">
					<div class="head main">
						<h2 class="head_blog">Câu hỏi tuyển dụng</h2>
					</div>
					<div class="main_question main">
						<?
						$db_qr = new db_query("SELECT new_id, new_title, new_title_rewrite FROM new_chpv ORDER BY new_date DESC LIMIT 15");
						While ($row = mysql_fetch_assoc($db_qr->result)) {
							if ($row['new_title_rewrite'] != '') {
							    $title_news = $row['new_title_rewrite'];
							}else{
							    $title_news = $row['new_title'];
							}
							$url = "/cau-hoi-phong-van/".$title_news."-pv".$row['new_id'].".html";
						?>
						<div class="item main">
							<i class="icon"></i>
							<a class="name_category" href="<?=$url?>"><?=$row['new_title']?></a>
						</div>
						<?
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<? include('../includes/inc_footer.php'); ?>
		<? include('../includes/inc_script_footer.php') ?>
		<script>
			$( document ).ready(function() {
				$('.slick').slick({
					infinite: true,
					slidesToShow: 1,
					slidesToScroll: 1,
					dots:true
				});
				$('.main_cate').slick();
			});
		</script>
	</body>
	
</html>