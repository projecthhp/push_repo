	<table class="table_ungtuyen">
		<tr>
			<th class="tr_tenuv">
				Tên ứng viên
			</th>
			<th>
				Vị trí tuyển dụng
			</th>
			<th class="tr_ngaynop">
				Ngày nộp
			</th>
			<th>
				Mức lương
			</th>
			<th>
				Địa điểm
			</th>
			<th class="tr_kinhnghiem">
				Kinh nghiệm
			</th>
			<th>
				Chức năng
			</th>
		</tr>
		<?
		while($row = mysql_fetch_assoc($db_query->result))
		{
		?>
		<tr>
			<td class="tr_tenuv">
				<p><?= $row['use_name'] ?></p>
				<p><?= $array_gioi_tinh[$row['gender']]?> - <?= date('Y',time()) - date('Y',$row['birthday']) ?> tuổi</p>
				<p><?= $row['use_job_name'] ?></p>
				<p><i><a href="<?= rewriteUV($row['use_id'],$row['use_name']) ?>" style="color:red">(Xem)</a></i></p>
			</td>
			<td>
				<?= $row['new_title'] ?>
			</td>
			<td class="tr_ngaynop">
				<?= date('d/m/Y',$row['nhs_time']) ?>
			</td>
			<td>
				<?= $array_muc_luong[$row['new_money']] ?>
			</td>
			<td>
				<?= $row['cit_name'] ?>
			</td>
			<td class="tr_kinhnghiem">
				<?= $array_kinh_nghiem_uv[$row['exp_years']] ?>
			</td>
			<td style="text-align: center;">
				<a onclick="return confirm('Bạn có chắc chắn muốn xóa bản ghi này ???');" href="../codelogin/xoa_hsut.php?id=<?=$row['id']?>" >Xóa</a>
			</td>
		</tr>
		<?
		}
		?>
	</table>
	<div class="pagination_wrap clr">
	    <div class="clr">
    <?
    	echo generatePageBar2('',$page,$curentPage,$count,'https://timviec365.com/nha-tuyen-dung/ho-so-ung-tuyen.html','?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
    ?>
      </div>
   </div>