<?
	include('../home/config.php');

	$db_qr = new db_query("SELECT count(*) FROM tbl_comment WHERE cmt_check = 0 ");

	$num = mysql_fetch_array($db_qr->result);
	$num = $num['count(*)'];
	echo $num;
?>