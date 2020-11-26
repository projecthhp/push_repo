<?
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<title>Quên mật khẩu nhà tuyển dụng</title>
		<link rel="canonical" href="https://timviec365.com/thong-tin-can-biet.html" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="robots" content="noodp,noindex,nofollow"/>

		<link rel="stylesheet" href="/css/font-awesome.min.css" media='all' onload="if(media!='all')media='all'">
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
	<body id="login_uv" class="login">
		<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<div class="back"><a href="/dang-nhap-ung-vien.html"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></div>
		<div class="main">
			<div class="left_login">
				<div class="left-top">
					<div class="item"><i class="icon"></i>Câu hỏi tuyển dụng</div>
					<div class="item"><i class="icon"></i>Biểu mẫu</div>
					<div class="item"><i class="icon"></i>Danh sách việc làm</div>
				</div>
				<div class="left-bottom">
					<div class="item">
						<img src="/images/load.gif" class="lazyload" data-src="/images/qr_app_job.png" alt="Qr app timviec">
						<a class="downLoad_App Timviec365" href=""><i class="icon"></i>Tải app Timviec365</a>
					</div>
					<div class="item">
						<img src="/images/load.gif" class="lazyload" data-src="/images/qr_app_job.png" alt="Qr app CV">
						<a class="downLoad_App CV365" href=""><i class="icon"></i>Tải app CV365</a>
					</div>
				</div>
			</div>
			<div class="right_top frm_forgetpass">
				<img src="/images/load.gif" class="lazyload" data-src="/images/logo-new.png" alt="Logo login">
				<p class="tit_login">Quên mật khẩu tài khoản ứng viên</p>
				<form action="" onsubmit="return false">
					<label class="require" for="">Email</label>
					<div class="form-group form-email">
						<div class="div-right">
							<input type="text" class="form-control" id="email" name="email" placeholder="Nhập địa chỉ Email...">
							<i class="icon"></i>
						</div>
					</div>
				<p>Mời bạn nhập địa chỉ email đã đăng ký tài khoản trên Timviec365.com. Chúng tôi sẽ gửi tới bạn hướng dẫn để tạo mật khẩu mới, vui lòng kiểm tra email.</p>
					<input type="submit" name="Submit" id="uv_laylaimatkhau" value="LẤY LẠI MẬT KHẨU">
					<p class="last">Bạn chưa có tài khoản? <a href="/dang-ky-ung-vien.html">Đăng ký ngay</a></p>
				</form>
			</div>
		</div>
		<? 
			include('../includes/inc_script_footer.php'); 
		?>
		<script>
			$('#uv_laylaimatkhau').click(function(){
				var email = $('#email');

				if(email.val() == ''){
					alert("Bạn vui lòng nhập địa chỉ Email !!!");
					email.focus()
					return false;
				}else{
					$.ajax({
						type:"POST",
						url:"../ajax/quen_mk.php",
						data:{
							email:email.val(),
						},
						success:function(data){
							if(data == 0){
								alert('Tài khoản bạn vừa nhập không tồn tại');
							}
							else{
								alert('Thông tin hướng dẫn tạo mật khẩu mới đã được gửi đến email của bạn. Vui lòng kiểm tra email và làm theo hướng dẫn');
							}
						}
					});
				}
			});
		</script>
	</body>
	</html>
	