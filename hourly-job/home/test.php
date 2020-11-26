<?php
include('../home/config.php');
if (isset($_POST['btn_luu'])) {
    if(!isset($_COOKIE['UID'])) {
        header('Location: ../home/login1.php');
  } else {
        $id_uv = $_COOKIE['UID'];
  }
  $t2_sang = $_POST['t2_sang'];
    if ($_POST['t2_sang'] == ''){
       $t2_sang = 0;
    }
  $t3_sang = $_POST['t3_sang'];
  $t4_sang = $_POST['t4_sang'];
  $t5_sang = $_POST['t5_sang'];
  $t6_sang = $_POST['t6_sang'];
  $t7_sang = $_POST['t7_sang'];
  $chu_nhat_sang= $_POST['chu_nhat_sang'];
  $t2_chieu = $_POST['t2_chieu'];
  $t3_chieu = $_POST['t3_chieu'];
  $t4_chieu = $_POST['t4_chieu'];
  $t5_chieu = $_POST['t5_chieu'];
  $t6_chieu = $_POST['t6_chieu'];
  $t7_chieu = $_POST['t7_chieu'];
  $chu_nhat_chieu= $_POST['chu_nhat_chieu'];
  $t2_toi = $_POST['t2_toi'];
  $t3_toi = $_POST['t3_toi'];
  $t4_toi = $_POST['t4_toi'];
  $t5_toi = $_POST['t5_toi'];
  $t6_toi = $_POST['t6_toi'];
  $t7_toi = $_POST['t7_toi'];
  $chu_nhat_toi= $_POST['chu_nhat_toi'];
    if ($t3_sang =='') {
        $t3_sang = 0;
    }
    if ($t4_sang =='') {
        $t4_sang = 0;
    }
    if ($t5_sang =='') {
        $t5_sang = 0;
    }
    if ($t6_sang =='') {
        $t6_sang = 0;
    }
    if ($t7_sang =='') {
        $t7_sang = 0;
    }
    if ($chu_nhat_sang =='') {
        $chu_nhat_sang = 0;
    }
    if ($t2_chieu =='') {
        $t2_chieu = 0;
    }
    if ($t3_chieu =='') {
        $t3_chieu = 0;
    }
    if ($t4_chieu =='') {
        $t4_chieu = 0;
    }
    if ($t5_chieu =='') {
        $t5_chieu = 0;
    }
    if ($t6_chieu =='') {
        $t6_chieu = 0;
    }
    if ($t7_chieu =='') {
        $t7_chieu = 0;
    }
    if ($chu_nhat_chieu =='') {
        $chu_nhat_chieu = 0;
    }
    if ($t2_toi =='') {
        $t2_toi = 0;
    }
    if ($t3_toi =='') {
        $t3_toi = 0;
    }
    if ($t4_toi =='') {
        $t4_toi = 0;
    }
    if ($t5_toi =='') {
        $t5_toi = 0;
    }
    if ($t6_toi =='') {
        $t6_toi = 0;
    }
    if ($t7_toi =='') {
        $t7_toi = 0;
    }
    if ($chu_nhat_toi =='') {
        $chu_nhat_toi = 0;
    }
    $query = "insert into vltg_buoidilam_uv values('','$id_uv','$t2_sang','$t3_sang','$t4_sang','$t5_sang','$t6_sang','$t7_sang','$chu_nhat_sang','$t2_chieu','$t3_chieu','$t4_chieu','$t5_chieu','$t6_chieu','$t7_chieu','$chu_nhat_chieu','$t2_toi','$t3_toi','$t4_toi','$t5_toi','$t6_toi','$t7_toi','$chu_nhat_toi')";
    $db_ex = new db_execute_return();
    $kq = $db_ex->db_execute($query);  
    header('location:../home/buoicothedilam.php');
}
?>