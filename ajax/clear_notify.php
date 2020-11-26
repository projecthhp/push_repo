<?
	include('../home/config.php');

	$idnoti = getValue('idnoti','str','POST','');
	$idcom = getValue('idcom','str','POST','');
	if($idnoti != ''){
		$db_qr = new db_query("DELETE FROM notify WHERE NotifyID = ".$idnoti);
	}
	if($idcom != ''){
		$db_qr = new db_query("DELETE FROM notify WHERE CompanyID = ".$idcom);
	}
	
?>