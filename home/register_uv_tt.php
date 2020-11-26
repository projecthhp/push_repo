<? 
include("config.php");
if(!isset($_COOKIE['xt']) && !isset($_COOKIE['UID']))
{
   header('Location: dang-ky-ung-vien.html');
}
$xt = 1;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>Đăng ký ứng viên tại website Timviec365.com</title>
		<meta name="descripton" content="Đăng ký ứng viên. Tìm việc làm nhanh chóng, hiệu quả nhất,  đăng tin tìm việc làm tốt 24h, tuyển dụng việc làm tất cả ngành nghề nhanh nhất, tìm kiếm việc làm tại Timviec365.vn"/>
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
		<div class="register register_2 main">
	<div class="back"><a href="/dang-ky-ung-vien.html"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></div>
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
					<a class="downLoad_App Timviec365" href=""><i class="icon"></i>Tải app Timviec365</a>
				</div>
				<div class="item">
					<img src="/images/load.gif" class="lazyload" data-src="/images/qr_app_job.png" alt="Qr app CV">
					<a class="downLoad_App CV365" href=""><i class="icon"></i>Tải app CV365</a>
				</div>
			</div>
		</div>
		<div class="right">
			<div class="main">
				<p class="text-center"><img src="/images/load.gif" class="lazyload" data-src="/images/logo-new.png" alt="Logo Register"></p>
				<p id="td" class="text-center">Hoàn thiện đăng ký hồ sơ ứng viên</p>
				<form action="/codelogin/register_uv.php" class="registerform" method="POST" onsubmit="return checkvali_UVHT()">
					<div class="form-group bithday">
						<label for="" class="require">Ngày sinh</label>
						<div class="div-right">
							<input type="date" id="birthday" name="birthday" class="form-control" placeholder="Ngày/tháng/năm sinh">
						</div>
					</div>
					<div class="form-group gender">
						<label for="" class="require">Giới tính</label>
						<div class="div-right">
							<select name="gender" id="gender">
						<?
								foreach ($array_gioi_tinh_tt as $key => $value) {
								?>
								<option value="<?= $key?>"><?= $value ?></option>
								<?
								}
								?>
							</select>
							<i class="fa fa-caret-down" aria-hidden="true"></i>
						</div>
					</div>
					<div class="form-group honnhan">
						<label for="" class="require">Tình trạng hôn nhân</label>
						<div class="div-right">
						<select name="lg_honnhan" id="honnhan">
						<?
						foreach ($array_hon_nhan as $key => $value) {
						?>
						<option value="<?= $key ?>"><?= $value ?></option>
						<?
						}
						?>
						</select>
						<i class="fa fa-caret-down" aria-hidden="true"></i>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="require">Trường học</label>
						<div class="div-right">
							<input type="text" id="school" class="form-control" name="school_name" placeholder="Nhập tên trường học">
						</div>
					</div>
					<div class="width-100 pull-left">
						<div class="form-group exp_uv">
							<label for="" class="require">Kinh nghiệm làm việc</label>
							<div class="div-right">
								<select name="exp_years" id="exp_uv">
								<option value="">Chọn số năm kinh nghiệm</option>
								<?
								foreach ($array_kinh_nghiem_uv as $key => $value) {
								?>
								<option value="<?= $key ?>"><?= $value ?></option>
								<?
								}
								?>
							</select>
								<i class="fa fa-caret-down" aria-hidden="true"></i>
							</div>
						</div>
						<div class="form-group mucluong">
							<label for="" class="require">Mức lương mong muốn</label>
							<div class="div-right">
								<select name="salary" id="mucluong">
									<?
									foreach ($array_muc_luong as $key => $value) {
									?>
									<option value="<?= $key ?>"><?= $value ?></option>
									<?
									}
									?>
								</select>
								<i class="fa fa-caret-down" aria-hidden="true"></i>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="" class="require">Hình thức làm việc</label>
						<div class="div-right">
							<select name="work_option" id="hinhthuc">
								<option value="0">Chọn hình thức làm việc</option>
								<?
								foreach ($array_hinh_thuc as $key => $value) {
								?>
								<option value="<?= $key ?>"><?= $value ?></option>
								<?
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group capbac">
						<label for="" class="require">Cấp bậc</label>
						<div class="div-right">
							<select name="cap_bac_mong_muon" id="capbac">
								<?
								foreach ($array_capbac as $key => $value) {
								?>
								<option value="<?= $key ?>"><?= $value ?></option>
								<?
								}
								?>
							</select>
							<i class="fa fa-caret-down" aria-hidden="true"></i>
						</div>
					</div>
					<div class="form-group">
						<label for="muc_tieu_nn" class="require">Mục tiêu làm việc</label>
						<span>(Bạn có thể chọn nhiều mục tiêu nghề nghiệp hoặc thêm mô tả)</span>
						<div class="item muctieu frm_op2 div-right">
							<div class="checkbox">
							<?
							foreach ($array_muctieu as $key => $value) {
							?>
							<input <?= ($key == 1 || $key == 2 || $key == 3)?'checked':"" ?> id="check<?=$key?>" type="checkbox" name="muc_tieu_nghe_nghiep[]" class="muctieu" value="<?=$value?>">
							<label for="check<?=$key?>"><?= $value ?></label>
							<?
							}
							?>
							</div>
							<p>Thêm mô tả mục tiêu nghề nghiệp:</p>
							<textarea name="muc_tieu_nghe_nghiep[]" id="muc_tieu_nghe_nghiep" rows="5"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="kynang_banthan" class="require">Kỹ năng bản thân</label>
						<span>(Bạn có thể chọn nhiều kỹ năng bản thân hoặc thêm mô tả)</span>
						<div class="item skill frm_op2 div-right">
							<div class="checkbox">
							<?
							$i = 6;
							foreach ($array_kinang as $key => $value) {
							?>
							<input <?= ($i == 6 || $i == 7 || $i == 8)?'checked':"" ?> class="kinang" id="check<?=$i?>" type="checkbox" name="ki_nang_ban_than[]" value="<?=$value?>">
							<label for="check<?=$i?>"><?= $value ?></label>
							<?
							$i++;
							}
							?>
							</div>
							<p>Thêm mô tả kỹ năng bản thân:</p>
							<textarea name="ki_nang_ban_than[]" id="ki_nang_ban_than" rows="5"></textarea>
						</div>
						<div class="pull-left width-100 text-center thoathuan_dangky">Bằng việc nhấn nút đăng ký, bạn đã đồng ý với <a rel="nofollow" href="/thoa-thuan-su-dung.html">thỏa thuận sử dụng</a> của Timviec365.com</div>
					</div>
					<div class="form-group text-center">
						<button type="submit" name="Submit">Đăng ký</button>
					</div>
					
				</form>
				
			</div>
		</div>
		</div>
</div>
		<?include('../includes/inc_script_footer.php'); ?>
		<script>
			$('#gender,#honnhan,#xeploai,#exp_uv,#mucluong,#hinhthuc,#capbac').select2({
				width:'100%'
			});
		</script>
		<script src="/js/validate_uv.js?v=<?=$version?>"></script>
	</body>
	</html>
	