<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<?
    include('config.php');

    $page  = getValue('page','int','GET',0);
    $page  = intval(@$page);

    if($page == 1)
    {
       redirect('/nha-tuyen-dung/tin-nhan.html');
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
	<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="robots" content="noodp,noindex,nofollow"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title>Quản lý nhà tuyển dụng | Timviec365.com</title>
	<link rel="stylesheet" href="/css/font-awesome.min.css" media="all">
	<link rel="stylesheet" href="/css/style.min.css?v=<?=$version?>" media="all">
	<link rel="stylesheet" href="/css/style_company_manager.css?v=<?=$version?>" media='all' onload="if(media!='all')media='all'">
</head>
<body class="manager">
<? include('../includes/inc_left_ntdmanager.php') ?>
<div class="right_manager">
<?include('../includes/inc_header_ntd_manager.php');?>
    <div class="box_thongke main">
    <div class="title_manager">Tin nhắn từ ứng viên</div>
    <?
    $sql_db = "SELECT tbl_message.*, use_id, use_name FROM tbl_message JOIN user ON use_id = id_sender WHERE id_receiver = ".$_COOKIE['UID']." ORDER BY mes_id DESC LIMIT ".$start.",".$curentPage." ";
    $db_qr = new db_query($sql_db);
    $db_qr_count = new db_query("SELECT count(1) FROM tbl_message JOIN user ON use_id = id_sender WHERE id_receiver = ".$_COOKIE['UID']." ORDER BY mes_id DESC ");
    $count = mysql_fetch_assoc($db_qr_count->result);
    $count = $count['count(1)'];
    if(!$detect->isMobile() && !$detect->isTablet()){
    ?>
    <table class="list list_mes">
        <tr>
            <th>Ứng viên</th>
            <th width="25%">Tiêu đề</th>
            <th width="25%">Nội dung</th>
            <th>Thời gian gửi</th>
            <th>Hành động</th>
        </tr>
        <?
            $i = 1;
            while($row = mysql_fetch_assoc($db_qr->result)){
        ?>
        <tr>
            <td style="text-align: left;">
                <p class="candiName"><?=$row['use_name']?></p>
                <p class="text-center">
                    <a class="blue" href="<?= rewriteUV($row['use_id'],$row['use_name']) ?>">(Xem chi tiết)</a>
                </p>
            </td>
            <td>
                <p class="weight-500 job_name"><?=$row['title']?></p>
            </td>
            <td><?=$row['content']?></td>
            <td><?=date('d/m/Y',$row['created_date'])?></td>
            <td>
                <a class="reply" data_receiver="<?=$row['use_id']?>" data-id-reply="<?=$row['mes_id']?>"><i class="fa fa-reply" aria-hidden="true"></i>Trả lời</a>
				<a class="delete" data-id="<?=$row['mes_id']?>"><i class="fa fa-trash" aria-hidden="true"></i>Xóa</a>
            </td>
        </tr>
        <?
        $i++;
            }
            unset($db_qr,$row);
        ?>
    </table>
    <?}else{?>
    <div class="table_candi_mb table_mess">
        <?
        while($row = mysql_fetch_assoc($db_qr->result)){
        ?>
            <div class="item main">
                <p class="pull-left"><a href="<?= rewriteUV($row['use_id'],$row['use_name']) ?>" class="blue candiName"><?=$row['use_name']?></a></p>
                <a class="created_date pull-right"><img src="/images/icon365_manager/i_ngaynop.png" alt="Ngày nộp"> <?=($detect->isTablet())?"Thời gian gửi: ":""?> <?=date('d/m/Y',$row['created_date'])?></a>
                <div class="main">
                <p class="title_mess main"><?=$row['title']?></p>
                <p class="content_mess main"><?=$row['content']?></p>
                <div class="main list_mes text-right">
                    <a class="reply" data_receiver="<?=$row['use_id']?>" data-id-reply="<?=$row['mes_id']?>"><i class="fa fa-reply" aria-hidden="true"></i>Trả lời</a> 
                    <a class="delete" data-id="<?=$row['mes_id']?>"><i class="fa fa-trash" aria-hidden="true"></i>Xóa</a>
                    </div>
                </div>
            </div>
        <?
                }unset($db_qr,$row);
            }
        ?>
        </div>
    <div class="pagination_wrap clr main text-right">
        <div class="clr">
            <?
            $domain = $_SERVER['REQUEST_URI'];
            $domain = str_replace("?page=".$page, "", $domain);
            $domain = str_replace("&page=".$page, "", $domain);
            $domain = str_replace("page=".$page, "", $domain);
            echo generatePageBar2('',$page,$curentPage,$count,$domain,'?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
            unset($db_qr,$row,$arr_city);
            ?>
            </div>
        </div>
</div>
    </div>
</div>
<div class="popupManager sent_message ">
    <div class="main_popup">
        <div class="modal-head">
            <span class="title">Gửi tin nhắn đến ứng viên</span>
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
            <a class="sent" data-sent="<?=$_COOKIE['UID']?>" data-receiver="">Gửi tin nhắn</a>
            <a class="cancel">Hủy</a>
        </div>
    </div>
</div>
<div class="popupManager notification clear_msg hidden">
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
    <? if($detect->isMobile() || $detect->isTablet()) include('../includes/inc_chuyenvienmb.php');
    include('../includes/inc_footer.php');
    include('../includes/inc_script_footer.php');
    ?>
    <script src="/js/update_ntd.js?v=<?=$version?>"></script>
    <script>
        $('.reply').click(function(){
			e = $(this);
			id_receiver = e.attr('data_receiver');
			id_reply = e.attr('data-id-reply');
			$('.sent_message').addClass('show');
			$('.sent_message .sent').attr('data-receiver',id_receiver);
			$('.sent_message .sent').attr('data_id_reply',id_reply);
		});
        $('.sent_message .cancel').click(function(){
			$('.sent_message').removeClass('show');
		});
        $('.delete').click(function(){
			$('.notification').removeClass('hidden');
			e = $(this);
			id = e.attr('data-id');
			$('.agree').attr('data-id',id);
		});
		$('.notification .cancel,.main_popup .modal-head .fa').click(function(){
			$('.notification').addClass('hidden');
		});
    </script>
</body>
</html>