<?
include("config.php");
$newid = getValue("newid","int","GET",0);
$db_qr = new db_query("SELECT new.*,user_company_multi.*,new_multi.*,usc_company,usc_address,usc_logo ,new_mota ,user_company.usc_id,usc_alias,usc_create_time,usc_size,usc_name,usc_name_add,user_company.usc_email,user_company.usc_phone,usc_name_email,usc_name_phone FROM new JOIN new_multi ON new.new_id = new_multi.new_id JOIN user_company ON new.new_user_id = user_company.usc_id JOIN user_company_multi ON new.new_user_id = user_company_multi.usc_id WHERE new.new_id = ".$newid." LIMIT 1");
$row   = mysql_fetch_assoc($db_qr->result);
if(mysql_num_rows($db_qr->result) == 0)
{
	redirect("/");
}

if ($row['new_301'] != '') {
   header("HTTP/1.1 301 Moved Permanently"); 
   header("Location: ".$row['new_301']);
   exit();
}

if($row['new_view_count'] < 10){
	if($row['new_hot'] == 1 || $row['new_nganh'] == 1){
		$view_random = rand(50,100);
	}else{
		$view_random = rand(30,80);
	}
	$update_view = new db_query("UPDATE new SET new_view_count = ".$view_random." WHERE new_id = ".$newid);
}

$update = new db_query("UPDATE new SET new_view_count = new_view_count + 1 WHERE new_id = ".$newid);
$urlcano = "https://timviec365.com".rewriteNews($row['new_id'],$row['new_title'],$row['new_alias']);

$new_tit = $row['new_title'];

$urls = array(
	"/images/noimage.png"
);
$url = $urls[array_rand($urls)];
$new_tit = preg_replace("/Tuyển/","",$new_tit);
$new_tit = preg_replace("/tuyển/","",$new_tit);
$new_tit = preg_replace("/TUYỂN/","",$new_tit); 
$new_tit = trim($new_tit);
if($row['meta_tit']!=''){
	$titleseo = $row['meta_tit'];
}else{
	$titleseo = "Tuyển $new_tit | ".name_company($row['usc_company']);

	$titleseo = str_replace("    "," ",$titleseo);
	$titleseo = str_replace("   "," ",$titleseo);
	$titleseo = str_replace("  "," ",$titleseo);
}
if($row['meta_key']!=''){
	$keyseo = $row['meta_key'];
}else{
	$keyseo = "Việc làm ".$new_tit.", tuyển dụng ".$new_tit.", Việc làm ".$new_tit." mới nhất";
}

if ($row['new_city']!= 0) {
	$duy_city = explode(',', $row['new_city']);
	$name_city = array();
	foreach ($duy_city as $key) {
		$name_city[] = $arrcity[$key]['cit_name'];
	}
	$cid = implode(", ", $name_city);  
	$city  = $duy_city[0];
	$city  = (int) $city;  
}else{
	$cid = "trên Toàn quốc"; 
}

if($row['meta_des']!=''){
	$arr_l = array('timviec365.vn','Timviec365.vn');
	$arr_r = array('timviec365.com','Timviec365.com');
	$metadesc = str_replace($arr_l, $arr_r, $row['meta_des']);
}else{
	$metadesc = "Tìm việc làm ".$new_tit." tại công ty ".mb_convert_case(trim($row['usc_company']),MB_CASE_TITLE,'UTF-8').". Tuyển dụng Việc làm ".$new_tit." mới nhất, uy tín nhất";
	$metadesc =  str_replace("    "," ",$metadesc);
	$metadesc =  str_replace("   "," ",$metadesc);
	$metadesc =  str_replace("  "," ",$metadesc);
}

$arr_cate = explode(',', $row['new_cat_id']);
$arr_cate_name = array();
foreach ($arr_cate as $key => $value) {
	$arr_cate_name[] = $db_cat[$value]['cat_name'];
}
$arr_cate_name = implode(', ', $arr_cate_name);

$ar_luong = explode(',',$array_muc_luong3[$row['new_money']]);
if ($row['new_money'] < 9) {
	$string_luong = '"minValue":'.$ar_luong[0].',"maxValue":'.$ar_luong[1].'';
}else{
	$string_luong = '"minValue":'.$ar_luong[0].',"maxValue":0';
}

if ($row['usc_address'] != '') {
	$addr = $row['usc_address'];
}else{
	$addr = "Chưa cập nhật";
}


$ar_city = explode(',',$row['new_city']);
$string_city = array();



foreach ($ar_city as $key => $value) {

	$string_city[] = '{"@type":"Place","address":{"@type":"PostalAddress","streetAddress":'.json_encode($addr).',"addressLocality":'.json_encode($addr).',"addressRegion":'.json_encode($arrcity[$value]['cit_name']).',"postalCode":"'.$arrcity[$value]['postcode'].'","addressCountry":"VN"}}';

}

$schema = '';

if ($row['usc_logo'] != '') {
	$sc_logo = 'https://timviec365.com'.str_replace('..', '', geturlimageAvatar($row['usc_create_time']).$row['usc_logo']);
}else{
	$sc_logo = 'https://timviec365.com/images/no-image.png';
}

if ($row['new_hinh_thuc'] == 0 || $row['new_hinh_thuc'] == 6) {
	$hinhthuc = 1;
	$row['new_hinh_thuc'] = 1;
}else{
	$hinhthuc = $row['new_hinh_thuc'];
}

if (name_company($row['usc_company']) != '' && $row['new_money'] > 0 && $row['new_city'] != '' && $row['new_cat_id'] != '') {
  $schema = '{"@context":"https://schema.org","@type":"JobPosting","title":'.json_encode($row['new_title']).',"description":'.json_encode(strip_tags($row['new_mota'])).',"identifier":{"@type":"PropertyValue","name":'.json_encode(name_company($row['usc_company'])).',"value":'.$row['usc_id'].'},"datePosted":"'.date("Y-m-d",$row["new_create_time"]).'","validThrough":"'.date("Y-m-d\TH:i:sP",$row["new_han_nop"]).'","employmentType":['.json_encode($array_hinh_thuc[$hinhthuc]).'],"skills":'.json_encode($arr_cate_name).',"hiringOrganization":{"@type":"Organization","name":'.json_encode(name_company($row['usc_company'])).',"sameAs":"https://timviec365.com'.rewrite_company($row['usc_id'],$row['usc_company'],$row['usc_alias']).'","logo":"'.$sc_logo.'"},"jobLocation":['.implode(',', $string_city).'],"baseSalary":{"@type":"MonetaryAmount","currency":"VND","value":{"@type":"QuantitativeValue","value":'.json_encode($array_muc_luong[$row['new_money']]).',"unitText":"MONTH",'.$string_luong .'}}}';
}
if($row['new_thuc']==1 && $row['new_index'] == 1){
	$index = 'noodp,index,follow';
}else{
	if($row['new_update_time']>$row['new_create_time'] && $row['new_index'] == 1){
		$index = 'noodp,index,follow';
	}else{
		$index = 'noodp,noindex,nofollow';
	}
}
$login = "login";
$use_id = "";
if(isset($_COOKIE['UID']) && $_COOKIE["UT"]==0){
	$login = '';
	$use_id = $_COOKIE['UID'];
}
$urluri = "https://timviec365.com".$_SERVER['REQUEST_URI'];
if($urlcano != $urluri)
{
   header("HTTP/1.1 301 Moved Permanently"); 
   header("Location: $urlcano");
   exit();
}
?>
<!DOCTYPE html>
<html lang="vi" class="no-js">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui"/>
	<link rel="canonical" href="<?= $urlcano ?>" />
	<meta name="p:domain_verify" content=""/>
	<link href="" rel="shortcut icon"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title><?=$titleseo ?></title>
	<meta name="description" content="<?=$metadesc ?>"/>
	<meta name="Keywords" content="<?=$keyseo ?>"/>
	<meta name="robots" content="<?=$index?>"/>
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?=$titleseo ?>" />
	<meta property="og:description" content="<?=$metadesc ?>" />
	<meta property="og:site_name" content="tìm việc làm" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:description" content="<?=$metadesc ?>" />
	<meta name="twitter:title" content="<?=$titleseo ?>" />

	<link rel='dns-prefetch' href='//fonts.googleapis.com' />
	<link rel='dns-prefetch' href='//s.w.org' />
	<link rel="stylesheet" href="/css/font-awesome.min.css" onload="if(media!='all')media='all'">
	<link rel="stylesheet" href="/css/style.min.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
    <? if ($schema != '' && $row['new_han_nop'] > time()) { ?>
    <!-- <script type="application/ld+json"><?$schema;?></script> -->
	<? } ?>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->
<meta name="google-site-verification" content="EIV7wHDvaTZkVpsLjmM4_neYDyPLTmjV9du0A8ho4TU" />
<style>
	.box_yc a{
		text-decoration: underline;
		font-family: 'Roboto-Medium';
	}
</style>
</head>
<body id="detail_job">
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<header>
			<? include('../includes/inc_header.php'); ?>
			<div id="banner">
				<? include('../includes/inc_search.php') ?>
				<p class="taingay">Tải ngay ứng dụng timviec365 và cv365+ trên điện thoại để trải nghiệm tốt nhất</p>
				<a class="downLoad_App Timviec365" rel="nofollow" href="/ung-dung-tim-viec-lam.html"><i class="icon"></i>Tải app Timviec365</a>
				<a class="downLoad_App CV365" rel="nofollow" href="/ung-dung-tao-cv.html"><i class="icon"></i>Tải app CV365</a>
			</div>
		</header>
		<div class="breakcrumb">
			<? $arr_cate = explode(',', $row['new_cat_id']); ?>
			<ul>
				<li><a href="/">Trang chủ</a></li>
				<li><a href="<?=rewriteCate(0,0,$db_cat[$arr_cate[0]]['cat_id'],$db_cat[$arr_cate[0]]['cat_name'])?>">Việc làm <?= strtolower($db_cat[$arr_cate[0]]['cat_name']) ?></a></li>
				<li class="active"><span><?=$row['new_title']?></span></li>
			</ul>
		</div>
		<div class="box_general_infor">
			<div class="logo_com">
				<img class="lazyload" src="/images/load.gif" data-src="<?= str_replace('../', 'https://timviec365.com/', geturlimageAvatar($row['usc_create_time']).$row['usc_logo'])  ?>"  onerror='this.onerror=null;this.src="/images/logo-new.png";' alt="<?= name_company($row['usc_company'])?>" >
			</div>
			<div class="content_general">
				<h1 class="new_title"><?= $row['new_title']?></h1>
				<a href="<?= rewrite_company($row['usc_id'],$row['usc_company'],$row['usc_alias']) ?>">
					<h2 class="name_company2"><?= name_company($row['usc_company']) ?></h2>
				</a>
				<p class="addr_general"><i class="ico"></i><?= explode('|',$row['usc_address'])[0] ?></p>
				<?if($row['new_han_nop'] >= time()){?><p class="time_hannop"><i class="ico"></i>Hạn nộp hồ sơ: <?= date('d/m/Y',$row['new_han_nop']) ?>  <?=time_elapsed_string2($row['new_han_nop'])?></p><?}?>
			</div>
			<div class="other_infor">
				<p class="view">Lượt xem: <?= $row['new_view_count']?></p>
				<?if($row['new_han_nop'] >= time()){?><p class="update_time">Ngày cập nhật: <?= date('d/m/Y',$row['new_update_time']) ?></p><?}?>
				<?
                    $num_ut = 0;
                    if($login == ''){
                        $check_ut = new db_query("SELECT count(*) FROM nop_ho_so WHERE nhs_use_id = ".$_COOKIE['UID']." AND nhs_new_id = ".$row['new_id']." ");
                        $num_ut = mysql_fetch_assoc($check_ut->result);
                        $num_ut = $num_ut['count(*)'];
                    }
                ?>
				<a class="apply <?= (isset($num_ut) && $num_ut == 0)?'openPopupUT':'' ?> <?=$login?>">
					<i class="fa fa-paper-plane" aria-hidden="true"></i><?= ($num_ut)?"Đã ứng tuyển":"Ứng tuyển ngay" ?>
				</a>
				<?
                    $num_save = 0;
                    if(isset($_COOKIE['UID']) && $_COOKIE['UT']==0){
                        $check_save = new db_query("SELECT count(*) FROM tbl_luutin WHERE id_tin = ".$row['new_id']." AND id_uv = ".$_COOKIE['UID']." ");
                        $num_save = mysql_fetch_assoc($check_save->result);
                        $num_save = $num_save['count(*)'];
                    }
                    $txt_save = ($num_save)?'<i class="fa fa-heart" aria-hidden="true"></i>Đã lưu':'<i class="fa fa-heart-o" aria-hidden="true"></i>Lưu việc làm';
                ?>
                <a data-id="<?= (isset($_COOKIE['UID']) && $_COOKIE['UT']==0)?$_COOKIE['UID']:'' ?>" data-job="<?= $row['new_id']?>" class="save_job"><?= $txt_save ?></a>
			</div>
		</div>
		<div class="box_detailjob">
			<div class="main_detail">
				<ul class="tablist_head">
					<li class="active"><a>Tin tuyển dụng</a></li>
					<li><a rel="nofollow" href="<?=rewrite_company($row['usc_id'],$row['usc_company'],$row['usc_alias'])?>">Thông tin công ty</a></li>
					<li><a rel="nofollow" href="<?=rewrite_company($row['usc_id'],$row['usc_company'],$row['usc_alias'])?>#job">Việc làm cùng công ty</a></li>
				</ul>
				<div class="body_detail .main">
					<div class="box_yc">
						<h2 class="head">Mô tả công việc</h2>
						<div class="content">
							<?= hide_infocontact($row['new_mota']); ?>
						</div>
					</div>
					<div class="box_yc">
						<h2 class="head">Yêu cầu công việc</h2>
						<div class="content">
							<?= hide_infocontact($row['new_yeucau']); ?>
						</div>
					</div>
					<div class="box_yc">
						<h2 class="head">Quyền lợi được hưởng</h2>
						<div class="content">
							<?= hide_infocontact($row['new_quyenloi']); ?>
						</div>
					</div>
					<div class="box_yc">
						<h2 class="head">Hồ sơ bao gồm</h2>
						<div class="content">
							<? 
							$quyen_loi = trim(preg_replace('#(<br */?>\s*)+#i', '<br />',nl2br($row['new_ho_so'])));
							$email_check = '/[a-z0-9_\-\+]+@[a-z0-9\-]+\.([a-z]{2,3})(?:\.[a-z]{2})?/i';
							$number_check = '/(09|03|01[2|6|8|9])+([0-9]{8})\b/';
							preg_match_all($email_check, $quyen_loi, $matches);
							preg_match_all($number_check, $quyen_loi, $matches2);
							foreach ($matches[0] as $key => $value) {
								$quyen_loi = str_replace($value,hide_mail($value), $quyen_loi);
							}
							foreach ($matches2[0] as $key => $value2) {
								$quyen_loi = str_replace($value2,"*********", $quyen_loi);
							 }
							echo loclinkbaiviet($quyen_loi);
							?>
						</div>
					</div>
					<div class="box_yc">
						<h2 class="head">Thông tin liên hệ</h2>
						<div class="content">
							<p>- Người liên hệ: <?= ($row['new_usercontact']!='')?$row['new_usercontact']:$row['usc_name'] ?></p>
								<p>- Địa chỉ: <?= ($row['new_addcontact']!='')?$row['new_addcontact']:$row['usc_name_add'] ?></p>
								<p>- Email: 
									<?
									if(isset($_COOKIE["UT"]) && $_COOKIE["UT"]==0){
										if($row['new_emailcontact']!=''){

											echo $row['new_emailcontact'];
										}
										else if($row['usc_name_email']!=''){

											echo $row['usc_name_email'];
										}
										else {
											echo $row['usc_email'];
										}
									}else{
										?>
										<a class="open_popup">Đăng nhập để xem email</a>
										<?
									}
									?>
								</p>
								<p>- SĐT:
									<?
									if(isset($_COOKIE["UT"]) && $_COOKIE["UT"]==0){
										if($row['new_phonecontact'] != ''){
											echo $row['new_phonecontact'];
										}
										else if($row['usc_name_phone']!=''){
											echo $row['usc_name_phone'];
										}else{
											echo $row['usc_phone'];
										}
									}else{
										?>
										<a class="open_popup">Đăng nhập để xem SĐT</a>
										<?
									}
									?>
								</p>
						</div>
					</div>
					<? if($login == ''){ ?>
					<div class="box_chat">
						<a><i class="fa fa-comments-o" aria-hidden="true"></i>gửi tin nhắn</a>
					</div>
					<?}?>
				</div>
			</div>
			<div class="right1">
			<div class="box_infor_job">
				<h2 class="head">Thông tin tuyển dụng</h2>
				<div class="main">
					<p class="chucvu"><i class="ico"></i>Chức vụ: <span><?= $array_capbac[$row['new_cap_bac']]?></span></p>
					<p class="hinhthuc"><i class="fa fa-laptop" aria-hidden="true"></i>Hình thức: <span><?= $array_hinh_thuc[$row['new_hinh_thuc']]?></span></p>
					<p class="gioitinh"><i class="fa fa-venus-mars" aria-hidden="true"></i><i class="ico"></i>Yêu cầu giới tính: <span><?= ($row['new_gioi_tinh'] > 0)?$array_gioi_tinh[$row['new_gioi_tinh']]:'Không yêu cầu'?></span></p>
					<p class="kinhnghiem"><i class="ico"></i>Kinh nghiệm: <span><?= $array_kinh_nghiem[$row['new_exp']]?></span></p>
					<p class="bangcap"><i class="fa fa-graduation-cap" aria-hidden="true"></i><i class="ico"></i>Yêu cầu bằng cấp: <span><?= $array_hoc_van[$row['new_bang_cap']]?></span></p>
					<p class="mucluong"><i class="ico"></i>Mức lương: <span><?= $array_muc_luong[$row['new_money']]?></span></p>
					<? if($row['new_thuviec']!=''){
						echo '<p class="thuviec"><i class="ico"></i>Thời gian thử việc: <span>'.$row['new_thuviec'].'</span></p>';
					}?>
					<?if($row['new_hoahong']!=''){
						echo '<p class="hoahong"><i class="ico"></i>Hoa hồng: <span>'.$row['new_hoahong'].'</span></p>';
					}?>
					
					<?
					if($row['new_city'] != 0){
						$arr_city = explode(',', $row['new_city']);
						echo '<div class="ddlv"><i class="ico"></i>Địa điểm làm việc:';
						if($row['new_qh_id']!=0){
							$arr_qh = explode(',',$row['new_qh_id']);
							
							for($i = 0;$i < count($arr_qh);$i++){
								$u = $i;
								$u = ++$u;
								$key_city = $arr_city[$i];
								$city_name = $arrcity[$arr_city[$i]]['cit_name'];
								$txt_cs = (count($arr_qh)>1)?"Cơ sở $u :":"";
								echo 
									'<p class="item_dd">'.$txt_cs.'
										<a class="dd_district">'.$db_district[$arr_qh[$i]]['cit_name'].'</a>
										<a href="'.rewriteCate($key_city,$city_name,0,0).'">'.$city_name.'</a>
									</p>';
							}
						}else{
							foreach ($arr_city as $key => $value) {
								echo '<a href="'.rewriteCate($arrcity[$value]['cit_id'],$arrcity[$value]['cit_name'],0,0).'">'.$arrcity[$value]['cit_name'].'</a>';
							}
						}
						echo '</div>';
					}else echo '<p class="ddlv"><i class="ico"></i>Địa điểm làm việc:Toàn quốc</p>';
					?>
					
					<p class="nganhnghe"><i class="ico"></i>Ngành nghề: 
					<?
					if($row['new_cat_id'] != 0){
						$name_cate = "";
						foreach ($arr_cate as $key => $value) {
							echo '<a href="'.rewriteCate(0,0,$value,$db_cat[$value]['cat_name']).'">'.$db_cat[$value]['cat_name'].'</a>';
						}
					}
					?>
					</p>
					<div class="text-center xacthuc">
						<img src="/images/load.gif" class="lazyload" data-src="/images/ntd_xacthuc.png" alt="NTD xác thực">
					</div>
					<? if($login==''){ ?>
					<a class="text-center phanAnh_NTD">Phản ánh nhà tuyển dụng</a>
					<?}?>
				</div>
			</div>

			<div class="box_qrdetail main">
				<img onerror='this.onerror=null;this.src="/upload/qr/new/ntd_0/qr-code.png";' class="lazyload" src="/images/load.gif" data-src="/upload/qr/new/ntd_<?= $row['usc_id']?>/<?= $newid ?>.png" alt="QR Code">
				<div class="right">
					<p>Quét mã QR</p>
					<p>để ứng tuyển ngay</p>
					<a><i class="fa fa-paper-plane" aria-hidden="true"></i>ứng tuyển ngay</a>
				</div>
			</div>
			<div class="box_share main">
				<p>Chia sẻ việc làm với bạn bè !!!</p>
				<a id="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				<a id="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				<a id="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
			</div>
			<div class="box_banner">
				<a href="/mau-cv.html" class="main"></a>
			</div>
		</div>
		<div class="box_vltt">
			<div class="main">
				<div class="tit tit2">
					<div class="ir">
						<i class="ico"></i><p class="heading">Việc làm tương tự</p>
					</div>
				</div>
				<div class="main_option2">
					<?
					$cat = explode(',', $row['new_cat_id']);
					$cit = explode(',', $row['new_city']);
					$real_cate = explode(',', $row['new_real_cate']);
					
		            $sql_cate = array();
		            foreach ($real_cate as $key => $value) {
		              $sql_cate[] = 'FIND_IN_SET("'.(int)$value.'",new_real_cate)';
		            }
		            $sql_cate = implode(' OR ', $sql_cate);
					$db_qrs = new db_query("SELECT new_id,new_title,new_money,new_city,usc_id,usc_logo,usc_create_time,usc_company,usc_type,new_create_time,new_han_nop,usc_alias,new_alias FROM new JOIN user_company ON new_user_id = user_company.usc_id  WHERE new_city IN (".$row['new_city'].") AND (".$sql_cate.") AND new_active = 1 AND new_thuc = 1 AND new_id <> ".$row['new_id']." ORDER BY new_hot DESC, new_id DESC LIMIT 4");
					while($rows = mysql_fetch_assoc($db_qrs->result))
					{
						?>
					<div class="item">
						<div class="logo">
							<img class="lazyload" data-src="<?= geturlimageAvatar($rows['usc_create_time']).$rows['usc_logo'] ?>"  onerror='this.onerror=null;this.src="/images/logo-new.png";' alt="<?=$rows['new_title']?>" src="/images/load.gif">
						</div>
						<div class="content-right">
							<div class="left">
								<a href="<?= rewriteNews($rows['new_id'],$rows['new_title'],$rows['new_alias']) ?>" class="title_new">
									<?= $rows['new_title'] ?>
								</a>
								<a href="<?= rewrite_company($rows['usc_id'],$rows['usc_company'],$rows['usc_alias']) ?>" class="name_company"><?= name_company($rows['usc_company']) ?></a>
							</div>
							<div class="right">
								<p class="p_dd"><i class="fa fa-map-marker" aria-hidden="true"></i> 
								<?
								if ($rows['new_city']!= 0) {
									$tt_city = explode(',', $rows['new_city']);
									$name_city = array();
									foreach ($tt_city as $key) {
										$name_city[] = $arrcity[$key]['cit_name'];
									}
									$cid = implode(", ", $name_city);  
								}else{
									$cid = "trên Toàn quốc"; 
								}
									echo $cid;
								?> 
								</p>
								<p class="p_salary"><i class="salary"></i> <?= $array_muc_luong[$rows['new_money']]?></p>
								<p class="p_time"><i class="time"></i> <?= date('d/m/Y',$rows['new_han_nop']) ?></p>
							</div>
						</div>
					</div>
					<?
					}
					?>
				</div>
			</div>
		</div>
		<!-- <div class="key_tags">
			<div class="title">
				<span>Từ khóa liên quan</span>
			</div>
			<a href="" class="item">nhân viên xử lý dữ liệu part time</a>
			<a href="" class="item">xin việc làm bảo vệ giữ xe</a>
			<a href="" class="item">lãnh sự quán mỹ tuyển dụng</a>
			<a href="" class="item">tuyển nhân viên bảo vệ nam nữ tại đà nẵng</a>
			<a href="" class="item">xin việc làm bảo vệ giữ xe</a>
			<a href="" class="item">tuyển dụng bác sĩ da liễu tại hà nội</a>
		</div> -->
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
<? if($login==''){ ?>
<div class="popup ungtuyen hidden">
	<div class="main_popup">
		<div class="modal-head">
			<span class="title">Nộp hồ sơ ứng tuyển</span>
			<i class="fa fa-times pull-right" aria-hidden="true"></i>
		</div>
		<div class="modal-body">
			<p class="begin">Bạn đang ứng tuyển vị trí:</p>
			<div class="ungtuyen-info">
				<p class="new_title"><?=$row['new_title']?></p>
				<p class="name_com"><?=$row['usc_company']?></p>
			</div>
			<p class="hd">Mời bạn gửi hồ sơ bằng 1 trong 3 cách:</p>
			<div class="step step_1">
				<p class="title_step"><span>Cách 1:</span> Hoàn thiện hồ sơ và gửi đến nhà tuyển dụng.</p>
				<?
				$active = '';
				$warning = '';
				$db_qrut = new db_query("SELECT ki_nang_ban_than FROM user WHERE use_id = ".$_COOKIE['UID']);
				$rowut = mysql_fetch_assoc($db_qrut->result);
				if($rowut['ki_nang_ban_than']!=''){
					$active = 'active';
				}else{
					$active = 'non_active';
					$warning = '<a href="/ung-vien/ho-so-online.html" class="warning">Bạn cần hoàn thiện hồ sơ để ứng tuyển vị trí này!</a>';
				}
				unset($db_qrut,$rowut);
				?>
				<a data-type='1' class="option <?=$active?>">ứng tuyển bằng hồ sơ online</a>
				<?=$warning?>
			</div>
			<div class="step step_2">
				<?
				$db_qrut = new db_query("SELECT link FROM user_cv_upload WHERE use_id = ".$_COOKIE['UID']);
				$rowut = mysql_fetch_assoc($db_qrut->result);
				if($rowut['link']!=''){
					$active = 'active';
				}else{
					$active = 'non_active';
				}
				unset($db_qrut,$rowut);
				?>
				<p class="title_step <?=$active?>"><span>Cách 2:</span> Tải hồ sơ trên máy tính và gửi đến nhà tuyển dụng.</p>
				<a data-type='2' class="option <?=$active?>">Chọn tệp đính kèm từ máy tính</a>
				<!-- <span class="warning">(Hồ sơ định dạng doc, docx, pdf, dung lượng <= 2MB)</span> -->
			</div>
			<div class="step step_3">
				<?
				$db_qrut = new db_query("SELECT name_cv,use_id FROM savecandicv INNER JOIN user ON user.use_id = savecandicv.iduser WHERE iduser = '".$_COOKIE['UID']."' ORDER BY savecandicv.id DESC ");
				$num_ut = mysql_num_rows($db_qrut->result);
				if($num_ut > 0){
					$active = 'active';
				}else{
					$active = 'non_active';
					$warning = '<a rel="nofollow" hrel="/tao-cv-online.html" class="warning">Bạn cần tạo CV để ứng tuyển vị trí này!</a>';
				}
				?>
				<p class="title_step"><span>Cách 3:</span> Chọn CV bạn đã tạo và gửi đến nhà tuyển dụng.</p>
				<a data-type='3' class="option <?=$active?>">CV bạn đã tạo</a>
				<?=$warning?>
				<? if($num_ut>0){?>
				<div class="showCV">
					<div class="non_click"></div>
					<p id="select_cv">Chọn CV của bạn</p>
					<?while($rowcv = mysql_fetch_assoc($db_qrut->result)){?>
					<div class="item">
						<label class="box_hs">
							<?=$rowcv['name_cv']?>
							<input type="radio" data-type="3" name="hoso_link" value="<?=$_COOKIE['UID']?>">
							<span class="checkmark"></span>
						</label>
						<a href="../upload/cv_uv/uv_<?=$rowcv['use_id']?>/<?=$rowcv['name_cv']?>" class="hs_xt"  target="_blank">Xem trước</a>
						<a href="../upload/cv_uv/uv_<?=$rowcv['use_id']?>/<?=$rowcv['name_cv']?>" class="hs_tx" download>Tải xuống</a>
					</div>
					<?}?>
				</div>
				<?}?>
			</div>
		</div>
		<div class="modal-footer text-center">
			<a data-idcom="<?= $row['usc_id']?>" data-new="<?= $row['new_id']?>" data-id="<?= (isset($_COOKIE['UID']) && $_COOKIE['UT']==0)?$_COOKIE['UID']:'' ?>">nộp hồ sơ</a>
		</div>
	</div>
</div>
<div id="ModalUTNews" class="hidden">
    <div class="modal-content">
      <div class="modal-header">
        <i class="fa fa-times pull-right" aria-hidden="true"></i>
        <p class="p_first"><i class="fa fa-check" aria-hidden="true"></i>Nộp hồ sơ thành công!</p>
        <p class="kiemduyet">Hồ sơ của bạn sẽ được gửi đến Nhà tuyển dụng sau khi được Timviec365 kiểm duyệt.</p>
        <p class="txt_tuongtu"><span class="orange">Timviec365.com</span> gợi ý cho bạn một số việc làm tương tự.</p>
        <p><i class="gray">Chúng tôi đã lọc ra một số việc làm phù hợp với những tiêu chí bạn đã đề ra.</i></p>
        <p><i class="red">Click vào từng việc làm để xem thêm thông tin chi tiết!</i></p>
      </div>
      <div class="modal-body">
      	<?
      	$idse = (isset($_COOKIE['UID']) && $_COOKIE['UT']==0)?$_COOKIE['UID']:'';
      	if($idse != ''){
      	$dbcheck = new db_query("SELECT id,nhs_new_id FROM nop_ho_so WHERE nhs_use_id = '".$idse."'");

        $array_check = array();
        while ($row_check  = mysql_fetch_assoc($dbcheck->result)) {
          $array_check[] = intval($row_check['id']);
        }
        $mang = implode("','",$array_check);
      	$get_nntt = new db_query("SELECT new.new_id, new.new_title,new.new_han_nop,new.new_city,new.new_money,user_company.usc_company,user_company.usc_id,user_company.usc_alias,usc_create_time, usc_logo,new_alias
                                    FROM new JOIN user_company ON new.new_user_id = user_company.usc_id 
                                    WHERE new_id NOT IN ('".$mang."') AND (".$sql_cate.") AND new_city IN (".$row['new_city'].")  AND new.new_id <> ".$row['new_id']." AND new.new_han_nop > ".time()." AND new_thuc = 1 AND new_active = 1
                                    ORDER BY new.new_id DESC LIMIT 5 ");
      	While ($row_nntt = mysql_fetch_assoc($get_nntt->result)) { 
      	?>
        <div class="item_vl">
        	<div class="inp_checkbox">
        		<input type="checkbox" data-id="<?=$idse?>" data-idnew="<?=$row_nntt['new_id']?>" data-idcom="<?=$row_nntt['usc_id']?>" name="select_job">
        		<label></label>
        	</div>
        	<div class="right">
        		<div class="images_vlut"><img src="/images/load.gif" class="lazyload" data-src="<?= geturlimageAvatar($row_nntt['usc_create_time']).$row_nntt['usc_logo'] ?>"  onerror='this.onerror=null;this.src="/images/logo-new.png";' alt="<?=$row_nntt['new_title']?>"></div>
	        	<div class="inf_vl">
	        		<a class="inf_vl_name" target="_blank" href="<?= rewriteNews($row_nntt['new_id'],$row_nntt['new_title'],$row_nntt['new_alias']) ?>"><b><?= $row_nntt['new_title'] ?></b></a>
	        		<a class="inf_com_name gray" href="<?= rewrite_company($row['usc_id'],$row['usc_company'],$row['usc_alias'])?>"><?= name_company($row_nntt['usc_company'])?></a>
	        	</div>
				<div class="inf_box_right">
					<p class="p_salary"><i class="salary"></i><?= $array_muc_luong[$row_nntt['new_money']]?></p>
					<p class="p_time"><i class="time"></i><?= date('d/m/Y',$row_nntt['new_han_nop']) ?></p>
				</div>
	        </div>
        </div>
		<?
      	}
      	?>
        <div class="red">Click <img src="/images/img_checkbox.png" alt="Chọn công việc" style="width: 16px;"> để bỏ chọn công việc bạn không mong muốn</div>
		<div>Bạn muốn ứng tuyển cho <span class="orange" id="count_job_checked"><?=mysql_num_rows($get_nntt->result)?></span> vị trí ở phía trên?</div>
		<?}?>
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="ico"></i>Nộp hồ sơ</button>
      </div>
    </div>
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
<div id="popPhanAnh" class="hidden">
	<div class="modal-content">
		<div class="modal-head">
			phản ánh nhà tuyển dụng
			<i class="fa fa-times pull-right"></i>
		</div>
		<div class="modal-body">
			<p>Vui lòng ghi rõ lý do để Timviec365 hỗ trợ bạn</p>
			<textarea id="textarea_ndPhanAnh" placeholder="VD: Nhà tuyển dụng thông tin mập mờ, có dấu hiệu lừa đảo..."></textarea>
		</div>
		<div class="modal-footer">
			<a data-company="<?=$row['usc_id']?>" class="pull-right" id="sent">Gửi phản ánh</a>
			<a class="pull-right" id="cancel">Hủy</a>
		</div>
	</div>
</div>
<div id="popChat" class="hidden">
	<div class="modal-content">
		<div class="modal-header">
			Gửi tin nhắn
			<i class="fa fa-times pull-right"></i>
		</div>
		<div class="modal-body">
			<p>Gửi tin nhắn cho <?= name_company($row['usc_company']) ?></p>
			<p id="mess_note"></p>
			<div class="form-group">
				<label for="" class="require">Tiêu đề</label>
				<input type="text" id="txt_tieude" class="form-control" placeholder="Nhập tiêu đề ...">
			</div>
			<div class="form-group">
				<label for="" class="require">Nội dung</label>
				<textarea id="txt_nd" class="form-control" placeholder="Nhập nội dung tin nhắn ..."></textarea>
			</div>
		</div>
		<div class="modal-footer">
			<a data-company="<?=$row['usc_id']?>" data-candi="<?=$use_id?>" class="pull-right" id="sent">Gửi tin nhắn</a>
			<a class="pull-right" id="cancel">Hủy</a>
		</div>
	</div>
</div>
<?
	$db_getUser_A = new db_query("SELECT birthday,gender,lg_honnhan,muc_tieu_nghe_nghiep,ki_nang_ban_than,work_option,cap_bac_mong_muon,salary,exp_years,use_nganh_nghe FROM user WHERE use_id = ".$idse);
	$rowU = mysql_fetch_assoc($db_getUser_A->result);
	$item = '';
	$arr_cate = ['12','81','59','3','79','37'];
	$cate_user = explode(',',$rowU['use_nganh_nghe']);
	$isUnskill = true;
	foreach($cate_user as $key => $value){
		if(in_array($value,$arr_cate)){
			$isUnskill = false;
			break;
		}
	}
	if($rowU['birthday'] == NULL || $rowU['gender'] == NULL || $rowU['lg_honnhan'] == NULL){
		$item .= '<div class="item">
					<img src="/images/alert_ttlh.png" alt="Alert infor">
					<p class="title_infor">Thông tin liên hệ</p>
				</div>';
	}
	if($rowU['work_option'] == NULL || $rowU['cap_bac_mong_muon'] == NULL || $rowU['salary'] == NULL || $rowU['exp_years'] == NULL){
		$item .= '<div class="item">
					<img src="/images/alert_cvmm.png" alt="Alert infor">
					<p class="title_infor">Công việc mong muốn</p>
				</div>';
	}
	if($rowU['muc_tieu_nghe_nghiep'] == ''){
		$item .= '<div class="item">
			<img src="/images/alert_mtnn.png" alt="Alert infor">
			<p class="title_infor">Mục tiêu nghề nghiệp</p>
		</div>';
	}
	if($rowU['ki_nang_ban_than'] == ''){
		$item .= '<div class="item">
			<img src="/images/alert_knbt.png" alt="Alert infor">
			<p class="title_infor">Kỹ năng bản thân</p>
		</div>';
	}
	$db_getUser = new db_query("SELECT count(*) FROM user_hocvan WHERE use_id = ".$idse);
	$countU = mysql_fetch_assoc($db_getUser->result);
	$countU = $countU['count(*)'];
	if($countU == 0 && $isUnskill == true){
		$item .= '<div class="item">
			<img src="/images/alert_bc.png" alt="Alert infor">
			<p class="title_infor">Bằng cấp</p>
		</div>';
	}
	unset($db_getUser,$countU);
	$db_getUser = new db_query("SELECT count(*) FROM use_ngoaingu WHERE use_id = ".$idse);
	$countU = mysql_fetch_assoc($db_getUser->result);
	$countU = $countU['count(*)'];
	if($countU == 0 && $isUnskill == true){
		$item .= '<div class="item">
			<img src="/images/alert_nnth.png" alt="Alert infor">
			<p class="title_infor">Ngoại ngữ tin học</p>
		</div>';
	}
	unset($db_getUser,$countU);
	$db_getUser = new db_query("SELECT count(*) FROM use_kinhnghiem WHERE use_id = ".$idse);
	$countU = mysql_fetch_assoc($db_getUser->result);
	$countU = $countU['count(*)'];
	if($countU == 0 && $rowU['exp_years'] >= 2){
		$item .= '<div class="item">
			<img src="/images/alert_knlv.png" alt="Alert infor">
			<p class="title_infor">Kinh nghiệm làm việc</p>
		</div>';
	}
	unset($db_getUser,$countU);
	$db_getUser = new db_query("SELECT count(*) FROM user_tham_chieu WHERE id_user = ".$idse);
	$countU = mysql_fetch_assoc($db_getUser->result);
	$countU = $countU['count(*)'];
	if($countU == 0){
		$item .= '<div class="item">
			<img src="/images/alert_ntc.png" alt="Alert infor">
			<p class="title_infor">Người tham chiếu</p>
		</div>';
	}
	
	if($item != '' && !isset($_COOKIE['close_alert'])) 
		echo '
		<div id="banner_alert_infor">
			<div class="header_alert">Hồ sơ của bạn còn thiếu
				<span class="close_alert">x</span>
			</div>
			<div class="box_infor">
				'.$item.'
			</div>
			<div class="text-center">
				<a href="/ung-vien/ho-so-online.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
			</div>
		</div>';
?>
<?}?>
<? include('../includes/inc_footer.php'); ?>
<? include('../includes/inc_script_footer.php') ?>
<script>
	$(document).ready(function(){
		$('.save_job').click(function(){
			var id_user = $(this).attr('data-id');
			var job = $(this).attr('data-job');

			if(id_user == ''){
				$('.popup_CompanySignin').removeClass('hidden');
				$('.popup_CompanySignin .left .note').html("Bạn cần đăng nhập để lưu công việc này !!!");
				return false;
			}else{
				$.ajax({
					type:"POST",
					url:"../ajax/luu_tin.php",
					data:{
						id_tin: job
					},
					success: function(data) {
						if (data == 1) {
							$('.save_job').html('<i class="fa fa-heart" aria-hidden="true"></i>Đã lưu');
						}else{
							$('.save_job').html('<i class="fa fa-heart-o" aria-hidden="true"></i>Lưu việc làm');
						}
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
		$('.apply').click(function(){
			e = $(this);
			if(e.hasClass('login')){
				$('.popup_CompanySignin').removeClass('hidden').hide().show('slow');
				$('.popup_CompanySignin .left .note').html("Bạn cần đăng nhập để ứng tuyển công việc này !!!");
			}else{
				if(e.hasClass('openPopupUT')){
					$('.popup.ungtuyen').removeClass('hidden').hide().show('slow');
					num = $('.popup.ungtuyen .modal-body .step .option.active').length;
					if(num > 1) $('.popup.ungtuyen .modal-footer a').addClass('non_click');
				}else alert("Bạn đã ứng tuyển vị trí này !!!");
			}
		});
		$('#ModalUTNews [type="checkbox"]:checked + label, #ModalUTNews [type="checkbox"]:not(:checked) + label').click(function(){
			$(this).parent().find('input[type="checkbox"]').click();
			$('#count_job_checked').html($('#ModalUTNews [type="checkbox"]:checked').length);
		});
		$('#ModalUTNews .modal-footer .btn-default').click(function () {
			jobchecked = $('#ModalUTNews [type="checkbox"]:checked');
			count_job = $('#ModalUTNews [type="checkbox"]:checked').length;
			$('#ModalUTNews [type="checkbox"]:checked').each(function () {
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
					}
				});
			});
			$('#ModalUTNews').addClass('hidden');
		});
		$('.ungtuyen .fa').click(function(){
			$('.popup.ungtuyen').addClass('hidden');
		});
		$('.popup.ungtuyen .modal-body .step .option.active').click(function(){
			e = $(this);
			type = e.attr('data-type');
			num = $('.popup.ungtuyen .modal-body .step .option.active.non_click').length;
			if(e.hasClass('non_click') == false){
				if(num == 0){
					$('.popup.ungtuyen .modal-body .step .option.active').addClass('non_click');
					e.removeClass('non_click');
					$('.popup.ungtuyen .modal-footer a').removeClass('non_click');
					$('.popup.ungtuyen .modal-footer a').attr('data-type',type);
					if(e.parent().find('.showCV').length == 0){
						$('.step.step_3 .showCV .non_click').css('display','block');
					}
				}else{
					$('.popup.ungtuyen .modal-body .step .option.active').removeClass('non_click');
					$('.popup.ungtuyen .modal-footer a').addClass('non_click');
					$('.step.step_3 .showCV .non_click').css('display','none');
				}
			}
		});
		$('.popup.ungtuyen .modal-footer a').click(function(){
			e = $(this);
			type = e.attr('data-type');
			if(e.hasClass('non_click') == false){
				id_user = $(this).attr('data-id');
				id_com = $(this).attr('data-idcom');
				id_new = $(this).attr('data-new');
				url = '';
				if(type == 2){
					url = $('.step_2 .option').attr('data-url');
				}
				if(type == 3){
					url = $('.step_3 .hs_xt').attr('href');
				}
				$.ajax({
					type:"POST",
					url: "../ajax/nop_ho_so.php",
					data:{
						idtin: id_new,
						iduse: id_user,
						iduser: id_com,
						url: url
					},
					success:function(data){
						$('.popup.ungtuyen').addClass('hidden');
						if(data==1){
							if($('#count_job_checked').html()>0) $('#ModalUTNews').removeClass('hidden');
							else $('#appli_success').removeClass('hidden');
						}else alert("Bạn đã ứng tuyển công việc này");
					}
				});
			}
		});
		$('#ModalUTNews .fa.pull-right').click(function(){
			$('#ModalUTNews').addClass('hidden');
		});
		$('#popPhanAnh .modal-head .fa, #popPhanAnh #cancel').click(function(){
			$('#popPhanAnh').addClass('hidden');
		});
		$('.phanAnh_NTD').click(function(){
			$('#popPhanAnh').removeClass('hidden');
		});
		$('#popPhanAnh #sent').click(function(){
			content = $('#textarea_ndPhanAnh').val();
			id_company = $(this).attr('data-company');
			if(content != ''){
				$.ajax({
					type: "POST",
					url: "../ajax/company_reflect.php",
					data: {
						id_company : id_company,
						content: content
					},success:function(data){
						if(data == 1){
							$('#popPhanAnh').addClass('hidden');
							alert("Timviec365.com cảm ơn bạn đã gửi phản ánh về nhà tuyển dụng này !!!");
						}
					}
				});
			}
		});
		$('#popChat #sent').click(function(){
			title = $('#txt_tieude');
			content = $('#txt_nd');
			id_company = $(this).attr('data-company');
			id_candi = $(this).attr('data-candi');
			if(title.val() == '' || content.val() == ''){
				$('#mess_note').html("Vui lòng điền đầy đủ nội dung tiêu đề và tin nhắn !!!");
			}else{
				$('#mess_note').html('');
				$.ajax({
					type: "POST",
					url: "../ajax/sent_message.php",
					data: {
						title: title.val(),
						content: content.val(),
						receiver: id_company,
						sender: id_candi
					},
					beforeSent:function(){
						$('#popChat #sent').html("Đang tải ...");
					}
					,success:function(data){
						if(data==1){
							alert("Gửi tin nhắn cho nhà tuyển dụng thành công");
							$('#popChat #sent').html("Gửi tin nhắn");
							$('#popChat').addClass('hidden');
						}
					}
				});
			}
		});
		$('#popChat .modal-header .fa, #popChat #cancel').click(function(){
			$('#popChat').addClass('hidden');
		});
		$('.box_chat a').click(function(){
			$('#popChat').removeClass('hidden');
		});
		$('.open_popup').click(function(){
			$('.popup_CompanySignin').removeClass('hidden');
			$('.popup_CompanySignin .left .note').html("Bạn cần đăng nhập để xem số điện thoại, email của NTD");
		});
		$('#appli_success .modal-footer button').click(function(){
			$('#appli_success').addClass('hidden');
		});
		$('.box_hs').click(function(){
			e = $(this);
			type = e.find('input[name="hoso_link"]').attr('data-type');
			$('.popup.ungtuyen .modal-body .step .option').addClass('non_click');
			$('.step.step_3 .option').removeClass('non_click');
			$('.popup.ungtuyen .modal-footer a').attr('data-type',type);
			$('.popup.ungtuyen .modal-footer a.non_click').removeClass('non_click');
		});
		$('.close_alert').click(function(){
			$('#banner_alert_infor').addClass('hidden');
			document.cookie="close_alert=1";
			var x = document.cookie;
		});
	});
</script>
</body>
</html>