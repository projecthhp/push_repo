<div class="header-top" >
	<div id="for-pc">
		<ul class="parent">
			<li><a href="/"><img class="lazyload" style="width:111px" src="/images/load.gif" data-src="/images/logoo 1 (1).png" alt="Timviec365.com | Tìm việc làm nhanh, Tuyển dụng 24h"></a></li>
			<li><a href="/viec-tim-nguoi.html">Việc tìm người</a></li>
			<li><a href="/ung-vien-tim-viec.html">Ứng viên</a></li>
			<li><a href="/mau-cv.html">CV xin việc</a></li>
			<li class="ico_menu">
				<a class="icon_menu"></a>
				<div class="sub_menu <?=isset($_COOKIE['UID'])?"logged":""?>">
					<div class="item tknc"><i class="m_ico"></i><span class="span_item">Tìm kiếm nâng cao</span></div>
					<a href="/ung-vien-quanh-day.html" rel="nofollow" class="item candi_around"><i class="m_ico"></i><span class="span_item">Ứng viên quanh đây</span></a>
					<a href="/viec-lam-quanh-day.html" rel="nofollow" class="item job_around"><i class="m_ico"></i><span class="span_item">Việc làm quanh đây</span></a>
					<a href="/tim-viec-lam-them.html" class="item job_overtime"><i class="m_ico"></i><span class="span_item">Tìm việc làm thêm</span></a>
					<a href="/bang-gia" rel="nofollow" class="item price"><i class="m_ico"></i><span class="span_item">Bảng giá</span></a>
					<a href="/blog" class="item blog"><i class="m_ico"></i><span class="span_item">Blog</span></a>
					<?
					if(isset($_COOKIE['UT']) && $_COOKIE['UT']==1){
					?>
					<a href="/nha-tuyen-dung/dang-tin.html" rel="nofollow" class="item create_new"><i class="m_ico"></i><span class="span_item">Đăng tin tuyển dụng</span></a>
					<?
					}
					?>
				</div>
			</li>
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
					$authentic = 'use_authentic';
					$feild = $cr_time.','.$logo.','.$getEmail.','.$getName.','.$authentic;
					$feild_set = "use_id";
					$type_h = 'candi';
				}else{
					$table = 'user_company';
					$cr_time = 'usc_create_time';
					$logo = 'usc_logo';
					$getEmail = 'usc_email';
					$getName = 'usc_company';
					$authentic = 'usc_authentic';
					$feild = $cr_time.','.$logo.','.$getEmail.','.$getName.','.$authentic;
					$feild_set = "usc_id";
					$type_h = 'company';
				}
				$sql_getHead = "SELECT $feild FROM $table WHERE $feild_set = ".$_COOKIE['UID'];
				$db_GetHead = new db_query($sql_getHead);
				$r_Head = mysql_fetch_assoc($db_GetHead->result);
				if($_COOKIE['UT'] == 1 && $r_Head[$authentic] == 0)
					redirect('/xac-thuc-tai-khoan-nha-tuyen-dung.html');
				if($_COOKIE['UT'] == 0 && $r_Head[$authentic] == 0) 
					redirect('/xac-thuc-tai-khoan-ung-vien.html');
				$avatar_H = geturlimageAvatar($r_Head[$cr_time]).$r_Head[$logo];
			?>
			<li id="logged">
				<img onerror='this.onerror=null;this.src="/images/icon_candi.png";' src="/images/load.gif" class="lazyload" data-src="<?=$avatar_H?>">
				<div class="sub_logged uv">
					<div class="top">
						<div class="img"><img onerror='this.onerror=null;this.src="/images/icon_candi.png";' src="/images/load.gif" class="lazyload" data-src="<?=$avatar_H?>" alt="Avt UV"></div>
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
							<a href="/nha-tuyen-dung/thong-tin-chung.html" rel="nofollow" class="item qlc"><i class="icon"></i>Quản lý chung</a>
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
		<div id="search_advance" class="hidden">
			<div class="main_adv">
				<div class="adv_head text-center">
					Tìm kiếm nâng cao
					<i class="fa fa-times" aria-hidden="true"></i>
				</div>
				<div class="adv_body">
					<div class="item">
						<i class="icon adv_dd"></i>
						<select name="diadiem" id="adv_dd">
							<option value="0">Tỉnh thành</option>
							<? foreach ($arrcity as $key => $value) {?>
							<option <?= isset($diadiem)?($diadiem == $value['cit_id'])?"selected":"":"" ?> value="<?=$value['cit_id']?>"><?=$value['cit_name']?></option>
							<? } ?>
						</select>
					</div>
					<div class="item">
						<i class="fa fa-laptop" aria-hidden="true"></i>
						<select id="adv_ht">
							<option value="0">Hình thức làm việc</option>
						<? foreach ($array_hinh_thuc as $key => $value) { ?>
							<option <?= isset($ht)?($ht==$key)?"selected":"":"" ?> value="<?=$key?>"><?=$value?></option>
						<?} ?>
						</select>
					</div>
					<div class="item">
						<i class="icon adv_qh"></i>
						<select id="adv_qh">
							<?if(isset($diadiem) && $diadiem != 0){
								$db_qh = new db_query("SELECT cit_id, cit_name FROM city2 WHERE cit_parent = ".$diadiem);
								echo '<option value="0">Quận / huyện</option>';
								While($rqh = mysql_fetch_assoc($db_qh->result)){
							?>
							<option <?= isset($qh)?($qh == $rqh['cit_id'])?"selected":"":"" ?> value="<?=$rqh['cit_id']?>"><?=$rqh['cit_name']?></option>
							<?
								}
								unset($db_qh,$rqh);
							}else{
							?>
							<option value="0">Quận / huyện</option>
							<? } ?>
						</select>
					</div>
					<div class="item">
						<i class="icon adv_cb"></i>
						<select id="adv_cb">
						<? foreach ($array_capbac as $key => $value) { ?>
							<option <?= isset($cb)?($cb == $key)?"selected":"":"" ?> value="<?=$key?>"><?=$value?></option>
						<? } ?>
						</select>
					</div>
					<div class="item">
						<i class="icon adv_trinhdo"></i>
						<select id="adv_trinhdo">
						<? foreach ($array_hoc_van_uv as $key => $value) { ?>
						<option <?= isset($hv)?($hv==$key)?"selected":"":"" ?> value="<?=$key?>"><?=$value?></option>
						<? } ?>
						</select>
					</div>
					<div class="item">
						<i class="icon adv_kn"></i>
						<select id="adv_kn">
							<option value="">Kinh nghiệm</option>
						<? foreach ($array_kinh_nghiem as $key => $value) { ?>
							<option <?= isset($kn)?($kn==$key)?"selected":"":"" ?> value="<?=$key?>"><?=$value?></option>
						<? } ?>
						</select>
					</div>
					<div class="item">
						<i class="icon adv_gt"></i>
						<select id="adv_gt">
						<? foreach ($array_gioi_tinh_tt as $key => $value) { ?>
							<option <?= isset($gt)?($gt==$key)?"selected":"":"" ?> value="<?=$key?>"><?=$value?></option>
						<? } ?>
						</select>
					</div>
					<div class="item">
						<i class="icon adv_ml"></i>
						<select id="adv_ml">
						<? foreach ($array_muc_luong as $key => $value) { ?>
							<option <?= isset($ml)?($ml==$key)?"selected":"":"" ?> value="<?=$key?>"><?=$value?></option>
						<? } ?>
						</select>
					</div>
					<div class="item">
						<i class="icon adv_capnhat"></i>
						<select id="adv_capnhat">
							<option value="0">Cập nhật</option>
							<option <?= isset($capnhat)?($capnhat==1)?"selected":"":"" ?> value="1">Hôm nay</option>
							<option <?= isset($capnhat)?($capnhat==2)?"selected":"":"" ?> value="2">1 tuần trở lại</option>
							<option <?= isset($capnhat)?($capnhat==3)?"selected":"":"" ?> value="3">1 tháng trở lại</option>
						</select>
					</div>
					<div class="item text-center">
						<button id="filter">Lọc</button>
						<button id="cancel">Hủy</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?
		include('../classes/Mobile_Detect.php');
		$detect = new Mobile_Detect();
		if($detect->isMobile() || $detect->isTablet()){
	?>
	<div id="for-mobile">
		<ul>
			<li id="li_home">
				<a href="/">
					<img class="lazyload" src="/images/load.gif" data-src="/images/logo-new.png" alt="Timviec365.com | Tìm việc làm nhanh, Tuyển dụng 24h">
					<i class="fa fa-home" aria-hidden="true"></i>
				</a>
			</li>
			<li id="key" class="<?=(isset($_COOKIE['UT']))?"check_login":""?>">
				<i class="fa fa-search" aria-hidden="true"></i><input type="text" id="keysearch" placeholder="Nhập từ khóa ...">
			</li>
			<li class="filter"><a><i class="fa fa-filter" aria-hidden="true"></i> Lọc</a></li>
			<li class="ico_menu">
				<a class="icon_menu"></a>
				<div class="sub_menu <?=(isset($_COOKIE['UT']))?"check_login":""?>">
					<a href="/viec-tim-nguoi.html" class="item jobsearchhuman"><i class="m_ico"></i><span class="span_item">Việc tìm người</span></a>
					<a href="/ung-vien-tim-viec.html" class="item candi_list"><i class="m_ico"></i><span class="span_item">Ứng viên</span></a>
					<a href="/mau-cv.html" class="item cv"><i class="m_ico"></i><span class="span_item">CV xin việc</span></a>
					<a rel="nofollow" href="/ung-vien-quanh-day.html" class="item candi_around"><i class="m_ico"></i><span class="span_item">Ứng viên quanh đây</span></a>
					<a rel="nofollow" href="/viec-lam-quanh-day.html" class="item job_around"><i class="m_ico"></i><span class="span_item">Việc làm quanh đây</span></a>
					<a href="/tim-viec-lam-them.html" class="item job_overtime"><i class="m_ico"></i><span class="span_item">Tìm việc làm thêm</span></a>
					<a href="/bang-gia" rel="nofollow" class="item price"><i class="m_ico"></i><span class="span_item">Bảng giá</span></a>
					<a href="/blog" class="item blog"><i class="m_ico"></i><span class="span_item">Blog</span></a>
					<?
					if(isset($_COOKIE['UT']) && $_COOKIE['UT']==1){
					?>
					<a href="/nha-tuyen-dung/dang-tin.html" rel="nofollow" class="item create_new"><i class="m_ico"></i><span class="span_item">Đăng tin tuyển dụng</span></a>
					<?
					}
					?>
				</div>
				</li>
			<? if(!isset($_COOKIE['UID'])){?>
			<li id="account">
				<a id="toggle_acc">Tài khoản</a>
				<div class="sub_menu_acc">
					<div class="item signin_head"><i class="icon"></i><a rel="nofollow" href="/dang-nhap-chung.html">Đăng nhập</a></div>
					<div class="item register_head"><i class="icon"></i><a rel="nofollow" href="/dang-ky-chung.html">Đăng ký</a></div>
				</div>
			</li>
			<?}else{?>
			<li id="logged_mb">
				<img onerror='this.onerror=null;this.src="/images/icon_candi.png";' class="avt_logged2 lazyload" src="/images/load.gif" class="lazyload" data-src="<?=$avatar_H?>" alt="Avt UV">
				<div class="sub_menu_mb">
					<div class="top_sub ">
						<img onerror='this.onerror=null;this.src="/images/icon_candi.png";' class="lazyload" src="/images/load.gif" class="lazyload" data-src="<?=$avatar_H?>" alt="Avt UV">
						<div class="box_tt_mb">
							<p class="name"><?=$r_Head[$getName]?></p>
							<p class="email"><?=$r_Head[$getEmail]?></p>
						</div>
					</div>
					<div class="bott_sub">
						<div class="box_sub_nd">
							<?
							if($_COOKIE['UT']==1){
							?>
							<div class="item qlc">
								<a href="/nha-tuyen-dung/thong-tin-chung.html" rel="nofollow">
									<img src="/images/load.gif" class="lazyload" data-src="/images/httt.png" alt="Qlc">
									Quản lý chung
								</a>
							</div>
							<div class="item new_all">
								<a href="/nha-tuyen-dung/tin-da-dang.html" rel="nofollow">
									<img src="/images/load.gif" class="lazyload" data-src="/images/qlt.png" alt="All new">
									Quản lý tin tuyển dụng
								</a>
							</div>
							<div class="item uv_ut">
								<a href="/nha-tuyen-dung/ho-so-ung-tuyen.html" rel="nofollow">
									<img src="/images/load.gif" class="lazyload" data-src="/images/h_uvut.png" alt="All new">
									Ứng viên ứng tuyển
								</a>
							</div>
							<div class="item save_uv">
								<a href="/nha-tuyen-dung/ho-so-da-luu.html" rel="nofollow">
									<img src="/images/load.gif" class="lazyload" data-src="/images/h_uvsave.png" alt="UV luu">
									Ứng viên đã lưu
								</a>
							</div>
							<?}else{?>
							<div class="item qlc">
								<a href="/ung-vien/ho-so-online.html" rel="nofollow">
									<img src="/images/load.gif" class="lazyload" data-src="/images/httt.png" alt="Qlc">
									Hoàn thiện thông tin
								</a>
							</div>
							<div class="item qltk">
								<a href="/ung-vien/ho-so-online.html" rel="nofollow">
									<img src="/images/load.gif" class="lazyload" data-src="/images/qltk.png" alt="QLTK">
									Quản lý tài khoản
								</a>
							</div>
							<?}?>
							<div class="item logout">
								<a href="/dang-xuat">
									<img src="/images/load.gif" class="lazyload" data-src="/images/ico_logout.png" alt="UV luu">
									Đăng xuất
								</a>
							</div>
						</div>
					</div>
				</div>
			</li>
			<?}?>
		</ul>
	</div>
	<div id="search_mobile" class="<?=(isset($isListCandi))?"isListCandi":""?> hidden">
		<p id="close" class="text-center"><i class="fa fa-angle-double-up" aria-hidden="true"></i></p>
		<?
			if(!isset($isSearchaAround)){
		?>
		<form onsubmit="return false">
			<div class="search_item keyword">
				<i class="fa fa-search" aria-hidden="true"></i><input type="text" id="keyword" placeholder="Nhập từ khóa mong muốn...">
			</div>
			<div class="search_item nn">
				<i class="icon-before"></i>
				<select id="index_cate">
					<option value="0">Chọn ngành nghề</option>
					<?
					foreach ($db_cat as $key => $value) {
					?>
					<option <?= isset($nganhnghe)?($nganhnghe == $value['cat_id'])?"selected":"":"" ?> value="<?=$value['cat_id']?>"><?=$value['cat_name']?></option>
					<?
					}
					?>
				</select>
			</div>
			<div class="search_item tt">
				<i class="icon-before"></i>
				<select id="index_city">
					<option value="0">Chọn tỉnh thành</option>
					<?
					foreach ($arrcity as $key => $value) {
					?>
					<option <?= isset($diadiem)?($diadiem == $value['cit_id'])?"selected":"":"" ?> value="<?=$value['cit_id']?>"><?=$value['cit_name']?></option>
					<?
					}
					?>
				</select>
			</div>
			<div class="text-center pull-right width-100">
				<button type="submit" id="btn_submit" class="search_home">Tìm kiếm</button>
				<span class="filter pull-right"><a style="margin-right: 0"><i class="fa fa-filter" aria-hidden="true"></i> Lọc</a></span>
			</div>
		</form>
		<div class="main_adv hidden">
			<div class="item adv_city">
				<i class="icon-before"></i>
				<select id="adv_city">
					<option value="0">Chọn tỉnh thành</option>
					<?
					foreach ($arrcity as $key => $value) {
					?>
					<option <?= isset($diadiem)?($diadiem == $value['cit_id'])?"selected":"":"" ?> value="<?=$value['cit_id']?>"><?=$value['cit_name']?></option>
					<?
					}
					?>
				</select>
			</div>
			<div class="item adv_district">
				<i class="icon-before"></i>
				<select id="adv_district">
					<?if(isset($diadiem) && $diadiem != 0){
						$db_qh = new db_query("SELECT cit_id, cit_name FROM city2 WHERE cit_parent = ".$diadiem);
						echo '<option value="0">Quận / huyện</option>';
						While($rqh = mysql_fetch_assoc($db_qh->result)){
					?>
					<option <?= isset($qh)?($qh == $rqh['cit_id'])?"selected":"":"" ?> value="<?=$rqh['cit_id']?>"><?=$rqh['cit_name']?></option>
					<?
						}
						unset($db_qh,$rqh);
					}else{
					?>
					<option value="0">Quận / huyện</option>
					<? } ?>
				</select>
			</div>
			<div class="item form_of_word">
				<i class="icon-before"></i>
				<select id="adv_form_of_word">
					<option value="0">Chọn hình thức</option>
					<? foreach ($array_hinh_thuc as $key => $value) { ?>
						<option <?= isset($ht)?($ht==$key)?"selected":"":"" ?> value="<?=$key?>"><?=$value?></option>
					<?} ?>
				</select>
			</div>
			<div class="item adv_rank">
				<i class="icon-before"></i>
				<select id="adv_rank">
					<? foreach ($array_capbac as $key => $value) { ?>
						<option <?= isset($cb)?($cb == $key)?"selected":"":"" ?> value="<?=$key?>"><?=$value?></option>
					<? } ?>
				</select>
			</div>
			<div class="item adv_level">
				<i class="icon-before"></i>
				<select id="adv_level">
					<? foreach ($array_hoc_van_uv as $key => $value) { ?>
					<option <?= isset($hv)?($hv==$key)?"selected":"":"" ?> value="<?=$key?>"><?=$value?></option>
					<? } ?>
				</select>
			</div>
			<div class="item adv_exp">
				<i class="icon-before"></i>
				<select id="adv_exp">
					<option value="0">Chọn kinh nghiệm</option>
				</select>
			</div>
			<div class="item adv_gender">
				<i class="icon-before"></i>
				<select id="adv_gender">
					<? foreach ($array_gioi_tinh_tt as $key => $value) { ?>
						<option <?= isset($gt)?($gt==$key)?"selected":"":"" ?> value="<?=$key?>"><?=$value?></option>
					<? } ?>
				</select>
			</div>
			<div class="item adv_money">
				<i class="icon-before"></i>
				<select id="adv_money">
					<? foreach ($array_muc_luong as $key => $value) { ?>
							<option <?= isset($ml)?($ml==$key)?"selected":"":"" ?> value="<?=$key?>"><?=$value?></option>
						<? } ?>
				</select>
			</div>
			<div class="item adv_update">
				<i class="icon-before"></i>
				<select id="adv_update">
					<option value="0">Cập nhật</option>
					<option <?= isset($capnhat)?($capnhat==1)?"selected":"":"" ?> value="1">Hôm nay</option>
					<option <?= isset($capnhat)?($capnhat==2)?"selected":"":"" ?> value="2">1 tuần trở lại</option>
					<option <?= isset($capnhat)?($capnhat==3)?"selected":"":"" ?> value="3">1 tháng trở lại</option>
				</select>
			</div>
			<div class="item">
				<button id="adv_submit">Lọc</button>
				<button id="adv_cancel">Hủy</button>
			</div>
		</div>
		<?}else{?>
			<form onsubmit="return false">
			<input type="hidden" name="lat" id="lat" value="<?php if($addr->results[0]->geometry->location->lat != ''){echo $addr->results[0]->geometry->location->lat; }else{echo '21.0228161';} ?>" />
			<input type="hidden" name="long" id="long" value="<?php if($addr->results[0]->geometry->location->lng != ''){echo $addr->results[0]->geometry->location->lng; }else{echo '105.801944';} ?>" />
			<input type="hidden" type="text" id="fts_id" class="enter_ntd" placeholder="Nhập tên công việc, chức danh ..." />
			<div class="search_item keyword">
			<!-- name="address" id="address" -->
				<i class="fa fa-search" aria-hidden="true"></i>
				<input type="text" id="keyword" placeholder="Nhập vị trí của bạn" onchange="updateLatLng()">
			</div>
			<div class="search_item nn">
				<i class="icon-before"></i>
				<select id="index_nganh_nghe" class="city_cate">
					<option value="0">Chọn ngành nghề</option>
					<?
					foreach ($db_cat as $key => $value) {
					?>
					<option <?= isset($nganhnghe)?($nganhnghe == $value['cat_id'])?"selected":"":"" ?> value="<?=$value['cat_id']?>"><?=$value['cat_name']?></option>
					<?
					}
					?>
				</select>
			</div>
			<div class="search_item tt">
				<i class="icon-before"></i>
				<select id="index_dia_diem" class="city_ab" onchange="updateLatLng()">
					<option value="0">Chọn tỉnh thành</option>
					<?
					foreach ($arrcity as $key => $value) {
					?>
					<option <?= isset($diadiem)?($diadiem == $value['cit_id'])?"selected":"":"" ?> value="<?=$value['cit_id']?>"><?=$value['cit_name']?></option>
					<?
					}
					?>
				</select>
			</div>
			<div class="search_item">
			<select id="index_km" class="city_ab">
				<option value="0">Bán kính (km)</option>
				<? for($i=1;$i<=10;$i++){ 
				$j = $i*2;
				?>
				<option value="<?= $j; ?>"><?= $j.' km'; ?></option>
				<? }
				unset($type, $item);
				?>
				</select>
			</div>
			<div class="text-center pull-right width-100">
				<button type="submit" id="btn_submit" onclick="mapByAdress()">Tìm kiếm</button>
			</div>
		</form>
		<?}?>
	</div>
	<?}?>
</div>