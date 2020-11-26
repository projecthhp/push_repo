       <style>
           .M-head-23{
            /* /padding-top: 26px; */
           }
       </style>
        <div class="M-menu-hover-tablet" id="M-menu-hover-tablet" >
                    <div class="M-button-back-tablet">  
                        <a href="http://timviec365.com"><p><img src="<? echo $domain ?>/image/icon/return 1.png" alt="">Quay lại Timviec365.com</p></a>
                    </div>
                    <div class="M-account-tablet">
                        <div class="M-logo-account-tablet">
                            <img src="<?php echo $domain ?>/image/img/Frame-tablet.png" alt="">
                        </div>
                        <div class="M-img-account-tablet">
                            <img src="<?php echo $domain ?>/image/img/Group 2142.png" height="73px" width="73px" alt="">
                            <p>Nguyễn Thị Lan</p>
                        </div>
                        <div class="M-logout-account-tablet">
                            <div id="M-logout-account">
                                <a href=""><img src="<?php echo $domain ?>/image/icon/Group 1800.png" alt="">Đăng xuất</a>
                            </div>
                            <div id="M-manager-account-tablet">
                            <a href=""> Quản lý tài khoản</a>
                            </div>
                        </div>
                        <div class="M-menu_ul_li-account">
                            <nav>
                                <ul id="viec-freelancer">
                                    <li id="menu-hover"><img src="<?php echo $domain ?>/image/icon/work (2) 1.png" alt=""><a href=""> Việc Freelancer </a></li>
                                    <ul id="option-freelancer">
                                        <li id="li1"><i class="fas fa-circle"></i><a href="/tim-viec-lam-freelancer-ban-hang-flc1.html">Việc làm Freelancer theo dự án</a></li>
                                        <li id="li2"><i class="fas fa-circle"></i> <a href="/tim-viec-lam-freelancer-ban-hang-flc2.html">Việc làm Freelancer bán thời gian</a></li>
                                    </ul>
                                </ul>
                            </nav>
                        </div>
                        <div class="M-menu-freelancer">
                            <div class="M-menu1-freelancer">
                                <a href=""><img src="<?php echo $domain ?>/image/icon/businessman 1.png" alt=""> Danh sách Freelancer</a>
                            </div>
                            <div class="M-menu2-freelancer">
                                <a href=""><img src="<?php echo $domain ?>/image/icon/Group 2401.png" alt="">Kinh nghiệm</a>
                            </div>
                            <div class="M-menu3-freelancer">
                                <a href=""><img src="<?php echo $domain ?>/image/icon/Group 2402.png" alt="">Hướng dẫn</a>
                            </div>
                        </div>
                    </div>
        </div>  
        <?php
            if(isset($indexHeader)){
                if (isset($backgroundIndex)) {
                    echo '<div class="M-body-tablet head_index index_ne" id="M-body-tablet">';
                }
                else{
                    echo '<div class="M-body-tablet head_index index    " id="M-body-tablet">';
                }
            }else{
                echo '<div class="M-body-tablet" id="M-body-tablet">';
            }
        ?>
            <div class="M-hover-menu-tablet" id="M-hover-menu-tablet">
            </div>
            <div class="M-hover-search-tablet" id="M-hover-search-tablet" >
            </div>
            
            <!-- -----tìm kiếm đầu tablet---- -->
            <div class="M-search-head-hover-tablet" id="M-search-head-hover-tablet">
                    <form action="#" method="" style="background-color: white;">
                        <div class="M-search-box-tablet">
                            <input type="text" id="search_box" name="search-box-tablet" placeholder="Nhập từ khóa tìm kiếm...">
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
           <!-- ----head tablet---- -->
            <div class="M-header-tablet">
                <div class="M-head-tablet" id="M-head-tablet" >
                    <i class="far fa-search" onclick="search_tablet()"></i>
                    <img  class="img-close-search-tablet" onclick="search_tablet()" src="<? echo $domain ?>/image/icon/close (2) 1.png" alt="">
                    <div class="img2">
                        <a href="">
                            <?php
                                if (isset($indexHeader)) {
                                echo '  <img src="' .$domain .'/image/img/logo.png" alt="">';
                                }
                                else{
                                    echo '<img src="' .$domain .'/image/img/Frame-tablet.png" alt="">';
                                }
                            ?>
                        </a>
                    </div>
                    <div class="img3" id="img3" onclick="menu_hover()">
                        <?php
                            if (isset($indexHeader)) {
                                echo '
                                    <img class="img-hover-pc" src="' .$domain .'/image/icon/Menu 1.png" alt="">
                                ';
                            }
                            else{
                                echo '
                                    <img class="img-hover-pc" src="' .$domain .'/image/icon/Menu (1) 1.png" alt="">
                                ';
                            }
                        ?>
                        <img id="img-close-tablet" class="img-close-tablet" src="<? echo $domain ?>/image/icon/close (2) 1.png" alt="">
                    </div>
                </div>
               <?php
                    if (isset($indexHeader)) {
                        echo '
                        <div class="M-head1-tablet">
                            <div class="M-text1-tablet">
                                <p>Việc làm freelancer - Làm online, nhận tiền nhanh chóng</p>
                            </div>
                            <div class="M-text2-tablet">
                                <p>Hơn <big>32467</big> dự án đã đăng và thuê được freelancer thành công.
                                Chất lượng dự án được đảm bảo, ứng viên freelancer hàng đầu</p>
                            </div>
                        </div>
                        <div class="M-head2-tablet">
                            <div class="M-button-tablet">
                                <div class="button1">
                                    <img src="' .$domain .'/image/icon/icon11.png" alt="">
                                    <a href="">
                                        Tải app Timviec365
                                    </a>
                                </div>
                                <div class="button2">
                                    <img src="' .$domain .'/image/icon/icon12.png" alt="">
                                    <a href="">
                                        Tải app CV365
                                    </a>
                                </div>
                            </div>
                        </div>
                        ';
                    }
               ?>
            </div>
            <!-- ----Phần đầu pc---- -->
            <div class="M-header index ">
            
            <?php
                if (isset($backgroundIndex)) {
                    echo '<div class="M-head M-head-ne">';
                }
                else {
                    echo '<div class="M-head">';
                }
            ?>
                <div class="M-head-1">
                    <?php
                        if(isset($indexHeader)){
                            echo '<img src="' .$domain .'/image/icon/return1.png" alt="x">';
                        }else{
                            echo '<img src="'.$domain .'/image/icon/return 1.png" alt="">';
                        }
                    ?>
                        <a href="https://timviec365.com/" alt="timviec365.com">Quay lại Timviec365.com</a>
                </div>
                <div class="M-head-2 M-head-2-login">
                    <div id="logo" >
                        <a href="<?echo $domain?>/home/index.php">
                            <?php
                                if (isset($indexHeader)) {
                                echo '  <img src="' .$domain .'/image/img/logo.png" alt="">';
                                }
                                else{
                                    echo '<img src="' .$domain .'/image/img/Frame-tablet.png" alt="">';
                                }
                            ?>
                        </a>
                    </div>
                    <div class="M-head-21">
                        <ul class="M-lo">
                            <li id="li1">
                                <a href="/tim-viec-lam-freelancer-flc0.html">Việc Freelancer</a>
                                <div class="M-menu-hover-head " id="off">
                                    <div id="text1"><a href="/tim-viec-lam-freelancer-flc1.html">Việc làm Freelancer theo dự án</a></div>
                                   <div id="text2"> <a href="/tim-viec-lam-freelancer-flc2.html">Việc làm Freelancer bán thời gian</a></div>
                                </div>
                                <style>
                                    .M-menu-hover-head{
                                        display:none;
                                    }
                                    .M-head-21 .M-lo .li1:hover + .M-head-21 .M-menu-hover-head {
                                        display: block;
                                    }
                                </style>
                            </li>
                            <li id="li2">
                                <a href="<?echo $domain?>/home/ListFreelancer.php">Danh sách Freelancer</a>
                            </li>
                            <li id="li2">
                                <a>Kinh nghiệm</a>
                            </li>
                            <li id="li2">
                                <a href="<?echo $domain?>/home/Tutorial.php">Hướng dẫn</a>
                            </li>
                        </ul>
                    </div>
                    <div class="M-head-22">
                        <a href="<?echo $domain?>/home/PostProject.php">Đăng dự án</a>
                    </div>
                    <div class="M-head-23 ">
                        <?php
                            if (isset($_COOKIE['UID'])) {
                        ?>
                            <style>
                                .M-head-2-login{
                                    width: 55%;
                                }
                                .menu img{
                                    margin-top: 15px;
                                }
                                .sub_menu {
                                    display: none;
                                    position: absolute;
                                }
                                .menu li {
                                    position: relative;
                                }
                                .menu li:hover .sub_menu {
                                    display: block;
                                }
                                .sub_menu li a{
                                    color: white;
                                }
                                .sub_menu li{
                                    width: 113%;
                                    padding: 5px 23px;
                                    margin-left: -50% !important;
                                    text-align: center;
                                }
                                .sub_menu li:hover{
                                    background: white;
                                    border-radius: 100px;
                                    margin-bottom: 1px;
                                }
                                .sub_menu li:hover a{
                                    color: black;
                                }
                            </style>
                            <div class="menu">
                                <ul>
                                    <li style="margin-top: -25px;">
                                        <img src="<? echo $domain ?>/image/img/Group 2251.png" alt="">
                                        <ul class="sub_menu">
                                            <li><a href="CompleteProfile.php">Trang cá nhân</a></li>
                                            <li><a href="<?echo $domain;?>/home/logOutUv.php">Đăng xuất</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        <?php
                            }else{
                        ?>
                            <ul>
                                <li style="float: left;">
                                    <?php
                                        if (isset($indexHeader)) {
                                            echo '<img src="' .$domain .'/image/icon/icon8.png" alt="">';
                                            }
                                            else{
                                                echo '<img src="' .$domain .'/image/icon/Group.png" alt="">';
                                            }
                                        ?>
                                        <a href="loginuv.php" id="dang_nhap">Đăng nhập</a>
                                </li>
                                <li style="float: left;">|</li>
                                <li style="float: left;">
                                    <?php
                                            if (isset($indexHeader)) {
                                                echo '<img src="' .$domain .'/image/icon/icon8.png" alt="">';
                                            }
                                            else{
                                                echo '<img src="' .$domain .'/image/icon/Vector (3).png" alt="">';
                                            }
                                    ?>
                                    <a href="SignUpFreelancer.php" id="dang_ky">Đăng ký</a>
                                </li>
                            </ul>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
         
  