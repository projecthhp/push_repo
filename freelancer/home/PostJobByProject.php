<?php 
	require_once 'checkUv.php';
	require_once 'config.php';
	$ma_user = $_COOKIE['UID'];
	if (isset($_POST['job_project'])) {
		
	}

?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng việc theo dự án</title>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="../js/all.js">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
	<link rel="stylesheet" href="../css/GiangCSS/All.css">
	<link rel="stylesheet" href="../css/all.css">
</head>
<body  style="background: #;">
	<?php
        $indexHeader = 1;
        $backgroundIndex =1;
        include_once 'head-index.php';
    ?>
	<div class="G-background6">
		<div class="G-body">
			<div class="G-title-of-all">
				Đăng việc theo dự án
				<div class="G-book">
				<img src="../image/img/1BookPJ.png" alt="">
				</div>
			</div>
			<div class="G-tree"> <!-- khung trắng ngoài cùng -->
				<div class="G-love"> <!-- khung trắng bên trong bé hơn -->
					<form action="#"  method="post" enctype="multipart/form-data">
						<div class="G-content1">
							<span>Việc cần tuyển Freelancer</span>
						</div>
						<div class="G-logo">
							<div class="G-images">
								<img style="width: 184px; height: 132.54px;" src="../image/img/1Logo365.png" alt="" id="G_logo">
							</div>
							<div class="G-hi">
								Logo công ty
							</div>
							<div class="G-pick-img">
								<label style="cursor: pointer;">
							      	<span class="G-anh-lg" name="anh">+ Chọn ảnh</span>
							      	<input name="anh" type="file" accept="image/*" onchange="GLogo(event)"  style="display:none">
								</label>
							</div>
						</div>
						<div class="G-small-content">
							Đặt tên cụ thể cho công việc cần tuyển <span>*</span>
						</div>
						<div class="G-full-input">
							<input type="text" name="" placeholder="VD: Thiết kế web bán hàng cao cấp">
						</div>
						<div class="G-small-content">
							Chọn lĩnh vực cần tuyển <span>*</span>
						</div>
						<div class="G-hafl-select">
							<select class="G-select2-linh-vuc">
  								<option value="#" disabled selected>Chọn lĩnh vực</option>
  								<option value="#">Wyoming</option>
  								<option value="#">ki</option>
  								<option value="#">mo</option>
  								<option value="#">chi</option>
  								<option value="#">chiy</option>
							</select>
						</div>
						<div class="G-content2">
							<span>Thông tin đầy đủ về yêu cầu tuyển dụng</span>
						</div>
						<div class="G-cover">
							<div class="G-big-div-1">
								<div class="G-small-content">
									Hình thức làm việc <span>*</span>
								</div>
								<div class="G-hafl-select2">
									<select class="G-select2-thong-tin">
		  								<option value="#" disabled selected>Chọn hình thức</option>
		  								<option value="#">Wyoming</option>
		  								<option value="#">ki</option>
		  								<option value="#">mo</option>
		  								<option value="#">chi</option>
		  								<option value="#">chiy</option>
									</select>
								</div>
							</div>
							<div class="G-big-div-1">
								<div class="G-small-content">
									Nơi làm việc <span>*</span>
								</div>
								<div class="G-hafl-select2">
									<select class="G-select2-thong-tin">
		  								<option value="#" disabled selected>Chọn địa điểm</option>
		  								<option value="#">Wyoming</option>
		  								<option value="#">ki</option>
		  								<option value="#">mo</option>
		  								<option value="#">chi</option>
		  								<option value="#">chiy</option>
									</select>
								</div>
							</div>
						</div>
						<div class="G-small-content">
							Chọn lĩnh vực cần tuyển <span>*</span>
						</div>
						<div class="G-hafl-select3">
							<select class="G-select2-thong-tin">
  								<option value="#" disabled selected>Chọn lĩnh vực</option>
  								<option value="#">Wyoming</option>
  								<option value="#">ki</option>
  								<option value="#">mo</option>
  								<option value="#">chi</option>
  								<option value="#">chiy</option>
							</select>
						</div>
						<div class="G-small-content2">
							<p>Nội dung chi tiết, và các đầu việc cần Freelancer thực hiện <span>*</span></p>
							<p>(càng chi tiết, freelancer càng có đầy đủ thông tin để gửi báo giá chính xác hơn)</p>
						</div>
						<div class="G-big-textarea">
							<textarea placeholder="VD: Thiết kế các giao diện website cần thiết như: Trang chủ, xem hàng, thanh toán..."></textarea>
						</div>
						<div class="G-small-content-xanh">
							Thêm tài kiệu đính kèm
						</div>
						<div class="G-dashed">
							<div class="G-document">
								<a href="#">+ Tải lên</a>
							</div>
							<div class="G-document2">
								Tải lên bất kỳ hình ảnh hoặc tài liệu mô tả ngắn gọn công việc (Kích thước tệp tối đa: 25 MB).
							</div>
						</div>
						<div class="G-small-content3">
							Kỹ năng yêu cầu Freelancer phải có <span>*</span>
						</div>
						<div class="G-small-div">
							<div class="G-small-content-xanh2">
								Adobe Photoshop
							</div>
							<div class="G-small-content-do">
								Xóa bỏ
							</div>
						</div>
						<div class="G-small-div">
							<div class="G-small-content-xanh2">
								Adobe Illustration
							</div>
							<div class="G-small-content-do">
								Xóa bỏ
							</div>
						</div>
						<div class="G-small-div">
							<div class="G-small-content-xanh2">
								Thiết kế Website
							</div>
							<div class="G-small-content-do">
								Xóa bỏ
							</div>
						</div>
						<div class="G-small-div">
							<div class="G-small-content-xanh2">
								Thiết kế Logo
							</div>
							<div class="G-small-content-do">
								Xóa bỏ
							</div>
						</div>
						<div class="G-small-div">
							<div class="G-small-content-xanh2">
								PHP
							</div>
							<div class="G-small-content-do">
								Xóa bỏ
							</div>
						</div>
						<div class="G-full-input2">
							<input type="text" name="" id="" placeholder="Nhập kỹ năng">
						</div>
						<div class="G-content1">
							<span>Chi phí và thời gian</span>
						</div>
						<div class="G-big-div2">
							<div class="G-small-content4">
								Ngân sách dự kiến cho công việc này <span>*</span>
							</div>
							<div class="G-choose">
								<button onclick="wow2()" id="button1" class="btn mot">Cố định</button>
							</div>
							<div class="G-choose hai">
								<button onclick="wow()" id="button2" class="btn">Ước lượng</button>
							</div>
						</div>
						<div class="G-big-div3">
							<div id="wow2" class="G-half-input">
								<input type="text" name="" placeholder="5.000.000">
								<div class="G-VND">VNĐ</div>
							</div>
							<div id="wow" class="G-half-input0">  <!-- Ấn vào button ước lượng input đổi thành cái nì -->
								<input class="input1" type="text" name="" placeholder="5.000.000">
								<input class="input2" type="text" name="" placeholder="10.000.000">
								<div class="G-VND">VNĐ</div>
								<div class="G-gach-ngang">-</div>
							</div>
							<div class="G-gach-cheo">
								/
							</div>
							<div class="G-half-input2">
								<select>
									<option value="1">Ngày</option>
									<option value="2">Tuần</option>
									<option value="3">Tháng</option>
									<option value="4">Năm</option>
								</select>
							</div>
						</div>
						<div class="G-big-div4">
							<div class="G-small-div2">
								<div class="G-small-content">
									Ngày bắt đầu đặt giá <span>*</span>
								</div>
								<div class="G-half-input-date">
									<input type="date" placeholder="Chọn ngày bắt đầu">
								</div>
							</div>	
							<div class="G-small-div2">
								<div class="G-small-content">
									Ngày đặt giá kết thúc <span>*</span>
								</div>
								<div class="G-half-input-date">
									<input type="date" name="" placeholder="Chọn ngày kết thúc">
								</div>
							</div>	
						</div>
						<div class="G-big-div5">
							<div class="G-small-div3">
								<div class="G-small-content">
									Ngày bắt đầu làm việc <span>*</span>
								</div>
								<div class="G-half-input-date2">
									<input type="date" name="" placeholder="Chọn ngày">
								</div>
							</div>	
							<div class="G-small-div3">
								<div class="G-small-content">
									Thời hạn làm việc <span>*</span>
								</div>
								<div class="G-half-input3">
									<input type="text" name="" placeholder="VD: 1 tháng">
								</div>
							</div>	
						</div>
						<div class="G-button">
							<button type="submid" name="job_project">ĐĂNG VIỆC</button>
						</div>		
					</form>
				</div>
			</div>
		</div>
	<!-- <?php require_once 'inc_footer.php'; ?> -->
	</div>
	<script>
		$('.G-select2-linh-vuc, .G-select2-thong-tin').select2({
    	// width:"25.22%"
    		// height:"42px"
    });
		//Đổi button danh sách dự kiến
		 $('.btn').click(function(){
                var e = $(this);
                $('.btn.mot').removeClass('mot');
                e.addClass('mot');
            });
		 	//Đổi input ngân sách dự kiến
		  function wow(){
                document.getElementById("wow").classList.add("G-half-input0-hover");
                document.getElementById("wow2").classList.add("G-half-input-hover");
            }
           function wow2(){
                document.getElementById("wow").classList.remove("G-half-input0-hover");
                document.getElementById("wow2").classList.remove("G-half-input-hover");
            }
            var GLogo = function(event) {
		    var G_logo = document.getElementById('G_logo');
		    G_logo.src = URL.createObjectURL(event.target.files[0]);
		  };
	</script>
</body>
</html>