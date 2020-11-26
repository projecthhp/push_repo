<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Hoàn thiện hồ sơ</title>
    <link rel="stylesheet" type="text/css" href="../node_modules/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="../node_modules/slick-carousel/slick/slick-theme.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/css.css" />
</head>

<?php  include('../_share/congviec_uv.php');?>
<style>
.h_active_cv {
    background: #F4FAFF;
    border: 0.5px solid #1B7ABF;
    box-sizing: border-box;
    border-radius: 3px 0px 0px 3px;
}
</style>

<body>
    <? include('../_share/herder_hoso.php'); ?>
    <div class="div_thongtinhosocanhan">
        <div class="container-fluid">
            <div class="row">
                <? include('../_share/menu_hoanthien_hoso.php'); ?>
                <div class="col-xl-9 div_quanlythongtincoban">
                    <?php  include('../_share/menu_hoanthienhoso.php');?>
                    <div class="h_thongtincoban">
                        <h2>Công việc mong muốn</h2>
                        <hr>
                        <form action="" method="post" onsubmit="return validateform()">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="h-ngaysinh">
                                        <div class="form-group h_form-group">
                                            <label for=""><span>*</span>Nghề nghiệp</label>
                                            <div class="h_div_select">
                                                <select class="form-control" id="nganh_uv" multiple="multiple"
                                                    name="nganh_uv[]">
                                                    <?php
                                                    $sql = mysql_query("SELECT * FROM category WHERE cat_id=$nganh_uv");
                                                  
                                                    while($languages = mysql_fetch_array($sql)) {
                                                         ?>
                                                    <option value="<?=$languages["cat_id"];?>" selected>
                                                        <?=$languages["cat_name"];?>

                                                    </option>
                                                    <?php
                                                        }
                                                        ?>
                                                    <?php 
                                                        $sql ="select * from category";
                                                        $db_qr = new db_query($sql);
                                                        While($row = mysql_fetch_assoc($db_qr->result)){
                                                            echo '<option value="'.$row["cat_id"].'">'.$row["cat_name"].'</option>';
                                                        }
                                                        
                                                    ?>
                                                </select>
                                                <span id="nganhnghe_uv_erro"></span>
                                            </div>
                                        </div>
                                        <div class="form-group h_form-group">
                                            <label for=""><span>*</span>Nơi làm việc mong muốn</label>
                                            <select class="form-control" id="noilamviec_uv" multiple="multiple"
                                                name="noilamviec_uv[]">
                                                <?php
                                            $languages_result = mysql_query("SELECT * FROM city WHERE cit_id=$noilamviec_uv");
                                           
                                            while($languages_stack = mysql_fetch_array($languages_result)) {
                                            ?>
                                                <option value="<?=$languages_stack["cit_id"];?>" selected>
                                                    <?=$languages_stack["cit_name"];?>

                                                </option>
                                                <?php
                                            }
                                            ?>
                                                <?php
                                            $languages_result = mysql_query("SELECT * FROM city");
                                      
                                            while($languages_stack = mysql_fetch_array($languages_result)) {
                                            ?>
                                                <option value="<?=$languages_stack["cit_id"];?>">
                                                    <?=$languages_stack["cit_name"];?>

                                                </option>
                                                <?php
                                            }
                                            ?>
                                            </select>
                                            <span id=" noilamviec_uv_erro"></span>
                                        </div>
                                        <div class="form-group h_form-group div_form_group1 h_form-group">
                                            <label for=""><span>*</span>Mức lương</label>
                                            <div class="btn-group btn-group-toggle h_btn-group-toggle"
                                                data-toggle="buttons">
                                                <label class="btn h_btn-secondary h_active_cv active">
                                                    <input type="radio" name="trangthailuong_uv" id="option1"
                                                        autocomplete="off" checked value="1"> Cố định
                                                </label>
                                                <label class="btn h_btn-secondary">
                                                    <input type="radio" name="trangthailuong_uv" id="option2"
                                                        autocomplete="off" value="2">
                                                    Ước lượng
                                                </label>

                                            </div>
                                            <div class="h_sotien">
                                                <input type="text" class="form-control"
                                                    placeholder="Mời bạn nhập mức lương" name="mucluong_uv"
                                                    id="mucluong_uv">
                                                <label for="">/</label>
                                                <div class="h_sotien1">
                                                    <select class="h_js-example-basic-single" class="form-control"
                                                        name="luong_date_uv" id="date10">
                                                        <option>tuần</option>
                                                        <option>giờ</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <span id="mucluong_uv_erro"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="h-ngaysinh">
                                        <div class="form-group h_form-group">
                                            <label for=""><span>*</span>Công việc mong muốn</label>
                                            <input type="text" class="form-control" id="congviec_uv" name="congviec_uv"
                                                placeholder="Mời bạn nhập công việc mong muốn"
                                                value="<?=$value['congviec_uv']?>">
                                        </div>
                                        <span id="congviec_uv_erro"></span>
                                        <div class="form-group h_form-group">
                                            <label for=""><span>*</span>Hình thức làm việc </label>
                                            <div class="h_div_select">
                                                <select name="hinhthuc_uv" id="hinhthuc_uv">
                                                    <option value=""></option>
                                                    <?
                                                        foreach ($array_hinh_thuc as $key => $value) {
                                                        ?>
                                                    <option value="<?= $key ?>"><?= $value ?></option>
                                                    <?
                                                        }
                                                        ?>
                                                </select>
                                                <span id="hinhthuc_uv_erro"></span>
                                            </div>
                                        </div>
                                        <div class="form-group h_form-group">
                                            <label for=""><span>*</span>Cấp bậc mong muốn</label>
                                            <div class="h_div_select">
                                                <select name="capbac_uv" id="capbac_uv">
                                                    <option value=""></option>
                                                    <?
                                                        foreach ($array_capbac as $key => $value) {
                                                        ?>
                                                    <option value="<?= $key ?>"><?= $value ?></option>
                                                    <?
                                                        }
                                                        ?>
                                                </select>
                                                <span id='capbac_uv_erro'></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="h_button">
                                    <button type="submit" name="btn_luu" class="btn h_capnhap">
                                        Cập nhật
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("../_share/footer.php"); ?>
</body>

</html>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script>
$(document).ready(function() {
    $('#hinhthuc_uv').select2({
        placeholder: "Mời bạn chọn hình thức làm việc",
        width: "100%"
    });
});
$('#capbac_uv').select2({
    placeholder: "Mời bạn chọn cấp bậc",
    width: "100%"
});
$('#date10').select2({
    width: "50%"
});
$("#nganh_uv").select2({
    width: "100%",
    placeholder: "Chọn 1 hoặc tối đa 3 ngành nghề",
    maximumSelectionLength: 3
});
$("#noilamviec_uv").select2({
    width: "100%",
    placeholder: "Chọn 1 hoặc tối đa 3 nơi làm việc",
    maximumSelectionLength: 3
});

function validateform() {
    var nganh = document.getElementById('nganh_uv').value;
    var noilamviec = document.getElementById('noilamviec_uv').value;
    var congviec = document.getElementById('congviec_uv').value;
    var mucluong = document.getElementById('mucluong_uv').value;
    var hinhthuc = document.getElementById('hinhthuc_uv').value;
    var capbac = document.getElementById('capbac_uv').value;
    var status = true;
    if (nganh == "") {
        document.getElementById('nganhnghe_uv_erro').innerHTML = "Bạn chưa chọn thông tin ngành nghề";
        status = false;
    } else document.getElementById('nganhnghe_uv_erro').innerHTML = ""
    if (noilamviec == "") {
        document.getElementById('noilamviec_uv_erro').innerHTML = "Bạn chưa điền đày đủ thông tin nơi làm việc";
        status = false;
    } else document.getElementById('noilamviec_uv_erro').innerHTML = ""
    if (congviec == "") {
        document.getElementById('congviec_uv_erro').innerHTML = "Bạn chưa điền đầy đủ thông tin của mình";
        status = false;
    } else document.getElementById('congviec_uv_erro').innerHTML = ""
    if (mucluong == "") {
        document.getElementById('mucluong_uv_erro').innerHTML = "Bạn chưa điền mức lương cụ thể cho bản thân?";
        status = false;
    } else document.getElementById('mucluong_uv_erro').innerHTML = ""
    if (hinhthuc == "") {
        document.getElementById('hinhthuc_uv_erro').innerHTML = "Bạn chưa điền hình thức làm việc của mình";
        status = false;
    } else document.getElementById('hinhthuc_uv_erro').innerHTML = ""
    if (capbac == "") {
        document.getElementById('capbac_uv_erro').innerHTML = "Bạn chưa chọn cấp bậc cho bản thân mình";
        status = false;
    } else document.getElementById('capbac_uv_erro').innerHTML = ""
    return status;
}
</script>