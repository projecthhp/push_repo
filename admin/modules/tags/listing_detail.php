<?
require_once("inc_security.php");

$new_category_id  = array();
$class_menu       = new menu();
$startdate     = getValue("startdate", "str", "GET", "dd/mm/yyyy");
$enddate       = getValue("enddate", "str", "GET", "dd/mm/yyyy");
	//gọi class DataGird
	$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
	$list->quickEdit 	= false;

	$list->add("tag_name","Tên tag","string",0,0);
    $list->add("tag_index","Index","string",0,0);
    $list->add("","Sửa","string",0,0);
   // $list->addSearch("Từ", "startdate", "date", $startdate, "dd/mm/yyyy");
   // $list->addSearch("Đến", "enddate", "date", $enddate, "dd/mm/yyyy");
   $list->quickEdit  = false;
	
	$list->ajaxedit($fs_table);
	
	   $sql =   $list->sqlSearch();
   if($startdate != "dd/mm/yyyy"){
      $intdate    =  convertDateTime($startdate, "0:0:0");
      $sql        .= " AND tag_edit_date >= " . $intdate;
      }
   if($enddate != "dd/mm/yyyy"){
      $intdate    =  convertDateTime($enddate, "23:59:59");
      $sql        .= " AND tag_edit_date <= " . $intdate;
   }  

   $id_parent = getValue('id','int','GET',0);
   $sql = " AND tag_parent = ".$id_parent;

	$total			= new db_count("SELECT count(*) AS count 
											 FROM " . $fs_table . "
											 WHERE 1 " . $sql . "");									 
	$db_listing = new db_query("SELECT * 
										 FROM " . $fs_table . "
										 WHERE 1 " . $sql . "
										 ORDER BY " . $list->sqlSort() . $field_id . " DESC
                                         " . $list->limit($total->total));

	$total_row = count($array_list_tag);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?=$load_header?>
<?=$list->headerScript()?>
</head>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<? /*---------Body------------*/ ?>
<div id="listing">

<?=$list->showHeader($total_row)?>
   <?
   $i=0;
   While($row = mysql_fetch_assoc($db_listing->result)){
      $i++;
      $url = "/".$row['tag_alias']."-k".$row['tag_id']."".".html";
      ?>
      <?=$list->start_tr($i, $row['tag_id']);?>
         <td align="center" style="padding-left: 10px;"><a target="_blank" href="<?=$url?>"><?=$row['tag_name']?></a></td>
         <?=$list->showCheckbox("tag_index",$row['tag_index'],$row['tag_id'])?>
         <?=$list->showEdit($row['tag_id'])?>
      <?=$list->end_tr();?>
      <?
   }
   ?>
   <?=$list->showFooter($total_row)?>

</div>
<? /*---------Body------------*/ ?>
</body>
</html>