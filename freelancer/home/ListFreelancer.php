<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Danh sách Freelancer</title>
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
		<div class="G-background4">
			<div class="G-header"> <!-- 3 dòng đầu (trang chủ, tìm kiếm, tìm nhiều nhất) -->
				<div class="G-line1">
					<a href="#">Trang chủ / </a><a href="#">Việc Freelancer </a> <a class="G-a" href="#"> / Việc làm Freelancer theo dự án</a>
				</div>
				<div class="G-line2">
					<div class="G-search-bar">
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
				<div class="G-line3">
					<div class="column0">Tìm nhiều nhất</div>
					<div class="column"><a href="#">Javascript</a></div>
					<div class="column"><a href="#">PHP</a></div>
					<div class="column"><a href="#">Design</a></div>
					<div class="column"><a href="#">Video</a></div>
					<div class="column1"><a href="#">Biên tập viên</a></div>
				</div>
			</div>
			<!-- Phần giữa trang gồm 2 cột lớn đó -->
			<div class="G-midder"> 
				<div class="G-column1"> <!-- Cột bên trái -->
					<div class="G-menu1">	<!-- menu bên trên màu xanh -->
						<div class="G-list">
							Danh sách Freelancer
						</div>
						<div class="G-new">
							<ul>
								<li>
									<a href="#">Mới nhất<i class="fas fa-sort-down"></i></a>
									<ul>
										<li><a href="#">Xuất sắc</a></li>
										<li><a href="#">Mới nhất</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
					<div class="G-content1"> <!-- background bao bọc review thí sinh -->
						<?php
							for ($i=0; $i < 10 ; $i++) { 
								echo '
								<div class="G-product"> <!-- từng thí sinh 1 -->
									<div class="G-img">
										<img src="../image/img/1avt2.png" alt="">
									</div>
									<div class="G-line1">
										<div class="G-name">
											<a href="DetailFreelancer.php"><p>Nguyễn Văn Bảo</p></a>
										</div>
										<div class="G-stars">
											<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
										</div>
										<div class="G-hello">
										<img src="../image/img/1heart.png" alt="">
										</div>
									</div>
									<div class="G-line2">
										<div class="G-job">
											<p>Chuyên viên lập trình</p>
										</div>
										<div class="G-address">
											<img src="../image/img/1ggmaps.png"><p>Hồ Chí Minh</p>
										</div>
									</div>
									<div class="G-line3">
										<div class="G-element1"><p>PHP</p></div>
										<div class="G-element2"><p>Java</p></div>
										<div class="G-element3"><p>.Net</p></div>
										<div class="G-element4"><p>HTML</p></div>
										<div class="G-element5"><p>WOOCOMMERCE</p></div>
										<div class="G-element6"><p>NODE.JS</p></div>
										<div class="G-element7"><p>ASP.NET</p></div>
										<div class="G-element8"><p>+3</p></div>
									</div>
								</div>
									
								';
							}
						?>
					
					</div>
					<div class="G-see-more">
						<a href="#">Xem thêm <img src="../image/img/1xemthem.png" alt=""></a>
					</div>
					<div class="G-bi-pc"> <!-- một bức ảnh đẹp ở cuối --> 
						<img src="../image/img/1BI-PC-danhsach.png" alt="">
					</div>
					<div class="G-bi-tl">
						<img src="../image/img/1BI-TL-danhsach.png" alt="">
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
				<div class="G-column2"> <!-- cột bên phải -->
					<div class="G-menu2">
						Lọc tìm kiếm Freelancer
					</div>
					<div class="G-content2"> <!-- background bao bọc review checked -->
						<div class="G-dong1">
							<span>Ngành nghề</span><img src="../image/img/1gach_vang.png" alt="">
						</div>
						<div class="G-half1"> <!-- tách 5 check ở ngành nghề ra 2 div để tablet với mobie dễ chỉnh -->
							<div class="G-bao-trum">
								<div class="G-check1">
									<input type="checkbox" name="">
								</div>
								<div class="G-noi-dung">
									Tất cả
								</div>
							</div>
							<div class="G-bao-trum">
								<div class="G-check1">
									<input type="checkbox" name="">
								</div>
								<div class="G-noi-dung">
									IT & Lập trình 	
								</div>
							</div>
							<div class="G-bao-trum">
								<div class="G-check1">
									<input type="checkbox" name="">
								</div>
								<div class="G-noi-dung">
									Thiết kế
								</div>
							</div>
							<div class="G-bao-trum">
								<div class="G-check1">
									<input type="checkbox" name="">
								</div>
								<div class="G-noi-dung">
									Viết lách & Dịch thuật
								</div>
							</div>
							<div class="G-bao-trum">
								<div class="G-check1">
									<input type="checkbox" name="">
								</div>
								<div class="G-noi-dung">
									Marketing & Bán hàng
								</div>
							</div>
						</div>
						<div class="G-half1"> <!-- tách 5 check ở ngành nghề ra 2 div để tablet với mobie dễ chỉnh -->
							<div class="G-bao-trum">
								<div class="G-check1">
									<input type="checkbox" name="">
								</div>
								<div class="G-noi-dung">
									Kinh doanh, Nhập liệu & Hành chính
								</div>
							</div>
							<div class="G-bao-trum">
								<div class="G-check1">
									<input type="checkbox" name="">
								</div>
								<div class="G-noi-dung">
									Kế toán, Thuế & Luật
								</div>
							</div>
							<div class="G-bao-trum">
								<div class="G-check1">
									<input type="checkbox" name="">
								</div>
								<div class="G-noi-dung">
									Kiến trúc & Xây dựng
								</div>
							</div>
							<div class="G-bao-trum">
								<div class="G-check1">
									<input type="checkbox" name="">
								</div>
								<div class="G-noi-dung">
									Video
								</div>
							</div>
							<div class="G-bao-trum">
								<div class="G-check1">
									<input type="checkbox" name="">
								</div>
								<div class="G-noi-dung">
									Lĩnh vực khác
								</div>
							</div>
						</div>
						<div class="G-dong1">
							<span>Thành phố</span><img src="../image/img/1gach_vang.png" alt="">
						</div>
						<div class="G-half1"> <!-- tách 5 check ở ngành nghề ra 2 div để tablet với mobie dễ chỉnh -->
							<div class="G-bao-trum">
								<div class="G-check1">
									<input type="checkbox" name="">
								</div>
								<div class="G-noi-dung">
									Tất cả
								</div>
							</div>
							<div class="G-bao-trum">
								<div class="G-check1">
									<input type="checkbox" name="">
								</div>
								<div class="G-noi-dung">
									Hà Nội
								</div>
							</div>
							<div class="G-bao-trum">
								<div class="G-check1">
									<input type="checkbox" name="">
								</div>
								<div class="G-noi-dung">
									Hồ Chí Minh
								</div>
							</div>
						</div>
						<div class="G-half1"> <!-- tách 5 check ở ngành nghề ra 2 div để tablet với mobie dễ chỉnh -->
							<div class="G-bao-trum">
								<div class="G-check1">
									<input type="checkbox" name="">
								</div>
								<div class="G-noi-dung">
									Đà Nẵng
								</div>
							</div>
							<div class="G-bao-trum">
								<div class="G-check1">
									<input type="checkbox" name="">
								</div>
								<div class="G-noi-dung">
									Bình Dương
								</div>
							</div>
							<div class="G-bao-trum">
								<div class="G-check1">
									<input type="checkbox" name="">
								</div>
								<div class="G-noi-dung">
									Cần Thơ
								</div>
							</div>
						</div>
						<div class="G-dong1">
							<span>Kỹ năng</span><img src="../image/img/1gach_vang.png" alt="">
						</div>
						<div class="G-half1"> <!-- tách 5 check ở ngành nghề ra 2 div để tablet với mobie dễ chỉnh -->
							<div class="G-bao-trum">
								<div class="G-check1">
									<input type="checkbox" name="">
								</div>
								<div class="G-noi-dung">
									Tất cả
								</div>
							</div>
							<div class="G-bao-trum">
								<div class="G-check1">
									<input type="checkbox" name="">
								</div>
								<div class="G-noi-dung">
									Cắt HTML/CSS
								</div>
							</div>
							<div class="G-bao-trum">
								<div class="G-check1">
									<input type="checkbox" name="">
								</div>
								<div class="G-noi-dung">
									PHP
								</div>
							</div>
						</div>
						<div class="G-half2"> <!-- tách 5 check ở ngành nghề ra 2 div để tablet với mobie dễ chỉnh -->
							<div class="G-bao-trum">
								<div class="G-check1">
									<input type="checkbox" name="">
								</div>
								<div class="G-noi-dung">
									Javascript
								</div>
							</div>
							<div class="G-bao-trum">
								<div class="G-check1">
									<input type="checkbox" name="">
								</div>
								<div class="G-noi-dung">
									Adobe Photoshop
								</div>
							</div>
							<div class="G-bao-trum">
								<div class="G-check1">
									<input type="checkbox" name="">
								</div>
								<div class="G-noi-dung">
									Adobe Illustrator
								</div>
							</div>
						</div>
					</div>
					<div class="G-bi-pc"> <!-- một bức ảnh đẹp ở cuối --> 
						<img src="../image/img/1BI-PC-danhsach.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
<script> 
    $('.hello').select2({
    	width:"25.22%"
    });
	$('#tinh-thanh-tablet').select2({
        placeholder: "Chọn tỉnh thành",
        tags : true
    });
    $('#nganh-nghe-tablet').select2({
        placeholder: "Chọn ngành nghề",
        tags : true
    });
</script>
</body>
</html>