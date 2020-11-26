<?php
require_once("inc_security.php");
require_once('../../../classes/PHPExcel.php');
//gọi class DataGird
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id	= array();
$class_menu			= new menu();
$startdate		= getValue("startdate", "str", "GET", "dd/mm/yyyy");
$enddate			= getValue("enddate", "str", "GET", "dd/mm/yyyy");
$listAll				= $class_menu->getAllChild("categories_multi", "cat_id", "cat_parent_id", 0, "cat_active = 1 AND lang_id = " . $lang_id, "cat_id,cat_name,cat_type", "cat_order ASC,cat_name ASC", "cat_has_child", 0);
unset($class_menu);
if($listAll != '') foreach($listAll as $key=>$row) $new_category_id[$row["cat_id"]] = $row["cat_name"];
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
$list->add("usc_id","ID","string",0,1, '');
$list->add($field_name, "Tên công ty", "string", 0, 0);
$list->add("usc_email","Email","string",0,1);
$list->add("point","Điểm khuyến mãi","string",0,0);
$list->add("point_usc","Điểm cộng thêm","string",0,0);
$list->add("day_end","Ngày hết hạn điểm","date",0,0);
$list->add("",translate_text("Sửa"),"edit");
// $list->add("",translate_text("Xóa"),"delete");
$list->addSearch("Từ", "startdate", "date", $startdate, "dd/mm/yyyy");
$list->addSearch("Đến", "enddate", "date", $enddate, "dd/mm/yyyy");
$list->quickEdit 	= false;
$list->ajaxedit($fs_table);

$sql =	$list->sqlSearch();
if($startdate != "dd/mm/yyyy"){
	$intdate		=	convertDateTime($startdate, "0:0:0");
	$sql			.= " AND day_end >= " . $intdate;
	}
if($enddate != "dd/mm/yyyy"){
	$intdate		=	convertDateTime($enddate, "23:59:59");
	$sql			.= " AND day_end <= " . $intdate;
}	

$sql = str_replace('usc_id', 'user_company.usc_id', $sql);

$time_hh = time() - 31449600;
// $update_time = new db_execute("UPDATE ".$fs_table." SET point_usc = 0 WHERE day_reset_point < ".$time_hh);


$total		= new db_count("SELECT count(*) AS count 
									 FROM " . $fs_table . "
									 INNER JOIN user_company ON " .$fs_table.".usc_id = user_company.usc_id
									 WHERE user_company.usc_id != 0 " . $sql . "
									 ORDER BY " . $list->sqlSort() .'user_company.'.$field_id . " DESC ");
										 
$total_row = $total->total;							 
$db_listing = new db_query("SELECT * 
									 FROM " . $fs_table . " INNER JOIN user_company ON " .$fs_table.".usc_id = user_company.usc_id
									 WHERE user_company.usc_id != 0 " . $sql . "
									 ORDER BY " . $list->sqlSort() .'user_company.'.$field_id . " DESC " . 
									 $list->limit($total_row));
$db_full = new db_query("SELECT * 
									 FROM " . $fs_table . " INNER JOIN user_company ON " .$fs_table.".usc_id = user_company.usc_id
									 WHERE user_company.usc_id != 0 " . $sql . "
									 ORDER BY " . $list->sqlSort() .'user_company.'.$field_id . " DESC ");

// $xuatex = getValue("postexcel","str","POST","");
// if($xuatex != "")
// {
// $objPHPExcel = new PHPExcel();
 
// $objPHPExcel->setActiveSheetIndex(0)
// ->setCellValue('A1', 'Tên công ty')
// ->setCellValue('B1', 'Email')
// ->setCellValue('C1', 'Số điện thoại')
// ->setCellValue('D1', 'Ngày đăng ký');
// while($rowx = mysql_fetch_assoc($db_full->result))
// {
//    $listsss = 
//    array(
//    'name' => $rowx['usc_company'],
//    'email' => $rowx['usc_email'],
//    'phone' => $rowx['usc_phone'],
//    'time'  => date("d/m/Y",$rowx['usc_create_time']),
//    );
//    $lists[]	=	$listsss;
// }
// //set gia tri cho cac cot du lieu
// $i = 2;
// foreach ($lists as $row2)
// {
// $objPHPExcel->setActiveSheetIndex(0)
// ->setCellValue('A'.$i, $row2['name'])
// ->setCellValue('B'.$i, $row2['email'])
// ->setCellValue('C'.$i, $row2['phone'])
// ->setCellValue('D'.$i, $row2['time']);
// $i++;
// }
// //ghi du lieu vao file,định dạng file excel 2007
// $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
// $full_path = 'data_company.xlsx';//duong dan file
// $objWriter->save($full_path);
// header("Content-Type: application/octet-stream");
// header("Content-Disposition: attachment; filename=data_company.xlsx");
// readfile("https://timviec365.vn/admin/modules/company/data_company.xlsx");

// }
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
<!--    <form method="post" name="form_ab">
      <input type="submit" name="postexcel" class="bottom" style="float: left!important;margin-left: 13px!important;margin: 3px 13px 8px;!" value="Xuất Excel" />
   </form> -->
   <?
   $i=0;
   while($row = mysql_fetch_assoc($db_listing->result)){
      $i++;
      
      ?>
      <?=$list->start_tr($i, $row[$id_field]);?>
	<td align="center"><?=$row['usc_id']?></td>
	<td><?=$row['usc_company']?></td>
	<td align="center"><?=$row['usc_email']?></td>
	<td align="center"><?=$row['point']?></td>
	<td align="center"><?=$row['point_usc']?></td>
	<td align="center"><?= ($row['day_end']!=0)?date('d/m/Y',$row['day_end']):"Chưa cập nhật" ?></td>

         <?=$list->showEdit($row['usc_id'])?>         

      <?=$list->end_tr();?>
      <?
   }
   ?>
   <?=$list->showFooter($total_row)?>
</div>
</body>
</html>