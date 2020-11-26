
<!-- <?php
	// phpinfo();
	include('config.php');

	$sql = "SELECT cit_name FROM city ORDER BY cit_name ASC";
	$db_qr = new db_query($sql);
	While($row = mysql_fetch_assoc($db_qr->result)){
		echo $row['cit_name'];
	}
	unset($db_qr,$row);
?> --> 
<?php 
	require_once 'config.php';
// getValue('name','str','POST','')
	if (isset($_POST['insert'])) {
		$anh                = $_FILES['anh']['name'];
		$ho_va_ten          = $_POST['ho_va_ten'];
		$gioi_tinh          = $_POST['gioi_tinh'];
		$ngay_sinh          = strtotime($_POST['ngay_sinh']);
		$so_dien_thoai      = $_POST['so_dien_thoai'];
		// $mat_khau           = md5($_POST['mat_khau']);
		$mat_khau           = $_POST['mat_khau'];
		$ma_tinh_thanh_pho  = $_POST['ma_tinh_thanh_pho'];
		$ma_quan_huyen      = $_POST['ma_quan_huyen'];
		$the_loai_chi_phi   = $_POST['the_loai_chi_phi'];
		
		$chi_phi_theo_gi_do = $_POST['chi_phi_theo_gi_do'];
		$linh_vuc_lam_viec  = $_POST['linh_vuc_lam_viec'];
		$linh_vuc_lam_viec  = implode(",", $linh_vuc_lam_viec);	
		$chi_phi_co_dinh = $_POST['chi_phi_co_dinh'];
		$chi_phi            = $_POST['chi_phi'];
		$chi_phi  = implode(",", $chi_phi);
		if($chi_phi_co_dinh != ""){
			$chi_phi_them_moi = $chi_phi_co_dinh;
		}else{
			$chi_phi_them_moi = $chi_phi;
		}

		// Tạo otp ngẫu nhiên
	    $characters = '0123456789';
	    $otp = '';
	    for ($i = 0; $i < 4; $i++)
	        $otp .= $characters[mt_Rand(0,9)];
		////////////////////////////////////

		$errors= array();  // up ảnh lên db
		$file_name = $_FILES['anh']['name'];
		$file_size = $_FILES['anh']['size'];
		$file_tmp = $_FILES['anh']['tmp_name'];
		$file_type = $_FILES['anh']['type'];
		$file_ext=strtolower(end(explode('.',$_FILES['anh']['name'])));
			    
		$expensions= array("jpeg","jpg","png");
			    
		if(in_array($file_ext,$expensions)=== false){
			$errors[]="Chỉ hỗ trợ upload file JPEG, JPG hoặc PNG.";
		}
			    
		if($file_size > 2097152) {
			$errors[]='Kích thước file không được lớn hơn 2MB';
		}
		$target = "../image/img_user/img_freelancer/".basename($anh);
		move_uploaded_file($_FILES['anh']['tmp_name'], $target);

		// $data = [
		// 	'ho_va_ten' => $ho_va_ten
		// ];

		// add('flc_user_freelancer',$data);


		// Tạo 1 trường lưu mã OTP vừa tạo, 1 trường xác thực (0)
		// Tạo 1 mã OTP gồm 4 số ngãu nhiên
		// Sau khi đăng ký thành công, mặc định đăng nhập cho UV -> điều hướng sang page nhập OTP
		// Page nhập OTP:
		// - Sau khi người dùng nhập -> lấy mã đó so sánh với mã OTP đã tạo lúc đăng ký
		// 	+ Đúng thì xác thực: Update trường xác thực = 1
		// 	+ Sai thì báo sai mã OTP


		$sql = "INSERT INTO flc_user_freelancer(anh,ho_va_ten,gioi_tinh,ngay_sinh,so_dien_thoai,mat_khau,ma_tinh_thanh_pho,ma_quan_huyen,the_loai_chi_phi,chi_phi,chi_phi_theo_gi_do,linh_vuc_lam_viec,ma_otp)
		VALUES  ('$anh','$ho_va_ten','$gioi_tinh','$ngay_sinh','$so_dien_thoai','$mat_khau','$ma_tinh_thanh_pho','$ma_quan_huyen','$the_loai_chi_phi','$chi_phi_them_moi','$chi_phi_theo_gi_do','$linh_vuc_lam_viec','$otp')";
		$db_ex  = new db_execute_return();
		$kq = $db_ex ->db_execute($sql);


		$sign_in = new db_query("SELECT ma_user FROM flc_user_freelancer WHERE so_dien_thoai = '".$so_dien_thoai."'");
		mysql_num_rows($sign_in->result) > 0;
		$row = mysql_fetch_assoc($sign_in->result);
		$ma_user = $row['ma_user'];
		// echo $ma_user;
		// print_r($sign_in);
		setcookie('UID', $ma_user, time() + 3600, "/");
		setcookie('UT','0', time() + 3600, "/");
		// print_r($ma);
		// echo $_COOKIE['hihi'];
		header('Location:OTP-Freelancer.php');
			
		// Tạo cookie và tạo mã OTP

		// print($sql);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng ký freelancer</title>
	<link rel="stylesheet" href="../css/GiangCSS/All.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../asset/css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body>
	<?php require_once '../function/GiangFunction.php'; ?> 
	<div class="G_background">
		<div class="G_return">	
			<a href="#"><i class="fas fa-long-arrow-alt-left"></i></a>
		</div>
		<form name="radioForm" action="#"  method="post" onsubmit="return validateform()" onchange="return validateform(this)" enctype="multipart/form-data">
			<div class="G_form">
				<div class="G_anh1">
					<img src="../image/img/1dklam.png" alt="anh1">
				</div>
				<div class="G_avt">
					<div class="G_anh2">
						<img class="G_avata" src="../image/img/1avt.png"  id="ghost" alt="a">
					</div>
					<div class="G_upload_avt">
						<label style="cursor: pointer;">
					      	<span name="anh">Tải ảnh lên giao diện</span>
					      	<input name="anh" type="file" accept="image/*" onchange="loadFile(event)"  style="display:none">
						</label>
					</div>
				</div>
				<div class="G_cover">
					<div class="G_div1">
						<div class="G_name">
							<div class="G_ho_ten">
								Họ và tên <img src="../image/img/1sao_do.png" alt="anh">
								<span id="G_error"></span>
							</div>
							<div class="G_input">
								<input type="text" name="ho_va_ten" id="ho_va_ten" placeholder="Nhập họ và tên">
							</div>
						</div>
						<div class="G_name">
							<div class="G_date">
								Ngày Sinh <img src="../image/img/1sao_do.png" alt="anh">
								<span id="G_error2"></span>
							</div>
							<div class="G_input">
								<input id="ngay_sinh" name="ngay_sinh" placeholder="Nhập ngày tháng năm sinh" type="text" onfocus="(this.type='date')">
							</div>
						</div>					
						<div class="G_name">
							<div class="G_password">
								Mật khẩu <img src="../image/img/1sao_do.png" alt="anh">
								<span id="G_error3"></span>
							</div>
							<div class="G_input" style="position: relative;">
								<input type="password" name="mat_khau" id="hello" placeholder="Nhập mật khẩu">
								<span onclick="see()" id="see-pass" class="see-pass"><i class="fas fa-eye-slash"></i></span>
								<span onclick="cantSee()" id="cant-see" class="G-cant-see"><i class="fas fa-eye"></i></span>
							</div>
						</div>					
						<div class="G_name">
							<div class="G_password">
								Nhập lại mật khẩu <img src="../image/img/1sao_do.png" alt="anh">
								<span id="G_error4"></span>
							</div>
							<div class="G_input" style="position: relative;">
								<input type="password" name="mat_khau" id="hello2" placeholder="Nhập lại mật khẩu">
								<span onclick="see2()" id="see-pass2" class="see-pass2"><i class="fas fa-eye-slash"></i></span>
								<span onclick="cantSee2()" id="cant-see2" class="G-cant-see2"><i class="fas fa-eye"></i></span>
							</div>
						</div>
					</div>
					<div class="G_div2">
						<div class="G_sex">
							<div class="G_gioi_tinh">
								Giới tính <img src="../image/img/1sao_do.png" alt="anh">
								<span id="G_error5"></span>
							</div>
							<div class="G_select">
								<select id="gioi_tinh" name="gioi_tinh" class="G_gt">
									<option disabled selected value="">Chọn giới tính</option>
									<option value="1">Nam</option>
									<option value="2">Nữ</option>
									<option value="3">Khác</option>
								</select>
							</div>
						</div>
						<div class="G_sex">
							<div class="G_phone">
								Số điện thoại <img src="../image/img/1sao_do.png" alt="anh">
								<span id="G_error6"></span>
							</div>
							<div class="G_input">
								<input id="so_dien_thoai" name="so_dien_thoai" type="text" placeholder="Nhập số điện thoại" onblur="checksdt(this.value)">
							</div>
						</div>					
						<div class="G_sex">
							<div class="G_country">
								Tỉnh/Thành phố <img src="../image/img/1sao_do.png" alt="anh">
								<span id="G_error7"></span>
							</div>
							<div class="G_select">
								<select id="thanh_pho" name="ma_tinh_thanh_pho" class="G_tp G-select2">
									<option disabled selected value="">---Chọn Tỉnh/Thành Phố---</option>
										<?php 
	                                        $sql ="select * from city";
	                                        $db_qr = new db_query($sql);
	                                        While($row = mysql_fetch_assoc($db_qr->result)){ ?>
	                                        	<option value="<?php echo $row['cit_id'] ?>"><?php echo $row["cit_name"] ?></option>;
	                                    <?php    }
	                                    ?> 
								</select>
							</div>
						</div>					
						<div class="G_sex">
							<div class="G_quan">
								Quận/Huyện <img src="../image/img/1sao_do.png" alt="anh">
								<span id="G_error8"></span>
							</div>
							<div class="G_select">
								<select id="quan_huyen" name="ma_quan_huyen" class="G_qh G-select2">
									<option disabled selected value="">---Chọn Tỉnh/Thành Phố trước---</option>
										
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="G_cover2">
					<div class="G_muc_luong">
						<div class="G_luong">
							Mức lương <img src="../image/img/1sao_do.png" alt="anh">
						</div>
						<div class="G_chon_luong">
							<label>
								<span onclick="hihi1()" value="1" class="G-doi-mau hover" data-id="hihi1">Cố định</span>
								<input type="radio" name="the_loai_chi_phi" checked="checked" value="1" style="display: none;">
							</label>
							<label>
								<span onclick="hihi2()" value="2" class="G-doi-mau" data-id="hihi2">Ước lượng</span>
								<input type="radio" name="the_loai_chi_phi" value="2" style="display: none;">
							</label>
						</div>
							<span id="G_error9"></span>
					</div>
					<div class="G_nhap_luong">
						<div  class="G_vnd">
							<input name="chi_phi_co_dinh" id="hihi1" class="input" type="number" placeholder="Nhập mức lương (VNĐ). VD:1000000"> 
							<div id="hihi2" class="G_uoc_luong">
								<input name="chi_phi[]" class="input1" type="number" id="uoc_luong_1" placeholder="VD: 5000000">
								<div class="G-ngang">-</div>
								<input name="chi_phi[]" class="input2" type="number" id="uoc_luong_2" placeholder="10000000">
							</div>
						</div>
						<div class="G_cheo">
							/
						</div>
						<div class="G_sl">
							<select name="chi_phi_theo_gi_do">
								<option value="1">Ngày</option>
								<option value="2">Tuần</option>
								<option value="3">Tháng</option>
								<option value="4">Năm</option>
							</select>
						</div>
					</div>
				</div>
				<div class="G_cover3">
					<div class="G_div11">
						<div>
							<div class="G_review">Lĩnh vực làm việc <img src="../image/img/1sao_do.png" alt="anh"></div>
							<div class="G_spacing_current"> (Bạn có thể chọn nhiều lĩnh vực) </div>
						</div>
						<div class="G_spacing">
								<div id="check2-1" class="G_input2">
									<input id="G_check" value="1" type="checkbox" name="linh_vuc_lam_viec[]" placeholder="IT lập trình">
								</div>
								<div id="check1-1" class="G_alphabet">
									IT & Lập trình
								</div>
						</div>
						<div class="G_spacing">
								<div id="check2-2" class="G_input2">
									<input id="G_check" value="2" type="checkbox" name="linh_vuc_lam_viec[]" placeholder="IT lập trình">
								</div>
								<div id="check1-2" class="G_alphabet">
									Thiết kế
								</div>
						</div>
						<div class="G_spacing">
								<div id="check2-3" class="G_input2">
									<input id="G_check" value="3" type="checkbox" name="linh_vuc_lam_viec[]" id="" placeholder="IT lập trình">
								</div>
								<div id="check1-3" class="G_alphabet">
									Viết lách & Dịch thuật
								</div>
						</div>
						<div class="G_spacing">
								<div id="check2-4" class="G_input2">
									<input id="G_check" value="4" type="checkbox" name="linh_vuc_lam_viec[]" id="" placeholder="IT lập trình">
								</div>
								<div id="check1-4" class="G_alphabet">
									Kinh doanh, Nhập liệu và Hành chính
								</div>
						</div>
					</div>
					<div class="G_div12">
						<div class="G_spacing">
								<div style="margin-top: 5px;" id="check2-5" class="G_input2">
									<input id="G_check" value="5" type="checkbox" name="linh_vuc_lam_viec[]" id="" placeholder="IT lập trình">
								</div>
								<div  style="top: 33%;" id="check1-5" class="G_alphabet">
									Kế toán, Thuế & Luật
								</div>
						</div>
						<div class="G_spacing">
								<div id="check2-6" class="G_input2">
									<input id="G_check" value="6" type="checkbox" name="linh_vuc_lam_viec[]" id="" placeholder="IT lập trình">
								</div>
								<div id="check1-6" class="G_alphabet">
									Kiến trúc & Xây dựng
								</div>
						</div>
						<div class="G_spacing">
								<div id="check2-7" class="G_input2">
									<input id="G_check" value="7" type="checkbox" name="linh_vuc_lam_viec[]" id="" placeholder="IT lập trình">
								</div>
								<div id="check1-7" class="G_alphabet">
									Video
								</div>
						</div>
						<div class="G_spacing">
								<div id="check2-8" class="G_input2">
									<input id="G_check" value="8" type="checkbox" name="linh_vuc_lam_viec[]" id="" placeholder="IT lập trình">
								</div>
								<div id="check1-8" class="G_alphabet">
									Lĩnh vực khác
								</div>
						</div>
						 <span id="G_error10"></span>
					</div>
					<div class="G_button">
						<button type="submid" name="insert" >Đăng ký</button>
					</div>
					<div class="G_G">
						Bạn đã có tài khoản? <a href="loginuv.php">ĐĂNG NHẬP NGAY</a>
					</div>
				</div>
			</div>
		</form>
	</div> 	
</body>
	<script src="https://code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
	function see() {
		document.getElementById("see-pass").classList.add("G-see-pass-hover");
		document.getElementById("cant-see").classList.add("G-cant-see-hover");
		document.getElementById("hello").type = 'text';
	}
	function cantSee(){
		document.getElementById("see-pass").classList.remove("G-see-pass-hover");
		document.getElementById("cant-see").classList.remove("G-cant-see-hover");
		document.getElementById("hello").type = 'password';
	}
	function see2() {
		document.getElementById("see-pass2").classList.add("G-see-pass-hover");
		document.getElementById("cant-see2").classList.add("G-cant-see-hover");
		document.getElementById("hello2").type = 'text';
	}
	function cantSee2(){
		document.getElementById("see-pass2").classList.remove("G-see-pass-hover");
		document.getElementById("cant-see2").classList.remove("G-cant-see-hover");
		document.getElementById("hello2").type = 'password';
	}

	// function check1() {
	// 	document.getElementById("check1-1").classList.toggle("check1");
	// 	document.getElementById("check2-1").classList.toggle("check2");
	// }
	// function check2() {
	// 	document.getElementById("check1-2").classList.toggle("check1");
	// 	document.getElementById("check2-2").classList.toggle("check2");
	// }
	// function check3() {
	// 	document.getElementById("check1-3").classList.toggle("check1");
	// 	document.getElementById("check2-3").classList.toggle("check2");
	// }
	// function check4() {
	// 	document.getElementById("check1-4").classList.toggle("check1");
	// 	document.getElementById("check2-4").classList.toggle("check2");
	// }
	// function check5() {
	// 	document.getElementById("check1-5").classList.toggle("check1");
	// 	document.getElementById("check2-5").classList.toggle("check2");
	// }
	// function check6() {
	// 	document.getElementById("check1-6").classList.toggle("check1");
	// 	document.getElementById("check2-6").classList.toggle("check2");
	// }
	// function check7() {
	// 	document.getElementById("check1-7").classList.toggle("check1");
	// 	document.getElementById("check2-7").classList.toggle("check2");
	// }
	// function check8() {
	// 	document.getElementById("check1-8").classList.toggle("check1");
	// 	document.getElementById("check2-8").classList.toggle("check2");
	// }
</script>
<script>
	$('.G-select2').select2({
    		// width:"25.22%"
    	});
	$(document).ready(function(){
  		$(".G-doi-mau").click(function(){
  			a = $(this);
  			$(".G-doi-mau.hover").removeClass("hover");
    		a.addClass("hover");
  		});
	});
	function hihi1(){
		document.getElementById("hihi1").classList.remove('hihi1_hover');
		document.getElementById("hihi2").classList.remove('hihi2_hover');
	}
	function hihi2(){
		document.getElementById("hihi1").classList.add('hihi1_hover');
		document.getElementById("hihi2").classList.add('hihi2_hover');
	}
	var loadFile = function(event) {
    var ghost = document.getElementById('ghost');
    ghost.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
<script>
	jQuery(document).ready(function($){
		$("#thanh_pho").change(function(event) {
			thanh_phoId = $("#thanh_pho").val();
			$.post('quan.php', {"thanh_phoId":thanh_phoId}, function(data) {
				$("#quan_huyen").html(data);
			});
		});
	});
	function checksdt(so_dien_thoai) {
		$.post('checksdt.php', {'so_dien_thoai': so_dien_thoai}, function(data) {
			if (data=="true"){
				$("#G_error6").text("Số điện thoại đã tồn tại!");
				return false;
			}else{
      			document.getElementById('G_error6').innerHTML = "";
    		}
		});
	}

	// CHECK CHỌN MAX TỐI ĐA 2 LĨNH VỰC
	$(document).ready(function () {
	    $("input[name='linh_vuc_lam_viec[]']").change(function () {
	        var maxAllowed = 2;
	        var cnt = $("input[name='linh_vuc_lam_viec[]']:checked").length;
	        if (cnt > maxAllowed) {
	            $(this).prop("checked", "");
	            alert('Bạn chỉ được chọn tối đa ' + maxAllowed + ' lĩnh vực!!');
	        }
	    });
	});
</script>
</body>
</html>