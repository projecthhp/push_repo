<?
$module_id 	= 47;

$fs_table			= "tbl_comment";
$field_id			= "cmt_id";
$field_name			= "cmt_username";

//check security...
require_once("../../resource/security/security.php");
//Check user login...
checkLogged();
//Check access module...
// if(checkAccessModule($module_id) != 1) redirect($fs_denypath);


$array_config		= array("image"=>1,"upper"=>1,"order"=>1,"description"=>1);					
?>