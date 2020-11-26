<?php
include('../home/config.php');
	if(!isset($_COOKIE['UID'])) {
	} else{ $id_uv = $_COOKIE['UID'];
	$query = "select * from vltg_user_uv where id_uv ='$id_uv'";
	$db_qr    = new db_query($query);
	if(mysql_num_rows($db_qr->result) > 0)
      {
         $value = mysql_fetch_assoc($db_qr->result);
         $name_uv = $value['name_uv'];
         $file_image = $value['file_image'];
         $nganh_uv =$value['nganh_uv'];
         $noilamviec_uv=$value['noilamviec_uv'];
         $thanhpho_uv=$value['thanhpho_uv'];
         $huyen_uv=$value['huyen_uv'];
      }  
    }
?>
<? include('script_uv_menu_hoso.php') ;?>
<div class="wapper">
    <div class="header">
        <div class="menu">
            <div class="menu_moblie">
                <div class="menu_mobile1">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
                        <img src="../image/Group 425.png" alt="" />
                    </button>
                    <div class="modal fade div_modal" id="exampleModal1" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>

                                </div>

                                <div class="modal-body">
                                    <div class="anhhoso">
                                        <img src="../image/Group 2048.png" alt="">
                                        <h2>Nguyễn Thu Trang</h2>
                                        <a href=""><img src="../image/Vector (1)111.png" alt=""> Làm mới hồ sơ</a>
                                    </div>
                                    <hr>
                                    <div class="div_quanlychung">
                                        <ul class="vmenu">
                                            <li class="nav-item dropdown">
                                                <i style='font-size:14px' class='fas'>&#xf51b;</i>
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                                    role="button" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Quản lý chung
                                                </a>
                                                <div class="dropdown-content">
                                                    <a class="dropdown-item div_dropdown-item" href="#">Hoàn thiện
                                                        hồ sơ</a>
                                                    <!-- <div class="dropdown-divider"></div> -->
                                                    <a class="dropdown-item div_dropdown-item" href="#">Tìm việc</a>
                                                    <!-- <div class="dropdown-divider"></div> -->
                                                </div>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <i style='font-size:14px' class='far'>&#xf1d8;</i>
                                                <a class="nav-link" href="#" id="navbarDropdown">
                                                    Việc làm đã ứng tuyển
                                                </a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <i class='fas'>&#xf304;</i>
                                                <a class="nav-link" href="#" id="navbarDropdown">
                                                    Việc làm đã lưu
                                                </a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <i style='font-size:14px' class='fas'>&#xf51b;</i>
                                                <a class="nav-link" href="#" id="navbarDropdown">
                                                    Cẩm nang tìm việc theo giờ
                                                </a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <i style='font-size:14px' class='fas'>&#xf084;</i>
                                                <a class="nav-link" href="#" id="navbarDropdown">
                                                    Đổi mật khẩu
                                                </a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <i style='font-size:14px' class='fas'>&#xf011;</i>
                                                <a class="nav-link" href="#" id="navbarDropdown">
                                                    Đăng xuất
                                                </a>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu_mobile2">
                    <img src="../image/logoo 1 (1).png" alt="" />
                </div>
                <div class="menu_mobile3">
                    <button type="button" class="btn btn-primary btn-form1-submit" data-toggle="modal"
                        data-target="#exampleModalLong1">
                        <i style="font-size: 24px" class="fas">&#xf002;</i>
                    </button>

                    <div class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content modal_search">
                                <div class="modal-header modal-header-search">
                                    <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body form_search">
                                    <form>
                                        <div class="form-group">
                                            <input type="email" class="form-control"
                                                placeholder="Nhập từ khóa tìm kiếm" />
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer-search">
                                            <button type="button" class="btn bg-warning text-white">
                                                Tìm kiếm
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row row_tow">
                    <div class="col-md-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <img src="../image/Group 425.png" alt="" />
                        </button>

                        <!-- Modal -->
                        <div class="modal fade div_modal" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn btn-primary">
                                            <a href="" class="text-white"> Đăng nhập </a>
                                        </button>
                                        <button type="button" class="btn bg-warning text-white">
                                            <a href="" class="text-white">Đăng ký</a>
                                        </button>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <a href="">Dành cho ứng viên</a>
                                    </div>
                                    <div class="modal-body">
                                        <a href="">Dành cho nhà tuyển dụng</a>
                                    </div>
                                    <div class="modal-body">
                                        <a href="">Đánh giá</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 div_logo365">
                        <img src="../image/logoo 1 (1).png" alt="" />
                    </div>

                    <div class="col-md-4 div_search">
                        <button type="button" class="btn btn-primary btn-form1-submit" data-toggle="modal"
                            data-target="#exampleModalLong">
                            <i style="font-size: 24px" class="fas">&#xf002;</i>
                        </button>

                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content modal_search">
                                    <div class="modal-header modal-header-search">
                                        <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body form_search">
                                        <form>
                                            <div class="form-group">
                                                <input type="email" class="form-control"
                                                    placeholder="Nhập từ khóa tìm kiếm" />
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer-search">
                                                <button type="button" class="btn bg-warning text-white">
                                                    Tìm kiếm
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container header_container">
                <div class="row tuyendung1">
                    <div class="col icontuyendung">
                        <a href="index.php" class="text-light div_icon">
                            <img src="../image/Vector 10.png" alt="" /> Quay lại
                            Timviec365.com
                        </a>
                        <ul class="ul_header">
                            <li>
                                <a href="index.php"><img src="../image/logo.png" alt="" /></a>
                            </li>
                            <li>
                                <a href="" class="text-light">Dành cho doanh nghiệp</a>
                            </li>
                            <li><a href="../home/banggia.php" class="text-light">Bảng giá</a></li>
                            <li>
                                <a href="../home/index.php" class="login border p-2 text-light bg-primary">Dành cho
                                    người tìm việc</a>
                            </li>
                            <li class="h_icon_tuyendung"><img src="../public/images/<?= $value['file_image'] ?>" alt="">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>