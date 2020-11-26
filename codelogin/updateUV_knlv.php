<?
	require_once('../home/config.php');

	if(isset($_COOKIE["UID"]))
	{
		if($_POST['update'])
		{
			$position = getValue("position",'str','POST','');
			$position = replaceMQ($position);
			$company = getValue('company','str','POST','');
			$company = replaceMQ($company);
			$time_starts = getValue("time_starts","str","POST","");
			$time_starts = strtotime($time_starts);
			$time_ends = getValue("time_ends","str","POST","");
			$time_ends = strtotime($time_ends);
			$description = getValue("description","str","POST","");
			$description = replaceMQ($description);

			$data = [
				'use_id'			=> $_COOKIE["UID"],
				'use_chucdanh' 		=> $position,
				'use_cty_lamviec' 	=> $company,
				'tg_batdau' 		=> $time_starts,
				'tg_ketthuc'		=> $time_ends,
				'them_thongtin'		=> $description
			];
			add('use_kinhnghiem',$data);
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