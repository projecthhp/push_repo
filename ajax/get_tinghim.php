<?
	include('../home/config.php');

	$id = getValue('id','int','POST','0');
	
	$db_get = new db_query("SELECT bg_quyenloi,bg_uudai,bg_mota FROM bang_gia WHERE bg_id = ".$id);
	$row = mysql_fetch_array($db_get->result);

	echo json_encode(array(
		'quyen_loi'=>$row['bg_quyenloi'],
		'uu_dai'=>$row['bg_uudai'],
		'description'=>$row['bg_mota'],
	));

?>