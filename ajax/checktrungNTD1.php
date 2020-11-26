<?
	include('../home/config.php');

	$val = getValue('valCompany','str','POST','');
	$db_qr = new db_query("SELECT usc_company FROM user_company WHERE usc_id <> ".$_COOKIE['UID']." AND usc_company = '".$val."'");
	echo mysql_num_rows($db_qr->result);
?>