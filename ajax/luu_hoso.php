<?
	include('../home/config.php');

	if(isset($_COOKIE['UID']))
	{
		$id_uv = getValue('id_uv','str','POST','');
		$id_uv = replaceMQ($id_uv);
		$id_ntd = $_COOKIE['UID'];
		$id_ntd = replaceMQ($id_ntd);
		$time = date('Y-m-d',time());
		$time = strtotime($time);
		$db_check = new db_query("SELECT id_uv,id_ntd FROM tbl_luuhoso_uv WHERE id_uv = ".$id_uv." AND id_ntd = ".$id_ntd);
		if(mysql_num_rows($db_check->result) > 0)
		{
			$sql_delete = new db_query("DELETE FROM tbl_luuhoso_uv WHERE id_uv = ".$id_uv);
			echo '0';
		}
		else
		{
			$insert = new db_query("INSERT INTO tbl_luuhoso_uv(`id_ntd`,`id_uv`,`create_time`) VALUES ('".$id_ntd."','".$id_uv."','".$time."')");
			echo '1';
		}
		
	}
	else
	{
		echo '0';
	}
?>