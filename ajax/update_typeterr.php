<?
	include('../home/config.php');

	$uid = getValue('uid','int','POST',0);
	$value = getValue('value','int','POST',0);

	$db_qr = new db_query("UPDATE tbl_point_used SET type_err = ".$value." WHERE use_id = ".$uid." AND usc_id = ".$_COOKIE['UID']." ");
?>