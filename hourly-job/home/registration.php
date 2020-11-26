<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Đăng ký</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/css.css" />
</head>

<body>
    <div class="wapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 tin">
                    <div class="icon1">
                        <a href=""><img src="../image/.png" alt="" /></a>
                    </div>
                    <div class="logo"></div>
                    <div class="anhone">
                        <img src="../image/12.png" alt="" />
                    </div>
                    <div class="textone">
                        Tìm việc làm theo giờ hiệu quả về di động của bạn và sẵn sàng nhận
                        việc ngay hôm nay!
                    </div>
                    <div class="buttonone">
                        <div class="button1">
                            <button type="button" class="btn btn-primar11">
                                <a href="" class="text-dark"><img src="../image/apptimviec 1.png" alt="" />Tải app
                                    Timviec365
                                </a>
                            </button>
                        </div>
                        <div class="button11 div_button_one">
                            <button type="button" class="btn btn-primar11 icon1">
                                <div href="" class="text-dark">
                                    <img src="../image/Group 6 (1) 1.png" alt="" />Tải app
                                    Timviec365
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 tin1">
                    <div class="tieude">
                        <h2>đăng ký tài khoản nhà tuyển dụng</h2>
                    </div>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-6 tin2">
                                <div class="text3"><samp>*</samp>Tải lên logo</div>
                                <div class="avata">
                                    <div id="div_1">
                                        <div id="div_2">
                                            <i class="fa fa-camera-retro" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <input type="file" id="upload_file" />
                                </div>
                                <div class="form2">
                                    <div class="form-group">
                                        <label for=""><span>*</span>Số điện thoại</label>
                                        <input type="" class="form-control" id="" aria-describedby="emailHelp"
                                            placeholder="Nhập số điện thoại" />
                                    </div>
                                    <div class="form-group">
                                        <label for=""><span>*</span>Mật khẩu</label>
                                        <input type="password" class="form-control" id="" placeholder="Nhập mật khẩu" />
                                    </div>
                                    <div class="form-group">
                                        <label for=""><span>*</span>Nhập lại mật khẩu</label>
                                        <input type="" class="form-control" id="" placeholder="Nhập lại mật khẩu" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 tin3">
                                <div class="form-group">
                                    <label for=""><span>*</span>Tên doanh nghiêp</label>
                                    <input type="" class="form-control" id="" aria-describedby=""
                                        placeholder="Nhập tên doanh nghiêp " />
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="" class="form-control" id="" placeholder="Nhập email" />
                                </div>
                                <div class="form-group">
                                    <label for=""><span>*</span>Địa chỉ</label>
                                    <input type="" class="form-control" id="" placeholder="Nhập địa chỉ" />
                                </div>
                                <div class="form-group">
                                    <label for=""><span>*</span>Tỉnh/thành phố</label>
                                    <select class="form-control" id="">
                                        <option selected>Chọn Tỉnh/Thành phố</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for=""><span>*</span>Quận/huyện</label>
                                    <select class="form-control" id="">
                                        <option selected>Chọn Quận/Huyện</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="button01">
                            <button type="submit" value="Submit" class="btn btn-lg">
                                Đăng ký
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
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
    crossorigin="anonymous"></script>
<script>
$("#div_1").click(function() {
    $("#upload_file").click();
});
</script>

</html>