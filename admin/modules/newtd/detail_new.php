<?php
require_once("inc_security.php");
require_once('../../../classes/PHPExcel.php');
//gọi class DataGird
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id	= array();
$class_menu			= new menu();
$startdate		= getValue("startdate", "str", "GET", "dd/mm/yyyy");
$enddate			= getValue("enddate", "str", "GET", "dd/mm/yyyy");

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
$list->add($field_name, translate_text("Tiêu đề"), "string", 0, 1);
$list->add("new_mota", "Mô tả", "checkbox", 0, 0);
$list->add("new_yeucau", "Yêu cầu", "checkbox", 0, 0);
$list->add("new_quyenloi", "Quyền lợi", "checkbox", 0, 0);
$list->add("new_ho_so", "Hồ sơ", "checkbox", 0, 0);
$list->add("new_thuc", "Xác thực", "checkbox", 0, 0); 
$list->add("",translate_text("Xóa"),"delete");
$list->quickEdit 	= true;
$list->ajaxedit($fs_table);

$sql =	$list->sqlSearch();
if($startdate != "dd/mm/yyyy"){
	$intdate		=	convertDateTime($startdate, "0:0:0");
	$sql			.= " AND new_create_time >= " . $intdate;
	}
if($enddate != "dd/mm/yyyy"){
	$intdate		=	convertDateTime($enddate, "23:59:59");
	$sql			.= " AND new_create_time <= " . $intdate;
}	
$total		= new db_count("SELECT count(*) AS count 
									 FROM " . $fs_table . "
                            JOIN new_multi ON ".$fs_table.".new_id = new_multi.new_id
                            JOIN user_company ON new.new_user_id = user_company.usc_id
									 WHERE new_md5 = '' AND new_thuc = 0  " . $sql);
										 
$total_row = $total->total;							 
$db_listing = new db_query("SELECT * 
									 FROM " . $fs_table . "
                            JOIN new_multi ON ".$fs_table.".new_id = new_multi.new_id
                            JOIN user_company ON new.new_user_id = user_company.usc_id
									 WHERE new_md5 = '' " . $sql . " AND new_thuc = 0 
									 ORDER BY " . $list->sqlSort() ."new.". $field_id . " DESC " . 
									 $list->limit($total_row));

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
   while($row = mysql_fetch_assoc($db_listing->result)){
      $i++;
      
      ?>
      <?=$list->start_tr($i, $row[$id_field]);?>
         <td style=""><?=$row['new_title']?></td>                                                               
         <td style="word-break: break-word"><?= nl2br($row['new_mota']) ?></td>  
         <td style="word-break: break-word"><?= nl2br($row['new_yeucau']) ?></td> 
         <td style="word-break: break-word"><?= nl2br($row['new_quyenloi']) ?></td>
         <td style=""><?= nl2br($row['new_ho_so']) ?></td>
         <?=$list->showCheckbox("new_thuc",$row['new_thuc'],$row['new_id'])?>      
         <?=$list->showEdit($row['new_id'])?>             
      <?=$list->end_tr();?>
      <?
   }
   ?>
   <?=$list->showFooter($total_row)?>
</div>
</body>
</html>