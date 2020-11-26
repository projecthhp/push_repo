<? 
session_start();
include("../home/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kỹ năng bản thân</title>
    <link rel="stylesheet" type="text/css" href="../node_modules/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="../node_modules/slick-carousel/slick/slick-theme.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/css.css" />
</head>
<style>
.h-ngaysinh span {
    color: red;
}

label.error {
    color: red;
    font-size: 14px;
    font-style: normal;
    font-weight: ;

}
</style>
<?  include('../_share/add_kn_uv.php');?>
<?  include('../_share/update_kn_uv.php');?>
<?  include('../_share/delete_kn.php');?>
<?
$db_qrss = new db_query("SELECT * FROM vltg_user_uv");
$item = mysql_fetch_assoc($db_qrss->result);
?>

<body>
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
                                                        <a class="dropdown-item div_dropdown-item" href="#">Tìm việc</a>
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
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
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
                        <div class="col icontuyendung ">
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
                                <li><a href="" class="text-light">Bảng giá</a></li>
                                <li>
                                    <a href="" class="login border p-2 text-light bg-primary">Dành cho doanh nhiệp</a>
                                </li>
                                <li class="h_icon_tuyendung"><img src="../public/images/<?= $item['file_image'] ?>"
                                        alt=""></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="div_thongtinhosocanhan">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 div_quanlythongtin">
                    <div class="anhhoso">
                        <img src="../public/images/<?= $item['file_image'] ?>" alt="">
                        <h2> <?= $item['name_uv'] ?></h2>
                        <a href=""><img src="../image/Vector (1)111.png" alt=""> Làm mới hồ sơ</a>
                    </div>
                    <hr>
                    <div class="div_quanlychung">
                        <ul class="vmenu">
                            <li class="nav-item dropdown">
                                <i style='font-size:14px' class='fas'>&#xf51b;</i>
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Quản lý chung
                                </a>
                                <div class="dropdown-content">
                                    <a class="dropdown-item div_dropdown-item" href="#">Hoàn thiện hồ sơ</a>
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
                <div class="col-xl-9 div_quanlythongtincoban">
                    <?php  include('../_share/menu_hoanthienhoso.php');?>
                    <div class="h_thongtincoban">
                        <h2>Kinh nghiệm làm việc</h2>
                        <hr>

                        <div class="h_kinhnghiemlamviec1 h_div_kinhnghiemlamviec1">
                            <img src="../image/company (1) 1.png" alt="">
                            <div class="h_noidungkinhnghiem">
                                <?= $value['tencongty_uv'] ?><span>( <?= $value['ngaybatdau_uv'] ?> đến
                                    <?= $value['ngayketthuc_uv'] ?>)</span>

                                <div class="h_button_kinhnghiem">
                                    <button type="button" class="btn bg-white" data-toggle="modal"
                                        data-target="#exampleModalthemmoi1">
                                        <a href="kinhnghiemlamviec1.php?masua=<?=($value['id_kn'])?>">
                                            <i style='font-size:14px' class='fas'>&#xf304;</i>Sửa
                                        </a>
                                    </button>
                                    <div class=" modal fade" id="exampleModalthemmoi1" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabelthemmoi1" aria-hidden="true">
                                        <div class="modal-dialog h_div_modal_dialog" role="document">
                                            <div class="modal-content h_modal-content">
                                                <div class="modal-header h_themmoi_header">
                                                    <h5 class="modal-title" id="exampleModalLabelthemmoi1">Chỉnh sửa
                                                        kinh nghiệm làm việc</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post" id="registration">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="h-ngaysinh h-ngaysinh_themmoi">
                                                                    <div class="form-group h_form-group h_ngoisao">
                                                                        <label for=""><span>*</span>Tên
                                                                            công ty </label>
                                                                        <input type="text" class="form-control"
                                                                            id="tencongty_uv"
                                                                            placeholder="Nhập tên công ty"
                                                                            name="tencongty_uv"
                                                                            value="<?=$value['tencongty_uv']?>">
                                                                    </div>
                                                                    <div class="form-group h_form-group">
                                                                        <label for=""><span>*</span>Ngày
                                                                            bắt đầu</label>
                                                                        <input type="date" class="form-control"
                                                                            placeholder="Chọn ngày bắt đầu"
                                                                            id="ngaybatdau_uv" name="ngaybatdau_uv"
                                                                            value="<?=$value['ngaybatdau_uv']?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="h-ngaysinh h-ngaysinh_themmoi">
                                                                    <div
                                                                        class="form-group h_form-group1 h_form_kinhnghiem">
                                                                        <label for=""><span>*</span>Chọn
                                                                            chức danh</label>
                                                                        <div class="h_div_select">
                                                                            <select class="custom-select my-1 mr-sm-2"
                                                                                id="chucdanh_uv_sua" name="chucdanh_uv">
                                                                                <option>
                                                                                    <?=$value['chucdanh_uv']?>
                                                                                </option>
                                                                                <option>Mới Tốt Nghiệp</option>
                                                                                <option>Thực tập sinh</option>
                                                                                <option>Nhân viên</option>
                                                                                <option>Trưởng Nhóm</option>
                                                                                <option>Trưởng Phòng</option>
                                                                                <option>Giám Đốc và Cấp Cao
                                                                                    Hơn</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group h_form-group">
                                                                        <label for=""><span>*</span>Ngày
                                                                            kết thúc</label>
                                                                        <input type="date" class="form-control"
                                                                            placeholder="Mời bạn nhập tỉnh thành"
                                                                            id="ngayketthuc_uv" name="ngayketthuc_uv"
                                                                            value="<?=$value['ngayketthuc_uv']?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="h-ngaysinh h-ngaysinh_themmoi">
                                                                <div class="form-group h_form-group">
                                                                    <label for=""><span>*</span>Mô tả
                                                                        công việc</label>
                                                                    <textarea class="form-control"
                                                                        id="motacongviec_uv_kn"
                                                                        name="motacongviec_uv_kn"
                                                                        rows="5"><?=$value['motacongviec_uv_kn']?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer h_modal_footer">
                                                            <button type="button"
                                                                class="btn bg-warning bg-white h_modal_footer_button"
                                                                data-dismiss="modal">Bỏ qua</button>
                                                            <button type="submit" name="btn_luu" value="submit"
                                                                class="btn bg-warning text-white">Cập
                                                                nhập</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="kinhnghiemlamviec1.php?maxoa=<?= $value['id_kn'] ?>">
                                        <button type="text" class="btn"
                                            onclick="return confirm('Bạn có chắc chăn muốn xóa không ?')"><i
                                                style='font-size:14px' class='fas'>&#xf2ed;</i>Xóa</button></a>
                                </div>
                                <p> Vị trí:<span><?= $value['chucdanh_uv'] ?></span></p>
                                <div class="h_mota">
                                    Mô tả công việc:
                                    <p><?= $value['motacongviec_uv_kn'] ?></p>

                                </div>
                            </div>
                        </div>

                        <div class="h_themkinhnghiem">
                            <button type="button" class="btn bg-white" data-toggle="modal"
                                data-target="#exampleModalthemmoi">
                                <i style='font-size:14px' class='fas'>&#xf303;</i>Thêm kinh nghiệm làm việc
                            </button>
                            <div class="modal fade" id="exampleModalthemmoi" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabelthemmoi" aria-hidden="true">
                                <div class="modal-dialog h_div_modal_dialog" role="document">
                                    <div class="modal-content h_modal-content">
                                        <div class="modal-header h_themmoi_header">
                                            <h5 class="modal-title" id="exampleModalLabelthemmoi">Thêm mới kinh
                                                nghiệm làm việc</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST" onsubmit="return validateform()">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="h-ngaysinh">
                                                            <div class="form-group h_form-group h_ngoisao">
                                                                <label for=""><span>*</span>Tên
                                                                    công ty </label>
                                                                <input type="text" class="form-control"
                                                                    id="tencongty_uv" placeholder="Nhập tên công ty"
                                                                    name="tencongty_uv">
                                                            </div>
                                                            <span id="tencongty_uv_erro"></span>
                                                            <div class="form-group h_form-group h_ngoisao">
                                                                <label for=""><span>*</span>Ngày
                                                                    bắt đầu</label>
                                                                <input type="date" class="form-control"
                                                                    name="ngaybatdau_uv" id="ngaybatdau_uv"
                                                                    placeholder="Chọn ngày bắt đầu">
                                                            </div>
                                                            <span id="ngaybatdau_uv_erro"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="h-ngaysinh">
                                                            <div
                                                                class="form-group h_form-group1 h_form_kinhnghiem h_ngoisao">
                                                                <label for=""><span>*</span>Chọn
                                                                    chức danh/ Vị trí</label>
                                                                <div class="h_div_select">
                                                                    <select class="custom-select my-1 mr-sm-2"
                                                                        id="chucdanh_uv" name="chucdanh_uv">
                                                                        <option value=""></option>
                                                                        <?
                                                                                foreach ($array_capbac as $key => $value) {
                                                                                ?>
                                                                        <option value="<?= $value ?>">
                                                                            <?= $value ?></option>
                                                                        <?
                                                                                  }
                                                                                  ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <span id="chucdanh_uv_erro"></span>
                                                            <div class="form-group h_form-group h_ngoisao">
                                                                <label for=""><span>*</span>Ngày
                                                                    kết thúc</label>
                                                                <input type="date" class="form-control"
                                                                    placeholder="Mời bạn nhập tỉnh thành"
                                                                    id="ngayketthuc_uv" name="ngayketthuc_uv">
                                                            </div>
                                                            <span id="ngayketthuc_uv_erro"></span>
                                                        </div>
                                                    </div>
                                                    <div class="h-ngaysinh">
                                                        <div class="form-group h_form-group h_ngosao">
                                                            <label for=""><span>*</span>Mô tả
                                                                công việc</label>
                                                            <textarea class="form-control h-textarea" rows="3"
                                                                name="motacongviec_uv_kn"
                                                                id="motacongviec_uv_kn1"></textarea>
                                                        </div>
                                                        <span id="motacongviec_uv_kn_erro"></span>
                                                    </div>

                                                </div>
                                                <div class="modal-footer h_modal_footer">
                                                    <button type="button"
                                                        class="btn bg-warning bg-white h_modal_footer_button"
                                                        data-dismiss="modal">Bỏ qua</button>
                                                    <button type="submit" class="btn bg-warning text-white"
                                                        name="btn_submit">
                                                        Thêm mới</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="h_button">
                            <button type="submit" value="Submit" class="btn h_capnhap">
                                Cập nhật
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <? include('../_share/footer.php');?>
</body>

</html>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="../node_modules/slick-carousel/slick/slick.js" type="text/javascript" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script>
$(document).ready(function() {
    $('#chucdanh_uv').select2({
        placeholder: "Mời bạn chọn chức danh / Vị trí",
        width: "100%"
    });
    $('#chucdanh_uv_sua').select2({
        placeholder: "Mời bạn chọn chức danh / Vị trí",
        width: "100%"
    });

});

function validateform() {
    var tencity = document.getElementById('tencongty_uv').value;
    var chucdanh = document.getElementById('chucdanh_uv').value;
    var batdau = document.getElementById('ngaybatdau_uv').value;
    var ketthuc = document.getElementById('ngayketthuc_uv').value;
    var motacongviec = document.getElementById('motacongviec_uv_kn1').value;
    var status = true;
    if (tencity == "") {
        document.getElementById('tencongty_uv_erro').innerHTML = "Mời bạn điền thông tin tên công ty";
        status = false;
    } else document.getElementById('tencongty_uv_erro').innerHTML = ""
    if (chucdanh == "") {
        document.getElementById('chucdanh_uv_erro').innerHTML = "Mời bạn chọn chức danh trong công ty";
        status = false;
    } else document.getElementById('chucdanh_uv_erro').innerHTML = ""
    if (batdau == "") {
        document.getElementById('ngaybatdau_uv_erro').innerHTML = "Mời bạn chọn ngày bắt đầu ";
        status = false;
    } else document.getElementById('ngaybatdau_uv_erro').innerHTML = ""
    if (ketthuc == "") {
        document.getElementById('ngayketthuc_uv_erro').innerHTML = "Mời bạn chọn ngày kết thúc";
        status = false;
    } else document.getElementById('ngayketthuc_uv_erro').innerHTML = ""
    if (motacongviec == "") {
        document.getElementById('motacongviec_uv_kn_erro').innerHTML = "Mời bạn viết mô tả công việc của mình";
        status = false;
    } else document.getElementById('motacongviec_uv_kn_erro').innerHTML = ""

}
$("#registration").validate({
    rules: {
        tencongty_uv: {
            required: true
        },
        ngaybatdau_uv: {
            required: true
        },
        chucdanh_uv: {
            required: true
        },
        ngayketthuc_uv: {
            required: true
        },

        motacongviec_uv_kn: {
            required: true
        },
    },
    messages: {
        ngaybatdau_uv: {
            required: "Mời bạn nhập tên công ty mà mình mong muốn"
        },
        tencongty_uv: {
            required: "Mời bạn nhập ngày bắt đầu của mình"
        },
        chucdanh_uv: {
            required: "Mời bạn chọn chức danh cho mình"
        },
        ngayketthuc_uv: {
            required: "Mời bạn nhập ngày kết thúc của mình"
        },
        motacongviec_uv_kn: {
            required: "Bạn hãy mô tả về bản thân mình"
        }

    }

});
</script>