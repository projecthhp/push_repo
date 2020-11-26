<? 
include("config.php");
$idco = getValue('idco','int','GET',0);
$sql = "SELECT usc_company,usc_logo,usc_create_time,usc_alias FROM user_company WHERE usc_id = $idco";
$db_qr = new db_query($sql);

if($idco != 0 && mysql_num_rows($db_qr->result)>0){
	$row = mysql_fetch_assoc($db_qr->result);
	$nameCom = $row['usc_company'];
}else{
	redirect('/home/404.php');
}
$linkCty = rewrite_company($idco,$row['usc_company'],$row['usc_alias']);
?>
<!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<link rel="canonical" href="<?= $canonical ?>" />
	<meta name="p:domain_verify" content=""/>
	<link href="" rel="shortcut icon"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Đánh giá công ty</title>
	<meta name="description" content=""/>
	<meta name="Keywords" content=""/>
	<meta name="robots" content="noodp,noindex,nofollow"/>
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:site_name" content="tìm việc làm" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:description" content="" />
	<meta name="twitter:title" content="" />

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
<body id="detail_company">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<header>
		<? include('../includes/inc_header.php'); ?>
		<div id="banner">
			<? include('../includes/inc_search.php'); ?>
			<p class="taingay text-center">Tải ngay ứng dụng timviec365 và cv365+ trên điện thoại để trải nghiệm tốt nhất</p>
			<div class="qr_app text-center">
				<a class="text-left downLoad_App Timviec365" href="/ung-dung-tim-viec-lam.html" rel="nofollow"><i class="icon"></i>Tải app Timviec365</a>
				<a class="text-left downLoad_App CV365" href="/ung-dung-tao-cv.html" rel="nofollow"><i class="icon"></i>Tải app CV365</a>
			</div>
		</div>
	</header>
	<div class="breakcrumb">
		<ul>
			<li><a href="/">Trang chủ</a></li>
			<li><a rel="nofollow" href="<?=$linkCty?>"><?=$nameCom?></a></li>
			<li class="active"><a><h1>Đánh giá <?=$nameCom?></h1></a></li>
		</ul>
	</div>
	<div class="box_rate main">
		<div class="left_rate">
			<div class="top_white main">
				<div class="td">Đánh giá <?=$nameCom?></div>
				<p class="gt">Chỉ một vài phút thôi! Đánh giá ẩn danh của bạn sẽ giúp những người tìm việc khác có thêm kinh nghiệm quý báu.</p>
				<div class="logo">
				<img src="/images/load.gif" class="lazyload" data-src="<?= str_replace('../', $domain.'/', geturlimageAvatar($row['usc_create_time']).$row['usc_logo'])  ?>" onerror='this.onerror=null;this.src="/images/logo-new.png";' alt="<?= $row['usc_company'] ?>">
				</div>
				<div class="ratting">
					<div class="p">Đánh giá tổng thể về công ty</div>
					<ul class="list-inline rating-list">
	                    <li><i class="fa fa-star yellow"></i></li>
	                    <li><i class="fa fa-star"></i></li>
	                    <li><i class="fa fa-star"></i></li>
	                    <li><i class="fa fa-star"></i></li>
	                    <li><i class="fa fa-star"></i></li>
	                </ul>
	                <span>Nhấp để đánh giá</span>
				</div>
				<div class="box_tt main">
					<div class="item">
						<label class="question" for="">Bạn đang là nhân viên hiện tại hay là nhân viên cũ?</label>
						<div class="chk_question">
							<label class="container">Nhân viên hiện tại
								<input type="radio" checked="checked" name="radio" data-id="1">
								<span class="checkmark"></span>
							</label>
							<label class="container">Nhân viên cũ
								<input type="radio" name="radio" data-id="2">
								<span class="checkmark"></span>
							</label>
						</div>
					</div>
					<div class="item">
						<label for="" class="question require">Đánh giá của bạn về <?=$nameCom?></label>
						<textarea id="rate_com" placeholder="Ví dụ: Môi trường làm việc thân thiện, chuyên nghiệp..."></textarea>
					</div>
					<div class="item">
						<label for="" class="question require">Ưu điểm</label>
						<textarea id="strong" placeholder="Chia sẻ một số lý do tốt nhất để làm việc tại công ty này"></textarea>
					</div>
					<div class="item">
						<label for="" class="question require">Nhược điểm</label>
						<textarea id="weakness" placeholder="Chia sẻ một số nhược điểm khi làm việc tại công ty này"></textarea>
					</div>
					<div class="item">
						<label for="" class="question">Nếu bạn phụ trách, bạn sẽ làm gì để giúp công ty thành nơi làm việc tốt hơn?</label>
						<textarea id="help_com"></textarea>
					</div>
					<div class="item">
						<label for="" class="question">Bạn có lời khuyên nào cho lãnh đạo quản lý về cách cải thiện?</label>
						<textarea id="advice"></textarea>
					</div>
					<div class="bottom_left">
						<div class="rate_2 form-group culture_company">
							<label>Văn hóa công ty</label>
							<ul class="list-inline rating-list">
			                    <li><i class="fa fa-star"></i></li>
			                    <li><i class="fa fa-star"></i></li>
			                    <li><i class="fa fa-star"></i></li>
			                    <li><i class="fa fa-star"></i></li>
			                    <li><i class="fa fa-star"></i></li>
			                </ul>
			                <span class="show_rate"></span>
						</div>
						<div class="rate_2 form-group welfare">
							<label>Phúc lợi công ty</label>
							<ul class="list-inline rating-list">
			                    <li><i class="fa fa-star"></i></li>
			                    <li><i class="fa fa-star"></i></li>
			                    <li><i class="fa fa-star"></i></li>
			                    <li><i class="fa fa-star"></i></li>
			                    <li><i class="fa fa-star"></i></li>
			                </ul>
			                <span class="show_rate"></span>
						</div>
						<div class="rate_2 form-group boss">
							<label>Lãnh đạo công ty</label>
							<ul class="list-inline rating-list">
			                    <li><i class="fa fa-star"></i></li>
			                    <li><i class="fa fa-star"></i></li>
			                    <li><i class="fa fa-star"></i></li>
			                    <li><i class="fa fa-star"></i></li>
			                    <li><i class="fa fa-star"></i></li>
			                </ul>
			                <span class="show_rate"></span>
						</div>
						<div class="rate_2 form-group office">
							<label>Văn phòng công ty</label>
							<ul class="list-inline rating-list">
			                    <li><i class="fa fa-star"></i></li>
			                    <li><i class="fa fa-star"></i></li>
			                    <li><i class="fa fa-star"></i></li>
			                    <li><i class="fa fa-star"></i></li>
			                    <li><i class="fa fa-star"></i></li>
			                </ul>
			                <span class="show_rate"></span>
						</div>
						<div class="rate_2 form-group promotion_opportunities">
							<label>Cơ hội thăng tiến</label>
							<ul class="list-inline rating-list">
			                    <li><i class="fa fa-star"></i></li>
			                    <li><i class="fa fa-star"></i></li>
			                    <li><i class="fa fa-star"></i></li>
			                    <li><i class="fa fa-star"></i></li>
			                    <li><i class="fa fa-star"></i></li>
			                </ul>
			                <span class="show_rate"></span>
						</div>
					</div>
					<div class="bottom_right">
					<?
						$array_main_option = [
							['title'=>'Sẽ giới thiệu cho bạn bè','class'=>'recommend'],
							['title'=>'Hài lòng về môi trường làm việc','class'=>'workEnvironment
							'],
							['title'=>'Hài lòng về lãnh đạo công ty','class'=>'forBoss']
						];
						foreach($array_main_option as $items => $item){
							echo '
							<div class="item">
								<label for="">'.$item['title'].'</label>
								<div class="main_option '.$item['class'].'">
									<div data-id="1" class="item_option like"><i class="fa fa-thumbs-up" aria-hidden="true"></i></div>
									<span class="span_like">Đồng ý</span>
									<div data-id="2" class="item_option non"><i class="fa fa-window-minimize" aria-hidden="true"></i></div>
									<span class="span_non">Không ý kiến</span>
									<div data-id="3" class="item_option dis_like"><i class="fa fa-thumbs-down" aria-hidden="true"></i></div>
									<span class="span_dis_like">Không đồng ý</span>
								</div>
							</div>';
						}
					?>
					</div>
				</div>
			</div>
			<div class="check_submit">
				<label class="container">Tôi đồng ý với <a href="/thoa-thuan-su-dung.html" rel="nofollow">điều khoản sử dụng</a> của Timviec365.com. Tôi cam đoan chia sẻ vì kinh nghiệm làm việc của tôi tại công ty hiện tại/ trước đây của tôi là thật.
					<input type="checkbox" checked="checked">
					<span class="checkmark"></span>
				</label>
				<div class="main_sentdg">
					<a class="sent_dg" data-id="<?=$idco?>">Gửi đánh giá</a>
				</div>
			</div>
		</div>
		
		<div class="right_rate">
			<div class="main">
				<div class="td">TIMVIEC365.com</div>
				<div class="nd">
					<p>
					Cám ơn bạn đã đóng góp ý kiến cho cộng đồng. Ý kiến của bạn sẽ giúp người khác đưa ra quyết định về công việc và lựa chọn môi trường làm việc thích hợp.
					</p>
					<p id="nguyentac">Vui lòng tuân thủ <a>Nguyên tắc cộng đồng</a> và không đăng:</p>
					<p>- Ngôn ngữ hung hăng, phân biệt đối xử</p>
					<p>- Ngôn ngữ thô tục</p>
					<p>- Bí mật thương mại / thông tin bí mật</p>
					<p id="tks_you">Cám ơn bạn đã góp phần giữ timviec365.com là nơi đáng tin cậy để tìm kiếm một công việc mơ ước.Xem <a>Nguyên tắc cộng đồng</a> để biết thêm chi tiết</p>
				</div>
			</div>
		</div>
	</div>
	<div id="appli_success" class="hidden">
		<div class="modal-content">
	      <div class="modal-header">
	      	<p class="text-center"><i class="icon"></i></p>
	        <p class="text-center notifi">Bạn đã đánh giá doanh nghiệp thành công</p>
	      </div>
	      <div class="modal-body">
	      </div>
	      <div class="modal-footer text-center">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Hoàn thành</button>
	      </div>
	  </div>
	</div>
	<? include('../includes/inc_footer.php'); ?>
	<? include('../includes/inc_script_footer.php') ?>
	<script>
		var current_star_statusses = [];

	    star_elements = $('.ratting .fa-star').parent();

	    star_elements.find(".fa-star").each(function(i, elem)
	    {
	       current_star_statusses.push($(elem).hasClass('yellow'));
	    });
	    
	    star_elements.find(".fa-star").click(changeRatingStars);

		function changeRatingStars(){
			// Current star hovered
			var star = $(this);

			// Removes all colors first from all stars
			$('.ratting .fa-star').removeClass('gray').removeClass('yellow');

			// Makes the current hovered star yellow
			star.addClass('yellow');

			// Makes the previous stars yellow and the next stars gray
			star.parent().prevAll().children('.fa-star').addClass('yellow');
			star.parent().nextAll().children('.fa-star').addClass('gray');
		}
		function ChangeRating2(){
			e = $(this);
			spanClass = '';
			length = e.parent().find('.item_option.active').length;
			if(e.hasClass('like')){
				spanClass = '.span_like';
			}
			if(e.hasClass('non')){
				spanClass = '.span_non';
			}
			if(e.hasClass('dis_like')){
				spanClass = '.span_dis_like';
			}
			if(length == 0){
				e.addClass('active');
				e.parent().find(spanClass).addClass('active');
			}else{
				e.parent().find('.item_option').removeClass('active');
				e.parent().find('span').removeClass('active');
				if(e.hasClass('active')==false){
					e.addClass('active');
					e.parent().find(spanClass).addClass('active');
				}
			}
		}
		$('.rate_2 li .fa-star').click(function(){
			var star = $(this);
			star.parent().parent().find('.fa-star').removeClass('yellow').removeClass('gray');
			star.addClass('yellow');
			star.parent().prevAll().children('.fa-star').addClass('yellow');
			star.parent().nextAll().children('.fa-star').addClass('gray');
			count_star = star.parent().parent().find('.fa-star.yellow').length;
			if(count_star == 1){
				txt_dg = "Rất tệ";
			}
			if(count_star == 2){
				txt_dg = "Không hài lòng!";
			}
			if(count_star == 3){
				txt_dg = "Bình thường";
			}
			if(count_star == 4){
				txt_dg = "Hài lòng!";
			}
			if(count_star == 5){
				txt_dg = "Tuyệt vời!";
			}
			star.parent().parent().next().html(txt_dg);
		});
		$('.bottom_right .item_option').click(ChangeRating2);
		$('.sent_dg').click(function(){
			id = $(this).attr('data-id');
			returnForm = true;

			countStar = $('.ratting .fa-star.yellow').length;
			staff = $('.chk_question .container input:checked').attr('data-id');
			rate_com = $('#rate_com').val();
			strong = $('#strong');
			weakness = $('#weakness');
			help_com = $('#help_com').val();
			advice = $('#advice').val();
			culture_company = $('.culture_company .fa-star.yellow').length;
			welfare = $('.welfare .fa-star.yellow').length;
			boss = $('.boss .fa-star.yellow').length;
			office = $('.office .fa-star.yellow').length;
			promotion_opportunities = $('.promotion_opportunities .fa-star.yellow').length;
			
			recommend = $('.recommend .item_option.active').attr('data-id');
			work_environment = $('.workEnvironment .item_option.active').attr('data-id');
			forBoss = $('.forBoss .item_option.active').attr('data-id');

			if(recommend != undefined) recommend = recommend;
			else recommend = '';
			if(work_environment != undefined) work_environment = work_environment;
			else work_environment = '';
			if(forBoss != undefined) forBoss = forBoss;
			else forBoss = '';

			if(strong.val() == ''){
				if(!strong.hasClass('error')){
					strong.addClass('error');
					strong.after('<label class="error" id="strong_error">Bạn vui lòng nhập ưu điểm của công ty</label>');
				}
				returnForm = false;
			}else{
				strong.removeClass('error');
				$('#strong_error').remove();
			}
			if(weakness.val() == ''){
				if(!weakness.hasClass('error')){
					weakness.addClass('error');
					weakness.after('<label class="error" id="weakness_error">Bạn vui lòng nhập nhược điểm của công ty</label>');
				}
			}else{
				$('#weakness_error').remove();
				weakness.removeClass('error');
			}
			if(returnForm){
				$.ajax({
					type: "POST",
					url: "../ajax/rate_company.php",
					data: {
						id : id,
						countStar: countStar,
						staff: staff,
						rate_com: rate_com,
						strong: strong.val(),
						weakness: weakness.val(),
						help_com: help_com,
						advice: advice,
						culture_company: culture_company,
						welfare: welfare,
						boss: boss,
						office: office,
						promotion_opportunities: promotion_opportunities,
						recommend: recommend,
						work_environment: work_environment,
						forBoss: forBoss
					},success:function(data){
						if(data == 1){	
							$('#appli_success').removeClass('hidden');
							$('#appli_success').hide().show('slow');
						}
					},error:function(data){
						console.log(data);
					}
				});
			}
		});
		$('#appli_success button').click(function(){
			$('#appli_success').hide('slow');
			window.location.href = '<?=$linkCty?>'
		});
	</script>
</body>
</html>