<?
	include('../home/config.php');
	if(isset($_COOKIE["UID"]))
	{
		$pass = getValue('password','str','POST','');
		$pass = replaceMQ($pass);
		$pass = md5($pass);
		
		$check = new db_query("SELECT use_pass FROM user WHERE use_id = ".$_COOKIE['UID']);
		if(mysql_num_rows($check->result) > 0)
		{
			$row = mysql_fetch_array($check->result);
			if($pass === $row['use_pass'])
			{
				echo '1';
			}
		}
		else
		{
			echo '0';
		}
	}
	else
	{
		redirect('/');
	}
?>