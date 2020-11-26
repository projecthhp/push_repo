<?
include('../home/config.php');
	$email      	= getValue("email_uv","str","POST","");
	$email      	= replaceMQ($email);
	$password      = getValue("password_uv","str","POST","");
	$password      = md5($password);
	$user_name     = getValue("full_name","str","POST","");
	$user_name     = replaceMQ($user_name);
	$phone         = getValue("uv_phone","str","POST","");
	$phone         = replaceMQ($phone);
	$user_city     = getValue("city","int","POST","");
	$user_city     = replaceMQ($user_city);
	$district      = getValue("qh","str","POST","");
	$district      = replaceMQ($district);
	$address       = getValue("frm_address","str","POST","");
	$address       = replaceMQ($address);
	$jobname       = getValue("cvmm","str","POST","");
	$jobname       = replaceMQ($jobname);
	$job_address   = getValue("job_address","arr","POST","");
	$nganh_nghe    = getValue("nganh_nghe","arr","POST","");

	//Kiem tra rong
	if($email == '' || $password == '' || $phone == '' || $user_name == '' || $user_city == '' || $district == '' || $address == '' || $jobname == '' || $job_address == '' || $nganh_nghe == '')
	{
		echo 0;
	}
	else
	{
		$timeaway = time();
		//Check trong bang tmp_user
		$db_check_user = new db_query("SELECT * FROM tmp_user WHERE tmp_email = '".$email."'");
		if(mysql_num_rows($db_check_user->result) > 0)
		{
			$row = mysql_fetch_array($db_check_user->result);
			$file_upload = '';
			if (!empty($_FILES['upLoadAvatar'])) {
				$allowTypes = array('jpg','png','jpeg','gif','jfif','PNG');
				$type = pathinfo($_FILES["upLoadAvatar"]["name"],PATHINFO_EXTENSION);

				$path_tmp = $_FILES['upLoadAvatar']['tmp_name'];

				$file_name = $_FILES['upLoadAvatar']['name'];
				$file_name = reset(explode('.', $file_name));		
				
				if(in_array($type, $allowTypes))
				{
					$path = "../pictures/tmp_uv/";
					$year = date('Y',$timeaway);
					$month =  date('m',$timeaway);
					$day = date('d',$timeaway);

					if(!file_exists($path))
					{
						mkdir($path);
					}
					if(!file_exists($path.$year))
					{
						mkdir($path.$year);
					}
					if(!file_exists($path.$year.'/'.$month))
					{
						mkdir($path.$year.'/'.$month);
					}
					if(!file_exists($path.$year.'/'.$month.'/'.$day))
					{
						mkdir($path.$year.'/'.$month.'/'.$day);
					}
					$file_name = $_FILES['upLoadAvatar']['name'];
					$file_name = reset(explode('.', $file_name));
					$file_name = replaceTitle(urldecode($file_name));
					
					$pathfull = $path.$year.'/'.$month.'/'.$day.'/';
					if(move_uploaded_file($path_tmp, $pathfull.$_FILES['upLoadAvatar']['name']))
					{
						$filename = $_FILES['upLoadAvatar']['name'];
						rename($pathfull.$filename,$pathfull.$file_name.'.'.$type);
						if(is_file(geturlimageAvatar($row['tmp_time']).$row['tmp_image']))
						{
							unlink(geturlimageAvatar($row['tmp_time']).$row['tmp_image']);
						}
						$file_upload = $file_name.'.'.$type;
					}
				}
			}
			$db_qr_update = new db_query("UPDATE tmp_user SET tmp_pass = '".$password."', tmp_name = '".$user_name."', tmp_phone = '".$phone."', tmp_city = '".$user_city."',tmp_distric = '".$district."', tmp_address = '".$address."', tmp_job_name = '".$jobname."', tmp_job_city = '".$job_address."', tmp_nganh_nghe = '".$nganh_nghe."', tmp_time = '".time()."', tmp_image = '"
				.$file_upload."' WHERE tmp_email = '".$email."'");

			$result = json_encode(array(
				'message'=>"Lưu thông tin thành công, vui lòng chọn 1 trong 3 cách sau để hoàn thiện hồ sơ",
				'tmp_time' => $timeaway,
				'tmp_id' => $row['tmp_id'],
				'stt'=>'1'
			));
			echo $result;
		}
		else
		{
			$file_upload = '';
			if (!empty($_FILES['upLoadAvatar'])) {
				$allowTypes = array('jpg','png','jpeg','gif','jfif','PNG');
				$type = pathinfo($_FILES["upLoadAvatar"]["name"],PATHINFO_EXTENSION);

				$path_tmp = $_FILES['upLoadAvatar']['tmp_name'];

				$file_name = $_FILES['upLoadAvatar']['name'];
				$file_name = reset(explode('.', $file_name));		
				
				if(in_array($type, $allowTypes))
				{
					$path = "../pictures/tmp_uv/";
					$year = date('Y',$timeaway);
					$month =  date('m',$timeaway);
					$day = date('d',$timeaway);

					if(!file_exists($path))
					{
						mkdir($path);
					}
					if(!file_exists($path.$year))
					{
						mkdir($path.$year);
					}
					if(!file_exists($path.$year.'/'.$month))
					{
						mkdir($path.$year.'/'.$month);
					}
					if(!file_exists($path.$year.'/'.$month.'/'.$day))
					{
						mkdir($path.$year.'/'.$month.'/'.$day);
					}
					$file_name = $_FILES['upLoadAvatar']['name'];
					$file_name = reset(explode('.', $file_name));
					$file_name = replaceTitle(urldecode($file_name));
					
					$pathfull = $path.$year.'/'.$month.'/'.$day.'/';
					if(move_uploaded_file($path_tmp, $pathfull.$_FILES['upLoadAvatar']['name']))
					{
						$filename = $_FILES['upLoadAvatar']['name'];
						rename($pathfull.$filename,$pathfull.$file_name.'.'.$type);
						
						$file_upload = $file_name.'.'.$type;
					}
				}
			}
			$db_ins = new db_query("INSERT INTO tmp_user (`tmp_email`,`tmp_pass`,`tmp_name`,`tmp_phone`,`tmp_city`,`tmp_distric`,`tmp_address`,`tmp_job_name`,`tmp_job_city`,`tmp_nganh_nghe`,`tmp_authentic`,`tmp_time`,`tmp_image`) VALUES 
		('".$email."','".$password."','".$user_name."','".$phone."','".$user_city."','".$district."','".$address."','".$jobname."','".$job_address."','".$nganh_nghe."','0','$timeaway','".$file_upload."')");

			$db_ex = new db_execute_return();
	     	$last_id = $db_ex->db_execute($db_ins);
			$result = json_encode(array(
				'message'=>"Lưu thông tin thành công, vui lòng chọn 1 trong 3 cách sau để hoàn thiện hồ sơ",
				'tmp_id' => $last_id,
				'tmp_time' => $timeaway,
				'stt'=>'1'
			));
			echo $result;
		}
	// }
}
	
?>