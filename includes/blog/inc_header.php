<div class="header-top" >
	<div id="for-pc">
		<ul class="parent">
			<li><a href="/"><img class="lazyload" src="/images/load.gif" data-src="/images/logo-new.png" alt="Timviec365.com | Tìm việc làm nhanh, Tuyển dụng 24h"></a></li>
			<li><a href="/bi-quyet-viet-cv.html">Bí quyết viết CV</a></li>
			<li><a href="/blog/c1/cam-nang-tim-viec">Cẩm nang tìm việc</a></li>
			<li><a href="/blog/c3/bieu-mau">Biểu mẫu</a></li>
			<li><a href="/blog/c53/mo-ta-cong-viec">Mô tả công việc</a></li>
			<li><a href="/cau-hoi-phong-van">Câu hỏi tuyển dụng</a></li>
			<? if(!isset($_COOKIE['UID'])){?>
			<li id="signin"><a rel="nofollow" href="/dang-nhap-chung.html">Đăng nhập</a></li>
			<li id="register"><a rel="nofollow" href="/dang-ky-chung.html">Đăng ký</a></li>
			<? }
			else{
				if($_COOKIE['UT']==0){
					$table = 'user';
					$cr_time = 'use_create_time';
					$logo = 'use_logo';
					$getEmail = 'use_mail';
					$getName = 'use_name';

					$feild = $cr_time.','.$logo.','.$getEmail.','.$getName;
					$feild_set = "use_id";
					$type_h = 'candi';
				}else{
					$table = 'user_company';
					$cr_time = 'usc_create_time';
					$logo = 'usc_logo';
					$getEmail = 'usc_email';
					$getName = 'usc_company';

					$feild = $cr_time.','.$logo.','.$getEmail.','.$getName;
					$feild_set = "usc_id";
					$type_h = 'company';
				}
				$sql = "SELECT $feild FROM $table WHERE $feild_set = ".$_COOKIE['UID'];
				$db_GetHead = new db_query($sql);
				$r_Head = mysql_fetch_assoc($db_GetHead->result);
				$avatar_H = geturlimageAvatar($r_Head[$cr_time]).$r_Head[$logo];
			?>
			<li id="logged">
				<img src="/images/load.gif" class="lazyload" data-src="<?=$avatar_H?>">
				<div class="sub_logged uv">
					<div class="top">
						<div class="img"><img src="/images/load.gif" class="lazyload" data-src="<?=$avatar_H?>" alt="Avt UV"></div>
						<div class="infor">
							<p class="name_h"><?=$r_Head[$getName]?></p>
							<p class="email_h"><?=$r_Head[$getEmail]?></p>
						</div>
					</div>
					<div class="main_h <?=$type_h?>">
						<?if($_COOKIE['UT']==0){?>
							<a href="/ung-vien/ho-so-online.html" rel="nofollow" class="item httt"><i class="icon"></i>Hoàn thiện thông tin</a>
							<a href="/thong-tin-tai-khoan-ung-vien.html" rel="nofollow" class="item qltk"><i class="icon"></i>Quản lý tài khoản</a>
						<?}else{?>
							<a href="/thong-tin-tai-khoan-nha-tuyen-dung.html" rel="nofollow" class="item qlc"><i class="icon"></i>Quản lý chung</a>
							<a href="/nha-tuyen-dung/tin-da-dang.html" rel="nofollow" class="item qlt"><i class="icon"></i>Quản lý tin tuyển dụng</a>
							<a href="/nha-tuyen-dung/ho-so-ung-tuyen.html" rel="nofollow" class="item uvut"><i class="icon"></i>Ứng viên ứng tuyển</a>
							<a href="/nha-tuyen-dung/ho-so-da-luu.html" rel="nofollow" class="item uvsave"><i class="icon"></i>Ứng viên đã lưu</a>
						<?}?>
						<a href="/dang-xuat" rel="nofollow" class="item logout"><i class="icon"></i>Đăng xuất</a>
					</div>
				</div>
			</li>
			<?}?>
		</ul>
	</div>
	<div id="for-mobile" class="headerblog">
		<ul>
			<li id="li_home">
				<a href="/">
					<img class="lazyload" src="/images/load.gif" data-src="/images/logo-new.png" alt="Timviec365.com | Tìm việc làm nhanh, Tuyển dụng 24h">
					<i class="fa fa-home" aria-hidden="true"></i>
				</a>
			</li>
			<li id="key">
				<form action="/search-blog" method="GET">
					<i class="fa fa-search" aria-hidden="true"></i><input type="text" id="keysearch" name="keyword" value="<?=isset($keyword)?$keyword:""?>" placeholder="Nhập từ khóa ...">
					<input type="submit" class="hidden">
				</form>
			</li>
			<li class="ico_menu">
				<a class="icon_menu"></a>
				<div class="sub_menu">
					<div class="item jobsearchhuman"><i class="m_ico"></i><a href="/bi-quyet-viet-cv.html">Bí quyết viết CV</a></div>
					<div class="item candi_list"><i class="m_ico"></i><a href="/blog/c1/cam-nang-tim-viec">Cẩm nang tìm việc</a></div>
					<div class="item candi_around"><i class="m_ico"></i><a href="/blog/c3/bieu-mau">Biểu mẫu</a></div>
					<div class="item job_around"><i class="m_ico"></i><a href="/blog/c53/mo-ta-cong-viec">Mô tả công việc</a></div>
					<div class="item cv"><i class="m_ico"></i><a href="/cau-hoi-phong-van">Câu hỏi tuyển dụng</a></div>
				</div>
				</li>
			<li id="account">
				<a id="toggle_acc">Tài khoản</a>
				<div class="sub_menu_acc">
					<div class="item signin_head"><i class="icon"></i><a rel="nofollow" href="/dang-nhap-chung.html">Đăng nhập</a></div>
					<div class="item register_head"><i class="icon"></i><a rel="nofollow" href="/dang-ky-chung.html">Đăng ký</a></div>
				</div>
			</li>
		</ul>
	</div>
</div>