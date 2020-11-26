<div class="main_show main main_bieumau">
	<div class="right">
		<?include('../includes/blog/inc_menu_bm.php')?>
	</div>
	<div class="left">
		<?
		$arr_bm_cate = [
			'1' => ['name_class'=>'bieumau_lamviec','image'=>'bn_bieumaulamviec.png'],
			'2' => ['name_class'=>'thongke','image'=>'bn_bieumauthongke.png'],
			'3' => ['name_class'=>'baocao','image'=>'bn_bieumaubaocao.png'],
			'4' => ['name_class'=>'khenthuong','image'=>'khenthuong.png'],
			'5' => ['name_class'=>'hopdong','image'=>'bn_hopdong.png'],
			'6' => ['name_class'=>'maudon','image'=>'bn_maudon.png'],
		];
		$i = 1;
		foreach ($arr_bm as $key => $cate) {
		?>
		<div class="item_cate <?=$arr_bm_cate[$i]['name_class']?>">
			<div class="banner">
				<img src="/images/load.gif" class="lazyload" data-src="/images/<?=$arr_bm_cate[$i]['image']?>" alt="Ảnh biểu mẫu">
			</div>
			<div class="show_content">
				<div class="top text-center">
					<span class="headding_bm"><?=$cate['name']?></span>
				</div>
				<div class="main">
					<?
					$db_qrs = new db_query('SELECT new_id, new_title, new_title_rewrite FROM news WHERE new_cate_bm = '.$key.' LIMIT 5');
					While($rows = mysql_fetch_assoc($db_qrs->result)){
						if($rows['new_title_rewrite']!=''){
							$new_title = $rows['new_title_rewrite'];
						}else{
							$new_title = replaceTitle($rows['new_title']);
						}
					?>
					<div class="item main">
						<i class="icon"></i><a href="<?=rewriteBlog($rows['new_id'],$new_title)?>"><?=$rows['new_title']?></a>
					</div>
					<?}?>
				</div>
				<div class="text-center">
				<a href="<?=rewriteCateBM($cate['alias'])?>" class="showmore">Xem thêm</a>
				</div>
			</div>
		</div>
		<?
		$i++;
		}
		?>
	</div>
	<div class="right">
		<?include('../includes/blog/inc_right_bm.php')?>
	</div>
</div>