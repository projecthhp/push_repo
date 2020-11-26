<?
    include('config.php');
    $page  = getValue('page','int','GET',0);
    $page  = intval(@$page);

    if($page == 1)
    {
       redirect('/');
    }

    if($page == 0)
    {
       $page = 1;
    }
    $curentPage = 5;
    $pageab = abs($page - 1);
    $start = $pageab * $curentPage;
    $start = intval(@$start);
    $start = abs($start);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="robots" content="noodp,noindex,nofollow"/>
	<title>Quản lý nhà tuyển dụng | Timviec365.com</title>
    <link rel="stylesheet" href="/css/font-awesome.min.css" media='all' onload="if(media!='all')media='all'">
    <link rel="stylesheet" href="/css/style.min.css" media='all' onload="if(media!='all')media='all'">
    <link rel="stylesheet" href="/css/style_company_manager.css?v=<?=$version?>" media='all' onload="if(media!='all')media='all'">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PQGTCFD"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</head>
<body class="manager">
<? include('../includes/inc_left_ntdmanager.php') ?>
<div class="right_manager">
    <? include('../includes/inc_header_ntd_manager.php') ?>
    <div class="box_tt main">
        <div class="box_right">
            <div class="top_right">
            <?
                $db_count = new db_query("SELECT count(1) FROM nop_ho_so JOIN new ON nop_ho_so.nhs_new_id = new.new_id JOIN user ON nop_ho_so.nhs_use_id = user.use_id WHERE nhs_com_id = ".$_COOKIE['UID']."");
                $count = mysql_fetch_array($db_count->result);
                $count_ut = $count['count(1)'];
                unset($db_count,$count);
                $db_count = new db_query("SELECT count(1) FROM tbl_point_used WHERE type <> 0 AND use_id <> 0 AND usc_id = ".$_COOKIE['UID']);
                $count = mysql_fetch_array($db_count->result);
                $count_lhs = $count['count(1)'];
                unset($db_count,$count);
            ?>
                <a href="/nha-tuyen-dung/ho-so-ung-tuyen.html" class="item hs_UT">
                    <p>Hồ sơ ứng tuyển</p>
                    <p class="ts"><?=$count_ut?></p>
                </a>
                <a href="/nha-tuyen-dung/ho-so-loc-diem.html" class="item hs_loc">
                    <p>Hồ sơ lọc điểm</p>
                    <p class="ts"><?=$count_lhs?></p>
                </a>
                <a class="item guiUV">
                    <p>Chuyên viên gửi ứng viên</p>
                    <p class="ts">0</p>
                </a>
            </div>
            <div class="bottom_right text-center">
                <img src="/images/load.gif" class="lazyload" data-src="/images/icon365_manager/ten_lua.png" alt="tên lửa"><a ref="nofollow" href="/bang-gia">Tăng tốc tuyển dụng</a>
            </div>
        </div>
        <div class="box_left">
        <?
            $db_count = new db_query("SELECT count(1) FROM new WHERE new_user_id = ".$_COOKIE['UID']." AND new_active = 1 AND new_han_nop > ".time()." ");
            $count = mysql_fetch_assoc($db_count->result);
            $count_con_han = $count['count(1)'];
            unset($db_count,$count);
            $three_days_later = time() + 259200;
            $db_count = new db_query("SELECT count(1) FROM new WHERE new_user_id = ".$_COOKIE['UID']." AND new_active = 1 AND new_han_nop > ".time()." AND new_han_nop < ".$three_days_later." ");
            $count = mysql_fetch_array($db_count->result);
            $count_sap_het_han = $count['count(1)'];
            unset($db_count,$count);
            $db_count = new db_query("SELECT count(1) FROM new WHERE new_user_id = ".$_COOKIE['UID']." AND new_active = 1 AND new_han_nop < ".time()." ");
            $count = mysql_fetch_array($db_count->result);
            $count_het_han = $count['count(1)'];
            unset($db_count,$count);
            $time_start = mktime(0,0,0,date('m'),date('d'),date('Y'));
            $time_end = mktime(23,59,59,date('m'),date('d'),date('Y'));
            $db_count = new db_query("SELECT count(1) FROM new WHERE new_user_id = ".$_COOKIE['UID']." AND new_active = 1 AND new_create_time BETWEEN ".$time_start." AND ".$time_end."");
            $count = mysql_fetch_array($db_count->result);
            $count_tin_dang = $count['count(1)'];
            unset($db_count,$count);
            $db_refresh = new db_query("SELECT count(1) FROM new WHERE new_user_id = ".$_COOKIE['UID']." AND new_update_time BETWEEN ".$time_start." AND ".$time_end." AND new_refresh > 0 ");
            $count = mysql_fetch_array($db_refresh->result);
            $count_refresh = $count['count(1)'];
            unset($db_count,$count);
        ?>
            <div class="item">Việc làm còn hạn: <?=$count_con_han?></div>
            <div class="item">Việc làm sắp hết hạn: <?=$count_sap_het_han?></div>
            <div class="item">Việc làm hết hạn: <?=$count_het_han?></div>
            <div class="item">Số tin đăng trong ngày: <?=$count_tin_dang?></div>
            <div class="item">Số lần làm mới tin trong ngày: <?=$count_refresh?></div>
        </div>
    </div>
    <div class="box_rate_general main">
        <p>Nhằm nâng cao chất lượng dịch vụ cũng như giúp doanh nghiệp tuyển dụng nhanh chóng - thành công, mong quý công ty đưa ra đánh giá quý báu của mính về chuyên viên hỗ trợ và đóng góp về website. Mọi đóng góp của doanh nghiệp sẽ là nền tảng để chúng tôi phát triển và tối ưu!</p>
        <a href="/feedback.html">đánh giá</a>
    </div>
    <div class="main list_pc">
        <div class="title_manager">Danh sách tin tuyển dụng mới nhất</div>
        <table class="list">
            <thead>
                <th>STT</th>
                <th width="30%">Vị trí tuyển dụng</th>
                <th>Gói dịch vụ</th>
                <th>Lượt xem</th>
                <th>Ứng tuyển</th>
                <th>Chuyên viên gửi UV</th>
                <th>Quản lý</th>
            </thead>
            <tbody>
            <?
            $i = 1;
            $sql = "SELECT * FROM new JOIN user_company ON new.new_user_id = user_company.usc_id WHERE user_company.usc_id = ".$_COOKIE['UID']." AND new_active = 1 ORDER BY new_update_time DESC,new_id DESC LIMIT 5 ";
            $db_qrs = new db_query($sql);
            if(mysql_num_rows($db_qr->result)>0){
                While ($row = mysql_fetch_assoc($db_qrs->result)) {
                ?>
                <tr>
                    <td rowspan="2"><?=$i?></td>
                    <td rowspan="2">
                        <a href="<?= rewriteNews($row['new_id'],$row['new_title'],$row['new_alias'])?>" class="title_news"><?= $row['new_title']?></a>
                        <p class="city_news">
                        <?
                        $cit = explode(',', $row['new_city']);
                        $nameCity = [];
                        foreach ($cit as $key => $value) {
                            $nameCity[] = $arrcity[$value]['cit_name'];
                        }
                        $nameCity = implode(',', $nameCity);
                        ?>
                        (<?=$nameCity?>)
                        </p>
                        <p class="date_news">Ngày hết hạn: <?= date('d/m/Y',$row['new_han_nop'])?></p>
                    </td>
                    <td>Miễn phí</td>
                    <td><?= $row['new_view_count']?></td>
                    <td>
                    <?
                        $db_ut = new db_query("SELECT count(1) FROM nop_ho_so WHERE nhs_new_id = ".$row['new_id']);
                        $count = mysql_fetch_array($db_ut->result);
                        echo $count['count(1)'];
                        unset($db_ut,$count);
                    ?>
                    </td>
                    <td>0 ứng viên</td>
                    <?
                    if($row['new_han_nop']>time()){
                        $check_time = 'con_han';
                        $img = 'stopwatch(2).png';
                        $text = 'Còn hạn';
                    }else{
                        $check_time = 'het_han';
                        $img = 'stopwatch.png';
                        $text = 'Hết hạn';   
                    }
                    ?>
                    <td class="<?=$check_time?>" rowspan="2">
                        <img src="/images/load.gif" class="lazyload" data-src="/images/icon365_manager/<?=$img?>" alt="stopwatch"><?=$text?><i class="fa fa-angle-down" aria-hidden="true"></i>
                        <ul class="sub_ql">
                            <li class="item"><a data-id="<?=$row['new_id']?>" class="refresh_new"><img class="lazyload" src="/images/load.gif" class="lazyload" data-src="/images/icon365_manager/i_reload.png"> Làm mới</a></li>
                            <li class="item"><a  href="<?=rewriteSuaTin($row['new_id'])?>"><img src="/images/load.gif" class="lazyload" data-src="/images/icon365_manager/i_giahan.png">Gia hạn</a></li>
                            <li class="item"><a data-id="<?=$row['new_id']?>" class="clear_new"><img src="/images/load.gif" data-src="/images/icon365_manager/i_clr.png" class="lazyload">Xóa</a></li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <p class="confirm">Đã duyệt</p>
                        <?
                            $nn = explode(',', $row['new_cat_id']);
                            $tt = explode(',', $row['new_city']);
                            $db_qrss = new db_query("SELECT count(1) FROM user WHERE 1 AND FIND_IN_SET(".$nn[0].",use_nganh_nghe) OR FIND_IN_SET(".$tt[0].",use_district_job)");
                            $count = mysql_fetch_array($db_qrss->result);
                            $count = $count['count(1)'];
                        ?>
                        <a class="uv_tiemnang" href="<?= rewriteCateUV($tt[0],$arrcity[$tt[0]]['cit_name'],$nn[0],$db_cat[$nn[0]]['cat_name'])?>">Số lượng ứng viên tiềm năng: <?echo $count; unset($db_qrss,$count);?></a>
                    </td>
                </tr>
            <?
            $i++;
                }
            }else{
            ?>
            <tr>
                <td colspan="7">Bạn chưa có tin tuyển dụng nào ? Hãy <a class="orange weight-500 Roboto-Medium" href="/nha-tuyen-dung/dang-tin.html">đăng tin</a></td>
            </tr>
            <?
            }
            unset($db_qrs,$row);
            ?>
            </tbody>
        </table>
    </div>
    <div class="main list_pc">
        <div class="title_manager">Hồ sơ ứng tuyển mới nhất</div>
        <table class="list">
            <thead>
                <th>STT</th>
                <th>Ứng viên</th>
                <th>Vị trí ứng tuyển</th>
                <th>Ngày nộp</th>
            </thead>
            <tbody>
            <?
                $sql_ut = "SELECT * FROM nop_ho_so JOIN new ON nop_ho_so.nhs_new_id = new.new_id JOIN user ON nop_ho_so.nhs_use_id = user.use_id WHERE nhs_com_id = ".$_COOKIE['UID']." ORDER BY nhs_time DESC LIMIT 5";
                $db_qr = new db_query($sql_ut);
                $i = 1;
                $num_ut = mysql_num_rows($db_qr->result);
                if($num_ut>0){
                While($row = mysql_fetch_assoc($db_qr->result)){
            ?>
                <tr>
                    <td><?=$i?></td>
                    <td><a style="text-transform: capitalize;" href="<?=rewriteUV($row['use_id'],$row['use_name'])?>"><?=$row['use_name']?></a></td>
                    <td><a href="<?=rewriteNews($row['new_id'],$row['new_title'],$row['new_alias'])?>"><?=$row['new_title']?></a></td>
                    <td><?=date('d/m/Y',$row['nhs_time'])?></td>
                </tr>
            <?
            $i++;
            }
            }else{?>
                <tr>
                    <td colspan="4">Bạn chưa có ứng viên nào nộp hồ sơ</td>
                </tr>
            <?}?>
            </tbody>
        </table>
        <??>
        <?
            if($num_ut > 5) echo '<div class="main text-center"><a class="show_all" href="/nha-tuyen-dung/ho-so-ung-tuyen.html">Xem tất cả <i class="fa fa-angle-double-down" aria-hidden="true"></i></a></div>';
        ?>
        
    </div>
    <div class="main list_mobile list_new_general">
        <div class="title_manager">Danh sách tin tuyển dụng mới nhất</div>
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
                                $count = mysql_fetch_array($db_qrss->result);
                                $count = $count['count(1)'];
                            ?>
                            <p>Đã duyệt <a href="<?= rewriteCateUV($tt[0],$arrcity[$tt[0]]['cit_name'],$nn[0],$db_cat[$nn[0]]['cat_name'])?>" class="uv_tiemnang">(Số lượng ứng viên tiềm năng: <?echo $count; unset($db_qrss,$count);?>)</a></p>
                        </div>
                        <div class="handling">
                        <?
                        if($row['new_han_nop']>time()){
                            $check_time = 'con_han';
                            $img = 'stopwatch(2).png';
                            $text = 'Còn hạn';
                        }else{
                            $check_time = 'het_han';
                            $img = 'stopwatch.png';
                            $text = 'Hết hạn';   
                        }
                        ?>
                            <img src="/images/icon365_manager/<?=$img?>" alt="stopwatch"> <?=$text?>
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
                            <li>Ứng tuyển: <span><?
                                $db_ut = new db_query("SELECT count(1) FROM nop_ho_so WHERE nhs_new_id = ".$row['new_id']);
                                $count = mysql_fetch_array($db_ut->result);
                                echo $count['count(1)'];
                                unset($db_ut,$count);
                            ?></span></li>
                            <li>Chuyên viên gửi ứng viên: <span>0</span></li>
                            <li>Ngày hết hạn: <span><?= date('d/m/Y',$row['new_han_nop'])?></span></li>
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
    <div class="main list_mobile list_UtNews">
        <div class="title_manager">Hồ sơ ứng tuyển mới nhất</div>
        <?
        $sql_ut = "SELECT * FROM nop_ho_so JOIN new ON nop_ho_so.nhs_new_id = new.new_id JOIN user ON nop_ho_so.nhs_use_id = user.use_id WHERE nhs_com_id = ".$_COOKIE['UID']." ORDER BY nhs_time DESC LIMIT 5";
        $db_qr = new db_query($sql_ut);
        $num_ut = mysql_num_rows($db_qr->result);
        if($detect->isTablet()){
        ?>
        <table class="list">
            <thead>
                <th>Ứng viên</th>
                <th>Vị trí ứng tuyển</th>
                <th>Ngày nộp</th>
            </thead>
            <tbody>
            <?
                While($row = mysql_fetch_assoc($db_qr->result)){
            ?>
                <tr>
                    <td><a style="text-transform: capitalize;" href="<?=rewriteUV($row['use_id'],$row['use_name'])?>"><?=$row['use_name']?></a></td>
                    <td><a href="<?=rewriteNews($row['new_id'],$row['new_title'],$row['new_alias'])?>"><?=$row['new_title']?></a></td>
                    <td><?=date('d/m/Y',$row['nhs_time'])?></td>
                </tr>
            <?}?>
                
            </tbody>
        </table>
        <?
        }else{
        ?>
        <div class="list_2">
        <?
                While($row = mysql_fetch_assoc($db_qr->result)){
            ?>
            <div class="item">
                <a href="<?=rewriteUV($row['use_id'],$row['use_name'])?>" class="name_uv"><?=$row['use_name']?></a>
                <p class="position">Vị trí: <a href="<?=rewriteNews($row['new_id'],$row['new_title'],$row['new_alias'])?>" class="new_title"><?=$row['new_title']?></a></p>
                <p class="date">Ngày nộp: <a><?=date('d/m/Y',$row['nhs_time'])?></a></p>
            </div>
            <?}?>
        </div>
        <?}?>
        <?
            if($num_ut > 5) echo '<div class="main text-center"><a class="show_all" href="/nha-tuyen-dung/ho-so-ung-tuyen.html">Xem tất cả <i class="fa fa-angle-double-down" aria-hidden="true"></i></a></div>';
        ?>
        
    </div>
</div>
    <?
    include('../includes/inc_footer.php');
    include('../includes/inc_script_footer.php');
    ?>
    <script src="/js/update_ntd.js?v=<?=$version?>"></script>
</body>
</html>