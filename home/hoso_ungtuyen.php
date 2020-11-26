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
   
    $array_ketqua = array(
        0=>'Trạng thái',
        1=>'Trúng tuyển',
        2=>'Không đạt y/c'
    );
    $array_filter = array(
        0=>'Trạng thái',
        2=>'Không đạt y/c'
    );
    $filter = getValue('ft','str','GET','');
    $sql = '';
    if($filter!=''){
        $sql = ' AND result = '.$filter;
    }
    $excel = getValue("excel",'str','POST','');
    if($excel!=''){
        $db_qr = new db_query("SELECT * FROM nop_ho_so JOIN user ON nop_ho_so.nhs_use_id = user.use_id JOIN new ON new.new_id = nop_ho_so.nhs_new_id WHERE nhs_com_id = ".$_COOKIE['UID']." AND result <> 1 ".$sql." ORDER BY nop_ho_so.id DESC");
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=DS_HoSoUngTuyen.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        echo '<table border="1px solid black" width="100%">';
        echo '<tr>';

        echo '<td align="center" width="5%"><strong> STT </strong></td>';
        echo '<td align="center" width="15%"><strong> Tên ứng viên </strong></td>';
        echo '<td align="center" width="15%"><strong> URL ứng viên </strong></td>';
        echo '<td align="center"><strong> Vị trí</strong></td>';
        echo '<td align="center"><strong> Ngày nộp</strong></td>';
        echo '<td align="center"><strong> Ngày hẹn phỏng vấn</strong></td>';
        echo '<td align="center"><strong> Ghi chú</strong></td>';
        echo '<td align="center"><strong> Kết quả</strong></td>';

        $i=0;
        while($row = mysql_fetch_assoc($db_qr->result)){
        $i++;
        $link = "https://timviec365.com".rewriteUV($row['use_id'],$row['use_name'])."";
        echo'<tr>';
        echo'<td align="center" width="5%">'.$i.'</td>';
        echo'<td align="center" width="15%">'.$row['use_name'].'</td>';
        echo'<td align="center" width="15%">'.$link.'</td>';
        echo'<td align="center">'.$row['new_title'].'</td>';
        echo'<td align="center">'.date('d/m/Y',$row['nhs_time']).'</td>';
        echo'<td align="center">';
            if($row['date_interview']!='') echo date('d/m/Y',$row['date_interview']); 
            else echo "Chưa cập nhật";
        echo '</td>';
        echo'<td align="center">';
            if($row['note']!='') echo $row['note']; 
            else echo "Chưa cập nhật";
        echo '</td>';
        echo'<td align="center">'.$array_ketqua[$row['result']].'</td>';
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
    <div class="title_manager">Hồ sơ ứng viên đã ứng tuyển</div>
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST" id="filter_point_uv">
        <select name="point_type" class="filter">
            <option value="">Tất cả</option>
            <?
            foreach ($array_filter as $key => $value) {
            ?>
            <option <?= ($filter!='')?($filter == $key)?"selected":"":""; ?> value="<?=$key?>"><?= $value ?></option>
            <?
            }
            ?>
        </select>
        <button type="submit" name="excel" value="Xuất file excel">Xuất file excel</button>
    </form>
    <?
    $sql_db = "SELECT * FROM nop_ho_so JOIN user ON nop_ho_so.nhs_use_id = user.use_id JOIN new ON new.new_id = nop_ho_so.nhs_new_id WHERE nhs_com_id = ".$_COOKIE['UID']."".$sql." ORDER BY nop_ho_so.id DESC LIMIT ".$start.",".$curentPage."";
    $db_qr = new db_query($sql_db);
    $db_qr_count = new db_query("SELECT count(1) FROM nop_ho_so JOIN user ON nop_ho_so.nhs_use_id = user.use_id JOIN new ON new.new_id = nop_ho_so.nhs_new_id WHERE nhs_com_id = ".$_COOKIE['UID']." ".$sql."");
    $count = mysql_fetch_assoc($db_qr_count->result);
    $count = $count['count(1)'];
    $i = 1;
    if(!$detect->isMobile() && !$detect->isTablet()){?>
    <table class="list">
        <tr>
            <th width="5%">STT</th>
            <th width="15%">Tên ứng viên</th>
            <th width="20%">Vị trí</th>
            <th width="10%">Ngày nộp</th>
            <th width="10%">Hẹn phỏng vấn</th>
            <th width="10%">Ghi chú</th>
            <th width="10%">Kết quả</th>
            <th width="10%">Xóa</th>
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
            <td><?= date('d/m/Y',$row['nhs_time'])?></td>
            <td>
                <a data-target="interview" data-id="<?=$row['id']?>" class="popup_manager blue date_interview"><?= ($row['date_interview']!='')?date('d/m/Y',$row['date_interview']):"Cập nhật" ?></a>
            </td>
            <td><a data-target="note" data-id="<?=$row['id']?>" class="popup_manager blue note">Ghi chú</a></td>
            <td>
                <select data-id="<?=$row['id']?>" name="point_type" class="filter result">
                <?
                    foreach ($array_ketqua as $key => $value) {
                ?>
                <option <?= ($row['result']==$key)?"selected":"" ?> value="<?= $key ?>"><?=$value?></option>
                <?
                    }
                ?>
                </select>
            </td>
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

<? if($detect->isMobile() && $detect->isTablet()) include('../includes/inc_chuyenvienmb.php') ?>
</div>
    <section class="popup_ungtuyen popupManager hidden">
        <form  method="POST" action="/codelogin/updateNTD_note.php" class="divmain hidden" id="note">
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
        <form method="POST" onsubmit="return vali_dateInterview()" action="/codelogin/updateNTD_dateInterview.php" class="hidden divmain" id="interview">
            <p class="close">x</p>
            <p class="weight-500 text-center header">Đặt lịch hẹn phỏng vấn</p>
            <div class="form-group">
                <select name="day" id="days" class="form-control">
                    <option value="0" >Ngày</option>
                    <?
                    for ($i=1; $i <= 31; $i++) { 
                    ?>
                    <option value="<?=$i?>"><?=$i?></option>
                    <?
                    }
                    ?>
                </select>
                <select name="month" id="months" class="form-control">
                    <option value="0" >Tháng</option>
                    <?
                    for ($i=1; $i <= 12; $i++) { 
                    ?>
                    <option value="<?=$i?>"><?=$i?></option>
                    <?
                    }
                    ?>
                </select>
                <select name="year" id="years" class="form-control">
                    <option value="0" >Năm</option>
                    <?
                    for ($i=date('Y',time()); $i <= date('Y',time())+3; $i++) { 
                    ?>
                    <option value="<?=$i?>"><?=$i?></option>
                    <?
                    }
                    ?>
                </select>
                <input name="id" type="hidden" class="id">
                <div class="text-center">
                    <button type="submit" class="update">Cập nhật</button>
                </div>
            </div>
        </form>
    </section>
    <?
    include('../includes/inc_footer.php');
    include('../includes/inc_script_footer.php');
    ?>
    <script src="/js/update_ntd.js?v=<?=$version?>"></script>
    <script>
        $('.popup_manager').click(function(){
            var target = $(this).attr('data-target');
            var id = $(this).attr('data-id');
            $('.popup_ungtuyen').removeClass('hidden');
            $('#'+target).removeClass('hidden');
            $('#'+target+' .id').val(id);
            if(target == 'interview'){
                var type = 1;
            }else{
                var type = 2;
            }
            $.ajax({
                type:"POST",
                url:"../ajax/getContentPopUpUT_NTD.php",
                dataType:'json',
                data:{
                    id:id,
                    type:type
                },success:function(data){
                    if(data.type == 1){
                        $('#days option[value='+data.day+']').attr('selected','selected');
                        $('#months option[value='+data.month+']').attr('selected','selected');
                        $('#years option[value='+data.year+']').attr('selected','selected');
                    }
                    else{
                        $('#textarea-note').val(data.note);
                    }
                }
            });
            
        });
        $('.popup_ungtuyen .divmain .close').click(function(){
            $(this).parent().addClass('hidden');
            $('.popup_ungtuyen').addClass('hidden');
        });
        $('.filter.result').change(function(){
            var result = $(this).val();
            var id = $(this).attr('data-id');
            $.ajax({
                type:"POST",
                url:"../ajax/result_ungtuyen.php",
                data:{
                    result:result,
                    id:id
                },success:function(data){
                    // location.reload();
                }
            });
        });
        $('#filter_point_uv .filter').change(function(){
            var val = $(this).val();
            var url = "/nha-tuyen-dung/ho-so-ung-tuyen.html";
            if(val != ''){
                window.location.href = "/nha-tuyen-dung/ho-so-ung-tuyen.html?ft="+val;
            }else{
                window.location.href = "/nha-tuyen-dung/ho-so-ung-tuyen.html";
            }
            
        });
    </script>
</body>
</html>