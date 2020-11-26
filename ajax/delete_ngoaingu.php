<?
	require_once('../home/config.php');

	if(isset($_COOKIE['UID']))
	{
		$id = getValue("id","str","POST",0);

		$db_delete = new db_query("DELETE FROM use_ngoaingu WHERE id_ngoaingu = ".$id);
		echo '1';
	}
	else
	{
		redirect('/');
	}
?>