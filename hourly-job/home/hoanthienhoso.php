<? 
session_start();
include("../home/config.php");
if(!isset($_COOKIE['xt']) && !isset($_COOKIE['UID']))
{
    header('Location: ../home/hoanthienhoso.php');
}
$xt = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Hoàn thiện hồ sơ</title>
    <link rel="stylesheet" type="text/css" href="../node_modules/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="../node_modules/slick-carousel/slick/slick-theme.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/css.css" />
</head>
<style>
.form-control:disabled,
.form-control[readonly] {
    background-color: #ffffff;
    opacity: 1;
}
</style>
<? 
include('../_share/hoanthienhoso_uv.php');
?>

<body>
    <? include('../_share/herder_hoso.php'); ?>
    <div class="div_thongtinhosocanhan">
        <div class="container-fluid">
            <div class="row">
                <? include('../_share/menu_hoanthien_hoso.php'); ?>
                <div class="col-xl-9 div_quanlythongtincoban">
                    <?php  include('../_share/menu_hoanthienhoso.php');?>
                    <div class="h_thongtincoban">
                        <h2>Thông tin cơ bản</h2>
                        <hr>
                        <form action="" method="post" onsubmit="return validateform()" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="h-ngaysinh">
                                        <label for=""><span>*</span>Ngày sinh</label>
                                        <div class="h_date">
                                            <select class="h_js-example-basic-single" name="ngaysinh_uv[]" id="date">
                                                <option value="0">Ngày</option>
                                                <?php for($i=1;$i<=31;$i++){?>
                                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                <?php }?>
                                            </select>
                                            <select class="h_js-example-basic-single" name="ngaysinh_uv[]" id="date1">
                                                <option value="">Tháng</option>
                                                <?php for($i=1;$i<=12;$i++){?>
                                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                <?php }?>
                                            </select>
                                            <select class="h_js-example-basic-single" name="ngaysinh_uv[]" id="date2">
                                                <option value="">Năm</option>
                                                <?php for($i=2020;$i>=1970;$i--){?>
                                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="h_gioitinhtthonnhan">
                                            <div class="h-gioitinh">
                                                <label for=""><span>*</span>Giới tính</label>
                                                <div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gioitinh_uv"
                                                            id="gioitinh_uv" value="Nam" checked>
                                                        <label class="form-check-label" for="inlineRadio1">Nam</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gioitinh_uv"
                                                            id="inlineRadio2" value="Nữ">
                                                        <label class="form-check-label" for="inlineRadio2">Nữ</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="h-gioitinh1">
                                                <label for="">Tình trạng hôn nhân</label>
                                                <div class="h_divhonnhan">
                                                    <div class="form-check form-check-inline h_form-check">
                                                        <input class="form-check-input" type="radio" name="tinhtrang_uv"
                                                            id="tinhtrang_uv" value="0">
                                                        <label class="form-check-label" for="inlineRadio1">Độc
                                                            thân</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" value="1"
                                                            name="tinhtrang_uv" id="tinhtrang_uv">
                                                        <label class="form-check-label" for="inlineRadio">Đã kết
                                                            hôn</label>
                                                    </div>
                                                </div>
                                                <span id="kethon_uv_capnhap"></span>
                                            </div>
                                        </div>
                                        <div class="form-group h_form-group">
                                            <label for=""><span>*</span>Họ và tên </label>
                                            <input type="text" class="form-control" id="name_uv" name="name_uv"
                                                value="<?=$value['name_uv']?>" placeholder="Mời bạn nhập họ và tên">
                                        </div>
                                        <span id="name_uv_capnhap"></span>
                                        <div class="form-group h_form-group">
                                            <label for=""><span>*</span>Số điện thoại </label>
                                            <input type="nember" class="form-control" id="sdt_uv"
                                                placeholder="Mời bạn nhập số điện thoại" name="sdt_uv"
                                                value="<?=$value['sdt_uv']?>" disabled>
                                        </div>
                                        <span id="sdt_uv_capnhap"></span>
                                        <div class="form-group h_form-group">
                                            <label for="">Email</label>
                                            <input type="text" class="form-control" id="email_uv" name="email_uv"
                                                placeholder="Mời bạn nhập email">
                                        </div>
                                        <span id="email_uv_capnhap"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="h-ngaysinh">
                                        <div class="avata">
                                            <div id="h_anh_hoanthienhoso">
                                                <img src="../image/user (1) 1.png" alt="">
                                                <div id="div_2_anh_ho_so">
                                                    <i class="fa fa-camera-retro" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <input type="file" id="file_image" name="file_image" />
                                        </div>
                                        <div class="form-group h_form-group1">
                                            <label for=""><span>*</span>Địa chỉ</label>
                                            <input type="text" class="form-control" id="diachi_uv" name="diachi_uv"
                                                placeholder="Mời bạn nhập địa chỉ" value="<?=$value['diachi_uv']?>">
                                        </div>
                                        <span id="diachi_uv_capnhap"></span>
                                        <div class="form-group h_form-group">
                                            <label for=""><span>*</span>Tỉnh/thành phố</label>
                                            <div class="h_div_select">
                                                <select class="form-control" id="date11" name="thanhpho_uv">
                                                    <?php
                                                    $sql = "select * from city where cit_id ='$thanhpho_uv'";			
                                                    $db_qr = new db_query($sql);
                                                    $row = mysql_fetch_assoc($db_qr->result);
                                                ?>

                                                    <option value="<? echo $thanhpho_uv?>">
                                                        <?php echo $row['cit_name'];?>
                                                    </option>
                                                    <?php 
                                            $sql ="select * from city";
                                            $db_qr = new db_query($sql);
                                            While($row = mysql_fetch_assoc($db_qr->result)){
                                                echo '<option value="'.$row["cit_id"].'">'.$row["cit_name"].'</option>';
                                            }
                                            
                                            ?>
                                                </select>

                                            </div>
                                            <span id="thanhpho_uv_capnhap"></span>
                                        </div>
                                        <div class="form-group h_form-group">
                                            <label for=""><span>*</span>Quận/huyện</label>
                                            <select class="form-control" id="date12" name="huyen_uv">
                                                <?php
                                                    $sql = "select * from city2 where cit_id ='$huyen_uv'";			
                                                    $db_qr = new db_query($sql);
                                                    $row = mysql_fetch_assoc($db_qr->result);
                                                ?> <option value="<? echo $huyen_uv?>">
                                                    <?php echo $row['cit_name'];?>
                                                </option>
                                            </select>
                                        </div>
                                        <span id="huyen_uv_capnhap"></span>
                                    </div>
                                </div>
                                <div class="h_button">
                                    <button type="submit" name="btn_luu" value="Submit" class="btn h_capnhap">
                                        Cập nhật
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("../_share/footer.php"); ?>
    <?php include('../_share/script_registration_uv.php') ?>
    <script>
    function validateform() {
        var ten = document.getElementById('name_uv').value;
        // var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        // var email = document.getElementById('email_uv').value;
        var diachi = document.getElementById('diachi_uv').value;
        var ckethon = document.getElementById('tinhtrang_uv').checked;
        var kethon = document.getElementById('tinhtrang_uv').checked;
        var status = true;
        if (ten == "") {
            document.getElementById('name_uv_capnhap').innerHTML = "Bạn chưa nhập đầy đủ thông tin họ và tên";
            status = false;
        } else document.getElementById('name_uv_capnhap').innerHTML = ""
        // if (email == "") {
        //     document.getElementById('email_uv_capnhap').innerHTML = "Bạn chưa nhập email";
        //     status = false;
        // } else if (email.match(mailformat) == null) {
        //     document.getElementById('email_uv_capnhap').innerHTML = "Bạn nhập chưa đúng định dạng email";
        //     status = false;
        // } else document.getElementById('email_uv_capnhap').innerHTML = "";
        if (diachi == "") {
            document.getElementById('diachi_uv_capnhap').innerHTML = "Bạn chưa nhập địa chỉ";
            status = false;
        } else document.getElementById('diachi_uv_capnhap').innerHTML = "";
        if (kethon == false && ckethon == false) {
            document.getElementById('kethon_uv_capnhap').innerHTML = "Mời bạn nhập trạng thái";
            status = false;
        } else document.getElementById('kethon_uv_capnhap').innerHTML = "";
        return status;
    }
    </script>
</body>

</html>