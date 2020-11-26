function showPackage(id,position){
	$.ajax({
		type:"POST",
		url:"../ajax/get_package.php",
		data: {
			idPackage : id,
			position: position
		},success:function(data){
			$('#detail_package_'+position).show('slow');
			$('#detail_package_'+position).html(data);
			offset = $('#detail_package_'+position).offset().top - 50;
			$('html,body').animate({
				scrollTop: offset
			},1000);
		}
	});
}
function showPackage2(e,id,detect = 1){
	$('.item_tab').removeClass('active');
	$(e).addClass('active');
	$.ajax({
		type:"POST",
		url:"../ajax/get_package.php",
		data: {
			idPackage : id,
			detect : detect
		},success:function(data){
			$('.detail_package').html(data);
		}
	});
}
function closePackage(position){
	$('#detail_package_'+position).hide('slow');
	$('#detail_package_'+position).html('');
}
function show_bot_package(e,classCheck){
	$('.item_bot_package').removeClass('active');
	$(e).addClass('active');
	$('.child_bot_package').css('display','none');
	$(e).parent().find('.'+classCheck).css('display','block');
}
function close_bot_package(e){
	$(e).parent().parent().css('display','none');
	$('.item_bot_package').removeClass('active');
}
function show_popup(){
	$('#modalBangGia').removeClass('hidden');
	$('#modalBangGia').hide().show('slow');
}
$(document).ready(function() {
	Obj = {
		"bank": [{
			"stk": "21610000462781",
			"ctk": "DƯƠNG THỊ MINH TUYỂN",
			"cn": "Đống Đa, Hà Nội"
		}, {
			"stk": "1300206354722",
			"ctk": "DƯƠNG THỊ MINH TUYỂN",
			"cn": "Thăng Long, Hà Nội"
			
		}, {
			"stk": "0301000383905",
			"ctk": "DƯƠNG THỊ MINH TUYỂN",
			"cn": "Hoàn Kiếm, Hà Nội"
		}, {
			"stk": "0680117278008",
			"ctk": "DƯƠNG THỊ MINH TUYỂN",
			"cn": "Hà Nội"
		}, {
			"stk": "03501013976108",
			"ctk": "DƯƠNG THỊ MINH TUYỂN",
			"cn": "Nam Hà Nội"
		}, {
			"stk": "19031707022012",
			"ctk": "DƯƠNG THỊ MINH TUYỂN",
			"cn": "Nam Hà Nội"
			
		}, {
			"stk": "245415299",
			"ctk": "DƯƠNG THỊ MINH TUYỂN",
			"cn": "Hà Nội"
		}, {
			"stk": "103867423326",
			"ctk": "DƯƠNG THỊ MINH TUYỂN",
			"cn": "Thanh Xuân, Hà Nội"
		}]
	}
	$('.item_bank').click(function() {
		$('.item_bank').removeClass('active');
		var id = $(this).attr('data-id');
		$(this).addClass('active');

		$('.infor_bank fieldset #stk').html(Obj.bank[id].stk);
		$('.infor_bank fieldset #ctk').html(Obj.bank[id].ctk);
		$('.infor_bank fieldset #cn').html(Obj.bank[id].cn);
	});
	$('#modalBangGia .modal-header .fa').click(function(){
		$('#modalBangGia').hide('slow');
	});
})