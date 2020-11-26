<div class="main_menu main">
	<?
	$db_qr = new db_query("SELECT * FROM cate_bieumau");
	$arr_bm = [];
	While($row = mysql_fetch_assoc($db_qr->result)){
		$arr_bm[$row['cate_id']] = ['alias'=>$row['cate_alias'],'name'=>$row['cate_name']];
	?>
	<div class="item_menu main">
		<i class="fa fa-angle-right" aria-hidden="true"></i><a href="<?=rewriteCateBM($row['cate_alias'])?>"><?=$row['cate_name']?></a>
	</div>
	<?
	}
	?>
</div>