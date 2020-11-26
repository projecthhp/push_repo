<?
include("../home/config.php");
require_once("../functions/functions.php");
$id_language   = getValue("id_language", "int", "POST", 0);
$id_language   = (int) $id_language;
$userid = getValue("iduser", "int", "POST", 0);
$userid = (int) $userid;
$result = array('data' => null, 'code' => 0, 'kq' => false);

if ($id_language > 0) {
   $db_qrcheck = new db_query("SELECT id_ngoaingu FROM use_ngoaingu WHERE id_ngoaingu = '" . $id_language . "' AND use_id = '" . $userid . "' LIMIT 1");
   if (mysql_num_rows($db_qrcheck->result) > 0) {
      $db_ex = new db_execute("DELETE FROM use_ngoaingu WHERE id_ngoaingu = '" . $id_language . "' AND use_id = '" . $userid . "'");
      $result = array('data' => null, 'code' => 1, 'kq' => true);
		echo json_encode($result);
   } else {
      echo json_encode($result);
   }
} else {
   echo json_encode($result);
}
