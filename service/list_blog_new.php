<?php
include("../home/config.php"); 
$start = getValue("start","int","POST",0);
$start = (int)$start;
$current = getValue("curent","int","POST",20);
$current = (int)$current;

$result = array();
$db_qr = new db_query("SELECT new_id,new_title,new_des,new_title_rewrite,new_picture,new_date,cat_name,adm_name,adm_id FROM news INNER JOIN categories_multi ON news.new_category_id = categories_multi.cat_id JOIN admin_user ON news.admin_id = admin_user.adm_id WHERE new_active = 1 AND new_new = 0 ORDER BY new_date_last_edit DESC LIMIT ".$start.",".$current);

while ($row = mysql_fetch_assoc($db_qr->result)) {
    $ar = array();
    $logo = "https://timviec365.com/pictures/news/".$row['new_picture'];
    $ar['new_id'] = $row['new_id'];
    $ar['new_title'] = $row['new_title'];
    $ar['url_new'] = "https://timviec365.com/blog/".replaceTitle($row['new_title_rewrite'])."-new".$row['new_id'].".html";
    $ar['new_title_rewrite'] = $row['new_title_rewrite'];
    $ar['new_picture'] = $logo;
    $ar['new_date'] = $row['new_date'];
    $ar['adm_name'] = $row['adm_name'];
	$ar['adm_id'] = $row['adm_id'];
	$ar['new_des'] = $row['new_des'];
    $result[] = $ar;
}

echo json_encode($result);

?>