<?
	include('config.php');
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="robots" content="noodp,noindex,nofollow"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title>Quản lý nhà tuyển dụng | Timviec365.com</title>
	<link rel="stylesheet" href="/css/font-awesome.min.css" media="all">
	<link rel="stylesheet" href="/css/style.min.css?v=<?=$version?>" media="all">
	<link rel="stylesheet" href="/css/style_company_manager.css?v=<?=$version?>" media='all' onload="if(media!='all')media='all'">
		<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	</head>
	<body class="manager">
	<? include('../includes/inc_left_ntdmanager.php'); ?>
	<div class="right_manager">
	<? include('../includes/inc_header_ntd_manager.php');?>
	<div class="title_manager box_tt">Đổi mật khẩu</div>
	<div class="box_thongke box_change_pass main">
		<form action="/codelogin/updateNTD_tttk.php" class="form_update" id="form_change_pass" method="POST" onsubmit="return vali_EditTTTK()">
			<div class="form-group">
				<label for="" class="required">Mật khẩu cũ</label>
				<input type="password" id="password_first" placeholder="Nhập mật khẩu hiện tại" class="form-control">
			</div>
			<div class="form-group">
				<label for="" class="required">Mật khẩu mới</label>
				<input type="password" id="password_second" placeholder="Nhập mật khẩu mới" name="password_second" class="form-control">
			</div>
			<div class="form-group">
				<label for="" class="required">Nhập lại mật khẩu mới</label>
				<input type="password" id="re_password_second" placeholder="Nhập lại mật khẩu mới" class="form-control">
			</div>
			<div class="text-center">
				<button type="submit">Đổi mật khẩu</button>
				<a href="/nha-tuyen-dung/thong-tin-chung.html">Hủy</a>
			</div>
		</form>
	</div>
	</div>
	<? if($detect->isMobile() || $detect->isTablet()) include('../includes/inc_chuyenvienmb.php');
    include('../includes/inc_footer.php');
    include('../includes/inc_script_footer.php');
    ?>
		<script>
			$('#usc_city,#usc_size').select2({
				width:'100%'
			});
		</script>
		<script src="/js/validate_ntd.js"></script>
		<script src="/js/update_ntd.js"></script>
	</div>
</body>
</html>