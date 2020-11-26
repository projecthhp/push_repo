<?
require_once("inc_security.php");
//check quyền them sua xoa
checkAddEdit("delete");
$fs_redirect	= base64_decode(getValue("returnurl","str","GET",base64_encode("listing.php")));
$record_id		= getValue("record_id","int","GET");
$arr_record 	= explode(",", $record_id);
$field_id		= "cat_id";

//kiểm tra quyền sửa xóa của user xem có được quyền ko
// checkRowUser($fs_table,$field_id,$record_id,$fs_redirect);
//kiểm tra xóa hết cấp con chưa mới có thể xóa cấp cha
$db_select = new db_query("SELECT cat_id FROM " . $fs_table . " WHERE cat_parent_id =" . $record_id);

if($row=mysql_fetch_assoc($db_select->result)){
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
	echo '<script language="javascript">alert("' . translate_text("You must delete all the levels of this category") . '!");</script>';
	redirect($fs_redirect);
	exit();
}



//Delete data with ID
delete_file($fs_table,"cat_id",$record_id,"cat_picture",$fs_filepath);
$db_del = new db_execute("DELETE FROM ". $fs_table ." WHERE cat_id =" . $record_id);
unset($db_del);
$db_del = new db_execute("DELETE FROM category WHERE cat_id =" . $record_id);
unset($db_del);

$total 			= 0;
foreach($arr_record as $i=>$record_id){
	$record_id = intval($record_id);

	$db_check   = new db_query("SELECT *
							 FROM " . $fs_table . "
							 WHERE cat_id = " . $record_id);
	if($row = mysql_fetch_assoc($db_check->result)){
		//Xóa tin khoa csdl
      if($record_id > 0 && isset($record_id))
      {
         $sql_del = "DELETE FROM ". $fs_table ." WHERE " . $field_id . " = " . $record_id;
         $db_del = new db_execute($sql_del);
      }
     
		unset($db_del);
	}
	unset($db_check);

//Xoa tag
}
echo "Có " . $total . " bản ghi đã được xóa !";

redirect($fs_redirect);

?>