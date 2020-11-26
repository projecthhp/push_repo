<?
include("../home/config.php");
require_once("../functions/functions.php");
$id_kn   = getValue("id_kn", "int", "POST", 0);
$id_kn   = (int) $id_kn;
$userid = getValue("iduser", "int", "POST", 0);
$userid = (int) $userid;
$result = array('data' => null, 'code' => 0, 'kq' => false);

if ($id_kn > 0) {
   $db_qrcheck = new db_query("SELECT id_kinhnghiem FROM use_kinhnghiem WHERE id_kinhnghiem = '" . $id_kn . "' AND use_id = '" . $userid . "' LIMIT 1");
   if (mysql_num_rows($db_qrcheck->result) > 0) {
      $db_ex = new db_execute("DELETE FROM use_kinhnghiem WHERE id_kinhnghiem = '" . $id_kn . "' AND use_id = '" . $userid . "'");
      $result = array('data' => null, 'code' => 1, 'kq' => true);
		echo json_encode($result);
   } else {
      echo json_encode($result);
   }
} else {
   echo json_encode($result);
}
