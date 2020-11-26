<?php
include("../home/config.php");

$result = array();
$qr_count = new db_count("SELECT new_id,new_han_nop,new_title,new_money,new_hot,new_city,usc_id,usc_logo,usc_create_time,usc_company,usc_type,new_create_time,new_view_count FROM new LEFT JOIN user_company ON new_user_id = user_company.usc_id WHERE new_han_nop>".time()." ORDER BY RAND(),new_view_count DESC, new_money DESC, new_hot DESC, new_update_time DESC LIMIT 28");
if ($qr_count->count == 0){
    $db_qr = new db_query("SELECT new_id,new_han_nop,new_title,new_money,new_hot,new_city,usc_id,usc_logo,usc_create_time,usc_company,usc_type,new_create_time,new_view_count FROM new LEFT JOIN user_company ON new_user_id = user_company.usc_id WHERE new_han_nop>".time()." ORDER BY RAND(),new_view_count DESC, new_money DESC, new_hot DESC, new_update_time DESC LIMIT 28");
} else {
    $db_qr = new db_query("SELECT new_id,new_han_nop,new_title,new_money,new_hot,new_city,usc_id,usc_logo,usc_create_time,usc_company,usc_type,new_create_time,new_view_count FROM new LEFT JOIN user_company ON new_user_id = user_company.usc_id WHERE new_han_nop>".time()." ORDER BY RAND(),new_view_count DESC, new_money DESC, new_hot DESC, new_update_time DESC LIMIT 28");
}
$result = $db_qr->result_array();

echo json_encode($result);

?>

