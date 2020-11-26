<div class="main main_right">
	<div class="head">
		<h2 class="headding_bm">Biểu mẫu mới</h2>
		<i class="fa fa-folder-open" aria-hidden="true"></i>
	</div>
	<ul>
		<?
		$db_bm_new = new db_query("SELECT new_id, new_title, new_title_rewrite FROM news WHERE new_category_id = 3 ORDER BY new_date DESC LIMIT 6");
		While($row = mysql_fetch_assoc($db_bm_new->result)){
			if($row['new_title_rewrite']!=''){
				$title_new = $row['new_title_rewrite'];
			}else{
				$title_new = replaceTitle($row['new_title']);
			}
		?>
		<li><a href="<?=rewriteBlog($row['new_id'],$title_new)?>"><?=$row['new_title']?></a></li>
		<?}
		unset($db_bm_new,$row);
		?>
	</ul>
</div>
<div class="main main_right">
	<div class="head">
		<h2 class="headding_bm">biểu mẫu nổi bật</h2>
		<i class="fa fa-folder-open" aria-hidden="true"></i>
	</div>
	<ul>
		<?
		$db_bm_view = new db_query("SELECT new_id, new_title, new_title_rewrite FROM news WHERE new_category_id = 3 ORDER BY new_view DESC LIMIT 6");
		While($row = mysql_fetch_assoc($db_bm_view->result)){
			if($row['new_title_rewrite']!=''){
				$title_new = $row['new_title_rewrite'];
			}else{
				$title_new = replaceTitle($row['new_title']);
			}
		?>
		<li><a href="<?=rewriteBlog($row['new_id'],$title_new)?>"><?=$row['new_title']?></a></li>
		<?}
		unset($db_bm_view,$row);?>
	</ul>
</div>