<?
	include('../home/config.php');

	$uid = getValue('uid','int','GET','');
	$cid = getValue('cid','int','GET','');
	
	$db_qr = new db_query("DELETE FROM tbl_point_used WHERE usc_id = ".$cid." AND use_id = ".$uid." ");
	unset($db_qr);
	redirect('/nha-tuyen-dung/ho-so-loc-diem.html');
?>