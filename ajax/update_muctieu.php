<?
	require_once('../home/config.php');


	if(isset($_COOKIE['UID']))
	{
			$muc_tieu = getValue('text_muctieu','str','POST','');
			$muc_tieu = nl2br($muc_tieu,false);

			$db_update = new db_query("UPDATE user SET muc_tieu_nghe_nghiep = '".$muc_tieu."', use_update_time = '".time()."' WHERE use_id = ".$_COOKIE["UID"]);

			$sl_mt = new db_query("SELECT muc_tieu_nghe_nghiep FROM user WHERE use_id = ".$_COOKIE["UID"]);

			$row = mysql_fetch_array($sl_mt->result);
			$result = array( 
				'muc_tieu_nghe_nghiep' => $row['muc_tieu_nghe_nghiep']
			);
			echo json_encode($result);
	}
	else
	{
		die('loi');
	}
?>