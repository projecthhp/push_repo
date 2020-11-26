<?
	require_once('../home/config.php');


	if(isset($_COOKIE['UID']))
	{
			$text_kinang = getValue('text_kinang','str','POST','');
			$text_kinang = nl2br($text_kinang,false);

			$db_update = new db_query("UPDATE user SET ki_nang_ban_than = '".$text_kinang."', use_update_time = '".time()."' WHERE use_id = ".$_COOKIE["UID"]);

			$sl_mt = new db_query("SELECT ki_nang_ban_than FROM user WHERE use_id = ".$_COOKIE["UID"]);

			$row = mysql_fetch_array($sl_mt->result);
			$result = array( 
				'ki_nang_ban_than' => $row['ki_nang_ban_than']
			);
			echo json_encode($result);
	}
	else
	{
		die('loi');
	}
?>