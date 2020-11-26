<?
	include_once('../home/config.php');
	if (isset($_COOKIE['UID'])) {
		$id_tin = getValue("id_tin","str","POST","");
		$id_tin = replaceMQ($id_tin);
		$time = time();

		$sql_check = new db_query("SELECT id_tin FROM tbl_luutin WHERE id_tin = ".$id_tin." AND id_uv = ".$_COOKIE['UID']);
		if(mysql_num_rows($sql_check->result) == 0)
		{
			$insert = new db_query("INSERT INTO tbl_luutin(`id_tin`,`id_uv`,`create_time`) VALUES ('".$id_tin."','".$_COOKIE['UID']."','".$time."')");
			echo '1';
		}
		else
		{
			$delete = new db_query("DELETE FROM `tbl_luutin` WHERE id_tin = ".$id_tin);
			echo '0';
		}
		
	}
?>