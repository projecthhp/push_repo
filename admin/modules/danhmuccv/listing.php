<?php
require_once("inc_security.php");
//gọi class DataGird
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id	= array();
$class_menu			= new menu();

$list->add("name","Tên danh mục","string",0,0, '');
$list->add("alias","Tên danh mục(không dấu)","string",0,0, '');
$list->add("title_des","Tiêu đề mô tả","string",0,0, '');
$list->add("content_short","Nội dung tóm tắt","string",0,0, '');
$list->add("Nội dung mô tả","Nội dung mô tả","string",0,0, '');
$list->add("serial","Thứ tự","string",0,0, '');
$list->add("status","Trạng thái","string",0,0, '');
$list->add("meta_title","meta_title","string",0,0, '');
$list->add("meta_key","meta_key","string",0,0, '');
$list->add("meta_desciption","meta_desciption","string",0,0, '');

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
        <td align="center"><?=$row['name']?></td>
         <td align="center"><?=$row['alias']?></td>
         <td align="center"><?=$row['title_des']?></td>
         <td align="center"><?=$row['content_short']?></td>
         <td align="center"><?=$row['content']?></td>
         <td align="center"><?=$row['serial']?></td>
         <td align="center"><?=$row['status']?></td>
         <td align="center"><?=$row['meta_title']?></td>
         <td align="center"><?=$row['meta_key']?></td>
         <td align="center"><?=$row['meta_desciption']?></td>
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