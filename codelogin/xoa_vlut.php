<?
	include("../home/config.php");

	if(isset($_GET['id']) && isset($_COOKIE["UID"]) && $_COOKIE['UT'] == 0)
	{
		$id_hoso = getValue("id","int","GET",0);
		$sql_delete = new db_query("DELETE FROM nop_ho_so WHERE id = ".$id_hoso);

		redirect('/ung-vien/viec-lam-ung-tuyen.html');
	}
	else
	{
		redirect('/');
	}
?>