<?php
require_once("inc_security.php");
$iAdm=0;
function replaceTitle($title){
	$title	= remove_accent($title);
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
function remove_accent($mystring){
	$marTViet=array(
	"à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă","ằ","ắ","ặ","ẳ","ẵ",
	"è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ",
	"ì","í","ị","ỉ","ĩ",
	"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ","ờ","ớ","ợ","ở","ỡ",
	"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
	"ỳ","ý","ỵ","ỷ","ỹ",
	"đ",
	"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă","Ằ","Ắ","Ặ","Ẳ","Ẵ",
	"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
	"Ì","Í","Ị","Ỉ","Ĩ",
	"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
	"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
	"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
	"Đ",
	"'");
	
	$marKoDau=array(
	"a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a","a",
	"e","e","e","e","e","e","e","e","e","e","e",
	"i","i","i","i","i",
	"o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o","o",
	"u","u","u","u","u","u","u","u","u","u","u",
	"y","y","y","y","y",
	"d",
	"A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A","A",
	"E","E","E","E","E","E","E","E","E","E","E",
	"I","I","I","I","I",
	"O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O",
	"U","U","U","U","U","U","U","U","U","U","U",
	"Y","Y","Y","Y","Y",
	"D",
	"");
	
	return str_replace($marTViet,$marKoDau,$mystring);

}
//gọi class DataGird
$iAdm             = getValue("iAdm");
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));

$arrayAdm = array(0=>"Tất cả");

$db_admin = new db_query("SELECT adm_id,adm_name
                          FROM admin_user
                          WHERE adm_delete = 0
                          ORDER BY adm_id ASC");
while($rows = mysql_fetch_array($db_admin->result)){
	$arrayAdm[$rows["adm_id"]] = $rows["adm_name"];
}

$new_category_id	= array();
$class_menu			= new menu();
$listAll				= $class_menu->getAllChild("categories_multi", "cat_id", "cat_parent_id", 0, "1 AND lang_id = " . $lang_id, "cat_id,cat_name,cat_type", "cat_order ASC,cat_name ASC", "cat_has_child", 0);
unset($class_menu);
if($listAll != '') foreach($listAll as $key=>$row) $new_category_id[$row["cat_id"]] = $row["cat_name"];
/*
1: Ten truong trong bang
2: Tieu de header
3: kieu du lieu ( vnd 	: kiểu tiền VNĐ, usd : kiểu USD, date : kiểu ngày tháng, picture : kiểu hình ảnh, 
				array : kiểu combobox có thể edit, arraytext : kiểu combobox ko edit,
				copy : kieu copy, checkbox : kieu check box, edit : kiểu edit, delete : kiểu delete, string : kiểu text có thể edit, 
				number : kiểu số, text : kiểu text không edit
4: co sap xep hay khong, co thi de la 1, khong thi de la 0
5: co tim kiem hay khong, co thi de la 1, khong thi de la 0
*/
//$list->add("thi_picture","Image","picture",0,0);
else{
}
$list->add($field_name, translate_text("Tiêu đề"), "string", 0, 1);
$list->add("meta_tit","Meta title","string",1,0 );
$list->add("meta_des","Meta Des","string",1,0);
$list->add("meta_key","Meta key","string",0,0);
$list->add("",translate_text("Sửa"),"edit");
if(	$_SESSION["isAdmin"] == 1){
	$list->add("",translate_text("Xóa"),"delete");
}
$list->quickEdit 	= false;
$list->ajaxedit($fs_table);
$list->addSearch("Người đăng","iAdm","array",$arrayAdm,$iAdm);


$sql =	$list->sqlSearch();

if($iAdm != 0)
{
   $sql .= " AND news.admin_id = ".$iAdm."";
}
	
$total		= new db_count("SELECT count(*) AS count 
									 FROM " . $fs_table . "
									 
									 WHERE 1 " . $sql ."");
										 
$total_row = $total->total;							 
$db_listing = new db_query("SELECT * 
									 FROM " . $fs_table . "
									 WHERE 1 " . $sql . "
									 ORDER BY " . $list->sqlSort() . $field_id . " DESC " . 
									 $list->limit($total_row));

?>
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<?=$load_header?>
	<?=$list->headerScript()?>
</head>
<body>
<div id="listing">
   <?=$list->showHeader($total_row)?>
   <?
   $i=0;
   while($row = mysql_fetch_assoc($db_listing->result)){
      $i++;
      
      ?>
      <?=$list->start_tr($i, $row[$id_field]);?>
		<td align="center" width="72"><?=$row['ch_name']?></td>

		<td align="center"><?=$row['meta_tit']?></td>  
		<td align="center"><?=$row['meta_des']?></td>          
		<td align="center"><?=$row['meta_key']?></td>
		<?=$list->showEdit($row['ch_id'])?>  
		<?=($_SESSION["isAdmin"] == 1)?$list->showDelete($row['ch_id']):""?>                           
      <?=$list->end_tr();?>
      <?
   }
   ?>
   <?=$list->showFooter($total_row)?>
</div>
</body>
</html>