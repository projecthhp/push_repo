<?php
require_once("inc_security.php");
//gọi class DataGird
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id	= array();
$class_menu			= new menu();

$list->add("image","Ảnh đại diện","string",0,0, '');
$list->add("idcate","Tên danh mục","string",0,0, '');
$list->add("name","Tên mẫu thư","string",0,0, '');
$list->add("","Link","string",0,0, '');
$list->add("alias","Tên thư(không dấu)","string",0,0, '');
$list->add("codecolor","Mã màu","string",0,0,0,'');
$list->add("serial","Vip","string",0,0,0,'');
$list->add("status","Active","string",0,0,0,'');
$list->add("",translate_text("Sửa"),"edit");

$list->quickEdit 	= false;
$list->ajaxedit($fs_table);

$total      = new db_count("SELECT count(*) AS count FROM " . $fs_table);
                               
$total_row = $total->total;   

$db = new db_query("SELECT * FROM " . $fs_table." ORDER BY " . $list->sqlSort() . $field_id . " DESC ".$list->limit($total_row));
						 
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
      $url = "/tao-don-xin-viec/".$row['alias']."-m".$row['id'].".html";
      $src = "/upload/appli/".$row['alias']."/".$row['image'];
      ?>
      <?=$list->start_tr($i+1, $row[$id_field]);?>  
         <td align="center"><img style="height: 100px; width: 80px;" src="<?=$src?>" alt="Không có alt"></td>                                                    
        <td align="center"><?=$arr_catecv[$row['idnganh']]['cat_name']?></td>
         <td align="center"><?=$row['name']?></td>
         <td align="center"><?=$row['alias']?></td>
         <td align="center"><a target="_blank" href="<?=$url?>">Link</a></td>
         <td align="center"><?
               $arr_color = explode(',',$row['codecolor']);
               foreach ($arr_color as $key => $value) {
            ?>
            <span style="width: 20px; height: 20px; background: #<?=$value?>;display: block;margin-bottom: 3px"></span>
            <?
               }
            ?>  </td>
      <?= $list->showCheckbox("serial", $row['serial'], $row['id']) ?>
      <?= $list->showCheckbox("status", $row['status'], $row['id']) ?>
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