<?php require_once 'checkUv.php'; ?>
<?php 
    include('config.php');
    if(isset($_COOKIE['UID'])){
        if ($_COOKIE['UT'] == 0) {
            $ma_user = $_COOKIE['UID'];
            $sql = new db_query("SELECT * FROM flc_user_freelancer where ma_user = '$ma_user'");        
            // print_r($sql);
            $row = mysql_fetch_assoc($sql->result);
            $ma_otp = $row['ma_otp'];
            // $xac_thuc = $row['xac_thuc'];
            // echo $ma_otp;
            if (isset($_POST['otp'])) {
               $data = [
                    'xac_thuc' => 1,
                ];
                $condition = [
                    'ma_user' => $ma_user,
                ];
                update('flc_user_freelancer',$data,$condition);
                header('Location:dang-ky-thanh-cong.php');
            }
        }
    }else{
        echo "không có cookie";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác thực tài khoản</title>
    <link rel="stylesheet" href="../css/loginntd.css">
    <link rel="stylesheet" href="../image/icon/fa-icon/css/all.css">
</head>
<body>
    <div class="M-OTP-Freelancer">
        <div class="M-OTP-Freelancer-content">
            <div class="M-OTP-Freelancer-content-text">
                <div class="M-OTP-Freelancer-content-text1">
                    Xác thực mã OTP
                </div>
                <div class="M-OTP-Freelancer-content-text2">
                    <p id="text1">Mã OTP đã được gửi đến số điện thoại của bạn.</p>
                    <p id="text2">Bạn vui lòng kiểm tra tin nhắn và nhập mã OTP để xác nhận.</p>
                </div>
                <div class="M-OTP-Freelancer-content-input">
                <span id="error">
                    <?php if (isset($_GET['error'])) { 
                        echo $_GET['error'];
                    } ?>
                </span>
                    <form method="post" action="#" onsubmit="return validateOtp()" onchange="return validateOtp(this)" >
                        <input type="hidden" value="<?php echo $ma_otp ?>" name="ma_otp" id="ma_otp">
                        <!-- <input type="hidden" value="<?php echo $xac_thuc ?>" name="xac_thuc"> -->
                        <input type="text"placeholder="Nhập mã xác nhận" name="nhap_du_lieu" id="nhap_du_lieu">
                        <button type="submid" name="otp">Xác nhận</button>
                    </form>
                </div>
                <div class="M-OTP-Freelancer-content-text3">
                    Bạn chưa nhận được mã? <a href=""> GỬI LẠI MÃ </a> <p> (50)</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <?php require_once '../function/GiangFunction.php'; ?>
</body>
</html>