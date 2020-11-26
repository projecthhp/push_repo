<?
	include('../home/config.php');

	$data_id = getValue('data_id','int','POST',0);
	if($data_id > 0){
		$db_qr = new db_query("DELETE FROM `tbl_message` WHERE mes_id = ".$data_id);
		echo '1';
	}else{
		echo '0';
	}
	
?>