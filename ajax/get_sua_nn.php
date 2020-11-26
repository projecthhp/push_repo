<?
	require_once('../home/config.php');
	$result = array();

	if(isset($_POST['id']))
	{
		$id = getValue('id','str','POST','');
		$id = replaceMQ($id);
		
		

		$db_get = new db_query("SELECT * FROM use_ngoaingu WHERE id_ngoaingu = ".$id);
		if(mysql_num_rows($db_get->result) > 0)
		{	
			$row = mysql_fetch_array($db_get->result);
			
			$result['id_ngonngu'] = $row['id_ngonngu'];
			$result['chung_chi'] = $row['chung_chi'];
			$result['ket_qua'] = $row['ket_qua'];

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