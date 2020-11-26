<?
	include('config.php');
	session_start();
	if(!isset($_COOKIE["UID"]) && !$_COOKIE['UT'] == 1)
	{
		redirect('dang-nhap-nha-tuyen-dung.html');
	}
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
	<body class="manager feedback">
	<? include('../includes/inc_left_ntdmanager.php'); ?>
	<div class="right_manager">
	<? include('../includes/inc_header_ntd_manager.php');?>
	<div class="title_manager box_tt">Đóng góp ý kiến về chuyên viên mai hương</div>
	<div class="box_thongke main">
		<div class="main_feedback main" id="chuyenvien">
			<p>Cám ơn Doanh nghiệp đã tin tưởng và sử dụng dịch vụ Timviec365.com. Nhằm nâng cao chất lượng dịch vụ cũng như giúp doanh nghiệp tuyển dụng nhanh chóng - thành công, mong quý công ty đưa ra đánh giá quý báu của mình về chuyên viên hỗ trợ và đóng góp về website. Mọi đóng góp của doanh nghiệp sẽ là nền tảng để chúng tôi phát triển và tối ưu!</p>
			<div action="" class="form_feedback">
				<div class="question">
					Chuyên viên Mai Hương có gọi điện hỗ trợ anh/chị trong công tác tuyển dụng không?
				</div>
				<div class="div_answer">
					<span class="answer"><input class="call" type="radio" checked name="question_1" value="1"> Có</span>
					<span><input type="radio" class="call" name="question_1" value="0"> Không</span>
				</div>
				<div class="question">
					Thái độ chuyên viên khi hỗ trợ anh/chị như thế nào?
				</div>
				<div class="div_answer">
					<span class="answer"><input class="deportment" checked type="radio" name="question_2" value="1"> Nhiệt tình</span>
					<span><input type="radio" class="deportment" name="question_2" value="0"> Không nhiệt tình</span>
				</div>
				<div class="question" id="fb_cv_sendcandi">
					<span>Chuyên viên đã hỗ trợ tuyển dụng cho doanh nghiệp bao nhiêu ứng viên?</span> <input id="candi_support" type="text" placeholder="Nhập số lượng ứng viên">
				</div>
				<div class="question">
					Đánh giá về độ hài lòng với chuyên viên Mai Hương: 
					<ul class="stars">
						<li class="star" data-value='1'><a></a></li>
						<li class="star" data-value='2'><a></a></li>
						<li class="star" data-value='3'><a></a></li>
						<li class="star" data-value='4'><a></a></li>
						<li class="star" data-value='5'><a></a></li>
					</ul>
				</div>
				<div class="question">
					Đánh giá thêm về chuyên viên hỗ trợ:
				</div>
				<textarea name="" id="danhgia_chuyenvien" cols="30" rows="5"></textarea>
				<div class="text-center">
					<button class="btnSentFeedback" id="feedback_chuyenvien">Gửi ý kiến</button>
				</div>
			</div>
		</div>
	</div>
	<div class="title_manager box_tt">ĐÁNH GIÁ VỀ WEBSITE TIMVIEC365.com</div>
	<div class="box_thongke main">
		<div class="main_feedback" id="website">
			<div action="" class="form_feedback main">
				<div class="question">
					Anh chị biết website Timviec365.com từ đâu?
				</div>
				<div class="question_timviec365">
					<span class="answer"><input checked="" class="from" value="Google" type="radio" name="question_1"> Google</span>
					<span class="answer"><input class="from" value="Facebook" type="radio" name="question_1"> Facebook</span>
					<span class="answer"><input class="from" value="Giới thiệu" type="radio" name="question_1"> Giới thiệu</span>
					<span class="answer"><input class="from" value="Khác" type="radio" name="question_1"> Khác</span>
				</div>
				<div class="question">
					Anh chị cảm thấy hài lòng nhất điều gì ở Website Timviec365.com?
				</div>
				<textarea name="" id="bosung" cols="30" rows="10"></textarea>
				
				<div class="question">
					Anh chị thấy nên bổ sung và hoàn thiện chức năng gì ở website Timviec365.com?
				</div>
				<textarea name="" id="danhgia" cols="30" rows="10"></textarea>
				<div class="question">
					Đánh giá mức độ hài lòng về website Timviec365.com
					<ul class="stars">
						<li class="star" data-value='1'><a></a></li>
						<li class="star" data-value='2'><a></a></li>
						<li class="star" data-value='3'><a></a></li>
						<li class="star" data-value='4'><a></a></li>
						<li class="star" data-value='5'><a></a></li>
					</ul>
				</div>
				<div class="text-center">
					<button class="btnSentFeedback" id="feedback_website">Gửi ý kiến</button>
				</div>
			</div>
		</div>
	</div>
	</div>
	<? 
		if($detect->isMobile() || $detect->isTablet()) include('../includes/inc_chuyenvienmb.php');
		include('../includes/inc_footer.php');
		include('../includes/inc_script_footer.php');
		?>
		<script src="/js/validate_ntd.js"></script>
		<script src="/js/update_ntd.js"></script>
	</div>
</body>
</html>