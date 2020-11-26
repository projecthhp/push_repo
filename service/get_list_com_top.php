<?php
include("../home/config.php");

$result = array();
$db_qr = new db_query("SELECT user_company.usc_id,usc_email,usc_name,usc_name_add,usc_name_phone,usc_name_email,usc_company,usc_address,usc_phone,usc_logo,usc_size,usc_website,usc_city,usc_update_time,usc_view_count,usc_create_time FROM user_company JOIN user_company_multi ON user_company.usc_id = user_company_multi.usc_id WHERE usc_email IS NOT NULL AND usc_email <> '' AND usc_pass != '28c7414d5ec1bf209b1ebd4883149b73' ORDER BY usc_view_count DESC, usc_update_time DESC LIMIT 20");
// var_dump("SELECT * FROM user_company JOIN user_company_multi ON user_company.usc_id = user_company_multi.usc_id WHERE usc_email IS NOT NULL AND usc_email <> '' ORDER BY usc_update_time DESC, usc_view_count DESC LIMIT 20");
// die;
// $result = $db_qr->result_array();

echo json_encode($db_qr->result_array());

?>

