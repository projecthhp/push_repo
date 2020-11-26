<?php
require_once("inc_security_goi.php");
//gọi class DataGird
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id	= array();
$class_menu			= new menu();

// $listAll				= $class_menu->getAllChild("categories_multi", "cat_id", "cat_parent_id", 0, "cat_active = 1 AND lang_id = " . $lang_id, "cat_id,cat_name,cat_type", "cat_order ASC,cat_name ASC", "cat_has_child", 0);
// unset($class_menu);
// if($listAll != '') foreach($listAll as $key=>$row) $new_category_id[$row["cat_id"]] = $row["cat_name"];
/*
1: Ten truong trong bang
2: Tieu de header
3: kieu du lieu ( vnd 	: kiểu tiền VNĐ, usd : kiểu USD, date : kiểu ngày tháng, picture : kiểu hình ảnh, 
				array : kiểu combobox có thể edit, arraytext : kiểu combobox ko edit,
				copy : kieu copy, checkbox : kieu check box, edit : kiểu edit, delete : kiểu delete, string : kiểu text có thể edit, 
				number : kiểu số, text : kiểu text không edit
4: co sap xep hay khong, co thi de la 1, khong thi de la 0
5: co tim kiem hay khong, co thi de la 1, khong thi de la 0
*/
//$list->add("thi_picture","Image","picture",0,0);
$list->add("name","Tên gói","string",0,0, '');
$list->add("point","Số điểm","string",0,0, '');

$list->add("",translate_text("Sửa"),"edit");
$list->add("",translate_text("Xóa"),"delete");

$list->quickEdit 	= false;
$list->ajaxedit($fs_table);

$total      = new db_count("SELECT count(*) AS count 
                            FROM " . $fs_table . " WHERE point != '0'");
                               
$total_row = $total->total;   
						 
$db = new db_query("SELECT * 
									 FROM " . $fs_table . " WHERE point != '0'");
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
         <td align="center"><?=$row['name']?></td>
         <td align="center"><?=$row['point']?></td>
         <?
         echo '<td width="10" align="center"><a class="edit"  rel="tooltip" title="' . translate_text("Bạn muốn sửa bản ghi") . '" href="edit_goi.php?record_id=' .  $row['point_id'] . '&url=' . base64_encode($_SERVER['REQUEST_URI']) . '"><img src="../../resource/images/grid/edit.png" border="0"></a></td>';
         echo '<td width="10"  align="center"><a class="delete" href="#" onclick="if (confirm(\''  . str_replace("'","\'",translate_text("Bạn muốn xóa bản ghi?")) . '\')){ deleteone_goi(' . $row['point_id'] . '); }"><img src="../../resource/images/grid/delete.gif" border="0"></a></td>';
         ?>                    
      <?=$list->end_tr();?>
      <?
   }
   ?>
   <?=$list->showFooter($total_row)?>
<script type="text/javascript">
      function deleteone_goi(id) {
      
      event.preventDefault();
      
      $("#tr_" + id).hide(500);
      
      var total_footer = $("#total_footer").text();
      total_footer = total_footer - 1;
      
      $.ajax({
         type: "POST",
         url: "delete_goi.php",
         data: "record_id=" + id,
         success: function(msg) {
            if (msg != '') {
               console.log(msg);
               $("#total_footer").text(total_footer);
               setTimeout(function(){
                  if(!$('#listing').find('input.check:visible').length) window.location.reload();
               }, 600)
            }
         }
      });
   }
</script>
</div>
</body>
</html>