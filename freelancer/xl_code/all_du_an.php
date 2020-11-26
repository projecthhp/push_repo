<?php
	include_once '../home/config.php';
	$page = $_GET['idcate'];
	if (isset($_GET['keyword'])) {
		$keyword = $_GET['keyword'];
		$sql_key = " where ten_viec_lam LIKE %$keyword% ";
	}
	if (isset($_GET['city'])) {
		$city = $_GET['city'];
		$sql_city = " AND FIND_IN_SET('$city',noi_lam_viec)" ;
	}else{
		$sql_city ="";
	}
	if (isset($_GET['category'])) {
		$category = $_GET['category'];
		$sql_category = " AND linh_vuc =" .$category ;
	}else{
		$sql_category ="";
	}
    if ($page == 2) {
        $sql_all = " where loai_viec_lam = 2";
    }elseif ($page == 1) {
        $sql_all = " where loai_viec_lam = 1";
    }else {
        $sql_all = "";
    }
    $sql ="SELECT * from flc_viec_lam
    inner join flc_user_ntd on flc_viec_lam.ma_nguoi_dang=flc_user_ntd.ma_ntd" 
	." INNER JOIN flc_ky_nang on flc_viec_lam.ma_ki_nang=flc_ky_nang.ma_ky_nang"
    .$sql_all .$sql_category .$sql_city ." ORDER BY ma_viec_lam DESC ";
	$db_qr = new db_query($sql);
//    echo $sql;
   $sql_count = "SELECT COUNT(ma_viec_lam) from flc_viec_lam
   inner join flc_user_ntd on flc_viec_lam.ma_nguoi_dang=flc_user_ntd.ma_ntd" 
   ." INNER JOIN flc_ky_nang on flc_viec_lam.ma_ki_nang=flc_ky_nang.ma_ky_nang"
   .$sql_all .$sql_category .$sql_city ." ORDER BY ma_viec_lam DESC";
	$db_qr_count = new db_query($sql_count);
	$count = mysql_fetch_assoc($db_qr_count->result);
	$COUNT = implode('',$count);
   While($row = mysql_fetch_assoc($db_qr->result)){
?>
<div class="G_dong1"> <!-- khung bên ngoài sp thứ nhất -->
		<div class="G_logo"> <!-- khung bên trong gồm tất cả gì có bên trong khung sp thứ nhất -->
			<div class="G_img"> <!-- logo -->
				<img src="<?php echo $domain ?>/image/img_user/img_ntd/<?php echo $row['logo_cty']?>" alt="logo">
			</div>
			<div class="G_nd"> <!-- bên cạnh logo -->
				<div class="G_span">
					<a href="ProjectEmployment.php">
						<span>
						<?php echo	$row['ten_viec_lam']; ?>
						</span>
					</a>
				</div>
				<div class="G_name">
					<?php echo $row['ten_ntd']  ?>
				</div>
				<div class="G_cs">
					<div class="G_dm">
						<div style="float: left;">
							<img src="<?php echo $domain ?>/image/img/1capsach.png" alt="anh">
						</div>
							<div class="G_ha">
							<?php
								$arr_linh_vuc = $row['linh_vuc'];
								echo $array_nganh_nghe[$arr_linh_vuc];		
							?>
							</div>
					</div>
					<div>
						<div style="float: left;">
							<img src="<?php echo $domain ?>/image/img/1ggmaps.png" alt="anh">
						</div>
							<div class="G_ha">
								<?php
                                    $arr_diadiem = explode(",", $row['noi_lam_viec']);
                                    $dia_diem = [];
									foreach ($arr_diadiem as $key => $value) {
                                        $dia_diem[] = $value;
                                    }
                                    $sql1 = implode(' or cit_id = ',$dia_diem);
                                    $sql_dia_diem ="select * from city where cit_id = " .$sql1;
								   $db_qr1 = new db_query($sql_dia_diem);
                                   While($row1= mysql_fetch_assoc($db_qr1->result)){
										$demo = explode(",",$row1["cit_name"]);
										 $demi = implode(",",$demo);
										 echo $demi;
                                   }
								?>
							</div>
					</div>
				</div>
			</div>
			<div class="G_not_span" style="height: 85px"> <!-- đặt giá và heart -->
				<div>
						<img src="<?php echo $domain ?>/image/img/1heart.png" alt="anh"><a href="#">Đặt giá</a>
				</div>
			</div>
			<div class="G_under_logo"> <!-- các thông số -->
				<div class="G_inside1">
					<a href="#"><?php
						if ($row['loai_viec_lam'] == 1) {
							echo "Dự Án";
						}else {
							echo 'Bán thời gian';
						}
					?></a>
				</div>
				<div class="G_inside1">
					<p class="G_p2_1">
						<?php
                                $dm = $row["chi_phi"];
								echo number_format("$dm") ."VNĐ/" ;
								$chi_phi = $row['chi_phi_theo_ngay'];
							if ($chi_phi == 1) {
								echo "Ngày";
							}elseif ($chi_phi == 2){
									echo "Tuần";
							}elseif ($chi_phi == 3){
								echo "Tháng";
							}elseif ($chi_phi == 4){
								echo "Năm";
							}
						?>
					</p>
				</div>
				<div class="G_inside1">
					<p><strong>5</strong> lượt đặt giá</p>
				</div>
				<div class="G_inside2">
					<p><strong>Hết hạn:</strong>
						<?php
							echo date('d-m-Y',$row['ngay_dat_gia_ket_thuc']);
						?>
					</p>
				</div>
			</div>
			<div class="G_document"> <!-- văn bản -->
				<p> 
				<?php
					echo $row['mo_ta'];
				?> 
				</p>
			</div>
			<!-- Kỹ năng -->
			<div class="skill">
				<div class="skill1">Kỹ năng: </div>
                <?php
					$vl = explode(",",$row['ma_ki_nang']);
					$sqlkn = implode(' or ma_ky_nang = ',$vl);
					$sql_kn ="select * from flc_ky_nang where ma_ky_nang = " .$sqlkn;
					// echo $sql_kn;
				   $db_qr_kn = new db_query($sql_kn);
				   
				   While($rowkn = mysql_fetch_assoc($db_qr_kn->result)){							
				?>
                    <div class="skill2"><?php echo $row['ten_ky_nang'] ?></div>
						<?}?>
				<!-- <div class="skill8"><span>+2</span></div> -->
			</div>
		</div>
	</div>
<?php }?>