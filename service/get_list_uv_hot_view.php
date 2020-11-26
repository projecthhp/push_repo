<?php
include("../home/config.php");
$iduser = getValue("id_ntd","int","GET",0);
$iduser = (int)$iduser;
$start = getValue("start", "int", "POST", 0);
$start = (int)$start;
$current = getValue("curent", "int", "POST", 20);
$current = (int)$current;

$result = array();
if ($iduser == 0){
    $db_qr = new db_query("SELECT u.use_id,use_name,use_job_name,use_create_time,use_update_time,use_logo,gender,use_city,use_district_job,use_view_count,salary, COUNT(u.use_id) as hot_view_count
    FROM user as u INNER JOIN
         view as v ON u.use_id = v.id_affected WHERE (v.create_date > DATE_SUB(CURRENT_DATE(),INTERVAL 3 DAY)) GROUP BY u.use_id, v.id_affected LIMIT ".$start.",".$current);
} else {
    $db_qr_ntd = new db_query("SELECT usc_city FROM user_company WHERE usc_id = ".$iduser);
    if (mysql_num_rows($db_qr_ntd->result) > 0) {
        $id_cit_usc = "1";
        While ($row = mysql_fetch_assoc($db_qr_ntd->result)) {
            $id_cit_usc = $row["usc_city"];
        }
        $db_qr = new db_query("SELECT u.use_id,use_name,use_job_name,use_create_time,use_update_time,use_logo,gender,use_city,use_district_job,use_view_count,salary, COUNT(u.use_id) as hot_view_count
        FROM user as u INNER JOIN
             view as v ON u.use_id = v.id_affected WHERE (v.create_date > DATE_SUB(CURRENT_DATE(),INTERVAL 3 DAY)) AND use_authentic = 1 AND FIND_IN_SET(use_district_job,".$id_cit_usc.") LIMIT ".$start.",".$current);
    } else {
        $db_qr = new db_query("SELECT u.use_id,use_name,use_job_name,use_create_time,use_update_time,use_logo,gender,use_city,use_district_job,use_view_count,salary, COUNT(u.use_id) as hot_view_count
    FROM user as u INNER JOIN
         view as v ON u.use_id = v.id_affected WHERE (v.create_date > DATE_SUB(CURRENT_DATE(),INTERVAL 3 DAY)) GROUP BY u.use_id, v.id_affected LIMIT ".$start.",".$current);
    }
}
if (count($db_qr) == 0){
    $db_qr = new db_query("SELECT u.use_id,use_name,use_job_name,use_create_time,use_update_time,use_logo,gender,use_city,use_district_job,use_view_count,salary, COUNT(u.use_id) as hot_view_count
    FROM user as u INNER JOIN
         view as v ON u.use_id = v.id_affected WHERE use_authentic = 1 GROUP BY u.use_id, v.id_affected LIMIT ".$start.",".$current);
}
$result = $db_qr->result_array();

echo json_encode($result);

?>

