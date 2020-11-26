$(document).ready(function(){
	$('.luu_hoso').click(function(){
		var id_user = $(this).attr('data-id');
		var ut = $(this).attr('data-ut');
		if(ut != '')
		{
			if(ut==1)
			{
				if($('.luu_hoso').hasClass('active_tt_uv') == false)
				{
					$.ajax({
						type:"POST",
						url: "../ajax/luu_hoso.php",
						data:{
							id_uv: id_user
						},
						success:function(data){
							if(data == 1)
							{
								$('.luu_hoso').addClass('active_tt_uv');
							}
						},
						error:function(data){
							console.log(data);
						}
					});
				}
				else
				{
					$.ajax({
						type:"POST",
						url: "../ajax/luu_hoso.php",
						data:{
							id_uv: id_user
						},
						success:function(data){
							if(data == 0)
							{
								$('.luu_hoso').removeClass('active_tt_uv');
							}
						},
						error:function(data){
							console.log(data);
						}
					});	
				}
			}
			else
			{
				alert("TK không thuộc nhà tuyển dụng, vui lòng đăng nhập TK nhà tuyển dụng");
			}
		}
		else{
			alert('Vui lòng đăng nhập để lưu thông tin ứng viên');
		}
		
	});

	$('#luu_tin').click(function(){
		var id_tin = $(this).attr('data-idtin');
		var uid = $(this).attr('data-uid');

		if($('#luu_tin').hasClass('active_luutin') == false){
			$.ajax({
				type: "POST",
				url: "../ajax/luu_tin.php",
				data: {
					id_tin: id_tin
				},
				success:function(data){
					if (data == 1) {$('#luu_tin').addClass('active_luutin');}					
				},
				error:function(data){
					console.log(data);
				}
			});
		}
		else
		{
			$.ajax({
				type: "POST",
				url: "../ajax/luu_tin.php",
				data: {
					id_tin: id_tin
				},
				success:function(data){
					if(data == 0){$('#luu_tin').removeClass('active_luutin');}
				},
				error:function(data){
					console.log(data);
				}
			});
		}
	});

	$('#ung_tuyen').click(function(){
		var id = $(this).attr('data-id');
		var id_user = $(this).attr('data-uid');
		var id_com = $(this).attr('data-idcom');

		if($(this).hasClass('btn-info') == false)
		{
			$.ajax({
				type:"POST",
				url: "../ajax/nop_ho_so.php",
				data:{
					idtin: id,
					iduse: id_user,
					iduser: id_com
				},
				success:function(data){
					$('#ung_tuyen').addClass('btn-info');
					$('#ung_tuyen').removeClass('btn-danger');
					$('#ung_tuyen').html('Đã ứng tuyển');
				}
			});
		}
		else
		{
			alert('Bạn đã ứng tuyển vị trí này !!!');
		}
	});
	// $('#btn_modal_ctuv_1').click(function(){
		
	// });
});

function login_ctuv(e)
{
	var user_name = $("#modal_text").val();
	var password = $('#modal_password').val();
	var id_user = $(e).attr('data-id');
	if(user_name != '' && password != '')
	{
		$.ajax({
			type: "POST",
			url: "../ajax/login_ntd_popup.php",
			data:{
				user_name : user_name,
				password : password,
				id_user : id_user
			},
			success:function(data)
			{
				if(data != 0)
					window.location.href = data;
				else
					alert('Tài khoản hoặc mật khẩu không đúng !!!');
			}
		});
	}
}