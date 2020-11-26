<?php
require_once("inc_security_ls.php");
//gọi class DataGird
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id	= array();
$class_menu			= new menu();

$record_id      = getValue("record_id");



// $list->add("","","string",0,0, '');
$list->add("point","Số điểm từ kinh doanh","string",0,0, '');
$list->add("","Ngày","string",0,0, '');


$list->quickEdit 	= false;
$list->ajaxedit($fs_table);

$total      = new db_count("SELECT count(*) AS count 
                            FROM " . $fs_table . " WHERE usc_id = '".$record_id."' AND use_id = '0'");
                               
$total_row = $total->total;   
						 
$db = new db_query("SELECT * 
									 FROM " . $fs_table . " WHERE usc_id = '".$record_id."'AND use_id = '0'");


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
   $i = 0;
   while($row = mysql_fetch_assoc($db->result)){
      $i++;                           
      ?>
      <?=$list->start_tr($i, $row[$id_field]);?>     
         <!-- <td align="center">Admin</td> -->
         <td align="center"><?=$row['point']?></td>                                                     
         <td align="center"><?= date('d/m/Y',$row['used_day'])?></td>                                                            
      <?=$list->end_tr();?>
      <?
   }
   ?>
   <?=$list->showFooter($total_row)?>

</div>
</body>
</html>