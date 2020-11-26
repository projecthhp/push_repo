<?php
require_once("inc_security.php");
//gọi class DataGird
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id  = array();
$class_menu     = new menu();

$list->add("title","Tiêu đề","string",0, 0,'');
$list->add("idnganh", "Ngành nghề","string",0, 0,'');
$list->add("seo_tt","SEO Title","string",0, 0,'');
$list->add("seo_key","SEO Keyword","string",0, 0,'');
$list->add("seo_des","SEO Des","string",0, 0,'');
$list->add("timecreate","Thời gian tạo","string",0, 0,'');
$list->add("timecreate","Thời gian sửa","string",0, 0,'');
$list->add("",translate_text("Sửa"),"edit");

$list->quickEdit  = false;
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
    $sql .= ' AND '.$fs_table.'.idnganh = '.$cate_id;
}

$list->addSearch(translate_text("Ngành nghề"),"cate_id","array",$arrayCate,$cate_id);
$total      = new db_count("SELECT count(*) AS count FROM " . $fs_table." WHERE 1 ".$sql);

$total_row = $total->total;

$db = new db_query("SELECT ".$fs_table.".*, nganhcv.name,nganhcv.alias FROM " . $fs_table." LEFT JOIN nganhcv ON nganhcv.id = ".$fs_table.".idnganh WHERE 1 ".$sql." ORDER BY " . $list->sqlSort() . $fs_table.".".$field_id . " ASC ".$list->limit($total_row));

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
                                                          
      <td align="center"><a target="_blank" href="https://timviec365.com/mau-cv/<?=$rows['alias']?>.html"><?=$rows['title']?></a> </td>
         <td align="center"><?=$rows['name'];?></td>      
         <td align="center"><?=$rows['seo_tt']?></td>
         <td align="center"><?=$rows['seo_key']?></td>
         <td align="center"><?=$rows['seo_des']?></td>
         <td align="center"><? echo date("d/m/Y",$rows['timecreate'])?></td>
         <td align="center"><? 
          if ($rows['timeedit'] > 0) 
          {echo date("d/m/Y",$rows['timeedit']);}
         else{echo "";} 
          ?></td>
         <?=$list->showEdit($rows['id'])?>            
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