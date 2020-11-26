<?
	include('../home/config.php');
?>
<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>Thông tin ứng viên</title>
		<meta name="descripton" content="Đăng ký ứng viên. Tìm việc làm nhanh chóng, hiệu quả nhất,  đăng tin tìm việc làm tốt 24h, tuyển dụng việc làm tất cả ngành nghề nhanh nhất, tìm kiếm việc làm tại Timviec365.com"/>
		<meta name="Keywords" content="tim viec lam, viec lam nhanh, tìm việc làm nhanh, tuyển dụng việc làm, tuyen dung, kiem viec lam, tim viec lam, tim viec">
		<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui">
		<meta name="robots" content="noodp,noindex,nofollow"/>
		<link rel="stylesheet" href="/css/font-awesome.min.css" media='all' onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/style_candi_manager.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
		<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->
	</head>
	<body class="manager">
		<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<? require('../includes/inc_menu_uv.php') ?>
<div class="main_right">
	<? include('../includes/inc_header_candi_manager.php') ?>
	<div class="main">
		<div class="head title_change">ĐỔI MẬT KHẨU</div>
		<form action="/codelogin/updateUV_tttk.php" method="POST" class="form_changepass" onsubmit="return vali_EditTTTK()">
			<div class="form-group">
				<label class="require" for="">Mật khẩu cũ</label>
				<input id="password_first" type="password" class="form-control" placeholder="Nhập mật khẩu hiện tại">
			</div>
			<div class="form-group">
				<label class="require" for="">Mật khẩu mới</label>
				<input id="password_second" name="password_second" type="password" class="form-control" placeholder="Nhập mật khẩu mới">
			</div>
			<div class="form-group">
				<label class="require" for="">Xác nhận mật khẩu mới</label>
				<input id="re_password" type="password" class="form-control" placeholder="Xác nhận mật khẩu mới">
			</div>
			<div class="form-group text-center">
				<input type="submit" value="Đổi mật khẩu">
				<input type="reset" value="Hủy">
			</div>
		</form>
	</div>
	<? include('../includes/inc_chuyenvienmb.php');?>
</div>
<?
	include('../includes/inc_footer.php');
	include('../includes/inc_script_footer.php');
?>
<script src="/js/js_manager_uv.js?v=<?=$version?>"></script>
<script src="/js/validate_uv.js?v=<?=$version?>"></script>
<script src="/js/update_uv.js?v=<?=$version?>"></script>
</body>