<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Chi tiết ứng viên</title>
    <link rel="stylesheet" type="text/css" href="../node_modules/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="../node_modules/slick-carousel/slick/slick-theme.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/css.css" />
</head>
<style>
.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #ced4da;
    border-radius: 0;
}

.form-control {
    display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .0rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
}

@import url("https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap");

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Montserrat", sans-serif;
}

.container_h {
    display: flex;
    flex-wrap: wrap;
}

.container .option_item {
    display: block;
    position: relative;
    width: 118px;
    height: 40px;
    margin: 2px;
}

.container .option_item .checkbox {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
    opacity: 0;
}

.option_item .option_inner {

    background: #FAFAFA;
    text-align: center;
    cursor: pointer;
    height: 40px;
    display: block;
    border: 5px solid transparent;
    position: relative;
    color: #646464;

}

.option_item .option_inner .name {
    user-select: none;
    line-height: 30px;
}


.option_item .checkbox:checked~.option_inner.instagram {
    background: #FCA927;
    font-family: Roboto-Regular;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 28px;
    /* identical to box height, or 175% */
    text-align: center;

    color: #FFFFFF;
}

.abc {
    background: #FCA927 !important;
    font-family: Roboto-Regular;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 28px;
    /* identical to box height, or 175% */
    text-align: center;

    color: #FFFFFF !important;
}
</style>
<?php
include('../home/config.php');
if (!isset($_COOKIE['UID'])) {
    header('Location: ../home/login1.php');
} else $id_uv = $_COOKIE['UID'];
$query = "select * from vltg_user_uv where id_uv ='$id_uv'";
$db_qr    = new db_query($query);
if (mysql_num_rows($db_qr->result) > 0) {
    $value = mysql_fetch_assoc($db_qr->result);
    $name_uv = $value['name_uv'];
    $file_image = $value['file_image'];
    $congviec_uv = $value['congviec_uv'];
}

?>

<body>
    <div class="wapper">
        <div class="header">
            <div class="menu">
                <div class="menu_moblie">
                    <div class="menu_mobile1">
                        <button type="button" class="btn btn-form1-submit1" data-toggle="modal"
                            data-target="#exampleModal1">
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
                            <button type="button" class="btn btn-form1-submit1" data-toggle="modal"
                                data-target="#exampleModal">
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
                                <li class="h_icon_tuyendung"><img src="../public/images/<?= $value['file_image'] ?>"
                                        alt=""></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="div_search1">
                <form action="">
                    <div class="form_search1">
                        <div class="timkiem">
                            <div class="form_timkiem">
                                <input type="text" class="form-control input datepicker"
                                    placeholder="Nhập từ kháo mong muốn....." />
                            </div>
                        </div>
                        <div class="nganhnghe">
                            <div class="form_timkiem1">
                                <select class="js-example-basic-single" name="state" id="search_form">
                                    <option value="0">Chọn ngành nghề</option>
                                    <?php
                                    $sql = "select * from category";
                                    $db_qr = new db_query($sql);
                                    while ($row = mysql_fetch_assoc($db_qr->result)) {
                                        echo '<option value="' . $row["cat_id"] . '">' . $row["cat_name"] . '</option>';
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="tinh">
                            <div class="form_timkiem1">
                                <select class="js-example-basic-single" name="state" id="search_form1">
                                    <option value="0">Chọn tỉnh thành</option>
                                    <?php
                                    $sql = "select * from city";
                                    $db_qr = new db_query($sql);
                                    while ($row = mysql_fetch_assoc($db_qr->result)) {
                                        echo '<option value="' . $row["cit_id"] . '">' . $row["cit_name"] . '</option>';
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="button_search">
                            <button type="submit" class="btn-form1-submit">
                                <i style="font-size: 24px" class="fas">&#xf002;</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tieude1" style="margin-left:50px">
                Trang chủ /Ứng viên theo giờ /<span>
                    <?= $value['name_uv'] ?>
                </span>
            </div>
        </div>
    </div>
    <div class="div_form_chitiet">
        <div class="CTV_online">
            <div class="div_online">
                <div class="div_online1">
                    <img src="../public/images/<?= $value['file_image'] ?>" alt="">
                    <div class="text_ungvien">
                        <h2><?= $value['name_uv'] ?></h2>
                        <p><?= $value['congviec_uv'] ?></p>
                        <div class="div_chitietungvien">
                            <div class="div_mahoso">
                                <i style='font-size:14px' class='fas'>&#xf406;</i><span> Mã hồ
                                    sơ: <?= $value['id_uv'] ?>
                                </span>
                            </div>
                            <div class="div_luotxem">
                                <i style='font-size:14px' class='far'>&#xf06e;</i><span>Lượt xem:123</span>
                            </div>
                            <div class="div_mapchitiet">
                                <i style="font-size: 14px" class="fas">&#xf3c5;</i>
                                <span> <?= $value['diachi_uv'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="div_luuchitiet" id="demo">
                    <div class="div_luuchitietungvien border">
                        <i style="font-size: 20px" class="far m-2">&#xf004;</i><span>Lưu việc làm</span>
                    </div>
                </div>
                <!-- </button> -->
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="d-flex flex-column-reverse flex-lg-row">
                        <div class="col-xl-8 div_thongtinungvien">
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="div_cho">
                                        <i style="font-size:20px" class="fas">&#xf3c5;</i>
                                        Chỗ ở hiện tại:<span><?= $value['diachi_uv'] ?></span>
                                    </div>
                                    <div class="div_cho">
                                        <i style='font-size:20px' class='fas'>&#xf0ac;</i>
                                        Nghề nghiệp :<button><a href="">Nghề tự do</a> </button>
                                    </div>
                                    <div class="div_cho">
                                        <i style='font-size:20px' class='fas'>&#xf1ad;</i>Nơi làm việc mong muốn:
                                        <span>
                                            <?= $value['noilamviec_uv'] ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="div_cho">
                                        <i style='font-size:18px' class='fas'>&#xf51b;</i>
                                        Hình thức làm
                                        việc:
                                        <span><?= ($value['hinhthuc_uv'] != '')?$array_hinh_thuc[$value['hinhthuc_uv']]:'' ?>
                                        </span>
                                    </div>
                                    <div class="div_cho">
                                        <i style='font-size:18px' class='fas'>&#xf406;</i>
                                        Cấp bậc mong muốn :
                                        <span><?= ($value['capbac_uv'] != '')?$array_capbac[$value['capbac_uv']]:'' ?></span>
                                    </div>
                                    <div class="div_cho">
                                        <i style='font-size:20px' class='fas'>&#xf4b9;</i>Mức lương mong muốn:
                                        <span><b> <?= $value['mucluong_uv'] ?> đ/ <?= $value['luong_date_uv'] ?></b>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="div_kynang">
                                <h2>Kỹ năng bản thân</h2>
                                <hr>
                                <p> <?= $value['motakynang_uv'] ?></p>
                            </div>
                            <div class="div_kinhnghiem">
                                <h2>Kinh nghiệm làm việc</h2>
                                <hr>
                                <?  
                                
                                  $query = "SELECT * FROM `vltg_kinh_nghiem` WHERE id_uv = ".$_COOKIE['UID'];
                                  $db_qr = new db_query($query);
                                  While($value = mysql_fetch_assoc($db_qr->result)){
                                ?>
                                <div style="height:280px;" ;>
                                    <div class=" div_noidungkinhnghiem">
                                        <h3><?= $value['tencongty_uv'] ?></h3>
                                        <p><?= $value['ngaybatdau_uv'] ?> - <?= $value['ngayketthuc_uv'] ?></p>
                                    </div>
                                    <div class="div_elip">
                                        <img src="../image/Ellipse 84.png" alt="">
                                        <div class="div_elip1">
                                            <img src="../image/Rectangle 602.png" alt="">
                                        </div>
                                    </div>
                                    <div class="div_nhanvienbaove">
                                        <h3><?= $value['chucdanh_uv'] ?></h3>
                                        <p><?= $value['motacongviec_uv_kn'] ?></p>

                                    </div>
                                </div>

                                <?
                                  }
                                  ?>


                            </div>
                            <div class="div_lichdilam">
                                <h2>Buổi có thể đi làm</h2>
                                <!-- <hr> -->
                                <form action="test.php" method="POST">
                                    <?php
                                        include('../home/config.php');
                                        if (!isset($_COOKIE['UID'])) {
                                            header('Location: ../home/login1.php');
                                        } else $id_uv = $_COOKIE['UID'];
                                        $query = "select * from vltg_buoidilam_uv where id_uv ='$id_uv'";
                                        $db_qr    = new db_query($query);
                                        if (mysql_num_rows($db_qr->result) > 0) {
                                            $value = mysql_fetch_assoc($db_qr->result);                                           
                                        }

                                        ?>

                                    <div class="wrapper">
                                        <div class="row h_chon_ngay_uv container container_h">
                                            <input type="button" class=" col-lg col" value="Thứ 2">
                                            <input type="button" class=" col-lg col" value="Thứ 3">
                                            <input type="button" class=" col-lg col" value="Thứ 4">
                                            <input type="button" class=" col-lg col" value="Thứ 5">
                                            <input type="button" class=" col-lg col" value="Thứ 6">
                                            <input type="button" class=" col-lg col" value="Thứ 7">
                                            <input type="button" class=" col-lg col" value="Chủ nhật">
                                        </div>
                                        <div class="container container_h">
                                            <label class="option_item">
                                                <input type="checkbox" class=" checkbox h_sang" name="t2_sang"
                                                    id="t2_sang" value=''>
                                                <div
                                                    class="option_inner <?php if($value['t2_sang'] == '1') {echo 'abc';} ?> ">
                                                    <div class="name">Sáng</div>
                                                </div>
                                            </label>
                                            <label class="option_item">
                                                <input type="checkbox" class="checkbox h_sang" name="t3_sang"
                                                    id="t3_sang" value=''>
                                                <div
                                                    class="option_inner <?php if($value['t3_sang'] == '1') {echo 'abc';} ?>">
                                                    <div class="name">Sáng</div>
                                                </div>
                                            </label>
                                            <label class="option_item">
                                                <input type="checkbox" class="checkbox h_sang" name="t4_sang"
                                                    id="t4_sang" value=''>
                                                <div
                                                    class="option_inner <?php if($value['t4_sang'] == '1') {echo 'abc';} ?>">
                                                    <div class="name">Sáng</div>
                                                </div>
                                            </label>
                                            <label class="option_item">
                                                <input type="checkbox" class="checkbox h_sang" name="t5_sang"
                                                    id="t5_sang" value=''>
                                                <div
                                                    class="option_inner <?php if($value['t5_sang'] == '1') {echo 'abc';} ?>">
                                                    <div class="name">Sáng</div>
                                                </div>
                                            </label>
                                            <label class="option_item">
                                                <input type="checkbox" class="checkbox h_sang" name="t6_sang"
                                                    id="t6_sang" value=''>
                                                <div
                                                    class="option_inner <?php if($value['t6_sang'] == '1') {echo 'abc';} ?>">
                                                    <div class="name">Sáng</div>
                                                </div>
                                            </label>
                                            <label class="option_item">
                                                <input type="checkbox" class="checkbox h_sang" name="t7_sang"
                                                    id="t7_sang" value=''>
                                                <div
                                                    class="option_inner <?php if($value['t7_sang'] == '1') {echo 'abc';} ?>">
                                                    <div class="name">Sáng</div>
                                                </div>
                                            </label>
                                            <label class="option_item">
                                                <input type="checkbox" class="checkbox h_sang" name="chu_nhat_sang"
                                                    id="chu_nhat_sang" value=''>
                                                <div
                                                    class="option_inner <?php if($value['chu_nhat_sang'] == '1') {echo 'abc';} ?>">
                                                    <div class="name">Sáng</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="container container_h">
                                            <label class="option_item">
                                                <input type="checkbox" class="checkbox h_chieu" name="t2_chieu"
                                                    id="t2_chieu" value=''>
                                                <div
                                                    class="option_inner <?php if($value['t2_chieu'] == '1') {echo 'abc';} ?>">
                                                    <div class="name">Chiều</div>
                                                </div>
                                            </label>
                                            <label class="option_item">
                                                <input type="checkbox" class="checkbox h_chieu" name="t3_chieu"
                                                    id="t3_chieu" value=''>
                                                <div
                                                    class="option_inner <?php if($value['t3_chieu'] == '1') {echo 'abc';} ?>">

                                                    <div class="name">Chiều</div>
                                                </div>
                                            </label>
                                            <label class="option_item">
                                                <input type="checkbox" class="checkbox h_chieu" name="t4_chieu"
                                                    id="t4_chieu" value=''>
                                                <div
                                                    class="option_inner <?php if($value['t4_chieu'] == '1') {echo 'abc';} ?>">

                                                    <div class="name">Chiều</div>
                                                </div>
                                            </label>
                                            <label class="option_item">
                                                <input type="checkbox" class="checkbox h_chieu" name="t5_chieu"
                                                    id="t5_chieu" value=''>
                                                <div
                                                    class="option_inner <?php if($value['t5_chieu'] == '1') {echo 'abc';} ?>">

                                                    <div class="name">Chiều</div>
                                                </div>
                                            </label>
                                            <label class="option_item">
                                                <input type="checkbox" class="checkbox h_chieu" name="t6_chieu"
                                                    id="t6_chieu" value=''>
                                                <div
                                                    class="option_inner <?php if($value['t7_chieu'] == '1') {echo 'abc';} ?>">
                                                    <div class="name">Chiều</div>
                                                </div>
                                            </label>
                                            <label class="option_item">
                                                <input type="checkbox" class="checkbox h_chieu" name="t7_chieu"
                                                    id="t7_chieu" value=''>
                                                <div
                                                    class="option_inner <?php if($value['t7_chieu'] == '1') {echo 'abc';} ?>">
                                                    <div class="name">Chiều</div>
                                                </div>
                                            </label>
                                            <label class="option_item">
                                                <input type="checkbox" class="checkbox h_chieu" name="chu_nhat_chieu"
                                                    id="chu_nhat_chieu" value=''>
                                                <div
                                                    class="option_inner <?php if($value['chu_nhat_chieu'] == '1') {echo 'abc';} ?>">
                                                    <div class="name">Chiều</div>
                                                </div>
                                            </label>

                                        </div>
                                        <div class="container container_h">
                                            <label class="option_item">
                                                <input type="checkbox" class="checkbox h_toi" name="t2_toi" id="t2_toi"
                                                    value=''>
                                                <div
                                                    class="option_inner <?php if($value['t2_toi'] == '1') {echo 'abc';} ?>">
                                                    <div class="name">Tối</div>
                                                </div>
                                            </label>
                                            <label class="option_item">
                                                <input type="checkbox" class="checkbox h_toi" name="t3_toi" id="t3_toi"
                                                    value=''>
                                                <div
                                                    class="option_inner  <?php if($value['t3_toi'] == '1') {echo 'abc';} ?>">

                                                    <div class="name">Tối</div>
                                                </div>
                                            </label>
                                            <label class="option_item">
                                                <input type="checkbox" class="checkbox h_toi" name="t4_toi" id="t4_toi"
                                                    value=''>
                                                <div
                                                    class="option_inner <?php if($value['t4_toi'] == '1') {echo 'abc';} ?>">

                                                    <div class="name">Tối</div>
                                                </div>
                                            </label>
                                            <label class="option_item">
                                                <input type="checkbox" class="checkbox h_toi" name="t5_toi" id="t5_toi"
                                                    value=''>
                                                <div
                                                    class="option_inner <?php if($value['t5_toi'] == '1') {echo 'abc';} ?>">

                                                    <div class="name">Tối</div>
                                                </div>
                                            </label>
                                            <label class="option_item">
                                                <input type="checkbox" class="checkbox h_toi" name="t6_toi" id="t6_toi"
                                                    value=''>
                                                <div
                                                    class="option_inner <?php if($value['t6_toi'] == '1') {echo 'abc';} ?>">
                                                    <div class="name">Tối</div>
                                                </div>
                                            </label>
                                            <label class="option_item">
                                                <input type="checkbox" class="checkbox h_toi" name="t7_toi" id="t7_toi"
                                                    value=''>
                                                <div
                                                    class="option_inner <?php if($value['t7_toi'] == '1') {echo 'abc';} ?>">
                                                    <div class="name">Tối</div>
                                                </div>
                                            </label>
                                            <label class="option_item">
                                                <input type="checkbox" class="checkbox h_toi" name="chu_nhat_toi"
                                                    id="chu_nhat_toi" value=''>
                                                <div
                                                    class="option_inner <?php if($value['chu_nhat_toi'] == '1') {echo 'abc';} ?>">
                                                    <div class="name">Tối</div>
                                                </div>
                                            </label>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="div_thogtincoban">
                                <h1>Thông tin cơ bản</h1>
                                <?php
                                        include('../home/config.php');
                                        if (!isset($_COOKIE['UID'])) {
                                            header('Location: ../home/login1.php');
                                        } else $id_uv = $_COOKIE['UID'];
                                        $query = "select * from vltg_user_uv where id_uv ='$id_uv'";
                                        $db_qr    = new db_query($query);
                                        if (mysql_num_rows($db_qr->result) > 0) {
                                            $value = mysql_fetch_assoc($db_qr->result);
                                          
                                        }

                                        ?>

                                <div class="thongtincanhan">
                                    <!-- <div class="div_thongtintennguoidung"> -->
                                    <p> Họ tên: <span><?= $value['name_uv'] ?></span></p>
                                    <hr>
                                    <p> Giới tính: <span>
                                            <?=  $value['gioitinh_uv'] ?>
                                        </span></p>
                                    <hr>
                                    <p>Ngày sinh: <span> <?= $value['ngaysinh_uv'] ?></span></p>
                                    <hr>
                                    <!-- </div> -->
                                    <!-- <div class="div_tengnuoidung"> -->
                                    <p> Hôn nhân: <span>Độc thân</span></p>
                                    <hr>
                                    <p> SĐT: <span> <?= $value['sdt_uv'] ?></span></p>
                                    <hr>
                                    <p> Email: <span> <?= $value['email_uv'] ?><br></span></p>
                                </div>
                                <!-- </div> -->
                            </div>
                            <div class="div_thogtincoban1">
                                <h1>Ứng viên liên quan</h1>
                                <!-- <div class="div_boxanhcanhan"> -->
                                <div class="thongtincanhan1">
                                    <div class="div_anhcanhan">
                                        <img src="../image/Ellipse 82.png" alt="">
                                    </div>
                                    <div class="div_thongtincanhan">
                                        <h2>Hoàng Thu Thủy</h2>
                                        <p><i style='font-size:14px' class='fas'>&#xf0b1;</i>Bếp trưởng</p>
                                        <p><i style="font-size:14px" class="fas">&#xf3c5;</i>Thanh Xuân, Hà Nội</p>
                                    </div>
                                    <hr>
                                </div>
                                <div class="thongtincanhan1">
                                    <div class="div_anhcanhan">
                                        <img src="../image/Ellipse 82 (9).png" alt="">
                                    </div>
                                    <div class="div_thongtincanhan">
                                        <h2>Hoàng Thu Thủy</h2>
                                        <p><i style='font-size:14px' class='fas'>&#xf0b1;</i>Bếp trưởng</p>
                                        <p><i style="font-size:14px" class="fas">&#xf3c5;</i>Thanh Xuân, Hà Nội</p>
                                    </div>
                                    <hr>
                                </div>
                                <div class="thongtincanhan1">
                                    <div class="div_anhcanhan">
                                        <img src="../image/Ellipse 82 (6).png" alt="">
                                    </div>
                                    <div class="div_thongtincanhan">
                                        <h2>Hoàng Thu Thủy</h2>
                                        <p><i style='font-size:14px' class='fas'>&#xf0b1;</i>Bếp trưởng</p>
                                        <p><i style="font-size:14px" class="fas">&#xf3c5;</i>Thanh Xuân, Hà Nội</p>
                                    </div>
                                    <hr>
                                    <!-- </div> -->
                                </div>
                                <!-- <div class="div_boxthongtin"> -->
                                <div class="thongtincanhan1">
                                    <div class="div_anhcanhan">
                                        <img src="../image/Ellipse 82 (5).png" alt="">
                                    </div>
                                    <div class="div_thongtincanhan">
                                        <h2>Hoàng Thu Thủy</h2>
                                        <p><i style='font-size:14px' class='fas'>&#xf0b1;</i>Bếp trưởng</p>
                                        <p><i style="font-size:14px" class="fas">&#xf3c5;</i>Thanh Xuân, Hà Nội</p>
                                    </div>
                                    <hr>
                                </div>
                                <div class="thongtincanhan1">
                                    <div class="div_anhcanhan">
                                        <img src="../image/Ellipse 82 (3).png" alt="">
                                    </div>
                                    <div class="div_thongtincanhan">
                                        <h2>Hoàng Thu Thủy</h2>
                                        <p><i style='font-size:14px' class='fas'>&#xf0b1;</i>Bếp trưởng</p>
                                        <p><i style="font-size:14px" class="fas">&#xf3c5;</i>Thanh Xuân, Hà Nội</p>
                                    </div>
                                    <hr>
                                </div>
                                <div class="thongtincanhan1">
                                    <div class="div_anhcanhan">
                                        <img src="../image/Ellipse 82 (1).png" alt="">
                                    </div>
                                    <div class="div_thongtincanhan">
                                        <h2>Hoàng Thu Thủy</h2>
                                        <p><i style='font-size:14px' class='fas'>&#xf0b1;</i>Bếp trưởng</p>
                                        <p><i style="font-size:14px" class="fas">&#xf3c5;</i>Thanh Xuân, Hà Nội</p>
                                    </div>
                                </div>
                            </div>
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <? include('../_share/footer.php');?>

        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <script src="../node_modules/slick-carousel/slick/slick.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
        </script>
        <script>
        $(document).ready(function() {
            $('#search_form,#search_form1').select2();

        });
        $("td").click(function() {
            var thaybg = $(this);
            thaybg.addClass('h_red');
            thaybg.toggleClass('h_blue');
        });
        $(".h_red").click(function() {
            $('#t2_sang').val(1);
            $('#t3_sang').val(1);
            $('#t4_sang').val(1);
            $('#t5_sang').val(1);
            $('#t6_sang').val(1);
            $('#t6_sang').val(1);
            $('#t7_sang').val(1);
            $('#chu_nhat_sang').val(1);
            $('#t2_chieu').val(1);
            $('#t3_chieu').val(1);
            $('#t4_chieu').val(1);
            $('#t5_chieu').val(1);
            $('#t6_chieu').val(1);
            $('#t6_chieu').val(1);
            $('#t7_chieu').val(1);
            $('#chu_nhat_chieu').val(1);
            $('#t2_toi').val(1);
            $('#t3_toi').val(1);
            $('#t4_toi').val(1);
            $('#t5_toi').val(1);
            $('#t6_toi').val(1);
            $('#t6_toi').val(1);
            $('#t7_toi').val(1);
            $('#chu_nhat_toi').val(1);
        });
        </script>

        <script>
        document.getElementById("demo").onclick = function() {
            myFunction()
        };

        function myFunction() {
            document.getElementById("demo").innerHTML = `
    <div class="div_luuchitietungvien border div_daluu">
      <button type="button" data-toggle="modal" data-target="#exampleModalll" class="btn-form1-submit01">
  <i style="font-size: 20px" class="far m-2">&#xf004;</i
    ><span>Đã lưu</span>
    </button>
    <div class="modal fade" id="exampleModalll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelll" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content div_modal_content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelll">Thông báo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="../image/Group 1463.png" alt="">
        <div class="div_modal1">
          Bạn có <b>96</b> điểm. Bạn có muốn dùng <span>1 điểm</span> để xem hồ sơ ứng viên này không?
          <div class="modal-footer div_modail_footer">
        <button type="button" class="btn btn-primary">Đồng ý</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
        <button type="button" class="btn btn-primary">Mua ngay</button>
      </div>
        </div>
      </div>
    </div>
  </div>
</div>
  </div>`;

        }
        </script>
</body>

</html>