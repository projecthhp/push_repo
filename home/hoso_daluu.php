<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<?
    include('config.php');

    $page  = getValue('page','int','GET',0);
    $page  = intval(@$page);

    if($page == 1)
    {
       redirect('/nha-tuyen-dung/ho-so-da-luu.html');
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
    

    $excel = getValue("excel",'str','POST','');
    if($excel!=''){
        $db_qr = new db_query("SELECT * FROM tbl_luuhoso_uv JOIN user ON tbl_luuhoso_uv.id_uv = user.use_id WHERE id_ntd = ".$_COOKIE['UID']." ORDER BY id_hoso ");
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=DS_LuuHoSoUV.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        echo '<table border="1px solid black" width="100%">';
        echo '<tr>';

        echo '<td align="center" style="width:10%"><strong> STT </strong></td>';
        echo '<td align="center" style="width:20%"><strong> Tên ứng viên </strong></td>';
        echo '<td align="center" style="width:20%"><strong> URL ứng viên </strong></td>';
        echo '<td align="center" style="width:20%"><strong> Vị trí</strong></td>';
        echo '<td align="center" style="width:20%"><strong> Ngày lưu</strong></td>';

        $i=0;
        while($row = mysql_fetch_assoc($db_qr->result)){
        $i++;
        $link = "https://timviec365.com".rewriteUV($row['use_id'],$row['use_name'])."";
        echo'<tr>';
        echo'<td align="center" style="width:10%">'.$i.'</td>';
        echo'<td align="center" style="width:20%">'.$row['use_name'].'</td>';
        echo'<td align="center" style="width:20%">'.$link.'</td>';
        echo'<td align="center" style="width:20%">'.$row['use_job_name'].'</td>';
        echo'<td align="center" style="width:20%">'.date('d/m/Y',$row['create_time']).'</td>';
        }
        echo '</tr>';
        echo '</table>';
        unset($db_qr,$row);
        exit();
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
    <div class="title_manager">Hồ sơ ứng viên đã lưu</div>
    <form action="" method="POST" id="filter_point_uv">
        <button type="submit" name="excel" value="Xuất file excel">Xuất file excel</button>
    </form>
    <?
    $sql_db = "SELECT * FROM tbl_luuhoso_uv JOIN user ON tbl_luuhoso_uv.id_uv = user.use_id WHERE id_ntd = ".$_COOKIE['UID']." ORDER BY id_hoso DESC LIMIT ".$start.",".$curentPage." ";
    $db_qr = new db_query($sql_db);
    $db_qr_count = new db_query("SELECT count(1) FROM tbl_luuhoso_uv JOIN user ON tbl_luuhoso_uv.id_uv = user.use_id WHERE id_ntd = ".$_COOKIE['UID']." ");
    $count = mysql_fetch_assoc($db_qr_count->result);
    $count = $count['count(1)'];
    if(!$detect->isMobile() && !$detect->isTablet()){
    ?>
    <table class="list">
        <tr>
            <th width="5%">STT</th>
            <th width="20%">Tên ứng viên</th>
            <th width="40%">Vị trí</th>
            <th width="10%">Ngày lưu</th>
            <th width="10%">Xóa</th>
        </tr>
        <?
            $i = 1;
            while($row = mysql_fetch_assoc($db_qr->result)){
        ?>
        <tr>
            <td>
                <p class="weight-500 job_name"><?=$i?></p>
            </td>
            <td style="text-align: left;">
                <p class="candiName"><?=$row['use_name']?></p>
                <p class="text-center">
                    <a class="blue" href="<?= rewriteUV($row['use_id'],$row['use_name']) ?>">(Xem chi tiết)</a>
                </p>
            </td>
            <td><?=$row['use_job_name']?></td>
            <td><?=date('d/m/Y',$row['create_time'])?></td>
            <td>
                <a onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này ??')" href="/codelogin/xoa_hoso.php?id_hoso=<?=$row['id_hoso']?>">
                <i class="fa fa-trash"></i>
                </a>
            </td>
        </tr>
        <?
        $i++;
            }
            unset($db_qr,$row);
        ?>
    </table>
    <?}else{?>
    <div class="table_candi_mb table_save">
        <?
        $db_qr = new db_query("SELECT * FROM tbl_luuhoso_uv JOIN user ON tbl_luuhoso_uv.id_uv = user.use_id WHERE id_ntd = ".$_COOKIE['UID']." ORDER BY id_hoso DESC LIMIT ".$start.",".$curentPage." ");
        if(mysql_num_rows($db_qr->result)){
                while($row = mysql_fetch_assoc($db_qr->result)){
        ?>
            <div class="item item_save">
                <p class="pull-left"><a href="<?= rewriteUV($row['use_id'],$row['use_name']) ?>" class="blue candiName"><?=$row['use_name']?></a></p>
                <a onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này ??')" href="/codelogin/xoa_hoso.php?id_hoso=<?=$row['id_hoso']?>" class="delete pull-right"><i class="fa fa-trash"></i></a>
                <div class="main">
                <p class="date_view pull-left">Ngày lưu: <span><?=date('d/m/Y',$row['create_time'])?></span></p>
                <p class="job_name text-left pull-left">Vị trí: <span><?=$row['use_job_name']?></span></p>
                </div>
            </div>
        <?
                }unset($db_qr,$row);
            }
        ?>
        </div>
        <?}?>
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

    <? if($detect->isMobile() || $detect->isTablet()) include('../includes/inc_chuyenvienmb.php') ?>
    <?
    include('../includes/inc_footer.php');
    include('../includes/inc_script_footer.php');
    ?>
    <script src="/js/update_ntd.js"></script>
</body>
</html>