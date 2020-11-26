<?php
require_once("../home/config.php");

$id_lang = getValue("id_lang","int","GET",0);
$id_lang = (int)$id_lang;

$result = array();
$db_qr = new db_query("SELECT id,idlang,alias,image,view,love,download,price,idnganh as cid,name,codecolor as colors FROM samplecv WHERE status=1 ORDER BY RAND() LIMIT 20");
$result = $db_qr->result_array();

echo json_encode($result);

?>

