<?
	include('../home/config.php');

	$id = $_COOKIE['UID'];
	$id = (int)intval($id);

	$usc_pass = getValue("password_second","str","POST","");
	$usc_pass = replaceMQ($usc_pass);
	$usc_pass = md5($usc_pass);
	if($usc_pass != ""){
		$update = new db_query("UPDATE user_company SET usc_pass = '".$usc_pass."', usc_update_time = '".time()."' WHERE usc_id = ".$id);
		echo '1';
	}
?>