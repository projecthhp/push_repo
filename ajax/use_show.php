<?
	include('../home/config.php');

	if(isset($_COOKIE["UID"]) && $_COOKIE["UT"] == 0){
		$val = getValue('val','int','POST',0);
		$db_qr = new db_query("UPDATE user SET usc_search = ".$val." , use_update_time = ".time()." WHERE use_id = ".$_COOKIE['UID']." ");
		echo $val;
	}else{
		echo '0';
		redirect('/');
	}
?>