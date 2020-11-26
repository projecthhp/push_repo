<?php
include("../home/config.php");

$result = array();
$qr_cat = new db_query("SELECT id,name FROM nganhcv");
$qr_language = new db_query("SELECT id,name FROM languagecv");

 //category
 $ar_all["cate"] = $qr_cat->result_array();
 //language
 $ar_all["language"] = $qr_language->result_array();

 echo str_replace('\r\n','',json_encode($ar_all));
?>

