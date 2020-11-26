<?php
require_once("inc_security.php");

//gọi class DataGird
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id	= array();
$class_menu			= new menu();

$list->add("bg_tuan","Sản Phẩm / Tuần","string",0,0, '');
$list->add("bg_gia","Số tiền","string",0,0, '');
$list->add("bg_chiet_khau","Chiết khấu/ chưa vat","string",0,0, '');
$list->add("bg_vat","Có VAT","string",0,0, '');
$list->add("bg_type","Gói","string",0,0, '');
$list->add("bg_point","Điểm","string",0,0, '');
// $list->add("bg_do", "Bôi đỏ", "checkbox", 1, 0);


$list->add("",translate_text("Sửa"),"edit");

$list->quickEdit 	= false;
$list->ajaxedit($fs_table);

$total      = new db_count("SELECT count(*) AS count 
                            FROM " . $fs_table);
                               
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
      $i++;

      $ktd = $array_bang_gia[$row['bg_type']];

      ?>
      <?=$list->start_tr($i, $row[$id_field]);?>                                                           
         <td align="center"><?=$row['bg_tuan']?></td>
         <td align="center"><?=$row['bg_gia']?></td>
         <td align="center"><?=$row['bg_chiet_khau']?></td>
         <td align="center"><?=$row['bg_vat']?></td>
         <td align="center"><?=$ktd?></td>
         <td align="center"><?=$row['bg_point']?></td>
         <!-- <?=$list->showCheckbox("bg_do",$row['bg_do'],$row['bg_id'])?>     -->
         <?=$list->showEdit($row['bg_id'])?>                             
      <?=$list->end_tr();?>
      <?
   }
   ?>
   <?=$list->showFooter($total_row)?>
</div>
</body>
</html>