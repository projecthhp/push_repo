<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>đăng dự án</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/GiangCSS/All.css">
	<link rel="stylesheet" href="../css/all.css">
	<script src="../js/all.js"></script>
</head>
<body>
    <?php
        $headPostProject = 1;
        include_once 'head-index.php';
    ?>
    <!-- head pc -->
		<div class="M-header-white-post-project">
                <div class="M-head-white">
                    <div class="M-head-white-1">
                        <img src="../image/icon/return 1.png" alt="">
                        <a href="#">Quay lại Timviec365.com</a>
                    </div>
                    <div class="M-head-white-2">
                        <div id="logo" >
                            <img src="../image/img/Frame-tablet.png" alt="">
                        </div>
                        <div class="M-head-white-21">
                            <ul>
                                <li id="li1">
									<a href="#">Việc Freelancer</a>
									<!-- <ul>
										<li><a href="#">Việc Freelancer</a></li>
										<li><a href="#">Việc Freelancer</a></li>
									</ul> -->
                                </li>
                                <li id="li2">
                                    <a href="#">Danh sách Freelancer</a>
                                </li>
                                <li id="li2">
                                    <a href="#">Kinh nghiệm</a>
                                </li>
                                <li id="li2">
                                    <a href="#">Hướng dẫn</a>
                                </li>
                            </ul>
                        </div>
                        <div class="M-head-white-22">
                            <a href="#">Đăng dự án</a>
                        </div>
                        <div class="M-head-white-23">
                            <ul>
                                <li>
                                    <img src="../image/icon/Group.png" alt="">
                                    <a href="#" id="dang_nhap">Đăng nhập</a>
                                </li>
                                <li>|</li>
                                <li>
                                    <img src="../image/icon/Vector (1).png" alt="">
                                    <a href="" id="dang_ky">Đăng ký</a>
                                </li>
                            </ul>
                            <!-- <div class="M-head-white-login-23">
                                <img src="../image/img/Group 2251.png" alt="">
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="M-head-body">
                    <div class="text1">
                        Đăng việc để thuê Freelancer làm việc ngay!
                    </div>
                    <div class="text2">
                        Hàng ngàn dự án đã đăng và thuê được freelancer thành công.
                                Đăng việc để thuê Freelancer làm việc ngay!     
                    </div>
                    <div class="text3">
                        <a href="PostJobByProject.php" id="button1"><img src="../image/icon/Group (2).png" alt=""> Đăng việc theo dự án</a>
                        <a href="PostJobPartTime.php" id="button2"><img src="../image/icon/clock 1.png" alt=""> Đăng việc bán thời gian</a>
                    </div>
                </div>
    	</div>
	 <!-- ----menu hover tablet---- -->
        <div class="M-menu-hover-tablet" id="M-menu-hover-tablet" >
                        <div class="M-button-back-tablet">  
                            <p><img src="../image/icon/return 1.png" alt="">Quay lại Timviec365.com</p>
                        </div>
                        <div class="M-account-tablet">
                            <div class="M-logo-account-tablet">
                                <img src="../image/img/Frame-tablet.png" alt="">
                            </div>
                            <div class="M-img-account-tablet">
                                <img src="../image/img/Group 2142.png" height="73px" width="73px" alt="">
                                <p>Nguyễn Thị Lan</p>
                            </div>
                            <div class="M-logout-account-tablet">
                                <div id="M-logout-account">
                                    <a href=""><img src="../image/icon/Group 1800.png" alt="">Đăng xuất</a>
                                </div>
                                <div id="M-manager-account-tablet">
                                <a href=""> Quản lý tài khoản</a>
                                </div>
                            </div>
                            <div class="M-menu_ul_li-account">
                                <nav>
                                    <ul id="viec-freelancer">
                                        <li id="menu-hover"><img src="../image/icon/work (2) 1.png" alt=""> Việc Freelancer</li>
                                        <ul id="option-freelancer">
                                            <li id="li1"><i class="fas fa-circle"></i><a href="">Việc làm Freelancer theo dự án</a></li>
                                            <li id="li2"><i class="fas fa-circle"></i> <a href="">Việc làm Freelancer bán thời gian</a></li>
                                        </ul>
                                    </ul>
                                </nav>
                            </div>
                            <div class="M-menu-freelancer">
                                <div class="M-menu1-freelancer">
                                    <a href=""><img src="../image/icon/businessman 1.png" alt=""> Danh sách Freelancer</a>
                                </div>
                                <div class="M-menu2-freelancer">
                                    <a href=""><img src="../image/icon/Group 2401.png" alt="">Kinh nghiệm</a>
                                </div>
                                <div class="M-menu3-freelancer">
                                    <a href=""><img src="../image/icon/Group 2402.png" alt="">Hướng dẫn</a>
                                </div>
                            </div>
                    </div>
        </div>  
        <div class="M-body-tablet" id="M-body-tablet">
			<div class="M-hover-menu-tablet" id="M-hover-menu-tablet">
            </div>
            <div class="M-hover-search-tablet" id="M-hover-search-tablet" >
            </div>
                
            <!-- -----tìm kiếm đầu tablet---- -->
        <div class="M-search-head-hover-tablet" id="M-search-head-hover-tablet">
                    <form action="" method="" style="background-color: white;">
                        <div class="M-search-box-tablet">
                            <input type="text" name="search-box-tablet" placeholder="Nhập từ khóa tìm kiếm...">
                        </div>
                        <div class="M-select-tablet">
                            <select name="nganh-nghe-tablet" id="nganh-nghe-tablet">
                                <option value="">Chọn ngành nghề</option>
                                <option value="1">Nghề 1</option>
                                <option value="2">Nghề 2</option>
                            </select>
                            <select name="tinh-thanh-tablet" id="tinh-thanh-tablet">
                                <option value="">Chọn tỉnh thành</option>
                                <option value="1">Hà Nội</option>
                                <option value="2">Hồ Chí Minh</option>
                            </select>
                        </div>
                        <div class="M-button-search-tablet">
                            <button><i class="far fa-search"></i> Tìm kiếm</button>
                        </div>
                    </form>
        </div>
            <div class="M-header-tablet" id="M-header-tablet-post-project">
                    <div class="M-head-tablet" id="M-head-tablet" >
                        <i class="far fa-search" onclick="search_tablet()"></i>
                        <img  class="img-close-search-tablet" onclick="search_tablet()" src="../image/icon/close (2) 1.png" alt="">
                        <div class="img2">
                            <img src="../image/img/Frame-tablet.png" alt="">
                        </div>
                        <div class="img3" id="img3" onclick="menu_hover()">
                            <img class="img-hover-pc" src="../image/icon/Menu 1 (1).png" alt="">
                            <img id="img-close-tablet" class="img-close-tablet" src="../image/icon/close (2) 1.png" alt="">
                        </div>
                    </div>
                <div class="M-head-body">
                    <div class="text1">
                        Đăng việc để thuê Freelancer làm việc ngay!
                    </div>
                    <div class="text2">
                        Hàng ngàn dự án đã đăng và thuê được freelancer thành công.
                                Đăng việc để thuê Freelancer làm việc ngay!     
                    </div>
                    <div class="text3">
                        <a href="" id="button1"><img src="../image/icon/Group (2).png" alt=""> Đăng việc theo dự án</a>
                        <a href="" id="button2"><img src="../image/icon/clock 1.png" alt=""> Đăng việc bán thời gian</a>
                    </div>
                </div>           
            </div>
            <div class="M-body-post-project">
                <div class="M-body-1">
                    <div class="M-body-11">
                                        <img src="../image/img/Frame.png" alt="">
                                        <p>Việc Freelancer theo ngành nghề</p>
                                    </div>
                                    <div class="M-body-12">
                                        <div class="box">
                                        <div id="img">
                                                <img src="../image/img/web-development 1.png" alt="">
                                                <hr>
                                        </div>
                                            <div id="a">
                                                <a href="#">IT & Lập trình</a>
                                            </div>
                                        </div>
                                        <div  class="box">
                                        <div id="img">
                                                <img src="../image/img/school 1.png" alt="">
                                                <hr>
                                        </div>
                                            <div id="a">
                                                <a href="#">Thiết kế</a>
                                            </div>
                                        </div>
                                        <div  class="box">
                                            <div id="img">
                                                <img src="../image/img/paper 1.png" alt="">
                                                <hr>
                                        </div>
                                            <div id="a">
                                                <a href="#">Viết lách & Dịch thuật</a>
                                            </div>
                                        </div>
                                        <div  class="box">
                                            <div id="img">
                                                <img src="../image/img/monitor (1) 1.png" alt="">
                                                <hr>
                                        </div>
                                            <div id="a">
                                                <a href="#">Kinh doanh, Nhập liệu & Hành chính</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="M-body-12">
                                        <div class="box">
                                        <div id="img">
                                                <img src="../image/img/business-and-finance 1.png" alt="">
                                                <hr>
                                        </div>
                                            <div id="a">
                                                <a href="#">Kế toán, Thuế & Luật</a>
                                            </div>
                                        </div>
                                        <div  class="box">
                                        <div id="img">
                                                <img src="../image/img/sketch 1.png" alt="">
                                                <hr>
                                        </div>
                                            <div id="a">
                                                <a href="#">Kiến trúc & Xây dựng</a>
                                            </div>
                                        </div>
                                        <div  class="box">
                                            <div id="img">
                                                <img src="../image/img/video 1.png" alt="">
                                                <hr>
                                        </div>
                                            <div id="a">
                                                <a href="#">Video</a>
                                            </div>
                                        </div>
                                        <div  class="box">
                                            <div id="img">
                                                <img src="../image/img/2e60c7eff0955e9ac56ca03ccdba3b3f 1.png" alt="">
                                                <hr>
                                        </div>
                                            <div id="a">
                                                <a href="#">Lĩnh vực khác</a>
                                            </div>
                                        </div>
                                    </div>
                </div>
            </div>
            <div class="M-body-post-project4">
                <img src="../image/img/Frame (5).png" alt="">
                <p>Tại sao nên tìm Freelancer tại Timviec365.com?</p>
            </div>
            <div class="M-body-post-project1">
                <div class="M-body-post-project1-tab1">
                    <div class="text1">Tuyển Freelancer hiệu quả nhất</div>
                    <div class="text2">
                        <ul>
                            <li><i class="fas fa-square-full"></i>Đăng việc làm miễn phí</li>
                            <li><i class="fas fa-square-full"></i>Thu hút những Freelancer giỏi nhất</li>
                            <li><i class="fas fa-square-full"></i>Tiết kiệm chi phí tuyển dụng</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="M-body-post-project2">
                <div class="M-body-post-project2-tab1">
                    <div class="text1">Chọn Freelancer ưng ý nhất</div>
                    <div class="text2">
                        <ul>
                            <li><i class="fas fa-square-full"></i> So sánh các ứng viên</li>
                            <li><i class="fas fa-square-full"></i> Dữ liệu ứng viên phong phú</li>
                            <li><i class="fas fa-square-full"></i>Chọn 01 Freelancer ưng ý nhất</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="M-body-post-project3">
                <div class="M-body-post-project3-tab1">
                    <div class="text1">Hỗ trợ 24/7</div>
                    <div class="text2">
                        Đội ngũ chăm sóc khách hàng 24/7 luôn sẵn sàng hỗ trợ bạn để giải quyết các vân đề cấp bách giúp công việc của bản luôn trôi chảy.
                    </div>
                </div>
            </div>
            <div class="M-body-post-project5">
                <div class="img">
                    <img src="../image/img/Group 2367 (1).png" alt="">
                </div>
                <div class="text">
                    <div id="text1"><div>1</div> Đăng việc làm</div>
                    <div id="text2"><div>2</div> Chọn Freelancer ưng ý</div>
                    <div id="text3"><div>3</div> Liên hệ làm việc</div>
                </div>
            </div>
            <div class="M-body-post-project5-mobile">
                <img src="../image/img/Group 2615.png" alt="">
            </div>
            <div class="M-body-post-project6">
                <div class="text1">Đăng việc để thuê Freelancer làm việc ngay!</div>
                <div class="text2"><a href="">Đăng việc ngay</a></div>
            </div>
            <div class="M-body-post-project7 d-flex flex-wrap">
                <div class="img"><img src="../image/img/Rectangle 624.png" alt=""></div>
                <div class="img"><img src="../image/img/Rectangle 625.png" alt=""></div>
                <div class="img"><img src="../image/img/Rectangle 627.png" alt=""></div>
                <div class="img"><img src="../image/img/Rectangle 628.png" alt=""></div>
                <div class="img"><img src="../image/img/Rectangle 626.png" alt=""></div>
                <div class="img"><img src="../image/img/Group 2320.png" alt=""></div>
                <div class="img"><img src="../image/img/Group 2321.png" alt=""></div>
                <div class="img"><img src="../image/img/Group 2322.png" alt=""></div>
            </div>
        </div>
</div>
<?php
    include_once "";
?>
</body>
</html>