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
	return str.toLowerCase().replace(/(^|\s)\S/g, function (l) {
		return l.toUpperCase();
	});
}
function detect_keywword($text) {
	var TextReg = /9dash|ấu dâm|bạc bịp|bán dâm|bán nước|bán phụ nữ|bán thân|bạo động|bạo loạn|bạo lực gia đình|bạo lực học đường|biển đông|biển tây nam|biểu tình|buôn người|buôn phụ nữ|buôn trẻ em|cá cược|cá độ|chích hút|chiến tranh|chống chính quyền|chủ quyền biên giới|chuyển quyền biển đảo|cờ vàng việt nam|cộng hòa dân chủ|corona|covid 19|covid-19|đả đảo|dân chủ cộng hòa|đảng phái chính trị|đánh bạc|đường lưỡi bò|gái điếm|gái gọi|giặc ngoại xâm|giai cấp|giết|giết người|havesex|Hoàng Sa|khủng bố|kích động|kích dục|lãnh hải|miếu môn|ninedash|phản động|phản loạn|phản quốc|quần đảo|porn|quốc hội|sex|tham nhũng|Nguyễn Phú Trọng|Nguyễn Tấn Dũng|Đinh La Thăng|Nguyễn Hoàng Anh|Chu Ngọc Anh|Nguyễn Thúy Anh|Trần Tuấn Anh|Hà Ban|Nguyễn Hòa Bình|Trương Hòa Bình|Trần Đại Quang|Tô Lâm|Bùi Văn Cường|Phạm Viết Thanh|Nguyễn Quang Dương|Sơn Minh Thắng|Lê Hoài Trung|Tô Huy Rứa|Phạm Minh Chính|Trần Quốc Vượng|Trần Cẩm Tú|Đinh Thế Huynh|Vương Đình Huệ|Nguyễn Thị Kim Ngân|Tòng Thị Phóng|Bác Hồ|Võ Văn Thưởng|Hà Thị Khiết|Nguyễn Văn Nên|Phan Đình Trạc|Thuận Hữu|Nguyễn Thiện Nhân|Hoàng Trung Hải|Vũ Đức Đam|Trịnh Đình Dũng|Ngô Xuân Lịch|Lê Vĩnh Tân|Lê Thành Long|Đinh Tiến Dũng|Chu Ngọc Anh|Nguyễn Xuân Cường|Phùng Xuân Nha|Nguyễn Kim Tiến|Mai Tiến Dũng/;
	return TextReg.test($text);
}
function wordCount(data) {
	return $.trim(data).split(/[\s\.\?]+/).length;
}
function checkTitle($text) {
	var Text = /Tuyển gấp|tuyển Gấp|tuyển gấp|Tuyển gấp|hot |Cần gấp|cần Gấp|Cần Gấp|lương cao|Lương cap|Lương Cao|lương Cao/;
	return Text.test($text);
}
function checkKTDB($text) {
	var format = /[!@#$%^&.*+?{}()|[\]\\]/g;
	return format.test($text);
}
$(document).ready(function () {
	$('#title_new').keyup(function () {
		var title_new = $(this);
		title_new.removeClass('error');
		$('#title_new_error').remove();
		$('#title_new_error2').remove();
		if (title_new.val().length == 0) {
			if (title_new.hasClass('error') == false) {
				title_new.addClass('error');
				title_new.after("<label class='error' id='title_new_error'>Vui lòng nhập vị trí tuyển dụng</label>");
			}
		} else {
			title_new.removeClass('error');
			$('#title_new_error').remove();
			$('#title_new_error2').remove();
			if (checkTitle(title_new.val()) || checkKTDB(title_new.val())) {
				if (title_new.hasClass('error') == false) {
					title_new.addClass('error');
					if (checkTitle(title_new.val())) {
						title_new.after("<label class='error' id='title_new_error'>Tiêu đề tin tuyển dụng KHÔNG chứa các nội dung như: Tuyển gấp, hot, cần gấp, lương cao.</label>");
					}
					if (checkKTDB(title_new.val())) {
						title_new.after("<label class='error' id='title_new_error2'>Tiêu đề tin tuyển dụng KHÔNG chứa các ký tự đặc biệt</label>");
					}
				}
			} else {
				title_new.removeClass('error');
				$('#title_new_error').remove();
				$('#title_new_error2').remove();
			}
		}
	});

	$('#title_new').blur(function () {
		var title_new = $(this);
		var returnForm = true;
		if (title_new.val().length == 0) {
			if (title_new.hasClass('error') == false) {
				title_new.addClass('error');
				title_new.after("<label class='error' id='title_new_error'>Vui lòng nhập vị trí tuyển dụng</label>");
			}
		} else {
			title_new.removeClass('error');
			$('#title_new_error').remove();
			$('#title_new_error2').remove();
			if (checkTitle(title_new.val()) || checkKTDB(title_new.val())) {
				if (title_new.hasClass('error') == false) {
					title_new.addClass('error');
					if (checkTitle(title_new.val())) {
						title_new.after("<label class='error' id='title_new_error'>Tiêu đề tin tuyển dụng KHÔNG chứa các nội dung như: Tuyển gấp, hot, cần gấp, lương cao.</label>");
					}
					if (checkKTDB(title_new.val())) {
						title_new.after("<label class='error' id='title_new_error2'>Tiêu đề tin tuyển dụng KHÔNG chứa các ký tự đặc biệt</label>");
					}
				}
			} else {
				title_new.removeClass('error');
				$('#title_new_error').remove();
				$('#title_new_error2').remove();
				var cate = $(this).attr('data-cate');
				var id = '';
				if (cate == 'edit_new') {
					id = $(this).attr('data-id');
				}
				$.ajax({
					async: false,
					type: "POST",
					url: "../../ajax/checkTitle.php",
					data: {
						title_new: title_new.val(),
						cate: cate,
						id: id
					}, success: function (data) {
						if (data > 0) {
							returnForm = false;
						}
					}
				});
				if (returnForm == false) {
					if (title_new.hasClass('error') == false) {
						title_new.addClass('error');
						title_new.after("<label class='error' id='title_new_error'>Tiêu đề tin đăng đã tồn tại</label>");
					}
				} else {
					title_new.removeClass('error');
					$('#title_new_error').remove();
					$('#title_new_error2').remove();
				}
			}
		}
	});

	$('.dangtin #capbac').change(function () {
		var capbac = $(this);
		if (capbac.val() == 0) {
			if (capbac.hasClass('error') == false) {
				capbac.addClass('error');
				capbac.prev().after("<label class='error tt' id='capbac_error'>Vui lòng chọn cấp bậc</label>");
			}
		} else {
			capbac.removeClass('error');
			$('#capbac_error').remove()
		}
	});

	$('.dangtin #hinhthuc').change(function () {
		var hinhthuc = $(this);
		if (hinhthuc.val() == 0) {
			if ($('#select2-hinhthuc-container').parent().hasClass('error') == false) {
				$('#select2-hinhthuc-container').parent().addClass('error');
				$('#select2-hinhthuc-container').parent().append("<label class='error' id='hinhthuc_error'>Chọn hình thức làm việc</label>");
			}
		} else {
			$('#select2-hinhthuc-container').parent().removeClass('error');
			$('#hinhthuc_error').remove()
		}
	});

	$('.dangtin #ml').change(function () {
		var ml = $(this);
		if (ml.val() == 0) {
			if (ml.hasClass('error') == false) {
				ml.addClass('error');
				ml.prev().after("<label class='error tt' id='ml_error'>Vui lòng chọn mức lương</label>");
			}
		} else {
			ml.removeClass('error');
			$('#ml_error').remove()
		}
	});

	$('.dangtin #kn').change(function () {
		var kn = $(this);
		if (kn.val() == '') {
			if ($('#select2-kn-container').parent().hasClass('error') == false) {
				$('#select2-kn-container').parent().addClass('error');
				$('#select2-kn-container').parent().append("<label class='error' id='kn_error'>Vui lòng chọn kinh nghiệm</label>");
			}
		} else {
			$('#select2-kn-container').parent().removeClass('error');
			$('#kn_error').remove()
		}
	});

	$('.dangtin #dangtin_tt').change(function () {
		var dangtin_tt = $(this);
		if (dangtin_tt.val() == 0) {
			if (dangtin_tt.parent().hasClass('error') == false) {
				dangtin_tt.parent().addClass('error');
				dangtin_tt.parent().append("<label class='error' id='dangtin_tt_error'>Vui lòng chọn tỉnh thành bạn muốn làm việc</label>");
			}
		} else {
			dangtin_tt.parent().removeClass('error');
			$('#dangtin_tt_error').remove()
		}
	});

	$('.dangtin .nganhnghe').change(function () {
		var nganhnghe = $(this);
		if (nganhnghe.val() == '') {
			if (nganhnghe.parent().hasClass('error') == false) {
				nganhnghe.parent().addClass('error');
				nganhnghe.parent().append("<label class='error' id='nganhnghe_error'>Vui lòng chọn ngành nghề</label>");
			}
			$('.add_category').addClass('hidden');
			nganhnghe.parent().next().find('.slTag').html('');
		} else {
			nganhnghe.parent().removeClass('error');
			nganhnghe.parent().find('#nganhnghe_error').remove();
			if ($('.item_category.hidden').length > 0) {
				$('.add_category').removeClass('hidden');
			}

			$.ajax({
				type: "POST",
				url: "../../ajax/getKeyTag.php",
				dataType: "Json",
				data: {
					idType: nganhnghe.val()
				}, success: function (data) {
					item = "";
					for (var i = 0; i < data.length; i++) {
						item += "<option value=" + data[i].tagId + ">" + data[i].tagName + "</option>";
					}
					nganhnghe.parent().next().find('.slTag').html(item);
				}
			});
		}
	});

	$('.dangtin #mota').keyup(function () {
		var mota = $(this);
		if (mota.val() == '') {
			if (mota.hasClass('error') == false) {
				mota.addClass('error');
				mota.after("<label class='error' id='mota_error' style='width:90%'>Vui lòng nhập mô tả công việc</label>");
			}
			$('#word_mota').html('0');
		} else {
			mota.removeClass('error');
			$('#mota_error').remove();
			var Count = wordCount(mota.val());
			$('#word_mota').html(Count);
		}
	});

	$('.dangtin #mota').blur(function () {
		var mota = $(this);
		if (mota.val() == '') {
			if (mota.hasClass('error') == false) {
				mota.addClass('error');
				mota.after("<label class='error' id='mota_error' style='width:90%'>Vui lòng nhập mô tả công việc</label>");
			}
		} else {
			mota.removeClass('error');
			$('#mota_error').remove();
		}
	});

	$('.dangtin #yeucau').keyup(function () {
		var yeucau = $(this);
		if (yeucau.val() == '') {
			if (yeucau.hasClass('error') == false) {
				yeucau.addClass('error');
				yeucau.after("<label class='error' id='yeucau_error' style='width:90%'>Vui lòng nhập yêu cầu công việc</label>");
			}
			$('#word_yeucau').html('0');
		} else {
			yeucau.removeClass('error');
			$('#yeucau_error').remove();
			var Count = wordCount(yeucau.val());
			$('#word_yeucau').html(Count);
		}
	});

	$('.dangtin #yeucau').blur(function () {
		var yeucau = $(this);
		if (yeucau.val() == '') {
			if (yeucau.hasClass('error') == false) {
				yeucau.addClass('error');
				yeucau.after("<label class='error' id='yeucau_error' style='width:90%'>Vui lòng nhập yêu cầu công việc</label>");
			}
		} else {
			yeucau.removeClass('error');
			$('#yeucau_error').remove();
		}
	});

	$('.dangtin #quyenloi').keyup(function () {
		var quyenloi = $(this);
		if (quyenloi.val() == '') {
			if (quyenloi.hasClass('error') == false) {
				quyenloi.addClass('error');
				quyenloi.after("<label class='error' id='quyenloi_error' style='width:90%'>Vui lòng nhập quyền lợi</label>");
			}
			$('#word_quyenloi').html('0');
		} else {
			quyenloi.removeClass('error');
			$('#quyenloi_error').remove();
			var Count = wordCount(quyenloi.val());
			$('#word_quyenloi').html(Count);
		}
	});

	$('.dangtin #quyenloi').blur(function () {
		var quyenloi = $(this);
		if (quyenloi.val() == '') {
			if (quyenloi.hasClass('error') == false) {
				quyenloi.addClass('error');
				quyenloi.after("<label class='error' id='quyenloi_error' style='width:90%'>Vui lòng nhập quyền lợi</label>");
			}
		} else {
			quyenloi.removeClass('error');
			$('#quyenloi_error').remove();
		}
	});

	$('.dangtin #han_nop_ho_so').change(function () {
		var han_nop_ho_so = $(this);
		if (han_nop_ho_so.val() == '') {
			if (han_nop_ho_so.hasClass('error') == false) {
				han_nop_ho_so.addClass('error');
				han_nop_ho_so.append("<label class='error' id='han_nop_ho_so_error'>Vui lòng chọn hạn nộp</label>");
			}
		} else {
			han_nop_ho_so.removeClass('error');
			$('#han_nop_ho_so_error').remove()
		}
	});

	$('.box_update .avatar span').click(function () {
		$('input[name="avatar"]').click();
	});
	$('input[name="avatar"]').change(function () {
		$('#submit_avatar').click();
	});
	$('#showbox_image').click(function () {
		$('#form_dk_ntd input[name="upLoadAvatar"]').click();
	});
	$('.form_update #name_company').keyup(function () {
		var name_com = $(this);
		if (name_com.val() == '') {
			if (name_com.hasClass('error') == false) {
				name_com.addClass('error');
				name_com.after("<label id='name_com_error' class='error'>Vui lòng nhập tên công ty</label>");
			}
		} else {
			name_com.removeClass('error');
			$('#name_com_error').remove();
		}
	});

	$('.form_update #name_company').blur(function () {
		var name_com = $(this);
		if (name_com.val() == '') {
			if (name_com.hasClass('error') == false) {
				name_com.addClass('error');
				name_com.after("<label id='name_com_error' class='error'>Vui lòng nhập tên công ty</label>");
			}
		} else {
			$.ajax({
				type: "POST",
				url: "../ajax/checktrungNTD1.php",
				data: {
					valCompany: name_com.val()
				},
				success: function (data) {
					if (data > 0) {
						if (name_com.hasClass('error') == false) {
							name_com.addClass('error');
							name_com.after("<label id='name_com_error' class='error'>Tên công ty đã tồn tại</label>");
						}
					} else {
						name_com.removeClass('error');
						$('#name_com_error').remove();
					}
				}
			});
		}
	});

	$('.form_update #usc_address').keyup(function () {
		var address_com = $(this);
		if (address_com.val() == '') {
			if (address_com.hasClass('error') == false) {
				address_com.addClass('error');
				address_com.after("<label id='address_com_error' class='error'>Vui lòng nhập địa chỉ hiện tại</label>");
			}
		} else {
			address_com.removeClass('error');
			$('#address_com_error').remove();
		}
	});

	$('.ttcn .main_edit #tt_ntd').change(function () {
		var tt = $(this);
		if (tt.val() == 0) {
			if ($('#select2-tt_ntd-container').parent().hasClass('error') == false) {
				$('#select2-tt_ntd-container').parent().addClass('error');
				tt.parent().append("<label id='tt_ntd_error' class='error'>Vui lòng chọn thành phố</label>");
			}
		} else {
			tt.parent().removeClass('error');
			$('#tt_ntd_error').remove();
		}
	});

	$('.form_update #usc_size').change(function () {
		var quymo = $(this);
		if (quymo.val() == 0) {
			if (quymo.parent().hasClass('error') == false) {
				quymo.parent().addClass('error');
				quymo.parent().append("<label id='quymo_error' class='error'>Vui lòng chọn quy mô</label>");
			}
		} else {
			quymo.parent().removeClass('error');
			$('#quymo_error').remove();
		}
	});

	$('.form_update #usc_phone').keyup(function () {
		var phone_com = $(this);
		if (phone_com.val() == '') {
			if (phone_com.hasClass('error') == false) {
				phone_com.addClass('error');
				phone_com.after("<label id='phone_com_error' class='error'>Vui lòng nhập số điện thoại</label>");
			}
		} else {
			phone_com.removeClass('error');
			$('#phone_com_error').remove();
		}
	});

	$('.form_update #usc_phone').blur(function () {
		var phone_com = $(this);
		if (phone_com.val() == '') {
			if (phone_com.hasClass('error') == false) {
				phone_com.addClass('error');
				phone_com.after("<label id='phone_com_error' class='error'>Vui lòng nhập số điện thoại</label>");
			}
		} else {
			phone_com.removeClass('error');
			$('#phone_com_error').remove();
		}
	});
	$('.form_update #password_first').keyup(function () {
		var password = $(this);

		if (password.val() == '') {
			if (password.hasClass('error') == false) {
				password.addClass('error');
				password.after("<label class='error' id='password_first_error'>Vui lòng nhập mật khẩu hiện tại</label>");
			}
		} else {
			password.removeClass('error');
			$('#password_first_error').remove();
		}
	});

	$('.form_update #password_first').blur(function () {
		var password = $(this);

		if (password.val() == '') {
			if (password.hasClass('error') == false) {
				password.addClass('error');
				password.after("<label class='error' id='password_first_error'>Vui lòng nhập mật khẩu hiện tại</label>");
			}
		} else {
			$('#password_first_error').remove();
			password.removeClass('error');
			//Check trùng với mật khẩu trong DB
			$.ajax({
				async: false,
				type: "POST",
				url: "../ajax/checkpass_ntd.php",
				data: {
					password: password.val()
				},
				success: function (data) {
					if (data != 1) {
						if ($('.form_update #password_first').hasClass('error') == false) {
							$('.form_update #password_first').addClass('error');
							$('.form_update #password_first').after("<label class='error' id='password_first_error'>Mật khẩu bạn vừa nhập không đúng</label>");
						}
					} else {
						$('.form_update #password_first').removeClass('error');
						$('#password_first_error').remove();
					}
				}
			});
		}
	});

	$('.form_update #password_second').keyup(function () {
		var password = $(this);
		if (password.val() == '') {
			if (password.hasClass('error') == false) {
				password.addClass('error');
				password.after("<label class='error' id='password_second_error'>Vui lòng nhập mật khẩu mới</label>");
			}
		} else {
			password.removeClass('error');
			$('#password_second_error').remove();
		}
	});

	$('.form_update #password_second').blur(function () {
		var password = $(this);
		if (password.val() == '') {
			if (password.hasClass('error') == false) {
				password.addClass('error');
				password.after("<label class='error' id='password_second_error'>Vui lòng nhập mật khẩu mới</label>");
			}
		} else {
			password.removeClass('error');
			$('#password_second_error').remove();
		}
	});
	$('.form_update #re_password_second').blur(function () {
		var password = $(this);
		var password_first = $('.form_update #password_first');
		if (password.val() != password_first.val()) {
			if (password.hasClass('error') == false) {
				password.addClass('error');
				password.after("<label id='re_password_second_error' class='error'>Mật khẩu bạn nhập lại không chính xác, vui lòng thử lại!!</label>");
			}
		} else {
			password.removeClass('error');
			$('#re_password_second_error').remove();
		}
	});
	$('.form_update #usc_name').keyup(function () {
		var user_contact = $(this);
		if (user_contact.val() == '') {
			if (user_contact.hasClass('error') == false) {
				user_contact.addClass('error');
				user_contact.after("<label id='user_contact_error' class='error'>Vui lòng nhập tên người liên hệ</label>");
			}
		} else {
			user_contact.removeClass('error');
			$('#user_contact_error').remove();
			user_contact.val(titleCase(user_contact.val()));
		}
	});

	$('.form_update #usc_name').blur(function () {
		var user_contact = $(this);
		if (user_contact.val() == '') {
			if (user_contact.hasClass('error') == false) {
				user_contact.addClass('error');
				user_contact.after("<label id='user_contact_error' class='error'>Vui lòng nhập tên người liên hệ</label>");
			}
		} else {
			user_contact.removeClass('error');
			$('#user_contact_error').remove();
		}
	});

	$('.form_update #usc_name_add').keyup(function () {
		var address_contact = $(this);
		if (address_contact.val() == '') {
			if (address_contact.hasClass('error') == false) {
				address_contact.addClass('error');
				address_contact.after("<label id='address_contact_error' class='error'>Vui lòng nhập địa chỉ liên hệ</label>");
			}
		} else {
			address_contact.removeClass('error');
			$('#address_contact_error').remove();
		}
	});

	$('.form_update #usc_name_add').blur(function () {
		var address_contact = $(this);
		if (address_contact.val() == '') {
			if (address_contact.hasClass('error') == false) {
				address_contact.addClass('error');
				address_contact.after("<label id='address_contact_error' class='error'>Vui lòng nhập địa chỉ liên hệ</label>");
			}
		} else {
			address_contact.removeClass('error');
			$('#address_contact_error').remove();
		}
	});

	$('.form_update #usc_name_phone').keyup(function () {
		var phone_contact = $(this);
		if (phone_contact.val() == '') {
			if (phone_contact.hasClass('error') == false) {
				phone_contact.addClass('error');
				phone_contact.after("<label id='phone_contact_error' class='error'>Vui lòng nhập số điện thoại liên hệ</label>");
			}
		} else {
			phone_contact.removeClass('error');
			$('#phone_contact_error').remove();
		}
	});

	$('.form_update #usc_name_phone').blur(function () {
		var phone_contact = $(this);
		if (phone_contact.val() == '') {
			if (phone_contact.hasClass('error') == false) {
				phone_contact.addClass('error');
				phone_contact.after("<label id='phone_contact_error' class='error'>Vui lòng nhập số điện thoại liên hệ</label>");
			}
		} else {
			phone_contact.removeClass('error');
			$('#phone_contact_error').remove();
		}
	})

	$('.form_update #usc_name_email').keyup(function () {
		var email_contact = $(this);
		if (email_contact.val() == '') {
			if (email_contact.hasClass('error') == false) {
				email_contact.addClass('error');
				email_contact.after("<label id='email_contact_error' class='error'>Vui lòng nhập Email liên hệ</label>");
			}
		} else {
			email_contact.removeClass('error');
			$('#email_contact_error').remove();
			if (validateEmail(email_contact.val()) == false) {
				if (email_contact.hasClass('error') == false) {
					email_contact.addClass('error');
					email_contact.after("<label id='email_contact_error' class='error'>Định dạng Email không đúng</label>");
				}
			} else {
				email_contact.removeClass('error');
				$('#email_contact_error').remove();
			}
		}
	});

	$('.form_update #usc_name_email').blur(function () {
		var email_contact = $(this);
		if (email_contact.val() == '') {
			if (email_contact.hasClass('error') == false) {
				email_contact.addClass('error');
				email_contact.after("<label id='email_contact_error' class='error'>Vui lòng nhập Email liên hệ</label>");
			}
		} else {
			email_contact.removeClass('error');
			$('#email_contact_error').remove();
			if (validateEmail(email_contact.val()) == false) {
				if (email_contact.hasClass('error') == false) {
					email_contact.addClass('error');
					email_contact.after("<label id='email_contact_error' class='error'>Định dạng Email không đúng</label>");
				}
			} else {
				email_contact.removeClass('error');
				$('#email_contact_error').remove();
			}
		}
	})
	$('#sdt').keyup(function () {
		var sdt = $(this);
		if (sdt.val() == '') {
			if (sdt.hasClass('error') == false) {
				sdt.addClass('error');
				sdt.after('<label id="sdt_error" class="error">Vui lòng nhập số điện thoại</label>');
			}
		} else {
			sdt.removeClass('error');
			$('#sdt_error').remove();
		}
	});

	$('#sdt').blur(function () {
		var sdt = $(this);
		if (sdt.val() == '') {
			if (sdt.hasClass('error') == false) {
				sdt.addClass('error');
				sdt.after('<label id="sdt_error" class="error">Vui lòng nhập số điện thoại</label>');
			}
		} else {
			sdt.removeClass('error');
			$('#sdt_error').remove();
		}
	});

	$('#password').keyup(function () {
		var password = $(this);

		if (password.val() == '') {
			if (password.hasClass('error') == false) {
				password.addClass('error');
				password.after("<label id='password_error' class='error'>Vui lòng nhập mật khẩu</label>");
			}
		} else {
			password.removeClass('error');
			$('#password_error').remove();
			if (password.val().length < 6 && password.val() != '') {
				if (password.hasClass('error') == false) {
					password.addClass('error');
					password.after("<label id='password_error' class='error'>Mật khẩu phải ít nhất 6 ký tự</label>");
				}
			} else {
				password.removeClass('error');
				$('#password_error').remove();
			}
		}
	});

	$('#re_password').keyup(function () {
		var re_password = $(this);
		var password = $('#password');
		if (re_password.val() == '') {
			if (re_password.hasClass('error') == false) {
				re_password.addClass('error');
				re_password.after("<label id='re_password_error' class='error'>Vui lòng nhập lại mật khẩu</label>");
			}
		} else {
			re_password.removeClass('error');
			$('#re_password_error').remove();
			if (password.val() != re_password.val()) {
				if (re_password.hasClass('error') == false) {
					re_password.addClass('error');
					re_password.after("<label id='re_password_error' class='error'>Mật khẩu nhập lại không trùng khớp</label>");
				}
			} else {
				re_password.removeClass('error');
				$('#re_password_error').remove();
			}
		}
	});

	$('.name_company').keyup(function () {
		var name_company = $(this);
		if (name_company.val() == '') {
			if (name_company.hasClass('error') == false) {
				name_company.addClass('error');
				name_company.after("<label id='name_company_error' class='error'>Vui lòng nhập tên công ty</label>");
			}
		} else {
			name_company.removeClass('error');
			$('#name_company_error').remove();
		}
	});

	$('.name_company').blur(function () {
		var name_company = $(this);
		if (name_company.val() == '') {
			if (name_company.hasClass('error') == false) {
				name_company.addClass('error');
				name_company.after("<label id='name_company_error' class='error'>Vui lòng nhập tên công ty</label>");
			}
		} else {
			name_company.removeClass('error');
			$('#name_company_error').remove();

			$.ajax({
				type: "POST",
				url: "../ajax/checktrungNTD.php",
				data: {
					valCompany: name_company.val()
				},
				success: function (data) {
					if (data > 0) {
						if (name_company.hasClass('error') == false) {
							name_company.addClass('error');
							name_company.after("<label id='name_company_error' class='error'>Tên công ty đã được đăng ký</label>");
						}
					} else {
						name_company.removeClass('error');
						$('#name_company_error').remove();
					}
				}
			});
		}
	});

	$('.frm_address').keyup(function () {
		var frm_address = $(this);
		if (frm_address.val() == '') {
			if (frm_address.hasClass('error') == false) {
				frm_address.addClass('error');
				frm_address.after('<label id="frm_address_error" class="error">Vui lòng nhập địa chỉ</label>');
			}
		} else {
			frm_address.removeClass('error');
			$('#frm_address_error').remove();
		}
	});

	$('.frm_address').blur(function () {
		var frm_address = $(this);
		if (frm_address.val() == '') {
			if (frm_address.hasClass('error') == false) {
				frm_address.addClass('error');
				frm_address.after('<label id="frm_address_error" class="error">Vui lòng nhập địa chỉ</label>');
			}
		} else {
			frm_address.removeClass('error');
			$('#frm_address_error').remove();
			show_hidden_address();
		}
	});

	$('#gioithieu').keyup(function () {
		var gioithieu = $(this);
		if (gioithieu.val() == '') {
			if (gioithieu.hasClass('error') == false) {
				gioithieu.addClass('error');
				gioithieu.after('<label id="gioithieu_error" class="error">Vui lòng nhập giới thiệu công ty</label>');
			}
			$('#countword').html('0');
		} else {
			gioithieu.removeClass('error');
			$('#gioithieu_error').remove();
			var Count = wordCount(gioithieu.val());
			$('#countword').html(Count)
		}
	});

	$('#gioithieu').blur(function () {
		var gioithieu = $(this);
		if (gioithieu.val() == '') {
			if (gioithieu.hasClass('error') == false) {
				gioithieu.addClass('error');
				gioithieu.after('<label id="gioithieu_error" class="error">Vui lòng nhập giới thiệu công ty</label>');
			}
		} else {
			gioithieu.removeClass('error');
			$('#gioithieu_error').remove();
		}
	});

	$('#city').change(function () {
		var city = $(this);
		if (city.val() == 0) {
			if (city.hasClass('error') == false) {
				city.addClass('error');
				city.parent().append("<label id='city_error' class='error'>Vui lòng chọn tỉnh / thành phố</label>");
			}
		} else {
			city.removeClass('error');
			$('#city_error').remove();
			show_hidden_address();
		}
	});
	$('#qh').change(function () {
		var qh = $(this);
		if (qh.val() == 0) {
			if (!qh.hasClass('error')) {
				qh.addClass('error');
				qh.parent().append("<label id='qh_error' class='error'>Vui lòng chọn quận / huyện</label>");
			}
		} else {
			qh.removeClass('error');
			$('#qh_error').remove();
			show_hidden_address();
		}
	});

	$('#add-address').click(function () {
		$('#address_container').removeClass('hidden');
		$(this).addClass('hidden');
	});
	$('#financial_sector').change(function () {
		e = $(this);
		if (e.val() == '') {
			if (!e.parent().hasClass('error')) {
				e.parent().addClass('error');
				e.parent().append('<label class="error" id="financial_sector_error">Bạn chưa chọn lĩnh vực hoạt động</label>');
			}
		} else {
			e.parent().remove('error');
			$('#financial_sector_error').remove();
		}
	});
	// vali_Register
	$('#form_dk_ntd [name="Submit"]').click(function () {
		var form_data = new FormData();
		var checkip = true;
		var formSubmit = true;
		$.ajax({
			type: "POST",
			url: "../ajax/checkip.php",
			dataType: 'json',
			async: false,
			success: function (data) {
				if (data.result == false) {
					alert(data.msg);
					checkip = false;
				}
			}
		});
		if (checkip == false) {
			return false;
		}

		var logo = $('input[name="upLoadAvatar"]');
		if (logo.val() == '') {
			if ($('#showbox_image').hasClass('error') == false) {
				$('#showbox_image').addClass('error');
				$('#showbox_image').after("<label class='error' id='logo_error'>Vui lòng tải lên ảnh logo của công ty bạn</label>");
			}
			formSubmit = false;
		} else {
			$('#showbox_image').removeClass('error');
			$('#logo_error').remove();
		}

		var email = $('#email');
		form_data.append('email_ntd', email.val());
		if (email.val().length == 0) {
			if (email.hasClass('error') == false) {
				email.addClass('error');
				email.after("<label id='email_lg_error' class='error'>Vui lòng nhập Email</label>");
			}
			formSubmit = false;
		} else {
			email.removeClass("error");
			$('#email_lg_error').remove();
			if (validateEmail(email.val()) == false) {
				if (email.hasClass('error') == false) {
					email.addClass('error');
					email.after("<label id='email_lg_error' class='error'>Định dạng Email không đúng</label>");
				}
				formSubmit = false;
			} else {
				email.removeClass("error");
				$('#email_lg_error').remove();
				var check = true;
				$.ajax({
					type: 'POST',
					url: "../ajax/checkInfoCompany.php",
					async: false,
					dataType: 'json',
					data: {
						email: email.val()
					},
					success: function (data) {
						if (data.result == false) {
							if (email.hasClass('error') == false) {
								email.addClass('error');
								email.after("<label id='email_lg_error' class='error'>" + data.msg + "</label>");
								formSubmit = false;
							}
						}
					}
				});
			}
		}

		var password = $('#password');
		form_data.append('password_first', password.val());
		if (password.val() == '') {
			if (password.hasClass('error') == false) {
				password.addClass('error');
				password.after("<label id='password_error' class='error'>Vui lòng nhập mật khẩu</label>");
			}
			formSubmit = false;
		} else {
			password.removeClass('error');
			$('#password_error').remove();
			if (password.val().length < 6) {
				if (password.hasClass('error') == false) {
					password.addClass('error');
					password.after("<label id='password_error' class='error'>Mật khẩu phải ít nhất 6 ký tự</label>");
				}
				formSubmit = false;
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
			formSubmit = false;
		} else {
			re_password.removeClass('error');
			$('#re_password_error').remove();
			if (password.val() != re_password.val()) {
				if (re_password.hasClass('error') == false) {
					re_password.addClass('error');
					re_password.after("<label id='re_password_error' class='error'>Mật khẩu nhập lại không trùng khớp</label>");
				}
				formSubmit = false;
			} else {
				re_password.removeClass('error');
				$('#re_password_error').remove();
			}
		}

		var name_company = $('.name_company');
		form_data.append('user_name', name_company.val());
		if (name_company.val() == '') {
			if (!name_company.hasClass('error')) {
				name_company.addClass('error');
				name_company.after("<label id='name_company_error' class='error'>Vui lòng nhập tên công ty</label>");
			}
			formSubmit = false;
		} else {
			name_company.removeClass('error');
			$('#name_company_error').remove();

			$.ajax({
				type: "POST",
				async: false,
				url: "../ajax/checkInfoCompany.php",
				dataType: 'json',
				data: {
					name_company: name_company.val()
				},
				success: function (data) {
					if (data.result == false) {
						if (!name_company.hasClass('error')) {
							name_company.addClass('error');
							name_company.after("<label id='name_company_error' class='error'>Tên công ty đã được đăng ký</label>");
							formSubmit = false;
						}
					}
				}
			});
		}

		var DateOfIncorporation = $('#DateOfIncorporation');
		form_data.append('DateOfIncorporation', DateOfIncorporation.val());
		if (DateOfIncorporation.val() == '') {
			if (!DateOfIncorporation.hasClass('error')) {
				DateOfIncorporation.addClass('error');
				DateOfIncorporation.after('<label class="error" id="DateOfIncorporation_error">Bạn hãy nhập ngày thành lập công ty</label>');
			}
			formSubmit = false;
		} else {
			$('#DateOfIncorporation_error').remove();
			DateOfIncorporation.removeClass('error');
		}

		var loai_hinh_id = $('#loai_hinh_id');
		form_data.append('loai_hinh_id', loai_hinh_id.val());
		if (loai_hinh_id.val() == 0) {
			if (!loai_hinh_id.hasClass('error')) {
				loai_hinh_id.addClass('error');
				loai_hinh_id.parent().append('<label class="error" id="loai_hinh_id_error">Bạn chưa chọn loại hình công ty</label>');
			}
			formSubmit = false;
		} else {
			loai_hinh_id.removeClass('error');
			$('#loai_hinh_id_error').remove();
		}

		var sdt = $('#sdt');
		form_data.append('phone', sdt.val());
		if (sdt.val() == '') {
			if (sdt.hasClass('error') == false) {
				sdt.addClass('error');
				sdt.after('<label id="sdt_error" class="error">Vui lòng nhập số điện thoại</label>');
			}
			formSubmit = false;
		} else {
			sdt.removeClass('error');
			$('#sdt_error').remove();
			pattern = /^[0-9]{10,11}$/;

			if (!pattern.test(sdt.val())) {
				if (!sdt.hasClass('error')) {
					sdt.addClass('error');
					sdt.after('<label id="sdt_error" class="error">SĐT bạn nhập không đúng</label>');
				}
				formSubmit = false;
			} else {
				sdt.removeClass('error');
				$('#sdt_error').remove();
				// $.ajax({
				// 	type: "POST",
				// 	url: "../ajax/checkInfoCompany.php",
				// 	dataType: "json",
				// 	async: false,
				// 	data: {
				// 		phone: sdt.val()
				// 	}, success: function (data) {
				// 		if (data.result == false) {
				// 			if (!sdt.hasClass('error')) {
				// 				sdt.addClass('error');
				// 				sdt.after('<label class="error" id="sdt_error">' + data.msg + '</label>');
				// 				formSubmit = false;
				// 			}
				// 		}
				// 	}
				// });
			}
		}

		var financial_sector = $('#financial_sector');
		console.log(financial_sector.val());
		form_data.append('financial_sector', financial_sector.val());
		if (financial_sector.val() == '') {
			if (!financial_sector.parent().hasClass('error')) {
				financial_sector.parent().addClass('error');
				financial_sector.parent().append('<label class="error" id="financial_sector_error">Bạn chưa chọn lĩnh vực hoạt động</label>');
			}
			formSubmit = false;
		} else {
			financial_sector.parent().removeClass('error');
			$('#financial_sector_error').remove();
		}

		var skype = $('#skype');
		form_data.append('skype', skype.val());
		var usc_mst = $('#usc_mst');
		form_data.append('usc_mst', usc_mst.val());

		var city = $('#city');
		var qh = $('#qh');
		var frm_address = $('.frm_address');
		var val_city = "";
		var arrayAddress = [];
		var arrayCity = [];
		var arrayDistrict = [];
		if (!$('#address_container').hasClass('hidden')) {
			if (city.val() == 0) {
				if (city.hasClass('error') == false) {
					city.addClass('error');
					city.parent().append("<label id='city_error' class='error'>Vui lòng chọn tỉnh / thành phố</label>");
				}

				formSubmit = false;
			} else {
				city.removeClass('error');
				$('#city_error').remove();
			}

			if (qh.val() == 0) {
				if (qh.hasClass('error') == false) {
					qh.addClass('error');
					qh.parent().append("<label id='qh_error' class='error'>Vui lòng chọn quận / huyện</label>");
				}
				formSubmit = false;
			} else {
				qh.parent().removeClass('error');
				$('#qh_error').remove();
			}

			if (frm_address.val() == '') {
				if (frm_address.hasClass('error') == false) {
					frm_address.addClass('error');
					frm_address.after('<label id="frm_address_error" class="error">Vui lòng nhập địa chỉ</label>');
				}
				formSubmit = false;
			} else {
				frm_address.removeClass('error');
				$('#frm_address_error').remove();
				$.ajax({
					type: "POST",
					dataType: "Json",
					url: "../ajax/checkInfoCompany.php",
					data: {
						address: frm_address.val()
					}, success: function (data) {
						if (data.result == false) {
							if (frm_address.hasClass('error') == false) {
								frm_address.addClass('error');
								frm_address.after('<label id="frm_address_error" class="error">' + data.msg + '</label>');
								formSubmit = false;
							}
						}
					}
				});
				if ($('.div_show_address .item').length > 0) {
					$('.div_show_address .item').each(function () {
						if ($(this).data('address') == frm_address.val().trim()) {
							if (frm_address.hasClass('error') == false) {
								frm_address.addClass('error');
								frm_address.after('<label id="frm_address_error" class="error">Bạn đã nhập địa chỉ này rồi, vui lòng kiểm tra lại</label>');
							}
							formSubmit = false;
						}
					});
				}
			}
		}
		arrayItemAddress = $('.div_show_address .item');
		if (arrayItemAddress.length > 0) {
			arrayItemAddress.each(function () {
				id_city = $(this).data('cit');
				arrayCity.push(id_city);
				id_district = $(this).data('district');
				arrayDistrict.push(id_district);
				address = $(this).data('address');
				arrayAddress.push(address);
			});
			val_city = arrayCity.join();
			val_district = arrayDistrict.join();
			val_address = arrayAddress.join('|');
		} else {
			val_city = city.val();
			val_district = qh.val();
			val_address = frm_address.val();
		}
		form_data.append('user_city', val_city);
		form_data.append('usc_district', val_district);
		form_data.append('address_ntd', val_address);


		var gioithieu = $('#gioithieu');
		form_data.append('descripton_txtarea', gioithieu.val());
		if (gioithieu.val() == '') {
			if (gioithieu.hasClass('error') == false) {
				gioithieu.addClass('error');
				gioithieu.after('<label id="gioithieu_error" class="error">Vui lòng nhập giới thiệu công ty</label>');
			}
			formSubmit = false;
		} else {
			gioithieu.removeClass('error');
			$('#gioithieu_error').remove();
			var Count = wordCount(gioithieu.val());
			if (Count < 50) {
				if (gioithieu.hasClass('error') == false) {
					gioithieu.addClass('error');
					gioithieu.after('<label id="gioithieu_error" class="error">Vui lòng nhập giới thiệu công ty tối thiểu phải từ 50 từ</label>');
				}

				formSubmit = false;
			} else {
				gioithieu.removeClass('error');
				$('#gioithieu_error').remove();
			}
		}
		//Lấy ra files
		var file_data = $('#file').prop('files')[0];
		if (file_data != undefined) {
			//lấy ra kiểu file
			var type = file_data.type;
			//Xét kiểu file được upload
			var match = ["image/gif", "image/png", "image/jpg", "image/jpeg", "image/jfif", "image/PNG"];
			//kiểm tra kiểu file
			if (type == match[0] || type == match[1] || type == match[2] || type == match[3] || type == match[4] || type == match[5]) {
				form_data.append('upLoadAvatar', file_data);
			} else {
				alert("Định dạng ảnh không hợp lệ, vui lòng chọn ảnh khác");
				return false;
			}
		}

		var fileList = $('#file_image').prop('files');
		listLength = fileList.length;
		for (var i = 0; i < listLength; i++) {
			let file = fileList[i];
			if (file != undefined) {
				var type = file.type;
				let size = file.size;
				var match = ["image/gif", "image/png", "image/jpg", "image/jpeg", "image/jfif", "image/PNG"];
				//kiểm tra kiểu file
				if ((type == match[0] || type == match[1] || type == match[2] || type == match[3] || type == match[4] || type == match[5]) && size < 2097152) {
					form_data.append('file_images[]', file);
				}
			}
		}
		if (!formSubmit) {
			$.ajax({
				async: false,
				type: "POST",
				url: "../ajax/register_ntd_err.php",
				contentType: false,
				processData: false,
				data: form_data,
				beforeSend() {
					$('.loader_xt').removeClass('hidden');
				},
				success: function (data) {
					$('.loader_xt').addClass('hidden');
				}
			});
		} else {
			$.ajax({
				async: false,
				type: "POST",
				dataType: "json",
				url: "../codelogin/register_ntd.php",
				contentType: false,
				processData: false,
				data: form_data,
				beforeSend() {
					$('.loader_xt').removeClass('hidden');
				},
				success: function (data) {
					$('.loader_xt').addClass('hidden');
					if (data.stt == 1) {
						alert(data.msg);
						window.location.href = '/xac-thuc-tai-khoan-nha-tuyen-dung.html';
					} else {
						alert(data.msg);
					}
				}
			});
		}
		return false;
	});
	$('#doi_mkntd #password').keyup(function () {
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

	$('#doi_mkntd #password').blur(function () {
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
	$('.add_category button').click(function () {
		allowAdd = true;

		category = $('.item_category').not('.hidden');

		category.each(function () {
			elm = $(this).find('.slTag');
			cate = $(this).find('.nganhnghe');
			if (cate.val() != "") {
				if (elm.html() != "" && elm.val() == "") {
					if (!elm.hasClass('error')) {
						elm.addClass('error');
						elm.parent().append('<label class="error" id="tagSl_error">Bạn hãy chọn công việc chi tiết</label>');
					}
					allowAdd = false;
				}
			} else {
				if (!cate.parent().hasClass('error')) {
					cate.parent().addClass('error');
					cate.parent().append("<label class='error' id='nganhnghe_error'>Vui lòng chọn ngành nghề</label>");
				}
				if (elm.html() != "" && elm.val() == "") {
					if (!elm.hasClass('error')) {
						elm.addClass('error');
						elm.parent().append('<label class="error" id="tagSl_error">Bạn hãy chọn công việc chi tiết</label>');
					}
				}
				allowAdd = false;
			}
		});
		if (allowAdd) {
			$('.item_category.hidden').first().removeClass('hidden');
		}
		if ($('.item_category.hidden').length == 0) {
			$('.add_category').addClass('hidden');
		}
	});
});

function clear_address(e) {
	$(e).parent().parent().remove();
	if ($('#address_container').hasClass('hidden')) {
		$('#address_container').removeClass('hidden');
	}
}
function valiLoginNtd() {
	var email = $('#email');
	var password = $('.password');

	if (email.val() == '' || password.val() == '') {
		if ($('.tit_login').hasClass('error') == false) {
			$('.tit_login').addClass('error');
		}
		$('.alert-danger').html("Vui lòng nhập đầy đủ thông tin đăng nhập !!!");
		return false;
	} else {
		if (validateEmail(email.val()) == false) {
			if ($('.tit_login').hasClass('error') == false) {
				$('.tit_login').addClass('error');
			}
			$('.alert-danger').html("Định dạng Email không đúng !!!");
			return false;
		}
	}
}

function valiDangtin(iduser, cate) {
	var title_new = $('.dangtin #title_new');
	var capbac = $('.dangtin #capbac');
	var hinhthuc = $('.dangtin #hinhthuc');
	var ml = $('.dangtin #ml');
	var kn = $('.dangtin #kn');
	var bc = $('.dangtin #bc');
	var diadiem = $('.dangtin #dangtin_tt');
	var district_new = $('.dangtin #district_new');
	var item_category = $('.dangtin .item_category').not('.hidden');
	var mota = $('.dangtin #mota');
	var yeucau = $('.dangtin #yeucau');
	var quyenloi = $('.dangtin #quyenloi');
	var hoso = $('.dangtin #hoso');
	var hannop = $('.dangtin #han_nop_ho_so');
	var namecontact = $('#new_namecontact');
	var addresscontact = $('#new_addresscontact');
	var phonecontact = $('#new_phonecontact');
	var emailcontact = $('#new_emailcontact');
	var returnForm = true;
	var arr_err = [];
	var form_data = new FormData();
	if (cate == 'create_new') {
		$.ajax({
			async: false,
			type: "POST",
			url: "../../ajax/check_sltindang.php",
			data: {
				iduser: iduser
			}, success: function (data) {
				if (data == 0) {
					returnForm = false;
				}
			}
		});
		if (returnForm == false) {
			alert("Mỗi lần đăng tin phải cách nhau ít nhất 60 phút, bạn hãy chờ 60 phút tiếp theo để được đăng thêm tin");
			return false;
		}
	}

	if (title_new.val().length == 0) {
		if (title_new.hasClass('error') == false) {
			title_new.addClass('error');
			title_new.after("<label class='error' id='title_new_error'>Vui lòng nhập vị trí tuyển dụng</label>");
		}
		arr_err.push("title_new");
		returnForm = false;
	} else {
		title_new.removeClass('error');
		$('#title_new_error').remove();
		$('#title_new_error2').remove();
		if (checkTitle(title_new.val()) || checkKTDB(title_new.val())) {
			if (title_new.hasClass('error') == false) {
				title_new.addClass('error');
				if (checkTitle(title_new.val())) {
					title_new.after("<label class='error' id='title_new_error'>Tiêu đề tin tuyển dụng KHÔNG chứa các nội dung như: Tuyển gấp, hot, cần gấp, lương cao.</label>");
				}
				if (checkKTDB(title_new.val())) {
					title_new.after("<label class='error' id='title_new_error2'>Tiêu đề tin tuyển dụng KHÔNG chứa các ký tự đặc biệt</label>");
				}
			}
			arr_err.push("title_new");
			returnForm = false;
		} else {
			title_new.removeClass('error');
			$('#title_new_error').remove();
			$('#title_new_error2').remove();
			var id = '';
			if (cate == 'edit_new') {
				id = title_new.attr('data-id');
			}
			$.ajax({
				async: false,
				type: "POST",
				url: "../../ajax/checkTitle.php",
				data: {
					title_new: title_new.val(),
					cate: cate,
					id: id
				}, success: function (data) {
					if (data > 0) {
						returnForm = false;
					}
				}
			});
			if (returnForm == false) {
				if (title_new.hasClass('error') == false) {
					title_new.addClass('error');
					title_new.after("<label class='error' id='title_new_error'>Tiêu đề tin đăng đã tồn tại</label>");
				}
				arr_err.push("title_new");
				returnForm = false;
			} else {
				title_new.removeClass('error');
				$('#title_new_error').remove();
				$('#title_new_error2').remove();
				form_data.append('new_title', title_new.val());
			}
		}
	}
	if (capbac.val() == 0) {
		if (capbac.hasClass('error') == false) {
			capbac.addClass('error');
			capbac.prev().after("<label class='error tt' id='capbac_error'>Vui lòng chọn cấp bậc</label>");
		}
		arr_err.push("capbac");
		returnForm = false;
	} else {
		$('select2-capbac-container').parent().removeClass('error');
		$('#capbac_error').remove();
		form_data.append('new_cap_bac', capbac.val());
	}

	if (hinhthuc.val() == 0) {
		if (hinhthuc.hasClass('error') == false) {
			hinhthuc.addClass('error');
			hinhthuc.prev().after("<label class='error tt' id='hinhthuc_error'>Chọn hình thức làm việc</label>");
		}
		arr_err.push("hinhthuc");
		returnForm = false;
	} else {
		hinhthuc.removeClass('error');
		$('#hinhthuc_error').remove();
		form_data.append('new_hinh_thuc', hinhthuc.val());
	}
	if (ml.val() == 0) {
		if (ml.hasClass('error') == false) {
			ml.addClass('error');
			ml.prev().after("<label class='error tt' id='ml_error'>Vui lòng chọn mức lương</label>");
		}
		arr_err.push("ml");
		returnForm = false;
	} else {
		$('#select2-ml-container').parent().removeClass('error');
		$('#ml_error').remove();
		form_data.append('new_money', ml.val());
	}

	if (kn.val() == '') {
		if ($('#select2-kn-container').parent().hasClass('error') == false) {
			$('#select2-kn-container').parent().addClass('error');
			kn.parent().append("<label class='error' id='kn_error'>Vui lòng chọn kinh nghiệm</label>");
		}
		arr_err.push("kn");
		returnForm = false;
	} else {
		$('#select2-kn-container').parent().removeClass('error');
		$('#kn_error').remove();
		form_data.append('new_exp', kn.val());
	}

	if (!$('#main_select').hasClass('hidden')) {
		if (diadiem.val() == 0) {
			if (!diadiem.hasClass('error')) {
				diadiem.addClass('error');
				diadiem.parent().append("<label class='error' id='dangtin_tt_error'>Vui lòng chọn tỉnh thành</label>");
			}
			arr_err.push("dangtin_tt");
			returnForm = false;
		} else {
			diadiem.parent().removeClass('error');
			$('#dangtin_tt_error').remove()
		}
		if (district_new.val() == 0) {
			if (!district_new.hasClass('error')) {
				district_new.addClass('error');
				district_new.parent().append('<label id="district_error" class="error">Vui lòng chọn quận huyện</label>');
			}
			arr_err.push("district_new");
			returnForm = false;
		} else {
			$('#district_error').remove();
			district_new.removeClass('error');
			if ($('#main_address_new .item').length > 0) {
				$('#main_address_new .item').each(function () {
					if ($(this).data('district') == district_new.val()) {
						if (!district_new.hasClass('error')) {
							district_new.addClass('error');
							district_new.parent().append('<label id="district_error" class="error">Bạn đã chọn quận huyện này rồi, vui lòng kiểm tra</label>');
						}
						returnForm = false;
					}
				});
			}
		}
	} else {
		arr_city = [];
		arr_district = [];
		$('#main_address_new .item').each(function () {
			arr_city.push($(this).data('city'));
			arr_district.push($(this).data('district'));
		});
		form_data.append('new_city', arr_city.join());
		form_data.append('new_qh_id', arr_district.join());
	}

	arr_category = [];
	arr_tag = [];
	item_category.each(function () {
		i_nganhnghe = $(this).find('.nganhnghe');
		if (i_nganhnghe.val() == '') {
			if (!i_nganhnghe.parent().hasClass('error')) {
				i_nganhnghe.parent().addClass('error');
				i_nganhnghe.parent().append("<label class='error' id='nganhnghe_error'>Vui lòng chọn ngành nghề</label>");
			}
			returnForm = false;
		} else {
			i_nganhnghe.parent().removeClass('error');
			i_nganhnghe.parent().find('#nganhnghe_error').remove();
			arr_category.push(i_nganhnghe.val());
		}
		tag = $(this).find('.slTag');
		if (tag.val() == '' && tag.html().trim() != '') {
			if (!tag.parent().hasClass('error')) {
				tag.parent().addClass('error');
				tag.parent().append('<label class="error" id="tagSl_error">Bạn hãy chọn công việc chi tiết</label>');
			}
			returnForm = false;
		} else {
			tag.parent().removeClass('error');
			tag.parent().find('#tagSl_error').remove();
			if (tag.val() != '') {
				arr_tag.push(tag.val());
			}
		}
	});

	var tmp = 0;
	for (var i = 1; i <= arr_category.length; i++) {
		if (arr_category[tmp] != arr_category[i]) {
			tmp = i;
		}
		else {
			if (!$('.main_category').hasClass('error')) {
				$('.add_category').before('<label class="error" id="checkTrungNN_error">Ngành nghề bạn chọn không được trùng nhau</label>');
				$('.main_category').addClass('error');
			}
			returnForm = false;
		}
	}

	form_data.append('new_cat_id', arr_category.join());
	form_data.append('new_tag', arr_tag.join());
	if (mota.val() == '') {
		if (mota.hasClass('error') == false) {
			mota.addClass('error');
			mota.parent().after("<label class='error' id='mota_error' style='width:90%'>Vui lòng nhập mô tả công việc</label>");
		}
		arr_err.push("mota");
		returnForm = false;
	} else {
		mota.removeClass('error');
		$('#mota_error').remove();
		var Count = wordCount(mota.val());
		if (Count < 50) {
			if (mota.hasClass('error') == false) {
				mota.addClass('error');
				mota.parent().after("<label class='error' id='mota_error' style='width:90%'>Bạn cần mô tả công việc ít nhât 50 từ</label>");
			}
			arr_err.push("mota");
			returnForm = false;
		} else {
			mota.removeClass('error');
			$('#mota_error').remove();
			form_data.append('new_mota', mota.val());
		}
	}
	if (yeucau.val() == '') {
		if (yeucau.hasClass('error') == false) {
			yeucau.addClass('error');
			yeucau.parent().after("<label class='error' id='yeucau_error' style='width:90%'>Vui lòng nhập yêu cầu công việc</label>");
		}
		arr_err.push("yeucau");
		returnForm = false;
	} else {
		yeucau.removeClass('error');
		$('#yeucau_error').remove();
		var Count = wordCount(yeucau.val());
		if (Count < 50) {
			if (yeucau.hasClass('error') == false) {
				yeucau.addClass('error');
				yeucau.parent().after("<label class='error' id='yeucau_error' style='width:90%'>Bạn cần nhập yêu cầu công việc ít nhât 50 từ</label>");
			}
			arr_err.push("yeucau");
			returnForm = false;
		} else {
			yeucau.parent().removeClass('error');
			$('#yeucau_error').remove();
			form_data.append('new_yeucau', yeucau.val());
		}
	}
	if (quyenloi.val() == '') {
		if (quyenloi.hasClass('error') == false) {
			quyenloi.addClass('error');
			quyenloi.parent().after("<label class='error' id='quyenloi_error' style='width:90%'>Vui lòng nhập quyền lợi</label>");
		}
		arr_err.push("quyenloi");
		returnForm = false;
	} else {
		quyenloi.parent().removeClass('error');
		$('#quyenloi_error').remove();
		form_data.append('new_quyenloi', quyenloi.val());
		var Count = wordCount(quyenloi.val());
		if (Count < 50) {
			if (quyenloi.hasClass('error') == false) {
				quyenloi.addClass('error');
				quyenloi.parent().after("<label class='error' id='quyenloi_error' style='width:90%'>Bạn cần nhập quyền lợi ít nhât 50 từ</label>");
			}
			arr_err.push("quyenloi");
			returnForm = false;
		}
	}
	if (hoso.val() == '') {
		if (!hoso.hasClass('error')) {
			hoso.addClass('error');
			hoso.parent().append('<label class="error" id="hoso_error">Bạn chưa nhập hồ sơ</label>');
		}
		returnForm = false;
	} else {
		hoso.removeClass('error');
		$('#hoso_error').remove();
		form_data.append('new_ho_so', hoso.val());
	}
	if (hannop.val() == '') {
		if (hannop.hasClass('error') == false) {
			hannop.addClass('error');
			hannop.parent().append("<label class='error' id='han_nop_ho_so_error'>Vui lòng chọn hạn nộp</label>");
		}
		arr_err.push("han_nop_ho_so");
		returnForm = false;
	} else {
		hannop.parent().removeClass('error');
		$('#han_nop_ho_so_error').remove();
		form_data.append('new_han_nop', hannop.val());
	}

	if (namecontact.val() == '') {
		if (namecontact.hasClass('error') == false) {
			namecontact.addClass('error');
			namecontact.prev().after("<label id='namecontact_error' class='error tt'>Vui lòng nhập tên người liên hệ</label>");
		}
		arr_err.push("new_namecontact");
		returnForm = false;
	} else {
		namecontact.removeClass('error');
		$('#namecontact_error').remove();
		form_data.append('new_usercontact', namecontact.val());
	}

	if (addresscontact.val() == '') {
		if (addresscontact.hasClass('error') == false) {
			addresscontact.addClass('error');
			addresscontact.prev().after("<label id='addresscontact_error' class='error tt'>Vui lòng nhập địa chỉ liên hệ</label>");
		}
		arr_err.push("new_addresscontact");
		returnForm = false;
	} else {
		addresscontact.removeClass('error');
		$('#addresscontact_error').remove();
		form_data.append('new_addcontact', addresscontact.val());
	}

	if (phonecontact.val() == '') {
		if (phonecontact.hasClass('error') == false) {
			phonecontact.addClass('error');
			phonecontact.prev().after('<label id="phonecontact_error" class="error tt">Vui lòng nhập SĐT liên hệ</label>');
		}
		arr_err.push("new_phonecontact");
		returnForm = false;
	} else {
		phonecontact.removeClass('error');
		$('#phonecontact_error').remove();
		form_data.append('new_phonecontact', phonecontact.val());
	}

	if (emailcontact.val() == '') {
		if (emailcontact.hasClass('error') == false) {
			emailcontact.addClass('error');
			emailcontact.prev().after("<label id='emailcontact_error' class='error tt'>Vui lòng nhập Email liên hệ</label>");
		}
		arr_err.push("new_emailcontact");
		returnForm = false;
	} else {
		emailcontact.parent().removeClass('error');
		$('#emailcontact_error').remove();
		form_data.append('new_emailcontact', emailcontact.val());
	}
	if (detect_keywword(mota.val()) || detect_keywword(quyenloi.val()) || detect_keywword(yeucau.val())) {
		$('#new_thuc').val(0);
	} else {
		$('#new_thuc').val(1);
	}
	form_data.append('new_thuc', $('#new_thuc').val());
	form_data.append('new_thuviec', $('#tg_thuviec').val());
	form_data.append('new_hoahong', $('#hoahong').val());
	form_data.append('new_gioi_tinh', $('#dangtin_gt').val());
	form_data.append('new_bang_cap', bc.val());
	form_data.append('new_so_luong', $('.dangtin .sl_soluong').val());

	$('.dangtin #' + arr_err[0]).focus();

	if (returnForm) {
		form_data.append('Submit', 1);
		if (cate == 'create_new') {
			urlAjax = "../../codelogin/dang_tin.php";
		} else {
			id = $('#idNew').val();
			urlAjax = "../../codelogin/sua_tin.php?new_id=" + id;
		}
		$.ajax({
			type: "POST",
			url: urlAjax,
			contentType: false,
			processData: false,
			dataType: "Json",
			async: false,
			data: form_data,
			success: function (data) {
				if (data.result == true) {
					window.location.href = data.redirect;
				}
			}
		});
	}
	return false;
}
function vali_EditTTTK() {
	var password_first = $('.form_update #password_first');
	var password_second = $('.form_update #password_second');
	var re_password_second = $('.form_update #re_password_second');
	returnForm = true;
	if (password_first.val() == '') {
		if (password_first.hasClass('error') == false) {
			password_first.addClass('error');
			password_first.after("<label class='error' id='password_first_error'>Vui lòng nhập mật khẩu hiện tại</label>");
		}
		returnForm = false;
	} else {
		password_first.removeClass('error');
		$('#password_first_error').remove();
	}
	if (password_second.val() == '') {
		if (password_second.hasClass('error') == false) {
			password_second.addClass('error');
			password_second.after("<label class='error' id='password_second_error'>Vui lòng nhập mật khẩu mới</label>");
		}
		returnForm = false;
	} else {
		password_second.removeClass('error');
		$('#password_second_error').remove();
	}

	if (password_second.val() != re_password_second.val()) {
		if (re_password_second.hasClass('error') == false) {
			re_password_second.addClass('error');
			re_password_second.after("<label id='re_password_second_error' class='error'>Mật khẩu bạn nhập lại không chính xác, vui lòng thử lại!!</label>");
		}
		returnForm = false;
	} else {
		$('#re_password_second_error').remove();
		re_password_second.removeClass('error');
	}
	if (returnForm) {
		$.ajax({
			type: "POST",
			url: "../codelogin/updateNTD_tttk.php",
			data: {
				password_second: re_password_second.val()
			}, success: function (data) {
				if (data == 1 && confirm("Đổi mật khẩu thành công, bạn có muốn đăng xuất để cập nhật lại mật khẩu ???"))
					window.location.href = "/dang-xuat";
				else alert("Bạn đã đổi mật khẩu thành công !!!");
			}
		});
	}
	return false;
}
function vali_EditTTCN() {
	var name_com = $('.form_update #name_company');
	var quymo = $('.form_update #usc_size');
	var phone_com = $('.form_update #usc_phone');
	var city = $('.form_update #usc_city');
	var district = $('.form_update #usc_disctrict');
	var address = $('.form_update #usc_address');
	var usc_company_info = $('.form_update #usc_company_info');
	var DateOfIncorporation = $('.form_update #DateOfIncorporation');
	var financial_sector = $('.form_update #financial_sector');
	var returnForm = true;
	if (name_com.val() == '') {
		if (name_com.hasClass('error') == false) {
			name_com.addClass('error');
			name_com.after("<label id='name_com_error' class='error'>Vui lòng nhập tên công ty</label>");
		}
		returnForm = false;
	} else {
		var returnForm1 = true;
		$.ajax({
			async: false,
			type: "POST",
			url: "../ajax/checktrungNTD1.php",
			data: {
				valCompany: name_com.val()
			},
			success: function (data) {
				if (data > 0) {
					returnForm1 = false;
				}
			}
		});
		if (returnForm1 == false && name_com.hasClass('error') == false) {
			name_com.addClass('error');
			name_com.after("<label id='name_com_error' class='error'>Tên công ty đã có</label>");
			returnForm = false;
		} else {
			name_com.removeClass('error');
			$('#name_com_error').remove();
		}
	}
	if (quymo.val() == 0) {
		if (quymo.parent().hasClass('error') == false) {
			quymo.parent().addClass('error');
			quymo.parent().append("<label id='quymo_error' class='error'>Vui lòng chọn quy mô</label>");
		}
		returnForm = false;
	} else {
		quymo.parent().removeClass('error');
		$('#quymo_error').remove();
	}

	if (phone_com.val() == '') {
		if (phone_com.hasClass('error') == false) {
			phone_com.addClass('error');
			phone_com.after("<label id='phone_com_error' class='error'>Vui lòng nhập số điện thoại</label>");
		}
		returnForm = false;
	} else {
		phone_com.removeClass('error');
		$('#phone_com_error').remove();
		if (phone_com.val().length < 10) {
			if (phone_com.hasClass('error') == false) {
				phone_com.addClass('error');
				phone_com.after("<label id='phone_com_error' class='error'>SĐT phải lớn hơn 10 kí tự, vui lòng kiểm tra lại</label>");
			}
			returnForm = false;
		} else {
			phone_com.removeClass('error');
			$('#phone_com_error').remove();
		}
	}
	if (!$('#address_container').hasClass('hidden')) {
		if (city.val() == 0) {
			if (!city.hasClass('error')) {
				city.addClass('error');
				city.parent().append("<label id='city_error' class='error'>Vui lòng chọn tỉnh / thành phố</label>");
			}
			returnForm = false;
		} else {
			city.removeClass('error');
			$('#city_error').remove();
		}
		if (district.val() == 0) {
			if (!district.hasClass('error')) {
				district.addClass('error');
				district.parent().append("<label id='qh_error' class='error'>Vui lòng chọn quận / huyện</label>");
			}
			returnForm = false;
		} else {
			district.removeClass('error');
			$('#qh_error').remove();
		}
		if (address.val() == '') {
			if (!address.hasClass('error')) {
				address.addClass('error');
				address.after('<label id="address_com_error" class="error">Vui lòng nhập địa chỉ hiện tại</label>');
			}
			returnForm = false;
		} else {
			address.removeClass('error');
			$('#address_com_error').remove();
			if ($('.div_show_address .item').length > 0) {
				$('.div_show_address .item').each(function () {
					if ($(this).data('addr') == address.val().trim()) {
						if (address.hasClass('error') == false) {
							address.addClass('error');
							address.after('<label id="address_com_error" class="error">Bạn đã nhập địa chỉ này rồi, vui lòng kiểm tra lại</label>');
						}
						returnForm = false;
					}
				});
			}
		}
	} else {
		arr_city = [];
		arr_district = [];
		arr_addr = [];
		$('.div_show_address .item').each(function () {
			arr_city.push($(this).data('cit'));
			arr_district.push($(this).data('district'));
			arr_addr.push($(this).data('addr'));
		});
		$('#txt_city').val(arr_city.join());
		$('#txt_district').val(arr_district.join());
		$('#addr').val(arr_addr.join('|'));
	}

	if (usc_company_info.val() == '') {
		if (usc_company_info.hasClass('error') == false) {
			usc_company_info.addClass('error');
			usc_company_info.after("<label class='error' id='usc_company_info_error'>Vui lòng nhập giới thiệu về công ty</label>");
		}
		returnForm = false;
	} else {
		usc_company_info.removeClass('error');
		$('#usc_company_info_error').remove();
		if (usc_company_info.val().length < 150) {
			if (usc_company_info.hasClass('error') == false) {
				usc_company_info.addClass('error');
				usc_company_info.after("<label class='error' id='usc_company_info_error'>Giới thiệu công ty của bạn phải > 150 kí tự</label>");
			}
			returnForm = false;
		} else {
			usc_company_info.removeClass('error');
			$('#usc_company_info_error').remove();
		}
	}
	if (DateOfIncorporation.val() == '') {
		if (!DateOfIncorporation.hasClass('error')) {
			DateOfIncorporation.addClass('error');
			DateOfIncorporation.after('<label id="DateOfIncorporation_error" class="error">Bạn chưa nhập ngày thành lập công ty</label>');
		}
		returnForm = false;
	} else {
		$('#DateOfIncorporation_error').remove();
		DateOfIncorporation.removeClass('error');
	}
	if (financial_sector.val() == '') {
		if (!financial_sector.parent().hasClass('error')) {
			financial_sector.parent().addClass('error');
			financial_sector.parent().append('<label class="error" id="financial_sector_error">Bạn chưa chọn lĩnh vực hoạt động</label>');
		}
		returnForm = false;
	} else {
		financial_sector.parent().removeClass('error');
		$('#financial_sector_error').remove();
	}
	return returnForm;
}
function vali_EditChuTK() {
	var user_contact = $('.form_update #usc_name');
	var address_contact = $('.form_update #usc_name_add');
	var phone_contact = $('.form_update #usc_name_phone');
	var email_contact = $('.form_update #usc_name_email');

	if (user_contact.val() == '') {
		if (user_contact.hasClass('error') == false) {
			user_contact.addClass('error');
			user_contact.after("<label id='user_contact_error' class='error'>Vui lòng nhập tên người liên hệ</label>");
		}
		user_contact.focus();
		return false;
	} else {
		user_contact.removeClass('error');
		$('#user_contact_error').remove();
	}

	if (address_contact.val() == '') {
		if (address_contact.hasClass('error') == false) {
			address_contact.addClass('error');
			address_contact.after("<label id='address_contact_error' class='error'>Vui lòng nhập địa chỉ liên hệ</label>");
		}
		address_contact.focus();
		return false;
	} else {
		address_contact.removeClass('error');
		$('#address_contact_error').remove();
	}

	if (phone_contact.val() == '') {
		if (phone_contact.hasClass('error') == false) {
			phone_contact.addClass('error');
			phone_contact.after("<label id='phone_contact_error' class='error'>Vui lòng nhập số điện thoại liên hệ</label>");
		}
		phone_contact.focus();
		return false;
	} else {
		phone_contact.removeClass('error');
		$('#phone_contact_error').remove();
		if (phone_contact.val().length < 10) {
			if (phone_contact.hasClass('error') == false) {
				phone_contact.addClass('error');
				phone_contact.after("<label id='phone_contact_error' class='error'>SĐT phải lớn hơn 10 kí tự, vui lòng kiểm tra lại </label>");
			}
			phone_contact.focus();
			return false;
		} else {
			phone_contact.removeClass('error');
			$('#phone_contact_error').remove();
		}
	}

	if (email_contact.val() == '') {
		if (email_contact.hasClass('error') == false) {
			email_contact.addClass('error');
			email_contact.after("<label id='email_contact_error' class='error'>Vui lòng nhập Email liên hệ</label>");
		}
		email_contact.focus();
		return false;
	} else {
		email_contact.removeClass('error');
		$('#email_contact_error').remove();
		if (validateEmail(email_contact.val()) == false) {
			if (email_contact.hasClass('error') == false) {
				email_contact.addClass('error');
				email_contact.after("<label id='email_contact_error' class='error'>Định dạng Email không đúng</label>");
			}
			email_contact.focus();
			return false;
		} else {
			email_contact.removeClass('error');
			$('#email_contact_error').remove();
		}
	}
}
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
function changeImg(input) {
	//Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		//Sự kiện file đã được load vào website
		reader.onload = function (e) {
			//Thay đổi đường dẫn ảnh
			$('#uploaded').removeClass('hidden');
		}
		reader.readAsDataURL(input.files[0]);
	}
}
function show_hidden_address() {
	var city = $('#form_dk_ntd #city');
	var district = $('#form_dk_ntd #qh');
	var address = $('#form_dk_ntd .frm_address');
	var addForm = true;
	var item = '';
	if (city.val() == 0) {
		if (!city.hasClass('error')) {
			city.addClass('error');
			city.parent().append("<label id='city_error' class='error'>Vui lòng chọn tỉnh / thành phố</label>");
		}
		addForm = false;
	} else {
		city.removeClass('error');
		$('#city_error').remove();
	}
	if (district.val() == 0) {
		if (!district.hasClass('error')) {
			district.addClass('error');
			district.parent().append("<label id='qh_error' class='error'>Vui lòng chọn quận / huyện</label>");
		}
		addForm = false;
	} else {
		district.removeClass('error');
		$('#qh_error').remove();
	}
	if (address.val() == '') {
		if (!address.hasClass('error')) {
			address.addClass('error');
			address.after('<label id="frm_address_error" class="error">Vui lòng nhập địa chỉ</label>');
		}
		addForm = false;
	} else {
		address.removeClass('error');
		$('#frm_address_error').removeClass();
		$.ajax({
			type: "POST",
			dataType: "Json",
			url: "../ajax/checkInfoCompany.php",
			data: {
				address: address.val()
			}, success: function (data) {
				if (data.result == false) {
					if (address.hasClass('error') == false) {
						address.addClass('error');
						address.after('<label id="frm_address_error" class="error">' + data.msg + '</label>');
						addForm = false;
					}
				}
			}
		});
		if ($('.div_show_address .item').length > 0) {
			$('.div_show_address .item').each(function () {
				if ($(this).data('address') == address.val().trim()) {
					if (address.hasClass('error') == false) {
						address.addClass('error');
						address.after('<label id="frm_address_error" class="error">Bạn đã nhập địa chỉ này rồi, vui lòng kiểm tra lại</label>');
					}
					addForm = false;
				}
			});
		}
	}
	if (addForm == true) {
		txt_city = $('#select2-city-container');
		txt_district = $('#select2-qh-container');
		txt_address = address.val();
		count = $('.div_show_address .item').length;
		txt_ChiNhanh = (count == 0) ? "Trụ sở chính" : "Chi nhánh " + count;
		if (count <= 5) {
			item = '<div class="item" data-cit="' + city.val() + '" data-district="' + district.val() + '" data-address="' + address.val() + '">';
			item += '<label class="lbl_show_address" for="">' + txt_ChiNhanh + ':</label>';
			item += '<div class="main_show_address">';
			item += '<button onclick="clear_address(this)" class="close">x</button>';
			item += '<img src="/images/load.gif" alt="Images Show address" class="lazyload show_address" data-src="/images/show_address_reg.png">';
			item += '<div class="div_right_address">';
			item += '<div>';
			item += '<span class="district_city_show">' + txt_district.html() + '</span>';
			item += '<span class="district_city_show">' + txt_city.html() + '</span>';
			item += '</div>';
			item += '<div class="address">';
			item += '<span>Địa chỉ:</span> ' + txt_address + '</div>';
			item += '</div>';
			item += '</div>';
			item += '</div>';

			$('.div_show_address').append(item);
			city.val(0);
			district.val(0);
			address.val('');
			txt_city.html('Tỉnh/Thành phố');
			txt_district.html('Quận / huyện');
		}
		if (count < 5) {
			$('#add-address').removeClass('hidden');
		}
		$('#address_container').addClass('hidden');
	}
}

function get_district(e) {
	var district_value = $(e).val();
	$.ajax({
		type: "POST",
		url: "../../ajax/get_quanhuyen.php",
		data: {
			id: district_value
		}, success: function (data) {
			$('#district_new').html(data);
		}
	});
}

function show_address_new() {

	city = $('#dangtin_tt');
	cit_id = city.val();
	cit_name = $('#select2-dangtin_tt-container').html();

	district = $('#district_new');
	district_id = district.val();
	district_name = $('#select2-district_new-container').html();

	allow_append = true;
	if (cit_id == 0) {
		if (!city.hasClass('error')) {
			city.addClass('error');
			city.parent().append("<label class='error' id='dangtin_tt_error'>Vui lòng chọn tỉnh thành</label>");
		}
		allow_append = false;
	} else {
		$('#dangtin_tt_error').remove();
		city.removeClass('hidden');
	}
	if (district_id == 0) {
		if (!district.hasClass('error')) {
			district.addClass('error');
			district.parent().append('<label id="district_error" class="error">Vui lòng chọn quận huyện</label>');
		}
		allow_append = false;
	} else {
		district.removeClass('error');
		$('#district_error').remove();
		if ($('#main_address_new .item').length > 0) {
			$('#main_address_new .item').each(function () {
				if ($(this).data('district') == district.val()) {
					if (!district.hasClass('error')) {
						district.addClass('error');
						district.parent().append('<label id="district_error" class="error">Bạn đã chọn quận huyện này rồi, vui lòng kiểm tra</label>');
					}
					allow_append = false;
				}
			});
		}
	}

	count = $('#main_address_new .item').length;
	stt = count + 1;

	if (allow_append) {
		item = '<div class="item" data-city="' + cit_id + '" data-district="' + district_id + '">', item += '<label for="" class="title_address">Cơ sở ' + stt + ": </label>", item += '<div class="main_item_address">', item += '<button type="button" onclick="remove_addr_new(this)" class="remove_addr_new">x</button>', item += '<img src="/images/show_address_reg.png" alt="Image address">', item += '<div class="ct_addr">', item += "<ul>", item += '<li class="active">' + district_name + "</li>", item += "<li>" + cit_name + "</li>", item += "</ul >", item += '<p class="addr_dt">', item += "</p>", item += "</div>", item += "</div>", item += "</div>", $("#main_address_new").append(item), $("#select2-dangtin_tt-container").html("Chọn tỉnh thành"), $("#select2-district_new-container").html("Chọn quận / huyện"), city.val(0), district.val(0), $("#main_select").addClass("hidden"), $("#btn_add_address").removeClass("hidden"), 5 == stt && $("#btn_add_address").addClass("hidden");
	}
}
function remove_addr_new(e) {
	$(e).parent().parent().remove();
	count = $('#main_address_new .item').length;
	if (count == 0) {
		$('#main_select').removeClass('hidden');
		$('#btn_add_address').addClass('hidden');
	}
}

function add_addr_new(e) {
	$(e).addClass('hidden');
	$('#main_select').removeClass('hidden');
}

function addBtnClearCategory(e) {
	category = $(e);
	v = category.val();
	v_parent = category.parent().prev().find('.nganhnghe').val();
	if (v == '' && !category.hasClass('error') && v_parent != '') {
		category.addClass('error');
		category.parent().append('<label class="error" id="tagSl_error">Bạn hãy chọn công việc chi tiết</label>');
		category.parent().removeClass('hasClear').next().remove();
	} else {
		category.removeClass('error');
		category.parent().find('#tagSl_error').remove();
		if (!category.parent().hasClass('hasClear')) {
			elm = '<div class="clearCategory">';
			elm += '<button type="button" onclick="clearCategory(this)">';
			elm += '<i class="fa fa-times-circle" aria-hidden="true"></i>Xóa';
			elm += '</button>';
			elm += '</div >';
			category.parent().addClass('hasClear').after(elm);
		}
	}
}

function clearCategory(e) {
	count = $('.item_category.hidden').length;
	if (count == 2) { $('.add_category').addClass('hidden'); }
	else {
		$(e).parent().parent().addClass('hidden');
		$('.add_category').removeClass('hidden');
	}
	$(e).parent().parent().find('.left .nganhnghe').val('');
	$(e).parent().parent().find('.left .select2-selection__rendered').html('Chọn ngành nghề');
	$(e).parent().parent().find('.select2-selection__choice__remove').click();
	$(e).parent().prev().removeClass('hasClear').find('.slTag').html('');
	$(e).parent().prev().removeClass('hasClear').find('.slTag').val('');
	$(e).parent().remove();
}