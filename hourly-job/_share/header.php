<?php
session_start();
include('../home/config.php');
	if(!isset($_COOKIE['UID'])) {
  		// header('Location: ../home/login1.php');
    } else{ 
        $id_uv = $_COOKIE['UID'];
        $query = "select * from vltg_user_uv where id_uv ='$id_uv'";
        $db_qr    = new db_query($query);
        if(mysql_num_rows($db_qr->result) > 0)
        {
         $value = mysql_fetch_assoc($db_qr->result);
         $name_uv = $value['name_uv'];
         $file_image = $value['file_image'];
      }  
    }
   
?>
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
            <div class="row row_menu">
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <img src="../image/Group 425.png" alt="" />
                    </button>
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
            <div class="container header_container">
                <div class="row tuyendung1">
                    <div class="col icontuyendung">
                        <a href="" class="text-light div_icon">
                            <img src="../image/Vector 10.png" alt="" /> Quay lại
                            Timviec365.com
                        </a>
                        <ul class="ul_header">
                            <li>
                                <a href=""><img src="../image/logo.png" alt="" /></a>
                            </li>
                            <li>
                                <a href="" class="text-light">Dành cho doanh nghiệp</a>
                            </li>
                            <li><a href="../home/banggia.php" class="text-light">Bảng giá</a></li>
                            <? if(!isset($_COOKIE['UID'])){?>
                            <li>
                                <a href="../home/registration1.php" class="login border p-2 bg-white text-primary">Đăng
                                    ký</a>
                            </li>
                            <li>
                                <a href="../home/login1.php" class="login border p-2 text-light bg-warning">Đăng
                                    nhập</a>
                            </li>
                            <?}else{?>
                            <li class="h_icon_tuyendung ">
                                <a class=" dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="true" aria-expanded="false"><img
                                        src="../public/images/<?= $value['file_image'] ?>" alt=""></a>
                                <div class="dropdown-menu H_dropdown-menu">
                                    <a class="dropdown-item h_anh_dangnhap" href="#"><img
                                            src="../public/images/<?= $value['file_image'] ?>"
                                            alt=""><?= $value['name_uv'] ?></a>
                                    <hr>
                                    <a class="dropdown-item h_img_dx text-dark" href="#"><img src="../image/dx2.png"
                                            alt="">Hoàn thiện thông tin</a>
                                    <a class="dropdown-item h_img_dx text-dark" href="#"><img src="../image/dx.png"
                                            alt="">Quản lý tài khoản</a>
                                    <a class="dropdown-item h_img_dx text-dark" href="../_share/dangxuat.php"><img
                                            src="../image/Vector_dx.png" alt="">Đăng xuất</a>
                                </div>
                            </li>
                            <?}?>
                            <li>
                                <a href="" class="login border p-2 text-light bg-primary">Dành cho người tìm việc</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <style>
        .H_dropdown-menu {
            width: 22%;
            margin: 25px;
            margin-right: 70px;
            background: #FFFFFF;
            box-shadow: 0px 2px 20px rgba(0, 0, 0, 0.1);
            border-radius: 0px 0px 5px 5px;


        }

        .H_dropdown-menu a {
            font-family: Roboto-Medium;
            font-style: normal;
            font-weight: 500;
            font-size: 17px;
            color: #13395E;
        }

        .h_anh_dangnhap img {
            width: 43px;
            height: 43px;
            margin: 10px;
            font-family: Roboto-Medium;
            font-style: normal;
            font-weight: 500;
            font-size: 17px;
            line-height: 24px;
            /* identical to box height, or 141% */


            color: #13395E;

        }

        .h_anh_dangnhap:hover {
            background: #FFFFFF;
        }

        .h_anh_dangnhap_a {
            font-family: Roboto-Medium;
            font-style: normal;
            font-weight: 500;
            font-size: 17px;
            line-height: 24px;
            /* identical to box height, or 141% */


            color: #13395E;

        }

        .h_img_dx img {
            margin: 10px;
            width: 28px;
            height: 25px;

            margin-left: 50px;
        }

        .h_img_dx:hover {
            background: #FFFFFF;
        }
        </style>
        <div class="benner">
            <div class="p-3">
                <div class="search">
                    <div class="container">
                        <form action="" class="form1 clearfix">
                            <div class="col1 c2">
                                <div class="input1_wrapper">
                                    <div class="input1_inner">
                                        <input type="text" class="form-control input datepicker" placeholder="Search" />
                                    </div>
                                </div>
                            </div>
                            <div class="col2 c3">
                                <div class="select1_wrapper">
                                    <div class="select1_wrapper">
                                        <select class="js-example-basic-single select" name="state" id="index_category">
                                            <option value="0">Chọn ngành nghề</option>
                                            <option value="1">Wyoming</option>
                                            <option value="2">2 Children</option>
                                            <option value="3">3 Children</option>
                                            <option value="4">4 Children</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col4 c4">
                                <div class="select1_wrapper">
                                    <div class="select1_inner">
                                        <select class="js-example-basic-single select" name="state"
                                            id="index_category1">
                                            <option value="0">Chọn tỉnh thành</option>
                                            <option value="1">Wyoming</option>
                                            <option value="2">2 Children</option>
                                            <option value="3">3 Children</option>
                                            <option value="4">4 Children</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col3 c6">
                                <button type="submit" class="btn-form1-submit">
                                    <i style="font-size: 24px" class="fas">&#xf002;</i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="title_moblie">
                        Tải ngay ứng dụng timviec365 và cv365+ trên điện thoại để trải
                        nghiệm tốt nhất
                    </div>
                    <div class="title">
                        <p>
                            Tải ngay ứng dụng timviec365 và cv365+ trên điện thoại để trải
                            nghiệm tốt nhất
                        </p>
                    </div>
                    <div class="button1 button_one">
                        <button type="button" class="btn btn-primar bg-primary">
                            <a href="" class="text-light text_mobile"><img src="../image/apptimviec 1.png" alt="" />Tải
                                app
                                Timviec365
                            </a>
                        </button>
                        <button type="button" class="btn btn-secondar bg-warning">
                            <a href="" class="text-light div_icon1 text_mobile1"><img src="../image/Icon.png" alt="" />
                                Tải app CV365</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="tieude1">Trang chủ /<span> Việc làm theo giờ </span></div>
    </div>
</div>