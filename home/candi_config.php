<?
	include('../home/config.php');
	$submit = getValue('Submit','str','POST','');
	if($submit != ''){
		$config = getValue('config','int','POST',0);
		$db_qr = new db_query("UPDATE user SET use_config = $config WHERE use_id = ".$_COOKIE['UID']);
		unset($db_qr,$config);
	}
?>
<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>Thông tin ứng viên</title>
		<meta name="descripton" content="Đăng ký ứng viên. Tìm việc làm nhanh chóng, hiệu quả nhất,  đăng tin tìm việc làm tốt 24h, tuyển dụng việc làm tất cả ngành nghề nhanh nhất, tìm kiếm việc làm tại Timviec365.vn"/>
		<meta name="Keywords" content="tim viec lam, viec lam nhanh, tìm việc làm nhanh, tuyển dụng việc làm, tuyen dung, kiem viec lam, tim viec lam, tim viec">
		<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui">
		<meta name="robots" content="noodp,noindex,nofollow"/>
		<link rel="stylesheet" href="/css/bootstrap.min.css" media='all' onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/select2.min.css" media='all' onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/slick-theme.css" media='all' onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/slick.css" media='all' onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/style_candi_manager.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/reponsive_candi_manager.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
		<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->
	</head>
	<body>
		<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<? 
	include('../includes/inc_header_candi_manager.php');
?>
<section class="main">
	<? include('../includes/inc_left_uvmanager.php') ?>
	<div class="right config">
		<div class="orange weight-500 Roboto-Medium first">CÀI ĐẶT HIỂN THỊ</div>
		<p class="weight-500 Roboto-Medium question">Bạn muốn hiển thị hồ sơ nào cho nhà tuyển dụng?</p>
		<form action="" method="pOST" class="form_config">
		  <p>
		  	<?
		  	$check_hstt = '';
		  	$txt_hstt = '';
		  	$check_create_cv = '';
		  	$txt_create_cv = '';
		  	$check_upload_cv = '';
		  	$txt_upload_cv = '';


		  	$db_qr = new db_query("SELECT count(1) FROM savecandicv WHERE iduser = ".$_COOKIE['UID']);
	  		$count = mysql_fetch_array($db_qr->result);
	  		$count = $count['count(1)'];
	  		if($count>0){
	  			$check_create_cv = "";
	  			$txt_create_cv = "đã hoàn thành";
	  		}else{
	  			$check_create_cv = "disabled";
	  			$txt_create_cv = "chưa hoàn thành";
	  		}
	  		unset($db_qr,$count);
	  		$db_qr = new db_query("SELECT count(1) FROM user_cv_upload WHERE use_id = ".$_COOKIE['UID']);
	  		$count = mysql_fetch_array($db_qr->result);
	  		$count = $count['count(1)'];
	  		if($count>0){
	  			$check_upload_cv = "";
	  			$txt_upload_cv = "đã hoàn thành";
	  		}else{
	  			$check_upload_cv = "disabled";
	  			$txt_upload_cv = "chưa hoàn thành";
	  		}
	  		if($row['cap_bac_mong_muon']!=''){
	  			$check_hstt = "";
	  			$txt_hstt = "đã hoàn thành";
	  		}else{
	  			$check_hstt = "disabled";
	  			$txt_hstt = "chưa hoàn thành";
	  		}
	  		if($row['use_config']==1) {
	  			$check_hstt = "checked";
	  			$txt_hstt = "đã hoàn thành";
	  		}
	  		if($row['use_config']==3) {
	  			$check_create_cv = "checked";
	  			$txt_create_cv = "đã hoàn thành";
	  		}
	  		if($row['use_config']==2) {
	  			$check_upload_cv = "checked";
	  			$txt_upload_cv = "đã hoàn thành";
	  		}
		  	
		  	?>
		    <input value="1" type="radio" id="test1" name="config" <?=$check_hstt?> >
		    <label for="test1">Hồ sơ trực tuyến (<?=$txt_hstt?>)</label>
		  </p>
		  <p>
		    <input value="3" type="radio" id="test2" name="config" <?=$check_create_cv?>>
		    <label for="test2">Hồ sơ CV tạo (<?=$txt_create_cv?>)</label>
		  </p>
		  <p>
		    <input value="2" type="radio" id="test3" name="config" <?=$check_upload_cv?>>
		    <label for="test3">Hồ sơ CV tải lên (<?=$txt_upload_cv?>)</label>
		  </p>
		  <div><input type="submit" name="Submit" value="Cập nhật"></div>
		</form>
	</div>

	<?include('../includes/inc_chuyenvienmb.php');?>
</section>
<?
	include('../includes/inc_footer.php');
	include('../includes/inc_script_footer.php');
?>
<script src="/js/update_uv.js?v=<?=$version?>"></script>
</body>