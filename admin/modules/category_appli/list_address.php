<?php
require_once("inc_security.php");
//gọi class DataGird
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id  = array();
$class_menu     = new menu();
$fs_table = 'new_address_appli';
$field_id   = "new_id";
$field_name = "new_title";
$id_field   = "new_id";
$list->add("new_title","Tên bài viết","string",0, 1);
$list->add("meta_tit","SEO Title","string",0, 0,'');
$list->add("meta_des","SEO Keyword","string",0, 0,'');
$list->add("meta_key","SEO Des","string",0, 0,'');
$list->add("meta_h1","H1","string",0, 0,'');
$list->add("timecreate","Thời gian tạo","string",0, 0,'');
$list->add("time_edit","Thời gian sửa","string",0, 0,'');
if(  $_SESSION["isAdmin"] == 1){
$list->add("add_index","Index","string",0, 0,'');
}
$list->add("",translate_text("Sửa"),"edit");

$list->quickEdit  = false;
$list->ajaxedit($fs_table);
$sql = '';
$sql =	$list->sqlSearch();
$total      = new db_count("SELECT count(*) AS count FROM " . $fs_table." WHERE 1 ".$sql);

$total_row = $total->total;

$db = new db_query("SELECT * FROM ".$fs_table." WHERE 1 ".$sql." ORDER BY " . $list->sqlSort() . $fs_table.".".$field_id . " DESC ".$list->limit($total_row));

$total      = new db_count("SELECT count(*) AS count FROM " . $fs_table." WHERE 1 ".$sql);
                               
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
   while($rows = mysql_fetch_assoc($db->result)){
      ?>
      <?=$list->start_tr($i+1, $rows[$id_field]);?>  
                                                          
      <td align="center"><a target="_blank" href="https://timviec365.com/don-xin-viec/<?=$rows['new_alias']?>-k<?=$rows['new_id']?>.html"><?=$rows['new_title']?></a> </td>
         <td align="center"><?=$rows['meta_tit'];?></td>      
         <td align="center"><?=$rows['meta_key']?></td>
         <td align="center"><?=$rows['meta_des']?></td>
         <td align="center"><?=$rows['meta_h1']?></td>
         <td align="center"><? echo date("d/m/Y",$rows['timecreate'])?></td>
         <td align="center"><?=($rows['time_edit']>0)?date("d/m/Y",$rows['time_edit']):""?></td>
         <?if(  $_SESSION["isAdmin"] == 1){?>
         <?=$list->showCheckboxAddAppli("add_index",$rows['add_index'],$rows['new_id'])?> 
          <?}?>
         <?=$list->showEditAddAppli($rows['new_id'])?>            
      <?=$list->end_tr();?>
      <?
      $i++;
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