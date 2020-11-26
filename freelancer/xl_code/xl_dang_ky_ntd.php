<?php
	include_once 'config.php';	
	$ten_ntd = $_POST['name_ntd'];
	$ngay_sinh_ntd =$_POST['ngay_sinh_ntd'];
	$mat_khau =$_POST['password_ntd'];
	$gioi_tinh_ntd = $_POST['gioi_tinh_ntd'];
	$sdt_ntd = $_POST['sdt_ntd'];
	$tinh_thanh_pho_ntd = $_POST['tinh_thanh_pho_ntd'];
	$quan_huyen_ntd = $_POST['quan_huyen_ntd'];

	if (isset($_POST['submit'])) {
		$sql ="select ma_ntd from flc_user_ntd where sdt_ntd = $sdt_ntd";
		$db_qr = new db_query($sql);
		$row = mysql_fetch_assoc($db_qr->result);
		if ($row == '') {
				$data = [
				'ten_ntd' => $ten_ntd,
				'ngay_sinh_ntd' => $ngay_sinh_ntd,
				'gioi_tinh_ntd' => $gioi_tinh_ntd,
				'sdt_ntd' => $sdt_ntd,
				'mat_khau_ntd' => $mat_khau,
				'tinh_thanh_pho_ntd' => $tinh_thanh_pho_ntd,
				'quan_huyen_ntd' => $quan_huyen_ntd
			];
			add('flc_user_ntd',$data);
		}
	return 'dang-ky-thanh-cong.php';
	}
?>