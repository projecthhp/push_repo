<?
include("../home/config.php");
// text file cache 
$file = '../cache_file/sql_cache.json'; 
$expire = 86400; // 24 hours 
$time = time();
$time_gap = $time + 86400 * 30; // 30 days after
// Nếu có cache file và còn trong thời gian chưa hết $expire 
if (file_exists($file) && filemtime($file) > (time() - $expire)) 
{ 
    // Uunserialize data từ cache file 
    $arraytong       = json_decode(file_get_contents($file),true); 
    $db_blog       = $arraytong['db_blog'];
    $arrcity         = $arraytong['db_city'];
    $db_cat          = $arraytong['db_cat'];
    $db_catCV = $arraytong['db_catCV'];
    $db_hot = $arraytong['db_hot'];
    $db_gap = $arraytong['db_gap'];
    $db_cao = $arraytong['db_cao'];
    $db_blog = $arraytong['db_blog'];
    $db_district = $arraytong['db_district'];
    $arrQhActive = $arraytong['db_qh_active'];
    $arrtag = $arraytong['db_tag'];
    $arrtag_key = $arraytong['db_tag_key'];
    $arrcate_company = $arraytong['db_cate_company'];
} 
else // Cập nhật cache file 
{ 
    $db_bl = new db_query("SELECT cat_id,cat_name FROM categories_multi WHERE cat_active = 1 AND cat_parent_id = 0 ORDER BY cat_id DESC");
    $db_blog  = $db_bl->result_array();
    $db_qrr = new db_query("SELECT cit_id,cit_name,cit_count,cit_count_vl,cit_type,postcode FROM city ORDER BY cit_count DESC,cit_name ASC");
    $arrcity  = $db_qrr->result_array('cit_id');
    $db_cate = new db_query("SELECT cat_id,cat_name,cat_tags,cat_count,cat_count_vl,cat_ut FROM category ORDER BY cat_order,cat_name ASC");
    $db_cat  = $db_cate->result_array('cat_id');
    $db_district = new db_query("SELECT cit_id,cit_name,cit_parent FROM city2 WHERE cit_parent != 0 ORDER BY cit_name ASC");
    $dbDistrict  = $db_district->result_array('cit_id');
    $db_cateCV = new db_query("SELECT id, name, alias FROM nganhcv ORDER BY serial DESC,id DESC");
    $db_catCV = $db_cateCV->result_array('id');
    $db_hot = new db_query("SELECT new_title, new_id, new_money, new_han_nop, usc_logo, usc_id, usc_company, usc_alias,usc_create_time,new_alias FROM new JOIN user_company ON new.new_user_id = user_company.usc_id WHERE new_cao = 0 AND new_gap = 0 AND new_active = 1 AND new_thuc = 1 AND new_han_nop > ".$time." GROUP BY usc_id ORDER BY new_hot DESC, new_id DESC  LIMIT 120");
    $db_hot = $db_hot->result_array('new_id');
    $db_gap = new db_query("SELECT new_title, new_id, new_money, new_han_nop, usc_logo, usc_id, usc_company, usc_alias,usc_create_time,new_city,new_alias FROM new JOIN user_company ON new.new_user_id = user_company.usc_id WHERE new_cao = 0 AND new_hot = 0 AND new_active = 1 AND new_thuc = 1 AND new_han_nop > ".$time." AND new_han_nop BETWEEN ".$time." AND ".$time_gap." GROUP BY usc_id ORDER BY new_gap DESC, new_update_time DESC LIMIT 8");
    $db_gap = $db_gap->result_array('new_id');
    $db_cao = new db_query("SELECT new_title, new_id, new_money, new_han_nop, usc_logo, usc_id, usc_company, usc_alias,usc_create_time,new_city,new_alias FROM new JOIN user_company ON new.new_user_id = user_company.usc_id WHERE new_gap = 0 AND new_hot = 0 AND new_active = 1 AND new_thuc = 1 AND new_han_nop > ".$time." AND new_money >= 6 GROUP BY usc_id ORDER BY new_cao DESC, new_update_time DESC LIMIT 8");
    $db_cao = $db_cao->result_array('new_id');
    $db_blog = new db_query("SELECT new_id, new_title, new_title_rewrite, new_picture, new_des, new_date FROM news WHERE new_active = 1 ORDER BY new_id DESC LIMIT 8");
    $db_blog = $db_blog->result_array('new_id');
    $db_qh_active = new db_query("SELECT cit_id, cit_name,cit_parent FROM city2 WHERE tag_active = 1");
    $arrQhActive = $db_qh_active->result_array('cit_id');
    $db_tag_qh = new db_query("SELECT tag_id,tag_parent, tag_alias,tag_name FROM tbl_tags WHERE tag_parent = 1");
    $arrtag = $db_tag_qh->result_array('tag_id');
    $db_tag_key = new db_query("SELECT tag_id,tag_parent, tag_alias,tag_name FROM tbl_tags WHERE tag_parent = 3");
    $arrtag_key = $db_tag_key->result_array('tag_id');
    $db_cate_company = new db_query("SELECT cate_id,cate_name FROM category_company ORDER BY cate_order");
    $arrcate_company = $db_cate_company->result_array('cate_id');
    $arraytong = array(
                       'db_blog' => $db_blog,
                       'db_city'   => $arrcity,
                       'db_cat'    => $db_cat,
                       'db_catCV' => $db_catCV,
                       'db_hot' => $db_hot,
                       'db_gap' => $db_gap,
                       'db_cao' => $db_cao,
                       'db_blog' => $db_blog,
                       'db_district' => $dbDistrict,
                       'db_qh_active' => $arrQhActive,
                       'db_tag' => $arrtag,
                       'db_tag_key' => $arrtag_key,
                       'db_cate_company' => $arrcate_company
                   );
    $OUTPUT = json_encode($arraytong);  
    $fp = fopen($file,"w"); 
    fputs($fp, $OUTPUT); 
    fclose($fp);     
} // end else 
?>