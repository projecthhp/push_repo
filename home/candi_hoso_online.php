<?
	session_start();
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
		<link rel="stylesheet" href="/css/slick-theme.css" media='all' onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/slick.css" media='all' onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/select2.min.css" media="all" onload="if(media!='all')media='all'">
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
<div class="main_right">
	<? include('../includes/inc_header_candi_manager.php') ?>
	<div class="main_hsonline main">
		<div class="box_bieudo">
			<div class="main_bieudo">
				<div class="item ttlh <?= (isset($_COOKIE['active']))?($_COOKIE['active']=='ttlh')?"active":"":"active"?>" data-active="ttlh">
					<i class="icon"></i>
					<p class="title">Thông tin liên hệ</p>
					<? if(isset($warning_ttcn)) echo '<p class="status">(Chưa hoàn thiện)</p>'; ?>
				</div>
				<div class="item cvmm <?=(isset($_COOKIE['active']) && $_COOKIE['active']=='cvmm')?"active":""?>" data-active="cvmm">
					<i class="icon"></i>
					<p class="title">Công việc mong muốn</p>
					<? if(isset($warning_cvmm)) echo '<p class="status">(Chưa hoàn thiện)</p>'; ?>
				</div>
				<div class="item mtnn <?=(isset($_COOKIE['active']) && $_COOKIE['active']=='mtnn')?"active":""?>" data-active="mtnn">
					<i class="icon"></i>
					<p class="title">Mục tiêu nghề nghiệp</p>
					<? if(isset($warning_mtnn)) echo '<p class="status">(Chưa hoàn thiện)</p>';?>
				</div>
				<div class="item knbt <?=(isset($_COOKIE['active']) && $_COOKIE['active']=='knbt')?"active":""?>" data-active="knbt">
					<i class="icon"></i>
					<p class="title">Kỹ năng bản thân</p>
					<? if(isset($warning_knbt)) echo '<p class="status">(Chưa hoàn thiện)</p>';?>
				</div>
				<div class="item bc <?=(isset($_COOKIE['active']) && $_COOKIE['active']=='bc')?"active":""?>" data-active="bc">
					<i class="icon"></i>
					<p class="title">Bằng cấp</p>
					<? if(isset($warning_bc)) echo '<p class="status">(Chưa hoàn thiện)</p>'; ?>
				</div>
				<div class="item nnth <?=(isset($_COOKIE['active']) && $_COOKIE['active']=='nnth')?"active":""?>" data-active="nnth">
					<i class="icon"></i>
					<p class="title">Ngoại ngữ tin học</p>
					<? if(isset($warning_nn)) echo '<p class="status">(Chưa hoàn thiện)</p>'; ?>
				</div>
				<div class="item knlv <?=(isset($_COOKIE['active']) && $_COOKIE['active']=='knlv')?"active":""?>" data-active="knlv">
					<i class="icon"></i>
					<p class="title">Kinh nghiệm làm việc</p>
					<? if(isset($warning_kn)) echo '<p class="status">(Chưa hoàn thiện)</p>'; ?>
				</div>
				<div class="item ntc <?=(isset($_COOKIE['active']) && $_COOKIE['active']=='ntc')?"active":""?>" data-active="ntc">
					<i class="icon"></i>
					<p class="title">Người tham chiếu</p>
					<? if(isset($warning_ntc)) echo '<p class="status">(Chưa hoàn thiện)</p>'; ?>
				</div>
			</div>
		</div>
		<div class="box_thongtin ttlh main <?= (isset($_COOKIE['active']))?($_COOKIE['active']!='ttlh')?"hidden":"":""?>">
			<div class="head">Thông tin liên hệ</div>
			<div class="button">
				<a class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
				<a class="next active" data-address="cvmm"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			</div>
			<div class="main main_thongtin">
				<div class="image">
					<div style="display: inline-block;position: relative;">
						<img src="/images/load.gif" class="lazyload" data-src="<?= ($row['use_logo'] == '')?'/images/ico_ctuv.png':geturlimageAvatar($row['use_create_time']).$row['use_logo'] ?>" alt="Avatar Uv">
						<div class="camera"><i class="fa fa-camera" aria-hidden="true"></i></div>
						<form method="POST" action="/codelogin/change_avt_uv.php" enctype='multipart/form-data'>
							<input type="file" class="hidden" name="avatar" id="file">
							<input type="submit" class="hidden" name="Submit" id="uploadAvatar">
						</form>
					</div>
					<p class="error">
					<?
						if(isset($_SESSION['error'])){
							echo $_SESSION['error'];
							unset($_SESSION['error']);
						}
					?>
					</p>
				</div>
				<form action="/codelogin/updateUV_ttcn.php" id="information_candi" method="POST">
					<div class="right">
						<div class="item">
							<label for="" class="require">Họ và tên</label>
							<input type="text" id="user_name" name="user_name" value="<?=$row['use_name']?>">
						</div>
						<div class="item">
							<label for="" class="require">Số điện thoại</label>
							<input type="text" id="user_phone" name="user_phone" value="<?=$row['use_phone']?>">
						</div>
						<div class="item">
							<label for="" class="require">Email</label>
							<input type="text" value="<?=$row['use_mail']?>" readonly>
						</div>
						<div class="item">
							<label for="" class="require">Ngày sinh</label>
							<input type="date" name="birthday" id="birthday" value="<?=($row['birthday']!=0)?date('Y-m-d',$row['birthday']):""?>">
						</div>
						<div class="item">
							<label for="" class="require">Giới tính</label>
							<div>
								<div class="radio">
									<input type="radio" value="1" name="gender" <?=($row['gender']==1 || $row['gender'] == 0)?"checked":""?>>Nam
								</div>
								<input type="radio" value="2" name="gender" <?=($row['gender']==2)?"checked":""?>>Nữ
							</div>
						</div>
						<div class="item">
							<label for="" class="require">Tình trạng hôn nhân</label>
							<div>
								<div class="radio">
									<input type="radio" value="1" name="marriage" <?=($row['lg_honnhan']==1 || $row['lg_honnhan']==0)?"checked":""?>>Độc thân
								</div>
								<input type="radio" value="2" name="marriage" <?=($row['lg_honnhan']==2)?"checked":""?>>Đã kết hôn
							</div>
						</div>
					</div>
					<div class="box_gray tt main">
						<div class="item">
							<label for="" class="require">Quận/Huyện</label>
							<select name="district" id="district">
								<option value="0">Chọn quận huyện</option>
							<?
							if($row['use_city'] > 0){							
								$db_qrs = new db_query("SELECT cit_id, cit_name FROM city2 WHERE cit_parent = ".$row['use_city']);
								While($item = mysql_fetch_assoc($db_qrs->result))
								{
								?>
								<option <?=($item['cit_id'] == $row['use_district'])?"selected":""?> value="<?=$item['cit_id']?>"><?=$item['cit_name']?></option>
								<?
								}
								}
								unset($db_qrs,$item);
							?>
							</select>
						</div>
						<div class="item">
							<label for="" class="require">Tỉnh thành</label>
							<select name="city" id="city">
								<option value="0">Chọn tỉnh thành</option>
								<?
								foreach ($arrcity as $key => $item) {
								?>
								<option <?=($item['cit_id'] == $row['use_city'])?"selected":""?> value="<?=$item['cit_id']?>"><?=$item['cit_name']?></option>
								<?
								}
								?>
							</select>
						</div>
						<div class="item">
							<label for="" class="require">Địa chỉ</label>
							<input type="text" id="address" name="address" value="<?= $row['address']?>">
						</div>
					</div>
					<div class="main update">
						<input class="pull-right" type="submit" name="update" value="Cập nhật">
					</div>
				</form>
			</div>
		</div>
		<div class="box_thongtin main cvmm <?=(isset($_COOKIE['active']))?($_COOKIE['active']!='cvmm')?"hidden":"":"hidden"?>">
			<div class="head">Công việc mong muốn</div>
			<div class="button">
				<a class="prev active" data-address="ttlh"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
				<a class="next active" data-address="mtnn"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			</div>
			<div class="main main_thongtin ">
				<form action="/codelogin/updateUV_cvmm.php" method="POST" id="updateUV_cvmm">
					<div class="item">
						<label for="" class="require">Công việc</label>
						<input type="text" name="use_job_name" id="use_job_name" value="<?=$row['use_job_name']?>">
					</div>
					<div class="item">
						<label for="" class="require">Hình thức làm việc</label>
						<select name="work_option" id="work_option">
							<option value="0">Chọn hình thức làm việc</option>
							<? foreach ($array_hinh_thuc as $key => $item) { ?>
								<option <?= ($row['work_option']==$key)?"selected":"" ?> value="<?= $key ?>"><?= $item ?></option>
							<? } ?>
						</select>
					</div>
					<div class="item">
						<label for="" class="require">Cấp bậc mong muốn</label>
						<select name="level_desired" id="level_desired">
							<? foreach ($array_capbac as $key => $item) {?>
							<option <?= ($row['cap_bac_mong_muon']==$key)?"selected":"" ?> value="<?= $key ?>"><?= $item ?></option>
							<? } ?>
						</select>
					</div>
					<div class="item">
						<label for="" class="require">Kinh nghiệm làm việc</label>
						<select name="experience" id="experience">
							<option value="">Chọn kinh nghiệm làm việc</option>
							<? foreach($array_kinh_nghiem as $key => $item){?>
							<option <?= ($row['exp_years']==$key)?"selected":""?> value="<?= $key ?>"><?= $item ?></option>
							<?} ?>
						</select>
					</div>
					<div class="item">
						<label for="" class="require">Địa điểm làm việc</label>
						<select name="job_city[]" id="job_city" multiple="">
							<?
							$arr_city = explode(',', $row['use_district_job']);
							foreach ($arrcity as $key => $cit) {
							?>
							<option <?= (in_array($cit['cit_id'], $arr_city))?"selected":"" ?> value="<?=$cit['cit_id']?>"><?=$cit['cit_name']?></option>
							<?
							}
							unset($arr_city);
							?>
						</select>
					</div>
					<div class="item">
						<label for="" class="require">Ngành nghề mong muốn</label>
						<select name="category[]" id="job_cate" multiple>
							<?
							$arr_cate = explode(',', $row['use_nganh_nghe']);
							foreach ($db_cat as $key => $cat) {
							?>
							<option <?= (in_array($cat['cat_id'], $arr_cate))?"selected":"" ?> value="<?=$cat['cat_id']?>"><?=$cat['cat_name']?></option>
							<? } ?>
						</select>
					</div>
					<div class="item">
						<label for="" class="require">Mức lương</label>
						<select name="money" id="money">
							<? foreach ($array_muc_luong as $key => $value) { ?>
							<option <?= ($row['salary'] == $key)?"selected":"" ?> value="<?= $key ?>"><?= $value ?></option>
							<? } ?>
						</select>
					</div>
					<div class="main update">
						<input class="pull-right" type="submit" name="update" value="Cập nhật">
					</div>
				</form>
			</div>
		</div>
		<div class="box_thongtin main mtnn <?=(isset($_COOKIE['active']))?($_COOKIE['active']!='mtnn')?"hidden":"":"hidden"?>">
			<div class="head">mục tiêu nghề nghiệp</div>
			<div class="button">
				<a class="prev active" data-address="cvmm"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
				<a class="next active" data-address="knbt"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			</div>
			<form action="/codelogin/updateUV_mtnn.php" method="POST" id="candi_mtnn">
			<div class="main main_thongtin ">
				<div class="item">
					<label for="" class="require">Mô tả ngắn mục tiêu của bản thân</label>
					<textarea placeholder="VD: - Áp dụng những hiểu biết về thị trường và kinh nghiệm, kỹ năng trong hoạt động bán hàng để phấn đấu trở thành nhân viên chăm sóc khách hàng chuyên nghiệp, không chỉ đảm bảo được những lợi ích thiết thực cho khách hàng mà còn giúp công ty mở rộng hơn nữa tập khách hàng.
- Được làm việc trong môi trường giàu tính công bằng, có nhiều cơ hội thăng tiến để gắn bó lâu dài với công ty.  " name="mtnn" id="mtnn" cols="50" rows="50"><?
	$muctieu = '';
	if($row['muc_tieu_nghe_nghiep']!=''){
		$muctieu = str_replace('|', '<br>', $row['muc_tieu_nghe_nghiep']);
		$muctieu = str_replace('<br>', '&#010', $muctieu);
	} echo $muctieu;?></textarea>
				</div>
				<div class="main update">
					<input class="pull-right" type="submit" name="update" value="Cập nhật">
				</div>
			</div>
		</form>
		</div>
		<div class="box_thongtin main knbt <?=(isset($_COOKIE['active']))?($_COOKIE['active']!='knbt')?"hidden":"":"hidden"?>">
			<div class="head">Kỹ năng bản thân</div>
			<div class="button">
				<a class="prev active" data-address="mtnn"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
				<a class="next active" data-address="bc"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			</div>
			<form action="/codelogin/updateUV_knbt.php" method="POST" id="candi_knbt">
			<div class="main main_thongtin ">
				<div class="item">
					<label for="" class="require">Mô tả ngắn kỹ năng của bản thân</label>
					<textarea placeholder="- Kỹ năng giao tiếp
- Kỹ năng thuyết trình
- Kỹ năng giải quyết vấn đề
- Có khả năng làm việc dưới áp lực cao" name="knbt" id="knbt" cols="50" rows="50">
<?
$kinang = '';
if($row['ki_nang_ban_than']!=''){
	$kinang = trim(str_replace('|', '<br>', ($row['ki_nang_ban_than'])));
	$kinang = trim(str_replace('<br>', '&#010', $kinang));
}
echo $kinang;
?>
</textarea>
				</div>
				<div class="main update">
					<input class="pull-right" type="submit" name="update" value="Cập nhật">
				</div>
			</div>
		</form>
		</div>
		<div class="box_thongtin main bc <?=(isset($_COOKIE['active']))?($_COOKIE['active']!='bc')?"hidden":"":"hidden"?>">
			<div class="head">Bằng cấp</div>
			<div class="button">
				<a class="prev active" data-address="knbt"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
				<a class="next active" data-address="nnth"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			</div>
			<div class="main main_thongtin">
				<?
				$sql = "SELECT * FROM user_hocvan WHERE use_id = ".$_COOKIE['UID']." ORDER BY id_hocvan DESC";
				$db_qrs = new db_query($sql);
				$hidden_add = '';
				$hidden_edit ='';
				$countHV = mysql_num_rows($db_qrs->result);
				if($countHV > 0){
					$hidden_add = 'hidden';
				}else{
					$hidden_edit = 'hidden';
				}
				if($countHV > 0){
				?>
				<form action="/codelogin/updateUV_editHV.php" class="<?=$hidden_edit?>" method="POST" id="candi_editHV">
					<div class="gray">
						<?
						While($item = mysql_fetch_assoc($db_qrs->result)){
						?>
						<div class="item_gray">
							<div class="item">
								<label for="" class="require">Bằng cấp chứng chỉ</label>
								<input type="text" name="bccc[]" class="bccc" value="<?=$item['bang_cap']?>">
							</div>
							<div class="item">
								<label for="" class="require">Tên trường, đơn vị giảng dạy</label>
								<input type="text" name="school_name[]" class="school_name" value="<?=$item['truong_hoc']?>">
							</div>
							<div class="item">
								<label for="" class="require">Thời gian bắt đầu</label>
								<input type="date" name="start_times[]" class="start_times" value="<?=date('Y-m-d',$item['tg_batdau'])?>">
							</div>
							<div class="item">
								<label for="" class="require">Thời gian kết thúc</label>
								<input type="date" name="end_times[]" class="end_times" value="<?=date('Y-m-d',$item['tg_ketthuc'])?>">
							</div>
							<div class="item">
								<label for="" class="require">Chuyên ngành</label>
								<input type="text" name="majors[]" class="majors" value="<?=$item['chuyen_nganh']?>">
							</div>
							<div class="item">
								<label for="" class="require">Xếp loại</label>
								<select name="ranks[]" class="ranks">
									<?
									foreach ($array_xl as $key => $value) {
									?>
									<option <?= ($item['xep_loai']==$key)?"selected":"" ?> value="<?=$key?>"><?=$value?></option>
									<?
									}
									?>
								</select>
							</div>
							<div class="item textarea">
								<label for="">Thông tin bổ sung</label>
								<textarea name="hv_add_infor[]" class="hv_add_infor" cols="30" rows="10"><?
									$note = '';
									if($item['thongtin_bosung']!=''){
										$note = trim(str_replace('|', '<br>', ($item['thongtin_bosung'])));
										$note = trim(str_replace('<br>', '&#010', $note));
									}
									echo $note;
								?></textarea>
							</div>
							<input name="id_bc[]" value="<?=$item['id_hocvan']?>" class="hidden">
							<div class="text-center clear">
								<a class="btn_clear" data-id="<?=$item['id_hocvan']?>" data-type="bccc"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
							</div>
						</div>
						<?
						}
						?>
					</div>
					<div class="main">
						<a class="add bc"><span><i class="fa fa-plus" aria-hidden="true"></i></span>Thêm bằng cấp</a>
						<input class="pull-right" type="submit" name="update" value="Cập nhật">
					</div>
				</form>
				<?}?>
				<form action="/codelogin/updateUV_addhv.php" class="<?=$hidden_add?>" method="POST" id="candi_addHV">
					<div class="gray">
						<div class="item_gray">
							<div class="item">
								<label for="" class="require">Bằng cấp chứng chỉ</label>
								<input type="text" name="bccc" class="bccc" value="">
							</div>
							<div class="item">
								<label for="" class="require">Tên trường, đơn vị giảng dạy</label>
								<input type="text" name="school_name" class="school_name" value="">
							</div>
							<div class="item">
								<label for="" class="require">Thời gian bắt đầu</label>
								<input type="date" name="start_times" class="start_times" value="">
							</div>
							<div class="item">
								<label for="" class="require">Thời gian kết thúc</label>
								<input type="date" name="end_times" class="end_times" value="">
							</div>
							<div class="item">
								<label for="" class="require">Chuyên ngành</label>
								<input type="text" name="majors" class="majors" value="">
							</div>
							<div class="item">
								<label for="" class="require">Xếp loại</label>
								<select name="ranks" class="ranks">
									<?
									foreach ($array_xl as $key => $value) {
									?>
									<option value="<?=$key?>"><?=$value?></option>
									<?
									}
									?>
								</select>
							</div>
							<div class="item textarea">
								<label for="">Thông tin bổ sung</label>
								<textarea name="hv_add_infor" class="hv_add_infor" cols="30" rows="10"></textarea>
							</div>
						</div>
						<div class="main">
							<input class="pull-right" type="submit" name="update" value="Cập nhật">
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="box_thongtin main nn nnth <?=(isset($_COOKIE['active']))?($_COOKIE['active']!='nnth')?"hidden":"":"hidden"?>">
			<div class="head">ngoại ngữ - tin học</div>
			<div class="button">
				<a class="prev active" data-address="bc"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
				<a class="next active" data-address="knlv"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			</div>
			<div class="main main_thongtin ">
				<?
				$db_qrss = new db_query("SELECT * FROM use_ngoaingu WHERE use_id = ".$row['use_id']." ORDER BY id_ngoaingu DESC ");
				$countLanguage = mysql_num_rows($db_qrss->result);
				$hidden_add = '';
				$hidden_edit ='';
				if($countLanguage > 0){
					$hidden_add = 'hidden';
				}else{
					$hidden_edit = 'hidden';
				}
				?>
				<form action="/codelogin/updateUV_editnn.php" method="POST" id="candi_editnn" class="<?=$hidden_edit?>">
					<div class="gray">
						<?
						While($item = mysql_fetch_assoc($db_qrss->result)){
						?>
						<div class="item_gray">
							<div class="box">
								<div class="item">
									<select name="language[]" class="language">
										<?
										foreach ($array_ngon_ngu as $key => $value) {
										?>
										<option <?= ($item['id_ngonngu']==$key)?"selected":"" ?> value="<?= $key ?>"><?= $value ?></option>
										<?
										}
										?>
									</select>
								</div>
								<div class="item">
									<input type="text" name="certificate[]" class="certificate" value="<?=$item['chung_chi']?>">
								</div>
								<div class="item">
									<input type="text" class="result" name="result[]" value="<?=$item['ket_qua']?>">
								</div>
								<input type="text" class="hidden" name="id_language[]" value="<?=$item['id_ngoaingu']?>">
							</div>
							<div class="text-center main clear">
								<a class="btn_clear" data-id="<?=$item['id_ngoaingu']?>" data-type="nn"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
							</div>
						</div>
						<?
						}
						unset($db_qrss,$item);
						?>
					</div>
					<div class="main">
						<a class="add bc"><span><i class="fa fa-plus" aria-hidden="true"></i></span>Thêm ngoại ngữ</a>
						<input class="pull-right" type="submit" name="update" value="Cập nhật">
					</div>
				</form>
				<form action="/codelogin/updateUV_addnn.php" method="POST" id="candi_addnn" class="<?=$hidden_add?>">
					<div class="gray">
						<div class="item_gray">
							<div class="box">
								<div class="item">
									<select name="language" class="language">
										<?
										foreach ($array_ngon_ngu as $key => $value) {
										?>
										<option value="<?= $key ?>"><?= $value ?></option>
										<?
										}
										?>
									</select>
								</div>
								<div class="item">
									<input type="text" name="certificate" class="certificate" value="" placeholder="Nhập tên chứng chỉ của bạn">
								</div>
								<div class="item">
									<input type="text" class="result" name="result" value="" placeholder="Nhập kết quả">
								</div>
							</div>
						</div>
					</div>
					<div class="main">
						<input class="pull-right" type="submit" name="update" value="Cập nhật">
					</div>
				</form>
			</div>
		</div>
		<div class="box_thongtin main knlv <?=(isset($_COOKIE['active']))?($_COOKIE['active']!='knlv')?"hidden":"":"hidden"?>">
			<div class="head">Kinh nghiệm làm việc</div>
			<div class="button">
				<a class="prev active" data-address="nnth"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
				<a class="next active" data-address="ntc"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			</div>
			<div class="main main_thongtin ">
				<?
				$db_qrss = new db_query("SELECT * FROM use_kinhnghiem WHERE use_id = ".$row['use_id']." ORDER BY id_kinhnghiem DESC");
				$countExp = mysql_num_rows($db_qrss->result);
				$hidden_add = '';
				$hidden_edit ='';
				if($countExp > 0){
					$hidden_add = 'hidden';
				}else{
					$hidden_edit = 'hidden';
				}
				if($countExp > 0){
				?>
				<form action="/codelogin/updateUV_editknlv.php" method="POST" class="<?=$hidden_edit?>" id="candi_editknlv">
					<div class="gray">
						<?
						
						While($item = mysql_fetch_assoc($db_qrss->result)){
						?>
						<div class="item_gray">
							<div class="item">
								<label for="" class="require">Chức danh / vị trí</label>
								<input type="text" class="position" name="position[]" value="<?=$item['use_chucdanh']?>">
							</div>
							<div class="item">
								<label for="" class="require">Công ty</label>
								<input type="text" class="company" name="company[]" value="<?=$item['use_cty_lamviec']?>">
							</div>
							<div class="item">
								<label for="" class="require">Thời gian bắt đầu</label>
								<input type="date" class="time_starts" name="time_starts[]" value="<?=date('Y-m-d',$item['tg_batdau'])?>">
							</div>
							<div class="item">
								<label for="" class="require">Thời gian kết thúc</label>
								<input type="date" class="time_ends" name="time_ends[]" value="<?=date('Y-m-d',$item['tg_ketthuc'])?>">
							</div>
							<div class="item textarea">
								<label for="">Mô tả công việc</label>
								<textarea class="description" name="description[]" cols="30" rows="10"><?=$item['them_thongtin']?></textarea>
							</div>
							<div class="text-center clear">
								<a class="btn_clear" data-id="<?=$item['id_kinhnghiem']?>" data-type="knlv"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
							</div>
							<input type="text" class="hidden" name="id_experience[]" value="<?=$item['id_kinhnghiem']?>">
						</div>
						<?
						}
						?>
					</div>
					<div class="main">
						<a class="add bc"><span><i class="fa fa-plus" aria-hidden="true"></i></span>Thêm kinh nghiệm</a>
						<input class="pull-right" type="submit" name="update" value="Cập nhật">
					</div>
				</form>
				<?}?>
				<form action="/codelogin/updateUV_knlv.php" method="POST" class="<?=$hidden_add?>" id="candi_addknlv">
					<div class="gray">
						<div class="item_gray">
							<div class="item">
								<label for="" class="require">Chức danh / vị trí</label>
								<input type="text" class="position" name="position" value="">
							</div>
							<div class="item">
								<label for="" class="require">Công ty</label>
								<input type="text" class="company" name="company" value="">
							</div>
							<div class="item">
								<label for="" class="require">Thời gian bắt đầu</label>
								<input type="date" class="time_starts" name="time_starts" value="">
							</div>
							<div class="item">
								<label for="" class="require">Thời gian kết thúc</label>
								<input type="date" class="time_ends" name="time_ends" value="">
							</div>
							<div class="item textarea">
								<label for="">Mô tả công việc</label>
								<textarea class="description" name="description" cols="30" rows="10"></textarea>
							</div>
						</div>
					</div>
					<div class="main">
						<input class="pull-right" type="submit" name="update" value="Cập nhật">
					</div>
				</form>
			</div>
		</div>
		<div class="box_thongtin main ntc <?=(isset($_COOKIE['active']))?($_COOKIE['active']!='ntc')?"hidden":"":"hidden"?>">
			<div class="head">người tham chiếu</div>
			<div class="button">
				<a class="prev active" data-address="knlv"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
				<a class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			</div>
			<div class="main main_thongtin ">
				<form action="/ajax/update_thamchieu.php" method="POST" id="candi_ntc">
				<?
				$db_qrss = new db_query("SELECT * FROM user_tham_chieu WHERE id_user = ".$row['use_id']." AND ho_ten <> ''");
				$item = mysql_fetch_assoc($db_qrss->result);
				?>
				<div class="item">
					<label for="" class="require">Tên người tham chiếu</label>
					<input type="text" name="ntc" class="ntc" value="<?=$item['ho_ten']?>">
				</div>
				<div class="item">
					<label for="" class="require">Email</label>
					<input type="text" name="email" class="email" value="<?=$item['email']?>">
				</div>
				<div class="item">
					<label for="" class="require">Chức danh</label>
					<input type="text" name="position" class="position" value="<?=$item['chuc_vu']?>">
				</div>
				<div class="item">
					<label for="" class="require">Số điện thoại</label>
					<input type="text" name="phone_name" class="phone_name" value="<?=$item['sdt']?>">
				</div>
				<div class="item" style="width: 100%;">
					<label for="" class="require">Tên công ty</label>
					<input type="text" name="company" class="company" value="<?=$item['company']?>">
				</div>
				<div class="main">
					<input class="pull-right" type="submit" name="update" value="Cập nhật">
				</div>
				</form>
			</div>
		</div>
	</div>
	<? include('../includes/inc_chuyenvienmb.php'); ?>
</div>
<?
	include('../includes/inc_footer.php');
	include('../includes/inc_script_footer.php');
?>
<script async src="/js/js_manager_uv.js?v=<?=$version?>"></script>
<script async>
	$(document).ready(function(){
		width = $(window).width();
		function setCookie(cname, cvalue, exdays) {
			var d = new Date();
			d.setTime(d.getTime() + (exdays * 30 * 60 * 1000));
			var expires = "expires=" + d.toUTCString();
			document.cookie = cname + "=" + cvalue + "; " + expires;
		}
		coutShow = 5;
		if(width < 1048 && width > 480){
			coutShow = 4;
		}
		if(width < 480){
			coutShow = 3;
		}

		$('#job_city').select2({
			placeholder:"Chọn tối đa 3 tỉnh thành mong muốn ",
			width:'100%',
			maximumSelectionLength: 3,
		});
		$('#job_cate').select2({
			placeholder:"Chọn tối đa 3 ngành nghề mong muốn ",
			width:'100%',
			maximumSelectionLength: 3,
		});
		$('.main_bieudo').slick({
			slidesToShow: coutShow, 
			slidesToScroll: 1
		});
		$('#city,#district').select2({
			width: '100%'
		});
		$('.box_thongtin .button a.active').click(function(){
			e = $(this);
			$('.box_thongtin').addClass('hidden');
			if(e.hasClass('next')){
				e.parent().parent().next().removeClass('hidden');
			}else{
				e.parent().parent().prev().removeClass('hidden');
			}
			address = e.attr('data-address');
			$('.main_bieudo .item').removeClass('active');
			$('.main_bieudo .item.'+address).addClass('active');
			setCookie('active',address,<?=time()?>);
		});
		$('.main_bieudo .item').click(function(){
			e = $(this);
			$('.main_bieudo .item').removeClass('active');
			e.addClass('active');
			$('.box_thongtin').addClass('hidden');
			active = e.attr('data-active');
			$('.box_thongtin.'+active).removeClass('hidden');
			setCookie('active',active,<?=time()?>);
		});
	})	
</script>
</body>