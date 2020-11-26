<?php
require_once("inc_security_ls.php");
require_once('../../../classes/PHPExcel.php');

//gọi class DataGird
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id	= array();
$class_menu			= new menu();

$listAll				= $class_menu->getAllChild("categories_multi", "cat_id", "cat_parent_id", 0, "cat_active = 1 AND lang_id = " . $lang_id, "cat_id,cat_name,cat_type", "cat_order ASC,cat_name ASC", "cat_has_child", 0);
unset($class_menu);
if($listAll != '') foreach($listAll as $key=>$row) $new_category_id[$row["cat_id"]] = $row["cat_name"];

$list->add("usc_company","Tên công ty","string",0,0, '');
$list->add("usc_email","Email công ty","string",0,1, '');

$list->add("","Số điểm cộng","string",0,0, '');
$list->add("","Số điểm trừ","string",0,0, '');

$list->quickEdit 	= false;
$list->ajaxedit($fs_table);
$sql =   $list->sqlSearch();

$total      = new db_count("SELECT count(*) AS count 
                            FROM " . $fs_table . " INNER JOIN user_company ON  tbl_point_used.usc_id = user_company.usc_id  WHERE tbl_point_used.usc_id != '0' AND point <> 0 " . $sql . " ");
                               
$total_row = $total->total;   
						 
$db = new db_query("SELECT usc_company,usc_email, tbl_point_used.usc_id 
									 FROM " . $fs_table . " INNER JOIN  user_company ON  tbl_point_used.usc_id = user_company.usc_id  WHERE tbl_point_used.usc_id != '0' AND point <> 0 " . $sql . " GROUP BY tbl_point_used.usc_id ORDER BY used_day DESC ". $list->limit($total_row) ."");


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

      $result1 = mysql_query("SELECT SUM(point) AS value_plus FROM " . $fs_table . " WHERE usc_id = ". $row['usc_id']." AND use_id = '0'"); 
      $plus = mysql_fetch_assoc($result1); 
      $plus1 = $plus['value_plus'];
      if ($plus1 == '') {
         $plus1 = 0;
      }


      $result2 = mysql_query("SELECT SUM(point) AS value_ex FROM " . $fs_table . " WHERE usc_id = ". $row['usc_id']." AND use_id != '0'"); 
      $ex = mysql_fetch_assoc($result2); 
      $ex1 = $ex['value_ex'];
                           
   ?>
   <?=$list->start_tr($i, $row[$id_field]);?>  
      <td align="center"><?=$row['usc_company']?></td>  
      <td align="center"><?=$row['usc_email']?></td>                                                     
      <td align="center"><a href='ls_plus.php?record_id=<?=$row['usc_id'] ?>'><?=$plus1 ?> điểm</a></td>
      <td align="center"><a href='ls_ex.php?record_id=<?=$row['usc_id'] ?>'><?=$ex1 ?> điểm</a></td>  

   <?=$list->end_tr();?>
   <?
   }
   ?>
   <?=$list->showFooter($total_row)?>

</div>
</body>
</html>