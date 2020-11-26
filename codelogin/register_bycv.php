<?
session_start();
include("config.php");
include("../functions/send_mail.php");

$db_get_tmp = new db_query("SELECT * FROM tmp_user WHERE tmp_id = ".$_COOKIE['xt']);
if(mysql_num_rows($db_get_tmp->result)>0){
	$row = mysql_fetch_array($db_get_tmp->result);

	$email = $row['tmp_email'];
	$password_first = $row['tmp_pass'];
	$user_name = $row['tmp_name'];
	$phone = $row['tmp_phone'];
	$user_city = $row['tmp_city'];
	$user_city_child = $row['tmp_distric'];
	$address = $row['tmp_address'];
	$job_name = $row['tmp_job_name']; 
	$job_address = $row['tmp_job_city'];
	$nganh_nghe = $row['tmp_nganh_nghe'];
	$alias_cv = $_POST['alias_cv'];

	$query = "INSERT INTO `user`(
	`use_mail`,`use_phone`,`use_pass`,
	`use_authentic`,`use_name`,`use_city`,
	`use_district`,`address`,`use_job_name`,
	`use_district_job`,`use_nganh_nghe`,`use_create_time`,`use_update_time`,`use_config`) 
	VALUES (
	'".$email."','".$phone."','".$password_first."',
	'0','".$user_name."','".$user_city."',
	'".$user_city_child."','".$address."','".$job_name."',
	'".$job_address."','".$nganh_nghe."','".time()."','".time()."',3)";
	$db_ex = new db_execute_return();
	$last_id = $db_ex->db_execute($query);
	$secu = md5($email);
	if ($alias_cv !='') {
		$link = $domain."/xac-thuc-tai-khoan-ung-vien-thanh-cong.html?code=".$secu."&id=".$last_id."&alias_cv=".$alias_cv;
	}
	else {
		$link = $domain."/xac-thuc-tai-khoan-ung-vien-thanh-cong.html?code=".$secu."&id=".$last_id;
	}
	setcookie('UT', 0 ,time() + 7*6000,'/');
	setcookie('UID', $last_id ,time() + 7*6000,'/');
	setcookie('PHPSESPASS', $password_first ,time() + 7*6000,'/');
	if($_COOKIE['UT']==3 && isset($_COOKIE['xt'])){
		$db_qr = new db_query("DELETE FROM `tmp_user` WHERE tmp_id = ".$_COOKIE['xt']);
		unset($_COOKIE['xt']);
		setcookie('xt', null, -1, '/');
	}
	
	SendRegisterTVC($email,$user_name,$link);
	echo $last_id;
}
	?>