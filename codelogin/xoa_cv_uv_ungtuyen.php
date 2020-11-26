<?
	include("../home/config.php");

	if(isset($_GET['id']) && isset($_COOKIE["UID"]) && $_COOKIE['UT'] == 0)
	{
		$id_hoso = getValue("id","str","GET","");
		$sql_delete = new db_query("DELETE FROM uv_nophoso WHERE id = ".$id_hoso);

		redirect('/ung-vien/viec-lam-ung-tuyen.html');
	}
	else
	{
		redirect('/');
	}
?>