<?php 
	require_once 'config.php';
	$so_dien_thoai = $_POST["so_dien_thoai"];
	$sql = "SELECT * FROM flc_user_freelancer WHERE so_dien_thoai = '$so_dien_thoai'";
	$db_qr = new db_query($sql);
	$check = mysql_fetch_row($db_qr->result);
	if ($check)	{
		echo "true";
	}else{
		echo "false";
	}
?>