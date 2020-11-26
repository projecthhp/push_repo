<?
$module_id = 59;

$fs_table 		= "admin_user";
$field_id 		= 'adm_id';
$field_name 	= 'adm_name';
$id_field 		= 'adm_id';



$fs_filepath		= "../../../pictures/author/".date("Y",time())."/".date("m",time())."/".date("d",time())."/";
$pathimage = "../../../pictures/author/";
$extension_list 	= "jpg,gif,png,swf,jpeg,JPEG,JPG";
$limit_size			= 300000;
#+
$small_width		= 	125;
$small_heght		=	97;
$small_quantity		=	100;
#+
$medium_width		= 	250;
$medium_heght		=	100;
$medium_quantity	=	90;

//check security...
require_once("../../resource/security/security.php");
//Check user login...
checkLogged();
//Check access module...
// if(checkAccessModule($module_id) != 1) redirect($fs_denypath);


$menu				= new menu();
$listAll 		= $menu->getAllChild("categories_multi","cat_id","cat_parent_id","0","lang_id = " . $lang_id,"cat_id,cat_name,cat_order,cat_type,cat_parent_id,cat_has_child","cat_order ASC, cat_name ASC","cat_has_child");
$user_id 		= getValue("user_id","int","SESSION");
$array_config		= array("image"=>1,"upper"=>1,"order"=>1,"description"=>1);
?>