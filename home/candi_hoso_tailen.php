<?
	include('../home/config.php');
	$submit = getValue('submit','str','POST','');
	
	if($submit!='' && isset($_FILES['file'])){
		$time = time();

		$path = "../upload/uv/";
		$allowTypes = array('jpg','png','jpeg','gif','jfif','PNG');
		$type = pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION);
		$path_tmp = $_FILES['file']['tmp_name'];
		$file_name = $_FILES['file']['name'];
		$file_name = reset(explode('.', $file_name));

		if(in_array($type, $allowTypes))
		{
			$year = date('Y',$time);
			$month =  date('m',$time);
			$day = date('d',$time);

			if(!file_exists($path.$year))
			{
				mkdir($path.$year);
			}
			if(!file_exists($path.$year.'/'.$month))
			{
				mkdir($path.$year.'/'.$month);
			}
			if(!file_exists($path.$year.'/'.$month.'/'.$day))
			{
				mkdir($path.$year.'/'.$month.'/'.$day);
			}

			$file_name = $_FILES['file']['name'];
			$file_name = reset(explode('.', $file_name));
			$file_name = replaceTitle(urldecode($file_name));
			$pathfull = $path.$year.'/'.$month.'/'.$day.'/';

			if(move_uploaded_file($path_tmp, $pathfull.$_FILES['file']['name']))
			{
				$filename = $_FILES['file']['name'];
				rename($pathfull.$filename,$pathfull.$file_name.'.'.$type);
				$data = [
					'use_id' => $_COOKIE['UID'],
					'link' => $pathfull.$file_name.'.'.$type,
					'timecreate' => $time
				];
				add('user_cv_upload',$data);
				update('user',['use_update_time'=>time()],['use_id'=>$_COOKIE['UID']]);
				unset($submit,$_FILES['file']);
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
		<title>Thông tin ứng viên</title>
		<meta name="descripton" content="Đăng ký ứng viên. Tìm việc làm nhanh chóng, hiệu quả nhất,  đăng tin tìm việc làm tốt 24h, tuyển dụng việc làm tất cả ngành nghề nhanh nhất, tìm kiếm việc làm tại Timviec365.com"/>
		<meta name="Keywords" content="tim viec lam, viec lam nhanh, tìm việc làm nhanh, tuyển dụng việc làm, tuyen dung, kiem viec lam, tim viec lam, tim viec">
		<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui">
		<meta name="robots" content="noodp,noindex,nofollow"/>
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
<? require('../includes/inc_menu_uv.php') ?>
<section class="main_right">
<? include('../includes/inc_header_candi_manager.php') ?>
	<div class="main_list">
		<div class="title">danh sách hồ sơ tải lên</div>
		<div class="my_profile main">
			<?
			$db_qr = new db_query("SELECT * FROM user_cv_upload WHERE use_id = ".$_COOKIE['UID']." ORDER BY id_upload DESC");
			While ($item = mysql_fetch_assoc($db_qr->result)) {
				$arr_name = explode('/', $item['link']);
				$name = array_pop($arr_name);
				$type = array_pop(explode('.', $name));
			?>
			<div class="item main">
				<div class="images">
					<img src="/images/icon365_manager/img_profile.png" alt="">
				</div>
				<div class="profiles">
					<p class="name_profiles"><?=$name?></p>
					<div>
						<p class="date_upload"><span>Tải lên ngày:</span> <?=($item['timecreate']>0)?date('d/m/Y',$item['timecreate']):"Chưa cập nhật"?></p>
						<p class="type"><span>Kiểu file:</span> <?=$type?></p>
					</div>
				</div>
				<div class="button">
					<?
						$arr_ckeck_type = array('jpg','jpeg','png','PNG','gif','jfif','pdf');
			            if(!in_array($type, $arr_ckeck_type)){
			               $img = str_replace('../','https://docs.google.com/viewer?url=timviec365.com/',$item['link']);
			            }
			            else{
			               $img = str_replace('../','https://timviec365.com/',$item['link']);
			            }
					?>
					<a target="_blank" class="show" href="<?=$img?>"><i class="fa fa-eye" aria-hidden="true"></i> Xem</a>
					<? if(mysql_num_rows($db_qr->result)>1) {?>
					<a class="clear" data-id="<?=$item['id_upload']?>"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
					<?}?>
				</div>
			</div>
			<?
			}
			?>

			<form class="form_upload" method="POST" action="" enctype="multipart/form-data">
				<div><img src="/images/icon365_manager/img_upload.png" alt="Upload Profile"></div>
				<p>Tải lên hồ sơ của bạn</p>
				<input type="file" id="file" name="file">
				<input type="submit" id="submit" name="submit">
			</form>
		</div>
	</div>
	<?
		include('../includes/inc_chuyenvienmb.php');
		?>
</section>
<?
	include('../includes/inc_footer.php');
	include('../includes/inc_script_footer.php');
?>
<script async src="/js/js_manager_uv.js?v=<?=$version?>"></script>
</body>