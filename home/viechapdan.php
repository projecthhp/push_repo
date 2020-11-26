<?
include("config.php");
$page  = getValue('page','int','GET',1);
$page  = intval(@$page);
$sql = '';

if($page == 0)
{
	$page = 1;
	}
	$curentPage = 30;
	$pageab = abs($page - 1);
	$start = $pageab * $curentPage;
	$start = intval(@$start);
	$start = abs($start);
	$db_qr = new db_query("SELECT new.new_id,usc_id,new_money,new_city,new_cap_bac,new_create_time,usc_create_time,usc_logo,usc_company,new_title,new_nganh,usc_alias,new.new_han_nop FROM new STRAIGHT_JOIN user_company ON new_user_id = user_company.usc_id WHERE 1 ORDER BY new.new_update_time DESC,new.new_hot  DESC LIMIT ".$start.",".$curentPage);
	$numrow = new db_query("SELECT count(1) FROM new STRAIGHT_JOIN user_company ON new_user_id = user_company.usc_id WHERE 1 ".$sql."");
	$count = mysql_fetch_assoc($numrow->result);
	$count = $count['count(1)'];
	$url_query = '';
	$urlcano = '';
	if($page > 1)
	{
	  $trang = " - trang ".$page;
	  $url_query = "?page".$page;
	}
	else
	{
	  $trang = '';
	}
	$domain=  "https://timviec365.com/viec-lam-hap-dan.html";
	$title = 'Việc làm hấp dẫn';
	$description = $title;
	$h1 = $title;
	$keyword_tt = $title;
	$tt_bot = $title;
?>
<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link rel="canonical" href="<?= $domain ?>" />
		<link href="" rel="shortcut icon"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title><?=$title; ?></title>
		<meta name="description" content="<?=$description; ?>"/>
		<meta name="Keywords" content="<?=$keyword_tt; ?>"/>
		<meta name="robots" content="noodp,noindex,nofollow"/>
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="<?=$title; ?>" />
		<meta property="og:description" content="<?=$description; ?>" />
		<meta property="og:site_name" content="Tìm việc làm" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:description" content="<?=$description; ?>" />
		<meta name="twitter:title" content="<?=$title ?>" />


		<link rel="stylesheet" href="/css/bootstrap.min.css" media='all' onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/select2.min.css" media='all' onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/slick-theme.css" media='all' onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/slick.css" media='all' onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/style.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/reponsive.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
		<meta name="google-site-verification" content="EIV7wHDvaTZkVpsLjmM4_neYDyPLTmjV9du0A8ho4TU" />
		<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->
	</head>
	<body id="search">
		<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
		<header>
			<div class="container">
				<div class="row">
				<? 
					include('../includes/inc_header.php');
					include('../includes/inc_search.php');
				?>
				</div>
			</div>
		</header>
		<section id="new_job">
			<div class="container">
				<div class="title search_job">
					<span>
						<?=$h1; ?>
					</span>
				</div>
				<div class="main_new_job">
					<?
					while ($row = mysql_fetch_assoc($db_qr->result)) { 
					?>
					<div class="item_job">
						<div class="logo">
							<img class="lazyload" data-src="<?= geturlimageAvatar($row['usc_create_time']).$row['usc_logo'] ?>"  onerror='this.onerror=null;this.src="/images/logo1.png";' alt="<?= name_company($row['usc_company'])?>" src="/images/load.gif">
						</div>
						<div class="content">
							<a href="<?= rewriteNews($row['new_id'],$row['new_title'])?>" title="<?= $row["new_title"] ?>"><p class="job_name"><?= $row['new_title']?></p></a>
							<a href="<?= rewrite_company($row['usc_id'],$row['usc_company'],$row['usc_alias'])?>" <?= name_company($row['usc_company']) ?>><p class="com_name"><?= name_company($row['usc_company']) ?></p></a>
							<p class="address">Địa điểm : 
								<?
									$arr_city = explode(',', $row['new_city']);
									foreach ($arr_city as $key => $value) {
								?>
								<a href="<?= rewriteCate($value,$arrcity[$value]['cit_name'], 0,0) ?>"><?= $arrcity[$value]['cit_name']?></a>
								<?
									}
								?>
							</p>
							<p class="salary">Mức lương: <span><?= $array_muc_luong[$row['new_money']]?></span></p>
							<p class="end_time">Hạn nộp: <?= date('d/m/Y',$row['new_han_nop']) ?></p>
						</div>
					</div>
					<?}?>
				</div>
				<div class="pagination_wrap clr">
				      <div class="clr">
				      <?
					      $urlcano = $_SERVER['REQUEST_URI'];
					      $urlcano = str_replace("?page=".$page, "", $urlcano);
					      $urlcano = str_replace("&page=".$page, "", $urlcano);
					      $urlcano = str_replace("page=".$page, "", $urlcano);
					      if (strlen(strstr($urlcano, '?')) > 0) {
					        echo generatePageBar2('',$page,$curentPage,$count,$urlcano,'&','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
					      }else{
					        echo generatePageBar2('',$page,$curentPage,$count,$urlcano,'?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
					      }
					    ?>
				      </div>
				   </div>
			</div>
		<? include('../includes/inc_footer.php'); ?>
	</body>
	<? include('../includes/inc_script_footer.php') ?>
</html>