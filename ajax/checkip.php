<?
	include('../home/config.php');

	$ip = client_ip();
	// $db_qr = new db_query("SELECT ip_address FROM user_company WHERE ip_address = '".$ip."' ");
	// if(mysql_num_rows($db_qr->result) < 6){
	$db_qr = new db_query("SELECT usc_create_time FROM user_company WHERE ip_address = '".$ip."' ORDER BY usc_id DESC LIMIT 1");
	$row = mysql_fetch_array($db_qr->result);
	$cr_time = $row['usc_create_time'];
	$time =  mktime(date('h',$cr_time)+4,date('i',$cr_time),date('s',$cr_time),date('m',$cr_time),date('d',$cr_time),date('Y',$cr_time));
	if(time() < $time){
		$data = array(
			'result' => false,
			'msg' => "Thời gian bạn đăng ký trước đây chưa đủ 4 giờ, vui lòng quay lại vào lúc ".date('H:i',$time)
		);
	}else{
		$data = array(
			'result' => true
		);
	}
	// }
	// else{
	// 	$data = array(
	// 		'result' => false,
	// 		'msg' => "Mỗi IP chỉ đăng ký tối đa 6 tài khoản, mỗi tài khoản cách nhau ít nhất 4h. IP của bạn đã đăng ký quá hạn !!!"
	// 	);
	// }
	echo json_encode($data);
?>