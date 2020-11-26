<?php
    include_once 'config.php';
    if (isset($_COOKIE['UID'])) {
        $UID = $_COOKIE['UID'];
        if (isset($_POST['btn_dang_viec'])) {
            $chi_phi = $_POST['chi_phi_co_dinh'];
            if ($chi_phi == "") {
                $the_loai_chi_phi = 2;
            }else{
                $the_loai_chi_phi = 1;
            }
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
                
            // chỗ này là up file tài liệu dài vch :V
                $tai_lieu = $_FILES['file_tai_lieu']['name'];
                $noi_lam_viec = $_POST['input_noi_lam_viec'];
                $noi_lam_viec = implode(",",$noi_lam_viec);
                $linh_vuc = implode(",",$_POST['input_linh_vuc']);
                $errors1= array();  // up ảnh lên db
                $file_name1 = $_FILES['file_tai_lieu']['name'];
                $file_size1 = $_FILES['file_tai_lieu']['size'];
                $file_tmp1 = $_FILES['file_tai_lieu']['tmp_name'];
                $file_type1 = $_FILES['file_tai_lieu']['type'];
                $file_ext1=strtolower(end(explode('.',$_FILES['file_tai_lieu']['name'])));
                
                $expensions= array("jpeg","jpg","png","doc","pdf");

                if(in_array($file_ext1,$expensions)=== false){
                    $errors[]="Chỉ hỗ trợ upload file JPEG, JPG hoặc PNG , .docx hoặc .pdf";
                }
                if($file_size1 > 209715200) {
                    $errors[]='Kích thước file không được lớn hơn 25MB';
                }
                $target1 = "../data/data_ntd/".basename($tai_lieu);
                move_uploaded_file($_FILES['file_tai_lieu']['tmp_name'], $target1);
              if ($the_loai_chi_phi == 1) {
                $data = [
                    'ten_viec_lam' => $_POST['ten_vi_tri'],
                    'linh_vuc' => $linh_vuc,
                    'kinh_nghiem' => $_POST['input_yc_kn'],
                    'hinh_thuc' => $_POST['input_hinh_thuc'],
                    'noi_lam_viec' => $noi_lam_viec,
                    'mo_ta' => $_POST['thong_tin_chi_tiet'],
                    'tai_lieu' => $tai_lieu,
                    'the_loai_chi_phi' => $the_loai_chi_phi,
                    'chi_phi' => $_POST['chi_phi_co_dinh'],
                    'chi_phi_theo_ngay' => $_POST['chi_phi_theo_ngay'],
                    'ngay_bat_dau_dat_gia' => strtotime($_POST['day_start_price']),
                    'ngay_dat_gia_ket_thuc' => strtotime($_POST['day_end_price']),
                    'ngay_bat_dau_lam_viec' =>strtotime($_POST['day_start_work']),
                    'thoi_han_lam_viec' => strtotime($_POST['time_work']),
                    'logo_cty' => $anh,
                    'ma_nguoi_dang' => $UID,
                ];
              }else{
                $data = [
                    'ten_viec_lam' => $_POST['ten_vi_tri'],
                    'linh_vuc' => $linh_vuc,
                    'kinh_nghiem' => $_POST['input_yc_kn'],
                    'hinh_thuc' => $_POST['input_hinh_thuc'],
                    'noi_lam_viec' => $noi_lam_viec,
                    'mo_ta' => $_POST['thong_tin_chi_tiet'],
                    'tai_lieu' => $tai_lieu,
                    'the_loai_chi_phi' => $the_loai_chi_phi,
                    'chi_phi' => implode(",", $_POST['chi_phi_uoc_luong']),
                    'chi_phi_theo_ngay' => $_POST['chi_phi_theo_ngay'],
                    'ngay_bat_dau_dat_gia' => strtotime($_POST['day_start_price']),
                    'ngay_dat_gia_ket_thuc' => strtotime($_POST['day_end_price']),
                    'ngay_bat_dau_lam_viec' =>strtotime($_POST['day_start_work']),
                    'thoi_han_lam_viec' => strtotime($_POST['time_work']),
                    'logo_cty' => $anh,
                    'ma_nguoi_dang' => $UID,
                ];
              }
        
               $add = add('flc_viec_lam',$data);
               echo $add;
          redirect('JobFreelancer.php');
        }
    }
    else{
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PostJobPartTime</title>
     
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/GiangCSS/All.css">
    <link rel="stylesheet" href="../css/all.css">
</head>
<body style="background: #fafafa;">
    <?php
        $indexHeader = 1;
        $backgroundIndex =1;
        include_once 'head-index.php';
    ?>
    <div></div>
    <div class="M-PostJobPartTime">
        <div class="M-PostJobPartTime-head-text1">
             ĐĂNG VIỆC BÁN THỜI GIAN
        </div>
        <div class="M-PostJobPartTime-body">
            <div class="M-PostJobPartTime-body-clock">
                <img src="../image/img/Group 2329.png" alt="">
            </div>
            <form action="" method="post" onchange="validate_dang_tin_ban_thoi_gian()"  onsubmit="return validate_dang_tin_ban_thoi_gian()" enctype="multipart/form-data">
                <div class="M-PostJobPartTime-body-content">
                    <div class="M-PostJobPartTime-body-content1">
                        <div></div> Vị trí cần tuyển dụng
                    </div>
                    <div class="M-PostJobPartTime-body-content2">
                        <div class="img"><img  id="ghost" src="../image/img/Group 2076 (1).png" alt=""></div>
                        <div class="text">
                            <div class="text1">Logo công ty</div>
                            <div class="text2"  >
                                <label style="cursor: pointer;" class="logo_ntd_img">
                                    <span>+ Chọn ảnh</span>
                                    <input type="file" name="logo_ntd" accept="image/*" style="display:none" onchange="loadFile(event)">
                                </label>
                                <script>
                                    var loadFile = function(event) {
                                        var ghost = document.getElementById('ghost');
                                        ghost.src = URL.createObjectURL(event.target.files[0]);
                                    };
                                </script>
                            </div>
                        </div>
                    </div>
                    <div class="M-PostJobPartTime-body-content3">
                        <div class="left">
                        <style>  
                            label.logo_ntd_img::after{
                                content: none;
                            } 
                            .error{           
                                color: red;
                                font-family: Roboto-Regular;
                            }
                        </style>
                            <div id="input">
                                <label for="">Tên vị trí cần tuyển</label> 
                                <div id="error_1" class="error"></div>
                                <input id="ten_vi_tri" type="text" placeholder="VD: Lập trình Web" name="ten_vi_tri" >
                                
                            </div>
                            <div id="input">
                                <label for="input_yc_kn">Yêu cầu kinh nghiệm</label><div id="error_3"  class="error"></div>
                                <select name="input_yc_kn" id="input_yc_kn">
                                    <option value=""></option>
                                    <?php
                                        foreach ($array_kinh_nghiem as $key => $each) {
                                    ?>
                                        <option value="<?php echo $key ?>"><?php echo $each ?></option>
                                    <?php     
                                        }
                                    ?>
                                </select>
                            </div>
                            <div id="input">
                                <label for="input_noi_lam_viec">Nơi làm việc</label><div id="error_5"  class="error"></div>
                                <select name="input_noi_lam_viec[]" id="input_noi_lam_viec" multiple="multiple">
                                    <?php 
                                        $sql ="select * from city";
                                        $db_qr = new db_query($sql);
                                        While($row = mysql_fetch_assoc($db_qr->result)){
                                            echo '<option value="'.$row["cit_id"].'" >'.$row["cit_name"].'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="right">
                            <div class="input">
                                <label for="input_linh_vuc">Chọn lĩnh vực cần tuyển</label> <div id="error_2"  class="error"></div>
                                <select name="input_linh_vuc[]" id="input_linh_vuc" multiple="multiple1">
                                    <option value=""></option>
                                    <?php
                                        foreach ($array_nganh_nghe as $key => $each) {
                                    ?>
                                        <option value="<?php echo $key ?>"><?php echo $each ?></option>
                                    <?php     
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="input">
                                <label for="input_hinh_thuc">Hình thức làm việc</label><div id="error_4"  class="error"></div>
                                <select name="input_hinh_thuc" id="input_hinh_thuc" >
                                    <option value=""></option>
                                    <?php
                                        foreach ($array_hinh_thuc as $key => $each) {
                                    ?>
                                        <option value="<?php echo $key ?>"><?php echo $each ?></option>
                                    <?php     
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="M-PostJobPartTime-body-content4">
                        <label for="">Thông tin chi tiết    </label><div id="error_6"  class="error"></div>
                        <textarea name="thong_tin_chi_tiet" id="thong_tin_chi_tiet" cols="30" rows="10" placeholder="VD: Thiết kế các giao diện website cần thiết như: Trang chủ, xem hàng, thanh toán..."></textarea>
                        </div>
                        <div class="M-PostJobPartTime-body-content4">
                            <style>
                                .M-PostJobPartTime-body-content4-h1{
                                    font-size: 16px;
                                    line-height: 153.69%;
                                    color: #3980D4;
                                    font-family: Roboto-Regular;
                                    margin-top: 20px;
                                    margin-bottom: 10px;
                                }
                                
                            </style>
                            <div for="" class="M-PostJobPartTime-body-content4-h1">Thêm tài liệu đính kèm</div>
                                <div class="upload">
                                    <label style="cursor: pointer;" class="logo_ntd_img">
                                        <span style="
                                            background: #FFFFFF;
                                            border: 0.5px solid #B1B1B1;
                                            box-sizing: border-box;
                                            border-radius: 100px;
                                            padding: 7px 21px;
                                            font-weight: 500;
                                            font-size: 16px;
                                            line-height: 153.69%;
                                            text-align: center;
                                            color: #252E3B;
                                            font-family: Roboto-Medium;
                                        " >+ Tải lên</span>
                                        <input type="file" name="file_tai_lieu" accept="file/*" style="display:none" ">
                                    </label>    
                                    <div>Tải lên bất kỳ hình ảnh hoặc tài liệu mô tả ngắn gọn công việc (Kích thước tệp tối đa: 25 MB).</div>
                                </div>
                            </div>
                    <!-- <div class="M-PostJobPartTime-body-content5">
                        <div class="text"><label for="">Kỹ năng</label></div>
                        <div class="text1">Adobe Photoshop <p>Xóa bỏ</p></div>
                        <div class="text1">Adobe Photoshop <p>Xóa bỏ</p></div>
                        <div class="text1">Adobe Photoshop <p>Xóa bỏ</p></div>
                        <div class="text1">Adobe Photoshop <p>Xóa bỏ</p></div>
                    
                        <div class="form-group">
                        <input type="text"
                            class="form-control" name="" id="" aria-describedby="helpId" placeholder="Nhập kỹ năng">
                        </div>
                    </div> -->
                    <div class="M-PostJobPartTime-body-content1">
                        <div></div> Chi phí và thời gian
                    </div>
                    <div id="error_11"  class="error"></div>
                    <div class="M-PostJobPartTime-body-content6">
                        <div class="text">Ngân sách dự kiến cho công việc này</div>
                        <div class="button">
                            <button type="button" class="btn-atc active" id="button1" >Cố định</button>
                            <button type="button" class="btn-atc" id="button2" >Ước lượng</button>
                            <style>
                                .btn-atc.active {
                                    padding: 8px 18px 8px 18px;
                                    font-size: 15px;
                                    line-height: 24px;
                                    background: #F4FAFF;
                                    border: 0.5px solid #1B7ABF;
                                    box-sizing: border-box;
                                    border-radius: 0px 3px 3px 0px;
                                    color: #1B7ABF;
                                }
                                .btn-atc{
                                    padding: 8px 18px 8px 18px;
                                    font-size: 15px;
                                    line-height: 24px;
                                    color: #333333;
                                    font-family: Roboto-Regular;
                                    background: #FFFFFF;
                                    border: 0.5px solid #C8C8C8;
                                    box-sizing: border-box;
                                    border-radius: 3px 0px 0px 3px;
                                }
                            </style>
                        </div>
                    </div>
                   
                    <div class="M-PostJobPartTime-body-content7">
                            <input type="text" name="chi_phi_uoc_luong[]" class="input1 button1-check" id="btn-input1" placeholder="2.500.000   -">
                            <input type="text" name="chi_phi_uoc_luong[]" class="input2 button1-check" id="btn-input2" placeholder="3.000.000               VNĐ">
                            <input type="text" name="chi_phi_co_dinh" class="btn-input button2-check" id="btn-input"  placeholder="2.500.000       VNĐ">
                        <style>
                            .input1#btn-input1{
                                display:none;
                            }
                            .input2#btn-input2{
                                display:none;
                            }
                            .btn-input{
                                display:inline;
                            }
                            .btn-input2-click#btn-input2{
                                display:inline;
                            }
                            .btn-input1-click#btn-input1{
                                display:inline;
                            }
                            .btn-input-click#btn-input{
                                display:none;
                            }
                        </style>
                        <select name="chi_phi_theo_ngay" id="thang">
                           <option value="1">Ngày</option>
                           <option value="2">Tuần</option>
                           <option value="3">Tháng</option>
                           <option value="4">Năm</option>
                        </select>          
                    </div>
                    <div class="M-PostJobPartTime-body-content8">
                        <div class="left">
                            <div class="input1">
                                <label for="">Ngày bắt đầu đặt giá</label><div id="error_7"  class="error"></div>
                                <input type="date" id="day_start_price" name="day_start_price">
                            </div>
                            <div class="input2">
                                <label for="">Ngày bắt đầu làm việc</label><div id="error_8"  class="error"></div>
                                <input type="date" id="day_start_work"  name="day_start_work">
                            </div>
                        </div>
                        <div class="right">
                            <div class="input1">
                                <label for="">Ngày đặt giá kết thúc</label><div id="error_9"  class="error"></div>
                                <input type="date" id="day_end_price" name="day_end_price">
                            </div>
                            <div class="input2">
                                <label for="">Thời hạn làm việc</label><div id="error_10"  class="error"></div>
                                <input type="date" id="time_work" name="time_work">
                            </div>
                        </div>
                    </div>
                    <div class="M-PostJobPartTime-body-content9">
                        <button type="submit" name="btn_dang_viec">ĐĂNG VIỆC</button>
                    </div>
                </div>
            </form>    
        </div>
    </div>
</div>
</body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
	<script src="../js/all.js"></script>
    <script>
          $('#input_yc_kn').select2({
            placeholder: "Chọn kinh nghiệm",
            tags : true
        });
        $('#input_noi_lam_viec').select2({
            placeholder: "Chọn địa điểm",
            tags : true
        });
        $('#input_linh_vuc').select2({
            placeholder: "Chọn lĩnh vực",
            tags : true
        });
        $('#input_hinh_thuc').select2({
            placeholder: "Chọn hình thức",
            tags : true
        });
        $('#thang').select2({
            placeholder: "Chọn hình thức",
            tags : true
        });
        $('.btn-atc').click(function(){
            var e = $(this);
            $('.btn-atc').removeClass('active');
            e.addClass('active');
           
        });
        $('#button2').click(function(){
            $('#btn-input').addClass('btn-input-click');
            $('#btn-input1').addClass('btn-input1-click');
            $('#btn-input2').addClass('btn-input2-click');
        });
        $('#button1').click(function(){
            $('#btn-input').removeClass('btn-input-click');
            $('#btn-input1').removeClass('btn-input1-click');
            $('#btn-input2').removeClass('btn-input2-click');
        });
    </script>

    <script>
        function validate_dang_tin_ban_thoi_gian() {
            
            var ten_vi_tri = $('#ten_vi_tri').val();
            var input_linh_vuc = $('#input_linh_vuc').val();
            var input_yc_kn = $('#input_yc_kn').val();
            var input_hinh_thuc = $('#input_hinh_thuc').val();
            var input_noi_lam_viec = $('#input_noi_lam_viec').val();
            var thong_tin_chi_tiet = $('#thong_tin_chi_tiet').val();
            var day_start_price = $('#day_start_price').val();
            var day_start_work = $('#day_start_work').val();
            var day_end_price = $('#day_end_price').val();
            var time_work = $('#time_work').val();
            var submitForm = true;
            $('#button1').click(function(){
                var chi_phi_co_dinh = $('#btn-input').val();
                if (chi_phi_co_dinh == "") {
                    document.getElementById('error_11').innerHTML= 'Ngân sách dự kiến cố định không được để trống';
                }
                else{
                    document.getElementById('error_11').innerHTML.innerHTML= '';
                }
            });
            $('#button2').click(function(){
                var chi_phi_uoc_luong = $('#btn-input1').val();
                var chi_phi_uoc_luong2 = $('#btn-input2').val();
                if (chi_phi_uoc_luong == "") {
                    document.getElementById('error_11').innerHTML= 'Ngân sách dự kiến ước lượng không được để trống';
                }
                else{
                    document.getElementById('error_11').innerHTML.innerHTML= '';
                }   
            });
            if (ten_vi_tri == "") {
                document.getElementById('error_1').innerHTML= 'Tên vị trí cần tuyển không được để trống';
                submitForm = false;
            }
            else{
                document.getElementById('error_1').innerHTML= '';
            }

            if (input_linh_vuc == "") {
                document.getElementById('error_2').innerHTML= 'Hãy chọn 1 lĩnh vực cần tuyển';
            }
            else{
                document.getElementById('error_2').innerHTML= '';
            }

            if (input_yc_kn == "") {
                document.getElementById('error_3').innerHTML= 'Hãy chọn 1 yêu cầu kinh nghiệm';
            }
            else{
                document.getElementById('error_3').innerHTML= '';
            }

            if (input_hinh_thuc == "") {
                document.getElementById('error_4').innerHTML= 'Hãy chọn 1 hình thức làm việc';
            }
            else{
                document.getElementById('error_4').innerHTML= '';
            }

            if (input_noi_lam_viec == "") {
                document.getElementById('error_5').innerHTML= 'Hãy chọn ít nhất 1 nơi làm việc';
            }
            else{
                document.getElementById('error_5').innerHTML= '';
            }
            
            if (thong_tin_chi_tiet == "") {
                document.getElementById('error_6').innerHTML= 'Hãy điền thông tin chi tiết công việc';
            }
            else{
                document.getElementById('error_6').innerHTML= '';
            }

            if (day_start_price == "") {
                document.getElementById('error_7').innerHTML= 'Hãy chọn ngày bắt đầu đặt giá';
            }
            else{
                document.getElementById('error_7').innerHTML= '';
            }

            if (day_start_work == "") {
                document.getElementById('error_8').innerHTML= 'Hãy chọn ngày đặt giá kết thúc';
            }
            else{
                document.getElementById('error_8').innerHTML= '';
            }

            if (day_end_price == "") {
                document.getElementById('error_9').innerHTML= 'Hãy ngày bắt đầu làm việc    ';
            }
            else{
                document.getElementById('error_9').innerHTML= '';
            }

            if (time_work == "") {
                document.getElementById('error_10').innerHTML= 'Hãy chọn thời hạn làm việc';
            }
            else{
                document.getElementById('error_10').innerHTML= '';
            }
            return submitForm;
        }
        
    </script>
</html>