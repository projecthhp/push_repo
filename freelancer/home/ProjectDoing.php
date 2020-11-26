<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dự án đang thực hiện</title>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="../css/GiangCSS/All.css">
</head>
<body>
	<?php require_once 'HeaderPart2.php'; ?> 
	<div class="G-background7">
		<div class="G-big-body">
			<div class="G-left-body">
				<div class="G-BI">
					<div class="G-backimg">
						<img src="../image/img/1Bi7small.png">
					</div>
					<div class="G-avt">
						<img src="../image/img/1AVT7.png" alt="">
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
						<div onclick="click1()" id="two" class="G-div-daddy two">
							<div class="G-img-one">
								<img id="three"  src="../image/img/1One7.png" alt="">
								<img id="four" class="G-four-hover" src="../image/img/1OneHover7.png" alt="">
							</div>
							<div id="five" class="G-content-one2">
								Quản lý chung
							</div>
							<div class="G-icon-one"> 
								<i id="six" class="fas fa-caret-right"></i>
								<i id="seven" class="fas fa-sort-down two"></i>
							</div>
						</div>
						<div id="one" class="G-div-baby two">
							<div class="G-line1">
								<a onclick="wow()" class="before-click" id="wow" href="CompleteProfile.php">Hoàn thiện hồ sơ</a>
							</div>
							<div class="G-line2">
								<a onclick="wow2()" class="before-click" id="wow2" href="#">Tất cả việc làm</a>
							</div>
						</div>
					</div>
					<div id="G-change-one" class="G-small-div-two two">
						<div class="G-img-two">
							<img id="G-display" src="../image/img/1TwoHover7.png" alt="">
							<img id="G-block" class="img-two two" src="../image/img/1Two7.png" alt="">
						</div>	
						<div class="G-content-two two">
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
							<a id="G-click64" href="#">Đăng xuất</a>
						</div>
					</div>
					<div class="G-small-div-three"></div>
					<div class="G-small-div-four"></div>
					<div class="G-small-div-five"></div>
					<div class="G-small-div-six"></div>
				</div>
			</div>
			<div class="G-right-body2"> <!-- phần to to bên phải của dự án đang thực hiện -->
				<div class="G-inside-bd">
                    <div class="G-content">
                        <div class="G-ke-vang">
                            <img src="../image/img/1KeVang7.png" alt="">
                        </div>
                        <div class="G-under-kv">
                            Dự án đang thực hiện
                        </div>
                    </div>
                    <div class="G-table">
                        <table>
                            <tr class="G-hi">
                                <th class="G-column1">Tên dự án</th>
                                <th class="G-column2">Ngân sách</th>
                                <th class="G-column3">Ngày hết hạn</th>
                                <th class="G-column4">Trạng thái</th>
                                <th class="G-column5">Đánh giá</th>
                            </tr>
                            <tr class="G-ha">
                                <td class="G-column6">
                                    <div class="G-wow">
                                        Thiết kế logo cho công ty
                                    </div>
                                    <div class="G-yeah">
                                        <a href="#">(Xem chi tiết)</a>
                                    </div>
                                </td>
                                <td class="G-column7">300.000đ</td>
                                <td class="G-column8">Hết hạn</td>
                                <td class="G-column9">
                                    <div class="G-menu">
                                        <ul>
                                            <li class="G-ho">
                                                <div id="demo" class="demo">Không hoàn thành</div>
                                                <div><i class="fas fa-sort-down"></i></div>
                                                <ul class="G-sub-menu">
                                                    <li onclick="document.getElementById('demo').innerHTML = 'Hoàn thành'">Hoàn thành</li>
                                                    <li onclick="document.getElementById('demo').innerHTML = 'Không hoàn thành'">Không hoàn thành</li>
                                                    <li onclick="document.getElementById('demo').innerHTML = 'Đang thực hiện'">Đang thực hiện</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                                <td class="G-column10">
                                   <div class="G-stars">
                                       <i onclick="document.getElementById('demo2').innerHTML = '(Kém)'" class="fas fa-star"></i>
                                       <i onclick="document.getElementById('demo2').innerHTML = '(Trung bình)'" class="fas fa-star"></i>
                                       <i onclick="document.getElementById('demo2').innerHTML = '(Khá)'" class="fas fa-star"></i>
                                       <i onclick="document.getElementById('demo2').innerHTML = '(Tốt)'" class="fas fa-star"></i>
                                       <i onclick="document.getElementById('demo2').innerHTML = '(Xuất sắc)'" class="fas fa-star"></i>
                                   </div>
                                   <div id="demo2" class="G-lo">
                                      (Đánh giá)
                                   </div>
                                </td>
                            </tr>
                            <?php 
                                for ($i=0; $i < 8 ; $i++) { ?>
                                    <tr class="G-ha">
                                        <td class="G-column6">
                                            <div class="G-wow">
                                                Thiết kế logo cho công ty
                                            </div>
                                            <div class="G-yeah">
                                                <a href="#">(Xem chi tiết)</a>
                                            </div>
                                        </td>
                                        <td class="G-column7">300.000đ</td>
                                        <td class="G-column8">Hết hạn</td>
                                        <td class="G-column9">
                                            <div class="G-menu">
                                                <ul>
                                                    <li class="G-ho">
                                                        <div id="demo" class="demo">Không hoàn thành</div>
                                                        <div><i class="fas fa-sort-down"></i></div>
                                                        <ul class="G-sub-menu">
                                                            <li onclick="document.getElementById('demo').innerHTML = 'Hoàn thành'">Hoàn thành</li>
                                                            <li onclick="document.getElementById('demo').innerHTML = 'Không hoàn thành'">Không hoàn thành</li>
                                                            <li onclick="document.getElementById('demo').innerHTML = 'Đang thực hiện'">Đang thực hiện</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td class="G-column10">
                                           <div class="G-stars">
                                               <i onclick="document.getElementById('demo2').innerHTML = '(Kém)'" class="fas fa-star"></i>
                                               <i onclick="document.getElementById('demo2').innerHTML = '(Trung bình)'" class="fas fa-star"></i>
                                               <i onclick="document.getElementById('demo2').innerHTML = '(Khá)'" class="fas fa-star"></i>
                                               <i onclick="document.getElementById('demo2').innerHTML = '(Tốt)'" class="fas fa-star"></i>
                                               <i onclick="document.getElementById('demo2').innerHTML = '(Xuất sắc)'" class="fas fa-star"></i>
                                           </div>
                                           <div id="demo2" class="G-lo">
                                              (Đánh giá)
                                           </div>
                                        </td>
                                    </tr>
                            <?php  } ?>
                        </table>
                    </div>
                    <div class="G-tablet"> <!-- của riêng tablet và mobie -->
                        <div class="G-first-div"> <!-- bao gồm 2 dòng đầu k tính sao và hoàn thành-->
                            <div class="G-div1">
                                <div class="G-content1">Thiết kế logo cho công ty</div>
                                <div class="G-content2"><a href="#">(Xem chi tiết)</a></div>
                            </div>
                            <div class="G-div2">
                                <div class="G-img-money"><img src="../image/img/1Money.png" alt=""></div>
                                <div class="G-content3">3.000.000đ</div>
                                <div class="G-content4">Ngày hết hạn:</div>
                                <div class="G-content5">Đã hết hạn</div>
                            </div>
                            <div class="G-div3">
                                <div class="G-display">
                                    <div class="G-stars">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    </div>
                                    <div class="G-menu-tl">
                                        <ul>
                                            <li class="G-ho">
                                                <div class="G-flex">
                                                    <div class="demo">Không hoàn thành </div>
                                                    <div class="G-i"><i class="fas fa-sort-down"></i></div>
                                                </div>
                                                <ul class="G-sub-menu">
                                                    <li>Hoàn thành</li>
                                                    <li>Không hoàn thành</li>
                                                    <li>Đang thực hiện</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="G-second-div">
                            <div class="G-menu">
                                <ul>
                                    <li class="G-ho">
                                        <div class="G-flex">
                                            <div class="demo">Không hoàn thành </div>
                                            <div class="G-i"><i class="fas fa-sort-down"></i></div>
                                        </div>
                                        <ul class="G-sub-menu">
                                            <li>Hoàn thành</li>
                                            <li>Không hoàn thành</li>
                                            <li>Đang thực hiện</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="G-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <?php for ($i=0; $i < 8 ; $i++) { ?>
                        <div class="G-tablet"> <!-- của riêng tablet và mobie -->
                            <div class="G-first-div"> <!-- bao gồm 2 dòng đầu k tính sao và hoàn thành-->
                            <div class="G-div1">
                                <div class="G-content1">Thiết kế logo cho công ty</div>
                                <div class="G-content2"><a href="#">(Xem chi tiết)</a></div>
                            </div>
                            <div class="G-div2">
                                <div class="G-img-money"><img src="../image/img/1Money.png" alt=""></div>
                                <div class="G-content3">3.000.000đ</div>
                                <div class="G-content4">Ngày hết hạn:</div>
                                <div class="G-content5">Đã hết hạn</div>
                            </div>
                            <div class="G-div3">
                                <div class="G-display">
                                    <div class="G-stars">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    </div>
                                    <div class="G-menu-tl">
                                        <ul>
                                            <li class="G-ho">
                                                <div class="G-flex">
                                                    <div class="demo">Không hoàn thành </div>
                                                    <div class="G-i"><i class="fas fa-sort-down"></i></div>
                                                </div>
                                                <ul class="G-sub-menu">
                                                    <li>Hoàn thành</li>
                                                    <li>Không hoàn thành</li>
                                                    <li>Đang thực hiện</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="G-second-div">
                            <div class="G-menu">
                                <ul>
                                    <li class="G-ho">
                                        <div class="G-flex">
                                            <div class="demo">Không hoàn thành </div>
                                            <div class="G-i"><i class="fas fa-sort-down"></i></div>
                                        </div>
                                        <ul class="G-sub-menu">
                                            <li>Hoàn thành</li>
                                            <li>Không hoàn thành</li>
                                            <li>Đang thực hiện</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="G-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="G-more">
                        <div class="G-view">
                            <a href="#">Xem thêm</a>
                        </div>
                        <div class="G-icon">
                            <i class="fas fa-angle-double-down"></i>
                        </div>
                    </div>
                </div>
			</div>
		</div>
		<!-- <?php require_once 'inc_footer.php'; ?> -->
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
	<script>
		function click1() {
                document.getElementById("one").classList.add("G-div-baby-two-hover");
                document.getElementById("two").classList.add("G-div-daddy-two-hover");
                document.getElementById("three").classList.add("G-three-hover");
                document.getElementById("four").classList.add("G-four-hover-hover");
                document.getElementById("five").classList.add("G-content-one2-hover");
                document.getElementById("six").classList.add("six-two");
                document.getElementById("seven").classList.add("seven");
                document.getElementById("G-change-one").classList.remove("two");
                document.getElementById("G-display").classList.add("none");
                document.getElementById("G-block").classList.add("img-two-hover");
                document.getElementById("G-change-two").classList.add("G-change-two");
                document.getElementById("G-click31").classList.remove("G-small-div-two-hover");
                document.getElementById("G-click32").classList.remove("G-display");
                document.getElementById("G-click33").classList.remove("img-two-hover");
                document.getElementById("G-click34").classList.remove("G-change-two");
                document.getElementById('G-click41').classList.remove('G-small-div-two-hover');
        		document.getElementById('G-click44').classList.remove('G-change-two');
        		document.getElementById('G-click51').classList.remove('G-small-div-two-hover');
        		document.getElementById('G-click52').classList.remove('G-display');
        		document.getElementById('G-click53').classList.remove('img-two-hover');
        		document.getElementById('G-click54').classList.remove('G-change-two');
        		document.getElementById('G-click61').classList.remove('G-small-div-two-hover');
        		document.getElementById('G-click64').classList.remove('G-change-two');
        		// document.getElementById('wow').classList.add('wow-hover');
        		document.getElementById('wow2').classList.remove('wow-hover');
            }
        function wow(){
        	document.getElementById('wow').classList.add('wow-hover');
        	document.getElementById('wow2').classList.remove('wow-hover');
        }
        function wow2(){
        	document.getElementById('wow2').classList.add('wow-hover');
        	document.getElementById('wow').classList.remove('wow-hover');
        }
        function click2(){
        	document.getElementById('G-change-one').classList.add('G-small-div-two-hover');
        	document.getElementById('G-display').classList.add('G-display');
        	document.getElementById('G-block').classList.add('img-two-hover');
        	document.getElementById('G-change-two').classList.add('G-change-two');
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
	</script>
</body>
</html>