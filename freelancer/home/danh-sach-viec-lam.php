<?php 
	include_once  "config.php";
	$idcate = getValue('idcate','int','GET',0);
	if($idcate == 0){
		$breakcrumb = "Việc làm Freelancer mới nhất";
	}
	if($idcate == 1){
		$breakcrumb = "Việc làm Freelancer theo dự án";
	}
	if($idcate == 2){
		$breakcrumb = "Việc làm Freelancer bán thời gian";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Việc làm Freelancer theo dự án</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<? echo $domain?>/image/icon/fa-icon/css/all.css">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo $domain ?>/css/all.css">
	<link rel="stylesheet" href="<?php echo $domain ?>/css/GiangCSS/All.css">
		
</head>
<body>
	
	<?php
		include_once 'head-index.php';
	?>
	<div class="G_background3 M-search-job"> <!-- background cả trang --> 
		<div class="G_header"> <!-- 3 dòng đầu (trang chủ, tìm kiếm, tìm nhiều nhất) -->
			<div class="G_line1">
				<a href="#">Trang chủ / </a><a href="#">Việc Freelancer /</a> <a><?=$breakcrumb?></a>
				
			</div>
			<? include_once 'search-job.php' ?>
		</div>
		<div class="G_midder"> <!-- tiếp đến xem thêm gần cuối trang -->
			<div class="G_column1"> <!-- cột bên trái gồm tất cả - việc làm freelancer theo dự án - việc làm freelancer bán thời gian -->
				<div class="G_menu"> <!-- thanh màu xanh gồm 3 cột -->
					<div class="G_cot1 M_btn_click <?if ($idcate == 0) {
						echo 'active';
					} ?>" tabindex="1">
						<a href="/tim-viec-lam-freelancer-flc0.html">Tất cả</a>
					</div>
					<div class="G_cot2 M_btn_click <? if ($idcate == 1) {
						echo 'active';
					} ?>" tabindex="2">
						<a href="/tim-viec-lam-freelancer-flc1.html">Việc làm Freelancer theo dựa án</a>
					</div>
					<div class="G_cot3 M_btn_click <? if ($idcate == 2) {
						echo 'active';
					} ?>" tabindex="3">
						<a href="tim-viec-lam-freelancer-flc2.html">Việc làm Freelancer bán thời gian</a>
					</div>
				<style>
					.G_background3 .G_menu .G_cot1.active a{
						background: #449AFF;
					}
					.G_background3 .G_menu .G_cot2.active a{
						background: #449AFF;
					}
					.G_background3 .G_menu .G_cot3.active a{
						background: #449AFF;
					}
				</style>
				
				</div>
				<div class="G_menu_mobile">
					<ul class="G_ul_outside">
						<li class="G_li_outside">
							<a href="#">
								Việc làm Freelancer theo dự án <i class="fas fa-sort-down"></i>
							</a>
							<ul class="G_ul_inside">
								<li class="G_li_inside1">
									<a href="#">Tất cả</a>
								</li>
								<li class="G_li_inside2">
									<a href="#">Việc làm Freelancer bán thời gian</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="G_content"> <!-- khung của tất cả sản phẩm bên dưới thanh màu xanh -->
					<?php
						include_once  '../xl_code/all_du_an.php';
						// include_once '../xl_code/xl_search_box.php';
					?>
				</div>
				<?php
					if ($COUNT >= 8) {
				?>
				<div class="G_xem_them">
					<a >Xem thêm <img src="<?php echo $domain ?>/image/img/1xemthem.png" alt=""></a>
				</div>
				<?php		
					}
				?>

				<!-- MODAL (cái kính lúp bên tablet) -->
					<div class="container">
						<!-- Trigger the modal with a button -->
						<a class="G_a1" type="button" data-toggle="modal" data-target="#myModal" href="#"><img src="<? echo $domain ?>/image/img/1kinh-lup.png" alt=""></a>
						<!-- Modal -->
						<div class="modal fade" id="myModal" role="dialog">
						    <div class="modal-dialog">
						      <!-- Modal content-->
							    <div class="modal-content">
							        <div class="modal-header"> <!-- bên trên dấu gạch -->
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <p class="modal-title">Lọc việc làm freelancer</p>
							        </div>
							        <div class="modal-body"> <!-- giữa dấu gạch -->
							        	<div class="G_tieu_de1">Ngành nghề</div>
							        	<div class="G_o1"> <!-- bao trùm ô ngành nghề -->
							        		<div class="G_cot_trai1">
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Tất cả</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div  class="G_p">
							        					<p>IT & Lập trình</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Thiết kế</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Viết lách & Dịch thuật</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Marketing & Bán hàng</p>
							        				</div>
							        			</div>
							        		</div>
							        		<div class="G_cot_phai1">
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Kinh doanh, Nhập liệu & Hành chính</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div  class="G_p">
							        					<p>Kê toán, Thuế & Luật</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Kiến trúc & Xây dựng</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Video</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Lĩnh vực khác</p>
							        				</div>
							        			</div>
							        		</div>
							        	</div>
							        	<div class="G_tieu_de2">Địa điểm</div>
							        	<div class="G_o2"> <!-- bao trùm ô địa điểm -->
							        		<div class="G_cot_trai1">
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Tất cả</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div  class="G_p">
							        					<p>Hà Nội</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Hồ Chí Minh</p>
							        				</div>
							        			</div>
							        		</div>
							        		<div class="G_cot_phai1">
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Đà Nẵng</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div  class="G_p">
							        					<p>Bình Dương</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Cần Thơ</p>
							        				</div>
							        			</div>
							        		</div>
							        	</div>
							        	<div class="G_tieu_de2">Địa điểm</div>
							        	<div class="G_o3"> <!-- bao trùm ô Kỹ năng -->
							        		<div class="G_cot_trai1">
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Tất cả</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div  class="G_p">
							        					<p>Cắt HTML/CSS</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>PHP</p>
							        				</div>
							        			</div>
							        		</div>
							        		<div class="G_cot_phai1">
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Javascript</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div  class="G_p">
							        					<p>Adobe Photoshop</p>
							        				</div>
							        			</div>
							        			<div class="G_current1">
							        				<div>
							        					<input type="checkbox" name="" id="">
							        				</div>
							        				<div class="G_p">
							        					<p>Adobe Illustrator</p>
							        				</div>
							        			</div>
							        		</div>
							        	</div>
							        </div>
							        <div class="modal-footer"> <!-- bên dưới dấu gạch -->
							        	<div class="G_a">
							        		<a type="button" href="#">Áp dụng</a>
							        	</div>
							    	</div>
							    </div>
						    </div>
						</div>
					</div>
			</div>
			<!-- Cột bên phải, mấy cái ô tích tích và quảng cáo -->
			<div class="G_column2">
				<!-- thanh màu xanh bên phải -->
				<div class="G_menu2">
					<div tabindex="4" class="G_cot_giua">
						<a href="#">Lọc việc làm Freelancer</a>
					</div>
				</div>
				<div class="G_checked">  <!-- Các ô checked -->
					<div class="G_in_checked"> <!-- viền bao bọc tất cả các ô -->
						<div class="G_wow"> <!-- Ngành nghề -->
							<div class="G_title">
								Ngành nghề
							</div>
							<style>
								.label{
									font-size: 15px;
									line-height: 24px;
									color: #545D69;
									font-family: Roboto-Regular;
								}
								label.label::after{
									content: none;
								}
								.G_wow{
									clear:both;
								}
							</style>
							<div class="G_checkbox">
							 	<div>
									<input type="checkbox"  name="checkbox[]" id="id1"  class="cb-element" value="0" >
									<label for="id1" class="label" >Tất cả</label>
								</div>
							 	<div>
								 	<input type="checkbox" name="checkbox[]" id="id2" class="cb-element" value="1">
									 <label for="id2" class="label">IT & Lập trình</label>
								</div>
							 	<div>
									<input type="checkbox" name="checkbox[]" id="id3" class="cb-element" value="2">
									<label for="id3" class="label">Thiết kế</label>
								 </div>
							 	<div>
									<input type="checkbox" name="checkbox[]" id="id4" class="cb-element" value="3">
									<label for="id4" class="label">Viết lách & Dịch thuật</label>
								 </div>
							 	<div>
									<input type="checkbox" name="checkbox[]" id="id5" class="cb-element" value="4">
									<label for="id5" class="label">Kinh doanh, Nhập liệu & Hành chính</label>
								 </div>
							 	<div>
									<input type="checkbox" name="checkbox[]" id="id6" class="cb-element" value="5">
									<label for="id6" class="label">Kế toán, Thuế & Luật</label>
								 </div>
							 	<div>
									<input type="checkbox" name="checkbox[]" id="id7" class="cb-element" value="6">
									<label for="id7" class="label">Kiến trúc & Xây dựng</label>
								 </div>
							 	<div>
									<input type="checkbox" name="checkbox[]" id="id8" class="cb-element" value="7">
									<label for="id8" class="label">Video</label>
								 </div>
							 	<div>
									<input type="checkbox" name="checkbox[]" id="id9" class="cb-element" value="8">
									<label for="id9" class="label">Lĩnh vực khác</label>
								 </div>
							</div>
							<div class="G_noidung">
							</div>
						</div>
						<div class="result"></div>
						<div class="G_wow"> <!-- Ngành nghề -->
							<div class="G_title">
								Thành phố
							</div>
							<div class="G_checkbox">
							 	<div>
								 	<input type="checkbox" name="tpcheckbox[]" id="tp1"  class="cb-element-tp" >
									<label for="tp1"  class="label">Tất cả</label>
								</div>
							 	<div>
								 	<input type="checkbox" name="tpcheckbox[]" id="tp2"  class="cb-element-tp" value="1">
									<label for="tp2" class="label">Hà Nội</label>
								</div>
							 	<div>
								 	<input type="checkbox" name="tpcheckbox[]" id="tp3"  class="cb-element-tp" value="2">
									<label for="tp3" class="label">Hồ Chí Minh</label>
								</div>
							 	<div>
								 	<input type="checkbox" name="tpcheckbox[]" id="tp4"  class="cb-element-tp" value="3">
									<label for="tp4" class="label">Đà Nẵng</label>
								</div>
							 	<div>
								 	<input type="checkbox" name="tpcheckbox[]" id="tp5"  class="cb-element-tp" value="4">
									<label for="tp5" class="label">Bình Dương</label>
								</div>
							 	<div>
								 	<input type="checkbox" name="tpcheckbox[]" id="tp6"  class="cb-element-tp" value="5">
									<label for="tp6" class="label">Cần Thơ</label>
								</div>
							</div>
							<div class="G_noidung">
							</div>
						</div>
						<div class="G_wow"> <!-- Ngành nghề -->
							<div class="G_title">
								Kỹ năng
							</div>
							<div class="G_checkbox">
							 	<div>
								 	<input type="checkbox" name="kncheckbox[]" id="kn1" class="cb-element-kn">
									 <label for="kn1" class="label" >Tất cả</label>
								</div>
							 	<div>
								 	<input type="checkbox" name="kncheckbox[]" id="kn2" class="cb-element-kn" value="1">
									 <label for="kn2" class="label" >Cắt HTML/CSS</label>
								</div>
							 	<div>
								 	<input type="checkbox" name="kncheckbox[]" id="kn3" class="cb-element-kn" value="2">
									 <label for="kn3" class="label" >PHP</label>	
								</div>
							 	<div>
								 	<input type="checkbox" name="kncheckbox[]" id="kn4" class="cb-element-kn" value="3">
									 <label for="kn4" class="label" >VJavascript</label>
								</div>
							 	<div>
								 	<input type="checkbox" name="kncheckbox[]" id="kn5" class="cb-element-kn" value="4">
									 <label for="kn5" class="label" >Adobe Photoshop</label>
								</div>
							 	<div>
								 	<input type="checkbox" name="kncheckbox[]" id="kn6" class="cb-element-kn" value="5">
									 <label for="kn6" class="label" >Adobe Illustrator</label>
								</div>
							</div>
							<div class="G_noidung">			
							</div>
						</div>
					</div>
					<style>
						
					</style>
					<div class="G_img0">
						<img src="<?php echo $domain ?>/image/img/1advertisement.png" alt="">
					</div>
					<div class="G_img1">
						<img src="<?php echo $domain ?>/image/img/1logotl.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.4.min.js"></script> -->
	<script src="<? echo $domain ?>/js/jquery.min.js"></script>
	<script src="<? echo $domain ?>/js/select2.min.js"></script>
	<script src="<? echo $domain ?>/js/slick.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="<? echo $domain ?>/js/all.js"></script>
<script>
	 
	 $(document).ready(function( ){
		$('.hello').select2({
			width:"25.22%"
		});
		//script chạy tích ngành nghề nói chung là như thế
		$("#id1").change(function () {
		$("input:checkbox.cb-element").prop('checked', $(this).prop("checked"));
			});

		$(".cb-element").change(function () {
			if($(".cb-element").length==$(".cb-element:checked").length)
				$("#id1").prop('checked', true);
			else
				$("#id1").prop('checked', false);
		});

		// tích chỗ thành phố
		$("#tp1").change(function () {
		$("input:checkbox.cb-element-tp").prop('checked', $(this).prop("checked"));
			});

		$(".cb-element-tp").change(function () {
			if($(".cb-element-tp").length==$(".cb-element-tp:checked").length)
				$("#tp1").prop('checked', true);
			else
				$("#tp1").prop('checked', false);
			});

		$("#kn1").change(function () {
			$("input:checkbox.cb-element-kn").prop('checked', $(this).prop("checked"));
		});

		$(".cb-element-kn").change(function () {
			if($(".cb-element-kn").length==$(".cb-element-kn:checked").length)
				$("#kn1").prop('checked', true);
			else
				$("#kn1").prop('checked', false);
		});
	});
	$('.G_background3 .G_search_bar button').click(function(){
		
	console.log($('#select2-category-ge-container').html());
	return false;
	});
</script>	
<script>
$(document).ready(function( ){
	$("input[type='checkbox']").click(function(){
		var nganh_nghe = [];
		var thanh_pho = [];
		var ky_nang = [];
		var url = [] ;
		url = window.location.search;
		//
		$("input[name='kncheckbox[]']:checked").each(function(){
			ky_nang.push($(this).val());
		});
	//
		$("input[name='tpcheckbox[]']:checked").each(function(){
			thanh_pho.push($(this).val());
		});

		$("input[name='checkbox[]']:checked").each(function(){
			nganh_nghe.push($(this).val());
		});
		$.ajax({
			url: "<?php echo $domain ?>/xl_code/xl_tim_kiem_nang_cao.php",
			type:"POST",
			data: {
				nganh_nghe: nganh_nghe,
				thanh_pho: thanh_pho,
				ky_nang: ky_nang,
				idcate: url
			},
			success: function(result){
				$(".G_content").html(result);
			}
		});
		
	})
});
</script>
</body>
</html>