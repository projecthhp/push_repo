<?
include("../home/config.php");
require_once("../functions/functions.php");
$id_bc   = getValue("id_bc", "int", "POST", 0);
$id_bc   = (int) $id_bc;
$userid = getValue("iduser", "int", "POST", 0);
$userid = (int) $userid;
$result = array('data' => null, 'code' => 0, 'kq' => false);

if ($id_bc > 0) {
   $db_qrcheck = new db_query("SELECT id_hocvan FROM user_hocvan WHERE id_hocvan = '" . $id_bc . "' AND use_id = '" . $userid . "' LIMIT 1");
   if (mysql_num_rows($db_qrcheck->result) > 0) {
      $db_ex = new db_execute("DELETE FROM user_hocvan WHERE id_hocvan = '" . $id_bc . "' AND use_id = '" . $userid . "'");
      $result = array('data' => null, 'code' => 1, 'kq' => true);
		echo json_encode($result);
   } else {
      echo json_encode($result);
   }
} else {
   echo json_encode($result);
}
