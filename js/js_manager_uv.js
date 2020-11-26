$(document).ready(function () {
	var url = window.location.pathname;
	function wordCount(data) {
		return $.trim(data).split(/[\s\.\?]+/).length;
	}
	function validateEmail($email) {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		return emailReg.test($email);
	}
	$('a[href="' + url + '"]').parent().parent().addClass('active');
	if ($('a[href="' + url + '"]').parent().parent().find('.sub_menu')) {
		$('a[href="' + url + '"]').parent().parent().find('.sub_menu').addClass('show');
	}
	if ($('a[href="' + url + '"]').parent().parent().find('.sub_menu_manager')) {
		$('a[href="' + url + '"]').parent().parent().find('.sub_menu_manager').addClass('show');
	}
	$('a[href="' + url + '"]').addClass('active');
	$('.top_mb .box_menu .item').click(function () {
		e = $(this);
		if (e.find('.sub_menu_manager')) {
			if (e.find('.sub_menu_manager').hasClass('show') == false) e.find('.sub_menu_manager').addClass('show');
			else e.find('.sub_menu_manager').removeClass('show');
		}
	});
	$('.main_left .menu .item').click(function () {
		e = $(this);
		if (e.find('.sub_menu')) {
			if (e.find('.sub_menu').hasClass('show') == false) e.find('.sub_menu').addClass('show');
			else e.find('.sub_menu').removeClass('show');
		}
	});
	$('.top_mb .box_menu .fa-long-arrow-right').click(function () {
		$('.top_mb .box_menu').addClass('hidden');
	});
	$('.top_mb .fa-th').click(function () {
		$('.top_mb .box_menu').removeClass('hidden');
	});

	$('.refresh_hs').click(function () {
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

	$('.allow_search label input[type=checkbox]').change(function () {
		val = Math.abs($(this).val() - 1);
		$(this).val(val);
		$.ajax({
			type: "POST",
			url: "../ajax/use_show.php",
			data: {
				val: val
			},
			success: function (data) {
				
			}
		});
	});
	$('#information_candi input[type="submit"]').click(function () {
		user_name = $('#user_name');
		user_phone = $('#user_phone');
		birthday = $('#birthday');
		district = $('#district');
		city = $('#city');
		address = $('#address');
		returnForm = true;
		if (user_name.val().length == 0) {
			if (user_name.hasClass('error') == false) {
				user_name.addClass('error');
				user_name.parent().find('label').after('<label class="error error_tt" id="user_name_error">Vui lòng nhập họ tên</label>');
			}
			returnForm = false;
		} else {
			user_name.removeClass('error');
			$('#user_name_error').remove();
		}
		if (user_phone.val() == '') {
			if (user_phone.hasClass('error') == false) {
				user_phone.addClass('error');
				user_phone.parent().find('label').after('<label class="error error_tt" id="user_phone_error">Vui lòng nhập SĐT</label>');
			}
			returnForm = false;
		} else {
			user_phone.removeClass('error');
			$('#user_phone_error').remove();
			pattern = /^[0-9]{10}$/;
			if (!pattern.test(user_phone.val())) {
				if (user_phone.hasClass('error') == false) {
					user_phone.addClass('error');
					user_phone.parent().find('label').after("<label id='user_phone_error' class='error error_tt'>SĐT không hợp lệ</label>");
				}
				returnForm = false;
			} else {
				user_phone.removeClass('error');
				$('#user_phone_error').remove();
			}
		}
		if (birthday.val() == '') {
			if (birthday.hasClass('error') == false) {
				birthday.addClass('error');
				birthday.parent().find('label').after('<label class="error error_tt" id="birthday_error">Chọn ngày sinh của bạn</label>');
			}
			returnForm = false;
		} else {
			birthday.removeClass('error');
			$('#birthday_error').remove();
		}
		if (district.val() == 0) {
			if (district.hasClass('error') == false) {
				district.addClass('error');
				district.parent().find('.select2-container').after('<label class="error error_tt" id="district_error">Vui lòng chọn quận/huyện</label>');
			}
			returnForm = false;
		} else {
			district.removeClass('error');
			$('#district_error').remove();
		}
		if (city.val() == 0) {
			if (city.hasClass('error') == false) {
				city.addClass('error');
				city.parent().find('.select2-container').after('<label class="error error_tt" id="city_error">Vui lòng chọn tỉnh thành</label>');
			}
			returnForm = false;
		} else {
			city.removeClass('error');
			$('#city_error').remove();
		}
		if (address.val() == '') {
			if (address.hasClass('error') == false) {
				address.addClass('error');
				address.after('<label class="error error_tt" id="address_error">Vui lòng nhập địa chỉ</label>');
			}
			returnForm = false;
		} else {
			address.removeClass('error');
			$('#address_error').remove();
		}
		return returnForm;
	});
	$('.main_thongtin .image .camera').click(function () {
		$('input[name="avatar"]').click();
	});
	$('#city').change(function () {
		e = $(this);
		$.ajax({
			type: "POST",
			url: "../ajax/get_quanhuyen.php",
			data: {
				id: e.val()
			}, success: function (data) {
				$('#district').html(data);
			}
		});
	});
	$('.main_thongtin .image #file').change(function () {
		$('#uploadAvatar').click();
	});
	$('#updateUV_cvmm input[type="submit"]').click(function () {
		use_job_name = $('#use_job_name');
		work_option = $('#work_option');
		level_desired = $('#level_desired');
		experience = $('#experience');
		job_city = $('#job_city');
		job_cate = $('#job_cate');
		money = $('#money');
		returnForm = true;
		if (use_job_name.val() == '') {
			if (use_job_name.hasClass('error') == false) {
				use_job_name.addClass('error');
				use_job_name.parent().find('label').after('<label class="error error_tt" id="use_job_name_error">Vui lòng nhập tên công việc mong muốn</label>');
			}
			returnForm = false;
		} else {
			$('#use_job_name_error').remove();
			use_job_name.removeClass('error');
		}
		if (work_option.val() == 0) {
			if (work_option.hasClass('error') == false) {
				work_option.addClass('error');
				work_option.parent().find('label').after('<label class="error error_tt" id="work_option_error">Vui lòng chọn hình thức làm việc</label>');
			}
			returnForm = false;
		} else {
			$('#work_option_error').remove();
			work_option.removeClass('error');
		}
		if (level_desired.val() == 0) {
			if (level_desired.hasClass('error') == false) {
				level_desired.addClass('error');
				level_desired.parent().find('label').after('<label class="error error_tt" id="level_desired_error">Vui lòng chọn cấp bậc mong muốn</label>');
			}
			returnForm = false;
		} else {
			level_desired.removeClass('error');
			$('#level_desired_error').remove();
		}
		if (experience.val() == '') {
			if (experience.hasClass() == false) {
				experience.addClass('error');
				experience.parent().find('label').after('<label class="error error_tt" id="experience_error">Vui lòng chọn kinh nghiệm làm việc</label>');
			}
			returnForm = false;
		} else {
			experience.removeClass('error');
			$('#experience_error').remove();
		}
		if (job_city.val() == '') {
			if (job_city.hasClass('error') == false) {
				job_city.addClass('error');
				job_city.parent().find('label').after('<label class="error error_tt" id="job_city_error">Vui lòng chọn địa điểm làm việc</label>');
			}
			returnForm = false;
		} else {
			job_city.removeClass('error');
			$('#job_city_error').remove();
		}
		if (job_cate.val() == false) {
			if (job_cate.hasClass('error') == false) {
				job_cate.addClass('error');
				job_cate.parent().find('label').after('<label class="error error_tt" id="job_cate_error">Vui lòng chọn ngành nghề mong muốn</label>');
			}
			returnForm = false;
		} else {
			$('#job_cate_error').remove();
			job_cate.removeClass('error');
		}
		if (money.val() == 0) {
			if (money.hasClass('error') == false) {
				money.addClass('error');
				money.parent().find('label').after('<label class="error error_tt" id="money_error">Vui lòng chọn mức lương mong muốn</label>');
			}
			returnForm = false;
		} else {
			money.removeClass('error');
			$('#money_error').remove();
		}
		return returnForm;
	});
	$('#candi_mtnn input[type="submit"]').click(function () {
		mtnn = $('#mtnn');
		if (mtnn.val() == '') {
			if (mtnn.hasClass('error') == false) {
				mtnn.addClass('error');
				mtnn.parent().find('label').after('<label class="error error_tt" id="mtnn_error">Vui lòng nhập mục tiêu nghề nghiệp<label>');
			}
			return false;
		} else {
			mtnn.removeClass('error');
			$('#mtnn_error').remove();
			if (wordCount(mtnn.val()) < 50) {
				if (mtnn.hasClass('error') == false) {
					mtnn.addClass('error');
					mtnn.parent().find('label').after('<label class="error error_tt" id="mtnn_error">Mục tiêu nghề nghiệp bạn phải nhập ít nhất 50 từ<label>');
				}
				return false;
			} else {
				mtnn.removeClass('error');
				$('#mtnn_error').remove();
			}
		}
	});
	$('#candi_knbt input[type="submit"]').click(function () {
		knbt = $('#knbt');
		if (knbt.val() == '') {
			if (knbt.hasClass('error') == false) {
				knbt.addClass('error');
				knbt.parent().find('label').after('<label class="error error_tt" id="knbt_error">Vui lòng nhập kỹ năng bản thân</label>');
			}
			return false;
		} else {
			knbt.removeClass('error');
			$('#knbt_error').remove();
			if (wordCount(knbt.val()) < 50) {
				if (knbt.hasClass('error') == false) {
					knbt.addClass('error');
					knbt.parent().find('label').after('<label class="error error_tt" id="knbt_error">Kỹ năng bản thân bạn phải nhập ít nhất 50 từ</label>');
				}
				return false;
			} else {
				knbt.removeClass('error');
				$('#knbt_error').remove();
			}
		}
	});
	$('#candi_editHV input[type="submit"]').click(function () {
		item = $('#candi_editHV .item_gray');
		i = 0;
		returnForm = true;
		item.each(function () {
			e = $(this);
			bccc = e.find('.bccc');
			school_name = e.find('.school_name');
			start_times = e.find('.start_times');
			end_times = e.find('.end_times');
			majors = e.find('.majors');
			ranks = e.find('.ranks');
			hv_add_infor = e.find('.hv_add_infor');
			if (bccc.val() == '') {
				if (bccc.hasClass('error') == false) {
					bccc.addClass('error');
					bccc.parent().find('label').after('<label class="error error_tt" id="bccc_' + i + '_error">Vui lòng nhập bằng cấp chứng chỉ</label>');
				}
				returnForm = false;
			} else {
				bccc.removeClass();
				$('#bccc_' + i + '_error').remove();
			}
			if (school_name.val() == '') {
				if (school_name.hasClass('error') == false) {
					school_name.addClass('error');
					school_name.parent().find('label').after('<label class="error error_tt" id="school_name_' + i + '_error">Vui lòng nhập tên trường học</label>');
				}
				returnForm = false;
			} else {
				school_name.removeClass('error');
				$('#school_name_' + i + '_error').remove();
			}
			if (start_times.val() == '') {
				if (start_times.hasClass('error') == false) {
					start_times.addClass('error');
					start_times.parent().find('label').after('<label class="error error_tt" id="start_times_' + i + '_error">Vui lòng chọn ngày bắt đầu</label>');
				}
				returnForm = false;
			} else {
				start_times.removeClass('error');
				$('#start_times_' + i + '_error').remove();
			}
			if (end_times.val() == '') {
				if (end_times.hasClass('error') == false) {
					end_times.addClass('error');
					end_times.parent().find('label').after('<label class="error_tt error" id="end_times_' + i + '_error">Vui lòng chọn ngày kết thúc</label>');
				}
				returnForm = false;
			} else {
				end_times.removeClass('error');
				$('#end_times_' + i + '_error').remove();
			}
			if (majors.val() == '') {
				if (majors.hasClass('error') == false) {
					majors.addClass('error');
					majors.parent().find('label').after('<label class="error error_tt" id="majors_' + i + '_error">Vui lòng nhập chuyên ngành học</label>');
				}
				returnForm = false;
			} else {
				majors.removeClass('error');
				$('#majors_' + i + '_error').remove();
			}
			if (ranks.val() == 0) {
				if (ranks.hasClass('error') == false) {
					ranks.addClass('error');
					ranks.parent().find('label').after('<label class="error error_tt" id="ranks_' + i + '_error">Vui lòng chọn xếp loại bằng cấp</label>');
				}
				returnForm = false;
			} else {
				ranks.removeClass('error');
				$('#ranks_' + i + '_error').remove();
			}
			i++;
		});
		return returnForm;
	});
	$('#candi_addHV input[type="submit"]').click(function () {
		bccc = $('#candi_addHV .bccc');
		school_name = $('#candi_addHV .school_name');
		start_times = $('#candi_addHV .start_times');
		end_times = $('#candi_addHV .end_times');
		majors = $('#candi_addHV .majors');
		ranks = $('#candi_addHV .ranks');
		returnForm = true;

		if (bccc.val() == '') {
			if (bccc.hasClass('error') == false) {
				bccc.addClass('error');
				bccc.parent().find('label').after('<label class="error error_tt" id="bccc_error">Vui lòng nhập bằng cấp chứng chỉ</label>');
			}
			returnForm = false;
		} else {
			bccc.removeClass('error');
			$('#bccc_error').remove();
		}
		if (school_name.val() == '') {
			if (school_name.hasClass('error') == false) {
				school_name.addClass('error');
				school_name.parent().find('label').after('<label class="error error_tt" id="school_name_error">Vui lòng nhập tên trường học</label>');
			}
			returnForm = false;
		} else {
			school_name.removeClass('error');
			$('#school_name_error').remove();
		}
		if (start_times.val() == '') {
			if (start_times.hasClass('error') == false) {
				start_times.addClass('error');
				start_times.parent().find('label').after('<label class="error error_tt" id="start_times_error">Vui lòng nhập ngày bắt đầu</label>');
			}
			returnForm = false;
		} else {
			start_times.removeClass('error');
			$('#start_times_error').remove();
		}
		if (end_times.val() == '') {
			if (end_times.hasClass('error') == false) {
				end_times.addClass('error');
				end_times.parent().find('label').after('<label class="error error_tt" id="end_times_error">Vui lòng chọn ngày kết thúc</label>');
			}
			returnForm = false;
		} else {
			end_times.removeClass('error');
			$('#end_times_error').remove();
		}
		if (majors.val() == '') {
			if (majors.hasClass('error') == false) {
				majors.addClass('error');
				majors.parent().find('label').after('<label class="error error_tt" id="majors_error">Vui lòng nhập chuyên ngành học</label>');
			}
			returnForm = false;
		} else {
			majors.removeClass('error');
			$('#majors_error').remove();
		}
		if (ranks.val() == 0) {
			if (ranks.hasClass('error') == false) {
				ranks.addClass('error');
				ranks.parent().find('label').after('<label class="error error_tt" id="majors_error">Vui lòng chọn xếp loại</label>');
			}
			returnForm = false;
		} else {
			ranks.removeClass('error');
			$('#majors_error').remove();
		}
		return returnForm;
	});
	$('#candi_editHV .add.bc').click(function () {
		$('#candi_editHV').addClass('hidden');
		$('#candi_addHV').removeClass('hidden');
	});
	$('.item_gray .btn_clear').click(function () {
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
	$('#candi_editnn input[type="submit"]').click(function () {
		item = $('#candi_editnn .item_gray');
		returnForm = true;
		i = 1;
		item.each(function () {
			e = $(this);
			language = e.find('.language');
			certificate = e.find('.certificate');
			result = e.find('.result');

			if (language.val() == 0) {
				if (language.hasClass('error') == false) {
					language.addClass('error');
					language.after('<label class="error" id="language_' + i + '_error">Vui lòng chọn ngôn ngữ</label>');
				}
				returnForm = false;
			} else {
				language.removeClass('error');
				$('#language_' + i + '_error').remove();
			}
			if (certificate.val() == '') {
				if (certificate.hasClass('error') == false) {
					certificate.addClass('error');
					certificate.after('<label class="error" id="certificate_' + i + '_error">Vui lòng nhập tên chứng chỉ</label>');
				}
				returnForm = false;
			} else {
				certificate.removeClass('error');
				$('#certificate_' + i + '_error').remove();
			}
			if (result.val() == '') {
				if (result.hasClass('error') == false) {
					result.addClass('error');
					result.after('<label class="error" id="result_' + i + '_error">Vui lòng nhập kết quả</label>');
				}
				returnForm = false;
			} else {
				result.removeClass('error');
				$('#result_' + i + '_error').remove();
			}
			i++;
		});
		return returnForm;
	});
	$('#candi_editnn .add').click(function () {
		$('#candi_addnn').removeClass('hidden');
		$('#candi_editnn').addClass('hidden');
	});
	$('#candi_addnn input[type="submit"]').click(function () {
		language = $('#candi_addnn .language');
		certificate = $('#candi_addnn .certificate');
		result = $('#candi_addnn .result');
		returnForm = true;

		if (language.val() == 0) {
			if (language.hasClass('error') == false) {
				language.addClass('error');
				language.after('<label class="error" id="language_error">Vui lòng chọn ngôn ngữ</label>');
			}
			returnForm = false;
		} else {
			language.removeClass('error');
			$('#language_error').remove();
		}
		if (certificate.val() == '') {
			if (certificate.hasClass('error') == false) {
				certificate.addClass('error');
				certificate.after('<label class="error" id="certificate_error">Vui lòng nhập tên chứng chỉ</label>');
			}
			returnForm = false;
		} else {
			certificate.removeClass('error');
			$('#certificate_error').remove();
		}
		if (result.val() == '') {
			if (result.hasClass('error') == false) {
				result.addClass('error');
				result.after('<label class="error" id="result_error">Vui lòng nhập kết quả</label>');
			}
			returnForm = false;
		} else {
			result.removeClass('error');
			$('#result_error').remove();
		}
		return returnForm;
	});
	$('#candi_editknlv input[type="submit"]').click(function () {
		item = $('#candi_editknlv .item_gray');
		i = 1;
		returnForm = true;
		item.each(function () {
			e = $(this);

			position = e.find('.position');
			company = e.find('.company');
			time_starts = e.find('.time_starts');
			time_ends = e.find('.time_ends');
			description = e.find('.description');

			if (position.val() == '') {
				if (position.hasClass('error') == false) {
					position.addClass('error');
					position.parent().find('label').after('<label class="error error_tt" id="position_' + i + '_error">Vui lòng nhập chức danh / vị trí</label>');
				}
				returnForm = false;
			} else {
				position.removeClass('error');
				$('#position_' + i + '_error').remove();
			}
			if (company.val() == '') {
				if (company.hasClass('error') == false) {
					company.addClass('error');
					company.parent().find('label').after('<label class="error error_tt" id="company_' + i + '_error">Vui lòng nhập tên công ty</label>');
				}
				returnForm = false;
			} else {
				company.removeClass('error');
				$('#company_' + i + '_error').remove()
			}
			if (time_starts.val() == '') {
				if (time_starts.hasClass() == false) {
					time_starts.addClass('error');
					time_starts.parent().find('label').after('<label class="error error_tt" id="time_starts_' + i + '_error">Vui lòng chọn ngày bắt đầu</label>');
				}
				returnForm = false;
			} else {
				time_starts.removeClass('error');
				$('#time_starts_' + i + '_error').remove();
			}
			if (time_ends.val() == '') {
				if (time_ends.hasClass() == false) {
					time_ends.addClass('error');
					time_ends.parent().find('label').after('<label class="error error_tt" id="time_ends_' + i + '_error"></label>');
				}
				returnForm = false;
			} else {
				time_ends.removeClass('error');
				$('#time_ends_' + i + '_error').remove();
			}
			i++;
		});
		return returnForm;
	});
	$('#candi_editknlv .add').click(function () {
		$('#candi_editknlv').addClass('hidden');
		$('#candi_addknlv').removeClass('hidden');
	});
	$('#candi_addknlv input[type="submit"]').click(function () {
		position = $('#candi_addknlv .position');
		company = $('#candi_addknlv .company');
		time_starts = $('#candi_addknlv .time_starts');
		time_ends = $('#candi_addknlv .time_ends');
		returnForm = true;
		if (position.val() == '') {
			if (position.hasClass('error') == false) {
				position.addClass('error');
				position.parent().find('label').after('<label class="error error_tt" id="position_error">Vui lòng nhập chức năng / vị trí</label>');
			}
			returnForm = false;
		} else {
			position.removeClass('error');
			$('#position_error').remove();
		}
		if (company.val() == '') {
			if (company.hasClass('error') == false) {
				company.addClass('error');
				company.parent().find('label').after('<label class="error error_tt" id="company_error">Vui lòng nhập tên công ty</label>');
			}
			returnForm = false;
		} else {
			company.remove('error');
			$('#company_error').remove();
		}
		if (time_starts.val() == '') {
			if (time_starts.hasClass('error') == false) {
				time_starts.addClass('error');
				time_starts.parent().find('label').after('<label class="error error_tt" id="time_starts_error">Vui lòng nhập thời gian bắt đầu</label>');
			}
			returnForm = false;
		} else {
			time_starts.removeClass();
			$('#time_starts_error').remove();
		}
		if (time_ends.val() == '') {
			if (time_ends.hasClass('error') == false) {
				time_ends.addClass('error');
				time_ends.parent().find('label').after('<label class="error error_tt" id="time_ends_error">Vui lòng nhập thời gian kết thúc</label>');
			}
			returnForm = false;
		} else {
			time_ends.removeClass();
			$('#time_ends_error').remove();
		}
		return returnForm;
	});
	$('#candi_ntc input[type="submit"]').click(function () {
		ntc = $('#candi_ntc .ntc');
		email = $('#candi_ntc .email');
		position = $('#candi_ntc .position');
		phone_name = $('#candi_ntc .phone_name');
		company = $('#candi_ntc .company');
		returnForm = true;

		if (ntc.val() == '') {
			if (ntc.hasClass('error') == false) {
				ntc.addClass('error');
				ntc.parent().find('label').after('<label class="error error_tt" id="ntc_error">Vui lòng nhập tên người tham thiếu</label>');
			}
			returnForm = false;
		} else {
			ntc.removeClass('error');
			$('#ntc_error').remove();
		}
		if (email.val() == '') {
			if (email.hasClass('error') == false) {
				email.addClass('error');
				email.parent().find('label').after('<label class="error error_tt" id="email_error">Vui lòng nhập Email người tham thiếu</label>');
			}
			returnForm = false;
		} else {
			email.removeClass('error');
			$('#email_error').remove();
			if (!validateEmail(email.val())) {
				if (email.hasClass('error') == false) {
					email.addClass('error');
					email.parent().find('label').after('<label class="error error_tt" id="email_error">Email bạn nhập không hợp lệ</label>');
				}
				returnForm = false;
			} else {
				email.removeClass('error');
				$('#email_error').remove();
			}
		}
		if (position.val() == '') {
			if (position.hasClass('error') == false) {
				position.addClass('error');
				position.parent().find('label').after('<label class="error error_tt" id="position_error">Vui lòng nhập Chức danh</label>');
			}
			returnForm = false;
		} else {
			position.removeClass('error');
			$('#position_error').remove();
		}
		if (phone_name.val() == '') {
			if (phone_name.hasClass('error') == false) {
				phone_name.addClass('error');
				phone_name.parent().find('label').after('<label class="error error_tt" id="phone_name_error">Vui lòng nhập SĐT</label>');
			}
			returnForm = false;
		} else {
			phone_name.removeClass('error');
			$('#phone_name_error').remove();
			pattern = /^[0-9]{10}$/;
			if (!pattern.test(phone_name.val())) {
				if (phone_name.hasClass('error') == false) {
					phone_name.addClass('error');
					phone_name.parent().find('label').after('<label class="error error_tt" id="phone_name_error">SĐT bạn nhập không hợp lệ</label>');
				}
				returnForm = false;
			} else {
				phone_name.removeClass('error');
				$('#phone_name_error').remove();
			}
		}
		if (company.val() == '') {
			if (company.hasClass('error') == false) {
				company.addClass('error');
				company.parent().find('label').after('<label class="error error_tt" id="company_error">Vui lòng nhập tên công ty</label>');
			}
			returnForm = false;
		} else {
			company.removeClass('error');
			$('#company_error').remove();
		}
		return returnForm;
	});
	$('.my_profile .clear').click(function () {
		e = $(this);
		id_profile = e.attr('data-id');
		if (confirm('Bạn có chắc chắn muốn xóa bản ghi này ???')) {
			$.ajax({
				type: "POST",
				url: '../ajax/delete_profile.php',
				dataType: 'json',
				data: {
					id_profile: id_profile
				}, success: function (data) {
					if (data.result == 1) {
						alert(data.messages);
						location.reload();
					}
				}
			});
		}
	});
	$('.my_profile .form_upload p').click(function () {
		$('.my_profile input[name="file"]').click();
	});
	$('.my_profile input[name="file"]').change(function () {
		$('.my_profile #submit').click();
	});
	$('.sent_message .sent').click(function () {
		e = $(this);
		id_candi = e.attr('data-sent');
		id_company = e.attr('data-receiver');
		id_reply = e.attr('data_id_reply');
		title = $('.popup.sent_message .item input[type="text"]');
		content = $('.popup.sent_message .item textarea');

		if (title.val() == '') {
			if (title.hasClass('error') == false) {
				title.parent().find('label').after('<label class="error error_tt" id="title_error">Vui lòng nhập tiêu đề</label>');
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
				content.parent().find('label').after('<label class="error error_tt" id="content_error">Vui lòng nhập nội dung tin nhắn</label>');
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
				receiver: id_company,
				sender: id_candi,
				id_reply: id_reply
			}, success: function (data) {
				if (data == 1) {
					alert("Bạn đã gửi tin nhắn cho NTD thành công !!");
					$('.popup.sent_message .cancel').click();
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
});
function func_daidien(id){
	if(confirm("Bạn chắc chắn muốn đặt cv này làm cv đại diện")){	
		$.ajax({
			type:"POST",
			url: "../ajax/update_daidiencv.php",
			data: {
				id_cv : id
			},
			success:function(data){
				if(data == 1){
					alert("Cập nhật ảnh đại diện thành công");
				}
			}
		});
	}
}