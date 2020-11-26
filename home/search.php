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

if($ht != 0)
{
	$sql .= " AND FIND_IN_SET('".$ht."', new_hinh_thuc)";
}
if($hv != 0)
{
	$sql .= " AND FIND_IN_SET('".$hv."', new_bang_cap)";
}
if($cb != 0)
{
	$sql .= " AND FIND_IN_SET('".$cb."', new_cap_bac)";
}
if($kn != 0)
{
	$sql .= " AND FIND_IN_SET('".$kn."', new_exp)";
}
if($qh != 0)
{
	$sql .= " AND ((usc_address LIKE '%".str_replace("'", '', $db_district[$qh]['cit_name'])."%' AND usc_city = '".$diadiem."') OR usc_district = $qh OR new_qh_id = $qh)";
}
if($gt != 0)
{
	$sql .= " AND FIND_IN_SET('".$gt."', new_gioi_tinh)";
}
if($ml != 0)
{
	$sql .= " AND FIND_IN_SET('".$ml."', new_money)";
}
$diadiem = (int)$diadiem;
$nganhnghe = (int)$nganhnghe;

$keysearch = str_replace(" - ", " ", $keyword);
$keysearch = str_replace("-"," ",$keysearch);
$keysearch = replaceMQ(trim($keysearch));

$arr_l = array('Tìm','tìm','tim','Việc','việc','làm','Làm','viec','làm','lam');
$arr_r = array('','','','','','','','','','');
$keysearch = str_replace($arr_l, $arr_r, $keysearch);
$keysearch = trim($keysearch);
// $keysearch = str_replace(" ","%' AND new_title LIKE '%",$keysearch);
$keysearch = str_replace(" ","%",$keysearch);
if($keyword != '')
{
	$sql .= " AND new_title LIKE '%".$keysearch."%'" ;
	$tt .= $keyword;
}
if($nganhnghe != 0){
	$sql .= "AND FIND_IN_SET('".$nganhnghe."' , new_cat_id)"; 
}
if($diadiem != 0)
{
	$sql .= " AND FIND_IN_SET('".$diadiem."' , new_city)";
	$cit_name = $arrcity[$diadiem]['cit_name'];
}else{
	$cit_name = '';
}
if($keyword == "" && $diadiem == 0 && $ht == 0 && $hv == 0 && $cb == 0 && $kn == 0 && $qh == 0 && $gt == 0 && $ml == 0){
	$url = "https://timviec365.com";
	header("HTTP/1.1 301 Moved Permanently"); 
	header("Location: $url");
	exit(); 
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

$db_qr = new db_query("SELECT new.new_id,user_company.usc_id,new.new_money,new.new_city,new.new_cap_bac,new.new_create_time,user_company.usc_create_time,user_company.usc_logo,user_company.usc_company,new.new_title,new.new_nganh,user_company.usc_alias,new.new_han_nop,new_alias FROM new STRAIGHT_JOIN user_company ON new.new_user_id = user_company.usc_id WHERE 1 ".$sql." ORDER BY new.new_update_time DESC LIMIT ".$start.",".$curentPage);
$numrow = new db_query("SELECT count(1) FROM new STRAIGHT_JOIN user_company ON new_user_id = user_company.usc_id WHERE 1 ".$sql." "); 
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
<html lang="en-US" prefix="og: http://ogp.me/ns#" class="no-js">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<link rel="canonical" href="<?= $domain ?>" />
	<meta name="p:domain_verify" content=""/>
	<link href="" rel="shortcut icon"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title><?= $tt ?></title>
	<meta name="description" content="<?=$tt ?>"/>
	<meta name="Keywords" content="<?=$tt ?>"/>
	<meta name="robots" content="noodp,noindex,nofollow"/>
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?=$tt ?>" />
	<meta property="og:description" content="<?=$tt ?>" />
	<meta property="og:site_name" content="Tìm việc làm" />
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:description" content="<?=$tt ?>" />
	<meta name="twitter:title" content="<?=$tt ?>">
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
				<a class="downLoad_App Timviec365" href="/ung-dung-tim-viec-lam.html"><i class="icon"></i>Tải app Timviec365</a>
				<a class="downLoad_App CV365" href="/ung-dung-tao-cv.html"><i class="icon"></i>Tải app CV365</a>
			</div>
		</div>
	</header>
	<div class="box_hd">
		<div class="main">
			<div class="title text-center">
				Kết quả tìm kiếm
			</div>
			<div class="main_option1">
					<?
					while ($row = mysql_fetch_assoc($db_qr->result)) {
					?>
					<div class="item">
						<a class="logo">
							<img src="/images/load.gif" class="lazyload" data-src="<?= str_replace('../', $domain.'/', geturlimageAvatar($row['usc_create_time']).$row['usc_logo'])  ?>" onerror='this.onerror=null;this.src="/images/logo-new.png";' alt="<?= $row['usc_company'] ?>">
						</a>
						<div class="right_item">
							<a href="<?= rewriteNews($row['new_id'],$row['new_title'],$row['new_alias']) ?>" class="title_new"><?= $row['new_title'] ?></a>
							<a href="<?= rewrite_company($row['usc_id'],$row['usc_company'],$row['usc_alias']) ?>" class="name_company"><?= name_company($row['usc_company']) ?></a>
							<p class="p_salary"><i class="salary"></i><?= $array_muc_luong[$row['new_money']]?></p>
							<p class="p_time"><i class="time"></i><?= date('d/m/Y',$row['new_han_nop']) ?></p>
						</div>
					</div>
					<?}?>
				</div>
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
	</div>
		</div>
		<? 
			include('../includes/inc_footer.php');
			include('../includes/inc_script_footer.php') 
		?>
	</body>
</html>