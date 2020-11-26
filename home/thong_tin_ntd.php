<?
	include('config.php');
	session_start();
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
	<link rel="stylesheet" href="/css/font-awesome.min.css" media='all' onload="if(media!='all')media='all'">
	<link rel="stylesheet" href="/css/select2.min.css">
	<link rel="stylesheet" href="/css/select2.theme.css">
	<link rel="stylesheet" href="/css/style.min.css" media='all' onload="if(media!='all')media='all'">
	<link rel="stylesheet" href="/css/style_company_manager.css?v=<?=$version?>" media='all' onload="if(media!='all')media='all'">
		<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<style>
#city_error,#qh_error{
	width:100%;
}
</style>
	</head>
	<body class="manager">
	<? include('../includes/inc_left_ntdmanager.php'); ?>
	<div class="right_manager">
	<? include('../includes/inc_header_ntd_manager.php');?>
	<div class="box_update main">
		<div class="title_manager">Thông tin tài khoản</div>
			<div class="main_update first main">
				<div class="right">
					<form action="../codelogin/change_avt_ntd.php" method="POST" enctype="multipart/form-data">
						<div class="avatar">
						<img src="/images/load.gif" class="lazyload images" data-src="<?= str_replace('../', $domain.'/', geturlimageAvatar($row_com['usc_create_time']).$row_com['usc_logo'])  ?>" onerror='this.onerror=null;this.src="/images/icon365_manager/no_avatar_com.png";' alt="Logo ntd">
						<span><i class="fa fa-camera-retro" aria-hidden="true"></i></span>
						</div>
						<input name="avatar" type="file" class="hidden">
						<input id="submit_avatar" type="submit" name="Submit" class="hidden">
					</form>
				</div>
				<div class="left">
					<div class="form-group">
						<label for="">Email đăng nhập</label>
						<input type="text" class="form-control" value="<?= $row_com['usc_email']?>" readonly>
					</div>
					<div class="form-group">
						<label for="">Mật khẩu</label>
						<input class="form-control" value="timviec365" type="password" readonly>
					</div>
				</div>
			</div>
		<form action="/codelogin/updateNTD_ttcn.php" class="form_update" method="POST" onsubmit="return vali_EditTTCN()">
			<div class="title_manager">Thông tin nhà tuyển dụng</div>
			<div class="main_update main">
				<div class="form-group">
					<label class="required" for="">Tên công ty</label>
					<input id="name_company" class="form-control" name="name" value="<?= $row_com['usc_company']?>" type="text">
				</div>
				<div class="left">
					<div class="form-group">
						<label for="">Tổng giám đốc</label>
						<input type="text" name="usc_boss" class="form-control" id="usc_boss" value="<?= $row_com['usc_boss'] ?>">
					</div>
					<div class="form-group">
						<label for="" class="required">Số điện thoại cố định</label>
						<input type="text" name="phone" class="form-control" id="usc_phone" value="<?= $row_com['usc_phone'] ?>">
					</div>
					<div class="form-group">
						<label for="" class="required">Lĩnh vực hoạt động</label>
						<select name="financial_sector[]" id="financial_sector" class="form-control" multiple>
							<?
							$financial_sector = explode(',',$row_com['financial_sector']);
							foreach ($arrcate_company as $key => $value) {
							?>
							<option <?= (in_array($key,$financial_sector))?"selected":"" ?> value="<?=$value['cate_id']?>"><?=$value['cate_name']?></option>
							<?
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Skype</label>
						<input type="text" name="skype" class="form-control" value="<?= $row_com['usc_skype'] ?>">
					</div>
				</div>
				<div class="right">
					<div class="form-group">
						<label for="" class="required">Quy mô công ty</label>
						<select name="quymo" id="usc_size" class="form-control">
							<?
							foreach ($array_quy_mo as $key => $value) {
							?>
							<option <?= ($key==$row_com['usc_size'])?"selected":"" ?> value="<?=$key?>"><?=$value?></option>
							<?
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Mã số thuế</label>
						<input type="text" name="mst" class="form-control" placeholder="Nhập mã số thuế">
					</div>
					<div class="form-group">
						<label for="">Website</label>
						<input type="text" name="website" class="form-control" value="<?= $row_com['usc_website'] ?>">
					</div>
					<div class="form-group">
						<label class="required" for="">Ngày thành lập công ty</label>
						<input type="date" name="DateOfIncorporation" id="DateOfIncorporation" class="form-control" value="<?= ($row_com['DateOfIncorporation']>0)?date('Y-m-d',$row_com['DateOfIncorporation']):"" ?>">
					</div>
				</div>
				<div style="clear:both"></div>
				<div class="div_show_address">
					<?
						$arr_city = explode(',',$row_com['usc_city']);
						$arr_district = explode(',',$row_com['usc_district']);
						$arr_addr = explode('|',$row_com['usc_address']);
						
						for ($i = 0; $i < count($arr_city);$i++) {
							$u = $i;
							$u = ++$u;
							$txt_ChiNhanh = (count($arr_city) < 1)?"Trụ sở chính":"Chi nhánh $u";
							$CitId = $arr_city[$i];
							$DistrictId = $arr_district[$i];
							$item = '<div class="item" data-cit="'. $CitId .'" data-district="'.$DistrictId.'" data-addr="' . $arr_addr[$i] . '">';
							$item .= '<label class="lbl_show_address" for="">' . $txt_ChiNhanh . ':</label>';
							$item .= '<div class="main_show_address">';
							$item .= '<button onclick="clear_address(this)" class="close">x</button>';
							$item .= '<img src="/images/load.gif" alt="Images Show address" class="lazyload show_address" data-src="/images/show_address_reg.png">';
							$item .= '<div class="div_right_address">';
							$item .= '<div>';
							$item .= '<span class="district_city_show">' . $db_district[$DistrictId]['cit_name'] . '</span>';
							$item .= '<span class="district_city_show">' . $arrcity[$CitId]['cit_name'] . '</span>';
							$item .= '</div>';
							$item .= '<div class="address">';
							$item .= '<span>Địa chỉ:</span> ' . $arr_addr[$i] . '</div>';
							$item .= '</div>';
							$item .= '</div>';
							$item .= '</div>';
							echo $item;
						}
					?>
				</div>
				<div id="address_container" class="hidden">
					<div class="left">
						<div class="form-group">
							<label class="required" for="">Tỉnh / Thành phố</label>
							<select name="city" id="usc_city" class="form-control">
								<option value="0">Chọn tỉnh / thành phố</option>
								<?
								foreach ($arrcity as $key => $value) {
								?>
								<option value="<?=$value['cit_id']?>"><?=$value['cit_name']?></option>
								<?
								}
								?>
							</select>
						</div>
					</div>
					<div class="right">
						<div class="form-group">
						<!-- " -->
							<label class="required" for="">Quận / huyện</label>
							<select onchange="show_address()" name="district" id="usc_disctrict" class="form-control">
								<option value="0">Chọn quận / huyện</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="required">Địa chỉ công ty</label>
						<input type="text" onblur="show_address()" name="address" id="usc_address" class="form-control" placeholder="Nhập địa chỉ công ty">
					</div>
					<input type="text" name="name_city" id="txt_city" class="hidden">
					<input type="text" name="name_district" id="txt_district" class="hidden">
					<input type="text" name="name_addr" id="addr" class="hidden">
				</div>
				<div class="form-group">
					<button type="button" onclick="add_addr(this)" id="btn_add_address" class=""> <span id="icon_add"><i class="fa fa-plus" aria-hidden="true"></i></span> Thêm địa điểm làm việc</button>
				</div>
				<div class="form-group">
					<label for="" class="required">Giới thiệu về công ty</label>
					<textarea type="text" rows="10" name="info" id="usc_company_info" class="form-control"><?= $row_com['usc_company_info'] ?></textarea>
				</div>
				<div class="form-group">
					<label for="">Thêm hình ảnh công ty</label>
					<?
						if(isset($_SESSION['error_image'])) {
							echo $_SESSION['error_image'];
							unset($_SESSION['error_image']);
						}
					?>
					<div class="add-images" >
						<?
						if($row_com['image_com']!=''){
							$image_com = explode(',',$row_com['image_com']);
							foreach($image_com as $key => $value){
							?>
							<div class="item">
							<img src="/images/load.gif" class="lazyload" data-src="<?="../pictures/images_company/".$value?>" alt="<?=$value?>">
							</div>
							<?
							}
						}
						?>
					</div>
					<div class="main">
						<div class="item" id="item_add">
							<img src="/images/icon365_manager/add_images.png" alt="add images">
						</div>
					</div>
				</div>
			</div>
			<div class="title_manager">Thông tin liên hệ</div>
			<div class="main_update form_update main">
				<div class="left">
					<div class="form-group">
						<label for="" class="required">Người liên hệ</label>
						<input type="text" name="name_us" id="usc_name" class="form-control" value="<?= $row_com['usc_name'] ?>">
					</div>
				</div>
				<div class="right">
					<div class="form-group">
						<label for="" class="required">Địa chỉ liên hệ</label>
						<input type="text" name="add_us" id="usc_name_add" class="form-control" value="<?= $row_com['usc_name_add'] ?>">
					</div>
				</div>
				<div class="left">
					<div class="form-group">
						<label for="" class="required">Số điện thoại liên hệ</label>
						<input type="text" name="phone_us" id="usc_name_phone" class="form-control" value="<?= $row_com['usc_name_phone'] ?>">
					</div>
				</div>
				<div class="right">
					<div class="form-group">
						<label for="" class="required">Email liên hệ</label>
						<input name="email_us" type="text" id="usc_name_email" class="form-control" value="<?= $row_com['usc_name_email'] ?>">
					</div>
				</div>
				<div class="text-center">
					<input type="submit" id="update_infor_company" value="Cập nhật">
				</div>
			</div>
			</form>
			<form action="" method="POST" enctype="multipart/form-data">
				<input type="file" id="file_image"  name="file_images[]" class="hidden" multiple>
				<input type="submit" name="submit" value="1" id="submit_image" class="hidden">
			</form>
	</div>
	</div>
		<?
			include('../includes/inc_footer.php');
			include('../includes/inc_script_footer.php');
		?>
		<script>
			$(document).ready(function(){
				$('#usc_city,#usc_size,#usc_disctrict').select2({
					width:'100%'
				});
				$('#financial_sector').select2({
					maximumSelectionLength: 3,
					placeholder: "Chọn tối đa 3 lĩnh vực tài chính",
					width:'100%'
				});
				$('#usc_city').change(function(){
					e = $(this);
					city_id = e.val();
					if(city_id == 0){
						if(!e.hasClass('error')){
							e.addClass('error');
							e.parent().append("<label id='city_error' class='error'>Vui lòng chọn tỉnh / thành phố</label>");
						}
					}else{
						$.ajax({
							type:"POST",
							url:"../ajax/get_quanhuyen.php",
							data:{
								id: city_id
							},success:function(html){
								$('#usc_disctrict').html(html);
								show_address();
							}
						});
					}
				});
			});
			function show_address() {
				var city = $('#usc_city');
				var district = $('#usc_disctrict');
				var address = $('#usc_address');
				var addForm = true;
				var item = '';
				if (city.val() == 0) {
					if (!city.hasClass('error')) {
						city.addClass('error');
						city.parent().append("<label id='city_error' class='error'>Vui lòng chọn tỉnh / thành phố</label>");
					}
					addForm = false;
				} else {
					city.removeClass('error');
					$('#city_error').remove();
				}
				if (district.val() == 0) {
					if (!district.hasClass('error')) {
						district.addClass('error');
						district.parent().append("<label id='qh_error' class='error'>Vui lòng chọn quận / huyện</label>");
					}
					addForm = false;
				} else {
					district.removeClass('error');
					$('#qh_error').remove();
				}
				if (address.val() == '') {
					if (!address.hasClass('error')) {
						address.addClass('error');
						address.after("<label id='address_com_error' class='error'>Vui lòng nhập địa chỉ hiện tại</label>");
					}
					addForm = false;
				} else {
					address.removeClass('error');
					$('#address_com_error').remove();
					if(addForm){
						$.ajax({
							type: "POST",
							dataType: "Json",
							async: false,
							url: "../ajax/checkInfoCompany.php",
							data: {
								address: address.val()
							}, success: function (data) {
								if (data.result == false) {
									if (address.hasClass('error') == false) {
										address.addClass('error');
										address.after('<label id="address_com_error" class="error">' + data.msg + '</label>');
										addForm = false;
									}
								}
							}
						});
					}
					if(addForm){
						if ($('.div_show_address .item').length > 0) {
							$('.div_show_address .item').each(function () {
								if ($(this).data('addr') == address.val().trim()) {
									if (address.hasClass('error') == false) {
										address.addClass('error');
										address.after('<label id="address_com_error" class="error">Bạn đã nhập địa chỉ này rồi, vui lòng kiểm tra lại</label>');
									}
									addForm = false;
								}
							});
						}
					}
				}
				if (addForm) {
					txt_city = $('#select2-usc_city-container');
					txt_district = $('#select2-usc_disctrict-container');
					txt_address = address.val();
					count = $('.div_show_address .item').length;
					count++;
					txt_ChiNhanh = (count == 0) ? "Trụ sở chính" : "Chi nhánh " + count;
					if (count <= 5) {
						item = '<div class="item" data-cit="' + city.val() + '" data-district="' + district.val() + '" data-addr="' + address.val() + '">';
						item += '<label class="lbl_show_address" for="">' + txt_ChiNhanh + ':</label>';
						item += '<div class="main_show_address">';
						item += '<button onclick="clear_address(this)" class="close">x</button>';
						item += '<img src="/images/load.gif" alt="Images Show address" class="lazyload show_address" data-src="/images/show_address_reg.png">';
						item += '<div class="div_right_address">';
						item += '<div>';
						item += '<span class="district_city_show">' + txt_district.html() + '</span>';
						item += '<span class="district_city_show">' + txt_city.html() + '</span>';
						item += '</div>';
						item += '<div class="address">';
						item += '<span>Địa chỉ:</span> ' + txt_address + '</div>';
						item += '</div>';
						item += '</div>';
						item += '</div>';

						$('.div_show_address').append(item);
						city.val(0);
						district.val(0);
						address.val('');
						txt_city.html('Tỉnh/Thành phố');
						txt_district.html('Quận / huyện');
					}
					if (count < 5) {
						$('#btn_add_address').removeClass('hidden');
					}
					$('#address_container').addClass('hidden');
				}
			}
			function add_addr(e){
				$('#address_container').removeClass('hidden');
				$(e).addClass('hidden');
			}
		</script>
		<script src="/js/validate_ntd.js?v=<?=$version?>"></script>
		<script src="/js/update_ntd.js?v=<?=$version?>"></script>
	</div>
</body>
</html>