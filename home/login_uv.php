<? 
include("config.php"); 
$fail = 0;
if(isset($_COOKIE['UID']))
{
	header('Location: /');
}
if(isset($_POST['Submit']))
{
	$username         = getValue("email","str","POST","");
	$username         = replaceMQ($username);
	$password         = getValue("password","str","POST","");
	$password         = replaceMQ($password);
	$password         = md5($password);
	if($username != '' && $password != '')
	{
		$db_qr    = new db_query("SELECT use_id FROM user WHERE use_mail = '".$username."' AND use_pass  = '".$password."'");
		if(mysql_num_rows($db_qr->result) > 0)
		{
			$row = mysql_fetch_assoc($db_qr->result);
         /////////////////
			setcookie('UT', 0 ,time() + 7*6000,'/');
			setcookie('UID', $row['use_id'] ,time() + 7*6000,'/');
			setcookie('PHPSESPASS', $password ,time() + 7*6000,'/');
			update('user',['use_update_time'=>time()],['use_id'=>$row['use_id']]);
			header('Location: /ung-vien/ho-so-online.html');
			$fail = 0;
		}  
		else
		{
			$fail = 1;
		}
	}
	else
	{
		$fail = 1;
	}
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>Đăng nhập nhà tuyển dụng tại website Timviec365.com</title>
		<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui">
		<meta name="robots" content="noodp,noindex,nofollow"/>
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
<body id="login_uv" class="login">
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<div>
		<div class="back"><a href="/dang-nhap-chung.html"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></div>
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
						<a class="downLoad_App Timviec365" rel="nofollow" href="/ung-dung-tim-viec-lam.html"><i class="icon"></i>Tải app Timviec365</a>
					</div>
					<div class="item">
						<img src="/images/load.gif" class="lazyload" data-src="/images/qr_app_job.png" alt="Qr app CV">
						<a class="downLoad_App CV365" rel="nofollow" href="/ung-dung-tao-cv.html"><i class="icon"></i>Tải app CV365</a>
					</div>
				</div>
			</div>
			<div class="right_top">
				<img src="/images/load.gif" class="lazyload" data-src="/images/logo-new.png" alt="Logo login">
				<p class="tit_login">Đăng nhập tài khoản ứng viên</p>
				<form action="" onsubmit="return valiLogin_uv()" method="POST">
					<div class="alert-danger"> <? if($fail == 1){?>Thông tin dùng để xác thực không hợp lệ.<?}?></div>
					<div class="form-group form-email">
						<i class="icon"></i>
						<input value="<?= isset($username)?$username:'' ?>" type="text" class="form-control" id="email" name="email" placeholder="Nhập địa chỉ Email...">
					</div>
					<div class="form-group form-password">
						<i class="icon"></i>
						<input type="password" name="password" class="password form-control" placeholder="Mật khẩu">
						<i class="fa fa-eye-slash" onclick="hide_show_password(this)" aria-hidden="true"></i>
					</div>
					<a href="/quen-mat-khau-ung-vien.html" class="forget_pass">Quên mật khẩu</a>
					<button type="submit" name="Submit" value="">Đăng nhập</button>
					<p class="last">Bạn chưa có tài khoản? <a href="/dang-ky-ung-vien.html">Đăng ký ngay</a></p>
				</form>
			</div>
		</div>
	</div>
	<? 
	include('../includes/inc_script_footer.php'); 
	?>
	<script src="/js/validate_uv.js?v=<?=$version?>"></script>
	<script>
		$(document).ready(function(){
			height = $(window).height();
			$('.login').css('height',height);
		});
	</script>
</body>
</html>
