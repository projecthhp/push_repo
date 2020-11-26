<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kinh nghiem làm việc</title>
    <link rel="stylesheet" type="text/css" href="../node_modules/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="../node_modules/slick-carousel/slick/slick-theme.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/css.css" />
</head>
<?  include('../_share/add_kn_uv.php');?>

<?  include('../_share/delete_kn.php');?>

<body>
    <? include('../_share/herder_hoso.php'); ?>
    <div class="div_thongtinhosocanhan">
        <div class="container-fluid">
            <div class="row">
                <? include('../_share/menu_hoanthien_hoso.php'); ?>
                <div class="col-xl-9 div_quanlythongtincoban">
                    <?php  include('../_share/menu_hoanthienhoso.php');?>
                    <div class="h_thongtincoban">
                        <h2>Kinh nghiệm làm việc</h2>
                        <hr>
                        <?
                        $query = "SELECT * FROM `vltg_kinh_nghiem` WHERE id_uv = ".$_COOKIE['UID'];
                        $db_qr = new db_query($query);
                        if(mysql_num_rows($db_qr->result) == 0){
                        ?>
                        <form action="" method="POST" onsubmit="return validateform()">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="h-ngaysinh">
                                        <div class="form-group h_form-group">
                                            <label for="exampleInputEmail1"><span>*</span>Tên công ty </label>
                                            <input type="text" class="form-control" id="tencongty_uv"
                                                placeholder="Nhập tên công ty" name="tencongty_uv">
                                        </div>
                                        <span id="tencongty_uv_erro"></span>
                                        <div class="form-group h_form-group">
                                            <label for="exampleInputEmail1"><span>*</span>Ngày bắt đầu</label>
                                            <input type="date" class="form-control" name="ngaybatdau_uv"
                                                id="ngaybatdau_uv" placeholder="Chọn ngày bắt đầu">
                                        </div>
                                        <span id="ngaybatdau_uv_erro"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="h-ngaysinh">
                                        <div class="form-group h_form-group1 h_form_kinhnghiem">
                                            <label for="exampleInputEmail1"><span>*</span>Chọn chức danh/ Vị trí</label>
                                            <div class="h_div_select">
                                                <select class="custom-select my-1 mr-sm-2" id="chucdanh_uv"
                                                    name="chucdanh_uv">
                                                    <option value="">Chọn cấp bậc</option>
                                                    <?
                                                    foreach ($array_capbac as $key => $value) {
                                                    ?>
                                                    <option value="<?= $value ?>"><?= $value ?></option>
                                                    <?
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <span id="chucdanh_uv_erro"></span>
                                        <div class="form-group h_form-group">
                                            <label for="exampleInputEmail1"><span>*</span>Ngày kết thúc</label>
                                            <input type="date" class="form-control"
                                                placeholder="Mời bạn nhập tỉnh thành" id="ngayketthuc_uv"
                                                name="ngayketthuc_uv">
                                        </div>
                                        <span id="ngayketthuc_uv_erro"></span>
                                    </div>
                                </div>
                                <div class="h-ngaysinh">
                                    <div class="form-group h_form-group">
                                        <label for="exampleInputEmail1"><span>*</span>Mô tả công việc</label>
                                        <textarea class="form-control h-textarea" rows="3" name="motacongviec_uv_kn"
                                            id="motacongviec_uv_kn"></textarea>
                                    </div>
                                    <span id="motacongviec_uv_kn_erro"></span>

                                </div>

                                <div class="h_button">
                                    <button type="submit" value="Submit" name="btn_submit" class="btn h_capnhap">
                                        Cập nhật
                                    </button>
                                </div>
                            </div>
                        </form>
                        <?
                        }else{
                            While($value = mysql_fetch_assoc($db_qr->result)){
                        ?>
                        <div class="h_kinhnghiemlamviec1 h_div_kinhnghiemlamviec1">
                            <img src="../image/company (1) 1.png" alt="">
                            <div class="h_noidungkinhnghiem">
                                <?= $value['tencongty_uv'] ?><span>( <?= $value['ngaybatdau_uv'] ?> đến
                                    <?= $value['ngayketthuc_uv'] ?>)</span>

                                <div class="h_button_kinhnghiem">
                                    <button data-id="<?=$value['id_kn']?>" type="button" class="btn bg-white"
                                        data-toggle="modal" data-target="#exampleModalthemmoi1">
                                        <i style='font-size:14px' class='fas'>&#xf304;</i>Sửa
                                    </button>

                                    <a href="kinhnghiemlamviec.php?maxoa=<?= $value['id_kn'] ?>" class="btn-remove">
                                        <button type="text" class="btn"><i style='font-size:14px'
                                                class='fas'>&#xf2ed;</i>Xóa</button></a>
                                </div>
                                <p> Vị trí:<span><?= $value['chucdanh_uv'] ?></span></p>
                                <div class="h_mota">
                                    Mô tả công việc:
                                    <p><?= $value['motacongviec_uv_kn'] ?></p>

                                </div>
                            </div>
                        </div>
                        <?
                            }
                        ?>
                        <div class=" modal fade" id="exampleModalthemmoi1" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabelthemmoi1" aria-hidden="true">
                            <div class="modal-dialog h_div_modal_dialog" role="document">
                                <div class="modal-content h_modal-content">
                                    <div class="modal-header h_themmoi_header">
                                        <h5 class="modal-title" id="exampleModalLabelthemmoi1">Chỉnh sửa
                                            kinh nghiệm làm việc</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" id="registration">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="h-ngaysinh h-ngaysinh_themmoi">
                                                        <div class="form-group h_form-group h_ngoisao">
                                                            <label for=""><span>*</span>Tên
                                                                công ty </label>
                                                            <input type="text" class="form-control" id="tencongty_uv"
                                                                placeholder="Nhập tên công ty" name="tencongty_uv"
                                                                value="">
                                                        </div>
                                                        <div class="form-group h_form-group">
                                                            <label for=""><span>*</span>Ngày
                                                                bắt đầu</label>
                                                            <input type="date" class="form-control"
                                                                placeholder="Chọn ngày bắt đầu" id="ngaybatdau_uv"
                                                                name="ngaybatdau_uv" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="h-ngaysinh h-ngaysinh_themmoi">
                                                        <div class="form-group h_form-group1 h_form_kinhnghiem">
                                                            <label for=""><span>*</span>Chọn
                                                                chức danh</label>
                                                            <div class="h_div_select">
                                                                <select class="custom-select my-1 mr-sm-2"
                                                                    id="chucdanh_uv_sua" name="chucdanh_uv">
                                                                    <option value="">Chọn cấp bậc</option>
                                                                    <?
                                                                    foreach ($array_capbac as $key => $value) {
                                                                    ?>
                                                                    <option value="<?= $key ?>"><?= $value ?></option>
                                                                    <?
                                                                        }
                                                                        ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group h_form-group">
                                                            <label for=""><span>*</span>Ngày
                                                                kết thúc</label>
                                                            <input type="date" class="form-control"
                                                                placeholder="Mời bạn nhập tỉnh thành"
                                                                id="ngayketthuc_uv" name="ngayketthuc_uv" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="h-ngaysinh h-ngaysinh_themmoi">
                                                    <div class="form-group h_form-group">
                                                        <label for=""><span>*</span>Mô tả
                                                            công việc</label>
                                                        <textarea class="form-control" id="motacongviec_uv_kn"
                                                            name="motacongviec_uv_kn" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer h_modal_footer">
                                                <button type="button"
                                                    class="btn bg-warning bg-white h_modal_footer_button"
                                                    data-dismiss="modal">Bỏ qua</button>
                                                <button type="submit" name="btn_luu" id="btn_luu_kn" value="submit"
                                                    class="btn bg-warning text-white">Cập
                                                    nhập</button>
                                                <!-- input -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?
                        }
                        ?>
                    </div>
                    <div class="h_themkinhnghiem">
                        <button type="button" class="btn bg-white" data-toggle="modal"
                            data-target="#exampleModalthemmoi">
                            <i style='font-size:14px' class='fas'>&#xf303;</i>Thêm kinh nghiệm làm việc
                        </button>
                        <div class="modal fade" id="exampleModalthemmoi" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabelthemmoi" aria-hidden="true">
                            <div class="modal-dialog h_div_modal_dialog" role="document">
                                <div class="modal-content h_modal-content">
                                    <div class="modal-header h_themmoi_header">
                                        <h5 class="modal-title" id="exampleModalLabelthemmoi">Thêm mới kinh
                                            nghiệm làm việc</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="h-ngaysinh">
                                                        <div class="form-group h_form-group h_ngoisao">
                                                            <label for=""><span>*</span>Tên
                                                                công ty </label>
                                                            <input type="text" class="form-control" id="tencongty_uv"
                                                                placeholder="Nhập tên công ty" name="tencongty_uv">
                                                        </div>
                                                        <span id="tencongty_uv_erro"></span>
                                                        <div class="form-group h_form-group h_ngoisao">
                                                            <label for=""><span>*</span>Ngày
                                                                bắt đầu</label>
                                                            <input type="date" class="form-control" name="ngaybatdau_uv"
                                                                id="ngaybatdau_uv" placeholder="Chọn ngày bắt đầu">
                                                        </div>
                                                        <span id="ngaybatdau_uv_erro"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="h-ngaysinh">
                                                        <div
                                                            class="form-group h_form-group1 h_form_kinhnghiem h_ngoisao">
                                                            <label for=""><span>*</span>Chọn
                                                                chức danh/ Vị trí</label>
                                                            <div class="h_div_select">
                                                                <select class="custom-select my-1 mr-sm-2"
                                                                    id="chucdanh_uv" name="chucdanh_uv">
                                                                    <option value=""></option>
                                                                    <?
                                                                                foreach ($array_capbac as $key => $value) {
                                                                                ?>
                                                                    <option value="<?= $value ?>">
                                                                        <?= $value ?></option>
                                                                    <?
                                                                                  }
                                                                                  ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <span id="chucdanh_uv_erro"></span>
                                                        <div class="form-group h_form-group h_ngoisao">
                                                            <label for=""><span>*</span>Ngày
                                                                kết thúc</label>
                                                            <input type="date" class="form-control"
                                                                placeholder="Mời bạn nhập tỉnh thành"
                                                                id="ngayketthuc_uv" name="ngayketthuc_uv">
                                                        </div>
                                                        <span id="ngayketthuc_uv_erro"></span>
                                                    </div>
                                                </div>
                                                <div class="h-ngaysinh">
                                                    <div class="form-group h_form-group h_ngosao">
                                                        <label for=""><span>*</span>Mô tả
                                                            công việc</label>
                                                        <textarea class="form-control h-textarea" rows="3"
                                                            name="motacongviec_uv_kn"
                                                            id="motacongviec_uv_kn1"></textarea>
                                                    </div>
                                                    <span id="motacongviec_uv_kn_erro"></span>
                                                </div>

                                            </div>
                                            <div class="modal-footer h_modal_footer">
                                                <button type="button"
                                                    class="btn bg-warning bg-white h_modal_footer_button"
                                                    data-dismiss="modal">Bỏ qua</button>
                                                <button type="submit" class="btn bg-warning text-white"
                                                    name="btn_submit">
                                                    Thêm mới</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<script src="../node_modules/slick-carousel/slick/slick.js" type="text/javascript" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
$(document).ready(function() {
    $('.btn-remove').on('click', function() {
        Swal.fire({
            title: 'Cảnh báo!',
            text: "Bạn chắc chắn muốn xóa thông tin này?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý!'
        }).then((result) => {
            if (result.value) {
                var url = $(this).attr('href');
                window.location.href = url;
            }
        })
        return false;
    });
});
$(document).ready(function() {
    $('#chucdanh_uv').select2({
        placeholder: "Mời bạn chọn chức danh / Vị trí",
        width: "100%"
    });
    $('.h_button_kinhnghiem .bg-white').click(function() {
        e = $(this);
        id = e.data('id');
        $('#btn_luu_kn').val(id);
        $.ajax({
            type: "POST",
            url: "../ajax/getKN.php",
            dataType: "json",
            data: {
                id: id
            },
            success: function(data) {
                $('#tencongty_uv').val(data.tencongty_uv);
                $('#chucdanh_uv_sua').val(data.chucdanh_uv);
                $('#ngaybatdau_uv').val(data.ngaybatdau_uv);
                $('#ngayketthuc_uv').val(data.ngayketthuc_uv);
                $('#motacongviec_uv_kn').val(data.motacongviec_uv_kn);
            }

        });
        $('#btn_luu_kn').click(function() {
            id = $(this).val();
            $.ajax({
                type: "POST",
                url: "../ajax/getKN.php",
                dataType: "json",
                data: {
                    id: id
                },
                success: function(data) {
                    $('#tencongty_uv').val(data.tencongty_uv);
                    $('#chucdanh_uv_sua').val(data.chucdanh_uv);
                    $('#ngaybatdau_uv').val(data.ngaybatdau_uv);
                    $('#ngayketthuc_uv').val(data.ngayketthuc_uv);
                    $('#motacongviec_uv_kn').val(data.motacongviec_uv_kn);
                }
            });
        });

    });
});

function validateform() {
    var tencity = document.getElementById('tencongty_uv').value;
    var chucdanh = document.getElementById('chucdanh_uv').value;
    var batdau = document.getElementById('ngaybatdau_uv').value;
    var ketthuc = document.getElementById('ngayketthuc_uv').value;
    var motacongviec = document.getElementById('motacongviec_uv_kn').value;
    var status = true;
    if (tencity == "") {
        document.getElementById('tencongty_uv_erro').innerHTML = "Mời bạn điền thông tin tên công ty";
        status = false;
    } else document.getElementById('tencongty_uv_erro').innerHTML = ""
    if (chucdanh == "") {
        document.getElementById('chucdanh_uv_erro').innerHTML = "Mời bạn chọn chức danh trong công ty";
        status = false;
    } else document.getElementById('chucdanh_uv_erro').innerHTML = ""
    if (batdau == "") {
        document.getElementById('ngaybatdau_uv_erro').innerHTML = "Mời bạn chọn ngày bắt đầu ";
        status = false;
    } else document.getElementById('ngaybatdau_uv_erro').innerHTML = ""
    if (ketthuc == "") {
        document.getElementById('ngayketthuc_uv_erro').innerHTML = "Mời bạn chọn ngày kết thúc";
        status = false;
    } else document.getElementById('ngayketthuc_uv_erro').innerHTML = ""
    if (motacongviec == "") {
        document.getElementById('motacongviec_uv_kn_erro').innerHTML = "Mời bạn viết mô tả công việc của mình";
        status = false;
    } else document.getElementById('motacongviec_uv_kn_erro').innerHTML = ""
    return status;
}
</script>