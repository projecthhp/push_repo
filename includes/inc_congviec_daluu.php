<?
							while ($row_hoso = mysql_fetch_array($db_query->result)) {
						?>
							<div class="hoso_daluu_uv">
								<div class="hoso_daluu_avt">
									<img src="<?= ($row_hoso['usc_logo']!='')?geturlimageAvatar($row_hoso['usc_create_time']).$row_hoso['usc_logo']:'/images/no-image.png'?>">
								</div>
								<div class="hoso_daluu_thongtin">
									<p><a href="<?= rewriteNews($row_hoso['new_id'],$row_hoso['new_title']) ?>"><strong><?= $row_hoso['new_title'] ?></strong></a></p>
									<p><a href="<?= rewrite_company($row_hoso['usc_id'],$row_hoso['usc_company'],$row_hoso['usc_alias']) ?>">
										<?=
											$row_hoso['usc_company'];
											
										?>
											
									</a></p>
									<p style="color: #f14a4a">( Mã: <?= $row_hoso['new_id'] ?> )</p>
								</div>
								<ul class="hoso_daluu_ul">
									<li><img src="/images/salary.png"></li>
									<li><img src="/images/address.png"></li>
									<li><img src="/images/exp_years.png"></li>
									<li><?= ($row_hoso['new_money'] != '')?$array_muc_luong[$row_hoso['new_money']]:'Xem trong CV' ?></li>
									<li>
									<?
									$array = explode(',', $row_hoso['new_city']);
											$city = new db_query("SELECT * FROM city");
											while($row_cit = mysql_fetch_array($city->result)){
												if(in_array($row_cit['cit_id'], $array)) echo $row_cit['cit_name']."  ";
											}
									?>
									</li>
									<li><?= ($row_hoso['new_exp'] != '')?$array_kinh_nghiem[$row_hoso['new_exp']]:'Xem trong CV' ?></li>
								</ul>
								<div class="hoso_daluu_delete">
									<a onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này ??');" href="../codelogin/xoa_tin_vieclam.php?id_hoso=<?= $row_hoso['id']?>"><input class="btn btn-danger" type="button" name="" value="Xóa"></a>
								</div>
							</div>
						<?
							}
						?>
						<div class="pagination_wrap clr">
						    <div class="clr">
					    <?
					    	echo generatePageBar2('',$page,$curentPage,$count,'http://localhost:8891/ung-vien/viec-lam-da-luu.html','?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
					    ?>
					      </div>
					   </div>