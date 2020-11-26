//Hàm check định dạng email
function validateEmail($email) {
   var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
   return emailReg.test($email);
}
$(document).ready(function() {
   //Kiểm tra email trong form
   $("#user_email").keyup(function() {

      var valEmail = $("#user_email");
      if ($("#user_email").hasClass('valid') == true) {
         if (valEmail.val().length > 0) {
            $("#user_email_error").remove();
            if (validateEmail(valEmail.val()) == false) {
               if ($("#user_email_error").hasClass("error") == false) {
                  valEmail.after('<label id="user_email_error" class="error" for="user_email">Địa chỉ email không đúng định dạng.</label>');
                  valEmail.addClass('error');
               }
            } else {
               $.ajax({
                  type: "POST",
                  url: '../ajax/checkmail.php',
                  data: {
                     email: valEmail.val()
                  },
                  success: function(data) {
                     if (data == 1) {
                        if ($("#user_email_error").hasClass("error") == false) {
                           valEmail.after('<label id="user_email_error" class="error" for="user_email">Email đã có người sử dụng.</label>');
                           valEmail.addClass('error');
                        }
                     } else {
                        $("#user_email_error").remove();
                        valEmail.removeClass('error');
                     }
                  }
               });
            }
         } else {
            $("#user_email_error").remove();
            valEmail.after('<label id="user_email_error" class="error" for="user_email">Vui lòng nhập địa chỉ email.</label>');
            valEmail.addClass('error');
         }
      }
   });

   //-------------------------------------
   $("#user_email_ntd").keyup(function() {
      var valEmailNTD = $("#user_email_ntd");
      if (valEmailNTD.val().length == 0) {
         if (valEmailNTD.hasClass('error') == false) {
            valEmailNTD.addClass('error');
            valEmailNTD.after('<label id="user_email_error" class="error" for="user_email">Vui lòng nhập địa chỉ Email.</label>');
         }
         valEmailNTD.focus();
      } else {
         valEmailNTD.removeClass('error');
         $('#user_email_error').remove();
         if (validateEmail(valEmailNTD.val()) == false) {
            if (valEmailNTD.hasClass('error') == false) {
               valEmailNTD.after('<label id="user_email_error" class="error" for="user_email">Địa chỉ email không đúng định dạng.</label>');
               valEmailNTD.addClass('error');
            }
         } else {
            valEmailNTD.removeClass('error');
            $('#user_email_error').remove();
            $.ajax({
               type: "POST",
               url: '../ajax/checkmail_ntd.php',
               data: {
                  email_ntd: valEmailNTD.val()
               },
               success: function(data) {
                  if (data == 1) {
                     if (valEmailNTD.hasClass("error") == false) {
                        valEmailNTD.after('<label id="user_email_error" class="error" for="user_email_ntd">Email đã có người sử dụng.</label>');
                        valEmailNTD.addClass('error');
                     }
                     valEmailNTD.focus();
                  } else {
                     $("#user_email_error").remove();
                     valEmailNTD.removeClass('error');
                  }
               }
            });
         }
      };
   });


   //-------------------------------------
   //Kiem tra khi di chuyen con tro chuot ra khoi input UV
   $("#user_email").blur(function() {
      var valEmail = $("#user_email");
      if (valEmail.val().length > 0) {
         if (validateEmail(valEmail.val()) == false) {
            if ($("#user_email_error").hasClass("error") == false) {
               valEmail.after('<label id="user_email_error" class="error" for="user_email">Địa chỉ email không đúng định dạng.</label>');
               valEmail.addClass('error');
            }
         } else {
            $.ajax({
               type: "POST",
               url: '../ajax/checkmail.php',
               data: {
                  email: valEmail.val()
               },
               success: function(data) {
                  if (data == 1) {
                     if ($("#user_email").hasClass("error") == false) {
                        valEmail.after('<label id="user_email_error" class="error" for="user_email">Email đã có người sử dụng.</label>');
                        valEmail.addClass('error');
                     }
                  } else {
                     $("#user_email_error").remove();
                     valEmail.removeClass('error');
                  }
               }
            });
         }
         valEmail.addClass('valid');
      }
   });

   //------------------------------------------------
   //Kiem tra khi di chuyen con tro chuot ra khoi input NTD
   $("#user_email_ntd").blur(function() {
      var valEmail = $("#user_email_ntd");
      if (valEmail.val().length > 0) {
         if (validateEmail(valEmail.val()) == false) {
            if (valEmail.hasClass("error") == false) {
               valEmail.after('<label id="user_email_error" class="error" for="user_email_ntd">Địa chỉ email không đúng định dạng.</label>');
               valEmail.addClass('error');
            }
         } else {
            $.ajax({
               type: "POST",
               url: '../ajax/checkmail_ntd.php',
               data: {
                  email: valEmail.val()
               },
               success: function(data) {
                  console.log(data);
                  if (data == 1) {
                     if ($("#user_email_ntd").hasClass("error") == false) {
                        valEmail.after('<label id="user_email_error" class="error" for="user_email_ntd">Email đã có người sử dụng.</label>');
                        valEmail.addClass('error');
                     }
                  } else {
                     $("#user_email_error").remove();
                     valEmail.removeClass('error');
                  }
               }
            });
         }
         valEmail.addClass('valid');
      } else {
         if (valEmail.hasClass('error') == false) {
            valEmail.addClass('error');
            valEmail.after('<label id="user_email_error" class="error" for="user_email_ntd">Vui lòng nhập địa chỉ Email.</label>');
         }
         valEmail.focus();
      }
   });
   //------------------------------------------------
   //Kiểm tra password trong form
   $("#user_password_first").keyup(function() {
      var valPass = $("#user_password_first");
      if ($("#user_password_first").hasClass('valid') == true) {
         if (valPass.val().length > 0) {
            $("#user_password_first_error").remove();
            if (valPass.val().length < 4) {
               if ($("#user_password_first_error").hasClass("error") == false) {
                  valPass.after('<label id="user_password_first_error" class="error" for="user_password_first" style="display: inline-block;">Mật khẩu phải từ 4-20 ký tự</label>');
                  valPass.addClass('error');
               }
            } else {
               $("#user_password_first_error").remove();
               valPass.removeClass('error');
            }
         } else {
            $("#user_password_first_error").remove();
            valPass.after('<label id="user_password_first_error" class="error" for="user_password_first" style="display: inline-block;">Vui lòng nhập mật khẩu.</label>');
            valPass.addClass('error');
         }
      }
   });
   $("#user_password_first").blur(function() {
      var valPass = $("#user_password_first");
      if (valPass.val().length > 0) {
         if (valPass.val().length < 4) {
            if ($("#user_password_first_error").hasClass("error") == false) {
               valPass.after('<label id="user_password_first_error" class="error" for="user_password_first" style="display: inline-block;">Mật khẩu phải từ 4-20 ký tự</label>');
               valPass.addClass('error');
            }
         } else {
            $("#user_password_first_error").remove();
            valPass.removeClass('error');
         }
         valPass.addClass('valid');
      }
   });
   //Kiểm tra nhập lại mật khẩu
   $("#user_password_second").keyup(function() {
      var valPass = $("#user_password_first").val();
      var valrePass = $("#user_password_second");
      if ($("#user_password_second").hasClass('valid') == true) {
         if (valrePass.val().length > 0) {
            $("#user_password_second_error").remove();
            if (valrePass.val() != valPass) {
               if ($("#user_password_second_error").hasClass("error") == false) {
                  valrePass.after('<label id="user_password_second_error" class="error" for="user_password_second" style="display: inline-block;">Xác nhận lại mật khẩu mới không trùng khớp.</label>');
                  valrePass.addClass('error');
               }
            } else {
               $("#user_password_second_error").remove();
               valrePass.removeClass('error');
            }
         } else {
            $("#user_password_second_error").remove();
            valrePass.after('<label id="user_password_second_error" class="error" for="user_password_second" style="display: inline-block;">Vui lòng nhập lại mật khẩu.</label>');
            valrePass.addClass('error');
         }
      }
   });
   $("#user_password_second").blur(function() {
      var valPass = $("#user_password_first").val();
      var valrePass = $("#user_password_second");
      if (valrePass.val().length > 0) {
         if (valrePass.val() != valPass) {
            if ($("#user_password_second_error").hasClass("error") == false) {
               valrePass.after('<label id="user_password_second_error" class="error" for="user_password_second" style="display: inline-block;">Xác nhận lại mật khẩu mới không trùng khớp.</label>');
               valrePass.addClass('error');
            }
         } else {
            $("#user_password_second_error").remove();
            valrePass.removeClass('error');
         }
         valrePass.addClass('valid');
      }
   });
   //Kiểm tra trống tên công ty
   $("#user_name").keyup(function() {
      $("#user_name_error").remove();
      var valCompany = $("#user_name");
      if (valCompany.hasClass("valid") == true) {
         if (valCompany.val().length == 0) {
            valCompany.after('<label id="user_name_error" class="error" for="user_name">Vui lòng nhập tên công ty</label>');
            valCompany.addClass('error');
         } else {
            $("#user_name_error").remove();
            valCompany.removeClass('error');
         }
      }
   });
   $("#s2id_city").change(function() {
      $("#user_company_city_error").remove();
      var valCompany = $("#s2id_city");
      if (valCompany.val() == 0) {
         $('#tp .select2-container').after('<label id="user_company_city_error" class="error" for="user_company_city">Vui lòng chọn tỉnh/thành phố</label>');
         $('#tp .select2-container').addClass('error');
      } else {
         $("#user_company_city_error").remove();
         $('#tp .select2-container').removeClass('error');
      }
   });
   $("#user_name").blur(function() {
      var valCompany = $('#user_name');
      $.ajax({
         type: 'POST',
         url: '../ajax/checktrungNTD.php',
         data: {
            valCompany: valCompany.val()
         },
         success: function(data) {
            if (data == 1) {
               if (valCompany.hasClass('error') == false) {
                  valCompany.after("<label id='checktrungNTD_error' class='error'>Tên công ty đã được đăng kí, vui lòng kiểm tra lại</label>");
                  valCompany.addClass('error');
               }
            } else {
               valCompany.removeClass('error');
               $('#checktrungNTD_error').remove();
            }
         },
         error: function(data) {

         }
      });
      $(this).addClass("valid");
   });
   $("#user_name_ntd").blur(function() {
      $(this).addClass("valid");
   });

   //Kiểm tra trống địa chỉ
   $("#s2id_autogen1").keyup(function() {
      $("#s2id_autogen1_error").remove();
      var valAddress = $("#s2id_autogen1");
      if (valAddress.hasClass("valid") == true) {
         if (valAddress.val().length == 0) {
            valAddress.after('<label id="s2id_autogen1_error" class="error" for="s2id_autogen1">Vui lòng nhập địa chỉ công ty</label>');
            valAddress.addClass('error');
         } else {
            $("#s2id_autogen1_error").remove();
            valAddress.removeClass('error');
         }
      }
   });
   $("#s2id_autogen1").blur(function() {
      $(this).addClass("valid");
   });
   //Kiểm tra số điện thoại
   jQuery(".numbersOnly").keyup(function() {
      this.value = this.value.replace(/[^0-9]/g, '');
   });
   $("#user_phone").keyup(function() {
      var valPhone = $("#user_phone");
      $("#user_phone_error").remove();
      if (valPhone.hasClass("valid") == true) {
         if (valPhone.val().length == 0) {
            if ($("#user_phone_error").hasClass("error") == false) {
               valPhone.after('<label id="user_phone_error" class="error" for="user_phone">Vui lòng nhập số điện thoại</label>');
               valPhone.addClass('error');
            }
         } else {
            $("#user_phone_error").remove();
            valPhone.removeClass('error');
         }
      }
   });
   $("#user_phone").blur(function() {
      $(this).addClass("valid");
   });


   $("#s2id_city").change(function() {
      $(this).removeClass('error');
      $('#s2id_city_child').removeClass('error');
      $('#user_company_city2_error').remove();
   });
   $("#s2id_city_child").change(function() {
      if ($(this).val() == '') {
         if ($('#qh .select2-container').hasClass('error') == false) {
            $('#qh .select2-container').addClass('error');
            $('#qh .select2-container').after("<label id='user_company_city2_error' class='error'>Vui lòng chọn quận/huyện</label>");
         }
      } else {
         $('#qh .select2-container').removeClass('error');
         $('#user_company_city2_error').remove();
      }

   });
   $("#address_uv").keyup(function() {
      $(this).removeClass('error');
      $('#address_uv_error').remove();
      if ($(this).val().length == 0) {
         $(this).addClass('error');
         $(this).after('<label id="address_uv_error" class="error" for="address_uv">Vui lòng nhập địa chỉ chi tiết</label>');
      } else {
         $(this).removeClass('error');
         $("#address_uv_error").remove();
      }
   });

   $("#address_uv").blur(function() {
      if ($(this).val().length == 0) {
         if ($(this).hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after('<label id="address_uv_error" class="error" for="address_uv">Vui lòng nhập địa chỉ chi tiết</label>');
         }
      } else {
         $(this).removeClass('error');
         $('#address_uv_error').remove();
      }
   });

   $("#job_name").keyup(function() {
      if ($(this).val().length == 0) {
         if ($(this).hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after('<label id="job_name_error" class="error" for="job_name">Vui lòng nhập công việc chi tiết</label>');
         }
      } else {
         $(this).removeClass('error');
         $('#job_name_error').remove();
      }
   });

   $("#job_name").blur(function() {
      if ($(this).val().length == 0) {
         if ($(this).hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after('<label id="job_name_error" class="error" for="job_name">Vui lòng nhập công việc chi tiết</label>');
         }
         $(this).focus();
      }
   });


   $("#job_address").change(function() {
      if ($(this).val() == null) {
         if ($('#div_job_address span.select2-container').hasClass('error') == false) {
            $('#div_job_address span.select2-container').addClass('error');
            $('#div_job_address span.select2-container').after('<label id="job_address_error" class="error" for="job_address">Vui lòng chọn nơi bạn muốn làm việc</label>');
         }
      } else {
         $('#div_job_address span.select2-container').removeClass('error');
         $('#job_address_error').remove();
      }
   });

   $("#nganh_nghe").change(function() {
      if ($(this).val() == null) {
         if ($('#div_nganh_nghe span.select2-container').hasClass('error') == false) {
            $('#div_nganh_nghe span.select2-container').addClass('error');
            $('#div_nganh_nghe span.select2-container').after('<label id="nganh_nghe_error" class="error" for="job_address">Vui lòng nhập chọn các bạn muốn làm việc</label>');
         }
         $(this).focus();
      } else {
         $('#div_nganh_nghe span.select2-container').removeClass('error');
         $('#nganh_nghe_error').remove();
      }
   });

   $('#gender').change(function() {
      if ($("#gender").val() == 0) {
         if ($('#gender').hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after('<label id="gender_error" class="error" for="gender">Vui lòng chọn giới tính</label>');
         }
         $(this).focus();
      } else {
         $(this).removeClass('error');
         $('#gender_error').remove();
      }
   });

   $("#school_name").keyup(function() {
      if ($(this).val().length == 0) {
         if ($(this).hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after('<label id="school_name_error" class="error" for="school_name">Vui lòng nhập tên trường học của bạn</label>');
         }
         $(this).focus();
      } else {
         $(this).removeClass('error');
         $('#school_name_error').remove();
      }
   });

   $("#school_name").blur(function() {
      if ($(this).val().length == 0) {
         if ($(this).hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after('<label id="school_name_error" class="error" for="school_name">Vui lòng nhập tên trường học của bạn</label>');
         }
      }
   });

   $('#rank').change(function() {
      if ($("#rank").val() == 0) {
         if ($('#rank').hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after('<label id="rank_error" class="error" for="rank">Vui lòng chọn xếp loại</label>');
         }
         returnform = false;
      } else {
         $(this).removeClass('error');
         $('#rank_error').remove();
      }
   });

   $('#exp_years').change(function() {
      if ($("#exp_years").val() == 0) {
         if ($('#exp_years').hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after('<label id="exp_years_error" class="error" for="exp_years">Vui lòng chọn xếp loại</label>');
         }
         returnform = false;
      } else {
         $(this).removeClass('error');
         $('#exp_years_error').remove();
      }
   });

   $('#work_option').change(function() {
      if ($("#work_option").val() == 0) {
         if ($('#work_option').hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after('<label id="work_option_error" class="error" for="rwork_optionank">Vui lòng chọn xếp loại</label>');
         }
         returnform = false;
      } else {
         $(this).removeClass('error');
         $('#work_option_error').remove();
      }
   });

   $('#salary').change(function() {
      if ($("#salary").val() == 0) {
         if ($('#salary').hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after('<label id="salary_error" class="error" for="salary">Vui lòng chọn xếp loại</label>');
         }
         returnform = false;
      } else {
         $(this).removeClass('error');
         $('#salary_error').remove();
      }
   });

   $('#cap_bac_mong_muon').change(function() {
      if ($("#cap_bac_mong_muon").val() == 0) {
         if ($('#cap_bac_mong_muon').hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after('<label id="cap_bac_mong_muon_error" class="error" for="cap_bac_mong_muon">Vui lòng chọn xếp loại</label>');
         }
         returnform = false;
      } else {
         $(this).removeClass('error');
         $('#cap_bac_mong_muon_error').remove();
      }
   });

   $('#lg_honnhan').change(function() {
      if ($("#lg_honnhan").val() == 0) {
         if ($('#lg_honnhan').hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after('<label id="lg_honnhan_error" class="error" for="lg_honnhan">Vui lòng chọn xếp loại</label>');
         }
         returnform = false;
      } else {
         $(this).removeClass('error');
         $('#lg_honnhan_error').remove();
      }
   });

   $('#birthday').blur(function() {
      if ($('#birthday').val() == '') {
         if ($('#birthday').hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after('<label id="birth_error" class="error" for="birthday">Vui lòng chọn ngày tháng năm sinh</label>');
         }
         returnform = false;
      } else {
         $(this).removeClass('error');
         $('#birth_error').remove();
      }
   });

   $('#vi_tri_tuyen_dung').keyup(function() {
      if ($(this).val().length == 0) {
         if ($(this).hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after("<label id='vi_tri_tuyen_dung_error' style='padding-left:25%' class='error'>Vui lòng nhập vị trí tuyển dụng</label>");
         }
      } else {
         $(this).removeClass('error');
         $('#vi_tri_tuyen_dung_error').remove();
      }
   });

   $('#vi_tri_tuyen_dung').blur(function() {
      if ($(this).val().length == 0) {
         if ($(this).hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after("<label id='vi_tri_tuyen_dung_error' style='padding-left:25%' class='error'>Vui lòng nhập vị trí tuyển dụng</label>");
         }
      } else {
         $(this).removeClass('error');
         $('#vi_tri_tuyen_dung_error').remove();
      }
   });

   $('#cap_bac').change(function() {
      if ($(this).val() == 0) {
         if ($(this).hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after("<label id='cap_bac_error' style='padding-left:25%' class='error'>Vui lòng chọn cấp bậc</label>");
         }
      } else {
         $(this).removeClass('error');
         $('#cap_bac_error').remove();
      }
   });

   $('#nganh_nghe').change(function() {
      if ($(this).val() == null) {
         if ($('.div_nganh_nghe span.select2-container').hasClass('error') == false) {
            $('.div_nganh_nghe span.select2-container').addClass('error');
            $('.div_nganh_nghe span.select2-container').after("<label id='nganh_nghe_error' style='padding-left:25%' class='error'>Vui lòng chọn ngành nghề</label>");
         }
      } else {
         $('.div_nganh_nghe span.select2-container').removeClass('error');
         $('#nganh_nghe_error').remove();
      }
   });

   $('#muc_luong').change(function() {
      if ($(this).val() == 0) {
         if ($(this).hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after("<label id='muc_luong_error' style='padding-left:25%' class='error'>Vui lòng chọn mức lương</label>");
         }
      } else {
         $(this).removeClass('error');
         $('#muc_luong_error').remove();
      }
   });

   $('#city').change(function() {
      if ($(this).val() == null) {
         if ($(".div_dia_diem_lv span.select2-container").hasClass('error') == false) {
            $('.div_dia_diem_lv span.select2-container').addClass('error');
            $('.div_dia_diem_lv span.select2-container').after("<label id='dia_diem_error' style='padding-left:25%' class='error'>Vui lòng chọn địa điểm</label>");
         }
      } else {
         $('.div_dia_diem_lv span.select2-container').removeClass('error');
         $('#dia_diem_error').remove();
         $('#city_error').remove();
      }
   });

   $("#sl_ungvien").change(function() {
      if ($(this).val() == 0) {
         if ($(this).hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after("<label style='padding-left:25%' class='error' id='sl_ungvien_error'>Vui lòng nhập số lượng ứng viên</label>");
         }
      } else {
         $(this).removeClass('error');
         $('#sl_ungvien_error').remove();
      }
   });

   $("#sl_ungvien").keyup(function() {
      if ($(this).val().length == 0) {
         if ($(this).hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after("<label style='padding-left:25%' class='error' id='sl_ungvien_error'>Vui lòng nhập số lượng ứng viên</label>");
         }
      } else {
         $(this).removeClass('error');
         $('#sl_ungvien_error').remove();
      }
   });

   $("#gender_dangtin").change(function() {
      if ($(this).val() == '') {
         if ($(this).hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after("<label style='padding-left:25%' class='error' id='gender_error'>Vui lòng chọn giới tính</label>");
         }
      } else {
         $(this).removeClass('error');
         $('#gender_error').remove();
      }
   });

   $('#mo_ta_cv').keyup(function() {
      if ($(this).val().length == 0) {
         if ($(this).hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after("<label style='padding-left:25%' class='error' id='mo_ta_cv_error'>Vui lòng nhập mô tả công việc</label>");
         }
      } else {
         $(this).removeClass('error');
         $('#mo_ta_cv_error').remove();
      }
   });

   $('#mo_ta_cv').blur(function() {
      if ($(this).val().length == 0) {
         if ($(this).hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after("<label style='padding-left:25%' class='error' id='mo_ta_cv_error'>Vui lòng nhập mô tả công việc</label>");
         }
      } else {
         $(this).removeClass('error');
         $('#mo_ta_cv_error').remove();
      }
   });

   $('#yeu_cau_cv').keyup(function() {
      if ($(this).val().length == 0) {
         if ($(this).hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after("<label style='padding-left:25%' class='error' id='yeu_cau_cv_error'>Vui lòng nhập yêu cầu công việc</label>");
         }
      } else {
         $(this).removeClass('error');
         $('#yeu_cau_cv_error').remove();
      }
   });

   $('#yeu_cau_cv').blur(function() {
      if ($(this).val().length == 0) {
         if ($(this).hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after("<label style='padding-left:25%' class='error' id='yeu_cau_cv_error'>Vui lòng nhập yêu cầu công việc</label>");
         }
      } else {
         $(this).removeClass('error');
         $('#yeu_cau_cv_error').remove();
      }
   });

   $('#quyen_loi').keyup(function() {
      if ($(this).val().length == 0) {
         if ($(this).hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after("<label style='padding-left:25%' class='error' id='quyen_loi_error'>Vui lòng nhập quyền lợi trong công việc</label>");
         }
      } else {
         $(this).removeClass('error');
         $('#quyen_loi_error').remove();
      }
   });

   $('#quyen_loi').blur(function() {
      if ($(this).val().length == 0) {
         if ($(this).hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after("<label style='padding-left:25%' class='error' id='quyen_loi_error'>Vui lòng nhập quyền lợi trong công việc</label>");
         }
      } else {
         $(this).removeClass('error');
         $('#quyen_loi_error').remove();
      }
   });

   $('#ho_so').keyup(function() {
      if ($(this).val().length == 0) {
         if ($(this).hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after("<label style='padding-left:25%' class='error' id='ho_so_error'>Vui lòng nhập hồ sơ</label>");
         }
      } else {
         $(this).removeClass('error');
         $('#ho_so_error').remove();
      }
   });

   $('#ho_so').blur(function() {
      if ($(this).val().length == 0) {
         if ($(this).hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after("<label style='padding-left:25%' class='error' id='ho_so_error'>Vui lòng nhập hồ sơ</label>");
         }
      } else {
         $(this).removeClass('error');
         $('#ho_so_error').remove();
      }
   });

   $('#han_nop_ho_so').blur(function() {
      if ($(this).val() == '') {
         if ($(this).hasClass('error') == false) {
            $(this).addClass('error');
            $(this).after("<label style='padding-left:25%' class='error' id='han_nop_error'>Vui lòng chọn hạn nộp</label>");
         }
      } else {
         $(this).removeClass('error');
         $('#han_nop_error').remove();
      }
   });
});
//---------------------------------------------------//

//Hàm check khi UV submit form
function checkvali_UV() {
   var returnform = false;
   var ccemail = $("#user_email");
   var ccpass = $("#user_password_first");
   var ccrepass = $("#user_password_second");
   var ccnamecom = $("#user_name");
   var cccity = $("#s2id_city");
   var cccity2 = $('#s2id_city_child');
   var ccphone = $("#user_phone");
   var ccaddress = $("#s2id_autogen1");
   var address_uv = $('#address_uv');
   var job_name = $('#job_name');
   var job_city = $("#job_address");
   var nganh_nghe = $('#nganh_nghe');

   //Kiểm tra tồn tại email đăng nhập 
   if (ccemail.val() == '') {
      if (ccemail.hasClass('error') == false) {
         ccemail.after('<label id="user_email_error" class="error" for="user_email">Vui lòng nhập địa chỉ email.</label>');
         ccemail.addClass('error');
      }
      ccemail.focus();
      ccemail.addClass('valid');
      return false;
   } else {
      if (ccemail.val().length > 0) {
         if (validateEmail(ccemail.val()) == false) {
            if ($(ccemail).hasClass("error") == false) {
               ccemail.after('<label id="user_email_error" class="error" for="user_email">Địa chỉ email không đúng định dạng.</label>');
               ccemail.focus();
               ccemail.addClass('error');
            }
            return false;
         } else {
            $.ajax({
               type: "POST",
               url: '../ajax/checkmail.php',
               data: {
                  email: ccemail.val()
               },
               success: function(data) {
                  if (data == 1) {
                     if (ccemail.hasClass("error") == false) {
                        ccemail.after('<label id="user_email_error" class="error" for="user_email">Email đã có người sử dụng.</label>');
                        ccemail.addClass('error');
                     }
                     ccemail.focus();
                     return false;
                  } else {
                     $("#user_email_error").remove();
                     ccemail.removeClass('error');
                  }
               }
            });
         }
         ccemail.addClass('valid');
      }
   }

   //Kiểm tra nhập mật khẩu
   if (ccpass.val() == '') {
      if (ccpass.hasClass('error') == false) {
         ccpass.after('<label id="user_password_first_error" class="error" for="user_password_first" style="display: inline-block;">Vui lòng nhập mật khẩu.</label>');
         ccpass.addClass('error');
      }
      ccpass.focus();
      ccpass.addClass('valid');
      return false;
   } else {
      ccpass.addClass('valid');
      $("#user_password_first_error").remove();
      if (ccpass.val().length < 4) {
         if (ccemail.hasClass("error") == false) {
            ccpass.after('<label id="user_password_first_error" class="error" for="user_password_first" style="display: inline-block;">Mật khẩu phải từ 4-20 ký tự</label>');
            ccpass.addClass('error');
         }
         ccpass.focus();
         returnform = false;
      } else {
         $("#user_password_first_error").remove();
         ccpass.removeClass('error');
      }
   }

   //Kiểm tra pass nhập lại
   if (ccrepass.val().length > 0) {
      var valPass = $("#user_password_first").val();
      $("#user_password_second_error").remove();
      if (ccrepass.val() != valPass) {
         if (ccrepass.hasClass("error") == false) {
            ccrepass.after('<label id="user_password_second_error" class="error" for="user_password_second" style="display: inline-block;">Xác nhận lại mật khẩu mới không trùng khớp.</label>');
            ccrepass.addClass('error');
         }
         ccrepass.addClass('valid');
         ccrepass.focus();
         return false;
      } else {
         $("#user_password_second_error").remove();
         ccrepass.addClass('valid');
         ccrepass.removeClass('error');
      }
   } else {
      $("#user_password_second_error").remove();
      ccrepass.after('<label id="user_password_second_error" class="error" for="user_password_second" style="display: inline-block;">Vui lòng nhập lại mật khẩu.</label>');
      ccrepass.addClass('valid');
      ccrepass.addClass('error');
      ccrepass.focus();
      return false;
   }

   //Kiểm tra đã nhập email đăng nhập hay chưa
   if (ccnamecom.val().length == 0) {
      if (ccnamecom.hasClass("error") == false) {
         ccnamecom.after('<label id="user_name_error" class="error" for="user_name">Vui lòng nhập họ và tên</label>');
         ccnamecom.addClass('error');
      }
      ccnamecom.focus();
      return false;
   } else {
      $("#user_name_error").remove();
      ccnamecom.removeClass('error');
   }
   //Kiểm tra số điện thoại
   if (ccphone.val().length == 0) {
      if (ccphone.hasClass("error") == false) {
         ccphone.after('<label id="user_phone_error" class="error" for="user_phone">Vui lòng nhập số điện thoại</label>');
         ccphone.addClass('error');
      }
      ccphone.focus();
      return false;
   } else {
      $("#user_phone_error").remove();
      ccphone.removeClass('error');
   }

   //Kiểm tra chọn thành phố
   if (cccity.val() == 0) {
      if ($('#tp .select2-container').hasClass("error") == false) {
         $('#tp .select2-container').after('<label id="user_company_city_error" class="error" for="s2id_city">Vui lòng chọn tỉnh/thành phố</label>');
         $('#qh .select2-container').after('<label id="user_company_city2_error" class="error" for="s2id_city_child">Vui lòng chọn Quận/huyện</label>');
         $('#tp .select2-container').addClass('error');
         $('#qh .select2-container').addClass('error');
      }
      cccity.focus();
      return false;
   } else {
      $("#user_company_city_error").remove();
      $('#user_company_city2_error').remove();
      $('#tp .select2-container').removeClass('error');
      $('#qh .select2-container').removeClass('error');
   }
   //Kiểm tra quận huyện
   if (cccity2.val() == '') {
      if (cccity2.hasClass('error') == false) {
         $('#s2id_city_child').addClass('error');
         cccity2.after("<label id='cccity2_error' class='error'>Vui lòng chọn Quận/huyện</label>");
      }
      cccity2.focus();
      return false;
   } else {
      cccity2.removeClass('error');
      $('#cccity2_error').remove();
   }
   //Kiểm tra địa chỉ chi tiết
   if (address_uv.val().length == 0) {
      if (address_uv.hasClass("error") == false) {
         address_uv.after('<label id="address_uv_error" class="error" for="address_uv">Vui lòng nhập địa chỉ chi tiết</label>');
         address_uv.addClass('error');
      }
      address_uv.focus();
      return false;
   } else {
      $("#address_uv_error").remove();
      ccphone.removeClass('error');
   }
   //Kiểm tra tên công việc
   if (job_name.val().length == 0) {
      if (job_name.hasClass("error") == false) {
         job_name.after('<label id="job_name_error" class="error" for="job_name">Vui lòng nhập tên công việc bạn muốn làm</label>');
         job_name.addClass('error');
      }
      job_name.focus();
      return false;
   } else {
      $("#job_name_error").remove();
      job_name.removeClass('error');
   }

   //Kiểm tra tỉnh thành phố muốn làm việc
   if (job_city.val() == null) {

      if ($('#div_job_address span.select2-container').hasClass("error") == false) {
         $('#div_job_address span.select2-container').after('<label id="job_city_error" class="error" for="job_city">Vui lòng nhập tên công việc bạn muốn làm</label>');
         $('#div_job_address span.select2-container').addClass('error');
      }
      job_city.focus();
      return false;
   } else {
      $("#job_city_error").remove();
      job_city.removeClass('error');
   }
   //Kiem tra nhap nganh nghe
   if (nganh_nghe.val() == null) {
      if ($("#div_nganh_nghe span.select2-container").hasClass("error") == false) {
         $('#div_nganh_nghe span.select2-container').after('<label id="nganh_nghe_error" class="error" for="nganh_nghe">Vui lòng nhập tên việc làm bạn muốn làm</label>');
         $('#div_nganh_nghe span.select2-container').addClass('error');
      }
      nganh_nghe.focus();
      return false;
   } else {
      $("#nganh_nghe_error").remove();
      nganh_nghe.removeClass('error');
   }
   return returnform;
}

//Ham check khi UV submit hoan thanh dang ki ho so
function checkvali_UVHT() {
   var returnform = true;
   var birthday = $("#birthday");
   var gender = $("#gender");
   var lg_honnhan = $("#lg_honnhan");
   var school_name = $("#school_name");
   var rank = $("#rank");
   var exp_years = $("#exp_years");
   var salary = $("#salary");
   var work_option = $("#work_option");
   var cap_bac_mong_muon = $("#cap_bac_mong_muon");
   var muc_tieu_nghe_nghiep = ("input[name='muc_tieu_nghe_nghiep[]']:checked");
   var ki_nang_ban_than = ("input[name='ki_nang_ban_than[]']:checked")

   // alert(birthday.val());
   //Kiểm tra ngày tháng năm sinh
   if (birthday.val().length == 0) {
      if ($("#birthday_error").hasClass("error") == false) {
         birthday.after('<label id="birthday_error" class="error" for="birthday">Vui lòng điền ngày tháng năm sinh</label>');
         birthday.addClass('error');
      }
      birthday.focus();
      returnform = false;
   } else {
      $("#birthday_error").remove();
      birthday.removeClass('error');
   }

   //Kiểm tra đã chọn giới tính hay chưa
   if (gender.val() == 0) {
      if ($("#gender_error").hasClass("error") == false) {
         gender.after('<label id="gender_error" style="padding-left:25%" class="error" for="gender">Vui lòng chọn giới tính</label>');
         gender.addClass('error');
      }
      returnform = false;
   } else {
      $("#gender_error").remove();
      gender.removeClass('error');
   }

   // //Kiểm tra chọn tình trạng hôn nhân
   if (lg_honnhan.val() == 0) {
      if ($("#lg_honnhan_error").hasClass("error") == false) {
         lg_honnhan.after('<label id="lg_honnhan_error" class="error" for="lg_honnhan">Vui lòng chọn tình trạng hôn nhân</label>');
         lg_honnhan.addClass('error');
      }
      lg_honnhan.focus();
      returnform = false;
   } else {
      $("#lg_honnhan_error").remove();
      lg_honnhan.removeClass('error');
   }

   // //Kiểm tra nhập trường học
   if (school_name.val() == '') {
      $("#school_name_error").remove();
      school_name.after('<label id="school_name_error" class="error" for="school_name" style="display: inline-block;">Vui lòng nhập tên trường học.</label>');
      school_name.addClass('error');
      school_name.focus();
      school_name.addClass('valid');
      returnform = false;
   } else {
      $("#school_name_error").remove();
      school_name.removeClass('error');
   }

   //Kiểm tra nhập chọn xếp loại học tập
   if (rank.val() == 0) {
      $("#rank_error").remove();
      rank.after('<label id="rank_error" class="error" for="rank">Vui lòng chọn xếp loại.</label>');
      rank.addClass('error');
      rank.focus();
      rank.addClass('valid');
      returnform = false;
   }


   //Kiểm tra chọn số năm kinh nghiệm
   if (exp_years.val() == null) {
      $("#exp_years_error").remove();
      exp_years.after('<label id="exp_years_error" class="error" for="rank">Vui lòng chọn số năm kinh nghiệm.</label>');
      exp_years.addClass('error');
      exp_years.focus();
      exp_years.addClass('valid');
      returnform = false;
   }

   //Kiểm tra mức lương
   if (salary.val() == 0) {
      $("#salary_error").remove();
      salary.after('<label id="salary_error" class="error" for="salary">Vui lòng chọn mức lương.</label>');
      salary.addClass('error');
      salary.focus();
      salary.addClass('valid');
      returnform = false;
   }


   //Chọn hình thức làm việc
   if (work_option.val() == 0) {
      $("#work_option_error").remove();
      work_option.after('<label id="work_option_error" class="error" for="work_option">Vui lòng chọn hình thức.</label>');
      work_option.addClass('error');
      work_option.focus();
      work_option.addClass('valid');
      returnform = false;
   }

   //Chọn cấp bậc mong muốn
   if (cap_bac_mong_muon.val() == 0) {
      $("#cap_bac_mong_muon_error").remove();
      cap_bac_mong_muon.after('<label id="cap_bac_mong_muon_error" class="error" for="cap_bac_mong_muon">Vui lòng chọn cấp bậc mong muốn.</label>');
      cap_bac_mong_muon.addClass('error');
      cap_bac_mong_muon.focus();
      cap_bac_mong_muon.addClass('valid');
      returnform = false;
   }

   return returnform;
}

//Ham check khi NTD submit form
function checkvali_NTD() {
   var returnform = true;
   var ccemail = $("#user_email_ntd");
   var ccpass = $("#user_password_first");
   var ccrepass = $("#user_password_second");
   var ccnamecom = $("#user_name");
   var cccity = $("#s2id_city");
   var ccphone = $("#user_phone");
   var ccaddress = $("#s2id_autogen1");
   var district = $("#s2id_city_child");
   var address = $("#address");
   var job_name = $("#job_name");
   var job_address = $("#job_address");
   var nganh_nghe = $("#nganh_nghe");


   //Kiểm tra số điện thoại
   if (ccphone.val().length == 0) {
      if ($("#user_phone_error").hasClass("error") == false) {
         ccphone.after('<label id="user_phone_error" class="error" for="user_phone">Vui lòng nhập số điện thoại</label>');
         ccphone.addClass('error');
      }
      ccphone.focus();
      returnform = false;
   } else {
      $("#user_phone_error").remove();
      ccphone.removeClass('error');
   }

   //Kiểm tra đã nhập tên công ty hay chưa
   if (ccnamecom.val().length == 0) {
      if ($("#user_name_error").hasClass("error") == false) {
         ccnamecom.after('<label id="user_name_error" class="error" for="user_name">Vui lòng nhập tên công ty</label>');
         ccnamecom.addClass('error');
      }
      ccnamecom.focus();
      returnform = false;
   } else {
      $("#user_name_error").remove();
      $.ajax({
         async: false,
         type: 'POST',
         url: '../ajax/checktrungNTD.php',
         data: {
            valCompany: ccnamecom.val()
         },
         success: function(data) {
            if (data == 1) {
               returnform = false;
               if ($('#user_name').hasClass('error') == false) {
                  alert('123');
                  ccnamecom.addClass('error');
                  ccnamecom.after("<label id='checktrungNTD_error' class='error'>Tên công ty đã được đăng kí, vui lòng kiểm tra lại</label>");
               }
               ccnamecom.focus();
            } else {
               ccnamecom.removeClass('error');
               $('#checktrungNTD_error').remove();
            }
         }
      });
   }

   //Kiểm tra chọn thành phố
   if (cccity.val() == 0) {
      if ($("#user_company_city_error").hasClass("error") == false) {
         $('.select2-container').after('<label id="user_company_city_error" class="error" for="user_company_city">Vui lòng chọn tỉnh/thành phố</label>');
         $('.select2-container').addClass('error');
      }
      cccity.focus();
      returnform = false;
   } else {
      $("#user_company_city_error").remove();
      $('.select2-container').removeClass('error');
   }

   //Kiểm tra pass nhập lại
   if (ccrepass.val().length > 0) {
      var valPass = $("#user_password_first").val();
      $("#user_password_second_error").remove();
      if (ccrepass.val() != valPass) {
         if ($("#user_password_second_error").hasClass("error") == false) {
            ccrepass.after('<label id="user_password_second_error" class="error" for="user_password_second" style="display: inline-block;">Xác nhận lại mật khẩu mới không trùng khớp.</label>');
            ccrepass.addClass('error');
         }
         ccrepass.addClass('valid');
         ccrepass.focus();
         returnform = false;
      } else {
         $("#user_password_second_error").remove();
         ccrepass.addClass('valid');
         ccrepass.removeClass('error');
      }
   } else {
      $("#user_password_second_error").remove();
      ccrepass.after('<label id="user_password_second_error" class="error" for="user_password_second" style="display: inline-block;">Vui lòng nhập lại mật khẩu.</label>');
      ccrepass.addClass('valid');
      ccrepass.addClass('error');
      ccrepass.focus();
      returnform = false;
   }

   //Kiểm tra nhập mật khẩu
   if (ccpass.val() == '') {
      $("#user_password_first_error").remove();
      ccpass.after('<label id="user_password_first_error" class="error" for="user_password_first" style="display: inline-block;">Vui lòng nhập mật khẩu.</label>');
      ccpass.addClass('error');
      ccpass.focus();
      ccpass.addClass('valid');
      returnform = false;
   } else {
      ccpass.addClass('valid');
      $("#user_password_first_error").remove();
      if (ccpass.val().length < 4) {
         if ($("#user_password_first_error").hasClass("error") == false) {
            ccpass.after('<label id="user_password_first_error" class="error" for="user_password_first" style="display: inline-block;">Mật khẩu phải từ 4-20 ký tự</label>');
            ccpass.addClass('error');
            ccpass.focus();
            returnform = false;
         }
      } else {
         $("#user_password_first_error").remove();
         ccpass.removeClass('error');
      }
   }

   //Kiểm tra tồn tại email đăng nhập 
   if (ccemail.val() == '') {
      $("#user_email_error").remove();
      ccemail.after('<label id="user_email_error" class="error" for="user_email_ntd">Vui lòng nhập địa chỉ email.</label>');
      ccemail.addClass('error');
      $("#user_email_ntd").focus();
      ccemail.addClass('valid');
      returnform = false;
   } else {
      if (ccemail.val().length > 0) {
         if (validateEmail(ccemail.val()) == false) {
            if ($("#user_email_error").hasClass("error") == false) {
               ccemail.after('<label id="user_email_error" class="error" for="user_email_ntd">Địa chỉ email không đúng định dạng.</label>');
               ccemail.focus();
               ccemail.addClass('error');
            }
            returnform = false;
         } else {
            $.ajax({
               type: "POST",
               url: '../ajax/checkmail_ntd.php',
               data: {
                  email_ntd: ccemail.val()
               },
               success: function(data) {
                  if (data == 1) {
                     if ($("#user_email_error").hasClass("error") == false) {
                        ccemail.after('<label id="user_email_error" class="error" for="user_email_ntd">Email đã có người sử dụng.</label>');
                        ccemail.addClass('error');
                     }
                     ccemail.focus();
                     returnform = false;
                  } else {
                     $("#user_email_error").remove();
                     ccemail.removeClass('error');
                  }
               }
            });
         }
         ccemail.addClass('valid');
      }
   }

   //Kiểm tra nhập địa chỉ công ty
   if (ccaddress.val() == '') {
      //edit
      if ($('#s2id_autogen1').hasClass('error') == false) {
         ccaddress.after('<label id="s2id_autogen1_error" class="error" for="address">Vui lòng nhập địa chỉ công ty.</label>');
         ccaddress.addClass('error');
      }
      $('#s2id_autogen1').focus();
      returnform = false;
   } else {
      $('#s2id_autogen1_error').remove();
      $('#s2id_autogen1').removeClass('error');
   }

   return returnform;
}

//Ham check khi NTD submit form dang tin
function valiDangTin() {
   var form = true;
   var vi_tri_tuyen_dung = $('#vi_tri_tuyen_dung');
   var cap_bac = $('#cap_bac');
   var nganh_nghe = $('#nganh_nghe');
   var muc_luong = $('#muc_luong');
   var kinh_nghiem = $('#kinh_nghiem');
   var yeu_cau_bang_cap = $('#yeu_cau_bang_cap');
   var dia_diem_lam_viec = $('#city');
   var sl_ungvien = $('#sl_ungvien');
   var gender = $('#gender_dangtin');
   var mo_ta_cv = $('#mo_ta_cv');
   var yeu_cau_cv = $('#yeu_cau_cv');
   var quyen_loi = $('#quyen_loi');
   var ho_so = $('#ho_so');
   var han_nop = $('#han_nop_ho_so');

   if (vi_tri_tuyen_dung.val().length == 0) {
      if (vi_tri_tuyen_dung.hasClass('error') == false) {
         vi_tri_tuyen_dung.addClass('error');
         vi_tri_tuyen_dung.after("<label style='padding-left:25%' id='vi_tri_tuyen_dung_error' class='error'>Vui lòng nhập vị trí tuyển dụng</label>");
      }
      vi_tri_tuyen_dung.focus();
      form = false;
   } else {
      vi_tri_tuyen_dung.removeClass('error');
      $('#vi_tri_tuyen_dung_error').remove();
   }

   if (cap_bac.val() == 0) {
      if (cap_bac.hasClass('error') == false) {
         cap_bac.addClass('error');
         cap_bac.after("<label style='padding-left:25%' id='cap_bac_error' class='error'>Vui lòng chọn cấp bậc</label>");
      }
      cap_bac.focus();
      form = false;
   } else {
      cap_bac.removeClass('error');
      $('#cap_bac_error').remove();
   }

   if (nganh_nghe.val() == null) {
      if ($('.div_nganh_nghe span.select2-container').hasClass('error') == false) {
         $('.div_nganh_nghe span.select2-container').addClass('error');
         $('.div_nganh_nghe span.select2-container').after("<label style='padding-left:25%' id='nganh_nghe_error' class='error'>Vui lòng ngành nghề</label>");
      }
      form = false;
   } else {
      $('.div_nganh_nghe span.select2-container').removeClass('error');
      $('.div_nganh_nghe span.select2-container').remove();
   }

   if (muc_luong.val() == 0) {
      if (muc_luong.hasClass('error') == false) {
         muc_luong.addClass('error');
         muc_luong.after("<label style='padding-left:25%' id='muc_luong_error' class='error'>Vui lòng chọn mức lương</label>");
      }
      muc_luong.focus();
      form = false;
   } else {
      muc_luong.removeClass('error');
      $('#muc_luong_error').remove();
   }

   if (dia_diem_lam_viec.val() == null) {
      if ($('.div_dia_diem_lv span.select2-container').hasClass('error') == false) {
         $('.div_dia_diem_lv span.select2-container').addClass('error');
         $('.div_dia_diem_lv span.select2-container').after("<label id='city_error' class='error' style='padding-left:25%'>Vui lòng chọn địa điêm làm việc</label>");
      }
      // dia_diem_lam_viec.focus();
      form = false;
   } else {
      $('.div_dia_diem_lv span.select2-container').removeClass('error');
      $('#city_error').remove();
   }

   if (sl_ungvien.val() == 0) {
      if (sl_ungvien.hasClass('error') == false) {
         sl_ungvien.addClass('error');
         sl_ungvien.after("<label id='sl_ungvien_error' class='error' style='padding-left:25%'>Vui lòng nhập số lượng ứng viên</label>");
      }
      sl_ungvien.focus();
      form = false;
   } else {
      sl_ungvien.removeClass('error');
      $('#sl_ungvien_error').remove();
   }

   if (gender.val() == '') {
      if (gender.hasClass('error') == false) {
         gender.addClass('error');
         gender.after("<label style='padding-left:25%' id='gender_error' class='error'>Vui lòng chọn giới tính</label>");
      }
      gender.focus();
      form = false;
   } else {
      gender.removeClass('error');
      $('#gender_error').remove();
   }

   if (mo_ta_cv.val().length == 0) {
      if (mo_ta_cv.hasClass('error') == false) {
         mo_ta_cv.addClass('error');
         mo_ta_cv.after("<label id='mo_ta_cv_error' style='padding-left:25%' class='error'>Vui lòng nhập mô tả công việc</label>");
      }
      // mo_ta_cv.focus();
      form = false;
   } else {
      mo_ta_cv.removeClass('error');
      $('#mo_ta_cv_error').remove();
   }

   if (yeu_cau_cv.val().length == 0) {
      if (yeu_cau_cv.hasClass('error') == false) {
         yeu_cau_cv.addClass('error');
         yeu_cau_cv.after("<label id='yeu_cau_cv_error' style='padding-left:25%' class='error'>Vui lòng nhập yêu cầu công việc</label>");
      }
      yeu_cau_cv.focus();
      form = false;
   } else {
      yeu_cau_cv.removeClass('error');
      $('#yeu_cau_cv_error').remove();
   }


   if (quyen_loi.val().length == 0) {
      if (quyen_loi.hasClass('error') == false) {
         quyen_loi.addClass('error');
         quyen_loi.after("<label style='padding-left:25%' id='quyen_loi_error' class='error'>Vui lòng nhập quyền lợi được hưởng của công việc</label>");
      }
      quyen_loi.focus();
      form = false;
   } else {
      quyen_loi.removeClass('error');
      $('#quyen_loi_error').remove();
   }

   if (han_nop.val() == '') {
      if (han_nop.hasClass('error') == false) {
         han_nop.addClass('error');
         han_nop.after("<label id='han_nop_error' class='error' style='padding-left:25%'>Vui lòng nhập hạn nộp hồ sơ</label>");
      }
      han_nop.focus();
      form = false;
   } else {
      han_nop.removeClass('error');
      $('#han_nop_error').remove();
   }

   return form;
}

//---------------------------------------------------//
function checkvali_CV() {
   var returnform_cv = true;
   var ccemail_cv    = $("#user_email");
   var ccpass_cv     = $("#user_password_first");
   var ccrepass_cv   = $("#user_password_second");
   var ccnamecom_cv  = $("#user_name");
   var cccity_cv     = $("#s2id_city");
   var cccity2_cv    = $('#s2id_city_child');
   var ccphone_cv    = $("#user_phone");
   var ccaddress_cv  = $("#s2id_autogen1");
   var address_uv_cv = $('#address_uv');
   var job_name_cv   = $('#job_name');
   var job_city_cv  = $("#job_address");
   var nganh_nghe_cv = $('#nganh_nghe');

   

   
   /*Kiểm tra đã nhập email đăng nhập hay chưa*/
   if (ccnamecom_cv.val().length == 0) {
      if (ccnamecom_cv.hasClass("error") == false) {
         ccnamecom_cv.after('<label id="user_name_error" class="error" for="user_name">Vui lòng nhập họ và tên</label>');
         ccnamecom_cv.addClass('error');
      }
      ccnamecom_cv.focus();
      returnform_cv = false;
   } else {
      $("#user_name_error").remove();
      ccnamecom_cv.removeClass('error');
   }
   /*Kiểm tra số điện thoại*/
   if (ccphone_cv.val().length == 0) {
      if (ccphone_cv.hasClass("error") == false) {
         ccphone_cv.after('<label id="user_phone_error" class="error" for="user_phone">Vui lòng nhập số điện thoại</label>');
         ccphone_cv.addClass('error');
      }
      ccphone_cv.focus();
      returnform_cv = false;
   } else {
      $("#user_phone_error").remove();
      ccphone_cv.removeClass('error');
   }

   /*Kiểm tra chọn thành phố*/
   if (cccity_cv.val() == 0) {
      if ($('#tp .select2-container').hasClass("error") == false) {
         $('#tp .select2-container').after('<label id="user_company_city_error" class="error" for="s2id_city">Vui lòng chọn tỉnh/thành phố</label>');
         $('#qh .select2-container').after('<label id="user_company_city2_error" class="error" for="s2id_city_child">Vui lòng chọn Quận/huyện</label>');
         $('#tp .select2-container').addClass('error');
         $('#qh .select2-container').addClass('error');
      }
      cccity_cv.focus();
      returnform_cv = false;
   } else {
      $("#user_company_city_error").remove();
      $('#user_company_city2_error').remove();
      $('#tp .select2-container').removeClass('error');
      $('#qh .select2-container').removeClass('error');
   }
   /*Kiểm tra quận huyện*/
   if (cccity2_cv.val() == '') {
      if (cccity2_cv.hasClass('error') == false) {
         $('#s2id_city_child').addClass('error');
         cccity2_cv.after("<label id='cccity2_error' class='error'>Vui lòng chọn Quận/huyện</label>");
      }
      cccity2_cv.focus();
      returnform_cv = false;
   } else {
      cccity2_cv.removeClass('error');
      $('#cccity2_error').remove();
   }
   /*Kiểm tra địa chỉ chi tiết*/
   if (address_uv_cv.val().length == 0) {
      if (address_uv_cv.hasClass("error") == false) {
         address_uv_cv.after('<label id="address_uv_error" class="error" for="address_uv">Vui lòng nhập địa chỉ chi tiết</label>');
         address_uv_cv.addClass('error');
      }
      address_uv_cv.focus();
      returnform_cv = false;
   } else {
      $("#address_uv_error").remove();
      ccphone_cv.removeClass('error');
   }
   /*Kiểm tra tên công việc*/
   if (job_name_cv.val().length == 0) {
      if (job_name_cv.hasClass("error") == false) {
         job_name_cv.after('<label id="job_name_error" class="error" for="job_name">Vui lòng nhập tên công việc bạn muốn làm</label>');
         job_name_cv.addClass('error');
      }
      
      returnform_cv = false;
   } else {
      $("#job_name_error").remove();
      job_name_cv.removeClass('error');
   }

   /*Kiểm tra tỉnh thành phố muốn làm việc*/
   if (job_city_cv.val() == null) {

      if ($('#div_job_address span.select2-container').hasClass("error") == false) {
         $('#div_job_address span.select2-container').after('<label id="job_city_error" class="error" for="job_city">Vui lòng nhập địa điểm bạn muốn làm việc</label>');
         $('#div_job_address span.select2-container').addClass('error');
      }
      job_city_cv.focus();
      returnform_cv = false;
   } else {
      $("#job_city_error").remove();
      job_city_cv.removeClass('error');
   }
   /*Kiem tra nhap nganh nghe*/
   if (nganh_nghe_cv.val() == null) {
      if ($("#div_nganh_nghe span.select2-container").hasClass("error") == false) {
         $('#div_nganh_nghe span.select2-container').after('<label id="nganh_nghe_error" class="error" for="nganh_nghe">Vui lòng nhập ngành nghề bạn muốn làm</label>');
         $('#div_nganh_nghe span.select2-container').addClass('error');
      }
      nganh_nghe_cv.focus();
      returnform_cv = false;
   } else {
      $("#nganh_nghe_error").remove();
      nganh_nghe_cv.removeClass('error');
   }

   /*Kiểm tra pass nhập lại*/
   if (ccrepass_cv.val().length > 0) {
      var valPass = $("#user_password_first").val();
      $("#user_password_second_error").remove();
      if (ccrepass_cv.val() != valPass) {
         if (ccrepass_cv.hasClass("error") == false) {
            ccrepass_cv.after('<label id="user_password_second_error" class="error" for="user_password_second" style="display: inline-block;">Xác nhận lại mật khẩu mới không trùng khớp.</label>');
            ccrepass_cv.addClass('error');
         }
         ccrepass_cv.addClass('valid');
         ccrepass_cv.focus();
         returnform_cv = false;
      } else {
         $("#user_password_second_error").remove();
         ccrepass_cv.addClass('valid');
         ccrepass_cv.removeClass('error');
      }
   } else {
      $("#user_password_second_error").remove();
      ccrepass_cv.after('<label id="user_password_second_error" class="error" for="user_password_second" style="display: inline-block;">Vui lòng nhập lại mật khẩu.</label>');
      ccrepass_cv.addClass('valid');
      ccrepass_cv.addClass('error');
      ccrepass_cv.focus();
      returnform_cv = false;
   }


   /*Kiểm tra nhập mật khẩu*/
   if (ccpass_cv.val() == '') {
      if (ccpass_cv.hasClass('error') == false) {
         ccpass_cv.after('<label id="user_password_first_error" class="error" for="user_password_first" style="display: inline-block;">Vui lòng nhập mật khẩu.</label>');
         ccpass_cv.addClass('error');
      }
      ccpass_cv.focus();
      ccpass_cv.addClass('valid');
      returnform_cv = false;
   } else {
      ccpass_cv.addClass('valid');
      $("#user_password_first_error").remove();
      if (ccpass_cv.val().length < 4) {
         if (ccemail_cv.hasClass("error") == false) {
            ccpass_cv.after('<label id="user_password_first_error" class="error" for="user_password_first" style="display: inline-block;">Mật khẩu phải từ 4-20 ký tự</label>');
            ccpass_cv.addClass('error');
         }
         ccpass_cv.focus();
         returnform_cv = false;
      } else {
         $("#user_password_first_error").remove();
         ccpass_cv.removeClass('error');
      }
   }

   /*Kiểm tra tồn tại email đăng nhập */
   if (ccemail_cv.val() == '') {
      if (ccemail_cv.hasClass('error') == false) {
         ccemail_cv.after('<label id="user_email_error" class="error" for="user_email">Vui lòng nhập địa chỉ email.</label>');
         ccemail_cv.addClass('error');
      }
      ccemail_cv.focus();
      ccemail_cv.addClass('valid');
      returnform_cv = false;
   } 
   if (ccemail_cv.val().length > 0) {
      if (validateEmail(ccemail_cv.val()) == false) {
         if ($(ccemail_cv).hasClass("error") == false) {
            ccemail_cv.after('<label id="user_email_error" class="error" for="user_email">Địa chỉ email không đúng định dạng.</label>');
            ccemail_cv.focus();
            ccemail_cv.addClass('error');
         }
         returnform_cv = false;
      } else {
         $.ajax({
            type: "POST",
            url: '../ajax/checkmail.php',async:false,
            data: {
               email: ccemail_cv.val()
            },
            success: function(data) {
               if (data == 1) {
                  if (ccemail_cv.hasClass("error") == false) {
                     ccemail_cv.after('<label id="user_email_error" class="error" for="user_email">Email đã có người sử dụng.</label>');
                     ccemail_cv.addClass('error');

                  }
                  ccemail_cv.focus();
                  returnform_cv = false;
               } else {
                  $("#user_email_error").remove();
                  ccemail_cv.removeClass('error');
               }
            }
         });
         
      }
      ccemail_cv.addClass('valid');
   }

   if(returnform_cv == true){
      var job_address_cv = '';
      job_city_cv.each(function() {
         job_address_cv = job_address_cv + ',' + $(this).val();
      });
      if (job_address_cv.length > 1) {
         job_address_cv = job_address_cv.substring(1);
      }
      var nganhnghe_cv = '';
      nganh_nghe_cv.each(function() {
         nganhnghe_cv = nganhnghe_cv + ',' + $(this).val();
      });
      if (nganhnghe_cv.length > 1) {
         nganhnghe_cv = nganhnghe_cv.substring(1);
      }
   };
   return returnform_cv;
}