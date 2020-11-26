<?
	require_once('../home/config.php');
	$result = array();

	if(isset($_POST['id']))
	{
		$id = getValue('id','str','POST','');
		$id = replaceMQ($id);
		
		

		$db_get = new db_query("SELECT * FROM user_hocvan WHERE id_hocvan = ".$id);
		if(mysql_num_rows($db_get->result) > 0)
		{	
			$row_bc = mysql_fetch_array($db_get->result);
			
			$result['truong_hoc'] = $row_bc['truong_hoc'];
			$result['bang_cap'] = $row_bc['bang_cap'];
			$result['tg_batdau'] = date('Y-m-d',$row_bc['tg_batdau']);
			$result['tg_ketthuc'] = date('Y-m-d',$row_bc['tg_ketthuc']);
			$result['chuyen_nganh'] = $row_bc['chuyen_nganh'];
			$result['xep_loai'] = $row_bc['xep_loai'];
			if($row_bc['thongtin_bosung'] != null || $row_bc['thongtin_bosung'] != '')
			{
				$result['thongtin_bosung'] = $row_bc['thongtin_bosung'];
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