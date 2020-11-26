<?php
require_once("inc_security.php");
//gọi class DataGird
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id	= array();
$class_menu			= new menu();

$list->add("new_title","Tiêu đề","string",0, 0,1);
$list->add("id_lang", "Ngôn ngữ","string",0, 0,'');
$list->add("mota","Mô tả","string",0, 0,'');
$list->add("timecreate","Thời gian tạo","string",0, 0,'');
$list->add("timecreate","Thời gian sửa","string",0, 0,'');
$list->add("",translate_text("Sửa"),"edit");

$list->quickEdit 	= false;
$list->ajaxedit($fs_table);

$lang_id = getValue('lang_id','int','GET',0);
$arrayLang = array(0=>translate_text(" Ngôn ngữ "));
$db_city = new db_query("SELECT *
                  FROM languagecv
                  ORDER BY id ASC");
while($row = mysql_fetch_array($db_city->result)){
    $arrayLang[$row["id"]] = $row["name"];
}
$sql = '';
if($lang_id != 0){
    $sql .= ' AND id_lang = '.$lang_id;
}

$list->addSearch(translate_text("Ngôn ngữ"),"lang_id","array",$arrayLang,$lang_id);
$total      = new db_count("SELECT count(*) AS count FROM " . $fs_table." WHERE 1 ".$sql);
                               
$total_row = $total->total;   

$db = new db_query("SELECT *,languagecv.alias FROM " . $fs_table." LEFT JOIN languagecv ON ".$fs_table.".id_lang = languagecv.id WHERE 1 ".$sql." ORDER BY " . $list->sqlSort() . $field_id . " DESC ".$list->limit($total_row));

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
        <td align="center"><a target="_blank" href="/don-xin-viec/don-xin-viec-<?=$rows['alias']?>-l<?=$rows['id_lang']?>.html"><?=$rows['new_title']?></a> </td>
        <td align="center"><?=$arrayLang[$rows['id_lang']];?></td>
              
         <td align="center"><?=$rows['meta_sapo']?></td>
         <td align="center"><? echo date("d/m/Y",$rows['time_created'])?></td>
         <td align="center">
          <? 
          if ($rows['time_edited'] > 0) 
          {echo date("d/m/Y",$rows['time_edited']);}
         else{echo "";} 
          ?>
          </td>
         <?=$list->showEdit($rows['new_id'])?>            
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
    $("#lang_id").select2();
</script>
</body>
</html>