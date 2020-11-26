<?
	include('../home/config.php');

	$id = $_COOKIE['UID'];
	$id = (int)intval($id);
	$password_first = getValue("password_first","str","POST","");
	$password_first = replaceMQ($password_first);
	$password_second = getValue("password_second","str","POST","");
	$password_second = replaceMQ($password_second);
	$password_second = md5($password_second);
	if($password_second != ''){
		$update = new db_query("UPDATE user SET use_pass = '".$password_second."' WHERE use_id = ".$id);
	}
	
	redirect('/ung-vien/doi-mat-khau.html');
?>