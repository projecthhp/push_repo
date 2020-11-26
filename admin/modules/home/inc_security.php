<?
$module_id 	= 45;

$fs_table			= "seo_tt";
$field_id			= "id";
$field_name			= "seo_tt";

//check security...
require_once("../../resource/security/security.php");
//Check user login...
checkLogged();
//Check access module...
// if(checkAccessModule($module_id) != 1) redirect($fs_denypath);


$array_config		= array("image"=>1,"upper"=>1,"order"=>1,"description"=>1);					
?>