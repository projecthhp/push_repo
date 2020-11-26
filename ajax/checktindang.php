<?
	include('../home/config.php');

	$db_qr = new db_query("SELECT count(*) FROM new WHERE new_thuc = 0 AND new_md5=''");
	$num = mysql_fetch_array($db_qr->result);
	$num = $num['count(*)'];
	echo $num;
?>