<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<?
	include('../home/config.php');
	$page  = getValue('page','int','GET',0);
    $page  = intval(@$page);

    if($page == 1)
    {
       redirect('/ung-vien/tin-nhan.html');
    }

    if($page == 0)
    {
       $page = 1;
    }
    $curentPage = 15;
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
?>
<!DOCTYPE html>
<html lang="en">
	<head>
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
<div class="main_right">
	<? include('../includes/inc_header_candi_manager.php') ?>
	<div class="box_thongtin box_vlut main">
		<div class="head">tin nhắn từ ntd</div>
		<table class="table">
			<tr>
				<th>Nhà tuyển dụng</th>
				<th width="25%">Tiêu đề</th>
				<th width="25%">Nội dung</th>
				<th>Thời gian gửi</th>
				<th>Hành động</th>
			</tr>
			<?
			$sql = "SELECT tbl_message.*, usc_id, usc_company,usc_alias FROM tbl_message JOIN user_company ON usc_id = id_sender WHERE id_receiver = ".$row['use_id']." ORDER BY mes_id DESC";
			$db_qrs = new db_query($sql);
			if(mysql_num_rows($db_qrs->result)>0){
				While($rows = mysql_fetch_assoc($db_qrs->result)){
			?>
			<tr>
				<td>
					<a target="_blank" href="<?=rewrite_company($rows['usc_id'],$rows['usc_company'],$rows['usc_alias'])?>" class="name_company"><?=$rows['usc_company']?></a>
					<!-- <span class="status_chat">Đã trả lời</span> -->
				</td>
				<td><?=$rows['title']?></td>
				<td>
					<?=$rows['content']?>
				</td>
				<td><?=date('d/m/Y',$rows['created_date'])?></td>
				<td>
					<a class="reply" data_receiver="<?=$rows['usc_id']?>" data-id-reply="<?=$rows['mes_id']?>"><i class="fa fa-reply" aria-hidden="true"></i>Trả lời</a>
					<a class="delete" data-id="<?=$rows['mes_id']?>"><i class="fa fa-trash" aria-hidden="true"></i>Xóa</a>
				</td>
			</tr>
			<?
				}
			}
			unset($db_qrs,$rows);
			?>
		</table>
		
		<div class="table_mb chat">
			<?
			$db_qrs = new db_query($sql);
			if(mysql_num_rows($db_qrs->result)>0){
				$rows = mysql_fetch_assoc($db_qrs->result);
			?>
			<div class="item main">
				<div>
					<a target="_blank" href="<?=rewrite_company($rows['usc_id'],$rows['usc_company'],$rows['usc_alias'])?>" class="company_nane"><?=$rows['usc_company']?></a>
					<p class="date_nhs">
						<i class="icon"></i><?=date('d/m/Y',$rows['created_date'])?>
					</p>
				</div>
				<p class="title"><?=$rows['title']?></p>
				<div class="content"><?=$rows['content']?></div>
				<div class="text-right">
				<a class="reply" data_receiver="<?=$rows['usc_id']?>" data-id-reply="<?=$rows['mes_id']?>"><i class="fa fa-reply" aria-hidden="true"></i>Trả lời</a>
				<a class="delete" data-id="<?=$rows['mes_id']?>"><i class="fa fa-trash" aria-hidden="true"></i>Xóa</a>
				</div>
			</div>
			<?
			}
			?>
		</div>
		<div class="pagination_wrap pagination_manager clr pull-right">
	        <div class="clr">
			<?
			$db_count = new db_query("SELECT count(*) FROM tbl_message JOIN user_company ON usc_id = id_sender WHERE id_receiver = ".$row['use_id']);
			$count = mysql_fetch_assoc($db_count->result);
			$count = $count['count(*)'];
			$domain = $_SERVER['REQUEST_URI'];
			$domain = str_replace("?page=".$page, "", $domain);
			$domain = str_replace("&page=".$page, "", $domain);
			$domain = str_replace("page=".$page, "", $domain);
			echo generatePageBar2('',$page,$curentPage,$count,$domain,'?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
			?>
			</div>
		</div>

       <div class="popup notification clear_msg hidden">
       		<div class="main_popup">
       			<div class="modal-head">
       				<span class="title">Thông báo</span>
       				<span class="pull-right"><i class="fa fa-times" aria-hidden="true"></i></span>
       			</div>
       			<div class="modal-body">
       				<p><span class="icon">!</span>Bạn có chắc muốn xóa tin nhắn này?</p>
       			</div>
       			<div class="modal-bottom">
       				<a class="agree">OK</a>
       				<a class="cancel">HỦY</a>
       			</div>
       		</div>
       </div>
       <div class="popup sent_message ">
       		<div class="main_popup">
       			<div class="modal-head">
       				<span class="title">Gửi tin nhắn đến Nhà tuyển dụng</span>
       			</div>
       			<div class="modal-body">
       				<div class="item">
       					<label for="">Tiêu đề</label>
       					<input type="text" id="msg_title" placeholder="Nhập tiêu đề ...">
       				</div>
       				<div class="item">
       					<label for="">Nội dung</label>
       					<textarea id="msg_content" cols="30" rows="5" placeholder="Nhập nội dung tin nhắn..."></textarea>
       				</div>
       			</div>
       			<div class="modal-bottom">
       				<a class="sent" data-sent="<?=$row['use_id']?>" data-receiver="">Gửi tin nhắn</a>
       				<a class="cancel">Hủy</a>
       			</div>
       		</div>
       </div>
	</div>
	<? include('../includes/inc_chuyenvienmb.php'); ?>
	</div>
<?
	include('../includes/inc_footer.php');
	include('../includes/inc_script_footer.php');
?>
<script src="/js/js_manager_uv.js?v=<?=$version?>"></script>
<script>
	$(document).ready(function(){
		$('.reply').click(function(){
			e = $(this);
			id_receiver = e.attr('data_receiver');
			id_reply = e.attr('data-id-reply');
			$('.sent_message').addClass('show');
			$('.sent_message .sent').attr('data-receiver',id_receiver);
			$('.sent_message .sent').attr('data_id_reply',id_reply);
		});
		$('.popup.sent_message .cancel').click(function(){
			$('.sent_message').removeClass('show');
		});
		$('.delete').click(function(){
			$('.notification').removeClass('hidden');
			e = $(this);
			id = e.attr('data-id');
			$('.agree').attr('data-id',id);
		});
		$('.popup.notification .cancel,.main_popup .modal-head .fa').click(function(){
			$('.notification').addClass('hidden');
		});
	});
</script>
</body>