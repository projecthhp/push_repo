<? 
include("config.php"); 

$coid = getValue('coid','int','GET',0);
$coid = (int)@$coid;
$page  = getValue('page','int','GET',1,2);
$page  = intval(@$page);
if($page == 0)
{
	$page = 1;
}
$curentPage = 10;
$pageab = abs($page - 1);
$start = $pageab * $curentPage;
$start = intval(@$start);
$start = abs($start);

$db_view = new db_query("UPDATE user_company SET usc_view_count = usc_view_count + 1 WHERE usc_id = ".$coid);
$db_qr = new db_query("SELECT * FROM user_company JOIN user_company_multi ON user_company.usc_id = user_company_multi.usc_id WHERE user_company.usc_id = ".$coid." LIMIT 1");
$row = mysql_fetch_assoc($db_qr->result);
if(mysql_num_rows($db_qr->result) == 0)
{
	redirect("/");
}

if ($row['usc_redirect'] != '') {
    header("HTTP/1.1 301 Moved Permanently"); 
    header("Location: ".$row['usc_redirect']);
    exit();
}

$db_qrs = new db_query("SELECT * FROM new WHERE new_user_id = ".$coid." AND new_active = 1 AND new_thuc = 1 ORDER BY new.new_id DESC LIMIT ".$start.",".$curentPage);
$numrow = new db_query("SELECT new_id FROM new WHERE new_user_id = ".$coid);

$urlcano = $domain.rewrite_company($row['usc_id'],$row['usc_company'],$row['usc_alias']);

$pageccr = mysql_num_rows($numrow->result)/$curentPage;
$pageccr =  ceil($pageccr);
if($page > 1)
{
	if($page == $pageccr)
	{
		$url_prev = $urlcano."?page=".($page-1);
		$metaprev = "<link rel='pre' href='".$url_prev."'/>";
		$metanext = "";   
	}
	else
	{
		$url_next = $urlcano."?page=".($page+1);
		$metanext = "<link rel='next' href='".$url_next."'/>";
		$url_prev = $urlcano."?page=".($page-1);
		$metaprev = "<link rel='pre' href='".$url_prev."'/>";
	}
	$pagetit = " - trang ".$page."";
}
else if($page == 1)
{
	if($pageccr == 1)
	{
		$metanext = "";
		$metaprev = "";
	}
	else
	{
		$url_next = $urlcano."?page=".($page+1);
		$metanext = "<link rel='next' href='".$url_next."'/>";
		$metaprev = "";
	}
	$pagetit = "";
}
$titleweb = mb_convert_case(trim($row['usc_company']),MB_CASE_TITLE,'UTF-8');
$titleweb = str_replace("Tnhh","TNHH",$titleweb);
$titleweb = str_replace("Cp","CP",$titleweb);
$urlpage1 = $urlcano."?page=1";
$urlht = $domain.$_SERVER["REQUEST_URI"];
if($urlcano != $urlht)
{
   header("HTTP/1.1 301 Moved Permanently"); 
   header("Location: $urlcano");
   exit();
}
if($row['meta_tit']!=''){
	$title_seo = $row['meta_tit'];
}
else{
	$title_seo = $titleweb.' tuyển dụng - Timviec365.com';
}

if($row['meta_des']!=''){
	$des_seo = $row['meta_des'];
}
else{
	$titledes = str_replace('Công Ty','',$titleweb);
	$titledes = str_replace('Công ty','',$titledes);
	$des_seo = 'Tra cứu thông tin công ty '.trim($titledes).', danh sách tin tuyển dụng mới nhất tại công ty '.trim($titledes).'';
}

if($row['meta_key']!=''){
	$key_seo = $row['meta_key'];
}
else{
	$key_seo = $titleweb;
}
$time = time();
$db_rate = new db_query("SELECT * FROM tbl_rate_company WHERE usc_id = ".$coid." AND rate_active = 1");
$db_count = new db_query("SELECT count(*) FROM tbl_rate_company WHERE usc_id = ".$coid." AND rate_active = 1");
$countRate = mysql_fetch_assoc($db_count->result);
$count_rate = $countRate['count(*)'];

$countStars = 0;
$culture_company = 0;
$welfare = 0;
$boss = 0;
$office = 0;
$promotion_opportunities = 0;
$recommendFriend = 0;
$work_environment = 0;
$forBoss = 0;
if(mysql_num_rows($db_rate->result)){
	While($itemRate = mysql_fetch_assoc($db_rate->result)){
		if($itemRate['recommend'] == 1) 
			$recommendFriend++;
		if($itemRate['forBoss'] == 1) 
			$forBoss++;
		if($itemRate['work_environment'] == 1) 
			$work_environment++;
		$countStars += $itemRate['countStar'];
		$culture_company += $itemRate['culture_company'];
		$welfare += $itemRate['welfare'];
		$boss += $itemRate['boss'];
		$office += $itemRate['office'];
		$promotion_opportunities += $itemRate['promotion_opportunities'];
	}
	$countStars = $countStars/$count_rate;
	$countStars = round($countStars,1);
	$culture_company = $culture_company/$count_rate;
	$welfare = $welfare/$count_rate;
	$boss = $boss/$count_rate;
	$office = $office/$count_rate;
	$promotion_opportunities = $promotion_opportunities/$count_rate;

	$recommendFriend = round($recommendFriend/$count_rate*100,1);
	$forBoss = round($forBoss/$count_rate*100,1);
	$work_environment = round($work_environment/$count_rate*100,1);
}

$easy = 0;
$normal = 0;
$hard = 0;
$db_pv = new db_query("SELECT * FROM tbl_rate_interview WHERE usc_id = ".$coid." AND rate_active = 1");
$num_pv = mysql_num_rows($db_pv->result);
$name_cookie_like = 'like_'.$coid;
$name_cookie_likeRate = 'likeRate_'.$coid;
$name_cookie_Inteview = 'likeInterview_'.$coid;
$active_like = (isset($_COOKIE[$name_cookie_like]))?"active":"";
$active_likeRate = (isset($_COOKIE[$name_cookie_likeRate]))?"active":"";
$active_Inteview = (isset($_COOKIE[$name_cookie_Inteview]))?"active":"";
$index = ($row['usc_index']==1)?"noodp,index,follow":"noodp,noindex,nofollow";
// var_dump(file_exists(geturlimageAvatar($row['usc_create_time']).$row['usc_logo']));
if($row['usc_logo'] != '' && file_exists(geturlimageAvatar($row['usc_create_time']).$row['usc_logo']) == true) 
	$og_image = str_replace('../','https://timviec365.com/',geturlimageAvatar($row['usc_create_time']).$row['usc_logo']);
else
	$og_image = "https://timviec365.com/images/logo-new.png";
?>
<!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<link rel="canonical" href="<?= $urlcano ?>" />
	<meta name="p:domain_verify" content=""/>
	<link href="" rel="shortcut icon"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title><?=$title_seo ?></title>
	<meta name="description" content="<?=$des_seo ?>"/>
	<meta name="Keywords" content="<?=$key_seo ?>"/>
	<meta name="robots" content="<?=$index?>"/>
	<meta property="og:locale" content="vi_VN" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?=$title_seo ?>" />
	<meta property="og:description" content="<?=$des_seo ?>" />
	<meta property="og:site_name" content="Timviec365.com" />
	<meta property="og:image" content="<?=$og_image?>"/>
	<meta property="og:image:width" content="476"/>
	<meta property="og:image:height" content="249"/>
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:description" content="<?=$des_seo ?>" />
	<meta name="twitter:title" content="<?=$title_seo ?>" />

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
<body id="detail_company">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
<header>
	<? include('../includes/inc_header.php'); ?>
	<div id="banner">
		<? include('../includes/inc_search.php'); ?>
		<p class="taingay text-center">Tải ngay ứng dụng timviec365 và cv365+ trên điện thoại để trải nghiệm tốt nhất</p>
		<div class="qr_app text-center">
			<a class="text-left downLoad_App Timviec365" href="/ung-dung-tim-viec-lam.html" rel="nofollow"><i class="icon"></i>Tải app Timviec365</a>
			<a class="text-left downLoad_App CV365" href="/ung-dung-tao-cv.html" rel="nofollow"><i class="icon"></i>Tải app CV365</a>
		</div>
	</div>
</header>
<div class="breakcrumb">
	<ul>
		<li><a href="/">Trang chủ</a></li>
		<li class="active"><span><?= name_company($row['usc_company'])?></span></li>
	</ul>
</div>
<div class="box_detail_com">
	<div class="top_main main">
		<div class="top main">
			<h1 class="dtname_company"><?= name_company($row['usc_company'])?></h1>
			<div class="button pull-right">
				<a class="like btnLike <?=$active_like?>" data-type="likeCompany"><i class="fa fa-thumbs-up" aria-hidden="true"></i><?=($active_like=='')?'Like':"Liked"?></a>
				<a href="<?=rewrite_rate($row['usc_id'])?>" rel="nofollow" class="rate"><i class="fa fa-star-o" aria-hidden="true"></i> Đánh giá</a>
			</div>
		</div>
		<div class="bottom_main main">
			<div class="img"><img src="/images/load.gif" class="lazyload" alt="<?=$row['usc_company']?>" onerror='this.onerror=null;this.src="/images/logo-new.png";' data-src="<?= geturlimageAvatar($row['usc_create_time']).$row['usc_logo'] ?>"></div>
			<div class="thongso pull-right">
				<p class="point"><?=round($countStars,1)?></p>
				<p class="star">
				<?
				if($countStars == 0){
					for($iStar = 0; $iStar < 5;$iStar++){
						echo '<i class="fa fa-star none" aria-hidden="true"></i>';
					}
				}else{
					for($iStar = 1; $iStar <= 5;$iStar++){
						if($iStar <= $countStars) echo '<i class="fa fa-star" aria-hidden="true"></i>'; 
						else if(is_float($countStars) && $iStar == round($countStars)) echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
						else echo '<i class="fa fa-star none" aria-hidden="true"></i>';
					}
				}
				?>
				</p>
				<p class="count_dgia"><?=$count_rate?> đánh giá</p>
			</div>
			<div class="ttcb pull-left">
				<?
					if($row['financial_sector'] != ''){
						$financial_sector = explode(',',$row['financial_sector']);
						$arr_sector = array();
						foreach($financial_sector as $key => $value){
							$arr_sector[] = $array_linh_vuc[$value];
						}
						echo '<p class="financial_sector"><i class="icon"></i>'.implode(' - ',$arr_sector).'</p>';
					}
				?>
				<p class="address"><i class="icon"></i><?= ($row['usc_size'])?$array_quy_mo[$row['usc_size']]:"Chưa cập nhật" ?></p>
				<p class="website"><i class="icon"></i><?= ($row['usc_website']!='')?$row['usc_website']:'Chưa cập nhật' ?></p>
			</div>
			<div id="ver_mb">
				<div class="thongso pull-left">
					<p class="point"><?=round($countStars,1)?></p>
					<p class="star">
						<?
							for($iStar = 1; $iStar <= 5;$iStar++){
								if($iStar <= $countStars) echo '<i class="fa fa-star" aria-hidden="true"></i>'; 
								else if(is_float($countStars) && $iStar == round($countStars)) echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
								else echo '<i class="fa fa-star none" aria-hidden="true"></i>';
							}
						?>
					</p>
					<p class="count_dgia"><?=$count_rate?> đánh giá</p>
				</div>
				<div class="button pull-right">
					<a class="like btnLike <?=$active_like?>" data-type="likeCompany"><i class="fa fa-thumbs-up" aria-hidden="true"></i><?=($active_like=='')?'Like':"Liked"?></a>
					<a href="<?=rewrite_rate($row['usc_id'])?>" rel="nofollow" class="rate"><i class="fa fa-star-o" aria-hidden="true"></i> Đánh giá</a>
				</div>
			</div>
			<div class="main_dmuc main">
				<div class="main">
					<a class="item active" data-href="#general">Tổng quan</a>
					<a class="item" data-href="#picture">Ảnh</a>
					<a class="item" data-href="#rate">Đánh giá<span>(<?=$count_rate?>)</span></a>
					<a class="item" data-href="#interview">Phỏng vấn<span>(<?=$num_pv?>)</span></a>
					<a class="item" data-href="#job">Việc làm<span>(<?=mysql_num_rows($numrow->result)?>)</span></a>
					<a class="item" data-href="#contact">Liên hệ</a>
				</div>
			</div>
		</div>
	</div>
	<div class="center_main main">
		<div class="left_center">
			<div class="tongquan main" id="general">
				<h2 class="namedmuc">tổng quan</h2>
				<?
					$ar_addr = explode('|',$row['usc_address']);
					if(count($ar_addr) == 1) echo '<p class="itemtq"><span>Trụ sở chính: </span>'.$ar_addr[0].'</p>';
					else{
						echo '<div class="itemtq"><span>Địa chỉ:</span>';
						for($i = 0; $i < count($ar_addr); $i++){
							$u = $i;
							$u = ++$u;
							echo '<p class="brach_company"><span>Chi nhánh '. $u .'</span> : '.$ar_addr[$i].'</p>';
						}
						echo '</div>';
					}
				?>
				
				<p class="itemtq"><span>Quy mô công ty: </span><?= ($row['usc_size']>0)?$array_quy_mo_com[$row['usc_size']]:"Chưa cập nhật"?></p>
				<p class="itemtq"><span>Mã số thuế: </span><?= ($row['usc_mst']!='' && $row['usc_mst']!=0)?$row['usc_mst']:'Chưa cập nhật' ?></p>
				<p class="itemtq"><span>Tổng giám đốc / Người đại diện pháp luật: </span><?=($row['usc_boss']!='')?$row['usc_boss']:"Chưa cập nhật"?></p>
				<p class="itemtq web"><span>Website: </span><?= ($row['usc_website']!='')?$row['usc_website']:'Chưa cập nhật' ?></p>
				<p class="itemtq">
					<span>Lĩnh vực tài chính: </span>
					<?
					if($row['financial_sector'] != ''){
						$financial_sector = explode(',',$row['financial_sector']);
						$arr_sector = array();
						foreach($financial_sector as $key => $value){
							$arr_sector[] = $array_linh_vuc[$value];
						}
						echo implode(' - ',$arr_sector);
					}else echo 'Chưa cập nhật';
					?>
				</p>
				<div class="mota">
					<?
					if($row['usc_company_info']!='') $mota = preg_replace('#(<br */?>\s*)+#i', '<br />',nl2br($row['usc_company_info']));
					else $mota = '';
					echo strip_tags($mota); 
					?>
				</div>
			</div>
			<div class="images_company main" id="picture">
				<h2 class="namedmuc">Hình ảnh</h2>
				<?
				if($row['image_com'] != ''){
					$image_com = explode(',',$row['image_com']);
				?>
				<div class="main main_pic">
					<? foreach($image_com as $key => $image){ ?>
					<div class="item"><img src="/images/load.gif" class="lazyload" data-src="/pictures/images_company/<?=$image?>" alt="<?=$image?>"></div>
					<?}?>
				</div>
				<?}
				else if(isset($_COOKIE['UID']) && ($_COOKIE['UID'] == $coid) && $_COOKIE['UT']==1)
					echo '<a href="/thong-tin-tai-khoan-nha-tuyen-dung.html">Hãy đăng tải hình ảnh công ty của bạn !!!</a>';
				else echo 'Hình ảnh chưa cập nhật';
				?>
			</div>
			<div class="danhgia_cty main" id="rate">
				<div class="main_dgcty main">
					<h2 class="namedmuc">Đánh giá công ty</h2>
					<div class="dgia_left">
						<svg class="top">
							<circle class="circle_e5"  />
							<circle class="circle_276" r="59" />
							<text class="text" x="58" y="60" text-anchor="middle">
							<tspan id="tspan" alignment-baseline="middle"><?=$countStars?></tspan>
							</text>
						</svg> 
						<div class="bottom">
							<p class="star">
							<?
								if($countStars == 0){
									for($iStar = 0; $iStar < 5;$iStar++){
										echo '<i class="fa fa-star none" aria-hidden="true"></i>';
									}
								}else{
									for($iStar = 1; $iStar <= 5;$iStar++){
										if($iStar <= $countStars) echo '<i class="fa fa-star" aria-hidden="true"></i>'; 
										else if(is_float($countStars) && $iStar == round($countStars)) echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
										else echo '<i class="fa fa-star none" aria-hidden="true"></i>';
									}
								}
							?>
							</p>
							<p class="count_dgia"><?=$count_rate?> đánh giá</p>
						</div>
					</div>
					<div class="dgia_right">
						<div class="item">
							<label class="left">Sẽ giới thiệu cho bạn bè</label>
							<div class="process">
								<p style="width:<?=$recommendFriend?>%"></p>
							</div>
							<label class="right"><?=$recommendFriend?>%</label>
						</div>
						<div class="item">
							<label class="left">Hài lòng về môi trường làm việc</label>
							<div class="process">
								<p style="width:<?=$work_environment?>%"></p>
							</div>
							<label class="right"><?=$work_environment?>%</label>
						</div>
						<div class="item">
							<label class="left">Hài lòng về lãnh đạo công ty</label>
							<div class="process">
								<p style="width:<?=$forBoss?>%"></p>
							</div>
							<label class="right"><?=$forBoss?>%</label>
						</div>
						<div class="readmore_dg" data-class="pop_xh">
							Xem thêm <i class="fa fa-angle-double-right" aria-hidden="true"></i>
						</div>
					</div>
				</div>
				<div class="main_dgnbat">
					<?
						$db_noibat = new db_query("SELECT rate_id,countStar,staff,strong,weakness,rate_com,rate_like FROM tbl_rate_company WHERE usc_id = ".$coid." AND rate_active = 1 ORDER BY countStar DESC,rate_like DESC");
						$num_nb = mysql_num_rows($db_noibat->result);
						if($num_nb == 0){	
					?>
					<div class="non-dgia text-center">
						<p class="text-center">Hãy là người đầu tiên đánh giá công ty này</p>
						<a href="<?=rewrite_rate($row['usc_id'])?>" rel="nofollow" class="dg"><i class="fa fa-star-o" aria-hidden="true"></i>Đánh giá</a>
					</div>
					<?}else{
						$row_nb = mysql_fetch_assoc($db_noibat->result);
					?>
						<h2 class="namedmuc">Đánh giá nổi bật</h2>
						<div class="gdnbat main">
							<div class="item">
								<div class="logo">
									<img class="lazyload" onerror='this.onerror=null;this.src="/images/logo-new.png";' src="/images/load.gif" data-src="<?= geturlimageAvatar($row['usc_create_time']).$row['usc_logo'] ?>" alt="<?=name_company($row['usc_company'])?>">
								</div>
								<div class="center">
									<p class="dgia_forcompany">“<?=$row_nb['rate_com']?>”</p>
									<p class="star">
										<?
											for($i = 1; $i <= 5;$i++){
												if($i <= $row_nb['countStar']) echo '<i class="fa fa-star" aria-hidden="true"></i>';
												else echo '<i class="fa fa-star none" aria-hidden="true"></i>';
											}
										?>
									</p>
									<p class="chucvu"><?=($row_nb['staff']==1)?"Nhân viên hiện tại":"Nhân viên cũ"?></p>
								</div>
								<div class="like">
									<a data-id="<?=$row_nb['rate_id']?>" data-type="likeRateCompany" class="btnLike <?=$active_likeRate?>"><?=($active_likeRate=='')?'Thích':"Đã thích"?></a> <i class="fa fa-thumbs-up" aria-hidden="true"></i> <span class="val"><?=$row_nb['rate_like']?></span>
								</div>
							</div>
						<div class="box_uunhuoc">
							<p class="td">Ưu điểm</p>
							<div class="content"><?=$row_nb['strong']?></div>
						</div>
						<div class="box_uunhuoc">
							<p class="td">Nhược điểm</p>
							<div class="content"><?=$row_nb['weakness']?></div>
						</div>
					</div>
					<div class="user_next_dgia text-center">
						<p class="text-center">Hãy là người tiếp theo đánh giá công ty này</p>
						<a href="<?=rewrite_rate($row['usc_id'])?>" rel="nofollow" class="dg"><i class="fa fa-star-o" aria-hidden="true"></i>Đánh giá</a>
						<?if($num_nb - 1 > 0){?>
						<div class="text-center">
							<a class="showmore" data-class="pop_danhgia">Xem thêm tất cả <? echo $num_nb - 1?> đánh giá <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
						</div>
						<?}?>
					</div>
					<?}?>
				</div>
			</div>
			<div class="box_pv main" id="interview">
				<h2 class="namedmuc">Phỏng vấn tại công ty</h2>
				<?
					if($num_pv>0){
						$row_pv = mysql_fetch_assoc($db_pv->result);
						if($row_pv['feel']==1) $easy++;
						if($row_pv['feel']==2) $normal++;
						if($row_pv['feel']==3) $hard++; 
						$array_phong_van = ['1'=>'Dễ','2'=>'Trung bình','3'=>'Khó'];
				?>
				<div class="main main_canvas">
					<div id="canvas-holder">
						<canvas id="chart-area"></canvas>
					</div>
				</div>
				<div class="box_ndpv main">
					<div class="item main">
						<div class="img"><img src="/images/load.gif" data-src="/images/candi_null.png" class="lazyload" alt="Image Pv"></div>
						<div class="center">
							<p class="position_pv">Vị trí phỏng vấn: <?=$row_pv['position']?></p>
							<p class="level_pv">Đánh giá: <span><?=$array_phong_van[$row_pv['feel']]?></span></p>
						</div>
						<div class="like">
							<a class="btnLike <?=$active_Inteview?>" data-id="<?=$row_nb['rate_id']?>" data-type="likeRateInterview"><?=($active_Inteview=='')?'Thích':"Đã thích"?></a> <i class="fa fa-thumbs-up" aria-hidden="true"></i> <span class="val"><?=$row_pv['rate_like']?></span>
						</div>
					</div>
					<div class="box_qtpv main">
						<div class="item">
							<div class="td">Quá trình phỏng vấn</div>
							<div class="nd"><?=$row_pv['description']?></div>
						</div>
						<div class="item">
							<div class="td">Câu hỏi phỏng vấn</div>
							<div class="nd"><?=$row_pv['questions']?></div>
						</div>
						<div class="item">
							<div class="td">Câu trả lời phỏng vấn</div>
							<div class="nd"><?=$row_pv['answers']?></div>
						</div>
					</div>
					<div class="user_next_dgia text-center">
						<p class="text-center">Hãy là người tiếp theo đánh giá về cuộc phỏng vấn</p>
						<a rel="nofollow" href="<?=rewrite_interview($row['usc_id'])?>" class="dg"><i class="fa fa-star-o" aria-hidden="true"></i>Đánh giá</a>
						<?if($num_pv>=2){?>
						<div class="text-center">
							<a class="showmore" data-class="pop_pv">Xem thêm tất cả <?=$num_pv-1?> đánh giá <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
						</div>
						<?}?>
					</div>
				</div>
				<?
				}else{
					echo '<div class="non-dgia text-center">
					<p class="text-center">Hãy là người đầu tiên đánh giá về cuộc phỏng vấn</p>
					<a href="'.rewrite_interview($row["usc_id"]).'" rel="nofollow" class="dg"><i class="fa fa-star-o" aria-hidden="true"></i>Đánh giá</a></div>';
				}
				?>
			</div>
			<div class="box_JobInCompany main" id="job">
				<h2 class="namedmuc">Việc làm tại công ty</h2>
				<div id="search_JobInCompany" class="main">
					<div class="box_JobCate">
						<select id="box_jobCate">
							<option value="0">Chọn ngành nghề</option>
							<? foreach ($db_cat as $key => $value) {?>
							<option value="<?=$value['cat_id']?>"><?=$value['cat_name']?></option>
							<?} ?>
						</select>
					</div>
					<div class="box_JobCity">
						<select id="box_jobCity">
							<option value="0">Chọn tỉnh thành</option>
							<? foreach ($arrcity as $key => $value) {?>
							<option value="<?=$value['cit_id']?>"><?=$value['cit_name']?></option>
							<?} ?>
						</select>
					</div>
					<input class="btn_submit" data-company="<?=$coid?>" type="button" value="Tìm kiếm">	
				</div>
				<div class="main main_kq">
					<?
					$login = (isset($_COOKIE['UT']) && $_COOKIE['UT'] == 0)?"":"login";
					$db_qrs = new db_query("SELECT new.new_id,new_title,new_money,new_city,new_han_nop,new_alias,new_mota,new_update_time,new_create_time FROM new JOIN new_multi ON new.new_id = new_multi.new_id WHERE new_user_id = ".$coid." ORDER BY new.new_id DESC");
					
					While($rows = mysql_fetch_assoc($db_qrs->result))
						{
					?>
					<div class="item main">
						<div class="logo">
							<img class="lazyload" data-src="<?= geturlimageAvatar($row['usc_create_time']).$row['usc_logo'] ?>"  onerror='this.onerror=null;this.src="/images/logo-new.png";' alt="<?= name_company($row['usc_company'])?>" src="/images/load.gif">
						</div>
						<div class="center">
							<a href="<?= rewriteNews($rows['new_id'],$rows['new_title'],$rows['new_alias']) ?>" class="title_new">
								<?= $rows['new_title'] ?>
							</a>
							<p class="times"><?= date('d/m/Y',$rows['new_han_nop']) ?></p>
							<p class="money"><?= $array_muc_luong[$rows['new_money']] ?></p>
							<p class="ddiem">
							<?
							if($rows['new_city'] != 0){
								$arr_city = explode(',', $rows['new_city']);
								$name_city = "";
								foreach ($arr_city as $key => $value) {
									$name_city .= $arrcity[$value]['cit_name'].'  ';
								}
								echo $name_city;
							}else{
								echo "Toàn quốc";
							}
							?>	
							</p>
						</div>
						<?
							$num_ut = 0;
							if($login == ''){
								$check_ut = new db_query("SELECT count(*) FROM nop_ho_so WHERE nhs_use_id = ".$_COOKIE['UID']." AND nhs_new_id = ".$rows['new_id']." ");
								$num_ut = mysql_fetch_assoc($check_ut->result);
								$num_ut = $num_ut['count(*)'];
							}
						?>
						<div class="right">
							<a class="apply <?= ($num_ut == 1)?"active":"" ?> <?=$login?>" <?= ($login == '' && $num_ut == 0)?'data-idnew="'.$rows['new_id'].'" data-id="'.$_COOKIE['UID'].'" data-idcom="'.$coid.'"':"" ?>><i class="fa fa-paper-plane" aria-hidden="true"></i><?= ($num_ut == 1)?"Đã ứng tuyển":"Ứng tuyển ngay" ?></a>
						</div>
						<div class="demo_content">
							<?=hide_infocontact($rows['new_mota'])?>
							<? $time_update = ($rows['new_update_time'] > $rows['new_create_time'])?$rows['new_update_time']:$rows['new_create_time']; ?>
						</div>
						<div class="showmore">
							<span><i class="fa fa-clock-o" aria-hidden="true"></i>  <?=time_elapsed_string($time_update);?></span>
							<a href="<?= rewriteNews($rows['new_id'],$rows['new_title'],$rows['new_alias']) ?>">Xem thêm  <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
						</div>
					</div>
					<?}?>
				</div>
			</div>
			<div class="box_contact main" id="contact">
				<h2 class="namedmuc">liên hệ</h2>
				<div class="clear"></div>
				<div class="left_contact">
					<div class="form-group">
						<label for="">Trụ sở chính:</label>
						<div class="nd"><?=$row['usc_address']?></div>	
					</div>
					<div class="form-group">
						<label for="">Số điện thoại:</label>
						<div class="nd"><?=($login == '')?$row['usc_phone']:'<span class="login_contact">Đăng nhập để xem SĐT.</span>'?></div>	
					</div>
					<div class="form-group">
						<label for="">Email:</label>
						<div class="nd"><?=($login == '')?$row['usc_email']:'<span class="login_contact">Đăng nhập để xem Email.</span>'?></div>	
					</div>
				</div>
				<div class="right_contact">
					<?
					$add_maps = trim($row['usc_address']);
					?>
					<iframe width="100%" height="600" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=52.70967533219885, -8.020019531250002&amp;q=<?=$add_maps?>&ampt='';z=14;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
				</div>
			</div>				
		</div>
		<div class="right_center">
			<?
			$db_new = new db_query("SELECT new_cat_id FROM new WHERE new_user_id = ".$coid." ORDER BY new_create_time DESC LIMIT 1 ");
			if(mysql_num_rows($db_new->result)>0){
				$r_new = mysql_fetch_assoc($db_new->result);
				$r_new = explode(',',$r_new['new_cat_id'])[0];					
				$db_new = new db_query("SELECT new_id, new_title, new_alias, usc_company, new_money,new_han_nop, usc_alias,usc_id FROM new JOIN user_company ON new_user_id = usc_id WHERE new_han_nop > ".$time." AND FIND_IN_SET('".$r_new."',new_cat_id) ORDER BY RAND() LIMIT 5 ");
			?>
			<div class="box_NewCanLike main">
				<h2 class="heading_dtcom">CÔNG VIỆC BẠN CÓ THỂ THÍCH</h2>
				<div class="main_NewCanLike main">
					<?While($row_new = mysql_fetch_assoc($db_new->result)){?>
						<div class="item main">
							<a href="<?=rewriteNews($row_new['new_id'],$row_new['new_title'],$row_new['new_alias'])?>" class="title_new"><?=$row_new['new_title']?></a>
							<a href="<?=rewrite_company($row_new['usc_id'],$row_new['usc_company'],$row_new['usc_alias'])?>" class="name_company"><?=$row_new['usc_company']?></a>
							<p class="p_salary"><i class="salary"></i><?=$array_muc_luong[$row_new['new_money']]?></p>
							<p class="p_time"><i class="time"></i><?=date('d/m/Y',$row_new['new_han_nop'])?></p>
						</div>
					<?}?>
				</div>
				
			</div> 
			<?}?>
			<div class="box_dntt main">
				<h2 class="heading_dtcom">DOANH NGHIỆP TƯƠNG TỰ</h2>
				<div class="main_dntt main">
					<?
					$district_id = explode(',',$row['usc_district'])[0];
					if($row['financial_sector']!=''){
						$financialSector = explode(',',$row['financial_sector'])[0];
						$sql_tt = "SELECT user_company.usc_id, usc_company,usc_alias, usc_logo,usc_create_time FROM user_company JOIN user_company_multi ON user_company.usc_id = user_company_multi.usc_id WHERE FIND_IN_SET('".$financialSector."',financial_sector) AND user_company.usc_id <> ".$coid." LIMIT 5";
						$db_tt = new db_query($sql_tt);
						if(mysql_num_rows($db_tt->result) == 0){
							$sql_tt = "SELECT user_company.usc_id, usc_company,usc_alias, usc_logo,usc_create_time FROM user_company JOIN user_company_multi ON user_company.usc_id = user_company_multi.usc_id WHERE usc_district = ".$district_id." AND user_company.usc_id <> ".$coid." LIMIT 5";
						}
					}else{
						$sql_tt = "SELECT user_company.usc_id, usc_company,usc_alias, usc_logo,usc_create_time FROM user_company JOIN user_company_multi ON user_company.usc_id = user_company_multi.usc_id WHERE usc_district = ".$district_id." AND user_company.usc_id <> ".$coid." LIMIT 5";
					}
					$db_tt = new db_query($sql_tt);
					While($row_tt = mysql_fetch_assoc($db_tt->result)){
					?>
						<div class="item main">
							<a href="<?=rewrite_company($row_tt['usc_id'],$row_tt['usc_company'],$row_tt['usc_alias'])?>" class="logo">
							<img src="/images/load.gif" class="lazyload" data-src="<?= str_replace('../', $domain.'/', geturlimageAvatar($row_tt['usc_create_time']).$row_tt['usc_logo'])  ?>" onerror='this.onerror=null;this.src="/images/logo-new.png";' alt="<?= $row_tt['usc_company'] ?>">
							</a>
							<div class="right_dntt">
								<a href="<?=rewrite_company($row_tt['usc_id'],$row_tt['usc_company'],$row_tt['usc_alias'])?>" class="name_com"><?=$row_tt['usc_company']?></a>
								<div class="star">
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star-half-o" aria-hidden="true"></i>
								</div>
							</div>
						</div>
					<?}?>
				</div>
			</div>
			<div class="box_chuyengia main">
				<h2 class="heading_dtcom">CHUYÊN GIA TƯ VẤN VIỆC LÀM</h2>
				<div class="main_chuyengia main">
					<?
					$db_news = new db_query("SELECT new_id, new_title, new_title_rewrite, adm_id,adm_name,new_des FROM new_chpv JOIN admin_user ON adm_id = new_chpv.admin_id ORDER BY RAND() LIMIT 5"); 
					While($rowNews = mysql_fetch_assoc($db_news->result)){
						if ($rowNews['new_title_rewrite'] != '') {
							$title_news = $rowNews['new_title_rewrite'];
						}else{
							$title_news = $rowNews['new_title'];
						}
					?>
					<div class="item">
						<a class="title" rel="nofollow" href="<?=rewriteCHPV($rowNews['new_id'],$title_news)?>"><?=$rowNews['new_title']?></a>
						<p class="cgia_mota"><?=$rowNews['new_des']?></p>
						<p class="author">Theo chuyên gia: <a rel="nofollow" href="<?= rewriteTacgia($rowNews['adm_id'],$rowNews['adm_name']); ?>"><?=$rowNews['adm_name']?></a></p>
					</div>
					<?}?>
					<a rel="nofollow" href="/cau-hoi-phong-van" class="show_readmore main">Xem bộ Câu hỏi phỏng vấn mới nhất <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="popup_dtcom pop_danhgia hidden">
	<div class="modal-content">
		<div class="modal-header">
			Đánh giá công ty
			<i class="fa fa-times pull-right"></i>
		</div>
		<div class="modal-body">
			<?
			if(mysql_num_rows($db_noibat->result) > 1){	
				While($row_nb = mysql_fetch_assoc($db_noibat->result)){?>
				<div class="item">
					<div class="logo">
						<img class="lazyload" onerror='this.onerror=null;this.src="/images/logo-new.png";' src="/images/load.gif" data-src="<?= geturlimageAvatar($row['usc_create_time']).$row['usc_logo'] ?>" alt="<?=name_company($row['usc_company'])?>">
					</div>
					<div class="center">
						<p class="dgia_forcompany">“<?=$row_nb['rate_com']?>”</p>
						<p class="star">
						<?
							for($i = 1; $i <= 5;$i++){
								if($i <= $row_nb['countStar']) echo '<i class="fa fa-star" aria-hidden="true"></i>';
								else echo '<i class="fa fa-star none" aria-hidden="true"></i>';
							}
						?>
						</p>
						<p class="chucvu"><?=($row_nb['staff']==1)?"Nhân viên hiện tại":"Nhân viên cũ"?></p>
					</div>
					<div class="like">
						<a class="btnLike <?=$active_like?>" data-id="<?=$row_nb['rate_id']?>" data-type="likeRateCompany"><?=($active_like=='')?'Thích':"Đã thích"?></a> <i class="fa fa-thumbs-up" aria-hidden="true"></i> <span class="val"><?=$row_nb['rate_like']?></span>
					</div>
					<div class="box_uunhuoc">
						<p class="td">Ưu điểm</p>
						<div class="content">
							<?=$row_nb['strong']?>
						</div>
					</div>
					<div class="box_uunhuoc">
						<p class="td">Nhược điểm</p>
						<div class="content">
							<?=$row_nb['weakness']?>
						</div>
					</div>
				</div>
			<?}}?>
		</div>
	</div>
</div>
<?
if($num_pv>=2){
?>
<div class="popup_dtcom pop_pv hidden">
	<div class="modal-content">
		<div class="modal-header">
			phỏng vấn tại công ty
			<i class="fa fa-times pull-right"></i>
		</div>
		<div class="modal-body">
			<?
			While($row_pv = mysql_fetch_assoc($db_pv->result)){
				if($row_pv['feel']==1) $easy++;
				if($row_pv['feel']==2) $normal++;
				if($row_pv['feel']==3) $hard++; 
			?>
			<div class="item_pv">
				<div class="item main">
					<div class="img"><img src="/images/load.gif" data-src="/images/candi_null.png" class="lazyload" alt="Image Pv"></div>
					<div class="center">
						<p class="position_pv">Vị trí phỏng vấn: <?=$row_pv['position']?></p>
						<p class="level_pv">Đánh giá: <span><?=$array_phong_van[$row_pv['feel']]?></span></p>
					</div>
					<div  class="like">
						<a class="btnLike <?=$active_like?>" data-id="<?=$row_nb['rate_id']?>" data-type="likeRateInterview"><?=($active_like=='')?'Thích':"Đã thích"?></a> <i class="fa fa-thumbs-up" aria-hidden="true"></i> <span class="val"><?=$row_pv['rate_like']?></span>
					</div>
				</div>
				<div class="box_qtpv main">
					<div class="item">
						<div class="td">Quá trình phỏng vấn</div>
						<div class="nd"><?=$row_pv['description']?></div>
					</div>
					<div class="item">
						<div class="td">Câu hỏi phỏng vấn</div>
						<div class="nd"><?=$row_pv['questions']?></div>
					</div>
					<div class="item">
						<div class="td">Câu trả lời phỏng vấn</div>
						<div class="nd"><?=$row_pv['answers']?></div>
					</div>
				</div>
			</div>
			<?}?>
		</div>
	</div>
</div>
<?}?>
<div class="popup_dtcom pop_xh hidden">
	<div class="modal-content">
		<div class="modal-header">
			Xếp hạng và xu hướng của công ty
			<i class="fa fa-times pull-right"></i>
		</div>
		<div class="modal-body">
			<p id="dxh">Điểm xếp hạng là kế quả dựa trên dữ liệu tổng hợp từ các phiếu đánh giá từ người dùng cùa website Timviec365.com. Nhằm mục đích giúp cho ứng viên có thông tin đánh giá tổng quan nhất về doanh nghiệp.</p>
			<div class="main_ts">
				<p class="td">tổng quan</p>
				<div class="left chart">
					<svg class="top">
						<circle class="circle_e5"  />
						<circle class="circle_276" r="70" />
						<text class="text" x="70" y="70" text-anchor="middle">
						<tspan id="tspan" alignment-baseline="middle"><?=$countStars?></tspan>
						</text>
					</svg> 
					<div class="bottom">
						<p class="star">
						<?
							if($countStars == 0){
								for($iStar = 0; $iStar < 5;$iStar++){
									echo '<i class="fa fa-star none" aria-hidden="true"></i>';
								}
							}else{
								for($iStar = 1; $iStar <= 5;$iStar++){
									if($iStar <= $countStars) echo '<i class="fa fa-star" aria-hidden="true"></i>'; 
									else if(is_float($countStars) && $iStar == round($countStars)) echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
									else echo '<i class="fa fa-star none" aria-hidden="true"></i>';
								}
							}
						?>
						</p>
						<p class="count_dgia"><?=$count_rate?> đánh giá</p>
					</div>
				</div>
				<div class="right">
					<div class="form-group">
						<label for="">Văn hóa công ty</label>
						<div class="nd">
							<p class="star">
							<?
								if($culture_company == 0){
									for($iStar = 0; $iStar < 5;$iStar++){
										echo '<i class="fa fa-star none" aria-hidden="true"></i>';
									}
								}else{
									for($iStar = 1; $iStar <= 5;$iStar++){
										if($iStar <= $culture_company) echo '<i class="fa fa-star" aria-hidden="true"></i>'; 
										else if(is_float($culture_company) && $iStar == round($culture_company)) echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
										else echo '<i class="fa fa-star none" aria-hidden="true"></i>';
									}
								}
							?>
							</p>
						</div>
					</div>
					<div class="form-group">
						<label for="">Văn phòng công ty</label>
						<div class="nd">
							<p class="star">
							<?
								if($boss == 0){
									for($iStar = 0; $iStar < 5;$iStar++){
										echo '<i class="fa fa-star none" aria-hidden="true"></i>';
									}
								}else{
									for($iStar = 1; $iStar <= 5;$iStar++){
										if($iStar <= $boss) echo '<i class="fa fa-star" aria-hidden="true"></i>'; 
										else if(is_float($boss) && $iStar == round($boss)) echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
										else echo '<i class="fa fa-star none" aria-hidden="true"></i>';
									}
								}
							?>
							</p>
						</div>
					</div>
					<div class="form-group">
						<label for="">Phúc lợi công ty</label>
						<div class="nd">
							<p class="star">
							<?
								if($welfare == 0){
									for($iStar = 0; $iStar < 5;$iStar++){
										echo '<i class="fa fa-star none" aria-hidden="true"></i>';
									}
								}else{
									for($iStar = 1; $iStar <= 5;$iStar++){
										if($iStar <= $welfare) echo '<i class="fa fa-star" aria-hidden="true"></i>'; 
										else if(is_float($welfare) && $iStar == round($welfare)) echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
										else echo '<i class="fa fa-star none" aria-hidden="true"></i>';
									}
								}
							?>
							</p>
						</div>
					</div>
					<div class="form-group">
						<label for="">Cơ hội thăng tiến</label>
						<div class="nd">
							<p class="star">
							<?
								if($promotion_opportunities == 0){
									for($iStar = 0; $iStar < 5;$iStar++){
										echo '<i class="fa fa-star none" aria-hidden="true"></i>';
									}
								}else{
									for($iStar = 1; $iStar <= 5;$iStar++){
										if($iStar <= $promotion_opportunities) echo '<i class="fa fa-star" aria-hidden="true"></i>'; 
										else if(is_float($promotion_opportunities) && $iStar == round($promotion_opportunities)) echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
										else echo '<i class="fa fa-star none" aria-hidden="true"></i>';
									}
								}
							?>
							</p>
						</div>
					</div>
					<div class="form-group">
						<label for="">Lãnh đạo công ty</label>
						<div class="nd">
							<p class="star">
							<?
								if($boss == 0){
									for($iStar = 0; $iStar < 5;$iStar++){
										echo '<i class="fa fa-star none" aria-hidden="true"></i>';
									}
								}else{
									for($iStar = 1; $iStar <= 5;$iStar++){
										if($iStar <= $boss) echo '<i class="fa fa-star" aria-hidden="true"></i>'; 
										else if(is_float($boss) && $iStar == round($boss)) echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
										else echo '<i class="fa fa-star none" aria-hidden="true"></i>';
									}
								}
							?>
							</p>
						</div>
					</div>
				</div>
				<div class="bot main">
					<div class="item_xh">
						<label for="">Sẽ giới thiệu cho bạn bè</label>
						<div class="process">
						<p style="width:<?=$recommendFriend?>%"></p>
						</div>
						<span class="mod"><?=$recommendFriend?>%</span>
					</div>
					<div class="item_xh">
						<label for="">Hài lòng về môi trường làm việc</label>
						<div class="process">
						<p style="width:<?=$work_environment?>%"></p>
						</div>
						<span class="mod"><?=$work_environment?>%</span>
					</div>
					<div class="item_xh">
						<label for="">Hài lòng về lãnh đạo công ty</label>
						<div class="process">
						<p style="width:<?=$forBoss?>%"></p>
						</div>
						<span class="mod"><?=$forBoss?>%</span>
					</div>
					<div class="text-center">
						<p>hãy cho chúng tôi biết đánh giá của bạn</p>
						<a ref="nofollow" href="<?=rewrite_rate($row['usc_id'])?>" class="dg"><i class="fa fa-star-o" aria-hidden="true"></i>Đánh giá</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="popup_CompanySignin hidden">
	<form onsubmit="return false">
		<div class="modal-header text-center pull-left width-100">
			Đăng nhập
			<span class="pull-right"><i class="fa fa-times" aria-hidden="true"></i></span>
		</div>
		<div class="modal-body pull-left width-100">
			<div class="left">
				<p class="text-center note"></p>
				<div class="item email">
					<i class="icon"></i>
					<input type="text" id="email" placeholder="Nhập Email ...">
				</div>
				<div class="item password">
					<i class="icon"></i>
					<input type="password" id="password" placeholder="Nhập mật khẩu ...">
					<i class="fa fa-eye-slash" aria-hidden="true"></i>
				</div>
				<a class="forget_pass" href="/quen-mat-khau-ung-vien.html">Quên mật khẩu?</a>
				<button type="submit" id="submit">Đăng nhập</button>
				<p class="question">Bạn chưa có tài khoản? <a rel="nofollow" href="/dang-ky-ung-vien.html">Đăng ký ngay</a></p>
			</div>
			<div class="right">
				<img src="/images/bg_signin_candi.png" alt="BG đăng nhập">
				<a class="downLoad_signin timviec365" rel="nofollow" href="/ung-dung-tim-viec-lam.html">
					<span class="trapezoid"></span><i class="fa fa-download" aria-hidden="true"></i>Tải app TIMVIEC365 ngay
				</a>
				<a class="downLoad_signin cv365" rel="nofollow" href="/ung-dung-tao-cv.html">
					<span class="trapezoid"></span><i class="fa fa-download" aria-hidden="true"></i>Tải app CV365 ngay
				</a>
			</div>
		</div>
	</form>
</div>
<div id="appli_success" class="hidden">
	<div class="modal-content">
      <div class="modal-header">
      	<p class="text-center"><i class="icon"></i></p>
        <p class="text-center notifi">Nộp hồ sơ thành công</p>
      </div>
      <div class="modal-body">
        <p>Nhà tuyển dụng sẽ liên hệ với bạn qua email hoặc số điện thoại nếu hồ sơ của bạn phù hợp.</p>
		<p>Vui lòng thường xuyên kiểm tra email và mở máy điện thoại để không bỏ lỡ cơ hội được phỏng vấn</p>
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-default" data-dismiss="modal">Hoàn thành</button>
      </div>
  </div>
</div>
<? include('../includes/inc_footer.php'); ?>
<? include('../includes/inc_script_footer.php') ?>
<script src="/js/Chart.min.js" defer></script>
<script>
	function setProgress(percent,circumference,elm) {
		const offset = circumference - percent / 100 * circumference;
		elm.style.strokeDashoffset = offset;
	}
	const circle = document.getElementsByClassName('circle_276');
	countStar = $('#tspan').html()/5;
	for(i = 0; i < circle.length; i++){
		j = Math.floor(countStar * 100);
		const radius = circle[i].r.baseVal.value;
		const circumference = radius * 2 * Math.PI;

		circle[i].style.strokeDasharray = `${circumference} ${circumference}`;
		circle[i].style.strokeDashoffset = circumference;
		setProgress(j,circumference,circle[i]);
	}
</script>
<?if($num_pv>0){?>
<script>
	window.chartColors = {
		easy: '#00BABA',
		normal: '#F8971C',
		hard: '#2767A5',
	};

	var color_easy = <?=$easy?>;
	var color_nor = <?=$normal?>;
	var color_hard = <?=$hard?>;
	var config = {
		type: 'doughnut',
		data: {
			datasets: [{
				data: [
					color_easy,
					color_nor,
					color_hard,
				],
				backgroundColor: [
					window.chartColors.easy,
					window.chartColors.normal,
					window.chartColors.hard,
				]
			}],
			labels: [
				'Dễ',
				'Trung bình',
				'Khó'
			],
		},
		options: {
			responsive: true,
			legend: {
				position: 'top',
			},
			animation: {
				animateScale: true,
				animateRotate: true
			},cutoutPercentage:50
		}
	};

	window.onload = function() {
		var ctx = document.getElementById('chart-area').getContext('2d');
		window.myDoughnut = new Chart(ctx, config);
	};
</script>
<?}?>
<script>
	
	
	function SearchJobInCompany(){
		e = $(this);
		cate = $('#box_jobCate').val();
		city = $('#box_jobCity').val();
		idco = e.attr('data-company');
		if(cate != 0 || city != 0){
			$.ajax({
				type: "POST",
				url: "../ajax/SearchJobInCompany.php",
				data:{
					cate : cate,
					city : city,
					idco : idco
				},beforeSend:function(){
					e.html('Vui lòng chờ ...');
				},success:function(data){
					e.html('Tìm kiếm');
					if(data != ""){
						$('.main_kq').html(data);
					}else{
						alert('Không tìm thấy kết quả tìm kiếm phù hợp, bạn hãy vui lòng thử lại !!!');
					}
					
				}
			});
		}else location.reload();
	}
	$(document).ready(function(){
		$('#box_jobCate,#box_jobCity').select2({
			width:'100%'
		});
		if($(window).width() < 480){
			$('.main_ts text').attr('x',60);
			$('.main_ts text').attr('y',55);
		}
		$('#search_JobInCompany .btn_submit').click(SearchJobInCompany);
		$('.user_next_dgia .showmore,.readmore_dg').click(function(){
			class_showMore = $(this).attr('data-class');
			$('.'+class_showMore).removeClass('hidden');
		});
		$('.popup_dtcom .modal-header .fa').click(function(){
			$('.popup_dtcom').addClass('hidden');
		});
		$('.btnLike').click(function(){
			e = $(this);
			type = e.attr('data-type');
			id = 0;
			if(!e.hasClass('active')){
				if(type != 'likeCompany'){
					e.html('Đã thích');
					num = e.parent().find('.val').html();
					e.parent().find('.val').html(Number(num)+1);
					id = e.attr('data-id');
				}else{
					e.html('<i class="fa fa-thumbs-up" aria-hidden="true"></i>Liked');
				}
				e.addClass('active');
				$.ajax({
					type: "POST",
					url: "../ajax/likeCompany.php",
					data: {
						type: type,
						id : id,
						idco : <?=$coid?>
					}
				});
			}
		});
		$('.apply').click(function(){
			e = $(this);
			if(e.hasClass('login')){
				$('.popup_CompanySignin').removeClass('hidden').hide().show('slow');
				$('.popup_CompanySignin .left .note').html("Bạn cần đăng nhập để ứng tuyển công việc này !!!");
			}else{
				idnew = $(this).attr('data-idnew');
				iduse = $(this).attr('data-id');
				idcom = $(this).attr('data-idcom');

				$.ajax({
					type:"POST",
					url: "../ajax/nop_ho_so.php",
					data:{
						idtin: idnew,
						iduse: iduse,
						iduser: idcom
					},
					success:function(data){
						if(data==1) $('#appli_success').removeClass('hidden');
					
						else alert("Bạn đã ứng tuyển công việc này");
					}
				});
			}
		});
		$('.popup_CompanySignin #submit').click(function(){
			e = $(this);
			user_name = $('#email');
			password = $('#password');
			new_id = e.attr('data-id');

			if(user_name.val() == '' || password.val() == ''){
				if($('.popup_CompanySignin .left .note').hasClass('error') == false){
					$('.popup_CompanySignin .left .note').addClass('error');
				}
				$('.popup_CompanySignin .left .note').html("Vui lòng điền đầy đủ thông tin đăng nhập !!!");
				return false;
			}
			else{
				$.ajax({
					type:"POST",
					url:"../ajax/login_uv_popup.php",
					data:{
						user_name:user_name.val(),
						password:password.val(),
						new_id:new_id
					},success:function(data){
						if(data!=0){
							location.reload();
						}else{
							if($('.popup_CompanySignin .left .note').hasClass('error') == false){
								$('.popup_CompanySignin .left .note').addClass('error');
							}
							$('.popup_CompanySignin .left .note').html("Thông tin đăng nhập của bạn không đúng !!!");
						}
					}
				});
			}
		});
		$('#appli_success .modal-footer button').click(function(){
			$('#appli_success').addClass('hidden');
		});
		$('.login_contact').click(function(){
			$('.popup_CompanySignin').removeClass('hidden').hide().show('slow');
			$('.popup_CompanySignin .left .note').html("Bạn cần đăng nhập để xem thông tin !!!");
		});
		$('.main_dmuc .item').click(function(){
			e = $(this);
			$('.main_dmuc .item').removeClass('active');
			e.addClass('active');
			id_location = e.attr('data-href');
			offset = $(id_location).offset().top;
			$('body,html').animate({
				scrollTop: offset
			},1000);
		});
	});
</script>
</body>
</html>
	<!-- <div class="box_dgLeader main"> -->
	<!-- <h2 class="namedmuc">Mọi người đang nói gì về lãnh đạo quản lý công ty</h2> -->
	<!-- <div class="left_leader">
		<svg class="top">
			<circle class="circle_e5"  />
			<circle class="circle_276" r="59" />
		</svg>
		<img src="/images/logo-new.png" alt="">
		<p class="tile">88%</p>
	</div> -->
	<!-- <div class="right_leader">
		<p id="danhgia">Phiếu bầu nói rằng họ hài lòng và tin tưởng lãnh đạo công ty</p>
		<p class="question">Nếu bạn phụ trách, bạn sẽ làm gì để giúp công ty thành nơi làm việc tốt hơn?</p>
		<p class="answer">9 người trả lời</p>
		<p class="question">Bạn có lời khuyên nào cho lãnh đạo quản lý về cách cải thiện?</p>
		<p class="answer">9 người trả lời</p>
		<p class="showmore"><span>Xem thêm câu hỏi và câu trả lời</span> về công ty.</p>
	</div> -->
<!-- </div>  -->