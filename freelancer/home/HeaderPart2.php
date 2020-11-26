<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
	</head>
	<body>
	<div id="GMenuTl" class="G-left-body-rezo">
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
						<div onclick="GOpen()" class="G-div-daddy">
							<div class="G-img-one">
								<img  src="../image/img/1One7.png" alt="">
								<!-- <img id="four" class="G-four-hover" src="../image/img/1OneHover7.png" alt=""> -->
							</div>
							<div class="G-content-one">
								Quản lý chung
							</div>
							<div class="G-icon-one">
								<i class="fas fa-caret-right"></i>
								<i class="fas fa-sort-down"></i>
							</div>
						</div>
						<div id="open-menu" class="G-div-baby">
							<div class="G-line1">
								<a class="before-click" href="CompleteProfile.php">Hoàn thiện hồ sơ</a>
							</div>
							<div class="G-line2">
								<a class="before-click" href="#">Tất cả việc làm</a>
							</div>
						</div>
					</div>
					<div class="G-small-div-two">
						<div class="G-img-two">
							<img src="../image/img/1Two7.png" alt="">
							<img class="img-two" src="../image/img/1TwoHover7.png" alt="">
						</div>	
						<div class="G-content-two">
							<a href="ProjectDoing.php">Dự án đang thực hiện</a>
						</div>
					</div>
					<div class="G-small-div-three">
						<div class="G-img-two">
							<img src="../image/img/1Three7.png" alt="">
							<img class="img-two" src="../image/img/1ThreeHover7.png" alt="">
						</div>	
						<div class="G-content-two">
							<a href="ProjectSaved.php">Dự án đã lưu</a>
						</div>
					</div>
					<div class="G-small-div-four">
						<div class="G-img-two">
							<img src="../image/img/1Four7.png" alt="">
							<!-- <img id="G-click33" class="img-two" src="../image/img/1ThreeHover7.png" alt=""> -->
						</div>	
						<div class="G-content-two">
							<a href="#">Kinh nghiệm Freelancer</a>
						</div>
					</div>
					<div class="G-small-div-four">
						<div class="G-img-two">
							<img src="../image/img/1Five7.png" alt="">
							<img class="img-two" src="../image/img/1FiveHover7.png" alt="">
						</div>	
						<div class="G-content-two">
							<a href="ChangePassword.php">Đổi mật khẩu</a>
						</div>
					</div>
					<div class="G-small-div-four">
						<div class="G-img-two">
							<img src="../image/img/1Six7.png" alt="">
							<!-- <img id="G-click63" class="img-two" src="../image/img/1FiveHover7.png" alt=""> -->
						</div>	
						<div class="G-content-two">
							<a href="#">Đăng xuất</a>
						</div>
					</div>
					</div>
		<div onclick="GMenuTablet()" id="GMenuTl3" class="G-img-close">
			<img src="../image/img/1Close.png" alt="">
		</div>
	</div>
	<div id="GMenuTl2" class="G-abc"> <!-- Phần bao của header và body -->
		<div id="GMenuTl4" class="G-darkness">
			
		</div>
		<div class="G-header"> <!-- chia 3 div lớn : return, menu and avt -->
			<div class="G-cover-header">
				<div class="G-return">
					<div class="G-img-rt">
						<img src="../image/img/1ReturnHeader.png" alt="">
					</div>
					<div class="G-img-bell2">
						<img src="../image/img/1BellHeader2.png" alt="">
					</div>
					<div class="G-link-rt">
						<a href="">Quay lại Timviec365.com</a>
					</div>
				</div>
				<div class="G-menu">
					<div class="G-img-logo">
						<a href="index.php"><img src="../image/img/1LogoHeader.png" alt=""></a>
					</div>
					<div class="G-content">
						<a href="#">Việc Freelancer</a>
					</div>
					<div class="G-content">
						<a href="#">Danh sách Freelancer</a>
					</div>
					<div class="G-content">
						<a href="#">Kinh nghiệm</a>
					</div>
					<div class="G-content">
						<a href="#">Hướng dẫn</a>
					</div>
					<div class="G-button">
						<a href="#">Đăng dự án</a>
					</div>
					<div class="G-img-bell">
						<img src="../image/img/1BellHeader1.png" alt="">
					</div>
				</div>
				<div class="G-avt">
					<div class="G-img-avt">
						<img src="../image/img/1AvtHeader.png">
					</div>
					<div class="G-img-menu">
						<button onclick="GMenuTl()"><img src="../image/img/1MenuHeader.png" alt=""></button>
					</div>
				</div>
			</div>
		</div>
	<!-- thẻ div đóng của div class="abc" ở phần cuỗi của body -->
<style>
	*{
		margin: 0;
		padding: 0;
		font-family: Roboto-Regular;
	}
	@font-face {
		font-family: Roboto-Regular;
		src: url('../fonts/Roboto-Regular.ttf');
	}
	@font-face {
		font-family: Roboto-Medium;
		src: url('../fonts/Roboto-Medium.ttf');
	}
	@font-face {
		font-family: Roboto-Bold;
		src: url('../fonts/Roboto-Bold.ttf');
	}
	header{
		box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.05);
		
	}
	/*------------------menu pc-----------------------*/
	.G-header{          /* chỉnh */
		width: 100%;
		margin-bottom: 40px;
	    background: #FFFFFF;
	    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.05);
		float:left;
	}
	.G-header .G-cover-header{
		display: flex;
		width: 87.6%;
		margin: auto;
		padding-top: 20px;
		padding-bottom: 22px;
	}
	.G-header .G-return{
		display: flex;
		width: 36%;
	}
	.G-header .G-return .G-img-bell2{
		display: none;
	}
	.G-header .G-return .G-img-rt{
		padding-right: 5px;
	}
	.G-header .G-return .G-link-rt a{
		text-decoration: none;
		line-height: 24px;
		color: #0C214A;
		font-family: Roboto-Medium;
	}
	.G-header .G-menu{
		display: flex;
	}
	.G-header .G-menu .G-img-logo{
		margin-top: -9px;
	}
	.G-header .G-menu .G-content{
		padding-left: 20px;
	}
	.G-header .G-menu .G-content a{
		font-size: 15px;
		line-height: 153.69%;
		color: #263238;
		font-family: Roboto-Medium;
		text-decoration: none;
	}
	.G-header .G-menu .G-button{
		margin-left: 16px;
		margin-right: 26px;
	}
	.G-header .G-menu .G-button a{
		text-decoration: none;
		line-height: 153.69%;
		color: #FFFFFF;
		font-family: Roboto-Bold;
		padding: 4px 17px;
		margin-top: -3px;
		background: #F8971C;
		border-radius: 5px;
	}
	.G-header .G-menu .G-img-bell{
		padding-right: 17px;
	}
	.G-header .G-avt .G-img-avt{
		margin-top: -7px;
	}
	.G-header .G-avt .G-img-menu{
		display: none;
	}
	/*	-----------------
			tablet
		-----------------*/
	@media only screen and (max-width: 1024px){
		.G-header .G-return .G-img-rt,
		.G-header .G-return .G-link-rt{
			display: none;
		}
		.G-header .G-return .G-img-bell2{
			display: block;
		}
		.G-header .G-menu .G-content,
		.G-header .G-menu .G-button,
		.G-header .G-menu .G-img-bell,
		.G-header .G-avt .G-img-avt{
			display: none;
		}
		.G-header .G-avt .G-img-menu{
			display: block;
			margin-top: -3px;
		}
		.G-header .G-menu{
			width: 15%;
			margin: auto;
		}
		.G-header .G-return{
			width: 0;
		}
		.G-header .G-avt button{
			border: none;
			background: none;
		}
	}

	/*------------------------------------ Menu tablet ----------------------------------------*/
	@media only screen and (max-width: 1024px){
		.G-abc-hover{  /* chỉnh */
			float: right;
		    width: 100%;
		    margin-left: -40%;
		}
		.G-abc{
			width: 100%;
		}
		 .G-left-body-rezo{  /* chỉnh */
			width: 0px;
			height: auto;
			background: #FFFFFF;
			box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
			display: none;
		}
		.G-left-body-rezo-hover{
			width: 303px;
			display: block;
			float: right;
		}
		 .G-left-body-rezo .G-BI{       /* css bên body trái */
			position: relative;
		}
		 .G-left-body-rezo .G-BI .G-backimg{
			text-align: center;
		}
		 .G-left-body-rezo .G-BI .G-avt{
			margin-top: -55px;
		    text-align: center;
		}
		 .G-left-body-rezo .G-big-name{
			text-align: center;
		    margin-top: 13px;
		    margin-bottom: 20px;
		}
		 .G-left-body-rezo .G-big-name p{
			font-family: Roboto-Medium;
		    font-size: 18px;
		    line-height: 21px;
		    color: #252E3B;
		}
		 .G-left-body-rezo .G-div-center{
			margin-bottom: 35px;
		}
		 .G-left-body-rezo .G-div-center .G-new-profile{
			display: inline-flex;
		    padding: 6px 22px;
		    background: #F8971C;
		    border-radius: 100px;
		}
		 .G-left-body-rezo .G-div-center .G-new-profile .G-img-new{
			padding-right: 13px;
		}
		 .G-left-body-rezo .G-div-center .G-new-profile .G-new{
			color: #FFFFFF;
			font-size: 16px;
			line-height: 19px;
			font-family: Roboto-Medium;
		}
		 .G-left-body-rezo .G-div-center{
			text-align: center;
		}
		 .G-left-body-rezo .G-big-div-left .G-small-div-one .G-div-daddy{
			display: flex;
		    padding: 0px 0px 0px 20px;
		}
		 .G-left-body-rezo .G-big-div-left .G-small-div-one{
			padding-bottom: 21px;
		}
		 .G-left-body-rezo .G-big-div-left .G-small-div-one .G-div-daddy .G-icon-one .six{
			display: none;
			/*background: white;
			color: white;*/
		}
		 .G-left-body-rezo .G-big-div-left .G-small-div-one .G-div-daddy .G-icon-one .fas.fa-sort-down{
			color: white;
			display: none;
		}
		 .G-left-body-rezo .G-big-div-left .G-small-div-one .G-div-daddy .G-icon-one .seven{
			display: block !important;
		}
		 .G-left-body-rezo .G-big-div-left .G-small-div-one .G-div-daddy .G-content-one{ 
			padding-right: 88px;
		    font-size: 16px;
		    padding-left: 14px;
		    color: #575E66;
		}
		.G-left-body-rezo .G-big-div-left .G-small-div-one .G-div-baby{
			margin-top: 15px;
			display: none;
		}
		.G-left-body-rezo .G-big-div-left .G-small-div-one .G-div-baby .G-line1 a,
		.G-left-body-rezo .G-big-div-left .G-small-div-one .G-div-baby .G-line2 a{
			text-decoration: none;
			font-size: 16px;
			line-height: 24px;
			color: #575E66;
		}
		.G-left-body-rezo .G-big-div-left .G-small-div-one .G-div-baby-hover{
			display: block;
		}
		 .G-left-body-rezo .G-big-div-left .G-small-div-one .G-div-baby .G-line1 a:before{
			content: "";
			width: 6px;
			height: 6px;
			background: #F8971C;
			border-radius: 50%;
			/*display: inline-block;*/
			margin-left: 26px;
		    margin-right: 19px;
		}
		 .G-left-body-rezo .G-big-div-left .G-small-div-one .G-div-baby .G-line2 a:before{
			content: "";
			width: 6px;
			height: 6px;
			background: #F8971C;
			border-radius: 50%;
			/*display: inline-block;*/
			margin-left: 26px;
		    margin-right: 19px;
		}
		 .G-left-body-rezo .G-big-div-left .G-small-div-one .G-div-baby .G-line2{
			margin-top: 15px;
			margin-bottom: 15px;
		}
		.G-left-body-rezo .G-big-div-left .G-small-div-two .G-img-two .img-two,
		.G-left-body-rezo .G-big-div-left .G-small-div-three .G-img-two .img-two,
		.G-left-body-rezo .G-big-div-left .G-small-div-four .G-img-two .img-two,
		.G-left-body-rezo .G-big-div-left .G-small-div-five .G-img-two .img-two,
		.G-left-body-rezo .G-big-div-left .G-small-div-six .G-img-two .img-two{
			display: none;
		}
		.G-left-body-rezo .G-big-div-left .G-small-div-two,
		.G-left-body-rezo .G-big-div-left .G-small-div-three,
		.G-left-body-rezo .G-big-div-left .G-small-div-four,
		.G-left-body-rezo .G-big-div-left .G-small-div-five,
		.G-left-body-rezo .G-big-div-left .G-small-div-six{
			display: flex;
			padding-bottom: 21px;
		}
		.G-left-body-rezo .G-big-div-left .G-small-div-two .G-img-two,
		.G-left-body-rezo .G-big-div-left .G-small-div-three .G-img-two,
		.G-left-body-rezo .G-big-div-left .G-small-div-four .G-img-two,
		.G-left-body-rezo .G-big-div-left .G-small-div-five .G-img-two,
		.G-left-body-rezo .G-big-div-left .G-small-div-six .G-img-two{
			margin-left: 20px;
		    margin-right: 14px;
		}
		.G-left-body-rezo .G-big-div-left .G-small-div-two .G-content-two,
		.G-left-body-rezo .G-big-div-left .G-small-div-three .G-content-two,
		.G-left-body-rezo .G-big-div-left .G-small-div-four .G-content-two,
		.G-left-body-rezo .G-big-div-left .G-small-div-five .G-content-two,
		.G-left-body-rezo .G-big-div-left .G-small-div-six .G-content-two{
			margin-top: -3px;
		}
		.G-left-body-rezo .G-big-div-left .G-small-div-two .G-content-two a,
		.G-left-body-rezo .G-big-div-left .G-small-div-three .G-content-two a,
		.G-left-body-rezo .G-big-div-left .G-small-div-four .G-content-two a,
		.G-left-body-rezo .G-big-div-left .G-small-div-five .G-content-two a,
		.G-left-body-rezo .G-big-div-left .G-small-div-six .G-content-two a{
			font-size: 16px;
			line-height: 24px;
			color: #575E66;
			text-decoration: none;
		}
		.G-left-body-rezo .G-big-div-left .G-small-div-two .G-img-two .G-display,
		.G-left-body-rezo .G-big-div-left .G-small-div-three .G-img-two .G-display,
		.G-left-body-rezo .G-big-div-left .G-small-div-four .G-img-two .G-display,
		.G-left-body-rezo .G-big-div-left .G-small-div-five .G-img-two .G-display,
		.G-left-body-rezo .G-big-div-left .G-small-div-six .G-img-two .G-display{
			display: none;
		}
		.G-left-body-rezo .G-big-div-left .G-small-div-two .G-content-two .G-change-two,
		.G-left-body-rezo .G-big-div-left .G-small-div-three .G-content-two .G-change-two,
		.G-left-body-rezo .G-big-div-left .G-small-div-four .G-content-two .G-change-two,
		.G-left-body-rezo .G-big-div-left .G-small-div-five .G-content-two .G-change-two,
		.G-left-body-rezo .G-big-div-left .G-small-div-six .G-content-two .G-change-two{
			color: #ffffff;
		}
		.G-left-body-rezo .G-img-close{ /* Chỉnh */
			position: absolute;
		    top: 17px;
		    right: 47%;
		    display: none;
		}
		.G-left-body-rezo .G-img-close-hover{
			display: block;
			z-index: 2;
		}
		.G-left-body-rezo .G-img-close img{  /* Chỉnh */
	    	width: 156%;
		}
		.G-abc .G-darkness{
			background: rgba(0, 0, 0, 0.6);
			height: 100%;
			width: 100%;
			position: fixed;
			z-index: 1;
			display: none;
		}
		.G-abc .G-darkness-hover{
			display: block;
		}

		@media only screen and (max-width: 480px){
			.G-abc-hover{
				margin-left: -81%;
			}
			.G-left-body-rezo .G-img-close{
				top: 22px;
    			left: 23px;
			}
			.G-left-body-rezo .G-img-close img{
				width: 15%;
			}
		}
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	function GMenuTl() {
		document.getElementById("GMenuTl").classList.add('G-left-body-rezo-hover');
		document.getElementById("GMenuTl2").classList.add('G-abc-hover');
		document.getElementById("GMenuTl3").classList.add('G-img-close-hover');
		document.getElementById("GMenuTl4").classList.add('G-darkness-hover');
	}	
	function GMenuTablet(){
		document.getElementById("GMenuTl").classList.remove('G-left-body-rezo-hover');
		document.getElementById("GMenuTl2").classList.remove('G-abc-hover');
		document.getElementById("GMenuTl3").classList.remove('G-img-close-hover');
		document.getElementById("GMenuTl4").classList.remove('G-darkness-hover');
	}
	function GOpen(){
		document.getElementById('open-menu').classList.add('G-div-baby-hover')
	}
</script>
</body>
</html>	

