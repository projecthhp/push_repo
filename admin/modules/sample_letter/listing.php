<?php
require_once("inc_security.php");
//gọi class DataGird
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id	= array();
$class_menu			= new menu();
$arrayNN = new db_query("SELECT cat_id,cat_name
                          FROM category_letter
                          ORDER BY cat_id ASC");
$arrayAdm = array(0=>"Tất cả");
while($rows = mysql_fetch_array($arrayNN->result)){
   $arrayAdm[$rows["cat_id"]] = $rows["cat_name"];
}
$list->add("image","Ảnh đại diện","string",0,0, '');
$list->add("idnganh","Ngành nghề","string",0,0, '');
$list->add("name","Tên mẫu thư","string",0,0, '');
$list->add("alias","Đường dẫn","string",0,0, '');
$list->add("codecolor","Mã màu","string",0,0,0,'');
$list->add("serial","Vip","string",0,0,0,'');
$list->add("status","Active","string",0,0,0,'');
$list->add("",translate_text("Sửa"),"edit");
$cate = getValue("cate", "int", "GET", "0");
$list->addSearch("Ngành nghề", "cate", "array", $arrayAdm, $cate);
$list->quickEdit 	= false;
$list->ajaxedit($fs_table);

$sql =   $list->sqlSearch();
if($cate!=0){
   $sql .= " AND idnganh = $cate";
}
$list->quickEdit 	= false;
$list->ajaxedit($fs_table);
$sql =   $list->sqlSearch();
if($cate!=0){
   $sql .= " AND idnganh = $cate";
}

$total      = new db_count("SELECT count(*) AS count FROM " . $fs_table." WHERE 1 ".$sql);
                               
$total_row = $total->total;   

$db = new db_query("SELECT * FROM " . $fs_table." WHERE 1 ".$sql." ORDER BY " . $list->sqlSort() . $field_id . " DESC ".$list->limit($total_row));
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
      <?
      $src = "/upload/letter/".$row['alias']."/".$row['image'];
      ?>
         <td align="center"><img style="height: 100px;width: 80px" src="<?=$src?>"></td>
        <td align="center"><?=$arr_catecv[$row['idnganh']]?></td>
         <td align="center"><?=$row['name']?></td>
         <td align="center"><a target="_blank" href="<?="/tao-thu-xin-viec/".$row['alias']."-n".$row[$id_field].".html"?>">Link</a></td>
         <td align="center">
            <?
               $arr_color = explode(',',$row['codecolor']);
               foreach ($arr_color as $key => $value) {
            ?>
            <span style="width: 20px; height: 20px; background: #<?=$value?>;display: block;margin-bottom: 3px"></span>
            <?
               }
            ?>   
            </td>
         </td>
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