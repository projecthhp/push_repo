<?
include("inc_security.php");
checkAddEdit("delete");
$record_id		= getValue("record_id","str","POST","0");
$arr_record 	= explode(",", $record_id);
$returnurl 		= base64_decode(getValue("returnurl","str","GET",base64_encode("listing.php")));
$type		    	= getValue("type","str","POST","");

$new_id		= getValue("new_id","str","POST","0");

$sql_del = "DELETE FROM nop_ho_so WHERE id = ".$record_id;
$db_del = new db_execute($sql_del);
echo "Xóa thành công ";
?>