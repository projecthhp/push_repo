<?
$module_id	= 50;

$fs_table   = "danhmuccv";
$field_id   = "id";
$field_name = "name";
$id_field   = "id";

$fs_filepath		= "../../../pictures/".date("Y",time())."/".date("m",time())."/".date("d",time())."/";
$pathimage = "../../../pictures/";
$extension_list 	= "jpg,gif,png,swf";
$limit_size			= 300000;
#+
$small_width		= 	125;
$small_heght		=	97;
$small_quantity		=	100;
#+
$medium_width		= 	250;
$medium_heght		=	100;
$medium_quantity	=	90;

require_once("../../resource/security/security.php");
//Check user login...
checkLogged();
//Check access module...
	
$arrCatType =	array("static"	=> translate_text("Trang tĩnh"),
                  	);
                  	
$cat_type_select	= '';
foreach($arrCatType as $key => $value) $cat_type_select[]	= "'" . $key . "'";
$cat_type_select = implode(',', $cat_type_select);

$array_config		= array("image"=>1,"upper"=>1,"order"=>1,"description"=>1);	

?>