<?
	if(isset($flag)){
?>
<div class="col-md-12 bottom_search pull-left">
	<p><?= $tt_bot ?></p>
	<?
	if($flag == 1){
		foreach ($db_cat as $key => $item) 
		{
			if($item['cat_id']!=$nganhnghe){

			
	?>
		<a class="col-md-4 col-xs-12" href="<?= rewriteCate(0,0,$item['cat_id'],$item['cat_name']) ?>">Việc làm <?= $item['cat_name']?> <span style="color:red">(<?= $item['cat_count_vl']?>)</span></a>
	<?
			}
		}
	}
	else if($flag == 2)
	{
		foreach ($arrcity as $key => $item) {
			if($item['cit_id']!=$diadiem)
			{
	?>
		<a class="col-md-4 col-xs-12" href="<?= rewriteCate($item['cit_id'],$item['cit_name'],0,0) ?>">Việc làm tại <?= $item['cit_name']?> <span style="color: red"> (<?= $item['cit_count_vl']?>)</span></a>
	<?
			}
		}
	}
	else if($flag == 3)
	{
		foreach ($arrcity as $key => $value) {
			if($value['cit_id']!=$diadiem){
	?>
		<a href="<?= rewriteCate($value['cit_id'],$value['cit_name'],$db_cat[$nganhnghe]['cat_id'],$db_cat[$nganhnghe]['cat_name']) ?>" class="col-md-4 col-xs-12">Việc làm <?= $db_cat[$nganhnghe]['cat_name'] ?> tại <?= $value['cit_name'] ?></a>
	<?
			}
		}
	}
	?>
</div>
<?
	}
?>