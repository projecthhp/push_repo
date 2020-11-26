<?
$module_id 	= 47;

$fs_table			= "user";
$field_id			= "use_id";
$field_name			= "user";

$fs_filepath		= "../../../pictures/".date("Y",time())."/".date("m",time())."/".date("d",time())."/";
$pathimage = "../../../pictures/";
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
require_once("../../functions/array_front_end.php");
//Check user login...
checkLogged();
//Check access module...
// if(checkAccessModule($module_id) != 1) redirect($fs_denypath);


$array_config		= array("image"=>1,"upper"=>1,"order"=>1,"description"=>1);		
$arrayNguon = array(
    '0' => 'Chọn nguồn',
    '1' => "Web",
    '2' => "App tìm việc",
    '3' => 'Timviec365.vn',
    '5' => 'App CV'
);
function rewriteUV($id,$title){
  $alas = replaceTitle($title);
  $alas = substr($alas,0,55);
  if ($alas == '') {
   $alas = 'nuoc-ngoai';
 }
 return  "/ung-vien/".$alas. "-uv" . $id.".html";
}
?>