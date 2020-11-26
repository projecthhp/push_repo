<?
	require_once('../home/config.php');

	if(isset($_COOKIE["UID"]))
	{
		if(isset($_POST['update']))
		{
			$id_experience 	= getValue('id_experience','arr','POST',0);
			$position 		= getValue("position",'arr','POST','');
			$company 		= getValue('company','arr','POST','');
			$time_starts 	= getValue("time_starts","arr","POST","");
			$time_ends 		= getValue("time_ends","arr","POST","");
			$description 	= getValue("description","arr","POST","");

			for($i = 0; $i < count($id_experience); $i++){
				$data = [
					'use_chucdanh' => $position[$i],
					'use_cty_lamviec' => $company[$i],
					'tg_batdau' => strtotime($time_starts[$i]),
					'tg_ketthuc' => strtotime($time_ends[$i]),
					'them_thongtin' => $description[$i]
				];
				$condition = [
					'id_kinhnghiem' => $id_experience[$i]
				];
				update('use_kinhnghiem',$data,$condition);
			}
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