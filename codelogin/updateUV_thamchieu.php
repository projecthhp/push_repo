<?
	require_once('../home/config.php');

	if(isset($_COOKIE['UID']))
	{
		$ho_ten = getValue("ho_ten","str","POST","");
		$ho_ten = replaceMQ($ho_ten);
		$chuc_vu = getValue("chuc_vu","str","POST","");
		$chuc_vu = replaceMQ($chuc_vu);
		$sdt = getValue("sdt","str","POST","");
		$sdt = replaceMQ($sdt);
		$tinh_thanh = getValue("tinh_thanh","str","POST","");
		$tinh_thanh = replaceMQ($tinh_thanh);

		$db_update = new db_query("UPDATE user_tham_chieu SET ho_ten = '".$ho_ten."', sdt = '".$sdt."',chuc_vu = '".$chuc_vu."',tinh_thanh = '".$tinh_thanh."' WHERE id_user = ".$_COOKIE['UID']);
		unset($db_update);
		redirect('/thong-tin-tai-khoan-ung-vien.html');
	}
	else
	{
		redirect('/');
	}

?>