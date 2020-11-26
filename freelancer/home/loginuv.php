<?php 
    require_once '../home/config.php';
    
    $false = 0;
    if (isset($_POST['dang_nhap'])) {
        
        $so_dien_thoai      = $_POST['so_dien_thoai'];
        $mat_khau           = $_POST['mat_khau'];
        $sign_in = new db_query("SELECT * FROM flc_user_freelancer WHERE so_dien_thoai = '".$so_dien_thoai."' AND mat_khau = '".$mat_khau."' ");
        $dem = mysql_num_rows($sign_in->result);
        if ($dem > 0) {
            $row = mysql_fetch_assoc($sign_in->result);
            $ma_user = $row['ma_user'];
            $xac_thuc = $row['xac_thuc'];
            setcookie('UID', $ma_user, time() + 3600, "/");
            setcookie('UT','0', time() + 3600, "/");
            header('Location:index.php');
        }
        else if($dem < 1){
            $check = new db_query("SELECT ho_va_ten FROM flc_user_freelancer WHERE so_dien_thoai = '$so_dien_thoai'");
            if (mysql_num_rows($check ->result) > 0) {
                $false = 3;
            }else{
                $false = 2;
            }
        }
        else{
            $false = 1;
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/loginntd.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <div class="loginntd">
        <a href=""><i class="fas fa-long-arrow-alt-left" style="margin-left:26px; margin-top:10px" ></i></a>
        <div class="loginntd-1">
            <div class="left">
                <div class="content-1">
                    <b>Đăng nhập</b>
                    <div>
                        <p>Bạn chưa có tài khoản?</p>
                        <a href="AccountFreelancer.php">Đăng ký ngay</a>
                    </div>
                </div>
                <div class=" content-2 contentuv-2">
                    <div id="button1" class="uv1">
                        <a href="loginntd.php" >Nhà tuyển dụng</a>
                    </div>
                    <div id="button2" class="uv2">
                        <a href="loginuv.php" >Freelancer</a>
                    </div>
                </div>
                <div class="form-loginntd">
                   <form action="" method="post" id="form_login">
                        <div id="input1">
                            <span class="success" id="error">
                                <?php 
                                    if ($false == 1) {
                                        echo "Thông tin không hợp lệ!";
                                    }
                                    if ($false == 2) {
                                        echo "Số điện thoại không tồn tại!";
                                    }
                                    if ($false == 3) {
                                        echo "Mật khẩu sai!";
                                    }
                                ?>
                            </span>
                            <input name="so_dien_thoai" type="text" placeholder="Nhập số điện thoại" value="<?php if(isset($_POST['dang_nhap'])) echo $_POST['so_dien_thoai']; ?>">
                        </div>
                        <div id="input2">
                            <input name="mat_khau" type="password" placeholder="**********">
                        </div>
                        <div id="button">
                            <button type="submit" name="dang_nhap" id="dang_nhap">Đăng nhập</button>
                        </div>
                    </form>
                    <div id="repassword">
                        <a href="quen-mat-khau.php">Quên mật khẩu?</a>
                    </div>
                </div>
            </div>
            <div class="right">
                <img class="img-tablet" src="../image/img/Group 2259.png" alt="">
                <img class="img-mobile" src="../image/img/Frame3.png" alt="">
                <img class="img-mobile1" src="../image/img/Group 2260.png" alt="">
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>