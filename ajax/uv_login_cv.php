<?
	include('../home/config.php');
	$email = getValue('email','str','POST','');
	$password = getValue('password','str','POST','');
	if($email != '' && $password != ''){
		$db_qr = new db_query("SELECT use_pass,use_id FROM user WHERE use_mail = '".$email."' LIMIT 1");
		if(mysql_num_rows($db_qr->result) > 0){
			$row = mysql_fetch_assoc($db_qr->result);
			if(md5($password) === $row['use_pass']){
				setcookie('UT',0,time() + 86400,'/');
				setcookie('UID',$row['use_id'],time() + 86400,'/');
				$data = array(
					'result' => '1'
				);
			}else{
				$data = array(
					'result' => '0',
					'msg' => 'Mật khẩu bạn nhập không đúng'
				);
			}
		}else{
			$data = array(
				'result' => '0',
				'msg' => 'Tài khoản bạn nhập không tồn tại'
			);
		}
		echo json_encode($data);
	}
?>