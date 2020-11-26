<?
	require_once('../home/config.php');

	$knbt = getValue('knbt','str','POST','');
	$uid = $_COOKIE["UID"];
	$data = [
		'ki_nang_ban_than' => $knbt,
		'use_update_time' => time()
	];
	$condition = [
		'use_id' => $uid
	];
	update('user',$data,$condition);
	redirect('/ung-vien/ho-so-online.html');
?>