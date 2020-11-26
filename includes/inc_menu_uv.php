<?
	if(isset($_COOKIE["UID"]) && $_COOKIE['UT'] == 0){
		$db_qr = new db_query("SELECT * FROM user WHERE use_id = ".$_COOKIE['UID']);
		$row = mysql_fetch_array($db_qr->result);
		if($row['use_authentic']==0){
			redirect('/xac-thuc-tai-khoan-ung-vien.html');
		}
	}else{
		redirect('/dang-nhap-ung-vien.html');
	}
?>
<div class="main_left">
	<a href="/" class="logo text-center">
		<img src="/images/icon365_manager/logo_white.png" alt="logo manager">
	</a>
	<div class="infor_uv text-center">
		<div class="avatar">
			<img id="imgch" src="/images/load.gif" class="lazyload" data-src="<?= ($row['use_logo'] == '')?'/images/ico_ctuv.png':geturlimageAvatar($row['use_create_time']).$row['use_logo'] ?>" alt="Avatar Uv">
		</div>
		<p class="name"><?=$row['use_name']?></p>
		<a class="refresh_hs">Làm mới hồ sơ</a>
		<a class="show_hs" href="<?=rewriteUV($row['use_id'],$row['use_name'])?>">Xem hồ sơ</a>
	</div>
	<div class="menu">
		<div class="qlc item">
			<div class="parent">
				<a href="/thong-tin-tai-khoan-ung-vien.html">
					<span class="box_icon">
					<i class="icon"></i>
					</span>
					Quản lý chung
				</a>
			</div>
		</div>
		<div class="item hsxv">
			<div class="parent">
				<span class="box_icon">
				<i class="icon"></i>
				</span>
				Bộ hồ sơ xin việc
				<i class="fa fa-chevron-down" aria-hidden="true"></i>
			</div>
			<div class="sub_menu main">
				<a href="/ung-vien/ho-so-online.html" class="item_sub">Hồ sơ online</a>
				<a href="/ung-vien/cv-xin-viec.html" class="item_sub">CV xin việc</a>
				<a href="/ung-vien/don-xin-viec.html" class="item_sub">Đơn xin việc</a>
				<a class="item_sub" href="/ung-vien/thu-xin-viec.html">Thư xin việc</a>
				<!-- <a class="item_sub">Sơ yếu lý lịch</a> -->
				<a href="/ung-vien/tai-len-ho-so.html" class="item_sub">Tải lên hồ sơ</a>
			</div>
		</div>
		<div class="item vl">
			<div class="parent">
				<?
				$arr_nn = explode(',',$row['use_nganh_nghe']);
				$arr_tt = explode(',', $row['use_district_job']);
				$id_cate = $arr_nn[0];
				$id_tt = $arr_tt[0];
				$city_name = $arrcity[$id_tt]['cit_name'];
				$cate_name = $db_cat[$id_cate]['cat_name'];
				?>
				<a href="<?= rewriteCate($id_tt,$city_name,$id_cate,$cate_name)?>" >
					<span class="box_icon">
					<i class="icon"></i>
					</span>
					Việc làm
				</a>
				<? unset($arr_tt,$arr_nn,$id_tt,$id_cate); ?>
			</div>
		</div>
		<div class="item vlqd">
			<div class="parent">
				<a href="/viec-lam-quanh-day.html" target="_blank" rel="nofollow">
					<span class="box_icon">
					<i class="icon"></i>
					</span>
					Tìm việc làm quanh đây
				</a>
			</div>
		</div>
		<div class="item vlut">
			<div class="parent">
				<a href="/ung-vien/viec-lam-ung-tuyen.html" rel="nofollow">
					<span class="box_icon">
					<i class="icon"></i>
					</span>
					Việc làm đã ứng tuyển
				</a>
			</div>
		</div>
		<div class="item vldl">
			<div class="parent">
				<a href="/ung-vien/viec-lam-da-luu.html" rel="nofollow">
					<span class="box_icon">
					<i class="icon"></i>
					</span>
					Việc làm đã lưu
				</a>
			</div>
		</div>
		<div class="item tn">
			<div class="parent">
				<a href="/ung-vien/tin-nhan.html" rel="nofollow">
					<span class="box_icon">
					<i class="icon"></i>
					</span>
					Tin nhắn từ NTD
				</a>
			</div>
		</div>
		<div class="item bm">
			<div class="parent">
				<a href="/blog/c3/bieu-mau" rel="nofollow">
					<span class="box_icon">
					<i class="icon"></i>
					</span>
					Biểu mẫu nhân viên
				</a>
			</div>
		</div>
		<div class="item cn">
			<div class="parent">
				<a href="/blog/c1/cam-nang-tim-viec">
					<span class="box_icon">
					<i class="icon"></i>
					</span>
					Cẩm nang tìm việc
				</a>
			</div>
			
		</div>
		<div class="item qltk">
			<div class="parent">
				<span class="box_icon">
				<i class="icon"></i>
				</span>
				Quản lý tài khoản
				<i class="fa fa-chevron-down" aria-hidden="true"></i>
			</div>
			<div class="sub_menu main">
				<a href="/ung-vien/doi-mat-khau.html" class="item_sub">Đổi mật khẩu</a>
			</div>
		</div>
		
	</div>
</div>