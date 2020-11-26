<?php
require_once("../home/config.php");
$type = getValue("type","str","GET","");

$id = getValue("id","int","GET",0);
$id = (int)$id;

$result = array();
switch($type){
    case "cat":
    $con = "idnganh = ".$id;
    break;
    case "lang":
    $con = "idlang = ".$id;
    break;
    default:
    $con = "idnganh = ".$id;
    break;
}
if ($type == ""){
    $db_qr = new db_query("SELECT id,alias,image,view,love,download,price,idnganh,name FROM samplecv ORDER BY id DESC");
} else {
    $db_qr = new db_query("SELECT id,alias,image,view,love,download,price,idnganh,name FROM samplecv WHERE ".$con." ORDER BY id DESC");
    if (mysql_num_rows($db_qr->result) > 0) {
        // While ($row = mysql_fetch_assoc($db_qr_uv->result)) {
        //     $id_cit_use = $row["use_city"];
        //     $id_cat_use = $row["use_nganh_nghe"];
        // }
        // $db_qr = new db_query("SELECT new_id,new_han_nop,new_title,new_money,new_hot,new_city,usc_id,usc_logo,usc_create_time,usc_company,usc_type,new_create_time,new_view_count FROM new LEFT JOIN user_company ON new_user_id = user_company.usc_id WHERE new_han_nop>".time()." AND FIND_IN_SET(new_city,".$id_cit_use.") AND FIND_IN_SET(new_cat_id,'".$id_cat_use."') ORDER BY new_update_time DESC LIMIT ".$start.",".$current);
    } else {
        // $db_qr = new db_query("SELECT new_id,new_han_nop,new_title,new_money,new_hot,new_city,usc_id,usc_logo,usc_create_time,usc_company,usc_type,new_create_time,new_view_count FROM new LEFT JOIN user_company ON new_user_id = user_company.usc_id WHERE new_han_nop>".time()." ORDER BY new_update_time DESC LIMIT ".$start.",".$current);
    }
}
$result = $db_qr->result_array();

echo json_encode($result);

?>

