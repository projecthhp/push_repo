<?
$module_id	= 56;

$fs_table   = "sample_appli";
$field_id   = "id";
$field_name = "name";
$id_field   = "id";

$fs_filepath		= "../../../pictures/news/cv/".date("Y",time())."/".date("m",time())."/".date("d",time())."/";
$pathimage = "../../../pictures/news/cv/";
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

require_once("../../resource/security/security.php");
//Check user login...
checkLogged();
//Check access module...
// if(checkAccessModule($module_id) != 1) redirect($fs_denypath);
	
$arrCatType =	array("static"	=> translate_text("Trang tĩnh"),
                  	);
                  	
$cat_type_select	= '';
foreach($arrCatType as $key => $value) $cat_type_select[]	= "'" . $key . "'";
$cat_type_select = implode(',', $cat_type_select);

$array_config		= array("image"=>1,"upper"=>1,"order"=>1,"description"=>1);	
$db_catecv = new db_query("SELECT * FROM category_appli");
while($rowcv = mysql_fetch_array($db_catecv->result)){
	$arr_catecv[$rowcv['cat_id']] = $rowcv;
}
?>