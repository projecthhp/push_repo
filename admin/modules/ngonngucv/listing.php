<?php
require_once("inc_security.php");
//gọi class DataGird
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id	= array();
$class_menu			= new menu();

$list->add("id","id",0,0, '');
$list->add("name","Tên ngôn ngữ","string",0,0, '');
$list->add("code","Mã viết tắt","string",0,0, '');

$list->add("",translate_text("Sửa"),"edit");

$list->quickEdit 	= false;
$list->ajaxedit($fs_table);

$total      = new db_count("SELECT count(*) AS count FROM " . $fs_table);
                               
$total_row = $total->total;   

$db = new db_query("SELECT * FROM " . $fs_table." ORDER BY " . $list->sqlSort() . $field_id . " ASC ".$list->limit($total_row));
						 
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
   while($row = mysql_fetch_assoc($db->result)){
      ?>
      <?=$list->start_tr($i+1, $row[$id_field]);?>                                                      
         <td align="center"><?=$row['id']?></td>
         <td align="center"><?=$row['name']?></td>
         <td align="center"><?=$row['code']?></td>s
         <?=$list->showEdit($row['id'])?>                             
      <?=$list->end_tr();?>
      <?
      $i++;
   }
   ?>
   <?=$list->showFooter($total_row)?>
</div>
</body>
</html>