<?php
  
    if (isset($_COOKIE['UID'])) {
        header("Location: index.php"); 
    }
    else{
        include_once '../xl_code/xl_loginntd.php';
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
                        <a href="AccountEmployer.php">Đăng ký ngay</a>
                    </div>
                </div>
                <div class="content-2">
                    <div id="button1">
                        <a href="loginntd.php">Nhà tuyển dụng</a>
                    </div>
                    <div id="button2">
                        <a href="loginuv.php">Freelancer</a>
                    </div>
                </div>
                <div style="color:red; font-family:Roboto-Regular;text-align:center;margin-top:40px;">
                    <?php
                        if ($false == 1) {
                            echo 'Mật khẩu bạn nhập không chính xác xin thử lại';
                        }else if ($false == 2){
                            echo 'Số điện thoại không đúng, xin thử lại';
                        }
                        else if ($false == 0){
                            echo '';
                        }
                    ?>
                </div>
                <div class="form-loginntd">
                   <form action="#" method="post">
                        
                        <div id="input1">
                            <input type="text" name="sdt_ntd" placeholder="Nhập số điện thoại" name="sdt_ntd" value="<?php if(isset($_POST['button-loginntd'])) echo $_POST['sdt_ntd']; ?>">
                        </div>
                        <div id="input2">
                            <input type="password" placeholder="**********" name="password_ntd">
               
                        </div>
                        <div id="button">
                            <button name="button-loginntd">Đăng nhập</button>
                        </div>
                        <div id="repassword">
                            <a href="quen-mat-khau.php">Quên mật khẩu?</a>
                        </div>
                   </form>
                </div>
            </div>
            <div class="right">
                <img class="img-desktop" src="../image/img/Frame1.png" alt="">
                <img class="img-tablet" src="../image/img/Group 2257.png" alt="">
                <img class="img-mobile" src="../image/img/Group 2258.png" alt="">
                <img class="img-mobile1" src="../image/img/Group.png" alt="">
            </div>
        </div>
    </div>
</body>
</html>
    <?php }?>

