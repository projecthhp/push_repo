<?php
include('../home/config.php');
if (isset($_POST['btn_luu'])) {
    if(!isset($_COOKIE['UID'])) {
      
    } else{
      $id_uv = $_COOKIE['UID'];
    $nganh_uv = $_POST['nganh_uv'];
    $nganh_uv = implode(',',$nganh_uv);
    $noilamviec_uv = $_POST['noilamviec_uv'];
    $noilamviec_uv = implode(',',$noilamviec_uv);
    $trangthailuong_uv=$_POST['trangthailuong_uv'];
    $mucluong_uv = $_POST['mucluong_uv'];
    $luong_date_uv=$_POST['luong_date_uv'];
    $congviec_uv = $_POST['congviec_uv'];
    $hinhthuc_uv = $_POST['hinhthuc_uv'];
    $capbac_uv = $_POST['capbac_uv']; 
    $query = "UPDATE vltg_user_uv SET nganh_uv='$nganh_uv',noilamviec_uv='$noilamviec_uv', congviec_uv='$congviec_uv',trangthailuong_uv='$trangthailuong_uv',mucluong_uv='$mucluong_uv',luong_date_uv='$luong_date_uv', hinhthuc_uv='$hinhthuc_uv',capbac_uv='$capbac_uv' WHERE id_uv='$id_uv'";
    $db_ex = new db_execute_return();
    $kq = $db_ex->db_execute($query);  

}
}


?>