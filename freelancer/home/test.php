<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Upload nhiều ảnh bằng ajax</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<h3 align="center">Up ảnh</h3>
		<br>
		<p><input type="file" name="multiple_files" id="multiple_files" multiple></p>
		<span class="text-muted">Chỉ cho upload: .jpg,png,gif,jpeg</span>
		<span id="error_multiple_files"></span>
		<br/>
		<br/>
		<div class="table-responsive" id="image_table">

		</div>
	</div>
</body>
<script>
	$(document).ready(function(){
		load_image_data();
		function load_image_data(){
			$.ajax({
				url: "../ajax/fetch.php",
				method: "POST",
				success:function(data){
					$("#image_table").html(data);
				}
			});
		}
		$('#multiple_files').change(function(){
			var error_images = '';
			var form_data = new FormData();
			var files = $('#multiple_files')[0].files;
			if (files.length>10){
				error_images+='Ban khong duoc upload qua 10 anh!!';
			}else{
				for(var i = 0;i<files.length;i++){
					var name = document.getElementById('multiple_files').files[i].name;
					var ext = name.split(".").pop().toLowerCase();
					if(jQuery.inArray(ext,['gif','png','gif','jpeg']) == -1){
						error_images+='<p>Tep tin '+i+' khong hieu luc!!</p>'; 
					}
					var oFReader = new FileReader();
					oFReader.readAsDataURL(document.getElementById("multiple_files").files[i]);
					var f = document.getElementById("multiple_files").files[i];
					var fsize = f.size||f.fileSize;
					if (fsize>2000000){
						error_images+='<p>'+i+'File qua lon!!</p>';
					}else{
						form_data.append("file[]",document.getElementById('multiple_files').files[i]);
					}
				}
			}
			if (error_images==''){
				$.ajax({
					url: "../ajax/upload.php",
					method: "POST",
					data:form_data,
					contentType:false,
					cache:false,
					processData:false,
					beforeSend:function(){
						$('#error_multiple_files').html('<br><label class="text-primary">Dang tai...</label>');
					},
					success:function(data){
						$('#error_multiple_files').html('<br><label class="text-success">Da tai thanh cong!!...</label>');
						load_image_data();
					}
				});
			}
		});
	});
</script>
</html>