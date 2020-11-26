function setCookie(cname, cvalue, exdays) {
	var d = new Date();
	d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
	var expires = "expires=" + d.toUTCString();
	document.cookie = cname + "=" + cvalue + "; " + expires;
}
function validateEmail($email) {
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	return emailReg.test($email);
}
function func_signin_xt(e) {
	href = $(e).attr('data-href');
	$('#btn-login-ajax').attr('data-href', href);
}
function checkvali_CV() {
	var returnform_cv = true;
	var ccemail_cv = $("#form-dk #user_email");
	var ccpass_cv = $("#form-dk #user_password_first");
	var ccrepass_cv = $("#form-dk #user_password_second");
	var ccnamecom_cv = $("#form-dk #user_name");
	var cccity_cv = $("#form-dk #s2id_city");
	var cccity2_cv = $('#form-dk #s2id_city_child');
	var ccphone_cv = $("#form-dk #user_phone");
	var address_uv_cv = $('#form-dk #address_uv');
	var job_name_cv = $('#form-dk #job_name');
	var job_city_cv = $("#form-dk #job_address");
	var nganh_nghe_cv = $('#form-dk #nganh_nghe');

	/*Kiểm tra tồn tại email đăng nhập */
	if (ccemail_cv.val() == '') {
		if (!ccemail_cv.hasClass('error')) {
			ccemail_cv.prev().after('<label id="user_email_error" class="error tt" for="user_email">Vui lòng nhập địa chỉ email.</label>');
			ccemail_cv.addClass('error');
		}
		returnform_cv = false;
	}
	if (ccemail_cv.val().length > 0) {
		ccemail_cv.removeClass('error');
		$('#user_email_error').remove();
		if (!validateEmail(ccemail_cv.val())) {
			if (!$(ccemail_cv).hasClass("error")) {
				ccemail_cv.prev().after('<label id="user_email_error" class="error tt" for="user_email">Địa chỉ email không đúng định dạng.</label>');
				ccemail_cv.addClass('error');
			}
			returnform_cv = false;
		} else {
			$.ajax({
				type: "POST",
				url: '/ajax/checkmail.php',
				async: false,
				data: {
					email: ccemail_cv.val()
				},
				success: function (data) {
					if (data == 1) {
						if (!ccemail_cv.hasClass("error")) {
							ccemail_cv.prev().after('<label id="user_email_error" class="error tt" for="user_email">Email đã có người sử dụng.</label>');
							ccemail_cv.addClass('error');
						}
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
	/*Kiểm tra nhập mật khẩu*/
	if (ccpass_cv.val() == '') {
		if (!ccpass_cv.hasClass('error')) {
			ccpass_cv.prev().after('<label id="user_password_first_error" class="error tt" for="user_password_first">Vui lòng nhập mật khẩu.</label>');
			ccpass_cv.addClass('error');
		}
		returnform_cv = false;
	} else {
		ccpass_cv.addClass('valid');
		ccpass_cv.removeClass('error');
		$("#user_password_first_error").remove();
		if (ccpass_cv.val().length < 4) {
			if (ccemail_cv.hasClass("error") == false) {
				ccpass_cv.prev().after('<label id="user_password_first_error" class="error tt" for="user_password_first">Mật khẩu phải từ 4-20 ký tự</label>');
				ccpass_cv.addClass('error');
			}
			returnform_cv = false;
		} else {
			$("#user_password_first_error").remove();
			ccpass_cv.removeClass('error');
		}
	}
	/*Kiểm tra pass nhập lại*/
	if (ccrepass_cv.val().length > 0) {
		var valPass = $("#user_password_first").val();
		$("#user_password_second_error").remove();
		if (ccrepass_cv.val() != valPass) {
			if (ccrepass_cv.hasClass("error") == false) {
				ccrepass_cv.prev().after('<label id="user_password_second_error" class="error" for="user_password_second">Xác nhận lại mật khẩu mới không trùng khớp.</label>');
				ccrepass_cv.addClass('error');
			}
			ccrepass_cv.addClass('valid');
			returnform_cv = false;
		} else {
			$("#user_password_second_error").remove();
			ccrepass_cv.addClass('valid');
			ccrepass_cv.removeClass('error');
		}
	} else {
		$("#user_password_second_error").remove();
		ccrepass_cv.prev().after('<label id="user_password_second_error" class="error tt" for="user_password_second">Vui lòng nhập lại mật khẩu.</label>');
		ccrepass_cv.addClass('valid');
		ccrepass_cv.addClass('error');
		returnform_cv = false;
	}
	/*Kiểm tra đã nhập họ tên hay chưa*/
	if (ccnamecom_cv.val().length == 0) {
		if (!ccnamecom_cv.hasClass("error")) {
			ccnamecom_cv.prev().after('<label id="user_name_error" class="error tt" for="user_name">Vui lòng nhập họ và tên</label>');
			ccnamecom_cv.addClass('error');
		}
		returnform_cv = false;
	} else {
		$("#user_name_error").remove();
		ccnamecom_cv.removeClass('error');
	}
	/*Kiểm tra số điện thoại*/
	if (ccphone_cv.val() == '') {
		if (!ccphone_cv.hasClass("error")) {
			ccphone_cv.prev().after('<label id="user_phone_error" class="error tt" for="user_phone">Vui lòng nhập số điện thoại</label>');
			ccphone_cv.addClass('error');
		}
		returnform_cv = false;
	} else {
		$("#user_phone_error").remove();
		ccphone_cv.removeClass('error');
	}
	/*Kiểm tra chọn thành phố*/
	if (cccity_cv.val() == 0) {
		if (!cccity_cv.hasClass('error')) {
			cccity_cv.addClass('error');
			cccity_cv.prev().after("<label id='user_company_city_error' class='error tt'>Vui lòng chọn tỉnh thành phố</label>");
		}
		returnform_cv = false;
	} else {
		$('#user_company_city_error').remove();
		cccity_cv.removeClass('error');
	}
	/*Kiểm tra quận huyện*/
	if (cccity2_cv.val() == 0) {
		if (!cccity2_cv.hasClass('error')) {
			cccity2_cv.addClass('error');
			cccity2_cv.prev().after("<label id='user_company_city2_error' class='error tt'>Vui lòng chọn quận/ huyện</label>");
		}
		returnform_cv = false;
	} else {
		cccity2_cv.removeClass('error');
		$('#user_company_city2_error').remove();
	}
	/*Kiểm tra địa chỉ chi tiết*/
	if (address_uv_cv.val().length == 0) {
		if (!address_uv_cv.hasClass("error")) {
			address_uv_cv.prev().after('<label id="address_uv_error" class="error tt" for="address_uv">Vui lòng nhập địa chỉ chi tiết</label>');
			address_uv_cv.addClass('error');
		}
		returnform_cv = false;
	} else {
		$("#address_uv_error").remove();
		address_uv_cv.removeClass('error');
	}
	/*Kiểm tra tên công việc*/
	if (job_name_cv.val().length == 0) {
		if (!job_name_cv.hasClass("error")) {
			job_name_cv.prev().after('<label id="job_name_error" class="error tt" for="job_name">Vui lòng nhập vị trí mong muốn</label>');
			job_name_cv.addClass('error');
		}
		returnform_cv = false;
	} else {
		$("#job_name_error").remove();
		job_name_cv.removeClass('error');
	}
	/*Kiểm tra tỉnh thành phố muốn làm việc*/
	if (job_city_cv.val() == '') {
		if (!job_city_cv.hasClass("error")) {
			job_city_cv.prev().after('<label id="job_city_error" class="error tt" for="job_city">Vui lòng chọn địa điểm làm việc</label>');
			job_city_cv.addClass('error');
		}
		returnform_cv = false;
	} else {
		$("#job_city_error").remove();
		job_city_cv.removeClass('error');
	}
	/*Kiem tra nhap nganh nghe*/
	if (nganh_nghe_cv.val() == '') {
		if (!nganh_nghe_cv.hasClass("error")) {
			nganh_nghe_cv.prev().after('<label id="nganh_nghe_error" class="error tt" for="nganh_nghe">Vui lòng nhập ngành nghề mong muốn</label>');
			nganh_nghe_cv.addClass('error');
		}
		returnform_cv = false;
	} else {
		$("#nganh_nghe_error").remove();
		nganh_nghe_cv.removeClass('error');
	}

	if (returnform_cv == true) {
		var job_address_cv = '';
		job_city_cv.each(function () {
			job_address_cv = job_address_cv + ',' + $(this).val();
		});
		if (job_address_cv.length > 1) {
			job_address_cv = job_address_cv.substring(1);
		}
		var nganhnghe_cv = '';
		nganh_nghe_cv.each(function () {
			nganhnghe_cv = nganhnghe_cv + ',' + $(this).val();
		});
		if (nganhnghe_cv.length > 1) {
			nganhnghe_cv = nganhnghe_cv.substring(1);
		}
		href = $('#submit_b1_dki').attr('data-href');
		$.ajax({
			type: "POST",
			url: "../ajax/dangki_b1cv.php",
			data: {
				email: ccemail_cv.val(),
				password: ccrepass_cv.val(),
				name: ccnamecom_cv.val(),
				phone: ccphone_cv.val(),
				jobname: job_name_cv.val(),
				city: cccity_cv.val(),
				district: cccity2_cv.val(),
				address: address_uv_cv.val(),
				ddlv: job_city_cv.val(),
				nn_mm: nganh_nghe_cv.val()
			}, success: function () {
				alert("Lưu thông tin thành công !!!");
				if (href != undefined) window.location.href = href;
				else location.reload();
			}
		});
	};
	return false;
}
function close_xtcv() {
	$('.showImage').html('');
	$('.showImage').addClass('hidden');
}
function change_color(e, path) {
	$('.leftShow img').attr('src', path);
	$('.banner_xt img').attr('src', path);
	$('.rightShow .item .fa-check').remove();
	$(e).html('<i class="fa fa-check" aria-hidden="true"></i>');
}
function hanld_login(t) {
	e = $(t);
	href = e.attr('data-href');
	$('#btn-login-ajax').attr('data-href', href);
	$('#submit_b1_dki').attr('data-href', href);
	$('.popup_loggin_cv').removeClass('hidden');
}
function like_cv(e) {
	cvid = $(e).attr('data-cvid');
	iduv = $(e).attr('data-iduv');
	type = $(e).attr('data-type');
	if (iduv == '') {
		$('.popup_loggin_cv').removeClass('hidden');
	} else {
		if ($(e).hasClass('active') == false) {
			$(e).addClass('active');
		} else {
			$(e).removeClass('active');
		}
		$.ajax({
			type: "POST",
			url: "../ajax/like_cv.php",
			data: {
				cvid: cvid,
				iduv: iduv,
				type: type
			}, success: function (data) {
				if (data == 1) $('.rightShow .like .fa').addClass('active');
				else $('.rightShow .like .fa').removeClass('active');
			}
		});
	}
}
function showCV(id_cv) {
	$.ajax({
		type: "POST",
		url: "../ajax/cv_xemtruoc.php",
		cache: false,
		data: {
			id: id_cv
		}, beforeSend() {
			$('.loader_xt').removeClass('hidden');
		}, success: function (data) {
			$('.showImage').html(data).delay(2000).removeClass('hidden');
			$('.loader_xt').delay(2000).addClass('hidden');
		}
	});
}
function close_zoom() {
	$('.banner_xt').addClass('hidden');
	$('.showImage .mainShow').removeClass('hidden');
}
function zoomCV(e) {
	t = $(e);
	$('.showImage .mainShow').addClass('hidden');
	$('.banner_xt').removeClass('hidden');
}
$(document).ready(function () {
	$("#form-dk #nganh_nghe").select2({
		maximumSelectionLength: 3,
		width: '100%',
		placeholder: "Chọn ngành nghề",
	});
	$('#form-dk #job_address').select2({
		maximumSelectionLength: 3,
		placeholder: "Chọn nơi làm việc",
		width: "100%"
	});
	$('#s2id_city,#s2id_city_child').select2({
		width: "100%"
	});
	$('#s2id_city').change(function () {
		id_city = $('#s2id_city').val();
		$.ajax({
			type: "POST",
			url: "../ajax/get_quanhuyen.php",
			data: { id: id_city },
			success: function (data) {
				$("#s2id_city_child").html(data);
			}
		});
	});
	$('.box-modal-create-cv .close').click(function () {
		$('.box-modal-create-cv').addClass('hidden');
	});
	$('.popup_loggin_cv .modal-head .fa').click(function () {
		$('.popup_loggin_cv').addClass('hidden');
	});
	$("#btn-login-ajax").click(function () {
		email = $('.popup_loggin_cv #user_name');
		password = $('.popup_loggin_cv #password');
		e = $(this);
		href = (e.attr('data-href') != undefined) ? e.attr('data-href') : "";
		if (email.val() == "" || password.val() == "") {
			$('.popup_loggin_cv .error').html('Vui lòng nhập đầy đủ thông tin đăng nhập');
			return false;
		} else {
			$.ajax({
				type: "POST",
				url: "../ajax/login_uv_popup.php",
				data: {
					user_name: email.val(),
					password: password.val(),
				},
				success: function (data) {
					if (data == 1) {
						if (href != '') {
							window.location.href = href;
						} else {
							location.reload();
						}
					} else {
						$('.popup_loggin_cv .error').html('Thông tin bạn nhập không chính xác');
					}
				},
			});
		}
	});
	$('.popup_loggin_cv .dkn').click(function () {
		if (!$('.popup_loggin_cv').hasClass('hidden')) {
			$('.popup_loggin_cv .fa-times').click();
			$('.box-modal-create-cv').removeClass('hidden');
		}
	});
	$('#submitButtondn').click(function () {
		if (!$('.box-modal-create-cv').hasClass('hidden')) {
			$('.box-modal-create-cv .close').click();
			$('.popup_loggin_cv').removeClass('hidden');
		}
	});
	$('.open_register,#register').click(function () {
		if ($('.box-modal-create-cv').hasClass('hidden')) {
			$('.box-modal-create-cv').removeClass('hidden');
		}
	});
	$('#txt_search_cv').keyup(function () {
		e = $(this);
		val = e.val();

		$.ajax({
			type: "POST",
			url: "../ajax/search_cate_cv.php",
			dataType: "json",
			data: {
				keyword: val
			}, success: function (data) {
				item = '';
				for (var i = 0; i < data.length; i++) {
					item += "<li><a href=/mau-cv/" + data[i].alias + ".html> CV " + data[i].name.replace('CV', '') + "</a></li>";
				}
				e.parent().next().html(item);
			}
		});
	});
	$('a[href$=".docx"]').html('Tải xuống ngay<sup>.docx</sup>').addClass('download_365');
	$('a[href$=".docx"]').html('Tải xuống ngay<sup>.docx</sup>').addClass('download_365');
	$('a[href$=".doc"]').html('Tải xuống ngay<sup>.doc</sup>').addClass('download_365');
	$('a[href$=".pdf"]').html('Tải xuống ngay<sup>.pdf</sup>').addClass('download_365');
	$('a[href$=".xlsx"]').html('Tải xuống ngay<sup>.xlsx</sup>').addClass('download_365');
	$('a[href$=".xls"]').html('Tải xuống ngay<sup>.xls</sup>').addClass('download_365');
	$('a[href$=".rar"]').html('Tải xuống ngay<sup>.rar</sup>').addClass('download_365').attr("download", "");
	$('a[href$=".zip"]').html('Tải xuống ngay<sup>.zip</sup>').addClass('download_365').attr("download", "");
});
