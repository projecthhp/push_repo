<?
							while ($row_hoso = mysql_fetch_array($db_query->result)) {
						?>
							<div class="hoso_daluu_uv">
								<div class="hoso_daluu_avt">
									<img src="<?= ($row_hoso['use_logo']!='')?geturlimageAvatar($row_hoso['use_create_time']).$row_hoso['use_logo']:'/images/dk_s.png'?>">
								</div>
								<div class="hoso_daluu_thongtin">
									<p><a href="<?= rewriteUV($row_hoso['use_id'],$row_hoso['use_name']) ?>"><strong><?= $row_hoso['use_job_name'] ?></strong></a></p>
									<p><a href="<?= rewriteUV($row_hoso['use_id'],$row_hoso['use_name']) ?>"><?= $row_hoso['use_name'] ?></a></p>
									<p style="color: #f14a4a">( Mã: <?= $row_hoso['use_id'] ?> )</p>
								</div>
								<ul class="hoso_daluu_ul">
									<li><img src="/images/salary.png"></li>
									<li><img src="/images/address.png"></li>
									<li><img src="/images/exp_years.png"></li>
									<li><?= ($row_hoso['salary'] != '')?$array_muc_luong[$row_hoso['salary']]:'Xem trong CV' ?></li>
									<li>
									<?
									if($row_hoso['use_district_job'] != ''){
										$array = explode(',', $row_hoso['use_district_job']);
										foreach ($array as $key => $value) {
											$sql_city = new db_query("SELECT cit_name FROM city WHERE cit_id = ".$value);
											$row = mysql_fetch_array($sql_city->result);
											echo $row['cit_name']." ";	
										}
									}
									else{
										echo "Xem trong CV";
									}
									?>
									</li>
									<li><?= ($row_hoso['exp_years'] != '')?$array_kinh_nghiem_uv[$row_hoso['exp_years']]:'Xem trong CV' ?></li>
								</ul>
								<div class="hoso_daluu_delete">
									<a onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này ??');" href="../codelogin/xoa_hoso.php?id_hoso=<?= $row_hoso['id_hoso']?>"><input class="btn btn-danger" type="button" name="" value="Xóa"></a>
								</div>
							</div>
						<?
							}
						?>
						<div class="pagination_wrap clr">
						    <div class="clr">
					    <?
					    	echo generatePageBar2('',$page,$curentPage,$count,'http://localhost:8891/nha-tuyen-dung/ho-so-da-luu.html','?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
					    ?>
					      </div>
					   </div>