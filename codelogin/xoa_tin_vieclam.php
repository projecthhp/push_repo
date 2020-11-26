<?
	include("../home/config.php");

	if(isset($_GET['id_hoso']) && isset($_COOKIE["UID"]) && $_COOKIE['UT'] == 0)
	{
		$id_hoso = getValue("id_hoso","str","GET","");
		$sql_delete = new db_query("DELETE FROM tbl_luutin WHERE id = ".$id_hoso);

		redirect('/ung-vien/viec-lam-da-luu.html');
	}
	else
	{
		redirect('/');
	}
?>