<?
$module_id	= 35;

$fs_table   = "bang_gia";
$field_id   = "bg_id";
$field_name = "bg_san_pham";
$id_field   = "bg_id";

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
require_once("../../functions/array_front_end.php");

//Check user login...
checkLogged();
//Check access module...
	
$arrCatType =	array("static"	=> translate_text("Trang tĩnh"),
                  	);
                  	
$cat_type_select	= '';
foreach($arrCatType as $key => $value) $cat_type_select[]	= "'" . $key . "'";
$cat_type_select = implode(',', $cat_type_select);

$array_config		= array("image"=>1,"upper"=>1,"order"=>1,"description"=>1);	
function replaceTitle($title){
   	$title	= removeAccent($title);
   	$arr_str	= array( "&lt;","&gt;","/","\\","&apos;", "&quot;","&amp;","lt;", "gt;","apos;", "quot;","amp;","&lt", "&gt","&apos", "&quot","&amp","&#34;","&#39;","&#38;","&#60;","&#62;");
   	$title	= str_replace($arr_str, " ", $title);
   	$title = preg_replace('/[^0-9a-zA-Z\s]+/', ' ', $title);
   	//Remove double space
   	$array = array(
   		'    ' => ' ',
   		'   ' => ' ',
   		'  ' => ' ',
   	);
   	$title = trim(strtr($title, $array));
   	$title	= str_replace(" ", "-", $title);
   	$title	= urlencode($title);
   	// remove cac ky tu dac biet sau khi urlencode
   	$array_apter = array("%0D%0A","%","&");
   	$title	=	str_replace($array_apter,"-",$title);
   	$title	= strtolower($title);
   	return $title;
   }
   $array_bang_gia = array(0=>"Chọn gói",
                         1=>"GHIM TIN TRANG CHỦ BOX VIỆC LÀM HẤP DẪN",
                         2=>"GHIM TIN TRANG CHỦ BOX VIỆC LÀM TUYỂN GẤP",
                         3=>"GHIM TIN TRANG CHỦ BOX VIỆC LÀM LƯƠNG CAO",
                         5=>"LỌC HỒ SƠ",
                         6=>"GHIM TIN TRANG CHỦ BOX THƯƠNG HIỆU",
                         4=>"GHIM TIN TRANG NGÀNH",
                         7=>"BANNER TUYỂN DỤNG",
                         8=>"BIỂU TƯỢNG TĂNG CLICK",
                         9=>"TUYỂN DỤNG THUÊ (HEADHUNTER)"
                     );
?>