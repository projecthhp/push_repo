<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<? 
include("config.php"); 
$fail = 0;
$login = '';
if(isset($_POST['Submit']))
{

   $password         = getValue("pass","str","POST","");
   $password         = replaceMQ($password);
   $password         = md5($password);
   
    $id         = getValue("id","str","POST",0);
    $id         = replaceMQ($id);
   if($password != '')
   { 
         $db_Doi_mk = new db_query("UPDATE user_company SET usc_pass = '".$password."' WHERE usc_id = ".$id." ");
         $fail = 1;
         redirect('/dang-nhap-nha-tuyen-dung.html');
         setcookie('rand_st', 1 ,time() + -1,'/');

   }
   else
   {
      $fail = 0;
   }
}else{
    $token = getValue("reset_token","str","GET",0);
    $token = replaceMQ($token);

    $id = getValue("id","int","GET",0);
    $id = (int)$id;

    $or = '';

    $db_qr_token    = new db_query("SELECT usc_email,usc_pass,usc_create_time FROM user_company WHERE usc_id = '".$id."'");
    $row_token  = mysql_fetch_assoc($db_qr_token->result);
    $token_2 = $row_token['usc_pass'];
    $or = 'ntd';
    $id = $id; 


    if($token_2 != ''){
        if($token != $token_2){
            echo 'Nghi vấn hack';
            exit();
        }
    }else{
        header('Location: /');
    }
    if(isset($_COOKIE['UID']))
    {
       header('Location: /');
    }
}
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
		<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->
	</head>
	<body id="login_ntd" class="login">
		<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<div class="back"><a href="/dang-nhap-chung.html"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></div>
		<div class="main">
			<div class="left_login">
				<div class="left-top">
					<div class="item"><i class="icon"></i>Câu hỏi tuyển dụng</div>
					<div class="item"><i class="icon"></i>Biểu mẫu</div>
					<div class="item"><i class="icon"></i>Danh sách ứng viên</div>
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
			<div class="right_top frm_forgetpass">
				<img src="/images/load.gif" class="lazyload" data-src="/images/logo-new.png" alt="Logo login">
				<p class="tit_login">Đổi mật khẩu nhà tuyển dụng</p>
				<form class="form_doimk" action="/doi-mat-khau-nha-tuyen-dung.html" method="POST" onsubmit="return vali_doiMK()">
					<label for="" class="require">Mật khẩu</label>
					<div class="form-group">
						<div class="div-right">
							<input type="password" class="password form-control" id="password" name="pass" placeholder="Nhập mật khẩu mới">
							<i class="fa fa-eye-slash" onclick="hide_show_password(this)" aria-hidden="true"></i>
						</div>
						</div>
					<label for="" class="require">Nhập lại mật khẩu</label>
					<div class="form-group">
						<div class="div-right">
							<input type="password" class="password form-control" id="re_password" name="pass_2" placeholder="Nhập lại mật khẩu">
							<i class="fa fa-eye-slash" onclick="hide_show_password(this)" aria-hidden="true"></i>
						</div>
					</div>
					<input type="hidden" name="id" value="<?=$id?>"/>
					<input id="uv_laylaimatkhau" name="Submit" type="submit" value="ĐỔI MẬT KHẨU">
				</form>
			</div>
		</div>
		<? include('../includes/inc_script_footer.php'); ?>
	</body>
	</html>
	