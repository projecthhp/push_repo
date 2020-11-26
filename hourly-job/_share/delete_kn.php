<?php
include('../home/config.php');
if(isset($_GET['maxoa'])){
	$maxoa=$_GET['maxoa'];
	$sql="delete from vltg_kinh_nghiem where id_kn='$maxoa'";
    $db_ex = new db_execute_return();
    $kq = $db_ex->db_execute($sql); 
    // redirect('../home/kinhnghiemlamviec.php');
}
  
?>