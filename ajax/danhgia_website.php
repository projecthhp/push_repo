<?
	include('../home/config.php');

	$from = getValue('from','str','POST',"");
	$bosung = getValue('bosung','str','POST',0);
	$danhgia = getValue('danhgia','str','POST',0);
	$rating = getValue('rating','int','POST',0);

	$db_qr = new db_query("INSERT INTO feedback_website(`feedback_from`,`bosung`,`danhgia`,`rate`,`usc_id`) VALUES ('".$from."','".$bosung."','".$danhgia."','".$rating."',".$_COOKIE['UID'].")");

?>