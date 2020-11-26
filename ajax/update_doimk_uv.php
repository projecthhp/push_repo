<?
	include('../home/config.php');

	$id = $_COOKIE['UID'];
	$id = (int)intval($id);
	$password_first = getValue("password_first","str","POST","");
	$password_first = replaceMQ($password_first);
	$password_second = getValue("password_second","str","POST","");
	$password_second = replaceMQ($password_second);
	$password_second = md5($password_second);
	$user = new db_query("SELECT use_mail FROM user WHERE use_id = ".$id);
	if(mysql_num_rows($user->result) > 0)
	{
		$update = new db_query("UPDATE user SET use_pass = '".$password_second."' WHERE use_id = ".$id);
		echo "Đổi mật khẩu thành công";
	}
?>