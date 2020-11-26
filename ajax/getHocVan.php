<?
	include('../home/config.php');
	require_once("../functions/array_front_end.php");

	$id = getValue('id','int','POST',0);

	$db_qr = new db_query("SELECT * FROM user_hocvan WHERE id_hocvan = ".$id);

	$row = mysql_fetch_array($db_qr->result);
	echo json_encode(array(
		'result'=>1,
		'truong_hoc'=>$row['truong_hoc'],
		'bang_cap'=>$row['bang_cap'],
		'tg_batdau'=>date('Y-m-d',$row['tg_batdau']),
		'tg_ketthuc'=>date('Y-m-d',$row['tg_ketthuc']),
		'chuyen_nganh'=>$row['chuyen_nganh'],
		'xep_loai'=>$row['xep_loai'],
		'txt_xeploai' => $array_xl[$row['xep_loai']],
		'thongtin_bs'=>$row['thongtin_bosung']
	));
?>