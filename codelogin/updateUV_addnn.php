<?
	require_once('../home/config.php');

	if(isset($_COOKIE["UID"]))
	{
		if($_POST['update'])
		{
			$language = getValue("language",'int','POST',0);

			$certificate = getValue('certificate','str','POST','');
			$certificate = replaceMQ($certificate);
			
			$result = getValue("result","str","POST","");
			$result = replaceMQ($result);

			$data = [
				'use_id' 		=> $_COOKIE["UID"],
				'id_ngonngu'    => $language,
				'chung_chi'		=> $certificate,
				'ket_qua'		=> $result
			];
			add('use_ngoaingu',$data);
			update('user',['use_update_time'=>time()],['use_id'=>$_COOKIE['UID']]);
			redirect('/ung-vien/ho-so-online.html');
		}
		else{
			echo 'not submit';
		}
	}
	else
	{
		echo 'not UID';
	}
?>