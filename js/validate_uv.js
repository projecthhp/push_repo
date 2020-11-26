//Hàm check định dạng email
function validateEmail($email) {
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	return emailReg.test($email);
}

function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
	var expires = "expires=" + d.toUTCString();
	document.cookie = cname + "=" + cvalue + "; " + expires;
}
function titleCase(str) {
  return str.toLowerCase().replace(/(^|\s)\S/g, function(l) {
    return l.toUpperCase();
  });
}

function valiLogin_uv() {
	var email = $('#email');
	var password = $('.password');

	if (email.val() == '' || password.val() == '') {
		if($('.tit_login').hasClass('error') == false){
			$('.tit_login').addClass('error');
		}
		$('.alert-danger').html("Vui lòng nhập đầy đủ thông tin đăng nhập !!!");
		return false;
	} else {
		if (validateEmail(email.val()) == false) {
			if($('.tit_login').hasClass('error') == false){
				$('.tit_login').addClass('error');
			}
			$('.alert-danger').html("Định dạng Email không đúng !!!");
			return false;
		}
	}
}

$('.tttk .main_show .edit').click(function() {
	$('.tttk .main_show').addClass('hidden');
	$('.tttk .main_edit').removeClass('hidden');
});

$('.tttk .main_edit .cancel').click(function() {
	$('.tttk .main_edit').addClass('hidden');
	$('.tttk .main_show').removeClass('hidden');
});

$('.form_changepass #password_first').keyup(function() {
	var password_first = $(this);
	if (password_first.val() == '') {
		if (password_first.hasClass('error') == false) {
			password_first.addClass('error');
			password_first.after("<label id='password_first_error' class='error'>Vui lòng nhập mật khẩu hiện tại</label>");
		}
	} else {
		password_first.removeClass('error');
		$('#password_first_error').remove();
	}
});

$('.form_changepass #password_first').blur(function() {
	var password_first = $(this);
	if (password_first.val() == '') {
		if (password_first.hasClass('error') == false) {
			password_first.addClass('error');
			password_first.after("<label id='password_first_error' class='error'>Vui lòng nhập mật khẩu hiện tại</label>");
		}
	} else {
		$.ajax({
			type: "POST",
			url: "../ajax/checkpass_uv.php",
			data: {
				password: password_first.val()
			},
			success: function(data) {
				if (data != 1) {
					if ($('.form_changepass #password_first').hasClass('error') == false) {
						$('.form_changepass #password_first').addClass('error');
						$('.form_changepass #password_first').after("<label id='password_first_error' class='error'>Mật khẩu bạn nhập không đúng</label>");
					}
				} else {
					password_first.removeClass('error');
					$('#password_first_error').remove();
				}
			}
		});
	}
});

$('.form_changepass #password_second').keyup(function() {
	var password_second = $(this);
	if (password_second.val() == '') {
		if (password_second.hasClass('error') == false) {
			password_second.addClass('error');
			password_second.after("<label id='password_second_error' class='error'>Vui lòng nhập mật khẩu mới</label>");
		}
	} else {
		password_second.removeClass('error');
		$('#password_second_error').remove();
		if (password_second.val().length < 6) {
			if (password_second.hasClass('error') == false) {
				password_second.addClass('error');
				password_second.after("<label id='password_second_error' class='error'>Mật khẩu phải từ 6 ký tự trở lên</label>");
			}
		} else {
			password_second.removeClass('error');
			$('#password_second_error').remove();
		}
	}
})

$('.form_changepass #password_second').blur(function() {
	var password_second = $(this);
	if (password_second.val() == '') {
		if (password_second.hasClass('error') == false) {
			password_second.addClass('error');
			password_second.after("<label id='password_second_error' class='error'>Vui lòng nhập mật khẩu mới</label>");
		}
	} else {
		password_second.removeClass('error');
		$('#password_second_error').remove();
		if (password_second.val().length < 6) {
			if (password_second.hasClass('error') == false) {
				password_second.addClass('error');
				password_second.after("<label id='password_second_error' class='error'>Mật khẩu phải từ 6 ký tự trở lên</label>");
			}
		} else {
			password_second.removeClass('error');
			$('#password_second_error').remove();
		}
	}
})

$('.form_changepass #re_password').keyup(function() {
	var re_password = $(this);
	var password_second = $('.form_changepass #password_second');
	if (re_password.val() == '') {
		if (re_password.hasClass('error') == false) {
			re_password.addClass('error');
			re_password.after("<label id='re_password_error' class='error'>Vui lòng xác nhận mật khẩu mới</label>");
		}
	} else {
		re_password.removeClass('error');
		$('#re_password_error').remove();
		if (re_password.val() != password_second.val()) {
			if (re_password.hasClass('error') == false) {
				re_password.addClass('error');
				re_password.after("<label id='re_password_error' class='error'>Mật khẩu xác nhận không trùng khớp</label>");
			}
		} else {
			re_password.removeClass('error');
			$('#re_password_error').remove();
		}
	}
})

$('.form_changepass #re_password').blur(function() {
	var re_password = $(this);
	var password_second = $('.form_changepass #password_second');
	if (re_password.val() == '') {
		if (re_password.hasClass('error') == false) {
			re_password.addClass('error');
			re_password.after("<label id='re_password_error' class='error'>Vui lòng xác nhận mật khẩu mới</label>");
		}
	} else {
		re_password.removeClass('error');
		$('#re_password_error').remove();
		if (re_password.val() != password_second.val()) {
			if (re_password.hasClass('error') == false) {
				re_password.addClass('error');
				re_password.after("<label id='re_password_error' class='error'>Mật khẩu xác nhận không trùng khớp</label>");
			}
		} else {
			re_password.removeClass('error');
			$('#re_password_error').remove();
		}
	}
})


function vali_EditTTTK() {
	var password_first = $('.form_changepass #password_first');
	var password_second = $('.form_changepass #password_second');

	if (password_first.val() == '') {
		if (password_first.hasClass('error') == false) {
			password_first.addClass('error');
			password_first.after("<label id='password_first_error' class='error'>Vui lòng nhập mật khẩu hiện tại</label>");
		}
		password_first.focus();
		return false;
	} else {
		var returnForm = true;
		$.ajax({
			async: false,
			type: "POST",
			url: "../ajax/checkpass_uv.php",
			data: {
				password: password_first.val()
			},
			success: function(data) {
				if (data != 1) {
					returnForm = false;
				} else {
					$('.form_changepass #password_first').removeClass('error');
					$('#password_first_error').remove();
				}
			}
		});
		if (returnForm == false) {
			if ($('.form_changepass #password_first').hasClass('error') == false) {
				$('.form_changepass #password_first').addClass('error');
				$('.form_changepass #password_first').after("<label id='password_first_error' class='error'>Mật khẩu bạn nhập không đúng</label>");
			}
			password_first.focus();
			return false;
		}
	}

	if (password_second.val() == '') {
		if (password_second.hasClass('error') == false) {
			password_second.addClass('error');
			password_second.after("<label id='password_second_error' class='error'>Vui lòng nhập mật khẩu mới</label>");
		}
		password_second.focus();
		return false;
	} else {
		password_second.removeClass('error');
		$('#password_second_error').remove();
		if (password_second.val().length < 6) {
			if (password_second.hasClass('error') == false) {
				password_second.addClass('error');
				password_second.after("<label id='password_second_error' class='error'>Mật khẩu phải từ 6 ký tự trở lên</label>");
			}
			password_second.focus();
			return false;
		} else {
			password_second.removeClass('error');
			$('#password_second_error').remove();
		}
	}
}


$('.ttcn .edit').click(function() {
	$('.ttcn .main_edit').removeClass('hidden');
	$('.ttcn .main_show').addClass('hidden');
});
$('.ttcn .cancel').click(function() {
	$('.ttcn .main_show').removeClass('hidden');
	$('.ttcn .main_edit').addClass('hidden');
});

$('.ttcn .main_edit #hoten').keyup(function() {
	var hoten = $(this);
	if (hoten.val() == '') {
		if (hoten.hasClass('error') == false) {
			hoten.addClass('error');
			hoten.after('<label class="error" id="hoten_error">Vui lòng nhập họ tên</label>');
		}
	} else {
		hoten.removeClass('error');
		$('#hoten_error').remove();
	}
});

$('.ttcn .main_edit #hoten').blur(function() {
	var hoten = $(this);
	if (hoten.val() == '') {
		if (hoten.hasClass('error') == false) {
			hoten.addClass('error');
			hoten.after('<label class="error" id="hoten_error">Vui lòng nhập họ tên</label>');
		}
	} else {
		hoten.removeClass('error');
		$('#hoten_error').remove();
	}
});

$('.ttcn .main_edit #use_phone').keyup(function() {
	var use_phone = $(this);
	if (use_phone.val() == '') {
		if (use_phone.hasClass('error') == false) {
			use_phone.addClass('error');
			use_phone.after('<label class="error" id="use_phone_error">Vui lòng nhập số điện thoại</label>');
		}
	} else {
		use_phone.removeClass('error');
		$('#use_phone_error').remove();
	}
});

$('.ttcn .main_edit #use_phone').blur(function() {
	var use_phone = $(this);
	if (use_phone.val() == '') {
		if (use_phone.hasClass('error') == false) {
			use_phone.addClass('error');
			use_phone.after('<label class="error" id="use_phone_error">Vui lòng nhập số điện thoại</label>');
		}
	} else {
		use_phone.removeClass('error');
		$('#use_phone_error').remove();
	}
});

$('.ttcn .main_edit #address').keyup(function() {
	var address = $(this);
	if (address.val() == '') {
		if (address.hasClass('error') == false) {
			address.addClass('error');
			address.after('<label class="error" id="address_error">Vui lòng nhập địa chỉ hiện tại</label>');
		}
	} else {
		address.removeClass('error');
		$('#address_error').remove();
	}
});

$('.ttcn .main_edit #address').blur(function() {
	var address = $(this);
	if (address.val() == '') {
		if (address.hasClass('error') == false) {
			address.addClass('error');
			address.after('<label class="error" id="v_error">Vui lòng nhập đia chỉ hiện tại</label>');
		}
	} else {
		address.removeClass('error');
		$('#address_error').remove();
	}
});

$('.ttcn .main_edit #birthday').change(function() {
	var birthday = $(this);

	if (birthday.val() == '') {
		if (birthday.hasClass('error') == false) {
			birthday.addClass('error');
			birthday.after("<label id='birthday_error' class='error'>Vui lòng chọn ngày sinh</label>");
		}
	} else {
		birthday.removeClass('error');
		$('#birthday_error').remove();
	}
});

$('.ttcn .main_edit #gender').change(function() {
	var gender = $(this);

	if (gender.val() == 0) {
		if ($('#select2-gender-container').parent().hasClass('error') == false) {
			$('#select2-gender-container').parent().addClass('error');
			gender.parent().append("<label id='gender_error' class='error'>Vui lòng chọn ngày sinh</label>");
		}
	} else {
		$('#select2-gender-container').parent().removeClass('error');
		$('#gender_error').remove();
	}
});

$('.ttcn .main_edit #tinhtranghonnhan').change(function() {
	var tinhtranghonnhan = $(this);

	if (tinhtranghonnhan.val() == 0) {
		if ($('#select2-tinhtranghonnhan-container').parent().hasClass('error') == false) {
			$('#select2-tinhtranghonnhan-container').parent().addClass('error');
			tinhtranghonnhan.parent().append("<label id='tinhtranghonnhan_error' class='error'>Vui lòng chọn tình trạng hôn nhân</label>");
		}
	} else {
		$('#select2-tinhtranghonnhan-container').parent().removeClass('error');
		$('#tinhtranghonnhan_error').remove();
	}
});

function vali_EditTTCN() {
	var hoten = $('.ttcn .main_edit #hoten');
	var use_phone = $('.ttcn .main_edit #use_phone');
	var address = $('.ttcn .main_edit #address');
	var birthday = $('.ttcn .main_edit #birthday');
	var gender = $('.ttcn .main_edit #gender');
	var tinhtranghonnhan = $('.ttcn .main_edit #tinhtranghonnhan');

	if (hoten.val() == '') {
		if (hoten.hasClass('error') == false) {
			hoten.addClass('error');
			hoten.after('<label class="error" id="hoten_error">Vui lòng nhập họ tên</label>');
		}
		hoten.focus();
		return false;
	} else {
		hoten.removeClass('error');
		$('#hoten_error').remove();
	}
	if (use_phone.val() == '') {
		if (use_phone.hasClass('error') == false) {
			use_phone.addClass('error');
			use_phone.after('<label class="error" id="use_phone_error">Vui lòng nhập số điện thoại</label>');
		}
		use_phone.focus();
		return false;
	} else {
		use_phone.removeClass('error');
		$('#use_phone_error').remove();
	}
	if (address.val() == '') {
		if (address.hasClass('error') == false) {
			address.addClass('error');
			address.after('<label class="error" id="address_error">Vui lòng nhập địa chỉ hiện tại</label>');
		}
		address.focus();
		return false;
	} else {
		address.removeClass('error');
		$('#address_error').remove();
	}

	if (birthday.val() == '') {
		if (birthday.hasClass('error') == false) {
			birthday.addClass('error');
			birthday.after("<label id='birthday_error' class='error'>Vui lòng chọn ngày sinh</label>");
		}
		birthday.focus();
		return false;
	} else {
		birthday.removeClass('error');
		$('#birthday_error').remove();
	}

	if (gender.val() == 0) {
		if ($('#select2-gender-container').parent().hasClass('error') == false) {
			$('#select2-gender-container').parent().addClass('error');
			gender.parent().append("<label id='gender_error' class='error'>Vui lòng chọn ngày sinh</label>");
		}
		gender.focus();
		return false;
	} else {
		$('#select2-gender-container').parent().removeClass('error');
		$('#gender_error').remove();
	}

	if (tinhtranghonnhan.val() == 0) {
		if ($('#select2-tinhtranghonnhan-container').parent().hasClass('error') == false) {
			$('#select2-tinhtranghonnhan-container').parent().addClass('error');
			tinhtranghonnhan.parent().append("<label id='tinhtranghonnhan_error' class='error'>Vui lòng chọn tình trạng hôn nhân</label>");
		}
		tinhtranghonnhan.focus();
		return false;
	} else {
		$('#select2-tinhtranghonnhan-container').parent().removeClass('error');
		$('#tinhtranghonnhan_error').remove();
	}
}

$('.cvmm .edit').click(function() {
	$('.cvmm .main_edit').removeClass('hidden');
	$('.cvmm .main_show').addClass('hidden');
});

$('.cvmm .cancel').click(function() {
	$('.cvmm .main_show').removeClass('hidden');
	$('.cvmm .main_edit').addClass('hidden');
});

$('.cvmm .main_edit #cvmm').keyup(function() {
	var cvmm = $(this);

	if (cvmm.val() == '') {
		if (cvmm.hasClass('error') == false) {
			cvmm.addClass('error');
			cvmm.after('<label id="cvmm_error" class="error">Vui lòng nhập công việc mong muốn</label>');
		}
	} else {
		cvmm.removeClass('error');
		$('#cvmm_error').remove();
	}
});

$('.cvmm .main_edit #cvmm').blur(function() {
	var cvmm = $(this);

	if (cvmm.val() == '') {
		if (cvmm.hasClass('error') == false) {
			cvmm.addClass('error');
			cvmm.after('<label id="cvmm_error" class="error">Vui lòng nhập công việc mong muốn</label>');
		}
	} else {
		cvmm.removeClass('error');
		$('#cvmm_error').remove();
	}
});

$('.cvmm .main_edit #hinhthuclamviec').change(function() {
	var hinhthuclamviec = $(this);
	if (hinhthuclamviec.val() == 0) {
		if ($('#select2-hinhthuclamviec-container').parent().hasClass('error') == false) {
			$('#select2-hinhthuclamviec-container').parent().addClass('error');
			hinhthuclamviec.parent().append("<label id='hinhthuclamviec_error' class='error'>Vui lòng chọn hình thức làm việc</label>");
		}
	} else {
		$('#select2-hinhthuclamviec-container').parent().removeClass('error');
		$('#hinhthuclamviec_error').remove();
	}
});

$('.cvmm .main_edit #kinhnghiem').change(function() {
	var kinhnghiem = $(this);
	if (kinhnghiem.val() == 0) {
		if ($('#select2-kinhnghiem-container').parent().hasClass('error') == false) {
			$('#select2-kinhnghiem-container').parent().addClass('error');
			kinhnghiem.parent().append("<label id='kinhnghiem_error' class='error'>Vui lòng chọn kinh nghiệm làm việc</label>");
		}
	} else {
		$('#select2-kinhnghiem-container').parent().removeClass('error');
		$('#kinhnghiem_error').remove();
	}
});

$('.cvmm .main_edit #capbac').change(function() {
	var capbac = $(this);
	if (capbac.val() == 0) {
		if ($('#select2-capbac-container').parent().hasClass('error') == false) {
			$('#select2-capbac-container').parent().addClass('error');
			capbac.parent().append("<label id='capbac_error' class='error'>Vui lòng chọn cấp bậc mong muốn</label>");
		}
	} else {
		$('#select2-capbac-container').parent().removeClass('error');
		$('#kinhnghiem_error').remove();
	}
});

$('.cvmm .main_edit #ddmm').change(function() {
	var ddmm = $(this);
	if (ddmm.val() == '') {
		if ($('#select2-ddmm-container').parent().hasClass('error') == false) {
			$('#select2-ddmm-container').parent().addClass('error');
			ddmm.parent().append("<label id='ddmm_error' class='error'>Vui lòng chọn địa điểm mong muốn</label>");
		}
	} else {
		$('#select2-ddmm-container').parent().removeClass('error');
		$('#ddmm_error').remove();
	}
});

$('.cvmm .main_edit #nnmm').change(function() {
	var nnmm = $(this);
	if (nnmm.val() == '') {
		if ($('#select2-nnmm-container').parent().hasClass('error') == false) {
			$('#select2-nnmm-container').parent().addClass('error');
			nnmm.parent().append("<label id='nnmm_error' class='error'>Vui lòng chọn ngành nghề mong muốn</label>");
		}
	} else {
		$('#select2-nnmm-container').parent().removeClass('error');
		$('#nnmm_error').remove();
	}
});

$('.cvmm .main_edit #ml').change(function() {
	var ml = $(this);
	if (ml.val() == 0) {
		if ($('#select2-ml-container').parent().hasClass('error') == false) {
			$('#select2-ml-container').parent().addClass('error');
			ml.parent().append("<label id='ml_error' class='error'>Vui lòng chọn mức lương mong muốn</label>");
		}
	} else {
		$('#select2-ml-container').parent().removeClass('error');
		$('#ml_error').remove();
	}
});

function vali_EditCVMM() {
	var cvmm = $('.cvmm .main_edit #cvmm');
	var hinhthuclamviec = $('.cvmm .main_edit #hinhthuclamviec');
	var kinhnghiem = $('.cvmm .main_edit #kinhnghiem');
	var capbac = $('.cvmm .main_edit #capbac');
	var ddmm = $('.cvmm .main_edit #ddmm');
	var nnmm = $('.cvmm .main_edit #nnmm');
	var ml = $('.cvmm .main_edit #ml');

	if (cvmm.val() == '') {
		if (cvmm.hasClass('error') == false) {
			cvmm.addClass('error');
			cvmm.after('<label id="cvmm_error" class="error">Vui lòng nhập công việc mong muốn</label>');
		}
		cvmm.focus();
		return false;
	} else {
		cvmm.removeClass('error');
		$('#cvmm_error').remove();
	}

	if (hinhthuclamviec.val() == 0) {
		if ($('#select2-hinhthuclamviec-container').parent().hasClass('error') == false) {
			$('#select2-hinhthuclamviec-container').parent().addClass('error');
			hinhthuclamviec.parent().append("<label id='hinhthuclamviec_error' class='error'>Vui lòng chọn hình thức làm việc</label>");
		}
		hinhthuclamviec.focus();
		return false;
	} else {
		$('#select2-hinhthuclamviec-container').parent().removeClass('error');
		$('#hinhthuclamviec_error').remove();
	}

	if (kinhnghiem.val() == 0) {
		if ($('#select2-kinhnghiem-container').parent().hasClass('error') == false) {
			$('#select2-kinhnghiem-container').parent().addClass('error');
			kinhnghiem.parent().append("<label id='kinhnghiem_error' class='error'>Vui lòng chọn kinh nghiệm làm việc</label>");
		}
		kinhnghiem.focus();
		return false;
	} else {
		$('#select2-kinhnghiem-container').parent().removeClass('error');
		$('#kinhnghiem_error').remove();
	}

	if (capbac.val() == 0) {
		if ($('#select2-capbac-container').parent().hasClass('error') == false) {
			$('#select2-capbac-container').parent().addClass('error');
			capbac.parent().append("<label id='capbac_error' class='error'>Vui lòng chọn cấp bậc mong muốn</label>");
		}
		capbac.focus();
		return false;
	} else {
		$('#select2-capbac-container').parent().removeClass('error');
		$('#kinhnghiem_error').remove();
	}

	if (ddmm.val() == '') {
		if ($('#select2-ddmm-container').parent().hasClass('error') == false) {
			$('#select2-ddmm-container').parent().addClass('error');
			ddmm.parent().append("<label id='ddmm_error' class='error'>Vui lòng chọn địa điểm mong muốn</label>");
		}
		ddmm.focus();
		return false;
	} else {
		$('#select2-ddmm-container').parent().removeClass('error');
		$('#ddmm_error').remove();
	}

	if (nnmm.val() == '') {
		if ($('#select2-nnmm-container').parent().hasClass('error') == false) {
			$('#select2-nnmm-container').parent().addClass('error');
			nnmm.parent().append("<label id='nnmm_error' class='error'>Vui lòng chọn ngành nghề mong muốn</label>");
		}
		nnmm.focus();
		return false;
	} else {
		$('#select2-nnmm-container').parent().removeClass('error');
		$('#nnmm_error').remove();
	}

	if (ml.val() == 0) {
		if ($('#select2-ml-container').parent().hasClass('error') == false) {
			$('#select2-ml-container').parent().addClass('error');
			ml.parent().append("<label id='ml_error' class='error'>Vui lòng chọn mức lương mong muốn</label>");
		}
		ml.focus();
		return false;
	} else {
		$('#select2-ml-container').parent().removeClass('error');
		$('#ml_error').remove();
	}
}

$('.mtnn .edit').click(function() {
	$('.mtnn .main_show').addClass('hidden');
	$('.mtnn .main_edit').removeClass('hidden');
});

$('.mtnn .cancel').click(function() {
	$('.mtnn .main_edit').addClass('hidden');
	$('.mtnn .main_show').removeClass('hidden');
});

$('#txtarea_mtnn').keyup(function() {
	var txtarea_mtnn = $(this);
	if (txtarea_mtnn.val() == '') {
		if (txtarea_mtnn.hasClass('error') == false) {
			txtarea_mtnn.addClass('error');
			txtarea_mtnn.after('<p id="txtarea_mtnn_error" class="error">Vui lòng nhập mục tiêu nghề nghiệp</p>');
		}
	} else {
		txtarea_mtnn.removeClass('error');
		$('#txtarea_mtnn_error').remove();
	}
});

$('#txtarea_mtnn').blur(function() {
	var txtarea_mtnn = $(this);
	if (txtarea_mtnn.val() == '') {
		if (txtarea_mtnn.hasClass('error') == false) {
			txtarea_mtnn.addClass('error');
			txtarea_mtnn.after('<p id="txtarea_mtnn_error" class="error">Vui lòng nhập mục tiêu nghề nghiệp</p>');
		}
	} else {
		txtarea_mtnn.removeClass('error');
		$('#txtarea_mtnn_error').remove();
	}
});

function vali_EditMTNN() {
	var txtarea_mtnn = $('#txtarea_mtnn');
	if (txtarea_mtnn.val() == '') {
		if (txtarea_mtnn.hasClass('error') == false) {
			txtarea_mtnn.addClass('error');
			txtarea_mtnn.after('<p id="txtarea_mtnn_error" class="error">Vui lòng nhập mục tiêu nghề nghiệp</p>');
		}
		txtarea_mtnn.focus();
		return false;
	} else {
		txtarea_mtnn.removeClass('error');
		$('#txtarea_mtnn_error').remove();
	}
}

$('.knbt .edit').click(function() {
	$('.knbt .main_show').addClass('hidden');
	$('.knbt .main_edit').removeClass('hidden');
});

$('.knbt .cancel').click(function() {
	$('.knbt .main_edit').addClass('hidden');
	$('.knbt .main_show').removeClass('hidden');
});

$('#txtarea_knbt').keyup(function() {
	var txtarea_knbt = $(this);
	if (txtarea_knbt.val() == '') {
		if (txtarea_knbt.hasClass('error') == false) {
			txtarea_knbt.addClass('error');
			txtarea_knbt.after('<p id="txtarea_knbt_error" class="error">Vui lòng nhập mục tiêu nghề nghiệp</p>');
		}
	} else {
		txtarea_knbt.removeClass('error');
		$('#txtarea_knbt_error').remove();
	}
});

$('#txtarea_knbt').blur(function() {
	var txtarea_knbt = $(this);
	if (txtarea_knbt.val() == '') {
		if (txtarea_knbt.hasClass('error') == false) {
			txtarea_knbt.addClass('error');
			txtarea_knbt.after('<p id="txtarea_knbt_error" class="error">Vui lòng nhập mục tiêu nghề nghiệp</p>');
		}
	} else {
		txtarea_knbt.removeClass('error');
		$('#txtarea_knbt_error').remove();
	}
});

function vali_EditKNBT() {
	var txtarea_knbt = $('#txtarea_knbt');
	if (txtarea_knbt.val() == '') {
		if (txtarea_knbt.hasClass('error') == false) {
			txtarea_knbt.addClass('error');
			txtarea_knbt.after('<p id="txtarea_knbt_error" class="error">Vui lòng nhập kỹ năng bản thân</p>');
		}
		txtarea_knbt.focus();
		return false;
	} else {
		txtarea_knbt.removeClass('error');
		$('#txtarea_knbt_error').remove();
	}
}


$('.hocvan .add').click(function() {
	$(this).addClass('hidden');
	$('.hocvan .main_show').addClass('hidden');
	$('.hocvan .main_add').removeClass('hidden');
});

$('.hocvan .main_add .cancel').click(function() {
	$('.hocvan .add').removeClass('hidden');
	$('.hocvan .main_add').addClass('hidden');
	$('.hocvan .main_show').removeClass('hidden');
});

$('.txt_bangcap').keyup(function() {
	var bangcap = $(this);
	if (bangcap.val() == '') {
		if (bangcap.hasClass('error') == false) {
			bangcap.addClass('error');
			bangcap.after("<label id='bangcap_error' class='error'>Vui lòng nhập bằng cấp</label>");
		}
	} else {
		bangcap.removeClass('error');
		$('#bangcap_error').remove();
	}
});

$('.txt_bangcap').blur(function() {
	var bangcap = $(this);
	if (bangcap.val() == '') {
		if (bangcap.hasClass('error') == false) {
			bangcap.addClass('error');
			bangcap.after("<label id='bangcap_error' class='error'>Vui lòng nhập bằng cấp</label>");
		}
	} else {
		bangcap.removeClass('error');
		$('#bangcap_error').remove();
	}
});

$('.noidaotao').keyup(function() {
	var noidaotao = $(this);
	if (noidaotao.val() == '') {
		if (noidaotao.hasClass('error') == false) {
			noidaotao.addClass('error');
			noidaotao.after("<label id='noidaotao_error' class='error'>Vui lòng nhập nơi đào tạo</label>");
		}
	} else {
		noidaotao.removeClass('error');
		$('#noidaotao_error').remove();
	}
});

$('.noidaotao').blur(function() {
	var noidaotao = $(this);
	if (noidaotao.val() == '') {
		if (noidaotao.hasClass('error') == false) {
			noidaotao.addClass('error');
			noidaotao.after("<label id='bangcap_error' class='error'>Vui lòng nhập nơi đào tạo</label>");
		}
	} else {
		noidaotao.removeClass('error');
		$('#noidaotao_error').remove();
	}
});

$('.tg_batdau').change(function() {
	var tg_batdau = $(this);
	if (tg_batdau.val() == '') {
		if (tg_batdau.hasClass('error') == false) {
			tg_batdau.addClass('error');
			tg_batdau.after("<label id='tg_batdau_error' class='error'>Vui lòng chọn thời gian bắt đầu</label>");
		}
	} else {
		tg_batdau.removeClass('error');
		$('#tg_batdau_error').remove();
	}
});

$('.tg_ketthuc').change(function() {
	var tg_ketthuc = $(this);
	if (tg_ketthuc.val() == '') {
		if (tg_ketthuc.hasClass('error') == false) {
			tg_ketthuc.addClass('error');
			tg_ketthuc.after("<label id='tg_ketthuc_error' class='error'>Vui lòng chọn thời gian kết thúc</label>");
		}
	} else {
		tg_ketthuc.removeClass('error');
		$('#tg_ketthuc_error').remove();
	}
});

$('.chuyen_nganh').keyup(function() {
	var chuyen_nganh = $(this);
	if (chuyen_nganh.val() == '') {
		if (chuyen_nganh.hasClass('error') == false) {
			chuyen_nganh.addClass('error');
			chuyen_nganh.after("<label id='chuyen_nganh_error' class='error'>Vui lòng nhập chuyên ngành</label>");
		}
	} else {
		chuyen_nganh.removeClass('error');
		$('#chuyen_nganh_error').remove();
	}
});

$('.chuyen_nganh').blur(function() {
	var chuyen_nganh = $(this);
	if (chuyen_nganh.val() == '') {
		if (chuyen_nganh.hasClass('error') == false) {
			chuyen_nganh.addClass('error');
			chuyen_nganh.after("<label id='chuyen_nganh_error' class='error'>Vui lòng nhập chuyên ngành</label>");
		}
	} else {
		chuyen_nganh.removeClass('error');
		$('#chuyen_nganh_error').remove();
	}
});

$('.hocvan .main_add #sl_xeploai').change(function() {
	var xep_loai = $(this);
	if (xep_loai.val() == 0) {
		if ($('#select2-sl_xeploai-container').parent().hasClass('error') == false) {
			$('#select2-sl_xeploai-container').parent().addClass('error');
			xep_loai.parent().append("<label id='xep_loai_error' class='error'>Vui lòng chọn xếp loại</label>");
		}
	} else {
		xep_loai.parent().removeClass('error');
		$('#xep_loai_error').remove();
	}
});

function vali_AddBC() {
	var bangcap = $('.hocvan .main_add .txt_bangcap');
	if (bangcap.val() == '') {
		if (bangcap.hasClass('error') == false) {
			bangcap.addClass('error');
			bangcap.after("<label id='bangcap_error' class='error'>Vui lòng nhập bằng cấp</label>");
		}
		bangcap.focus();
		return false;
	} else {
		bangcap.removeClass('error');
		$('#bangcap_error').remove();
	}

	var noidaotao = $('.hocvan .main_add .noidaotao');
	if (noidaotao.val() == '') {
		if (noidaotao.hasClass('error') == false) {
			noidaotao.addClass('error');
			noidaotao.after("<label id='bangcap_error' class='error'>Vui lòng nhập nơi đào tạo</label>");
		}
		noidaotao.focus();
		return false;
	} else {
		noidaotao.removeClass('error');
		$('#noidaotao_error').remove();
	}

	var tg_batdau = $('.hocvan .main_add .tg_batdau');
	if (tg_batdau.val() == '') {
		if (tg_batdau.hasClass('error') == false) {
			tg_batdau.addClass('error');
			tg_batdau.after("<label id='tg_batdau_error' class='error'>Vui lòng chọn thời gian bắt đầu</label>");
		}
		tg_batdau.focus();
		return false;
	} else {
		tg_batdau.removeClass('error');
		$('#tg_batdau_error').remove();
	}

	var tg_ketthuc = $('.hocvan .main_add .tg_ketthuc');
	if (tg_ketthuc.val() == '') {
		if (tg_ketthuc.hasClass('error') == false) {
			tg_ketthuc.addClass('error');
			tg_ketthuc.after("<label id='tg_ketthuc_error' class='error'>Vui lòng chọn thời gian kết thúc</label>");
		}
		tg_ketthuc.focus();
		return false;
	} else {
		tg_ketthuc.removeClass('error');
		$('#tg_ketthuc_error').remove();
	}

	var chuyen_nganh = $('.hocvan .main_add .chuyen_nganh');
	if (chuyen_nganh.val() == '') {
		if (chuyen_nganh.hasClass('error') == false) {
			chuyen_nganh.addClass('error');
			chuyen_nganh.after("<label id='chuyen_nganh_error' class='error'>Vui lòng nhập chuyên ngành</label>");
		}
		chuyen_nganh.focus();
		return false;
	} else {
		chuyen_nganh.removeClass('error');
		$('#chuyen_nganh_error').remove();
	}

	var xep_loai = $('.hocvan .main_add #sl_xeploai');
	if (xep_loai.val() == 0) {
		if ($('#select2-sl_xeploai-container').parent().hasClass('error') == false) {
			$('#select2-sl_xeploai-container').parent().addClass('error');
			xep_loai.parent().append("<label id='chuyen_nganh_error' class='error'>Vui lòng chọn xếp loại</label>");
		}
		xep_loai.focus();
		return false;
	} else {
		xep_loai.removeClass('error');
		$('#xep_loai_error').remove();
	}
}

$('.hocvan .main_show .span_edit').click(function() {
	var id = $(this).attr('data-id');

	$.ajax({
		type: 'POST',
		url: "../ajax/getHocVan.php",
		data: {
			id: id
		},
		dataType: 'json',
		success: function(data) {
			if (data.result == 1) {
				console.log(data.tg_batdau);
				$('.hocvan .main_edit').removeClass('hidden');
				$('.hocvan .main_show').addClass('hidden');
				$('.hocvan .main_edit #txt_bangcap').val(data.bang_cap);
				$('.hocvan .main_edit #noidaotao').val(data.truong_hoc);
				$('.hocvan .main_edit #tg_batdau').val(data.tg_batdau);
				$('.hocvan .main_edit #tg_ketthuc').val(data.tg_ketthuc);
				$('.hocvan .main_edit #chuyen_nganh').val(data.chuyen_nganh);
				$('.hocvan .main_edit #edit_sl_xeploai').val(data.xep_loai);
				$('.hocvan .main_edit #bc_txt_bosung').val(data.thongtin_bs);
				$('#select2-edit_sl_xeploai-container').html(data.txt_xeploai);
				var action = $('.hocvan .main_edit form').attr('action');
				action = "../codelogin/updateUV_editHV.php?id_bc=" + id;
				$('.hocvan .main_edit form').attr('action', action)
			}
		}
	});
});

function vali_EditBC() {
	var bangcap = $('.hocvan .main_edit .txt_bangcap');
	if (bangcap.val() == '') {
		if (bangcap.hasClass('error') == false) {
			bangcap.addClass('error');
			bangcap.after("<label id='bangcap_error' class='error'>Vui lòng nhập bằng cấp</label>");
		}
		bangcap.focus();
		return false;
	} else {
		bangcap.removeClass('error');
		$('#bangcap_error').remove();
	}

	var noidaotao = $('.hocvan .main_edit .noidaotao');
	if (noidaotao.val() == '') {
		if (noidaotao.hasClass('error') == false) {
			noidaotao.addClass('error');
			noidaotao.after("<label id='bangcap_error' class='error'>Vui lòng nhập nơi đào tạo</label>");
		}
		noidaotao.focus();
		return false;
	} else {
		noidaotao.removeClass('error');
		$('#noidaotao_error').remove();
	}

	var tg_batdau = $('.hocvan .main_edit .tg_batdau');
	if (tg_batdau.val() == '') {
		if (tg_batdau.hasClass('error') == false) {
			tg_batdau.addClass('error');
			tg_batdau.after("<label id='tg_batdau_error' class='error'>Vui lòng chọn thời gian bắt đầu</label>");
		}
		tg_batdau.focus();
		return false;
	} else {
		tg_batdau.removeClass('error');
		$('#tg_batdau_error').remove();
	}

	var tg_ketthuc = $('.hocvan .main_edit .tg_ketthuc');
	if (tg_ketthuc.val() == '') {
		if (tg_ketthuc.hasClass('error') == false) {
			tg_ketthuc.addClass('error');
			tg_ketthuc.after("<label id='tg_ketthuc_error' class='error'>Vui lòng chọn thời gian kết thúc</label>");
		}
		tg_ketthuc.focus();
		return false;
	} else {
		tg_ketthuc.removeClass('error');
		$('#tg_ketthuc_error').remove();
	}

	var chuyen_nganh = $('.hocvan .main_edit .chuyen_nganh');
	if (chuyen_nganh.val() == '') {
		if (chuyen_nganh.hasClass('error') == false) {
			chuyen_nganh.addClass('error');
			chuyen_nganh.after("<label id='chuyen_nganh_error' class='error'>Vui lòng nhập chuyên ngành</label>");
		}
		chuyen_nganh.focus();
		return false;
	} else {
		chuyen_nganh.removeClass('error');
		$('#chuyen_nganh_error').remove();
	}

	var xep_loai = $('.hocvan .main_edit #edit_sl_xeploai');
	if (xep_loai.val() == 0) {
		if ($('#select2-edit_sl_xeploai-container').parent().hasClass('error') == false) {
			$('#select2-edit_sl_xeploai-container').parent().addClass('error');
			xep_loai.parent().append("<label id='chuyen_nganh_error' class='error'>Vui lòng chọn xếp loại</label>");
		}
		xep_loai.focus();
		return false;
	} else {
		xep_loai.removeClass('error');
		$('#xep_loai_error').remove();
	}
}

$('.hocvan .main_show .span_delete').click(function() {
	var id = $(this).attr('data-id');

	$.ajax({
		type: 'POST',
		url: '../ajax/delete_bc.php',
		data: {
			id: id
		},
		success: function(data) {
			if (data == 1) {
				location.reload();
			}
		}
	});
});

$('.hocvan .main_edit .cancel').click(function() {
	$('.hocvan .main_edit').addClass('hidden');
	$('.hocvan .main_show').removeClass('hidden');
});

$('.knlv .add').click(function() {
	$(this).addClass('hidden');
	$('.knlv .main_add').removeClass('hidden');
	$('.knlv .main_show').addClass('hidden');
});

$('.knlv .chucdanh').keyup(function() {
	var chucdanh = $(this);
	if (chucdanh.val() == '') {
		if (chucdanh.hasClass('error') == false) {
			chucdanh.addClass('error');
			chucdanh.after("<label class='error' id='chucdanh_error'>Vui lòng nhập chức danh / vị trí</label>");
		}
	} else {
		chucdanh.removeClass('error');
		$('#chucdanh_error').remove();
	}
});

$('.knlv .chucdanh').blur(function() {
	var chucdanh = $(this);
	if (chucdanh.val() == '') {
		if (chucdanh.hasClass('error') == false) {
			chucdanh.addClass('error');
			chucdanh.after("<label class='error' id='chucdanh_error'>Vui lòng nhập chức danh / vị trí</label>");
		}
	} else {
		chucdanh.removeClass('error');
		$('#chucdanh_error').remove();
	}
});

$('.knlv .congty').keyup(function() {
	var congty = $(this);
	if (congty.val() == '') {
		if (congty.hasClass('error') == false) {
			congty.addClass('error');
			congty.after("<label class='error' id='congty_error'>Vui lòng nhập công ty</label>");
		}
	} else {
		congty.removeClass('error');
		$('#congty_error').remove();
	}
});

$('.knlv .congty').blur(function() {
	var congty = $(this);
	if (congty.val() == '') {
		if (congty.hasClass('error') == false) {
			congty.addClass('error');
			congty.after("<label class='error' id='congty_error'>Vui lòng nhập công ty</label>");
		}
	} else {
		congty.removeClass('error');
		$('#congty_error').remove();
	}
});

function vali_AddKNLV(e) {
	var chucdanh = $(e).find('#use_chucdanh');
	var congty = $(e).find('#use_cty_lamviec');
	var tg_batdau = $(e).find('.tg_batdau');
	var tg_ketthuc = $(e).find('.tg_ketthuc');

	var returnform = true;
	if (!CheckValidate(chucdanh, '', 'chucdanh', 'Vui lòng nhập chức danh / vị trí !!!')) {
		returnform = false;
	}
	if (!CheckValidate(congty, '', 'congty', 'Vui lòng nhập tên công ty !!!')) {
		returnform = false;
	}
	if (!CheckValidate(tg_batdau, '', 'tg_batdau', 'Vui lòng nhập Thời gian bắt đầu !!!')) {
		returnform = false;
	}
	if (!CheckValidate(tg_ketthuc, '', 'tg_ketthuc', 'Vui lòng nhập Thời gian kết thúc !!!')) {
		returnform = false;
	}
	return returnform;
}

$('.knlv .span_edit').click(function() {
	var id = $(this).attr('data-id');

	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: '../ajax/getKN.php',
		data: {
			id: id
		},
		success: function(data) {
			$('.knlv .main_show').addClass('hidden');
			$('.knlv .add').addClass('hidden');
			$('.knlv .main_edit').removeClass('hidden');
			$('.knlv .main_edit #chucdanh').val(data.use_chucdanh);
			$('.knlv .main_edit #congty').val(data.use_cty_lamviec);
			$('.knlv .main_edit #tgbatdau').val(data.tg_batdau);
			$('.knlv .main_edit #tgketthuc').val(data.tg_ketthuc);
			$('.knlv .main_edit #ttbs').val(data.thongtin_bosung);
			var action = $('.knlv .main_edit form').attr('action');
			action = "../codelogin/updateUV_editknlv.php?id_kn=" + id;
			$('.knlv .main_edit form').attr('action', action)
		}
	});
});

function vali_EditKNLV(e) {
	var chucdanh = $(e).find('.chucdanh');
	var congty = $(e).find('.congty');
	var tg_batdau = $(e).find('.tg_batdau');
	var tg_ketthuc = $(e).find('.tg_ketthuc');

	var returnform = true;
	if (!CheckValidate($(e).find('.bang_cap_edit'), '', 'bang_cap_edit', 'Vui lòng nhập tên bằng cấp !!!')) {
		returnform = false;
	}
	if (!CheckValidate($(e).find('.truong_hoc_edit'), '', 'truong_hoc_edit', 'Vui lòng nhập nơi đào tạo !!!')) {
		returnform = false;
	}
	if (!CheckValidate($(e).find('.tg_batdau_edit'), '', 'tg_batdau_edit', 'Vui lòng nhập Thời gian bắt đầu !!!')) {
		returnform = false;
	}
	if (!CheckValidate($(e).find('.tg_ketthuc_edit'), '', 'tg_ketthuc_edit', 'Vui lòng nhập Thời gian kết thúc !!!')) {
		returnform = false;
	}
	if (!CheckValidate($(e).find('.bc_chuyennganh_edit'), '', 'bc_chuyennganh_edit', 'Vui lòng nhập chuyên ngành đào tạo !!!')) {
		returnform = false;
	}
	if (!CheckValidate($(e).find('.bc_xeploai_edit'), 0, 'bc_xeploai_edit', 'Vui lòng chọn Xếp loại !!!')) {
		returnform = false;
	}
	return returnform;
}

$('.knlv .span_delete').click(function() {
	var id = $(this).attr('data-id');
	$.ajax({
		type: "POST",
		url: "../ajax/delete_kn.php",
		data: {
			id: id
		},
		success: function(data) {
			if (data == 1) {
				location.reload();
			}
		}
	});
});

$('.knlv .main_edit .cancel').click(function() {
	$('.knlv .add').removeClass('hidden');
	$('.knlv .main_show').removeClass('hidden');
	$('.knlv .main_add').addClass('hidden');
});

$('.knlv .main_add .cancel').click(function() {
	$('.knlv .add').removeClass('hidden');
	$('.knlv .main_show').removeClass('hidden');
	$('.knlv .main_add').addClass('hidden');
});

$('.ngoaingu .add').click(function() {
	$(this).addClass('hidden');
	$('.ngoaingu .main_add').removeClass('hidden');
	$('.ngoaingu .main_show').addClass('hidden');
});

$('.ngoaingu .main_add .cancel').click(function() {
	$('.ngoaingu .add').removeClass('hidden');
	$('.ngoaingu .main_show').removeClass('hidden');
	$('.ngoaingu .main_add').addClass('hidden');
});

$('.ngoaingu .ngonngu').change(function() {
	var ngonngu = $(this);

	if (ngonngu.val() == 0) {
		if ($('#select2-add_nn-container').parent().hasClass('error') == false) {
			$('#select2-add_nn-container').parent().addClass('error');
			ngonngu.parent().append("<label id='ngonngu_error' class='error'>Vui lòng chọn ngôn ngữ</label>");
		}
	} else {
		$('#select2-add_nn-container').parent().removeClass('error');
		$('#ngonngu_error').remove();
	}
});

$('.ngoaingu .chungchi').keyup(function() {
	var chungchi = $(this);

	if (chungchi.val() == '') {
		if (chungchi.hasClass('error') == false) {
			chungchi.addClass('error');
			chungchi.after("<label id='chungchi_error' class='error'>Vui lòng nhập chứng chỉ</label>");
		}
	} else {
		chungchi.removeClass('error');
		$('#chungchi_error').remove();
	}
});

$('.ngoaingu .chungchi').blur(function() {
	var chungchi = $(this);

	if (chungchi.val() == '') {
		if (chungchi.hasClass('error') == false) {
			chungchi.addClass('error');
			chungchi.after("<label id='chungchi_error' class='error'>Vui lòng nhập chứng chỉ</label>");
		}
	} else {
		chungchi.removeClass('error');
		$('#chungchi_error').remove();
	}
});

$('.ngoaingu .ketqua_nn').keyup(function() {
	var ketqua_nn = $(this);

	if (ketqua_nn.val() == '') {
		if (ketqua_nn.hasClass('error') == false) {
			ketqua_nn.addClass('error');
			ketqua_nn.after("<label id='ketqua_nn_error' class='error'>Vui lòng nhập kết quả</label>");
		}
	} else {
		ketqua_nn.removeClass('error');
		$('#ketqua_nn_error').remove();
	}
});

$('.ngoaingu .ketqua_nn').blur(function() {
	var ketqua_nn = $(this);

	if (ketqua_nn.val() == '') {
		if (ketqua_nn.hasClass('error') == false) {
			ketqua_nn.addClass('error');
			ketqua_nn.after("<label id='ketqua_nn_error' class='error'>Vui lòng nhập kết quả</label>");
		}
	} else {
		ketqua_nn.removeClass('error');
		$('#ketqua_nn_error').remove();
	}
});

function vali_addNN(e) {
	var ngonngu = $(e).find('.ngonngu');
	var chungchi = $(e).find('.chungchi');
	var ketqua_nn = $(e).find('.ketqua_nn');

	var returnform = true;
	if (!CheckValidate(ngonngu, 0, 'ngonngu', 'Vui lòng chọn ngôn ngữ !!!')) {
		returnform = false;
	}
	if (!CheckValidate(chungchi, '', 'chungchi', 'Vui lòng nhập chứng chỉ !!!')) {
		returnform = false;
	}
	if (!CheckValidate(ketqua_nn, '', 'ketqua_nn', 'Vui lòng nhập kết quả !!!')) {
		returnform = false;
	}
	return returnform;
}

$('.ngoaingu .span_edit').click(function() {
	var id = $(this).attr('data-id');

	$.ajax({
		type: "POST",
		url: "../ajax/getNN.php",
		dataType: "json",
		data: {
			id: id
		},
		success: function(data) {
			$('.ngoaingu .main_edit').removeClass('hidden');
			$('.ngoaingu .main_show').addClass('hidden');
			$('.ngoaingu .add').addClass('hidden');
			$('.ngoaingu .main_edit #edit_nn').val(data.id_ngonngu);
			$('.ngoaingu #select2-edit_nn-container').html(data.ngonngu);
			$('.ngoaingu .main_edit .chungchi').val(data.chung_chi);
			$('.ngoaingu .main_edit .ketqua_nn').val(data.ket_qua);
			var action = $('.knlv .main_edit form').attr('action');
			action = "../codelogin/updateUV_editnn.php?id=" + id;
			$('.ngoaingu .main_edit form').attr('action', action)
		}
	});
});

function vali_editNN(e) {

	var ngonngu = $(e).find('.ngonngu');
	var chungchi = $(e).find('.chungchi');
	var ketqua_nn = $(e).find('.ketqua_nn');

	var returnform = true;
	if (!CheckValidate(ngonngu, 0, 'ngonngu', 'Vui lòng chọn ngôn ngữ !!!')) {
		returnform = false;
	}
	if (!CheckValidate(chungchi, '', 'chungchi', 'Vui lòng nhập chứng chỉ !!!')) {
		returnform = false;
	}
	if (!CheckValidate(ketqua_nn, '', 'ketqua_nn', 'Vui lòng nhập kết quả !!!')) {
		returnform = false;
	}
	return returnform;
}

$('.ngoaingu .span_edit').click(function() {
	$('.ngoaingu .add').addClass('hidden');
	$('.ngoaingu .main_show').removeClass('hidden');
	$('.ngoaingu .main_edit').addClass('hidden');
});

$('.ngoaingu .cancel').click(function() {
	$('.ngoaingu .add').removeClass('hidden');
	$('.ngoaingu .main_show').removeClass('hidden');
	$('.ngoaingu .main_edit').addClass('hidden');
});

$('.thamchieu .edit').click(function() {
	$('.thamchieu .main_show').addClass('hidden');
	$('.thamchieu .main_edit').removeClass('hidden');
});

$('#hoten_thamchieu').keyup(function() {
	var hoten_thamchieu = $(this);
	if (hoten_thamchieu.val() == '') {
		if (hoten_thamchieu.hasClass('error') == false) {
			hoten_thamchieu.addClass('error');
			hoten_thamchieu.after("<label id='hoten_thamchieu_error' class='error'>Vui lòng nhập họ tên</label>");
		}
	} else {
		hoten_thamchieu.removeClass('error');
		$('#hoten_thamchieu_error').remove();
	}
});

$('#hoten_thamchieu').blur(function() {
	var hoten_thamchieu = $(this);
	if (hoten_thamchieu.val() == '') {
		if (hoten_thamchieu.hasClass('error') == false) {
			hoten_thamchieu.addClass('error');
			hoten_thamchieu.after("<label id='hoten_thamchieu_error' class='error'>Vui lòng nhập họ tên</label>");
		}
	} else {
		hoten_thamchieu.removeClass('error');
		$('#hoten_thamchieu_error').remove();
	}
});

$('#sdt_thamchieu').keyup(function() {
	var sdt_thamchieu = $(this);
	if (sdt_thamchieu.val() == '') {
		if (sdt_thamchieu.hasClass('error') == false) {
			sdt_thamchieu.addClass('error');
			sdt_thamchieu.after("<label id='sdt_thamchieu_error' class='error'>Vui lòng nhập số điện thoại</label>");
		}
	} else {
		sdt_thamchieu.removeClass('error');
		$('#sdt_thamchieu_error').remove();
	}
});

$('#sdt_thamchieu').blur(function() {
	var sdt_thamchieu = $(this);
	if (sdt_thamchieu.val() == '') {
		if (sdt_thamchieu.hasClass('error') == false) {
			sdt_thamchieu.addClass('error');
			sdt_thamchieu.after("<label id='sdt_thamchieu_error' class='error'>Vui lòng nhập số điện thoại</label>");
		}
	} else {
		sdt_thamchieu.removeClass('error');
		$('#sdt_thamchieu_error').remove();
	}
});

$('#chucvu_thamchieu').keyup(function() {
	var chucvu_thamchieu = $(this);
	if (chucvu_thamchieu.val() == '') {
		if (chucvu_thamchieu.hasClass('error') == false) {
			chucvu_thamchieu.addClass('error');
			chucvu_thamchieu.after("<label id='chucvu_thamchieu_error' class='error'>Vui lòng nhập chức vụ</label>");
		}
	} else {
		chucvu_thamchieu.removeClass('error');
		$('#chucvu_thamchieu_error').remove();
	}
});

$('#chucvu_thamchieu').blur(function() {
	var chucvu_thamchieu = $(this);
	if (chucvu_thamchieu.val() == '') {
		if (chucvu_thamchieu.hasClass('error') == false) {
			chucvu_thamchieu.addClass('error');
			chucvu_thamchieu.after("<label id='chucvu_thamchieu_error' class='error'>Vui lòng nhập chức vụ</label>");
		}
	} else {
		chucvu_thamchieu.removeClass('error');
		$('#chucvu_thamchieu_error').remove();
	}
});

$('#tt_thamchieu').change(function() {
	var tt_thamchieu = $(this);
	if (tt_thamchieu.val() == 0) {
		if ($('#select2-tt_thamchieu-container').parent().hasClass('error') == false) {
			$('#select2-tt_thamchieu-container').parent().addClass('error');
			tt_thamchieu.parent().append('<label class="error" id="tt_thamchieu_error">Vui lòng chọn tỉnh thành</label>');
		}
	} else {
		$('#select2-tt_thamchieu-container').parent().removeClass('error');
		$('#tt_thamchieu_error').remove();
	}
});

$('.form_candi .ho_ten').keyup(function(){
	hoten = $(this);
	hoten.val(titleCase(hoten.val()));
});

function vali_EditThamChieu(e) {
	var ho_ten = $(e).find('.ho_ten');
	var sdt = $(e).find('.sdt');
	var chuc_vu = $(e).find('.chuc_vu');
	var tinh_thanh = $(e).find('.tinh_thanh');

	var returnform = true;
	if (!CheckValidate(ho_ten, 0, 'ho_ten', 'Vui lòng nhập họ tên !!!')) {
		returnform = false;
	}
	if (!CheckValidate(sdt, '', 'sdt', 'Vui lòng SĐT liên hệ !!!')) {
		returnform = false;
	}
	if (!CheckValidate(chuc_vu, '', 'chuc_vu', 'Vui lòng nhập chức vụ !!!')) {
		returnform = false;
	}
	if (!CheckValidate(tinh_thanh, 0, 'tinh_thanh', 'Vui lòng chọn tỉnh thành !!!')) {
		returnform = false;
	}
	return returnform;
}

$('.register #password').keyup(function() {
	var password = $(this);
	if (password.val() == '') {
		if (password.hasClass('error') == false) {
			password.addClass('error');
			password.after("<label id='password_error' class='error'>Vui lòng nhập mật khẩu</label>");
		}
	} else {
		password.removeClass('error');
		$('#password_error').remove();
		if (password.val().length < 6) {
			if (password.hasClass('error') == false) {
				password.addClass('error');
				password.after("<label id='password_error' class='error'>Mật khẩu phải lớn hơn 6 ký tự</label>");
			}
		} else {
			password.removeClass('error');
			$('#password_error').remove();
		}
	}
});

$('.register #password').blur(function() {
	var password = $(this);
	if (password.val() == '') {
		if (password.hasClass('error') == false) {
			password.addClass('error');
			password.after("<label id='password_error' class='error'>Vui lòng nhập mật khẩu</label>");
		}
	} else {
		password.removeClass('error');
		$('#password_error').remove();
		if (password.val().length < 6) {
			if (password.hasClass('error') == false) {
				password.addClass('error');
				password.after("<label id='password_error' class='error'>Mật khẩu phải lớn hơn 6 ký tự</label>");
			}
		} else {
			password.removeClass('error');
			$('#password_error').remove();
		}
	}
});

$('.register #re_password').keyup(function() {
	var re_password = $(this);
	var password = $('.register #password');
	if (re_password.val() == '') {
		if (re_password.hasClass('error') == false) {
			re_password.addClass('error');
			re_password.after("<label id='re_password_error' class='error'>Vui lòng nhập lại mật khẩu</label>");
		}
	} else {
		re_password.removeClass('error');
		$('#re_password_error').remove();
		if (re_password.val().length < 6) {
			if (re_password.hasClass('error') == false) {
				re_password.addClass('error');
				re_password.after("<label id='re_password_error' class='error'>Mật khẩu phải lớn hơn 6 ký tự</label>");
			}
		} else {
			re_password.removeClass('error');
			$('#re_password_error').remove();
			if (re_password.val() != password.val()) {
				if (re_password.hasClass('error') == false) {
					re_password.addClass('error');
					re_password.after("<label id='re_password_error' class='error'>Mật khẩu nhập lại không trùng khớp</label>");
				}
			} else {
				re_password.removeClass('error');
				$('#re_password_error').remove();
			}
		}
	}
});

$('.register #re_password').blur(function() {
	var re_password = $(this);
	var password = $('.register #password');
	if (re_password.val() == '') {
		if (re_password.hasClass('error') == false) {
			re_password.addClass('error');
			re_password.after("<label id='re_password_error' class='error'>Vui lòng nhập lại mật khẩu</label>");
		}
	} else {
		re_password.removeClass('error');
		$('#re_password_error').remove();
		if (re_password.val().length < 6) {
			if (re_password.hasClass('error') == false) {
				re_password.addClass('error');
				re_password.after("<label id='re_password_error' class='error'>Mật khẩu phải lớn hơn 6 ký tự</label>");
			}
		} else {
			re_password.removeClass('error');
			$('#re_password_error').remove();
			if (re_password.val() != password.val()) {
				if (re_password.hasClass('error') == false) {
					re_password.addClass('error');
					re_password.after("<label id='re_password_error' class='error'>Mật khẩu nhập lại không trùng khớp</label>");
				}
			} else {
				re_password.removeClass('error');
				$('#re_password_error').remove();
			}
		}
	}
});

$('.register #full_name').keyup(function() {
	var full_name = $(this);
	if (full_name.val() == '') {
		if (full_name.hasClass('error') == false) {
			full_name.addClass('error');
			full_name.after("<label id='full_name_error' class='error'>Vui lòng nhập họ và tên</label>");
		}
	} else {
		full_name.removeClass('error');
		$('#full_name_error').remove();
		full_name.val(titleCase(full_name.val()));
	}
});

$('.register #full_name').blur(function() {
	var full_name = $(this);
	if (full_name.val() == '') {
		if (full_name.hasClass('error') == false) {
			full_name.addClass('error');
			full_name.after("<label id='full_name_error' class='error'>Vui lòng nhập họ và tên</label>");
		}
	} else {
		full_name.removeClass('error');
		$('#full_name_error').remove();
	}
});

$('.register #uv_phone').keyup(function() {
	var uv_phone = $(this);
	if (uv_phone.val() == '') {
		if (uv_phone.hasClass('error') == false) {
			uv_phone.addClass('error');
			uv_phone.after("<label id='uv_phone_error' class='error'>Vui lòng nhập số điện thoại</label>");
		}
	} else {
		uv_phone.removeClass('error');
		$('#uv_phone_error').remove();
	}
});

$('.register #uv_phone').blur(function() {
	var uv_phone = $(this);
	if (uv_phone.val() == '') {
		if (uv_phone.hasClass('error') == false) {
			uv_phone.addClass('error');
			uv_phone.after("<label id='uv_phone_error' class='error'>Vui lòng nhập số điện thoại</label>");
		}
	} else {
		uv_phone.removeClass('error');
		$('#uv_phone_error').remove();
		pattern = /^[0-9]{10}$/;
		if (!pattern.test(uv_phone.val())) {
			if (uv_phone.hasClass('error') == false) {
				uv_phone.addClass('error');
				uv_phone.after("<label id='uv_phone_error' class='error'>SĐT bạn nhập không hợp lệ</label>");
			}
		} else {
			uv_phone.removeClass('error');
			$('#uv_phone_error').remove();
		}
	}
});

$('.register #frm_address').keyup(function() {
	var frm_address = $(this);
	if (frm_address.val() == '') {
		if (frm_address.hasClass('error') == false) {
			frm_address.addClass('error');
			frm_address.after("<label id='frm_address_error' class='error'>Vui lòng nhập địa chỉ của bạn</label>");
		}
	} else {
		frm_address.removeClass('error');
		$('#frm_address_error').remove();
	}
});

$('.register #frm_address').blur(function() {
	var frm_address = $(this);
	if (frm_address.val() == '') {
		if (frm_address.hasClass('error') == false) {
			frm_address.addClass('error');
			frm_address.after("<label id='frm_address_error' class='error'>Vui lòng nhập địa chỉ của bạn</label>");
		}
	} else {
		frm_address.removeClass('error');
		$('#frm_address_error').remove();
	}
});

$('.register #city').change(function() {
	var city = $(this);
	if (city.val() == 0) {
		if ($('#select2-city-container').parent().hasClass('error') == false) {
			$('#select2-city-container').parent().addClass('error');
			$('#select2-city-container').parent().after("<label id='city_error' class='error'>Vui lòng chọn tỉnh thành</label>");
		}
	} else {
		$('#select2-city-container').parent().removeClass('error');
		$('#city_error').remove();
	}
	$.ajax({
		type: "POST",
		url: "../ajax/get_quanhuyen.php",
		data: {
			id: city.val()
		},
		success: function(data) {
			$("#qh").html(data);
		}
	});
});

$('.register #qh').change(function() {
	var qh = $(this);
	if (qh.val() == 0) {
		if ($('#select2-qh-container').parent().hasClass('error') == false) {
			$('#select2-qh-container').parent().addClass('error');
			$('#select2-qh-container').parent().after("<label id='qh_error' class='error'>Vui lòng chọn quận huyện</label>");
		}
	} else {
		$('#select2-qh-container').parent().removeClass('error');
		$('#qh_error').remove();
	}
});

$('.register #frm_jobuv').keyup(function() {
	var frm_jobuv = $(this);
	if (frm_jobuv.val() == '') {
		if (frm_jobuv.hasClass('error') == false) {
			frm_jobuv.addClass('error');
			frm_jobuv.after("<label id='frm_jobuv_error' class='error'>Vui lòng nhập công việc bạn muốn làm</label>");
		}
	} else {
		frm_jobuv.removeClass('error');
		$('#frm_jobuv_error').remove();
	}
});

$('.register #frm_jobuv').blur(function() {
	var frm_jobuv = $(this);
	if (frm_jobuv.val() == '') {
		if (frm_jobuv.hasClass('error') == false) {
			frm_jobuv.addClass('error');
			frm_jobuv.after("<label id='frm_jobuv_error' class='error'>Vui lòng nhập công việc bạn muốn làm</label>");
		}
	} else {
		frm_jobuv.removeClass('error');
		$('#frm_jobuv_error').remove();
	}
});

$('.register #uv_tt').change(function() {
	var uv_tt = $(this);
	if (uv_tt.val() == '') {
		if (uv_tt.parent().hasClass('error') == false) {
			uv_tt.parent().addClass('error');
			uv_tt.parent().append("<label id='uv_tt_error' class='error'>Vui lòng chọn tỉnh bạn muốn làm việc</label>");
		}
	} else {
		uv_tt.parent().removeClass('error');
		$('#uv_tt_error').remove();
	}
});

$('.register #uv_nn').change(function() {
	var uv_nn = $(this);
	if (uv_nn.val() == '') {
		if (uv_nn.parent().hasClass('error') == false) {
			uv_nn.parent().addClass('error');
			uv_nn.parent().append("<label id='uv_nn_error' class='error'>Vui lòng chọn ngành nghề bạn muốn làm việc</label>");
		}
	} else {
		uv_nn.parent().removeClass('error');
		$('#uv_nn_error').remove();
	}
});

$('#submit_b1').click(function() {
	var form_data = new FormData();

	var email = $('#email');
	if (email.val().length == 0) {
		if (email.hasClass('error') == false) {
			email.addClass('error');
			email.after("<label id='email_lg_error' class='error'>Vui lòng nhập Email</label>");
		}
		email.focus();
		return false;
	} else {
		email.removeClass("error");
		$('#email_lg_error').remove();
		if (validateEmail(email.val()) == false) {
			if (email.hasClass('error') == false) {
				email.addClass('error');
				email.after("<label id='email_lg_error' class='error'>Định dạng Email không đúng</label>");
			}
			email.focus();
			return false;
		} else {
			email.removeClass("error");
			$('#email_lg_error').remove();
			var check = true;
			$.ajax({
				type: 'POST',
				url: "../ajax/checkmail.php",
				async: false,
				data: {
					email: email.val()
				},
				success: function(data) {
					if (data == 1) {
						check = false;
					}
				}
			});
			if (check == false) {
				if (email.hasClass('error') == false) {
					email.addClass('error');
					email.after("<label id='email_lg_error' class='error'>Tài khoản đã tồn tại</label>");
				}
				email.focus();
				return false;
			}
		}
	}
	form_data.append('email_uv', email.val());

	var password = $('#password');
	if (password.val() == '') {
		if (password.hasClass('error') == false) {
			password.addClass('error');
			password.after("<label id='password_error' class='error'>Vui lòng nhập mật khẩu</label>");
		}
		password.focus();
		return false;
	} else {
		password.removeClass('error');
		$('#password_error').remove();
		if (password.val().length < 6) {
			if (password.hasClass('error') == false) {
				password.addClass('error');
				password.after("<label id='password_error' class='error'>Mật khẩu phải lớn hơn 6 ký tự</label>");
			}
			password.focus();
			return false;
		} else {
			password.removeClass('error');
			$('#password_error').remove();
		}
	}


	var re_password = $('#re_password');
	if (re_password.val() == '') {
		if (re_password.hasClass('error') == false) {
			re_password.addClass('error');
			re_password.after("<label id='re_password_error' class='error'>Vui lòng nhập lại mật khẩu</label>");
		}
		re_password.focus();
		return false;
	} else {
		re_password.removeClass('error');
		$('#re_password_error').remove();
		if (re_password.val().length < 6) {
			if (re_password.hasClass('error') == false) {
				re_password.addClass('error');
				re_password.after("<label id='re_password_error' class='error'>Mật khẩu phải lớn hơn 6 ký tự</label>");
			}
			re_password.focus();
			return false;
		} else {
			re_password.removeClass('error');
			$('#re_password_error').remove();
			if (re_password.val() != password.val()) {
				if (re_password.hasClass('error') == false) {
					re_password.addClass('error');
					re_password.after("<label id='re_password_error' class='error'>Mật khẩu nhập lại không trùng khớp</label>");
				}
				re_password.focus();
				return false;
			} else {
				re_password.removeClass('error');
				$('#re_password_error').remove();
			}
		}
	}

	form_data.append('password_uv', re_password.val());

	var full_name = $('#full_name');
	if (full_name.val() == '') {
		if (full_name.hasClass('error') == false) {
			full_name.addClass('error');
			full_name.after("<label id='full_name_error' class='error'>Vui lòng nhập họ và tên</label>");
		}
		full_name.focus();
		return false;
	} else {
		full_name.removeClass('error');
		$('#full_name_error').remove();
	}

	form_data.append('full_name', full_name.val());

	var uv_phone = $('.register #uv_phone');
	if (uv_phone.val() == '') {
		if (uv_phone.hasClass('error') == false) {
			uv_phone.addClass('error');
			uv_phone.after("<label id='uv_phone_error' class='error'>Vui lòng nhập số điện thoại</label>");
		}
		uv_phone.focus();
		return false;
	} else {
		uv_phone.removeClass('error');
		$('#uv_phone_error').remove();
		pattern = /^[0-9]{10}$/;
		if (!pattern.test(uv_phone.val())) {
			if (uv_phone.hasClass('error') == false) {
				uv_phone.addClass('error');
				uv_phone.after("<label id='uv_phone_error' class='error'>SĐT bạn nhập không hợp lệ</label>");
			}
			uv_phone.focus();
			return false;
		} else {
			uv_phone.removeClass('error');
			$('#uv_phone_error').remove();
		}
	}

	form_data.append('uv_phone', uv_phone.val());

	var city = $('#city');
	if (city.val() == 0) {
		if (city.hasClass('error') == false) {
			city.parent().find('.select2-container').addClass('error');
			$('#select2-city-container').parent().after("<label id='city_error' class='error'>Vui lòng chọn tỉnh thành</label>");
		}
		city.focus();
		return false;
	} else {
		$('#select2-city-container').parent().removeClass('error');
		$('#city_error').remove();
	}

	form_data.append('city', city.val());

	var qh = $('#qh');
	if (qh.val() == 0) {
		if ($('#select2-qh-container').parent().hasClass('error') == false) {
			$('#select2-qh-container').parent().addClass('error');
			$('#select2-qh-container').parent().after("<label id='qh_error' class='error'>Vui lòng chọn quận huyện</label>");
		}
		qh.focus();
		return false;
	} else {
		$('#select2-qh-container').parent().removeClass('error');
		$('#qh_error').remove();
	}

	form_data.append('qh', qh.val());

	var frm_address = $('#frm_address');
	if (frm_address.val() == '') {
		if (frm_address.hasClass('error') == false) {
			frm_address.addClass('error');
			frm_address.after("<label id='frm_address_error' class='error'>Vui lòng nhập địa chỉ của bạn</label>");
		}
		frm_address.focus();
		return false;
	} else {
		frm_address.removeClass('error');
		$('#frm_address_error').remove();
	}

	form_data.append('frm_address', frm_address.val());

	var frm_jobuv = $('#frm_jobuv');
	if (frm_jobuv.val() == '') {
		if (frm_jobuv.hasClass('error') == false) {
			frm_jobuv.addClass('error');
			frm_jobuv.after("<label id='frm_jobuv_error' class='error'>Vui lòng nhập công việc bạn muốn làm</label>");
		}
		frm_jobuv.focus();
		return false;
	} else {
		frm_jobuv.removeClass('error');
		$('#frm_jobuv_error').remove();
	}

	form_data.append('cvmm', frm_jobuv.val());
	var uv_tt = $('#uv_tt');
	if (uv_tt.val() == '') {
		if (uv_tt.parent().hasClass('error') == false) {
			uv_tt.parent().addClass('error');
			uv_tt.parent().append("<label id='uv_tt_error' class='error'>Vui lòng chọn tỉnh bạn muốn làm việc</label>");
		}
		uv_tt.focus();
		return false;
	} else {
		uv_tt.parent().removeClass('error');
		$('#uv_tt_error').remove();
	}
	form_data.append('job_address', uv_tt.val());

	var uv_nn = $('#uv_nn');
	if (uv_nn.val() == '') {
		if (uv_nn.parent().hasClass('error') == false) {
			uv_nn.parent().addClass('error');
			uv_nn.parent().append("<label id='uv_nn_error' class='error'>Vui lòng chọn ngành nghề bạn muốn làm việc</label>");
		}
		uv_nn.focus();
		return false;
	} else {
		uv_nn.parent().removeClass('error');
		$('#uv_nn_error').remove();
	}

	form_data.append('nganh_nghe', uv_nn.val());
	//Lấy ra files
	var file_data = $('#file').prop('files')[0];
	if (file_data != undefined) {
		//lấy ra kiểu file
		var type = file_data.type;
		//Xét kiểu file được upload
		var match = ["image/gif", "image/png", "image/jpg", "image/jpeg", "image/jfif", "image/PNG" ];
		//kiểm tra kiểu file
		if (type == match[0] || type == match[1] || type == match[2] || type == match[3] || type == match[4] || type == match[5]) {
			form_data.append('upLoadAvatar', file_data);
		} else {
			alert('Chỉ được upload file ảnh');
			$('#file').val('');
			return false;
		}
		// return false
	} else {
		console.log('2');
	}
	$.ajax({
		async: false,
		type: "POST",
		url: "../ajax/dangki_b1.php",
		contentType: false,
		processData: false,
		dataType: 'json',
		data: form_data,
		success: function(data) {
			if (data.stt == 1) {
				$('#popup_register_success').removeClass('hidden').hide().show('slow');
				setCookie('UT', 3, data.tmp_time);
				setCookie('xt', data.tmp_id, data.tmp_time);
				$('#option_form').attr('data-xt', data.tmp_id);
				$('#tai_cv').attr('data-xt', data.tmp_id);
				$('#tao_cv').attr('data-xt', data.tmp_id);
			}
		},
		error: function() {
			alert('Vui lòng kiểm tra lại thông tin vừa nhập');
		}

	});
	return false;
});
$('#popup_register_success').click(function(){
	$('#popup_register_success').hide('slow');
	$('html, body').animate({
		scrollTop: $("#huongdan_b2").offset().top
	}, 1000);
});
$('#option_form').on('click', function() {
	var cookie_xt = $(this).attr('data-xt');
	if (cookie_xt == '') {
		alert("Bạn phải điền đầy đủ thông tin ở bước 1 !!!");
		$('html, body').animate({
			scrollTop: $(".right").offset().top
		}, 1000);
		return false;
	}
});

$('#tai_cv').on('click', function() {
	var cookie_xt = $(this).attr('data-xt');
	if (cookie_xt == '') {
		alert("Bạn phải điền đầy đủ thông tin ở bước 1 !!!");
		$('html, body').animate({
			scrollTop: $(".right").offset().top
		}, 1000);
		return false;
	}
});

$('#tao_cv').on('click', function() {
	var cookie_xt = $(this).attr('data-xt');
	if (cookie_xt == '') {
		alert("Bạn phải điền đầy đủ thông tin ở bước 1 !!!");
		$('html, body').animate({
			scrollTop: $(".right").offset().top
		}, 1000);
		return false;
	}
});

$('.registerform #birthday').change(function() {
	var birthday = $(this);
	if (birthday.val() == '') {
		if (birthday.hasClass('error') == false) {
			birthday.addClass('error');
			birthday.after("<label id='birthday_error' class='error'>Vui lòng chọn ngày sinh</label>");
		}
	} else {
		birthday.removeClass('error');
		$('#birthday_error').remove();
	}
});

$('.registerform #gender').change(function() {
	var gender = $(this);
	if (gender.val() == 0) {
		if ($('#select2-gender-container').parent().hasClass('error') == false) {
			$('#select2-gender-container').parent().addClass('error');
			$('#select2-gender-container').after("<label id='gender_error' class='error'>Vui lòng chọn giới tính</label>");
		}
	} else {
		$('#select2-gender-container').parent().removeClass('error');
		$('#gender_error').remove();
	}
});

$('.registerform #honnhan').change(function() {
	var honnhan = $(this);
	if (honnhan.val() == 0) {
		if ($('#select2-honnhan-container').parent().hasClass('error') == false) {
			$('#select2-honnhan-container').parent().addClass('error');
			$('#select2-honnhan-container').parent().after("<label id='honnhan_error' class='error'>Vui lòng chọn tình trạng hôn nhân</label>");
		}
	} else {
		$('#select2-honnhan-container').parent().removeClass('error');
		$('#honnhan_error').remove();
	}
});

$('.registerform #xeploai').change(function() {
	var xeploai = $(this);
	if (xeploai.val() == 0) {
		if ($('#select2-xeploai-container').parent().hasClass('error') == false) {
			$('#select2-xeploai-container').parent().addClass('error');
			xeploai.parent().after("<label id='xeploai_error' class='error'>Vui lòng chọn xếp loại</label>");
		}
	} else {
		$('#select2-xeploai-container').parent().removeClass('error');
		$('#xeploai_error').remove();
	}
});

$('.registerform #school').keyup(function() {
	var school = $(this);
	if (school.val() == '') {
		if (school.hasClass('error') == false) {
			school.addClass('error');
			school.after("<label id='school_error' class='error'>Vui lòng nhập trường bạn học</label>");
		}
	} else {
		school.removeClass('error');
		$('#school_error').remove();
	}
});

$('.registerform #school').blur(function() {
	var school = $(this);
	if (school.val() == '') {
		if (school.hasClass('error') == false) {
			school.addClass('error');
			school.after("<label id='school_error' class='error'>Vui lòng nhập trường bạn học</label>");
		}
	} else {
		school.removeClass('error');
		$('#school_error').remove();
	}
});

$('.registerform #exp_uv').change(function() {
	var exp_uv = $(this);
	if (exp_uv.val() == '') {
		if ($('#select2-exp_uv-container').parent().hasClass('error') == false) {
			$('#select2-exp_uv-container').parent().addClass('error');
			$('#select2-exp_uv-container').parent().after("<label id='exp_uv_error' class='error'>Vui lòng chọn kinh nghiệm làm việc</label>");
		}
	} else {
		$('#select2-exp_uv-container').parent().removeClass('error');
		$('#exp_uv_error').remove();
	}
});

$('.registerform #mucluong').change(function() {
	var mucluong = $(this);
	if (mucluong.val() == 0) {
		if ($('#select2-mucluong-container').parent().hasClass('error') == false) {
			$('#select2-mucluong-container').parent().addClass('error');
			$('#select2-mucluong-container').parent().after("<label id='mucluong_error' class='error'>Vui lòng chọn mức lương</label>");
		}
	} else {
		$('#select2-mucluong-container').parent().removeClass('error');
		$('#mucluong_error').remove();
	}
});

$('.registerform #hinhthuc').change(function() {
	var hinhthuc = $(this);
	if (hinhthuc.val() == 0) {
		if ($('#select2-hinhthuc-container').parent().hasClass('error') == false) {
			$('#select2-hinhthuc-container').parent().addClass('error');
			$('#select2-hinhthuc-container').parent().after("<label id='hinhthuc_error' class='error'>Vui lòng chọn hình thức làm việc</label>");
		}
	} else {
		$('#select2-hinhthuc-container').parent().removeClass('error');
		$('#hinhthuc_error').remove();
	}
});

$('.registerform #capbac').change(function() {
	var capbac = $(this);
	if (capbac.val() == 0) {
		if ($('#select2-capbac-container').parent().hasClass('error') == false) {
			$('#select2-capbac-container').parent('.select2-container').addClass('error');
			$('#select2-capbac-container').parent().after("<label id='capbac_error' class='error'>Vui lòng chọn cấp bậc mong muốn</label>");
		}
	} else {
		$('#select2-capbac-container').parent().removeClass('error');
		$('#capbac_error').remove();
	}
});

$('.registerform #muc_tieu_nghe_nghiep').keyup(function() {
	muc_tieu_nghe_nghiep = $(this);
	if (muc_tieu_nghe_nghiep.val() == '' && $('.muctieu:checked').length == 0) {
		if (muc_tieu_nghe_nghiep.hasClass('error') == false) {
			muc_tieu_nghe_nghiep.addClass('error');
			muc_tieu_nghe_nghiep.after('<p id="muc_tieu_nghe_nghiep_error" class="error">Vui lòng diền mục tiêu nghề nghiệp</p>');
		}
	} else {
		muc_tieu_nghe_nghiep.removeClass('error');
		$('#muc_tieu_nghe_nghiep_error').remove();
	}
});

$('.registerform #muc_tieu_nghe_nghiep').blur(function() {
	muc_tieu_nghe_nghiep = $(this);
	if (muc_tieu_nghe_nghiep.val() == '' && $('.muctieu:checked').length == 0) {
		if (muc_tieu_nghe_nghiep.hasClass('error') == false) {
			muc_tieu_nghe_nghiep.addClass('error');
			muc_tieu_nghe_nghiep.after('<p id="muc_tieu_nghe_nghiep_error" class="error">Vui lòng diền mục tiêu nghề nghiệp</p>');
		}
	} else {
		muc_tieu_nghe_nghiep.removeClass('error');
		$('#muc_tieu_nghe_nghiep_error').remove();
		if (muc_tieu_nghe_nghiep.val().length < 50) {
			if (muc_tieu_nghe_nghiep.hasClass('error') == false) {
				muc_tieu_nghe_nghiep.addClass('error');
				muc_tieu_nghe_nghiep.after('<p id="muc_tieu_nghe_nghiep_error" class="error">Mục tiêu nghề nghiệp phải điền > 50 ký tự</p>');
			}
		}
	}
});

$('.registerform #ki_nang_ban_than').keyup(function() {
	ki_nang_ban_than = $(this);
	if (ki_nang_ban_than.val() == '' && $('.kinang:checked').length == 0) {
		if (ki_nang_ban_than.hasClass('error') == false) {
			ki_nang_ban_than.addClass('error');
			ki_nang_ban_than.after('<p id="ki_nang_ban_than_error" class="error">Vui lòng điền kĩ năng bản thân</p>');
		}
	} else {
		ki_nang_ban_than.removeClass('error');
		$('#ki_nang_ban_than_error').remove();
	}
});

$('.registerform #ki_nang_ban_than').blur(function() {
	ki_nang_ban_than = $(this);
	if (ki_nang_ban_than.val() == '') {
		if (ki_nang_ban_than.hasClass('error') == false) {
			ki_nang_ban_than.addClass('error');
			ki_nang_ban_than.after('<p id="ki_nang_ban_than_error" class="error">Vui lòng điền kĩ năng bản thân</p>');
		}
	} else {
		ki_nang_ban_than.removeClass('error');
		$('#ki_nang_ban_than_error').remove();
		if (ki_nang_ban_than.val().length < 50 && $('.kinang:checked').length == 0) {
			if (ki_nang_ban_than.hasClass('error') == false) {
				ki_nang_ban_than.addClass('error');
				ki_nang_ban_than.after('<p id="ki_nang_ban_than_error" class="error">Kỹ năng bản thân phải điền > 50 ký tự</p>');
			}
		} else {
			ki_nang_ban_than.removeClass('error');
			$('#ki_nang_ban_than_error').remove();
		}
	}
});

function checkvali_UVHT() {
	var birthday = $('.registerform #birthday');
	if (birthday.val() == '') {
		if (birthday.hasClass('error') == false) {
			birthday.addClass('error');
			birthday.after("<label id='birthday_error' class='error'>Vui lòng chọn ngày sinh</label>");
		}
		birthday.focus();
		return false;
	} else {
		birthday.removeClass('error');
		$('#birthday_error').remove();
	}


	var gender = $('.registerform #gender');
	if (gender.val() == 0) {
		if ($('#select2-gender-container').parent().hasClass('error') == false) {
			$('#select2-gender-container').parent().addClass('error');
			$('#select2-gender-container').parent().after("<label id='gender_error' class='error'>Vui lòng chọn giới tính</label>");
		}
		gender.focus();
		return false;
	} else {
		$('#select2-gender-container').parent().removeClass('error');
		$('#gender_error').remove();
	}


	var honnhan = $('.registerform #honnhan');
	if (honnhan.val() == 0) {
		if ($('#select2-honnhan-container').parent().hasClass('error') == false) {
			$('#select2-honnhan-container').parent().addClass('error');
			$('#select2-honnhan-container').parent().after("<label id='honnhan_error' class='error'>Vui lòng chọn tình trạng hôn nhân</label>");
		}
		honnhan.focus();
		return false;
	} else {
		$('#select2-honnhan-container').parent().removeClass('error');
		$('#honnhan_error').remove();
	}


	var school = $('.registerform #school');
	if (school.val() == '') {
		if (school.hasClass('error') == false) {
			school.addClass('error');
			school.after("<label id='school_error' class='error'>Vui lòng nhập trường bạn học</label>");
		}
		school.focus();
		return false;
	} else {
		school.removeClass('error');
		$('#school_error').remove();
	}


	var xeploai = $('.registerform #xeploai');
	if (xeploai.val() == 0) {
		if ($('#select2-xeploai-container').parent().hasClass('error') == false) {
			$('#select2-xeploai-container').parent().addClass('error');
			$('#select2-xeploai-container').parent().after("<label id='xeploai_error' class='error'>Vui lòng chọn xếp loại</label>");
		}
		xeploai.focus();
		return false;
	} else {
		$('#select2-xeploai-container').parent().removeClass('error');
		$('#xeploai_error').remove();
	}

	var exp_uv = $('.registerform #exp_uv');
	if (exp_uv.val() == '') {
		if ($('#select2-exp_uv-container').parent().hasClass('error') == false) {
			$('#select2-exp_uv-container').parent().addClass('error');
			$('#select2-exp_uv-container').parent().after("<label id='exp_uv_error' class='error'>Vui lòng chọn kinh nghiệm làm việc</label>");
		}
		exp_uv.focus();
		return false;
	} else {
		$('#select2-exp_uv-container').parent().removeClass('error');
		$('#exp_uv_error').remove();
	}


	var mucluong = $('.registerform #mucluong');
	if (mucluong.val() == 0) {
		if ($('#select2-mucluong-container').parent().hasClass('error') == false) {
			$('#select2-mucluong-container').parent().addClass('error');
			$('#select2-mucluong-container').parent().after("<label id='mucluong_error' class='error'>Vui lòng chọn mức lương</label>");
		}
		mucluong.focus();
		return false;
	} else {
		$('#select2-mucluong-container').parent().removeClass('error');
		$('#mucluong_error').remove();
	}


	var hinhthuc = $('.registerform #hinhthuc');
	if (hinhthuc.val() == 0) {
		if ($('#select2-hinhthuc-container').parent().hasClass('error') == false) {
			$('#select2-hinhthuc-container').parent().addClass('error');
			$('#select2-hinhthuc-container').parent().after("<label id='hinhthuc_error' class='error'>Vui lòng chọn hình thức làm việc</label>");
		}
		hinhthuc.focus();
		return false;
	} else {
		$('#select2-hinhthuc-container').parent().removeClass('error');
		$('#hinhthuc_error').remove();
	}


	var capbac = $('.registerform #capbac');
	if (capbac.val() == 0) {
		if ($('#select2-capbac-container').parent().hasClass('error') == false) {
			$('#select2-capbac-container').parent().addClass('error');
			$('#select2-capbac-container').parent().after("<label id='capbac_error' class='error'>Vui lòng chọn cấp bậc mong muốn</label>");
		}
		capbac.focus();
		return false;
	} else {
		$('#select2-capbac-container').parent().removeClass('error');
		$('#capbac_error').remove();
	}

	var muc_tieu_nghe_nghiep = $('#muc_tieu_nghe_nghiep');
	if (muc_tieu_nghe_nghiep.val() == '' && $('.muctieu:checked').length == 0) {
		if (muc_tieu_nghe_nghiep.hasClass('error') == false) {
			muc_tieu_nghe_nghiep.addClass('error');
			muc_tieu_nghe_nghiep.after("<p id='muc_tieu_nghe_nghiep_error' class='error'>Vui lòng nhập mục tiêu nghề nghiệp</p>");
		}
		muc_tieu_nghe_nghiep.focus();
		return false;
	} else {
		$('#muc_tieu_nghe_nghiep_error').remove();
		muc_tieu_nghe_nghiep.removeClass('error');
		if (muc_tieu_nghe_nghiep.val().length < 50 && muc_tieu_nghe_nghiep.val() != '') {
			if (muc_tieu_nghe_nghiep.hasClass('error') == false) {
				muc_tieu_nghe_nghiep.addClass('error');
				muc_tieu_nghe_nghiep.after("<p id='muc_tieu_nghe_nghiep_error' style='text-align:left' class='error'>Mục tiêu nghề nghiệp phải ít nhất 50 kí tự !!!</p>");
			}
			muc_tieu_nghe_nghiep.focus();
			return false;
		} else {
			$('#muc_tieu_nghe_nghiep_error').remove();
			muc_tieu_nghe_nghiep.removeClass('error');
		}
	}

	var ki_nang_ban_than = $('#ki_nang_ban_than');
	if (ki_nang_ban_than.val() == '' && $('.kinang:checked').length == 0) {
		if (ki_nang_ban_than.hasClass('error') == false) {
			ki_nang_ban_than.addClass('error');
			ki_nang_ban_than.after("<p id='ki_nang_ban_than_error' class='error'>Vui lòng nhập kĩ năng bản thân</p>");
		}
		ki_nang_ban_than.focus();
		return false;
	} else {
		$('#ki_nang_ban_than_error').remove();
		ki_nang_ban_than.removeClass('error');
		if (ki_nang_ban_than.val().length < 50 && ki_nang_ban_than.val() != '') {
			if (ki_nang_ban_than.hasClass('error') == false) {
				ki_nang_ban_than.addClass('error');
				ki_nang_ban_than.after("<p id='ki_nang_ban_than_error' style='text-align:left' class='error'>Kĩ năng bản thân phải ít nhất 50 kí tự !!!</p>");
			}
			ki_nang_ban_than.focus();
			return false;
		} else {
			$('#ki_nang_ban_than_error').remove();
			ki_nang_ban_than.removeClass('error');
		}
	}
}
$('.muctieu').click(function() {
	if ($('.muctieu:checked').length == 0) {
		if ($('#muc_tieu_nghe_nghiep').hasClass('error') == false) {
			$('#muc_tieu_nghe_nghiep').addClass('error');
			$('#muc_tieu_nghe_nghiep').after("<p id='muc_tieu_nghe_nghiep_error' class='error'>Vui lòng chọn hoặc điền mục tiêu làm việc</p>");
		}
		$('#muc_tieu_nghe_nghiep').focus();
	} else {
		$('#muc_tieu_nghe_nghiep_error').remove();
		$('#muc_tieu_nghe_nghiep').removeClass('error');
	}
});
$('.kinang').click(function() {
	if ($('.kinang:checked').length == 0) {
		if ($('#ki_nang_ban_than').hasClass('error') == false) {
			$('#ki_nang_ban_than').addClass('error');
			$('#ki_nang_ban_than').after("<p id='ki_nang_ban_than_error' class='error'>Vui lòng chọn hoặc điền kĩ năng bản thân</p>");
		}
		$('#ki_nang_ban_than').focus();
	} else {
		$('#ki_nang_ban_than_error').remove();
		$('#ki_nang_ban_than').removeClass('error');
	}
});

function vali_doiMK() {
	var password = $('#password');
	var re_password = $('#re_password');
	if (password.val() == '') {
		if (password.hasClass('error') == false) {
			password.addClass('error');
			password.after("<label id='password_error' class='error'>Vui lòng nhập mật khẩu</label>");
		}
		password.focus();
		return false;
	} else {
		password.removeClass('error');
		$('#password_error').remove();
		if (password.val().length < 6) {
			if (password.hasClass('error') == false) {
				password.addClass('error');
				password.after("<label id='password_error' class='error'>Mật khẩu phải lớn hơn 6 ký tự</label>");
			}
			password.focus();
			return false;
		} else {
			password.removeClass('error');
			$('#password_error').remove();
		}
	}

	if (re_password.val() == '') {
		if (re_password.hasClass('error') == false) {
			re_password.addClass('error');
			re_password.after("<label id='re_password_error' class='error'>Vui lòng nhập lại mật khẩu</label>");
		}
		re_password.focus();
		return false;
	} else {
		re_password.removeClass('error');
		$('#re_password_error').remove();
		if (re_password.val() != password.val()) {
			if (re_password.hasClass('error') == false) {
				re_password.addClass('error');
				re_password.after("<label id='re_password_error' class='error'>Mật khẩu nhập lại phải trùng khớp</label>");
			}
			re_password.focus();
			return false;
		} else {
			re_password.removeClass('error');
			$('#re_password_error').remove();
		}
	}
}

$('#doi_mkuv #password').keyup(function() {
	var password = $(this);
	if (password.val() == '') {
		if (password.hasClass('error') == false) {
			password.addClass('error');
			password.after("<label id='password_error' class='error'>Vui lòng nhập mật khẩu</label>");
		}
	} else {
		password.removeClass('error');
		$('#password_error').remove();
		if (password.val().length < 6) {
			if (password.hasClass('error') == false) {
				password.addClass('error');
				password.after("<label id='password_error' class='error'>Mật khẩu phải lớn hơn 6 ký tự</label>");
			}
		} else {
			password.removeClass('error');
			$('#password_error').remove();
		}
	}
});

$('#doi_mkuv #password').blur(function() {
	var password = $(this);
	if (password.val() == '') {
		if (password.hasClass('error') == false) {
			password.addClass('error');
			password.after("<label id='password_error' class='error'>Vui lòng nhập mật khẩu</label>");
		}
	} else {
		password.removeClass('error');
		$('#password_error').remove();
		if (password.val().length < 6) {
			if (password.hasClass('error') == false) {
				password.addClass('error');
				password.after("<label id='password_error' class='error'>Mật khẩu phải lớn hơn 6 ký tự</label>");
			}
		} else {
			password.removeClass('error');
			$('#password_error').remove();
		}
	}
});

function CheckValidate(elm, value, error, message, select_multi = 0) {
	var returnform = true;
	if (elm.val() == value) {
		if (select_multi == 1) {
			if (elm.parent().children('.select2-container').hasClass('error') == false) {
				elm.parent().children('.select2-container').addClass('error');
				elm.parent().children('.select2-container').after("<p class='error' id='" + error + "_error'>" + message + "<p>");
			}
		} else {
			if (elm.hasClass('error') == false) {
				elm.addClass('error');
				elm.after("<p class='error' id='" + error + "_error'>" + message + "<p>");
			}
		}

		elm.focus();
		returnform = false;
	} else {
		elm.removeClass('error');
		$('#' + error + '_error').remove();
	}
	return returnform;
}

function CheckKeyUp(elm, value, error, message) {
	if (elm.val() == value) {
		if (elm.hasClass('error') == false) {
			elm.addClass('error');
			elm.after("<p class='error' id='" + error + "_error'>" + message + "<p>");
		}
	} else {
		elm.removeClass('error');
		$('#' + error + '_error').remove();
	}
}
$('#information_candi #user_name').keyup(function(){
	user_name = $(this);
	user_name.val(titleCase(user_name.val()));
});
function valiUpDateInfo() {
	var returnform = true;
	var user_name = $('#user_name');
	var use_phone = $('#use_phone');
	var birthday = $('#birthday');
	var gender = $('#gender');
	var lg_honnhan = $('#lg_honnhan');
	var address = $('#address');
	var use_city = $('#use_city');
	if (!CheckValidate(user_name, '', 'user_name', 'Vui lòng nhập họ tên của bạn !!!')) {
		returnform = false;
	}
	if (!CheckValidate(use_phone, '', 'use_phone', 'Vui lòng số điện thoại của bạn !!!')) {
		returnform = false;
	}
	if (!CheckValidate(birthday, '', 'birthday', 'Vui lòng nhập ngày sinh của bạn !!!')) {
		returnform = false;
	}
	if (!CheckValidate(gender, 0, 'gender', 'Vui lòng chọn giới tính của bạn !!!')) {
		returnform = false;
	}
	if (!CheckValidate(lg_honnhan, 0, 'lg_honnhan', 'Vui lòng chọn tình trạng hôn nhân')) {
		returnform = false;
	}
	if (!CheckValidate(address, '', 'address', 'Vui lòng nhập địa chỉ hiện tại')) {
		returnform = false;
	}
	if (!CheckValidate(use_city, 0, 'use_city', 'Vui lòng tỉnh/ thành phố')) {
		returnform = false;
	}

	return returnform;
}



function valiUpDateCVMM() {
	var returnform = true;

	if (!CheckValidate($('#use_job_name'), '', 'use_job_name', 'Vui lòng nhập công việc bạn mong muốn !!!')) {
		returnform = false;
	}
	if (!CheckValidate($('#work_option'), 0, 'work_option', 'Vui lòng chọn hình thức làm việc !!!')) {
		returnform = false;
	}
	if (!CheckValidate($('#exp_years'), '', 'exp_years', 'Vui lòng chọn kinh nghiệm làm việc !!!')) {
		returnform = false;
	}
	if (!CheckValidate($('#cap_bac_mong_muon'), 0, 'cap_bac_mong_muon', 'Vui lòng chọn cấp bậc mong muốn !!!')) {
		returnform = false;
	}
	if (!CheckValidate($('#job_city'), '', 'job_city', 'Vui lòng chọn nơi làm việc mong muốn !!!', 1)) {
		returnform = false;
	}
	if (!CheckValidate($('#job_cate'), '', 'job_cate', 'Vui lòng chọn nơi ngành nghề mong muốn !!!', 1)) {
		returnform = false;
	}
	if (!CheckValidate($('#salary'), 0, 'salary', 'Vui lòng chọn mức lương mong muốn !!!')) {
		returnform = false;
	}

	return returnform;
}

function valiUpDateMTNN() {
	var returnform = true;
	if (!CheckValidate($('#muctieunghenghiep'), '', 'muctieunghenghiep', 'Vui lòng nhập mục tiêu nghề nghiệp !!!')) {
		returnform = false;
	}

	return returnform;
}

function valiUpDateKNBT() {
	var returnform = true;
	if (!CheckValidate($('#ki_nang_ban_than'), '', 'ki_nang_ban_than', 'Vui lòng nhập kĩ năng bản thân !!!')) {
		returnform = false;
	}

	return returnform;
}

function valiAddBCCC() {
	var returnform = true;
	if (!CheckValidate($('#bang_cap'), '', 'bang_cap', 'Vui lòng nhập tên bằng cấp !!!')) {
		returnform = false;
	}
	if (!CheckValidate($('#truong_hoc'), '', 'truong_hoc', 'Vui lòng nhập nơi đào tạo !!!')) {
		returnform = false;
	}
	if (!CheckValidate($('#tg_batdau'), '', 'tg_batdau', 'Vui lòng nhập Thời gian bắt đầu !!!')) {
		returnform = false;
	}
	if (!CheckValidate($('#tg_ketthuc'), '', 'tg_ketthuc', 'Vui lòng nhập Thời gian kết thúc !!!')) {
		returnform = false;
	}
	if (!CheckValidate($('#bc_chuyennganh'), '', 'bc_chuyennganh', 'Vui lòng nhập chuyên ngành đào tạo !!!')) {
		returnform = false;
	}
	if (!CheckValidate($('#bc_xeploai'), 0, 'bc_xeploai', 'Vui lòng chọn Xếp loại !!!')) {
		returnform = false;
	}
	return returnform;
}

function valiEditBCCC(e) {
	var returnform = true;
	if (!CheckValidate($(e).find('.bang_cap_edit'), '', 'bang_cap_edit', 'Vui lòng nhập tên bằng cấp !!!')) {
		returnform = false;
	}
	if (!CheckValidate($(e).find('.truong_hoc_edit'), '', 'truong_hoc_edit', 'Vui lòng nhập nơi đào tạo !!!')) {
		returnform = false;
	}
	if (!CheckValidate($(e).find('.tg_batdau_edit'), '', 'tg_batdau_edit', 'Vui lòng nhập Thời gian bắt đầu !!!')) {
		returnform = false;
	}
	if (!CheckValidate($(e).find('.tg_ketthuc_edit'), '', 'tg_ketthuc_edit', 'Vui lòng nhập Thời gian kết thúc !!!')) {
		returnform = false;
	}
	if (!CheckValidate($(e).find('.bc_chuyennganh_edit'), '', 'bc_chuyennganh_edit', 'Vui lòng nhập chuyên ngành đào tạo !!!')) {
		returnform = false;
	}
	if (!CheckValidate($(e).find('.bc_xeploai_edit'), 0, 'bc_xeploai_edit', 'Vui lòng chọn Xếp loại !!!')) {
		returnform = false;
	}
	return returnform;
}

function changeImg(input) {
	//Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		//Sự kiện file đã được load vào website
		reader.onload = function(e) {
			var file_data = $('#file').prop('files')[0];
			if (file_data != undefined) {
				//lấy ra kiểu file
				var type = file_data.type;
				//Xét kiểu file được upload
				var match = ["image/gif", "image/png", "image/jpg", "image/jpeg", "image/jfif", "image/PNG" ];
				//kiểm tra kiểu file
				if (type == match[0] || type == match[1] || type == match[2] || type == match[3] || type == match[4] || type == match[5]) {
					$('#uploaded').removeClass('hidden');
				} else {
					alert('Chỉ được upload file ảnh');
					$('#file').val('');
				}
			}
		}
		reader.readAsDataURL(input.files[0]);
	}
}

$('#showbox_image').click(function() {
	$('input[name="upLoadAvatar"]').click();
});