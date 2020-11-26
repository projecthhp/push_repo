<?
	include('../home/config.php');
	$iduser = getValue('iduser','int','POST',0);
	if($iduser != 0){
		$sql = "SELECT max(new_create_time) as max FROM new WHERE new_user_id = $iduser";
		$db_qr = new db_query($sql);
		$max = mysql_fetch_array($db_qr->result);
		$max = $max['max'];
		if($max + 3600 > time()){
			echo '0';
		}else{
			echo '1';
		}
	}
?>