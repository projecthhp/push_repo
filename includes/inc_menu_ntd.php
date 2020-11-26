<div class="col-md-3" style="padding-right: 0">
	<div class="div_quan_ly">
		<p>Tài khoản</p>
	</div>
	<div class="menu_quan_ly">
		<div class="menu_quan_ly_left">
			<?
				$sl_avt = new db_query("SELECT usc_logo,usc_create_time FROM user_company WHERE usc_id = ".$_COOKIE['UID']);
				$row = mysql_fetch_assoc($sl_avt->result);
			?>
			<img src="
			<?= ($row['usc_logo'] != '')?str_replace('../','/',geturlimageAvatar($row['usc_create_time']).$row['usc_logo']):'/images/no-image.png' ?>" style="height: 100%;width: 100%">
		</div>
		<div class="menu_quan_ly_right">
			<p id="name"><?=$mail?></p>
			<!-- <p id="vnd">0 VND</p> -->
			<p><a href="/dang-xuat" rel="nofollow" style="text-decoration: underline;">Đăng xuất</a></p>
		</div>
		<!-- <a href=""><div class="btn_nap_tien">Nạp tiền vào tài khoản</div></a> -->
	</div>
	<div class="menu_quan_ly">
		<a href="/nha-tuyen-dung/thong-tin-chung.html">
			<div class="icon"><img src="/images/k_d2.png"></div>
			<div class="menu_content_right">Quản lý chung</div>
		</a>
	</div>
	<div class="menu_quan_ly">
	<a href="/thong-tin-tai-khoan-nha-tuyen-dung.html">
		<div class="icon"><img src="/images/k_d2.png"></div>
		<div class="menu_content_right">Thông tin tài khoản</div>
	</a>
	</div>
	<div class="menu_quan_ly">
		<a href="/nha-tuyen-dung/ho-so-da-luu.html">
			<div class="icon"><img src="/images/k_d2.png"></div>
			<div class="menu_content_right">Hồ sơ đã lưu</div>
		</a>
	</div>
	<div class="menu_quan_ly">
		<a href="/nha-tuyen-dung/ho-so-ung-tuyen.html">
			<div class="icon"><img src="/images/k_d2.png"></div>
			<div class="menu_content_right">Hồ sơ đã ứng tuyển</div>
		</a>
	</div>
	<!-- <div class="menu_quan_ly">
		<a href="">
			<div class="icon"><img src="/images/k_d2.png"></div>
			<div class="menu_content_right">Thay đổi mật khẩu</div>
		</a>
	</div> -->
</div>