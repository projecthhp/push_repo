<?php   
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/css.css" />
</head>
<? 
include("../home/config.php"); 
$fail = 0;
if(isset($_COOKIE['UID']))
{
	header('Location: ../home/index.php');  
}
$db_qrss = new db_query("SELECT * FROM vltg_user_uv");

if(isset($_POST['btn_submit']))
{
   $sdt_uv    = $_POST['sdt_uv'];
   $password_uv = $_POST['password_uv'];
   $password_uv = sha1($password_uv);
   if($sdt_uv != '' && $password_uv != '')
   {
      $query = "SELECT * FROM vltg_user_uv WHERE sdt_uv = '$sdt_uv' AND password_uv = '$password_uv'";
      $db_qr    = new db_query($query);
      if(mysql_num_rows($db_qr->result) > 0)
      {
         $row = mysql_fetch_assoc($db_qr->result);
         setcookie('UT', 0 ,time() + 7*6000,'/');
         setcookie('UID', $row['id_uv'] ,time() + 7*6000,'/');
         setcookie('PHPSESPASS', $password_uv ,time() + 7*6000,'/');
         header('Location: ../home/hoanthienhoso.php');
      }  
      else
      {
         $fail = 1;
      }
   }
   else
   {
      $fail = 0;
   }
} 
?>

<body>
    <div class="wapper">
        <div class="container-fluid h_container-fluid">
            <div class="row">
                <div class="col-lg-4 box">
                    <div class="icon">
                        <a href="http://localhost:8891/hourly-job/home/">
                            <img src="../image/.png" alt="" />
                        </a>
                    </div>
                    <div class="logo"></div>
                    <div class="anh">
                        <img src="../image/ungvien.png" alt="" />
                    </div>
                    <div class="textone">
                        Tìm việc làm theo giờ hiệu quả về di động của bạn và sẵn sàng nhận
                        việc ngay hôm nay!
                    </div>
                    <div class="col align-self-center">
                        <div class="button201">
                            <button type="button" class="btn btn-primar11">
                                <a href="" class="text-dark"><img src="../image/apptimviec 1.png" alt="" />Tải app
                                    Timviec365
                                </a>
                            </button>
                            <button type="button" class="btn btn-secondar11">
                                <a href="" class="text-dark"><img src="../image/app_mk.png" alt="" /> Tải app
                                    CV365</a>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 box1 bg-login">
                    <form action="" method="POST" name="myform" id="form-login" onsubmit="return validateform()">
                        <div class="loginer h_loginer">
                            <h2>đăng nhập tài khoản ứng viên</h2>
                        </div>
                        <div class="form-login h_form-login">
                            <div class="form h_form_login1">
                                <div>
                                    <div class="form-controler h-form-controler">
                                        <i class="fa">&#xf095;</i>
                                        <input type="text" name="sdt_uv" id="sdt_uv"
                                            value="<?= isset($sdt_uv)?$sdt_uv:'' ?>" placeholder="Nhập số điện thoại" />
                                    </div>
                                    <div style="color: red;font-size: 15px; margin-left: 20px; ">
                                        <span id="xuly"></span>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-controler h-form-controler">
                                        <i class="material-icons">&#xe898;</i>
                                        <input type="password" name="password_uv" id="password_uv"
                                            placeholder="**********" value="" />
                                    </div>
                                    <div style="color: red;font-size: 15px; ;margin-left: 20px;">
                                        <? if($fail == 1){?>Thông tin mật khẩu nhập không chính xác.
                                        <?}?>
                                    </div>
                                    <div style=" color: red;font-size: 15px;margin-left: 20px;">
                                        <span id="password1"></span>
                                    </div>
                                </div>
                                <div class="submit-control">
                                    <button class="btn-sm" id="btn_submit" name="btn_submit" type="submit">Đăng
                                        nhập</button>
                                </div>
                            </div>
                        </div>
                        <div class="forget-pw">
                            <div class="fg-pw">
                                <a href="">Quên mật khẩu ?</a>
                            </div>
                            <div class="resigner">
                                <span>Bạn chưa có tài khoản? <a href="">đăng ký ngay</a></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include('../_share/script_registration_uv.php') ?>
</body>

</html>