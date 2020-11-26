<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Đăng ký</title>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../css/css.css" />
    <link rel="stylesheet" href="../css/q_style.css">
  </head>
  <?php
    include('../home/config.php');

  ?>
  <body>
    <div class="wapper">
      <div class="container-fluid">
        <div class="row regis-ntd">
          <div class="col-lg-4 tin">
            <div class="icon1">
              <a href=""><img src="../image/.png" alt="" /></a>
            </div>
            <div class="logo"></div>
            <div class="anhone">
              <img src="../image/12.png" alt="" />
            </div>
            <div class="textone">
              Tìm việc làm theo giờ hiệu quả về di động của bạn và sẵn sàng nhận
              việc ngay hôm nay!
            </div>
            <div class="buttonone">
              <div class="button1">
                <button type="button" class="btn btn-primar11">
                  <a href="" class="text-dark"
                    ><img src="../image/apptimviec 1.png" alt="" />Tải app
                    Timviec365
                  </a>
                </button>
              </div>
              <div class="button11 div_button_one">
                <button type="button" class="btn btn-primar11 icon1">
                  <div href="" class="text-dark">
                    <img src="../image/Group 6 (1) 1.png" alt="" />Tải app
                    Timviec365
                  </div>
                </button>
              </div>
            </div>
          </div>
          <div class="col-lg-8 tin1">
            <div class="tieude">
              <h2>Đăng ký tài khoản nhà tuyển dụng</h2>
            </div>
            <form name="frm_dky_NTD" action="" method="post" onsubmit="return validateform()">
              <div class="row">
                <div class="col-md-6 tin2">
                  <div class="text3"><samp>*</samp>Tải lên logo</div>
                  <div class="avata">
                    <div id="div_1">
                      <div id="div_2">

                        <i class="fa fa-camera-retro" aria-hidden="true"></i>
                      </div>
                      <img src="#" id="blah" style="width: 98px; height: 98px">
                      
                    </div>
                    <input type="file" id="upload_file" />
                   <span id="loi_anh_NTD"></span>
                  </div>
                  <div class="form2">
                    <div class="form-group">
                      <label for=""><span>*</span>Số điện thoại</label>
                      <input
                        type=""
                        class="form-control"
                        id="sdt_NTD"
                        aria-describedby="emailHelp"
                        placeholder="Nhập số điện thoại" onclick =
                      />
                      <span id="loi_sdt_NTD"></span>
                    </div>
                    <div class="form-group">
                      <label for=""><span>*</span>Mật khẩu</label>
                      <input
                        type="password"
                        class="form-control"
                        id="pwd_NTD"
                        placeholder="Nhập mật khẩu"
                      />
                      <span id="loi_pwd_NTD"></span>
                    </div>
                    <div class="form-group">
                      <label for=""><span>*</span>Nhập lại mật khẩu</label>
                      <input
                        type="password"
                        class="form-control"
                        id="retype_pwd_NTD"
                        placeholder="Nhập lại mật khẩu"
                      />
                      <span id="loi_retype_pwd_NTD"></span>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 tin3">
                  <div class="form-group">
                    <label for=""><span>*</span>Tên doanh nghiêp</label>
                    <input
                      type=""
                      class="form-control"
                      id="ten_NTD"
                      aria-describedby=""
                      placeholder="Nhập tên doanh nghiêp "
                    />
                    <span id="loi_ten_NTD"></span>
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input
                      type="email"
                      class="form-control"
                      id="email_NTD"
                      placeholder="Nhập email"
                    />
                    <span id="loi_email_NTD"></span>
                  </div>
                  <div class="form-group">
                    <label for=""><span>*</span>Địa chỉ</label>
                    <input
                      type=""
                      class="form-control"
                      id="diachi_NTD"
                      placeholder="Nhập địa chỉ"
                    />
                    <span id="loi_diachi_NTD"></span>
                  </div>
                  <div class="form-group">
                    <label for=""><span>*</span>Tỉnh/thành phố</label>
                    <select class="form-control js-example-basic-multiple" id="city_NTD" name="states[]" multiple="multiple">
                    
                      <option value>--Chọn tỉnh/thành phố--</option>
                                            <?php 
                                            $sql ="select * from city";
                                            $db_qr = new db_query($sql);
                                            While($row = mysql_fetch_assoc($db_qr->result)){
                                                echo '<option value="'.$row["cit_id"].'">'.$row["cit_name"].'</option>';
                                            }
                                            
                                            ?>
                    </select>
                    <span id="loi_city_NTD"></span>
                  </div>
                  <div class="form-group">
                    <label for=""><span>*</span>Quận/huyện</label>
                    <select class="form-control" id="quan_NTD">
                      
                    </select>
                    <span id="loi_quan_NTD"></span>
                  </div>
                </div>
              </div>
              <div class="button01">
                <button type="submit" value="Đăng ký" class="btn btn-lg">
                Đăng ký
                </button>
                <div class="forget-pw">
                  <div class="resigner">
                    <span
                      >Bạn đã có tài khoản? <a href="login_ntd.php">Đăng nhập ngay</a></span
                    >
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
    crossorigin="anonymous"
  ></script>

  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script src="/js/validate_form-dky-ntd.js"></script>
  <script>
    function validateform(){
      var sdt_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
      var sdt = document.getElementById('sdt_NTD').value;
      var mk = document.getElementById('pwd_NTD').value;
      var retype_mk = document.getElementById('retype_pwd_NTD').value;
      var ten = document.getElementById('ten_NTD').value;
      var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      var email = document.getElementById('email_NTD').value;
      var diachi = document.getElementById('diachi_NTD').value;
      var tinh = document.getElementById('city_NTD').value;
      var quan = document.getElementById('quan_NTD').value;
      var formOK = true;
      if (sdt == "") {
        document.getElementById('loi_sdt_NTD').innerHTML = "Bạn chưa nhập số điện thoại";
        formOK = false;
      } else if (sdt_regex.test(sdt) == false) {
        document.getElementById('loi_sdt_NTD').innerHTML = "Bạn nhập chưa đúng định dạng số điện thoại";
        // return 0;
       } else {
        document.getElementById('loi_sdt_NTD').innerHTML ="";
      }
      if (mk == "") {
        document.getElementById('loi_pwd_NTD').innerHTML = "Bạn chưa nhập mật khẩu";
       // return 0;
      } else if (mk.length < 8 ){
        document.getElementById('loi_pwd_NTD').innerHTML = "Mật khẩu phải có hơn 8 ký tự";
       // return 0;
      } else {
        document.getElementById('loi_pwd_NTD').innerHTML = "";
      }
      if (retype_mk != mk) {
        document.getElementById('loi_retype_pwd_NTD').innerHTML ="Mật khẩu nhập lại không trùng khớp";
       // return 0;
      } else {
        document.getElementById('loi_retype_pwd_NTD').innerHTML ="";
      }
      if (ten == "") {
        document.getElementById('loi_ten_NTD').innerHTML = "Bạn chưa nhập tên công ty";
      //  return 0;
      } else document.getElementById('loi_ten_NTD').innerHTML ="";
      if (email == "") {
        document.getElementById('loi_email_NTD').innerHTML = "Bạn chưa nhập email";
      //  return 0
      }
       else if (email.match(mailformat) == null) {
        document.getElementById('loi_email_NTD').innerHTML = "Bạn nhập chưa đúng định dạng email";
        return 0;
      } else document.getElementById('loi_email_NTD').innerHTML = "";
      if (diachi == "") {
        document.getElementById('loi_diachi_NTD').innerHTML = "Bạn chưa nhập địa chỉ";
       // return 0;
      } else document.getElementById('loi_diachi_NTD').innerHTML = "";
      if (tinh =="") {
        document.getElementById('loi_city_NTD').innerHTML = "Bạn chưa chọn tỉnh thành";
       // return 0;
      }
      else document.getElementById('loi_city_NTD').innerHTML =" Bạn đã chọn" +tinh;
      if (quan =="") {
        document.getElementById('loi_quan_NTD').innerHTML = "Bạn chưa chọn quận/huyện";
       // return 0;
      } else {
        document.getElementById('loi_quan_NTD').innerHTML ="";
        
      }
    return formOK;
    }
    function readURL(input) {
    var url = input.value;
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.imagepreview').attr('src', e.target.result);
        }
        document.getElementById('loi_anh_NTD').innerHTML ="";
        reader.readAsDataURL(input.files[0]);
    }else{
         document.getElementById('loi_anh_NTD').innerHTML = "Tệp được chọn phải là định dạng .gif, .png, .jpeg, .jpg";
    }
}
    
    $("#upload_file").change(function(){
        readURL(this);
    });
    $('#city_NTD').change(function() {
            idCity = $(this).val();
            $.ajax({
                type: "POST",
                url: "../ajax/quanhuyen.php",
                data: {
                    idCity: idCity
                },
                success: function(data) {
                    $('#quan_NTD').html(data);
                }
            });
        })
    $("#div_1").click(function () {
      $("#upload_file").click();
    });
  </script>
  <script>
    $(document).ready(function() {
        $('#city_NTD,#quan_NTD').select2();
      });
  </script>
</html>
