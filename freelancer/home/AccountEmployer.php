<?php
	include_once 'config.php';	
//	include_once 'check_ntd.php';
	$characters = '0123456789';
	    $otp = '';
	    for ($i = 0; $i < 4; $i++)
	        $otp .= $characters[mt_Rand(0,9)];
	if (isset($_POST['submit'])) {
		$anh =  $_FILES['logo_ntd']['name'];
        $data = [
			'ten_ntd' => $_POST['name_ntd'],
			'ngay_sinh_ntd' => strtotime($_POST['ngay_sinh_ntd']),
			'gioi_tinh_ntd' => $_POST['gioi_tinh_ntd'],
			'sdt_ntd' => $_POST['sdt_ntd'],
			'mat_khau_ntd' => md5($_POST['password_ntd']),
			'tinh_thanh_pho_ntd' =>$_POST['tinh_thanh_pho_ntd'],
			'quan_huyen_ntd' => $_POST['quan_huyen_ntd'],
			'logo_ntd' => $anh,
			'ma_otp' => $otp,
		];
		//img
		$errors= array();  // up ảnh lên db
		$file_name = $_FILES['logo_ntd']['name'];
		$file_size = $_FILES['logo_ntd']['size'];
		$file_tmp = $_FILES['logo_ntd']['tmp_name'];
		$file_type = $_FILES['logo_ntd']['type'];
		$file_ext=strtolower(end(explode('.',$_FILES['logo_ntd']['name'])));
			    
		$expensions= array("jpeg","jpg","png");
			    
		if(in_array($file_ext,$expensions)=== false){
			$errors[]="Chỉ hỗ trợ upload file JPEG, JPG hoặc PNG.";
		}
			    
		if($file_size > 2097152) {
			$errors[]='Kích thước file không được lớn hơn 2MB';
		}
		$target = "../image/img_user/img_ntd/".basename($anh);
		move_uploaded_file($_FILES['logo_ntd']['tmp_name'], $target);

			$sdt_ntd =$_POST['sdt_ntd'];
			add('flc_user_ntd',$data);
			$UID = mysql_insert_id();
			setcookie("UID", $UID, time() + 3600, "/");
			setcookie("UT", "1", time() + 3600, "/");
	    	redirect('OTP-ntd.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng ký nhà tuyển dụng</title>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../image/icon/fa-icon/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="../css/slick-theme.css"/>
	<link rel="stylesheet" href="../css/GiangCSS/All.css">
</head>
<body>
	<div class="G_background2">
		<div class="G_arrow">	
			<a href="#"><i class="fas fa-long-arrow-alt-left"></i></a>
		</div>
		<div class="G_background2-2">
			<form action="#" method="POST" onsubmit="return validate_form()"  onchange="validate_form()" enctype="multipart/form-data">
				<div class="G_logo">
					<img src="../image/img/1thue.png" alt="anh">
				</div>
				<div class="G_avatar">
					<div>
						<img src="../image/img/1avt.png" alt="anh">
					</div>
					<div class="G_auze">
						<label style="cursor: pointer;">
					      	<span>Tải ảnh lên giao diện</span>
					      	<input type="file" name="logo_ntd" accept="image/*" style="display:none">
						</label>
					</div>
				</div>
				<div class="G_background2-3">
					<form action="#" method="POST" onsubmit="return validate_form()"  onchange="validate_form()">
						<style>
							.G_background2 .G_dong1 .error{
								color: red;
								margin-left: 0px;		
							}
						</style>
						<div class="G_o1">
							<div class="G_dong1">
								<div class="G_ten">Họ và tên <img src="../image/img/1sao_do.png" alt="anh"></div>
								<div><input type="text" name="name_ntd" id="name_ntd" placeholder="Nhập họ và tên"></div>
								<span id="error1" class="error"></span>
							</div>
							<div class="G_dong1">
								<div class="G_ns">Ngày sinh <img src="../image/img/1sao_do.png" alt="anh"></div>
								<div><input type="date" name="ngay_sinh_ntd" id="ngay_sinh_ntd"></div>
								<span id="error2" class="error"></span>
							</div>
							<div class="G_dong1">
								<div class="G_mk">Mật khẩu <img src="../image/img/1sao_do.png" alt="anh"></div>
								<div><input type="password" name="password_ntd" id="password_ntd" placeholder="Nhập mật khẩu">
								<span><i class="fas fa-eye"></i></span></div>
								<span id="error3" class="error"></span>
							</div>
							<div class="G_dong1">
								<div class="G_mk2">Nhập lại mật khẩu <img src="../image/img/1sao_do.png" alt="anh"></div>
								<div><input type="password" name="repassword_ntd" id="repassword_ntd" placeholder="Nhập mật khẩu">
								<span><i class="fas fa-eye"></i></span></div>
								<span id="error4" class="error"></span>
							</div>
						</div>
						<div class="G_o2">
							<div class="G_dong1">
								<div class="G_ten">Giới tính <img src="../image/img/1sao_do.png" alt="anh"></div>
								<div class="G_sl">
									<select name="gioi_tinh_ntd" id="gioi_tinh_ntd">
										<?php	
											foreach($array_gioi_tinh_tt as $key => $gioi_tinh_ntd) {
										?>	
											<option value="<?php echo $key; ?>"><?php echo $gioi_tinh_ntd; ?></option>	
										<?php		
											}
										?>
									</select>
								</div>
								<span id="error5" class="error"></span>
							</div>
							<div class="G_dong1">
								<div class="G_ns">Số điện thoại <img src="../image/img/1sao_do.png" alt="anh"></div>
								<div><input type="text" name="sdt_ntd" id="sdt_ntd" placeholder="Nhập số điện thoại"></div>
								<span id="error6" class="error"></span>
							</div>
							<div class="G_dong1">
								<div class="G_mk">Tỉnh/Thành phố<img src="../image/img/1sao_do.png" alt="anh"></div>
								<div class="G_sl">
									<select name="tinh_thanh_pho_ntd" id="tinh_thanh_pho_ntd" onchange="checkcity()">
										<option value="">Chọn tỉnh/thành phố</option>
										<?php 
											$sql ="select * from city";
											$db_qr = new db_query($sql);
											While($row = mysql_fetch_assoc($db_qr->result)){
												echo '<option value="'.$row["cit_id"].'">'.$row["cit_name"].'</option>';
											}
										?>
									</select>
								</div>
								<span id="error7" class="error"></span>
							</div>
							<div class="G_dong1">
								<div class="G_mk2">Quận/Huyện<img src="../image/img/1sao_do.png" alt="anh"></div>
								<div class="G_sl">
									<select name="quan_huyen_ntd" id="quan_huyen_ntd" >
										<option value=""></option>
										<option value="1">demo</option>
									</select>
								</div>
								<span id="error8" class="error"></span>
							</div>
						</div>
						<div class="G_o3">
							<div class="G_line1">
								<button id="btn-dang-ky" href="#btn-dang-ky" name="submit">Đăng ký</button>
							</div>
							<div class="G_line2">
								Bạn đã có tài khoản? <a href="loginntd.php">Đăng nhập ngay</a>
							</div>
						</div>
					</form>
				</div>
		</div>
	</div>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/select2.min.js"></script>
	<script src="../js/slick.min.js"></script>
</body>
	<script>
			function validate_form(){
				var name_ntd = document.getElementById('name_ntd').value;
				var ngay_sinh_ntd = document.getElementById('ngay_sinh_ntd').value;
				var gioi_tinh_ntd = document.getElementById('gioi_tinh_ntd').value;
				var sdt_ntd = document.getElementById('sdt_ntd').value;
				var tinh_thanh_pho_ntd = document.getElementById('tinh_thanh_pho_ntd').value;
				var quan_huyen_ntd = document.getElementById('quan_huyen_ntd').value;
				var password_ntd = document.getElementById('password_ntd').value;
				var repassword_ntd = document.getElementById('repassword_ntd').value;
				var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
				var checkpass = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/;

				if (name_ntd == '') {
					document.getElementById('error1').innerHTML= 'Vui lòng nhập họ tên';
					
				}
				else{
					document.getElementById('error1').innerHTML= '';
					
				}
				if ( ngay_sinh_ntd == '' ) {
					document.getElementById('error2').innerHTML= 'Vui lòng chọn ngày sinh';
				}
				else{
					document.getElementById('error2').innerHTML= '';
				}
				if (gioi_tinh_ntd =='0') {
					document.getElementById('error5').innerHTML= 'Vui lòng chọn giới tính';	
				}
				else{
					document.getElementById('error5').innerHTML= '';
				}
				if (password_ntd !=='') {
						if (checkpass.test(password_ntd) == false) 
						{
							document.getElementById('error3').innerHTML= 'Tối thiểu 6 ký tự, ít nhất một chữ cái và một số';
						
						}else{
							document.getElementById('error3').innerHTML= '';
						}					
					}else{
						document.getElementById('error3').innerHTML= 'Vui lòng nhập mật khẩu';
					}
				if (repassword_ntd !== password_ntd || repassword_ntd =='') {
					document.getElementById('error4').innerHTML= 'Mật khẩu không trùng nhau';	
				}
				else{
					document.getElementById('error4').innerHTML= '';
				}
				if (sdt_ntd !== ''){
					if (vnf_regex.test(sdt_ntd) == false) 
					{
						document.getElementById('error6').innerHTML= 'Số điện thoại bạn nhập chưa đúng định dạng';
					
					}else{
						document.getElementById('error6').innerHTML= '';
					}					
				}else{
					document.getElementById('error6').innerHTML= 'Vui lòng nhập số điện thoại';
				}
				
				if (tinh_thanh_pho_ntd == '') {
					document.getElementById('error7').innerHTML= 'Vui lòng chọn tỉnh/thành phố';
					
				}
				else{
					document.getElementById('error7').innerHTML= '';
				}
				if (quan_huyen_ntd =='') {
					document.getElementById('error8').innerHTML= 'Vui lòng chọn quận/huyện';
					
				}
				else{
					document.getElementById('erro8').innerHTML= '';
				}
				return false;
			};	
	 </script>
	<script>
		jQuery(document).ready(function($){
			$("#tinh_thanh_pho_ntd").change(function(event) {
				thanh_phoId = $("#tinh_thanh_pho_ntd").val();
				$.post('quan.php', {"thanh_phoId":thanh_phoId}, function(data) {
					$("#quan_huyen").html(data);
				});
			});
		});
	</script>

</html>