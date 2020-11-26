<?php
require_once("inc_security.php");
//gọi class DataGird
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id	= array();
$class_menu			= new menu();
$arrayAdm = array(0=>"Tất cả");

$arrayNN = new db_query("SELECT id,name
                          FROM nganhcv
                          WHERE status = 1
                          ORDER BY id ASC");
while($rows = mysql_fetch_array($arrayNN->result)){
   $arrayAdm[$rows["id"]] = $rows["name"];
}

$list->add("idcate","Danh mục","string",0,0, '');
$list->add("name","Tên mẫu CV","string",0,1, '');
$list->add("alias","Tên CV(không dấu)","string",0,1, '');
$list->add("","Đường dẫn","string",0,0, '');
$list->add("image","Ảnh đại diện","string",0,0, '');
$list->add("idnganh","Ngành nghề","string",0,0,'');
// $list->add("idlang","ID ngôn ngữ","string",0,0,'');
$list->add("codecolor","Mã màu","string",0,0,0,'');
$list->add("serial","CV vip TC","string",0,0,0,'');
$list->add("serial_CvOnl","CV vip CV online","string",0,0,0,'');
$list->add("status","Active","string",0,0,0,'');
$list->add("type","CV mất phí","string",0,0,0,'');
// $list->add("price","Giá thành","string",0,0,0,'');
$list->add("timecreated","Ngày cắt","string",0,0,0,'');
$list->add("",translate_text("Sửa"),"edit");

$list->quickEdit 	= false;
$list->ajaxedit($fs_table);
$cate = getValue("cate", "int", "GET", "0");
$list->addSearch("Ngành nghề", "cate", "array", $arrayAdm, $cate);
$sql =   $list->sqlSearch();

if($cate!=0){
   $sql .= " AND idnganh = $cate";
}

$total      = new db_count("SELECT count(*) AS count FROM " . $fs_table." WHERE 1 ".$sql );
                               
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
        <td align="center"><?=$arr_dmcv[$row['idcate']]['name']?></td>
         <td align="center"><?=$row['name']?></td>
         <td align="center"><?=$row['alias']?></td>
         <td align="center"><a href="<?= "https://timviec365.com/tao-cv-online/".$row['alias'].".html"?>" target="_blank" >Link</a></td>
         <td align="center"><img style="height: 100px;width: 80px" src='<?= "https://timviec365.com/upload/maucv/".$row['alias']."/".$row['image']."" ?>'></td>
         <td align="center"><?=$arr_catecv[$row['idnganh']]['name']?></td>
         <!-- <td align="center"><?=$row['idlang']?></td> -->
         <td align="center"><?
               $arr_color = explode(',',$row['codecolor']);
               foreach ($arr_color as $key => $value) {
            ?>
            <span style="width: 20px; height: 20px; background: #<?=$value?>;display: block;margin-bottom: 3px"></span>
            <?
               }
            ?>  </td>
         <?= $list->showCheckbox("serial", $row['serial'], $row['id']) ?>
         <?= $list->showCheckbox("serial_CvOnl", $row['serial_CvOnl'], $row['id']) ?>
         <?= $list->showCheckbox("status", $row['status'], $row['id']) ?>
         <?= $list->showCheckbox("type", $row['type'], $row['id']) ?>
         <!-- <td align="center"><?=$row['price']?></td> -->
         <td align="center"><?=date('d/m/Y',$row['timecreated'])?></td> 
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