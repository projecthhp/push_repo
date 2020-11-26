<?
include("config.php");

$page  = getValue('page','int','GET',1);
$page  = intval(@$page);
$sql = '';

$diadiem = getValue("city","int","GET",0);
$diadiem = (int)$diadiem;
$nganhnghe = getValue("cate","int","GET",0);

$orderby = '';
$show_chantrang = '';

if($diadiem != 0)
{
  $sql .= " AND FIND_IN_SET('".$diadiem."' , new_city)";
  $cit_name = $arrcity[$diadiem]['cit_name'];
}else{
  $cit_name = '';
}

if($nganhnghe != 0)
{
  $sql .= " AND (FIND_IN_SET('".$nganhnghe."' ,new_real_cate) OR FIND_IN_SET('".$nganhnghe."' , new_cat_id))";
  $cat_name = $db_cat[$nganhnghe]['cat_name'];
}else{
  $cat_name = '';
}

if($page == 0)
{
  $page = 1;
}
$curentPage = 12;
$pageab = abs($page - 1);
$start = $pageab * $curentPage;
$start = intval(@$start);
$start = abs($start);
$time = time();

$db_qr = new db_query("SELECT new.new_id,usc_id,new_money,new_city,new_cap_bac,new_create_time,usc_create_time,usc_logo,usc_company,new_title,new_nganh,usc_alias,new.new_han_nop,new_alias FROM new STRAIGHT_JOIN user_company ON new_user_id = user_company.usc_id WHERE new_active = 1 AND new_thuc = 1 AND new_nganh = 0 AND new_hot = 0 ".$sql."  ORDER BY new.new_id DESC,new.new_han_nop DESC LIMIT ".$start.",".$curentPage);
$numrow = new db_query("SELECT count(1) FROM new STRAIGHT_JOIN user_company ON new_user_id = user_company.usc_id WHERE new_active = 1 AND new_thuc = 1 AND new_nganh = 0 AND new_hot = 0 ".$sql." ");
$count = mysql_fetch_assoc($numrow->result);
$count = $count['count(1)'];
$url_query = '';
$urlcano = '';
if($page > 1)
{
  $trang = " - trang ".$page;
  $url_query = "?page=".$page;
}
else
{
  $trang = '';
}
$canonical =  $domain.rewriteCate($diadiem,$cit_name,$nganhnghe,$cat_name);

$breakcrumb = '';
if($nganhnghe != 0 && $diadiem == 0)
{
	$db_seo = new db_query("SELECT cat_title,cat_description,cat_keyword,cat_mota,cat_h1 FROM category WHERE cat_id = ".$nganhnghe);
	$row_seo = mysql_fetch_assoc($db_seo->result);
	if($row_seo['cat_title']!=''){
		$title = trim($row_seo['cat_title']);
	}else{
		$title = 'Tuyển dụng, tìm việc làm '.$cat_name.' mới nhất | Timviec365.com';
	}
	if($row_seo['cat_description']!=''){
		$description = trim($row_seo['cat_description']);
	}else{
		$description = 'Tuyển dụng, tìm việc làm '.$cat_name.' mới nhất, lương cao. Tổng hợp tin tuyển dụng '.$cat_name.' từ các công ty hàng đầu. Ứng tuyển ngay tại Timviec365.com';
	}
	if($row_seo['cat_keyword']!=''){
		$keyword_tt = $row_seo['cat_keyword'];
	}else{
		$keyword_tt = "Tìm việc làm ".$cat_name;
	}
	if($row_seo['cat_h1']!=''){
		$h1 = $row_seo['cat_h1'];
	}else{
		$arr_l = array('Tìm','tìm','tim','Việc','việc','làm','Làm','viec','làm','lam');
		$arr_r = array('','','','','','','','','','');
		$cat_name = str_replace($arr_l, $arr_r, $cat_name);
		$h1 = "Tìm việc làm ".$cat_name;
		if($nganhnghe==81){
			$h1 = "Việc làm giúp việc";
		}
		if($nganhnghe==3){
			$h1 = "Việc làm sinh viên làm thêm";
		}
	}
	$flag = 1;
	$seo_nd = $row_seo['cat_mota'];
	$show_chantrang = ($seo_nd != '')?1:"";
	$url = "/viec-lam-".replaceTitle($cat_name).'-l'.$nganhnghe.".html".$url_query;
}

else if($nganhnghe == 0 && $diadiem != 0)
{
 	$db_seo = new db_query("SELECT * FROM categories_des WHERE city_id = ".$diadiem);
	$row_seo = mysql_fetch_assoc($db_seo->result);
	if($row_seo['cit_title']!=''){
		$title = trim($row_seo['cit_title']);
	}else{
		$title = 'Tuyển dụng, tìm việc làm tại '.$cit_name.' mới nhất | Timviec365.com';
	}

	if($row_seo['cit_description']!=''){
		$description = trim($row_seo['cit_description']);
	}else{
		 $description = 'Tuyển dụng, tìm việc làm tại '.$cit_name.' mới nhất lương cao. Tổng hợp tin tuyển dụng '.$cit_name.' từ các công ty hàng đầu trên Timviec365.com';
	}

	if($row_seo['cit_keyword']!=''){
		$keyword_tt = $row_seo['cit_keyword'];
	}else{
		$keyword_tt = "Tìm việc làm tại ".$cit_name;
	}
	 
	  $h1 = "Tìm việc làm tại ".$cit_name;
	  $tt_bot = "Tìm việc làm theo tỉnh thành";
	  $flag = 2;
	  $seo_nd = $row_seo['cate_des'];
	  $show_chantrang = ($seo_nd != '')?1:"";
	  $url = "/viec-lam-tai-".replaceTitle($cit_name).'-c'.$diadiem.".html".$url_query;
}
else if($nganhnghe != 0 && $diadiem != 0)
{
	if(($nganhnghe >= 71 && $nganhnghe != 87) && !in_array($diadiem, array(1,45,48,26,2))){
		$url = $domain."/home/404.php";
		header("HTTP/1.1 301 Moved Permanently"); 
        header("Location: $url");
        exit();
	}
	$db_seo = new db_query("SELECT * FROM news_cate_city WHERE cat_id = $nganhnghe AND cit_id = $diadiem");
	$row_seo = mysql_fetch_assoc($db_seo->result);
	if($row_seo['meta_tit']!=''){
		$title = $row_seo['meta_tit'];
	}else{
		$title = 'Tuyển dụng, tìm việc làm '.$cat_name.' tại '.$cit_name.' | Timviec365.com';
	}
	
	if($row_seo['meta_des'] != ''){
		$description = $row_seo['meta_des'];
	}else{
		$description = 'Tuyển dụng, tìm việc làm '.$cat_name.' tại '.$cit_name.' mới nhất lương cao. Tổng hợp tin tuyển dụng '.$cat_name.' tại '.$cit_name.' từ các công ty hàng đầu trên Timviec365.com';
	}
	
	if($row_seo['meta_key']!=''){
		$keyword_tt = $row_seo['meta_key'];
	}else{
		$keyword_tt = "Tìm việc làm ".$cat_name.' tại '.$cit_name;
	}
	$seo_nd = $row_seo['meta_content'];
	$show_chantrang = ($seo_nd != '')?1:"";
	
	$h1 = "Tìm việc làm ".$cat_name.' tại '.$cit_name;
	if($nganhnghe == 87){
		$h1 = "Tìm việc làm thêm tại ".$cit_name;
	}
	$tt_bot = "Tìm việc làm ".$cat_name." tại tỉnh thành";
	$flag = 3;
		if(mysql_num_rows($db_qr->result) < 10){
        $cat_tags = $db_cat[$nganhnghe]['cat_tags'];
        $cat_ut = $db_cat[$nganhnghe]['cat_ut'];
        $sql_lq = '';
        if ($cat_ut != '') {
            $slq = explode(',', $cat_ut);
            $sql_lqs = array();
            foreach ($slq as $key => $value) {
            $sql_lqs[] = "new_title LIKE '%".trim($value)."%'" ;
            }
            $sql_lq = implode(' OR ',$sql_lqs);
        }
        else if ($cat_tags != '') {
            $slq = explode(',', $cat_tags);
            $sql_lqs = array();
            foreach ($slq as $key => $value) {
            $sql_lqs[] = "new_title LIKE '%".trim($value)."%'" ;
            }
            $sql_lq = implode(' OR ',$sql_lqs);
        }
        else{
            $sql_lq = "new_title LIKE '%".trim($db_cat[$nganhnghe]['cat_name'])."%'" ;
        }
        
        $db_lq = new db_query("SELECT new.new_id,usc_id,new_money,new_city,new_cap_bac,new_create_time,usc_create_time,usc_logo,usc_company,new_title,new_nganh,new_han_nop,usc_alias,new_alias FROM new STRAIGHT_JOIN user_company ON new_user_id = user_company.usc_id  WHERE new_active = 1 AND new_thuc = 1 AND ((".$sql_lq.") OR FIND_IN_SET('".$nganhnghe."',new_real_cate)) AND NOT FIND_IN_SET('".$nganhnghe."',new_cat_id) ORDER BY RAND() LIMIT 10");
    }
    $url = "/viec-lam-".replaceTitle($cat_name)."-tai-".replaceTitle($cit_name)."-c".$diadiem."l".$nganhnghe.".html".$url_query;
}

if($_SERVER['REQUEST_URI'] != $url){
	$url_check = $url;
	header("HTTP/1.1 301 Moved Permanently"); 
	header("Location: $url_check");
	exit();
}
$ogImage = GetImageOG($seo_nd);
$index = "noodp,index,follow";
$login = (isset($_COOKIE['UT']) && $_COOKIE['UT']==0)?"login":"";
?>
<!DOCTYPE html>
<html lang="vi" prefix="og: http://ogp.me/ns#" class="no-js">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link rel="canonical" href="<?= $canonical ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title><?=$title; ?></title>
		<meta name="description" content="<?=$description; ?>"/>
		<meta name="Keywords" content="<?=$keyword_tt; ?>"/>
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
		<meta property="og:title" content="<?=$title; ?>" />
		<meta property="og:description" content="<?=$description; ?>" />
		<meta property="og:site_name" content="Timviec365.com" />
		<meta property="og:image:url" content="<?=$ogImage?>" />
		<meta property="og:image:width" content="333" />
		<meta property="og:image:height" content="426" />

		<meta name="twitter:card" content="summary" />
		<meta name="twitter:description" content="<?=$description; ?>" />
		<meta name="twitter:title" content="<?=$title; ?>" />
		<meta name="twitter:image" content="<?=$ogImage?>" />
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

	</head>
	<body id="cate_job">
		<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
		<header>
			<? include('../includes/inc_header.php'); ?>
			<div id="banner">
				<? include('../includes/inc_search.php'); ?>
				<p class="taingay text-center">Tải ngay ứng dụng timviec365 và cv365+ trên điện thoại để trải nghiệm tốt nhất</p>
				<div class="text-center">
					<a rel="nofollow" class="text-left downLoad_App Timviec365" href="/ung-dung-tim-viec-lam.html"><i class="icon"></i>Tải app Timviec365</a>
					<a rel="nofollow" class="text-left downLoad_App CV365" href="/ung-dung-tao-cv.html"><i class="icon"></i>Tải app CV365</a>
				</div>
			</div>
		</header>
		<div class="breakcrumb">
			<ul>
				<li><a href="/">Trang chủ</a></li>
				<li class="active"><span><?= $h1 ?></span></li>
			</ul>
		</div>
		<? 
		$db_ghim = new db_query("SELECT new_title, usc_logo, usc_create_time,new_money,usc_company,new_id FROM new JOIN user_company ON user_company.usc_id = new.new_user_id WHERE 1 ".$sql." AND new_active = 1 AND new_over_cate > ".$time." AND (new_hot = 1 OR new_nganh = 1 OR new_gap = 1) ");
		if(mysql_num_rows($db_ghim->result) > 0){
		?>
		<div class="catejob_hot">
			<div class="tit">
				<div class="ir">
					<i class="ico"></i><p class="heading">Công ty tuyển dụng hàng đầu</p>
				</div>
			</div>
			<div class="main_hot">
				<?
				while($row = mysql_fetch_assoc($db_ghim->result)){
				?>
				<div class="item">
					<div class="img_banner"><img src="/images/load.gif" class="lazyload" data-src="/images/banner_err_cate.png" alt="Banner Company"></div>
					<div class="content_bottom">
						<div class="logo_com">
							<img src="/images/load.gif" class="lazyload" data-src="<?= str_replace('../', $domain.'/', geturlimageAvatar($row['usc_create_time']).$row['usc_logo'])?>" alt="<?= $row['usc_company'] ?>">
						</div>
						<div class="content">
							<p class="name_com"><?= name_company($row['usc_company']) ?></p>
							<p class="new_title"><?= $row['new_title'] ?></p>
							<p class="money">Lương: <?= $array_muc_luong[$row['new_money']]?></p>
							<a href="<?= rewriteNews($row['new_id'],$row['new_title'],$row['new_alias']) ?>">Xem việc làm</a>
						</div>
					</div>
				</div>
				<?
				}
				unset($row);
				?>
			</div>
		</div>
		<?
		}
		?>
		<div class="box_catejob_new">
			<div class="main">
				<div class="tit tit2">
					<div class="ir">
						<i class="ico"></i><h1 class="heading"><?=$h1?></h1>
					</div>
				</div>
				<div class="main_option2">
					<?
					While($row = mysql_fetch_assoc($db_qr->result)){
					?>
					<div class="item">
						<div class="logo">
							<img onerror='this.onerror=null;this.src="/images/logo-new.png";' src="/images/load.gif" class="lazyload" data-src="<?= str_replace('../', $domain.'/', geturlimageAvatar($row['usc_create_time']).$row['usc_logo'])?>" alt="<?= $row['usc_company'] ?>">
						</div>
						<div class="content-right">
							<div class="left">
								<a href="<?= rewriteNews($row['new_id'],$row['new_title'],$row['new_alias']) ?>" >
								<h2 class="title_new"><?= $row['new_title'] ?></h2></a>
								<a href="<?= rewrite_company($row['usc_id'],$row['usc_company'],$row['usc_alias']) ?>" class="name_company"><?= name_company($row['usc_company']) ?></a>
							</div>
							<div class="right">
								<p class="p_dd"><i class="fa fa-map-marker" aria-hidden="true"></i> 
								<?
			                    $arr_city = explode(',', $row['new_city']);
			                    $new_city = [];
			                    foreach ($arr_city as $key => $val) {
			                        $new_city[] = $arrcity[$val]['cit_name'];
			                    }
			                    $new_city = implode(', ', $new_city);
			                    echo $new_city;
			                    ?>
								</p>
								<p class="p_salary"><i class="salary"></i> <?= $array_muc_luong[$row['new_money']]?></p>
								<!-- <p class="p_time"><i class="time"></i><?= date('d/m/Y',$row['new_han_nop']) ?></p> -->
							</div>
						</div>
					</div>
					<?
					}
					unset($row);
					?>
				</div>
			</div>
			<div class="pagination_wrap text-center clr">
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
		<div class="op_right">
			<div class="slide_cate_cv">
			   	<?
				   	if($nganhnghe == 0 && $diadiem!=0){
					   	$text = "Mẫu CV xin việc";
					   	$sql = "SELECT * FROM nganhcv JOIN samplecv ON nganhcv.id = samplecv.idnganh ORDER BY samplecv.timecreated DESC";
				   	}else{
				   		$arr_l = array('Tìm','tìm','tim','Việc','việc','làm','Làm','viec','làm','lam');
						$arr_r = array('','','','','','','','','','');
						$cat_name = str_replace($arr_l, $arr_r, $cat_name);
						$cat_name = str_replace('-', ' ', $cat_name);
						$cat_name = str_replace('  ', '', $cat_name);
						$catname = str_replace(' ', "%' AND nganhcv.name LIKE '%", $cat_name);
				   		$text = "Mẫu cv xin việc ngành $cat_name";
				   		$sql = "SELECT * FROM nganhcv JOIN samplecv ON nganhcv.id = samplecv.idnganh WHERE nganhcv.name LIKE '%".trim($catname)."%' ";
				   		$check = new db_query($sql);
				   		if(mysql_num_rows($check->result)==0){
				   			$text = "Mẫu CV xin việc";
				   			$sql = "SELECT * FROM nganhcv JOIN samplecv ON nganhcv.id = samplecv.idnganh ORDER BY samplecv.timecreated DESC";
				   		}
				   	}
				   	$get_cv = new db_query($sql);
				?>
					<p class="title_cate_cv"><?=$text?></p>
					<div class="main_cate_cv">
				<?
				   	while($row_cv = mysql_fetch_assoc($get_cv->result)){
				?>
					<div class="item">
		   				<div class="parent">
		   					<div class="child">
		   						<!-- <a href="" class="xemtruoc">Xem trước</a> -->
		   						<a rel="nofollow" <?= ($login != '')?'href="'.rewriteCreateCV($row_cv['alias'],$row_cv['id']).'"':'onclick="func_login(`'.$row_cv['alias'].'`)"' ?> class="use">Sử dụng mẫu này</a>
		   					</div>
		   					<img class="lazyload" src="/images/load.gif" data-src="../upload/maucv/<?=$row_cv['alias']."/".$row_cv['image']?>" alt="<?=$row_cv['name']?>">
		   				</div>
		   			</div>
				<?
				   	}
				   	unset($text,$sql,$get_cv,$check);
			   	?>
			   		</div>
			</div>
			<div class="banner">
				<a href="/mau-cv.html" class="main"></a>
			</div>
			<!-- <div class="cate_qt">
				<div class="tit tit2">
					<div class="ir">
						<p class="heading">Ngành nghề có thể bạn quan tâm</p>
					</div>
				</div>
				<div class="main">	
					<a href="" rel="nofollow" class="item">Việc làm bán hàng</a>
					<a href="" rel="nofollow" class="item">Việc làm Marketing - PR</a>
					<a href="" rel="nofollow" class="item">Việc làm Quản trị kinh doanh</a>
					<a href="" rel="nofollow" class="item">Việc làm Phát triển thị trường</a>
					<a href="" rel="nofollow" class="item">Việc làm Kinh doanh bất động sản</a>
				</div>
			</div> -->
		</div>
		<?
		if($nganhnghe != 0 && $diadiem != 0 && isset($db_lq)){
			if(mysql_num_rows($db_lq->result)>0){
		?>
		<div class="box_catelq">
			<div class="tit">
				<div class="ir">
					<i class="ico"></i><p class="heading">Tin tuyển dụng <?=$cat_name?> liên quan</p>
				</div>
			</div>
			<div class="main_option1">
				<?
				while ($row = mysql_fetch_assoc($db_lq->result)) { 
				?>
				<div class="item">
					<a class="logo">
						<img onerror='this.onerror=null;this.src="/images/logo-new.png";' src="/images/load.gif" class="lazyload" data-src="<?= str_replace('../', $domain.'/', geturlimageAvatar($row['usc_create_time']).$row['usc_logo'])?>" alt="<?= $row['usc_company'] ?>">
					</a>
					<div class="right_item">
						<a href="<?= rewriteNews($row['new_id'],$row['new_title']) ?>" class="title_new"><?= $row['new_title'] ?></a>
						<a href="<?= rewrite_company($row['usc_id'],$row['usc_company'],$row['usc_alias']) ?>" class="name_company"><?= name_company($row['usc_company']) ?></a>
						<p class="p_dd"><i class="fa fa-map-marker" aria-hidden="true"></i>
						<?
	                    $arr_city = explode(',', $row['new_city']);
	                    $new_city = [];
	                    foreach ($arr_city as $key => $val) {
	                        $new_city[] = $arrcity[$val]['cit_name'];
	                    }
	                    $new_city = implode(', ', $new_city);
	                    echo $new_city;
	                    ?>
						</p>
						<p class="p_salary"><i class="salary"></i><?= $array_muc_luong[$row['new_money']]?></p>
						<p class="p_time"><i class="time"></i><?= date('d/m/Y',$row['new_han_nop']) ?></p>
					</div>
				</div>
				<?
				}
				?>
				</div>
		</div>
		<?
			}
		}
		?>
		<div class="slide_cate_cv slide_cate_cv2">
	   	<?
		   	if($nganhnghe == 0 && $diadiem!=0){
			   	$text = "Mẫu CV xin việc";
			   	$sql = "SELECT * FROM nganhcv JOIN samplecv ON nganhcv.id = samplecv.idnganh ORDER BY samplecv.timecreated DESC";
		   	}else{
				$url = '/mau-cv.html';
		   		$arr_l = array('Tìm','tìm','tim','Việc','việc','làm','Làm','viec','làm','lam');
				$arr_r = array('','','','','','','','','','');
				$cat_name = str_replace($arr_l, $arr_r, $cat_name);
				$cat_name = str_replace('-', ' ', $cat_name);
				$cat_name = str_replace('  ', '', $cat_name);
				$catname = str_replace(' ', "%' AND nganhcv.name LIKE '%", $cat_name);
		   		$text = "Mẫu cv xin việc ngành $cat_name";
		   		$sql = "SELECT * FROM nganhcv JOIN samplecv ON nganhcv.id = samplecv.idnganh WHERE nganhcv.name LIKE '%".trim($catname)."%' ";
		   		$check = new db_query($sql);
		   		if(mysql_num_rows($check->result)==0){
		   			$text = "Mẫu CV xin việc";
		   			$sql = "SELECT * FROM nganhcv JOIN samplecv ON nganhcv.id = samplecv.idnganh ORDER BY samplecv.timecreated DESC";	
		   		}
		   	}
		   	$get_cv = new db_query($sql);
		?>
		<div class="tit">
			<div class="ir">
				<i class="ico"></i><p class="heading"><?=$text?></p>
			</div>
		</div>
   		<div class="main_cate_cv2 main">
	   		<?
			   	while($row_cv = mysql_fetch_assoc($get_cv->result)){
			?>
			<div class="item">
				<div class="parent">
					<div class="child">
						<!-- <a href="" class="xemtruoc">Xem trước</a> -->
						<a rel="nofollow" <?= ($login != '')?'href="'.rewriteCreateCV($row_cv['alias'],$row_cv['id']).'"':'onclick="func_login(`'.$row_cv['alias'].'`)"' ?> class="use">Sử dụng mẫu này</a></div>
					<img class="lazyload" src="/images/load.gif" data-src="../upload/maucv/<?=$row_cv['alias']."/".$row_cv['image']?>" alt="<?=$row_cv['name']?>">
				</div>
			</div>
	   		<?
	   		}
	   		unset($text,$sql,$get_cv,$check);
	   		?>
   		</div>
	   	</div>
	   <div class="cate_show_all pull-right text-center">
			<a href="/mau-cv.html" title="Xem tất cả mẫu CV xin việc">Xem tất cả mẫu CV xin việc <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
	   </div>
		<?
		if($show_chantrang == 1){
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
        <?   
    	}
        ?>
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
	</body>
	<script>
	$(document).ready(function(){
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
		width = $(window).width();
		if(width <= 1024 && width >= 768){
			$('.main_hot').slick({
				infinite:true,
				slidesToShow:3,
				slidesToScroll:3,
				autoplay:false,
				speed:1000
			});
			$('.main_cate_cv2').slick({
				infinite:true,
				slidesToShow:3,
				slidesToScroll:3,
				autoplay:true,
				speed:1000
			});
		}
		else if($(window).width() <= 480){
			$('.main_cate_cv2').slick({
				infinite:true,
				slidesToShow:1,
				slidesToScroll:1,
				autoplay:false,
				speed:1000
			});
			$('.main_hot').slick({
				infinite:true,
				slidesToShow:1,
				slidesToScroll:1,
				autoplay:false,
				speed:1000
			});
		}
		else{
			$('.main_cate_cv').slick({
				infinite:true,
				slidesToShow:1,
				slidesToScroll:1,
				autoplay:false,
				speed:1000
			});
			$('.main_cate_cv2').slick({
				infinite:true,
				slidesToShow:5,
				slidesToScroll:5,
				autoplay:true,
				speed:500
			});
		}
	});
	function func_login(alias){
		url = "/tao-cv-online/"+alias+".html";
		$('.popup_CompanySignin').removeClass('hidden').hide().show('slow');
		$('.popup_CompanySignin #submit').attr('data-href',url);
	}
	</script>
</html>