<? 
include("config.php"); 

$idTag = getValue('idTag','int','GET',0);
$db_seo = new db_query("SELECT * FROM tbl_tags WHERE tag_id = ".$idTag);
$rowSeo = mysql_fetch_assoc($db_seo->result);

$nganhnghe = $rowSeo['tag_cate_id'];
$nganhnghe = (int)$nganhnghe;
$qh = $rowSeo['tag_district_id'];
$qh   = (int)$qh;

$cateName = "";
$sql = '';

if($nganhnghe != 0){
	$sql .= "AND FIND_IN_SET('".$nganhnghe."' , new_cat_id)";
	$cateName = $db_cat[$nganhnghe]['cat_name'];
}
if($qh != 0)
{
	$arr_l = ['quận','huyện','thị xã','thành phố'];
	$arr_r = ['','','',''];
	
	$name_district = $db_district[$qh]['cit_name'];
	$name_city = $arrcity[$db_district[$qh]['cit_parent']]['cit_name'];
	$sqlcit_name = $name_district;
	$sqlcit_name = str_replace("'","",$sqlcit_name);
	$sql .= " AND ((FIND_IN_SET('".$qh."',new_qh_id)) OR (FIND_IN_SET('".$qh."',usc_district) OR (usc_address LIKE '%".$sqlcit_name."%' AND usc_city = ".$db_district[$qh]['cit_parent']."))) ";
}

if($rowSeo['tag_parent']==1){
	$meta_title = ($rowSeo['tag_title']!='')?$rowSeo['tag_title']:"Tuyển dụng, tìm việc làm tại ".$name_district." - ".$name_city." | Timviec365.com";
	$meta_des = ($rowSeo['tag_des']!='')?$rowSeo['tag_des']:"Tìm việc làm tại ".$name_district." ".$name_city." mới nhất trên Timviec365.com. Tin tuyển dụng tại quận ".$name_district." ".$name_city." từ các công ty hàng đầu cập nhật liên tục.";
	$meta_key = ($rowSeo['tag_keyword']!='')?$rowSeo['tag_keyword']:"Tìm việc làm tại ".strtolower($name_district)." ".strtolower($name_city)."";
	$h1 = $rowSeo['tag_name'];
}
if($rowSeo['tag_parent']==2){
	$meta_title = ($rowSeo['tag_title']!='')?$rowSeo['tag_title']:"Tìm việc làm ".$cateName." tại ".$name_district." - ".$name_city." | Timviec365.com";
	$meta_des = ($rowSeo['tag_des']!='')?$rowSeo['tag_des']:"Tìm việc làm ".$cateName." tại ".$name_district." ".$name_city." mới nhất trên Timviec365.com. Tin tuyển dụng tại ".$name_district." ".$name_city." từ các công ty hàng đầu cập nhật liên tục.";
	$meta_key = ($rowSeo['tag_keyword']!='')?$rowSeo['tag_keyword']:"Tìm việc làm ".$cateName." tại ".strtolower($name_district)." ".strtolower($name_city)."";
	$h1 = $rowSeo['tag_name'];
}
if($rowSeo['tag_parent']==3){
	$keysearch = $h1 = $rowSeo['tag_name'];
	$h1 = "Tìm việc làm ".$h1;
	$keysearch = trim($keysearch);
	$keysearch = str_replace(" ","%",$keysearch);
	$sql .= " AND (FIND_IN_SET('".$idTag."',new_tag)) OR (new_title LIKE '%".$keysearch."%')" ;

	$meta_title = ($rowSeo['tag_title']!='')?$rowSeo['tag_title']:"Tuyển dụng, tìm việc làm ".$rowSeo['tag_name']." | Timviec365.com";
	$meta_des = ($rowSeo['tag_des']!='')?$rowSeo['tag_des']:"Tìm việc làm ".$rowSeo['tag_name']." mới nhất trên Timviec365.com. Tin tuyển dụng ".$rowSeo['tag_name']." từ các công ty hàng đầu cập nhật liên tục.";
	$meta_key = ($rowSeo['tag_keyword']!='')?$rowSeo['tag_keyword']:"Tìm việc làm ".$rowSeo['tag_name'];
}
$seo_nd = $rowSeo['tag_content'];
$page  = getValue('page','int','GET',0);
$page  = intval(@$page);

if($page == 1)
{
	$redirect = rewriteUrlTag($rowSeo['tag_alias'],$idTag);
	redirect($redirect);
}
if($page == 0)
{
	$page = 1;
}
$curentPage = 10;
$pageab = abs($page - 1);
$start = $pageab * $curentPage;
$start = intval(@$start);
$start = abs($start);

$url_query= ($page > 1)?"?page=".$page:"";

$db_qr = new db_query("SELECT new.new_id,user_company.usc_id,new.new_money,new.new_city,user_company.usc_create_time,user_company.usc_logo,user_company.usc_company,new.new_title,user_company.usc_alias,new_alias, new_mota, new_qh_id, usc_district,usc_city,new_cat_id FROM new STRAIGHT_JOIN user_company ON new.new_user_id = user_company.usc_id JOIN new_multi ON new.new_id = new_multi.new_id WHERE 1 ".$sql." ORDER BY new.new_update_time DESC LIMIT ".$start.",".$curentPage);
// SELECT new.new_id,user_company.usc_id,new.new_money,new.new_city,user_company.usc_create_time,user_company.usc_logo,user_company.usc_company,new.new_title,user_company.usc_alias,new_alias, new_mota, new_qh_id, usc_district,usc_city,new_cat_id FROM new STRAIGHT_JOIN user_company ON new.new_user_id = user_company.usc_id JOIN new_multi ON new.new_id = new_multi.new_id WHERE 1 AND (FIND_IN_SET('9692',new_tag)) OR (new_title LIKE '%kỹ%sư%mạng%máy%tính%') ORDER BY new.new_update_time DESC LIMIT 0,10

$numrow = new db_query("SELECT count(1) FROM new STRAIGHT_JOIN user_company ON new_user_id = user_company.usc_id WHERE 1 ".$sql." "); 
$count = mysql_fetch_assoc($numrow->result);
$count = $count['count(1)'];

if($page > 1)
{
	$trang = " - trang ".$page;
}
else
{
	$trang = '';
}

$index = ($rowSeo['tag_index'] && $page == 1)?"index,follow":"noindex,nofollow";
$canonical = $domain.rewriteUrlTag($rowSeo['tag_alias'],$idTag);
$login = (isset($_COOKIE['UT']) && $_COOKIE['UT']==0)?"login":"";

$urluri = $canonical.$url_query;
$urlcheck = $domain.$_SERVER['REQUEST_URI'];

if($urlcheck != $urluri)
{
   header("HTTP/1.1 301 Moved Permanently"); 
   header("Location: $urluri");
   exit();
}
?>
<!DOCTYPE html>
<html lang="vi" prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<link rel="canonical" href="<?= $canonical ?>" />
	<meta name="p:domain_verify" content=""/>
	<link href="" rel="shortcut icon"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title><?= $meta_title ?></title>
	<meta name="description" content="<?=$meta_des ?>"/>
	<meta name="Keywords" content="<?=$meta_key ?>"/>
	<meta name="robots" content="<?=$index?>"/>
	<meta property="og:locale" content="vi_VN" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?=$meta_title ?>" />
	<meta property="og:description" content="<?=$meta_des ?>" />
	<meta property="og:site_name" content="Timviec365.com" />
	<meta property="og:image" content="<?=$domain?>/images/timviec365com.jpg"/>
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:description" content="<?=$meta_des ?>" />
	<meta name="twitter:title" content="<?=$meta_title ?>">
	<link rel="stylesheet" href="/css/font-awesome.min.css" onload="if(media!='all')media='all'">
	<link rel="stylesheet" href="/css/slick-theme.css" media='all' onload="if(media!='all')media='all'">
	<link rel="stylesheet" href="/css/slick.css" media='all' onload="if(media!='all')media='all'">
	<link rel="stylesheet" href="/css/style.min.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
	<meta name="google-site-verification" content="EIV7wHDvaTZkVpsLjmM4_neYDyPLTmjV9du0A8ho4TU" />
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->
<?
if($rowSeo['tag_parent']==3){
?>
	<script type="application/ld+json">
	{
	"@context": "https://schema.org/", 
	"@type": "BreadcrumbList", 
	"itemListElement": [{
		"@type": "ListItem", 
		"position": 1, 
		"name": "Trang chủ",
		"item": "https://timviec365.com/"  
	},{
		"@type": "ListItem", 
		"position": 2, 
		"name": "Tìm việc làm <?= strtolower($rowSeo['tag_name'])?>",
		"item": "<?=$canonical?>"  
	}]
	}
	</script>
<?
}
?>
</head>
<body id="search">
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<header>
		<? include('../includes/inc_header.php'); ?>
		<div id="banner">
			<? include('../includes/inc_search.php') ?>
			<p class="taingay text-center">Tải ngay ứng dụng timviec365 và cv365+ trên điện thoại để trải nghiệm tốt nhất</p>
			<div class="text-center">	
				<a class="downLoad_App Timviec365" rel="nofollow" href="/ung-dung-tim-viec-lam.html"><i class="icon"></i>Tải app Timviec365</a>
				<a class="downLoad_App CV365" rel="nofollow" href="/ung-dung-tao-cv.html"><i class="icon"></i>Tải app CV365</a>
			</div>
		</div>
	</header>
	<div class="breakcrumb">
		<ul>
			<li><a href="/">Trang chủ</a></li>
			<li class="active"><span><?= $h1 ?></span></li>
		</ul>
	</div>
	<div class="main_tag main">
		<div class="tag_head main">
			<div class="icon"><img src="/images/tag_head.png" alt="Tìm việc làm"></div>
			<h1 class="txt_head"><?=$h1?></h1>
		</div>
		<div class="tag_container main">
			<div class="tag_left">
				<div class="main_tag_left main">
					<?
					while ($row = mysql_fetch_assoc($db_qr->result)) {
						if($row['new_qh_id']!=0){
							$idqh = explode(',',$row['new_qh_id'])[0];
							$job_name = array(
								$db_district[$idqh]['cit_name'],
								$arrcity[$db_district[$idqh]['cit_parent']]['cit_name']
							);
						}
						if($row['new_qh_id'] == 0 && $row['usc_district']!=0){
							$idqh = explode(',',$row['usc_district'])[0];
							$job_name = array(
								$db_district[$idqh]['cit_name'],
								$arrcity[$db_district[$idqh]['cit_parent']]['cit_name']
							);
						}
						if($row['new_qh_id'] == 0 && $row['usc_district']==0 && $row['usc_city']!=0){
							$job_name = array(
								$arrcity[$row['usc_city']]['cit_name']
							);
						}
						if($row['new_city'] != 0 && $row['usc_district']==0 && $row['new_qh_id'] == 0){
							$idnewcity = explode(',',$row['new_city'])[0];
							$job_name = array(
								$arrcity[$idnewcity]['cit_name']
							);
						}
						$id_city = explode(',',$row['new_city'])[0];
						$cit_name = $arrcity[$id_city]['cit_name'];
						$li_cit = "Việc làm tại ".$cit_name;
						$li_com = "Việc làm tại ".name_company($row['usc_company']);
						if($row['new_qh_id']!=0){
							$arrqh_new = explode(',',$row['new_qh_id']);
							foreach($arrqh_new as $key => $value){
								if($value != $qh && array_key_exists($value,$arrQhActive)){
									$qh_id = $value;
								}
							}
							if(!isset($qh_id)) $qh_id = explode(',',$row['new_qh_id'])[0];
							$li_secount_text = "Việc làm tại ".$arrQhActive[$qh_id]['cit_name']." - ".$arrcity[$arrQhActive[$qh_id]['cit_parent']]['cit_name'];
							$sql_get_tag = "SELECT tag_id, tag_alias FROM tbl_tags WHERE tag_parent = 1 AND tag_district_id = ".$qh_id;
							$db_get_tag = new db_query($sql_get_tag);
							$rows = mysql_fetch_assoc($db_get_tag->result);
							$href_secount = rewriteUrlTag($rows['tag_alias'],$rows['tag_id']);
						}else{
							$idCate = explode(',',$row['new_cat_id'])[0];
							$cat_name = $db_cat[$idCate]['cat_name'];
							$li_secount_text = 'Việc làm '.$cat_name;
							$href_secount = rewriteCate(0,0,$idCate,$cat_name);
						}
					?>
					<div class="item main">
						<div class="right_item title_new_tag">
							<a title="<?= $row['new_title'] ?>" href="<?= rewriteNews($row['new_id'],$row['new_title'],$row['new_alias']) ?>"><h2 class="tag_title"><?= $row['new_title'] ?></h2></a>
						</div>
						<a class="logo">
							<img src="/images/load.gif" class="lazyload" data-src="<?= str_replace('../', $domain.'/', geturlimageAvatar($row['usc_create_time']).$row['usc_logo'])  ?>" onerror='this.onerror=null;this.src="/images/logo-new.png";' alt="<?= $row['usc_company'] ?>">
						</a>
						<div class="right_item">
							<div class="infor_tag_new">
								<div class="item_tag_new nameCompany"><a title="<?= name_company($row['usc_company']) ?>" href="<?= rewrite_company($row['usc_id'],$row['usc_company'],$row['usc_alias']) ?>"><?= name_company($row['usc_company']) ?></a></div>
								<div class="item_tag_new li_money"><img src="/images/tag_money.png" alt="Lương"><?= $array_muc_luong[$row['new_money']]?></div>
								<div class="item_tag_new li_addr"><i class="fa fa-map-marker" aria-hidden="true"></i>  
								<?=implode(', ',$job_name);?>
								</div>
							</div>
						</div>
						<div class="right_item mota">
							<div class="new_mota">
								<?
								$new_mota = $row['new_mota'];
								
								if(strlen($new_mota) > 200){
									$round = round(strlen($new_mota)/3);
									echo "... ".substr($new_mota,$round);
								}else{
									echo $new_mota;
								}
								?>
							</div>
							<button class="btn_xt">Xem thêm  <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
							<div class="open_xt main" style="display:none">
								<p class="openTitle">Xem tìm kiếm tương tự</p>
								<ul>
									<li><a href="<?=rewriteCate($id_city,$cit_name,0,0)?>"><?=$li_cit?></a></li>
									<li><a href="<?=$href_secount?>"><?=$li_secount_text?></a></li>
									<li><a href="<?=rewrite_company($row['usc_id'],$row['usc_company'],$row['usc_alias'])?>"><?=$li_com?></a></li>
								</ul>
							</div>
						</div>
					</div>
					<?}?>
					<div class="pagination_wrap clr text-center">
						<div class="clr">
							<?
							$urlcano = $_SERVER['REQUEST_URI'];
							$urlcano = str_replace("?page=".$page, "", $urlcano);
							$urlcano = str_replace("&page=".$page, "", $urlcano);
							$urlcano = str_replace("page=".$page, "", $urlcano);
							if (strlen(strstr($urlcano, '?')) > 0) {
								echo generatePageBar2('',$page,$curentPage,$count,$urlcano,'&','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
							}else{
								echo generatePageBar2('',$page,$curentPage,$count,$urlcano,'?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="tag_right">
				<a href="/mau-cv.html"><img src="/images/tag_cv_1.png" alt="Mẫu cv xin việc"></a>
				<a style="display:block;margin-top:39px" href="/"><img src="/images/tag_cv_2.png" alt="Tìm việc làm"></a>
			</div>
		</div>
		<div class="tag_head cv main">
			<div class="icon"><img src="/images/tag_head_cv.png" alt="head cv"></div>
			<p class="txt_head">Mẫu CV xin việc đẹp nhất</p>
		</div>
		<div class="tag_container slide_cate_cv slide_cate_cv2">
			<div class="main_cate_cv2 main">
	   		<?
				$sql = "SELECT alias,id,image,name FROM samplecv WHERE status = 1 ORDER BY serial DESC, samplecv.timecreated DESC LIMIT 30";	
				$get_cv = new db_query($sql);
				while($row_cv = mysql_fetch_assoc($get_cv->result)){
			?>
			<div class="item">
				<div class="parent">
					<div class="child">
						<a rel="nofollow" <?= ($login != '')?'href="'.rewriteCreateCV($row_cv['alias'],$row_cv['id']).'"':'onclick="func_login(`'.$row_cv['alias'].'`)"' ?> class="use">Sử dụng mẫu này</a></div>
					<img class="lazyload" src="/images/load.gif" data-src="../upload/maucv/<?=$row_cv['alias']."/".$row_cv['image']?>" alt="<?=$row_cv['name']?>">
				</div>
			</div>
	   		<?
				}
				unset($text,$sql,$get_cv,$check);
	   		?>
   		</div>
		
		<div class="tag_all_cv cate_show_all pull-right text-center">
			<a href="/mau-cv.html" title="Xem tất cả mẫu CV xin việc">Xem tất cả CV <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
	   </div>
	   </div>
		<!-- <div class="tag_container key_tag main">
			<div class="item_tag_key">
				<p class="keyTagTitle">Chức danh</p>
				<ul class="left_ct">
				<?
				for($i = 0; $i < 30; $i++){
					echo '<li class="key_link"><a href="">Chuyên Viên Nhân Sự</a></li>';
				}
				?>
				
				</ul>
				<i class="btn_hide_show fa fa-plus-circle" aria-hidden="true"></i>
			</div>
			<div class="item_tag_key">
				<p class="keyTagTitle">Từ khóa liên quan</p>
				<ul class="left_ct">
				<?
				for($i = 0; $i < 30; $i++){
					echo '<li class="key_link"><a href="">Chuyên Viên Nhân Sự</a></li>';
				}
				?>
				
				</ul>
				<i class="btn_hide_show fa fa-plus-circle" aria-hidden="true"></i>
			</div>
			<div class="item_tag_key">
				<p class="keyTagTitle">Công ty</p>
				<ul class="left_ct">
				<?
				for($i = 0; $i < 30; $i++){
					echo '<li class="key_link"><a href="">Chuyên Viên Nhân Sự</a></li>';
				}
				?>
				
				</ul>
				<i class="btn_hide_show fa fa-plus-circle" aria-hidden="true"></i>
			</div>
			<div class="item_tag_key">
				<p class="keyTagTitle">Địa điểm</p>
				<ul class="left_ct">
				<?
				for($i = 0; $i < 30; $i++){
					echo '<li class="key_link"><a href="">Chuyên Viên Nhân Sự</a></li>';
				}
				?>
				
				</ul>
				<i class="btn_hide_show fa fa-plus-circle" aria-hidden="true"></i>
			</div>
		</div> -->
	</div>
	<?
	if($seo_nd != ''){
	?>
	<div class="box_text_seo option2">
		<div class="menu">
		<? makeML($seo_nd,'',''); ?>
		</div>
		<div class="content">
			<div class="nd full"><?= makeML_content(str_replace('src=', 'class="lazyload" src="/images/load.gif" data-src=', $seo_nd),'','') ?></div>
			<div class="read">
			Thu gọn <i class="fa fa-angle-double-up" aria-hidden="true"></i>
			</div>
		</div>
	</div>
	<?}?>
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
		<? 
			include('../includes/inc_footer.php');
			include('../includes/inc_script_footer.php') 
		?>
		<script>
			$(document).ready(function(){
				width = $(window).width();
				if(width <= 1024){
					$('.tag_right a[href="/"] img').attr('src','/images/tag_vl2.png');
					$('.tag_right a[href="/mau-cv.html"] img').attr('src','/images/tag_vl3.png');
				}
				$('.main_cate_cv2').slick({
					infinite:true,
					slidesToShow:5,
					slidesToScroll:5,
					autoplay:true,
					speed:1000,
					responsive: [
						{
							breakpoint: 1024,
							settings: {
								slidesToShow: 3,
								slidesToScroll: 3,
							}
						},
						{
							breakpoint: 600,
							settings: {
								slidesToShow: 2,
								slidesToScroll: 2
							}
						},
						{
							breakpoint: 480,
							settings: {
								slidesToShow: 1,
								slidesToScroll: 1
							}
						}
					]
				});
				$('.popup_CompanySignin #submit').click(function(){
					e = $(this);
					user_name = $('#email');
					password = $('#password');
					href = e.attr('data-href');

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
							},success:function(data){
								if(data!=0){
									window.location.href = href;
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
				$('.btn_hide_show').click(function(){
					e = $(this),e.prev().hasClass('open')?(e.addClass('fa-plus-circle').removeClass('fa-minus-circle'),e.prev().removeClass('open')):(e.prev().addClass('open'),e.addClass('fa-minus-circle').removeClass('fa-plus-circle'))
				});
				$('.btn_xt').click(function(){
					e = $(this),(e.next().hasClass('open'))?(e.next().removeClass('open').hide('slow'),e.html('Xem thêm  <i class="fa fa-plus-circle" aria-hidden="true"></i>')):(e.next().addClass('open').show('slow'),e.html('Rút gọn  <i class="fa fa-minus-circle" aria-hidden="true"></i>'))
				});
			});
			function func_login(alias){
				url = "/tao-cv-online/"+alias+".html";
				$('.popup_CompanySignin').removeClass('hidden').hide().show('slow');
				$('.popup_CompanySignin #submit').attr('data-href',url);
			}
		</script>
	</body>
</html>