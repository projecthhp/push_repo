<?
	include('../home/config.php');

	$result = getValue('result','int','POST',0);
	$id = getValue('id','int','POST',0);
	
	$db_qr = new db_query("UPDATE nop_ho_so SET result = ".$result.", date_result = ".time()." WHERE id = ".$id);

	if($result == 1){
		echo '1';
	}else{
		echo '0';
	}
?>