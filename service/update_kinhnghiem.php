<?
include("../home/config.php");
$type = getValue("type", "int", "POST", '');
$lg_chucdanh = getValue("lg_chucdanh", "str", "POST", "");
$lg_chucdanh = replaceMQ(trim($lg_chucdanh));
$lg_congty = getValue("lg_congty", "str", "POST", "");
$lg_congty = replaceMQ(trim($lg_congty));
$lg_motaexp = getValue("lg_motaexp", "str", "POST", "");
$lg_motaexp = replaceMQ(trim($lg_motaexp));
$lg_onemoretime = getValue("lg_onemoretime", "str", "POST", "");
$lg_onemoretime = replaceMQ(trim($lg_onemoretime));
$lg_onemoretime = str_replace("/", "-", $lg_onemoretime);
$lg_onemoretime = strtotime($lg_onemoretime);
$lg_twomoretime = getValue("lg_twomoretime", "str", "POST", "");
$lg_twomoretime = replaceMQ(trim($lg_twomoretime));
$lg_twomoretime = str_replace("/", "-", $lg_twomoretime);
$lg_twomoretime = strtotime($lg_twomoretime);
$userid = getValue("iduser", "int", "POST", 0);
$userid = (int) $userid;
$code = getValue("code", "str", "POST", "");
$code = replaceMQ(trim($code));
$id_truong = getValue("id_truong", 'int', 'POST', 0);
$id_truong = (int) $id_truong;
$result = array('data' => null, 'code' => 0, 'kq' => false);

$db_qrcheck = new db_query("SELECT use_id FROM user WHERE use_id = '" . $userid . "' LIMIT 1");
if (mysql_num_rows($db_qrcheck->result) > 0) {
	if ($type == 1) {
		if ($lg_chucdanh != '' && $id_truong == 0) {
			$db_ex = new db_execute("INSERT INTO use_kinhnghiem(use_id,use_cty_lamviec,use_chucdanh,them_thongtin,tg_batdau,tg_ketthuc) 
                               VALUES('" . $userid . "','" . $lg_congty . "','" . $lg_chucdanh . "','" . $lg_motaexp . "','" . $lg_onemoretime . "','" . $lg_twomoretime . "')");
			$result = array('data' => null, 'code' => 1, 'kq' => true);
			echo json_encode($result);
		} else {
			echo json_encode($result);
		}
		unset($lg_bc, $lg_truonghoc, $lg_chuyennganh, $lg_xeploai, $lg_bosungth, $code, $db_qrcheck, $db_ex);
	} else if ($type == 0) {
		if ($lg_chucdanh != '' && $id_truong > 0) {
			$db_ex = new db_execute("UPDATE use_kinhnghiem SET 
                              use_cty_lamviec='" . $lg_congty . "',use_chucdanh='" . $lg_chucdanh . "',them_thongtin='" . $lg_motaexp . "',tg_batdau='" . $lg_onemoretime . "',tg_ketthuc='" . $lg_twomoretime . "'
                              WHERE id_kinhnghiem = " . $id_truong . " AND use_id = " . $userid . "");
			$result = array('data' => null, 'code' => 1, 'kq' => true);
			echo json_encode($result);
		} else {
			echo json_encode($result);
		}
	} else if ($type == -1) {
		if ($id_truong > 0) {
			$db_ex = new db_execute("DELETE FROM kinh_nghiem WHERE kn_id = '" . $id_truong . "' AND kn_use_id = '" . $userid . "'");
			unset($db_ex);
			echo 1;
		} else {
			echo 0;
		}
		unset($code, $id_truong);
	}
	$db_ex = new db_execute("UPDATE user SET use_update_time=" . time() . " WHERE use_id = '" . $userid . "'");
	unset($db_ex);
} else {
	echo json_encode($result);
}
