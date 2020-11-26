<?
	include('../home/config.php');
?>
<!DOCTYPE html>
<html lang="en">
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
<section class="main_right">
<? include('../includes/inc_header_candi_manager.php') ?>
	<div class="main_list">
		<div class="title">THƯ XIN VIỆC CỦA TÔI</div>
		<div class="main_mycv">
			<a href="/mau-thu-xin-viec.html" class="item add">
				<img src="/images/icon365_manager/img_add.png" alt="Tạo thư xin việc">
				<p>Tạo thêm hồ sơ từ các thư xin việc online</p>
			</a>
			<?
			$db_qr = new db_query("SELECT savecandi_lt.*,alias,name FROM savecandi_lt INNER JOIN sample_letter ON savecandi_lt.idlt = sample_letter.id WHERE iduser = '".$_COOKIE['UID']."' ORDER BY savecandi_lt.id DESC ");
			While ($rowcv = mysql_fetch_assoc($db_qr->result)) { 
                $src= "../upload/lt_uv/uv_".$_COOKIE['UID']."/".$rowcv['nameimg'].".png";
			?>
			<div class="main_manager_cv">
				<div class="item">
					<div class="i main">
						<img src="/images/load.gif" class="lazyload cv" style="height: auto;" data-src="<?=$src?>" alt="">
					</div>
					<div class="cv-overlay">
						<a target="_blank" href="../download-cvpdf/lt.php?idlt=<?=$rowcv['idlt']?>&iduser=<?=$rowcv['iduser']?>&ltname=<?=$rowcv['alias']?>&view=1">Xem trước</a>
						<a href="<?=rewriteCreateLetter($rowcv['alias'],$rowcv['id'])?>">Chỉnh sửa</a>
						<a href="../download-cvpdf/lt.php?idlt=<?=$rowcv['idlt']?>&iduser=<?=$rowcv['iduser']?>&ltname=<?=$rowcv['alias']?>">Tải xuống</a>
						<a onclick="delFile(<?=$rowcv['id']?>,'letter')">Xóa</a>
					</div>
				</div>
				<div class="main text text-center"><?=$rowcv['name']?></div>
			</div>
			<?
			}
			?>
		</div>
		<div class="center" style="display: none">
			<div class="tt Roboto-Medium">MẪU CV ĐÃ THÍCH</div>
			<div class="main cv">
				<div class="main_cv">
					<div class="item ">
						<img src="/images/load.gif" class="lazyload" data-src="/images/cv_test.png" alt="">
					</div>
					<div class="item">
						<img src="/images/load.gif" class="lazyload" data-src="/images/cv_test.png" alt="">
					</div>
					<div class="item">
						<img src="/images/load.gif" class="lazyload" data-src="/images/cv_test.png" alt="">
					</div>
					<div class="item">
						<img src="/images/load.gif" class="lazyload" data-src="/images/cv_test.png" alt="">
					</div>
					<div class="item">
						<img src="/images/load.gif" class="lazyload" data-src="/images/cv_test.png" alt="">
					</div>
					<div class="item">
						<img src="/images/load.gif" class="lazyload" data-src="/images/cv_test.png" alt="">
					</div>
					<div class="item">
						<img src="/images/load.gif" class="lazyload" data-src="/images/cv_test.png" alt="">
					</div>
					<div class="item">
						<img src="/images/load.gif" class="lazyload" data-src="/images/cv_test.png" alt="">
					</div>
					<div class="item">
						<img src="/images/load.gif" class="lazyload" data-src="/images/cv_test.png" alt="">
					</div>
					<div class="item">
						<img src="/images/load.gif" class="lazyload" data-src="/images/cv_test.png" alt="">
					</div>
				</div>
				<a href="" class="show_all">Xem tất cả</a>
			</div>
		</div>
	</div>
	<?
		include('../includes/inc_chuyenvienmb.php');
		?>
</section>
<?
	include('../includes/inc_footer.php');
	include('../includes/inc_script_footer.php');
?>
<script src="/js/js_manager_uv.js?v=<?=$version?>"></script>
<script src="/js/update_uv.js?v=<?=$version?>"></script>
</body>