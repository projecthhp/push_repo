<?
    if($_COOKIE['UT'] != 1){
        redirect('/dang-nhap-nha-tuyen-dung.html');
	}
	include('../classes/Mobile_Detect.php');
	$detect = new Mobile_Detect();
    $db_qr = new db_query("SELECT * FROM tbl_point_company WHERE usc_id = ".$_COOKIE['UID']." ");
    if(mysql_num_rows($db_qr->result) == 0){
        $db_qr = new db_query("INSERT INTO tbl_point_company(`usc_id`,`point`,`point_usc`,`day_reset_point`) VALUES ('".$_COOKIE['UID']."','5','0',".time().") ");
    }else{
        $row = mysql_fetch_array($db_qr->result);
        if(date('d/m/Y',$row['day_reset_point'])!=date('d/m/Y',time()) && time() > $row['day_reset_point']){
            $db_qr = new db_query("UPDATE tbl_point_company SET point = 5, day_reset_point = ".time()." WHERE usc_id = ".$_COOKIE['UID']." ");
            unset($db_qr);
        }
        if($row['day_end'] < time() && $row['point_usc']>0){
            $db_qr = new db_query("UPDATE tbl_point_company SET point_usc = 0 WHERE usc_id = ".$_COOKIE['UID']." ");
            unset($db_qr);
        }
        unset($row);
    }
    unset($db_qr);
    $db_qr = new db_query("SELECT * FROM user_company JOIN user_company_multi ON user_company.usc_id = user_company_multi.usc_id JOIN tbl_point_company ON user_company.usc_id = tbl_point_company.usc_id WHERE user_company.usc_id = ".$_COOKIE['UID']);
    $row_com = mysql_fetch_array($db_qr->result);
    if($row_com['usc_authentic']==0){
        redirect('/xac-thuc-tai-khoan-nha-tuyen-dung.html');
    }
?>
<div class="left_manager">
	<div class="top">
		<a href="/">
		<img src="/images/load.gif" class="lazyload" data-src="/images/icon365_manager/logo_white.png" alt="Logo manager"></a>
	</div>
	<div class="center">
		<img src="/images/load.gif" class="lazyload" data-src="<?= str_replace('../', $domain.'/', geturlimageAvatar($row_com['usc_create_time']).$row_com['usc_logo'])  ?>" onerror='this.onerror=null;this.src="/images/icon365_manager/no_avatar_com.png";' alt="Logo ntd">
		<p><?=name_company($row_com['usc_company'])?></p>
	</div>
	<ul class="mnu_dm">
		<li><a class="parent qlc" href="/nha-tuyen-dung/thong-tin-chung.html"><img src="/images/load.gif" class="lazyload" data-src="/images/icon365_manager/i_qlc.png" alt="QLC">Quản lý chung</a></li>
		<li>
			<a class="parent parent_mnu ttd">
				<img src="/images/load.gif" class="lazyload" data-src="/images/icon365_manager/i_bmnv.png" alt="TTD">Tin tuyển dụng
			</a>
			<ul class="child">
				<li><a href="/nha-tuyen-dung/dang-tin.html">Đăng tin mới</a></li>
				<li><a href="/nha-tuyen-dung/tin-da-dang.html">Tin đã đăng</a></li>
			</ul>
		</li>
		<li>
			<a class="parent qlhs parent_mnu"><img src="/images/load.gif" class="lazyload" data-src="/images/icon365_manager/i_qlhs.png" alt="QLHS">Quản lý hồ sơ</a>
			<ul class="child">
				<li><a>Chuyên viên gửi UV</a></li>
				<li><a href="/nha-tuyen-dung/ho-so-ung-tuyen.html">Ứng viên đến ứng tuyển</a></li>
				<li><a href="/nha-tuyen-dung/ho-so-loc-diem.html">Ứng viên từ điểm lọc</a></li>
				<li><a href="/nha-tuyen-dung/ho-so-da-luu.html">Hồ sơ ứng viên đã lưu</a></li>
			</ul>
		</li>
		<li>
			<a class="parent tkuv parent_mnu"><img src="/images/load.gif" class="lazyload" data-src="/images/icon365_manager/i_tkuv.png" alt="TKUV">Tìm kiếm ứng viên</a>
			<ul class="child">
				<li><a href="/ung-vien-tim-viec.html">Tìm ứng viên mới nhất</a></li>
				<li><a href="/ung-vien-quanh-day.html">Tìm ứng viên quanh đây</a></li>
			</ul>
		</li>
		<li><a class="parent mail_mkt"><img src="/images/load.gif" class="lazyload" data-src="/images/icon365_manager/mail_mkt.png" alt="Mail MKT">Gửi mail marketing</a></li>
		<li><a class="parent msg" href="/nha-tuyen-dung/tin-nhan.html"><img src="/images/load.gif" class="lazyload" data-src="/images/icon365_manager/i_tn.png" alt="TN">Tin nhắn từ ứng viên</a></li>
		<li><a class="parent qldv" href="/nha-tuyen-dung/quan-ly-dich-vu.html"><img src="/images/load.gif" class="lazyload" data-src="/images/icon365_manager/i_qldv.png" alt="QLDV">Quản lý dịch vụ</a></li>
		<li>
			<a class="parent parent_mnu knns"><img src="/images/load.gif" class="lazyload" data-src="/images/icon365_manager/i_knns.png" alt="KNNS">Kinh nghiệm nhân sự</a>
			<ul class="child">
				<li><a target="_blank" href="/cau-hoi-phong-van">Bộ đề tuyển dụng</a></li>
				<li><a target="_blank" href="/blog/c3/bieu-mau">Mẫu văn bản hành chính nhân sự</a></li>
			</ul>
		</li>
		<li><a class="parent parent_mnu qltk"><img src="/images/load.gif" class="lazyload" data-src="/images/icon365_manager/i_qltk.png" alt="QLTK">Quản lý tài khoản</a>
			<ul class="child">
				<li><a href="/thong-tin-tai-khoan-nha-tuyen-dung.html">Cập nhật thông tin</a></li>
				<li><a href="/nha-tuyen-dung/doi-mk.html">Đổi mật khẩu</a></li>
			</ul>
		</li>
		<li><a class="parent dgyk" href="/feedback.html"><img src="/images/load.gif" class="lazyload" data-src="/images/icon365_manager/i_dgyk.png" alt="DGYK">Đóng góp ý kiến</a></li>
	</ul>
</div>