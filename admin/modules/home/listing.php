<?
require_once("inc_security.php");

	//gọi class DataGird
	$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
	$list->quickEdit 	= false;

	$list->add("real_name_page","Tên trang","string",0,0);
	$list->add("seo_tt","Title","string",0,0);
	$list->add("seo_des","Description","string",0,0);
	$list->add("seo_key", "Keywords", "string",0,0);
	$list->add("seo_h1", "Thẻ H1", "string",0,0);


	$list->add("",translate_text("Sửa"),"edit");
	$list->add("",translate_text("Xóa"),"delete");
	
	$list->ajaxedit($fs_table);
	
	$sql =	$list->sqlSearch() . $list->searchKeyword($field_name);
		
	$total			= new db_count("SELECT count(*) AS count 
											 FROM " . $fs_table . "
											 WHERE 1 " . $sql);
											 
	$db_listing = new db_query("SELECT * 
										 FROM " . $fs_table . "
										 WHERE 1 " . $sql . "
										 ORDER BY " . $list->sqlSort() . $field_id . " ASC
										 " . $list->limit($total->total));

	$total_row = mysql_num_rows($db_listing->result);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?=$load_header?>
<?=$list->headerScript()?>
<style type="text/css">
	.template2 .t5{
		display: none;
	}
</style>
</head>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<? /*---------Body------------*/ ?>
<div id="listing">

<?=$list->showHeader($total_row)?>
   <?
   $i=0;
   $name = '';
   while($row = mysql_fetch_assoc($db_listing->result)){
      $i++;
      ?>
      <?=$list->start_tr($i, $row['id']);?>     
         <td style="padding-left: 10px;"><?=$row['real_name_page']?></td>  
         <td style="padding-left: 20px;"><?=$row['seo_tt']?></td>  
         <td style="padding-left: 20px;"><?=$row['seo_des']?></td>    
         <td style="padding-left: 20px;"><?=$row['seo_key']?></td>    
         <td style="padding-left: 20px;"><?=$row['seo_h1']?></td>
         <?=$list->showEdit($row['id'])?>         
         <?=$list->showDelete($row['id'])?>                      
      <?=$list->end_tr();?>
      <?
   }
   ?>
   <?=$list->showFooter($total_row)?>

</div>
<? /*---------Body------------*/ ?>
</body>
</html>