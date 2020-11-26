<?
	require_once('../home/config.php');

	$id = getValue("id","int","POST",0);

	$db_delete = new db_query("DELETE FROM user_hocvan WHERE id_hocvan = ".$id);
	echo '1';
?>