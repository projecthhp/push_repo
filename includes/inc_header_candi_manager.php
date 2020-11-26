<div class="top_right main">
	<div class="allow_search pc">
        <label class="activesearch">
            Cho phép NTD tìm kiếm
            <input value="<?=$row['usc_search']?>" name="buttonRounded" <?=($row['usc_search']==1)?"checked":""?> type="checkbox">
            <span class="lever"></span>
        </label>
    </div>
    <div class="menu_top_right pull-right">
    	<ul>
    		<li><a href="/">Trang chủ</a></li>
    		<li><a href="/mau-cv.html">CV xin việc</a></li>
    		<li class="job_search"><a href="/">Tìm việc làm</a></li>
    		<li class="bell"><a><i class="fa fa-bell-o" aria-hidden="true"></i></a></li>
    		<li class="log_out"><a href="/dang-xuat"><i class="fa fa-power-off" aria-hidden="true"></i>Đăng xuất</a></li>
    	</ul>
    </div>
    <div class="top_mb">
    	<i class="fa fa-bell-o" aria-hidden="true"></i>
    	<a href="/"><img src="/images/logo-new.png" alt=""></a>
    	<i class="fa fa-th" aria-hidden="true"></i>
    	<div class="box_menu hidden">
    		<div class="main_menu">
        		<div class="top">
        			<div class="image">
        				<img src="/images/icon365_manager/avt_female.png" alt="">
        			</div>
        			<div class="right_top">
        				<span class="close"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
        				<p class="name"><?=$row['use_name']?></p>
						<p class="refresh_hs">Làm mới hồ sơ</p>
						<a class="show_hs" href="<?=rewriteUV($row['use_id'],$row['use_name'])?>">Xem hồ sơ</a>
        			</div>
        		</div>
        		<div class="allow_search">
		            <label class="activesearch">
		                Cho phép NTD tìm kiếm
		                <input value="<?=$row['usc_search']?>" name="buttonRounded" <?=($row['usc_search']==1)?"checked":""?> type="checkbox">
		                <span class="lever"></span>
		            </label>
		        </div>
		        <div class="menu">
		        	<div class="item mb_qlc">
		        		<div class="parent">
		        			<a href="/thong-tin-tai-khoan-ung-vien.html">
			        			<div class="span_icon">
			        			<i class="icon"></i>
			        			</div>
			        			Quản lý chung
		        			</a>
		        		</div>
		        	</div>
		        	<div class="item mb_hsxv">
		        		<div class="parent">
		        			<!-- <a> -->
			        			<div class="span_icon">
			        			<i class="icon"></i>
			        			</div>
			        			Bộ hồ sơ xin việc
		        				<i class="fa fa-chevron-down" aria-hidden="true"></i>
		        			<!-- </a> -->
		        		</div>
		        		<div class="sub_menu_manager">
		        			<a href="/ung-vien/ho-so-online.html">Hồ sơ online</a>
		        			<a href="/ung-vien/cv-xin-viec.html">CV xin việc</a>
		        			<a href="/ung-vien/don-xin-viec.html">Đơn xin việc</a>
		        			<a href="/ung-vien/thu-xin-viec.html">Thư xin việc</a>
		        			<!-- <a>Sơ yếu lý lịch</a> -->
		        			<a href="/ung-vien/tai-len-ho-so.html">Tải lên hồ sơ</a>
		        		</div>
		        	</div>
		        	<div class="item mb_vl">
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
							
			        			<div class="span_icon">
			        			<i class="icon"></i>
			        			</div>
			        			Việc làm
							</a>
							<? unset($arr_tt,$arr_nn,$id_tt,$id_cate); ?>
		        		</div>
		        	</div>
		        	<div class="item mb_tkqd">
		        		<div class="parent">
		        			<a href="/viec-lam-quanh-day.html" target="_blank" rel="nofollow">
			        			<div class="span_icon">
			        			<i class="icon"></i>
			        			</div>
			        			Tìm việc làm quanh đây
			        		</a>
		        		</div>
		        	</div>
		        	<div class="item mb_vlut">
		        		<div class="parent">
		        			<a href="/ung-vien/viec-lam-ung-tuyen.html" rel="nofollow">
			        			<div class="span_icon">
			        			<i class="icon"></i>
			        			</div>
			        			Việc làm đã ứng tuyển
			        		</a>
		        		</div>
		        	</div>
		        	<div class="item mb_vldl">
		        		<div class="parent">
		        			<a href="/ung-vien/viec-lam-da-luu.html" rel="nofollow">
			        			<div class="span_icon">
			        			<i class="icon"></i>
			        			</div>
			        			Việc làm đã lưu
			        		</a>
		        		</div>
		        	</div>
		        	<div class="item mb_chat">
		        		<div class="parent">
		        			<a href="/ung-vien/tin-nhan.html" rel="nofollow">
			        			<div class="span_icon">
			        			<i class="icon"></i>
			        			</div>
			        			Tin nhắn từ NTD
			        		</a>
		        		</div>
		        	</div>
		        	<div class="item mb_bm">
		        		<div class="parent">
		        			<a href="/blog/c3/bieu-mau" rel="nofollow">
			        			<div class="span_icon">
			        			<i class="icon"></i>
			        			</div>
			        			Biểu mẫu nhân viên
			        		</a>
		        		</div>
		        	</div>
		        	<div class="item mb_cn">
		        		<div class="parent">
		        			<a href="/blog/c1/cam-nang-tim-viec">
			        			<div class="span_icon">
			        			<i class="icon"></i>
			        			</div>
			        			Cẩm nang tìm việc
			        		</a>
		        		</div>
		        	</div>
		        	<div class="item mb_qltk">
		        		<div class="parent">
		        			<a>
			        			<div class="span_icon">
			        			<i class="icon"></i>
			        			</div>
			        			Quản lý tài khoản
			        			<i class="fa fa-chevron-down" aria-hidden="true"></i>
		        			</a>
		        		</div>
		        		<div class="sub_menu_manager">
		        			<a href="/ung-vien/doi-mat-khau.html">Đổi mật khẩu</a>
		        		</div>
		        	</div>
		        </div>
		        <div class="log_out text-center main">
		        	<a href="/dang-xuat"><i class="fa fa-power-off" aria-hidden="true"></i> Đăng xuất</a>
		        </div>
    		</div>
    	</div>
    </div>
    <div class="chuyenvien_pc main">
    	<div class="image">
    		<img src="/images/icon365_manager/chuyenvien_uv.jpg" class=" lazyloaded" data-src="/images/chuyenvien.jpg" alt="Chuyên viên">
    	</div>
    	<p>Chuyên viên hỗ trợ: <span>Ms.Thu Hằng</span></p>
    	<p>SĐT: <span>0359742858</span></p>
		<p>Zalo: <span>0813 519 658</span></p>
    	<p>Email: <span>rubyhhb17@gmail.com</span></p>
    </div>
    <?
	    $ar_warning = [];
    	if($row['gender']=='' || $row['lg_honnhan']=='' || $row['birthday']=='') {
    		$warning_ttcn = 1;
    		$ar_warning[] = 'Thông tin cá nhân';
    	}
    	if($row['use_job_name']=='' || $row['work_option']=='' || $row['cap_bac_mong_muon']==0 || $row['exp_years']=='' || $row['exp_years']=='' || $row['exp_years']=='' || $row['salary']==0) {
    		$warning_cvmm = 1;
    		$ar_warning[] = 'Công việc mong muốn';
    	}
    	if($row['muc_tieu_nghe_nghiep']==''){
    		$warning_mtnn = 1;
    		$ar_warning[] = 'Mục tiêu nghề nghiệp';
    	}
    	if($row['ki_nang_ban_than']==''){
    		$warning_knbt = 1;
    		$ar_warning[] = 'Kỹ năng bản thân';
    	}
    	$db_qrss = new db_query("SELECT count(*) as total FROM user_hocvan WHERE use_id = ".$row['use_id']);
    	$result = mysql_fetch_assoc($db_qrss->result);
    	$result = $result['total'];
    	if($result == 0){
    		$warning_bc = 1;
    		$ar_warning[] = 'Bằng cấp';
    	}
    	$db_qrss = new db_query("SELECT count(*) as total FROM use_ngoaingu WHERE use_id = ".$row['use_id']);
    	$result = mysql_fetch_assoc($db_qrss->result);
    	$result = $result['total'];
    	if($result == 0){
    		$warning_nn = 1;
    		$ar_warning[] = 'Ngoại ngữ';
    	}
    	$db_qrss = new db_query("SELECT count(*) as total FROM use_kinhnghiem WHERE use_id = ".$row['use_id']);
    	$result = mysql_fetch_assoc($db_qrss->result);
    	$result = $result['total'];
    	if($result == 0){
    		$warning_kn = 1;
    		$ar_warning[] = 'Kinh nghiệm làm việc';
    	}
    	$db_qrss = new db_query("SELECT count(*) as total FROM user_tham_chieu WHERE id_user = ".$row['use_id']." AND ho_ten <> ''");
    	$result = mysql_fetch_assoc($db_qrss->result);
    	$result = $result['total'];
    	if($result == 0){
    		$warning_ntc = 1;
    		$ar_warning[] = 'Người tham chiếu';
    	}
    	unset($db_qrss,$result);
    	if(count($ar_warning) > 0){
    ?>
    <div class="warning main">
    	Hãy cập nhật thông tin về <?= implode(', ',$ar_warning) ?> trong hồ sơ của bạn để tăng chất lượng hồ sơ và thu hút nhà tuyển dụng
    	<a href="/ung-vien/ho-so-online.html">Cập nhật ngay</a>
    </div>
    <?
    	}
    ?>
</div>