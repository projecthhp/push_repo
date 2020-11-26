<?
	require_once('../home/config.php');
	$result = array();

	if(isset($_POST['id']))
	{
		$id = getValue('id','str','POST','');
		$id = replaceMQ($id);
		
		

		$db_get = new db_query("SELECT * FROM use_kinhnghiem WHERE id_kinhnghiem = ".$id);
		if(mysql_num_rows($db_get->result) > 0)
		{	
			$row = mysql_fetch_array($db_get->result);
			
			$result['use_chucdanh'] = $row['use_chucdanh'];
			$result['use_cty_lamviec'] = $row['use_cty_lamviec'];
			$result['tg_batdau'] = date('Y-m-d',$row['tg_batdau']);
			$result['tg_ketthuc'] = date('Y-m-d',$row['tg_ketthuc']);
			if($row['them_thongtin'] != null || $row['them_thongtin'] != '')
			{
				$result['thongtin_bosung'] = $row['them_thongtin'];
			}
			else
			{
				$result['thongtin_bosung'] = "Chưa cập nhật";
			}

			echo json_encode($result);
		}
		else
		{
			$result['msg'] = "Return result = 0";
			echo json_encode($result);
		}
	}
	else
	{
		$result['msg'] = "NOT EXIST ID";
		echo json_encode($result);
	}
?>