//Hàm check định dạng email

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
                  url: '/ajax/checkmail.php',
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
               url: '/ajax/checkmail.php',
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
   //Kiểm tra trống tên đăng nhập
   $("#user_name").keyup(function() {
      $("#user_name_error").remove();
      var valCompany = $("#user_name");
      if (valCompany.hasClass("valid") == true) {
         if (valCompany.val().length == 0) {
            valCompany.after('<label id="user_name_error" class="error" for="user_name">Vui lòng nhập tên đăng nhập</label>');
            valCompany.addClass('error');
         } else {
            $("#user_name_error").remove();
            valCompany.removeClass('error');
         }
      }
   });
   $("#user_name").blur(function() {
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
   $("#user_phone").change(function() {
      var valPhone = $("#user_phone");
      $("#user_phone_error").remove();
      if (valPhone.hasClass("valid") == true) {
         if (valPhone.val() == '') {
            if ($("#user_phone").hasClass("error") == false) {
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
     if ($(this).val() == 0) {
      if ($('#tp .select2').hasClass('error') == false) {
         $('#tp .select2').addClass('error');
         $('#tp .select2').after("<label id='user_company_city_error' class='error'>Vui lòng chọn tỉnh thành phố</label>");
      }
   } else {
      $('#tp .select2').removeClass('error');
      $('#user_company_city_error').remove();
   }
});

   $("#s2id_city_child").change(function() {
      if ($(this).val() == 0) {
         if ($('.qh .select2').hasClass('error') == false) {
            $('.qh .select2').addClass('error');
            $('.qh .select2').after("<label id='user_company_city2_error' class='error'>Vui lòng chọn quận/huyện</label>");
         }
      } else {
         $('.qh .select2').removeClass('error');
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
      if ($(this).val() == '') {
         if ($('#div_job_address .select2').hasClass('error') == false) {
            $('#div_job_address .select2').addClass('error');
            $('#div_job_address .select2').after('<label id="job_address_error" class="error" for="job_address">Vui lòng chọn nơi bạn muốn làm việc</label>');
         }
      } else {
         $('#div_job_address .select2').removeClass('error');
         $('#job_address_error').remove();
      }
   });

   $("#nganh_nghe").change(function() {
      if ($(this).val() == '') {
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


});
//---------------------------------------------------//
