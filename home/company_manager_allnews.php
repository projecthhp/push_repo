<?
    include('config.php');

    $page  = getValue('page','int','GET',0);
    $page  = intval(@$page);

    if($page == 1)
    {
       redirect('/nha-tuyen-dung/tin-da-dang.html');
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

    $domain = str_replace("?page=".$page, "", $domain);
    $domain = str_replace("&page=".$page, "", $domain);
    $domain = str_replace("page=".$page, "", $domain);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="robots" content="noodp,noindex,nofollow"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title>Quản lý tin đã đăng | Timviec365.com</title>
	<link rel="stylesheet" href="/css/font-awesome.min.css" media='all' onload="if(media!='all')media='all'">
    <link rel="stylesheet" href="/css/style.min.css" media='all' onload="if(media!='all')media='all'">
    <link rel="stylesheet" href="/css/style_company_manager.css?v=<?=$version?>" media='all' onload="if(media!='all')media='all'">
</head>
<body class="manager">
<? include('../includes/inc_left_ntdmanager.php') ?>
<div class="right_manager">
<? include('../includes/inc_header_ntd_manager.php') ?>
    <div class="main box_tindadang">
        <?
        $sql = "SELECT * FROM new STRAIGHT_JOIN user_company ON new.new_user_id = user_company.usc_id WHERE user_company.usc_id = ".$_COOKIE['UID']." AND new_active = 1 ORDER BY new.new_update_time DESC,new_id DESC LIMIT ".$start.",".$curentPage;
        $db_qr = new db_query($sql);
        $numrow = new db_query("SELECT count(1) FROM new STRAIGHT_JOIN user_company ON new.new_user_id = user_company.usc_id WHERE user_company.usc_id = ".$_COOKIE['UID']." AND new_active = 1"); 
        $count = mysql_fetch_assoc($numrow->result);
        $count = $count['count(1)'];
        ?>
        <div class="title_manager">Tổng số tin tuyển dụng (<?=$count?>)</div>
        <span class="tangtoc">
            <img src="/images/icon365_manager/ten_lua.png" alt="ten_lua"> <a target="_blank" href="/bang-gia">Tăng tốc tuyển dụng</a>
        </span>
        <? if($detect->isTablet() || !$detect->isMobile()){ ?>
        <table class="list">
            <tr>
                <th width="5%">STT</th>
                <th width="25%">Vị trí tuyển dụng</th>
                <th width="10%">Lượt xem</th>
                <th width="10%">Ứng tuyển</th>
                <th width="10%">Trạng thái</th>
                <th width="10%">Hạn nộp</th>
                <th width="10%">Dịch vụ</th>
                <!-- <th width="10%">Giải pháp</th> -->
                <th width="10%">Hành động</th>
            <?
            $i = 1;
            While ($row = mysql_fetch_assoc($db_qr->result)) { 
            ?>
            </tr>
            <tr>
            <td><?=$i?></td>
                <td>
                    <?if($row['new_thuc']==1){?>
                    <p class="weight-500 job_name"><a href="<?= rewriteNews($row['new_id'],$row['new_title'],$row['new_alias'])?>"><?= $row['new_title']?></a></p>
                    <?}else{?>
                    <p class="weight-500 job_name"><a><?= $row['new_title']?></a></p>
                    <?}?>
                    <p class="update_time"><i class="fa fa-clock-o" aria-hidden="true"></i><?= date('h:i:s',$row['new_update_time'])?> ngày <?= date('d/m/Y',$row['new_update_time'])?></p>
                    <p class="uv_tiemnang">
                    <?
                    $nn = explode(',', $row['new_cat_id']);
                    $tt = explode(',', $row['new_city']);
                    $db_qrss = new db_query("SELECT count(1) FROM user WHERE 1 AND FIND_IN_SET(".$nn[0].",use_nganh_nghe) OR FIND_IN_SET(".$tt[0].",use_district_job)");
                    $count_uv = mysql_fetch_array($db_qrss->result);
                    echo "Số lượng ứng viên tiềm năng: ".$count_uv = $count_uv['count(1)'];
                    ?>
                    </p>
                </td>
                
                <td><?= $row['new_view_count']?></td>
                <td>
                <?
                $db_ut = new db_query("SELECT count(1) FROM nop_ho_so WHERE nhs_new_id = ".$row['new_id']);
                $count_ut = mysql_fetch_assoc($db_ut->result);
                echo $count_ut['count(1)'];
                unset($db_ut,$count_ut);
                ?>
                </td>
                <td>
                    <p class="confirm">Đã đăng</p>
                </td>
                <td><?=date('d/m/Y',$row['new_han_nop'])?></td>
                <td>Miễn phí</td>
                <!-- <td><a class="giaiphap blue">Click để xem giải pháp</a></td> -->
                <td class="action">
                    <a data-id="<?=$row['new_id']?>" class="box refresh_new ">
                    <i class="fa fa-refresh" aria-hidden="true"></i>
                    </a>
                    <a href="<?=rewriteSuaTin($row['new_id'])?>" class="new_edit box">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    <a data-id="<?=$row['new_id']?>" class="clear_new box">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
            <?
            $i++;
            }
            unset($db_qr,$row);
            ?>
        </table>
        <?}else{?>
            <div class="main list_mobile list_new_general">
            <div class="list_parent main">
                <?
                    $db_qrs = new db_query($sql);
                    if(mysql_num_rows($db_qr->result)>0){
                        While ($row = mysql_fetch_assoc($db_qrs->result)) {
                ?>
                <div class="item main">
                    <div class="left pull-left">
                        <div class="icon" onclick="show_detailNew(this)"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                    </div>
                    <div class="right">
                        <div class="top">
                            <div class="center_nd">
                                <p><a class="new_title" href="<?= rewriteNews($row['new_id'],$row['new_title'],$row['new_alias'])?>"><?=$row['new_title']?></a><span class="free">( Miễn phí )</span></p>
                                <?
                                    $nn = explode(',', $row['new_cat_id']);
                                    $tt = explode(',', $row['new_city']);
                                    $db_qrss = new db_query("SELECT count(1) FROM user WHERE 1 AND FIND_IN_SET(".$nn[0].",use_nganh_nghe) OR FIND_IN_SET(".$tt[0].",use_district_job)");
                                    $count_tiemnang = mysql_fetch_array($db_qrss->result);
                                    $count_tiemnang = $count_tiemnang['count(1)'];
                                ?>
                                <p class="times"><i class="fa fa-clock-o" aria-hidden="true"></i> <?=date('H:i:s',$row['new_update_time'])." ngày ".date('d/m/Y',$row['new_update_time'])?></p>
                                <p><a href="<?= rewriteCateUV($tt[0],$arrcity[$tt[0]]['cit_name'],$nn[0],$db_cat[$nn[0]]['cat_name'])?>" class="uv_tiemnang">(Số lượng ứng viên tiềm năng: <?echo $count_tiemnang; unset($db_qrss,$count_tiemnang);?>)</a></p>
                                
                            </div>
                            <div class="handling">
                                <div class="handing" onclick="toggleHandling(this)">
                                    ...
                                </div>
                                <ul class="sub_handing">
                                    <li class="item"><a data-id="<?=$row['new_id']?>" class="refresh_new"><img class="lazyload" src="/images/load.gif" class="lazyload" data-src="/images/icon365_manager/i_reload.png"> Làm mới</a></li>
                                    <li class="item"><a  href="<?=rewriteSuaTin($row['new_id'])?>"><img src="/images/load.gif" class="lazyload" data-src="/images/icon365_manager/i_giahan.png">Gia hạn</a></li>
                                    <li class="item"><a data-id="<?=$row['new_id']?>" class="clear_new"><img src="/images/load.gif" data-src="/images/icon365_manager/i_clr.png" class="lazyload">Xóa</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="bottom main hidden">
                            <ul>
                                <li>Lượt xem: <span><?= $row['new_view_count']?></span></li>
                                <li>Hạn nộp: <span><?= date('d/m/Y',$row['new_han_nop'])?></span></li>
                                <li>Ứng tuyển: <span><?
                                    $db_ut = new db_query("SELECT count(1) FROM nop_ho_so WHERE nhs_new_id = ".$row['new_id']);
                                    $count_ut = mysql_fetch_array($db_ut->result);
                                    echo $count_ut['count(1)'];
                                    unset($db_ut,$count_ut);
                                ?></span></li>
                                <li>Trạng thái: <span>Đã đăng</span></li>
                                <!-- <li class="giaiphap"><a>Xem giải pháp tuyển dụng</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <?
                    }
                    }
                ?>
            </div>
    </div>
        <?}?>
        <div class="pagination_wrap clr text-right pull-left">
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
<? if($detect->isMobile() || $detect->isTablet()) include('../includes/inc_chuyenvienmb.php');
    include('../includes/inc_footer.php');
    include('../includes/inc_script_footer.php');
    ?>
    <script src="/js/update_ntd.js"></script>
</body>
</html>