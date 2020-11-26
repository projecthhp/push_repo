<<<<<<< HEAD
<?php
include('../home/config.php');



header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Thong_ke_SL_key.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo '<table border="1px solid black">';
echo '<tr>';
echo '<td><strong> Key </strong></td>';
echo '<td><strong> Số tin tuyển dụng</strong></td>';
foreach ($arrtag_key as $keys => $key) {
    if($key['tag_name'] != ''){
        $sql = "SELECT count(*) FROM new JOIN user_company ON new.new_user_id = user_company.usc_id WHERE 1 AND (FIND_IN_SET('".$key['tag_id']."',new_tag) OR new_title LIKE '%".str_replace(' ','%',$key['tag_name'])."%') AND FIND_IN_SET('".$_COOKIE['cit_id']."',new_city) ";
        $db_qr = new db_query($sql);
        $row = mysql_fetch_assoc($db_qr->result);
        $count = $row['count(*)'];
        echo'<table border="1px solid black">';
        echo'<tr>';
        echo'<td>'.$key_sql.'</td>';
        echo'<td>'.$count.'</td>';
    }
}
$a = 1;
echo '</tr>';
echo '</table>';


$next = $_COOKIE['cit_id'] + 1;
setcookie('cit_id', $next ,time() + 86400,'/');
echo '<meta http-equiv="refresh" content="1"/>';
=======
<?
    include('../home/config.php');
    include('../functions/send_mail.php');
    SendRegisterTVC('duongtunglam191@gmail.com','Dương Tùng Lâm','https://timviec365.com/');
?>
>>>>>>> 12bb0cb9ff663446bb65b5a9c100a529c228166a
