<?
	include("../home/config.php");

	if(isset($_GET['id']) && isset($_COOKIE["UID"]) && $_COOKIE['UT'] == 1)
	{
		$id_hoso = getValue("id","str","GET","");
		$sql_delete = new db_query("DELETE FROM nop_ho_so WHERE id = ".$id_hoso);

		redirect('/nha-tuyen-dung/ho-so-ung-tuyen.html');
	}
	else
	{
		echo 'Nghi vấn hack';die();
	}
?>