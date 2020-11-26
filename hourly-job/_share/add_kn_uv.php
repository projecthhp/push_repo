<?php
include('../home/config.php');
if (isset($_POST['btn_submit'])) {
    $tencongty_uv = $_POST['tencongty_uv'];
    $ngaybatdau_uv = $_POST['ngaybatdau_uv'];
    $chucdanh_uv = $_POST['chucdanh_uv'];
    $ngayketthuc_uv = $_POST['ngayketthuc_uv'];
    $motacongviec_uv_kn = $_POST['motacongviec_uv_kn'];
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');

    $data = [
        'id_uv' => $_COOKIE['UID'],
        'tencongty_uv' => $tencongty_uv,
        'ngaybatdau_uv' => $ngaybatdau_uv,
        'chucdanh_uv' => $chucdanh_uv,
        'ngayketthuc_uv' => $ngayketthuc_uv,
        'motacongviec_uv_kn' => $motacongviec_uv_kn,
        'created_at' => $created_at,
        'updated_at' => $updated_at
    ];

    add('vltg_kinh_nghiem',$data);
}


?>