<? 
include("config.php");
if(isset($_COOKIE['UID']))
{
   header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>Đăng ký nhà tuyển dụng tại website Timviec365.com</title>
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
						<p id="td" class="text-center">Đăng ký tài khoản nhà tuyển dụng</p>
						<form id="form_dk_ntd" onsubmit="return false;">
						<div class="form-group">
							<label for="logo" class="require">Tải lên logo:</label>
							<div class="div-right logo">
								<input type="file" id="file" name="upLoadAvatar" class="hidden" onchange="changeImg(this)">
								<div id="showbox_image" class="text-center" >
									<img src="/images/load.gif" class="lazyload" data-src="/images/img_uploadlogo.png" alt="upload Logo">
								</div>
								<span id="uploaded" class="hidden">( Đã tải ảnh logo )</span>
							</div>
						</div>
						<div class="form-group">
							<label class="require" for="">Email đăng nhập</label>
							<div class="div-right">
								<input type="text" name="email_ntd" id="email" class="form-control" placeholder="Vui lòng nhập địa chỉ Email">
							</div>
						</div>
						<div class="form-group">
							<div class="div_half">
								<label for="" class="require">Mật khẩu</label>
								<div class="div-right">
									<input type="password" name="password_first" class="form-control password" id="password" placeholder="Mật khẩu">
									<i class="fa fa-eye-slash" onclick="hide_show_password(this)" aria-hidden="true"></i>
								</div>
							</div>
							<div class="div_half pull-right">
								<label for="" class="require">Nhập lại mật khẩu</label>
								<div class="div-right">
									<input type="password" class="password form-control" name="password_second" id="re_password" placeholder="Nhập lại mật khẩu">
									<i class="fa fa-eye-slash" onclick="hide_show_password(this)" aria-hidden="true"></i>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="div_half">
								<label for="" class="require">Tên công ty</label>
								<div class="div-right">
									<input type="text" name="user_name" class="name_company form-control" placeholder="Tên công ty">
								</div>
							</div>
							<div class="div_half pull-right">
								<label for="">Mã số thuế</label>
								<div class="div-right">
									<input type="text" name="usc_mst" id="usc_mst" class="form-control" placeholder="Mã số thuế ...">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="div_half">
								<label class="require">Ngày thành lập</label>
								<div class="div-right">
									<input type="date" name="DateOfIncorporation" id="DateOfIncorporation" class="form-control" placeholder="Ngày thành lập">
								</div>
							</div>
							<div class="div_half pull-right">
								<label class="require">Loại hình công ty</label>
								<div class="div-right">
									<select name="loai_hinh_id" id="loai_hinh_id">
										<option value="0">Chọn loại hình công ty</option>
										<?
										foreach($array_loai_hinh as $key => $value){
											echo '<option value="'.$key.'">'.$value.'</option>';
										}
										?>
									</select>
									<i class="fa fa-caret-down" aria-hidden="true"></i>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="div_half">
								<label for="" class="require">Số điện thoại</label>
								<div class="div-right">
									<input type="text" class="form-control" name="phone" id="sdt" placeholder="Vui lòng nhập số điện thoại">
								</div>
							</div>
							<div class="div_half pull-right">
								<label for="">Skype hoặc Zalo</label>
								<div class="div-right">
									<input type="text" class="form-control" name="skype" id="skype" placeholder="Tài khoản Skype hoặc Zalo">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label style="width:100%" class="require">Địa chỉ công ty</label>
							<div class="div_show_address"></div>
							<div id="address_container">
								<div class="div_half">
									<div class="div-right">
										<select name="user_city" id="city">
											<option value="0">Tỉnh/Thành phố</option>
											<?
											foreach ($arrcity as $key => $value) {?>
											<option value="<?=$value['cit_id']?>"><?=$value['cit_name']?></option>
											<?
											}
											?>
										</select>
										<i class="fa fa-caret-down" aria-hidden="true"></i>
									</div>
								</div>
								<div class="div_half pull-right">
									<div class="div-right">
										<select name="usc_district" id="qh">
											<option value="0">Quận / huyện</option>
										</select>
										<i class="fa fa-caret-down" aria-hidden="true"></i>
									</div>
								</div>
								<div class="div-right">
									<input type="text" name="address_ntd" class="frm_address form-control" placeholder="Vui lòng nhập địa chỉ">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="div-right">
								<button id="add-address" class="hidden"> <span id="icon_add"><i class="fa fa-plus" aria-hidden="true"></i></span> Thêm chi nhánh</button>
							</div>
						</div>
						<div class="form-group">
							<div class="div_half">
								<label class="require" for="">Lĩnh vực hoạt động</label>
								<div class="div-right">
									<select name="financial_sector[]" id="financial_sector" multiple>
										<?
										foreach ($arrcate_company as $key => $value) {?>
										<option value="<?=$value['cate_id']?>"><?=$value['cate_name']?></option>
										<?
										}
										?>
									</select>
								</div>
							</div>		
						</div>
						<div class="form-group">
							<label for="gioithieu_congty" class="require">Giới thiệu về công ty</label>
							<div class="div-right">
								<textarea name="descripton_txtarea" id="gioithieu" cols="30" rows="10" class="form-control" placeholder="1. Giới thiệu chung về công ty.
2. Đặc điểm về nhân lực.
3. Nhu cầu tuyển dụng nhân sự.
4. Các vị trí thường xuyên tuyển dụng.
5. Quy trình tuyển dụng.
6. Quyền lợi làm việc của người lao động tại công ty.
7. Viết tối ưu nội dung, không sửa trong phần tên công ty.
Lưu ý: Số từ phải lớn hơn 50 từ"></textarea>
								<p class="pull-right wordCount"><span id="countword">0</span>/50</p>
							</div>
						</div>
						<div class="form-group">
							<label for="add_picture_company">Thêm hình ảnh công ty:</label>
							<div class="div-right">
								<div id="addPictureCompany_Regis">
									<div class="item" id="add">
										<img src="/images/icon365_manager/add_images.png" alt="add images">
									</div>
								</div>
							</div>
							<input type="file" id="file_image"  name="file_images[]" class="hidden" multiple>
						</div>
						<div class="ques form-group text-center">
							<button type="submit" name="Submit" id="submit_register">Đăng ký</button>
							<p>Bạn đã có tài khoản? <a href="/dang-nhap-nha-tuyen-dung.html">Đăng nhập ngay</a></p>
						</div>	
					</form>
					</div>
				</div>
			</div>
		</div>
		<div class="loader_xt hidden">
			<span class="fa fa-spinner xoay load_cv"></span>
		</div>
		<?
			include('../includes/inc_script_footer.php'); 
		?>
		<script src="/js/validate_ntd.js?v=<?=$version?>"></script>
		<script>
			$(document).ready(function(){
				$('#city,#qh,#loai_hinh_id').select2({
					width: "100%"
				});
				$('#financial_sector').select2({
					maximumSelectionLength: 3,
					placeholder: "Chọn 1 hoặc tối đa 3 lĩnh vực hoạt động",
					width:'100%'
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
				$('#addPictureCompany_Regis #add').click(function(){
					$('#file_image').click();
				});
				$('#file_image').change(function () {
					let count_item = $('#addPictureCompany_Regis .item').length - 1;
					let fileList = $('#file_image').prop('files');
					listLength = fileList.length;
					let count = (count_item - listLength  < 0) ? listLength : 6 - count_item;
					if (listLength <= 6) {
						for (let i = 0; i < count; i++) {
							let file = fileList[i];
							if (file != undefined) {
								let type = file.type;
								let size = file.size;
								let match = ["image/gif", "image/png", "image/jpg", "image/jpeg", "image/jfif", "image/PNG"];
								if ((type == match[0] || type == match[1] || type == match[2] || type == match[3] || type == match[4] || type == match[5]) && size < 2097152) {
									setupReader(file);
								}
							}
						}
						if(count_item + count == 6 ) $('#addPictureCompany_Regis #add').addClass('hidden');
					} else alert('Bạn chỉ có thể tải tối đa 6 ảnh');
					return false;
				});
			});
			function setupReader(file){
				let fileReader = new FileReader();
				fileReader.onload = function(progressEvent) {
					let url = fileReader.result;
					item = '<div class="item"><img src="'+url+'"><i onclick="clearImage(this)" class="fa fa-times-circle" aria-hidden="true"></i></div>';
					$('#addPictureCompany_Regis').prepend(item);
				}
				fileReader.readAsDataURL(file);
			}
			function clearImage (e){
				let count_item = $('#addPictureCompany_Regis .item').length;
				if(count_item == 7) $('#addPictureCompany_Regis #add').removeClass('hidden');
				$(e).parent().remove();
			}
		</script>
	</body>
	</html>
	