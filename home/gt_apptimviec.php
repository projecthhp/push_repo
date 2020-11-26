<?
	include('config.php');
	$canonical = $domain."/ung-dung-tim-viec-lam.html";
	$row_seo = [];
	$row_seo['seo_des'] = '';
	$row_seo['seo_key'] = '';
	$row_seo['seo_tt'] = '';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
		<meta charset="UTF-8">
		<title>Giới thiệu app tìm việc</title>
		<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui"/>
		<link rel="canonical" href="<?= $canonical ?>" />
		<link href="" rel="shortcut icon"/>
		<meta name="description" content="<?= $row_seo['seo_des']; ?>"/>
		<meta name="Keywords" content="<?= $row_seo['seo_key']; ?>"/>
		<meta name="robots" content="noodp,noindex,nofollow"/>
		<meta property="og:locale" content="en_US" />
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
<body class="gtapp_timviec">
	<header>
		<? include('../includes/inc_header.php') ?>
		<div id="banner">
			<h1 class="h1">ỨNG DỤNG TÌM VIỆC LÀM THÔNG MINH</h1>
			<p class="text">Hệ thống chủ động tìm và gợi ý việc làm</p>
			<div class="qr_app">
				<div class="app">
					<div class="left">
						<img class="lazyload" src="/images/load.gif" data-src="/images/qr_app_job.png" alt="QR App">
					</div>
					<div class="right-top">
						<p>Quét mã QR</p> <p>Tải app Timviec365 ngay</p>
					</div>
					<div class="link_app">
						<a rel="nofollow" href="https://play.google.com/store/apps/details?id=vn.hungha.timviec365_com">
							<i class="fa fa-android" aria-hidden="true"></i>Download Android
						</a>
						<a rel="nofollow" href="https://apps.apple.com/us/app/t%C3%ACm-vi%E1%BB%87c-l%C3%A0m-v%C3%A0-tuy%E1%BB%83n-d%E1%BB%A5ng-365/id1479360809?l=vi&ls=1">
							<i class="fa fa-apple" aria-hidden="true"></i>Download IOS
						</a>
					</div>
				</div>
			</div>
		</div>
	</header>
	<?
		include('../includes/inc_footer.php');
		include('../includes/inc_script_footer.php');
	?>
</body>
</html>