function show_detailNew(e) {
	if (!$(e).hasClass('active')) {
		$('.list_new_general .bottom').removeClass('hidden');
		$(e).addClass('active');
		$(e).html('<i class="fa fa-angle-up" aria-hidden="true"></i>');
	} else {
		$('.list_new_general .bottom').addClass('hidden');
		$(e).removeClass('active');
		$(e).html('<i class="fa fa-angle-down" aria-hidden="true"></i>');
	}
}
function toggleHandling(e) {
	$(e).parent().find('.sub_handing').toggle();
}
function changeImg(input) {
	//Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		//Sự kiện file đã được load vào website
		reader.onload = function (e) {
			//Thay đổi đường dẫn ảnh
			$('#change_avt_ntd').attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
		$('#submit').click();
	}
}
function vali_dateInterview() {
	var days = $('#interview #days');
	var months = $('#interview #months');
	var years = $('#interview #years');

	if (days.val() == 0) {
		if (days.hasClass('error') == false) {
			days.addClass('error');
			alert("Vui lòng chọn thời gian phỏng vấn");
		}
		days.focus();
		return false;
	} else {
		days.removeClass('error');
	}

	if (months.val() == 0) {
		if (months.hasClass('error') == false) {
			months.addClass('error');
			alert("Vui lòng chọn thời gian phỏng vấn");
		}
		months.focus();
		return false;
	} else {
		months.removeClass('error');
	}

	if (years.val() == 0) {
		if (years.hasClass('error') == false) {
			years.addClass('error');
			alert("Vui lòng chọn thời gian phỏng vấn");
		}
		years.focus();
		return false;
	} else {
		years.removeClass('error');
	}
}
function upLoad(count, index) {

}
$(document).ready(function () {
	$("#btn_edit_tt").on('click', function () {
		$("#tt_email_ntd").addClass('hidden');
		$("#form_edit_tt").removeClass('hidden');
		$('#div_edit_tt').addClass("hidden");
	});

	$("#edit_tt_cancel").on("click", function () {
		$("#form_edit_tt").addClass('hidden');
		$("#tt_email_ntd").removeClass('hidden');
		$("#btn_edit_tt").removeClass("hidden");
		$("#div_edit_tt").removeClass('hidden');
	});

	$("#btn_edit_chutk").on('click', function () {
		$('#form_edit_chutk').removeClass('hidden');
		$("#edit_tt_chutk").addClass('hidden');
		$('#chutk_btn_them').addClass("hidden");
	});

	$("#chutk_cancel").on("click", function () {
		$("#form_edit_chutk").addClass('hidden');
		$("#tt_email_ntd").removeClass('hidden');
		$("#btn_edit_chutk").removeClass("hidden");
		$("#edit_tt_chutk").removeClass('hidden');
		$('#chutk_btn_them').removeClass('hidden');
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

	$("#btn_submit_company").on("click", function () {
		var returnbutton = true;
		var ten_cty = $('#ten_cty').val();
		var quy_mo = $('#quy_mo').val();
		var thue = $('#thue').val();
		var dia_chi_cty = $('#dia_chi_cty').val();
		var thanh_pho_cty = $('#thanh_pho_cty').val();
		var sdt_cty = $("#sdt_cty").val();
		var website = $("#website_cty").val();
		var gt_cty = $("#gt_cty").val();

		if (ten_cty.length == 0) {
			if ($('#ten_cty').hasClass('error') == false) {
				$($('#ten_cty')).addClass('error');
				$($('#ten_cty')).after("<label style='padding-left:25%; text-align: left;margin-bottom:0' id='ten_cty_error' class='error' for='ten_cty'>Vui lòng nhập tên công ty</label>");
			}
			$('#ten_cty').focus();
			returnbutton = false;
		} else {
			$.ajax({
				async: false,
				type: 'POST',
				url: '../ajax/checktrungNTD1.php',
				data: {
					valCompany: $("#ten_cty").val()
				},
				success: function (data) {
					if (data > 0) {
						returnbutton = false;
						if ($('#ten_cty').hasClass('error') == false) {
							$('#ten_cty').addClass('error');
							$('#ten_cty').after("<label id='ten_cty_error' class='error' for='ten_cty' style='padding-left:25%;text-align:left'>Tên công ty đã tồn tại, vui lòng kiểm tra lại</label>");
						}
						$('#ten_cty').focus();
					}
				}
			});
		}

		if (quy_mo == 0) {
			if ($('#quy_mo').hasClass('error') == false) {
				$($('#quy_mo')).addClass('error');
				$($('#quy_mo')).after("<label style='padding-left:25%; text-align: left;margin-bottom:0' id='quy_mo_error' class='error' for='quy_mo'>Vui lòng chọn quy mô</label>");
			}
			returnbutton = false;
		} else {
			$($('#quy_mo')).removeClass('error');
			$("#quy_mo_error").remove();
		}

		if (dia_chi_cty.length == 0) {
			if ($('#dia_chi_cty').hasClass('error') == false) {
				$($('#dia_chi_cty')).addClass('error');
				$($('#dia_chi_cty')).after("<label style='padding-left:25%; text-align: left;margin-bottom:0' id='dia_chi_cty_error' class='error' for='dia_chi_cty'>Vui lòng nhập địa chỉ công ty</label>");
			}
			// $('#dia_chi_cty').focus();
			returnbutton = false;
		} else {
			$($('#dia_chi_cty')).removeClass('error');
			$("#dia_chi_cty_error").remove();
		}

		if (thanh_pho_cty == 0) {
			if ($('#thanh_pho_cty').hasClass('error') == false) {
				$($('#thanh_pho_cty')).addClass('error');
				$($('#thanh_pho_cty')).after("<label style='padding-left:25%; text-align: left' id='thanh_pho_cty_error' class='error' for='thanh_pho_cty'>Vui lòng chọn quy mô</label>");
			}
			returnbutton = false;
		} else {
			$($('#thanh_pho_cty')).removeClass('error');
			$("#thanh_pho_cty_error").remove();
		}

		if (sdt_cty.length == 0) {
			if ($('#sdt_cty').hasClass('error') == false) {
				$($('#sdt_cty')).addClass('error');
				$($('#sdt_cty')).after("<label style='padding-left:25%; text-align: left' id='sdt_cty_error' class='error' for='sdt_cty'>Vui lòng nhập địa chỉ công ty</label>");
			}
			// $('#sdt_cty').focus();
			returnbutton = false;
		} else {
			$($('#sdt_cty')).removeClass('error');
			$("#sdt_cty_error").remove();
		}

		if (returnbutton == true) {
			$.ajax({
				type: "POST",
				url: '../ajax/update_info.php',
				dataType: 'json',
				data: {
					name: ten_cty,
					quymo: quy_mo,
					mst: thue,
					address: dia_chi_cty,
					city: thanh_pho_cty,
					phone: sdt_cty,
					website: website,
					info: gt_cty
				},
				success: function (data) {
					$("#form_edit_company").addClass('hidden');
					$("#edit_tt_company").removeClass('hidden');
					$("#btn_edit_company").removeClass("hidden");
					$("#usc_company_show").html(data.usc_company);
					$("#usc_size_show").html(data.usc_size);
					$("#usc_mst_show").html(data.usc_mst);
					$("#usc_address_show").html(data.usc_address);
					$("#usc_city_show").html(data.usc_city);
					$("#usc_phone_show").html(data.usc_phone);
					if (data.usc_company_info != '')
						$("#usc_website_show").html(data.usc_company_info);
					else
						$("#usc_website_show").html('Chưa cập nhật');
					if (data.usc_company_info != '')
						$("#usc_company_info_show").html(data.usc_company_info);
					else
						$("#usc_company_info_show").html('Chưa cập nhật');
				},
				error: function () {
					alert('loi');
				}
			});
		}
	});

	$("#chutk_submit").on("click", function () {
		var returnBTN = true;
		var name_chutk = $('#name_chutk').val();
		var address_chutk = $("#address_chutk").val();
		var phone_chutk = $("#phone_chutk").val();
		var email_chutk = $("#email_chutk").val();


		if (name_chutk.length == 0) {
			if ($("#name_chutk").hasClass('error') == false) {
				$("#name_chutk").addClass('error');
				$("#name_chutk").after("<label style='padding-left:25%; text-align:left' class='error' id='name_chutk_error' for='name_chutk'>Vui lòng nhập tên liên hệ</label>");
			}
			$('#name_chutk').focus();
			returnBTN = false;
		} else {
			$('#name_chutk').removeClass('error');
			$('#name_chutk_error').remove();
		}

		if (address_chutk.length == 0) {
			if ($("#address_chutk").hasClass('error') == false) {
				$("#address_chutk").addClass('error');
				$("#address_chutk").after("<label style='padding-left:25%; text-align:left' class='error' id='address_chutk_error' for='address_chutk'>Vui lòng nhập tên liên hệ</label>");
			}
			$('#address_chutk').focus();
			returnBTN = false;
		} else {
			$('#address_chutk').removeClass('error');
			$('#naddress_chutk_error').remove();
		}

		if (phone_chutk.length == 0) {
			if ($("#phone_chutk").hasClass('error') == false) {
				$("#phone_chutk").addClass('error');
				$("#phone_chutk").after("<label style='padding-left:25%; text-align:left' class='error' id='phone_chutk_error' for='phone_chutk'>Vui lòng nhập tên liên hệ</label>");
			}
			$('#name_chutk').focus();
			returnBTN = false;
		} else {
			$('#phone_chutk').removeClass('error');
			$('#name_chutk_error').remove();
		}

		if (email_chutk.length == 0) {
			if ($("#email_chutk").hasClass('error') == false) {
				$("#email_chutk").addClass('error');
				$("#email_chutk").after("<label style='padding-left:25%; text-align:left' class='error' id='email_chutk_error' for='email_chutk'>Vui lòng nhập tên liên hệ</label>");
			}
			$('#email_chutk').focus();
			returnBTN = false;
		} else {
			$('#email_chutk').removeClass('error');
			$('#email_chutk_error').remove();
		}

		if (returnBTN == true) {
			$.ajax({
				type: "POST",
				url: "../ajax/update_name_com.php",
				dataType: 'json',
				data: {
					name_us: name_chutk,
					add_us: address_chutk,
					phone_us: phone_chutk,
					email_us: email_chutk
				},
				success: function (data) {
					$("#form_edit_chutk").addClass('hidden');
					$("#tt_email_ntd").removeClass('hidden');
					$("#btn_edit_chutk").removeClass("hidden");
					$("#edit_tt_chutk").removeClass('hidden');
					console.log(data);
					$('#chutk_name_show').html(data.usc_name);
					$("#chutk_add_show").html(data.usc_name_add);
					$("#chutk_phone_show").html(data.usc_name_phone);
					$("#chutk_email_show").html(data.usc_name_email);
				}
			});
		}
	});

	$("#taikhoan_submit").on('click', function () {
		var password_first = $('#password_first').val();
		var password_second = $('#password_second').val();
		if (password_first.length < 4) {
			$($('#password_first')).addClass('error');
			$($('#password_first')).after("<label style='text-align:left; padding-left:25%' id='password_first_error' class='error' for='password_first'>Mật khẩu phải lớn hơn 4 kí tự</label>");
			$($('#password_first')).focus();
			return false;
		} else {
			$(this).removeClass('error');
			$('password_first_error').remove();


			//Check mat khau co trung trong csdl ko
			$.ajax({
				type: "POST",
				url: "../ajax/checkpass_ntd.php",
				data: {
					password: password_first
				},
				success: function (data) {
					if (data != 1) {
						if ($('#password_first').hasClass('error') == false) {
							$($('#password_first')).addClass('error');
							$($('#password_first')).after("<label style='text-align:left; padding-left:25%' id='password_first_error' class='error' for='password_first'>Mật khẩu cũ phải trùng nhau</label>");
							return false;
						} else {
							$($('#password_first')).removeClass('error');
							$("#password_first_error").remove();
						}
					} else {
						if (password_second.length == 0) {
							if ($('#password_second').hasClass('error') == false) {
								$($('#password_second')).addClass('error');
								$($('#password_second')).after("<label style='text-align:left; padding-left:25%' id='password_second_error' class='error' for='password_second'>Vui lòng nhập mật khẩu mới</label>");
								$("#password_second").focus();
								return false;
							}
						} else {
							$($('#password_second')).removeClass('error');
							$($('#password_second_error')).remove();
							$.ajax({
								type: 'POST',
								url: "../ajax/update_doimk.php",
								data: {
									password_first: password_first,
									password_second: password_second
								},
								success: function (data) {
									alert(data);
									$("#form_edit_tt").addClass('hidden');
									$("#tt_email_ntd").removeClass('hidden');
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
				$($("#password_first")).addClass('error');
				$($("#password_first")).after("<label id='password_first_error' class='error' for='password_first' style='padding-left:25%;text-align:left'>Vui lòng nhập mật khẩu hiện tại</label>");
			}
		} else {
			$($("#password_first")).removeClass('error');
			$("#password_first_error").remove();
		}
	});

	$("#password_first").blur(function () {
		if ($("#password_first").val().length == 0) {
			if ($('#password_first').hasClass('error') == false) {
				$($("#password_first")).addClass('error');
				$($("#password_first")).after("<label id='password_first_error' class='error' for='password_first' style='padding-left:25%;text-align:left'>Vui lòng nhập mật khẩu hiện tại</label>");
			} else {
				$($('#password_first')).removeClass('error');
				$("#password_first_error").remove();
			}
		} else {
			$.ajax({
				type: "POST",
				url: "../ajax/checkpass_ntd.php",
				data: {
					password: $("#password_first").val()
				},
				success: function (data) {
					if (data != 1) {
						if ($('#password_first').hasClass('error') == false) {
							$($('#password_first')).addClass('error');
							$($('#password_first')).after("<label style='text-align:left; padding-left:25%' id='password_first_error' class='error' for='password_first'>Mật khẩu cũ phải trùng nhau</label>");

						} else {
							$($('#password_first')).removeClass('error');
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
				$($("#ten_cty")).addClass('error');
				$($("#ten_cty")).after("<label id='ten_cty_error' class='error' for='ten_cty' style='padding-left:25%;text-align:left'>Vui lòng nhập tên công ty</label>");
			}
		} else {
			$($("#ten_cty")).removeClass('error');
			$("#ten_cty_error").remove();
		}
	});

	$("#ten_cty").blur(function () {
		if ($("#ten_cty").val().length == 0) {
			if ($('#ten_cty').hasClass('error') == false) {
				$($("#ten_cty")).addClass('error');
				$($("#ten_cty")).after("<label id='ten_cty_error' class='error' for='ten_cty' style='padding-left:25%;text-align:left'>Vui lòng nhập tên công ty</label>");
			}
		} else {
			$.ajax({
				type: 'POST',
				url: '../ajax/checktrungNTD1.php',
				data: {
					valCompany: $("#ten_cty").val()
				},
				success: function (data) {
					if (data > 0) {
						if ($('#ten_cty').hasClass('error') == false) {
							$('#ten_cty').addClass('error');
							$('#ten_cty').after("<label id='ten_cty_error' class='error' for='ten_cty' style='padding-left:25%;text-align:left'>Tên công ty đã tồn tại, vui lòng kiểm tra lại</label>");
						}
						$('#ten_cty').focus();
					}
				}
			});
		}
	});

	$("#quy_mo").change(function () {
		if ($("#quy_mo").val() == 0) {
			if ($('#quy_mo').hasClass('error') == false) {
				$($('#quy_mo')).addClass('error');
				$($('#quy_mo')).after("<label style='padding-left:25%; text-align: left;margin-bottom:0' id='quy_mo_error' class='error' for='quy_mo'>Vui lòng chọn quy mô</label>");
			}
			returnbutton = false;
		} else {
			$($('#quy_mo')).removeClass('error');
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
	$('.change_avt').click(function () {
		$('.change_avt_inp').click();
	});
	url = window.location.pathname;
	$('.mnu_dm .child,.sb_dm .child').hide();
	$('a[href="' + url + '"]').addClass('active');
	if ($('a[href="' + url + '"]').parent().parent().hasClass('child')) {
		$('a[href="' + url + '"]').parent().parent().show();
		$('a[href="' + url + '"]').parent().parent().prev().addClass('active actived');
	}
	$('.parent_mnu,.sb_dm li .first').click(function () {
		e = $(this);
		t = e.next();
		if (e.hasClass('actived') == false) {
			e.addClass('actived');
			t.show('slow');
		} else {
			e.removeClass('actived');
			t.hide('slow');
		}
	});
	$('.sb_right .fa').click(function () {
		$('.popup_sidebar').addClass('hidden');
	});
	$('#btn-right .fa-bars').click(function () {
		$('.popup_sidebar').removeClass('hidden');
	});
	$('.sent_message .sent').click(function () {
		e = $(this);
		sender = e.attr('data-sent');
		receiver = e.attr('data-receiver');
		id_reply = e.attr('data_id_reply');
		title = $('.sent_message .item input[type="text"]');
		content = $('.sent_message .item textarea');

		if (title.val() == '') {
			if (title.hasClass('error') == false) {
				title.parent().find('label').after('<label class="error tt" id="title_error">Vui lòng nhập tiêu đề</label>');
				title.addClass('error');
			}
			return false;
		} else {
			title.removeClass('error');
			$('#title_error').remove();
		}
		if (content.val() == '') {
			if (content.hasClass('error') == false) {
				content.addClass('error');
				content.parent().find('label').after('<label class="error tt" id="content_error">Vui lòng nhập nội dung tin nhắn</label>');
			}
			return false;
		} else {
			content.removeClass('error');
			$('#content_error').remove();
		}

		$.ajax({
			type: "POST",
			url: "../ajax/sent_message.php",
			data: {
				title: title.val(),
				content: content.val(),
				sender: sender,
				receiver: receiver
			}, success: function (data) {
				if (data == 1) {
					alert("Bạn đã gửi tin nhắn cho ứng viên thành công !!");
					$('.sent_message .cancel').click();
					$('#msg_title').val('');
					$('#msg_content').val('');
				}
			}
		});
	});
	$('.clear_msg .agree').click(function () {
		e = $(this);
		data_id = e.attr('data-id');

		$.ajax({
			type: "POST",
			url: "../ajax/delete_msg.php",
			data: {
				data_id: data_id
			}, success: function (data) {
				if (data == 1) {
					location.reload();
				}
			}
		});
	});
	$('#item_add').click(function () {
		event.preventDefault();
		$('#file_image').click();
	});
	$('#file_image').change(function () {
		var fileList = $('#file_image').prop('files');
		var form_data = "";
		listLength = fileList.length;
		if (listLength <= 6) {
			form_data = new FormData();
			for (var i = 0; i < listLength; i++) {
				if (fileList[i] != undefined) {
					//lấy ra kiểu file
					var type = fileList[i].type;
					//Xét kiểu file được upload
					var match = ["image/gif", "image/png", "image/jpg", "image/jpeg", "image/jfif", "image/PNG"];
					//kiểm tra kiểu file
					if (type == match[0] || type == match[1] || type == match[2] || type == match[3] || type == match[4] || type == match[5]) {
						form_data.append('file_images[]', fileList[i]);
					}
				}
				else console.log('2');
			}
			$.ajax({
				url: '../codelogin/upload_image_company.php',
				type: 'POST',
				data: form_data,
				dataType: 'json',
				contentType: false,
				processData: false,
				success: function (response) {
					$('.add-images .item').remove();
					path = "../pictures/images_company/";
					for (var index = response.files_arr.length - 1; index >= 0; index--) {
						var src = response.files_arr[index];
						$('.add-images').prepend('<div class="item"><img src="/images/load.gif" class="lazyload" data-src="' + path + src + '"></div>');
					}
					alert(response.msg);
				}, error: function (data) {
					console.log(data);
				}
			})
		} else {
			alert('Bạn chỉ có thể tải tối đa 6 ảnh');
		}
		return false;
	});
	$('.stars li').on('mouseover', function () {
		var onStar = parseInt($(this).data('value'), 10);
		$(this).parent().children('li.star').each(function (e) {
			if (e < onStar) {
				$(this).addClass('active');
			} else {
				$(this).removeClass('active');
			}
		});

	}).on('mouseout', function () {
		$(this).parent().children('li.star').each(function (e) {
			$(this).removeClass('active');
		});
	});

	$('.stars li').on('click', function () {
		var onStar = parseInt($(this).data('value'), 10);
		var stars = $(this).parent().children('li.star');
		for (i = 0; i < stars.length; i++) {
			$(stars[i]).removeClass('selected');
		}
		for (i = 0; i < onStar; i++) {
			$(stars[i]).addClass('selected');
		}
	});

	$('#feedback_chuyenvien').click(function () {
		var call = $('.call:checked').val();
		var deportment = $('.deportment:checked').val();
		var candi_support = $('#candi_support').val();
		var rating = parseInt($('#chuyenvien .stars li.selected').last().data('value'), 10);
		var danhgia_chuyenvien = $('#danhgia_chuyenvien').val();

		$.ajax({
			type: "POST",
			url: "../ajax/danhgia_ntd.php",
			data: {
				call: call,
				deportment: deportment,
				candi_support: candi_support,
				rating: rating,
				danhgia_chuyenvien: danhgia_chuyenvien
			},
			success: function (data) {
				alert('Timviec365 xin chân thành cảm ơn đánh giá của bạn!!!');
				location.reload();
			}
		});
	});

	$('#feedback_website').click(function () {
		var from = $('.from:checked').val();
		var bosung = $('#bosung').val();
		var danhgia = $('#danhgia').val();
		var rating = parseInt($('#website .stars li.selected').last().data('value'), 10);

		$.ajax({
			type: "POST",
			url: "../ajax/danhgia_website.php",
			data: {
				from: from,
				bosung: bosung,
				danhgia: danhgia,
				rating: rating
			},
			success: function (data) {
				alert('Timviec365 xin chân thành cảm ơn đánh giá của bạn!!!');
				location.reload();
			}
		});
	});

	$('.main .left .top .avt_com div').click(function () {
		$('#change_avt_ntd').click();
	});

	$('.refresh_new').click(function () {
		id = $(this).attr('data-id');
		if (confirm("Bạn muốn làm mới tin này ???")) {
			$.ajax({
				type: "POST",
				url: "../ajax/new_refresh.php",
				data: {
					idnew: id
				},
				success: function (data) {
					if (data == 1) {
						location.reload();
					} else {
						alert("Mỗi lần làm mới tin tuyển dụng của bạn phải cách nhau 60 phút, timviec365.com hẹn bạn sau 60 phút");
					}
				}
			});
		}
	});
	$('.clear_new').click(function () {
		id = $(this).attr('data-id');
		if (confirm("Bạn có chắc chắn muốn xóa tin này ???")) {
			$.ajax({
				type: "POST",
				url: "../ajax/new_active.php",
				data: {
					idnew: id
				},
				success: function () {
					location.reload();
				}
			});
		}
	});

	$('.main_notify .close').click(function () {
		$('.popup_notify').addClass('hidden');
	});
	$('.fa-noti').click(function () {
		$('.popup_notify').removeClass('hidden');
	});
	$('.itemright').click(function () {
		var idnoti = $(this).attr('data-id');
		$.ajax({
			type: 'POST',
			url: "../ajax/clear_notify.php",
			data: {
				idnoti: idnoti
			},
			success: function (data) {
				$('#noti_' + idnoti).remove();
			}
		});
	});
	$('#clearall-noti').click(function () {
		var idcom = $(this).attr('data-id');

		$.ajax({
			type: 'POST',
			url: "../ajax/clear_notify.php",
			data: {
				idcom: idcom
			},
			success: function (data) {
				$('.item').remove();
			}
		});
	});
});