<?
	require_once('../home/config.php');

	if(isset($_COOKIE['UID']))
	{
		$id = getValue("id","str","POST",0);

		$db_delete = new db_query("DELETE FROM use_kinhnghiem WHERE id_kinhnghiem = ".$id);
		echo '1';
	}
	else
	{
		redirect('/');
	}
?>