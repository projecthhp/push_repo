<?php
require_once("inc_security.php");
//gọi class DataGird
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id	= array();
$class_menu			= new menu();

$list->add("title","Tiêu đề","string",0, 0,'');
$list->add("idlang", "Ngôn ngữ","string",0, 0,'');
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
    $sql .= ' AND idlang = '.$lang_id;
}

$list->addSearch(translate_text("Ngôn ngữ"),"lang_id","array",$arrayLang,$lang_id);
$total      = new db_count("SELECT count(*) AS count FROM " . $fs_table." WHERE 1 ".$sql);
                               
$total_row = $total->total;   

$db = new db_query("SELECT * FROM " . $fs_table." WHERE 1 ".$sql." ORDER BY " . $list->sqlSort() . $field_id . " ASC ".$list->limit($total_row));

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
      ?>
      <?=$list->start_tr($i+1, $row[$id_field]);?> 
      <? $alinn = new db_query ("SELECT alias FROM languagecv WHERE id ='".$row['idlang']."' ");
            $nn = mysql_fetch_assoc($alinn->result);
         ?>                                                      
        <td align="center"><a target="_blank" href="https://timviec365.com/mau-cv/<?=$nn['alias']?>.html"><?=$row['title']?></a> </td>
        <? $idlang = new db_query("SELECT * FROM languagecv");
        while ($rowlang = mysql_fetch_assoc($idlang->result)) {
           if ($rowlang['id'] == $row['idlang']) {
              ?>
               <td align="center"><?=$rowlang['name'];?></td>
              <?
           }
        }
         ?>
         <td align="center"><?=$row['mota']?></td>
         <td align="center"><? echo date("d/m/Y",$row['timecreate'])?></td>
         <td align="center">
          <? 
          if ($row['timeedit'] > 0) 
          {echo date("d/m/Y",$row['timeedit']);}
         else{echo "";} 
          ?>
          </td>
         <?=$list->showEdit($row['id'])?>            
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