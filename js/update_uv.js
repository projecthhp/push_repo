$(document).ready(function () {
  $("#btn_edit_tt").on('click', function () {
    $("#tt_email_uv").addClass('hidden');
    $("#form_edit_tt").removeClass('hidden');
    $(this).addClass("hidden");
  });

  $("#edit_tt_cancel").on("click", function () {
    $("#form_edit_tt").addClass('hidden');
    $("#tt_email_uv").removeClass('hidden');
    $("#btn_edit_tt").removeClass("hidden");
  });

  $("#btn_edit_chutk").on('click', function () {
    $('#form_edit_uv').removeClass('hidden');
    $("#edit_cv_uv").addClass('hidden');
    $(this).addClass("hidden");
  });

  $("#edit_uv_cancel").on("click", function () {
    $("#form_edit_uv").addClass('hidden');
    $("#edit_cv_uv").removeClass('hidden');
    $("#btn_edit_chutk").removeClass('hidden');
  });

  $("#btn_edit_company").on('click', function () {
    $("#edit_tt_company").addClass('hidden');
    $("#form_edit_company").removeClass('hidden');
    $(this).addClass("hidden");
  });

  $("#edit_company_cancel").on("click", function () {
    $("#form_edit_company").addClass('hidden');
    $("#edit_tt_company").removeClass('hidden');
    $("#btn_edit_company").removeClass("hidden");
  });

  $("#btn_submit_user").on("click", function () {
    var returnbutton = true;
    var ho_ten = $('#ho_ten').val();
    var sdt_user = $('#sdt_user').val();
    var ngay_sinh = $('#ngay_sinh').val();
    var user_gender = $('#user_gender').val();
    var tinh_trang_hon_nhan = $('#tinh_trang_hon_nhan').val();
    var dia_chi_hien_tai = $("#dia_chi_hien_tai").val();
    var use_thanh_pho = $("#use_thanh_pho").val();
    if (ho_ten.length == 0) {
      if ($('#ho_ten').hasClass('error') == false) {
        $($('#ho_ten')).addClass('error');
        $($('#ho_ten')).after("<label style='padding-left:25%; text-align: left;margin-bottom:0' id='ho_ten_error' class='error' for='ten_cty'>Vui lòng nhập họ tên</label>");
      }
      $('#ho_ten').focus();
      returnbutton = false;
    } else {
      $($('#ho_ten')).removeClass('error');
      $("#ho_ten_error").remove();
    }

    if (sdt_user.length == 0) {
      if ($('#sdt_user').hasClass('error') == false) {
        $('#sdt_user').addClass('error');
        $('#sdt_user').after("<label style='padding-left:25%; text-align: left;margin-bottom:0' id='sdt_user_error' class='error' for='quy_mo'>Vui lòng chọn số điện thoại</label>");
      }
      returnbutton = false;
    } else {
      $('#sdt_user').removeClass('error');
      $("#sdt_user_error").remove();
    }

    if (ngay_sinh == null || ngay_sinh == '') {
      if ($('#ngay_sinh').hasClass('error') == false) {
        $('#ngay_sinh').addClass('error');
        $('#ngay_sinh').after("<label style='padding-left:25%; text-align: left;margin-bottom:0' id='ngay_sinh_error' class='error' for='dia_chi_cty'>Vui lòng nhập ngày tháng năm sinh</label>");
      }
      $('#ngay_sinh').focus();
      returnbutton = false;
    } else {
      $('#ngay_sinh').removeClass('error');
      $("#ngay_sinh_error").remove();
    }

    if (user_gender == 0) {
      if ($('#user_gender').hasClass('error') == false) {
        $('#user_gender').addClass('error');
        $('#user_gender').after("<label id='user_gender_error' style='padding-left:25%' class='error'>Vui lòng chọn giới tính</label>");
      }
      returnbutton = false;
      $('#user_gender').focus();
    } else {
      $('#user_gender').removeClass('error');
      $('#user_gender_error').remove();
    }

    if (tinh_trang_hon_nhan == 0) {
      if ($('#tinh_trang_hon_nhan').hasClass('error') == false) {
        $('#tinh_trang_hon_nhan').addClass('error');
        $('#tinh_trang_hon_nhan').after("<label style='padding-left:25%; text-align: left' id='tinh_trang_hon_nhan_error' class='error' for='sdt_cty'>Vui lòng chọn tình trạng hôn nhân</label>");
      }
      $('#tinh_trang_hon_nhan').focus();
      returnbutton = false;
    } else {
      $('#tinh_trang_hon_nhan').removeClass('error');
      $("#tinh_trang_hon_nhan_error").remove();
    }

    if ($('#use_thanh_pho').val() == 0) {
      if ($('#use_thanh_pho').hasClass('error') == false) {
        $('#use_thanh_pho').addClass('error');
        $('#use_thanh_pho').after("<label style='padding-left:25%' class='error' id='thanh_pho_error'>Vui lòng chọn thành phố</label>");
      }
      returnbutton = false;
      $('#use_thanh_pho').focus();
    } else {
      $('#use_thanh_pho').removeClass('error');
      $('#thanh_pho_error').remove();
    }

    if (dia_chi_hien_tai.length == 0) {
      if ($('#dia_chi_hien_tai').hasClass('error') == false) {
        $('#dia_chi_hien_tai').addClass('error');
        $('#dia_chi_hien_tai').after("<label id='dia_chi_hien_tai_error' style='padding-left:25%' class='error'>Vui lòng nhập địa chỉ hiện tại</label>");
      }
    } else {
      $('#dia_chi_hien_tai_error').remove();
      $('#dia_chi_hien_tai').removeClass('error');
    }

    if (use_thanh_pho == 0) {
      if ($('#use_thanh_pho').hasClass == false) {
        $('#use_thanh_pho').addClass('error');
        $('#use_thanh_pho').after("<label id='use_thanh_pho_error' style='padding-left:25%' class='error'>Vui lòng chọn thành phố</label>");
      }
      $('#use_thanh_pho').focus();
      returnbutton = false;
    } else {
      $('#use_thanh_pho').removeClass('error');
      $('#use_thanh_pho_error').remove();
    }

    if (returnbutton == true) {
      $.ajax({
        type: "POST",
        url: '../ajax/update_info_user.php',
        dataType: 'json',
        data: {
          ho_ten: ho_ten,
          sdt_user: sdt_user,
          ngay_sinh: ngay_sinh,
          user_gender: user_gender,
          tinh_trang_hon_nhan: tinh_trang_hon_nhan,
          dia_chi_hien_tai: dia_chi_hien_tai,
          use_thanh_pho: use_thanh_pho
        },
        success: function (data) {
          $("#form_edit_company").addClass('hidden');
          $("#edit_tt_company").removeClass('hidden');
          $("#btn_edit_company").removeClass("hidden");
          $("#use_name_show").html(data.use_name);
          $("#use_phone_show").html(data.use_phone);
          $("#use_ns_show").html(data.birthday);
          $("#use_gender_show").html(data.gender);
          $("#use_tthn_show").html(data.lg_honnhan);
          $("#use_d_c_show").html(data.address);
          $("#use_t_p_show").html(data.use_city);
        },
        error: function (data) {
          console.log(data);
        }
      });
    }
  });

  $("#use_cv_submit").on("click", function () {

    var returnBTN = true;
    var user_tencv = $('#user_tencv').val();
    var cap_bac = $('#user_capbac').val();
    var dia_diem_lam_viec = $("#dia_diem_lam_viec").val();
    var sl_nganh_nghe = $("#sl_nganh_nghe").val();
    var use_muc_luong = $("#use_muc_luong").val();
    var use_hinh_thuc = $('#use_hinh_thuc').val();
    var use_kinh_nghiem = $('#use_kinh_nghiem').val();

    if (user_tencv.length == 0) {
      if ($("#user_tencv").hasClass('error') == false) {
        $("#user_tencv").addClass('error');
        $("#user_tencv").after("<label style='padding-left:25%; text-align:left' class='error' id='name_chutk_error' for='user_tencv'>Vui lòng nhập tên công việc</label>");
      }
      $('#user_tencv').focus();
      returnBTN = false;
    } else {
      $('#user_tencv').removeClass('error');
      $('#user_tencv_error').remove();
    }

    if (cap_bac == 0) {
      if ($("#user_capbac").hasClass('error') == false) {
        $("#user_capbac").addClass('error');
        $("#user_capbac").after("<label style='padding-left:25%; text-align:left' class='error' id='user_capbac_error' for='user_capbac'>Vui lòng chọn cấp bậc</label>");
      }
      $('#user_capbac').focus();
      returnBTN = false;
    } else {
      $('#user_capbac').removeClass('error');
      $('#user_capbac_error').remove();
    }

    if (dia_diem_lam_viec == null) {
      if ($("div.div_dd_lv .select2-container").hasClass('error') == false) {
        $("div.div_dd_lv .select2-container").addClass('error');
        $("div.div_dd_lv .select2-container").after("<label style='padding-left:25%; text-align:left' class='error' id='dia_diem_lam_viec_error' for='dia_diem_lam_viec'>Vui lòng chọn địa điểm</label>");
      }
      $('div.div_dd_lv .select2-container').focus();
      returnBTN = false;
    } else {
      $('div.div_dd_lv .select2-container').removeClass('error');
      $('#dia_diem_lam_viec_error').remove();
    }

    if (sl_nganh_nghe == null) {
      if ($("div.div_nganhnghe_mm .select2-container").hasClass('error') == false) {
        $("div.div_nganhnghe_mm .select2-container").addClass('error');
        $("div.div_nganhnghe_mm .select2-container").after("<label style='padding-left:25%; text-align:left' class='error' id='sl_nganh_nghe_error' for='sl_nganh_nghe'>Vui lòng chọn ngành nghề </label>");
      }
      $('div.div_nganhnghe_mm .select2-container').focus();
      returnBTN = false;
    } else {
      $('div.div_nganhnghe_mm .select2-container').removeClass('error');
      $('#sl_nganh_nghe_error').remove();
    }

    if (use_muc_luong == 0) {
      if ($('#use_muc_luong').hasClass('error') == false) {
        $('#use_muc_luong').after("<label style='padding-left:25%' id='use_muc_luong_error' class='error'>Vui lòng nhập mức lương</label>");
        $('#use_muc_luong').addClass('error');
      }
      returnBTN = false;
      $("#use_muc_luong").focus();
    } else {
      $('#use_muc_luong').removeClass('error');
      $('#use_muc_luong_error').remove();
    }

    if (returnBTN == true) {
      $.ajax({
        type: "POST",
        url: "../ajax/update_job_user.php",
        dataType: 'json',
        data: {
          user_tencv: user_tencv,
          cap_bac: cap_bac,
          dia_diem_lam_viec: dia_diem_lam_viec,
          sl_nganh_nghe: sl_nganh_nghe,
          use_muc_luong: use_muc_luong,
          use_hinh_thuc: use_hinh_thuc,
          use_kinh_nghiem: use_kinh_nghiem
        },
        success: function (data) {
          $('#form_edit_uv').addClass('hidden');
          $('#edit_cv_uv').removeClass('hidden');
          $('#btn_edit_chutk').removeClass('hidden');

          $('p#ten_cv').html(data.use_job_name);
          $("#hienthi_capbac").html(data.cap_bac_mong_muon);
          $("#hienthi_diadiem").html(data.use_district_job);
          $("#hienthi_nganhnghe").html(data.use_nganh_nghe);
          $('#hienthi_mucluong').html(data.salary);
          $('#hienthi_hinhthuc').html(data.work_option);
          $('#hienthi_kinhnghiem').html(data.exp_years);
        },
        error: function (data) {
          console.log(data);
        }
      });
    }
  });

  $("#use_tk_submit").on('click', function () {
    var password_first = $('#password_first').val();
    var password_second = $('#password_second').val();
    if (password_first.length < 4) {
      if ($('#password_first').hasClass('error') == false) {
        $('#password_first').addClass('error');
        $('#password_first').after("<label id='password_first_error' class='error' for='password_first'>Mật khẩu phải lớn hơn 4 kí tự</label>");
      }

      $('#password_first').focus();
      return false;
    } else {
      $('#password_first').removeClass('error');
      $('#password_first_error').remove();


      //Check mat khau co trung trong csdl ko
      $.ajax({
        type: "POST",
        url: "../ajax/checkpass_uv.php",
        data: {
          password: password_first
        },
        success: function (data) {
          if (data != 1) {
            if ($('#password_first').hasClass('error') == false) {
              $('#password_first').addClass('error');
              $('#password_first').after("<label id='password_first_error' class='error' for='password_first'>Mật khẩu cũ phải trùng nhau</label>");
              return false;
            } else {
              $('#password_first').removeClass('error');
              $("#password_first_error").remove();
            }
          } else {
            if (password_second.length == 0) {
              if ($('#password_second').hasClass('error') == false) {
                $('#password_second').addClass('error');
                $('#password_second').after("<label id='password_second_error' class='error' for='password_second'>Vui lòng nhập mật khẩu mới</label>");
                $("#password_second").focus();
                return false;
              }
            } else {
              $('#password_second').removeClass('error');
              $('#password_second_error').remove();
              $.ajax({
                type: 'POST',
                url: "../ajax/update_doimk_uv.php",
                data: {
                  password_first: password_first,
                  password_second: password_second
                },
                success: function (data) {
                  alert(data);
                  $("#form_edit_tt").addClass('hidden');
                  $("#tt_email_uv").removeClass('hidden');
                  $("#btn_edit_tt").removeClass("hidden");
                }
              });
            }
          }
        }
      });
    }
  });

  $("#password_first").keyup(function () {
    if ($("#password_first").val().length == 0) {
      if ($('#password_first').hasClass('error') == false) {
        $("#password_first").addClass('error');
        $("#password_first").after("<label id='password_first_error' class='error' for='password_first' style='padding-left:25%;text-align:left'>Vui lòng nhập mật khẩu hiện tại</label>");
      }
    } else {
      $("#password_first").removeClass('error');
      $("#password_first_error").remove();
    }
  });

  $("#password_first").blur(function () {
    if ($("#password_first").val().length == 0) {
      if ($('#password_first').hasClass('error') == false) {
        $("#password_first").addClass('error');
        $("#password_first").after("<label id='password_first_error' class='error' for='password_first' style='padding-left:25%;text-align:left'>Vui lòng nhập mật khẩu hiện tại</label>");
      }
    } else {
      $.ajax({
        type: "POST",
        url: "../ajax/checkpass_uv.php",
        data: {
          password: $("#password_first").val()
        },
        success: function (data) {
          if (data != 1) {
            if ($('#password_first').hasClass('error') == false) {
              $('#password_first').addClass('error');
              $('#password_first').after("<label style='text-align:left; padding-left:25%' id='password_first_error' class='error' for='password_first'>Mật khẩu cũ phải trùng nhau</label>");

            } else {
              $('#password_first').removeClass('error');
              $("#password_first_error").remove();
            }
          }
        }
      });
    }
  });

  $("#ten_cty").keyup(function () {
    if ($("#ten_cty").val().length == 0) {
      if ($('#ten_cty').hasClass('error') == false) {
        $("#ten_cty").addClass('error');
        $("#ten_cty").after("<label id='ten_cty_error' class='error' for='ten_cty' style='padding-left:25%;text-align:left'>Vui lòng nhập tên công ty</label>");
      }
    } else {
      $("#ten_cty").removeClass('error');
      $("#ten_cty_error").remove();
    }
  });

  $("#ten_cty").blur(function () {
    if ($("#ten_cty").val().length == 0) {
      if ($('#ten_cty').hasClass('error') == false) {
        $("#ten_cty").addClass('error');
        $("#ten_cty").after("<label id='ten_cty_error' class='error' for='ten_cty' style='padding-left:25%;text-align:left'>Vui lòng nhập tên công ty</label>");
      }
    }
  });

  $("#quy_mo").change(function () {
    if ($("#quy_mo").val() == 0) {
      if ($('#quy_mo').hasClass('error') == false) {
        $('#quy_mo').addClass('error');
        $('#quy_mo').after("<label style='padding-left:25%; text-align: left;margin-bottom:0' id='quy_mo_error' class='error' for='quy_mo'>Vui lòng chọn quy mô</label>");
      }
      returnbutton = false;
    } else {
      $('#quy_mo').removeClass('error');
      $("#quy_mo_error").remove();
    }
  });

  $("#dia_chi_cty").keyup(function () {
    if ($("#dia_chi_cty").val().length == 0) {
      if ($('#dia_chi_cty').hasClass('error') == false) {
        $($("#dia_chi_cty")).addClass('error');
        $($("#dia_chi_cty")).after("<label id='dia_chi_cty_error' class='error' for='dia_chi_cty' style='padding-left:25%;text-align:left'>Vui lòng nhập tên công ty</label>");
      }
    } else {
      $($("#dia_chi_cty")).removeClass('error');
      $("#dia_chi_cty_error").remove();
    }
  });

  $("#dia_chi_cty").blur(function () {
    if ($("#dia_chi_cty").val().length == 0) {
      if ($('#dia_chi_cty').hasClass('error') == false) {
        $($("#dia_chi_cty")).addClass('error');
        $($("#dia_chi_cty")).after("<label id='dia_chi_cty_error' class='error' for='dia_chi_cty' style='padding-left:25%;text-align:left'>Vui lòng nhập tên công ty</label>");
      }
    }
  });

  $("#thanh_pho_cty").change(function () {
    if ($("#thanh_pho_cty").val() == 0) {
      if ($('#thanh_pho_cty').hasClass('error') == false) {
        $($('#thanh_pho_cty')).addClass('error');
        $($('#thanh_pho_cty')).after("<label style='padding-left:25%; text-align: left;margin-bottom:0' id='thanh_pho_cty_error' class='error' for='thanh_pho_cty'>Vui lòng chọn thành phố</label>");
      }
      returnbutton = false;
    } else {
      $($('#thanh_pho_cty')).removeClass('error');
      $("#thanh_pho_cty_error").remove();
    }
  });

  $("#sdt_cty").keyup(function () {
    if ($("#sdt_cty").val().length == 0) {
      if ($('#sdt_cty').hasClass('error') == false) {
        $($("#sdt_cty")).addClass('error');
        $($("#sdt_cty")).after("<label id='sdt_cty_error' class='error' for='sdt_cty' style='padding-left:25%;text-align:left'>Vui lòng nhập tên công ty</label>");
      }
    } else {
      $($("#sdt_cty")).removeClass('error');
      $("#sdt_cty_error").remove();
    }
  });

  $("#sdt_cty").blur(function () {
    if ($("#sdt_cty").val().length == 0) {
      if ($('#sdt_cty').hasClass('error') == false) {
        $($("#sdt_cty")).addClass('error');
        $($("#sdt_cty")).after("<label id='sdt_cty_error' class='error' for='sdt_cty' style='padding-left:25%;text-align:left'>Vui lòng nhập tên công ty</label>");
      }
    }
  });

  $("#name_chutk").keyup(function () {
    if ($("#name_chutk").val().length == 0) {
      if ($('#name_chutk').hasClass('error') == false) {
        $($("#name_chutk")).addClass('error');
        $($("#name_chutk")).after("<label id='name_chutk_error' class='error' for='name_chutk' style='padding-left:25%;text-align:left'>Vui lòng nhập tên liên hệ</label>");
      }
    } else {
      $($("#name_chutk")).removeClass('error');
      $("#name_chutk_error").remove();
    }
  });

  $("#name_chutk").blur(function () {
    if ($("#name_chutk").val().length == 0) {
      if ($('#name_chutk').hasClass('error') == false) {
        $($("#name_chutk")).addClass('error');
        $($("#name_chutk")).after("<label id='name_chutk_error' class='error' for='name_chutk' style='padding-left:25%;text-align:left'>Vui lòng nhập tên liên hệ</label>");
      }
    }
  });

  $("#address_chutk").keyup(function () {
    if ($("#address_chutk").val().length == 0) {
      if ($('#address_chutk').hasClass('error') == false) {
        $($("#address_chutk")).addClass('error');
        $($("#address_chutk")).after("<label id='address_chutk_error' class='error' for='address_chutk' style='padding-left:25%;text-align:left'>Vui lòng nhập địa chỉ liên hệ</label>");
      }
    } else {
      $($("#address_chutk")).removeClass('error');
      $("#address_chutk_error").remove();
    }
  });

  $("#address_chutk").blur(function () {
    if ($("#address_chutk").val().length == 0) {
      if ($('#address_chutk').hasClass('error') == false) {
        $($("#address_chutk")).addClass('error');
        $($("#address_chutk")).after("<label id='address_chutk_error' class='error' for='address_chutk' style='padding-left:25%;text-align:left'>Vui lòng nhập địa chỉ liên hệ</label>");
      }
    }
  });

  $("#phone_chutk").keyup(function () {
    if ($("#phone_chutk").val().length == 0) {
      if ($('#phone_chutk').hasClass('error') == false) {
        $($("#phone_chutk")).addClass('error');
        $($("#phone_chutk")).after("<label id='phone_chutk_error' class='error' for='phone_chutk' style='padding-left:25%;text-align:left'>Vui lòng nhập số điện thoại liên hệ</label>");
      }
    } else {
      $($("#phone_chutk")).removeClass('error');
      $("#phone_chutk_error").remove();
    }
  });

  $("#phone_chutk").blur(function () {
    if ($("#phone_chutk").val().length == 0) {
      if ($('#phone_chutk').hasClass('error') == false) {
        $($("#phone_chutk")).addClass('error');
        $($("#phone_chutk")).after("<label id='phone_chutk_error' class='error' for='phone_chutk' style='padding-left:25%;text-align:left'>Vui lòng nhập số điện thoại liên hệ</label>");
      }
    }
  });

  $("#email_chutk").keyup(function () {
    if ($("#email_chutk").val().length == 0) {
      if ($('#email_chutk').hasClass('error') == false) {
        $($("#email_chutk")).addClass('error');
        $($("#email_chutk")).after("<label id='email_chutk_error' class='error' for='email_chutk' style='padding-left:25%;text-align:left'>Vui lòng nhập số điện thoại liên hệ</label>");
      }
    } else {
      $($("#email_chutk")).removeClass('error');
      $("#email_chutk_error").remove();
    }
  });

  $("#email_chutk").blur(function () {
    if ($("#email_chutk").val().length == 0) {
      if ($('#email_chutk').hasClass('error') == false) {
        $($("#email_chutk")).addClass('error');
        $($("#email_chutk")).after("<label id='email_chutk_error' class='error' for='email_chutk' style='padding-left:25%;text-align:left'>Vui lòng nhập số điện thoại liên hệ</label>");
      }
    }
  });

  $("#btn_edit_muctieu").click(function () {
    $('#form_edit_muctieu').removeClass('hidden');
    $('#muc_tieu_div').addClass('hidden');
    $(".div_edit_mt").addClass('hidden');
  });

  $('#use_mt_submit').on('click', function () {
    var returnbtn = true;
    var muc_tieu = $('#text_muctieu');

    if (muc_tieu.val().length == 0) {
      if (muc_tieu.hasClass('error') == false) {
        muc_tieu.addClass('error');
        muc_tieu.after("<label class='error' id='muc_tieu_error'>Vui lòng nhập mục tiêu</label>");
      }
      returnbtn = false;
      muc_tieu.focus();
    } else {
      muc_tieu.removeClass('error');
      $('#muc_tieu_error').remove();
    }
    if (returnbtn == true) {
      $.ajax({
        type: "POST",
        url: "../ajax/update_muctieu.php",
        dataType: "json",
        data: {
          text_muctieu: muc_tieu.val()
        },
        success: function (data) {
          $("#form_edit_muctieu").addClass('hidden');
          $("div.div_edit_mt").removeClass('hidden');
          $('#muc_tieu_div').removeClass('hidden');
          $("#muctieu_hienthi").html(data.muc_tieu_nghe_nghiep);
        }
      });
    }


    return returnbtn;
  });

  $('#edit_mt_cancel').click(function () {
    $("#form_edit_muctieu").addClass('hidden');
    $("div.div_edit_mt").removeClass('hidden');
    $('#muc_tieu_div').removeClass('hidden');
  });

  $("#btn_edit_kinang").click(function () {
    $('#form_edit_kinang').removeClass('hidden');
    $('#ki_nang_div').addClass('hidden');
    $(".div_edit_kinang").addClass('hidden');
  });

  $('#use_kn_submit').on('click', function () {
    var returnbtn = true;
    var text_kinang = $('#text_kinang');

    if (text_kinang.val().length == 0) {
      if (text_kinang.hasClass('error') == false) {
        text_kinang.addClass('error');
        text_kinang.after("<label class='error' id='text_kinang_error'>Vui lòng nhập kĩ năng</label>");
      }
      returnbtn = false;
      text_kinang.focus();
    } else {
      text_kinang.removeClass('error');
      $('#text_kinang_error').remove();
    }
    if (returnbtn == true) {
      $.ajax({
        type: "POST",
        url: "../ajax/update_kinang.php",
        dataType: "json",
        data: {
          text_kinang: text_kinang.val()
        },
        success: function (data) {
          $("#form_edit_kinang").addClass('hidden');
          $("div.div_edit_kinang").removeClass('hidden');
          $('#ki_nang_div').removeClass('hidden');
          $("#kinang_hienthi").html(data.ki_nang_ban_than);
        },
        error: function (data) {
          console.log(data);
        }
      });
    }


    return returnbtn;
  });

  $('#edit_kn_cancel').click(function () {
    $("#form_edit_kinang").addClass('hidden');
    $("div.div_edit_kinang").removeClass('hidden');
    $('#ki_nang_div').removeClass('hidden');
  });

  $('.them_moi_bc').on('click', function () {
    $(".item_bangcap").addClass('hidden');
    $('#form_themmoi_bc').removeClass('hidden');
    $(this).addClass('hidden');
  });

  $('.them_moi_kn').on('click', function () {
    $('.item_kinhnghiem').addClass('hidden');
    $(this).addClass('hidden');
    $('#form_themmoi_kn').removeClass('hidden');
  });

  function checkValiBangCap() {
    return true;
  }

  $('.bc_edit').on('click', function () {
    var id = $(this).attr('data-id');
    $('.item_bangcap').addClass('hidden');
    $('.form_edit_bc').removeClass('hidden');
    $('.them_moi_bc').addClass('hidden');

    $.ajax({
      type: "POST",
      url: "../ajax/get_sua_bc.php",
      data: {
        id: id
      },
      dataType: "json",
      success: function (data) {
        $('#edit_ten_bangcap').val(data.bang_cap);
        $('#edit_truong_hoc').val(data.truong_hoc);
        $('#edit_bc_tgbatdau').val(data.tg_batdau);
        $('#edit_bc_tgketthuc').val(data.tg_ketthuc);
        $('#edit_bc_chuyennganh').val(data.chuyen_nganh);
        $('#edit_bc_xeploai').val(data.xep_loai);
        $('.bc_txt_bosung ').val(data.thongtin_bosung);
        var action = $('.form_edit_bc form').attr('action');
        action = "../code_bangcap/sua.php?id_bc=" + id;
        $('.form_edit_bc form').attr('action', action)
      },
      error: function (data) {
        alert('ERROR IN AJAX');
        console.log(data);
      }
    });
  });

  $('.kn_edit').on('click', function () {
    var id = $(this).attr('data-id');
    $('.item_kinhnghiem').addClass('hidden');
    $('.form_edit_kn').removeClass('hidden');
    $('.them_moi_kn').addClass('hidden');


    $.ajax({
      type: "POST",
      url: "../ajax/get_sua_kn.php",
      data: {
        id: id
      },
      dataType: "json",
      success: function (data) {
        $('#chuc_danh').val(data.use_chucdanh);
        $('#ten_cty').val(data.use_cty_lamviec);
        $('#edit_kn_tgbatdau').val(data.tg_batdau);
        $('#edit_kn_tgketthuc').val(data.tg_ketthuc);
        $('#edit_kn_ttbs').val(data.thongtin_bosung);
        var action = $('.form_edit_kn form').attr('action');
        action = "../code_kinhnghiem/sua.php?id_kn=" + id;
        $('.form_edit_kn form').attr('action', action);
      },
      error: function (data) {
        alert('ERROR IN AJAX');
        console.log(data);
      }
    });
  });

  $('.them_moi_nn').on('click', function () {
    $('#form_themmoi_nn').removeClass('hidden');
    $('.ngoaingu_show').addClass('hidden');
    $('.ngoaingu_tieude').addClass('hidden');
    $(this).addClass('hidden');
  });

  $('.nn_edit').on('click', function () {
    var id = $(this).attr('data-id');

    $('.form_edit_nn').removeClass('hidden');
    $('.ngoaingu_tieude').addClass('hidden');
    $('.item_ngoaingu').addClass('hidden');
    $('.them_moi_nn').addClass('hidden');

    $.ajax({
      type: "POST",
      url: "../ajax/get_sua_nn.php",
      data: {
        id: id
      },
      dataType: "json",
      success: function (data) {
        $('#id_ngonngu').val(data.id_ngonngu);
        $('#chung_chi').val(data.chung_chi);
        $('#ket_qua').val(data.ket_qua);

        var action = $('.form_edit_nn form').attr('action');
        action = "../code_ngoaingu/sua.php?nn_id=" + id;
        $('.form_edit_nn form').attr('action', action);
      },
      error: function (data) {
        alert('ERROR IN AJAX');
        console.log(data);
      }
    });
  });

  $('.div_edit_thamchieu').on('click', function () {
    $('.thamchieu_show').addClass('hidden');
    $('.thamchieu_edit').removeClass('hidden');
    $(this).addClass('hidden');
  });

  $('#save_thamchieu').click(function () {
    var ho_ten = $('#thamchieu_hoten').val();
    var sdt = $('#thamchieu_sdt').val();
    var chuc_vu = $('#thamchieu_chucvu').val();
    var tinh_thanh = $('#thamchieu_tinhthanh').val();

    $.ajax({
      type: "POST",
      url: "../ajax/update_thamchieu.php",
      dataType: "json",
      data: {
        ho_ten: ho_ten,
        sdt: sdt,
        chuc_vu: chuc_vu,
        tinh_thanh: tinh_thanh
      },
      success: function (data) {
        $('.thamchieu_edit').addClass('hidden');
        $('.thamchieu_show').removeClass('hidden');
        $('.div_edit_thamchieu').removeClass('hidden');
        $('#hoten_show').html(data.ho_ten);
        $('#sdt_show').html(data.sdt);
        $('#chucvu_show').html(data.chuc_vu);
        $('#tinhthanh_show').html(data.tinh_thanh);

        alert(data.msg);
      },
      error: function (data) {
        console.log(data);
      }
    });
  });

  $('#cancel_thamchieu').click(function () {
    $('.thamchieu_edit').addClass('hidden');
    $('.thamchieu_show').removeClass('hidden');
    $('.div_edit_thamchieu').removeClass('hidden');
  });

  $('#cancel_bangcap').click(function () {
    $('.form_edit_bc').addClass('hidden');
    $('.item_bangcap').removeClass('hidden');
    $('.them_moi_bc').removeClass('hidden');
    $('.form_edit_bc form').attr('action', "")
  });

  $('#cancel_themmoi_nn').click(function () {
    $('#form_themmoi_nn').addClass('hidden');
    $('.them_moi_nn').removeClass('hidden');
    $('.ngoaingu_tieude').removeClass('hidden');
    $('.ngoaingu_show').removeClass('hidden');
  });

  $('#cancel_themmoi_bangcap').click(function () {
    $('#form_themmoi_bc').addClass('hidden');
    $('.them_moi_bc').removeClass('hidden');
    $('.item_bangcap').removeClass('hidden');
    $('.form_edit_bc').addClass('hidden');
  });

  $('.cancel_nn').click(function () {
    $('.form_edit_nn').addClass('hidden');
    $('.ngoaingu_tieude').removeClass('hidden');
    $('.item_ngoaingu').removeClass('hidden');
    $('.them_moi_nn').removeClass('hidden');
  });

  // $('.change_avt').click(function() {
  //   $('#change_avt_inp').click();
  // });

  // $('#change_avt_inp').change(function(e){
  //   var reader = new FileReader();
  //   reader.onload = function(e){
  //     alert('123');
  //         //Thay đổi đường dẫn ảnh
  //         $('#avt').attr('src',e.target.result);

  //     reader.readAsDataURL(input.files[0]);
  //   };
  //     // console.log(e.target.files[0].result);
  //     // var img = $('.avatar img');
  //     // console.log(img);
  //     // img.attr('src',e.target.files[0].result);
  // });

  $('.cancel_bangcap').click(function () {
    $('.form_edit_kn').addClass('hidden');
    $('.item_kinhnghiem ').removeClass('hidden');
    $('.them_moi_kn ').removeClass('hidden');
  });

  $('#add_kn_cancel').click(function () {
    $('#form_themmoi_kn').addClass('hidden');
    $('.item_kinhnghiem').removeClass('hidden');
  });

  $('#ho_ten').keyup(function () {
    if ($('#ho_ten').val().length == 0) {
      if ($('#ho_ten').hasClass('error') == false) {
        $('#ho_ten').addClass('error');
        $('#ho_ten').after("<label style='padding-left:25%' id='ho_ten_error' class='error'>Vui lòng nhập họ tên</label>");
      }
    } else {
      $('#ho_ten').removeClass('error');
      $('#ho_ten_error').remove();
    }
  });
  $('#ho_ten').blur(function () {
    if ($('#ho_ten').val().length == 0) {
      if ($('#ho_ten').hasClass('error') == false) {
        $('#ho_ten').addClass('error');
        $('#ho_ten').after("<label style='padding-left:25%' id='ho_ten_error' class='error'>Vui lòng nhập họ tên</label>");
      }
    } else {
      $('#ho_ten').removeClass('error');
      $('#ho_ten_error').remove();
    }
  });

  $('#sdt_user').keyup(function () {
    if ($('#sdt_user').val().length == 0) {
      if ($('#sdt_user').hasClass('error') == false) {
        $('#sdt_user').addClass('error');
        $('#sdt_user').after("<label style='padding-left:25%' id='sdt_user_error' class='error'>Vui lòng nhập họ tên</label>");
      }
    } else {
      $('#sdt_user').removeClass('error');
      $('#sdt_user_error').remove();
    }
  });
  $('#sdt_user').blur(function () {
    if ($('#sdt_user').val().length == 0) {
      if ($('#sdt_user').hasClass('error') == false) {
        $('#sdt_user').addClass('error');
        $('#sdt_user').after("<label style='padding-left:25%' id='sdt_user_error' class='error'>Vui lòng nhập SĐT</label>");
      }
    } else {
      $('#sdt_user').removeClass('error');
      $('#sdt_user_error').remove();
    }
  });

  $('#ngay_sinh').blur(function () {
    if ($('#ngay_sinh').val() == '') {
      if ($('#ngay_sinh').hasClass('error') == false) {
        $('#ngay_sinh').addClass('error');
        $('#ngay_sinh').after("<label id='ngay_sinh_error' class='error' style='padding-left:25%'>Vui lòng điền ngày sinh</label>");
      }
    } else {
      $('#ngay_sinh').removeClass('error');
      $('#ngay_sinh_error').remove();
    }
  });

  $('#user_gender').change(function () {
    if ($('#user_gender').val() == 0) {
      if ($('#user_gender').hasClass('error') == false) {
        $('#user_gender').addClass('error');
        $('#user_gender').after("<label class='error' id='user_gender_error' style='padding-left:25%'>Vui lòng chọn giới tính</label>");
      }
    } else {
      $('#user_gender_error').remove();
      $('#user_gender').removeClass('error');
    }
  });

  $('#tinh_trang_hon_nhan').change(function () {
    if ($('#tinh_trang_hon_nhan').val() == 0) {
      if ($('#tinh_trang_hon_nhan').hasClass('error') == false) {
        $('#tinh_trang_hon_nhan').addClass('error');
        $('#tinh_trang_hon_nhan').after("<label class='error' id='tinh_trang_hon_nhan_error' style='padding-left:25%'>Vui lòng chọn tình trạng hôn nhân</label>");
      }
    } else {
      $('#tinh_trang_hon_nhan_error').remove();
      $('#tinh_trang_hon_nhan').removeClass('error');
    }
  });

  $('#use_thanh_pho').change(function () {
    if ($('#use_thanh_pho').val() == 0) {
      if ($('#use_thanh_pho').hasClass('error') == false) {
        $('#use_thanh_pho').addClass('error');
        $('#use_thanh_pho').after("<label class='error' id='use_thanh_pho_error' style='padding-left:25%'>Vui lòng chọn thành phố</label>");
      }
    } else {
      $('#use_thanh_pho_error').remove();
      $('#use_thanh_pho').removeClass('error');
    }
  });

  $('#dia_chi_hien_tai').keyup(function () {
    if ($('#dia_chi_hien_tai').val().length == 0) {
      if ($('#dia_chi_hien_tai').hasClass('error') == false) {
        $('#dia_chi_hien_tai').addClass('error');
        $('#dia_chi_hien_tai').after("<label style='padding-left:25%' id='dia_chi_hien_tai_error' class='error'>Vui lòng nhập họ tên</label>");
      }
    } else {
      $('#dia_chi_hien_tai').removeClass('error');
      $('#dia_chi_hien_tai_error').remove();
    }
  });
  $('#dia_chi_hien_tai').blur(function () {
    if ($('#dia_chi_hien_tai').val().length == 0) {
      if ($('#dia_chi_hien_tai').hasClass('error') == false) {
        $('#dia_chi_hien_tai').addClass('error');
        $('#dia_chi_hien_tai').after("<label style='padding-left:25%' id='dia_chi_hien_tai_error' class='error'>Vui lòng nhập SĐT</label>");
      }
    } else {
      $('#dia_chi_hien_tai').removeClass('error');
      $('#dia_chi_hien_tai_error').remove();
    }
  });

  $('#user_tencv').keyup(function () {
    if ($('#user_tencv').val().length == 0) {
      if ($('#user_tencv').hasClass('error') == false) {
        $('#user_tencv').addClass('error');
        $('#user_tencv').after("<label style='padding-left:25%' id='user_tencv_error' class='error'>Vui lòng tên công việc</label>");
      }
    } else {
      $('#user_tencv').removeClass('error');
      $('#user_tencv_error').remove();
    }
  });
  $('#user_tencv').blur(function () {
    if ($('#user_tencv').val().length == 0) {
      if ($('#user_tencv').hasClass('error') == false) {
        $('#user_tencv').addClass('error');
        $('#user_tencv').after("<label style='padding-left:25%' id='user_tencv_error' class='error'>Vui lòng tên công việc</label>");
      }
    } else {
      $('#user_tencv').removeClass('error');
      $('#user_tencv_error').remove();
    }
  });

  $('#user_capbac').change(function () {
    if ($('#user_capbac').val() == 0) {
      if ($('#user_capbac').hasClass('error') == false) {
        $('#user_capbac').addClass('error');
        $('#user_capbac').after("<label style='padding-left:25%' class='error' id='user_capbac_error'>Vui lòng chọn cấp bậc</label>");
      }
    } else {
      $('#user_capbac_error').remove();
      $('#user_capbac').removeClass('error');
    }
  });

  $('#dia_diem_lam_viec').change(function () {
    if ($('#dia_diem_lam_viec').val() == null) {
      if ($('div.div_dd_lv .select2-container').hasClass('error') == false) {
        $('div.div_dd_lv .select2-container').addClass('error');
        $('div.div_dd_lv .select2-container').after("<label style='padding-left:25%' class='error' id='dia_diem_lam_viec_error'>Vui lòng chọn nơi làm việc</label>");
      }
    } else {
      $('#dia_diem_lam_viec_error').remove();
      $('div.div_dd_lv .select2-container').removeClass('error');
    }
  });

  $('#sl_nganh_nghe').change(function () {
    if ($('#sl_nganh_nghe').val() == null) {
      if ($('div.div_nganhnghe_mm .select2-container').hasClass('error') == false) {
        $('div.div_nganhnghe_mm .select2-container').addClass('error');
        $('div.div_nganhnghe_mm .select2-container').after("<label style='padding-left:25%' class='error' id='sl_nganh_nghe_error'>Vui lòng chọn ngành nghề</label>");
      }
    } else {
      $('#sl_nganh_nghe_error').remove();
      $('div.div_nganhnghe_mm .select2-container').removeClass('error');
    }
  });

  $('#use_muc_luong').change(function () {
    if ($('#use_muc_luong').val() == 0) {
      if ($('#use_muc_luong').hasClass('error') == false) {
        $('#use_muc_luong').addClass('error');
        $('#use_muc_luong').after("<label style='padding-left:25%' class='error' id='use_muc_luong_error'>Vui lòng chọn mức lương</label>");
      }
    } else {
      $('#use_muc_luong_error').remove();
      $('#use_muc_luong').removeClass('error');
    }
  });

  $('#text_muctieu').keyup(function () {
    if ($('#text_muctieu').val().length == 0) {
      if ($('#text_muctieu').hasClass('error') == false) {
        $('#text_muctieu').addClass('error');
        $('#text_muctieu').after("<label id='text_muctieu_error' class='error'>Vui lòng nhập mục tiêu</label>");
      }
    } else {
      $('#text_muctieu_error').remove();
      $('#text_muctieu').removeClass();
    }
  });

  $('#text_muctieu').blur(function () {
    if ($('#text_muctieu').val().length == 0) {
      if ($('#text_muctieu').hasClass('error') == false) {
        $('#text_muctieu').addClass('error');
        $('#text_muctieu').after("<label id='text_muctieu_error' class='error'>Vui lòng nhập mục tiêu</label>");
      }
    } else {
      $('#text_muctieu_error').remove();
      $('#text_muctieu').removeClass('error');
    }
  });

  $('#text_kinang').keyup(function () {
    if ($('#text_kinang').val().length == 0) {
      if ($('#text_kinang').hasClass('error') == false) {
        $('#text_kinang').addClass('error');
        $('#text_kinang').after("<label id='text_kinang_error' class='error'>Vui lòng nhập kĩ năng bản thân</label>");
      }
    } else {
      $('#text_kinang_error').remove();
      $('#text_kinang').removeClass('error');
    }
  });

  $('#text_kinang').blur(function () {
    if ($('#text_kinang').val().length == 0) {
      if ($('#text_kinang').hasClass('error') == false) {
        $('#text_kinang').addClass('error');
        $('#text_kinang').after("<label id='text_kinang_error' class='error'>Vui lòng nhập kĩ năng bản thân</label>");
      }
    } else {
      $('#text_kinang_error').remove();
      $('#text_kinang').removeClass('error');
    }
  });

  $('#edit_ten_bangcap').keyup(function () {
    if ($('#edit_ten_bangcap').val().length == 0) {
      if ($('#edit_ten_bangcap').hasClass('error') == false) {
        $('#edit_ten_bangcap').addClass('error');
        $('#edit_ten_bangcap').after("<label id='edit_ten_bangcap_error' class='error' style='padding-left:25%'>Vui lòng nhập chứng chỉ/bằng cấp</label>");
      }
    } else {
      $('#edit_ten_bangcap_error').remove();
      $('#edit_ten_bangcap').removeClass('error');
    }
  });

  $('#edit_ten_bangcap').blur(function () {
    if ($('#edit_ten_bangcap').val().length == 0) {
      if ($('#edit_ten_bangcap').hasClass('error') == false) {
        $('#edit_ten_bangcap').addClass('error');
        $('#edit_ten_bangcap').after("<label id='edit_ten_bangcap_error' class='error' style='padding-left:25%'>Vui lòng nhập bằng cấp/chứng chỉ</label>");
      }
    } else {
      $('#edit_ten_bangcap_error').remove();
      $('#edit_ten_bangcap').removeClass('error');
    }
  });

  $('#edit_truong_hoc').keyup(function () {
    if ($('#edit_truong_hoc').val().length == 0) {
      if ($('#edit_truong_hoc').hasClass('error') == false) {
        $('#edit_truong_hoc').addClass('error');
        $('#edit_truong_hoc').after("<label id='edit_truong_hoc_error' class='error' style='padding-left:25%'>Vui lòng nhập tên trường học</label>");
      }
    } else {
      $('#edit_truong_hoc_error').remove();
      $('#edit_truong_hoc').removeClass('error');
    }
  });

  $('#edit_truong_hoc').blur(function () {
    if ($('#edit_truong_hoc').val().length == 0) {
      if ($('#edit_truong_hoc').hasClass('error') == false) {
        $('#edit_truong_hoc').addClass('error');
        $('#edit_truong_hoc').after("<label id='edit_truong_hoc_error' class='error' style='padding-left:25%'>Vui lòng tên trường học</label>");
      }
    } else {
      $('#edit_truong_hoc_error').remove();
      $('#edit_truong_hoc').removeClass('error');
    }
  });

  $('#ten_bangcap').keyup(function () {
    if ($('#ten_bangcap').val().length == 0) {
      if ($('#ten_bangcap').hasClass('error') == false) {
        $('#ten_bangcap').addClass('error');
        $('#ten_bangcap').after("<label id='ten_bangcap_error' class='error' style='padding-left:25%'>Vui lòng nhập bằng cấp/chứng chỉ</label>");
      }
    } else {
      $('#ten_bangcap_error').remove();
      $('#ten_bangcap').removeClass('error');
    }
  });

  $('#ten_bangcap').blur(function () {
    if ($('#ten_bangcap').val().length == 0) {
      if ($('#ten_bangcap').hasClass('error') == false) {
        $('#ten_bangcap').addClass('error');
        $('#ten_bangcap').after("<label id='ten_bangcap_error' class='error' style='padding-left:25%'>Vui lòng nhập bằng cấp/chứng chỉ</label>");
      }
    } else {
      $('#bang_cap_error').remove();
      $('#ten_bangcap').removeClass('error');
    }
  });

  $('#truong_hoc').keyup(function () {
    if ($('#truong_hoc').val().length == 0) {
      if ($('#truong_hoc').hasClass('error') == false) {
        $('#truong_hoc').addClass('error');
        $('#truong_hoc').after("<label id='truong_hoc_error' class='error' style='padding-left:25%'>Vui lòng nhập tên trường học</label>");
      }
    } else {
      $('#truong_hoc_error').remove();
      $('#truong_hoc').removeClass('error');
    }
  });

  $('#truong_hoc').blur(function () {
    if ($('#truong_hoc').val().length == 0) {
      if ($('#truong_hoc').hasClass('error') == false) {
        $('#truong_hoc').addClass('error');
        $('#truong_hoc').after("<label id='truong_hoc_error' class='error' style='padding-left:25%'>Vui lòng nhập tên trường học</label>");
      }
    } else {
      $('#truong_hoc_error').remove();
      $('#truong_hoc').removeClass('error');
    }
  });

  $('.tg_batdau').blur(function () {
    if ($(this).val() == '') {
      if ($(this).hasClass('error') == false) {
        $(this).addClass('error');
      }
    } else {
      $(this).removeClass('error');
    }
  });

  $('.tg_ketthuc').blur(function () {
    if ($(this).val() == '') {
      if ($(this).hasClass('error') == false) {
        $(this).addClass('error');
      }
    } else {
      $(this).removeClass('error');
    }
  });

  $('#bc_chuyennganh').blur(function () {
    if ($('#bc_chuyennganh').val().length == 0) {
      if ($('#bc_chuyennganh').hasClass('error') == false) {
        $('#bc_chuyennganh').addClass('error');
        // $('#bc_chuyennganh').placeholder("<label style='padding-left:25%' id='bc_chuyennganh_error' class='error'>Vui lòng nhập chuyên ngành</label>");
      }
    } else {
      $('#bc_chuyennganh').removeClass('error');
    }
  });

  $('#bc_chuyennganh').keyup(function () {
    if ($('#bc_chuyennganh').val().length == 0) {
      if ($('#bc_chuyennganh').hasClass('error') == false) {
        $('#bc_chuyennganh').addClass('error');
        // $('#bc_chuyennganh').placeholder("<label style='padding-left:25%' id='bc_chuyennganh_error' class='error'>Vui lòng nhập chuyên ngành</label>");
      }
    } else {
      $('#bc_chuyennganh').removeClass('error');
    }
  });

  $('#bc_xeploai').change(function () {
    if ($('#bc_xeploai').val() == 0) {
      if ($('#bc_xeploai').hasClass('error') == false) {
        $('#bc_xeploai').addClass('error');
      }
    } else {
      $('#bc_xeploai').removeClass('error');
    }
  });

  $('#edit_bc_chuyennganh').keyup(function () {
    if ($('#edit_bc_chuyennganh').val().length == 0) {
      if ($('#edit_bc_chuyennganh').hasClass('error') == false) {
        $('#edit_bc_chuyennganh').addClass('error');
      }
    } else {
      $('#edit_bc_chuyennganh').removeClass('error');
    }
  });

  $('#edit_bc_xeploai').change(function () {
    if ($('#edit_bc_xeploai').val() == 0) {
      if ($('#edit_bc_xeploai').hasClass('error') == false) {
        $('#edit_bc_xeploai').addClass('error');
      }
    } else {
      $('#edit_bc_xeploai').removeClass('error');
    }
  });

  $('#kn_chuc_danh').keyup(function () {
    if ($(this).val().length == 0) {
      if ($(this).hasClass('error') == false) {
        $(this).addClass('error');
        $(this).after("<label style='padding-left:25%' id='kn_chuc_danh_error' class='error'>Vui lòng nhập chức danh/vị trí</label>");
      }
    } else {
      $(this).removeClass('error');
      $('#kn_chuc_danh_error').remove();
    }
  });
  $('#kn_chuc_danh').blur(function () {
    if ($(this).val().length == 0) {
      if ($(this).hasClass('error') == false) {
        $(this).addClass('error');
        $(this).after("<label style='padding-left:25%' id='kn_chuc_danh_error' class='error'>Vui lòng nhập chức danh/vị trí</label>");
      }
    } else {
      $(this).removeClass('error');
      $('#kn_chuc_danh_error').remove();
    }
  });

  $('#kn_ten_cty').keyup(function () {
    if ($(this).val().length == 0) {
      if ($(this).hasClass('error') == false) {
        $(this).addClass('error');
        $(this).after("<label style='padding-left:25%' id='kn_ten_cty_error' class='error'>Vui lòng tên công ty</label>");
      }
    } else {
      $(this).removeClass('error');
      $('#kn_ten_cty_error').remove();
    }
  });
  $('#kn_ten_cty').blur(function () {
    if ($(this).val().length == 0) {
      if ($(this).hasClass('error') == false) {
        $(this).addClass('error');
        $(this).after("<label style='padding-left:25%' id='kn_ten_cty_error' class='error'>Vui lòng nhập tên công ty</label>");
      }
    } else {
      $(this).removeClass('error');
      $('#kn_ten_cty_error').remove();
    }
  });
  $('#chuc_danh').keyup(function () {
    if ($(this).val().length == 0) {
      if ($(this).hasClass('error') == false) {
        $(this).addClass('error');
        $(this).after("<label style='padding-left:25%' id='chuc_danh_error' class='error'>Vui lòng nhập chức danh</label>");
      }
    } else {
      $(this).removeClass('error');
      $('#chuc_danh_error').remove();
    }
  });
  $('#chuc_danh').blur(function () {
    if ($(this).val().length == 0) {
      if ($(this).hasClass('error') == false) {
        $(this).addClass('error');
        $(this).after("<label style='padding-left:25%' id='chuc_danh_error' class='error'>Vui lòng nhập chức danh</label>");
      }
    } else {
      $(this).removeClass('error');
      $('#chuc_danh_error').remove();
    }
  });
  $('#ten_cty').keyup(function () {
    if ($(this).val().length == 0) {
      if ($(this).hasClass('error') == false) {
        $(this).addClass('error');
        $(this).after("<label style='padding-left:25%' id='ten_cty_error' class='error'>Vui lòng nhập tên công ty</label>");
      }
    } else {
      $(this).removeClass('error');
      $('#ten_cty_error').remove();
    }
  });

  $('#id_ngonngu').change(function () {
    if ($(this).val() == 0) {
      if ($(this).hasClass('error') == false) {
        $(this).addClass('error');
        $(this).after("<label style='padding-left:25%' class='error' id='id_ngonngu_error'>Vui lòng chọn ngôn ngữ</label>");
      }
    } else {
      $(this).removeClass('error');
      $('#id_ngonngu_error').remove();
    }
  });

  $('#chung_chi').keyup(function () {
    if ($(this).val().length == 0) {
      if ($(this).hasClass('error') == false) {
        $(this).addClass('error');
        $(this).after("<label style='padding-left:25%' id='chung_chi_error' class='error'>Vui lòng nhập chứng chỉ</label>");
      }
    } else {
      $(this).removeClass('error');
      $('#chung_chi_error').remove();
    }
  });

  $('#ket_qua').keyup(function () {
    if ($(this).val().length == 0) {
      if ($(this).hasClass('error') == false) {
        $(this).addClass('error');
        $(this).after("<label style='padding-left:25%' id='ket_qua_error' class='error'>Vui lòng nhập kết quả đạt được</label>");
      }
    } else {
      $(this).removeClass('error');
      $('#ket_qua_error').remove();
    }
  });

  $('#thamchieu_hoten').keyup(function () {
    if ($('#thamchieu_hoten').val().length == 0) {
      if ($('#thamchieu_hoten').hasClass('error') == false) {
        $(this).addClass('error');
        $(this).after("<label style='padding-left:25%;width:100%!important' class='error'  id='thamchieu_hoten_error'>Vui lòng nhập thông tin họ tên</label>");
      }
    } else {
      $(this).removeClass('error');
      $('#thamchieu_hoten_error').remove();
    }
  });

  $('#thamchieu_sdt').keyup(function () {
    if ($('#thamchieu_sdt').val().length == 0) {
      if ($('#thamchieu_sdt').hasClass('error') == false) {
        $(this).addClass('error');
        $(this).after("<label style='padding-left:25%;width:100%!important' class='error'  id='thamchieu_sdt_error'>Vui lòng nhập thông tin SĐT</label>");
      }
    } else {
      $(this).removeClass('error');
      $('#thamchieu_sdt_error').remove();
    }
  });

  $('#thamchieu_chucvu').keyup(function () {
    if ($(this).val().length == 0) {
      if ($(this).hasClass('error') == false) {
        $(this).addClass('error');
        $(this).after("<label style='padding-left:25%;width:100%!important' class='error' id='thamchieu_chucvu_error'>Vui lòng nhập thông tin chức vụ</label>");
      }
    } else {
      $(this).removeClass('error');
      $('#thamchieu_chucvu_error').remove();
    }
  });

  $('#thamchieu_tinhthanh').keyup(function () {
    if ($(this).val().length == 0) {
      if ($(this).hasClass('error') == false) {
        $(this).addClass('error');
        $(this).after("<label style='padding-left:25%;width:100%!important' class='error'  id='thamchieu_tinhthanh_error'>Vui lòng nhập thông tin tỉnh thành</label>");
      }
    } else {
      $(this).removeClass('error');
      $('#thamchieu_tinhthanh_error').remove();
    }
  });

  $('#thamchieu_hoten').blur(function () {
    if ($('#thamchieu_hoten').val().length == 0) {
      if ($('#thamchieu_hoten').hasClass('error') == false) {
        $(this).addClass('error');
        $(this).after("<label style='padding-left:25%;width:100%!important' class='error'  id='thamchieu_hoten_error'>Vui lòng nhập thông tin họ tên</label>");
      }
    } else {
      $(this).removeClass('error');
      $('#thamchieu_hoten_error').remove();
    }
  });

  $('#thamchieu_sdt').blur(function () {
    if ($('#thamchieu_sdt').val().length == 0) {
      if ($('#thamchieu_sdt').hasClass('error') == false) {
        $(this).addClass('error');
        $(this).after("<label style='padding-left:25%;width:100%!important' class='error'  id='thamchieu_sdt_error'>Vui lòng nhập thông tin SĐT</label>");
      }
    } else {
      $(this).removeClass('error');
      $('#thamchieu_sdt_error').remove();
    }
  });

  $('#thamchieu_chucvu').blur(function () {
    if ($(this).val().length == 0) {
      if ($(this).hasClass('error') == false) {
        $(this).addClass('error');
        $(this).after("<label style='padding-left:25%;width:100%!important' class='error' id='thamchieu_chucvu_error'>Vui lòng nhập thông tin chức vụ</label>");
      }
    } else {
      $(this).removeClass('error');
      $('#thamchieu_chucvu_error').remove();
    }
  });

  $('#thamchieu_tinhthanh').blur(function () {
    if ($(this).val().length == 0) {
      if ($(this).hasClass('error') == false) {
        $(this).addClass('error');
        $(this).after("<label style='padding-left:25%;width:100%!important' class='error'  id='thamchieu_tinhthanh_error'>Vui lòng nhập thông tin tỉnh thành</label>");
      }
    } else {
      $(this).removeClass('error');
      $('#thamchieu_tinhthanh_error').remove();
    }
  });
  $('.allow_search label input[type=checkbox]').change(function () {
    var length = $('.allow_search label input[type=checkbox]:checked').length;
    $.ajax({
      type: "POST",
      url: "../ajax/use_show.php",
      data: {
        val: length
      },
      success: function (data) {

      }
    });
  });

  $('.main .left .top #change_avt img').on('click', function () {
    $('#avt_file').click();
  });

  $('#avt_file').change(function () {
    $('#change_avt #submit').click();
  });
  $('.form_candi .clear').click(function () {
    var id = $(this).attr('data-id');
    var type = $(this).attr('data-type');
    if (confirm("Bạn có chắc chắn muốn xóa bản ghi này ???")) {
      switch (type) {
        case 'bccc':
          url = "../ajax/delete_bc.php";
          break;
        case 'knlv':
          url = " ../ajax/delete_kn.php";
          break;
        case 'nn':
          url = "../ajax/delete_ngoaingu.php";
          break;
      }
      $.ajax({
        type: "POST",
        url: url,
        data: {
          id: id
        },
        success: function (data) {
          if (data == 1) {
            location.reload();
          }
        }
      });
    }
  });

  $('.main .left #refresh').click(function () {
    $.ajax({
      type: "POST",
      url: "../ajax/use_refresh.php",
      data: {

      },
      success: function (data) {
        if (data == 1) {
          alert('Bạn đã làm mới hồ sơ thành công !!!');
        } else {
          window.location.href = "/";
        }
      }
    });
  });
});

//-----------------------------------------------------
function ValiBangcap() {
  var returnsubmit = true;
  var bang_cap = $('input#ten_bangcap');
  var truong_hoc = $('input#truong_hoc');
  var tg_batdau = $('input#bc_tgbatdau');
  var tg_ketthuc = $('input#bc_tgketthuc');
  var chuyen_nganh = $('input#bc_chuyennganh');
  var xep_loai = $('select#bc_xeploai');


  if (bang_cap.val().length == 0) {
    if (bang_cap.hasClass('error') == false) {
      bang_cap.addClass('error');
      bang_cap.after("<label style='padding-left:25%' id='bang_cap_error' class='error'>Vui lòng nhập bằng cấp/chứng chỉ</label>");
    }
    returnsubmit = false;
    bang_cap.focus();
  } else {
    bang_cap.removeClass('error');
    $('#bang_cap_error').remove();
  }

  if (truong_hoc.val().length == 0) {
    if (truong_hoc.hasClass('error') == false) {
      truong_hoc.addClass('error');
      truong_hoc.after("<label style='padding-left:25%' id='truong_hoc_error' class='error'>Vui lòng nhập tên trường bạn học</label>");
    }
    returnsubmit = false;
    truong_hoc.focus();
  } else {
    truong_hoc.removeClass('error');
    $('#truong_hoc_error').remove();
  }

  if (tg_batdau.val() == '' || tg_batdau.val() == null) {
    if (tg_batdau.hasClass('error') == false) {
      tg_batdau.addClass('error');
    }
    tg_batdau.focus();
    returnsubmit = false;
  } else {
    tg_batdau.removeClass('error');
  }

  if (tg_ketthuc.val() == '') {
    if (tg_ketthuc.hasClass('error') == false) {
      tg_ketthuc.addClass('error');
    }
    tg_ketthuc.focus();
    returnsubmit = false;
  } else {
    tg_ketthuc.removeClass('error');
  }

  if (chuyen_nganh.val() == '') {
    if (chuyen_nganh.hasClass('error') == false) {
      chuyen_nganh.addClass('error');
    }
    chuyen_nganh.focus();
    returnsubmit = false;
  } else {
    chuyen_nganh.removeClass('error');
  }

  if (xep_loai.val() == 0) {
    if (xep_loai.hasClass('error') == false) {
      xep_loai.addClass('error');
    }
    xep_loai.focus();
    returnsubmit = false;
  } else {
    xep_loai.removeClass('error');
  }

  return returnsubmit;
}

function ValiBangcap_edit() {
  var returnsubmit = true;
  var bang_cap = $('input#edit_ten_bangcap');
  var truong_hoc = $('input#edit_truong_hoc');
  var tg_batdau = $('input#edit_bc_tgbatdau');
  var tg_ketthuc = $('input#edit_bc_tgketthuc');
  var chuyen_nganh = $('input#edit_bc_chuyennganh');
  var xep_loai = $('select#edit_bc_xeploai');


  if (bang_cap.val().length == 0) {
    if (bang_cap.hasClass('error') == false) {
      bang_cap.addClass('error');
      bang_cap.after("<label style='padding-left:25%' id='bang_cap_error' class='error'>Vui lòng nhập bằng cấp/chứng chỉ</label>");
    }
    returnsubmit = false;
    bang_cap.focus();
  } else {
    bang_cap.removeClass('error');
    $('#bang_cap_error').remove();
  }

  if (truong_hoc.val().length == 0) {
    if (truong_hoc.hasClass('error') == false) {
      truong_hoc.addClass('error');
      truong_hoc.after("<label style='padding-left:25%' id='truong_hoc_error' class='error'>Vui lòng nhập tên trường bạn học</label>");
    }
    returnsubmit = false;
    truong_hoc.focus();
  } else {
    truong_hoc.removeClass('error');
    $('#truong_hoc_error').remove();
  }

  if (tg_batdau.val() == '' || tg_batdau.val() == null) {
    if (tg_batdau.hasClass('error') == false) {
      tg_batdau.addClass('error');
    }
    tg_batdau.focus();
    returnsubmit = false;
  } else {
    tg_batdau.removeClass('error');
  }

  if (tg_ketthuc.val() == '') {
    if (tg_ketthuc.hasClass('error') == false) {
      tg_ketthuc.addClass('error');
    }
    tg_ketthuc.focus();
    returnsubmit = false;
  } else {
    tg_ketthuc.removeClass('error');
  }

  if (chuyen_nganh.val() == '') {
    if (chuyen_nganh.hasClass('error') == false) {
      chuyen_nganh.addClass('error');
    }
    chuyen_nganh.focus();
    returnsubmit = false;
  } else {
    chuyen_nganh.removeClass('error');
  }

  if (xep_loai.val() == 0) {
    if (xep_loai.hasClass('error') == false) {
      xep_loai.addClass('error');
    }
    xep_loai.focus();
    returnsubmit = false;
  } else {
    xep_loai.removeClass('error');
  }

  return returnsubmit;
}

function ValiKinhNghiem() {
  var submit = true;
  var chuc_danh = $("#kn_chuc_danh");
  var cong_ty = $("#kn_ten_cty");
  var tg_batdau = $('#kn_tg_batdau');
  var tg_ketthuc = $('#kn_tg_ketthuc');

  if (chuc_danh.val().length == 0) {
    if (chuc_danh.hasClass('error') == false) {
      chuc_danh.addClass('error');
      chuc_danh.after("<label style='padding-left:25%' id='chuc_danh_error' class='error'>Vui lòng nhập chức danh</label>");
    }
    submit = false;
    chuc_danh.focus();
  } else {
    chuc_danh.removeClass('error');
    $('#chuc_danh_error').remove();
  }

  if (cong_ty.val().length == 0) {
    if (cong_ty.hasClass('error') == false) {
      cong_ty.addClass('error');
      cong_ty.after("<label style='padding-left:25%' id='cong_ty_error' class='error'>Vui lòng nhập tên công ty</label>");
    }
    submit = false;
    chuc_danh.focus();
  } else {
    cong_ty.removeClass('error');
    $('#cong_ty_error').remove();
  }

  if (tg_batdau.val() == '') {
    tg_batdau.addClass('error');
    tg_batdau.focus();
    submit = false;
  } else {
    tg_batdau.removeClass('error');
  }

  if (tg_ketthuc.val() == '') {
    tg_ketthuc.addClass('error');
    tg_ketthuc.focus();
    submit = false;
  } else {
    tg_ketthuc.removeClass('error');
  }


  return submit;
}


function ValiKinhNghiem_edit() {
  var submit = true;
  var chuc_danh = $('#chuc_danh');
  var cong_ty = $('#ten_cty');
  var tg_batdau = $('#edit_kn_tgbatdau');
  var tg_ketthuc = $('#edit_kn_tgketthuc');

  if (chuc_danh.val().length == 0) {
    if (chuc_danh.hasClass('error') == false) {
      chuc_danh.addClass('error');
      chuc_danh.after("<label style='padding-left:25%' id='chuc_danh_error' class='error'>Vui lòng nhập chức danh</label>");
    }
    chuc_danh.focus();
    submit = false;
  } else {
    chuc_danh.removeClass('error');
    $('#chuc_danh_error').remove();
  }

  if (cong_ty.val().length == 0) {
    if (cong_ty.hasClass('error') == false) {
      cong_ty.addClass('error');
      cong_ty.after("<label style='padding-left:25%' id='cong_ty_error' class='error'>Vui lòng nhập tên công ty</label>");
    }
    cong_ty.focus();
    submit = false;
  } else {
    cong_ty.removeClass('error');
    $('#cong_ty_error').remove();
  }

  if (tg_batdau.val() == '') {
    if (tg_batdau.hasClass('error') == false) {
      tg_batdau.addClass('error');
    }
    tg_batdau.focus();
    submit = false;
  } else {
    tg_batdau.removeClass('error');
  }

  if (tg_ketthuc.val() == '') {
    if (tg_ketthuc.hasClass('error') == false) {
      tg_ketthuc.addClass('error');
    }
    tg_ketthuc.focus();
    submit = false;
  } else {
    tg_ketthuc.removeClass('error');
  }

  return submit;
}

function ValiNgoaiNgu() {
  var submit = true;
  var sl_add_ngonngu = $('#sl_add_ngonngu');
  var add_chungchi = $('#add_chungchi');
  var add_ketqua_nn = $('#add_ketqua_nn');

  if (sl_add_ngonngu.val() == 0) {
    if (sl_add_ngonngu.hasClass('error') == false) {
      sl_add_ngonngu.addClass('error');
      sl_add_ngonngu.after("<label style='padding-left:25%' class='error' id='sl_add_ngonngu_error'>Vui lòng chọn ngôn ngữ</label>");
    }
    sl_add_ngonngu.focus();
    submit = false;
  } else {
    sl_add_ngonngu.removeClass('error');
    $('sl_add_ngonngu_error').remove();
  }

  if (add_chungchi.val().length == 0) {
    if (add_chungchi.hasClass('error') == false) {
      add_chungchi.addClass('error');
      add_chungchi.after("<label style='padding-left:25%' class='error' id='add_chungchi_error'>Vui lòng nhập chứng chỉ</label>");
    }
    add_chungchi.focus();
    submit = false;
  } else {
    add_chungchi.removeClass('error');
    $('add_chungchi_error').remove();
  }

  if (add_ketqua_nn.val().length == 0) {
    if (add_ketqua_nn.hasClass('error') == false) {
      add_ketqua_nn.addClass('error');
      add_ketqua_nn.after("<label style='padding-left:25%' class='error' id='add_ketqua_nn_error'>Vui lòng nhập kết quả</label>");
    }
    add_ketqua_nn.focus();
    submit = false;
  } else {
    add_ketqua_nn.removeClass('error');
    $('add_ketqua_nn_error').remove();
  }


  return submit;
}

function ValiNgoaiNgu_edit() {
  var submit = true;
  var sl_ngonngu = $('#id_ngonngu');
  var chung_chi = $('#chung_chi');
  var ket_qua = $('#ket_qua');

  if (sl_ngonngu.val() == 0) {
    if (sl_ngonngu.hasClass('error') == false) {
      sl_ngonngu.addClass('error');
      sl_ngonngu.after("<label style='padding-left:25%' class='error' id='sl_ngonngu_error'>Vui lòng chọn ngôn ngữ</label>");
    }
    sl_ngonngu.focus();
    submit = false;
  } else {
    sl_ngonngu.removeClass('error');
    $('sl_ngonngu_error').remove();
  }

  if (chung_chi.val().length == 0) {
    if (chung_chi.hasClass('error') == false) {
      chung_chi.addClass('error');
      chung_chi.after("<label style='padding-left:25%' class='error' id='chung_chi_error'>Vui lòng nhập chứng chỉ</label>");
    }
    chung_chi.focus();
    submit = false;
  } else {
    chung_chi.removeClass('error');
    $('chung_chi_error').remove();
  }

  if (ket_qua.val().length == 0) {
    if (ket_qua.hasClass('error') == false) {
      ket_qua.addClass('error');
      ket_qua.after("<label style='padding-left:25%' class='error' id='ket_qua_error'>Vui lòng nhập kết quả</label>");
    }
    ket_qua.focus();
    submit = false;
  } else {
    ket_qua.removeClass('error');
    $('ket_qua_error').remove();
  }


  return submit;
}

function changeImg(input) {
  //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    //Sự kiện file đã được load vào website
    reader.onload = function (e) {
      //Thay đổi đường dẫn ảnh
      $('#avt').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
    $('.inp_submit_img').removeClass('hidden');
  }
}
function delFile(idcv, type) {
  if (confirm("Bạn có chắc chắn muốn xóa bản ghi này ????")) {
    $.ajax({
      type: "POST",
      cache: false,
      url: "../ajax/deleteFileCV.php",
      data: {
        idcv: idcv,
        type: type
      }, success: function (data) {
        if (data == 1) {
          alert("Xóa thành công !!!");
          location.reload();
        }
      }
    });
  }
}


