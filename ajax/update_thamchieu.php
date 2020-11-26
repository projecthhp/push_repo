<?
	require_once('../home/config.php');

	if(isset($_COOKIE['UID']))
	{
		$ntc = getValue("ntc","str","POST","");
		$ntc = replaceMQ($ntc);
		$email = getValue('email','str','POST','');
		$email = replaceMQ($email);
		$position = getValue("position","str","POST","");
		$position = replaceMQ($position);
		$phone_name = getValue("phone_name","str","POST","");
		$phone_name = replaceMQ($phone_name);
		$company = getValue("company","str","POST","");
		$company = replaceMQ($company);

		$data = [
			'email' 	 => $email,
			'ho_ten' 	 => $ntc,
			'sdt' 		 => $phone_name,
			'chuc_vu'	 => $position,
			'tinh_thanh' => 0,
			'company'	 => $company
		];
		$condition = [
			'id_user' => $_COOKIE['UID']
		];
		update('user_tham_chieu',$data,$condition);
		update('user',['use_update_time'=>time()],['use_id'=>$_COOKIE['UID']]);
		redirect('/ung-vien/ho-so-online.html');
	}
	else
	{
		redirect('/');
	}

?>