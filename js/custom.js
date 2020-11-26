<<<<<<< HEAD
$(document).ready(function(){
	url = window.location.pathname;
	$('.header-top .parent a[href="'+url+'"]').css('color','#F8971C');
	
	$(window).scroll(function(){
		if($(this).scrollTop()>300){
			$('#btn-top').fadeIn(800);
		}else{
			$('#btn-top').fadeOut(800);
		}
		if($(this).scrollTop() > 100 && !$('#addChatBox').hasClass('chatBox')){
			$('#addChatBox').addClass('chatBox');
			$('#addChatBox').append("<script async type='text/javascript'>var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();(function(){var s1=document.createElement('script'),s0=document.getElementsByTagName('script')[0];s1.async=true;s1.src='https://embed.tawk.to/5da4289ff82523213dc71d20/default';s1.charset='UTF-8';s1.setAttribute('crossorigin','*');s0.parentNode.insertBefore(s1,s0);})();<\/script>");
		}
		if($(this).scrollTop() > 54){
			if(!$('#search_advance').hasClass('hidden') && !$('#search_advance').hasClass('scroll')){
				$('#search_advance').addClass('scroll');
			}
		}else{
			$('#search_advance').removeClass('scroll');
		}
	});
	$('#btn-top').click(function() {
=======
$(document).ready(function () {
	url = window.location.pathname;
	$('.header-top .parent a[href="' + url + '"]').css('color', '#F8971C');

	$(window).scroll(function () {
		if ($(this).scrollTop() > 300) {
			$('#btn-top').fadeIn(800);
		} else {
			$('#btn-top').fadeOut(800);
		}
		if ($(this).scrollTop() > 100 && !$('#addChatBox').hasClass('chatBox')) {
			$('#addChatBox').addClass('chatBox');
			$('#addChatBox').append("<script async type='text/javascript'>var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();(function(){var s1=document.createElement('script'),s0=document.getElementsByTagName('script')[0];s1.async=true;s1.src='https://embed.tawk.to/5da4289ff82523213dc71d20/default';s1.charset='UTF-8';s1.setAttribute('crossorigin','*');s0.parentNode.insertBefore(s1,s0);})();<\/script>");
		}
		if ($(this).scrollTop() > 54) {
			if (!$('#search_advance').hasClass('hidden') && !$('#search_advance').hasClass('scroll')) {
				$('#search_advance').addClass('scroll');
			}
		} else {
			$('#search_advance').removeClass('scroll');
		}
	});
	$('#btn-top').click(function () {
>>>>>>> 12bb0cb9ff663446bb65b5a9c100a529c228166a
		$('html, body').animate({
			scrollTop: 0
		}, 500);
	});

	pathName = window.location.pathname;
	widthSl = "25%";
<<<<<<< HEAD
	switch(pathName){
=======
	switch (pathName) {
>>>>>>> 12bb0cb9ff663446bb65b5a9c100a529c228166a
		case '/viec-tim-nguoi.html':
			widthSl = "40%";
			break;
	}
	$('#index_nn,#index_tt').select2({
		width: widthSl
	});
	$('#index_cate,#index_city').select2({
<<<<<<< HEAD
		width:'100%'
	});
	$('#adv_city,#adv_form_of_word,#adv_district,#adv_rank,#adv_level,#adv_exp,#adv_gender,#adv_money,#adv_update').select2({
		width:'100%'
	});
	$('#adv_dd,#adv_ht,#adv_qh,#adv_cb,#adv_trinhdo,#adv_kn,#adv_gt,#adv_ml,#adv_capnhat').select2({
		width:'100%'
	});
	$('.ico_menu').click(function(){
		$(this).find('.sub_menu').toggle();
	});
	$('#toggle_acc').click(function(){
		$('.sub_menu_acc').toggle();
	});
	$('#logged').click(function(){
		$('.sub_logged').toggle();
	});
	$('#logged_mb').click(function(){
		$('#for-mobile .sub_menu_mb').toggle();
	});
	$('.search_cate .keyword').keyup(function(){
=======
		width: '100%'
	});
	$('#adv_city,#adv_form_of_word,#adv_district,#adv_rank,#adv_level,#adv_exp,#adv_gender,#adv_money,#adv_update').select2({
		width: '100%'
	});
	$('#adv_dd,#adv_ht,#adv_qh,#adv_cb,#adv_trinhdo,#adv_kn,#adv_gt,#adv_ml,#adv_capnhat').select2({
		width: '100%'
	});
	$('#searchjob_pc #index_nn,#searchjob_pc #index_tt').select2({
		width: '42.5%'
	});
	$('.ico_menu').click(function () {
		$(this).find('.sub_menu').toggle();
	});
	$('#toggle_acc').click(function () {
		$('.sub_menu_acc').toggle();
	});
	$('#logged').click(function () {
		$('.sub_logged').toggle();
	});
	$('#logged_mb').click(function () {
		$('#for-mobile .sub_menu_mb').toggle();
	});
	$('.search_cate .keyword').keyup(function () {
>>>>>>> 12bb0cb9ff663446bb65b5a9c100a529c228166a
		e = $(this);
		type = e.attr('data-type');
		detail = e.attr('data-dt');
		keyword = e.val();

		$.ajax({
			type: "POST",
			url: "../ajax/getCateByKey.php",
			data: {
				type: type,
				detail: detail,
				keyword: keyword
<<<<<<< HEAD
			},success:function(data){
=======
			}, success: function (data) {
>>>>>>> 12bb0cb9ff663446bb65b5a9c100a529c228166a
				e.parent().next().html(data);
			}
		});
	});
<<<<<<< HEAD
	$('.popup_CompanySignin .fa').click(function(){
		$('.popup_CompanySignin').addClass('hidden');
	});
	$('#for-pc .tknc').click(function(){
		$('#search_advance').removeClass('hidden');
	});
	$('.adv_head .fa,#cancel').click(function(){
		$('#search_advance').addClass('hidden');
	});
	$('#for-mobile #keysearch').click(function(){
		$('#search_mobile').removeClass('hidden');
		$('#for-mobile').addClass('hidden');
		if($('.main_adv').hasClass('hidden') == false){
			$('.main_adv').addClass('hidden');
		}
	});
	$('.headerblog#for-mobile #keysearch').click(function(){
		$('#search_mobile').addClass('hidden');
		$('#for-mobile').removeClass('hidden');
		if($('.main_adv').hasClass('hidden') == false){
			$('.main_adv').addClass('hidden');
		}
	});
	$('#search_mobile .fa-angle-double-up,#adv_cancel').click(function(){
		$('#search_mobile').addClass('hidden');
		$('#for-mobile').removeClass('hidden');
	});
	$('.search_item #keyword').keyup(function(){
		$('#for-mobile #keysearch').val($(this).val());
	});
	$('.filter').click(function(){
		if($('#for-mobile').hasClass('hidden') == false){
			$('#for-mobile').addClass('hidden');
			$('.main_adv').removeClass('hidden');
		}
		if($('#search_mobile').hasClass('hidden')){
			$('#search_mobile').removeClass('hidden');
		}
		if($('.main_adv').hasClass('hidden')){
			$('.main_adv').removeClass('hidden');
		}else{
			$('.main_adv').addClass('hidden');
		}
	});
	$('.box_text_seo .read').click(function(){
		target = $('.box_text_seo .content .nd');
		e = $(this);
		if(target.hasClass('full') == false ){
			target.addClass('full');
			e.html('Thu gọn <i class="fa fa-angle-double-up" aria-hidden="true"></i>');
		}else{
=======
	$('.popup_CompanySignin .fa').click(function () {
		$('.popup_CompanySignin').addClass('hidden');
	});
	$('#for-pc .tknc').click(function () {
		$('#search_advance').removeClass('hidden');
	});
	$('.adv_head .fa,#cancel').click(function () {
		$('#search_advance').addClass('hidden');
	});
	$('#for-mobile #keysearch').click(function () {
		$('#search_mobile').removeClass('hidden');
		$('#for-mobile').addClass('hidden');
		if ($('.main_adv').hasClass('hidden') == false) {
			$('.main_adv').addClass('hidden');
		}
	});
	$('.headerblog#for-mobile #keysearch').click(function () {
		$('#search_mobile').addClass('hidden');
		$('#for-mobile').removeClass('hidden');
		if ($('.main_adv').hasClass('hidden') == false) {
			$('.main_adv').addClass('hidden');
		}
	});
	$('#search_mobile .fa-angle-double-up,#adv_cancel').click(function () {
		$('#search_mobile').addClass('hidden');
		$('#for-mobile').removeClass('hidden');
	});
	$('.search_item #keyword').keyup(function () {
		$('#for-mobile #keysearch').val($(this).val());
	});
	$('.filter').click(function () {
		if ($('#for-mobile').hasClass('hidden') == false) {
			$('#for-mobile').addClass('hidden');
			$('.main_adv').removeClass('hidden');
		}
		if ($('#search_mobile').hasClass('hidden')) {
			$('#search_mobile').removeClass('hidden');
		}
		if ($('.main_adv').hasClass('hidden')) {
			$('.main_adv').removeClass('hidden');
		} else {
			$('.main_adv').addClass('hidden');
		}
	});
	$('.box_text_seo .read').click(function () {
		target = $('.box_text_seo .content .nd');
		e = $(this);
		if (target.hasClass('full') == false) {
			target.addClass('full');
			e.html('Thu gọn <i class="fa fa-angle-double-up" aria-hidden="true"></i>');
		} else {
>>>>>>> 12bb0cb9ff663446bb65b5a9c100a529c228166a
			target.removeClass('full');
			e.html('Xem thêm <i class="fa fa-angle-double-down" aria-hidden="true"></i>');
		}
	});
<<<<<<< HEAD
	$('.main_popup_header .fa-times').click(function(){
		$('.popup_header').addClass('hidden');
	});
	$('.header_cv_top #mobile li.ico_menu').click(function(){
		$('.popup_header').removeClass('hidden');
	});
	width = $(window).width();
	if(width > 1048){
		$('#banner_cate').attr('data-src','/images/banner_cvxinviec.png');
		$('#banner_cate').attr('alt','Banner CV P/C');
	}else if(width < 1048 && width >= 768){
		$('#banner_cate').attr('data-src','/images/banner_cvxinviec2.png');
		$('#banner_cate').attr('alt','Banner CV Tablet');
	}else{
		$('#banner_cate').attr('data-src','/images/banner_cvxinviec3.png');
		$('#banner_cate').attr('alt','Banner CV mobile');
	}
	$('.main_popup_header .loggin .signin, .header_cv_top #signin').click(function(){
		if($('.popup_header').hasClass('hidden') == false){
=======
	$('.main_popup_header .fa-times').click(function () {
		$('.popup_header').addClass('hidden');
	});
	$('.header_cv_top #mobile li.ico_menu').click(function () {
		$('.popup_header').removeClass('hidden');
	});
	width = $(window).width();
	if (width > 1048) {
		$('#banner_cate').attr('data-src', '/images/banner_cvxinviec.png');
		$('#banner_cate').attr('alt', 'Banner CV P/C');
	} else if (width < 1048 && width >= 768) {
		$('#banner_cate').attr('data-src', '/images/banner_cvxinviec2.png');
		$('#banner_cate').attr('alt', 'Banner CV Tablet');
	} else {
		$('#banner_cate').attr('data-src', '/images/banner_cvxinviec3.png');
		$('#banner_cate').attr('alt', 'Banner CV mobile');
	}
	$('.main_popup_header .loggin .signin, .header_cv_top #signin').click(function () {
		if ($('.popup_header').hasClass('hidden') == false) {
>>>>>>> 12bb0cb9ff663446bb65b5a9c100a529c228166a
			$('.popup_header').addClass('hidden');
		}
		$('.popup_loggin_cv').removeClass('hidden');
	});
<<<<<<< HEAD
	$('.box_text_seo li a').click(function(){
		if(!$('.box_text_seo .nd').hasClass('full')){
=======
	$('.box_text_seo li a').click(function () {
		if (!$('.box_text_seo .nd').hasClass('full')) {
>>>>>>> 12bb0cb9ff663446bb65b5a9c100a529c228166a
			$('.box_text_seo .nd').addClass('full');
			$('.box_text_seo .read').html('Thu gọn <i class="fa fa-angle-double-up" aria-hidden="true"></i>');
		}
	});
});
<<<<<<< HEAD
function hide_show_password(e){
	if($(e).hasClass('fa-eye-slash')) $(e).removeClass('fa-eye-slash').addClass('fa-eye').parent().find('input').attr('type','text');
	else $(e).removeClass('fa-eye').addClass('fa-eye-slash').parent().find('input').attr('type','password');
=======
function hide_show_password(e) {
	if ($(e).hasClass('fa-eye-slash')) $(e).removeClass('fa-eye-slash').addClass('fa-eye').parent().find('input').attr('type', 'text');
	else $(e).removeClass('fa-eye').addClass('fa-eye-slash').parent().find('input').attr('type', 'password');
>>>>>>> 12bb0cb9ff663446bb65b5a9c100a529c228166a
}