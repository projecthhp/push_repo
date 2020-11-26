<?php 
    include_once 'config.php';
   if (isset($_COOKIE['UID'])) {
       $UID = $_COOKIE['UID']; 
       $name = $_COOKIE['name_ntd'];
        $sql ="select * from flc_viec_lam
         inner join flc_user_ntd on flc_viec_lam.ma_nguoi_dang=flc_user_ntd.ma_ntd
         where ma_nguoi_dang = $UID";
        $db_qr = new db_query($sql);
    
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Việc làm đã đăng</title>
      <!-- CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
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
   <div class="JobFreelancer">
        <?php
            include_once "head-index.php";
        ?>
         <div class="M-header-tablet" id="M-header-tablet-job-freelancer">
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
                    <li><a href="">Trang chủ</a></li>
                    <li>/</li>
                    <li><a href="">Việc làm Freelancer theo dự án</a></li>
                    <li>/</li>
                    <li><a href="">Thiết kế</a></li>
                </ul>
            </div>
        </div>
        <div class="M-body-job-freelancer">
            <div class="M-body-job-freelancer-top-left">
                <img src="../image/img/Group 2142 (1).png" alt="">
            </div>
            <div class="M-body-job-freelancer-top-right">
                <div class="M-body-job-freelancer-top-right-text1">Hoàng Thị Thùy Dung</div>
                <div class="M-body-job-freelancer-top-right-text2">
                    <div id="text">
                        <img src="../image/icon/dot 1 (1).png" alt="">
                        Hồ Chí Minh
                    </div>
                    <div id="text1"><i class="fas fa-phone-alt"></i><p  data-toggle="modal" data-target="#modelSdt" onclick="change_name1()">Đăng nhập để xem SĐT</p> </div>
                    <div id="text2"><i class="fas fa-envelope-open-text"></i><p id="change_sdt" data-toggle="modal" data-target="#modelSdt" onclick="change_name()">Đăng nhập để xem Email</p>
                        <!-- Modal -->
                        <div class="modal fade" id="modelSdt" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text1">
                                            <p id="text1_modal_change">Đăng nhập để xem Số điện thoại</p>
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
            </div>
            <div class="M-body-job-freelancer-content">
                Có <big style="color: #F8971C;">12</big> việc đã đăng
            </div>
            <?php
                While($row = mysql_fetch_assoc($db_qr->result)){
            ?>
                <div class="M-body-job-freelancer-content1">
                    <div class="M-body-job-freelancer-content1-top">
                        <div id="left"><img src="../image/img/Group 2077.png" alt=""></div>
                        <div id="right">
                            <div class="text1"><?php  echo $row["ten_viec_lam"]  ?>
                                <div id="text">
                                    <i class="fas fa-heart" id="mau_cam" onclick="change_color()" ></i>
                                    <a href="">Đặt giá</a>
                                </div>
                            </div>
                            <div class="text2">  <?php echo $row["ten_ntd"] ?>  </div>
                            <div class="text3">
                                <p><img src="../image/img/work 1.png" alt="">
                                    <?php
                                        $arr_linh_vuc = explode(",",$row['linh_vuc']);
                                        foreach ($array_nganh_nghe as $key => $value) {
                                           echo $value[$row['linh_vuc']];
                                       }
                                    ?>
                                </p>
                                <p id="text2"><i class="fas fa-map-marker-alt"></i>
                                    <?php
                                        $arr_diadiem = explode(",", $row['noi_lam_viec']);
                                        foreach ($arr_diadiem as $key => $value) {
                                            $sql ="select * from city where cit_id = $value";
                                                $db_qr = new db_query($sql);
                                                $row1 = mysql_fetch_assoc($db_qr->result);
                                                echo $row1['cit_name'] .",  ";
                                        }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="text1">
                        <div id="button">Bán thời gian</div>
                        <div id="text1"><i class="far fa-dollar-sign"></i><?php
                           echo $row["chi_phi"] ."/" ;
                            $chi_phi = $row['chi_phi_theo_ngay'];
                           if ($chi_phi == 1) {
                               echo "Ngày";
                           }elseif ($chi_phi == 2){
                                echo "Tuần";
                           }elseif ($chi_phi == 3){
                               echo "Tháng";
                           }elseif ($chi_phi == 4){
                            echo "Năm";
                        }
                        ?></div>
                        <div id="text2"><strong>Chưa làm đặt giá nên cứ để đây đã</strong> lượt đặt giá</div>
                        <div id="text3"><strong>Hết hạn: </strong><?php
                             echo date('d-m-Y',$row['ngay_dat_gia_ket_thuc']);
                        ?></div>
                    </div>
                    <div class="text2"><?php
                        echo $row['mo_ta'];
                    ?></div>
                    <div class="text3">
                        Kỹ năng:
                        <div id="">PHP</div>
                        <div id="">Chưa có DB nên chưa đổ được</div>
                        <!-- <div id="">Wordpress</div> -->
                        <!-- <div id="">WooCommerce</div>
                        <div id="">Code</div> -->
                        <!-- <div id="">Graphic Design</div>
                        <div id="">WooCommerce</div>
                        <div id="">Graphic Design</div>-->
                        <div id="end">+2</div>
                    </div>
                </div>
            <?php
                 }
            ?>
            <div class="M-body-job-freelancer-content2">
                Xem thêm <i class="far fa-angle-double-down"></i>
            </div>
            <div class="M-body-job-freelancer-content1-mobile">
                <div class="M-body-job-freelancer-content1-mobile-left-img">
                    <img src="../image/img/Group 2076.png" alt="">
                </div>
                <div class="M-body-job-freelancer-content1-mobile-right-text">
                    Sửa code plugin theo đúng chuẩn wordpress, theo yêu cầu của công ty.demo cắt chuỗi dòng nếu quá dài
                </div>
                <div class="M-body-job-freelancer-content1-mobile1">
                    <div id="text1">Nguyễn Hồng Ánh</div>
                    <div id="text2">
                        <i class="fas fa-heart" id="mau_cam" onclick="change_color()"></i>
                        <a href="">Đặt giá</a>
                    </div>
                </div>
                <div class="M-body-job-freelancer-content1-mobile2">
                    <div id="text1"><img src="../image/img/work 1.png" alt="">Lập trình phần mềm</div>
                    <div id="text2"><i class="fas fa-map-marker-alt"></i> Hồ Chí Minh</div>
                </div>
                <div class="M-body-job-freelancer-content1-mobile3">
                    <div id="text1">Dự án</div>
                    <div id="text2"><i class="far fa-dollar-sign"></i>  500.000đ/giờ</div>
                </div>
                <div class="M-body-job-freelancer-content1-mobile4">
                    Hi anh chị freelancer, Tôi cần tìm 1 wordpress expert giúp sửa code 1 plugin theo đúng chuẩn Worpress để có thể submit plugin lên Wordpres plugin, Hi... Demo cắt chuỗi
                </div>
                <div class="M-body-job-freelancer-content1-mobile5">
                    <div id="text">Photoshop</div>
                    <div id="text">InDesign</div>
                    <div id="text">Illustrator</div>
                    <div id="text-end">+6</div>
                </div>
            </div>
            <div class="M-body-job-freelancer-content1-mobile">
                <div class="M-body-job-freelancer-content1-mobile-left-img">
                    <img src="../image/img/Group 2076.png" alt="">
                </div>
                <div class="M-body-job-freelancer-content1-mobile-right-text">
                    Sửa code plugin theo đúng chuẩn wordpress, theo yêu cầu của công ty.demo cắt chuỗi dòng nếu quá dài
                </div>
                <div class="M-body-job-freelancer-content1-mobile1">
                    <div id="text1">Nguyễn Hồng Ánh</div>
                    <div id="text2">
                        <i class="fas fa-heart" id="mau_cam" onclick="change_color()"></i>
                        <a href="">Đặt giá</a>
                    </div>
                </div>
                <div class="M-body-job-freelancer-content1-mobile2">
                    <div id="text1"><img src="../image/img/work 1.png" alt="">Lập trình phần mềm</div>
                    <div id="text2"><i class="fas fa-map-marker-alt"></i> Hồ Chí Minh</div>
                </div>
                <div class="M-body-job-freelancer-content1-mobile3">
                    <div id="text1">Dự án</div>
                    <div id="text2"><i class="far fa-dollar-sign"></i>  500.000đ/giờ</div>
                </div>
                <div class="M-body-job-freelancer-content1-mobile4">
                    Hi anh chị freelancer, Tôi cần tìm 1 wordpress expert giúp sửa code 1 plugin theo đúng chuẩn Worpress để có thể submit plugin lên Wordpres plugin, Hi... Demo cắt chuỗi
                </div>
                <div class="M-body-job-freelancer-content1-mobile5">
                    <div id="text">Photoshop</div>
                    <div id="text">InDesign</div>
                    <div id="text">Illustrator</div>
                    <div id="text-end">+6</div>
                </div>
            </div>
            <div class="M-body-job-freelancer-content1-mobile">
                <div class="M-body-job-freelancer-content1-mobile-left-img">
                    <img src="../image/img/Group 2076.png" alt="">
                </div>
                <div class="M-body-job-freelancer-content1-mobile-right-text">
                    Sửa code plugin theo đúng chuẩn wordpress, theo yêu cầu của công ty.demo cắt chuỗi dòng nếu quá dài
                </div>
                <div class="M-body-job-freelancer-content1-mobile1">
                    <div id="text1">Nguyễn Hồng Ánh</div>
                    <div id="text2">
                        <i class="fas fa-heart" id="mau_cam" onclick="change_color()"></i>
                        <a href="">Đặt giá</a>
                    </div>
                </div>
                <div class="M-body-job-freelancer-content1-mobile2">
                    <div id="text1"><img src="../image/img/work 1.png" alt="">Lập trình phần mềm</div>
                    <div id="text2"><i class="fas fa-map-marker-alt"></i> Hồ Chí Minh</div>
                </div>
                <div class="M-body-job-freelancer-content1-mobile3">
                    <div id="text1">Dự án</div>
                    <div id="text2"><i class="far fa-dollar-sign"></i>  500.000đ/giờ</div>
                </div>
                <div class="M-body-job-freelancer-content1-mobile4">
                    Hi anh chị freelancer, Tôi cần tìm 1 wordpress expert giúp sửa code 1 plugin theo đúng chuẩn Worpress để có thể submit plugin lên Wordpres plugin, Hi... Demo cắt chuỗi
                </div>
                <div class="M-body-job-freelancer-content1-mobile5">
                    <div id="text">Photoshop</div>
                    <div id="text">InDesign</div>
                    <div id="text">Illustrator</div>
                    <div id="text-end">+6</div>
                </div>
            </div>
            <div class="M-body-job-freelancer-content1-mobile">
                <div class="M-body-job-freelancer-content1-mobile-left-img">
                    <img src="../image/img/Group 2076.png" alt="">
                </div>
                <div class="M-body-job-freelancer-content1-mobile-right-text">
                    Sửa code plugin theo đúng chuẩn wordpress, theo yêu cầu của công ty.demo cắt chuỗi dòng nếu quá dài
                </div>
                <div class="M-body-job-freelancer-content1-mobile1">
                    <div id="text1">Nguyễn Hồng Ánh</div>
                    <div id="text2">
                        <i class="fas fa-heart" id="mau_cam" onclick="change_color()"></i>
                        <a href="">Đặt giá</a>
                    </div>
                </div>
                <div class="M-body-job-freelancer-content1-mobile2">
                    <div id="text1"><img src="../image/img/work 1.png" alt="">Lập trình phần mềm</div>
                    <div id="text2"><i class="fas fa-map-marker-alt"></i> Hồ Chí Minh</div>
                </div>
                <div class="M-body-job-freelancer-content1-mobile3">
                    <div id="text1">Dự án</div>
                    <div id="text2"><i class="far fa-dollar-sign"></i>  500.000đ/giờ</div>
                </div>
                <div class="M-body-job-freelancer-content1-mobile4">
                    Hi anh chị freelancer, Tôi cần tìm 1 wordpress expert giúp sửa code 1 plugin theo đúng chuẩn Worpress để có thể submit plugin lên Wordpres plugin, Hi... Demo cắt chuỗi
                </div>
                <div class="M-body-job-freelancer-content1-mobile5">
                    <div id="text">Photoshop</div>
                    <div id="text">InDesign</div>
                    <div id="text">Illustrator</div>
                    <div id="text-end">+6</div>
                </div>
            </div>
            <div class="M-body-job-freelancer-content1-mobile">
                <div class="M-body-job-freelancer-content1-mobile-left-img">
                    <img src="../image/img/Group 2076.png" alt="">
                </div>
                <div class="M-body-job-freelancer-content1-mobile-right-text">
                    Sửa code plugin theo đúng chuẩn wordpress, theo yêu cầu của công ty.demo cắt chuỗi dòng nếu quá dài
                </div>
                <div class="M-body-job-freelancer-content1-mobile1">
                    <div id="text1">Nguyễn Hồng Ánh</div>
                    <div id="text2">
                        <i class="fas fa-heart" id="mau_cam" onclick="change_color()"></i>
                        <a href="">Đặt giá</a>
                    </div>
                </div>
                <div class="M-body-job-freelancer-content1-mobile2">
                    <div id="text1"><img src="../image/img/work 1.png" alt="">Lập trình phần mềm</div>
                    <div id="text2"><i class="fas fa-map-marker-alt"></i> Hồ Chí Minh</div>
                </div>
                <div class="M-body-job-freelancer-content1-mobile3">
                    <div id="text1">Dự án</div>
                    <div id="text2"><i class="far fa-dollar-sign"></i>  500.000đ/giờ</div>
                </div>
                <div class="M-body-job-freelancer-content1-mobile4">
                    Hi anh chị freelancer, Tôi cần tìm 1 wordpress expert giúp sửa code 1 plugin theo đúng chuẩn Worpress để có thể submit plugin lên Wordpres plugin, Hi... Demo cắt chuỗi
                </div>
                <div class="M-body-job-freelancer-content1-mobile5">
                    <div id="text">Photoshop</div>
                    <div id="text">InDesign</div>
                    <div id="text">Illustrator</div>
                    <div id="text-end">+6</div>
                </div>
            </div>
            <div class="M-body-job-freelancer-content1-mobile">
                <div class="M-body-job-freelancer-content1-mobile-left-img">
                    <img src="../image/img/Group 2076.png" alt="">
                </div>
                <div class="M-body-job-freelancer-content1-mobile-right-text">
                    Sửa code plugin theo đúng chuẩn wordpress, theo yêu cầu của công ty.demo cắt chuỗi dòng nếu quá dài
                </div>
                <div class="M-body-job-freelancer-content1-mobile1">
                    <div id="text1">Nguyễn Hồng Ánh</div>
                    <div id="text2">
                        <i class="fas fa-heart" id="mau_cam" onclick="change_color()"></i>
                        <a href="">Đặt giá</a>
                    </div>
                </div>
                <div class="M-body-job-freelancer-content1-mobile2">
                    <div id="text1"><img src="../image/img/work 1.png" alt="">Lập trình phần mềm</div>
                    <div id="text2"><i class="fas fa-map-marker-alt"></i> Hồ Chí Minh</div>
                </div>
                <div class="M-body-job-freelancer-content1-mobile3">
                    <div id="text1">Dự án</div>
                    <div id="text2"><i class="far fa-dollar-sign"></i>  500.000đ/giờ</div>
                </div>
                <div class="M-body-job-freelancer-content1-mobile4">
                    Hi anh chị freelancer, Tôi cần tìm 1 wordpress expert giúp sửa code 1 plugin theo đúng chuẩn Worpress để có thể submit plugin lên Wordpres plugin, Hi... Demo cắt chuỗi
                </div>
                <div class="M-body-job-freelancer-content1-mobile5">
                    <div id="text">Photoshop</div>
                    <div id="text">InDesign</div>
                    <div id="text">Illustrator</div>
                    <div id="text-end">+6</div>
                </div>
            </div> 
            <div class="M-body-job-freelancer-content2-mobile">
                Xem thêm <i class="far fa-angle-double-down"></i>
            </div>
        </div>
   </div>
</div>
   <script>
         function change_name()
            {
            document.getElementById("text1_modal_change").innerHTML= "Đăng nhập để xem Email";
            }
            function change_name1()
            {
            document.getElementById("text1_modal_change").innerHTML= "Đăng nhập để xem Số điện thoại";
            }        
    </script>
        
</body>
</html>