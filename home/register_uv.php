<?

include("config.php");
include("../functions/send_mail.php");
$check_xt = '';
if(isset($_COOKIE['xt'])){
	$check_xt = 1;
	$get_ttuv = new db_query("SELECT * FROM tmp_user WHERE tmp_id = ".$_COOKIE['xt']);
	$row_ttuv = mysql_fetch_object($get_ttuv->result);
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>Đăng ký ứng viên tại website Timviec365.com</title>
		<meta name="descripton" content="Đăng ký ứng viên. Tìm việc làm nhanh chóng, hiệu quả nhất,  đăng tin tìm việc làm tốt 24h, tuyển dụng việc làm tất cả ngành nghề nhanh nhất, tìm kiếm việc làm tại Timviec365.com"/>
		<meta name="Keywords" content="tim viec lam, viec lam nhanh, tìm việc làm nhanh, tuyển dụng việc làm, tuyen dung, kiem viec lam, tim viec lam, tim viec">
		<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui">
		<meta name="robots" content="noodp,noindex,nofollow"/>
		<link rel="stylesheet" href="/css/font-awesome.min.css" media='all' onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/select2.min.css" media="all" onload="if(media!='all')media='all'">
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
	<body>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<div class="register main">
			<div class="back"><a href="/dang-ky-chung.html"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></div>
			<div class="main">
				<div class="left">
					<div class="main_item">
						<div class="item"></div>
						<div class="item"></div>
						<div class="item"></div>
					</div>
					<p class="text-center hotro">Hỗ trợ đăng ký</p>
					<p class="text-center holine">Hotline dành cho nhà tuyển dụng và ứng viên</p>
					<p class="text-center sdt_hotline"><span>0971.335.869</span>  hoặc  <span>024 36.36.66.99</span></p>
					<p class="text-center email"><b>Email:</b> timviec365com@gmail.com</p>
					<p class="text-center address"><b>Địa chỉ:</b> Số 206 Định Công Hạ , Phường Định Công, Quận Hoàng Mai, Hà Nội</p>
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
				<div class="right">
					<div class="main">
						<p class="text-center"><img src="/images/load.gif" class="lazyload" data-src="/images/logo-new.png" alt="Logo Register"></p>
						<p id="td" class="text-center">Đăng ký tài khoản ứng viên</p>
					</div>
					<p id="huongdan_b1"><b>Bước 1:</b> Vui lòng điền đầy đủ thông tin đăng ký</p>
					<div class="main">
						<form onsubmit="return false">
							<div class="form-group">
								<label for="">Ảnh đại diện</label>
								<div class="div-right">
									<input type="file" name="upLoadAvatar" id="file" class="hidden" onchange="changeImg(this)">
									<div id="showbox_image" class="text-center" >
										<img src="/images/load.gif" class="lazyload" data-src="/images/img_uploadlogo.png" alt="upload Logo">
									</div>
									<span id="uploaded" class="hidden">( Đã tải ảnh đại diện )</span>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="require">Email</label>
								<div class="div-right">
									<input type="text" value="<?= ($check_xt)?$row_ttuv->tmp_email:"" ?>" id="email" name="email_uv" class="form-control" placeholder="Nhập email">
									<i class="icon_email"></i>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="require">Mật khẩu</label>
								<div class="div-right">
									<input type="password" class="password form-control" id="password" name="password_uv" placeholder="Mật khẩu">
									<i class="fa fa-eye-slash" onclick="hide_show_password(this)" aria-hidden="true"></i>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="require">Nhập lại mật khẩu</label>
								<div class="div-right">
									<input type="password" class="password form-control" id="re_password" placeholder="Nhập lại mật khẩu">
									<i class="fa fa-eye-slash" onclick="hide_show_password(this)" aria-hidden="true"></i>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="require">Họ và tên</label>
								<div class="div-right">
									<input type="text" value="<?= ($check_xt)?$row_ttuv->tmp_name:"" ?>" class="full_name form-control" id="full_name" name="full_name" placeholder="Nhập họ và tên...">
									<i class="fa fa-user" aria-hidden="true"></i>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="require">Số điện thoại</label>
								<div class="div-right">
									<input type="text" value="<?= ($check_xt)?$row_ttuv->tmp_phone:"" ?>" class="frm_phone form-control" id="uv_phone" name="uv_phone" placeholder="Nhập số điện thoại...">
									<i class="icon_phone"></i>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="require">Tỉnh/thành phố</label>
								<div class="div-right">
									<select name="city" id="city">
										<option value="0">Tỉnh / thành phố</option>
										<?
										foreach ($arrcity as $key => $value) {
										?>
										<option <?= ($check_xt)?($key == $row_ttuv->tmp_city)?"selected":"":"" ?> value="<?= $value['cit_id']?>"><?= $value['cit_name']?></option>
										<?
										}
										?>
									</select>
									<i class="fa fa-caret-down" aria-hidden="true"></i>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="require">Quận/huyện</label>
								<div class="div-right">
									<select name="qh" id="qh">
									<?
									if($check_xt){
										$get_dict = new db_query("SELECT cit_id,cit_name FROM city2 WHERE cit_parent = ".$row_ttuv->tmp_city);
										While($row_dict = mysql_fetch_object($get_dict->result)){
									?>
									<option value="0">Quận / huyện</option>
									<option <?= ($row_dict->cit_id == $row_ttuv->tmp_distric)?"selected":"" ?> value="<?= $row_dict->cit_id ?>"><?= $row_dict->cit_name ?></option>
									<?
										}
									}else{
									?>
									<option value="0">Quận / huyện</option>
									<?
									}
									?>
								</select>
								<i class="fa fa-caret-down" aria-hidden="true"></i>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="require">Địa chỉ chi tiết</label>
								<div class="div-right">
									<input type="text" value="<?= ($check_xt)?$row_ttuv->tmp_address:"" ?>" class="form-control frm_address" id="frm_address" name="frm_address" placeholder="Nhập địa chỉ ...">
									<i class="icon_address"></i>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="require">Vị trí mong muốn</label>
								<div class="div-right" >
									<input type="text" id="frm_jobuv" value="<?= ($check_xt)?$row_ttuv->tmp_job_name:"" ?>" name="cvmm" class="form-control" placeholder="VD: Nhân viên kinh doanh, Nhân viên hành chính...">
									<i class="fa fa-briefcase" aria-hidden="true"></i>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="require">Địa điểm làm việc</label>
								<div class="div-right">
									<select name="job_address[]" id="uv_tt" multiple>
									<?
										$tmp_job_city = explode(',', $row_ttuv->tmp_job_city);
										foreach ($arrcity as $key => $value) {
									?>
										<option <?= ($check_xt)?(in_array($value['cit_id'], $tmp_job_city))?"selected":"":"" ?> value="<?= $value['cit_id'] ?>"><?= $value['cit_name'] ?></option>
									<?
										}
									?>
									</select>
									<i class="fa fa-caret-down" aria-hidden="true"></i>
								</div>
							</div>
							<div class="form-group">
								<label for="" class="require">Ngành nghề</label>
								<div class="div-right">
									<select name="nganh_nghe[]" id="uv_nn" multiple>
									<?
										$tmp_nganh_nghe = explode(',', $row_ttuv->tmp_nganh_nghe);
										foreach ($db_cat as $key => $value) {
									?>
										<option <?= ($check_xt)?(in_array($value['cat_id'], $tmp_nganh_nghe))?"selected":"":"" ?> value="<?= $value['cat_id'] ?>"><?= $value['cat_name'] ?></option>
									<?
										}
									?>
									</select>
									<i class="fa fa-caret-down" aria-hidden="true"></i>
								</div>
							</div>
							<div class="form-group submit">
								<label for=""></label>
								<div class="div-right">
									<button type="submit" id="submit_b1">Lưu thông tin</button>
								</div>
							</div>
						</form>
					</div>
					<p id="huongdan_b2">Bước 2: Hoàn thiện hồ sơ
						<span>Bạn chọn 1 trong 3 cách sau để hoàn thiện bộ hồ sơ</span>
					</p>
					<div class="main_option">
						<div class="item">
							<a href="/dang-ky-ung-vien-truc-tuyen.html" id="option_form" data-xt=<?= (isset($_COOKIE['xt']) ? $_COOKIE['xt'] : "''"); ?>>Tạo hồ sơ bằng form khai trực tuyến</a>
						</div>
						<div class="item">
							<a href="/up-load-cv.html" id="tai_cv" data-xt=<?= (isset($_COOKIE['xt']))?$_COOKIE['xt']:"''" ?>>Tải CV từ máy của bạn</a>
						</div>
						<div class="item">
							<a href="/mau-cv.html" id="tao_cv" data-xt=<?= (isset($_COOKIE['xt']))?$_COOKIE['xt']:"''" ?>>Tạo CV từ timviec365</a>
						</div>
					</div>
					<div class="main">
						<div id="huongdan">
							<p class="text-center">HƯỚNG DẪN</p>
							<p><span>Tạo hồ sơ bằng form khai trực tuyến:</span> Bạn tạo đầy đủ các thông tin của bạn để các nhà tuyển dụng có cơ sở tuyển chọn. Thông tin càng chi tiết cơ hội việc làm của bạn tăng lên.
							</p>
							<p><span>Tải CV từ máy tính của bạn:</span> Bạn đã có sẵn bản CV xin việc từ máy tính của bạn, bạn chỉ cần upload CV lên và xác nhận email là hoàn thiện quá trình đăng ký.</p>
							<p><span>Tạo CV từ Timviec365.com:</span> Là việc sửa dụng 100+ mẫu CV đã được các chuyên gia tâm lý, chuyên gia thiết kế của timviec365.com tạo ra cho bạn.</p>
						</div>
						<p class="ques text-center">Bạn đã có tài khoản? <a href="/dang-nhap-ung-vien.html">Đăng nhập ngay</a></p>
					</div>
				</div>
			</div>
		</div>
		<div id="popup_register_success" class="hidden">
			<div class="main_modal">
				<div class="modal-head">
					<img src="/images/check_success.png" alt="Images">
				</div>
				<div class="modal-body">
					<p>Bạn đã lưu thông tin thành công !</p>
					<p>Vui lòng chọn 1 trong 3 cách dưới đây để hoàn thiện hồ sơ</p>
				</div>
				<div class="modal-footer">
					<button>OK</button>
				</div>
			</div>
		</div>
		<?include('../includes/inc_script_footer.php');?>
		<script>
			$(document).ready(function(){
				$('#uv_nn').select2({
					maximumSelectionLength: 3,
					placeholder: "Chọn 1 hoặc tối đa 3 ngành nghề",
					width:'100%'
				});

				$('#uv_tt').select2({
					maximumSelectionLength: 3,
					placeholder: "Chọn 1 hoặc tối đa 3 tỉnh thành",
					width:'100%'
				});
				$('#city,#qh').select2({
					width: "100%"
				});
				$('#city').change(function(){
					id = $(this).val();
					$.ajax({
						type:"POST",
						url:"../ajax/get_quanhuyen.php",
						data:{
							id:id
						},
						success:function(data){
							$('#qh').html(data);
						}
					});
				});
			});
		</script>
		<script src="/js/validate_uv.js?v=<?=$version?>"></script>
	</body>
	</html>
	