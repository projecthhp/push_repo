<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hoàn thiện hồ sơ</title>
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
						<div onclick="click1()" id="two" class="G-div-daddy two ">
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
					<div id="G-click51" class="G-small-div-four G-small-div-two-hover">
						<div class="G-img-two">
							<img id="G-click52" src="../image/img/1FiveHover7.png" alt="">
							<img id="G-click53" class="img-two" src="../image/img/1Five7.png" alt="">
						</div>	
						<div class="G-content-two">
							<a id="G-click54" class="G-change-two" href="ChangePassword.php">Đổi mật khẩu</a>
						</div>
					</div>
					<div onclick="click6()" id="G-click61" class="G-small-div-four">
						<div class="G-img-two">
							<img id="G-click62" src="../image/img/1Six7.png" alt="">
							<img id="G-click63" class="img-two" src="../image/img/1FiveHover7.png" alt="">
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
			<div class="G-right-body4"> <!-- phần to to bên phải của dự án đang thực hiện -->
				<div class="G-cover-right"> <!-- phần bao gồm chữ và form đổi mk -->
                    <div class="G-change-pass"> <!-- phần chữ dổi mật khẩu -->
                        <div class="G-img-vang">
                            <img src="../image/img/1KeVang7.png" alt="">
                        </div>
                        <div class="G-content-change">Đổi mật khẩu</div>
                    </div>
                    <div class="G-form">
                        <div class="G-div1">
                            <div class="G-mk">
                                <span>*</span>Mật khẩu hiện tại
                            </div>
                            <div class="G-input">
                                <input id="hello" type="password">
                                <div onclick="see()" id="see-pass" class="G-mu"><i class="fas fa-eye-slash"></i></div>
                                <div onclick="cantSee()" id="cant-see" class="G-ko-mu"><i class="fas fa-eye"></i></div>
                            </div>
                        </div>
                        <div class="G-div1">
                            <div class="G-mk">
                                <span>*</span>Mật khẩu hiện tại
                            </div>
                            <div class="G-input">
                                <input id="hello2" type="password">
                                <div onclick="see2()" id="see-pass2" class="G-mu"><i class="fas fa-eye-slash"></i></div>
                                <div onclick="cantSee2()" id="cant-see2" class="G-ko-mu"><i class="fas fa-eye"></i></div>
                            </div>
                        </div>
                        <div class="G-div1">
                            <div class="G-mk">
                                <span>*</span>Mật khẩu hiện tại
                            </div>
                            <div class="G-input">
                                <input id="hello3" type="password">
                                <div onclick="see3()" id="see-pass3" class="G-mu"><i class="fas fa-eye-slash"></i></div>
                                <div onclick="cantSee3()" id="cant-see3" class="G-ko-mu"><i class="fas fa-eye"></i></div>
                            </div>
                        </div>
                        <div class="G-button">
                            <div class="G-accept">
                                <button>Đổi mật khẩu</button>
                            </div>
                            <div class="G-destroy">
                                <button>Hủy</button>
                            </div>
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
                document.getElementById("G-change-one").classList.remove("G-small-div-two-hover");
                document.getElementById("G-display").classList.remove("G-display");
                document.getElementById("G-display").classList.remove("G-display");
                document.getElementById("G-block").classList.remove("img-two-hover");
                document.getElementById("G-change-two").classList.remove("G-change-two");
                document.getElementById("G-click31").classList.remove("G-small-div-two-hover");
                document.getElementById("G-click32").classList.remove("G-display");
                document.getElementById("G-click33").classList.remove("img-two-hover");
                document.getElementById("G-click34").classList.remove("G-change-two");
                document.getElementById('G-click41').classList.remove('G-small-div-two-hover');
        		document.getElementById('G-click44').classList.remove('G-change-two');
        		document.getElementById('G-click51').classList.remove('G-small-div-two-hover');
        		document.getElementById('G-click52').classList.add('none');
        		document.getElementById('G-click53').classList.add('img-two-hover');
        		document.getElementById('G-click54').classList.remove('G-change-two');
        		document.getElementById('G-click61').classList.remove('G-small-div-two-hover');
        		document.getElementById('G-click64').classList.remove('G-change-two');
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
        function see3() {
            document.getElementById("see-pass3").classList.add("G-see-pass-hover");
            document.getElementById("cant-see3").classList.add("G-cant-see-hover");
            document.getElementById("hello3").type = 'text';
        }
        function cantSee3(){
            document.getElementById("see-pass3").classList.remove("G-see-pass-hover");
            document.getElementById("cant-see3").classList.remove("G-cant-see-hover");
            document.getElementById("hello3").type = 'password';
        }
	</script>
</body>
</html>