<?
include("config.php");

$page  = getValue('page','int','GET',0);
$page  = intval(@$page);

if($page == 1)
{
   redirect('/');
}

if($page == 0)
{
   $page = 1;
}
$curentPage = 30;
$pageab = abs($page - 1);
$start = $pageab * $curentPage;
$start = intval(@$start);
$start = abs($start);
$time = time();

$url_query = '';
$trang = '';

if($page > 1)
{
   $trang = " - trang ".$page;
   $url_query = "?page".$page;
}
else
{
   $trang = '';
}

$domain = str_replace("?page=".$page, "", $domain);
$domain = str_replace("&page=".$page, "", $domain);
$domain = str_replace("page=".$page, "", $domain);

$db_seo = new db_query("SELECT * FROM seo_tt WHERE name_page = 'home'");
$row_seo = mysql_fetch_assoc($db_seo->result);
$index = ($page == 1)?"index,follow":"noindex,nofollow";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui"/>
		
	<link rel="canonical" href="<?= $domain ?>" />
	<meta name="p:domain_verify" content=""/>
	<link href="" rel="shortcut icon"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title><?=$row_seo['seo_tt'].$trang ?></title>
	<meta name="description" content="<?=$row_seo['seo_des'] ?>"/>
	<meta name="Keywords" content="<?=$row_seo['seo_key'] ?>"/>
	<meta name="robots" content="<?=$index?>"/>
	<meta property="og:locale" content="vi_VN" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?=$row_seo['seo_tt'] ?>" />
	<meta property="og:description" content="<?=$row_seo['seo_des'] ?>" />
	<meta property="og:site_name" content="Timviec365.com" />
	<meta property="og:image" content="<?=$domain?>/images/timviec365com.jpg"/>

	<meta name="twitter:card" content="summary" />
	<meta name="twitter:description" content="<?=$row_seo['seo_des'] ?>" />
	<meta name="twitter:title" content="<?=$row_seo['seo_tt'] ?>" />
	
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
	<body id="home">
		<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
		<header>
			<? include('../includes/inc_header.php') ?>
			<div id="banner">
				<? include('../includes/inc_search.php') ?>
				<div class="qr_app">
					<div class="app">
						<div class="right-top">
							<p>Quét mã QR</p><p>Tải app <span>Timviec365</span> ngay</p>
						</div>
						<div class="left">
							<img class="lazyload" src="/images/load.gif" data-src="/images/qr_app_job.png" alt="QR App">
						</div>
						<div class="link_app">
							<a rel="nofollow" href="https://play.google.com/store/apps/details?id=vn.hungha.timviec365_com"><i class="fa fa-android" aria-hidden="true"></i>Android</a>
							<a rel="nofollow" href="https://apps.apple.com/us/app/t%C3%ACm-vi%E1%BB%87c-l%C3%A0m-v%C3%A0-tuy%E1%BB%83n-d%E1%BB%A5ng-365/id1479360809?l=vi&ls=1"><i class="fa fa-apple" aria-hidden="true"></i>IOS</a>
						</div>
					</div>
					<div class="app">
						<div class="right-top">
							<p>Quét mã QR</p><p>Tải app <span>CV365</span> ngay</p>
						</div>
						<div class="left">
							<img class="lazyload" src="/images/load.gif" data-src="/images/qr_app_job.png" alt="QR App">
						</div>
						<div class="link_app">
							<a rel="nofollow" href="https://play.google.com/store/apps/details?id=vn.hungviet.cv365com"><i class="fa fa-android" aria-hidden="true"></i>Android</a>
							<a rel="nofollow" href="https://apps.apple.com/us/app/timviec365-com-cv-xin-vi%E1%BB%87c/id1513694297?l=vi#?platform=iphone"><i class="fa fa-apple" aria-hidden="true"></i>IOS</a>
						</div>
					</div>
				</div>
			</div>
		</header>
		<section class="box_main">
		<div id="company-hangdau">
			<div class="main">
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
		<div class="box_scroll">
			<a class="item" href="#jobhot" id="scroll_jobhot"><i></i></a>
			<a class="item" href="#joblc" id="scroll_joblc"><i></i></a>
			<a class="item" href="#jobnew" id="scroll_jobnew"><i></i></a>
		</div>
		<div class="box_hd" id="jobhot">
			<div class="main">
				<div class="tit">
					<div class="ir">
						<i class="ico"></i><h1 class="heading">Việc làm hấp dẫn</h1>
					</div>
				</div>
				<div class="slick_hd main_option1">
					<div class="page_slick">
						<?
						$i = 1;
						foreach ($db_hot as $key => $value) {
						?>
						<div class="item">
							<a class="logo">
								<img src="/images/load.gif" class="lazyload" data-src="<?= str_replace('../', 'https://timviec365.com/', geturlimageAvatar($value['usc_create_time']).$value['usc_logo'])  ?>" onerror='this.onerror=null;this.src="/images/logo-new.png";' alt="<?= $value['usc_company'] ?>">
							</a>
							<div class="right_item">
								<a href="<?= rewriteNews($value['new_id'],$value['new_title'],$value['new_alias']) ?>" class="title_new"><?= $value['new_title'] ?></a>
								<a href="<?= rewrite_company($value['usc_id'],$value['usc_company'],$value['usc_alias']) ?>" class="name_company"><?= name_company($value['usc_company']) ?></a>
								<p class="p_salary"><i class="salary"></i><?= $array_muc_luong[$value['new_money']]?></p>
								<p class="p_time"><i class="time"></i><?= date('d/m/Y',$value['new_han_nop']) ?></p>
							</div>
						</div>
						<?
						if($i % 24 == 0 && $i != 120){
							echo '</div><div class="page_slick">';
						}
						$i++;
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="box_down_app">
			<div class="main_down">
				<div class="item appcv">
					<div class="content">
						<div class="content-top">
							<p>Tạo CV miễn phí</p>
							<p>trên <span>Timviec365.com</span></p>
						</div>
						<div class="content-bottom">
							<div class="qr">
								<img class="lazyload" src="/images/load.gif" data-src="/images/qr_app_job.png" alt="QR app cv">
							</div>
							<div class="link">
								<a rel="nofollow" href="https://play.google.com/store/apps/details?id=vn.hungviet.cv365com"><i class="fa fa-android" aria-hidden="true"></i> Andoird</a>
								<a rel="nofollow" href="https://apps.apple.com/us/app/timviec365-com-cv-xin-vi%E1%BB%87c/id1513694297?l=vi#?platform=iphone"><i class="fa fa-apple" aria-hidden="true"></i> IOS</a>
							</div>
						</div>
					</div>
				</div>
				<div class="item app_timviec">
					<div class="content">
						<div class="content-top">
							<p>Trải nghiệm</p>
							<p>App <span>Timviec365.com</span></p>
						</div>
						<div class="content-bottom">
							<div class="qr">
								<img class="lazyload" src="/images/load.gif" data-src="/images/qr_app_job.png" alt="QR app">
							</div>
							<div class="link">
								<a rel="nofollow" href="https://play.google.com/store/apps/details?id=vn.hungha.timviec365_com"><i class="fa fa-android" aria-hidden="true"></i> Andoird</a>
								<a rel="nofollow" href="https://apps.apple.com/us/app/t%C3%ACm-vi%E1%BB%87c-l%C3%A0m-v%C3%A0-tuy%E1%BB%83n-d%E1%BB%A5ng-365/id1479360809?l=vi&ls=1"><i class="fa fa-apple" aria-hidden="true"></i> IOS</a>
							</div>
						</div>
					</div>
				</div>
				<div class="item maucv">
					<div class="content">
						<div class="content-top">
							<p>Tạo CV nhanh chóng</p>
							<p>Tải cv dễ dàng</p>
						</div>
						<div class="content-bottom">
							<a href="/mau-cv.html">Tạo CV ngay <i></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="box_new" id="joblc">
			<div class="main" >
				<div class="tit tit2">
					<div class="ir">
						<i class="ico"></i><h2 class="heading">Việc làm lương cao</h2>
					</div>
				</div>
				<div class="main_option2">
					<?
					foreach ($db_cao as $key => $value) { 
					?>
					<div class="item">
						<div class="logo">
							<img src="/images/load.gif" class="lazyload" data-src="<?= str_replace('../','https://timviec365.com/', geturlimageAvatar($value['usc_create_time']).$value['usc_logo'])  ?>" onerror='this.onerror=null;this.src="/images/logo-new.png";' alt="<?= $value['usc_company'] ?>">
						</div>
						<div class="content-right">
							<div class="left">
								<a href="<?= rewriteNews($value['new_id'],$value['new_title'],$value['new_alias']) ?>" class="title_new"><?= $value['new_title'] ?></a>
								<a href="<?= rewrite_company($value['usc_id'],$value['usc_company'],$value['usc_alias']) ?>" class="name_company"><?= name_company($value['usc_company']) ?></a>
							</div>
							<div class="right">
								<?
								$arr_city = explode(',', $value['new_city']);
								$new_city = [];
								foreach ($arr_city as $key => $val) {
									$new_city[] = $arrcity[$val]['cit_name'];
								}
								$new_city = implode(', ', $new_city);
								?>
								<p class="p_dd"><i class="fa fa-map-marker" aria-hidden="true"></i> <?= $new_city?></p>
								<div class="p_salary"><i class="salary"></i> <?= $array_muc_luong[$value['new_money']]?></div>
							</div>
						</div>
					</div>
					<?
					}
					?>
				</div>
			</div>
		</div>
		<div class="box_lc" id="jobnew">
			<div class="tit_lc"><h2 class="head">Việc làm tuyển gấp</h2></div>
			<div class="main main_lc">
				<?
				foreach ($db_gap as $key => $value) { 
				?>
				<div class="item">
					<a href="<?= rewriteNews($value['new_id'],$value['new_title'],$value['new_alias']) ?>" class="title_new"><?= $value['new_title'] ?></a>
					<a href="<?= rewrite_company($value['usc_id'],$value['usc_company'],$value['usc_alias']) ?>" class="name_company"><?= name_company($value['usc_company']) ?></a>
					<p class="p_salary"><i class="salary"></i><?= $array_muc_luong[$value['new_money']]?></p>
					<p class="p_time"><i class="time"></i><?= date('d/m/Y',$value['new_han_nop']) ?></p>
				</div>
				<?
				}
				?>
			</div>
		</div>
		<div class="box_cate">
			<div class="cate_item">
				<div class="tit_cate">Việc làm theo ngành nghề</div>
				<div class="main">
					<?
					foreach ($db_cat as $key => $value) {
					?>
					<a href="<?= rewriteCate(0,0,$value['cat_id'],$value['cat_name']) ?>" class="item">Việc làm <?= str_replace('Việc làm', '', $value['cat_name'])?></a>
					<?
					}
					?>					
				</div>
			</div>
			<div class="cate_item">
				<div class="tit_cate">Việc làm theo tỉnh thành</div>
				<div class="main">
					<?
					foreach ($arrcity as $key => $value) {
					?>
					<a href="<?= rewriteCate($value['cit_id'],$value['cit_name'],0,0) ?>" class="item">Việc làm tại <?=$value['cit_name']?></a>
					<?
					}
					?>					
				</div>
			</div>
			<div class="cate_item">
				<div class="tit_cate">CV theo ngành nghề</div>
				<div class="main">
					<?
					foreach ($db_catCV as $key => $value) {
					?>
					<a href="<?= rewriteNNCV($value['alias']) ?>" class="item">CV <?=trim(str_replace("CV", "", $value['name']))?></a>
					<?
					}
					?>					
				</div>
			</div>
		</div>
		<div class="banner_tc">
			<img class="lazyload" src="/images/load.gif" data-src="/images/banner_hotline.png" alt="" style="width: 100%">
		</div>
		<div class="box_blog">
			<div class="main">
				<div class="tit">
					<div class="ir">
						<i class="ico"></i><h2 class="heading">Tin tức tuyển dụng</h2>
					</div>
				</div>
				<div class="slick_new">
					<?
					$i = 1;
					foreach ($db_blog as $key => $value) {
						if($value['new_title_rewrite']!='') $title_blog = $value['new_title_rewrite'];
						else $title_blog = replaceTitle($value['new_title']);
						if($i <= 4){
					?>
					<div class="item">
						<a rel="nofollow" href="<?= rewriteBlog($value['new_id'],$title_blog) ?>" class="img"><img class="lazyload" src="/images/load.gif" data-src="https://timviec365.com/pictures/news/<?=$value['new_picture']?>" alt="<?=$value['new_title']?>"></a>
						<div class="content">
							<span class="span_news">Tin mới</span>
							<a rel="nofollow" href="<?= rewriteBlog($value['new_id'],$title_blog) ?>" class="title_blog"><?= $value['new_title']?></a>
							<p class="time_blog"><i class="fa fa-clock-o" aria-hidden="true"></i><?= date('d/m/Y H:i',$value['new_date']) ?></p>
							<div class="sapo"><?= $value['new_des']?></div>
							<a rel="nofollow" href="<?= rewriteBlog($value['new_id'],$title_blog) ?>" class="readmore">Đọc tiếp<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
						</div>
					</div>
					<?
						if($i == 4){
							echo '</div><div class="blog_bottom">';
						}
					}else{
					?>
						<div class="item">
							<a rel="nofollow" href="<?= rewriteBlog($value['new_id'],$title_blog) ?>" class="images"><img class="lazyload" src="/images/load.gif" data-src="https://timviec365.com/pictures/news/<?=$value['new_picture']?>" alt="<?=$value['new_title']?>"></a>
							<a rel="nofollow" href="<?= rewriteBlog($value['new_id'],$title_blog) ?>" class="title_blog1"><?= $value['new_title']?></a>
						</div>
					<?
					}
					$i++;
					}
					?>
					</div>
			</div>
		</div>
		<div class="box_text_seo">
			<div class="menu">
            <? makeML($row_seo['seo_text'],'',''); ?>
            </div>
            <div class="content">
               <div class="nd"><?= makeML_content($row_seo['seo_text'],'','') ?></div>
               <div class="read">
               	Xem thêm <i class="fa fa-angle-double-down" aria-hidden="true"></i>
               </div>
            </div>
		</div>
		</section>
		<?
			include('../includes/inc_footer.php'); 
			include('../includes/inc_script_footer.php');
		?>
	</body>
	<script>
		$(document).ready(function(){
			$('.slick_hd').slick({
				dots:true
			});
			$('.slick_new').slick();
			width = $(window).width();
			if(width <= 1024){
				$(window).scroll(function(){
					if($(this).scrollTop() >= 355){
						$('.box_scroll').addClass('sticky');
					}else{
						$('.box_scroll').removeClass('sticky');
					}
				});
				$(".box_scroll .item").click(function(e) {
				e.preventDefault();
				var position = $($(this).attr("href")).offset().top - 45;
				$('.box_scroll .item').removeClass("active");
				$(this).addClass('active');
				$("body, html").animate({
					scrollTop: position
				}, 700 );
				});
			}
		});
	</script>
</html>