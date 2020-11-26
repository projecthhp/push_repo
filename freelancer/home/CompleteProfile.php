
<?php 
	require_once 'checkUv.php';
    require_once 'config.php';
    $ma_user = $_COOKIE['UID'];
    $sql = new db_query("SELECT * FROM flc_user_freelancer where ma_user = '$ma_user' ");
    $row =  mysql_fetch_assoc($sql->result);
    $linh_vuc_lam_viec = explode(",", $row['linh_vuc_lam_viec']);
    // foreach ($linh_vuc_lam_viec as $key ) {
    // 	#F0F6FC
    // }
    $ky_nang = explode(",", $row['ky_nang']);
    //$join = ("SELECT ")
    // var_dump($ky_nang);
    $b = '';
    for ($i=0; $i <count($ky_nang) ; $i++) { 
     	$b.=$ky_nang[$i].',';
    };
    $d=rtrim($b,',');
    $sqls = "SELECT * FROM flc_ky_nang where  ma_ky_nang in($d)";
    $sqls_array = new db_query($sqls);

    $sql_anh_hs = new db_query("SELECT * FROM flc_file_anh_hs where ma_user = '$ma_user' ");
    While($anh_hs_array = mysql_fetch_assoc($sql_anh_hs->result)){
	    // var_dump($anh_hs_array['ten_anh']);
    };
    $ten_anh_hs = explode(",", $anh_hs_array['ten_anh']);
     // die();
    if (isset($_POST['thong_tin'])) {
        $condition = [
            'ma_user' => $ma_user
        ];

        $anh = $_FILES['anh']['name'];
        if ($anh == "") {
            $data = [
                'ho_va_ten'         => $_POST['ho_va_ten'],
                'gioi_tinh'         => $_POST['gioi_tinh'],
                'ngay_sinh'         => strtotime($_POST['ngay_sinh']),
                'email'             => $_POST['email'],
                'ma_tinh_thanh_pho' => $_POST['ma_tinh_thanh_pho'],
                'ma_quan_huyen'     => $_POST['ma_quan_huyen']
            ];
        }else{
            $data = [
                'anh'               => $_FILES['anh']['name'],
                'ho_va_ten'         => $_POST['ho_va_ten'],
                'gioi_tinh'         => $_POST['gioi_tinh'],
                'ngay_sinh'         => strtotime($_POST['ngay_sinh']),
                'email'             => $_POST['email'],
                'ma_tinh_thanh_pho' => $_POST['ma_tinh_thanh_pho'],
                'ma_quan_huyen'     => $_POST['ma_quan_huyen']
            ];
        }

        //thực hiện xử lý file upload
        //Thư mục bạn sẽ lưu file upload
        $target_dir    = "../image/img_user/img_freelancer/";
        //Vị trí file lưu tạm trong serve
        $target_file   = $target_dir . basename($_FILES["anh"]["name"]);
        $allowUpload   = true;
        //Lấy phần mở rộng của file (jpg, png, ...)
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Cỡ lớn nhất được upload (bytes)
        $maxfilesize   = 2097152;
        ////Những loại file được phép upload
        $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
        // Kiểm tra nếu file đã tồn tại thì không cho phép ghi đè
        // Bạn có thể phát triển code để lưu thành một tên file khác
        if (file_exists($target_file))
        {
            echo "Tên file đã tồn tại trên server, không được ghi đè";
            $allowUpload = false;
        }
        // Kiểm tra kích thước file upload cho vượt quá giới hạn cho phép
        if ($_FILES["anh"]["size"] > $maxfilesize)
        {
            echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
            $allowUpload = false;
        }
        // Kiểm tra kiểu file
        if (!in_array($imageFileType,$allowtypes ))
        {
            echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
            $allowUpload = false;
        }
        move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file);

        $sql = update('flc_user_freelancer',$data,$condition);
        // die();
        header('Location:CompleteProfile.php');
    }
    if (isset($_POST['gioi_thieu'])) {
        $condition = [
            'ma_user' => $ma_user
        ];

        $data = [
            'kinh_nghiem_lam_viec' => $_POST['kinh_nghiem_lam_viec'],
            'gioi_thieu_ban_than' => $_POST['gioi_thieu_ban_than']
        ];

        update('flc_user_freelancer',$data,$condition);
        header('Location:CompleteProfile.php');
    }
    if (isset($_POST['cong_viec'])) {
        $condition = [
            'ma_user' => $ma_user
        ];
        $chi_phi_co_dinh = $_POST['chi_phi_co_dinh'];
        $chi_phi = $_POST['chi_phi'];
        $chi_phi  = implode(",", $chi_phi);
        if($_POST['the_loai_chi_phi'] == 1){
			$chi_phi_them_moi = $chi_phi_co_dinh;
		}else{
			$chi_phi_them_moi = $chi_phi;
		}
        $data = [
            'nghe_nghiep' => $_POST['nghe_nghiep'],
            'hinh_thuc_lam_viec' => $_POST['hinh_thuc_lam_viec'],
            'noi_lam_viec_mong_muon' => $_POST['noi_lam_viec_mong_muon'],
            'the_loai_chi_phi' => $_POST['the_loai_chi_phi'],
            'chi_phi' => $chi_phi_them_moi,
            'chi_phi_theo_gi_do' => $_POST['chi_phi_theo_gi_do']
        ];

		
        $sql = update('flc_user_freelancer',$data,$condition);
        header('Location:CompleteProfile.php');
    }
    if (isset($_POST['ky_nang'])) {
    	$linh_vuc_lam_viec = $_POST['linh_vuc_lam_viec'];
    	$linh_vuc_lam_viec = implode(",",$linh_vuc_lam_viec);
    	// var_dump($linh_vuc_lam_viec);
    	$ky_nang = $_POST['skill'];
    	$ky_nang = implode(",",$ky_nang);
    	var_dump($ky_nang);
    	// die();
        $condition = [
            'ma_user' => $ma_user
        ];

        $data = [
            'linh_vuc_lam_viec' => $linh_vuc_lam_viec,
            'ky_nang' => $ky_nang
        ];

        $sql = update('flc_user_freelancer',$data,$condition);
        // var_dump($sql);
        // die();
        header('Location:CompleteProfile.php');
    }
    if (isset($_POST['ho_so'])) {
        $anh = $_FILES['anh']['name'];
		$anh = implode(',',$anh);

<<<<<<< HEAD
		$errors= array();  // up ảnh lên db
		$file_name = $_FILES['anh']['name'];
		$file_size = $_FILES['anh']['size'];
		$file_tmp = $_FILES['anh']['tmp_name'];
		$file_type = $_FILES['anh']['type'];
		// $file_ext=strtolower(end(explode('.',$_FILES['anh']['name'])));
			    
		$expensions= array("jpeg","jpg","png");
			    
		// if(in_array($file_ext,$expensions)=== false){
		// 	$errors[]="Chỉ hỗ trợ upload file JPEG, JPG hoặc PNG.";
		// }
			    
		if($file_size > 2097152) {
			$errors[]='Kích thước file không được lớn hơn 2MB';
		}
		$target = "../image/img_user/img_freelancer/".$anh;
		// move_uploaded_file($_FILES['anh']['tmp_name'], $target);        

		$sql = "INSERT INTO flc_file_anh_hs(ten_anh,ma_user)
		VALUES  ('$anh','$ma_user')";
		$db_ex  = new db_execute_return();
		$kq = $db_ex ->db_execute($sql);
		// echo $sql;
        // die();
        // header('Location:CompleteProfile.php');
    }
=======
    //     $sql = update('flc_user_freelancer',$data,$condition);
    //     var_dump($ky_nang);
    //     die();
    //     header('Location:CompleteProfile.php');
    // }
>>>>>>> 8dec9da24265d70f020e916c8380093c7c726f12
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dự án đang thực hiện</title>
	<style type="text/css">
        .wrap {
            /*margin: 10% auto;*/
            /*width: 60%;*/
        }
        
        .dandev-reviews {
            position: relative;
            margin: 20px 0;
        }
        
        .dandev-reviews .form_upload {
           	width: 218px;
    		height: 132px !important;
            position: relative;
            padding: 5px;
            bottom: 0px;
            height: 40px;
            left: 0;
            z-index: 5;
            box-sizing: border-box;
            background: #f7f7f7;
            border-top: 1px solid #ddd;
        }
        
        .dandev-reviews .form_upload>label {
            height: 35px;
            width: 160px;
            display: block;
            cursor: pointer;
        }
        
        .dandev-reviews .form_upload label span {
            padding-left: 26px;
            display: inline-block;
            background: url(images/camera.png) no-repeat;
            background-size: 23px 20px;
            margin: 5px 0 0 10px;
        }
        
        .dandev-reviews .form_upload label span img{
        	padding-left: 33%;
    		padding-top: 18%;
        }
        .list_attach {
            display: grid;
            margin-top: 30px;
        }
        
        ul.dandev_attach_view {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        ul.dandev_attach_view li {
            float: left;
            width: 80px;
            margin: 0 20px 20px 0 !important;
            padding: 0!important;
            border: 0!important;
            overflow: inherit;
            clear: none;
        }
        
        ul.dandev_attach_view .img-wrap {
            position: relative;
        }
        
        ul.dandev_attach_view .img-wrap .close {
            position: absolute;
            right: -10px;
            top: -10px;
            background: #000;
            color: #fff!important;
            border-radius: 50%;
            z-index: 2;
            display: block;
            width: 20px;
            height: 20px;
            font-size: 16px;
            text-align: center;
            line-height: 18px;
            cursor: pointer!important;
            opacity: 1!important;
            text-shadow: none;
        }
        
        ul.dandev_attach_view li.li_file_hide {
            opacity: 0;
            visibility: visible;
            width: 0!important;
            height: 0!important;
            overflow: hidden;
            margin: 0!important;
        }
        
        ul.dandev_attach_view .img-wrap-box {
            position: relative;
            overflow: hidden;
            padding-top: 100%;
            height: auto;
            background-position: 50% 50%;
            background-size: cover;
        }
        
        .img-wrap-box img {
            right: 0;
            width: 100%!important;
            height: 100%!important;
            bottom: 0;
            left: 0;
            top: 0;
            position: absolute;
            object-position: 50% 50%;
            object-fit: cover;
            transition: all .5s linear;
            -moz-transition: all .5s linear;
            -webkit-transition: all .5s linear;
            -ms-transition: all .5s linear;
        }
        
        ul li,
        ol li {
            list-style-position: inside;
        }
        
        .list_attach span.dandev_insert_attach {
            width: 80px;
            height: 80px;
            text-align: center;
            display: inline-block;
            border: 2px dashed #ccc;
            line-height: 76px;
            font-size: 25px;
            color: #ccc;
            display: none;
            cursor: pointer;
            float: left;
        }
        
        ul.dandev_attach_view {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        ul.dandev_attach_view .img-wrap {
            position: relative;
        }
        
        .list_attach.show-btn span.dandev_insert_attach {
            display: block;
            margin: 0 0 20px!important;
        }
        
        i.dandev-plus {
            font-style: normal;
            font-weight: 900;
            font-size: 35px;
            line-height: 1;
        }
        
        ul.dandev_attach_view li input {
            display: none;
        }
    </style>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="../css/GiangCSS/All.css">
</head>
<body>
	<?php 
		require_once 'HeaderPart2.php'; 
		require_once '../function/GiangFunction.php';
	?>  

	<div class="G-background7">
		<input type="text" name="ma_user" value="<?php echo $row['ma_user'] ?>">
		<div class="G-big-body">
			<div class="G-left-body">
				<div class="G-BI">
					<div class="G-backimg">
						<img src="../image/img/1Bi7small.png">
					</div>
					<div class="G-avt">
						<img src="../image/img_user/img_freelancer/<?php echo $row['anh'] ?>" alt="avt">
					</div>
				</div>
				<div class="G-big-name">
					<p>Nguyễn Lan Anh</p>
				</div>
				<div class="G-div-center">
					<div class="G-new-profile">
						<div class="G-img-new">
							<img src="../image/img/1New7.png" alt="">
						</div>
						<div class="G-new">
							Làm mới hồ sơ
						</div>
					</div> <!-- nút làm mới hồ sơ -->
				</div>
				<div class="G-big-div-left"> <!-- menu dọc -->
					<div class="G-small-div-one">
						<div class="G-div-daddy">
							<div class="G-img-one">
								<img id="three"  src="../image/img/1OneHover7.png" alt="">
								<img id="four" class="G-four-hover" src="../image/img/1OneHover7.png" alt="">
							</div>
							<div id="five" class="G-content-one">
								Quản lý chung
							</div>
							<div class="G-icon-one">
								<!-- <i id="six" class="fas fa-caret-right"></i> -->
								<i id="seven" class="fas fa-sort-down"></i>
							</div>
						</div>
						<div id="one" class="G-div-baby">
							<div class="G-line1">
								<a class="before-click one" id="wow" href="CompleteProfile.php">Hoàn thiện hồ sơ</a>
							</div>
							<div class="G-line2">
								<a onclick="wow2()" class="before-click" id="wow2" href="#">Tất cả việc làm</a>
							</div>
						</div>
					</div>
					<div onclick="click2()" id="G-change-one" class="G-small-div-two">
						<div class="G-img-two">
							<img id="G-display" src="../image/img/1Two7.png" alt="">
							<img id="G-block" class="img-two" src="../image/img/1TwoHover7.png" alt="">
						</div>	
						<div class="G-content-two">
							<a id="G-change-two" href="ProjectDoing.php">Dự án đang thực hiện</a>
						</div>
					</div>
					<div onclick="click3()" id="G-click31" class="G-small-div-three">
						<div class="G-img-two">
							<img id="G-click32" src="../image/img/1Three7.png" alt="">
							<img id="G-click33" class="img-two" src="../image/img/1ThreeHover7.png" alt="">
						</div>	
						<div class="G-content-two">
							<a id="G-click34" href="ProjectSaved.php">Dự án đã lưu</a>
						</div>
					</div>
					<div onclick="click4()" id="G-click41" class="G-small-div-four">
						<div class="G-img-two">
							<img id="G-click42" src="../image/img/1Four7.png" alt="">
							<!-- <img id="G-click33" class="img-two" src="../image/img/1ThreeHover7.png" alt=""> -->
						</div>	
						<div class="G-content-two">
							<a id="G-click44" href="#">Kinh nghiệm Freelancer</a>
						</div>
					</div>
					<div onclick="click5()" id="G-click51" class="G-small-div-four">
						<div class="G-img-two">
							<img id="G-click52" src="../image/img/1Five7.png" alt="">
							<img id="G-click53" class="img-two" src="../image/img/1FiveHover7.png" alt="">
						</div>	
						<div class="G-content-two">
							<a id="G-click54" href="ChangePassword.php">Đổi mật khẩu</a>
						</div>
					</div>
					<div onclick="click6()" id="G-click61" class="G-small-div-four">
						<div class="G-img-two">
							<img id="G-click62" src="../image/img/1Six7.png" alt="">
							<!-- <img id="G-click63" class="img-two" src="../image/img/1FiveHover7.png" alt=""> -->
						</div>	
						<div class="G-content-two">
							<a id="G-click64" href="logOutUv.php">Đăng xuất</a>
						</div>
					</div>
				</div>
			</div>
			<div class="G-right-body"> <!-- phần to to bên phải -->
				<div class="G-box-shadow">
					<div class="G-cover"> <!-- bao trùm 5 cái content trong box shadow -->
						<div class="G-content-mot">   
							<a onclick="click7()" id="G-click7" href="#GThongTin">Thông tin cơ bản</a>		<!-- JS click7 -->
						</div>
						<div class="G-content-mot">
							<a onclick="click8()" id="G-click8" href="#introduce">Giới thiệu bản thân</a>
						</div>
						<div class="G-content-mot">
							<a onclick="click9()" id="G-click9" href="#job">Công việc mong muốn</a>
						</div>
						<div class="G-content-mot">
							<a onclick="click10()" id="G-click10" href="#skill">Kỹ năng</a>
						</div>
						<div class="G-content-mot">
							<a onclick="click11()" id="G-click11" href="#file">Hồ sơ năng lực</a>
						</div>
					</div> <!-- phần content menu bên trên cùng --> <!-- Tổng cộng có 6 box shadow tương ứng với 6 mục lớn -->
				</div>
				<div id="GThongTin" class="G-box-shadow2">
					<div class="G-inside-shadow">
						<div class="G-information">
							<div class="G-ke-vang">
								<img src="../image/img/1KeVang7.png" alt="">
							</div>
							<div class="G-thong-tin">
								Thông tin cơ bản
							</div>
						</div>
						<form action="#" method="post" enctype="multipart/form-data" onsubmit="return updateTt()" onchange="return updateTt()">         <!-- FORM THÔNG TIN CƠ BẢN  -->
							<div class="G-dark">
								<div class="G-cot-phai"> <!-- gồm ảnh đại diện và cột bên phải -->
									<div class="G-anh-dai-dien">
										<div class="G-img-icon">
											<img name="anh" class="avt" src="../image/img_user/img_freelancer/<?php echo $row['anh'] ?>" id="ghost" alt="">
											<label style="cursor: pointer;">
                                                    <span class="camera"><img src="../image/img/1Camera7.png" alt=""></span>
                                                    <input name="anh" type="file" accept="image/*" onchange="loadFile(event)"  style="display:none">
                                            </label>
										</div>
									</div>
									<div class="G-input">
										<div class="G-line-one">
											<div class="G-chu-cai">
												Họ và tên <span>*</span> <span id="G_error"></span>
											</div>
											<div class="G-ip">
												<input id="ho_va_ten" type="text" name="ho_va_ten" placeholder="Nhập họ và tên" value="<?php echo $row['ho_va_ten'] ?>">
											</div>
										</div>
										<div class="G-line-one">
											<div class="G-chu-cai">
												Ngày sinh <span>*</span>
											</div>
											<div class="G-ip">
												<!-- <input type="date" name=""> -->
												<input id="ngay_sinh" name="ngay_sinh" type="date" value="<?php echo date('Y-m-d',$row['ngay_sinh']) ?>"> 
											</div>
										</div>
										<div class="G-line-one">
											<div class="G-chu-cai">
												Giới tính <span>*</span>
											</div>
											<div class="G-ip">
												<select id="gioi_tinh" name="gioi_tinh">
                                                	<option value="1" <?php if($row['gioi_tinh']==1) echo "selected"; ?>>Nam</option>
                                                    <option value="2" <?php if($row['gioi_tinh']==2) echo "selected"; ?>>Nữ</option>
                                                    <option value="3" <?php if($row['gioi_tinh']==3) echo "selected"; ?>>Khác</option>
                                                </select>
											</div>
										</div>
										<div class="G-line-one">
											<div class="G-chu-cai">
												Số điện thoại đăng nhập <span>*</span>
											</div>
											<div class="G-ip">
												<input id="so_dien_thoai" type="text" name="so_dien_thoai" disabled value="<?php echo $row['so_dien_thoai'] ?>">
											</div>
										</div>
										<div class="G-line-one">
											<div class="G-chu-cai">
												Email 
											</div>
											<div class="G-ip">
												<input id="email" type="text" name="email" placeholder="Nhập email" value="<?php echo $row['email'] ?>">
											</div>
										</div>
									</div>
								</div>
								<div class="G-select"> <!-- 2 dòng select dưới ảnh đại diện -->
									<div class="G-dong-one">
										<div class="G-chu-cai">
											Tỉnh/Thành phố
										</div>
										<div class="G-select2">
											<select name="ma_tinh_thanh_pho" id="thanh_pho" class="G-wow">
                                                <?php 
                                                    $sql ="select * from city";
                                                    $db_qr = new db_query($sql);
                                                    While($row2 = mysql_fetch_assoc($db_qr->result)){ ?>
                                                        <option value="<?php echo $row2['cit_id'] ?>" <?php if($row2['cit_id']==$row['ma_tinh_thanh_pho']) echo "selected"; ?> ><?php echo $row2["cit_name"] ?></option>;
                                                <?php }
                                                ?>
                                            </select>
										</div>
									</div>
									<div class="G-dong-one">
										<div class="G-chu-cai">
											Quận/Huyện
										</div>
										<div class="G-select2">
											<select name="ma_quan_huyen" id="quan_huyen" class="G-wow">
                                                <?php 
                                                    $quan = new db_query("SELECT * FROM city2");
                                                    While($array_quan = mysql_fetch_assoc($quan->result)){?>
                                                        <option value="<?php echo $array_quan['cit_id'] ?>" <?php if($array_quan['cit_id']==$row['ma_quan_huyen']) echo "selected"; ?> ><?php echo $array_quan["cit_name"] ?></option>;
                                                <?php   }
                                                ?>
                                            </select>
										</div>
									</div>
								</div>
							</div>
							<div class="G-button">
								<button type="submit" name="thong_tin">Cập nhật</button>
							</div>
						</form>	
					</div> <!-- Thông tin cơ bản -->
				</div>
				<div  id="introduce" class="G-box-shadow3">
					<div class="G-inside-shadow">
						<div class="G-information">
							<div class="G-ke-vang">
								<img src="../image/img/1KeVang7.png" alt="">
							</div>
							<div class="G-thong-tin">
								Giới thiệu bản thân
							</div>
						</div>
						<form action="" method="post">			<!-- FORM GIỚI THIỆU BẢN THÂN -->
							<div class="G-dark2">
								<div class="G-select-experience">
									<div class="G-chu-cai">
										Kinh nghiệm làm việc
									</div>
									<div class="G-select-kn">
										<select name="kinh_nghiem_lam_viec" class="G-wow">
                                            <option disabled selected>Kinh nghiệm</option>
                                            <?php foreach ($array_kinh_nghiem_uv as $each => $value) { ?>
                                                <option value="<?php echo $each ?>" <?php if($row['kinh_nghiem_lam_viec'] == $each) echo "selected"; ?> ><?php echo $value ?></option>
                                            <?php   } ?>
                                        </select>
									</div>
								</div>
								<div class="G-textarea">
									<div class="G-chu-cai">
										Giới thiệu bản thân
									</div>
									<div class="G-review">
										<textarea name="gioi_thieu_ban_than" placeholder="Marketing một chút về bản thân"><?php echo $row['gioi_thieu_ban_than'] ?></textarea>
									</div>
								</div>
								<div class="G-button2">
									<button type="submit" name="gioi_thieu">Cập nhật</button>
								</div>
							</div>
						</form>
					</div> <!-- Giới thiệu bản thân -->
				</div>
				<div id="job" class="G-box-shadow4">
					<div class="G-inside-shadow">
						<div class="G-information">
							<div class="G-ke-vang">
								<img src="../image/img/1KeVang7.png" alt="">
							</div>
							<div class="G-thong-tin">
								Công việc mong muốn
							</div>
						</div>
						<form action="#" method="post">			<!-- FORM CÔNG VIỆC MONG MUỐN -->
							<div class="G-dark3">
								<div class="G-big-div-one">
									<div class="G-small-div">
										<div class="G-chu-cai">
											Nghề nghiệp
										</div>
										<div class="G-input2">
											<input type="text" name="nghe_nghiep" id="" placeholder="Thiết kế Website" value="<?php echo $row['nghe_nghiep'] ?>">
										</div>
									</div>
									<div class="G-small-div2">
										<div class="G-chu-cai">
											Hình thức làm việc
										</div>
										<div class="G-select-fow">
											<select class="G-wow" name="hinh_thuc_lam_viec" id="">
                                                <option disabled selected>---Chọn hình thức---</option>
                                                <?php foreach ($array_hinh_thuc as $each => $value) { ?>
                                                    <option value="<?php echo $each ?>" <?php if($row['hinh_thuc_lam_viec'] == $each) echo "selected"; ?>><?php echo $value ?></option>
                                                <?php   } ?>
                                            </select>
										</div>
									</div>
								</div>
								<div class="G-big-div-one">
									<div class="G-small-div2">
										<div class="G-chu-cai">
											Nơi làm việc mong muốn
										</div>
										<div class="G-select-fow">
											<select class="G-wow" name="noi_lam_viec_mong_muon" id="">
                                                <option disabled selected>---Chọn nơi làm việc---</option>
                                                <?php 
                                                    $sql = new db_query("SELECT * FROM city");
                                                    While($array_city = mysql_fetch_assoc($sql->result)){ ?>
                                                        <option value="<?php echo $array_city['cit_id'] ?>" <?php if($row['noi_lam_viec_mong_muon'] == $array_city['cit_id']) echo "selected"; ?>> <?php echo $array_city['cit_name'] ?> </option>;
                                                <?php }?>
                                            </select>
										</div>
									</div>
								</div>
								<div class="G-big-div-two">
									<div class="G-chu-cai">
										Mức lương mong muốn
									</div>
									<div class="G-small-div3">
										<div class="G-choose">
											<label>
												<input style="display: none;" value="1" <?php if($row['the_loai_chi_phi']==1) echo "checked"; ?> type="radio" name="the_loai_chi_phi" id="G_radio1" >
												<span value="1" name="the_loai_chi_phi" onclick="wow4()" id="button1" class="btn">Cố định</span>
											</label>
										</div>
										<div class="G-choose2">
											<label>
												<input style="display: none;" value="2" <?php if($row['the_loai_chi_phi']==2) echo "checked"; ?> type="radio" name="the_loai_chi_phi" id="G_radio2">
												<span value="2" name="the_loai_chi_phi" onclick="wow3()" id="button2" class="btn">Ước lượng</span>
											</label>
										</div>
									</div>
								</div>
								<div class="G-big-div-three">
									<div class="G-small-div4">
										<div id="wow4" class="G-half-input">
											<input type="number" name="chi_phi_co_dinh" placeholder="Nhập mức lương (VNĐ)" value="<?php echo $row['chi_phi'] ?>">
										</div>
										<div id="wow3" class="G-half-input0">  <!-- Ấn vào button ước lượng input đổi thành cái nì -->
											<input class="input1" type="number" name="chi_phi[]" placeholder="5.000.000" value="<?php echo $row['chi_phi'] ?>">
											<input class="input2" type="number" name="chi_phi[]" placeholder="10.000.000" value="<?php echo $row['chi_phi'] ?>">
											<div class="G-gach-ngang">-</div>
										</div>
										<div class="G-gach-cheo">
											/
										</div>
										<div class="G-half-input2">
											<select name="chi_phi_theo_gi_do" class="G-wow">
												<option <?php if($row['chi_phi_theo_gi_do']==1) echo "selected"; ?> value="1">Ngày</option>
												<option <?php if($row['chi_phi_theo_gi_do']==2) echo "selected"; ?> value="2">Tuần</option>
												<option <?php if($row['chi_phi_theo_gi_do']==3) echo "selected"; ?> value="3">Tháng</option>
												<option <?php if($row['chi_phi_theo_gi_do']==4) echo "selected"; ?> value="4">Năm</option>
											</select>
										</div>
									</div>
								</div>
								<div class="G-button3">
									<button type="submit" name="cong_viec">Cập nhật</button>
								</div>
							</div>
						</form>
					</div> <!-- công việc mong muốn -->
				</div>
				<div id="skill" class="G-box-shadow5"> <!-- kỹ năng -->
					<div class="G-darkness">
						<div class="G-information">
							<div class="G-ke-vang">
								<img src="../image/img/1KeVang7.png" alt="">
							</div>
							<div class="G-thong-tin">
								Kỹ năng
							</div>
						</div>
						<form action="" method="post">
							<div class="G-div-two">
								<div class="G-line">
									<?
									$array_image = [
										['src'=>'../image/img/1branch1-7.png','alt'=>'IT'],
										['src'=>'../image/img/1branch2-7.png','alt'=>'TK'],
										['src'=>'../image/img/1branch3-7.png','alt'=>'VD'],
										['src'=>'../image/img/1branch4-7.png','alt'=>'KN'],
										['src'=>'../image/img/1branch5-7.png','alt'=>'KT'],
										['src'=>'../image/img/1branch6-7.png','alt'=>'KX'],
										['src'=>'../image/img/1branch7-7.png','alt'=>'VI'],
										['src'=>'../image/img/1branch8-7.png','alt'=>'ANT']
									];
									$linh_vuc = "SELECT * FROM flc_linh_vuc_lam_viec2";
									$linh_vuc_array = new db_query($linh_vuc);
									$i = 0;
									While($row2 = mysql_fetch_assoc($linh_vuc_array->result)){
										// $actived = 
									?>
									<label for="checkedbox_<?php echo $i?>">
									<input value="<?php echo $row2['ma_linh_vuc'] ?>" style="display: none;" type="checkbox" name="linh_vuc_lam_viec[]" id="checkedbox_<?php echo $i?>" <?php if(in_array($row2['ma_linh_vuc'],$linh_vuc_lam_viec)) {echo 'checked';} ?>>
									<div id="GClick1-<?php echo $i?>" class="G-o1 <?php if ($linh_vuc_lam_viec[0] == $row2['ma_linh_vuc'] || $linh_vuc_lam_viec[1] == $row2['ma_linh_vuc']) {echo 'actived';} ?>" data-id="<?php echo $row2['ma_linh_vuc']?>">
										<div id="GClick1-2" class="G-anh1" >
											<img src="<?php echo $array_image[$i]['src'] ?>" alt="IT">
										</div>
										<div class="G-hello">
											<?php echo $row2['ten_linh_vuc'] ?>
										</div>
									</div>
									</label>
									<?
									$i++;
									}
									?>
									<hr>
								</div>
							</div>  <!-- FORM KỸ NĂNG -->
						
							<div class="G-div-three"> <!-- bên trái để tích checkbox -->
								<div class="G-float">
									<div class="G-chu-cai">Chọn kỹ năng</div>
									<div class="G-check-box">
										<div class="G-check-left"> <!-- Dọc check bên trái -->
											<div class="G-flex" id="G_ky_nang">
												<?php 
													While($dem = mysql_fetch_assoc($sqls_array->result)){ ?>
														<div class="G_kn" style="float: left; width: 50%; padding-bottom: 10px;">
															<div class="G-div" style="float: left;">
																<input value="<?php echo $dem['ma_ky_nang'] ?>" class="check1" onclick="getNameCheckBox(this,'checkbox_<?php echo $dem['ma_ky_nang'] ?>')" id="checkbox_<?php echo $dem['ma_ky_nang'] ?>" type="checkbox" name="skill[]" data-name="<?php echo $dem['ten_ky_nang'] ?>" >
																<!-- <?php if(in_array($dem['ma_ky_nang'],$ky_nang)) {echo 'checked';} ?> -->
															</div>
															<div class="G-nd">
																<?php echo $dem['ten_ky_nang'] ?>
															</div>
														</div>
											    <?php }?>
											</div>
										</div>
									</div>
								</div>
								<div class="G-left"> <!-- bên hiện kĩ năng đã được tick và bao nhiêu skill đã được chọn -->
									<div class="G-skill">
										<div class="G-pick"> <!-- số lượng skill đc chọn -->
											Kỹ năng được chọn <b id="pick">0</b> 
										</div>
										<div class="G-tick"> <!-- những skill được chọn -->
											<div class="G-cover-tick">
												
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="G-button3">
								<div class="G-center">
									<button type="submit" name="ky_nang">Cập nhật</button>
								</div>
							</div>
						</div>
					</form>
				</div>
				<form  id="imageform" enctype="multipart/form-data" method="post">  <!-- FORM HỒ SƠ NĂNG LỰC đăng ảnh -->
					<div id="file" class="G-box-shadow6"> <!-- Hồ sơ năng lực -->
						<div class="G-darkness2">
							<div class="G-information">
								<div class="G-ke-vang">
									<img src="../image/img/1KeVang7.png" alt="">
								</div>
								<div class="G-thong-tin">
									Hồ sơ năng lực
								</div>
							</div>
							<div class="wrap">
						        <div class="dandev-reviews">
						            <div class="form_upload">
						                <label class="dandev_insert_attach"><span><img src="../image/img/1UpImg.png" alt=""></span></label>
						            </div>
						            <div class="list_attach">
						                <ul class="dandev_attach_view">

						                </ul>
						                <span class="dandev_insert_attach"><i class="dandev-plus">+</i></span>
						            </div>
						        </div>
						    </div>
							<div class="G-download"> <!-- tải xuống -->
								<div class="G-cover-down">
									<div class="G-down">
										<div class="G-tieu-de">
											<span>Thiết kế 2D triển khai nội thất</span>
										</div>
										<div class="G-under-td">
											<div class="G-link">
												<a href="#">Thiet_ke_trien_khai_noi_that_2D.pdf</a>
											</div>
											<div class="G-button4">
												<button>Tải xuống</button>
											</div>
										</div>
									</div>
									<div class="G-down2">
										<div class="G-tieu-de">
											<span>Thiết kế 2D triển khai nội thất</span>
										</div>
										<div class="G-under-td">
											<div class="G-link">
												<a href="#">Thiet_ke_trien_khai_noi_that_2D.pdf</a>
											</div>
											<div class="G-button4">
												<button>Tải xuống</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="G-more-pj"> <!-- thêm dự án -->
								<div class="G-contun">
									Thêm hồ sơ năng lực của bạn
								</div>
								<div class="G-input-file">
									<input type="text" name="" id="" placeholder="Nhập tên dự án">
								</div>
								<div class="G-dashed">
									<div class="G-a-link">
										<label>
											<input type="file" style="display: none;">
											<div class="G_down_up">+ tải lên</div>
										</label>
									</div>
									<div class="G-warning">
										Tải lên tài liệu mô tả sản phẩm công việc bạn từng làm  (Kích thước tệp tối đa: 25 MB).
									</div>
								</div>
							</div>
							<div class="G-button5">
								<button type="submit" name="ho_so">Cập nhật</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- <?php require_once 'inc_footer.php'; ?> -->
		</div>
	</div> <!-- thẻ div đóng của header -->
<<<<<<< HEAD
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
=======
	<script src="../js/jquery.min.js"></script>
	<script src="../js/select2.min.js"></script>
	<script src="../js/slick.min.js"></script>
>>>>>>> 8dec9da24265d70f020e916c8380093c7c726f12
	<script>
		$('.dandev_insert_attach').click(function() {
            if ($('.list_attach').hasClass('show-btn') === false) {
                $('.list_attach').addClass('show-btn');
            }
            var _lastimg = jQuery('.dandev_attach_view li').last().find('input[type="file"]').val();

            if (_lastimg != '') {
                var d = new Date();
                var _time = d.getTime();
                var _html = '<li id="li_files_' + _time + '" class="li_file_hide">';
                _html += '<div class="img-wrap">';
                _html += '<span class="close" onclick="DelImg(this)">×</span>';
                _html += ' <div class="img-wrap-box"></div>';
                _html += '</div>';
                _html += '<div class="' + _time + '">';
                _html += '<input name="anh[]" type="file" class="hidden"  onchange="uploadImg(this)" id="files_' + _time + '"   />';
                _html += '</div>';
                _html += '</li>';
                jQuery('.dandev_attach_view').append(_html);
                jQuery('.dandev_attach_view li').last().find('input[type="file"]').click();
            } else {
                if (_lastimg == '') {
                    jQuery('.dandev_attach_view li').last().find('input[type="file"]').click();
                } else {
                    if ($('.list_attach').hasClass('show-btn') === true) {
                        $('.list_attach').removeClass('show-btn');
                    }
                }
            }
        });

        function uploadImg(el) {
            var file_data = $(el).prop('files')[0];
            var type = file_data.type;
            //Xét kiểu file được upload
            var match = ["image/gif", "image/png", "image/jpg", "image/jpeg"];

            if (type == match[0] || type == match[1] || type == match[2] || type == match[3]) {

                var fileToLoad = file_data;

                var fileReader = new FileReader();

                fileReader.onload = function(fileLoadedEvent) {
                    var srcData = fileLoadedEvent.target.result;

                    var newImage = document.createElement('img');
                    newImage.src = srcData;
                    var _li = $(el).closest('li');
                    if (_li.hasClass('li_file_hide')) {
                        _li.removeClass('li_file_hide');
                    }
                    _li.find('.img-wrap-box').append(newImage.outerHTML);


                }
                fileReader.readAsDataURL(fileToLoad);

                //khởi tạo đối tượng form data
                var form_data = new FormData();
                //thêm files vào trong form data
                form_data.append('file', file_data);
                //sử dụng ajax post
                $.ajax({
                    url: 'upload.php', // gửi đến file upload.php 
                    dataType: 'text',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function(data) {
                alert(2);
                        // alert(data);
                    }
                });
            } else {
                alert('Chỉ được upload file ảnh');

            }
            return false;
        }
        function DelImg(el) {
            jQuery(el).closest('li').remove();

        }

        ////////////////////////////////////////////
        ///
		$('.G-wow').select2({
    		// width:"25.22%"
    	});
        function wow2(){
        	document.getElementById('wow2').classList.add('wow-hover');
        	document.getElementById('wow').classList.remove('one');
        }
        function click2(){
        	document.getElementById('G-change-one').classList.add('G-small-div-two-hover');
        	document.getElementById('G-display').classList.add('G-display');
        	document.getElementById('G-block').classList.add('img-two-hover');
        	document.getElementById('G-change-two').classList.add('G-change-two');
        	document.getElementById('one').classList.add('G-div-baby-hover');
        	document.getElementById('two').classList.remove('G-div-daddy-hover');
        	document.getElementById('three').classList.remove('G-three-hover');
        	document.getElementById('four').classList.remove('G-four-hover-hover');
        	document.getElementById('five').classList.remove('G-content-one-hover');
        	document.getElementById('six').classList.remove('six');
        	document.getElementById('seven').classList.remove('seven');
        	document.getElementById('G-click31').classList.remove('G-small-div-two-hover');
        	document.getElementById('G-click32').classList.remove('G-display');
        	document.getElementById('G-click33').classList.remove('img-two-hover');
        	document.getElementById('G-click34').classList.remove('G-change-two');
        	document.getElementById('G-click41').classList.remove('G-small-div-two-hover');
        	document.getElementById('G-click44').classList.remove('G-change-two');
        	document.getElementById('G-click51').classList.remove('G-small-div-two-hover');
        	document.getElementById('G-click52').classList.remove('G-display');
        	document.getElementById('G-click53').classList.remove('img-two-hover');
        	document.getElementById('G-click54').classList.remove('G-change-two');
        	document.getElementById('G-click61').classList.remove('G-small-div-two-hover');
        	document.getElementById('G-click64').classList.remove('G-change-two');
        }
         function click3(){
        	document.getElementById('G-click31').classList.add('G-small-div-two-hover');
        	document.getElementById('G-click32').classList.add('G-display');
        	document.getElementById('G-click33').classList.add('img-two-hover');
        	document.getElementById('G-click34').classList.add('G-change-two');
        	document.getElementById('one').classList.remove('G-div-baby-hover');
        	document.getElementById('two').classList.remove('G-div-daddy-hover');
        	document.getElementById('three').classList.remove('G-three-hover');
        	document.getElementById('four').classList.remove('G-four-hover-hover');
        	document.getElementById('five').classList.remove('G-content-one-hover');
        	document.getElementById('six').classList.remove('six');
        	document.getElementById('seven').classList.remove('seven');
        	document.getElementById('G-change-one').classList.remove('G-small-div-two-hover');
        	document.getElementById('G-display').classList.remove('G-display');
        	document.getElementById('G-block').classList.remove('img-two-hover');
        	document.getElementById('G-change-two').classList.remove('G-change-two');
        	document.getElementById('G-click41').classList.remove('G-small-div-two-hover');
        	document.getElementById('G-click44').classList.remove('G-change-two');
        	document.getElementById('G-click51').classList.remove('G-small-div-two-hover');
        	document.getElementById('G-click52').classList.remove('G-display');
        	document.getElementById('G-click53').classList.remove('img-two-hover');
        	document.getElementById('G-click54').classList.remove('G-change-two');
        	document.getElementById('G-click61').classList.remove('G-small-div-two-hover');
        	document.getElementById('G-click64').classList.remove('G-change-two');
        }
        function click4(){
        	document.getElementById('G-click41').classList.add('G-small-div-two-hover');
        	document.getElementById('G-click44').classList.add('G-change-two');
        	document.getElementById('one').classList.remove('G-div-baby-hover');
        	document.getElementById('two').classList.remove('G-div-daddy-hover');
        	document.getElementById('three').classList.remove('G-three-hover');
        	document.getElementById('four').classList.remove('G-four-hover-hover');
        	document.getElementById('five').classList.remove('G-content-one-hover');
        	document.getElementById('six').classList.remove('six');
        	document.getElementById('seven').classList.remove('seven');
        	document.getElementById('G-click31').classList.remove('G-small-div-two-hover');
        	document.getElementById('G-click32').classList.remove('G-display');
        	document.getElementById('G-click33').classList.remove('img-two-hover');
        	document.getElementById('G-click34').classList.remove('G-change-two');
        	document.getElementById('G-change-one').classList.remove('G-small-div-two-hover');
        	document.getElementById('G-display').classList.remove('G-display');
        	document.getElementById('G-block').classList.remove('img-two-hover');
        	document.getElementById('G-change-two').classList.remove('G-change-two');
        	document.getElementById('G-click51').classList.remove('G-small-div-two-hover');
        	document.getElementById('G-click52').classList.remove('G-display');
        	document.getElementById('G-click53').classList.remove('img-two-hover');
        	document.getElementById('G-click54').classList.remove('G-change-two');
        	document.getElementById('G-click61').classList.remove('G-small-div-two-hover');
        	document.getElementById('G-click64').classList.remove('G-change-two');
        }
        function click5(){
        	document.getElementById('G-click51').classList.add('G-small-div-two-hover');
        	document.getElementById('G-click52').classList.add('G-display');
        	document.getElementById('G-click53').classList.add('img-two-hover');
        	document.getElementById('G-click54').classList.add('G-change-two');
        	document.getElementById('G-click41').classList.remove('G-small-div-two-hover');
        	document.getElementById('G-click44').classList.remove('G-change-two');
        	document.getElementById('one').classList.remove('G-div-baby-hover');
        	document.getElementById('two').classList.remove('G-div-daddy-hover');
        	document.getElementById('three').classList.remove('G-three-hover');
        	document.getElementById('four').classList.remove('G-four-hover-hover');
        	document.getElementById('five').classList.remove('G-content-one-hover');
        	document.getElementById('six').classList.remove('six');
        	document.getElementById('seven').classList.remove('seven');
        	document.getElementById('G-click31').classList.remove('G-small-div-two-hover');
        	document.getElementById('G-click32').classList.remove('G-display');
        	document.getElementById('G-click33').classList.remove('img-two-hover');
        	document.getElementById('G-click34').classList.remove('G-change-two');
        	document.getElementById('G-change-one').classList.remove('G-small-div-two-hover');
        	document.getElementById('G-display').classList.remove('G-display');
        	document.getElementById('G-block').classList.remove('img-two-hover');
        	document.getElementById('G-change-two').classList.remove('G-change-two');
        	document.getElementById('G-click61').classList.remove('G-small-div-two-hover');
        	document.getElementById('G-click64').classList.remove('G-change-two');
        }
        function click6(){
        	document.getElementById('G-click61').classList.add('G-small-div-two-hover');
        	document.getElementById('G-click64').classList.add('G-change-two');
        	document.getElementById('G-click51').classList.remove('G-small-div-two-hover');
        	document.getElementById('G-click52').classList.remove('G-display');
        	document.getElementById('G-click53').classList.remove('img-two-hover');
        	document.getElementById('G-click54').classList.remove('G-change-two');
        	document.getElementById('G-click41').classList.remove('G-small-div-two-hover');
        	document.getElementById('G-click44').classList.remove('G-change-two');
        	document.getElementById('one').classList.remove('G-div-baby-hover');
        	document.getElementById('two').classList.remove('G-div-daddy-hover');
        	document.getElementById('three').classList.remove('G-three-hover');
        	document.getElementById('four').classList.remove('G-four-hover-hover');
        	document.getElementById('five').classList.remove('G-content-one-hover');
        	document.getElementById('six').classList.remove('six');
        	document.getElementById('seven').classList.remove('seven');
        	document.getElementById('G-click31').classList.remove('G-small-div-two-hover');
        	document.getElementById('G-click32').classList.remove('G-display');
        	document.getElementById('G-click33').classList.remove('img-two-hover');
        	document.getElementById('G-click34').classList.remove('G-change-two');
        	document.getElementById('G-change-one').classList.remove('G-small-div-two-hover');
        	document.getElementById('G-display').classList.remove('G-display');
        	document.getElementById('G-block').classList.remove('img-two-hover');
        	document.getElementById('G-change-two').classList.remove('G-change-two');
        }
        function click7(){
        	document.getElementById('G-click7').classList.add('click7-hover');
        	document.getElementById('G-click8').classList.remove('click8-hover');
        	document.getElementById('G-click9').classList.remove('click9-hover');
        	document.getElementById('G-click10').classList.remove('click10-hover');
        	document.getElementById('G-click11').classList.remove('click11-hover');
        }
        function click8(){
        	document.getElementById('G-click8').classList.add('click8-hover');
        	document.getElementById('G-click7').classList.remove('click7-hover');
        	document.getElementById('G-click9').classList.remove('click9-hover');
        	document.getElementById('G-click10').classList.remove('click10-hover');
        	document.getElementById('G-click11').classList.remove('click11-hover');
        }
        function click9(){
        	document.getElementById('G-click9').classList.add('click9-hover');
        	document.getElementById('G-click8').classList.remove('click8-hover');
        	document.getElementById('G-click7').classList.remove('click7-hover');
        	document.getElementById('G-click10').classList.remove('click10-hover');
        	document.getElementById('G-click11').classList.remove('click11-hover');
        }
        function click10(){
        	document.getElementById('G-click10').classList.add('click10-hover');
        	document.getElementById('G-click8').classList.remove('click8-hover');
        	document.getElementById('G-click9').classList.remove('click9-hover');
        	document.getElementById('G-click7').classList.remove('click7-hover');
        	document.getElementById('G-click11').classList.remove('click11-hover');
        }
        function click11(){
        	document.getElementById('G-click11').classList.add('click11-hover');
        	document.getElementById('G-click8').classList.remove('click8-hover');
        	document.getElementById('G-click9').classList.remove('click9-hover');
        	document.getElementById('G-click10').classList.remove('click10-hover');
        	document.getElementById('G-click7').classList.remove('click7-hover');
        }
        $('.btn').click(function(){
            var e = $(this);
            $('.btn.mot').removeClass('mot');
            e.addClass('mot');
        });
        function wow3(){
            document.getElementById("wow3").classList.toggle("G-half-input0-hover");
            document.getElementById("wow4").classList.toggle("G-half-input-hover");
        }
        function wow4(){
            document.getElementById("wow3").classList.toggle("G-half-input0-hover");
            document.getElementById("wow4").classList.toggle("G-half-input-hover");
        }
        function GClick(){
        	document.getElementById('GClick1-1').classList.toggle('GClick1-1-hover');
        	document.getElementById('GClick1-2').classList.toggle('GClick1-2-hover');
        }
        function GClick2(){
        	document.getElementById('GClick2-1').classList.toggle('GClick2-1-hover');
        	document.getElementById('GClick2-2').classList.toggle('GClick2-2-hover');
        }
        function GClick3(){
        	document.getElementById('GClick3-1').classList.toggle('GClick3-1-hover');
        	document.getElementById('GClick3-2').classList.toggle('GClick3-2-hover');
        }
        function GClick4(){
        	document.getElementById('GClick4-1').classList.toggle('GClick4-1-hover');
        	document.getElementById('GClick4-2').classList.toggle('GClick4-2-hover');
        }
        function GClick5(){
        	document.getElementById('GClick5-1').classList.toggle('GClick5-1-hover');
        	document.getElementById('GClick5-2').classList.toggle('GClick5-2-hover');
        }
        function GClick6(){
        	document.getElementById('GClick6-1').classList.toggle('GClick6-1-hover');
        	document.getElementById('GClick6-2').classList.toggle('GClick6-2-hover');
        }
        function GClick7(){
        	document.getElementById('GClick7-1').classList.toggle('GClick7-1-hover');
        	document.getElementById('GClick7-2').classList.toggle('GClick7-2-hover');
        }
        function GClick8(){
        	document.getElementById('GClick8-1').classList.toggle('GClick8-1-hover');
        	document.getElementById('GClick8-2').classList.toggle('GClick8-2-hover');
        }
        // js phần kỹ năng, khi tích checkbox thì hiện sang phần kỹ năng đã được chọn!
        var i = 0;
        function getNameCheckBox(e,id){
        	var abc = e.hasAttribute('class'); // kiểm tra cái thằng mình click có class k
        	var ths = $(this);
        	if (abc==true) {  //nếu có:
        		var a = document.getElementById(id).getAttribute("data-name"); //lấy gía trị name của nó
        		item = `<div id="nnn" class="G-god `+id+`">
							<div class="G-shit">`+a+`</div>
							<div class="G-damn"><i onclick="tickpick(this,'`+id+`')" class="fas fa-times" data-name=`+id+`></i></div>
						</div>`
        		$('.G-cover-tick').append(item);
        		document.getElementById(id).removeAttribute('class');
        		ths = e.hasAttribute('class');
        		
        	}else{
        		document.getElementById(id).classList.add('acb');
        		document.getElementsByClassName(id)[0].remove();
        	}
        	i = $('.G-cover-tick .G-god').length;
        	$("#pick").text(i);
        }
        // ở kỹ năng được chọn, khi tích vào dấu nhân hoặc bỏ chọn checkbox thì sẽ giảm
        function tickpick(e,id) {
  			var myobj = $(this);
  			myobj.remove();
  			i--;
        	$("#pick").text(i);
        	var a = document.getElementById(id).getAttribute("data-name");
	       	$('#'+id).click();
	       	i = $('.G-cover-tick .G-god').length;
        	$("#pick").text(i);
		}
		// jQuery(document).ready(function($){
	</script>
	<script>
		// ajax quận theo thành phố
		jQuery(document).ready(function($){
			$("#thanh_pho").change(function(event) {
				thanh_phoId = $("#thanh_pho").val();
				$.post('quan.php', {"thanh_phoId":thanh_phoId}, function(data) {
					$("#quan_huyen").html(data);
				});
			});
		});

		//hiển thị ảnh được chọn
		var loadFile = function(event) {
		    var ghost = document.getElementById('ghost');
		    ghost.src = URL.createObjectURL(event.target.files[0]);
		};
		var loadFile2 = function(event) {
		    var view = document.getElementById('view');
		    view.src = URL.createObjectURL(event.target.files[0]);
		};

		//check thể loại lương được chọn trng db
		if(document.getElementById('G_radio1').checked) {
			$('#button1').addClass('mot');
		}else if(document.getElementById('G_radio2').checked) {
			$('#button2').addClass('mot');
			$('#wow4').addClass('G-half-input-hover');
			$('#wow3').addClass('G-half-input0-hover');
		}
			
		//ajax cho phần kỹ năng và check được chọn tối đa 2 lĩnh vực
		jQuery(document).ready(function($){
			$('.G-o1').click(function(){
				if($(this).hasClass('actived')){
					$(this).removeClass('actived');
				}else{
					$(this).addClass('actived');
				}
				var maxAllowed = 2;
				count = $('.G-o1.actived').length;
				if (count > maxAllowed) {
		            $(this).prop("class", "G-o1");
		            alert('Bạn chỉ được chọn tối đa ' + maxAllowed + ' lĩnh vực!!');
		        }
				array_id = [];
				$('.G-o1.actived').each(function(){
					array_id.push($(this).data('id'));
				});
				$.ajax({
					type: "POST",
					url: "../ajax/ky_nang.php",
					data:{
						arr : array_id
					},success:function(data){
						console.log(data);
						$("#G_ky_nang").html(data);
					}
				});
			});
		});
		

	</script>
</body>
</html>
