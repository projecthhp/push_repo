<?

	include('../home/config.php');

	$phone = getValue('phone','str','POST','');
	$phone = trim($phone);
	$email = getValue('email','str','POST','');
	$email = trim($email);
	$name = getValue('name','str','POST','');
	$name = trim($name);
	$address = getValue('address','str','POST','');
	$address = trim($address);
	$jobname = getValue('jobname','str','POST','');
	$jobname = trim($jobname);
	$city = getValue('city','int','POST',0);
	$district = getValue('district','int','POST',0);
	$ddlv = getValue('ddlv','arr','POST','');
	$ddlv = implode(',', $ddlv);
	$nn_mm = getValue('nn_mm','arr','POST','');
	$nn_mm = implode(',', $nn_mm);
	
	$password = getValue('password','str','POST','');
	if($phone != '' && $email != '' && $name != '' && $address != '' && $jobname != ''){
		$data = [
				'tmp_email' => $email,
				'tmp_pass' => md5($password),
				'tmp_name' => $name,
				'tmp_phone' => $phone,
				'tmp_city' => $city,
				'tmp_distric' => $district,
				'tmp_address' => $address,
				'tmp_job_name' => $jobname,
				'tmp_job_city' => $ddlv,
				'tmp_nganh_nghe' => $nn_mm,
				'tmp_authentic' => 0,
				'tmp_time' => time(),
				'tmp_register' => 3,
				'tmp_image' => '',
			];
		$db_qr = new db_query("SELECT tmp_email,tmp_id FROM tmp_user WHERE tmp_email = '".$email."' ");
		if(mysql_num_rows($db_qr->result) == 0){
			add('tmp_user',$data);
			$last_id = mysql_insert_id();
		}else{
			$condition = [
				'tmp_email' => $email,
			];
			update('tmp_user',$data,$condition);
			$row = mysql_fetch_assoc($db_qr->result);
			$last_id = $row['tmp_id'];
		}
		setcookie('UT', 3,time() + 7*6000,'/');
		setcookie('xt', $last_id ,time() + 7*6000,'/');
	}
?>