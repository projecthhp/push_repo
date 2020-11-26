<?php
include('../home/config.php');
if (isset($_POST['btn_luu'])) {
    if(!isset($_COOKIE['UID'])) {
      
    } else{
      $id_uv = $_COOKIE['UID'];
    $ngaysinh_uv =$_POST['ngaysinh_uv'];
    $ngaysinh_uv = implode('-',$ngaysinh_uv);
    $gioitinh_uv = $_POST['gioitinh_uv'];
    $tinhtrang_uv = $_POST['tinhtrang_uv'];
    $name_uv = $_POST['name_uv'];
    $email_uv = $_POST['email_uv'];
    $nameA=$_FILES['file_image']['name'];
    $tmpA=$_FILES['file_image']['tmp_name'];

    move_uploaded_file($tmpA, '../public/images/'.$nameA);
    $diachi_uv = $_POST['diachi_uv'];
    $thanhpho_uv = $_POST['thanhpho_uv']; 
    $huyen_uv = $_POST['huyen_uv']; 
    $query = "UPDATE vltg_user_uv SET file_image ='$nameA',ngaysinh_uv ='$ngaysinh_uv',gioitinh_uv='$gioitinh_uv',tinhtrang_uv='$tinhtrang_uv', name_uv='$name_uv', email_uv='$email_uv', diachi_uv='$diachi_uv',thanhpho_uv='$thanhpho_uv',huyen_uv ='$huyen_uv' WHERE id_uv='$id_uv'";
    $db_ex = new db_execute_return();
    $kq = $db_ex->db_execute($query);  
}
}

?>