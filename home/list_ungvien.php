<?
include("config.php");
$catid = getValue("cate","int","GET",0);
$catid = (int)$catid;
$nganhnghe = $catid;
$city  = getValue("city","int","GET",0);
$city  = (int)$city;
$diadiem = $city;
$sql ='';
$isListCandi = 1; //Biến để nhận biết tìm kiếm ứng viên hay việc làm
if($catid == 0){ $catname = "Ứng viên"; }
else
{
   if(isset($db_cat[$catid]['cat_name']))
   {
      $sql .= " AND FIND_IN_SET('".$nganhnghe."' , use_nganh_nghe)";
      $catname = $db_cat[$catid]['cat_name'];
   }
   else{ $catname = 'Ứng viên'; }
}
if($city == 0){ $citname = ""; }
else
{
   if(isset($arrcity[$city]['cit_name']))
   {
      $sql .= " AND FIND_IN_SET('".$diadiem."' , use_district_job)";
      $citname = $arrcity[$city]['cit_name'];
   }
   else{ $citname = ''; }
}

$linkfilt = $_SERVER['REQUEST_URI'];
$page  = getValue('page','int','GET',1,2);
$page  = intval(@$page);
if($page == 0)
{
   $page = 1;
}
$curentPage = 12;
$pageab = abs($page - 1);
$start = $pageab * $curentPage;
$start = intval(@$start);
$start = abs($start);
$show_new = 0;

$db_qr = new db_query("SELECT use_create_time,gender,use_job_name,use_name,salary,use_district_job,use_update_time,use_id,use_logo,address,use_city,exp_years FROM user WHERE 1 AND use_job_name <> '' ".$sql." AND use_show = 1  AND usc_search = 1 AND use_city != 0 ORDER BY use_update_time DESC,use_id DESC LIMIT ".$start.",".$curentPage);
$numrow = new db_query("SELECT count(1) FROM user WHERE 1 AND use_job_name <> '' ".$sql." AND use_show = 1 AND usc_search = 1"); 
$count = mysql_fetch_assoc($numrow->result);
$count = $count['count(1)'];

$url_default = "https://timviec365.com".rewriteCateUV($catid,$catname,$city,$citname);
if($nganhnghe == 0 && $diadiem == 0)
{
	$db_seo = new db_query("SELECT * FROM `seo_tt` WHERE name_page = 'nguoi-tim-viec'");
    $row_seo = mysql_fetch_assoc($db_seo->result);
	$show_new = 1;
	$title = $row_seo['seo_tt'];
	$description = $row_seo['seo_des'];
	$seo_key = $row_seo['seo_key'];
	$h1 = "Hồ sơ ứng viên mới nhất";
	$index = "noodp,index,follow";
	$breakCrumb = '<div class="breakcrumb">
						<ul>
							<li><a href="/">Trang chủ</a></li>
							<li class="active"><span>Ứng viên</span></li>
						</ul>
					</div>';
}
else if($nganhnghe != 0 && $diadiem == 0)
{
	$seo_key = '';
	$title = "Hồ sơ ứng viên ".$db_cat[$catid]['cat_name']." mới nhất năm ".date("Y",time());
	$description = "Hồ sơ ứng viên ".$db_cat[$catid]['cat_name']." mới nhất hot nhất ".date("Y",time()).". Hàng ngàn hồ sơ của ứng viên hấp dẫn phù hợp với nhà tuyển dụng.";
	$h1 = "Hồ sơ ứng viên ".$db_cat[$catid]['cat_name']." mới nhất";
	$index = "noodp,noindex,nofollow";
	$textBreak = "Ứng viên ".$db_cat[$catid]['cat_name'];
	$breakCrumb = '<div class="breakcrumb">
						<ul>
							<li><a href="/">Trang chủ</a></li>
							<li><a href="/ung-vien-tim-viec.html">Ứng viên</a></li>
							<li class="active"><span>Ứng viên '.$db_cat[$catid]['cat_name'].'</span></li>
						</ul>
					</div>';
}
else if($nganhnghe == 0 && $diadiem != 0)
{   
	$seo_key = '';
	$title = "Hồ sơ ứng viên tại ".$arrcity[$city]['cit_name']." mới nhất tháng ".date("m/Y",time());
	$description = "Hồ sơ ứng viên mới nhất hot nhất ".date("Y",time())." tại ".$arrcity[$city]['cit_name'].". Hàng ngàn hồ sơ của ứng viên hấp dẫn phù hợp với nhà tuyển dụng.";
	$h1 = "Hồ sơ ứng viên tại ".$arrcity[$city]['cit_name']." mới nhất";
	$index = "noodp,noindex,nofollow";
	$breakCrumb = '<div class="breakcrumb">
						<ul>
							<li><a href="/">Trang chủ</a></li>
							<li><a href="/ung-vien-tim-viec.html">Ứng viên</a></li>
							<li class="active"><span>Ứng viên '.$arrcity[$city]['cit_name'].'</span></li>
						</ul>
					</div>';
}
else if($nganhnghe != 0 && $diadiem != 0)
{
	$seo_key = '';
	$title = "Hồ sơ ứng viên ".$db_cat[$catid]['cat_name']." tại ".$arrcity[$city]['cit_name']." mới nhất năm ".date("Y",time());
	$description = "Hồ sơ ứng viên ".$db_cat[$catid]['cat_name']." mới nhất hot nhất ".date("Y",time())." tại ".$arrcity[$city]['cit_name'].". Hàng ngàn hồ sơ của ứng viên hấp dẫn phù hợp với nhà tuyển dụng.";
	$h1 = "Hồ sơ ứng viên ".$db_cat[$catid]['cat_name']." tại ".$arrcity[$city]['cit_name']." mới nhất năm ".date("Y",time());
	$index = "noodp,noindex,nofollow";
	$breakCrumb = '<div class="breakcrumb">
						<ul>
							<li><a href="/">Trang chủ</a></li>
							<li><a href="/ung-vien-tim-viec.html">Ứng viên</a></li>
							<li class="active"><span>Ứng viên '. strtolower($db_cat[$catid]['cat_name']).' tại '.$arrcity[$city]['cit_name'].'</span></li>
						</ul>
					</div>';
}
$pageccr = $count/$curentPage;
$pageccr =  ceil($pageccr);

$urls = array(
"/images/no-image.png",
);
$urlcano = $domain.$_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<link rel="canonical" href="<?= $urlcano ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title><?=$title; ?></title>
	<meta name="description" content="<?=$description; ?>"/>
	<meta name="Keywords" content="<?=$seo_key; ?>"/>
	<?
	 if($page == 1){
	?>
	<meta name="robots" content="<?=$index?>"/>
	<?
	 }
	 else{
	?>
	<meta name="robots" content="noodp,noindex,nofollow"/>
	<?
	 }
	?>
	<meta property="og:locale" content="vi_VN" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?= $title?>" />
	<meta property="og:description" content="<?=$description?>" />
	<meta property="og:site_name" content="Tìm việc làm" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:description" content="<?=$description?>" />
	<meta name="twitter:title" content="<?= $title?>" />

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
<body id="list_candi">
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<header>
		<? include('../includes/inc_header.php'); ?>
		<div id="banner">
			<? include('../includes/inc_search_uv.php'); ?>
			<p class="taingay text-center">Tải ngay ứng dụng timviec365 và cv365+ trên điện thoại để trải nghiệm tốt nhất</p>
			<div class="text-center">
				<a class="text-left downLoad_App Timviec365" href="/ung-dung-tim-viec-lam.html" rel="nofollow"><i class="icon"></i>Tải app Timviec365</a>
				<a class="text-left downLoad_App CV365" href="/ung-dung-tao-cv.html" rel="nofollow"><i class="icon"></i>Tải app CV365</a>
			</div>
		</div>
	</header>
	<?=$breakCrumb?>
	<div class="box_maincandi">	
		<div class="box_candinew">
			<div class="tit">
				<div class="ir">
					<i class="ico"></i><h1 class="heading"><?=$h1?></h1>
				</div>
			</div>
			<div class="main">
				<?
				$i = 0;
				While ($row = mysql_fetch_assoc($db_qr->result)) {
					$src_err = ($row['gender']!='')?($row['gender'] == 1)?"/images/candi_male.png":"/images/candi_female.png":"/images/candi_null.png";

					$status = '<a class="status login"><i class="fa fa-heart-o" aria-hidden="true"></i>Lưu</a>';
					$status_2 = '';
					if(isset($_COOKIE['UT']) && $_COOKIE["UT"]==1){
						$db_ckview = new db_query("SELECT type FROM tbl_point_used WHERE usc_id = ".$_COOKIE['UID']." AND use_id = ".$row['use_id']." ");
						if(mysql_num_rows($db_ckview->result) > 0){
							$row_ck = mysql_fetch_assoc($db_ckview->result);
							if($row_ck['type']==0){
								$status_2 = '<span class="showStatus2">Đã xem</span>';
							}
							else{
								$status_2 = '<span class="showStatus2">Đã mở</span>';
							}
						}
						$db_cksave = new db_query("SELECT id_uv FROM tbl_luuhoso_uv WHERE id_uv = ".$row['use_id']." AND id_ntd = ".$_COOKIE['UID']);
						if(mysql_num_rows($db_cksave->result)>0){
							$status = '<a class="status saved" data-id="'.$row['use_id'].'"><i class="fa fa-heart" aria-hidden="true"></i>Đã lưu</a>';
						}else{
							$status = '<a class="status" data-id="'.$row['use_id'].'"><i class="fa fa-heart-o" aria-hidden="true"></i>Lưu</a>';
						}
					}
				?>
				<div class="item">
					<div class="logo  <?= ($row['use_logo']!='')?"notnull":"" ?>">
						<img class="lazyload <?= ($row['use_logo']!='')?"notnull":"" ?>" onerror='this.onerror=null;this.src="<?=$src_err?>"' src="/images/load.gif" data-src="<?= ($row['use_logo']!='')?str_replace('..','https://timviec365.com/',geturlimageAvatar($row['use_create_time']).$row['use_logo']):$src_err ?>">
					</div>
					<div class="right">
						<a href="<?= rewriteUV($row['use_id'],$row['use_name']) ?>" class="title_job"><?= $row['use_job_name']?></a>
						<div class="box_status">
							<?=$status_2?>
							<?=$status?>
						</div>
						<a href="<?= rewriteUV($row['use_id'],$row['use_name']) ?>" class="candi_name"><h2 class="h2"><?= $row['use_name']?></h2></a>
					</div>
					<div class="right_bot">
						<p class="candi_address"><i class="icon"></i>
							<?
							$city_name = $arrcity[$row['use_city']]['cit_name'];
							echo $city_name;
							?>
						</p>
						<p class="p_exp"><i class="icon"></i><?= ($row['exp_years']!="")?$array_kinh_nghiem_uv[$row['exp_years']]:"Xem trong CV" ?></p>
						<p class="p_time"><i class="time"></i>
						<?
						if($row['use_update_time']>$row['use_create_time']){
							$time_update = $row['use_update_time'];
						}else{
							$time_update = $row['use_create_time'];
						}
						echo date('d/m/Y',$time_update);
						?>
						</p>
						<p class="for_mb">
							<?=$status?>
						</p>
					</div>
				</div>
				<?
				$i++;
				}
				?>
			</div>
			<div class="pagination_wrap text-center clr">
				<div class="clr">
				<?
				$urlcano = str_replace("?page=".$page, "", $urlcano);
				$urlcano = str_replace("&page=".$page, "", $urlcano);
				$urlcano = str_replace("page=".$page, "", $urlcano);
				echo generatePageBar2('',$page,$curentPage,$count,$urlcano,'?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
				unset($db_qr,$row,$arr_city);
				?>
				</div>
		   </div>
		</div>
		<div class="box_cateUV">
			<div class="cate_item">
				<div class="tit_cate">Ứng viên theo ngành nghề</div>
				<div class="main">
					<div class="search_cate">
					<i class="fa fa-search" aria-hidden="true"></i> <input type="text" data-type="uv" data-dt="cate" class="keyword" placeholder="Nhập từ khóa ...">
					</div>
					<div class="list">
					<?
					foreach ($db_cat as $key => $value) {
					?>
					<a href="<?= rewriteCateUV(0,0,$value['cat_id'],$value['cat_name']) ?>" class="item">Ứng viên <?=$value['cat_name']?> <span class="count_cate">(<?= $value['cat_count']?>)</span></a>
					<?
					}
					?>				
					</div>	
				</div>
			</div>
			<div class="cate_item">
				<div class="tit_cate">Ứng viên theo tỉnh thành</div>
				<div class="main">
					<div class="search_cate">
					<i class="fa fa-search" aria-hidden="true"></i> <input type="text" data-type="uv" data-dt="city" class="keyword" placeholder="Nhập từ khóa ...">
					</div>
					<div class="list">
					<?
					foreach ($arrcity as $key => $value) {
					?>
					<a href="<?= rewriteCateUV($value['cit_id'],$value['cit_name'],0,0) ?>" class="item">Ứng viên tại <?=$value['cit_name']?> <span class="count_cate">(<?= $value['cit_count']?>)</span></a>
					<?
					}
					?>				
					</div>	
				</div>
			</div>
		</div>
	</div>
	<?
	if($show_new){
	?>
	 <div class="box_text_seo option2">
		<div class="menu">
        <? makeML($row_seo['seo_text'],'',''); ?>
        </div>
        <div class="content">
           <div class="nd"><?= makeML_content(str_replace('src=', 'class="lazyload" src="/images/load.gif" data-src=', $row_seo['seo_text']),'','') ?></div>
           <div class="read">
           	Xem thêm <i class="fa fa-angle-double-down" aria-hidden="true"></i>
           </div>
        </div>
	</div>
	<?
	}
	?>
	<div class="popup popup_CompanySignin hidden">
		<form onsubmit="return false">
			<div class="modal-header text-center pull-left width-100">
				Đăng nhập
				<i class="pull-right fa fa-times" aria-hidden="true"></i>
			</div>
			<div class="modal-body pull-left width-100">
				<div class="left">
					<p class="text-center note">Bạn cần đăng nhập để lưu và xem thông tin ứng viên này!</p>
					<div class="item email">
						<i class="icon"></i>
						<input type="text" id="email" placeholder="Nhập Email ...">
					</div>
					<div class="item password">
						<i class="icon"></i>
						<input type="password" id="password" placeholder="Nhập mật khẩu ...">
						<i class="fa fa-eye-slash" aria-hidden="true"></i>
					</div>
					<a class="forget_pass" href="/quen-mat-khau-nha-tuyen-dung.html">Quên mật khẩu?</a>
					<button type="submit" id="submit">Đăng nhập</button>
					<p class="question">Bạn chưa có tài khoản? <a href="/dang-ky-nha-tuyen-dung.html">Đăng ký ngay</a></p>
				</div>
				<div class="right">
					<img src="/images/bg_signin_candi.png" alt="BG đăng nhập">
					<a class="downLoad_signin timviec365" href="">
						<span class="trapezoid"></span><i class="fa fa-download" aria-hidden="true"></i>Tải app TIMVIEC365 ngay
					</a>
					<a class="downLoad_signin cv365" href="">
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
	<script async>
		$(document).ready(function(){
			$('.box_candinew .status').click(function(){
				e = $(this);
				if(e.hasClass('login')){
					$('.popup_CompanySignin').removeClass('hidden');
				}
				else{
					id_user = e.attr('data-id');
					$.ajax({
						type:"POST",
						url: "../ajax/luu_hoso.php",
						data:{
							id_uv: id_user
						},
						beforeSend:function(){
							if(e.hasClass('saved') == false){
								e.addClass('saved');
								e.html('<i class="fa fa-heart" aria-hidden="true"></i>Đã lưu');
							}else{
								e.removeClass('saved');
								e.html('<i class="fa fa-heart-o" aria-hidden="true"></i>Lưu');
							}
						},
						success:function(data){
						}
					});
				}
			});
		});
		$('.popup_CompanySignin #submit').click(function(){
			var user_name = $('.popup_CompanySignin #email');
			var password = $('.popup_CompanySignin #password');
			var e = $(this);
			if(user_name.val() == '' || password.val() == ''){
				if(e.hasClass('error') == false){
					e.addClass('error');
					$('.popup_CompanySignin .left .note').html("Vui lòng điền đầy đủ thông tin đăng nhập !!!");
				}
				return false;
			}
			$.ajax({
				type: "POST",
				url: "../ajax/login_ntd_popup.php",
				data:{
					user_name : user_name.val(),
					password : password.val()
				},
				beforeSend: function(){
                    e.val('Vui lòng đợi ...');
                },
				success:function(data)
				{
					if(data != 0)
						location.reload();
					else{
						if($('.popup_CompanySignin .left .note').hasClass('error') == false){
							$('.popup_CompanySignin .left .note').addClass('error');
						}
						$('.popup_CompanySignin .left .note').html("Thông tin xác thực tài khoản không đúng, vui lòng thử lại !!!");
						e.val('Đăng nhập');
					}
				}
			});
		});
	</script>
	</body>
</html>