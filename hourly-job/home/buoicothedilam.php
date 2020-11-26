<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Buổi có thể đi làm</title>
    <link rel="stylesheet" type="text/css" href="../node_modules/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="../node_modules/slick-carousel/slick/slick-theme.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/css.css" />
</head>

<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<style>
@import url("https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap");

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Montserrat", sans-serif;
}

.container_h {
    display: flex;
    flex-wrap: wrap;
}

.container .option_item {
    display: block;
    position: relative;
    width: 129px;
    height: 40px;
    margin: 2px;
}

.container .option_item .checkbox {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
    opacity: 0;
}

.option_item .option_inner {

    background: #FAFAFA;
    text-align: center;
    cursor: pointer;
    height: 40px;
    display: block;
    border: 5px solid transparent;
    position: relative;
    color: #646464;

}

.option_item .option_inner .name {
    user-select: none;
    line-height: 30px;
}


.option_item .checkbox:checked~.option_inner.instagram {
    background: #FCA927;
    font-family: Roboto-Regular;
    font-style: normal;
    font-weight: 500;
    font-size: 16px;
    line-height: 28px;
    /* identical to box height, or 175% */
    text-align: center;

    color: #FFFFFF;
}
</style>

<body>
    <? include('../_share/herder_hoso.php'); ?>
    <div class="div_thongtinhosocanhan">
        <div class="container-fluid">
            <div class="row">
                <? include('../_share/menu_hoanthien_hoso.php'); ?>
                <div class="col-xl-9 div_quanlythongtincoban">
                    <?php include('../_share/menu_hoanthienhoso.php'); ?>
                    <div class="h_thongtincoban">
                        <h2>Buổi có thể đi làm</h2>
                        <hr>

                        <form action="test.php" method="POST">

                            <div class="wrapper">
                                <div class="row h_chon_ngay_uv container container_h">
                                    <input type="button" class=" col-lg col" value="Thứ 2">
                                    <input type="button" class=" col-lg col" value="Thứ 3">
                                    <input type="button" class=" col-lg col" value="Thứ 4">
                                    <input type="button" class=" col-lg col" value="Thứ 5">
                                    <input type="button" class=" col-lg col" value="Thứ 6">
                                    <input type="button" class=" col-lg col" value="Thứ 7">
                                    <input type="button" class=" col-lg col" value="Chủ nhật">
                                </div>
                                <div class="container container_h">
                                    <label class="option_item">
                                        <input type="checkbox" class=" checkbox h_sang" name="t2_sang" id="t2_sang"
                                            value=''>
                                        <div class="option_inner instagram ">
                                            <div class="name">Sáng</div>
                                        </div>
                                    </label>
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox h_sang" name="t3_sang" id="t3_sang"
                                            value=''>
                                        <div class="option_inner instagram">
                                            <div class="name">Sáng</div>
                                        </div>
                                    </label>
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox h_sang" name="t4_sang" id="t4_sang"
                                            value=''>
                                        <div class="option_inner instagram">
                                            <div class="name">Sáng</div>
                                        </div>
                                    </label>
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox h_sang" name="t5_sang" id="t5_sang"
                                            value=''>
                                        <div class="option_inner instagram">
                                            <div class="name">Sáng</div>
                                        </div>
                                    </label>
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox h_sang" name="t6_sang" id="t6_sang"
                                            value=''>
                                        <div class="option_inner instagram">
                                            <div class="name">Sáng</div>
                                        </div>
                                    </label>
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox h_sang" name="t7_sang" id="t7_sang"
                                            value=''>
                                        <div class="option_inner instagram">
                                            <div class="name">Sáng</div>
                                        </div>
                                    </label>
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox h_sang" name="chu_nhat_sang"
                                            id="chu_nhat_sang" value=''>
                                        <div class="option_inner instagram">
                                            <div class="name">Sáng</div>
                                        </div>
                                    </label>
                                </div>
                                <div class="container container_h">
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox h_chieu" name="t2_chieu" id="t2_chieu"
                                            value=''>
                                        <div class="option_inner instagram">
                                            <div class="name">Chiều</div>
                                        </div>
                                    </label>
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox h_chieu" name="t3_chieu" id="t3_chieu"
                                            value=''>
                                        <div class="option_inner instagram">

                                            <div class="name">Chiều</div>
                                        </div>
                                    </label>
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox h_chieu" name="t4_chieu" id="t4_chieu"
                                            value=''>
                                        <div class="option_inner instagram">

                                            <div class="name">Chiều</div>
                                        </div>
                                    </label>
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox h_chieu" name="t5_chieu" id="t5_chieu"
                                            value=''>
                                        <div class="option_inner instagram">

                                            <div class="name">Chiều</div>
                                        </div>
                                    </label>
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox h_chieu" name="t6_chieu" id="t6_chieu"
                                            value=''>
                                        <div class="option_inner instagram">
                                            <div class="name">Chiều</div>
                                        </div>
                                    </label>
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox h_chieu" name="t7_chieu" id="t7_chieu"
                                            value=''>
                                        <div class="option_inner instagram">
                                            <div class="name">Chiều</div>
                                        </div>
                                    </label>
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox h_chieu" name="chu_nhat_chieu"
                                            id="chu_nhat_chieu" value=''>
                                        <div class="option_inner instagram">
                                            <div class="name">Chiều</div>
                                        </div>
                                    </label>

                                </div>
                                <div class="container container_h">
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox h_toi" name="t2_toi" id="t2_toi"
                                            value=''>
                                        <div class="option_inner instagram">
                                            <div class="name">Tối</div>
                                        </div>
                                    </label>
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox h_toi" name="t3_toi" id="t3_toi"
                                            value=''>
                                        <div class="option_inner instagram">

                                            <div class="name">Tối</div>
                                        </div>
                                    </label>
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox h_toi" name="t4_toi" id="t4_toi"
                                            value=''>
                                        <div class="option_inner instagram">

                                            <div class="name">Tối</div>
                                        </div>
                                    </label>
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox h_toi" name="t5_toi" id="t5_toi"
                                            value=''>
                                        <div class="option_inner instagram">

                                            <div class="name">Tối</div>
                                        </div>
                                    </label>
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox h_toi" name="t6_toi" id="t6_toi"
                                            value=''>
                                        <div class="option_inner instagram">
                                            <div class="name">Tối</div>
                                        </div>
                                    </label>
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox h_toi" name="t7_toi" id="t7_toi"
                                            value=''>
                                        <div class="option_inner instagram">
                                            <div class="name">Tối</div>
                                        </div>
                                    </label>
                                    <label class="option_item">
                                        <input type="checkbox" class="checkbox h_toi" name="chu_nhat_toi"
                                            id="chu_nhat_toi" value=''>
                                        <div class="option_inner instagram">
                                            <div class="name">Tối</div>
                                        </div>
                                    </label>

                                </div>
                            </div>
                            <div class="h_">
                                <button type="submit" name="btn_luu" class="btn h_capnhap">
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
$(document).ready(function() {
    $('#date,#date1,#date2').select2();

});
// $(".option_inner").click(function() {
//     var thaybg = $(this);
//     thaybg.addClass('h_red');
//     thaybg.toggleClass('h_blue');
// });

$(".h_sang,.h_chieu,.h_toi").click(function() {
    $('#t2_sang').val(1);
    $('#t3_sang').val(1);
    $('#t4_sang').val(1);
    $('#t5_sang').val(1);
    $('#t6_sang').val(1);
    $('#t6_sang').val(1);
    $('#t7_sang').val(1);
    $('#chu_nhat_sang').val(1);
    $('#t2_chieu').val(1);
    $('#t3_chieu').val(1);
    $('#t4_chieu').val(1);
    $('#t5_chieu').val(1);
    $('#t6_chieu').val(1);
    $('#t6_chieu').val(1);
    $('#t7_chieu').val(1);
    $('#chu_nhat_chieu').val(1);
    $('#t2_toi').val(1);
    $('#t3_toi').val(1);
    $('#t4_toi').val(1);
    $('#t5_toi').val(1);
    $('#t6_toi').val(1);
    $('#t6_toi').val(1);
    $('#t7_toi').val(1);
    $('#chu_nhat_toi').val(1);
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