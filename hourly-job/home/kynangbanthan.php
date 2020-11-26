<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kỹ năng bản thân</title>
    <link rel="stylesheet" type="text/css" href="../node_modules/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="../node_modules/slick-carousel/slick/slick-theme.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/css.css" />
</head>
<? 
include("../home/config.php");
if (isset($_POST['btn_luu'])) {
    if(!isset($_COOKIE['UID'])) {
      
  } else{
    $id_uv = $_COOKIE['UID'];
    $motakynang_uv = $_POST['motakynang_uv']; 
    $query = "UPDATE vltg_user_uv SET motakynang_uv='$motakynang_uv' WHERE id_uv='$id_uv'";
    $db_ex = new db_execute_return();
    $kq = $db_ex->db_execute($query); 
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
                    <?php  include('../_share/menu_hoanthienhoso.php');?>
                    <div class="h_thongtincoban">
                        <h2>Kỹ năng bản thân</h2>
                        <hr>
                        <form action="" method="post" onsubmit="return validateform()">
                            <label for="">Mô tả ngắn về kỹ năng bản thân</label>

                            <textarea class="form-control h_kynangbanthan_text" placeholder="- Kỹ năng giao tiếp
- Kỹ năng thuyết trình 
- Kỹ năng giải quyết vấn đề
- Có khả năng làm việc dưới áp lức cao
" row="3" id="motakynang_uv" name="motakynang_uv"></textarea>
                            <span id="motakynang_uv_erro" style="color: red;"></span>
                            <br>
                            <div class="h_button">
                                <button type="submit" value="Submit" name="btn_luu" class="btn h_capnhap">
                                    Cập nhật
                                </button>
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
<script src="../node_modules/slick-carousel/slick/slick.js" type="text/javascript" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script>
function validateform() {
    var mota = document.getElementById('motakynang_uv').value;
    var status = true;
    if (mota == "") {
        document.getElementById('motakynang_uv_erro').innerHTML =
            "Mời bạn điền đầy đủ thông tin mô tả kỹ năng của bản thân mình?";
        status = false;
    } else document.getElementById('motakynang_uv_erro').innerHTML = ""
    return status;
}
</script>