<?
	include('config.php');
	$uid = getValue('uv_id','int','GET',0);

	if($uid==0){
		redirect('/404.html');
	}
	$use_point = 'use_point';
	$login = 'login';
	$step2_img = '';
	$isUser = '';
	$n_saveuv = 0;
	$show_mail_phone = 0;
	if(isset($_COOKIE['UT']) && $_COOKIE['UT']==1){
		$login = '';
		$db_qr = new db_query("SELECT type FROM tbl_point_used WHERE usc_id = ".$_COOKIE['UID']." AND use_id = ".$uid." ");
		
		$count = mysql_num_rows($db_qr->result);
		if($count == 0){

			$qr_ins =  new db_query("INSERT INTO tbl_point_used(`usc_id`,`use_id`,`point`,`type`,`note_uv`,`used_day`) VALUES (".$_COOKIE['UID'].",".$uid.",0,0,'',".time().")");
			
		}else{
			$db_qrss = new db_query("SELECT nhs_use_id FROM nop_ho_so WHERE nhs_use_id = ".$uid." AND nhs_com_id = ".$_COOKIE['UID']." ");
			$num_nhs = mysql_num_rows($db_qrss->result);
			
			$row_point = mysql_fetch_assoc($db_qr->result);
			$type = $row_point['type'];
			if($type != 0 || $num_nhs > 0) $use_point = '';
		}
		
		
		$db_qr = new db_query("SELECT * FROM tbl_point_used JOIN user_company ON tbl_point_used.usc_id = user_company.usc_id JOIN user ON user.use_id = tbl_point_used.use_id WHERE user_company.usc_id = ".$_COOKIE['UID']." AND user.use_id = ".$uid." ");
		$db_saveuv = new db_query("SELECT count(*) FROM tbl_luuhoso_uv WHERE id_ntd = ".$_COOKIE['UID']." AND id_uv = $uid ");
		$r_saveuv = mysql_fetch_assoc($db_saveuv->result);
		$n_saveuv = $r_saveuv['count(*)'];
	}
	else{
		$db_qr = new db_query("SELECT * FROM user WHERE use_id = ".$uid);
		
		if(isset($_COOKIE['UT']) && $_COOKIE['UT']==0 && $uid == $_COOKIE['UID']) {
			$use_point = '';
			$login = '';	
			$isUser = true;
		}		
	}
	$row = mysql_fetch_assoc($db_qr->result);
	$arr_type = [];
	$arr_body = [];
	if($row['ki_nang_ban_than'] != ''){
		$arr_type[] = '<div class="item"><a class="" data-id="hs_online">hồ sơ online</a></div>';
		$arr_body[] = 'hs_online';
	}
	$qr_checkCV = new db_query("SELECT link FROM user_cv_upload WHERE use_id = ".$uid);
	if(mysql_num_rows($qr_checkCV->result) > 0){
		$arr_type[] = '<div class="item"><a class="" data-id="cv_step_2">tệp đính kèm</a></div>';
		$arr_body[] = 'step_2';
		$row_img = mysql_fetch_assoc($qr_checkCV->result);
        $arr_link = explode('.', $row_img['link']);
        $type_link = end($arr_link);
        $arr_ckeck_type = array('jpg','jpeg','png','PNG','gif','jfif');
        if(!in_array($type_link, $arr_ckeck_type)){
        	$step2_img = str_replace('../','https://docs.google.com/viewer?url=timviec365.com/',$row_img['link']);
        }
        else{
        	$step2_img = str_replace('../','https://timviec365.com/',$row_img['link']);
        }
	}
	$qr_checkCV2 = new db_query("SELECT name_cv_hide FROM savecandicv STRAIGHT_JOIN user ON savecandicv.iduser = user.use_id WHERE user.use_id = ".$uid." ORDER BY cv_order DESC , createdate DESC LIMIT 1 ");
	if(mysql_num_rows($qr_checkCV2->result) > 0){
		$arr_type[] = '<div class="item"><a class="" data-id="cv_step_3">cv xin việc</a></div>';
		$arr_body[] = 'step_3';
		$row_img = mysql_fetch_assoc($qr_checkCV2->result);
		$path = 'https://timviec365.com/upload/cv_uv/uv_'.$row['use_id'];
		$img_cv = '';
        if(isset($row_img['name_cv_hide']) && $row_img['name_cv_hide'] != ''){
            $img = $path.'/'.$row_img['name_cv_hide'];
        }
        else{
		    if ($dh = opendir($path)) {
                while (($title = readdir($dh)) !== false) {
                    if (preg_match('/([a-zA-Z0-9\.\-\_\\s\(\)]+)\.([a-zA-Z0-9]+)$/', $title, $m)) {
                        if (filesize($path."/".$title) >102400) {
                            $img = $path.'/'.$title;
                            break;
                        }
                    }
                }
            }
        }
	}
	$db_update = new db_query("UPDATE user SET use_view_count = use_view_count + 1 WHERE use_id = ".$uid);
?>

				
				
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
	<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui"/>
	<title>Chi tiết hồ sơ ứng viên</title>
	<meta name="descripton" content="Đăng ký ứng viên. Tìm việc làm nhanh chóng, hiệu quả nhất,  đăng tin tìm việc làm tốt 24h, tuyển dụng việc làm tất cả ngành nghề nhanh nhất, tìm kiếm việc làm tại Timviec365.vn"/>
	<meta name="Keywords" content="tim viec lam, viec lam nhanh, tìm việc làm nhanh, tuyển dụng việc làm, tuyen dung, kiem viec lam, tim viec lam, tim viec">
	<meta name="robots" content="noodp,noindex,nofollow"/>
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
<body id="detail_uv">
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<header>
		<? include('../includes/inc_header.php'); ?>
		<div id="banner">
			<? include('../includes/inc_search_uv.php'); ?>
			<p class="taingay text-center">Tải ngay ứng dụng timviec365 và cv365+ trên điện thoại để trải nghiệm tốt nhất</p>
			<div class="text-center">
				<a class="text-left downLoad_App Timviec365" href="/ung-dung-tim-viec-lam.html" rel="nofollow"><i class="icon"></i>Tải app Timviec365</a>
				<a class="text-left downLoad_App CV365" href="/ung-dung-tao-cv.html" rel="nofollow"><i class="icon"></i>Tải app CV365</a>
			</div>
		</div>
	</header>
	<div class="breakcrumb">
		<ul>
			<li><a href="/">Trang chủ</a></li>
			<li><a href="/ung-vien-tim-viec.html">Ứng viên</a></li>
			<li class="active"><span><?= $row['use_name'] ?></span></li>
		</ul>
	</div>
	<div class="box_mainuv">
		<div class="main head">
			<div class="mb_mhs">
				<span class="item">Mã hồ sơ: <?=$uid?></span>
				<span class="item">Lượt xem: <?=$row['use_view_count'] ?></span>
			</div>
			<div class="clear"></div>
			<div class="left">
				<div class="img">
					<?
					$src_err = ($row['gender']!='')?($row['gender'] == 1)?"/images/candi_male.png":"/images/candi_female.png":"/images/candi_null.png";
					$ck_null = (is_file(geturlimageAvatar($row['use_create_time']).$row['use_logo']))?"notnull":"";
					?>
					<img onerror='this.onerror=null;this.src="<?= $src_err ?>";' src="/images/load.gif" class="<?= $ck_null ?> lazyload" data-src="<?=str_replace('..','https://timviec365.com',geturlimageAvatar($row['use_create_time']).$row['use_logo'])?>">
				</div>
				<div class="main">
					<span class="item">Mã hồ sơ: <?=$uid?></span>
					<span class="item">Lượt xem: <?=$row['use_view_count'] ?></span>
				</div>
			</div>
			<div class="right">
				<h2 class="name_candi"><?= $row['use_name']?></h2>
				<div class="main_bottom ver_mb">
					<div class="item"><i class="fa fa-venus-mars" aria-hidden="true"></i> <?= ($row['gender']>0)?$array_gioi_tinh[$row['gender']]:"Xem trong CV"?></div>
					<div class="item"><i class="fa fa-birthday-cake" aria-hidden="true"></i> <?= ($row['birthday']!='' || $row['birthday']!='0')?date('d/m/Y',$row['birthday']):"Xem trong CV" ?></div>
					<div class="item"><i class="fa fa-heart" aria-hidden="true"></i> <?= ($row['lg_honnhan']>0)?$array_hon_nhan[$row['lg_honnhan']]:"Xem trong CV"?></div>
					<?
					$db_showBC = new db_query("SELECT bang_cap FROM user_hocvan JOIN user ON user.use_id = user_hocvan.use_id JOIN user_cv_upload ON user_cv_upload.use_id = user.use_id WHERE user.use_id = ".$uid." LIMIT 1");
					if(mysql_num_rows($db_showBC->result) > 0){
						$row_showBC = mysql_fetch_assoc($db_showBC->result);
					?>
					<div class="item"><i class="icon"></i><?= $row_showBC['bang_cap'] ?></div>
					<? } ?>
					<div class="item"><i class="fa fa-briefcase" aria-hidden="true"></i> <?= ($row['exp_years'] != '' || $row['exp_years'] > 0)?$array_kinh_nghiem_uv[$row['exp_years']]:"Chưa cập nhật" ?></div>
				</div>
			</div>
			<div class="main center">
				<div class="main_left">
					<p class="item"><b>Công việc mong muốn:</b> <?=$row['use_job_name']?></p>
					<p class="item"><b>Email:</b> 
					<?
					if($login == '') {
						if($use_point != '') echo '<a class="use_point">Click để xem hồ sơ</a>';
						else echo $row['use_mail'];
					}else echo '<a class="login">Đăng nhập để xem Email</a>';
					?>
					</p>
					<p class="item"><b>Số điện thoại:</b> 
					<?
					if($login == '') {
						if($use_point != '') echo '<a class="use_point">Click để xem hồ sơ</a>';
						else echo $row['use_phone'];
					}else echo '<a class="login">Đăng nhập để xem Số điện thoại</a>';
					?>
					</p>
					
					<p class="item"><b>Ngành nghề:</b> 
					<?
						$arruv_cat = explode(',', $row['use_nganh_nghe']);
						$uv_cat = [];
						foreach ($arruv_cat as $key => $value) {
							$uv_cat[] = $db_cat[$value]['cat_name'];
						}
						$uv_cat = implode(', ', $uv_cat);
						echo $uv_cat;
					?>
					</p>
				</div>
				<div class="main_right">
					<p class="item"><b>Thành phố:</b> <?= $arrcity[$row['use_city']]['cit_name']?></p>
					<p class="item"><b>Quận / huyện:</b> <?= ($row['use_district'] != '')?$db_district[$row['use_district']]['cit_name']:"Xem trong cv"?></p>
					<p class="item"><b>Chỗ ở hiện tại:</b> <?= $row['address']?></p>
					<p class="item"><b>Nơi mong muốn làm việc:</b> 
					<?
						$arruv_city = explode(',', $row['use_district_job']);
						$uv_city = [];
						foreach ($arruv_city as $key => $value) {
							$uv_city[] = $arrcity[$value]['cit_name'];
						}
						$uv_city = implode(', ', $uv_city);
						echo $uv_city;
					?>
					</p>
				</div>
				<div class="main_bottom">
					<div class="item"><i class="fa fa-venus-mars" aria-hidden="true"></i> <?= ($row['gender']>0)?$array_gioi_tinh[$row['gender']]:"Xem trong CV"?></div>
					
					<div class="item"><i class="fa fa-birthday-cake" aria-hidden="true"></i> <?= ($row['birthday']!='' || (int)$row['birthday']!=0)?date('d/m/Y',$row['birthday']):"Xem trong CV" ?></div>
					<div class="item"><i class="fa fa-heart" aria-hidden="true"></i> <?= ($row['lg_honnhan']>0)?$array_hon_nhan[$row['lg_honnhan']]:"Xem trong CV"?></div>
					<?
					$db_showBC = new db_query("SELECT bang_cap FROM user_hocvan JOIN user ON user.use_id = user_hocvan.use_id JOIN user_cv_upload ON user_cv_upload.use_id = user.use_id WHERE user.use_id = ".$uid." LIMIT 1");
					if(mysql_num_rows($db_showBC->result) > 0){
						$row_showBC = mysql_fetch_assoc($db_showBC->result);
					?>
					<div class="item"><i class="icon"></i><?= $row_showBC['bang_cap'] ?></div>
					<? } ?>
					<div class="item"><i class="fa fa-briefcase" aria-hidden="true"></i> <?= ($row['exp_years'] != '' || $row['exp_years'] > 0)?$array_kinh_nghiem_uv[$row['exp_years']]:"Chưa cập nhật" ?></div>
				</div>
			</div>
			
		</div>
		<div class="main text">
			<? $time_update =  ($row['use_update_time']>$row['use_create_time'])?$row['use_update_time']:$row['use_create_time']; ?>
			<i class="fa fa-long-arrow-right" aria-hidden="true"></i> Bạn đang xem hồ sơ ứng viên đã được phân loại trên <a>Timviec365.com.</a><span>( Ứng viên được cập nhật ngày: <?= date('d/m/Y',$time_update) ?>)</span>
		</div>
		<div class="infor_detail">
			<div class="title_main">
				<?
				foreach ($arr_type as $key => $value) {
					if($key == 0){
						$value = str_replace('<a class=""', '<a class="active"', $value);
					}
					echo $value;
				}
				?>
			</div>
			<? if(in_array('step_3', $arr_body)){?>
			<div class="main item cv_step_3 <?= ('step_3' === $arr_body[0])?"":"hidden" ?>">
				<div class="main">
					<img src="/images/load.gif" class="lazyload" data-src="<?=$img?>" alt="<?=$row_img['name_cv_hide']?>">
					<div class="bottom main text-center">
					<?
					if(!$isUser){
					?>
						<a class="<?=$login ?> <?= ($login == '' &&  $use_point != '')?"use_point":"" ?> show_cv"><i class="fa fa-eye" aria-hidden="true"></i> Xem hồ sơ</a>
						<a class="save_uv <?= $login ?>" data-id="<?= $uid ?>"><i class="fa fa-floppy-o" aria-hidden="true"></i> <?=($n_saveuv)?"Đã lưu hồ sơ":"Lưu hồ sơ"?></a>
						<a class="danhgia <?=$login?> <?=($use_point!='' && $login == '')?"use_point":""?>">Đánh giá chất lượng ứng viên</a>
					<?}?>
					</div>
				</div>
				<div class="main small_img">
					<p class="td">Thông tin chi tiết CV</p>
					<p>(Để xem thông tin chi tiết ứng viên trên CV, mời bạn click vào các CV dưới đây)</p>
					<div class="main_cv">
					<?
					$db_get = new db_query("SELECT * FROM savecandicv INNER JOIN samplecv ON savecandicv.idcv = samplecv.id WHERE iduser = ".$row['use_id']." ORDER BY cv_order DESC , createdate DESC LIMIT 3");
					while($row_cv = mysql_fetch_assoc($db_get->result)){
                        if($row_cv['name_cv']!=''){
                        $src = 'https://timviec365.com/upload/cv_uv/uv_'.$row['use_id'].'/'.$row_cv['name_cv'];
					?>
						<div class="item">
                            <img src="/images/load.gif" class="lazyload" data-src="<?=$src?>" alt="<?= $row_cv['name_cv'] ?>">
                            <div class="zoom">
                            	<a target="_blank" class="<?=($use_point !='' && $login == '')?"use_point_img":""?>  <?=$login?>" title="Click để xem thông tin hồ sơ">Xem chi tiết</a>	
                            </div>
                        </div>
                    <?
	                	}
	                }
                    ?>
					</div>
				</div>
			</div>
			<?}?>
			<? if(in_array('hs_online', $arr_body)){?>
			<div class="main item hs_online <?= ('hs_online' === $arr_body[0])?"":"hidden" ?>">
				<div class="tt_cb item">
					<div class="title">
						<div class="ir">	
							<i class="icon"></i> Thông tin cơ bản
						</div>
					</div>
					<div class="main_c1">
						<p><b>Chỗ ở hiện tại: </b><?= $row['address']?></p>
						<p><b>Nơi mong muốn làm việc: </b>
						<?
						foreach ($arruv_city as $key => $value) {
							echo '<a class="item_nntt">'.$arrcity[$value]['cit_name'].'</a>';
						}
						?>
						</p>
						<p><b>Ngành nghề: </b>
						<?
						foreach ($arruv_cat as $key => $value) {
							echo '<a class="item_nntt">'.$db_cat[$value]['cat_name'].'</a>';
						}
						?>
						</p>
						<p><b>Kinh nghiệm làm việc: </b><?= ($row['exp_years']!='')?$array_kinh_nghiem[$row['exp_years']]:''?></p>
						<p><b>Hình thức làm việc: </b><?= ($row['work_option']!='')?$array_hinh_thuc[$row['work_option']]:'' ?></p>
						<p><b>Cấp bậc mong muốn: </b><?= ($row['cap_bac_mong_muon'] != '')?$array_capbac[$row['cap_bac_mong_muon']]:'' ?></p>
						<p><b>Mức lương mong muốn: </b><span style="color: #FF0000; "><?= ($row['salary']!='')?$array_muc_luong[$row['salary']]:''?></span></p>
					</div>
				</div>
				<div class="item mtnn">
					<div class="title">
						<div class="ir">	
							<i class="icon"></i> Mục tiêu nghề nghiệp
						</div>
					</div>
					<div class="mota">
						<?= ($row['muc_tieu_nghe_nghiep']!='')?str_replace('|',"</br>",nl2br($row['muc_tieu_nghe_nghiep'])):'' ?>
					</div>
				</div>
				<div class="item knbt">
					<div class="title">
						<div class="ir">	
							<i class="icon"></i> Kỹ năng bản thân
						</div>
					</div>
					<div class="mota">
						<?= ($row['ki_nang_ban_than']!='')?str_replace('|','<br>',nl2br($row['ki_nang_ban_than'])):'' ?>
					</div>
				</div>
				<div class="item hv">
					<div class="title">
						<div class="ir">
							<span><i class="icon"><i class="fa fa-graduation-cap" aria-hidden="true"></i></i></span> Trình độ học vấn
						</div>
					</div>
					<div class="mota">
						<?
							$db_hv = new db_query("SELECT * FROM user_hocvan WHERE use_id = ".$row['use_id']);
							if(mysql_num_rows($db_hv->result) > 0)
							{
								while($row_hv = mysql_fetch_assoc($db_hv->result))
								{
						?>
							<div class="title_bc">Từ <?= date('m/Y',$row_hv['tg_batdau']) ?> - <?= date('d/m',$row_hv['tg_ketthuc']) ?></div>
							<div class="div_bc">
								<p><b>Nơi đào tạo: </b><?= $row_hv['truong_hoc'] ?></p>
								<p><b>Chuyên ngành: </b><?= $row_hv['chuyen_nganh'] ?></p>
								<p><b>Xếp loại: </b><?= $array_xl[$row_hv['xep_loai']] ?></p>
							</div>
						<?
								}
							}
							else
							{
						?>
							<div class="div_bc">
								<p><b>Nơi đào tạo: </b>Chưa cập nhật</p>
								<p><b>Chuyên ngành: </b>Chưa cập nhật</p>
								<p><b>Xếp loại: </b>Chưa cập nhật</p>
							</div>
						<?
							}
						?>
					</div>
				</div>
				<div class="item hv">
					<div class="title">
						<div class="ir">	
							<span><i class="icon"><i class="fa fa-briefcase" aria-hidden="true"></i></i></span> Kinh nghiệm làm việc
						</div>
					</div>
					<div class="mota">
						<?
							$db_kn = new db_query("SELECT * FROM use_kinhnghiem WHERE use_id = ".$row['use_id']);
							if(mysql_num_rows($db_kn->result) > 0)
							{
							while($row_kn = mysql_fetch_assoc($db_kn->result))
							{
						?>
							<div class="title_bc">Từ <?= date('m/Y',$row_kn['tg_batdau']) ?> - <?= date('m/Y',$row_kn['tg_ketthuc']) ?></div>
							<div class="div_bc">
								<div><b>Công ty: </b><?= $row_kn['use_cty_lamviec'] ?></div>
								<div><b>Vị trí: </b><?= $row_kn['use_chucdanh'] ?></div>
								<div>
									<b>Mô tả: </b>
									<div><?= nl2br($row_kn['them_thongtin']) ?></div>
								</div>
							</div>
						<?
								}
							}
							else
							{
						?>
							<div class="div_bc">
								<p><b>Công ty: </b>Chưa cập nhật</p>
								<p><b>Vị trí: </b>Chưa cập nhật</p>
								<p><b>Mô tả: </b>Chưa cập nhật</p>
							</div>
						<?
							}
						?>
					</div>
				</div>
				<div class="bottom main text-center">
				<?
					if(!$isUser){
					?>
					<!-- <a class="show_cv"><i class="fa fa-eye" aria-hidden="true"></i> Xem hồ sơ</a> -->
					<a class="save_uv <?= $login ?>" data-id="<?= $uid ?>"><i class="fa fa-floppy-o" aria-hidden="true"></i> <?=($n_saveuv)?"Đã lưu hồ sơ":"Lưu hồ sơ"?></a>
					<a class="danhgia <?=$login?> <?=($use_point!='' && $login == '')?"use_point":""?>">Đánh giá chất lượng ứng viên</a>
					<?}?>
				</div>
			</div>
			<?} ?>
			<? 
			if(in_array('step_2', $arr_body)){
				$showUrlImage = ($isUser || ($login == '' && $use_point == ''))?"target='_blank' href='".$step2_img."'":"";
			?>
			<div class="main item cv_step_2 <?= ('step_2' === $arr_body[0])?"":"hidden" ?>">
				<p class="text-center"><img src="/images/load.gif" class="lazyload" data-src="/images/cv_step_2.png" alt="CV step 2"></p>
				<p class="text-center">(Để xem thông tin chi tiết ứng viên mời bạn click vào xem hồ sơ)</p>
				<div class="bottom main text-center">
					<a <?= $showUrlImage ?> class="<?=$login ?> <?= ($login == '' && $use_point != '')?"use_point":"" ?> show_cv"><i class="fa fa-eye" aria-hidden="true"></i> Xem hồ sơ</a>
					<?
					if(!$isUser){
					?>
					<a class="save_uv <?= $login ?>" data-id="<?= $uid ?>"><i class="fa fa-floppy-o" aria-hidden="true"></i> <?=($n_saveuv)?"Đã lưu hồ sơ":"Lưu hồ sơ"?></a>
					<a class="danhgia <?=$login?> <?=($use_point!='' && $login == '')?"use_point":""?>">Đánh giá chất lượng ứng viên</a>
					<?}?>
				</div>
			</div>
			<?} ?>
		</div>
		<div class="box_uvnew">
			<div class="heading_new"><h2 class="heading_2">ứng viên mới nhất</h2></div>
			<div class="main">
				<?
				$db_uvnew = new db_query("SELECT use_name, use_id, use_job_name,use_create_time,use_logo,gender,use_district_job,use_update_time,exp_years  FROM user WHERE use_id <> ".$uid." AND use_show = 1 AND usc_search = 1 ORDER BY use_update_time DESC, use_id DESC LIMIT 50");
				while($row_new = mysql_fetch_assoc($db_uvnew->result)){
					$src_error = ($row_new['gender']==1)?"candi_male.png":"candi_female.png";
				?>
				<div class="item">
<<<<<<< HEAD
					<div class="left"><img onerror='this.onerror=null;this.src="/images/<?=$src_error?>";' src="/images/load.gif" class="lazyload" data-src="<?= ($row_new['use_logo'] == '')?$src_error:str_replace('..','https://timviec365.com/',geturlimageAvatar($row['use_create_time']).$row['use_logo']) ?>" alt="<?= $row_new['use_name'] ?>"></div>
=======
					<div class="left"><img onerror='this.onerror=null;this.src="/images/<?=$src_error?>";' src="/images/load.gif" class="lazyload" data-src="<?= ($row_new['use_logo'] == '')?$src_error:str_replace('..','https://timviec365.com/',geturlimageAvatar($row_new['use_create_time']).$row_new['use_logo']) ?>" alt="<?= $row_new['use_name'] ?>"></div>
>>>>>>> 12bb0cb9ff663446bb65b5a9c100a529c228166a
					<div class="right">
						<a href="<?= rewriteUV($row_new['use_id'],$row_new['use_name']) ?>" class="uv_jobname"><?= $row_new['use_job_name'] ?></a>
						<h3 class="heading_3"><?= $row_new['use_name'] ?></h3>
						<?
						$status_2 = '';
						$status = '<a class="status login"><i class="fa fa-heart-o" aria-hidden="true"></i>Lưu</a>';
						if(isset($_COOKIE['UT']) && $_COOKIE["UT"]==1){
							$db_ckview = new db_query("SELECT type FROM tbl_point_used WHERE usc_id = ".$_COOKIE['UID']." AND use_id = ".$row_new['use_id']." ");
							if(mysql_num_rows($db_ckview->result) > 0){
								$row_ck = mysql_fetch_assoc($db_ckview->result);
								if($row_ck['type']==0){
									$status_2 = '<span class="status2">Đã xem</span>';
								}
								else{
									$status_2 = '<span class="status2">Đã mở</span>';
								}
							}
							$db_cksave = new db_query("SELECT id_uv FROM tbl_luuhoso_uv WHERE id_uv = ".$row_new['use_id']." AND id_ntd = ".$_COOKIE['UID']);
							if(mysql_num_rows($db_cksave->result)>0){
								$status = '<a class="status saved" data-id="'.$row_new['use_id'].'"><i class="fa fa-heart" aria-hidden="true"></i>Đã lưu</a>';
							}else{
								$status = '<a class="status" data-id="'.$row_new['use_id'].'"><i class="fa fa-heart-o" aria-hidden="true"></i>Lưu</a>';
							}
						}
						?>
						<?=$status_2?>
					</div>
					<div class="bottom2">
						<?
							$uv_city = explode(',', $row_new['use_district_job']);
							$arr_new = [];
							foreach ($uv_city as $key => $value) {
								$arr_new[] = $arrcity[$value]['cit_name'];
							}
							$city_new = implode(', ', $arr_new);
						?>
						<p class="candi_address"><i class="icon"></i> <?=$city_new?></p>
						<p class="p_exp"><i class="icon"></i><?= ($row_new['exp_years']!="")?$array_kinh_nghiem_uv[$row_new['exp_years']]:"Xem trong CV" ?></p>
						<p class="p_time"><i class="time"></i>
						<?
						if($row_new['use_update_time']>$row_new['use_create_time']){
							$time_update = $row_new['use_update_time'];
						}else{
							$time_update = $row_new['use_create_time'];
						}
						echo time_elapsed_string($time_update);
						?>
						</p>
						<?=$status?>
						
					</div>
				</div>
				<?
				}
				?>
			</div>
		</div>
	</div>
    <div class="modal_cvuv hidden">
        <span class="close_cvuv">x</span>
        <div class="main_cvuv">
            <img src="" alt="">
            <div class="tai_cv">
                <a href="" download="">Tải CV</a>
            </div>
        </div>
    </div>
    <div class="popup popup_CompanySignin hidden">
		<form onsubmit="return false">
			<div class="modal-header text-center pull-left width-100">
				Đăng nhập
				<i class="pull-right fa fa-times" aria-hidden="true"></i>
			</div>
			<div class="modal-body pull-left width-100">
				<div class="left">
					<p class="text-center note">Bạn cần đăng nhập để lưu và xem thông tin ứng viên này!</p>
					<div class="item email">
						<i class="icon"></i>
						<input type="text" id="email" placeholder="Nhập Email ...">
					</div>
					<div class="item password">
						<i class="icon"></i>
						<input type="password" id="password" placeholder="Nhập mật khẩu ...">
						<i class="fa fa-eye-slash" aria-hidden="true"></i>
					</div>
					<a class="forget_pass" href="">Quên mật khẩu?</a>
					<input type="submit" id="submit" value="Đăng nhập">
					<p class="question">Bạn chưa có tài khoản? <a href="">Đăng ký ngay</a></p>
				</div>
				<div class="right">
					<img src="/images/bg_signin_candi.png" alt="BG đăng nhập">
					<a class="downLoad_signin timviec365" href="">
						<span class="trapezoid"></span><i class="fa fa-download" aria-hidden="true"></i>Tải app TIMVIEC365 ngay
					</a>
					<a class="downLoad_signin cv365" href="">
						<span class="trapezoid"></span><i class="fa fa-download" aria-hidden="true"></i>Tải app CV365 ngay
					</a>
				</div>
			</div>
		</form>
	</div>
	<div class="popup point hidden">
		<form onsubmit="return false">
			<div class="modal-header text-center width-100">
				<i class="fa fa-times pull-right" aria-hidden="true"></i>
			</div>
			<div class="modal-body text-center width-100">
				Hồ sơ có giá trị 1 điểm, bạn có chắc chắn muốn mở ứng viên này ??
			</div>
			<div class="modal-bottom width-100 text-center">
				<input id="accept_point" type="submit" value="Ok">
				<input class="fa" type="button" value="Hủy">
			</div>
		</form>
	</div>
	<div id="appli_success" class="hidden">
		<div class="modal-content">
	      <div class="modal-header">
	      	<p class="text-center"><i class="icon"></i></p>
	        <p class="text-center notifi">Lưu hồ sơ thành công</p>
	      </div>
	      <div class="modal-body">
	        <p>Bạn đã lưu thông tin ứng viên này thành công!!!</p>
	      </div>
	      <div class="modal-footer text-center">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Hoàn thành</button>
	      </div>
	  </div>
	</div>
	<?if($login==''){?>
	<div id="popPhanAnh" class="hidden">
		<div class="modal-content">
			<div class="modal-head">
				đánh giá chất lượng ứng viên
				<i class="fa fa-times pull-right"></i>
			</div>
			<div class="modal-body">
				<p>Vui lòng ghi rõ lý do để Timviec365 hỗ trợ bạn</p>
				<textarea id="textarea_ndPhanAnh" placeholder="VD: Thông tin ứng viên mập mờ, có dấu hiệu lừa đảo..."></textarea>
			</div>
			<div class="modal-footer">
				<a data-candi="<?=$uid?>" data-company="<?=$_COOKIE['UID']?>" class="pull-right" id="sent">Gửi đánh giá</a>
				<a class="pull-right" id="cancel">Hủy</a>
			</div>
		</div>
	</div>
	<?}?>
	<?
	include('../includes/inc_footer.php');
	include('../includes/inc_script_footer.php')
	?>
	<script>
		$(document).ready(function(){
			$('.close_cvuv').click(function(){
				$('.modal_cvuv').addClass('hidden');
			});
			$('.popup_CompanySignin #submit').click(function(){
				var user_name = $('.popup_CompanySignin #email');
				var password = $('.popup_CompanySignin #password');
				var e = $(this);
				if(user_name.val() == '' || password.val() == ''){
					if(e.hasClass('error') == false){
						e.addClass('error');
						$('.popup_CompanySignin .left .note').html("Vui lòng điền đầy đủ thông tin đăng nhập !!!");
					}
					return false;
				}
				$.ajax({
					type: "POST",
					url: "../ajax/login_ntd_popup.php",
					data:{
						user_name : user_name.val(),
						password : password.val()
					},
					beforeSend: function(){
						e.val('Vui lòng đợi ...');
					},
					success:function(data)
					{
						if(data != 0)
							location.reload();
						else{
							if($('.popup_CompanySignin .left .note').hasClass('error') == false){
								$('.popup_CompanySignin .left .note').addClass('error');
							}
							$('.popup_CompanySignin .left .note').html("Thông tin xác thực tài khoản không đúng, vui lòng thử lại !!!");
							e.val('Đăng nhập');
						}
					}
				});
			});

			$('.save_uv').click(function(){
				e = $(this);
				id_user = e.attr('data-id');
				if(e.hasClass('login')){
					$('.popup_CompanySignin').removeClass('hidden');
					$('.popup_CompanySignin').hide().show('slow');
				}else{
					$.ajax({
						type:"POST",
						url: "../ajax/luu_hoso.php",
						data:{
							id_uv: id_user
						},
						success:function(data){
							if(data == 1){
								e.html('<i class="fa fa-floppy-o" aria-hidden="true"></i> Đã lưu hồ sơ');
								$('#appli_success').removeClass('hidden');
							}else{
								e.html('<i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu hồ sơ');
							}
						},
						error:function(data){
							console.log(data);
						}
					});
				}
			});
			$('.zoom a').click(function(){
				if($(this).hasClass('login') || $(this).hasClass('use_point_img')){
					if($(this).hasClass('use_point_img')){
						$('.popup.point').removeClass('hidden');
						$('.popup.point').hide().show('slow');
					}
					if($(this).hasClass('login')){
						$('.popup_CompanySignin').removeClass('hidden');
						$('.popup_CompanySignin').hide().show('slow');
					}
				}else{
					var src = $(this).parent().parent().find('img').attr('src');
					$('.modal_cvuv').removeClass('hidden');
					$('.modal_cvuv').find('img').attr('src',src);
					$('.tai_cv a').attr('href',src);
				}
			});
			$('.use_point').click(function(){
				if($('.popup.point').hasClass('hidden')){
					$('.popup.point').removeClass('hidden');
					$('.popup.point').hide().show('slow');
				}
			});
			$('#accept_point').click(function(){
				var uid_com = <?= (isset($_COOKIE['UID']))?$_COOKIE['UID']:"''"; ?>;
				var uid_candi = <?=$row['use_id']?>;
				$.ajax({
					type:"POST",
					url:"../ajax/use_point.php",
					data:{
						uid_com:uid_com,
						uid_candi:uid_candi
					},
					success:function(data){
						if(data==0){
							if(confirm("Điểm của bạn đã hết, bạn có muốn mua thêm để sử dụng dịch vụ này ??")){
								window.location.href = "/bang-gia";
							}
						}
						if(data==1){
							location.reload();
						}
					}
				});
			});
			$('.title_main .item a').click(function(){
				target = $(this).attr('data-id');
				$('.title_main .item a').removeClass('active');
				$(this).addClass('active');
				$('.infor_detail .main.item').addClass('hidden');
				$('.infor_detail .main.item.'+target).removeClass('hidden');
			});
			$('.box_mainuv .main.center .item a').click(function(){
				e = $(this);
				if(e.hasClass('login')){
					$('.popup_CompanySignin').removeClass('hidden');
					$('.popup_CompanySignin').hide().show('slow');
				}
			});
			$('.popup.point .modal-bottom input[type="button"],.popup.point .fa').click(function(){
				$('.popup.point').addClass('hidden');
			});
			$('#appli_success .modal-footer button').click(function(){
				$('#appli_success').addClass('hidden');
			});
			$('.status').click(function(){
				e = $(this);
				if(e.hasClass('login')){
					$('.popup_CompanySignin').removeClass('hidden');
					$('.popup_CompanySignin').hide().show('slow');
				}else{
					id_user = e.attr('data-id');
					$.ajax({
						type:"POST",
						url: "../ajax/luu_hoso.php",
						data:{
							id_uv: id_user
						},
						beforeSend:function(){
							if(e.hasClass('saved') == false){
								e.addClass('saved');
								e.html('<i class="fa fa-heart" aria-hidden="true"></i>Đã lưu');
							}else{
								e.removeClass('saved');
								e.html('<i class="fa fa-heart-o" aria-hidden="true"></i>Lưu');
							}
						},
						success:function(data){
						}
					});
				}
			});
			$('#popPhanAnh .modal-head .fa, #popPhanAnh #cancel').click(function(){
				$('#popPhanAnh').addClass('hidden');
			});
			$('.danhgia').click(function(){
				e = $(this);
				if(e.hasClass('login')){
					$('.popup_CompanySignin').removeClass('hidden');
					$('.popup_CompanySignin').hide().show('slow');
				}else{
					if(e.hasClass('use_point') == false){
						$('#popPhanAnh').removeClass('hidden');
						$('#popPhanAnh').hide().show('slow');
					}else{
						alert("Vui lòng xem thông tin ứng viên trước khi đánh giá");
					}
				}
			});
			$('#popPhanAnh #sent').click(function(){
				e = $(this);
				candi_id = e.attr('data-candi');
				company_id = e.attr('data-company');
				note = $('#textarea_ndPhanAnh').val();
				$.ajax({
					type:"POST",
					url: "../codelogin/updateNTD_note_filter_point.php",
					data:{
						note: note,
						candi_id: candi_id,
						company_id: company_id
					},success:function(data){
						if(data==1){
							alert('Timviec365.com cảm ơn bạn đã gửi đánh giá chất lượng ứng viên');
							$('#textarea_ndPhanAnh').val('');
							$('#popPhanAnh').addClass('hidden');
						}
					}
				});
			});
			$('.show_cv').click(function(){
				e = $(this);
				if(e.hasClass('login')){
					$('.popup_CompanySignin').removeClass('hidden');
					$('.popup_CompanySignin').hide().show('slow');
				}else{

				}
			});
		});
	</script>
</body>