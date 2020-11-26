<?
	include('../home/config.php');

	$err_usc_email         = getValue("email_ntd","str","POST","");
	$err_usc_email         = replaceMQ($err_usc_email);
	$err_usc_phone            = getValue("phone","str","POST","");
	$err_usc_phone            = replaceMQ($err_usc_phone);
	$err_usc_company        = getValue("user_name","str","POST","");
	$err_usc_company        = replaceMQ($err_usc_company);
	$err_usc_city        = getValue("user_city","str","POST","0");
	$err_usc_city        = replaceMQ($err_usc_city);
	$err_usc_district        = getValue("usc_district","str","POST","0");
	$err_usc_district        = replaceMQ($err_usc_district);
	$err_usc_address          = getValue("address_ntd","str","POST","");
	$err_usc_address          = replaceMQ($err_usc_address);
	$err_usc_multi      = getValue('descripton_txtarea','str','POST','');
	$err_usc_multi      = replaceMQ($err_usc_multi);
	
	$check = new db_query("SELECT * FROm user_company_error WHERE err_usc_email = '".$err_usc_email."' AND err_usc_phone = '".$err_usc_phone."' ");
	if(mysql_num_rows($check->result) == 0){
		$data = [
			'err_usc_email' => $err_usc_email,
			'err_usc_company' => $err_usc_company,
			'err_usc_phone' => $err_usc_phone,
			'err_usc_address' => $err_usc_address,
			'err_usc_city' => $err_usc_city,
			'err_usc_district' => $err_usc_district,
			'err_usc_multi' => $err_usc_multi
		];
		add('user_company_error',$data);
	}else{
		$data = [
			'err_usc_email' => $err_usc_email,
			'err_usc_company' => $err_usc_company,
			'err_usc_phone' => $err_usc_phone,
			'err_usc_address' => $err_usc_address,
			'err_usc_city' => $err_usc_city,
			'err_usc_district' => $err_usc_district,
			'err_usc_multi' => $err_usc_multi
		];
		$condition = ['err_usc_email'=>$err_usc_email,'err_usc_phone'=>$err_usc_phone];
		update('user_company_error',$data,$condition);
	}
?>