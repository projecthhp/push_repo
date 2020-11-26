<?
$module_id 	= 60;

$fs_table			= "tbl_point_used";
$field_id			= "id";
$field_name			= "use_name";

//check security...
require_once("../../resource/security/security.php");
//Check user login...
checkLogged();
//Check access module...
// if(checkAccessModule($module_id) != 1) redirect($fs_denypath);


$array_config		= array("image"=>1,"upper"=>1,"order"=>1,"description"=>1);					
?>