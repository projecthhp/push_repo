<?
include('config.php');
$domain_check = $domain.$_SERVER['REQUEST_URI'];
$canonical = $domain.'/viec-tim-nguoi.html';

$page  = getValue('page','int','GET',0);
$page  = intval(@$page);
if($page == 1)
{
   redirect($canonical);
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
$url_get = $canonical.$url_query;
if ( $url_get != $domain_check) {
   header("HTTP/1.1 301 Moved Permanently"); 
   header("Location: ".$url_get);
   exit();
 }
$db_seo = new db_query("SELECT * FROM seo_tt WHERE name_page =  'viec-tim-nguoi' ");
$row_seo = mysql_fetch_assoc($db_seo->result);
$index = "index,follow";
//Page này index
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title><?= $row_seo['seo_tt']; ?></title>
		<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui"/>
		<link rel="canonical" href="<?= $canonical ?>" />
		<link href="" rel="shortcut icon"/>
		<meta name="description" content="<?= $row_seo['seo_des']; ?>"/>
		<meta name="Keywords" content="<?= $row_seo['seo_key']; ?>"/>
		<meta name="robots" content="<?=$index?>"/>
		<meta property="og:locale" content="vi_VN" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="<?= $row_seo['seo_tt']; ?>" />
		<meta property="og:description" content="<?= $row_seo['seo_des']; ?>" />
		<meta property="og:site_name" content="Tìm việc làm" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:description" content="<?= $row_seo['seo_des']; ?>" />
		<meta name="twitter:title" content="<?= $row_seo['seo_tt']; ?>" />
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
	<body id="job_by_category">
		<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
		<header>
			<? include('../includes/inc_header.php'); ?>
			<div id="banner">
				<? include('../includes/inc_search.php') ?>
				<p class="taingay">Tải ngay ứng dụng timviec365 và cv365+ trên điện thoại để trải nghiệm tốt nhất</p>
				<a class="downLoad_App Timviec365" rel="nofollow" href="/ung-dung-tim-viec-lam.html"><i class="icon"></i>Tải app Timviec365</a>
				<a class="downLoad_App CV365" rel="nofollow" href="/ung-dung-tao-cv.html"><i class="icon"></i>Tải app CV365</a>
			</div>
		</header>
		<div class="breakcrumb">
			<ul>
				<li><a href="/">Trang chủ</a></li>
				<li class="active"><span><h1 class="bre_heading">Việc tìm người</h1></span></li>
			</ul>
		</div>
		<div class="box_new">
			<div class="main">
				<div class="tit tit2">
					<div class="ir">
						<i class="ico"></i><h2 class="heading">Việc làm mới nhất</h2>
					</div>
				</div>
				<div class="main_option1">
					<?
					$db_qr = new db_query("SELECT new_title, new_id, new_money, new_han_nop, usc_logo, usc_id, usc_company, usc_alias,usc_create_time,new_alias FROM new JOIN user_company ON new.new_user_id = user_company.usc_id WHERE new_cao = 0 AND new_gap = 0 AND new_active = 1 AND new_thuc = 1 AND new_han_nop > ".$time." ORDER BY new_hot DESC, new_update_time DESC LIMIT ".$start.",".$curentPage." ");
					$db_qrs = new db_query("SELECT count(*) as count FROM new JOIN user_company ON new.new_user_id = user_company.usc_id WHERE new_cao = 0 AND new_gap = 0 AND new_active = 1 AND new_thuc = 1 AND new_han_nop > ".$time." ");
					$count = mysql_fetch_assoc($db_qrs->result);
					$count = $count['count'];
					While($value = mysql_fetch_assoc($db_qr->result)){
					?>
					<div class="item">
						<a class="logo">
							<img src="/images/load.gif" class="lazyload" data-src="<?= str_replace('../', $domain.'/', geturlimageAvatar($value['usc_create_time']).$value['usc_logo'])  ?>" onerror='this.onerror=null;this.src="/images/logo-new.png";' alt="<?= $value['usc_company'] ?>">
						</a>
						<div class="right_item">
							<a href="<?= rewriteNews($value['new_id'],$value['new_title'],$value['new_alias']) ?>" class="title_new"><?= $value['new_title'] ?></a>
							<a href="<?= rewrite_company($value['usc_id'],$value['usc_company'],$value['usc_alias']) ?>" class="name_company"><?= name_company($value['usc_company']) ?></a>
							<p class="p_salary"><i class="salary"></i><?= $array_muc_luong[$value['new_money']]?></p>
							<p class="p_time"><i class="time"></i><?= date('d/m/Y',$value['new_han_nop']) ?></p>
						</div>
					</div>
					<?
					}
					?>
				</div>
				<div class="pagination_wrap clr pull-right text-right">
					<div class="clr">
					<?
					echo generatePageBar2('',$page,$curentPage,$count,$canonical,'?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
					unset($db_qr,$row,$arr_city);
					?>
					</div>
				</div>
			</div>
		</div>
		<div class="box_cate">
		<div class="cate_item">
			<div class="tit_cate">Việc làm theo ngành nghề</div>
			<div class="main">
				<div class="search_cate" >
				<i class="fa fa-search" aria-hidden="true"></i> <input data-type="job" data-dt="cate" type="text" class="keyword" placeholder="Nhập từ khóa ...">
				</div>
				<div class="list">
				<?
				foreach ($db_cat as $key => $value) {
				?>
				<a href="<?= rewriteCate(0,0,$value['cat_id'],$value['cat_name']) ?>" class="item">Việc làm <?= str_replace('Việc làm', '', $value['cat_name'])?></a>
				<?
				}
				?>				
				</div>	
			</div>
		</div>
		<div class="cate_item">
			<div class="tit_cate">Việc làm theo tỉnh thành</div>
			<div class="main">
				<div class="search_cate" >
				<i class="fa fa-search" aria-hidden="true"></i> <input data-type="job" data-dt="city" type="text" class="keyword" placeholder="Nhập từ khóa ...">
				</div>
				<div class="list">
				<?
				foreach ($arrcity as $key => $value) {
				?>
				<a href="<?= rewriteCate($value['cit_id'],$value['cit_name'],0,0) ?>" class="item">Việc làm tại <?=$value['cit_name']?></a>
				<?
				}
				?>				
				</div>	
			</div>
		</div>
		<div class="cate_item">
			<div class="tit_cate">CV theo ngành nghề</div>
			<div class="main">
				<div class="search_cate" >
				<i class="fa fa-search" aria-hidden="true"></i> <input data-type="cv" data-dt="cate" type="text" class="keyword" placeholder="Nhập từ khóa ...">
				</div>
				<div class="list">
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
		</div>
        <div class="box_text_seo option2">
			<div class="menu">
            <? makeML($row_seo['seo_text'],'',''); ?>
            </div>
            <div class="content">
               <div class="nd"><?= makeML_content(str_replace('src=', 'class="lazyload" src="/images/load.gif" data-src=', $row_seo['seo_text']),'','') ?></div>
               <div class="read">
               	Xem thêm <i class="fa fa-angle-double-down" aria-hidden="true"></i>
               </div>
            </div>
		</div>
		<? include('../includes/inc_footer.php'); ?>
		<? include('../includes/inc_script_footer.php') ?>
	</body>
</html>