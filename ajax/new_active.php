<?
	include('../home/config.php');

	$newid = getValue('idnew','int','POST',0);

	if($newid>0){
		$db_qr = new db_query("UPDATE new SET new_active = new_active = 0 WHERE new_id = ".$newid." ");
	}
?>