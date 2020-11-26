<?
	include('../home/config.php');

	$newid = getValue('idnew','int','POST',0);
	if($newid>0){
		$db_qrs = new db_query("SELECT max(new_update_time) as max FROM new WHERE new_user_id = ".$_COOKIE['UID']);
		$row = mysql_fetch_array($db_qrs->result);
		$max = $row['max'];
		if($max + 3600 > time()){
			echo '0';
		}else{
			$db_qr = new db_query("UPDATE new SET new_refresh = new_refresh + 1,new_update_time = ".time()." WHERE new_id = ".$newid." ");
			echo '1';
		}
	}
?>