<?
	require_once('../home/config.php');
	
	$id_profile = getValue('id_profile','int','POST',0);
	if($id_profile > 0){
		$db_sl = new db_query("SELECT link FROM user_cv_upload WHERE id_upload = ".$id_profile);
		if(mysql_num_rows($db_sl->result) > 0){
			$row = mysql_fetch_assoc($db_sl->result);
			$link = $row['link'];
			if(file_exists($link)) unlink($link);
			$db_qr = new db_query('DELETE FROM user_cv_upload WHERE id_upload = '.$id_profile);
			echo json_encode([
				'result'=> '1',
				'messages' => 'Xóa bản ghi thành công !!!'
			]);
		}
	}else{
		echo json_encode([
			'result' => '0',
			'messages' => 'error'
		]);
	}
?>