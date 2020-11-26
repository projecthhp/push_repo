<?
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
include("../home/config.php");
$id_user = getValue("id_user", "int", "POST", 0);
$id_user = (int) $id_user;
$id_cv = getValue("id_cv", "int", "POST", 0);
$id_cv = (int) $id_cv;
$result = array('data' => 0, 'code' => 000000, 'kq' => false);
$time_create = time();
if($id_user != 0 && $id_cv != 0) {
   $qr_update = "UPDATE `savecandicv` SET `cv` = 0 WHERE iduser = " . $id_user;
   $qr_update = "UPDATE `savecandicv` SET `cv` = 1 WHERE iduser = '" . $id_user . "' AND idcv = '" . $id_cv . "'";
   $update = new db_query($qr_update);
   $result = ['kq' => true, 'data' => 1, 'code' => 1];
   echo json_encode($result);
} else {
   echo json_encode($result);
}
?>