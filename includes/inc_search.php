<div id="searchjob_pc">
    <form onsubmit="return false">
<<<<<<< HEAD
        <input id="keyword_job" type="text" value="<?= isset($keyword)?$keyword:"" ?>" placeholder="Nhập từ khóa mong muốn ...">
=======
        <!-- <input id="keyword_job" type="text" value="<?= isset($keyword)?$keyword:"" ?>" placeholder="Nhập từ khóa mong muốn ..."> -->
>>>>>>> 12bb0cb9ff663446bb65b5a9c100a529c228166a
        <select id="index_nn">
            <option value="0">Chọn ngành nghề</option>
            <?
            foreach ($db_cat as $key => $value) {
            ?>
            <option <?= isset($nganhnghe)?($nganhnghe == $value['cat_id'])?"selected":"":"" ?> value="<?=$value['cat_id']?>"><?=$value['cat_name']?></option>
            <?
            }
<<<<<<< HEAD
=======
            foreach($arrtag_key as $tags => $tag){
            ?>
            <option value="<?=$tag['tag_id']?>"><?=$tag['tag_name']?></option>
            <?
            }
>>>>>>> 12bb0cb9ff663446bb65b5a9c100a529c228166a
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
        <button id="btn_search"><i class="fa fa-search" aria-hidden="true"></i>  Tìm ngay</button>
    </form>
</div>