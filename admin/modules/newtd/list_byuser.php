<?php
require_once("inc_security.php");
require_once('../../../classes/PHPExcel.php');
//gọi class DataGird
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
$new_category_id	= array();
$class_menu			= new menu();
$startdate		= getValue("startdate", "str", "GET", "dd/mm/yyyy");
$enddate			= getValue("enddate", "str", "GET", "dd/mm/yyyy");
$isAdm = $_SESSION["isAdmin"];
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
$list->add("new_id","ID","string",0,1);
$list->add($field_name, translate_text("Tiêu đề"), "string", 0, 1);
$list->add("usc_company","Tên công ty","string",0,1);
$list->add("usc_phone","Số điện thoại","string",0,0);
$list->add("usc_address","Địa chỉ","string",0,0);
$list->add("new_create_time","Ngày đăng tin","string",0,0,1);
$list->add("new_hot", "Hot", "checkbox", 1, 0);
$list->add("new_gap", "T Gấp", "checkbox", 1, 0);
$list->add("new_cao", "L Cao", "checkbox", 1, 0);
$list->add("new_nganh", "G ngành", "checkbox", 1, 0);
$list->add("new_active", "Active", "checkbox", 0, 0);
if($isAdm == 1) $list->add("new_index", "index", "checkbox", 0, 0);
// $list->add("new_do", "Bôi đỏ", "checkbox", 0, 0);
// $list->add("new_thuc", "Xác thực", "checkbox", 0, 0);
$list->add("",translate_text("Làm mới"),"Làm mới");
$list->add("","Ghim","edit");
$list->add("",translate_text("Sửa"),"edit");
$list->add("",translate_text("Xóa"),"delete");
$list->addSearch("Từ", "startdate", "date", $startdate, "dd/mm/yyyy");
$list->addSearch("Đến", "enddate", "date", $enddate, "dd/mm/yyyy");
$list->quickEdit 	= false;
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
                            JOIN user_company ON new.new_user_id = user_company.usc_id
									 WHERE new_md5 = ''  AND new_thuc = 1 " . $sql);
										 
$total_row = $total->total;							 
$db_listing = new db_query("SELECT * 
									 FROM " . $fs_table . "
                            JOIN user_company ON new.new_user_id = user_company.usc_id
									 WHERE new_md5 = ''  AND new_thuc = 1  " . $sql . "
									 ORDER BY new_create_time DESC," . $list->sqlSort() . $field_id . " DESC " . 
									 $list->limit($total_row));
$db_full = new db_query("SELECT * 
                   FROM " . $fs_table . "
                            JOIN user_company ON new.new_user_id = user_company.usc_id
                   WHERE new_md5 = ''  AND new_thuc = 1  " . $sql . "
                   ORDER BY new_update_time DESC," . $list->sqlSort() . $field_id . " DESC ");
$xuatex = getValue("postexcel","str","POST","");
   if($xuatex != "")
   {
      $objPHPExcel = new PHPExcel();

      $objPHPExcel->setActiveSheetIndex(0)
      ->setCellValue('A1', 'ID')
      ->setCellValue('B1', 'Tiêu đề tin')
      ->setCellValue('C1', 'Tên công ty')
      ->setCellValue('D1', 'Số điện thoại')
      ->setCellValue('E1', 'Email')
      ->setCellValue('F1', 'Ngày đăng tin')
      ->setCellValue('G1', 'Hạn nộp');
      while($rowx = mysql_fetch_assoc($db_full->result))
   {
    $listsss =
       array(
       'id' => $rowx['new_id'],
       'title' => $rowx['new_title'],
       'usc_name' => $rowx['usc_company'],
       'phone' => $rowx['usc_phone'],
       'email'  => $rowx['usc_email'],
       'new_update_time'  => $rowx['new_create_time'],
       'new_han_nop'  => $rowx['new_han_nop'],
    );
    $lists[]   =  $listsss;
   }
   //set gia tri cho cac cot du lieu
   $i = 2;
   foreach ($lists as $row2)
   {
     $objPHPExcel->setActiveSheetIndex(0)
         ->setCellValue('A'.$i, $row2['id'])
         ->setCellValue('B'.$i, $row2['title'])
         ->setCellValueExplicit('C'.$i, $row2['usc_name'],PHPExcel_Cell_DataType::TYPE_STRING)
         ->setCellValue('D'.$i, $row2['phone'])
         ->setCellValue('E'.$i, $row2['email'])
         ->setCellValue('F'.$i, date('d/m/Y',$row2['new_create_time']))
         ->setCellValue('G'.$i, date('d/m/Y,',$row2['new_han_nop']));
   $i++;
   }
   //ghi du lieu vao file,định dạng file excel 2007
     $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
     ob_end_clean();
     $full_path = 'data_new.xlsx';//duong dan file

     header('Content-type: application/vnd.ms-excel');
     header("Content-Disposition: attachment; filename=data_new.xlsx");
     $objWriter->save('php://output');

   }
function rewrite_company($idcp,$namecp,$alias)
{
  if($alias!='') $compn = "/".$alias."-n".$idcp.".html";
  else $compn = "/".replaceTitle($namecp)."-n".$idcp.".html";
  return $compn;
}
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
   <form method="post" name="form_ab">
     <input type="submit" name="postexcel" class="bottom" style="float: left!important;margin-left: 13px!important;margin: 3px 13px 8px;!" value="Xuất Excel" />
  </form>
   <?
   $i=0;
   while($row = mysql_fetch_assoc($db_listing->result)){
      $i++;
      
      ?>
      <?=$list->start_tr($i, $row[$id_field]);?>
         <td style="padding-left: 20px;"><?=$row['new_id']?></td>                                                               
         <td style="padding-left: 20px;"><a style="text-decoration: none;" href="/<?= replaceTitle($row['new_title']) ?>-<?= $row['new_id'] ?>.html" target="_blank"><?=$row['new_title']?></a></td>  
         <td style="padding-left: 20px;"><a target="_blank" href="<?=rewrite_company($row['usc_id'],$row['usc_company'],$row['usc_alias'])?>"><?=$row['usc_company']?></a></td> 
         <td style="padding-left: 20px;"><?=$row['usc_phone']?></td> 
         <td style="padding-left: 20px;"><?=$row['usc_address']?></td> 
         <td align="center"><?=date("d/m/Y",$row['new_create_time'])?></td>
         <?=$list->showCheckbox("new_hot",$row['new_hot'],$row['new_id'])?>
         <?=$list->showCheckbox("new_gap",$row['new_gap'],$row['new_id'])?>
         <?=$list->showCheckbox("new_cao",$row['new_cao'],$row['new_id'])?>
         <?=$list->showCheckbox("new_nganh",$row['new_nganh'],$row['new_id'])?>
         <?=$list->showCheckbox("new_active",$row['new_active'],$row['new_id'])?>
         <?
         if($isAdm == 1) echo $list->showCheckbox("new_index",$row['new_index'],$row['new_id']) ?>
         <?=$list->showRenewTin($row['new_id'])?>
         <?=$list->showEditGhim($row['new_id'])?>
         <?=$list->showEdit($row['new_id'])?> 
         <?=$list->showDelete($row['new_id'])?>                      
      <?=$list->end_tr();?>
      <?
   }
   ?>
   <?=$list->showFooter($total_row)?>
</div>
</body>
</html>