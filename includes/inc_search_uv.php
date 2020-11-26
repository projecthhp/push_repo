<div id="searchcandi_pc">
    <form onsubmit="return false">
        <input value="<?= isset($keyword)?$keyword:"" ?>" id="keyword_candi" type="text" placeholder="Nhập từ khóa mong muốn ...">
        <select id="index_nn">
            <option value="0">Chọn ngành nghề</option>
            <?
            foreach ($db_cat as $key => $value) {
            ?>
            <option <?= isset($nganhnghe)?($nganhnghe == $value['cat_id'])?"selected":"":"" ?> value="<?=$value['cat_id']?>"><?=$value['cat_name']?></option>
            <?
            }
            ?>
        </select>
        <select id="index_tt">
            <option value="0">Chọn tỉnh thành</option>
            <?
            foreach ($arrcity as $key => $value) {
            ?>
            <option <?= isset($diadiem)?($diadiem == $value['cit_id'])?"selected":"":"" ?> value="<?=$value['cit_id']?>"><?=$value['cit_name']?></option>
            <?
            }
            ?>
        </select>
        <button id="btn_search" class="btn_search_uv"><i class="fa fa-search" aria-hidden="true"></i>  Tìm ngay</button>
    </form>
</div>