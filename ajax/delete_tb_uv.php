<?php
include ('../home/config.php');
$not_id = getValue("not_id","int","POST",0);
$not_id_all = getValue("not_id_all","int","POST",0);
if($not_id > 0){
    $db_ex = new db_execute("DELETE FROM notification WHERE not_id = '".$not_id."'");
}
if($not_id_all > 0){
    $db_ex = new db_execute("DELETE FROM notification WHERE use_id = '".$not_id_all."' AND not_active > 2");
}