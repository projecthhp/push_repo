<? 
include("config.php");
$canonical = "https://timviec365.com".$_SERVER['REQUEST_URI'];
$idco = getValue('idco','int','GET',0);

$db_qr = new db_query("SELECT usc_id,usc_company,usc_alias FROM user_company WHERE usc_id = ".$idco);
$num_rows = mysql_num_rows($db_qr->result);
if($num_rows == 0 || $idco == 0) redirect('/home/404.php');
$row = mysql_fetch_assoc($db_qr->result);
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
			<li><a href="<?=rewrite_company($row['usc_id'],$row['usc_company'],$row['usc_alias'])?>"><?=name_company($row['usc_company'])?></a></li>
			<li class="active"><a><h1>Đánh giá cuộc phỏng vấn tại <?=name_company($row['usc_company'])?></h1></a></li>
		</ul>
	</div>
	<div class="box_rate main">
		<div class="left_rate">
			<div class="top_white main">
				<div class="td">hãy cho chúng tôi biết về cuộc phỏng vấn tại công ty này</div>
				<p class="gt">Chỉ một vài phút thôi! Đánh giá ẩn danh của bạn sẽ giúp những người tìm việc khác có thêm kinh nghiệm quý báu.</p>
				<div class="box_tt box_rate_pv main">
					<div class="item">
						<label  class="question require">Đánh giá trải nghiệm chung</label>
						<div class="box_feeling main">
							<?
								$array_feel = [
									[
										'key' => '1',
										'val' => 'Dễ',
										'class' => 'easy'
									],
									[
										'key' => '2',
										'val' => 'Trung bình',
										'class' => 'normal'
									],
									[
										'key' => '3',
										'val' => 'Khó',
										'class' => 'hard'
									]
								];
							?>
							<div class="main_feeling">
								<?
									foreach($array_feel as $keys => $key){
								?>
								<div class="item_feel <?=$key['class']?>" data-id="<?=$key['key']?>"><i class="icon"></i><span><?=$key['val']?></span></div>
								<?}?>
							</div>
						</div>
					</div>
					<div class="item">
						<label class="question require">Vị trí ứng tuyển</label>
						<input type="text" id="position" class="main" placeholder="Bạn đã ứng tuyển vị trí gì?">
					</div>
					<div class="item">
						<label class="question require">Mô tả quá trình phỏng vấn</label>
						<textarea name="" id="description" placeholder="Mô tả ngắn gọn quá trình tuyển dụng và phỏng vấn ( tối thiểu 30 từ ) "></textarea>
					</div>
					<div class="item">
						<label class="question require">Câu hỏi phỏng vấn</label>
						<textarea name="" id="question" placeholder="Bạn đã nhận được những câu hỏi gì?"></textarea>
					</div>
					<div class="item">
						<label class="question require">Câu trả lời phỏng vấn</label>
						<textarea name="" id="answer" placeholder="Bạn đã trả lời như thế nào?"></textarea>
					</div>
					<!-- <div class="item">
						<label  class="question require">Câu hỏi phỏng vấn 2</label>
						<textarea name="" id=""></textarea>
					</div>
					<div class="item">
						<label  class="question require">Câu trả lời phỏng vấn 2</label>
						<textarea name="" id=""></textarea>
					</div>
					<div class="add_question main">
						<a>Thêm một câu hỏi</a>
					</div> -->
				</div>
			</div>
			<div class="check_submit interview">
				<div class="main_sentdg">
					<a class="sent_dg">Gửi đánh giá</a>
				</div>
			</div>
		</div>
		<div class="right_rate">
			<div class="main">
				<div class="td">cùng chúng tôi giúp cộng đồng</div>
				<div class="nd">
					<p>
					Chia sẻ kinh nghiệm phỏng vấn của bạn với những người đang tìm việc để giúp họ có cái nhìn tổng quan những gì đang chờ đợi trong quá trình tuyển dụng.
					</p>
					<p id="tks_you">Chúng tôi sẽ kiểm duyệt các nội dung được chia sẻ để đảm bảo không vi phạm <a>Nguyên tắc cộng đồng</a> của chúng tôi trước khi nó được hiển thị lên trang web</p>
				</div>
			</div>
		</div>
	</div>
	<!-- PopUp dùng chung với popup tại chi tiết ứng viên khi lưu thông tin thành công -->
	<div id="appli_success" class="hidden">
		<div class="modal-content">
	      <div class="modal-header">
	      	<p class="text-center"><i class="icon"></i></p>
	        <p class="text-center notifi">Bạn đã gửi kinh nghiệm phỏng vấn thành công</p>
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
	<script src="/js/validate_ntd.js" defer></script>
	<script>
		function ChangeFeel(){
			e = $(this);
			length = $('.item_feel.active').length;
			if(length == 0){
				e.addClass('active');
			}else{
				$('.item_feel').removeClass('active');
				e.addClass('active');
				
			}
			$('#feeling_error').remove();
			$('.main_feeling').removeClass('error');
		}
		$('.item_feel').click(ChangeFeel);
		$('.sent_dg').click(function(){
			feel = $('.item_feel.active');
			position = $('#position');
			description = $('#description');
			question = $('#question');
			answer = $('#answer');
			returnForm = true;

			if(feel.length == 0 ){
				if(!$('.main_feeling').hasClass('error')){
					$('.main_feeling').addClass('error');
					$('.box_feeling').after('<label class="error" id="feeling_error">Bạn chưa chọn đánh giá trải nghiệm chung</label>');
				}
				returnForm = false;
			}else{
				$('#feeling_error').remove();
				$('.main_feeling').removeClass('error');
			}
			if(position.val() == ''){
				if(!position.hasClass('error')){
					position.addClass('error');
					position.after('<label class="error" id="position_error">Bạn hãy vui lòng nhập vị trí ứng tuyển</label>');
				}
				returnForm = false;
			}else{
				position.removeClass('error');
				$('#position_error').remove();
			}
			if(description.val() == ''){
				if(!description.hasClass('error')){
					description.addClass('error');
					description.after('<label class="error" id="description_error">Bạn hãy vui lòng nhập mô tả quá trình phỏng vấn</label>');
				}
				returnForm = false;
			}else{
				description.removeClass('error');
				$('#description_error').remove();
				if(wordCount(description.val()) < 30){
					if(!description.hasClass('error')){
						description.addClass('error');
						description.after('<label class="error" id="description_error">Bạn hãy vui lòng nhập mô tả quá trình phỏng vấn ít nhất 30 từ</label>');
					}
					returnForm = false;
				}else{
					description.removeClass('error');
					$('#description_error').remove();
				}
			}
			if(question.val() == ''){
				if(!question.hasClass('error')){
					question.addClass('error');
					question.after('<label class="error" id="question_error">Bạn hãy vui lòng nhập câu hỏi phỏng vấn</label>');
				}
			}else{
				$('#question_error').remove();
				question.removeClass('error');
			}
			if(answer.val() == ''){
				if(!answer.hasClass('error')){
					answer.addClass('error');
					answer.after('<label class="error" id="answer_error">Bạn hãy vui lòng nhập câu trả lời phỏng vấn</label>');
				}
				returnForm = false;
			}else{
				answer.removeClass('error');
				$('#answer_error').remove();
			}
			if(returnForm){
				feelValue = feel.attr('data-id');
				$.ajax({
					type:"POST",
					url: "../ajax/rate_pv.php",
					data:{
						idco: <?=$idco?>,
						feelValue : feelValue,
						position: position.val(),
						description: description.val(),
						question: question.val(),
						answer: answer.val()
					},success:function(data){
						if(data == 1){
							$('#appli_success').removeClass('hidden');
							$('#appli_success').hide().show('slow');
						}
					}
				});
			}
			return returnForm;
		});
		$('#position').keyup(function(){
			position = $(this);
			if(position.val() == ''){
				if(!position.hasClass('error')){
					position.addClass('error');
					position.after('<label class="error" id="position_error">Bạn hãy vui lòng nhập vị trí ứng tuyển</label>');
				}
			}else{
				position.removeClass('error');
				$('#position_error').remove();
			}
		});
		$('#description').keyup(function(){
			description = $(this);
			if(description.val() == ''){
				if(!description.hasClass('error')){
					description.addClass('error');
					description.after('<label class="error" id="description_error">Bạn hãy vui lòng nhập mô tả quá trình phỏng vấn</label>');
				}
			}else{
				description.removeClass('error');
				$('#description_error').remove();
			}	
		});
		$('#question').keyup(function(){
			question = $(this);
			if(question.val() == ''){	
				if(!question.hasClass('error')){
					question.addClass('error');
					question.after('<label class="error" id="question_error">Bạn hãy vui lòng nhập câu hỏi phỏng vấn</label>');
				}
			}else{
				$('#question_error').remove();
				question.removeClass('error');
			}
		});
		$('#answer').keyup(function(){
			answer = $(this);
			if(answer.val() == ''){
				if(!answer.hasClass('error')){
					answer.addClass('error');
					answer.after('<label class="error" id="answer_error">Bạn hãy vui lòng nhập câu trả lời phỏng vấn</label>');
				}
			}else{
				answer.removeClass('error');
				$('#answer_error').remove();
			}
		});
		$('#appli_success button').click(function(){
			$('#appli_success').hide('slow');
			window.location.href = '<?=$linkCty?>';
		});
	</script>
</body>
</html>