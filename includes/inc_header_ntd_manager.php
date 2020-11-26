<header id="header_company_manager">
	<div class="top">
		<div id="btn-left" class="pull-left"><i class="fa fa-bell-o" aria-hidden="true"></i></div>
		<a href="/"><img src="/images/logo-new.png" alt="Logo"></a>
		<div id="btn-right" class="pull-right">
        <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
	</div>
	<div class="center hidden">
        <div class="img_chuyenvien">
        <img src="/images/load.gif" class="lazyload" data-src="/images/chuyenvien.jpg" alt="Chuyen vien">
        </div>
        <div class="text-sup">
            <p>Chuyên viên hỗ trợ:</p>
            <p><span class="weight-500 Roboto-Medium">Mai Hương</span> - SĐT: <span class="orange">0904646975</span></p>
            <p>Email: <span class="orange">huongmai.timviec365@gmail.com</span> <!-- - Zalo: <span class="orange">0329 39.88.58</span> --> </p>
        </div>
    </div>
    <p id="point">Điểm mất phí lọc hồ sơ: <span><?=$row_com['point_usc']?></span></p>
	<div class="right" id="header_right">
		<a class="item" href="/">Trang chủ</a>
		<a class="item" href="/bang-gia">Bảng giá</a>
		<a class="item" href="/nha-tuyen-dung/dang-tin.html">Đăng tin</a>
		<a class="item" href="/ung-vien-tim-viec.html">Tìm ứng viên</a>
		<a class="item"><i style="font-size:20px" class="fa fa-bell-o" aria-hidden="true"></i></a>
		<a class="item logout" href="/dang-xuat"><i class="fa fa-sign-out" aria-hidden="true"></i>Đăng xuất</a>
	</div>
    <div class="chuyenvien_pc main">
        <div class="image">
            <img src="/images/chuyenvien.jpg" class=" lazyloaded" data-src="/images/chuyenvien.jpg" alt="Chuyên viên">
        </div>
        <p>Chuyên viên hỗ trợ dành cho ứng viên: <span>Ms.Mai Hương</span></p>
        <p>SĐT: <span>0904646975</span></p>
        <p>Email: <span>huongmai.timviec365@gmail.com</span></p>
    </div>
    <?
        if($detect->isTablet() || $detect->isMobile()){
    ?>
    <div class="popup_sidebar hidden">
        <div class="main_sidebar">
            <div class="sb_top">
                <img src="/images/load.gif" class="lazyload images" data-src="<?= str_replace('../', $domain.'/', geturlimageAvatar($row_com['usc_create_time']).$row_com['usc_logo'])  ?>" onerror='this.onerror=null;this.src="/images/icon365_manager/no_avatar_com.png";' alt="Logo ntd">
                <div class="sb_right">
                    <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                    <p class="name_company"><?=name_company($row_com['usc_company'])?></p>
                    <p class="point">Điểm mất phí lọc hồ sơ: <?=$row_com['point_usc']?></p>
                </div>
            </div>
            <div class="sb_center">
                <ul class="sb_dm">
                    <li><a class="qlc first" href="/nha-tuyen-dung/thong-tin-chung.html"><i class="icon"></i>Quản lý chung</a></li>
                    <li>
                        <a class="ttd first parent"><i class="icon"></i>Tin tuyển dụng</a>
                        <ul class="child">
                            <li><a href="/nha-tuyen-dung/dang-tin.html">Đăng tin tuyển dụng</a></li>
                            <li><a href="/nha-tuyen-dung/tin-da-dang.html">Tin đã đăng</a></li>
                        </ul>
                    </li>
                    <li><a class="qlhs first parent">
                        <i class="icon"></i>Quản lý hồ sơ</a>
                        <ul class="child">
                            <li><a>Chuyên viên gửi UV</a></li>
                            <li><a href="/nha-tuyen-dung/ho-so-ung-tuyen.html">Ứng viên đến ứng tuyển</a></li>
                            <li><a href="/nha-tuyen-dung/ho-so-loc-diem.html">Ứng viên từ điểm lọc</a></li>
                            <li><a href="/nha-tuyen-dung/ho-so-da-luu.html">Hồ sơ ứng viên đã lưu</a></li>
                        </ul>
                    </li>
                    <li><a class="tkuv first parent">
                        <i class="icon"></i>Tìm kiếm ứng viên</a>
                        <ul class="child">
                            <li><a href="/ung-vien-tim-viec.html">Tìm ứng viên mới nhất</a></li>
                            <li><a href="/ung-vien-quanh-day.html">Tìm ứng viên quanh đây</a></li>
                        </ul>
                    </li>
                    <li><a class="gui_mailmkt first"><i class="icon"></i>Gửi mail marketing</a></li>
                    <li><a class="tin_nhan first" href="/nha-tuyen-dung/tin-nhan.html"><i class="icon"></i>Tin nhắn từ ứng viên</a></li>
                    <li><a class="qldv first" href="/bang-gia"><i class="icon"></i>Quản lý dịch vụ</a></li>
                    <li><a class="kn_ns first parent">
                        <i class="icon"></i>Kinh nghiệm nhân sự</a>
                        <ul class="child">
                            <li><a target="_blank" href="/cau-hoi-phong-van">Bộ đề tuyển dụng</a></li>
                            <li><a target="_blank" href="/blog/c3/bieu-mau">Mẫu văn bản hành chính nhân sự</a></li>
                        </ul>
                    </li>
                    <li><a class="qltk first parent">
                        <i class="icon"></i>Quản lý tài khoản</a>
                        <ul class="child">
                            <li><a href="/thong-tin-tai-khoan-nha-tuyen-dung.html">Cập nhật thông tin</a></li>
                            <li><a href="/nha-tuyen-dung/doi-mk.html">Đổi mật khẩu</a></li>
                        </ul>
                    </li>
                    <li><a class="dgyk first" href="/feedback.html"><i class="icon"></i>Đóng góp ý kiến</a></li>
                </ul>
            </div>
            <div class="sb_bottom">
            <a href="/dang-xuat"><i class="fa fa-sign-out" aria-hidden="true"></i>Đăng xuất</a>
            </div>
        </div>
    </div>
    <div class="popup_notify hidden">
        <div class="main_notify">
            <p class="close">x</p>
            <p class="orange weight-500 text-center">THÔNG BÁO</p>
            <div class="main_item">
            <?
            $db_noti = new db_query("SELECT use_name,new_title,NotifyID FROM notify JOIN user ON notify.UserID = user.use_id JOIN new ON new.new_id = notify.NewID WHERE CompanyID = ".$_COOKIE['UID']." ");
            While($rnoti = mysql_fetch_array($db_noti->result)){
            ?>
                <div class="item" id="noti_<?= $rnoti['NotifyID'] ?>">
                    <div class="itemleft">
                        <img src="/images/icon365_manager/logo365-manager.png" alt="">
                    </div>
                    <div class="itemcenter">
                        <p><?= "Ứng viên ".$rnoti['use_name']." đã ứng tuyển vào vị trí ".$rnoti['new_title']." của bạn" ?></p>
                        <p class="time">2 giờ trước</p>
                    </div>
                    <div data-id="<?= $rnoti['NotifyID'] ?>" class="itemright clear-noti">x</div>
                </div>
            <?
            }
            ?>
            </div>
            <div class="botnoti">
                <a data-id="<?=$_COOKIE['UID']?>" id="clearall-noti">XÓA TẤT CẢ THÔNG BÁO</a>
            </div>
        </div>
    </div>
    <?
        }
    ?>
</header>