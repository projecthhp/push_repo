<?
include("config.php");

$array_bang_gia = array(
	[
		'key' => 5,
		'val' => "Lọc hồ sơ",
		'id' => "box_lhs",
		'contents' => ['Chủ động tìm kiếm nhân tài','Tiếp cận trực tiếp ứng viên','Tuyển dụng lâu dài']
	],
	[
		'key' => 10,
		'val' => "Combo lọc hồ sơ ghim tin hấp dẫn",
		'id' => "box_combo",
		'contents' => ['Quảng cáo thương hiệu','Tuyển dụng nhanh chóng','Tiết kiệm thời gian và chi phí']
	],
	[
		'key' => 1,
		'val' => "Ghim tin trang chủ box hấp dẫn",
		'id' => "box_hd",
		'contents' => ['Ghim tại box đầu tiên trang chủ','Ứng viên xem tin đăng nhiều nhất','Ứng viên chủ động nộp hồ sơ']
	],
	[
		'key' => 6,
		'val' => "Ghim tin trang chủ box thương hiệu",
		'id' => "box_th",
		'contents' => ['Ghim tại box thứ hai trang chủ','Hiển thị cùng với các NTD hàng đầu','Tiếp cận đúng đổi tượng']
	],
	[
		'key' => 3,
		'val' => "Ghim tin trang chủ box việc làm lương cao",
		'id' => "box_lc",
		'contents' => ['Ghim tại box thứ 3 trang chủ','Hiển thị cùng các tin mới nhất','Tin tuyển dụng ghim cố định lên đầu']
	],
	[
		'key' => 4,
		'val' => "Ghim tin trang ngành",
		'id' => "box_nganh",
		'contents' => ['Tối ưu chi phí tuyển dụng','Tiếp cận đúng ứng viên tìm kiếm','Xây dựng nguồn ứng viên chủ động']
	],
	[
		'key' => 7,
		'val' => "Banner tuyển dụng",
		'id' => "box_td",
		'contents' => ['Tuyển dụng hình ảnh','Tiếp cận ứng viên nhanh chóng','Thu hút tối đa ứng viên']
	],
	[
		'key' => 8,
		'val' => "Biểu tượng tăng click",
		'id' => "box_click",
		'contents' => ['Tăng tỷ lệ click vào tin đăng','Giúp tiếp cận nhiều ứng viên','Làm tin đăng nổi bật hơn']
	],
	[
		'key' => 9,
		'val' => "Tuyển dụng thuê (HEADHUNTER)",
		'id' => "box_headhunter",
		'contents' => ['Cam kết tuyển dụng ứng viên','Tiếp kiệm thời gian','Hỗ trợ nhanh chóng']
	]
);
?>
<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui"/>
		<link rel="canonical" href="<?= $domain ?>" />
		<meta name="p:domain_verify" content=""/>
		<link href="" rel="shortcut icon"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Bảng giá Timviec365.com</title>
		<meta name="description" content=""/>
		<meta name="Keywords" content=""/>
		<meta name="robots" content="noodp,noindex,nofollow"/>		
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="" />
		<meta property="og:description" content="" />
		<meta property="og:site_name" content="tìm việc làm" />
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:description" content="" />
		<meta name="twitter:title" content="" />
		
		<link rel='dns-prefetch' href='//fonts.googleapis.com' />
		<link rel='dns-prefetch' href='//s.w.org' />
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
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	</head>
	<body class="bang_gia">
	<header><?include('../includes/inc_header.php');?></header>
	<?
	if(!$detect->isTablet() && !$detect->isMobile()){
	?>
	<div class="top_head">
		<div class="breakcrumb">
			<ul>
				<li><a href="/">Trang chủ</a></li>
				<li class="active"><a>Bảng giá</a></li>
			</ul>
		</div>
		<h1 class="text-center h1">quyền lợi khi sử dụng dịch vụ</h1>
		<div class="description main text-center">
			<div class="main_desc">
				<div class="item_desc">
					<div class="title_desc">Đối với các gói ghim tin</div>
					<div class="main">
						<div class="item_des"><span>Bảo hành tin đăng:</span> Sau thời hạn ghim tin, nếu không có hồ sơ ứng tuyển sẽ tiếp tục được ghim tin tại vị trí đó với khoảng thời gian tương ứng.</div>
						<div class="item_des"><span>Bảo lưu tin đăng:</span> Tin đăng có thời hạn ghim tin đăng ký >1 tuần sẽ được bảo lưu 52 tuần tiếp theo (tính từ ngày cuối cùng sử dụng dịch vụ) nếu thời gian dịch vụ còn lại trên 1 tuần.</div>
						<div class="item_des"><span>Được đổi tin ghim không giới hạn</span> số lần trong thời gian đăng ký chính với các gói có thời hạn ghim tin từ 1 tuần trở lên tùy theo nhu cầu tuyển dụng của các đơn vị ( không hỗ trợ đổi tin trong thời hạn bảo hành).</div>
					</div>
				</div>
				<div class="item_desc">
					<div class="title_desc">Đối với các gói lọc hồ sơ</div>
					<div class="main">
						<div class="item_des"><span>Bảo hành tin đăng:</span> Sau thời hạn ghim tin, nếu không có hồ sơ ứng tuyển sẽ tiếp tục được ghim tin tại vị trí đó với khoảng thời gian tương ứng.</div>
						<div class="item_des"><span>Bảo lưu tin đăng:</span> Tin đăng có thời hạn ghim tin đăng ký >1 tuần sẽ được bảo lưu 52 tuần tiếp theo (tính từ ngày cuối cùng sử dụng dịch vụ) nếu thời gian dịch vụ còn lại trên 1 tuần.</div>
						<div class="text-center">
							<img src="/images/load.gif" data-src="/images/i_des.png" class="lazyload" alt="Image Des">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="bg_center main">
		<div class="item_center">
		<?
			$i = 1;
			$j = rand();
			foreach($array_bang_gia as $keys => $key){
		?>
		<div class="parent" id="<?=$key['id']?>">
			<div class="child">
				<div class="title_cent">
					<div class="images">
						<i class="icon"></i>
					</div>
					<div class="titleCent"><?=$key['val']?></div>
				</div>
				<div class="content_cent main">
					<?
					foreach($key['contents'] as $contents => $content){?>
					<div class="main item_content"><?=$content?></div>
					<?}?>
				</div>
				<button class="showPackage" onclick="showPackage(`<?=$key['key']?>`,`<?=$j?>`)">Xem chi tiết</button>
			</div>
		</div>
		<?
			if($i % 3 == 0){
				echo '</div><div class="detail_package main" id="detail_package_'.$j.'"></div>';
				if($i < 9) echo '<div class="item_center">';
				$j = rand();
			}
			$i++;
			}
		?>
		</div>
	</div>
	<?
	}else{
		$detect_check = true;
	?>
	<div class="breakcrumb">
		<ul>
			<li><a href="/">Trang chủ</a></li>
			<li class="active"><a>Bảng giá</a></li>
		</ul>
	</div>
	<h1 class="h1 text-center">bảng giá dịch vụ</h1>
	<div class="tab_package main">
		<div class="main_tab">
			<?
			$i = 0;
				foreach($array_bang_gia as $keys => $key){
			?>
			<div onclick="showPackage2(this,<?=$key['key']?>,<?=$detect_check?>)" data-id="<?=$key['key']?>" id="<?=$key['id']?>" class="item_tab <?=$i==0?"active":""?>"><?=$key['val']?></div>
			<?
			$i++;
				}
			?>
		</div>
	</div>
		<div class="detail_package main">
			<?
				$db_qr = new db_query("SELECT * FROM bang_gia WHERE bg_type = 5");
				While($row = mysql_fetch_assoc($db_qr->result)){
			?>
			<div class="item_detail_package">
                <div class="title_package"><?=$row['bg_tuan']?></div>
                <div class="price"><?=$row['bg_gia']?> <span>VNĐ</span></div>
                <div class="main">
                <p class="left pull-left value_package"><i class="fa fa-check" aria-hidden="true"></i>Chiết khấu: <span class="value"><?=$row['bg_chiet_khau']?></span></p>
                <p class="pull-right value_package bg_tk">Tặng kèm: <span class="value"><?=($row['bg_tk']!='')?$row['bg_tk']:"Chưa cập nhật"?></span></p>
                </div>
                <div class="main">
                <p class="left pull-left value_package"><i class="fa fa-check" aria-hidden="true"></i>Giá đã có VAT: <span class="value"><?=$row['bg_vat']?>đ</span></p>
                </div>
                <div class="main">
                    <p class="left pull-left value_package">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        Tặng thẻ điện thoại: <span class="value"><?=($row['bg_the']!='')?$row['bg_the']."đ":"Chưa cập nhật"?></span>
                    </p>
                    <a class="pull-right buy_now" onclick="show_popup()">Mua ngay </a>
                </div>
                <div class="main_bot_package">
                    <div class="item_bot_package benefits_enjoyed" onclick="show_bot_package(this,'bg_quyenloi')"><i class="icon"></i>Quyền lợi  </div>
                    <div class="item_bot_package service_incentives" onclick="show_bot_package(this,'bg_uudai')"><i class="fa fa-gift" aria-hidden="true"></i>Ưu đãi</div>
                    <div class="item_bot_package comment_package" onclick="show_bot_package(this,'bg_comment')"><i class="fa fa-comments" aria-hidden="true"></i>Bình luận</div>
                    <div class="child_bot_package bg_quyenloi">
                        <div class="close_child text-center"><i onclick="close_bot_package(this,'bg_quyenloi')" class="fa fa-times-circle" aria-hidden="true"></i></div>
                        <?=str_replace('style="font-size: 13px;"','',$row['bg_quyenloi'])?>
                    </div>
                    <div class="child_bot_package bg_uudai">
                        <div class="close_child text-center"><i onclick="close_bot_package(this,'bg_uudai')" class="fa fa-times-circle" aria-hidden="true"></i></div>
                        <?=str_replace('style="font-size: 13px;"','',$row['bg_uudai'])?>
                    </div>
                    <div class="child_bot_package bg_comment">
                        <div class="close_child text-center"><i onclick="close_bot_package(this,'bg_comment')" class="fa fa-times-circle" aria-hidden="true"></i></div>
                        <div class="box_cm">
                        <?
                            for($i = 1; $i <= 3; $i++){
                                $bg_cm = 'bg_cm'.$i;
                                echo '
                                    <div class="bg_cm" id="bg_cm'.$i.'">'.$row[$bg_cm].'</div>
                                ';
                            }
                        ?>
                        </div>
                    </div>
                </div>
			</div>
				<?}?>
	</div>
	<?
	}
	include('../includes/inc_modalThanhToan.php');
	include('../includes/inc_footer.php');
	include('../includes/inc_script_footer.php');
	?>
	<script src="../js/banggia.js" defer></script>
	</body>
</html>