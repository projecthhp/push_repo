<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<?
	include('../home/config.php');
	$page  = getValue('page','int','GET',0);
    $page  = intval(@$page);

    if($page == 1)
    {
       redirect('/ung-vien/viec-lam-ung-tuyen.html');
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



    $urlcano = '';
    $url_query = '';
    $trang = '';

    if($page > 1)
    {
       $trang = " - trang ".$page;
       $url_query = "?page".$page;
    }
    else
    {
       $trang = '';
    }

    $array_ketqua = array(
        0=>'Lọc',
        1=>'Đạt yêu cầu',
        2=>'Không đạt y/c'
    );
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Thông tin ứng viên</title>
		<meta name="descripton" content="Đăng ký ứng viên. Tìm việc làm nhanh chóng, hiệu quả nhất,  đăng tin tìm việc làm tốt 24h, tuyển dụng việc làm tất cả ngành nghề nhanh nhất, tìm kiếm việc làm tại Timviec365.vn"/>
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
<div class="main_right">
	<? include('../includes/inc_header_candi_manager.php') ?>
	<div class="box_thongtin box_vlut main">
		<div class="head">VIỆC LÀM ĐÃ ỨNG TUYỂN</div>
		<table class="table">
			<tr>
				<th>STT</th>
				<th width="25%">VỊ TRÍ CÔNG VIỆC</th>
				<th width="25%">CÔNG TY</th>
				<th>NGÀY NỘP HỒ SƠ</th>
				<th>TRẠNG THÁI</th>
				<th>XÓA</th>
			</tr>
			<?
			$db_qrut = new db_query("SELECT * FROM nop_ho_so JOIN user_company ON nop_ho_so.nhs_com_id = user_company.usc_id JOIN new ON new.new_id = nop_ho_so.nhs_new_id WHERE nhs_use_id = ".$_COOKIE['UID']." ORDER BY nhs_time DESC LIMIT ".$start.",".$curentPage."" );
			$db_qr_count = new db_query("SELECT count(1) FROM nop_ho_so JOIN user_company ON nop_ho_so.nhs_com_id = user_company.usc_id JOIN new ON new.new_id = nop_ho_so.nhs_new_id WHERE nhs_use_id = ".$_COOKIE['UID']."");
                    $count = mysql_fetch_assoc($db_qr_count->result);
                    $count = $count['count(1)'];
			$i=1;
			while($rows = mysql_fetch_assoc($db_qrut->result)){
			?>
			<tr>
				<td><?=$i++?></td>
				<td><a class="new_title" href="<?= rewriteNews($rows['new_id'],$rows['new_title'],$rows['new_alias']) ?>"><?= $rows['new_title']?></a> </td>
				<td><a href="<?= rewrite_company($rows['usc_id'],$rows['usc_company'],$rows['usc_alias'])?>"><?= name_company($rows['usc_company']) ?></a></td>
				<td><a><?= date('d/m/Y',$rows['nhs_time']) ?></a></td>
				<td>
					<a>
					<? 
						if($rows['result'] == 0) echo "Chưa cập nhật";
						if($rows['result'] == 1) echo "Đạt yêu cầu";
						if($rows['result'] == 2) echo "Không đạt yêu cầu";
					?>
					</a></td>
				<td><a class="clear" onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này ???')" href="/codelogin/xoa_vlut.php?id=<?=$rows['id']?>">
					<i class="fa fa-trash" aria-hidden="true"></i>
				</a></td>
			</tr>
			<?
			}
			unset($db_qrut,$rows,$i);
			?>
		</table>
		<div class="table_mb">
		<?
		$db_qrut = new db_query("SELECT * FROM nop_ho_so JOIN user_company ON nop_ho_so.nhs_com_id = user_company.usc_id JOIN new ON new.new_id = nop_ho_so.nhs_new_id WHERE nhs_use_id = ".$_COOKIE['UID']." ORDER BY nhs_time DESC LIMIT ".$start.",".$curentPage."" );
			while($rows = mysql_fetch_assoc($db_qrut->result)){
		?>
			<div class="item main">
				<a href="<?= rewriteNews($rows['new_id'],$rows['new_title'],$rows['new_alias']) ?>" class="new_title"><?= $rows['new_title']?></a>
				<p class="trash"><a onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này ???')" href="/codelogin/xoa_vlut.php?id=<?=$rows['id']?>">
					<i class="fa fa-trash" aria-hidden="true"></i>
				</a></p>
				<a href="<?= rewrite_company($rows['usc_id'],$rows['usc_company'],$rows['usc_alias'])?>" class="name_company"><?= name_company($rows['usc_company']) ?></a>
				<p class="date"><i class="icon"></i>Hạn nộp: <?= date('d/m/Y',$rows['new_han_nop']) ?></p>
				<p class="date_nhs">
					<i class="icon"></i>Ngày nộp: <?= date('d/m/Y',$rows['nhs_time']) ?>
				</p>
				<p class="rate">
					<span class="dat_yc">
						<i class="fa fa-star-o" aria-hidden="true"></i>
					<? 
						if($rows['result'] == 0) echo "Chưa cập nhật";
						if($rows['result'] == 1) echo "Đạt yêu cầu";
						if($rows['result'] == 2) echo "Không đạt yêu cầu";
					?>
					</span>
				</p>
				
			</div>
		<?
		}
		unset($db_qrut,$rows,$i);
		?>
		</div>
		<div class="pagination_wrap pagination_manager clr pull-right">
        <div class="clr">
          <?
           $domain = $_SERVER['REQUEST_URI'];
            $domain = str_replace("?page=".$page, "", $domain);
            $domain = str_replace("&page=".$page, "", $domain);
            $domain = str_replace("page=".$page, "", $domain);
          echo generatePageBar2('',$page,$curentPage,$count,$domain,'?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
          unset($db_qr,$row);
          ?>
          </div>
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
<script src="/js/js_manager_uv.js?v=<?=$version?>"></script>
<script>
	$('.form_excel .filter').change(function(){
            var val = $(this).val();
            var url = "/ung-vien/viec-lam-ung-tuyen.html";
            if(val != ''){
                window.location.href = "/ung-vien/viec-lam-ung-tuyen.html?ft="+val;
            }else{
                window.location.href = "/ung-vien/viec-lam-ung-tuyen.html";
            }
            
        });
</script>
<script src="/js/update_uv.js?v=<?=$version?>"></script>
</body>