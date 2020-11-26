<?
include("config.php"); 
if(!isset($_COOKIE['UID']))
{
	echo "<script>alert('Trước tiên bạn phải đăng nhập');</script>";
	header('Location: /');
}

$userid = $_COOKIE['UID'];
$cv_save = new db_query("SELECT * FROM savecandicv INNER JOIN samplecv ON savecandicv.idcv = samplecv.id WHERE iduser = '".$userid."' ORDER BY savecandicv.id DESC ");
?>
<!DOCTYPE html>
<html lang="vi">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex,nofollow"/>
	<title>Các mẫu CV đã lưu của bạn - Timviec365.com</title>
	<link rel='stylesheet' id='bootstrap.min-css'  href='/css/bootstrap.min.css' media='all'  onload="if(media!='all')media='all'" />
	<link rel='stylesheet' id='owl.themecss-css'  href='/css/select2.css' media='all' onload="if(media!='all')media='all'" />
	<link rel="stylesheet" href="/css/css_cv.css">
	<link rel="stylesheet" href="/css/notification.css">
	<link rel="stylesheet" href="/css/support-ticket.css">
	<link rel="stylesheet" href="/css/choose-template.css">
	<link rel="stylesheet" href="/css/font-awesome.min.css">  
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<link href="/css/csscv/app_candidate.min.css" rel="stylesheet">
	<link rel="stylesheet" href="/css/style.css" media='all' onload="if(media!='all')media='all'">
	<link rel="stylesheet" href="/css/reponsive.css" media='all' onload="if(media!='all')media='all'">
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->
</head>
<style type="text/css">
	@media (max-width: 991px){
	#header .navbar {
		width: auto;
	}
}
</style>
<body>
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<div id="topbar-event" style="display: none">
		<p><a href="#" target="_blank" class="event-detail">Chi Tiết</a><i class="fa fa-times topbar-close"></i></p>
	</div>
	<header>
	    <div class="container">
	      <div class="row nosearch">
	      <? 
	        include("../includes/inc_header_cv.php");
	        include("../includes/inc_endheader.php");
	      ?>
	    </div>
		</div>
	</header>
	<div class="container">
		<div class="row">
			<div class="col-sm-8 savecv">
				<div class="candidate-cv-list__title flex justify-between">
					<h2>DANH SÁCH CV CỦA BẠN</h2>
					<a href="/home/cv_quan_li.php" title="Danh sách CV" class="btn btn-pink btn-sm">Tạo CV ngay</a> 
				</div>
				<?
				while ($rowcv = mysql_fetch_assoc($cv_save->result)) {
					?>
					<div class="candidate-cv-list__content">
						<div class="item" data-id="21532">
							<div class="item__content">
								<div class="item__content--avatar">
									<a href="../download-cvpdf/cv.php?idcv=<?=$rowcv['idcv']?>&iduser=<?=$rowcv['iduser']?>&view=1&cvname=<?=$rowcv['alias']?>" title="CV - TIMVIEC365.COM" target="_blank"> 
										<img src="../upload/maucv/<?=$rowcv['alias']?>/<?=$rowcv['image']?>">
										<!-- <img src="<?=$rowcv['nameimg']?>" alt="Mẫu CV <?=$rowcv['name']?>" >  -->
									</a>
								</div>
								<div class="item__content--description">
									<div class="item__content--description--title">
										<h3 class=""> <a href="#" title="CV - TIMVIEC365.COM" target="_blank">Mẫu CV <?=$rowcv['name']?></a> </h3>
										<span><i class="fa fa-clock-o"></i>  <?echo date('d-m-Y',$rowcv['createdate']);?></span> 
									</div>
									<div class="item__content--description--link"> 
										<a href="../download-cvpdf/cv.php?idcv=2&iduser=1257&view=1&cvname=<?=$rowcv['name']?>" target="_blank">
											download-cvpdf/cv.php?idcv=<?=$rowcv['idcv']?>&iduser=<?=$rowcv['iduser']?>&cvname=<?=$rowcv['name']?></a>
										</div>
										<div class="item__content--description--bar js-toggle-action-cv"> 
											<span><i class="fa fa-ellipsis-h"></i></span>
										</div>
										<div class="item__content--description--button"> 
											<a href="../download-cvpdf/cv.php?idcv=<?=$rowcv['idcv']?>&iduser=<?=$rowcv['iduser']?>&view=1&cvname=<?=$rowcv['alias']?>" target="_blank" class="btn btn-gray btn-sm"><i class="fa fa-eye"></i> Xem</a> 
											<a href="../download-cvpdf/cv.php?idcv=<?=$rowcv['idcv']?>&iduser=<?=$rowcv['iduser']?>&cvname=<?=$rowcv['alias']?>" target="_blank" class="btn btn-gray btn-sm"><i class="fa fa-download"></i> Tải xuống</a> 
											<a href="<?=rewriteCreateCV($rowcv['alias'],$rowcv['id'])?>" class="btn btn-gray btn-sm js-edit-cv"><i class="fa fa-pencil"></i> Sửa</a>
											
										</div>
									</div>
								</div>
							</div>
						</div>						
						<?}?>
					</div>
					<? if (isset($_COOKIE['UID'])) {
						$infouv = new db_query("SELECT * FROM user WHERE use_id = '".$_COOKIE['UID']."'");
						while ($rowif = mysql_fetch_assoc($infouv->result)) {
							$nameuv = $rowif['use_name'];
							$logouv = $rowif['use_logo'];
						}
					} 
					?>
					<div class="col-sm-4 savecv">
						<div class="can-grid__sidebar can-grid__sidebar--right flex-30">
							<div class="can-info">
								<div class="can-info__welcome">
									<div class="can-info__welcome--avatar">
										<input type="file" name="avatar" id="image-upload" accept=".png, .jpg, .jpeg" style="display: none;"> <img src="/images/dk_s.png" class="js-load-avatar-new" onerror="this.src='imagescv/user.png'">
									</div>
									<div class="can-info__welcome--name">
										<p>Chào mừng bạn trở lại</p>
										<p><b><?=$nameuv?></b></p>
										<p><a href="/thong-tin-tai-khoan-ung-vien.html">Cập nhật hồ sơ thu hút NTD</a></p>
									</div>
								</div>
								<div class="can-info__notify">
									<div class="item">
										<div class="item__title">
											<label class="switch">
												<input type="checkbox" class="js-toggle-notify" name="find_job_status" checked=""> <span class="slider round"></span> 
											</label> 
											<span class="active">Trạng thái tìm việc <span class="js-text-status">bật</span></span>
										</div>
										<div class="item__content">
											<p>Chế độ Tìm việc sẽ tự tắt sau 2 tuần. Nếu sau 2 tuần bạn chưa nhận được cơ hội việc làm hãy bật lại
											</p>
										</div>
									</div>
									<div class="item">
										<div class="item__title">
											<label class="switch">
												<input type="checkbox" class="js-toggle-notify" name="view_cv_status"> <span class="slider round"></span> </label> <span class="">Cho phép NTD liên hệ qua bạn</span> 
											</div>
											<div class="select-view-profile mt20 d-hidden">
												<div class="flex justify-between">
													<label class="custome-radio text-md js-select-view-profile"> CV online
														<input type="radio" name="select_view_profile" class="input-select-view-cv" checked=""> <span class="checkmark"></span> </label>
														<label class="custome-radio text-md js-select-view-profile"> Hồ sơ online
															<input type="radio" name="select_view_profile" class="input-select-view-profile"> <span class="checkmark"></span> </label>
														</div>
													</div>
													<div class="item__content mt10">
														<p>Cho phép các Nhà tuyển dụng đã được xác thực xem CV hoặc hồ sở Online để có thể liên hệ với bạn
														</p>
													</div>
													<div class="cancel-select-view-profile mt10 d-hidden">
														<div class="text-pink text-md"> <span>Hồ sơ của bạn đang hoàn thiện dưới 70%, vui lòng cập nhật thêm thông tin để Nhà tuyển dụng có thể tiếp cận bạn qua hồ sơ online. </span> 
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<? include('../includes/inc_script_footer.php');
						include('../includes/inc_footer.php')?>
					</body>
