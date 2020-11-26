<?
	require_once('../home/config.php');
	if(isset($_GET['id']) && isset($_COOKIE["UID"]) && $_COOKIE['UT'] == 1)
	{
		$id = $_GET['id'];
		$db_delete = new db_query("DELETE FROM `new` WHERE new_id = ".$id);
		redirect('/nha-tuyen-dung/thong-tin-chung.html');
	}
	else
	{
		echo 'Nghi vấn hack';die();
	}
?>