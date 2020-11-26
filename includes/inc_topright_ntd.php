<ul>
	<li>
		<p><img src="/images/ico_vieclamdadang.png" alt=""></p>
		<p>Việc làm đã đăng</p>
		<span style="color: #D12F2F;">
		<?
			$db_count = new db_query("SELECT new_id FROM new WHERE new_user_id = ".$_COOKIE['UID']);
			echo mysql_num_rows($db_count->result);
			unset($db_count);
		?>
		</span></li>
	<li>
		<p><img src="/images/ico_tongsoungtuyen.png" alt=""></p>
		<p>Tổng số ứng tuyển</p>
		<span style="color: #D12F2F;">
		<?
			$db_count = new db_query("SELECT id FROM nop_ho_so WHERE nhs_com_id = ".$_COOKIE['UID']);
			echo mysql_num_rows($db_count->result);
			unset($db_count);
		?>
		</span></li>
	<li>
		<p><img src="/images/ico_eyes.png" alt=""></p>
		<p>Số lượt xem hồ sơ</p>
		<span style="color: #D12F2F;">
		<?
			$db_count = new db_query("SELECT usc_view_count FROM user_company WHERE usc_id = ".$_COOKIE['UID']);
			$row = mysql_fetch_assoc($db_count->result);
			echo $row['usc_view_count'];
			unset($row);
		?>
		</span></li>
	<li>
		<p><img src="/images/ico_dangtin.png" alt=""></p>
		<p><a href="/nha-tuyen-dung/dang-tin.html">Đăng tin tuyển dụng</a></p>
	</li>
</ul>