<?
	include("../home/config.php");

	if(isset($_GET['id_hoso']) && isset($_COOKIE["UID"]) && $_COOKIE['UT'] == 1)
	{
		$id_hoso = getValue("id_hoso","str","GET","");
		$sql_delete = new db_query("DELETE FROM tbl_luuhoso_uv WHERE id_hoso = ".$id_hoso);

		redirect('/nha-tuyen-dung/ho-so-da-luu.html');
	}
	else
	{
		echo 'Nghi vấn hack';die();
	}
?>