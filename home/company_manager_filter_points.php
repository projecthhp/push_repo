<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<?
    include('config.php');

    $page  = getValue('page','int','GET',0);
    $page  = intval(@$page);

    if($page == 1)
    {
       redirect('/nha-tuyen-dung/ho-so-loc-diem.html');
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
    

    $sql = '';
    $ft1 = getValue('ft1','str','GET','');
    if($ft1 != ''){
        $sql .= " AND type = ".$ft1;
    }
    $ft2 = getValue('ft2','str','GET',''); 
    if($ft2 != ''){
        $sql .= " AND type_err = ".$ft2;
    }
    $array_ft_type = array(
        "" => "Tất cả",
        1 => "Điểm miễn phí",
        2 => "Điểm mất phí"
    );
    $array_ft_typeerr = array(
        0 => "Trạng thái",
        1 => "Đã có việc",
        2 => "Không nghe máy",
        3 => "Sai thông tin",
        4 => "Khác"
    );
    $excel = getValue("excel",'str','POST','');
    if($excel!=''){
       $db_qr = new db_query("SELECT * FROM user JOIN tbl_point_used ON tbl_point_used.use_id = user.use_id JOIN user_company ON user_company.usc_id = tbl_point_used.usc_id WHERE tbl_point_used.usc_id = ".$_COOKIE['UID']." AND point <> 0 ".$sql." ORDER BY used_day DESC ");
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=DS_HoSoDiemLoc.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        echo '<table border="1px solid black">';
        echo '<tr>';

        echo '<td align="center" style="width:10%"><strong> STT </strong></td>';
        echo '<td align="center" style="width:20%"><strong> Tên ứng viên </strong></td>';
        echo '<td align="center" style="width:20%"><strong> URL ứng viên </strong></td>';
        echo '<td align="center" style="width:10%"><strong> Ngày xem hồ sơ</strong></td>';
        echo '<td align="center" style="width:10%"><strong> Vị trí</strong></td>';
        echo '<td align="center" style="width:10%"><strong> Điểm lọc</strong></td>';
        echo '<td align="center" style="width:10%"><strong> Trạng thái</strong></td>';
        echo '<td align="center"><strong> Ghi chú</strong></td>';

        $i=0;
        while($row = mysql_fetch_assoc($db_qr->result)){
        $i++;
        $link = "https://timviec365.com".rewriteUV($row['use_id'],$row['use_name'])."";

        echo'<table border="1px solid black">';
        echo'<tr>';
        echo'<td align="center" style="width:10%">'.$i.'</td>';
        echo'<td align="center" style="width:20%">'.$row['use_name'].'</td>';
        echo'<td align="center" style="width:20%">'.$link.'</td>';
        echo'<td align="center" style="width:10%">'.date('d/m/Y',$row['used_day']).'</td>';
        echo'<td align="center" style="width:10%">'.$row['use_job_name'].'</td>';
        echo'<td align="center" style="width:10%">';
            if($row['type']==1) echo "Miễn phí"; 
            else echo "Mất phí";
        echo '</td>';
        echo'<td align="center" style="width:10%">'.$array_ft_typeerr[$row['type_err']].'</td>';
        echo'<td align="center" style="width:10%">';
            if($row['note_uv']!='') echo $row['note_uv'];
        echo '</td>';
        
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
    <div class="title_manager">Hồ sơ ứng viên từ điểm lọc</div>
    <form action="" method="POST" id="filter_point_uv">
        <?
        if($detect->isMobile() && !$detect->isTablet()){
        ?>
        <div class="filter_mb main main_filter">
            <?
            $i = 0;
            foreach ($array_ft_type as $key => $value) {
            ?>
                <div class="item">
                    <input class="checkbox_filter" type="radio" <?= ($ft1!='' && $ft1==$key)?'checked':($i==0)?'checked':'' ?> name="checkbox_filter" value="<?= $key ?>"> <?= $value ?>
                </div>
            <?$i++;}?>
            </div>
        
        <?}else{?>
            <select class="filter form type">
            <?
            foreach ($array_ft_type as $key => $value) {
            ?>
            <option <?= ($ft1!='')?($ft1==$key)?'selected':'':'' ?> value="<?= $key ?>"><?= $value ?></option>
            <?
            }
            ?>
        </select>
        <?}?>
        <select class="filter form type_err">
            <option value="">Tất cả</option>
            <?
            foreach ($array_ft_typeerr as $key => $value) {
            ?>
            <option <?= ($ft2!='')?($ft2==$key)?'selected':'':'' ?> value="<?= $key ?>"><?= $value ?></option>
            <?
            }
            ?>
        </select>
        <button type="submit" name="excel" value="Xuất excel">Xuất file excel</button>
    </form>
    <?
    $db_qr = new db_query("SELECT * FROM user JOIN tbl_point_used ON tbl_point_used.use_id = user.use_id JOIN user_company ON user_company.usc_id = tbl_point_used.usc_id WHERE tbl_point_used.usc_id = ".$_COOKIE['UID']." AND point <> 0 ".$sql." ORDER BY used_day DESC LIMIT ".$start.",".$curentPage." ");
    $db_qrs = new db_query("SELECT count(*) FROM user JOIN tbl_point_used ON tbl_point_used.use_id = user.use_id JOIN user_company ON user_company.usc_id = tbl_point_used.usc_id WHERE tbl_point_used.usc_id = ".$_COOKIE['UID']." AND point <> 0 ".$sql."");
    $count = mysql_fetch_assoc($db_qrs->result);
    $count = $count['count(*)'];
    if(!$detect->isMobile() && !$detect->isTablet()){
    ?>
    <table class="list">
        <tr>
            <th width="5%">STT</th>
            <th width="20%">Tên ứng viên</th>
            <th width="10%">Trạng thái</th>
            <th width="10%">Ngày xem</th>
            <th width="20%">Vị trí</th>
            <th width="10%">Điểm lọc</th>
            <th width="10%">Trạng thái</th>
            <th width="10%">Ghi chú</th>
            <th width="10%">Xóa</th>
        </tr>
        <?
        $i = 1;
        while($row = mysql_fetch_assoc($db_qr->result)){
        ?>
            <tr>
                <td>
                    <p class="weight-500 job_name"><?=$i++?></p>
                </td>
                <td style="text-align: left;">
                    <p class="candiName"><?= $row['use_name']?></p>
                    <p class="text-center"><a class="blue" href="<?= rewriteUV($row['use_id'],$row['use_name'])?>">(Xem chi tiết)</a></p>
                </td>
                <td><span class="viewed">Đã xem</span></td>
                <td><?= date('d/m/Y',$row['used_day'])?></td>
                <td><span class="blue"><?= $row['use_job_name']?></span></td>
                <td><?= ($row['type']==1)?"Miễn phí":"Mất phí" ?></td>
                <td class="css_select">
                    <select data-id="<?=$row['use_id']?>" class="filter_detail">
                        <?
                        foreach ($array_ft_typeerr as $key => $value) {
                        ?>
                        <option <?= ($row['type_err']==$key)?"selected":"" ?> value="<?= $key ?>"><?= $value ?></option>
                        <?
                        }
                        ?> 
                    </select>
                </td>
                <td><a data-id="<?=$row['use_id']?>" class="giaiphap popup_manager blue"><img src="/images/ico_ghichu.png">    Ghi chú</a></td>
                <td>
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa hồ sơ này ???')" href="/codelogin/xoa_hoso_locdiem.php?uid=<?=$row['use_id']?>&cid=<?=$row['usc_id']?>">
                    <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?
        }
        unset($db_qr,$row);
        ?>
    </table>
    <?}else{
    ?>
    <div class="table_candi_mb main">
        <?
        $i = 1;
        while($row = mysql_fetch_assoc($db_qr->result)){
        ?>
        <div class="items main">
            <div class="icon_angle_down"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
            <div class="ndung">
                <p><a href="" class="blue candiName"><?= $row['use_name']?></a><span class="viewed">Đã xem</span></p>
                <p class="job_name text-left">Vị trí: <span><?= $row['use_job_name'] ?></span></p>
                <div class="show_more_ndung">
                    <p class="date_view"><span class="">Ngày xem: </span><?= date('d/m/Y',$row['used_day']) ?></p>
                    <p class="point_type"><span class="">Điểm lọc: </span> <?= ($row['type']==1)?"Miễn phí":"Mất phí" ?></p>
                    <div>
                        <select class="filter filter_detail" data-id="<?=$row['use_id']?>" id="point">
                            <?
                            foreach ($array_ft_type as $key => $value) {
                            ?>
                            <option <?= ($row['type_err']==$key)?"selected":"" ?> value="<?= $key ?>"><?= $value ?></option>
                            <?
                            }
                            ?> 
                        </select>
                        <a class="giaiphap note popup_manager" data-id="<?=$row['use_id']?>">Ghi chú</a>
                        <a class="delete">Xóa</a>
                    </div>
                </div>
            </div>
        </div>
        <?
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
    <section class="popup_ungtuyen popupManager hidden">
    <!-- /codelogin/updateNTD_note_filter_point.php -->
        <form method="POST" action="" onsubmit="return handlSubmit_Note()" class="divmain hidden" id="note">
            <p class="close">x</p>
            <p class="header weight-500 text-center">Ghi chú dành cho nhà tuyển dụng</p>
            <div class="form-group">
            <textarea name="note" id="textarea-note" cols="30" rows="10" class="form-control" placeholder="Ghi chú"></textarea>
                <div class="text-center">
                    <button type="submit" class="update">Cập nhật</button>
                </div>
            </div>
            <input name="id" type="hidden" class="id">
        </form>
    </section>
    <? if($detect->isMobile() || $detect->isTablet()) include('../includes/inc_chuyenvienmb.php');
    include('../includes/inc_footer.php');
    include('../includes/inc_script_footer.php');
    ?>
    <script>
        $('.filter_detail').change(function(){
            var value = $(this).val();
            var uid = $(this).attr('data-id');
            $.ajax({
                type:"POST",
                url:"../ajax/update_typeterr.php",
                data:{
                    value:value,
                    uid:uid
                },success:function(data){

                }
            });
        });
        $('.filter.form').change(function(){
            var ft1 = $('.filter.form.type').val();
            var ft2 = $('.filter.form.type_err').val();
            var url = "/nha-tuyen-dung/ho-so-loc-diem.html";
            var sql = '';
            if(ft1!='' && ft2 ==''){
                sql = "?ft1="+ft1;
            }
            if(ft1=='' && ft2 !=''){
                sql = "?ft2="+ft2;
            }
            if(ft1!='' && ft2 !=''){
                sql = "?ft1="+ft1+"&ft2="+ft2;
            }

            window.location.href = url+sql;
        });
        $('.checkbox_filter').click(function(){
            var ft1 = $(this).val();
            var ft2 = $('.filter.form.type_err').val();
            var url = "/nha-tuyen-dung/ho-so-loc-diem.html";
            var sql = '';
            if(ft1!='' && ft2 ==''){
                sql = "?ft1="+ft1;
            }
            if(ft1=='' && ft2 !=''){
                sql = "?ft2="+ft2;
            }
            if(ft1!='' && ft2 !=''){
                sql = "?ft1="+ft1+"&ft2="+ft2;
            }

            window.location.href = url+sql;
        });
        $('.popup_manager').click(function(){
            var id = $(this).attr('data-id');
            $('.popup_ungtuyen').removeClass('hidden');
            $('.divmain#note').removeClass('hidden');
            $('#note .id').val(id);
            $.ajax({
                type:"POST",
                url:"../ajax/getContentPopUpDiem_NTD.php",
                data:{
                    id:id
                },success:function(data){
                    $('#textarea-note').val(data);
                }
            });
            
        });
        $('.popup_ungtuyen .divmain .close').click(function(){
            $(this).parent().addClass('hidden');
            $('.popup_ungtuyen').addClass('hidden');
        });
        function handlSubmit_Note (){
            note = $('#textarea-note').val();
            candi_id = $('#note .id').val();
            company_id = <?=$_COOKIE['UID']?>;
            
            if(candi_id != '' && company_id == <?= $_COOKIE['UID'] ?>){
                $.ajax({
                    type:"POST",
                    url: "../codelogin/updateNTD_note_filter_point.php",
                    data: {
                        candi_id: candi_id,
                        note: note,
                        company_id: company_id
                    },success:function(data){
                        if(data==1){
                            location.reload();
                        }
                    }
                });
            }

            return false;
        }
    </script>
    <script src="/js/update_ntd.js?v=<?=$version?>"></script>
</body>
</html>