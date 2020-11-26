<?
	include('../home/config.php');
	$id = getValue('id','int','POST','0');
	$note = getValue('note','str','POST','');
	$db_qr = new db_query("UPDATE nop_ho_so SET note = '".$note."' WHERE id = ".$id." ");

	redirect('/nha-tuyen-dung/ho-so-ung-tuyen.html');
?>