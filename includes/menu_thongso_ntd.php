<div class="thong_so" >
	<ul>
		<li>
			<i class="fa fa-edit "></i>
			<span>Việc làm đã đăng</span>
			<span>
				<?
					$db_count = new db_query("SELECT new_id FROM new WHERE new_user_id = ".$_COOKIE['UID']);
					echo mysql_num_rows($db_count->result);
					unset($db_count);
				?>
			</span>
		</li>
		<li>
			<i class="fa fa-user"></i>
			<span>Tổng số ứng tuyển</span>
			<span>
			<?
				$db_count = new db_query("SELECT id FROM nop_ho_so WHERE nhs_com_id = ".$_COOKIE['UID']);
				echo mysql_num_rows($db_count->result);
				unset($db_count);
			?>
			</span>
		</li>
		<li>
			<i class="fa fa-eye "></i>
			<span>Số lượt xem hồ sơ</span>
			<span>
			<?
				$db_count = new db_query("SELECT usc_view_count FROM user_company WHERE usc_id = ".$_COOKIE['UID']);
				$row = mysql_fetch_assoc($db_count->result);
				echo $row['usc_view_count'];
				unset($row);
			?>
			</span>
		</li>
	</ul>
</div>