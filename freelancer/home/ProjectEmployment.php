
<?php
    include_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết việc làm theo dự án</title>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../image/icon/fa-icon/css/all.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/GiangCSS/All.css">
    <script src="../js/all.js"></script>
</head>
<body>
    <?php
    include_once 'head-index.php';
    ?>
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
		<div class="M-header-tablet">
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
		</div>
   <div class="ProjectEmployment">
            <!-- đầu trang  -->
        <div class="M-background-head">
            <ul>
                <li><a href="index.php">Trang chủ</a></li>
                <li>/</li>
                <li><a href="FreelancerFollowPJ.php">Việc làm Freelancer theo dự án</a></li>
                <li>/</li>
                <li><a>Thiết kế</a></li>
            </ul>
        </div>
        <!-- phần thân -->
        <div class="M-body-ProjectEmployment">
            <div class="M-body-ProjectEmployment-left">
                <div class="M-body-ProjectEmployment-left-img">
                    <img src="../image/img/Group 2077.png" alt="">
                </div>
                <div class="M-body-ProjectEmployment-left-price">
                    <a href="">
                        <img src="../image/img/Group (1).png" alt="">
                        <p>5.000.000đ - 8.000.000đ</p>
                    </a>
                </div>
                <div class="M-body-ProjectEmployment-left-profile-1">
                    <div>
                        <p class="text1"><img src="../image/icon/info 1.png" alt=""> Hình thức</p>
                        <p class="text2">Online</p>
                    </div>
                    <div>
                        <p class="text1"><img src="../image/icon/foursquare-check-in 1.png" alt=""> Ngày bắt đầu </p>
                        <p class="text2">28/09/2020</p>
                    </div>
                    <div>
                        <p class="text1"><img src="../image/icon/menu 1 (2).png" alt=""> Thời hạn</p>
                        <p class="text2"> 1 tháng</p>
                    </div>
                    <div>
                        <p class="text1"><img src="../image/icon/dot 1.png" alt=""> Địa điểm</p>
                        <p class="text2">Hồ CHí Minh</p>
                    </div>
                    <div>
                        <p class="text1"><img src="../image/icon/add 1.png" alt=""> Kinh nghiệm</p>
                        <p class="text2">1 - 2 năm</p>
                    </div>
                </div>
                <div class="M-body-ProjectEmployment-left-profile-2">
                    <div class="M-top">
                        <div class="img">
                            <img src="../image/img/1avt2.png" alt="">
                        </div>
                        <a href="JobFreelancer.php"><div class="name">Hoàng Thị Thùy Dung</div></a>
                        <div class="address"><img src="../image/icon/dot 1 (1).png" alt=""> Hồ Chí Minh</div>
                    </div>
                    <div class="M-bottom">
                        <div id="start">
                            <p id="text1">SĐT:</p>
                            <p id="text2"><button data-toggle="modal" data-target="#modelSdt">Đăng nhập để xem SĐT</button></p>
                            <!-- Modal -->
                                <div class="modal fade" id="modelSdt" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header modal-header-project-employment">
                                                
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text1">
                                                    <p>Đăng nhập để xem Số điện thoại</p>
                                                </div>
                                                <form action="">
                                                    <div class="input">
                                                        <input type="text" id="input1" placeholder="Nhập số điện thoại">
                                                        <input type="text" id="input2" placeholder="**********">
                                                    </div>
                                                    <div class="text2"><a href="">Quên mật khẩu?</a></div>
                                                    <div class="text3">
                                                        <button>Đăng nhập</button>
                                                    </div>
                                                </form>
                                                <div class="text4">
                                                    Bạn chưa có tài khoản? <a href="">ĐĂNG KÝ NGAY</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div id="start">
                            <p id="text1">Email:</p>
                            <p id="text2"><button data-toggle="modal" data-target="#modelsEmail">Đăng nhập để xem Email</button></p>
                             <!-- Modal -->
                                <div class="modal fade" id="modelsEmail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text1">
                                                    <p>Đăng nhập để xem Email</p>
                                                </div>
                                                <form action="">
                                                    <div class="input">
                                                        <input type="text" id="input1" placeholder="Nhập số điện thoại">
                                                        <input type="text" id="input2" placeholder="**********">
                                                    </div>
                                                    <div class="text2"><a href="quen-mat-khau">Quên mật khẩu?</a></div>
                                                    <div class="text3">
                                                        <button>Đăng nhập</button>
                                                    </div>
                                                </form>
                                                <div class="text4">
                                                    Bạn chưa có tài khoản? <a href="AccountFreelancer.php">ĐĂNG KÝ NGAY</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div id="start">
                            <p id="text1">Tham gia:</p>
                            <p id="text2">12/6/2020</p>
                        </div>
                        <div class="end" id="start">
                            <p id="text1">Đã đăng:</p>
                            <p id="text2">12 công việc</p>
                        </div>
                    </div>
                </div>
                <div class="M-body-ProjectEmployment-left-word">
                    <div class="M-body-ProjectEmployment-left-word-text">Công việc tương tự</div>
                    <div class="M-body-ProjectEmployment-left-word-option">
                        <div id="text1">Edit video cho thuyết trình</div>
                        <div id="text2"><img src="../image/icon/icon7.png" alt=""> Thiết kế</div>
                        <div id="text3"><img src="../image/icon/Vector (2).png" alt=""> 300.000đ/giờ</div>
                    </div>
                    <div class="M-body-ProjectEmployment-left-word-option">
                        <div id="text1">Edit video cho thuyết trình</div>
                        <div id="text2"><img src="../image/icon/icon7.png" alt=""> Thiết kế</div>
                        <div id="text3"><img src="../image/icon/Vector (2).png" alt=""> 300.000đ/giờ</div>
                    </div>
                    <div class="M-body-ProjectEmployment-left-word-option">
                        <div id="text1">Edit video cho thuyết trình</div>
                        <div id="text2"><img src="../image/icon/icon7.png" alt=""> Thiết kế</div>
                        <div id="text3"><img src="../image/icon/Vector (2).png" alt=""> 300.000đ/giờ</div>
                    </div>
                    <div class="M-body-ProjectEmployment-left-word-option">
                        <div id="text1">Edit video cho thuyết trình</div>
                        <div id="text2"><img src="../image/icon/icon7.png" alt=""> Thiết kế</div>
                        <div id="text3"><img src="../image/icon/Vector (2).png" alt=""> 300.000đ/giờ</div>
                    </div>
                    <div class="M-body-ProjectEmployment-left-word-option">
                        <div id="text1">Edit video cho thuyết trình</div>
                        <div id="text2"><img src="../image/icon/icon7.png" alt=""> Thiết kế</div>
                        <div id="text3"><img src="../image/icon/Vector (2).png" alt=""> 300.000đ/giờ</div>
                    </div>
                    <div class="M-body-ProjectEmployment-left-word-option">
                        <div id="text1">Edit video cho thuyết trình</div>
                        <div id="text2"><img src="../image/icon/icon7.png" alt=""> Thiết kế</div>
                        <div id="text3"><img src="../image/icon/Vector (2).png" alt=""> 300.000đ/giờ</div>
                    </div>
                </div>
            </div>
            <div class="M-body-ProjectEmployment-right">
                <div class="M-body-ProjectEmployment-right-top">
                    <!-- img tablet -->
                    <div class="M-body-ProjectEmployment-right-top-img-tablet">
                        <img src="../image/img/Group 2076 (1).png" alt="" width="162px" height="117px">
                    </div>
                      <!--end img tablet -->
                      <!-- head mobile -->
                    <div class="M-body-ProjectEmployment-right-top-left-mobile">
                        <ul class="text2">
                            <li id="li1" >ID dự án: 3265</li>
                            <li id="li2"> 12/09/2020</li>
                        </ul>
                        <div class="text1">Thiết kế mảng tranh tường vector cho quán cafe</div>
                    </div>
                    <script>
                        $('#exampleModal').on('show.bs.modal', event => {
                            var button = $(event.relatedTarget);
                            var modal = $(this);
                            // Use above variables to manipulate the DOM
                            
                        });
                    </script>
                      <!--end head mobile -->
                    <div class="M-body-ProjectEmployment-right-top-left">
                        <div class="text1">Thiết kế mảng tranh tường vector cho quán cafe</div>
                        <ul class="text2">
                            <li id="li1" >ID dự án: 3265</li>
                            <li id="li2">|</li>
                            <li id="li2"> 12/09/2020</li>
                        </ul>
                    </div>
                    <div class="M-body-ProjectEmployment-right-top-right" id="M-body-ProjectEmployment-right-top-right">
                        <button class="button1" onclick="hover_project()" ><p><i class="fas fa-star"></i>Lưu dự án</p></button>
                        <button class="button2" onclick="hover_project()"><p><i class="fas fa-star"></i>Đã lưu</p></button>
                    </div>
                </div>
                
                <div class="M-body-ProjectEmployment-right-content">
                    <div class="" style="display:flex;">
                        <div class="M-body-ProjectEmployment-left-price-mobile">
                                <img src="../image/img/Group (1).png" alt="">
                                <p>5.000.000đ - 8.000.000đ</p>
                        </div>
                        <div class="M-body-ProjectEmployment-right-top-right-mobile" id="M-body-ProjectEmployment-right-top-right-mobile">
                            <button class="button1" onclick="hover_project_mobile()" ><p><i class="fas fa-star"></i>Lưu dự án</p></button>
                            <button class="button2" onclick="hover_project_mobile()"><p><i class="fas fa-star"></i>Đã lưu</p></button>
                        </div>
                    </div>
                    <div class="M-body-ProjectEmployment-left-profile-1">
                        <div>
                            <p class="text1"><img src="../image/icon/info 1.png" alt=""> Hình thức</p>
                            <p class="text2">Online</p>
                        </div>
                        <div>
                            <p class="text1"><img src="../image/icon/foursquare-check-in 1.png" alt=""> Ngày bắt đầu </p>
                            <p class="text2">28/09/2020</p>
                        </div>
                        <div>
                            <p class="text1"><img src="../image/icon/menu 1 (2).png" alt=""> Thời hạn</p>
                            <p class="text2"> 1 tháng</p>
                        </div>
                        <div>
                            <p class="text1"><img src="../image/icon/dot 1.png" alt=""> Địa điểm</p>
                            <p class="text2">Hồ CHí Minh</p>
                        </div>
                        <div>
                            <p class="text1"><img src="../image/icon/add 1.png" alt=""> Kinh nghiệm</p>
                            <p class="text2">1 - 2 năm</p>
                        </div>
                    </div>
                    <div class="M-body-ProjectEmployment-left-profile-2">
                        <div class="M-top">
                            <div class="img">
                                <img src="../image/img/1avt2.png" alt="">
                            </div>
                            <a href="a"><div class="name">Hoàng Thị Thùy Dung</div></a>
                            <div class="address"><img src="../image/icon/dot 1 (1).png" alt=""> Hồ Chí Minh</div>
                        </div>
                        <div class="M-bottom">
                            <div id="start">
                                <p id="text1">SĐT:</p>
                                <p id="text2"><button data-toggle="modal" data-target="#modelSdt2-sm">Đăng nhập để xem SĐT</button></p>
                                <!-- Modal -->
                                    <div class="modal fade" id="modelSdt2-sm" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog " role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="text1">
                                                        <p>Đăng nhập để xem Số điện thoại</p>
                                                    </div>
                                                    <form action="">
                                                        <div class="input">
                                                            <input type="text" id="input1" placeholder="Nhập số điện thoại">
                                                            <input type="text" id="input2" placeholder="**********">
                                                        </div>
                                                        <div class="text2"><a href="">Quên mật khẩu?</a></div>
                                                        <div class="text3">
                                                            <button>Đăng nhập</button>
                                                        </div>
                                                    </form>
                                                    <div class="text4">
                                                        Bạn chưa có tài khoản? <a href="">ĐĂNG KÝ NGAY</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div id="start">
                                <p id="text1">Email:</p>
                                <p id="text2"><button data-toggle="modal" data-target="#modelsEmail2">Đăng nhập để xem Email</button></p>
                                <!-- Modal -->
                                    <div class="modal fade" id="modelsEmail2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="text1">
                                                        <p>Đăng nhập để xem Email</p>
                                                    </div>
                                                    <form action="">
                                                        <div class="input">
                                                            <input type="text" id="input1" placeholder="Nhập số điện thoại">
                                                            <input type="text" id="input2" placeholder="**********">
                                                        </div>
                                                        <div class="text2"><a href="">Quên mật khẩu?</a></div>
                                                        <div class="text3">
                                                            <button>Đăng nhập</button>
                                                        </div>
                                                    </form>
                                                    <div class="text4">
                                                        Bạn chưa có tài khoản? <a href="">ĐĂNG KÝ NGAY</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div id="start">
                                <p id="text1">Tham gia:</p>
                                <p id="text2">12/6/2020</p>
                            </div>
                            <div class="end" id="start">
                                <p id="text1">Đã đăng:</p>
                                <p id="text2">12 công việc</p>
                            </div>
                        </div>
                    </div>
                    <div class="M-body-ProjectEmployment-right-content-text0">
                        <div class="M-body-ProjectEmployment-right-content-text0-tablet">
                            <div class="M-body-ProjectEmployment-left-profile-2">
                                <div class="M-top">
                                    <div class="img">
                                        <img src="../image/img/1avt2.png" alt="">
                                    </div>
                                    <div class="name">Hoàng Thị Thùy Dung</div>
                                    <div class="address"><img src="../image/icon/dot 1 (1).png" alt=""> Hồ Chí Minh</div>
                                </div>
                                <div class="M-body-ProjectEmployment-left-price">
                                    <a href="">
                                        <img src="../image/img/Group (1).png" alt="">
                                        <p>5.000.000đ</p>
                                    </a>
                                </div>
                                <div class="M-bottom">
                                    <div>
                                    <div id="start">
                            <p id="text1">SĐT:</p>
                            <p id="text2"><button data-toggle="modal" data-target="#modelSdt1">Đăng nhập để xem SĐT</button></p>
                            <!-- Modal -->
                                <div class="modal fade" id="modelSdt1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text1">
                                                    <p>Đăng nhập để xem Số điện thoại</p>
                                                </div>
                                                <form action="">
                                                    <div class="input">
                                                        <input type="text" id="input1" placeholder="Nhập số điện thoại">
                                                        <input type="text" id="input2" placeholder="**********">
                                                    </div>
                                                    <div class="text2"><a href="">Quên mật khẩu?</a></div>
                                                    <div class="text3">
                                                        <button>Đăng nhập</button>
                                                    </div>
                                                </form>
                                                <div class="text4">
                                                    Bạn chưa có tài khoản? <a href="">ĐĂNG KÝ NGAY</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div id="start">
                            <p id="text1">Email:</p>
                            <p id="text2"><button data-toggle="modal" data-target="#modelsEmail1">Đăng nhập để xem Email</button></p>
                             <!-- Modal -->
                                <div class="modal fade" id="modelsEmail1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text1">
                                                    <p>Đăng nhập để xem Email</p>
                                                </div>
                                                <form action="">
                                                    <div class="input">
                                                        <input type="text" id="input1" placeholder="Nhập số điện thoại">
                                                        <input type="text" id="input2" placeholder="**********">
                                                    </div>
                                                    <div class="text2"><a href="">Quên mật khẩu?</a></div>
                                                    <div class="text3">
                                                        <button>Đăng nhập</button>
                                                    </div>
                                                </form>
                                                <div class="text4">
                                                    Bạn chưa có tài khoản? <a href="">ĐĂNG KÝ NGAY</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                                    </div>
                                    <div>
                                        <div id="start">
                                            <p id="text1">Tham gia:</p>
                                            <p id="text2">12/6/2020</p>
                                        </div>
                                        <div class="end" id="start">
                                            <p id="text1">Đã đăng:</p>
                                            <p id="text2">12 công việc</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="M-body-ProjectEmployment-left-profile-1">
                                <div>
                                    <p class="text1"><img src="../image/icon/info 1.png" alt=""> Hình thức</p>
                                    <p class="text2">Online</p>
                                </div>
                                <div>
                                    <p class="text1"><img src="../image/icon/foursquare-check-in 1.png" alt=""> Ngày bắt đầu </p>
                                    <p class="text2">28/09/2020</p>
                                </div>
                                <div>
                                    <p class="text1"><img src="../image/icon/menu 1 (2).png" alt=""> Thời hạn</p>
                                    <p class="text2"> 1 tháng</p>
                                </div>
                                <div>
                                    <p class="text1"><img src="../image/icon/dot 1.png" alt=""> Địa điểm</p>
                                    <p class="text2">Hồ CHí Minh</p>
                                </div>
                                <div>
                                    <p class="text1"><img src="../image/icon/add 1.png" alt=""> Kinh nghiệm</p>
                                    <p class="text2">1 - 2 năm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="M-body-ProjectEmployment-right-content-text1">
                        Mô tả công việc
                    </div>
                    <div class="M-body-ProjectEmployment-right-content-text2">
                        Dịch vụ cần thuê: <a href="">Thiết kế backdrop</a>
                    </div>
                    <div class="M-body-ProjectEmployment-right-content-text3">
                        Ý tưởng thiết kế:
                        - Màu sắc chủ đạo: xanh lá, nâu, trắng (theo đặc trưng của logo và của quán)
                        - Tranh tường vector với kích thước thực tế khi thi công: cao 2,5 mét, dài 4 mét. Nên bài thiết kế các bạn chú ý scale theo tỷ lệ này.
                        - Nội dung: mô tả được hình ảnh của những người nông dân mặc trang phục đồng bào Tây Nguyên mang gùi để hải cafe, hái chè với khung cảnh trên đồi núi lúc bình minh, có nhà sàn, mang một số nét văn hóa đặc trưng của Tây Nguyên.
                        Đính kèm hình ảnh về không gian của quán và một vài kiểu tranh vector để tham khảo.
                    
                    </div>
                    <div class="M-body-ProjectEmployment-right-content-text4">
                        File đính kèm:
                        <div>
                            <a href=""><i class="far fa-link"></i>o1a5ca34ae4be18e041af.jpg</a>
                        </div>
                        <div>
                            <a href=""><i class="far fa-link"></i>1a5ca34ae4be18e041af.jpg</a>
                        </div>
                        <div>
                            <a href=""><i class="far fa-link"></i>1a5ca34ae4be18e041af.jpg</a>
                        </div>
                        <div>
                            <a href=""><i class="far fa-link"></i>1a5ca34ae4be18e041af.jpg</a>
                        </div>
                        <div>
                            <a href=""><i class="far fa-link"></i>1a5ca34ae4be18e041af.jpg</a>
                        </div>     
                    </div>
                    <div class="M-body-ProjectEmployment-right-content-text5">
                        Kỹ năng:
                        <div><a href="">PHP</a></div>
                        <div><a href="">plugin</a></div>
                        <div><a href="">Wordpress</a></div>
                        <!-- <div><a href="">WooCommerce</a></div>
                        <div><a href="">Code</a></div>
                        <div><a href="">Graphic Design</a></div> -->
                    </div>
                    <div class="M-body-ProjectEmployment-right-content-text6">
                        Thông tin đặt giá
                    </div>
                    <div class="M-body-ProjectEmployment-right-content-text7">
                        <div class="text71">
                            <p id="text1">Đặt giá cho công việc này!</p>
                            <p id="text2">Đặt giá kết thúc ngày 15/9/2020</p>
                        </div>
                        <form action="">
                        <div class="text72">
                                <input id="muc_luong" name="muc_luong" type="text" placeholder="Nhập mức lương mong muốn">
                                <input id="email" name="email" type="text" placeholder="Nhập địa chỉ Email của bạn">
                        </div>
                        <div class="text73">
                            <button id="button1">Đặt giá cho công việc này</button>
                            <input id="button2" type="reset" value="Hủy">
                        </form>
                        </div>
                    </div>
                    <div class="M-body-ProjectEmployment-right-content-text8">
                        Có <a href="">8</a> Freelancer đang đặt giá cho công việc này
                    </div>
                    <div class="M-body-ProjectEmployment-right-content-text9">
                        <div class="top">
                            <div id="left">
                                <img src="../image/img/Group 2046 (1).png" alt="">
                                <div class="text1">
                                    <div id="text1"><a href="DetailFreelancer.php">Nguyễn Hoàng Minh</a></div>
                                    <div id="text2"><a href="">Designer Web</a></div>
                                </div>
                            </div>
                            <div id="right">
                                <div id="text1">Đặt giá: <p>5.500.000đ</p></div>
                                <div id="text2">
                                    <div><p>4.5</p></div>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div>
                                <p>Tôi đã học xong Trung học Phổ thông theo chương trình Khoa học, Công nghệ, Kỹ thuật và Toán học (STEM). Tôi đang tìm kiếm công việc nhập dữ liệu như thế này. Đây là một kỹ năng cơ bản và sẽ được xử lý một cách chắc chắn. Tôi đã sẵn sàng để hoàn thành...  <a href="">(Xem thêm)</a></p>
                               
                            </div>
                        </div>
                    </div>
                    <div class="M-body-ProjectEmployment-right-content-text9">
                        <div class="top">
                            <div id="left">
                                <img src="../image/img/Group 2046 (1).png" alt="">
                                <div class="text1">
                                    <div id="text1"><a href="">Nguyễn Hoàng Minh</a></div>
                                    <div id="text2"><a href="">Designer Web</a></div>
                                </div>
                            </div>
                            <div id="right">
                                <div id="text1">Đặt giá: <p>5.500.000đ</p></div>
                                <div id="text2">
                                    <div><p>4.5</p></div>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div>
                                <p>Tôi đã học xong Trung học Phổ thông theo chương trình Khoa học, Công nghệ, Kỹ thuật và Toán học (STEM). Tôi đang tìm kiếm công việc nhập dữ liệu như thế này. Đây là một kỹ năng cơ bản và sẽ được xử lý một cách chắc chắn. Tôi đã sẵn sàng để hoàn thành...  <a href="">(Xem thêm)</a></p>
                               
                            </div>
                        </div>
                    </div>
                    <div class="M-body-ProjectEmployment-right-content-text9">
                        <div class="top">
                            <div id="left">
                                <img src="../image/img/Group 2046 (1).png" alt="">
                                <div class="text1">
                                    <div id="text1"><a href="">Nguyễn Hoàng Minh</a></div>
                                    <div id="text2"><a href="">Designer Web</a></div>
                                </div>
                            </div>
                            <div id="right">
                                <div id="text1">Đặt giá: <p>5.500.000đ</p></div>
                                <div id="text2">
                                    <div><p>4.5</p></div>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div>
                                <p>Tôi đã học xong Trung học Phổ thông theo chương trình Khoa học, Công nghệ, Kỹ thuật và Toán học (STEM). Tôi đang tìm kiếm công việc nhập dữ liệu như thế này. Đây là một kỹ năng cơ bản và sẽ được xử lý một cách chắc chắn. Tôi đã sẵn sàng để hoàn thành...  <a href="">(Xem thêm)</a></p>
                               
                            </div>
                        </div>
                    </div> 
                    <div class="M-body-ProjectEmployment-right-content-text9">
                        <div class="top">
                            <div id="left">
                                <img src="../image/img/Group 2046 (1).png" alt="">
                                <div class="text1">
                                    <div id="text1"><a href="">Nguyễn Hoàng Minh</a></div>
                                    <div id="text2"><a href="">Designer Web</a></div>
                                </div>
                            </div>
                            <div id="right">
                                <div id="text1">Đặt giá: <p>5.500.000đ</p></div>
                                <div id="text2">
                                    <div><p>4.5</p></div>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div>
                                <p>Tôi đã học xong Trung học Phổ thông theo chương trình Khoa học, Công nghệ, Kỹ thuật và Toán học (STEM). Tôi đang tìm kiếm công việc nhập dữ liệu như thế này. Đây là một kỹ năng cơ bản và sẽ được xử lý một cách chắc chắn. Tôi đã sẵn sàng để hoàn thành...  <a href="">(Xem thêm)</a></p>
                               
                            </div>
                        </div>
                    </div> 
                    <div class="M-body-ProjectEmployment-right-content-text9">
                        <div class="top">
                            <div id="left">
                                <img src="../image/img/Group 2046 (1).png" alt="">
                                <div class="text1">
                                    <div id="text1"><a href="">Nguyễn Hoàng Minh</a></div>
                                    <div id="text2"><a href="">Designer Web</a></div>
                                </div>
                            </div>
                            <div id="right">
                                <div id="text1">Đặt giá: <p>5.500.000đ</p></div>
                                <div id="text2">
                                    <div><p>4.5</p></div>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div>
                                <p>Tôi đã học xong Trung học Phổ thông theo chương trình Khoa học, Công nghệ, Kỹ thuật và Toán học (STEM). Tôi đang tìm kiếm công việc nhập dữ liệu như thế này. Đây là một kỹ năng cơ bản và sẽ được xử lý một cách chắc chắn. Tôi đã sẵn sàng để hoàn thành...  <a href="">(Xem thêm)</a></p>
                               
                            </div>
                        </div>
                    </div> 
                    <div class="M-body-ProjectEmployment-right-content-text9">
                        <div class="top">
                            <div id="left">
                                <img src="../image/img/Group 2046 (1).png" alt="">
                                <div class="text1">
                                    <div id="text1"><a href="">Nguyễn Hoàng Minh</a></div>
                                    <div id="text2"><a href="">Designer Web</a></div>
                                </div>
                            </div>
                            <div id="right">
                                <div id="text1">Đặt giá: <p>5.500.000đ</p></div>
                                <div id="text2">
                                    <div><p>4.5</p></div>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div>
                                <p>Tôi đã học xong Trung học Phổ thông theo chương trình Khoa học, Công nghệ, Kỹ thuật và Toán học (STEM). Tôi đang tìm kiếm công việc nhập dữ liệu như thế này. Đây là một kỹ năng cơ bản và sẽ được xử lý một cách chắc chắn. Tôi đã sẵn sàng để hoàn thành...  <a href="">(Xem thêm)</a></p>
                               
                            </div>
                        </div>
                    </div> 
                    <div class="M-body-ProjectEmployment-right-content-text9">
                        <div class="top">
                            <div id="left">
                                <img src="../image/img/Group 2046 (1).png" alt="">
                                <div class="text1">
                                    <div id="text1"><a href="">Nguyễn Hoàng Minh</a></div>
                                    <div id="text2"><a href="">Designer Web</a></div>
                                </div>
                            </div>
                            <div id="right">
                                <div id="text1">Đặt giá: <p>5.500.000đ</p></div>
                                <div id="text2">
                                    <div><p>4.5</p></div>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div>
                                <p>Tôi đã học xong Trung học Phổ thông theo chương trình Khoa học, Công nghệ, Kỹ thuật và Toán học (STEM). Tôi đang tìm kiếm công việc nhập dữ liệu như thế này. Đây là một kỹ năng cơ bản và sẽ được xử lý một cách chắc chắn. Tôi đã sẵn sàng để hoàn thành...  <a href="">(Xem thêm)</a></p>
                               
                            </div>
                        </div>
                    </div> 
                    <div class="M-body-ProjectEmployment-right-content-text9">
                        <div class="top">
                            <div id="left">
                                <img src="../image/img/Group 2046 (1).png" alt="">
                                <div class="text1">
                                    <div id="text1"><a href="">Nguyễn Hoàng Minh</a></div>
                                    <div id="text2"><a href="">Designer Web</a></div>
                                </div>
                            </div>
                            <div id="right">
                                <div id="text1">Đặt giá: <p>5.500.000đ</p></div>
                                <div id="text2">
                                    <div><p>4.5</p></div>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div>
                                <p>Tôi đã học xong Trung học Phổ thông theo chương trình Khoa học, Công nghệ, Kỹ thuật và Toán học (STEM). Tôi đang tìm kiếm công việc nhập dữ liệu như thế này. Đây là một kỹ năng cơ bản và sẽ được xử lý một cách chắc chắn. Tôi đã sẵn sàng để hoàn thành...  <a href="">(Xem thêm)</a></p>
                               
                            </div>
                        </div>
                    </div>
                    <div class="M-body-ProjectEmployment-right-content-text10">
                        <button>Xem  thêm <i class="far fa-angle-double-down"></i></button>
                    </div>
                    <div class="M-body-ProjectEmployment-right-content-text11">
                        <div class="M-body-ProjectEmployment-left-word">
                            <div class="M-body-ProjectEmployment-left-word-text">Công việc tương tự</div>
                            <div id="left">
                                <div class="M-body-ProjectEmployment-left-word-option">
                                    <div id="text1">Edit video cho thuyết trình</div>
                                    <div id="text2"><img src="../image/icon/icon7.png" alt=""> Thiết kế</div>
                                    <div id="text3"><img src="../image/icon/Vector (2).png" alt=""> 300.000đ/giờ</div>
                                </div>
                                <div class="M-body-ProjectEmployment-left-word-option">
                                    <div id="text1">Edit video cho thuyết trình</div>
                                    <div id="text2"><img src="../image/icon/icon7.png" alt=""> Thiết kế</div>
                                    <div id="text3"><img src="../image/icon/Vector (2).png" alt=""> 300.000đ/giờ</div>
                                </div>
                                <div class="M-body-ProjectEmployment-left-word-option">
                                    <div id="text1">Edit video cho thuyết trình</div>
                                    <div id="text2"><img src="../image/icon/icon7.png" alt=""> Thiết kế</div>
                                    <div id="text3"><img src="../image/icon/Vector (2).png" alt=""> 300.000đ/giờ</div>
                                </div>
                            </div>
                            <div id="right">
                                <div class="M-body-ProjectEmployment-left-word-option">
                                    <div id="text1">Edit video cho thuyết trình</div>
                                    <div id="text2"><img src="../image/icon/icon7.png" alt=""> Thiết kế</div>
                                    <div id="text3"><img src="../image/icon/Vector (2).png" alt=""> 300.000đ/giờ</div>
                                </div>
                                <div class="M-body-ProjectEmployment-left-word-option">
                                    <div id="text1">Edit video cho thuyết trình</div>
                                    <div id="text2"><img src="../image/icon/icon7.png" alt=""> Thiết kế</div>
                                    <div id="text3"><img src="../image/icon/Vector (2).png" alt=""> 300.000đ/giờ</div>
                                </div>
                                <div class="M-body-ProjectEmployment-left-word-option">
                                    <div id="text1">Edit video cho thuyết trình</div>
                                    <div id="text2"><img src="../image/icon/icon7.png" alt=""> Thiết kế</div>
                                    <div id="text3"><img src="../image/icon/Vector (2).png" alt=""> 300.000đ/giờ</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Phần chân trang  -->
        <?php
            include_once "inc_footer.php";
        ?>
   </div>
</div>
</body>
</html>