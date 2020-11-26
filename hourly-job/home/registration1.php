<?php   
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Đăng ký</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/css.css" />
</head>
<style>
label.error {
    color: red;
    font-size: 14px;
    font-style: normal;
    font-weight: ;

}
</style>
<?php  include('../_share/registration_uv.php');?>

<body>
    <div class="wapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 tin4">
                    <div class="icon1">
                        <a href="http://localhost:8891/hourly-job/home/">
                            <img src="../image/.png" alt="" />
                        </a>
                    </div>
                    <div class="logo"></div>
                    <div class="anh1">
                        <img src="../image/Frame12.png" alt="" />
                    </div>
                    <div class="textone">Tìm việc làm theo giờ hiệu quả về di động của bạn và sẵn sàng nhận việc ngay
                        hôm nay ! </div>
                    <div class="buttonone">
                        <div class="button1">
                            <button type="button" class="btn btn-primar11">
                                <a href="" class="text-dark">
                                    <img src="../image/apptimviec 1.png" alt="" />Tải app
                                    Timviec365 </a>
                            </button>
                        </div>
                        <div class="button11 div_button_one">
                            <button type="button" class="btn btn-primar11 icon1">
                                <div href="" class="text-dark">
                                    <img src="../image/Group 6 (1) 1.png" alt="" />Tải app Timviec365
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 tin1">
                    <form action="" method="POST" id="validation" enctype="multipart/form-data" class="demoForm"
                        onsubmit="return validateform()">
                        <div class="tieude">
                            <h2>đăng ký tài khoản ứng viên</h2>
                        </div>
                        <div class="row form-row">
                            <div class="col-md-6 tin2">
                                <div class="text3">Tải lên logo</div>
                                <div class="avata">
                                    <div id="div_1">
                                        <div id="div_2">
                                            <i class="fa fa-camera-retro" aria-hidden="true"></i>
                                        </div>
                                        <div id="imagePreview"></div>
                                    </div>
                                    <input class="hidden" type="file" id="file_image" name="file_image"
                                        onchange="return fileValidation()" />
                                    <?= isset($errors['file_image']) ? $errors['file_image'] : '' ?>
                                </div>
                                <div class="form2">
                                    <div class="form-group">
                                        <label for=""><span>*</span>Họ và tên</label>
                                        <input type="text" class="form-control" name="name_uv" id=" name_uv"
                                            placeholder="Nhập họ và tên">
                                    </div>
                                    <div class="form-group">
                                        <label for=""><span>*</span>Số điện thoại</label>
                                        <input type="text" class="form-control" id="sdt_uv" name="sdt_uv"
                                            placeholder="Nhập số điện thoại" />
                                        <span id="loi_sdt_NTD"></span>
                                    </div>


                                    <div class="form-group">
                                        <label for=""><span>*</span>Mật khẩu</label>
                                        <input type="password" class="form-control" id="password_uv" name="password_uv"
                                            placeholder="Nhập mật khẩu" />
                                    </div>
                                    <div class="form-group">
                                        <label for=""><span>*</span>Nhập lại mật khẩu</label>
                                        <input type="password" class="form-control" id="cppassword_uv"
                                            name="cppassword_uv" placeholder="Nhập lại mật khẩu" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 tin3">
                                <div class="form-group">
                                    <label for=""><span>*</span>Địa chỉ</label>
                                    <input type="text" class="form-control" name="diachi_uv" aria-describedby=""
                                        placeholder="Nhập địa chỉ " />
                                </div>
                                <div class="form-group h_form-group">
                                    <label for=""><span>*</span>Tỉnh/thành phố</label>
                                    <div class="h_div_select">
                                        <select class="form-control" id="date11" name="thanhpho_uv">
                                            <option value="">--Chọn tỉnh/thành phố--</option>
                                            <?php 
                                            $sql ="select * from city";
                                            $db_qr = new db_query($sql);
                                            While($row = mysql_fetch_assoc($db_qr->result)){
                                                echo '<option value="'.$row["cit_id"].'">'.$row["cit_name"].'</option>';
                                            }
                                            
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group h_form-group">
                                    <label for=""><span>*</span>Quận/huyện</label>
                                    <div class="h_div_select">
                                        <select class="form-control" id="date12" name="huyen_uv" reqired>
                                            <option value="">--Chọn quận/huyện--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for=""><span>*</span>Công việc mong muốn</label>
                                    <input type="" class="form-control" name="congviec_uv"
                                        placeholder="Nhập tên công việc muốn chọn" />
                                </div>
                                <div class="form-group">
                                    <label for=""><span>*</span>Nơi làm việc mong muốn</label>
                                    <div class="h_div_select">
                                        <select class="form-control" id="noilamviec_uv" multiple="multiple"
                                            name="noilamviec_uv[]" required>
                                            <?php
                                            $languages_result = mysql_query("SELECT * FROM city");
                                            $i=0;
                                            while($languages_stack = mysql_fetch_array($languages_result)) {
                                            ?>
                                            <option value="<?=$languages_stack["cit_id"];?>">
                                                <?=$languages_stack["cit_name"];?></option>
                                            <?php
                                            $i++;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group"><label for=""><span>*</span>Ngành nghề mong muốn</label>
                                    <div class="h_div_select">
                                        <select class="form-control" id="nganh_uv" multiple="multiple" name="nganh_uv[]"
                                            required>
                                            <?php 
                                            $sql ="select * from category";
                                            $db_qr = new db_query($sql);
                                            While($row = mysql_fetch_assoc($db_qr->result)){
                                                echo '<option value="'.$row["cat_id"].'">'.$row["cat_name"].'</option>';
                                            }
                                            
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="button01">
                            <button type="submit" name="btn_luu" value="Submit" class="btn btn-lg">Đăng ký
                            </button>
                            <div class="forget-pw">
                                <div class="resigner">
                                    <span>Bạn chưa có tài khoản? <a href="">đăng ký ngay</a></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include('../_share/script_registration_uv.php'); ?>
</body>

</html>