<?php
     include_once 'config.php';
    //  if (!isset($_COOKIE['UID'])) {
    //     if ($_COOKIE['UT'] == 0){
    //         header('location: index.php');
    //     }elseif($_COOKIE['UT'] == 1){
    //         header('location :PostProject.php');
    //     }
        
    //  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<? echo $domain?>/image/icon/fa-icon/css/all.css">
    <link rel="stylesheet" type="text/css" href="<? echo $domain?>/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<? echo $domain?>/css/slick-theme.css"/>
    <link rel="stylesheet" href="<? echo $domain?>/css/GiangCSS/All.css">
    <link rel="stylesheet" href="<? echo $domain?>/css/all.css">
    
</head>
<body>
    <?php
    $indexHeader = 1;
    include_once 'head-index.php';
    ?>
            <div class="M-bodyhead-1 ">
                <div class="M-bodyhead-11">
                    <h1>Việc làm freelancer - Làm online, nhận tiền nhanh chóng</h1>
                    <p>Hơn <big>32467</big> dự án đã đăng và thuê được freelancer thành công.
                        Chất lượng dự án được đảm bảo, ứng viên freelancer hàng đầu</p>
                </div>
            </div>
            <?php  
                include_once 'search-job.php' 
            ?>
            <div class="M-bodyhead-4">
                <div class="M-bodyhead-41">
                    <div class="button1">
                        <img src="<? echo $domain?>/image/icon/icon11.png" alt="">
                        <a href="">
                            Tải app Timviec365
                        </a>
                    </div>
                    <div class="button2">
                        <img src="<? echo $domain?>/image/icon/icon12.png" alt="">
                        <a href="">
                            Tải app CV365
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="M-body">
                        <div class="M-body-1">
                            <div class="M-body-11">
                                <img src="<? echo $domain?>/image/img/Frame.png" alt="">
                                <p>Việc Freelancer theo ngành nghề</p>
                            </div>
                            <div class="M-body-12">
                                <div class="box">
                                <div id="img">
                                        <img src="<? echo $domain?>/image/img/web-development 1.png" alt="">
                                        <hr>
                                </div>
                                    <div id="a">
                                        <a href="#">IT & Lập trình</a>
                                    </div>
                                </div>
                                <div  class="box">
                                <div id="img">
                                        <img src="<? echo $domain?>/image/img/school 1.png" alt="">
                                        <hr>
                                </div>
                                    <div id="a">
                                        <a href="#">Thiết kế</a>
                                    </div>
                                </div>
                                <div  class="box">
                                    <div id="img">
                                        <img src="<? echo $domain?>/image/img/paper 1.png" alt="">
                                        <hr>
                                </div>
                                    <div id="a">
                                        <a href="#">Viết lách & Dịch thuật</a>
                                    </div>
                                </div>
                                <div  class="box">
                                    <div id="img">
                                        <img src="<? echo $domain?>/image/img/monitor (1) 1.png" alt="">
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
                                        <img src="<? echo $domain?>/image/img/business-and-finance 1.png" alt="">
                                        <hr>
                                </div>
                                    <div id="a">
                                        <a href="#">Kế toán, Thuế & Luật</a>
                                    </div>
                                </div>
                                <div  class="box">
                                <div id="img">
                                        <img src="<? echo $domain?>/image/img/sketch 1.png" alt="">
                                        <hr>
                                </div>
                                    <div id="a">
                                        <a href="#">Kiến trúc & Xây dựng</a>
                                    </div>
                                </div>
                                <div  class="box">
                                    <div id="img">
                                        <img src="<? echo $domain?>/image/img/video 1.png" alt="">
                                        <hr>
                                </div>
                                    <div id="a">
                                        <a href="#">Video</a>
                                    </div>
                                </div>
                                <div  class="box">
                                    <div id="img">
                                        <img src="<? echo $domain?>/image/img/2e60c7eff0955e9ac56ca03ccdba3b3f 1.png" alt="">
                                        <hr>
                                </div>
                                    <div id="a">
                                        <a href="#">Lĩnh vực khác</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="M-body-2">
                            <div class="M-body-21">
                                <img src="<? echo $domain?>/image/img/Frame.png" alt="">
                                <p>Việc làm Freelancer theo dự án</p>
                            </div>
                            <div class="M-body-22" style="margin-bottom:20px">
                                    <div class="box">
                                                <div class="top1">
                                                    <div id="img">
                                                        <img src="<? echo $domain?>/image/img/Group 2076.png" alt="67x67">
                                                    </div>
                                                    <div id="right1">
                                                        <div id="text1">
                                                            <p>Thiết kế logo và bộ nhận diện thương hiệu theo yêu cầu của khách hàng </p>
                                                        </div>
                                                        <div id="text2">
                                                            <p>Nguyễn Hoàng Linh</p>
                                                        </div>
                                                        <div id="text3">
                                                            <p><i class="fas fa-map-marker-alt" ></i> Thanh Xuân, Hà Nội</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="body2">
                                                    <div class="top2">
                                                        <div id="text1">
                                                            <p>Freelancer</p>
                                                        </div>
                                                        <div id="text2">
                                                            <img src="<? echo $domain?>/image/icon/money 1.png" alt="">
                                                            <p>500.000đ </p>
                                                        </div>
                                                    </div>
                                                    <div class="bottom2">
                                                        <p>Mình đang làm về ngành đào tạo phát triển bản thân. muốn có bộ nhận diện thgương hiệu . Tên công ty mình là " công ty TNHH Hoàng Hà”...</p>
                                                    </div>
                                                    <div class="footer2">
                                                        <div id="text1">
                                                            <p>Photoshop</p>
                                                        </div>
                                                        <div id="text1">
                                                            <p>InDesign</p>
                                                        </div>
                                                        <div id="text1">
                                                            <p>Illustrator</p>
                                                        </div>
                                                        <div id="textend">
                                                            <p>+1</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="button">
                                                    <div class="button1">
                                                        <a href="">Đặt giá</a>
                                                    </div>
                                                    <div class="button2">
                                                        <a href="">Xem chi tiết</a>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="box">
                                                <div class="top1">
                                                    <div id="img">
                                                        <img src="<? echo $domain?>/image/img/Group 2076.png" alt="67x67">
                                                    </div>
                                                    <div id="right1">
                                                        <div id="text1">
                                                            <p>Thiết kế logo và bộ nhận diện thương hiệu theo yêu cầu của khách hàng </p>
                                                        </div>
                                                        <div id="text2">
                                                            <p>Nguyễn Hoàng Linh</p>
                                                        </div>
                                                        <div id="text3">
                                                            <p><i class="fas fa-map-marker-alt" ></i> Thanh Xuân, Hà Nội</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="body2">
                                                    <div class="top2">
                                                        <div id="text1">
                                                            <p>Freelancer</p>
                                                        </div>
                                                        <div id="text2">
                                                            <img src="<? echo $domain?>/image/icon/money 1.png" alt="">
                                                            <p>500.000đ </p>
                                                        </div>
                                                    </div>
                                                    <div class="bottom2">
                                                        <p>Mình đang làm về ngành đào tạo phát triển bản thân. muốn có bộ nhận diện thgương hiệu . Tên công ty mình là " công ty TNHH Hoàng Hà”<? echo $domain?>.</p>
                                                    </div>
                                                    <div class="footer2">
                                                        <div id="text1">
                                                            <p>Photoshop</p>
                                                        </div>
                                                        <div id="text1">
                                                            <p>InDesign</p>
                                                        </div>
                                                        <div id="text1">
                                                            <p>Illustrator</p>
                                                        </div>
                                                        <div id="textend">
                                                            <p>+1</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="button">
                                                    <div class="button1">
                                                        <a href="">Đặt giá</a>
                                                    </div>
                                                    <div class="button2">
                                                        <a href="">Xem chi tiết</a>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="box">
                                                <div class="top1">
                                                    <div id="img">
                                                        <img src="<? echo $domain?>/image/img/Group 2076.png" alt="67x67">
                                                    </div>
                                                    <div id="right1">
                                                        <div id="text1">
                                                            <p>Thiết kế logo và bộ nhận diện thương hiệu theo yêu cầu của khách hàng </p>
                                                        </div>
                                                        <div id="text2">
                                                            <p>Nguyễn Hoàng Linh</p>
                                                        </div>
                                                        <div id="text3">
                                                            <p><i class="fas fa-map-marker-alt" ></i> Thanh Xuân, Hà Nội</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="body2">
                                                    <div class="top2">
                                                        <div id="text1">
                                                            <p>Freelancer</p>
                                                        </div>
                                                        <div id="text2">
                                                            <img src="<? echo $domain?>/image/icon/money 1.png" alt="">
                                                            <p>500.000đ </p>
                                                        </div>
                                                    </div>
                                                    <div class="bottom2">
                                                        <p>Mình đang làm về ngành đào tạo phát triển bản thân. muốn có bộ nhận diện thgương hiệu . Tên công ty mình là " công ty TNHH Hoàng Hà”<? echo $domain?>.</p>
                                                    </div>
                                                    <div class="footer2">
                                                        <div id="text1">
                                                            <p>Photoshop</p>
                                                        </div>
                                                        <div id="text1">
                                                            <p>InDesign</p>
                                                        </div>
                                                        <div id="text1">
                                                            <p>Illustrator</p>
                                                        </div>
                                                        <div id="textend">
                                                            <p>+1</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="button">
                                                    <div class="button1">
                                                        <a href="">Đặt giá</a>
                                                    </div>
                                                    <div class="button2">
                                                        <a href="">Xem chi tiết</a>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="box">
                                                <div class="top1">
                                                    <div id="img">
                                                        <img src="<? echo $domain?>/image/img/Group 2076.png" alt="67x67">
                                                    </div>
                                                    <div id="right1">
                                                        <div id="text1">
                                                            <p>Thiết kế logo và bộ nhận diện thương hiệu theo yêu cầu của khách hàng </p>
                                                        </div>
                                                        <div id="text2">
                                                            <p>Nguyễn Hoàng Linh</p>
                                                        </div>
                                                        <div id="text3">
                                                            <p><i class="fas fa-map-marker-alt" ></i> Thanh Xuân, Hà Nội</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="body2">
                                                    <div class="top2">
                                                        <div id="text1">
                                                            <p>Freelancer</p>
                                                        </div>
                                                        <div id="text2">
                                                            <img src="<? echo $domain?>/image/icon/money 1.png" alt="">
                                                            <p>500.000đ </p>
                                                        </div>
                                                    </div>
                                                    <div class="bottom2">
                                                        <p>Mình đang làm về ngành đào tạo phát triển bản thân. muốn có bộ nhận diện thgương hiệu . Tên công ty mình là " công ty TNHH Hoàng Hà”<? echo $domain?>.</p>
                                                    </div>
                                                    <div class="footer2">
                                                        <div id="text1">
                                                            <p>Photoshop</p>
                                                        </div>
                                                        <div id="text1">
                                                            <p>InDesign</p>
                                                        </div>
                                                        <div id="text1">
                                                            <p>Illustrator</p>
                                                        </div>
                                                        <div id="textend">
                                                            <p>+1</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="button">
                                                    <div class="button1">
                                                        <a href="">Đặt giá</a>
                                                    </div>
                                                    <div class="button2">
                                                        <a href="">Xem chi tiết</a>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="box">
                                                <div class="top1">
                                                    <div id="img">
                                                        <img src="<? echo $domain?>/image/img/Group 2076.png" alt="67x67">
                                                    </div>
                                                    <div id="right1">
                                                        <div id="text1">
                                                            <p>Thiết kế logo và bộ nhận diện thương hiệu theo yêu cầu của khách hàng </p>
                                                        </div>
                                                        <div id="text2">
                                                            <p>Nguyễn Hoàng Linh</p>
                                                        </div>
                                                        <div id="text3">
                                                            <p><i class="fas fa-map-marker-alt" ></i> Thanh Xuân, Hà Nội</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="body2">
                                                    <div class="top2">
                                                        <div id="text1">
                                                            <p>Freelancer</p>
                                                        </div>
                                                        <div id="text2">
                                                            <img src="<? echo $domain?>/image/icon/money 1.png" alt="">
                                                            <p>500.000đ </p>
                                                        </div>
                                                    </div>
                                                    <div class="bottom2">
                                                        <p>Mình đang làm về ngành đào tạo phát triển bản thân. muốn có bộ nhận diện thgương hiệu . Tên công ty mình là " công ty TNHH Hoàng Hà”<? echo $domain?>.</p>
                                                    </div>
                                                    <div class="footer2">
                                                        <div id="text1">
                                                            <p>Photoshop</p>
                                                        </div>
                                                        <div id="text1">
                                                            <p>InDesign</p>
                                                        </div>
                                                        <div id="text1">
                                                            <p>Illustrator</p>
                                                        </div>
                                                        <div id="textend">
                                                            <p>+1</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="button">
                                                    <div class="button1">
                                                        <a href="">Đặt giá</a>
                                                    </div>
                                                    <div class="button2">
                                                        <a href="">Xem chi tiết</a>
                                                    </div>
                                                </div>
                                    </div>
                        
                            </div>
                            <div class="M-body-23">
                                <a href="">Xem tất cả →</a>
                            </div>         
                        </div>
                        <div class="M-body-3">
                            <div class="M-body-31">
                                <img src="<? echo $domain?>/image/img/Frame.png" alt="">
                                <p>Việc làm Freelancer theo bán thời gian</p>
                            </div>
                            <div class="M-body-32">
                                <div class="M-box-32">
                                    <div class="img-box-32" >
                                        <img src="<? echo $domain?>/image/img/Group 2046.png" alt="">
                                    </div>
                                    <div class="text1-box-32">
                                        <p>Tìm coder thiết kế website chủ yếu là Landing Page</p>
                                        <div class="button">
                                            <a href="">Đặt giá</a>
                                        </div>
                                    </div>
                                    <div class="text2-box-32">
                                        <p id="text1">Nguyễn Hoàng Minh Anh</p>
                                        
                                        <p id="text2"><i class="fas fa-map-marker-alt" ></i>Thanh Xuân, Hà Nội</p>
                                    </div>
                                    <div class="text3-box-32">
                                        <div class="left-box-32">
                                            <div>
                                                <b>Bán thời gian</b>
                                            </div>
                                            <img src="<? echo $domain?>/image/icon/money 1.png" alt="">
                                            <p>200.000đ/giờ</p>
                                        </div>
                                        <div class="right-box-32">
                                            <div>
                                                <p id="text1">Kỹ năng:</p>
                                                <ul>
                                                    <li>
                                                        <p>SEO</p>
                                                    </li>
                                                    <li>
                                                        <p>Bán hàng</p>
                                                    </li>
                                                    <li>
                                                        <p>Quảng cáo</p>
                                                    </li>
                                                    <!-- <li>
                                                        <p>Quảng cáo Facebook</p>
                                                    </li> -->
                                                    <li  id="text2">
                                                        <p>+2</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>               
                                </div>
                                <div class="M-box-32">
                                    <div class="img-box-32" >
                                        <img src="<? echo $domain?>/image/img/Group 2046.png" alt="">
                                    </div>
                                    <div class="text1-box-32">
                                        <p>Tìm coder thiết kế website chủ yếu là Landing Page</p>
                                        <div class="button">
                                            <a href="">Đặt giá</a>
                                        </div>
                                    </div>
                                    <div class="text2-box-32">
                                        <p id="text1">Nguyễn Hoàng Minh Anh</p>
                                        <i class="fas fa-map-marker-alt" ></i>
                                        <p id="text2">Thanh Xuân, Hà Nội</p>
                                    </div>
                                    <div class="text3-box-32">
                                        <div class="left-box-32">
                                            <div>
                                                <b>Bán thời gian</b>
                                            </div>
                                            <img src="<? echo $domain?>/image/icon/money 1.png" alt="">
                                            <p>200.000đ/giờ</p>
                                        </div>
                                        <div class="right-box-32">
                                            <div>
                                                <p id="text1">Kỹ năng:</p>
                                                <ul>
                                                    <li>
                                                        <p>SEO</p>
                                                    </li>
                                                    <li>
                                                        <p>Bán hàng</p>
                                                    </li>
                                                    <li>
                                                        <p>Quảng cáo</p>
                                                    </li>
                                                    <!-- <li>
                                                        <p>Quảng cáo Facebook</p>
                                                    </li> -->
                                                    <li  id="text2">
                                                        <p>+2</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>               
                                </div>
                                <div class="M-box-32">
                                    <div class="img-box-32" >
                                        <img src="<? echo $domain?>/image/img/Group 2046.png" alt="">
                                    </div>
                                    <div class="text1-box-32">
                                        <p>Tìm coder thiết kế website chủ yếu là Landing Page</p>
                                        <div class="button">
                                            <a href="">Đặt giá</a>
                                        </div>
                                    </div>
                                    <div class="text2-box-32">
                                        <p id="text1">Nguyễn Hoàng Minh Anh</p>
                                        <i class="fas fa-map-marker-alt" ></i>
                                        <p id="text2">Thanh Xuân, Hà Nội</p>
                                    </div>
                                    <div class="text3-box-32">
                                        <div class="left-box-32">
                                            <div>
                                                <b>Bán thời gian</b>
                                            </div>
                                            <img src="<? echo $domain?>/image/icon/money 1.png" alt="">
                                            <p>200.000đ/giờ</p>
                                        </div>
                                        <div class="right-box-32">
                                            <div>
                                                <p id="text1">Kỹ năng:</p>
                                                <ul>
                                                    <li>
                                                        <p>SEO</p>
                                                    </li>
                                                    <li>
                                                        <p>Bán hàng</p>
                                                    </li>
                                                    <li>
                                                        <p>Quảng cáo</p>
                                                    </li>
                                                    <!-- <li>
                                                        <p>Quảng cáo Facebook</p>
                                                    </li> -->
                                                    <li  id="text2">
                                                        <p>+2</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>               
                                </div>
                                <div class="M-box-32">
                                    <div class="img-box-32" >
                                        <img src="<? echo $domain?>/image/img/Group 2046.png" alt="">
                                    </div>
                                    <div class="text1-box-32">
                                        <p>Tìm coder thiết kế website chủ yếu là Landing Page</p>
                                        <div class="button">
                                            <a href="">Đặt giá</a>
                                        </div>
                                    </div>
                                    <div class="text2-box-32">
                                        <p id="text1">Nguyễn Hoàng Minh Anh</p>
                                        <i class="fas fa-map-marker-alt" ></i>
                                        <p id="text2">Thanh Xuân, Hà Nội</p>
                                    </div>
                                    <div class="text3-box-32">
                                        <div class="left-box-32">
                                            <div>
                                                <b>Bán thời gian</b>
                                            </div>
                                            <img src="<? echo $domain?>/image/icon/money 1.png" alt="">
                                            <p>200.000đ/giờ</p>
                                        </div>
                                        <div class="right-box-32">
                                            <div>
                                                <p id="text1">Kỹ năng:</p>
                                                <ul>
                                                    <li>
                                                        <p>SEO</p>
                                                    </li>
                                                    <li>
                                                        <p>Bán hàng</p>
                                                    </li>
                                                    <li>
                                                        <p>Quảng cáo</p>
                                                    </li>
                                                    <!-- <li>
                                                        <p>Quảng cáo Facebook</p>
                                                    </li> -->
                                                    <li  id="text2">
                                                        <p>+2</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>               
                                </div>
                                <div class="M-box-32">
                                    <div class="img-box-32" >
                                        <img src="<? echo $domain?>/image/img/Group 2046.png" alt="">
                                    </div>
                                    <div class="text1-box-32">
                                        <p>Tìm coder thiết kế website chủ yếu là Landing Page</p>
                                        <div class="button">
                                            <a href="">Đặt giá</a>
                                        </div>
                                    </div>
                                    <div class="text2-box-32">
                                        <p id="text1">Nguyễn Hoàng Minh Anh</p>
                                        <i class="fas fa-map-marker-alt" ></i>
                                        <p id="text2">Thanh Xuân, Hà Nội</p>
                                    </div>
                                    <div class="text3-box-32">
                                        <div class="left-box-32">
                                            <div>
                                                <b>Bán thời gian</b>
                                            </div>
                                            <img src="<? echo $domain?>/image/icon/money 1.png" alt="">
                                            <p>200.000đ/giờ</p>
                                        </div>
                                        <div class="right-box-32">
                                            <div>
                                                <p id="text1">Kỹ năng:</p>
                                                <ul>
                                                    <li>
                                                        <p>SEO</p>
                                                    </li>
                                                    <li>
                                                        <p>Bán hàng</p>
                                                    </li>
                                                    <li>
                                                        <p>Quảng cáo</p>
                                                    </li>
                                                    <!-- <li>
                                                        <p>Quảng cáo Facebook</p>
                                                    </li> -->
                                                    <li  id="text2">
                                                        <p>+2</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>               
                                </div>
                                <div class="M-box-32">
                                    <div class="img-box-32" >
                                        <img src="<? echo $domain?>/image/img/Group 2046.png" alt="">
                                    </div>
                                    <div class="text1-box-32">
                                        <p>Tìm coder thiết kế website chủ yếu là Landing Page</p>
                                        <div class="button">
                                            <a href="">Đặt giá</a>
                                        </div>
                                    </div>
                                    <div class="text2-box-32">
                                        <p id="text1">Nguyễn Hoàng Minh Anh</p>
                                        <i class="fas fa-map-marker-alt" ></i>
                                        <p id="text2">Thanh Xuân, Hà Nội</p>
                                    </div>
                                    <div class="text3-box-32">
                                        <div class="left-box-32">
                                            <div>
                                                <b>Bán thời gian</b>
                                            </div>
                                            <img src="<? echo $domain?>/image/icon/money 1.png" alt="">
                                            <p>200.000đ/giờ</p>
                                        </div>
                                        <div class="right-box-32">
                                            <div>
                                                <p id="text1">Kỹ năng:</p>
                                                <ul>
                                                    <li>
                                                        <p>SEO</p>
                                                    </li>
                                                    <li>
                                                        <p>Bán hàng</p>
                                                    </li>
                                                    <li>
                                                        <p>Quảng cáo</p>
                                                    </li>
                                                    <!-- <li>
                                                        <p>Quảng cáo Facebook</p>
                                                    </li> -->
                                                    <li  id="text2">
                                                        <p>+2</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>               
                                </div>
                            </div>
                            <div class="M-body-33">
                                <a href="">Xem tất cả →</a>
                            </div>   
                        </div>
                        <div class="M-body-4">
                            <div class="M-body-41">
                                <div class="text-body-41">
                                    <p id="text1">Việc làm freelancer - Làm online, nhận tiền nhanh chóng</p>
                                    <p id="text2">Hàng trăm việc làm tuyển dụng, lương lên đến 50 triệu đồng / tháng.</p>
                                    <p id="text2">Ký hợp đồng và nhận thanh toán trực tiếp với công ty đăng tuyển</p>
                                </div>
                            </div>
                            <div class="M-body-42">
                                <div class="box1-body-42">
                                    <div id="box-top">
                                        <img src="<? echo $domain?>/image/img/start-button 1.png" alt="">
                                        <div>
                                            <b>8500</b>
                                            <p>Dự án</p>
                                        </div>
                                    </div>
                                    <div id="box-bottom">
                                        <img src="<? echo $domain?>/image/img/company 1.png" alt="">
                                        <div>
                                            <b>2360</b>
                                            <p>Công ty</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="box2-body-42">
                                    <div id="box-top">
                                    <img src="<? echo $domain?>/image/icon/icon14.png" alt="">
                                        <div>
                                            <b>6532</b>
                                            <p>Hồ sơ</p>
                                        </div>
                                    </div>
                                    <div id="box-bottom">
                                        <img src="<? echo $domain?>/image/icon/icon15.png" alt="">
                                        <div>
                                            <b>9532</b>
                                            <p>Việc đang thuê</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="M-body-5">
                            <div class="M-body-51">
                                <img src="<? echo $domain?>/image/img/Frame.png" alt="">
                                <p>Việc làm Freelancer theo bán thời gian</p>
                            </div>
                            <div class="M-body-52">
                                <div class="text">
                                    <p id="text1">Đáp ứng nhu cầu tìm việc ngay lập tức</p>
                                    <p id="text2">Hàng trăm việc làm tuyển dụng, lương lên đến 50 triệu đồng / tháng.
                                                Ký hợp đồng và nhận thanh toán trực tiếp với công ty đăng tuyển.</p>
                                </div>
                            </div>
                            <div class="M-body-53">
                                <div class="text">
                                    <p id="text1">Lọc làm phù hợp với bạn</p>
                                    <p id="text2">- Nguồn việc làm phong phú, đa dạng nhiều nghành nghề, lĩnh vực.
                                                    - Công cụ sàng lọc đơn giản, Lọc việc làm theo ngành nghề, tỉnh thành, kỹ năng phù hợp với nhu cầu người dùng</p>
                                </div>
                            </div>
                            <div class="M-body-54">
                                <div class="text">
                                    <p id="text1">Hỗ trợ 24/7</p>
                                    <p id="text2">Đội ngũ chăm sóc khách hàng 24/7 luôn sẵn sàng hỗ trợ bạn để giải quyết các vấn đề cấp bách, giúp bạn tìm được công việc mong muốn.</p>
                                </div>
                            </div>
                            <div class="M-body-55">
                                <div class="text-tablet">
                                    <p id="text1-tablet">Người dùng nói gì về Timviec365.com?</p>
                                    <p id="text2-tablet">Hãy lắng nghe điều đó từ những người có cuộc sống đã thay đổi nhờ làm việc trên Timviec365.com
                                            Đây là một số dịch giả tự do đáng tự hào của chúng tôi, những người đã xây dựng bản thân thông qua Timviec365.com</p>   
                                </div>
                                <div class="img-body-55">
                                    <div class="left-body-55" >
                                        <div> 
                                            <img src="../image/img/Ellipse 71.png" alt="">
                                            <p class="text1">Hoàng Nhiên</p>
                                            <p class="text2">"Điều tuyệt vời nhất mà Timviec365 mang lại là sự độc lập khi làm việc”</p>
                                        </div>
                                        <div>
                                            <img src="../image/img/Ellipse 71 (1).png" alt="">
                                            <p class="text1">Nguyễn Nam</p>
                                            <p class="text2">“Tôi có thể làm việc ở bất kỳ nơi nào trên thế giới, ngay cả trên con thuyền giữa biển."</p>
                                        </div>
                                    </div>
                                    <div class="right-body-55">
                                        <div>
                                            <img src="../image/img/Ellipse 71 (2).png" alt="">
                                            <p class="text1">Hoàng Duy</p>
                                            <p class="text2">"Số tiền kiếm được từ Freelancer là rất lớn.Timviec365 đã hỗ trợ tôi trong những năm gần đây."</p>
                                        </div>
                                        <div>
                                            <img src="../image/img/Ellipse 71 (3).png" alt="">
                                            <p class="text1">Hà Anh</p>
                                            <p class="text2">“Timviec365.com đã giúp tôi tìm thấy công việc phù hợp nhất”</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="text">
                                    <p id="text1">Người dùng nói gì về Timviec365.com?</p>
                                    <p id="text2">- Nguồn việc làm phong phú, đa dạng nhiều nghành nghề, lĩnh vực.
                                                    - Công cụ sàng lọc đơn giản, Lọc việc làm theo ngành nghề, tỉnh thành, kỹ năng phù hợp với nhu cầu người dùng</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
        </div>
    </div>
    
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="<? echo $domain?>/js/slick.min.js"></script>
<script src="<? echo $domain?>/js/all.js"></script>
<script>
        $('.M-body-22').slick({
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll:3,
            responsive: [
                {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
                },
                {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
                },
                {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
                }
            ]
            });
        // $('.M-body-22').slick({
        //     infinite: false,
        //     slidesToShow: 3,
        //     slidesToScroll: 3,
        //     responsive:[
        //     {
        //         breakpoint: 1024,
        //         settings: {
        //         infinite: false,
        //         slidesToShow: 1,
        //         slidesToScroll: 1
        //     }
        //     }
        // ]
        // });
        
        
    </script>
</html>