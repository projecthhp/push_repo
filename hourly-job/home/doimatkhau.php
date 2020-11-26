<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" type="text/css" href="../node_modules/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="../node_modules/slick-carousel/slick/slick-theme.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="../css/css.css" />
</head>

<style>
#password_uv_err,
#password_uv_moi_err,
#cppassword_uv_moi_err {
    margin-left: 255px;
    margin-top: 5px;
}
</style>

<? 
include("../home/config.php"); 
$fail = 0;
$UID = ($_COOKIE['UID']);
if(isset($_POST['btn_submit'])){
    $password_uv =sha1( $_POST['password_uv']);
    $password_uv_moi = sha1($_POST['password_uv_moi']);
    $sql ="select name_uv from vltg_user_uv where id_uv = '$UID' and password_uv = '$password_uv'"; 	
    $db_qr = new db_query($sql);
    $row = mysql_fetch_assoc($db_qr->result);
    // echo $row['name_uv'];
    if (mysql_num_rows($db_qr->result) > 0) {
    
    $data = [
    'password_uv' => $password_uv_moi,
    ];
    $condition = [
    'id_uv' => $UID,
    ];
    update('vltg_user_uv',$data,$condition);
    }else
    {
       $fail = 1;
 }
 
}

?>


<body>
    <? include('../_share/herder_hoso.php'); ?>
    <div class="div_thongtinhosocanhan">
        <div class="container-fluid">
            <div class="row">
                <? include('../_share/menu_hoanthien_hoso.php'); ?>
                <div class="col-xl-9 div_quanlythongtincoban">
                    <?  include('../_share/menu_hoanthienhoso.php')?>
                    <div class="h_thongtincoban">
                        <h2>Đổi mật khẩu</h2>
                        <hr>
                        <div class="h_doimatkhau">
                            <div class=" h_row_doimatkhau">
                                <form method="POST" onsubmit="return validateform()">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label"><span>*</span>Mật
                                            khẩu hiện tại</label>
                                        <div class="input-group col-sm-8 h_input-group-append">
                                            <input type="password" class="form-control h_form-control_mk"
                                                id="password_uv" name="password_uv" placeholder="**********">
                                            <span class="fas fa-eye" id="btnPassword"></span>
                                        </div>
                                        <span id="password_uv_err"></span>
                                        <div style="color: red;font-size: 15px; ;margin-left: 20px;">
                                            <? if($fail == 1){?>Thông tin mật khẩu nhập không chính xác.
                                            <?}?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label"><span>*</span>Mật
                                            khẩu mới</label>
                                        <div class="input-group col-sm-8 h_input-group-append">
                                            <input type="password" class="form-control h_form-control_mk"
                                                id="password_uv_moi" name="password_uv_moi" placeholder="**********">
                                            <span class="fas fa-eye" id="btnPassword1"></span>
                                        </div>
                                        <span id="password_uv_moi_err"></span>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label"><span>*</span>Nhập
                                            lại mật khẩu mới</label>
                                        <div class="input-group col-sm-8 h_input-group-append">
                                            <input type="password" class="form-control h_form-control_mk"
                                                id="cppassword_uv_moi" name="cppassword_uv_moi"
                                                placeholder="**********">
                                            <span class="fas fa-eye" id="btnPassword2"></span>
                                        </div>
                                        <span id="cppassword_uv_moi_err"></span>
                                    </div>
                                    <div class="h_button_doimatkhau">
                                        <button type="submit" class="btn h_doimatkhau_a" name="btn_submit">Đổi mật
                                            khẩu</button>
                                        <button type="button" class="btn h_huy ">Hủy</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <? include('../_share/footer.php') ?>
</body>

</html>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="../node_modules/slick-carousel/slick/slick.js" type="text/javascript" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script>
$(document).ready(function() {
    $('#date,#date1,#date2').select2();

});
</script>
<script>
var dropdown = document.getElementsByClassName("h_dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        } else {
            dropdownContent.style.display = "block";
        }
    });
}
</script>
<script>
function validateform() {
    var password = document.getElementById('password_uv').value;
    var password_moi = document.getElementById('password_uv_moi').value;
    var cppassword_moi = document.getElementById('cppassword_uv_moi').value;
    var status = true;
    if (password == "") {
        document.getElementById('password_uv_err').innerHTML = "Bạn chưa nhập mật khẩu";
        status = false;
    } else if (password.length < 6) {
        document.getElementById('password_uv_err').innerHTML = "Mật khẩu phải có hơn 6 ký tự";
        // status = false;  
    } else {
        document.getElementById('password_uv_err').innerHTML = "";
    }
    if (password_moi == "") {
        document.getElementById('password_uv_moi_err').innerHTML = "Bạn chưa nhập mật khẩu";
        status = false;
    } else if (password_moi.length < 6) {
        document.getElementById('password_uv_moi_err').innerHTML = "Mật khẩu phải có hơn 6 ký tự";
        status = false;
    } else {
        document.getElementById('password_uv_moi_err').innerHTML = "";
    }
    if (cppassword_moi != password_moi) {
        document.getElementById('cppassword_uv_moi_err').innerHTML = "Mật khẩu nhập lại không trùng khớp";
        status = false;
    } else {
        document.getElementById('cppassword_uv_moi_err').innerHTML = "";
    }

    return status;
}
</script>