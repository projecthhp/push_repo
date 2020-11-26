<div class="col-md-12 dsuv_12">
	<p id="dsuv_tieude">Danh sách ứng viên mới nhất</p>
	<div class="row">
	<?
		$db_uv = new db_query("SELECT * FROM user WHERE use_id <> '' AND use_job_name <> '' ORDER BY use_id DESC LIMIT 9");
		if(mysql_num_rows($db_uv->result))
		{
			while ($row = mysql_fetch_array($db_uv->result)) 
			{
	?>
		<div class="col-md-4 col-xs-12 uvmn">
			<div class="uvmn_avt">
				<img src="/images/dk_s.png">
			</div>
			<div class="uvmn_thongtin">
				<p id="ten_uvmn"><a title="<?= $row['use_job_name'] ?>" href="<?= rewriteUV($row['use_id'],$row['use_name']) ?>"><?= cut_string($row['use_job_name'],20,'...') ?></a></p>
				<p><?= $row['use_name'] ?></p>
				<ul>
					<li><?= ($row['salary'] != '')?$array_muc_luong[$row['salary']]:"Xem trong CV" ?></li>
					<li><?= ($row['exp_years'] != '')?cut_string($array_kinh_nghiem[$row['exp_years']], 12,'...'):'Xem trong Cv' ?></li>
					<li>
					<? 
						$str_citname = ' ';
						$db_cit = new db_query("SELECT cit_id,cit_name FROM city");
						$a = explode(',', $row['use_district_job']);
						while($row_cit = mysql_fetch_array($db_cit->result))
						{
							if(in_array($row_cit['cit_id'], $a)) $str_citname = $str_citname.$row_cit['cit_name']." ";
						}
						echo cut_string($str_citname,12,'...');
					?>
					</li>
					<li><?= date('d/m/Y',$row['use_update_time'])?></li>
				</ul>
			</div>
		</div>
	<?
		}
			}
	?>
	</div>
</div>