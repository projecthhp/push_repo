<?php
include("../home/config.php"); 


$result = array();
$db_qr = new db_query("SELECT cat_id,cat_name,cat_img,cat_description, COUNT(*) AS count_new FROM new INNER JOIN category ON category.cat_id = new.new_cat_id WHERE new.new_active = 1 AND new.new_han_nop > 1568105720 GROUP BY cat_id ORDER BY cat_count_vl DESC LIMIT 10");

while ($row = mysql_fetch_assoc($db_qr->result)) {
    $ar = array();
    $ar['cat_id'] = $row['cat_id'];
    $ar['cat_name'] = $row['cat_name'];
    $ar['cat_img'] = $row['cat_img'];
    $ar['cat_description'] = str_replace('2016','2019-2020',$row['cat_description']);
    $ar['count_new'] = $row['count_new'];
    $result[] = $ar;
}

echo json_encode($result);

?>