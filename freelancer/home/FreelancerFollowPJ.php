<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Việc làm Freelancer theo dự án</title>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/all.css">
	<link rel="stylesheet" href="../css/GiangCSS/All.css">
	<script src="../js/all.js"></script>	
</head>
<body>
	
	<?php
		include_once 'head-index.php';
	?>
	<div class="G_background3"> <!-- background cả trang --> 
		<div class="G_header"> <!-- 3 dòng đầu (trang chủ, tìm kiếm, tìm nhiều nhất) -->
			<div class="G_line1">
				<a href="#">Trang chủ / </a><a href="#">Việc Freelancer /</a> <a href="#">Việc làm Freelancer theo dự án</a>
			</div>
			<div class="G_line2">
				<div class="G_search_bar">
					<form action="#">
						<input type="text" name="" id="" placeholder="   Nhập từ khóa..."><select class="hello">
									<option value="#" disabled selected>Chọn tỉnh thành</option>
									<option value="#">Quảng Ninh</option>
									<option value="#">Hà Nội</option>
									<option value="#">Hải Phòng</option>
									<option value="#">Sài Gòn</option>
								</select><select class="hello">
									<option value="#" disabled selected>Chọn ngành nghề</option>	
									<option value="#">Sếp</option>	
									<option value="#">Phó Sếp</option>	
									<option value="#">Trường Phòng</option>	
								</select>
						<button><a href="#"><i class="fas fa-search"></i></a></button>
					</form>
				</div>
			</div>
			<div class="G_line3">
				<div class="column0">Tìm nhiều nhất</div>
				<div class="column"><a href="#">Javascript</a></div>
				<div class="column"><a href="#">PHP</a></div>
				<div class="column"><a href="#">Design</a></div>
				<div class="column"><a href="#">Video</a></div>
				<div class="column1"><a href="#">Biên tập viên</a></div>
			</div>
		</div>
		<div class="G_midder"> <!-- tiếp đến xem thêm gần cuối trang -->
			<div class="G_column1"> <!-- cột bên trái gồm tất cả - việc làm freelancer theo dự án - việc làm freelancer bán thời gian -->
				<div class="G_menu"> <!-- thanh màu xanh gồm 3 cột -->
					<div class="G_cot1" tabindex="1">
						<a href="#">Tất cả</a>
					</div>
					<div class="G_cot2" tabindex="2">
						<a href="#">Việc làm Freelancer theo dựa án</a>
					</div>
					<div class="G_cot3" tabindex="3">
						<a href="#">Việc làm Freelancer bán thời gian</a>
					</div>

				</div>
				<div class="G_menu_mobile">
					<ul class="G_ul_outside">
						<li class="G_li_outside">
							<a href="#">
								Việc làm Freelancer theo dự án <i class="fas fa-sort-down"></i>
							</a>
							<ul class="G_ul_inside">
								<li class="G_li_inside1">
									<a href="#">Tất cả</a>
								</li>
								<li class="G_li_inside2">
									<a href="#">Việc làm Freelancer bán thời gian</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="G_content"> <!-- khung của tất cả sản phẩm bên dưới thanh màu xanh -->
					<div class="G_dong1"> <!-- khung bên ngoài sp thứ nhất -->
						<div class="G_logo"> <!-- khung bên trong gồm tất cả gì có bên trong khung sp thứ nhất -->
							<div class="G_img"> <!-- logo -->
								<img src="../image/img/1logo1.png" alt="logo">
							</div>
							<div class="G_nd"> <!-- bên cạnh logo -->
								<div class="G_span">
									<a href="ProjectEmployment.php">
										<span>
										Sửa code plugin theo đúng chuẩn wordpress
										</span>
									</a>
								</div>
								<div class="G_name">
									Nguyễn Hồng Ánh
								</div>
								<div class="G_cs">
									<div class="G_dm">
										<div style="float: left;">
											<img src="../image/img/1capsach.png" alt="anh">
										</div>
										 	<div class="G_ha">Lập trình phần mềm</div>
									</div>
									<div>
										<div style="float: left;">
											<img src="../image/img/1ggmaps.png" alt="anh">
										</div>
										 	<div class="G_ha">Hồ Chí Minh</div>
									</div>
								</div>
							</div>
							<div class="G_not_span" style="height: 85px"> <!-- đặt giá và heart -->
								<div>
										<img src="../image/img/1heart.png" alt="anh"><a href="#">Đặt giá</a>
								</div>
							</div>
							<div class="G_under_logo"> <!-- các thông số -->
								<div class="G_inside1">
									<a href="#">Dự án</a>
								</div>
								<div class="G_inside1">
									<p class="G_p2_1">$ 5.000.000đ</p>
								</div>
								<div class="G_inside1">
									<p><strong>5</strong> lượt đặt giá</p>
								</div>
								<div class="G_inside2">
									<p><strong>Hết hạn:</strong> 20/9/2020</p>
								</div>
							</div>
							<div class="G_document"> <!-- văn bản -->
								<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
							</div>
							<!-- Kỹ năng -->
							<div class="skill">
								<div class="skill1">Kỹ năng:</div>
								<div class="skill2">PHP</div>
								<div class="skill4">Plugin</div>
								<div class="skill5">Wordpress</div>
								<div class="skill6">WooCommerce</div>
								<div class="skill7">Code</div>
								<div class="skill3">Graphic Design</div>
								<div class="skill8"><span>+2</span></div>
							</div>
						</div>
					</div>
					<div class="G_dong1"> <!-- khung bên ngoài sp thứ nhất -->
						<div class="G_logo"> <!-- khung bên trong gồm tất cả gì có bên trong khung sp thứ nhất -->
							<div class="G_img"> <!-- logo -->
								<img src="../image/img/1logo1.png" alt="logo">
							</div>
							<div class="G_nd"> <!-- bên cạnh logo -->
								<div class="G_span">
									<span>Sửa code plugin theo đúng chuẩn wordpress</span>
								</div>
								<div class="G_name">
									Nguyễn Hồng Ánh
								</div>
								<div class="G_cs">
									<div class="G_dm">
										<div style="float: left;">
											<img src="../image/img/1capsach.png" alt="anh">
										</div>
										 	<div class="G_ha">Lập trình phần mềm</div>
									</div>
									<div>
										<div style="float: left;">
											<img src="../image/img/1ggmaps.png" alt="anh">
										</div>
										 	<div class="G_ha">Hồ Chí Minh</div>
									</div>
								</div>
							</div>
							<div class="G_not_span" style="height: 85px"> <!-- đặt giá và heart -->
								<div>
									<img src="../image/img/1heart.png" alt="anh"><a href="#">Đặt giá</a>
								</div>
							</div>
							<div class="G_under_logo"> <!-- các thông số -->
								<div class="G_inside1">
									<a href="#">Dự án</a>
								</div>
								<div class="G_inside1">
									<p class="G_p2_1">$ 5.000.000đ</p>
								</div>
								<div class="G_inside1">
									<p><strong>5</strong> lượt đặt giá</p>
								</div>
								<div class="G_inside2">
									<p><strong>Hết hạn:</strong> 20/9/2020</p>
								</div>
							</div>
							<div class="G_document"> <!-- văn bản -->
								<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
							</div>
							<!-- Kỹ năng -->
							<div class="skill">
								<div class="skill1">Kỹ năng:</div>
								<div class="skill2">PHP</div>
								<div class="skill4">Plugin</div>
								<div class="skill5">Wordpress</div>
								<div class="skill6">WooCommerce</div>
								<div class="skill7">Code</div>
								<div class="skill3">Graphic Design</div>
								<div class="skill8"><span>+2</span></div>
							</div>
						</div>
					</div>
					<div class="G_dong1"> <!-- khung bên ngoài sp thứ nhất -->
						<div class="G_logo"> <!-- khung bên trong gồm tất cả gì có bên trong khung sp thứ nhất -->
							<div class="G_img"> <!-- logo -->
								<img src="../image/img/1logo1.png" alt="logo">
							</div>
							<div class="G_nd"> <!-- bên cạnh logo -->
								<div class="G_span">
									<span>Sửa code plugin theo đúng chuẩn wordpress</span>
								</div>
								<div class="G_name">
									Nguyễn Hồng Ánh
								</div>
								<div class="G_cs">
									<div class="G_dm">
										<div style="float: left;">
											<img src="../image/img/1capsach.png" alt="anh">
										</div>
										 	<div class="G_ha">Lập trình phần mềm</div>
									</div>
									<div>
										<div style="float: left;">
											<img src="../image/img/1ggmaps.png" alt="anh">
										</div>
										 	<div class="G_ha">Hồ Chí Minh</div>
									</div>
								</div>
							</div>
							<div class="G_not_span" style="height: 85px"> <!-- đặt giá và heart -->
								<div>
									<img src="../image/img/1heart.png" alt="anh"><a href="#">Đặt giá</a>
								</div>
							</div>
							<div class="G_under_logo"> <!-- các thông số -->
								<div class="G_inside1">
									<a href="#">Dự án</a>
								</div>
								<div class="G_inside1">
									<p class="G_p2_1">$ 5.000.000đ</p>
								</div>
								<div class="G_inside1">
									<p><strong>5</strong> lượt đặt giá</p>
								</div>
								<div class="G_inside2">
									<p><strong>Hết hạn:</strong> 20/9/2020</p>
								</div>
							</div>
							<div class="G_document"> <!-- văn bản -->
								<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
							</div>
							<!-- Kỹ năng -->
							<div class="skill">
								<div class="skill1">Kỹ năng:</div>
								<div class="skill2">PHP</div>
								<div class="skill4">Plugin</div>
								<div class="skill5">Wordpress</div>
								<div class="skill6">WooCommerce</div>
								<div class="skill7">Code</div>
								<div class="skill3">Graphic Design</div>
								<div class="skill8"><span>+2</span></div>
							</div>
						</div>
					</div>
					<div class="G_dong1"> <!-- khung bên ngoài sp thứ nhất -->
						<div class="G_logo"> <!-- khung bên trong gồm tất cả gì có bên trong khung sp thứ nhất -->
							<div class="G_img"> <!-- logo -->
								<img src="../image/img/1logo1.png" alt="logo">
							</div>
							<div class="G_nd"> <!-- bên cạnh logo -->
								<div class="G_span">
									<span>Sửa code plugin theo đúng chuẩn wordpress</span>
								</div>
								<div class="G_name">
									Nguyễn Hồng Ánh
								</div>
								<div class="G_cs">
									<div class="G_dm">
										<div style="float: left;">
											<img src="../image/img/1capsach.png" alt="anh">
										</div>
										 	<div class="G_ha">Lập trình phần mềm</div>
									</div>
									<div>
										<div style="float: left;">
											<img src="../image/img/1ggmaps.png" alt="anh">
										</div>
										 	<div class="G_ha">Hồ Chí Minh</div>
									</div>
								</div>
							</div>
							<div class="G_not_span" style="height: 85px"> <!-- đặt giá và heart -->
								<div>
									<img src="../image/img/1heart.png" alt="anh"><a href="#">Đặt giá</a>
								</div>
							</div>
							<div class="G_under_logo"> <!-- các thông số -->
								<div class="G_inside1">
									<a href="#">Dự án</a>
								</div>
								<div class="G_inside1">
									<p class="G_p2_1">$ 5.000.000đ</p>
								</div>
								<div class="G_inside1">
									<p><strong>5</strong> lượt đặt giá</p>
								</div>
								<div class="G_inside2">
									<p><strong>Hết hạn:</strong> 20/9/2020</p>
								</div>
							</div>
							<div class="G_document"> <!-- văn bản -->
								<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
							</div>
							<!-- Kỹ năng -->
							<div class="skill">
								<div class="skill1">Kỹ năng:</div>
								<div class="skill2">PHP</div>
								<div class="skill4">Plugin</div>
								<div class="skill5">Wordpress</div>
								<div class="skill6">WooCommerce</div>
								<div class="skill7">Code</div>
								<div class="skill3">Graphic Design</div>
								<div class="skill8"><span>+2</span></div>
							</div>
						</div>
					</div>
					<div class="G_dong1"> <!-- khung bên ngoài sp thứ nhất -->
						<div class="G_logo"> <!-- khung bên trong gồm tất cả gì có bên trong khung sp thứ nhất -->
							<div class="G_img"> <!-- logo -->
								<img src="../image/img/1logo1.png" alt="logo">
							</div>
							<div class="G_nd"> <!-- bên cạnh logo -->
								<div class="G_span">
									<span>Sửa code plugin theo đúng chuẩn wordpress</span>
								</div>
								<div class="G_name">
									Nguyễn Hồng Ánh
								</div>
								<div class="G_cs">
									<div class="G_dm">
										<div style="float: left;">
											<img src="../image/img/1capsach.png" alt="anh">
										</div>
										 	<div class="G_ha">Lập trình phần mềm</div>
									</div>
									<div>
										<div style="float: left;">
											<img src="../image/img/1ggmaps.png" alt="anh">
										</div>
										 	<div class="G_ha">Hồ Chí Minh</div>
									</div>
								</div>
							</div>
							<div class="G_not_span" style="height: 85px"> <!-- đặt giá và heart -->
								<div>
									<img src="../image/img/1heart.png" alt="anh"><a href="#">Đặt giá</a>
								</div>
							</div>
							<div class="G_under_logo"> <!-- các thông số -->
								<div class="G_inside1">
									<a href="#">Dự án</a>
								</div>
								<div class="G_inside1">
									<p class="G_p2_1">$ 5.000.000đ</p>
								</div>
								<div class="G_inside1">
									<p><strong>5</strong> lượt đặt giá</p>
								</div>
								<div class="G_inside2">
									<p><strong>Hết hạn:</strong> 20/9/2020</p>
								</div>
							</div>
							<div class="G_document"> <!-- văn bản -->
								<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
							</div>
							<!-- Kỹ năng -->
							<div class="skill">
								<div class="skill1">Kỹ năng:</div>
								<div class="skill2">PHP</div>
								<div class="skill4">Plugin</div>
								<div class="skill5">Wordpress</div>
								<div class="skill6">WooCommerce</div>
								<div class="skill7">Code</div>
								<div class="skill3">Graphic Design</div>
								<div class="skill8"><span>+2</span></div>
							</div>
						</div>
					</div>
					<div class="G_dong1"> <!-- khung bên ngoài sp thứ nhất -->
						<div class="G_logo"> <!-- khung bên trong gồm tất cả gì có bên trong khung sp thứ nhất -->
							<div class="G_img"> <!-- logo -->
								<img src="../image/img/1logo1.png" alt="logo">
							</div>
							<div class="G_nd"> <!-- bên cạnh logo -->
								<div class="G_span">
									<span>Sửa code plugin theo đúng chuẩn wordpress</span>
								</div>
								<div class="G_name">
									Nguyễn Hồng Ánh
								</div>
								<div class="G_cs">
									<div class="G_dm">
										<div style="float: left;">
											<img src="../image/img/1capsach.png" alt="anh">
										</div>
										 	<div class="G_ha">Lập trình phần mềm</div>
									</div>
									<div>
										<div style="float: left;">
											<img src="../image/img/1ggmaps.png" alt="anh">
										</div>
										 	<div class="G_ha">Hồ Chí Minh</div>
									</div>
								</div>
							</div>
							<div class="G_not_span" style="height: 85px"> <!-- đặt giá và heart -->
								<div>
									<img src="../image/img/1heart.png" alt="anh"><a href="#">Đặt giá</a>
								</div>
							</div>
							<div class="G_under_logo"> <!-- các thông số -->
								<div class="G_inside1">
									<a href="#">Dự án</a>
								</div>
								<div class="G_inside1">
									<p class="G_p2_1">$ 5.000.000đ</p>
								</div>
								<div class="G_inside1">
									<p><strong>5</strong> lượt đặt giá</p>
								</div>
								<div class="G_inside2">
									<p><strong>Hết hạn:</strong> 20/9/2020</p>
								</div>
							</div>
							<div class="G_document"> <!-- văn bản -->
								<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
							</div>
							<!-- Kỹ năng -->
							<div class="skill">
								<div class="skill1">Kỹ năng:</div>
								<div class="skill2">PHP</div>
								<div class="skill4">Plugin</div>
								<div class="skill5">Wordpress</div>
								<div class="skill6">WooCommerce</div>
								<div class="skill7">Code</div>
								<div class="skill3">Graphic Design</div>
								<div class="skill8"><span>+2</span></div>
							</div>
						</div>
					</div>
					<div class="G_dong1"> <!-- khung bên ngoài sp thứ nhất -->
						<div class="G_logo"> <!-- khung bên trong gồm tất cả gì có bên trong khung sp thứ nhất -->
							<div class="G_img"> <!-- logo -->
								<img src="../image/img/1logo1.png" alt="logo">
							</div>
							<div class="G_nd"> <!-- bên cạnh logo -->
								<div class="G_span">
									<span>Sửa code plugin theo đúng chuẩn wordpress</span>
								</div>
								<div class="G_name">
									Nguyễn Hồng Ánh
								</div>
								<div class="G_cs">
									<div class="G_dm">
										<div style="float: left;">
											<img src="../image/img/1capsach.png" alt="anh">
										</div>
										 	<div class="G_ha">Lập trình phần mềm</div>
									</div>
									<div>
										<div style="float: left;">
											<img src="../image/img/1ggmaps.png" alt="anh">
										</div>
										 	<div class="G_ha">Hồ Chí Minh</div>
									</div>
								</div>
							</div>
							<div class="G_not_span" style="height: 85px"> <!-- đặt giá và heart -->
								<div>
									<img src="../image/img/1heart.png" alt="anh"><a href="#">Đặt giá</a>
								</div>
							</div>
							<div class="G_under_logo"> <!-- các thông số -->
								<div class="G_inside1">
									<a href="#">Dự án</a>
								</div>
								<div class="G_inside1">
									<p class="G_p2_1">$ 5.000.000đ</p>
								</div>
								<div class="G_inside1">
									<p><strong>5</strong> lượt đặt giá</p>
								</div>
								<div class="G_inside2">
									<p><strong>Hết hạn:</strong> 20/9/2020</p>
								</div>
							</div>
							<div class="G_document"> <!-- văn bản -->
								<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
							</div>
							<!-- Kỹ năng -->
							<div class="skill">
								<div class="skill1">Kỹ năng:</div>
								<div class="skill2">PHP</div>
								<div class="skill4">Plugin</div>
								<div class="skill5">Wordpress</div>
								<div class="skill6">WooCommerce</div>
								<div class="skill7">Code</div>
								<div class="skill3">Graphic Design</div>
								<div class="skill8"><span>+2</span></div>
							</div>
						</div>
					</div>
					<div class="G_dong1"> <!-- khung bên ngoài sp thứ nhất -->
						<div class="G_logo"> <!-- khung bên trong gồm tất cả gì có bên trong khung sp thứ nhất -->
							<div class="G_img"> <!-- logo -->
								<img src="../image/img/1logo1.png" alt="logo">
							</div>
							<div class="G_nd"> <!-- bên cạnh logo -->
								<div class="G_span">
									<span>Sửa code plugin theo đúng chuẩn wordpress</span>
								</div>
								<div class="G_name">
									Nguyễn Hồng Ánh
								</div>
								<div class="G_cs">
									<div class="G_dm">
										<div style="float: left;">
											<img src="../image/img/1capsach.png" alt="anh">
										</div>
										 	<div class="G_ha">Lập trình phần mềm</div>
									</div>
									<div>
										<div style="float: left;">
											<img src="../image/img/1ggmaps.png" alt="anh">
										</div>
										 	<div class="G_ha">Hồ Chí Minh</div>
									</div>
								</div>
							</div>
							<div class="G_not_span" style="height: 85px"> <!-- đặt giá và heart -->
								<div>
									<img src="../image/img/1heart.png" alt="anh"><a href="#">Đặt giá</a>
								</div>
							</div>
							<div class="G_under_logo"> <!-- các thông số -->
								<div class="G_inside1">
									<a href="#">Dự án</a>
								</div>
								<div class="G_inside1">
									<p class="G_p2_1">$ 5.000.000đ</p>
								</div>
								<div class="G_inside1">
									<p><strong>5</strong> lượt đặt giá</p>
								</div>
								<div class="G_inside2">
									<p><strong>Hết hạn:</strong> 20/9/2020</p>
								</div>
							</div>
							<div class="G_document"> <!-- văn bản -->
								<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
							</div>
							<!-- Kỹ năng -->
							<div class="skill">
								<div class="skill1">Kỹ năng:</div>
								<div class="skill2">PHP</div>
								<div class="skill4">Plugin</div>
								<div class="skill5">Wordpress</div>
								<div class="skill6">WooCommerce</div>
								<div class="skill7">Code</div>
								<div class="skill3">Graphic Design</div>
								<div class="skill8"><span>+2</span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="G_xem_them">
					<a href="#">Xem thêm <img src="../image/img/1xemthem.png" alt=""></a>
				</div>

				<!-- MODAL (cái kính lúp bên tablet) -->
					<div class="container">
						<!-- Trigger the modal with a button -->
						<a class="G_a1" type="button" data-toggle="modal" data-target="#myModal" href="#"><img src="../image/img/1kinh-lup.png" alt=""></a>
						<!-- Modal -->
						<div class="modal fade" id="myModal" role="dialog">
						    <div class="modal-dialog">
						      <!-- Modal content-->
							    <div class="modal-content">
							        <div class="modal-header"> <!-- bên trên dấu gạch -->
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <p class="modal-title">Lọc việc làm freelancer</p>
							        </div>
							        <div class="modal-body"> <!-- giữa dấu gạch -->
							        	<div class="G_tieu_de1">Ngành nghề</div>
							        	<div class="G_o1"> <!-- bao trùm ô ngành nghề -->
							        		<div class="G_cot_trai1">
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Tất cả</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div  class="G_p">
							        					<p>IT & Lập trình</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Thiết kế</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Viết lách & Dịch thuật</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Marketing & Bán hàng</p>
							        				</div>
							        			</div>
							        		</div>
							        		<div class="G_cot_phai1">
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Kinh doanh, Nhập liệu & Hành chính</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div  class="G_p">
							        					<p>Kê toán, Thuế & Luật</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Kiến trúc & Xây dựng</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Video</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Lĩnh vực khác</p>
							        				</div>
							        			</div>
							        		</div>
							        	</div>
							        	<div class="G_tieu_de2">Địa điểm</div>
							        	<div class="G_o2"> <!-- bao trùm ô địa điểm -->
							        		<div class="G_cot_trai1">
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Tất cả</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div  class="G_p">
							        					<p>Hà Nội</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Hồ Chí Minh</p>
							        				</div>
							        			</div>
							        		</div>
							        		<div class="G_cot_phai1">
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Đà Nẵng</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div  class="G_p">
							        					<p>Bình Dương</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Cần Thơ</p>
							        				</div>
							        			</div>
							        		</div>
							        	</div>
							        	<div class="G_tieu_de2">Địa điểm</div>
							        	<div class="G_o3"> <!-- bao trùm ô Kỹ năng -->
							        		<div class="G_cot_trai1">
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Tất cả</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div  class="G_p">
							        					<p>Cắt HTML/CSS</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>PHP</p>
							        				</div>
							        			</div>
							        		</div>
							        		<div class="G_cot_phai1">
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Javascript</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div  class="G_p">
							        					<p>Adobe Photoshop</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Adobe Illustrator</p>
							        				</div>
							        			</div>
							        		</div>
							        	</div>
							        </div>
							        <div class="modal-footer"> <!-- bên dưới dấu gạch -->
							        	<div class="G_a">
							        		<a type="button" href="#">Áp dụng</a>
							        	</div>
							    	</div>
							    </div>
						    </div>
						</div>
					</div>
			</div>
			<!-- Cột bên phải, mấy cái ô tích tích và quảng cáo -->
			<div class="G_column2">
				<!-- thanh màu xanh bên phải -->
				<div class="G_menu2">
					<div tabindex="4" class="G_cot_giua">
						<a href="#">Lọc việc làm Freelancer</a>
					</div>
				</div>
				<div class="G_checked">  <!-- Các ô checked -->
					<div class="G_in_checked"> <!-- viền bao bọc tất cả các ô -->
						<div class="G_wow"> <!-- Ngành nghề -->
							<div class="G_title">
								Ngành nghề
							</div>
							<div class="G_checkbox">
							 	<div><input type="checkbox" name="" id=""></div>
							 	<div><input type="checkbox" name="" id=""></div>
							 	<div><input type="checkbox" name="" id=""></div>
							 	<div><input type="checkbox" name="" id=""></div>
							 	<div><input type="checkbox" name="" id=""></div>
							 	<div><input type="checkbox" name="" id=""></div>
							 	<div><input type="checkbox" name="" id=""></div>
							 	<div><input type="checkbox" name="" id=""></div>
							 	<div><input type="checkbox" name="" id=""></div>
							 	<div><input type="checkbox" name="" id=""></div>
							</div>
							<div class="G_noidung">
								<div>Tất cả</div>
								<div>IT & Lập trình</div>
								<div>Thiết kế</div>
								<div>Viết lách & Dịch thuật</div>
								<div>Marketing & Bán hàng</div>
								<div>Kinh doanh, Nhập liệu & Hành chính</div>
								<div>Kế toán, Thuế & Luật</div>
								<div>Kiến trúc & Xây dựng</div>
								<div>Video</div>
								<div>Lĩnh vực khác</div>
							</div>
						</div>
						<div class="G_wow"> <!-- Ngành nghề -->
							<div class="G_title">
								Thành phố
							</div>
							<div class="G_checkbox">
							 	<div><input type="checkbox" name="" id=""></div>
							 	<div><input type="checkbox" name="" id=""></div>
							 	<div><input type="checkbox" name="" id=""></div>
							 	<div><input type="checkbox" name="" id=""></div>
							 	<div><input type="checkbox" name="" id=""></div>
							 	<div><input type="checkbox" name="" id=""></div>
							</div>
							<div class="G_noidung">
								<div>Tất cả</div>
								<div>Hà Nội</div>
								<div>Hồ Chí Minh</div>
								<div>Đà Nẵng</div>
								<div>Bình Dương</div>
								<div>Cần Thơ</div>
							</div>
						</div>
						<div class="G_wow"> <!-- Ngành nghề -->
							<div class="G_title">
								Kỹ năng
							</div>
							<div class="G_checkbox">
							 	<div><input type="checkbox" name="" id=""></div>
							 	<div><input type="checkbox" name="" id=""></div>
							 	<div><input type="checkbox" name="" id=""></div>
							 	<div><input type="checkbox" name="" id=""></div>
							 	<div><input type="checkbox" name="" id=""></div>
							 	<div><input type="checkbox" name="" id=""></div>
							</div>
							<div class="G_noidung">
								<div>Tất cả</div>
								<div>Cắt HTML/CSS</div>
								<div>PHP</div>
								<div>VJavascript</div>
								<div>Adobe Photoshop</div>
								<div>Adobe Illustrator</div>
							</div>
						</div>
					</div>
					<style>
						
					</style>
					<div class="G_img0">
						<img src="../image/img/1advertisement.png" alt="">
					</div>
					<div class="G_img1">
						<img src="../image/img/1logotl.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<script> 
    $('.hello').select2({
    	width:"25.22%"
    });
</script>	
</body>
</html>