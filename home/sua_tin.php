<?
	include('../home/config.php');
	$id = getValue('new_id','int','GET',0);
	if($id != 0 && isset($_COOKIE["UID"]) && $_COOKIE['UT'] == 1)
	{
		$db_sl = new db_query('SELECT *,usc_name,usc_address, usc_name_phone,usc_name_email FROM new JOIN new_multi ON new.new_id = new_multi.new_id JOIN category ON new.new_cat_id = category.cat_id  JOIN user_company ON new.new_user_id = user_company.usc_id WHERE new.new_id = '.$id);
		if(mysql_num_rows($db_sl->result) > 0)
		{
			$row_bv = mysql_fetch_assoc($db_sl->result);
		}
	}
	else{
		redirect('/');
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>Đăng tin tuyển dụng | Timviec365.com</title>
		<meta name="descripton" content="Đăng ký ứng viên. Tìm việc làm nhanh chóng, hiệu quả nhất,  đăng tin tìm việc làm tốt 24h, tuyển dụng việc làm tất cả ngành nghề nhanh nhất, tìm kiếm việc làm tại Timviec365.vn"/>
		<meta name="Keywords" content="tim viec lam, viec lam nhanh, tìm việc làm nhanh, tuyển dụng việc làm, tuyen dung, kiem viec lam, tim viec lam, tim viec">
		<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui">
		<meta name="robots" content="noodp,noindex,nofollow"/>
		
		<link rel="stylesheet" href="/css/font-awesome.min.css" media='all' onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/select2.min.css">
		<link rel="stylesheet" href="/css/select2.theme.css">
		<link rel="stylesheet" href="/css/style.min.css" media='all' onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/style_company_manager.css?v=<?=$version?>" media='all' onload="if(media!='all')media='all'">
		<meta name="google-site-verification" content="EIV7wHDvaTZkVpsLjmM4_neYDyPLTmjV9du0A8ho4TU" />
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
	<body class="manager">
	<? include('../includes/inc_left_ntdmanager.php'); ?>
	<div class="right_manager">
	<? include('../includes/inc_header_ntd_manager.php'); ?>
		<div class="main box_dangtin dangtin">
			<div class="title_manager">Thông tin việc làm</div>
			<form method="POST" onsubmit="return valiDangtin(<?=(isset($_COOKIE['UID']))?$_COOKIE['UID']:""?>,'edit_new')">
			<input type="hidden" id="idNew" value="<?=$id?>">
			<div class="main_dangtin main">
				<div class="form-group">
					<label class="require" for="">Vị trí đăng tuyển</label>
					<div class="input_right">
					<input name="vi_tri_tuyen_dung" value="<?= $row_bv['new_title'] ?>" data-cate='edit_new' data-id="<?=$id?>" type="text" id="title_new" placeholder="Nhập vị trí bạn cần tuyển">
					</div>
				</div>
				<div class="form-group">
					<label class="required">Ngành nghề</label>
					<div class="main_category">
					
					<?
					$arr_nn = explode(',',$row_bv['new_cat_id']);
					
						foreach($arr_nn as $k => $v){
					?>
						<div class="item_category main">
							<div class="left">
								<select name="sl_nganh_nghe" class="nganhnghe">
									<option value="">Chọn ngành nghề</option>
									<?
									foreach ($db_cat as $key => $value)
										{
									?>
										<option <?= (in_array($value['cat_id'],$arr_nn))?"selected":"" ?> value="<?=$value['cat_id']?>"><?=$value['cat_name']?></option>
									<?
										}
									?>
								</select>
							</div>
							<div class="right hasClear">
								<select name="slTag[]" onchange="addBtnClearCategory(this)" class="slTag" multiple>
								<?
								$db_tag = new db_query("SELECT tag_id, tag_name FROM tbl_tags WHERE tag_parent = 3 AND tag_type = ".$v);
								if(mysql_num_rows($db_tag->result) > 0){
									$arr_tag = explode(',',$row_bv['new_tag']);
									While($tag = mysql_fetch_assoc($db_tag->result)){
								?>
								<option <?=(in_array($tag['tag_id'],$arr_tag))?"selected":""?> value="<?=$tag['tag_id']?>"><?=$tag['tag_name']?></option>
								<?
									}
									
								}
								?>
								</select>
							</div>
							<div class="clearCategory"><button type="button" onclick="clearCategory(this)"><i class="fa fa-times-circle" aria-hidden="true"></i>Xóa</button></div>
						</div>
					<?
						}
						if(count($arr_nn) < 3) {
							for($i = 3; $i > count($arr_nn);$i--){
								$item = '<div class="item_category hidden main">';
								$item .= '<div class="left">';
								$item .= '<select name="sl_nganh_nghe" class="nganhnghe">';
								$item .= '<option value="">Chọn ngành nghề</option>';
									foreach ($db_cat as $key => $value){
										$item .= '<option value="'.$value['cat_id'].'">'.$value['cat_name'].'</option>';
									}
								$item .= '</select>';
								$item .= '</div>';
								$item .= '<div class="right">';
								$item .= '<select name="slTag[]" onchange="addBtnClearCategory(this)" class="slTag" multiple>';
								$item .= '</select>';
								$item .= '</div>';
								$item .= '</div>';
								echo $item;
							}
							echo '<div class="main add_category">
									<button type="button">
										<span id="iconAddCategory"><i class="fa fa-plus" aria-hidden="true"></i></span>Thêm ngành nghề
									</button>		
								</div>';
						}
					?>
					</div>
					
				</div>
				
				<div class="form-group">
					<label class="main required">Địa điểm làm việc</label>
					<div id="main_address_new">
						<?
							$arr_tt = explode(',',$row_bv['new_city']);
							$arr_qh = explode(',',$row_bv['new_qh_id']);
							
							$u = 1;
							for($j = 0 ; $j < count($arr_tt); $j++){
								$cit_id = $arr_tt[$j];
								$district_id = $arr_qh[$j];
								$cit_name = $arrcity[$cit_id]['cit_name'];
								$district_name = $db_district[$district_id]['cit_name'];
								
								$item = '<div class="item" data-city="'. $cit_id . '" data-district="' . $district_id . '">';
								$item .= '<label for="" class="title_address">Cơ sở '. $u++ .': </label>';
								$item .= '<div class="main_item_address">';
								$item .= '<button type="button" onclick="remove_addr_new(this)" class="remove_addr_new">x</button>';
								$item .= '<img src="/images/show_address_reg.png" alt="Image address">';
								$item .= '<div class="ct_addr">';
								$item .= '<ul>';
								$item .= '<li class="active">' . $district_name . '</li>';
								$item .= '<li>' . $cit_name . '</li>';
								$item .= '</ul >';
								$item .= '</p>';
								$item .= '</div>';
								$item .= '</div>';
								$item .= '</div>';
								echo $item;
							}
						?>
					</div>
					<div id="main_select" class="hidden">
						<div class="left">
							<div class="input_right">
								<select onchange="get_district(this)" name="sl_dia_diem" id="dangtin_tt">
								<option value="0">Chọn tỉnh thành</option>
								<?
									foreach ($arrcity as $key => $value)
									{
										echo '<option value="'.$value['cit_id'].'">'.$value['cit_name'].'</option>';
									}
								?>
								</select>
							</div>
						</div>
						<div class="right">
							<div class="input_right">
								<select onchange="show_address_new()" name="district_new" id="district_new">
								<option value="0">Chọn quận / huyện</option>
								</select>
							</div>
						</div>
					</div>
					<input type="text" name="city" id="txt_city" class="hidden">
					<input type="text" name="district" id="txt_district" class="hidden">
				</div>
				<div class="form-group">
					<button type="button" onclick="add_addr_new(this)" id="btn_add_address"> <span id="icon_add"><i class="fa fa-plus" aria-hidden="true"></i></span> Thêm địa điểm làm việc</button>
				</div>
				<div class="right">
					<div class="form-group">
						<label class="require" for="">Hình thức làm việc</label>
						<div class="input_right">
							<select name="sl_hinh_thuc" id="hinhthuc">
								<option value="0">Chọn hình thức làm việc</option>
								<?
								foreach ($array_hinh_thuc as $key => $value) {
								?>
									<option <?= ($row_bv['new_hinh_thuc']==$key)?'selected':'' ?> value="<?=$key?>"><?=$value?></option>
								<?
								}
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="require" for="">Cấp bậc</label>
						<div class="input_right">
							<select name="sl_cap_bac" id="capbac">
							<?
								foreach ($array_capbac as $key => $value) {
							?>
								<option <?= ($row_bv['new_cap_bac']==$key)?'selected':'' ?> value="<?=$key?>"><?=$value?></option>
							<?
							}
							?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="require" for="">Mức lương</label>
						<div class="input_right">
							<select name="sl_muc_luong" id="ml">
							<?
								foreach ($array_muc_luong as $key => $value) {
							?>
								<option <?= ($row_bv['new_money']==$key)?'selected':'' ?> value="<?= $key ?>"><?=$value?></option>
							<?
								}
							?>
							</select>
						</div>
					</div>
				</div>
				<div class="left">
					<div class="form-group soluong">
						<label class="require" for="">Số lượng cần tuyển</label>
						<div class="input_right">
						<input class="sl_soluong" name="sl_soluong" type="number" min="1" value="<?= $row_bv['new_so_luong'] ?>" placeholder="Nhập số lượng">
						</div>
					</div>
					<div class="form-group">
						<label for="">Thời gian thử việc (nếu có)</label>
						<div class="input_right">
							<input type="text" name="tg_thuviec" value="<?= $row_bv['new_thuviec']?>" class="tg_thuviec" id="tg_thuviec" placeholder="VD: 3 tuần, 5 tuần, ...">
						</div>
					</div>
					<div class="form-group">
						<label for="">Hoa hồng (nếu có)</label>
						<div class="input_right">
							<input type="text" name="hoahong" value="<?=$row_bv['new_hoahong']?>" class="hoahong" id="hoahong" placeholder="VD: 25%, 35%, ...">
						</div>
					</div>
				</div>
				</div>
			<div class="title_manager">Mô tả công việc</div>
			<div class="main_dangtin main">
			<div class="form-group motacongviec">
				<label class="require" for="">Mô tả công việc</label>
				<div class="input_right">
				<textarea name="mo_ta_cv" id="mota" cols="30" rows="10" placeholder="- Tiêu đề cho vị trí công việc cần tuyển dụng là gì?
- Mục tiêu của vị trí công việc: “Vị trí này tồn tại để làm gì cho công ty?”
- Các nhiệm vụ chính của vị trí công việc là gì?
- Địa chỉ nơi làm việc
- Nội dung công việc cần thực hiện: ..."><?=strip_tags($row_bv['new_mota'])?></textarea>
				<?
				$count_txt = explode(' ', trim($row_bv['new_mota']));
				?>
				<p class="pull-right"><span id="word_mota"><? echo count($count_txt); unset($count_txt) ?></span>/50</p>
				</div>
			</div>
			</div>
			<div class="title_manager">Yêu cầu công việc</div>
			<div class="main_dangtin main">
				<div class="form-group">
					<label class="require" for="">Kinh nghiệm</label>
					<div class="input_right">
						<select name="sl_kinh_nghiem" id="kn">
							<option value="">Chọn kinh nghiệm</option>
							<option value="0">Không yêu cầu</option>
						<?
							foreach ($array_kinh_nghiem as $key => $value) {
						?>
							<option <?= ($row_bv['new_exp'] == $key)?'selected':'' ?> value="<?= $key ?>"><?=$value?></option>
						<?
							}
						?>
						</select>
					</div>
				</div>
				<div class="left">
					<div class="form-group">
						<label class="require" for="">Yêu cầu bằng cấp</label>
						<div class="input_right">
							<select name="sl_bang_cap" id="bc" >
							<?
								foreach ($array_hoc_van as $key => $value) {
							?>
								<option <?= ($row_bv['new_bang_cap'] == $key)?'selected':'' ?> value="<?= $key ?>"><?=$value?></option>
							<?
								}
							?>
							</select>
						</div>
					</div>
				</div>
				<div class="right">
					<div class="form-group">
						<label class="require" for="">Giới tính</label>
						<select name="gender" id="dangtin_gt">
						<?
							foreach ($array_gioi_tinh as $key => $value) {
						?>
								
							<option <?= ($row_bv['new_gioi_tinh']==$key)?'selected':'' ?> value='<?= $key ?>'><?=$value?></option>
						<?
							}
						?>
						</select>
					</div>
				</div>
				<div class="form-group yeucaucongviec">
					<label class="require" for="">Yêu cầu công việc</label>
					<div class="input_right">
					<textarea name="yeu_cau_cv" id="yeucau" cols="30" rows="10" placeholder="- Trách nhiệm của nhân viên cần làm là gì?
- Nhiệm vụ công việc cần thực hiện hàng ngày là gì?
- Những kỹ năng nào cần có để thực hiện công việc tốt nhất?
	+ Những kỹ năng bắt buộc (Những kỹ năng cần có là gì?)
	+ Những kỹ năng mang tính khuyến khích (Ngoài ra ứng viên có thể đáp ứng những kỹ năng nào để phát triển công việc tốt nhất?)
- Bằng cấp, chứng chỉ phù hợp với công việc
- Yêu cầu về kinh nghiệm, thái độ, phẩm chất
- Ngoài ra tùy vào đặc thù công việc tuyển dụng để nêu ra các yêu cầu khác như giới tính, ngoại hình,...
					"><?=strip_tags($row_bv['new_yeucau'])?></textarea>
					<?
					$count_txt = explode(' ', trim($row_bv['new_yeucau']));
					?>
					<p class="pull-right"><span id="word_yeucau"><? echo count($count_txt); unset($count_txt) ?></span>/50</p>
					</div>
				</div>
			</div>
				<div class="title_manager">Quyền lợi được hưởng</div>
				<div class="main_dangtin main">
					<div class="form-group quyenloiduochuong">
						<label class="require" for="">Quyền lợi được hưởng</label>
						<div class="input_right">
						<textarea name="quyen_loi" id="quyenloi" cols="30" rows="10" placeholder="- Chế độ về mức lương, thưởng, chế độ đãi ngộ.
- Các chế độ đóng bảo hiểm xã hội và phúc lợi khác của nhân viên cụ thể là gì?
- Môi trường làm việc của công ty hấp dẫn như thế nào? Có thể mang đến những cơ hội học tập, huấn luyện cho ứng viên ra sao?
- Cơ hội thăng tiến của nhân viên là như thế nào?"><?=strip_tags($row_bv['new_quyenloi'])?></textarea>
						<?
						$count_txt = explode(' ', trim($row_bv['new_quyenloi']));
						?>
						<p class="pull-right"><span id="word_quyenloi"><? echo count($count_txt); unset($count_txt) ?></span>/50</p>
						</div>
					</div>
				</div>
				<div class="title_manager">Yêu cầu hồ sơ</div>
				<div class="main_dangtin main">
					<div class="form-group hosobaogom">
						<label class="require" for="">Hồ sơ bao gồm</label>
						<div class="input_right">
						<textarea name="ho_so" id="hoso" cols="30" rows="10"><?= $row_bv['new_ho_so'] ?></textarea>
					</div>
					<div class="left">
						<div class="form-group">
							<label class="require" for="">Hạn nộp</label>
							<div class="input_right">
							<input type="date" name="han_nop_ho_so" value="<?= date('Y-m-d',$row_bv['new_han_nop']) ?>" id="han_nop_ho_so">
							</div>
						</div>
					</div>
				</div>
				</div>
				<div class="title_manager">Thông tin liên hệ</div>
				<div class="main_dangtin main">
					<div class="left">
						<div class="form-group">
							<label class="require" for="">Tên người liên hệ</label>
							<div class="input_right new_namecontact">
							<input type="text" id="new_namecontact" name="new_namecontact" value="<?= ($row_bv['new_usercontact'])?$row_bv['new_usercontact']:'' ?>">
							</div>
						</div>
					</div>
					<div class="right">
						<div class="form-group">
							<label class="require" for="">Địa chỉ liên hệ</label>
							<div class="input_right new_addresscontact">
							<input type="text" id="new_addresscontact" name="new_addresscontact" value="<?= ($row_bv['new_addcontact'])?$row_bv['new_addcontact']:'' ?>">
							</div>
						</div>
					</div>
					<div class="left">
						<div class="form-group">
							<label class="require" for="">Số điện thoại liên hệ</label>
							<div class="input_right new_phonecontact">
							<input type="text" id="new_phonecontact" name="new_phonecontact" value="<?= ($row_bv['new_phonecontact'])?$row_bv['new_phonecontact']:'' ?>">
							</div>
						</div>
					</div>
					<div class="right">
						<div class="form-group">
							<label class="require" for="">Email liên hệ</label>
							<div class="input_right new_emailcontact">
							<input type="text" id="new_emailcontact" name="new_emailcontact" value="<?= ($row_bv['new_emailcontact'])?$row_bv['new_emailcontact']:'' ?>">
							</div>
						</div>
					</div>
					<div class="form-group text-center">
						<input type="hidden" name="new_thuc" value="1" id="new_thuc">
						<input type="submit" id="btn_submit" name="Submit" value="Sửa tin" >
						<a  href="/nha-tuyen-dung/thong-tin-chung.html"><input type="button" id="cancel_new" value="Hủy tạo tin" ></a>
					</div>
				</div>

			</div>
			</form>
		</div>
	</div>
		<?
			include('../includes/inc_footer.php');
			include('../includes/inc_script_footer.php');
		?>
		<script>
			$(document).ready(function(){
				$('#tinhthanh_edit,#dangtin_gt,#capbac,#hinhthuc,#ml,#bc,#kn,#dangtin_tt,#district_new,#dangtin_gt,.nganhnghe').select2({
					width:'100%'
				});
				$('.slTag').select2({
					maximumSelectionLength: 2,
					placeholder: "Chọn tối đa 2 công việc chi tiết",
					width:'100%'
				});
			});
		</script>
		<script src="/js/validate_ntd.js?v=<?=$version?>"></script>
		<script src="/js/update_ntd.js?v=<?=$version?>"></script>
	</div>
</body>
</html>