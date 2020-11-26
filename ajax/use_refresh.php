<?
	include('../home/config.php');

	if(isset($_COOKIE["UID"]) && $_COOKIE["UT"] == 0){
		$db_qr = new db_query("UPDATE user SET use_update_time = ".time()." AND use_id = ".$_COOKIE['UID']." ");
		echo '1';
	}else{
		echo '0';
		redirect('/');
	}
?>