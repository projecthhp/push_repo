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
    <div class="title_manager">Thông tin điểm tuyển dụng</div>
    <div class="thongke_diem main">
        <div class="item free">
            <div class="point"><?=$row_com['point']?></div>
            <div class="text">Số điểm miễn phí</div>
        </div>
        <div class="item charge_points">
            <div class="point"><?=$row_com['point_usc']?></div>
            <div class="text">Số điểm mua còn lại</div>
        </div>
        <div class="item count_point">
            <div class="point"><?= $row_com['point'] + $row_com['point_usc'] ?></div>
            <div class="text">Tổng điểm còn lại</div>
        </div>
    </div>
    <?
    $sql_db = "SELECT point,used_day FROM tbl_point_used WHERE usc_id = ".$_COOKIE['UID']." AND use_id = 0 ORDER BY used_day DESC LIMIT 10 ";
    $db_qr = new db_query($sql_db);
    $db_qr_count = new db_query("SELECT count(1) FROM tbl_message JOIN user ON use_id = id_sender WHERE id_receiver = ".$_COOKIE['UID']." ORDER BY mes_id DESC ");
    $count = mysql_fetch_assoc($db_qr_count->result);
    $count = $count['count(1)'];
    ?>
    <div class="main_service main">
        <div class="title_service main">Số điểm nạp 10 lần gần đây nhất</div>
        <table class="list">
            <tr>
            <?
            if(!$detect->isMobile() && !$detect->isTablet()) echo '<th>STT</th>';
            ?>
                <th>Ngày nạp</th>
                <th>Số điểm nạp</th>
            </tr>
            <?
                $i = 1;
                while($row = mysql_fetch_assoc($db_qr->result)){
            ?>
            <tr>
                <? if(!$detect->isMobile() && !$detect->isTablet()) echo '<td>'.$i.'</td>'; ?>
                
                <td><?= date('d/m/Y',$row['used_day']) ?></td>
                <td><?= $row['point']?></td> 
            </tr>
            <?
            $i++;
                }
                unset($db_qr,$row);
            ?>
        </table>
    </div>
    <?
    $db_qr = new db_query("SELECT * FROM user JOIN tbl_point_used ON tbl_point_used.use_id = user.use_id JOIN user_company ON user_company.usc_id = tbl_point_used.usc_id WHERE tbl_point_used.usc_id = ".$_COOKIE['UID']." AND point <> 0 ORDER BY used_day DESC LIMIT 15 ");
    echo '<div class="title_service main service_15">Số điểm sử dụng 15 lần gần đây nhất</div>';
    if(!$detect->isMobile() || $detect->isTablet()){
    ?>
    <table class="list">
        <tr>
            <th>STT</th>
            <th>Ngày xem</th>
            <th>Ứng viên</th>
            <th>Loại</th>
        </tr>
        <?
            $i = 1;
            while($row = mysql_fetch_assoc($db_qr->result)){
        ?>
        <tr>
            <td><?=$i?></td>
            <td><?= date('d/m/Y',$row['used_day']) ?></td>
            <td><a target="_blank" href="<?= rewriteUV($row['use_id'],$row['use_name'])?>"><?= $row['use_name']?></a></td>
            <td><?= ($row['type']==1)?"Miễn phí":"Mất phí" ?></td>
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
                <p><a href="<?= rewriteUV($row['use_id'],$row['use_name']) ?>" class="blue candiName"><?=$row['use_name']?></a></p>
                <p>Ngày xem: <?=date('d/m/Y',$row['used_day'])?> </p>
                <p>Loại: <?= ($row['type']==1)?"Miễn phí":"Mất phí" ?></p>
            </div>
        <?
                }unset($db_qr,$row);
            }
        ?>
        </div>
</div>
    </div>
</div>
    <? 
    if($detect->isMobile() || $detect->isTablet()) include('../includes/inc_chuyenvienmb.php');
    include('../includes/inc_footer.php');
    include('../includes/inc_script_footer.php');
    ?>
    <script src="/js/update_ntd.js?v=<?=$version?>"></script>
</body>
</html>