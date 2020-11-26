<p id="tt_form_tk">TÌM KIẾM ỨNG VIÊN</p>
<form action="/tim-ung-vien" method="get" id="frm_searchuv">
	<input type="text" value="<?= isset($keyword)?$keyword:'' ?>" name="keyword" id="keyword" placeholder="Nhập từ khóa mong muốn">
	<select name="nganhnghe"  id="nganhnghe_uv">
		<option value="0">Ngành nghề</option>
	    <?
	    foreach($db_cat as $type=>$item)
	    {
	    ?>
	    <option <?= isset($nganhnghe)?($nganhnghe == $item['cat_id']?"selected":""):""  ?> value="<?= $item['cat_id'] ?>"><?= $item['cat_name'] ?></option>
	    <?
	    }
	    unset($type,$item);
	    ?>
	</select>
	<select name="diadiem" id="tinhthanh">
		<option value="0">Tỉnh thành</option>
		<?
		foreach($arrcity as $type=>$item)
		{
		?>
		<option <?= isset($diadiem)?($diadiem == $item['cit_id']?"selected":""):""  ?> value="<?= $item['cit_id'] ?>"><?= $item['cit_name'] ?></option>
		<?
		}
		unset($type,$item);
		?>
	</select>
	<button type="submit" id="btn_search"><i class="fa fa-search" aria-hidden="true"></i></button>
	<!-- <button type="button" id="search_nc" data-toggle="modal" data-target="#myModal"><img src="/images/ico_tknc.png" alt=""></button> -->
</form>
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content" id="box_search_nc">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title"><span>+</span>Tìm kiếm nâng cao</h3>
			</div>
			<div class="modal-body">
				<p>Some text in the modal.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
</div>
</div>
