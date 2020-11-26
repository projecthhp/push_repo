<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<?
    include('config.php');

    $page  = getValue('page','int','GET',0);
    $page  = intval(@$page);

    if($page == 1)
    {
       redirect('/nha-tuyen-dung/ho-so-ung-tuyen.html');
    }

    if($page == 0)
    {
       $page = 1;
    }
    $curentPage = 30;
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
        $db_qr = new db_query("SELECT * FROM nop_ho_so JOIN user ON nop_ho_so.nhs_use_id = user.use_id JOIN new ON new.new_id = nop_ho_so.nhs_new_id WHERE nhs_com_id = ".$_COOKIE['UID']." AND result = 1 ORDER BY nop_ho_so.date_result ");
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=DS_HoSoTrungTuyen.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        echo '<table border="1px solid black" width="100%">';
        echo '<tr>';

        echo '<td align="center"><strong> STT </strong></td>';
        echo '<td align="center"><strong> Tên ứng viên </strong></td>';
        echo '<td align="center"><strong> URL ứng viên </strong></td>';
        echo '<td align="center"><strong> Vị trí</strong></td>';
        echo '<td align="center"><strong> Ngày trúng tuyển</strong></td>';

        $i=0;
        while($row = mysql_fetch_assoc($db_qr->result)){
        $i++;
        $link = "https://timviec365.com".rewriteUV($row['use_id'],$row['use_name'])."";
        echo'<tr>';
        echo'<td align="center">'.$i.'</td>';
        echo'<td align="center">'.$row['use_name'].'</td>';
        echo'<td align="center">'.$link.'</td>';
        echo'<td align="center">'.$row['new_title'].'</td>';
        echo'<td align="center">'.date('d/m/Y',$row['date_result']).'</td>';
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
<div class="box_hsut box_thongke main">
    <div class="title_manager">Hồ sơ ứng viên đã trúng tuyển</div>
    <?
    $sql_db = "SELECT * FROM nop_ho_so JOIN user ON nop_ho_so.nhs_use_id = user.use_id JOIN new ON new.new_id = nop_ho_so.nhs_new_id WHERE nhs_com_id = ".$_COOKIE['UID']." AND result = 1 ORDER BY nop_ho_so.date_result DESC LIMIT ".$start.",".$curentPage."";
    $db_qr = new db_query($sql_db);
    $db_qr_count = new db_query("SELECT count(1) FROM nop_ho_so JOIN user ON nop_ho_so.nhs_use_id = user.use_id JOIN new ON new.new_id = nop_ho_so.nhs_new_id WHERE nhs_com_id = ".$_COOKIE['UID']." AND result <> 1 ");
    $count = mysql_fetch_assoc($db_qr_count->result);
    $count = $count['count(1)'];
    $i = 1;
    if(!$detect->isMobile() && !$detect->isTablet()){?>
    <table class="list">
        <tr>
            <th>STT</th>
            <th>TÊN ỨNG VIÊN</th>
            <th>VỊ TRÍ</th>
            <th>NGÀY TRÚNG TUYỂN</th>
            <th>XÓA</th>
        </tr>
        <?
        while($row = mysql_fetch_assoc($db_qr->result)){
        ?>
        <tr>
            <td>
                <p class="weight-500 job_name"><?=$i?></p>
            </td>
            <td style="text-align: left;">
                <p class="candiName"><?= $row['use_name']?></p>
                <p class="text-center"><a class="blue" href="<?= rewriteUV($row['use_id'],$row['use_name']) ?>">(Xem chi tiết)</a></p>
            </td>
            <td><a class="position_new" href="<?= rewriteNews($row['new_id'],$row['new_title'],$row['new_alias']) ?>"><?= $row['new_title']?></a></td>
            <td><?= date('d/m/Y',$row['date_result'])?></td>
            <td>
                <a onclick="return confirm('Bạn có chắc chắn muốn xóa ứng viên này ???')" href="/codelogin/xoa_hsut.php?id=<?=$row['id']?>">
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
        <div class="table_candi_mb main">
        <?
        $db_qr = new db_query($sql_db);
        $i = 1;
        while($row = mysql_fetch_assoc($db_qr->result)){
        ?>
        <div class="items">
            <p><span class="blue candiName"><?= $row['use_name']?></span> <a class="orange" href="<?= rewriteUV($row['use_id'],$row['use_name']) ?>">( Xem chi tiết )</a></p>
            <p class="job_name text-left">Vị trí: <a rel="nofollow" href="<?= rewriteNews($row['new_id'],$row['new_title'],$row['new_alias']) ?>"><?= $row['new_title']?></a></p>
            <p class="job_name">Ngày nộp: <a><?= date('d/m/Y',$row['nhs_time'])?></a></p>
            <p class="job_name">Ngày phỏng vấn: <a><?= ($row['date_interview']!='')?date('d/m/Y',$row['date_interview']):"Chưa cập nhật" ?></a></p>
            <div class="option">
                <select  data-id="<?=$row['id']?>" class="filter result" name="" id="sl_hosoungtuyen">
                <?foreach ($array_ketqua as $key => $value) {?>
                <option <?= ($row['result']==$key)?"selected":"" ?> value="<?= $key ?>"><?=$value?></option>
                <?
                    }
                ?>
                </select>
                    <div class="handling">
                        <div class="handing" onclick="toggleHandling(this)">...</div>
                        <ul class="sub_handing">
                            <li class="item">
                            <a data-target="interview" data-id="<?=$row['id']?>" class="popup_manager date_interview">Ngày phỏng vấn</a>
                            </li>
                            <li class="item">
                            <a class="note popup_manager note_hosoungtuyen" data-target="note" data-id="<?=$row['id']?>">Ghi chú</a>
                            </li>
                            <li class="item">
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa ứng viên này ???')" href="/codelogin/xoa_hsut.php?id=<?=$row['id']?>" class="delete" id="delete_hosoungtuyen">Xóa</a>
                            </li>
                        </ul>
                    </div> 
            </div>
        </div>
        <?
        }
        ?>
    </div>
    <?}?>
    <div class="pagination_wrap clr text-right">
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








































        <div class="right" id="right_tindadang">
            <div class="tindadang">
                <h4 class="orange weight-500">HỒ SƠ ỨNG VIÊN TRÚNG TUYỂN</h4>
                <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST" id="filter_point_uv">
                    <button type="submit" name="excel" value="Xuất file excel">Xuất file excel</button>
                </form>
            </div>
        </div>
        <div class="center">
            <div class="table_tinmoinhat" id="table_tatcatin">
                <div class="orange title_table">
                    HỒ SƠ ỨNG VIÊN TRÚNG TUYỂN
                </div>
                <table>
                    <tr>
                        <th>STT</th>
                        <th>TÊN ỨNG VIÊN</th>
                        <th>VỊ TRÍ</th>
                        <th>NGÀY TRÚNG TUYỂN</th>
                        <th>XÓA</th>
                    </tr>
                    <?
                    $db_qr = new db_query("SELECT * FROM nop_ho_so JOIN user ON nop_ho_so.nhs_use_id = user.use_id JOIN new ON new.new_id = nop_ho_so.nhs_new_id WHERE nhs_com_id = ".$_COOKIE['UID']." AND result = 1 ORDER BY nop_ho_so.date_result DESC LIMIT ".$start.",".$curentPage."");
                    $db_qr_count = new db_query("SELECT count(1) FROM nop_ho_so JOIN user ON nop_ho_so.nhs_use_id = user.use_id JOIN new ON new.new_id = nop_ho_so.nhs_new_id WHERE nhs_com_id = ".$_COOKIE['UID']." AND result <> 1 ");
                    $count = mysql_fetch_assoc($db_qr_count->result);
                    $count = $count['count(1)'];
                    $i = 1;
                    while($row = mysql_fetch_assoc($db_qr->result)){
                    ?>
                    <tr>
                        <td>
                            <p class="weight-500 job_name"><?=$i?></p>
                        </td>
                        <td style="text-align: left;">
                            <p class="name_candi"><?= $row['use_name']?></p>
                            <p><a class="orange" href="<?= rewriteUV($row['use_id'],$row['use_name']) ?>">(Xem chi tiết)</a> 
                            <?
                                $db_ck = new db_query("SELECT type FROM tbl_point_used WHERE usc_id = ".$_COOKIE['UID']." AND use_id = ".$row['use_id']." ");
                                if(mysql_num_rows($db_ck->result)){
                                    $row_ck = mysql_fetch_assoc($db_ck->result);
                                    if($row_ck['type']==0){
                            ?>
                            <span class="viewed">Đã xem</span>
                            <?
                                        }
                                        if($row_ck['type']==1){
                            ?>
                            <span class="opened">Đã mở</span>
                            <?
                                        }
                                    }
                            ?>
                            </p>
                        </td>
                        <td><a href="<?= rewriteNews($row['new_id'],$row['new_title']) ?>"><?= $row['new_title']?></a></td>
                        <td><?= date('d/m/Y',$row['date_result'])?></td>
                        <td>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa ứng viên này ???')" href="/codelogin/xoa_hsut.php?id=<?=$row['id']?>">
                                <img src="/images/icon365_manager/icon_xoa.png" alt="">
                            </a>
                        </td>
                    </tr>
                    <?
                    $i++;
                    }
                    unset($db_qr,$row);
                    ?>
                </table>
                 <div class="table_candi_mb">
                    <?
                    $db_qr = new db_query("SELECT * FROM nop_ho_so JOIN user ON nop_ho_so.nhs_use_id = user.use_id JOIN new ON new.new_id = nop_ho_so.nhs_new_id WHERE nhs_com_id = ".$_COOKIE['UID']." AND result = 1 ORDER BY nop_ho_so.date_result DESC LIMIT ".$start.",".$curentPage."");
                    $i = 1;
                    while ($row = mysql_fetch_assoc($db_qr->result)) {
                    ?>
                    <div class="item">
                        <p>
                            <a href="<?= rewriteUV($row['use_id'],$row['use_name']) ?>" class="orange name_candi"><?=$i?>.<?= $row['use_name']?></a>
                            <?
                                $db_ck = new db_query("SELECT type FROM tbl_point_used WHERE usc_id = ".$_COOKIE['UID']." AND use_id = ".$row['use_id']." ");
                                if(mysql_num_rows($db_ck->result)){
                                    $row_ck = mysql_fetch_assoc($db_ck->result);
                                    if($row_ck['type']==0){
                            ?>
                            <span class="viewed">Đã xem</span>
                            <?
                                        }
                                        if($row_ck['type']==1){
                            ?>
                            <span class="opened">Đã mở</span>
                            <?
                                        }
                                    }
                            ?>
                        </p>
                        <a href="<?=rewriteNews($row['new_id'],$row['new_title'])?>" class="job_name text-left"><?= $row['new_title']?></a>
                        <p class="date_view"><span class="orange">Ngày trúng tuyển: </span><?= date('d/m/Y',$row['date_result'])?></p>
                        <div>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa ứng viên này ???')" href="/codelogin/xoa_hsut.php?id=<?=$row['id']?>" class="delete"><img src="/images/icon365_manager/icon_trash.png" alt="">Xóa ứng viên</a>
                        </div>
                    </div>
                    <?
                    $i++;
                    }
                    ?>
                </div>
                <div class="pagination_wrap clr pull-right">
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
            <? //include('../includes/inc_chuyenvienmb.php') ?>
        </div>
    </div>
    <?
    include('../includes/inc_footer.php');
    include('../includes/inc_script_footer.php');
    ?>
    <script src="/js/update_ntd.js"></script>
</body>
</html>