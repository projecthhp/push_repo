<? 
include("config.php"); 
$diadiem = getValue("diadiem","int","GET",0);
$nganhnghe = getValue("nganhnghe","int","GET",0);
$keyword = getValue("keyword","str","GET","");

$ht = getValue('ht','int','GET',0);
$ht = (int)$ht;
$hv = getValue('hv','str','GET','');
$hv   = (int)$hv;
$cb = getValue('cb','int','GET',0);
$cb   = (int)$cb;
$kn = getValue('kn','int','GET',0);
$kn   = (int)$kn;
$qh = getValue('qh','int','GET',0);
$qh   = (int)$qh;
$gt = getValue('gt','int','GET',0);
$gt   = (int)$gt;
$ml = getValue('ml','int','GET',0);
$ml   = (int)$ml;
$capnhat = getValue('capnhat','int','GET',0);
$capnhat = (int)$capnhat;
$sql = '';
$tt = 'Kết quả tìm kiếm ';

// if($keyword == "" && $diadiem == 0 && $nganhnghe == 0){
//    $url = "/ung-vien-tim-viec.html";
//    header("HTTP/1.1 301 Moved Permanently"); 
//    header("Location: $url");
//    exit(); 
// }

$sql = '';
$diadiem = (int)$diadiem;
if($diadiem != 0)
{
   $sql .= " AND FIND_IN_SET('".$diadiem."' , use_district_job)";
   $cit_name = $arrcity[$diadiem]['cit_name'];
}else{
   $cit_name = '';
}

$nganhnghe = (int)$nganhnghe;
if($nganhnghe != 0)
{
   $sql .= " AND FIND_IN_SET('".$nganhnghe."' , use_nganh_nghe)";
   $cat_name = $db_cat[$nganhnghe]['cat_name'];
}else{
   $cat_name = '';
}

$tt = '';
$keyword = str_replace("-"," ",$keyword);
$keyword = replaceMQ(trim($keyword));
$keysearch = str_replace(" ","%",$keyword);
if($keyword != '') $sql .= " AND use_job_name LIKE '%".$keysearch."%'" ;
if($ht != 0) $sql .= " AND work_option = $ht";
if($hv != ''){}
if($cb != 0) $sql .= " AND cap_bac_mong_muon = $cb";
if($kn != '') $sql .= " AND exp_years = $kn";
if($gt != 0) $sql .= " AND gender = $gt";
if($qh != 0) $sql .= " AND use_district = $qh";
if($ml != 0) $sql .= " AND salary = $ml";
if($capnhat != 0){
	if($capnhat == 1){

	}
}

$page  = getValue('page','int','GET',1);
$page  = intval(@$page);

if($page == 0)
{
   $page = 1;
}
$curentPage = 30;
$pageab = abs($page - 1);
$start = $pageab * $curentPage;
$start = intval(@$start);
$start = abs($start);

$db_qr = new db_query("SELECT * FROM user WHERE use_id <> '' AND use_job_name <> '' ".$sql." AND use_show = 1  AND usc_search = 1  ORDER BY use_update_time DESC LIMIT ".$start.",".$curentPage);

$numrow = new db_query("SELECT count(1) FROM user WHERE use_id <> '' AND use_job_name <> '' ".$sql." AND use_show = 1  AND usc_search = 1 "); 
$count = mysql_fetch_assoc($numrow->result);
$count = $count['count(1)'];

$urlcano = '';

if($page > 1)
{
   $trang = " - trang ".$page;
}
else
{
   $trang = '';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
      <link rel="canonical" href="<?= $domain ?>" />
	<meta name="p:domain_verify" content=""/>
	<link href="" rel="shortcut icon"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>Kết quả tìm kiếm ứng viên</title>
	<meta name="description" content="Kết quả tìm kiếm ứng viên"/>
	<meta name="Keywords" content="Kết quả tìm kiếm ứng viên"/>
	<meta name="robots" content="noodp,noindex,nofollow"/>
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Kết quả tìm kiếm ứng viên" />
	<meta property="og:description" content="Kết quả tìm kiếm ứng viên" />
	<meta property="og:site_name" content="Tìm ứng viên" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:description" content="Kết quả tìm kiếm ứng viên" />
	<meta name="twitter:title" content="Kết quả tìm kiếm ứng viên" />

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
<body id="search_uv">
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<header>
		<? include('../includes/inc_header.php'); ?>
		<div id="banner">
			<? include('../includes/inc_search_uv.php') ?>
			<p class="taingay text-center">Tải ngay ứng dụng timviec365 và cv365+ trên điện thoại để trải nghiệm tốt nhất</p>
			<div class="text-center">	
				<a class="downLoad_App Timviec365" href="/ung-dung-tim-viec-lam.html" rel="nofollow"><i class="icon"></i>Tải app Timviec365</a>
				<a class="downLoad_App CV365" href="/ung-dung-tao-cv.html" ref="nofollow"><i class="icon"></i>Tải app CV365</a>
			</div>
		</div>
		
	</header>
	<div class="box_maincandi">	
		<div class="box_candinew">
			<div class="title">Kết quả tìm kiếm</div>
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
						<img class="lazyload <?= ($row['use_logo']!='')?"notnull":"" ?>" onerror='this.onerror=null;this.src="<?=$src_err?>"' src="/images/load.gif" data-src="<?= ($row['use_logo']!='')?geturlimageAvatar($row['use_create_time']).$row['use_logo']:$src_err ?>">
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
						echo time_elapsed_string($time_update);
						?>
						</p>
						<p class="for_mb">
							<?=$status?>
						</p>
					</div>
				</div>
				<?
				}
				?>
			</div>
			<div class="pagination_wrap text-center clr">
				<div class="clr">
				<?
				$urlcano = $_SERVER['REQUEST_URI'];
				$urlcano = str_replace("?page=".$page, "", $urlcano);
				$urlcano = str_replace("&page=".$page, "", $urlcano);
				$urlcano = str_replace("page=".$page, "", $urlcano);
				echo generatePageBar2('',$page,$curentPage,$count,$urlcano,'?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
				unset($db_qr,$row,$arr_city);
				?>
				</div>
			</div>
		</div>
	</div>
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
					<a class="forget_pass" href="">Quên mật khẩu?</a>
					<input type="submit" id="submit" value="Đăng nhập">
					<p class="question">Bạn chưa có tài khoản? <a href="">Đăng ký ngay</a></p>
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
				if($(this).hasClass('login')){
					$('.popup_CompanySignin').removeClass('hidden');
				}
				else{
					e = $(this);
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