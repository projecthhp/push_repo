<?
	include('../home/config.php');

	$db_qr = new db_query("SELECT count(*) FROM new JOIN user_company ON new.new_user_id = user_company.usc_id WHERE new_thuc = 0 AND new_md5=''");
	$num = mysql_fetch_array($db_qr->result);
	$num = $num['count(*)'];
	echo $num;
?>