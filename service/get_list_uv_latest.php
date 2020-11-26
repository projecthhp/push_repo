<?php
include("../home/config.php");
// $iduser = getValue("id_ntd","int","GET",0);
// $iduser = (int)$iduser;
$start = getValue("start", "int", "POST", 0);
$start = (int)$start;
$current = getValue("curent", "int", "POST", 20);
$current = (int)$current;

$result = array();
$db_qr = new db_query("SELECT user.use_id,use_name,use_job_name,use_create_time,use_update_time,use_logo,gender,use_city,use_district_job,use_view_count,salary FROM user JOIN user_cv_upload ON user.use_id = user_cv_upload.use_id WHERE use_authentic = 1 ORDER BY use_update_time DESC LIMIT ".$start.",".$current);
$result = $db_qr->result_array();

echo json_encode($result);

?>

