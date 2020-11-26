<?php
    include_once 'config.php';
    if (isset($_COOKIE['UID'])) {
        $UID = $_COOKIE['UID'];
    }
    $false = 0;
    $sql ="select ma_otp from flc_user_ntd where ma_ntd = $UID";
    $db_qr = new db_query($sql);
    $row = mysql_fetch_assoc($db_qr->result);
    if (isset($_POST['submit_otp'])) {
        $otp_ntd = $_POST['otp_ntd'];
        $otp = $row['ma_otp'];
        if ($otp == $otp_ntd) {
            $data = [
                'xac_thuc' =>' 1',
            ];
            $condition = [
                'ma_ntd' => $UID,
            ];
            update('flc_user_ntd',$data,$condition);
            redirect('dang-ky-thanh-cong.php');
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
                    <p id="text2">
                        Bạn vui lòng kiểm tra tin nhắn và nhập mã OTP để xác nhận đăng ký thuê Freelancer</p>
                </div>
                <div class="M-OTP-Freelancer-content-input">
                    <?php if($false == 1) echo '<label style="color:red">Mã OTP của bạn nhập vào không đúng !!!</label>'; ?>
                    <form action="#" method="POST">
                        <input type="text"placeholder="Nhập mã xác nhận" name="otp_ntd">
                        <button name="submit_otp">Xác nhận</button>
                    <form action="">
                        <input type="text"placeholder="Nhập mã xác nhận">
                        <button>Xác nhận</button>
                    </form>
                </div>
                <div class="M-OTP-Freelancer-content-text3">
                    Bạn chưa nhận được mã? <a href=""> GỬI LẠI MÃ </a> <p> (50)</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>