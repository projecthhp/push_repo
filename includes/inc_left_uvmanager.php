	<div class="left">
		<div class="top">
			<div id="change_avt" title="Click để đổi ảnh đại diện">
				<img id="imgch" src="/images/load.gif" class="lazyload" data-src="<?= ($row['use_logo'] == '')?'/images/ico_ctuv.png':geturlimageAvatar($row['use_create_time']).$row['use_logo'] ?>" alt="">
				<img id="ico_camera" src="/images/icon365_manager/change_avt.png" alt="">
				<form action="../codelogin/change_avt_uv.php" method="POST" enctype="multipart/form-data" class="hidden">
					<input name="url" type="text" value="<?= $_SERVER['REQUEST_URI'] ?>">
					<input type="file" name="avatar" id="avt_file">
					<input type="submit" name="Submit" id="submit">
				</form>
			</div>
			<p class="weight-500 text-center name "><?=$row['use_name']?></p>
			<?
				$bth_day = ($row['birthday']!='')?1:0;
				$cvmm = ($row['use_job_name']!='')?1:0;
				$mtnn = ($row['muc_tieu_nghe_nghiep']!='')?1:0;
				$knbt = ($row['ki_nang_ban_than']!='')?1:0;
				$get_hvbc = new db_count('SELECT count(*) as count FROM user_hocvan WHERE use_id = '.$_COOKIE['UID']);
				$hvbc = ($get_hvbc->total>0)?1:0;
				$get_knlv = new db_count('SELECT count(*) as count FROM use_kinhnghiem WHERE use_id = '.$_COOKIE['UID']);
				$knlv = ($get_knlv->total>0)?1:0;
				$get_thamchieu = new db_count("SELECT count(*) as count FROM user_tham_chieu WHERE id_user = ".$_COOKIE['UID']);
				$thamchieu = ($get_thamchieu->total>0)?1:0;
				$sum_complete = 100/8*($bth_day+$cvmm+$mtnn+$knbt+$hvbc+$knlv+$thamchieu);
			?>
			<div class="process">
				<label for="">Hoàn thiện hồ sơ:</label>
				<div><p style="width: <?=$sum_complete?>%"></p></div>
			</div>
			<div class="allow_search">
				<label class="activesearch">
					Cho phép NTD tìm kiếm
					<input value="true" name="buttonRounded" <?= ($row['usc_search'])?"checked":""?> type="checkbox" >
					<span class="lever"></span>
	            </label>
			</div>
			<a id="refresh">Làm mới hồ sơ</a>
		</div>
		<ul class="menu_danhmuc">
			<li><a class="m_ico quanlychung" href="/thong-tin-tai-khoan-ung-vien.html">Quản lý chung</a></li>
			<li class="dropdown" data-toggle="collapse" data-target="#bohoso">
				<a class="m_ico bohosoxinviec">Bộ hồ sơ xin việc</a>
			</li>
			<ul class="sub_menu collapse" id="bohoso">
                <li><a href="/ung-vien/ho-so-online.html">Hồ sơ online</a></li>
                <li><a href="/ung-vien/cv-xin-viec.html">CV xin việc</a></li>
                <li><a>Đơn xin việc</a></li>
                <li><a>Sơ yếu lý lịch</a></li>
                <li><a>Thư xin việc</a></li>
                <li><a>Tải hồ sơ</a></li>
            </ul>
			<li><a class="m_ico quanly_tintd">Việc làm đề xuất</a></li>
			<li class="dropdown" data-toggle="collapse" data-target="#timvl">
				<a class="m_ico fa-timuv">Tìm kiếm việc làm</a>
			</li>
			<ul class="sub_menu collapse" id="timvl">
                <li><a href="/viec-tim-nguoi.html">Việc làm mới nhất</a></li>
            </ul>
			<li><a class="m_ico vieclamdaungtuyen" href="/ung-vien/viec-lam-ung-tuyen.html">Việc làm đã ứng tuyển</a></li>
			<li><a class="m_ico vieclamdaluu" href="/ung-vien/viec-lam-da-luu.html">Việc làm đã lưu</a></li>
			<li><a class="m_ico camnang" href="/blog/c1/cam-nang-tim-viec">Cẩm nang tìm việc</a></li>
			<li class="dropdown" data-toggle="collapse" data-target="#quanly_tk">
				<a class="m_ico icon_quanlytaikhoan">Quản lý tài khoản</a>
			</li>
			<ul class="sub_menu collapse" id="quanly_tk">
                <li><a href="/ung-vien/doi-mat-khau.html">Đổi mật khẩu</a></li>
            </ul>
			<li><a class="m_ico config" href="/ung-vien/cai-dat-hien-thi.html">Cài đặt hiển thị</a></li>
		</ul>
	</div>