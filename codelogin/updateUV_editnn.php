<?
	require_once('../home/config.php');

	if(isset($_COOKIE["UID"]))
	{
		if(isset($_POST['update']))
		{
			$id_language 	= getValue('id_language','arr','POST','');
			$language 		= getValue('language','arr','POST','');
			$certificate 	= getValue('certificate','arr','POST','');
			$result 		= getValue('result','arr','POST','');

			for($i = 0; $i < count($language);$i++){
				$data = [
					'id_ngonngu' => $language[$i],
					'chung_chi'	 => $certificate[$i],
					'ket_qua'	 => $result[$i]
				];
				$condition = [
					'id_ngoaingu' => $id_language[$i]
				];
				update('use_ngoaingu',$data,$condition);
				unset($data,$condition);
			}
			update('user',['use_update_time'=>time()],['use_id'=>$_COOKIE['UID']]);
			redirect('/ung-vien/ho-so-online.html');
		}
		else
		{
			redirect('/');
		}
	}
	else
	{
		echo 'not UID';
	}
?>