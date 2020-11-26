<div id="s_around">
	<input type="hidden" name="lat" id="lat" value="<?php if($addr->results[0]->geometry->location->lat != ''){echo $addr->results[0]->geometry->location->lat; }else{echo '21.0228161';} ?>" />
	<input type="hidden" name="long" id="long" value="<?php if($addr->results[0]->geometry->location->lng != ''){echo $addr->results[0]->geometry->location->lng; }else{echo '105.801944';} ?>" />
	<input type="hidden" type="text" id="fts_id" class="enter_ntd" placeholder="Nhập tên công việc, chức danh ..." />
	<input type="text" placeholder="Nhập vị trí của bạn" name="address" id="keyword" onchange="updateLatLng()" />
	<select id="index_nganh_nghe" class="city_cate">
	<i class="mobi-cau"></i>
	<option value="0">Chọn ngành nghề</option>
	<?
	foreach($db_cat as $key => $value)
	{
	?>
	<option value="<?= $value['cat_id'] ?>"><?= $value['cat_name'] ?></option>
	<?
	}
	unset($type);
	?>
	</select>
	
	<div class="mb_5">
	<select id="index_dia_diem" class="city_ab" onchange="updateLatLng()">
	<option value="0">Chọn tỉnh thành</option>
	<?
	foreach ($arrcity as $key => $value) {
	?>
	<option value="<?= $value['cit_id'] ?>"><?= $value['cit_name'] ?></option>
	<?
	}
	unset($type);
	?>
	</select>
	</div>
	<div class="mb_5 c_2">
	<select id="index_km" class="city_ab">
	<option value="0">Bán kính (km)</option>
	<? for($i=1;$i<=10;$i++){ 
	$j = $i*2;
	?>
	<option value="<?= $j; ?>"><?= $j.' km'; ?></option>
	<? }
	unset($type, $item);
	?>
	</select> 
	</div>
	<button id="btn_map" onclick="mapByAdress()"><i class="fa fa-search" aria-hidden="true"></i> Tìm ngay</button> 
</div>