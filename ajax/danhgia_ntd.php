<?
	include('../home/config.php');

	$call = getValue('call','int','POST',0);
	$deportment = getValue('deportment','int','POST',0);
	$candi_support = getValue('candi_support','str','POST',0);
	$rating = getValue('rating','int','POST',0);
	$danhgia_chuyenvien = getValue('danhgia_chuyenvien','str','POST','');

	$db_qr = new db_query("INSERT INTO feedback_company(`chuyenvien_call`,`deportment`,`candi_support`,`rate`,`note`,`usc_id`) VALUES ('".$call."','".$deportment."','".$candi_support."','".$rating."','".$danhgia_chuyenvien."',".$_COOKIE['UID'].")");

?>