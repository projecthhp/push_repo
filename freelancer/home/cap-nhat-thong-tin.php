<?php
   include_once "config.php";
   if (isset($_COOKIE['UID'])) {
        $ma_ntd = $_COOKIE['UID'];
        $sql ="select * from flc_user_ntd  inner join city on flc_user_ntd.tinh_thanh_pho_ntd=city.cit_id where ma_ntd = $ma_ntd";
        $db_qr = new db_query($sql);
        $row = mysql_fetch_assoc($db_qr->result);
   }
   if (isset($_POST['cap_nhat'])) {
        $UID = $_COOKIE['UID'];
        $anh = $_FILES['logo_ntd']['name'];
            $errors= array();  // up ảnh lên db
            $file_name = $_FILES['logo_ntd']['name'];
            $file_size = $_FILES['logo_ntd']['size'];
            $file_tmp = $_FILES['logo_ntd']['tmp_name'];
            $file_type = $_FILES['logo_ntd']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['logo_ntd']['name'])));
                    
            $expensions= array("jpeg","jpg","png");
                    
            if(in_array($file_ext,$expensions)=== false){
                $errors[]="Chỉ hỗ trợ upload file JPEG, JPG hoặc PNG.";
            }
                    
            if($file_size > 2097152) {
                $errors[]='Kích thước file không được lớn hơn 2MB';
            }
            $target = "../image/img_user/img_ntd/".basename($anh);
            move_uploaded_file($_FILES['logo_ntd']['tmp_name'], $target);
       if ($anh > 0) {
        $data = [
            'ten_ntd' => $_POST['name_ntd'],
            'ngay_sinh_ntd' => strtotime($_POST['ngay_sinh_ntd']),
            'gioi_tinh_ntd' => $_POST['gioi_tinh_ntd'],
            'tinh_thanh_pho_ntd' =>$_POST['tinh_thanh_pho_ntd'],
            'quan_huyen_ntd' => $_POST['quan_huyen_ntd'],
            'email_ntd' => $_POST['email_ntd'],
            'logo_ntd' => $anh,
        ];
       }else{
        $data = [
            'ten_ntd' => $_POST['name_ntd'],
            'ngay_sinh_ntd' => strtotime($_POST['ngay_sinh_ntd']),
            'gioi_tinh_ntd' => $_POST['gioi_tinh_ntd'],
            'tinh_thanh_pho_ntd' =>$_POST['tinh_thanh_pho_ntd'],
            'quan_huyen_ntd' => $_POST['quan_huyen_ntd'],
            'email_ntd' => $_POST['email_ntd'],
        ];
       }
        $condition = [
            'ma_ntd' => $UID,
        ];
            update('flc_user_ntd',$data,$condition);
            header('location: cap-nhat-thong-tin.php');
    }
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cap nhat thong tin</title>
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
        <?php
          //  include_once 'head-index.php';
        ?>
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
                .M-may-anh {
                    width: 48px;
                    height: 48px;
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
                           Cập nhật thông tin
                    </div>
                    <style>
                        .M-cap-nhat-thong-tin{
                            width:95%;
                            margin:0 auto;        
                            margin-top:62px;
                            height:169px;
                        }
                        .M-cap-nhat-thong-tin-left .img #ghost{
                            height: 154px;
                            width: 154px;
                            border-radius: 50%;
                        }
                        .M-cap-nhat-thong-tin-left1,
                        .M-cap-nhat-thong-tin-left{
                            width:48%;
                            text-align: center;
                            float:left;
                        }
                        .M-cap-nhat-thong-tin-right1,
                        .M-cap-nhat-thong-tin-right{
                            width:48%;
                            float:right;
                        }
                        label.M-may-anh::after{
                            content: none;
                        }
                        .M-may-anh{
                            height: 48px;
                            width: 48px;
                            background: #3797DD;
                            margin: 0 auto;
                            border-radius: 50%;
                            position: relative;
                            top: 26px;
                            right: 41px;
                        }
                        .M-may-anh img{
                            position: relative;
                            top: 11px;
                           
                        }
                        .M-cap-nhat-thong-tin-right .input2 input,
                        .M-cap-nhat-thong-tin-right .input1 input{
                            width:100%;
                            height: 46px;
                            margin-top:8px;
                            background: #FFFFFF;
                            border: 0.3px solid #969696;
                            box-sizing: border-box;
                            border-radius: 3px;
                            font-size: 15px;
                            line-height: 26px;
                            color: #757575;
                            padding-left: 18px;
                            font-family: Roboto-Regular;
                        }
                        .M-cap-nhat-thong-tin-content label,
                        .M-cap-nhat-thong-tin-right .input2 label{
                            margin-top:20px;
                            padding-bottom:8px;
                            float:left;
                        }
                        .M-cap-nhat-thong-tin-content{
                            
                            clear:both;
                            width:95%;
                            margin: 0 auto;
                            margin-top:103px;
                        }
                        .M-cap-nhat-thong-tin-content select,
                        .M-cap-nhat-thong-tin-content input{
                            width:100%;
                            height:46px;
                            background: #FFFFFF;
                            border: 0.3px solid #969696;
                            box-sizing: border-box;
                            border-radius: 3px;
                        }
                        .M-cap-nhat-thong-tin-button{
                            text-align: center;
                            
                        }
                        .M-cap-nhat-thong-tin-button button{
                            background: #F8971C;
                            border-radius: 5px;
                            border:none;
                            padding:8px 39px;
                            font-size: 17px;
                            line-height: 24px;
                            color: #FFFFFF;
                            font-family:Roboto-Bold;
                            margin-top:77px;
                        }
                    </style>
                <form action="#" method="post" onchange="validate_cap_nhat()" onsubmit="return validate_cap_nhat()"  enctype="multipart/form-data">
                    <div class="M-cap-nhat-thong-tin">
                            <div class="M-cap-nhat-thong-tin-left">
                                <div class="img">
                                    <img id="ghost" src="../image/img_user/img_ntd/<?php echo $row['logo_ntd'] ?>" alt="">
                                    <label class="M-may-anh" style="cursor: pointer;">
                                        <img src="../image/icon/Group (5).png" alt="">
                                        <input name="logo_ntd" type="file" accept="image/*" onchange="loadFile(event)"  style="display:none">
                                    </label>
                                </div>
                                
                                <script>
                                    var loadFile = function(event) {
                                        var ghost = document.getElementById('ghost');
                                        ghost.src = URL.createObjectURL(event.target.files[0]);
                                    };
                                </script>
                            </div>
                            <div class="M-cap-nhat-thong-tin-right">
                                <div class="input1">
                                    <label for="">Số điện thoại đăng nhập</label>
                                    <input type="text" name="sdt_ntd" readonly value="<?php
                                        echo $row['sdt_ntd'];
                                    ?>">
                                </div>
                                <div class="input2">
                                    <label for="">Mật khẩu</label>
                                    <input type="password" readonly value="<?php echo $row['mat_khau_ntd'];?>">
                                </div>
                            </div>       
                    </div>
               
                        <div class="M-cap-nhat-thong-tin-content">
                            <div class="M-cap-nhat-thong-tin-left1">
                                <div class="input">
                                    <label for="">Họ và tên</label>
                                    <input type="text" name="name_ntd" value="<?php echo $row['ten_ntd'] ;?>" onclick="validate_cap_nhat()">
                                    <span id="error1" class="error"></span>
                                </div>
                                <div class="input">
                                    <label for="" >Ngày sinh</label>
                                    <input type="date" name="ngay_sinh_ntd" value="<?php echo date('Y-m-d',$row['ngay_sinh_ntd']);?>">    
                                    <span id="error2" class="error"></span>
                                </div>
                                <div class="input">
                                    <label for="">Giới tính</label>
                                    <select name="gioi_tinh_ntd" id="">
                                        <option value="<?php $row['gioi_tinh_ntd'] ?>"><? echo $array_gioi_tinh_tt[$row['gioi_tinh_ntd']] ?></option>
                                        <?php
                                            foreach ($array_gioi_tinh_tt as $key => $value) {
                                        ?>
                                            <option value="<?php echo $key ?>"> <?php echo $value ?> </option>
                                        <?php
                                            }
                                        ?>						
                                    </select>
                                    <span id="error3" class="error"></span>
                                </div>
                            </div>
                            <div class="M-cap-nhat-thong-tin-right1">
                                <div class="input">
                                    <label for="">Email</label>
                                    <input type="email" name="email_ntd">
                                    <span id="error3" class="error"></span>
                                    
                                </div>
                                <div class="input">
                                    <label for="">Tỉnh thành phố</label>
                                    <select name="tinh_thanh_pho_ntd" id="tinh_thanh_pho">
                                        <?php 
											$sql ="select * from city";
                                            $db_qr = new db_query($sql);
											While($city = mysql_fetch_assoc($db_qr->result)){
                                        ?>
										    <option <?php   if($city["cit_id"] == $row["tinh_thanh_pho_ntd"])  echo "selected"  ?> value="<?php   echo $city['cit_id']   ?>"><?php   echo $city['cit_name']  ?></option>';
                                        <?php
                                            }
										?>
                                    </select>
                                </div>
                                <div class="input">
                                    <label for="">Quận huyện</label>
                                    <select name="quan_huyen" id="quan_huyen">
                                        <option value="">Hoàng Mai</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <div class="M-cap-nhat-thong-tin-button">
                        <button name="cap_nhat">Cập nhật</button>
                    </div>
                </form>
            </div>            
                </div>
        </div>
    </body>
    <script>
			function validate_cap_nhat(){
				var name_ntd = document.getElementById('name_ntd').value;

				if (name_ntd == '') {
					document.getElementById('error1').innerHTML= 'Họ tên không được để trống';
					
				}
				else{
					document.getElementById('error1').innerHTML= '';
					
				}
				
				return false;
			};	
	 </script>
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
        $('#tinh_thanh_pho').select2({
            
        })
        $('#quan_huyen').select2({
            
        })
    </script>
    </html>
