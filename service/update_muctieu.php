<?
include("../home/config.php");
$lgtitle = getValue("lgtitle", "str", "POST", "");
$lgtitle = replaceMQ(trim($lgtitle));
$userid = getValue("iduser", "int", "POST", 0);
$userid = (int) $userid;
$result = array('data' => null, 'code' => 0, 'kq' => false);

$db_qrcheck = new db_query("SELECT use_id FROM user WHERE use_id = '" . $userid . "' LIMIT 1");
if (mysql_num_rows($db_qrcheck->result) > 0) {
	if ($lgtitle != '') {
		$db_update = new db_query("UPDATE user SET muc_tieu_nghe_nghiep = '" . $lgtitle . "', use_update_time = '" . time() . "' WHERE use_id = '" . $userid . "'");
		$result = array('data' => null, 'code' => 1, 'kq' => true);
		echo json_encode($result);
	} else {
		echo json_encode($result);
	}
} else {
	echo json_encode($result);
}
