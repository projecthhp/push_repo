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
<body class="gtapp_timviec cv">
	<header>
		<? include('../includes/inc_header.php') ?>
		<div id="banner">
			<h1 class="h1">Ứng dụng tạo CV xin việc</h1>
			<p class="text">Tạo CV xin việc chuẩn ngay trên điện thoại</p>
			<div class="qr_app">
				<div class="app">
					<div class="left">
						<img class="lazyload" src="/images/load.gif" data-src="/images/qr_app_job.png" alt="QR App">
					</div>
					<div class="right-top">
						<p>Quét mã QR</p> <p>Tải app CV365 ngay</p>
					</div>
					<div class="link_app">
						<a rel="nofollow" target="_blank" href="https://play.google.com/store/apps/details?id=vn.hungviet.cv365com">
							<i class="fa fa-android" aria-hidden="true"></i>Download Android
						</a>
						<a rel="nofollow" target="_blank" href="https://apps.apple.com/vn/app/timviec365-com-cv-xin-vi%E1%BB%87c/id1513694297?app=itunes&ign-mpt=uo%3D4">
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