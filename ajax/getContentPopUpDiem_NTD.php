<?
	include('../home/config.php');

	$id = getValue('id','int','POST',0);

	$db_qr = new db_query("SELECT note_uv FROM tbl_point_used WHERE usc_id = ".$_COOKIE['UID']." AND use_id = ".$id." ");
	$row = mysql_fetch_array($db_qr->result);
	echo $row['note_uv'];
?>