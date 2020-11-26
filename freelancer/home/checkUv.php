<?php 
	require_once '../home/config.php';
	if (!isset($_COOKIE['UID'])) {
		if (!isset($_COOKIE['UT'])) {
			header('Location:loginuv.php?error=Bạn chưa đăng nhập!');
		}
	}
?>