<?php
require_once("inc_security.php");
//gọi class DataGird
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id	= array();
$class_menu			= new menu();

$list->add("id","ID ngành nghề","string",0,0, '');
$list->add("name","Tên ngành nghề","string",0,0, '');
$list->add("alias","Tên ngành nghề(không dấu)","string",0,0, '');
$list->add("title_des","Tiêu đề mô tả","string",0,0, '');
$list->add("content_short","Nội dung tóm tắt","string",0,0, '');
$list->add("Nội dung mô tả","Nội dung mô tả","string",0,0, '');
$list->add("serial","Thứ tự","string",0,0, '');
$list->add("status","Trạng thái","string",0,0, '');
// $list->add("meta_title","meta_title","string",0,0, '');
// $list->add("meta_key","meta_key","string",0,0, '');
// $list->add("meta_desciption","meta_desciption","string",0,0, '');

$list->add("",translate_text("Sửa"),"edit");

$list->quickEdit 	= false;
$list->ajaxedit($fs_table);
$cate_id = getValue('cate_id','int','GET',0);
$arrayCate = array(0=>translate_text(" Ngành nghề "));
$db_city = new db_query("SELECT *
                  FROM nganhcv
                  ORDER BY id ASC");
while($row = mysql_fetch_array($db_city->result)){
    $arrayCate[$row["id"]] = $row["name"];
}
$sql = '';
if($cate_id != 0){
    $sql .= ' AND id = '.$cate_id;
}

$list->addSearch(translate_text("Ngành nghề"),"cate_id","array",$arrayCate,$cate_id);
$total      = new db_count("SELECT count(*) AS count FROM " . $fs_table." WHERE 1 ".$sql);

$total_row = $total->total;

$db = new db_query("SELECT * FROM " . $fs_table." WHERE 1 ".$sql." ORDER BY " . $list->sqlSort() . $field_id . " ASC ".$list->limit($total_row));

$total      = new db_count("SELECT count(*) AS count FROM " . $fs_table." WHERE 1 ".$sql);
                               
$total_row = $total->total;

$total      = new db_count("SELECT count(*) AS count 
  FROM " . $fs_table);

$total_row = $total->total;   



?>
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<?=$load_header?>
	<?=$list->headerScript()?>
   <link rel="stylesheet" type="text/css" href="/css/select2.min.css">
</head>
<body>
   <div id="listing">
      <?=$list->showHeader($total_row)?>
      <?
      $i=0;
      while($row = mysql_fetch_assoc($db->result)){
         $i++;
      // if ($row['bg_type']=='luv') { $ktd = 'Lọc ứng viên'; }
      // if ($row['bg_type']=='gt') { $ktd = 'Ghim tin'; }
      // if ($row['bg_type']=='combo') { $ktd = 'Combo'; }
         ?>
         <?=$list->start_tr($i, $row[$id_field]);?>  
         <td align="center"><?=$row['id']?></td>                                                         
         <td align="center"><?=$row['name']?></td>
         <td align="center"><?=$row['alias']?></td>
         <td align="center"><?=$row['title_des']?></td>
         <td align="center"><?=$row['content_short']?></td>
         <td align="center"><?=$row['content']?></td>
         <td align="center"><?=$row['serial']?></td>
         <td align="center"><?=$row['status']?></td>
  <!--        <td align="center"><?=$row['meta_title']?></td>
         <td align="center"><?=$row['meta_key']?></td>
         <td align="center"><?=$row['meta_desciption']?></td> -->

         <?=$list->showEdit($row['id'])?>                             
         <?=$list->end_tr();?>
         <?
      }
      ?>
      <?=$list->showFooter($total_row)?>
   </div>
   <script src="/js/jquery.min.js"></script>
<script src="/js/select2.min.js"></script>
<script type="text/javascript">
    $("#cate_id").select2();
</script>
</body>
</html>