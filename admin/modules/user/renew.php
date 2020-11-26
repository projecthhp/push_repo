<?
require_once("inc_security.php");
$record_id		= getValue("record_id","str","POST","0");

$sql_update = "UPDATE ". $fs_table ." SET use_update_time = '".time()."' WHERE ".$field_id." = ".$record_id." ";
$db_update = new db_execute($sql_update);

echo "Làm mới ứng viên thành công";
?>