
<header>
   <!-- head pc -->
        <div class="M-header-white M-header index">
                <div class="M-head-white">
                    <div class="M-head-white-1">
                        <?php
                        if(isset($indexHeader)){
                            echo '<img src="../image/icon/return1.png" alt="">';
                        }else{
                            echo '<img src="../image/icon/return 1.png" alt="">';
                        }
                        ?>
                        <a href="https://timviec365.com/" alt="timviec365.com">Quay lại Timviec365.com</a>
                    </div>
                    <div class="M-head-white-2">
                        <div id="logo" >
                            <a href="">
                                <?php
                                    if (isset($indexHeader)) {
                                    echo '  <img src="../image/img/logo.png" alt="">';
                                    }
                                    else{
                                        echo '<img src="../image/img/Frame-tablet.png" alt="">';
                                    }
                                ?>
                            </a>
                        </div>
                        <div class="M-head-white-21">
                            <ul>
                                <li id="li1">
									<a href="#">Việc Freelancer</a>
                                        <ul>
                                            <li id="li1"><a href="#">Việc làm Freelancer theo dự án</a></li>
                                            <li><a href="#">Việc làm Freelancer bán thời gian</a></li>
                                        </ul>
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
                                    <?php
                                        if (isset($indexHeader)) {
                                            echo '<img src="../image/icon/icon8.png" alt="">';
                                         }
                                         else{
                                             echo '<img src="../image/icon/Group.png" alt="">';
                                         }
                                    ?>
                                    
                                    <a href="#" id="dang_nhap">Đăng nhập</a>
                                </li>
                                <li>|</li>
                                <li>
                                    <?php
                                        if (isset($indexHeader)) {
                                            echo '<img src="../image/icon/icon8.png" alt="">';
                                         }
                                         else{
                                             echo '<img src="../image/icon/Vector (3).png" alt="">';
                                         }
                                    ?>
                                   
                                    <a href="" id="dang_ky">Đăng ký</a>
                                </li>
                            </ul>
                            <!-- <div class="M-head-white-login-23">
                                <img src="../image/img/Group 2251.png" alt="">
                            </div> -->
                        </div>
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
        </div>
</header>