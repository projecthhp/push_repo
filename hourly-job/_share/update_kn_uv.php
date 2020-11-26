<?php
include('../home/config.php');
if (isset($_POST['btn_luu'])) {
    $tencongty_uv = $_POST['tencongty_uv'];
    $ngaybatdau_uv = $_POST['ngaybatdau_uv'];
    $chucdanh_uv = $_POST['chucdanh_uv'];
    $ngayketthuc_uv = $_POST['ngayketthuc_uv'];
    $motacongviec_uv_kn = $_POST['motacongviec_uv_kn'];
    $query = "UPDATE vltg_kinh_nghiem SET tencongty_uv='$tencongty_uv', ngaybatdau_uv='$ngaybatdau_uv',chucdanh_uv='$chucdanh_uv', ngayketthuc_uv='$ngayketthuc_uv', motacongviec_uv_kn='$motacongviec_uv_kn'";
    $db_ex = new db_execute_return();
    $kq = $db_ex->db_execute($query);  
    
}
?>