<!-- Đăng ký -->

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script>
function fileValidation() {
    var fileInput = document.getElementById('file_image');
    var filePath = fileInput.value; //lấy giá trị input theo id
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i; //các tập tin cho phép
    //Kiểm tra định dạng
    if (!allowedExtensions.exec(filePath)) {
        alert('Vui lòng upload các file có định dạng: .jpeg/.jpg/.png/.gif');
        // document.getElementById('file').innerText = "Vui lòng upload các file có định dạng: .jpeg/.jpg/.png/.gif";
        fileInput.value = '';
        return false;
    } else {
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('imagePreview').innerHTML =
                    '<img style="width:98px;height:98px;" src="' + e.target.result + '"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

function validateform() {
    var sdt_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
    var sdt = document.getElementById('sdt_uv').value;
    var formOK = true;
    if (sdt == "") {
        document.getElementById('loi_sdt_NTD').innerHTML = "Bạn chưa nhập số điện thoại";
        formOK = false;
    } else if (sdt_regex.test(sdt) == false) {
        document.getElementById('loi_sdt_NTD').innerHTML = "Bạn nhập chưa đúng định dạng số điện thoại";
        // return 0;
    } else {
        document.getElementById('loi_sdt_NTD').innerHTML = "";
    }

    return formOK;
}
</script>
<script>
$(document).ready(function() {
    $('#date10,#date11,#date12').select2({
        width: "100%"
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
    $("#validation").validate({
            rules: {

                name_uv: {
                    // đây là trường name của input
                    required: true // không được để trống
                }

                ,
                password_uv: {
                    required: true,
                    minlength: 6,
                }

                ,
                cppassword_uv: {
                    equalTo: "#password_uv"
                },
                diachi_uv: {
                    required: true
                },
                thanhpho_uv: {
                    required: true
                },
                huyen_uv: {
                    required: true
                },
                congviec_uv: {
                    required: true
                },
                noilamviec_uv: {
                    required: true
                },
                nganh_uv: {
                    required: true
                }

            }

            ,
            messages: {
                name_uv: {
                    required: "Xin vui lòng nhập họ và tên!"
                }

                ,
                sdt_uv: {
                    required: "Xin vui lòng nhập thông tin số điện thoại !",
                }

                ,
                password_uv: {
                    required: "Hãy điền mật khẩu",
                    minlength: "Mật khẩu ít nhất 6 ký tự"
                }

                ,
                cppassword_uv: {
                    equalTo: "Mật khẩu xác nhận không chính xác"

                },
                diachi_uv: {
                    required: "Mời bạn nhập địa chỉ"

                },
                thanhpho_uv: {
                    required: "Mời bạn chọn tên thành phố"

                },
                huyen_uv: {
                    required: "Mời bạn chọn tên huyện"

                },
                congviec_uv: {
                    required: "Mời bạn chọn tên công việc"

                },
                noilamviec_uv: {
                    required: "Mời bạn chọn nơi làm việc"

                },
                nganh_uv: {
                    required: "Mời bạn chọn ngành mong muốn"

                },

            }
        }

    );
});

$("#div_1").click(function() {
    $("#file_image").click();
});
$('#date11').change(function() {
    idCity = $(this).val();
    $.ajax({
        type: "POST",
        url: "../ajax/huyen.php",
        data: {
            idCity: idCity
        },
        success: function(data) {
            $('#date12').html(data);
        }
    });
});
</script>
<!-- Đăng nhập -->
<script>
function validateform() {
    var sdt_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
    var sdt_uv = document.myform.sdt_uv.value;
    var password_mk = document.myform.password_uv.value;
    var status = false;

    if (sdt_uv == null || sdt_uv == "") {
        document.getElementById("xuly").innerHTML = "Vui lòng nhập đầy thông tin số điện thoại";
        status = false;
    } else if (sdt_regex.test(sdt_uv) == false) {
        document.getElementById("xuly").innerHTML = "Định dạng số điên thoại sai"
        status = false;
    } else {
        document.getElementById("xuly").innerHTML = ""
        status = true;
    }
    if (password_mk == "") {
        document.getElementById("password1").innerHTML = "Bạn chưa nhập mật khẩu";
        status = false;
    } else if (password_mk.length < 6) {
        document.getElementById("password1").innerHTML = "Mật khẩu phải có hơn 6 ký tự";
        status = false;
    } else {
        document.getElementById("password1").innerHTML = "";
        status = true;
    }
    return status;
}
</script>
<!-- hoan thien ho so -->
<script>
$(document).ready(function() {
    $('#date,#date1,#date2').select2({
        width: "30%"
    });
    $('#date11,#date12').select2({
        width: "100%"
    });
    $('#date11').change(function() {
        idCity = $(this).val();
        $.ajax({
            type: "POST",
            url: "../ajax/huyen.php",
            data: {
                idCity: idCity
            },
            success: function(data) {
                $('#date12').html(data);
            }
        });
    });

});
$("#h_anh_hoanthienhoso").click(function() {
    $("#file_image").click();
});
</script>
<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
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