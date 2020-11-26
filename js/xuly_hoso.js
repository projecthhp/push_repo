$(document).ready(function(){
	$('.luu_hoso').click(function(){
		var id_user = $(this).attr('data-id');
		var ut = $(this).attr('data-ut');
		if(ut != '')
		{
			if($(this).hasClass('active_tt_uv') == false)
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
			alert('Bạn phải đăng nhập tài khoản nhà tuyển dụng để thực hiện thao tác này');
		}
		
	});
});