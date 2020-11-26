<<<<<<< HEAD
<?php
    include_once 'config.php';
   include_once 'check_ntd.php';
           $false = 0;
            $UID = $_COOKIE['UID'];
        if (isset($_POST['submit_doi_mat_khau'])) {
            $password = md5($_POST['password']);
            $mat_khau_moi = $_POST['newpassword'];
            $sql ="select ten_ntd from flc_user_ntd where ma_ntd = '$UID' and mat_khau_ntd = '$password'";
            $db_qr = new db_query($sql);
            $row = mysql_fetch_assoc($db_qr->result);
            if (mysql_num_rows($db_qr ->result) > 0) {
                $data = [
                    'mat_khau_ntd' => md5($mat_khau_moi),
                ];
                $condition = [
                    'ma_ntd' => $UID,
                ];
                update('flc_user_ntd',$data,$condition);
                $id = mysql_update_id();
                printf($id);
            }else {
                $false =1;
            }
        }
?>
=======
<<<<<<< HEAD
<?php
    
?>
=======
>>>>>>> c286fd59... Giang push 12/11/2020
>>>>>>> 12bb0cb9ff663446bb65b5a9c100a529c228166a
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Đổi mật khẩu</title>
        <!-- CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/GiangCSS/All.css">
        <link rel="stylesheet" href="../css/all.css">
        <script src="../js/all.js"></script>
    </head>
    <body>
        <div class="M-GeneralManagement">
            <style> 
            
                .M-GeneralManagement-left{
                    float:left;
                    width:303px;
                    height:901px;
                    background-color:white;
                    margin-left: 55px;
                    background-image:url('../image/img/Rectangle 640.png');
                    background-repeat:no-repeat;
                    background-position:top;
                    background-size :100%;
                    margin-top:40px;
                    float:left;
                    background: #FFFFFF;
                    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.05);
                    border-radius: 5px;
                }
                .M-GeneralManagement-left-img{
                    margin-top:74px;
                    text-align:center;
                }
                .M-GeneralManagement-left-text1{
                    text-align:center;  
                    margin-top:13px;
                    font-weight: 500;
                    font-size: 18px;
                    line-height: 21px;
                    color: #252E3B;
                    font-family:Roboto-Medium;
                }
                
                .M-GeneralManagement-left-text2{
                    background: #F8971C;
                    border-radius: 100px;
                    width:191px;
                    margin:0 auto;
                    font-family: Roboto-Regular;
                    font-style: normal;
                    font-weight: 500;
                    font-size: 16px;
                    line-height: 19px;
                    color: #FFFFFF;
                    padding:7px 28px 7px 28px;
                    margin-top: 27px;
                }
                .M-GeneralManagement-left-menu5,
                .M-GeneralManagement-left-menu4,
                .M-GeneralManagement-left-menu3,
                .M-GeneralManagement-left-menu2,
                .M-GeneralManagement-left-menu1,
                .M-GeneralManagement-left-menu{
                    font-size: 16px;
                    line-height: 24px;
                    color: #575E66;
                    font-family: Roboto-Regular;
                    margin-top:21px;
                    margin-left: 16px;
                }
                
                .M-GeneralManagement-left-menu img{
                    margin-right:15px;
                    margin-left:20px;
                }
                .M-GeneralManagement-left-menu1 img{
                    margin-right:15px;
                    margin-left:20px;
                }
                .M-GeneralManagement-left-menu2 img{
                    margin-right:8px;
                    margin-left:20px;
                }
                .M-GeneralManagement-left-menu3 img{
                    margin-right:8px;
                    margin-left:20px;
                }
                .M-GeneralManagement-left-menu4 img{
                    margin-right:13px;
                    margin-left:20px;
                }
                .M-GeneralManagement-left-menu5 img{
                    margin-right:15px;
                    margin-left:20px;
                }
                .M-GeneralManagement-left-menu1 i{
                    margin-left: 29px;
                    transform: rotate(-90deg);
                }
                .M-GeneralManagement-left-menu4 i{
                    margin-left:93px;
                    transform: rotate(-90deg);
                }
                .M-GeneralManagement-left-menu5 i{
                    margin-left:69px;
                    transform: rotate(-90deg);
                }
            
                /* xử lý nút của menu */
                .M-GeneralManagement-left-menu1-click{
                    font-size: 16px;
                    line-height: 24px;
                    color: #575E66;
                    font-family: Roboto-Regular;
                    margin-top:21px;
                    margin-left: 16px;
                    background: linear-gradient(90deg, #5990FF 0%, #72CCFF 100%);
                    border-radius: 0px 0px 100px 0px;
                    padding:11px 11px 11px 0px;
                    color: #FFFFFF;
                }
                .M-GeneralManagement-left-menu1-click img{
                    margin-right:15px;
                    margin-left:20px;
                }
                .btn-click ul{
                    display:none;
                }
                .btn-click.action ul{
                    display:block;
                }
                .btn-click #img1{
                    display:inline;
                }
                .btn-click #img2{
                    display:none;
                }
                .btn-click.action #img1{
                    display:none;
                }
                .btn-click.action #img2{
                    display:inline;
                }

                .btn-click.action{
                    font-size: 16px;
                    line-height: 24px;
                    color: #575E66;
                    font-family: Roboto-Regular;
                    margin-top:21px;
                    /* margin-left: 16px; */
                    background: linear-gradient(90deg, #5990FF 0%, #72CCFF 100%);
                    border-radius: 0px 0px 100px 0px;
                    padding:11px 11px 11px 0px;
                    color: #FFFFFF;
                }
                .M-GeneralManagement-left-menu1 .btn-click.action i {
                    margin-left: 21px;
                    transform: none;
                }
                .M-GeneralManagement-left-menu5 .btn-click.action i {
                    margin-left: 63px;
                    transform: none;
                }
                .M-GeneralManagement-left-menu4 .btn-click.action i {
                    margin-left: 83px;
                    transform: none;
                }
                .btn-click.action img{
                    margin-right:15px;
                    margin-left:20px;
                }
                /* end xử lsy nút menu */
                .M-GeneralManagement-left-menu-hover{
                    margin-top:41px;
                }
                .M-GeneralManagement-left li{
                    font-size: 16px;
                    line-height: 24px;
                    color: #575E66;
                    font-family: Roboto-Regular;
                    margin-top:15px;
                    margin-left: 20px;
                }
                .M-GeneralManagement-left li a{
                    font-size: 16px;
                    line-height: 24px;
                    color: #575E66;
                    font-family: Roboto-Regular;
                }
                .M-GeneralManagement-left ul{
                    margin-top:20px;
                }
                .btn-ul{
                    display:none;
                }
                .btn-ul.action{
                    display: block;
                    transition: 0.5s;
                }
            </style>
            <div class="M-GeneralManagement-left">
                <div class="M-GeneralManagement-left-img">
                    <img src="../image/img/Group 2389.png" alt="">
                </div>
                <div class="M-GeneralManagement-left-text1">
                    Hoàng Thị Lan
                </div>
                <div class="M-GeneralManagement-left-text2">
                    Số điểm còn lại: <strong>8</strong>
                </div>
                <div class="M-GeneralManagement-left-menu-hover" >
                    <div class="M-GeneralManagement-left-menu" >
                    <div class="btn-click action">
                            <img id="img1" src="../image/icon/Group (1).png" alt="">
                            <img id="img2" src="../image/icon/Group (4).png" alt="">
                            Quản lý chung
                    </div>
                    </div>
                    <div class="M-GeneralManagement-left-menu1" >
                        <div class="btn-click">
                            <img id="img1" src="../image/icon/send 1.png" alt="">
                            <img id="img2" src="../image/icon/send 1 (1).png" alt="">    
                            Tuyển dụng Freelancer
                            <i class="fas fa-caret-down"></i>
                        </div>
                            <ul class="btn-ul">
                                <li><a href="">Đăng việc theo dự án</a></li>
                                <li><a href="">Đăng việc bán thời gian</a></li>
                            </ul>
                            
                    </div>
                    <div class="M-GeneralManagement-left-menu2 ">
                        <div class="btn-click">
                            <img id="img1" src="../image/icon/laptop 1.png" alt="">
                            <img id="img2" src="../image/icon/laptop 1 (1).png" alt="">
                            Tin đã đăng
                        </div>
                    </div>
                    <div class="M-GeneralManagement-left-menu3">
                        <div class="btn-click">
                            <img src="../image/icon/focus 1.png" alt="">
                            Tìm kiếm Freelancer
                        </div>
                    </div>
                    <div class="M-GeneralManagement-left-menu4 ">
                        <div class="btn-click">
                            <img id="img1" src="../image/icon/Group 2401 (1).png" alt="">  
                            <img id="img2" src="../image/icon/Group 2401 (2).png" alt="">   
                            Quản lý hồ sơ
                            <i class="fas fa-caret-down"></i>
                        </div>
                        <ul class="btn-ul">
                            <li><a href="">Đăng việc theo dự án</a></li>
                            <li><a href="">Đăng việc bán thời gian</a></li>
                        </ul>
                    </div>
                    <div class="M-GeneralManagement-left-menu5">
                        <div class=" btn-click">
                            <img id="img1" src="../image/icon/user 2.png" alt="">   
                            <img id="img2" src="../image/icon/user 2 (1).png" alt="">    
                            Quản lý tài khoản
                            <i class="fas fa-caret-down"></i>
                        </div>
                        <ul class="btn-ul">
                            <li><a href="">Cập nhật thông tin</a></li>
                            <li><a href="">Đổi mật khẩu</a></li>
                            <li><a data-toggle="modal" data-target="#logout">Đăng xuất</a></li>    
                            <!-- modal -->
                                <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header btn-modal-call">
                                                <h5 class="modal-title">Thông báo</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            <div class="modal-body btn-modal-call-body">
                                                    <img src="../image/icon/Group 1463.png" alt=""> 
                                                    <p>Bạn chắc chắn muốn đăng xuất khỏi hệ thống?</p>
                                            </div>
                                            <div class="modal-footer">
                                                    <button type="button" class="btn-modal-call-button1">OK</button>
                                                <button type="button" class="btn-modal-call-button2" data-dismiss="modal">HỦY</button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="M-GeneralManagement-right">
                <div class="M-GeneralManagement-right-content3 ">
                    <div class="M-GeneralManagement-right-content2-h1">
                        <div>  </div>
                           Đổi mật khẩu
                    </div>
                    <div class="M-doi-mat-khau">
                        <style>
                            .M-doi-mat-khau{
                                width:80%;
                                margin: 0 auto;
                                margin-top:104px;

                            }
                            .M-doi-mat-khau-input label{
                                width: 25%;
                            }
                            .M-doi-mat-khau-input input{
                                width: 60%;
                                background: #FFFFFF;
                                border: 0.5px solid #C8C8C8;
                                box-sizing: border-box;
                                border-radius: 5px;
                                height:40px;
                                margin-top:18px;
                                padding-left:15px;
                            }
                            .M-doi-mat-khau-input span{
                                margin-left: -31px;

                            }
                            label::after{
                                display:none
                            }
                            label::before{
                                content: "*";
                                color: red;
                                position: relative;
                                top: 2px;
                                right: 5px;
                            }
                            .M-doi-mat-khau-button{
                                text-align: center;
                                margin-top:63px;
                            }
                            .M-doi-mat-khau-button .btn1{
                                background: #F8971C;
                                border-radius: 5px;
                                font-weight: 500;
                                font-size: 17px;
                                line-height: 24px;
                                color: #FFFFFF;
                                font-family:Roboto-Medium;
                                border:none;
                                padding:4px 22px;
                            }
                            .M-doi-mat-khau-button .btn2{
                                background: #FFFFFF;
                                border: 1px solid #252E3B;
                                box-sizing: border-box;
                                border-radius: 5px;
                                font-family:Roboto-Regular;
                                padding:4px 25px;
                                margin-left:18px;
                            }
                            
                            @media screen and (max-width: 1024px) {
                                .M-doi-mat-khau-input input {
                                    width: 64%;
                                 
                                }
                                .M-doi-mat-khau-input label {
                                    width: 32%;
                                }
                                .M-doi-mat-khau {
                                    width: 90%;
                                    margin: 0 auto;
                                    margin-top: 104px;
                                }
                            }
                            @media screen and (max-width: 480px) {
                                .M-doi-mat-khau-input input {
                                    width: 100%;
                                 
                                }
                                .M-doi-mat-khau-input label {
                                    width: 100%;
                                    margin-top:15px;
                                }
                                .M-doi-mat-khau {
                                    width: 90%;
                                    margin: 0 auto;
                                    margin-top: 28px;
                                }
                                .M-doi-mat-khau-button {
                                    text-align: center;
                                    margin-top: 24px;
                                }
                            }
                        </style>
                        <div class="M-doi-mat-khau">
<<<<<<< HEAD
                            <form action="#" method="post" onchange="validate_form()" onsubmit="return validate_form()">
                            <?php if($false == 1) echo '<div style="color:red; font-family:Roboto-Regular; text-align:center;">Mật khẩu cũ bạn nhập vào không đúng hãy thử lại</div>'; ?>
=======
<<<<<<< HEAD
                            <form action="#" method="post">
=======
                            <form action="">
>>>>>>> c286fd59... Giang push 12/11/2020
>>>>>>> 12bb0cb9ff663446bb65b5a9c100a529c228166a
                                <div class="M-doi-mat-khau-input">
                                    <label for="">Mật khẩu hiện tại</label>
                                    <input type="password" name="password" placeholder="********" >
                                    <span><i class="fas fa-eye-slash"></i></span>
                            
                                    <label for="">Mật khẩu mới</label>
<<<<<<< HEAD
                                    <input type="password" name="newpassword" placeholder="********">
                                    <span><i class="fas fa-eye-slash"></i></span>
                
                                    <label for="">Nhập lại mật khẩu mới</label>
                                    <input type="password" name="renewpassword" placeholder="********">
                                    <span><i class="fas fa-eye-slash"></i></span>
                                </div>
                                <div class="M-doi-mat-khau-button">
                                    <button class="btn1" name="submit_doi_mat_khau">Đổi mật khẩu</button>
=======
                                    <input type="password" name="oldpassword" placeholder="********">
                                    <span><i class="fas fa-eye-slash"></i></span>
                
                                    <label for="">Nhập lại mật khẩu mới</label>
                                    <input type="password" name="newpassword" placeholder="********">
                                    <span><i class="fas fa-eye-slash"></i></span>
                                </div>
                                <div class="M-doi-mat-khau-button">
                                    <button class="btn1">Đổi mật khẩu</button>
>>>>>>> 12bb0cb9ff663446bb65b5a9c100a529c228166a
                                    <button class="btn2" type="reset">Hủy</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
        $('.btn-click').click(function(){   
        var e = $(this);
        $('.btn-click').removeClass('action');
        e.addClass('action');

            if (e.hasClass("action"))
                $('.btn-ul').addClass('action');
        else
                $('.btn-ul').removeClass('action');
    });
<<<<<<< HEAD
     funcion validate_form(){
         alert("đám");
        var password_ntd = document.getElementById('password_ntd').value;
		var repassword_ntd = document.getElementById('repassword_ntd').value;
     }
    </script>
    </html>
    <?php
        
    ?>
=======

    </script>
    </html>
>>>>>>> 12bb0cb9ff663446bb65b5a9c100a529c228166a
