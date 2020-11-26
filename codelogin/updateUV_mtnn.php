<?
	require_once('../home/config.php');
	
	$muc_tieu = getValue('mtnn','str','POST','');
	$uid = $_COOKIE["UID"];
	$data = [
		'muc_tieu_nghe_nghiep' => $muc_tieu,
		'use_update_time'	   => time()
	];
	$condition = [
		'use_id'=> $uid
	];
	update('user',$data,$condition);
	redirect('/ung-vien/ho-so-online.html');
?>