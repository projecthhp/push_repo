<?
	include('../home/config.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>Thông tin ứng viên</title>
		<meta name="descripton" content="Đăng ký ứng viên. Tìm việc làm nhanh chóng, hiệu quả nhất,  đăng tin tìm việc làm tốt 24h, tuyển dụng việc làm tất cả ngành nghề nhanh nhất, tìm kiếm việc làm tại Timviec365.vn"/>
		<meta name="Keywords" content="tim viec lam, viec lam nhanh, tìm việc làm nhanh, tuyển dụng việc làm, tuyen dung, kiem viec lam, tim viec lam, tim viec">
		<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui">
		<meta name="robots" content="noodp,noindex,nofollow"/>
		<link rel="stylesheet" href="/css/slick-theme.css" media='all' onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/slick.css" media='all' onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/font-awesome.min.css" media='all' onload="if(media!='all')media='all'">
		<link rel="stylesheet" href="/css/style_candi_manager.css?v=<?= $version ?>" media='all' onload="if(media!='all')media='all'">
		<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PQGTCFD');</script>
<!-- End Google Tag Manager -->
	</head>
	<body class="manager">
		<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<? include('../includes/inc_menu_uv.php') ?>
<div class="main_right">
	<? include('../includes/inc_header_candi_manager.php') ?>
	<div class="main_qlc main">
		<div class="box_thongso main">
			<div class="item">
				<img src="/images/icon365_manager/img_ts_ut.png" alt="Thông số ứng tuyển">
				<?
				$db_qrs = new db_query('SELECT count(1) FROM nop_ho_so WHERE nhs_use_id = '.$row['use_id']);
				$result = mysql_fetch_assoc($db_qrs->result);
				$result = $result['count(1)'];
				?>
				<p class="ts"><? echo $result;unset($db_qrs,$result)?></p>
				<p class="text">Đã ứng tuyển</p>
			</div>
			<div class="item">
				<img src="/images/icon365_manager/img_ts_vlph.png" alt="Thông số ứng tuyển">
				<?
				$arr_nn = explode(',', $row['use_nganh_nghe']);
				$arr_tt = explode(',',$row['use_district_job']);
				$db_qrs = new db_query("SELECT count(1) FROM new WHERE 1 AND FIND_IN_SET('".$arr_nn[0]."',new_cat_id) AND FIND_IN_SET('".$arr_tt[0]."',new_city) ");
				$result = mysql_fetch_assoc($db_qrs->result);
				$result = $result['count(1)'];
				?>
				<p class="ts"><? echo $result;unset($db_qrs,$result)?></p>
				<p class="text">Việc làm phù hợp</p>
			</div>
			<div class="item">
				<img src="/images/icon365_manager/img_ts_cv.png" alt="Thông số ứng tuyển">
				<?
				$db_qrs = new db_query("SELECT count(1) FROM savecandicv WHERE 1 AND iduser = ".$row['use_id']);
				$result = mysql_fetch_assoc($db_qrs->result);
				$result = $result['count(1)'];
				?>
				<p class="ts"><? echo $result;unset($db_qrs,$result)?></p>
				<p class="text">Mẫu CV đã tạo</p>
			</div>
			<div class="item">
				<img src="/images/icon365_manager/img_ts_view.png" alt="Thông số ứng tuyển">
				<p class="ts"><? echo $row['use_view_count']?></p>
				<p class="text">NTD xem hồ sơ</p>
			</div>
		</div>
		<div class="box_item job">
			<div class="header main">
				<div class="heading">
				Việc làm phù hợp
				</div>
			</div>
			<div class="main_job main slick">
				<?
				$db_qrs = new db_query("SELECT new_id,new_title,new_alias, usc_id,usc_company,usc_alias,new_money,new_han_nop,usc_create_time,usc_logo FROM new JOIN user_company ON new.new_user_id = usc_id WHERE 1 AND FIND_IN_SET('".$arr_nn[0]."',new_cat_id) AND FIND_IN_SET('".$arr_tt[0]."',new_city) ORDER BY new_hot DESC, new_id DESC,new_han_nop DESC LIMIT 30");
				$i=1;
				?>
				<div class="main">	
					<?
					While ($item = mysql_fetch_assoc($db_qrs->result)) {
					?>
					<div class="item">
						<div class="images">
							<img src="/images/load.gif" class="lazyload" data-src="<?= str_replace('../', $domain.'/', geturlimageAvatar($item['usc_create_time']).$item['usc_logo'])  ?>" onerror='this.onerror=null;this.src="/images/logo-new.png";' alt="<?= $item['usc_company'] ?>">
						</div>
						<div class="content_right">
							<a href="<?= rewriteNews($item['new_id'],$item['new_title'],$item['new_alias']) ?>" class="title_new"><?=$item['new_title']?></a>
							<a href="<?= rewrite_company($item['usc_id'],$item['usc_company'],$item['usc_alias']) ?>" class="company_name"><?= name_company($item['usc_company']) ?></a>
							<p class="money">
								<i class="icon"></i>
								<?= $array_muc_luong[$item['new_money']]?>
							</p>
							<p class="times">
								<i class="icon"></i>
								<?= date('d/m/Y',$item['new_han_nop']) ?>
							</p>
						</div>
					</div>
					<?
					if($i % 6 == 0 && $i != 30) echo '</div><div class="main">';
					$i++;
					}
					unset($db_qrs,$item,$i);
					?>
				</div>
			</div>
		</div>
		<div class="box_item cv">
			<div class="header main">
				<div class="heading">
				Danh sách cv của tôi
				</div>
			</div>
			<div class="main_cv main">
				<?
				$db_qrs = new db_query("SELECT savecandicv.*,alias FROM savecandicv INNER JOIN samplecv ON savecandicv.idcv = samplecv.id WHERE iduser = '".$_COOKIE['UID']."' ORDER BY savecandicv.id DESC LIMIT 2");
				While ($item = mysql_fetch_assoc($db_qrs->result)) { 
				?>
				<div class="item_cv">
					<img src="/images/load.gif" class="lazyload" data-src="../upload/cv_uv/uv_<?=$_COOKIE['UID']?>/<?=$item['name_cv']?>" alt="">
					<div class="overlay">
						<a class="item">Xem trước</a>
						<a href="<?=rewriteCreateCV($item['alias'],$item['id'])?>" class="item">Chỉnh sửa</a>
						<a class="item">CV đại diện</a>
						<a href="../download-cvpdf/cv.php?idcv=<?=$item['idcv']?>&iduser=<?=$item['iduser']?>&cvname=<?=$item['alias']?>" class="item" download>Tải xuống</a>
						<a onclick="delFile(<?=$item['id']?>)" class="item">Xóa CV</a>
					</div>
				</div>
				<?
				}
				unset($db_qrs,$item);
				?>
			</div>
			<div class="text-center main">
				<a href="/ung-vien/cv-xin-viec.html" class="showMore">Xem tất cả <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
			</div>
		</div>
		<div class="box_item cv dexuat">
			<div class="header main">
				<div class="heading">
				Mẫu cv đề xuất
				</div>
			</div>
			<div class="main_cv main">
				<div class="cv_dexuat">
					<?
					$db_qrs = new db_query("SELECT * FROM samplecv WHERE status = 1 ORDER BY serial DESC, id DESC LIMIT 20");
					$i = 1;
					?>
					<div class="item_dexuat">
						<?
						While ($item = mysql_fetch_assoc($db_qrs->result)) {
						?>
						<div class="item_cv">
							<img src="/images/load.gif" class="lazyload" data-src="https://timviec365.com/upload/maucv/<?=$item['alias']."/".$item['image']?>" alt="<?=$item['name']?>" title="<?=$item['name']?>">
							<div class="overlay">
								<a class="item">Xem trước</a>
								<a href="<?=rewriteCreateCV($item['alias'],$item['id'])?>" class="item">Dùng mẫu này</a>
							</div>
						</div>
						<?
						if($i % 2 == 0 && $i != 20) echo '</div><div class="item_dexuat">';
						$i++;
						}
						?>
					</div>
				</div>
			</div>
			<div class="text-center main">
				<a href="/mau-cv.html" class="showMore">Xem tất cả <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
			</div>
		</div>
		<div class="box_item camnang main">
			<div class="header main">
				<div class="heading">
				Cẩm nang tìm việc
				</div>
			</div>
			<div class="main_cn main">
				<?
				$db_qrs = new db_query("SELECT new_id, new_title,new_title_rewrite,new_picture FROM news ORDER BY new_id DESC LIMIT 4");
				While ($item = mysql_fetch_assoc($db_qrs->result)) {
					if($item['new_title_rewrite']!=''){
						$title_new = $item['new_title_rewrite'];
					}else{
						$title_new = replaceTitle($item['new_title']);
					}
				
				?>
				<div class="item">
					<div class="images">
						<img src="https://timviec365.com/pictures/news/<?=$item['new_picture']?>" alt="">
					</div>
					<a class="title_blog" href="<?=rewriteBlog($item['new_id'],$title_new)?>"><?=$item['new_title']?></a>
				</div>
				<?}?>
			</div>
			<div class="text-center main">
				<a href="/blog" class="showMore">Xem tất cả <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
			</div>
		</div>
		<? include('../includes/inc_chuyenvienmb.php') ?>
	</div>
</div>
<?
	include('../includes/inc_footer.php');
	include('../includes/inc_script_footer.php');
?>
<script src="/js/js_manager_uv.js?v=<?=$version?>"></script>
<script>
	$(document).ready(function(){
		$('.slick').slick();
		$('.cv_dexuat').slick({
			autoplay: true,
			autoplaySpeed: 2000,
		});
	});
</script>
<script src="/js/update_uv.js?v=<?=$version?>"></script>
</body>